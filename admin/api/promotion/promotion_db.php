<?php
    require_once("../../../conf/db.php");

    // Lấy toàn bộ danh sách nhân viên 
    function get_all_promotions() {
        $conn = open_database();
        $sql = "SELECT * FROM product";
        $result = $conn -> query($sql);
        if ($conn -> connect_error) {
            die("Không thể lấy danh sách khuyến mãi " . $conn -> connect_error);
        }
        $promotions = array();
        while ($row = $result->fetch_assoc()) {
            if (intval($row['sale_off']) > 0) {
                $promotions[] = $row;
            }
        }
        return $promotions;
    }
?>