-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 11:26 PM
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
-- Database: `contact_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Компютри и периферия'),
(2, 'Спорт и здраве'),
(3, 'Автомобилни части'),
(4, 'Бяла техника'),
(5, 'Отоплителни уреди');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `message` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `name`, `email`, `phone`, `message`, `created_at`, `deleted_at`, `product_id`) VALUES
(5, 'Test2', 'goealkeeper@footballers.com', '0884615648', 'We burst it. Please fix.', '2021-02-28 15:04:18', NULL, 3),
(6, 'Donatelo', 'none@noreply.bg', '08692651', 'I think it\'s broken. My car isn\'t moving!', '2021-02-28 15:05:01', NULL, 5),
(14, 'Employee', 'tester@site.com', '0819841348', 'Doesn\'t warm up the room!', '2021-03-15 23:01:47', NULL, 7),
(15, 'Tester', 'tester@site.com', '12142', 'It broke.', '2021-03-15 23:06:23', NULL, 6),
(16, 'Dev', 'dev@csharp.com', '123141212', 'My laptop just broke! Could you fix it?', '2021-03-15 23:07:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `date_created`, `date_deleted`, `product_category_id`) VALUES
(1, 'NetBook E40', 'A very cool laptop!', '654.00', '2021-03-15', NULL, 1),
(3, 'Ball', 'High quality ball.', '20.00', '2021-03-15', NULL, 2),
(5, 'Engine', 'For the car to work.', '356.00', '2021-03-15', NULL, 3),
(6, 'Refrigerator', 'Keeps the food cold.', '400.00', '2021-03-15', NULL, 4),
(7, 'Heater', 'For you to feel warm.', '350.00', '2021-03-15', NULL, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
