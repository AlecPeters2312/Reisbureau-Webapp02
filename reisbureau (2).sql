-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 jun 2024 om 10:27
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
-- Tabelstructuur voor tabel `boekingen`
--

CREATE TABLE `boekingen` (
  `boekingsId` int(11) NOT NULL,
  `reisid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locaties`
--

CREATE TABLE `locaties` (
  `land` text NOT NULL,
  `stad` text NOT NULL,
  `locatieid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `locaties`
--

INSERT INTO `locaties` (`land`, `stad`, `locatieid`) VALUES
('Spain', 'Barcelona', 13),
('Thailand', 'Bangkok', 14),
('Italy', 'Rome', 15),
('Greece', 'Athens', 16),
('Philippines', 'Manila', 17),
('Japan', 'Tokyo', 18),
('Malaysia', 'Kuala Lumpur', 19),
('Curaçao', 'Willemstad', 20),
('Turkey', 'Istanbul', 21),
('Indonesia', 'Jakarta', 22),
('Portugal', 'Lisbon', 23),
('United Kingdom', 'London', 24),
('Vietnam', 'Hanoi', 25),
('Canada', 'Ottawa', 26),
('Iraq', 'Baghdad', 27),
('China', 'Beijing', 28),
('United States', 'Washington D.C.', 29),
('Morocco', 'Rabat', 30),
('Egypt', 'Cairo', 31),
('Germany', 'Berlin', 32),
('United Arab Emirates', 'Dubai', 33),
('India', 'New Delhi', 34),
('Mexico', 'Mexico City', 35),
('Australia', 'Canberra', 36),
('Nederland', 'Amsterdam', 37);

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resort`
--

CREATE TABLE `resort` (
  `hotelnaam` varchar(255) NOT NULL,
  `activiteit` varchar(255) NOT NULL,
  `locatieid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `reis_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `voornaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vluchten`
--

CREATE TABLE `vluchten` (
  `vluchtid` int(11) NOT NULL,
  `vertrekplek` int(11) NOT NULL,
  `reistijd` varchar(255) NOT NULL,
  `eindplek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vluchten`
--

INSERT INTO `vluchten` (`vluchtid`, `vertrekplek`, `reistijd`, `eindplek`) VALUES
(12, 26, '2', 31),
(13, 13, '2', 17),
(14, 37, '', 14);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `boekingen`
--
ALTER TABLE `boekingen`
  ADD PRIMARY KEY (`boekingsId`),
  ADD KEY `hotelid` (`hotelid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `fk_reis_id` (`reisid`);

--
-- Indexen voor tabel `locaties`
--
ALTER TABLE `locaties`
  ADD PRIMARY KEY (`locatieid`);

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`reisid`),
  ADD KEY `FK_vlucht_id` (`vluchtid`);

--
-- Indexen voor tabel `resort`
--
ALTER TABLE `resort`
  ADD PRIMARY KEY (`hotelid`),
  ADD KEY `locatieid` (`locatieid`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `idx_reis_id` (`reis_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexen voor tabel `vluchten`
--
ALTER TABLE `vluchten`
  ADD PRIMARY KEY (`vluchtid`),
  ADD KEY `fk_vertrekplek` (`vertrekplek`),
  ADD KEY `fk_eindplek` (`eindplek`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `boekingen`
--
ALTER TABLE `boekingen`
  MODIFY `boekingsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `locaties`
--
ALTER TABLE `locaties`
  MODIFY `locatieid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT voor een tabel `reizen`
--
ALTER TABLE `reizen`
  MODIFY `reisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `resort`
--
ALTER TABLE `resort`
  MODIFY `hotelid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `vluchten`
--
ALTER TABLE `vluchten`
  MODIFY `vluchtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `boekingen`
--
ALTER TABLE `boekingen`
  ADD CONSTRAINT `boekingen_ibfk_1` FOREIGN KEY (`hotelid`) REFERENCES `resort` (`hotelid`),
  ADD CONSTRAINT `boekingen_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `fk_reis_id` FOREIGN KEY (`reisid`) REFERENCES `reizen` (`reisid`);

--
-- Beperkingen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD CONSTRAINT `FK_vlucht_id` FOREIGN KEY (`vluchtid`) REFERENCES `vluchten` (`vluchtid`);

--
-- Beperkingen voor tabel `resort`
--
ALTER TABLE `resort`
  ADD CONSTRAINT `resort_ibfk_1` FOREIGN KEY (`locatieid`) REFERENCES `locaties` (`locatieid`);

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reis_ids` FOREIGN KEY (`reis_id`) REFERENCES `reizen` (`reisid`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`userId`);

--
-- Beperkingen voor tabel `vluchten`
--
ALTER TABLE `vluchten`
  ADD CONSTRAINT `fk_eindplek` FOREIGN KEY (`eindplek`) REFERENCES `locaties` (`locatieid`),
  ADD CONSTRAINT `fk_vertrekplek` FOREIGN KEY (`vertrekplek`) REFERENCES `locaties` (`locatieid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
