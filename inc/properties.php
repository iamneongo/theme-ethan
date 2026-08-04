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

    echo '<style>#ethan-property-details .ethan-field{margin:0 0 12px;}.ethan-field label{display:block;font-weight:600;margin-bottom:4px;}.ethan-field input{width:100%;max-width:480px;}.ethan-media-preview img{max-width:320px;height:auto;display:block;margin:8px 0;border-radius:6px;border:1px solid #dcdcde;}</style>';

    foreach (ethan_dao_vanilla_property_meta_fields() as $key => $field) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<div class="ethan-field"><label for="' . esc_attr($key) . '">' . esc_html($field['label']) . '</label>';
        if ($field['type'] === 'select') {
            echo '<select id="' . esc_attr($key) . '" name="' . esc_attr($key) . '">';
            foreach ($field['options'] as $val => $label) {
                echo '<option value="' . esc_attr($val) . '"' . selected($value, $val, false) . '>' . esc_html($label) . '</option>';
            }
            echo '</select>';
        } elseif ($field['type'] === 'media') {
            $preview = $value !== '' ? '<img src="' . esc_url($value) . '" alt="" />' : '';
            echo '<div class="ethan-media-preview" data-preview-for="' . esc_attr($key) . '">' . $preview . '</div>';
            echo '<input type="hidden" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" />';
            echo '<button type="button" class="button ethan-media-pick" data-target="' . esc_attr($key) . '">Chọn ảnh từ thư viện</button> ';
            if ($value !== '') {
                echo '<button type="button" class="button-link-delete ethan-media-clear" data-target="' . esc_attr($key) . '">Xóa ảnh</button>';
            }
        } else {
            echo '<input type="' . esc_attr($field['type']) . '" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" />';
        }
        echo '</div>';
    }

    echo '<script>(function($){$(function(){var frame=null;$(document).on("click",".ethan-media-pick",function(e){e.preventDefault();var target=$(this).data("target"),$input=$("#"+target),$preview=$("[data-preview-for=\""+target+"\"]");if(frame){frame.open();return;}frame=wp.media({title:"Chọn ảnh",button:{text:"Dùng ảnh này"},multiple:false,library:{type:"image"}});frame.on("select",function(){var att=frame.state().get("selection").first().toJSON(),url=att.sizes&&att.sizes.large?att.sizes.large.url:att.url;$input.val(url);$preview.html(\'<img src="\'+url+\'" alt="" />\');$(document).find(".ethan-media-clear[data-target=\\""+target+"\\"]").show();});frame.open();});$(document).on("click",".ethan-media-clear",function(e){e.preventDefault();var target=$(this).data("target");$("#"+target).val("");$("[data-preview-for=\\""+target+"\\"]").html("");$(this).hide();});});})(jQuery);</script>';
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

    $details = ethan_dao_vanilla_property_meta('property_details', $property->ID);
    $small = [];
    if ($details !== '') {
        $small[] = $details;
    }

    $beds = ethan_dao_vanilla_property_meta('property_bedrooms', $property->ID);
    $baths = ethan_dao_vanilla_property_meta('property_bathrooms', $property->ID);
    $sqft = ethan_dao_vanilla_property_meta('property_sqft', $property->ID);
    if ($beds !== '' || $baths !== '' || $sqft !== '') {
        $parts = array_filter([
            $beds !== '' ? $beds . ' Phòng ngủ' : '',
            $baths !== '' ? $baths . ' Phòng tắm' : '',
            $sqft !== '' ? number_format((float) str_replace(',', '', $sqft)) . ' Sq.Ft.' : '',
        ]);
        $small[] = implode(' - ', $parts);
    }

    $sold_date = ethan_dao_vanilla_property_meta('property_sold_date', $property->ID);
    if ($status === 'sold' && $sold_date !== '') {
        $small[] = 'Đã bán ' . $sold_date;
    }

    return '<a class="property-card" href="' . esc_url(ethan_dao_vanilla_property_url($property->ID)) . '">'
        . '<article data-status="' . esc_attr($status) . '" data-city="' . esc_attr($city) . '">'
        . '<img src="' . esc_url($image) . '" alt="' . esc_attr($address) . '" loading="lazy" />'
        . '<span class="' . ($status === 'for sale' ? 'sale' : '') . '">' . esc_html($status_label) . '</span>'
        . '<div><h3>' . esc_html($price_text) . '</h3>'
        . '<p>' . esc_html($address) . '</p>'
        . '<small>' . esc_html(implode(' - ', $small)) . '</small></div>'
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
