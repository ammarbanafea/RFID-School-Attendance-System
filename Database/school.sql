-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 06:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_pwd` longtext NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`, `type`, `student_id`) VALUES
(1, 'Ammar', 'ammar@gmail.com', '$2y$10$2ZdlcAcGvQ.o/udtulP9j.rUgj87munkDv5.XCFCZ2BpgNo.E52zy', 1, NULL),
(9, 'Ali Ba Nafea', 'Ali@gmail.com', '$2y$10$2sHofEaPnDppTTbPAaZ8vuxL769IFz621.FDN1OkI49NBU1esC0ju', 0, 1),
(10, 'Mohammad Rajih', 'Mohammad@hotmail.com', '$2y$10$pkS3DGUQc9YU4ATGT103Ze7H.jaFRgJsGhNv6zfev9kBm9BTUTHMO', 0, 2),
(11, 'Abdulrahman Abdullah', 'Abdulrahman@outlook.com', '$2y$10$fxy3730xAU/y8Dd0xsfObe29NycW743rYrZQNAvAOvl4el/KBdo1K', 0, 3),
(12, 'Omar Nidhal', 'Omar@gmail.com', '$2y$10$q3dT.40AAH15GRpCEBDn/eZ65beNwCFOjVXbTcwzORq8YKpb9Nq6.', 0, 4),
(13, 'Naser Khalid', 'Naser@gmail.com', '$2y$10$VOIrvBw0zPTMd1i/kQGZ9.EDoKOa44agwTB.wnFsJOiz9smSPAl6C', 0, 5),
(14, 'Ali Al Zahrani', 'Alzahrani@gmail.com', '$2y$10$0NIzwB35K7CIjMdEa4Pw4O3x3onAL5Eczq/vIL8Xnawjty0tmYl7y', 0, 17),
(15, 'Taleb Ahmed', 'Taleb@outlook.com', '$2y$10$Egy80yw4fXFTuFiPT.mtMeNRRb41X4Ho3O1MAtRL2gHGrl6j2bm6C', 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_list`
--

CREATE TABLE `attendance_list` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `serialnumber` double NOT NULL,
  `card_uid` varchar(30) NOT NULL,
  `device_uid` varchar(20) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `checkindate` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `card_out` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_list`
--

INSERT INTO `attendance_list` (`id`, `username`, `serialnumber`, `card_uid`, `device_uid`, `device_dep`, `checkindate`, `timein`, `timeout`, `card_out`) VALUES
(1, 'Khalid Mohammad', 210002, '2620416126', '5ccfe9b219a2d9c9', 'School', '2021-12-19', '06:23:34', '07:13:37', 1),
(2, 'Ammar Ba Nafea', 210001, '671414412', '5ccfe9b219a2d9c9', 'School', '2021-12-19', '06:23:41', '07:13:29', 1),
(3, 'Ahmed Taleb', 210007, '191311272', '5ccfe9b219a2d9c9', 'School', '2021-12-19', '06:23:49', '07:13:20', 1),
(4, 'Nor Omar', 210004, '15618913633', '5ccfe9b219a2d9c9', 'School', '2021-12-19', '06:23:59', '07:13:44', 1),
(5, 'Khadija Naser', 210005, '2346244128', '5ccfe9b219a2d9c9', 'School', '2021-12-19', '06:24:07', '07:14:00', 1),
(6, 'Fatimah Abdulrahman', 210003, '13889152134', '5ccfe9b219a2d9c9', 'School', '2021-12-19', '06:24:15', '07:13:52', 1),
(7, 'Ahmed Taleb', 210007, '191311272', '5ccfe9b219a2d9c9', 'School', '2021-12-20', '06:50:07', '13:33:24', 1),
(8, 'Nor Omar', 210004, '15618913633', '5ccfe9b219a2d9c9', 'School', '2021-12-20', '06:51:19', '13:43:19', 1),
(9, 'Khalid Mohammad', 210002, '2620416126', '5ccfe9b219a2d9c9', 'School', '2021-12-20', '06:51:26', '13:35:00', 1),
(10, 'Fatimah Abdulrahman', 210003, '13889152134', '5ccfe9b219a2d9c9', 'School', '2021-12-20', '06:52:34', '13:36:17', 1),
(11, 'Ammar Ba Nafea', 210001, '671414412', '5ccfe9b219a2d9c9', 'School', '2021-12-20', '06:54:49', '13:37:16', 1),
(12, 'Khadija Naser', 210005, '2346244128', '5ccfe9b219a2d9c9', 'School', '2021-12-20', '06:58:57', '13:35:35', 1),
(13, 'Khadija Naser', 210005, '2346244128', '5ccfe9b219a2d9c9', 'School', '2021-12-21', '06:40:08', '13:33:17', 1),
(14, 'Ammar Ba Nafea', 210001, '671414412', '5ccfe9b219a2d9c9', 'School', '2021-12-21', '06:43:25', '13:29:32', 1),
(15, 'Fatimah Abdulrahman', 210003, '13889152134', '5ccfe9b219a2d9c9', 'School', '2021-12-21', '06:44:43', '13:36:51', 1),
(16, 'Khalid Mohammad', 210002, '2620416126', '5ccfe9b219a2d9c9', 'School', '2021-12-21', '06:48:59', '13:37:00', 1),
(17, 'Nor Omar', 210004, '15618913633', '5ccfe9b219a2d9c9', 'School', '2021-12-21', '06:51:49', '13:42:09', 1),
(18, 'Ahmed Taleb', 210007, '191311272', '5ccfe9b219a2d9c9', 'School', '2021-12-21', '06:53:57', '13:35:20', 1),
(19, 'Ahmed Taleb', 210007, '191311272', '5ccfe9b219a2d9c9', 'School', '2021-12-22', '06:35:29', '13:36:14', 1),
(20, 'Khalid Mohammad', 210002, '2620416126', '5ccfe9b219a2d9c9', 'School', '2021-12-22', '06:45:27', '13:32:17', 1),
(21, 'Nor Omar', 210004, '15618913633', '5ccfe9b219a2d9c9', 'School', '2021-12-22', '06:46:01', '13:40:38', 1),
(22, 'Fatimah Abdulrahman', 210003, '13889152134', '5ccfe9b219a2d9c9', 'School', '2021-12-22', '06:48:10', '13:34:51', 1),
(23, 'Ammar Ba Nafea', 210001, '671414412', '5ccfe9b219a2d9c9', 'School', '2021-12-22', '06:49:18', '13:36:00', 1),
(24, 'Khadija Naser', 210005, '2346244128', '5ccfe9b219a2d9c9', 'School', '2021-12-22', '06:50:26', '13:43:23', 1),
(25, 'Khadija Naser', 210005, '2346244128', '5ccfe9b219a2d9c9', 'School', '2021-12-23', '06:46:08', '13:37:26', 1),
(26, 'Fatimah Abdulrahman', 210003, '13889152134', '5ccfe9b219a2d9c9', 'School', '2021-12-23', '05:46:17', '13:37:47', 1),
(27, 'Nor Omar', 210004, '15618913633', '5ccfe9b219a2d9c9', 'School', '2021-12-23', '06:48:26', '13:30:33', 1),
(28, 'Ahmed Taleb', 210007, '191311272', '5ccfe9b219a2d9c9', 'School', '2021-12-23', '06:50:34', '13:36:23', 1),
(29, 'Khalid Mohammad', 210002, '2620416126', '5ccfe9b219a2d9c9', 'School', '2021-12-23', '06:52:23', '13:40:22', 1),
(30, 'Ammar Ba Nafea', 210001, '671414412', '5ccfe9b219a2d9c9', 'School', '2021-12-23', '06:55:22', '13:39:25', 1),
(31, 'Ammar Ba Nafea', 210001, '671414412', '5ccfe9b219a2d9c9', 'School', '2021-12-24', '06:50:33', '13:37:30', 1),
(32, 'Khalid Mohammad', 210002, '2620416126', '5ccfe9b219a2d9c9', 'School', '2021-12-24', '06:51:43', '13:40:15', 1),
(33, 'Ahmed Taleb', 210007, '191311272', '5ccfe9b219a2d9c9', 'School', '2021-12-24', '06:53:14', '13:33:32', 1),
(34, 'Nor Omar', 210004, '15618913633', '5ccfe9b219a2d9c9', 'School', '2021-12-24', '06:54:41', '13:37:07', 1),
(35, 'Fatimah Abdulrahman', 210003, '13889152134', '5ccfe9b219a2d9c9', 'School', '2021-12-24', '06:55:13', '13:36:40', 1),
(36, 'Khadija Naser', 210005, '2346244128', '5ccfe9b219a2d9c9', 'School', '2021-12-24', '06:56:34', '13:36:26', 1),
(37, 'Fatimah Abdulrahman', 210003, '13889152134', '8b91717c767b9d24', 'School', '2021-12-27', '05:16:07', '13:40:38', 1),
(38, 'Fahad Ali', 210006, '2522187935', '8b91717c767b9d24', 'School', '2021-12-27', '05:16:14', '05:25:32', 1),
(39, 'Ammar Ba Nafea', 210001, '671414412', '8b91717c767b9d24', 'School', '2021-12-27', '05:25:59', '13:34:51', 1),
(40, 'Khalid Mohammad', 210002, '2620416126', '8b91717c767b9d24', 'School', '2021-12-27', '05:26:09', '13:37:00', 1),
(41, 'Ahmed Taleb', 210007, '191311272', '8b91717c767b9d24', 'School', '2021-12-27', '05:26:20', '13:36:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `device_uid` text NOT NULL,
  `device_date` date NOT NULL,
  `device_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_dep`, `device_uid`, `device_date`, `device_mode`) VALUES
(1, '1A', 'School', '5ccfe9b219a2d9c9', '2021-11-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT 'None',
  `serialnumber` varchar(6) NOT NULL DEFAULT '0',
  `gender` varchar(10) NOT NULL DEFAULT 'None',
  `address` varchar(50) NOT NULL DEFAULT 'None',
  `card_uid` varchar(30) NOT NULL,
  `card_select` tinyint(1) NOT NULL DEFAULT 0,
  `user_date` date NOT NULL,
  `device_uid` varchar(20) NOT NULL DEFAULT '0',
  `device_dep` varchar(20) NOT NULL DEFAULT '0',
  `add_card` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `serialnumber`, `gender`, `address`, `card_uid`, `card_select`, `user_date`, `device_uid`, `device_dep`, `add_card`) VALUES
(1, 'Ammar Ba Nafea', '210001', 'Male', 'Casa Indah 1, Kota Damansara, Selangor', '671414412', 0, '2021-11-18', '5ccfe9b219a2d9c9', 'School', 1),
(2, 'Khalid Mohammad', '210002', 'Male', 'Cova Suits, Kota Damansara, Selangor', '2620416126', 0, '2021-11-18', '5ccfe9b219a2d9c9', 'School', 1),
(3, 'Fatimah Abdulrahman', '210003', 'Female', 'D\'Sara Sentral, Sungai Buloh, Selangor', '13889152134', 1, '2021-11-23', '5ccfe9b219a2d9c9', 'School', 1),
(4, 'Nor Omar', '210004', 'Female', 'I Residen, Kota Damansara, Selangor, Malaysia', '15618913633', 0, '2021-11-23', '5ccfe9b219a2d9c9', 'School', 1),
(5, 'Khadija Naser', '210005', 'Female', 'Palm Spring, Petaling Jaya, Selangor', '2346244128', 0, '2021-11-23', '5ccfe9b219a2d9c9', 'School', 1),
(17, 'Fahad Ali', '210006', 'Male', 'cova suites, kota damansara', '2522187935', 0, '2021-12-27', '5ccfe9b219a2d9c9', 'School', 1),
(19, 'Ahmed Taleb', '210007', 'Male', 'Cova Suits, Kota Damansara, Selangor', '191311272', 0, '2022-01-07', '5ccfe9b219a2d9c9', 'School', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `attendance_list`
--
ALTER TABLE `attendance_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendance_list`
--
ALTER TABLE `attendance_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
