<?php
    require('../connection.php');

    $id = $_GET['id'];

    $query = "SELECT * FROM product where productId = '$id'";
    
    $result = mysqli_query($conn, $query);
    
    $products = $result->fetch_assoc();
    echo json_encode(array('status' => 'success', 'data' => $products));

?>