<?php
/*
   PRODUCT DETAIL — Redesign "SaaS Micro Landing Page"
   Dữ liệu chính:   $row_detail  (từ sources/product.php)
   Biến bổ sung:    $seopage_product (tagline hero), $chucnang_items, $tinhnangsp_items,
                    $loiich_items, $hinhanhsp, $banner_tinhnang, $video_sp, $hdsd_article, $product
   Lưu ý: không thay đổi gì ở sources/product.php hay admin — chỉ tái cấu trúc trình bày.
*/

/* --- Biến hiển thị --- */
$pd_name    = $row_detail['ten' . $lang];
$pd_photo   = UPLOAD_PRODUCT_L . $row_detail['photo'];
$pd_mota    = (isset($row_detail['mota' . $lang]) && $row_detail['mota' . $lang] != '')
    ? htmlspecialchars_decode($row_detail['mota' . $lang]) : '';
$pd_noidung = (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '')
    ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '';

/* Tagline hero: lấy từ seopage.motavi (admin nhập) */
$pd_tagline = '';
if (isset($seopage_product['mota' . $lang]) && $seopage_product['mota' . $lang] != '') {
    $pd_tagline = strip_tags(htmlspecialchars_decode($seopage_product['mota' . $lang]));
}
/* Subtitle/eyebrow: tận dụng trường "Mã SP" (masp) */
$pd_subtitle = (!empty($row_detail['masp'])) ? $row_detail['masp'] : '';

/* Mô tả hero: ưu tiên mota$lang (mô tả ngắn), fallback tagline */
$pd_hero_desc = $pd_mota ? strip_tags($pd_mota) : $pd_tagline;
?>

<!--  SECTION 1 — HERO  -->
<section class="tk-sec tk-pd-hero">
    <div class="tk-pd-hero__bg" aria-hidden="true"></div>
    <div class="fixwidth">
        <div class="tk-pd-hero__inner">
            <div class="tk-pd-hero__left">
                <?php if ($pd_subtitle) { ?>
                    <span class="tk-pd-hero__eyebrow tk-rv tk-rv--up tk-d1"><?= $pd_subtitle ?></span>
                <?php } ?>
                <h1 class="tk-pd-hero__title tk-rv tk-rv--up tk-d2"><?= $pd_name ?></h1>
                <?php if ($pd_hero_desc) { ?>
                    <p class="tk-pd-hero__desc tk-rv tk-rv--up tk-d3"><?= $pd_hero_desc ?></p>
                <?php } ?>

                <div class="tk-pd-hero__actions tk-rv tk-rv--up tk-d4">
                    <a href="#dangkytuvan" class="tk-pd-btn tk-pd-btn--primary">Đăng ký tư vấn</a>
                    <a href="#pd-features" class="tk-pd-btn tk-pd-btn--ghost">Khám phá tính năng</a>
                </div>

                <div class="tk-pd-hero__badges tk-rv tk-rv--up tk-d5">
                    <a href="#" target="_blank" rel="noopener">
                        <img src="assets/images/titkul/badge-googleplay.png"
                            onerror="this.style.display='none';" alt="Tải trên Google Play">
                    </a>
                    <a href="#" target="_blank" rel="noopener">
                        <img src="assets/images/titkul/badge-appstore.png"
                            onerror="this.style.display='none';" alt="Tải trên App Store">
                    </a>
                </div>
            </div>

            <div class="tk-pd-hero__right tk-rv tk-rv--right tk-d4">
                <div class="tk-pd-hero__glow" aria-hidden="true"></div>
                <img src="<?= $pd_photo ?>" onerror="this.src='assets/images/noimage.png';" alt="<?= $pd_name ?>">
            </div>
        </div>
    </div>
</section>

<!--  SECTION 2 — SECTION 3 — OVERVIEW (noidungvi CKEditor)  -->
<?php if ($pd_noidung) { ?>
    <section class="tk-sec tk-pd-overview">
        <div class="fixwidth">
            <div class="tk-pd-overview__head tk-rv tk-rv--up">
                <span class="tk-pd-eyebrow">Tổng quan</span>
                <h2 class="tk-pd-sec-title">Giới thiệu về <span class="tk-pd-accent"><?= $pd_name ?></span></h2>
            </div>
            <div class="tk-pd-overview__body tk-pd-prose tk-rv tk-rv--up tk-d1">
                <?= $pd_noidung ?>
            </div>
        </div>
    </section>
<?php } ?>
<!--  HIGHLIGHT STRIP (tính năng nổi bật)  -->

