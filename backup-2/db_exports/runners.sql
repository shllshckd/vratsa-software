-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 12:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `runners`
--

-- --------------------------------------------------------

--
-- Table structure for table `runners`
--

CREATE TABLE `runners` (
  `runner_id` int(11) NOT NULL,
  `runner_first_name` varchar(250) NOT NULL,
  `runner_last_name` varchar(250) NOT NULL,
  `runner_competitions_won_count` int(11) NOT NULL,
  `runner_style_id` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runners`
--

INSERT INTO `runners` (`runner_id`, `runner_first_name`, `runner_last_name`, `runner_competitions_won_count`, `runner_style_id`, `date_deleted`, `date_created`) VALUES
(2, '1st nane', '2nd name', 23, 1, NULL, '2021-04-16'),
(4, 'short ', 'runner', 31, 2, NULL, '2021-04-17'),
(5, 'zshlong', 'zshlong', 31, 1, NULL, '2021-04-17'),
(6, 'aide', 'nqmam', 132, 1, NULL, '2021-04-17'),
(8, 'peti', 'peti', 13, 1, NULL, '2021-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `style_id` int(11) NOT NULL,
  `style_name` varchar(250) NOT NULL,
  `style_description` text NOT NULL,
  `style_meters_long` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`style_id`, `style_name`, `style_description`, `style_meters_long`, `date_deleted`, `date_created`) VALUES
(1, 'long running', '\r\nyou run long', 13456, NULL, '2021-04-20'),
(2, 'short running', '\r\nyou run short', 123, NULL, '2021-04-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `runners`
--
ALTER TABLE `runners`
  ADD PRIMARY KEY (`runner_id`),
  ADD KEY `runner_style_id` (`runner_style_id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`style_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `runners`
--
ALTER TABLE `runners`
  MODIFY `runner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `runners`
--
ALTER TABLE `runners`
  ADD CONSTRAINT `runners_ibfk_1` FOREIGN KEY (`runner_style_id`) REFERENCES `styles` (`style_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
