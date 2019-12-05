-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 09:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
(' ', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fees` int(10) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `username`, `password`, `fees`, `specialization`, `email`, `status`) VALUES
(1, 'doctor1', 'd1', 'd1', 4000, 'Heart', 'd1@gmail.com', '1'),
(2, 'doctor2', 'd2', 'd2', 3000, 'Brain', 'd2@gmail.com', '1'),
(3, 'doctor3', 'd3', 'd3', 200, 'liver', 'd3@gmail.com', '1'),
(4, 'Manan', 'Manan', 'manan', 150000, 'LoveGuru', 'qwe@g.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `admitdate` varchar(20) NOT NULL,
  `did` varchar(50) NOT NULL,
  `rid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `email`, `admitdate`, `did`, `rid`) VALUES
(11, 'Patient4', '21', 'p4@gmail.com', '0002-02-02', 'd3', 'B'),
(13, 'p5', '23', 'p5@gmail.com', '03-12-2018', 'd2', 'B'),
(14, 'p6', '24', 'p6@gmail.com', '03-12-2018', 'd2', 'A'),
(15, 'p7', '24', 'p7@gmail.com', '01-12-2018', 'd2', 'A'),
(18, 'Manan', '18', 'manan.hameed47@gmail', '03-12-2018', 'd1', 'A'),
(19, 'Imtiaz Lund', '20', 'lund@gmail.com', '13-04-2019', 'Manan', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `patienthistory`
--

CREATE TABLE `patienthistory` (
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admitdate` varchar(50) NOT NULL,
  `dischargedate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patienthistory`
--

INSERT INTO `patienthistory` (`name`, `age`, `doctor`, `email`, `admitdate`, `dischargedate`) VALUES
('1', 1, 'd2', '1.1@g.com', '03-12-2018', '03-12-2018'),
('hussain', 20, 'd3', 'dummy1@dummy.com', '04-12-2018', '04-12-2018');

-- --------------------------------------------------------

--
-- Table structure for table `patientreport`
--

CREATE TABLE `patientreport` (
  `id` int(11) NOT NULL,
  `did` varchar(11) NOT NULL,
  `pid` varchar(11) NOT NULL,
  `Report` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientreport`
--

INSERT INTO `patientreport` (`id`, `did`, `pid`, `Report`) VALUES
(5, 'd2', 'Manan', 'Good Boy'),
(6, 'd2', 'p6', 'r since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(7, 'd2', '1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.'),
(8, 'd2', 'p6', 'Bla ba bla'),
(9, 'Manan', 'Imtiaz Lund', 'devdas');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `charges` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `available_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `charges`, `qty`, `available_qty`) VALUES
(1, 'A', 3000, 10, 9),
(7, 'B', 2000, 20, 20),
(8, 'C', 1000, 30, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patientreport`
--
ALTER TABLE `patientreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patientreport`
--
ALTER TABLE `patientreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
