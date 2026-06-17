<?php if (!defined('SOURCES')) die("Error"); ?>

<?php if ($type == 'tinh-nang') { ?>
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
                            <span class="tk-feat__badge">
                                <i class="<?= !empty($v['icon']) ? $v['icon'] : 'fas fa-star' ?>"></i>
                                Tính năng nổi bật
                            </span>
                            <h2 class="tk-feat__title"><?= $v['ten' . $lang] ?></h2>
                            <div class="tk-feat__line"></div>
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-feat__desc"><?= $v['mota' . $lang] ?></p>
                            <?php } ?>
                            <a class="tk-feat__link" href="<?= $v[$sluglang] ?>">
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
        document.querySelectorAll('.tk-sec').forEach(function(el) {
            el.classList.add('is-revealed');
        });
    </script>

<?php } elseif ($type == 'huong-dan') { ?>
    <!-- HƯỚNG DẪN SỬ DỤNG — Glass Card Grid (Premium Scholastic) -->

    <!-- Header -->
    <section class="tk-hdsd-hero">
        <div class="fixwidth">
            <?php if (!empty($banner)) { ?>
                <div class="tk-hdsd-hero__banner">
                    <img src="<?= UPLOAD_SEOPAGE_L . $banner ?>"
                        onerror="this.style.display='none'"
                        alt="Hướng Dẫn Sử Dụng" loading="lazy" />
                </div>
            <?php } ?>
            <h1 class="tk-hdsd-hero__title">HƯỚNG DẪN SỬ DỤNG</h1>
            <p class="tk-hdsd-hero__sub">HDSchool &amp; H2School</p>
        </div>
    </section>

    <!-- Card Grid -->
    <section class="tk-hdsd-section">
        <div class="fixwidth">
            <?php if (isset($news) && count($news) > 0) { ?>
                <div class="tk-hdsd-grid">
                    <?php foreach ($news as $k => $v) { ?>
                        <a class="tk-hdsd-card" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
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
        document.querySelectorAll('.tk-sec').forEach(function(el) {
            el.classList.add('is-revealed');
        });
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
    <section class="tknews-header">
        <?php if (!empty($banner)) { ?>
            <img class="tknews-header__bg"
                 src="<?= UPLOAD_SEOPAGE_L . $banner ?>"
                 onerror="this.style.display='none'"
                 alt="Tin tức TitKul" loading="lazy" />
        <?php } ?>
        <div class="tknews-header__overlay"></div>
        <div class="fixwidth tknews-header__inner">
            <h1 class="tknews-header__title"><?= (isset($title_cat) && $title_cat != '') ? $title_cat : 'TIN TỨC' ?></h1>
            <?php if (!empty($mota_page)) { ?>
                <p class="tknews-header__sub"><?= $mota_page ?></p>
            <?php } else { ?>
                <p class="tknews-header__sub">Cập nhật những thông tin mới nhất về công nghệ giáo dục, chuyển đổi số và các hoạt động nổi bật của TitKul.</p>
            <?php } ?>
        </div>
    </section>

    <?php if (isset($news) && count($news) > 0) { ?>

        <!-- Hero Bento (trang 1) -->
        <?php if ($show_bento) { ?>
            <?php $main = $hero_items[0]; $side1 = $hero_items[1]; $side2 = $hero_items[2]; ?>
            <section class="tknews-bento">
                <div class="fixwidth">
                    <div class="tknews-bento__grid">
                        <!-- Main feature -->
                        <a class="tknews-bento__main" href="<?= $main[$sluglang] ?>" title="<?= $main['ten' . $lang] ?>">
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
                            <?php foreach (array($side1, $side2) as $sv) { ?>
                                <a class="tknews-bento__side-card" href="<?= $sv[$sluglang] ?>" title="<?= $sv['ten' . $lang] ?>">
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
            <section class="tknews-listing">
                <div class="fixwidth">
                    <?php if ($show_bento) { ?>
                        <div class="tknews-listing__header">
                            <h2 class="tknews-listing__heading">Tin Mới Nhất</h2>
                        </div>
                    <?php } ?>

                    <div class="tknews-listing__grid">
                        <?php foreach ($grid_items as $k => $v) { ?>
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
        document.querySelectorAll('.tk-sec').forEach(function(el) {
            el.classList.add('is-revealed');
        });
    </script>

<?php } ?>