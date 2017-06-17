-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 04:09 PM
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
(2, 'Laptop'),
(3, 'Máy tính bảng'),
(4, 'Đồng hồ thông minh'),
(5, 'Tai nghe'),
(6, 'Bàn phím'),
(7, 'Chuột'),
(8, 'Phụ Kiện'),
(9, 'Shop game thủ'),
(11, 'Khác');

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
(1, 'Ha Noi'),
(2, 'Tp Ho Chi Minh');

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
(1, 'Huyen Tu Liem', 1),
(2, 'Quan Cau Giay', 1);

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
(9, 1, 'Tran Ngoc Duc', '01654565270', 'so 38C, ngo 487 Co Nhue', 1, 1, 1),
(10, 2, 'Tran Ngoc Duc', '01654565270', 'So 228 duong Xuan Thuy', 2, 1, 1);

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
  `tranformer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `id_user`, `name`, `phone`, `address`, `district`, `city`, `note`, `date`, `money`, `tranformer`, `shipping_code`, `active`) VALUES
(16, 2, 'Tran Ngoc Duc', '01654565270', 'so 38C, ngo 487 Co Nhue', 'Huyen Tu Liem', 'Hà Nội', NULL, '2017-06-14 11:10:37', 184000000, '', 'c74d97b01e', 0);

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
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_invoice_detail`
--

INSERT INTO `tb_invoice_detail` (`id_detail`, `id_invoice`, `id_product`, `id_user`, `name`, `img`, `price`, `qty`, `subtotal`, `active`) VALUES
(20, 16, 19, 1, 'LapTop MSI', 'images1.jpg', 23000000, 8, 184000000, 0);

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
(9, 1, 'Sam Sung galaxy S8', 'S8Plus_S8_Silver_LockUp_rgb1.jpg', 'a<br />\r\nb<br />\r\nca<br />\r\nb<br />\r\nca<br />\r\nb<br />\r\nca<br />\r\nb<br />\r\nca<br />\r\nb<br />\r\nca<br />\r\nb<br />\r\nc', 1, 26000000, 20, 1, 5, 1),
(13, 2, 'MSI gamming', 'DeskGaming011.png', 'Cau hinh khoe<br />\r\nchoi game ngon<br />\r\ndo hoa khung', 1, 2200000, 26, 1, 0, 1),
(19, 1, 'LapTop MSI', 'images1.jpg', 'Lap top so 1 the gioi<br />\r\nRam: 1TB<br />\r\nO cung: SSD 500', 2, 23000000, 13, 1, 8, 1),
(20, 1, 'Motorola Moto 360', '360moto-01-350x380.jpg', 'Moto 360 mới kết hợp kính cạnh cạnh với vỏ bọc không bị đánh bóng đặc biệt, mang lại cho bạn diện tích xem lớn nhất. Cho dù bạn chọn hoa hồng hồng, đen, hoặc bạc, trường hợp được làm bằng chính xác từ thép không gỉ cấp bằng máy bay.', 4, 2000000, 10, 1, 0, 0),
(21, 1, 'Tai nghe Beats Snarkitecture ', 'beats-narkitecture-01-350x380.jpg', 'Được thiết kế lại hoàn toàn, tai nghe đeo tai của Beats Studio thậm chí còn sáng hơn, mạnh hơn và tiện dụng hơn, và chính xác hơn thiết kế nổi tiếng thế giới. Họ cung cấp âm thanh mạnh mẽ, tái thiết kế một mình với Adaptive Noise Cancelling, một pin sạc được 20 giờ và các điều khiển Remote Talk.', 5, 900000, 30, 1, 0, 0),
(22, 1, 'Denon Music Maniac Artisan', 'denon-head-01-350x380.jpg', 'Được thiết kế từ nền tảng để mang đến một trải nghiệm nghe tuyệt vời, nghe, phù hợp và di chuyển giống như bạn.', 5, 800000, 40, 1, 0, 0),
(23, 1, 'Apple iMac 27-inch', 'imac_n-350x380.jpg', 'The idea behind iMac has never wavered: to craft the ultimate desktop experience. The best display, paired with high-performance processors, graphics, and storage — all within an incredibly thin, seamless enclosure.', 3, 40000000, 30, 1, 0, 1),
(24, 1, 'Apple iPad Mini', 'ipad_air_silver-350x380.jpg', 'There’s more to mini than meets the eye. The new iPad mini 4 puts uncompromising performance and potential in your hand. It’s thinner and lighter than ever before, yet powerful enough to help you take your ideas even further.', 3, 6000000, 10, 1, 0, 1);

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
  `discribe` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `follow` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `account`, `name`, `password`, `discribe`, `img`, `follow`, `active`) VALUES
(1, 'ngocduc', 'Ngoc Duc', '4156fd5c1cb353803988421bf5c73913', 'Shop chất lượng cao, bán hàng uy tín<br />\r\nGiá cả cạnh tranh<br />\r\nChuyên cung cấp mặt hàng xịn, hàng hiệu, ...', 'image1xxl--12-13.jpg', 0, 0),
(2, '1221050140', 'Ku ku Le Le', '4156fd5c1cb353803988421bf5c73913', '', '1.png', 0, 0),
(3, 'huyhip123', 'huyhip123', 'ed62e3fefd216ddffc4f8874508b82ef', '', 'default.jpg', 0, 0),
(4, 'abcdef', 'abcdef', '4156fd5c1cb353803988421bf5c73913', '', 'default.jpg', 0, 0),
(5, '1221050146', '1221050146', '9d9ca0162c8cc09f018f37c3d37bc8b3', '', 'default.jpg', 0, 0);

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
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `id_infomation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_invoice_detail`
--
ALTER TABLE `tb_invoice_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
