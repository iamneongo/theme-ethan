<?php
/**
 * CLI import of Zillow listing data into the Property CPT.
 *
 * Usage: wp eval-file inc/import-properties.php [--json=/path/to/all_listings.json] [--reset]
 *
 * The JSON file is an array of objects with fields:
 *   status (for sale|sold), address, city, price (int), price_text, bedrooms,
 *   bathrooms, sqft, details, represented, image (URL), sold_date, zpid.
 */

if (!defined('WP_CLI')) {
    fwrite(STDERR, "This script must run under WP-CLI.\n");
    exit(1);
}

WP_CLI::log('Loading JSON…');

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
$assoc = $args;

$json_path = $assoc['json'] ?? get_template_directory() . '/inc/zillow-listings.json';
if (!file_exists($json_path)) {
    WP_CLI::error('JSON file not found: ' . $json_path);
}

$data = json_decode((string) file_get_contents($json_path), true);
if (!is_array($data)) {
    WP_CLI::error('Invalid JSON at ' . $json_path);
}

if (!empty($assoc['reset'])) {
    $existing = get_posts(['post_type' => 'property', 'numberposts' => -1, 'post_status' => 'any']);
    foreach ($existing as $post) {
        wp_delete_post($post->ID, true);
    }
    WP_CLI::log('Deleted ' . count($existing) . ' existing properties.');
}

$order = 1;
$imported = 0;
$skipped = 0;

foreach ($data as $item) {
    $address = trim((string) ($item['address'] ?? ''));
    if ($address === '') {
        $skipped++;
        continue;
    }

    $status = (($item['status'] ?? '') === 'for sale') ? 'for sale' : 'sold';

    $existing = get_posts([
        'post_type' => 'property',
        'numberposts' => 1,
        'post_status' => 'any',
        'meta_query' => [
            ['key' => 'property_address', 'value' => $address],
        ],
    ]);

    if ($existing) {
        WP_CLI::log('Skip (exists): ' . $address);
        $skipped++;
        continue;
    }

    $post_id = wp_insert_post([
        'post_type' => 'property',
        'post_status' => 'publish',
        'post_title' => $address,
    ]);

    if (is_wp_error($post_id)) {
        WP_CLI::warning('Failed: ' . $address . ' — ' . $post_id->get_error_message());
        $skipped++;
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
    update_post_meta($post_id, 'property_details', trim((string) ($item['details'] ?? '')));
    update_post_meta($post_id, 'property_image', trim((string) ($item['image'] ?? '')));
    update_post_meta($post_id, 'property_sold_date', trim((string) ($item['sold_date'] ?? '')));
    update_post_meta($post_id, 'property_zpid', (string) ($item['zpid'] ?? ''));
    update_post_meta($post_id, 'property_order', (string) $order);

    $role = trim((string) ($item['represented'] ?? ''));
    if ($role !== '') {
        update_post_meta($post_id, 'property_details', 'Đại diện người ' . ($role === 'Seller' ? 'bán' : 'mua'));
    }

    WP_CLI::log(sprintf('[%s] #%d %s', $status, $post_id, $address));
    $imported++;
    $order++;
}

WP_CLI::success("Done. Imported: $imported, Skipped: $skipped.");
