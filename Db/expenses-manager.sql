-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране: 
-- Версия на сървъра: 5.5.24-log
-- Версия на PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `expenses-manager`
--

-- --------------------------------------------------------

--
-- Структура на таблица `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expenses_id` int(11) NOT NULL AUTO_INCREMENT,
  `Column 7` int(11) NOT NULL,
  `expenses_name` varchar(50) NOT NULL DEFAULT '0',
  `expenses_price` varchar(50) NOT NULL DEFAULT '0',
  `date` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`expenses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Ссхема на данните от таблица `expenses`
--

INSERT INTO `expenses` (`expenses_id`, `Column 7`, `expenses_name`, `expenses_price`, `date`, `category_id`, `user_id`) VALUES
(1, 0, 'sandwich', '4.50', '2014-10-25', 1, 4),
(3, 0, 'water', '1.50', '2014-10-23', 2, 4),
(5, 0, 'ticket', '1', '2014-10-24', 3, 3),
(6, 0, 'cigarettes', '5.50', '2014-10-25', 4, 4),
(7, 0, 'croissant', '1.25', '2014-10-23', 1, 4),
(8, 0, 'Coke', '2.99', '2014-10-22', 2, 3),
(9, 0, 'milk', '2.99', '2014-10-25', 4, 3),
(12, 0, 'Kokok', '131', '2014-10-09', 2, 4);

-- --------------------------------------------------------

--
-- Структура на таблица `expenses_categories`
--

CREATE TABLE IF NOT EXISTS `expenses_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Ссхема на данните от таблица `expenses_categories`
--

INSERT INTO `expenses_categories` (`id`, `name`, `user_id`) VALUES
(1, 'food', 4),
(2, 'dring', 4),
(3, 'transport', 4),
(4, 'ather', 4);

-- --------------------------------------------------------

--
-- Структура на таблица `forum_groups`
--

CREATE TABLE IF NOT EXISTS `forum_groups` (
  `forum_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`forum_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Ссхема на данните от таблица `forum_groups`
--

INSERT INTO `forum_groups` (`forum_group_id`, `name`) VALUES
(1, 'fun'),
(2, 'work'),
(4, 'animals'),
(18, 'cars');

-- --------------------------------------------------------

--
-- Структура на таблица `forum_posts`
--

CREATE TABLE IF NOT EXISTS `forum_posts` (
  `forum_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `forum_group_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '0',
  `description` varchar(250) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`forum_post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Ссхема на данните от таблица `forum_posts`
--

INSERT INTO `forum_posts` (`forum_post_id`, `user_id`, `forum_group_id`, `title`, `description`, `date`) VALUES
(1, 4, 2, 'test title', 'test desc', '2014-10-09 18:10:49'),
(2, 4, 2, 'test title', 'test desc', '2014-10-09 18:10:58');

-- --------------------------------------------------------

--
-- Структура на таблица `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `pictures_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_path` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`pictures_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Ссхема на данните от таблица `pictures`
--

INSERT INTO `pictures` (`pictures_id`, `picture_path`, `user_id`) VALUES
(35, 'Koala.jpg', 4),
(36, 'Desert.jpg', 4),
(37, 'Chrysanthemum.jpg', 4);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `activation_code` varchar(300) DEFAULT NULL,
  `user_group_id` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Ссхема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `last_modified`, `email`, `is_active`, `activation_code`, `user_group_id`) VALUES
(3, 'misho', '123', 'Misho', 'Misho', '2014-08-07 19:08:41', 'hmakedonski88@gmail.com', 1, '80d92b3b368729c937e7', 1),
(4, 'test', '123', 'Test', 'Test', '2014-08-13 15:08:08', 'hmakedonski88@gmail.com', 1, 'ab6b331e94c28169d15c', 1),
(5, 'opaa', '1', '1', '1', '2014-10-09 18:10:50', 'himakedonski@gmail.com', 0, '60e02fd9633a6c2500d5', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
