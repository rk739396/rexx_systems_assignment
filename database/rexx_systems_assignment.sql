-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 07:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rexx_systems_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `rexx_test_table`
--

CREATE TABLE `rexx_test_table` (
  `id` int(11) NOT NULL,
  `participation_id` int(200) NOT NULL,
  `employee_name` varchar(200) NOT NULL,
  `employee_mail` varchar(200) NOT NULL,
  `event_id` varchar(200) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `participation_fee` varchar(200) NOT NULL,
  `event_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rexx_test_table`
--

INSERT INTO `rexx_test_table` (`id`, `participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`) VALUES
(1, 1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', '1', 'PHP 7 crash course', '0', '2019-09-04'),
(2, 2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', '2', 'International PHP Conference', '1485.99', '2019-10-21'),
(3, 3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', '2', 'International PHP Conference', '657.50', '2019-10-21'),
(4, 4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', '1', 'PHP 7 crash course', '0', '2019-09-04'),
(5, 5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', '1', 'PHP 7 crash course', '0', '2019-09-04'),
(6, 6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', '2', 'International PHP Conference', '657.50', '2019-10-21 08:00:00'),
(7, 7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', '3', 'code.talks', '474.81', '2019-10-24'),
(8, 8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', '3', 'code.talks', '534.31', '2019-10-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rexx_test_table`
--
ALTER TABLE `rexx_test_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IndxempName` (`employee_name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rexx_test_table`
--
ALTER TABLE `rexx_test_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
