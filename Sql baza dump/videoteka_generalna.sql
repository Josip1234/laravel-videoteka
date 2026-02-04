-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2026 at 01:01 PM
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
-- Database: `videoteka_generalna`
--

-- --------------------------------------------------------

--
-- Table structure for table `clan`
--

CREATE TABLE `clan` (
  `oib` char(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `broj_telefona` varchar(20) NOT NULL,
  `spol` char(1) NOT NULL,
  `datumRodjenja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clanska_iskaznica`
--

CREATE TABLE `clanska_iskaznica` (
  `broj_iskaznice` varchar(20) NOT NULL,
  `oib_videoteke` char(11) NOT NULL,
  `oib_clana` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_02_04_112430_create_videoteka_table', 1),
(2, '2026_02_04_113015_create_clan_table', 2),
(3, '2026_02_04_113432_create_clanska_iskaznica_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `videoteka`
--

CREATE TABLE `videoteka` (
  `oib` char(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `adresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clan`
--
ALTER TABLE `clan`
  ADD PRIMARY KEY (`oib`);

--
-- Indexes for table `clanska_iskaznica`
--
ALTER TABLE `clanska_iskaznica`
  ADD PRIMARY KEY (`broj_iskaznice`),
  ADD UNIQUE KEY `oib_cl_uk` (`oib_clana`),
  ADD KEY `clanska_iskaznica_oib_videoteke_foreign` (`oib_videoteke`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videoteka`
--
ALTER TABLE `videoteka`
  ADD PRIMARY KEY (`oib`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clanska_iskaznica`
--
ALTER TABLE `clanska_iskaznica`
  ADD CONSTRAINT `clanska_iskaznica_oib_clana_foreign` FOREIGN KEY (`oib_clana`) REFERENCES `clan` (`oib`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clanska_iskaznica_oib_videoteke_foreign` FOREIGN KEY (`oib_videoteke`) REFERENCES `videoteka` (`oib`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
