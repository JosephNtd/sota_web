<?php
/* 
   PRODUCT DETAIL — Section 1 + 2
   Dữ liệu chính:   $row_detail  (từ sources/product.php)
   Biến bổ sung:    $seopage_product (tagline hero)
                    $logo (allpage.php), $setting, $optsetting
*/

/* Biến hiển thị --- */
$pd_name     = $row_detail['ten' . $lang];
$pd_photo    = UPLOAD_PRODUCT_L . $row_detail['photo'];
$pd_mota     = (isset($row_detail['mota' . $lang]) && $row_detail['mota' . $lang] != '')
    ? htmlspecialchars_decode($row_detail['mota' . $lang]) : '';
$pd_noidung  = (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '')
    ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '';

/* Tagline hero: lấy từ seopage.motavi (admin nhập), fallback title_crumb */
$pd_tagline  = '';
if (isset($seopage_product['mota' . $lang]) && $seopage_product['mota' . $lang] != '') {
    $pd_tagline = strip_tags(htmlspecialchars_decode($seopage_product['mota' . $lang]));
}
/* Subtitle hero: lấy từ trường masp (tận dụng trường "Mã SP" làm phụ đề) */
$pd_subtitle = (!empty($row_detail['masp'])) ? $row_detail['masp'] : '';

?>

<!-- SECTION 1 — HERO 2 CỘT -->
<section class="tk-sec tk-prodetail-hero">
    <div class="fixwidth">
        <div class="tk-prodetail-hero__inner">

            <!-- Cột trái: text + badges tải app -->
            <div class="tk-prodetail-hero__left">
                <?php if ($pd_tagline) { ?>
                    <p class="tk-prodetail-hero__tagline tk-rv tk-rv--up tk-d1"><?= $pd_tagline ?></p>

                <?php } ?>


                <h1 class="tk-prodetail-hero__name tk-rv tk-rv--up tk-d2"><?= $pd_name ?></h1>

                <?php if ($pd_subtitle) { ?>
                    <p class="tk-prodetail-hero__subtitle tk-rv tk-rv--up tk-d3"><?= $pd_subtitle ?></p>
                <?php } ?>

                <p class="tk-prodetail-hero__dltext tk-rv tk-rv--up tk-d4">Tải ứng dụng vào điện thoại</p>

                <div class="tk-prodetail-hero__badges tk-rv tk-rv--up tk-d5">
                    <a href="#" target="_blank" rel="noopener">
                        <img src="assets/images/titkul/badge-googleplay.png"
                            onerror="this.style.display='none';"
                            alt="Tải trên Google Play">
                    </a>
                    <a href="#" target="_blank" rel="noopener">
                        <img src="assets/images/titkul/badge-appstore.png"
                            onerror="this.style.display='none';"
                            alt="Tải trên App Store">
                    </a>
                </div>
            </div>

            <!-- Cột phải: ảnh chính sản phẩm -->
            <div class="tk-prodetail-hero__right tk-rv tk-rv--right tk-d6">
                <img src="<?= $pd_photo ?>"
                    onerror="this.src='assets/images/noimage.png';"
                    alt="<?= $pd_name ?>">
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2 — LOGO + MÔ TẢ -->
<section class="tk-sec tk-prodetail-info">
    <div class="fixwidth">
        <!-- Row 1: Tên sản phẩm (styled như logo) -->
        <h2 class="tk-prodetail-info__name tk-rv tk-rv--scale tk-d1"><?= $pd_name ?></h2>

        <!-- Row 2: Mô tả sản phẩm -->
        <?php if ($pd_noidung) { ?>
            <div class="tk-prodetail-info__desc text-align-center fs-2 tk-rv tk-rv--up tk-d2">
                <?= $pd_noidung ?>
            </div>
        <?php } ?>
    </div>
</section>

