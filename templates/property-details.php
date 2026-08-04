<?php
$property_id = (int) get_query_var('ethan_property_id');
$property = $property_id > 0 ? get_post($property_id) : null;
$is_property = $property && $property->post_type === 'property';
?>
<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Chi tiết bất động sản | Ethan Dao</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Dancing+Script:wght@700&family=Pattaya&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet" />
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
      <symbol id="icon-menu" viewBox="0 0 24 24"><path d="M5 9h14M5 15h14" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></symbol>
      <symbol id="icon-phone" viewBox="0 0 24 24"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
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

<main class="subpage-main pd-page">

<?php if (!$is_property): ?>
  <section style="padding:120px 0 80px;text-align:center;">
    <div class="container">
      <p style="color:var(--muted);font-size:14px;letter-spacing:.06em;text-transform:uppercase;margin:0 0 16px;">404</p>
      <h1 style="font-family:var(--font-display);font-size:clamp(2rem,4vw,3rem);color:var(--ink-strong);letter-spacing:-.04em;margin:0 0 16px;">Không tìm thấy bất động sản</h1>
      <a href="<?php echo esc_url(home_url('/properties/')); ?>" style="color:var(--gold-dark);font-weight:600;font-size:14px;">← Quay lại danh sách</a>
    </div>
  </section>

<?php else:
  $prop_id      = $property->ID;
  $p_addr       = ethan_dao_vanilla_property_meta('property_address', $prop_id);
  $p_status     = ethan_dao_vanilla_property_meta('property_status', $prop_id);
  $p_price      = ethan_dao_vanilla_property_meta('property_price', $prop_id);
  $p_price_text = ethan_dao_vanilla_property_meta('property_price_text', $prop_id);
  $p_city       = ethan_dao_vanilla_property_meta('property_city', $prop_id);
  $p_beds       = ethan_dao_vanilla_property_meta('property_bedrooms', $prop_id);
  $p_baths      = ethan_dao_vanilla_property_meta('property_bathrooms', $prop_id);
  $p_sqft       = ethan_dao_vanilla_property_meta('property_sqft', $prop_id);
  $p_img        = ethan_dao_vanilla_property_meta('property_image', $prop_id);
  $p_details    = ethan_dao_vanilla_property_meta('property_details', $prop_id);
  $p_sold       = ethan_dao_vanilla_property_meta('property_sold_date', $prop_id);
  $p_zpid       = ethan_dao_vanilla_property_meta('property_zpid', $prop_id);
  $gallery_urls = ethan_dao_vanilla_property_gallery_urls($prop_id);

  $display_price = '';
  if ($p_price_text !== '') {
    $display_price = $p_price_text;
  } elseif (is_numeric($p_price) && $p_price > 0) {
    $display_price = '$' . number_format((float) $p_price);
  }

  $sold_note = '';
  if ($p_status === 'for sale') {
    $sold_note = $p_sold !== '' ? 'Đã bán ' . $p_sold : 'Liên hệ để xem nhà';
  } else {
    $sold_note = $p_sold !== '' ? 'Đã bán ' . $p_sold : 'Đã bán';
  }

  $neighbors = ethan_dao_vanilla_get_properties();
  $idx = -1;
  foreach ($neighbors as $k => $n) {
    if ((int) $n->ID === $prop_id) { $idx = $k; break; }
  }
  $prev_p = ($idx > 0) ? $neighbors[$idx - 1] : null;
  $next_p = ($idx < count($neighbors) - 1) ? $neighbors[$idx + 1] : null;

  $sqft_fmt = $p_sqft !== '' ? number_format((float) str_replace(',', '', $p_sqft)) : '';
?>

