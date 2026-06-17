<?php if (!defined('SOURCES')) die("Error"); ?>

<?php if ($type == 'tinh-nang') { ?>
    <!--      CHI TIẾT TÍNH NĂNG — Premium Scholastic Modernism      -->

    <!-- SECTION 1: HERO — badge + title + motả + CTA | glass ảnh -->
    <section class="tk-nd-hero">
        <div class="tk-nd-hero__blob tk-nd-hero__blob--1"></div>
        <div class="tk-nd-hero__blob tk-nd-hero__blob--2"></div>
        <div class="fixwidth">
            <div class="tk-nd-hero__grid">
                <div class="tk-nd-hero__text">
                    <span class="tk-nd-hero__badge">
                        <i class="<?= !empty($row_detail['icon']) ? $row_detail['icon'] : 'fas fa-star' ?>"></i>
                        <?= $title_crumb ?>
                    </span>
                    <h1 class="tk-nd-hero__title"><?= $row_detail['ten' . $lang] ?></h1>
                    <?php if (!empty($row_detail['mota' . $lang])) { ?>
                        <p class="tk-nd-hero__desc"><?= $row_detail['mota' . $lang] ?></p>
                    <?php } ?>
                    <div class="tk-nd-hero__actions">
                        <a class="tk-nd-hero__btn tk-nd-hero__btn--primary" href="#dangkytuvan">
                            Liên hệ tư vấn <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="tk-nd-hero__media">
                    <div class="tk-nd-hero__glass">
                        <img src="<?= UPLOAD_NEWS_L . $row_detail['photo'] ?>"
                            onerror="this.src='<?= THUMBS ?>/800x600x1/assets/images/noimage.png';"
                            alt="<?= $row_detail['ten' . $lang] ?>" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SPLIT CKEditor content tại <hr> -->
    <?php
    $raw_content = !empty($row_detail['noidung' . $lang]) ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '';
    $ck_parts = preg_split('/<hr\s*\/?>/i', $raw_content, 2);
    $ck_section2 = trim($ck_parts[0] ?? '');
    $ck_section3 = trim($ck_parts[1] ?? '');

    $has_features = (isset($hinhanhtt) && count($hinhanhtt) > 0);
    $has_banner   = (isset($banner_tinhnang) && count($banner_tinhnang) > 0);
    $banner_img1  = ($has_banner && isset($banner_tinhnang[0])) ? $banner_tinhnang[0] : null;
    $banner_img2  = ($has_banner && isset($banner_tinhnang[1])) ? $banner_tinhnang[1] : null;
    $has_sec2     = ($ck_section2 !== '' || $has_features);
    $has_sec3     = ($ck_section3 !== '');
    ?>

    <!-- SECTION 2: NỘI DUNG CHÍNH — CKEditor(phần 1) + Features | Banner 1 -->
    <?php if ($has_sec2 || $banner_img1) { ?>
        <section class="tk-nd-main">
            <div class="tk-nd-main__blob"></div>
            <div class="fixwidth">
                <div class="tk-nd-main__grid <?= !$banner_img1 ? 'tk-nd-main__grid--full' : '' ?>">
                    <div class="tk-nd-main__left">
                        <?php if ($ck_section2 !== '') { ?>
                            <div class="tk-nd-article" id="toc-content">
                                <?= $ck_section2 ?>
                            </div>
                        <?php } ?>

                        <?php if ($has_features) { ?>
                            <div class="tk-nd-features">
                                <?php foreach ($hinhanhtt as $feat) { ?>
                                    <div class="tk-nd-feat-item">
                                        <div class="tk-nd-feat-item__icon">
                                            <?php if (!empty($feat['photo'])) { ?>
                                                <img src="<?= THUMBS ?>/64x64x1/<?= UPLOAD_NEWS_L . $feat['photo'] ?>"
                                                    alt="<?= $feat['tenvi'] ?>" />
                                            <?php } else { ?>
                                                <i class="fas fa-check-circle"></i>
                                            <?php } ?>
                                        </div>
                                        <div class="tk-nd-feat-item__text">
                                            <h3><?= $feat['tenvi'] ?></h3>
                                            <?php if (!empty($feat['tenen'])) { ?>
                                                <p><?= $feat['tenen'] ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                    <?php if ($banner_img1) { ?>
                        <div class="tk-nd-main__right">
                            <div class="tk-nd-main__glass">
                                <div class="tk-nd-main__glass-glow"></div>
                                <img src="<?= THUMBS ?>/760x540x1/<?= UPLOAD_NEWS_L . $banner_img1['photo'] ?>"
                                    alt="<?= $banner_img1['ten' . $lang] ?>" />
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- SECTION 3: CÁC BƯỚC — Banner 2 bên TRÁI | CKEditor(phần 2) + steps bên PHẢI -->
    <?php if ($has_sec3) { ?>
        <section class="tk-nd-steps">
            <div class="tk-nd-steps__blob"></div>
            <div class="fixwidth">
                <div class="tk-nd-steps__grid <?= !$banner_img2 ? 'tk-nd-steps__grid--full' : '' ?>">
                    <?php if ($banner_img2) { ?>
                        <div class="tk-nd-steps__media">
                            <div class="tk-nd-main__glass">
                                <div class="tk-nd-main__glass-glow"></div>
                                <img src="<?= THUMBS ?>/760x900x1/<?= UPLOAD_NEWS_L . $banner_img2['photo'] ?>"
                                    alt="<?= $banner_img2['ten' . $lang] ?>" />
                            </div>
                            <?php if (!empty($banner_img2['ten' . $lang])) { ?>
                                <p class="tk-nd-steps__media-caption"><?= $banner_img2['ten' . $lang] ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="tk-nd-steps__content">
                        <div class="tk-nd-article">
                            <?= $ck_section3 ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- SECTION 3: VIDEO (nếu có) -->
    <?php if (isset($video_tinhnang) && count($video_tinhnang) > 0) { ?>
        <section class="tk-nd-video">
            <div class="fixwidth">
                <h2 class="tk-nd-video__heading">Video giới thiệu</h2>
                <div class="tk-nd-video__grid">
                    <?php foreach ($video_tinhnang as $vid) {
                        $has_url  = !empty($vid['link_video']);
                        $has_file = !empty($vid['taptin']);
                        if (!$has_url && !$has_file) continue;

                        // Detect YouTube ID
                        $ytid = '';
                        if ($has_url && preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $vid['link_video'], $m)) {
                            $ytid = $m[1];
                        }

                        // Poster image (thumbnail)
                        $poster = !empty($vid['photo']) ? THUMBS . '/640x360x1/' . UPLOAD_NEWS_L . $vid['photo'] : '';
                    ?>
                        <div class="tk-nd-video__item">
                            <div class="tk-nd-video__frame">
                                <?php if ($ytid) { ?>
                                    <!-- YouTube embed -->
                                    <iframe src="https://www.youtube.com/embed/<?= $ytid ?>" frameborder="0" allowfullscreen loading="lazy"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                <?php } elseif ($has_file) { ?>
                                    <!-- Video file local -->
                                    <video controls preload="metadata" playsinline
                                        style="background:#000">
                                        <source src="<?= $config_base ?>upload/file/<?= $vid['taptin'] ?>" type="video/mp4">
                                        Trình duyệt không hỗ trợ video.
                                    </video>
                                <?php } elseif ($has_url) { ?>
                                    <!-- URL khác (iframe fallback) -->
                                    <iframe src="<?= $vid['link_video'] ?>" frameborder="0" allowfullscreen loading="lazy"></iframe>
                                <?php } ?>
                            </div>
                            <?php if (!empty($vid['ten' . $lang])) { ?>
                                <p class="tk-nd-video__caption"><?= $vid['ten' . $lang] ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- SHARE
    <section class="tk-nd-share">
        <div class="fixwidth">
            <div class="tk-nd-share__inner">
                <b><?= chiase ?>:</b>
                <div class="social-plugin w-clear">
                    <div class="website_share d-flex align-items-center pr-2">
                        <div class="zalo-share-button"
                            data-href="<?= $func->getCurrentPageURL() ?>"
                            data-oaid="<?= (!empty($optsetting['oaidzalo'])) ? $optsetting['oaidzalo'] : '579745863508352884' ?>"
                            data-layout="1" data-color="blue" data-customize=true>
                            <img width="20" height="20" src="$config_base ?>assets/images/zalo1.png">
                            <span style="color:#fff;font-size:11px;font-weight:500;letter-spacing:.5px">Share</span>
                        </div>
                    </div>
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- BÀI VIẾT LIÊN QUAN -->
    <?php if (isset($news) && count($news) > 0) { ?>
        <section class="tk-nd-related">
            <div class="fixwidth">
                <h2 class="tk-nd-related__heading">Tính năng khác</h2>
                <div class="tk-news-grid">
                    <?php foreach ($news as $v) { ?>
                        <article class="tk-news-card">
                            <a class="tk-news-card__img" href="<?= $v[$sluglang] ?>">
                                <img src="<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                    onerror="this.src='<?= THUMBS ?>/480x320x1/assets/images/noimage.png';"
                                    alt="<?= $v['ten' . $lang] ?>" loading="lazy" />
                            </a>
                            <div class="tk-news-card__body">
                                <h3 class="tk-news-card__title">
                                    <a href="<?= $v[$sluglang] ?>"><?= $v['ten' . $lang] ?></a>
                                </h3>
                                <?php if (!empty($v['mota' . $lang])) { ?>
                                    <p class="tk-news-card__desc"><?= $v['mota' . $lang] ?></p>
                                <?php } ?>
                                <a class="tk-news-card__link" href="<?= $v[$sluglang] ?>">
                                    Xem chi tiết <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
    <?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>
    <script>
        document.querySelectorAll('.tk-sec').forEach(function(el) {
            el.classList.add('is-revealed');
        });
    </script>


<?php } elseif ($type == 'huong-dan') { ?>
    <!--  
          CHI TIẾT HƯỚNG DẪN SỬ DỤNG — Premium Scholastic Modernism
          Sections: Hero → Product Select → HDSchool → H2School → CKEditor → Related
     -->
    <?php
    /* --- Prepare data --- */
    $hd_title   = $row_detail['ten' . $lang];          // e.g. "ĐỐI VỚI BAN GIÁM HIỆU"
    $hd_desc    = $row_detail['mota' . $lang] ?? '';
    $hd_content = !empty($row_detail['noidung' . $lang]) ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '';
    $hd_photo   = $row_detail['photo'];

    $has_gallery = (isset($hinhanhtt) && count($hinhanhtt) > 0);
    $has_banner  = (isset($banner_tinhnang) && count($banner_tinhnang) > 0);
    $has_videos  = (isset($video_tinhnang) && count($video_tinhnang) > 0);

    /* Products for selection cards — first 2 only */
    $prod1 = isset($splistmenu[0]) ? $splistmenu[0] : null;
    $prod2 = isset($splistmenu[1]) ? $splistmenu[1] : null;
    ?>

    <!-- SECTION 1: HERO — Dark Navy -->
    <section class="tk-hd-hero">
        <div class="tk-hd-hero__radial"></div>
        <div class="fixwidth">
            <div class="tk-hd-hero__grid">
                <div class="tk-hd-hero__text">
                    <h1 class="tk-hd-hero__title">HƯỚNG DẪN SỬ DỤNG</h1>
                    <p class="tk-hd-hero__sub">DÀNH CHO <?= mb_strtoupper($hd_title, 'UTF-8') ?></p>
                </div>
                <?php if (!empty($hd_photo)) { ?>
                    <div class="tk-hd-hero__media">
                        <img src="<?= UPLOAD_NEWS_L . $hd_photo ?>"
                            onerror="this.parentElement.style.display='none'"
                            alt="<?= $hd_title ?>" loading="lazy" />
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- SECTION 2: PRODUCT SELECTION -->
    <?php if ($prod1 || $prod2) { ?>
        <section class="tk-hd-select">
            <div class="fixwidth">
                <h2 class="tk-hd-select__heading">Quý Thầy/Cô hãy chọn ứng dụng cần xem hướng dẫn sử dụng</h2>
                <div class="tk-hd-select__grid">
                    <?php foreach ($splistmenu as $si => $sp) {
                        if ($si >= 2) break; ?>
                        <a class="tk-hd-select__card" href="#product-<?= $sp['id'] ?>">
                            <span class="tk-hd-select__name">
                                <?php
                                $pname = $sp['ten' . $lang];
                                if (preg_match('/(HD|H2)(School)/i', $pname, $pm)) {
                                    echo '<span class="tk-hd-navy">' . $pm[1] . '</span><span class="tk-hd-red">' . $pm[2] . '</span>';
                                } else {
                                    echo $pname;
                                }
                                ?>
                            </span>
                            <?php if (!empty($sp['mota' . $lang])) { ?>
                                <p class="tk-hd-select__desc"><?= htmlspecialchars_decode($sp['mota' . $lang]) ?></p>
                            <?php } ?>
                            <span class="tk-hd-select__link">Xem hướng dẫn <i class="fas fa-arrow-right"></i></span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- SECTION 3: FIRST PRODUCT (HDSchool) — Platform Guide Cards -->
    <?php if ($prod1) { ?>
        <section class="tk-hd-product tk-hd-product--light" id="product-<?= $prod1['id'] ?>">
            <div class="fixwidth">
                <div class="tk-hd-product__header">
                    <h3 class="tk-hd-product__name">
                        <?php
                        $pn1 = $prod1['ten' . $lang];
                        if (preg_match('/(HD|H2)(School)/i', $pn1, $pm1)) {
                            echo '<span class="tk-hd-navy">' . $pm1[1] . '</span><span class="tk-hd-red">' . $pm1[2] . '</span>';
                        } else {
                            echo $pn1;
                        }
                        ?>
                    </h3>
                    <p class="tk-hd-product__sub">HƯỚNG DẪN SỬ DỤNG <?= mb_strtoupper($pn1, 'UTF-8') ?> DÀNH CHO <?= mb_strtoupper($hd_title, 'UTF-8') ?></p>
                </div>

                <?php if ($has_gallery) { ?>
                    <div class="tk-hd-platform-grid">
                        <?php foreach ($hinhanhtt as $gi => $gal) {
                            $has_file_gal = !empty($gal['taptin']);
                            $has_link = !empty($gal['link_video']);
                            $gal_href = $has_file_gal ? ($config_base . 'upload/file/' . $gal['taptin']) : ($has_link ? $gal['link_video'] : '');
                            $is_coming = empty($gal_href);
                        ?>
                            <div class="tk-hd-platform-card <?= $is_coming ? 'tk-hd-platform-card--disabled' : '' ?>">
                                <div class="tk-hd-platform-card__icon">
                                    <?php if (!empty($gal['photo'])) { ?>
                                        <img src="<?= UPLOAD_NEWS_L . $gal['photo'] ?>"
                                            onerror="this.style.display='none';this.nextElementSibling.style.display='inline';"
                                            alt="<?= $gal['tenvi'] ?>" />
                                        <i class="fas fa-desktop" style="display:none"></i>
                                    <?php } else { ?>
                                        <i class="fas fa-<?= ($gi == 0) ? 'desktop' : (($gi == 1) ? 'mobile-alt' : 'th-large') ?>"></i>
                                    <?php } ?>
                                </div>
                                <h4 class="tk-hd-platform-card__title"><?= $gal['tenvi'] ?></h4>
                                <?php if (!$is_coming) { ?>
                                    <a class="tk-hd-platform-card__link" href="<?= $gal_href ?>" target="_blank">Xem hướng dẫn tại đây &gt;&gt;&gt;</a>
                                <?php } else { ?>
                                    <span class="tk-hd-platform-card__coming"><?= !empty($gal['tenen']) ? $gal['tenen'] : '... đang được cập nhật' ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <p class="tk-hd-empty"><?= noidungdangcapnhat ?></p>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <!-- SECTION 4: SECOND PRODUCT (H2School) — Phone Mockup + Guide List -->
    <?php if ($prod2 && ($has_banner || $has_videos)) { ?>
        <section class="tk-hd-product tk-hd-product--dim" id="product-<?= $prod2['id'] ?>">
            <div class="fixwidth">
                <div class="tk-hd-product__header">
                    <h3 class="tk-hd-product__name">
                        <?php
                        $pn2 = $prod2['ten' . $lang];
                        if (preg_match('/(HD|H2)(School)/i', $pn2, $pm2)) {
                            echo '<span class="tk-hd-navy">' . $pm2[1] . '</span><span class="tk-hd-red">' . $pm2[2] . '</span>';
                        } else {
                            echo $pn2;
                        }
                        ?>
                    </h3>
                    <p class="tk-hd-product__sub">HƯỚNG DẪN SỬ DỤNG <?= mb_strtoupper($pn2, 'UTF-8') ?> DÀNH CHO <?= mb_strtoupper($hd_title, 'UTF-8') ?></p>
                </div>

                <div class="tk-hd-h2-grid">
                    <?php if ($has_banner) { ?>
                        <div class="tk-hd-phone">
                            <div class="tk-hd-phone__img">
                                <img src="<?= UPLOAD_NEWS_L . $banner_tinhnang[0]['photo'] ?>"
                                    alt="<?= $banner_tinhnang[0]['ten' . $lang] ?? '' ?>" loading="lazy" />
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($has_videos) { ?>
                        <div class="tk-hd-guides">
                            <div class="tk-hd-guides__list">
                                <?php foreach ($video_tinhnang as $vid) {
                                    /* Ưu tiên: taptin (file upload) → link_video (URL) → # */
                                    $has_file = !empty($vid['taptin']);
                                    $has_url  = !empty($vid['link_video']);
                                    if ($has_file) {
                                        $vid_link = $config_base . 'upload/file/' . $vid['taptin'];
                                    } elseif ($has_url) {
                                        $vid_link = $vid['link_video'];
                                    } else {
                                        $vid_link = '#';
                                    }
                                    /* Detect loại file để chọn icon */
                                    $ext = $has_file ? strtolower(pathinfo($vid['taptin'], PATHINFO_EXTENSION)) : '';
                                    $is_pdf = ($ext === 'pdf');
                                    $is_doc = in_array($ext, ['doc', 'docx']);
                                    $icon_class = $is_pdf ? 'fas fa-file-pdf' : ($is_doc ? 'fas fa-file-word' : 'fas fa-play');
                                ?>
                                    <?php if ($has_file || $has_url) { ?>
                                        <a class="tk-hd-guides__item" href="<?= $vid_link ?>" <?= ($has_file) ? ' target="_blank"' : '' ?>>
                                            <i class="<?= $icon_class ?> tk-hd-guides__play"></i>
                                            <span><?= $vid['ten' . $lang] ?></span>
                                        </a>
                                    <?php } else { ?>
                                        <div class="tk-hd-guides__item tk-hd-guides__item--disabled" onclick="this.querySelector('.tk-hd-guides__toast').classList.add('show');setTimeout(()=>this.querySelector('.tk-hd-guides__toast').classList.remove('show'),2000)">
                                            <i class="fas fa-clock tk-hd-guides__play"></i>
                                            <span><?= $vid['ten' . $lang] ?></span>
                                            <span class="tk-hd-guides__toast">Đang cập nhật</span>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <!--   CKEditor CONTENT (nếu có)   -->
    <?php if ($hd_content !== '') { ?>
        <section class="tk-hd-content">
            <div class="fixwidth">
                <div class="tk-nd-article" id="toc-content"><?= $hd_content ?></div>
            </div>
        </section>
    <?php } ?>

    <!--   SHARE   -->
    <!-- <section class="tk-nd-share">
        <div class="fixwidth">
            <div class="tk-nd-share__inner">
                <b><?= chiase ?>:</b>
                <div class="social-plugin w-clear">
                    <div class="website_share d-flex align-items-center pr-2">
                        <div class="zalo-share-button"
                            data-href="<?= $func->getCurrentPageURL() ?>"
                            data-oaid="<?= (!empty($optsetting['oaidzalo'])) ? $optsetting['oaidzalo'] : '579745863508352884' ?>"
                            data-layout="1" data-color="blue" data-customize=true>
                            <img width="20" height="20" src="../../assets/images/zalo1.png">
                            <span style="color:#fff;font-size:11px;font-weight:500;letter-spacing:.5px">Share</span>
                        </div>
                    </div>
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>
    </section> -->

    <!--   BÀI VIẾT LIÊN QUAN (các đối tượng HDSD khác)   -->
    <?php if (isset($news) && count($news) > 0) { ?>
        <section class="tk-nd-related">
            <div class="fixwidth">
                <h2 class="tk-nd-related__heading">Hướng dẫn cho đối tượng khác</h2>
                <div class="tk-hdsd-grid" style="padding:0; background:none;">
                    <?php foreach ($news as $v) { ?>
                        <a class="tk-hdsd-card" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
                            <div class="tk-hdsd-card__icon">
                                <?php if (!empty($v['photo'])) { ?>
                                    <img src="<?= THUMBS ?>/150x150x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                        onerror="this.style.display='none'"
                                        alt="<?= $v['ten' . $lang] ?>" />
                                <?php } else { ?>
                                    <i class="fas fa-book"></i>
                                <?php } ?>
                            </div>
                            <h3 class="tk-hdsd-card__title"><?= $v['ten' . $lang] ?></h3>
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-hdsd-card__desc"><?= $v['mota' . $lang] ?></p>
                            <?php } ?>
                            <span class="tk-hdsd-card__link">Xem Hướng Dẫn <i class="fas fa-arrow-right"></i></span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>
    <script>
        document.querySelectorAll('.tk-sec').forEach(function(el) {
            el.classList.add('is-revealed');
        });
        /* Smooth scroll for product anchor links */
        document.querySelectorAll('.tk-hd-select__card').forEach(function(a) {
            a.addEventListener('click', function(e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

<?php } else { ?>
    <!-- ════════ CHI TIẾT TIN TỨC — Magazine Article Layout ════════ -->

    <?php
    $has_tt_gallery = (isset($hinhanhtt) && count($hinhanhtt) > 0);
    ?>
    <!-- SECTION 1: Article Hero — ảnh cover full-width + overlay navy + title -->
    <section class="tknews-detail-hero">
        <?php if (!empty($row_detail['photo'])) { ?>
            <img class="tknews-detail-hero__bg"
                src="<?= UPLOAD_NEWS_L . $row_detail['photo'] ?>"
                onerror="this.style.display='none'"
                alt="<?= $row_detail['ten' . $lang] ?>" />
        <?php } ?>
        <div class="tknews-detail-hero__overlay"></div>
        <div class="fixwidth tknews-detail-hero__inner">
            <span class="tknews-detail-hero__badge">
                <i class="far fa-newspaper"></i> Tin tức
            </span>
            <h1 class="tknews-detail-hero__title"><?= $row_detail['ten' . $lang] ?></h1>
            <div class="tknews-detail-hero__meta">
                <span><i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $row_detail['ngaytao']) ?></span>
                <?php if (!empty($row_detail['luotxem'])) { ?>
                    <span><i class="far fa-eye"></i> <?= number_format($row_detail['luotxem']) ?> lượt xem</span>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- SECTION 2: Article Body — single-column reading -->
    <section class="tknews-detail-body">
        <div class="fixwidth">
            <article class="tknews-detail-article">
                <?php if (!empty($row_detail['mota' . $lang])) { ?>
                    <p class="tknews-detail-article__lead"><?= $row_detail['mota' . $lang] ?></p>
                <?php } ?>

                <?php if (!empty($row_detail['noidung' . $lang])) { ?>
                    <div class="tknews-detail-article__content" id="toc-content">
                        <?= htmlspecialchars_decode($row_detail['noidung' . $lang]) ?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning"><strong><?= noidungdangcapnhat ?></strong></div>
                <?php } ?>

                <div class="tknews-detail-article__footer">
                    <a class="tknews-detail-back" href="tin-tuc">
                        <i class="fas fa-arrow-left"></i> Quay lại danh sách tin tức
                    </a>
                </div>
            </article>
        </div>
    </section>


    <?php if ($has_tt_gallery) { ?>

        <!-- GALLERY v2  -->
        <section class="tknews-gallery">
            <div class="fixwidth">
                <div class="tknews-gallery__inner">

                    <!-- Header -->
                    <div class="tknews-gallery__header">
                        <h2 class="tknews-gallery__title">
                            <span class="tknews-gallery__title-accent"></span>
                            Hình ảnh
                        </h2>
                        <span class="tknews-gallery__count"><?= count($hinhanhtt) ?> ảnh</span>
                    </div>

                    <div class="tknews-gallery__layout">

                        <!-- ── STAGE ── -->
                        <div class="tknews-gallery__stage" id="tknewsStage">
                            <?php
                            $first    = $hinhanhtt[0];
                            $firstSrc = UPLOAD_NEWS_L . $first['photo'];
                            $firstAlt = !empty($first['tenvi']) ? $first['tenvi'] : $row_detail['ten' . $lang];
                            ?>
                            <img
                                class="tknews-gallery__stage-img"
                                id="tknewsStageImg"
                                src="<?= $firstSrc ?>"
                                onerror="this.src='<?= THUMBS ?>/800x450x1/assets/images/noimage.png';"
                                alt="<?= htmlspecialchars($firstAlt) ?>" />

                            <!-- Autoplay progress bar -->
                            <div class="tknews-gallery__progress" id="tknewsProgress"></div>

                            <!-- Zoom hint -->
                            <div class="tknews-gallery__stage-zoom">
                                <i class="fas fa-expand-alt"></i>
                            </div>

                            <!-- Caption + counter -->
                            <div class="tknews-gallery__caption">
                                <span class="tknews-gallery__caption-text" id="tknewsCaption">
                                    <?= htmlspecialchars($firstAlt) ?>
                                </span>
                                <span class="tknews-gallery__stage-counter">
                                    <b id="tknewsCurIdx">1</b> / <?= count($hinhanhtt) ?>
                                </span>
                            </div>
                        </div>
                        <!-- /.stage -->

                        <!-- ── THUMBNAIL GRID ── -->
                        <div class="tknews-gallery__thumbs" id="tknewsThumbs">
                            <?php foreach ($hinhanhtt as $i => $img) {
                                $imgSrc   = UPLOAD_NEWS_L . $img['photo'];
                                $thumbSrc = THUMBS . '/200x134x1/' . $imgSrc;
                                $altText  = !empty($img['tenvi']) ? $img['tenvi'] : $row_detail['ten' . $lang];
                                $isActive = ($i === 0) ? 'is-active' : '';
                            ?>
                                <div class="tknews-thumb-item <?= $isActive ?>"
                                    data-full="<?= $imgSrc ?>"
                                    data-caption="<?= htmlspecialchars($altText) ?>"
                                    data-index="<?= $i ?>"
                                    title="<?= htmlspecialchars($altText) ?>">
                                    <img
                                        src="<?= $thumbSrc ?>"
                                        onerror="this.src='<?= THUMBS ?>/200x134x1/assets/images/noimage.png';"
                                        alt="<?= htmlspecialchars($altText) ?>"
                                        loading="<?= $i === 0 ? 'eager' : 'lazy' ?>" />
                                    <span class="tknews-thumb-item__num"><?= $i + 1 ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- /.thumbs -->

                    </div><!-- /.layout -->

                </div><!-- /.inner -->
            </div><!-- /.fixwidth -->
        </section>

        <!-- Lightbox -->
        <div class="tknews-lightbox" id="tknewsLightbox" role="dialog" aria-modal="true" aria-label="Xem ảnh lớn">
            <img class="tknews-lightbox__img" id="tknewsLbImg" src="" alt="" />
            <button class="tknews-lightbox__close" id="tknewsLbClose" aria-label="Đóng"><i class="fas fa-times"></i></button>
            <button class="tknews-lightbox__nav tknews-lightbox__nav--prev" id="tknewsLbPrev" aria-label="Ảnh trước"><i class="fas fa-chevron-left"></i></button>
            <button class="tknews-lightbox__nav tknews-lightbox__nav--next" id="tknewsLbNext" aria-label="Ảnh tiếp"><i class="fas fa-chevron-right"></i></button>
            <div class="tknews-lightbox__caption" id="tknewsLbCaption"></div>
        </div>

        <script>
            $(document).ready(function() {
            (function($) {
                /* ── Dữ liệu ảnh ── */
                var galleryData = [
                    <?php foreach ($hinhanhtt as $i => $img) {
                        $imgSrc  = UPLOAD_NEWS_L . $img['photo'];
                        $altText = !empty($img['tenvi']) ? $img['tenvi'] : $row_detail['ten' . $lang];
                        echo '{ src: ' . json_encode($imgSrc) . ', caption: ' . json_encode($altText) . ' }';
                        if ($i < count($hinhanhtt) - 1) echo ',';
                        echo "\n        ";
                    } ?>
                ];

                var AUTOPLAY_MS = 3000; /* đổi ảnh mỗi 3 giây */
                var FADE_MS = 280; /* thời gian fade */

                var $stageImg = $('#tknewsStageImg');
                var $caption = $('#tknewsCaption');
                var $curIdx = $('#tknewsCurIdx');
                var $stage = $('#tknewsStage');
                var $progress = $('#tknewsProgress');
                var $thumbs = $('#tknewsThumbs');

                var currentIdx = 0;
                var autoTimer = null;
                var userPaused = false; /* tạm dừng khi người dùng hover */

                /* ĐỔI ẢNH STAGE */
                function switchTo(idx, fromAuto) {
                    idx = ((idx % galleryData.length) + galleryData.length) % galleryData.length;
                    if (!fromAuto && idx === currentIdx) return;

                    var d = galleryData[idx];

                    /* Fade out */
                    $stageImg.addClass('is-transitioning');
                    setTimeout(function() {
                        $stageImg.attr('src', d.src).attr('alt', d.caption);
                        $caption.text(d.caption);
                        $curIdx.text(idx + 1);
                        $stageImg.removeClass('is-transitioning');
                    }, FADE_MS);

                    /* Thumb active */
                    $thumbs.find('.tknews-thumb-item').removeClass('is-active');
                    $thumbs.find('.tknews-thumb-item[data-index="' + idx + '"]').addClass('is-active');

                    currentIdx = idx;

                    /* Reset progress bar */
                    resetProgress();
                }

                /* PROGRESS BAR (visual timer) */
                function resetProgress() {
                    /* reset ngay */
                    $progress.css({
                        transition: 'none',
                        width: '0%'
                    });
                    /* trigger reflow rồi animate */
                    $progress[0].offsetWidth; /* eslint-disable-line */
                    $progress.css({
                        transition: 'width ' + AUTOPLAY_MS + 'ms linear',
                        width: '100%'
                    });
                }

                /* AUTOPLAY */
                function startAutoplay() {
                    clearInterval(autoTimer);
                    resetProgress();
                    autoTimer = setInterval(function() {
                        if (!userPaused) {
                            switchTo(currentIdx + 1, true);
                        }
                    }, AUTOPLAY_MS);
                }

                /* Hover stage/thumbs → tạm dừng */
                $stage.add($thumbs)
                    .on('mouseenter', function() {
                        userPaused = true;
                        $progress.css('transition', 'none'); /* đóng băng thanh */
                    })
                    .on('mouseleave', function() {
                        userPaused = false;
                        /* restart từ đầu ảnh hiện tại */
                        startAutoplay();
                    });

                /* CLICK THUMBNAIL */
                $thumbs.on('click', '.tknews-thumb-item', function() {
                    var idx = parseInt($(this).data('index'), 10);
                    switchTo(idx, false);
                    startAutoplay(); /* restart timer */
                });

                /* CLICK STAGE → LIGHTBOX */
                $stage.on('click', function() {
                    openLightbox(currentIdx);
                });

                /* LIGHTBOX */
                var $lb = $('#tknewsLightbox');
                var $lbImg = $('#tknewsLbImg');
                var $lbCaption = $('#tknewsLbCaption');
                var lbIdx = 0;

                function openLightbox(idx) {
                    lbIdx = idx;
                    var d = galleryData[lbIdx];
                    $lbImg.attr('src', d.src).attr('alt', d.caption);
                    $lbCaption.text(d.caption + '  (' + (lbIdx + 1) + ' / ' + galleryData.length + ')');
                    $lb.addClass('is-open');
                    $('body').css('overflow', 'hidden');
                }

                function closeLightbox() {
                    $lb.removeClass('is-open');
                    $('body').css('overflow', '');
                    setTimeout(function() {
                        $lbImg.attr('src', '');
                    }, 300);
                }

                function lbGo(dir) {
                    lbIdx = (lbIdx + dir + galleryData.length) % galleryData.length;
                    var d = galleryData[lbIdx];
                    $lbImg.attr('src', d.src).attr('alt', d.caption);
                    $lbCaption.text(d.caption + '  (' + (lbIdx + 1) + ' / ' + galleryData.length + ')');
                }

                $('#tknewsLbClose').on('click', closeLightbox);
                $('#tknewsLbPrev').on('click', function() {
                    lbGo(-1);
                });
                $('#tknewsLbNext').on('click', function() {
                    lbGo(1);
                });
                $lb.on('click', function(e) {
                    if ($(e.target).is($lb)) closeLightbox();
                });

                $(document).on('keydown.tknewslb', function(e) {
                    if (!$lb.hasClass('is-open')) return;
                    if (e.key === 'Escape' || e.keyCode === 27) closeLightbox();
                    if (e.key === 'ArrowLeft' || e.keyCode === 37) lbGo(-1);
                    if (e.key === 'ArrowRight' || e.keyCode === 39) lbGo(1);
                });

                /* KHỞI ĐỘNG */
                startAutoplay();

            })(jQuery);
            }); // $(document).ready
        </script>

    <?php }  ?>
    
    <!-- SECTION 3: Related Articles -->
    <?php if (isset($news) && count($news) > 0) { ?>
        <section class="tknews-detail-related">
            <div class="fixwidth">
                <div class="tknews-detail-related__header">
                    <h2 class="tknews-detail-related__heading">Bài viết liên quan</h2>
                    <a class="tknews-detail-related__all" href="tin-tuc">
                        Xem tất cả <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="tknews-listing__grid">
                    <?php foreach ($news as $v) { ?>
                        <article class="tknews-card">
                            <a class="tknews-card__img" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
                                <img src="<?= THUMBS ?>/480x320x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                    onerror="this.src='<?= THUMBS ?>/480x320x1/assets/images/noimage.png';"
                                    alt="<?= $v['ten' . $lang] ?>" loading="lazy" />
                            </a>
                            <div class="tknews-card__body">
                                <h3 class="tknews-card__title">
                                    <a href="<?= $v[$sluglang] ?>"><?= $v['ten' . $lang] ?></a>
                                </h3>
                                <?php if (!empty($v['mota' . $lang])) { ?>
                                    <p class="tknews-card__desc"><?= $v['mota' . $lang] ?></p>
                                <?php } ?>
                                <div class="tknews-card__foot">
                                    <time class="tknews-card__date">
                                        <i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $v['ngaytao']) ?>
                                    </time>
                                    <a class="tknews-card__link" href="<?= $v[$sluglang] ?>">Xem thêm</a>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
    <?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>
    <script>
        document.querySelectorAll('.tk-sec').forEach(function(el) {
            el.classList.add('is-revealed');
        });
    </script>
<?php } ?>