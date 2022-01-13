<?php
    session_start();
    require_once ("../conf/db.php");
    $id = $_POST['id'];
    $rate = $_POST['rate'];
    $query = "Insert into  `rate` (`productId`, `rate`) values ($id,$rate)";
    $conn = open_database();
    $result = mysqli_query($conn, $query);
?>