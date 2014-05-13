-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2014 at 03:18 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `author` varchar(100) COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `author`, `title`, `body`, `created_at`, `updated_at`) VALUES
(21, 0, 'Usama Ahmed', 'Title Here', 'body goes herebody goes herebody goes herebody goes here', '2014-04-27 04:21:40', '2014-04-27 04:21:40'),
(17, 0, 'Usama Ahmed', 'Title Here', 'body goes herebody goes herebody goes herebody goes here', '2014-04-24 09:18:54', '2014-04-24 09:18:54'),
(9, 0, 'اسامة احمد', 'قشطه جدا', 'الموس الموضوع يا برنس البرانيس الموضوع يا برنس البرانيس ', '2014-04-24 07:01:17', '2014-04-24 04:01:17'),
(18, 0, 'Usama Ahmed', 'Title Here', 'body goes herbody goes herbody goes herbody goes here', '2014-04-24 09:37:27', '2014-04-24 09:37:27'),
(19, 0, 'Usama Ahmed', 'Title Here', 'body goes herebody goes herebody goes herebody goes here', '2014-04-24 09:41:40', '2014-04-24 09:41:40'),
(20, 0, 'Usama Ahmed', 'Title Here', 'body goes herebody goes herebody goes herebody goes here', '2014-04-24 09:44:55', '2014-04-24 09:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(19, 'test', '2014-05-11 05:52:37', '2014-05-11 05:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` tinytext COLLATE utf8_bin NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(250) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(150) COLLATE utf8_bin NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(150) COLLATE utf8_bin NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `active`, `activation_code`, `updated_at`, `created_at`, `remember_token`) VALUES
(12, 'Admin', 'admin@admin.com', '$2y$10$8v3MIVwAp67MxqTPO6/2POKZ4V3p/VzrUyWbid7oNcbsyRAa8UX9O', 1, 1, '', '2014-05-11 05:58:43', '0000-00-00 00:00:00', 'ITeQgY6gT93SFsLkqD4RwuPNcx15yKdusvVNGBccAiE1Bakbd8DhhiU47mio'),
(14, 'user', 'uusa35@gmail.com', '$2y$10$qdxBCTej2HBQYzj4FcuT1O32P7aZmRu0oW.yvVeQdxnmFDYfmBaZu', 0, 1, 'Rxrz9z8d5Dy6npVT3u3XO5JJY', '2014-05-11 06:47:23', '2014-05-11 05:09:43', 'BHiK384ChBJlGLfsJCjs2MWMZQgLnkmflHdZO27Pe2lGxVoOXywFiE5a334d');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
