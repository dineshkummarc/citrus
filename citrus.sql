-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2020 at 09:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `isApproved` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `author`, `comment`, `createdAt`, `isApproved`, `email`) VALUES
(1, 'John Madden', 'Berry nice!', '2020-03-24 21:09:00', 1, 'jmadden@gmail.com'),
(2, 'Mr. Approve', 'Please approve me as soon as possible. Thanks!', '2020-03-24 21:09:34', 0, 'approve@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `description`, `img`) VALUES
(1, 'Kiwi', 'Kiwis are small fruits that pack a lot of flavor and plenty of health benefits.', 'resources/img/kiwi.jpg'),
(2, 'Orange', 'Oranges are a very good source of vitamins, especially vitamin C.', 'resources/img/orange.jpg'),
(3, 'Apple', 'Apples are a popular fruit, containing antioxidants, vitamins, dietary fiber, and a range of other nutrients.', 'resources/img/apple.jpg'),
(4, 'Pear', 'Pears are sweet, bell-shaped fruits that have been enjoyed since ancient times.', 'resources/img/pear.jpg'),
(5, 'Banana', 'Bananas contain a lot of potassium, making them more radioactive than other fruits.', 'resources/img/banana.jpg'),
(6, 'Blueberry', 'Blueberries ranked number one in antioxidant health benefits in a comparison with more than 40 fresh fruits and vegetables.', 'resources/img/blueberry.jpg'),
(7, 'Cherry', 'Cherries are a good source of fibre, vitamins and minerals, including potassium, calcium, vitamin A and folic acid.', 'resources/img/cherry.jpg'),
(8, 'Strawberry', 'The strawberry is a highly nutritious fruit, loaded with vitamin C and powerful antioxidants.', 'resources/img/strawberry.jpg'),
(9, 'Lemon', 'Lemons are a popular fruit that people use in small quantities to add flavor to food.', 'resources/img/lemon.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
