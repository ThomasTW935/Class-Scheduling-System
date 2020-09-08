-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 07:53 PM
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
(7, 'BSCS(OLD)', 53, 1),
(8, 'ABM', 68, 1),
(11, 'BSTM', 47, 1),
(21, 'BSTM', 47, 0),
(31, 'ABM', 68, 1),
(41, 'STEM', 69, 1);

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
(6, '2nd2sem', '2nd Year Second Semester', 'course'),
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
  `type` varchar(25) NOT NULL DEFAULT 'Instructor',
  `dept_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prof_active` tinyint(1) NOT NULL DEFAULT 1,
  `prof_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `emp_no`, `last_name`, `first_name`, `middle_initial`, `suffix`, `type`, `dept_id`, `user_id`, `prof_active`, `prof_img`) VALUES
(28, 323253243, 'Aparato', 'Christine', '', 'Test', 'Instructor', 17, 28, 1, NULL),
(29, 123456789, 'Thomas', 'Daryyl', 'P', '', 'Program Head', 43, 29, 1, 'Thomas.5f46a0044a035.jpg'),
(30, 2000066525, 'Aparato', 'Christine', '', '', 'Instructor', 43, 30, 1, NULL),
(32, 89896565, 'Mendoza', 'Setty', 'G', '', 'Instructor', 51, 32, 1, NULL),
(34, 987654321, 'De peralta', 'hush', '', '', 'Instructor', 51, 34, 1, NULL),
(35, 147258369, 'Legarde', 'Dianne', '', '', 'Instructor', 43, 35, 1, NULL),
(36, 963852741, 'Abalos', 'Romabel ', 'S', '', 'Instructor', 43, 36, 1, NULL),
(37, 852147963, 'Pacleb', 'Roland', 'P', '', 'Program Head', 51, 37, 1, 'Pacleb.5f5793578529d.jpg'),
(38, 195375465, 'Gajasan', 'Jonathan', 'F', '', 'Instructor', 43, 38, 1, NULL),
(39, 1236544789, 'Teruel', 'Jasper Jeric', 'B', '', 'Instructor', 43, 39, 1, NULL),
(40, 14562487, 'Thomas', 'Isab', 'P', '', 'Instructor', 43, 40, 1, NULL),
(45, 14567895, 'Doe', 'John', 'L', '', 'Academic Head', 51, 0, 1, 'Doe.5f5651f3b1ecb.jpg'),
(46, 12385739, 'Doe', 'Jane', '', '', 'Program Head', 51, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professors_details`
--

CREATE TABLE `professors_details` (
  `id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors_details`
--

INSERT INTO `professors_details` (`id`, `prof_id`, `school_year_id`, `is_active`) VALUES
(1, 28, 1, 1),
(2, 29, 1, 0),
(3, 30, 1, 1),
(4, 32, 1, 1),
(5, 34, 1, 1),
(6, 35, 1, 1),
(7, 36, 1, 1),
(8, 37, 1, 1),
(9, 38, 1, 1),
(10, 39, 1, 1),
(11, 40, 1, 1),
(12, 45, 1, 1),
(16, 28, 2, 1),
(17, 29, 2, 1),
(18, 30, 2, 1),
(19, 32, 2, 1),
(20, 34, 2, 1),
(21, 35, 2, 1),
(22, 36, 2, 1),
(23, 37, 2, 1),
(24, 38, 2, 1),
(25, 39, 2, 1),
(26, 40, 2, 1),
(27, 45, 2, 1),
(31, 46, 2, 1);

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
  `sect_id` int(11) DEFAULT NULL,
  `school_year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sched_id`, `sched_from`, `sched_to`, `sched_modified`, `prof_id`, `subj_id`, `room_id`, `sect_id`, `school_year_id`) VALUES
