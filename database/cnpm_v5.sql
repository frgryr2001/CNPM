-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2022 lúc 07:09 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnpm`
--
CREATE DATABASE IF NOT EXISTS `cnpm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cnpm`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT 3,
  `createdAt` date DEFAULT current_timestamp(),
  `updatedAt` date DEFAULT current_timestamp(),
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `salary` double DEFAULT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fullname`, `phone`, `address`, `role`, `createdAt`, `updatedAt`, `birthday`, `salary`, `gender`) VALUES
(8, 'kh1@gmail.com', '$2y$10$iFye9PfJodh1xnw0pUUDlO.2f7hhWTtwy5z5wr.QPNncKCy8zzrNq', 'Khách hàng 1', '0919002424', 'Quảng Bình', 3, '2022-01-07', '2022-01-07', '2022-01-07', NULL, 1),
(9, 'kh2@gmail.com', '$2y$10$iFye9PfJodh1xnw0pUUDlO.2f7hhWTtwy5z5wr.QPNncKCy8zzrNq', 'Khách hàng 2', '0919004743', 'Nam Định', 3, '2022-01-07', '2022-01-07', '2022-01-01', NULL, 0),
(10, 'nttruong10101@gmail.com', '$2y$10$iFye9PfJodh1xnw0pUUDlO.2f7hhWTtwy5z5wr.QPNncKCy8zzrNq', 'Nguyễn Thế Trường', '0919004743', 'Quảng Bình', 1, '2022-01-07', '2022-01-07', '2001-06-10', 7000000, 0),
(11, 'nhan@gmail.com', '$2y$10$SSzAc/XFb7gwdIdwcY0UmubHTT3rIeWYsTjo2raRqHSbfjt3kgCC.', 'Lê Hoàng Nhân', '0919004743', 'An Giang', 2, '2022-01-08', '2022-01-08', '2001-01-01', 12000000, 0),
(16, 'admin@gmail.com', '$2y$10$iFye9PfJodh1xnw0pUUDlO.2f7hhWTtwy5z5wr.QPNncKCy8zzrNq', 'Nguyễn Thế Trường', '0919004743', 'Quảng Bình', 0, '2022-01-10', '2022-01-10', '2001-06-10', NULL, 1),
(17, 'tin@gmail.com', '$2y$10$6kMy8Qw1YJrcy0I7l94oVOeeQA4EU9PTdUpD6ZWjrMAlhyRlGsAra', 'Nguyễn Trung Tín', '0988425563', 'Đồng Nai', 2, '2022-01-10', '2022-01-10', '2022-01-10', 12000000, 1),
(18, 'quan@gmail.com', '$2y$10$BVu8MGKNxoC9u6g2roWsy.j62rzgiggts3LUsOpMWNkZWyoHnGqY.', 'Phạm Nguyễn Hoàng Quân', '098492424', 'TP Hồ Chí Minh', 1, '2022-01-10', '2022-01-10', '2022-01-10', 9000000, 0),
(19, 'son@gmail.com', '$2y$10$nwUMLDLwvA0kYBOMzHOxKePK7VEGYCS86cGIE3QFPFn0vGu0e3SQ2', 'Đậu Đăng Sơn', '019317452', 'Vĩnh Long', 1, '2022-01-10', '2022-01-10', '2022-01-10', 13000000, 1),
(27, 'nhanle.lx@gmail.com', '$2y$10$Ol5nMzoXDwhwqsGH9Q2mcOjgl6a9jS7TaGAUN.uHgGhYSPaLrWN7K', 'Lê Hoàng Nhân', '9182385324', 'HCM1', 0, '2022-01-10', '2022-01-10', '0000-00-00', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_account`, `productId`, `quantity`) VALUES
(1, 27, 3, 1),
(2, 27, 3, 1),
(3, 27, 3, 1),
(4, 27, 3, 1),
(5, 0, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(4, 'Điện thoại'),
(5, 'Phụ kiện'),
(6, 'Máy tính bảng'),
(7, 'Đồng hồ'),
(8, 'Sạc dự phòng'),
(9, 'Tai nghe'),
(10, 'Màn hình máy tính'),
(11, 'Loa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_account` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `serial` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `productPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `inital_price` int(11) NOT NULL,
  `sale_off` int(255) DEFAULT 0,
  `sell_quantity` int(255) DEFAULT 0,
  `guarantee` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT 'No',
  `createdAt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT current_timestamp(),
  `image` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sale_off_period` date DEFAULT current_timestamp(),
  `rate` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_category`, `product_name`, `description`, `inital_price`, `sale_off`, `sell_quantity`, `guarantee`, `createdAt`, `image`, `sale_off_period`, `rate`) VALUES
