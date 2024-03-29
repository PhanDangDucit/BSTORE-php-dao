<?php
    require_once 'controllers/index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <title>Admin - Bstore</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <nav class="sidebar bg-primary">
                <ul>
                    <li>
                        <a href="index.php?page=home"><i class="fa-solid fa-house ico-side"></i>Dashboards</a>
                    </li>
                    <li>
                        <a href="index.php?page=order"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản lí đơn hàng</a>
                    </li>
                    <li>
                        <a href="index.php?page=categories"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh mục</a>
                    </li>
                    <li>
                        <a href="index.php?page=products"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?page=users"><i class="fa-solid fa-user ico-side"></i>Quản lí khách hàng</a>
                    </li>
                    <li>
                        <a href="index.php?page=comments"><i class="fa-solid fa-user ico-side"></i>Quản lí bình luận</a>
                    </li>
                    <li>
                        <a href="index.php?page=logout"><i class="fa-solid fa-user ico-side"></i>Đăng Xuất</a>
                    </li>
                </ul>
            </nav>
            <?php
                if(isset($page)) {
                    switch ($page) {
                        case 'categories':
                            require_once 'categories.php';
                            break;
                        case 'order':
                            require_once 'order.php';
                            break;
                        case 'products':
                            require_once 'products.php';
                            break;
                        case 'users':
                            require_once 'users.php';
                            break;
                        case 'categories':
                            require_once 'categories.php';
                            break;
                        case 'logout':
                            require_once 'logout.php';
                            break;
                        case 'edit-categories':
                            require_once 'edit-categories.php';
                            break;
                        default:
                            require_once 'home.php';
                            break;
                    }
                } else {
                    require_once 'home.php';
                }
            ?>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>