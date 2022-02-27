-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 10:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin88');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `consultancy` enum('100','120','150','200','250') NOT NULL,
  `A_date` date NOT NULL,
  `A_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient`, `doctor`, `specialty`, `consultancy`, `A_date`, `A_time`) VALUES
(1, 'mostafa', 'yousef', 'Anesthesiology', '150', '2021-09-29', '08:00:00'),
(2, 'ahmed', 'sayed', 'Family Physician', '100', '2021-09-29', '08:00:00'),
(5, 'mostafa', 'mai', 'Anesthesiology', '150', '2021-10-01', '20:30:00'),
(28, 'eman', 'tamer', 'Allergy', '200', '2021-10-01', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'nada', '12345', 'nada@gmail.com', 'thanks for services'),
(2, 'nourhan', '12345', 'nourhan@gmail.com', 'test test');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `port` int(11) NOT NULL,
  `ae_title` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `model`, `department`, `ip`, `port`, `ae_title`, `date`) VALUES
(1, 'CT Scanner 1', ' Aquilion 64', 'Mamography', '192.158.1.38', 8787, 'test', '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `specialty` enum('Anesthesiology','Allergy','Cardiology','Dermatology','Family Physician','Infectious disease','Nephrology','Neurology','Otolaryngology','Ophthalmology','Obstetrics/gynecology','Oncology','Pediatrics','Pulmonology','Radiology','Rheumatology','Surgery') NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `fullname`, `username`, `email`, `phone`, `specialty`, `address`, `password`, `gender`) VALUES
(1, 'Yousef Ragab', 'yousef', 'yousef@gmail.com', '123', 'Anesthesiology', 'cairo', '123', 'male'),
(2, 'Mostafa Hamdy', 'mostafa', 'mostafa0@gmail.com', '1234', 'Cardiology', 'Shubra', '123', 'male'),
(3, 'Sayed Mahmoud', 'sayed', 'sayed00@gmail.com', '987', 'Family Physician', 'Shubra', '12345', 'male'),
(4, 'Mai Ahmed', 'mai', 'mai@gmail.com', '1234', 'Anesthesiology', 'cairo', '123', 'female'),
(7, 'Tamer Ali', 'tamer', 'tamer@gmail.com', '123456', 'Allergy', 'cairo', '123', 'male'),
(9, 'Khaled Ahmed', 'khaled', 'khaled2@gmail.com', '5345345324', 'Pediatrics', 'cairo', '1234', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecord`
--

CREATE TABLE `medicalrecord` (
  `id` int(11) NOT NULL,
  `patient` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `BPressure` varchar(20) NOT NULL,
  `BSugar` varchar(20) NOT NULL,
  `heart` varchar(20) NOT NULL,
  `BType` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') NOT NULL,
  `chronic` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalrecord`
--

INSERT INTO `medicalrecord` (`id`, `patient`, `doctor`, `weight`, `height`, `age`, `BPressure`, `BSugar`, `heart`, `BType`, `chronic`) VALUES
(1, 'ahmed', 'mostafa', 50, 170, 25, '80', '80', '80', 'B+', 'no'),
(2, 'yousef', 'mostafa', 75, 185, 27, '80/120', '80/120', '80/120', 'O+', 'yes'),
(3, 'mahmoud', 'mostafa', 88, 182, 36, '80/120', '80/120', '80/120', 'O+', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fullname`, `username`, `email`, `phone`, `city`, `address`, `password`, `gender`) VALUES
(1, 'Mostafa Hamdy', 'mostafa', 'mostafa@gmail.com', '12345', 'cairo', 'cairo', '123', 'male'),
(15, 'Ahmed mohamed', 'ahmed', 'ahmed@gmail.com', '123', 'cairo', 'cairo', '123', 'male'),
(16, 'Mai Ahmed', 'mai', 'mai@gmail.com', '123', 'cairo', 'cairo', '123', 'female'),
(18, 'Rania Zaky', 'rania', 'rania@gmail.com', '123456', 'cairo', 'cairo', '123', 'female'),
(20, 'Eman Ali', 'eman', 'eman0@gmail.com', '554543', 'cairo', 'cairo', '12345', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE `registeration` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`id`, `fullname`, `username`, `email`, `phone`, `city`, `address`, `password`, `gender`) VALUES
(1, 'Ahmed mohamed', 'ahmed', 'ahmed@gmail.com', '123', 'cairo', 'cairo', '123', 'm'),
(2, 'Mostafa Hamdy', 'mostafahamdy', 'mostafahamdy8800@gmail.com', '01124031676', 'cairo', 'cairo', '123', 'm'),
(3, 'Ali Ali', 'ali', 'ali@gmail.com', '123', 'cairo', 'cairo', '123', 'm'),
(4, 'dasdas', 'dasdd', 'dsadsad@gmail.com', '1234', 'cairo', 'cairo', '123', 'f'),
(5, 'GFDGD', 'DSADSA', 'dsadsad@gmail.com', '44713177', 'cairo', '', '123', 'm'),
(6, 'GFDGD', 'DSADSA', 'dsadsad@gmail.com', '44713177', 'cairo', '', '123', 'm'),
(7, 'mostafaa', 'mostafaa', 'mostafahamdy8800@gmail.com', '2314', 'cairo', 'cairo', '123', 'm'),
(10, 'aaa', 'aaa', 'aaa@gmail.com', '123', 'cairo', 'cairo', '123', ''),
(11, 'aaaa', 'aaaa', 'aaaa@gmail.com', '123', 'cairo', 'cairo', '123', 'm'),
(12, 'ssss', 'ssss', 'ssss@gmail.com', '213', 'cairo', 'cairo', '123', 'f'),
(17, 'hhhh', 'hhhh', 'hhhh@gmail.com', '123', 'cairo', 'cairo', '123', 'm'),
(27, 'ola', 'ola', 'ola@gmail.com', '123', 'cairo', 'cairo', '123', 'f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
