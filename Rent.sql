-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 11:48 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '@admin123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`) VALUES
(1, 'Admin', '@admin123');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `agent_name` varchar(30) DEFAULT NULL,
  `agent_status` varchar(20) DEFAULT NULL,
  `agent_location` varchar(30) NOT NULL,
  `assigned_appointment_id` int(11) DEFAULT NULL,
  `flat_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_name`, `agent_status`, `agent_location`, `assigned_appointment_id`, `flat_status`) VALUES
(1, 'John Doe', 'Active', 'Niketan', NULL, ''),
(2, 'Jane Smith', 'Inactive', 'Mohakhali', NULL, ''),
(3, 'Alice Johnson', 'Active', 'Hatirjhil', NULL, ''),
(4, 'Michael Brown', 'Pending', 'Badda', NULL, ''),
(5, 'Chris Evans', 'Active', 'Uttara', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `appointment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `flat_id`, `time`, `date`) VALUES
(110, 164, 187, '03:18:36', '2024-09-22'),
(111, 164, 188, '03:18:38', '2024-09-22'),
(112, 166, 187, '03:27:42', '2024-09-22'),
(113, 166, 205, '03:27:51', '2024-09-22'),
(114, 167, 204, '03:33:26', '2024-09-22'),
(115, 167, 207, '03:33:30', '2024-09-22'),
(116, 165, 209, '03:39:27', '2024-09-22'),
(117, 165, 205, '03:39:30', '2024-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
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
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`flat_id`, `owner_id`, `name`, `area`, `size`, `BHK`, `address`, `price`, `category`, `image`, `image2`, `image3`, `image4`, `status`, `time`, `date`) VALUES
(187, 154, 'Elysian Estates', 'Niketan', '1450sqft', '3bhk', 'Dhaka, Bangladesh', '30000', 'Family', 'flat.jpg', 'th (13).jpg', 'th (14).jpg', 'th (15).jpg', 1, NULL, NULL),
(188, 154, 'Grandeur Gardens', 'Mohakhali', '2340sqft', '4bhk', 'Dhaka, Bangladesh', '300000', 'Male_Bachelor', 'flat2.jpg', 'th (9).jpg', 'th (10).jpg', 'th (11).jpg', 1, NULL, NULL),
(204, 164, 'Sunshine Apartment', 'Badda', '2460sqft', '3bhk', 'Dhaka,Jashore', '40000', 'Family', 'SCG_Vista_aminities_mob.webp', 'th (10).jpg', 'th (11).jpg', 'th (13).jpg', 1, '03:22:03', '2024-09-22'),
(205, 164, 'Harmony Parks', 'Hatirjhil', '1250sqft', '3bhk', 'Dhaka,Bangladesh', '23000', 'Male_Bachelor', 'th (4).jpg', 'th (17).jpg', 'th (18).jpg', 'th (19).jpg', 1, '03:23:20', '2024-09-22'),
(206, 166, 'Zenith Towers', 'Bashundhara', '2010sqft', '3bhk', 'Dhaka,Bangladesh', '30000', 'Female_Bachelor', 'th (5).jpg', 'th (7).jpg', 'th (8).jpg', 'th (11).jpg', 1, '03:30:22', '2024-09-22'),
(207, 166, 'Pixel Pointe Apartment', 'Nikunjo', '1870sqft', '3bhk', 'Dhaka,Bangladesh', '23000', 'Family', 'th (2).jpg', 'th (16).jpg', 'th (17).jpg', 'th (18).jpg', 1, '03:31:56', '2024-09-22'),
(208, 167, 'Verve Vertica', 'Dhanmondi', '2510sqft', '4bhk', 'Dhaka,Bangladesh', '26000', 'Male_Bachelor', 'th (3).jpg', 'th (16).jpg', 'th (18).jpg', 'th (19).jpg', 1, '03:36:35', '2024-09-22'),
(209, 167, 'The Canvas Loft', 'Niketan', '1250sqft', '3bhk', 'Dhaka,Bangladesh', '25000', 'Female_Bachelor', 'th (7).jpg', 'th (9).jpg', 'th (20).jpg', 'th.jpg', 1, '03:37:59', '2024-09-22'),
(210, 165, 'White Palace', 'Sahabagh', '1950sqft', '3bhk', 'Dhaka,Bangladesh', '20000', 'Family', 'th (1).jpg', 'th (11).jpg', 'th (15).jpg', 'th (19).jpg', 1, '03:41:37', '2024-09-22'),
(211, 165, 'Green light', 'Jatrabari', '1240sqft', '2bhk', 'Dhaka,Bangladesh', '15000', 'Female_Bachelor', 'th (6).jpg', 'th (11).jpg', 'th (17).jpg', 'th (20).jpg', 1, '03:44:21', '2024-09-22');

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
  `password` varchar(255) DEFAULT NULL,
  `subscription_days` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `name`, `phone_number`, `mail`, `address`, `nid`, `password`, `subscription_days`) VALUES
(154, 'suprio123', 'Suprio Biswas', '01763915998', 'suprio@gmail.com', 'Dhaka, Bangladesh', '5872678726', '$2y$10$LJFuBGBpbuuz5a.phkU4EuqWJeQUwC9pzbrOuTUmqg0wkRIYRkHdq', 7),
(164, 'ariyan123', 'Md Sanaul Islam', '01837837388', 'ariyan@gmail.com', 'Dhaka,Bangladesh', '3246246426', '$2y$10$E.WoZmaGKECdrc0q4Vzwe.g4hZbf8kzuZfcWGH2B2MIsK9EhDG0a2', 30),
(165, 'obyda123', 'Obyda Tasnim', '+88-0155425232', 'obyda@gmail.com', 'Dhaka,Bangladesh', '43654733454', '$2y$10$MeKx.aDl64HHnHAzaRlsCObIo7bNVeQLPhMni1lN4S3pdPBlQkmEi', 365),
(166, 'faiazul123', 'Faiazul Islam Ohin', '0198298897', 'faiazul@gmail.com', 'Dhaka,Bangladesh', '42356547567', '$2y$10$4w0f1mJXgSd4bhlBRtsE5O7UhP.3qdqNq0B45YmuEStkc7OIrwiGq', 30),
(167, 'basit123', 'Md Ridwanul Basit', '0187767688', 'basit@gmail.com', 'Dhaka,Bangladesh', '4363474737', '$2y$10$pC1JzGNdvIg9VQsbbhZmW.hc/To/wCTSFIAb8BXZJbE8Dwa7I5JjK', 365);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`),
  ADD KEY `assigned_appointment_id` (`assigned_appointment_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `flat_id` (`flat_id`),
  ADD KEY `appointment_ibfk_1` (`owner_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `UC_user_flat` (`user_id`,`flat_id`),
  ADD KEY `cart_ibfk_1` (`flat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flat`
--
ALTER TABLE `flat`
  MODIFY `flat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
