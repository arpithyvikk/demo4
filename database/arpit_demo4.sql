-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2022 at 07:11 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arpit_demo4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'arpit', 'arpit@gmail.com', 'arpit');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `rb_date` date NOT NULL,
  `rb_time` varchar(255) NOT NULL,
  `uniq_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `mobile`, `room_id`, `rb_date`, `rb_time`, `uniq_id`, `description`, `created_at`) VALUES
(3, 'Eleanor George', 'wyfymi@mailinator.com', '11564366455', '2', '2022-01-11', 't1', '1142670189', 'kvnnv vntlvntlv tjnvtnvvvt', '2022-01-10 11:27:30'),
(2, 'Hima Shukla', 'hima.shukla@hyvikk.com', '01234567890', '2', '2022-01-11', 't2', '1438580727', 'ccdddfvfvf', '2022-01-10 11:05:05'),
(4, 'test test', 'test@example.com', '8991724582', '1', '2022-01-11', 't1', '669508250', 'jnunmm', '2022-01-10 12:14:38'),
(5, 'Catherine Rose', 'xiomara@gmail.com', '6425874589', '1', '2022-01-11', 't2', '914409915', 'csdcdcddccdcdc', '2022-01-10 12:13:44'),
(6, 'aaa', 'admin@gmail.com', '233231', '2', '2022-01-12', 't1', '1772728796', 'sa', '2022-01-11 05:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `img`, `name`, `info`, `price`, `created_at`) VALUES
(1, 'croom1.jfif', 'Conference Room', 'A-154, Near Ab Road, Bhavnagar, Gujarat-364006. 20-60 Guests.  ', '10000', '2022-01-10 05:38:11'),
(2, 'proom3.jpg', 'Party Hall', 'A-45, Near AB Road, Bhavnagar, Gujarat - 364006. 100 - 500 Guests.', '20000', '2022-01-10 05:36:58'),
(3, 'broom2.jpg', 'Birthday Special', 'C-25, Opp Centrat Roadlines, Pune - 521001. 200 - 600 Guests.', '15000', '2022-01-10 05:39:59'),
(4, 'croom2.jfif', 'Conference Room', 'S-457, Opp RE-Avanue, SRT Road, Ahmedabad - 341221. 10 - 50 Guests.', '10000', '2022-01-10 05:41:28'),
(5, 'proom1.jpg', 'Party Hall', 'A-05, Sentral Point Comp, Ahmedabad -345124. 200 - 1000 Guests.  ', '30000', '2022-01-10 05:43:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
