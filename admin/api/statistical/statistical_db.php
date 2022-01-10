<?php
    require_once("../../../conf/db.php");

    // Lấy danh sách đơn hàng có trạng thái CHƯA DUYỆT 
    function get_all_not_approved_orders() {
        $conn = open_database();
        $status = 0;
        $sql = "SELECT * FROM `order` WHERE status = ?";
        $stm = $conn -> prepare($sql);
        $stm -> bind_param("i", $status);
        $stm -> execute();
        $result = $stm -> get_result();
        $orders = array();
        while ($row = $result -> fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    }

    // Lấy danh sách đơn hàng có trạng thái ĐÃ DUYỆT 
    function get_all_approved_orders() {
        $conn = open_database();
        $status = 1;
        $sql = "SELECT * FROM `order` WHERE status = ?";
        $stm = $conn -> prepare($sql);
        $stm -> bind_param("i", $status);
        $stm -> execute();
        $result = $stm -> get_result();
        $orders = array();
        while ($row = $result -> fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    }

    // Lấy số lượng sản phẩm đã bán
    function get_num_of_product_sold() {
        $conn = open_database();
        $sql = "SELECT SUM(qty) FROM `order_detail`";
        $result = $conn -> query($sql);
        if ($conn -> connect_error) {
            die("Lỗi: " . $conn -> connect_error);
        }
        return $result -> fetch_assoc();
    }

    // Lấy tổng doanh thu
    function get_num_of_total_sales() {
        $conn = open_database();
        $sql = "SELECT SUM(total) FROM `order` WHERE status = 1";
        $result = $conn -> query($sql);
        if ($conn -> connect_error) {
            die("Lỗi: " . $conn -> connect_error);
        }
        return $result -> fetch_assoc();
    }
?>