-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2020 at 02:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `patent`
----------------------------------------------------------------

CREATE TABLE `patent` (
  `sdrn` varchar(20) NOT NULL,
  `faculty_name` varchar(128) NOT NULL,
  `author1` varchar(128) NOT NULL,
  `author2` varchar(128) NOT NULL,
  `author3` varchar(128) NOT NULL,
  `author4` varchar(128) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `patent` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `application_no` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `reg_amount` int(128) NOT NULL,
  `amount_funded` int(128) NOT NULL,
  `reg_date` date NOT NULL,
  `opt1` varchar(128) NOT NULL,
  `opt2` varchar(128) NOT NULL,
  `opt3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

-- Table structure for table `copyright`
-----------------------------------------------------------------------

CREATE TABLE `copyright` (
  `sdrn` varchar(20) NOT NULL,
  `faculty_name` varchar(128) NOT NULL,
  `author1` varchar(128) NOT NULL,
  `author2` varchar(128) NOT NULL,
  `author3` varchar(128) NOT NULL,
  `author4` varchar(128) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `copyright` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `application_no` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `reg_amount` int(128) NOT NULL,
  `amount_funded` int(128) NOT NULL,
  `reg_date` date(128) NOT NULL,
  `opt1` varchar(128) NOT NULL,
  `opt2` varchar(128) NOT NULL,
  `opt3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;


-- Table structure for table `journal`
---------------------------------------------------------

CREATE TABLE `journal` (
  `sdrn` varchar(128) NOT NULL,
  `author1` varchar(128) NOT NULL,
  `author2` varchar(128) NOT NULL,
  `author3` varchar(128) NOT NULL,
  `author4` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `journal_name` varchar(128) NOT NULL,
  `volume_no` varchar(128) NOT NULL,
  `page_no` int(128) NOT NULL,
  `isbn_no` varchar(128) NOT NULL,
  `doi` varchar(128) NOT NULL,
  `year` date NOT NULL,
  `ntnl_no` varchar(128) NOT NULL,
  `indexed_in` varchar(128) NOT NULL,
  `no_Of_times` int(128) NOT NULL,
  `reg_amount` int(128) NOT NULL,
  `amount_sanctioned` int(128) NOT NULL,
  `awards` varchar(128) NOT NULL,
  `opt1` varchar(128) NOT NULL,
  `opt2` varchar(128) NOT NULL,
  `opt3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

-- Table structure for table `conference`
--------------------------------------------------------------------------

CREATE TABLE `conference` (
  `sdrn` varchar(20) NOT NULL,
  `author1` varchar(128) NOT NULL,
  `author2` varchar(128) NOT NULL,
  `author3` varchar(128) NOT NULL,
  `author4` varchar(128) NOT NULL,
  `paper_title` varchar(128) NOT NULL,
  `con_name` varchar(128) NOT NULL,
  `con_place` varchar(128) NOT NULL,
  `con_date` date NOT NULL,
  `ntnl_no` varchar(128) NOT NULL,
  `isbn_no` varchar(128) NOT NULL,
  `doi` varchar(128) NOT NULL,
  `year` date NOT NULL,
  `indexed_in` varchar(128) NOT NULL,
  `number_Of_times` int(128) NOT NULL,
  `reg_amount` int(128) NOT NULL,
  `amount_sanctioned` int(128) NOT NULL,
  `presented_personally` varchar(128) NOT NULL,
  `awards` varchar(128) NOT NULL,
  `opt1` varchar(128) NOT NULL,
  `opt2` varchar(128) NOT NULL,
  `opt3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
