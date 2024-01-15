<?php
    $background_logo = '../../public/images/brands/none-background_logo.svg';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../models/PHPMailer-master/PHPMailer-master/src/Exception.php';
    require '../../models/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
    require '../../models/PHPMailer-master/PHPMailer-master/src/SMTP.php';

    if (isset($_POST['btn'])){
        $emailkhach = trim(strip_tags($_POST['email']));
        $hoten = trim(strip_tags($_POST['hoten']));
        $subject = trim(strip_tags($_POST['subject']));
        $noidunglienhe = nl2br(trim(strip_tags($_POST['noidunglienhe'])));
        $ndthu ="Có khách hàng liên hệ : <br><br>
                 Email : <b> $emailkhach </b> <br>
                 Họ tên : <b> $hoten </b>
                 <hr>
                 $noidunglienhe
                ";
        // $ndthu = trim(strip_tags($_POST['noidunglienhe']));
        //code gửi mail
        $mail = new PHPMailer();
        try {
            // var_export($mail);
            // $mail->SMTPDebug = true; // bật chế độ debug, chuyển thành false khi OK
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
            // $mail->SMTPOptions = array(
            // 'ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true)
            // );
            $mail->send(); //thực hiện gửi
            //thông báo gửi thành công
            if (session_status() === PHP_SESSION_NONE) session_start();        
            $_SESSION['thongbao'] ='Đã gửi liên hệ. Cảm ơn bạn';
            // $_SESSION['thongbao'] = $mail;
            
            header("location:../index.php?page=thongbao");
        } catch (Exception $e) {
            echo "Có lỗi khi gửi liên hệ: {$mail->ErrorInfo}";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../../public/css/vendor/bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    </head>
    <body>
        <section style="background-color: #000;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <iframe class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1959.4871190396184!2d106.67768255153271!3d10.813283283135922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1701829883003!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form action="" method="post">
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <span class="h1 fw-bold mb-0">
                                        <a href="../index.php">
                                            <img src="<?php echo $background_logo?>" alt="logo" height="52px">
                                        </a>
                                    </span>
                                </div>
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Khách hàng liên hệ</h5>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Tiêu đề</label>
                                    <input type="text" id="form2Example17" name="subject" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Họ và tên</label>
                                    <input type="text" id="form2Example17" name="hoten" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Email</label>
                                    <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Nội dung liên hệ</label>
                                    <textarea type="password" name="noidunglienhe" id="form2Example27" class="form-control form-control-lg" cols="" rows=""></textarea>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" name="btn" type="submit">Gửi liên hệ</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>