<?php
    print_r($_POST);
    if (isset($_POST['id'])){
        require('../connection.php');
        $id = $_POST['id'];
        $name = $_POST['name-product'];
        $price = $_POST['price'];
        $old_price = $_POST['old-price'];
        $description = $_POST['description'];
        $type = $_POST['product-type'];
        $man = $_POST['product-man'];
        $sale = (isset($_POST['sale'])) ? 1 : 0;
        
        $query = "UPDATE product SET name='$name',description='$description',newPrice=$old_price,price=$price,
        manufacturerId='$man',sale=$sale,image='iphone.webp',productType='$type'
        WHERE productId = '$id';";
        $result = mysqli_query($conn, $query);
        if ($result){
            echo json_encode(array('status' => 'success', 'data' => 'Update success'));
        } else {
            echo json_encode(array('status' => 'failed', 'data' => 'Update failed'));
        }
    }
?>

