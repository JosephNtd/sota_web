<?php
/* HERO titkul: slider nền + overlay (heading + CTA + lục giác).
 * Chỉ render ở trang chủ (nơi $slider được nạp).
 * .owl-slideshow auto-init bởi assets/js/apps.js
 */
?>
<?php if (isset($slider) && count($slider)) { ?>
<div class="tk-hero">
    <!-- Slider nền -->
    <div class="tk-hero-bg">
        <div id="slider" class="owl-carousel owl-theme owl-slideshow">
            <?php foreach ($slider as $v) { ?>
            <div class="tk-hero-slide">
                <img onerror="this.style.display='none';"
                    src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" />
            </div>
            <?php } ?>  
        </div>
    </div>

    <!-- Overlay nội dung hero -->
    <div class="tk-hero-overlay">
        <div class="fixwidth tk-hero-inner">
            <div class="tk-hero-text">
                <h1 class="tk-hero-brand">TitKul</h1>
                <p class="tk-hero-sub">Ứng dụng chuyển đổi số Trường học<br>từ cấp Mầm non đến Phổ thông</p>
                <a class="tk-hero-cta" href="#dangkytuvan">Đăng Ký Tư Vấn Ngay</a>
                
            </div>
            <div class="tk-hero-graphic">
                <img src="assets/images/titkul/hexagon.png" alt="Titkul" onerror="this.style.display='none';" />
                 <p class="tk-hero-tagline">Năng động - Chuyên nghiệp - Thực tiễn</p>
            </div>
           
        </div>
    </div>
</div>
<?php } ?>