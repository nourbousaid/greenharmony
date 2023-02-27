-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 11:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seniorproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `address1`, `address2`, `city`, `phone`, `userType`) VALUES
(1, 'nourbousaid22@gmail.com', 'nour123', 'Lebanon', 'Tripoli', 'tripoli', '714557888', 'user'),
(2, 'nourbousaid3@gmail.com', 'nour123', 'Lebanon', 'Tripoli', 'tripoli', '145786523', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `plantID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `plantName` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `plantID`, `email`, `plantName`, `size`, `qty`, `price`) VALUES
(26, 5, 'nourbousaid22@gmail.com', 'nnnn', 'small', 1, 70),
(27, 18, 'nourbousaid22@gmail.com', 'Spider', 'medium', 1, 80),
(28, 15, 'nourbousaid22@gmail.com', 'Cactus', 'small', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `chekout`
--

CREATE TABLE `chekout` (
  `id` int(11) NOT NULL,
  `all_plant_id` varchar(50) NOT NULL,
  `all_plants` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pay` varchar(20) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chekout`
--

INSERT INTO `chekout` (`id`, `all_plant_id`, `all_plants`, `email`, `phone`, `address1`, `address2`, `city`, `pay`, `total`) VALUES
(1, '2, 1', 'tulip (1), Gardenia (1)', 'nourbousaid22@gmail.com', '714557888', 'Lebanon', 'Tripoli', 'tripoli', 'dollar', '159'),
(2, '2, 1, 7, 8, 5', 'tulip (1), Gardenia (1), mmm (1), uio (1), nnnn (1)', 'nourbousaid22@gmail.com', '714557888', 'Lebanon', 'Tripoli', 'tripoli', 'dollar', '0'),
(3, '5', 'nnnn (1)', 'nourbousaid22@gmail.com', '714557888', 'Lebanon', 'Tripoli', 'tripoli', 'dollar', '70'),
(4, '5, 18', 'nnnn (1), Spider (1)', 'nourbousaid22@gmail.com', '714557888', 'Lebanon', 'Tripoli', 'tripoli', 'dollar', '150'),
(5, '5, 18, 15', 'nnnn (1), Spider (1), Cactus (1)', 'nourbousaid22@gmail.com', '714557888', 'Lebanon', 'Tripoli', 'tripoli', 'dollar', '200');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `projectName` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `image`, `projectName`, `category`, `description`) VALUES
(5, '7ebe6e28-0a43-4602-a4c8-7905ad684aec.jpg', 'Aley', 'landscape', 'Designing and irragtion system'),
(6, '32912d08-553a-4d59-9db8-d35c437752c2.jpg', 'Beirut', 'landscape', 'Gazon and trees'),
(7, 'cbcda68a-e596-418d-b4c4-8562a0341ea0.jpg', 'Jbeil', 'landscape', 'trees'),
(8, '17a1bfc8-80ba-4910-abf4-0ccc30a1ab24.jpg', 'In our Nusery', 'ourcompany', 'few plants'),
(10, '94ff7e20-fc4b-4614-a27b-6596d8e0e9fd.jpg', 'Our Nursery', 'ourcompany', 'few plants');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `plantName` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `plantName`, `image`, `category`, `size`, `discount`, `price`) VALUES
(13, 'Bonsai', 'bonsai small.jpg', 'indoor', 'small', 10, 160),
(14, 'Baby Rubber', 'baby_rubber_plant.jpg', 'indoor', 'small', 0, 100),
(15, 'Cactus', 'cactus.jpg', 'indoor', 'small', 5, 50),
(16, 'Heart Leaf', 'Heart leaf.jpg', 'indoor', 'medium', 7, 60),
(18, 'Spider', 'spider_plant.jpg', 'indoor', 'medium', 8, 80),
(19, 'Spathiphyllum-peace lilly', 'Spathiphyllum-peace lilly.jpg', 'indoor', 'medium', 7, 90),
(20, 'Bamboo ', 'bamboo large.jpg', 'indoor', 'large', 2, 50),
(21, 'Umbrella dwarf', 'umbrella_dwarf.jpg', 'indoor', 'large', 5, 70),
(24, 'Leylandi', 'Gold lylandi medium.jpg', 'outdoor', 'medium', 7, 65),
(25, 'Cherry', 'florida_cherry.jpg', 'outdoor', 'medium', 0, 50),
(26, 'Rosemerry', 'coastal_rosemary-min_1.jpg', 'outdoor', 'medium', 5, 90),
(27, 'Ceylon', 'ceylon_creeper.jpg', 'outdoor', 'small', 2, 30),
(28, 'Ponytail Palm', 'ponytail_palm.jpg', 'outdoor', 'small', 3, 40),
(29, 'Purple Bamboo', 'purple bamboo.jpg', 'outdoor', 'small', 7, 60),
(37, 'ficus', 'ficus_nitida.jpg', 'outdoor', 'large', 0, 95),
(39, 'Bush Rose', 'bush_rose.jpg', 'outdoor', 'large', 6, 75),
(40, 'Bush Cherry', 'brush_cherry.png', 'outdoor', 'large', 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `plantName` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `plantName`, `price`) VALUES
(1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `pictures` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `pictures`) VALUES
(1, 'slider2.jpg'),
(6, 'intro-1602546306.jpg'),
(8, 'R.jpg'),
(10, '7ebe6e28-0a43-4602-a4c8-7905ad684aec.jpg'),
(12, '17a1bfc8-80ba-4910-abf4-0ccc30a1ab24.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chekout`
--
ALTER TABLE `chekout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `chekout`
--
ALTER TABLE `chekout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
