<?php if (!defined('SOURCES')) die("Error"); ?>

<!-- SECTION 2 — GIỚI THIỆU CÔNG TY + 2 ỨNG DỤNG -->
<section class="tk-sec tk-intro">
    <div class="fixwidth">
        <img src="<?= !empty($gioithieu['photo']) ? UPLOAD_PHOTO_L . $gioithieu['photo'] : 'assets/images/titkul/cropped-Titkul-logo-header.png' ?>"
            alt="Titkul" onerror="this.src='assets/images/titkul/cropped-Titkul-logo-header.png';"
            style="display: block; margin: 0 auto;" />
        <p class="tk-intro-lead">
            Công ty sản xuất phần mềm ứng dụng Quản lý trường học, theo định hướng chuyển đổi số,
            có kết nối trục dữ liệu dùng chung của Ngành. Phần mềm của Titkul đã được Sở GD &amp; ĐT Tp.HCM
            chấp thuận và đã triển khai tại nhiều cấp trường
        </p>
        <div class="tk-intro-grid">
            <div class="tk-intro-left">
                <h2 class="tk-intro-h2 mb-3">PHẦN MỀM ỨNG DỤNG</h2>
                <h2 class="tk-intro-h2 tk-accent">CHUYỂN ĐỔI SỐ TRƯỜNG HỌC</h2>
                <p class="tk-intro-desc">
                    Phần mềm ứng dụng của Titkul là nền tảng số hoá, giúp nhà trường dễ dàng quản lý điều hành
                    công tác chuyên môn, kết nối và tương tác giữa Gia đình và nhà trường và Cơ quan quản lý ngành
                    (Sở/Phòng giáo dục).
                </p>
                <div class="tk-intro-btns">
                    <a class="tk-btn tk-btn-main" href="HDSchool">HDSchool</a>
                    <a class="tk-btn tk-btn-outline" href="H2School">H2School</a>
                </div>
            </div>
            <div class="tk-intro-right">
                <img src="<?= !empty($gioithieu['photo']) ? UPLOAD_PHOTO_L . $gioithieu['photo'] : 'assets/images/titkul/nen-tang.png' ?>"
                    alt="Titkul đa nền tảng" onerror="this.src='assets/images/titkul/nen-tang.png';" />
            </div>
        </div>
    </div>
</section>

<!-- SECTION 3 — LỢI ÍCH + 3 SỐ LIỆU -->
<section class="tk-sec tk-benefit">
    <div class="fixwidth">
        <h2 class="tk-sec-title">TITKUL MANG LẠI LỢI ÍCH GÌ CHO NHÀ TRƯỜNG?</h2>
        <p class="tk-sec-desc">
            Phần mềm Quản Lý Trường Học của Titkul, cùng với hệ sinh thái ứng dụng tương tác học đường,
            giúp tăng cường hiệu quả quản lý trường học theo đúng định hướng chuyển đổi số của Ngành Giáo dục
        </p>
        <div class="tk-stats">
            <div class="tk-stat">
                <div class="tk-stat-ico"><i class="fas fa-network-wired"></i></div>
                <div class="tk-stat-text">Phù hợp chuyển đổi số của Ngành Giáo Dục</div>
            </div>
            <div class="tk-stat">
                <div class="tk-stat-num">75%</div>
                <div class="tk-stat-text">Tiết kiệm thời gian trong công tác quản lý</div>
            </div>
            <div class="tk-stat">
                <div class="tk-stat-num">85%</div>
                <div class="tk-stat-text">Tăng hiệu quả quản lý trường học</div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 4 — TẠI SAO CHỌN TITKUL -->
