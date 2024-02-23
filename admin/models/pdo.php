<?php
    /**
     * 1 connect
     * truy van => nhieu, 1, field
     * CRUD
     * input: sql
     * output: array (lien ket, khong lien ket) / String / Number
     *  */
    $host = 'localhost';
    $port = 3306;
    $db_name = 'abc';
    $username = 'root';
    $password = 'Mysql@23012024@root';
    $conn = null;
    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$db_name;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExeption $e) {
        die("Loi ket noi db: ".$e->getMessage());
    }
    // select all entities
    function get_pdo($sql) {
        global $conn;
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt -> fetchAll();
        return $results;
    }

    // select one entities
    function get_pdo_one($sql) {
        global $conn;
        try {
            // func_get_args(): return a list elements of arrays
            // array_slice($a, 0): return a array that contains elements from position 0
            $sql_agrs = array_slice(func_get_args(), 1);
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_agrs);
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt -> fetch();
            return $row;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }

    // Insert, update, delete
    function changed_data_pdo($sql) {
        global $conn;
        try {
            $sql_args = array_slice(func_get_args(), 1);
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }
?>