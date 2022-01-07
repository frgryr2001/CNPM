<?php
session_start();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
include_path = '../../conf/conf.php';
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
} else {
    $product_name = $_POST['product_name'];
    $id_category = $_POST['id_category'];
    $description = $_POST['description'];
    $inital_price = $_POST['inital_price'];
    $sale_off = $_POST['sale_off'];
    $sell_quantity = $_POST['sell_quantity'];
    $image = $_FILES['image'];
    if (is_product_name_exists($product_name)) {
        echo (json_encode(array(
            "status" => false,
            "message" => "This product already exists",
        )));
    } else {
        try {
            if (create_product($product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee, $image)['status']) {
                // $_SESSION['authenticated'] = true;
                // $_SESSION['name'] = $name;
                // $_SESSION["email"] = $email;
                // $_SESSION["expired"] = time() + (60*60*24*2);
                echo (json_encode(array(
                    "status" => true,
                    "message" => "Create product successfully!",
                    // "redirect" => $BASE_URL,
                )));
            } else {
                echo (json_encode(array(
                    "status" => false,
                    "message" => create_product($product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee, $image)['response'],
                )));
            }
        } catch (Exception $err) {
            echo (json_encode(array(
                "status" => false,
                "message" => $err,
            )));
        }
    };
};