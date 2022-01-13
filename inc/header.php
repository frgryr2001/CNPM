<?php
session_start();
require_once('./conf/conf.php');

?>
<div class="header__height"></div>
<div class="header__background">
    <!-- Điện thoại -->
    <div class="smartphone__header__logo">
        <!-- <a href=""><img src="assets/img/logo.png" alt=""></a> -->
    </div>
    <div class="smartphone__header__search">
        <i class="fas fa-search"></i>
        <input type="text" name="search-content" id="search-content" placeholder="Bạn cần tìm gì?">
    </div>
    <div class="smartphone__shopping__cart">
        <i class="ti-bag"></i>
        <p>Giỏ hàng</p>
    </div>
    <div class="smartphone__modal">

    </div>
    <!-- End Điện thoại -->
</div>
<!-- Header Background Tablet -->
<div class="tablet__modal"></div>
<div class="tablet__header__background">
    <!-- Tablet -->
    <div class="tablet__header__top">
        <div class="tablet__header__logo">
            <a href=""><img src="assets/img/logo.webp" alt=""></a>
        </div>
        <div class="tablet__header__logo__scroll">
            <a href=""><img src="assets/img/logo.webp" alt=""></a>
        </div>
        <div class="tablet__header__bottom__scroll">
            <i class="fas fa-search"></i>
            <input type="text" name="" id="" placeholder="Bạn cần tìm gì?">
        </div>
        <div class="tablet__header__top__right">
            <div class="tablet__shopping__cart">
                <i class="ti-bag"></i>
                <p>Giỏ hàng</p>
            </div>
        </div>
    </div>
    <div class="tablet__header__bottom">
        <i class="fas fa-search"></i>
        <input type="text" name="" id="" placeholder="Bạn cần tìm gì?">
    </div>

    <!-- End Tablet -->
</div>
<!-- End Header Background tablet -->
<div class="header grid wide">
    <div class="row">
        <!-- Logo Image -->
        <div class="header__logo__img" style="width: 300px;">
            <!-- <a href="./" width="100%" height="100%"><img src="assets/img/logo.png" alt=""></a> -->
            <a style="font-size: 36px; line-height: 60px; color: #fff;" href="../index.php">Trang chủ</a>
        </div>

        <!-- Submenu modal -->
        <div class="header__location__submenu__modal"></div>
        <!-- Search bar -->
        <div class="header__search__bar">
            <div class="header__search__bar__icon">
                <i class="search-icon icon"></i>
            </div>
            <div class="header__search__bar__input">
                <input type="text" placeholder="Bạn cần tìm gì?">
            </div>

            <div class="header__search__bar__modal">

            </div>

        </div>
        <!-- Navbar list -->
        <div class="header__navbar">
            <ul class="header__navbar__list">
                <li class="header__navbar__item">
                    <div class="header__navbar__item__wrapper">
                        <a href="" class="header__navbar__item__link">
                            <i class="support-icon nav-icon"></i>
                            <div class="header__navbar__item__link__desc__wrapper">
                                <p>Tổng đài hỗ trợ</p>
                                <p>1800.2097</p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="header__navbar__item">
                    <div class="header__navbar__item__wrapper">
                        <a href="./order_lookup.php" class="header__navbar__item__link">
                            <i class="ship-icon nav-icon"></i>
                            <div class="header__navbar__item__link__desc__wrapper">
                                <p>Tra cứu</p>
                                <p>đơn hàng</p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="header__navbar__item">
                    <div class="header__navbar__item__wrapper">
                        <a href="./cart.php" class="header__navbar__item__link">
                            <i class="cart-icon nav-icon"></i>
                            <div class="header__navbar__item__link__desc__wrapper">
                                <p>Giỏ hàng</p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="header__navbar__item" style="position: relative; display:flex; align-items:center; color: white; cursor: pointer;">
                    <div>
                        <div class="header__navbar__item__wrapper">
                            <a href="" class="header__navbar__item__link">
                                <i class="user-icon nav-icon"></i>

                            </a>

                        </div>
                        <ul class="login-popup">
                            <?php if (!isset($_SESSION['authenticated'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./login.php">Đăng nhập</a>
                                </li>
                            <?php } ?>
                            <?php if (isset($_SESSION['authenticated'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./profile.php">Thông tin khách hàng</a>
                                </li>
                            <?php } ?>
                            <?php if (isset($_SESSION['authenticated'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./purchase_history.php">Lịch sử mua hàng</a>
                                </li>
                            <?php } ?>
                            <?php if (isset($_SESSION['authenticated'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php">Đăng xuất</a>
                                </li>
                            <?php } else{ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./register.php">Đăng ký</a>
                                </li>   
                            <?php } ?>
                        </ul>
                    </div>
                    
                </li>

            </ul>
        </div>
    </div>
</div>