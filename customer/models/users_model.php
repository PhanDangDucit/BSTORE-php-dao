<?php
    require_once 'pdo.php';
;    // Get for function that doesn't have any arguments.
    function users_select_all() {
        $sql = "select * from users order by id desc";
        return get_pdo($sql);
    }

    // Check email of users
    function check_email_pass($email, $mk) {
        $sql = "select * from users where email='$email'";
        $result = get_pdo_one($sql);
        if($result==null) return "Tài khoản không tồn tại";
        $mk_passHashed = '';
        $mk_passHashed = $result['matkhau'];
        if(!password_verify($mk, $mk_passHashed)) {
            return "Mật khẩu không đúng";
        } else {
            return $result;
        }
    }

    // check exits account
    function checkExitsAccount($email) {
        $sql = "select * 
        from users
        where email='$email'";
        return get_pdo_one($sql);
    }

    // Post to create a new user
    function create_new_user($ho, $ten, $email, $mk, $vaitro, $dienthoai, $diachi) {
        if(!checkExitsAccount($email)) {
            $sql = "insert into users (ho, ten, email, matkhau, vaitro, dienthoai, diachi)
                values (?, ?, ?, ?, ?, ?, ?)";
            changed_data_pdo($sql, $ho, $ten, $email, $mk, $vaitro, $dienthoai, $diachi);
            return true;
        }
        return false;
    }
?>