<!-- ═══ HERO ═══ -->
<div class="pd-hero-wrap">

  <div class="pd-hero-meta">
    <div>
      <h1 class="pd-hero-addr"><?php echo esc_html($p_addr); ?></h1>
      <?php if ($p_city !== ''): ?>
        <p class="pd-hero-city"><?php echo esc_html($p_city . ', TX'); ?></p>
      <?php endif; ?>
    </div>
    <?php if ($p_status === 'for sale'): ?>
    <div class="pd-hero-meta-right">
      <span class="pd-badge pd-badge--sale">Đang bán</span>
      <?php if ($display_price !== ''): ?>
        <strong class="pd-hero-price-val"><?php echo esc_html($display_price); ?></strong>
      <?php endif; ?>
      <span class="pd-hero-price-note">Liên hệ để xem nhà</span>
    </div>
    <?php endif; ?>
  </div>

  <?php
  $all_imgs  = empty($gallery_urls)
    ? [get_template_directory_uri() . '/assets/images/ethan-home-8.jpg']
    : $gallery_urls;
  $img_count = count($all_imgs);
  $side_imgs = array_slice($all_imgs, 1, 4);
  $side_count = count($side_imgs);
  ?>

  <div class="pd-mosaic <?php echo $side_count > 0 ? 'pd-mosaic--split' : 'pd-mosaic--solo'; ?>">

    <div class="pd-mosaic-main" data-lightbox="0" role="button" tabindex="0" aria-label="Xem ảnh 1">
      <img src="<?php echo esc_url($all_imgs[0]); ?>" alt="<?php echo esc_attr($p_addr); ?>" />
    </div>

    <?php if ($side_count > 0): ?>
    <div class="pd-mosaic-side pd-mosaic-side--<?php echo esc_attr($side_count); ?>">
      <?php foreach ($side_imgs as $si => $su): ?>
        <div class="pd-mosaic-cell" data-lightbox="<?php echo esc_attr($si + 1); ?>"
             role="button" tabindex="0" aria-label="Xem ảnh <?php echo esc_attr($si + 2); ?>">
          <img src="<?php echo esc_url($su); ?>"
               alt="<?php echo esc_attr($p_addr . ' — ảnh ' . ($si + 2)); ?>"
               loading="lazy" />
          <?php if ($si === 3 && $img_count > 5): ?>
            <div class="pd-mosaic-more">+<?php echo esc_html($img_count - 5); ?></div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if ($img_count > 1): ?>
    <button class="pd-mosaic-all" data-lightbox="0" aria-label="Xem tất cả ảnh">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="9" height="9" rx="1"/><rect x="13" y="2" width="9" height="9" rx="1"/><rect x="2" y="13" width="9" height="9" rx="1"/><rect x="13" y="13" width="9" height="9" rx="1"/></svg>
      Xem tất cả <?php echo esc_html($img_count); ?> ảnh
    </button>
    <?php endif; ?>

  </div>

</div><!-- /.pd-hero-wrap -->

<!-- ═══ STATS BAR ═══ -->
<div class="pd-stats-bar">
  <div class="pd-stats-inner">
    <div class="pd-stat-item">
      <span class="pd-stat-num"><?php echo esc_html($p_beds !== '' ? $p_beds : '—'); ?></span>
      <span class="pd-stat-label">Phòng ngủ</span>
    </div>
    <div class="pd-stat-item">
      <span class="pd-stat-num"><?php echo esc_html($p_baths !== '' ? $p_baths : '—'); ?></span>
      <span class="pd-stat-label">Phòng tắm</span>
    </div>
    <div class="pd-stat-item">
      <span class="pd-stat-num"><?php echo esc_html($sqft_fmt !== '' ? $sqft_fmt : '—'); ?></span>
      <span class="pd-stat-label">Diện tích (sqft)</span>
    </div>
    <div class="pd-stat-item">
      <span class="pd-stat-num"><?php echo esc_html($display_price !== '' ? $display_price : '—'); ?></span>
      <span class="pd-stat-label"><?php echo esc_html($p_status === 'for sale' ? 'Giá niêm yết' : 'Giá bán'); ?></span>
    </div>
  </div>
</div>

