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


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esdc`
--
CREATE DATABASE IF NOT EXISTS `cnpm` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `cnpm`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id_account` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(32) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL, -- role 0 la admin , role 1 la nhanvien kho, role 2 la nhanvien bán hàng
  `salary` double DEFAULT NULL,
  `token` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bill`
--


-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id_order_detail` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `serial` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL, -- mã bảo hành
  `productPrice` double DEFAULT NULL,
  PRIMARY KEY (`id_order_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bill_detail`
--



-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `brand`
--


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `cart`
--



-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

-- chưa biết kết nối ở đâu
DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `id_rate` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  PRIMARY KEY (`id_rate`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `comment`
--



-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `name` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `newPrice` int(11) DEFAULT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `sale` tinyint(1) DEFAULT NULL,
  `sellQuantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `product`
--


-- --------------------------------------------------------

--
-- Table structure for table `productimg`
--

DROP TABLE IF EXISTS `productimg`;
CREATE TABLE IF NOT EXISTS `productimg` (
  `id_product` int(11) DEFAULT NULL,
  `Imagepath` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT 'avatar.webp',
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;





-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `importTime` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

DROP TABLE IF EXISTS `productDetail`;
CREATE TABLE IF NOT EXISTS `productDetail` (
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
  `resolution` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;



