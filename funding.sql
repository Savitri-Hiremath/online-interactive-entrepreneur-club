-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 08:25 AM
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
-- Database: `entrepreneurclub`
--

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
(1, 'Nandini', 'Self', 1000000, '2024-01-30', '$2y$10$NbQCyeHUKs4PbbQOuVhk6ehcCYGEYaT0v239C1WKgSPlqQnCwJHGO'),
(2, 'Ranjitha', 'Loan', 1500000, '2024-02-02', '$2y$10$JdLJK/ozN9XR2jP5Y5sWMuKcF1DzAWheGNiZ6cyRMJVzxPsDuyQLC'),
(3, 'Savitri', 'Self', 1800000, '2024-02-09', '$2y$10$PjkvoYDbfAg3mQuyaxv16ecjHFQ6gUTiAZ9mQHFuePH7wRuy1xvbK'),
(4, 'Ganapriya', 'Self', 2200000, '2024-02-10', '$2y$10$8XiO9oxCJ1aHIXFBiy7CvevR9KknCLVzMFh/mPPRTvThfFCvqZ6UG'),
(5, 'Monica', 'Self', 2500000, '2024-01-18', '$2y$10$J9v9qjm/nnoVJvumGRroJ.7P/iS0Ui0xhf5coR/vX7aupNKzEKSIW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funding`
--
ALTER TABLE `funding`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funding`
--
ALTER TABLE `funding`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
