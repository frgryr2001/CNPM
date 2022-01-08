<?php
    require_once("../../../conf/db.php");

    // Lấy toàn bộ danh sách sản phẩm 
    function get_all_products() {
        $conn = open_database();
        $sql = "SELECT * FROM product";
        $result = $conn -> query($sql);
        if ($conn -> connect_error) {
            die("Không thể lấy danh sách sản phẩm " . $conn -> connect_error);
        }
        $products = array();
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    // Lấy danh sách sản phẩm theo danh mục
    function get_products_by_category($id) {
        $conn = open_database();
        $sql = "SELECT * FROM product WHERE id_category = ?";
        $stm = $conn -> prepare($sql);
        $stm -> bind_param("i", $id);
        $stm -> execute();
        $result = $stm -> get_result();
        $products = array();
        while ($row = $result -> fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    // Lấy sản phẩm theo cụ thể
    function get_product($id) {
        $conn = open_database();
        $sql = "SELECT * FROM product WHERE id = ?";
        $stm = $conn -> prepare($sql);
        $stm -> bind_param("i", $id);
        $stm -> execute();
        $result = $stm -> get_result();
        if ($result -> num_rows > 0) {
            $row = $result -> fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }
?>