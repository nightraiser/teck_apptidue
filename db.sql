-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2016 at 11:00 AM
-- Server version: 5.5.46
-- PHP Version: 5.5.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assessments`
--

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(100) NOT NULL,
  `mod_description` text NOT NULL,
  `mod_status` tinyint(1) NOT NULL,
  `mod_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`mod_id`, `mod_name`, `mod_description`, `mod_status`, `mod_createdon`) VALUES
(1, 'Mod1', 'Description', 1, '2016-01-05 16:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `qfk_moduleid` int(11) NOT NULL,
  `qtitle` text NOT NULL,
  `qstatement` text NOT NULL,
  `qoption1` text NOT NULL,
  `qoption2` text NOT NULL,
  `qoption3` text NOT NULL,
  `qoption4` text NOT NULL,
  `qanswer` text NOT NULL,
  `qcreatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(100) NOT NULL,
  `test_description` text NOT NULL,
  `test_status` tinyint(1) NOT NULL,
  `test_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `test_code` varchar(40) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `test_description`, `test_status`, `test_createdon`, `test_code`) VALUES
(1, 'TEST1', 'Description', 1, '2016-01-05 15:59:38', '2212294583');

-- --------------------------------------------------------

--
-- Table structure for table `test_module_data`
--

CREATE TABLE IF NOT EXISTS `test_module_data` (
  `tmd_id` int(11) NOT NULL AUTO_INCREMENT,
  `tmdfk_test_id` int(11) NOT NULL,
  `tmdfk_module_id` int(11) NOT NULL,
  `tmd_module_duration` int(11) NOT NULL,
  `tmd_no_questions` int(11) NOT NULL,
  PRIMARY KEY (`tmd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `test_module_data`
--

INSERT INTO `test_module_data` (`tmd_id`, `tmdfk_test_id`, `tmdfk_module_id`, `tmd_module_duration`, `tmd_no_questions`) VALUES
(1, 1, 1, 30, 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
