<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    require_once("product_db.php");
    require_once("../response_api.php");
    
    // Kiểm tra phương thức 
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        error_response(1, "API chỉ hỗ trợ phương thức GET");
    }

    if (!isset($_GET['id'])) {
        error_response(2, "Chưa truyền id của sản phẩm");
    }

    $id = $_GET['id'];
    if (!is_numeric($id) || $id < 1) {
        error_response(3, "Id không hợp lệ");
    }

    $product = get_product($id);
    if ($product) {
        success_response($product, "Đọc thông tin sản phẩm thành công");
    } else {
        error_response(4, "Đọc thông tin sản phẩm thất bại");
    }
?>