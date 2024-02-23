<?php
    session_start();
    if(isset($_GET['page']) == true) {
        $page = $_GET['page'];
        // $_GET = strip_tags('page');
    }
    else {
        echo $page = "";
    }
    
    
    $tygia = 25000;
    $tenkhach = "Khách hàng";
    $giờ_hiện_tại = 0;
    const TEN_WEBSITE = "WEBSITE THƯƠNG MẠI ĐIỆN TỬ I-TECH";
    const AUTHOR ="Phan Dang Duc";
    define ("EMAIL_AUTHOR", "ducpdps36800@fpt.edu.vn");
    // Import connect database file
    // require_once "models/functions.php";
    require_once "models/pdo.php";
    require_once "models/products_model.php";
    require_once "models/categories_model.php";
    require_once "models/users_model.php";
    require_once "models/carts_model.php";
    if(isset($_SESSION['vaitro'])) {
        if($_SESSION['vaitro'] == '1') {
            header('location:../admin/index.php');
        }
    }
    /* CART */
    if(isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];
        if(!is_exists_cart($id_user)) {
            // create cart for user
            create_cart($id_user);
        }
        $id_cart = get_id_of_cart($id_user)['id_cart'];
        $quantity_all_products = get_product_quantities_of_customer($id_cart)['all_quantities'];
        if(!$quantity_all_products) {
            $quantity_all_products = 0;
        }
    } else {
        $quantity_all_products = 0;
    }

    // Resolve some conditions before loading pages
    switch($page) {
        case 'delete-one':
            require_once 'view/pages/carts/delete_one.php';
            break;
        case 'delete-all':
            require_once 'view/pages/carts/delete_all.php';
            break;
        case 'cart':
            if(session_status() === PHP_SESSION_NONE) session_start();
            if(!isset($_SESSION['email']) || !isset($_SESSION['id_user'])) {
                $_SESSION['back'] = $_SERVER['REQUEST_URI'];
                if(isset($_POST['btn-add-cart'])) {
                    $_SESSION['id_sp'] = $_POST['id_sp'];
                }
                header('location: view/pages/dangnhap.php');
                exit();
            }
            // return cart_item.id_sp, ten_sp, gia, hinh, quantity
            $kq = get_all_cart_item_of_user($id_user);
            if(isset($_SESSION['id_user']) && isset($_POST['btn-add-cart'])) {
               
                    $id_sp = $_POST['id_sp'];
                    $isExitsProductInCart = check_product_exists_cart($id_sp, $id_cart);
                    if($isExitsProductInCart) {
                        $id_cart_item = $isExitsProductInCart['id_cart_item'];
                        $quantity = $isExitsProductInCart['quantity'] + 1;
                        update_quantity_product_cart($quantity, $id_cart_item);
                    } else {
                        $quantity = 1;
                        insert_one_product($id_sp, $id_cart, $quantity);
                    }
                    header('location: index.php?page=cart');
                
            }
            // header('location: index.php?page=cart');
    }
?>