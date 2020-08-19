-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 01:24 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classschedulingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(5) NOT NULL,
  `dept_desc` text NOT NULL,
  `dept_type` enum('faculty','course','strand') NOT NULL,
  `dept_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `dept_desc`, `dept_type`, `dept_active`) VALUES
(43, 'GE', 'General Education', 'faculty', 1),
(47, 'BSTM', 'Bachelor of Science in Tourism Management', 'course', 1),
(48, 'BSTM', 'Bachelor of Science in Tourism Management', 'faculty', 0),
(49, 'BSIT', 'Bachelor of Science in Information Technology', 'course', 1),
(50, 'fdghd', 'kjvkjffjdfji', 'strand', 0),
(51, 'IT', 'Information Technology', 'faculty', 1),
(52, 'BSIS', 'Bachelor of Science in Information System', 'course', 1),
(53, 'BSCS', 'Bachelor of Science in Computer Science', 'course', 1),
(54, 'BSBA', 'Bachelor of Science in Business Administration', 'course', 1),
(55, 'BSA', 'Bachelor of Science in Accountancy', 'course', 1),
(56, 'BSAIS', 'Bachelor of Science in Accounting Information system', 'course', 1),
(57, 'BSMA', 'Bachelor of Science in Management Accounting', 'course', 1),
(58, 'BSHM', 'Bachelor of Science in Hospitality Management', 'course', 1),
(59, 'BSCM', 'Bachelor of Science in Culinary Management', 'course', 1),
(60, 'BSCE', 'Bachelor of Science in Computer Engineering', 'course', 1),
(61, 'BMA', 'Bachelor of Multimedia Arts', 'course', 0),
(62, 'BACOM', 'Bachelor of Arts in Communication', 'course', 0),
(63, 'HRS', 'Hospitality and Restaurant Services', 'course', 0),
(64, 'HRA', 'Hotel and Restaurant Administration', 'course', 1),
(65, 'TEM', 'Tourism and Events Management', 'course', 1),
(66, 'IT', 'Information Technolo', 'course', 1),
(67, 'CS', 'Associate in Computer Technology', 'course', 0),
(68, 'ABM', 'Accountancy, Business and Management', 'strand', 1),
(69, 'STEM', 'Science, Technology, Engineering and Mathematics', 'strand', 1),
(70, 'HUMMS', 'Humanities and Social Sciences', 'strand', 1),
(71, 'GAS', 'General Academic Strand', 'strand', 1),
(72, 'IT', 'IT in Mobile App and Web Development', 'strand', 1),
(73, 'ARTS', 'Digital Arts', 'strand', 1),
(74, 'CS', 'Computer and Communications Technology', 'strand', 1),
(75, 'CE', 'Consumer Electronics', 'strand', 1),
(76, 'HRM', 'Hotel Operations', 'strand', 1),
(77, 'TM', 'Tourism Operations', 'strand', 1),
(78, 'HRS', 'Restaurant and Cafe Operation', 'strand', 1),
(79, 'Culin', 'Culinary Arts', 'strand', 0),
(80, 'Tst', 'Testing', 'course', 1),
(81, 'TEST', 'asdasd', 'course', 1);

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `last_name` tinytext NOT NULL,
  `first_name` tinytext NOT NULL,
  `middle_initial` tinytext NOT NULL,
  `suffix` tinytext NOT NULL,
  `dept_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prof_active` tinyint(1) NOT NULL DEFAULT 1,
  `prof_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `emp_no`, `last_name`, `first_name`, `middle_initial`, `suffix`, `dept_id`, `user_id`, `prof_active`, `prof_img`) VALUES
(31, 323253243, 'Aparato', 'Christine', '', '', 17, 28, 1, NULL),
(32, 123456789, 'Thomas', 'Dary', '', '', 43, 29, 1, 'Thomas.5f3ca888ef2de.jpg'),
(33, 2000066525, 'Aparato', 'Christine', '', '', 43, 30, 1, NULL),
(34, 89896565, 'Mendoza', 'Setty', 'G', '', 51, 32, 1, NULL),
(35, 987654321, 'De peralta', 'hush', '', '', 51, 34, 1, NULL),
(36, 147258369, 'Legarde', 'Dianne', '', '', 43, 35, 1, NULL),
(37, 963852741, 'Abalos', 'Romabel ', 'S', '', 43, 36, 1, NULL),
(38, 852147963, 'Pacleb', 'Roland', 'P', '', 51, 37, 1, NULL),
(39, 195375465, 'Gajasan', 'Jonathan', 'F', '', 43, 38, 1, NULL),
(40, 1236544789, 'Teruel', 'Jasper Jeric', 'B', '', 43, 39, 0, NULL),
(41, 14562487, 'Thoma', 'Isab', 'P', '', 43, 40, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rm_id` int(11) NOT NULL,
  `rm_name` varchar(30) NOT NULL,
  `rm_desc` text NOT NULL,
  `rm_floor` int(11) NOT NULL,
  `rm_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rm_id`, `rm_name`, `rm_desc`, `rm_floor`, `rm_active`) VALUES
(3, '101', 'Computer Laborato', 1, 1),
(5, '201', 'Class Room', 2, 1),
(6, '202', 'Class Room', 2, 1),
(7, '203', 'Class Room', 2, 1),
(8, '204', 'Class Room', 2, 1),
(9, '205', 'Class Room', 2, 1),
(10, '206', 'Class Room', 2, 1),
(11, '207', 'Class Room', 2, 1),
(12, '208', 'Class Room', 2, 1),
(13, '209', 'Class Room', 2, 1),
(14, '210', 'Class Room', 2, 0),
(15, '211', 'Class Room', 2, 1),
(16, '301', 'Class Room', 3, 1),
(17, '302', 'Class Room', 3, 1),
(18, '303', 'Class Room', 3, 1),
(19, '304', 'Class Room', 3, 1),
(20, '305', 'Class Room', 3, 1),
(21, '306', 'Class Room', 3, 1),
(22, '307', 'Class Room', 3, 1),
(23, '308', 'Class Room', 3, 1),
(24, '309', 'Class Room', 3, 1),
(25, '310', 'Class Room', 3, 1),
(26, '311', 'Class Room', 3, 1),
(27, '501', 'Retail', 5, 1),
(28, '502', 'Broad Casting Studio', 5, 1),
(29, '503', 'Bat and Dinning', 5, 1),
(30, '504', 'Computer Laboratory', 5, 1),
(31, '505', 'Computer Laboratory', 5, 1),
(32, '506', 'Computer Laboratory', 5, 1),
(33, '507', 'Computer Laboratory', 5, 1),
(34, '601', 'Class Room', 6, 1),
(35, '508', 'THM Laboratory', 5, 1),
(43, '555', 'Computer Laboratory', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `sched_id` int(11) NOT NULL,
  `sched_from` time NOT NULL,
  `sched_to` time NOT NULL,
  `sched_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prof_id` int(11) DEFAULT NULL,
  `subj_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `sect_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sched_id`, `sched_from`, `sched_to`, `sched_modified`, `prof_id`, `subj_id`, `room_id`, `sect_id`) VALUES
