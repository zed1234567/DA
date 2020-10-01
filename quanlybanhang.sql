-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2020 lúc 03:01 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(5) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `GiaDatHang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`) VALUES
(44165, 'MT01', 1, 24000000),
(45114, 'DT10', 1, 5000000),
(48754, 'DT02', 1, 29990000),
(92965, 'DT09', 1, 21000000);

--
-- Bẫy `chitietdathang`
--
DELIMITER $$
CREATE TRIGGER `undo_quantity` AFTER DELETE ON `chitietdathang` FOR EACH ROW UPDATE hanghoa SET SoLuongHang = SoLuongHang + OLD.SoLuong WHERE MSHH=OLD.MSHH
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_quantity` AFTER INSERT ON `chitietdathang` FOR EACH ROW UPDATE hanghoa SET SoLuongHang = SoLuongHang - NEW.SoLuong WHERE MSHH=NEW.MSHH
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(5) NOT NULL,
  `MSKH` int(5) NOT NULL,
  `MSNV` int(5) DEFAULT NULL,
  `NgayDH` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `TrangThai`) VALUES
(44165, 30, 5, '2020-06-05 12:49:30', 'Da Nhan'),
(45114, 30, 5, '2020-06-26 22:45:55', 'Da Nhan'),
(48754, 34, 5, '2020-06-28 22:01:33', 'Da Nhan'),
(92333, 30, 5, '2020-06-04 22:55:23', 'Da Nhan'),
(92965, 33, 5, '2020-06-28 22:05:54', 'Da Nhan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` varchar(5) NOT NULL,
  `ThuongHieu` varchar(30) NOT NULL,
  `MoTaHH` varchar(200) DEFAULT NULL,
  `hinh` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `ThuongHieu`, `MoTaHH`, `hinh`) VALUES
