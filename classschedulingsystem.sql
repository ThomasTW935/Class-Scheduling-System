-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 06:09 PM
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
(17, 'IT', 'Information Technolo'),
(18, 'GE', 'General Education');

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
(17, 'Course', 17),
(19, 'Faculty', 17),
(20, 'Faculty', 18);

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
(1, 2999, 'Thomas', 'Daryl', 'P', '', 1, 0),
(2, 2999, 'Thomas', 'Daryl', 'P', '', 1, 0),
(3, 0, 'sdsd23', 'e232', '', '', 1, 0),
(6, 12345678, 'Thomas', 'Daryl', 'P', 'jr', 1, 0),
(7, 12345677, 'De Peralt', 'Hushaia', 'P', '', 1, 0),
(8, 77777777, 'Aparato', 'Christine', '', '', 1, 0),
(10, 2147483647, 'TThomas', 'DDaryl', '', '', 4, 1),
(11, 88888888, 'De Peralta', 'Hushaia', 'P', '', 4, 1),
(12, 2147483647, 'Mercado', 'Jenny', 'F', '', 4, 0),
(13, 66666666, 'Aparato', 'Christine', '', '', 3, 1),
(14, 111234567, 'Thomas', 'Daryl', '', '', 1, 1),
(15, 2121212121, 'Thomas', 'Daryl', '', '', 2, 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dept_type`
--
ALTER TABLE `dept_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
