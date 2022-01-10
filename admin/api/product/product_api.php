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
}else if (!isset($_POST['sell_quantity']) || empty($_POST['sell_quantity'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Sell quantity is required",
    )));
}else if (!isset($_POST['guarantee']) || empty($_POST['guarantee'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Guarantee is required",
    )));
}else if (!isset($_FILES["image"])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Image is required",
    )));
} else {
    $product_name = $_POST['product_name'];
    $id_category = $_POST['id_category'];
    $description = $_POST['description'];
    $inital_price = $_POST['inital_price'];
    $sale_off = $_POST['sale_off'];
    $sell_quantity = $_POST['sell_quantity'];
    $guarantee = $_POST['guarantee'];
    $image = $_FILES['image'];
    if (is_product_name_exists($product_name)) {
        echo (json_encode(array(
            "status" => false,
            "message" => "This product already exists",
        )));
    } else {
        $token = bin2hex(random_bytes(8));
        $image_name =$token . $_FILES['image']["name"];
        $image_tmp = $_FILES['image']["tmp_name"];
        $image_type = $_FILES['image']["type"];
        $target_file = '../../../assets/img/product/'. $image_name;
        if ($image_type !== "image/jpg" && $image_type !== "image/jpeg" && $image_type !== "image/png" && $image_type !== "image/webp" ) {
            echo (json_encode(array(
                "status" => false,
                "message" => "Only accept jpeg, jpg, png, webp",
            )));
        } else {
            if (move_uploaded_file($image_tmp, $target_file)) {
                try {
                    if (create_product($product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee, $image_name)['status']) {
                        echo (json_encode(array(
                            "status" => true,
                            "message" => "Create product successfully!",
                        )));
                    } else {
                        echo (json_encode(array(
                            "status" => false,
                            "message" => create_product($product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee, $image_name)['response'],
                        )));
                    }
                } catch (Exception $err) {
                    echo (json_encode(array(
                        "status" => false,
                        "message" => $err,
                    )));
                }

            }
        };
        
    };
};

