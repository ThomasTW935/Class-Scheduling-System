-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 03:08 PM
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
(7, 'BSCS', 53, 1),
(8, 'STEM', 68, 0),
(11, 'BSTM', 47, 1),
(21, 'BSTM', 47, 0),
(31, 'ABM', 68, 1),
(41, 'STEM', 69, 1),
(51, 'IT', 51, 1),
(61, 'Computer Science', 91, 1),
(71, 'HUMSS', 68, 0),
(81, 'HUMSS', 70, 1),
(91, 'GAS', 71, 1),
(101, 'IT', 72, 1),
(111, 'Arts', 73, 1),
(121, 'CCT', 74, 1),
(131, 'CE', 75, 1),
(141, 'HO', 76, 1),
(151, 'TO', 77, 1),
(161, 'RCO', 78, 1),
(171, 'BA', 241, 1),
(181, 'BA', 241, 0),
(191, 'BA', 54, 1),
(201, 'BA', 54, 0),
(211, 'CA', 79, 1);

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
(61, 'BMA', 'Bachelor of Multimedia Arts', 'course', 1),
(62, 'BACOM', 'Bachelor of Arts in Communication', 'course', 1),
(63, 'HRS', 'Hospitality and Restaurant Services', 'course', 1),
(64, 'HRA', 'Hotel and Restaurant Administration', 'course', 1),
(65, 'TEM', 'Tourism and Events Management', 'course', 1),
(66, 'IT', 'Information Technolo', 'course', 1),
(67, 'CS', 'Associate in Computer Technology', 'course', 1),
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
(91, 'CS', 'Computer Science', 'faculty', 1),
(101, 'IT CS', 'IT/CS', 'faculty', 0),
(111, 'ABM', 'Accountancy, Business and Management', 'faculty', 1),
(121, 'STEM', 'Science, Technology, Engineering and Mathematics', 'faculty', 1),
(131, 'HUMSS', 'Humanities and Social Sciences', 'faculty', 1),
(141, 'GAS', 'General Academic Strand', 'faculty', 1),
(151, 'IT in', 'IT in Mobile App and Web DEvelopment', 'faculty', 1),
(161, 'DA', 'Digital Arts', 'faculty', 1),
(171, 'CCT', 'Computer and Communications Technology', 'faculty', 1),
(181, 'CE', 'Consumer Electronics', 'faculty', 1),
(191, 'HO', 'Hotel Operations', 'faculty', 1),
(201, 'TO', 'Tourism Operations', 'faculty', 1),
(211, 'RCO', 'Restaurant and Cafe Operations', 'faculty', 1),
(221, 'CA', 'Culinary Arts', 'faculty', 1),
(231, 'IS', 'Information System', 'faculty', 1),
(241, 'BA', 'Business Administration', 'faculty', 1),
(251, 'BSA', 'Accountancy', 'faculty', 1),
(261, 'AIS', 'Accounting Information System', 'faculty', 1),
(271, 'CM', 'Culinary Management', 'faculty', 1),
(281, 'RTC', 'Retail Technology and Consumer', 'faculty', 1),
(291, 'MA', 'Management Accounting', 'faculty', 1),
(301, 'HM', 'Hospitalilty Management', 'faculty', 1),
(311, 'ComEn', 'Computer Engineering', 'faculty', 1),
(321, 'BMA', 'Multimedia Arts', 'faculty', 1),
(331, 'BAC', 'Bachelor of Arts in Communication', 'faculty', 1),
(341, 'HRA', 'Hotel and Restaurant Services', 'faculty', 1),
(351, 'TEM', 'Tourism and Events Management', 'faculty', 1),
(361, 'InfoT', 'Information Technology', 'faculty', 1),
(371, 'ACT', 'Associate in Computer Technology', 'faculty', 1),
(381, 'ART', 'Associate in Retail Technology', 'faculty', 1),
(391, 'PCA', 'Professional Culinary Arts', 'faculty', 1),
(401, 'TM', 'Tourism Management', 'faculty', 1),
(411, 'RTCS', 'Retail Technology and Consumer', 'faculty', 1);

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
(1, 'Gr.11 - 1stTerm', 'Grade 11 1st Term', 'strand'),
(2, 'Gr.12 1st Term', 'Grade 12 1st Term', 'strand'),
(3, '1st1sem', '1st Year First Semester', 'course'),
(4, '1st2sem', '1st Year Second Semester', 'course'),
(5, '2nd1sem', '2nd Year First Semester', 'course'),
(6, '2nd2sem', '2nd Year Second Semester', 'course'),
(7, '3rd1sem', '3rd Year First Semester', 'course'),
(8, '3rd2sem', '3rd Year Second Semester', 'course'),
(9, '4th1sem', '4th Year First Semester', 'course'),
(10, '4th2sem', '4th Year Second Semester', 'course'),
(11, 'Gr.11 - 2ndTerm', 'Grade 11 2nd Term', 'strand'),
(12, 'Gr.12 2ndTerm', 'Grade 12 2nd Term', 'strand');

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
  `prof_active` tinyint(1) NOT NULL DEFAULT 1,
  `prof_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `emp_no`, `last_name`, `first_name`, `middle_initial`, `suffix`, `type`, `dept_id`, `prof_active`, `prof_img`) VALUES
(28, 323253243, 'Aparato', 'Christine', '', 'Test', 'Instructor', 17, 1, NULL),
(29, 123456789, 'Thomas', 'Daryyl', 'P', '', 'Program Head', 43, 1, 'Thomas.5f46a0044a035.jpg'),
(30, 2000066525, 'Aparato', 'Christine', '', '', 'Instructor', 43, 1, NULL),
(32, 89896565, 'Mendoza', 'Setty', 'G', '', 'Instructor', 51, 1, NULL),
(34, 987654321, 'De peralta', 'hush', '', '', 'Instructor', 51, 1, NULL),
(35, 147258369, 'Legarde', 'Dianne', '', '', 'Instructor', 43, 1, NULL),
(36, 963852741, 'Abalos', 'Romabel ', 'S', '', 'Instructor', 43, 1, NULL),
(37, 852147963, 'Pacleb', 'Roland', 'P', '', 'Program Head', 43, 1, 'Pacleb.5f5793578529d.jpg'),
(38, 195375465, 'Gajasan', 'Jonathan', 'F', '', 'Instructor', 43, 1, NULL),
(39, 1236544789, 'Teruel', 'Jasper Jeric', 'B', '', 'Instructor', 43, 1, NULL),
(40, 14562487, 'Thomas', 'Isab', 'P', '', 'Instructor', 43, 1, NULL),
(45, 123456, 'Doe', 'John', 'L', '', 'MIS', 51, 1, 'Doe.5f5651f3b1ecb.jpg'),
(46, 12385739, 'Doe', 'Jane', '', '', 'Program Head', 43, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professors_details`
--

CREATE TABLE `professors_details` (
  `id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors_details`
--

INSERT INTO `professors_details` (`id`, `prof_id`, `school_year_id`, `is_active`, `date_created`) VALUES
(1, 28, 1, 1, '2020-09-19 17:10:17'),
(2, 29, 1, 0, '2020-09-19 17:10:17'),
(3, 30, 1, 1, '2020-09-19 17:10:17'),
(4, 32, 1, 1, '2020-09-19 17:10:17'),
(5, 34, 1, 1, '2020-09-19 17:10:17'),
(6, 35, 1, 1, '2020-09-19 17:10:17'),
(7, 36, 1, 1, '2020-09-19 17:10:17'),
(8, 37, 1, 1, '2020-09-19 17:10:17'),
(9, 38, 1, 1, '2020-09-19 17:10:17'),
(10, 39, 1, 1, '2020-09-19 17:10:17'),
(11, 40, 1, 1, '2020-09-19 17:10:17'),
(12, 45, 1, 1, '2020-09-19 17:10:17'),
(16, 28, 2, 1, '2020-09-19 17:10:17'),
(17, 29, 2, 1, '2020-09-19 17:10:17'),
(18, 30, 2, 1, '2020-09-19 17:10:17'),
(19, 32, 2, 1, '2020-09-19 17:10:17'),
(20, 34, 2, 1, '2020-09-19 17:10:17'),
(21, 35, 2, 1, '2020-09-19 17:10:17'),
(22, 36, 2, 1, '2020-09-19 17:10:17'),
(23, 37, 2, 1, '2020-09-19 17:10:17'),
(24, 38, 2, 1, '2020-09-19 17:10:17'),
(25, 39, 2, 1, '2020-09-19 17:10:17'),
(26, 40, 2, 1, '2020-09-19 17:10:17'),
(27, 45, 2, 1, '2020-09-19 17:10:17'),
(31, 46, 2, 1, '2020-09-19 17:10:17'),
(47, 28, 4, 1, '2020-09-19 17:10:49'),
(48, 29, 4, 0, '2020-09-19 17:10:49'),
(49, 30, 4, 1, '2020-09-19 17:10:49'),
(50, 32, 4, 1, '2020-09-19 17:10:49'),
(51, 34, 4, 1, '2020-09-19 17:10:49'),
(52, 35, 4, 1, '2020-09-19 17:10:49'),
(53, 36, 4, 1, '2020-09-19 17:10:49'),
(54, 37, 4, 1, '2020-09-19 17:10:49'),
(55, 38, 4, 1, '2020-09-19 17:10:49'),
(56, 39, 4, 1, '2020-09-19 17:10:49'),
(57, 40, 4, 1, '2020-09-19 17:10:49'),
(58, 45, 4, 1, '2020-09-19 17:10:49'),
(59, 29, 4, 1, '2020-09-19 17:10:49'),
(60, 46, 4, 1, '2020-09-19 17:10:49');

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
  `is_laboratory` tinyint(1) NOT NULL DEFAULT 0,
  `rm_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rm_id`, `rm_name`, `rm_desc`, `rm_floor`, `rm_capacity`, `is_laboratory`, `rm_active`) VALUES
