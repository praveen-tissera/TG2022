-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 06:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fathah_engineering_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `typeID` int(10) NOT NULL,
  `typeName` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`typeID`, `typeName`, `description`) VALUES
(1, 'admin', 'admin'),
(2, 'employee', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `streetName` varchar(30) NOT NULL,
  `buldingNumber` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `country`, `city`, `postcode`, `streetName`, `buldingNumber`) VALUES
(1, 'sri lanka', 'colombo', '10622', 'colombo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_assignment`
--

CREATE TABLE `employee_assignment` (
  `id` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_assignment`
--

INSERT INTO `employee_assignment` (`id`, `accountID`, `roleID`) VALUES
(35, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `leaveType` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `typeID` int(10) NOT NULL,
  `leaveType` int(2) NOT NULL,
  `leaveTypeDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `accountID` int(10) UNSIGNED NOT NULL,
  `firstname` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `addressID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`accountID`, `firstname`, `lastname`, `addressID`) VALUES
(1, 'Praveen', 'tisera', 1),
(2, 'Kalum', 'Kumara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(10) UNSIGNED NOT NULL,
  `managerID` int(11) NOT NULL,
  `addressID` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `skillsRequiredID` int(10) NOT NULL,
  `budget` decimal(10,0) NOT NULL,
  `projectTypeID` varchar(100) DEFAULT NULL,
  `completed` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `managerID`, `addressID`, `title`, `startDate`, `endDate`, `skillsRequiredID`, `budget`, `projectTypeID`, `completed`) VALUES
(16, 1, 1, 'Building project at Colombo', '0000-00-00', '0000-00-00', 0, '100000', 'building construction', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `project_roles`
--

CREATE TABLE `project_roles` (
  `roleID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `numPeople` int(11) NOT NULL,
  `roleName` varchar(50) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_roles`
--

INSERT INTO `project_roles` (`roleID`, `taskID`, `numPeople`, `roleName`, `projectID`) VALUES
(10, 16, 1, 'BA', 16);

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `projectID` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_tasks`
--

INSERT INTO `project_tasks` (`projectID`, `title`, `startDate`, `endDate`, `role`) VALUES
(16, 'Analasis', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `role_skills_required`
--

CREATE TABLE `role_skills_required` (
  `skillID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `skillLevel` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_skills_required`
--

INSERT INTO `role_skills_required` (`skillID`, `roleID`, `skillLevel`, `id`) VALUES
(1, 10, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `skilllevel`
--

CREATE TABLE `skilllevel` (
  `levelID` int(10) UNSIGNED NOT NULL,
  `level` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skilllevel`
--

INSERT INTO `skilllevel` (`levelID`, `level`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skillID` int(10) UNSIGNED NOT NULL,
  `skillName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillID`, `skillName`) VALUES
(2, 'analysis'),
(1, 'project manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `accountID` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `typeID` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`accountID`, `username`, `typeID`, `email`, `password`) VALUES
(1, 'praveen', 1, 'praveen@gmail.com', '123456'),
(2, 'kalum', 2, 'kalum@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `accountID` int(10) UNSIGNED NOT NULL,
  `skillID` int(10) UNSIGNED NOT NULL,
  `experience` varchar(255) NOT NULL,
  `achievements` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`accountID`, `skillID`, `experience`, `achievements`) VALUES
(1, 1, '5 years', 'bsc'),
(2, 1, '2 years', 'Bsc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD KEY `leaveType` (`leaveType`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`typeID`),
  ADD UNIQUE KEY `leaveType` (`leaveType`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`accountID`),
  ADD KEY `addressID` (`addressID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `project_roles`
--
ALTER TABLE `project_roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `role_skills_required`
--
ALTER TABLE `role_skills_required`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skilllevel`
--
ALTER TABLE `skilllevel`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skillID`),
  ADD UNIQUE KEY `skillName` (`skillName`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`accountID`),
  ADD KEY `typeID` (`typeID`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`accountID`),
  ADD KEY `skillID` (`skillID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `typeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `typeID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `accountID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_roles`
--
ALTER TABLE `project_roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_tasks`
--
ALTER TABLE `project_tasks`
  MODIFY `projectID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role_skills_required`
--
ALTER TABLE `role_skills_required`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skilllevel`
--
ALTER TABLE `skilllevel`
  MODIFY `levelID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `accountID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`leaveType`) REFERENCES `leave_type` (`leaveType`);

--
-- Constraints for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD CONSTRAINT `leave_type_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `leave` (`leaveType`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `user_account` (`accountID`),
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`);

--
-- Constraints for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD CONSTRAINT `project_tasks_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `project` (`projectID`) ON DELETE CASCADE;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `account_type` (`typeID`);

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `user_account` (`accountID`),
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`skillID`) REFERENCES `skills` (`skillID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
