<?php
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        if(isset($_SESSION['vaitro']) && $_SESSION['vaitro'] == '1') {
            header('location:../admin/index.php');
        }
    }
    require_once "models/pdo.php";
    require_once "models/categories_model.php";
    require_once "models/products_model.php";
    require_once "models/users_model.php";
    if(isset($page)) {
        switch ($page) {
            case 'delete-category':
                require_once 'delete-categories.php';
                break;
            case 'add-product':
                require_once 'add_product.php';
                break;
            
            case 'add-product_':
                require_once 'add_product_.php';
                break;
            case 'delete-product':
                require_once 'delete-product.php';
                break;
        }
    }
?>