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
-- Database: `uikl297`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountCode` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountCode`, `name`) VALUES
('AC038', '456c6563747269636974792042696c6c73'),
('AC051', '57617465722042696c6c73'),
('AC060', '50756d706265722042696c6c'),
('AC78', '496e7465726e65742042696c6c'),
('AC921', '456d706c6f7965652042696c6c73');

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `allergy` (
  `allergyID` int(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allergy`
--

INSERT INTO `allergy` (`allergyID`, `name`) VALUES
(1, '416c6c657279672041'),
(2, '4169647561'),
(3, '496e76616c6964'),
(4, '436f726f6e61'),
(6, '44444444');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `patientID` varchar(12) NOT NULL,
  `doctorID` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `date`, `time`, `status`, `patientID`, `doctorID`) VALUES
('A040833896', '2020-08-04', '11:28', '436f6d706c65746564', 'PID2092101', 'UIK20DR82305'),
('A040836095', '2020-08-04', '11:23', '43616e63656c6c6564', 'PID2028192', 'UIK20DR82305'),
('A040839645', '2020-08-04', '11:39', '436f6d706c65746564', 'PID2066718', 'UIK20DR42473'),
('A040840222', '2020-08-04', '10:38', '43616e63656c6c6564', 'PID2028192', 'UIK20DR42473'),
('A040897121', '2020-08-04', '10:23', '436f6d706c65746564', 'PID2048888', 'UIK20DR42473'),
('A110829071', '2020-08-11', '09:57', '43616e63656c6c6564', 'PID2048888', 'UIK20DR42473'),
('A110840989', '2020-07-11', '10:39', '4177616974696e67', 'PID2048888', 'UIK20DR42473'),
('A110855321', '2020-04-11', '10:40', '4177616974696e67', 'PID2092101', 'UIK20DR43133'),
('A110866154', '2020-07-11', '10:40', '436f6d706c65746564', 'PID2048888', 'UIK20DR43133'),
('A110874368', '2020-08-11', '10:06', '4177616974696e67', 'PID2048888', 'UIK20DR43133'),
('A110881107', '2020-08-11', '09:58', '4177616974696e67', 'PID2048888', 'UIK20DR42473'),
('A130850260', '2020-08-13', '00:47', '4177616974696e67', 'PID2092101', 'UIK20DR82305'),
('A130860133', '2020-08-13', '11:47', '4177616974696e67', 'PID2048888', 'UIK20DR42473'),
('A140893637', '2020-08-14', '09:13', '4177616974696e67', 'PID2092101', 'UIK20DR82305'),
('A140899425', '2020-08-14', '09:13', '4177616974696e67', 'PID2028192', 'UIK20DR42473'),
('UIK42871', '2020-06-09', '00:09', '4177616974696e67', 'PID2028192', 'UIK20DR42473'),
('UIK65936', '2020-06-15', '09:19', '4177616974', 'PID2066718', 'UIK20DR42473'),
('UIK92338', '2020-05-20', '08:09', '4177616974', 'PID2066718', 'UIK20DR42473'),
('UIK93303', '2020-06-10', '10:09', '4177616974', 'PID2092101', 'UIK20DR43133'),
('UIK97978', '2019-06-19', '11:10', '4177616974', 'PID2048888', 'UIK20DR42473');

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `backupID` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billingID` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `consultation` float NOT NULL,
  `treatment` float NOT NULL,
  `medication` float NOT NULL,
  `discount` float NOT NULL,
  `totalAmount` float NOT NULL,
  `receiptNo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billingID`, `date`, `time`, `status`, `consultation`, `treatment`, `medication`, `discount`, `totalAmount`, `receiptNo`) VALUES
('B10687', '2020-06-07', '10:12:56', '556e2d50616964', 90, 80, 6.39, 8, 162.28, 'R61628'),
('B14233', '2020-06-08', '02:28:28', '556e2d50616964', 89, 89, 9.29, 10, 168.56, 'R18765'),
('B20340', '2020-06-07', '00:00:00', '50616964', 98, 180, 6.39, 8, 261.64, 'R61628'),
('B32054', '2020-06-08', '02:28:57', '556e2d50616964', 10, 15, 6.39, 2, 30.76, 'R61628'),
('B61925', '2020-06-08', '02:28:28', '556e2d50616964', 89, 89, 9.29, 10, 168.56, 'R18765');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosisID` int(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosisID`, `name`) VALUES
(7, '54797065204e204665766572'),
(8, '414244204361756768'),
(9, '4665766572'),
(10, '444f6e26233033393b74206b6e6f772061637475616c6c79'),
(12, '42424242');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_report`
--

CREATE TABLE `diagnosis_report` (
  `receiptNo` varchar(12) NOT NULL,
  `report` varchar(200) DEFAULT NULL,
  `medicalCost` float DEFAULT NULL,
  `doctorID` varchar(12) NOT NULL,
  `patientID` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis_report`
