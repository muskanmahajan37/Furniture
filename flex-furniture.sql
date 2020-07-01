-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 09:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flex-furniture-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Computers'),
(2, 'Pc');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(4, 'Valon Januzaj', 'valon.januzaj98@gmail.com', 'My message', '2020-06-20 14:26:55'),
(5, 'Valon', 'valon.januzaj98@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec metus lacus. Curabitur ac ipsum congue, cursus urna sed, facilisis elit. Morbi placerat gravida enim et euismod. Nam malesuada mauris odio, non convallis elit volutpat eget. Nunc in ultric', '2020-06-21 19:20:41'),
(6, 'Email@email', 'email@email.com', 'iwjdapoiawjdwa', '2020-06-30 21:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `code`, `description`, `quantity`, `created_by`, `image`, `created_at`) VALUES
(34, 1, 'Valos', 100, 1001, 'aac', 1000000, 14, 'Screenshot_1.png', '2020-06-21 22:04:14'),
(35, 1, 'abc', 100, 1001, 'Prlld', 1000000, 14, 'Screenshot_3.png', '2020-06-21 22:11:51'),
(36, 1, 'Valos', 1024, 1001, 'Pershkrimi 1', 1, 14, NULL, '2020-06-21 22:25:21'),
(37, 1, 'abc', 100, 1001, 'Prlld', 1000000, 14, 'file.jpg', '2020-06-21 22:26:39'),
(38, 1, 'abc', 100, 1001, 'Prlld', 1000000, 14, 'Screenshot_4.png', '2020-06-21 22:27:30'),
(39, 1, 'abc', 100, 1001, 'aac', 1000000, 14, 'Screenshot_3.png', '2020-06-21 22:29:38'),
(40, 1, 'Valos', 100, 1001, 'aac', 1, 14, 'Screenshot_4.png', '2020-06-21 22:43:48'),
(43, 1, 'abc', 100, 10101, 'aac', 1, 14, 'Screenshot_5.png', '2020-06-21 23:12:57'),
(44, 1, 'abc', 100, 10101, 'aac', 1000000, 14, 'Screenshot_4.png', '2020-06-21 23:13:46'),
(45, 1, 'aDWAD', 100, 1111, 'aac', 1, 14, 'Screenshot_4.png', '2020-06-21 23:14:09'),
(46, 1, 'Valos', 100, 10101, 'aac', 1000000, 14, 'Screenshot_3.png', '2020-06-21 23:14:44'),
(48, 1, 'Produkti1', 1024, 1001, 'aac', 10, 14, 'Screenshot_4.png', '2020-06-21 23:16:45'),
(49, 1, 'Valos', 100, 1001, 'aac', 1000000, 14, 'Screenshot_2.png', '2020-06-21 23:19:12'),
(50, 1, 'abc', 100, 1001, 'aac', 1000000, 14, 'Screenshot_4.png', '2020-06-21 23:20:06'),
(51, 1, 'Valos', 1024, 1001, 'aac', 1, 14, 'Screenshot_3.png', '2020-06-21 23:20:35'),
(52, 1, 'Valos', 100, 1001, 'aac', 1, 14, 'Screenshot_2.png', '2020-06-21 23:21:35'),
(57, 1, 'Emri', 121, 101, 'Pershkrimi', 10, 14, 'Screenshot_1.png', '2020-06-30 23:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `is_superadmin` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `city`, `gender`, `is_superadmin`, `created_at`) VALUES
(14, 'Admin', 'admin@gmail.com', '$2y$10$wpf0Oaf49EJJacqu/0uMy.CN6muGD/mIXiB00HuG5vd6sgaW62qMi', 'Ferizaj', 'male', 1, '2020-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_fk_constraint` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
