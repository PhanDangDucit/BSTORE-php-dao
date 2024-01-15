<?php
    session_start();
    $background_logo = '../../public/images/brands/none-background_logo.svg';
    if(isset($_POST['btn-forgot'])) {
        $_SESSION['email'] = $_POST['email'];
        $email = $_SESSION['email'];
    }
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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
        <style>
            img {
                height: 100px;
            }
            /* signin.php */
            #frmdn { 
                width: 700px; 
                margin: 46px auto; 
                border: 1px solid darkcyan;
            }
            #frmdn h2 { 
                background: darkcyan; 
                color:white; 
                padding: 10px; 
                margin:0;
            }
            #frmdn > div { 
                padding: 10px 10px; 
                border-bottom: 1px dotted darkcyan; 
            }
            #frmdn label {
                display: inline-block;
                width:120px;
            }
            #frmdn .txt { 
                padding: 8px;
                width: calc(100% - 130px); 
                outline: none;
            }
            #frmdn button { 
                width: 120px; 
                height: 35px;
            }
            #frmdn .btn-forgot { 
                margin-left: 16px;
            }
            .header-sub {
                background-color: orange;
                height: 92px;
            }
            #frmdoipass {
                width: 800px; 
                margin: 46px auto; 
                border: 1px solid darkcyan;
            }
            #frmdoipass h2 { 
                background: darkcyan; 
                color:white; 
                padding: 10px; 
                margin: 0; 
            }
            #frmdoipass > div { 
                padding: 10px 10px; 
                border-bottom: 1px dotted darkcyan; 
            }
            #frmdoipass label {
                display: inline-block;
                width:180px 
            }
            #frmdoipass .txt { 
                padding: 8px; 
                width: calc(100% - 190px); 
                outline: none;
            }
            #frmdoipass button{ 
                width: 120px; 
                height: 35px;
            }
            .header-sub {
                background-color: orange;
                height: 92px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg header-sub w-25">
            <div class="container h-100 ">
                <a class="navbar-brand" href="../index.php">
                    <img src="<?php echo $background_logo?>" alt="logo" class="logo h-100">
                </a>
            </div>
        </nav>
        <?php
            if(isset($_POST['btn-forgot']) == false) {
            echo '<form action="" method="post" id="frmdn">
                <h2>LẤY MÃ XÁC NHẬN</h2>
                <?php ?>
                <div> 
                    <label>Email</label> 
                    <input type="email" class="txt" name="email" required> 
                </div>
                <div> 
                    <label></label> 
                    <button name="btn-forgot" type="submit">Get code</button> 
                </div>
            </form>'}
        if(isset($_POST['btn-forgot'])) {
            '<form action="" method="post" id="frmdn">
                <h2>NHẬP MÃ XÁC NHẬN</h2>
                <?php ?>
                <div> 
                    <label>code</label> 
                    <input type="number" class="txt" name="code" required> 
                </div>
                <div> 
                    <label></label> 
                    <button name="btn-code" type="submit">Submit</button> 
                </div>
            </form>';
        }
        if(isset($_POST['btn-code'])) {
            if($_POST['code'] = $_SESSION['code']) {
                echo '<form action="" method="post" id="frmdoipass">
                    <h2>ĐỔI MẬT KHẨU</h2>
                    <div> 
                        <label>Email</label> 
                        <input class="txt" name="email" value="'. $email . '" disabled> 
                    </div>
                    <div> 
                        <label>Nhập mật khẩu mới</label> 
                        <input type="password" class="txt" name="matkhaumoi1"> 
                    </div>
                    <div> 
                        <label>Nhập lại mật khẩu mới</label> 
                        <input type="password" class="txt" name="matkhaumoi2"> 
                    </div>
                    <div> 
                        <label></label>
                        <button name="btn" type="submit">Đổi mật khẩu</button> 
                    </div>
                </form>';
            }
        }
        ?>
    </body>
</html>