(3, '101', 'Computer Laboratory', 'Ground Floor', 30, 1, 1),
(5, '201', 'Lecture Room', '2nd Floor', 50, 0, 1),
(6, '202', 'Lecture Room', '2nd Floor', 30, 0, 1),
(7, '203', 'Lecture Room', '2nd Floor', 30, 0, 1),
(8, '204', 'Lecture Room', '2nd Floor', 30, 0, 1),
(9, '205', 'Lecture Room', '2nd Floor', 30, 0, 1),
(10, '206', 'Lecture Room', '2nd Floor', 30, 0, 1),
(11, '207', 'Lecture Room', '2nd Floor', 30, 0, 1),
(12, '208', 'Lecture Room', '2nd Floor', 50, 0, 1),
(13, '209', 'Lecture Room', '2nd Floor', 50, 0, 1),
(14, '210', 'Lecture Room', '2nd Floor', 50, 0, 1),
(15, '211', 'Lecture Room', '2nd Floor', 50, 0, 1),
(16, '301', 'Lecture Room', '3rd Floor', 30, 0, 1),
(17, '302', 'Lecture Room', '3rd Floor', 30, 0, 1),
(18, '303', 'Lecture Room', '3rd Floor', 30, 0, 1),
(19, '304', 'Lecture Room', '3rd Floor', 30, 0, 1),
(20, '305', 'Lecture Room', '3rd Floor', 30, 0, 1),
(21, '306', 'Lecture Room', '3rd Floor', 30, 0, 1),
(22, '307', 'Lecture Room', '3rd Floor', 30, 0, 1),
(23, '308', 'Lecture Room', '3rd Floor', 50, 0, 1),
(24, '309', 'Lecture Room', '3rd Floor', 50, 0, 1),
(25, '310', 'Lecture Room', '3rd Floor', 50, 0, 1),
(26, '311', 'Lecture Room', '3rd Floor', 50, 0, 1),
(27, '501', 'Retail', '5th Floor', 30, 1, 1),
(28, '502', 'Broad Casting Studio', '5th Floor', 30, 1, 1),
(29, '503', 'Bar and Dinning', '5th Floor', 30, 1, 1),
(30, '504', 'Computer Laboratory', '5th Floor', 50, 1, 1),
(31, '505', 'Computer Laboratory', '5th Floor', 50, 1, 1),
(32, '506', 'Computer Laboratory', '5th Floor', 50, 1, 1),
(33, '507', 'Computer Laboratory', '5th Floor', 50, 1, 1),
(34, '601', 'Lecture Room', '6th Floor', 30, 0, 1),
(35, '508', 'THM Laboratory', '5th Floor', 30, 1, 1),
(43, '555', 'Computer Laboratory', '5th Floor', 50, 1, 1);

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
(2, '07:00:00', '08:30:00', '2020-09-19 18:21:26', 34, 26, 5, 6, 4),
(5, '08:30:00', '10:00:00', '2020-09-23 05:45:46', 30, 25, 6, 6, 4),
(6, '07:00:00', '08:30:00', '2020-09-19 17:55:10', 30, 31, 5, 6, 4),
(7, '08:30:00', '10:00:00', '2020-09-19 17:55:29', 30, 31, 5, 6, 4),
(8, '10:00:00', '13:00:00', '2020-09-20 04:02:04', 38, 32, 43, 6, 4),
(11, '08:30:00', '10:00:00', '2020-09-23 04:21:02', 36, 77, 13, 451, 4);

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
(6, 2, 'Thursday'),
(11, 2, 'Monday'),
(12, 5, 'Monday'),
(14, 5, 'Thursday'),
(15, 6, 'Wednesday'),
(16, 7, 'Wednesday'),
(17, 8, 'Wednesday'),
(21, 11, 'Monday'),
(22, 11, 'Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `year` varchar(50) NOT NULL,
  `operation_start` time NOT NULL DEFAULT '07:00:00',
  `operation_end` time NOT NULL DEFAULT '20:00:00',
  `hide_schedules` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `year`, `operation_start`, `operation_end`, `hide_schedules`, `is_active`, `date_created`) VALUES
