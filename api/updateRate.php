<?php
    session_start();
    require_once ("../conf/db.php");
    $id = $_POST['id'];
    $rate = $_POST['rate'];
    $query = "Insert into  `rate` (`productId`, `rate`) values ($id,$rate)";
    $conn = open_database();
    $result = mysqli_query($conn, $query);
    $query1 = "Select * from `rate` where productId = $id";
    $result = mysqli_query($conn, $query1);
    $data = array();
    while($rate = $result->fetch_assoc()){
        $data[] = $rate['rate'];
    }
    $total = 0;
    foreach($data as $sumRate){
        $total+=intval($sumRate);
    }
    $sum =$total/sizeof($data);
    $query2 = "Update product set `rate` = $sum where id = $id";
    $result = mysqli_query($conn, $query2);
    // echo json_encode(array('status' => 'success', 'data' => $data));
?>