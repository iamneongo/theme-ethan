<?php
/**
 * Ethan Dao vanilla theme — Property CPT, meta boxes, and render helpers.
 */

if (!defined('ABSPATH')) {
    exit;
}

function ethan_dao_vanilla_register_property_cpt(): void
{
    register_post_type('property', [
        'labels' => [
            'name' => 'Bất động sản',
            'singular_name' => 'Bất động sản',
            'add_new' => 'Thêm bất động sản',
            'add_new_item' => 'Thêm bất động sản mới',
            'edit_item' => 'Sửa bất động sản',
            'new_item' => 'Bất động sản mới',
            'view_item' => 'Xem bất động sản',
            'search_items' => 'Tìm bất động sản',
            'not_found' => 'Không tìm thấy bất động sản nào',
            'all_items' => 'Tất cả bất động sản',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => false,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-home',
        'menu_position' => 26,
        'supports' => ['title'],
        'rewrite' => false,
        'capability_type' => 'post',
    ]);
}
add_action('init', 'ethan_dao_vanilla_register_property_cpt');

function ethan_dao_vanilla_property_meta_fields(): array
{
    return [
        'property_status' => ['label' => 'Trạng thái', 'type' => 'select', 'options' => ['for sale' => 'Đang bán', 'sold' => 'Đã bán']],
        'property_price' => ['label' => 'Giá (USD, số nguyên)', 'type' => 'number'],
        'property_price_text' => ['label' => 'Hiển thị giá (tùy chọn, bỏ trống để tự động)', 'type' => 'text'],
        'property_address' => ['label' => 'Địa chỉ đầy đủ', 'type' => 'text'],
        'property_city' => ['label' => 'Thành phố', 'type' => 'text'],
        'property_bedrooms' => ['label' => 'Số phòng ngủ', 'type' => 'text'],
        'property_bathrooms' => ['label' => 'Số phòng tắm', 'type' => 'text'],
        'property_sqft' => ['label' => 'Diện tích (Sq.Ft.)', 'type' => 'text'],
        'property_details' => ['label' => 'Chi tiết (vd: Đại diện người mua)', 'type' => 'text'],
        'property_image' => ['label' => 'Ảnh chính (chọn từ thư viện)', 'type' => 'media'],
        'property_sold_date' => ['label' => 'Ngày bán (vd: 7/27/2026)', 'type' => 'text'],
        'property_zpid' => ['label' => 'ZPID', 'type' => 'text'],
        'property_order' => ['label' => 'Thứ tự (nhỏ = lên trước)', 'type' => 'number'],
    ];
}

function ethan_dao_vanilla_add_property_meta_box(): void
{
    add_meta_box('ethan-property-details', 'Chi tiết bất động sản', 'ethan_dao_vanilla_render_property_meta_box', 'property', 'normal', 'high');
}
add_action('add_meta_boxes', 'ethan_dao_vanilla_add_property_meta_box');

function ethan_dao_vanilla_enqueue_property_media(string $hook): void
{
    if ('post.php' !== $hook && 'post-new.php' !== $hook) {
        return;
    }
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'property') {
        return;
    }
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'ethan_dao_vanilla_enqueue_property_media');

