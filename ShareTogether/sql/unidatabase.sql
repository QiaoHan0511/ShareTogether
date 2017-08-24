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
-- Database: `utemdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecID` varchar(15) NOT NULL,
  `lecName` varchar(50) NOT NULL,
  `lecFaculty` varchar(10) NOT NULL,
  `lecUni` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecID`, `lecName`, `lecFaculty`, `lecUni`) VALUES
('T031410123', 'LAU JUN NING', 'FPTT', 'UTeM'),
('T031410022', 'WONG ZHIE PIENG', 'FPTT', 'UTeM'),
('T031410149', 'Lee Li Teng', 'FKEKK', 'UTHM'),
('T031410129', 'Leong Wai Ken', 'FKE', 'UMP'),
('T031410133', 'Zamri bin Shafiq', 'FTMK', 'UMP'),
('T031410563', 'Nana binti Ahmad', 'FTKK', 'UMK'),
('T031410555', 'Hafiq bin Ramlee', 'FKE', 'UTHM'),
('T031410520', 'Atika binti Amir', 'FKTR', 'UMP'),
('T031410111', 'Shifa binti Arif', 'FTMK', 'UMP'),
('T031410222', 'Taruh bin Nana', 'FKEKK', 'UTeM'),
('T051014203', 'Shamimi binti Shafiq', 'FKMM', 'UTHM'),
('T061210332', 'Logindrah a/l Rajaumi', 'FPKT', 'UMP'),
('T030610879', 'Zulkiflee bin Halim', 'FPK', 'UMP'),
('T036310222', 'Shami bin Sharil', 'FDTP', 'UTeM');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sID` varchar(15) NOT NULL,
  `sName` varchar(50) NOT NULL,
  `sFaculty` varchar(10) NOT NULL,
  `sUni` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sID`, `sName`, `sFaculty`, `sUni`) VALUES
('B031410119', 'HO HOCK WAH', 'FTMK', 'UTeM'),
('B031410116', 'LAI QIAO HAN', 'FTMK', 'UTeM'),
('B031410172', 'WAN ZHI YAN', 'FTMK', 'UTeM'),
('B031410129', 'Shafiq bin Roslee', 'FTMK', 'UTeM'),
('B031410365', 'Sharul bin Amir', 'FKET', 'UMP'),
('B031410593', 'Teh Hon Chi', 'FKRP', 'UMP'),
('B031410255', 'Shafiqah bin Rosli', 'FPTT', 'UMK'),
('B031410155', 'Norsiti bin Ramli', 'FKEKK', 'UTHM'),
('B031410699', 'Amir Bin Sharil', 'FTTK', 'UTHM'),
('B031510500', 'Safwan bin Rosli', 'FTPP', 'UTeM'),
('B031410502', 'Thanish a/l Vanish', 'FKP', 'UTeM'),
('B031610200', 'Lim Mei Chee', 'FKMM', 'UMP'),
('B031610300', 'Ramli bin Mozak', 'FUPI', 'UMK'),
('B031610367', 'Lau Jun Sah', 'FEDE', 'UMK'),
('B031810230', 'Shifa binti Ahmad', 'FTUP', 'UTHM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