(33, '10:00:00', '13:00:00', '2020-09-08 17:26:33', 0, 8, 0, 0, 2),
(36, '07:00:00', '08:30:00', '2020-09-08 17:26:33', 34, 7, 0, 0, 2),
(39, '10:30:00', '12:00:00', '2020-09-08 17:26:33', 0, 8, 6, 0, 2),
(50, '07:00:00', '08:00:00', '2020-09-08 17:26:33', 33, 12, 0, 8, 2),
(69, '10:00:00', '12:00:00', '2020-09-08 17:26:33', 33, 12, 44, 6, 2),
(75, '07:00:00', '08:00:00', '2020-09-08 17:26:33', 35, 6, 6, 9, 2),
(79, '14:00:00', '17:00:00', '2020-09-08 17:26:33', 34, 6, 7, 6, 2),
(80, '07:00:00', '08:30:00', '2020-09-08 17:26:33', 32, 11, 8, 2, 2),
(81, '10:00:00', '12:00:00', '2020-09-08 17:26:33', 32, 10, 8, 7, 2),
(82, '07:00:00', '08:30:00', '2020-09-08 17:26:33', 0, 138, 31, 16, 2),
(83, '08:30:00', '11:30:00', '2020-09-08 17:26:33', 39, 14, 5, 17, 2),
(85, '10:00:00', '11:30:00', '2020-09-08 17:26:33', 0, 45, 8, 18, 2),
(86, '08:00:00', '10:00:00', '2020-09-08 17:37:39', 29, 16, 0, 5, 2),
(87, '07:00:00', '10:00:00', '2020-09-08 17:40:57', 34, 16, 8, 5, 1);

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
(114, 85, 'Wednesday'),
(116, 86, 'Thursday'),
(117, 87, 'Tuesday'),
(118, 87, 'Thursday'),
(119, 86, 'Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `term` tinyint(4) NOT NULL,
  `operation_start` time NOT NULL DEFAULT '07:00:00',
  `operation_end` time NOT NULL DEFAULT '20:00:00',
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `year`, `term`, `operation_start`, `operation_end`, `is_active`) VALUES
(1, '19-20', 1, '07:00:00', '18:00:00', 0),
(2, '19-20', 2, '07:00:00', '20:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sect_id` int(11) NOT NULL,
  `sect_name` varchar(50) NOT NULL,
  `chk_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sect_id`, `sect_name`, `chk_id`, `level_id`) VALUES
