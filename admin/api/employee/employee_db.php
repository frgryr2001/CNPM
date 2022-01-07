<?php
    require_once("../../../conf/db.php");

    // Lấy toàn bộ danh sách nhân viên 
    function get_employees() {
        $conn = open_database();
        $sql = "SELECT * FROM account";
        $result = $conn -> query($sql);
        if ($conn -> connect_error) {
            die("Không thể lấy danh sách nhân viên " . $conn -> connect_error);
        }
        $accounts = array();
        while ($row = $result->fetch_assoc()) {
            if ($row['role'] == 1 || $row['role'] ==2) {
                $accounts[] = $row;
            }
        }
        return $accounts;
    }

    // Lấy thông tin một nhân viên cụ thể
    function get_employee($id) {
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

    // Thêm nhân viên
    function add_employee($email, $password, $name, $phone, $address, $role, $birthday, $salary, $gender) {
        $sql = "INSERT INTO `account`(`email`, `password`, `fullname`, `phone`, `address`, `role`, `birthday`, `salary`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn = open_database();

        $stm = $conn -> prepare($sql);
        $stm -> bind_param("sssssisii", $email, $password, $name, $phone, $address, $role, $birthday, $salary, $gender);
        $stm -> execute();

        if ($stm -> affected_rows == 1) {
            return $stm -> insert_id;
        } else {
            return -1;
        }
    }

    // Cập nhật thông tin nhân viên
    function update_employee($id, $email, $name, $phone, $address, $role, $birthday, $salary, $gender) {
        $conn = open_database();
        $sql = "UPDATE `account` SET `email`= ?, `fullname`= ?, `phone`= ?, `address`= ?, `role`= ?, `birthday`= ?, `salary`= ?, `gender`= ? WHERE `id` = ?";
        $stm = $conn -> prepare($sql);
        $stm -> bind_param("ssssisiii", $email, $name, $phone, $address, $role, $birthday, $salary, $gender, $id);
        $stm -> execute();
        return $stm -> affected_rows === 1;
    }

    // Xóa thông tin nhân viên
    function delete_employee($id) {
        $conn = open_database();
        $sql = "DELETE FROM `account` WHERE `id` = ?";
        $stm = $conn -> prepare($sql);
        $stm -> bind_param("s", $id);
        $stm -> execute();
        return $stm -> affected_rows === 1;
    }
?>