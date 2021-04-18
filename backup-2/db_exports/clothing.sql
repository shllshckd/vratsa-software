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
-- Database: `clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `national_clothing`
--

CREATE TABLE `national_clothing` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `color` varchar(50) NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `national_clothing`
--

INSERT INTO `national_clothing` (`id`, `name`, `description`, `color`, `date_deleted`, `date_created`) VALUES
(1, 'victorian', 'very well maintained', 'black', NULL, '0000-00-00'),
(2, 'bulgarian', 'very well maintained', 'black', NULL, '0000-00-00'),
(3, 'irish', 'it looks nice', 'black', NULL, '2021-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `rent_request`
--

CREATE TABLE `rent_request` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `request_message` varchar(500) NOT NULL,
  `national_clothing_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_request`
--

INSERT INTO `rent_request` (`id`, `username`, `email`, `phone`, `request_message`, `national_clothing_id`, `date_created`, `date_deleted`) VALUES
(14, 'mymessage', 'sa', 1311, '2312', 1, '2021-04-16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `national_clothing`
--
ALTER TABLE `national_clothing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_request`
--
ALTER TABLE `rent_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `national_clothing_id` (`national_clothing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `national_clothing`
--
ALTER TABLE `national_clothing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rent_request`
--
ALTER TABLE `rent_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rent_request`
--
ALTER TABLE `rent_request`
  ADD CONSTRAINT `rent_request_ibfk_1` FOREIGN KEY (`national_clothing_id`) REFERENCES `national_clothing` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
