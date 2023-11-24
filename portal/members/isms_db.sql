-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 09:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayear`
--

CREATE TABLE `ayear` (
  `id` int(11) NOT NULL,
  `ac_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ayear`
--

INSERT INTO `ayear` (`id`, `ac_year`) VALUES
(1, '2020/2021'),
(2, '2022/2023'),
(3, '2023/2024'),
(4, '2025/2026');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `comp_id` int(11) NOT NULL,
  `comp_title` varchar(50) NOT NULL,
  `comp_descr` varchar(300) NOT NULL,
  `stud_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `officer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lcomplain`
--

CREATE TABLE `lcomplain` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `staff` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lcomplain`
--

INSERT INTO `lcomplain` (`id`, `title`, `description`, `staff`) VALUES
(1, 'thuy', 'tkkkkkkkkkkkkkkkk', 'Staff/0003/019'),
(2, 'thuy', 'qqqewertyuiop', 'Staff/0003/019'),
(3, 'rqetrt5ryt', 'hhhhhhhhhhhhhhhhhh', 'Staff/0003/019'),
(4, '123456789', 'qqqqqqqqwertyuiopasdfghjklzxcvbnm', 'Staff/0003/019'),
(5, 'Complains', 'Minimal salary\r\n', 'Staff/0003/019'),
(6, 'thuy', 'hgjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'Test/00098'),
(7, 'ghjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'gjhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'Test/00098');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `staff` text NOT NULL,
  `sdate` text NOT NULL,
  `period` int(11) NOT NULL,
  `reason` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `staff`, `sdate`, `period`, `reason`, `status`) VALUES
(1, 'Staff/0003/019', '2022-06-18', 4, 'gjfffffffjtfj jhjfjdjitr', '0'),
(2, 'Staff/0003/019', '2022-06-17', 12, 'jgfjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'in-processing'),
(3, 'Staff/0003/019', '2022-07-02', 8, 'gjfffffffjtfj jhjfjdjitr', 'in-processing'),
(4, 'Staff/0003/019', '2022-06-17', 6, 'ogtgtgtgtgtgtgtgtgtgtgtgtgt', 'in-processing'),
(5, 'Staff/0003/019', '2022-06-24', 45, 'mjgfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'in-processing'),
(6, 'Staff/0003/019', '2022-06-25', 3, 'mhgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'in-processing'),
(7, 'Test/00098', '2022-06-24', 4, 'qwrtuolkjhgfdsaZxcvbnmjhg', 'in-processing'),
(8, 'Test/00098', '2022-06-25', 5, 'tssssssssssssssssssssssssssssssssssssss', 'in-processing');

-- --------------------------------------------------------

--
-- Table structure for table `lecunits`
--

CREATE TABLE `lecunits` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL DEFAULT 0,
  `unit_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(11) NOT NULL,
  `poll_name` varchar(50) NOT NULL,
  `poll_descr` varchar(300) NOT NULL,
  `poll_response` enum('yes','no','undecided') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_no` varchar(5) DEFAULT NULL,
  `hostel_block` varchar(50) DEFAULT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `sch_id` int(11) NOT NULL,
  `sch_code` varchar(8) DEFAULT NULL,
  `sch_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sch_id`, `sch_code`, `sch_name`) VALUES
(1, '100', 'School of Computing and Informatics'),
(2, '200', 'School of Graphics');

-- --------------------------------------------------------

--
-- Table structure for table `session_students`
--

CREATE TABLE `session_students` (
  `session_reg` int(11) NOT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `ayear_id` int(11) DEFAULT NULL,
  `stage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_number` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `pass` varchar(12) DEFAULT NULL,
  `pic` varchar(128) DEFAULT NULL,
  `department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_number`, `name`, `mail`, `role`, `pass`, `pic`, `department`) VALUES
(1, 'Staff/0001/019', 'Emily Atieno', 'r@gmail.com', 'deptofficer', 'admin', 'Staff_0001_019.jpg', NULL),
(8, 'Staff/0002/019', 'Emily Atieno', 'p@gmail.com', 'lecturer', '1111', 'Staff_0002_019.jpg', NULL),
(9, 'Staff/0003/019', 'stephen', 'stephen@gmail.com', 'deptofficer', 'qwerty', 'Staff_0003_019.jpg', NULL),
(11, 'Pa/0092/019', 'pATR', 'root@stephen', 'deptofficer', '12', NULL, NULL),
(12, 'Test/00098', 'Test 123', 'root@gtgg', 'deptofficer', '12', NULL, NULL),
(15, 'Pa/0092/300', '123', 'root@gmail', '', '12', NULL, NULL),
(16, 'Pa/0092000', 'Sylvia', 'root@dddd', 'deptofficer', '32', NULL, NULL),
(17, 'testttttt', 'testierrr', 'stephen@gmail', 'deptofficer', '43', NULL, NULL),
(18, '', '', 'djgfhfh@hvcjh', '', 'admin', NULL, NULL),
(19, 'ex3444', 'ezekiel', 'ro@gmail.com', 'deptofficer', '1234', NULL, NULL),
(21, 'ema/098898/019', 'Amilo', 'sema@gmail.com', 'deptofficer', '32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_reg` varchar(20) NOT NULL,
  `stud_name` varchar(50) NOT NULL,
  `stud_mail` varchar(50) NOT NULL,
  `stud_gender` enum('male','female') DEFAULT NULL,
  `fee_balance` enum('cleared','half','none') DEFAULT NULL,
  `stud_session` enum('registered','unregistered') DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `stage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `unit_code` varchar(10) NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `unit_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unitreg`
--

CREATE TABLE `unitreg` (
  `session_id` int(11) NOT NULL DEFAULT 0,
  `unit_id` int(11) NOT NULL DEFAULT 0,
  `cat` float DEFAULT NULL,
  `main` float DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayear`
