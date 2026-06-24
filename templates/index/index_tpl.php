<?php if (!defined('SOURCES')) die("Error"); ?>

<!-- SECTION 2 — PHẦN MỀM ỨNG DỤNG CHUYỂN ĐỔI SỐ TRƯỜNG HỌC -->
<section class="tk-sec tk-apps">
    <div class="fixwidth">
        <div class="tk-apps-header">
            <h3 class="tk-apps-heading tk-rv tk-rv--up">
                Phần mềm ứng dụng <br/>
                <span class="tk-apps-heading-accent">Chuyển đổi số trường học</span>
            </h3>
            <p class="tk-apps-desc tk-rv tk-rv--up tk-d1">
                Phần mềm ứng dụng của Titkul là nền tảng số hoá, giúp nhà trường dễ dàng quản lý điều hành
                công tác chuyên môn, kết nối và tương tác giữa Gia đình và nhà trường và Cơ quan quản lý ngành
                (Sở/Phòng giáo dục).
            </p>
            <p class="tk-apps-note tk-rv tk-rv--up tk-d2">
                Công ty sản xuất phần mềm ứng dụng Quản lý trường học, theo định hướng chuyển đổi số,
                có kết nối trục dữ liệu dùng chung của Ngành. Phần mềm của Titkul đã được Sở GD &amp; ĐT
                Tp.HCM chấp thuận và đã triển khai tại nhiều cấp trường.
            </p>
        </div>

        <?php if (isset($sanpham_nb) && count($sanpham_nb) > 0) : ?>
        <div class="tk-apps-grid">
            <?php foreach ($sanpham_nb as $spk => $sp) { if ($spk >= 2) break; ?>
            <a class="tk-app-card tk-rv tk-rv--up tk-d<?= $spk + 1 ?>" href="<?= $sp['tenkhongdauvi'] ?>">
                <div class="tk-app-card-blob <?= ($spk == 0) ? 'tk-app-card-blob--primary' : 'tk-app-card-blob--surface' ?>"></div>
                <div class="tk-app-card-body">
                    <div class="tk-app-card-top">
                        <h4 class="tk-app-card-title"><?= $sp['ten' . $lang] ?></h4>
                        <i class="fas fa-angle-double-right tk-app-card-arrow"></i>
                    </div>
                    <p class="tk-app-card-desc">
                        <?= !empty($sp['mota' . $lang]) ? strip_tags(htmlspecialchars_decode($sp['mota' . $lang])) : '' ?>
                    </p>
                    <!-- Ảnh sản phẩm thật -->
                    <div class="tk-app-card-preview">
                        <img src="<?= UPLOAD_PRODUCT_L . $sp['photo'] ?>"
                             alt="<?= $sp['ten' . $lang] ?>"
                             onerror="this.src='assets/images/noimage.png';"
                             loading="lazy" />
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- SECTION 2.5 — TÍNH NĂNG NỔI BẬT (3D Coverflow inline) -->
<?php if (isset($tinhnang) && count($tinhnang) > 0) { ?>
<section class="tk-sec tk-feat-section">
    <div class="tk-feat-ambient"></div>
    <div class="fixwidth">
        <div class="tk-feat-header tk-rv tk-rv--up">
            <p class="tk-feat-header__mono">— TÍNH NĂNG NỔI BẬT —</p>
            <h2 class="tk-feat-header__title">Giải pháp chuyển đổi số toàn diện cho trường học thông minh</h2>
        </div>

        <!-- Carousel wrapper -->
        <div class="tk-feat-carousel-wrap tk-rv tk-rv--up tk-d1">
            <!-- Coverflow container (xoay 3D liên tục, kéo-ném quán tính) -->
            <div class="tk-feat-coverflow" id="tkFeatCoverflow">
                <?php foreach ($tinhnang as $fk => $fv) {
                    if ($fk >= 6) break;
                    $fTitle = $fv['ten' . $lang];
                    $fDesc = isset($fv['mota' . $lang]) ? $fv['mota' . $lang] : '';
                    $fPhoto = $fv['photo'];
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
                                        onerror="this.style.opacity=0;" loading="lazy" />
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
                    <button class="tk-feat-dot" data-dot="<?= $di ?>" aria-label="Tính năng <?= $di + 1 ?>"></button>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!-- SECTION 3+4 — LỢI ÍCH + TẠI SAO CHỌN TITKUL (combined) -->
<section class="tk-sec tk-benefit2">
    <!-- Subtle gradient blobs -->
    <div class="tk-benefit2-bg">
        <div class="tk-benefit2-blob tk-benefit2-blob--navy"></div>
        <div class="tk-benefit2-blob tk-benefit2-blob--red"></div>
    </div>
    <div class="fixwidth tk-benefit2-content">
        <div class="tk-benefit2-header">
            <h3 class="tk-benefit2-heading tk-rv tk-rv--up">
                Tit<span class="tk-accent-red">Kul</span> mang lại lợi ích gì cho nhà trường?
            </h3>
            <p class="tk-benefit2-desc tk-rv tk-rv--up tk-d1">
                Phần mềm Quản Lý Trường Học của Titkul, cùng với hệ sinh thái ứng dụng tương tác học đường,
                giúp tăng cường hiệu quả quản lý trường học theo đúng định hướng chuyển đổi số của Ngành Giáo dục.
            </p>
        </div>

        <!-- Stats grid -->
        <div class="tk-stats2">
            <!-- Benefit Item -->
            <div class="tk-stat2 tk-rv tk-rv--scale tk-d1">
                <div class="tk-stat2-ico tk-stat2-ico--square">
                    <i class="fas fa-laptop"></i>
                </div>
                <h4 class="tk-stat2-title">Phù hợp chuyển đổi số</h4>
                <p class="tk-stat2-text">Của Ngành Giáo Dục</p>
            </div>
            <!-- Stat 75% -->
            <div class="tk-stat2 tk-stat2--bordered tk-rv tk-rv--scale tk-d2">
                <div class="tk-stat2-ico tk-stat2-ico--circle">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="tk-stat2-num" data-count="75" data-suffix="%">75%</div>
                <h4 class="tk-stat2-title">Tiết kiệm thời gian</h4>
                <p class="tk-stat2-text">Trong công tác quản lý</p>
            </div>
            <!-- Stat 85% -->
            <div class="tk-stat2 tk-rv tk-rv--scale tk-d3">
                <div class="tk-stat2-ico tk-stat2-ico--square">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="tk-stat2-num" data-count="85" data-suffix="%">85%</div>
                <h4 class="tk-stat2-title">Tăng hiệu quả</h4>
                <p class="tk-stat2-text">Quản lý trường học</p>
            </div>
        </div>

        <!-- Why TitKul floating card -->
        <div class="tk-why2 tk-rv tk-rv--right tk-d2">
            <div class="tk-why2-label">
                <h3 class="tk-why2-heading">
                    Tại sao chọn Tit<span class="tk-accent-red">Kul</span>?
                </h3>
            </div>
            <p class="tk-why2-text">
                Titkul có đủ chức năng chuyên môn cung cấp phần mềm quản lý trường học; được Sở GD-ĐT,
                Sở KH-CN công nhận, được kết nối dữ liệu dùng chung của Ngành. Đáp ứng đầy đủ các chức năng
                quản lý toàn diện của Nhà trường phù hợp theo định hướng chuyển đổi số của Ngành giáo dục.
            </p>
            <a class="tk-why2-link" href="van-ban-phap-ly">
                Xem Văn Bản Pháp Lý
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!--      SECTION 5 — TẦM NHÌN / SỨ MỆNH / GIÁ TRỊ CỐT LÕI      -->
<section class="tk-sec tk-vmv2">
    <div class="fixwidth">
        <div class="tk-vmv2-grid">
            <!-- Left Column: Vision + Mission (Stacked) -->
            <div class="tk-vmv2-left">
                <!-- Vision -->
                <div class="tk-vmv2-card tk-rv tk-rv--left">
                    <div class="tk-vmv2-card-img">
                        <span class="tk-vmv2-badge">Tầm Nhìn</span>
                        <img src="assets/images/titkul/tamnhin.jpg" alt="Tầm nhìn"
                             onerror="this.style.opacity=0;" loading="lazy" />
                        <div class="tk-vmv2-card-overlay"></div>
                    </div>
                    <div class="tk-vmv2-card-body">
                        <h4 class="tk-vmv2-card-title">
                            Cung Cấp Phần Mềm<br/>
                            <span class="tk-accent-red">Giá Trị Thực Tiễn Cao</span>
                        </h4>
                        <p class="tk-vmv2-card-text">
                            Titkul cung cấp sản phẩm phần mềm quản lý chuyển đổi số mang tính thực tiễn cao,
                            mang đến giá trị cao nhất cho khách hàng trường học, doanh nghiệp.
                        </p>
                    </div>
                </div>
                <!-- Mission -->
                <div class="tk-vmv2-card tk-rv tk-rv--left tk-d1">
                    <div class="tk-vmv2-card-img">
                        <span class="tk-vmv2-badge">Sứ Mệnh</span>
                        <img src="assets/images/titkul/sumenh.jpg" alt="Sứ mệnh"
                             onerror="this.style.opacity=0;" loading="lazy" />
                        <div class="tk-vmv2-card-overlay"></div>
                    </div>
                    <div class="tk-vmv2-card-body">
                        <h4 class="tk-vmv2-card-title">
                            Phục Vụ Chuyển Đổi Số<br/>
                            <span class="tk-accent-red">Ngành Giáo Dục</span>
                        </h4>
                        <p class="tk-vmv2-card-text">
                            Không ngừng đổi mới, sáng tạo, nhằm cung cấp sản phẩm phần mềm quản lý tốt nhất
                            cho khách hàng, phục vụ chuyển đổi số thành công.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Core Values (Featured) -->
            <div class="tk-vmv2-right tk-rv tk-rv--right tk-d2">
                <img class="tk-vmv2-right-bg" src="assets/images/titkul/giatricotloi.jpg"
                     alt="Giá trị cốt lõi" onerror="this.style.opacity=0;" loading="lazy" />
                <div class="tk-vmv2-right-overlay"></div>
                <div class="tk-vmv2-right-content">
                    <div class="tk-vmv2-right-top">
                        <span class="tk-vmv2-badge-glass">Giá Trị Cốt Lõi</span>
                    </div>
                    <h4 class="tk-vmv2-right-heading">
                        Năng Động <br/>
                        Chuyên Nghiệp <br/>
                        <span class="tk-vmv2-right-accent">Thực Tiễn Cao</span>
                    </h4>
                    <div class="tk-vmv2-chips">
                        <span class="tk-vmv2-chip"><i class="fas fa-bolt"></i> Sáng Tạo</span>
                        <span class="tk-vmv2-chip"><i class="fas fa-sync-alt"></i> Đổi Mới</span>
                        <span class="tk-vmv2-chip"><i class="fas fa-check-circle"></i> Thực Tiễn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 6 — PHẦN MỀM TITKUL DÀNH CHO AI (4 đối tượng)
     ============================================================ -->
<?php
$tk_fallback = array(
    array(
        'tenvi' => 'ĐỐI VỚI BAN GIÁM HIỆU',
        'tenkhongdauvi' => 'hdsd-danh-cho-ban-giam-hieu',
        'photo' => '',
        'ico' => 'assets/images/titkul/bgh.png',
        'motavi' => 'Quản lý tình hình hoạt động của Trường theo thời gian thực, nắm bắt dữ liệu, tương tác và báo cáo một cách nhanh chóng. Dễ dàng đánh giá và đưa ra các quyết định quản lý nhà Trường, tiết kiệm thời gian, công sức'
    ),
    array(
        'tenvi' => 'ĐỐI VỚI GIÁO VIÊN',
        'tenkhongdauvi' => 'hdsd-danh-cho-giao-vien',
        'photo' => '',
        'ico' => 'assets/images/titkul/gv.png',
        'motavi' => 'Hỗ trợ công tác giảng dạy, nghiệp vụ chuyên môn. Tương tác với Phụ huynh nhanh chóng. Giúp Giáo viên hiện đại hoá công tác giảng dạy, đồng thời hỗ trợ trong công tác kiểm tra và đánh giá năng lực một cách dễ dàng.'
    ),
    array(
        'tenvi' => 'ĐỐI VỚI PHỤ HUYNH HỌC SINH',
        'tenkhongdauvi' => 'hdsd-danh-cho-phhs',
        'photo' => '',
        'ico' => 'assets/images/titkul/phhs.png',
        'motavi' => 'Hỗ trợ nắm bắt lịch học, kết quả học tập của con (điểm số, điểm danh, …) nhanh chóng theo thời gian thực và tình hình sức khỏe học đường. Phụ huynh dễ dàng tương tác trực tiếp với nhà trường, giáo viên mọi lúc'
    ),
    array(
        'tenvi' => 'ĐỐI VỚI HỌC SINH',
        'tenkhongdauvi' => 'hdsd-danh-cho-hoc-sinh',
        'photo' => '',
        'ico' => 'assets/images/titkul/hs.png',
        'motavi' => 'Nắm bắt kết quả học tập và rèn luyện các kỹ năng công nghệ: Kỹ năng khoa học, công nghệ, kỹ thuật. Tương tác, thông tin với giáo viên, phụ huynh về tình hình học tập, sức khoẻ học đường'
    ),
);
$tk_doituong = (isset($huongdan) && count($huongdan) > 0) ? $huongdan : $tk_fallback;
?>
<section class="tk-sec tk-forwho">
    <div class="fixwidth">
        <h2 class="tk-sec-title tk-rv tk-rv--up">PHẦN MỀM TITKUL DÀNH CHO AI?</h2>
        <p class="tk-sec-desc tk-rv tk-rv--up tk-d1">
            Phần mềm Quản Lý Trường Học của Titkul dành cho Nhà trường và gia đình với nhiều tính năng số hoá
            hữu ích cho công tác quản lý, tương tác và báo cáo
        </p>
        <div class="tk-forwho-grid">
            <?php foreach ($tk_doituong as $fwk => $v) { ?>
                <div class="tk-forwho-card tk-rv tk-rv--up tk-d<?= ($fwk % 4) + 1 ?>">
                    <div class="tk-forwho-ico">
                        <img src="<?= !empty($v['photo']) ? UPLOAD_NEWS_L . $v['photo'] : (isset($v['ico']) ? $v['ico'] : '') ?>"
                            alt="<?= $v['ten' . $lang] ?>" onerror="this.style.display='none';" />
                    </div>
                    <h3 class="tk-forwho-name"><?= $v['ten' . $lang] ?></h3>
                    <p class="tk-forwho-desc"><?= $v['mota' . $lang] ?></p>
                    <a class="tk-forwho-link" href="<?= $v['tenkhongdauvi'] ?>">&raquo; XEM HƯỚNG DẪN SỬ DỤNG</a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- SECTION 11 — CASE STUDY -->
<?php if (!empty($casestudy)) : ?>
    <section class="tk-sec tk-casestudy">
        <div class="fixwidth">
            <div class="tk-cs-header">
                <span class="tk-cs-eyebrow tk-rv tk-rv--up">Thực tế triển khai</span>
                <h2 class="tk-sec-title tk-rv tk-rv--up tk-d1">Trường học đã làm được gì với TitKul?</h2>
                <p class="tk-sec-desc tk-rv tk-rv--up tk-d2">Kết quả thực tế từ các đơn vị đang sử dụng phần mềm</p>
            </div>

            <?php foreach ($casestudy as $idx => $cs) :
                $stats   = isset($casestudy_stats[$cs['id']]) ? $casestudy_stats[$cs['id']] : array();
                $flipped = ($idx % 2 !== 0) ? 'tk-cs-item--flip' : '';
                $badge_type = !empty($cs['link']) ? $cs['link'] : 'Trường học';
                $badge_cls  = (mb_strtolower($badge_type) === 'dự án triển khai') ? 'tk-cs-tag--deploy' : 'tk-cs-tag--school';
            ?>
                <div class="tk-cs-item <?= $flipped ?>">
                    <div class="tk-cs-img-wrap tk-rv <?= $flipped ? 'tk-rv--right' : 'tk-rv--left' ?>">
                        <?php if (!empty($cs['photo'])) : ?>
                            <img src="<?= UPLOAD_NEWS_L . $cs['photo'] ?>"
                                alt="<?= htmlspecialchars($cs['tenvi']) ?>" loading="lazy" />
                        <?php else : ?>
                            <div class="tk-cs-img-placeholder"><i class="fas fa-school"></i></div>
                        <?php endif; ?>
                    </div>
                    <div class="tk-cs-body tk-rv <?= $flipped ? 'tk-rv--left' : 'tk-rv--right' ?> tk-d1">
                        <span class="tk-cs-tag <?= $badge_cls ?>"><?= htmlspecialchars($badge_type) ?></span>
                        <h3 class="tk-cs-title"><?= htmlspecialchars($cs['tenvi']) ?></h3>
                        <?php if (!empty($cs['diachi'])) : ?>
                            <p class="tk-cs-org">
                                <i class="fas fa-map-marker-alt"></i>
                                <?= htmlspecialchars($cs['diachi']) ?>
                                <?= !empty($cs['nghenghiep']) ? ' · ' . htmlspecialchars($cs['nghenghiep']) : '' ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($cs['motavi'])) : ?>
                            <p class="tk-cs-desc"><?= htmlspecialchars(strip_tags($cs['motavi'])) ?></p>
                        <?php endif; ?>
                        <?php if (!empty($stats)) : ?>
                            <div class="tk-cs-stats">
                                <?php foreach ($stats as $st) : ?>
                                    <div class="tk-cs-stat">
                                        <span class="tk-cs-stat__num"><?= htmlspecialchars($st['link_video']) ?></span>
                                        <span class="tk-cs-stat__lbl"><?= htmlspecialchars($st['tenvi']) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        $quote = isset($casestudy_quote[$cs['id']]) ? $casestudy_quote[$cs['id']] : null;
                        if (!empty($quote) && !empty($quote['tenvi'])) :
                        ?>
                            <div class="tk-cs-quote">
                                <p class="tk-cs-quote__text">"<?= htmlspecialchars($quote['tenvi']) ?>"</p>
                                <?php if (!empty($quote['link_video'])) : ?>
                                    <p class="tk-cs-quote__author">— <?= htmlspecialchars($quote['link_video']) ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <a class="tk-cs-cta" href="<?= $cs['tenkhongdauvi'] ?>">
                            Xem chi tiết dự án <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

<!-- SECTION 8 — CÁC TRƯỜNG TIÊU BIỂU -->
<?php if (isset($doitac) && count($doitac) > 0) { ?>
    <section class="tk-sec tk-partners">
        <div class="fixwidth">
            <h2 class="tk-sec-title tk-rv tk-rv--up">CÁC TRƯỜNG TIÊU BIỂU</h2>
            <div id="doitac_slider" class="owl-carousel owl-theme tk-partner-slider tk-rv tk-rv--up tk-d1">
                <?php foreach ($doitac as $v) { ?>
                    <div class="tk-partner-item">
                        <?php if (!empty($v['link'])) { ?><a href="<?= $v['link'] ?>" target="_blank" rel="nofollow" title="<?= $v['ten' . $lang] ?>"><?php } ?>
                            <img onerror="this.src='assets/images/noimage.png';"
                                src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                        <?php if (!empty($v['link'])) { ?></a><?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- SECTION 9 — VIDEO GIỚI THIỆU & HƯỚNG DẪN SỬ DỤNG -->
<?php if (isset($video) && count($video) > 0) { ?>
    <section class="tk-sec tk-videos">
        <div class="fixwidth">
            <h2 class="tk-sec-title tk-rv tk-rv--up">VIDEO GIỚI THIỆU &amp; HƯỚNG DẪN SỬ DỤNG</h2>
            <div class="tk-video-grid">
                <?php foreach ($video as $k => $v) {
                    if ($k >= 4) break; ?>
                    <div class="tk-video-item tk-rv tk-rv--up tk-d<?= ($k % 4) + 1 ?>">
                        <a data-fancybox="video" class="tk-video-thumb" href="<?= $v['video'] ?>" title="<?= $v['ten' . $lang] ?>">
                            <img src="https://img.youtube.com/vi/<?= $func->getYoutube($v['video']) ?>/hqdefault.jpg" alt="<?= $v['ten' . $lang] ?>" />
                            <span class="tk-video-play"><i class="fas fa-play"></i></span>
                        </a>
                        <div class="tk-video-name"><?= $v['ten' . $lang] ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- SECTION 10 — TIN TỨC SỰ KIỆN (mini bento) -->
<?php if (isset($tintuc) && count($tintuc) > 0) { ?>
    <?php
    $tt_main  = $tintuc[0];
    $tt_sides = array_slice($tintuc, 1, 2);
    ?>
    <section class="tk-sec tk-news">
        <div class="fixwidth">
            <h2 class="tk-sec-title tk-rv tk-rv--up">TIN TỨC SỰ KIỆN</h2>
            <div class="tk-news-bento">
                <a class="tk-news-bento__main tk-rv tk-rv--left" href="<?= $tt_main['tenkhongdau' . $lang] ?>" title="<?= $tt_main['ten' . $lang] ?>">
                    <img class="tk-news-bento__main-img"
                        src="<?= UPLOAD_NEWS_L . $tt_main['photo'] ?>"
                        onerror="this.src='<?= THUMBS ?>/720x450x1/assets/images/noimage.png';"
                        alt="<?= $tt_main['ten' . $lang] ?>" loading="lazy" />
                    <div class="tk-news-bento__main-overlay"></div>
                    <div class="tk-news-bento__main-caption">
                        <span class="tk-news-bento__badge">Nổi bật</span>
                        <h3 class="tk-news-bento__main-title"><?= $tt_main['ten' . $lang] ?></h3>
                        <time class="tk-news-bento__main-date">
                            <i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $tt_main['ngaytao']) ?>
                        </time>
                    </div>
                </a>
                <?php if (count($tt_sides) > 0) { ?>
                    <div class="tk-news-bento__side">
                        <?php foreach ($tt_sides as $svk => $sv) { ?>
                            <a class="tk-news-bento__side-card tk-rv tk-rv--right tk-d<?= $svk + 1 ?>" href="<?= $sv['tenkhongdau' . $lang] ?>" title="<?= $sv['ten' . $lang] ?>">
                                <div class="tk-news-bento__side-img">
                                    <img src="<?= THUMBS ?>/400x260x1/<?= UPLOAD_NEWS_L . $sv['photo'] ?>"
                                        onerror="this.src='<?= THUMBS ?>/400x260x1/assets/images/noimage.png';"
                                        alt="<?= $sv['ten' . $lang] ?>" loading="lazy" />
                                </div>
                                <div class="tk-news-bento__side-body">
                                    <time class="tk-news-bento__side-date">
                                        <i class="far fa-calendar-alt"></i> <?= date("d/m/Y", $sv['ngaytao']) ?>
                                    </time>
                                    <h3 class="tk-news-bento__side-title"><?= $sv['ten' . $lang] ?></h3>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="tk-news-more">
                <a class="tk-btn tk-btn-outline" href="tin-tuc">Xem tất cả tin tức &raquo;</a>
            </div>
        </div>
    </section>
<?php } ?>

<!-- SECTION 7 — ĐĂNG KÝ TƯ VẤN  (#dangkytuvan) -->
<?php include TEMPLATE . LAYOUT . "form_dangky.php"; ?>

<!-- OWL INIT -->
<script>
    window.addEventListener('load', function() {
        if (window.jQuery && jQuery('#doitac_slider').length) {
            jQuery('#doitac_slider').owlCarousel({
                loop: true, margin: 24, nav: false, dots: false, autoplay: true,
                autoplayTimeout: 3000, autoplaySpeed: 3000, slideTransition: 'linear',
                responsive: { 0:{items:2}, 480:{items:3}, 768:{items:4}, 1024:{items:6} }
            });
        }
    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        var allSections = document.querySelectorAll('section.tk-sec');
        var sectionObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    sectionObserver.unobserve(entry.target); // entrance chỉ chạy 1 lần
                }
            });
        }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
        allSections.forEach(function(section) { sectionObserver.observe(section); });

        // Counter-up cho số liệu thống kê (chỉ chạy khi cuộn tới, 1 lần)
        var counters = document.querySelectorAll('.tk-stat2-num[data-count]');
        if (counters.length) {
            var countObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (!entry.isIntersecting) return;
                    var el = entry.target;
                    countObserver.unobserve(el);
                    var target = parseInt(el.getAttribute('data-count'), 10) || 0;
                    var suffix = el.getAttribute('data-suffix') || '';
                    var dur = 1200, start = null;
                    function step(ts) {
                        if (!start) start = ts;
                        var p = Math.min((ts - start) / dur, 1);
                        var eased = 1 - Math.pow(1 - p, 3); // easeOutCubic
                        el.textContent = Math.round(eased * target) + suffix;
                        if (p < 1) requestAnimationFrame(step);
                    }
                    requestAnimationFrame(step);
                });
            }, { threshold: 0.6 });
            counters.forEach(function(c) { countObserver.observe(c); });
        }

        // Entrance animation cho Case Study items (.tk-cs-item)
        var csItems = document.querySelectorAll('.tk-casestudy .tk-cs-item');
        if (csItems.length) {
            var csObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        csObserver.unobserve(entry.target);
                    }
                });
            }, { root: null, rootMargin: '-40px 0px -40px 0px', threshold: 0.1 });
            csItems.forEach(function(item) { csObserver.observe(item); });
        }
    });
