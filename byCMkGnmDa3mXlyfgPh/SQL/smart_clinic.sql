-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 05:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `clinicID` varchar(15) NOT NULL,
  `clinicName` varchar(80) NOT NULL,
  `abbr` varchar(6) NOT NULL,
  `salesTaxR` varchar(200) NOT NULL,
  `GSTRegister` varchar(200) NOT NULL,
  `BankAccount` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`clinicID`, `clinicName`, `abbr`, `salesTaxR`, `GSTRegister`, `BankAccount`, `Address`) VALUES
('UIKL297', '55494b4c205075736174', '55494b', '48484a553838393839', '48484a4738383845524453', '39373233363430323833373032383337', '4920646f6e26233033393b74206b6e6f7720'),
('UTMC003', '55544d20436c696e6963', '55544d', '4a4a4839383837', '4248393938', '3737383334373536', '55544d2c4a42');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorID` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorID`, `name`, `username`, `password`) VALUES
('DID0001', 'DR SHAH', 'ausdans', 'usdna'),
('DID0002', 'Dr Mrida', 'asjdasd', 'sada');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` varchar(15) NOT NULL,
  `title` varchar(5) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `mobileNumber` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthDate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `encryptionKey` varchar(500) NOT NULL,
  `clinicID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `title`, `firstName`, `lastName`, `mobileNumber`, `email`, `gender`, `birthDate`, `username`, `password`, `encryptionKey`, `clinicID`) VALUES
('55494b20ST40205', '4d72', '5261716962756c', '49736c616d', '30313833323430333430', '7261716962756c40676d61696c2e636f6d', '4d616c65', '0000-00-00', '7261716962', 'e894af7909e59b8c8243760a3061d5378054b576eea8963ad813a238b7fe37bf', 'JkRyc2ExXlZsflpjfkxbW2ExPGt3JkIucmAnc1dzWFRkMC5JYlxSNXlmbS8pQ3VsNT81Vk0+a3RMdWA7Sk9Fb1hAXDZnYVx2PlgsNitSKmpVZUl0Zl85RSJMKHA4V1lqUWcjTix9a2tMTnF9R1AkaCF6TE9ud05UNTU+cVFGWz0=', 'UIKL297'),
('UIK20ST196419', '4d72', '4d6f68616d6d6164', '4661686164', '303939383930', '756e756e616440676d61696c2e636f6d', '4d616c65', '0000-00-00', '79656173696e6d6961', 'f004a04da1dba354fc086ef8d49fa8021c0746b73f5cc34371abd03116da9fe2', 'czFaczpVa2lxRyZWT2AnZlVOVmtRaXU5ZHtVR09NQGZVbmJBLzM3SDMuU34rWSNON3VYblROM0hCbkgiJGExeCJdbmtmdVsxUzMvKj91YFFQR3ovKHRCM2NqI2hpWV54Ni5wZ0gmOWQiUDd1NkRFMlsrPVEqMXNvYFQhKnJvZXk=', 'UIKL297'),
('UTM20ST873194', '4d72', '4d6f68616d6d61642059656173696e', '4661686164', '30313833323430333430', '70686f6e6540676d61696c2e636f6d', '4d616c65', '0000-00-00', '79656173696e', '8843028fefce50a6de50acdf064ded274cbf4db0b1314876096c44588a66a12d', 'fjhRZnltSm8hcUY5dTklJ2p9ZUNOLHtjPUlDdm98X19cIU81SVMnVGUpJyMtWnVsVTlYPE9kKGIoIUg6YFRsR15YIWF1b24ocH5ZRFxkcUQpJjY4PG9RW0lgdTtVQndQSCZVUUZzOCEkZCtVRm1FS3dhdSUqLyl4UzI6OS58MG8=', 'UTMC003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`clinicID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `clinicID` (`clinicID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinics` (`clinicID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
