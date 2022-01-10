
<?php
session_start();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
require('../../../conf/conf.php');
$BASE_URL = "../";


if (!isset($_POST['product_name']) || empty($_POST['product_name'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Product name is required",
    )));
} else if (!isset($_POST['id_category']) || empty($_POST['id_category'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Id category is required",
    )));
} else if (!isset($_POST['description']) || empty($_POST['description'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Description is required",
    )));
} else if (!isset($_POST['inital_price']) || empty($_POST['inital_price'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Initial price is required",
    )));
}else if (!isset($_POST['sell_quantity']) || !is_numeric($_POST['sell_quantity'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Sell quantity is required",
    )));
}else if (!isset($_POST['guarantee']) || empty($_POST['guarantee'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Guarantee is required",
    )));
} else {
    $old_product_name = $_POST['old_product_name'];
    $product_name = $_POST['product_name'];
    $id_category = $_POST['id_category'];
    $description = $_POST['description'];
    $inital_price = $_POST['inital_price'];
    $sale_off = $_POST['sale_off'];
    $sell_quantity = $_POST['sell_quantity'];
    $guarantee = $_POST['guarantee'];
    try {
        if (edit_product($old_product_name,$product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee)['status']) {
            echo (json_encode(array(
                "status" => true,
                "message" => "Edit product successfully!",
            )));
        } else {
            echo (json_encode(array(
                "status" => false,
                "message" => edit_product($product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee)['response'],
            )));
        }
    } catch (Exception $err) {
        echo (json_encode(array(
            "status" => false,
            "message" => $err,
        )));
    }
};
