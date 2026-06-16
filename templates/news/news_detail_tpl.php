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
                        <img src="<?= THUMBS ?>/800x600x1/<?= UPLOAD_NEWS_L . $row_detail['photo'] ?>"
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

    <!-- SHARE -->
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
                            <img width="20" height="20" src="../../assets/images/zalo1.png">
                            <span style="color:#fff;font-size:11px;font-weight:500;letter-spacing:.5px">Share</span>
                        </div>
                    </div>
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- BÀI VIẾT LIÊN QUAN -->
    <?php if (isset($news) && count($news) > 0) { ?>
        <section class="tk-nd-related">
            <div class="fixwidth">
                <h2 class="tk-nd-related__heading">Tính năng khác</h2>
                <div class="tk-news-grid">
                    <?php foreach ($news as $v) { ?>
                        <article class="tk-news-card">
                            <a class="tk-news-card__img" href="<?= $v[$sluglang] ?>">
                                <img src="<?= THUMBS ?>/480x320x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
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


<?php } else { ?>
    <!--      CHI TIẾT TIN TỨC / HƯỚNG DẪN — Article Layout      -->
    <section class="tk-nd-article-section">
        <div class="fixwidth">
            <div class="tk-nd-article-header">
                <time class="tk-nd-article-header__date"><i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $row_detail['ngaytao']) ?></time>
                <h1 class="tk-nd-article-header__title"><?= $row_detail['ten' . $lang] ?></h1>
            </div>
            <?php if (!empty($row_detail['photo'])) { ?>
                <div class="tk-nd-article-cover">
                    <img src="<?= THUMBS ?>/1200x630x1/<?= UPLOAD_NEWS_L . $row_detail['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>" />
                </div>
            <?php } ?>
            <?php if (!empty($row_detail['noidung' . $lang])) { ?>
                <div class="tk-nd-article" id="toc-content"><?= htmlspecialchars_decode($row_detail['noidung' . $lang]) ?></div>
            <?php } else { ?>
                <div class="alert alert-warning"><strong><?= noidungdangcapnhat ?></strong></div>
            <?php } ?>
            <div class="tk-nd-share__inner">
                <b><?= chiase ?>:</b>
                <div class="social-plugin w-clear">
                    <div class="website_share d-flex align-items-center pr-2">
                        <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>"
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
    </section>
    <?php if (isset($news) && count($news) > 0) { ?>
        <section class="tk-nd-related">
            <div class="fixwidth">
                <h2 class="tk-nd-related__heading"><?= baivietkhac ?></h2>
                <div class="tk-news-grid">
                    <?php foreach ($news as $v) { ?>
                        <article class="tk-news-card">
                            <a class="tk-news-card__img" href="<?= $v[$sluglang] ?>">
                                <img src="<?= THUMBS ?>/480x320x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                    onerror="this.src='<?= THUMBS ?>/480x320x1/assets/images/noimage.png';"
                                    alt="<?= $v['ten' . $lang] ?>" loading="lazy" />
                            </a>
                            <div class="tk-news-card__body">
                                <time class="tk-news-card__date"><i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $v['ngaytao']) ?></time>
                                <h3 class="tk-news-card__title"><a href="<?= $v[$sluglang] ?>"><?= $v['ten' . $lang] ?></a></h3>
                                <a class="tk-news-card__link" href="<?= $v[$sluglang] ?>">Đọc thêm <i class="fas fa-chevron-right"></i></a>
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