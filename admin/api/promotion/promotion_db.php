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

    // Thêm khuyến mãi
    function update_promotion($id, $sale_off, $sale_of_period) {
        $sql = "UPDATE `product` SET `sale_off` = ?, `sale_off_period` = ? WHERE `id` = ?";
        $conn = open_database();

        $stm = $conn -> prepare($sql);
        $stm -> bind_param("isi", $sale_off, $sale_of_period, $id);
        $stm -> execute();

        return $stm -> affected_rows === 1;
    }
?>