<!-- ═══ CONTENT ═══ -->
<section class="pd-content">
  <div class="pd-layout">

    <!-- Main left column -->
    <div class="pd-main">

      <!-- Overview -->
      <div class="pd-block reveal">
        <h2 class="pd-block-title">Tổng quan</h2>
        <p class="pd-block-text">
          <?php
          $desc = trim(strip_tags($property->post_content ?? ''));
          echo esc_html($desc !== ''
            ? wp_trim_words($desc, 60)
            : 'Bất động sản tại ' . $p_addr . '. Liên hệ Ethan Dao để được tư vấn và đặt lịch xem nhà miễn phí tại khu vực Dallas-Fort Worth.');
          ?>
        </p>
      </div>

      <!-- Property facts -->
      <div class="pd-block reveal">
        <h2 class="pd-block-title">Thông tin chi tiết</h2>
        <ul class="pd-facts">
          <li class="pd-fact"><span class="pd-fact-label">Trạng thái</span><strong class="pd-fact-val"><?php echo esc_html($p_status === 'for sale' ? 'Đang bán' : 'Đã bán'); ?></strong></li>
          <?php if ($display_price !== ''): ?>
            <li class="pd-fact"><span class="pd-fact-label"><?php echo esc_html($p_status === 'for sale' ? 'Giá niêm yết' : 'Giá bán'); ?></span><strong class="pd-fact-val"><?php echo esc_html($display_price); ?></strong></li>
          <?php endif; ?>
          <?php if ($p_beds !== ''): ?>
            <li class="pd-fact"><span class="pd-fact-label">Phòng ngủ</span><strong class="pd-fact-val"><?php echo esc_html($p_beds); ?></strong></li>
          <?php endif; ?>
          <?php if ($p_baths !== ''): ?>
            <li class="pd-fact"><span class="pd-fact-label">Phòng tắm</span><strong class="pd-fact-val"><?php echo esc_html($p_baths); ?></strong></li>
          <?php endif; ?>
          <?php if ($sqft_fmt !== ''): ?>
            <li class="pd-fact"><span class="pd-fact-label">Diện tích</span><strong class="pd-fact-val"><?php echo esc_html($sqft_fmt); ?> sqft</strong></li>
          <?php endif; ?>
          <?php if ($p_city !== ''): ?>
            <li class="pd-fact"><span class="pd-fact-label">Thành phố</span><strong class="pd-fact-val"><?php echo esc_html($p_city); ?></strong></li>
          <?php endif; ?>
          <?php if ($p_details !== ''): ?>
            <li class="pd-fact"><span class="pd-fact-label">Vai trò</span><strong class="pd-fact-val"><?php echo esc_html($p_details); ?></strong></li>
          <?php endif; ?>
          <?php if ($p_sold !== ''): ?>
            <li class="pd-fact"><span class="pd-fact-label">Ngày bán</span><strong class="pd-fact-val"><?php echo esc_html($p_sold); ?></strong></li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Gallery grid (if multiple images) -->
      <?php if (count($gallery_urls) > 1): ?>
      <div class="pd-block reveal">
        <h2 class="pd-block-title">Thư viện ảnh <span class="pd-gallery-count"><?php echo count($gallery_urls); ?> ảnh</span></h2>
        <div class="pd-gallery-grid">
          <?php foreach ($gallery_urls as $gi => $gu): ?>
            <button class="pd-gallery-thumb" data-gallery-open="<?php echo esc_attr($gi); ?>" aria-label="Xem ảnh <?php echo esc_attr($gi + 1); ?>">
              <img src="<?php echo esc_url($gu); ?>" alt="<?php echo esc_attr($p_addr . ' — ảnh ' . ($gi + 1)); ?>" loading="lazy" />
            </button>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Prev / Next navigation -->
      <?php if ($prev_p || $next_p): ?>
      <div class="pd-prevnext reveal">
        <?php if ($prev_p): ?>
          <a class="pd-pn pd-pn--prev" href="<?php echo esc_url(ethan_dao_vanilla_property_url((int) $prev_p->ID)); ?>">
            <span class="pd-pn-label">← Trước</span>
            <span class="pd-pn-addr"><?php echo esc_html(ethan_dao_vanilla_property_meta('property_address', (int) $prev_p->ID)); ?></span>
          </a>
        <?php else: ?>
          <span></span>
        <?php endif; ?>
        <?php if ($next_p): ?>
          <a class="pd-pn pd-pn--next" href="<?php echo esc_url(ethan_dao_vanilla_property_url((int) $next_p->ID)); ?>">
            <span class="pd-pn-label">Tiếp theo →</span>
            <span class="pd-pn-addr"><?php echo esc_html(ethan_dao_vanilla_property_meta('property_address', (int) $next_p->ID)); ?></span>
          </a>
        <?php else: ?>
          <span></span>
        <?php endif; ?>
      </div>
      <?php endif; ?>

    </div><!-- /pd-main -->

    <!-- Sidebar -->
    <aside class="pd-sidebar">
      <div class="pd-contact-card">
        <div class="pd-contact-price"><?php echo esc_html($display_price); ?></div>
        <p class="pd-contact-note"><?php echo esc_html($sold_note); ?></p>
        <div class="pd-contact-btns">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="pd-cta-primary">Đặt lịch xem nhà</a>
          <a href="tel:+14699895786" class="pd-cta-secondary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02z"/></svg>
            (469) 989-5786
          </a>
        </div>
        <div class="pd-agent">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ethan-headshot.jpg" alt="Ethan Dao" width="56" height="56" />
          <div class="pd-agent-info">
            <strong>Ethan Dao</strong>
            <span>Texas Ace Team · eXp Realty</span>
            <a href="tel:+14699895786">(469) 989-5786</a>
          </div>
        </div>
      </div>

      <?php if ($p_zpid !== ''): ?>
      <a href="https://www.zillow.com/homedetails/<?php echo esc_attr($p_zpid); ?>_zpid/" target="_blank" rel="noopener noreferrer" class="pd-zillow-link">
        <svg width="14" height="14" viewBox="0 0 24 24"><path d="M12.006 0L1.086 8.627v3.868c3.386-2.013 11.219-5.13 14.763-6.015.11-.024.16.005.227.078.372.427 1.586 1.899 1.916 2.301a.128.128 0 0 1-.03.195 43.607 43.607 0 0 0-6.67 6.527c-.03.037-.006.043.012.03 2.642-1.134 8.828-2.94 11.622-3.452V8.627zm-.48 11.177c-2.136.708-8.195 3.307-10.452 4.576V24h21.852v-7.936c-2.99.506-11.902 3.16-15.959 5.246a.183.183 0 0 1-.23-.036l-2.044-2.429c-.055-.061-.062-.098.011-.208 1.574-2.3 4.789-5.899 6.833-7.418.042-.03.031-.06-.012-.042Z" fill="currentColor"/></svg>
        Xem trên Zillow
      </a>
      <?php endif; ?>
    </aside>

  </div>