function ethan_dao_vanilla_render_property_meta_box(WP_Post $post): void
{
    wp_nonce_field('ethan_property_save', 'ethan_property_nonce');
    ?>
    <style>
    #ethan-property-details .ethan-field { margin: 0 0 16px; }
    .ethan-field label { display: block; font-weight: 600; margin-bottom: 5px; font-size: 13px; }
    .ethan-field input[type=text],.ethan-field input[type=number],.ethan-field select { width: 100%; max-width: 520px; }
    .ethan-media-preview img { max-width: 240px; height: auto; display: block; margin: 8px 0; border-radius: 6px; border: 1px solid #dcdcde; }
    .ethan-section-title { margin: 20px 0 4px; padding: 8px 12px; background: #f0f0f1; border-left: 3px solid #2271b1; font-weight: 700; font-size: 13px; }
    /* Gallery */
    .ethan-gallery-wrap { border: 1px solid #dcdcde; border-radius: 4px; background: #f6f7f7; padding: 10px; margin: 8px 0; }
    .ethan-gallery-grid { display: flex; flex-wrap: wrap; gap: 8px; min-height: 60px; }
    .ethan-gallery-item { position: relative; width: 110px; cursor: grab; }
    .ethan-gallery-item img { width: 110px; height: 82px; object-fit: cover; border-radius: 4px; border: 2px solid #dcdcde; display: block; }
    .ethan-gallery-item.sortable-ghost { opacity: .4; }
    .ethan-gallery-remove { position: absolute; top: -7px; right: -7px; width: 22px; height: 22px; border-radius: 50%; background: #d63638; color: #fff; font-size: 15px; line-height: 22px; text-align: center; cursor: pointer; border: 0; padding: 0; font-weight: 700; }
    .ethan-gallery-empty { color: #999; font-size: 12px; margin: auto 0; line-height: 60px; }
    </style>

    <p class="ethan-section-title">Thông tin bất động sản</p>
    <?php foreach (ethan_dao_vanilla_property_meta_fields() as $key => $field): ?>
        <?php $value = (string) get_post_meta($post->ID, $key, true); ?>
        <div class="ethan-field">
            <label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($field['label']); ?></label>
            <?php if ($field['type'] === 'select'): ?>
                <select id="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($key); ?>">
                    <?php foreach ($field['options'] as $val => $lbl): ?>
                        <option value="<?php echo esc_attr($val); ?>"<?php selected($value, $val); ?>><?php echo esc_html($lbl); ?></option>
                    <?php endforeach; ?>
                </select>
            <?php elseif ($field['type'] === 'media'): ?>
                <div class="ethan-media-preview" data-preview-for="<?php echo esc_attr($key); ?>">
                    <?php if ($value !== ''): ?><img src="<?php echo esc_url($value); ?>" alt="" /><?php endif; ?>
                </div>
                <input type="hidden" id="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>" />
                <button type="button" class="button ethan-media-pick" data-target="<?php echo esc_attr($key); ?>">Chọn ảnh bìa từ thư viện</button>
                <?php if ($value !== ''): ?>
                    <button type="button" class="button-link-delete ethan-media-clear" data-target="<?php echo esc_attr($key); ?>" style="margin-left:8px">Xóa ảnh</button>
                <?php endif; ?>
            <?php else: ?>
                <input type="<?php echo esc_attr($field['type']); ?>" id="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value); ?>" />
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <?php
    // Gallery section
    $gallery_ids = ethan_dao_vanilla_property_gallery_ids($post->ID);
    ?>
    <p class="ethan-section-title">Thư viện ảnh <span style="font-weight:400;color:#666">(kéo để sắp xếp · click × để xóa)</span></p>
    <div class="ethan-field">
        <div class="ethan-gallery-wrap">
            <div class="ethan-gallery-grid" id="ethan-gallery-grid">
                <?php if (empty($gallery_ids)): ?>
                    <span class="ethan-gallery-empty">Chưa có ảnh nào. Nhấn "+ Thêm ảnh" để thêm.</span>
                <?php else: ?>
                    <?php foreach ($gallery_ids as $gid): ?>
                        <?php $thumb = wp_get_attachment_image_url((int) $gid, 'thumbnail'); ?>
                        <?php if ($thumb): ?>
                            <div class="ethan-gallery-item" data-id="<?php echo esc_attr($gid); ?>">
                                <img src="<?php echo esc_url($thumb); ?>" alt="" />
                                <button type="button" class="ethan-gallery-remove" title="Xóa ảnh này">×</button>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <button type="button" class="button button-primary" id="ethan-gallery-add" style="margin-top:8px">+ Thêm ảnh vào thư viện</button>
        <input type="hidden" name="property_gallery_ids" id="property_gallery_ids_input"
               value="<?php echo esc_attr(implode(',', $gallery_ids)); ?>" />
        <p style="color:#666;font-size:12px;margin:6px 0 0">Ảnh đầu tiên sẽ dùng làm ảnh bìa trên trang chi tiết nếu không có ảnh bìa riêng.</p>
    </div>

    <script>
    (function($) {
        $(function() {
            // ── Single media pick (cover image) ──
            var singleFrame = null;
            $(document).on('click', '.ethan-media-pick', function(e) {
                e.preventDefault();
                var target = $(this).data('target'),
                    $input = $('#' + target),
                    $preview = $('[data-preview-for="' + target + '"]');
                if (singleFrame) { singleFrame.open(); return; }
                singleFrame = wp.media({ title: 'Chọn ảnh bìa', button: { text: 'Dùng ảnh này' }, multiple: false, library: { type: 'image' } });
                singleFrame.on('select', function() {
                    var att = singleFrame.state().get('selection').first().toJSON();
                    var url = att.sizes && att.sizes.large ? att.sizes.large.url : att.url;
                    $input.val(url);
                    $preview.html('<img src="' + url + '" alt="" />');
                    $('[data-target="' + target + '"].ethan-media-clear').show();
                });
                singleFrame.open();
            });
            $(document).on('click', '.ethan-media-clear', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('#' + target).val('');
                $('[data-preview-for="' + target + '"]').html('');
                $(this).hide();
            });

            // ── Gallery ──
            var $grid = $('#ethan-gallery-grid');
            var $input = $('#property_gallery_ids_input');

            function syncIds() {
                var ids = [];
                $grid.find('.ethan-gallery-item').each(function() { ids.push($(this).data('id')); });
                $input.val(ids.join(','));
                // Show/hide empty message
                if (ids.length === 0) {
                    if (!$grid.find('.ethan-gallery-empty').length) {
                        $grid.append('<span class="ethan-gallery-empty">Chưa có ảnh nào. Nhấn "+ Thêm ảnh" để thêm.</span>');
                    }
                } else {
                    $grid.find('.ethan-gallery-empty').remove();
                }
            }

            function addItem(id, thumbUrl) {
                $grid.find('.ethan-gallery-empty').remove();
                var $item = $('<div class="ethan-gallery-item" data-id="' + id + '">' +
                    '<img src="' + thumbUrl + '" alt="" />' +
                    '<button type="button" class="ethan-gallery-remove" title="Xóa ảnh này">×</button>' +
                    '</div>');
                $grid.append($item);
                syncIds();
            }

            // Remove button
            $grid.on('click', '.ethan-gallery-remove', function() {
                $(this).closest('.ethan-gallery-item').remove();
                syncIds();
            });

            // Add button — opens media picker in multi-select mode
            var galleryFrame = null;
            $('#ethan-gallery-add').on('click', function() {
                if (galleryFrame) { galleryFrame.open(); return; }
                galleryFrame = wp.media({
                    title: 'Chọn ảnh cho thư viện',
                    button: { text: 'Thêm vào thư viện' },
                    multiple: true,
                    library: { type: 'image' }
                });
                galleryFrame.on('select', function() {
                    var existing = [];
                    $grid.find('.ethan-gallery-item').each(function() { existing.push(String($(this).data('id'))); });
                    galleryFrame.state().get('selection').each(function(att) {
                        var id = String(att.get('id'));
                        if (existing.indexOf(id) !== -1) return; // skip duplicates
                        var sizes = att.get('sizes');
                        var thumb = sizes && sizes.thumbnail ? sizes.thumbnail.url : att.get('url');
                        addItem(id, thumb);
                        existing.push(id);
                    });
                });
                galleryFrame.open();
            });

            // ── Drag-to-sort (native HTML5, no library needed) ──
            var dragging = null;
            $grid.on('dragstart', '.ethan-gallery-item', function(e) {
                dragging = this;
                $(this).css('opacity', '.4');
                e.originalEvent.dataTransfer.effectAllowed = 'move';
            });
            $grid.on('dragend', '.ethan-gallery-item', function() {
                $(this).css('opacity', '');
                dragging = null;
                syncIds();
            });
            $grid.on('dragover', '.ethan-gallery-item', function(e) {
                e.preventDefault();
                e.originalEvent.dataTransfer.dropEffect = 'move';
                if (this !== dragging) {
                    var rect = this.getBoundingClientRect();
                    var mid = rect.left + rect.width / 2;
                    if (e.originalEvent.clientX < mid) {
                        $grid[0].insertBefore(dragging, this);
                    } else {
                        $grid[0].insertBefore(dragging, this.nextSibling);
                    }
                }
            });
            $grid.find('.ethan-gallery-item').attr('draggable', 'true');
            $grid.on('DOMNodeInserted', '.ethan-gallery-item', function() {
                $(this).attr('draggable', 'true');
            });
        });
    })(jQuery);
    </script>
    <?php
}

function ethan_dao_vanilla_save_property_meta(int $post_id): void
{
    if (!isset($_POST['ethan_property_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['ethan_property_nonce'])), 'ethan_property_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    foreach (array_keys(ethan_dao_vanilla_property_meta_fields()) as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, $key, sanitize_text_field(wp_unslash($_POST[$key])));
        }
    }

    // Save gallery IDs array
    $raw_gallery = isset($_POST['property_gallery_ids']) ? sanitize_text_field(wp_unslash($_POST['property_gallery_ids'])) : '';
    if ($raw_gallery === '') {
        update_post_meta($post_id, 'property_gallery_ids', []);
    } else {
        $ids = array_values(array_filter(array_map('intval', explode(',', $raw_gallery))));
        update_post_meta($post_id, 'property_gallery_ids', $ids);
    }
}
add_action('save_post_property', 'ethan_dao_vanilla_save_property_meta');

function ethan_dao_vanilla_property_meta(string $key, int $post_id = 0): string
{
    if ($post_id === 0) {
        $post_id = (int) get_the_ID();
    }
    $value = (string) get_post_meta($post_id, $key, true);
    if (is_array($value)) {
        $value = '';
    }
    return $value;
}

function ethan_dao_vanilla_property_gallery_ids(int $post_id): array
{
    $ids = get_post_meta($post_id, 'property_gallery_ids', true);
    if (!is_array($ids)) {
        return [];
    }
    $clean = [];
    foreach ($ids as $id) {
        $id = (int) $id;
        if ($id > 0 && get_post_type($id) === 'attachment') {
            $clean[] = $id;
        }
    }
    return array_values(array_unique($clean));
}

function ethan_dao_vanilla_property_gallery_urls(int $post_id): array
{
    $urls = [];
    foreach (ethan_dao_vanilla_property_gallery_ids($post_id) as $id) {
        $url = wp_get_attachment_image_url($id, 'large');
        if ($url) {
            $urls[] = $url;
        }
    }
    if (empty($urls)) {
        $single = ethan_dao_vanilla_property_meta('property_image', $post_id);
        if ($single !== '') {
            $urls[] = $single;
        }
    }
    return $urls;
}

function ethan_dao_vanilla_get_properties(array $args = []): array
{
    $defaults = [
        'numberposts' => -1,
        'post_type' => 'property',
        'post_status' => 'publish',
        'orderby' => 'meta_value_num',
        'meta_key' => 'property_order',
        'order' => 'ASC',
    ];
    return get_posts(wp_parse_args($args, $defaults));
}

function ethan_dao_vanilla_property_url(int $post_id): string
{
    return home_url('/property/' . $post_id . '/');
}

function ethan_dao_vanilla_render_property_card(WP_Post $property): string
{
    $status = ethan_dao_vanilla_property_meta('property_status', $property->ID);
    $status_label = ($status === 'for sale') ? 'Đang bán' : 'Đã bán';
    $address = ethan_dao_vanilla_property_meta('property_address', $property->ID);

    $price_text = ethan_dao_vanilla_property_meta('property_price_text', $property->ID);
    if ($price_text === '' && $status === 'for sale') {
        $price = ethan_dao_vanilla_property_meta('property_price', $property->ID);
        if ($price !== '' && is_numeric($price)) {
            $price_text = '$' . number_format((float) $price);
        }
    }
    if ($price_text === '' && $status === 'sold') {
        $price_text = 'Đã bán';
    }

    $city = strtolower(ethan_dao_vanilla_property_meta('property_city', $property->ID));
    $image = ethan_dao_vanilla_property_meta('property_image', $property->ID);
    if ($image === '') {
        $image = get_template_directory_uri() . '/assets/images/ethan-home-8.jpg';
    }

    $city_label = ethan_dao_vanilla_property_meta('property_city', $property->ID);
    $subtitle = ($price_text !== '' && $price_text !== 'Đã bán') ? $price_text : $city_label;

    return '<a class="property-card" href="' . esc_url(ethan_dao_vanilla_property_url($property->ID)) . '">'
        . '<article data-status="' . esc_attr($status) . '" data-city="' . esc_attr($city) . '">'
        . '<img src="' . esc_url($image) . '" alt="' . esc_attr($address) . '" loading="lazy" />'
        . '<span class="' . ($status === 'for sale' ? 'sale' : '') . '">' . esc_html($status_label) . '</span>'
        . '<div><h3>' . esc_html($address) . '</h3>'
        . ($subtitle !== '' ? '<p>' . esc_html($subtitle) . '</p>' : '')
        . '</div>'
        . '</article></a>';
}

function ethan_dao_vanilla_render_property_list(): string
{
    $properties = ethan_dao_vanilla_get_properties();
    if (empty($properties)) {
        return '';
    }

    $html = '';
    foreach ($properties as $property) {
        $html .= ethan_dao_vanilla_render_property_card($property);
    }
    return $html;
}

function ethan_dao_vanilla_output_search_data(): void
{
    $properties = ethan_dao_vanilla_get_properties();
    $data = [];
    foreach ($properties as $p) {
        $status  = ethan_dao_vanilla_property_meta('property_status', $p->ID);
        $address = ethan_dao_vanilla_property_meta('property_address', $p->ID);
        $city    = ethan_dao_vanilla_property_meta('property_city', $p->ID);
        $price   = ethan_dao_vanilla_property_meta('property_price', $p->ID);
        $pt      = ethan_dao_vanilla_property_meta('property_price_text', $p->ID);
        $image   = ethan_dao_vanilla_property_meta('property_image', $p->ID);

        if ($pt === '' && $status === 'for sale' && $price !== '' && is_numeric($price)) {
            $pt = '$' . number_format((float) $price);
        }

        $data[] = [
            'url'     => ethan_dao_vanilla_property_url($p->ID),
            'address' => $address,
            'city'    => $city,
            'status'  => $status,
            'price'   => $pt,
            'image'   => $image !== '' ? $image : get_template_directory_uri() . '/assets/images/ethan-home-8.jpg',
        ];
    }
    echo '<script>window.ethanProperties=' . wp_json_encode($data) . ';</script>' . "\n";
}
add_action('wp_footer', 'ethan_dao_vanilla_output_search_data');
