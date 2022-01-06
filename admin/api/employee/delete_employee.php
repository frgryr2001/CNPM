<?php
    header("Content-Type: application/json; charset = utf-8");
    header("Access-Control-Allow-Origin: *");
    require_once("employee_db.php");
    require_once("../response_api.php");

    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
        error_response(1, "API chỉ hỗ trợ phương thức DELETE");
    }

    if (!isset($_GET['id'])) {
        error_response(2, "Chưa truyền id của nhân viên");
    }

    $id = $_GET['id'];
    if (!is_numeric($id) || $id < 1) {
        error_response(3, "Id không hợp lệ");
    }

    $result = delete_employee($id);
    if ($result) {
        success_response(0, "Xóa thông tin nhân viên thành công");
    } else {
        error_response(4, "Xóa thông tin nhân viên thất bại");
    }
?>