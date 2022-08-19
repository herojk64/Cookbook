-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 04:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookbook`
--
CREATE DATABASE IF NOT EXISTS `cookbook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cookbook`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT DELAYED IGNORE INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$BrBqIMqAqYxsN2K4c0sRBOPzt.mIFn90VNX22a9hu8K9J8yA2szva');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `category`
--

TRUNCATE TABLE `category`;
--
-- Dumping data for table `category`
--

INSERT DELAYED IGNORE INTO `category` (`cid`, `cat_name`) VALUES
(1, 'Breakfast'),
(2, 'Beverage'),
(3, 'Desert'),
(4, 'Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `feedback`
--

TRUNCATE TABLE `feedback`;
-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `ingredient`
--

TRUNCATE TABLE `ingredient`;
--
-- Dumping data for table `ingredient`
--

INSERT DELAYED IGNORE INTO `ingredient` (`iid`, `name`) VALUES
(1, 'potato boiled'),
(2, 'large onion finely chopped'),
(3, 'ginger garlic paste'),
(4, 'green chilly'),
(5, 'cumin powder'),
(6, 'coriander powder'),
(7, 'garam masala'),
(8, 'sabji masala'),
(9, 'sesame seeds'),
(10, 'mustard seeds'),
(11, 'wholewheat flour'),
(12, 'gram flour'),
(13, 'ajwain seeds'),
(14, 'chopped coriander leaves'),
(15, 'salt to taste'),
(16, 'serves'),
(17, 'Egg Whites'),
(18, 'Whole Wheat Tortillas'),
(19, 'Fat Free Cheese'),
(20, 'Canned Beans(rinsed)'),
(21, 'Vegetable Cooking Spray'),
(22, 'Salsa,to taste');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `login`
--

TRUNCATE TABLE `login`;
--
-- Dumping data for table `login`
--

INSERT DELAYED IGNORE INTO `login` (`id`, `fname`, `lname`, `email`, `username`, `password`) VALUES
(1, 'Amit', 'Dhakal', 'herojk64@gmail.com', 'herojk64', '$2y$10$3V4jSjIkvYHboCX3hpGCGekZ/GRr.hHFQUZd7W.Q2YqYsgAP615aa');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `header` varchar(100) DEFAULT NULL,
  `rtime` int(11) DEFAULT NULL,
  `ingredient` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`ingredient`)),
  `detail` varchar(1000) DEFAULT NULL,
  `file` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `recipe`
--

TRUNCATE TABLE `recipe`;
--
-- Dumping data for table `recipe`
--

INSERT DELAYED IGNORE INTO `recipe` (`rid`, `cid`, `header`, `rtime`, `ingredient`, `detail`, `file`) VALUES
(1, 1, 'Aloo Paratha', 30, '[{\"name\":\"potato boiled\",\"number\":4},{\"name\":\"large onion finely chopped\",\"number\":1},{\"name\":\"ginger garlic paste\",\"number\":1},{\"name\":\"green chilly\",\"number\":2},{\"name\":\"cumin powder\",\"number\":1},{\"name\":\"garam masala\",\"number\":0.5},{\"name\":\"sabji masala\",\"number\":1},{\"name\":\"mustard seeds\",\"number\":1},{\"name\":\"wholewheat flour\",\"number\":2},{\"name\":\"gram flour\",\"number\":2},{\"name\":\"ajwain seeds\",\"number\":1},{\"name\":\"chopped coriander leaves\",\"number\":4}]', '01\nTake wholewheat flour, gram flour, some salt, red chilli powder, cumin powder, ajwain , sesame seeds in a bowl and knead a soft dough. keep it aside for 5 minutes.\n\n02\nin a pan take some oil and add mustard seeds, let it crackle and then add chopped onions and chopped green chilly. mix it and wait till onion turns brown.\n\n03\nAdd ginger garlic paste and some salt to taste. wait till the raw smell of garlic goes away.\n\n04\nadd turmeric powder, red chilly powder, sabji masala , potato and coriander leaves. mix it well and squeeze a lime on it.\n\n05\nsprinkle some garam masala and cover it for 5 minutes. switch of the stove and divide the mixture into small portions.\n\n06\nTake the dough and divide it into small balls. take a ball, roll out a small paratha stuff the potato mixture in it and make a dumpling. roll it in flour and roll out a paratha gently by applying some oil.\n\n07\ntake some oil in a pan or tawa and cook the paratha on both sides. serve with mint chutney or chilled curd dip.\n  ', 'maxresdefault.jpg'),
(2, 1, 'Breakfast Burritos', 11, '[{\"name\":\"serves\",\"number\":1},{\"name\":\"Egg Whites\",\"number\":2},{\"name\":\"Whole Wheat Tortillas\",\"number\":2},{\"name\":\"Fat Free Cheese\",\"number\":0.25},{\"name\":\"Canned Beans(rinsed)\",\"number\":0.25},{\"name\":\"Vegetable Cooking Spray\",\"number\":1},{\"name\":\"Salsa,to taste\",\"number\":1}]', '01\nSpray the vegetable cooking spray into a frying pan.\n\n02\nScramble the egg whites in the pan and cook to the right temperature.\n\n03\nPlace the cooked eggs on tortillas and sprinkle cheese on them.\n\n04\nSpread the beans over the cheese and eggs and roll each tortilla.\n\n05\nMicrowave for about 30-40 seconds and top off with some salsa.\n       ', '9aaa5c61-860a-427f-a745-b5221f6b909e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipe1`
--

