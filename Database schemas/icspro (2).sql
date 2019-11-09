-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 04:36 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icspro`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `ambId` int(11) NOT NULL,
  `ambNoPlate` varchar(20) DEFAULT NULL,
  `ambType` varchar(20) DEFAULT NULL,
  `ambDriverName` varchar(20) DEFAULT NULL,
  `ambDriverPhone` int(11) DEFAULT NULL,
  `ambCapacity` int(11) DEFAULT NULL,
  `ambPassword` varchar(3000) DEFAULT NULL,
  `ambEmail` varchar(70) DEFAULT NULL,
  `ambStatus` varchar(30) NOT NULL,
  `ambLat` double NOT NULL,
  `ambLong` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`ambId`, `ambNoPlate`, `ambType`, `ambDriverName`, `ambDriverPhone`, `ambCapacity`, `ambPassword`, `ambEmail`, `ambStatus`, `ambLat`, `ambLong`) VALUES
(1, '123456', 'Emergency case', 'Cedric Irakoze', 345, 23, '$2y$10$G.VVoDX72HWnHr1ZVMj6T.HXfzcZqqaW6r5vyKnLGjvXL2lx.9olS', 'cedricirakoze@gmail.com', 'In session', -0.303099, 36.080025);

-- --------------------------------------------------------

--
-- Table structure for table `ambwaitinglist`
--

CREATE TABLE `ambwaitinglist` (
  `ambWaitListId` int(11) NOT NULL,
  `ambAppointmentDate` datetime DEFAULT NULL,
  `ambListStatus` varchar(20) DEFAULT NULL,
  `patId` int(11) DEFAULT NULL,
  `ambId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambwaitinglist`
--

INSERT INTO `ambwaitinglist` (`ambWaitListId`, `ambAppointmentDate`, `ambListStatus`, `patId`, `ambId`) VALUES
(4, '2019-11-07 04:12:08', 'Done', 3, 1),
(0, '2019-11-08 12:00:38', 'Done', 1, 1),
(0, '2019-11-08 12:15:25', 'Done', 1, 1),
(0, '2019-11-08 19:26:03', 'In session', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `docId` int(11) NOT NULL,
  `docFname` varchar(30) DEFAULT NULL,
  `docLname` varchar(30) DEFAULT NULL,
  `docPhone` int(11) DEFAULT NULL,
  `docSpecialty` varchar(50) DEFAULT NULL,
  `docPassword` varchar(3000) DEFAULT NULL,
  `docEmail` varchar(70) DEFAULT NULL,
  `hospId` int(11) DEFAULT NULL,
  `docQueue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docId`, `docFname`, `docLname`, `docPhone`, `docSpecialty`, `docPassword`, `docEmail`, `hospId`, `docQueue`) VALUES
(11, 'Gaba', 'Senga', 456, 'Dentist', '$2y$10$.5WK5LpsBf1/yCmSZTKWuuhl3F0bQ8acJMA0vmltufQHqXKLchgJi', 'g@gmail.com	', 7, 18),
(13, 'Anthony', 'Angatia', 345, 'Cardiolog', '$2y$10$Q9BiwamulfNUnZBDCCc07OmAGU54fq5YPlo80aBNRmWAHL4i15cXS', 'a@gmail.com', 9, NULL),
(14, 'Tatiana', 'Kithome', 345, 'Optician', '$2y$10$tMv79QtisNtPRsHhBa7RpOgzwp5nk9dBtNIdT0aQ24wywNI1Mp8mm', 'tt@lbhs.com', 10, 15),
(15, 'NdayiFer', 'Senga', 234, 'Dentist', '$2y$10$Ub4Hx8qSHHDHu/qOyYiIGeEY4FrI7rmjvYWn5GWoxThz722BThVh2', 'senga@gmail.com', 10, 24),
(19, 'Young', 'Israel', 345, 'Dermatolog', '$2y$10$yBX/W13htLV2Y6Q/jLi6pO/A9/Uu072c6RSUruY8rnhk0uLh7d8IW', 'izere@gmail.com', 10, 6),
(26, 'Joy', 'Prunel', 123, 'Cardiolog', '$2y$10$WoRbmExJjacbT5sYh/ys4.iYPtqzQcGwfYUbEzHIdwWtXLEYGHtSS', 'youngizere@gmail.com', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospId` int(11) NOT NULL,
  `hospName` varchar(30) DEFAULT NULL,
  `hospAddress` varchar(30) DEFAULT NULL,
  `hospOpeningHrs` varchar(50) DEFAULT NULL,
  `hospClosingHrs` varchar(50) DEFAULT NULL,
  `hospAdmin` varchar(100) DEFAULT NULL,
  `adminEmail` varchar(70) DEFAULT NULL,
  `adminPassword` varchar(3000) DEFAULT NULL,
  `hospLat` varchar(50) NOT NULL,
  `hospLong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospId`, `hospName`, `hospAddress`, `hospOpeningHrs`, `hospClosingHrs`, `hospAdmin`, `adminEmail`, `adminPassword`, `hospLat`, `hospLong`) VALUES
