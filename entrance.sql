-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 06:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entrance`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Stu_Id` int(11) NOT NULL,
  `Stu_FirstName` varchar(100) NOT NULL,
  `Stu_LastName` varchar(150) NOT NULL,
  `Stu_BirthDay` varchar(50) NOT NULL,
  `Stu_Address` varchar(250) NOT NULL,
  `Stu_Province` varchar(50) NOT NULL,
  `Stu_Zipcode` varchar(10) NOT NULL,
  `Stu_Phone` varchar(50) NOT NULL,
  `Stu_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stu_Id`, `Stu_FirstName`, `Stu_LastName`, `Stu_BirthDay`, `Stu_Address`, `Stu_Province`, `Stu_Zipcode`, `Stu_Phone`, `Stu_Type`) VALUES
(1, 'Kritsadagorn', 'Punnapanich', '05 29.2003', '153/11 ศิริพร 1', 'เชียงราย', '50210', '0933781551', 2),
(2, 'ใคร', 'ดี', '03 20.2013', '155/2', 'เชียงใหม่', '52150', '0951135552', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Stu_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Stu_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
