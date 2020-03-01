-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 07:29 PM
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
  `dept_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `dept_desc`) VALUES
(17, 'IT', 'Information Technology'),
(18, 'GE', 'General Education'),
(19, 'HUMMS', 'alkdmsaldkm'),
(20, 'BSCS', 'Bachelor of Science in Computer Science'),
(21, 'SHS', 'asldknlk'),
(22, 'SHSHS', 'fdfd'),
(23, 'BSI', 'laskdmlasd'),
(24, 'DSDSD', 'ewew'),
(25, 'TMMMM', 'ldksmdlskm'),
(26, 'ewewe', 'sdsds'),
(27, 'trtew', 'dsds'),
(28, 'TMMMM', 'alskdmsld'),
(29, 'BSITT', 'dasdsa'),
(30, 'BSITT', 'dasdsa'),
(31, 'BSITT', 'dasdsa'),
(32, 'ASCT ', 'asldksmadlk'),
(33, 'BSITT', 'lsakdmlaskd'),
(34, 'BSITT', 'lsakdmlaskd'),
(35, 'BSITT', 'lsakdmlaskd'),
(36, 'BSITT', 'lsakdmlaskd'),
(37, 'BSITT', 'lsakdmlaskd'),
(38, 'BSITT', 'lsakdmlaskd'),
(39, 'ewew', 'dsdsd'),
(40, 'ewewq', 'fdfdf'),
(41, 'eqwew', 'sdsds');

-- --------------------------------------------------------

--
-- Table structure for table `dept_type`
--

CREATE TABLE `dept_type` (
  `type_id` int(11) NOT NULL,
  `type` enum('Faculty','Strand','Course') NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_type`
--

INSERT INTO `dept_type` (`type_id`, `type`, `dept_id`) VALUES
(19, 'Faculty', 17),
(20, 'Faculty', 18),
(22, 'Strand', 19),
(23, 'Course', 20),
(24, 'Faculty', 21),
(25, 'Faculty', 22),
(26, 'Course', 23),
(27, 'Faculty', 26),
(28, 'Strand', 26),
(29, 'Course', 39);

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
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `prof_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `emp_no`, `last_name`, `first_name`, `middle_initial`, `suffix`, `dept_id`, `is_active`, `prof_img`) VALUES
(1, 123456789, 'Thomas', 'Daryl', '', '', 18, 1, ''),
(2, 321654987, 'Aparato', 'Christine', '', '', 17, 0, ''),
(3, 21474836, 'Aparato', 'Christine', 'B', '', 17, 1, 'Aparato.5e58eb65e0614.png'),
(4, 45253257, 'Abalos', 'Romabel', 'S', '', 17, 1, ''),
(5, 45762315, 'Bermejo', 'Christine', 'M', '', 17, 1, ''),
(6, 98713564, 'Gajasan', 'Jonathan', 'F', '', 18, 1, ''),
(7, 78945378, 'De Peralta', 'Hushaia Faith', '', '', 18, 1, ''),
(8, 56287936, 'Legarde', 'Princess Dianne', '', '', 17, 1, ''),
(9, 72455545, 'Lopez', 'Jaime', '', '', 17, 1, ''),
(10, 25483544, 'Teruel', 'Jeric Jasper', '', '', 18, 1, ''),
(11, 558432788, 'Pacleb', 'Roland', 'P', '', 17, 1, ''),
(12, 46582355, 'Mendoza', 'Christiane', 'M', '', 17, 1, ''),
(13, 55446688, 'Garcia', 'Kenneth', 'L', '', 17, 1, ''),
(14, 29038838, 'firstname', 'lastname', '', '', 21, 1, ''),
(15, 12875638, 'klatbasd', 'kasjdnk', 'k', '', 17, 1, ''),
(16, 32323232, 'adsedsa', 'ewew', '', '', 17, 1, ''),
(17, 12345678, 'Thomas', 'Daryl', '', '', 17, 1, 'Thomas.5e59fcce06d0c.png');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subj_id` int(11) NOT NULL,
  `subj_code` varchar(12) NOT NULL,
  `subj_desc` text NOT NULL,
  `units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subj_id`, `subj_code`, `subj_desc`, `units`) VALUES
(1, 'ACTS', 'Mobile Development', 3),
(2, 'ACTSSE', 'Mobile Development', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(25) NOT NULL,
  `role_level` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `dept_type`
--
ALTER TABLE `dept_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `dept_type`
--
ALTER TABLE `dept_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
