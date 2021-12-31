<?php
    require('connection.php');
    $query = "SELECT productId, name, price, sellQuantity, quantity, registerTime FROM product";
    
    $result = mysqli_query($conn, $query);
    
    $products = array();
   
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    echo json_encode(array('status' => 'success', 'data' => $products));

?>