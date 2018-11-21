-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2018 lúc 12:33 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `18php05_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `name category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`catID`, `name category`) VALUES
(1, 'Luffy'),
(2, 'zoro'),
(3, 'nami');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `catID`, `name`, `price`, `description`, `image`, `created`) VALUES
(2, 0, 'Dép lào xám', 20000, 'Dép nhập khẩu từ Thái', '5bf53ec36ed51-5bf4424329bf4-5bde75c976939-logo-dao-hai-tac.png', '2009-11-11 00:00:00'),
(10, 0, 'Le', 123457000, 'Thoang', 'img.jpg', '2018-10-31 19:22:50'),
(16, 0, 'Zoro', 12345700000, 'Ahihi', '5bf43e3578860-img5.jpg', '2018-11-21 00:02:45'),
(18, 0, 'Nami', 8521990000, 'Hoa tiêu', '5bf43f26ea736-img4.jpg', '2018-11-21 00:06:46'),
(19, 0, 'Chopper', 49522000000000, 'Chopper', '5bf441f093f35-img2.jpg', '2018-11-21 00:18:40'),
(20, 0, 'Onepiece', 498494, 'ầdasdhwef9werh8', '5bf4424329bf4-5bde75c976939-logo-dao-hai-tac.png', '2018-11-21 00:20:03'),
(23, 0, 'Le', 12345700000, 'Thoang', '5bf51f64eb22c-5bdef625b98ea-img3.gif', '2018-11-21 00:30:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'Thoang', 'thoang@gmail.com'),
(2, 'Canh', 'test@gmail.com'),
(3, 'PHP05', 'ok@gmail.com'),
(4, 'Danh', 'danh@gmail.com'),
(5, 'TEST', 'test@gmail.com'),
(6, 'TEST ok ok', 'testok@gmail.com'),
(16, 'JUNIORWORKS', 'apple.luong1905@gmail.com'),
(18, 'Lottery1111', 'lottery@yahoo.com.vn'),
(19, 'Ahihiqq', 'Ahihi@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
