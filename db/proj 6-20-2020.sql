-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 10:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj`
--
CREATE DATABASE IF NOT EXISTS `proj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proj`;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `atdate` date NOT NULL,
  `created_at` datetime NOT NULL,
  `mcreated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `std_id`, `meal_id`, `atdate`, `created_at`, `mcreated_by`) VALUES
(1, 2, 1, '2222-02-22', '2020-06-20 01:19:01', 'rehan'),
(2, 2, 1, '0333-03-31', '2020-06-20 01:19:11', 'rehan'),
(3, 3, 2, '2222-02-22', '2020-06-20 01:25:46', 'rehan'),
(4, 2, 2, '2222-02-22', '2020-06-20 02:24:51', 'rehan');

-- --------------------------------------------------------

--
-- Table structure for table `extra_taken`
--

CREATE TABLE `extra_taken` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `atdate` date NOT NULL,
  `created_at` datetime NOT NULL,
  `mcreated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extra_taken`
--

INSERT INTO `extra_taken` (`id`, `std_id`, `meal_id`, `atdate`, `created_at`, `mcreated_by`) VALUES
(1, 2, 2, '2222-02-22', '2020-06-20 01:22:13', 'rehan'),
(2, 2, 1, '0222-02-22', '2020-06-20 01:22:21', 'rehan'),
(3, 3, 1, '2222-02-22', '2020-06-20 02:24:43', 'rehan');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `meal_name`, `category`, `price`, `status`, `created_by`, `created_at`) VALUES
(1, 'dfd', 'breakfast', 100, 'active', 'rehan', '2020-06-19 01:55:26'),
(2, 'hjkhjk', 'lunch', 50, 'active', 'rehan', '2020-06-19 01:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `std_name` varchar(150) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `roll_no` varchar(150) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_name`, `father_name`, `roll_no`, `mobile_no`, `dob`, `gender`, `cnic`, `status`, `created_by`, `created_at`) VALUES
(1, '111111111', '21321321', '123123123', '213213123', '2232-02-13', 'male', '2312312', 'inactive', 'rehan', '2020-06-18 00:37:41'),
(2, 'saqqq', 'sadsadsa', '1223', '+923126232587', '0222-12-22', 'female', '1232132132131', 'active', 'rehan', '2020-06-18 00:37:25'),
(3, 'fkcsdhkf', 'dshfkj', '333', '2321321321', '2222-02-22', 'male', '2332432432432', 'active', 'rehan', '2020-06-20 01:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `dob`, `gender`, `user_type`, `user_role`, `created_at`, `created_by`) VALUES
(1, 'Super', 'superadmin', 'superadmin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2000-12-09', 'Male', 'superadmin', 'Administrator', '0000-00-00 00:00:00', ''),
(13, 'Kashif Ali', 'Adminasdsa', 'kashifsahil622@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 'on', 'admin', 'sadsad', '2020-06-17 02:31:54', 'rehan'),
(14, 'dasdsa', 'Admin', 'asdsad@dsad', 'e10adc3949ba59abbe56e057f20f883e', '0031-03-21', 'on', 'admin', 'sadsadsa', '2020-06-17 02:33:01', 'rehan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_taken`
--
ALTER TABLE `extra_taken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extra_taken`
--
ALTER TABLE `extra_taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
