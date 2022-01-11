<?php
require_once("../../../conf/db.php");
$id = $_POST['id'];
$status = $_POST['status'];

$conn = open_database();
$sql = "UPDATE `order` SET `status`='$status' WHERE `id_order`='$id';";
$result = $conn->query($sql);