</section>

<?php endif; ?>
</main>

<style>
.pd-page { background: #fff; }

/* ── Hero wrapper ── */
.pd-hero-wrap {
  max-width: 1200px;
  margin: 80px auto 0;
  padding: 0 24px;
  box-sizing: border-box;
}

/* ── Hero meta (address + status above photos) ── */
.pd-hero-meta {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 18px;
  flex-wrap: wrap;
}
.pd-hero-addr {
  margin: 0 0 5px;
  color: var(--ink-strong);
  font-family: var(--font-display);
  font-size: clamp(1.4rem, 3vw, 2.2rem);
  font-weight: 600;
  letter-spacing: -.04em;
  line-height: 1.1;
}
.pd-hero-city {
  margin: 0;
  color: #6b6b6b;
  font-size: 13px;
  letter-spacing: -.01em;
}
.pd-hero-meta-right {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 5px;
  flex-shrink: 0;
}
.pd-hero-price-val {
  font-family: var(--font-display);
  font-size: clamp(1.4rem, 2.8vw, 2rem);
  font-weight: 600;
  letter-spacing: -.05em;
  color: var(--ink-strong);
}
.pd-hero-price-note {
  font-size: 12px;
  color: #6b6b6b;
  letter-spacing: -.01em;
}

/* Status badge */
.pd-badge {
  display: inline-block;
  font-size: 10px; font-weight: 700;
  letter-spacing: .1em; text-transform: uppercase;
  padding: 5px 12px; border-radius: 999px;
}
.pd-badge--sale { background: var(--gold); color: var(--ink-black); }
.pd-badge--sold { background: rgba(0,0,0,.07); color: #6b6b6b; border: 1px solid rgba(0,0,0,.1); }

/* ── Photo mosaic ── */
.pd-mosaic {
  position: relative;
  display: grid;
  gap: 6px;
  border-radius: 12px;
  overflow: hidden;
  height: clamp(280px, 46vh, 520px);
}
.pd-mosaic--solo  { grid-template-columns: 1fr; }
.pd-mosaic--split { grid-template-columns: 3fr 2fr; }

.pd-mosaic-main {
  position: relative; overflow: hidden; cursor: zoom-in;
}
.pd-mosaic-main img {
  width: 100%; height: 100%;
  object-fit: cover; display: block;
  transition: transform .5s cubic-bezier(.22,1,.36,1);
}
.pd-mosaic-main:hover img { transform: scale(1.03); }
.pd-mosaic-main:focus-visible { outline: 2px solid var(--gold); outline-offset: -2px; }

.pd-mosaic-side {
  display: grid;
  gap: 6px;
}
.pd-mosaic-side--1 { grid-template-columns: 1fr; grid-template-rows: 1fr; }
.pd-mosaic-side--2 { grid-template-columns: 1fr; grid-template-rows: 1fr 1fr; }
.pd-mosaic-side--3 { grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; }
.pd-mosaic-side--3 .pd-mosaic-cell:first-child { grid-column: 1 / 3; }
.pd-mosaic-side--4 { grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; }

.pd-mosaic-cell {
  position: relative; overflow: hidden; cursor: zoom-in;
}
.pd-mosaic-cell img {
  width: 100%; height: 100%;
  object-fit: cover; display: block;
  transition: transform .5s cubic-bezier(.22,1,.36,1);
}
.pd-mosaic-cell:hover img { transform: scale(1.04); }
.pd-mosaic-cell:focus-visible { outline: 2px solid var(--gold); outline-offset: -2px; }

.pd-mosaic-more {
  position: absolute; inset: 0;
  background: rgba(10,10,10,.5);
  color: #fff; font-size: 18px; font-weight: 600; letter-spacing: -.02em;
  display: flex; align-items: center; justify-content: center;
  pointer-events: none;
}

.pd-mosaic-all {
  position: absolute; bottom: 16px; right: 16px; z-index: 5;
  display: inline-flex; align-items: center; gap: 8px;
  padding: 9px 16px; border-radius: 8px;
  background: rgba(255,255,255,.92); backdrop-filter: blur(8px);
  border: 1px solid rgba(0,0,0,.1);
  font-size: 12px; font-weight: 600; color: var(--ink-strong);
  cursor: pointer; letter-spacing: -.01em;
  transition: background .2s;
}
.pd-mosaic-all:hover { background: #fff; }

/* ── Lightbox ── */
.pd-lb {
  display: none;
  position: fixed; inset: 0; z-index: 9999;
  background: rgba(0,0,0,.94);
  align-items: center; justify-content: center;
}
.pd-lb.is-open { display: flex; }
.pd-lb-img {
  max-width: min(88vw, 1100px);
  max-height: 84vh;
  width: auto; height: auto;
  object-fit: contain; border-radius: 4px; display: block;
}
.pd-lb-close {
  position: absolute; top: 18px; right: 22px;
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.15);
  cursor: pointer; color: rgba(255,255,255,.8);
  width: 40px; height: 40px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px; transition: background .2s, color .2s;
}
.pd-lb-close:hover { background: rgba(255,255,255,.2); color: #fff; }
.pd-lb-prev, .pd-lb-next {
  position: absolute; top: 50%; transform: translateY(-50%);
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.15);
  cursor: pointer; color: rgba(255,255,255,.8);
  width: 48px; height: 48px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 24px; transition: background .2s;
  backdrop-filter: blur(8px);
}
.pd-lb-prev:hover, .pd-lb-next:hover { background: rgba(255,255,255,.2); color: #fff; }
.pd-lb-prev { left: 20px; }
.pd-lb-next { right: 20px; }
.pd-lb-count {
  position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);
  color: rgba(255,255,255,.55); font-size: 12px; letter-spacing: .04em;
  white-space: nowrap;
}

/* ── Stats bar ── */
.pd-stats-bar {
  background: #fff;
  border-bottom: 1px solid rgba(0,0,0,.08);
}
.pd-stats-inner {
  max-width: 1200px; margin: 0 auto; padding: 0 clamp(24px, 4vw, 40px);
  display: grid; grid-template-columns: repeat(4, minmax(0, 1fr));
}
.pd-stat-item {
  padding: 28px 0; text-align: center;
  border-right: 1px solid rgba(0,0,0,.08);
}
.pd-stat-item:last-child { border-right: 0; }
.pd-stat-num {
  display: block;
  font-family: var(--font-display);
  font-size: clamp(1.3rem, 2.2vw, 1.8rem);
  font-weight: 600;
  letter-spacing: -.05em;
  color: var(--ink-strong);
  line-height: 1;
}
.pd-stat-label {
  display: block;
  margin-top: 6px;
  font-size: 10px; font-weight: 700; letter-spacing: .08em;
  text-transform: uppercase; color: #6b6b6b;
}

/* ── Content area ── */
.pd-content {
  background: #fff;
  padding: clamp(48px, 7vw, 88px) 0 clamp(72px, 10vw, 112px);
}
.pd-layout {
  max-width: 1200px; margin: 0 auto;
  padding: 0 clamp(24px, 4vw, 40px);
  display: grid;
  grid-template-columns: minmax(0, 1fr) 340px;
  gap: clamp(40px, 6vw, 80px);
  align-items: start;
}

/* ── Content blocks ── */
.pd-block {
  border-top: 1px solid rgba(0,0,0,.08);
  padding-top: clamp(32px, 4vw, 48px);
  margin-bottom: clamp(40px, 5vw, 60px);
}
.pd-block:first-child { border-top: 0; padding-top: 0; }
.pd-block-title {
  font-family: var(--font-display);
  font-size: 17px; font-weight: 600;
  letter-spacing: -.03em; color: var(--ink-strong);
  margin: 0 0 20px;
}
.pd-block-text {
  font-size: 15px; line-height: 1.78;
  color: #6b6b6b; margin: 0;
  letter-spacing: -.01em;
  max-width: 65ch;
}

/* Facts list */
.pd-facts {
  list-style: none; margin: 0; padding: 0;
}
.pd-fact {
  display: flex; justify-content: space-between; align-items: center;
  padding: 13px 0;
  border-bottom: 1px solid rgba(0,0,0,.06);
  font-size: 14px; letter-spacing: -.01em;
}
.pd-fact:last-child { border-bottom: 0; }
.pd-fact-label { color: #6b6b6b; }
.pd-fact-val { color: var(--ink-strong); font-weight: 600; text-align: right; }

/* Gallery grid */
.pd-gallery-count {
  font-size: 12px; font-weight: 500; color: #6b6b6b;
  letter-spacing: .04em; margin-left: 8px;
}
.pd-gallery-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 6px;
}
.pd-gallery-thumb {
  display: block; padding: 0; border: 0; background: none; cursor: pointer;
  overflow: hidden; aspect-ratio: 4/3;
}
.pd-gallery-thumb img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: grayscale(.08);
  transition: transform .5s cubic-bezier(.22,1,.36,1), opacity .25s;
}
.pd-gallery-thumb:hover img { transform: scale(1.05); opacity: .88; }

/* Prev / Next */
.pd-prevnext {
  display: flex; justify-content: space-between; gap: 24px;
  border-top: 1px solid rgba(0,0,0,.08);
  padding-top: clamp(32px, 4vw, 48px);
  margin-top: clamp(40px, 5vw, 60px);
}
.pd-pn {
  display: flex; flex-direction: column; gap: 6px;
  text-decoration: none;
}
.pd-pn--next { text-align: right; }
.pd-pn-label {
  font-size: 11px; font-weight: 700; letter-spacing: .07em;
  text-transform: uppercase; color: #aaa;
}
.pd-pn-addr {
  font-size: 14px; font-weight: 600; color: var(--ink-strong);
  letter-spacing: -.02em; line-height: 1.35;
  transition: color .2s;
}
.pd-pn:hover .pd-pn-addr { color: var(--gold-dark); }

/* ── Sidebar ── */
.pd-sidebar { position: sticky; top: 28px; }

.pd-contact-card {
  background: var(--ink-strong);
  padding: clamp(28px, 4vw, 40px) clamp(24px, 3.5vw, 36px);
}
.pd-contact-price {
  font-family: var(--font-display);
  font-size: clamp(1.6rem, 2.8vw, 2.2rem);
  font-weight: 600; letter-spacing: -.05em;
  color: #fff; margin: 0 0 6px;
  line-height: 1;
}
.pd-contact-note {
  font-size: 13px; color: rgba(255,255,255,.45);
  margin: 0 0 28px; letter-spacing: -.01em;
}
.pd-contact-btns {
  display: flex; flex-direction: column; gap: 10px; margin-bottom: 32px;
}
.pd-cta-primary {
  display: flex; align-items: center; justify-content: center;
  gap: 8px; padding: 15px 24px; border-radius: 999px;
  background: var(--gold); color: var(--ink-black);
  font-size: 13px; font-weight: 700; letter-spacing: -.01em;
  text-decoration: none;
  transition: background .25s cubic-bezier(.22,1,.36,1), transform .22s;
}
.pd-cta-primary:hover { background: var(--gold-light); transform: translateY(-1px); }
.pd-cta-secondary {
  display: flex; align-items: center; justify-content: center;
  gap: 8px; padding: 14px 24px; border-radius: 999px;
  background: transparent; color: rgba(255,255,255,.72);
  border: 1px solid rgba(255,255,255,.18);
  font-size: 13px; font-weight: 600; letter-spacing: -.01em;
  text-decoration: none;
  transition: border-color .22s, color .22s, transform .22s;
}
.pd-cta-secondary:hover { border-color: rgba(255,255,255,.38); color: #fff; transform: translateY(-1px); }

.pd-agent {
  display: flex; align-items: center; gap: 14px;
  border-top: 1px solid rgba(255,255,255,.1);
  padding-top: 24px;
}
.pd-agent img {
  width: 52px; height: 52px; border-radius: 50%;
  object-fit: cover; flex-shrink: 0;
  filter: grayscale(.1);
}
.pd-agent-info strong {
  display: block; font-size: 14px; color: #fff;
  font-weight: 600; letter-spacing: -.02em;
}
.pd-agent-info span {
  display: block; font-size: 11px; color: rgba(255,255,255,.42);
  margin-top: 3px; letter-spacing: -.01em;
}
.pd-agent-info a {
  display: block; font-size: 13px; color: var(--gold);
  font-weight: 600; margin-top: 6px; letter-spacing: -.01em;
  text-decoration: none;
  transition: color .2s;
}
.pd-agent-info a:hover { color: var(--gold-light); }

/* Zillow link */
.pd-zillow-link {
  display: inline-flex; align-items: center; gap: 8px;
  margin-top: 14px;
  font-size: 12px; font-weight: 600; letter-spacing: .01em;
  color: #6b6b6b; text-decoration: none;
  transition: color .2s;
}
.pd-zillow-link:hover { color: var(--ink-strong); }

/* ── Responsive ── */
@media (max-width: 1023px) {
  .pd-layout { grid-template-columns: 1fr; }
  .pd-sidebar { position: static; }
  .pd-contact-card { max-width: 540px; }
}

@media (max-width: 767px) {
  .pd-hero-meta { gap: 12px; }
  .pd-hero-meta-right { align-items: flex-start; }
  .pd-mosaic { height: auto; }
  .pd-mosaic--split {
    grid-template-columns: 1fr;
    grid-template-rows: auto auto;
  }
  .pd-mosaic-main { height: 58vw; min-height: 220px; }
  .pd-mosaic-side {
    grid-template-columns: repeat(4, 1fr) !important;
    grid-template-rows: 1fr !important;
    height: 120px;
  }
  .pd-mosaic-side .pd-mosaic-cell:first-child { grid-column: auto !important; }
  .pd-hero-wrap { margin-top: 72px; padding: 0 16px; }
  .pd-stats-inner { grid-template-columns: repeat(2, minmax(0, 1fr)); padding: 0 16px; }
  .pd-stat-num { font-size: clamp(1.1rem, 4vw, 1.6rem); }
  .pd-stat-item:nth-child(2) { border-right: 0; }
  .pd-stat-item:nth-child(3), .pd-stat-item:nth-child(4) { border-top: 1px solid rgba(0,0,0,.08); }
  .pd-gallery-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .pd-lb-prev { left: 10px; }
  .pd-lb-next { right: 10px; }
}

@media (prefers-reduced-motion: reduce) {
  .pd-mosaic-main img, .pd-mosaic-cell img,
  .pd-gallery-thumb img,
  .pd-cta-primary, .pd-cta-secondary { transition: none; }
}
</style>

<script>
(function () {
  var imgs = <?php echo json_encode(array_values($all_imgs)); ?>;
  if (!imgs.length) return;
  var cur = 0;

  var lb = document.createElement('div');
  lb.className = 'pd-lb';
  lb.setAttribute('role', 'dialog');
  lb.setAttribute('aria-modal', 'true');
  lb.innerHTML =
    '<img class="pd-lb-img" alt="" />' +
    '<button class="pd-lb-close" aria-label="Đóng">✕</button>' +
    (imgs.length > 1
      ? '<button class="pd-lb-prev" aria-label="Ảnh trước">&#8249;</button>' +
        '<button class="pd-lb-next" aria-label="Ảnh sau">&#8250;</button>' +
        '<span class="pd-lb-count"></span>'
      : '');
  document.body.appendChild(lb);

  var lbImg   = lb.querySelector('.pd-lb-img');
  var lbCount = lb.querySelector('.pd-lb-count');
  var lbPrev  = lb.querySelector('.pd-lb-prev');
  var lbNext  = lb.querySelector('.pd-lb-next');

  function goTo(i) {
    cur = ((i % imgs.length) + imgs.length) % imgs.length;
    lbImg.src = imgs[cur];
    if (lbCount) lbCount.textContent = (cur + 1) + ' / ' + imgs.length;
  }

  function openLb(i) {
    goTo(i);
    lb.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    lb.querySelector('.pd-lb-close').focus();
  }

  function closeLb() {
    lb.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  lb.querySelector('.pd-lb-close').addEventListener('click', closeLb);
  if (lbPrev) lbPrev.addEventListener('click', function () { goTo(cur - 1); });
  if (lbNext) lbNext.addEventListener('click', function () { goTo(cur + 1); });
  lb.addEventListener('click', function (e) { if (e.target === lb) closeLb(); });

  document.addEventListener('keydown', function (e) {
    if (!lb.classList.contains('is-open')) return;
    if (e.key === 'Escape') { closeLb(); return; }
    if (e.key === 'ArrowLeft'  && lbPrev) goTo(cur - 1);
    if (e.key === 'ArrowRight' && lbNext) goTo(cur + 1);
  });

  var swipeX = 0;
  lb.addEventListener('touchstart', function (e) { swipeX = e.touches[0].clientX; }, { passive: true });
  lb.addEventListener('touchend', function (e) {
    var dx = e.changedTouches[0].clientX - swipeX;
    if (Math.abs(dx) > 40) goTo(dx < 0 ? cur + 1 : cur - 1);
  }, { passive: true });

  function attachLb(sel, attr) {
    document.querySelectorAll(sel).forEach(function (el) {
      el.addEventListener('click', function () { openLb(parseInt(el.getAttribute(attr), 10)); });
      el.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openLb(parseInt(el.getAttribute(attr), 10)); }
      });
    });
  }

  attachLb('[data-lightbox]', 'data-lightbox');
  attachLb('[data-gallery-open]', 'data-gallery-open');
})();
</script>

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
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/script.js?ver=1.0.58"></script>
    <?php wp_footer(); ?>
  </body>
</html>

