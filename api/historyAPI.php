<?php
    session_start();
    require_once ("../conf/db.php");
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `order` where id_account = $id";
    $conn = open_database();
    $result = mysqli_query($conn, $query);
    $orders = array();
    while($products = $result->fetch_assoc()){
        $orders[] = $products;
    }
    // var_dump($data[1]['id_order']);
    $data = array();
    foreach ($orders as $order){
        $query1 = "SELECT `image`, `product_name`, `inital_price`, `qty`, `time` FROM `product`, `order`, `order_detail`
        WHERE order.id_order = order_detail.id_order AND order_detail.id_product = product.id AND order.id_order =  ".$order['id_order'];
        // var_dump($order);
        $result1 = mysqli_query($conn, $query1);
        while($temp = $result1->fetch_assoc()){
            $data[] = $temp;
        }
    }
    echo json_encode(array('status' => 'success', 'data' => $data));
    
?>