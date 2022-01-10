<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    require_once("statistical_db.php");
    require_once("../response_api.php");
    
    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        error_response(1, "API chỉ hỗ trợ phương thức GET");
    }

    $num = get_num_of_product_sold();
    success_response($num, "Lấy số lượng sản phẩm đã bán thành công");
?>