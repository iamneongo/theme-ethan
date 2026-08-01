<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ethan Dao - Realtor | Dallas-Fort Worth Real Estate | eXp Realty</title>
    <meta name="description" content="Ethan Dao is a Chuyên viên nổi bật Realtor helping buyers, sellers, and investors across Dallas-Fort Worth." />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Dancing+Script:wght@700&family=Pattaya&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles.css?ver=1.0.20" />
  <?php wp_head(); ?>
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
          <svg><use href="#icon-chevron-up"/></svg>
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
            <div class="alwayzz-ticker" aria-label="Ethan Dao services">
              <div class="alwayzz-marquee">
                <span>Mua nhà DFW</span><span>Bán nhà có chiến lược</span><span>Định giá nhà</span><span>New-build communities</span><span>Đầu tư bất động sản</span>
                <span>Mua nhà DFW</span><span>Bán nhà có chiến lược</span><span>Định giá nhà</span><span>New-build communities</span><span>Đầu tư bất động sản</span>
                <span>Mua nhà DFW</span><span>Bán nhà có chiến lược</span><span>Định giá nhà</span><span>New-build communities</span><span>Đầu tư bất động sản</span>
                <span>Mua nhà DFW</span><span>Bán nhà có chiến lược</span><span>Định giá nhà</span><span>New-build communities</span><span>Đầu tư bất động sản</span>
              </div>
            </div>
            <h2>Real estate guidance <span>alwayzz</span> with Ethan.</h2>
            <p>Tư vấn mua bán nhà Dallas-Fort Worth. Chiến lược rõ ràng, dữ liệu thực tế, hỗ trợ song ngữ Việt-Anh trọn vẹn.</p>
            <div class="alwayzz-actions">
              <a class="alwayzz-primary" href="<?php echo esc_url(home_url('/buyer-guide/')); ?>">Xem hướng dẫn mua nhà</a>
              <a class="alwayzz-book" href="tel:+14699895786">
                <span><strong>Gọi Ethan ngay</strong><small><i></i>(469) 989-5786</small></span>
              </a>
            </div>
          </div>

          <div class="alwayzz-trusted" aria-label="Ethan Dao affiliations and platforms">
            <p>Đồng hành cùng khách hàng mua, bán và đầu tư tại DFW</p>
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
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-cutout.png?v=1.0.20" alt="Ethan Dao, Realtor with eXp Realty, in a dark suit" />
        </div>
        <div class="hero-inner">
          <div class="hero-copy" data-parallax-copy>
            <span class="h-kicker light">eXp Realty Â· Texas Ace Team</span>
            <h1>ETHAN<br /><span>DAO</span></h1>
            <p>Realtor &amp; Chuyên viên nổi bật <strong>2024 &amp; 2025</strong> â€” Giúp bạn tự tin mua, bán và đầu tư tại <strong>Dallas-Fort Worth</strong>.</p>
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
              <div class="social-links light"></div>
            </div>
          </div>
        </div>
      </section>

      <section class="stats">
        <div class="stats-grid">
          <div class="reveal"><strong>36</strong><span>CLOSED SALES</span></div>
          <div class="reveal"><strong>13</strong><span>SALES LAST 12 MO</span></div>
          <div class="reveal"><strong>$369K</strong><span>AVERAGE SALE PRICE</span></div>
          <div class="reveal"><strong>15K+</strong><span>COMMUNITY FOLLOWERS</span></div>
        </div>
      </section>

      <section class="about">
        <div class="about-grid">
          <div class="portrait reveal"><span></span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-headshot-hero.jpg?v=1.0.20" alt="Ethan Dao - Realtor, eXp Realty" /></div>
          <div class="reveal">
            <span class="h-kicker">Gặp Gỡ Ethan</span>
            <h2 class="h-section-title">Realtor Của Bạn Tại <span>Dallas-Fort Worth</span></h2>
            <p>Ethan Dao (Tùng Đào) là Realtor thuộc eXp Realty và Texas Ace Team, hỗ trợ người mua, người bán và nhà đầu tư tại Dallas-Fort Worth. Anh kết hợp am hiểu địa phương với hệ thống video marketing tiếp cận cộng đồng 15.000+ người theo dõi trên mạng xã hội. Sinh ra tại Tây Hồ (Hà Nội) và tốt nghiệp Đại học FPT, Ethan mang đến góc nhìn quốc tế cùng dịch vụ song ngữ Việt-Anh. Dù bạn mua nhà lần đầu tại Lavon, McKinney hay đầu tư lâu dài tại DFW, Ethan luôn đặt lợi ích và kết quả thực tế của bạn lên hàng đầu.</p>
            <div class="button-row"><a class="btn-ink" href="<?php echo esc_url(home_url('/contact/')); ?>">Làm việc cùng Ethan</a><a class="btn-outline-dark" href="<?php echo esc_url(home_url('/past-transactions/')); ?>">Xem nhà đã bán</a></div>
          </div>
        </div>
      </section>

      <section class="platforms">
        <span>Theo Dõi Ethan Tại</span><strong>eXp Realty</strong><strong>Texas Ace Team</strong><strong>Zillow</strong><strong>YouTube</strong><strong>Facebook</strong><strong>Instagram</strong><strong>TikTok</strong>
      </section>

      <section class="map-section zillow-profile-section">
        <div class="zillow-profile-inner reveal">
          <h2>Giao dịch đã bán và nhà đang bán của Ethan Dao (40)</h2>
          <p>Bản đồ và danh sách này hiển thị các giao dịch đã bán và nhà đang bán gần đây nhất.</p>
          <div class="profile-map-filters" role="tablist" aria-label="Sales and listings map filters">
            <button class="active" type="button" data-profile-map-filter="all">Tất cả</button>
            <button type="button" data-profile-map-filter="sold"><span></span>Đã bán</button>
            <button type="button" data-profile-map-filter="sale"><span></span>Đang bán</button>
          </div>
          <div id="ethan-profile-map" class="profile-map" data-profile-map aria-label="Ethan Dao sales and listings map"></div>
        </div>
      </section>

      <section class="quote-band">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-aerial-houston.jpg?v=1.0.20" alt="" />
        <div></div>
        <p class="reveal">"Giúp bạn tìm những căn nhà đẹp, giá hợp lý tại Dallas-Fort Worth và chia sẻ kinh nghiệm thực tế về bất động sản tại Mỹ."</p>
      </section>

      <section class="split reverse">
        <div class="split-wrap">
          <div class="split-image right"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-newbuild.jpg?v=1.0.20" alt="Buy with Confidence" /></div>
          <div class="split-card reveal">
            <p class="h-eyebrow">Cho Người Mua</p>
            <h2 class="h-section-title">Mua nhà tự tin</h2>
            <p>Bạn mua nhà lần đầu tại Lavon, McKinney hay tìm cơ hội đầu tư tại Dallas-Fort Worth? Ethan sẽ hướng dẫn từng bước bằng kiến thức địa phương. Với thế mạnh song ngữ Việt-Anh, Ethan giúp bạn nắm rõ tài chính, khu vực và đàm phán thành công.</p>
            <div class="button-row"><a href="<?php echo esc_url(home_url('/buyer-guide/')); ?>" class="btn-outline-dark">Hướng dẫn mua nhà</a><a href="<?php echo esc_url(home_url('/browse-properties/')); ?>" class="btn-outline-dark">Tìm nhà</a></div>
          </div>
        </div>
      </section>

      <section class="split">
        <div class="split-wrap">
          <div class="split-image left"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-home-brick2story.jpg?v=1.0.20" alt="Sell with Strategy" /></div>
          <div class="split-card reveal">
            <p class="h-eyebrow">Cho Người Bán</p>
            <h2 class="h-section-title">Bán nhà có chiến lược</h2>
            <p>Marketing tốt giúp bán nhà giá cao hơn. Ethan kết hợp chiến lược định giá và hệ thống video marketing, đưa nhà của bạn tiếp cận trực tiếp 15.000+ người mua tiềm năng trên mạng xã hội. Từng giao dịch luôn rõ ràng, có kế hoạch và hướng đến kết quả.</p>
            <div class="button-row"><a href="<?php echo esc_url(home_url('/seller-guide/')); ?>" class="btn-outline-dark">Hướng dẫn bán nhà</a><a href="<?php echo esc_url(home_url('/home-valuation/')); ?>" class="btn-outline-dark">Định giá nhà</a></div>
          </div>
        </div>
      </section>

      <section class="recognition">
        <div class="glow"></div>
        <div class="recognition-grid">
          <img class="reveal" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-awards.png?v=1.0.20" alt="Texas Ace Team Chuyên viên nổi bật crystal awards for Ethan Dao, 2024 and 2025" />
          <div class="reveal">
            <span class="h-kicker light">Thành Tích</span>
            <h2 class="h-section-title">Hai năm liên tiếp <span>chuyên viên nổi bật</span></h2>
            <p>Được vinh danh Chuyên viên nổi bật của <strong>Texas Ace Team tại eXp Realty</strong> năm 2024 và 2025. Giải thưởng là sự công nhận cho thành tích bán hàng và kết quả thực tế mang lại cho khách hàng tại DFW.</p>
            <div class="badges"><span>Chuyên viên nổi bật 2024</span><span>Chuyên viên nổi bật 2025</span><span>Cộng Đồng 15K+</span></div>
          </div>
        </div>
      </section>

      <section class="beyond">
        <div class="container">
          <h2 class="h-section-title reveal">Không chỉ là bất động sản cùng Ethan</h2>
          <article class="media-row reveal"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-aerial-neighborhood.jpg?v=1.0.20" alt="Ethan Dao - Mua Ban Nha Dallas Texas" /><div><i></i><h3>Ethan Dao - Mua Bán Nhà Dallas Texas</h3><p>A YouTube channel hunting for beautiful, well-priced homes across Dallas-Fort Worth, with a new video every week.</p></div></article>
          <article class="media-row reveal"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-home-ranch.jpg?v=1.0.20" alt="Bất động sản cho cộng đồng Việt" /><div><i></i><h3>Bất động sản cho cộng đồng Việt</h3><p>Bilingual guidance on buying, selling, and investing in the U.S. - breaking down the process step by step.</p></div></article>
          <article class="media-row reveal"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-aerial-houston.jpg?v=1.0.20" alt="Life & Business in Texas" /><div><i></i><h3>Cuộc sống và kinh doanh tại Texas</h3><p>Behind-the-scenes on TikTok and Instagram - neighborhoods, open houses, and everyday life in DFW.</p></div></article>
        </div>
      </section>

      <section class="videos">
        <div class="video-grid">
          <article class="reveal"><h3>Lavon 75166 - New-Build Community, 30 Min from Garland</h3><p>From $300K Â· Attractive builder incentives</p><a href="#" class="video-thumbnail"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-newbuild.jpg?v=1.0.20" alt="" /><span><svg><use href="#icon-play"/></svg></span></a></article>
          <article class="reveal"><h3>Wylie 75098 - 2017 Home in Inspiration Community</h3><p>Corner lot Â· Highly-rated schools</p><a href="#" class="video-thumbnail"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-home-brick2story.jpg?v=1.0.20" alt="" /><span><svg><use href="#icon-play"/></svg></span></a></article>
          <article class="reveal"><h3>nhà mới tại Lavon, Texas - từ $300K</h3><p>Live in or rent out right away</p><a href="#" class="video-thumbnail"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-lavon.jpg?v=1.0.20" alt="" /><span><svg><use href="#icon-play"/></svg></span></a></article>
        </div>
      </section>

      <section id="recent" class="recent">
        <div class="container">
          <span class="h-kicker">Proven track record</span>
          <h2 class="h-section-title">Nhà đã bán gần đây</h2>
          <div class="sales-track no-scrollbar" data-sales-track>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-garland.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>2610 Dodson St, Garland, TX 75042</h3><p>2 Phòng ngủ &middot; 3 Phòng tắm &middot; 1,542 Sq.Ft. &middot; Seller</p></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-home-8.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>5816 Mandarin Ln, Sachse, TX 75048</h3><p>4 Phòng ngủ &middot; 2 Phòng tắm &middot; 2,081 Sq.Ft. &middot; Buyer</p></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-arlington.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>1729 Duster Cir, Arlington, TX 76018</h3><p>3 Phòng ngủ &middot; 2 Phòng tắm &middot; 1,457 Sq.Ft. &middot; Buyer</p></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-lavon.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>697 Poppy Ln, Lavon, TX 75166</h3><p>4 Phòng ngủ &middot; 2 Phòng tắm &middot; 1,791 Sq.Ft. &middot; Buyer</p></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-mckinney-tidal.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>604 Tidal Dr, McKinney, TX 75071</h3><p>4 Phòng ngủ &middot; 3 Phòng tắm &middot; 2,059 Sq.Ft. &middot; Buyer</p></div></article>
          </div>          <div class="carousel-actions"><div><button data-scroll-sales="-1" aria-label="Previous"><svg><use href="#icon-chevron-left"/></svg></button><button data-scroll-sales="1" aria-label="Next"><svg><use href="#icon-chevron-right"/></svg></button></div><a href="<?php echo esc_url(home_url('/past-transactions/')); ?>" class="btn-gold">View Tất cả</a></div>
        </div>
      </section>

      <section class="listings">
        <div class="container">
          <div class="center reveal"><span class="h-kicker light">Portfolio across DFW</span><h2 class="h-section-title">Nhà tại Dallas-Fort Worth</h2></div>
          <div class="listing-grid">
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-home-brick2story.jpg?v=1.0.20" alt="" /><span class="sale">Đang bán</span><div><h3>$495,000</h3><p>3508 Almond Ln, McKinney, TX 75070</p><small>4 Phòng ngủ &middot; 3 Phòng tắm &middot; 3,045 Sq.Ft.</small></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-aerial-neighborhood.jpg?v=1.0.20" alt="" /><span class="sale">Đang bán</span><div><h3>$99,000</h3><p>LOT 156 Bison Ridge Dr, Stephenville, TX 76401</p><small>Lot / Land</small></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-garland.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>Đã bán</h3><p>2610 Dodson St, Garland, TX 75042</p><small>2 Phòng ngủ &middot; 3 Phòng tắm &middot; 1,542 Sq.Ft. &middot; Seller</small></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-home-8.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>Đã bán</h3><p>5816 Mandarin Ln, Sachse, TX 75048</p><small>4 Phòng ngủ &middot; 2 Phòng tắm &middot; 2,081 Sq.Ft. &middot; Buyer</small></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-arlington.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>Đã bán</h3><p>1729 Duster Cir, Arlington, TX 76018</p><small>3 Phòng ngủ &middot; 2 Phòng tắm &middot; 1,457 Sq.Ft. &middot; Buyer</small></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-lavon.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>Đã bán</h3><p>697 Poppy Ln, Lavon, TX 75166</p><small>4 Phòng ngủ &middot; 2 Phòng tắm &middot; 1,791 Sq.Ft. &middot; Buyer</small></div></article>
            <article><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-mckinney-tidal.jpg?v=1.0.20" alt="" /><span>Đã bán</span><div><h3>Đã bán</h3><p>604 Tidal Dr, McKinney, TX 75071</p><small>4 Phòng ngủ &middot; 3 Phòng tắm &middot; 2,059 Sq.Ft. &middot; Buyer</small></div></article>
          </div>        </div>
      </section>
      <section class="browse-cta"><a href="<?php echo esc_url(home_url('/browse-properties/')); ?>" class="btn-outline-light">tìm nhà</a></section>

      <section class="valuation">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-aerial-neighborhood.jpg?v=1.0.20" alt="" />
        <div></div>
        <div class="container reveal">
          <h2 class="h-section-title">Căn nhà của bạn tại Dallas-Fort Worth đáng giá bao nhiêu?</h2>
          <div class="check-row"><span><svg><use href="#icon-check"/></svg>Định giá nhanh</span><span><svg><use href="#icon-check"/></svg>Tư vấn địa phương chuyên sâu</span><span><svg><use href="#icon-check"/></svg>Bán với giá tốt hơn</span></div>
          <form data-static-form><input type="text" placeholder="Nhập địa chỉ nhà của bạn" /><button class="btn-gold">Nhận định giá nhà miễn phí</button></form>
        </div>
      </section>

      <section class="neighborhoods">
        <div class="container">
          <div class="center reveal"><span class="h-kicker light">Where Ethan works</span><h2 class="h-section-title">Khu vực nổi bật</h2></div>
          <div class="neighborhood-grid">
            <a href="<?php echo esc_url(home_url('/mckinney/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-mckinney-tidal.jpg?v=1.0.20" alt="Homes in McKinney, Texas" /><div><h3>McKinney</h3><span>View homes â†’</span></div></a>
            <a href="<?php echo esc_url(home_url('/lavon/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-newbuild.jpg?v=1.0.20" alt="Homes in Lavon, Texas" /><div><h3>Lavon</h3><span>View homes â†’</span></div></a>
            <a href="<?php echo esc_url(home_url('/garland/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-listing-garland.jpg?v=1.0.20" alt="Homes in Garland, Texas" /><div><h3>Garland</h3><span>View homes â†’</span></div></a>
          </div>
          <div class="center last"><a href="<?php echo esc_url(home_url('/neighborhoods/')); ?>" class="btn-outline-light">Xem tất cả khu vực</a></div>
        </div>
      </section>

      <section class="newsletter">
        <div class="newsletter-inner reveal">
          <h2 class="h-section-title">Kinh nghiệm gặp gỡ sự tận tâm</h2>
          <p>Đăng ký nhận thông tin nhà mới, phân tích thị trường và ưu đãi nổi bật nhất tại Dallas-Fort Worth.</p>
          <form data-static-form><input type="text" placeholder="Họ tên" /><input type="email" placeholder="Email" /><button class="btn-gold">Gửi thông tin</button></form>
          <label><input type="checkbox" /> <span>Tôi đồng ý để Ethan Dao liên hệ qua điện thoại, email và tin nhắn về dịch vụ bất động sản. Để dừng nhận tin, hãy trả lời "stop" bất cứ lúc nào hoặc trả lời "help" để được hỗ trợ. Bạn cũng có thể bấm liên kết hủy đăng ký trong email. Có thể phát sinh phí tin nhắn và dữ liệu. Tần suất tin nhắn có thể thay đổi. <a href="<?php echo esc_url(home_url('/contact/')); ?>">Chính sách bảo mật</a>.</span></label>
        </div>
      </section>

      <section id="work" class="work">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-home-brick2story.jpg?v=1.0.20" alt="" />
        <div></div>
        <div class="work-inner reveal">
          <span class="h-kicker light">Cùng bắt đầu</span>
          <h2 class="h-section-title">Làm việc cùng Ethan</h2>
          <p>Bạn cần mua bán nhà tại Dallas-Fort Worth? Dù mua, bán hay đầu tư, Ethan sẽ đồng hành cùng bạn với chiến lược thực tế và sự tận tâm từ ngày đầu tiên đến khi closing.</p>
          <a href="tel:(469) 989-5786" class="btn-gold">Kết nối ngay</a>
        </div>
      </section>
    </main>
    <footer class="footer">
      <div class="container">
        <div class="footer-logo"><svg viewBox="0 0 200 200"><rect x="8" y="8" width="184" height="184" rx="16" fill="none" stroke="#0a0a0a" stroke-width="6"/><text x="100" y="100" dominant-baseline="central" text-anchor="middle" font-family="Google Sans Flex, sans-serif" font-weight="700" font-size="96" letter-spacing="-4" fill="#0a0a0a">ED</text></svg><span><strong>ETHAN DAO</strong><small>REALTOR</small></span></div>
        <div class="footer-cols"><div><h3>Ethan Dao</h3><a href="tel:+14699895786">(469) 989-5786</a><a href="mailto:ethandao.realtor@gmail.com">ethandao.realtor@gmail.com</a></div><div><h3>Môi giới</h3><p>eXp Realty - Texas Ace Team</p><p>Serving the Dallas-Fort Worth Metroplex, TX</p></div><div><h3>Tìm kiếm</h3><p><a href="<?php echo esc_url(home_url('/browse-properties/')); ?>">Tìm nhà</a></p><p><a href="<?php echo esc_url(home_url('/home-valuation/')); ?>">Định giá nhà</a></p></div><div><h3>Liên hệ</h3><p><a href="<?php echo esc_url(home_url('/contact/')); ?>">Đặt lịch tư vấn</a></p><p><a href="<?php echo esc_url(home_url('/agent-collaborations/')); ?>">Hợp tác đại lý</a></p></div></div>
        <?php echo ethan_dao_vanilla_render_footer_nav(); ?>
        <p class="disclaimer">Ethan Dao (Tung Dao) is a licensed real estate agent in the State of Texas, affiliated with eXp Realty, LLC and the Texas Ace Team. Listing and sales information is intended solely for personal, non-commercial use to identify properties of interest. While generally considered reliable, this data is not guaranteed accurate; buyers are responsible for verifying all information independently. Equal Housing Opportunity.</p>
        <p class="copyright">©2026 NTREIS. All rights reserved.</p>
      </div>
      <div class="bottom-bar"><span>ETHAN DAO - REALTOR®</span><span>eXp Realty - Texas Ace Team - Dallas-Fort Worth, TX</span><span>Copyright © 2026 | <a href="<?php echo esc_url(home_url('/contact/')); ?>">Chính sách bảo mật</a></span></div>
    </footer>
    <div class="floating-social"></div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/script.js?ver=1.0.3"></script>
  <?php wp_footer(); ?>
  </body>
</html>