DROP TABLE IF EXISTS `recipe1`;
CREATE TABLE IF NOT EXISTS `recipe1` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `header` varchar(100) DEFAULT NULL,
  `rtime` int(11) DEFAULT NULL,
  `ingredient` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`ingredient`)),
  `detail` varchar(1000) DEFAULT NULL,
  `file` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `recipe1`
--

TRUNCATE TABLE `recipe1`;
--
-- Dumping data for table `recipe1`
--

INSERT DELAYED IGNORE INTO `recipe1` (`rid`, `cid`, `header`, `rtime`, `ingredient`, `detail`, `file`) VALUES
(1, 1, 'Aalo Paratha', 30, '[{\"name\":\"potato boiled\",\"number\":4},{\"name\":\"large onion finely chopped\",\"number\":1},{\"name\":\"ginger garlic paste\",\"number\":1},{\"name\":\"green chilly\",\"number\":2},{\"name\":\"cumin powder\",\"number\":1},{\"name\":\"garam masala\",\"number\":0.5},{\"name\":\"sabji masala\",\"number\":1},{\"name\":\"mustard seeds\",\"number\":1},{\"name\":\"wholewheat flour\",\"number\":2},{\"name\":\"gram flour\",\"number\":2},{\"name\":\"ajwain seeds\",\"number\":1},{\"name\":\"chopped coriander leaves\",\"number\":4}]', '01\nTake wholewheat flour, gram flour, some salt, red chilli powder, cumin powder, ajwain , sesame seeds in a bowl and knead a soft dough. keep it aside for 5 minutes.\n\n02\nin a pan take some oil and add mustard seeds, let it crackle and then add chopped onions and chopped green chilly. mix it and wait till onion turns brown.\n\n03\nAdd ginger garlic paste and some salt to taste. wait till the raw smell of garlic goes away.\n\n04\nadd turmeric powder, red chilly powder, sabji masala , potato and coriander leaves. mix it well and squeeze a lime on it.\n\n05\nsprinkle some garam masala and cover it for 5 minutes. switch of the stove and divide the mixture into small portions.\n\n06\nTake the dough and divide it into small balls. take a ball, roll out a small paratha stuff the potato mixture in it and make a dumpling. roll it in flour and roll out a paratha gently by applying some oil.\n\n07\ntake some oil in a pan or tawa and cook the paratha on both sides. serve with mint chutney or chilled curd dip.\n  ', 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `record`
--

TRUNCATE TABLE `record`;
--
-- Dumping data for table `record`
--

INSERT DELAYED IGNORE INTO `record` (`id`, `username`, `date`) VALUES
(1, 'herojk64', '2022-05-01'),
(2, 'herojk64', '2022-05-01'),
(3, 'herojk64', '2022-05-01'),
(4, 'herojk64', '2022-05-01'),
(5, 'herojk64', '2022-05-01'),
(6, 'herojk64', '2022-05-01'),
(7, 'herojk64', '2022-05-01'),
(8, 'herojk64', '2022-05-01'),
(9, 'herojk64', '2022-05-01'),
(10, 'herojk64', '2022-05-01'),
(11, 'herojk64', '2022-05-01'),
(12, 'herojk64', '2022-05-01'),
(13, 'herojk64', '2022-05-01'),
(14, 'herojk64', '2022-05-01'),
(15, 'herojk64', '2022-05-01'),
(16, 'herojk64', '2022-05-01'),
(17, 'admin', '2022-05-01'),
(18, 'admin', '2022-05-03'),
(19, 'admin', '2022-05-05'),
(20, 'admin', '2022-05-05'),
(21, 'admin', '2022-05-05'),
(22, 'admin', '2022-05-05'),
(23, 'admin', '2022-05-05'),
(24, 'herojk64', '2022-05-11'),
(25, 'herojk64', '2022-05-11'),
(26, 'admin', '2022-06-19'),
(27, 'herojk64', '2022-06-19');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
