<?php
/* 
   Trang Liên hệ — TitKul
   Layout: Hero + Company Info + 3 Cards | Form glassmorphic | FAQ accordion
   Design: Premium Scholastic Modernism (DESIGN.md)
 */

/* Lấy thông tin công ty từ $optsetting (đã decode từ JSON cột options) */
$ct_diachi    = isset($optsetting['diachi'])     ? $optsetting['diachi']     : '';
$ct_dienthoai = isset($optsetting['dienthoai'])  ? $optsetting['dienthoai']  : '';
$ct_hotline   = isset($optsetting['hotline'])    ? $optsetting['hotline']    : '';
$ct_email     = isset($optsetting['email'])      ? $optsetting['email']      : '';
$ct_slogan    = isset($optsetting['slogan'])     ? $optsetting['slogan']     : '';

/* Tên công ty từ setting */
$ct_tencongty = isset($setting['ten' . $lang]) ? $setting['ten' . $lang] : '';

/* Logo từ allpage */
$ct_logo_src = (isset($logo['photo']) && $logo['photo'] != '')
    ? $config_base . UPLOAD_PHOTO_L . $logo['photo']
    : '';

/* Banner seopage */
$ct_banner_src = (isset($banner) && $banner != '')
    ? $config_base . UPLOAD_SEOPAGE_L . $banner
    : '';
?>

