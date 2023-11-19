-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 03:13 AM
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
-- Database: `cemeterymappingdb`
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
(1, '2018', 1, 22, 'PEOPLEID', 0);

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
(10, 'B', 0),
(12, 'A', 0),
(13, 'C', 0),
(14, 'D', 0),
(15, 'H', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpeople`
--

CREATE TABLE `tblpeople` (
  `PEOPLEID` int(11) NOT NULL,
  `GRAVENO` int(11) NOT NULL,
  `FNAME` varchar(90) NOT NULL,
  `BORNDATE` varchar(30) NOT NULL,
  `DIEDDATE` varchar(30) NOT NULL,
  `CATEGORIES` varchar(30) NOT NULL,
  `LOCATION` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpeople`
--

INSERT INTO `tblpeople` (`PEOPLEID`, `GRAVENO`, `FNAME`, `BORNDATE`, `DIEDDATE`, `CATEGORIES`, `LOCATION`) VALUES
(201815, 908, 'Jennifer Camacho', '12/31/2045', '02/03/2049', 'None', 'SANGI'),
(201816, 882, 'Cadman Ayala', '12/11/2000', '05/13/2003', 'C', 'DUMLOG'),
(201817, 477, 'Lenore Hopkins', '07-Feb-1995', '07-Aug-1978', 'D', 'SANGI'),
(201818, 684, 'Freya Charles', '31-Jan-2001', '17-Jan-1972', 'A', 'None'),
(201819, 833, 'Jonah Lara', '27-Dec-2014', '14-Nov-2022', 'C', 'LURAY'),
(201820, 197, 'Davis Mcclain', '24-Jun-2004', '21-Sep-1997', 'None', 'DUMLOG'),
(201821, 499, 'Chaim Pruitt', '08-Jan-2011', '27-Jun-1970', 'C', 'SANGI');

-- --------------------------------------------------------

--
-- Table structure for table `tblreports`
--

CREATE TABLE `tblreports` (
  `id` int(11) NOT NULL,
  `issue` text NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreports`
--

INSERT INTO `tblreports` (`id`, `issue`, `report_type`, `created`) VALUES
(1, 'Commodi laboris cill', 'suggestion', '2023-11-19 10:09:08'),
(2, 'Dolore culpa amet ', 'bug', '2023-11-19 10:12:38'),
(3, 'Neque minus exercita', 'suggestion', '2023-11-19 10:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `ID` int(11) NOT NULL,
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
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', ''),
(139, 'Joseph Maldonado', 'zisipimiwy', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'User', ''),
(140, 'Hector Hubbard', 'liwipu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'User', ''),
(141, 'Gage Marshall', 'qufutu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'User', ''),
(142, 'Judah Booker', 'desuhu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'User', ''),
(143, 'Quamar Rodriquez', 'aynjel', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'User', '');

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
-- Indexes for table `tblreports`
--
ALTER TABLE `tblreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `CATEGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblpeople`
--
ALTER TABLE `tblpeople`
  MODIFY `PEOPLEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201822;

--
-- AUTO_INCREMENT for table `tblreports`
--
ALTER TABLE `tblreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
