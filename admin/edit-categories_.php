<?php
    require_once "models/categories_model.php";
    $id_loai = (int) $_POST['id_sp'];
    $ten_loai = trim(strip_tags($_POST['ten_loai']));
    $thutu = (int) $_POST['thutu'];
    $anhien = (int) $_POST['anhien'];
    $kq = edit_one_type_of_product($id_loai, $ten_loai, $thutu, $anhien);
    if($kq == true) header('location: index.php?page=categories');
?>