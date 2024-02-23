<?php
    session_start();
    if(isset($_GET['id_loai'])) {
        $id_loai = $_GET['id_loai'];
        $isDelete = delete_categories($id_loai);
        if($isDelete) {
            $_SESSION['delete_success'] = 'Delete categories successfully!';
        } else {
            $_SESSION['delete_failed'] = 'Delete categories failed!';
        }
        header("location: index.php?page=categories");
    }
?>