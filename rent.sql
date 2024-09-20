-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 06:46 PM
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

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`renter_id`, `owner_id`, `flat_id`, `date`, `time`) VALUES
(139, 133, 151, '2007-09-22', '22:55:38'),
(140, 127, 154, '2016-09-24', '07:02:53'),
(141, 138, 140, '1993-09-03', '17:18:42'),
(142, 131, 131, '1994-09-08', '23:05:27'),
(143, 129, 168, '2013-10-18', '11:36:56'),
(144, 131, 168, '2021-02-07', '15:20:48'),
(145, 134, 165, '2012-08-01', '00:24:02'),
(146, 135, 163, '2015-11-13', '14:50:29'),
(147, 130, 170, '1978-02-19', '09:44:29'),
(148, 130, 133, '1995-05-02', '15:52:18'),
(149, 136, 140, '1985-10-26', '06:23:16'),
(150, 135, 145, '1970-08-13', '13:24:06'),
(151, 127, 174, '2002-06-20', '09:18:51'),
(152, 132, 132, '2006-07-30', '06:15:26'),
(153, 129, 136, '2003-05-11', '03:51:09'),
(154, 129, 148, '2007-06-20', '05:01:05'),
(155, 130, 142, '1973-06-18', '09:36:17'),
(156, 127, 151, '2000-08-15', '14:05:45'),
(157, 130, 172, '2016-11-06', '15:39:47'),
(158, 128, 139, '1980-04-11', '18:55:09'),
(159, 134, 146, '2002-07-13', '21:18:12'),
(160, 132, 175, '2011-02-09', '17:10:14'),
(161, 133, 136, '2022-06-22', '18:38:50'),
(162, 136, 141, '2003-10-09', '16:35:32'),
(163, 138, 142, '2018-01-19', '09:15:58'),
(164, 135, 165, '1975-06-09', '08:25:37'),
(165, 128, 162, '1992-01-19', '22:11:34'),
(166, 126, 165, '1985-09-04', '22:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `flat_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `BHK` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `rent` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`flat_id`, `owner_id`, `area`, `size`, `BHK`, `address`, `rent`, `status`) VALUES
(127, 133, 'Laurettaberg', '1491 sqft', '1 BHK', '234 Robel Fields\nLake Marge, PA 20003', '14680 USD', 0),
(128, 138, 'Lake Cruzmouth', '1184 sqft', '3 BHK', '91271 Thiel Lodge\nPort Candidahaven, MA 34239-9908', '39645 USD', 0),
(129, 135, 'South Zoila', '1806 sqft', '3 BHK', '2983 Dominique Lake Apt. 644\nLake Heber, TN 59923', '28503 USD', 0),
(130, 132, 'Vancebury', '959 sqft', '1 BHK', '6390 Earlene Coves\nDibbertland, KY 62543', '41515 USD', 0),
(131, 136, 'North Martineburgh', '676 sqft', '3 BHK', '459 Reginald Bypass Apt. 967\nEast Landen, MD 13075-1131', '39429 USD', 0),
(132, 130, 'Barrowston', '1916 sqft', '2 BHK', '692 Jimmie Groves Suite 534\nMohrview, MS 79006-4657', '19000 USD', 0),
(133, 128, 'West Amanda', '678 sqft', '3 BHK', '328 Bruce Light\nWest Lisa, MI 89502-5259', '6643 USD', 0),
(134, 126, 'Connieview', '1167 sqft', '4 BHK', '2368 Jovany Ridges\nRauburgh, MS 37922-9893', '44352 USD', 0),
(135, 127, 'West Bettye', '758 sqft', '4 BHK', '791 Priscilla Circle\nNew Joelleton, NM 23681-0096', '42059 USD', 0),
(136, 137, 'North Busterstad', '854 sqft', '1 BHK', '821 Moen Spur Suite 136\nCandelarioport, HI 26749-9099', '16792 USD', 0),
(137, 132, 'Josefafurt', '604 sqft', '2 BHK', '471 Denesik Via Apt. 317\nHesterhaven, DC 47881-6145', '22476 USD', 0),
(138, 133, 'West Wendell', '842 sqft', '4 BHK', '41289 Ryan Squares\nSouth Anika, MS 20138-8528', '35352 USD', 0),
(139, 130, 'New Jaylinmouth', '1773 sqft', '1 BHK', '57497 Stanton Squares Suite 137\nPort Dessie, OH 83537', '20398 USD', 0),
(140, 131, 'Metzfurt', '1507 sqft', '4 BHK', '384 Shanahan Junctions Apt. 752\nCassandreville, NE 21548-7152', '9279 USD', 0),
(141, 126, 'Goodwinfurt', '1440 sqft', '2 BHK', '239 Schiller River Suite 298\nNicolaschester, CO 10262', '23603 USD', 0),
(142, 127, 'Myrtleport', '1953 sqft', '3 BHK', '3559 Quinten Plains\nLake Deontaeburgh, LA 23343-2109', '35767 USD', 0),
(143, 127, 'South Petraton', '1137 sqft', '4 BHK', '34920 Carroll Spring Suite 730\nNorth Justice, NY 92474', '21648 USD', 0),
(144, 131, 'Walshbury', '929 sqft', '4 BHK', '197 Gracie Locks Apt. 171\nWest Suzannebury, SD 47632', '13214 USD', 0),
(145, 131, 'South Rowena', '1181 sqft', '4 BHK', '331 Marcel Squares\nLuisastad, NE 86260', '30415 USD', 0),
(146, 134, 'East Haylee', '692 sqft', '1 BHK', '7647 Janice Route Suite 451\nOndrickachester, CA 70892', '33774 USD', 0),
(147, 133, 'Henriettestad', '1685 sqft', '4 BHK', '623 Brown Ports\nLake Marjorie, OK 25460', '30507 USD', 0),
(148, 136, 'East Elisha', '1803 sqft', '3 BHK', '67512 Jenifer Branch\nGerlachhaven, CO 39368-6905', '39892 USD', 0),
(149, 138, 'Gislasonton', '1096 sqft', '3 BHK', '506 Winnifred Rue\nNew Everett, MS 32922-1036', '19914 USD', 0),
(150, 134, 'Hillstown', '867 sqft', '4 BHK', '534 Lamar Mountain Apt. 579\nPort Alicia, ND 01541', '14216 USD', 0),
(151, 136, 'Port Molly', '684 sqft', '2 BHK', '69094 Lexus Turnpike Apt. 639\nNew Rhiannaberg, AL 45929', '33919 USD', 0),
(152, 134, 'East Cathryn', '1546 sqft', '3 BHK', '8229 Vern Isle Suite 039\nCathrineside, OK 90767', '37943 USD', 0),
(153, 135, 'West Raphaelle', '1513 sqft', '2 BHK', '743 Borer Club Suite 323\nWest Abbey, IL 07674-8708', '29206 USD', 0),
(154, 136, 'Port Lisandro', '1287 sqft', '1 BHK', '573 Lyda Isle\nBaileyberg, DE 64804', '6022 USD', 0),
(155, 133, 'Vandervortville', '1548 sqft', '2 BHK', '141 Daisha Cape Apt. 205\nMcKenziebury, KY 35001-7881', '37939 USD', 0),
(156, 131, 'South Carterburgh', '1344 sqft', '1 BHK', '549 Domenico Cliffs Apt. 571\nRohanborough, MI 25285-9377', '22404 USD', 0),
(157, 133, 'Fadelton', '541 sqft', '4 BHK', '9172 Felicita Expressway Apt. 426\nLake Orin, CA 06250-8435', '27412 USD', 0),
(158, 127, 'South Alexandrestad', '1134 sqft', '3 BHK', '649 Jennie Hill\nFeliciabury, OK 94376-2987', '34700 USD', 0),
(159, 130, 'South Devonte', '578 sqft', '4 BHK', '60607 O\'Kon Valleys Apt. 757\nWeberport, FL 08449-3661', '17332 USD', 0),
(160, 135, 'Wilkinsonview', '1279 sqft', '4 BHK', '888 Meda Well Apt. 798\nSouth Mercedesmouth, NY 77584', '23158 USD', 0),
(161, 135, 'Jettburgh', '1920 sqft', '2 BHK', '6368 Moises Avenue Apt. 290\nBartonport, MA 41019', '42363 USD', 0),
(162, 126, 'Laurianeland', '1117 sqft', '4 BHK', '7705 Wilderman Terrace Suite 201\nMaeganshire, MD 55396', '11701 USD', 0),
(163, 127, 'Port Bradly', '1535 sqft', '2 BHK', '8560 Eulah Harbor Apt. 690\nMorarview, ID 17589', '8456 USD', 0),
(164, 126, 'Jonathanton', '701 sqft', '1 BHK', '40624 Horace Summit Suite 561\nDachburgh, HI 44109-9456', '7276 USD', 0),
(165, 127, 'Stantonmouth', '1642 sqft', '2 BHK', '2883 Alberta Drive Suite 312\nEast Tommie, WY 38656', '37563 USD', 0),
(166, 133, 'South Summer', '655 sqft', '2 BHK', '439 Crona Ports Apt. 954\nWest Petebury, FL 98356-7191', '31052 USD', 0),
(167, 137, 'South Hannah', '559 sqft', '4 BHK', '837 Deckow Knoll\nGarrisonberg, CT 60462-7035', '18337 USD', 0),
(168, 133, 'New Bridget', '750 sqft', '3 BHK', '897 Johnson Tunnel Apt. 139\nWest Dannyland, MN 80620-1071', '6301 USD', 0),
(169, 137, 'Maximillianshire', '1223 sqft', '4 BHK', '56736 Kuhic Avenue Apt. 785\nNorth Jaquanmouth, UT 72496', '25874 USD', 0),
(170, 137, 'Reillyhaven', '661 sqft', '3 BHK', '658 Hettinger Key Suite 562\nLake Rickieburgh, LA 37946', '35093 USD', 0),
(171, 135, 'Arnoldchester', '1625 sqft', '2 BHK', '722 Wiegand Ford Apt. 945\nApriltown, WV 50811', '19221 USD', 0),
(172, 136, 'Lucianomouth', '1556 sqft', '2 BHK', '65051 Dale Radial\nSouth Andre, VT 34543-5627', '19531 USD', 0),
(173, 132, 'Port Orloborough', '966 sqft', '3 BHK', '610 Jast Stream\nNorth Mckayla, NJ 93559-3192', '28712 USD', 0),
(174, 130, 'Luisborough', '1815 sqft', '1 BHK', '67429 Noemy Highway Suite 294\nSouth Maureenhaven, OK 46022-2926', '19434 USD', 0),
(175, 134, 'Lake Destineeville', '860 sqft', '2 BHK', '749 Kirlin Mills\nKunzemouth, FL 85788', '14777 USD', 0),
(176, 136, 'New Norwood', '1457 sqft', '1 BHK', '79078 Lew Trail\nNorth Russburgh, MD 63612-6095', '43911 USD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
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

INSERT INTO `user` (`user_id`, `name`, `phone_number`, `mail`, `address`, `nid`, `password`) VALUES
(126, 'Sister Weissnat', '+1-918-456-6138', 'alba.glover@gmail.com', '8654 Lupe Knolls\nNew Alfred, OH 99345-0542', '37066520', '$2y$10$m/4i/ThptgMQnVmK3NfeZ.XGKYs4tMVe/DvWsDrhsEhXAs45vIyeK'),
(127, 'Cecile Rau', '425.641.8114', 'verdie24@yahoo.com', '85377 Karley Track Apt. 576\nNorth Reillymouth, WY 94433-6192', '30238054', '$2y$10$PcIy0rYAiu9Nw1BMGNRU7e1XOXV/9fXIzQZghjfvvMlBGlQUq5wVa'),
(128, 'Lillian Bruen', '1-802-934-9657', 'gromaguera@gmail.com', '342 Jordon Mountain Suite 963\nNorth Ephraimtown, UT 29640-6711', '80732202', '$2y$10$pMP.6HdQN8gA.PFnsxNcJecCW3Zpm84ppI4xXO.bx4KS4hXrPhYla'),
(129, 'Narciso Zieme', '586-894-8306', 'tmiller@yahoo.com', '73875 Botsford Ranch\nSpinkastad, SC 20916-4909', '85726614', '$2y$10$8TY11tKW.Zl7NsSoUs.kgOJg2MbRURjZ1n/1563UaBXiJqGs6nIAy'),
(130, 'Miss Name Roberts Jr.', '1-619-223-9522', 'katarina.lind@schowalter.com', '30925 Kane Trafficway\nSmithamberg, RI 13262-8304', '26798257', '$2y$10$Pdcqi/0uOp2pBmkenEd9vefc//MRmXs2zVR7LTEhvp3yVMRg7YIAi'),
(131, 'Tillman Krajcik', '619-246-9104', 'qcorwin@yahoo.com', '860 Stamm Shores Apt. 247\nLake Electabury, LA 36384-9228', '18940898', '$2y$10$qkp/bD67v5PSG6LB5Z66puj9kP1KqNtmvTzI9etsVlB6mZ1vj.lPC'),
(132, 'Beverly D\'Amore', '(440) 483-8670', 'delphia99@schmidt.com', '5439 Eleanora Route Suite 852\nEast Derrickside, MA 29323-3598', '39771688', '$2y$10$0/tnKuQKRUL882FhizKHs.oLGF/b0eJktneoO4hlegzyRa2NQOYX.'),
(133, 'Sidney Nicolas', '564-604-0044', 'bechtelar.augustine@feil.com', '593 Green Court\nLake Alyceberg, ID 74817-6933', '86985691', '$2y$10$qFcyA7P0IthUC.cXPZ0LOev/FI17D6NL4c1NHGDu/b2y8cKEsqDZq'),
(134, 'Gerry Sanford', '+18608495977', 'stephania27@yahoo.com', '827 Brock Union Apt. 553\nKunzeville, HI 44015-4737', '58111395', '$2y$10$dEB1eHZTEKP6KMCchqKfkevbovYyNRMEZxs7sNReanx5czXcYpwie'),
(135, 'Lindsey Cronin DDS', '352-350-2100', 'mable97@jacobi.com', '1623 Berge Plains\nO\'Connellfurt, MI 97273-8883', '20053839', '$2y$10$Pr4u53y0/i5sf0H.9xoJ0uuFsOnhDNT5PHSCt58gnb7tk336lMnNm'),
(136, 'Bailey Pacocha', '+1 (941) 459-3565', 'dietrich.eula@gmail.com', '2086 Herman Inlet\nLake Cara, FL 95426-8001', '58364885', '$2y$10$O/vzHDRyBcz6AxL6u.QIhekV5maY8lPjRyaM/F8mFTGqFqkoOr9xy'),
(137, 'Madalyn Abbott I', '+1-667-218-1894', 'anastacio74@yahoo.com', '852 Powlowski Trace Apt. 951\nAmericaborough, OK 67967', '23660253', '$2y$10$kYD0oBSsxJPx8f7OSsTBg.uenaHKh7RkGniavsUSRan428VihfEPC'),
(138, 'Jerald Predovic', '1-480-323-0406', 'rpacocha@mills.com', '456 Haleigh Flats\nNorth Stephanystad, VA 97646', '96345267', '$2y$10$gzH5V2b.PbSwv8jjlBOXqOVNHiu9QtLCg6d0CYJ6ppisIcgjGwZdS');

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
  MODIFY `flat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`);

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
