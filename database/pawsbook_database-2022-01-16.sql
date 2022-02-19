-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 04:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawsbook_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(12) NOT NULL,
  `clinic_id` int(12) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `from_date_time` datetime DEFAULT current_timestamp(),
  `to_date_time` datetime DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `clinic_name` varchar(128) DEFAULT NULL,
  `clinic_long` decimal(10,0) DEFAULT NULL,
  `clinic_lat` decimal(10,0) DEFAULT NULL,
  `updated_at` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_location`
--

CREATE TABLE `pet_location` (
  `id` int(11) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `pet_lat` text DEFAULT NULL,
  `pet_long` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_location`
--

INSERT INTO `pet_location` (`id`, `user_id`, `pet_lat`, `pet_long`, `created_at`) VALUES
(25, 4, '15.1617536', '120.5960704', '2022-01-16 21:25:27'),
(26, 4, '15.1617536', '120.5960704', '2022-01-16 21:26:10'),
(27, 4, '15.1617536', '120.5960704', '2022-01-16 21:28:29'),
(28, 4, '15.1617536', '120.5960704', '2022-01-16 21:29:27'),
(29, 4, '15.1617536', '120.5960704', '2022-01-16 21:32:10'),
(30, 4, '15.1617536', '120.5960704', '2022-01-16 21:34:22'),
(31, 4, '15.1617536', '120.5960704', '2022-01-16 21:37:50'),
(32, 4, '15.1617536', '120.5960704', '2022-01-16 21:39:12'),
(33, 4, '15.1617536', '120.5960704', '2022-01-16 21:39:21'),
(34, 4, '15.1617536', '120.5960704', '2022-01-16 21:39:31'),
(35, 4, '15.1617536', '120.5960704', '2022-01-16 21:39:41'),
(36, 4, '15.1617536', '120.5960704', '2022-01-16 21:39:48'),
(37, 4, '15.1617536', '120.5960704', '2022-01-16 21:39:54'),
(38, 4, '15.1617536', '120.5960704', '2022-01-16 21:40:00'),
(39, 4, '15.1617536', '120.5960704', '2022-01-16 21:40:08'),
(40, 4, '15.1617536', '120.5960704', '2022-01-16 21:40:14'),
(41, 4, '15.1617536', '120.5960704', '2022-01-16 21:40:24'),
(42, 4, '15.1617536', '120.5960704', '2022-01-16 21:40:32'),
(43, 4, '15.1617536', '120.5960704', '2022-01-16 21:40:38'),
(44, 4, '15.1617536', '120.5960704', '2022-01-16 21:40:49'),
(45, 4, '16.15905a15', '121.632421', '2022-01-16 21:47:07'),
(46, 4, '15.1590516', '120.6324203', '2022-01-16 21:52:13'),
(47, 4, '15.1590512', '120.6324138', '2022-01-16 21:57:11'),
(48, 4, '15.1617536', '120.5960704', '2022-01-16 21:57:58'),
(49, 4, '15.158857', '120.632324', '2022-01-16 22:04:13'),
(50, 4, '15.158857', '120.632324', '2022-01-16 22:04:34'),
(51, 4, '15.158857', '120.632324', '2022-01-16 22:04:54'),
(52, 4, '15.158857', '120.632324', '2022-01-16 22:05:14'),
(53, 4, '15.1590509', '120.6324127', '2022-01-16 22:05:33'),
(54, 4, '15.158857', '120.632324', '2022-01-16 22:05:34'),
(55, 4, '15.158857', '120.632324', '2022-01-16 22:05:54'),
(56, 4, '15.0972', '120.6228', '2022-01-16 22:06:14'),
(57, 4, '15.158857', '120.632324', '2022-01-16 22:06:34'),
(58, 4, '15.158857', '120.632324', '2022-01-16 22:06:54'),
(59, 4, '15.158857', '120.632324', '2022-01-16 22:07:09'),
(60, 4, '15.158857', '120.632324', '2022-01-16 22:07:29'),
(61, 4, '15.158857', '120.632324', '2022-01-16 22:07:33'),
(62, 4, '15.1590518', '120.6324204', '2022-01-16 22:13:27'),
(63, 4, '15.1617536', '120.5960704', '2022-01-16 22:13:49'),
(64, 4, '15.1617536', '120.5960704', '2022-01-16 22:13:59'),
(65, 4, '15.1617536', '120.5960704', '2022-01-16 22:14:21'),
(66, 4, '15.158857', '120.632324', '2022-01-16 22:29:52'),
(67, 4, '15.158857', '120.632324', '2022-01-16 22:30:56'),
(68, 4, '15.158857', '120.632324', '2022-01-16 22:42:34'),
(69, 4, '16.158857', '121.632324', '2022-01-16 22:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(12) NOT NULL,
  `code` varchar(64) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `code`, `description`) VALUES
