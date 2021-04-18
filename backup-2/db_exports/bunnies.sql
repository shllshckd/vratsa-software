-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 12:47 AM
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
-- Database: `bunnies`
--

-- --------------------------------------------------------

--
-- Table structure for table `bunnies`
--

CREATE TABLE `bunnies` (
  `bunny_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bunnies`
--

INSERT INTO `bunnies` (`bunny_id`, `name`, `age`, `category_id`, `date_created`, `date_deleted`) VALUES
(7, 'ankooo!!! cheren zaek', 3, 3, '2021-04-17', NULL),
(11, 'asen blatechki', 1, 2, '2021-04-17', NULL),
(12, '3 asev', 3, 2, '2021-04-17', NULL),
(13, 'boiko4', 2311, 2, '2021-04-17', NULL),
(15, 'pi4', 444, 2, '2021-04-17', NULL),
(16, 'aacc', 32, 2, '2021-04-17', NULL),
(17, 'ddd', 0, 2, '2021-04-17', NULL),
(18, '3231', 31, 2, '2021-04-17', NULL),
(19, 'aacc', 32, 2, '2021-04-17', NULL),
(20, 'aacb', 32, 2, '2021-04-17', NULL),
(21, 'aacc', 333, 2, '2021-04-17', NULL),
(22, 'acbg', 321, 2, '2021-04-17', NULL),
(23, 'aaBG', 231, 2, '2021-04-17', '2021-04-17'),
(24, 'asen', 4324, 2, '2021-04-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bunny_categories`
--

CREATE TABLE `bunny_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bunny_categories`
--

INSERT INTO `bunny_categories` (`category_id`, `name`, `date_created`, `date_deleted`) VALUES
(2, 'black', '2021-04-22', NULL),
(3, 'white', '2021-04-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `information` varchar(500) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owners_bunnies`
--

CREATE TABLE `owners_bunnies` (
  `owner_id` int(11) NOT NULL,
  `bunny_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bunnies`
--
ALTER TABLE `bunnies`
  ADD PRIMARY KEY (`bunny_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `bunny_categories`
--
ALTER TABLE `bunny_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `owners_bunnies`
--
ALTER TABLE `owners_bunnies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bunny_id` (`bunny_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bunnies`
--
ALTER TABLE `bunnies`
  MODIFY `bunny_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bunny_categories`
--
ALTER TABLE `bunny_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owners_bunnies`
--
ALTER TABLE `owners_bunnies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bunnies`
--
ALTER TABLE `bunnies`
  ADD CONSTRAINT `bunnies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `bunny_categories` (`category_id`);

--
-- Constraints for table `owners_bunnies`
--
ALTER TABLE `owners_bunnies`
  ADD CONSTRAINT `owners_bunnies_ibfk_1` FOREIGN KEY (`bunny_id`) REFERENCES `bunnies` (`bunny_id`),
  ADD CONSTRAINT `owners_bunnies_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`owner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
