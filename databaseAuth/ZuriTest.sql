-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2021 at 11:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ZuriTest`
--

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `Course_id` int(11) NOT NULL,
  `Course_name` varchar(100) NOT NULL,
  `course_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`Course_id`, `Course_name`, `course_code`) VALUES
(2, 'Engineering Mathematics', 'COME2203'),
(3, 'Computer Science', 'COME2102'),
(4, 'Engineering Mathematics', 'COME2102'),
(5, 'Engineering Drawing', 'COME2101');

-- --------------------------------------------------------

--
-- Table structure for table `UserInfo`
--

CREATE TABLE `UserInfo` (
  `userId` int(11) NOT NULL,
  `FName` varchar(230) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `UserPass` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `UserInfo`
--

INSERT INTO `UserInfo` (`userId`, `FName`, `Username`, `Email`, `UserPass`) VALUES
(1, 'andy', 'andy', 'nfoa@gmail.com', '$2y$10$3HRMBWNw3mzQmWK32zyGF.oXRA/DjBJUtKxN3wCBQxVPX79xdDazS'),
(2, 'Nfon Andrew ', 'andytata', 'nfona@gmail.com', '$2y$10$bprNlW0/XqxJHthuDJYWWuX4wft.Ez/U4GMT98EhlX47pRFqqrCme'),
(3, 'Nfon Andrew Tatah', 'andy1234', 'nfonandrew73@gmail.com', '$2y$10$hHmcodTcIaV4/fdDiz/iVuvSBPsd0mDGnAXwEMIPyS3OEel6BhzgW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`Course_id`);

--
-- Indexes for table `UserInfo`
--
ALTER TABLE `UserInfo`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Course`
--
ALTER TABLE `Course`
  MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `UserInfo`
--
ALTER TABLE `UserInfo`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
