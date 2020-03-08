-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 06:03 PM
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
(48, 'BSTM', 'Bachelor of Science in Tourism Management', 'faculty', 0);

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
(32, 88888888, 'Thomas', 'Daryl', 'P', '', 43, 29, 1, 'Thomas.5e64b833c3a95.png');

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
(28, '323253243', '', '$2y$10$6y7QLY6kkNDMUvnt3Uhmk.h8dfIUxaIKDkBFxDA9P1gQ7/OpnRMJe', 1, 1),
(29, '88888888', '', '$2y$10$HNFr/Uwf0NYTo.hsgH3ae.K5Hbjo8J4t4E.SbXttEew3bWjCGXMxW', 1, 1);

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
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
