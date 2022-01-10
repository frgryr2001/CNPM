-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2022 lúc 02:43 PM
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
(19, 'son@gmail.com', '$2y$10$nwUMLDLwvA0kYBOMzHOxKePK7VEGYCS86cGIE3QFPFn0vGu0e3SQ2', 'Đậu Đăng Sơn', '019317452', 'Vĩnh Long', 1, '2022-01-10', '2022-01-10', '2022-01-10', 13000000, 1);


--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
    `id_cart` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

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
(3, 'Laptop'),
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) PRIMARY KEY AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `serial` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `productPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

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

INSERT INTO `product` (`id`, `id_category`, `product_name`, `description`, `inital_price`, `sale_off`, `sell_quantity`, `guarantee`, `createdAt`, `image`, `sale_off_period`) VALUES
(1, 4, 'Samsung Galaxy Z Fold3 5G', 'Fullbox', 23000000, 11, 0, 'No', 'current_timestamp()', NULL, '2022-02-01'),
(2, 4, 'Galaxy S21', 'Fullbox', 12000000, 0, 0, 'No', 'current_timestamp()', NULL, '0000-00-00'),
(3, 6, 'Samsung Galaxy Tab S7 FE', 'Một chiếc máy tính bảng màn hình lớn sẽ giúp mọi trải nghiệm dù là học hay chơi đều trở nên vô cùng hấp dẫn. Samsung Galaxy Tab S7 FE với hiệu năng tuyệt đỉnh và bút S Pen chuyên nghiệp sẽ luôn mang đến sự thú vị cho bạn.', 13990000, 13, 0, 'No', 'current_timestamp()', NULL, '2022-01-14'),
(4, 4, 'Galaxy A52s 5G', 'Tiên phong công nghệ 5G - Tốc độ vượt trội', 10190021, 0, 0, 'No', 'current_timestamp()', NULL, '0000-00-00');

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

INSERT INTO `product_img` (`id_product`, `image_path1`, `image_path2`, `image_path3`, `image_path4`) VALUES
(3, 'laptop0.webp', 'laptop1.webp', 'laptop2.webp', 'laptop3.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id_rate` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

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
--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orderDetail_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
