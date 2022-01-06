<?php
require_once('../conf/conf.php');
header('Content-Type: application/json');
$BASE_URL = "http://localhost:8888/CNPM/login.php";

if (!isset($_POST['email']) || empty($_POST['email'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Email is required",
    )));
} else if (!isset($_POST['password']) || empty($_POST['password'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Password is required",
    )));
} else if (!isset($_POST['username']) || empty($_POST['username'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Username is required",
    )));
} else if (!isset($_POST['given_name']) || empty($_POST['given_name'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Given name is required",
    )));
} else if (!isset($_POST['family_name']) || empty($_POST['family_name'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Family name is required",
    )));
} else if (!isset($_POST['phone']) || empty($_POST['phone'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Phone number is required",
    )));
} else if (!isset($_POST['address']) || empty($_POST['address'])) { 
    echo (json_encode(array(
        "status" => false,
        "message" => "Address is required",
    )));
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $given_name = $_POST['given_name'];
    $family_name = $_POST['family_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    if (is_email_exists($email)) {
        echo (json_encode(array(
            "status" => false,
            "message" => "This account already exists",
        )));
    } else {
        if (register($email, $password, $username, $given_name, $family_name, $phone, $address)['status']) {
            echo (json_encode(array(
                "status" => true,
                "message" => "Register account successfully!",
                "redirect" => $BASE_URL,
            )));
        } else {
            echo (json_encode(array(
                "status" => false,
                "message" => "Failed to register account!",
                "error" => register($email, $password, $username, $given_name, $family_name, $phone, $address)['response'],
            )));
        }
    };
};