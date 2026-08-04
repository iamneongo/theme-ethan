<?php
/**
 * CLI: download each property's photo into the WP media library and point
 * the property_image meta at the local attachment.
 *
 * Usage: wp eval-file inc/import-property-images.php [--force]
 *
 * Matches properties to the Zillow JSON by address. Stores:
 *   property_image_id (attachment ID)
 *   property_image    (local attachment URL)
 * Skips properties whose image is already a local URL unless --force.
 */

if (!defined('WP_CLI')) {
    fwrite(STDERR, "This script must run under WP-CLI.\n");
    exit(1);
}

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$args = [];
if (isset($GLOBALS['argv'])) {
    foreach ($GLOBALS['argv'] as $a) {
        if (strpos($a, '--') === 0 && strpos($a, '=') !== false) {
            [$k, $v] = explode('=', substr($a, 2), 2);
            $args[$k] = $v;
        } elseif (strpos($a, '--') === 0) {
            $args[substr($a, 2)] = true;
        }
    }
}
$force = !empty($args['force']);

$json_path = get_template_directory() . '/inc/zillow-listings.json';
if (!file_exists($json_path)) {
    WP_CLI::error('JSON file not found: ' . $json_path);
}

$data = json_decode((string) file_get_contents($json_path), true);
if (!is_array($data)) {
    WP_CLI::error('Invalid JSON at ' . $json_path);
}

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

$properties = get_posts([
    'post_type' => 'property',
    'numberposts' => -1,
    'post_status' => 'any',
]);

$site_url = rtrim(home_url(), '/');
$downloaded = 0;
$skipped = 0;
$failed = 0;

foreach ($properties as $property) {
    $address = (string) get_post_meta($property->ID, 'property_address', true);

    if (!isset($by_address[$address])) {
        WP_CLI::log(sprintf('[%d] No image in JSON: %s', $property->ID, $address));
        continue;
    }

    $current = (string) get_post_meta($property->ID, 'property_image', true);
    $current_id = (int) get_post_meta($property->ID, 'property_image_id', true);
    if (!$force && $current !== '' && strpos($current, $site_url) === 0 && $current_id > 0) {
        $skipped++;
        continue;
    }

    $remote = $by_address[$address]['image'];
    $zpid = $by_address[$address]['zpid'];

    $tmp = download_url($remote);
    if (is_wp_error($tmp)) {
        WP_CLI::warning(sprintf('[%d] Download failed %s — %s', $property->ID, $address, $tmp->get_error_message()));
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
        WP_CLI::warning(sprintf('[%d] Sideload failed %s — %s', $property->ID, $address, $attachment_id->get_error_message()));
        $failed++;
        continue;
    }

    $local_url = wp_get_attachment_url($attachment_id);
    update_post_meta($property->ID, 'property_image', $local_url);
    update_post_meta($property->ID, 'property_image_id', (string) $attachment_id);

    WP_CLI::log(sprintf('[%d] %s → #%d %s', $property->ID, $address, $attachment_id, $local_url));
    $downloaded++;
}

WP_CLI::success("Done. Downloaded: $downloaded, Skipped: $skipped, Failed: $failed.");
