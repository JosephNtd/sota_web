<?php if ($type == 'gioi-thieu') { ?>
<!--      TRANG GIỚI THIỆU TITKUL (custom layout — 4 khối)      -->
<div class="tk-about">

    <!-- ▸ KHỐI 1 — LOGO + TÊN CÔNG TY -->
    <div class="tk-about-header">
        <?php if (!empty($logo['photo'])) { ?>
            <img src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="TitKul" class="tk-about-logo" />
        <?php } else { ?>
            <img src="assets/images/titkul/logo-titkul.png" alt="TitKul" class="tk-about-logo" />
        <?php } ?>
        <h2 class="tk-about-company">CÔNG TY CỔ PHẦN TITKUL</h2>
    </div>

    <!-- ▸ KHỐI 2 — GIỚI THIỆU (text trái + collage phải) -->
    <div class="tk-about-section tk-about-bg-intro">
        <div class="tk-about-grid">
            <div class="tk-about-text">
                <h3 class="tk-about-subtitle">GIỚI THIỆU</h3>
                <?php if (!empty($static['noidung' . $lang])) { ?>
                    <?= htmlspecialchars_decode($static['noidung' . $lang]) ?>
                <?php } else { ?>
                    <p>Công ty Cổ Phần Titkul được thành lập năm 2020, chức năng kinh doanh chính
                        là chuyên về nghiên cứu &amp; sản xuất phần mềm ứng dụng trí tuệ nhân tạo,
                        đáp ứng nhu cầu chuyển đổi số cho các cơ quan, ban ngành và đặc biệt phát triển
                        phần mềm hệ thống quản lý trường học thông minh phục vụ ngành Giáo dục có
                        kết nối vào cơ sở dữ liệu dùng chung của Sở GD &amp; ĐT Tp.HCM.</p>
                    <p>Titkul đã và đang phát triển phần mềm/ứng dụng phục vụ Quản lý trường học
                        từ cấp Mầm Non, Tiểu học đến THPT, với nhiều tính năng hữu ích, thông minh,
                        tự động, kết nối dữ liệu ngành giáo dục, phù hợp với định hướng chuyển đổi số
                        trường học trong tương lai.</p>
                    <p>Titkul cũng xây dựng hệ sinh thái với nhiều đối tác chiến lược cung cấp nhiều
                        phân hệ học tập, giảng dạy tăng cường phục vụ công cuộc chuyển đổi số
                        trường học và doanh nghiệp.</p>
                <?php } ?>
            </div>
            <div class="tk-about-right-col">
                <div class="tk-about-sub-img">
                    <img src="assets/images/titkul/hexagon.png" alt="Giới thiệu Titkul" />
                </div>
                <div class="tk-about-sub-txt">
                    <p class="tk-about-tagline-new">Năng động - Chuyên nghiệp - Thực tiễn</p>
                </div>
            </div>
        </div><!-- /.tk-about-grid -->
    </div><!-- /.tk-about-section (KHỐI 2) -->

    <!-- ▸ KHỐI 3 — NGÀNH NGHỀ KINH DOANH (text trái + phones phải) -->
    <div class="tk-about-section tk-about-business tk-about-bg-business">
        <div class="tk-about-grid">
            <div class="tk-about-text">
                <h3 class="tk-about-subtitle tk-about-subtitle--bold">NGÀNH NGHỀ KINH DOANH:</h3>
                <ul class="tk-about-list">
                    <li>Sản xuất phần mềm giáo dục, phần mềm quản lý trường học (TK Smart Vision, HDSchool, H2School)</li>
                    <li>Sản xuất ứng dụng quản lý doanh nghiệp, thương mại điện tử.</li>
                    <li>Tư vấn, xây dựng các giải pháp phần mềm</li>
                    <li>Thiết kế, sản xuất thiết bị IOT hỗ trợ giáo dục</li>
                </ul>
            </div>
            <div class="tk-about-right-col">
                <div class="tk-about-sub-img">
                    <img src="assets/images/titkul/nganh-nghe-phones.png" alt="HDSchool - H2School" />
                </div>
                <div class="tk-about-sub-txt">
                    <p class="tk-about-tagline-new">Giải pháp công nghệ toàn diện</p>
                </div>
            </div>
        </div><!-- /.tk-about-grid -->
    </div><!-- /.tk-about-section (KHỐI 3) -->

    <!-- ▸ KHỐI 4 — TẦM NHÌN / SỨ MỆNH / GIÁ TRỊ CỐT LÕI -->
    <section class="tk-sec tk-vmv tk-about-vmv">
        <h2 class="tk-sec-title">TẦM NHÌN - SỨ MỆNH - GIÁ TRỊ CỐT LÕI</h2>
        <div class="fixwidth">
            <div class="tk-vmv-row">
                <div class="tk-vmv-text">
                    <span class="tk-vmv-label">TẦM NHÌN</span>
                    <h3 class="tk-vmv-h3">CUNG CẤP PHẦN MỀM GIÁ TRỊ THỰC TIỄN CAO</h3>
                    <p>Titkul cung cấp sản phẩm phần mềm quản lý chuyển đổi số mang tính thực tiễn cao,
                        mang đến giá trị cao nhất cho khách hàng trường học, doanh nghiệp</p>
                </div>
                <div class="tk-vmv-img">
                    <img src="assets/images/titkul/tamnhin.jpg" alt="Tầm nhìn" onerror="this.style.opacity=0;" />
                </div>
            </div>
            <div class="tk-vmv-row tk-reverse">
                <div class="tk-vmv-text">
                    <span class="tk-vmv-label">SỨ MỆNH</span>
                    <h3 class="tk-vmv-h3">PHỤC VỤ CHUYỂN ĐỔI SỐ NGÀNH GIÁO DỤC</h3>
                    <p>Không ngừng đổi mới, sáng tạo, nhằm cung cấp sản phẩm phần mềm quản lý tốt nhất cho khách hàng,
                        phục vụ chuyển đổi số thành công.</p>
                </div>
                <div class="tk-vmv-img">
                    <img src="assets/images/titkul/sumenh.jpg" alt="Sứ mệnh" onerror="this.style.opacity=0;" />
                </div>
            </div>
            <div class="tk-vmv-row">
                <div class="tk-vmv-text">
                    <span class="tk-vmv-label">GIÁ TRỊ CỐT LÕI</span>
                    <h3 class="tk-vmv-h3">NĂNG ĐỘNG, CHUYÊN NGHIỆP, THỰC TIỄN CAO</h3>
                    <p>Năng động – Sáng Tạo – Đổi Mới – Thực tiễn cao</p>
                </div>
                <div class="tk-vmv-img">
                    <img src="assets/images/titkul/giatricotloi.jpg" alt="Giá trị cốt lõi" onerror="this.style.opacity=0;" />
                </div>
            </div>
        </div>
    </section><!-- /.tk-vmv (KHỐI 4) -->

    <!-- Chia sẻ -->
    <div class="fixwidth">
        <div class="share">
            <b><?= chiase ?>:</b>
            <div class="social-plugin w-clear">
                <div class="website_share d-flex align-items-center pr-2">
                    <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize=true>
                        <img width="20" height="20" src="assets/images/zalo1.png">
                        <span style="color: #fff; font-size: 11px; font-weight: 500; letter-spacing: 0.5px;">Share</span>
                    </div>
                </div>
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
    </div>

</div><!-- /.tk-about -->

<?php } elseif (!empty($static)) { ?>
<!--     TRANG TĨNH CHUNG (van-ban-phap-ly, v.v.) -->
<div class="tk-static fixwidth">

    <div class="row">
        <!-- Nội dung chính -->
        <div class="col-md-<?= (isset($static['photo']) && $static['photo'] != '') ? '8' : '12' ?>">
            <div class="content-main w-clear" style="line-height: 1.8; font-size: 15px; color: #444;">
                <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
            </div>
        </div>

        <!-- Ảnh đại diện sidebar -->
        <?php if (isset($static['photo']) && $static['photo'] != '') { ?>
        <div class="col-md-4">
            <div style="position: sticky; top: 20px;">
                <img src="<?= UPLOAD_NEWS_L . $static['photo'] ?>" alt="<?= $static['ten' . $lang] ?>"
                    onerror="this.parentElement.style.display='none';"
                    style="width: 100%; border-radius: 10px; box-shadow: 0 6px 20px rgba(0,0,0,.1);" />

                <!-- Thông tin liên hệ nhanh -->
                <?php if (isset($optsetting['hotline']) && $optsetting['hotline'] != '') { ?>
                <div style="margin-top: 20px; background: var(--color-main); border-radius: 10px; padding: 24px; color: #fff;">
                    <div style="font-size: 17px; font-weight: 600; margin-bottom: 12px;">
                        <i class="fas fa-headset" style="margin-right: 6px;"></i> Liên hệ tư vấn
                    </div>
                    <div style="margin-bottom: 8px;">
                        <i class="fas fa-phone-alt" style="width: 18px;"></i>
                        <a href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>" style="color: #fff; font-weight: 500;">
                            <?= $optsetting['hotline'] ?>
                        </a>
                    </div>
                    <?php if (isset($optsetting['email']) && $optsetting['email'] != '') { ?>
                    <div style="margin-bottom: 8px;">
                        <i class="fas fa-envelope" style="width: 18px;"></i>
                        <a href="mailto:<?= $optsetting['email'] ?>" style="color: #fff;"><?= $optsetting['email'] ?></a>
                    </div>
                    <?php } ?>
                    <?php if (isset($optsetting['diachi']) && $optsetting['diachi'] != '') { ?>
                    <div>
                        <i class="fas fa-map-marker-alt" style="width: 18px;"></i>
                        <span><?= $optsetting['diachi'] ?></span>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Chia sẻ -->
    <div class="share">
        <b><?= chiase ?>:</b>
        <div class="social-plugin w-clear">
            <div class="website_share d-flex align-items-center pr-2">
                <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize=true>
                    <img width="20" height="20" src="assets/images/zalo1.png">
                    <span style="color: #fff; font-size: 11px; font-weight: 500; letter-spacing: 0.5px;">Share</span>
                </div>
            </div>
            <div class="sharethis-inline-share-buttons"></div>
        </div>
    </div>

</div><!-- /.tk-static -->

<?php } else { ?>
<div class="fixwidth" style="padding: 60px 15px; text-align: center;">
    <div class="title"><span><?= (@$title_cat != '') ? $title_cat : 'Giới thiệu' ?></span></div>
    <p style="color: #999; font-size: 16px;">Nội dung đang được cập nhật...</p>
</div>
<?php } ?>