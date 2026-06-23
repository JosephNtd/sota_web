<?php
/*
 * FORM ĐĂNG KÝ TƯ VẤN — partial tái sử dụng (AJAX version)
 * Include ở bất kỳ trang nào: include TEMPLATE . LAYOUT . "form_dangky.php";
 * AJAX endpoint: ajax/ajax_newsletter.php
 */
?>

<section class="tk-register2" id="dangkytuvan">
    <!-- Abstract background blobs -->
    <div class="tk-reg2-bg" aria-hidden="true">
        <span class="tk-reg2-blob tk-reg2-blob--a"></span>
        <span class="tk-reg2-blob tk-reg2-blob--b"></span>
    </div>

    <div class="fixwidth tk-reg2-wrap">
        <!-- Header -->
        <div class="tk-reg2-head">
            <span class="tk-reg2-badge">Tư Vấn Miễn Phí</span>
            <h2 class="tk-reg2-title">
                Khởi Đầu Hành Trình Chuyển Đổi Số Cùng <span class="tk-reg2-accent">TitKul</span>
            </h2>
            <p class="tk-reg2-desc">
                Quý Thầy/Cô vui lòng để lại thông tin, đội ngũ chuyên gia của chúng tôi sẽ liên hệ tư vấn giải pháp tối ưu nhất cho nhà trường.
            </p>
        </div>

        <!-- Card -->
        <div class="tk-reg2-card">
            <!-- Left: form -->
            <div class="tk-reg2-formcol">
                <form class="tk-reg2-form" id="frmDangKyTuVan" novalidate method="post" autocomplete="on">
                    <div class="tk-reg2-row">
                        <div class="tk-reg2-field">
                            <label for="ten-dktv">Họ &amp; tên <span class="require">*</span></label>
                            <input type="text" class="form-control" autocomplete="name" id="ten-dktv" name="name-newsletter" placeholder="Nhập họ và tên" required />
                            <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                        </div>
                        <div class="tk-reg2-field">
                            <label for="dienthoai-dktv">Số điện thoại <span class="require">*</span></label>
                            <input type="tel" class="form-control" autocomplete="tel" id="dienthoai-dktv" name="phone-newsletter" placeholder="Nhập số điện thoại" required />
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                        </div>
                    </div>
                    <div class="tk-reg2-field">
                        <label for="truong-dktv">Tên Trường đang công tác <span class="require">*</span></label>
                        <input type="text" class="form-control" id="truong-dktv" name="truong-newsletter" placeholder="Nhập tên trường" required />
                        <div class="invalid-feedback">Vui lòng nhập tên trường</div>
                    </div>
                    <div class="tk-reg2-field">
                        <label for="email-dktv">Email</label>
                        <input type="email" class="form-control" autocomplete="email" id="email-dktv" name="email-newsletter" placeholder="Nhập địa chỉ email (không bắt buộc)" />
                    </div>
                    <div class="tk-reg2-field">
                        <label for="diachi-dktv">Địa chỉ</label>
                        <textarea class="form-control" id="diachi-dktv" name="diachi-newsletter" rows="2" placeholder="Tỉnh/Thành phố, Quận/Huyện..."></textarea>
                    </div>
                    <div class="tk-reg2-field">
                        <label for="noidung-dktv">Nội dung tư vấn</label>
                        <textarea class="form-control" id="noidung-dktv" name="noidung-newsletter" rows="4" placeholder="Nhập nội dung bạn cần tư vấn..."></textarea>
                    </div>

                    <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">

                    <!-- Thông báo kết quả -->
                    <div class="tk-form-msg" id="dktv-msg" style="display:none;"></div>

                    <button type="submit" class="tk-reg2-btn" id="dktv-btn" disabled>
                        Gửi Yêu Cầu Tư Vấn
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>

            <!-- Right: editorial visual -->
            <div class="tk-reg2-visual">
                <img src="assets/images/titkul/dangky-side.webp" alt="Đăng ký tư vấn Titkul" onerror="this.style.display='none';" />
                <span class="tk-reg2-visual-overlay" aria-hidden="true"></span>
                <!-- <div class="tk-reg2-floatcard">
                    <span class="tk-reg2-float-icon"><i class="fas fa-school"></i></span>
                    <div>
                        <p class="tk-reg2-float-title">Đồng Hành Cùng 1000+ Trường Học</p>
                        <p class="tk-reg2-float-text">Giải pháp quản trị toàn diện, bảo mật tối đa, vận hành trơn tru.</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<script>
window.addEventListener('load', function() {
    var form = document.getElementById('frmDangKyTuVan');
    if (!form) return;
    var btn  = document.getElementById('dktv-btn');
    var msg  = document.getElementById('dktv-msg');
    var required = form.querySelectorAll('[required]');
    var btnLabel = 'Gửi Yêu Cầu Tư Vấn <i class="fas fa-arrow-right"></i>';

    /* Enable/disable nút submit */
    function checkFields() {
        var ok = true;
        required.forEach(function(f){ if (!f.value.trim()) ok = false; });
        btn.disabled = !ok;
    }
    required.forEach(function(f){
        f.addEventListener('input', checkFields);
    });
    checkFields();

    /* AJAX submit */
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (btn.disabled) return;

        btn.disabled = true;
        btn.innerHTML = 'Đang gửi... <i class="fas fa-spinner fa-spin"></i>';
        msg.style.display = 'none';

        var fd = new FormData(form);

        /* Refresh reCAPTCHA token nếu có */
        var sendForm = function() {
            fetch('ajax/ajax_newsletter.php', {
                method: 'POST',
                body: fd
            })
            .then(function(r){ return r.json(); })
            .then(function(data){
                msg.style.display = 'block';
                if (data.success) {
                    msg.className = 'tk-form-msg tk-form-msg--ok';
                    msg.innerHTML = '<i class="fas fa-check-circle"></i> ' + data.message;
                    form.reset();
                    checkFields();
                } else {
                    msg.className = 'tk-form-msg tk-form-msg--err';
                    msg.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + data.message;
                }
                btn.innerHTML = btnLabel;
                btn.disabled = false;
                checkFields();
            })
            .catch(function(){
                msg.style.display = 'block';
                msg.className = 'tk-form-msg tk-form-msg--err';
                msg.innerHTML = '<i class="fas fa-exclamation-circle"></i> Lỗi kết nối. Vui lòng thử lại.';
                btn.innerHTML = btnLabel;
                btn.disabled = false;
                checkFields();
            });
        };

        /* Nếu grecaptcha v3 available → refresh token trước */
        if (window.grecaptcha && typeof grecaptcha.execute === 'function') {
            var sitekey = document.getElementById('recaptchaResponseNewsletter')
                          ? (document.querySelector('[data-recaptcha-sitekey]') || {}).dataset
                          : null;
            try {
                grecaptcha.execute(grecaptcha.enterprise ? undefined : document.querySelector('script[src*="recaptcha"]')
                    ? '<?= isset($config["googleAPI"]["recaptcha"]["sitekey"]) ? $config["googleAPI"]["recaptcha"]["sitekey"] : "" ?>'
                    : '', {action: 'newsletter'}).then(function(token){
                    fd.set('recaptcha_response_newsletter', token);
                    sendForm();
                });
            } catch(ex) {
                sendForm();
            }
        } else {
            sendForm();
        }
    });
});
</script>