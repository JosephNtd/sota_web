<?php
/*
 * HỖ TRỢ LIÊN HỆ — partial tái sử dụng
 * Include: include TEMPLATE . LAYOUT . "hotro_lienhe.php";
 * Hotline + Zalo: lấy từ $optsetting (admin Cài đặt)
 * QR Zalo: đặt ảnh tại assets/images/titkul/zalo-qr.png
 */

$tk_hotline = !empty($optsetting['hotline']) ? $optsetting['hotline'] : '094.242.9989';
$tk_hotline_tel = preg_replace('/[^0-9+]/', '', $tk_hotline);
$tk_zalo = !empty($optsetting['zalo']) ? $optsetting['zalo'] : '';
$tk_zalo_link = !empty($tk_zalo) ? 'https://zalo.me/' . preg_replace('/[^0-9]/', '', $tk_zalo) : '#';
?>

<section class="tk-support tk-sec">
    <div class="tk-support-bg" aria-hidden="true">
        <span class="tk-support-blob tk-support-blob--1"></span>
        <span class="tk-support-blob tk-support-blob--2"></span>
    </div>
    <div class="fixwidth">
        <div class="tk-support-head tk-rv tk-rv--up">
            <span class="tk-support-eyebrow">Hỗ trợ &amp; Tư vấn</span>
            <h2 class="tk-support-title">Cần hỗ trợ về phần mềm quản lý trường học?</h2>
            <p class="tk-support-sub">Quý Thầy/Cô vui lòng liên hệ qua một trong các kênh hỗ trợ chính thức bên dưới để được giải đáp nhanh nhất.</p>
        </div>

        <div class="tk-support-grid">
            <!-- Card 1: Hotline -->
            <div class="tk-support-card tk-rv tk-rv--up tk-d1">
                <div class="tk-support-card__badge">Cách 1</div>
                <div class="tk-support-card__icon tk-support-card__icon--phone">
                    <i class="fas fa-headset">&zwj;</i>
                </div>
                <h3 class="tk-support-card__title">Tổng đài CSKH</h3>
                <p class="tk-support-card__desc">Gọi trực tiếp đến bộ phận Chăm sóc khách hàng để được hỗ trợ tức thì trong giờ làm việc.</p>
                <a class="tk-support-card__hotline" href="tel:<?= $tk_hotline_tel ?>">
                    <i class="fas fa-phone-alt">&zwj;</i>
                    <span><?= htmlspecialchars($tk_hotline) ?></span>
                </a>
                <span class="tk-support-card__note">Thứ 2 – Thứ 7 · 8:00 – 17:30</span>
            </div>

            <!-- Card 2: Zalo OA -->
            <div class="tk-support-card tk-support-card--zalo tk-rv tk-rv--up tk-d2">
                <div class="tk-support-card__badge">Cách 2</div>
                <div class="tk-support-zalo">
                    <div class="tk-support-zalo__main">
                        <div class="tk-support-card__icon tk-support-card__icon--zalo">
                            <i class="fas fa-comment-dots">&zwj;</i>
                        </div>
                        <h3 class="tk-support-card__title">Zalo OA chính thức</h3>
                        <p class="tk-support-card__desc">Nhắn tin <strong>miễn phí</strong> đến Zalo OA của TitKul. Quét mã QR hoặc bấm nút bên dưới để bắt đầu.</p>
                        <ol class="tk-support-steps">
                            <li>Mở nút <strong>"Mở Zalo OA"</strong> hoặc quét mã QR bằng ứng dụng Zalo.</li>
                            <li>Chọn <strong>"Quan tâm"</strong> và gửi tin nhắn để được hỗ trợ ngay.</li>
                        </ol>
                        <a class="tk-support-card__btn" href="<?= $tk_zalo_link ?>" target="_blank" rel="nofollow">
                            <i class="fas fa-arrow-up-right-from-square">&zwj;</i>
                            Mở Zalo OA
                        </a>
                    </div>
                    <div class="tk-support-zalo__qr">
                        <img src="assets/images/titkul/zalo-qr.png" alt="Mã QR Zalo OA TitKul" loading="lazy"
                            onerror="this.closest('.tk-support-zalo__qr').style.display='none';" />
                        <span class="tk-support-zalo__qr-cap">Quét để kết nối</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
