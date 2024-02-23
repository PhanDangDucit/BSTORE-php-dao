<?php
    require_once "pdo.php";
    // Get cart information
    function get_id_of_cart ($id_user) {
        $sql = "select id_cart from carts
        where id_user = '$id_user'";
        return get_pdo_one($sql);
    }
    // Get all products in cart of user
    function get_all_cart_item_of_user($id_user) {
        $sql = "select cart_item.id_cart_item, cart_item.id_sp, ten_sp, gia, hinh, quantity from carts
        inner join cart_item 
        on carts.id_cart = cart_item.id_cart
        inner join sanpham 
        on sanpham.id_sp = cart_item.id_sp
        where id_user = '$id_user'
        order by cart_item.ngay_them desc limit 10";
        return get_pdo($sql);
    }

    // insert a product
    function insert_one_product($id_sp, $id_cart, $quantity) {
        $sql = "insert into cart_item (id_sp, id_cart, quantity)
            value (?, ?, ?)";
        return changed_data_pdo($sql, $id_sp, $id_cart, $quantity);
    }

    // check cart of user
    function is_exists_cart($id_user) {
        $sql = "select * from carts
           where id_user = '$id_user'";
        return get_pdo_one($sql);
    }

    // function create cart for user
    function create_cart($id_user) {
        $sql = "insert into carts (id_user)
            values (?)";
        return changed_data_pdo($sql, $id_user);
    }

    // check whether product exists in user's cart
    function check_product_exists_cart($id_sp, $id_cart) {
        $sql = "select id_cart_item, quantity 
        from cart_item, carts
        where id_sp = '$id_sp'
        and cart_item.id_cart = '$id_cart'";
        return get_pdo_one($sql);
    }

    // update quantity for cart item
    function update_quantity_product_cart($quantity, $id_cart_item) {
        $sql = "update cart_item
            set quantity = ?
            where id_cart_item = ?";
        return changed_data_pdo($sql, $quantity, $id_cart_item);
    }
    // Remove product in cart of user
    function remove_cart_item($id_sp) {
        $sql = "delete from cart_item where id_sp = ?";
        return changed_data_pdo($sql, $id_sp);
    }
    // Get all products in cart of a customer
    function get_product_quantities_of_customer($id_cart) {
        $sql = "select sum(quantity) as 'all_quantities' 
        from cart_item
        where id_cart='$id_cart'";
        return get_pdo_one($sql);
    }
?>