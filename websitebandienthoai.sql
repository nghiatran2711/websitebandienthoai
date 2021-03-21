-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 21, 2021 lúc 05:21 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitebandienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idSanPham` int(11) NOT NULL,
  `idDonHang` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tongTien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idSanPham`, `idDonHang`, `quantity`, `tongTien`) VALUES
(11, 4, 3, '27870000'),
(12, 4, 1, '6490000'),
(6, 5, 2, '11380000'),
(15, 5, 2, '700000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `idSanPham` int(11) NOT NULL,
  `idPhieuNhap` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`idSanPham`, `idPhieuNhap`, `soLuong`) VALUES
(5, 7, 23),
(6, 7, 21),
(7, 7, 11),
(8, 8, 16),
(9, 8, 22),
(10, 8, 33),
(11, 8, 18),
(12, 8, 21),
(13, 8, 19),
(14, 8, 14),
(15, 8, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idDonHang` int(11) NOT NULL,
  `idKhachHang` int(11) NOT NULL,
  `ngayDat` datetime NOT NULL,
  `ngayGiaoDuKien` datetime NOT NULL,
  `tongTien` decimal(10,0) NOT NULL,
  `idNhanVien` int(11) DEFAULT NULL,
  `tinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idDonHang`, `idKhachHang`, `ngayDat`, `ngayGiaoDuKien`, `tongTien`, `idNhanVien`, `tinhTrang`) VALUES
(4, 3, '2021-03-21 16:29:49', '2021-03-28 16:29:49', '34360000', NULL, 0),
(5, 3, '2021-03-21 16:31:59', '2021-03-28 16:31:59', '12080000', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idKhachHang` int(11) NOT NULL,
  `tenKhachHang` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `matKhau` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `CMND` varchar(9) COLLATE utf8_vietnamese_ci NOT NULL,
  `diaChi` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idKhachHang`, `tenKhachHang`, `matKhau`, `CMND`, `diaChi`, `Email`, `SDT`) VALUES
(3, 'Trần Công Tuấn Nghĩa', 'nghia12345', '206296171', 'Nhị dinh 3, Điện phước, Điện bàn, Quảng Nam', 'nghiatran1791@gmail.com', '0775002316');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLoaiSanPham` int(11) NOT NULL,
  `tenLoaiSanPham` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLoaiSanPham`, `tenLoaiSanPham`) VALUES
(3, 'Điện thoại'),
(4, 'Sạc'),
(5, 'Tai phone'),
(6, 'Loa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idNhanVien` int(11) NOT NULL,
  `tenNhanVien` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `CMND` varchar(9) COLLATE utf8_vietnamese_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `matKhau` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `diaChi` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `idQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idNhanVien`, `tenNhanVien`, `CMND`, `SDT`, `Email`, `matKhau`, `diaChi`, `idQuyen`) VALUES
(1, 'Trần Công Tuấn Nghĩa', '206296171', '0775002316', 'nghiatran1791@gmail.com', '12345', 'Nhị dinh 3, Điện phước, Điện bàn, Quảng nam', 1),
(5, 'Trần Công Nghĩa', '206296111', '0775002312', 'nghiakho@gmail.com', '12345', 'Nhị dinh 3', 2),
(6, 'Trần Tuấn Nghĩa', '206296112', '0702689916', 'nghiagiaohang@gmail.com', '12345', 'Điện phước', 3),
(7, 'Trần Công Tài', '206296211', '0379956528', 'taigiaohang@gmail.com', '12345', 'Quảng Nam', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasx`
--

CREATE TABLE `nhasx` (
  `idNSX` int(11) NOT NULL,
  `tenNSX` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhasx`
--

INSERT INTO `nhasx` (`idNSX`, `tenNSX`) VALUES
(2, 'Apple'),
(3, 'Samsung'),
(4, 'Oppo'),
(5, 'Sony'),
(6, 'Nokia'),
(7, 'Mozard');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `idPhieuNhap` int(11) NOT NULL,
  `idNhanVien` int(11) NOT NULL,
  `ngayNhap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`idPhieuNhap`, `idNhanVien`, `ngayNhap`) VALUES
(7, 1, '2021-03-21 16:21:20'),
(8, 1, '2021-03-21 16:22:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `idQuyen` int(11) NOT NULL,
  `tenQuyen` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`idQuyen`, `tenQuyen`) VALUES
(1, 'Quản trị viên'),
(2, 'Nhân viên Kho'),
(3, 'Nhân viên giao hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhAnh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `idNSX` int(11) NOT NULL,
  `idLoaiSanPham` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `Gia` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSanPham`, `tenSanPham`, `hinhAnh`, `idNSX`, `idLoaiSanPham`, `soLuong`, `Gia`) VALUES
