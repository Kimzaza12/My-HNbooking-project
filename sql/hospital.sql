-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 02:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `current_datetime` datetime DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `HN` varchar(10) NOT NULL,
  `ID_number` varchar(13) DEFAULT NULL,
  `S_name` varchar(255) DEFAULT NULL,
  `booked_by` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `P_number` varchar(10) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `room` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`current_datetime`, `appointment_date`, `HN`, `ID_number`, `S_name`, `booked_by`, `Department`, `P_number`, `Email`, `room`) VALUES
('2023-09-19 22:57:46', '2023-09-21', '6310210013', '1839400000000', 'ศาสตราวุธ ผงเผ่า', 'มาโนช ชัพพลาย', 'เด็ก', '0816452112', 'hamsusu@gmail.com', '1'),
('2023-09-20 18:35:59', '2023-09-23', '6310210160', '1839900642600', 'จักกรี อารี', 'สายฝน กลางคืน', 'หู คอ จมูก', '0813246551', 'somchar@gmail.com', '1'),
('2023-09-20 18:28:31', '2023-09-22', '6310210403', '1830101151811', 'สมสาย มานีนา', 'มาโนช ชัพพลาย', 'อายุรกรรม', '0646215488', 'somchai@gmail.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` char(10) NOT NULL,
  `d_name` varchar(15) CHARACTER SET tis620 COLLATE tis620_thai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
('D-1', 'อายุรกรรม'),
('D-2', 'เด็ก'),
('D-3', 'สูตินรีเวช'),
('D-4', 'กระดูกและข้อ'),
('D-5', 'หู คอ จมูก');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `HN` char(15) NOT NULL,
  `p_idcard` varchar(13) DEFAULT NULL,
  `p_fname` varchar(15) CHARACTER SET tis620 COLLATE tis620_thai_ci DEFAULT NULL,
  `p_lname` varchar(15) CHARACTER SET tis620 COLLATE tis620_thai_ci DEFAULT NULL,
  `p_disease` varchar(15) CHARACTER SET tis620 COLLATE tis620_thai_ci DEFAULT NULL,
  `d_id` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`HN`, `p_idcard`, `p_fname`, `p_lname`, `p_disease`, `d_id`) VALUES
('HN-6310210001', '1839100000023', 'มะลิ', 'ใจดี', 'ภูมิเเพ้', 'D-1'),
('HN-6310210002', '1839100000204', 'เเมนนี่', 'ปาเกียว', 'คออักเสบ', 'D-5'),
('HN-6310210003', '1839100000045', 'จำปา', 'มหาสมุทร', 'ต้อลม', 'D-5'),
('HN-6310210403', '1830000000000', 'สิทธิชัย', 'องค์วิมลการ', 'เบาหวาน', 'D-2');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `HN` varchar(255) NOT NULL,
  `S_name` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `ID_number` varchar(255) NOT NULL,
  `P_number` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `HN`, `S_name`, `Department`, `ID_number`, `P_number`, `Email`) VALUES
(1, '6310210403', 'สมสาย มานีนา', 'อายุรกรรม', '1830101151811', '0646215488', 'monthree@gmail.com'),
(2, '6310210013', 'ศาสตราวุธ ผงเผ่า', 'เด็ก', '1839400000000', '0646215488', 'hamsusu@gmail.com'),
(3, '6310210160', 'จักกรี อารี', 'หู คอ จมูก', '1839900642600', '0813246551', 'hamsusu@gmail.com'),
(4, '6310210444', 'จักกรี อารี', 'อายุรกรรม', '1830101151147', '0813246544', 'monthree@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` char(10) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `r_name` varchar(15) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `r_name`) VALUES
('R-1', 'ราคาประหยัด'),
('R-2', 'พิเศษ 1'),
('R-3', 'พิเศษ 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`HN`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`HN`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
