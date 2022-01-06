<?php
session_start();
require_once('../conf/conf.php');
header('Content-Type: application/json');
$BASE_URL = "http://localhost:8888/CNPM/index.php";

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
} else {
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (is_email_exists($email)) {
        $userData = login($email, $password) ;
        if ($userData['status']) {
            $_SESSION['authenticated'] = true;
            $_SESSION['id'] = $userData['response']["id"];
            $_SESSION['username'] = $userData['response']["username"];
            $_SESSION['firstname'] = $userData['response']["given_name"];
            $_SESSION['lastname'] = $userData['response']["family_name"];
            $_SESSION['fullname'] = $userData['response']["fullname"];
            $_SESSION['address'] = $userData['response']["address"];
            $_SESSION['phone'] = $userData['response']["phone"];
            $_SESSION["email"] = $email;
            $_SESSION["expired"] = time() + (60*60*24*2);
            echo (json_encode(array(
                "status" => true,
                "message" => "Login successfully! Redirecting...",
                "redirect" => $BASE_URL,
            )));
        } else {
            echo (json_encode(array(
                "status" => false,
                "message" => $userData['response'],
            )));
        };
    } else {
        echo (json_encode(array(
            "status" => false,
            "message" => "This account does not exists",
        )));
    };
};