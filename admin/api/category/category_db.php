<?php
    require_once("../../../conf/db.php");

    // Lấy toàn bộ danh sách danh mục
    function get_all_categories() {
        $conn = open_database();
        $sql = "SELECT * FROM category";
        $result = $conn -> query($sql);
        if ($conn -> connect_error) {
            die("Không thể lấy danh sách danh mục " . $conn -> connect_error);
        }
        $categories = array();
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    }

    // Lấy thông tin một danh mục cụ thể
    function get_category($id) {
        $conn = open_database();
        $sql = "SELECT * FROM category WHERE id_category = ?";
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