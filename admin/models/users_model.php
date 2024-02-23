<?php
    require_once "models/pdo.php";
    // get users in shop
    function get_all_user() {
        $sql = "select * from users";
        return get_pdo($sql);
    }
    // get quantities of users
    function get_quantities_user() {
        $sql = "select count(id_user) as 'quantityusers'
        from users";
        return get_pdo_one($sql);
    }
?>