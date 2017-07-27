-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 04:12 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `halldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allot`
--

CREATE TABLE IF NOT EXISTS `tbl_allot` (
  `allot_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` int(11) NOT NULL,
  `seat_id` varchar(25) NOT NULL,
  `st_id` int(11) NOT NULL,
  `block_no` int(11) NOT NULL,
  `floor_no` int(11) NOT NULL,
  `in_date` varchar(25) NOT NULL,
  `out_date` varchar(25) NOT NULL,
  `alloted` int(11) NOT NULL,
  PRIMARY KEY (`allot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `tbl_allot`
--

INSERT INTO `tbl_allot` (`allot_id`, `room_no`, `seat_id`, `st_id`, `block_no`, `floor_no`, `in_date`, `out_date`, `alloted`) VALUES
(58, 101, 'R101B1F1S4', 46, 1, 1, '1/1/2000', '1/1/2001', 1),
(60, 101, 'R101B1F1S1', 47, 1, 1, '1/1/2000', '1/1/2001', 1),
(61, 102, 'R102B1F1S1', 48, 1, 1, '1/1/2000', '1/1/2001', 1),
(62, 103, 'R103B1F1S1', 49, 1, 1, '1/1/2000', '1/1/2001', 1),
(63, 103, 'R103B1F1S3', 50, 1, 1, '1/1/2000', '1/1/2001', 1),
(64, 257, 'R257B2F2S4', 51, 2, 2, '1/1/2000', '1/1/2001', 1),
(65, 101, 'R101B1F1S3', 52, 1, 1, '1/1/2000', '1/1/2001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomentry`
--

CREATE TABLE IF NOT EXISTS `tbl_roomentry` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_no` varchar(10) NOT NULL,
  `floor_no` varchar(25) NOT NULL,
  `room_no` int(11) NOT NULL,
  `available_seat` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_roomentry`
--

INSERT INTO `tbl_roomentry` (`room_id`, `block_no`, `floor_no`, `room_no`, `available_seat`) VALUES
(1, '1', '1', 101, 0),
(2, '1', '1', 102, 3),
(3, '1', '1', 103, 2),
(4, '1', '1', 104, 4),
(5, '1', '1', 105, 4),
(6, '1', '2', 201, 4),
(7, '1', '2', 202, 4),
(8, '1', '2', 203, 4),
(9, '1', '2', 204, 4),
(10, '1', '2', 205, 4),
(11, '2', '1', 251, 4),
(12, '2', '1', 252, 4),
(13, '2', '1', 253, 4),
(14, '2', '1', 254, 4),
(15, '2', '1', 255, 4),
(16, '2', '2', 256, 4),
(17, '2', '2', 257, 3),
(18, '2', '2', 258, 4),
(19, '2', '2', 259, 4),
(20, '2', '2', 260, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(255) NOT NULL,
  `st_father` varchar(255) NOT NULL,
  `st_mother` varchar(255) NOT NULL,
  `st_address` text NOT NULL,
  `st_phone` varchar(255) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_dept` varchar(255) NOT NULL,
  `st_session` varchar(11) NOT NULL,
  `st_roll` varchar(255) NOT NULL,
  `st_blood` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL,
  `allot` int(11) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`st_id`, `st_name`, `st_father`, `st_mother`, `st_address`, `st_phone`, `st_email`, `st_dept`, `st_session`, `st_roll`, `st_blood`, `approve`, `allot`) VALUES
(46, 'Shohorab Hossain', 'Delowar Hossain', 'Delowara Begum', 'Comilla', '01673571953', 'shohorabpalash1992@gmail.com', 'CSTE', '2011-2012', 'ASH1201050', 'O+', 1, 1),
(47, 'w', 'w', 'w', 'w', '01673571953', 'shohorabpalash1992@gmail.com', 'CSTE', '2011-2012', 'ASH1201050', 'A+', 1, 1),
(48, 'r', 'r', 'r', 'r', '01673571953', 'shohorabpalash1992@gmail.com', 'CSTE', '2011-2012', 'ASH1201050', 'A+', 1, 1),
(49, 'p', 'p', 'p', 'p', '01673571953', 'shohorabpalash1992@gmail.com', 'CSTE', '2011-2012', 'ASH1201050', 'A+', 1, 1),
(50, 'w', 'w', 'w', 'w', '01673571953', 'shohorabpalash1992@gmail.com', 'CSTE', '2011-2012', 'ASH1201050', 'A+', 1, 1),
(51, 'shihab', 'g', 'g', 'g', '01673571953', 'shohorabpalash1992@gmail.com', 'CSTE', '2011-2012', 'ASH1201050', 'A+', 1, 1),
(52, 'f', 'father father', 'fgjhgh', 'address1', '01673571953', 'shohorabpalash1992@gmail.com', 'CSTE', '2011-2012', 'ASH1201050', 'A+', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
