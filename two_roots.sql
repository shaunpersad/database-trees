-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2012 at 04:22 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tree_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tree_data`
--

CREATE TABLE IF NOT EXISTS `tree_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(20) NOT NULL,
  `row` int(11) NOT NULL,
  `column` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tree_data`
--

INSERT INTO `tree_data` (`id`, `comment`, `row`, `column`, `parent_id`, `date_added`) VALUES
(1, 'first', 0, 0, 0, '2012-06-29 14:17:51'),
(2, 'second', 0, 1, 0, '2012-06-29 14:17:51'),
(3, 'third', 1, 0, 1, '2012-06-29 14:17:51'),
(4, 'fourth', 1, 0, 1, '2012-06-29 14:17:51'),
(5, 'fifth', 1, 1, 2, '2012-06-29 14:17:51'),
(6, 'sixth', 1, 1, 2, '2012-06-29 14:17:51'),
(7, 'seventh', 2, 0, 3, '2012-06-29 14:17:51'),
(8, 'eighth', 2, 0, 3, '2012-06-29 14:17:51'),
(9, 'nineth', 2, 1, 5, '2012-06-29 14:17:51'),
(10, 'tenth', 2, 1, 5, '2012-06-29 14:17:51'),
(11, 'eleventh', 2, 1, 5, '2012-06-29 14:17:51'),
(12, 'twelveth', 2, 1, 6, '2012-06-29 14:17:51'),
(13, 'thirteenth', 3, 0, 7, '2012-06-29 14:17:51'),
(14, 'fourteenth', 3, 0, 7, '2012-06-29 14:17:51'),
(15, 'fifteenth', 2, 0, 3, '2012-06-29 14:17:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