(7, 'Rukundo', 'Nairobi', '03:59', '03:00', 'Ndayisenga', 'fer@gmail.com', '$2y$10$GpyEldBl7xhjfpPYv6OplepTukl0XNVtph597ci5QrOJLzQ2xCTLG', '-1.307190', '36.816261'),
(9, 'Mater', 'Nairobi', '03:50', '21:05', 'Otieno', 'otieno@gmail.com', '$2y$10$3tc86mgRL5z9zUL0R0f//eogYTZ6ntZ1QasZXfepYmLhs4gsCKHLC', '-0.303099', '36.080025'),
(10, 'Nakuru Level 5', 'Nakuru', '04:50', '04:56', 'Nakuru_Admin', 'nakuru@gmail.com', '$2y$10$17aATzYoGNwUgFwFu4UpIeaY5F5vTQYWYS1ZUACLO7PCWvmoaHfam', '-0.303099', '36.080025');

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecords`
--

CREATE TABLE `medicalrecords` (
  `medRecId` int(11) NOT NULL,
  `temp` double DEFAULT NULL,
  `bloodP` double DEFAULT NULL,
  `bmi` double DEFAULT NULL,
  `glcLvl` double DEFAULT NULL,
  `symptoms` varchar(80) DEFAULT NULL,
  `illness` varchar(50) DEFAULT NULL,
  `docNote` varchar(80) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `medName` varchar(100) DEFAULT NULL,
  `intakeInstructions` varchar(500) DEFAULT NULL,
  `docId` int(11) DEFAULT NULL,
  `patId` int(11) DEFAULT NULL,
  `nurseId` int(11) NOT NULL,
  `medDosageAmt` int(5) NOT NULL,
  `medRecStatus` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalrecords`
--

INSERT INTO `medicalrecords` (`medRecId`, `temp`, `bloodP`, `bmi`, `glcLvl`, `symptoms`, `illness`, `docNote`, `date_created`, `medName`, `intakeInstructions`, `docId`, `patId`, `nurseId`, `medDosageAmt`, `medRecStatus`) VALUES
(33, 23, 5, 45, 8, 'Headache', 'HIV', ' pain', '2019-10-12 07:27:36', 'Coartem', '2 times 3 a day', 11, 1, 4, 0, 'awaiting medication'),
(34, 34, 7, 19, 8, 'Vomit', 'HIV', ' pain', '2019-10-15 09:50:18', 'QUinine', '2 times 3 a day', 11, 1, 4, 0, ''),
(35, 23, 7, 45, 1, 'Headache', 'HIV', ' pain', '2019-10-15 10:02:29', 'QUinine', '2 times 3 a day', 11, 1, 4, 0, ''),
(38, 27, 5, 6, 6, 'Vomit', 'HIV', ' pain', '2019-10-15 14:33:40', 'QUinine', '2 times 3 a day', 11, 1, 4, 0, ''),
(39, 20, 2, 1, 8, 'Vomit', 'HIV', ' pain', '2019-10-16 09:24:59', 'QUinine', '2 times 3 a day', 11, 1, 3, 0, ''),
(40, 1, 122, 12, 12, 'Terrible Fatigue', NULL, NULL, '2019-10-20 15:49:05', NULL, NULL, NULL, 1, 4, 0, ''),
(41, 13, 24, 17, 15, 'Pain', NULL, NULL, '2019-11-07 00:25:18', NULL, NULL, NULL, 2, 4, 0, ''),
(42, 23, 5, 1, 17, 'Pain', NULL, NULL, '2019-11-07 00:31:36', NULL, NULL, NULL, 1, 3, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medId` int(11) NOT NULL,
  `medName` varchar(20) DEFAULT NULL,
  `medUnitPrice` double DEFAULT NULL,
  `medTotAmt` double DEFAULT NULL,
  `pharmId` int(11) DEFAULT NULL,
  `medUnitAmt` float NOT NULL,
  `medUnitCharge` double AS (medUnitPrice/ medUnitAmt) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medId`, `medName`, `medUnitPrice`, `medTotAmt`, `pharmId`, `medUnitAmt`) VALUES
