-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Vish', '$2y$10$eln0PGdo/ttB7hIJJNXXCu.F0E7kVwnXfiVVAxz22D4SH69H17Ivu', 'vinu@gmail.com', '7892603673');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`) VALUES
(46, 12, '2024-11-09', 'Present'),
(47, 13, '2024-11-09', 'Absent'),
(48, 14, '2024-11-09', 'Present'),
(49, 15, '2024-11-09', 'Absent'),
(50, 16, '2024-11-09', 'Present'),
(51, 12, '2024-11-10', 'Present'),
(52, 13, '2024-11-10', 'Present'),
(53, 14, '2024-11-10', 'Present'),
(54, 15, '2024-11-10', 'Present'),
(55, 16, '2024-11-10', 'Present'),
(56, 12, '2024-11-11', 'Present'),
(57, 13, '2024-11-11', 'Present'),
(58, 14, '2024-11-11', 'Absent'),
(59, 15, '2024-11-11', 'Present'),
(60, 16, '2024-11-11', 'Present'),
(61, 12, '2024-11-12', 'Present'),
(62, 13, '2024-11-12', 'Present'),
(63, 14, '2024-11-12', 'Present'),
(64, 15, '2024-11-12', 'Absent'),
(65, 16, '2024-11-12', 'Present'),
(66, 12, '2024-11-13', 'Absent'),
(67, 13, '2024-11-13', 'Absent'),
(68, 14, '2024-11-13', 'Present'),
(69, 15, '2024-11-13', 'Present'),
(70, 16, '2024-11-13', 'Present'),
(71, 12, '2024-11-14', 'Present'),
(72, 13, '2024-11-14', 'Present'),
(73, 14, '2024-11-14', 'Present'),
(74, 15, '2024-11-14', 'Absent'),
(75, 16, '2024-11-14', 'Present'),
(76, 12, '2024-11-15', 'Absent'),
(77, 13, '2024-11-15', 'Present'),
(78, 14, '2024-11-15', 'Present'),
(79, 15, '2024-11-15', 'Present'),
(80, 16, '2024-11-15', 'Present'),
(81, 12, '2024-11-16', 'Present'),
(82, 13, '2024-11-16', 'Present'),
(83, 14, '2024-11-16', 'Present'),
(84, 15, '2024-11-16', 'Present'),
(85, 16, '2024-11-16', 'Present'),
(86, 12, '2024-11-17', 'Absent'),
(87, 13, '2024-11-17', 'Absent'),
(88, 14, '2024-11-17', 'Absent'),
(89, 15, '2024-11-17', 'Absent'),
(90, 16, '2024-11-17', 'Absent'),
(91, 12, '2024-11-18', 'Present'),
(92, 13, '2024-11-18', 'Absent'),
(93, 14, '2024-11-18', 'Present'),
(94, 15, '2024-11-18', 'Present'),
(95, 16, '2024-11-18', 'Absent'),
(96, 12, '2024-11-19', 'Present'),
(97, 13, '2024-11-19', 'Present'),
(98, 15, '2024-11-19', 'Present'),
(99, 16, '2024-11-19', 'Present'),
(100, 12, '2024-11-20', 'Present'),
(101, 13, '2024-11-20', 'Absent'),
(102, 14, '2024-11-20', 'Present'),
(103, 15, '2024-11-20', 'Present'),
(104, 16, '2024-11-20', 'Absent'),
(105, 14, '2024-11-19', 'Present'),
(106, 12, '2024-11-21', 'Present'),
(107, 13, '2024-11-21', 'Present'),
(108, 14, '2024-11-21', 'Present'),
(109, 15, '2024-11-21', 'Present'),
(110, 16, '2024-11-21', 'Present'),
(111, 12, '2024-11-22', 'Absent'),
(112, 13, '2024-11-22', 'Present'),
(113, 14, '2024-11-22', 'Present'),
(114, 15, '2024-11-22', 'Absent'),
(115, 16, '2024-11-22', 'Present'),
(116, 12, '2024-11-23', 'Absent'),
(117, 13, '2024-11-23', 'Present'),
(118, 14, '2024-11-23', 'Present'),
(119, 15, '2024-11-23', 'Present'),
(120, 16, '2024-11-23', 'Present'),
(121, 12, '2024-11-24', 'Present'),
(122, 13, '2024-11-24', 'Present'),
(123, 14, '2024-11-24', 'Absent'),
(124, 15, '2024-11-24', 'Present'),
(125, 16, '2024-11-24', 'Present'),
(126, 12, '2024-11-25', 'Present'),
(127, 13, '2024-11-25', 'Present'),
(128, 14, '2024-11-25', 'Present'),
(129, 15, '2024-11-25', 'Present'),
(130, 16, '2024-11-25', 'Present'),
(131, 12, '2024-11-26', 'Present'),
(132, 13, '2024-11-26', 'Present'),
(133, 14, '2024-11-26', 'Present'),
(134, 15, '2024-11-26', 'Present'),
(135, 16, '2024-11-26', 'Present'),
(136, 12, '2024-11-27', 'Present'),
(137, 13, '2024-11-27', 'Present'),
(138, 14, '2024-11-27', 'Absent'),
(139, 15, '2024-11-27', 'Absent'),
(140, 16, '2024-11-27', 'Present'),
(141, 12, '2024-11-28', 'Present'),
(142, 13, '2024-11-28', 'Absent'),
(143, 14, '2024-11-28', 'Absent'),
(144, 15, '2024-11-28', 'Present'),
(145, 16, '2024-11-28', 'Present'),
(146, 12, '2024-11-29', 'Present'),
(147, 13, '2024-11-29', 'Present'),
(148, 14, '2024-11-29', 'Present'),
(149, 15, '2024-11-29', 'Present'),
(150, 16, '2024-11-29', 'Present'),
(151, 12, '2024-11-30', 'Absent'),
(152, 13, '2024-11-30', 'Absent'),
(153, 14, '2024-11-30', 'Absent'),
(154, 15, '2024-11-30', 'Absent'),
(155, 16, '2024-11-30', 'Absent'),
(156, 12, '2024-12-09', 'Present'),
(157, 13, '2024-12-09', 'Present'),
(158, 14, '2024-12-09', 'Present'),
(159, 15, '2024-12-09', 'Present'),
(160, 16, '2024-12-09', 'Present'),
(161, 12, '2024-12-08', 'Absent'),
(162, 13, '2024-12-08', 'Absent'),
(163, 14, '2024-12-08', 'Absent'),
(164, 15, '2024-12-08', 'Absent'),
(165, 16, '2024-12-08', 'Absent'),
(166, 12, '2024-12-07', 'Present'),
(167, 13, '2024-12-07', 'Absent'),
(168, 14, '2024-12-07', 'Present'),
(169, 15, '2024-12-07', 'Absent'),
(170, 16, '2024-12-07', 'Present'),
(171, 12, '2024-12-06', 'Absent'),
(172, 13, '2024-12-06', 'Present'),
(173, 14, '2024-12-06', 'Absent'),
(174, 15, '2024-12-06', 'Present'),
(175, 16, '2024-12-06', 'Absent'),
(176, 12, '2024-12-05', 'Present'),
(177, 13, '2024-12-05', 'Present'),
(178, 14, '2024-12-05', 'Absent'),
(179, 15, '2024-12-05', 'Absent'),
(180, 16, '2024-12-05', 'Present'),
(181, 12, '2024-12-04', 'Present'),
(182, 13, '2024-12-04', 'Present'),
(183, 14, '2024-12-04', 'Present'),
(184, 15, '2024-12-04', 'Present'),
(185, 16, '2024-12-04', 'Absent'),
(186, 12, '2024-12-03', 'Present'),
(187, 13, '2024-12-03', 'Present'),
(188, 14, '2024-12-03', 'Present'),
(189, 15, '2024-12-03', 'Present'),
(190, 16, '2024-12-03', 'Present'),
(191, 12, '2024-12-02', 'Present'),
(192, 13, '2024-12-02', 'Present'),
(193, 14, '2024-12-02', 'Present'),
(194, 15, '2024-12-02', 'Present'),
(195, 16, '2024-12-02', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll_no`, `year`, `branch`, `semester`) VALUES
(12, 'Pratishka', '1', '2024', 'CSE', '3'),
(13, 'Shreya', '2', '2024', 'CSE', '3'),
(14, 'Nandish', '3', '2024', 'CSE', '3'),
(15, 'Vandana', '4', '2024', 'CSE', '3'),
(16, 'Shireen', '5', '2024', 'CSE', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
