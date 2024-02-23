<?php
    $ten_loai = trim(strip_tags($_POST['ten_loai']));
    $thutu = (int) $_POST['thutu'];
    $anhien = (int) $_POST['anhien'];
    insert_one_category($ten_loai, $thutu, $anhien);
    header('location: index.php?page=categories');
?>