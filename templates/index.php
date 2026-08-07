<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ethan Dao - Realtor | Dallas-Fort Worth Real Estate | eXp Realty</title>
    <meta name="description" content="Ethan Dao là Realtor tại Dallas-Fort Worth, làm việc bằng tiếng Việt để giúp người Việt mua và bán nhà ở DFW." />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Dancing+Script:wght@700&family=Dancing+Script:wght@700&family=Pattaya&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
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
      <symbol id="icon-facebook" viewBox="0 0 512 512"><path fill="#0866FF" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256c0 120 82.7 220.8 194.2 248.5V327.7h-63.2V256h63.2v-54.6c0-62.4 37.1-96.8 94-96.8 27.2 0 55.6 4.9 55.6 4.9v61.1h-31.3c-30.9 0-40.6 19.2-40.6 38.9V256h68.8l-11 71.7h-57.8v176.8C429.3 476.8 512 376 512 256z"/><path fill="#FFFFFF" d="M365.4 327.7l11-71.7h-68.8v-25.7c0-19.7 9.7-38.9 40.6-38.9h31.3v-61.1s-28.4-4.9-55.6-4.9c-56.9 0-94 34.4-94 96.8V256h-63.2v71.7h63.2v176.8c19.7 4.9 40.4 7.5 61.8 7.5 21.4 0 42.1-2.6 61.8-7.5V327.7h57.8z"/></symbol>
      <symbol id="icon-youtube" viewBox="0 0 256 180"><path fill="#FF0000" d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134Z"/><path fill="#FFFFFF" d="m102.421 128.06 66.328-38.418-66.328-38.418z"/></symbol>
      <symbol id="icon-instagram" viewBox="0 0 24 24"><path fill="#E4405F" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></symbol>
      <symbol id="icon-tiktok" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" fill="#000000"/></symbol>
      <symbol id="icon-zillow" viewBox="0 0 24 24"><path fill="#006AFF" d="M12.006 0L1.086 8.627v3.868c3.386-2.013 11.219-5.13 14.763-6.015.11-.024.16.005.227.078.372.427 1.586 1.899 1.916 2.301a.128.128 0 0 1-.03.195 43.607 43.607 0 0 0-6.67 6.527c-.03.037-.006.043.012.03 2.642-1.134 8.828-2.94 11.622-3.452V8.627zm-.48 11.177c-2.136.708-8.195 3.307-10.452 4.576V24h21.852v-7.936c-2.99.506-11.902 3.16-15.959 5.246a.183.183 0 0 1-.23-.036l-2.044-2.429c-.055-.061-.062-.098.011-.208 1.574-2.3 4.789-5.899 6.833-7.418.042-.03.031-.06-.012-.042Z"/></symbol>
      <symbol id="icon-home" viewBox="0 0 24 24"><path d="M3 10.5L12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1v-9.5z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
      <symbol id="icon-phone" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" fill="currentColor"/></symbol>
      <symbol id="icon-home" viewBox="0 0 24 24"><path d="M3 10.5L12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1v-9.5z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
      <symbol id="icon-phone" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" fill="currentColor"/></symbol>
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
    <main>
      <section id="top" class="alwayzz-banner ethan-minimal-banner" data-alwayzz-banner aria-label="Ethan Dao real estate banner">
        <div class="alwayzz-bg" aria-hidden="true"></div>
        <div class="alwayzz-lines alwayzz-lines-left" aria-hidden="true"></div>
        <div class="alwayzz-lines alwayzz-lines-right" aria-hidden="true"></div>
        <div class="alwayzz-lines alwayzz-lines-top" aria-hidden="true"></div>

        <div class="alwayzz-shell">

          <div class="alwayzz-content">

            <h2><?php echo esc_html(ethan_mod('home_hero_title', 'Tìm nhà ở DFW, tôi đi cùng bạn')); ?> <span><?php echo esc_html(ethan_mod('home_hero_title_accent', 'từ đầu đến cuối.')); ?></span></h2>
            <p><?php echo esc_html(ethan_mod('home_hero_sub', 'Làm việc bằng tiếng Việt, hiểu rõ khu vực, không hối thúc bạn mua nếu chưa đúng nhà.')); ?></p>
            <div class="alwayzz-actions">
              <a class="alwayzz-primary" href="<?php echo esc_url(home_url('/buy/')); ?>">
                <span class="btn-icon-badge"><svg><use href="#icon-home"/></svg></span>
                <span><?php echo esc_html(ethan_mod('home_hero_cta', 'Xem hướng dẫn mua nhà')); ?></span>
              </a>
              <a class="alwayzz-book" href="tel:<?php echo esc_attr(ethan_mod('ethan_phone_raw', '+14699895786')); ?>">
                <span class="btn-icon-badge"><svg><use href="#icon-phone"/></svg></span>
                <span>Gọi ngay: <?php echo esc_html(ethan_mod('ethan_phone_display', '(469) 989-5786')); ?></span>
              </a>
            </div>
          </div>


          <div class="alwayzz-trusted" aria-label="Ethan Dao affiliations and platforms">
            <p><?php echo esc_html(ethan_mod('home_hero_trusted', 'Realtor tại Dallas-Fort Worth')); ?></p>
            <div class="alwayzz-brand-marquee">
              <div>
                <span class="linear">eXp Realty</span><span class="shopify">Texas Ace Team</span><span class="notion">Zillow</span><span class="webflow">YouTube</span><span class="figma">Facebook</span><span class="slack">Instagram</span><span class="stripe">TikTok</span><span class="framer">DFW Metroplex</span>
                <span class="linear">eXp Realty</span><span class="shopify">Texas Ace Team</span><span class="notion">Zillow</span><span class="webflow">YouTube</span><span class="figma">Facebook</span><span class="slack">Instagram</span><span class="stripe">TikTok</span><span class="framer">DFW Metroplex</span>
              </div>
            </div>
          </div>
        </div>

        <div class="alwayzz-blur" aria-hidden="true"></div>
      </section>

      <section id="legacy-hero" class="hero">
        <div class="hero-visual" data-parallax-image>
          <div class="hero-glow"></div>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-cutout.png?v=1.0.58" alt="Ethan Dao, Realtor with eXp Realty, in a dark suit" />
        </div>
        <div class="hero-inner">
          <div class="hero-copy" data-parallax-copy>
            <span class="h-kicker light">eXp Realty Â· Texas Ace Team</span>
            <h1>ETHAN<br /><span>DAO</span></h1>
            <p>Realtor, eXp Realty · Texas Ace Team</p>
            <div class="hero-search">
              <div class="search-tabs">
                <button class="active" data-tab="buy">BUY</button>
                <button data-tab="rent">RENT</button>
              </div>
              <div class="search-box">
                <div><svg><use href="#icon-search"/></svg><input type="text" placeholder="tìm kiếm DFW by city, address, or neighborhood" /></div>
                <button>SEARCH</button>
              </div>
            </div>
            <div class="hero-social">
              <span>Follow Â· 15K+ community</span>
              <div class="social-links light">
                <a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/facebook/default.svg" alt="Facebook" width="22" height="22" /></a>
                <a href="https://youtube.com/" target="_blank" rel="noopener" aria-label="YouTube"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/youtube/default.svg" alt="YouTube" width="22" height="22" /></a>
                <a href="https://instagram.com/" target="_blank" rel="noopener" aria-label="Instagram"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/instagram/default.svg" alt="Instagram" width="22" height="22" /></a>
                <a href="https://tiktok.com/" target="_blank" rel="noopener" aria-label="TikTok"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/tiktok/default.svg" alt="TikTok" width="22" height="22" /></a>
                <a href="https://zillow.com/" target="_blank" rel="noopener" aria-label="Zillow"><img src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/zillow/default.svg" alt="Zillow" width="22" height="22" /></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="stats">
        <div class="stats-grid">
          <div class="reveal"><strong><?php echo esc_html(ethan_mod('home_stat1_num', '36')); ?></strong><span><?php echo esc_html(ethan_mod('home_stat1_label', 'CLOSED SALES')); ?></span></div>
          <div class="reveal"><strong><?php echo esc_html(ethan_mod('home_stat2_num', '13')); ?></strong><span><?php echo esc_html(ethan_mod('home_stat2_label', 'SALES LAST 12 MO')); ?></span></div>
          <div class="reveal"><strong><?php echo esc_html(ethan_mod('home_stat3_num', '$369K')); ?></strong><span><?php echo esc_html(ethan_mod('home_stat3_label', 'AVERAGE SALE PRICE')); ?></span></div>
          <div class="reveal"><strong><?php echo esc_html(ethan_mod('home_stat4_num', '15K+')); ?></strong><span><?php echo esc_html(ethan_mod('home_stat4_label', 'COMMUNITY FOLLOWERS')); ?></span></div>
        </div>
      </section>

      <section class="about">
        <div class="about-grid">
          <div class="portrait reveal"><span></span><img src="<?php echo esc_url(ethan_mod('ethan_headshot_hero', get_template_directory_uri() . '/assets/images/ethan-headshot-hero.jpg')); ?>" alt="Ethan Dao - Realtor, eXp Realty" /></div>
          <div class="reveal">
            <span class="h-kicker"><?php echo esc_html(ethan_mod('home_about_kicker', 'Giới thiệu ngắn')); ?></span>
            <h2 class="h-section-title"><?php echo esc_html(ethan_mod('home_about_title', 'Môi giới bất động sản tại')); ?> <span><?php echo esc_html(ethan_mod('home_about_title_accent', 'DFW')); ?></span></h2>
            <p><?php echo esc_html(ethan_mod('home_about_body', 'Tôi tên Ethan — Tùng Đào. Tôi đang giúp gia đình người Việt mua và bán nhà tại DFW, chủ yếu ở Lavon, McKinney, Garland. Làm việc hoàn toàn bằng tiếng Việt, từ lúc xem nhà đến ngày ký hợp đồng.')); ?></p>
            <div class="button-row"><a class="btn-ink" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php echo esc_html(ethan_mod('home_about_btn1', 'Nhắn địa chỉ để định giá')); ?></a><a class="btn-outline-dark" href="<?php echo esc_url(home_url('/past-transactions/')); ?>"><?php echo esc_html(ethan_mod('home_about_btn2', 'Xem nhà đã bán')); ?></a></div>
          </div>
        </div>
      </section>

      <section class="platforms">
        <span><?php echo esc_html(ethan_mod('home_platforms_label', 'Theo Dõi Ethan Tại')); ?></span>
        <div class="platforms-marquee-wrap">
          <div class="platforms-marquee-track">
            <?php
            $zillow_url   = esc_url(ethan_mod('ethan_social_zillow',    'https://www.zillow.com/profile/ethandaorealtor'));
            $youtube_url  = esc_url(ethan_mod('ethan_social_youtube',   'https://youtube.com/'));
            $facebook_url = esc_url(ethan_mod('ethan_social_facebook',  'https://facebook.com/'));
            $instagram_url= esc_url(ethan_mod('ethan_social_instagram', 'https://instagram.com/'));
            $tiktok_url   = esc_url(ethan_mod('ethan_social_tiktok',    'https://tiktok.com/'));
            $cdn = 'https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons';
            $items = '<a href="https://www.exprealty.com/" target="_blank" rel="noopener" class="platforms-pill">eXp Realty</a>'
                   . '<a href="https://www.exprealty.com/us/tx/irving/teams/texas-ace-team" target="_blank" rel="noopener" class="platforms-pill">Texas Ace Team</a>'
                   . '<a href="' . $zillow_url    . '" target="_blank" rel="noopener" aria-label="Zillow"     class="platforms-icon"><img src="' . $cdn . '/zillow/default.svg"    alt="Zillow"     width="24" height="24" /></a>'
                   . '<a href="' . $youtube_url   . '" target="_blank" rel="noopener" aria-label="YouTube"    class="platforms-icon"><img src="' . $cdn . '/youtube/default.svg"   alt="YouTube"    width="24" height="24" /></a>'
                   . '<a href="' . $facebook_url  . '" target="_blank" rel="noopener" aria-label="Facebook"   class="platforms-icon"><img src="' . $cdn . '/facebook/default.svg"  alt="Facebook"   width="24" height="24" /></a>'
                   . '<a href="' . $instagram_url . '" target="_blank" rel="noopener" aria-label="Instagram"  class="platforms-icon"><img src="' . $cdn . '/instagram/default.svg" alt="Instagram"  width="24" height="24" /></a>'
                   . '<a href="' . $tiktok_url    . '" target="_blank" rel="noopener" aria-label="TikTok"     class="platforms-icon"><img src="' . $cdn . '/tiktok/default.svg"    alt="TikTok"     width="24" height="24" /></a>';
            echo $items;
            // Duplicate for seamless infinite loop
            echo str_replace('aria-label=', 'aria-hidden="true" tabindex="-1" aria-label=', $items);
            ?>
          </div>
        </div>
      </section>

      <section class="map-section zillow-profile-section">
        <div class="zillow-profile-inner reveal">
          <div class="map-section-header">
            <div>
              <span class="h-kicker"><?php echo esc_html(ethan_mod('home_map_kicker', 'Giao dịch')); ?></span>
              <h2 class="h-section-title"><?php echo esc_html(ethan_mod('home_map_title', 'Nhà đã bán và đang bán')); ?> <span><?php echo esc_html(ethan_mod('home_map_title_accent', '(40)')); ?></span></h2>
              <p><?php echo esc_html(ethan_mod('home_map_sub', 'Các giao dịch trong khu vực tôi đang làm.')); ?></p>
            </div>
          </div>
          <div id="ethan-profile-map" class="profile-map" data-profile-map aria-label="Ethan Dao sales and listings map"></div>
        </div>
      </section>




      <section class="recognition">
        <div class="glow"></div>
        <div class="recognition-grid">
          <img class="reveal" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-awards.png?v=2.0" alt="Texas Ace Team Top Producer awards cho Ethan Dao, 2024 và 2025" />
          <div class="reveal">
            <span class="h-kicker light"><span><?php echo esc_html(ethan_mod('home_recog_kicker', 'Ghi nhận')); ?></span></span>
            <h2 class="h-section-title"><?php echo esc_html(ethan_mod('home_recog_title', 'Giải thưởng')); ?> <span><?php echo esc_html(ethan_mod('home_recog_title_accent', '2024 và 2025')); ?></span></h2>
            <p><?php echo esc_html(ethan_mod('home_recog_body', 'Texas Ace Team trao giải này dựa trên số giao dịch hoàn tất trong năm và đánh giá trực tiếp từ khách hàng.')); ?></p>
          </div>
        </div>
      </section>

      <!-- Mobile-only: 1 carousel thumbnail hợp nhất cho toàn bộ video kênh YouTube -->
      <section class="video-carousel-m" aria-label="Kênh YouTube hướng dẫn mua nhà DFW">
        <div class="vcm-inner">
          <h2 class="h-section-title"><?php echo esc_html(ethan_mod('home_video_title', 'Kênh YouTube hướng dẫn mua nhà')); ?> <span><?php echo esc_html(ethan_mod('home_video_title_accent', 'DFW')); ?></span></h2>
          <div class="vcm-track">
            <article class="vcm-card">
              <a href="https://www.youtube.com/channel/UCzaeoor-IXyqppQcl59dabw" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/qsBWEIueBUs/hqdefault.jpg" alt="Tour nhà thực tế Dallas Texas - kênh YouTube Ethan Dao" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a>
              <h3><a href="https://www.youtube.com/channel/UCzaeoor-IXyqppQcl59dabw" target="_blank" rel="noopener noreferrer">Tour nhà thực tế Dallas Texas</a></h3>
              <p>Tôi quay thực tế bên trong từng căn — không filter, không bỏ qua chỗ xấu. Để bạn xem trước khi đặt lịch.</p>
            </article>
            <article class="vcm-card">
              <a href="https://www.youtube.com/watch?v=PH7ssSv_eoI" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/PH7ssSv_eoI/hqdefault.jpg" alt="Phân tích nhà mới và khu dân cư DFW" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a>
              <h3><a href="https://www.youtube.com/watch?v=PH7ssSv_eoI" target="_blank" rel="noopener noreferrer">Phân tích nhà mới và khu dân cư DFW</a></h3>
              <p>Review thực tế 4 mẫu nhà mới tại Lavon, giá $300K–$400K. Tôi xem từng mẫu và nói thẳng cái nào đáng đặt cọc.</p>
            </article>
            <article class="vcm-card">
              <a href="https://www.youtube.com/watch?v=gxwWX1SubZY" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/gxwWX1SubZY/hqdefault.jpg" alt="Hậu trường nghề môi giới tại Texas" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a>
              <h3><a href="https://www.youtube.com/watch?v=gxwWX1SubZY" target="_blank" rel="noopener noreferrer">Hậu trường nghề môi giới tại Texas</a></h3>
              <p>Vlog thực tế về một buổi closing — từng bước trong ngày hoàn tất giao dịch mua nhà tại Mỹ.</p>
            </article>
            <article class="vcm-card">
              <a href="https://www.youtube.com/watch?v=PH7ssSv_eoI" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/PH7ssSv_eoI/hqdefault.jpg" alt="Lavon 75166 khu nhà mới cách Garland" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a>
              <h3><a href="https://www.youtube.com/watch?v=PH7ssSv_eoI" target="_blank" rel="noopener noreferrer">Lavon 75166 | khu nhà mới cách Garland khu người Việt</a></h3>
              <p>Cách Garland khoảng 30 phút, giá từ $300K với nhiều ưu đãi từ builder. Nhà mới trong khu Lavon 75166.</p>
            </article>
            <article class="vcm-card">
              <a href="https://www.youtube.com/shorts/uxfLLkoGMiE" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/uxfLLkoGMiE/hqdefault.jpg" alt="Wylie 75098 căn nhà đời 2017 tại Inspiration Community" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a>
              <h3><a href="https://www.youtube.com/shorts/uxfLLkoGMiE" target="_blank" rel="noopener noreferrer">Wylie 75098 | căn nhà đời 2017 tại Inspiration Community</a></h3>
              <p>Nhà 2017, hai mặt tiền trong khu Inspiration Community. Wylie 75098, trường tốt và cộng đồng yên tĩnh.</p>
            </article>
            <article class="vcm-card">
              <a href="https://www.youtube.com/watch?v=qsBWEIueBUs" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/qsBWEIueBUs/hqdefault.jpg" alt="LAVON TEXAS Lakepointe review 4 mẫu nhà new build" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a>
              <h3><a href="https://www.youtube.com/watch?v=qsBWEIueBUs" target="_blank" rel="noopener noreferrer">LAVON TEXAS - Lakepointe review 4 mẫu nhà new build</a></h3>
              <p>4 mẫu nhà mới ở Lavon, $300K–$400K. Tôi xem và nói thật cái nào đáng tiền, cái nào không.</p>
            </article>
          </div>
        </div>
      </section>

      <section class="beyond">
        <div class="container">
          <h2 class="h-section-title reveal"><?php echo esc_html(ethan_mod('home_video_title', 'Kênh YouTube hướng dẫn mua nhà')); ?> <span><?php echo esc_html(ethan_mod('home_video_title_accent', 'DFW')); ?></span></h2>
          <article class="media-row reveal">
            <div class="media-visual-link iframe-wrap"><iframe width="100%" height="100%" src="<?php echo esc_url(ethan_mod('home_vid1_embed', 'https://www.youtube.com/embed/videoseries?list=UUzaeoor-IXyqppQcl59dabw')); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
            <div>
              <i></i>
              <h3><a href="<?php echo esc_url(ethan_mod('home_vid1_link', 'https://www.youtube.com/channel/UCzaeoor-IXyqppQcl59dabw')); ?>" target="_blank" rel="noopener noreferrer" class="media-copy-link"><?php echo esc_html(ethan_mod('home_vid1_title', 'Tour nhà thực tế')); ?> <span><?php echo esc_html(ethan_mod('home_vid1_accent', 'Dallas Texas')); ?></span></a></h3>
              <p><?php echo esc_html(ethan_mod('home_vid1_body', 'Tôi quay thực tế bên trong từng căn — không filter, không bỏ qua chỗ xấu. Để bạn xem trước khi đặt lịch.')); ?></p>
            </div>
          </article>
          <article class="media-row reveal">
            <div class="media-embed">
              <iframe
                src="<?php echo esc_url(ethan_mod('home_vid2_embed', 'https://www.youtube.com/embed/qsBWEIueBUs?rel=0')); ?>"
                loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
              ></iframe>
            </div>
            <div>
              <i></i>
              <h3><a href="<?php echo esc_url(ethan_mod('home_vid2_link', 'https://www.youtube.com/watch?v=PH7ssSv_eoI')); ?>" target="_blank" rel="noopener noreferrer" class="media-copy-link"><?php echo esc_html(ethan_mod('home_vid2_title', 'Phân tích nhà mới và khu dân cư')); ?> <span><?php echo esc_html(ethan_mod('home_vid2_accent', 'DFW')); ?></span></a></h3>
              <p><?php echo esc_html(ethan_mod('home_vid2_body', 'Review thực tế 4 mẫu nhà mới tại Lavon, giá $300K–$400K. Tôi xem từng mẫu và nói thẳng cái nào đáng đặt cọc.')); ?></p>
            </div>
          </article>
          <article class="media-row reveal">
            <div class="media-embed">
              <iframe
                src="<?php echo esc_url(ethan_mod('home_vid3_embed', 'https://www.youtube.com/embed/gxwWX1SubZY?rel=0')); ?>"
                loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
              ></iframe>
            </div>
            <div>
              <i></i>
              <h3><a href="<?php echo esc_url(ethan_mod('home_vid3_link', 'https://www.youtube.com/watch?v=gxwWX1SubZY')); ?>" target="_blank" rel="noopener noreferrer" class="media-copy-link"><?php echo esc_html(ethan_mod('home_vid3_title', 'Hậu trường nghề môi giới tại')); ?> <span><?php echo esc_html(ethan_mod('home_vid3_accent', 'Texas')); ?></span></a></h3>
              <p><?php echo esc_html(ethan_mod('home_vid3_body', 'Vlog thực tế về một buổi closing — từng bước trong ngày hoàn tất giao dịch mua nhà tại Mỹ.')); ?></p>
            </div>
          </article>
        </div>
      </section>

      <section class="videos">
        <div class="video-grid">
          <article class="reveal"><h3>Lavon 75166 | khu nhà mới cách Garland khu người Việt</h3><p>Cách Garland khoảng 30 phút, giá từ $300K với nhiều ưu đãi từ builder. Nhà mới trong khu Lavon 75166.</p><a href="https://www.youtube.com/watch?v=PH7ssSv_eoI" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/PH7ssSv_eoI/hqdefault.jpg" alt="Thumbnail video Lavon 75166 của Ethan Dao" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a></article>
          <article class="reveal"><h3>Wylie 75098 | căn nhà đời 2017 tại Inspiration Community</h3><p>Nhà 2017, hai mặt tiền trong khu Inspiration Community. Wylie 75098, trường tốt và cộng đồng yên tĩnh.</p><a href="https://www.youtube.com/shorts/uxfLLkoGMiE" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/uxfLLkoGMiE/hqdefault.jpg" alt="Thumbnail shorts Wylie 75098 của Ethan Dao" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a></article>
          <article class="reveal"><h3>LAVON TEXAS - Lakepointe review 4 mẫu nhà new build</h3><p>4 mẫu nhà mới ở Lavon, $300K–$400K. Tôi xem và nói thật cái nào đáng tiền, cái nào không.</p><a href="https://www.youtube.com/watch?v=qsBWEIueBUs" target="_blank" rel="noopener noreferrer" class="video-thumbnail"><img src="https://i.ytimg.com/vi/qsBWEIueBUs/hqdefault.jpg" alt="Thumbnail video review nhà mới Lavon của Ethan Dao" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" /><span><svg><use href="#icon-play"/></svg></span></a></article>
        </div>
      </section>

      <section id="recent" class="recent">
        <div class="container">
          <span class="h-kicker"><?php echo esc_html(ethan_mod('home_recent_kicker', 'Giao dịch thực tế')); ?></span>
          <h2 class="h-section-title"><?php echo esc_html(ethan_mod('home_recent_title', 'Những căn nhà tôi vừa')); ?> <span><?php echo esc_html(ethan_mod('home_recent_title_accent', 'chốt xong')); ?></span></h2>
          <div class="sales-track no-scrollbar" data-sales-track>
            <?php
            $_sold = array_filter(ethan_dao_vanilla_get_properties(), function($p) {
                return ethan_dao_vanilla_property_meta('property_status', $p->ID) === 'sold';
            });
            foreach (array_slice(array_values($_sold), 0, 8) as $_p):
                $_addr  = ethan_dao_vanilla_property_meta('property_address', $_p->ID);
                $_beds  = ethan_dao_vanilla_property_meta('property_bedrooms', $_p->ID);
                $_baths = ethan_dao_vanilla_property_meta('property_bathrooms', $_p->ID);
                $_sqft  = ethan_dao_vanilla_property_meta('property_sqft', $_p->ID);
                $_img   = ethan_dao_vanilla_property_meta('property_image', $_p->ID);
                if ($_img === '') $_img = get_template_directory_uri() . '/assets/images/ethan-home-8.jpg';
                $_parts = array_filter([
                    $_beds  !== '' ? $_beds . ' Phòng ngủ'  : '',
                    $_baths !== '' ? $_baths . ' Phòng tắm' : '',
                    $_sqft  !== '' ? number_format((float) str_replace(',', '', $_sqft)) . ' Sq.Ft.' : '',
                ]);
            ?>
            <article data-href="<?php echo esc_url(ethan_dao_vanilla_property_url($_p->ID)); ?>" style="cursor:pointer;"><img src="<?php echo esc_url($_img); ?>" alt="<?php echo esc_attr($_addr); ?>" loading="lazy" /><span>Đã bán</span><div><h3><?php echo esc_html($_addr); ?></h3><?php if ($_parts): ?><p><?php echo esc_html(implode(' · ', $_parts)); ?></p><?php endif; ?></div></article>
            <?php endforeach; ?>
          </div>          <div class="carousel-actions"><div><button data-scroll-sales="-1" aria-label="Previous"><svg><use href="#icon-chevron-left"/></svg></button><button data-scroll-sales="1" aria-label="Next"><svg><use href="#icon-chevron-right"/></svg></button></div><a href="<?php echo esc_url(home_url('/past-transactions/')); ?>" class="btn-outline-dark">Xem tất cả</a></div>
        </div>
      </section>

      <section class="listings">
        <div class="container">
          <div class="reveal" style="margin-bottom: 24px;"><span class="h-kicker">Portfolio across DFW</span><h2 class="h-section-title">Nhà tại <span>Dallas-Fort Worth</span></h2></div>
          <div class="sales-track no-scrollbar" data-sales-track>
            <?php foreach (ethan_dao_vanilla_get_properties() as $_p):
                $_status = ethan_dao_vanilla_property_meta('property_status', $_p->ID);
                $_addr   = ethan_dao_vanilla_property_meta('property_address', $_p->ID);
                $_price  = ethan_dao_vanilla_property_meta('property_price', $_p->ID);
                $_pt     = ethan_dao_vanilla_property_meta('property_price_text', $_p->ID);
                $_beds   = ethan_dao_vanilla_property_meta('property_bedrooms', $_p->ID);
                $_baths  = ethan_dao_vanilla_property_meta('property_bathrooms', $_p->ID);
                $_sqft   = ethan_dao_vanilla_property_meta('property_sqft', $_p->ID);
                $_img    = ethan_dao_vanilla_property_meta('property_image', $_p->ID);
                if ($_img === '') $_img = get_template_directory_uri() . '/assets/images/ethan-home-8.jpg';
                if ($_pt === '' && $_status === 'for sale' && is_numeric($_price)) $_pt = '$' . number_format((float) $_price);
                $_label  = $_status === 'for sale' ? 'Đang bán' : 'Đã bán';
                $_cls    = $_status === 'for sale' ? 'sale' : '';
                $_parts  = array_filter([
                    $_beds  !== '' ? $_beds . ' Phòng ngủ'  : '',
                    $_baths !== '' ? $_baths . ' Phòng tắm' : '',
                    $_sqft  !== '' ? number_format((float) str_replace(',', '', $_sqft)) . ' Sq.Ft.' : '',
                ]);
                $_h3 = $_pt !== '' ? $_pt . ' · ' . $_addr : $_addr;
            ?>
            <article data-href="<?php echo esc_url(ethan_dao_vanilla_property_url($_p->ID)); ?>" style="cursor:pointer;"><img src="<?php echo esc_url($_img); ?>" alt="<?php echo esc_attr($_addr); ?>" loading="lazy" /><span class="<?php echo esc_attr($_cls); ?>"><?php echo esc_html($_label); ?></span><div><h3><?php echo esc_html($_h3); ?></h3><?php if ($_parts): ?><p><?php echo esc_html(implode(' · ', $_parts)); ?></p><?php endif; ?></div></article>
            <?php endforeach; ?>
          </div>
          <div class="carousel-actions"><div><button data-scroll-sales="-1" aria-label="Previous"><svg><use href="#icon-chevron-left"/></svg></button><button data-scroll-sales="1" aria-label="Next"><svg><use href="#icon-chevron-right"/></svg></button></div><a href="<?php echo esc_url(home_url('/properties/')); ?>" class="btn-white"><?php echo esc_html(ethan_mod('home_recent_cta', 'Xem Tất Cả Nhà')); ?></a></div>
        </div>
      </section>
      <section class="page-section">
        <div class="container">
          <span class="h-kicker reveal"><?php echo esc_html(ethan_mod('home_faq_kicker', 'Giải đáp thắc mắc')); ?></span>
          <h2 class="h-section-title reveal"><?php echo esc_html(ethan_mod('home_faq_title', 'Câu hỏi')); ?> <span><?php echo esc_html(ethan_mod('home_faq_title_accent', 'thường gặp')); ?></span></h2>
          <div class="faq-list">
            <div class="faq-item reveal">
              <div class="faq-q"><?php echo esc_html(ethan_mod('home_faq1_q', 'Nhà tôi hiện tại giá bao nhiêu?')); ?></div>
              <div class="faq-a"><p><?php echo esc_html(ethan_mod('home_faq1_a', 'Nhắn tôi địa chỉ là được. Tôi kéo dữ liệu những căn đã bán gần đó và cho bạn con số thực tế — không phải con số để bạn vui, mà để bạn quyết định được.')); ?></p></div>
            </div>
            <div class="faq-item reveal">
              <div class="faq-q"><?php echo esc_html(ethan_mod('home_faq2_q', 'Tôi có cần sửa chữa nhà trước khi bán không?')); ?></div>
              <div class="faq-a"><p><?php echo esc_html(ethan_mod('home_faq2_a', 'Không cần sửa hết. Tôi xem nhà và nói thẳng: cái này đáng làm, cái kia bỏ qua. Thường thì sơn lại và dọn sân vườn là đủ để ảnh đẹp hơn rõ rệt.')); ?></p></div>
            </div>
            <div class="faq-item reveal">
              <div class="faq-q"><?php echo esc_html(ethan_mod('home_faq3_q', 'Bán nhà mất bao lâu?')); ?></div>
              <div class="faq-a"><p><?php echo esc_html(ethan_mod('home_faq3_a', 'Ở DFW trung bình 20–45 ngày. Tôi đăng Zillow, quay video tour, gửi email cho danh sách khách đang tìm nhà — mấy căn gần đây nhận offer trong vòng 1 tuần.')); ?></p></div>
            </div>
            <div class="faq-item reveal">
              <div class="faq-q"><?php echo esc_html(ethan_mod('home_faq4_q', 'Chi phí bán nhà gồm những gì?')); ?></div>
              <div class="faq-a"><p><?php echo esc_html(ethan_mod('home_faq4_a', 'Chủ yếu là hoa hồng môi giới, thuế, và chi phí title/escrow. Tôi sẽ tính cho bạn một tờ net sheet — bạn biết chính xác mình nhận được bao nhiêu sau khi bán, trước khi ký bất cứ thứ gì.')); ?></p></div>
            </div>
            <div class="faq-item reveal">
              <div class="faq-q"><?php echo esc_html(ethan_mod('home_faq5_q', 'Tôi có thể vừa bán nhà cũ vừa mua nhà mới không?')); ?></div>
              <div class="faq-a"><p><?php echo esc_html(ethan_mod('home_faq5_a', 'Được, tôi hay làm cái này. Quan trọng là kéo giãn đúng timeline để bạn không phải trả tiền thuê nhà tạm trong khoảng giữa. Tôi sẽ điều phối cả hai phía.')); ?></p></div>
            </div>
          </div>
        </div>
      </section>

      <section class="newsletter">
        <div class="newsletter-inner reveal">
          <h2 class="h-section-title"><?php echo esc_html(ethan_mod('home_news_title', 'Nhận tin')); ?> <span><?php echo esc_html(ethan_mod('home_news_title_accent', 'nhà mới')); ?></span></h2>
          <p><?php echo esc_html(ethan_mod('home_news_body', 'Tôi gửi email khi thấy listing đáng xem hoặc giá khu vực bạn quan tâm thay đổi. Không spam.')); ?></p>
          <form data-static-form class="newsletter-form"><div class="nested-input"><input type="email" placeholder="Địa chỉ email của bạn..." required /><button class="btn-gold"><?php echo esc_html(ethan_mod('home_news_btn', 'Đăng ký nhận tin')); ?></button></div><p class="form-success" hidden>Đã nhận. Tôi sẽ liên lạc sớm.</p></form>

        </div>
      </section>


    </main>
    <?php echo ethan_dao_vanilla_render_footer(); ?>
    <?php echo ethan_dao_vanilla_render_floating_social(); ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/script.js?ver=1.0.58"></script>
  <?php wp_footer(); ?>
  </body>
</html>










