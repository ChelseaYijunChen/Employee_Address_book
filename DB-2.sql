-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2017 at 10:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Company_TBL`
--

CREATE TABLE `Company_TBL` (
  `C_Id` int(11) NOT NULL,
  `C_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Company_TBL`
--

INSERT INTO `Company_TBL` (`C_Id`, `C_Name`) VALUES
(1, 'Google'),
(2, 'Amazon'),
(3, 'Walmart'),
(4, 'Facebook'),
(6, 'Airbnb'),
(7, 'Uber'),
(8, 'Clemson University'),
(9, 'NYU'),
(10, 'Yahoo');

-- --------------------------------------------------------

--
-- Table structure for table `Com_Emp_TBL`
--

CREATE TABLE `Com_Emp_TBL` (
  `Id` int(11) NOT NULL,
  `C_Id` int(11) NOT NULL,
  `E_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Com_Emp_TBL`
--

INSERT INTO `Com_Emp_TBL` (`Id`, `C_Id`, `E_Id`) VALUES
(2, 1, 8),
(4, 1, 5),
(5, 1, 9),
(7, 3, 11),
(8, 4, 12),
(9, 9, 2),
(10, 10, 3),
(11, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Employee_TBL`
--

CREATE TABLE `Employee_TBL` (
  `E_Id` int(11) NOT NULL,
  `E_FirstName` varchar(20) NOT NULL,
  `E_LastName` varchar(20) NOT NULL,
  `E_Address` text NOT NULL,
  `E_Email` varchar(40) NOT NULL,
  `E_Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee_TBL`
--

INSERT INTO `Employee_TBL` (`E_Id`, `E_FirstName`, `E_LastName`, `E_Address`, `E_Email`, `E_Phone`) VALUES
(2, 'Yijun', 'Chen', '1840 Wessel Ct', 'yijunnchen@gmail.com', '864-349-3262'),
(3, 'wenjun', 'We', '18999 Main Streent, Central', 'wenjun@gmail.com', '864-349-3262'),
(5, 'Ivan', 'Huang', '866 Issaqueena Trl,Clemson', 'Ivan@gmail.com', '822-123-9080'),
(6, 'YY', 'CC', '888 Main Street, Chicago', 'yi@gmail.com', '875-493-0021'),
(8, 'cc', 'yy', '866 Issaqueena, SC', 'y@gmail.com', '630-902-1234'),
(9, 'Yijun', 'Chen', '1840 Wessel Ct, St Charles, Chicago, IL', 'yijunnchen@gmail.com', '8643493262'),
(11, 'Joey', 'Joey', '1840 Wessel Ct ', 'joey@gmail.com', '864-349-3262'),
(12, 'Jane', 'Dong', '123 Main Street', 'Jane@gmail.com', '864-349-3999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Company_TBL`
--
ALTER TABLE `Company_TBL`
  ADD PRIMARY KEY (`C_Id`);

--
-- Indexes for table `Com_Emp_TBL`
--
ALTER TABLE `Com_Emp_TBL`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `E_Id` (`E_Id`),
  ADD KEY `C_Id` (`C_Id`);

--
-- Indexes for table `Employee_TBL`
--
ALTER TABLE `Employee_TBL`
  ADD PRIMARY KEY (`E_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Company_TBL`
--
ALTER TABLE `Company_TBL`
  MODIFY `C_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Com_Emp_TBL`
--
ALTER TABLE `Com_Emp_TBL`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Employee_TBL`
--
ALTER TABLE `Employee_TBL`
  MODIFY `E_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Com_Emp_TBL`
--
ALTER TABLE `Com_Emp_TBL`
  ADD CONSTRAINT `com_emp_tbl_ibfk_1` FOREIGN KEY (`E_Id`) REFERENCES `Employee_TBL` (`E_Id`),
  ADD CONSTRAINT `com_emp_tbl_ibfk_2` FOREIGN KEY (`C_Id`) REFERENCES `Company_TBL` (`C_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
