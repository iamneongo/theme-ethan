<?php
/**
 * Zillow Import Tool — WordPress admin page.
 * Menu: Bất động sản → Import Zillow
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', function (): void {
    add_submenu_page(
        'edit.php?post_type=property',
        'Import Zillow',
        'Import Zillow',
        'manage_options',
        'zillow-import-tool',
        'ethan_dao_zillow_import_page'
    );
});

function ethan_dao_zillow_import_page(): void
{
    if (!current_user_can('manage_options')) {
        wp_die('Không có quyền truy cập.');
    }

    $json_path = get_template_directory() . '/inc/zillow-listings.json';
    $json_exists = file_exists($json_path);

    $action = $_POST['zillow_action'] ?? '';
    $nonce_ok = isset($_POST['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'zillow_import');

    $log = [];

    if ($nonce_ok && $action === 'reset_import') {
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $data = json_decode((string) file_get_contents($json_path), true);
        if (!is_array($data)) {
            $log[] = '<span style="color:red">JSON không hợp lệ.</span>';
        } else {
            // Reset: delete all existing properties
            $existing = get_posts(['post_type' => 'property', 'numberposts' => -1, 'post_status' => 'any', 'fields' => 'ids']);
            foreach ($existing as $id) {
                wp_delete_post((int) $id, true);
            }
            $log[] = 'Đã xóa ' . count($existing) . ' bất động sản cũ.';

            // Import fresh
            $imported = 0;
            $order = 1;
            foreach ($data as $item) {
                $address = trim((string) ($item['address'] ?? ''));
                if ($address === '') {
                    continue;
                }

                $status = (($item['status'] ?? '') === 'for sale') ? 'for sale' : 'sold';

                $post_id = wp_insert_post([
                    'post_type' => 'property',
                    'post_status' => 'publish',
                    'post_title' => $address,
                ]);

                if (is_wp_error($post_id)) {
                    $log[] = '<span style="color:red">Lỗi: ' . esc_html($address) . '</span>';
                    continue;
                }

                update_post_meta($post_id, 'property_status', $status);
                update_post_meta($post_id, 'property_address', $address);
                update_post_meta($post_id, 'property_city', trim((string) ($item['city'] ?? '')));
                update_post_meta($post_id, 'property_price', (string) ($item['price'] ?? ''));
                update_post_meta($post_id, 'property_price_text', trim((string) ($item['price_text'] ?? '')));
                update_post_meta($post_id, 'property_bedrooms', (string) ($item['bedrooms'] ?? ''));
                update_post_meta($post_id, 'property_bathrooms', (string) ($item['bathrooms'] ?? ''));
                update_post_meta($post_id, 'property_sqft', (string) ($item['sqft'] ?? ''));
                update_post_meta($post_id, 'property_image', trim((string) ($item['image'] ?? '')));
                update_post_meta($post_id, 'property_sold_date', trim((string) ($item['sold_date'] ?? '')));
                update_post_meta($post_id, 'property_zpid', (string) ($item['zpid'] ?? ''));
                update_post_meta($post_id, 'property_order', (string) $order);

                $details = trim((string) ($item['details'] ?? ''));
                $role = trim((string) ($item['represented'] ?? ''));
                if ($details !== '') {
                    update_post_meta($post_id, 'property_details', $details);
                } elseif ($role !== '') {
                    if ($role === 'Seller') {
                        update_post_meta($post_id, 'property_details', 'Đại diện người bán');
                    } elseif ($role === 'Buyer') {
                        update_post_meta($post_id, 'property_details', 'Đại diện người mua');
                    }
                }

                $log[] = '[' . $status . '] #' . $post_id . ' ' . esc_html($address);
                $imported++;
                $order++;
            }
            $log[] = '<strong style="color:green">Đã import ' . $imported . ' bất động sản.</strong>';
        }
    }

    if ($nonce_ok && ($action === 'download_images' || $action === 'force_download_images')) {
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $force = ($action === 'force_download_images');

        $data = json_decode((string) file_get_contents($json_path), true);
        if (!is_array($data)) {
            $log[] = '<span style="color:red">JSON không hợp lệ.</span>';
        } else {
            $by_address = [];
            foreach ($data as $item) {
                $addr = trim((string) ($item['address'] ?? ''));
                if ($addr !== '' && !empty($item['image'])) {
                    $by_address[$addr] = [
                        'image' => $item['image'],
                        'zpid' => (string) ($item['zpid'] ?? ''),
                    ];
                }
            }

            $properties = get_posts(['post_type' => 'property', 'numberposts' => -1, 'post_status' => 'any']);
            $site_url = rtrim(home_url(), '/');
            $downloaded = $skipped = $failed = 0;

            foreach ($properties as $property) {
                $address = (string) get_post_meta($property->ID, 'property_address', true);

                if (!isset($by_address[$address])) {
                    $log[] = '[skip] Không có ảnh trong JSON: ' . esc_html($address);
                    continue;
                }

                $current = (string) get_post_meta($property->ID, 'property_image', true);
                $current_id = (int) get_post_meta($property->ID, 'property_image_id', true);
                if (!$force && $current !== '' && strpos($current, $site_url) === 0 && $current_id > 0) {
                    $skipped++;
                    continue;
                }

                // Force: delete old attachment first
                if ($force && $current_id > 0) {
                    wp_delete_attachment($current_id, true);
                    delete_post_meta($property->ID, 'property_image_id');
                }

                $remote = $by_address[$address]['image'];
                $zpid = $by_address[$address]['zpid'];

                $tmp = download_url($remote);
                if (is_wp_error($tmp)) {
                    $log[] = '<span style="color:orange">[fail] ' . esc_html($address) . ' — ' . esc_html($tmp->get_error_message()) . '</span>';
                    $failed++;
                    continue;
                }

                $file_array = [
                    'name' => sanitize_file_name('property-' . $property->ID . ($zpid !== '' ? '-' . $zpid : '') . '.jpg'),
                    'tmp_name' => $tmp,
                ];

                $attachment_id = media_handle_sideload($file_array, $property->ID, $address);
                if (is_wp_error($attachment_id)) {
                    @unlink($tmp);
                    $log[] = '<span style="color:orange">[fail] ' . esc_html($address) . ' — ' . esc_html($attachment_id->get_error_message()) . '</span>';
                    $failed++;
                    continue;
                }

                $local_url = wp_get_attachment_url($attachment_id);
                update_post_meta($property->ID, 'property_image', $local_url);
                update_post_meta($property->ID, 'property_image_id', (string) $attachment_id);

                $log[] = '[ok] #' . $property->ID . ' → ' . esc_html(basename($local_url));
                $downloaded++;
            }

            $log[] = '<strong style="color:green">Xong: tải ' . $downloaded . ' ảnh, bỏ qua ' . $skipped . ', lỗi ' . $failed . '.</strong>';
        }
    }

    // Count current properties
    $count = wp_count_posts('property');
    $pub_count = $count->publish ?? 0;

    // Count properties with local images
    global $wpdb;
    $local_img_count = (int) $wpdb->get_var(
        "SELECT COUNT(*) FROM {$wpdb->postmeta} pm
         JOIN {$wpdb->posts} p ON p.ID = pm.post_id
         WHERE p.post_type='property' AND p.post_status='publish'
         AND pm.meta_key='property_image_id' AND pm.meta_value != ''"
    );

    ?>
    <div class="wrap">
        <h1>Import Zillow → Bất động sản</h1>

        <?php if (!$json_exists): ?>
            <div class="notice notice-error"><p>Không tìm thấy file <code>inc/zillow-listings.json</code></p></div>
        <?php else: ?>
            <?php
            $json_data = json_decode((string) file_get_contents($json_path), true);
            $json_count = is_array($json_data) ? count($json_data) : 0;
            ?>
            <div style="background:#fff;border:1px solid #c3c4c7;border-radius:4px;padding:16px 20px;margin:16px 0;max-width:600px;">
                <h2 style="margin-top:0">Tình trạng hiện tại</h2>
                <table style="border-collapse:collapse;width:100%">
                    <tr><td style="padding:4px 0">Listings trong JSON:</td><td><strong><?php echo $json_count; ?></strong></td></tr>
                    <tr><td style="padding:4px 0">Properties trong WordPress:</td><td><strong><?php echo $pub_count; ?></strong></td></tr>
                    <tr><td style="padding:4px 0">Có ảnh local (đã tải):</td><td><strong><?php echo $local_img_count; ?></strong></td></tr>
                </table>
            </div>

            <?php if (!empty($log)): ?>
                <div style="background:#f6f7f7;border:1px solid #c3c4c7;border-radius:4px;padding:12px 16px;margin:16px 0;max-width:700px;max-height:400px;overflow-y:auto;font-family:monospace;font-size:13px;">
                    <?php foreach ($log as $line): ?>
                        <div><?php echo $line; ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div style="display:flex;gap:16px;flex-wrap:wrap;margin-top:16px;">
                <form method="post" style="background:#fff;border:1px solid #c3c4c7;border-radius:4px;padding:20px;max-width:280px;">
                    <?php wp_nonce_field('zillow_import'); ?>
                    <input type="hidden" name="zillow_action" value="reset_import" />
                    <h3 style="margin-top:0">Bước 1: Reset &amp; Import</h3>
                    <p style="color:#666;font-size:13px;">Xóa toàn bộ bất động sản cũ và import lại từ <code>zillow-listings.json</code> (<?php echo $json_count; ?> listings).</p>
                    <p style="color:#d63638;font-size:12px;">⚠️ Sẽ xóa tất cả bất động sản hiện tại.</p>
                    <button type="submit" class="button button-primary" onclick="return confirm('Xóa <?php echo $pub_count; ?> bất động sản và import lại <?php echo $json_count; ?> từ JSON?')">
                        Reset &amp; Import từ JSON
                    </button>
                </form>

                <form method="post" style="background:#fff;border:1px solid #c3c4c7;border-radius:4px;padding:20px;max-width:280px;">
                    <?php wp_nonce_field('zillow_import'); ?>
                    <input type="hidden" name="zillow_action" value="download_images" />
                    <h3 style="margin-top:0">Bước 2: Tải ảnh từ Zillow</h3>
                    <p style="color:#666;font-size:13px;">Tải ảnh từ Zillow về Media Library. Bỏ qua các property đã có ảnh local.</p>
                    <p style="color:#856404;font-size:12px;">⏱ Có thể mất vài phút tùy số lượng ảnh.</p>
                    <button type="submit" class="button button-secondary" style="margin-bottom:8px;display:block">
                        Tải ảnh từ Zillow (<?php echo $json_count - $local_img_count; ?> cần tải)
                    </button>
                </form>

                <form method="post" style="background:#fff;border:1px solid #c3c4c7;border-radius:4px;padding:20px;max-width:280px;">
                    <?php wp_nonce_field('zillow_import'); ?>
                    <input type="hidden" name="zillow_action" value="force_download_images" />
                    <h3 style="margin-top:0">Bước 2b: Force tải lại ảnh</h3>
                    <p style="color:#666;font-size:13px;">Xóa ảnh cũ và tải lại tất cả ảnh từ Zillow (chất lượng cao <code>p_h</code>). Dùng khi ảnh bị sai hoặc muốn cập nhật mới.</p>
                    <p style="color:#d63638;font-size:12px;">⚠️ Sẽ xóa ảnh cũ trong Media Library.</p>
                    <button type="submit" class="button" style="background:#f0f6fc;border-color:#0073aa;color:#0073aa" onclick="return confirm('Xóa và tải lại tất cả <?php echo $local_img_count; ?> ảnh từ Zillow?')">
                        Force tải lại <?php echo $local_img_count; ?> ảnh
                    </button>
                </form>
            </div>

            <hr style="margin:24px 0">
            <h3>Danh sách listings trong JSON</h3>
            <table class="wp-list-table widefat fixed striped" style="max-width:900px">
                <thead><tr>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Giá</th>
                    <th>Ngủ/Tắm/Sqft</th>
                    <th>Đại diện</th>
                    <th>Ảnh</th>
                </tr></thead>
                <tbody>
                <?php foreach ($json_data as $item): ?>
                    <tr>
                        <td><?php echo esc_html($item['address'] ?? ''); ?></td>
                        <td><?php echo esc_html($item['status'] ?? ''); ?></td>
                        <td><?php echo esc_html($item['price'] ? '$' . number_format((float)$item['price']) : ($item['sold_date'] ? 'Đã bán ' . $item['sold_date'] : '')); ?></td>
                        <td><?php echo esc_html(implode('/', array_filter([(string)($item['bedrooms']??''), (string)($item['bathrooms']??''), (string)($item['sqft']??'')]))); ?></td>
                        <td><?php echo esc_html($item['represented'] ?? ''); ?></td>
                        <td><?php if (!empty($item['image'])): ?><img src="<?php echo esc_url($item['image']); ?>" style="width:80px;height:53px;object-fit:cover;border-radius:3px"><?php endif; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <?php
}
