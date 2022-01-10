<?php
    session_start();
    require_once ("../conf/db.php");
    $id = $_GET['id'];
    $query = "SELECT * FROM `order_detail` INNER JOIN `product` 
    ON order_detail.id_product = product.id
    where id_order = $id";
    $conn = open_database();
    $result = mysqli_query($conn, $query);
    $data = array();
    while($products = $result->fetch_assoc()){
        $data[] = $products;
    }
    echo json_encode(array('status' => 'success', 'data' => $data));
    
?>