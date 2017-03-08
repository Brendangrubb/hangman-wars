-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 08, 2017 at 02:01 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hangman_wars`
--
CREATE DATABASE IF NOT EXISTS `hangman_wars` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hangman_wars`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'shakespeare'),
(2, 'dickens'),
(3, 'chaucer'),
(4, 'poe'),
(5, 'austen'),
(6, 'tolstoy'),
(7, 'twain'),
(8, 'woolf'),
(9, 'wilde'),
(10, 'napoleon'),
(11, 'hemmingway'),
(12, 'stephenson'),
(13, 'python'),
(14, 'star wars');

-- --------------------------------------------------------

--
-- Table structure for table `game_state`
--

CREATE TABLE `game_state` (
  `id` bigint(20) unsigned NOT NULL,
  `current_score` int(11) DEFAULT NULL,
  `realm_one` tinyint(1) DEFAULT NULL,
  `realm_two` tinyint(1) DEFAULT NULL,
  `realm_three` tinyint(1) DEFAULT NULL,
  `realm_four` tinyint(1) DEFAULT NULL,
  `realm_five` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_state`
--

INSERT INTO `game_state` (`id`, `current_score`, `realm_one`, `realm_two`, `realm_three`, `realm_four`, `realm_five`) VALUES
(1, 100, 0, 0, 0, 0, 0),
(2, 100, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phrases`
--

CREATE TABLE `phrases` (
  `id` bigint(20) unsigned NOT NULL,
  `phrase` text,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phrases`
--

INSERT INTO `phrases` (`id`, `phrase`, `author_id`) VALUES
(1, 'Fear is the path to the dark side', 14),
(2, 'An elegant weapon for a more civilized time', 14),
(3, 'be not afraid of greatness some are born great some achieve greatness and some have greatness thrust upon them', 1),
(4, 'there is nothing either good or bad but thinking makes it so', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `game_state`
--
ALTER TABLE `game_state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `phrases`
--
ALTER TABLE `phrases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `game_state`
--
ALTER TABLE `game_state`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phrases`
--
ALTER TABLE `phrases`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
