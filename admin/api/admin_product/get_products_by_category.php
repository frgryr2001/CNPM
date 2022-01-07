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
        error_response(2, "Chưa truyền id của danh mục");
    }

    $id = $_GET['id'];
    if (!is_numeric($id) || $id < 1) {
        error_response(3, "Id không hợp lệ");
    }

    $products = get_products_by_category($id);
    if ($products) {
        success_response($products, "Đọc thông tin các sản phẩm của danh mục thành công");
    } else {
        error_response(4, "Đọc thông tin các sản phẩm của danh mục thất bại");
    }
?>