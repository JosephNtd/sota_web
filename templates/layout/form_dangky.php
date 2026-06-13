<?php
/*
 * FORM ĐĂNG KÝ TƯ VẤN — partial tái sử dụng
 * Include ở bất kỳ trang nào: include TEMPLATE . LAYOUT . "form_dangky.php";
 * Handler: sources/allpage.php → lưu #_newsletter (type = dang-ky-tu-van)
 * Ảnh bên phải: assets/images/titkul/dangky-side.webp (đổi tuỳ ý)
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
            <form class="form-contact frm_index validation-contact tk-register-form" novalidate method="post" enctype="multipart/form-data" action="">
                <div class="tk-field">
                    <label for="ten-dktv">Họ & tên: <span class="require">*</span></label>
                    <input type="text" class="form-control" autocomplete="name" id="ten-dktv" name="name-newsletter" require />
                    <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                </div>
                <div class="tk-field">
                    <label for="dienthoai-dktv">Số điện thoại: <span class="require">*</span></label>
                    <input type="tel" class="form-control" autocomplete="tel" id="dienthoai-dktv" name="phone-newsletter" require />
                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                </div>
                <div class="tk-field">
                    <label for="truong-dktv">Tên Trường đang công tác: <span class="require">*</span></label>
                    <input type="text" class="form-control" autocomplete="text" id="truong-dktv" name="truong-newsletter" require />
                    <div class="invalid-feedback">Vui lòng nhập tên trường </div>
                </div>
                <div class="tk-field">
                    <label for="diachi-dktv">Địa chỉ: <span class="require">*</span></label>
                    <input type="text" class="form-control" id="diachi-dktv" name="diachi-newsletter" require />
                    <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                </div>
                <div class="tk-field tk-field-submit">
                     <input type="submit" class="tk-btn tk-btn-cta" name="submit-newsletter" value="Gửi Tin" />
                </div>
                 <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
            </form>
        </div>
        <div class="tk-register-right">
            <img src="assets/images/titkul/dangky-side.webp" alt="Đăng ký tư vấn Titkul" onerror="this.style.display='none';" />
        </div>
    </div>
</section>