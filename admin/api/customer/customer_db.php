<?php
    require_once("../../../conf/db.php");

    // Lấy toàn bộ danh sách khách hàng 
    function get_customers() {
        $conn = open_database();
        $sql = "SELECT * FROM account";
        $result = $conn -> query($sql);
        if ($conn -> connect_error) {
            die("Không thể lấy danh sách nhân viên " . $conn -> connect_error);
        }
        $customers = array();
        while ($row = $result->fetch_assoc()) {
            if ($row['role'] == 3) {
                $customers[] = $row;
            }
        }
        return $customers;
    }

    // Lấy thông tin một khách hàng cụ thể
    function get_customer($id) {
        $conn = open_database();
        $sql = "SELECT * FROM account WHERE id = ?";
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