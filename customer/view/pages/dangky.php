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
        $dienthoai = trim(strip_tags($_POST['diachi']));
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
        
        // Chen vao datatbase
        require_once "../../models/functions.php";
        $mk = password_hash($mk, PASSWORD_BCRYPT);
        $kq = createNewUser($ho, $ten, $email, $mk, $vaitro, $dienthoai, $diachi);
        if($kq) {
            $_SESSION['thongbao'] = "Chúc mừng bạn đã đăng ký tài khoản thành công! </br>";
        } else {
            $_SESSION['thongbao'] = "Email này đã được sử dụng $email </br>";
        }
        header("location:dangnhap.php");
    }
    $background_logo = '../../public/images/brands/none-background_logo.svg';

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
                            alt="login form" class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;" />
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
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng ký thành viên</h5>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Email</label>
                                    <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Password</label>
                                    <input type="password" name="matkhau" id="form2Example27" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Họ</label>
                                    <input type="text" id="form2Example17" name="ho" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Tên</label>
                                    <input type="text" id="form2Example17" name="ten" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Điện thoại</label>
                                    <input type="text" name="dienthoai" id="form2Example27" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Địa chỉ</label>
                                    <input type="text" name="diachi" id="form2Example27" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Vai trò</label>
                                    <select class="form-select" name="vaitro" aria-label="Default select example">
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" name="btn" type="submit">Đăng ký</button>
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