('DT01', 'Iphone 11 64GB', 19990000, 5, 'DT', 'iphone', '', 'img/iphone-11-red-600x600.jpg'),
('DT02', 'Iphone 11 Pro', 29990000, 4, 'DT', 'iphone', '', 'img/iphone-11-pro-256gb-black-600x600.jpg'),
('DT03', 'Oppo Reno 3', 12490000, 5, 'DT', 'oppo', '', 'img/oppo-reno3-pro-den-600x600-200x200.jpg'),
('DT04', 'Oppo Find X2', 23990000, 10, 'DT', 'oppo', '', 'img/oppo-find-x2-blue-600x600-600x600.jpg'),
('DT05', 'Iphone 8 plus', 14490000, 4, 'DT', 'iphone', '', 'img/iphone-8-plus-hh-600x600-600x600.jpg'),
('DT07', 'Samsung A71', 7990000, 4, 'DT', 'samsung', '', 'img/samsung-galaxy-a71-blue-400x460-400x460-1-400x460.png'),
('DT08', 'Samsung Note 10', 22000000, 5, 'DT', 'samsung', '', 'img/5eef67a0d946e1.37098141.png'),
('DT09', 'Samsung S20+', 21000000, 5, 'DT', 'samsung', '', 'img/5eef676a2fb2d7.90003004.jpg'),
('DT10', 'Samsung A10', 5000000, 2, 'DT', 'samsung', '', 'img/5eef668d254686.21536839.jpg'),
('DT11', 'Samsung A80', 8990000, 4, 'DT', 'samsung', '', 'img/samsung-galaxy-a80-050220-050225-400x460.png'),
('MT01', 'Legion Y540', 24000000, 1, 'MT', 'lenovo', '', 'img/5eef66c68b9050.09549469.png'),
('MT02', 'Asus ROG Strix G531', 27990000, 5, 'MT', 'asus', '', 'img/5ef9f895015b34.42950387.png'),
('MT03`', 'Asus Zenbok UX434', 24490000, 5, 'MT', 'asus', '', 'img/637078798814024404_asus-zenbook-ux434fac-bac-dd.png'),
('MT04', 'Asus Vivobook S531', 17990000, 5, 'MT', 'asus', '', 'img/637043097497017964_asus-vivobook-a512-bac-dd.png'),
('MT05', 'Dell XPS 15 7590', 54990000, 3, 'MT', 'dell', '', 'img/637092404005701912_dell-xps-15-7590-bac-dd.png'),
('MT06', 'Thinkpad E590', 20490000, 2, 'MT', 'lenovo', '', 'img/637266906959761961_lenovo-thinkpad-e15-den-dd.png'),
('MT07', 'MSI Alpha 15', 26490000, 3, 'MT', 'msi', '', 'img/637104680818394668_msi-alpha-15-den-dd.png'),
('MT09', 'Legion Y545', 23000000, 3, 'MT', 'lenovo', '', 'img/637221317215195245_lenovo-ideapad-s145-bac-1.png'),
('TB01', 'Ipad Pro 12.9', 27490000, 5, 'TB', 'Ipad', '', 'img/ipad-pro-12-9-inch-wifi-128gb-2020-xam-600x600-1-200x200.jpg'),
('TB02', 'Ipad 10.2 Wifi 32G', 8990000, 2, 'TB', 'ipad', '', 'img/ipad-10-2-inch-wifi-32gb-2019-gold-600x600.jpg'),
('TB03', 'Ipad Mini 7.9', 9990000, 6, 'TB', 'ipad', '', 'img/ipad-mini-79-inch-wifi-2019-gold-600x600.jpg'),
('TB05', 'Galaxy Tab S6 Lite', 9990000, 7, 'TB', 'samsung', '', 'img/samsung-galaxy-tab-s6-lite-600x600-1-200x200.jpg'),
('TB07', 'Galaxy Tab S6', 18990000, 3, 'TB', 'samsung', '', 'img/samsung-galaxy-tab-s6-600x600.jpg'),
('TB08', 'Huawei Mediapad M5', 7990000, 2, 'TB', 'huawei', '', 'img/huawei-mediapad-m5-lite-gray-600x600.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(5) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SDT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `DiaChi`, `SDT`) VALUES
(30, 'Huynh tan thien', '118/32 can tho', '0964016944'),
(33, 'huynh thi cam thu', '119/17 hem 107 can tho', '0987654323'),
(34, 'Nguyen Van C', '118/32 can tho', '0967890459');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(5) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SDT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SDT`) VALUES
(2, 'Nguyen Van M', 'Thu Ngan', 'Soc Trang', '0964016943'),
(3, 'Nguyen Nnam', 'Giam doc', 'Can tho', '0123456789'),
(5, 'Nguyen Thi Ban Hang', 'Ban hang', 'Can tho', '0976890098'),
(12, 'Nguyen Van Za', 'Bao ve', 'Soc Trang', '0964336944');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(5) NOT NULL,
  `TenNhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES
('DT', 'Dien Thoai'),
('MT', 'May Tinh'),
('TB', 'Tablet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID_User` int(5) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Gmail` varchar(100) NOT NULL,
  `pwd` varchar(300) NOT NULL,
  `User_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID_User`, `User_Name`, `Gmail`, `pwd`, `User_role`) VALUES
(27, 'newuser', 'user@gmail.com', '$2y$10$AYW.CwMC7BLTsdfkdmGTfuRG1P.ej3nuS7vbb2J1t1sAkJgkK/YdO', NULL),
(29, 'admin a', 'admin@gmail.com', '$2y$10$Dz.BQYPpHCRXMi05PUcN7eJEGqEMwk3mfi/NwnBspEK6J1CP7diO.', 1),
(30, 'tanthien', 'tanthien123@gmail.com', '$2y$10$zrbqd6pTKoyrWlZpNyXdkOa1gNmMquV6JRlroRlB2VBALDLfZaZcO', NULL),
(33, 'thuhuynh', 'thuhuynh@gmail.com', '$2y$10$CynFpYFd/yGbaywAmYdnPOC2AjO1ONrzOQ7UruzJERtBJBj./2cwO', NULL),
(34, 'Van C', 'vanc@gmail.com', '$2y$10$UWU6EFZQIMSaStFrmLqOc.B.EacAxs8/jGc73l63T2z.Fd/yQJKpe', NULL),
(38, 'newuser', 'newuser@gmail.com', '$2y$10$nPJ/poV5BtP/KX88P3XkKOYOfDF5Wt6gy1ztrpP/V0R9AQOb63nWe', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`) USING BTREE,
  ADD KEY `mshh` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `test` (`MaNhom`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Chỉ mục cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`,`Gmail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99783;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8123;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `mshh` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_5` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_6` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `test` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
