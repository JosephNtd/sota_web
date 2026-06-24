<?php
/* SECTION 1 — HERO titkul (Premium Scholastic Modernism)
 * Render trên trang chủ. Grid pattern bg + hexagon cluster.
 * Click center hex → mở carousel tính năng nổi bật.
 */
if (!defined('SOURCES')) die("Error");
?>
<?php if ($source == 'index') { ?>
    <section class="tk-hero2">
        <div class="tk-hero2-container">
            <!-- Background layers -->
            <div class="tk-hero2-bg">
                <div class="tk-hero2-grid-pattern"></div>
                <div class="tk-hero2-blob"></div>
            </div>

            <!-- DEFAULT VIEW: Text + Hexagons -->
            <div class="tk-hero2-inner">
                <!-- Text Content -->
                <div class="tk-hero2-text">
                    <h1 class="tk-hero2-brand">
                        Tit<span class="tk-hero2-brand-accent">Kul</span>
                    </h1>
                    <h2 class="tk-hero2-heading">
                        Ứng dụng chuyển đổi số Trường học <br />
                        từ cấp Mầm non đến Phổ thông
                    </h2>
                    <p class="tk-hero2-tagline">Năng động - Chuyên nghiệp - Thực tiễn</p>
                    <a class="tk-hero2-cta" href="#dangkytuvan">
                        <i class="fas fa-hand-pointer"></i>
                        Đăng Ký Tư Vấn Ngay
                    </a>
                </div>

                <!-- Hexagon Feature Cluster -->
                <div class="tk-hex-cluster">
                    <!-- Center Hex — khối brand tĩnh -->
                    <div class="tk-hex tk-hex--center">
                        <div class="tk-hex-content tk-hex-content--glass">
                            <span class="tk-hex-brand">Tit<span style="color:#bb0021;">Kul</span></span>
                            <p class="tk-hex-caption">GIẢI PHÁP CHUYỂN ĐỔI SỐ TRƯỜNG HỌC THÔNG MINH</p>
                        </div>
                    </div>
                    <!-- Surrounding Hexes — lấy từ Tính năng nổi bật -->
                    <?php if (isset($tinhnang)) {
                        foreach ($tinhnang as $hk => $hv) {
                            if ($hk >= 6) break; ?>
                            <div class="tk-hex tk-hex--pos<?= $hk + 1 ?> tk-hex--feature" data-feat-index="<?= $hk ?>" role="button" tabindex="0" aria-label="Xem tính năng: <?= htmlspecialchars($hv['ten' . $lang]) ?>">
                                <div class="tk-hex-inner">
                                    <img src="<?= UPLOAD_NEWS_L . $hv['photo'] ?>" alt="<?= $hv['ten' . $lang] ?>"
                                        onerror="this.style.opacity=0;" />
                                    <div class="tk-hex-hover"><span><?= $hv['ten' . $lang] ?></span></div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>

        </div>
    </section>
<?php } ?>