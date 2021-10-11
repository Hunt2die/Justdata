-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 okt 2021 om 22:47
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justdata`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `data`
--

CREATE TABLE `data` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefoon` varchar(11) NOT NULL,
  `Onderwerp` varchar(255) NOT NULL,
  `Bericht` varchar(255) NOT NULL,
  `Bijlage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `data`
--

INSERT INTO `data` (`ID`, `Naam`, `Email`, `Telefoon`, `Onderwerp`, `Bericht`, `Bijlage`) VALUES
(47, 'Twan', 'Twan1304@hotmail.com', '0638488560', 'test', 'dit is een test', 0x4578616d656e6166737072616b656e20414f20414d4f2050312d4b312e706466);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `data`
--
ALTER TABLE `data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