(5, 6, 'Samsung Galaxy Tab S7 Plus', 'Tặng Bao da kiêm bàn phím Galaxy Tab S7+/Tab S7 Fe', 23990000, 5, 5, '12', 'current_timestamp()', 'samsung-galaxy-tab-s7-plus-3.jpg\r\n', '0000-00-00', 0),
(6, 6, 'Samsung Galaxy Tab S7', 'Tặng bao da kiêm bàn phím Galaxy Tab S7', 18990000, 25, 8, '12', 'current_timestamp()', 'samsung-galaxy-tab-s7-1.jpg', '0000-00-00', 4),
(7, 6, 'Samsung Galaxy Tab S7 FE (4G)', 'Tặng Bao Da Samsung Galaxy Tab S7 FE Đen Chính Hãng\r\n', 13990000, 5, 15, '12', 'current_timestamp()', 'samsung-galaxy-tab-s7-fe-green-600x600.jpg', '0000-00-00', 5),
(8, 6, 'Samsung Galaxy Tab A7 Lite', 'Tặng bao da nắp gập Tab A7 Lite chính hãng', 4350000, 10, 10, '12', 'current_timestamp()', '43636_tab_a7_lite_silver_ha1_2.jpg', '0000-00-00', 3.5),
(9, 6, 'Samsung Galaxy Tab S7 FE (WiFi)', 'Giảm thêm tới 1% cho thành viên Smember (áp dụng tùy sản phẩm)', 11500000, 15, 13, '12', 'current_timestamp()', 'samsung-galaxy-tab-s7-fe-den_1.jpg', '0000-00-00', 4.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetail`
--

CREATE TABLE `productdetail` (
  `id` int(11) NOT NULL,
  `screen` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `features` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `cpu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `ram` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `weight` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `camera` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `storage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `bluetooth` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown',
  `battery` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Unknown'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `productdetail`
--

INSERT INTO `productdetail` (`id`, `screen`, `features`, `cpu`, `ram`, `weight`, `camera`, `storage`, `bluetooth`, `battery`) VALUES
(5, '12.4 inches', 'Super AMOLED', '1 nhân 2.84Ghz\r\n3 nhân 2.45Ghz\r\n4 nhân 1.8Ghz', '6 GB', '575 g', 'Góc rộng:8 MP, f/2.0', '128 GB', '5.1, A2DP, LE', 'Li-Po 10090 mAh\r\nSạc nhanh 45W'),
(6, '11 inches', 'Android 10, One UI 2', 'Tám nhân Kryo 585\r\n1 nhân 3.09 GHz\r\n3 nhân 2.42 GHz\r\n4 nhân 1.8 GHz', '6 GB', '500 g', '13 MP góc rộng,khẩu độ f/2.0\r\n5 MP góc siêu rộng f/2.2', '128 GB', '5.0, A2DP, LE', 'Pin Li-Po 8000 mAh\r\nSạc nhanh 45W'),
(7, '12.4 inches', 'PLS TFT LCD', '2x2.2 GHz Kryo 570 & 6x1.8 GHz Kryo 570', '4 GB', '608 g', '5 MP', '64 GB', '5.0, A2DP, LE', '10090 mAh'),
(8, '8.7 inches', 'TFT LCD', 'Unknown', '3 GB', '500g', '12ml', '32 GB', '5.0', '5100 mAh'),
(9, '12.4 inches', 'TFT LCD', 'Snapdragon 778G', '4 GB', '610g', '8.0 MP', '64 GB', 'v5.2', '10090mAh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_img`
--

CREATE TABLE `product_img` (
  `id_product` int(11) NOT NULL,
  `image_path1` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  `image_path2` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  `image_path3` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  `image_path4` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id_rate` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`id_rate`, `productId`, `rate`) VALUES
(1, 1, 4),
(5, 1, 5),
(6, 1, 4),
(7, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse`
--

CREATE TABLE `warehouse` (
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `importTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_cart_acc` (`id_account`),
  ADD KEY `fk_cart_product` (`productId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_order_acc` (`id_account`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `fk_orderDetail_order` (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`id_category`);

--
-- Chỉ mục cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id_rate`),
  ADD KEY `fk_rate_product` (`productId`);

--
-- Chỉ mục cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67017;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orderDetail_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Các ràng buộc cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `fk_product_detail` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `fk_product_image` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
