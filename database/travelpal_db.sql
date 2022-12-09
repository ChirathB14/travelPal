-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Nov 13, 2022 at 12:44 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.25

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
CREATE DATABASE IF NOT EXISTS `travelpal_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `travelpal_db`;

-- --------------------------------------------------------

--
-- Table structure for table `Accomodation`
--

CREATE TABLE `Accomodation` (
  `pricePerRoom` int(11) NOT NULL,
  `withAcStatus` int(11) NOT NULL,
  `withFoodStatus` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Blog`
--

CREATE TABLE `Blog` (
  `blogID` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `content` varchar(500) NOT NULL,
  `writtenDate` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `CutomTourPlan`
--

CREATE TABLE `CutomTourPlan` (
  `tourPlanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Destination`
--

CREATE TABLE `Destination` (
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
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
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
-- Table structure for table `PreMadeTourPlan`
--

CREATE TABLE `PreMadeTourPlan` (
  `budget` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `season` int(11) NOT NULL,
  `noOfDays` int(11) NOT NULL,
  `tourPlanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `reportID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reservationID` int(11) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `serviceProfileID` int(11) NOT NULL,
  `svcProviderID` int(11) NOT NULL,
  `district` varchar(30) NOT NULL,
  `managerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ServiceProvider`
--

CREATE TABLE `ServiceProvider` (
  `userID` int(11) NOT NULL,
  `location` varchar(25) NOT NULL,
  `phoneNo` varchar(25) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SiteAdmin`
--

CREATE TABLE `SiteAdmin` (
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SiteManager`
--

CREATE TABLE `SiteManager` (
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tour`
--

CREATE TABLE `Tour` (
  `tourID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `paidStatus` int(11) NOT NULL,
  `tourPlanID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TourGuide`
--

CREATE TABLE `TourGuide` (
  `pricePerDay` int(11) NOT NULL,
  `languages` varchar(30) NOT NULL,
  `experience` int(11) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tourist`
--

CREATE TABLE `Tourist` (
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TourPlan`
--

CREATE TABLE `TourPlan` (
  `tourPlanID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Transport`
--

CREATE TABLE `Transport` (
  `pricePerKm` int(11) NOT NULL,
  `vehicleNumber` varchar(25) NOT NULL,
  `vehicleType` varchar(25) NOT NULL,
  `serviceProfileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accomodation`
--
ALTER TABLE `Accomodation`
  ADD PRIMARY KEY (`serviceProfileID`);

--
-- Indexes for table `Blog`
--
ALTER TABLE `Blog`
  ADD PRIMARY KEY (`blogID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `consists`
--
ALTER TABLE `consists`
  ADD PRIMARY KEY (`tourPlanID`,`destinationID`),
  ADD KEY `destinationID` (`destinationID`);

--
-- Indexes for table `CutomTourPlan`
--
ALTER TABLE `CutomTourPlan`
  ADD PRIMARY KEY (`tourPlanID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Destination`
--
ALTER TABLE `Destination`
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
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`paymentID`,`userID`,`tourID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `tourID` (`tourID`);

--
-- Indexes for table `PreMadeTourPlan`
--
ALTER TABLE `PreMadeTourPlan`
  ADD PRIMARY KEY (`tourPlanID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`reservationID`,`serviceProfileID`),
  ADD KEY `serviceProfileID` (`serviceProfileID`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`serviceProfileID`),
  ADD KEY `svcProviderID` (`svcProviderID`),
  ADD KEY `managerID` (`managerID`);

--
-- Indexes for table `ServiceProvider`
--
ALTER TABLE `ServiceProvider`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `SiteAdmin`
--
ALTER TABLE `SiteAdmin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `SiteManager`
--
ALTER TABLE `SiteManager`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `Tour`
--
ALTER TABLE `Tour`
  ADD PRIMARY KEY (`tourID`,`userID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `tourPlanID` (`tourPlanID`);

--
-- Indexes for table `TourGuide`
--
ALTER TABLE `TourGuide`
  ADD PRIMARY KEY (`serviceProfileID`);

--
-- Indexes for table `Tourist`
--
ALTER TABLE `Tourist`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `TourPlan`
--
ALTER TABLE `TourPlan`
  ADD PRIMARY KEY (`tourPlanID`);

--
-- Indexes for table `Transport`
--
ALTER TABLE `Transport`
  ADD PRIMARY KEY (`serviceProfileID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Blog`
--
ALTER TABLE `Blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Destination`
--
ALTER TABLE `Destination`
  MODIFY `destinationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `serviceProfileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ServiceProvider`
--
ALTER TABLE `ServiceProvider`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SiteAdmin`
--
ALTER TABLE `SiteAdmin`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SiteManager`
--
ALTER TABLE `SiteManager`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tour`
--
ALTER TABLE `Tour`
  MODIFY `tourID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tourist`
--
ALTER TABLE `Tourist`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TourPlan`
--
ALTER TABLE `TourPlan`
  MODIFY `tourPlanID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Accomodation`
--
ALTER TABLE `Accomodation`
  ADD CONSTRAINT `Accomodation_ibfk_1` FOREIGN KEY (`serviceProfileID`) REFERENCES `Service` (`serviceProfileID`);

--
-- Constraints for table `Blog`
--
ALTER TABLE `Blog`
  ADD CONSTRAINT `Blog_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Tourist` (`userID`);

--
-- Constraints for table `consists`
--
ALTER TABLE `consists`
  ADD CONSTRAINT `consists_ibfk_1` FOREIGN KEY (`tourPlanID`) REFERENCES `TourPlan` (`tourPlanID`),
  ADD CONSTRAINT `consists_ibfk_2` FOREIGN KEY (`destinationID`) REFERENCES `Destination` (`destinationID`);

--
-- Constraints for table `CutomTourPlan`
--
ALTER TABLE `CutomTourPlan`
  ADD CONSTRAINT `CutomTourPlan_ibfk_1` FOREIGN KEY (`tourPlanID`) REFERENCES `TourPlan` (`tourPlanID`),
  ADD CONSTRAINT `CutomTourPlan_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `Tourist` (`userID`);

--
-- Constraints for table `Destination`
--
ALTER TABLE `Destination`
  ADD CONSTRAINT `Destination_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `SiteManager` (`userID`);

--
-- Constraints for table `includes`
--
ALTER TABLE `includes`
  ADD CONSTRAINT `includes_ibfk_1` FOREIGN KEY (`reportID`) REFERENCES `Report` (`reportID`),
  ADD CONSTRAINT `includes_ibfk_2` FOREIGN KEY (`serviceProfileID`) REFERENCES `Service` (`serviceProfileID`);

--
-- Constraints for table `needs`
--
ALTER TABLE `needs`
  ADD CONSTRAINT `needs_ibfk_1` FOREIGN KEY (`tourID`) REFERENCES `Tour` (`tourID`),
  ADD CONSTRAINT `needs_ibfk_2` FOREIGN KEY (`serviceProfileID`) REFERENCES `Service` (`serviceProfileID`);

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`paymentID`) REFERENCES `Payment` (`paymentID`),
  ADD CONSTRAINT `pays_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `Tourist` (`userID`),
  ADD CONSTRAINT `pays_ibfk_3` FOREIGN KEY (`tourID`) REFERENCES `Tour` (`tourID`);

--
-- Constraints for table `PreMadeTourPlan`
--
ALTER TABLE `PreMadeTourPlan`
  ADD CONSTRAINT `PreMadeTourPlan_ibfk_1` FOREIGN KEY (`tourPlanID`) REFERENCES `TourPlan` (`tourPlanID`),
  ADD CONSTRAINT `PreMadeTourPlan_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `SiteManager` (`userID`);

--
-- Constraints for table `Report`
--
ALTER TABLE `Report`
  ADD CONSTRAINT `Report_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `SiteManager` (`userID`);

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`serviceProfileID`) REFERENCES `Service` (`serviceProfileID`);

--
-- Constraints for table `Service`
--
ALTER TABLE `Service`
  ADD CONSTRAINT `Service_ibfk_1` FOREIGN KEY (`svcProviderID`) REFERENCES `ServiceProvider` (`userID`),
  ADD CONSTRAINT `Service_ibfk_2` FOREIGN KEY (`managerID`) REFERENCES `SiteManager` (`userID`);

--
-- Constraints for table `ServiceProvider`
--
ALTER TABLE `ServiceProvider`
  ADD CONSTRAINT `ServiceProvider_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `SiteAdmin`
--
ALTER TABLE `SiteAdmin`
  ADD CONSTRAINT `SiteAdmin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `SiteManager`
--
ALTER TABLE `SiteManager`
  ADD CONSTRAINT `SiteManager_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `Tour`
--
ALTER TABLE `Tour`
  ADD CONSTRAINT `Tour_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Tourist` (`userID`),
  ADD CONSTRAINT `Tour_ibfk_2` FOREIGN KEY (`tourPlanID`) REFERENCES `TourPlan` (`tourPlanID`);

--
-- Constraints for table `TourGuide`
--
ALTER TABLE `TourGuide`
  ADD CONSTRAINT `TourGuide_ibfk_1` FOREIGN KEY (`serviceProfileID`) REFERENCES `Service` (`serviceProfileID`);

--
-- Constraints for table `Tourist`
--
ALTER TABLE `Tourist`
  ADD CONSTRAINT `Tourist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

--
-- Constraints for table `Transport`
--
ALTER TABLE `Transport`
  ADD CONSTRAINT `Transport_ibfk_1` FOREIGN KEY (`serviceProfileID`) REFERENCES `Service` (`serviceProfileID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
