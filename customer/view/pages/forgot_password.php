<?php
    require_once "../../controller/forgot_password_controller.php";
    $background_logo = '../../public/images/brands/none-background_logo.svg';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/password-resets/password-reset-6/assets/css/password-reset-6.css">
        <!-- <link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css"> -->
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
                height: 92px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg header-sub bg-black w-full">
            <div class="container h-100 w-25">
                <a class="navbar-brand" href="../../index.php">
                    <img src="<?php echo $background_logo?>" alt="logo" class="logo h-100">
                </a>
            </div>
        </nav>
        <?php
            if(!isset($_POST['btn-forgot']) && !isset($_POST['btn-code'])) {
        ?>
            <!-- Password Reset 6 - Bootstrap Brain Component -->
            <section class="p-3 p-md-4 p-xl-5">
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="card border-0 shadow-sm rounded-4" style="background-color: #ccc;">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h2 class="h3">Password Reset</h2>
                                        <h3 class="fs-6 fw-normal text-secondary m-0">Provide the email address associated with your account to recover your password.</h3>
                                    </div>
                                </div>
                            </div>
                            <form action=""  method="post">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button name="btn-forgot" class="btn bsb-btn-2xl btn-primary" type="submit">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                        <a href="#!" class="link-secondary text-decoration-none">Login</a>
                                        <a href="#!" class="link-secondary text-decoration-none">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        <?php }; ?>;
        <?php
            if(isset($_POST['btn-forgot'])) { ?>
                <form action="" method="post" id="frmdn">
                    <h2>NHẬP MÃ XÁC NHẬN</h2>
                    <div> 
                        <label>code</label>
                        <input type="number" class="txt" name="code" required>
                    </div>
                    <div> 
                        <label></label> 
                        <button name="btn-code" type="submit">Submit</button> 
                    </div>
                </form>
        <?php }; ?>
        <?php
            if(isset($_POST['btn-code'])) {
                if($_POST['code'] = $_SESSION['code']) { ?>
                    <form action="" method="post" id="frmdoipass">
                        <h2>ĐỔI MẬT KHẨU</h2>
                        <div> 
                            <label>Email</label> 
                            <input class="txt" name="email" value="<?=$email?>" disabled> 
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
                    </form>
        <?php
                }
            }
        ?>
    </body>
</html>