(1, 'SY. 19-20 1st Term', '07:00:00', '19:00:00', 0, 0, '2020-09-18 15:58:03'),
(2, 'SY. 19-20 2nd Term', '07:00:00', '20:00:00', 0, 0, '2020-09-19 15:58:03'),
(4, 'SY. 20-21 1st Term', '07:00:00', '20:00:00', 0, 1, '2020-09-19 17:10:49');

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
(3, 'BSIT - 701', 1, 9),
(4, 'ABM -101', 31, 1),
(5, 'BSIT - 201', 1, 4),
(6, 'BSIT - 301', 1, 5),
(7, 'ABM - 201', 31, 1),
(8, 'BSIT - 801', 1, 10),
(9, 'BSIT - 501', 1, 7),
(10, 'BSIT - 601', 1, 8),
(16, 'ABM - 301', 31, 2),
(31, 'BSIT - 101', 1, 3),
(41, 'BSIT - 401', 1, 6),
(51, 'BSTM - 101', 11, 3),
(61, 'BSTM - 201', 11, 4),
(71, 'BSTM - 301', 11, 5),
(81, 'BSTM - 401', 11, 6),
(91, 'BSTM - 501', 11, 7),
(101, 'BSTM - 601', 11, 8),
(111, 'BSTM -701', 11, 9),
(121, 'BSTM - 801', 11, 10),
(131, 'BSIS - 101', 0, 3),
(141, 'BSIS - 201', 0, 4),
(151, 'BSIS -301', 0, 5),
(161, 'BSIS - 401', 0, 6),
(171, 'BSIS - 501', 0, 7),
(181, 'BSIS - 601', 0, 8),
(191, 'BSIS - 701', 0, 9),
(201, 'BSIS - 801', 0, 10),
(211, 'BSBA - 101', 191, 3),
(221, 'BSBA - 201', 191, 3),
(231, 'BSBA - 301', 191, 5),
(241, 'BSBA - 401', 191, 3),
(251, 'BSBA - 501', 191, 7),
(261, 'BSBA - 601', 191, 8),
(271, 'BSBA - 701', 191, 9),
(281, 'BSBA - 801', 191, 10),
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
(451, 'ABM - 101', 31, 1),
(481, 'ABM - 401', 31, 2),
(491, 'STEM - 101', 41, 1),
(501, 'STEM - 201', 41, 1),
(511, 'STEM - 301', 41, 2),
(521, 'STEM - 401', 41, 2),
(531, 'HUMMS - 101', 81, 1),
(541, 'HUMMS - 201', 81, 1),
(551, 'HUMMS - 301', 81, 2),
(561, 'HUMMS - 401', 81, 2),
(571, 'GAS - 101', 91, 1),
(581, 'GAS - 201', 91, 1),
(591, 'GAS - 301', 91, 2),
(601, 'GAS - 401', 91, 2),
(611, 'IT - 101', 101, 1),
(621, 'IT - 201', 101, 1),
(631, 'IT - 301', 101, 2),
(641, 'IT  401', 101, 2),
(651, 'ARTS - 101', 111, 1),
(661, 'ARTS - 201', 111, 1),
(671, 'ARTS - 301', 111, 2),
(681, 'ARTS - 401', 111, 2),
(691, 'CCT - 101', 121, 1),
(701, 'CCT - 201', 121, 1),
(711, 'CCT - 301', 121, 2),
(721, 'CCT - 401', 121, 2),
(731, 'CE - 101', 131, 1),
(741, 'CE - 201', 131, 1),
(751, 'CE - 301', 131, 2),
(761, 'CE - 401', 131, 2),
(771, 'HO - 101', 141, 2),
(781, 'HO - 201', 141, 2),
(791, 'HO - 301', 141, 2),
(801, 'HO - 401', 141, 2),
(811, 'TO - 101', 151, 1),
(821, 'TO - 201', 151, 1),
(831, 'TO - 301', 151, 2),
(841, 'TO - 401', 151, 2),
(851, 'RCO - 101', 161, 1),
(861, 'RCO - 201', 161, 1),
(871, 'RCO - 301', 161, 2),
(881, 'RCO - 401', 161, 2),
(891, 'CA - 101', 211, 1),
(901, 'CA - 201', 211, 1),
(911, 'CA - 301', 0, 2),
(921, 'CA - 401', 0, 2),
(923, 'STEM - 501', 41, 1),
(924, 'BSIT - 202', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sections_details`
--

CREATE TABLE `sections_details` (
  `id` int(11) NOT NULL,
  `sect_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections_details`
--

INSERT INTO `sections_details` (`id`, `sect_id`, `school_year_id`, `is_active`, `date_created`) VALUES
(2, 3, 1, 1, '2020-09-19 17:07:42'),
(3, 4, 1, 0, '2020-09-19 17:07:42'),
(4, 5, 1, 1, '2020-09-19 17:07:42'),
(5, 6, 1, 1, '2020-09-19 17:07:42'),
(6, 7, 1, 0, '2020-09-19 17:07:42'),
(7, 8, 1, 1, '2020-09-19 17:07:42'),
(8, 9, 1, 1, '2020-09-19 17:07:42'),
(9, 10, 1, 1, '2020-09-19 17:07:42'),
(10, 16, 1, 0, '2020-09-19 17:07:42'),
(14, 31, 1, 1, '2020-09-19 17:07:42'),
(15, 41, 1, 1, '2020-09-19 17:07:42'),
(16, 51, 1, 1, '2020-09-19 17:07:42'),
(17, 61, 1, 1, '2020-09-19 17:07:42'),
(18, 71, 1, 1, '2020-09-19 17:07:42'),
(19, 81, 1, 1, '2020-09-19 17:07:42'),
(20, 91, 1, 1, '2020-09-19 17:07:42'),
(21, 101, 1, 1, '2020-09-19 17:07:42'),
(22, 111, 1, 1, '2020-09-19 17:07:42'),
(23, 121, 1, 1, '2020-09-19 17:07:42'),
(24, 131, 1, 0, '2020-09-19 17:07:42'),
(25, 141, 1, 0, '2020-09-19 17:07:42'),
(26, 151, 1, 0, '2020-09-19 17:07:42'),
(27, 161, 1, 0, '2020-09-19 17:07:42'),
(28, 171, 1, 0, '2020-09-19 17:07:42'),
(29, 181, 1, 0, '2020-09-19 17:07:42'),
(30, 191, 1, 0, '2020-09-19 17:07:42'),
(31, 201, 1, 0, '2020-09-19 17:07:42'),
(32, 211, 1, 1, '2020-09-19 17:07:42'),
(33, 221, 1, 1, '2020-09-19 17:07:42'),
(34, 231, 1, 1, '2020-09-19 17:07:42'),
(35, 241, 1, 1, '2020-09-19 17:07:42'),
(36, 251, 1, 1, '2020-09-19 17:07:42'),
(37, 261, 1, 1, '2020-09-19 17:07:42'),
(38, 271, 1, 1, '2020-09-19 17:07:42'),
(39, 281, 1, 1, '2020-09-19 17:07:42'),
(40, 291, 1, 0, '2020-09-19 17:07:42'),
(41, 301, 1, 0, '2020-09-19 17:07:42'),
(42, 311, 1, 0, '2020-09-19 17:07:42'),
(43, 321, 1, 0, '2020-09-19 17:07:42'),
(44, 331, 1, 0, '2020-09-19 17:07:42'),
(45, 341, 1, 0, '2020-09-19 17:07:42'),
(46, 351, 1, 0, '2020-09-19 17:07:42'),
(47, 361, 1, 0, '2020-09-19 17:07:42'),
(48, 371, 1, 0, '2020-09-19 17:07:42'),
(49, 381, 1, 0, '2020-09-19 17:07:42'),
(50, 391, 1, 0, '2020-09-19 17:07:42'),
(51, 401, 1, 0, '2020-09-19 17:07:42'),
(52, 411, 1, 0, '2020-09-19 17:07:42'),
(53, 421, 1, 0, '2020-09-19 17:07:42'),
(54, 431, 1, 0, '2020-09-19 17:07:42'),
(55, 441, 1, 0, '2020-09-19 17:07:42'),
(56, 451, 1, 1, '2020-09-19 17:07:42'),
(59, 481, 1, 1, '2020-09-19 17:07:42'),
(60, 491, 1, 1, '2020-09-19 17:07:42'),
(61, 501, 1, 1, '2020-09-19 17:07:42'),
(62, 511, 1, 1, '2020-09-19 17:07:42'),
(63, 521, 1, 1, '2020-09-19 17:07:42'),
(64, 531, 1, 1, '2020-09-19 17:07:42'),
(65, 541, 1, 1, '2020-09-19 17:07:42'),
(66, 551, 1, 1, '2020-09-19 17:07:42'),
(67, 561, 1, 1, '2020-09-19 17:07:42'),
(68, 571, 1, 1, '2020-09-19 17:07:42'),
(69, 581, 1, 1, '2020-09-19 17:07:42'),
(70, 591, 1, 1, '2020-09-19 17:07:42'),
(71, 601, 1, 1, '2020-09-19 17:07:42'),
(72, 611, 1, 1, '2020-09-19 17:07:42'),
(73, 621, 1, 1, '2020-09-19 17:07:42'),
(74, 631, 1, 1, '2020-09-19 17:07:42'),
(75, 641, 1, 1, '2020-09-19 17:07:42'),
(76, 651, 1, 1, '2020-09-19 17:07:42'),
(77, 661, 1, 1, '2020-09-19 17:07:42'),
(78, 671, 1, 1, '2020-09-19 17:07:42'),
(79, 681, 1, 1, '2020-09-19 17:07:42'),
(80, 691, 1, 1, '2020-09-19 17:07:42'),
(81, 701, 1, 1, '2020-09-19 17:07:42'),
(82, 711, 1, 1, '2020-09-19 17:07:42'),
(83, 721, 1, 1, '2020-09-19 17:07:42'),
(84, 731, 1, 1, '2020-09-19 17:07:42'),
(85, 741, 1, 1, '2020-09-19 17:07:42'),
(86, 751, 1, 1, '2020-09-19 17:07:42'),
(87, 761, 1, 1, '2020-09-19 17:07:42'),
(88, 771, 1, 1, '2020-09-19 17:07:42'),
(89, 781, 1, 1, '2020-09-19 17:07:42'),
(90, 791, 1, 1, '2020-09-19 17:07:42'),
(91, 801, 1, 1, '2020-09-19 17:07:42'),
(92, 811, 1, 1, '2020-09-19 17:07:42'),
(93, 821, 1, 1, '2020-09-19 17:07:42'),
(94, 831, 1, 1, '2020-09-19 17:07:42'),
(95, 841, 1, 1, '2020-09-19 17:07:42'),
(96, 851, 1, 1, '2020-09-19 17:07:42'),
(97, 861, 1, 1, '2020-09-19 17:07:42'),
(98, 871, 1, 1, '2020-09-19 17:07:42'),
(99, 881, 1, 1, '2020-09-19 17:07:42'),
(100, 891, 1, 1, '2020-09-19 17:07:42'),
(101, 901, 1, 1, '2020-09-19 17:07:42'),
(102, 911, 1, 0, '2020-09-19 17:07:42'),
(103, 921, 1, 0, '2020-09-19 17:07:42'),
(129, 3, 2, 0, '2020-09-19 17:07:42'),
(130, 4, 2, 0, '2020-09-19 17:07:42'),
(131, 5, 2, 1, '2020-09-19 17:07:42'),
(132, 6, 2, 1, '2020-09-19 17:07:42'),
(133, 7, 2, 0, '2020-09-19 17:07:42'),
(134, 8, 2, 1, '2020-09-19 17:07:42'),
(135, 9, 2, 1, '2020-09-19 17:07:42'),
(136, 10, 2, 1, '2020-09-19 17:07:42'),
(137, 16, 2, 0, '2020-09-19 17:07:42'),
(141, 31, 2, 1, '2020-09-19 17:07:42'),
(142, 41, 2, 1, '2020-09-19 17:07:42'),
(143, 51, 2, 1, '2020-09-19 17:07:42'),
(144, 61, 2, 1, '2020-09-19 17:07:42'),
(145, 71, 2, 1, '2020-09-19 17:07:42'),
(146, 81, 2, 1, '2020-09-19 17:07:42'),
(147, 91, 2, 1, '2020-09-19 17:07:42'),
(148, 101, 2, 1, '2020-09-19 17:07:42'),
(149, 111, 2, 1, '2020-09-19 17:07:42'),
(150, 121, 2, 1, '2020-09-19 17:07:42'),
(151, 131, 2, 0, '2020-09-19 17:07:42'),
(152, 141, 2, 0, '2020-09-19 17:07:42'),
(153, 151, 2, 0, '2020-09-19 17:07:42'),
(154, 161, 2, 0, '2020-09-19 17:07:42'),
(155, 171, 2, 0, '2020-09-19 17:07:42'),
(156, 181, 2, 0, '2020-09-19 17:07:42'),
(157, 191, 2, 0, '2020-09-19 17:07:42'),
(158, 201, 2, 0, '2020-09-19 17:07:42'),
(159, 211, 2, 1, '2020-09-19 17:07:42'),
(160, 221, 2, 1, '2020-09-19 17:07:42'),
(161, 231, 2, 1, '2020-09-19 17:07:42'),
(162, 241, 2, 1, '2020-09-19 17:07:42'),
(163, 251, 2, 1, '2020-09-19 17:07:42'),
(164, 261, 2, 1, '2020-09-19 17:07:42'),
(165, 271, 2, 1, '2020-09-19 17:07:42'),
(166, 281, 2, 1, '2020-09-19 17:07:42'),
(167, 291, 2, 0, '2020-09-19 17:07:42'),
(168, 301, 2, 0, '2020-09-19 17:07:42'),
(169, 311, 2, 0, '2020-09-19 17:07:42'),
(170, 321, 2, 0, '2020-09-19 17:07:42'),
(171, 331, 2, 0, '2020-09-19 17:07:42'),
(172, 341, 2, 0, '2020-09-19 17:07:42'),
(173, 351, 2, 0, '2020-09-19 17:07:42'),
(174, 361, 2, 0, '2020-09-19 17:07:42'),
(175, 371, 2, 0, '2020-09-19 17:07:42'),
(176, 381, 2, 0, '2020-09-19 17:07:42'),
(177, 391, 2, 0, '2020-09-19 17:07:42'),
(178, 401, 2, 0, '2020-09-19 17:07:42'),
(179, 411, 2, 0, '2020-09-19 17:07:42'),
(180, 421, 2, 0, '2020-09-19 17:07:42'),
(181, 431, 2, 0, '2020-09-19 17:07:42'),
(182, 441, 2, 0, '2020-09-19 17:07:42'),
(183, 451, 2, 1, '2020-09-19 17:07:42'),
(186, 481, 2, 1, '2020-09-19 17:07:42'),
(187, 491, 2, 1, '2020-09-19 17:07:42'),
(188, 501, 2, 1, '2020-09-19 17:07:42'),
(189, 511, 2, 1, '2020-09-19 17:07:42'),
(190, 521, 2, 1, '2020-09-19 17:07:42'),
(191, 531, 2, 1, '2020-09-19 17:07:42'),
(192, 541, 2, 1, '2020-09-19 17:07:42'),
(193, 551, 2, 1, '2020-09-19 17:07:42'),
(194, 561, 2, 1, '2020-09-19 17:07:42'),
(195, 571, 2, 1, '2020-09-19 17:07:42'),
(196, 581, 2, 1, '2020-09-19 17:07:42'),
(197, 591, 2, 1, '2020-09-19 17:07:42'),
(198, 601, 2, 1, '2020-09-19 17:07:42'),
(199, 611, 2, 1, '2020-09-19 17:07:42'),
(200, 621, 2, 1, '2020-09-19 17:07:42'),
(201, 631, 2, 1, '2020-09-19 17:07:42'),
(202, 641, 2, 1, '2020-09-19 17:07:42'),
(203, 651, 2, 1, '2020-09-19 17:07:42'),
(204, 661, 2, 1, '2020-09-19 17:07:42'),
(205, 671, 2, 1, '2020-09-19 17:07:42'),
(206, 681, 2, 1, '2020-09-19 17:07:42'),
(207, 691, 2, 1, '2020-09-19 17:07:42'),
(208, 701, 2, 1, '2020-09-19 17:07:42'),
(209, 711, 2, 1, '2020-09-19 17:07:42'),
(210, 721, 2, 1, '2020-09-19 17:07:42'),
(211, 731, 2, 1, '2020-09-19 17:07:42'),
(212, 741, 2, 1, '2020-09-19 17:07:42'),
(213, 751, 2, 1, '2020-09-19 17:07:42'),
(214, 761, 2, 1, '2020-09-19 17:07:42'),
(215, 771, 2, 1, '2020-09-19 17:07:42'),
(216, 781, 2, 1, '2020-09-19 17:07:42'),
(217, 791, 2, 1, '2020-09-19 17:07:42'),
(218, 801, 2, 1, '2020-09-19 17:07:42'),
(219, 811, 2, 1, '2020-09-19 17:07:42'),
(220, 821, 2, 1, '2020-09-19 17:07:42'),
(221, 831, 2, 1, '2020-09-19 17:07:42'),
(222, 841, 2, 1, '2020-09-19 17:07:42'),
(223, 851, 2, 1, '2020-09-19 17:07:42'),
(224, 861, 2, 1, '2020-09-19 17:07:42'),
(225, 871, 2, 1, '2020-09-19 17:07:42'),
(226, 881, 2, 1, '2020-09-19 17:07:42'),
(227, 891, 2, 1, '2020-09-19 17:07:42'),
(228, 901, 2, 1, '2020-09-19 17:07:42'),
(229, 911, 2, 0, '2020-09-19 17:07:42'),
(230, 921, 2, 0, '2020-09-19 17:07:42'),
(255, 921, 1, 0, '2020-09-19 17:07:42'),
(256, 923, 1, 1, '2020-09-19 17:07:42'),
(257, 924, 2, 1, '2020-09-19 17:07:42'),
(515, 3, 4, 1, '2020-09-19 17:10:49'),
(516, 4, 4, 0, '2020-09-19 17:10:49'),
(517, 5, 4, 1, '2020-09-19 17:10:49'),
(518, 6, 4, 1, '2020-09-19 17:10:49'),
(519, 7, 4, 0, '2020-09-19 17:10:49'),
(520, 8, 4, 1, '2020-09-19 17:10:49'),
(521, 9, 4, 1, '2020-09-19 17:10:49'),
(522, 10, 4, 1, '2020-09-19 17:10:49'),
(523, 16, 4, 0, '2020-09-19 17:10:49'),
(527, 31, 4, 1, '2020-09-19 17:10:49'),
(528, 41, 4, 1, '2020-09-19 17:10:49'),
(529, 51, 4, 1, '2020-09-19 17:10:49'),
(530, 61, 4, 1, '2020-09-19 17:10:49'),
(531, 71, 4, 1, '2020-09-19 17:10:49'),
(532, 81, 4, 1, '2020-09-19 17:10:49'),
(533, 91, 4, 1, '2020-09-19 17:10:49'),
(534, 101, 4, 1, '2020-09-19 17:10:49'),
(535, 111, 4, 1, '2020-09-19 17:10:49'),
(536, 121, 4, 1, '2020-09-19 17:10:49'),
(537, 131, 4, 0, '2020-09-19 17:10:49'),
(538, 141, 4, 0, '2020-09-19 17:10:49'),
(539, 151, 4, 0, '2020-09-19 17:10:49'),
(540, 161, 4, 0, '2020-09-19 17:10:49'),
(541, 171, 4, 0, '2020-09-19 17:10:49'),
(542, 181, 4, 0, '2020-09-19 17:10:49'),
(543, 191, 4, 0, '2020-09-19 17:10:49'),
(544, 201, 4, 0, '2020-09-19 17:10:49'),
(545, 211, 4, 1, '2020-09-19 17:10:49'),
(546, 221, 4, 1, '2020-09-19 17:10:49'),
(547, 231, 4, 1, '2020-09-19 17:10:49'),
(548, 241, 4, 1, '2020-09-19 17:10:49'),
(549, 251, 4, 1, '2020-09-19 17:10:49'),
(550, 261, 4, 1, '2020-09-19 17:10:49'),
(551, 271, 4, 1, '2020-09-19 17:10:49'),
(552, 281, 4, 1, '2020-09-19 17:10:49'),
(553, 291, 4, 0, '2020-09-19 17:10:49'),
(554, 301, 4, 0, '2020-09-19 17:10:49'),
(555, 311, 4, 0, '2020-09-19 17:10:49'),
(556, 321, 4, 0, '2020-09-19 17:10:49'),
(557, 331, 4, 0, '2020-09-19 17:10:49'),
(558, 341, 4, 0, '2020-09-19 17:10:49'),
(559, 351, 4, 0, '2020-09-19 17:10:49'),
(560, 361, 4, 0, '2020-09-19 17:10:49'),
(561, 371, 4, 0, '2020-09-19 17:10:49'),
(562, 381, 4, 0, '2020-09-19 17:10:49'),
(563, 391, 4, 0, '2020-09-19 17:10:49'),
(564, 401, 4, 0, '2020-09-19 17:10:49'),
(565, 411, 4, 0, '2020-09-19 17:10:49'),
(566, 421, 4, 0, '2020-09-19 17:10:49'),
(567, 431, 4, 0, '2020-09-19 17:10:49'),
(568, 441, 4, 0, '2020-09-19 17:10:49'),
(569, 451, 4, 1, '2020-09-19 17:10:49'),
(572, 481, 4, 0, '2020-09-19 17:10:49'),
(573, 491, 4, 1, '2020-09-19 17:10:49'),
(574, 501, 4, 1, '2020-09-19 17:10:49'),
(575, 511, 4, 1, '2020-09-19 17:10:49'),
(576, 521, 4, 1, '2020-09-19 17:10:49'),
(577, 531, 4, 1, '2020-09-19 17:10:49'),
(578, 541, 4, 1, '2020-09-19 17:10:49'),
(579, 551, 4, 1, '2020-09-19 17:10:49'),
(580, 561, 4, 1, '2020-09-19 17:10:49'),
(581, 571, 4, 1, '2020-09-19 17:10:49'),
(582, 581, 4, 1, '2020-09-19 17:10:49'),
(583, 591, 4, 1, '2020-09-19 17:10:49'),
(584, 601, 4, 1, '2020-09-19 17:10:49'),
(585, 611, 4, 1, '2020-09-19 17:10:49'),
(586, 621, 4, 1, '2020-09-19 17:10:49'),
(587, 631, 4, 1, '2020-09-19 17:10:49'),
(588, 641, 4, 1, '2020-09-19 17:10:49'),
(589, 651, 4, 1, '2020-09-19 17:10:49'),
(590, 661, 4, 1, '2020-09-19 17:10:49'),
(591, 671, 4, 1, '2020-09-19 17:10:49'),
(592, 681, 4, 1, '2020-09-19 17:10:49'),
(593, 691, 4, 1, '2020-09-19 17:10:49'),
(594, 701, 4, 1, '2020-09-19 17:10:49'),
(595, 711, 4, 1, '2020-09-19 17:10:49'),
(596, 721, 4, 1, '2020-09-19 17:10:49'),
(597, 731, 4, 1, '2020-09-19 17:10:49'),
(598, 741, 4, 1, '2020-09-19 17:10:49'),
(599, 751, 4, 1, '2020-09-19 17:10:49'),
(600, 761, 4, 1, '2020-09-19 17:10:49'),
(601, 771, 4, 1, '2020-09-19 17:10:49'),
(602, 781, 4, 1, '2020-09-19 17:10:49'),
(603, 791, 4, 1, '2020-09-19 17:10:49'),
(604, 801, 4, 1, '2020-09-19 17:10:49'),
(605, 811, 4, 1, '2020-09-19 17:10:49'),
(606, 821, 4, 1, '2020-09-19 17:10:49'),
(607, 831, 4, 1, '2020-09-19 17:10:49'),
(608, 841, 4, 1, '2020-09-19 17:10:49'),
(609, 851, 4, 1, '2020-09-19 17:10:49'),
(610, 861, 4, 1, '2020-09-19 17:10:49'),
(611, 871, 4, 1, '2020-09-19 17:10:49'),
(612, 881, 4, 1, '2020-09-19 17:10:49'),
(613, 891, 4, 1, '2020-09-19 17:10:49'),
(614, 901, 4, 1, '2020-09-19 17:10:49'),
(615, 911, 4, 0, '2020-09-19 17:10:49'),
(616, 921, 4, 0, '2020-09-19 17:10:49'),
(619, 131, 4, 0, '2020-09-19 17:10:49'),
(620, 141, 4, 0, '2020-09-19 17:10:49'),
(621, 151, 4, 0, '2020-09-19 17:10:49'),
(622, 161, 4, 0, '2020-09-19 17:10:49'),
(623, 171, 4, 0, '2020-09-19 17:10:49'),
(624, 181, 4, 0, '2020-09-19 17:10:49'),
(625, 191, 4, 0, '2020-09-19 17:10:49'),
(626, 201, 4, 0, '2020-09-19 17:10:49'),
(627, 291, 4, 0, '2020-09-19 17:10:49'),
(628, 301, 4, 0, '2020-09-19 17:10:49'),
(629, 311, 4, 0, '2020-09-19 17:10:49'),
(630, 321, 4, 0, '2020-09-19 17:10:49'),
(631, 331, 4, 0, '2020-09-19 17:10:49'),
(632, 341, 4, 0, '2020-09-19 17:10:49'),
(633, 351, 4, 0, '2020-09-19 17:10:49'),
(634, 361, 4, 0, '2020-09-19 17:10:49'),
(635, 371, 4, 0, '2020-09-19 17:10:49'),
(636, 381, 4, 0, '2020-09-19 17:10:49'),
(637, 391, 4, 0, '2020-09-19 17:10:49'),
(638, 401, 4, 0, '2020-09-19 17:10:49'),
(639, 411, 4, 0, '2020-09-19 17:10:49'),
(640, 421, 4, 0, '2020-09-19 17:10:49'),
(641, 431, 4, 0, '2020-09-19 17:10:49'),
(642, 441, 4, 0, '2020-09-19 17:10:49'),
(643, 923, 4, 1, '2020-09-19 17:10:49'),
(644, 924, 4, 1, '2020-09-19 17:10:49');

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
(5, 'MAT1003', 'Algebra', 3, 1.5, 43, 0, 1),
(6, 'COM1021', 'Communication Arts 1', 3, 1.5, 43, 0, 1),
(7, 'IT1029', 'Computer Fundamentals (Lec)', 2, 1.5, 51, 0, 1),
(8, 'IT1029L', 'Computer Fundamentals (Lab)', 1, 1.5, 51, 0, 1),
(9, 'IT1040', 'Computer Programming 1 (Lec)', 3, 1.5, 51, 0, 1),
(10, 'IT1040L', 'Computer Programming 1 (Lab)', 1, 3, 51, 1, 1),
(11, 'MAT1032', 'Math Plus', 1, 1.5, 43, 0, 1),
(12, 'NSTP1001', 'Civic Welfare Training Service 1', 3, 1.5, 43, 0, 1),
(13, 'PE1001', 'Physical Education 1', 2, 1.5, 43, 0, 1),
(14, 'SOC1030', 'Professional Ethics with Values Formation', 3, 1.5, 43, 0, 1),
(15, 'COM1024', 'Communication Arts 2', 3, 1.5, 43, 0, 1),
(16, 'IT1043', 'Computer Programming 2 (Lec)', 3, 1.5, 51, 0, 1),
(17, 'IT1043L', 'Computer Programming 2 (Lab)', 1, 1.5, 51, 0, 1),
(18, 'IT1060', 'Data Structure (Lec)', 3, 1.5, 43, 0, 1),
(19, 'IT1060L', 'Data Structure (Lab)', 1, 1.5, 51, 0, 1),
(20, 'IT1069', 'Discrete Structures', 3, 1.5, 51, 0, 1),
(21, 'NSTP1002', 'Civic Welfare Training Service 2', 3, 1.5, 43, 0, 1),
(22, 'COM1056', 'Introduction to Arts', 3, 1.5, 43, 0, 1),
(23, 'PE1003', 'Physical Education 2', 2, 1.5, 43, 0, 1),
(24, 'MAT1051', 'Trigonometry', 3, 1.5, 43, 0, 1),
(25, 'COM1027', 'Communication Arts 3', 3, 1.5, 43, 0, 1),
(26, 'IT1046', 'Computer Programming 3 (Lec)', 3, 1.5, 51, 0, 1),
(27, 'IT1046L', 'Computer Programming 3 (Lab)', 1, 3, 51, 1, 1),
(28, 'IT1097', 'Logic Design and Switching', 3, 1.5, 51, 0, 1),
(29, 'SOC1024', 'Philippine History, Government and Constitution', 3, 1.5, 43, 0, 1),
(30, 'PE1005', 'Physical Education 3', 2, 1.5, 43, 0, 1),
(31, 'SCI1018', 'Physics (Lec)', 3, 1.5, 43, 0, 1),
(32, 'SCI1018L', 'Physics 1 (Lab)', 1, 3, 43, 1, 1),
(33, 'MAT1042', 'Probability and Statistic', 3, 1.5, 43, 0, 1),
(34, 'SOC1040', 'Society, Culture and Information Technology with Family Planning', 3, 1.5, 43, 0, 1),
(35, 'COM1031', 'Communication Arts 4', 3, 1.5, 43, 0, 1),
(36, 'IT1038', 'Computer Organization and Assembly Language (Lec)', 3, 1.5, 51, 0, 1),
(37, 'IT1038L', 'Computer Organization and Assembly Language (Lab)', 1, 3, 51, 1, 1),
(38, 'SOC1026', 'Philosophy of Man', 3, 1.5, 43, 0, 1),
(39, 'PE1007', 'Physical Education 4', 2, 1.5, 43, 0, 1),
(40, 'SCI1020', 'Physics 2 (Lec)', 3, 1.5, 43, 0, 1),
(41, 'SCI1020L', 'Physics 2 (Lab)', 1, 1.5, 43, 0, 1),
(42, 'IT1134', 'System Analysis and Design', 3, 1.5, 51, 0, 1),
(43, 'IT1142', 'Theory of Database System (Lec)', 3, 1.5, 51, 0, 1),
(44, 'IT1142L', 'Theory of Database System (Lab)', 1, 3, 51, 0, 1),
(45, 'BUS1004', 'Accounting Principles', 3, 1.5, 43, 0, 1),
(46, 'IT1009', 'Advance Database System (Lec)', 2, 1.5, 51, 0, 1),
(47, 'IT1009L', 'Advance Database System (Lab)', 1, 3, 51, 0, 1),
(48, 'FIL1001', 'Komunikasyon sa Akademikong Filipino', 3, 1.5, 43, 0, 1),
(49, 'IT1126', 'Operation Research', 3, 1.5, 51, 0, 1),
(50, 'IT1124', 'Operating System', 3, 1.5, 51, 0, 1),
(51, 'IT1132', 'Software Engineering (Lec)', 3, 1.5, 51, 0, 1),
(52, 'IT1132L', 'Software Engineering (Lab)', 1, 1.5, 51, 0, 1),
(53, 'IT1151', 'Web Programming (Lec)', 2, 1.5, 51, 0, 1),
(54, 'IT1151L', 'Web Programming (Lab)', 1, 1.5, 51, 0, 1),
(55, 'IT1034', 'Computer Networks (Lec)', 3, 1.5, 51, 0, 1),
(56, 'IT1034L', 'Computer Networks (Lab)', 1, 1.5, 51, 0, 1),
(57, 'SOC1006', 'Economics with Taxation and Agrarian Reform', 3, 1.5, 43, 0, 1),
(58, 'FIL1003', 'Pagbasa at Pagsulat Tungo sa Pananaaliksik', 3, 1.5, 43, 0, 1),
(59, 'IT1107', 'Multimedia System (Lec)', 3, 1.5, 51, 0, 1),
(60, 'IT1107L', 'Multimedia System (Lab)', 1, 1.5, 51, 0, 1),
(61, 'SOC1016', 'Life and Works of Rizal', 3, 1.5, 43, 0, 1),
(62, 'IT1031', 'Computer Graphics (Lec)', 2, 1.5, 51, 0, 1),
(63, 'IT1031L', 'Computer Graphics (Lab)', 2, 1.5, 51, 0, 1),
(64, 'IT1130', 'Project Management', 3, 1.5, 51, 0, 1),
(65, 'SOC1033', 'Psychology with Drugs, HIV/AIDS and SARS Education', 3, 1.5, 43, 0, 1),
(66, 'IT1091', 'IT Special Project (Thesis) (Lec)', 2, 1.5, 51, 0, 1),
(67, 'IT1091L', 'IT Special Project (Thesis) (Lab)', 1, 1.5, 51, 1, 1),
(68, 'COM1071', 'Philippines Literature', 3, 1.5, 43, 0, 1),
(69, 'BUS1179', 'Technopreneurship', 3, 1.5, 43, 0, 1),
(70, 'COM1079', 'World Literature', 3, 1.5, 43, 0, 1),
(71, 'COM1053', 'Foreign Language', 3, 1.5, 43, 0, 1),
(72, 'IT1102', 'Mobile Application Development (Lec)', 2, 1.5, 51, 0, 1),
(73, 'IT1102L', 'Mobile Application Development (Lab)', 1, 1.5, 51, 0, 1),
(74, 'IT1152', 'IT Practicum', 9, 1.5, 51, 0, 1),
(75, 'OC', 'Oral Communication', 80, 1.5, 43, 0, 1),
(76, 'GM', 'General Mathematics', 80, 1.5, 43, 0, 1),
(77, '21 CLPW', '21st Century Literature form the Philippines and the World', 80, 1.5, 43, 0, 1),
(78, 'MIL', 'Media and Information Literacy', 80, 1.5, 43, 0, 1),
(79, 'IPHP', 'Introduction to the Philosophy of the Human Person', 80, 1.5, 43, 0, 1),
(80, 'PEH1', 'Physical Education and Health 1', 20, 1.5, 43, 0, 1),
(81, 'OM', 'Organization and Management', 80, 1.5, 43, 0, 1),
(82, 'ABM - BM', 'Business Mathematics', 80, 1.5, 111, 0, 1),
(83, 'RW', 'Reading and Writing', 80, 1.5, 43, 0, 1),
(84, 'SP', 'Statistic and Probability', 80, 1.5, 43, 0, 1),
(85, 'UCSP', 'Understanding Culture , Society and Politics', 80, 1.5, 43, 0, 1),
(86, 'ELS', 'Earth and Life Science', 80, 1.5, 43, 0, 1),
(87, 'KPWKP', 'Komunikasyon at Pananaliksik sa Wika at kulturang Pilipino', 80, 1.5, 43, 0, 1),
(88, 'PR1', 'Practical Research 1', 80, 1.5, 43, 0, 1),
(89, 'ABM - PM', 'Principles of Marketing', 80, 1.5, 111, 0, 1),
(90, 'ABM - FABM1', 'Fundamentals of Accountancy, Business and Management 1', 20, 1.5, 111, 0, 1),
(91, 'CPAR', 'Contemporary Philippine Arts from the Regions', 80, 1.5, 43, 0, 1),
(92, 'PEH4', 'Physical Education and Health 4', 20, 1.5, 43, 0, 1),
(93, 'ET', 'Empowerment Technologies', 80, 1.5, 43, 0, 1),
(94, 'ENTREP', 'Entrepreneurship', 80, 1.5, 43, 0, 1),
(95, 'ININIM', 'Inquiries, Investigation and Immersion', 80, 1.5, 43, 0, 1),
(96, ' AE', 'Applied Economics', 80, 1.5, 43, 0, 1),
(97, 'ABM - BESR', 'Business Ethics and Social Responsibility', 80, 1.5, 111, 0, 1),
(98, 'BES', 'Work Immersion/Research/Career Advocacy/Culminating Activity', 80, 1.5, 43, 0, 1),
(99, 'STEM - PRECA', 'Pre-Calculus', 80, 1.5, 121, 0, 1),
(100, 'STEM - GB1', 'General Biology 1', 80, 1.5, 121, 0, 1),
(101, 'STEM - BCAL', 'Basic Calculus', 80, 1.5, 121, 0, 1),
(102, 'STEM - GB2', 'General Biology 2', 80, 1.5, 121, 0, 1),
(103, 'PEH2', 'Physical Education and Health 2', 20, 1.5, 43, 0, 1),
(104, 'PD', 'Personal Development', 80, 1.5, 43, 0, 1),
(105, 'PPITTP', 'Pagbasa at Pagsuri ng Ibat Ibang Teksto Tungo sa Pananaliksik', 80, 1.5, 43, 0, 1),
(106, 'PS', 'Physical Science', 80, 1.5, 43, 0, 1),
(107, 'PEH3', 'Physical Education and Health 3', 20, 1.5, 43, 0, 1),
(108, 'PR2', 'Practical Research 2', 80, 1.5, 43, 0, 1),
(109, 'FPL', 'Filipino sa Piling Larangan', 80, 1.5, 43, 0, 1),
(110, 'EAPP', 'English for Academic and Professional Purposes', 80, 1.5, 43, 0, 1),
(111, 'ABM - BF', 'Business Finance', 80, 1.5, 111, 0, 1),
(112, 'ABM - FABM2', 'Fundamentals of Accountancy, Business and Management 2', 80, 1.5, 111, 0, 1),
(113, 'GAS - DRRR', 'Disaster Readiness and Risk Reduction', 80, 1.5, 141, 0, 1),
(114, 'STEM - GP1', 'General Physics 1', 80, 1.5, 121, 0, 1),
(115, 'STEM - GC1', 'General Chemistry1', 80, 1.5, 121, 0, 1),
(116, 'STEM - GP2', 'General Physics 2', 80, 1.5, 121, 0, 1),
(117, 'STEM - GC2', 'General Chemistry2', 80, 1.5, 121, 0, 1),
(118, 'HUMMS - IWRB', 'Introduction to World Religions and Belief System', 3, 1.5, 131, 0, 0),
(119, 'HUMMS - DISS', 'Discipline and Ideas in the Social Sciences', 80, 1.5, 131, 0, 1),
(120, 'HUMMS - CW', 'Creative Writing', 3, 1.5, 131, 0, 1),
(121, 'HUMSS - CN', 'Creative Nonfiction', 80, 1.5, 131, 0, 1),
(122, 'HUMMS - PPG', 'Philippine Politics and Governance', 80, 1.5, 131, 0, 1),
(123, 'HUMMS - TNCT', 'Trends, Networks and Critical Thingking in the 21st Century', 3, 1.5, 131, 0, 1),
(124, 'HUMSS - CESC', 'Community Engagement Solidarity and Citizenship', 3, 1.5, 131, 0, 1),
(125, 'IT - COMPRO1', 'Computer Programming 1 (Java/Intro to Programming)', 80, 1.5, 151, 0, 1),
(126, 'IT - COMPRO2', 'Computer Programming 2 (HTML,CSS/Web Interfaces)', 80, 1.5, 151, 0, 1),
(127, 'IT - COMPRO3', 'Computer Programming 3 (Intermediate Java Programming)', 80, 1.5, 151, 0, 1),
(128, 'IT - MAP1', 'Mobile App Programming 1 (Android OS and Java)', 3, 1.5, 151, 0, 1),
(129, 'IT - COMPRO4', 'Computer Programming 4 (C#/Intro to .Net Programming)', 80, 1.5, 151, 0, 1),
(130, 'IT - COMPRO5', 'Computer Programming 5 (JavaScript,jQuery)', 80, 1.5, 151, 0, 1),
(131, 'IT - COMPRO6', 'Computer Programming 6 (SQL/Intro to ASP.Net)', 3, 1.5, 151, 0, 1),
(132, 'IT - MAP2', 'Mobile App Programming 1 (Android OS and .NET Framework)', 3, 1.5, 151, 0, 1),
(133, 'DA - 2D', '2D Concept', 80, 1.5, 161, 0, 1),
(134, 'DA - BDD', 'Basic Drawing and Drafting', 80, 1.5, 161, 0, 1),
(135, 'DA - FCD', 'Fundamental of Computer Drawing', 80, 1.5, 161, 0, 1),
(136, 'DA - DGDIM', 'Digital Graphics Design and Image Manipulation', 80, 1.5, 161, 0, 1),
(137, 'DA- DP', 'Digital Photography', 80, 1.5, 161, 0, 1),
(138, 'DA - CA', 'Computer Animation', 80, 1.5, 161, 0, 1),
(139, 'DA - DVAP', 'Digital Video and Audio Production', 3, 1.5, 161, 0, 1),
(140, 'DA - 3D', '3D Modelling', 80, 1.5, 161, 0, 1),
(141, 'CEDD', 'Computer Engineering Drafting and Design', 80, 1.5, 43, 0, 1),
(142, 'FEE', 'Fundamentals of Electricity and Electronics', 80, 1.5, 43, 0, 1),
(143, ' CHF', 'Computer Hardware Fundamentals', 3, 1.5, 43, 0, 1),
(144, 'CCT- BCT', 'Basic Computer Technology', 3, 1.5, 171, 0, 1),
(145, 'EAC', 'Electronic and Communications', 80, 1.5, 43, 0, 1),
(146, 'CCT - DC', 'Data Communications', 80, 1.5, 171, 0, 1),
(147, 'BT', 'Broadband Technology', 80, 1.5, 43, 0, 1),
(148, 'CN', 'Computer Networks', 80, 1.5, 43, 0, 1),
(149, 'CE- RE', 'Radio Electronics', 80, 1.5, 181, 0, 1),
(150, 'CE - TV', 'TV Electronics', 80, 1.5, 181, 0, 1),
(151, 'CE - MT', 'Mobile Technology', 80, 1.5, 181, 0, 1),
(152, 'TGE', 'Tour Guiding and Escorting', 80, 1.5, 43, 0, 1),
(153, 'ITTI', 'Introduction to Travel and Tourism Industry', 80, 1.5, 43, 0, 1),
(154, 'TO - ITS', 'Introduction to travel  and Services', 80, 1.5, 201, 0, 1),
(155, 'TO - TSMP', 'Tourism Sales and Marketing Principles', 80, 1.5, 201, 0, 1),
(156, 'TO - TIM', 'Tourism Information Management', 80, 1.5, 201, 0, 1),
(157, 'TO - IETC', 'Internet and E-Travel Commerce', 80, 1.5, 201, 0, 1),
(158, 'RCO - IFBO', 'Introduction to Food and Beverages Operations', 80, 1.5, 211, 0, 1),
(159, 'RCO - NABC', 'Non-alcoholic Beverages Concoction', 3, 1.5, 211, 0, 1),
(160, 'RCO - FBS', 'Food and Beverages Services', 3, 1.5, 211, 0, 1),
(161, 'RCO - CC', 'Coffee Concoction', 80, 1.5, 211, 0, 1),
(162, 'RCO - IBMO', 'Introduction to Bar Management and Operation', 80, 1.5, 211, 0, 1),
(163, 'RCO - CMF', 'Cocktail Mixology with Flairtending', 80, 1.5, 211, 0, 1),
(164, 'RCO - BSM', 'Bar Services Management', 80, 1.5, 211, 0, 1),
(165, 'RCO - WSM', 'Wine Service Management', 3, 1.5, 211, 0, 1),
(166, 'CA - ICO', 'Introduction to Culinary Operations', 80, 1.5, 221, 0, 1),
(167, 'CA - BFP101', 'Basic Food Production 101', 80, 1.5, 221, 0, 1),
(168, 'CA - BFP102', 'Basic Food Production 102', 80, 1.5, 221, 0, 1),
(169, 'CA- BFP103', 'Basic Food Production 103', 80, 1.5, 221, 0, 1),
(170, 'CA - ICC', 'Introduction to Commercial Cookery', 80, 1.5, 221, 0, 1),
(171, 'CA - LIC', 'Loca and Internation Cuisines', 80, 1.5, 43, 0, 1),
(172, 'CA - CMCS', 'Catering Management and Control System', 80, 1.5, 221, 0, 1),
(173, 'CA - IBPP', 'Introduction to Bread and Pastry Production', 80, 1.5, 221, 0, 1),
(175, 'IDK', 'I Don\'t Know', 3, 1.5, 1, 0, 0),
(176, 'subj_code', 'subj_desc', 0, 0, 0, 0, 0),
(181, 'ES', 'Earth Science', 80, 1.5, 43, 0, 1),
(191, 'HUMSS - IWRB', 'Introduction to World Religion and Belief Systems', 80, 1.5, 131, 0, 1),
(201, 'WORLD', 'Introduction to World Religion and Belief Systems', 80, 1.5, 43, 0, 0),
(211, 'ELECTIVE', 'Elective (from ant Track/Strand subject)', 80, 1.5, 43, 0, 1),
(221, 'ELECTIVE', 'Elective (for HUMSS Strands subjects)', 80, 1.5, 43, 0, 1),
(231, 'IT - MAP1', 'Mobile App Programming1 (Android OS and JAva)', 80, 1.5, 151, 0, 0),
(241, 'WRCC', 'Work Immersion/Research/Career Advocacy/Culminating Activity (Practicum Type)', 80, 1.5, 43, 0, 1),
(251, 'WRRC', 'Work Immersion/Research/Career Advocacy/Culminating Activity (Capstone)', 80, 1.5, 43, 0, 1),
(261, 'CCT - EC', 'Electronic Communications', 80, 1.5, 171, 0, 1),
(271, 'NFBO', 'Non-alcoholic Beverage Concoction', 80, 1.5, 43, 0, 1),
(281, 'EU1', 'Euthenics 1', 1, 1.5, 43, 0, 1),
(291, 'BA - CAP', 'Counting and Pricing	', 3, 1.5, 241, 0, 1),
(301, 'NSTP1', 'National Service Training Program 1	', 3, 1.5, 43, 0, 1),
(311, 'PE1', 'Physical Education 1', 2, 1.5, 43, 0, 1),
(321, 'RPH', 'Readings in Philippine History', 3, 1.5, 43, 0, 1),
(331, 'UTS', 'Understanding the Self', 3, 1.5, 43, 0, 1),
(341, 'TM - GCTG', 'Global Culture and Tourism Geography', 3, 1.5, 401, 0, 1),
(351, 'IT - IC', 'Introduction to Computing', 2, 1.5, 43, 0, 1),
(361, 'IT - COMPRO1', 'Computer Programming 1', 2, 1.5, 51, 0, 1),
(371, 'TCW', 'The Contemporary World', 3, 1.5, 43, 0, 1),
(381, 'MMW', 'Mathematics in the Modern World', 3, 1.5, 43, 0, 1),
(391, 'TM - MPTH', 'Micro Perspective of Tourism and Hospitality', 3, 1.5, 401, 0, 1),
(401, 'TM - RMASSS', 'Risk management as Applied to Safety, Security and Sanitation', 3, 1.5, 401, 0, 1),
(411, 'NSTP2', 'National Service Training Program 2', 3, 1.5, 43, 0, 1),
(421, 'PE2', 'Physical Education 2', 2, 1.5, 43, 0, 1),
(431, 'PC1', 'Purposive Communication 1', 3, 1.5, 43, 0, 1),
(441, 'CPT', 'Computer Productivity Tools', 1, 1.5, 43, 0, 1),
(451, 'TM - PCTG', 'Philippine Culture and Tourism and Hospitality', 3, 1.5, 401, 0, 1),
(461, 'AP', 'Art Appreciation', 3, 1.5, 43, 0, 1),
(463, 'Test', 'test', 1, 1.5, 43, 0, 1),
(464, 'subj_code', 'subj_desc', 0, 0, 0, 0, 0),
(471, 'BA - BM', 'Basic Macroeconomics', 3, 1.5, 43, 0, 1),
(481, 'Ethics', 'Ethics', 3, 1.5, 43, 0, 1),
(491, 'STS', 'Science, Technology and Society', 3, 1.5, 43, 0, 1),
(501, 'PQT', 'Productivity and Quality Tools', 3, 1.5, 43, 0, 1),
(511, 'TEM', 'The Entrepreneurial Mind', 3, 1.5, 43, 0, 1),
(521, 'RLW', 'Rizal\'s Life and Works', 3, 1.5, 43, 0, 1),
(531, 'BA - FM', 'Facilities Management', 3, 1.5, 241, 0, 1),
(541, 'BA - BL', 'Business Law (Obligation and Contacts)', 3, 1.5, 241, 0, 1),
(551, 'BA - TAX', 'Taxation (Income Taxation)', 3, 1.5, 241, 0, 1),
(561, 'PC2', 'Purposive Communication 2', 3, 1.5, 43, 0, 1),
(571, 'PE4', 'Physical Education 4', 2, 1.5, 43, 0, 1),
(581, 'BA - LM', 'Logistics Management', 3, 1.5, 241, 0, 1),
(591, 'BA -BR', 'Business Research', 3, 1.5, 241, 0, 1),
(601, 'BA - GGSR', 'Good Governance and Social Responsibility', 3, 1.5, 241, 0, 1),
(611, 'BA - IBT', 'International Business and Trade', 3, 1.5, 241, 0, 1),
(621, 'OM', 'Opeation Management (TQM)', 3, 1.5, 43, 0, 1),
(631, 'BA - MA', 'Managerial Accounting', 3, 1.5, 241, 0, 1),
(641, 'GB', 'Great Books', 3, 1.5, 43, 0, 1),
(651, 'BA - HRM', 'Human Resource Management', 3, 1.5, 241, 0, 1),
(661, 'SM', 'Strategic Management', 3, 1.5, 43, 0, 1),
(671, 'PP', 'Panitikang Pilipino', 3, 1.5, 43, 0, 1),
(681, 'BA - EMS', 'Environment Management System', 3, 1.5, 241, 0, 1),
(691, 'BA - IMC', 'Inventory Management Control', 3, 1.5, 241, 0, 1),
(701, 'BA - PM', 'Project MAnagement', 3, 1.5, 241, 0, 1),
(711, 'BA - FA', 'Feasibility Study', 3, 1.5, 241, 0, 1),
(721, 'BA - EM', 'Entrepreneurial Management', 3, 1.5, 241, 0, 1),
(731, 'BA - MM', 'Marketing Management', 3, 1.5, 241, 0, 1),
(741, 'BA - FMAN', 'Financial MAnagement', 3, 1.5, 241, 0, 1),
(751, 'EU2', 'Euthenics2', 1, 1.5, 43, 0, 1),
(761, 'BA - STOM', 'Special Topic in Operations Management', 3, 1.5, 241, 0, 1),
(771, 'Practicum', 'Practicum (600 hours)', 6, 1.5, 43, 0, 1),
(781, 'PE3', 'Physical Education 3', 2, 1.5, 43, 0, 1),
(791, 'TM - QSMTH', 'Quality Service Management in Tourism and Hospitality', 3, 1.5, 401, 0, 1),
(801, 'FL', 'Foreign Language 1', 3, 1.5, 43, 0, 1),
(811, 'TM - ST', 'Sustainable Tourism', 3, 1.5, 401, 0, 1),
(821, 'TM - TPPP', 'Tour Planning, Packaging and Pricing', 3, 1.5, 401, 0, 1),
(831, 'TM - IMICEM', 'Introduction to Meetings Incentives, Conference and Events Management', 3, 1.5, 401, 0, 1),
(841, 'FL2', 'Foreign Language 2', 3, 1.5, 43, 0, 1),
(851, 'PDAE', 'Professional Development and Applied Ethics', 3, 1.5, 43, 0, 1),
(861, 'TM - THM', 'Tourism and Hospitality Marketing', 3, 1.5, 401, 0, 1),
(871, 'TM - ABTTT', 'Applied Business Tools and Technologies in Tourism', 3, 1.5, 401, 0, 1),
(881, 'TM - LATH', 'Legal Aspects in Tourism and Hospitality', 2, 1.5, 401, 0, 1),
(891, 'TM - ETH', 'Entrepreneurship in Tourism and Hospitality', 3, 1.5, 401, 0, 1),
(901, 'TM - TWP', 'Travel Writing and Photography', 3, 1.5, 401, 0, 1),
(911, 'TM - PTG', 'Professional Tour Guiding', 3, 1.5, 401, 0, 1),
(921, 'TM - TM', 'Transportation Management', 3, 1.5, 401, 0, 1),
(931, 'TM - AFOM', 'Airline/Flight Operation Management', 3, 1.5, 401, 0, 1),
(941, 'TM - RT', 'Research in Tourism', 3, 1.5, 401, 0, 1),
(951, 'TM - AOM', 'Accomodation Operations and Management', 3, 1.5, 401, 0, 1),
(961, 'TM - TTM', 'Tour and Travel Management', 3, 1.5, 401, 0, 1),
(971, 'TM - TPPD', 'Tourism Policy Planning and Development', 3, 1.5, 401, 0, 1),
(981, 'TM - MDWTP', 'Multicultural Diversity in the Workplace for Tourism Professional', 3, 1.5, 401, 0, 1),
(991, 'HO - FOS2', 'Front Office Services', 80, 1.5, 191, 0, 1),
(1001, 'BSIT - PT1', 'Platform Technology 1 (Operating System))', 3, 1.5, 51, 0, 1),
(1011, 'TEST', 'asdasd', 1, 3, 43, 0, 1);

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
(8, 1, 6, 3),
(12, 1, 59, 8),
(13, 1, 18, 7),
(16, 1, 29, 9),
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
(871, 31, 104, 2),
(881, 31, 105, 2),
(891, 31, 106, 2),
(901, 31, 107, 2),
(911, 31, 109, 2),
(921, 31, 110, 2),
(931, 31, 111, 2),
(941, 31, 112, 2),
(951, 31, 90, 2),
(961, 41, 75, 1),
(971, 41, 76, 1),
(981, 41, 77, 1),
(991, 41, 78, 1),
(1001, 41, 79, 1),
(1011, 41, 13, 1),
(1021, 41, 99, 1),
(1031, 41, 100, 1),
(1041, 41, 104, 2),
(1051, 41, 105, 2),
(1052, 7, 6, 3),
(1053, 0, 0, 0),
(1071, 8, 75, 1),
(1081, 8, 76, 1),
(1091, 8, 77, 1),
(1101, 8, 78, 1),
(1111, 8, 79, 1),
(1121, 8, 80, 1),
(1131, 8, 99, 1),
(1141, 8, 100, 1),
(1161, 8, 104, 2),
(1171, 8, 105, 2),
(1191, 8, 113, 2),
(1201, 8, 107, 2),
(1211, 8, 108, 2),
(1221, 8, 109, 2),
(1231, 8, 110, 2),
(1241, 8, 114, 2),
(1251, 8, 115, 2),
(1261, 41, 113, 2),
(1271, 41, 107, 2),
(1281, 41, 108, 2),
(1291, 41, 109, 2),
(1301, 41, 110, 2),
(1311, 41, 114, 2),
(1321, 41, 115, 2),
(1331, 81, 75, 1),
(1341, 81, 76, 1),
(1351, 81, 77, 1),
(1361, 81, 78, 1),
(1371, 81, 79, 1),
(1381, 81, 80, 1),
(1391, 81, 118, 1),
(1401, 81, 119, 1),
(1411, 81, 104, 2),
(1421, 81, 105, 2),
(1431, 81, 106, 2),
(1441, 81, 107, 2),
(1451, 81, 108, 2),
(1461, 81, 109, 2),
(1471, 81, 110, 2),
(1481, 81, 121, 2),
(1491, 81, 122, 2),
(1501, 91, 75, 1),
(1511, 91, 76, 1),
(1521, 91, 77, 1),
(1531, 91, 78, 1),
(1541, 91, 79, 1),
(1551, 91, 80, 1),
(1561, 91, 81, 1),
(1571, 91, 221, 1),
(1581, 91, 104, 2),
(1591, 91, 105, 2),
(1601, 91, 106, 2),
(1611, 91, 107, 2),
(1621, 91, 108, 2),
(1631, 91, 109, 2),
(1641, 91, 102, 2),
(1651, 91, 113, 2),
(1661, 91, 211, 2),
(1671, 101, 75, 1),
(1681, 101, 76, 1),
(1691, 101, 77, 1),
(1701, 101, 78, 1),
(1711, 101, 79, 1),
(1721, 101, 80, 1),
(1731, 101, 125, 1),
(1741, 101, 126, 1),
(1751, 101, 104, 2),
(1761, 101, 105, 2),
(1771, 101, 106, 2),
(1781, 101, 107, 2),
(1791, 101, 108, 2),
(1801, 101, 109, 2),
(1811, 101, 110, 2),
(1821, 101, 129, 2),
(1831, 101, 130, 2),
(1841, 111, 75, 1),
(1851, 111, 76, 1),
(1861, 111, 77, 1),
(1871, 111, 78, 1),
(1881, 111, 79, 1),
(1891, 111, 80, 1),
(1901, 111, 133, 1),
(1911, 111, 134, 1),
(1921, 111, 104, 2),
(1931, 111, 105, 2),
(1941, 111, 106, 2),
(1951, 111, 109, 2),
(1961, 111, 110, 2),
(1971, 111, 137, 2),
(1981, 111, 138, 2),
(1991, 111, 107, 2),
(2001, 111, 108, 2),
(2011, 121, 75, 1),
(2021, 121, 76, 1),
(2031, 121, 77, 1),
(2041, 121, 78, 1),
(2051, 121, 79, 1),
(2061, 121, 80, 1),
(2071, 121, 141, 1),
(2081, 121, 142, 1),
(2091, 121, 104, 2),
(2101, 121, 105, 2),
(2111, 121, 106, 2),
(2121, 121, 107, 2),
(2131, 121, 108, 2),
(2141, 121, 109, 2),
(2151, 121, 110, 2),
(2161, 121, 261, 2),
(2171, 121, 146, 2),
(2181, 131, 75, 1),
(2191, 131, 76, 1),
(2201, 131, 77, 1),
(2211, 131, 78, 1),
(2221, 131, 79, 1),
(2231, 131, 80, 1),
(2241, 131, 141, 1),
(2251, 131, 142, 1),
(2261, 131, 104, 2),
(2271, 131, 105, 2),
(2281, 131, 106, 2),
(2291, 131, 107, 2),
(2301, 131, 108, 2),
(2311, 131, 109, 2),
(2321, 131, 110, 2),
(2331, 131, 150, 2),
(2341, 131, 151, 2),
(2371, 141, 104, 2),
(2381, 141, 105, 2),
(2391, 141, 106, 2),
(2401, 141, 107, 2),
(2411, 141, 108, 2),
(2421, 141, 109, 2),
(2431, 141, 110, 2),
(2441, 141, 153, 2),
(2451, 141, 211, 2),
(2461, 151, 75, 1),
(2471, 151, 76, 1),
(2481, 151, 77, 1),
(2501, 151, 78, 1),
(2511, 151, 79, 1),
(2521, 151, 80, 1),
(2531, 151, 154, 1),
(2541, 151, 155, 1),
(2551, 151, 104, 2),
(2561, 151, 105, 2),
(2571, 151, 106, 2),
(2581, 151, 107, 1),
(2591, 151, 108, 2),
(2601, 151, 109, 2),
(2611, 151, 110, 2),
(2621, 151, 153, 2),
(2631, 151, 211, 2),
(2641, 161, 75, 1),
(2651, 161, 76, 1),
(2661, 161, 77, 1),
(2671, 161, 78, 1),
(2681, 161, 79, 1),
(2691, 161, 80, 1),
(2701, 161, 158, 1),
(2711, 161, 271, 1),
(2721, 161, 104, 2),
(2731, 161, 105, 2),
(2741, 161, 106, 2),
(2751, 161, 107, 2),
(2761, 161, 108, 2),
(2771, 161, 109, 2),
(2781, 161, 110, 2),
(2791, 161, 162, 2),
(2801, 161, 163, 2),
(2811, 151, 107, 2),
(2812, 0, 0, 0),
(2821, 191, 471, 3),
(2831, 191, 371, 3),
(2841, 191, 281, 3),
(2851, 191, 301, 3),
(2861, 191, 311, 3),
(2871, 191, 371, 3),
(2881, 191, 331, 3),
(2891, 191, 481, 4),
(2901, 191, 411, 4),
(2911, 191, 421, 4),
(2921, 191, 491, 4),
(2931, 191, 431, 4),
(2941, 191, 441, 4),
(2951, 191, 501, 4),
(2961, 191, 511, 5),
(2971, 191, 521, 5),
(2981, 191, 381, 5),
(2991, 191, 781, 5),
(3001, 191, 291, 5),
(3011, 191, 531, 5),
(3021, 191, 541, 6),
(3031, 191, 551, 6),
(3041, 191, 561, 6),
(3051, 191, 461, 6),
(3061, 191, 581, 6),
(3071, 191, 571, 6),
(3081, 191, 591, 7),
(3091, 191, 601, 7),
(3101, 191, 611, 7),
(3111, 191, 621, 7),
(3121, 191, 631, 7),
(3131, 191, 641, 7),
(3151, 191, 651, 8),
(3161, 191, 671, 8),
(3171, 191, 681, 8),
(3181, 191, 691, 8),
(3191, 191, 701, 8),
(3201, 191, 661, 8),
(3211, 191, 711, 9),
(3221, 191, 721, 9),
(3231, 191, 741, 9),
(3241, 191, 731, 9),
(3251, 191, 751, 9),
(3261, 191, 761, 9),
(3271, 191, 771, 10),
(3281, 11, 281, 3),
(3291, 11, 381, 3),
(3301, 11, 301, 3),
(3311, 11, 311, 3),
(3321, 11, 321, 3),
(3331, 11, 331, 3),
(3341, 11, 391, 3),
(3351, 11, 401, 3),
(3361, 11, 411, 4),
(3371, 11, 421, 4),
(3381, 11, 431, 4),
(3391, 11, 441, 4),
(3401, 11, 391, 4),
(3421, 11, 341, 4),
(3431, 11, 451, 4),
(3441, 11, 461, 5),
(3451, 11, 781, 5),
(3461, 11, 791, 5),
(3471, 11, 951, 5),
(3481, 11, 961, 5),
(3491, 11, 801, 5),
(3501, 11, 811, 5),
(3511, 11, 481, 6),
(3521, 11, 571, 6),
(3531, 11, 491, 6),
(3541, 11, 821, 6),
(3551, 11, 971, 6),
(3561, 11, 831, 6),
(3571, 11, 841, 6),
(3581, 11, 621, 7),
(3591, 11, 511, 7),
(3601, 11, 641, 7),
(3611, 11, 851, 7),
(3621, 11, 861, 7),
(3631, 11, 981, 7),
(3641, 11, 871, 7),
(3651, 11, 661, 8),
(3661, 11, 561, 8),
(3671, 11, 881, 8),
(3681, 11, 891, 8),
(3691, 11, 901, 8),
(3701, 11, 911, 8),
(3711, 11, 921, 8),
(3721, 11, 371, 9),
(3731, 11, 751, 9),
(3741, 11, 521, 9),
(3751, 11, 931, 9),
(3761, 11, 941, 9),
(3771, 11, 771, 10),
(3781, 211, 75, 1),
(3791, 211, 76, 1),
(3801, 211, 77, 1),
(3811, 211, 78, 1),
(3821, 211, 79, 1),
(3831, 211, 80, 1),
(3841, 211, 166, 1),
(3851, 211, 167, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` text DEFAULT NULL,
  `password` text NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `prof_id`) VALUES
