-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 02:00 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `flat_id`, `time`, `date`) VALUES
(30, 181, '02:04:06', '2024-09-16'),
(34, 180, '03:06:25', '2024-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `flat_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
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

INSERT INTO `flat` (`flat_id`, `owner_id`, `name`, `category`, `area`, `size`, `BHK`, `address`, `price`, `image`, `status`) VALUES
(180, 149, 'LaPula', 'Bachelor', 'Uttara', '2460sqft', '4BHK', 'Dhaka, Bangladesh', '60000', 'flat3.jpg', 1),
(181, 149, 'Lake House', 'Family', 'Uttara', '2300sqft', '2BHK', 'Dhaka,Bangladesh', '24000', 'flat4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area`) VALUES
('Abdullahpur'),
('Adabor'),
('Aftab Nagar'),
('Agargaon'),
('Badda'),
('Banani'),
('Banasree'),
('Baridhara'),
('Bashundhara'),
('Bawnia'),
('Beraid'),
('Bochila'),
('Cantonment area'),
('Dakshinkhan'),
('Farmgate'),
('Gabtali'),
('Gulshan'),
('Kafrul'),
('Kazipara'),
('Khilgaon'),
('Khilkhet'),
('Mirpur'),
('Mohakhali'),
('Mohammadpur'),
('Niketan'),
('Pallabi'),
('Rampura'),
('Satarkul'),
('Shahjadpur'),
('Sher-e-Bangla Nagar'),
('Tejgaon'),
('Uttara'),
('Uttarkhan'),
('Vatara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type`) VALUES
('Bachelor'),
('Family');

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
(149, 'suprio123', 'Suprio Biswas Mugdha', '01763915998', '', 'Dhaka, Bangladesh', '23523523523', '$2y$10$g0zi/dN1AWgthmsd6w3oz.Lyv8Dvo23usupG9bqZit89hI9A.Wogi'),
(150, 'toha123', 'Toha Nahin', '017626568523', '', 'Dhaka, Bangladesh', '3252352352', '$2y$10$oZyfq2bgTSBY0IrDEkvxxOnMzC7bI3MvU0OJJKxJbguwCoQzFWxpW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`flat_id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
