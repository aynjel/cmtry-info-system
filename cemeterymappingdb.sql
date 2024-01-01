-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 07:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cemeterymappingdb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE `tblautonumber` (
  `ID` int(11) NOT NULL,
  `AUTOSTART` varchar(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOKEY` varchar(12) NOT NULL,
  `AUTONUM` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`ID`, `AUTOSTART`, `AUTOINC`, `AUTOEND`, `AUTOKEY`, `AUTONUM`) VALUES
(1, '2018', 1, 19, 'PEOPLEID', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL,
  `CATEGORIES` varchar(255) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGID`, `CATEGORIES`, `USERID`) VALUES
(10, '1', 0),
(13, '3', 0),
(16, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpeople`
--

CREATE TABLE `tblpeople` (
  `PEOPLEID` int(11) NOT NULL,
  `FNAME` varchar(100) NOT NULL,
  `GRAVENO` int(11) NOT NULL,
  `BORNDATE` date NOT NULL,
  `DIEDDATE` date NOT NULL,
  `CATEGORIES` enum('1','2','3') NOT NULL,
  `LOCATION` enum('Poog','Luray','Dumlog','Canlumampao','Ibo','Carmen','Sangi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tblpeople`
--

INSERT INTO `tblpeople` (`PEOPLEID`, `FNAME`, `GRAVENO`, `BORNDATE`, `DIEDDATE`, `CATEGORIES`, `LOCATION`) VALUES
(9893, 'John Doe', 2, '2015-12-03', '2020-12-17', '1', 'Ibo'),
(9894, 'Jane Doe', 7, '2014-12-11', '2020-12-31', '1', 'Carmen'),
(9895, 'Kylynn Campbell', 51, '1970-09-04', '2006-01-18', '1', 'Carmen'),
(9896, 'Colt Weiss', 84, '2009-04-05', '2013-08-07', '1', 'Luray'),
(9897, 'Daphne Parsons', 268, '1976-09-08', '2002-11-23', '3', 'Canlumampao'),
(201813, 'Cally Joseph', 300, '2020-11-15', '2017-05-29', '3', 'Canlumampao');

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `id` int(11) NOT NULL,
  `issue` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`id`, `issue`, `user_id`, `report_type`, `status`, `created_at`) VALUES
(4, 'TEST', 129, 'Fraud', 'Declined', '2023-12-30 23:41:40'),
(5, 'Nihil earum et offic', 129, 'Management', 'Pending', '2023-12-31 12:11:56'),
(6, 'Culpa ea numquam nes', 129, 'Harrassment', 'Pending', '2024-01-01 09:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserve`
--

CREATE TABLE `tblreserve` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `graveno` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreserve`
--

INSERT INTO `tblreserve` (`id`, `user_id`, `graveno`, `block`, `location`, `status`, `email`, `mobile_number`, `created_at`) VALUES
(1, 129, 7, 1, 'Sangi', 'Approved', 'samepl2@gmail.com', '789564321', '2023-12-09 17:04:49'),
(2, 129, 51, 1, 'Carmen', 'Approved', 'sample@gmail.com', '123456789', '2023-12-09 17:05:05'),
(3, 129, 2, 1, 'Dumlog', 'Approved', 'juzoqa@mailinator.com', '184', '2023-12-09 20:40:23'),
(4, 129, 84, 1, 'Luray', 'Declined', 'lelahyfe@mailinator.com', '193', '2023-12-09 20:40:31'),
(9, 129, 300, 3, 'Canlumampao', 'Pending', 'mocepak@mailinator.com', '920', '2024-01-01 09:57:39'),
(10, 129, 268, 3, 'Sangi', 'Pending', 'bova@mailinator.com', '763', '2024-01-01 09:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `id` int(11) NOT NULL,
  `TRANSTATUS` text NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL,
  `U_NAME` varchar(122) NOT NULL,
  `U_USERNAME` varchar(122) NOT NULL,
  `U_PASS` varchar(122) NOT NULL,
  `U_ROLE` varchar(30) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`USERID`, `U_NAME`, `U_USERNAME`, `U_PASS`, `U_ROLE`, `USERIMAGE`) VALUES
(126, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/10329236_874204835938922_6636897990257224477_n.jpg'),
(129, 'User Test', 'user', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 'User', ''),
(130, 'Staff Test', 'staff', '5d43e3169f06cf2a04a0ee870b5ac2aff3c558ff', 'Staff', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGID`);

--
-- Indexes for table `tblpeople`
--
ALTER TABLE `tblpeople`
  ADD PRIMARY KEY (`PEOPLEID`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreserve`
--
ALTER TABLE `tblreserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblpeople`
--
ALTER TABLE `tblpeople`
  MODIFY `PEOPLEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201819;

--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblreserve`
--
ALTER TABLE `tblreserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
