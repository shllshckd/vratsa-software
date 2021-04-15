-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 12:32 AM
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
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `product_calories` int(6) DEFAULT 10,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category_id`, `product_price`, `product_calories`, `date_deleted`) VALUES
(1, 'пилешко месо1', 3, '7.00', 125, NULL),
(2, 'прясно мляко', 4, '2.00', 178, '2021-04-16'),
(3, 'яйца', 4, '0.20', 65, NULL),
(4, 'брашно', 6, '1.00', 10, NULL),
(5, 'захар', 6, '1.30', 10, NULL),
(6, 'сода', 4, '1.00', 10, NULL),
(7, 'сол', 6, '0.70', 10, NULL),
(8, 'кисело мляко', 4, '1.00', 80, NULL),
(9, 'плодово кисело мляко', 4, '1.50', 200, NULL),
(11, 'червен пипер', 7, '2.00', 10, NULL),
(12, 'масло', 4, '2.90', 180, NULL),
(14, 'бананов сок', 8, '4.00', 80, NULL),
(15, 'ябълков сок', 8, '2.50', 40, NULL),
(16, 'портокал', 1, '25.00', 125, NULL),
(17, 'грейпфрут', 1, '2.00', 30, NULL),
(19, 'мандарина', 1, '2.00', 50, NULL),
(22, 'test', NULL, '10.00', 10, NULL),
(23, 'test', NULL, '10.00', 10, NULL),
(28, 'мляко', 4, '6.00', 200, NULL),
(29, 'мое мляко', 4, '65.00', 1030, NULL),
(30, 'мое мляко', 4, '65.00', 1030, NULL),
(31, 'мое мляко 2', 4, '65.35', 1030, NULL),
(32, 'мляко 123', 4, '365.00', 22, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `date_deleted`) VALUES
(1, 'плодове', NULL),
(2, 'зеленчуци', NULL),
(3, 'месо', NULL),
(4, 'млечни', NULL),
(5, 'яйца', NULL),
(6, 'сухи съставки', NULL),
(7, 'подправки', NULL),
(8, 'сокове\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(250) NOT NULL,
  `prep_description` text NOT NULL,
  `prep_time` int(4) NOT NULL,
  `recipe_category_id` int(11) DEFAULT NULL,
  `date_created` date NOT NULL,
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_name`, `prep_description`, `prep_time`, `recipe_category_id`, `date_created`, `date_deleted`) VALUES
(1, 'Таратор', 'Таратор описание', 10, 1, '2021-02-18', NULL),
(2, 'палачинки', 'Lorem ipsum ibudoloris', 60, 4, '2021-02-18', NULL),
(13, 'Spring Rolls', 'Mix the meat with the marinade ingredients and set aside for about 30 minutes ...', 30, 1, '1985-09-11', NULL),
(15, 'проба', 'няма', 60, 1, '2021-02-21', NULL),
(17, 'Супа пиле', 'Lorem Ipsum Ibudoloris', 45, 1, '2021-02-01', NULL),
(18, 'Пиле Жулиен', 'Lorem ipsum', 55, 5, '2020-02-21', NULL),
(19, 'Пиле Жулиен2', 'Lorem ipsum', 55, 5, '2020-02-21', NULL),
(20, 'Пиле Жулоен11', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', 55, 5, '2020-02-21', NULL),
(21, 'Лазаня', ' Lorem ipsum dksasdkj', 90, 5, '2021-02-21', NULL),
(22, ' Шопска салата', ' Lorem ipsum dksasdkj', 90, 3, '2021-02-10', NULL),
(23, ' Овчарска салата', ' Lorem ipsum dksasdkj', 90, 3, '2021-02-08', NULL),
(24, 'Тестово Ястие7', 'Начин  на приготвяне .....', 120, 2, '2021-02-21', NULL),
(26, 'Ястие без категория', 'Описание', 30, NULL, '2021-03-01', NULL),
(27, 'new recipe', 'description adsadas', 10, NULL, '2020-10-10', NULL),
(28, 'new recipe', 'description adsadas', 10, NULL, '1999-01-22', NULL),
(29, 'new recipe2', 'new recipe 2 descrip', 30, NULL, '2021-03-04', NULL),
(30, 'rwqrwq', 'rwqrwqrqw', 10, NULL, '2021-03-07', NULL),
(31, 'fsafsa', 'fsafsafas', 23, 3, '2021-03-07', NULL),
(32, 'new recipe with category1', 'new recipe with category1 d', 10, 3, '2021-03-07', NULL),
(33, 'Сирене по Врачански', 'Описание', 11, 5, '2021-03-08', NULL),
(34, 'Миди Сен-Жак', 'test', 60, 2, '2021-03-08', NULL),
(36, 'fasfas', 'fsafsafasfsa', 11, 4, '2021-03-14', NULL),
(37, 'ds', 'dsaasd', 11, 2, '2021-03-14', NULL),
(38, 'safsa', 'fsasfa', 11, 2, '2021-03-14', NULL),
(39, 'fasfa', 'asdas', 11, 3, '2021-03-14', NULL),
(40, 'dasadasfd', 'fasfasfsa', 111, 3, '2021-03-14', NULL),
(41, 'Тестова Рецепта 14.03 1', 'Тестова Рецепта 14.03 1 Описание', 10, 2, '2021-03-14', NULL),
(42, 'Рецепта без продукти', 'рецепта', 1, 5, '2021-03-14', NULL),
(43, 'Рецепта без продукти', 'Тестова Рецепта 14.03 1 Описание', 1, 2, '2021-03-14', NULL),
(44, 'wrqrw', 'wrqrwq', 11, 2, '2021-03-14', NULL),
(46, 'TEST51', 'test51', 101, 3, '2021-03-14', NULL),
(47, 'Първа Рецепта с продукти', 'Рецепта с продукти през формата', 15, 8, '2021-03-14', NULL),
(48, 'fsa', 'fsafasfsa', 21, 4, '2021-03-14', NULL),
(49, 'Тестова рецепта с продукти от input полетата', 'тест', 10, 2, '2021-03-14', NULL),
(60, 'нова р', 'нова р', 312, 2, '2021-04-15', NULL),
(61, 'Рецепти с про', 'Description', 411, 8, '2021-04-15', NULL),
(62, 'вкусна супа 123', 'вкусна супа', 34, 1, '2021-04-08', NULL),
(63, 'вкусна супа 123', 'вкусна супа', 34, 1, '2021-04-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipes_products`
--

CREATE TABLE `recipes_products` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` decimal(7,3) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes_products`
--

INSERT INTO `recipes_products` (`id`, `recipe_id`, `product_id`, `product_quantity`, `unit_id`) VALUES
(1, 2, 3, '3.000', 2),
(2, 2, 2, '1.000', 3),
(3, 2, 4, '0.500', 1),
(4, 2, 5, '0.150', 1),
(5, 2, 6, '10.000', 2),
(6, 47, 3, NULL, NULL),
(7, 47, 4, NULL, NULL),
(8, 49, 1, '10.000', NULL),
(9, 49, 3, '5.000', NULL),
(10, 49, 19, '1.000', NULL),
(79, 60, 1, '1.000', NULL),
(80, 60, 2, '1.000', NULL),
(81, 60, 3, '1.000', NULL),
(82, 60, 4, '1.000', NULL),
(83, 60, 5, '1.000', NULL),
(84, 60, 6, '1333.000', NULL),
(85, 60, 7, '4.000', NULL),
(86, 60, 8, '4.000', NULL),
(87, 60, 9, '44.000', NULL),
(88, 60, 11, '4.000', NULL),
(89, 60, 12, '4.000', NULL),
(90, 60, 14, '4.000', NULL),
(91, 60, 15, '4.000', NULL),
(92, 60, 16, '4.000', NULL),
(93, 60, 17, '44.000', NULL),
(94, 60, 19, '4.000', NULL),
(95, 60, 22, '4.000', NULL),
(96, 60, 23, '4.000', NULL),
(97, 61, 1, '1.000', NULL),
(98, 61, 2, '1.000', NULL),
(99, 1, 32, '123.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_categories`
--

CREATE TABLE `recipe_categories` (
  `recipe_category_id` int(11) NOT NULL,
  `recipe_category_name` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_categories`
--

INSERT INTO `recipe_categories` (`recipe_category_id`, `recipe_category_name`, `date_deleted`, `date_created`) VALUES
(1, 'супи', NULL, NULL),
(2, 'предястия', '2021-03-08', '2021-02-01'),
(3, 'салати', NULL, '2021-02-01'),
(4, 'десерти', NULL, NULL),
(5, 'основно', NULL, NULL),
(8, 'Категория за която няма ястие', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `date_deleted`) VALUES
(1, 'Kg', '2021-03-04'),
(2, 'g', NULL),
(3, 'l', NULL),
(4, 'ml', NULL),
(5, 'mg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `recipe_category_id` (`recipe_category_id`);

--
-- Indexes for table `recipes_products`
--
ALTER TABLE `recipes_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  ADD PRIMARY KEY (`recipe_category_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `recipes_products`
--
ALTER TABLE `recipes_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  MODIFY `recipe_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`product_category_id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`recipe_category_id`) REFERENCES `recipe_categories` (`recipe_category_id`);

--
-- Constraints for table `recipes_products`
--
ALTER TABLE `recipes_products`
  ADD CONSTRAINT `recipes_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipes_products_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipes_products_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
