-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 05:56 AM
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
-- Table structure for table `agent_detail`
--

CREATE TABLE `agent_detail` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` text NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_detail`
--

INSERT INTO `agent_detail` (`doctor_id`, `doctor_name`, `status`) VALUES
(1, 'manelka sumanathilaka', 'active'),
(2, 'ruwan perera', 'active'),
(3, 'gayan perera', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `agent_slots`
--

CREATE TABLE `agent_slots` (
  `slot_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` enum('available','not available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_slots`
--

INSERT INTO `agent_slots` (`slot_id`, `doctor_id`, `date`, `time`, `status`) VALUES
(2, 1, '2023-01-22', '13.00-16.00', 'available'),
(3, 1, '2022-11-21', '8.00-10.00', 'not available'),
(4, 3, '2022-11-22', '9.00-12.00', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `staus` enum('active','inactive') NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `slot_id`, `name`, `age`, `contact_number`, `staus`, `created_date`) VALUES
(21, 2, 'Chamithu Mapalagama', 44, '0775012624', 'active', '2022-12-18'),
(23, 3, 'Senul Mendis', 44, '0775012624', 'active', '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `task_id` int(11) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `status` enum('new','assigned','in progress','complete') NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`task_id`, `task_description`, `status`, `created_date`) VALUES
(3, 'test task', 'new', '2023-01-08'),
(4, 'test task', 'new', '2023-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'praveen', 'praveen.tissera@gmail.com', '123456'),
(2, 'sadun', 'sadun@gmail.com', '123456'),
(3, 'nuwan', 'nuwan@gmail.com', '123456'),
(4, 'sadun1234', 'sadun123@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_detail`
--
ALTER TABLE `agent_detail`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `agent_slots`
--
ALTER TABLE `agent_slots`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `slot_id` (`slot_id`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_detail`
--
ALTER TABLE `agent_detail`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent_slots`
--
ALTER TABLE `agent_slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_slots`
--
ALTER TABLE `agent_slots`
  ADD CONSTRAINT `agent_slots_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `agent_detail` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
