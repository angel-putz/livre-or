-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2023 at 01:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livreor`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'Bonjour', 1, '2023-12-18 11:28:49'),
(2, 'Bonjour', 1, '2023-12-18 11:30:19'),
(3, 'Bonjour', 1, '2023-12-18 11:30:57'),
(4, 'Hello', 2, '2023-12-18 11:34:49'),
(5, 'bob', 1, '2023-12-18 11:43:19'),
(6, '654', 1, '2023-12-18 11:59:04'),
(7, '55849549847', 1, '2023-12-18 13:10:52'),
(8, '123456789', 1, '2023-12-18 13:18:04'),
(9, '66', 1, '2023-12-18 14:12:42'),
(10, '599684', 1, '2023-12-18 15:10:31'),
(11, '3', 1, '2023-12-18 15:15:45'),
(12, '2', 2, '2023-12-18 15:31:56'),
(13, '10', 2, '2023-12-18 16:12:13'),
(14, '3', 1, '2023-12-19 15:01:20'),
(15, '20', 1, '2023-12-20 10:09:04'),
(16, '30', 4, '2023-12-20 13:08:38'),
(17, 'ezezsdq', 1, '2023-12-20 14:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Angel', 'bobo'),
(2, 'Bob', 'bob'),
(3, 'hdsghdf', 'lol'),
(4, 'Dede', 'mpol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
