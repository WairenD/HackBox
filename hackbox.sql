-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 10:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `bb_users`
--

CREATE TABLE `bb_users` (
  `userID` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `priviledge_level` int(1) NOT NULL,
  `chat_link` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bb_users`
--

INSERT INTO `bb_users` (`userID`, `name`, `priviledge_level`, `chat_link`) VALUES
(1, 'Hingro', 1, 'AWEQVS'),
(2, 'Admin', 2, 'FTOQSV'),
(3, 'Iremitic', 1, 'PRSVQA'),
(4, 'Ibearipl', 1, 'BDNCSA'),
(5, 'Uenitche', 1, 'OGETQS'),
(5023, 'ANDOR', 1, 'JKLRWX');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` smallint(255) NOT NULL,
  `userEmail` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userName` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userPassword` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `bestTime` time NOT NULL,
  `currentLevel` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `userEmail`, `userName`, `userPassword`, `startTime`, `endTime`, `bestTime`, `currentLevel`) VALUES
(2, 'asd123@gmail.com', 'test', '$2y$10$58UOXYrVYtm2epTz/nHy9ObBZ9VjyVb4B', '2021-01-12 06:30:16', '2021-01-26 12:16:13', '341:45:57', 5),
(9, 'robert.murcsek@student.nhlstenden.com', 'Robert', '$2y$10$ctVQrc8Y8UD7BnAf9rYlqu8uvu.aRgSwQ', '2021-01-26 08:30:17', '0000-00-00 00:00:00', '00:00:00', 0),
(10, 'smt@asd.com', 'smt', '$2y$10$ol174RtHuFoVMpHhggUODOSjmIKQLpxDb', '2021-01-26 12:27:40', '0000-00-00 00:00:00', '00:00:00', 1),
(11, 'test123@123.com', 'test123', '$2y$10$LqqUiIpu8Ov58oq5hc/rae3x5tUH6CU7P', '2021-01-27 12:11:55', '2021-02-04 09:45:06', '189:33:11', 4),
(12, 'qqq@qwe.com', 'qqq', '$2y$10$9A2AVvr1okTESQ.SiJgf1u0ihFCY0wJLT', '2021-01-27 07:43:44', '2021-01-27 07:44:28', '00:14:11', 4),
(13, 'aaa@a.com', 'aaa', '$2y$10$P4gF.waSVb2evtaksUlXReHvS1FuDqbvq', '2021-01-27 07:51:50', '2021-01-27 07:52:30', '00:00:45', 4),
(14, '1@1.com', '1', '$2y$10$QohGr.6hFupdAdRBKHGibOqCtn4jMv5mk', '2021-02-03 02:28:11', '2021-02-03 02:29:47', '00:01:36', 4),
(15, 'lll@lll.com', 'lll', '$2y$10$kr1NcFa42IgCKipucFw8WO45emnHab2R/', '2021-02-04 10:05:34', '0000-00-00 00:00:00', '00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bb_users`
--
ALTER TABLE `bb_users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bb_users`
--
ALTER TABLE `bb_users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5025;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` smallint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