(9, 'Coartem', 123, 12, 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nurseId` int(11) NOT NULL,
  `nurseFname` varchar(30) DEFAULT NULL,
  `nurseLname` varchar(30) DEFAULT NULL,
  `nursePhone` int(11) DEFAULT NULL,
  `nursePassword` varchar(3000) DEFAULT NULL,
  `nurseEmail` varchar(70) DEFAULT NULL,
  `hospId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurseId`, `nurseFname`, `nurseLname`, `nursePhone`, `nursePassword`, `nurseEmail`, `hospId`) VALUES
(3, 'Sharon', 'Otieno', 123, '$2y$10$vFhKFpsYAV3Jusodkf98GOCOrM2It/aQmEam9G3h3eil/jX9g7KiK', 'sharon@gmail.com', 7),
(4, 'Nelly', 'Mugambi', 456, '$2y$10$TGGYkZaBAT3hgb3PTaQbr.X54FJQZUD8q/rdcr4vFR8ZIXq8HLpaq', 'nelly@gmail.com', 10),
(5, 'Michelle', 'Cherop', 123, '$2y$10$JfUA08YZ2.oedIXd./m0z.hekU5b9tABhgrl64Pyl4LR0jqKGKkki', 'mich@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patId` int(11) NOT NULL,
  `patFname` varchar(30) DEFAULT NULL,
  `patLname` varchar(30) DEFAULT NULL,
  `patDOB` date DEFAULT NULL,
  `patPhone` int(11) DEFAULT NULL,
  `patEmail` varchar(50) DEFAULT NULL,
  `patAddress` varchar(50) DEFAULT NULL,
  `patPassword` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patId`, `patFname`, `patLname`, `patDOB`, `patPhone`, `patEmail`, `patAddress`, `patPassword`) VALUES
(1, 'Young', 'Izere', '2019-09-28', 123, 'youngizere@gmail.com', 'Brazil', '$2y$10$DMhu8kyDoQJN9nsMopR8wuOm0Js25DV9O1MoX3Cwx8.lWNZ40Fk0i'),
(2, 'Cedric', 'Irakoze', '2019-09-04', 823, 'cedricirakoze@gmail.com', 'Kenya', '$2y$10$fLmG2v6R0hAas.N14bv6Be4qXhJD.bopGT35MS.DA/08pSduaZuzK'),
(3, 'Test', 'Patient', '2013-03-03', 123, 'test@gmail.com', 'Australia', '$2y$10$xQUePKyvWPzPg8GcOptpEeMhCJu3grAJnUd4RnLWGgWqw7OJ2L46i'),
(4, 'Test2', 'Patient2', '2020-10-02', 823, 'pat@gmail.com', 'Australia', '$2y$10$zPXJOU1n7w.YWBtCWiLLze4bfJzq5NADiBw1cVmZVuRPvWSgC6e6.'),
(5, 'Testx', 'PatientX', '2000-10-03', 123, 'x@gmail.com', 'Brazil', '$2y$10$SkTHqFz4IKlBCH32bRaWYuyjARFZib1MGgwbOqc4fdmO/5dqCY33S');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `pharmId` int(11) NOT NULL,
  `pharmPhone` int(11) DEFAULT NULL,
  `pharmAddress` varchar(50) DEFAULT NULL,
  `pharmPassword` varchar(3000) DEFAULT NULL,
  `pharmEmail` varchar(70) DEFAULT NULL,
  `pharmName` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`pharmId`, `pharmPhone`, `pharmAddress`, `pharmPassword`, `pharmEmail`, `pharmName`) VALUES
(1, 234, 'Kanyosha', '$2y$10$zPkXNBNKaxjYs/4iU2Rji.Cjn0Fny7fy2X2cRSOJ6YjtyrNI6GGoK', 'youngizere@gmail.com', 'IZERE');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacyrequests`
--

CREATE TABLE `pharmacyrequests` (
  `pharmacyRequestId` int(11) NOT NULL,
  `timeOfRequest` datetime DEFAULT NULL,
  `requestStatus` varchar(70) DEFAULT NULL,
  `patId` int(11) DEFAULT NULL,
  `medId` int(11) DEFAULT NULL,
  `pharmId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacyrequests`
--

INSERT INTO `pharmacyrequests` (`pharmacyRequestId`, `timeOfRequest`, `requestStatus`, `patId`, `medId`, `pharmId`) VALUES
(7, '2019-10-29 15:46:40', 'Done', 1, 9, 1),
(8, '2019-10-29 15:49:20', 'Done', 1, 9, 1),
(9, '2019-10-29 18:01:42', 'Done', 1, 9, 1),
(10, '2019-10-29 18:03:42', 'Done', 1, 9, 1),
(11, '2019-10-29 18:08:24', 'Done', 1, 9, 1),
(12, '2019-10-29 18:08:32', 'Done', 1, 9, 1),
(13, '2019-10-29 18:15:31', 'Done', 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescId` int(11) NOT NULL,
  `intakeIntructions` varchar(80) DEFAULT NULL,
  `medId` int(11) DEFAULT NULL,
  `docId` int(11) DEFAULT NULL,
  `patId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `adminId` int(11) NOT NULL,
  `adminFname` varchar(30) DEFAULT NULL,
  `adminLname` varchar(30) DEFAULT NULL,
  `adminEmail` varchar(50) DEFAULT NULL,
  `adminAddress` varchar(50) DEFAULT NULL,
  `adminPassword` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`adminId`, `adminFname`, `adminLname`, `adminEmail`, `adminAddress`, `adminPassword`) VALUES
(1, 'Israel', 'Kona', 'kona@lbhs.com', 'Geneva', '$2y$10$uXDR0n0jR38o.MnQxlVU5OG8iweolLXACR9un8iLhqY3bf9NYbLgS');

-- --------------------------------------------------------

--
-- Table structure for table `waitinglist`
--

CREATE TABLE `waitinglist` (
  `waitListId` int(11) NOT NULL,
  `patId` int(11) DEFAULT NULL,
  `docId` int(11) DEFAULT NULL,
  `hospId` int(11) DEFAULT NULL,
  `listStatus` varchar(500) DEFAULT NULL,
  `appointment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waitinglist`
--

INSERT INTO `waitinglist` (`waitListId`, `patId`, `docId`, `hospId`, `listStatus`, `appointment_date`) VALUES
(91, 1, 14, 10, 'awaiting medication', '2018-10-19 20:29:38'),
(94, 1, 11, 7, 'awaiting doctor', '2019-11-05 16:42:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docId`),
  ADD KEY `hospId` (`hospId`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospId`);

--
-- Indexes for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD PRIMARY KEY (`medRecId`),
  ADD KEY `patId` (`patId`),
  ADD KEY `docId` (`docId`),
  ADD KEY `nurseId` (`nurseId`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medId`),
  ADD KEY `pharmId` (`pharmId`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurseId`),
  ADD KEY `hospId` (`hospId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patId`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`pharmId`);

--
-- Indexes for table `pharmacyrequests`
--
ALTER TABLE `pharmacyrequests`
  ADD PRIMARY KEY (`pharmacyRequestId`),
  ADD KEY `patId` (`patId`),
  ADD KEY `medId` (`medId`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescId`),
  ADD KEY `medId` (`medId`),
  ADD KEY `docId` (`docId`),
  ADD KEY `patId` (`patId`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `waitinglist`
--
ALTER TABLE `waitinglist`
  ADD PRIMARY KEY (`waitListId`),
  ADD KEY `patId` (`patId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `docId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  MODIFY `medRecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nurseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `pharmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharmacyrequests`
--
ALTER TABLE `pharmacyrequests`
  MODIFY `pharmacyRequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waitinglist`
--
ALTER TABLE `waitinglist`
  MODIFY `waitListId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`hospId`) REFERENCES `hospital` (`hospId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD CONSTRAINT `medicalrecords_ibfk_1` FOREIGN KEY (`patId`) REFERENCES `patient` (`patId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicalrecords_ibfk_2` FOREIGN KEY (`docId`) REFERENCES `doctor` (`docId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicalrecords_ibfk_3` FOREIGN KEY (`nurseId`) REFERENCES `nurse` (`nurseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`pharmId`) REFERENCES `pharmacy` (`pharmId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`hospId`) REFERENCES `hospital` (`hospId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pharmacyrequests`
--
ALTER TABLE `pharmacyrequests`
  ADD CONSTRAINT `pharmacyrequests_ibfk_1` FOREIGN KEY (`patId`) REFERENCES `patient` (`patId`),
  ADD CONSTRAINT `pharmacyrequests_ibfk_2` FOREIGN KEY (`medId`) REFERENCES `medicine` (`medId`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`medId`) REFERENCES `medicine` (`medId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`docId`) REFERENCES `doctor` (`docId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_ibfk_3` FOREIGN KEY (`patId`) REFERENCES `patient` (`patId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waitinglist`
--
ALTER TABLE `waitinglist`
  ADD CONSTRAINT `waitinglist_ibfk_1` FOREIGN KEY (`patId`) REFERENCES `patient` (`patId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
