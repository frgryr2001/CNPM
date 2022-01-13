-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2022 lúc 04:59 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

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
(5, 0, 3, 1),
(6, 8, 7, 1),
(7, 16, 41, 1),
(8, 16, 40, 1),
(9, 16, 40, 1),
(10, 16, 30, 1),
(11, 16, 30, 1),
(12, 16, 30, 1),
(13, 16, 30, 1),
(14, 16, 42, 1),
(15, 16, 42, 1),
(16, 8, 32, 1),
(17, 8, 32, 1);

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

INSERT INTO `order` (`id_order`, `id_account`, `status`, `time`, `total`) VALUES
(59527, 8, 1, '2022-01-13', 9090000);

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

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `id_product`, `qty`, `serial`, `productPrice`) VALUES
(11, 59527, 32, 1, '6112502', 9090000);

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
(9, 6, 'Samsung Galaxy Tab S7 FE (WiFi)', 'Giảm thêm tới 1% cho thành viên Smember (áp dụng tùy sản phẩm)', 11500000, 15, 13, '12', 'current_timestamp()', 'samsung-galaxy-tab-s7-fe-den_1.jpg', '0000-00-00', 4.5),
(10, 5, 'Galaxy SmartTag', 'Galaxy SmartTag chính hãng Samsung, thiết bị theo dõi, định vị thông minh', 400000, 0, 0, '6 tháng', 'current_timestamp()', NULL, '2022-01-12', 0),
(11, 8, 'Pin sạc dự phòng Samsung', 'Pin sạc dự phòng Samsung 10000mAh chính hãng chuẩn Type C', 390000, 0, 0, '6 tháng', 'current_timestamp()', '11.jpg', '2022-01-12', 0),
(12, 5, 'Bao da Galaxy Z Fold3 5G Nắp Gập Samsung', 'Bao da chính hãng thiết kế đơn giản mà sang trọng, tinh tế', 2990000, 0, 0, 'No', 'current_timestamp()', '12.jpg', '2022-01-12', 0),
(13, 5, 'Ốp lưng Galaxy A52 5G Nhựa dẻo A Cover Samsung', 'Kiểu dáng đơn giản, được chế tác trong suốt đẹp mắt, vừa vặn cho Galaxy A52 5G', 140000, 0, 0, 'No', 'current_timestamp()', '13.jpg', '2022-01-12', 0),
(14, 5, 'Đế sạc không dây Samsung EP-P1100', 'Đế sạc không dây Type C Qi 9W Samsung EP-P1100 Đen', 500000, 0, 0, '12 tháng', 'current_timestamp()', '14.jpg', '2022-01-12', 0),
(15, 5, 'Adapter Sạc Samsung EP-TA800N', 'Adapter Sạc Type C PD 25W Samsung EP-TA800N', 490000, 0, 0, '12 tháng', 'current_timestamp()', '15.jpg', '2022-01-12', 0),
(16, 7, 'Samsung Galaxy Watch 4 LTE 40mm', 'Kiểu dáng trang nhã, thanh lịch cùng công nghệ tiên tiến đánh dấu kỷ nguyên mới của Samsung', 7490000, 0, 0, '12 tháng', 'current_timestamp()', '16.jpg', '2022-01-12', 0),
(17, 7, 'Samsung Galaxy Watch 4 Classic 46mm', 'Ấn tượng bởi vẻ đẹp cổ điển, thanh lịch', 7192000, 0, 0, '12 tháng', 'current_timestamp()', '17.jpg', '2022-01-12', 0),
(18, 7, 'Samsung Galaxy Watch 4 LTE Classic 46mm', 'Thiết kế trẻ trung, hiện đại', 9990000, 0, 0, '12 tháng', 'current_timestamp()', '18.jpg', '2022-01-12', 0),
(19, 7, 'Samsung Galaxy Watch 4 Classic 42mm', 'Thiết kế cổ điển, sang trọng', 6792000, 0, 0, 'No', 'current_timestamp()', '19.jpg', '2022-01-12', 0),
(20, 7, 'Samsung Galaxy Watch 4 40mm', 'Phong cách năng động, thời thượng', 6490000, 0, 0, '12 tháng', 'current_timestamp()', '20.jpg', '2022-01-12', 0),
(21, 8, 'Pin sạc dự phòng Polymer 20.000 mAh Type C PD Samsung EB-P5300', 'Kiểu dáng đơn giản, nhỏ gọn, màu đen thời trang', 1192000, 0, 0, 'No', 'current_timestamp()', '21.jpg', '2022-01-12', 0),
(22, 8, 'Pin Samsung EB-P3300', 'Sạc dự phòng Samsung mỏng nhẹ, vẻ ngoài tỏa sáng với gam màu xám sang trọng', 792000, 0, 0, 'No', 'current_timestamp()', '22.jpg', '2022-01-12', 0),
(23, 8, 'Pin Fast Charge Samsung ', 'Pin sạc dự phòng 10.200 mAh Fast Charge Samsung sở hữu dung lượng pin lớn có thể thoải mái sạc cho nhiều thiết bị liên tục, đảm bảo smartphone của bạn luôn giữ kết nối.', 1280000, 0, 0, '12 tháng', 'current_timestamp()', '23.jpg', '2022-01-12', 0),
(24, 8, 'Pin sạc dự phòng 20.000 mAh Fast Charge Samsung ', 'Pin sạc dự phòng 20.000 mAh Fast Charge Samsung sở hữu dung lượng pin lớn có thể thoải mái sạc cho nhiều thiết bị liên tục, đảm bảo smartphone của bạn luôn giữ kết nối', 1330000, 0, 0, '12 tháng', 'current_timestamp()', '24.jpg', '2022-01-12', 0),
(25, 9, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 R177N', 'Thiết kế hiện đại, sang trọng và tinh tế với gam màu trắng thuần khiết', 2990000, 0, 0, '12 tháng', 'current_timestamp()', '25.jpg', '2022-01-12', 0),
(26, 9, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds Live R180', 'Ngoại hình hoàn toàn mới, độc đáo riêng biệt', 1990000, 0, 0, '12 tháng', 'current_timestamp()', '26.jpg', '2022-01-12', 0),
(27, 9, 'Tai nghe Bluetooth True Wireless Galaxy Buds Pro', 'Thiết kế sang trọng, thời thượng cùng hộp sạc đồng nhất màu sắc đi kèm', 3990000, 0, 0, '12 tháng', 'current_timestamp()', '27.jpg', '2022-01-12', 0),
(28, 9, 'Tai nghe Bluetooth True Wireless Galaxy Buds Pro', 'Thiết kế sang trọng, thời thượng cùng hộp sạc đồng nhất màu sắc đi kèm', 3990000, 0, 0, '12 tháng', 'current_timestamp()', '28.jpg', '2022-01-12', 0),
(29, 9, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 R177N', 'Galaxy Buds 2 R177N nhỏ nhẹ, 3 phiên bản thời thượng', 2990000, 0, 0, '12 tháng', 'current_timestamp()', '29.jpg', '2022-01-12', 0),
(30, 10, 'Màn hình LCD Samsung Smart Monitor M5 27 inch Full HD - Remote (LS27AM501NEXXV)', 'LCD Samsung Smart Monitor (LS27AM501NEXXV) là phiên bản màn hình thông minh với dáng vẻ thời thượng cùng các tính năng hiện đại mang đến cho bạn những trải nghiệm công việc và giải trí bất tận', 8090000, 0, 0, '12 tháng', 'current_timestamp()', '30.jpg', '2022-01-12', 0),
(31, 10, 'Samsung LCD Gaming 27 inch Full HD 240Hz 4ms (LC27RG50FQEXXV)', 'Màn hình máy tính LCD Samsung Gaming 27 inch Full HD 240Hz 4ms/GSync (LC27RG50FQEXXV) với độ cong 1500R, tần số quét lên đến 240 Hz,... đáp ứng tốt nhu cầu chơi game của các game thủ', 9990000, 0, 0, '12 tháng', 'current_timestamp()', '31.jpg', '2022-01-12', 0),
(32, 10, 'Màn hình Samsung LCD Smart Monitor M5 32 inch Full HD-Remote (LS32AM500NEXXV)', 'Màn hình Samsung Smart Monitor M5 (LS32AM500NEXXV) là màn hình thông minh không cần máy tính đầu tiên có mặt trên toàn thế giới để thỏa mãn mọi nhu cầu từ công việc đến giải trí cho bạn những phút giây làm việc, thư giãn thật trọn vẹn', 9090000, 0, 0, '12 tháng', 'current_timestamp()', '32.jpg', '2022-01-12', 0),
(33, 10, 'Samsung LCD Gaming 24 inch Full HD (LC24RG50FQEXXV)', 'Màn hình máy tính LCD Samsung Gaming (LC24RG50FQEXXV) được thiết kế dành cho các game thủ với khả năng làm mới khung hình cực nhanh, đảm bảo các tựa game có tốc độ nhanh vẫn được chơi một cách mượt mà', 6590000, 0, 0, '12 tháng', 'current_timestamp()', '33.jpg', '2022-01-12', 0),
(34, 10, 'Samsung LCD Gaming 27 inch WQHD (LC27G55TQWEXXV)', 'LCD Samsung Gaming 27 inch WQHD 144Hz 1ms/HDR10 (LC27G55TQWEXXV) thiết kế đặc biệt với màn hình cong 27 inch, độ phân giải 2K, tần số quét 144Hz, công nghệ hình ảnh HDR10,... mang đến trải nghiệm hình ảnh và chuyển động chân thật, lý thú, lôi cuốn', 7990000, 0, 0, '12 tháng', 'current_timestamp()', '34.jpg', '2022-01-12', 0),
(35, 11, 'Loa thanh Samsung HW-T420', 'Thiết kế dạng hình khối, chắc chắn', 2790000, 0, 0, '12 tháng', 'current_timestamp()', '35.jpg', '2022-01-12', 0),
(36, 11, 'Loa Tháp Samsung MX-T70/XV', 'Thiết kế 2 mặt loa vát cạnh độc đáo, âm thanh đa hướng sống động', 8740000, 0, 0, '12 tháng', 'current_timestamp()', '36.jpg', '2022-01-12', 0),
(37, 11, 'Loa thanh Samsung HW-T550', 'Kiểu dáng hiện đại, gam màu đen mạnh mẽ, sang trọng', 3890000, 0, 0, '12 tháng', 'current_timestamp()', '37.jpg', '2022-01-12', 0),
(38, 11, 'Loa thanh Samsung HW-Q630', 'Thiết kế hiện đại, gọn đẹp', 6120000, 0, 0, '12 tháng', 'current_timestamp()', '38.jpg', '2022-01-12', 0),
(39, 11, 'Loa Tháp Samsung MX-T50/XV', 'Thiết kế dạng tháp với 3 chân đế vững chắc, 2 mặt loa vát cạnh, màu đen lôi cuốn', 6690000, 0, 0, '12 tháng', 'current_timestamp()', '39.jpg', '2022-01-12', 0),
(40, 4, 'Samsung Galaxy S20 FE 256GB', 'Samsung S20 FE là chiếc điện thoại sắp được ra mắt từ Samsung, với chữ FE đằng sau tên gọi của máy có nghĩa là Fan Edition. Đây là dòng điện thoại ra mắt như để gửi lời tri ân đến các fan trung thành đã và đang sử dụng các sản phẩm của Samsung. Với số lượ', 12700000, 10, 12, '3 tháng', '2022-01-13 09:30:30', '1c5a5a79af0e8834samsung-galaxy-20-fe_4_.jpg', '2022-01-13', 0),
(41, 4, 'Samsung Galaxy A32', 'Thiết kế tối giản thể hiện phong cách', 5600000, 0, 12, '3 tháng', '2022-01-13 09:33:07', '9cfb70d3f4f9cc97samsung-galaxy-a32-20.jpg', '2022-01-13', 0),
(42, 4, 'Galaxy Z Fold3 5G  ', 'Sở hữu siêu phẩm - Rước ưu đãi đặc quyền', 39999000, 15, 17, '3 tháng', '2022-01-13 09:57:52', '2675a3b2f74afb73zfold3_carousel_mainsinglekv_pc.webp', '2022-01-13', 0),
(43, 4, 'Điện thoại Samsung Galaxy S21 5G ', 'Galaxy S21 5G nằm trong series S21 đến từ Samsung nổi bật với thiết kế tràn viền, cụm camera ấn tượng cho đến hiệu năng mạnh mẽ hàng đầu.', 12000000, 12, 7, '1 năm', '2022-01-13 10:24:03', '641fc552148843a1samsung-galaxy-s21-tim-1-org.jpg', '2022-01-13', 0),
(45, 4, 'Điện thoại Samsung Galaxy S20 FE (8GB/256GB) ', 'Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galax', 16000000, 9, 5, '1 năm', '2022-01-13 10:26:43', 'a608db80ae37dd25samsung-galaxy-s20-fan-edition-xanh-duong-1-org.jpg', '2022-01-13', 0);

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
(9, '12.4 inches', 'TFT LCD', 'Snapdragon 778G', '4 GB', '610g', '8.0 MP', '64 GB', 'v5.2', '10090mAh'),
(10, 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Bluetooth Low Energy (BLE)', 'Unknown'),
(11, 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '10.000 mAh'),
(16, 'SUPER AMOLED 1.19 inch', 'One UI Watch', 'Exynos W920', 'Unknown', '25.9g', 'Unknown', '16 GB', 'Bluetooth v5.0', '247 mAh'),
(17, 'SUPER AMOLED 1.36 inch', 'One UI Watch', 'Exynos W920', 'Unknown', '52g', 'Unknown', '16 GB', 'Bluetooth v5.0', '361 mAh'),
(18, 'SUPER AMOLED 1.36 inch', 'One UI Watch', 'Exynos W920', 'Unknown', '52g', 'Unknown', '16 GB', 'Bluetooth v5.0', '361 mAh'),
(19, 'SUPER AMOLED 1.19 inch', 'One UI Watch', 'Exynos W920', 'Unknown', '46.5g', 'Unknown', '16 GB', 'Bluetooth v5.0', '247 mAh'),
(20, 'SUPER AMOLED 1.19 inch', 'One UI Watch', 'Exynos W920', 'Unknown', '25.9g', 'Unknown', '16 GB', 'Bluetooth v5.0', '247 mAh'),
(21, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '392 g', 'Unknown', 'Unknown', 'Unknown', '20.000 mAh'),
(22, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '240 g', 'Unknown', 'Unknown', 'Unknown', '10.000 mAh'),
(23, 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(24, 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(25, 'Unknown', 'Android', 'Unknown', 'Unknown', '5 g', 'Unknown', 'Unknown', 'Bluetooth 5.2', 'Unknown'),
(26, 'Unknown', 'Android, iOS (iPhone, iPad), Windows', 'Unknown', 'Unknown', '5.6 g', 'Unknown', 'Unknown', 'Bluetooth 5.0', 'Unknown'),
(27, 'Unknown', 'Android, iOS (iPhone), Windows', 'Unknown', 'Unknown', '51.2g', 'Unknown', 'Unknown', 'Bluetooth 5.0', 'Unknown'),
(28, 'Unknown', 'Android, iOS (iPhone, iPad), Windows', 'Unknown', 'Unknown', '51.2g', 'Unknown', 'Unknown', 'Bluetooth 5.0', 'Unknown'),
(29, 'Unknown', 'Android', 'Unknown', 'Unknown', '5 g', 'Unknown', 'Unknown', 'Bluetooth 5.2', 'Unknown'),
(30, '27 inch', 'Unknown', 'Unknown', 'Unknown', '3.6 kg', 'Unknown', 'Unknown', 'Bluetooth 4.2', 'Unknown'),
(31, '27 inch', 'Unknown', 'Unknown', 'Unknown', '4.6 kg', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(32, '32 inch', 'Unknown', 'Unknown', 'Unknown', '5.0 kg', 'Unknown', 'Unknown', 'Bluetooth 4.2', 'Unknown'),
(33, '24 inch', 'Unknown', 'Unknown', 'Unknown', '3.3 kg', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(34, '27 inch', 'Unknown', 'Unknown', 'Unknown', '4.5 kg', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(35, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '1.5 kg', 'Unknown', 'Unknown', 'Bluetooth 2.0', 'Unknown'),
(36, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '26.5 kg', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(37, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '9.5 kg', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(38, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '3.44 Kg', 'Unknown', 'Unknown', 'Unknown', 'Unknown'),
(39, 'Unknown', 'Unknown', 'Unknown', 'Unknown', '11.6 kg', 'Unknown', 'Unknown', 'Unknown', 'Unknown');

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
