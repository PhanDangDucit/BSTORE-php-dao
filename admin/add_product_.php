<?php
    if(isset($_POST['btn'])) {
        $ten_sp = trim(strip_tags($_POST['tensp']));
        $id_loai = (int) $_POST['loaisp'];
        $gia = (int) $_POST['gia'];
        $anhien = (int) $_POST['anhien'];
        $soluotxem = 0;
        require_once "../../../models/functions.php";
        $kq = chensp($ten_sp, $id_loai, $soluotxem, $gia, $anhien);
        $_SESSION['thongbao'] = 'Đã thêm sản phẩm';
        if($kq == true) header('location:../../index.php?page=thongbao');
    }
?>