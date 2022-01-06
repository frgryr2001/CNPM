<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    require_once("employee_db.php");
    require_once("../response_api.php");
    
    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        error_response(1, "API chỉ hỗ trợ phương thức GET");
    }

    if (!isset($_GET['id'])) {
        error_response(2, "Chưa truyền id của nhân viên");
    }

    $id = $_GET['id'];
    if (!is_numeric($id) || $id < 1) {
        error_response(3, "Id không hợp lệ");
    }

    $employee = get_employee($id);
    if ($employee) {
        success_response($employee, "Đọc thông tin nhân viên thành công");
    } else {
        error_response(4, "Đọc thông tin nhân viên thất bại");
    }
?>