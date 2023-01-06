-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 12:10 AM
-- Server version: 5.7.17-log
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afi_fabrications`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cusId` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cusId`, `firstname`, `lastname`, `email`, `address`) VALUES
('1', 'Kamal', 'Perera', 'ddgdg@ddfgdfg', 'dffgdgddgdgdgddgdgdg'),
('2', 'sachi', 'Perera', 'dfdgdgdfg@dfgdgd', 'ghfghfhfhfhfh'),
('3', 'Kamal6', 'Perera', 'ddgdg@ddfgdfg', 'fdfdsfsfsfsf');

-- --------------------------------------------------------

--
-- Table structure for table `dispach`
--

CREATE TABLE `dispach` (
  `dispId` int(10) NOT NULL,
  `dispDate` date NOT NULL,
  `itemId` varchar(10) NOT NULL,
  `itemName` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dispach`
--

INSERT INTO `dispach` (`dispId`, `dispDate`, `itemId`, `itemName`, `quantity`, `total`) VALUES
(1, '2019-12-01', '1', 'sssfffhgfhfgh', 23, 458),
(2, '2019-12-09', '2', 'retert', 67, 458),
(3, '2020-01-01', '3', 'werwere', 434, 4444);

-- --------------------------------------------------------

--
-- Table structure for table `indoorstock`
--

CREATE TABLE `indoorstock` (
  `inStId` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `itemType` varchar(20) NOT NULL,
  `capacity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indoorstock`
--

INSERT INTO `indoorstock` (`inStId`, `name`, `itemType`, `capacity`) VALUES
('1', 'Coil', 'Row materials', '10 kg'),
('2', 'Petrol', 'Lubricats', '10 l'),
('3', 'Oxygen', 'Lubricats', '10 kg');

-- --------------------------------------------------------

--
-- Table structure for table `outdoorstock`
--

CREATE TABLE `outdoorstock` (
  `outStId` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `itemType` varchar(20) NOT NULL,
  `capacity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outdoorstock`
--

INSERT INTO `outdoorstock` (`outStId`, `name`, `itemType`, `capacity`) VALUES
('1', 'Shooes', 'Safety items', '3'),
('2', 'Mop', 'General Items', '3'),
('3', 'dfdddgddg', 'Safety items', '34');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `itemId` int(10) NOT NULL,
  `itemName` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unitPrice` float NOT NULL,
  `total` float NOT NULL,
  `purDate` date NOT NULL,
  `purAddress` varchar(50) NOT NULL,
  `delivery` varchar(10) NOT NULL,
  `deliveryDate` date NOT NULL,
  `payTerms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`itemId`, `itemName`, `quantity`, `unitPrice`, `total`, `purDate`, `purAddress`, `delivery`, `deliveryDate`, `payTerms`) VALUES
(1, 'sssfffhgfhfgh', 23, 300, 457, '2019-12-13', 'rteerterteterrrr', 'eterretet', '2019-12-01', 'ertetettyyrt'),
(2, 'sssfffhgfhfgh', 4, 300, 45, '2019-12-07', 'tuytutu', 'wrwerwer', '2019-12-22', 'uuuutututu'),
(3, 'sssfffhgfhfgh', 4, 300, 45, '2019-12-13', 'ertetertert', 'eterretet', '2019-12-26', 'ertetettyyrt');

-- --------------------------------------------------------

--
-- Table structure for table `storekeepers`
--

CREATE TABLE `storekeepers` (
  `skId` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storekeepers`
--

INSERT INTO `storekeepers` (`skId`, `firstname`, `lastname`, `email`, `address`) VALUES
('1', 'Kamals', 'Perera4', 'dddfgdfgfg@ffghhfg', 'gghgfhfhhfh'),
('2', 'Kamal', 'erewrrwr', 'dddfgdfgfg@ffgh', 'werwrwrrwerwr'),
('3', 'sfsfsssfssf', 'dfdgfdfdf', 'dfggdg@gmail.com', 'erwrwrwewrwrwe');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supId` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supId`, `firstname`, `lastname`, `email`, `address`) VALUES
('1', 'Kamala', 'Perera', 'ddgdg@ddfgdfg', 'tryrytyrtyryry'),
('2', 'sachi', 'dfdgddfg', 'ddgdg@ddfgdfg', 'retrtretretert'),
('3', 'Hemal', 'dsfsfsfsf', 'ddssdf@gmail.com', 'ghjgghjghgjgjgjgj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Jone', 'jone@gmail.com', 'jone'),
(2, 'Kamal', 'kamal@gmail.com', 'kamal'),
(3, 'Namal', 'namal@gmail.com', 'namal'),
(4, 'Amal', 'amal@gmail.com', 'amal'),
(5, 'Lima', 'lima@gmail.com', 'lima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cusId`);

--
-- Indexes for table `dispach`
--
ALTER TABLE `dispach`
  ADD PRIMARY KEY (`dispId`);

--
-- Indexes for table `indoorstock`
--
ALTER TABLE `indoorstock`
  ADD PRIMARY KEY (`inStId`);

--
-- Indexes for table `outdoorstock`
--
ALTER TABLE `outdoorstock`
  ADD PRIMARY KEY (`outStId`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `storekeepers`
--
ALTER TABLE `storekeepers`
  ADD PRIMARY KEY (`skId`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispach`
--
ALTER TABLE `dispach`
  MODIFY `dispId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
