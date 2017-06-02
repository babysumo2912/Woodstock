-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 01:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_catalog`
--

CREATE TABLE `tb_catalog` (
  `id_catalog` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_catalog`
--

INSERT INTO `tb_catalog` (`id_catalog`, `name`) VALUES
(1, 'Smart Phone'),
(2, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tb_city`
--

CREATE TABLE `tb_city` (
  `id_city` int(11) NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_city`
--

INSERT INTO `tb_city` (`id_city`, `city`) VALUES
(1, 'Hà Nội'),
(2, 'TP Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id_comment` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_comment`
--

INSERT INTO `tb_comment` (`id_comment`, `id_product`, `id_user`, `content`, `date`, `like`) VALUES
(12, 7, 1, 'san pham chat vcc', '2017-05-14 11:13:16', 0),
(13, 7, 1, 'abc', '2017-05-15 17:18:05', 0),
(14, 9, 1, 'San pham rat tot', '2017-05-17 15:28:59', 0),
(15, 9, 1, 'ship bao nhieu ban oi', '2017-05-17 15:29:34', 0),
(16, 9, 1, 'LanAnh xinh', '2017-05-18 12:14:03', 0),
(17, 7, 1, 'ship cho mninh sp nay di', '2017-05-21 20:54:56', 0),
(18, 9, 2, 'H1', '2017-05-23 09:46:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_district`
--

CREATE TABLE `tb_district` (
  `id_district` int(11) NOT NULL,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_district`
--

INSERT INTO `tb_district` (`id_district`, `district`, `id_city`) VALUES
(1, 'Huyện Từ Liêm', 1),
(2, 'Quận Cầu Giấy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_infomation_user`
--

CREATE TABLE `tb_infomation_user` (
  `id_infomation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `id_district` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_infomation_user`
--

INSERT INTO `tb_infomation_user` (`id_infomation`, `id_user`, `name`, `phone`, `address`, `id_district`, `id_city`, `default`) VALUES
(2, 2, 'Duc', '0123456', '38C CỔ nhuế', 1, 1, 1),
(3, 1, 'Lan Anh', '012345685', 'so nha 16C duong xuan thuy', 2, 1, 0),
(4, 1, 'ABc', '0165646465', 'asdasdasd', 1, 1, 0),
(5, 1, 'Tran Ngoc Duc', '01654565270', 'số nhà 38 C, ngõ 487\r\n', 1, 1, 1),
(6, 5, 'ngocduc', '0123456789', '38c, co nhue', 2, 1, 1),
(7, 2, 'Lai Lan Anh', '0979678293', 'so nha 228, Xuan Thuy, Cau Giay, Ha Noi\r\n', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `money` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `tranformer` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice_detail`
--

CREATE TABLE `tb_invoice_detail` (
  `id_detail` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discribe` text COLLATE utf8_unicode_ci NOT NULL,
  `id_catalog` int(11) NOT NULL,
  `price` float NOT NULL,
  `number` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `id_user`, `name`, `img`, `discribe`, `id_catalog`, `price`, `number`, `id_status`, `like`, `active`) VALUES
(7, 1, 'LapTop MSI', 'images1.jpg', 'Lap top so 1 the gioi<br />\r\nRam: 1TB<br />\r\nO cung: SSD 500', 2, 23000000, 10, 1, 0, 0),
(8, 1, 'IPhone 8', 'iphone-8-price1.jpg', 'Supper Smart Phone', 1, 25000000, 0, 1, 0, 0),
(9, 1, 'Sam Sung galaxy S8', 'S8Plus_S8_Silver_LockUp_rgb1.jpg', 'a<br />\r\nb<br />\r\nc', 1, 26000000, 0, 1, 0, 0),
(10, 1, '1', 'giac-mong-thay-ngoi-chua-cung-nhung-con-so-vang-1.JPG', '1', 1, 1000, 1, 1, 0, 1),
(11, 1, '1', '17909125_233601500377276_1339724259_n.jpg', '1', 1, 1234, 4, 1, 0, 0),
(12, 1, '1', '17909360_233601513710608_605613589_n.jpg', 'asdasda</br><br />\r\nasdasdawdasdawdasd<br />\r\nasdasdasda</br><i class = \"fa fa-user\">', 1, 2000, 2, 1, 0, 0),
(13, 2, 'MSI gamming', 'DeskGaming01.png', 'Cau hinh khoe<br />\r\nchoi game ngon<br />\r\ndo hoa khung', 2, 22000000, 30, 1, 0, 0),
(14, 1, 'giay adidas', '6.jpg', 'Giay dep<br />\r\nchat luong cao', 2, 1000, 2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_product`
--

CREATE TABLE `tb_status_product` (
  `id_status` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_status_product`
--

INSERT INTO `tb_status_product` (`id_status`, `name`) VALUES
(1, 'Mới'),
(2, 'Cũ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `account` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `account`, `name`, `password`, `img`) VALUES
(1, 'ngocduc', 'Ngoc Duc', '4156fd5c1cb353803988421bf5c73913', 'default.jpg'),
(2, '1221050140', '1221050140', '4156fd5c1cb353803988421bf5c73913', '1.png'),
(3, 'huyhip123', 'huyhip123', 'ed62e3fefd216ddffc4f8874508b82ef', 'default.jpg'),
(4, 'abcdef', 'abcdef', '900150983cd24fb0d6963f7d28e17f72', 'default.jpg'),
(5, '1221050146', '1221050146', '9d9ca0162c8cc09f018f37c3d37bc8b3', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_catalog`
--
ALTER TABLE `tb_catalog`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `tb_city`
--
ALTER TABLE `tb_city`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `tb_district`
--
ALTER TABLE `tb_district`
  ADD PRIMARY KEY (`id_district`);

--
-- Indexes for table `tb_infomation_user`
--
ALTER TABLE `tb_infomation_user`
  ADD PRIMARY KEY (`id_infomation`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_invoice_detail`
--
ALTER TABLE `tb_invoice_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_status_product`
--
ALTER TABLE `tb_status_product`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_catalog`
--
ALTER TABLE `tb_catalog`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_city`
--
ALTER TABLE `tb_city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_district`
--
ALTER TABLE `tb_district`
  MODIFY `id_district` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_infomation_user`
--
ALTER TABLE `tb_infomation_user`
  MODIFY `id_infomation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_invoice_detail`
--
ALTER TABLE `tb_invoice_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_status_product`
--
ALTER TABLE `tb_status_product`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
