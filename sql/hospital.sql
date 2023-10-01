-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 11:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
  `room` varchar(20) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`current_datetime`, `appointment_date`, `HN`, `ID_number`, `S_name`, `booked_by`, `Department`, `P_number`, `Email`, `room`, `Status`) VALUES
('2023-09-30 17:17:01', '2023-10-07', '6310210014', '1839000890088', 'สมสาย มานีนายา', 'กฤตพณ ศักดา', 'หู ตา คอ จมูก', '0805223388', 'popeye34@gmail.com', 'พิเศษ 1', 'รออนุมัติ'),
('2023-09-28 16:45:44', '2023-09-29', '6310210403', '1830101151811', 'สมสาย มานีนา', 'กฤตพณ ศักดา', 'อายุรกรรม', '0805223300', 'popeye2@gmail.com', 'พิเศษ 1', 'รออนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(10) NOT NULL,
  `d_name` varchar(200) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(1, 'อายุรกรรม'),
(4, 'หู ตา คอ จมูก'),
(6, 'เด็ก');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `h_id` int(10) NOT NULL,
  `h_HN` varchar(10) NOT NULL,
  `h_idnum` varchar(13) NOT NULL,
  `h_name` varchar(20) NOT NULL,
  `h_book` varchar(255) NOT NULL,
  `h_dp` varchar(255) NOT NULL,
  `h_room` varchar(20) NOT NULL,
  `h_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`h_id`, `h_HN`, `h_idnum`, `h_name`, `h_book`, `h_dp`, `h_room`, `h_status`) VALUES
(1, '6310210160', '1839900642600', 'จักกรี อารี', 'สายฝน กลางคืน', 'หู คอ จมูก', 'ห้องพักแบบพิเศษ 1', ''),
(2, '6310210403', '1830101151811', 'สมสาย มานีนา', 'สาสม ออเก้า', 'อายุรกรรม', 'ห้องพักแบบพิเศษ 1', '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(10) NOT NULL,
  `m_firstname` varchar(200) NOT NULL,
  `m_lastname` varchar(200) NOT NULL,
  `m_username` varchar(200) NOT NULL,
  `m_password` varchar(200) NOT NULL,
  `m_level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_firstname`, `m_lastname`, `m_username`, `m_password`, `m_level`) VALUES
(1, 'mosskrit', 'sakda', 'moss123', '456789', 'admin'),
(2, 'kritza', 'sakda', 'moss789', '789456', 'officer'),
(3, 'popeyeza', 'lol', 'admin1', '123456', 'officer'),
(8, 'mosszaza', 'popeye', 'admin2', '2222', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `HN` varchar(255) NOT NULL,
  `S_name` varchar(255) NOT NULL,
  `ID_number` varchar(255) NOT NULL,
  `P_number` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `HN`, `S_name`, `ID_number`, `P_number`, `Email`) VALUES
(1, '6310210403', 'สมสาย มานีนา', '1830101151811', '0646215488', 'monthree@gmail.com'),
(2, '6310210013', 'ศาสตราวุธ ผงเผ่า', '1839400000000', '0646215488', 'hamsusu@gmail.com'),
(3, '6310210160', 'จักกรี อารี', '1839900642600', '0813246551', 'hamsusu@gmail.com'),
(4, '6310210444', 'จักกรี อารี', '1830101151147', '0813246544', 'monthree@gmail.com'),
(9, '6310210002', 'สหายเเสง กินเเกง', '1839000890000', '0815223369', 'popeye3@gmail.com'),
(10, '6310210456', 'สมหมาย ใจสมุทร', '1839000890000', '0819708441', 'popeye@gmail.com'),
(11, '6310210014', 'สมสาย มานีนายา', '1839000890088', '0805223370', 'popeye34@gmail.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `room_num`
--

CREATE TABLE `room_num` (
  `rn_id` int(10) NOT NULL,
  `rt_id` int(10) NOT NULL,
  `rn_name` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `rn_status` varchar(200) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_num`
--

INSERT INTO `room_num` (`rn_id`, `rt_id`, `rn_name`, `rn_status`) VALUES
(1, 1, 'Room-1', 'ห้องว่าง'),
(2, 3, 'Room-2', 'ห้องว่าง'),
(3, 2, 'Room-3', 'ห้องว่าง'),
(4, 3, 'Room-4', 'ห้องว่าง'),
(12, 13, 'Room-5', 'ห้องไม่ว่าง');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `rt_id` int(10) NOT NULL,
  `rt_type` varchar(200) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL,
  `rt_price` varchar(200) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL,
  `rt_img` varchar(200) NOT NULL,
  `rt_num` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`rt_id`, `rt_type`, `rt_price`, `rt_img`, `rt_num`) VALUES
(1, 'พิเศษ 1', '2500', '164299518.jpg', 10),
(2, 'พิเศษ 2', '4000', '1698634197.jpg', 5),
(3, 'ราคาประหยัด 1', '400', '1019634679.jpg', 50),
(13, 'ราคาประหยัด 2', '600', '1374815459.jpg', 35);

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
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

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
-- Indexes for table `room_num`
--
ALTER TABLE `room_num`
  ADD PRIMARY KEY (`rn_id`),
  ADD KEY `rt_id` (`rt_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`rt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_num`
--
ALTER TABLE `room_num`
  MODIFY `rn_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `rt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_num`
--
ALTER TABLE `room_num`
  ADD CONSTRAINT `rt_id` FOREIGN KEY (`rt_id`) REFERENCES `room_type` (`rt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
