-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2022 lúc 09:22 AM
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
CREATE DATABASE IF NOT EXISTS `cnpm` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `cnpm`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(32) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `token` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
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
  `id_product` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `name` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `newPrice` int(11) DEFAULT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `hotsale` tinyint(1) DEFAULT NULL,
  `sellQuantity` int(11) DEFAULT NULL,
  `guarantee` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetail`
--

CREATE TABLE `productdetail` (
  `id_product` int(11) NOT NULL,
  `screen` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `feature` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `cpu` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ram` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `weight` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `camera` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `storage` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `bluetooth` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `port` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `resolution` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_img`
--

CREATE TABLE `product_img` (
  `id_product` int(11) NOT NULL,
  `image_path` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp'
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
  ADD PRIMARY KEY (`id_account`);

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
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_orderdetail_product` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_category_product` (`id_category`);

--
-- Chỉ mục cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`id_product`);

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
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_acc` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`productId`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_acc` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orderdetail_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetail_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category_product` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `fk_productdetail_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `fk_product_image` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `fk_rate_product` FOREIGN KEY (`productId`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `fk_warehouse_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
