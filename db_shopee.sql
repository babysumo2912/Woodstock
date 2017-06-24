-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2017 at 02:03 AM
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

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
-- Table structure for table `tb_chat_content`
--

CREATE TABLE `tb_chat_content` (
  `id_content` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL,
  `oop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_chat_content`
--

INSERT INTO `tb_chat_content` (`id_content`, `id_room`, `id_user`, `content`, `time`, `active`, `oop`) VALUES
(1, 1, 7, 'abc', '2017-06-23 19:27:11', 0, 1),
(2, 1, 6, 'abc123', '2017-06-23 19:28:33', 0, 0),
(3, 1, 7, 'abc12344', '2017-06-23 19:27:11', 0, 1),
(4, 1, 7, 'abc12344iiiii', '2017-06-23 19:27:11', 0, 1),
(5, 1, 6, 'sdaqqweasda', '2017-06-23 19:28:33', 0, 0),
(6, 2, 6, 'hello', '2017-06-23 19:28:33', 0, 0),
(7, 2, 8, 'hello 1', '2017-06-23 08:51:10', 0, 1),
(8, 2, 6, 'hello 2', '2017-06-23 19:28:33', 0, 0),
(9, 3, 10, 'hello 1', '2017-06-23 19:03:25', 0, 1),
(10, 3, 9, 'hello 1', '2017-06-23 19:05:13', 0, 0),
(11, 1, 7, 'abc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiii', '2017-06-23 19:27:11', 0, 1),
(12, 1, 7, 'abc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiii', '2017-06-23 19:27:11', 0, 1),
(13, 1, 7, 'abc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiii', '2017-06-23 19:27:11', 0, 1),
(14, 1, 7, 'abc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiiiabc12344iiiii', '2017-06-23 19:27:11', 0, 1),
(15, 1, 6, 'ad', '2017-06-23 22:45:11', 0, 0),
(16, 1, 6, 'hello', '2017-06-23 22:45:28', 0, 0),
(17, 1, 6, 'hello', '2017-06-23 22:45:32', 0, 0),
(18, 1, 6, 'shop ban hang rat uy tin', '2017-06-23 22:46:05', 0, 0),
(19, 2, 6, 'sao ban khong chao lai minh', '2017-06-23 22:46:41', 0, 0),
(20, 2, 6, 'a', '2017-06-23 23:52:35', 0, 0),
(21, 2, 6, 'alo', '2017-06-23 23:52:42', 0, 0),
(22, 2, 6, 'Lan Anh oi', '2017-06-23 23:52:53', 0, 0),
(23, 2, 6, 'Yeu em', '2017-06-23 23:52:59', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat_room`
--

CREATE TABLE `tb_chat_room` (
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_chat_room`
--

INSERT INTO `tb_chat_room` (`id_room`) VALUES
(1),
(2),
(3),
(4),
(5);

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
(2, 'Tp Hồ Chí Minh');

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
(1, 25, 6, '', '2017-06-23 22:30:52', 0),
(2, 25, 6, '&lt;h1&gt;Test doan html &lt;/h1&gt;', '2017-06-23 22:32:08', 0);

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
(2, 'Quận Cầu Giấy', 1),
(3, 'Quận Ba Đình', 1),
(4, 'Quận Hoàng Mai', 1),
(5, 'Quận 1', 2),
(6, 'Quận 3', 2);

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
(10, 2, 'Tran Ngoc Duc', '01654565270', 'So 228 duong Xuan Thuy', 2, 1, 1),
(11, 7, 'Trần Ngọc Đức', '01654565270', 'Số nhà 38, ngõ 487 Cổ Nhuế', 1, 1, 1),
(12, 9, 'Trần Ngọc Đức', '01654565270', 'Số nhà 38C, ngõ 487, Cổ Nhuế', 1, 1, 1);

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
(1, 9, 'Trần Ngọc Đức', '01654565270', 'Số nhà 38C, ngõ 487, Cổ Nhuế', 'Huyện Từ Liêm', 'Hà Nội', NULL, '2017-06-23 23:20:39', 990000, '', 'c4ca4238a0', 4);

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
  `active` int(11) NOT NULL,
  `time` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_invoice_detail`
--

INSERT INTO `tb_invoice_detail` (`id_detail`, `id_invoice`, `id_product`, `id_user`, `name`, `img`, `price`, `qty`, `subtotal`, `active`, `time`) VALUES
(1, 1, 27, 6, 'Beats Snarkitecture Headphones', 'Tai_nghe1.jpg', 990000, 1, 990000, 4, 1498259972);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `id_tb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `oop` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(25, 6, 'Iphone 6', 'Iphone6.jpg', '', 11, 9000000, 8, 1, 0, 1),
(27, 6, 'Beats Snarkitecture Headphones', 'Tai_nghe1.jpg', 'Được thiết kế lại hoàn toàn, tai nghe đeo tai của Beats Studio thậm chí còn sáng hơn, mạnh hơn và thoải mái hơn, và chính xác hơn thiết kế nổi tiếng thế giới.<br />\r\nHọ cung cấp mạnh mẽ, tái thiết kế âm thanh một mình với Adaptive Noise Cancelling, một pin sạc được 20 giờ, và điều khiển Remote Talk.', 5, 990000, 29, 1, 1, 1),
(28, 6, 'Motorola Moto 360', '360moto.jpg', 'Moto 360 mới kết hợp kính tiên tiến với vỏ ngoài mỏng, đánh bóng, tạo cho bạn khu vực xem lớn nhất.<br />\r\nCho dù bạn chọn hồng vàng, đen hoặc bạc, trường hợp được tạo ra từ thép không gỉ bằng máy bay.', 4, 6000000, 20, 1, 0, 2),
(29, 8, 'BlueAnt Wireless Waterproof Headphones', 'Tai_nghe11.jpg', 'BlueAnt Pump HD tai nghe không dây đa chức năng cung cấp âm thanh tuyệt vời khi bạn nghe iPhone hoặc iPod trong những hoạt động mạnh mẽ và trong điều kiện khắc nghiệt. Cung cấp phạm vi không dây tuyệt vời, PUMP cung cấp âm thanh trong trẻi và mang theo đánh giá IP67 (chỉ ra mức độ chống bụi và nước cao).', 5, 2800000, 28, 1, 1, 1),
(30, 8, 'Tai nghe Bluetooth Plantronics A170 Marque', 'platronics-01-570x619.jpg', 'Hai micro làm việc cùng nhau để bắt giọng nói của bạn và hạn chế tiếng ồn nền cho chất lượng âm thanh tuyệt vời, cho dù bạn đang gọi điện hay nghe nhạc.', 5, 1200000, 30, 1, 0, 1),
(31, 9, 'Sony SmartWatch 3', 'sony-watch-01-350x380.jpg', 'Điền SmartWatch 3 của bạn bằng âm nhạc, sau đó đi ra để chạy. Cuộc sống của pin hai ngày cho phép bạn theo dõi các hoạt động và các hoạt động mà không phải lo lắng về việc sạc. Và khi bạn đồng bộ hóa với một ứng dụng thể dục, như Lifelong.', 4, 3960000, 20, 1, 0, 1),
(32, 9, 'Samsung Gear S2', 'gears2-01-350x380.jpg', 'Gear S2 là tất cả về trực quan. Bắt đầu với thiết kế của nó. Đó là một máy chấm công mượt mà đi kèm trong một lựa chọn lựa chọn các vật liệu khác nhau. Và với nhiều phong cách của các ban nhạc và gương mặt xem, đó là một cái nhìn mới bất cứ lúc nào bạn muốn.', 4, 5980000, 40, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_set_timeout`
--

CREATE TABLE `tb_set_timeout` (
  `id` int(11) NOT NULL,
  `time_login` float NOT NULL,
  `time_buy` float NOT NULL,
  `time_check` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_set_timeout`
--

INSERT INTO `tb_set_timeout` (`id`, `time_login`, `time_buy`, `time_check`) VALUES
(1, 86400, 1800, 172800);

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
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `tb_user` (`id_user`, `phone`, `account`, `name`, `password`, `discribe`, `img`, `follow`, `active`) VALUES
(6, '01654565270', 'babysumo2912', 'NgocDuc_IP', '4156fd5c1cb353803988421bf5c73913', '', 'TOP1.jpg', 0, 0),
(7, '01654565271', '1221050140', '1221050140', '4156fd5c1cb353803988421bf5c73913', '', 'default.jpg', 0, 0),
(8, '01654565272', 'babysumo_no1', 'babysumo_no1', '7539b3b1ff487c693ad45f62f3ae55f0', '', 'default.jpg', 0, 0),
(9, '01654525273', 'babysumo_no2', 'babysumo_no2', '7539b3b1ff487c693ad45f62f3ae55f0', '', 'default.jpg', 0, 0),
(10, '0966599493', 'babysumo_no3', 'babysumo_no3', '4156fd5c1cb353803988421bf5c73913', '', 'default.jpg', 0, 0);

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
-- Indexes for table `tb_chat_content`
--
ALTER TABLE `tb_chat_content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indexes for table `tb_chat_room`
--
ALTER TABLE `tb_chat_room`
  ADD PRIMARY KEY (`id_room`);

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
-- Indexes for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD PRIMARY KEY (`id_tb`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_set_timeout`
--
ALTER TABLE `tb_set_timeout`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_catalog`
--
ALTER TABLE `tb_catalog`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_chat_content`
--
ALTER TABLE `tb_chat_content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_chat_room`
--
ALTER TABLE `tb_chat_room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_city`
--
ALTER TABLE `tb_city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_district`
--
ALTER TABLE `tb_district`
  MODIFY `id_district` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_infomation_user`
--
ALTER TABLE `tb_infomation_user`
  MODIFY `id_infomation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_invoice_detail`
--
ALTER TABLE `tb_invoice_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_notification`
--
ALTER TABLE `tb_notification`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_set_timeout`
--
ALTER TABLE `tb_set_timeout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_status_product`
--
ALTER TABLE `tb_status_product`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
