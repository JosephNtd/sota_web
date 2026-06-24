<?php if (!defined('SOURCES')) die("Error"); ?>

<?php if ($type == 'case-study') { ?>
    <!-- CASE STUDY LISTING -->

    <!-- Header -->
    <section class="tk-cs-hero tk-sec">
        <div class="fixwidth">
            <?php if (!empty($banner)) { ?>
                <div class="tk-cs-hero__banner tk-rv tk-rv--scale">
                    <img src="<?= UPLOAD_SEOPAGE_L . $banner ?>"
                        onerror="this.style.display='none'"
                        alt="Case Study" loading="lazy" />
                </div>
            <?php } ?>
            <div class="tk-cs-hero__content">
                <span class="tk-cs-eyebrow tk-rv tk-rv--up tk-d1">Thực Tế Triển Khai</span>
                <h1 class="tk-cs-hero__title tk-rv tk-rv--up tk-d2">Trường Học Đã Làm Được Gì Với TitKul?</h1>
                <p class="tk-cs-hero__desc tk-rv tk-rv--up tk-d3">Kết quả thực tế từ các đơn vị đang sử dụng phần mềm quản lý giáo dục tiên tiến nhất.</p>
            </div>
        </div>
    </section>

    <?php if (isset($news) && count($news) > 0) { ?>

        <!-- Case Study Cards -->
        <section class="tk-casestudy">
            <div class="fixwidth">
                <?php foreach ($news as $k => $v) { ?>
                    <div class="tk-cs-item <?= ($k % 2 == 1) ? 'tk-cs-item--flip' : '' ?>">
                        <!-- Image -->
                        <div class="tk-cs-img-wrap tk-rv tk-rv--scale tk-d1">
                            <img src="<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                onerror="this.src='<?= THUMBS ?>/480x400x1/assets/images/noimage.png';"
                                alt="<?= $v['ten' . $lang] ?>"
                                loading="lazy" />
                        </div>

                        <!-- Body -->
                        <div class="tk-cs-body">
                            <!-- Badge (product/category) -->
                            <?php if (!empty($v['link'])) { ?>
                                <span class="tk-cs-tag tk-cs-tag--school tk-rv tk-rv--up tk-d2"><?= $v['link'] ?></span>
                            <?php } ?>

                            <!-- Title -->
                            <h2 class="tk-cs-title tk-rv tk-rv--up tk-d3"><?= $v['ten' . $lang] ?></h2>

                            <!-- Location & Year -->
                            <?php if (!empty($v['diachi']) || !empty($v['nghenghiep'])) { ?>
                                <div class="tk-cs-org tk-rv tk-rv--up tk-d4">
                                    <?php if (!empty($v['diachi'])) { ?>
                                        <i class="fas fa-map-marker-alt"></i> <?= $v['diachi'] ?>
                                    <?php } ?>
                                    <?php if (!empty($v['nghenghiep'])) { ?>
                                        &nbsp;·&nbsp; Triển khai <?= $v['nghenghiep'] ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <!-- Description -->
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-cs-desc tk-rv tk-rv--up tk-d4"><?= $v['mota' . $lang] ?></p>
                            <?php } ?>

                            <!-- Stats -->
                            <?php if (isset($v['stats']) && count($v['stats']) > 0) { ?>
                                <div class="tk-cs-stats tk-rv tk-rv--up tk-d5">
                                    <?php foreach ($v['stats'] as $stat) { ?>
                                        <div class="tk-cs-stat">
                                            <span class="tk-cs-stat__num"><?= $stat['link_video'] ?></span>
                                            <span class="tk-cs-stat__lbl"><?= $stat['tenvi'] ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <!-- Quote -->
                            <?php if (isset($v['quote']) && $v['quote']) { ?>
                                <blockquote class="tk-cs-quote tk-rv tk-rv--up tk-d5">
                                    <p class="tk-cs-quote__text"><?= $v['quote']['tenvi'] ?></p>
                                    <?php if (!empty($v['quote']['link_video'])) { ?>
                                        <footer class="tk-cs-quote__author"><?= $v['quote']['link_video'] ?></footer>
                                    <?php } ?>
                                </blockquote>
                            <?php } ?>

                            <!-- Link -->
                            <a class="tk-cs-cta tk-rv tk-rv--up tk-d6" href="<?= $v[$sluglang] ?>">
                                Xem chi tiết dự án <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

        <?php if (isset($paging) && $paging != '') { ?>
            <div class="fixwidth">
                <div class="tk-paging"><?= $paging ?></div>
            </div>
        <?php } ?>

    <?php } else { ?>
        <section class="tk-casestudy">
            <div class="fixwidth" style="padding: 60px 0;">
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if (!empty($noidung_page)) { ?>
        <section class="tk-casestudy" style="padding-top:0;">
            <div class="fixwidth">
                <div class="tk-content-page"><?= htmlspecialchars_decode($noidung_page) ?></div>
            </div>
        </section>
    <?php } ?>

    <?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
    <?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>

    <script>
        (function () {
            var targets = document.querySelectorAll('section.tk-sec, .tk-casestudy .tk-cs-item');
            if (!('IntersectionObserver' in window)) {
                targets.forEach(function (el) { el.classList.add('is-revealed'); });
                return;
            }
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
            targets.forEach(function (el) { observer.observe(el); });
        })();
    </script>

<?php } elseif ($type == 'tinh-nang') { ?>
    <!-- TÍNH NĂNG NỔI BẬT — Full-bleed Zigzag -->
    <section class="tk-feature-list">
        <?php if (isset($news) && count($news) > 0) { ?>
            <?php foreach ($news as $k => $v) { ?>
                <div class="tk-feat <?= ($k % 2 == 1) ? 'tk-feat--flip' : '' ?>">
                    <div class="tk-feat__img">
                        <img src="<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                            onerror="this.src='<?= THUMBS ?>/800x600x1/assets/images/noimage.png';"
                            alt="<?= $v['ten' . $lang] ?>"
                            loading="lazy" />
                    </div>
                    <div class="tk-feat__body">
                        <div class="tk-feat__content">
                            <span class="tk-feat__badge tk-rv tk-rv--up tk-d1">
                                <i class="<?= !empty($v['icon']) ? $v['icon'] : 'fas fa-star' ?>"></i>
                                Tính năng nổi bật
                            </span>
                            <h2 class="tk-feat__title tk-rv tk-rv--up tk-d2"><?= $v['ten' . $lang] ?></h2>
                            <div class="tk-feat__line tk-rv tk-rv--line tk-d3"></div>
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-feat__desc tk-rv tk-rv--up tk-d3"><?= $v['mota' . $lang] ?></p>
                            <?php } ?>
                            <?php
                            $feat_href   = (!empty($v['link'])) ? $v['link'] : $v[$sluglang];
                            $feat_target = (!empty($v['link'])) ? ' target="_blank" rel="noopener noreferrer"' : '';
                            ?>
                            <a class="tk-feat__link tk-rv tk-rv--up tk-d4" href="<?= $feat_href ?>" <?= $feat_target ?>>
                                Xem thêm <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($paging) && $paging != '') { ?>
                <div class="fixwidth">
                    <div class="tk-paging"><?= $paging ?></div>
                </div>
            <?php } ?>

        <?php } else { ?>
            <div class="fixwidth" style="padding: 60px 0;">
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            </div>
        <?php } ?>
    </section>

    <?php if (!empty($noidung_page)) { ?>
        <section class="tk-content-section">
            <div class="fixwidth">
                <div class="tk-content-page"><?= htmlspecialchars_decode($noidung_page) ?></div>
            </div>
        </section>
    <?php } ?>

    <?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
    <?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var rows = document.querySelectorAll('.tk-feature-list .tk-feat, section.tk-sec');
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
            rows.forEach(function (row) { observer.observe(row); });
        });
    </script>

<?php } elseif ($type == 'huong-dan') { ?>
    <!-- HƯỚNG DẪN SỬ DỤNG — Glass Card Grid (Premium Scholastic) -->

    <!-- Header -->
    <section class="tk-hdsd-hero tk-sec">
        <div class="fixwidth">
            <?php if (!empty($banner)) { ?>
                <div class="tk-hdsd-hero__banner tk-rv tk-rv--scale">
                    <img src="<?= UPLOAD_SEOPAGE_L . $banner ?>"
                        onerror="this.style.display='none'"
                        alt="Hướng Dẫn Sử Dụng" loading="lazy" />
                </div>
            <?php } ?>
            <h1 class="tk-hdsd-hero__title tk-rv tk-rv--up tk-d1">HƯỚNG DẪN SỬ DỤNG</h1>
            <p class="tk-hdsd-hero__sub tk-rv tk-rv--up tk-d2">HDSchool &amp; H2School</p>
        </div>
    </section>

    <!-- Card Grid -->
    <section class="tk-hdsd-section tk-sec">
        <div class="fixwidth">
            <?php if (isset($news) && count($news) > 0) { ?>
                <div class="tk-hdsd-grid">
                    <?php foreach ($news as $k => $v) { ?>
                        <a class="tk-hdsd-card tk-rv tk-rv--up tk-d<?= min(($k % 6) + 1, 6) ?>" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
                            <div class="tk-hdsd-card__icon">
                                <?php if (!empty($v['photo'])) { ?>
                                    <img src="<?= THUMBS ?>/150x150x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';"
                                        alt="<?= $v['ten' . $lang] ?>" />
                                    <i class="fas fa-book" style="display:none"></i>
                                <?php } else { ?>
                                    <i class="<?= !empty($v['icon']) ? $v['icon'] : 'fas fa-book' ?>"></i>
                                <?php } ?>
                            </div>
                            <h3 class="tk-hdsd-card__title"><?= $v['ten' . $lang] ?></h3>
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-hdsd-card__desc"><?= $v['mota' . $lang] ?></p>
                            <?php } ?>
                            <span class="tk-hdsd-card__link">
                                Xem Hướng Dẫn <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>
                    <?php } ?>
                </div>

                <?php if (isset($paging) && $paging != '') { ?>
                    <div class="tk-paging"><?= $paging ?></div>
                <?php } ?>

            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>

            <?php if (!empty($noidung_page)) { ?>
                <div class="tk-content-page"><?= htmlspecialchars_decode($noidung_page) ?></div>
            <?php } ?>
        </div>
    </section>

    <?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
    <?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>

    <script>
        (function () {
            var sections = document.querySelectorAll('section.tk-sec');
            if (!('IntersectionObserver' in window)) {
                sections.forEach(function (el) { el.classList.add('is-revealed'); });
                return;
            }
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
            sections.forEach(function (el) { observer.observe(el); });
        })();
    </script>

<?php } else { ?>
    <?php
    /* Tách hero (trang 1, ≥ 3 bài) vs grid */
    $is_page1   = (!isset($get_page) || $get_page <= 1);
    $show_bento = ($is_page1 && isset($news) && count($news) >= 3);
    $hero_items = $show_bento ? array_slice($news, 0, 3) : array();
    $grid_items = $show_bento ? array_slice($news, 3) : (isset($news) ? $news : array());
    ?>

    <!-- Page Header -->
    <section class="tknews-header tk-sec">
        <?php if (!empty($banner)) { ?>
            <img class="tknews-header__bg"
                src="<?= UPLOAD_SEOPAGE_L . $banner ?>"
                onerror="this.style.display='none'"
                alt="Tin tức TitKul" loading="lazy" />
        <?php } ?>
        <div class="tknews-header__overlay"></div>
        <div class="fixwidth tknews-header__inner">
            <h1 class="tknews-header__title tk-rv tk-rv--up tk-d1"><?= (isset($title_cat) && $title_cat != '') ? $title_cat : 'TIN TỨC' ?></h1>
            <?php if (!empty($mota_page)) { ?>
                <p class="tknews-header__sub tk-rv tk-rv--up tk-d2"><?= $mota_page ?></p>
            <?php } else { ?>
                <p class="tknews-header__sub tk-rv tk-rv--up tk-d2">Cập nhật những thông tin mới nhất về công nghệ giáo dục, chuyển đổi số và các hoạt động nổi bật của TitKul.</p>
            <?php } ?>
        </div>
    </section>

    <?php if (isset($news) && count($news) > 0) { ?>

        <!-- Hero Bento (trang 1) -->
        <?php if ($show_bento) { ?>
            <?php $main = $hero_items[0];
            $side1 = $hero_items[1];
            $side2 = $hero_items[2]; ?>
            <section class="tknews-bento tk-sec">
                <div class="fixwidth">
                    <div class="tknews-bento__grid">
                        <!-- Main feature -->
                        <a class="tknews-bento__main tk-rv tk-rv--up tk-d1" href="<?= $main[$sluglang] ?>" title="<?= $main['ten' . $lang] ?>">
                            <div class="tknews-bento__img">
                                <img src="<?= UPLOAD_NEWS_L . $main['photo'] ?>"
                                    onerror="this.src='<?= THUMBS ?>/960x540x1/assets/images/noimage.png';"
                                    alt="<?= $main['ten' . $lang] ?>" loading="lazy" />
                                <div class="tknews-bento__gradient"></div>
                            </div>
                            <div class="tknews-bento__caption">
                                <span class="tknews-bento__badge">Nổi bật</span>
                                <h2 class="tknews-bento__title"><?= $main['ten' . $lang] ?></h2>
                                <div class="tknews-bento__meta">
                                    <span><i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $main['ngaytao']) ?></span>
                                    <span class="tknews-bento__more">Xem chi tiết <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>

                        <!-- Side features -->
                        <div class="tknews-bento__side">
                            <?php foreach (array($side1, $side2) as $si => $sv) { ?>
                                <a class="tknews-bento__side-card tk-rv tk-rv--up tk-d<?= $si + 2 ?>" href="<?= $sv[$sluglang] ?>" title="<?= $sv['ten' . $lang] ?>">
                                    <div class="tknews-bento__side-img">
                                        <img src="<?= THUMBS ?>/480x320x1/<?= UPLOAD_NEWS_L . $sv['photo'] ?>"
                                            onerror="this.src='<?= THUMBS ?>/480x320x1/assets/images/noimage.png';"
                                            alt="<?= $sv['ten' . $lang] ?>" loading="lazy" />
                                    </div>
                                    <div class="tknews-bento__side-body">
                                        <time class="tknews-bento__side-date">
                                            <i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $sv['ngaytao']) ?>
                                        </time>
                                        <h3 class="tknews-bento__side-title"><?= $sv['ten' . $lang] ?></h3>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <!-- News Grid  -->
        <?php if (count($grid_items) > 0) { ?>
            <section class="tknews-listing tk-sec">
                <div class="fixwidth">
                    <?php if ($show_bento) { ?>
                        <div class="tknews-listing__header">
                            <h2 class="tknews-listing__heading tk-rv tk-rv--up tk-d1">Tin Mới Nhất</h2>
                        </div>
                    <?php } ?>

                    <div class="tknews-listing__grid">
                        <?php foreach ($grid_items as $k => $v) { ?>
                            <article class="tknews-card tk-rv tk-rv--up tk-d<?= min(($k % 6) + 1, 6) ?>">
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

        <?php if (isset($paging) && $paging != '') { ?>
            <div class="fixwidth">
                <div class="tk-paging"><?= $paging ?></div>
            </div>
        <?php } ?>

    <?php } else { ?>
        <section class="tknews-listing">
            <div class="fixwidth" style="padding: 60px 0;">
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if (!empty($noidung_page)) { ?>
        <section class="tknews-content">
            <div class="fixwidth">
                <div class="tk-content-page"><?= htmlspecialchars_decode($noidung_page) ?></div>
            </div>
        </section>
    <?php } ?>


    <script>
        (function () {
            var sections = document.querySelectorAll('section.tk-sec');
            if (!('IntersectionObserver' in window)) {
                sections.forEach(function (el) { el.classList.add('is-revealed'); });
                return;
            }
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
            sections.forEach(function (el) { observer.observe(el); });
        })();
    </script>

<?php } ?>