--
ALTER TABLE `ayear`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ac_year` (`ac_year`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `officer_id` (`officer_id`);

--
-- Indexes for table `lcomplain`
--
ALTER TABLE `lcomplain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecunits`
--
ALTER TABLE `lecunits`
  ADD PRIMARY KEY (`id`,`staff_id`,`unit_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_no` (`room_no`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sch_id`),
  ADD UNIQUE KEY `sch_code` (`sch_code`);

--
-- Indexes for table `session_students`
--
ALTER TABLE `session_students`
  ADD PRIMARY KEY (`session_reg`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `stage_id` (`stage_id`),
  ADD KEY `ayear_id` (`ayear_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_number` (`staff_number`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `mail_2` (`mail`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `stud_reg` (`stud_reg`),
  ADD UNIQUE KEY `stud_mail` (`stud_mail`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `stage_id` (`stage_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit_code` (`unit_code`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `stage_id` (`stage_id`);

--
-- Indexes for table `unitreg`
--
ALTER TABLE `unitreg`
  ADD PRIMARY KEY (`session_id`,`unit_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ayear`
--
ALTER TABLE `ayear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lcomplain`
--
ALTER TABLE `lcomplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lecunits`
--
ALTER TABLE `lecunits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session_students`
--
ALTER TABLE `session_students`
  MODIFY `session_reg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_ibfk_2` FOREIGN KEY (`officer_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecunits`
--
ALTER TABLE `lecunits`
  ADD CONSTRAINT `lecunits_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lecunits_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_students`
--
ALTER TABLE `session_students`
  ADD CONSTRAINT `session_students_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `session_students_ibfk_2` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `session_students_ibfk_3` FOREIGN KEY (`ayear_id`) REFERENCES `ayear` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_ibfk_3` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unitreg`
--
ALTER TABLE `unitreg`
  ADD CONSTRAINT `unitreg_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `session_students` (`session_reg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unitreg_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
