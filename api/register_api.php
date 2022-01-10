<?php
session_start();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
require_once('../conf/conf.php');
$BASE_URL = "../";

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
} else if (!isset($_POST['name']) || empty($_POST['name'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "name is required",
    )));
} else if (!isset($_POST['birthday']) || empty($_POST['birthday'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Birthday is required",
    )));
} else if (!isset($_POST['gender'])) {
    echo (json_encode(array(
        "status" => false,
        "message" => "Gender is required",
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
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    if (is_email_exists($email)) {
        echo (json_encode(array(
            "status" => false,
            "message" => "This account already exists",
        )));
    } else {
        try {
            if (register($email, $password, $name, $phone, $address, $birthday, $gender)['status']) {
                $_SESSION['authenticated'] = true;
                // $_SESSION['id'] = $userData['response']["id"];
                $_SESSION['name'] = $name;
                $_SESSION["email"] = $email;
                $_SESSION["expired"] = time() + (60*60*24*2);
                echo (json_encode(array(
                    "status" => true,
                    "message" => "Register account successfully!",
                    "redirect" => $BASE_URL,
                )));
            } else {
                echo (json_encode(array(
                    "status" => false,
                    "message" => register($email, $password, $name, $phone, $address, $birthday, $gender)['response'],
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