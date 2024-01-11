-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 11:43 AM
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
-- Database: `nhoblidar@gmail.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `SL_NO` int(11) NOT NULL,
  `Id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `StartupName` varchar(255) DEFAULT NULL,
  `StartupDomain` varchar(255) DEFAULT NULL,
  `BusinessModel` text DEFAULT NULL,
  `USP` text DEFAULT NULL,
  `TargetMarket` text DEFAULT NULL,
  `Revenue2022` int(11) DEFAULT NULL,
  `Revenue2023` int(11) DEFAULT NULL,
  `Profit` int(11) DEFAULT NULL,
  `PitchVideo` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`SL_NO`, `Id`, `Name`, `StartupName`, `StartupDomain`, `BusinessModel`, `USP`, `TargetMarket`, `Revenue2022`, `Revenue2023`, `Profit`, `PitchVideo`, `Password`) VALUES
(3, 3, 'Nandini', 'Bosch', 'feaeef', 'grwwr', 'rgere', 'wrgg', 233242, 234322, 8, 'http://localhost/pitch/WhatsApp Video 2024-01-01 at 00.04.22.mp4', '$2y$10$JnNUmwUHguLAFn1pwr.USuuQLZBwqUmUmi8ZVGMhCMrISvukKzwba'),
(5, 4, 'Ranjitha', 'Bosco', 'Food', 'fevev', 'rewr', 'wre', 23341, 32343, 23, 'http://localhost/pitch/WhatsApp Video 2024-01-01 at 00.04.22.mp4', '$2y$10$o2ujbURhIlB6Ac7er7nYnO1SdzIZ9pqdasIKGVuAhMM.GsY/iZw5G'),
(6, 4, 'Ranjitha', 'Ranja', 'fwfrw', 'erergf', 'refreg', 'wfewf', 32430, 43234, 22, 'http://localhost/pitch/WhatsApp Video 2024-01-01 at 00.04.22.mp4', '$2y$10$O4.5W5aTuFov9KJwcUcw.udXyJ4pDH7xYkPqdPwDjERkvgI0Jpqn2');

-- --------------------------------------------------------

--
-- Table structure for table `entry1`
--

CREATE TABLE `entry1` (
  `StartupName` varchar(255) NOT NULL,
  `StartupDomain` varchar(255) NOT NULL,
  `Revenue2022` float NOT NULL,
  `Revenue2023` float NOT NULL,
  `Profit` float NOT NULL,
  `Growth` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funding`
--

CREATE TABLE `funding` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Fundingtype` varchar(255) NOT NULL,
  `Amount` int(50) NOT NULL,
  `Deadline` date NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funding`
--

INSERT INTO `funding` (`ID`, `Name`, `Fundingtype`, `Amount`, `Deadline`, `Password`) VALUES
(3, 'Nandini', 'Self', 192829, '2024-01-17', '$2y$10$ycNcEExK8O8anaLKUj.RLOCZ/HYcjcKF21ikY0RW3OcavpAmdnvEi'),
(4, 'Ranjitha', 'Self', 28133, '2024-01-27', '$2y$10$VU0vBlMg9dnHMpMZSLvPdOrEwpyt9dB519sFqGFlFpkCPVEEehQSG'),
(5, 'Savitri', 'Loan', 28333, '2024-01-17', '$2y$10$qPL1V8GB/c/MWAK/Q9DKyeBcyHk0Kdu00t1KHjJ39IswHIcPuHpNm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`SL_NO`);

--
-- Indexes for table `entry1`
--
ALTER TABLE `entry1`
  ADD PRIMARY KEY (`StartupName`);

--
-- Indexes for table `funding`
--
ALTER TABLE `funding`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `SL_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funding`
--
ALTER TABLE `funding`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
