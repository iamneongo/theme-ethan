<?php
/**
 * Ethan Dao Vanilla theme bootstrap.
 */

if (!defined('ABSPATH')) {
    exit;
}

function ethan_dao_vanilla_static_pages(): array
{
    return [
        'about' => 'about.php',
        'agent-collaborations' => 'agent-collaborations.php',
        'blog' => 'blog.php',
        'browse-properties' => 'browse-properties.php',
        'buy' => 'buy.php',
        'buyer-guide' => 'buyer-guide.php',
        'buyer-information' => 'buyer-information.php',
        'contact' => 'contact.php',
        'featured-properties' => 'featured-properties.php',
        'garland' => 'garland.php',
        'home-valuation' => 'home-valuation.php',
        'index' => 'index.php',
        'join-team' => 'join-team.php',
        'lavon' => 'lavon.php',
        'mckinney' => 'mckinney.php',
        'neighborhoods' => 'neighborhoods.php',
        'past-transactions' => 'past-transactions.php',
        'properties' => 'properties.php',
        'sell' => 'sell.php',
        'seller-guide' => 'seller-guide.php',
        'selling-consultation' => 'selling-consultation.php',
        'services' => 'services.php',
        'testimonials' => 'testimonials.php'
    ];
}

function ethan_dao_vanilla_query_vars(array $vars): array
{
    $vars[] = 'ethan_static_page';
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
}
add_action('init', 'ethan_dao_vanilla_rewrite_rules');

function ethan_dao_vanilla_template_include(string $template): string
{
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
        'buy' => 'Mua nhà',
        'buyer-guide' => 'Hướng dẫn mua nhà',
        'buyer-information' => 'Thông tin người mua',
        'browse-properties' => 'Xem nhà',
        'sell' => 'Bán nhà',
        'seller-guide' => 'Hướng dẫn bán nhà',
        'selling-consultation' => 'Tư vấn bán nhà',
        'home-valuation' => 'Định giá nhà',
        'past-transactions' => 'Nhà đã bán gần đây',
        'properties' => 'Bất động sản',
        'featured-properties' => 'Nhà nổi bật',
        'neighborhoods' => 'Khu vực',
        'mckinney' => 'McKinney',
        'lavon' => 'Lavon',
        'garland' => 'Garland',
        'about' => 'Về Ethan',
        'testimonials' => 'Cảm nhận khách hàng',
        'services' => 'Dịch vụ',
        'blog' => 'Bài viết',
        'contact' => 'Liên hệ',
        'join-team' => 'Gia nhập đội ngũ',
        'agent-collaborations' => 'Hợp tác đại lý',
    ];
}

function ethan_dao_vanilla_menu_blueprints(): array
{
    return [
        'primary' => [
            ['slug' => 'buy', 'title' => 'Mua nhà'],
            ['slug' => 'sell', 'title' => 'Bán nhà'],
            ['slug' => 'properties', 'title' => 'Bất động sản'],
            ['slug' => 'about', 'title' => 'Giới thiệu'],
            ['slug' => 'contact', 'title' => 'Liên hệ'],
        ],
        'drawer' => [
            ['slug' => 'home', 'title' => 'Trang chủ'],
            ['slug' => 'buy', 'title' => 'Mua nhà'],
            ['slug' => 'sell', 'title' => 'Bán nhà'],
            ['slug' => 'properties', 'title' => 'Bất động sản'],
            ['slug' => 'about', 'title' => 'Giới thiệu'],
            ['slug' => 'contact', 'title' => 'Liên hệ'],
        ],
        'footer' => [
            ['slug' => 'home', 'title' => 'Trang chủ'],
            ['slug' => 'buy', 'title' => 'Mua nhà'],
            ['slug' => 'sell', 'title' => 'Bán nhà'],
            ['slug' => 'properties', 'title' => 'Bất động sản'],
            ['slug' => 'about', 'title' => 'Giới thiệu'],
            ['slug' => 'contact', 'title' => 'Liên hệ'],
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
    if (get_option('ethan_dao_vanilla_menu_seeded') === '2026-08-02-1') {
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
    update_option('ethan_dao_vanilla_menu_seeded', '2026-08-02-1');
}
add_action('init', 'ethan_dao_vanilla_seed_wordpress_menus', 30);

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
    $html .= '<a class="icon-button" href="' . esc_url(home_url('/browse-properties/')) . '" aria-label="Tìm kiếm"><svg><use href="#icon-search"/></svg></a></nav>';

    return $html;
}

function ethan_dao_vanilla_flat_menu_links(string $location): string
{
    $items = ethan_dao_vanilla_menu_tree($location);
    $links = '';
    $walk = function (array $nodes) use (&$walk, &$links): void {
        foreach ($nodes as $node) {
            $links .= '<a href="' . esc_url($node['url']) . '">' . esc_html($node['title']) . '</a>';
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
    return '<aside class="side-menu" data-side-menu><button class="close-menu" data-close-menu aria-label="Đóng menu">&times;</button><nav>' .
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


