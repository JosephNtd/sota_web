<?php
/*
 * HỖ TRỢ LIÊN HỆ — partial tái sử dụng
 * Include: include TEMPLATE . LAYOUT . "hotro_lienhe.php";
 * Hotline + Zalo: lấy từ $optsetting (admin Cài đặt)
 * QR Zalo: đặt ảnh tại assets/images/titkul/zalo-qr.png
 */

$tk_hotline = !empty($optsetting['hotline']) ? $optsetting['hotline'] : '094.242.9989';
$tk_zalo = !empty($optsetting['zalo']) ? $optsetting['zalo']: '';
$tk_zalo_link = !empty($tk_zalo) ? 'https://zalo.me/' . preg_replace('/[^0-9]/', '', $tk_zalo) : '#';
?>

<section class="tk-sec tk-support">
    <div class="fixwidth">
        <h2 class="tk-support-title">
            Mọi thắc mắc về phần mềm quản lý trường học,<br>
            Quý Thầy/Cô vui lòng liên hệ các kênh hỗ trợ sau
        </h2>
        <div class="tk-support-content">
            <ul class="tk-support-list">
                <li><strong><em>Cách 1:</em></strong> Liên hệ Bộ phận hỗ trợ CSKH, Hotline: <strong><u>094.242.9989</u></strong></li>
                <li><strong><em>Cách 2:</em></strong>  Nhắn tin miễn phí đến bộ phận Hỗ trợ CSKH trên Zalo OA chính thức của Công ty Titkul, với cách sử dụng như sau:</li>
            </ul>
            <div class="tk-support-steps">
                <p>b1: Click ngay <a href="<?= $tk_zalo_link ?>" target="_blank" rel="nofollow">tại đây</a> để đến trang Zalo OA của Titkul 
                                (<a href="<?= $tk_zalo_link ?>" target="_blank" rel="nofollow">click tại đây</a>), hoặc mở ứng dụng Zalo trên điện thoại và chọn chức năng Scan và Scan mã QR sau
                </p>
                <div class="tk-support-qr">
                    <img src="assets/images/titkul/zalo-qr.png" alt="QR Zalo Titkul" onerror="this.style.display='none';" />
                </div>
                <p>b2: Chọn nút "Quan tâm" và bắt đầu gửi tin nhắn để được hỗ trợ ngay.</p>
            </div>
        </div>
    </div>
</section>