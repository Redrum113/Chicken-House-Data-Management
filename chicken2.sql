-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 09:50 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chicken2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE `ages` (
  `id` int(11) NOT NULL,
  `age_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`id`, `age_name`) VALUES
(1, 'ไก่เล็ก'),
(2, 'ไก่เต็มวัย');

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `breed_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `breed_name`) VALUES
(1, 'บรามส์'),
(2, 'หงอนไก่แดง'),
(3, 'มีทฮอค'),
(4, 'พื้นเมือง'),
(5, 'Test01');

-- --------------------------------------------------------

--
-- Table structure for table `chickens`
--

CREATE TABLE `chickens` (
  `id` int(11) NOT NULL,
  `chicken_number` varchar(45) NOT NULL,
  `breeds_id` int(11) NOT NULL,
  `date_egg` date NOT NULL,
  `date_receive` date NOT NULL,
  `chicken_type` tinyint(1) NOT NULL,
  `chicken_sex` tinyint(1) NOT NULL,
  `houses_id` int(11) NOT NULL,
  `coop_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_expired` date NOT NULL,
  `father_id` int(11) NOT NULL,
  `mother_id` int(11) NOT NULL,
  `year_import` int(4) NOT NULL,
  `number_import` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chickens`
--

INSERT INTO `chickens` (`id`, `chicken_number`, `breeds_id`, `date_egg`, `date_receive`, `chicken_type`, `chicken_sex`, `houses_id`, `coop_id`, `status`, `date_expired`, `father_id`, `mother_id`, `year_import`, `number_import`) VALUES
(1, 'C-0000001', 1, '2564-04-15', '2564-04-01', 1, 1, 1, 1, 1, '2564-05-01', 0, 0, 0, 0),
(2, 'C-0000002', 1, '2564-04-15', '2564-04-01', 2, 1, 2, 2, 1, '2564-04-24', 0, 0, 0, 0),
(3, 'C-0000003', 3, '2564-03-28', '2564-04-21', 1, 2, 1, 2, 1, '0000-00-00', 0, 0, 0, 0),
(4, 'C-0000004', 2, '2564-03-31', '2564-04-21', 1, 2, 1, 5, 1, '0000-00-00', 0, 0, 0, 0),
(5, 'C-0000005', 4, '2564-04-11', '2564-04-21', 1, 1, 3, 10, 1, '0000-00-00', 0, 0, 0, 0),
(6, 'C-0000006', 4, '2564-04-15', '2564-04-18', 1, 2, 4, 9, 1, '2564-04-24', 0, 0, 0, 0),
(7, 'C-0000007', 3, '2564-09-15', '2564-04-18', 1, 1, 5, 7, 2, '0000-00-00', 2, 1, 2564, 1),
(12, 'C-0000012', 4, '0000-00-00', '2564-04-29', 1, 2, 5, 0, 1, '0000-00-00', 0, 0, 2564, 1),
(13, 'C-0000013', 4, '0000-00-00', '2564-04-29', 1, 2, 5, 0, 1, '0000-00-00', 0, 0, 2564, 1),
(14, 'C-0000014', 4, '0000-00-00', '2564-04-29', 1, 2, 5, 0, 1, '0000-00-00', 0, 0, 2564, 1),
(16, 'C-0000016', 2, '2564-04-29', '2564-04-29', 1, 2, 5, 0, 1, '0000-00-00', 0, 0, 2564, 1),
(17, 'C-0000017', 2, '2564-04-29', '2564-04-29', 1, 2, 5, 0, 1, '0000-00-00', 0, 0, 2564, 1),
(18, 'C-0000018', 2, '0000-00-00', '2564-04-29', 1, 2, 5, 0, 1, '0000-00-00', 0, 0, 2564, 1),
(20, 'C-0000020', 1, '2564-04-29', '2564-04-29', 1, 2, 5, 99, 1, '0000-00-00', 0, 0, 2564, 3),
(21, 'C-0000021', 1, '2564-04-29', '2564-04-29', 1, 2, 5, 98, 1, '0000-00-00', 0, 0, 2564, 3),
(22, 'C-0000022', 1, '0000-00-00', '2564-04-29', 1, 2, 5, 97, 1, '0000-00-00', 0, 0, 2564, 3),
(24, 'C-0000024', 4, '2564-04-29', '2564-04-29', 1, 2, 5, 95, 1, '0000-00-00', 0, 0, 2564, 4),
(25, 'C-0000025', 4, '2564-04-29', '2564-04-29', 1, 2, 5, 94, 1, '0000-00-00', 0, 0, 2564, 4),
(26, 'C-0000026', 4, '0000-00-00', '2564-04-29', 1, 2, 5, 93, 1, '0000-00-00', 0, 0, 2564, 4),
(28, 'C-0000028', 5, '2564-04-29', '2564-04-29', 1, 2, 5, 91, 1, '0000-00-00', 0, 0, 2564, 5),
(29, 'C-0000029', 5, '2564-04-29', '2564-04-29', 1, 2, 5, 90, 1, '0000-00-00', 0, 0, 2564, 5),
(30, 'C-0000030', 5, '0000-00-00', '2564-04-29', 1, 2, 5, 89, 1, '0000-00-00', 0, 0, 2564, 5),
(36, 'C-0000036', 4, '2564-04-29', '2564-04-29', 1, 2, 5, 2, 1, '0000-00-00', 0, 0, 2564, 7),
(37, 'C-0000037', 4, '2564-04-29', '2564-04-29', 1, 2, 5, 3, 1, '0000-00-00', 0, 0, 2564, 7),
(38, 'C-0000038', 4, '0000-00-00', '2564-04-29', 1, 2, 5, 4, 1, '0000-00-00', 0, 0, 2564, 7),
(40, 'C-0000040', 2, '2564-04-29', '2564-04-29', 1, 2, 3, 2, 1, '0000-00-00', 0, 0, 2564, 8),
(41, 'C-0000041', 2, '2564-04-29', '2564-04-29', 1, 2, 3, 3, 1, '0000-00-00', 0, 0, 2564, 8),
(42, 'C-0000042', 2, '0000-00-00', '2564-04-29', 1, 2, 3, 4, 1, '0000-00-00', 0, 0, 2564, 8);

-- --------------------------------------------------------

--
-- Table structure for table `chickens_info`
--

CREATE TABLE `chickens_info` (
  `id` int(11) NOT NULL,
  `chickens_id` int(11) NOT NULL,
  `chest` decimal(7,2) NOT NULL,
  `weight` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chickens_info`
--

INSERT INTO `chickens_info` (`id`, `chickens_id`, `chest`, `weight`, `status`, `update_date`) VALUES
(1, 1, '11.00', '5.00', 1, '2564-04-19'),
(2, 1, '12.00', '7.00', 2, '2564-04-19'),
(3, 1, '13.00', '8.00', 1, '2564-04-21'),
(4, 2, '12.00', '5.00', 1, '2564-04-21'),
(5, 5, '12.00', '5.00', 1, '2564-04-29'),
(6, 5, '0.00', '0.00', 2, '2564-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `food_name` varchar(45) NOT NULL,
  `food_type` varchar(255) NOT NULL,
  `food_desc` varchar(255) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food_name`, `food_type`, `food_desc`, `update_date`) VALUES
(1, '101', 'สำหรับไก่ไข่ทั่วไป', 'อาหารสำหรับบำรุงไก่ไข่ทั่วไป', '2564-04-19'),
(2, '102', 'อาหารบำรุงไก่ไข่', '*สำหรับบำรุง', '2564-04-21'),
(3, '103', 'ทดสอบ1', '***', '2564-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `house_name` varchar(45) NOT NULL,
  `house_detail` varchar(255) NOT NULL,
  `ages_id` int(11) NOT NULL,
  `foods_id` int(11) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_name`, `house_detail`, `ages_id`, `foods_id`, `update_date`) VALUES
(1, 'โรงเรือน1', 'โรงเรือนไก่เต็มวัย - ไก่ไข่', 2, 1, '2564-04-19'),
(2, 'โรงเรือน2', 'โรงเรือนไก่ไข่', 2, 1, '2564-04-19'),
(3, 'โรงเรือน3', 'โรงเรือนไก่ไข่3', 2, 2, '2564-04-21'),
(4, 'โรงเรือน4', 'ไก่ไข่ 4', 2, 2, '2564-04-21'),
(5, 'โรงเรือน5', 'ลูกเจี๊ยบ', 1, 1, '2564-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `houses_info`
--

CREATE TABLE `houses_info` (
  `id` int(11) NOT NULL,
  `houses_id` int(11) NOT NULL,
  `tempurator` decimal(7,2) NOT NULL,
  `moisture` decimal(7,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses_info`
--

INSERT INTO `houses_info` (`id`, `houses_id`, `tempurator`, `moisture`, `description`, `update_date`) VALUES
(1, 4, '34.00', '26.00', '', '2564-04-21'),
(2, 5, '34.00', '26.00', '***', '2564-04-21'),
(3, 5, '40.00', '25.00', '', '2564-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `keeps`
--

CREATE TABLE `keeps` (
  `id` int(11) NOT NULL,
  `houses_id` int(11) NOT NULL,
  `coop_id` int(11) NOT NULL,
  `amount_egg` int(2) NOT NULL,
  `date_keep` date NOT NULL,
  `update_date` date DEFAULT NULL,
  `users_keep_id` int(11) NOT NULL,
  `users_edit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keeps`
--

INSERT INTO `keeps` (`id`, `houses_id`, `coop_id`, `amount_egg`, `date_keep`, `update_date`, `users_keep_id`, `users_edit_id`) VALUES
(1, 1, 1, 0, '2564-04-19', NULL, 0, 0),
(2, 2, 2, 1, '2564-04-19', NULL, 0, 0),
(3, 1, 1, 1, '2564-04-21', '0000-00-00', 0, 0),
(4, 1, 2, 1, '2564-04-21', NULL, 0, 0),
(5, 1, 5, 1, '2564-04-21', NULL, 0, 0),
(6, 5, 7, 1, '2564-04-21', NULL, 0, 0),
(7, 5, 2, 1, '2564-04-21', '2564-04-22', 0, 0),
(8, 5, 7, 1, '2564-04-22', NULL, 0, 0),
(9, 1, 2, 1, '2564-04-22', NULL, 0, 0),
(15, 1, 1, 1, '2564-04-29', NULL, 2, 0),
(16, 1, 2, 1, '2564-04-29', NULL, 2, 0),
(17, 1, 5, 1, '2564-04-29', NULL, 2, 0),
(18, 3, 2, 1, '2564-05-05', NULL, 2, 0),
(19, 3, 3, 1, '2564-05-05', NULL, 2, 0),
(20, 3, 4, 1, '2564-05-05', NULL, 2, 0),
(21, 3, 10, 1, '2564-05-05', NULL, 2, 0),
(22, 1, 1, 1, '2564-05-05', NULL, 2, 0),
(23, 1, 2, 1, '2564-05-05', NULL, 2, 0),
(24, 1, 5, 1, '2564-05-05', NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `parents_number` varchar(45) NOT NULL,
  `parents_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `parents_number`, `parents_type`) VALUES
(1, 'P-0000001', 2),
(2, 'P-0000002', 1),
(3, 'P-0000003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `telephone`, `email`, `address`, `image`, `status`) VALUES
(1, 'admin', 'admin', 'ทดลองชื่อ', 'นามสกุล', '1234567890', 'admin@gmail.com', 'ฟหกฟหกฟหกฟหกฟหก', '0a02c96e940c95a520ffa0d68de63715.jpg', 1),
(2, 'employee', 'employee', 'ทดลอง', 'พนักงาน', '2135468790', 'employee@gmail.com', 'ดหกดหกดหกด', 'unnamed.png', 2),
(3, 'admin1', '123456', 'Supanida', 'Jumpathum', '0632979856', 'inugami0403@gmail.com', '154/4', '', 2),
(4, 'inugami', '123456', 'Redrum', 'Test01', '0632979856', 'inugami0403@gmail.com', '154/4', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chickens`
--
ALTER TABLE `chickens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chickens_info`
--
ALTER TABLE `chickens_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses_info`
--
ALTER TABLE `houses_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keeps`
--
ALTER TABLE `keeps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ages`
--
ALTER TABLE `ages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chickens`
--
ALTER TABLE `chickens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `chickens_info`
--
ALTER TABLE `chickens_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `houses_info`
--
ALTER TABLE `houses_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keeps`
--
ALTER TABLE `keeps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
