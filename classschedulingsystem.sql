-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 04:33 PM
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
-- Table structure for table `dept_faculty`
--

CREATE TABLE `dept_faculty` (
  `dept_id` int(2) NOT NULL,
  `dept_name` varchar(5) NOT NULL,
  `dept_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_faculty`
--

INSERT INTO `dept_faculty` (`dept_id`, `dept_name`, `dept_desc`) VALUES
(1, 'IT', 'Information Technology'),
(2, 'CS', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `dept_student`
--

CREATE TABLE `dept_student` (
  `dept_id` int(2) NOT NULL,
  `dept_name` varchar(5) NOT NULL,
  `dept_desc` text NOT NULL,
  `dept_type` enum('shs','tertiary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `emp_no`, `last_name`, `first_name`, `middle_initial`, `suffix`, `dept_id`, `is_active`) VALUES
(1, 2999, 'Thomas', 'Daryl', 'P', '', 1, 1),
(2, 2999, 'Thomas', 'Daryl', 'P', '', 1, 1),
(3, 0, 'sdsd23', 'e232', '', '', 1, 1),
(4, 123456789, 'Thomas', 'Daryl', 'P', '', 1, 1),
(5, 123456789, 'Thomas', 'Daryl', 'P', '', 1, 1),
(6, 12345678, 'Thomas', 'Daryl', 'P', 'jr', 1, 1),
(7, 12345677, 'De Peralta', 'Hushaia', '', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept_faculty`
--
ALTER TABLE `dept_faculty`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `dept_student`
--
ALTER TABLE `dept_student`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dept_faculty`
--
ALTER TABLE `dept_faculty`
  MODIFY `dept_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dept_student`
--
ALTER TABLE `dept_student`
  MODIFY `dept_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
