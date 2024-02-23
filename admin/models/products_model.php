<?php
    // Get quantities of products
    function get_quantities_product() {
        $sql = "select count(id_sp) as 'quantityproducts'
            from sanpham";
        return get_pdo_one($sql);
    }
    // get quantities of type of product
    function get_quantities_kind() {
        $sql = "select count(id_loai) as 'quantitykinds'
        from loai";
        return get_pdo_one($sql);
    }
    // get all products
    function get_all_products() {
        $sql = "select * from sanpham order by Ngay desc limit 0,10";
        return get_pdo($sql);
    }
    // Delete one product
    function delete_one_product($id_sp) {
        $sql = "delete from sanpham where id_sp = ?";
        changed_data_pdo($sql, $id_sp);
    }
?>