-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2023 at 12:43 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `name`) VALUES
(1, 'librarian', 'admin123', 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `allowable`
--

DROP TABLE IF EXISTS `allowable`;
CREATE TABLE IF NOT EXISTS `allowable` (
  `allowid` int NOT NULL AUTO_INCREMENT,
  `allowbooks` varchar(255) NOT NULL,
  `allowdays` varchar(255) NOT NULL,
  `penalty` varchar(255) NOT NULL,
  PRIMARY KEY (`allowid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `allowable`
--

INSERT INTO `allowable` (`allowid`, `allowbooks`, `allowdays`, `penalty`) VALUES
(1, '2', '4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

DROP TABLE IF EXISTS `api`;
CREATE TABLE IF NOT EXISTS `api` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `code`, `pass`) VALUES
(1, 'TR-FLORA924748_MAF3D', '}my!)wbr73');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `state1` varchar(255) NOT NULL,
  `state2` varchar(255) NOT NULL,
  `state3` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `publication` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publisherdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `series` varchar(255) NOT NULL,
  `sub1` varchar(255) NOT NULL,
  `sub2` varchar(255) NOT NULL,
  `sub3` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `copies` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `physical` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `bookimage` varchar(255) NOT NULL,
  `callnum` int NOT NULL,
  `bookdealer` varchar(255) NOT NULL,
  `accnum` int NOT NULL,
  `dateres` varchar(255) NOT NULL,
  `srcfund` varchar(255) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `subtitle`, `authors`, `state1`, `state2`, `state3`, `edition`, `publication`, `publisher`, `publisherdate`, `series`, `sub1`, `sub2`, `sub3`, `isbn`, `copyright`, `copies`, `category`, `section`, `physical`, `notes`, `bookimage`, `callnum`, `bookdealer`, `accnum`, `dateres`, `srcfund`, `price`) VALUES
(23, 'Text book on the Philippine Constitution', '', 'De Leon, Hector S.', '', '', '', '2014', 'Manila ', 'Rex Book Store', '', '', '', '', '', '9789712367298', '2014', '0', 'Reference', 'Filipinana', 'Ivi, 820p. ; 22cm', '', '', 0, '', 0, '', '', 0),
(24, 'Assessment of student learning 1', '', 'Arellano, Aquilino D.', '', '', '', '2016', 'Manila Philippines', 'St. Andrew Publishing House', '', '', '', '', '', '9789710145119', '2016', '2', 'info tect', 'Reserved', 'iv, 105p. : ill.', '', '', 0, '', 0, '', '', 0),
(25, 'Essential Mathematics for the Modern World', '', 'Nocon, Rizaldi C.', '', '', '', '2018', 'Quezon City', 'C&E Publishing Inc.', '', '', '', '', '', '9789719809333', '2018', '2', 'accounting', 'Reserved', 'x, 510 pages : ill ; 26cm', '', '', 0, '', 0, '', '', 0),
(26, 'Data Analysis and Business Modeling ', '', 'Monohar, Hansa Lysander', '', '', '', '2017', 'New Delhi ', 'PHI Learning Private Limited', '', '', '', '', '', '9788120352889', '2017', '2', 'info tect', 'Circultion', 'xi, 367p. : ill', '', '', 0, '', 0, '', '', 0),
(27, 'Practical Behavior Management', '', 'Lawrence, Tracey', '', '', '', '2017', 'India', 'Bloomsbury Publishing Plc', '', '', '', '', '', '9781472942357', '2017', '2', 'GEC', 'Circultion', 'x, 164p. : illustrations ; 22cm', '', '', 0, '', 0, '', '', 0),
(28, 'The 48 laws of power.', 'Key Insights & Analysis.', 'Robert Greene.', 'asdf.', 'asdf.', 'adfsa.', 'asdf.', 'asd.', 'asdf.', '2023-12-11', 'adf.', 'asdf.', 'adf.', 'asdf.', '21412341235131', 'asdf.', '1', 'agriculture', 'Reserved', 'adf.', 'asdf.', '', 123434134, 'asdfad.', 980879523, '2023-12-29', 'sdaf.', 258),
(29, 'Atomic Habits', '', 'James Clear', '', '', '', '', '', '', '', '', '', '', '', '687456356354', '', '2', 'GEC', 'Fiction', '', '', '', 2147483647, '', 0, '2023-12-27', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

DROP TABLE IF EXISTS `bookstatus`;
CREATE TABLE IF NOT EXISTS `bookstatus` (
  `bookstatusid` int NOT NULL AUTO_INCREMENT,
  `booksid` int NOT NULL,
  `memid` int NOT NULL,
  `borrowed` varchar(255) NOT NULL,
  `returned` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `penalty` varchar(255) NOT NULL,
  PRIMARY KEY (`bookstatusid`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `bookstatus`
--

INSERT INTO `bookstatus` (`bookstatusid`, `booksid`, `memid`, `borrowed`, `returned`, `duedate`, `status`, `penalty`) VALUES
(112, 23, 18, '2022-02-20', '2022-02-20', '2022-02-22', 'returned', 'no penalty'),
(113, 26, 20, '2022-02-20', '2022-02-21', '2022-02-22', 'returned', 'no penalty'),
(114, 26, 21, '2022-02-22', '2022-02-22', '2022-02-26', 'returned', 'no penalty'),
(115, 26, 23, '2023-11-16', '2023-11-16', '2023-11-20', 'returned', 'no penalty'),
(116, 23, 23, '2023-12-13', '', '2023-12-17', 'borrowed', 'no penalty');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cateid` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`cateid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cateid`, `category`) VALUES
(5, 'info tect'),
(6, 'criminology'),
(7, 'HRM'),
(8, 'accounting'),
(9, 'agriculture'),
(10, 'GEC'),
(11, 'Reference');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `logid` int NOT NULL AUTO_INCREMENT,
  `memid` varchar(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timein` varchar(255) NOT NULL,
  `timeout` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logid`, `memid`, `idnumber`, `date`, `timein`, `timeout`, `fullname`, `course`, `type`) VALUES
(88, '18', 'CPSU-LRC-0001', 'Feb-20-2022 Sunday', '08:32 PM', '08:32 PM', 'Rejean', 'BSED III', 'Student'),
(89, '18', 'CPSU-LRC-0001', 'Feb-20-2022 Sunday', '08:32 PM', '08:36 PM', 'Rejean', 'BSED III', 'Student'),
(90, '20', 'CPSU-LRC-0003', 'Feb-20-2022 Sunday', '08:35 PM', '08:39 PM', 'Abbey', 'BSIT IV', 'Student'),
(91, '18', 'CPSU-LRC-0001', 'Feb-20-2022 Sunday', '08:36 PM', '08:38 PM', 'Rejean', 'BSED III', 'Student'),
(92, '19', 'CPSU-LRC-0002', 'Feb-21-2022 Monday', '09:52 AM', '09:52 AM', 'Flora Mae Martinez', ' ', 'Faculty'),
(93, '20', 'CPSU-LRC-0003', 'Feb-21-2022 Monday', '10:24 PM', '', 'Abbey', 'BSIT IV', 'Student'),
(94, '21', 'CPSU-LRC-0004', 'Feb-22-2022 Tuesday', '08:29 AM', '06:44 PM', 'Mae', 'BSIT IV', 'Student'),
(95, '22', 'CPSU-LRC-0005', 'Feb-22-2022 Tuesday', '10:54 AM', '10:54 AM', 'chester', ' ', 'Faculty'),
(96, '22', 'CPSU-LRC-0005', 'Feb-22-2022 Tuesday', '10:54 AM', '', 'chester', ' ', 'Faculty'),
(97, '21', 'CPSU-LRC-0004', 'Feb-22-2022 Tuesday', '06:45 PM', '', 'Mae', 'BSIT IV', 'Student'),
(98, '23', 'CPSU-LRC-0006', 'Nov-16-2023 Thursday', '11:39 AM', '11:41 AM', 'Mhel Angelo O. Tagpuno', 'BSIT III', 'Student'),
(99, '23', 'CPSU-LRC-0006', 'Nov-16-2023 Thursday', '11:42 AM', '', 'Mhel Angelo O. Tagpuno', 'BSIT III', 'Student'),
(100, '23', 'CPSU-LRC-0006', 'Dec-13-2023 Wednesday', '01:01 AM', '01:02 AM', 'Mhel Angelo O. Tagpuno', 'BSIT III', 'Student'),
(101, '23', 'CPSU-LRC-0006', 'Dec-13-2023 Wednesday', '01:02 AM', '01:24 AM', 'Mhel Angelo O. Tagpuno', 'BSIT III', 'Student'),
(102, '23', 'CPSU-LRC-0006', 'Dec-13-2023 Wednesday', '01:28 AM', '01:32 AM', 'Mhel Angelo O. Tagpuno', 'BSIT III', 'Student'),
(103, '18', 'CPSU-LRC-0001', 'Dec-17-2023 Sunday', '12:13 PM', '12:13 PM', 'Rejean', 'BSED III', 'Student'),
(104, '18', 'CPSU-LRC-0001', 'Dec-17-2023 Sunday', '12:13 PM', '12:15 PM', 'Rejean', 'BSED III', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `memid` int NOT NULL AUTO_INCREMENT,
  `idnumber` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`memid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memid`, `idnumber`, `fullname`, `number`, `gender`, `type`, `yearlevel`, `course`, `address`, `guardian`, `action`) VALUES
(18, 'CPSU-LRC-0001', 'Rejean', '9755326734', 'Female', 'Student', 'III', 'BSED', '', '', 'OFFLINE'),
(19, 'CPSU-LRC-0002', 'Flora Mae Martinez', '9755326734', 'Male', 'Faculty', '', '', '', '', 'OFFLINE'),
(20, 'CPSU-LRC-0003', 'Abbey', '9755326734', 'Female', 'Student', 'IV', 'BSIT', '', '', 'ONLINE'),
(21, 'CPSU-LRC-0004', 'Mae', '9152902757', 'Female', 'Student', 'IV', 'BSIT', '', '', 'ONLINE'),
(22, 'CPSU-LRC-0005', 'chester', '9755326734', 'Male', 'Faculty', '', '', '', '', 'ONLINE'),
(23, 'CPSU-LRC-0006', 'Mhel Angelo O. Tagpuno', '9385254044', 'Male', 'Student', 'III', 'BSIT', '', '', 'OFFLINE'),
(24, 'CPSU-LRC-0007', 'Laguda, Wilson R', '9385254044', 'Male', 'Student', 'III', 'BSIT', 'San Carlos City', 'N/A', 'OFFLINE'),
(25, 'CPSU-LRC-0008', 'Inodeo, Ilyn E', '9385254044', 'Female', 'Student', 'III', 'BSIT', 'Valle', 'N/A', 'OFFLINE');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `reportid` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `transactiondate` varchar(255) NOT NULL,
  PRIMARY KEY (`reportid`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportid`, `fullname`, `title`, `task`, `transactiondate`) VALUES
(82, '11', '10', 'borrowed book', '2021-11-01'),
(83, '11', '10', 'returned book', '2021-11-01'),
(84, '11', '10', 'borrowed book', '2021-11-01'),
(85, '11', '10', 'returned book', '2021-11-01'),
(86, '11', '10', 'borrowed book', '2021-11-01'),
(87, '11', '10', 'returned book', '2021-11-01'),
(88, '11', '10', 'borrowed book', '2021-11-01'),
(89, '11', '10', 'returned book', '2021-11-01'),
(90, '11', '10', 'borrowed book', '2021-11-01'),
(91, '11', '10', 'returned book', '2021-11-01'),
(92, '11', '10', 'borrowed book', '2021-11-01'),
(93, '11', '10', 'returned book', '2021-11-01'),
(94, '11', '10', 'borrowed book', '2021-11-01'),
(95, '11', '10', 'returned book', '2021-11-02'),
(96, '11', '10', 'borrowed book', '2021-11-02'),
(97, '11', '10', 'returned book', '2021-11-02'),
(98, '11', '10', 'borrowed book', '2021-11-02'),
(99, '11', '10', 'returned book', '2021-11-02'),
(100, '11', '10', 'borrowed book', '2021-11-02'),
(101, '11', '10', 'returned book', '2021-11-02'),
(102, '11', '10', 'borrowed book', '2021-11-02'),
(103, '1', '10', 'borrowed book', '2022-02-04'),
(104, '1', '10', 'borrowed book', '2022-02-04'),
(105, '1', '10', 'returned book', '2022-02-04'),
(106, '1', '10', 'borrowed book', '2022-02-04'),
(107, '2', '15', 'borrowed book', '2022-02-18'),
(108, '2', '15', 'borrowed book', '2022-02-18'),
(109, '2', '15', 'borrowed book', '2022-02-18'),
(110, '2', '15', 'borrowed book', '2022-02-18'),
(111, '2', '15', 'returned book', '2022-02-18'),
(112, '2', '15', 'borrowed book', '2022-02-18'),
(113, '2', '15', 'returned book', '2022-02-18'),
(114, '2', '15', 'returned book', '2022-02-18'),
(115, '2', '16', 'borrowed book', '2022-02-18'),
(116, '2', '15', 'borrowed book', '2022-02-18'),
(117, '5', '17', 'borrowed book', '2022-02-18'),
(118, '5', '18', 'borrowed book', '2022-02-18'),
(119, '5', '17', 'returned book', '2022-02-18'),
(120, '5', '18', 'returned book', '2022-02-18'),
(121, '6', '19', 'borrowed book', '2022-02-18'),
(122, '6', '19', 'returned book', '2022-02-18'),
(123, '7', '17', 'borrowed book', '2022-02-18'),
(124, '7', '17', 'returned book', '2022-02-18'),
(125, '8', '19', 'borrowed book', '2022-02-18'),
(126, '8', '19', 'returned book', '2022-02-18'),
(127, '8', '17', 'borrowed book', '2022-02-18'),
(128, '8', '20', 'borrowed book', '2022-02-18'),
(129, '8', '17', 'returned book', '2022-02-18'),
(130, '8', '20', 'returned book', '2022-02-18'),
(131, '9', '17', 'borrowed book', '2022-02-18'),
(132, '9', '17', 'returned book', '2022-02-18'),
(133, '10', '22', 'borrowed book', '2022-02-20'),
(134, '10', '22', 'borrowed book', '2022-02-20'),
(135, '10', '22', 'returned book', '2022-02-20'),
(136, '11', '23', 'borrowed book', '2022-02-20'),
(137, '11', '26', 'borrowed book', '2022-02-20'),
(138, '11', '23', 'returned book', '2022-02-20'),
(139, '11', '26', 'returned book', '2022-02-20'),
(140, '13', '23', 'borrowed book', '2022-02-20'),
(141, '13', '23', 'borrowed book', '2022-02-20'),
(142, '13', '23', 'returned book', '2022-02-20'),
(143, '14', '27', 'borrowed book', '2022-02-20'),
(144, '14', '27', 'returned book', '2022-02-20'),
(145, '18', '23', 'borrowed book', '2022-02-20'),
(146, '20', '26', 'borrowed book', '2022-02-20'),
(147, '18', '23', 'returned book', '2022-02-20'),
(148, '20', '26', 'returned book', '2022-02-21'),
(149, '21', '26', 'borrowed book', '2022-02-22'),
(150, '21', '26', 'returned book', '2022-02-22'),
(151, '23', '26', 'borrowed book', '2023-11-16'),
(152, '23', '26', 'returned book', '2023-11-16'),
(153, '23', '23', 'borrowed book', '2023-12-13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
