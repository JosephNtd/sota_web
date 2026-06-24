<?php if ($type == 'gioi-thieu') {
    /* Hero tagline: ưu tiên mota của bài, fallback mota seopage */
    $gi_tagline = !empty($static['mota' . $lang]) ? strip_tags(htmlspecialchars_decode($static['mota' . $lang])) : (!empty($mota_page) ? strip_tags($mota_page) : 'Năng động · Chuyên nghiệp · Thực tiễn cao');
    $gi_photo   = !empty($static['photo']) ? UPLOAD_NEWS_L . $static['photo'] : '';
    $gi_diachi  = !empty($optsetting['diachi']) ? $optsetting['diachi'] : 'TP. Hồ Chí Minh';
?>
<!--      TRANG GIỚI THIỆU TITKUL — "Brand Manifesto" (6 sections)      -->
<div class="tk-gi">

    <!-- ▸ SECTION 1 — HERO -->
    <section class="tk-sec tk-gi-hero">
        <div class="tk-gi-hero__bg" aria-hidden="true">
            <span class="tk-gi-hero__blob tk-gi-hero__blob--a"></span>
            <span class="tk-gi-hero__blob tk-gi-hero__blob--b"></span>
        </div>
        <div class="fixwidth tk-gi-hero__wrap">
            <div class="tk-gi-hero__text tk-rv tk-rv--left">
                <?php if (!empty($logo['photo'])) { ?>
                    <img src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="TitKul" class="tk-gi-hero__logo" />
                <?php } ?>
                <span class="tk-gi-hero__eyebrow">Về chúng tôi</span>
                <h1 class="tk-gi-hero__title">CÔNG TY CỔ PHẦN <span class="tk-gi-accent">TITKUL</span></h1>
                <p class="tk-gi-hero__tagline"><?= $gi_tagline ?></p>
                <div class="tk-gi-hero__meta">
                    <span class="tk-gi-hero__chip"><i class="fas fa-flag"></i> Thành lập 2020</span>
                    <span class="tk-gi-hero__chip"><i class="fas fa-map-marker-alt"></i> <?= $gi_diachi ?></span>
                </div>
            </div>
            <div class="tk-gi-hero__visual tk-rv tk-rv--right tk-d1">
                <?php if (!empty($gi_photo)) { ?>
                    <img src="<?= $gi_photo ?>" alt="<?= $static['ten' . $lang] ?>" class="tk-gi-hero__img"
                         onerror="this.closest('.tk-gi-hero__visual').classList.add('is-empty');" />
                <?php } else { ?>
                    <img src="assets/images/titkul/hexagon.png" alt="TitKul" class="tk-gi-hero__img" />
                <?php } ?>
                <span class="tk-gi-hero__frame" aria-hidden="true"></span>
            </div>
        </div>
    </section>

    <!-- ▸ SECTION 2 — STATS STRIP -->
    <section class="tk-sec tk-gi-stats">
        <div class="fixwidth">
            <div class="tk-gi-stats__grid">
                <div class="tk-gi-stat tk-rv tk-rv--up">
                    <span class="tk-gi-stat__num" data-count="2020" data-suffix="">0</span>
                    <span class="tk-gi-stat__label">Năm thành lập</span>
                </div>
                <div class="tk-gi-stat tk-rv tk-rv--up tk-d1">
                    <span class="tk-gi-stat__num" data-count="100" data-suffix="+">0</span>
                    <span class="tk-gi-stat__label">Trường đang sử dụng</span>
                </div>
                <div class="tk-gi-stat tk-rv tk-rv--up tk-d2">
                    <span class="tk-gi-stat__num" data-count="3" data-suffix="">0</span>
                    <span class="tk-gi-stat__label">Sản phẩm phần mềm</span>
                </div>
                <div class="tk-gi-stat tk-rv tk-rv--up tk-d3">
                    <span class="tk-gi-stat__num tk-gi-stat__num--text">TP.HCM</span>
                    <span class="tk-gi-stat__label">Trụ sở chính</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ▸ SECTION 3 — COMPANY STORY -->
    <section class="tk-sec tk-gi-story">
        <div class="fixwidth">
            <div class="tk-gi-story__grid">
                <div class="tk-gi-story__text tk-rv tk-rv--left">
                    <span class="tk-gi-eyebrow">Câu chuyện của chúng tôi</span>
                    <h2 class="tk-gi-sec-title">Hành trình kiến tạo <span class="tk-gi-accent">trường học số</span></h2>
                    <div class="tk-gi-prose">
                        <?php if (!empty($static['noidung' . $lang])) { ?>
                            <?= htmlspecialchars_decode($static['noidung' . $lang]) ?>
                        <?php } else { ?>
                            <p>Công ty Cổ Phần TitKul được thành lập năm 2020, chức năng kinh doanh chính
                                là chuyên về nghiên cứu &amp; sản xuất phần mềm ứng dụng trí tuệ nhân tạo,
                                đáp ứng nhu cầu chuyển đổi số cho các cơ quan, ban ngành và đặc biệt phát triển
                                phần mềm hệ thống quản lý trường học thông minh phục vụ ngành Giáo dục có
                                kết nối vào cơ sở dữ liệu dùng chung của Sở GD &amp; ĐT TP.HCM.</p>
                            <p>TitKul đã và đang phát triển phần mềm/ứng dụng phục vụ Quản lý trường học
                                từ cấp Mầm Non, Tiểu học đến THPT, với nhiều tính năng hữu ích, thông minh,
                                tự động, kết nối dữ liệu ngành giáo dục, phù hợp với định hướng chuyển đổi số
                                trường học trong tương lai.</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="tk-gi-story__visual tk-rv tk-rv--right tk-d1">
                    <?php if (!empty($gi_photo)) { ?>
                        <img src="<?= $gi_photo ?>" alt="<?= $static['ten' . $lang] ?>" loading="lazy"
                             onerror="this.closest('.tk-gi-story__visual').style.display='none';" />
                    <?php } else { ?>
                        <img src="assets/images/titkul/gioithieu-collage.png" alt="TitKul" loading="lazy"
                             onerror="this.closest('.tk-gi-story__visual').style.display='none';" />
                    <?php } ?>
                    <span class="tk-gi-story__badge"><i class="fas fa-graduation-cap"></i> Chuyển đổi số giáo dục</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ▸ SECTION 4 — BUSINESS SECTORS -->
    <section class="tk-sec tk-gi-sectors">
        <div class="fixwidth">
            <div class="tk-gi-sectors__head tk-rv tk-rv--up">
                <span class="tk-gi-eyebrow">Lĩnh vực hoạt động</span>
                <h2 class="tk-gi-sec-title">Ngành nghề <span class="tk-gi-accent">kinh doanh</span></h2>
            </div>
            <div class="tk-gi-sectors__grid">
                <div class="tk-gi-sector tk-rv tk-rv--up">
                    <span class="tk-gi-sector__ico"><i class="fas fa-graduation-cap"></i></span>
                    <h3 class="tk-gi-sector__title">Phần mềm giáo dục</h3>
                    <p class="tk-gi-sector__desc">Sản xuất phần mềm quản lý trường học thông minh: TK Smart Vision, HDSchool, H2School.</p>
                </div>
                <div class="tk-gi-sector tk-rv tk-rv--up tk-d1">
                    <span class="tk-gi-sector__ico"><i class="fas fa-building"></i></span>
                    <h3 class="tk-gi-sector__title">Phần mềm doanh nghiệp</h3>
                    <p class="tk-gi-sector__desc">Sản xuất ứng dụng quản lý doanh nghiệp và các giải pháp thương mại điện tử.</p>
                </div>
                <div class="tk-gi-sector tk-rv tk-rv--up tk-d2">
                    <span class="tk-gi-sector__ico"><i class="fas fa-lightbulb"></i></span>
                    <h3 class="tk-gi-sector__title">Tư vấn giải pháp</h3>
                    <p class="tk-gi-sector__desc">Tư vấn, xây dựng các giải pháp phần mềm chuyển đổi số theo nhu cầu thực tiễn.</p>
                </div>
                <div class="tk-gi-sector tk-rv tk-rv--up tk-d3">
                    <span class="tk-gi-sector__ico"><i class="fas fa-microchip"></i></span>
                    <h3 class="tk-gi-sector__title">Thiết bị IoT</h3>
                    <p class="tk-gi-sector__desc">Thiết kế, sản xuất thiết bị IoT hỗ trợ giáo dục và môi trường học tập thông minh.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ▸ SECTION 5 — TẦM NHÌN / SỨ MỆNH / GIÁ TRỊ CỐT LÕI (reuse .tk-vmv2) -->
    <section class="tk-sec tk-vmv2 tk-gi-vmv">
        <div class="fixwidth">
            <div class="tk-gi-sectors__head tk-rv tk-rv--up">
                <span class="tk-gi-eyebrow">Định hướng phát triển</span>
                <h2 class="tk-gi-sec-title">Tầm nhìn &middot; Sứ mệnh &middot; <span class="tk-gi-accent">Giá trị cốt lõi</span></h2>
            </div>
            <div class="tk-vmv2-grid">
                <!-- Left Column: Vision + Mission -->
                <div class="tk-vmv2-left">
                    <div class="tk-vmv2-card tk-rv tk-rv--left">
                        <div class="tk-vmv2-card-img">
                            <span class="tk-vmv2-badge">Tầm Nhìn</span>
                            <img src="assets/images/titkul/tamnhin.jpg" alt="Tầm nhìn" onerror="this.style.opacity=0;" loading="lazy" />
                            <div class="tk-vmv2-card-overlay"></div>
                        </div>
                        <div class="tk-vmv2-card-body">
                            <h4 class="tk-vmv2-card-title">
                                Cung Cấp Phần Mềm<br/>
                                <span class="tk-accent-red">Giá Trị Thực Tiễn Cao</span>
                            </h4>
                            <p class="tk-vmv2-card-text">
                                Titkul cung cấp sản phẩm phần mềm quản lý chuyển đổi số mang tính thực tiễn cao,
                                mang đến giá trị cao nhất cho khách hàng trường học, doanh nghiệp.
                            </p>
                        </div>
                    </div>
                    <div class="tk-vmv2-card tk-rv tk-rv--left tk-d1">
                        <div class="tk-vmv2-card-img">
                            <span class="tk-vmv2-badge">Sứ Mệnh</span>
                            <img src="assets/images/titkul/sumenh.jpg" alt="Sứ mệnh" onerror="this.style.opacity=0;" loading="lazy" />
                            <div class="tk-vmv2-card-overlay"></div>
                        </div>
                        <div class="tk-vmv2-card-body">
                            <h4 class="tk-vmv2-card-title">
                                Phục Vụ Chuyển Đổi Số<br/>
                                <span class="tk-accent-red">Ngành Giáo Dục</span>
                            </h4>
                            <p class="tk-vmv2-card-text">
                                Không ngừng đổi mới, sáng tạo, nhằm cung cấp sản phẩm phần mềm quản lý tốt nhất
                                cho khách hàng, phục vụ chuyển đổi số thành công.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Right Column: Core Values -->
                <div class="tk-vmv2-right tk-rv tk-rv--right tk-d2">
                    <img class="tk-vmv2-right-bg" src="assets/images/titkul/giatricotloi.jpg" alt="Giá trị cốt lõi" onerror="this.style.opacity=0;" loading="lazy" />
                    <div class="tk-vmv2-right-overlay"></div>
                    <div class="tk-vmv2-right-content">
                        <div class="tk-vmv2-right-top">
                            <span class="tk-vmv2-badge-glass">Giá Trị Cốt Lõi</span>
                        </div>
                        <h4 class="tk-vmv2-right-heading">
                            Năng Động <br/>
                            Chuyên Nghiệp <br/>
                            <span class="tk-vmv2-right-accent">Thực Tiễn Cao</span>
                        </h4>
                        <div class="tk-vmv2-chips">
                            <span class="tk-vmv2-chip"><i class="fas fa-bolt"></i> Sáng Tạo</span>
                            <span class="tk-vmv2-chip"><i class="fas fa-sync-alt"></i> Đổi Mới</span>
                            <span class="tk-vmv2-chip"><i class="fas fa-check-circle"></i> Thực Tiễn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ▸ SECTION 6 — CTA + FORM ĐĂNG KÝ -->
    <?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
    <?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>

</div><!-- /.tk-gi -->

<script>
window.addEventListener('load', function () {
    /* Scroll reveal */
    var rvEls = document.querySelectorAll('.tk-gi .tk-rv');
    if ('IntersectionObserver' in window) {
        var rvObs = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (en) {
                if (en.isIntersecting) {
                    en.target.classList.add('is-revealed');
                    obs.unobserve(en.target);
                }
            });
        }, { threshold: 0.12 });
        rvEls.forEach(function (el) { rvObs.observe(el); });
    } else {
        rvEls.forEach(function (el) { el.classList.add('is-revealed'); });
    }
    document.querySelectorAll('.tk-gi section.tk-sec').forEach(function (el) { el.classList.add('is-revealed'); });

    /* Counter-up cho stats */
    function countUp(el) {
        var target = parseInt(el.getAttribute('data-count'), 10);
        var suffix = el.getAttribute('data-suffix') || '';
        var dur = 1200, start = null;
        function step(ts) {
            if (!start) start = ts;
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.floor(eased * target) + suffix;
            if (p < 1) requestAnimationFrame(step);
            else el.textContent = target + suffix;
        }
        requestAnimationFrame(step);
    }
    var nums = document.querySelectorAll('.tk-gi-stat__num[data-count]');
    if ('IntersectionObserver' in window) {
        var numObs = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { countUp(en.target); obs.unobserve(en.target); }
            });
        }, { threshold: 0.5 });
        nums.forEach(function (el) { numObs.observe(el); });
    } else {
        nums.forEach(function (el) { el.textContent = el.getAttribute('data-count') + (el.getAttribute('data-suffix') || ''); });
    }
});
</script>

