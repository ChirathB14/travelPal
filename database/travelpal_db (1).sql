-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 08:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelpal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `pricePerRoom` int(11) NOT NULL,
  `withAcStatus` varchar(11) NOT NULL,
  `withFoodStatus` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `regNo` int(5) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`pricePerRoom`, `withAcStatus`, `withFoodStatus`, `address`, `regNo`, `serviceProfileID`) VALUES
(12000, 'yes', 'no', '10, park lane', 10011, 10030);

-- --------------------------------------------------------

--
-- Table structure for table `consists`
--

CREATE TABLE `consists` (
  `tourPlanID` int(11) NOT NULL,
  `destinationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutomtourplan`
--

CREATE TABLE `cutomtourplan` (
  `tourPlanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destinationID` int(11) NOT NULL,
  `province` varchar(25) NOT NULL,
  `district` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `season` varchar(50) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `includes`
--

CREATE TABLE `includes` (
  `reportID` int(11) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `tourID` int(11) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `method` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `paymentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `premadetourplan`
--

CREATE TABLE `premadetourplan` (
  `budget` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `season` int(11) NOT NULL,
  `noOfDays` int(11) NOT NULL,
  `tourPlanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `startDate`, `endDate`, `userID`) VALUES
(1, '2023-03-04', '2023-03-05', 0),
(2, '2023-03-04', '2023-03-05', 0),
(3, '2023-03-02', '2023-03-04', 0),
(4, '2023-03-05', '2023-03-06', 0),
(5, '2023-03-05', '2023-03-07', 0),
(6, '2023-03-01', '2023-03-03', 0),
(7, '2023-03-02', '2023-03-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reservationID` int(11) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceProfileID` int(11) NOT NULL,
  `svcProviderID` int(11) NOT NULL,
  `district` varchar(30) NOT NULL,
  `managerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `userID` int(11) NOT NULL,
  `location` varchar(25) NOT NULL,
  `phoneNo` varchar(25) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`userID`, `location`, `phoneNo`, `NIC`, `availability`) VALUES
(10030, 'Colombo', '0775899568', '200085501975', 0);

-- --------------------------------------------------------

--
-- Table structure for table `siteadmin`
--

CREATE TABLE `siteadmin` (
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteadmin`
--

INSERT INTO `siteadmin` (`userID`) VALUES
(10022);

-- --------------------------------------------------------

--
-- Table structure for table `sitemanager`
--

CREATE TABLE `sitemanager` (
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitemanager`
--

INSERT INTO `sitemanager` (`userID`) VALUES
(10013);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tourID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `paidStatus` int(11) NOT NULL,
  `tourPlanID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tourguide`
--

CREATE TABLE `tourguide` (
  `pricePerDay` int(11) NOT NULL,
  `languages` varchar(30) NOT NULL,
  `experience` int(11) NOT NULL,
  `reg_number` varchar(5) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`userID`) VALUES
(10029),
(10031),
(10032),
(10033),
(10034),
(10035);

-- --------------------------------------------------------

--
-- Table structure for table `tourplan`
--

CREATE TABLE `tourplan` (
  `tourPlanID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `pricePerKm` int(11) NOT NULL,
  `vehicleNumber` varchar(25) NOT NULL,
  `vehicleType` varchar(25) NOT NULL,
  `fuelType` varchar(20) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `firstName`, `lastName`) VALUES
(10013, 'udaya_99', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'udayanga99@gmail.com', 'Udayanga', 'De Silva'),
(10014, 'sanduni', '0492f2dedfb7edde865d3c97ccda4bc2ff1aca73', 'sanduniuma11@gmail.com', 'Sanduni', 'Akarawita'),
(10018, '', '$2y$10$7eMrQEf7dhNF/oNP11fTdesHeKdN.v1bXXdDVYOTIQg', 'dasuninirmani@gmail.com', 'Dasuni', 'Nirmani'),
(10019, '', '$2y$10$j03UoKDR5kTf6V412fC1B.JlgaLpmvabr6iaYD9RiVH', 'chirathb@gmail.com', 'Chirath', 'Banda'),
(10020, '', 'e8d11a3b269c145367714f55785aae27808e0fb5', 'santha@gmail.com', 'Santha', 'Perera'),
(10021, '', '2ff180064235da859cdb490f69e3e2b29fdaee33', 'thimira@gmail.com', 'Thimira', 'Perera'),
(10022, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'paba@gmail.com', 'pabasara', 'samare'),
(10023, '', 'b3ae965f6f7218506bb8dd90351c525b23848aee', 'shantha@gmail.com', 'Shantha', 'perera'),
(10024, '', '761c0878ffcf76ec50dc504c53f781ce958b0f6d', 'Sevv@gmail.com', 'Sevvandi', 'Silva'),
(10025, '', 'df689a507e6b67e291adf1938868cdba82cc37b2', 'silva@gmail.com', 'Dias', 'Silva'),
(10026, '', '7c4ec581ad8f5ce41a7bf2a405b86891b5619195', 'naz@gmail.com', 'Nazma', 'Nazar'),
(10027, '', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', 'test@gmail.com', 'Test', 'user'),
(10028, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'nazma@gmail.com', 'Nazma', 'Nazar'),
(10029, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'naz10@gmail.com', 'Nazma', 'Nazar'),
(10030, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'naz11@gmail.com', 'Nazma', 'Nazar'),
(10034, '', '615565f8910a8085ee03b80e8ab924cb4aa31f1e', 'test1@gmail.com', 'Test', 'User1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`serviceProfileID`);

--
-- Indexes for table `consists`
--
ALTER TABLE `consists`
  ADD PRIMARY KEY (`tourPlanID`,`destinationID`),
  ADD KEY `destinationID` (`destinationID`);

--
-- Indexes for table `cutomtourplan`
--
ALTER TABLE `cutomtourplan`
  ADD PRIMARY KEY (`tourPlanID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destinationID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `includes`
--
ALTER TABLE `includes`
  ADD PRIMARY KEY (`reportID`,`serviceProfileID`),
  ADD KEY `serviceProfileID` (`serviceProfileID`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`tourID`,`serviceProfileID`),
  ADD KEY `serviceProfileID` (`serviceProfileID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`paymentID`,`userID`,`tourID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `tourID` (`tourID`);

--
-- Indexes for table `premadetourplan`
--
ALTER TABLE `premadetourplan`
  ADD PRIMARY KEY (`tourPlanID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`,`serviceProfileID`),
  ADD KEY `serviceProfileID` (`serviceProfileID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceProfileID`),
  ADD KEY `svcProviderID` (`svcProviderID`),
  ADD KEY `managerID` (`managerID`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `siteadmin`
--
ALTER TABLE `siteadmin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `sitemanager`
--
ALTER TABLE `sitemanager`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tourID`,`userID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `tourPlanID` (`tourPlanID`);

--
-- Indexes for table `tourguide`
--
ALTER TABLE `tourguide`
  ADD PRIMARY KEY (`serviceProfileID`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tourplan`
--
ALTER TABLE `tourplan`
  ADD PRIMARY KEY (`tourPlanID`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`serviceProfileID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10036;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