<!-- Section 3: Heading HƯỚNG DẪN SỬ DỤNG -->
<?php if (isset($hdsd_article) && count($hdsd_article) > 0) { ?>
    <section class="tk-sec tk-prodetail-hdsd-heading">
        <div class="fixwidth">
            <h2 class="tk-prodetail-hdsd-heading__title tk-rv tk-rv--up">HƯỚNG DẪN SỬ DỤNG</h2>
        </div>
    </section>
    <!-- Section 4: Cards HDSD -->
    <section class="tk-sec tk-prodetail-hdsd-cards">
        <div class="fixwidth">
            <div class="tk-prodetail-hdsd-cards__grid">
                <?php foreach ($hdsd_article as $idx => $hdsd) { ?>
                    <a href="<?= $hdsd['tenkhongdauvi'] ?>"
                        class="tk-prodetail-hdsd-card tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>"
                        title="<?= $hdsd['ten' . $lang] ?>">
                        <div class="tk-prodetail-hdsd-card__icon">
                            <img src="<?= UPLOAD_NEWS_L . $hdsd['photo'] ?>"
                                onerror="this.style.display='none';"
                                alt="<?= $hdsd['ten' . $lang] ?>">
                        </div>
                        <p class="tk-prodetail-hdsd-card__name"><?= $hdsd['ten' . $lang] ?></p>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- Section 5: Gallery ảnh liên quan đến sản phẩm -->

<?php if (isset($hinhanhsp) && count($hinhanhsp) > 0) { ?>
    <section class="tk-sec tk-prodetail-gallery">
        <div class="fixwidth">
            <div class="tk-prodetail-gallery__grid">
                <?php foreach ($hinhanhsp as $idx => $gimg) { ?>
                    <div class="tk-prodetail-gallery__item tk-rv tk-rv--scale tk-d<?= min(($idx % 6) + 1, 6) ?>">
                        <img src="<?= UPLOAD_PRODUCT_L . $gimg['photo'] ?>"
                            onerror="this.style.display='none';"
                            alt="<?= $pd_name ?>">
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- Section 6: Mô tả chức năng (lấy từ motavi của item chức năng đầu tiên) -->
<?php
    $func_intro = '';
    if (isset($chucnang_items[0]['mota' . $lang]) && $chucnang_items[0]['mota' . $lang] != '') {
        $func_intro = htmlspecialchars_decode($chucnang_items[0]['mota' . $lang]);
    }
    if ($func_intro) { ?>
<section class="tk-sec tk-prodetail-func-intro">
    <div class="fixwidth">
        <div class="tk-prodetail-func-intro__text tk-rv tk-rv--up">
            <?= $func_intro ?>
        </div>
    </div>
</section>
<?php } ?>

<!-- Section 7 + 8: Tiêu đề + Grid chức năng (từ photo module chuc-nang) -->
<?php if (isset($chucnang_items) && count($chucnang_items) > 0) { ?>
<section class="tk-sec tk-prodetail-features">
    <div class="fixwidth">
        <h2 class="tk-prodetail-features__title tk-rv tk-rv--up">CHỨC NĂNG CỦA <span class="tk-brand-name"><?= $pd_name ?></span></h2>
        <div class="tk-prodetail-features__grid">
            <?php foreach ($chucnang_items as $idx => $cn) { ?>
            <div class="tk-prodetail-feature-item tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>">
                <div class="tk-prodetail-feature-item__icon">
                    <img src="<?= UPLOAD_PHOTO_L . $cn['photo'] ?>"
                         onerror="this.style.display='none';"
                         alt="<?= $cn['ten' . $lang] ?>">
                </div>
                <p class="tk-prodetail-feature-item__name"><?= $cn['ten' . $lang] ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<!-- Section 9: Banner tính năng nổi bật (background + product photo + title) -->
<?php
    $tn_bg = (count($banner_tinhnang) > 0 && isset($banner_tinhnang[0])) ? UPLOAD_PRODUCT_L . $banner_tinhnang[0]['photo'] : '';
?>
<section class="tk-sec tk-prodetail-tnb-banner" <?php if ($tn_bg) { ?>style="background-image: url('<?= $tn_bg ?>');"<?php } ?>>
    <div class="tk-prodetail-tnb-banner__overlay"></div>
    <div class="fixwidth">
        <div class="tk-prodetail-tnb-banner__inner">
            <div class="tk-prodetail-tnb-banner__mockup tk-rv tk-rv--left">
                <img src="<?= $pd_photo ?>"
                     onerror="this.src='assets/images/noimage.png';"
                     alt="<?= $pd_name ?>">
            </div>
            <div class="tk-prodetail-tnb-banner__text tk-rv tk-rv--up">
                <h2>TÍNH NĂNG NỔI BẬT CỦA</h2>
                <p class="tk-brand-name"><?= $pd_name ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Section 10: Grid tính năng nổi bật SP (từ photo module tinh-nang-sp) -->
<?php if (isset($tinhnangsp_items) && count($tinhnangsp_items) > 0) { ?>
<section class="tk-sec tk-prodetail-tnb-grid">
    <div class="fixwidth">
        <div class="tk-prodetail-tnb-grid__wrap">
            <?php foreach ($tinhnangsp_items as $idx => $tnsp) { ?>
            <div class="tk-prodetail-tnb-item tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>">
                <div class="tk-prodetail-tnb-item__icon">
                    <img src="<?= UPLOAD_PHOTO_L . $tnsp['photo'] ?>"
                         onerror="this.style.display='none';"
                         alt="<?= $tnsp['ten' . $lang] ?>">
                </div>
                <p class="tk-prodetail-tnb-item__name"><?= $tnsp['ten' . $lang] ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<!-- Section 11: Lợi ích của phần mềm (2 cột: text+icons trái, ảnh SP phải) -->
<?php if (isset($loiich_items) && count($loiich_items) > 0) {
    /* Lấy mô tả section từ motavi của item đầu tiên (admin nhập ở ô "Mô tả" của item #1) */
    $loiich_desc = '';
    if (isset($loiich_items[0]['mota' . $lang]) && $loiich_items[0]['mota' . $lang] != '') {
        $loiich_desc = htmlspecialchars_decode($loiich_items[0]['mota' . $lang]);
    }
?>
<section class="tk-sec tk-prodetail-benefits">
    <div class="fixwidth">
        <div class="tk-prodetail-benefits__inner">

            <!-- Cột trái: tiêu đề + mô tả + icon grid -->
            <div class="tk-prodetail-benefits__left">
                <h2 class="tk-prodetail-benefits__heading tk-rv tk-rv--left">LỢI ÍCH CỦA PHẦN MỀM</h2>
                <p class="tk-prodetail-benefits__brand tk-brand-name tk-rv tk-rv--left tk-d1"><?= $pd_name ?></p>

                <?php if ($loiich_desc) { ?>
                    <div class="tk-prodetail-benefits__desc tk-rv tk-rv--left tk-d2"><?= $loiich_desc ?></div>
                <?php } ?>

                <div class="tk-prodetail-benefits__grid">
                    <?php foreach ($loiich_items as $idx => $li) { ?>
                    <div class="tk-prodetail-benefit-card tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>">
                        <div class="tk-prodetail-benefit-card__icon">
                            <img src="<?= UPLOAD_PHOTO_L . $li['photo'] ?>"
                                 onerror="this.style.display='none';"
                                 alt="<?= $li['ten' . $lang] ?>">
                        </div>
                        <p class="tk-prodetail-benefit-card__name"><?= $li['ten' . $lang] ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Cột phải: ảnh sản phẩm -->
            <div class="tk-prodetail-benefits__right tk-rv tk-rv--right">
                <img src="<?= $pd_photo ?>"
                     onerror="this.src='assets/images/noimage.png';"
                     alt="<?= $pd_name ?>">
            </div>

        </div>
    </div>
</section>
<?php } ?>

<!-- Section 12 + 13: Tên SP + Subtitle per-product -->
<section class="tk-sec tk-prodetail-video-header">
    <div class="fixwidth">
        <h2 class="tk-prodetail-video-header__name tk-brand-name tk-rv tk-rv--up"><?= $pd_name ?></h2>
        <?php if ($pd_subtitle) { ?>
            <p class="tk-prodetail-video-header__sub tk-rv tk-rv--up tk-d1"><?= $pd_subtitle ?></p>
        <?php } ?>
    </div>
</section>

<!-- Section 14: Video sản phẩm -->
<?php if (isset($video_sp) && count($video_sp) > 0) { ?>
<section class="tk-sec tk-prodetail-videos">
    <div class="fixwidth">
        <div class="tk-prodetail-videos__grid">
            <?php foreach ($video_sp as $idx => $vid) {
                /* Trích YouTube ID từ link_video */
                $yt_id = '';
                $yt_link = isset($vid['link_video']) ? $vid['link_video'] : '';
                if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?.*v=|embed\/|shorts\/))([a-zA-Z0-9_-]{11})/', $yt_link, $m)) {
                    $yt_id = $m[1];
                }
                if (!$yt_id) continue;
            ?>
            <div class="tk-prodetail-video-card tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>">
                <div class="tk-prodetail-video-card__thumb">
                    <a href="<?= $yt_link ?>" target="_blank" rel="noopener">
                        <img src="https://img.youtube.com/vi/<?= $yt_id ?>/hqdefault.jpg"
                             alt="<?= $vid['ten' . $lang] ?>">
                        <span class="tk-prodetail-video-card__play">
                            <svg viewBox="0 0 68 48" width="68" height="48"><path d="M66.52 7.74c-.78-2.93-2.49-5.41-5.42-6.19C55.79.13 34 0 34 0S12.21.13 6.9 1.55c-2.93.78-4.64 3.26-5.42 6.19C.06 13.05 0 24 0 24s.06 10.95 1.48 16.26c.78 2.93 2.49 5.41 5.42 6.19C12.21 47.87 34 48 34 48s21.79-.13 27.1-1.55c2.93-.78 4.64-3.26 5.42-6.19C67.94 34.95 68 24 68 24s-.06-10.95-1.48-16.26z" fill="red"/><path d="M45 24L27 14v20" fill="#fff"/></svg>
                        </span>
                    </a>
                </div>
                <p class="tk-prodetail-video-card__title"><?= $vid['ten' . $lang] ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<!--  ỨNG DỤNG KHÁC (related products)  -->
<section class="tk-sec tk-prodetail-related">
    <div class="fixwidth">
        <div class="title tk-rv tk-rv--up">Ứng dụng khác</div>
        <div class="content-main w-clear">
            <?php if (isset($product) && count($product) > 0) { ?>
                <div class="loadkhung_product1 mainkhung_product">
                    <?php foreach ($product as $k => $v) { ?>
                        <div class="boxproduct_item tk-rv tk-rv--up tk-d<?= min(($k % 6) + 1, 6) ?>">
                            <a class="boxproduct_img" href="<?= $v['tenkhongdauvi'] ?>"><span><img
                                        onerror="this.src='<?= THUMBS ?>/380x270x2/assets/images/noimage.png';"
                                        src="<?= THUMBS ?>/380x270x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>"
                                        alt="<?= $v['ten' . $lang] ?>" /></span></a>
                            <div class="boxproduct_info">
                                <div class="boxproduct_name"><a href="<?= $v['tenkhongdauvi'] ?>"
                                        title="<?= $v['tenvi'] ?>"><?= $v['ten' . $lang] ?></a></div>
                                <a class="boxproduct_more" href="<?= $v['tenkhongdauvi'] ?>">Tìm hiểu thêm <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Scroll Reveal: Entrance animations cho tất cả sections -->
<script>
    window.addEventListener('DOMContentLoaded', function() {
        var allSections = document.querySelectorAll('section.tk-sec');
        var sectionObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    sectionObserver.unobserve(entry.target);
                }
            });
        }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
        allSections.forEach(function(section) { sectionObserver.observe(section); });
    });
</script>