--

INSERT INTO `diagnosis_report` (`receiptNo`, `report`, `medicalCost`, `doctorID`, `patientID`) VALUES
('R18765', '2e2e2f66696c65732f7265706f7274732f646961676e6f7369735f7265706f72742f446961676e6f73746963205265706f7274202d20504944323034383838382e706466', 9.29, 'UIK20DR42473', 'PID2048888'),
('R21841', '2e2e2f66696c65732f7265706f7274732f646961676e6f7369735f7265706f72742f446961676e6f73746963205265706f7274202d20504944323032383139322e706466', 4.39, 'UIK20DR43133', 'PID2028192'),
('R36343', '2e2e2f66696c65732f7265706f7274732f646961676e6f7369735f7265706f72742f446961676e6f73746963205265706f7274202d20504944323032383139322e706466', 6.39, 'UIK20DR43133', 'PID2028192'),
('R43268', '2e2e2f66696c65732f7265706f7274732f646961676e6f7369735f7265706f72742f446961676e6f73746963205265706f7274202d20504944323039323130312e706466', 2.9, 'UIK20DR82305', 'PID2092101'),
('R61628', '2e2e2f66696c65732f7265706f7274732f646961676e6f7369735f7265706f72742f446961676e6f73746963205265706f7274202d20504944323036363731382e706466', 6.39, 'UIK20DR42473', 'PID2066718'),
('R93702', '2e2e2f66696c65732f7265706f7274732f646961676e6f7369735f7265706f72742f446961676e6f73746963205265706f7274202d20504944323036363731382e706466', 4.79, 'UIK20DR42473', 'PID2066718');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctorID` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nric` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `MMCregNo` varchar(50) NOT NULL,
  `contactNo` varchar(12) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctorID`, `name`, `nric`, `gender`, `MMCregNo`, `contactNo`, `picture`) VALUES
('UIK20DR42473', '4d642054617169', '323031373039494f', '4d616c65', '49494f4939303944', '393930393837', '2e2f696d616765732f646f63746f72732f55494b3230445234323437332e706e67'),
('UIK20DR43133', '4d64204c656f6e67', '3230313730394d3132', '4d616c65', '49494f4939303947', '393930393830', '2e2f696d616765732f646f63746f72732f55494b3230445234333133332e706e67'),
('UIK20DR82305', '4d642059656173696e', '3230313730394d3130', '4d616c65', '49494f4939303945', '393930393938', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `voucherNo` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `ammount` float NOT NULL,
  `particulation` varchar(10) NOT NULL,
  `accountCode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`voucherNo`, `date`, `ammount`, `particulation`, `accountCode`) VALUES
('VN384', '2020-05-19', 23.9, '5665727920', 'AC060'),
('VN401', '2020-05-13', 19.9, '5665727920', 'AC051'),
('VN708', '2020-04-29', 90.11, '4120422043', 'AC060'),
('VN833', '2020-05-04', 989.9, '5665727920', 'AC038');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryID` varchar(12) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiry` date NOT NULL,
  `itemCode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryID`, `quantity`, `expiry`, `itemCode`) VALUES
('UIKIR13', 3433, '2020-05-29', 'MD75842'),
('UIKIR24', 3234, '2020-05-30', 'MD51847'),
('UIKIR35', 313030, '2020-05-30', 'MD36926'),
('UIKIR43', 3230, '2020-05-29', 'MD36926');

-- --------------------------------------------------------

--
-- Table structure for table `medical_certificate`
--

CREATE TABLE `medical_certificate` (
  `receiptNo` varchar(12) NOT NULL,
  `startingDate` date NOT NULL,
  `endingDate` date NOT NULL,
  `reason` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `mhID` int(4) NOT NULL,
  `illness` varchar(50) DEFAULT NULL,
  `smoking` varchar(50) DEFAULT NULL,
  `drinking` varchar(50) DEFAULT NULL,
  `tobacco` varchar(50) DEFAULT NULL,
  `foodAllergies` varchar(50) DEFAULT NULL,
  `drugAllergies` varchar(50) DEFAULT NULL,
  `otherAllergies` varchar(50) DEFAULT NULL,
  `report` varchar(200) DEFAULT NULL,
  `patientID` varchar(12) NOT NULL,
  `doctorID` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`mhID`, `illness`, `smoking`, `drinking`, `tobacco`, `foodAllergies`, `drugAllergies`, `otherAllergies`, `report`, `patientID`, `doctorID`) VALUES
