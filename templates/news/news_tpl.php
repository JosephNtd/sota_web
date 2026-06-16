<?php if (!defined('SOURCES')) die("Error"); ?>

<?php if ($type == 'tinh-nang') { ?>
<!-- TÍNH NĂNG NỔI BẬT — Full-bleed Zigzag -->
<section class="tk-feature-list">
    <?php if (isset($news) && count($news) > 0) { ?>
        <?php foreach ($news as $k => $v) { ?>
            <div class="tk-feat <?= ($k % 2 == 1) ? 'tk-feat--flip' : '' ?>">
                <div class="tk-feat__img">
                    <img src="<?= THUMBS ?>/800x600x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
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
document.querySelectorAll('.tk-sec').forEach(function(el){ el.classList.add('is-revealed'); });
</script>

<?php } else { ?>
<!-- ============================================================
     TIN TỨC / HƯỚNG DẪN — Blog Card Grid
     ============================================================ -->
<section class="tk-news-section">
    <div class="fixwidth">
        <?php if (isset($title_cat) && $title_cat != '') { ?>
            <h2 class="tk-sec-title"><?= $title_cat ?></h2>
        <?php } ?>

        <?php if (isset($news) && count($news) > 0) { ?>
            <div class="tk-news-grid">
                <?php foreach ($news as $k => $v) { ?>
                    <article class="tk-news-card">
                        <a class="tk-news-card__img" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
                            <img src="<?= THUMBS ?>/480x320x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                 onerror="this.src='<?= THUMBS ?>/480x320x1/assets/images/noimage.png';"
                                 alt="<?= $v['ten' . $lang] ?>"
                                 loading="lazy" />
                        </a>
                        <div class="tk-news-card__body">
                            <time class="tk-news-card__date">
                                <i class="far fa-calendar-alt"></i>
                                <?= date("d/m/Y", $v['ngaytao']) ?>
                            </time>
                            <h3 class="tk-news-card__title">
                                <a href="<?= $v[$sluglang] ?>"><?= $v['ten' . $lang] ?></a>
                            </h3>
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-news-card__desc"><?= $v['mota' . $lang] ?></p>
                            <?php } ?>
                            <a class="tk-news-card__link" href="<?= $v[$sluglang] ?>">
                                Đọc thêm <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </article>
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
            <div class="tk-content-page">
                <div class="meta-toc">
                    <div class="box-readmore">
                        <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
                    </div>
                </div>
                <div id="toc-content"><?= htmlspecialchars_decode($noidung_page) ?></div>
            </div>
        <?php } ?>
    </div>
</section>

<?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
<?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>

<script>
document.querySelectorAll('.tk-sec').forEach(function(el){ el.classList.add('is-revealed'); });
</script>

<?php } ?>