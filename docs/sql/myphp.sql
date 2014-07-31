-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2014 at 12:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_time`
--

CREATE TABLE IF NOT EXISTS `cake_time` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cake_time`
--

INSERT INTO `cake_time` (`id`, `time`) VALUES
(1, '2014-07-31 11:44:18'),
(2, '2014-07-31 11:46:53'),
(3, '2014-07-31 11:51:54'),
(4, '2014-07-31 11:56:54'),
(5, '1970-01-01 01:00:00'),
(6, '2014-07-31 12:06:52'),
(7, '2014-07-31 12:11:54'),
(8, '2014-07-31 12:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(2, 'A title once again', 'And the post body follows.', '2014-07-28 13:31:06', NULL),
(4, 'hello', 'this is the first my cakephp', '2014-07-28 10:58:05', '2014-07-28 10:58:05'),
(8, 'cakephp', 'jsjsjsjjas\r\n', '2014-07-30 08:39:34', '2014-07-30 08:39:34'),
(21, 'facebook', 'mang xa hoi lon nhat the gioi', '2014-07-30 11:33:46', '2014-07-30 11:33:46'),
(22, 'facebook', 'mang xa hoi lon nhat the gioi', '2014-07-30 11:34:10', '2014-07-30 11:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(3, 'viet1', 'c5ff8cc7ee433dd48133a3d66e740f3494995ecd', 'admin', '2014-07-29 08:11:08', '2014-07-29 08:11:08'),
(4, 'buiviet', 'c15ff31c113370297dc70f4210b5dfae2ce332f0', 'admin', '2014-07-29 10:08:50', '2014-07-29 10:08:50'),
(8, 'buiquocviet', 'c15ff31c113370297dc70f4210b5dfae2ce332f0', 'admin', '2014-07-29 12:47:23', '2014-07-29 12:47:23'),
(13, 'buiquocviet2', 'c15ff31c113370297dc70f4210b5dfae2ce332f0', 'admin', '2014-07-30 08:38:38', '2014-07-30 08:38:38'),
(14, 'buiquocviet23', 'c15ff31c113370297dc70f4210b5dfae2ce332f0', 'admin', '2014-07-30 08:39:18', '2014-07-30 08:39:18'),
(15, 'viet3', 'c15ff31c113370297dc70f4210b5dfae2ce332f0', 'admin', '2014-07-30 11:56:25', '2014-07-30 11:56:25'),
(16, 'viet4', '76dba18786f236c76fae45744c6f2a9098005ba4', 'admin', '2014-07-31 04:22:40', '2014-07-31 04:22:40'),
(17, 'viet5', 'a63cf7e8406f5446da4820786538242f6f726e7b', 'admin', '2014-07-31 04:23:49', '2014-07-31 04:23:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