<?php } elseif (!empty($static)) { ?>
<!--     TRANG TĨNH CHUNG (van-ban-phap-ly, v.v.)     -->
<div class="tk-vb fixwidth">
    <div class="tk-vb__grid<?= (isset($static['photo']) && $static['photo'] != '') ? '' : ' tk-vb__grid--full' ?>">
        <!-- Nội dung chính -->
        <div class="tk-vb__main">
            <div class="tk-vb__content">
                <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
            </div>

            <!-- Album hình ảnh văn bản -->
            <?php if (isset($static_gallery) && count($static_gallery) > 0) {

                /* Gom nhóm ảnh theo tiêu đề: nhiều ảnh cùng tiêu đề = 1 văn bản nhiều trang.
                   Ảnh không tiêu đề (hoặc tiêu đề riêng lẻ) tách thành nhóm độc lập, giữ thứ tự. */
                $vb_groups = array();
                foreach ($static_gallery as $g) {
                    $cap = !empty($g['ten' . $lang]) ? $g['ten' . $lang] : (!empty($g['tenvi']) ? $g['tenvi'] : '');
                    $key = ($cap !== '') ? 'cap_' . mb_strtolower(trim($cap), 'UTF-8') : '__solo_' . count($vb_groups);
                    if (!isset($vb_groups[$key])) $vb_groups[$key] = array('cap' => $cap, 'items' => array());
                    $vb_groups[$key]['items'][] = $g;
                }
                /* Tách văn bản nhiều trang (docs) và ảnh đơn (singles) */
                $vb_docs = array();
                $vb_singles = array();
                foreach ($vb_groups as $grp) {
                    if (count($grp['items']) > 1) $vb_docs[] = $grp;
                    else $vb_singles[] = $grp;
                }
                $vb_gid = 0; // id nhóm cho lightbox điều hướng
            ?>
            <div class="tk-vb-gallery">
                <h1 class="tk-vb-gallery__title">VĂN BẢN CƠ SỞ PHÁP LÝ</h1>

                <?php /* Văn bản nhiều trang */
                foreach ($vb_docs as $grp) {
                    $grp_cap = $grp['cap'];
                    $grp_n = count($grp['items']);
                    $gid = 'g' . (++$vb_gid);
                ?>
                <div class="tk-vb-doc">
                    <h3 class="tk-vb-doc__title">
                        <i class="fas fa-file-alt"></i>
                        <span><?= $grp_cap ?></span>
                        <span class="tk-vb-doc__count"><?= $grp_n ?> trang</span>
                    </h3>
                    <div class="tk-vb-doc__pages">
                        <?php foreach ($grp['items'] as $i => $g) {
                            $g_src = UPLOAD_STATIC_L . $g['photo'];
                            $g_page = $grp_cap . ' — Trang ' . ($i + 1);
                        ?>
                        <figure class="tk-vb-doc__page">
                            <a class="tk-vb-gallery__link" href="<?= $g_src ?>" data-vb-lightbox data-vb-group="<?= $gid ?>" data-vb-cap="<?= htmlspecialchars($g_page) ?>">
                                <img src="<?= $g_src ?>" alt="<?= htmlspecialchars($g_page) ?>" loading="lazy"
                                     onerror="this.closest('.tk-vb-doc__page').style.display='none';" />
                                <span class="tk-vb-doc__page-num">Trang <?= $i + 1 ?></span>
                                <span class="tk-vb-gallery__zoom"><i class="fas fa-search-plus"></i></span>
                            </a>
                        </figure>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>

                <?php /* Ảnh đơn lẻ */
                if (count($vb_singles) > 0) { ?>
                <div class="tk-vb-gallery__grid">
                    <?php foreach ($vb_singles as $grp) {
                        $g = $grp['items'][0];
                        $g_cap = $grp['cap'];
                        $g_src = UPLOAD_STATIC_L . $g['photo'];
                        $gid = 'g' . (++$vb_gid);
                    ?>
                        <figure class="tk-vb-gallery__item">
                            <a class="tk-vb-gallery__link" href="<?= $g_src ?>" data-vb-lightbox data-vb-group="<?= $gid ?>" data-vb-cap="<?= htmlspecialchars($g_cap) ?>">
                                <img src="<?= $g_src ?>" alt="<?= htmlspecialchars($g_cap) ?>" loading="lazy"
                                     onerror="this.closest('.tk-vb-gallery__item').style.display='none';" />
                                <span class="tk-vb-gallery__zoom"><i class="fas fa-search-plus"></i></span>
                            </a>
                            <?php if ($g_cap != '') { ?>
                                <figcaption class="tk-vb-gallery__cap"><?= $g_cap ?></figcaption>
                            <?php } ?>
                        </figure>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>

            <!-- Chia sẻ -->
            <div class="tk-vb__share">
                <b><?= chiase ?>:</b>
                <div class="social-plugin w-clear">
                    <div class="website_share d-flex align-items-center pr-2">
                        <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize=true>
                            <img width="20" height="20" src="assets/images/zalo1.png">
                            <span style="color: #fff; font-size: 11px; font-weight: 500; letter-spacing: 0.5px;">Share</span>
                        </div>
                    </div>
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <?php if (isset($static['photo']) && $static['photo'] != '') { ?>
        <aside class="tk-vb__side">
            <div class="tk-vb__sticky">
                <img src="<?= UPLOAD_NEWS_L . $static['photo'] ?>" alt="<?= $static['ten' . $lang] ?>"
                    class="tk-vb__img" onerror="this.style.display='none';" />

                <?php if (isset($optsetting['hotline']) && $optsetting['hotline'] != '') { ?>
                <div class="tk-vb-sidebar-box">
                    <div class="tk-vb-sidebar-box__title">
                        <i class="fas fa-headset"></i> Liên hệ tư vấn
                    </div>
                    <a class="tk-vb-sidebar-box__row" href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>">
                        <i class="fas fa-phone-alt"></i> <span><?= $optsetting['hotline'] ?></span>
                    </a>
                    <?php if (isset($optsetting['email']) && $optsetting['email'] != '') { ?>
                    <a class="tk-vb-sidebar-box__row" href="mailto:<?= $optsetting['email'] ?>">
                        <i class="fas fa-envelope"></i> <span><?= $optsetting['email'] ?></span>
                    </a>
                    <?php } ?>
                    <?php if (isset($optsetting['diachi']) && $optsetting['diachi'] != '') { ?>
                    <div class="tk-vb-sidebar-box__row">
                        <i class="fas fa-map-marker-alt"></i> <span><?= $optsetting['diachi'] ?></span>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </aside>
        <?php } ?>
    </div>
</div><!-- /.tk-vb -->

<?php if (isset($static_gallery) && count($static_gallery) > 0) { ?>
<!-- Lightbox phóng to ảnh -->
<div class="tk-vb-lightbox" id="tkVbLightbox" aria-hidden="true">
    <button type="button" class="tk-vb-lightbox__close" aria-label="Đóng"><i class="fas fa-times"></i></button>
    <button type="button" class="tk-vb-lightbox__nav tk-vb-lightbox__nav--prev" aria-label="Trang trước"><i class="fas fa-chevron-left"></i></button>
    <button type="button" class="tk-vb-lightbox__nav tk-vb-lightbox__nav--next" aria-label="Trang sau"><i class="fas fa-chevron-right"></i></button>
    <figure class="tk-vb-lightbox__body">
        <img class="tk-vb-lightbox__img" src="" alt="" />
        <figcaption class="tk-vb-lightbox__cap"></figcaption>
    </figure>
</div>
<script>
window.addEventListener('load', function () {
    var lb = document.getElementById('tkVbLightbox');
    if (!lb) return;
    var lbImg = lb.querySelector('.tk-vb-lightbox__img');
    var lbCap = lb.querySelector('.tk-vb-lightbox__cap');
    var btnPrev = lb.querySelector('.tk-vb-lightbox__nav--prev');
    var btnNext = lb.querySelector('.tk-vb-lightbox__nav--next');

    /* Gom link theo nhóm để lướt qua các trang cùng văn bản */
    var groups = {};
    var links = [].slice.call(document.querySelectorAll('[data-vb-lightbox]'));
    links.forEach(function (a) {
        var gid = a.getAttribute('data-vb-group') || 'solo';
        (groups[gid] = groups[gid] || []).push(a);
    });

    var curGroup = [];
    var curIdx = 0;

    function render() {
        var a = curGroup[curIdx];
        if (!a) return;
        var cap = a.getAttribute('data-vb-cap');
        lbImg.src = a.getAttribute('href');
        lbImg.alt = cap || '';
        lbCap.textContent = cap || '';
        lbCap.style.display = cap ? '' : 'none';
        var multi = curGroup.length > 1;
        btnPrev.style.display = multi ? '' : 'none';
        btnNext.style.display = multi ? '' : 'none';
    }
    function openFrom(a) {
        var gid = a.getAttribute('data-vb-group') || 'solo';
        curGroup = groups[gid] || [a];
        curIdx = curGroup.indexOf(a);
        if (curIdx < 0) curIdx = 0;
        render();
        lb.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }
    function closeLb() {
        lb.classList.remove('is-open');
        lbImg.src = '';
        document.body.style.overflow = '';
    }
    function nav(d) {
        if (curGroup.length < 2) return;
        curIdx = (curIdx + d + curGroup.length) % curGroup.length;
        render();
    }

    links.forEach(function (a) {
        a.addEventListener('click', function (e) {
            e.preventDefault();
            openFrom(a);
        });
    });
    btnPrev.addEventListener('click', function (e) { e.stopPropagation(); nav(-1); });
    btnNext.addEventListener('click', function (e) { e.stopPropagation(); nav(1); });
    lb.addEventListener('click', function (e) {
        if (e.target === lb || e.target.closest('.tk-vb-lightbox__close')) closeLb();
    });
    document.addEventListener('keydown', function (e) {
        if (!lb.classList.contains('is-open')) return;
        if (e.key === 'Escape') closeLb();
        else if (e.key === 'ArrowLeft') nav(-1);
        else if (e.key === 'ArrowRight') nav(1);
    });
});
</script>
<?php } ?>

<?php } else { ?>
<div class="fixwidth" style="padding: 60px 15px; text-align: center;">
    <div class="title"><span><?= (@$title_cat != '') ? $title_cat : 'Giới thiệu' ?></span></div>
    <p style="color: #999; font-size: 16px;">Nội dung đang được cập nhật...</p>
</div>
<?php } ?>
