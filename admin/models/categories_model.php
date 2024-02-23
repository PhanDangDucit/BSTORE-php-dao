<?php
    require_once "models/pdo.php";
    // get categories in shop
    function get_categories() {
        $sql = "select id_loai, ten_loai 
                from loai where anhien=1 
                order by thutu desc";
        return get_pdo($sql);
    }

    // Check products of a category
    function check_products_of_category($id_loai = 0) {
        $sql = "select count('$id_loai') 
            from sanpham";
        return get_pdo($sql);
    }
    // delete categories
    function delete_categories($id_loai) {
        $isExist = check_products_of_category();
        if($isExist > 0) {
            return 0;
        } else {
            $sql = "delete from loai where id_loai = ?";
            changed_data_pdo($sql, $id_loai);
            return 1;
        }
    }
    // Get name of kind
    function get_name_kind($id_loai) {
        $sql = "select ten_loai from loai where id_loai = $id_loai";
        return get_pdo_one($sql);
    }
    // Get all name kinds
    function get_all_name_kinds() {
        $sql = "select id_loai, ten_loai from loai";
        return get_pdo($sql);
    }
    // Get one kind of product
    function get_one_kind($id_loai = 0) {
        $sql = "select * from loai where id_loai = ?";
        return get_pdo_one($sql, $id_loai);
    }

    // Insert a type of product
    function chenloai($ten_loai, $thutu, $anhien) {
            $sql = "insert into loai set ten_loai = ?, thutu = ?, anhien = ?";
            changed_data_pdo($sql, $ten_loai, $thutu, $anhien);
    }
?>