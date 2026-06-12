<?php
/* 
 * HEADER + MENU  (titkul)
 * Giữ nguyên các class JS-hook: menu_cap_cha, icon_menu_mobi,
 * menu_baophu, menu_mobi_add, header_logo  -> menu mobile tự chạy.
 * Dropdown đọc: $splistmenu (san-pham), $tinhnang_menu, $huongdan_menu
 * (khai trong sources/allpage.php).
 */
?>
<div class="tk-header-wrap">

    <!-- ===== TOP BAR ===== -->
    <div class="tk-topbar">
        <div class="fixwidth d-flex justify-content-between align-items-center">
            <div class="tk-top-left">
                <a class="tk-top-phone" href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']) ?>">
                    <i class="fas fa-phone-alt"></i> <?= $optsetting['hotline'] ?> 094.242.9989
                </a>
            </div>
            <div class="tk-top-right">
                <a class="tk-top-hdsd" href="huong-dan-su-dung" title="Hướng Dẫn Sử Dụng">
                    <i class="far fa-question-circle"></i> Hướng Dẫn Sử Dụng
                </a>
            </div>
        </div>
    </div>

    <!--  HEADER CHÍNH (logo + menu)  -->
    <div class="tk-header">
        <div class="fixwidth d-flex justify-content-between align-items-center flex-wrap">

            <!-- Logo -->
            <div class="tk-logo header_left">
                <a class="header_logo" href="" title="<?= $setting['ten' . $lang] ?>">
                    <img onerror="this.src='assets/images/noimage.png';"
                        src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="<?= $setting['ten' . $lang] ?>" />
                </a>
            </div>

            <!-- Nút hamburger (mobile) -->
            <div class="menu_mobi tk-burger">
                <p class="icon_menu_mobi"><i class="fas fa-bars"></i></p>
            </div>

            <!-- MENU CHÍNH -->
            <nav class="tk-nav">
                <ul class="menu_cap_cha tk-menu d-flex">

                    <li class="menulicha <?= $com == 'gioi-thieu-titkul' ? 'active' : '' ?>">
                        <a href="gioi-thieu-titkul" title="Giới Thiệu">Giới Thiệu</a>
                    </li>

                    <!-- SẢN PHẨM -->
                    <li class="menulicha tk-has-child <?= $com == 'san-pham' ? 'active' : '' ?>">
                        <a href="san-pham" title="Sản Phẩm">Sản Phẩm <i class="fas fa-angle-down"></i></a>
                        <?php if (!empty($splistmenu)) { ?>
                        <ul class="menu_cap_con">
                            <?php foreach ($splistmenu as $cat) { ?>
                            <li><a href="<?= $cat[$sluglang] ?>" title="<?= $cat['ten' . $lang] ?>"><?= $cat['ten' . $lang] ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>

                    <!-- TÍNH NĂNG NỔI BẬT -->
                    <li class="menulicha tk-has-child <?= $com == 'tinh-nang-noi-bat' ? 'active' : '' ?>">
                        <a href="tinh-nang-noi-bat" title="Tính Năng Nổi Bật">Tính Năng Nổi Bật <i class="fas fa-angle-down"></i></a>
                        <?php if (!empty($tinhnang_menu)) { ?>
                        <ul class="menu_cap_con">
                            <?php foreach ($tinhnang_menu as $tn) { ?>
                            <li><a href="<?= $tn[$sluglang] ?>" title="<?= $tn['ten' . $lang] ?>"><?= $tn['ten' . $lang] ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>

                    <!-- HƯỚNG DẪN SỬ DỤNG -->
                    <li class="menulicha tk-has-child <?= $com == 'huong-dan-su-dung' ? 'active' : '' ?>">
                        <a href="huong-dan-su-dung" title="Hướng Dẫn Sử Dụng">Hướng Dẫn Sử Dụng <i class="fas fa-angle-down"></i></a>
                        <?php if (!empty($huongdan_menu)) { ?>
                        <ul class="menu_cap_con">
                            <?php foreach ($huongdan_menu as $hd) { ?>
                            <li><a href="<?= $hd[$sluglang] ?>" title="<?= $hd['ten' . $lang] ?>"><?= $hd['ten' . $lang] ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>

                    <li class="menulicha <?= $com == 'tin-tuc' ? 'active' : '' ?>">
                        <a href="tin-tuc" title="Tin Tức">Tin Tức</a>
                    </li>

                    <li class="menulicha <?= $com == 'lien-he' ? 'active' : '' ?>">
                        <a href="lien-he" title="Liên Hệ">Liên Hệ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Lớp phủ + ngăn chứa menu mobile (JS append vào .menu_mobi_add) -->
    <div class="menu_baophu"></div>
    <div class="menu_mobi_add"></div>
</div>

<!-- Spacer chống nhảy layout khi header fixed -->
<div class="tk-header-spacer"></div>
<script>
(function () {
    var wrap = document.querySelector('.tk-header-wrap');
    var header = document.querySelector('.tk-header');
    var spacer = document.querySelector('.tk-header-spacer');
    if (!wrap || !header || !spacer) return;
    function onScroll() {
        if (window.pageYOffset > 140) {
            if (!wrap.classList.contains('tk-sticky')) {
                wrap.classList.add('tk-sticky');
                spacer.style.height = header.offsetHeight + 'px';
            }
        } else {
            wrap.classList.remove('tk-sticky');
            spacer.style.height = '0px';
        }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();
</script>