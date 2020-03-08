-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 05:36 AM
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
  `dept_type` enum('faculty','tertiary','strand') NOT NULL,
  `dept_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `dept_desc`, `dept_type`, `dept_active`) VALUES
(17, 'IT', 'Information Technology', 'faculty', 1),
(18, 'GE', 'General Education', 'faculty', 0),
(19, 'HUMMS', 'alkdmsaldkm', 'faculty', 0),
(20, 'BSCS', 'Bachelor of Science in Computer Science', 'faculty', 1),
(21, 'SHS', 'asldknlk', 'faculty', 0),
(22, 'SHSHS', 'fdfd', 'faculty', 0),
(23, 'BSI', 'laskdmlasd', 'faculty', 0),
(24, 'DSDSD', 'ewew', 'faculty', 0),
(25, 'TMMMM', 'ldksmdlskm', 'faculty', 0),
(26, 'ewewe', 'sdsds', 'faculty', 0),
(27, 'trtew', 'dsds', 'faculty', 0),
(28, 'TMMMM', 'alskdmsld', 'faculty', 0),
(29, 'BSITT', 'dasdsa', 'faculty', 0),
(30, 'BSITT', 'dasdsa', 'faculty', 0),
(31, 'BSITT', 'dasdsa', 'faculty', 0),
(32, 'ASCT ', 'asldksmadlk', 'faculty', 0),
(33, 'BSITT', 'lsakdmlaskd', 'faculty', 0),
(34, 'BSITT', 'lsakdmlaskd', 'faculty', 0),
(35, 'BSITT', 'lsakdmlaskd', 'faculty', 0),
(36, 'BSITT', 'lsakdmlaskd', 'faculty', 0),
(37, 'BSITT', 'lsakdmlaskd', 'faculty', 0),
(38, 'BSITT', 'lsakdmlaskd', 'faculty', 0),
(39, 'ewew', 'dsdsd', 'faculty', 0),
(40, 'ewewq', 'fdfdf', 'faculty', 0),
(41, 'eqwew', 'sdsds', 'faculty', 0);

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
(31, 323253243, 'Aparato', 'Christine', '', '', 17, 28, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rm_id` int(11) NOT NULL,
  `rm_name` varchar(30) NOT NULL,
  `rm_desc` text NOT NULL,
  `rm_floor` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rm_id`, `rm_name`, `rm_desc`, `rm_floor`, `is_active`) VALUES
(1, 'asasdsad', 'asdasdad', 5, 1),
(2, 'Rm.507', 'Computer Laboratory', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subj_id` int(11) NOT NULL,
  `subj_code` varchar(12) NOT NULL,
  `subj_desc` text NOT NULL,
  `units` int(11) NOT NULL,
  `dept` enum('Tertiarty','SHS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subj_id`, `subj_code`, `subj_desc`, `units`, `dept`) VALUES
(1, 'ACTS', 'Mobile Development', 3, 'Tertiarty'),
(2, 'ACTSSE', 'Mobile Development', 0, 'Tertiarty');

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
(1, 'Admin', NULL, '$2y$10$jhbW3h7ezqK4KeJFG0UE/OXn2D4vlACDxdY718CqLxDwWbrFSWuQG', 4, 1),
(28, '323253243', '', '$2y$10$6y7QLY6kkNDMUvnt3Uhmk.h8dfIUxaIKDkBFxDA9P1gQ7/OpnRMJe', 1, 0);

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
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