<div class="tkct-page">
    <!-- SECTION 1: HERO + COMPANY INFO + 3 CARDS                    -->
    
    <section id="tkct-hero" class="tkct-hero">
        <?php if ($ct_banner_src != '') : ?>
            <div class="tkct-hero__bg" style="background-image:url('<?= $ct_banner_src ?>');"></div>
        <?php endif; ?>
        <div class="tkct-hero__network"></div>
        <div class="tkct-hero__blob tkct-hero__blob--right"></div>
        <div class="tkct-hero__blob tkct-hero__blob--left"></div>

        <div class="tkct-container tkct-hero__inner">
            <h1 class="tkct-hero__title"><?= !empty($title_crumb) ? mb_strtoupper($title_crumb, 'UTF-8') : 'HÃY LIÊN HỆ CHÚNG TÔI' ?></h1>
            <span class="tkct-hero__divider"></span>
        </div>
    </section>

    <!-- Company Info + Cards -->
    <section class="tkct-info">
        <div class="tkct-container">

            <div class="tkct-info__head">
                <?php if ($ct_logo_src != '') : ?>
                    <img class="tkct-info__logo" src="<?= $ct_logo_src ?>" alt="<?= htmlspecialchars($ct_tencongty) ?>" />
                <?php endif; ?>
                <h2 class="tkct-info__name"><?= !empty($ct_tencongty) ? htmlspecialchars($ct_tencongty) : 'Công Ty Cổ Phần TitKul' ?></h2>
                <?php if ($ct_slogan != '') : ?>
                    <p class="tkct-info__slogan"><?= htmlspecialchars($ct_slogan) ?></p>
                <?php else : ?>
                    <p class="tkct-info__slogan">Sản xuất phần mềm ứng dụng Quản lý trường học, Quản lý doanh nghiệp, phục vụ mục tiêu chuyển đổi số.</p>
                <?php endif; ?>
            </div>

            <div class="tkct-cards">
                <!-- Card: Địa chỉ -->
                <div class="tkct-card">
                    <div class="tkct-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/>
                        </svg>
                    </div>
                    <h3 class="tkct-card__title">Địa chỉ</h3>
                    <p class="tkct-card__text">
                        <?= !empty($ct_diachi) ? htmlspecialchars($ct_diachi) : '572/14B Âu Cơ, Phường Bảy Hiền, Tp.HCM' ?>
                    </p>
                </div>

                <!-- Card: Điện thoại (raised) -->
                <div class="tkct-card tkct-card--raised">
                    <div class="tkct-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
                            <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 00-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                        </svg>
                    </div>
                    <h3 class="tkct-card__title">Điện thoại</h3>
                    <p class="tkct-card__text">
                        <?php if (!empty($ct_dienthoai)) : ?>
                            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $ct_dienthoai) ?>"><?= htmlspecialchars($ct_dienthoai) ?></a>
                        <?php endif; ?>
                        <?php if (!empty($ct_hotline) && $ct_hotline !== $ct_dienthoai) : ?>
                            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $ct_hotline) ?>"><?= htmlspecialchars($ct_hotline) ?></a>
                        <?php endif; ?>
                        <?php if (empty($ct_dienthoai) && empty($ct_hotline)) : ?>
                            <a href="tel:02877787972">(028) 7778.7972</a>
                            <a href="tel:0942429989">094.242.9989</a>
                        <?php endif; ?>
                    </p>
                </div>

                <!-- Card: Email -->
                <div class="tkct-card">
                    <div class="tkct-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <h3 class="tkct-card__title">Email</h3>
                    <p class="tkct-card__text">
                        <?php if (!empty($ct_email)) : ?>
                            <a href="mailto:<?= htmlspecialchars($ct_email) ?>"><?= htmlspecialchars($ct_email) ?></a>
                        <?php else : ?>
                            <a href="mailto:support@titkul.com">support@titkul.com</a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION 2: CONTACT FORM (glassmorphic) -->
    <section id="tkct-form" class="tkct-formsec">
        <div class="tkct-formsec__bg-shape"></div>
        <div class="tkct-formsec__blob"></div>

        <div class="tkct-container">
            <div class="tkct-formsec__grid">

                <!-- Left: Title + Intro -->
                <div class="tkct-formsec__left">
                    <span class="tkct-chip">Liên Hệ</span>
                    <h2 class="tkct-formsec__title">
                        GỬI THÔNG TIN<br/>
                        <span class="tkct-formsec__title--accent">ĐẾN TITKUL</span>
                    </h2>
                    <p class="tkct-formsec__intro">
                        Hãy cung cấp thông tin vào mẫu dưới đây, chúng tôi sẽ liên hệ tư vấn giải pháp phù hợp đến Quý khách trong thời gian sớm nhất.
                    </p>

                    <?php if (!empty($ct_email)) : ?>
                        <div class="tkct-formsec__contact">
                            <div class="tkct-formsec__contact-icon">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                                    <path d="M12 1a9 9 0 00-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2a7 7 0 1114 0v2h-4v8h3c1.66 0 3-1.34 3-3v-7a9 9 0 00-9-9z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="tkct-formsec__contact-label">Hỗ trợ khách hàng</p>
                                <p class="tkct-formsec__contact-value"><?= htmlspecialchars($ct_email) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right: Glassmorphic Form -->
                <div class="tkct-formsec__right">
                    <div class="tkct-formsec__shadow"></div>
                    <div class="tkct-glasscard">
                        <span class="tkct-glasscard__highlight"></span>

                        <form class="tkct-form validation-contact" novalidate method="post" action="" enctype="multipart/form-data" autocomplete="on">

                            <!-- Row: Họ tên + SĐT -->
                            <div class="tkct-form__row">
                                <div class="tkct-field">
                                    <label class="tkct-field__label" for="tkct-ten">Họ &amp; Tên <span class="tkct-required">*</span></label>
                                    <input class="tkct-field__input form-control" type="text" id="tkct-ten" name="ten" autocomplete="name" required />
                                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                                </div>
                                <div class="tkct-field">
                                    <label class="tkct-field__label" for="tkct-dienthoai">Số Điện Thoại <span class="tkct-required">*</span></label>
                                    <input class="tkct-field__input form-control" type="tel" id="tkct-dienthoai" name="dienthoai" autocomplete="tel" required />
                                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="tkct-field">
                                <label class="tkct-field__label" for="tkct-email">Email</label>
                                <input class="tkct-field__input form-control" type="email" id="tkct-email" name="email" autocomplete="email" />
                                <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                            </div>

                            <!-- Lĩnh vực (checkbox group) -->
                            <div class="tkct-checkgroup">
                                <span class="tkct-field__label">Lĩnh vực hoạt động:</span>
                                <div class="tkct-checkgroup__list">
                                    <label class="tkct-check">
                                        <input class="tkct-check__input" type="checkbox" name="linhvuc[]" value="Trường học" />
                                        <span class="tkct-check__box" aria-hidden="true">
                                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                        <span class="tkct-check__text">Trường học</span>
                                    </label>
                                    <label class="tkct-check">
                                        <input class="tkct-check__input" type="checkbox" name="linhvuc[]" value="Công ty/Doanh nghiệp" />
                                        <span class="tkct-check__box" aria-hidden="true">
                                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                        <span class="tkct-check__text">Công ty/Doanh nghiệp</span>
                                    </label>
                                    <label class="tkct-check">
                                        <input class="tkct-check__input" type="checkbox" name="linhvuc[]" value="Khu Công nghiệp" />
                                        <span class="tkct-check__box" aria-hidden="true">
                                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                        <span class="tkct-check__text">Khu Công nghiệp</span>
                                    </label>
                                    <label class="tkct-check">
                                        <input class="tkct-check__input" type="checkbox" name="linhvuc[]" value="Khác" />
                                        <span class="tkct-check__box" aria-hidden="true">
                                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                        <span class="tkct-check__text">Khác</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Nội dung -->
                            <div class="tkct-field">
                                <label class="tkct-field__label" for="tkct-noidung">Nội dung yêu cầu:</label>
                                <textarea class="tkct-field__textarea form-control" id="tkct-noidung" name="noidung" rows="4" placeholder="(Nhập nội dung yêu cầu)"></textarea>
                            </div>

                            <!-- Hidden fields (giữ tương thích DB cũ) -->
                            <input type="hidden" name="diachi" value="" />
                            <input type="hidden" name="tieude" value="Liên hệ từ website" />

                            <!-- reCAPTCHA -->
                            <?php if (isset($config['googleAPI']['recaptcha']['sitekey']) && $config['googleAPI']['recaptcha']['sitekey'] != '') : ?>
                                <div class="g-recaptcha" data-sitekey="<?= $config['googleAPI']['recaptcha']['sitekey'] ?>"></div>
                                <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact" />
                            <?php endif; ?>
                            <div class="tk-form-msg" id="tkct-msg" style="display:none;"></div>
                            <!-- Submit -->
                            <div class="tkct-form__submit">
                                <button class="tkct-btn-primary" type="submit" name="submit-contact" disabled>
                                    <span>Gửi Thông Tin</span>
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 3: FAQ (dynamic từ news type='faq') -->
    
    <?php if (isset($faqs) && is_array($faqs) && count($faqs) > 0) : ?>
    <section id="tkct-faq" class="tkct-faqsec">
        <div class="tkct-faqsec__blob tkct-faqsec__blob--tl"></div>
        <div class="tkct-faqsec__blob tkct-faqsec__blob--br"></div>

        <div class="tkct-container tkct-faqsec__inner">
            <div class="tkct-faqsec__head">
                <h2 class="tkct-faqsec__title">NHỮNG CÂU HỎI THƯỜNG GẶP</h2>
                <span class="tkct-faqsec__divider"></span>
            </div>

            <div class="tkct-faq__list">
                <?php foreach ($faqs as $idx => $faq) : ?>
                    <?php $isOpen = ($idx === 0); ?>
                    <div class="tkct-faq__item">
                        <button type="button" class="tkct-faq__head <?= $isOpen ? 'is-open' : '' ?>" onclick="tkctToggleFaq(this)">
                            <span class="tkct-faq__q"><?= htmlspecialchars($faq['ten' . $lang]) ?></span>
                            <span class="tkct-faq__icon" aria-hidden="true">
                                <svg class="tkct-faq__icon-add" viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"/></svg>
                                <svg class="tkct-faq__icon-sub" viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M19 13H5v-2h14v2z"/></svg>
                            </span>
                        </button>
                        <div class="tkct-faq__body" data-state="<?= $isOpen ? 'open' : 'closed' ?>">
                            <div class="tkct-faq__bodyinner">
                                <?= htmlspecialchars_decode($faq['noidung' . $lang]) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Hỗ trợ liên hệ (reuse partial)                              -->
    <?php include 'templates/layout/hotro_lienhe.php'; ?>