(7, '4469616265746573', '486162697475616c', '486162697475616c', '', '4472756773', '', '', '', 'PID2066718', 'UIK20DR42473'),
(8, '48656172742050617469656e74', '4e65766572', '4e65766572', '', '', '', '', '', 'PID2028192', 'UIK20DR43133'),
(9, '547562657263756c6f736973', '486162697475616c', '486162697475616c', '', '426f696c61', '4b696c6f6e', '', '', 'PID2048888', 'UIK20DR42473'),
(10, '4d69677261696e65', '4f63636174696f6e616c', '4f63636174696f6e616c', '', '', '', '', '', 'PID2092101', 'UIK20DR82305');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `itemCode` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`itemCode`, `name`, `barcode`, `price`) VALUES
('MD14277', '44464541', '3233383232315549383839484a32334a4b', 2.9),
('MD36926', '487964726120432b', '3233383932333939383938323332', 1.89),
('MD51847', '50617261636574616d6f6c', '3839333239383337383931383139', 2.5),
('MD75842', '4e617061', '32333839323339383839484a323332', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `monthlyreports`
--

CREATE TABLE `monthlyreports` (
  `reportID` varchar(12) NOT NULL,
  `month` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordereditem`
--

CREATE TABLE `ordereditem` (
  `oiNo` int(12) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `itemCode` varchar(12) NOT NULL,
  `poNo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordereditem`
--

INSERT INTO `ordereditem` (`oiNo`, `quantity`, `price`, `description`, `itemCode`, `poNo`) VALUES
(1, 3839, 90, '717769646a6e696a6e64696e206173', 'MD51847', 'PR71241'),
(2, 313030, 10, '61736462697561736475', 'MD14277', 'PR97290'),
(4, 3130, 10, '617364756969756e61736475', 'MD36926', 'PR17596'),
(5, 313030, 90, '617364756e69756e617573646e', 'MD14277', 'PR17596');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `poNo` varchar(12) NOT NULL,
  `deliveryDate` date NOT NULL,
  `deliveryAddress` varchar(200) NOT NULL,
  `qutotionNo` varchar(12) NOT NULL,
  `paymentTerm` varchar(20) NOT NULL,
  `contactPerson` varchar(20) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `deliveryCharge` float NOT NULL,
  `totalAmmount` float NOT NULL,
  `vendorCode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`poNo`, `deliveryDate`, `deliveryAddress`, `qutotionNo`, `paymentTerm`, `contactPerson`, `contactNo`, `deliveryCharge`, `totalAmmount`, `vendorCode`) VALUES
('PR17596', '2020-06-11', '617364', '6961736264', '697562616973756462', '69756269756273646175', '30393833323430333930', 90, 9190, 'VD72908'),
('PR58403', '2020-05-20', '6473686320696820', '696820647363', '697364686f757762', '6f697562206168736f62', '30313833323430333930', 89, 9269, 'VD50083'),
('PR71241', '2020-05-13', '777169646e', '696e73612064', '696a6e206173696420', '696a206173696420', '30313833323430333930', 90, 8100, 'VD50083'),
('PR97290', '2020-06-18', '616973646e75', '75617375646e', '756e617573646e756e', '756e617573646e6e', '30313833323430333930', 12, 2212, 'VD50083');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patientID` varchar(12) NOT NULL,
  `NRIC` varchar(200) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `race` varchar(2) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `maritalStatus` varchar(15) DEFAULT NULL,
  `mobileNo` varchar(50) DEFAULT NULL,
  `spouseName` varchar(50) DEFAULT NULL,
  `emergencyContact` varchar(50) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientID`, `NRIC`, `dob`, `age`, `name`, `address`, `gender`, `race`, `nationality`, `maritalStatus`, `mobileNo`, `spouseName`, `emergencyContact`, `relationship`, `picture`) VALUES
('PID2028192', '3230313930394d323233', '2020-06-17', 3330, '4d72732052617368696461', '42616e676c6164657368', '46656d616c', '54', '6e6f6e2d4d59', '4d617272696564', '303138393930373337', '446f6e74', '30313938373738333433', '48757362616e64', '2e2e2f66696c65732f70726f66696c655f70696374757265732f70617469656e74732f504944323032383139322e706e67'),
('PID2048888', '3231393830554d3839', '2020-06-09', 3334, '4d6420486173616e', '4b656e7961', '4d616c65', '4f', '6e6f6e2d4d59', '4d617272696564', '30313832333334343332', '4e6f', '30393938393839', '466174686572', '2e2e2f66696c65732f70726f66696c655f70696374757265732f70617469656e74732f504944323034383838382e706e67'),
('PID2066718', '3230313730394d3130333332', '2020-06-09', 3231, '4d6f68616d6d6420497162616c20486f737365696e', '42616e676c6164657368', '4d616c65', '4f', '6e6f6e2d4d59', '53696e676c65', '30313833323430333430', '446f6e26233033393b742068617665', '30313833323430333330', '42726f74686572', '2e2e2f66696c65732f70726f66696c655f70696374757265732f70617469656e74732f504944323036363731382e706e67'),
('PID2092101', '31323334304d383938', '2020-06-17', 3434, '58656f6e672050696e67', '4368696e61', '4d616c65', '43', '6e6f6e2d4d59', '4d617272696564', '30393938393839', '426969616b', '39393039383738', '42726f74686572', '2e2e2f66696c65732f70726f66696c655f70696374757265732f70617469656e74732f504944323039323130312e706e67');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symptomID` int(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symptomID`, `name`) VALUES
(3, '4665766572'),
(4, '4361756768'),
(5, '5061696e20696e2048656164'),
(6, '4f4c4970'),
(8, '41414141');

