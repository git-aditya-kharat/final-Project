-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 07:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academic_misconduct_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor_schedule`
--

CREATE TABLE `advisor_schedule` (
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('available','booked','cancelled','expired') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advisor_schedule`
--

INSERT INTO `advisor_schedule` (`schedule_id`, `user_id`, `schedule_date`, `start_time`, `end_time`, `status`) VALUES
(10, 3, '2021-11-19', '01:35:00', '02:35:00', 'expired'),
(11, 3, '2021-11-19', '19:13:00', '20:13:00', 'expired'),
(12, 3, '2021-11-19', '22:27:00', '23:27:00', 'expired'),
(13, 3, '2021-11-19', '01:30:00', '02:30:00', 'expired'),
(14, 3, '2021-11-20', '00:23:00', '01:23:00', 'expired'),
(15, 3, '2021-11-20', '02:25:00', '03:25:00', 'expired'),
(16, 9, '2021-11-21', '12:00:00', '13:00:00', 'available'),
(17, 9, '2021-11-22', '15:01:00', '16:01:00', 'cancelled'),
(18, 9, '2021-11-23', '15:06:00', '16:06:00', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` enum('done','upcoming','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `schedule_id`, `status`) VALUES
(1, 1, 6, 'upcoming'),
(2, 1, 7, 'cancelled'),
(3, 1, 8, 'cancelled'),
(4, 1, 10, 'cancelled'),
(5, 1, 11, 'done'),
(6, 1, 12, 'cancelled'),
(7, 1, 12, 'cancelled'),
(8, 1, 12, 'upcoming'),
(9, 7, 14, 'cancelled'),
(10, 8, 17, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `university_name`, `user_role`, `password`, `status`) VALUES
(3, 'Advisor', 'advisor@gmail.com', '1234567890', 'ABC', 2, '202cb962ac59075b964b07152d234b70', '0'),
(4, 'admin', 'admin@gmail.com', '1234567890', 'ABC', 1, '202cb962ac59075b964b07152d234b70', '1'),
(6, 'Advisor1', 'advisor1@gmail.com', '1234567890', 'ABCD', 2, '202cb962ac59075b964b07152d234b70', '1'),
(7, 'user3', 'user3@gmail.com', '0123456789', 'ABCD', 3, '202cb962ac59075b964b07152d234b70', '0'),
(8, 'user4', 'user4@gmail.com', '0123456789', 'ABCD', 3, '202cb962ac59075b964b07152d234b70', '1'),
(9, 'Advisor', 'advisor3@gmail.com', '0123456789', 'ABCD', 2, '202cb962ac59075b964b07152d234b70', '1'),
(10, 'user5', 'user5@gmail.com', '0123456789', 'ABCD', 3, '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_details`
--

CREATE TABLE `user_role_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_details`
--

INSERT INTO `user_role_details` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Advisor'),
(3, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor_schedule`
--
ALTER TABLE `advisor_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_details`
--
ALTER TABLE `user_role_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisor_schedule`
--
ALTER TABLE `advisor_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role_details`
--
ALTER TABLE `user_role_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
