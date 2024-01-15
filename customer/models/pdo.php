<?php
    /**
     * 1 connect
     * truy van => nhieu, 1, field
     * CRUD
     * input: sql
     * output: array (lien ket, khong lien ket) / String / Number
     *  */
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
    // Get all entities
    function get_pdo($sql) {
        global $conn;
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        return $kq;
    }
?>