<section class="tk-sec tk-why">
    <div class="fixwidth">
        <h2 class="tk-sec-title tk-light">TẠI SAO CHỌN TITKUL?</h2>
        <p class="tk-sec-desc tk-light">
            Titkul có đủ chức năng chuyên môn cung cấp phần mềm quản lý trường học; được Sở GD-ĐT, Sở KH-CN
            công nhận, được kết nối dữ liệu dùng chung của Ngành. Đáp ứng đầy đủ các chức năng quản lý toàn diện
            của Nhà trường phù hợp theo định hướng chuyển đổi số của Ngành giáo dục.
        </p>
        <a class="tk-btn tk-btn-cta" href="van-ban-phap-ly">Xem Văn Bản Pháp Lý &raquo;</a>
    </div>
</section>

<!-- SECTION 5 — TẦM NHÌN / SỨ MỆNH / GIÁ TRỊ CỐT LÕI -->
<section class="tk-sec tk-vmv">
    <div class="fixwidth">
        <div class="tk-vmv-row">
            <div class="tk-vmv-text">
                <span class="tk-vmv-label">TẦM NHÌN</span>
                <h3 class="tk-vmv-h3">CUNG CẤP PHẦN MỀM GIÁ TRỊ THỰC TIỄN CAO</h3>
                <p>Titkul cung cấp sản phẩm phần mềm quản lý chuyển đổi số mang tính thực tiễn cao,
                    mang đến giá trị cao nhất cho khách hàng trường học, doanh nghiệp</p>
            </div>
            <div class="tk-vmv-img">
                <img src="assets/images/titkul/tamnhin.jpg" alt="Tầm nhìn" onerror="this.style.opacity=0;" />
            </div>
        </div>
        <div class="tk-vmv-row tk-reverse">
            <div class="tk-vmv-text">
                <span class="tk-vmv-label">SỨ MỆNH</span>
                <h3 class="tk-vmv-h3">PHỤC VỤ CHUYỂN ĐỔI SỐ NGÀNH GIÁO DỤC</h3>
                <p>Không ngừng đổi mới, sáng tạo, nhằm cung cấp sản phẩm phần mềm quản lý tốt nhất cho khách hàng,
                    phục vụ chuyển đổi số thành công.</p>
            </div>
            <div class="tk-vmv-img">
                <img src="assets/images/titkul/sumenh.jpg" alt="Sứ mệnh" onerror="this.style.opacity=0;" />
            </div>
        </div>
        <div class="tk-vmv-row">
            <div class="tk-vmv-text">
                <span class="tk-vmv-label">GIÁ TRỊ CỐT LÕI</span>
                <h3 class="tk-vmv-h3">NĂNG ĐỘNG, CHUYÊN NGHIỆP, THỰC TIỄN CAO</h3>
                <p>Năng động – Sáng Tạo – Đổi Mới – Thực tiễn cao</p>
            </div>
            <div class="tk-vmv-img">
                <img src="assets/images/titkul/giatricotloi.jpg" alt="Giá trị cốt lõi" onerror="this.style.opacity=0;" />
            </div>
        </div>
    </div>
</section>

