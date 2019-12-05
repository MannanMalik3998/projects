-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2019 at 08:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(0, 'amit', 'noble'),
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_address`
--

CREATE TABLE `checkout_address` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `contactno` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_address`
--

INSERT INTO `checkout_address` (`id`, `firstname`, `lastname`, `email`, `address`, `city`, `pincode`, `contactno`) VALUES
(42, 'dummy4', 'dummy4', 'dummy@mummy.com', 'qwer', 'qwer', '123456', '1234567891'),
(41, 'dummy3', 'dummy3', 'dummy@mummy.com', 'qwer', 'qwer', '123456', '1234567891'),
(40, 'dummy1', 'dummy1', 'dummy@mummy.com', 'qwer', 'qwer', '123456', '1234567891');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order_product`
--

CREATE TABLE `confirm_order_product` (
  `id` int(5) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` varchar(5) NOT NULL,
  `product_qty` varchar(5) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_total` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirm_order_product`
--

INSERT INTO `confirm_order_product` (`id`, `order_id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_total`) VALUES
(50, '250', 'Chuchu', '250', 'Cutoo', 'product_image/c7523510a94f59dacbac5b352470b85258113514_428616604371259_47699614731599872_n.jpg', '4'),
(49, '40', 'Tickles', '40', 'Shy', 'product_image/b8707207ea0c740b57faaa09555fc28558543642_850924145244409_1023714818030305280_n.jpg', '3'),
(48, '100', '1', '100', 'Angry', 'product_image/8fa0207f58b68ea922c349bfebbc6dd457602664_2324853637804263_3622075615844237312_n.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `pproduct_desc` varchar(500) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_category`, `pproduct_desc`, `status`) VALUES
(16, 'Tom', 100, 1, 'product_image/c3441e9937224889961ebc5a4d42919757572719_646427495795385_5473517175404756992_n.jpg', 'qw', 'Kiddo', '0'),
(15, 'Oggy', 50, 1, 'product_image/ee17a3d8cb810b7478f230aad1fa45a057620693_437411550359471_5805262854529482752_n.jpg', 'Persian ', 'This is a playful cat, 2 years old', '0'),
(22, '1', 100, 1, 'product_image/8fa0207f58b68ea922c349bfebbc6dd457602664_2324853637804263_3622075615844237312_n.png', 'Lol', 'Angry Cat', '1'),
(23, '2', 145, 1, 'product_image/3974db88706cc31674657cd2a4e6fc0958444044_440898136479961_8291458953615769600_n.jpg', 'Fluff', 'Shy', '0'),
(17, 'Wompus', 150, 1, 'product_image/4ca595012de538aac5108b04e737422555528683_287604728798819_6009698959902113792_n.png', 'Half Breed', 'Very Naughty kitty', '0'),
(18, 'Tickles', 40, 1, 'product_image/b8707207ea0c740b57faaa09555fc28558543642_850924145244409_1023714818030305280_n.jpg', 'Siamese', 'Shy', '1'),
(21, 'Chuchu', 250, 1, 'product_image/c7523510a94f59dacbac5b352470b85258113514_428616604371259_47699614731599872_n.jpg', 'Persian', 'Cutoo', '1'),
(20, 'Mano', 2000, 1, 'product_image/f3649891d86e180564825d8d7eb8906f57092924_1920353598076828_3040151759629582336_n.png', 'Turkish Angora', 'Turkish Angora', '0'),
(27, 'Brutus', 75, 1, 'product_image/57e6affb0f1d594f617fa3e050b1bf8655865262_641751052933019_5181437868605702144_n.png', 'Persian etc', 'This is a playful cat', '0'),
(28, 'lol', 20, 1, 'product_image/d9a4dbc1e6f5686c21e24169a16ed06356268604_2315131055475135_699181020355756032_n.png', 'PussyCat', 'This is a playful cat', '0'),
(29, 'Test1', 100, 1, 'product_image/9849d16238f06d458ad283af56c870e456492500_1996162127359397_7395651238072680448_n.png', 'Test', 'This is a playful cat', '0'),
(30, 'Test2', 120, 1, 'product_image/b34c5d5ecfb9ce8f0565aeafa25bf63758694254_718841238518498_298558831900753920_n.jpg', 'test', 'This is a playful cat', '0');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(3) NOT NULL,
  `test` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`) VALUES
(1, 'dummy1', 'dummy1', 'd1'),
(2, 'dummy2', 'dummy2', 'd2'),
(3, 'dummy3', 'dummy3', 'd3'),
(4, 'dummy4', 'dummy4', 'd4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_address`
--
ALTER TABLE `checkout_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_order_product`
--
ALTER TABLE `confirm_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout_address`
--
ALTER TABLE `checkout_address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `confirm_order_product`
--
ALTER TABLE `confirm_order_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
