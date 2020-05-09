-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 05:31 AM
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
(61, 'BMA', 'Bachelor of Multimedia Arts', 'course', 1),
(62, 'BACOM', 'Bachelor of Arts in Communication', 'course', 1),
(63, 'HRS', 'Hospitality and Restaurant Services', 'course', 1),
(64, 'HRA', 'Hotel and Restaurant Administration', 'course', 1),
(65, 'TEM', 'Tourism and Events Management', 'course', 1),
(66, 'IT', 'Information Technology', 'course', 1),
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
  `prof_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `emp_no`, `last_name`, `first_name`, `middle_initial`, `suffix`, `dept_id`, `user_id`, `prof_active`, `prof_img`) VALUES
(31, 323253243, 'Aparato', 'Christine', '', '', 17, 28, 1, ''),
(32, 123456789, 'Thomas', 'Daryl', '', '', 43, 29, 1, ''),
(33, 2000066525, 'Aparato', 'Christine', '', '', 43, 30, 1, 'Aparato.5e6e101a0794f.png'),
(34, 89896565, 'mendoza', 'setty', '', '', 51, 32, 1, ''),
(35, 987654321, 'De peralta', 'hush', '', '', 51, 34, 1, ''),
(36, 147258369, 'Legarde', 'Dianne', '', '', 43, 35, 1, ''),
(37, 963852741, 'Abalos', 'Romabel ', 'S', '', 43, 36, 1, ''),
(38, 852147963, 'Pacleb', 'Roland', 'P', '', 51, 37, 1, ''),
(39, 195375465, 'Gajasan', 'Jonathan', 'F', '', 43, 38, 1, ''),
(40, 1236544789, 'Teruel', 'Jasper Jeric', 'B', '', 43, 39, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rm_id` int(11) NOT NULL,
  `rm_name` varchar(30) NOT NULL,
  `rm_desc` text NOT NULL,
  `rm_floor` int(11) NOT NULL,
  `rm_active` tinyint(1) NOT NULL DEFAULT 1,
  `rm_starttime` time NOT NULL DEFAULT '07:00:00',
  `rm_endtime` time NOT NULL DEFAULT '17:00:00',
  `rm_jumptime` int(11) NOT NULL DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rm_id`, `rm_name`, `rm_desc`, `rm_floor`, `rm_active`, `rm_starttime`, `rm_endtime`, `rm_jumptime`) VALUES
(1, 'asasdsad', 'asdasdad', 5, 0, '07:00:00', '17:00:00', 30),
(2, 'Rm.507', 'Computer Laboratory', 5, 0, '07:00:00', '17:00:00', 30),
(3, '101', 'Computer Laboratory', 1, 1, '07:00:00', '17:00:00', 30),
(4, 'Rm506', 'Computer Laboratory', 5, 0, '07:00:00', '17:00:00', 30),
(5, '201', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(6, '202', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(7, '203', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(8, '204', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(9, '205', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(10, '206', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(11, '207', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(12, '208', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(13, '209', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(14, '210', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(15, '211', 'Class Room', 2, 1, '07:00:00', '17:00:00', 30),
(16, '301', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(17, '302', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(18, '303', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(19, '304', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(20, '305', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(21, '306', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(22, '307', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(23, '308', 'Class Room', 3, 1, '07:00:00', '17:00:00', 60),
(24, '309', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(25, '310', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(26, '311', 'Class Room', 3, 1, '07:00:00', '17:00:00', 30),
(27, '501', 'Retail', 5, 1, '07:00:00', '17:00:00', 30),
(28, '502', 'Broad Casting Studio', 5, 1, '07:00:00', '17:00:00', 30),
(29, '503', 'Bat and Dinning', 5, 1, '07:00:00', '17:00:00', 30),
(30, '504', 'Computer Laboratory', 5, 1, '07:00:00', '17:00:00', 30),
(31, '505', 'Computer Laboratory', 5, 1, '07:00:00', '17:00:00', 30),
(32, '506', 'Computer Laboratory', 5, 1, '07:00:00', '17:00:00', 30),
(33, '507', 'Computer Laboratory', 5, 1, '07:00:00', '17:00:00', 30),
(34, '601', 'Class Room', 6, 1, '07:00:00', '17:00:00', 30),
(35, '508', 'THM Laboratory', 5, 1, '07:00:00', '17:00:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `sched_id` int(11) NOT NULL,
  `sched_from` time NOT NULL,
  `sched_to` time NOT NULL,
  `sched_day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `sched_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prof_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `sect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sched_id`, `sched_from`, `sched_to`, `sched_day`, `sched_modified`, `prof_id`, `subj_id`, `room_id`, `sect_id`) VALUES
(1, '06:00:00', '10:00:00', 'Tuesday', '2020-03-15 03:22:23', 1, 1, 1, 1),
(2, '08:30:00', '10:00:00', 'Monday', '2020-03-15 03:27:30', 2, 2, 2, 2),
(3, '09:00:00', '10:30:00', 'Wednesday', '2020-03-15 03:27:30', 3, 3, 3, 3);

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
(2, 'BSIT602', 3, 1, 47, 0),
(3, 'BSIT701', 4, 1, 49, 1),
(4, 'BSIT101', 1, 1, 49, 1),
(5, 'BSIT201', 1, 2, 49, 1),
(6, 'BSIT301', 2, 1, 49, 1),
(7, 'BSIT401', 2, 2, 49, 1),
(8, 'BSIT801', 4, 2, 49, 1),
(9, 'BSIT501', 3, 1, 49, 1),
(10, 'BSIT601', 3, 2, 49, 1);

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
(5, 'MAT1003', 'Algebra', 3, 'Tertiarty', 1),
(6, 'COM1021', 'Communication Arts 1', 3, 'Tertiarty', 1),
(7, 'IT1029', 'Computer Fundamentals (Lec)', 2, 'Tertiarty', 1),
(8, 'IT1029L', 'Computer Fundamentals (Lab)', 1, 'Tertiarty', 1),
(9, 'IT1040', 'Computer Programming 1 (Lec)', 3, 'Tertiarty', 1),
(10, 'IT1040L', 'Computer Programming 1 (Lab)', 1, 'Tertiarty', 1),
(11, 'MAT1032', 'Math Plus', 1, 'Tertiarty', 1),
(12, 'NSTP1001', 'Civic Welfare Training Service 1', 3, 'Tertiarty', 1),
(13, 'PE1001', 'Physical Education 1', 2, 'Tertiarty', 1),
(14, 'SOC1030', 'Professional Ethics with Values Formation', 3, 'Tertiarty', 1),
(15, 'COM1024', 'Communication Arts 2', 3, 'Tertiarty', 1),
(16, 'IT1043', 'Computer Programming 2 (Lec)', 3, 'Tertiarty', 1),
(17, 'IT1043L', 'Computer Programming 2 (Lab)', 1, 'Tertiarty', 1),
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
(89, 'PM', 'Principles of Marketing', 80, 'Tertiarty', 0),
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
(118, 'IWRBS', 'Introduction to World Religions and Belief System', 80, 'Tertiarty', 1),
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
(165, 'WSM', 'Wine Service Management', 80, 'Tertiarty', 1),
(166, 'ICO', 'Introduction to Culinary Operations', 80, 'Tertiarty', 1),
(167, 'BFP101', 'Basic Food Production 101', 80, 'Tertiarty', 1),
(168, 'BFP102', 'Basic Food Production 102', 80, 'Tertiarty', 1),
(169, 'BFP103', 'Basic Food Production 103', 80, 'Tertiarty', 1),
(170, 'ICC', 'Introduction to Commercial Cookery', 80, 'Tertiarty', 1),
(171, 'LIC', 'Local and Internation Cuisines', 80, 'Tertiarty', 1),
(172, 'CMCS', 'Catering Management and Control System', 80, 'Tertiarty', 1),
(173, 'IBPP', 'Introduction to Bread and Pastry Production', 80, 'Tertiarty', 1);

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
(1, 'Admin', 'hushsua@gmal.com', '$2y$10$CjwSWLK4HPwfwtkSvHbHNuU.Ol0BMJ1umZR9YQNU/lqYypjPLuxwK', 4, 1),
(28, '3232532', '', '$2y$10$/wGSM4yn76j1Tqtpp2nP8u0YnswezJE/8MIgP86dJgKAJR87oC9AO', 1, 1),
(29, '88888888', '', '$2y$10$HNFr/Uwf0NYTo.hsgH3ae.K5Hbjo8J4t4E.SbXttEew3bWjCGXMxW', 1, 1),
(30, '0200006652', 'chris_tine09@yahoo.com', '$2y$10$WpVKlFearFw1GuG/JVZOC.sH24NUekp0OOwE6qzfJeSRpLeLRroPi', 1, 1),
(31, 'darylpthomasss', '', '$2y$10$7m9yog4MzdGF6/MnFkTfB.1gDO8f2PkkZ4QVf2j7wiDHcfcmWrIue', 3, 1),
(32, 'hellow', 'hahahahha@gmail.com', '$2y$10$RfObYnIiPfEGoZbQa5HpgejqNtlmKdOTXgYLdBEHuTDIXtY8eMNbS', 1, 1),
(33, 'hakdtog', 'hahsdhja@gmail.com', '$2y$10$bYQ9LxqUVB8tbkrY5W5NtOgEJwjMrlqi73yzWBgV3iaInNfmAU6ta', 1, 0),
(34, '987654321', '', '$2y$10$5MipXSVUGbftbWEwk1wYkeTPGG5B7KCV0TzxBXR79T1hjbnmGAt7i', 1, 1),
(35, '147258369', '', '$2y$10$nZUlO7QaxjYsTyjSzm5EcudUa9/3I8nhJUDzrPN5DS6/SSzsEFLuO', 1, 1),
(36, '963852741', '', '$2y$10$jjFqbgPloHcZcVLHsoFDFOcmOjOL.SlXLJzQ4xeT83ora8yXXF/XO', 1, 1),
(37, '852147963', '', '$2y$10$1CMi8YGI1QtcEhP01JT/q.iyVdmUFqU/zubjB8AyeF.fy.YPSv/w.', 1, 1),
(38, '195375465', '', '$2y$10$0XXOng7q6MUnuwRyWbGIjuX63iEpSpyD9tR.luH61.vTUzmwd7.wi', 1, 1),
(39, '1236544789', '', '$2y$10$jkzqN9in/voKfVB9RDYzoOMIrtDp.hXZkJqmIfL/LkunAep7ehq1.', 1, 1);

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
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
