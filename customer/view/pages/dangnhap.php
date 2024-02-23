<?php 
    require_once "../../controller/signin_controller.php";
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../../public/images/favicon.svg">
        <title>BSTORE</title>
        <link rel="stylesheet" href="../../public/css/vendor/bootstrap.min.css">
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
                            <form action="../../controller/signin_controller.php" method="post" id="form-signin">
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <span class="h1 fw-bold mb-0">
                                        <a href="../../index.php">
                                            <img src="<?php echo $background_logo ?>" alt="logo" height="52px">
                                        </a>
                                    </span>
                                </div>
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Email<?php if(isset($_SESSION['id_sp'])) {
        echo ('hello');
    }?></label>
                                    <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Password <?php if(isset($temp)) { echo $temp;}?></label>
                                    <input type="password" name="matkhau" id="form2Example27" class="form-control form-control-lg" />
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" name="btn" type="submit">Login </button>
                                </div>
                                <a class="small text-muted" href="../pages/forgot_password.php">Forgot password?</a>
                                <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? 
                                    <a href="./dangky.php" style="color: #393f81;">Register here</a>
                                </p>
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
        <?php if(isset($temp)) { ?>
            <form action="index.php?page=cart" class="w-full h-full d-none" method="post" id="form-add-cart">
                <button type="submit" name="btn-add-cart">
                    <i class="me-1 fa fa-shopping-basket"></i> Add to cart
                </button>
                <input type="text" hidden name="id_sp" value="<?=$_POST['id_sp']?>"/>
            </form>
        <?php }; ?>
        <script>
            const formSignin = document.querySelector('form-signin');
            const formAddCart = document.getElementById('form-add-cart') || undefined;
            if(formAddCart) {
                console.log(formAddCart);
            }
        </script>
    </body>
</html>