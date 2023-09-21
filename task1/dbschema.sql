-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2023 at 04:09 PM
-- Server version: 8.0.20
-- PHP Version: 7.4.8



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memberschooldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `emailID` int NOT NULL,
  `userRefID` int NOT NULL,
  `emailaddress` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isDefault` boolean NOT NULL DEFAULT 1,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`emailID`, `userRefID`, `emailaddress`, `isDefault`, `updatedAt`, `createdAt`) VALUES
(1, 100567, 'phil1@gmail.com', 1, NULL, '2023-09-20 16:00:45'),
(2, 100567, 'phil2@gmail.com', 1, NULL, '2023-09-20 16:00:45'),
(3, 100568, 'phils@gmail.com', 1, NULL, '2023-09-20 16:00:45'),
(4, 100569, 'phili3@gmail.com', 1, NULL, '2023-09-20 16:00:45'),
(6, 100567, 'phil2@gmail.com', 1, NULL, '2023-09-20 16:00:45'),
(7, 100568, 'phils@gmail.com', 1, NULL, '2023-09-20 16:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `userRefID` int NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sureName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isDeceased` boolean NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`userRefID`, `firstName`, `sureName`, `isDeceased`, `created_at`, `updated_at`) VALUES
(100566, 'Phil', 'Philsibe', 0, '2023-09-19 20:35:26', NULL),
(100567, 'Phillip', 'Olalere', 0, '2023-09-19 20:35:26', NULL),
(100568, 'John', 'Felix', 0, '2023-09-19 20:36:30', NULL),
(100569, 'Ibrahim', 'Abraham', 0, '2023-09-19 20:36:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`userRefID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emailID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `userRefID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100570;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
