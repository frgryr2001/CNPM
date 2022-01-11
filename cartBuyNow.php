<?php
session_start();


// $title = $output[0]['title_task'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

    <!-- boottrap4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- cart.js -->
    <script src="./assets/js/cart.js"></script>
    <!-- link css  -->
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/icon.css">
    <!-- link icons and fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <!-- font-family: 'Nunito', sans-serif; -->
</head>

<body>
    <?php
    include('./inc/header.php');
    $conn = open_database();

    if (isset($_SESSION['email'])) {

        $email = $_SESSION['email'];
        $sql = "
            SELECT * FROM `account` WHERE email=$email
        ";
        $accoutResult = NULL;
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $accoutResult[] = $row;
            }
        }
        $accoutID = $accoutResult[0]['id'];
    }
    // select * from cart ORDER BY id_account DESC LIMIT 1; 
    $sql = "
    select * from (account INNER JOIN cart ON account.id = cart.id_account) 
    INNER JOIN product ON product.id = cart.productId 
    INNER JOIN product_img ON product_img.id_product = cart.productId 
    WHERE cart.id_cart = (SELECT MAX(id_cart) FROM cart);  
    ";
    $output = NULL;
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
    }
    if ($output == NULL) {
        echo $printEmptyCart = '
        <!-- Giỏ hàng trống -->
        <section id="shopping-cart">
        <div class="shopping-cart">
            <div class="shopping-cart__empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                </svg>
                <p class="shopping-cart__empty-title">Không có sản phẩm nào trong giỏ hàng, vui lòng tải lại trang</p>
                <button class="btn btn-light shopping-cart__empty__btn-return">Quay về trang chủ</button>
            </div>
            <div class="shopping-cart__empty d-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                </svg>
                <p class="shopping-cart__empty-title">Không có sản phẩm nào trong giỏ hàng, vui lòng tải lại trang</p>
                <a href="./" class="btn btn-light shopping-cart__empty__btn-return">Quay về trang chủ</a>
            </div>

        </div>

        </section>
        ';
        die();
    }



    ?>
    <section id="shopping-cart">
        <div class="shopping-cart">
            <!-- header -->
            <div class="shopping-cart__header">
                <a href="">
                    < Tiếp tục mua hàng </a>
                        <h2 class="shopping-cart__title">Giỏ hàng của bạn</h2>
            </div>
            <!-- Danh sách giỏ hàng -->
            <div class="shopping-cart__list">
                <!-- Sản phẩm -->
                <?php
                $totalPrice = 0;
                foreach ($output as $value) {
                    $product_name = $value['product_name'];
                    $inital_price = (int)$value['inital_price'];
                    $productId = $value['productId'];
                    $inital_price = $inital_price - ($inital_price * (int)$value['sale_off'] / 100);
                    $inital_priceFormat = number_format($inital_price, ((int) $inital_price == $inital_price ? 0 : 2), '.', ',');
                    $quantity = $value['quantity'];
                    $id_cart = $value['id_cart'];
                    $image_product = $value['image_path1'];

                    $listProductHTML = "
                        <div class='shopping-cart__list__product'>
                            <div class='shopping-cart__list__product-block'>
                                <div class='shopping-cart__list__product-block__left'>
                                    <img src=./assets/img/product/$image_product></img>
                                </div>
                                <div class='shopping-cart__list__product-block__right'>
                                    <p class='product__name'>
                                        $product_name
                                    </p>
                                    <p class='product__price'>
                                        $inital_priceFormat&nbsp;₫
                                    </p>
                                </div>

                                <div class='shopping-cart__list__product__bottom'>
                                    <ul class='shopping-cart__list__product_btn-qty'>
                                        <li onclick='reduce(this,$id_cart, $inital_price)'>-</li>
                                        <li class='product__qty'>$quantity</li>
                                        <li onclick='add(this,$id_cart, $inital_price)'>+</li>
                                    </ul>
                                </div>
                            
                                
                            </div>
                        </div>";
                    echo $listProductHTML;
                    // echo "<p>$totalPrice</p>";
                    if (isset($_POST['btn_order'])) {
                        $sql = "
                            select * from (account INNER JOIN cart ON account.id = cart.id_account) 
                            INNER JOIN product ON product.id = cart.productId 
                            WHERE cart.id_cart = (SELECT MAX(id_cart) FROM cart); 
                            ";
                        $output2 = NULL;
                        if ($result2 = $conn->query($sql)) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $output2[] = $row2;
                            }
                        }
                        $id_cart = $output2[0]['id_cart'];
                        $totalPriceF = 0;
                        foreach ($output2 as $value2) {
                            $priceF = (int)$value2['inital_price'];
                            $quantityF = (int)$value2['quantity'];
                            $totalPriceF = $totalPriceF + ($priceF * $quantityF);
                            $id_accountF = $value2['id_account'];
                        }
                        $id_order = (int)rand(10000, 99999);
                        $serial = rand(1000000, 9999999);
                        $sqlInsertOrder = "INSERT INTO `order` (`id_order`, `id_account`, `status`, `time`, `total`) 
                                VALUES ('$id_order', '$id_accountF', '0', current_timestamp(), '$totalPriceF');";

                        $conn->query($sqlInsertOrder);
                        foreach ($output2 as $value2) {
                            $id_accountF = $value2['id'];
                            $productIdF = $value2['productId'];
                            $quantityF = (int)$value2['quantity'];
                            $priceF = (int)$value2['inital_price'];
                            $sqlInsertOrderDetail = "INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `id_product`, `qty`, `serial`, `productPrice`) 
                            VALUES (NULL, '$id_order', '$productIdF', '$quantityF', '$serial', '$priceF')";

                            $conn->query($sqlInsertOrderDetail);
                        }
                        $sqlDeleteCart = "DELETE FROM `cart` WHERE id_cart='$id_cart'";
                        $conn->query($sqlDeleteCart);
                    }

                    $totalPrice = (int) $totalPrice + ((int)$quantity * (int)$inital_price);
                }

                ?>

                <!-- Tổng tiền -->
                <div class="total-price mt-3">
                    <span class="total-price-left">Tổng tiền:</span>
                    <span class="total-price-right" id="price-total"><?= $totalPrice ?></span>
                </div>

                <div class="shopping-cart__form">
                    <form method="POST" class="needs-validation" novalidate>
                        <button onclick="myFunction('Xin chúc mừng!! Bạn vừa đặt hàng thành công')" name="btn_order" type="submit" class="btn-payment">Đặt hàng</button>
                    </form>
                </div>
            </div>



            <?php

            ?>


        </div>

    </section>
    <!--  -->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function myFunction(str) {
        alert(str);
    }
</script>

</html>