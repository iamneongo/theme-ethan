<?php
/**
 * Ethan Dao Vanilla theme bootstrap.
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/properties.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/template-parts.php';

if (is_admin()) {
    require_once get_template_directory() . '/inc/zillow-import-tool.php';
}

function ethan_dao_vanilla_static_pages(): array
{
    return [
        'about'           => 'about.php',
        'buy'             => 'buy.php',
        'contact'         => 'contact.php',
        'index'           => 'index.php',
        'properties'      => 'properties.php',
        'property-details' => 'property-details.php',
        'sell'            => 'sell.php',
    ];
}

function ethan_dao_vanilla_query_vars(array $vars): array
{
    $vars[] = 'ethan_static_page';
    $vars[] = 'ethan_property_id';
    return $vars;
}
add_filter('query_vars', 'ethan_dao_vanilla_query_vars');

function ethan_dao_vanilla_rewrite_rules(): void
{
    foreach (ethan_dao_vanilla_static_pages() as $slug => $file) {
        if ($slug === 'index') {
            continue;
        }
        add_rewrite_rule('^' . preg_quote($slug, '/') . '/?$', 'index.php?ethan_static_page=' . $slug, 'top');
    }

    add_rewrite_rule('^property/([0-9]+)/?$', 'index.php?ethan_property_id=$matches[1]', 'top');
}
add_action('init', 'ethan_dao_vanilla_rewrite_rules');

function ethan_dao_vanilla_template_include(string $template): string
{
    $property_id = (int) get_query_var('ethan_property_id');
    if ($property_id > 0 && get_post_type($property_id) === 'property') {
        $candidate = get_template_directory() . '/templates/property-details.php';
        if (file_exists($candidate)) {
            return $candidate;
        }
    }

    $slug = get_query_var('ethan_static_page');
    if (empty($slug) && (is_front_page() || is_home())) {
        $slug = 'index';
    }

    $pages = ethan_dao_vanilla_static_pages();
    if ($slug && isset($pages[$slug])) {
        $candidate = get_template_directory() . '/templates/' . $pages[$slug];
        if (file_exists($candidate)) {
            return $candidate;
        }
    }

    return $template;
}
add_filter('template_include', 'ethan_dao_vanilla_template_include');

function ethan_dao_vanilla_activate(): void
{
    ethan_dao_vanilla_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'ethan_dao_vanilla_activate');

function ethan_dao_vanilla_deactivate(): void
{
    flush_rewrite_rules();
}
add_action('switch_theme', 'ethan_dao_vanilla_deactivate');

function ethan_dao_vanilla_register_menu_locations(): void
{
    register_nav_menus([
        'primary' => 'Primary Menu',
        'drawer' => 'Mobile Menu',
        'footer' => 'Footer Menu',
    ]);
}
add_action('after_setup_theme', 'ethan_dao_vanilla_register_menu_locations');

function ethan_dao_vanilla_page_titles(): array
{
    return [
        'buy'        => 'Mua nhà',
        'sell'       => 'Bán nhà',
        'properties' => 'Bất động sản',
        'about'      => 'Về Ethan',
        'contact'    => 'Liên hệ',
    ];
}

function ethan_dao_vanilla_menu_blueprints(): array
{
    return [
        'primary' => [
            ['slug' => 'buy',        'title' => 'Mua nhà'],
            ['slug' => 'sell',       'title' => 'Bán nhà'],
            ['slug' => 'properties', 'title' => 'Bất động sản'],
            ['slug' => 'about',      'title' => 'Giới thiệu'],
            ['slug' => 'contact',    'title' => 'Liên hệ'],
        ],
        'drawer' => [
            ['slug' => 'home',       'title' => 'Trang chủ'],
            ['slug' => 'buy',        'title' => 'Mua nhà'],
            ['slug' => 'sell',       'title' => 'Bán nhà'],
            ['slug' => 'properties', 'title' => 'Bất động sản'],
            ['slug' => 'about',      'title' => 'Giới thiệu'],
            ['slug' => 'contact',    'title' => 'Liên hệ'],
        ],
        'footer' => [
            ['slug' => 'home',       'title' => 'Trang chủ'],
            ['slug' => 'buy',        'title' => 'Mua nhà'],
            ['slug' => 'sell',       'title' => 'Bán nhà'],
            ['slug' => 'properties', 'title' => 'Bất động sản'],
            ['slug' => 'about',      'title' => 'Giới thiệu'],
            ['slug' => 'contact',    'title' => 'Liên hệ'],
        ],
    ];
}

function ethan_dao_vanilla_get_or_create_page(string $slug, string $title): int
{
    $existing = get_page_by_path($slug);
    if ($existing instanceof WP_Post) {
        return (int) $existing->ID;
    }

    return (int) wp_insert_post([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_name' => $slug,
        'post_title' => $title,
        'post_content' => '',
    ]);
}

function ethan_dao_vanilla_create_menu_item(int $menu_id, array $item, int $parent_id = 0): int
{
    $slug = (string) ($item['slug'] ?? '');
    $title = (string) ($item['title'] ?? '');

    if ($slug === 'home') {
        return (int) wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => $title,
            'menu-item-url' => home_url('/'),
            'menu-item-type' => 'custom',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $parent_id,
        ]);
    }

    $page_titles = ethan_dao_vanilla_page_titles();
    $page_id = ethan_dao_vanilla_get_or_create_page($slug, $page_titles[$slug] ?? $title);

    return (int) wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => $title ?: ($page_titles[$slug] ?? $slug),
        'menu-item-object-id' => $page_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish',
        'menu-item-parent-id' => $parent_id,
    ]);
}

function ethan_dao_vanilla_seed_wordpress_menus(): void
{
    if (get_option('ethan_dao_vanilla_menu_seeded') === '2026-08-07-1') {
        return;
    }

    foreach (ethan_dao_vanilla_page_titles() as $slug => $title) {
        ethan_dao_vanilla_get_or_create_page($slug, $title);
    }

    $locations = get_theme_mod('nav_menu_locations', []);
    foreach (ethan_dao_vanilla_menu_blueprints() as $location => $items) {
        $menu_name = 'Ethan Dao ' . ucwords($location) . ' Menu';
        $menu = wp_get_nav_menu_object($menu_name);
        if (!$menu) {
            $menu_id = (int) wp_create_nav_menu($menu_name);
        } else {
            $menu_id = (int) $menu->term_id;
        }

        // Delete existing items to allow re-seeding
        $existing_items = wp_get_nav_menu_items($menu_id);
        if (!empty($existing_items)) {
            foreach ($existing_items as $ei) {
                wp_delete_post($ei->ID, true);
            }
        }

        foreach ($items as $item) {
            $parent_id = ethan_dao_vanilla_create_menu_item($menu_id, $item);
            foreach (($item['children'] ?? []) as $child_slug) {
                $titles = ethan_dao_vanilla_page_titles();
                ethan_dao_vanilla_create_menu_item($menu_id, [
                    'slug' => $child_slug,
                    'title' => $titles[$child_slug] ?? $child_slug,
                ], $parent_id);
            }
        }

        if (empty($locations[$location]) || $locations[$location] != $menu_id) {
            $locations[$location] = $menu_id;
        }
    }

    set_theme_mod('nav_menu_locations', $locations);
    update_option('ethan_dao_vanilla_menu_seeded', '2026-08-07-1');
}
add_action('init', 'ethan_dao_vanilla_seed_wordpress_menus', 30);

function ethan_dao_vanilla_cleanup_unused_pages(): void
{
    if (get_option('ethan_dao_vanilla_pages_cleaned') === '2026-08-07-1') {
        return;
    }

    $unused_slugs = [
        'agent-collaborations', 'blog', 'browse-properties', 'buyer-guide',
        'buyer-information', 'featured-properties', 'garland', 'home-valuation',
        'join-team', 'lavon', 'mckinney', 'neighborhoods', 'past-transactions',
        'seller-guide', 'selling-consultation', 'services', 'testimonials',
    ];

    foreach ($unused_slugs as $slug) {
        $page = get_page_by_path($slug);
        if ($page instanceof WP_Post) {
            wp_delete_post($page->ID, true);
        }
    }

    update_option('ethan_dao_vanilla_pages_cleaned', '2026-08-07-1');
}
add_action('init', 'ethan_dao_vanilla_cleanup_unused_pages', 20);

function ethan_dao_vanilla_menu_tree(string $location): array
{
    $locations = get_nav_menu_locations();
    if (empty($locations[$location])) {
        return [];
    }

    $items = wp_get_nav_menu_items((int) $locations[$location]);
    if (empty($items)) {
        return [];
    }

    $nodes = [];
    foreach ($items as $item) {
        if (trim($item->title) === 'Mua nhà') {
            continue;
        }
        $nodes[(int) $item->ID] = [
            'id' => (int) $item->ID,
            'parent' => (int) $item->menu_item_parent,
            'title' => $item->title,
            'url' => $item->url,
            'children' => [],
        ];
    }

    $tree = [];
    foreach ($nodes as $id => &$node) {
        if ($node['parent'] && isset($nodes[$node['parent']])) {
            $nodes[$node['parent']]['children'][] = &$node;
        } else {
            $tree[] = &$node;
        }
    }
    unset($node);

    return $tree;
}

function ethan_dao_vanilla_render_primary_nav(): string
{
    $items = ethan_dao_vanilla_menu_tree('primary');
    if (empty($items)) {
        return '<nav class="desktop-nav"></nav>';
    }

    $current_url = rtrim(home_url(wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH)), '/');
    
    $html = '<nav class="desktop-nav"><a href="tel:+14699895786">(469) 989-5786</a>';
    foreach ($items as $item) {
        $title = esc_html($item['title']);
        $url = esc_url($item['url']);
        $item_url = rtrim($item['url'], '/');
        
        $is_current_class = ($item_url === $current_url) ? ' is-current' : '';
        
        if (!empty($item['children'])) {
            $html .= '<div class="nav-group"><a class="nav-top' . $is_current_class . '" href="' . $url . '">' . $title . ' <svg><use href="#icon-chevron-down"/></svg></a><ul>';
            foreach ($item['children'] as $child) {
                $child_item_url = rtrim($child['url'], '/');
                $child_is_current = ($child_item_url === $current_url) ? ' class="is-current"' : '';
                $html .= '<li><a href="' . esc_url($child['url']) . '"' . $child_is_current . '>' . esc_html($child['title']) . '</a></li>';
            }
            $html .= '</ul></div>';
        } else {
            $html .= '<a href="' . $url . '" class="' . trim($is_current_class) . '">' . $title . '</a>';
        }
    }
    $html .= '<div class="nav-search-wrap"><button class="icon-button" data-nav-search-toggle aria-label="Tìm kiếm" aria-expanded="false"><svg><use href="#icon-search"/></svg></button><div class="nav-search-panel" aria-hidden="true"><input type="text" class="nav-search-input" placeholder="Tìm địa chỉ, thành phố..." autocomplete="off" spellcheck="false" /><div class="nav-search-results"></div></div></div></nav>';

    return $html;
}

function ethan_dao_vanilla_flat_menu_links(string $location): string
{
    $items = ethan_dao_vanilla_menu_tree($location);
    $current_url = rtrim(home_url(wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH)), '/');
    $links = '';
    $walk = function (array $nodes) use (&$walk, &$links, $current_url): void {
        foreach ($nodes as $node) {
            $item_url = rtrim($node['url'], '/');
            $class = ($item_url === $current_url) ? ' class="is-current"' : '';
            $links .= '<a href="' . esc_url($node['url']) . '"' . $class . '>' . esc_html($node['title']) . '</a>';
            if (!empty($node['children'])) {
                $walk($node['children']);
            }
        }
    };
    $walk($items);

    return $links;
}

function ethan_dao_vanilla_render_drawer_nav(): string
{
    return '<aside class="side-menu" data-side-menu><button class="close-menu" data-close-menu aria-label="ÄÃ³ng menu">&times;</button><nav>' .
        ethan_dao_vanilla_flat_menu_links('drawer') .
        '</nav><div class="side-contact"><a href="tel:+14699895786">(469) 989-5786</a><a href="mailto:ethandao.realtor@gmail.com">ethandao.realtor@gmail.com</a><div class="social-links gold"></div></div></aside>';
}

function ethan_dao_vanilla_render_footer_nav(): string
{
    $social = '<div class="social-links gold">'
        . '<a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/facebook/default.svg" alt="Facebook" width="22" height="22" /></a>'
        . '<a href="https://youtube.com/" target="_blank" rel="noopener" aria-label="YouTube"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/youtube/default.svg" alt="YouTube" width="22" height="22" /></a>'
        . '<a href="https://instagram.com/" target="_blank" rel="noopener" aria-label="Instagram"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/instagram/default.svg" alt="Instagram" width="22" height="22" /></a>'
        . '<a href="https://tiktok.com/" target="_blank" rel="noopener" aria-label="TikTok"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/tiktok/default.svg" alt="TikTok" width="22" height="22" /></a>'
        . '<a href="https://zillow.com/" target="_blank" rel="noopener" aria-label="Zillow"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/zillow/default.svg" alt="Zillow" width="22" height="22" /></a>'
        . '</div>';
    return '<div class="footer-nav"><nav>' . ethan_dao_vanilla_flat_menu_links('footer') . '</nav>' . $social . '</div>';
}



function ethan_dao_vanilla_enqueue_assets() {
    wp_enqueue_style('flickity-css', 'https://cdn.jsdelivr.net/npm/flickity@2.3.0/dist/flickity.min.css', array(), '2.3.0');
    wp_enqueue_script('flickity-js', 'https://cdn.jsdelivr.net/npm/flickity@2.3.0/dist/flickity.pkgd.min.js', array(), '2.3.0', false);
}
add_action('wp_enqueue_scripts', 'ethan_dao_vanilla_enqueue_assets');
