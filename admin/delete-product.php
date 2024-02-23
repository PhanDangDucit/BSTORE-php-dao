<?php
    session_start();
    if(isset($_GET['id_sp'])) {
        $id_sp = $_GET['id_sp'];
        delete_one_product($id_sp);
        $_SESSION['delete_success'] = 'Delete product successfully!';
        header("location: index.php?page=products");
    }
?>