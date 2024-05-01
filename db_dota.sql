-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 05:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dota`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestpos`
--

CREATE TABLE `bestpos` (
  `bestpos_id` int(11) NOT NULL,
  `bestpos_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bestpos`
--

INSERT INTO `bestpos` (`bestpos_id`, `bestpos_name`) VALUES
(1, 'Position 1 (Carry)'),
(2, 'Position 2 (Mid Lane)'),
(3, 'Position 3 (Off Lane)'),
(4, 'Position 4 (Soft Support)'),
(5, 'Position 5 (Hard Support)');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `hero_id` int(11) NOT NULL,
  `hero_name` varchar(50) NOT NULL,
  `hero_altname` varchar(50) NOT NULL,
  `hero_description` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `bestpos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`hero_id`, `hero_name`, `hero_altname`, `hero_description`, `type_id`, `bestpos_id`) VALUES
(1, 'Lifestealer', 'N\'aix', 'Monster yang sukanya ngigit dan mencakar lawannya, dengan skill open wound nya dia akan mendapat tambahan life steal agar tidak mati', 1, 1),
(2, 'Faceless Void', 'Darkterror', 'Mas - mas bawa palu dah keknya tapi kecil, bisa time walk dan ngeberentiin waktu dengan chronosphere nya', 2, 1),
(3, 'Terrorblade', 'Demon Marauder', 'Monster galak yang berasal dari planet antah berantah, bisa berubah bentuk jadi lebih serem dan bisa juga merebut HP lawan dengan ultinya', 2, 1),
(4, 'Void Spirit', 'Inai', 'Sepuh bawa tongkat tapi buat gelud, bisa blink dan ngilang pokonya serem dah kalo deket dia', 4, 2),
(5, 'Ancient Apparition', 'Kaldr', 'Entah makhluk apa tapi dia itu dingin banget soalnya es, ngeselin soalnya bisa ngeslow lawan dan ngebekuin juga', 3, 5),
(6, 'Rubick', 'Grand Magus', 'Intinya dia ini bisa curi spell lawan, ngeselin kalo udah montek montek', 3, 4),
(7, 'Arc Warden', 'Zet', 'Makhluk aneh yang bisa nyiksa musuh kalo musuhnya sendiri dan bisa membelah diri menjadi dua, ada magnetic field juga biar gg', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Strength'),
(2, 'Agillity'),
(3, 'Intelligence'),
(4, 'Universal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestpos`
--
ALTER TABLE `bestpos`
  ADD PRIMARY KEY (`bestpos_id`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`hero_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `bestpos_id` (`bestpos_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestpos`
--
ALTER TABLE `bestpos`
  MODIFY `bestpos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `hero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hero`
--
ALTER TABLE `hero`
  ADD CONSTRAINT `hero_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `hero_ibfk_2` FOREIGN KEY (`bestpos_id`) REFERENCES `bestpos` (`bestpos_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
