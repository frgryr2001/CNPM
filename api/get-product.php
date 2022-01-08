<?php
    require_once ("../conf/db.php");
    $query = "SELECT * FROM product where sale_off >= 20";
    $conn = open_database();
    $result = mysqli_query($conn, $query);
    $data = array();
    while($products = $result->fetch_assoc()){
        $data[] = $products;
    }
    echo json_encode(array('status' => 'success', 'data' => $data));

?>