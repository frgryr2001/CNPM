<?php
session_start();
include("../conf/db.php");
var_dump($_POST);
$id_cart = $_POST['id'];
$qty = $_POST['qty'];
$conn = open_database();
$sql = "
    UPDATE cart SET quantity='$qty' WHERE id_cart='$id_cart' 
";
if($qty > 0){
    $conn->query($sql);
}



