<div class="boxfooter_container " id="background-footer">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-4">
                <div class="tit_ft"><?= $footer['ten' . $lang] ?></div>
                <div class="des_footer">
                    <?= htmlspecialchars_decode($footer['noidung' . $lang]) ?>
                </div>
                <div class="mt-3">
                    <?php foreach ($social1 as $v) { ?>
                    <a href="<?= $v['link'] ?>" class="ftmxh" target="_blank" title="<?= $v['ten' . $lang] ?>"><img
                            onerror="this.src='<?= THUMBS ?>/30x30x2/assets/images/noimage.png';"
                            src="<?= THUMBS ?>/0x30x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>"
                            alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" /></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tit_ft">Chính sách hỗ trợ</div>
                <div class="box_cs">
                    <?php foreach ($cs as $v) { ?>
                    <p>
                        <a href="<?= $v['tenkhongdauvi'] ?>"><i class="fa fa-angle-double-right"
                                aria-hidden="true"></i><?= $v['ten' . $lang] ?></a>
                    </p>
                    <?php } ?>
                    <p>
                        <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Đổi
                            Trả Hàng</a>
                    </p>
                    <p>
                        <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Đối Tác Công Trình Tiêu
                            Biểu</a>
                    </p>
                    <p>
                        <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Tuyển
                            Dụng</a>
                    </p>
                    <p>
                        <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Chính Sách Bảo Mật</a>
                    </p>
                    <p>
                        <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Miễn Phí Vận Chuyển</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tit_ft">Fanpage</div>
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=<?= $optsetting['fanpage'] ?>&tabs=timeline&width=380&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                    width="380" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="boxfooter_bottom">
    <div class="fixwidth d-flex justify-content-between flex-wrap">
        <!-- <div>2025 @ All rights reserved. Design by sotagroup.vn</div> -->
        <div>Copyright © 2025. Design by <a href="https://sotagroup.vn/thiet-ke-website" title="Thiết Kế Web SOTA"
                style="color: #000;">Thiết Kế Web SOTA</a></div>
        <div>Online: <?= $online ?> | Hôm nay: <?= $counter['today'] ?> | Tổng: <?= $counter['total'] ?></div>
    </div>
</div>