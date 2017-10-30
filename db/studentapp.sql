-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 04:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_score`
--

CREATE TABLE IF NOT EXISTS `exam_score` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `stdnt_id` int(11) NOT NULL,
  `Mathematics` varchar(20) DEFAULT NULL,
  `English` varchar(20) DEFAULT NULL,
  `Chemistry` varchar(20) DEFAULT NULL,
  `Physics` varchar(20) DEFAULT NULL,
  `Biology` varchar(20) DEFAULT NULL,
  `dte_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `exam_score`
--

INSERT INTO `exam_score` (`score_id`, `stdnt_id`, `Mathematics`, `English`, `Chemistry`, `Physics`, `Biology`, `dte_input`) VALUES
(1, 1, '40', '45', '39', '49', '50', '2017-10-27 19:24:41'),
(2, 2, '54', '49', '52', '60', '75', '2017-10-27 19:29:24'),
(3, 3, '63', '56', '80', '70', '50', '2017-10-27 19:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `stdnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `stdnt_pin` int(11) DEFAULT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stdnt_id`),
  UNIQUE KEY `stdnt_pin` (`stdnt_pin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`stdnt_id`, `fname`, `lname`, `reg_no`, `stdnt_pin`, `date_reg`) VALUES
(1, 'James', 'Kingsley', '2017001', 736299, '2017-10-27 08:38:17'),
(2, 'Jumoke', 'Ajibade', '2017002', 137888, '2017-10-28 16:14:15'),
(3, 'Steve', 'Jobbs', '2017003', NULL, '2017-10-28 16:16:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
