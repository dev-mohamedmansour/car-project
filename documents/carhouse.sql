-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.infinityfree.com
-- Generation Time: Apr 13, 2025 at 02:05 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_38609934_car_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `messages` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderName` varchar(150) NOT NULL,
  `serviceName` enum('Car Wash','Tires Betters','Electrical Repairs','Mechanical Repairs') NOT NULL,
  `carMake` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'other',
  `carModel` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'other',
  `userID` int(11) NOT NULL,
  `orderPhone` varchar(50) NOT NULL,
  `orderTime` datetime NOT NULL DEFAULT current_timestamp(),
  `orderDateActive` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderCode` varchar(10) DEFAULT NULL,
  `orderNotes` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'no thinks',
  `orderStuts` enum('pending','completed','cancelled','submit') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderName`, `serviceName`, `carMake`, `carModel`, `userID`, `orderPhone`, `orderTime`, `orderDateActive`, `orderCode`, `orderNotes`, `orderStuts`) VALUES
(2, 'Mohamed Mansour', 'Mechanical Repairs', '', '', 1, '01016412213', '2025-04-12 11:17:00', '2025-04-06 00:15:30', '', '', 'submit'),
(3, 'Mohamed Mansour', 'Electrical Repairs', '', '', 1, '01016412213', '2025-04-18 00:23:00', '2025-04-06 00:18:25', '80074908', '', 'pending'),
(4, 'Mohamed Mansour', 'Tires Betters', '', '', 1, '01016412213', '2025-04-11 10:29:00', '2025-04-06 00:24:38', '90312512', '', 'pending'),
(5, 'Mohamed Mansour', 'Car Wash', 'fiat', '131', 4, '01152898744', '2025-04-17 18:30:00', '2025-04-12 01:27:19', '39096102', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` char(50) NOT NULL,
  `verify_email` tinyint(1) NOT NULL DEFAULT 0,
  `email_confirmation_time` timestamp NULL DEFAULT current_timestamp(),
  `role` enum('user','admin','Car Wash','Mechanical Repairs','Electrical Repairs','Tires Betters') NOT NULL DEFAULT 'user',
  `verification_token` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `verify_email`, `email_confirmation_time`, `role`, `verification_token`, `reset_token`, `reset_token_expiry`, `created_at`, `is_admin`) VALUES
(1, 'Mohamed Mansour', 'mohamedmansour0037@gmail.com', '$2y$10$87ochAX/uiTuTSyz0.xtZu6.Ph89id5VKrrUy06b27Z.gH519AijS', '01016412213', 1, '2025-04-06 08:55:27', 'admin', 'NULL()', NULL, NULL, '2025-04-05 23:50:01', 1),
(2, 'Nouh', 'nouh@gmail.com', '$2y$10$0feE0v6SQFnPagQOFSp1e.Chdg4gCbWdxqeiS8r84xzOEF4d.0Ziu', '72663738383', 0, '2025-04-08 10:23:38', 'user', 'd0795b43fbd0957dc24f07810f809db11b4f94ecb528137cb04ba5a6c473ad8e', NULL, NULL, '2025-04-08 10:23:38', 0),
(3, 'Mohammed abdelbasset ', 'mo.abdop321@gmail.com', '$2y$10$EjuDxoHW/nhWhdBuJB2EHempBYT7zpEMgM7LsMjUYYtms6yoEh5FG', '01212180234', 0, '2025-04-08 20:09:34', 'user', '42b2b3664305a635689634c0b72f983ed27c95ce8a7b1321843bbe75ed5b32ee', NULL, NULL, '2025-04-08 11:07:10', 0),
(4, 'Mohamed Mansour', 'mansobih200@outlook.com', '$2y$10$KOtJA4gDSyC0Kwkjj03VdO.IjW0VU/UhO61sWn15skjEQ3XF28dtK', '01152898744', 1, '2025-04-12 10:25:23', 'user', 'NULL()', NULL, NULL, '2025-04-12 01:24:37', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `UNIQUE` (`email`,`phone`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