(28, '3232532', 'Test.com', '$2y$10$/wGSM4yn76j1Tqtpp2nP8u0YnswezJE/8MIgP86dJgKAJR87oC9AO', 28),
(29, '88888888', '', '$2y$10$G0XCro/zxWEwl8SgZDRXy.ibKBl5Fkk.3E9O6Z8dyig5FAOVCEbyy', 29),
(30, '0200006652', 'chris_tine09@yahoo.com', '$2y$10$WpVKlFearFw1GuG/JVZOC.sH24NUekp0OOwE6qzfJeSRpLeLRroPi', 30),
(32, 'hellow', 'hahahahha@gmail.com', '$2y$10$U2XkxhRYZzeIRTpcwqKpLuMc2pI/Fv8cYG8s0l1uARb/ws8gUZ3cu', 32),
(34, '987654321', '', '$2y$10$5MipXSVUGbftbWEwk1wYkeTPGG5B7KCV0TzxBXR79T1hjbnmGAt7i', 34),
(35, '147258369', '', '$2y$10$nZUlO7QaxjYsTyjSzm5EcudUa9/3I8nhJUDzrPN5DS6/SSzsEFLuO', 35),
(36, '963852741', '', '$2y$10$jjFqbgPloHcZcVLHsoFDFOcmOjOL.SlXLJzQ4xeT83ora8yXXF/XO', 36),
(37, '852147963', '', '$2y$10$1CMi8YGI1QtcEhP01JT/q.iyVdmUFqU/zubjB8AyeF.fy.YPSv/w.', 37),
(38, '195375465', '', '$2y$10$0XXOng7q6MUnuwRyWbGIjuX63iEpSpyD9tR.luH61.vTUzmwd7.wi', 38),
(39, '1236544789', '', '$2y$10$jkzqN9in/voKfVB9RDYzoOMIrtDp.hXZkJqmIfL/LkunAep7ehq1.', 39),
(40, 'isabelthomas', 'Isabelthomas@yahoo.com', '$2y$10$ZrwGj8V.waDuoIdsp8pC5.VStErNRyVjlXzg5oQWO05JhaBArwFV.', 40),
(46, 'MIS', '', '$2y$10$846T3wb7zLRaZ5nHk5IhquTHkxKtNNzqluAkO6jv1dXhQ3i2ydyl2', 45),
(47, 'ProgHead', '', '$2y$10$W5ohC9sky1KKwBtfqhODrebh81/8vHCuE1809AsjGzDM3sdkkcxRC', 46);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `professors_details`
--
ALTER TABLE `professors_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedules_day`
--
ALTER TABLE `schedules_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=926;

--
-- AUTO_INCREMENT for table `sections_details`
--
ALTER TABLE `sections_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=645;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `subjects_to_checklist`
--
ALTER TABLE `subjects_to_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3854;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
