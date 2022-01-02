<?php
define('HOST','127.0.0.1');
define('USER','root');
define('PASSWORD','123456');
define('DB','esdc');
function open_database(){
    $conn = new mysqli(HOST,USER,PASSWORD,DB);
    mysqli_set_charset($conn, 'UTF8');
    if ($conn -> connect_error){
        die('Connect error:' .$conn->connect_error);
    }
    return $conn;
}
?>