<!-- SECTION 6 — PHẦN MỀM TITKUL DÀNH CHO AI (4 đối tượng) -->
<?php
$tk_fallback = array(
    array(
        'tenvi' => 'ĐỐI VỚI BAN GIÁM HIỆU',
        'tenkhongdauvi' => 'hdsd-danh-cho-ban-giam-hieu',
        'photo' => '',
        'ico' => 'assets/images/titkul/bgh.png',
        'motavi' => 'Quản lý tình hình hoạt động của Trường theo thời gian thực, nắm bắt dữ liệu, tương tác và báo cáo một cách nhanh chóng. Dễ dàng đánh giá và đưa ra các quyết định quản lý nhà Trường, tiết kiệm thời gian, công sức'
    ),
    array(
        'tenvi' => 'ĐỐI VỚI GIÁO VIÊN',
        'tenkhongdauvi' => 'hdsd-danh-cho-giao-vien',
        'photo' => '',
        'ico' => 'assets/images/titkul/gv.png',
        'motavi' => 'Hỗ trợ công tác giảng dạy, nghiệp vụ chuyên môn. Tương tác với Phụ huynh nhanh chóng. Giúp Giáo viên hiện đại hoá công tác giảng dạy, đồng thời hỗ trợ trong công tác kiểm tra và đánh giá năng lực một cách dễ dàng.'
    ),
    array(
        'tenvi' => 'ĐỐI VỚI PHỤ HUYNH HỌC SINH',
        'tenkhongdauvi' => 'hdsd-danh-cho-phhs',
        'photo' => '',
        'ico' => 'assets/images/titkul/phhs.png',
        'motavi' => 'Hỗ trợ nắm bắt lịch học, kết quả học tập của con (điểm số, điểm danh, …) nhanh chóng theo thời gian thực và tình hình sức khỏe học đường. Phụ huynh dễ dàng tương tác trực tiếp với nhà trường, giáo viên mọi lúc'
    ),
    array(
        'tenvi' => 'ĐỐI VỚI HỌC SINH',
        'tenkhongdauvi' => 'hdsd-danh-cho-hoc-sinh',
        'photo' => '',
        'ico' => 'assets/images/titkul/hs.png',
        'motavi' => 'Nắm bắt kết quả học tập và rèn luyện các kỹ năng công nghệ: Kỹ năng khoa học, công nghệ, kỹ thuật. Tương tác, thông tin với giáo viên, phụ huynh về tình hình học tập, sức khoẻ học đường'
    ),
);
$tk_doituong = (isset($huongdan) && count($huongdan) > 0) ? $huongdan : $tk_fallback;
?>
<section class="tk-sec tk-forwho">
    <div class="fixwidth">
        <h2 class="tk-sec-title">PHẦN MỀM TITKUL DÀNH CHO AI?</h2>
        <p class="tk-sec-desc">
            Phần mềm Quản Lý Trường Học của Titkul dành cho Nhà trường và gia đình với nhiều tính năng số hoá
            hữu ích cho công tác quản lý, tương tác và báo cáo
        </p>
        <div class="tk-forwho-grid">
            <?php foreach ($tk_doituong as $v) { ?>
                <div class="tk-forwho-card">
                    <div class="tk-forwho-ico">
                        <img src="<?= !empty($v['photo']) ? UPLOAD_NEWS_L . $v['photo'] : (isset($v['ico']) ? $v['ico'] : '') ?>"
                            alt="<?= $v['ten' . $lang] ?>" onerror="this.style.display='none';" />
                    </div>
                    <h3 class="tk-forwho-name"><?= $v['ten' . $lang] ?></h3>
                    <p class="tk-forwho-desc"><?= $v['mota' . $lang] ?></p>
                    <a class="tk-forwho-link" href="<?= $v['tenkhongdauvi'] ?>">&raquo; XEM HƯỚNG DẪN SỬ DỤNG</a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- 
    SECTION 7 — ĐĂNG KÝ TƯ VẤN  (#dangkytuvan)
    Field name khớp handler newsletter (allpage.php):
    name-newsletter / phone-newsletter / truong-newsletter(chude) / diachi-newsletter
-->
<?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
<!-- <section class="tk-sec tk-register" id="dangkytuvan">
    <div class="fixwidth tk-register-grid">
        <div class="tk-register-left">
            <h2 class="tk-register-title">Đăng Ký Tư Vấn Ngay</h2>
            <p class="tk-register-desc">
                Quý Thầy/Cô/Khách hàng vui lòng cung cấp thông tin, để được tư vấn miễn phí phần mềm
                quản lý trường học, chuyển đổi số nhà trường
            </p>
            <form class="form-contact frm_index validation-contact tk-register-form" novalidate method="post" action="" enctype="multipart/form-data">
                <div class="tk-field">
                    <input type="text" class="form-control" autocomplete="name" id="ten" name="name-newsletter" placeholder="Họ &amp; tên *" required />
                    <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                </div>
                <div class="tk-field">
                    <input type="number" class="form-control" autocomplete="tel" id="dienthoai" name="phone-newsletter" placeholder="Số điện thoại *" required />
                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                </div>
                <div class="tk-field">
                    <input type="text" class="form-control" id="chude" name="truong-newsletter" placeholder="Tên trường đang công tác *" required />
                    <div class="invalid-feedback">Vui lòng nhập tên trường</div>
                </div>
                <div class="tk-field">
                    <input type="text" class="form-control" id="diachi" name="diachi-newsletter" placeholder="Địa chỉ" />
                </div>
                <div class="tk-field tk-field-submit">
                    <input type="submit" class="tk-btn tk-btn-cta" name="submit-newsletter" value="Gửi tin" disabled />
                </div>
                <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
            </form>
        </div>
        <div class="tk-register-right">
            <img src="assets/images/titkul/dangky-side.webp" alt="Đăng ký tư vấn Titkul" onerror="this.style.display='none';" />
        </div>
    </div>
</section> -->

<!-- SECTION 8 — CÁC TRƯỜNG TIÊU BIỂU -->
<?php if (isset($doitac) && count($doitac) > 0) { ?>
    <section class="tk-sec tk-partners">
        <div class="fixwidth">
            <h2 class="tk-sec-title">CÁC TRƯỜNG TIÊU BIỂU</h2>
            <div id="doitac_slider" class="owl-carousel owl-theme tk-partner-slider">
                <?php foreach ($doitac as $v) { ?>
                    <div class="tk-partner-item">
                        <?php if (!empty($v['link'])) { ?><a href="<?= $v['link'] ?>" target="_blank" rel="nofollow" title="<?= $v['ten' . $lang] ?>"><?php } ?>
                            <img onerror="this.src='assets/images/noimage.png';"
                                src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                            <?php if (!empty($v['link'])) { ?></a><?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- SECTION 9 — VIDEO GIỚI THIỆU & HƯỚNG DẪN SỬ DỤNG -->
<?php if (isset($video) && count($video) > 0) { ?>
    <section class="tk-sec tk-videos">
        <div class="fixwidth">
            <h2 class="tk-sec-title">VIDEO GIỚI THIỆU &amp; HƯỚNG DẪN SỬ DỤNG</h2>
            <div class="tk-video-grid">
                <?php foreach ($video as $k => $v) {
                    if ($k >= 4) break; ?>
                    <div class="tk-video-item">
                        <a data-fancybox="video" class="tk-video-thumb" href="<?= $v['video'] ?>" title="<?= $v['ten' . $lang] ?>">
                            <img src="https://img.youtube.com/vi/<?= $func->getYoutube($v['video']) ?>/hqdefault.jpg" alt="<?= $v['ten' . $lang] ?>" />
                            <span class="tk-video-play"><i class="fas fa-play"></i></span>
                        </a>
                        <div class="tk-video-name"><?= $v['ten' . $lang] ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- SECTION 10 — TIN TỨC SỰ KIỆN (mini bento) -->
<?php if (isset($tintuc) && count($tintuc) > 0) { ?>
    <?php
    $tt_main  = $tintuc[0];
    $tt_sides = array_slice($tintuc, 1, 2);
    ?>
    <section class="tk-sec tk-news">
        <div class="fixwidth">
            <h2 class="tk-sec-title">TIN TỨC SỰ KIỆN</h2>

            <div class="tk-news-bento">
                <!-- Main card -->
                <a class="tk-news-bento__main" href="<?= $tt_main['tenkhongdau' . $lang] ?>" title="<?= $tt_main['ten' . $lang] ?>">
                    <img class="tk-news-bento__main-img"
                        src="<?= UPLOAD_NEWS_L . $tt_main['photo'] ?>"
                        onerror="this.src='<?= THUMBS ?>/720x450x1/assets/images/noimage.png';"
                        alt="<?= $tt_main['ten' . $lang] ?>" loading="lazy" />
                    <div class="tk-news-bento__main-overlay"></div>
                    <div class="tk-news-bento__main-caption">
                        <span class="tk-news-bento__badge">Nổi bật</span>
                        <h3 class="tk-news-bento__main-title"><?= $tt_main['ten' . $lang] ?></h3>
                        <time class="tk-news-bento__main-date">
                            <i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $tt_main['ngaytao']) ?>
                        </time>
                    </div>
                </a>

                <!-- Side cards -->
                <?php if (count($tt_sides) > 0) { ?>
                    <div class="tk-news-bento__side">
                        <?php foreach ($tt_sides as $sv) { ?>
                            <a class="tk-news-bento__side-card" href="<?= $sv['tenkhongdau' . $lang] ?>" title="<?= $sv['ten' . $lang] ?>">
                                <div class="tk-news-bento__side-img">
                                    <img src="<?= THUMBS ?>/400x260x1/<?= UPLOAD_NEWS_L . $sv['photo'] ?>"
                                        onerror="this.src='<?= THUMBS ?>/400x260x1/assets/images/noimage.png';"
                                        alt="<?= $sv['ten' . $lang] ?>" loading="lazy" />
                                </div>
                                <div class="tk-news-bento__side-body">
                                    <time class="tk-news-bento__side-date">
                                        <i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $sv['ngaytao']) ?>
                                    </time>
                                    <h3 class="tk-news-bento__side-title"><?= $sv['ten' . $lang] ?></h3>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

            <div class="tk-news-more">
                <a class="tk-btn tk-btn-outline" href="tin-tuc">Xem tất cả tin tức &raquo;</a>
            </div>
        </div>
    </section>
<?php } ?>

<!-- OWL INIT (trường tiêu biểu) — chạy sau window load để chắc chắn jQuery+owl đã nạp -->
<!-- <script>
    window.addEventListener('load', function () {
        if (window.jQuery && jQuery('#doitac_slider').length) {
            jQuery('#doitac_slider').owlCarousel({
                loop: true, margin: 24, nav: false, dots: false, autoplay: true, autoplayTimeout: 2500,
                responsive: { 0: { items: 2 }, 480: { items: 3 }, 768: { items: 4 }, 1024: { items: 6 } }
            });
        }
    });
</script> -->
<script>
    window.addEventListener('load', function() {
        if (window.jQuery && jQuery('#doitac_slider').length) {
            jQuery('#doitac_slider').owlCarousel({
                loop: true,
                margin: 24,
                nav: false,
                dots: false,
                autoplay: true,

                // --- CẤU HÌNH ĐỂ CHẠY LIÊN TỤC ---
                autoplayTimeout: 3000, // Đặt thời gian chờ bằng với tốc độ trượt
                autoplaySpeed: 3000, // Tốc độ trượt (3000ms = 3 giây để dịch chuyển)
                slideTransition: 'linear', // Ép hiệu ứng chạy đều, không nhanh chậm
                // ---------------------------------

                responsive: {
                    0: {
                        items: 2
                    },
                    480: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    1024: {
                        items: 6
                    }
                }
            });
        }
    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các section có class tk-sec trên trang chủ
        const allSections = document.querySelectorAll('section.tk-sec');

        // Cấu hình bộ nhận diện IntersectionObserver
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Khi section lọt vào tầm mắt -> Thêm class kích hoạt hiệu ứng
                    entry.target.classList.add('is-revealed');
                } else {
                    // Khi section khuất khỏi tầm mắt -> Xóa class để lần sau cuộn lại vẫn chạy tiếp
                    entry.target.classList.remove('is-revealed');
                }
            });
        }, {
            root: null,
            // Đổi rootMargin một chút để trải nghiệm cuộn lên/xuống mượt mà, không bị khựng giữa chừng
            rootMargin: '-40px 0px -40px 0px',
            threshold: 0.1 // Đạt 10% diện tích xuất hiện là kích hoạt
        });

        // Bắt đầu theo dõi từng section
        allSections.forEach(section => {
            sectionObserver.observe(section);
        });
    });
</script>