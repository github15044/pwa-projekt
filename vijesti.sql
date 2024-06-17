-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 06:54 PM
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
-- Database: `vijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Mihaela', 'Rotim', 'mihaela44', '$2y$10$Xi7ocIpp4WMROXQ140pGruRvOccumWxncUAouX9H7pSGUvZtRRt7u', 0),
(2, 'Mirko', 'Mirić', 'mirko123', '$2y$10$LtuZssAkoq6vjN3NXGaZ0./A1KXsEWFYVY8s3XtICtMAFx2CSUgaW', 0),
(3, 'Mirko', 'Miric', 'mirko14', '$2y$10$lir6UwuETOHE3MpkFqNyiOO/Pl/jWJ3UOUx1TUR.RDy0CmI9IMqJ6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unos vijesti`
--

CREATE TABLE `unos vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unos vijesti`
--

INSERT INTO `unos vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '13.06.2024.', '', '', '', '', '', 0),
(44, '13.06.2024.', 'Naslov vijesti', 'Kratki sadržaj vijesti (do 50 znakova)\r\n', 'Sadržaj vijesti\r\n', 'earth2.jpg', 'kultura', 0),
(45, '13.06.2024.', '', '', '', '', '', 0),
(46, '13.06.2024.', 'Naslov vijesti', 'Kratki sadržaj vijesti (do 50 znakova)\r\n', 'Sadržaj vijesti\r\n', 'earth2.jpg', 'kultura', 0),
(47, '13.06.2024.', 'Naslov vijesti', 'Kratki sadržaj vijesti (do 50 znakova)\r\n', 'Sadržaj vijesti\r\n', 'earth2.jpg', 'kultura', 0),
(48, '13.06.2024.', '', '', '', '', '', 0),
(49, '13.06.2024.', '', '', '', '', '', 0),
(50, '13.06.2024.', 'Naslov123456', 'Aaadssddsssssssssssss', 'sddssdsd', 'earth2.jpg', 'kultura', 0),
(51, '13.06.2024.', 'dffd', 'dfdfdffffffff', 'ffdfddf', '', '', 0),
(52, '13.06.2024.', '', '', '', '', '', 0),
(53, '13.06.2024.', '', '', '', '', '', 0),
(54, '13.06.2024.', '', '', '', '', '', 0),
(55, '13.06.2024.', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `unos vijesti`
--
ALTER TABLE `unos vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unos vijesti`
--
ALTER TABLE `unos vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
