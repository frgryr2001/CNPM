<?php
        header("Content-Type: application/json; charset = utf-8");
        header("Access-Control-Allow-Origin: *");
        require_once("promotion_db.php");
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
        if (!property_exists($input, 'id') || !property_exists($input, 'sale_off') || !property_exists($input, 'sale_of_period')) {
        error_response(3, "Dữ liệu không đầy đủ");
    }

    // Lấy dữ liệu 
    $id = intval($input -> id);
    $sale_off = intval($input -> sale_off);
    $sale_of_period = $input -> sale_of_period;

    // Kiểm tra dữ liệu có hợp lệ?
    if(!is_numeric($id) || $id < 1 ||  !is_numeric($sale_off) || $sale_off < 0 || $sale_off > 100 || $sale_of_period === "") {
        error_response(4, "Dữ liệu không hợp lệ");
    }

        $result = update_promotion($id, $sale_off, $sale_of_period);
        if ($result) {
            success_response(0, "Cập nhật khuyến mãi thành công");
        } else {
            error_response(5, "Cập nhật khuyến mãi thất bại");
        }