(2, 'BSIT602', 0, 3),
(3, 'BSIT - 701', 1, 9),
(4, 'BSIT103', 0, 1),
(5, 'BSIT - 201', 1, 4),
(6, 'BSIT - 301', 1, 5),
(7, 'BSIT401', 0, 2),
(8, 'BSIT - 801', 1, 10),
(9, 'BSIT - 501', 1, 7),
(10, 'BSIT - 601', 1, 8),
(16, 'ABM101', 0, 1),
(17, 'STEM201', 0, 2),
(18, 'ABM102', 0, 1),
(21, 'STEM101', 0, 1),
(31, 'BSIT - 101', 1, 3),
(41, 'BSIT - 401', 1, 6),
(51, 'BSCS - 101', 7, 3),
(61, 'BSCS - 201', 7, 3),
(71, 'BSCS - 301', 0, 5),
(81, 'BSCS - 401', 0, 6),
(91, 'BSCS - 501', 0, 7),
(101, 'BSCS - 601', 0, 8),
(111, 'BSCS -701', 0, 9),
(121, 'BSCS - 801', 0, 10),
(131, 'BSIS - 101', 0, 3),
(141, 'BSIS - 201', 0, 4),
(151, 'BSIS -301', 0, 5),
(161, 'BSIS - 401', 0, 6),
(171, 'BSIS - 501', 0, 7),
(181, 'BSIS - 601', 0, 8),
(191, 'BSIS - 701', 0, 9),
(201, 'BSIS - 801', 0, 10),
(211, 'BSBA - 101', 0, 3),
(221, 'BSBA - 201', 0, 4),
(231, 'bsba - 301', 0, 5),
(241, 'BSBA - 401', 0, 6),
(251, 'BSBA - 501', 0, 7),
(261, 'BSBA - 601', 0, 8),
(271, 'BSBA - 701', 0, 9),
(281, 'BSBA - 801', 0, 10),
(291, 'BSA - 101', 0, 3),
(301, 'BSA - 201', 0, 4),
(311, 'BSA- 301', 0, 5),
(321, 'BSA - 401', 0, 6),
(331, 'BSA - 501', 0, 7),
(341, 'BSA - 601', 0, 8),
(351, 'BSA - 701', 0, 9),
(361, 'BSA - 801', 0, 10),
(371, 'BSAIS - 101', 0, 3),
(381, 'BSAIS - 201', 0, 4),
(391, 'BSAIS - 301', 0, 5),
(401, 'BSAIS - 401', 0, 6),
(411, 'BSAIS - 501', 0, 7),
(421, 'BSAIS - 601', 0, 8),
(431, 'BSAIS - 701', 0, 9),
(441, 'BSAIS - 801', 0, 10),
(451, 'ABM - 101', 31, 0),
(461, 'ABM - 201', 0, 1),
(471, 'ABM - 301', 0, 2),
(481, 'ABM - 401', 0, 2),
(491, 'STEM - 101', 0, 1),
(501, 'STEM - 201', 0, 1),
(511, 'STEM - 301', 0, 2),
(521, 'STEM - 401', 0, 2),
(531, 'HUMMS - 101', 0, 1),
(541, 'HUMMS - 201', 0, 1),
(551, 'HUMMS - 301', 0, 2),
(561, 'HUMMS - 401', 0, 2),
(571, 'GAS - 101', 0, 1),
(581, 'GAS - 201', 0, 1),
(591, 'GAS - 301', 0, 2),
(601, 'GAS - 401', 0, 2),
(611, 'IT - 101', 0, 1),
(621, 'IT - 201', 0, 1),
(631, 'IT - 301', 0, 2),
(641, 'IT  401', 0, 2),
(651, 'ARTS - 101', 0, 1),
(661, 'ARTS - 201', 0, 1),
(671, 'ARTS - 301', 0, 2),
(681, 'ARTS - 401', 0, 2),
(691, 'CCT - 101', 0, 1),
(701, 'CCT - 201', 0, 1),
(711, 'CCT - 301', 0, 2),
(721, 'CCT - 401', 0, 2),
(731, 'CE - 101', 0, 1),
(741, 'CE - 201', 0, 1),
(751, 'CE - 301', 0, 2),
(761, 'CE - 401', 0, 2),
(771, 'HO - 101', 0, 1),
(781, 'HO - 201', 0, 1),
(791, 'HO - 301', 0, 2),
(801, 'HO - 401', 0, 2),
(811, 'TO - 101', 0, 1),
(821, 'TO - 201', 0, 1),
(831, 'TO - 301', 0, 2),
(841, 'TO - 401', 0, 2),
(851, 'RCO - 101', 0, 1),
(861, 'RCO - 201', 0, 1),
(871, 'RCO - 301', 0, 2),
(881, 'RCO - 401', 0, 2),
(891, 'CA - 101', 0, 1),
(901, 'CA - 201', 0, 1),
(911, 'CA - 301', 0, 2),
(921, 'CA - 401', 0, 2),
(923, 'STEM - 501', 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections_details`
--

CREATE TABLE `sections_details` (
  `id` int(11) NOT NULL,
  `sect_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections_details`
--

INSERT INTO `sections_details` (`id`, `sect_id`, `school_year_id`, `is_active`) VALUES
(1, 2, 1, 1),
(2, 3, 1, 1),
(3, 4, 1, 1),
(4, 5, 1, 1),
(5, 6, 1, 1),
(6, 7, 1, 1),
(7, 8, 1, 1),
(8, 9, 1, 1),
(9, 10, 1, 1),
(10, 16, 1, 1),
(11, 17, 1, 1),
(12, 18, 1, 1),
(13, 21, 1, 1),
(14, 31, 1, 1),
(15, 41, 1, 1),
(16, 51, 1, 1),
(17, 61, 1, 1),
(18, 71, 1, 1),
(19, 81, 1, 1),
(20, 91, 1, 1),
(21, 101, 1, 1),
(22, 111, 1, 1),
(23, 121, 1, 1),
(24, 131, 1, 1),
(25, 141, 1, 1),
(26, 151, 1, 1),
(27, 161, 1, 1),
(28, 171, 1, 1),
(29, 181, 1, 1),
(30, 191, 1, 1),
(31, 201, 1, 1),
(32, 211, 1, 1),
(33, 221, 1, 1),
(34, 231, 1, 1),
(35, 241, 1, 1),
(36, 251, 1, 1),
(37, 261, 1, 1),
(38, 271, 1, 1),
(39, 281, 1, 1),
(40, 291, 1, 1),
(41, 301, 1, 1),
(42, 311, 1, 1),
(43, 321, 1, 1),
(44, 331, 1, 1),
(45, 341, 1, 1),
(46, 351, 1, 1),
(47, 361, 1, 1),
(48, 371, 1, 1),
(49, 381, 1, 1),
(50, 391, 1, 1),
(51, 401, 1, 1),
(52, 411, 1, 1),
(53, 421, 1, 1),
(54, 431, 1, 1),
(55, 441, 1, 1),
(56, 451, 1, 1),
(57, 461, 1, 1),
(58, 471, 1, 1),
(59, 481, 1, 1),
(60, 491, 1, 1),
(61, 501, 1, 1),
(62, 511, 1, 1),
(63, 521, 1, 1),
(64, 531, 1, 1),
(65, 541, 1, 1),
(66, 551, 1, 1),
(67, 561, 1, 1),
(68, 571, 1, 1),
(69, 581, 1, 1),
(70, 591, 1, 1),
(71, 601, 1, 1),
(72, 611, 1, 1),
(73, 621, 1, 1),
(74, 631, 1, 1),
(75, 641, 1, 1),
(76, 651, 1, 1),
(77, 661, 1, 1),
(78, 671, 1, 1),
(79, 681, 1, 1),
(80, 691, 1, 1),
(81, 701, 1, 1),
(82, 711, 1, 1),
(83, 721, 1, 1),
(84, 731, 1, 1),
(85, 741, 1, 1),
(86, 751, 1, 1),
(87, 761, 1, 1),
(88, 771, 1, 1),
(89, 781, 1, 1),
(90, 791, 1, 1),
(91, 801, 1, 1),
(92, 811, 1, 1),
(93, 821, 1, 1),
(94, 831, 1, 1),
(95, 841, 1, 1),
(96, 851, 1, 1),
(97, 861, 1, 1),
(98, 871, 1, 1),
(99, 881, 1, 1),
(100, 891, 1, 1),
(101, 901, 1, 1),
(102, 911, 1, 1),
(103, 921, 1, 1),
(128, 2, 2, 0),
(129, 3, 2, 0),
(130, 4, 2, 0),
(131, 5, 2, 1),
(132, 6, 2, 1),
(133, 7, 2, 0),
(134, 8, 2, 1),
(135, 9, 2, 1),
(136, 10, 2, 1),
(137, 16, 2, 0),
(138, 17, 2, 0),
(139, 18, 2, 0),
(140, 21, 2, 1),
(141, 31, 2, 1),
(142, 41, 2, 1),
(143, 51, 2, 1),
(144, 61, 2, 1),
(145, 71, 2, 1),
(146, 81, 2, 1),
(147, 91, 2, 1),
(148, 101, 2, 1),
(149, 111, 2, 1),
(150, 121, 2, 1),
(151, 131, 2, 1),
(152, 141, 2, 1),
(153, 151, 2, 1),
(154, 161, 2, 1),
(155, 171, 2, 1),
(156, 181, 2, 1),
(157, 191, 2, 1),
(158, 201, 2, 1),
(159, 211, 2, 1),
(160, 221, 2, 1),
(161, 231, 2, 1),
(162, 241, 2, 1),
(163, 251, 2, 1),
(164, 261, 2, 1),
(165, 271, 2, 1),
(166, 281, 2, 1),
(167, 291, 2, 1),
(168, 301, 2, 1),
(169, 311, 2, 1),
(170, 321, 2, 1),
(171, 331, 2, 1),
(172, 341, 2, 1),
(173, 351, 2, 1),
(174, 361, 2, 1),
(175, 371, 2, 1),
(176, 381, 2, 1),
(177, 391, 2, 1),
(178, 401, 2, 1),
(179, 411, 2, 1),
(180, 421, 2, 1),
(181, 431, 2, 1),
(182, 441, 2, 1),
(183, 451, 2, 1),
(184, 461, 2, 1),
(185, 471, 2, 1),
(186, 481, 2, 1),
(187, 491, 2, 1),
(188, 501, 2, 1),
(189, 511, 2, 1),
(190, 521, 2, 1),
(191, 531, 2, 1),
(192, 541, 2, 1),
(193, 551, 2, 1),
(194, 561, 2, 1),
(195, 571, 2, 1),
(196, 581, 2, 1),
(197, 591, 2, 1),
(198, 601, 2, 1),
(199, 611, 2, 1),
(200, 621, 2, 1),
(201, 631, 2, 1),
(202, 641, 2, 1),
(203, 651, 2, 1),
(204, 661, 2, 1),
(205, 671, 2, 1),
(206, 681, 2, 1),
(207, 691, 2, 1),
(208, 701, 2, 1),
(209, 711, 2, 1),
(210, 721, 2, 1),
(211, 731, 2, 1),
(212, 741, 2, 1),
(213, 751, 2, 1),
(214, 761, 2, 1),
(215, 771, 2, 1),
(216, 781, 2, 1),
(217, 791, 2, 1),
(218, 801, 2, 1),
(219, 811, 2, 1),
(220, 821, 2, 1),
(221, 831, 2, 1),
(222, 841, 2, 1),
(223, 851, 2, 1),
(224, 861, 2, 1),
(225, 871, 2, 1),
(226, 881, 2, 1),
(227, 891, 2, 1),
(228, 901, 2, 1),
(229, 911, 2, 1),
(230, 921, 2, 1),
(255, 921, 1, 1),
(256, 923, 1, 1);

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
(5, 1, 6, 3),
(8, 1, 6, 3),
(9, 1, 9, 3),
(10, 1, 10, 3),
(11, 1, 9, 3),
(12, 1, 59, 8),
(13, 1, 18, 7),
(14, 1, 15, 4),
(15, 1, 25, 5),
(16, 1, 29, 9),
(21, 1, 10, 3),
(31, 1, 11, 3),
(41, 1, 12, 3),
(51, 1, 13, 3),
(61, 1, 14, 3),
(71, 1, 15, 4),
(81, 1, 16, 4),
(91, 1, 18, 4),
(101, 1, 19, 4),
(111, 1, 20, 4),
(121, 1, 21, 4),
(131, 1, 22, 4),
(141, 1, 23, 4),
(151, 1, 24, 4),
(161, 1, 25, 7),
(171, 1, 26, 7),
(181, 1, 27, 7),
(191, 1, 46, 7),
(201, 1, 47, 7),
(211, 1, 48, 7),
(221, 1, 32, 7),
(231, 1, 31, 7),
(241, 1, 33, 7),
(251, 1, 34, 7),
(261, 1, 55, 8),
(271, 1, 36, 8),
(281, 1, 37, 8),
(291, 1, 38, 6),
(301, 1, 87, 3),
(311, 1, 25, 5),
(321, 1, 26, 5),
(331, 1, 27, 5),
(341, 1, 28, 5),
(351, 1, 29, 5),
(361, 1, 30, 5),
(371, 1, 31, 5),
(381, 1, 32, 5),
(391, 1, 33, 5),
(401, 1, 34, 5),
(411, 1, 35, 6),
(421, 1, 36, 6),
(431, 1, 37, 6),
(441, 1, 39, 6),
(451, 1, 40, 6),
(461, 1, 41, 6),
(471, 1, 42, 6),
(481, 1, 43, 6),
(491, 1, 44, 6),
(501, 1, 45, 7),
(511, 1, 49, 7),
(521, 1, 50, 7),
(531, 1, 52, 7),
(541, 1, 53, 7),
(551, 1, 54, 7),
(561, 1, 5, 3),
(571, 1, 7, 3),
(581, 1, 8, 3),
(591, 1, 17, 4),
(601, 1, 56, 8),
(611, 1, 57, 8),
(621, 1, 58, 8),
(631, 1, 62, 8),
(641, 1, 63, 8),
(651, 1, 72, 8),
(661, 1, 73, 7),
(671, 1, 61, 8),
(681, 1, 64, 8),
(691, 1, 59, 8),
(701, 1, 60, 8),
(711, 1, 65, 9),
(721, 1, 66, 9),
(731, 1, 67, 9),
(741, 1, 68, 9),
(751, 1, 69, 9),
(761, 1, 70, 9),
(771, 1, 71, 9),
(781, 1, 74, 10),
(791, 31, 75, 1),
(801, 31, 76, 1),
(811, 31, 77, 1),
(821, 31, 78, 1),
(831, 31, 79, 1),
(841, 31, 13, 1),
(851, 31, 81, 1),
(861, 31, 82, 1),
(871, 31, 83, 2),
(881, 31, 84, 2),
(891, 31, 85, 2),
(901, 31, 86, 2),
(911, 31, 87, 2),
(921, 31, 103, 2),
(931, 31, 88, 2),
(941, 31, 89, 2),
(951, 31, 90, 2),
(961, 41, 75, 1),
(971, 41, 76, 1),
(981, 41, 77, 1),
(991, 41, 78, 1),
(1001, 41, 79, 1),
(1011, 41, 13, 1),
(1021, 41, 99, 1),
(1031, 41, 100, 1),
(1041, 41, 83, 2),
(1051, 41, 84, 2),
(1052, 7, 6, 3);

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
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role_level`, `prof_id`) VALUES
(1, 'Admin', 'hushsua@gmal.com', '$2y$10$2fgPZSPWqfHVUx75//RiIezBP5cKv5hpWi7tGn2Nhu7rn/QVLrv52', 4, 0),
(28, '3232532', 'Test.com', '$2y$10$/wGSM4yn76j1Tqtpp2nP8u0YnswezJE/8MIgP86dJgKAJR87oC9AO', 1, 28),
(29, '88888888', '', '$2y$10$G0XCro/zxWEwl8SgZDRXy.ibKBl5Fkk.3E9O6Z8dyig5FAOVCEbyy', 1, 29),
(30, '0200006652', 'chris_tine09@yahoo.com', '$2y$10$WpVKlFearFw1GuG/JVZOC.sH24NUekp0OOwE6qzfJeSRpLeLRroPi', 1, 30),
(32, 'hellow', 'hahahahha@gmail.com', '$2y$10$U2XkxhRYZzeIRTpcwqKpLuMc2pI/Fv8cYG8s0l1uARb/ws8gUZ3cu', 1, 32),
(34, '987654321', '', '$2y$10$5MipXSVUGbftbWEwk1wYkeTPGG5B7KCV0TzxBXR79T1hjbnmGAt7i', 1, 34),
(35, '147258369', '', '$2y$10$nZUlO7QaxjYsTyjSzm5EcudUa9/3I8nhJUDzrPN5DS6/SSzsEFLuO', 1, 35),
(36, '963852741', '', '$2y$10$jjFqbgPloHcZcVLHsoFDFOcmOjOL.SlXLJzQ4xeT83ora8yXXF/XO', 1, 36),
(37, '852147963', '', '$2y$10$1CMi8YGI1QtcEhP01JT/q.iyVdmUFqU/zubjB8AyeF.fy.YPSv/w.', 1, 37),
(38, '195375465', '', '$2y$10$0XXOng7q6MUnuwRyWbGIjuX63iEpSpyD9tR.luH61.vTUzmwd7.wi', 1, 38),
(39, '1236544789', '', '$2y$10$jkzqN9in/voKfVB9RDYzoOMIrtDp.hXZkJqmIfL/LkunAep7ehq1.', 1, 39),
(40, 'isabelthomas', 'Isabelthomas@yahoo.com', '$2y$10$ZrwGj8V.waDuoIdsp8pC5.VStErNRyVjlXzg5oQWO05JhaBArwFV.', 1, 40),
(44, 'Dean', '', '$2y$10$6ThSEgoLZL3ei/ThlYTOjOefpNxCFRuKjkzvfJe/8b7SAe/3cIywO', 2, 0),
(45, 'ITHead', '', '$2y$10$fpYZ1G2SMdw0lc8duGJ9buvEawYFMskuz/fu8Qwc1Wp82imebAVie', 2, 0),
(46, '14567895', '', '$2y$10$P1t7rrmXPaHgV1dBNKJaB.t2CGm4vsnV9ReU9.P80MWp12T3KF68S', 0, 45),
(47, '12385739', '', '$2y$10$Imj.aOue9P1O89lRplzCzO/KW/v4cwfUNYB8WPW1faIKTuduNw/8q', 0, 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
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
-- Indexes for table `professors_details`
--
ALTER TABLE `professors_details`
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
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sect_id`);

--
-- Indexes for table `sections_details`
--
ALTER TABLE `sections_details`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `professors_details`
--
ALTER TABLE `professors_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `schedules_day`
--
ALTER TABLE `schedules_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=924;

--
-- AUTO_INCREMENT for table `sections_details`
--
ALTER TABLE `sections_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `subjects_to_checklist`
--
ALTER TABLE `subjects_to_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
