<?php if(!empty($static)) { ?>

<!-- Banner trang -->
<?php if(isset($banner) && $banner != '') { ?>
<div style="position: relative; overflow: hidden; max-height: 320px; width: 100vw; margin-left: calc(-50vw + 50%);">
    <img src="<?= UPLOAD_PHOTO_L . $banner ?>" alt="<?= $static['ten' . $lang] ?>" 
        style="width: 100%; object-fit: cover; display: block;" />
    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,.55), transparent); display: flex; align-items: flex-end;">
        <div class="fixwidth" style="padding: 30px 15px;">
            <h1 style="color: #fff; font-size: 32px; font-weight: 700; margin: 0; text-shadow: 0 2px 8px rgba(0,0,0,.3);">
                <?= $static['ten' . $lang] ?>
            </h1>
        </div>
    </div>
</div>
<?php } ?>

<div class="fixwidth" style="padding: 40px 15px 50px;">

    <!-- Tiêu đề (nếu không có banner) -->
    <?php if(!isset($banner) || $banner == '') { ?>
    <div class="title"><span><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></span></div>
    <?php } ?>

    <div class="row">
        <!-- Nội dung chính -->
        <div class="col-md-<?= (isset($static['photo']) && $static['photo'] != '') ? '8' : '12' ?>">
            <div class="content-main w-clear" style="line-height: 1.8; font-size: 15px; color: #444;">
                <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
            </div>
        </div>

        <!-- Ảnh đại diện sidebar -->
        <?php if(isset($static['photo']) && $static['photo'] != '') { ?>
        <div class="col-md-4">
            <div style="position: sticky; top: 20px;">
                <img src="<?= UPLOAD_NEWS_L . $static['photo'] ?>" alt="<?= $static['ten' . $lang] ?>" 
                    onerror="this.parentElement.style.display='none';"
                    style="width: 100%; border-radius: 10px; box-shadow: 0 6px 20px rgba(0,0,0,.1);" />

                <!-- Thông tin liên hệ nhanh -->
                <?php if(isset($optsetting['hotline']) && $optsetting['hotline'] != '') { ?>
                <div style="margin-top: 20px; background: var(--color-main); border-radius: 10px; padding: 24px; color: #fff;">
                    <div style="font-size: 17px; font-weight: 600; margin-bottom: 12px;">
                        <i class="fas fa-headset" style="margin-right: 6px;"></i> Liên hệ tư vấn
                    </div>
                    <div style="margin-bottom: 8px;">
                        <i class="fas fa-phone-alt" style="width: 18px;"></i>
                        <a href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>" style="color: #fff; font-weight: 500;">
                            <?= $optsetting['hotline'] ?>
                        </a>
                    </div>
                    <?php if(isset($optsetting['email']) && $optsetting['email'] != '') { ?>
                    <div style="margin-bottom: 8px;">
                        <i class="fas fa-envelope" style="width: 18px;"></i>
                        <a href="mailto:<?= $optsetting['email'] ?>" style="color: #fff;"><?= $optsetting['email'] ?></a>
                    </div>
                    <?php } ?>
                    <?php if(isset($optsetting['diachi']) && $optsetting['diachi'] != '') { ?>
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
                    <img width="20" height="20" src="../../assets/images/zalo1.png">
                    <span style="color: #fff; font-size: 11px; font-weight: 500; letter-spacing: 0.5px;">Share</span>
                </div>
            </div>
            <div class="sharethis-inline-share-buttons"></div>
        </div>
    </div>

</div>

<?php } else { ?>
<div class="fixwidth" style="padding: 60px 15px; text-align: center;">
    <div class="title"><span><?= (@$title_cat != '') ? $title_cat : 'Giới thiệu' ?></span></div>
    <p style="color: #999; font-size: 16px;">Nội dung đang được cập nhật...</p>
</div>
<?php } ?>