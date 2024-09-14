-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 09:35 PM
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
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `renter_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `flat_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `BHK` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`flat_id`, `owner_id`, `name`, `area`, `size`, `BHK`, `address`, `price`, `image`, `status`) VALUES
(178, 149, 'House of Dragon', 'Dhanmondi', '1260sqft', '3BHK', 'Dhaka, Bangladesh', '120000', 'flat.jpg', 1),
(179, 149, 'White House', 'Badda', '2430sqft', '3BHK', 'Dhaka,Bangladesh', '230000', 'flat2.jpg', 1),
(180, 149, 'LaPula', 'New Market', '2460sqft', '4BHK', 'Dhaka, Bangladesh', '60000', 'flat3.jpg', 1),
(181, 149, 'Lake House', 'Kajipara', '2300sqft', '2BHK', 'Dhaka,Bangladesh', '24000', 'flat4.jpg', 1),
(182, 149, 'Peace Home', 'Bashundhara', '3000sqft', '4BHK', 'Dhaka,bangladesh', '40000', 'flat5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `name`, `phone_number`, `mail`, `address`, `nid`, `password`) VALUES
(149, 'suprio123', 'Suprio Biswas Mugdha', '01763915998', '', 'Dhaka, Bangladesh', '23523523523', '$2y$10$g0zi/dN1AWgthmsd6w3oz.Lyv8Dvo23usupG9bqZit89hI9A.Wogi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`renter_id`),
  ADD KEY `flat_id` (`flat_id`),
  ADD KEY `appointment_ibfk_1` (`owner_id`);

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`flat_id`),
  ADD KEY `flat_ibfk_1` (`owner_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `renter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `flat`
--
ALTER TABLE `flat`
  MODIFY `flat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
