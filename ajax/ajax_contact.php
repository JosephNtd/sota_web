<?php
/**
 * AJAX Contact (Liên hệ)
 * POST → insert #_contact → trả JSON
 */
header('Content-Type: application/json; charset=utf-8');
include "ajax_config.php";

/* --- Chỉ chấp nhận POST --- */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

/* --- reCAPTCHA verify --- */
$captchaOk = true;
if (isset($config['googleAPI']['recaptcha']['secretkey']) && $config['googleAPI']['recaptcha']['secretkey'] != '') {
    $token = isset($_POST['recaptcha_response_contact']) ? $_POST['recaptcha_response_contact'] : '';
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
$ten       = isset($_POST['ten'])       ? trim(htmlspecialchars($_POST['ten']))       : '';
$dienthoai = isset($_POST['dienthoai']) ? trim(htmlspecialchars($_POST['dienthoai'])) : '';
$email     = isset($_POST['email'])     ? trim(htmlspecialchars($_POST['email']))     : '';
$noidung   = isset($_POST['noidung'])   ? trim(htmlspecialchars($_POST['noidung']))   : '';
$diachi    = isset($_POST['diachi'])    ? trim(htmlspecialchars($_POST['diachi']))    : '';
$tieude    = isset($_POST['tieude'])    ? trim(htmlspecialchars($_POST['tieude']))    : 'Liên hệ từ website';

/* Lĩnh vực (checkbox group → CSV) */
$linhvuc = '';
if (isset($_POST['linhvuc']) && is_array($_POST['linhvuc'])) {
    $linhvuc_clean = array_map(function ($v) { return htmlspecialchars(trim($v)); }, $_POST['linhvuc']);
    $linhvuc = implode(', ', $linhvuc_clean);
}

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
    'tieude'    => $tieude,
    'noidung'   => $noidung,
    'linhvuc'   => $linhvuc,
    'ngaytao'   => time(),
    'type'      => 'contact',
    'stt'       => 1
];

try {
    $d->insert('contact', $data);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống. Vui lòng thử lại sau.']);
    exit;
}

/* --- Gửi email admin (best-effort) --- */
try {
    require_once LIBRARIES . "class/class.Email.php";
    $emailer = new Email($d);

    if (isset($config['website']['sendmail']) && $config['website']['sendmail'] == true) {
        $emailer->setEmail('tennguoigui', $ten);
        $emailer->setEmail('emailnguoigui', $email);
        $emailer->setEmail('dienthoainguoigui', $dienthoai);
        $emailer->setEmail('diachinguoigui', $diachi);
        $emailer->setEmail('tieudelienhe', $tieude);
        $emailer->setEmail('noidunglienhe', $noidung);

        $strThongtin = '';
        if ($ten)       $strThongtin .= '<span style="text-transform:capitalize">' . $ten . '</span><br>';
        if ($email)     $strThongtin .= '<a href="mailto:' . $email . '">' . $email . '</a><br>';
        if ($dienthoai) $strThongtin .= 'Tel: ' . $dienthoai . '<br>';
        if ($diachi)    $strThongtin .= 'Địa chỉ: ' . $diachi . '<br>';
        if ($linhvuc)   $strThongtin .= 'Lĩnh vực: ' . $linhvuc . '<br>';
        $emailer->setEmail('thongtin', $strThongtin);

        $setting = $d->rawQueryOne("select tenvi from #_setting limit 0,1");
        $subject = "Thư liên hệ từ " . ($setting ? $setting['tenvi'] : 'Website');
        $message = '<p>Bạn nhận được liên hệ mới:</p><p>' . $strThongtin . '</p>'
                 . '<p><strong>Nội dung:</strong> ' . $noidung . '</p>';

        @$emailer->sendEmail("admin", null, $subject, $message, '');
    }
} catch (Exception $e) {
    /* Email fail → vẫn trả success vì DB đã insert */
}

echo json_encode(['success' => true, 'message' => 'Gửi liên hệ thành công! Chúng tôi sẽ phản hồi trong thời gian sớm nhất.']);
