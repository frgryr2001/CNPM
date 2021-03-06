<?php
session_start();
// if(!isset($_SESSION['authenticated'])){
//     header('Location: ./login.php');
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samsung Store</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;1,200;1,300;1,400;1,600;1,700;1,800&display=swap');
    </style>

    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/icon.css">
    <style>
        .featured__phone__product__promotion__info p{
            overflow: hidden;
            /* display: block; */
            display: -webkit-box !important;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
    </style>
</head>


<body>
    <div id="main">
        <!-- Header -->
        <?php require "./inc/header.php"; ?>
        <!-- End header -->
        <!-- Slide -->
        <div class="slide grid wide">
            <div class="row">
                <div class="c-2 tablet__slidebar">
                    <div class="slidebar">
                        <ul class="slidebar__list">
                            <!-- mobile -->
                            <?php
                            $conn = open_database();
                            $sql = "select * from category";
                            $result = $conn->query($sql);
                            $target = array('#phone','#laptop','#manhinh','#maytinhbang','#tainghe','#dongho');
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <li class="slidebar__item">
                                    <a href="#<?=$row['name']?>" class="slidebar__item__link">
                                        <div class="slidebar__item__link__text__wrapper">
                                            
                                            <p><?=$row['name']?></p>
                                        </div>
                                        <div class="slidebar__item__link__icon__last__wrapper">
                                            <i class="right-icon"></i>
                                        </div>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>



                            <!-- sale off -->

                        </ul>
                    </div>
                </div>
                <!-- slider -->
                <div class="c-7 pc__slider__wrapper">
                    <div class="slider">
                        <div class="slider__top">
                            <div class="slider__top__next__btn">
                                <i class="next-icon slider-icon"></i>
                            </div>
                            <div class="slider__top__prev__btn">
                                <i class="prev-icon slider-icon"></i>
                            </div>
                            <!-- PC -->
                            <a href="">
                                <div class="slider__top__wrapper">
                                    <img src="assets/img/slider/1.webp" alt="image" class="slider__top__item">
                                    <img src="assets/img/slider/2.webp" alt="image" class="slider__top__item">
                                    <img src="assets/img/slider/3.webp" alt="image" class="slider__top__item">
                                    <img src="assets/img/slider/4.webp" alt="image" class="slider__top__item">
                                    <img src="assets/img/slider/5.webp" alt="image" class="slider__top__item">
                                    <img src="assets/img/slider/6.webp" alt="image" class="slider__top__item">
                                    <img src="assets/img/slider/7.webp" alt="image" class="slider__top__item">
                                    <img src="assets/img/slider/8.webp" alt="image" class="slider__top__item">
                                </div>
                            </a>
                            <!-- End PC -->
                        </div>
                        <div class="slider__bottom">
                            <div class="slider__bottom__list">
                                <!-- 1st -->
                                <div class="slider__bottom__item">
                                    <a href="/" class="slider__bottom__item__link">
                                        <p class="slider__bottom__item__link__text__1st">Th??ng th??nh vi??n</p>
                                        <p class="slider__bottom__item__link__text__2nd">??u ????i li??n mi??n</p>
                                    </a>
                                    <div class="slider__bottom__item__underline"></div>
                                </div>
                                <!-- 2nd -->
                                <div class="slider__bottom__item">
                                    <a href="/" class="slider__bottom__item__link">
                                        <p class="slider__bottom__item__link__text__1st">Z FOLD3 | Z FLIP3 5G</p>
                                        <p class="slider__bottom__item__link__text__2nd">??u ????i c???c l???n</p>
                                    </a>
                                    <div class="slider__bottom__item__underline"></div>
                                </div>
                                <!-- 3rd -->
                                <div class="slider__bottom__item">
                                    <a href="/" class="slider__bottom__item__link">
                                        <p class="slider__bottom__item__link__text__1st">XIAOMI 11T SERIES</p>
                                        <p class="slider__bottom__item__link__text__2nd">?????t tr?????c ??u ????i kh???ng</p>
                                    </a>
                                    <div class="slider__bottom__item__underline"></div>
                                </div>
                                <!-- 4th -->
                                <div class="slider__bottom__item">
                                    <a href="#" class="slider__bottom__item__link">
                                        <p class="slider__bottom__item__link__text__1st">ZENBOOK 12 OLED</p>
                                        <p class="slider__bottom__item__link__text__2nd">Gi?? t???t mua ngay</p>
                                    </a>
                                    <div class="slider__bottom__item__underline"></div>
                                </div>
                                <!-- 5th -->
                                <div class="slider__bottom__item">
                                    <a href="#" class="slider__bottom__item__link">
                                        <p class="slider__bottom__item__link__text__1st">Loa JBL CHARGE 5</p>
                                        <p class="slider__bottom__item__link__text__2nd">M??? b??n gi?? t???t</p>
                                    </a>
                                    <div class="slider__bottom__item__underline"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-3">
                    <div class="slide__ads__wrapper tablet__disable">
                        <a href="#"><img src="assets/img/slider/r1.webp" alt=""></a>
                    </div>
                    <div class="slide__ads__wrapper tablet__disable">
                        <a href="#"><img src="assets/img/slider/r2.webp" alt=""></a>
                    </div>
                    <div class="slide__ads__wrapper tablet__disable">
                        <a href="#"><img src="assets/img/slider/r3.webp" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End slide -->
        <!-- Tablet slider -->
        <div class="tablet__slider">
            <div class="tablet__slider__wrapper">
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/1.webp" alt="image">
                </div>
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/2.webp" alt="image">
                </div>
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/3.webp" alt="image">
                </div>
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/4.webp" alt="image">
                </div>
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/5.webp" alt="image">
                </div>
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/6.webp" alt="image">
                </div>
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/7.webp" alt="image">
                </div>
                <div class="tablet__slider__item">
                    <img src="assets/img/slider/8.webp" alt="image">
                </div>
            </div>
            <ul class="smartphone__slider__dot__list">
                <li class="smartphone__slider__dot__item dot-list-style"></li>
                <li class="smartphone__slider__dot__item"></li>
                <li class="smartphone__slider__dot__item"></li>
                <li class="smartphone__slider__dot__item"></li>
                <li class="smartphone__slider__dot__item"></li>
                <li class="smartphone__slider__dot__item"></li>
            </ul>
        </div>
        <!-- End tablet Slider -->
        <!-- Web Ads -->
        <div class="web__ads gird wide">
            <div class="row">
                <div class="web__ads__box">
                    <a href="">
                        <img src="assets/img/slider/ads.webp" alt="" class="web__ads__box__pc__img">
                    </a>
                    <a href="">
                        <img src="assets/img/slider/tabletAds.webp" alt="" class="web__ads__box__tablet__img">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Web Ads -->

        <!-- Flash Sale -->
        <div class="flash__sale grid wide">
            <div class="row">
                <div class="c-6">
                    <div class="flash__hot__sale">
                        <!-- hot sale image -->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="272.222" height="38.337" viewBox="0 0 272.222 38.337">
                            <defs>
                                <filter id="Path_1419" x="27.652" y="8.388" width="111.756" height="22.383" filterUnits="userSpaceOnUse">
                                    <feOffset dy="1" input="SourceAlpha"></feOffset>
                                    <feGaussianBlur stdDeviation="0.5" result="blur"></feGaussianBlur>
                                    <feFlood flood-opacity="0.502"></feFlood>
                                    <feComposite operator="in" in2="blur"></feComposite>
                                    <feComposite in="SourceGraphic"></feComposite>
                                </filter>
                                <filter id="Path_1420" x="140.854" y="1.116" width="131.369" height="29.655" filterUnits="userSpaceOnUse">
                                    <feOffset dy="1" input="SourceAlpha"></feOffset>
                                    <feGaussianBlur stdDeviation="0.5" result="blur-2"></feGaussianBlur>
                                    <feFlood flood-opacity="0.502"></feFlood>
                                    <feComposite operator="in" in2="blur-2"></feComposite>
                                    <feComposite in="SourceGraphic"></feComposite>
                                </filter>
                                <filter id="power" x="0" y="0" width="27.109" height="38.337" filterUnits="userSpaceOnUse">
                                    <feOffset dy="2" input="SourceAlpha"></feOffset>
                                    <feGaussianBlur stdDeviation="0.5" result="blur-3"></feGaussianBlur>
                                    <feFlood flood-opacity="0.502"></feFlood>
                                    <feComposite operator="in" in2="blur-3"></feComposite>
                                    <feComposite in="SourceGraphic"></feComposite>
                                </filter>
                            </defs>
                            <g id="Group_184" data-name="Group 184" transform="translate(-98.699 -620)">
                                <g id="Group_364" data-name="Group 364" transform="translate(-107 6)">
                                    <g id="Group_185" data-name="Group 185" transform="translate(134 10)">
                                        <g transform="matrix(1, 0, 0, 1, 71.7, 604)" filter="url(#Path_1419)">
                                            <path id="Path_1419-2" data-name="Path 1419" d="M-38.372,0h-4.309l1.514-7.583H-47.3L-48.814,0h-4.335l3.765-18.84h4.335l-1.579,7.893h6.133l1.579-7.893h4.309Zm18.917-7.725a10.532,10.532,0,0,1-3.06,5.868A8.045,8.045,0,0,1-28.176.272a6.224,6.224,0,0,1-5.059-2.31,6.5,6.5,0,0,1-1.229-5.687l.686-3.39a10.7,10.7,0,0,1,3-5.875,7.853,7.853,0,0,1,5.6-2.122,6.358,6.358,0,0,1,5.111,2.323,6.438,6.438,0,0,1,1.294,5.674Zm-3.623-3.416a4.488,4.488,0,0,0-.382-3.338,2.633,2.633,0,0,0-2.387-1.268,2.732,2.732,0,0,0-2.31,1.255,8.575,8.575,0,0,0-1.313,3.351l-.686,3.416a4.769,4.769,0,0,0,.3,3.377A2.513,2.513,0,0,0-27.5-3.093a2.876,2.876,0,0,0,2.355-1.281,8.122,8.122,0,0,0,1.385-3.351Zm19.461-4.335h-4.49L-11.2,0h-4.335l3.093-15.476h-4.451l.673-3.364H-2.944ZM4.975-4.7a1.83,1.83,0,0,0-.323-1.714A8.106,8.106,0,0,0,2.465-7.686,11.971,11.971,0,0,1-2.109-10.3a4,4,0,0,1-1.016-3.817A5.512,5.512,0,0,1-.621-17.8a8.742,8.742,0,0,1,4.846-1.307,6.476,6.476,0,0,1,4.6,1.553,4.163,4.163,0,0,1,1.08,4.218l-.039.078H5.661a2.018,2.018,0,0,0-.375-1.812,2.193,2.193,0,0,0-1.734-.673,2.63,2.63,0,0,0-1.5.472,1.79,1.79,0,0,0-.828,1.132,1.481,1.481,0,0,0,.4,1.572,12.773,12.773,0,0,0,2.769,1.352A9.4,9.4,0,0,1,8.482-8.7a4.479,4.479,0,0,1,.8,3.979A5.516,5.516,0,0,1,6.8-.983,8.885,8.885,0,0,1,1.947.272,8.1,8.1,0,0,1-2.885-1.145Q-4.872-2.562-4.212-5.5l.026-.078H.019q-.3,1.423.524,1.954a3.759,3.759,0,0,0,2.077.531,2.735,2.735,0,0,0,1.495-.459A1.79,1.79,0,0,0,4.975-4.7ZM20.166-3.662h-5.2L13.269,0H8.935L18.29-18.84h4.632L24.76,0H20.412ZM16.517-7.026h3.429l-.414-6.3-.078-.013ZM31.009-3.364h7.44L37.777,0H26l3.765-18.84H34.1ZM52.2-8.061H45.463l-.932,4.7h7.958L51.816,0H39.524l3.765-18.84H55.607l-.673,3.364H46.951l-.815,4.05h6.741Z" transform="translate(82.3 28)" fill="#fb4700"></path>
                                        </g>
                                        <path id="Path_1418" data-name="Path 1418" d="M-37.648,0h-4.228l1.485-7.439h-6.018L-47.893,0h-4.253l3.694-18.484H-44.2l-1.549,7.744h6.018l1.549-7.744h4.228Zm18.561-7.579a10.333,10.333,0,0,1-3,5.757A7.894,7.894,0,0,1-27.644.267,6.107,6.107,0,0,1-32.608-2a6.382,6.382,0,0,1-1.206-5.58l.673-3.326A10.494,10.494,0,0,1-30.2-16.669a7.7,7.7,0,0,1,5.5-2.082,6.238,6.238,0,0,1,5.015,2.279,6.316,6.316,0,0,1,1.27,5.567Zm-3.555-3.352a4.4,4.4,0,0,0-.375-3.275,2.583,2.583,0,0,0-2.342-1.244,2.68,2.68,0,0,0-2.266,1.231,8.413,8.413,0,0,0-1.289,3.288l-.673,3.352a4.679,4.679,0,0,0,.3,3.313,2.466,2.466,0,0,0,2.3,1.231,2.822,2.822,0,0,0,2.311-1.257,7.969,7.969,0,0,0,1.358-3.288Zm19.094-4.253H-7.954L-10.988,0h-4.253l3.034-15.184h-4.367l.66-3.3H-2.888ZM4.881-4.608a1.8,1.8,0,0,0-.317-1.682,7.953,7.953,0,0,0-2.146-1.25,11.745,11.745,0,0,1-4.488-2.564,3.923,3.923,0,0,1-1-3.745A5.408,5.408,0,0,1-.609-17.469a8.578,8.578,0,0,1,4.754-1.282,6.354,6.354,0,0,1,4.513,1.523,4.084,4.084,0,0,1,1.06,4.139l-.038.076H5.554a1.98,1.98,0,0,0-.368-1.777,2.151,2.151,0,0,0-1.7-.66,2.581,2.581,0,0,0-1.473.463A1.756,1.756,0,0,0,1.2-13.876a1.453,1.453,0,0,0,.394,1.542A12.532,12.532,0,0,0,4.31-11.007,9.226,9.226,0,0,1,8.322-8.538a4.394,4.394,0,0,1,.787,3.9A5.411,5.411,0,0,1,6.671-.965,8.717,8.717,0,0,1,1.911.267a7.952,7.952,0,0,1-4.742-1.39Q-4.78-2.514-4.132-5.4l.025-.076H.019q-.292,1.4.514,1.917a3.688,3.688,0,0,0,2.038.521,2.683,2.683,0,0,0,1.466-.451A1.756,1.756,0,0,0,4.881-4.608Zm14.9,1.016h-5.1L13.019,0H8.766l9.179-18.484H22.49L24.292,0H20.027Zm-3.58-3.3H19.57l-.406-6.183-.076-.013ZM30.424-3.3h7.3L37.064,0H25.511l3.694-18.484h4.253ZM51.219-7.909H44.6L43.691-3.3H51.5L50.838,0H38.778l3.694-18.484H54.558l-.66,3.3H46.065l-.8,3.974h6.614Z" transform="translate(154.5 631)" fill="#fedb00" stroke="#a71609" stroke-linecap="round" stroke-width="0.5"></path>
                                    </g>
                                    <g id="Group_363" data-name="Group 363" transform="translate(257 10)">
                                        <g transform="matrix(1, 0, 0, 1, -51.3, 604)" filter="url(#Path_1420)">
                                            <path id="Path_1420-2" data-name="Path 1420" d="M-48.782-6.612l.039.078a9.606,9.606,0,0,1-2.691,5.085A7.368,7.368,0,0,1-56.571.272a6.244,6.244,0,0,1-4.995-2.193,6.189,6.189,0,0,1-1.2-5.532l.789-3.934A10.413,10.413,0,0,1-59.114-17.1a7.381,7.381,0,0,1,5.273-2.012A6.4,6.4,0,0,1-48.9-17.248a5.918,5.918,0,0,1,1.3,5.059l-.026.065h-4.231a4.035,4.035,0,0,0-.233-2.717,2.286,2.286,0,0,0-2.135-.906,2.654,2.654,0,0,0-2.116,1.2,7.455,7.455,0,0,0-1.313,3.138l-.789,3.959a5.178,5.178,0,0,0,.123,3.228,2.023,2.023,0,0,0,2,1.132A2.754,2.754,0,0,0-54.2-3.959a5.8,5.8,0,0,0,1.216-2.653Zm19.2-12.228L-32.051-6.5a7.885,7.885,0,0,1-2.989,5.1A9.4,9.4,0,0,1-40.695.272a6.516,6.516,0,0,1-4.872-1.8A5.213,5.213,0,0,1-46.7-6.5l2.471-12.344h4.335L-42.364-6.5a3.245,3.245,0,0,0,.239,2.627,2.533,2.533,0,0,0,2.1.776,3.437,3.437,0,0,0,2.329-.841A4.378,4.378,0,0,0-36.386-6.5l2.471-12.344ZM-14.505-7.725a10.532,10.532,0,0,1-3.06,5.868A8.045,8.045,0,0,1-23.226.272a6.224,6.224,0,0,1-5.059-2.31,6.5,6.5,0,0,1-1.229-5.687l.686-3.39a10.7,10.7,0,0,1,3-5.875,7.853,7.853,0,0,1,5.6-2.122,6.358,6.358,0,0,1,5.111,2.323,6.438,6.438,0,0,1,1.294,5.674Zm-3.623-3.416a4.488,4.488,0,0,0-.382-3.338A2.633,2.633,0,0,0-20.9-15.747a2.732,2.732,0,0,0-2.31,1.255,8.575,8.575,0,0,0-1.313,3.351l-.686,3.416a4.769,4.769,0,0,0,.3,3.377,2.513,2.513,0,0,0,2.349,1.255A2.876,2.876,0,0,0-20.2-4.374a8.122,8.122,0,0,0,1.385-3.351Zm-2.29-12.81h3.558l3,3.241-.026.071h-3.74l-1.333-1.773L-21-20.638h-3.714l-.026-.084Zm8.281-2.433h3.688l.039.078-3.312,3.481-2.95-.006ZM-9.109,0h-4.309l3.765-18.84h4.309ZM15.527-15.476h-4.49L7.945,0H3.61L6.7-15.476H2.251l.673-3.364H16.2ZM32.439-18.84,29.968-6.5a7.885,7.885,0,0,1-2.989,5.1A9.4,9.4,0,0,1,21.324.272a6.516,6.516,0,0,1-4.872-1.8A5.213,5.213,0,0,1,15.32-6.5L17.792-18.84h4.335L19.655-6.5a3.245,3.245,0,0,0,.239,2.627,2.533,2.533,0,0,0,2.1.776,3.437,3.437,0,0,0,2.329-.841A4.378,4.378,0,0,0,25.633-6.5L28.1-18.84Zm8.6,15.178h-5.2L34.147,0H29.813l9.355-18.84H43.8L45.637,0H41.29ZM37.4-7.026h3.429l-.414-6.3-.078-.013Zm9.7-13.4-.039.084h-3.74L42-22.114l-2.07,1.773h-3.7l-.026-.084,4.322-3.228h3.545Zm-9.239-2.1H34.937L32.97-26.086h3.778ZM61.656,0H57.335L53.608-11.568l-.078.013L51.214,0H46.88l3.765-18.84H54.98L58.706-7.272l.078-.013L61.1-18.84h4.322Z" transform="translate(205.3 28)" fill="#fb4700"></path>
                                        </g>
                                        <path id="Path_1421" data-name="Path 1421" d="M-47.861-6.487l.038.076a9.425,9.425,0,0,1-2.641,4.989A7.229,7.229,0,0,1-55.5.267a6.126,6.126,0,0,1-4.9-2.152,6.072,6.072,0,0,1-1.181-5.427l.774-3.859A10.217,10.217,0,0,1-58-16.777a7.242,7.242,0,0,1,5.173-1.974,6.278,6.278,0,0,1,4.843,1.828,5.806,5.806,0,0,1,1.276,4.964l-.025.063h-4.151a3.959,3.959,0,0,0-.229-2.666,2.243,2.243,0,0,0-2.095-.889,2.6,2.6,0,0,0-2.076,1.174A7.314,7.314,0,0,0-56.57-11.2l-.774,3.885a5.081,5.081,0,0,0,.121,3.167,1.984,1.984,0,0,0,1.961,1.111,2.7,2.7,0,0,0,2.082-.851,5.7,5.7,0,0,0,1.193-2.6Zm18.84-12L-31.446-6.373a7.736,7.736,0,0,1-2.933,5.008A9.227,9.227,0,0,1-39.927.267,6.393,6.393,0,0,1-44.707-1.5a5.115,5.115,0,0,1-1.111-4.875l2.425-12.111h4.253L-41.564-6.373A3.184,3.184,0,0,0-41.33-3.8a2.485,2.485,0,0,0,2.063.762,3.372,3.372,0,0,0,2.285-.825A4.3,4.3,0,0,0-35.7-6.373l2.425-12.111Zm14.79,10.905a10.333,10.333,0,0,1-3,5.757A7.894,7.894,0,0,1-22.788.267,6.107,6.107,0,0,1-27.752-2a6.382,6.382,0,0,1-1.206-5.58l.673-3.326a10.494,10.494,0,0,1,2.945-5.764,7.7,7.7,0,0,1,5.5-2.082,6.238,6.238,0,0,1,5.015,2.279,6.316,6.316,0,0,1,1.27,5.567Zm-3.555-3.352a4.4,4.4,0,0,0-.375-3.275A2.583,2.583,0,0,0-20.5-15.45a2.68,2.68,0,0,0-2.266,1.231,8.413,8.413,0,0,0-1.289,3.288l-.673,3.352a4.679,4.679,0,0,0,.3,3.313,2.466,2.466,0,0,0,2.3,1.231,2.822,2.822,0,0,0,2.311-1.257,7.969,7.969,0,0,0,1.358-3.288ZM-20.033-23.5h3.491l2.945,3.18-.025.07h-3.669L-18.6-21.988-20.6-20.249h-3.644l-.025-.083Zm8.125-2.387H-8.29l.038.076-3.25,3.415L-14.4-22.4ZM-8.937,0h-4.228l3.694-18.484h4.228ZM15.234-15.184H10.829L7.795,0H3.542L6.576-15.184H2.209l.66-3.3H15.895Zm16.593-3.3L29.4-6.373A7.736,7.736,0,0,1,26.47-1.365,9.227,9.227,0,0,1,20.922.267,6.393,6.393,0,0,1,16.142-1.5a5.115,5.115,0,0,1-1.111-4.875l2.425-12.111h4.253L19.284-6.373A3.184,3.184,0,0,0,19.519-3.8a2.485,2.485,0,0,0,2.063.762,3.372,3.372,0,0,0,2.285-.825,4.3,4.3,0,0,0,1.282-2.514l2.425-12.111ZM40.27-3.593h-5.1L33.5,0H29.25l9.179-18.484h4.545L44.776,0H40.511Zm-3.58-3.3h3.364l-.406-6.183-.076-.013ZM46.211-20.04l-.038.083H42.5L41.209-21.7l-2.031,1.739H35.547l-.025-.083,4.24-3.167H43.24ZM37.146-22.1H34.277l-1.93-3.491h3.707ZM60.493,0h-4.24L52.6-11.35l-.076.013L50.248,0H46l3.694-18.484h4.253L57.6-7.135l.076-.013,2.272-11.337h4.24Z" transform="translate(154.5 631)" fill="#fedb00" stroke="#a71609" stroke-linecap="round" stroke-width="0.5"></path>
                                    </g>
                                </g>
                                <g transform="matrix(1, 0, 0, 1, 98.7, 620)" filter="url(#power)">
                                    <path id="power-2" data-name="power" d="M8.315,0,0,17H8.315L2.772,34l19.4-21.25H11.087L19.4,0Z" transform="translate(2.3 0.5)" fill="#fedb00" stroke="#f3a306" stroke-width="1">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="c-6 flash__sale__box__tablet">

                    <div class="coutdown">
                        <span class="coutdown__title">
                            K???t th??c sau
                        </span>

                        <div class="time">
                            <p id="day"></p>
                        </div>
                        <span>:</span>
                        <div class="time">
                            <p id="hour"></p>
                        </div>
                        <span>:</span>
                        <div class="time">
                            <p id="minutes"></p>
                        </div>
                        <span>:</span>
                        <div class="time">
                            <p id="seconds"></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Button -->
            <div class="flash__sale__next__btn">
                <i class="sale-icon right-sale next-icon"></i>
            </div>
            <div class="flash__sale__prev__btn">
                <i class="sale-icon left-sale prev-icon"></i>
            </div>
            <!-- End button -->
            <div class="row flash__sale__product__list__wrapper">
                <div class="flash__sale__product__list" id="flash__sale__product__list">
                    <!-- 1st -->
                    <div class="flash__sale__product">
                        <!--  Discount -->
                        <div class="flash__sale__discount">
                            <p>Gi???m 18%</p>
                        </div>
                        <div class="flash__sale__product__img__wrapper">
                            <a href="./product_detail.php"><img src="assets/img/flash_sale/1.webp" alt=""></a>
                        </div>
                        <div class="flash__sale__product__desc">
                            <a href="" class="flash__sale__product__desc__title">
                                <p class="flash__sale__product__desc__title__1st">
                                    M??y t???o oxy Dedakj 1aw 7<br> l??t
                                </p>
                            </a>
                            <div class="flash__sale__product__desc__price">
                                <div class="flash__sale__product__desc__price__new">
                                    <p>
                                        6.500.000
                                        <span class="flash__sale__product__desc__price__unit__new">??</span>
                                    </p>
                                </div>
                                <div class="flash__sale__product__desc__price__old">
                                    <p>
                                        8.000.000
                                        <span class="flash__sale__product__desc__price__unit__old">??</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Flash Sale -->

        <!-- Featured item -->
        <!-- Phone -->
        <?php 
        
        ?>
        <div class="menu-session" id="??i???n tho???i"></div>
        <div class="featured__phone grid wide">
            <!-- Title -->
            <div class="row featured__phone__gutter">
                <div class="c-3">
                    <div class="featured__phone__title">
                        <a href="" class="featured__phone__title__text">??i???n tho???i n???i b???t nh???t</a>
                    </div>
                </div>
                <div class="featured__phone__related__tag">
                    <a href="" class="futured__phone__item">Xem t???t c???</a>
                </div>
            </div>
            <!-- Tablet -->
            <div class="tablet__featured__phone">
                <div class="tablet__featured__phone__title">
                    <a href="">??i???n tho???i n???i b???t</a>
                    <a href="">Xem t???t c???</a>
                </div>
                <div class="tablet__featured__phone__tag__list">

                </div>
            </div>
            <!-- Product List -->
        <div class="featured__phone__product__list">
            <?php
            $conn = open_database();
            $sql = "select * from product where id_category = 4 and  sale_off < 20";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sale = 0;
                $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
            ?>
                
                    <!-- 1st -->
                    <div class="featured__phone__product__item">
                        <!--  Discount -->
                        <?php
                        if ($row['sale_off'] != 0) {
                        ?>
                            <div class="flash__sale__discount">
                                <p>Gi???m <?= $row['sale_off'] ?>%</p>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="featured__phone__product__img__wrapper">
                            <a href="./product_detail.php?id=<?= $row['id'] ?>"><img src="./assets/img/product/<?= $row['image'] ?>" alt=""></a>
                        </div>
                        <div class="featured__phone__product__desc">
                            <div class="featured__phone__product__desc__title">
                                <a href="" class="featured__phone__product">
                                    <?= $row['product_name'] ?>
                                </a>
                            </div>
                            <div class="featured__phone__product__desc__price">
                                <div class="featured__phone__product__desc__price__new">
                                    <p>
                                        <?php
                                        if ($row['sale_off'] != 0) {
                                        ?>
                                            <?= number_format($sale) ?>
                                        <?php
                                        } else {
                                        ?>
                                            <?= number_format($row['inital_price']) ?>
                                        <?php
                                        }
                                        ?>

                                        <span class="featured__phone__product__desc__price__unit__new">??</span>
                                    </p>
                                </div>
                                <?php
                                if ($row['sale_off'] != 0) {
                                ?>
                                    <div class="flash__sale__product__desc__price__old">
                                        <p>
                                            <?= number_format($row['inital_price']) ?>
                                            <span class="flash__sale__product__desc__price__unit__old">??</span>
                                        </p>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="featured__phone__product__promotion__info">
                                <p><?= $row['description'] ?></p>
                            </div>
                            <div class="featured__phone__product__desc__rare featured__phone__rare">
                                <div class="featured__phone__product__desc__rare__star">

                                    <?php
                                    $star = $row['rate'];
                                    $star_full = floor($star);
                                    $star_haft = $star - $star_full;
                                    $star_empty = 5 - $star_full - ceil($star_haft);
                                    for ($i = 0; $i < $star_full; $i++) echo '<i class="star-full-icon star-icon"></i>';
                                    if ($star_haft > 0) echo '<i class="star-haft-icon star-icon"></i>';
                                    for ($i = 0; $i < $star_empty; $i++) echo '<i class="star-border-icon star-icon"></i>';
                                    ?>

                                </div>
                                <div class="featured__phone__product__desc__rare__vote">
                                    <p>&nbsp;<?= $row['sell_quantity'] ?> ???? b??n</p>
                                </div>
                            </div>
                        </div>
                    </div>
                

            <?php
            }
            ?>

        </div>
        </div>
        <!-- End phone -->

        <!-- Laptop -->
        <?php 
            $conn = open_database();
            $sql = "select * from product where id_category = 3";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
            };
        ?>
        <!-- <div class="menu-session" id="Laptop"></div>
        <div class="featured__phone grid wide"> -->
            <!-- Title -->
            <!-- <div class="row featured__phone__gutter">
                <div class="c-3">
                    <div class="featured__phone__title">
                        <a href="" class="featured__phone__title__text">LAPTOP</a>
                    </div>
                </div>
                <div class="c-7  featured__phone__related__tag__list">
                    <div class="featured__phone__related__tag">
                        <a href="" class="futured__phone__item">Xem t???t c???</a>
                    </div>
                </div>
            </div> -->

            <!-- Product List -->
            <div class="featured__phone__product__list">
                <!-- 1st -->
                <?php
                $conn = open_database();
                $sql = "select * from product where id_category = 3 and  sale_off < 20";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $sale = 0;
                    $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
                ?>
                    <div class="featured__phone__product__item">
                        <?php
                        if ($row['sale_off'] != 0) {
                        ?>
                            <div class="flash__sale__discount">
                                <p>Gi???m <?= $row['sale_off'] ?>%</p>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="featured__phone__product__img__wrapper">
                            <a href="./product_detail.php?id=<?= $row['id'] ?>"><img src="assets/img/product/<?= $row['image'] ?>" alt=""></a>
                        </div>
                        <div class="featured__phone__product__desc">
                            <div class="featured__phone__product__desc__title">
                                <a href="" class="featured__phone__product">
                                    <?= $row['product_name'] ?>
                                </a>
                            </div>
                            <div class="featured__phone__product__desc__price">
                                <div class="featured__phone__product__desc__price__new">
                                    <p>
                                        <?php
                                        if ($row['sale_off'] != 0) {
                                        ?>
                                            <?= number_format($sale) ?>
                                        <?php
                                        } else {
                                        ?>
                                            <?= number_format($row['inital_price']) ?>
                                        <?php
                                        }
                                        ?>

                                        <span class="featured__phone__product__desc__price__unit__new">??</span>
                                    </p>
                                </div>
                                <?php
                                if ($row['sale_off'] != 0) {
                                ?>
                                    <div class="flash__sale__product__desc__price__old">
                                        <p>
                                            <?= number_format($row['inital_price']) ?>
                                            <span class="flash__sale__product__desc__price__unit__old">??</span>
                                        </p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="featured__phone__product__promotion__info">
                                <p><?= $row['description'] ?></p>
                            </div>
                            <div class="featured__phone__product__desc__rare featured__phone__rare">
                                <div class="featured__phone__product__desc__rare__star">
                                    <?php
                                    $star = $row['rate'];
                                    $star_full = floor($star);
                                    $star_haft = $star - $star_full;
                                    $star_empty = 5 - $star_full - ceil($star_haft);
                                    for ($i = 0; $i < $star_full; $i++) echo '<i class="star-full-icon star-icon"></i>';
                                    if ($star_haft > 0) echo '<i class="star-haft-icon star-icon"></i>';
                                    for ($i = 0; $i < $star_empty; $i++) echo '<i class="star-border-icon star-icon"></i>';
                                    ?>
                                </div>
                                <div class="featured__phone__product__desc__rare__vote">
                                    <p>&nbsp;<?= $row['sell_quantity'] ?> ???? b??n</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>


                <!-- More -->
                <div class="featured__phone__product__item view__all">
                    <i class="fas fa-arrow-circle-right"></i>
                    <p>More</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End laptop -->
    <!-- M??y t??nh ????? b??n -->
    <div class="menu-session" id="manhinh"></div>
    <div class="featured__phone grid wide">
        <!-- Title -->
        <div class="row featured__phone__gutter">
            <div class="c-3">
                <div class="featured__phone__title">
                    <a href="" class="featured__phone__title__text">M??N H??NH</a>
                </div>
            </div>
            <div class="c-7  featured__phone__related__tag__list">
                <div class="featured__phone__related__tag">
                    <a href="" class="futured__phone__item">Xem t???t c???</a>
                </div>
            </div>
        </div>
        <!-- Product List -->
        <div class="featured__phone__product__list">
            <!-- 1st -->
            <?php
            $conn = open_database();
            $sql = "select * from product where id_category = 10 and  sale_off < 20";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sale = 0;
                $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
            ?>
                <div class="featured__phone__product__item">
                    <?php
                    if ($row['sale_off'] != 0) {
                    ?>
                        <div class="flash__sale__discount">
                            <p>Gi???m <?= $row['sale_off'] ?>%</p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="featured__phone__product__img__wrapper">
                        <a href="./product_detail.php?id=<?= $row['id'] ?>"><img src="assets/img/product/<?= $row['image'] ?>" alt=""></a>
                    </div>
                    <div class="featured__phone__product__desc">
                        <div class="featured__phone__product__desc__title">
                            <a href="" class="featured__phone__product">
                                <?= $row['product_name'] ?>
                            </a>
                        </div>
                        <div class="featured__phone__product__desc__price">
                            <div class="featured__phone__product__desc__price__new">
                                <p>
                                    <?php
                                    if ($row['sale_off'] != 0) {
                                    ?>
                                        <?= number_format($sale) ?>
                                    <?php
                                    } else {
                                    ?>
                                        <?= number_format($row['inital_price']) ?>
                                    <?php
                                    }
                                    ?>

                                    <span class="featured__phone__product__desc__price__unit__new">??</span>
                                </p>
                            </div>
                            <?php
                            if ($row['sale_off'] != 0) {
                            ?>
                                <div class="flash__sale__product__desc__price__old">
                                    <p>
                                        <?= $row['inital_price'] ?>
                                        <span class="flash__sale__product__desc__price__unit__old">??</span>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="featured__phone__product__promotion__info">
                            <p><?= $row['description'] ?></p>
                        </div>
                        <div class="featured__phone__product__desc__rare featured__phone__rare">
                            <div class="featured__phone__product__desc__rare__star">
                                <?php
                                $star = $row['rate'];
                                $star_full = floor($star);
                                $star_haft = $star - $star_full;
                                $star_empty = 5 - $star_full - ceil($star_haft);
                                for ($i = 0; $i < $star_full; $i++) echo '<i class="star-full-icon star-icon"></i>';
                                if ($star_haft > 0) echo '<i class="star-haft-icon star-icon"></i>';
                                for ($i = 0; $i < $star_empty; $i++) echo '<i class="star-border-icon star-icon"></i>';
                                ?>
                            </div>
                            <div class="featured__phone__product__desc__rare__vote">
                                <p>&nbsp;<?= $row['sell_quantity'] ?> ???? b??n</p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <!-- More -->
            <div class="featured__phone__product__item view__all">
                <i class="fas fa-arrow-circle-right"></i>
                <p>More</p>
            </div>
        </div>
    </div>
    <!-- End M??y t??nh ????? b??n -->
    <!-- Tablet -->
    <div class="menu-session" id="M??y t??nh b???ng"></div>
    <div class="featured__phone grid wide">
        <!-- Title -->
        <div class="row featured__phone__gutter">
            <div class="c-3">
                <div class="featured__phone__title">
                    <a href="" class="featured__phone__title__text">TABLET</a>
                </div>
            </div>
            <div class="c-7  featured__phone__related__tag__list">
                <div class="featured__phone__related__tag">
                    <a href="" class="futured__phone__item">Xem t???t c???</a>
                </div>
            </div>
        </div>
        <!-- Product List -->
        <div class="featured__phone__product__list">
            <!-- 1nd -->
            <?php
            $conn = open_database();
            $sql = "select * from product where id_category = 6 and  sale_off < 20";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sale = 0;
                $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
            ?>
                <div class="featured__phone__product__item">
                    <?php
                    if ($row['sale_off'] != 0) {
                    ?>
                        <div class="flash__sale__discount">
                            <p>Gi???m <?= $row['sale_off'] ?>%</p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="featured__phone__product__img__wrapper">
                        <a href="./product_detail.php?id=<?= $row['id'] ?>"><img src="assets/img/product/<?= $row['image'] ?>" alt=""></a>
                    </div>
                    <div class="featured__phone__product__desc">
                        <div class="featured__phone__product__desc__title">
                            <a href="" class="featured__phone__product">
                                <?= $row['product_name'] ?>
                            </a>
                        </div>
                        <div class="featured__phone__product__desc__price">
                            <div class="featured__phone__product__desc__price__new">
                                <p>
                                    <?php
                                    if ($row['sale_off'] != 0) {
                                    ?>
                                        <?= $sale ?>
                                    <?php
                                    } else {
                                    ?>
                                        <?= $row['inital_price'] ?>
                                    <?php
                                    }
                                    ?>

                                    <span class="featured__phone__product__desc__price__unit__new">??</span>
                                </p>
                            </div>
                            <?php
                            if ($row['sale_off'] != 0) {
                            ?>
                                <div class="flash__sale__product__desc__price__old">
                                    <p>
                                        <?= $row['inital_price'] ?>
                                        <span class="flash__sale__product__desc__price__unit__old">??</span>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="featured__phone__product__promotion__info">
                            <p><?= $row['description'] ?></p>
                        </div>
                        <div class="featured__phone__product__desc__rare featured__phone__rare">
                            <div class="featured__phone__product__desc__rare__star">
                                <?php
                                $star = $row['rate'];
                                $star_full = floor($star);
                                $star_haft = $star - $star_full;
                                $star_empty = 5 - $star_full - ceil($star_haft);
                                for ($i = 0; $i < $star_full; $i++) echo '<i class="star-full-icon star-icon"></i>';
                                if ($star_haft > 0) echo '<i class="star-haft-icon star-icon"></i>';
                                for ($i = 0; $i < $star_empty; $i++) echo '<i class="star-border-icon star-icon"></i>';
                                ?>
                            </div>
                            <div class="featured__phone__product__desc__rare__vote">
                                <p>&nbsp;<?= $row['sell_quantity'] ?> ???? b??n</p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <!-- More -->
            <div class="featured__phone__product__item view__all">
                <i class="fas fa-arrow-circle-right"></i>
                <p>More</p>
            </div>
        </div>
    </div>
    <!-- End M??y t??nh ????? b??n -->
    <!-- ??m thanh -->
    <!-- Tablet -->
    <div class="menu-session" id="Tai nghe"></div>
    <div class="featured__phone grid wide">
        <!-- Title -->
        <div class="row featured__phone__gutter">
            <div class="c-3">
                <div class="featured__phone__title">
                    <a href="" class="featured__phone__title__text">??M THANH</a>
                </div>
            </div>
            <div class="c-7  featured__phone__related__tag__list">
                <div class="featured__phone__related__tag">
                    <a href="" class="futured__phone__item">Xem t???t c???</a>
                </div>
            </div>
        </div>
        <!-- Product List -->
        <div class="featured__phone__product__list">
            <!-- 1st -->
            <?php
            $conn = open_database();
            $sql = "select * from product where id_category = 9 and  sale_off < 20";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sale = 0;
                $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
            ?>
                <div class="featured__phone__product__item">
                    <?php
                    if ($row['sale_off'] != 0) {
                    ?>
                        <div class="flash__sale__discount">
                            <p>Gi???m <?= $row['sale_off'] ?>%</p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="featured__phone__product__img__wrapper">
                        <a href="./product_detail.php?id=<?= $row['id'] ?>"><img src="assets/img/product/<?= $row['image'] ?>" alt=""></a>
                    </div>
                    <div class="featured__phone__product__desc">
                        <div class="featured__phone__product__desc__title">
                            <a href="" class="featured__phone__product">
                                <?= $row['product_name'] ?>
                            </a>
                        </div>
                        <div class="featured__phone__product__desc__price">
                            <div class="featured__phone__product__desc__price__new">
                                <p>
                                    <?php
                                    if ($row['sale_off'] != 0) {
                                    ?>
                                        <?= number_format($sale) ?>
                                    <?php
                                    } else {
                                    ?>
                                        <?= number_format($row['inital_price']) ?>
                                    <?php
                                    }
                                    ?>

                                    <span class="featured__phone__product__desc__price__unit__new">??</span>
                                </p>
                            </div>
                            <?php
                            if ($row['sale_off'] != 0) {
                            ?>
                                <div class="flash__sale__product__desc__price__old">
                                    <p>
                                        <?= number_format($row['inital_price']) ?>
                                        <span class="flash__sale__product__desc__price__unit__old">??</span>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="featured__phone__product__promotion__info">
                            <p><?= $row['description'] ?></p>
                        </div>
                        <div class="featured__phone__product__desc__rare featured__phone__rare">
                            <div class="featured__phone__product__desc__rare__star">
                                <?php
                                $star = $row['rate'];
                                $star_full = floor($star);
                                $star_haft = $star - $star_full;
                                $star_empty = 5 - $star_full - ceil($star_haft);
                                for ($i = 0; $i < $star_full; $i++) echo '<i class="star-full-icon star-icon"></i>';
                                if ($star_haft > 0) echo '<i class="star-haft-icon star-icon"></i>';
                                for ($i = 0; $i < $star_empty; $i++) echo '<i class="star-border-icon star-icon"></i>';
                                ?>
                            </div>
                            <div class="featured__phone__product__desc__rare__vote">
                                <p>&nbsp;<?= $row['sell_quantity'] ?> ???? b??n</p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <!-- More -->
            <div class="featured__phone__product__item view__all">
                <i class="fas fa-arrow-circle-right"></i>
                <p>More</p>
            </div>
        </div>
    </div>
    <!-- End Tablet -->
    <!-- ?????ng h??? th??n minh -->
    <div class="menu-session" id="?????ng h???"></div>
    <div class="featured__phone grid wide">
        <!-- Title -->
        <div class="row featured__phone__gutter">
            <div class="c-3">
                <div class="featured__phone__title">
                    <a href="" class="featured__phone__title__text">?????NG H???</a>
                </div>
            </div>
            <div class="c-7  featured__phone__related__tag__list">
                <div class="featured__phone__related__tag">
                    <a href="" class="futured__phone__item">Xem t???t c???</a>
                </div>
            </div>
        </div>
        <!-- Tablet -->
        <!-- Product List -->
        <div class="featured__phone__product__list">

            <!-- 1nd -->
            <?php
            $conn = open_database();
            $sql = "select * from product where id_category = 7 and  sale_off < 20";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sale = 0;
                $sale = $row['inital_price'] - ($row['inital_price'] * ($row['sale_off'] / 100));
            ?>
                <div class="featured__phone__product__item">
                    <?php
                    if ($row['sale_off'] != 0) {
                    ?>
                        <div class="flash__sale__discount">
                            <p>Gi???m <?= $row['sale_off'] ?>%</p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="featured__phone__product__img__wrapper">
                        <a href="./product_detail.php?id=<?= $row['id'] ?>"><img src="assets/img/product/<?= $row['image'] ?>" alt=""></a>
                    </div>
                    <div class="featured__phone__product__desc">
                        <div class="featured__phone__product__desc__title">
                            <a href="" class="featured__phone__product">
                                <?= $row['product_name'] ?>
                            </a>
                        </div>
                        <div class="featured__phone__product__desc__price">
                            <div class="featured__phone__product__desc__price__new">
                                <p>
                                    <?php
                                    if ($row['sale_off'] != 0) {
                                    ?>
                                        <?= $sale ?>
                                    <?php
                                    } else {
                                    ?>
                                        <?= $row['inital_price'] ?>
                                    <?php
                                    }
                                    ?>

                                    <span class="featured__phone__product__desc__price__unit__new">??</span>
                                </p>
                            </div>
                            <?php
                            if ($row['sale_off'] != 0) {
                            ?>
                                <div class="flash__sale__product__desc__price__old">
                                    <p>
                                        <?= $row['inital_price'] ?>
                                        <span class="flash__sale__product__desc__price__unit__old">??</span>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="featured__phone__product__promotion__info">
                            <p><?= $row['description'] ?></p>
                        </div>
                        <div class="featured__phone__product__desc__rare featured__phone__rare">
                            <div class="featured__phone__product__desc__rare__star">
                                <?php
                                $star = $row['rate'];
                                $star_full = floor($star);
                                $star_haft = $star - $star_full;
                                $star_empty = 5 - $star_full - ceil($star_haft);
                                for ($i = 0; $i < $star_full; $i++) echo '<i class="star-full-icon star-icon"></i>';
                                if ($star_haft > 0) echo '<i class="star-haft-icon star-icon"></i>';
                                for ($i = 0; $i < $star_empty; $i++) echo '<i class="star-border-icon star-icon"></i>';
                                ?>
                            </div>
                            <div class="featured__phone__product__desc__rare__vote">
                                <p>&nbsp;<?= $row['sell_quantity'] ?> ???? b??n</p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <!-- More -->
            <div class="featured__phone__product__item view__all">
                <i class="fas fa-arrow-circle-right"></i>
                <p>More</p>
            </div>
        </div>
    </div>
    <!-- End ?????ng h??? th??ng minh -->

    <!-- Chuy??n trang th????ng hi???u -->
    <div class="featured__phone grid wide">
        <!-- Title -->
        <div class="row featured__phone__gutter">
            <div class="c-3">
                <div class="featured__phone__title__tech">
                    <a href="" class="featured__phone__title__text">Chuy??n trang c??ng ngh???</a>
                </div>
            </div>
        </div>
        <!-- Tablet -->
        <div class="tablet__featured__phone">
            <div class="tablet__featured__phone__title">
                <a href="">Chuy??n trang th????ng hi???u</a>
            </div>
        </div>
        <div class="row">
            <div class="brand__wrapper">
                <a href=""><img src="assets/img/c1.webp" alt="" class="brand__img"></a>
            </div>
            <div class="brand__wrapper">
                <a href=""><img src="assets/img/c2.webp" alt="" class="brand__img"></a>
            </div>
            <div class="brand__wrapper">
                <a href=""><img src="assets/img/c3.webp" alt="" class="brand__img"></a>
            </div>
            <div class="brand__wrapper">
                <a href=""><img src="assets/img/c4.webp" alt="" class="brand__img"></a>
            </div>
        </div>
        <div class="row">
            <div class="tablet__brand__wrapper__column">
                <div class="tablet__brand__wrapper">
                    <a href=""><img src="assets/img/c1.webp" alt="" class="tablet__brand__img"></a>
                </div>
                <div class="tablet__brand__wrapper">
                    <a href=""><img src="assets/img/c2.webp" alt="" class="tablet__brand__img"></a>
                </div>
            </div>
            <div class="tablet__brand__wrapper__column">
                <div class="tablet__brand__wrapper">
                    <a href=""><img src="assets/img/c3.webp" alt="" class="tablet__brand__img"></a>
                </div>
                <div class="tablet__brand__wrapper">
                    <a href=""><img src="assets/img/c4.webp" alt="" class="tablet__brand__img"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End chuy??n trang th????ng hi???u -->
    <!-- End Featured item -->
    <!-- Footer -->
    <?php
    require "./inc/footer.php"
    ?>
    <script src="assets/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        $.get("../api/get-product.php", function(data, status) {
            console.log(data);
            let dataParse = JSON.parse(data);
            console.log(dataParse);
            let dataObj = dataParse.data;
            console.log(dataObj);
            let flash__sale__product__list = document.getElementById('flash__sale__product__list');

            let html = dataObj.map((e) => {
                let priceSale = e.inital_price - Number(e.inital_price) *
                    (Number(e.sale_off) / 100)
                return `<div class="flash__sale__product">
                        <!--  Discount -->
                        <div class="flash__sale__discount">
                            <p>Gi???m ${e.sale_off}%</p>
                        </div>
                        <div class="flash__sale__product__img__wrapper">
                            <a href="./product_detail.php?id=${e.id}"><img src="./assets/img/product/${e.image}" alt=""></a>
                        </div>
                        <div class="flash__sale__product__desc">
                            <a href="" class="flash__sale__product__desc__title">
                                <p class="flash__sale__product__desc__title__1st">
                                    ${e.product_name}<br>
                                </p>
                            </a>
                            <div class="flash__sale__product__desc__price">
                                <div class="flash__sale__product__desc__price__new">
                                    <p>
                                        ${new Intl.NumberFormat().format(priceSale)}
                                        <span class="flash__sale__product__desc__price__unit__new">??</span>
                                    </p>
                                </div>
                                <div class="flash__sale__product__desc__price__old">
                                    <p>
                                        ${new Intl.NumberFormat().format(e.inital_price)}
                                        <span class="flash__sale__product__desc__price__unit__old">??</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>`
            })

            flash__sale__product__list.innerHTML = html.join('');
        });
    });
</script>

</html>