</div>
<!-- /.wrap-main.tkct-page -->

<!-- FAQ Accordion + Form Submit Enable Script -->
<!-- <script>
(function(){
    /* Accordion */
    window.tkctToggleFaq = function(btn){
        var item = btn.parentElement;
        var body = btn.nextElementSibling;
        var isOpen = body.getAttribute('data-state') === 'open';

        /* close others (single-open behavior) */
        document.querySelectorAll('.tkct-faq__body').forEach(function(el){
            if (el !== body) {
                el.setAttribute('data-state', 'closed');
                el.previousElementSibling.classList.remove('is-open');
            }
        });

        if (isOpen) {
            body.setAttribute('data-state', 'closed');
            btn.classList.remove('is-open');
        } else {
            body.setAttribute('data-state', 'open');
            btn.classList.add('is-open');
        }
    };

    /* Submit button: enable khi đã nhập đủ field required */
    var form = document.querySelector('.tkct-form');
    if (form) {
        var submitBtn = form.querySelector('button[type="submit"]');
        var requiredFields = form.querySelectorAll('[required]');
        function checkForm() {
            var allFilled = true;
            requiredFields.forEach(function(f){
                if (!f.value.trim()) allFilled = false;
            });
            if (submitBtn) submitBtn.disabled = !allFilled;
        }
        requiredFields.forEach(function(f){
            f.addEventListener('input', checkForm);
            f.addEventListener('blur', checkForm);
        });
        checkForm();
    }
})();
</script> -->
<!-- FAQ Accordion + AJAX Form Submit Script -->
<script>
(function(){
    /* Accordion */
    window.tkctToggleFaq = function(btn){
        var item = btn.parentElement;
        var body = btn.nextElementSibling;
        var isOpen = body.getAttribute('data-state') === 'open';
        document.querySelectorAll('.tkct-faq__body').forEach(function(el){
            if (el !== body) {
                el.setAttribute('data-state', 'closed');
                el.previousElementSibling.classList.remove('is-open');
            }
        });
        if (isOpen) {
            body.setAttribute('data-state', 'closed');
            btn.classList.remove('is-open');
        } else {
            body.setAttribute('data-state', 'open');
            btn.classList.add('is-open');
        }
    };

    /* Form AJAX */
    var form = document.querySelector('.tkct-form');
    if (!form) return;
    var submitBtn = form.querySelector('button[type="submit"]');
    var btnLabel  = submitBtn ? submitBtn.querySelector('span') : null;
    var msg       = document.getElementById('tkct-msg');
    var required  = form.querySelectorAll('[required]');

    function checkForm() {
        var ok = true;
        required.forEach(function(f){ if (!f.value.trim()) ok = false; });
        if (submitBtn) submitBtn.disabled = !ok;
    }
    required.forEach(function(f){
        f.addEventListener('input', checkForm);
        f.addEventListener('blur', checkForm);
    });
    checkForm();

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (submitBtn.disabled) return;

        submitBtn.disabled = true;
        if (btnLabel) btnLabel.textContent = 'Đang gửi...';
        msg.style.display = 'none';

        var fd = new FormData(form);

        var sendForm = function() {
            fetch('ajax/ajax_contact.php', {
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
                } else {
                    msg.className = 'tk-form-msg tk-form-msg--err';
                    msg.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + data.message;
                }
                if (btnLabel) btnLabel.textContent = 'Gửi Thông Tin';
                submitBtn.disabled = false;
                checkForm();
            })
            .catch(function(){
                msg.style.display = 'block';
                msg.className = 'tk-form-msg tk-form-msg--err';
                msg.innerHTML = '<i class="fas fa-exclamation-circle"></i> Lỗi kết nối. Vui lòng thử lại.';
                if (btnLabel) btnLabel.textContent = 'Gửi Thông Tin';
                submitBtn.disabled = false;
                checkForm();
            });
        };

        /* Refresh reCAPTCHA v3 token nếu có */
        if (window.grecaptcha && typeof grecaptcha.execute === 'function') {
            try {
                grecaptcha.execute('<?= isset($config["googleAPI"]["recaptcha"]["sitekey"]) ? $config["googleAPI"]["recaptcha"]["sitekey"] : "" ?>', {action: 'contact'}).then(function(token){
                    fd.set('recaptcha_response_contact', token);
                    sendForm();
                });
            } catch(ex) { sendForm(); }
        } else {
            sendForm();
        }
    });
})();
</script>