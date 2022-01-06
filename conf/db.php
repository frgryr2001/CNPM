<?php
define('HOST','127.0.0.1');
define('USER','root');
define('PASSWORD','123456');
define('DB','cnpm');
// >>>>>>> 9141c79fcc00b501e17677b44856ff32e6d701c7
function open_database(){
    $conn = new mysqli(HOST,USER,PASSWORD,DB);
    mysqli_set_charset($conn, 'UTF8');
    if ($conn -> connect_error){
        die('Connect error:' .$conn->connect_error);
    }
    return $conn;
}
?>