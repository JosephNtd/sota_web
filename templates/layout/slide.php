<?php
/*
 * HERO SLIDER (titkul) - full width, KHÔNG sidebar danh mục.
 * Dùng class .owl-slideshow + .prev-slideshow/.next-slideshow
 * -> auto init bởi assets/js/apps.js
*/
?>
<?php if (isset($slider) && count($slider)) { ?>
<div class="tk-hero wrap_slider">
    <div class="slideshow tk-slideshow">
        <p class="control-slideshow prev-slideshow transition"><i class="fas fa-chevron-left"></i></p>
        <div id="slider" class="owl-carousel owl-theme owl-slideshow">
            <?php foreach ($slider as $v) { ?>
            <div class="item_slider tk-slide-item">
                <?php if (!empty($v['link'])) { ?><a href="<?= $v['link'] ?>" title="<?= $v['ten' . $lang] ?>"><?php } ?>
                <img onerror="this.src='<?= THUMBS ?>/1366x520x2/assets/images/noimage.png';"
                    src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>"
                    title="<?= $v['ten' . $lang] ?>" />
                <?php if (!empty($v['link'])) { ?></a><?php } ?>
            </div>
            <?php } ?>
        </div>
        <p class="control-slideshow next-slideshow transition"><i class="fas fa-chevron-right"></i></p>
    </div>
</div>
<?php } ?>