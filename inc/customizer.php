<?php
/**
 * Customizer nội dung — cho khách tự sửa text / wording / link
 * KHÔNG cần plugin. Sửa tại: wp-admin → Giao diện → Tùy biến.
 *
 * Template đọc giá trị qua ethan_mod('id', 'mặc định').
 */

if (!defined('ABSPATH')) {
    exit;
}

function ethan_mod(string $id, string $default = ''): string
{
    $val = get_theme_mod($id, $default);
    return ($val === '' || $val === false) ? $default : (string) $val;
}

function ethan_cz_field($wp, string $section, string $id, string $label, string $default = '', string $type = 'text'): void
{
    $sanitize = 'sanitize_text_field';
    if ($type === 'url') {
        $sanitize = 'esc_url_raw';
    } elseif ($type === 'textarea') {
        $sanitize = 'sanitize_textarea_field';
    }
    $wp->add_setting($id, [
        'default'           => $default,
        'sanitize_callback' => $sanitize,
        'transport'         => 'refresh',
    ]);
    $wp->add_control($id, [
        'label'   => $label,
        'section' => $section,
        'type'    => $type,
    ]);
}

function ethan_customize_register($wp): void
{
    /* ============================================================
       PANEL: CHUNG
       ============================================================ */
    $wp->add_panel('ethan_panel_global', [
        'title'    => 'Chung · Liên hệ & Footer',
        'priority' => 10,
    ]);

    $wp->add_section('ethan_global', [
        'title' => 'Liên hệ & Social',
        'panel' => 'ethan_panel_global',
    ]);
    ethan_cz_field($wp, 'ethan_global', 'ethan_phone_display', 'SĐT (hiển thị)', '(469) 989-5786');
    ethan_cz_field($wp, 'ethan_global', 'ethan_phone_raw', 'SĐT (bấm gọi, vd +14699895786)', '+14699895786');
    ethan_cz_field($wp, 'ethan_global', 'ethan_social_facebook', 'Link Facebook', 'https://facebook.com/', 'url');
    ethan_cz_field($wp, 'ethan_global', 'ethan_social_youtube', 'Link YouTube', 'https://youtube.com/', 'url');
    ethan_cz_field($wp, 'ethan_global', 'ethan_social_instagram', 'Link Instagram', 'https://instagram.com/', 'url');
    ethan_cz_field($wp, 'ethan_global', 'ethan_social_tiktok', 'Link TikTok', 'https://tiktok.com/', 'url');
    ethan_cz_field($wp, 'ethan_global', 'ethan_social_zillow', 'Link Zillow', 'https://www.zillow.com/profile/ethandaorealtor', 'url');

    $wp->add_section('ethan_footer', [
        'title' => 'Footer (chân trang)',
        'panel' => 'ethan_panel_global',
    ]);
    ethan_cz_field($wp, 'ethan_footer', 'footer_email', 'Email', 'ethandao.realtor@gmail.com');
    ethan_cz_field($wp, 'ethan_footer', 'footer_brokerage1', 'Môi giới — dòng 1', 'eXp Realty - Texas Ace Team');
    ethan_cz_field($wp, 'ethan_footer', 'footer_brokerage2', 'Môi giới — dòng 2', 'Serving the Dallas-Fort Worth Metroplex, TX');
    ethan_cz_field($wp, 'ethan_footer', 'footer_disclaimer', 'Tuyên bố miễn trừ', 'Ethan Dao (Tung Dao) is a licensed real estate agent in the State of Texas, affiliated with eXp Realty, LLC and the Texas Ace Team. Listing and sales information is intended solely for personal, non-commercial use to identify properties of interest. While generally considered reliable, this data is not guaranteed accurate; buyers are responsible for verifying all information independently. Equal Housing Opportunity.', 'textarea');
    ethan_cz_field($wp, 'ethan_footer', 'footer_copyright', 'Dòng bản quyền', '©2026 NTREIS. All rights reserved.');
    ethan_cz_field($wp, 'ethan_footer', 'footer_bottom_left', 'Thanh dưới — trái', 'ETHAN DAO - REALTOR®');
    ethan_cz_field($wp, 'ethan_footer', 'footer_bottom_mid', 'Thanh dưới — giữa', 'eXp Realty - Texas Ace Team - Dallas-Fort Worth, TX');
    ethan_cz_field($wp, 'ethan_footer', 'footer_privacy', 'Nhãn "Chính sách bảo mật"', 'Chính sách bảo mật');
    ethan_cz_field($wp, 'ethan_footer', 'footer_h3_brand', 'Cột 1 — tiêu đề', 'Ethan Dao');
    ethan_cz_field($wp, 'ethan_footer', 'footer_h3_broker', 'Cột 2 — tiêu đề', 'Môi giới');
    ethan_cz_field($wp, 'ethan_footer', 'footer_h3_search', 'Cột 3 — tiêu đề', 'Tìm kiếm');
    ethan_cz_field($wp, 'ethan_footer', 'footer_h3_contact', 'Cột 4 — tiêu đề', 'Liên hệ');
    ethan_cz_field($wp, 'ethan_footer', 'footer_link_search1', 'Cột 3 — link 1', 'Tìm nhà');
    ethan_cz_field($wp, 'ethan_footer', 'footer_link_search2', 'Cột 3 — link 2', 'Định giá nhà');
    ethan_cz_field($wp, 'ethan_footer', 'footer_link_contact1', 'Cột 4 — link 1', 'Đặt lịch tư vấn');
    ethan_cz_field($wp, 'ethan_footer', 'footer_link_contact2', 'Cột 4 — link 2', 'Hợp tác đại lý');


    /* ============================================================
       PANEL: TRANG CHỦ
       ============================================================ */
    $wp->add_panel('ethan_panel_home', [
        'title'    => 'Trang chủ',
        'priority' => 20,
    ]);

    // --- Hero & Ảnh ---
    $wp->add_section('ethan_home_hero', [
        'title' => 'Hero & Ảnh đại diện',
        'panel' => 'ethan_panel_home',
    ]);
    $wp->add_setting('ethan_headshot_hero', [
        'default'           => get_template_directory_uri() . '/assets/images/ethan-headshot-hero.jpg',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);
    $wp->add_control(new WP_Customize_Image_Control($wp, 'ethan_headshot_hero', [
        'label'   => 'Ảnh đại diện lớn (trang chủ & giới thiệu)',
        'section' => 'ethan_home_hero',
    ]));
    ethan_cz_field($wp, 'ethan_home_hero', 'home_hero_title', 'Tiêu đề (phần thường)', 'Tìm nhà ở DFW, tôi đi cùng bạn', 'textarea');
    ethan_cz_field($wp, 'ethan_home_hero', 'home_hero_title_accent', 'Tiêu đề (phần nhấn, vàng)', 'từ đầu đến cuối.');
    ethan_cz_field($wp, 'ethan_home_hero', 'home_hero_sub', 'Mô tả', 'Làm việc bằng tiếng Việt, hiểu rõ khu vực, không hối thúc bạn mua nếu chưa đúng nhà.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_hero', 'home_hero_cta', 'Nút chính (nhãn)', 'Xem hướng dẫn mua nhà');
    ethan_cz_field($wp, 'ethan_home_hero', 'home_hero_trusted', 'Dòng "Realtor tại..."', 'Realtor tại Dallas-Fort Worth');

    // --- Giới thiệu & Số liệu ---
    $wp->add_section('ethan_home_about', [
        'title' => 'Giới thiệu & Số liệu',
        'panel' => 'ethan_panel_home',
    ]);
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat1_num', 'Số liệu 1 — số', '36');
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat1_label', 'Số liệu 1 — nhãn', 'CLOSED SALES');
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat2_num', 'Số liệu 2 — số', '13');
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat2_label', 'Số liệu 2 — nhãn', 'SALES LAST 12 MO');
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat3_num', 'Số liệu 3 — số', '$369K');
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat3_label', 'Số liệu 3 — nhãn', 'AVERAGE SALE PRICE');
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat4_num', 'Số liệu 4 — số', '15K+');
    ethan_cz_field($wp, 'ethan_home_about', 'home_stat4_label', 'Số liệu 4 — nhãn', 'COMMUNITY FOLLOWERS');
    ethan_cz_field($wp, 'ethan_home_about', 'home_about_kicker', 'Giới thiệu — nhãn nhỏ', 'Giới thiệu ngắn');
    ethan_cz_field($wp, 'ethan_home_about', 'home_about_title', 'Giới thiệu — tiêu đề (thường)', 'Môi giới bất động sản tại');
    ethan_cz_field($wp, 'ethan_home_about', 'home_about_title_accent', 'Giới thiệu — tiêu đề (nhấn)', 'DFW');
    ethan_cz_field($wp, 'ethan_home_about', 'home_about_body', 'Giới thiệu — nội dung', 'Tôi tên Ethan — Tùng Đào. Tôi đang giúp gia đình người Việt mua và bán nhà tại DFW, chủ yếu ở Lavon, McKinney, Garland. Làm việc hoàn toàn bằng tiếng Việt, từ lúc xem nhà đến ngày ký hợp đồng.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_about', 'home_about_btn1', 'Giới thiệu — nút 1', 'Nhắn địa chỉ để định giá');
    ethan_cz_field($wp, 'ethan_home_about', 'home_about_btn2', 'Giới thiệu — nút 2', 'Xem nhà đã bán');
    ethan_cz_field($wp, 'ethan_home_about', 'home_platforms_label', 'Dải platforms — nhãn', 'Theo Dõi Ethan Tại');

    // --- Bản đồ & Giải thưởng ---
    $wp->add_section('ethan_home_map', [
        'title' => 'Bản đồ & Giải thưởng',
        'panel' => 'ethan_panel_home',
    ]);
    ethan_cz_field($wp, 'ethan_home_map', 'home_map_kicker', 'Bản đồ — nhãn nhỏ', 'Giao dịch');
    ethan_cz_field($wp, 'ethan_home_map', 'home_map_title', 'Bản đồ — tiêu đề (thường)', 'Nhà đã bán và đang bán');
    ethan_cz_field($wp, 'ethan_home_map', 'home_map_title_accent', 'Bản đồ — tiêu đề (nhấn)', '(40)');
    ethan_cz_field($wp, 'ethan_home_map', 'home_map_sub', 'Bản đồ — mô tả', 'Các giao dịch trong khu vực tôi đang làm.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_map', 'home_recog_kicker', 'Giải thưởng — nhãn nhỏ', 'Ghi nhận');
    ethan_cz_field($wp, 'ethan_home_map', 'home_recog_title', 'Giải thưởng — tiêu đề (thường)', 'Giải thưởng');
    ethan_cz_field($wp, 'ethan_home_map', 'home_recog_title_accent', 'Giải thưởng — tiêu đề (nhấn)', '2024 và 2025');
    ethan_cz_field($wp, 'ethan_home_map', 'home_recog_body', 'Giải thưởng — nội dung', 'Texas Ace Team trao giải này dựa trên số giao dịch hoàn tất trong năm và đánh giá trực tiếp từ khách hàng.', 'textarea');

    // --- Giao dịch & YouTube ---
    $wp->add_section('ethan_home_recent', [
        'title' => 'Giao dịch & Kênh YouTube',
        'panel' => 'ethan_panel_home',
    ]);
    ethan_cz_field($wp, 'ethan_home_recent', 'home_recent_kicker', 'Giao dịch — nhãn nhỏ', 'Giao dịch thực tế');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_recent_title', 'Giao dịch — tiêu đề (thường)', 'Những căn nhà tôi vừa');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_recent_title_accent', 'Giao dịch — tiêu đề (nhấn)', 'chốt xong');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_recent_cta', 'Giao dịch — nút "Xem tất cả"', 'Xem Tất Cả Nhà');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_video_title', 'YouTube — tiêu đề (thường)', 'Kênh YouTube hướng dẫn mua nhà');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_video_title_accent', 'YouTube — tiêu đề (nhấn)', 'DFW');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid1_embed', 'Video 1 — embed URL', 'https://www.youtube.com/embed/videoseries?list=UUzaeoor-IXyqppQcl59dabw', 'url');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid1_link', 'Video 1 — link URL', 'https://www.youtube.com/channel/UCzaeoor-IXyqppQcl59dabw', 'url');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid1_title', 'Video 1 — tiêu đề (thường)', 'Tour nhà thực tế');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid1_accent', 'Video 1 — tiêu đề (nhấn)', 'Dallas Texas');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid1_body', 'Video 1 — mô tả', 'Tôi quay thực tế bên trong từng căn — không filter, không bỏ qua chỗ xấu. Để bạn xem trước khi đặt lịch.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid2_embed', 'Video 2 — embed URL', 'https://www.youtube.com/embed/qsBWEIueBUs?rel=0', 'url');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid2_link', 'Video 2 — link URL', 'https://www.youtube.com/watch?v=PH7ssSv_eoI', 'url');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid2_title', 'Video 2 — tiêu đề (thường)', 'Phân tích nhà mới và khu dân cư');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid2_accent', 'Video 2 — tiêu đề (nhấn)', 'DFW');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid2_body', 'Video 2 — mô tả', 'Review thực tế 4 mẫu nhà mới tại Lavon, giá $300K–$400K. Tôi xem từng mẫu và nói thẳng cái nào đáng đặt cọc.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid3_embed', 'Video 3 — embed URL', 'https://www.youtube.com/embed/gxwWX1SubZY?rel=0', 'url');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid3_link', 'Video 3 — link URL', 'https://www.youtube.com/watch?v=gxwWX1SubZY', 'url');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid3_title', 'Video 3 — tiêu đề (thường)', 'Hậu trường nghề môi giới tại');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid3_accent', 'Video 3 — tiêu đề (nhấn)', 'Texas');
    ethan_cz_field($wp, 'ethan_home_recent', 'home_vid3_body', 'Video 3 — mô tả', 'Vlog thực tế về một buổi closing — từng bước trong ngày hoàn tất giao dịch mua nhà tại Mỹ.', 'textarea');

    // --- FAQ & Newsletter ---
    $wp->add_section('ethan_home_faq', [
        'title' => 'FAQ & Newsletter',
        'panel' => 'ethan_panel_home',
    ]);
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq_kicker', 'FAQ — nhãn nhỏ', 'Giải đáp thắc mắc');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq_title', 'FAQ — tiêu đề (thường)', 'Câu hỏi');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq_title_accent', 'FAQ — tiêu đề (nhấn)', 'thường gặp');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq1_q', 'FAQ 1 — câu hỏi', 'Nhà tôi hiện tại giá bao nhiêu?');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq1_a', 'FAQ 1 — trả lời', 'Nhắn tôi địa chỉ là được. Tôi kéo dữ liệu những căn đã bán gần đó và cho bạn con số thực tế — không phải con số để bạn vui, mà để bạn quyết định được.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq2_q', 'FAQ 2 — câu hỏi', 'Tôi có cần sửa chữa nhà trước khi bán không?');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq2_a', 'FAQ 2 — trả lời', 'Không cần sửa hết. Tôi xem nhà và nói thẳng: cái này đáng làm, cái kia bỏ qua. Thường thì sơn lại và dọn sân vườn là đủ để ảnh đẹp hơn rõ rệt.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq3_q', 'FAQ 3 — câu hỏi', 'Bán nhà mất bao lâu?');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq3_a', 'FAQ 3 — trả lời', 'Ở DFW trung bình 20–45 ngày. Tôi đăng Zillow, quay video tour, gửi email cho danh sách khách đang tìm nhà — mấy căn gần đây nhận offer trong vòng 1 tuần.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq4_q', 'FAQ 4 — câu hỏi', 'Chi phí bán nhà gồm những gì?');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq4_a', 'FAQ 4 — trả lời', 'Chủ yếu là hoa hồng môi giới, thuế, và chi phí title/escrow. Tôi sẽ tính cho bạn một tờ net sheet — bạn biết chính xác mình nhận được bao nhiêu sau khi bán, trước khi ký bất cứ thứ gì.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq5_q', 'FAQ 5 — câu hỏi', 'Tôi có thể vừa bán nhà cũ vừa mua nhà mới không?');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_faq5_a', 'FAQ 5 — trả lời', 'Được, tôi hay làm cái này. Quan trọng là kéo giãn đúng timeline để bạn không phải trả tiền thuê nhà tạm trong khoảng giữa. Tôi sẽ điều phối cả hai phía.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_news_title', 'Newsletter — tiêu đề (thường)', 'Nhận tin');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_news_title_accent', 'Newsletter — tiêu đề (nhấn)', 'nhà mới');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_news_body', 'Newsletter — mô tả', 'Tôi gửi email khi thấy listing đáng xem hoặc giá khu vực bạn quan tâm thay đổi. Không spam.', 'textarea');
    ethan_cz_field($wp, 'ethan_home_faq', 'home_news_btn', 'Newsletter — nút', 'Đăng ký nhận tin');


    /* ============================================================
       PANEL: GIỚI THIỆU
       ============================================================ */
    $wp->add_panel('ethan_panel_about', [
        'title'    => 'Giới thiệu',
        'priority' => 21,
    ]);

    $wp->add_section('ethan_about_hero', [
        'title' => 'Hero & Số liệu',
        'panel' => 'ethan_panel_about',
    ]);
    ethan_cz_field($wp, 'ethan_about_hero', 'about_mini1_num', 'Hero số 1 — số', '40');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_mini1_label', 'Hero số 1 — nhãn', 'Giao dịch');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_mini2_num', 'Hero số 2 — số', '15K+');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_mini2_label', 'Hero số 2 — nhãn', 'Followers');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_mini3_num', 'Hero số 3 — số', '100%');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_mini3_label', 'Hero số 3 — nhãn', 'Hài lòng');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb1_num', 'Dải số 1 — số', '38');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb1_label', 'Dải số 1 — nhãn', 'Giao dịch hoàn tất');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb2_num', 'Dải số 2 — số', '5');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb2_label', 'Dải số 2 — nhãn', 'Đánh giá trung bình');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb3_num', 'Dải số 3 — số', '15K');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb3_label', 'Dải số 3 — nhãn', 'Người theo dõi');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb4_num', 'Dải số 4 — số', '100');
    ethan_cz_field($wp, 'ethan_about_hero', 'about_sb4_label', 'Dải số 4 — nhãn', 'Khách hàng hài lòng');

    $wp->add_section('ethan_about_story', [
        'title' => 'Câu chuyện & Nguyên tắc',
        'panel' => 'ethan_panel_about',
    ]);
    ethan_cz_field($wp, 'ethan_about_story', 'about_story_kicker', 'Câu chuyện — nhãn nhỏ', 'Câu chuyện');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story_title', 'Câu chuyện — tiêu đề (thường)', 'Kinh nghiệm của');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story_accent', 'Câu chuyện — tiêu đề (nhấn)', 'tôi');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story1_h', 'Bước 1 — tiêu đề', 'Trải nghiệm tìm nhà');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story1_p', 'Bước 1 — nội dung', 'Tôi từng tự mình tìm nhà ở Mỹ và không biết bắt đầu từ đâu. Cái cảm giác đó tôi vẫn nhớ rõ — đó là lý do tôi làm nghề này.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story2_h', 'Bước 2 — tiêu đề', 'Trở thành môi giới');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story2_p', 'Bước 2 — nội dung', 'Thi lấy bằng môi giới Texas, làm full-time. Không làm thêm, không làm tay trái — chỉ tập trung vào DFW.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story3_h', 'Bước 3 — tiêu đề', 'Công cụ và mạng lưới');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story3_p', 'Bước 3 — nội dung', 'Gia nhập Texas Ace Team thuộc eXp Realty — tôi có thể pull dữ liệu MLS ngay lập tức và kết nối với agent khác khi cần xử lý nhanh.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story4_h', 'Bước 4 — tiêu đề', 'Được khách hàng tin chọn');
    ethan_cz_field($wp, 'ethan_about_story', 'about_story4_p', 'Bước 4 — nội dung', '40+ giao dịch, chưa có khách hàng nào phàn nàn. Tôi không nói điều đó để khoe — tôi nói vì đó là mục tiêu tôi giữ mỗi lần nhận case mới.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ_kicker', 'Nguyên tắc — nhãn nhỏ', 'Cam kết');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ_title', 'Nguyên tắc — tiêu đề (thường)', 'Nguyên tắc');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ_accent', 'Nguyên tắc — tiêu đề (nhấn)', 'làm việc');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ1_h', 'Nguyên tắc 1 — tiêu đề', 'Nói thật');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ1_p', 'Nguyên tắc 1 — nội dung', 'Nếu nhà có vấn đề, tôi nói. Nếu giá bạn muốn bán cao hơn thị trường, tôi cũng nói. Tôi không hối thúc bạn mua nhà khi chưa chắc.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ2_h', 'Nguyên tắc 2 — tiêu đề', 'Phản hồi nhanh');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ2_p', 'Nguyên tắc 2 — nội dung', 'Tôi trả lời tin nhắn nhanh — không phải vì tôi lịch sự, mà vì trong đàm phán mua nhà, chậm vài tiếng là mất deal.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ3_h', 'Nguyên tắc 3 — tiêu đề', 'Có cơ sở');
    ethan_cz_field($wp, 'ethan_about_story', 'about_princ3_p', 'Nguyên tắc 3 — nội dung', 'Tôi không đoán. Mọi lời khuyên tôi đưa ra đều có dữ liệu thị trường đằng sau — bạn có thể hỏi số liệu bất cứ lúc nào.', 'textarea');

    $wp->add_section('ethan_about_team', [
        'title' => 'Video & Đội ngũ',
        'panel' => 'ethan_panel_about',
    ]);
    ethan_cz_field($wp, 'ethan_about_team', 'about_videos_title', 'Video — tiêu đề (thường)', 'Video');
    ethan_cz_field($wp, 'ethan_about_team', 'about_videos_accent', 'Video — tiêu đề (nhấn)', 'listing thực tế');
    ethan_cz_field($wp, 'ethan_about_team', 'about_videos_intro', 'Video — mô tả', 'Đây là video tôi quay để bán nhà cho khách — bạn có thể xem để biết nhà của mình sẽ được giới thiệu thế nào.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_team', 'about_team_kicker', 'Đội ngũ — nhãn nhỏ', 'Đội ngũ');
    ethan_cz_field($wp, 'ethan_about_team', 'about_team_title', 'Đội ngũ — tiêu đề (thường)', 'Texas Ace');
    ethan_cz_field($wp, 'ethan_about_team', 'about_team_accent', 'Đội ngũ — tiêu đề (nhấn)', 'Team');
    ethan_cz_field($wp, 'ethan_about_team', 'about_team_p1', 'Đội ngũ — đoạn 1', 'Tôi thuộc Texas Ace Team, một trong những team lớn tại DFW trong hệ thống eXp Realty.', 'textarea');
    ethan_cz_field($wp, 'ethan_about_team', 'about_team_p2', 'Đội ngũ — đoạn 2', 'Trong thực tế điều đó có nghĩa là: tôi có thể hỏi người khác trong team khi gặp tình huống đặc thù — pháp lý, nhà thầu, vay vốn — thay vì để bạn tự mò. Nếu tôi không biết, tôi biết ai biết.', 'textarea');


    /* ============================================================
       PANEL: MUA NHÀ
       ============================================================ */
    $wp->add_panel('ethan_panel_buy', [
        'title'    => 'Mua nhà',
        'priority' => 22,
    ]);

    $wp->add_section('ethan_buy_hero', [
        'title' => 'Hero & Giới thiệu',
        'panel' => 'ethan_panel_buy',
    ]);
    $wp->add_setting('ethan_headshot_small', [
        'default'           => get_template_directory_uri() . '/assets/images/ethan-headshot.jpg',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);
    $wp->add_control(new WP_Customize_Image_Control($wp, 'ethan_headshot_small', [
        'label'   => 'Ảnh đại diện nhỏ (trang mua / bán / chi tiết nhà)',
        'section' => 'ethan_buy_hero',
    ]));
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_hero_kicker', 'Hero — nhãn nhỏ', 'Người mua nhà');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_hero_title', 'Hero — tiêu đề (thường)', 'Tìm nhà');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_hero_accent', 'Hero — tiêu đề (nhấn)', 'tại DFW');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_hero_sub', 'Hero — mô tả', 'Tôi đi cùng bạn từ lúc chưa biết bắt đầu từ đâu đến ngày nhận chìa khóa. Làm việc bằng tiếng Việt, không để bạn ký thứ gì mà chưa hiểu.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_about_kicker', 'Giới thiệu — nhãn nhỏ', 'Hỗ trợ chi tiết');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_about_title', 'Giới thiệu — tiêu đề (thường)', 'Tôi xử lý');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_about_accent', 'Giới thiệu — tiêu đề (nhấn)', 'toàn bộ giấy tờ');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_about_body', 'Giới thiệu — nội dung', 'Bạn chọn nhà, tôi lo phần còn lại — hợp đồng, đàm phán, hồ sơ. Tôi đọc từng điều khoản và giải thích bằng tiếng Việt trước khi bạn ký bất cứ thứ gì.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_hero', 'buy_quote', 'Câu trích dẫn', 'Tìm đúng căn nhà mất thời gian, nhưng khi tìm được thì xứng đáng.', 'textarea');

    $wp->add_section('ethan_buy_steps', [
        'title' => 'Các bước tìm mua nhà',
        'panel' => 'ethan_panel_buy',
    ]);
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_steps_title', 'Tiêu đề (thường)', 'Các bước');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_steps_accent', 'Tiêu đề (nhấn)', 'tìm mua nhà');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step1_h', 'Bước 1 — tiêu đề', '1. Chốt khu vực');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step1_p', 'Bước 1 — nội dung', 'Xác định khoảng giá, thời gian di chuyển, trường học, nhu cầu nhà mới xây và mục tiêu đầu tư trước khi đi xem nhà.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step2_h', 'Bước 2 — tiêu đề', '2. Chuẩn bị tài chính');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step2_p', 'Bước 2 — nội dung', 'Kết nối ngân sách với lựa chọn lender, tiền cần chuẩn bị để closing, ưu đãi builder và sức mạnh offer.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step3_h', 'Bước 3 — tiêu đề', '3. Khảo sát thực tế');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step3_p', 'Bước 3 — nội dung', 'So sánh các khu vực McKinney, Lavon, Garland, Wylie, Frisco, Dallas và những đô thị mới nổi tại DFW.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step4_h', 'Bước 4 — tiêu đề', '4. So sánh nhà');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step4_p', 'Bước 4 — nội dung', 'Xem nhà với góc nhìn thực tế về layout, tình trạng, giá trị bán lại, ưu đãi và giá trị nâng cấp.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step5_h', 'Bước 5 — tiêu đề', '5. Trả giá (Offer)');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step5_p', 'Bước 5 — nội dung', 'Xây dựng điều khoản, thời gian và contingency với hướng dẫn rõ ràng bằng tiếng Việt hoặc tiếng Anh.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step6_h', 'Bước 6 — tiêu đề', '6. Nhận chìa khóa');
    ethan_cz_field($wp, 'ethan_buy_steps', 'buy_step6_p', 'Bước 6 — nội dung', 'Theo dõi inspection, appraisal, hạn lender, final walk-through và các chi tiết trong ngày closing.', 'textarea');

    $wp->add_section('ethan_buy_reviews', [
        'title' => 'Đánh giá & FAQ',
        'panel' => 'ethan_panel_buy',
    ]);
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst_kicker', 'Đánh giá — nhãn nhỏ', 'Khách hàng');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst_title', 'Đánh giá — tiêu đề (thường)', 'Từ');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst_accent', 'Đánh giá — tiêu đề (nhấn)', 'khách mua nhà');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst1_p', 'Đánh giá 1 — nội dung', 'Ethan giúp quy trình mua nhà mới xây trở nên dễ hiểu và giúp chúng tôi so sánh ưu đãi rõ ràng.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst1_name', 'Đánh giá 1 — tên', 'Anh Minh & chị Linh');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst1_meta', 'Đánh giá 1 — chú thích', 'Mua nhà mới tại Lavon, 2024');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst2_p', 'Đánh giá 2 — nội dung', 'Ethan giải thích từng bước bằng tiếng Việt và tiếng Anh nên gia đình tôi rất yên tâm.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst2_name', 'Đánh giá 2 — tên', 'Gia đình Nguyễn');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst2_meta', 'Đánh giá 2 — chú thích', 'Mua nhà tại McKinney, 2025');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst3_p', 'Đánh giá 3 — nội dung', 'Các video khu vực của Ethan giúp chúng tôi biết nên bắt đầu xem nhà ở đâu.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst3_name', 'Đánh giá 3 — tên', 'Anh Tuấn & chị Hạnh');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_tst3_meta', 'Đánh giá 3 — chú thích', 'Chuyển đến DFW từ California, 2025');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_recent_kicker', 'Giao dịch — nhãn nhỏ', 'Thành tích gần đây');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_recent_title', 'Giao dịch — tiêu đề (thường)', 'Giao dịch');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_recent_accent', 'Giao dịch — tiêu đề (nhấn)', 'hoàn tất');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq_kicker', 'FAQ — nhãn nhỏ', 'Hỏi đáp');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq_title', 'FAQ — tiêu đề (thường)', 'Câu hỏi');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq_accent', 'FAQ — tiêu đề (nhấn)', 'về mua nhà');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq1_q', 'FAQ 1 — câu hỏi', 'Cầm bao nhiêu tiền thì mua được nhà?');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq1_a', 'FAQ 1 — trả lời', 'Bạn cần tiền đặt cọc (down payment) khoảng 3% đến 20% cộng thêm tiền giấy tờ (closing cost) khoảng 2-3% giá trị nhà. Với căn nhà $350K, bạn nên chuẩn bị ít nhất $18,000. Tôi sẽ nhờ chuyên viên ngân hàng tính cụ thể cho hồ sơ của bạn.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq2_q', 'FAQ 2 — câu hỏi', 'Quy trình mua nhà mất bao lâu?');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq2_a', 'FAQ 2 — trả lời', 'Từ lúc bắt đầu tìm kiếm đến ngày closing thường mất khoảng 30–60 ngày, tùy nhà và thị trường. Tôi sẽ giúp bạn lên kế hoạch cụ thể từ buổi đầu tiên.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq3_q', 'FAQ 3 — câu hỏi', 'Pre-approval là gì và tại sao cần thiết?');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq3_a', 'FAQ 3 — trả lời', 'Pre-approval là thư xác nhận từ ngân hàng cho biết bạn đủ điều kiện vay bao nhiêu — bước này cần có trước khi đặt offer, vì hầu hết seller yêu cầu. Tôi sẽ giới thiệu bạn với loan officer uy tín, có hỗ trợ tiếng Việt.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq4_q', 'FAQ 4 — câu hỏi', 'Mua nhà mới xây khác gì so với nhà chuyển nhượng?');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq4_a', 'FAQ 4 — trả lời', 'Nhà mới xây thường có bảo hành từ builder, ưu đãi tài chính (mua lãi suất, hỗ trợ closing cost), và bạn có thể tùy chỉnh thiết kế. Nhà chuyển nhượng thường có vị trí tốt hơn, sân vườn trưởng thành và giá linh hoạt hơn. Tôi sẽ phân tích theo nhu cầu thực tế của bạn — không phải loại nào cũng phù hợp với ai.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq5_q', 'FAQ 5 — câu hỏi', 'Tôi không thạo tiếng Anh có mua nhà được không?');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_faq5_a', 'FAQ 5 — trả lời', 'Hoàn toàn được. Tôi sẽ dịch hợp đồng sang tiếng Việt, nói chuyện trực tiếp với seller và luật sư, bạn chỉ việc đọc hiểu và ký khi đã thực sự an tâm.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_cta_title', 'CTA — tiêu đề (thường)', 'Bắt đầu');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_cta_accent', 'CTA — tiêu đề (nhấn)', 'tìm nhà');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_cta_body', 'CTA — mô tả', 'Nhắn tôi để nói chuyện về ngân sách — tôi sẽ kết nối bạn với loan officer phù hợp, miễn phí.', 'textarea');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_cta_btn1', 'CTA — nút 1', 'Đặt lịch tư vấn miễn phí');
    ethan_cz_field($wp, 'ethan_buy_reviews', 'buy_cta_btn2', 'CTA — nút 2 (gọi)', 'Gọi ngay (469) 989-5786');


    /* ============================================================
       PANEL: BÁN NHÀ
       ============================================================ */
    $wp->add_panel('ethan_panel_sell', [
        'title'    => 'Bán nhà',
        'priority' => 23,
    ]);

    $wp->add_section('ethan_sell_hero', [
        'title' => 'Hero',
        'panel' => 'ethan_panel_sell',
    ]);
    ethan_cz_field($wp, 'ethan_sell_hero', 'sell_hero_kicker', 'Nhãn nhỏ', 'Giới thiệu');
    ethan_cz_field($wp, 'ethan_sell_hero', 'sell_hero_title', 'Tiêu đề (thường)', 'Ethan Dao —');
    ethan_cz_field($wp, 'ethan_sell_hero', 'sell_hero_accent', 'Tiêu đề (nhấn)', 'Realtor DFW');
    ethan_cz_field($wp, 'ethan_sell_hero', 'sell_hero_body', 'Đoạn 1', 'Tôi tên Ethan — Tùng Đào. Tôi là Realtor tại Dallas-Fort Worth, làm việc hoàn toàn bằng tiếng Việt để giúp gia đình người Việt bán nhà đúng giá, đúng thời điểm.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_hero', 'sell_hero_body2', 'Đoạn 2', 'Hoạt động chủ yếu ở Lavon, McKinney, Garland — thuộc eXp Realty và Texas Ace Team.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_hero', 'sell_hero_btn1', 'Nút 1', 'Liên hệ Ethan');
    ethan_cz_field($wp, 'ethan_sell_hero', 'sell_hero_btn2', 'Nút 2', 'Xem giao dịch đã bán');

    $wp->add_section('ethan_sell_steps', [
        'title' => 'Lộ trình bán nhà (10 bước)',
        'panel' => 'ethan_panel_sell',
    ]);
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_steps_title', 'Tiêu đề (thường)', 'Lộ trình');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_steps_accent', 'Tiêu đề (nhấn)', 'người bán');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step1_h', 'Bước 1 — tiêu đề', '1. Định giá nhà');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step1_p', 'Bước 1 — nội dung', 'Tôi phân tích giá thị trường dựa trên các căn đã bán gần đó và tình trạng nhà của bạn để đặt giá đúng — không quá cao gây ế, không quá thấp bỏ tiền.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step2_h', 'Bước 2 — tiêu đề', '2. Chuẩn bị nhà bán');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step2_p', 'Bước 2 — nội dung', 'Dọn dẹp, sửa nhỏ, hoặc dàn dựng nội thất để nhà trông đẹp trên ảnh và thực tế. Tôi tư vấn cụ thể cái gì đáng làm, cái gì không.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step3_h', 'Bước 3 — tiêu đề', '3. Chụp ảnh & quay video');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step3_p', 'Bước 3 — nội dung', 'Tôi quay video tour chuyên nghiệp và đưa lên YouTube để tiếp cận thêm người mua ngoài danh sách MLS.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step4_h', 'Bước 4 — tiêu đề', '4. Đăng listing');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step4_p', 'Bước 4 — nội dung', 'Nhà được đăng trên Zillow, Realtor.com, MLS và mạng xã hội. Tôi gửi thông báo đến danh sách người mua đang tìm kiếm.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step5_h', 'Bước 5 — tiêu đề', '5. Tiếp nhận offer');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step5_p', 'Bước 5 — nội dung', 'Tôi giải thích từng offer bằng tiếng Việt — không chỉ giá mà còn điều khoản, contingency, thời gian closing và mức độ đáng tin của người mua.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step6_h', 'Bước 6 — tiêu đề', '6. Đàm phán');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step6_p', 'Bước 6 — nội dung', 'Tôi đại diện quyền lợi của bạn trong suốt quá trình đàm phán — từ counter offer đến điều khoản sửa chữa sau inspection.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step7_h', 'Bước 7 — tiêu đề', '7. Ký hợp đồng');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step7_p', 'Bước 7 — nội dung', 'Sau khi chốt offer, tôi hướng dẫn từng bước ký hợp đồng bằng tiếng Việt, không để bạn ký bất cứ thứ gì mà chưa hiểu rõ.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step8_h', 'Bước 8 — tiêu đề', '8. Inspection & Appraisal');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step8_p', 'Bước 8 — nội dung', 'Tôi theo dõi và phối hợp với buyer trong quá trình home inspection và appraisal, đảm bảo quyền lợi của bạn được bảo vệ.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step9_h', 'Bước 9 — tiêu đề', '9. Xử lý giấy tờ closing');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step9_p', 'Bước 9 — nội dung', 'Tôi phối hợp với title company, lender của buyer và luật sư để đảm bảo hồ sơ đầy đủ và đúng hạn.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step10_h', 'Bước 10 — tiêu đề', '10. Nhận tiền & bàn giao nhà');
    ethan_cz_field($wp, 'ethan_sell_steps', 'sell_step10_p', 'Bước 10 — nội dung', 'Ngày closing bạn ký bàn giao, nhận tiền net proceeds vào tài khoản. Tôi ở đó để hỗ trợ nếu có vấn đề phút chót.', 'textarea');

    $wp->add_section('ethan_sell_commit', [
        'title' => 'Cam kết & Đánh giá',
        'panel' => 'ethan_panel_sell',
    ]);
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit_kicker', 'Cam kết — nhãn nhỏ', 'Chiến lược');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit_title', 'Cam kết — tiêu đề (thường)', 'Cam kết của');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit_accent', 'Cam kết — tiêu đề (nhấn)', 'tôi');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit1_h', 'Cam kết 1 — tiêu đề', 'Minh bạch giá thực');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit1_p', 'Cam kết 1 — nội dung', 'Tôi không nói con số để bạn vui. Tôi đưa ra CMA thực tế dựa trên giao dịch gần nhất, giúp bạn định giá đúng ngay từ đầu.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit2_h', 'Cam kết 2 — tiêu đề', 'Marketing video-first');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit2_p', 'Cam kết 2 — nội dung', 'Video listing được đăng lên YouTube và mạng xã hội để tiếp cận người mua xa hơn chỉ MLS — đây là lợi thế tôi mang lại cho người bán.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit3_h', 'Cam kết 3 — tiêu đề', 'Luôn sẵn sàng tiếng Việt');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_commit3_p', 'Cam kết 3 — nội dung', 'Bạn không cần dịch hợp đồng hay nhờ con cái giải thích. Tôi xử lý toàn bộ giao tiếp với buyer và title company, bạn chỉ cần hiểu và ký.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst_kicker', 'Đánh giá — nhãn nhỏ', 'Khách hàng nói gì');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst_title', 'Đánh giá — tiêu đề (thường)', 'Cảm nhận từ');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst_accent', 'Đánh giá — tiêu đề (nhấn)', 'người bán nhà');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst1_p', 'Đánh giá 1 — nội dung', 'Chiến lược bán nhà rất rõ ràng, có tổ chức và tập trung đúng nhóm người mua. Nhà bán nhanh hơn dự kiến.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst1_name', 'Đánh giá 1 — tên', 'Chị Trang Phạm');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst1_meta', 'Đánh giá 1 — chú thích', 'Bán nhà tại Garland, 2024');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst2_p', 'Đánh giá 2 — nội dung', 'Video tour của Ethan thu hút rất nhiều lượt xem. Chúng tôi nhận được 3 offer chỉ sau 5 ngày listing.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst2_name', 'Đánh giá 2 — tên', 'Anh Hùng & chị Mai');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst2_meta', 'Đánh giá 2 — chú thích', 'Bán nhà tại McKinney, 2025');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst3_p', 'Đánh giá 3 — nội dung', 'Phản hồi nhanh, trung thực và bình tĩnh khi đàm phán. Chúng tôi luôn biết bước tiếp theo là gì.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst3_name', 'Đánh giá 3 — tên', 'Gia đình Lê');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_tst3_meta', 'Đánh giá 3 — chú thích', 'Bán nhà tại Wylie, 2025');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_recent_kicker', 'Giao dịch — nhãn nhỏ', 'Thành tích gần đây');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_recent_title', 'Giao dịch — tiêu đề (thường)', 'Giao dịch');
    ethan_cz_field($wp, 'ethan_sell_commit', 'sell_recent_accent', 'Giao dịch — tiêu đề (nhấn)', 'hoàn tất');

    $wp->add_section('ethan_sell_video', [
        'title' => 'Video & FAQ',
        'panel' => 'ethan_panel_sell',
    ]);
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_video_kicker', 'Video — nhãn nhỏ', 'Xem thực tế');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_video_title', 'Video — tiêu đề (thường)', 'Video');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_video_accent', 'Video — tiêu đề (nhấn)', 'listing thực tế');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_video_body', 'Video — mô tả', 'Đây là video tôi quay để bán nhà cho khách — bạn có thể xem để biết nhà của mình sẽ được giới thiệu thế nào.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_vid1_h', 'Video 1 — tiêu đề', 'LAVON TEXAS - Lakepointe review 4 mẫu nhà new build');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_vid1_p', 'Video 1 — mô tả', '4 mẫu nhà mới ở Lavon, $300K–$400K. Tôi xem và nói thật cái nào đáng tiền, cái nào không.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_vid2_h', 'Video 2 — tiêu đề', 'Lavon 75166 | khu nhà mới cách Garland khu người Việt');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_vid2_p', 'Video 2 — mô tả', 'Cách Garland khoảng 30 phút, giá từ $300K với nhiều ưu đãi từ builder. Nhà mới trong khu Lavon 75166.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_vid3_h', 'Video 3 — tiêu đề', 'Wylie 75098 | căn nhà đời 2017 tại Inspiration Community');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_vid3_p', 'Video 3 — mô tả', 'Nhà 2017, hai mặt tiền trong khu Inspiration Community. Wylie 75098, trường tốt và cộng đồng yên tĩnh.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq_kicker', 'FAQ — nhãn nhỏ', 'Giải đáp thắc mắc');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq_title', 'FAQ — tiêu đề (thường)', 'Câu hỏi');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq_accent', 'FAQ — tiêu đề (nhấn)', 'thường gặp');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq1_q', 'FAQ 1 — câu hỏi', 'Nhà tôi hiện tại giá bao nhiêu?');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq1_a', 'FAQ 1 — trả lời', 'Nhắn tôi địa chỉ là được. Tôi kéo dữ liệu những căn đã bán gần đó và cho bạn con số thực tế — không phải con số để bạn vui, mà để bạn quyết định được.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq2_q', 'FAQ 2 — câu hỏi', 'Tôi có cần sửa chữa nhà trước khi bán không?');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq2_a', 'FAQ 2 — trả lời', 'Không cần sửa hết. Tôi xem nhà và nói thẳng: cái này đáng làm, cái kia bỏ qua. Thường thì sơn lại và dọn sân vườn là đủ để ảnh đẹp hơn rõ rệt.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq3_q', 'FAQ 3 — câu hỏi', 'Bán nhà mất bao lâu?');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq3_a', 'FAQ 3 — trả lời', 'Ở DFW trung bình 20–45 ngày. Tôi đăng Zillow, quay video tour, gửi email cho danh sách khách đang tìm nhà — mấy căn gần đây nhận offer trong vòng 1 tuần.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq4_q', 'FAQ 4 — câu hỏi', 'Chi phí bán nhà gồm những gì?');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq4_a', 'FAQ 4 — trả lời', 'Chủ yếu là hoa hồng môi giới, thuế, và chi phí title/escrow. Tôi sẽ tính cho bạn một tờ net sheet — bạn biết chính xác mình nhận được bao nhiêu sau khi bán, trước khi ký bất cứ thứ gì.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq5_q', 'FAQ 5 — câu hỏi', 'Tôi có thể vừa bán nhà cũ vừa mua nhà mới không?');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_faq5_a', 'FAQ 5 — trả lời', 'Được, tôi hay làm cái này. Quan trọng là kéo giãn đúng timeline để bạn không phải trả tiền thuê nhà tạm trong khoảng giữa. Tôi sẽ điều phối cả hai phía.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_cta_title', 'CTA — tiêu đề (thường)', 'Bạn đã sẵn sàng');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_cta_accent', 'CTA — tiêu đề (nhấn)', 'để bán nhà?');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_cta_body', 'CTA — mô tả', 'Nhắn tin địa chỉ nhà, tôi sẽ gửi ngay báo cáo giá thị trường.', 'textarea');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_cta_btn1', 'CTA — nút 1', 'Đặt lịch tư vấn miễn phí');
    ethan_cz_field($wp, 'ethan_sell_video', 'sell_cta_btn2', 'CTA — nút 2 (gọi)', 'Gọi ngay (469) 989-5786');


    /* ============================================================
       PANEL: BẤT ĐỘNG SẢN & LIÊN HỆ
       ============================================================ */
    $wp->add_panel('ethan_panel_other', [
        'title'    => 'Bất động sản & Liên hệ',
        'priority' => 24,
    ]);

    $wp->add_section('ethan_properties', [
        'title' => 'Bất động sản',
        'panel' => 'ethan_panel_other',
    ]);
    ethan_cz_field($wp, 'ethan_properties', 'props_newsletter_title', 'Newsletter — tiêu đề (thường)', 'Nhận tin');
    ethan_cz_field($wp, 'ethan_properties', 'props_newsletter_accent', 'Newsletter — tiêu đề (nhấn)', 'nhà mới');
    ethan_cz_field($wp, 'ethan_properties', 'props_newsletter_body', 'Newsletter — mô tả', 'Tôi gửi email khi thấy listing đáng xem hoặc giá khu vực bạn quan tâm thay đổi. Không spam.', 'textarea');
    ethan_cz_field($wp, 'ethan_properties', 'props_newsletter_btn', 'Newsletter — nút', 'Đăng ký nhận tin');
    ethan_cz_field($wp, 'ethan_properties', 'props_newsletter_success', 'Newsletter — thông báo thành công', 'Đã nhận. Tôi sẽ liên lạc sớm.');
    ethan_cz_field($wp, 'ethan_properties', 'props_cta_book', 'Chi tiết nhà — nút đặt lịch', 'Đặt lịch xem nhà');

    $wp->add_section('ethan_contact', [
        'title' => 'Liên hệ',
        'panel' => 'ethan_panel_other',
    ]);
    ethan_cz_field($wp, 'ethan_contact', 'contact_kicker', 'Nhãn nhỏ', 'Thông tin');
    ethan_cz_field($wp, 'ethan_contact', 'contact_title', 'Tiêu đề', 'Để lại lời nhắn');
    ethan_cz_field($wp, 'ethan_contact', 'contact_sub', 'Mô tả', 'Để lại tin nhắn — tôi thường trả lời trong vài tiếng.', 'textarea');
    ethan_cz_field($wp, 'ethan_contact', 'contact_phone_label', 'Nhãn số điện thoại', 'Gọi hoặc nhắn tin');
    ethan_cz_field($wp, 'ethan_contact', 'contact_email_label', 'Nhãn email', 'Email');
    ethan_cz_field($wp, 'ethan_contact', 'contact_btn', 'Nút gửi form', 'Gửi thông tin');
    ethan_cz_field($wp, 'ethan_contact', 'contact_success', 'Thông báo gửi thành công', 'Đã nhận. Tôi sẽ liên lạc sớm.');
}
add_action('customize_register', 'ethan_customize_register');
