<!-- 
 Bản cũ: 
    <div class="breadCrumbs"><div class="wrap-content"><?=$breadcrumbs?></div></div> 
 -->

<?php
/* 
 * BANNER + BREADCRUMB trang con (titkul)
 * $banner   : ảnh banner (sources/* set từ #_seopage.banner)
 * $breadcrumbs : chuỗi <ol class="breadcrumb"> dựng sẵn
 * H1: $seo->getSeo('h1') (fallback $title_crumb)
 *  */
$tk_h1 = $seo->getSeo('h1');
if (empty($tk_h1)) $tk_h1 = (isset($title_crumb)) ? $title_crumb : '';
?>
<div class="tk-pagebanner<?= (!empty($banner)) ? ' has-img' : '' ?>"
    <?php if (!empty($banner)) { ?>style="background-image:url('<?= UPLOAD_SEOPAGE_L . $banner ?>');"<?php } ?>>
    <div class="tk-pagebanner-overlay">
        <div class="fixwidth">
            <?php if (!empty($tk_h1)) { ?><h1 class="tk-pagebanner-title"><?= $tk_h1 ?></h1><?php } ?>
            <div class="breadCrumbs tk-breadcrumb"><?= isset($breadcrumbs) ? $breadcrumbs : '' ?></div>
        </div>
    </div>
</div>