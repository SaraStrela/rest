-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2013 at 09:16 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rest`
--
CREATE DATABASE IF NOT EXISTS `rest` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `rest`;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorija` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `kategorija`) VALUES
(1, 'IT'),
(2, 'Automobili'),
(3, 'Zabava'),
(4, 'Recepti'),
(6, 'Neka kategorija');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `datumvreme` datetime NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `naslov`, `tekst`, `datumvreme`, `kategorija_id`) VALUES
(1, 'Facebook uveo dislike za Messenger', 'Like dugme postalo je ikona socijalnih mreža, i očigledno, Facebooka. Međutim, postoje trenuci kada je potrebno i dislike dugme, ali ono nije postojalao, do sada.', '2013-12-18 00:55:38', 1),
(2, 'Amazonov telefon stiže 2014?', 'Glasine u vezi sa mogućim smartfonom kompanije Amazon postoje već neko vreme, ali čini se da se polako bližimo datumu predstavljanja.', '2013-12-18 00:56:21', 1),
(3, 'Godišnji e-otpad kao 11 Keopsovih piramida', 'Jedan od vodećih globalnih ekoloških problema je električni i elektronski otpad (e-otpad), koji nastaje brzim zastarevanjem elektronskih uređaja.', '2013-12-18 00:57:20', 1),
(4, 'Kako je živeti prema Frenklinovom rasporedu?', 'Mnogo pre nego što su nastale prve aplikacije za pravljenje rasporeda dnevnih obaveza, Bendžamin Frenklin je sa velikim uspehom planirao svoje zadatke.', '2013-07-15 12:15:28', 3),
(7, 'Neki naslov', 'Neki teksta', '2013-12-18 21:49:55', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
