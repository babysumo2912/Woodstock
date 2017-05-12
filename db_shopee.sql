-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 11:52 AM
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
(8, 1, 'IPhone 8', 'iphone-8-price1.jpg', 'Supper Smart Phone', 1, 25000000, 23, 1, 0, 0),
(9, 1, 'Sam Sung galaxy S8', 'S8Plus_S8_Silver_LockUp_rgb1.jpg', 'a<br />\r\nb<br />\r\nc', 1, 26000000, 1, 1, 0, 0),
(10, 1, '1', 'giac-mong-thay-ngoi-chua-cung-nhung-con-so-vang-1.JPG', '1', 1, 1000, 1, 1, 0, 1),
(11, 1, '1', '17909125_233601500377276_1339724259_n.jpg', '1', 1, 1234, 1, 1, 0, 0),
(12, 1, '1', '17909360_233601513710608_605613589_n.jpg', 'asdasda</br><br />\r\nasdasdawdasdawdasd<br />\r\nasdasdasda</br><i class = \"fa fa-user\">', 1, 2000, 2, 1, 0, 0);

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
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `account`, `password`) VALUES
(1, 'ngocduc', '4156fd5c1cb353803988421bf5c73913'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'ngocphuc', 'f797397cc23741ccaa7753044e602238'),
(4, 'ngocphuc1', '0208ebc1b444b36c3b23b7a9301b9af4'),
(5, 'ngocduc1', 'b781324aa4d7104badf51a9c6ed37950'),
(6, 'ngocduc2912', '7539b3b1ff487c693ad45f62f3ae55f0'),
(7, 'a', '0cc175b9c0f1b6a831c399e269772661');

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
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_status_product`
--
ALTER TABLE `tb_status_product`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
