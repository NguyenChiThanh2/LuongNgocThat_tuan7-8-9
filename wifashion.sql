-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2024 lúc 04:29 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wifashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten`, `brand_id`, `price`, `image_url`) VALUES
(1, 'Áo Đi Chơi Dạo Biển', 3, 100.00, 'chanel1.JPG'),
(2, 'Áo Chanel phiên bản giới hạn', 1, 40.00, 'chanel2.jpg'),
(3, 'Áo H&M mùa xuân', 2, 60.00, 'hm1.JPG'),
(4, 'Túi Louis Vuitton phiên bản giới hạn', 3, 30.00, 'lx1.JPG'),
(5, 'Áo Dior mùa đông ', 4, 50.00, 'd1.JPG'),
(6, 'Áo Dior phiên bản mùa xuân', 4, 35.00, 'd2.JPG'),
(7, 'Áo chanel thun mùa hè', 1, 25.00, 'chanel6.JPG'),
(8, 'Áo H&M xanh mùa hè', 2, 45.00, 'hm2.JPG'),
(9, ' Túi Louis Vuitton phiên bản mùa đông', 3, 20.00, 'lx2.JPG'),
(10, 'Túi Dior phiên bản cao cấp', 4, 40.00, 'd3.JPG'),
(11, 'Áo Gucci thời trang Xuân', 5, 55.00, 'g1.JPG'),
(12, 'Áo Guuci thanh xuân', 5, 50.00, 'g2.JPG'),
(13, 'Áo Chanel phiên bản mùa Xuân', 1, 30.00, 'chanel3.JPG'),
(14, 'Áo H&M  mùa thu đông', 2, 35.00, 'hm3.JPG'),
(15, 'Áo Louis Vuitton phiên bản mùa Xuân', 3, 40.00, 'lx3.JPG'),
(16, 'Áo Dior thời trang thu đông', 4, 23.00, 'd4.JPG'),
(17, 'Túi Gucci cao cấp', 5, 90.00, 'g3.JPG'),
(18, 'Áo chanel  màu trắng mùa đông', 1, 65.00, 'chanel4.JPG'),
(19, 'Áo H&M mùa  thu xuân', 2, 30.00, 'hm4.JPG'),
(20, ' Túi Louis Vuitton phiên bản giới hạn', 3, 15.00, 'lx4.JPG'),
(21, 'Túi Dior thời thượng', 4, 35.00, 'd5.JPG'),
(22, 'Áo Gucci mùa đônng', 5, 40.00, 'g4.JPG'),
(23, 'Áo chanel phiên bản  mùa hè', 1, 75.00, 'chanel5.JPG'),
(24, 'Áo H&M  hè  xanh', 2, 20.00, 'hm5.JPG'),
(25, 'Áo H&M mùa hè trong xanh', 2, 20.00, 'hm6.JPG'),
(34, 'Áo mùa thu mặc ấm', 2, 100.00, '25.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `ten`, `email`, `matkhau`) VALUES
(11, '', '', ''),
(12, 'Ngọc Thật', 'kingkai15032003@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `name`) VALUES
(1, 'Chanel'),
(2, 'H&M'),
(3, 'Louis Vuitton'),
(4, 'Dior'),
(5, 'Gucci');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `thuonghieu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
