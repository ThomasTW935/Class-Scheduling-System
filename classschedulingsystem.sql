-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 05:07 PM
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
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `name`, `dept_id`, `is_active`) VALUES
(1, 'BSIT(OLD)', 49, 1),
(2, 'BSIT(NEW)', 49, 1),
(3, 'BSIT', 0, 1),
(4, 'asdasd', 0, 1),
(5, 'asdasd', 49, 0),
(6, 'eqwewqe', 49, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_to_sections`
--

CREATE TABLE `checklist_to_sections` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `chk_id` int(11) NOT NULL,
  `sect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(79, 'Culin', 'Culinary Arts', 'strand', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `type` enum('course','strand') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `description`, `type`) VALUES
(1, 'Gr.11', 'Grade 11', 'strand'),
(2, 'Gr.12', 'Grade 12', 'strand'),
(3, '1st1sem', '1st Year First Semester', 'course'),
(4, '1st2sem', '1st Year Second Semester', 'course'),
(5, '2nd1sem', '2nd Year First Semester', 'course'),
(6, '2nd2sem', '2st Year Second Semester', 'course'),
(7, '3rd1sem', '3rd Year First Semester', 'course'),
(8, '3rd2sem', '3rd Year Second Semester', 'course'),
(9, '4th1sem', '4th Year First Semester', 'course'),
(10, '4th2sem', '4th Year Second Semester', 'course');

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
(32, 123456789, 'Thomas', 'Daryyl', 'P', '', 43, 29, 1, 'Thomas.5f46a0044a035.jpg'),
(33, 2000066525, 'Aparato', 'Christine', '', '', 43, 30, 1, NULL),
(34, 89896565, 'Mendoza', 'Setty', 'G', '', 51, 32, 1, NULL),
(35, 987654321, 'De peralta', 'hush', '', '', 51, 34, 1, NULL),
(36, 147258369, 'Legarde', 'Dianne', '', '', 43, 35, 1, NULL),
(37, 963852741, 'Abalos', 'Romabel ', 'S', '', 43, 36, 1, NULL),
(38, 852147963, 'Pacleb', 'Roland', 'P', '', 51, 37, 1, NULL),
(39, 195375465, 'Gajasan', 'Jonathan', 'F', '', 43, 38, 1, NULL),
(40, 1236544789, 'Teruel', 'Jasper Jeric', 'B', '', 43, 39, 0, NULL),
(41, 14562487, 'Thomas', 'Isab', 'P', '', 43, 40, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rm_id` int(11) NOT NULL,
  `rm_name` varchar(30) NOT NULL,
  `rm_desc` text NOT NULL,
  `rm_floor` enum('Ground Floor','2nd Floor','3rd Floor','4th Floor','5th Floor','6th Floor','7th Floor','8th Floor') NOT NULL,
  `rm_capacity` smallint(6) NOT NULL,
  `rm_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rm_id`, `rm_name`, `rm_desc`, `rm_floor`, `rm_capacity`, `rm_active`) VALUES
(3, '101', 'Computer Laborato', '2nd Floor', 30, 0),
(5, '201', 'Class Room', '2nd Floor', 30, 1),
(6, '202', 'Class Room', '3rd Floor', 30, 1),
(7, '203', 'Class Room', '3rd Floor', 30, 1),
(8, '204', 'Class Room', '3rd Floor', 30, 1),
(9, '205', 'Class Room', '3rd Floor', 30, 1),
(10, '206', 'Class Room', '3rd Floor', 30, 1),
(11, '207', 'Class Room', '3rd Floor', 30, 1),
(12, '208', 'Class Room', '3rd Floor', 30, 1),
(13, '209', 'Class Room', '3rd Floor', 30, 1),
(14, '210', 'Class Room', '3rd Floor', 30, 0),
(15, '211', 'Class Room', '3rd Floor', 30, 1),
(16, '301', 'Class Room', '4th Floor', 30, 1),
(17, '302', 'Class Room', '4th Floor', 30, 1),
(18, '303', 'Class Room', '4th Floor', 30, 1),
(19, '304', 'Class Room', '4th Floor', 30, 1),
(20, '305', 'Class Room', '4th Floor', 30, 1),
(21, '306', 'Class Room', '4th Floor', 30, 1),
(22, '307', 'Class Room', '4th Floor', 30, 1),
(23, '308', 'Class Room', '4th Floor', 30, 1),
(24, '309', 'Class Room', '4th Floor', 30, 1),
(25, '310', 'Class Room', '4th Floor', 30, 1),
(26, '311', 'Class Room', '4th Floor', 30, 1),
(27, '501', 'Retail', '5th Floor', 30, 1),
(28, '502', 'Broad Casting Studio', '5th Floor', 30, 1),
(29, '503', 'Bat and Dinning', '5th Floor', 30, 1),
(30, '504', 'Computer Laboratory', '5th Floor', 30, 1),
(31, '505', 'Computer Laboratory', '5th Floor', 30, 1),
(32, '506', 'Computer Laboratory', '5th Floor', 30, 1),
(33, '507', 'Computer Laboratory', '5th Floor', 30, 1),
(34, '601', 'Class Room', '4th Floor', 30, 1),
(35, '508', 'THM Laboratory', '5th Floor', 30, 1),
(43, '555', 'Computer Laboratory', '5th Floor', 30, 1);

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
(33, '10:00:00', '13:00:00', '2020-08-27 17:26:59', 0, 8, 0, 3),
(36, '07:00:00', '08:30:00', '2020-08-27 17:35:12', 34, 7, 0, 3),
(39, '10:30:00', '12:00:00', '2020-08-20 12:14:31', 0, 8, 6, 0),
(50, '07:00:00', '08:00:00', '2020-08-20 18:45:52', 33, 12, 0, 8),
(69, '10:00:00', '12:00:00', '2020-08-21 02:08:26', 33, 12, 44, 6),
(75, '07:00:00', '08:00:00', '2020-08-22 04:57:57', 35, 6, 6, 9),
(79, '14:00:00', '17:00:00', '2020-08-24 09:37:11', 34, 6, 7, 6),
(80, '07:00:00', '08:30:00', '2020-08-27 17:00:47', 32, 11, 8, 2),
(81, '10:00:00', '12:00:00', '2020-08-26 17:50:11', 32, 10, 8, 7),
(82, '07:00:00', '08:30:00', '2020-08-27 07:54:54', 37, 138, 31, 16),
(83, '08:30:00', '11:30:00', '2020-08-27 07:55:48', 39, 14, 5, 17),
(85, '10:00:00', '11:30:00', '2020-08-27 16:31:37', 37, 45, 8, 18);

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
(85, 33, 'Friday'),
(86, 36, 'Thursday'),
(87, 39, 'Tuesday'),
(88, 39, 'Thursday'),
(92, 50, 'Monday'),
(95, 69, 'Friday'),
(96, 75, 'Thursday'),
(101, 80, 'Wednesday'),
(103, 79, 'Tuesday'),
(104, 79, 'Thursday'),
(105, 81, 'Tuesday'),
(106, 81, 'Thursday'),
(107, 82, 'Monday'),
(108, 82, 'Wednesday'),
(109, 83, 'Tuesday'),
(110, 83, 'Thursday'),
(113, 85, 'Monday'),
(114, 85, 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `schedules_operation`
--

CREATE TABLE `schedules_operation` (
  `op_id` int(11) NOT NULL,
  `op_start` time NOT NULL DEFAULT '07:00:00',
  `op_end` time NOT NULL DEFAULT '17:00:00',
  `op_jump` enum('15','30','45','60') NOT NULL DEFAULT '30',
  `op_type` enum('prof','subj','room','sect') NOT NULL,
  `op_typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules_operation`
--

INSERT INTO `schedules_operation` (`op_id`, `op_start`, `op_end`, `op_jump`, `op_type`, `op_typeid`) VALUES
(1, '07:00:00', '17:00:00', '30', 'room', 1),
(2, '07:00:00', '17:00:00', '30', 'room', 2),
(3, '07:00:00', '15:00:00', '30', 'room', 3),
(4, '07:00:00', '17:00:00', '30', 'room', 4),
(5, '07:00:00', '17:00:00', '30', 'room', 5),
(6, '07:00:00', '15:00:00', '30', 'room', 6),
(7, '09:00:00', '20:00:00', '30', 'room', 7),
(8, '07:00:00', '17:00:00', '30', 'room', 8),
(9, '07:00:00', '17:00:00', '30', 'room', 9),
(10, '07:00:00', '17:00:00', '30', 'room', 10),
(11, '07:00:00', '17:00:00', '30', 'room', 11),
(12, '07:00:00', '17:00:00', '30', 'room', 12),
(13, '07:00:00', '17:00:00', '30', 'room', 13),
(14, '07:00:00', '17:00:00', '30', 'room', 14),
(15, '07:00:00', '17:00:00', '30', 'room', 15),
(16, '07:00:00', '17:00:00', '30', 'room', 16),
(17, '07:00:00', '17:00:00', '30', 'room', 17),
(18, '07:00:00', '17:00:00', '30', 'room', 18),
(19, '07:00:00', '17:00:00', '30', 'room', 19),
(20, '07:00:00', '17:00:00', '30', 'room', 20),
(21, '07:00:00', '17:00:00', '30', 'room', 21),
(22, '07:00:00', '17:00:00', '30', 'room', 22),
(23, '07:00:00', '17:00:00', '30', 'room', 23),
(24, '07:00:00', '17:00:00', '30', 'room', 24),
(25, '07:00:00', '17:00:00', '30', 'room', 25),
(26, '07:00:00', '17:00:00', '30', 'room', 26),
(27, '07:00:00', '17:00:00', '30', 'room', 27),
(28, '07:00:00', '17:00:00', '30', 'room', 28),
(29, '07:00:00', '17:00:00', '30', 'room', 29),
(30, '07:00:00', '17:00:00', '30', 'room', 30),
(31, '07:00:00', '17:00:00', '30', 'room', 31),
(32, '07:00:00', '17:00:00', '30', 'room', 32),
(33, '07:00:00', '17:00:00', '30', 'room', 33),
(34, '07:00:00', '17:00:00', '30', 'room', 34),
(35, '07:00:00', '17:00:00', '30', 'room', 35),
(36, '07:00:00', '17:00:00', '30', 'room', 36),
(37, '07:00:00', '17:00:00', '30', 'room', 37),
(38, '07:00:00', '17:00:00', '30', 'room', 38),
(39, '07:00:00', '17:00:00', '30', 'room', 39),
(40, '07:00:00', '17:00:00', '30', 'room', 40),
(41, '07:00:00', '17:00:00', '30', 'room', 41),
(42, '07:00:00', '17:00:00', '30', 'room', 42),
(43, '07:00:00', '17:00:00', '30', 'sect', 2),
(44, '07:00:00', '17:00:00', '30', 'sect', 3),
(45, '07:00:00', '17:00:00', '30', 'sect', 4),
(46, '07:00:00', '18:00:00', '30', 'sect', 5),
(47, '07:00:00', '17:00:00', '30', 'sect', 6),
(48, '07:00:00', '17:00:00', '30', 'sect', 7),
(49, '07:00:00', '17:00:00', '30', 'sect', 8),
(50, '07:00:00', '17:00:00', '30', 'sect', 9),
(51, '07:00:00', '17:00:00', '30', 'sect', 10),
(58, '07:00:00', '17:00:00', '30', 'subj', 5),
(59, '07:00:00', '17:00:00', '30', 'subj', 6),
(60, '07:00:00', '17:00:00', '30', 'subj', 7),
(61, '07:00:00', '17:00:00', '30', 'subj', 8),
(62, '07:00:00', '17:00:00', '30', 'subj', 9),
(63, '07:00:00', '17:00:00', '30', 'subj', 10),
(64, '07:00:00', '17:00:00', '30', 'subj', 11),
(65, '07:00:00', '17:00:00', '30', 'subj', 12),
(66, '07:00:00', '17:00:00', '30', 'subj', 13),
(67, '07:00:00', '17:00:00', '30', 'subj', 14),
(68, '07:00:00', '17:00:00', '30', 'subj', 15),
(69, '07:00:00', '17:00:00', '30', 'subj', 16),
(70, '07:00:00', '17:00:00', '30', 'subj', 17),
(71, '07:00:00', '17:00:00', '30', 'subj', 18),
(72, '07:00:00', '17:00:00', '30', 'subj', 19),
(73, '07:00:00', '17:00:00', '30', 'subj', 20),
(74, '07:00:00', '17:00:00', '30', 'subj', 21),
(75, '07:00:00', '17:00:00', '30', 'subj', 22),
(76, '07:00:00', '17:00:00', '30', 'subj', 23),
(77, '07:00:00', '17:00:00', '30', 'subj', 24),
(78, '07:00:00', '17:00:00', '30', 'subj', 25),
(79, '07:00:00', '17:00:00', '30', 'subj', 26),
(80, '07:00:00', '17:00:00', '30', 'subj', 27),
(81, '07:00:00', '17:00:00', '30', 'subj', 28),
(82, '07:00:00', '17:00:00', '30', 'subj', 29),
(83, '07:00:00', '17:00:00', '30', 'subj', 30),
(84, '07:00:00', '17:00:00', '30', 'subj', 31),
(85, '07:00:00', '17:00:00', '30', 'subj', 32),
(86, '07:00:00', '17:00:00', '30', 'subj', 33),
(87, '07:00:00', '17:00:00', '30', 'subj', 34),
(88, '07:00:00', '17:00:00', '30', 'subj', 35),
(89, '07:00:00', '17:00:00', '30', 'subj', 36),
(90, '07:00:00', '17:00:00', '30', 'subj', 37),
(91, '07:00:00', '17:00:00', '30', 'subj', 38),
(92, '07:00:00', '17:00:00', '30', 'subj', 39),
(93, '07:00:00', '17:00:00', '30', 'subj', 40),
(94, '07:00:00', '17:00:00', '30', 'subj', 41),
(95, '07:00:00', '17:00:00', '30', 'subj', 42),
(96, '07:00:00', '17:00:00', '30', 'subj', 43),
(97, '07:00:00', '17:00:00', '30', 'subj', 44),
(98, '07:00:00', '17:00:00', '30', 'subj', 45),
(99, '07:00:00', '17:00:00', '30', 'subj', 46),
(100, '07:00:00', '17:00:00', '30', 'subj', 47),
(101, '07:00:00', '17:00:00', '30', 'subj', 48),
(102, '07:00:00', '17:00:00', '30', 'subj', 49),
(103, '07:00:00', '17:00:00', '30', 'subj', 50),
(104, '07:00:00', '17:00:00', '30', 'subj', 51),
(105, '07:00:00', '17:00:00', '30', 'subj', 52),
(106, '07:00:00', '17:00:00', '30', 'subj', 53),
(107, '07:00:00', '17:00:00', '30', 'subj', 54),
(108, '07:00:00', '17:00:00', '30', 'subj', 55),
(109, '07:00:00', '17:00:00', '30', 'subj', 56),
(110, '07:00:00', '17:00:00', '30', 'subj', 57),
(111, '07:00:00', '17:00:00', '30', 'subj', 58),
(112, '07:00:00', '17:00:00', '30', 'subj', 59),
(113, '07:00:00', '17:00:00', '30', 'subj', 60),
(114, '07:00:00', '17:00:00', '30', 'subj', 61),
(115, '07:00:00', '17:00:00', '30', 'subj', 62),
(116, '07:00:00', '17:00:00', '30', 'subj', 63),
(117, '07:00:00', '17:00:00', '30', 'subj', 64),
(118, '07:00:00', '17:00:00', '30', 'subj', 65),
(119, '07:00:00', '17:00:00', '30', 'subj', 66),
(120, '07:00:00', '17:00:00', '30', 'subj', 67),
(121, '07:00:00', '17:00:00', '30', 'subj', 68),
(122, '07:00:00', '17:00:00', '30', 'subj', 69),
(123, '07:00:00', '17:00:00', '30', 'subj', 70),
(124, '07:00:00', '17:00:00', '30', 'subj', 71),
(125, '07:00:00', '17:00:00', '30', 'subj', 72),
(126, '07:00:00', '17:00:00', '30', 'subj', 73),
(127, '07:00:00', '17:00:00', '30', 'subj', 74),
(128, '07:00:00', '17:00:00', '30', 'subj', 75),
(129, '07:00:00', '17:00:00', '30', 'subj', 76),
(130, '07:00:00', '17:00:00', '30', 'subj', 77),
(131, '07:00:00', '17:00:00', '30', 'subj', 78),
(132, '07:00:00', '17:00:00', '30', 'subj', 79),
(133, '07:00:00', '17:00:00', '30', 'subj', 80),
(134, '07:00:00', '17:00:00', '30', 'subj', 81),
(135, '07:00:00', '17:00:00', '30', 'subj', 82),
(136, '07:00:00', '17:00:00', '30', 'subj', 83),
(137, '07:00:00', '17:00:00', '30', 'subj', 84),
(138, '07:00:00', '17:00:00', '30', 'subj', 85),
(139, '07:00:00', '17:00:00', '30', 'subj', 86),
(140, '07:00:00', '17:00:00', '30', 'subj', 87),
(141, '07:00:00', '17:00:00', '30', 'subj', 88),
(142, '07:00:00', '17:00:00', '30', 'subj', 89),
(143, '07:00:00', '17:00:00', '30', 'subj', 90),
(144, '07:00:00', '17:00:00', '30', 'subj', 91),
(145, '07:00:00', '17:00:00', '30', 'subj', 92),
(146, '07:00:00', '17:00:00', '30', 'subj', 93),
(147, '07:00:00', '17:00:00', '30', 'subj', 94),
(148, '07:00:00', '17:00:00', '30', 'subj', 95),
(149, '07:00:00', '17:00:00', '30', 'subj', 96),
(150, '07:00:00', '17:00:00', '30', 'subj', 97),
(151, '07:00:00', '17:00:00', '30', 'subj', 98),
(152, '07:00:00', '17:00:00', '30', 'subj', 99),
(153, '07:00:00', '17:00:00', '30', 'subj', 100),
(154, '07:00:00', '17:00:00', '30', 'subj', 101),
(155, '07:00:00', '17:00:00', '30', 'subj', 102),
(156, '07:00:00', '17:00:00', '30', 'subj', 103),
(157, '07:00:00', '17:00:00', '30', 'subj', 104),
(158, '07:00:00', '17:00:00', '30', 'subj', 105),
(159, '07:00:00', '17:00:00', '30', 'subj', 106),
(160, '07:00:00', '17:00:00', '30', 'subj', 107),
(161, '07:00:00', '17:00:00', '30', 'subj', 108),
(162, '07:00:00', '17:00:00', '30', 'subj', 109),
(163, '07:00:00', '17:00:00', '30', 'subj', 110),
(164, '07:00:00', '17:00:00', '30', 'subj', 111),
(165, '07:00:00', '17:00:00', '30', 'subj', 112),
(166, '07:00:00', '17:00:00', '30', 'subj', 113),
(167, '07:00:00', '17:00:00', '30', 'subj', 114),
(168, '07:00:00', '17:00:00', '30', 'subj', 115),
(169, '07:00:00', '17:00:00', '30', 'subj', 116),
(170, '07:00:00', '17:00:00', '30', 'subj', 117),
(171, '07:00:00', '17:00:00', '30', 'subj', 118),
(172, '07:00:00', '17:00:00', '30', 'subj', 119),
(173, '07:00:00', '17:00:00', '30', 'subj', 120),
(174, '07:00:00', '17:00:00', '30', 'subj', 121),
(175, '07:00:00', '17:00:00', '30', 'subj', 122),
(176, '07:00:00', '17:00:00', '30', 'subj', 123),
(177, '07:00:00', '17:00:00', '30', 'subj', 124),
(178, '07:00:00', '17:00:00', '30', 'subj', 125),
(179, '07:00:00', '17:00:00', '30', 'subj', 126),
(180, '07:00:00', '17:00:00', '30', 'subj', 127),
(181, '07:00:00', '17:00:00', '30', 'subj', 128),
(182, '07:00:00', '17:00:00', '30', 'subj', 129),
(183, '07:00:00', '17:00:00', '30', 'subj', 130),
(184, '07:00:00', '17:00:00', '30', 'subj', 131),
(185, '07:00:00', '17:00:00', '30', 'subj', 132),
(186, '07:00:00', '17:00:00', '30', 'subj', 133),
(187, '07:00:00', '17:00:00', '30', 'subj', 134),
(188, '07:00:00', '17:00:00', '30', 'subj', 135),
(189, '07:00:00', '17:00:00', '30', 'subj', 136),
(190, '07:00:00', '17:00:00', '30', 'subj', 137),
(191, '07:00:00', '17:00:00', '30', 'subj', 138),
(192, '07:00:00', '17:00:00', '30', 'subj', 139),
(193, '07:00:00', '17:00:00', '30', 'subj', 140),
(194, '07:00:00', '17:00:00', '30', 'subj', 141),
(195, '07:00:00', '17:00:00', '30', 'subj', 142),
(196, '07:00:00', '17:00:00', '30', 'subj', 143),
(197, '07:00:00', '17:00:00', '30', 'subj', 144),
(198, '07:00:00', '17:00:00', '30', 'subj', 145),
(199, '07:00:00', '17:00:00', '30', 'subj', 146),
(200, '07:00:00', '17:00:00', '30', 'subj', 147),
(201, '07:00:00', '17:00:00', '30', 'subj', 148),
(202, '07:00:00', '17:00:00', '30', 'subj', 149),
(203, '07:00:00', '17:00:00', '30', 'subj', 150),
(204, '07:00:00', '17:00:00', '30', 'subj', 151),
(205, '07:00:00', '17:00:00', '30', 'subj', 152),
(206, '07:00:00', '17:00:00', '30', 'subj', 153),
(207, '07:00:00', '17:00:00', '30', 'subj', 154),
(208, '07:00:00', '17:00:00', '30', 'subj', 155),
(209, '07:00:00', '17:00:00', '30', 'subj', 156),
(210, '07:00:00', '17:00:00', '30', 'subj', 157),
(211, '07:00:00', '17:00:00', '30', 'subj', 158),
(212, '07:00:00', '17:00:00', '30', 'subj', 159),
(213, '07:00:00', '17:00:00', '30', 'subj', 160),
(214, '07:00:00', '17:00:00', '30', 'subj', 161),
(215, '07:00:00', '17:00:00', '30', 'subj', 162),
(216, '07:00:00', '17:00:00', '30', 'subj', 163),
(217, '07:00:00', '17:00:00', '30', 'subj', 164),
(218, '07:00:00', '17:00:00', '30', 'subj', 165),
(219, '07:00:00', '17:00:00', '30', 'subj', 166),
(220, '07:00:00', '17:00:00', '30', 'subj', 167),
(221, '07:00:00', '17:00:00', '30', 'subj', 168),
(222, '07:00:00', '17:00:00', '30', 'subj', 169),
(223, '07:00:00', '17:00:00', '30', 'subj', 170),
(224, '07:00:00', '17:00:00', '30', 'subj', 171),
(225, '07:00:00', '17:00:00', '30', 'subj', 172),
(226, '07:00:00', '17:00:00', '30', 'subj', 173),
(313, '07:00:00', '17:00:00', '30', 'prof', 31),
(314, '07:00:00', '17:00:00', '30', 'prof', 32),
(315, '07:00:00', '18:00:00', '30', 'prof', 33),
(316, '07:00:00', '17:00:00', '30', 'prof', 34),
(317, '07:00:00', '17:00:00', '30', 'prof', 35),
(318, '07:00:00', '17:00:00', '30', 'prof', 36),
(319, '07:00:00', '17:00:00', '30', 'prof', 37),
(320, '07:00:00', '17:00:00', '30', 'prof', 38),
(321, '07:00:00', '17:00:00', '30', 'prof', 39),
(322, '07:00:00', '17:00:00', '30', 'prof', 40),
(323, '07:00:00', '17:00:00', '30', 'prof', 31),
(324, '07:00:00', '17:00:00', '30', 'prof', 32),
(325, '07:00:00', '17:00:00', '30', 'prof', 33),
(326, '07:00:00', '17:00:00', '30', 'prof', 34),
(327, '07:00:00', '17:00:00', '30', 'prof', 35),
(328, '07:00:00', '17:00:00', '30', 'prof', 36),
(329, '07:00:00', '17:00:00', '30', 'prof', 37),
(330, '07:00:00', '17:00:00', '30', 'prof', 38),
(331, '07:00:00', '17:00:00', '30', 'prof', 39),
(332, '07:00:00', '17:00:00', '30', 'prof', 40),
(333, '07:00:00', '17:00:00', '30', 'prof', 41),
(334, '07:00:00', '17:00:00', '30', 'prof', 42),
(335, '07:00:00', '17:00:00', '30', 'prof', 43),
(336, '07:00:00', '17:00:00', '30', 'room', 43),
(337, '07:00:00', '17:00:00', '30', 'subj', 175),
(338, '07:00:00', '17:00:00', '15', 'room', 44),
(339, '07:00:00', '17:00:00', '15', 'room', 45),
(340, '07:00:00', '17:00:00', '15', 'room', 46),
(341, '07:00:00', '17:00:00', '30', 'room', 47),
(342, '07:00:00', '17:00:00', '30', 'sect', 10),
(343, '07:00:00', '17:00:00', '30', 'sect', 10),
(344, '07:00:00', '17:00:00', '30', 'sect', 10),
(345, '07:00:00', '17:00:00', '30', 'sect', 10),
(346, '07:00:00', '17:00:00', '30', 'sect', 16),
(347, '07:00:00', '17:00:00', '30', 'sect', 17),
(348, '07:00:00', '17:00:00', '30', 'sect', 18);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sect_id` int(11) NOT NULL,
  `sect_name` varchar(50) NOT NULL,
  `sect_year` enum('Grade 11','Grade 12','1st Year First Semester','1st Year Second Semester','2nd Year First Semester','2nd Year Second Semester','3rd Year First Semester','3rd Year Second Semester','4th Year First Semester','4th Year Second Semester') NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sect_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sect_id`, `sect_name`, `sect_year`, `dept_id`, `sect_active`) VALUES
(2, 'BSIT602', '1st Year First Semester', 47, 0),
(3, 'BSIT - 701', '4th Year First Semester', 49, 1),
(4, 'BSIT103', 'Grade 11', 49, 0),
(5, 'BSIT - 201', '1st Year Second Semester', 49, 1),
(6, 'BSIT - 301', '2nd Year First Semester', 49, 1),
(7, 'BSIT401', 'Grade 12', 49, 0),
(8, 'BSIT - 801', '4th Year Second Semester', 49, 1),
(9, 'BSIT - 501', '3rd Year First Semester', 49, 1),
(10, 'BSIT - 601', '3rd Year Second Semester', 49, 1),
(16, 'ABM101', 'Grade 11', 68, 0),
(17, 'STEM201', 'Grade 12', 69, 0),
(18, 'ABM102', 'Grade 11', 68, 0),
(21, 'STEM101', 'Grade 11', 69, 0),
(31, 'BSIT - 101', '1st Year First Semester', 49, 1),
(41, 'BSIT - 401', '2nd Year Second Semester', 49, 1),
(51, 'BSCS - 101', '1st Year First Semester', 53, 1),
(61, 'BSCS - 201', '1st Year Second Semester', 53, 1),
(71, 'BSCS - 301', '2nd Year First Semester', 53, 1),
(81, 'BSCS - 401', '2nd Year Second Semester', 53, 1),
(91, 'BSCS - 501', '3rd Year First Semester', 53, 1),
(101, 'BSCS - 601', '3rd Year Second Semester', 53, 1),
(111, 'BSCS -701', '4th Year First Semester', 53, 1),
(121, 'BSCS - 801', '4th Year Second Semester', 53, 1),
(131, 'BSIS - 101', '1st Year First Semester', 52, 1),
(141, 'BSIS - 201', '1st Year Second Semester', 52, 1),
(151, 'BSIS -301', '2nd Year First Semester', 52, 1),
(161, 'BSIS - 401', '2nd Year Second Semester', 52, 1),
(171, 'BSIS - 501', '3rd Year First Semester', 52, 1),
(181, 'BSIS - 601', '3rd Year Second Semester', 52, 1),
(191, 'BSIS - 701', '4th Year First Semester', 52, 1),
(201, 'BSIS - 801', '4th Year Second Semester', 52, 1),
(211, 'BSBA - 101', '1st Year First Semester', 54, 1),
(221, 'BSBA - 201', '1st Year Second Semester', 54, 1),
(231, 'bsba - 301', '2nd Year First Semester', 54, 1),
(241, 'BSBA - 401', '2nd Year Second Semester', 54, 1),
(251, 'BSBA - 501', '3rd Year First Semester', 54, 1),
(261, 'BSBA - 601', '3rd Year Second Semester', 54, 1),
(271, 'BSBA - 701', '4th Year First Semester', 54, 1),
(281, 'BSBA - 801', '4th Year Second Semester', 54, 1),
(291, 'BSA - 101', '1st Year First Semester', 55, 1),
(301, 'BSA - 201', '1st Year Second Semester', 55, 1),
(311, 'BSA- 301', '2nd Year First Semester', 55, 1),
(321, 'BSA - 401', '2nd Year Second Semester', 55, 1),
(331, 'BSA - 501', '3rd Year First Semester', 55, 1),
(341, 'BSA - 601', '3rd Year Second Semester', 55, 1),
(351, 'BSA - 701', '4th Year First Semester', 55, 1),
(361, 'BSA - 801', '4th Year Second Semester', 55, 1),
(371, 'BSAIS - 101', '1st Year First Semester', 56, 1),
(381, 'BSAIS - 201', '1st Year Second Semester', 56, 1),
(391, 'BSAIS - 301', '2nd Year First Semester', 56, 1),
(401, 'BSAIS - 401', '2nd Year Second Semester', 56, 1),
(411, 'BSAIS - 501', '3rd Year First Semester', 56, 1),
(421, 'BSAIS - 601', '3rd Year Second Semester', 56, 1),
(431, 'BSAIS - 701', '4th Year First Semester', 56, 1),
(441, 'BSAIS - 801', '4th Year Second Semester', 56, 1),
(451, 'ABM - 101', 'Grade 11', 68, 1),
(461, 'ABM - 201', 'Grade 11', 68, 1),
(471, 'ABM - 301', 'Grade 12', 68, 1),
(481, 'ABM - 401', 'Grade 12', 68, 1),
(491, 'STEM - 101', 'Grade 11', 69, 1),
(501, 'STEM - 201', 'Grade 11', 68, 1),
(511, 'STEM - 301', 'Grade 12', 69, 1),
(521, 'STEM - 401', 'Grade 12', 69, 1),
(531, 'HUMMS - 101', 'Grade 11', 70, 1),
(541, 'HUMMS - 201', 'Grade 11', 70, 1),
(551, 'HUMMS - 301', 'Grade 12', 70, 1),
(561, 'HUMMS - 401', 'Grade 12', 70, 1),
(571, 'GAS - 101', 'Grade 11', 71, 1),
(581, 'GAS - 201', 'Grade 11', 71, 1),
(591, 'GAS - 301', 'Grade 12', 71, 1),
(601, 'GAS - 401', 'Grade 12', 71, 1),
(611, 'IT - 101', 'Grade 11', 72, 1),
(621, 'IT - 201', 'Grade 11', 72, 1),
(631, 'IT - 301', 'Grade 12', 72, 1),
(641, 'IT  401', 'Grade 12', 72, 1),
(651, 'ARTS - 101', 'Grade 11', 73, 1),
(661, 'ARTS - 201', 'Grade 11', 73, 1),
(671, 'ARTS - 301', 'Grade 12', 73, 1),
(681, 'ARTS - 401', 'Grade 12', 73, 1),
(691, 'CCT - 101', 'Grade 11', 74, 1),
(701, 'CCT - 201', 'Grade 11', 74, 1),
(711, 'CCT - 301', 'Grade 12', 74, 1),
(721, 'CCT - 401', 'Grade 12', 74, 1),
(731, 'CE - 101', 'Grade 11', 75, 1),
(741, 'CE - 201', 'Grade 11', 75, 1),
(751, 'CE - 301', 'Grade 12', 75, 1),
(761, 'CE - 401', 'Grade 12', 75, 1),
(771, 'HO - 101', 'Grade 11', 76, 1),
(781, 'HO - 201', 'Grade 11', 76, 1),
(791, 'HO - 301', 'Grade 12', 76, 1),
(801, 'HO - 401', 'Grade 12', 76, 1),
(811, 'TO - 101', 'Grade 11', 77, 1),
(821, 'TO - 201', 'Grade 11', 77, 1),
(831, 'TO - 301', 'Grade 12', 77, 1),
(841, 'TO - 401', 'Grade 12', 77, 1),
(851, 'RCO - 101', 'Grade 11', 78, 1),
(861, 'RCO - 201', 'Grade 11', 78, 1),
(871, 'RCO - 301', 'Grade 12', 78, 1),
(881, 'RCO - 401', 'Grade 12', 78, 1),
(891, 'CA - 101', 'Grade 11', 101, 1),
(901, 'CA - 201', 'Grade 11', 101, 1),
(911, 'CA - 301', 'Grade 12', 101, 1),
(921, 'CA - 401', 'Grade 12', 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subj_id` int(11) NOT NULL,
  `subj_code` varchar(12) NOT NULL,
  `subj_desc` text NOT NULL,
  `units` int(11) NOT NULL,
  `hours` float NOT NULL DEFAULT 1.5,
  `dept_id` int(11) NOT NULL,
  `is_laboratory` tinyint(1) NOT NULL DEFAULT 0,
  `subj_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subj_id`, `subj_code`, `subj_desc`, `units`, `hours`, `dept_id`, `is_laboratory`, `subj_active`) VALUES
(5, 'MAT1003', 'Algebra', 3, 1.5, 1, 0, 0),
(6, 'COM1021', 'Communication Arts 1', 3, 1.5, 1, 0, 1),
(7, 'IT1029', 'Computer Fundamentals (Lec)', 2, 1.5, 1, 0, 0),
(8, 'IT1029L', 'Computer Fundamentals (Lab)', 1, 1.5, 1, 0, 0),
(9, 'IT1040', 'Computer Programming 1 (Lec)', 3, 1.5, 1, 0, 1),
(10, 'IT1040L', 'Computer Programming 1 (Lab)', 1, 3, 51, 1, 1),
(11, 'MAT1032', 'Math Plus', 1, 1.5, 1, 0, 1),
(12, 'NSTP1001', 'Civic Welfare Training Service 1', 3, 1.5, 1, 0, 1),
(13, 'PE1001', 'Physical Education 1', 2, 1.5, 1, 0, 1),
(14, 'SOC1030', 'Professional Ethics with Values Formation', 3, 1.5, 1, 0, 1),
(15, 'COM1024', 'Communication Arts 2', 3, 1.5, 1, 0, 1),
(16, 'IT1043', 'Computer Programming 2 (Lec)', 3, 1.5, 1, 0, 1),
(17, 'IT1043L', 'Computer Programming 2 (Lab)', 1, 1.5, 1, 0, 0),
(18, 'IT1060', 'Data Structure (Lec)', 3, 1.5, 1, 0, 1),
(19, 'IT1060L', 'Data Structure (Lab)', 1, 1.5, 1, 0, 1),
(20, 'IT1069', 'Discrete Structures', 3, 1.5, 1, 0, 1),
(21, 'NSTP1002', 'Civic Welfare Training Service 2', 3, 1.5, 1, 0, 1),
(22, 'COM1056', 'Introduction to Arts', 3, 1.5, 1, 0, 1),
(23, 'PE1003', 'Physical Education 2', 2, 1.5, 1, 0, 1),
(24, 'MAT1051', 'Trigonometry', 3, 1.5, 1, 0, 1),
(25, 'COM1027', 'Communication Arts 3', 3, 1.5, 1, 0, 1),
(26, 'IT1046', 'Computer Programming 3 (Lec)', 3, 1.5, 1, 0, 1),
(27, 'IT1046L', 'Computer Programming 3 (Lab)', 1, 1.5, 1, 0, 1),
(28, 'IT1097', 'Logic Design and Switching', 3, 1.5, 1, 0, 1),
(29, 'SOC1024', 'Philippine History, Government and Constitution', 3, 1.5, 1, 0, 1),
(30, 'PE1005', 'Physical Education 3', 2, 1.5, 1, 0, 1),
(31, 'SCI1018', 'Physics (Lec)', 3, 1.5, 1, 0, 1),
(32, 'SCI1018L', 'Physics 1 (Lab)', 1, 1.5, 1, 0, 1),
(33, 'MAT1042', 'Probability and Statistic', 3, 1.5, 1, 0, 1),
(34, 'SOC1040', 'Society, Culture and Information Technology with Family Planning', 3, 1.5, 1, 0, 1),
(35, 'COM1031', 'Communication Arts 4', 3, 1.5, 1, 0, 1),
(36, 'IT1038', 'Computer Organization and Assembly Language (Lec)', 3, 1.5, 1, 0, 1),
(37, 'IT1038L', 'Computer Organization and Assembly Language (Lab)', 1, 1.5, 1, 0, 1),
(38, 'SOC1026', 'Philosophy of Man', 3, 1.5, 1, 0, 1),
(39, 'PE1007', 'Physical Education 4', 2, 1.5, 1, 0, 1),
(40, 'SCI1020', 'Physics 2 (Lec)', 3, 1.5, 1, 0, 1),
(41, 'SCI1020L', 'Physics 2 (Lab)', 1, 1.5, 1, 0, 1),
(42, 'IT1134', 'System Analysis and Design', 3, 1.5, 1, 0, 1),
(43, 'IT1142', 'Theory of Database System (Lec)', 3, 1.5, 1, 0, 1),
(44, 'IT1142L', 'Theory of Database System (Lab)', 1, 1.5, 1, 0, 1),
(45, 'BUS1004', 'Accounting Principles', 3, 1.5, 1, 0, 1),
(46, 'IT1009', 'Advance Database System (Lec)', 2, 1.5, 1, 0, 1),
(47, 'IT1009L', 'Advance Database System (Lab)', 1, 1.5, 1, 0, 1),
(48, 'FIL1001', 'Komunikasyon sa Akademikong Filipino', 3, 1.5, 1, 0, 1),
(49, 'IT1126', 'Operation Research', 3, 1.5, 1, 0, 1),
(50, 'IT1124', 'Operating System', 3, 1.5, 1, 0, 1),
(51, 'IT1132', 'Software Engineering (Lec)', 3, 1.5, 1, 0, 1),
(52, 'IT1132L', 'Software Engineering (Lab)', 1, 1.5, 1, 0, 1),
(53, 'IT1151', 'Web Programming (Lec)', 2, 1.5, 1, 0, 1),
(54, 'IT1151L', 'Web Programming (Lab)', 1, 1.5, 1, 0, 1),
(55, 'IT1034', 'Computer Networks (Lec)', 3, 1.5, 1, 0, 1),
(56, 'IT1034L', 'Computer Networks (Lab)', 1, 1.5, 1, 0, 1),
(57, 'SOC1006', 'Economics with Taxation and Agrarian Reform', 3, 1.5, 1, 0, 1),
(58, 'FIL1003', 'Pagbasa at Pagsulat Tungo sa Pananaaliksik', 3, 1.5, 1, 0, 1),
(59, 'IT1107', 'Multimedia System (Lec)', 3, 1.5, 1, 0, 1),
(60, 'IT1107L', 'Multimedia System (Lab)', 1, 1.5, 1, 0, 1),
(61, 'SOC1016', 'Life and Works of Rizal', 3, 1.5, 1, 0, 1),
(62, 'IT1031', 'Computer Graphics (Lec)', 2, 1.5, 1, 0, 1),
(63, 'IT1031L', 'Computer Graphics (Lab)', 2, 1.5, 1, 0, 1),
(64, 'IT1130', 'Project Management', 3, 1.5, 1, 0, 1),
(65, 'SOC1033', 'Psychology with Drugs, HIV/AIDS and SARS Education', 3, 1.5, 1, 0, 1),
(66, 'IT1091', 'IT Special Project (Thesis) (Lec)', 2, 1.5, 1, 0, 1),
(67, 'IT1091L', 'IT Special Project (Thesis) (Lab)', 1, 1.5, 1, 0, 1),
(68, 'COM1071', 'Philippines Literature', 3, 1.5, 1, 0, 1),
(69, 'BUS1179', 'Technopreneurship', 3, 1.5, 1, 0, 1),
(70, 'COM1079', 'World Literature', 3, 1.5, 1, 0, 1),
(71, 'COM1053', 'Foreign Language', 3, 1.5, 1, 0, 1),
(72, 'IT1102', 'Mobile Application Development (Lec)', 2, 1.5, 1, 0, 1),
(73, 'IT1102L', 'Mobile Application Development (Lab)', 1, 1.5, 1, 0, 1),
(74, 'IT1152', 'IT Practicum', 9, 1.5, 1, 0, 1),
(75, 'OC', 'Oral Communication', 3, 1.5, 1, 0, 1),
(76, 'GM', 'General Mathematics', 3, 1.5, 1, 0, 1),
(77, 'Literature', '21st Century Literature form the Philippines and the World', 3, 1.5, 1, 0, 1),
(78, 'MIT', 'Media and Information Literacy', 3, 1.5, 1, 0, 1),
(79, 'IPHP', 'Introduction to the Philosophy of the Human Person', 3, 1.5, 1, 0, 1),
(80, 'PE1', 'Physical Education and Health 1', 20, 1.5, 1, 0, 1),
(81, 'OM', 'Organization and Management', 3, 1.5, 1, 0, 1),
(82, 'BM', 'Business Mathematics', 3, 1.5, 1, 0, 1),
(83, 'RW', 'Reading and Writing', 3, 1.5, 1, 0, 1),
(84, 'SP', 'Statistic and Probability', 3, 1.5, 1, 0, 1),
(85, 'UCSP', 'Understanding Culture , Society and Politics', 3, 1.5, 1, 0, 1),
(86, 'ELS', 'Earth and Life Science', 3, 1.5, 1, 0, 1),
(87, 'FIL1', 'Komunikasyon at Pananaliksik sa Wika at kulturang Pilipino', 3, 1.5, 1, 0, 1),
(88, 'PR1', 'Practical Research 1', 3, 1.5, 1, 0, 1),
(89, 'PM', 'Principles of Marketing', 3, 1.5, 1, 0, 1),
(90, 'FABM1', 'Fundamentals of Accountancy, Business and Management 1', 3, 1.5, 1, 0, 1),
(91, 'CPAR', 'Contemporary Philippine Arts from the Regions', 3, 1.5, 1, 0, 1),
(92, 'PE4', 'Physical Education and Health 4', 20, 1.5, 1, 0, 1),
(93, 'ET', 'Empowerment Technologies', 3, 1.5, 1, 0, 1),
(94, 'ENTREP', 'Entrepreneurship', 3, 1.5, 1, 0, 1),
(95, 'INM', 'Inquiries, Investigation and Immersion', 3, 1.5, 1, 0, 1),
(96, 'AECO', 'Applied Economics', 3, 1.5, 1, 0, 1),
(97, 'BESR', 'Business Ethics and Social Responsibility', 3, 1.5, 1, 0, 1),
(98, 'BES', 'Work Immersion/Research/Career Advocacy/Culminating Activity', 3, 1.5, 1, 0, 1),
(99, 'PRECal', 'Pre-Calculus', 3, 1.5, 1, 0, 1),
(100, 'GENBIO', 'General Biology 1', 3, 1.5, 1, 0, 1),
(101, 'BCAL', 'Basic Calculus', 3, 1.5, 1, 0, 1),
(102, 'GENBIO2', 'General Biology 2', 3, 1.5, 1, 0, 1),
(103, 'PE2', 'Physical Education and Health 2', 20, 1.5, 1, 0, 1),
(104, 'PD', 'Personal Development', 3, 1.5, 1, 0, 1),
(105, 'FIL2', 'Pagbasa at Pagsuri ng Iba\'t Ibang Teksto Tungo sa Pananaliksik', 3, 1.5, 1, 0, 1),
(106, 'PS', 'Physical Science', 3, 1.5, 1, 0, 1),
(107, 'PE3', 'Physical Education and Health 3', 20, 1.5, 1, 0, 1),
(108, 'PR2', 'Practical Research 2', 3, 1.5, 1, 0, 1),
(109, 'FIL3', 'Filipino sa Piling Larangan', 3, 1.5, 1, 0, 1),
(110, 'EAPP', 'English for Academic and Professional Purposes', 3, 1.5, 1, 0, 1),
(111, 'BF', 'Business Finance', 3, 1.5, 1, 0, 1),
(112, 'FABM2', 'Fundamentals of Accountancy, Business and Management 2', 3, 1.5, 1, 0, 1),
(113, 'DRRR', 'Disaster Readiness and Risk Reduction', 3, 1.5, 1, 0, 1),
(114, 'PHYSICS1', 'General Physics 1', 3, 1.5, 1, 0, 1),
(115, 'GENCHE1', 'General Chemistry1', 3, 1.5, 1, 0, 1),
(116, 'PHYSICS2', 'General Physics 2', 3, 1.5, 1, 0, 1),
(117, 'GENCHE2', 'General Chemistry2', 3, 1.5, 1, 0, 1),
(118, 'IWRBS', 'Introduction to World Religions and Belief System', 3, 1.5, 1, 0, 0),
(119, 'DISS', 'Discipline and Ideas in the Social Sciences', 3, 1.5, 1, 0, 1),
(120, 'CW', 'Creative Writing', 3, 1.5, 1, 0, 1),
(121, 'CN', 'Creative Nonfiction', 3, 1.5, 1, 0, 1),
(122, 'PPG', 'Philippine Politics and Governance', 3, 1.5, 1, 0, 1),
(123, 'TNCT', 'Trends, Networks and Critical Thingking in the 21st Century', 3, 1.5, 1, 0, 1),
(124, 'CESC', 'Community Engagement Solidarity and Citizenship', 3, 1.5, 1, 0, 1),
(125, 'COMPRO1', 'Computer Programming 1 (Java/Intro to Programming)', 3, 1.5, 1, 0, 1),
(126, 'COMPRO2', 'Computer Programming 2 (HTML,CSS/Web Interfaces)', 3, 1.5, 1, 0, 1),
(127, 'COMPRO3', 'Computer Programming 3 (Intermediate Java Programming)', 3, 1.5, 1, 0, 1),
(128, 'MAP', 'Mobile App Programming 1 (Android OS and Java)', 3, 1.5, 1, 0, 1),
(129, 'COMPRO4', 'Computer Programming 4 (C#/Intro to .Net Programming)', 3, 1.5, 1, 0, 1),
(130, 'COMPRO5', 'Computer Programming 5 (JavaScript,jQuery)', 3, 1.5, 1, 0, 1),
(131, 'COMPRO6', 'Computer Programming 6 (SQL/Intro to ASP.Net)', 3, 1.5, 1, 0, 1),
(132, 'MAP2', 'Mobile App Programming 1 (Android OS and .NET Framework)', 3, 1.5, 1, 0, 1),
(133, '2D', '2D Concept', 3, 1.5, 1, 0, 1),
(134, 'BDD', 'Basic Drawing and Drafting', 3, 1.5, 1, 0, 1),
(135, 'FCD', 'Fundamental of Computer Drawing', 3, 1.5, 1, 0, 1),
(136, 'DGDIM', 'Digital Graphics Design and Image Manipulation', 3, 1.5, 1, 0, 1),
(137, 'DP', 'Digital Photography', 3, 1.5, 1, 0, 1),
(138, 'CA', 'Computer Animation', 3, 1.5, 1, 0, 1),
(139, 'DVAP', 'Digital Video and Audio Production', 3, 1.5, 1, 0, 1),
(140, '3D', '3D Modeling', 3, 1.5, 1, 0, 1),
(141, 'CEDD', 'Computer Engineering Drafting and Design', 3, 1.5, 1, 0, 1),
(142, 'FEE', 'Fundamentals of Electricity and Electronics', 3, 1.5, 1, 0, 1),
(143, 'CHF', 'Computer Hardware Fundamentals', 3, 1.5, 1, 0, 1),
(144, 'BCT', 'Basic Computer Technology', 3, 1.5, 1, 0, 1),
(145, 'EC', 'Electronic and Communications', 3, 1.5, 1, 0, 1),
(146, 'DC', 'Data Communications', 3, 1.5, 1, 0, 1),
(147, 'BT', 'Broadband Technology', 3, 1.5, 1, 0, 1),
(148, 'COMNETS', 'Computer Networks', 3, 1.5, 1, 0, 1),
(149, 'RE', 'Radio Electronics', 3, 1.5, 1, 0, 1),
(150, 'TV', 'TV Electronics', 3, 1.5, 1, 0, 1),
(151, 'MT', 'Mobile Technology', 3, 1.5, 1, 0, 1),
(152, 'TGE', 'Tour Guiding and Escorting', 3, 1.5, 1, 0, 1),
(153, 'ITTI', 'Introduction to Travel and Tourism Industry', 3, 1.5, 1, 0, 1),
(154, 'ITS', 'Introduction to travel  and Services', 3, 1.5, 1, 0, 1),
(155, 'TSMP', 'Tourism Sales and Marketing Principles', 3, 1.5, 1, 0, 1),
(156, 'TIM', 'Tourism Information Management', 3, 1.5, 1, 0, 1),
(157, 'IETC', 'Internet and E-Travel Commerce', 3, 1.5, 1, 0, 1),
(158, 'IFBO', 'Introduction to Food and Beverages Operations', 3, 1.5, 1, 0, 1),
(159, 'NABC', 'Non-alcoholic Beverages Concoction', 3, 1.5, 1, 0, 1),
(160, 'FBS', 'Food and Beverages Services', 3, 1.5, 1, 0, 1),
(161, 'CC', 'Coffee Concoction', 3, 1.5, 1, 0, 1),
(162, 'IBMO', 'Introduction to Bar Management and Operation', 3, 1.5, 1, 0, 1),
(163, 'CMF', 'Cocktail Mixology with Flairtending', 3, 1.5, 1, 0, 1),
(164, 'BSM', 'Bar Services Management', 3, 1.5, 1, 0, 1),
(165, 'WSM', 'Wine Service Management', 3, 1.5, 1, 0, 0),
(166, 'ICO', 'Introduction to Culinary Operations', 3, 1.5, 1, 0, 0),
(167, 'BFP101', 'Basic Food Production 101', 3, 1.5, 1, 0, 0),
(168, 'BFP102', 'Basic Food Production 102', 3, 1.5, 1, 0, 0),
(169, 'BFP103', 'Basic Food Production 103', 3, 1.5, 1, 0, 0),
(170, 'ICC', 'Introduction to Commercial Cookery', 3, 1.5, 1, 0, 0),
(171, 'LIC', 'Loca and Internation Cuisines', 3, 1.5, 1, 0, 0),
(172, 'CMCS', 'Catering Management and Control System', 3, 1.5, 1, 0, 0),
(173, 'IBPP', 'Introduction to Bread and Pastry Production', 3, 1.5, 1, 0, 0),
(175, 'IDK', 'I Don\'t Know', 3, 1.5, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_to_checklist`
--

CREATE TABLE `subjects_to_checklist` (
  `id` int(11) NOT NULL,
  `chk_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_to_checklist`
--

INSERT INTO `subjects_to_checklist` (`id`, `chk_id`, `subj_id`, `level_id`) VALUES
(5, 1, 35, 6);

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
(1, 'Admin', 'hushsua@gmal.com', '$2y$10$2fgPZSPWqfHVUx75//RiIezBP5cKv5hpWi7tGn2Nhu7rn/QVLrv52', 4, 1),
(28, '3232532', '', '$2y$10$/wGSM4yn76j1Tqtpp2nP8u0YnswezJE/8MIgP86dJgKAJR87oC9AO', 1, 0),
(29, '88888888', '', '$2y$10$G0XCro/zxWEwl8SgZDRXy.ibKBl5Fkk.3E9O6Z8dyig5FAOVCEbyy', 1, 1),
(30, '0200006652', 'chris_tine09@yahoo.com', '$2y$10$WpVKlFearFw1GuG/JVZOC.sH24NUekp0OOwE6qzfJeSRpLeLRroPi', 1, 1),
(32, 'hellow', 'hahahahha@gmail.com', '$2y$10$U2XkxhRYZzeIRTpcwqKpLuMc2pI/Fv8cYG8s0l1uARb/ws8gUZ3cu', 1, 1),
(34, '987654321', '', '$2y$10$5MipXSVUGbftbWEwk1wYkeTPGG5B7KCV0TzxBXR79T1hjbnmGAt7i', 1, 1),
(35, '147258369', '', '$2y$10$nZUlO7QaxjYsTyjSzm5EcudUa9/3I8nhJUDzrPN5DS6/SSzsEFLuO', 1, 1),
(36, '963852741', '', '$2y$10$jjFqbgPloHcZcVLHsoFDFOcmOjOL.SlXLJzQ4xeT83ora8yXXF/XO', 1, 1),
(37, '852147963', '', '$2y$10$1CMi8YGI1QtcEhP01JT/q.iyVdmUFqU/zubjB8AyeF.fy.YPSv/w.', 1, 1),
(38, '195375465', '', '$2y$10$0XXOng7q6MUnuwRyWbGIjuX63iEpSpyD9tR.luH61.vTUzmwd7.wi', 1, 0),
(39, '1236544789', '', '$2y$10$jkzqN9in/voKfVB9RDYzoOMIrtDp.hXZkJqmIfL/LkunAep7ehq1.', 1, 1),
(40, 'isabelthomas', 'Isabelthomas@yahoo.com', '$2y$10$ZrwGj8V.waDuoIdsp8pC5.VStErNRyVjlXzg5oQWO05JhaBArwFV.', 1, 1),
(44, 'Dean', '', '$2y$10$6ThSEgoLZL3ei/ThlYTOjOefpNxCFRuKjkzvfJe/8b7SAe/3cIywO', 2, 1),
(45, 'ITHead', '', '$2y$10$fpYZ1G2SMdw0lc8duGJ9buvEawYFMskuz/fu8Qwc1Wp82imebAVie', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist_to_sections`
--
ALTER TABLE `checklist_to_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `subjects_to_checklist`
--
ALTER TABLE `subjects_to_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checklist_to_sections`
--
ALTER TABLE `checklist_to_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `schedules_day`
--
ALTER TABLE `schedules_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `schedules_operation`
--
ALTER TABLE `schedules_operation`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=922;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `subjects_to_checklist`
--
ALTER TABLE `subjects_to_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
