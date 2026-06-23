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
            <div class="tk-hero2-inner" id="tkHeroDefault">
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
                    <!-- Center Hex — click to open carousel -->
                    <div class="tk-hex tk-hex--center" id="tkHexCenter">
                        <div class="tk-hex-content tk-hex-content--glass">
                            <span class="tk-hex-brand">Tit<span style="color:#bb0021;">Kul</span></span>
                            <p class="tk-hex-caption">GIẢI PHÁP CHUYỂN ĐỔI SỐ TRƯỜNG HỌC THÔNG MINH</p>
                        </div>
                    </div>
                    <!-- Surrounding Hexes — lấy từ Tính năng nổi bật -->
                    <?php if (isset($tinhnang)) {
                        foreach ($tinhnang as $hk => $hv) {
                            if ($hk >= 6) break; ?>
                            <div class="tk-hex tk-hex--pos<?= $hk + 1 ?>">
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

            <!-- CAROUSEL VIEW: Tính năng nổi bật 3D Coverflow -->
            <?php if (isset($tinhnang) && count($tinhnang) > 0) { ?>
            <div class="tk-feat-overlay" id="tkFeatOverlay">
                <!-- Ambient glow -->
                <div class="tk-feat-ambient"></div>

                <!-- Header -->
                <div class="tk-feat-header">
                    <p class="tk-feat-header__mono">— TÍNH NĂNG NỔI BẬT —</p>
                    <h2 class="tk-feat-header__title">Giải pháp chuyển đổi số toàn diện cho trường học thông minh</h2>
                </div>

                <!-- Carousel wrapper -->
                <div class="tk-feat-carousel-wrap">
                    <!-- Nav arrows -->
                    <button class="tk-feat-arrow tk-feat-arrow--prev" id="tkFeatPrev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="tk-feat-arrow tk-feat-arrow--next" id="tkFeatNext">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    <!-- Coverflow container -->
                    <div class="tk-feat-coverflow" id="tkFeatCoverflow">
                        <?php foreach ($tinhnang as $fk => $fv) {
                            if ($fk >= 6) break;
                            $fSlug = $fv['tenkhongdauvi'];
                            $fTitle = $fv['ten' . $lang];
                            $fDesc = isset($fv['mota' . $lang]) ? $fv['mota' . $lang] : '';
                            $fPhoto = $fv['photo'];
                            // $fLink = $fv['link'] ?? '';
                            // $fDetailUrl = $fLink ? $fLink : $config_base . 'tinh-nang/' . $fSlug;
                            $feat_href   = (!empty($fv['link'])) ? $fv['link'] : $fv[$sluglang];
                            $feat_target = (!empty($fv['link'])) ? ' target="_blank" rel="noopener noreferrer"' : '';
                            $fNum = str_pad($fk + 1, 2, '0', STR_PAD_LEFT);
                        ?>
                        <div class="tk-feat-slide" data-index="<?= $fk ?>">
                            <div class="tk-feat-card">
                                <!-- Left: Info -->
                                <div class="tk-feat-card__info">
                                    <div class="tk-feat-card__top">
                                        <span class="tk-feat-card__tag">TÍNH NĂNG #<?= $fNum ?></span>
                                        <h3 class="tk-feat-card__title"><?= htmlspecialchars($fTitle) ?></h3>
                                        <?php if ($fDesc) { ?>
                                        <p class="tk-feat-card__desc"><?= htmlspecialchars($fDesc) ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="tk-feat-card__bottom">
                                        <a href="<?= $feat_href ?>" <?= $feat_target ?> class="tk-feat-card__btn">
                                            <span>Xem Chi Tiết</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Right: Ticket Stub with Image -->
                                <div class="tk-feat-card__stub">
                                    <div class="tk-feat-card__img-wrap">
                                        <img src="<?= UPLOAD_NEWS_L . $fPhoto ?>" alt="<?= htmlspecialchars($fTitle) ?>"
                                            onerror="this.style.opacity=0;" />
                                        <div class="tk-feat-card__img-gradient"></div>
                                    </div>
                                    <div class="tk-feat-card__stub-footer">
                                        <span class="tk-feat-card__stub-label">SMART SCHOOL</span>
                                        <span class="tk-feat-card__stub-num">#<?= $fNum ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Pagination dots -->
                    <div class="tk-feat-dots" id="tkFeatDots">
                        <?php for ($di = 0; $di < min(count($tinhnang), 6); $di++) { ?>
                        <button class="tk-feat-dot" data-dot="<?= $di ?>"></button>
                        <?php } ?>
                    </div>
                </div>

                <!-- Back button -->
                <button class="tk-feat-back" id="tkFeatBack">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </button>
            </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>