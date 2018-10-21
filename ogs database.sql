-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 01:30 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `YearLevel` varchar(50) NOT NULL,
  `WW` int(11) NOT NULL,
  `PT` int(11) NOT NULL,
  `QA` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `Subject`, `Section`, `YearLevel`, `WW`, `PT`, `QA`, `UserID`) VALUES
(6, 'Math', 'CI-503', '1st Year', 20, 40, 40, 2),
(7, 'English', 'CI-502', '1st Year', 40, 40, 20, 2),
(8, 'Physics', 'CI-701', '4th Year', 20, 40, 40, 2),
(9, 'Chemistry', 'CI-703', '3rd Year', 30, 30, 40, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `Role`) VALUES
(1, 'Admin'),
(2, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `ScoreID` int(11) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `PerfectScore` int(11) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `GradingPeriod` varchar(50) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`ScoreID`, `Description`, `PerfectScore`, `Type`, `Date`, `GradingPeriod`, `ClassID`, `IsDeleted`) VALUES
(8, 'Adding Number Quiz', 30, 'Written Work', '2018-10-19 22:50:19', '1st Grading', 6, 0),
(9, 'asdf', 30, 'Written Work', '2018-10-19 23:14:33', '1st Grading', 7, 0),
(10, 'Substraction Quiz', 20, 'Written Work', '2018-10-20 00:43:37', '1st Grading', 6, 0),
(11, 'Oral Recetation', 50, 'Performance Task', '2018-10-20 00:48:02', '1st Grading', 6, 0),
(12, 'Multiplying Number Quiz', 50, 'Written Work', '2018-10-21 02:39:57', '1st Grading', 6, 0),
(13, 'First Grading Examination', 50, 'Quarterly Assessment', '2018-10-21 03:30:56', '1st Grading', 6, 0),
(14, 'Division Quiz', 20, 'Written Work', '2018-10-21 04:16:49', '1st Grading', 6, 0),
(17, 'qrwqerewqrwe', 10, 'Written Work', '2018-10-21 08:18:43', '2nd Grading', 6, 0),
(18, 'qrwqerewqrwe', 50, 'Performance Task', '2018-10-21 08:19:25', '2nd Grading', 6, 0),
(19, 'qrwqerewqrwe', 50, 'Quarterly Assessment', '2018-10-21 08:20:00', '2nd Grading', 6, 0),
(20, 'xcvxzvxz', 10, 'Written Work', '2018-10-21 08:31:19', '3rd Grading', 6, 0),
(21, 'oiuouioui', 10, 'Performance Task', '2018-10-21 08:31:43', '3rd Grading', 6, 0),
(22, 'Third Grading Exam', 50, 'Quarterly Assessment', '2018-10-21 08:32:31', '3rd Grading', 6, 0),
(23, 'xcvxzcvv', 10, 'Written Work', '2018-10-21 08:50:49', '4th Grading', 6, 0),
(24, 'uiouiouio', 50, 'Performance Task', '2018-10-21 08:51:29', '4th Grading', 6, 0),
(25, 'uiouiouio', 50, 'Quarterly Assessment', '2018-10-21 08:52:04', '4th Grading', 6, 0),
(26, 'Pythagorean Theorem', 50, 'Written Work', '2018-10-21 09:48:41', '1st Grading', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Name`, `Gender`, `ClassID`, `IsDeleted`) VALUES
(1, 'Justin Bieber', 'Male', 6, 1),
(2, 'Shawn Mendez', 'Male', 6, 0),
(3, 'Micheal Pangilingan', 'Male', 6, 0),
(4, 'Dua Lipa', 'Female', 7, 0),
(5, 'John Doe', 'Male', 6, 0),
(6, 'Riki Maru', 'Male', 6, 0),
(7, 'Spirit Breaker', 'Male', 6, 0),
(8, 'Shadow Fiend', 'Male', 6, 0),
(9, 'Templar Assasin', 'Female', 6, 0),
(10, 'Lina Inverse', 'Female', 6, 0),
(11, 'Dua Lipa', 'Female', 6, 0),
(12, 'Nancy McDonie', 'Female', 6, 0),
(13, 'Mariah Carey', 'Female', 7, 0),
(14, 'Steven Stallone', 'Male', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentscore`
--

CREATE TABLE `studentscore` (
  `StudentScoreID` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `ScoreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentscore`
--

INSERT INTO `studentscore` (`StudentScoreID`, `Score`, `StudentID`, `ScoreID`) VALUES
(11, 20, 7, 8),
(12, 20, 5, 8),
(13, 29, 2, 8),
(14, 20, 6, 8),
(15, 20, 3, 8),
(16, 21, 8, 8),
(17, 22, 9, 8),
(18, 23, 10, 8),
(19, 24, 11, 8),
(20, 25, 12, 8),
(21, 12, 3, 10),
(22, 20, 2, 10),
(23, 16, 5, 10),
(24, 13, 6, 10),
(25, 15, 7, 10),
(26, 14, 8, 10),
(27, 16, 9, 10),
(28, 10, 10, 10),
(29, 11, 11, 10),
(30, 12, 12, 10),
(31, 40, 2, 11),
(32, 43, 7, 11),
(33, 41, 3, 11),
(34, 44, 8, 11),
(35, 45, 5, 11),
(36, 42, 6, 11),
(37, 35, 9, 11),
(38, 39, 10, 11),
(39, 38, 11, 11),
(40, 34, 12, 11),
(41, 22, 4, 9),
(42, 29, 14, 9),
(43, 30, 13, 9),
(44, 39, 3, 12),
(45, 40, 5, 12),
(46, 47, 8, 12),
(47, 50, 2, 12),
(48, 45, 6, 12),
(49, 48, 9, 12),
(50, 42, 7, 12),
(51, 38, 10, 12),
(52, 35, 11, 12),
(53, 35, 12, 12),
(54, 45, 3, 13),
(55, 45, 5, 13),
(56, 45, 6, 13),
(57, 45, 8, 13),
(58, 45, 2, 13),
(59, 45, 7, 13),
(60, 30, 9, 13),
(61, 30, 10, 13),
(62, 30, 11, 13),
(63, 50, 12, 13),
(64, 18, 3, 14),
(65, 20, 2, 14),
(66, 17, 5, 14),
(67, 15, 6, 14),
(68, 17, 7, 14),
(69, 15, 8, 14),
(70, 18, 9, 14),
(71, 16, 10, 14),
(72, 18, 11, 14),
(73, 18, 12, 14),
(74, 5, 3, 17),
(75, 8, 7, 17),
(76, 8, 2, 17),
(77, 7, 6, 17),
(78, 5, 8, 17),
(79, 6, 5, 17),
(80, 7, 9, 17),
(81, 5, 10, 17),
(82, 9, 11, 17),
(83, 10, 12, 17),
(84, 40, 5, 18),
(85, 40, 2, 18),
(86, 40, 6, 18),
(87, 40, 3, 18),
(88, 40, 7, 18),
(89, 40, 8, 18),
(90, 40, 9, 18),
(91, 40, 10, 18),
(92, 40, 11, 18),
(93, 40, 12, 18),
(94, 44, 6, 19),
(95, 34, 8, 19),
(96, 45, 5, 19),
(97, 30, 2, 19),
(98, 40, 3, 19),
(99, 49, 7, 19),
(100, 38, 9, 19),
(101, 39, 10, 19),
(102, 37, 11, 19),
(103, 38, 12, 19),
(104, 6, 5, 20),
(105, 5, 6, 20),
(106, 8, 7, 20),
(107, 7, 3, 20),
(108, 7, 8, 20),
(109, 8, 2, 20),
(110, 8, 9, 20),
(111, 9, 10, 20),
(112, 9, 11, 20),
(113, 7, 12, 20),
(114, 9, 5, 21),
(115, 9, 7, 21),
(116, 9, 2, 21),
(117, 9, 3, 21),
(118, 9, 6, 21),
(119, 9, 8, 21),
(120, 9, 9, 21),
(121, 9, 10, 21),
(122, 9, 11, 21),
(123, 9, 12, 21),
(124, 43, 5, 22),
(125, 41, 2, 22),
(126, 43, 6, 22),
(127, 44, 7, 22),
(128, 46, 3, 22),
(129, 47, 8, 22),
(130, 48, 9, 22),
(131, 42, 10, 22),
(132, 11, 11, 22),
(133, 22, 12, 22),
(134, 7, 8, 23),
(135, 8, 3, 23),
(136, 9, 5, 23),
(137, 9, 2, 23),
(138, 8, 6, 23),
(139, 9, 7, 23),
(140, 7, 9, 23),
(141, 8, 10, 23),
(142, 6, 11, 23),
(143, 9, 12, 23),
(144, 33, 8, 24),
(145, 47, 6, 24),
(146, 49, 3, 24),
(147, 48, 5, 24),
(148, 44, 7, 24),
(149, 49, 2, 24),
(150, 34, 9, 24),
(151, 38, 10, 24),
(152, 34, 11, 24),
(153, 32, 12, 24),
(154, 50, 5, 25),
(155, 49, 2, 25),
(156, 32, 6, 25),
(157, 49, 3, 25),
(158, 34, 8, 25),
(159, 43, 7, 25),
(160, 38, 10, 25),
(161, 36, 9, 25),
(162, 35, 11, 25),
(163, 35, 12, 25),
(164, 35, 6, 26),
(165, 49, 3, 26),
(166, 42, 5, 26),
(167, 50, 2, 26),
(168, 38, 7, 26),
(169, 39, 8, 26),
(170, 40, 9, 26),
(171, 41, 10, 26),
(172, 33, 12, 26),
(173, 42, 11, 26);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `UserAccountID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `IsFirstLogin` tinyint(1) NOT NULL DEFAULT '1',
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`UserAccountID`, `Firstname`, `Middlename`, `Lastname`, `Email`, `Username`, `Password`, `RoleID`, `IsFirstLogin`, `IsDeleted`) VALUES
(1, 'Marc', 'Opiasa', 'Suarez', 'sadfsda@gmail.com', 'Wake123', 'Wake123', 1, 0, 0),
(2, 'Jake', 'Suarez', 'Quenca', 'jake@gmail.com', 'jake123', 'jakejake', 2, 0, 0),
(3, 'Marc', 'Sdfsf', 'Suarez', 'marc@gmail.com', 'marc123', 'marc123', 2, 1, 1),
(5, 'Liza', 'Hope', 'Soberano', 'liza@gmail.com', 'liza123', '123123123', 2, 0, 0),
(6, 'Angelbert', 'Example', 'Maghanoy', 'maghanoy@gmail.com', 'maghanoy123', 'jr09058456538', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `UserLogID` int(11) NOT NULL,
  `Action` varchar(50) NOT NULL,
  `DateAndTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserAccountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`UserLogID`, `Action`, `DateAndTime`, `UserAccountID`) VALUES
(6, 'Login', '2018-10-21 10:55:43', 2),
(7, 'Logout', '2018-10-21 10:57:49', 2),
(8, 'Login', '2018-10-21 10:57:59', 1),
(9, 'Logout', '2018-10-21 11:17:36', 1),
(10, 'Login', '2018-10-21 11:17:45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `TeacherID` (`UserID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`ScoreID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `studentscore`
--
ALTER TABLE `studentscore`
  ADD PRIMARY KEY (`StudentScoreID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `ScoreID` (`ScoreID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`UserAccountID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`UserLogID`),
  ADD KEY `UserAccountID` (`UserAccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `ScoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `studentscore`
--
ALTER TABLE `studentscore`
  MODIFY `StudentScoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `UserAccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `UserLogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `useraccount` (`UserAccountID`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`);

--
-- Constraints for table `studentscore`
--
ALTER TABLE `studentscore`
  ADD CONSTRAINT `studentscore_ibfk_1` FOREIGN KEY (`ScoreID`) REFERENCES `score` (`ScoreID`),
  ADD CONSTRAINT `studentscore_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`);

--
-- Constraints for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD CONSTRAINT `useraccount_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);

--
-- Constraints for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD CONSTRAINT `userlogs_ibfk_1` FOREIGN KEY (`UserAccountID`) REFERENCES `useraccount` (`UserAccountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
