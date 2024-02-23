<?php
    $id_user = $_SESSION['id_user'];
    $id_cart = get_id_of_cart($id_user)['id_cart'];
    if(isset($_GET["page"])) {
        $id_sp = $_GET["id-sp"];
        $isExitsProductInCart = check_product_exists_cart($id_sp, $id_cart);
        if($isExitsProductInCart) {
            $id_cart_item = $isExitsProductInCart['id_cart_item'];
            $quantity = $isExitsProductInCart['quantity'];
            if($quantity > 1) {
                $quantity -= 1;
                update_quantity_product_cart($quantity, $id_cart_item);
            } else {
                remove_cart_item($id_sp);
            }
        }
        header('location: index.php?page=cart');
    }
?>