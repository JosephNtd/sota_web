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
<div class="tk-prodetail-hero">
    <div class="fixwidth">
        <div class="tk-prodetail-hero__inner">

            <!-- Cột trái: text + badges tải app -->
            <div class="tk-prodetail-hero__left">
                <?php if ($pd_tagline) { ?>
                    <p class="tk-prodetail-hero__tagline"><?= $pd_tagline ?></p>

                <?php } ?>


                <h1 class="tk-prodetail-hero__name"><?= $pd_name ?></h1>

                <?php if ($pd_subtitle) { ?>
                    <p class="tk-prodetail-hero__subtitle"><?= $pd_subtitle ?></p>
                <?php } ?>

                <p class="tk-prodetail-hero__dltext">Tải ứng dụng vào điện thoại</p>

                <div class="tk-prodetail-hero__badges">
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
            <div class="tk-prodetail-hero__right">
                <img src="<?= $pd_photo ?>"
                    onerror="this.src='assets/images/noimage.png';"
                    alt="<?= $pd_name ?>">
            </div>

        </div>
    </div>
</div>

<!-- SECTION 2 — LOGO + MÔ TẢ -->
<div class="tk-prodetail-info">
    <div class="fixwidth">
        <!-- Row 1: Tên sản phẩm (styled như logo) -->
        <h2 class="tk-prodetail-info__name"><?= $pd_name ?></h2>

        <!-- Row 2: Mô tả sản phẩm -->
        <?php if ($pd_noidung) { ?>
            <div class="tk-prodetail-info__desc text-align-center fs-2">
                <?= $pd_noidung ?>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Section 3: Heading HƯỚNG DẪN SỬ DỤNG -->
<?php if (isset($hdsd_article) && count($hdsd_article) > 0) { ?>
    <div class="tk-prodetail-hdsd-heading">
        <div class="fixwidth">
            <h2 class="tk-prodetail-hdsd-heading__title">HƯỚNG DẪN SỬ DỤNG</h2>
        </div>
    </div>
    <!-- Section 4: Cards HDSD -->
    <div class="tk-prodetail-hdsd-cards">
        <div class="fixwidth">
            <div class="tk-prodetail-hdsd-cards__grid">
                <?php foreach ($hdsd_article as $hdsd) { ?>
                    <a href="<?= $hdsd['tenkhongdauvi'] ?>"
                        class="tk-prodetail-hdsd-card"
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
    </div>
<?php } ?>

<!-- Section 5: Gallery ảnh liên quan đến sản phẩm -->

<?php if (isset($hinhanhsp) && count($hinhanhsp) > 0) { ?>
    <div class="tk-prodetail-gallery">
        <div class="fixwidth">
            <div class="tk-prodetail-gallery__grid">
                <?php foreach ($hinhanhsp as $gimg) { ?>
                    <div class="tk-prodetail-gallery__item">
                        <img src="<?= UPLOAD_PRODUCT_L . $gimg['photo'] ?>"
                            onerror="this.style.display='none';"
                            alt="<?= $pd_name ?>">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<!--  ỨNG DỤNG KHÁC (related products)  -->
<div class="tk-prodetail-related">
    <div class="fixwidth">
        <div class="title">Ứng dụng khác</div>
        <div class="content-main w-clear">
            <?php if (isset($product) && count($product) > 0) { ?>
                <div class="loadkhung_product1 mainkhung_product">
                    <?php foreach ($product as $k => $v) { ?>
                        <div class="boxproduct_item">
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
</div>