(1, 'admin', 'admin role for the site'),
(2, 'user', 'default user for the web app'),
(3, 'clinic', 'clinic owner');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `firstname` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT '09000000000',
  `password` varchar(128) DEFAULT NULL,
  `role` int(12) DEFAULT NULL,
  `validated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `password`, `role`, `validated`) VALUES
(1, 'Karlo', 'Sotto', 'sample@sample.com', '09000000000', '$2y$10$ZPwHvcLEgrHkzcHn6p5YiueVnCR4OHPNiEEp226s0p1c6vnZzX1Ri', 2, 1),
(2, 'Customer', 'Customer', 'customer@customer.com', '09000000000', '$2y$10$BFzaFb8UHuithQH2yKdTBuChuUenSOWQGy628Myuj/QlsI/WVDWn.', 2, 1),
(3, 'Clinic', 'Owner', 'new_clinic@sample.com', '09000000000', '$2y$10$V9gkujYVYitCdTcQaUe1/.BmoxHteagkvg5RUJc2GwphTbwvqTofy', 3, 0),
(4, 'Admin', 'Manager', 'admin', '09000000000', '$2y$10$BFzaFb8UHuithQH2yKdTBuChuUenSOWQGy628Myuj/QlsI/WVDWn.', 1, 1),
(6, 'Chris', 'Tian', 'tian@tian.com', '09000000000', '$2y$10$5xxKAXXvHSjwP3chIEZzY.1QeEpkHfBFCmvs9ZYvznSA6aIQSuohS', 3, 1),
(10, 'Karlo', 'Sample Karlo Sotto', 'sample1111@sample.com', '123123', '$2y$10$4bwF3YqZqHFNYTY2UzwbBO/O0dWVWmdlvYzQTW1h8JbzADBQoftS.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_links`
--

CREATE TABLE `user_links` (
  `id` int(12) NOT NULL,
  `from_user_id` int(12) NOT NULL,
  `to_user_id` int(12) NOT NULL,
  `linked` varchar(12) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

CREATE TABLE `user_posts` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `user_post` text DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_posts`
--

INSERT INTO `user_posts` (`id`, `user_id`, `user_post`, `date_added`) VALUES
(3, 4, 'posting sampkle', '2021-12-23 16:57:10'),
(4, 4, '1123 123 123 123 123 123 123 123 ', '2021-12-23 16:57:12'),
(5, 4, 'you should delete this', '2021-12-23 17:04:53'),
(7, 2, 'This is customer and this is also the first time that I wil post a caption here.', '2021-12-23 18:21:03'),
(8, 2, 'This is customer and this is also the second time that I wil post a caption here.', '2021-12-23 18:21:49'),
(9, 2, 'This is a post from news feed.', '2021-12-23 18:29:36'),
(10, 2, 'this post is going to index api btw', '2021-12-23 18:50:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_id` (`clinic_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pet_location`
--
ALTER TABLE `pet_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_links`
--
ALTER TABLE `user_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`,`to_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_location`
--
ALTER TABLE `pet_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_links`
--
ALTER TABLE `user_links`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_links`
--
ALTER TABLE `user_links`
  ADD CONSTRAINT `user_links_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_links_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD CONSTRAINT `user_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
