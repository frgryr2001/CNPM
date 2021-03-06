<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- slick -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


  <!-- Boostrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="./assets/css/product.css" type="text/css">
<link rel="shortcut icon" href="favi.ico" type="image/x-icon">
<link rel="stylesheet" href="./assets/css/base.css">
<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/icon.css">
<!-- link icons and fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
<!-- font-family: 'Nunito', sans-serif; -->
<title>Document</title>

</head>

<body>
  <?php include('./inc/header.php') ?>
  <?php
  error_reporting(E_ERROR | E_PARSE);
  $conn = open_database();
  if (isset($_GET['id'])) {
    $cartID = $_GET['id'];
  }
  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "
        SELECT * FROM `account` WHERE email='$email'
    ";
    $accoutResult = NULL;
    if ($result = $conn->query($sql)) {
      while ($row = $result->fetch_assoc()) {
        $accoutResult[] = $row;
      }
    }

    $accoutID = $accoutResult[0]['id'];
  }
  if (isset($_POST['btn-buy-now'])) {
    $productInsertToCart = $cartID;
    $sql = "
          INSERT INTO `cart` (`id_cart`, `id_account`, `productId`, `quantity`) 
          VALUES (NULL, '$accoutID', '$productInsertToCart', '1');
        ";

    $conn->query($sql);
    echo "<script>window.location.href = './cartBuyNow.php?id=$cartID';</script>";
  }
  if (isset($_POST['btn-add-to-cart'])) {

    $productInsertToCart = $cartID;
    $sql = "
  INSERT INTO `cart` (`id_cart`, `id_account`, `productId`, `quantity`)
  VALUES (NULL, '$accoutID', '$productInsertToCart', '1');
  ";

    $conn->query($sql);
  }
  ?>


  <!-- Product -->
  <div id="content-wrapper">

    <div class="container-fluid">
      <?php
      require_once('./conf/db.php');
      $conn = open_database();
      $id = $_GET['id'];
      $sql = "SELECT * 
            FROM product  
            WHERE id =" . $id;
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      ?>
      <div class="row shadow-sm pb-3">
        <div class="col-lg-4 col-md-6 col-sm-6 justify-content-center">
          <img id=featured src="./assets/img/product/<?=$row['image']?>" width="100%">
          <div id="slide-wrapper">
            <img id="slideLeft" class="arrow" src="./assets/img/arrow/arrow-right.png">
            <div id="slider">
              <img class="thumbnail" src="./assets/img/product/<?=$row['image']?>"> 
            </div>
            <img id="slideRight" class="arrow" src="./assets/img/arrow/arrow-right.png">
          </div>
        </div>


        <!--  -->
        <div class="col-lg-5 col-md-6 col-sm-6 ">
          <!-- Name product -->
          <div class="detail-product__box-name">
            <div class="cps-container">
              <div class="box-name__box-product-name">
                <h1><?= $row['product_name'] ?></h1>
              </div>
              <div class="box-name__box-raiting">
                <?php
                $star = $row['rate'];
                $star_full = floor($star);
                $star_haft = $star - $star_full;
                $star_empty = 5 - $star_full - ceil($star_haft);
                for ($i = 0; $i < $star_full; $i++) echo '<i class="star-full-icon star-icon"></i>';
                if ($star_haft > 0) echo '<i class="star-haft-icon star-icon"></i>';
                for ($i = 0; $i < $star_empty; $i++) echo '<i class="star-border-icon star-icon"></i>';
                ?>
                <p class="rate_cmt"><?= $row['sell_quantity'] ?> ???? b??n</p>
              </div>
            </div>
          </div>
          <!-- price -->
          <?php
          $sale = 0;
          $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
          ?>
          <div class="box-info__price">
            <p class="new-price">
              <?php
              if ($row['sale_off'] != 0) {
              ?>
                <?=number_format($sale) ?>
              <?php
              } else {
              ?>
                <?=number_format($row['inital_price']); ?>
                <?php
              }
                ?>???
            </p>
            <?php
            if ($row['sale_off'] != 0) {
            ?>
              <p class="old-price">
                <?= number_format($row['inital_price']) ?>???
              </p>
            <?php
            }
            ?>
          </div>
          <!-- Select colors product -->
          <div class="box-colors__product">



            <div class="card mt-3">
              <div class="card-header bg-danger">
                <i class="fas fa-gift"></i> M?? t???
              </div>
              <div class="card-body">
                <p class="card-text"><?= $row['description'] ?></p>
              </div>
            </div>
            <form method="POST">
              <button name="btn-buy-now" class="btn btn-danger mt-3" style="width:100%">Mua Ngay</button>
            </form>
            <form method="POST">
              <button onclick="myFunction('B???n v???a th??m m???t s???n ph???m v??o gi??? h??ng')" name="btn-add-to-cart" class="btn btn-danger mt-3" style="width:100%">Th??m v??o gi??? h??ng</button>

            </form>
          </div>
        </div>

        <div class="col-lg-3 mt-3">
          <div class="card">
            <div class="card-body">
              <h5>Th??ng tin</h5>

              <p class="card-text">- Trong 30 ng??y ?????u nh???p l???i m??y, tr??? ph?? 20% tr??n gi?? hi???n t???i(ho???c gi?? mua n???u gi?? mua th???p h??n gi?? hi???n t???i)
                - Sau 30 ng??y nh???p l???i m??y theo gi?? tho??? thu???n <a href="#" class="card-link">Xem chi tiet</a> </p>

            </div>
          </div>
        </div>
      </div>
      <!-- row -->
      <div class="row">
        <div class="title-row">
          S???n ph???m t????ng t???
        </div>
      </div>
      <!-- end row -->

      <!-- row san pham tuong tu -->
      <div class="row mt-3 item-list">

        <!-- item 1 -->
        <div class="col-md-12">
          <div class="item">
            <a href="#" class="detail-item__similar">
              <img src="./assets/img/product/samsung-galaxy-tab-s7-1.jpg" alt="">
            </a>
            <div class="user-info">
              <a href="#" class="detail-item__similar">
                <p class="title">samsung-galaxy-tab-s7</p>
              </a>
              <div class="pos-price">
                <p class="price-new__detail">2.390.000 ???</p>
                <p class="price-old__detail">3.390.000 ???</p>
              </div>
              <div class="box-name__box-raiting">
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                4 danh gia
              </div>

            </div>
          </div>

        </div>
        <!-- item 2 -->
        <div class="col-md-12">
          <div class="item">
            <a href="#" class="detail-item__similar">
              <img src="./assets/img/product/01a3148a504c4d05c17a7df395e2b308samsung1.jpg" alt="">
            </a>
            <div class="user-info">
              <a href="#" class="detail-item__similar">
                <p class="title">Samsung Galaxy Z Fold3 5G </p>
              </a>
              <div class="pos-price">
                <p class="price-new__detail">2.390.000 ???</p>
                <p class="price-old__detail">3.390.000 ???</p>
              </div>
              <div class="box-name__box-raiting">
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                4 danh gia
              </div>

            </div>
          </div>

        </div>
        <!-- item 3 -->
        <div class="col-md-12">
          <div class="item">
            <a href="#" class="detail-item__similar">
              <img src="./assets/img/product/c17a7df395e2b308samsung1.jpg" alt="">
            </a>
            <div class="user-info">
              <a href="#" class="detail-item__similar">
                <p class="title">Samsung Galaxy Z Fold3 5G </p>
              </a>
              <div class="pos-price">
                <p class="price-new__detail">2.390.000 ???</p>
                <p class="price-old__detail">3.390.000 ???</p>
              </div>
              <div class="box-name__box-raiting">
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                4 danh gia
              </div>

            </div>
          </div>

        </div>
        <!-- item 5 -->
        <div class="col-md-12">
          <div class="item">
            <a href="#" class="detail-item__similar">
              <img src="./assets/img/product/samsung-galaxy-tab-s7-1.jpg" alt="">
            </a>
            <div class="user-info">
              <a href="#" class="detail-item__similar">
                <p class="title">Samsung Galaxy Z Fold3 5G </p>
              </a>
              <div class="pos-price">
                <p class="price-new__detail">2.390.000 ???</p>
                <p class="price-old__detail">3.390.000 ???</p>
              </div>
              <div class="box-name__box-raiting">
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                4 danh gia
              </div>

            </div>
          </div>

        </div>
        <!-- item 6 -->
        <div class="col-md-12">
          <div class="item">
            <a href="#" class="detail-item__similar">
              <img src="./assets/img/product/d6658a78bacf377bsamsung-galaxy-a72-29.jpg" alt="">
            </a>
            <div class="user-info">
              <a href="#" class="detail-item__similar">
                <p class="title">Samsung Galaxy Z Fold3 5G </p>
              </a>
              <div class="pos-price">
                <p class="price-new__detail">2.390.000 ???</p>
                <p class="price-old__detail">3.390.000 ???</p>
              </div>
              <div class="box-name__box-raiting">
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                3 danh gia
              </div>

            </div>
          </div>

        </div>
        <!-- item 7 -->
        <div class="col-md-12">
          <div class="item">
            <a href="#" class="detail-item__similar">
              <img src="./assets/img/product/d6658a78bacf377bsamsung-galaxy-a72-29.jpg" alt="">
            </a>
            <div class="user-info">
              <a href="#" class="detail-item__similar">
                <p class="title">Samsung Galaxy Z Fold3 5G </p>
              </a>
              <div class="pos-price">
                <p class="price-new__detail">2.390.000 ???</p>
                <p class="price-old__detail">3.390.000 ???</p>
              </div>
              <div class="box-name__box-raiting">
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                <i class="fas fa-star checked"></i>
                1 danh gia
              </div>

            </div>
          </div>

        </div>
        <!-- end item 7 -->
      </div>

      <!-- end row san pham tuong tu -->
      <div class="table-responsive mt-5">
        <!--Table-->
        <table class="table table-striped table-bordered table-hover overflow-hidden">

          <!--Table head-->
          <thead>
            <tr>
              <h3>Th??ng s??? k?? thu???t</h3>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <?php
          require_once('./conf/db.php');
          $conn = open_database();
          $sql = "SELECT * 
                  FROM productdetail
                  WHERE id =" . $id;
          $result = $conn->query($sql);
          $row_details = $result->fetch_assoc();
          ?>
          <tbody>
            <tr>
              <th scope="row">CPU</th>
              <td><?= $row_details['cpu'] ?></td>
            </tr>

            <tr>
              <th scope="row">M??n h??nh</th>
              <td><?= $row_details['screen'] ?></td>
            </tr>

            <!-- <tr>
              <th scope="row">????? ph??n gi???i</th>
              <td>TEST</td>
            </tr> -->

            <tr>
              <th scope="row">Ram</th>
              <td><?= $row_details['ram'] ?></td>
            </tr>

            <tr>
              <th scope="row">Tr???ng l?????ng</th>
              <td><?= $row_details['weight'] ?></td>
            </tr>

            <tr>
              <th scope="row">Camera</th>
              <td><?= $row_details['camera'] ?></td>
            </tr>

            <tr>
              <th scope="row">B??? nh???</th>
              <td><?= $row_details['storage'] ?></td>
            </tr>

            <tr>
              <th scope="row">Pin</th>
              <td><?= $row_details['battery'] ?></td>
            </tr>

            <!-- <tr>
              <th scope="row">C???ng</th>
              <td>TEST</td>
            </tr> -->

            <tr>
              <th scope="row">T??nh n??ng</th>
              <td><?= $row_details['features'] ?></td>
            </tr>

            <tr>
              <th scope="row">Bluetooth</th>
              <td><?= $row_details['bluetooth'] ?></td>
            </tr>

            <!-- <tr>
              <th scope="row">Compatible</th>
              <td>TEST</td>
            </tr> -->



          </tbody>
          <!--Table body-->
        </table>
        <!--Table-->
      </div>
    </div>


    <!-- San pham tuong tu -->



  </div>


</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="./assets/js/product1.js"></script>
<script>
  function myFunction(str) {
    alert(str);
  }
</script>

</html>