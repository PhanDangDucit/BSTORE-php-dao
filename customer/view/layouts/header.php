<?php
    $background_logo = 'public/images/brands/none-background_logo.svg';
    $account_info = [
        ['item'=>'signin', 'link'=>'dangnhap'],
        ['item'=>'signup', 'link'=>'dangky'],
    ];
    $account_info_signed = [
        ['item'=>'Hồ sơ', 'link'=>'profile'],
        ['item'=>'Thay đổi mật khẩu', 'link'=>'doipass'],
        ['item'=>'Đăng xuất', 'link'=>'thoat'],
    ];
    if(isset($_SESSION['ten'])) {
        $account_action = $account_info_signed;
    } else {
        $account_action = $account_info;
    }
?>

<style>
    .navbar {
        height: 92px !important;
    }
    .logo {
        height: 100%;
    }
    #quantity-cart {
        color: #fff;
    }
    #nav-main ul {
        display: flex;
        justify-content: center;
    }
    #nav-main ul li {
        width: 120px;
        text-align: center;
        list-style-type: none;
    }
    #nav-main ul li a {
        color: #fff;
        padding: 16px 0;
        display: block;
        text-decoration: none;
    }
    #nav-main ul li a:hover {
        color: #000;
        background-color: #fff;
    }
</style>

<nav id = "nav-nav" class="navbar navbar-expand-lg">
    <div class="container h-100">
        <a class="navbar-brand" href="index.php">
            <img src="<?php echo $background_logo?>" alt="logo" class="logo h-100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Topnav -->
        <div id="topnav" class="d-flex justify-content-between">
            <form class="d-flex w-50" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <span>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item position-relative">
                    <a class="nav-link active" aria-current="page" href="index.php?page=cart">
                        <i class="fa-solid fa-cart-shopping text-white"></i>
                    </a>
                    <span id="quantity-cart" class="position-absolute">
                        <p>0</p>
                    </span>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            echo isset($_SESSION['ten']) ? $_SESSION['ten'] : 'Account';
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach($account_action as $item) { ?>
                            <li>
                                <a class="dropdown-item" href="pages/<?php echo $item['link']; ?>.php"><?php echo $item['item']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav id="nav-main">
    <?php require_once "loaisp.php" ?>
</nav>

<script>
    showQuantity();
</script>