-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 11:47 AM
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
-- Database: `itvillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` tinyint(4) NOT NULL,
  `result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `result`) VALUES
(0, 'Загуба'),
(1, 'Победа');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `score_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `is_win` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `user_id`, `score`, `date_created`, `date_deleted`, `is_win`) VALUES
(292, 66, 50, '2021-04-13', NULL, 1),
(293, 66, 50, '2021-04-13', NULL, 1),
(294, 66, 40, '2021-04-13', NULL, 1),
(295, 66, 40, '2021-04-13', NULL, 1),
(296, 66, 40, '2021-04-13', NULL, 0),
(297, 66, 30, '2021-04-13', NULL, 0),
(298, 66, 30, '2021-04-13', NULL, 1),
(299, 66, 30, '2021-04-13', NULL, 0),
(300, 66, 30, '2021-04-13', NULL, 1),
(301, 66, 260, '2021-04-13', NULL, 1),
(302, 66, 70, '2021-04-13', NULL, 1),
(303, 66, 70, '2021-04-13', NULL, 1),
(304, 66, 450, '2021-04-14', NULL, 0),
(305, 66, 530, '2021-04-14', NULL, 1),
(306, 66, 775, '2021-04-14', NULL, 0),
(307, 66, 660, '2021-04-14', NULL, 1),
(308, 66, 50, '2021-04-14', NULL, 1),
(309, 66, 70, '2021-04-14', NULL, 0),
(310, 66, 90, '2021-04-14', NULL, 0),
(311, 66, 4850, '2021-04-14', NULL, 0),
(312, 66, 75, '2021-04-14', NULL, 0),
(313, 66, 75, '2021-04-14', NULL, 0),
(314, 66, 695, '2021-04-14', NULL, 0),
(315, 66, 70, '2021-04-14', NULL, 0),
(316, 66, 8670, '2021-04-14', NULL, 0),
(317, 66, 8670, '2021-04-14', NULL, 1),
(318, 66, 85, '2021-04-14', NULL, 1),
(319, 66, 80, '2021-04-14', NULL, 1),
(320, 66, 670, '2021-04-14', NULL, 1),
(321, 66, 130, '2021-04-14', NULL, 1),
(322, 66, 60, '2021-04-14', NULL, 0),
(323, 66, 65, '2021-04-14', NULL, 1),
(324, 66, 85, '2021-04-14', NULL, 0),
(325, 66, 400, '2021-04-14', NULL, 1),
(326, 66, 70, '2021-04-14', NULL, 1),
(327, 66, 900, '2021-04-14', NULL, 1),
(328, 66, 3470, '2021-04-14', NULL, 0),
(329, 66, 3470, '2021-04-14', NULL, 1),
(330, 66, 50, '2021-04-14', NULL, 1),
(331, 66, 55, '2021-04-14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `wins_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `date_created`, `date_deleted`, `wins_count`) VALUES
(62, 'kris', '$2y$10$ngj7tRYFA1AROwt1i5a5oO.vQB3uyhdm216NUB5Dug.UBLi.uwtpG', '2021-04-09', NULL, 101),
(63, 'localuser', '$2y$10$ya7McHX2BcaaOFg378.//uno5k4/CLFiKeMP045lErKmmuo9xOsai', '2021-04-09', NULL, 3),
(64, 'kris1', '$2y$10$RLrQZp1IuFHX.3tmolnf1OgLDxr/DyWSNhW/Z.zG/ToxPR2G8unvq', '2021-04-12', NULL, 0),
(65, 'kris3', '$2y$10$s4hvFkUaZ8S5wLCDkZoQw.xUgo4eHNYgHq6fytORl81toFL0HA9Sq', '2021-04-12', NULL, 0),
(66, 'kr1sko', '$2y$10$1RsTWSRCENIPN/YnU83Y8.GoyGAbHhICDb/RqPjZeCk7oYw23cJR.', '2021-04-12', NULL, 108);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `is_win` (`is_win`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`is_win`) REFERENCES `results` (`result_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
