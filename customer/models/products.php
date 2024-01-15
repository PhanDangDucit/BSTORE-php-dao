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
        $sql = "select sanpham.id_sp, ten_sp, gia, gia_km, hinh, ngay, RAM, CPU, Dia, Mausac, Cannang, id_loai
        from sanpham, sanphamchitiet
        where sanpham.id_sp=sanphamchitiet.id_sp and sanpham.id_sp = $id";
        return get_pdo($sql);
    };
    // function get kind of product
    function get_kind_of_product() {
        $sql = "select id_loai, ten_loai 
                from loai where anhien=1 
                order by thutu desc";
        return get_pdo($sql);
    }
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
        $sql = "select id_sp, ten_sp, gia, hinh 
        from sanpham
        where id_loai = $id
        limit $id, $page";
        return get_pdo($sql);
    }
?>