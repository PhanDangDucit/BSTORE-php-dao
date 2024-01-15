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
    $tieuchi = [
        "Giá sản phẩm tốt nhất", 
        "Cung cấp chỉ hàng chính hãng", 
        "Phục vụ khách hàng tận tâm",  
        "Miễn phí lắp đặt và vận chuyển", 
        "Dịch vụ hậu mãi chu đáo"
    ];
    const TEN_WEBSITE = "WEBSITE THƯƠNG MẠI ĐIỆN TỬ I-TECH";
    const AUTHOR ="Phan Dang Duc";
    define ("EMAIL_AUTHOR", "ducpdps36800@fpt.edu.vn");
    // Import connect database file
    // require_once "models/functions.php";
    require_once "models/pdo.php";
    require_once "models/products.php";
    if(isset($_SESSION['vaitro'])) {
        if($_SESSION['vaitro'] == '1')
        header('location:../../admin/index.php');
    }
?>