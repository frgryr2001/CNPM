<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    require_once("promotion_db.php");
    require_once("../response_api.php");
    
    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        error_response(1, "API chỉ hỗ trợ phương thức GET");
    }
    
    $promotions = get_all_promotions();
    success_response($promotions, "Lấy danh sách khuyến mãi thành công");
?>