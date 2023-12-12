-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 04:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

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

CREATE TABLE `admin` (
  `adminid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `name`) VALUES
(1, 'librarian', 'admin123', 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `allowable`
--

CREATE TABLE `allowable` (
  `allowid` int(10) NOT NULL,
  `allowbooks` varchar(255) NOT NULL,
  `allowdays` varchar(255) NOT NULL,
  `penalty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowable`
--

INSERT INTO `allowable` (`allowid`, `allowbooks`, `allowdays`, `penalty`) VALUES
(1, '2', '4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `code`, `pass`) VALUES
(1, 'TR-FLORA924748_MAF3D', '}my!)wbr73');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `authors1` varchar(255) NOT NULL,
  `authors2` varchar(255) NOT NULL,
  `authors3` varchar(255) NOT NULL,
  `authors4` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `publication` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `copies` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rack` varchar(255) NOT NULL,
  `colunn` varchar(255) NOT NULL,
  `row` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `physical` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `bookimage` varchar(255) NOT NULL,
  `used` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `authors`, `authors1`, `authors2`, `authors3`, `authors4`, `edition`, `publication`, `publisher`, `isbn`, `copyright`, `copies`, `category`, `rack`, `colunn`, `row`, `section`, `physical`, `notes`, `bookimage`, `used`) VALUES
(23, 'Text book on the Philippine Constitution', 'De Leon, Hector S.', '', '', '', '', '2014', 'Manila ', 'Rex Book Store', '9789712367298', '2014', '1', 'Reference', '', '', '', 'Filipinana', 'Ivi, 820p. ; 22cm', '', '', ''),
(24, 'Assessment of student learning 1', 'Arellano, Aquilino D.', '', '', '', '', '2016', 'Manila Philippines', 'St. Andrew Publishing House', '9789710145119', '2016', '2', 'info tect', '', '', '', 'Reserved', 'iv, 105p. : ill.', '', '', ''),
(25, 'Essential Mathematics for the Modern World', 'Nocon, Rizaldi C.', '', '', '', '', '2018', 'Quezon City', 'C&E Publishing Inc.', '9789719809333', '2018', '2', 'accounting', '', '', '', 'Reserved', 'x, 510 pages : ill ; 26cm', '', '', ''),
(26, 'Data Analysis and Business Modeling ', 'Monohar, Hansa Lysander', '', '', '', '', '2017', 'New Delhi ', 'PHI Learning Private Limited', '9788120352889', '2017', '2', 'info tect', '', '', '', 'Circultion', 'xi, 367p. : ill', '', '', ''),
(27, 'Practical Behavior Management', 'Lawrence, Tracey', '', '', '', '', '2017', 'India', 'Bloomsbury Publishing Plc', '9781472942357', '2017', '2', 'GEC', '', '', '', 'Circultion', 'x, 164p. : illustrations ; 22cm', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

CREATE TABLE `bookstatus` (
  `bookstatusid` int(10) NOT NULL,
  `booksid` int(10) NOT NULL,
  `memid` int(10) NOT NULL,
  `borrowed` varchar(255) NOT NULL,
  `returned` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `penalty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookstatus`
--

INSERT INTO `bookstatus` (`bookstatusid`, `booksid`, `memid`, `borrowed`, `returned`, `duedate`, `status`, `penalty`) VALUES
(112, 23, 18, '2022-02-20', '2022-02-20', '2022-02-22', 'returned', 'no penalty'),
(113, 26, 20, '2022-02-20', '2022-02-21', '2022-02-22', 'returned', 'no penalty'),
(114, 26, 21, '2022-02-22', '2022-02-22', '2022-02-26', 'returned', 'no penalty');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cateid` int(10) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `log` (
  `logid` int(22) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timein` varchar(255) NOT NULL,
  `timeout` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(97, '21', 'CPSU-LRC-0004', 'Feb-22-2022 Tuesday', '06:45 PM', '', 'Mae', 'BSIT IV', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memid` int(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memid`, `idnumber`, `fullname`, `number`, `gender`, `type`, `yearlevel`, `course`, `action`) VALUES
(18, 'CPSU-LRC-0001', 'Rejean', '9755326734', 'Female', 'Student', 'III', 'BSED', 'OFFLINE'),
(19, 'CPSU-LRC-0002', 'Flora Mae Martinez', '9755326734', 'Male', 'Faculty', '', '', 'OFFLINE'),
(20, 'CPSU-LRC-0003', 'Abbey', '9755326734', 'Female', 'Student', 'IV', 'BSIT', 'ONLINE'),
(21, 'CPSU-LRC-0004', 'Mae', '9152902757', 'Female', 'Student', 'IV', 'BSIT', 'ONLINE'),
(22, 'CPSU-LRC-0005', 'chester', '9755326734', 'Male', 'Faculty', '', '', 'ONLINE');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportid` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `transactiondate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(150, '21', '26', 'returned book', '2022-02-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `allowable`
--
ALTER TABLE `allowable`
  ADD PRIMARY KEY (`allowid`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD PRIMARY KEY (`bookstatusid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allowable`
--
ALTER TABLE `allowable`
  MODIFY `allowid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bookstatus`
--
ALTER TABLE `bookstatus`
  MODIFY `bookstatusid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cateid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `logid` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
