-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2017 at 10:07 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leza`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `designation` varchar(60) NOT NULL,
  `joining_date` date NOT NULL,
  `salary` float(10,2) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `dob`, `designation`, `joining_date`, `salary`, `photo`, `added_on`, `updated_on`, `is_active`) VALUES
(1, 'Yash Khuthia', 'yash.khuthia@gmail.com', '1990-04-15', 'PHP Developer', '2017-11-01', 58000.00, '', '2017-10-15 15:26:39', '2017-10-17 10:06:32', 1),
(2, 'Zeeshan', 'zeeshan111@yahoo.com', '1991-12-15', 'Accounts Head', '2014-08-01', 35000.00, '', '2017-10-15 17:07:23', '2017-10-17 10:04:51', 1),
(3, 'Goku San', 'son.goku@dbs.com', '0190-05-05', 'Z Fighter', '2017-10-01', 100.00, 'goku.jpg', '2017-10-17 02:29:52', '2017-10-17 10:07:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary` float(10,2) NOT NULL,
  `salary_date` date NOT NULL,
  `variation_type` enum('deduction','allowance','') DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `salary`, `salary_date`, `variation_type`, `remarks`, `added_on`, `updated_on`) VALUES
(1, 1, 51000.00, '2017-10-15', 'allowance', 'Exhibition Expenses added', '2017-10-15 23:44:43', '2017-10-15 23:45:03'),
(2, 1, 48000.00, '2017-09-01', '', '', '2017-10-17 00:44:37', NULL),
(3, 2, 35000.00, '2017-10-04', '', '', '2017-10-17 00:44:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `employeeSalaries` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
