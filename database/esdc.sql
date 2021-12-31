-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 01:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esdc`
--
CREATE DATABASE IF NOT EXISTS `esdc` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `esdc`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`) VALUES
('admin', 'admin', 'Đậu Đăng Sơn'),
('admin1', 'admin1', 'Lê Hoàng Nhân'),
('admin2', 'admin2', 'Đại Hiệp');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `billId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`billId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billId`, `userId`, `time`) VALUES
(1, 1, '2021-11-16'),
(2, 1, '2021-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `billId` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `productName` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  KEY `billId` (`billId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`billId`, `qty`, `productName`, `productPrice`) VALUES
(1, 2, 'Tai nghe True Wireless Chống ồn Soundpeats T2\r\n', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brand`) VALUES
(1, 'Dell'),
(2, 'Apple'),
(3, 'Samsung'),
(4, 'Microsoft'),
(5, 'Xiaomi'),
(6, 'Vivo'),
(7, 'Oppo'),
(8, 'Huawei'),
(9, 'Realme'),
(10, 'Lenovo'),
(11, 'Asus'),
(12, 'MSI'),
(13, 'HP'),
(14, 'Acer'),
(15, 'Razer');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cartId`),
  KEY `cart_ibfk_1` (`userId`),
  KEY `cart_ibfk_2` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userId`, `productId`, `quantity`, `cartId`) VALUES
(1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `rate` double DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `userId` (`userId`),
  KEY `productId` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `productId`, `userId`, `content`, `time`, `rate`) VALUES
(1, 1, 1, 'HSDGHAGSDAKGDHASGDAKSD', '2021-11-16 12:06:49', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `newPrice` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `brandId` int(11) DEFAULT NULL,
  `sale` tinyint(1) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'product.webp',
  `registerTime` date NOT NULL DEFAULT current_timestamp(),
  `typeId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sellQuantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  KEY `typeId` (`typeId`),
  KEY `brandId` (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `description`, `newPrice`, `price`, `rate`, `brandId`, `sale`, `image`, `registerTime`, `typeId`, `quantity`, `sellQuantity`) VALUES
(1, 'Tai nghe True Wireless Chống ồn Soundpeats T2', 'Nhận gói 6 tháng Apple Music miễn phí và 1 km khác', 3500000, 3300000, 4, 1, 1, 'sound.webp', '2021-11-16', 2, 1000, 300);

-- --------------------------------------------------------

--
-- Table structure for table `productimg`
--

DROP TABLE IF EXISTS `productimg`;
CREATE TABLE IF NOT EXISTS `productimg` (
  `productId` int(11) DEFAULT NULL,
  `img1` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  `img2` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  `img3` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  `img4` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  UNIQUE KEY `productId` (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `productimg`
--

INSERT INTO `productimg` (`productId`, `img1`, `img2`, `img3`, `img4`) VALUES
(1, 'avatar.webp', 'avatar1.webp', 'avatar2.webp', 'avatar3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `token` varchar(10000) COLLATE utf8_vietnamese_ci NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 60,
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`email`, `token`, `duration`) VALUES
('nguyenvanlinh1@gmail.com', 'HSDGFHSHGDAHDHASHKASDHSGHAS', 60);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeId`, `typeName`) VALUES
(1, 'mobile'),
(2, 'laptop'),
(3, 'tablet'),
(4, 'sound'),
(5, 'watch'),
(6, 'monitor'),
(7, 'pc'),
(8, 'accessory'),
(9, 'card'),
(10, 'camera'),
(11, 'keyboard'),
(12, 'mouse');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `name`, `email`, `phone`, `address`, `avatar`) VALUES
(1, 'vanlinh\r\n', 'vanlinh', 'Nguyễn Văn Linh', 'nguyenvanlinh1@gmail.com', '46646545645644', '134 Lê Đức Thọ, P. Tân Phong, Quận 7, TP. Hồ Chí Minh', 'avatar.webp');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
-- ALTER TABLE `bill`
--   ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
--   ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`billId`) REFERENCES `bill` (`billId`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`billId`) REFERENCES `bill` (`billId`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `type` (`typeId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`);

--
-- Constraints for table `productimg`
--
ALTER TABLE `productimg`
  ADD CONSTRAINT `productimg_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
