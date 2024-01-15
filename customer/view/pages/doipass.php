<?php
    if(session_status() === PHP_SESSION_NONE) session_start();
    if(!isset($_SESSION['email'])) {
        $_SESSION['back'] = $_SERVER['REQUEST_URI'];
        header('location: dangnhap.php');
        exit();
    }
    $background_logo = '../../public/images/brands/none-background_logo.svg';
?>
<?php
    if(isset($_POST['btn'])) {
        require_once "../../models/functions.php";
        $email = $_SESSION['email'];
        $mkc = trim(strip_tags($_POST['matkhaucu']));
        $mkm1 = trim(strip_tags($_POST['matkhaumoi1']));
        $mkm2 = trim(strip_tags($_POST['matkhaumoi2']));
        $loi = "";
        if($mkc == "") {
            $loi.="Bạn chưa nhập mật khẩu cũ <br>";
        }
        if (is_string($kq)) {
            $loi.="Mật khẩu cũ không đúng! <br>";
        }
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
            $kq = checkEmailPass($email, $mkc);
            $mk = password_hash($mkm1, PASSWORD_BCRYPT);
            capNhatMatKhau($email, $mk);
            $_SESSION['thongbao'] = 'Đã thực hiện xong đổi mật khẩu <br>';
            header("location: ../index.php?page=thongbao");
            exit();
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
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
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
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đổi mật khẩu</h5>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Email</label>
                                    <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Nhập mật khẩu cũ</label>
                                    <input type="password" name="matkhaucu" id="form2Example27" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Nhập mật khẩu mới</label>
                                    <input type="password" name="matkhaumoi1" id="form2Example27" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Nhập lại mật khẩu mới</label>
                                    <input type="password" name="matkhaumoi2" id="form2Example27" class="form-control form-control-lg" />
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" name="btn" type="submit">Đổi mật khẩu</button>
                                </div>
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
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