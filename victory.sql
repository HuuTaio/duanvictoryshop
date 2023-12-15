-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2023 lúc 09:01 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `victory`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `ma_kh`, `ma_hh`, `noi_dung`, `ngay_bl`) VALUES
(5, 'messi', 10, 'gốm quá', '2022-10-24'),
(6, 'messi', 9, 'xấu quá', '2022-10-24'),
(7, 'admin', 10, 'xấu quá', '2022-10-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'tai', 'tai@gmail.com', 'taiadmin', '111', 1),
(2, 'tai', 'tai@gmail.com', 'tai123', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandName`) VALUES
(6, 'adidas'),
(7, 'adidas'),
(8, '$Jordan'),
(9, '$New Balance'),
(10, 'Converse');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quanlity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `giam_price` varchar(255) NOT NULL,
  `cart_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `idsp`, `sid`, `tensp`, `price`, `quanlity`, `image`, `giam_price`, `cart_date`) VALUES
(32, 32, 'b4vi9j34sr4l61g2jcje01qpph', 'Adidas', '1000000', 0, '08a92c6cf5.jpg', '55555', ''),
(33, 0, 'b4vi9j34sr4l61g2jcje01qpph', 'GiÃ y nike', '10000', 0, '0de0431213.jpg', '5000', ''),
(35, 34, 'iptfosb24c2stq837kbtsqa94a', 'Giay nike 2', '2000000', 1, 'e17f1a4e7a.jpg', '100000', ''),
(55, 63, 'cus2gjtfaivhofsgpfavju53u4', 'Converse Chuck Taylor All Star 1970s Recycled Rpet Canvas Size 39', '4300000', 16, '1bbab97d76.jpg', '100000', ''),
(71, 43, 'jt3rt2iadk6q100v2k9ioafs3p', 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', '3000000', 1, '1fda522549.jpg', '100000', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `iddm` int(11) NOT NULL,
  `tendm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`iddm`, `tendm`) VALUES
(52, 'Nike'),
(53, 'Adidas'),
(54, 'Converse'),
(55, 'New Balance'),
(56, 'Charles &amp; Keith');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_oder`
--

CREATE TABLE `tbl_oder` (
  `id` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quanlity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_oder` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_oder`
--

INSERT INTO `tbl_oder` (`id`, `idsp`, `tensp`, `customer_id`, `quanlity`, `price`, `image`, `status`, `date_oder`) VALUES
(17, 38, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 MÃ u Äen Size 40', 4, 1, ' 700000', '73e2138b23.jpg', 2, '2022-12-15 20:19:58'),
(18, 40, 'GiÃ y BÃ³ng Rá»• Nike Precision 5 Black White CW3403-003 MÃ u Äen Tráº¯ng Size 42', 4, 5, ' 1000000', '8ef5d45ae2.jpg', 1, '2023-12-10 03:40:39'),
(19, 43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 4, 1, ' 3000000', '1fda522549.jpg', 2, '2022-12-15 20:20:03'),
(20, 62, 'Converse Chuck Taylor All Star Dainty - 564982C Size 38', 0, 1, ' 3000000', '1aa3520e3c.jpg', 1, '2022-12-15 20:15:50'),
(21, 43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 0, 1, ' 3000000', '1fda522549.jpg', 1, '2022-12-15 20:15:54'),
(22, 43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 0, 1, ' 3000000', '1fda522549.jpg', 1, '2022-12-15 20:15:52'),
(23, 45, 'GiÃ y BÃ³ng Rá»• Nike Precision 5 Black White CW3403-003 Size 42', 4, 1, ' 5500000', '7da82ce349.jpg', 2, '2022-12-15 20:20:05'),
(24, 47, 'GiÃ y Thá»ƒ Thao Nike Airforce 1 Worldwide Black Crimson Tint Noir Size 40', 4, 1, ' 1200000', 'fcb299b6be.jpg', 2, '2022-12-15 20:20:08'),
(25, 43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 4, 1, ' 3000000', '1fda522549.jpg', 2, '2022-12-15 20:20:11'),
(26, 62, 'Converse Chuck Taylor All Star Dainty - 564982C Size 38', 4, 1, ' 3000000', '1aa3520e3c.jpg', 1, '2023-12-10 03:40:58'),
(27, 43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 4, 1, ' 3000000', '1fda522549.jpg', 1, '2023-12-10 03:41:28'),
(28, 46, 'GiÃ y Nike Air Zoom Pegasus 39 Premium Nam ', 4, 3, ' 2200000', '9953a78cc4.jpg', 1, '2023-12-10 03:41:01'),
(29, 52, 'GiÃ y Adidas Ultraboost FX0031 Unisex', 4, 1, ' 3000000', '95ee96725d.jpg', 2, '2022-12-16 03:10:40'),
(30, 43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 4, 2, ' 3000000', '1fda522549.jpg', 0, '2022-12-16 03:12:19'),
(31, 63, 'Converse Chuck Taylor All Star 1970s Recycled Rpet Canvas Size 39', 4, 1, ' 4300000', '1bbab97d76.jpg', 0, '2022-12-16 03:12:19'),
(32, 43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 5, 2, ' 3000000', '1fda522549.jpg', 2, '2023-12-10 03:42:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `iddm` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `giam_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`idsp`, `tensp`, `iddm`, `brandid`, `mota`, `type`, `price`, `image`, `giam_price`) VALUES
(43, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 52, 5, '<p>abcc</p>', 1, '3000000', '1fda522549.jpg', '100000'),
(44, 'GiÃ y Thá»ƒ Thao Nike Air Force 1 Shadow \'Multi-Color\' CI0919-118 Phá»‘i MÃ u Size 38.5', 52, 5, '<p>aaa</p>', 1, '4000000', 'afaed32430.jpg', '100000'),
(45, 'GiÃ y BÃ³ng Rá»• Nike Precision 5 Black White CW3403-003 Size 42', 52, 5, '<p>avc</p>', 1, '5500000', '7da82ce349.jpg', '300000'),
(46, 'GiÃ y Nike Air Zoom Pegasus 39 Premium Nam ', 52, 5, '<p>Äáº¹p</p>', 1, '2200000', '9953a78cc4.jpg', '100000'),
(47, 'GiÃ y Thá»ƒ Thao Nike Airforce 1 Worldwide Black Crimson Tint Noir Size 40', 52, 5, '<p>Ä‘áº¹p</p>', 1, '1200000', 'fcb299b6be.jpg', '100000'),
(49, 'GiÃ y Thá»ƒ Thao Nike Air Force 1 Shadow \'Multi-Color\' CI0919-118 Phá»‘i MÃ u Size 38.5', 52, 5, '<p>abc</p>', 1, '4300000', '6cb406edac.jpg', '100000'),
(50, 'GiÃ y Thá»ƒ Thao Nike Air Max Genome White CW1648-100 Size 42', 52, 5, '<p>hfsd</p>', 1, '5200000', '3f8db1991a.jpg', '100000'),
(51, 'GiÃ y Thá»ƒ Thao Nike Air Zoom Pegasus 38 CW7356-002 CZ1815-002 Size 40', 52, 5, '<p>avb</p>', 1, '6300000', 'fadfd1f361.jpg', '100000'),
(52, 'GiÃ y Adidas Ultraboost FX0031 Unisex', 53, 7, '<p>dep</p>', 1, '3000000', '95ee96725d.jpg', '100000'),
(53, 'GiÃ y Cháº¡y Bá»™ Nam Adidas Ultraboost FZ2558 Size 39', 53, 6, '<p>adÄ‘s</p>', 0, '2000000', '04e60341c8.jpg', '100000'),
(54, 'GiÃ y Cháº¡y Bá»™ Nam Adidas Solar Glide 5 M GX6703 Size 40', 53, 6, '<p>fa</p>', 0, '4300000', 'e4fe95dd0e.jpg', '100000'),
(55, 'GiÃ y Cháº¡y Bá»™ Nam Adidas Solar Glide 5 M GX6703 Size 40 Size 41', 53, 6, '<p>da</p>', 0, '2200000', 'cc95606973.jpg', '100000'),
(56, 'New Balance Men\'s 481 V3 Trail Running Shoe Size 38', 55, 9, '<p>Äpáº¹</p>', 0, '3000000', '5ba3401a57.jpg', '100000'),
(57, 'New Balance Men\'s Fresh Foam Roav V1 Sneaker Size 38', 55, 9, '<p>Ä‘e;pj</p>', 0, '4300000', '83f859dbad.jpg', '100000'),
(58, 'New Balance Men\'s 411 V1 Training Shoe Size 40', 55, 9, '<p>hay</p>', 0, '5500000', '7d2dc5e125.jpg', '100000'),
(59, 'New Balance Men\'s 515 V3 Sneaker', 55, 9, '<p>hay</p>', 0, '6600000', 'de24369caf.jpg', '100000'),
(60, 'Converse Chuck 70 Seasonal Color - A01448C', 54, 10, '<p>hay</p>', 0, '3000000', 'aa3ebc9eea.jpg', '100000'),
(61, 'Converse Chuck Taylor All Star 70 Plus - A00916C Size 41', 54, 10, '<p>a</p>', 0, '4300000', '9272163a2d.jpg', '100000'),
(62, 'Converse Chuck Taylor All Star Dainty - 564982C Size 38', 54, 10, '<p>hhh</p>', 0, '3000000', '1aa3520e3c.jpg', '100000'),
(63, 'Converse Chuck Taylor All Star 1970s Recycled Rpet Canvas Size 39', 54, 10, '<p>d</p>', 0, '4300000', '1bbab97d76.jpg', '100000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(255) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(255) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(1, '5-12-2022', 10, '200000', 22),
(2, '6-12-2022', 22, '999999', 11),
(3, '7-12-2022', 10, '200000', 34),
(4, '8-12-2022', 10, '200000', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(39) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `pass`, `email`, `Phone`, `City`, `address`, `image`) VALUES
(4, 'VIETANH', '123', '3@gmail.com', '0129391239129', 'Hcm', 'cm2/9', ''),
(5, 'tai', '123', 'ooo@gmail.com', '098412884', 'HCM', 'CM2/8', ''),
(14, 'tai123', '123', 'tai@gmail.com', '0123021031', 'Há»“ ChÃ­ Minh', 'CÃ¡ch máº¡ng thÃ¡ng 8', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`iddm`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `tbl_oder`
--
ALTER TABLE `tbl_oder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tbl_oder`
--
ALTER TABLE `tbl_oder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
