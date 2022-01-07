<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    require_once("category_db.php");
    require_once("../response_api.php");
    
    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        error_response(1, "API chỉ hỗ trợ phương thức GET");
    }

    $categories = get_all_categories();
    success_response($categories, "Lấy danh sách nhân viên thành công");
?>