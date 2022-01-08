<?php
session_start();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
require('../../../conf/conf.php');
$BASE_URL = "../";

if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo json_encode(array(
        "status" => false,
        "message" => "Product id is required.",
    ));
} else {
    $product_id = $_POST['id'];
    if (!is_product_id_exists($product_id)) {
        echo json_encode(array(
            "status" => false,
            "message" => "This product does not exists",
        ));
    } else {
        if (remove_product_byId($product_id)) {
            echo json_encode(array(
                "status" => true,
                "message" => "Remove successfully"
            ));
        } else {
            echo json_encode(array(
                "status" => false,
                "message" => "Remove failed"
            ));
        }
    };
};