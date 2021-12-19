<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./assets/css/cart.css">
    <!-- boottrap4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- cart.js -->
    <script src="./assets/js/cart.js"></script>
    <!-- link icons and fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <!-- font-family: 'Nunito', sans-serif; -->
</head>
<body>

    <section id="shopping-cart">
        <div class="shopping-cart">
            <!-- header -->
            <div class="shopping-cart__header">
                <a href="">
                    < Tiếp tục mua hàng
                </a>
                <h2 class="shopping-cart__title">Giỏ hàng của bạn</h2>
            </div>
            <!-- Danh sách giỏ hàng -->
            <div class="shopping-cart__list">       
                <!-- Sản phẩm -->
                <div class="shopping-cart__list__product">
                    <div class="shopping-cart__list__product-block">
                        <div class="shopping-cart__list__product-block__left">
                            <img src=./assets/img/product/laptop0.webp></img>
                        </div>
                        <div class="shopping-cart__list__product-block__right">
                            <p class="product__name">
                                iPhone 13-Xanh dương
                            </p>
                            <p class="product__price">
                                24.990.000&nbsp;₫
                            </p>
                        </div>
                        
                        <div class="shopping-cart__list__product__bottom">
                            <ul class="shopping-cart__list__product_btn-qty">
                                <li onclick="reduce(this)">-</li>
                                <li class="product__qty">1</li>
                                <li onclick="add(this)">+</li>
                            </ul>
                            <!-- <input class="shopping-cart__list__product__input" type="number" value="1" min="1" class="form-control" name="qty"> -->
                            <a class="shopping-cart__list__product-delete" href="">Xóa khỏi giỏ</a>
                        </div>
                    </div>
                </div> 
                <!-- Sản phẩm -->
                <div class="shopping-cart__list__product">
                    <div class="shopping-cart__list__product-block">
                        <div class="shopping-cart__list__product-block__left">
                            <img src=./assets/img/product/laptop0.webp></img>
                        </div>
                        <div class="shopping-cart__list__product-block__right">
                            <p class="product__name">
                                iPhone 13-Xanh dương
                            </p>
                            <p class="product__price">
                                24.990.000&nbsp;₫
                            </p>
                        </div>
                        
                        <div class="shopping-cart__list__product__bottom">
                            <!-- <input class="shopping-cart__list__product__input" type="number" value="1" min="1" class="form-control" name="qty"> -->
                            <ul class="shopping-cart__list__product_btn-qty">
                                <li onclick="reduce(this)">-</li>
                                <li class="product__qty">1</li>
                                <li onclick="add(this)">+</li>
                            </ul>
                            <a class="shopping-cart__list__product-delete" href="">Xóa khỏi giỏ</a>
                        </div>
                    </div>
                </div> 
                <!-- Nhập khuyến mãi -->
                <div class="coupon">
                    <span class="align-middle" >Nhập mã khuyến mãi: </span>
                    <input class="coupon-input" type="text" value="" name="coupon">
                    <button class="btn coupon-btn  btn-danger">Áp dụng</button>
                </div>
                <div class="coupon-price">
                    <span class="coupon-price-left" >Mã giảm giá: </span>
                    <span class="coupon-price-right">0 ₫</span>
                </div>  
                <!-- Tổng tiền -->
                <div class="total-price">
                    <span class="total-price-left">Tổng tiền:</span>
                    <span class="total-price-right">24.990.000 ₫</span>
                </div>              

                <div class="shopping-cart__form" >
                    <form action="" method="POST" class="needs-validation" novalidate>
                        <h3>Thông tin mua hàng</h3>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="inputName">Nhập họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required>
                                <div  class="invalid-feedback">
                                    Vui lòng nhập đầy đủ họ và tên
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phonee" name="phone" placeholder="Số điện thoại" required>
                                <div  class="invalid-feedback">
                                    Vui lòng nhập số điện thoại
                                </div>
                            </div>
                        </div>                     
                        <div class="form-group">
                            <label for="inputEmail">Địa chỉ Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                            <div  class="invalid-feedback">
                                Vui lòng nhập địa chỉ email
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Địa chỉ nhận hàng</label>
                            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Địa chỉ" required>
                            <div  class="invalid-feedback">
                                Vui lòng nhập địa chỉ nhận hàng
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNote">Lưu ý thêm</label>
                            <input type="text" class="form-control" id="inputNote" name="note" placeholder="" >
                        </div>
                        <h3>Chọn hình thức thanh toán</h3>
                        <div class="form-group " class="payments was-validated">           
                            <div class="payments__online custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="online" value="online" name="pay" checked required>
                                <label class="custom-control-label" for="online">Chuyển khoản ngân hàng</label>
                            </div>                
                            <div class="payments_cod custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="cod" value="cod" name="pay" required>
                                <label class="custom-control-label"  for="cod">Thanh toán khi nhận hàng</label>
                            </div>                     
                        </div>
                        <button type="submit" class="btn-payment">Đặt hàng</button>
                    </form>
                </div>
            </div>  
            <!-- Giỏ hàng trống -->
            <div class="shopping-cart__empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="80"  fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
                <p class="shopping-cart__empty-title" >Không có sản phẩm nào trong giỏ hàng, vui lòng tải lại trang</p>
                <button class="btn btn-light shopping-cart__empty__btn-return">Quay về trang chủ</button>
            </div>
            
        </div>       

    </section>
    <!--  -->
</body>
</html>
