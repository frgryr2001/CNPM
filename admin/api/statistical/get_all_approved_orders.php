<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    require_once("statistical_db.php");
    require_once("../response_api.php");
    
    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        error_response(1, "API chỉ hỗ trợ phương thức GET");
    }

    $orders = get_all_approved_orders();
    success_response($orders, "Lấy danh sách đơn hàng đã được duyệt thành công");
?>