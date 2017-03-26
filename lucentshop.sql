-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2017 lúc 08:41 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lucentshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item`
--

CREATE TABLE `cart_item` (
  `item_id` varchar(150) NOT NULL DEFAULT 'UUID()',
  `cart_id` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart_item`
--

INSERT INTO `cart_item` (`item_id`, `cart_id`, `quantity`, `date_created`, `id_sp`) VALUES
('58d6376b1ebc2', '58d6376b0fbfb', 1, '2017-03-25 16:26:42', 5),
('58d75bf93e620', '58d75bf9296db', 1, '2017-03-26 13:13:46', 5),
('58d7609923d0e', '58d75da4091c9', 1, '2017-03-26 13:32:57', 4),
('58d760a2d9d7c', '58d75da4091c9', 1, '2017-03-26 13:33:06', 4),
('58d760aa5d9a0', '58d75da4091c9', 1, '2017-03-26 13:33:14', 8),
('58d760dfcb6ab', '58d760dfb28b4', 1, '2017-03-26 13:34:07', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_dm` int(11) NOT NULL,
  `ten_dm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_dm`, `ten_dm`) VALUES
(1, 'makeup'),
(2, 'lipstick'),
(3, 'moisturizer'),
(4, 'shampoo'),
(5, 'shower'),
(6, 'perfume');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsp`
--

CREATE TABLE `hangsp` (
  `id_hang` int(11) NOT NULL,
  `ten_hang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hangsp`
--

INSERT INTO `hangsp` (`id_hang`, `ten_hang`) VALUES
(1, 'tonymoly'),
(2, 'the faceshop'),
(3, 'innisfree'),
(4, 'missha'),
(5, 'etude house');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `gia_sp` double NOT NULL,
  `dac_biet` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `chi_tiet` text NOT NULL,
  `id_dm` int(11) NOT NULL,
  `id_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `anh_sp`, `gia_sp`, `dac_biet`, `trang_thai`, `chi_tiet`, `id_dm`, `id_hang`) VALUES
(4, 'phấn phủ face mix oil paper powder', 'face_mixoilpaperpowder.jpg', 60, 0, 0, '<p>&agrave;dssfdsfs</p>\r\n', 1, 1),
(5, 'Phấn phủ Gyeol two way pact 123456', '11801951_1560051400989988_915498264_n.jpg', 2500000, 0, 1, '<p>Gyeol two way pact 123</p>\r\n', 1, 1),
(6, 'Phấn phủ mix của tonymoly', 'mix.jpg', 100, 0, 0, '', 1, 1),
(8, 'phấn phủ face it', 'face it.jpg', 100, 1, 0, 'phấn phủ face it', 1, 1),
(10, 'phan-nen-the-face-shop-skin-brightening', 'phan-nen-the-face-shop-skin-brightening.jpg', 100, 1, 0, 'phan-nen-the-face-shop-skin-brightening', 1, 1),
(11, 'phan-phu-gold-collagen-ampoule-two-way-pact-spf30-v201-thefaceshop', 'phan-phu-gold-collagen-ampoule-two-way-pact-spf30-v201-thefaceshop.jpg', 100, 1, 0, 'phan-phu-gold-collagen-ampoule-two-way-pact-spf30-v201-thefaceshop', 1, 1),
(12, 'phu-kiem-dau-oil-clear-thefaceshop', 'phu-kiem-dau-oil-clear-thefaceshop.jpg', 100, 1, 0, 'phu-kiem-dau-oil-clear-thefaceshop', 1, 1),
(13, 'Phấn của tonymoly', '3-A3.jpg', 45, 0, 1, '<p>Phấn phủ An4 của tonymoly</p>\r\n', 1, 1),
(14, 'Phẩn phủ blurpowder03-500x500', 'blurpowder03-500x500.jpg', 100, 1, 0, 'Phẩn phủ blurpowder03-500x500', 1, 1),
(15, 'phu-kiem-dau-oil-clear-thefaceshop2', 'phu-kiem-dau-oil-clear-thefaceshop.jpg', 100, 1, 0, 'phu-kiem-dau-oil-clear-thefaceshop2', 1, 1),
(16, 'Phan phu etuhouse', 'anh 2.jpg', 100, 1, 0, 'Phẩn phủ của etuhouse', 1, 1),
(17, 'Son tonymoly', 'son1.jpg', 100, 1, 0, 'Son của tonymoly', 1, 1),
(18, 'SON-TONYMOLY-TONY-TINT-DELIGHT', 'SON-TONYMOLY-TONY-TINT-DELIGHT.jpg', 100, 1, 0, 'Son của tonymoly', 1, 1),
(19, 'Son của innissfree', 'son.jpg', 100, 1, 0, 'Son cua innissfree', 1, 1),
(20, 'Son dưỡng', 'son1.jpg', 50, 0, 1, '<p>Son dưỡng của tonymoly</p>\r\n', 2, 1),
(21, 'Missha lipstick', 'son1.jpg', 100, 1, 0, 'Son của missha', 1, 1),
(22, 'Etuhouse lipstick', 'son1.jpg', 100, 1, 0, 'Son môi của Etuhouse', 1, 1),
(23, 'son-li-lesson-3', 'son-li-lesson-3.jpg', 100, 0, 0, 'son-li-lesson-3', 2, 2),
(30, 'sản phẩm a', 'Screenshot (1).png', 150000, 1, 1, '<p>con c&aacute; vui vẻ</p>\r\n', 2, 3),
(31, 'sản phẩm a', 'Screenshot (1).png', 0, 1, 1, '<p>con c&aacute; vui vẻ</p>\r\n', 2, 3),
(32, 'sanphamt', 'Screenshot (1).png', 1500000, 0, 1, '<p>abcdef</p>\r\n', 4, 2),
(33, 'san pham t', '11801951_1560051400989988_915498264_n.jpg', 123124342, 0, 1, '<p>abcdefghi</p>\r\n', 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `quyentruycap` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `username`, `password`, `quyentruycap`) VALUES
(1, 'Admin', '123456', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `hangsp`
--
ALTER TABLE `hangsp`
  ADD PRIMARY KEY (`id_hang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`),
  ADD KEY `id_hang` (`id_hang`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `hangsp`
--
ALTER TABLE `hangsp`
  MODIFY `id_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `category` (`id_dm`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_hang`) REFERENCES `hangsp` (`id_hang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
