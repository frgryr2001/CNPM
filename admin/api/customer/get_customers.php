<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    require_once("customer_db.php");
    require_once("../response_api.php");
    
    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        error_response(1, "API chỉ hỗ trợ phương thức GET");
    }

    $customers = get_customers();
    success_response($customers, "Lấy danh sách khách hàng thành công");
?>