<?php
    // function get kind of product
    function get_kind_of_product() {
        $sql = "select id_loai, ten_loai 
                from loai where anhien=1 
                order by thutu desc";
        return get_pdo($sql);
    }
?>