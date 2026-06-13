<?php if (isset($product) && count($product) > 0) { ?>
    <div class="tk-product-list">
        <?php foreach ($product as $k => $v) { ?>
            <div class="tk-product-row <?= ($k % 2 == 1) ? 'tk-product-row--alt' : '' ?>">
                <div class="fixwidth">
                    <div class="tk-product-row__inner">
                        <div class="tk-product-row__text">
                            <h2 class="tk-product-row__name">
                                <a href="<?= $v['tenkhongdauvi'] ?>"><?= $v['ten' . $lang] ?></a>
                            </h2>
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-product-row__desc"><?= strip_tags(htmlspecialchars_decode($v['mota' . $lang])) ?></p>
                            <?php } ?>

                            <a class="tk-product-row__btn" href="<?= $v['tenkhongdauvi'] ?>">Xem chi tiết</a>
                        </div>
                        <div class="tk-product-row__img">
                            <img src="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>"
                                onerror="this.src='assets/images/noimage.png';"
                                alt="<?= $v['ten' . $lang] ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="fixwidth" style="padding: 40px 0;">
        <div class="alert alert-warning" role="alert">
            <strong><?= khongtimthayketqua ?></strong>
        </div>
    </div>
<?php } ?>
<?php if (!empty($noidung_page)) { ?>
    <div class="fixwidth">
        <div class="noidung_page_product" style="padding: 30px 0;">
            <?= htmlspecialchars_decode($noidung_page) ?>
        </div>
    </div>
<?php } ?>
<?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>
<?php include TEMPLATE . LAYOUT . "hotro_lienhe.php"; ?>