(5, 'Iphone X', 'iphonex.jpg', 2, 3, 23, '8690000'),
(6, 'Oppo A92', 'oppoa92.jpg', 4, 3, 19, '5690000'),
(7, 'Samsung A70', 'samsunga70.jpg', 3, 3, 11, '7290000'),
(8, 'Nokia 3.4', 'nokia3.4.jpg', 6, 3, 16, '2790000'),
(9, 'Xperia 1 II', 'Xperia 1 II.jpg', 5, 3, 22, '27990000'),
(10, 'Samsung Galaxy S10+', 'samsungs10.jpg', 3, 3, 33, '19990000'),
(11, 'Samsung Galaxy A52', 'samsung-galaxy-a52-8gb-256gb-thumb-violet-600x600-600x600.jpg', 3, 3, 15, '9290000'),
(12, ' AirPods Pro Wireless Charge Apple', 'airpods-pro-wireless-charge-apple-mwp22-ava-600x600.jpg', 2, 5, 20, '6490000'),
(13, 'Tai nghe Bluetooth Mozard K8', 'bluetooth-mozard-k8-ava-600x600.jpg', 7, 5, 19, '350000'),
(14, 'Sạc Samsung EP-TA800NW', 'type-c-pd-25w-samsung-ep-ta800nw-trang-600x600.jpg', 3, 4, 14, '490000'),
(15, 'Bộ Cáp + Sạc nhanh OPPO VOOC', 'original-5v-4a-fast-rapid-wall-charger-and.jpg', 4, 4, 13, '350000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `idDonHang` (`idDonHang`),
  ADD KEY `idSanPham` (`idSanPham`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD KEY `idPhieuNhap` (`idPhieuNhap`),
  ADD KEY `idSanPham` (`idSanPham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDonHang`),
  ADD KEY `idKhachHang` (`idKhachHang`),
  ADD KEY `idNhanVien` (`idNhanVien`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idKhachHang`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`idLoaiSanPham`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idNhanVien`),
  ADD KEY `idQuyen` (`idQuyen`);

--
-- Chỉ mục cho bảng `nhasx`
--
ALTER TABLE `nhasx`
  ADD PRIMARY KEY (`idNSX`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`idPhieuNhap`),
  ADD KEY `idNhanVien` (`idNhanVien`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`idQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSanPham`),
  ADD KEY `idLoaiSanPham` (`idLoaiSanPham`),
  ADD KEY `idNSX` (`idNSX`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhasx`
--
ALTER TABLE `nhasx`
  MODIFY `idNSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `idPhieuNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `idQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`idDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`idSanPham`);

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`idPhieuNhap`) REFERENCES `phieunhap` (`idPhieuNhap`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`idSanPham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idKhachHang`) REFERENCES `khachhang` (`idKhachHang`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`idNhanVien`) REFERENCES `nhanvien` (`idNhanVien`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`idQuyen`) REFERENCES `quyen` (`idQuyen`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`idNhanVien`) REFERENCES `nhanvien` (`idNhanVien`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLoaiSanPham`) REFERENCES `loaisanpham` (`idLoaiSanPham`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`idNSX`) REFERENCES `nhasx` (`idNSX`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
