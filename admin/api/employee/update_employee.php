<?php
        header("Content-Type: application/json; charset = utf-8");
        header("Access-Control-Allow-Origin: *");
        require_once("employee_db.php");
        require_once("../response_api.php");

        // Kiểm tra phương thức 
        if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
            error_response(1, "API chỉ hỗ trợ phương thức PUT");
        }

        // Đọc JSON từ Client 
        $input = json_decode(file_get_contents('php://input'));

        // Kiểm tra dữ liệu 
        if (is_null($input)) {
            error_response(2, "Dữ liệu phải ở dạng JSON");
        }
        if (!property_exists($input, 'id') || !property_exists($input, 'email') || !property_exists($input, 'name') || 
    !property_exists($input, 'phone') || !property_exists($input, 'address') || !property_exists($input, 'role') || 
    !property_exists($input, 'birthday') || !property_exists($input, 'salary') || !property_exists($input, 'gender')) {
        error_response(3, "Dữ liệu không đầy đủ");
    }

    // Lấy dữ liệu 
    $id = intval($input -> id);
    $email = $input -> email;
    $name = $input -> name;
    $phone = $input -> phone;
    $address = $input -> address;
    $role = intval($input -> role);
    $birthday = $input -> birthday;
    $salary = intval($input -> salary);
    $gender = intval($input -> gender);

    // Kiểm tra dữ liệu có hợp lệ?
    if(!is_numeric($id) || $id < 1 || $email === "" || $name === "" || ($phone) === "" || !is_numeric($role) || $role < 1 || $role > 2 || ($birthday) === "" || 
    ($address) === "" || !is_numeric($salary) || $salary < 0 || !is_numeric($gender) || $gender < 0 || $gender > 1) {
        error_response(4, "Dữ liệu không hợp lệ");
    }

        $result = update_employee($id, $email, $name, $phone, $address, $role, $birthday, $salary, $gender);
        if ($result) {
            success_response(0, "Cập nhật thông tin nhân viên thành công");
        } else {
            error_response(5, "Cập nhật thông tin nhân viên thất bại");
        }
