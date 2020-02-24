-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 12:54 PM
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
-- Database: `centric_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `date`) VALUES
(13, 5, '2020-02-01'),
(14, 7, '2020-02-03'),
(15, 5, '2020-02-29'),
(16, 1, '2020-02-28'),
(17, 1, '2020-02-02'),
(18, 5, '2020-02-02'),
(19, 5, '2020-03-01'),
(20, 1, '2020-02-13'),
(21, 5, '2020-02-21'),
(24, 1, '2020-02-05'),
(25, 1, '2020-02-06'),
(26, 1, '2020-02-15'),
(28, 1, '2020-02-18'),
(31, 1, '2020-02-21'),
(32, 1, '2020-02-24'),
(33, 1, '2020-02-03'),
(34, 1, '2020-02-04'),
(36, 1, '2020-02-08'),
(37, 1, '2020-02-09'),
(38, 1, '2020-02-10'),
(39, 1, '2020-02-11'),
(40, 1, '2020-02-12'),
(43, 1, '2020-02-16'),
(44, 1, '2020-02-17'),
(46, 1, '2020-02-19'),
(47, 1, '2020-02-20'),
(48, 1, '2020-02-22'),
(50, 5, '2020-02-03'),
(51, 5, '2020-02-04'),
(52, 5, '2020-02-05'),
(53, 5, '2020-02-08'),
(54, 5, '2020-02-09'),
(55, 5, '2020-02-10'),
(56, 5, '2020-02-11'),
(58, 5, '2020-02-13'),
(59, 5, '2020-02-15'),
(60, 5, '2020-02-16'),
(61, 5, '2020-02-18'),
(62, 5, '2020-02-19'),
(63, 5, '2020-02-20'),
(64, 12, '2020-02-02'),
(65, 12, '2020-02-03'),
(66, 12, '2020-02-04'),
(67, 12, '2020-02-05'),
(68, 12, '2020-02-06'),
(69, 12, '2020-02-08'),
(70, 12, '2020-02-09'),
(71, 12, '2020-02-10'),
(72, 12, '2020-02-11'),
(73, 12, '2020-02-12'),
(74, 1, '2020-01-01'),
(75, 1, '2020-01-02'),
(76, 1, '2020-01-04'),
(77, 6, '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `department` varchar(191) NOT NULL,
  `date_joined` date NOT NULL,
  `address` text DEFAULT NULL,
  `nid` varchar(191) DEFAULT NULL,
  `emergency_contact` int(13) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `position`, `department`, `date_joined`, `address`, `nid`, `emergency_contact`, `lat`, `lng`) VALUES
(1, 'Roxy Palma', 'Developer', 'IT', '2020-02-22', 'Monipuripara, Gate 2, Dhaka 1215', '1223231', 1937675131, 23.759960, 90.383865),
(5, 'Simson Palma', 'Developer', 'IT', '2020-02-26', 'Bashati Castle, Dhanmondi Road 13, Dhaka', '321asdf123', 1937675131, 23.752993, 90.374512),
(6, 'Stayfee Gomez', 'Accountant', 'Accounting', '2020-02-04', 'Sector 14, Uttara, Dhaka', '12345679', 1716010972, 23.866695, 90.387016),
(7, 'Hamida Rahman', 'HR Assosciate', 'HR', '2020-02-24', 'Bashundhora Road 6/C, Dhaka 1213', '12324654', 1937675131, 23.814468, 90.426888),
(12, 'Fahim Ahmed', 'Developer', 'IT', '2020-02-11', 'Shwera para', '133216544', 1937675135, 23.790329, 90.375244);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `basic` decimal(11,2) NOT NULL,
  `house` decimal(11,2) DEFAULT NULL,
  `medical_allowance` decimal(11,2) DEFAULT NULL,
  `conveyance` decimal(11,2) DEFAULT NULL,
  `food_allowance` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `basic`, `house`, `medical_allowance`, `conveyance`, `food_allowance`) VALUES
(1, 5, '25000.00', '25000.00', '3000.00', '3000.00', '3000.00'),
(2, 6, '15000.00', '1000.00', '500.00', '7000.00', '2000.00'),
(3, 7, '25000.00', '10000.00', '10000.00', '10000.00', '5000.00'),
(4, 12, '30000.00', '8000.00', '5000.00', '4000.00', '4000.00'),
(5, 1, '30000.00', '7000.00', '1000.00', '3000.00', '4000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
