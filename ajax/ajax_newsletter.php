<?php
/**
 * AJAX Newsletter (Đăng ký tư vấn)
 * POST → insert #_newsletter → trả JSON
 */
header('Content-Type: application/json; charset=utf-8');
include "ajax_config.php";

/* --- Chỉ chấp nhận POST --- */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

/* --- reCAPTCHA verify (best-effort) --- */
$captchaOk = true;
if (isset($config['googleAPI']['recaptcha']['secretkey']) && $config['googleAPI']['recaptcha']['secretkey'] != '') {
    $token = isset($_POST['recaptcha_response_newsletter']) ? $_POST['recaptcha_response_newsletter'] : '';
    if ($token != '') {
        $verify = @file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret=" .
            $config['googleAPI']['recaptcha']['secretkey'] . "&response=" . $token
        );
        if ($verify) {
            $result = json_decode($verify);
            if (isset($result->success) && !$result->success) {
                $captchaOk = false;
            }
        }
    }
}

if (!$captchaOk) {
    echo json_encode(['success' => false, 'message' => 'Xác minh reCAPTCHA thất bại. Vui lòng thử lại.']);
    exit;
}

/* --- Validate --- */
$ten       = isset($_POST['name-newsletter'])   ? trim(htmlspecialchars($_POST['name-newsletter']))   : '';
$dienthoai = isset($_POST['phone-newsletter'])  ? trim(htmlspecialchars($_POST['phone-newsletter']))  : '';
$truong    = isset($_POST['truong-newsletter'])  ? trim(htmlspecialchars($_POST['truong-newsletter']))  : '';
$diachi    = isset($_POST['diachi-newsletter'])  ? trim(htmlspecialchars($_POST['diachi-newsletter']))  : '';
$email     = isset($_POST['email-newsletter'])   ? trim(htmlspecialchars($_POST['email-newsletter']))   : '';

if ($ten === '' || $dienthoai === '') {
    echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ họ tên và số điện thoại.']);
    exit;
}

/* --- Insert DB --- */
$data = [
    'ten'       => $ten,
    'dienthoai' => $dienthoai,
    'email'     => $email,
    'diachi'    => $diachi,
    'chude'     => $truong,
    'noidung'   => '',
    'type'      => 'dang-ky-tu-van',
    'ngaytao'   => time(),
    'stt'       => 1,
    'hienthi'   => 1
];

try {
    $d->insert('newsletter', $data);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống. Vui lòng thử lại sau.']);
    exit;
}

/* --- Gửi email admin (best-effort, không block response) --- */
try {
    require_once LIBRARIES . "class/class.Email.php";
    $emailer = new Email($d);

    if (isset($config['website']['sendmail']) && $config['website']['sendmail'] == true) {
        $emailer->setEmail('tennguoigui', $ten);
        $emailer->setEmail('emailnguoigui', $email);
        $emailer->setEmail('dienthoainguoigui', $dienthoai);
        $emailer->setEmail('diachinguoigui', $diachi);
        $emailer->setEmail('tieudelienhe', 'Đăng ký tư vấn');
        $emailer->setEmail('noidunglienhe', 'Trường: ' . $truong);

        $strThongtin = '';
        if ($ten)       $strThongtin .= '<span style="text-transform:capitalize">' . $ten . '</span><br>';
        if ($email)     $strThongtin .= '<a href="mailto:' . $email . '">' . $email . '</a><br>';
        if ($dienthoai) $strThongtin .= 'Tel: ' . $dienthoai . '<br>';
        if ($diachi)    $strThongtin .= 'Địa chỉ: ' . $diachi . '<br>';
        if ($truong)    $strThongtin .= 'Trường: ' . $truong;
        $emailer->setEmail('thongtin', $strThongtin);

        $setting = $d->rawQueryOne("select tenvi from #_setting limit 0,1");
        $subject = "Đăng ký tư vấn từ " . ($setting ? $setting['tenvi'] : 'Website');
        $message = '<p>Bạn nhận được đăng ký tư vấn mới:</p><p>' . $strThongtin . '</p>';

        @$emailer->sendEmail("admin", null, $subject, $message, '');
    }
} catch (Exception $e) {
    /* Email fail → vẫn trả success vì DB đã insert */
}

echo json_encode(['success' => true, 'message' => 'Đăng ký tư vấn thành công! Chúng tôi sẽ liên hệ quý Thầy/Cô trong thời gian sớm nhất.']);
