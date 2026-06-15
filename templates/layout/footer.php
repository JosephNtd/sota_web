<?php
/*
 * FOOTER (titkul) - 3 cột
 * Cột 1: logo + thông tin công ty ($footer static / $optsetting) + social ($social1)
 * Cột 2: TRUY CẬP NHANH
 * Cột 3: THEO DÕI (Zalo OA + Facebook + Youtube)
 * youtube đọc từ JSON options: $optsetting['youtube'] (thêm ở Phase 2)
 */
?>
<div class="tk-footer" id="background-footer">
    <div class="fixwidth">
        <div class="row">

            <!-- Cột 1: Thông tin công ty -->
            <div class="col-md-5 tk-foot-col">
                <a class="tk-foot-logo" href="" title="<?= $setting['ten' . $lang] ?>">
                    <img onerror="this.src='assets/images/noimage.png';"
                        src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="<?= $setting['ten' . $lang] ?>" />
                </a>
                <!-- <div class="tk-foot-company">
                    <?php if (!empty($footer['noidung' . $lang])) { ?>
                        <?= htmlspecialchars_decode($footer['noidung' . $lang]) ?>
                    <?php } else { ?>
                        <div class="tk-foot-name"><?= !empty($footer['ten' . $lang]) ? $footer['ten' . $lang] : $setting['ten' . $lang] ?></div>
                        <?php if (!empty($optsetting['diachi'])) { ?><p><i class="fas fa-map-marker-alt"></i> <?= $optsetting['diachi'] ?></p><?php } ?>
                        <?php if (!empty($optsetting['hotline'])) { ?><p><i class="fas fa-phone-alt"></i> <?= $optsetting['hotline'] ?><?= !empty($optsetting['dienthoai']) ? ' - ' . $optsetting['dienthoai'] : '' ?></p><?php } ?>
                        <?php if (!empty($optsetting['email'])) { ?><p><i class="fas fa-envelope"></i> <?= $optsetting['email'] ?></p><?php } ?>
                    <?php } ?>
                </div>
                <?php if (!empty($social1)) { ?>
                    <div class="tk-foot-social">
                        <?php foreach ($social1 as $v) { ?>
                            <a href="<?= $v['link'] ?>" target="_blank" rel="nofollow" title="<?= $v['ten' . $lang] ?>">
                                <img onerror="this.src='<?= THUMBS ?>/32x32x2/assets/images/noimage.png';"
                                    src="<?= THUMBS ?>/0x32x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?> -->
                <p>CÔNG TY CỔ PHẦN TITKUL </p>
                <p>572/14B Âu Cơ, Phường Bảy Hiền, Tp.HCM </p>
                <p>Tel: (028) 7778.7972 - 094.242.9989 </p>
                <p>Phòng KD: kinhdoanh@titkul.com </p>
                <p>CSKH: support@titkul.com</p>
            </div>

            <!-- Cột 2: Truy cập nhanh -->
            <div class="col-md-3 tk-foot-col">
                <div class="tk-foot-title">Truy Cập Nhanh</div>
                <ul class="tk-foot-links">
                    <li><a href="van-ban-phap-ly"><i class="fas fa-angle-right"></i> Văn Bản Pháp Lý</a></li>
                    <li><a href="HDSchool"><i class="fas fa-angle-right"></i> Ứng Dụng HDSchool</a></li>
                    <li><a href="H2School"><i class="fas fa-angle-right"></i> Ứng Dụng H2School</a></li>
                    <li><a href="huong-dan-su-dung"><i class="fas fa-angle-right"></i> Hướng Dẫn Sử Dụng</a></li>
                </ul>
            </div>

            <!-- Cột 3: Theo dõi -->
            <div class="col-md-4 tk-foot-col">
                <div class="tk-foot-title">Theo Dõi Chúng Tôi</div>
                <div class="tk-foot-follow">
                    <?php if (!empty($optsetting['zalo'])) { ?>
                        <a class="tk-follow-item" href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']) ?>" target="_blank" rel="nofollow" title="Zalo OA">
                            <i class="fas fa-comment-dots"></i> Zalo OA
                        </a>
                    <?php } ?>
                    <?php if (!empty($optsetting['fanpage'])) { ?>
                        <a class="tk-follow-item" href="<?= $optsetting['fanpage'] ?>" target="_blank" rel="nofollow" title="Facebook">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                    <?php } ?>
                    <?php if (!empty($optsetting['youtube'])) { ?>
                        <a class="tk-follow-item" href="<?= $optsetting['youtube'] ?>" target="_blank" rel="nofollow" title="Youtube">
                            <i class="fab fa-youtube"></i> Youtube
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tk-foot-bottom">
    <div class="fixwidth d-flex justify-content-between flex-wrap">
        <div>Copyright © <?= date('Y') ?> Công Ty Cổ Phần Titkul</div>
    </div>
</div>