<?php
/**
 * Phần dùng chung cho mọi trang: footer + floating social.
 * Nội dung đọc từ Customizer (ethan_mod) → sửa 1 chỗ, áp mọi trang.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** Floating social bên phải màn hình (dùng chung mọi trang). */
function ethan_dao_vanilla_render_floating_social(): string
{
    $items = [
        ['ethan_social_facebook', 'https://facebook.com/', 'Facebook', 'facebook'],
        ['ethan_social_youtube', 'https://youtube.com/', 'YouTube', 'youtube'],
        ['ethan_social_instagram', 'https://instagram.com/', 'Instagram', 'instagram'],
        ['ethan_social_tiktok', 'https://tiktok.com/', 'TikTok', 'tiktok'],
        ['ethan_social_zillow', 'https://zillow.com/', 'Zillow', 'zillow'],
    ];
    $out = '<div class="floating-social">';
    foreach ($items as $it) {
        list($id, $def, $label, $icon) = $it;
        $url = esc_url(ethan_mod($id, $def));
        $out .= '<a href="' . $url . '" target="_blank" rel="noopener" aria-label="' . esc_attr($label) . '">'
              . '<img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/' . $icon . '/default.svg" alt="' . esc_attr($label) . '" width="22" height="22" /></a>';
    }
    $out .= '</div>';
    return $out;
}

/** Footer dùng chung mọi trang (nội dung từ Customizer). */
function ethan_dao_vanilla_render_footer(): string
{
    $disclaimer_default = 'Ethan Dao (Tung Dao) is a licensed real estate agent in the State of Texas, affiliated with eXp Realty, LLC and the Texas Ace Team. Listing and sales information is intended solely for personal, non-commercial use to identify properties of interest. While generally considered reliable, this data is not guaranteed accurate; buyers are responsible for verifying all information independently. Equal Housing Opportunity.';

    ob_start();
    ?>
    <footer class="footer">
      <div class="container">
        <div class="footer-logo" style="gap:0"><a href="<?php echo esc_url(home_url('/')); ?>" class="wordmark banner-wordmark" style="color:var(--ink-strong);text-decoration:none;"><span>Ethan Dao</span><sup>®</sup></a></div>
        <div class="footer-cols"><div><h3><?php echo esc_html(ethan_mod('footer_h3_brand', 'Ethan Dao')); ?></h3><a href="tel:<?php echo esc_attr(ethan_mod('ethan_phone_raw', '+14699895786')); ?>"><?php echo esc_html(ethan_mod('ethan_phone_display', '(469) 989-5786')); ?></a><a href="mailto:<?php echo esc_attr(ethan_mod('footer_email', 'ethandao.realtor@gmail.com')); ?>"><?php echo esc_html(ethan_mod('footer_email', 'ethandao.realtor@gmail.com')); ?></a></div><div><h3><?php echo esc_html(ethan_mod('footer_h3_broker', 'Môi giới')); ?></h3><p><?php echo esc_html(ethan_mod('footer_brokerage1', 'eXp Realty - Texas Ace Team')); ?></p><p><?php echo esc_html(ethan_mod('footer_brokerage2', 'Serving the Dallas-Fort Worth Metroplex, TX')); ?></p></div><div><h3><?php echo esc_html(ethan_mod('footer_h3_search', 'Tìm kiếm')); ?></h3><p><a href="<?php echo esc_url(home_url('/properties/')); ?>"><?php echo esc_html(ethan_mod('footer_link_search1', 'Tìm nhà')); ?></a></p><p><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php echo esc_html(ethan_mod('footer_link_search2', 'Định giá nhà')); ?></a></p></div><div><h3><?php echo esc_html(ethan_mod('footer_h3_contact', 'Liên hệ')); ?></h3><p><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php echo esc_html(ethan_mod('footer_link_contact1', 'Đặt lịch tư vấn')); ?></a></p><p><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php echo esc_html(ethan_mod('footer_link_contact2', 'Hợp tác đại lý')); ?></a></p></div></div>
        <?php echo ethan_dao_vanilla_render_footer_nav(); ?>
        <p class="disclaimer"><?php echo esc_html(ethan_mod('footer_disclaimer', $disclaimer_default)); ?></p>
        <p class="copyright"><?php echo esc_html(ethan_mod('footer_copyright', '©2026 NTREIS. All rights reserved.')); ?></p>
      </div>
      <div class="bottom-bar"><span><?php echo esc_html(ethan_mod('footer_bottom_left', 'ETHAN DAO - REALTOR®')); ?></span><span><?php echo esc_html(ethan_mod('footer_bottom_mid', 'eXp Realty - Texas Ace Team - Dallas-Fort Worth, TX')); ?></span><span>Copyright © 2026 | <a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php echo esc_html(ethan_mod('footer_privacy', 'Chính sách bảo mật')); ?></a></span></div>
    </footer>
    <?php
    return ob_get_clean();
}
