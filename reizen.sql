-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 jun 2024 om 13:21
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reisbureau`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reizen`
--

CREATE TABLE `reizen` (
  `reisid` int(11) NOT NULL,
  `reisnaam` text NOT NULL,
  `prijs` double NOT NULL,
  `datum` date NOT NULL,
  `vluchtid` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reizen`
--

INSERT INTO `reizen` (`reisid`, `reisnaam`, `prijs`, `datum`, `vluchtid`, `img`, `beschrijving`) VALUES
(12, 'Amsterdam Cairo', 600, '2008-12-09', 14, 'img\\land1.png', 'een heerlijke reis het verleden in om te kijken hoe de Egyptenaren vroeger leefden ');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`reisid`),
  ADD KEY `FK_vlucht_id` (`vluchtid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `reizen`
--
ALTER TABLE `reizen`
  MODIFY `reisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD CONSTRAINT `FK_vlucht_id` FOREIGN KEY (`vluchtid`) REFERENCES `vluchten` (`vluchtid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
