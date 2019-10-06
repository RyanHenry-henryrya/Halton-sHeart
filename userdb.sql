-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 12:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameNum` int(11) NOT NULL,
  `userNum` int(11) NOT NULL,
  `finalScore` bigint(20) NOT NULL,
  `datePlayed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `prim` int(11) NOT NULL,
  `userNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`prim`, `userNum`) VALUES
(44, 81);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userNum` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8_bin NOT NULL,
  `passHash` varchar(100) COLLATE utf8_bin NOT NULL,
  `gamesPlayed` int(11) NOT NULL DEFAULT 0,
  `totalScore` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userNum`, `username`, `passHash`, `gamesPlayed`, `totalScore`) VALUES
(79, 'Ryanyan', '7d3429d7f48d82b873590e62d19cee26b4867ac3ab8651ca4ee848c062d60703590bd43c93bf3c49ef4c985413c98629', 0, 0),
(80, 'Another', '1247ce00f594620f81cd30232c8855f6b9da92a038c55c109b5e39dd11a99d853c892654fca605322c303db9efcb7f8b', 0, 0),
(81, 'Allam', '0b4fc58091c09f3fce69308e1b1eb5e9196102246911119efb038c85fb5f7100336f55b459605d8252f6f2a5503e26e1', 0, 0),
(82, 'NewNewNew', 'd30021b4ad11e86c6902abacb28ce19688dc2f5d88b9195dea8ba05cab4fa9bb3ec1c32ab3ee22ba59e00ba38736f6de', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameNum`),
  ADD KEY `userNum` (`userNum`),
  ADD KEY `userNum_2` (`userNum`),
  ADD KEY `userNum_3` (`userNum`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`prim`),
  ADD UNIQUE KEY `userNum` (`userNum`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userNum`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `passHash` (`passHash`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameNum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `prim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
