SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

CREATE DATABASE IF NOT EXISTS `edsc_store` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `edsc_store`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `userId` varchar(15) NOT NULL,
  `productId` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL ,
  PRIMARY KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` varchar(15) NOT NULL,
  `productId` varchar(15) NOT NULL,
  `userId` varchar(15) NOT NULL,
  `content` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` varchar(15) NOT NULL,
  `name` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  `newPrice` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `rate` double NOT NULL,
  `manufacturerId` varchar(15) NOT NULL,
  `sale` tinyint(1) NOT NULL,
  `image` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'product.webp',
  `registerTime` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `email` varchar(100) NOT NULL,
  `token` varchar(10000) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 60,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(100) NOT NULL DEFAULT '12341234',
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'Nguyen Van A',
  `email` varchar(100) NOT NULL UNIQUE,
  `phone` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'avatar.webp',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturerId` varchar(15) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`manufacturerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- FOREIGN KEY --
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_productId` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);
COMMIT;

ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_manufacturerId` FOREIGN KEY (`manufacturerId`) REFERENCES `manufacturer` (`manufacturerId`);
COMMIT;

ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_productId` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);
COMMIT;

ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

-- DATA INSERT --
INSERT INTO `admin`(`username`, `password`, `name`) VALUES 
('admin1','admin1',N'Trần Minh Nhựt'),
('admin2','admin2',N'Trần Minh Nhựt');

INSERT INTO `manufacturer`(`manufacturerId`, `name`) VALUES
('DEL','DELL'),
('MAC','Macbook');

INSERT INTO `user`(`userId`, `username`, `password`, `name`, `email`, `phone`, `avatar`) VALUES
('US1234','user1','user1','Nguyen Van A','sdfhsdfs@gmail.com','0801239123','avatar.webp'),
('US1233','user2','user2','Nguyen Van A','sdfhsdfss@gmail.com','0801239123','avatar.webp');

INSERT INTO `product`(`productId`, `name`, `description`, `newPrice`, `price`, `rate`, `manufacturerId`, `sale`, `image`) VALUES
('DT1','Iphone 13 Pro Max | 1TB','Tang mot em nguoi yeu',1200000,1000000,3.5,'DEL',1, 'iphone.webj'),
('LA1','Macbook M1 Pro 2021 | 16GB','Tang mot em nguoi yeu',1000000,900000,3.5,'DEL',1, 'iphone.webj');

INSERT INTO `comment`(`commentId`, `productId`, `userId`, `content`) VALUES
('CM12','DT1','US1234','hang cui vkl'),
('CM11','DT1','US1234','hang cui vkl');

INSERT INTO `token`(`email`, `token`) VALUES
('ashgjadg@gmail.com','HJSGDHAGSDKHAGDHJG'),
('ashgsjadg@gmail.com','HJSGDHAGSDKHAGDHJG');

INSERT INTO `cart`(`userId`, `productId`, `quantity`) VALUES
('US1234','DT1',2),
('US1233','LA1',3);