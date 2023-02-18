-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 09:05 AM
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
  `typeID` int(10) UNSIGNED NOT NULL,
  `typeName` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`typeID`, `typeName`, `description`) VALUES
(1, 'Admin', 'admin'),
(2, 'Staff', 'Employee'),
(3, 'Client', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) UNSIGNED NOT NULL,
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
(1, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', '615 A  1/1', 11111),
(2, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', '615 A  1/1', 11111),
(3, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', '615 A  1/1', 11111),
(4, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', '615 A  1/1', 123),
(5, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', '615 A  1/1', 123),
(6, 'Sri lanka', 'Pannipitya', '10622', '615', 123),
(7, 'Sri', 'Pannipitya', '10622', '615', 0),
(8, 'Sri Lanka', 'Pannipitya', '10622', '615', 0),
(9, 'Sri', 'kotikawatta', '10622', '12333', 123),
(10, 'sri lanka', 'colombo', '10622', '615 A  1/1', 2222),
(11, 'sri lanka', 'colombo', '10622', '615 A  1/1', 2222),
(12, 'sri lanka', 'colombo', '10622', '615 A  1/1', 2222),
(13, 'sri lanka', 'colombo', '10622', '615 A  1/1', 2222),
(14, 'sri lanka', 'colombo', '10622', '615 A  1/1', 2222),
(15, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', 'Thalawathugoda', 5),
(16, 'India', 'india', '1234', 'india street', 1),
(17, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', '615 A  1/1', 0),
(18, 'Sri Lanka', 'Colombo', '10622', '615 A  1/1', 19),
(19, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', 'colombo', 19),
(20, 'Sri Lanka', 'Pannipitya Road, Tha', '10622', 'Sri Lanka', 11);

-- --------------------------------------------------------

--
-- Table structure for table `employee_assignment`
--

CREATE TABLE `employee_assignment` (
  `id` int(11) NOT NULL,
  `accountID` int(11) UNSIGNED NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_assignment`
--

INSERT INTO `employee_assignment` (`id`, `accountID`, `roleID`) VALUES
(1, 3, 5),
(2, 7, 10),
(6, 7, 11),
(7, 7, 14);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(10) UNSIGNED NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `leaveType` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `typeID` int(10) UNSIGNED NOT NULL,
  `leaveType` int(2) UNSIGNED NOT NULL,
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
  `dob` varchar(10) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `locationFlexibility` int(11) NOT NULL,
  `addressID` int(10) UNSIGNED NOT NULL,
  `dayRate` varchar(100) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`accountID`, `firstname`, `lastname`, `dob`, `religion`, `locationFlexibility`, `addressID`, `dayRate`) VALUES
(1, 'Praveen', 'tissera', '', '', 0, 1, '10'),
(2, 'udari', 'tissera', '', '', 0, 2, '20'),
(3, 'Karuna', 'Am', '', '', 0, 4, '40'),
(4, 'chamera', 'sanjeewa', '1985-02-27', 'buddhist', 0, 14, '10'),
(7, 'Gayan', 'Sampath', '1996-01-30', 'hindu', 1, 16, '10'),
(8, 'sudhan', 'sudhan', '1998-02-03', 'hindu', 1, 18, '20');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `skillsRequiredID` int(10) UNSIGNED NOT NULL,
  `budget` decimal(10,0) NOT NULL,
  `projectTypeID` varchar(100) DEFAULT NULL,
  `completed` bit(1) NOT NULL,
  `managerID` int(11) NOT NULL,
  `addressID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `title`, `startDate`, `endDate`, `skillsRequiredID`, `budget`, `projectTypeID`, `completed`, `managerID`, `addressID`) VALUES
(1, 'home land', '2023-02-28', '2023-03-31', 1, '1000', 'construction', b'0', 0, ''),
(2, 'homelan', '2023-01-01', '2023-03-01', 0, '20000', 'building', b'0', 1, '6'),
(3, 'capacity', '2023-04-01', '2024-05-01', 0, '100000', 'building', b'0', 1, '7'),
(4, 'capacity', '1970-01-01', '1970-01-01', 0, '100000', 'building', b'0', 1, '8'),
(5, 'kottawa', '2023-01-03', '2024-10-15', 0, '400', 'building', b'0', 1, '9'),
(6, 'Araliya Housing Scheme', '2023-01-04', '1970-01-01', 0, '250000', 'Housing Scheme', b'0', 1, '15'),
(7, 'hello house', '1970-01-01', '1970-01-01', 0, '250000', 'Housing Scheme', b'0', 1, '17'),
(8, 'Machine Operator', '2023-01-01', '2023-01-01', 0, '130', 'IT', b'1', 8, '19'),
(9, 'operator 2', '1970-01-01', '1970-01-01', 0, '344', 'IT', b'0', 8, '20');

-- --------------------------------------------------------

--
-- Table structure for table `project_assignment`
--

CREATE TABLE `project_assignment` (
  `assignID` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_assignment`
--

INSERT INTO `project_assignment` (`assignID`, `title`, `startDate`, `endDate`, `role`) VALUES
(1, 'phase 1', '2023-02-28', '2023-03-15', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `project_roles`
--

CREATE TABLE `project_roles` (
  `roleID` int(11) NOT NULL,
  `numPeople` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `taskID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_roles`
--

INSERT INTO `project_roles` (`roleID`, `numPeople`, `roleName`, `taskID`) VALUES
(1, 1, 'Planner', 1),
(3, 2, 'Planner', 4),
(4, 1, 'Plannerz', 5),
(5, 2, 'Planner2', 6),
(6, 1, 'Sub Task 1', 7),
(7, 1, 'Sub Task 2', 7),
(8, 1, 'Sub Task 3', 7),
(9, 1, 'Accountant', 8),
(10, 1, 'machine operator', 9),
(11, 1, 'operator2', 10),
(12, 1, 'operatora', 11),
(13, 1, 'operator3', 12),
(14, 2, 'afasdf', 13);

-- --------------------------------------------------------

--
-- Table structure for table `project_skills_required`
--

CREATE TABLE `project_skills_required` (
  `skillID` int(10) UNSIGNED NOT NULL,
  `skillName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_skills_required`
--

INSERT INTO `project_skills_required` (`skillID`, `skillName`) VALUES
(1, 'Planner -Phase 1');

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `taskID` int(11) NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `projectID` int(10) UNSIGNED NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_tasks`
--

INSERT INTO `project_tasks` (`taskID`, `endDate`, `projectID`, `startDate`, `title`) VALUES
(1, '1970/01/01', 2, '1970/01/01', 'Planning'),
(2, '1970/01/01', 2, '1970/01/01', 'Planning'),
(3, '1970/01/01', 2, '1970/01/01', 'Planning'),
(4, '1970/01/01', 3, '1970/01/01', 'Development'),
(5, '1970/01/01', 4, '1970/01/01', 'Analasis1'),
(6, '1970/01/01', 5, '2023/01/03', 'Planner_for the project'),
(7, '2023/01/04', 6, '2023/01/04', 'Team_Allocation'),
(8, '1970/01/01', 6, '1970/01/01', 'Budget_Approval'),
(9, '1970/01/01', 8, '1970/01/01', 'operator'),
(10, '2023/01/04', 9, '2023/01/20', 'operator1'),
(11, '1970/01/01', 9, '1970/01/01', 'operator1'),
(12, '1970/01/01', 9, '1970/01/01', 'operator1'),
(13, '1970/01/01', 9, '1970/01/01', 'operator1');

-- --------------------------------------------------------

--
-- Table structure for table `role_skills_required`
--

CREATE TABLE `role_skills_required` (
  `roleID` int(11) NOT NULL,
  `skillID` int(11) NOT NULL,
  `skillLevel` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_skills_required`
--

INSERT INTO `role_skills_required` (`roleID`, `skillID`, `skillLevel`) VALUES
(0, 1, 1),
(0, 2, 2),
(4, 2, 1),
(5, 1, 1),
(5, 2, 1),
(6, 1, 1),
(7, 2, 1),
(8, 4, 1),
(9, 1, 1),
(10, 4, 1),
(11, 4, 1),
(12, 4, 1),
(13, 4, 1),
(14, 4, 1);

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
(2, 2);

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
(2, 'Architect '),
(4, 'IT Services'),
(1, 'Planner'),
(3, 'Supplier');

-- --------------------------------------------------------

--
-- Table structure for table `time_off`
--

CREATE TABLE `time_off` (
  `id` int(11) NOT NULL,
  `accountID` int(11) UNSIGNED NOT NULL,
  `leaveType` int(11) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_off`
--

INSERT INTO `time_off` (`id`, `accountID`, `leaveType`, `startDate`, `endDate`) VALUES
(1, 1, 0, '2023-02-01', '2023-05-31'),
(2, 2, 0, '2023-02-01', '2023-05-31'),
(3, 3, 0, '2023-02-01', '2023-05-31'),
(4, 1, 2, '2023-02-01', '2023-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `accountID` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `typeID` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`accountID`, `username`, `typeID`, `email`, `password`) VALUES
(1, 'praveen', 1, 'praveen@gmail.com', '123456'),
(2, 'udari', 2, 'udari@gmail.com', '123456'),
(3, 'karuna', 2, 'karuna@gmail.com', '123456'),
(4, 'chameraabc', 2, 'chamera@gmail.com', '12345678'),
(5, 'Dayan', 3, 'dayan@gmail.com', '123456'),
(6, 'kasun', 2, 'kasun@gmail.com', '123456'),
(7, 'gayan', 2, 'gayan@gmail.com', '123456'),
(8, 'sudhan', 2, 'sudhan@yahoo.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `accountID` int(10) UNSIGNED NOT NULL,
  `skillID` int(10) UNSIGNED NOT NULL,
  `skillLevel` varchar(10) NOT NULL,
  `experienceYears` varchar(255) NOT NULL,
  `achievements` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`accountID`, `skillID`, `skillLevel`, `experienceYears`, `achievements`, `id`) VALUES
(2, 1, '', '5', 'bsc', 1),
(3, 1, '', '5', 'msc', 2),
(3, 2, '', '2', 'msc', 3),
(7, 1, '1 ', '3 ', '', 4),
(7, 1, '1 ', '3 ', '', 5),
(7, 4, '2 ', '5 ', '', 6),
(8, 4, '1 ', '4 ', '', 7);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leaveType` (`leaveType`);

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
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `skillsRequiredID` (`skillsRequiredID`);

--
-- Indexes for table `project_assignment`
--
ALTER TABLE `project_assignment`
  ADD PRIMARY KEY (`assignID`);

--
-- Indexes for table `project_roles`
--
ALTER TABLE `project_roles`
  ADD PRIMARY KEY (`roleID`),
  ADD KEY `taskID` (`taskID`);

--
-- Indexes for table `project_skills_required`
--
ALTER TABLE `project_skills_required`
  ADD PRIMARY KEY (`skillID`),
  ADD UNIQUE KEY `skillName` (`skillName`);

--
-- Indexes for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD PRIMARY KEY (`taskID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `role_skills_required`
--
ALTER TABLE `role_skills_required`
  ADD KEY `skillLevel` (`skillLevel`);

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
-- Indexes for table `time_off`
--
ALTER TABLE `time_off`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountID` (`accountID`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `skillID` (`skillID`),
  ADD KEY `accountID` (`accountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `typeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `typeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `accountID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_assignment`
--
ALTER TABLE `project_assignment`
  MODIFY `assignID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_roles`
--
ALTER TABLE `project_roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_skills_required`
--
ALTER TABLE `project_skills_required`
  MODIFY `skillID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_tasks`
--
ALTER TABLE `project_tasks`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skilllevel`
--
ALTER TABLE `skilllevel`
  MODIFY `levelID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_off`
--
ALTER TABLE `time_off`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `accountID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  ADD CONSTRAINT `employee_assignment_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `user_account` (`accountID`);

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`leaveType`) REFERENCES `leave_type` (`leaveType`);

--
-- Constraints for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD CONSTRAINT `leave_type_ibfk_1` FOREIGN KEY (`leaveType`) REFERENCES `leave` (`leaveType`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `user_account` (`accountID`) ON DELETE CASCADE,
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`) ON DELETE CASCADE;

--
-- Constraints for table `project_assignment`
--
ALTER TABLE `project_assignment`
  ADD CONSTRAINT `project_assignment_ibfk_1` FOREIGN KEY (`assignID`) REFERENCES `project` (`projectID`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_assignment_ibfk_2` FOREIGN KEY (`assignID`) REFERENCES `user_account` (`accountID`) ON DELETE CASCADE;

--
-- Constraints for table `project_roles`
--
ALTER TABLE `project_roles`
  ADD CONSTRAINT `project_roles_ibfk_1` FOREIGN KEY (`taskID`) REFERENCES `project_tasks` (`taskID`);

--
-- Constraints for table `project_skills_required`
--
ALTER TABLE `project_skills_required`
  ADD CONSTRAINT `project_skills_required_ibfk_1` FOREIGN KEY (`skillID`) REFERENCES `skills` (`skillID`),
  ADD CONSTRAINT `project_skills_required_ibfk_2` FOREIGN KEY (`skillID`) REFERENCES `project` (`skillsRequiredID`);

--
-- Constraints for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD CONSTRAINT `project_tasks_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `project` (`projectID`);

--
-- Constraints for table `role_skills_required`
--
ALTER TABLE `role_skills_required`
  ADD CONSTRAINT `role_skills_required_ibfk_1` FOREIGN KEY (`skillLevel`) REFERENCES `skilllevel` (`levelID`);

--
-- Constraints for table `time_off`
--
ALTER TABLE `time_off`
  ADD CONSTRAINT `time_off_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `user_account` (`accountID`);

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `account_type` (`typeID`);

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`skillID`) REFERENCES `skills` (`skillID`),
  ADD CONSTRAINT `user_skills_ibfk_3` FOREIGN KEY (`accountID`) REFERENCES `user_account` (`accountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
