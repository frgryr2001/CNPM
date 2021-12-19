<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- slick -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  
  
  <!-- Boostrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="./assets/css/product.css" type="text/css">
  <!-- link icons and fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
  <!-- font-family: 'Nunito', sans-serif; -->
  <title>Document</title>

</head>
<body>
  <!-- nav -->
    <nav class="navbar navbar-expand-sm bg-dark">

      <div class="container-fluid">
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link 3</a>
          </li>
        </ul>
      </div>
    
    </nav>
  <!-- end Nav -->
  <!-- name product -->
  <!-- <div class="detail-product__box-name">
    <div class="cps-container">
      <div class="box-name__box-product-name">
        <h1>iPhone 12 Pro Max I Chính hãng VN/A</h1>
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
  </div> -->
  <!-- Product -->
    <div id="content-wrapper">
      <div class="container-fluid">
          <div class="row shadow-sm pb-3">
              <div class="col-lg-4 col-md-6 col-sm-6 justify-content-center">
                <img id=featured src="./assets/img/product/laptop0.webp" width="100%">
                <div id="slide-wrapper" >
                  <img id="slideLeft" class="arrow" src="./assets/img/arrow/arrow-right.png">
                  <div id="slider">
                    <img class="thumbnail active" src="./assets/img/product/laptop0.webp">
                    <img class="thumbnail" src="./assets/img/product/laptop0.webp">
                    <img class="thumbnail" src="./assets/img/product/laptop0.webp">
        
                    <img class="thumbnail" src="./assets/img/product/laptop0.webp">
                    <img class="thumbnail" src="./assets/img/product/laptop0.webp">
                    <img class="thumbnail" src="./assets/img/product/laptop0.webp">
                    <img class="thumbnail" src="./assets/img/product/laptop0.webp">
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
                        <h1>iPhone 12 Pro Max I Chính hãng VN/A</h1>
                      </div>
                      <div class="box-name__box-raiting">
                        <i class="fas fa-star checked"></i>
                        <i class="fas fa-star checked"></i>
                        <i class="fas fa-star checked"></i>
                        <i class="fas fa-star checked"></i>
                        <i class="fas fa-star checked"></i>
                        <p class="rate_cmt">4 danh gia</p>
                      </div>
                    </div>
                  </div>
                  <!-- price -->
                  <div class="box-info__price">
                      <p class="new-price">
                        1.990.000₫
                      </p>
                      <p class="old-price">
                        4.490.000 ₫
                      </p>
                  </div>
                  <!-- Select colors product -->
                  <div class="box-colors__product">
                    <p class="box-title">Chọn màu để xem giá</p>
                    <div class="box-content d-flex ">
                        <button class="btn btn-outline-dark btn-rounded d-flex mr-2 js_click">
                            <img src="./images/mac.jpg" alt="" style="width: 25px; height: 25px" class="align-self-center">
                            <p class= "d-flex flex-column ml-1">
                              <Strong>Trang</Strong>
                              <span>25.000.000</span>
                            </p>
                        </button>
                        <button class="btn btn-outline-dark btn-rounded d-flex mr-2 js_click">
                          <img src="./images/mac.jpg" alt="" style="width: 25px; height: 25px" class="align-self-center">
                          <p class= "d-flex flex-column ml-1">
                            <Strong>Trang</Strong>
                            <span>25.000.000</span>
                          </p>
                        </button>
                        <button class="btn btn-outline-dark btn-rounded d-flex mr-2 js_click">
                          <img src="./images/mac.jpg" alt="" style="width: 25px; height: 25px" class="align-self-center">
                          <p class= "d-flex flex-column ml-1">
                            <Strong>Trang</Strong>
                            <span>25.000.000</span>
                          </p>
                        </button>
                    </div>

                    <div class="card mt-3">
                      <div class="card-header bg-danger">
                        <i class="fas fa-gift"></i> Khuyến Mãi
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        
                      </div>
                    </div>
                    
                    <button class="btn btn-danger mt-3" style="width:100%">Mua ngay</button>
                    <button class="btn btn-primary mt-3" style="width:100%"><i class="fas fa-shopping-cart"></i> Them vao gio hang</button>
                  
                  </div>
              </div>
                
              <div class="col-lg-3 mt-3">
                <div class="card" >
                  <div class="card-body">
                    <h5>Thông tin máy</h5>
                    <p class="card-text"> <i class="fa fa-mobile-phone"></i> Iphone mới</p>
                    <p class="card-text">- Trong 30 ngày đầu nhập lại máy, trừ phí 20% trên giá hiện tại(hoặc giá mua nếu giá mua thấp hơn giá hiện tại)
                        - Sau 30 ngày nhập lại máy theo giá thoả thuận <a href="#" class="card-link">Xem chi tiet</a>  </p> 
                    
                  </div>
                </div>
              </div>
            </div>
              <!-- row -->
              <div class="row">
                <div class="title-row">
                  Sản phẩm tương tự
                </div>
              </div>
              <!-- end row -->

              <!-- row san pham tuong tu -->
              <div class="row mt-3 item-list">
                
                <!-- item 1 -->
                <div class="col-md-12">
                      <div class="item">
                        <a href="#" class="detail-item__similar">
                          <img src="./assets/img/product/laptop0.webp" alt="">
                        </a>
                          <div class="user-info">
                              <a href="#" class="detail-item__similar">
                                <p class="title">Samsung Galaxy Z Fold3 5G sadasdasdasdasdasd</p>
                              </a>
                              <div class="pos-price">
                                  <p class="price-new__detail">2.390.000 ₫</p>
                                  <p class="price-old__detail">3.390.000 ₫</p>
                              </div>
                              <div class="box-name__box-raiting">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                4 danh gia
                              </div>
                              <a href="" class="box-compatible">
                                  So sanh chi tiet
                              </a>       
                          </div>
                      </div>
                      
                </div>
                <!-- item 2 -->
                <div class="col-md-12">
                  <div class="item">
                    <a href="#" class="detail-item__similar">
                      <img src="./assets/img/product/laptop0.webp" alt="">
                    </a>
                      <div class="user-info">
                          <a href="#" class="detail-item__similar">
                            <p class="title">Samsung Galaxy Z Fold3 5G </p>
                          </a>
                          <div class="pos-price">
                              <p class="price-new__detail">2.390.000 ₫</p>
                              <p class="price-old__detail">3.390.000 ₫</p>
                          </div>
                          <div class="box-name__box-raiting">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            4 danh gia
                          </div>
                          <a href="" class="box-compatible">
                              So sanh chi tiet
                          </a>       
                      </div>
                  </div>
                  
                </div>
                <!-- item 3 -->
                <div class="col-md-12">
                  <div class="item">
                    <a href="#" class="detail-item__similar">
                      <img src="./assets/img/product/laptop0.webp" alt="">
                    </a>
                      <div class="user-info">
                          <a href="#" class="detail-item__similar">
                            <p class="title">Samsung Galaxy Z Fold3 5G </p>
                          </a>
                          <div class="pos-price">
                              <p class="price-new__detail">2.390.000 ₫</p>
                              <p class="price-old__detail">3.390.000 ₫</p>
                          </div>
                          <div class="box-name__box-raiting">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            4 danh gia
                          </div>
                          <a href="" class="box-compatible">
                              So sanh chi tiet
                          </a>       
                      </div>
                  </div>
                  
                </div>
                <!-- item 5 -->
                <div class="col-md-12">
                  <div class="item">
                    <a href="#" class="detail-item__similar">
                      <img src="./assets/img/product/laptop0.webp" alt="">
                    </a>
                      <div class="user-info">
                          <a href="#" class="detail-item__similar">
                            <p class="title">Samsung Galaxy Z Fold3 5G </p>
                          </a>
                          <div class="pos-price">
                              <p class="price-new__detail">2.390.000 ₫</p>
                              <p class="price-old__detail">3.390.000 ₫</p>
                          </div>
                          <div class="box-name__box-raiting">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            4 danh gia
                          </div>
                          <a href="" class="box-compatible">
                              So sanh chi tiet
                          </a>       
                      </div>
                  </div>
                  
              </div>
                  <!-- item 6 -->
                  <div class="col-md-12">
                    <div class="item">
                      <a href="#" class="detail-item__similar">
                        <img src="./assets/img/product/laptop0.webp" alt="">
                      </a>
                        <div class="user-info">
                            <a href="#" class="detail-item__similar">
                              <p class="title">Samsung Galaxy Z Fold3 5G </p>
                            </a>
                            <div class="pos-price">
                                <p class="price-new__detail">2.390.000 ₫</p>
                                <p class="price-old__detail">3.390.000 ₫</p>
                            </div>
                            <div class="box-name__box-raiting">
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              3 danh gia
                            </div>
                            <a href="#" class="box-compatible">
                                So sanh chi tiet
                            </a>       
                        </div>
                    </div>
                    
                </div>
                  <!-- item 7 -->
                  <div class="col-md-12">
                    <div class="item">
                      <a href="#" class="detail-item__similar">
                        <img src="./assets/img/product/laptop0.webp" alt="">
                      </a>
                        <div class="user-info">
                            <a href="#" class="detail-item__similar">
                              <p class="title">Samsung Galaxy Z Fold3 5G </p>
                            </a>
                            <div class="pos-price">
                                <p class="price-new__detail">2.390.000 ₫</p>
                                <p class="price-old__detail">3.390.000 ₫</p>
                            </div>
                            <div class="box-name__box-raiting">
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              <i class="fas fa-star checked"></i>
                              1 danh gia
                            </div>
                            <a href="#" class="box-compatible">
                                So sanh chi tiet
                            </a>       
                        </div>
                    </div>
                    
                </div>
                  <!-- end item 7 -->
              </div>
            
            <!-- end row san pham tuong tu -->





          </div>


          <!-- San pham tuong tu -->
          
          
          
      </div>
  

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="./assets/js/product.js"></script>
</html>