-- --------------------------------------------------------

--
-- Table structure for table `track_medicine`
--

CREATE TABLE `track_medicine` (
  `id` int(10) NOT NULL,
  `patientID` varchar(12) NOT NULL,
  `itemCode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_medicine`
--

INSERT INTO `track_medicine` (`id`, `patientID`, `itemCode`) VALUES
(1, 'PID2066718', 'MD14277'),
(2, 'PID2066718', 'MD36926');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `ID` int(4) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`ID`, `name`) VALUES
(1, '4d65646963696e652041'),
(2, '4d45646963696e652044'),
(3, '506c61792047616d6573'),
(4, '4c456176652074686520686f73706974616c'),
(6, '43434343');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendorCode` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactedPerson` varchar(50) NOT NULL,
  `contactNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendorCode`, `name`, `address`, `contactedPerson`, `contactNo`) VALUES
('VD50083', '45444720436f6d61706e79', '506574656c696e67204a617961204b4c', '4d642054617169', '30313833323430333930'),
('VD72908', '44464120436f6d61706e79', '53656c616e676f724d616c6179736961', '4c656f6e67', '30393833323430333930');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountCode`);

--
-- Indexes for table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`allergyID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `doctorID` (`doctorID`);

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`backupID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billingID`),
  ADD KEY `receiptNo` (`receiptNo`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosisID`);

--
-- Indexes for table `diagnosis_report`
--
ALTER TABLE `diagnosis_report`
  ADD PRIMARY KEY (`receiptNo`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`voucherNo`),
  ADD KEY `accountCode` (`accountCode`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryID`),
  ADD KEY `itemCode` (`itemCode`);

--
-- Indexes for table `medical_certificate`
--
ALTER TABLE `medical_certificate`
  ADD PRIMARY KEY (`receiptNo`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`mhID`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `doctorID` (`doctorID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`itemCode`);

--
-- Indexes for table `monthlyreports`
--
ALTER TABLE `monthlyreports`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `ordereditem`
--
ALTER TABLE `ordereditem`
  ADD PRIMARY KEY (`oiNo`),
  ADD KEY `itemCode` (`itemCode`),
  ADD KEY `poNo` (`poNo`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`poNo`),
  ADD KEY `vendorCode` (`vendorCode`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptomID`);

--
-- Indexes for table `track_medicine`
--
ALTER TABLE `track_medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemCode` (`itemCode`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendorCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `allergyID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosisID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `mhID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordereditem`
--
ALTER TABLE `ordereditem`
  MODIFY `oiNo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptomID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `track_medicine`
--
ALTER TABLE `track_medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`doctorID`);

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`receiptNo`) REFERENCES `diagnosis_report` (`receiptNo`);

--
-- Constraints for table `diagnosis_report`
--
ALTER TABLE `diagnosis_report`
  ADD CONSTRAINT `diagnosis_report_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`accountCode`) REFERENCES `account` (`accountCode`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`itemCode`) REFERENCES `medicine` (`itemCode`);

--
-- Constraints for table `medical_certificate`
--
ALTER TABLE `medical_certificate`
  ADD CONSTRAINT `medical_certificate_ibfk_1` FOREIGN KEY (`receiptNo`) REFERENCES `diagnosis_report` (`receiptNo`);

--
-- Constraints for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`),
  ADD CONSTRAINT `medical_history_ibfk_2` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`doctorID`);

--
-- Constraints for table `ordereditem`
--
ALTER TABLE `ordereditem`
  ADD CONSTRAINT `ordereditem_ibfk_1` FOREIGN KEY (`itemCode`) REFERENCES `medicine` (`itemCode`),
  ADD CONSTRAINT `ordereditem_ibfk_2` FOREIGN KEY (`poNo`) REFERENCES `orders` (`poNo`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`vendorCode`) REFERENCES `vendors` (`vendorCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
