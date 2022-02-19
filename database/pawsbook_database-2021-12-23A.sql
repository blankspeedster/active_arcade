-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 03:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
(1, 4, 'This is a test caption.', '2021-12-23 16:51:57'),
(2, 4, 'posting', '2021-12-23 16:57:06'),
(3, 4, 'posting sampkle', '2021-12-23 16:57:10'),
(4, 4, '1123 123 123 123 123 123 123 123 ', '2021-12-23 16:57:12'),
(5, 4, 'you should delete this', '2021-12-23 17:04:53'),
(6, 4, 'JSON encode MySQL results - Stack Overflowhttps://stackoverflow.com â€º questions â€º json-encode-m...\nJan 22, 2011 â€” The function json_encode needs PHP >= 5.2 and the php-json package - as mentioned ... returns mysqli_result same as mysqli::query() $rows ...\n18 answers\n \nÂ·\n \nTop answer: \n$sth = mysqli_query($conn, \"SELECT ...\"); $rows = array(); while($r = mysqli_fetch_assoc($sth)) ...\nReturn MySQL data in JSON format - Stack Overflow\n3 answers\nOct 14, 2016\nReturn a JSON object using PHP json_encode ...\n3 answers\nDec 22, 2010\nPHP script to select MySQL data fields and return JSON\n2 answers\nFeb 26, 2014\nPHP & MYSQL: Convert rows and columns to json ...\n2 answers\nFeb 20, 2020\nMore results from stackoverflow.com\n\nHow to Convert Data from MySQL to JSON using PHPhttps://www.kodingmadesimple.com â€º 2015/01 â€º conve...\nNov 20, 2017 â€” <?php //fetch table rows from mysql db $sql = \"select * from tbl_employee\"; ... How would I get this to return a json response in the form:\nYou visited this page on 12/23/21.\nVideos\n\nPREVIEW\n6:35\nHow to Get JSON Response from MySQL Database using PHP\nYouTube Â· Technical Babaji\nMar 16, 2019\n\nPREVIEW\n15:16\nHow to return JSON Data from PHP Script using Ajax Jquery\nYouTube Â· Webslesson\nJun 17, 2017\n7 key moments in this video\nView all\n\nHow to Return MySQL Data in JSON Format With PHP On ...https://www.alibabacloud.com â€º blog â€º how-to-return-...\nAug 22, 2021 â€” In the next step, you\'ll code a PHP script that fetches records from the MySQL database and converts the output to JSON format.\n\nphp return json data Code Examplehttps://www.codegrepper.com â€º code-examples â€º php+r...\n$reqjson = file_get_contents($jsonReqUrl);. 4. $reqjsonDecode = json_decode($reqjson, true);. 5. echo $reqjsonDecode[\'UserName\'];. php return json data.\n\nJSON PHP - W3Schoolshttps://www.w3schools.com â€º js_json_php\nObjects in PHP can be converted into JSON by using the PHP function ... make a JSON object that describes the numbers of rows you want to return.\n\nHow to convert MYSQL data to JSON using PHP - Open Tech ...https://www.opentechguides.com â€º how-to â€º article â€º m...\nApr 6, 2016 â€” Data from MySQL database can be easily converted into JSON format using PHP. The below example uses Sakila sample database that comes with ...\n\nHow To Work with JSON in MySQL | DigitalOceanhttps://www.digitalocean.com â€º community â€º tutorials\nSep 21, 2020 â€” Learn how to use and query JSON data in your MySQL databases. ... This tutorial was verified with MySQL v8.0.23, PHP v7.3.24, ...\n\nMySQL: Return JSON from a standard SQL Query - Database ', '2021-12-23 17:11:23'),
(7, 2, 'This is customer and this is also the first time that I wil post a caption here.', '2021-12-23 18:21:03'),
(8, 2, 'This is customer and this is also the second time that I wil post a caption here.', '2021-12-23 18:21:49'),
(9, 2, 'This is a post from news feed.', '2021-12-23 18:29:36'),
(10, 2, 'this post is going to index api btw', '2021-12-23 18:50:56'),
(11, 4, 'sample bro here in newsfeed', '2021-12-23 21:55:23');

--
-- Indexes for dumped tables
--

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
