<?php
    // Get for function that doesn't have any arguments.
    function product_select_all() {
        $sql = "select * from product order by id desc";
        return get_pdo($sql);
    }

    // Get featured products
    function product_select_hot() {
        $sql = "select id_sp, ten_sp, gia, hinh
                from sanpham
                where anhien=1 and hot=1
                order by Ngay
                desc limit 0,9";
        return get_pdo($sql);
    }

    // Get detail products
    function get_detail_products($id) {
        $sql = "select sanpham.id_sp, ten_sp, gia, gia_km, hinh, RAM, CPU, Dia, Mausac, Cannang, id_loai
        from sanpham, sanphamchitiet
        where sanpham.id_sp=sanphamchitiet.id_sp and sanpham.id_sp = $id";
        return get_pdo_one($sql);
    };
    // Hot products
    function get_hot_products() {
        $sql = "select id_sp, ten_sp, gia, hinh
        from sanpham
        where anhien=1 and hot=1
        order by Ngay
        desc limit 0,9";
        return get_pdo($sql);
    }
    // Get leading watched products
    function get_watched_products() {
        $sql = "select id_sp, ten_sp, gia, hinh 
            from sanpham order by soluotxem desc 
            limit 0,9";
        return get_pdo($sql);
    }
    // Get related products
    function getRelatedProducts($id, $page) {
        if($id == 0) {
            $id = 1;
        }
        $sql = "select id_sp, ten_sp, gia, hinh 
        from sanpham
        where id_loai = $id
        limit $id, $page";
        return get_pdo($sql);
    }
    // Get list the same type of products
    function get_list_same_type_product($id = 1, $page_num = 1, $page_size = 10) {
        $start_row = ($page_num - 1) * $page_size;
        $sql = "select id_sp, ten_sp, gia, hinh, ngay, ten_loai
        from sanpham, loai
        where loai.id_loai = sanpham.id_loai and sanpham.id_loai = $id
        order by ngay desc limit $start_row, $page_size";
        return get_pdo($sql);
    }

    // get type of one product
    function get_type_of_on_product($id_sp) {
        $sql = "select ten_loai
        from sanpham, loai
        where loai.id_loai = sanpham.id_loai and sanpham.id_sp = '$id_sp'";
        return get_pdo_one($sql);
    }
   
    
?>