-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 06:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hkustshop`
--
CREATE DATABASE IF NOT EXISTS `hkustshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hkustshop`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` varchar(11) CHARACTER SET utf8 NOT NULL,
  `password` tinytext CHARACTER SET utf8 NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `password`, `join_date`) VALUES
('admin', 'admin', '2015-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET utf8 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
`item_code` int(11) unsigned NOT NULL,
  `category` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'none',
  `item_name` text CHARACTER SET utf8 NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `thumbnail` text CHARACTER SET utf8 NOT NULL,
  `detail` longtext CHARACTER SET utf8 NOT NULL,
  `upload_date` date NOT NULL,
  `exposure` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'show',
  `originalprice` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_code`, `category`, `item_name`, `price`, `thumbnail`, `detail`, `upload_date`, `exposure`, `originalprice`) VALUES
(1, 'food', 'test', 12, 'test', 'test', '2015-05-10', 'show', 11),
(2, 'drink', 'test', 10, '10801499_359383187577491_6889548603177874047_n.jpg', 'Enter Details Here te', '2015-05-13', 'show', 19),
(3, 'drink', 'test', 10, '10801499_359383187577491_6889548603177874047_n.jpg', 'Enter Details Here te', '2015-05-13', 'show', 19),
(4, 'utility', 'Last Test', 20, '/10801499_359383187577491_6889548603177874047_n.jpg', 'Enter Details Here', '2015-05-13', 'show', 19),
(5, 'utility', 'Last Test11', 20, 'admin/te.jpg', 'Enter Details Here', '2015-05-13', 'show', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_code` int(11) unsigned NOT NULL,
  `order_passward` tinytext CHARACTER SET utf8 NOT NULL,
  `buyer_name` varchar(11) CHARACTER SET utf8 NOT NULL,
  `buyer_phone` varchar(16) CHARACTER SET utf8 NOT NULL,
  `buyer_address` mediumtext CHARACTER SET utf8 NOT NULL,
  `total_price` int(101) unsigned NOT NULL,
  `order_date` date NOT NULL,
  `billing_select` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'cash',
  `billing_check` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_code` int(11) unsigned NOT NULL,
  `item_code` int(11) unsigned NOT NULL,
  `item_quantity` int(11) unsigned NOT NULL DEFAULT '1',
  `sub_price` int(101) unsigned NOT NULL,
  `delivery_code` int(11) unsigned NOT NULL,
  `delivery_date` date NOT NULL,
  `history` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_code`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
 ADD PRIMARY KEY (`order_code`,`item_code`), ADD KEY `item_code` (`item_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_code` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_code`) REFERENCES `orders` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_code`) REFERENCES `items` (`item_code`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
