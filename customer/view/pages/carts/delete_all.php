<?php
    if(isset($_GET["page"])) {
        $id_sp = $_GET["id-sp"];
        remove_cart_item($id_sp);
        header('location: index.php?page=cart');
    }
?>