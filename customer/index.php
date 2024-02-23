<?php
    require_once "controller/index.php";
    
?>
<head>
    <title>BSTORE</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/css/vendor/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="public/css/vendor/bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link href="public/css/styles/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="public/images/favicon.svg">
    <script src="public/js/logicUI.js"></script>
</head>
<body>
    <header>
        <?php
            // $handle = curl_init($url);
            // curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
            
            // /* Get the HTML or whatever is linked in $url. */
            // $response = curl_exec($handle);
            
            // /* Check for 404 (file not found). */
            // $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            // if($httpCode == 404) {
            //     /* Handle 404 here. */
            // }
            
            // curl_close($handle);
            
            /* Handle $response here. */
            require_once "view/layouts/header.php";
        ?>
    </header>
    <div class="container content-main">
        <main class="row">
            
            <?php 
                $url = $_SERVER['REQUEST_URI'];
                $is_home_page_url = $url== '/duanmau/project/customer/index.php'|| $url == '/duanmau/project/customer/';
                if($is_home_page_url) {
                    require_once "view/components/banner.php"; ?>
                    <aside class="col-3">'
                        <?php
                            require_once "view/layouts/aside.php"
                        ?>
                    </aside>
               <?php } ?>
            <article 
                <?php 
                    if($is_home_page_url) {
                        echo 'class="col-9"';
                    } else {
                        echo 'class="col-12"';
                    }
                ?>
            >
                <?php
                    switch($page) {
                        case 'sp':
                            require_once 'view/pages/sp_chitiet.php'; 
                            break;
                        case 'loai':
                            require_once 'view/pages/sp_trongloai.php';
                            break;
                        case 'cart':
                            require_once 'view/pages/giohang.php';
                            break;
                        case 'thongbao':
                            require_once 'view/pages/thongbao.php';
                            break;
                        case 'payment':
                            require_once 'view/pages/payment.php';
                        default:
                            if($is_home_page_url) {
                                require_once 'view/pages/home.php';
                            }
                            break;
                    }
                ?>
            </article>
        </main>
    </div>
    
    <?php
        require_once "view/layouts/footer.php"
    ?>
    <script src="public/css/vendor/bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
