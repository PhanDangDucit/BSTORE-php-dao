<?php
   
    if(isset($_POST['btn'])) {
        $email = trim(strip_tags($_POST['email']));
        $mk = trim(strip_tags($_POST['matkhau']));
        // require_once "../models/functions.php";
        require_once "../models/users_model.php";
        require_once "../models/carts_model.php";
        $kq = check_email_pass($email, $mk); // Tra ve string or user info
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(is_string($kq) == true) {
            $_SESSION['thongbao'] = $kq;
            header("location: ../index.php?page=thongbao");
            exit();
        } else {
            $_SESSION['id_user'] = $kq['id_user'];
            $_SESSION['ho'] = $kq['ho'];
            $_SESSION['hinh'] = $kq['hinh'];
            $_SESSION['ten'] = $kq['ten'];
            $_SESSION['email'] = $kq['email'];
            $_SESSION['vaitro'] = $kq['vaitro'];
            if(isset($_SESSION['id_sp'])) {
                $id_sp = $_SESSION['id_sp'];
                unset($_SESSION['id_sp']);
                $id_user = $_SESSION['id_user'];
                $id_cart = get_id_of_cart($id_user)['id_cart'];
                $isExitsProductInCart = check_product_exists_cart($id_sp, $id_cart);
                if($isExitsProductInCart) {
                    $id_cart_item = $isExitsProductInCart['id_cart_item'];
                    $quantity = $isExitsProductInCart['quantity'] + 1;
                    update_quantity_product_cart($quantity, $id_cart_item);
                } else {
                    $quantity = 1;
                    insert_one_product($id_sp, $id_cart, $quantity);
                }
            }
            if(isset($_SESSION['back'])) {
                header('location: ' . $_SESSION['back']);
            } else {
                header('location: ../index.php');
            }
            exit();
        }
    }
    $background_logo = '../../public/images/brands/none-background_logo.svg';
?>