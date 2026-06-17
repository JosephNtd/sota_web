<?php
/*
 * FORM ĐĂNG KÝ TƯ VẤN — partial tái sử dụng (AJAX version)
 * Include ở bất kỳ trang nào: include TEMPLATE . LAYOUT . "form_dangky.php";
 * AJAX endpoint: ajax/ajax_newsletter.php
 */
?>

<section class="tk-sec tk-register" id="dangkytuvan">
    <div class="fixwidth">
        <h2 class="tk-register-title">Đăng ký tư vấn ngay</h2>
        <p class="tk-register-desc">
            Quý thầy/ cô vui lòng cung cấp thông tin, để được tư vấn miễn phí phần mềm quản lý trường học, chuyển đổi số nhà trường.
        </p>
    </div>
    <div class="fixwidth tk-register-grid">
        <div class="tk-register-left">
            <form class="tk-register-form" id="frmDangKyTuVan" novalidate method="post" autocomplete="on">
                <div class="tk-field">
                    <label for="ten-dktv">Họ & tên: <span class="require">*</span></label>
                    <input type="text" class="form-control" autocomplete="name" id="ten-dktv" name="name-newsletter" required />
                    <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                </div>
                <div class="tk-field">
                    <label for="dienthoai-dktv">Số điện thoại: <span class="require">*</span></label>
                    <input type="tel" class="form-control" autocomplete="tel" id="dienthoai-dktv" name="phone-newsletter" required />
                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                </div>
                <div class="tk-field">
                    <label for="truong-dktv">Tên Trường đang công tác: <span class="require">*</span></label>
                    <input type="text" class="form-control" id="truong-dktv" name="truong-newsletter" required />
                    <div class="invalid-feedback">Vui lòng nhập tên trường</div>
                </div>
                <div class="tk-field">
                    <label for="diachi-dktv">Địa chỉ:</label>
                    <input type="text" class="form-control" id="diachi-dktv" name="diachi-newsletter" />
                </div>
                <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">

                <!-- Thông báo kết quả -->
                <div class="tk-form-msg" id="dktv-msg" style="display:none;"></div>

                <div class="tk-field tk-field-submit">
                    <button type="submit" class="tk-btn tk-btn-cta" id="dktv-btn" disabled>Gửi Tin</button>
                </div>
            </form>
        </div>
        <div class="tk-register-right">
            <img src="assets/images/titkul/dangky-side.webp" alt="Đăng ký tư vấn Titkul" onerror="this.style.display='none';" />
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
        btn.textContent = 'Đang gửi...';
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
                btn.textContent = 'Gửi Tin';
                btn.disabled = false;
                checkFields();
            })
            .catch(function(){
                msg.style.display = 'block';
                msg.className = 'tk-form-msg tk-form-msg--err';
                msg.innerHTML = '<i class="fas fa-exclamation-circle"></i> Lỗi kết nối. Vui lòng thử lại.';
                btn.textContent = 'Gửi Tin';
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