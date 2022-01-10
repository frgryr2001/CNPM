<?php
    session_start();
    require_once ("../conf/db.php");
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `order` INNER JOIN `account` ON order.id_account=account.id
    where id_account = $id";
    $conn = open_database();
    $result = mysqli_query($conn, $query);
    $data = array();
    while($products = $result->fetch_assoc()){
        $data[] = $products;
    }
    echo json_encode(array('status' => 'success', 'data' => $data));
?>