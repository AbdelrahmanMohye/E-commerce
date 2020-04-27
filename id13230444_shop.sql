-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2020 at 11:42 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13230444_shop`
--
CREATE DATABASE IF NOT EXISTS `id13230444_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id13230444_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CID` int(11) NOT NULL,
  `Cname` varchar(255) NOT NULL,
  `Cdescription` varchar(255) DEFAULT 'This description is empty',
  `Corder` int(11) NOT NULL,
  `Cvisible` tinyint(1) NOT NULL DEFAULT 0,
  `Ccomment` tinyint(1) NOT NULL DEFAULT 0,
  `Cads` tinyint(1) NOT NULL DEFAULT 0,
  `Cdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CID`, `Cname`, `Cdescription`, `Corder`, `Cvisible`, `Ccomment`, `Cads`, `Cdate`) VALUES
(1, 'electronic', ' ', 0, 0, 1, 0, '2020-03-03'),
(2, 'mobil', 'this categories conatins some products such as iphone ,blach berrey ,tablate and phones', 2, 0, 0, 0, '2020-03-16'),
(3, 'toye', 'games devices and toys', 1, 0, 0, 0, '2020-03-19'),
(4, 'men', 'contain clothes and all thing men need', 2, 0, 0, 0, '2020-03-19'),
(5, 'women', 'contain all thing that women need', 3, 0, 0, 0, '2020-03-19'),
(6, 'furnature', 'contain all thing you need for your home', 4, 0, 0, 0, '2020-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_ID`, `comment`, `status`, `member_ID`, `item_ID`) VALUES
(1, 'this product very good, thanks', 0, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `country_made` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rating` tinyint(6) DEFAULT NULL,
  `categ_ID` int(11) NOT NULL,
  `member_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_ID`, `name`, `description`, `price`, `add_date`, `country_made`, `image`, `status`, `rating`, `categ_ID`, `member_ID`) VALUES
(1, 'PC', ' DELL computer 8G RAM 1T hard', '3300LE', '2020-03-19', 'china', 'empty', 'old', NULL, 1, 1),
(2, 'iponeX', 'mobile phone 2019', '3000$', '2020-03-19', 'US', 'empty', 'new', NULL, 2, 11),
(3, 'vatrina', 'is good state and has two door and four shelf', '2000EL', '2020-04-08', 'Egypt', ' ', 'used', NULL, 6, 11),
(4, 'suit', 'Egypt cotton and different sizes', '2300EL', '2020-04-09', 'Egypt', ' ', 'new', NULL, 4, 11),
(5, 'samsung S3 new', 'samsung s3new', '3000EL', '2020-04-09', 'china', ' ', 'new', NULL, 2, 11),
(6, 'iphone s4', 'good used battery good state and HD camera', '4500EL', '2020-04-09', 'American', ' ', 'new use', NULL, 2, 11),
(7, 'T-Shirt', 'classic cotton T-shirt', '200EL', '2020-04-09', 'Egypt', ' ', 'old', NULL, 4, 11),
(8, 'children cubs', 'cubs for children for enjoyment in quantinary', '20$', '2020-04-09', 'china', ' ', 'new', NULL, 3, 11),
(9, 'hair cutter', 'hair cuter machine', '200EL', '2020-04-09', 'U.S.A', ' ', 'new use', NULL, 1, 11),
(10, 'iphoneX pro ', 'newest product from apple has 32 RAM and hard 128 GB', '32000EL', '2020-04-09', 'US', ' ', 'new', NULL, 2, 11),
(11, 'Pair of pants', 'Gabardine type and blue black and white color are available', '260EL', '2020-04-17', 'Egypt', '', 'new', NULL, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0,
  `trustStatus` int(11) NOT NULL DEFAULT 0,
  `regStatus` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `email`, `fullName`, `groupID`, `trustStatus`, `regStatus`, `date`) VALUES
(1, 'Gamal', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'gamal@yahoo.com', 'gamal mohye', 0, 0, 1, '2020-03-03'),
(10, 'hossam', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'hossam@gmail.com', 'hossam said', 0, 0, 1, '2020-03-07'),
(11, 'Abdelrahman', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'Abdelrahman@gmail.com', 'Abdelrahman mohye', 0, 0, 1, '2020-03-07'),
(14, 'khaled', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'khaled@gmail.com', 'khaled ali', 0, 0, 1, '2020-03-07'),
(15, 'ahmed', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'ahmed@gmail.com', 'ahmed ali', 0, 0, 1, '2020-03-07'),
(16, 'nagwa', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'nagwa@gmail.com', 'nagwa karam', 0, 0, 1, '2020-03-07'),
(17, 'marawan', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'marwaan@gmail.com', 'marwaan mohsen', 0, 0, 0, '2020-03-07'),
(18, 'mohammed', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'mohammed@gmail.com', 'mohammed mohsen', 0, 0, 0, '2020-03-07'),
(19, 'marwa', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'marwa@yahoo.com', 'marwa khaled', 0, 0, 0, '2020-03-07'),
(20, 'eman', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'eman@yahoo.com', 'eman ali', 0, 0, 0, '2020-03-07'),
(21, 'menna', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'menna@yahoo.com', 'menna ahmed', 0, 0, 0, '2020-03-07'),
(22, 'samair', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'samair@yahoo.com', 'samair ahmed', 0, 0, 0, '2020-03-07'),
(24, 'mostafa2020', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'mostafa@gmail.com', 'mostafa', 0, 0, 1, '2020-03-15'),
(25, 'mosa', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'mosa@gmail.com', 'mosa mohammed', 0, 0, 1, '2020-03-16'),
(33, 'user1', '8fb5cfe922674e0f9faa46a92716f66bd67ad344', 'user1@gmail.com', 'user1', 0, 0, 1, '2020-04-06'),
(35, 'AME', '79437f5edda13f9c0669b978dd7a9066dd2059f1', 'asdf@gmail.com', 'asdfasdf', 0, 0, 0, '2020-04-10'),
(36, 'Adel', 'cdcf48c5672ca697adcae52dcc7bbe4ddbb917bb', 'abdelrahmanmhey42@gmail.com', 'Adel', 0, 0, 0, '2020-04-10'),
(37, 'Kamal', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'kamal@gmail.com', 'Kamal', 0, 0, 0, '2020-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `name` (`Cname`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `member_2` (`member_ID`),
  ADD KEY `item_2` (`item_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `ceteg_1` (`categ_ID`),
  ADD KEY `member_1` (`member_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item_2` FOREIGN KEY (`item_ID`) REFERENCES `items` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_2` FOREIGN KEY (`member_ID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `ceteg_1` FOREIGN KEY (`categ_ID`) REFERENCES `categories` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`member_ID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