</script>
<!-- Feature Carousel: 3D xoay liên tục + kéo/ném quán tính (inline section) -->
<script>
window.addEventListener('load', function() {
    var coverflow = document.getElementById('tkFeatCoverflow');
    if (!coverflow) return;

    var section = coverflow.closest('.tk-feat-section');
    var slides  = Array.prototype.slice.call(coverflow.querySelectorAll('.tk-feat-slide'));
    var dots    = section ? Array.prototype.slice.call(section.querySelectorAll('.tk-feat-dot')) : [];
    var total   = slides.length;
    if (total === 0) return;

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ----- Trạng thái physics -----
    var pos        = 0;     // vị trí liên tục (chỉ số slide ở giữa, dạng float)
    var vel        = 0;     // vận tốc quán tính (slide / giây)
    var AUTO_SPEED = 0.16;  // tốc độ tự xoay khi rảnh (slide / giây)
    var FRICTION   = 2.4;   // ma sát giảm tốc sau khi ném
    var MAX_VEL    = 9;     // giới hạn vận tốc ném
    var DRAG_PX    = 320;   // số px kéo tương ứng 1 slide
    var HOLD_MS    = 2000;  // thời gian dừng xoay sau khi click hex/dot/slide
    var lastTime   = null;
    var target     = null;  // mục tiêu ease tới (click hex/dot)
    var holdUntil  = 0;     // tạm dừng auto tới thời điểm này
    var visible    = true;

    var dragging = false, moved = false, wasDragged = false;
    var startX = 0, lastX = 0, lastMoveT = 0, dragVel = 0;

    function wrapClamp(v) { return ((v % total) + total) % total; }
    // khoảng cách vòng ngắn nhất (đưa offset về [-total/2, total/2])
    function wrap(d) { d = wrapClamp(d); if (d > total / 2) d -= total; return d; }

    // Chiều cao container = card cao nhất (mọi slide đều absolute)
    function syncHeight() {
        var max = 0;
        for (var i = 0; i < total; i++) {
            var card = slides[i].querySelector('.tk-feat-card');
            var h = card ? card.offsetHeight : slides[i].offsetHeight;
            if (h > max) max = h;
        }
        if (max > 0) coverflow.style.height = max + 'px';
    }

    function centerIndex() { return wrapClamp(Math.round(pos)); }

    function render() {
        var ci = centerIndex();
        for (var i = 0; i < total; i++) {
            var o  = wrap(i - pos);          // offset liên tục so với tâm
            var ao = Math.abs(o);
            var tx = o * 46;                 // dịch ngang (% bề rộng slide)
            var tz = -ao * 230;              // lùi sâu theo trục Z
            var ry = Math.max(-55, Math.min(55, -o * 32));
            var sc = Math.max(0.6, 1 - ao * 0.12);
            var op = ao > 2.6 ? 0 : Math.max(0, 1 - ao * 0.42);
            var s  = slides[i];
            s.style.transform = 'translate(-50%, -50%) translateX(' + tx + '%) translateZ(' + tz + 'px) rotateY(' + ry + 'deg) scale(' + sc + ')';
            s.style.opacity = op;
            s.style.zIndex = String(100 - Math.round(ao * 10));
            s.style.pointerEvents = op <= 0.03 ? 'none' : 'auto';
            s.classList.toggle('is-center', i === ci);
        }
        for (var j = 0; j < dots.length; j++) {
            dots[j].classList.toggle('is-active', j === ci);
        }
    }

    function tick(now) {
        if (lastTime === null) lastTime = now;
        var dt = Math.min(0.05, (now - lastTime) / 1000);
        lastTime = now;

        if (!dragging) {
            if (target !== null) {
                // ease mượt tới mục tiêu (click hex/dot)
                var d = target - pos;
                if (Math.abs(d) < 0.002) {
                    pos = target; target = null; holdUntil = now + HOLD_MS;
                } else {
                    pos += d * (1 - Math.exp(-dt * 6));
                }
                vel = 0;
            } else if (Math.abs(vel) > AUTO_SPEED) {
                // quán tính sau khi ném
                pos += vel * dt;
                vel *= Math.exp(-dt * FRICTION);
            } else if (visible && now >= holdUntil && !reduceMotion) {
                // tự xoay liên tục khi rảnh
                pos += AUTO_SPEED * dt; vel = 0;
            }
            // Chỉ wrap khi KHÔNG đang ease tới target (target có thể nằm ngoài [0,total)
            // nếu đường vòng ngắn nhất băng qua mốc 0 -> wrap sẽ làm xoay vô hạn)
            if (target === null) pos = wrapClamp(pos);
        }

        // Đang dừng ở 1 slide (ease tới mục tiêu hoặc trong thời gian giữ) -> cho bấm nút
        var focused = !dragging && (target !== null || now < holdUntil);
        coverflow.classList.toggle('is-focused', focused);

        render();
        requestAnimationFrame(tick);
    }

    // ----- Kéo / ném -----
    coverflow.addEventListener('pointerdown', function(e) {
        if (e.button && e.button !== 0) return; // chỉ xử lý chuột trái
        dragging = true; moved = false; wasDragged = false; target = null; vel = 0;
        startX = lastX = e.clientX; lastMoveT = performance.now(); dragVel = 0;
        coverflow.classList.add('is-dragging');
        // KHÔNG dùng setPointerCapture: nó khiến Chrome chuyển target của sự kiện
        // 'click' về coverflow -> thẻ <a> mất điều hướng khi bấm chuột trái.
        // pointermove/pointerup đã gắn ở window nên kéo-ném vẫn hoạt động bình thường.
    });
    window.addEventListener('pointermove', function(e) {
        if (!dragging) return;
        var dx = e.clientX - lastX;
        if (Math.abs(e.clientX - startX) > 5) moved = true;
        var dPos = -dx / DRAG_PX;
        pos = wrapClamp(pos + dPos);
        var t = performance.now(), dtm = (t - lastMoveT) / 1000;
        if (dtm > 0) dragVel = dPos / dtm; // slide / giây
        lastX = e.clientX; lastMoveT = t;
    });
    function endDrag(e) {
        if (!dragging) return;
        dragging = false;
        coverflow.classList.remove('is-dragging');
        if (moved) {
            // ném: vận tốc theo lực kéo (ném mạnh xoay xa, nhẹ xoay ít)
            vel = Math.max(-MAX_VEL, Math.min(MAX_VEL, dragVel));
            holdUntil = 0; wasDragged = true;
        }
        // tap không kéo: hex/dot có handler riêng; tap trúng link để <a> tự điều hướng
    }
    window.addEventListener('pointerup', endDrag);
    window.addEventListener('pointercancel', endDrag);
    coverflow.addEventListener('dragstart', function(e) { e.preventDefault(); });

    // ease tới slide idx theo hướng vòng ngắn nhất rồi giữ tâm
    function spinTo(idx) {
        if (idx < 0 || idx >= total) return;
        target = pos + wrap(idx - pos);
        vel = 0;
    }

    // Việc căn-giữa khi tap slide đã xử lý ở endDrag (pointerup).
    // Handler click ở đây chỉ để CHẶN điều hướng "ăn theo" ngay sau khi kéo-ném.
    for (var sN = 0; sN < total; sN++) {
        (function(i) {
            slides[i].addEventListener('click', function(e) {
                if (wasDragged) { wasDragged = false; e.preventDefault(); e.stopPropagation(); }
            });
        })(sN);
    }

    // Dots -> xoay tới
    for (var d = 0; d < dots.length; d++) {
        (function(i) { dots[i].addEventListener('click', function() { spinTo(i); }); })(d);
    }

    // ----- Hex cluster (Hero) -> cuộn xuống + xoay tới tính năng -----
    var featHexes = document.querySelectorAll('.tk-hex--feature[data-feat-index]');
    function goToFeature(idx) {
        if (isNaN(idx) || idx < 0 || idx >= total) return;
        spinTo(idx);
        if (!section) return;
        var header = document.querySelector('.tk-header-wrap.tk-sticky .tk-header') || document.querySelector('.tk-header');
        var offset = (header ? header.offsetHeight : 0) + 20;
        var topY = section.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: topY, behavior: 'smooth' });
    }
    for (var h = 0; h < featHexes.length; h++) {
        (function(hex) {
            var idx = parseInt(hex.getAttribute('data-feat-index'), 10);
            hex.addEventListener('click', function() { goToFeature(idx); });
            hex.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); goToFeature(idx); }
            });
        })(featHexes[h]);
    }

    // Tạm dừng auto khi section ngoài viewport (tiết kiệm + không lệch khi cuộn tới)
    if ('IntersectionObserver' in window && section) {
        new IntersectionObserver(function(entries) {
            visible = entries[0].isIntersecting;
        }, { threshold: 0.2 }).observe(section);
    }

    // ----- Khởi động -----
    syncHeight();
    window.addEventListener('resize', syncHeight);
    requestAnimationFrame(tick);
});
</script>