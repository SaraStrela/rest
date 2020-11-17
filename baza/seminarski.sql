-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 11:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarski`
--

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE `novosti` (
  `idnovost` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`idnovost`, `naslov`, `tekst`, `id`) VALUES
(111, 'New Character Coming Soon!', 'Hi! I am making a new character for my WebToon series. It will be presented through this channel on Friday 6 PM. Look forward to it a lot!', 10),
(112, 'New year jingle recording session', 'On 23rd of November at 8PM mushroom will do live record session for her new jingle! Fans who participated in Lucky Fan Event will get special bundle items as promised. All you need to do is fill the form that will be posted later today. Thank you for participating in the event and see you at recording~', 2),
(113, 'Photo Class by V', 'Hi everone! This weekend a free online class will be held at 4PM-6PM! If you are new to Photography don\'t be scared, we\'ll cover all the basics at the course. If you want to participate please follow the instructions bellow and we\'ll see you on Saterday! Take care :)', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `role` set('Artist','Fan') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Fan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `username`, `password`, `role`) VALUES
(2, 'mamamoo', 'mamamoo', 'mmm', 'Artist'),
(10, 'v', 'v', 'v', 'Fan'),
(11, 'sara', 'sara123', 'sara123', 'Fan'),
(12, 'a', 'a', 'a', 'Artist'),
(13, 'b', 'b', 'b', 'Fan'),
(15, 'd', 'd', 'd', 'Fan'),
(16, 'bts', 'bts', 'bts', 'Artist'),
(17, 'day6', 'day6', 'day6', 'Artist'),
(18, 'oneus', 'oneus', 'oneus', 'Artist'),
(19, 'onewe', 'onewe', 'onewe', 'Artist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `novosti`
--
ALTER TABLE `novosti`
  ADD PRIMARY KEY (`idnovost`),
  ADD KEY `pripada` (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `novosti`
--
ALTER TABLE `novosti`
  ADD CONSTRAINT `pripada` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
