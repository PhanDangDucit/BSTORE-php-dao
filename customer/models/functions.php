<?php
    // connect mysql database
    $host = 'localhost';
    $port = 3003;
    $db_name = 'abc';
    $username = 'root';
    $password = '';
    $conn = null;
    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$db_name;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExeption $e) {
        die("Loi ket noi db: ".$e->getMessage());
    }

    // Get featured products
    function laysp_noibat() {
        global $conn;
        try {
            $sql = "select id_sp, ten_sp, gia, hinh
                from sanpham
                where anhien=1 and hot=1
                order by Ngay
                desc limit 0,9";
            $sanphamnoibat = $conn->query($sql);
            return $sanphamnoibat;
        } catch(Exception $e) {
            die("Lỗi thực thi sql: " . $e->getMessage() . "<br>" . $sql);
        }
    }

    // Get type of products  
    function lay_loaisp () {
        global $conn;
        try {
            $sql = "select id_loai, ten_loai from loai where anhien=1 order by thutu desc";
            $loaisp = $conn->query($sql);
            return $loaisp;
        } catch(Exception $e) {
            die("Lỗi thực thi sql: " . $e->getMessage() . "<br>" . $sql);
        }
    }

    // Get detail products
    function getDetailProducts($id) {
        global $conn;
        try {
            $sql = "select sanpham.id_sp, ten_sp, gia, gia_km, hinh, ngay, RAM, CPU, Dia, Mausac, Cannang, id_loai
            from sanpham, sanphamchitiet
            where sanpham.id_sp=sanphamchitiet.id_sp and sanpham.id_sp = {$id}";
            $product = $conn->query($sql);
            return $product;
        } catch (Exception $e) {
            die("Error exec sql: " . $e->getMessage() . "<br>" . $sql);
        }
    };
    // fetch detail product
    function fetchDetailProduct($id) {
        $product = getDetailProducts($id);
        $rows = $product->fetch();
        if(!$rows) {
            $id = 1;
            $rows = fetchDetailProduct($id);
        };
        return $rows;
    };

    // Get related products
    function getRelatedProducts($id, $page) {
        global $conn;
        try {
            $sql = "select id_sp, ten_sp, gia, hinh 
            from sanpham
            where id_loai = $id
            limit $id, $page
            ";
            $relatedProducts = $conn->query($sql);
            return $relatedProducts;
        } catch (Exception $e) {
            die("Loi truy van database mysql: " . $e->getMessage()."<br>" . $sql);
        }
    }

    // Get watched product
    function getWatchedProduct() {
        global $conn;
        try {
            $sql = "select id_sp, ten_sp, gia, hinh from sanpham order by soluotxem desc limit 0,9";
            $sanphamxemnhieu = $conn->query($sql);
            return $sanphamxemnhieu;
        } catch (Exception $e) {
            die("Error exec sql: " . $e->getMessage() . "<br>" . $sql);
        }
    }

    // Get a product list of the same in type product
    function getListSameTypeProduct($id = 1, $page_num = 1, $page_size = 10) {
        global $conn;
        try {
            $start_row = ($page_num - 1) * $page_size;
            $sql = "select id_sp, ten_sp, gia, hinh, ngay, ten_loai
            from sanpham, loai
            where loai.id_loai = sanpham.id_loai and sanpham.id_loai = $id
            order by ngay desc limit $start_row, $page_size";
            $products = $conn->query($sql);
            return $products;
        } catch (Exception $e) {
            die("Error exec sql: " . $e->getMessage() . "<br>" . $sql);
        }
    }

    // check exits account
    function checkExitsAccount($email) {
        global $conn;
        try {
            $sql = "select * 
            from users
            where email='$email'";
            $kq = $conn -> query($sql);
            $row = $kq -> fetch();
            if($row['email']) return false;
            return true;
        } catch (Exception $e) {
            die('Lỗi thực thi sql: ' . $e->getMessage().'<br>'.$sql);
        }
    }
    
    // create new user
    function createNewUser($ho, $ten, $email, $mk, $vaitro = 0, $dienthoai='', $diachi='') {
        global $conn;
        try {
            if(checkExitsAccount($email)) {
                $sql = "insert into users (ho, ten, email, matkhau, vaitro, dienthoai, diachi)
                    values ('$ho', '$ten', '$email', '$mk', '$vaitro', '$dienthoai', '$diachi')
                ";
                $conn -> exec($sql);
                return true;
            }
            return false;
        } catch (Exception $e) {
            die("Lỗi thực thi sql: " . $e->getMessage()."<br>" . $sql);
        }
    }
    // Query image of user
    function getImage($email) {
        global $conn;
        $sql = "select hinh
                from users
                where email='$email'
            ";
        $kq = $conn -> query($sql);
        $hinh = $kq -> fetch();
        return $hinh;
    }
    // Check email and password to login
    function checkEmailPass($email, $mk) {
        global $conn;
        try {
            $sql = "select *
                    from users
                    where email='$email'
                ";
            $kq = $conn -> query($sql);
            $row = $kq -> fetch();
            if($row==null) return "Không tồn tại email $email";
            $mk_passHashed = $row['matkhau'];
            if(!password_verify($mk, $mk_passHashed)) {
                return "Mật khẩu không đúng";
            } else {
                return $row;
            }
        } catch (Exception $e) {
            die('Lỗi thực thi sql: ' . $e->getMessage().'<br>'.$sql);
        }
    }

    // Change password
    function capNhatMatKhau($email, $mk) {
        global $conn;
        try {
            $sql = "update users
                set matkhau = '$mk' 
                where email='$email'";
            $kq = $conn -> exec($sql);
        } catch (Exception $e) {
            die("Lỗi thực thi sql: " . $e -> getMessage()."<br>" . $sql);
        }
    }

    // them anh
    function addImage($hinh, $email) {
        global $conn;
        try {
            $sql = "update users
                set hinh= '$hinh' 
                where email='$email'";
            $kq = $conn -> exec($sql);
        } catch (Exception $e) {
            die("Lỗi thực thi sql: " . $e -> getMessage()."<br>" . $sql);
        }
    }

?>