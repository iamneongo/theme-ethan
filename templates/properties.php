<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bất động sản | Ethan Dao</title>
    <meta name="description" content="Featured properties, active listings, and recent sales across DFW." />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Dancing+Script:wght@700&family=Pattaya&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles.css?ver=<?php echo filemtime(get_template_directory() . '/styles.css'); ?>" />
  <?php wp_head(); ?>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
  <body <?php body_class(); ?>><?php wp_body_open(); ?>
    <svg class="svg-sprite" aria-hidden="true">
      <symbol id="icon-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M20 20l-3.5-3.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></symbol>
      <symbol id="icon-chevron-down" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
      <symbol id="icon-chevron-left" viewBox="0 0 24 24"><path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
      <symbol id="icon-chevron-right" viewBox="0 0 24 24"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
      <symbol id="icon-chevron-up" viewBox="0 0 24 24"><path d="M6 15l6-6 6 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
      <symbol id="icon-check" viewBox="0 0 24 24"><path d="M5 12l5 5L20 6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></symbol>
      <symbol id="icon-menu" viewBox="0 0 24 24"><path d="M5 9h14M5 15h14" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></symbol>
      <symbol id="icon-play" viewBox="0 0 24 24"><path d="M8 5v14l11-7z" fill="currentColor"/></symbol>
      <symbol id="icon-facebook" viewBox="0 0 24 24"><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103.45.053.845.12 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.673 3.667h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/></symbol>
      <symbol id="icon-youtube" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></symbol>
      <symbol id="icon-instagram" viewBox="0 0 24 24"><path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/></symbol>
      <symbol id="icon-tiktok" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></symbol>
      <symbol id="icon-zillow" viewBox="0 0 24 24"><path d="M12.006 0L1.086 8.627v3.868c3.386-2.013 11.219-5.13 14.763-6.015.11-.024.16.005.227.078.372.427 1.586 1.899 1.916 2.301a.128.128 0 0 1-.03.195 43.607 43.607 0 0 0-6.67 6.527c-.03.037-.006.043.012.03 2.642-1.134 8.828-2.94 11.622-3.452V8.627zm-.48 11.177c-2.136.708-8.195 3.307-10.452 4.576V24h21.852v-7.936c-2.99.506-11.902 3.16-15.959 5.246a.183.183 0 0 1-.23-.036l-2.044-2.429c-.055-.061-.062-.098.011-.208 1.574-2.3 4.789-5.899 6.833-7.418.042-.03.031-.06-.012-.042Z"/></symbol>
    </svg>
    <header class="navbar banner-header" data-navbar>
      <div class="nav-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="wordmark banner-wordmark"><span>Ethan Dao</span><sup>®</sup><small>Realtor</small></a>
                <?php echo ethan_dao_vanilla_render_primary_nav(); ?>
        <button class="menu-button banner-menu-button" data-open-menu aria-label="Open menu">
          <span>Menu</span>
          <svg><use href="#icon-menu"/></svg>
        </button>
      </div>
    </header>
    <div class="menu-overlay" data-menu-overlay></div>
    <?php echo ethan_dao_vanilla_render_drawer_nav(); ?>
    <main class="subpage-main">
<section class="page-section"><div class="container"><div class="property-filter"><button class="active" data-property-filter="all">Tất cả</button><button data-property-filter="for sale">Đang bán</button><button data-property-filter="sold">Đã bán</button><input type="search" data-property-search placeholder="Tìm theo thành phố hoặc địa chỉ" /></div><div class="listing-grid property-list"><?php echo ethan_dao_vanilla_render_property_list(); ?></div></div></section><section class="newsletter"><div class="newsletter-inner reveal"><h2 class="h-section-title">Nhận tin <span>nhà mới</span></h2><p>Tôi gửi email khi thấy listing đáng xem hoặc giá khu vực bạn quan tâm thay đổi. Không spam.</p><form data-static-form class="newsletter-form"><div class="nested-input"><input type="email" placeholder="Địa chỉ email của bạn..." required /><button class="btn-ink">Đăng ký nhận tin</button></div><p class="form-success" hidden>Đã nhận. Tôi sẽ liên lạc sớm.</p></form></div></section></main>
    <footer class="footer">
      <div class="container">
        <div class="footer-logo" style="gap:0"><a href="<?php echo esc_url(home_url('/')); ?>" class="wordmark banner-wordmark" style="color:var(--ink-strong);text-decoration:none;"><span>Ethan Dao</span><sup>®</sup></a></div>
        <div class="footer-cols"><div><h3>Ethan Dao</h3><a href="tel:+14699895786">(469) 989-5786</a><a href="mailto:ethandaorealtor@gmail.com">ethandaorealtor@gmail.com</a></div><div><h3>Môi giới</h3><p>eXp Realty - Texas Ace Team</p><p>1431 Greenway Drive, Irving, TX 75038</p></div><div><h3>Tìm kiếm</h3><p><a href="<?php echo esc_url(home_url('/properties/')); ?>">Tìm nhà</a></p><p><a href="<?php echo esc_url(home_url('/contact/')); ?>">Định giá nhà</a></p></div><div><h3>Liên hệ</h3><p><a href="<?php echo esc_url(home_url('/contact/')); ?>">Đặt lịch tư vấn</a></p><p><a href="<?php echo esc_url(home_url('/contact/')); ?>">Hợp tác đại lý</a></p></div></div>
        <?php echo ethan_dao_vanilla_render_footer_nav(); ?>
        <p class="disclaimer">Ethan Dao (Tung Dao) is a licensed real estate agent in the State of Texas, affiliated with eXp Realty, LLC and the Texas Ace Team. Listing and sales information is intended solely for personal, non-commercial use to identify properties of interest. While generally considered reliable, this data is not guaranteed accurate; buyers are responsible for verifying all information independently. Equal Housing Opportunity.</p>
        <p class="copyright">©2026 NTREIS. All rights reserved.</p>
      </div>
      <div class="bottom-bar"><span>ETHAN DAO - REALTOR®</span><span>eXp Realty - Texas Ace Team - Dallas-Fort Worth, TX</span><span>Copyright © 2026 | <a href="<?php echo esc_url(home_url('/contact/')); ?>">Chính sách bảo mật</a></span></div>
    </footer>
    <div class="floating-social">
      <a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/facebook/default.svg" alt="Facebook" width="22" height="22" /></a>
      <a href="https://youtube.com/" target="_blank" rel="noopener" aria-label="YouTube"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/youtube/default.svg" alt="YouTube" width="22" height="22" /></a>
      <a href="https://instagram.com/" target="_blank" rel="noopener" aria-label="Instagram"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/instagram/default.svg" alt="Instagram" width="22" height="22" /></a>
      <a href="https://tiktok.com/" target="_blank" rel="noopener" aria-label="TikTok"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/tiktok/default.svg" alt="TikTok" width="22" height="22" /></a>
      <a href="https://zillow.com/" target="_blank" rel="noopener" aria-label="Zillow"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/zillow/default.svg" alt="Zillow" width="22" height="22" /></a>
    </div>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/script.js?ver=1.0.58"></script>
  <?php wp_footer(); ?>
  </body>
</html>








