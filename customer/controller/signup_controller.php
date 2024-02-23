<?php
    session_start();
    if(isset($_POST['btn'])) {
        // start session
        // Nhan data tu form
        $ho = trim(strip_tags($_POST['ho']));
        $ten = trim(strip_tags($_POST['ten']));
        $email = trim(strip_tags($_POST['email']));
        $mk = trim(strip_tags($_POST['matkhau']));
        $vaitro = trim(strip_tags($_POST['vaitro']));
        $dienthoai = trim(strip_tags($_POST['dienthoai']));
        $diachi = trim(strip_tags($_POST['diachi']));
        // Validate datas of form
        $loi = "";
        if($email=="" || filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $loi .= 'Bạn chưa nhập đúng email<br>';
        }
        if(strlen($mk) < 6) $loi.="Bạn nhập mật khẩu quá ngắn<br>";
        if($loi != "") {
            $_SESSION['thongbao'] = $loi;
            header("location:../index.php?page=thongbao");
            exit();
        }
        // Chen vao database
        require_once "../models/users_model.php";
        // require_once "../../models/functions.php";
        $mk = password_hash($mk, PASSWORD_BCRYPT);
        $kq = create_new_user($ho, $ten, $email, $mk, $vaitro, $dienthoai, $diachi);
        if($kq) {
            $_SESSION['thongbao'] = "Chúc mừng bạn đã đăng ký tài khoản thành công! </br>";
            header("location:../view/pages/dangnhap.php");
        } else {
            $_SESSION['thongbao'] = "Email này đã được sử dụng $email </br>";
            header("location:../index.php?page=thongbao");
        }
    }
    $background_logo = '../../public/images/brands/none-background_logo.svg';
?>