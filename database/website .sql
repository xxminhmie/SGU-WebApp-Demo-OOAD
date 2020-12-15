-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2020 lúc 10:49 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'customer',
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `fullname`, `email`, `address`, `phone`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', ''),
(2, 'staff', 'staff', 'staff', '', '', '', ''),
(3, 'manager', 'manager', 'manager', '', '', '', ''),
(13, 'xxminhmie3', 'xxminhmie3', 'customer', 'Lương Hồ Kim Minh', 'xxminhmie3@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(14, 'xxminhmie4', 'xxminhmie4', 'customer', 'Nguyễn Hồ Kim Minh', 'xxminhmie4@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(15, 'xxminhmie5', 'xxminhmie5', 'customer', 'Trần Hồ Kim Minh', 'xxminhmie5@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(16, 'xxminhmie6', 'xxminhmie6', 'customer', 'Trịnh Hồ Kim Minh', 'xxminhmie6@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(17, 'xxminhmie7', 'xxminhmie7', 'customer', 'Võ Hồ Kim Minh', 'xxminhmie7@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(18, 'xxminhmie8', 'xxminhmie8', 'customer', 'Định Hồ Kim Minh', 'xxminhmie8@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(19, 'xxminhmie9', 'xxminhmie9', 'customer', 'Trương Hồ Kim Minh', 'xxminhmie9@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(20, 'xxminhmie10', 'xxminhmie10', 'customer', 'Dương Hồ Kim Minh', 'xxminhmie10@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(21, 'xxminhmie11', 'xxminhmie11', 'customer', 'Huỳnh Hồ Kim Minh', 'xxminhmie11@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(22, 'xxminhmie12', 'xxminhmie12', 'customer', 'Phan Hồ Kim Minh', 'xxminhmie12@gmail.com', '87 Nguyễn Trãi, Q5, THPCM', '0123456456'),
(23, 'mymy', 'mymy', 'customer', 'Nguyễn Ngọc Mỹ Mỹ', 'mymy@gmail.com', '123 Nguyễn Trãi, Q5, TPHCM', '0126445445'),
(26, 'catphuong', 'catphuong', 'customer', 'Trần Ngọc Cát Phương', 'catphuong@gmail.com', '456 Hồng Bàng, Q5, THHCM', '0126445445'),
(28, 'abc', 'abc', 'admin', 'ABC', 'ABC@gmail.com', '123 Nguyễn Trãi, Q5, TPHCM', '0126445445');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `status`) VALUES
(1, 'Nike', ''),
(2, 'Jordan', ''),
(3, 'Adidas', ''),
(4, 'Converse', ''),
(7, 'Puma', 'deleted');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `date` date NOT NULL,
  `totalprice` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `accountid`, `date`, `totalprice`, `status`) VALUES
(47, 13, '2020-05-12', 1840000, 'Confirmed'),
(48, 14, '2020-05-23', 11447000, 'Confirmed'),
(49, 15, '2020-06-01', 3600000, 'Confirmed'),
(50, 16, '2020-06-01', 1200000, 'Confirmed'),
(51, 16, '2020-06-17', 2929000, 'Confirmed'),
(52, 13, '2020-06-17', 3669000, 'Pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `productid`, `quantity`, `fullname`, `address`, `phone`, `note`, `price`) VALUES
(52, 12, 1, 'Huỳnh Lê Phương Phương', '123 Nguyễn Trãi, Q5, TPHCM', '0126445445', '', 3669000),
(51, 9, 1, 'Trịnh Hồ Kim Minh', '87 Nguyễn Trãi, Q5, THPCM', '0123456456', '', 2929000),
(50, 2, 1, 'Huỳnh Lê Phương Phương', '456 Hồng Bàng, Q5, THHCM', '0126445445', '', 1200000),
(49, 3, 1, 'Huỳnh Lê Phương Phương', '123 Nguyễn Trãi, Q5, TPHCM', '0126445445', '', 1200000),
(47, 0, 1, 'Lê Hồ Kim Minh', '87 Nguyễn Trãi, Q5, THPCM', '0123456456', '', 1840000),
(49, 2, 2, 'Huỳnh Lê Phương Phương', '123 Nguyễn Trãi, Q5, TPHCM', '0126445445', '', 2400000),
(48, 12, 2, 'Nguyễn Hồ Kim Minh', '87 Nguyễn Trãi, Q5, THPCM', '0123456456', '', 7338000),
(48, 6, 1, 'Nguyễn Hồ Kim Minh', '87 Nguyễn Trãi, Q5, THPCM', '0123456456', '', 4109000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(12) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `brandid`, `size`, `color`, `name`, `image`, `quantity`, `price`, `status`) VALUES
(2, 3, 39, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(2, 3, 38, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(2, 3, 37, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(2, 3, 36, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(1, 2, 43, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(1, 2, 42, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(1, 2, 41, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(1, 2, 40, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(1, 2, 39, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(1, 2, 38, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(1, 2, 37, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(1, 2, 36, 'White', 'Air Jordan 1 Mid', 'air-jordan-1-mid-shoe-86f1ZW.jpg', 12, 2929000, 0),
(0, 1, 43, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(0, 1, 42, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(0, 1, 41, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(0, 1, 40, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(0, 1, 39, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(0, 1, 38, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(0, 1, 37, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(0, 1, 36, 'Black', 'Nike Air Force 1', 'air-force-1-07-shoe-7FdcQX.jpg', 12, 1840000, 0),
(2, 3, 40, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(2, 3, 41, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(2, 3, 42, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(2, 3, 43, 'White', 'Stan Smith', 'SNEAKER-M20324-STAN-SMITH-adidas-kingshoes.vn-tphcm-tanbinh-15.jpg', 13, 1200000, 0),
(3, 4, 36, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(3, 4, 37, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(3, 4, 38, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(3, 4, 39, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(3, 4, 40, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(3, 4, 41, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(3, 4, 42, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(3, 4, 43, 'White', 'Converce Chuck Taylor All Star', '66301_Main_Thumb_0565988.jpg', 18, 1200000, 0),
(4, 1, 36, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(4, 1, 37, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(4, 1, 38, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(4, 1, 39, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(4, 1, 40, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(4, 1, 41, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(4, 1, 42, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(4, 1, 43, 'White', 'Nike Air Force 1 Type2', 'air-force-1-type-2-shoe-b7ZKzv.jpg', 17, 3239000, 0),
(5, 2, 36, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(5, 2, 37, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(5, 2, 38, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(5, 2, 39, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(5, 2, 40, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(5, 2, 41, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(5, 2, 42, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(5, 2, 43, 'White', 'Air Jordan 6 Retro', 'air-jordan-6-retro-big-kids-shoe-yATYM4KO.jpg', 15, 4109000, 0),
(6, 1, 36, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(6, 1, 37, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(6, 1, 38, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(6, 1, 39, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(6, 1, 40, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(6, 1, 41, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(6, 1, 42, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(6, 1, 43, 'Orange', 'Nike Air Max 90', 'air-max-90-hTsX5h.jpg', 16, 4109000, 0),
(7, 1, 36, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(7, 1, 37, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(7, 1, 38, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(7, 1, 39, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(7, 1, 40, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(7, 1, 41, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(7, 1, 42, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(7, 1, 43, 'Blue', 'Nike Air Max 90', 'air-max-90-shoe-hTsX5h.jpg', 19, 4109000, 0),
(8, 2, 36, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(8, 2, 37, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(8, 2, 38, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(8, 2, 39, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(8, 2, 40, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(8, 2, 41, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(8, 2, 42, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(8, 2, 43, 'Brown', 'Jordan Air Max 200 XX', 'jordan-air-max-200-xx-shoe-v2glvX.jpg', 19, 3669000, 0),
(9, 1, 36, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(9, 1, 37, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(9, 1, 38, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(9, 1, 39, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(9, 1, 40, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(9, 1, 41, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(9, 1, 42, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(9, 1, 43, 'Black', 'Nike React Presto', 'react-presto-.jpg', 12, 2929000, 0),
(10, 1, 36, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(10, 1, 37, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(10, 1, 38, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(10, 1, 39, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(10, 1, 40, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(10, 1, 41, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(10, 1, 42, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(10, 1, 43, 'Red', 'Nike React Presto', 'react-presto-shoe.jpg', 13, 2929000, 0),
(11, 1, 36, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(11, 1, 37, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(11, 1, 38, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(11, 1, 39, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(11, 1, 40, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(11, 1, 41, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(11, 1, 42, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(11, 1, 43, 'Blue', 'Nike React Presto', 'react-presto-shoe-h5dC61.jpg', 13, 2929000, 0),
(12, 1, 36, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0),
(12, 1, 37, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0),
(12, 1, 38, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0),
(12, 1, 39, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0),
(12, 1, 40, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0),
(12, 1, 41, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0),
(12, 1, 42, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0),
(12, 1, 43, 'Green', 'Nike SuperRep Go', 'superrep-go-training-shoe-SMnpt6.jpg', 13, 3669000, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderid`,`productid`),
  ADD UNIQUE KEY `orderid` (`orderid`,`productid`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`,`size`),
  ADD UNIQUE KEY `id` (`id`,`size`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
