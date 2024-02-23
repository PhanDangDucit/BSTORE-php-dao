<?php
    session_start();
    // 
    if(isset($_POST['btn-forgot'])) {
        $_SESSION['email'] = $_POST['email'];
        $email = $_SESSION['email'];
    }
    // 
    if(isset($_POST['btn-code'])) {
        $email = $_SESSION['email'];
    }
    // 
    if(isset($_POST['btn'])) {
        $email = $_SESSION['email'];
        require_once "../utils/functions.php";
        $mkm1 = trim(strip_tags($_POST['matkhaumoi1']));
        $mkm2 = trim(strip_tags($_POST['matkhaumoi2']));
        $loi = "";
        if(strlen($mkm1) < 6) {
            $loi.="Mật khẩu mới quá ngắn! <br>";
        }
        if($mkm1 != $mkm2) {
            $loi.="Mật khẩu mới không giống nhau <br>";
        }
        if($loi != "") {
            $_SESSION['thongbao'] = $loi;
            header("location: ../index.php?page=thongbao");
        }
        if($loi == "") {
            $mk = password_hash($mkm1, PASSWORD_BCRYPT);
            capNhatMatKhau($email, $mk);
            $_SESSION['thongbao'] = 'Đã thực hiện xong đổi mật khẩu <br>';
            header("location: ../index.php?page=thongbao");
            exit();
        }
    }
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../../models/PHPMailer-master/PHPMailer-master/src/Exception.php';
    require '../../models/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
    require '../../models/PHPMailer-master/PHPMailer-master/src/SMTP.php';
    if (isset($_POST['btn-forgot'])){
        $email = $_SESSION['email'];
        $emailkhach = trim(strip_tags($_POST['email']));
        $subject = 'MA XAC NHAN';
        $noidunglienhe = 896532;
        $ndthu ="Có khách hàng liên hệ : <br><br>
        Email : <b> $emailkhach </b> <br>
        <p>Mã xác nhận</p>
        <hr>
            $noidunglienhe
        ";
        $_SESSION['code'] = $noidunglienhe;
        //code gửi mail
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  // Địa chỉ server gửi thư
            $mail->SMTPAuth   = true;               // Cho phép authentication
            $mail->Username   = 'ducpdps36800@fpt.edu.vn'; // Địa chỉ hộp thư gửi đi
            $mail->Password   = 'ghcp cqwk xdus yfsn';  // Mật khẩu ứng dụng đã tạo trong hộp thư
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->charSet = "UTF-8";
            
            $mail->addAddress('ducpdps36800@fpt.edu.vn','Phan Dang Duc'); // địa chỉ và tên người nhận 
            $mail->isHTML(true); //format HTML
            $mail->Subject = $subject; //tiêu đề thư
            $mail->Body    = $ndthu;   //nội dung thư
            $mail->send(); //thực hiện gửi
        } catch (Exception $e) {
            echo "Có lỗi khi gửi liên hệ: {$mail->ErrorInfo}";
        }
    }
?>