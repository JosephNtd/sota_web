<?php
    /* Đăng ký nhận tin */
    $nametype = "newsletter";
    $config['newsletter'][$nametype]['title_main'] = "Đăng ký nhận tin";
    $config['newsletter'][$nametype]['file'] = false;
    $config['newsletter'][$nametype]['email'] = true;
    $config['newsletter'][$nametype]['guiemail'] = true;
    $config['newsletter'][$nametype]['ten'] = true;
    $config['newsletter'][$nametype]['dienthoai'] = true;
    $config['newsletter'][$nametype]['diachi'] = false;
    $config['newsletter'][$nametype]['chude'] = false;
    $config['newsletter'][$nametype]['noidung'] = false;
    $config['newsletter'][$nametype]['ghichu'] = false;
    $config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Đã xem", "2" => "Đã liên hệ", "3" => "Đã thông báo");
    $config['newsletter'][$nametype]['showten'] = true;
    $config['newsletter'][$nametype]['showdienthoai'] = true;
    $config['newsletter'][$nametype]['showngaytao'] = true;
    $config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';


    /* Đăng ký tư vấn */
    $nametype = "dang-ky-tu-van";
    $config['newsletter'][$nametype]['title_main'] = "Đăng ký tư vấn";
    $config['newsletter'][$nametype]['file'] = false;
    $config['newsletter'][$nametype]['email'] = false;
    $config['newsletter'][$nametype]['guiemail'] = false;
    $config['newsletter'][$nametype]['ten'] = true;
    $config['newsletter'][$nametype]['dienthoai'] = true;
    $config['newsletter'][$nametype]['diachi'] = true;
    $config['newsletter'][$nametype]['chude'] = true;
    $config['newsletter'][$nametype]['chude_label'] = "Tên trường đang công tác"; // nhãn tùy biến cho cột chude
    $config['newsletter'][$nametype]['noidung'] = false;
    $config['newsletter'][$nametype]['ghichu'] = false;
    $config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Đã xem", "2" => "Đã liên hệ", "3" => "Đã tư vấn");
    $config['newsletter'][$nametype]['showten'] = true;
    $config['newsletter'][$nametype]['showdienthoai'] = true;
    $config['newsletter'][$nametype]['showngaytao'] = true;
    $config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';
?>