<?php if (isset($tinhnangsp_items) && count($tinhnangsp_items) > 0) { ?>
    <section class="tk-sec tk-pd-highlights">
        <div class="fixwidth">
            <div class="tk-pd-features__head tk-rv tk-rv--up">
                <!-- <span class="tk-pd-eyebrow">Tính năng</span> -->
                <h2 class="tk-pd-sec-title">Tính năng nổi bật của <span class="tk-pd-accent"><?= $pd_name ?></span></h2>
            </div>
            <div class="tk-pd-highlights__grid">
                <?php foreach ($tinhnangsp_items as $idx => $tnsp) { ?>
                    <div class="tk-pd-hl tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>">
                        <div class="tk-pd-hl__icon">
                            <img src="<?= UPLOAD_PHOTO_L . $tnsp['photo'] ?>"
                                onerror="this.style.display='none';" alt="<?= $tnsp['ten' . $lang] ?>">
                        </div>
                        <p class="tk-pd-hl__name"><?= $tnsp['ten' . $lang] ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>


<!--  SECTION 4 — FEATURE TABS (chức năng)  -->
<?php if (isset($chucnang_items) && count($chucnang_items) > 0) { ?>
    <section class="tk-sec tk-pd-features" id="pd-features">
        <div class="fixwidth">
            <div class="tk-pd-features__head tk-rv tk-rv--up">
                <!-- <span class="tk-pd-eyebrow">Tính năng</span> -->
                <h2 class="tk-pd-sec-title">Chức năng của <span class="tk-pd-accent"><?= $pd_name ?></span></h2>
            </div>

            <div class="tk-pd-tabs tk-rv tk-rv--up tk-d1">
                <!-- Tab nav -->
                <div class="tk-pd-tabs__nav" role="tablist">
                    <?php foreach ($chucnang_items as $idx => $cn) { ?>
                        <button type="button"
                            class="tk-pd-tab<?= $idx === 0 ? ' is-active' : '' ?>"
                            role="tab"
                            data-pd-tab="<?= $idx ?>"
                            aria-selected="<?= $idx === 0 ? 'true' : 'false' ?>">
                            <span class="tk-pd-tab__icon">
                                <img src="<?= UPLOAD_PHOTO_L . $cn['photo'] ?>"
                                    onerror="this.style.display='none';" alt="">
                            </span>
                            <span class="tk-pd-tab__label"><?= $cn['ten' . $lang] ?></span>
                        </button>
                    <?php } ?>
                </div>

                <!-- Tab panels -->
                <div class="tk-pd-tabs__panels">
                    <?php foreach ($chucnang_items as $idx => $cn) {
                        $cn_mota = (isset($cn['mota' . $lang]) && $cn['mota' . $lang] != '')
                            ? htmlspecialchars_decode($cn['mota' . $lang]) : '';
                    ?>
                        <div class="tk-pd-panel<?= $idx === 0 ? ' is-active' : '' ?>" data-pd-panel="<?= $idx ?>" role="tabpanel">
                            <div class="tk-pd-panel__icon">
                                <img src="<?= UPLOAD_PHOTO_L . $cn['photo'] ?>"
                                    onerror="this.style.display='none';" alt="<?= $cn['ten' . $lang] ?>">
                            </div>
                            <div class="tk-pd-panel__body">
                                <h3 class="tk-pd-panel__title"><?= $cn['ten' . $lang] ?></h3>
                                <?php if ($cn_mota) { ?>
                                    <div class="tk-pd-panel__desc tk-pd-prose"><?= $cn_mota ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<!--  SECTION 5 — FEATURE BANNER  -->
<?php
$tn_bg = (isset($banner_tinhnang[0]['photo']) && $banner_tinhnang[0]['photo'] != '')
    ? UPLOAD_PRODUCT_L . $banner_tinhnang[0]['photo'] : '';
if ($tn_bg) { ?>
    <section class="tk-sec tk-pd-banner" style="background-image:url('<?= $tn_bg ?>');">
        <div class="tk-pd-banner__overlay" aria-hidden="true"></div>
        <div class="fixwidth">
            <div class="tk-pd-banner__inner">
                <div class="tk-pd-banner__mockup tk-rv tk-rv--left">
                    <img src="<?= $pd_photo ?>" onerror="this.src='assets/images/noimage.png';" alt="<?= $pd_name ?>">
                </div>
                <div class="tk-pd-banner__text tk-rv tk-rv--right">
                    <span class="tk-pd-eyebrow tk-pd-eyebrow--light">Trải nghiệm</span>
                    <h2>Tính năng nổi bật của<br><span class="tk-pd-banner__brand"><?= $pd_name ?></span></h2>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<!--  SECTION 6 — BENEFITS (lợi ích)  -->
<?php if (isset($loiich_items) && count($loiich_items) > 0) { ?>
    <section class="tk-sec tk-pd-benefits">
        <div class="fixwidth">
            <div class="tk-pd-benefits__head tk-rv tk-rv--up">
                <span class="tk-pd-eyebrow">Lợi ích</span>
                <h2 class="tk-pd-sec-title">Vì sao chọn <span class="tk-pd-accent"><?= $pd_name ?></span>?</h2>
            </div>
            <div class="tk-pd-benefits__grid">
                <?php foreach ($loiich_items as $idx => $li) {
                    $li_mota = (isset($li['mota' . $lang]) && $li['mota' . $lang] != '')
                        ? strip_tags(htmlspecialchars_decode($li['mota' . $lang])) : '';
                ?>
                    <div class="tk-pd-benefit tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>">
                        <div class="tk-pd-benefit__icon">
                            <img src="<?= UPLOAD_PHOTO_L . $li['photo'] ?>"
                                onerror="this.style.display='none';" alt="<?= $li['ten' . $lang] ?>">
                        </div>
                        <h3 class="tk-pd-benefit__name"><?= $li['ten' . $lang] ?></h3>
                        <?php if ($li_mota) { ?>
                            <p class="tk-pd-benefit__desc"><?= $li_mota ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!--  SECTION 7 — GALLERY (lightbox)  -->
<?php if (isset($hinhanhsp) && count($hinhanhsp) > 0) { ?>
    <section class="tk-sec tk-pd-gallery">
        <div class="fixwidth">
            <div class="tk-pd-gallery__head tk-rv tk-rv--up">
                <span class="tk-pd-eyebrow">Hình ảnh</span>
                <h2 class="tk-pd-sec-title">Giao diện ứng dụng</h2>
            </div>
            <div class="tk-pd-gallery__grid">
                <?php foreach ($hinhanhsp as $idx => $gimg) {
                    $g_src = UPLOAD_PRODUCT_L . $gimg['photo'];
                ?>
                    <button type="button"
                        class="tk-pd-gallery__item<?= $idx === 0 ? ' tk-pd-gallery__item--lead' : '' ?> tk-rv tk-rv--scale tk-d<?= min(($idx % 6) + 1, 6) ?>"
                        data-pd-lightbox="<?= $g_src ?>">
                        <img src="<?= $g_src ?>" onerror="this.style.display='none';" alt="<?= $pd_name ?> - hình <?= $idx + 1 ?>">
                        <span class="tk-pd-gallery__zoom"><i class="fas fa-search-plus"></i></span>
                    </button>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!--  SECTION 8 — VIDEOS (modal)  -->
<?php if (isset($video_sp) && count($video_sp) > 0) {
    $video_rows = array();
    foreach ($video_sp as $vid) {
        $yt_link = isset($vid['link_video']) ? $vid['link_video'] : '';
        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?.*v=|embed\/|shorts\/))([a-zA-Z0-9_-]{11})/', $yt_link, $m)) {
            $video_rows[] = array('id' => $m[1], 'ten' => $vid['ten' . $lang]);
        }
    }
    if (count($video_rows) > 0) { ?>
        <section class="tk-sec tk-pd-videos" id="pd-videos">
            <div class="fixwidth">
                <div class="tk-pd-videos__head tk-rv tk-rv--up">
                    <span class="tk-pd-eyebrow">Video</span>
                    <h2 class="tk-pd-sec-title">Video giới thiệu <span class="tk-pd-accent"><?= $pd_name ?></span></h2>
                </div>
                <div class="tk-pd-videos__grid">
                    <?php foreach ($video_rows as $idx => $v) { ?>
                        <button type="button"
                            class="tk-pd-video tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>"
                            data-pd-video="<?= $v['id'] ?>">
                            <span class="tk-pd-video__thumb">
                                <img src="https://img.youtube.com/vi/<?= $v['id'] ?>/hqdefault.jpg" alt="<?= $v['ten'] ?>">
                                <span class="tk-pd-video__play">
                                    <svg viewBox="0 0 68 48" width="60" height="42"><path d="M66.52 7.74c-.78-2.93-2.49-5.41-5.42-6.19C55.79.13 34 0 34 0S12.21.13 6.9 1.55c-2.93.78-4.64 3.26-5.42 6.19C.06 13.05 0 24 0 24s.06 10.95 1.48 16.26c.78 2.93 2.49 5.41 5.42 6.19C12.21 47.87 34 48 34 48s21.79-.13 27.1-1.55c2.93-.78 4.64-3.26 5.42-6.19C67.94 34.95 68 24 68 24s-.06-10.95-1.48-16.26z" fill="#bb0021"/><path d="M45 24L27 14v20" fill="#fff"/></svg>
                                </span>
                            </span>
                            <span class="tk-pd-video__title"><?= $v['ten'] ?></span>
                        </button>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
} ?>

<!--  SECTION 9 — HƯỚNG DẪN SỬ DỤNG (quick links)  -->
<?php if (isset($hdsd_article) && count($hdsd_article) > 0) { ?>
    <section class="tk-sec tk-pd-hdsd">
        <div class="fixwidth">
            <div class="tk-pd-hdsd__head tk-rv tk-rv--up">
                <span class="tk-pd-eyebrow">Hỗ trợ</span>
                <h2 class="tk-pd-sec-title">Hướng dẫn sử dụng</h2>
            </div>
            <div class="tk-pd-hdsd__scroll">
                <?php foreach ($hdsd_article as $idx => $hdsd) { ?>
                    <a href="<?= $hdsd['tenkhongdauvi'] ?>"
                        class="tk-pd-hdsd-card tk-rv tk-rv--up tk-d<?= min(($idx % 6) + 1, 6) ?>"
                        title="<?= $hdsd['ten' . $lang] ?>">
                        <span class="tk-pd-hdsd-card__num"><?= str_pad($idx + 1, 2, '0', STR_PAD_LEFT) ?></span>
                        <span class="tk-pd-hdsd-card__icon">
                            <img src="<?= UPLOAD_NEWS_L . $hdsd['photo'] ?>"
                                onerror="this.style.display='none';" alt="<?= $hdsd['ten' . $lang] ?>">
                        </span>
                        <span class="tk-pd-hdsd-card__name"><?= $hdsd['ten' . $lang] ?></span>
                    </a>
                <?php } ?>
            </div>
            <div class="tk-pd-hdsd__more tk-rv tk-rv--up">
                <a href="huong-dan-su-dung" class="tk-pd-btn tk-pd-btn--ghost-navy">Xem toàn bộ hướng dẫn <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
<?php } ?>

<!--  SECTION 10 — CTA  -->
<section class="tk-sec tk-pd-cta">
    <div class="fixwidth">
        <div class="tk-pd-cta__inner tk-rv tk-rv--up">
            <h2 class="tk-pd-cta__title">Sẵn sàng chuyển đổi số cùng <span class="tk-pd-cta__brand"><?= $pd_name ?></span>?</h2>
            <p class="tk-pd-cta__desc">Để lại thông tin, đội ngũ chuyên gia TitKul sẽ tư vấn giải pháp phù hợp nhất cho nhà trường của bạn.</p>
            <div class="tk-pd-cta__actions">
                <a href="#dangkytuvan" class="tk-pd-btn tk-pd-btn--primary">Đăng ký tư vấn</a>
                <a href="lien-he" class="tk-pd-btn tk-pd-btn--light">Liên hệ ngay</a>
            </div>
        </div>
    </div>
</section>

<!--  SECTION 11 — FORM ĐĂNG KÝ + HỖ TRỢ  -->
<?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
<?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>

<!--  SECTION 12 — ỨNG DỤNG KHÁC (related)  -->
<?php if (isset($product) && count($product) > 0) { ?>
    <section class="tk-sec tk-pd-related">
        <div class="fixwidth">
            <div class="tk-pd-related__head tk-rv tk-rv--up">
                <span class="tk-pd-eyebrow">Khám phá thêm</span>
                <h2 class="tk-pd-sec-title">Ứng dụng khác</h2>
            </div>
            <div class="tk-pd-related__grid">
                <?php foreach ($product as $k => $v) { ?>
                    <div class="tk-pd-procard tk-rv tk-rv--up tk-d<?= min(($k % 6) + 1, 6) ?>">
                        <a class="tk-pd-procard__img" href="<?= $v['tenkhongdauvi'] ?>">
                            <img onerror="this.src='<?= THUMBS ?>/380x270x2/assets/images/noimage.png';"
                                src="<?= THUMBS ?>/380x270x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>"
                                alt="<?= $v['ten' . $lang] ?>">
                        </a>
                        <div class="tk-pd-procard__info">
                            <h3 class="tk-pd-procard__name">
                                <a href="<?= $v['tenkhongdauvi'] ?>" title="<?= $v['tenvi'] ?>"><?= $v['ten' . $lang] ?></a>
                            </h3>
                            <a class="tk-pd-procard__more" href="<?= $v['tenkhongdauvi'] ?>">Tìm hiểu thêm <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!--  LIGHTBOX + VIDEO MODAL  -->
<div class="tk-pd-modal" id="tkPdModal" aria-hidden="true">
    <div class="tk-pd-modal__backdrop" data-pd-close></div>
    <div class="tk-pd-modal__box">
        <button type="button" class="tk-pd-modal__close" data-pd-close aria-label="Đóng">&times;</button>
        <div class="tk-pd-modal__content"></div>
    </div>
</div>

<!--  SCRIPTS  -->
<script>
    window.addEventListener('DOMContentLoaded', function () {

        /* --- Scroll reveal --- */
        var sections = document.querySelectorAll('section.tk-sec');
        if ('IntersectionObserver' in window) {
            var obs = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('is-revealed');
                        obs.unobserve(e.target);
                    }
                });
            }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
            sections.forEach(function (s) { obs.observe(s); });
        } else {
            sections.forEach(function (s) { s.classList.add('is-revealed'); });
        }

        /* --- Feature tabs --- */
        var tabs = document.querySelectorAll('.tk-pd-tab');
        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var idx = this.getAttribute('data-pd-tab');
                var scope = this.closest('.tk-pd-tabs');
                scope.querySelectorAll('.tk-pd-tab').forEach(function (t) {
                    t.classList.remove('is-active');
                    t.setAttribute('aria-selected', 'false');
                });
                scope.querySelectorAll('.tk-pd-panel').forEach(function (p) {
                    p.classList.remove('is-active');
                });
                this.classList.add('is-active');
                this.setAttribute('aria-selected', 'true');
                var panel = scope.querySelector('.tk-pd-panel[data-pd-panel="' + idx + '"]');
                if (panel) panel.classList.add('is-active');
            });
        });

        /* --- Modal (lightbox + video) --- */
        var modal = document.getElementById('tkPdModal');
        var modalContent = modal ? modal.querySelector('.tk-pd-modal__content') : null;

        function openModal(html) {
            if (!modal) return;
            modalContent.innerHTML = html;
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            if (!modal) return;
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            modalContent.innerHTML = '';
            document.body.style.overflow = '';
        }

        document.querySelectorAll('[data-pd-lightbox]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var src = this.getAttribute('data-pd-lightbox');
                openModal('<img class="tk-pd-modal__img" src="' + src + '" alt="">');
            });
        });

        document.querySelectorAll('[data-pd-video]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var id = this.getAttribute('data-pd-video');
                openModal('<div class="tk-pd-modal__video"><iframe src="https://www.youtube.com/embed/' + id +
                    '?autoplay=1&rel=0" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>');
            });
        });

        if (modal) {
            modal.querySelectorAll('[data-pd-close]').forEach(function (el) {
                el.addEventListener('click', closeModal);
            });
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeModal();
        });
    });
</script>