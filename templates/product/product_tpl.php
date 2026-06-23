<?php if (!defined('SOURCES')) die("Error"); ?>

<!-- HERO — Trang listing sản phẩm -->
<section class="tk-product-hero tk-sec">
    <div class="fixwidth">
        <span class="tk-product-hero__eyebrow tk-rv tk-rv--up tk-d1">Hệ Sinh Thái Phần Mềm</span>
        <h1 class="tk-product-hero__title tk-rv tk-rv--up tk-d2">
            Phần Mềm Quản Lý<br>
            <span class="tk-product-hero__accent">Giáo Dục Tiên Tiến</span>
        </h1>
        <p class="tk-product-hero__desc tk-rv tk-rv--up tk-d3">Giải pháp chuyển đổi số toàn diện cho trường học — từ quản lý hành chính đến kết nối phụ huynh, tất cả trong một hệ sinh thái đồng bộ.</p>
        <div class="tk-product-hero__badges tk-rv tk-rv--up tk-d4">
            <span class="tk-product-hero__badge"><i class="fas fa-shield-alt"></i> Bảo mật dữ liệu</span>
            <span class="tk-product-hero__badge"><i class="fas fa-sync-alt"></i> Cập nhật liên tục</span>
            <span class="tk-product-hero__badge"><i class="fas fa-headset"></i> Hỗ trợ 24/7</span>
        </div>
    </div>
</section>

<?php if (isset($product) && count($product) > 0) { ?>

    <div class="tk-product-list">
        <?php foreach ($product as $k => $v) { ?>
            <div class="tk-product-row <?= ($k % 2 == 1) ? 'tk-product-row--alt' : '' ?>">
                <div class="fixwidth">
                    <div class="tk-product-row__inner">

                        <div class="tk-product-row__text tk-rv <?= ($k % 2 == 1) ? 'tk-rv--right' : 'tk-rv--left' ?> tk-d1">
                            <!-- <span class="tk-product-row__num"><?= str_pad($k + 1, 2, '0', STR_PAD_LEFT) ?></span> -->
                            <h2 class="tk-product-row__name">
                                <a href="<?= $v['tenkhongdauvi'] ?>"><?= $v['ten' . $lang] ?></a>
                            </h2>
                            <?php if (!empty($v['mota' . $lang])) { ?>
                                <p class="tk-product-row__desc"><?= strip_tags(htmlspecialchars_decode($v['mota' . $lang])) ?></p>
                            <?php } ?>
                            <a class="tk-product-row__btn" href="<?= $v['tenkhongdauvi'] ?>">
                                Khám phá ngay <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                        <div class="tk-product-row__img tk-rv <?= ($k % 2 == 1) ? 'tk-rv--left' : 'tk-rv--right' ?> tk-d2">
                            <img src="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>"
                                onerror="this.src='assets/images/noimage.png';"
                                alt="<?= $v['ten' . $lang] ?>"
                                loading="lazy">
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php } else { ?>
    <div class="fixwidth" style="padding: 60px 0;">
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

<script>
(function () {
    var targets = document.querySelectorAll('section.tk-sec, .tk-product-list .tk-product-row');
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
