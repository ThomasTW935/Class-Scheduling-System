-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 07:45 AM
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
(1, 'BSIT', 'Bachelor of Science in Information Technology'),
(2, 'BSCS', 'Bachelor of Science in Computer Science'),
(3, 'GAS', 'GAS'),
(4, 'GE', 'General Education');

-- --------------------------------------------------------

--
-- Table structure for table `dept_type`
--

CREATE TABLE `dept_type` (
  `id` int(11) NOT NULL,
  `type` enum('Faculty','SHS','Tertiary') NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_type`
--

INSERT INTO `dept_type` (`id`, `type`, `dept_id`) VALUES
(3, 'SHS', 3),
(4, 'Faculty', 1),
(5, 'Tertiary', 2),
(6, 'Faculty', 4);

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
(8, 77777777, 'Aparato', 'Christine', '', '', 1, 1),
(10, 123456789, 'TThomas', 'DDaryl', '', '', 4, 1),
(11, 88888888, 'De Peralta', 'Hushaia', 'P', '', 1, 1);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dept_type`
--
ALTER TABLE `dept_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
