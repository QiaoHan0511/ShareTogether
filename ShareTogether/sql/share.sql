-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 07:15 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `share`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `fileID` int(11) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `fileName` varchar(60) NOT NULL,
  `filePath` varchar(300) NOT NULL,
  `fileDesc` varchar(300) NOT NULL,
  `fileConfirm` enum('0','1','2') NOT NULL,
  `dateTime` timestamp NOT NULL,
  `userGroupID` int(11) NOT NULL,
  `approveDate` timestamp NULL DEFAULT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `fileView` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`fileID`, `fname`, `fileName`, `filePath`, `fileDesc`, `fileConfirm`, `dateTime`, `userGroupID`, `approveDate`, `remark`, `fileView`) VALUES
(85, '676431489265Resume Lai Chiau Yi 2016.docx', 'Sample Resume', './uploads/676431489265Resume Lai Chiau Yi 2016.docx', 'Sample resume from website', '1', '2017-08-17 18:03:35', 132, '2017-08-17 18:26:11', NULL, '1'),
(86, '642456L9 - IP.ppt', 'Exam Slide', './uploads/642456L9 - IP.ppt', 'Tips exam database', '2', '2017-08-17 18:56:15', 132, '2017-08-17 18:40:23', 'not related', '1'),
(87, '271033BITS.xls', 'Name list', './uploads/271033BITS.xls', 'BITS name list', '1', '2017-08-17 18:11:29', 132, '2017-08-17 18:36:28', NULL, '1'),
(88, '843118earth.gif', 'Earth', './uploads/843118earth.gif', 'gif for fun', '2', '2017-08-17 18:15:01', 132, '2017-08-17 18:21:52', 'not related', '1'),
(89, '778560MOCK interview student list 060317v1.xlsx', 'MOCK interview list', './uploads/778560MOCK interview student list 060317v1.xlsx', 'MOCK interview student list 2017', '1', '2017-08-17 18:19:25', 135, '2017-08-17 19:13:07', NULL, '1'),
(90, '409797ftmkmainlogo-1.png', 'ftmk logo', './uploads/409797ftmkmainlogo-1.png', 'utem ftmk logo png file type', '2', '2017-08-17 18:23:19', 137, '2017-08-17 18:25:24', 'not related', '1'),
(91, '760035588113109903_Intro_1.pptx', 'Inroduction to HE', './uploads/760035588113109903_Intro_1.pptx', 'Hubungan etnik  pptx file', '2', '2017-08-17 18:27:44', 132, '2017-08-17 18:28:32', 'not related', '1'),
(92, '643997poster_B031410116.pdf', 'Best Poster', './uploads/643997poster_B031410116.pdf', 'Best poster for bengkel1 year 2017', '0', '2017-08-17 19:06:42', 133, NULL, NULL, '0'),
(93, '369848lightbulb.jpg', 'Exam tips', './uploads/369848lightbulb.jpg', 'final exam tips hubungan etnik 2017', '1', '2017-08-17 19:12:45', 138, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ID` int(11) NOT NULL,
  `groupName` varchar(60) NOT NULL,
  `groupStatus` enum('0','1') NOT NULL,
  `groupKey` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `groupName`, `groupStatus`, `groupKey`) VALUES
(62, '3 BITS 2017', '0', '2017'),
(63, 'Sejarah', '1', ''),
(64, 'Bengkel 1', '1', ''),
(65, 'Badminton', '1', ''),
(66, 'Database Design', '1', ''),
(68, 'Geography', '1', ''),
(69, 'Hubungan Etnik', '1', ''),
(70, 'Titas UMP', '0', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `groups_user`
--

CREATE TABLE `groups_user` (
  `userGroupID` int(11) NOT NULL,
  `userID` varchar(15) NOT NULL,
  `groupID` int(11) NOT NULL,
  `groupPosition` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_user`
--

INSERT INTO `groups_user` (`userGroupID`, `userID`, `groupID`, `groupPosition`) VALUES
(115, 'B031410116', 62, 'ADMIN'),
(116, 'B031410699', 63, 'ADMIN'),
(117, 'T031410520', 64, 'ADMIN'),
(118, 'T031410520', 63, 'MEMBER'),
(119, 'B031410155', 65, 'ADMIN'),
(120, 'B031410155', 63, 'MEMBER'),
(122, 'B031410155', 62, 'MEMBER'),
(123, 'T036310222', 65, 'MEMBER'),
(125, 'T031410149', 63, 'MEMBER'),
(126, 'T031410149', 62, 'MEMBER'),
(127, 'T031410149', 66, 'ADMIN'),
(129, 'T031410149', 68, 'ADMIN'),
(130, 'T031410149', 65, 'MEMBER'),
(131, 'T031410133', 65, 'MEMBER'),
(132, 'T031410133', 62, 'MEMBER'),
(133, 'B031410116', 64, 'MEMBER'),
(134, 'B031410119', 65, 'MEMBER'),
(135, 'B031410119', 62, 'MEMBER'),
(136, 'B031410119', 63, 'MEMBER'),
(137, 'B031410116', 65, 'MEMBER'),
(138, 'B031410116', 69, 'ADMIN'),
(139, 'T031410133', 70, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(15) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `position` varchar(15) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `activated` enum('0','1') NOT NULL DEFAULT '0',
  `confirmCode` varchar(15) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `picPath` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullName`, `position`, `faculty`, `activated`, `confirmCode`, `userEmail`, `university`, `picPath`) VALUES
('B031410116', 'LAI QIAO HAN', 'Student', 'FTMK', '1', '0', 'qiaohan0311@gmail.com', 'UTeM', './images/665159178399123.png'),
('B031410119', 'HO HOCK WAH', 'Student', 'FTMK', '1', '0', 'wah119@gmail.com', 'UTeM', './images/profileIcon.png'),
('B031410155', 'Norsiti bin Ramli', 'Student', 'FKEKK', '1', '0', 'siti123@gmail.com', 'UTHM', './images/70880256387214269_841982915826174_3599000810471218427_n.jpg'),
('B031410172', 'WAN ZHI YAN', 'Student', 'FTMK', '1', '0', 'zhiyan172@gmail.com', 'UTeM', './images/profileIcon.png'),
('B031410365', 'Sharul bin Amir', 'Student', 'FKET', '1', '0', 'sharul123@gmail.com', 'UMP', './images/profileIcon.png'),
('B031410502', 'Thanish a/l Vanish', 'Student', 'FKP', '1', '0', 'thanish123@gmail.com', 'UTeM', './images/profileIcon.png'),
('B031410699', 'Amir Bin Sharil', 'Student', 'FTTK', '1', '0', 'amir123@gmail.com', 'UTHM', './images/profileIcon.png'),
('B031510500', 'Safwan bin Rosli', 'Student', 'FTPP', '0', '302815', 'tshirtgalaxy2017@gmail.com', 'UTeM', './images/profileIcon.png'),
('B031610200', 'Lim Mei Chee', 'Student', 'FKMM', '1', '0', 'meichee123@gmail.com', 'UMP', './images/profileIcon.png'),
('T031410111', 'Shifa binti Arif', 'Lecturer', 'FTMK', '1', '0', 'shifa789@gmail.com', 'UMP', './images/profileIcon.png'),
('T031410133', 'Zamri bin Shafiq', 'Lecturer', 'FTMK', '1', '0', 'zamri789@gmail.com', 'UMP', './images/11344756387214269_841982915826174_3599000810471218427_n.jpg'),
('T031410149', 'Lee Li Teng', 'Lecturer', 'FKEKK', '1', '0', 'liteng789@gmail.com', 'UTHM', './images/profileIcon.png'),
('T031410520', 'Atika binti Amir', 'Lecturer', 'FKTR', '1', '0', 'atika789@gmail.com', 'UMP', './images/profileIcon.png'),
('T031410555', 'Hafiq bin Ramlee', 'Lecturer', 'FKE', '1', '0', 'hafiq789@gmail.com', 'UTHM', './images/profileIcon.png'),
('T036310222', 'Shami bin Sharil', 'Lecturer', 'FDTP', '1', '0', 'shami789@gmail.com', 'UTeM', './images/894631appLogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`userEmail`, `userPassword`) VALUES
('amir123@gmail.com', '123456'),
('atika789@gmail.com', '123456'),
('hafiq789@gmail.com', '123456'),
('liteng789@gmail.com', '123456'),
('meichee123@gmail.com', '123456'),
('qiaohan0311@gmail.com', '123456'),
('shami789@gmail.com', '123456'),
('sharul123@gmail.com', '123456'),
('shifa789@gmail.com', '123456'),
('siti123@gmail.com', '123456'),
('thanish123@gmail.com', '123456'),
('tshirtgalaxy2017@gmail.com', '123456'),
('wah119@gmail.com', '123456'),
('zamri789@gmail.com', '123456'),
('zhiyan172@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `userGroupID` (`userGroupID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `groupName` (`groupName`);

--
-- Indexes for table `groups_user`
--
ALTER TABLE `groups_user`
  ADD PRIMARY KEY (`userGroupID`),
  ADD KEY `userID` (`userID`,`groupID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`),
  ADD KEY `userEmail_2` (`userEmail`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `groups_user`
--
ALTER TABLE `groups_user`
  MODIFY `userGroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`userGroupID`) REFERENCES `groups_user` (`userGroupID`);

--
-- Constraints for table `groups_user`
--
ALTER TABLE `groups_user`
  ADD CONSTRAINT `groups_user_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`ID`),
  ADD CONSTRAINT `groups_user_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userEmail`) REFERENCES `user_login` (`userEmail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