(33, '07:00:00', '10:00:00', '2020-08-08 18:55:37', 0, 8, 0, 3),
(36, '07:00:00', '09:00:00', '2020-08-08 18:55:37', 34, 7, 0, 3),
(37, '13:00:00', '15:00:00', '2020-08-08 18:55:37', 32, 0, 0, 0),
(38, '08:00:00', '10:00:00', '2020-08-08 18:53:14', 33, 0, 6, 3),
(39, '10:30:00', '12:00:00', '2020-08-08 18:50:28', 33, 8, 6, 0),
(44, '11:00:00', '13:00:00', '2020-08-08 18:55:37', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedules_day`
--

CREATE TABLE `schedules_day` (
  `id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `sched_day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules_day`
--

INSERT INTO `schedules_day` (`id`, `sched_id`, `sched_day`) VALUES
(69, 33, 'Monday'),
(81, 36, 'Tuesday'),
(82, 33, 'Wednesday'),
(83, 37, 'Tuesday'),
(84, 37, 'Thursday'),
(85, 33, 'Friday'),
(86, 36, 'Thursday'),
(87, 39, 'Tuesday'),
(88, 39, 'Thursday'),
(91, 44, 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `schedules_operation`
--

CREATE TABLE `schedules_operation` (
  `op_id` int(11) NOT NULL,
  `op_start` time NOT NULL DEFAULT '07:00:00',
  `op_end` time NOT NULL DEFAULT '17:00:00',
  `op_jump` enum('15','30','45','60') NOT NULL,
  `op_type` enum('prof','subj','room','sect') NOT NULL,
  `op_typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules_operation`
--

INSERT INTO `schedules_operation` (`op_id`, `op_start`, `op_end`, `op_jump`, `op_type`, `op_typeid`) VALUES
(1, '07:00:00', '17:00:00', '15', 'room', 1),
(2, '07:00:00', '17:00:00', '15', 'room', 2),
(3, '07:00:00', '15:00:00', '30', 'room', 3),
(4, '07:00:00', '17:00:00', '15', 'room', 4),
(5, '07:00:00', '10:00:00', '60', 'room', 5),
(6, '07:00:00', '15:00:00', '30', 'room', 6),
(7, '09:00:00', '20:00:00', '15', 'room', 7),
(8, '07:00:00', '17:00:00', '15', 'room', 8),
(9, '07:00:00', '17:00:00', '30', 'room', 9),
(10, '07:00:00', '17:00:00', '15', 'room', 10),
(11, '07:00:00', '17:00:00', '15', 'room', 11),
(12, '07:00:00', '17:00:00', '15', 'room', 12),
(13, '07:00:00', '17:00:00', '15', 'room', 13),
(14, '07:00:00', '17:00:00', '15', 'room', 14),
(15, '07:00:00', '17:00:00', '15', 'room', 15),
(16, '07:00:00', '17:00:00', '15', 'room', 16),
(17, '07:00:00', '17:00:00', '15', 'room', 17),
(18, '07:00:00', '17:00:00', '15', 'room', 18),
(19, '07:00:00', '17:00:00', '15', 'room', 19),
(20, '07:00:00', '17:00:00', '15', 'room', 20),
(21, '07:00:00', '17:00:00', '15', 'room', 21),
(22, '07:00:00', '17:00:00', '15', 'room', 22),
(23, '07:00:00', '17:00:00', '15', 'room', 23),
(24, '07:00:00', '17:00:00', '15', 'room', 24),
(25, '07:00:00', '17:00:00', '15', 'room', 25),
(26, '07:00:00', '17:00:00', '15', 'room', 26),
(27, '07:00:00', '17:00:00', '15', 'room', 27),
(28, '07:00:00', '17:00:00', '15', 'room', 28),
(29, '07:00:00', '17:00:00', '15', 'room', 29),
(30, '07:00:00', '17:00:00', '15', 'room', 30),
(31, '07:00:00', '17:00:00', '15', 'room', 31),
(32, '07:00:00', '17:00:00', '15', 'room', 32),
(33, '07:00:00', '17:00:00', '30', 'room', 33),
(34, '07:00:00', '17:00:00', '15', 'room', 34),
(35, '07:00:00', '17:00:00', '15', 'room', 35),
(36, '07:00:00', '17:00:00', '15', 'room', 36),
(37, '07:00:00', '17:00:00', '15', 'room', 37),
(38, '07:00:00', '17:00:00', '15', 'room', 38),
(39, '07:00:00', '17:00:00', '15', 'room', 39),
(40, '07:00:00', '17:00:00', '15', 'room', 40),
(41, '07:00:00', '17:00:00', '15', 'room', 41),
(42, '07:00:00', '17:00:00', '15', 'room', 42),
(43, '07:00:00', '10:00:00', '60', 'sect', 2),
(44, '07:00:00', '17:00:00', '30', 'sect', 3),
(45, '07:00:00', '17:00:00', '15', 'sect', 4),
(46, '07:00:00', '18:00:00', '60', 'sect', 5),
(47, '07:00:00', '17:00:00', '15', 'sect', 6),
(48, '07:00:00', '17:00:00', '15', 'sect', 7),
(49, '07:00:00', '17:00:00', '15', 'sect', 8),
(50, '07:00:00', '17:00:00', '15', 'sect', 9),
(51, '07:00:00', '17:00:00', '15', 'sect', 10),
(58, '07:00:00', '17:00:00', '15', 'subj', 5),
(59, '07:00:00', '17:00:00', '15', 'subj', 6),
(60, '07:00:00', '17:00:00', '15', 'subj', 7),
(61, '07:00:00', '17:00:00', '15', 'subj', 8),
(62, '07:00:00', '17:00:00', '15', 'subj', 9),
(63, '07:00:00', '17:00:00', '15', 'subj', 10),
(64, '07:00:00', '17:00:00', '15', 'subj', 11),
(65, '07:00:00', '17:00:00', '15', 'subj', 12),
(66, '07:00:00', '17:00:00', '15', 'subj', 13),
(67, '07:00:00', '17:00:00', '15', 'subj', 14),
(68, '07:00:00', '17:00:00', '15', 'subj', 15),
(69, '07:00:00', '17:00:00', '15', 'subj', 16),
(70, '07:00:00', '17:00:00', '15', 'subj', 17),
(71, '07:00:00', '17:00:00', '15', 'subj', 18),
(72, '07:00:00', '17:00:00', '15', 'subj', 19),
(73, '07:00:00', '17:00:00', '15', 'subj', 20),
(74, '07:00:00', '17:00:00', '15', 'subj', 21),
(75, '07:00:00', '17:00:00', '15', 'subj', 22),
(76, '07:00:00', '17:00:00', '15', 'subj', 23),
(77, '07:00:00', '17:00:00', '15', 'subj', 24),
(78, '07:00:00', '17:00:00', '15', 'subj', 25),
(79, '07:00:00', '17:00:00', '15', 'subj', 26),
(80, '07:00:00', '17:00:00', '15', 'subj', 27),
(81, '07:00:00', '17:00:00', '15', 'subj', 28),
(82, '07:00:00', '17:00:00', '15', 'subj', 29),
(83, '07:00:00', '17:00:00', '15', 'subj', 30),
(84, '07:00:00', '17:00:00', '15', 'subj', 31),
(85, '07:00:00', '17:00:00', '15', 'subj', 32),
(86, '07:00:00', '17:00:00', '15', 'subj', 33),
(87, '07:00:00', '17:00:00', '15', 'subj', 34),
(88, '07:00:00', '17:00:00', '15', 'subj', 35),
(89, '07:00:00', '17:00:00', '15', 'subj', 36),
(90, '07:00:00', '17:00:00', '15', 'subj', 37),
(91, '07:00:00', '17:00:00', '15', 'subj', 38),
(92, '07:00:00', '17:00:00', '15', 'subj', 39),
(93, '07:00:00', '17:00:00', '15', 'subj', 40),
(94, '07:00:00', '17:00:00', '15', 'subj', 41),
(95, '07:00:00', '17:00:00', '15', 'subj', 42),
(96, '07:00:00', '17:00:00', '15', 'subj', 43),
(97, '07:00:00', '17:00:00', '15', 'subj', 44),
(98, '07:00:00', '17:00:00', '15', 'subj', 45),
(99, '07:00:00', '17:00:00', '15', 'subj', 46),
(100, '07:00:00', '17:00:00', '15', 'subj', 47),
(101, '07:00:00', '17:00:00', '15', 'subj', 48),
(102, '07:00:00', '17:00:00', '15', 'subj', 49),
(103, '07:00:00', '17:00:00', '15', 'subj', 50),
(104, '07:00:00', '17:00:00', '15', 'subj', 51),
(105, '07:00:00', '17:00:00', '15', 'subj', 52),
(106, '07:00:00', '17:00:00', '15', 'subj', 53),
(107, '07:00:00', '17:00:00', '15', 'subj', 54),
(108, '07:00:00', '17:00:00', '15', 'subj', 55),
(109, '07:00:00', '17:00:00', '15', 'subj', 56),
(110, '07:00:00', '17:00:00', '15', 'subj', 57),
(111, '07:00:00', '17:00:00', '15', 'subj', 58),
(112, '07:00:00', '17:00:00', '15', 'subj', 59),
(113, '07:00:00', '17:00:00', '15', 'subj', 60),
(114, '07:00:00', '17:00:00', '15', 'subj', 61),
(115, '07:00:00', '17:00:00', '15', 'subj', 62),
(116, '07:00:00', '17:00:00', '15', 'subj', 63),
(117, '07:00:00', '17:00:00', '15', 'subj', 64),
(118, '07:00:00', '17:00:00', '15', 'subj', 65),
(119, '07:00:00', '17:00:00', '15', 'subj', 66),
(120, '07:00:00', '17:00:00', '15', 'subj', 67),
(121, '07:00:00', '17:00:00', '15', 'subj', 68),
(122, '07:00:00', '17:00:00', '15', 'subj', 69),
(123, '07:00:00', '17:00:00', '15', 'subj', 70),
(124, '07:00:00', '17:00:00', '15', 'subj', 71),
(125, '07:00:00', '17:00:00', '15', 'subj', 72),
(126, '07:00:00', '17:00:00', '15', 'subj', 73),
(127, '07:00:00', '17:00:00', '15', 'subj', 74),
(128, '07:00:00', '17:00:00', '15', 'subj', 75),
(129, '07:00:00', '17:00:00', '15', 'subj', 76),
(130, '07:00:00', '17:00:00', '15', 'subj', 77),
(131, '07:00:00', '17:00:00', '15', 'subj', 78),
(132, '07:00:00', '17:00:00', '15', 'subj', 79),
(133, '07:00:00', '17:00:00', '15', 'subj', 80),
(134, '07:00:00', '17:00:00', '15', 'subj', 81),
(135, '07:00:00', '17:00:00', '15', 'subj', 82),
(136, '07:00:00', '17:00:00', '15', 'subj', 83),
(137, '07:00:00', '17:00:00', '15', 'subj', 84),
(138, '07:00:00', '17:00:00', '15', 'subj', 85),
(139, '07:00:00', '17:00:00', '15', 'subj', 86),
(140, '07:00:00', '17:00:00', '15', 'subj', 87),
(141, '07:00:00', '17:00:00', '15', 'subj', 88),
(142, '07:00:00', '17:00:00', '15', 'subj', 89),
(143, '07:00:00', '17:00:00', '15', 'subj', 90),
(144, '07:00:00', '17:00:00', '15', 'subj', 91),
(145, '07:00:00', '17:00:00', '15', 'subj', 92),
(146, '07:00:00', '17:00:00', '15', 'subj', 93),
(147, '07:00:00', '17:00:00', '15', 'subj', 94),
(148, '07:00:00', '17:00:00', '15', 'subj', 95),
(149, '07:00:00', '17:00:00', '15', 'subj', 96),
(150, '07:00:00', '17:00:00', '15', 'subj', 97),
(151, '07:00:00', '17:00:00', '15', 'subj', 98),
(152, '07:00:00', '17:00:00', '15', 'subj', 99),
(153, '07:00:00', '17:00:00', '15', 'subj', 100),
(154, '07:00:00', '17:00:00', '15', 'subj', 101),
(155, '07:00:00', '17:00:00', '15', 'subj', 102),
(156, '07:00:00', '17:00:00', '15', 'subj', 103),
(157, '07:00:00', '17:00:00', '15', 'subj', 104),
(158, '07:00:00', '17:00:00', '15', 'subj', 105),
(159, '07:00:00', '17:00:00', '15', 'subj', 106),
(160, '07:00:00', '17:00:00', '15', 'subj', 107),
(161, '07:00:00', '17:00:00', '15', 'subj', 108),
(162, '07:00:00', '17:00:00', '15', 'subj', 109),
(163, '07:00:00', '17:00:00', '15', 'subj', 110),
(164, '07:00:00', '17:00:00', '15', 'subj', 111),
(165, '07:00:00', '17:00:00', '15', 'subj', 112),
(166, '07:00:00', '17:00:00', '15', 'subj', 113),
(167, '07:00:00', '17:00:00', '15', 'subj', 114),
(168, '07:00:00', '17:00:00', '15', 'subj', 115),
(169, '07:00:00', '17:00:00', '15', 'subj', 116),
(170, '07:00:00', '17:00:00', '15', 'subj', 117),
(171, '07:00:00', '17:00:00', '15', 'subj', 118),
(172, '07:00:00', '17:00:00', '15', 'subj', 119),
(173, '07:00:00', '17:00:00', '15', 'subj', 120),
(174, '07:00:00', '17:00:00', '15', 'subj', 121),
(175, '07:00:00', '17:00:00', '15', 'subj', 122),
(176, '07:00:00', '17:00:00', '15', 'subj', 123),
(177, '07:00:00', '17:00:00', '15', 'subj', 124),
(178, '07:00:00', '17:00:00', '15', 'subj', 125),
(179, '07:00:00', '17:00:00', '15', 'subj', 126),
(180, '07:00:00', '17:00:00', '15', 'subj', 127),
(181, '07:00:00', '17:00:00', '15', 'subj', 128),
(182, '07:00:00', '17:00:00', '15', 'subj', 129),
(183, '07:00:00', '17:00:00', '15', 'subj', 130),
(184, '07:00:00', '17:00:00', '15', 'subj', 131),
(185, '07:00:00', '17:00:00', '15', 'subj', 132),
(186, '07:00:00', '17:00:00', '15', 'subj', 133),
(187, '07:00:00', '17:00:00', '15', 'subj', 134),
(188, '07:00:00', '17:00:00', '15', 'subj', 135),
(189, '07:00:00', '17:00:00', '15', 'subj', 136),
(190, '07:00:00', '17:00:00', '15', 'subj', 137),
(191, '07:00:00', '17:00:00', '15', 'subj', 138),
(192, '07:00:00', '17:00:00', '15', 'subj', 139),
(193, '07:00:00', '17:00:00', '15', 'subj', 140),
(194, '07:00:00', '17:00:00', '15', 'subj', 141),
(195, '07:00:00', '17:00:00', '15', 'subj', 142),
(196, '07:00:00', '17:00:00', '15', 'subj', 143),
(197, '07:00:00', '17:00:00', '15', 'subj', 144),
(198, '07:00:00', '17:00:00', '15', 'subj', 145),
(199, '07:00:00', '17:00:00', '15', 'subj', 146),
(200, '07:00:00', '17:00:00', '15', 'subj', 147),
(201, '07:00:00', '17:00:00', '15', 'subj', 148),
(202, '07:00:00', '17:00:00', '15', 'subj', 149),
(203, '07:00:00', '17:00:00', '15', 'subj', 150),
(204, '07:00:00', '17:00:00', '15', 'subj', 151),
(205, '07:00:00', '17:00:00', '15', 'subj', 152),
(206, '07:00:00', '17:00:00', '15', 'subj', 153),
(207, '07:00:00', '17:00:00', '15', 'subj', 154),
(208, '07:00:00', '17:00:00', '15', 'subj', 155),
(209, '07:00:00', '17:00:00', '15', 'subj', 156),
(210, '07:00:00', '17:00:00', '15', 'subj', 157),
(211, '07:00:00', '17:00:00', '15', 'subj', 158),
(212, '07:00:00', '17:00:00', '15', 'subj', 159),
(213, '07:00:00', '17:00:00', '15', 'subj', 160),
(214, '07:00:00', '17:00:00', '15', 'subj', 161),
(215, '07:00:00', '17:00:00', '15', 'subj', 162),
(216, '07:00:00', '17:00:00', '15', 'subj', 163),
(217, '07:00:00', '17:00:00', '15', 'subj', 164),
(218, '07:00:00', '17:00:00', '15', 'subj', 165),
(219, '07:00:00', '17:00:00', '15', 'subj', 166),
(220, '07:00:00', '17:00:00', '15', 'subj', 167),
(221, '07:00:00', '17:00:00', '15', 'subj', 168),
(222, '07:00:00', '17:00:00', '15', 'subj', 169),
(223, '07:00:00', '17:00:00', '15', 'subj', 170),
(224, '07:00:00', '17:00:00', '15', 'subj', 171),
(225, '07:00:00', '17:00:00', '15', 'subj', 172),
(226, '07:00:00', '17:00:00', '15', 'subj', 173),
(313, '07:00:00', '17:00:00', '15', 'prof', 31),
(314, '07:00:00', '17:00:00', '30', 'prof', 32),
(315, '07:00:00', '18:00:00', '15', 'prof', 33),
(316, '07:00:00', '17:00:00', '15', 'prof', 34),
(317, '07:00:00', '17:00:00', '15', 'prof', 35),
(318, '07:00:00', '17:00:00', '15', 'prof', 36),
(319, '07:00:00', '17:00:00', '15', 'prof', 37),
(320, '07:00:00', '17:00:00', '15', 'prof', 38),
(321, '07:00:00', '17:00:00', '15', 'prof', 39),
(322, '07:00:00', '17:00:00', '15', 'prof', 40),
(323, '07:00:00', '17:00:00', '15', 'prof', 31),
(324, '07:00:00', '17:00:00', '15', 'prof', 32),
(325, '07:00:00', '17:00:00', '15', 'prof', 33),
(326, '07:00:00', '17:00:00', '15', 'prof', 34),
(327, '07:00:00', '17:00:00', '15', 'prof', 35),
(328, '07:00:00', '17:00:00', '15', 'prof', 36),
(329, '07:00:00', '17:00:00', '15', 'prof', 37),
(330, '07:00:00', '17:00:00', '15', 'prof', 38),
(331, '07:00:00', '17:00:00', '15', 'prof', 39),
(332, '07:00:00', '17:00:00', '15', 'prof', 40),
(333, '07:00:00', '17:00:00', '15', 'prof', 41),
(334, '07:00:00', '17:00:00', '15', 'prof', 42),
(335, '07:00:00', '17:00:00', '15', 'prof', 43),
(336, '07:00:00', '17:00:00', '15', 'room', 43),
(337, '07:00:00', '17:00:00', '15', 'subj', 175);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sect_id` int(11) NOT NULL,
  `sect_name` varchar(50) NOT NULL,
  `sect_year` int(11) NOT NULL,
  `sect_sem` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sect_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sect_id`, `sect_name`, `sect_year`, `sect_sem`, `dept_id`, `sect_active`) VALUES
(2, 'BSIT602', 3, 1, 47, 1),
(3, 'BSIT701', 4, 1, 49, 1),
(4, 'BSIT103', 1, 1, 49, 0),
(5, 'BSIT201', 1, 2, 49, 1),
(6, 'BSIT301', 2, 1, 49, 1),
(7, 'BSIT401', 2, 2, 49, 1),
(8, 'BSIT801', 4, 2, 49, 1),
(9, 'BSIT501', 3, 1, 49, 1),
(10, 'BSIT601', 3, 2, 49, 1),
(11, 'BSIT111111', 3, 1, 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subj_id` int(11) NOT NULL,
  `subj_code` varchar(12) NOT NULL,
  `subj_desc` text NOT NULL,
  `units` int(11) NOT NULL,
  `dept_id` enum('Tertiarty','SHS') NOT NULL,
  `subj_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subj_id`, `subj_code`, `subj_desc`, `units`, `dept_id`, `subj_active`) VALUES
(5, 'MAT1003', 'Algebra', 3, 'Tertiarty', 0),
(6, 'COM1021', 'Communication Arts 1', 3, 'Tertiarty', 1),
(7, 'IT1029', 'Computer Fundamentals (Lec)', 2, 'Tertiarty', 0),
(8, 'IT1029L', 'Computer Fundamentals (Lab)', 1, 'Tertiarty', 0),
(9, 'IT1040', 'Computer Programming 1 (Lec)', 3, 'Tertiarty', 1),
(10, 'IT1040L', 'Computer Programming 1 (Lab)', 1, 'Tertiarty', 1),
(11, 'MAT1032', 'Math Plus', 1, 'Tertiarty', 1),
(12, 'NSTP1001', 'Civic Welfare Training Service 1', 3, 'Tertiarty', 1),
(13, 'PE1001', 'Physical Education 1', 2, 'Tertiarty', 1),
(14, 'SOC1030', 'Professional Ethics with Values Formation', 3, 'Tertiarty', 1),
(15, 'COM1024', 'Communication Arts 2', 3, 'Tertiarty', 1),
(16, 'IT1043', 'Computer Programming 2 (Lec)', 3, 'Tertiarty', 1),
(17, 'IT1043L', 'Computer Programming 2 (Lab)', 1, 'Tertiarty', 0),
(18, 'IT1060', 'Data Structure (Lec)', 3, 'Tertiarty', 1),
(19, 'IT1060L', 'Data Structure (Lab)', 1, 'Tertiarty', 1),
(20, 'IT1069', 'Discrete Structures', 3, 'Tertiarty', 1),
(21, 'NSTP1002', 'Civic Welfare Training Service 2', 3, 'Tertiarty', 1),
(22, 'COM1056', 'Introduction to Arts', 3, 'Tertiarty', 1),
(23, 'PE1003', 'Physical Education 2', 2, 'Tertiarty', 1),
(24, 'MAT1051', 'Trigonometry', 3, 'Tertiarty', 1),
(25, 'COM1027', 'Communication Arts 3', 3, 'Tertiarty', 1),
(26, 'IT1046', 'Computer Programming 3 (Lec)', 3, 'Tertiarty', 1),
(27, 'IT1046L', 'Computer Programming 3 (Lab)', 1, 'Tertiarty', 1),
(28, 'IT1097', 'Logic Design and Switching', 3, 'Tertiarty', 1),
(29, 'SOC1024', 'Philippine History, Government and Constitution', 3, 'Tertiarty', 1),
(30, 'PE1005', 'Physical Education 3', 2, 'Tertiarty', 1),
(31, 'SCI1018', 'Physics (Lec)', 3, 'Tertiarty', 1),
(32, 'SCI1018L', 'Physics 1 (Lab)', 1, 'Tertiarty', 1),
(33, 'MAT1042', 'Probability and Statistic', 3, 'Tertiarty', 1),
(34, 'SOC1040', 'Society, Culture and Information Technology with Family Planning', 3, 'Tertiarty', 1),
(35, 'COM1031', 'Communication Arts 4', 3, 'Tertiarty', 1),
(36, 'IT1038', 'Computer Organization and Assembly Language (Lec)', 3, 'Tertiarty', 1),
(37, 'IT1038L', 'Computer Organization and Assembly Language (Lab)', 1, 'Tertiarty', 1),
(38, 'SOC1026', 'Philosophy of Man', 3, 'Tertiarty', 1),
(39, 'PE1007', 'Physical Education 4', 2, 'Tertiarty', 1),
(40, 'SCI1020', 'Physics 2 (Lec)', 3, 'Tertiarty', 1),
(41, 'SCI1020L', 'Physics 2 (Lab)', 1, 'Tertiarty', 1),
(42, 'IT1134', 'System Analysis and Design', 3, 'Tertiarty', 1),
(43, 'IT1142', 'Theory of Database System (Lec)', 3, 'Tertiarty', 1),
(44, 'IT1142L', 'Theory of Database System (Lab)', 1, 'Tertiarty', 1),
(45, 'BUS1004', 'Accounting Principles', 3, 'Tertiarty', 1),
(46, 'IT1009', 'Advance Database System (Lec)', 2, 'Tertiarty', 1),
(47, 'IT1009L', 'Advance Database System (Lab)', 1, 'Tertiarty', 1),
(48, 'FIL1001', 'Komunikasyon sa Akademikong Filipino', 3, 'Tertiarty', 1),
(49, 'IT1126', 'Operation Research', 3, 'Tertiarty', 1),
(50, 'IT1124', 'Operating System', 3, 'Tertiarty', 1),
(51, 'IT1132', 'Software Engineering (Lec)', 3, 'Tertiarty', 1),
(52, 'IT1132L', 'Software Engineering (Lab)', 1, 'Tertiarty', 1),
(53, 'IT1151', 'Web Programming (Lec)', 2, 'Tertiarty', 1),
(54, 'IT1151L', 'Web Programming (Lab)', 1, 'Tertiarty', 1),
(55, 'IT1034', 'Computer Networks (Lec)', 3, 'Tertiarty', 1),
(56, 'IT1034L', 'Computer Networks (Lab)', 1, 'Tertiarty', 1),
(57, 'SOC1006', 'Economics with Taxation and Agrarian Reform', 3, 'Tertiarty', 1),
(58, 'FIL1003', 'Pagbasa at Pagsulat Tungo sa Pananaaliksik', 3, 'Tertiarty', 1),
(59, 'IT1107', 'Multimedia System (Lec)', 3, 'Tertiarty', 1),
(60, 'IT1107L', 'Multimedia System (Lab)', 1, 'Tertiarty', 1),
(61, 'SOC1016', 'Life and Works of Rizal', 3, 'Tertiarty', 1),
(62, 'IT1031', 'Computer Graphics (Lec)', 2, 'Tertiarty', 1),
(63, 'IT1031L', 'Computer Graphics (Lab)', 2, 'Tertiarty', 1),
(64, 'IT1130', 'Project Management', 3, 'Tertiarty', 1),
(65, 'SOC1033', 'Psychology with Drugs, HIV/AIDS and SARS Education', 3, 'Tertiarty', 1),
(66, 'IT1091', 'IT Special Project (Thesis) (Lec)', 2, 'Tertiarty', 1),
(67, 'IT1091L', 'IT Special Project (Thesis) (Lab)', 1, 'Tertiarty', 1),
(68, 'COM1071', 'Philippines Literature', 3, 'Tertiarty', 1),
(69, 'BUS1179', 'Technopreneurship', 3, 'Tertiarty', 1),
(70, 'COM1079', 'World Literature', 3, 'Tertiarty', 1),
(71, 'COM1053', 'Foreign Language', 3, 'Tertiarty', 1),
(72, 'IT1102', 'Mobile Application Development (Lec)', 2, 'Tertiarty', 1),
(73, 'IT1102L', 'Mobile Application Development (Lab)', 1, 'Tertiarty', 1),
(74, 'IT1152', 'IT Practicum', 9, 'Tertiarty', 1),
(75, 'OC', 'Oral Communication', 80, 'Tertiarty', 1),
(76, 'GM', 'General Mathematics', 80, 'Tertiarty', 1),
(77, 'Literature', '21st Century Literature form the Philippines and the World', 80, 'Tertiarty', 1),
(78, 'MIT', 'Media and Information Literacy', 80, 'Tertiarty', 1),
(79, 'IPHP', 'Introduction to the Philosophy of the Human Person', 80, 'Tertiarty', 1),
(80, 'PE1', 'Physical Education and Health 1', 20, 'Tertiarty', 1),
(81, 'OM', 'Organization and Management', 80, 'Tertiarty', 1),
(82, 'BM', 'Business Mathematics', 80, 'Tertiarty', 1),
(83, 'RW', 'Reading and Writing', 80, 'Tertiarty', 1),
(84, 'SP', 'Statistic and Probability', 80, 'Tertiarty', 1),
(85, 'UCSP', 'Understanding Culture , Society and Politics', 80, 'Tertiarty', 1),
(86, 'ELS', 'Earth and Life Science', 80, 'Tertiarty', 1),
(87, 'FIL1', 'Komunikasyon at Pananaliksik sa Wika at kulturang Pilipino', 80, 'Tertiarty', 1),
(88, 'PR1', 'Practical Research 1', 80, 'Tertiarty', 1),
(89, 'PM', 'Principles of Marketing', 80, 'Tertiarty', 1),
(90, 'FABM1', 'Fundamentals of Accountancy, Business and Management 1', 80, 'Tertiarty', 1),
(91, 'CPAR', 'Contemporary Philippine Arts from the Regions', 80, 'Tertiarty', 1),
(92, 'PE4', 'Physical Education and Health 4', 20, 'Tertiarty', 1),
(93, 'ET', 'Empowerment Technologies', 80, 'Tertiarty', 1),
(94, 'ENTREP', 'Entrepreneurship', 80, 'Tertiarty', 1),
(95, 'INM', 'Inquiries, Investigation and Immersion', 80, 'Tertiarty', 1),
(96, 'AECO', 'Applied Economics', 80, 'Tertiarty', 1),
(97, 'BESR', 'Business Ethics and Social Responsibility', 80, 'Tertiarty', 1),
(98, 'BES', 'Work Immersion/Research/Career Advocacy/Culminating Activity', 80, 'Tertiarty', 1),
(99, 'PRECal', 'Pre-Calculus', 80, 'Tertiarty', 1),
(100, 'GENBIO', 'General Biology 1', 80, 'Tertiarty', 1),
(101, 'BCAL', 'Basic Calculus', 80, 'Tertiarty', 1),
(102, 'GENBIO2', 'General Biology 2', 80, 'Tertiarty', 1),
(103, 'PE2', 'Physical Education and Health 2', 20, 'Tertiarty', 1),
(104, 'PD', 'Personal Development', 80, 'Tertiarty', 1),
(105, 'FIL2', 'Pagbasa at Pagsuri ng Iba\'t Ibang Teksto Tungo sa Pananaliksik', 80, 'Tertiarty', 1),
(106, 'PS', 'Physical Science', 80, 'Tertiarty', 1),
(107, 'PE3', 'Physical Education and Health 3', 20, 'Tertiarty', 1),
(108, 'PR2', 'Practical Research 2', 80, 'Tertiarty', 1),
(109, 'FIL3', 'Filipino sa Piling Larangan', 80, 'Tertiarty', 1),
(110, 'EAPP', 'English for Academic and Professional Purposes', 80, 'Tertiarty', 1),
(111, 'BF', 'Business Finance', 80, 'Tertiarty', 1),
(112, 'FABM2', 'Fundamentals of Accountancy, Business and Management 2', 80, 'Tertiarty', 1),
(113, 'DRRR', 'Disaster Readiness and Risk Reduction', 80, 'Tertiarty', 1),
(114, 'PHYSICS1', 'General Physics 1', 80, 'Tertiarty', 1),
(115, 'GENCHE1', 'General Chemistry1', 80, 'Tertiarty', 1),
(116, 'PHYSICS2', 'General Physics 2', 80, 'Tertiarty', 1),
(117, 'GENCHE2', 'General Chemistry2', 80, 'Tertiarty', 1),
(118, 'IWRBS', 'Introduction to World Religions and Belief System', 80, 'Tertiarty', 0),
(119, 'DISS', 'Discipline and Ideas in the Social Sciences', 80, 'Tertiarty', 1),
(120, 'CW', 'Creative Writing', 80, 'Tertiarty', 1),
(121, 'CN', 'Creative Nonfiction', 80, 'Tertiarty', 1),
(122, 'PPG', 'Philippine Politics and Governance', 80, 'Tertiarty', 1),
(123, 'TNCT', 'Trends, Networks and Critical Thingking in the 21st Century', 80, 'Tertiarty', 1),
(124, 'CESC', 'Community Engagement Solidarity and Citizenship', 80, 'Tertiarty', 1),
(125, 'COMPRO1', 'Computer Programming 1 (Java/Intro to Programming)', 80, 'Tertiarty', 1),
(126, 'COMPRO2', 'Computer Programming 2 (HTML,CSS/Web Interfaces)', 80, 'Tertiarty', 1),
(127, 'COMPRO3', 'Computer Programming 3 (Intermediate Java Programming)', 80, 'Tertiarty', 1),
(128, 'MAP', 'Mobile App Programming 1 (Android OS and Java)', 80, 'Tertiarty', 1),
(129, 'COMPRO4', 'Computer Programming 4 (C#/Intro to .Net Programming)', 80, 'Tertiarty', 1),
(130, 'COMPRO5', 'Computer Programming 5 (JavaScript,jQuery)', 80, 'Tertiarty', 1),
(131, 'COMPRO6', 'Computer Programming 6 (SQL/Intro to ASP.Net)', 80, 'Tertiarty', 1),
(132, 'MAP2', 'Mobile App Programming 1 (Android OS and .NET Framework)', 80, 'Tertiarty', 1),
(133, '2D', '2D Concept', 80, 'Tertiarty', 1),
(134, 'BDD', 'Basic Drawing and Drafting', 80, 'Tertiarty', 1),
(135, 'FCD', 'Fundamental of Computer Drawing', 80, 'Tertiarty', 1),
(136, 'DGDIM', 'Digital Graphics Design and Image Manipulation', 80, 'Tertiarty', 1),
(137, 'DP', 'Digital Photography', 80, 'Tertiarty', 1),
(138, 'CA', 'Computer Animation', 80, 'Tertiarty', 1),
(139, 'DVAP', 'Digital Video and Audio Production', 80, 'Tertiarty', 1),
(140, '3D', '3D Modeling', 80, 'Tertiarty', 1),
(141, 'CEDD', 'Computer Engineering Drafting and Design', 80, 'Tertiarty', 1),
(142, 'FEE', 'Fundamentals of Electricity and Electronics', 80, 'Tertiarty', 1),
(143, 'CHF', 'Computer Hardware Fundamentals', 80, 'Tertiarty', 1),
(144, 'BCT', 'Basic Computer Technology', 80, 'Tertiarty', 1),
(145, 'EC', 'Electronic and Communications', 80, 'Tertiarty', 1),
(146, 'DC', 'Data Communications', 80, 'Tertiarty', 1),
(147, 'BT', 'Broadband Technology', 80, 'Tertiarty', 1),
(148, 'COMNETS', 'Computer Networks', 80, 'Tertiarty', 1),
(149, 'RE', 'Radio Electronics', 80, 'Tertiarty', 1),
(150, 'TV', 'TV Electronics', 80, 'Tertiarty', 1),
(151, 'MT', 'Mobile Technology', 80, 'Tertiarty', 1),
(152, 'TGE', 'Tour Guiding and Escorting', 80, 'Tertiarty', 1),
(153, 'ITTI', 'Introduction to Travel and Tourism Industry', 80, 'Tertiarty', 1),
(154, 'ITS', 'Introduction to travel  and Services', 80, 'Tertiarty', 1),
(155, 'TSMP', 'Tourism Sales and Marketing Principles', 80, 'Tertiarty', 1),
(156, 'TIM', 'Tourism Information Management', 80, 'Tertiarty', 1),
(157, 'IETC', 'Internet and E-Travel Commerce', 80, 'Tertiarty', 1),
(158, 'IFBO', 'Introduction to Food and Beverages Operations', 80, 'Tertiarty', 1),
(159, 'NABC', 'Non-alcoholic Beverages Concoction', 80, 'Tertiarty', 1),
(160, 'FBS', 'Food and Beverages Services', 80, 'Tertiarty', 1),
(161, 'CC', 'Coffee Concoction', 80, 'Tertiarty', 1),
(162, 'IBMO', 'Introduction to Bar Management and Operation', 80, 'Tertiarty', 1),
(163, 'CMF', 'Cocktail Mixology with Flairtending', 80, 'Tertiarty', 1),
(164, 'BSM', 'Bar Services Management', 80, 'Tertiarty', 1),
(165, 'WSM', 'Wine Service Management', 80, 'Tertiarty', 0),
(166, 'ICO', 'Introduction to Culinary Operations', 80, 'Tertiarty', 0),
(167, 'BFP101', 'Basic Food Production 101', 80, 'Tertiarty', 0),
(168, 'BFP102', 'Basic Food Production 102', 80, 'Tertiarty', 0),
(169, 'BFP103', 'Basic Food Production 103', 80, 'Tertiarty', 0),
(170, 'ICC', 'Introduction to Commercial Cookery', 80, 'Tertiarty', 0),
(171, 'LIC', 'Loca and Internation Cuisines', 80, 'Tertiarty', 0),
(172, 'CMCS', 'Catering Management and Control System', 80, 'Tertiarty', 0),
(173, 'IBPP', 'Introduction to Bread and Pastry Production', 80, 'Tertiarty', 0),
(175, 'IDK', 'I Don\'t Know', 3, 'Tertiarty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` text DEFAULT NULL,
  `password` text NOT NULL,
  `role_level` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role_level`, `is_active`) VALUES
(1, 'Admin', 'hushsua@gmal.com', '$2y$10$BMruBXjOt.6n8tAyGrCkzuzMq2pC6aEXYdb7E/4mV1F9MsbQDU0CS', 4, 1),
(28, '3232532', '', '$2y$10$/wGSM4yn76j1Tqtpp2nP8u0YnswezJE/8MIgP86dJgKAJR87oC9AO', 1, 0),
(29, '88888888', '', '$2y$10$HNFr/Uwf0NYTo.hsgH3ae.K5Hbjo8J4t4E.SbXttEew3bWjCGXMxW', 1, 1),
(30, '0200006652', 'chris_tine09@yahoo.com', '$2y$10$WpVKlFearFw1GuG/JVZOC.sH24NUekp0OOwE6qzfJeSRpLeLRroPi', 1, 0),
(31, 'darylpthomasss', '', '$2y$10$7m9yog4MzdGF6/MnFkTfB.1gDO8f2PkkZ4QVf2j7wiDHcfcmWrIue', 3, 0),
(32, 'hellow', 'hahahahha@gmail.com', '$2y$10$RfObYnIiPfEGoZbQa5HpgejqNtlmKdOTXgYLdBEHuTDIXtY8eMNbS', 1, 1),
(33, 'hakdtog', 'hahsdhja@gmail.com', '$2y$10$bYQ9LxqUVB8tbkrY5W5NtOgEJwjMrlqi73yzWBgV3iaInNfmAU6ta', 1, 1),
(34, '987654321', '', '$2y$10$5MipXSVUGbftbWEwk1wYkeTPGG5B7KCV0TzxBXR79T1hjbnmGAt7i', 1, 1),
(35, '147258369', '', '$2y$10$nZUlO7QaxjYsTyjSzm5EcudUa9/3I8nhJUDzrPN5DS6/SSzsEFLuO', 1, 1),
(36, '963852741', '', '$2y$10$jjFqbgPloHcZcVLHsoFDFOcmOjOL.SlXLJzQ4xeT83ora8yXXF/XO', 1, 1),
(37, '852147963', '', '$2y$10$1CMi8YGI1QtcEhP01JT/q.iyVdmUFqU/zubjB8AyeF.fy.YPSv/w.', 1, 1),
(38, '195375465', '', '$2y$10$0XXOng7q6MUnuwRyWbGIjuX63iEpSpyD9tR.luH61.vTUzmwd7.wi', 1, 0),
(39, '1236544789', '', '$2y$10$jkzqN9in/voKfVB9RDYzoOMIrtDp.hXZkJqmIfL/LkunAep7ehq1.', 1, 1),
(40, 'isabelthomas', 'Isabelthomas@yahoo.com', '$2y$10$l/UWyaBSzin9GsNvOF7nSuSJmy33H03Br0TpedUxEMkKz1SNULhOa', 1, 1),
(41, '      ', '   ', '$2y$10$eJ/8PRYHNMtTfrPbVlVYNuerOYEd.uoqbHVPgKtDQVxshc4KQ.jmq', 1, 0),
(42, 'b    ', '   ', '$2y$10$zoovyQ3qJpb63/vgOAjH1upII/JgfTwYEvIKiNBxQdeFDuASxZjbS', 1, 0),
(43, 'Test', 'Test@example.com', '$2y$10$.6FbBvxSVp6Lg6zD2MhDs.oOy9d3XxZ/fRvP5CrR6Wpsacf6dKJfS', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rm_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `schedules_day`
--
ALTER TABLE `schedules_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules_operation`
--
ALTER TABLE `schedules_operation`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sect_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `schedules_day`
--
ALTER TABLE `schedules_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `schedules_operation`
--
ALTER TABLE `schedules_operation`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
