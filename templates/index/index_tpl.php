<!--  GIỚI THIỆU  -->
<?php if(isset($gioithieu) && $gioithieu) { ?>
<section class="section wow fadeInUp" id="background-header">
    <div class="fixwidth" style="padding: 60px 0;">
        <div class="row align-items-center">
            <div class="col-md-5 gt_left">
                <div class="gt_img" style="border-radius: 12px; overflow: hidden; box-shadow: 0 8px 30px rgba(0,0,0,.12);">
                    <img onerror="this.src='<?= THUMBS ?>/500x400x1/assets/images/noimage.png';"
                        src="<?= UPLOAD_NEWS_L . $gioithieu['photo'] ?>" alt="<?= $gioithieu['ten' . $lang] ?>" 
                        style="width:100%; display:block;" />
                </div>
            </div>
            <div class="col-md-7 gt_right">
                <div class="gt_title"><?= $gioithieu['ten' . $lang] ?></div>
                <div class="gt_noidung"><?= html_entity_decode($gioithieu['mota' . $lang]) ?></div>
                <a href="gioi-thieu" class="xemgt" style="border-radius: 4px; display: inline-block; margin-top: 20px;">
                    <i class="fas fa-arrow-right" style="margin-left: 6px;"></i> Xem thêm
                </a>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!--  DỊCH VỤ NỔI BẬT  -->
<?php if(isset($dichvu) && count($dichvu) > 0) { ?>
<section class="section wow fadeInUp" style="background: #f8f9fa; padding: 60px 0;">
    <div class="fixwidth">
        <div class="title"><span>Dịch vụ của chúng tôi</span></div>
        <div class="row">
            <?php foreach($dichvu as $key => $dv) { ?>
            <div class="col-md-4 mb-4">
                <div style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,.06); transition: all .3s; height: 100%;" 
                     onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 30px rgba(0,0,0,.12)'" 
                     onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 15px rgba(0,0,0,.06)'">
                    <a class="scale-img" href="<?= $dv['tenkhongdau' . $lang] ?>">
                        <img onerror="this.src='<?= THUMBS ?>/400x260x1/assets/images/noimage.png';"
                            src="<?= THUMBS ?>/400x260x1/<?= UPLOAD_NEWS_L . $dv['photo'] ?>"
                            alt="<?= $dv['ten' . $lang] ?>" style="width: 100%; object-fit: cover;" />
                    </a>
                    <div style="padding: 20px;">
                        <a href="<?= $dv['tenkhongdau' . $lang] ?>" title="<?= $dv['ten' . $lang] ?>"
                            style="font-size: 18px; font-weight: 600; color: var(--color-main); display: block; margin-bottom: 8px;">
                            <?= $dv['ten' . $lang] ?>
                        </a>
                        <div style="color: #666; font-size: 14px; line-height: 1.6; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                            <?= $dv['mota' . $lang] ?>
                        </div>
                        <a href="<?= $dv['tenkhongdau' . $lang] ?>" style="color: var(--color-main); font-size: 14px; font-weight: 500; margin-top: 12px; display: inline-block;">
                            Chi tiết <i class="fas fa-chevron-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="text-align-center" style="margin-top: 10px;">
            <a href="dich-vu" class="xemgt" style="border-radius: 4px; display: inline-block;">Xem tất cả dịch vụ</a>
        </div>
    </div>
</section>
<?php } ?>

<!--  SẢN PHẨM NỔI BẬT  -->
<?php if(isset($danhmuc_list) && count($danhmuc_list) > 0) { ?>
<section class="section wow fadeInUp" style="padding: 60px 0;">
    <div class="fixwidth">
        <div class="title"><span>Sản phẩm nổi bật</span></div>
        <?php include TEMPLATE . LAYOUT . "tab.php"; ?>
    </div>
</section>
<?php } else if(isset($sanpham_nb) && count($sanpham_nb) > 0) { ?>
<section class="section wow fadeInUp" style="padding: 60px 0;">
    <div class="fixwidth">
        <div class="title"><span>Sản phẩm nổi bật</span></div>
        <div class="loadkhung_product1">
            <?php foreach($sanpham_nb as $key => $value) { if($key >= 8) break; ?>
            <div class="sp_item">
                <a class="scale-img" href="<?= $value['tenkhongdauvi'] ?>" style="border-radius: 8px; overflow: hidden;">
                    <img onerror="this.src='<?= THUMBS ?>/300x250x1/assets/images/noimage.png';"
                        src="<?= THUMBS ?>/300x250x1/<?= UPLOAD_PRODUCT_L . $value['photo'] ?>"
                        alt="<?= $value['ten' . $lang] ?>" />
                </a>
                <div class="sp_content" style="padding: 10px 0;">
                    <a href="<?= $value['tenkhongdauvi'] ?>" title="<?= $value['ten' . $lang] ?>"
                        class="sp_name" style="font-weight: 600; color: #333;"><?= $value['ten' . $lang] ?></a>
                    <?php if($value['gia']) { ?>
                    <div class="sp_gia" style="margin-top: 5px;">
                        Giá: <strong style="color: #e00;"><?= $func->format_money($value['gia']) ?></strong>
                    </div>
                    <?php } else { ?>
                    <div class="sp_gia" style="margin-top: 5px;">
                        <a href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">Liên hệ <?= $optsetting['hotline'] ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="text-align-center" style="margin-top: 25px;">
            <a href="san-pham" class="xemgt" style="border-radius: 4px; display: inline-block;">Xem tất cả sản phẩm</a>
        </div>
    </div>
</section>
<?php } ?>

<!--  SẢN PHẨM THEO DANH MỤC (OWL CAROUSEL)  -->
<?php if(isset($danhmucnb_list) && count($danhmucnb_list) > 0) { ?>
<section class="section wow fadeInUp" style="background: #f8f9fa; padding: 60px 0;">
    <div class="fixwidth">
        <?php foreach($danhmucnb_list as $key => $v) { ?>
        <div class="name_sp_1"><span><?= $v['ten' . $lang] ?></span></div>
        <div class="sp_cap1_all">
            <div class="owl-carousel owl-theme auto_dcategory">
                <?php $sanpham = $d->rawQuery("select ten$lang, tenkhongdauvi, mota$lang, ngaytao, photo, id, gia from #_product where id_list = ? and hienthi>0 and type='san-pham' order by stt,id desc", array($v['id'])); ?>
                <?php foreach($sanpham as $sp) { ?>
                <div class="boxproduct_item sp_cap1">
                    <a class="boxproduct_img" href="<?= $sp['tenkhongdauvi'] ?>" style="border-radius: 8px; overflow: hidden;">
                        <span>
                            <img onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PRODUCT_L . $sp['photo'] ?>" alt="<?= $sp['ten' . $lang] ?>" />
                        </span>
                    </a>
                    <div class="boxproduct_info">
                        <div class="boxproduct_name">
                            <a href="<?= $sp['tenkhongdauvi'] ?>" title="<?= $sp['ten' . $lang] ?>"><?= $sp['ten' . $lang] ?></a>
                            <?php if($sp['gia']) { ?>
                            <div class="boxproduct_price">Giá: <span><?= $func->format_money($sp['gia']) ?></span></div>
                            <?php } else { ?>
                            <div class="boxproduct_price"><a href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">Liên hệ</a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>

<!--  TIN TỨC  -->
<?php if(isset($tintuc) && count($tintuc) > 0) { ?>
<section class="section wow fadeInUp" style="padding: 60px 0;">
    <div class="fixwidth">
        <div class="title"><span>Tin tức mới nhất</span></div>
        <?php include TEMPLATE . LAYOUT . "tin.php"; ?>
        <div class="text-align-center" style="margin-top: 25px;">
            <a href="tin-tuc" class="xemgt" style="border-radius: 4px; display: inline-block;">Xem tất cả tin tức</a>
        </div>
    </div>
</section>
<?php } ?>

<!--  ĐỐI TÁC  -->
<?php if(isset($doitac) && count($doitac) > 0) { ?>
<section class="section wow fadeInUp" style="background: #f8f9fa; padding: 50px 0;">
    <div class="fixwidth">
        <div class="title"><span>Đối tác</span></div>
        <div id="doitac_slider" class="owl-carousel owl-theme">
            <?php foreach($doitac as $v) { ?>
            <div style="padding: 10px;">
                <a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten' . $lang] ?>" 
                    style="display: block; background: #fff; border-radius: 8px; padding: 15px; box-shadow: 0 2px 8px rgba(0,0,0,.04); text-align: center;">
                    <img onerror="this.src='<?= THUMBS ?>/150x80x2/assets/images/noimage.png';"
                        src="<?= THUMBS ?>/150x80x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>"
                        alt="<?= $v['ten' . $lang] ?>" style="max-height: 60px; object-fit: contain;" />
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<!--  KHÁCH HÀNG NÓI GÌ (TESTIMONIALS)  -->
<?php if(isset($kh) && count($kh) > 0) { ?>
<section class="section wow fadeInUp" style="padding: 60px 0;">
    <div class="fixwidth">
        <div class="title"><span>Khách hàng nói gì</span></div>
        <div class="d-flex justify-content-between flex-wrap">
            <div class="left_bottom" style="background: transparent; width: 100%;">
                <div class="from_left_bottom" style="width: 80%; margin: auto;">
                    <div class="slider slider-nav" style="margin-bottom: 20px;">
                        <?php foreach($kh as $k => $v) { ?>
                        <div>
                            <div class="item_kh_img">
                                <img onerror="this.src='<?= THUMBS ?>/195x195x1/assets/images/noimage.png';" 
                                    src="<?= THUMBS ?>/195x195x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" 
                                    alt="<?= $v['ten' . $lang] ?>">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="slider slider-for">
                        <?php foreach($kh as $k => $v) { ?>
                        <div>
                            <div class="item_kh_info">
                                <div class="mota_kh"><?= $v['mota' . $lang] ?></div>
                                <i class="fas fa-quote-left"></i>
                                <div class="name_kh"><?= $v['ten' . $lang] ?></div>
                                <?php if(isset($v['diachi']) && $v['diachi'] != '') { ?>
                                <div class="diachi_kh"><?= $v['diachi'] ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!--  VIDEO  -->
<?php if(isset($video) && count($video) > 0) { ?>
<section class="section wow fadeInUp" style="background: #f8f9fa; padding: 60px 0;">
    <div class="fixwidth">
        <div class="title"><span>Video</span></div>
        <div class="loadkhung_video">
            <?php foreach($video as $k => $v) { if($k >= 6) break; ?>
            <div class="tailvideo_item1">
                <a data-fancybox="video" class="pic-video" href="<?= $v['video'] ?>" title="<?= $v['ten' . $lang] ?>" 
                    style="border-radius: 8px; overflow: hidden;">
                    <img src="https://img.youtube.com/vi/<?= $func->getYoutube($v['video']) ?>/hqdefault.jpg" 
                        alt="<?= $v['ten' . $lang] ?>" style="width: 100%;" />
                </a>
                <div class="name-video" style="margin-top: 10px;">
                    <a href="javascript:;" title="<?= $v['ten' . $lang] ?>"><?= $v['ten' . $lang] ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<!--  ĐĂNG KÝ NHẬN TIN  -->
<section class="section wow fadeInUp" id="background-tuvan" style="padding: 50px 0; background: var(--color-main);">
    <div class="fixwidth">
        <div class="tit_dknt">
            <p style="color: #fff; font-size: 28px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">Đăng ký nhận tư vấn</p>
            <span style="color: rgba(255,255,255,.8);">Để lại thông tin, chúng tôi sẽ liên hệ tư vấn miễn phí cho bạn</span>
        </div>
        <form class="form-contact frm_index validation-contact" novalidate method="post" action="" enctype="multipart/form-data" style="max-width: 700px; margin: auto;">
            <div class="row">
                <div class="input-contact col-sm-6" style="margin-bottom: 12px;">
                    <input type="text" class="form-control" autocomplete="name" id="ten" name="name-newsletter" placeholder="Họ tên *" required 
                        style="border-radius: 4px; height: 44px; border: none;" />
                    <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                </div>
                <div class="input-contact col-sm-6" style="margin-bottom: 12px;">
                    <input type="number" class="form-control" autocomplete="tel" id="dienthoai" name="phone-newsletter" placeholder="Số điện thoại *" required 
                        style="border-radius: 4px; height: 44px; border: none;" />
                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                </div>
            </div>
            <div class="row">
                <div class="input-contact col-sm-12" style="margin-bottom: 12px;">
                    <input type="email" class="form-control" autocomplete="email" id="email" name="email-newsletter" placeholder="Email" 
                        style="border-radius: 4px; height: 44px; border: none;" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 12px;">
                    <div class="input-contact">
                        <textarea class="form-control" id="noidung" name="noidung-newsletter" placeholder="Nội dung cần tư vấn..." required 
                            style="border-radius: 4px; border: none; min-height: 80px;"></textarea>
                        <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                    </div>
                </div>
            </div>
            <div class="text-align-center">
                <input type="submit" class="btn" name="submit-newsletter" value="GỬI ĐĂNG KÝ" disabled 
                    style="background: #fff; color: var(--color-main); font-weight: 600; padding: 10px 40px; border-radius: 4px; font-size: 16px; cursor: pointer;" />
            </div>
            <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
        </form>
    </div>
</section>

<!--  OWL CAROUSEL INIT CHO ĐỐI TÁC + SẢN PHẨM DANH MỤC  -->
<script>
$(document).ready(function(){
    /* Đối tác carousel */
    $('#doitac_slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: { items: 2 },
            480: { items: 3 },
            768: { items: 4 },
            1024: { items: 5 }
        }
    });

    /* Sản phẩm theo danh mục carousel */
    $('.auto_dcategory').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: { items: 2 },
            768: { items: 3 },
            1024: { items: 4 }
        }
    });
});
</script>