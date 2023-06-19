-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 03:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musorujsag`
--

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `Jelszo` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `FelhasznaloNev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `felhasznalo`
--

INSERT INTO `felhasznalo` (`Jelszo`, `FelhasznaloNev`, `Email`) VALUES
('toterik', 'toterik', 'toterik@citromail.hu'),
('jelszo', 'totherik', 'toterik3@citromail.hu');

-- --------------------------------------------------------

--
-- Table structure for table `kedvencek`
--

CREATE TABLE `kedvencek` (
  `FelhasznaloNev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `MusorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `kedvencek`
--

INSERT INTO `kedvencek` (`FelhasznaloNev`, `MusorId`) VALUES
('totherik', 30),
('totherik', 36),
('totherik', 28),
('totherik', 33),
('totherik', 35),
('toterik', 34),
('toterik', 30),
('toterik', 33),
('toterik', 28);

-- --------------------------------------------------------

--
-- Table structure for table `leadja`
--

CREATE TABLE `leadja` (
  `MusorId` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Mettol` time NOT NULL,
  `Meddig` time NOT NULL,
  `CsatornaNev` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `leadja`
--

INSERT INTO `leadja` (`MusorId`, `Datum`, `Mettol`, `Meddig`, `CsatornaNev`) VALUES
(1, '2022-11-19', '09:20:00', '10:20:00', 'RTL'),
(2, '2022-11-19', '10:20:00', '10:55:00', 'RTL'),
(3, '2022-11-19', '14:50:00', '18:00:00', 'RTL'),
(4, '2022-11-19', '18:00:00', '19:00:00', 'RTL'),
(5, '2022-11-19', '19:00:00', '20:00:00', 'RTL'),
(6, '2022-11-19', '23:30:00', '02:15:00', 'RTL'),
(7, '2022-11-19', '11:20:00', '11:55:00', 'TV2'),
(8, '2022-11-19', '13:50:00', '15:50:00', 'TV2'),
(9, '2022-11-19', '15:50:00', '18:00:00', 'TV2'),
(10, '2022-11-19', '18:00:00', '18:55:00', 'TV2'),
(11, '2022-11-19', '23:00:00', '01:35:00', 'TV2'),
(12, '2022-11-20', '01:35:00', '03:35:00', 'TV2'),
(13, '2022-11-19', '18:55:00', '19:30:00', 'TV2'),
(14, '2022-11-19', '10:25:00', '11:30:00', 'VIASAT3'),
(15, '2022-11-19', '11:30:00', '12:25:00', 'VIASAT3'),
(16, '2022-11-19', '14:20:00', '14:50:00', 'VIASAT3'),
(17, '2022-11-19', '21:00:00', '23:10:00', 'VIASAT3'),
(18, '2022-11-19', '23:10:00', '01:15:00', 'VIASAT3'),
(19, '2022-11-20', '03:20:00', '04:20:00', 'VIASAT3'),
(20, '2022-11-19', '15:40:00', '15:45:00', 'M5'),
(21, '2022-11-19', '17:25:00', '18:00:00', 'M5'),
(22, '2022-11-19', '18:00:00', '18:45:00', 'M5'),
(23, '2022-11-19', '19:00:00', '20:00:00', 'M5'),
(24, '2022-11-19', '20:00:00', '21:00:00', 'M5'),
(25, '2022-11-20', '01:00:00', '01:15:00', 'M5'),
(27, '2022-11-19', '18:25:00', '18:35:00', 'DUNA TV'),
(28, '2022-11-19', '17:50:00', '18:00:00', 'DUNA TV'),
(29, '2022-11-19', '21:30:00', '22:50:00', 'M4 SPORT'),
(30, '2022-11-20', '01:00:00', '04:00:00', 'DUNA TV'),
(31, '2022-11-20', '14:20:00', '15:50:00', 'DUNA TV'),
(32, '2022-11-20', '04:15:00', '04:45:00', 'M4 SPORT'),
(33, '2022-11-20', '09:15:00', '10:15:00', 'M4 SPORT'),
(34, '2022-11-20', '10:15:00', '11:00:00', 'M4 SPORT'),
(35, '2022-11-20', '21:45:00', '22:15:00', 'M4 SPORT'),
(36, '2022-11-20', '22:00:00', '21:45:00', 'M4 SPORT'),
(52, '2022-11-27', '11:11:00', '20:00:00', 'DUNA TV');

-- --------------------------------------------------------

--
-- Table structure for table `musor`
--

CREATE TABLE `musor` (
  `MusorId` int(11) NOT NULL,
  `Hossz` int(3) NOT NULL,
  `Nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `Korhatar` int(2) NOT NULL,
  `CsatornaNev` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `musor`
--

INSERT INTO `musor` (`MusorId`, `Hossz`, `Nev`, `Korhatar`, `CsatornaNev`) VALUES
(1, 60, 'Teleshop', 0, 'RTL'),
(2, 26, 'Brandmánia', 12, 'RTL'),
(3, 138, 'Harry Potter', 12, 'RTL'),
(4, 50, 'RTL Híradó', 0, 'RTL'),
(5, 36, 'Fókusz Plusz', 12, 'RTL'),
(6, 122, 'Joker', 16, 'RTL'),
(7, 23, 'Innovátor', 12, 'TV2'),
(8, 93, 'Las Bandidas', 12, 'TV2'),
(9, 115, 'Columbo', 12, 'TV2'),
(10, 50, 'Tények', 12, 'TV2'),
(11, 119, 'Jack Reacher', 16, 'TV2'),
(12, 109, 'Terminátor', 12, 'TV2'),
(13, 30, 'Tények Plusz', 12, 'TV2'),
(14, 50, 'Sütimester', 12, 'VIASAT3'),
(15, 50, 'Doktor Murphy', 12, 'VIASAT3'),
(16, 30, 'Brigi és Brúnó', 12, 'VIASAT3'),
(17, 96, 'Azt beszélik', 12, 'VIASAT3'),
(18, 96, 'Béke, szerelem és félreértés', 15, 'VIASAT3'),
(19, 45, 'Elfedve', 12, 'VIASAT3'),
(20, 10, 'Egy perc híradó', 0, 'M5'),
(21, 26, 'Magyar nők', 0, 'M5'),
(22, 40, 'Kontúr', 0, 'M5'),
(23, 50, 'Büszkeség és balítélet', 12, 'M5'),
(24, 52, 'M5 história', 12, 'M5'),
(25, 10, 'Agenda', 0, 'M5'),
(27, 15, 'Nemzeti Sporthíradó', 12, 'DUNA TV'),
(28, 5, 'Csodákkal teli tél', 12, 'DUNA TV'),
(29, 60, 'Forma-1', 12, 'M4 SPORT'),
(30, 129, 'Trianon', 12, 'DUNA TV'),
(31, 84, '3:1 a szerelem javára', 12, 'DUNA TV'),
(32, 30, 'Pecatúra', 12, 'M4 SPORT'),
(33, 77, 'GÓÓÓL!', 12, 'M4 SPORT'),
(34, 45, 'Felvezető műsor', 0, 'M4 SPORT'),
(35, 45, 'Értékelő műsor', 0, 'M4 SPORT'),
(36, 120, 'Labdarúgás', 12, 'M4 SPORT'),
(52, 11, 'asdasda', 11, 'DUNA TV');

-- --------------------------------------------------------

--
-- Table structure for table `stablista`
--

CREATE TABLE `stablista` (
  `SzeIg` varchar(8) COLLATE utf8_hungarian_ci NOT NULL,
  `Nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `MunkaKor` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `Nem` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `MusorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `stablista`
--

INSERT INTO `stablista` (`SzeIg`, `Nev`, `MunkaKor`, `Nem`, `MusorId`) VALUES
('12345AA', 'Barabás Éva-Leó', 'Műsorvezető', 'Nő', 1),
('12345AB', 'Simon Krisztián', 'Műsorvezető', 'Férfi', 2),
('12345AC', 'Istenes Bence', 'Műsorvezető', 'Férfi', 2),
('12345AD', 'Daniel Radcliffe', 'Szereplő', 'Férfi', 3),
('12345AE', 'Rupert Grint', 'Szereplő', 'Férfi', 3),
('12345AF', 'Emma Watson', 'Szereplő', 'Nő', 3),
('12345AG', 'David Yates', 'Rendező', 'Férfi', 3),
('12345AH', 'J.K. Rowling', 'Író', 'Nő', 3),
('12345AI', 'Michael Goldenberg', 'Forgatókönyvíró', 'Férfi', 3),
('12345AJ', 'Erős Antónia', 'Műsorvezető', 'Nő', 4),
('12345AK', 'Szellő István', 'Műsorvezető', 'Férfi', 4),
('12345AL', 'Barabás Éva', 'Műsorvezető', 'Nő', 5),
('12345AM', 'Todd Phillips', 'Rendező', 'Férfi', 6),
('12345AN', 'Joaquin Phoenix', 'Szereplő', 'Férfi', 6),
('12345AO', 'Zazie Beetz', 'Szereplő', 'Férfi', 6),
('12345AP', 'Robert De Niro', 'Szereplő', 'Férfi', 6),
('12345AQ', 'Stohl Luca', 'Házigazda', 'Nő', 7),
('12345AR', 'Joachim Ronning', 'Rendező', 'Férfi', 8),
('12345AS', 'Espen Sandberg', 'Rendező', 'Férfi', 8),
('12345AT', 'Salma Hayek', 'Szereplő', 'Nő', 8),
('12345AU', 'Penélope Cruz', 'Szereplő', 'Férfi', 8),
('12345AV', 'Steve Zahn', 'Szereplő', 'Férfi', 8),
('12345AW', 'Richard Irving', 'Rendező', 'Férfi', 9),
('12345AX', 'James Frawley', 'Rendező', 'Férfi', 9),
('12345AY', 'Vincent McEveety', 'Rendező', 'Férfi', 9),
('12345AZ', 'Peter Falk', 'Szereplő', 'Férfi', 9),
('12345BA', 'John Finnegan', 'Szereplő', 'Férfi', 9),
('12345BB', 'Marsi Anikó', 'Műsorvezető', 'Nő', 10),
('12345BC', 'Gönczi Gábor', 'Műsorvezető', 'Férfi', 10),
('12345BD', 'Andor Éva', 'Műsorvezető', 'Nő', 10),
('12345BE', 'Edward Zwick', 'Rendező', 'Férfi', 11),
('12345BF', 'Marshall Herskovitz', 'Forgatókönyvíró', 'Férfi', 11),
('12345BG', 'Edward Zwick', 'Forgatókönyvíró', 'Férfi', 11),
('12345BH', 'Tom Cruise', 'Szereplő', 'Férfi', 11),
('12345BI', 'Cobie Smulders', 'Szereplő', 'Férfi', 11),
('12345BJ', 'Jonathan Mostow', 'Rendező', 'Férfi', 12),
('12345BK', 'John D. Brancato', 'Forgatókönyvíró', 'Férfi', 12),
('12345BL', 'Michael Ferris', 'Forgatókönyvíró', 'Férfi', 12),
('12345BM', 'Arnold Schwarzenegger', 'Szereplő', 'Férfi', 12),
('12345BN', 'Nick Stahl', 'Szereplő', 'Férfi', 12),
('12345BO', 'Iszak Eszter', 'Műsorvezető', 'Nő', 13),
('12345BP', 'Jo Brand', 'Műsorvezető', 'Nő', 14),
('12345BQ', 'Mike Listo', 'Rendező', 'Férfi', 15),
('12345BR', 'Seth Gordon', 'Rendező', 'Férfi', 15),
('12345BS', 'David Shore', 'Forgatókönyvíró', 'Férfi', 15),
('12345BT', 'Freddie Highmore', 'Szereplő', 'Férfi', 15),
('12345BU', 'Nicholas Gonzalez', 'Szereplő', 'Férfi', 15),
('12345BV', 'Herendi Gábor', 'Rendező', 'Férfi', 16),
('12345BW', 'Ipacs Gergely', 'Rendező', 'Férfi', 16),
('12345BX', 'Oroszlán Szonja', 'Szereplő', 'Nő', 16),
('12345BY', 'Szabó Győző', 'Szereplő', 'Férfi', 16),
('12345BZ', 'Rob Reiner', 'Rendező', 'Férfi', 17),
('12345CA', 'Ted Griffin', 'Forgatókönyvíró', 'Férfi', 17),
('12345CB', 'Jennifer Aniston', 'Szereplő', 'Nő', 17),
('12345CC', 'Kevin Costner', 'Szereplő', 'Férfi', 17),
('12345CD', 'Bruce Beresford', 'Rendező', 'Férfi', 18),
('12345CE', 'Christina Mengert', 'Forgatókönyvíró', 'Nő', 18),
('12345CF', 'Catherine Keener', 'Szereplő', 'Nő', 18),
('12345CG', 'Jane Fonda', 'Szereplő', 'Nő', 18),
('12345CH', 'Matthew Cirulnick', 'Producer', 'Férfi', 19),
('12345CI', 'Stana Katic', 'Producer', 'Nő', 19),
('12345CJ', 'Stana Katic', 'Szereplő', 'Nő', 19),
('12345CK', 'Patrick Heusinger', 'Szereplő', 'Férfi', 19),
('12345CL', 'Lantos Csaba', 'Műsorvezető', 'Férfi', 20),
('12345CM', 'Gyimesi Emese', 'Műsorvezető', 'Nő', 21),
('12345CN', 'Feke Pál', 'Műsorvezető', 'Férfi', 22),
('12345CO', 'Simon Langton', 'Rendező', 'Férfi', 23),
('12345CP', 'Jane Austen', 'Író', 'Nő', 23),
('12345CQ', 'Andrew Davies', 'Forgatókönyvíró', 'Férfi', 23),
('12345CR', 'Colin Firth', 'Szereplő', 'Férfi', 23),
('12345CS', 'Jennifer Ehle', 'Szereplő', 'Nő', 23),
('12345CT', 'Kassai Katalin', 'Műsorvezető', 'Nő', 24),
('12345CU', 'Morvai Noémi', 'Műsorvezető', 'Nő', 25),
('12345CW', 'Horváth Gergely Áron', 'Bemondó', 'Férfi', 27),
('12345CX', 'Vaszary János', 'Rendező', 'Férfi', 31),
('12345CY', 'Békeffy István', 'Forgatókönyvíró', 'Férfi', 31),
('12345CZ', 'Pálóczy László', 'Forgatókönyvíró', 'Férfi', 31),
('12345DA', 'Bársony Rózsi', 'Szereplő', 'Nő', 31),
('12345DB', 'Pálóczy László', 'Szereplő', 'Férfi', 31),
('12345DC', 'Tősér Ádám', 'Rendező', 'Férfi', 30),
('12345DD', 'Babos Tamás', 'Rendező', 'Férfi', 30),
('12345DE', 'Apponyi Albert', 'Szereplő', 'Férfi', 30),
('12345DF', 'Kelemen József', 'Szereplő', 'Férfi', 30),
('12345DG', 'Petrovics-Mérei Andrea', 'Műsorvezető', 'Nő', 29),
('12345DH', 'hamerli tibor', 'Szereplő', 'Férfi', 32),
('12345DI', 'Bozsik Péter', 'Műsorvezető', 'Férfi', 33),
('12345DJ', 'Petrovics-Mérei Andrea', 'Műsorvezető', 'Nő', 34),
('12345DK', 'Takács Krisztina', 'Műsorvezető', 'Nő', 35),
('12345DL', 'Hajdú B. István', 'Kommentátor', 'Férfi', 36),
('12345DM', 'Knézy Jenő', 'Kommentátor', 'Férfi', 36);

-- --------------------------------------------------------

--
-- Table structure for table `tvcsatorna`
--

CREATE TABLE `tvcsatorna` (
  `CsatornaNev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `Felbontas` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `tvcsatorna`
--

INSERT INTO `tvcsatorna` (`CsatornaNev`, `Felbontas`) VALUES
('DUNA TV', 'HD'),
('M4 SPORT', 'Full HD'),
('M5', 'HD'),
('RTL', 'HD'),
('TV2', 'HD'),
('VIASAT3', 'Ultra HD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`FelhasznaloNev`);

--
-- Indexes for table `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD KEY `FelhasznaloNev` (`FelhasznaloNev`),
  ADD KEY `MusorId` (`MusorId`) USING BTREE;

--
-- Indexes for table `leadja`
--
ALTER TABLE `leadja`
  ADD KEY `MusorId` (`MusorId`),
  ADD KEY `CsatornaNev` (`CsatornaNev`);

--
-- Indexes for table `musor`
--
ALTER TABLE `musor`
  ADD PRIMARY KEY (`MusorId`),
  ADD KEY `CsatornaNev` (`CsatornaNev`);

--
-- Indexes for table `stablista`
--
ALTER TABLE `stablista`
  ADD PRIMARY KEY (`SzeIg`),
  ADD KEY `MusorId` (`MusorId`);

--
-- Indexes for table `tvcsatorna`
--
ALTER TABLE `tvcsatorna`
  ADD PRIMARY KEY (`CsatornaNev`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musor`
--
ALTER TABLE `musor`
  MODIFY `MusorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD CONSTRAINT `kedvencek_ibfk_2` FOREIGN KEY (`FelhasznaloNev`) REFERENCES `felhasznalo` (`FelhasznaloNev`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvencek_ibfk_3` FOREIGN KEY (`MusorId`) REFERENCES `musor` (`MusorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leadja`
--
ALTER TABLE `leadja`
  ADD CONSTRAINT `leadja_ibfk_3` FOREIGN KEY (`CsatornaNev`) REFERENCES `tvcsatorna` (`CsatornaNev`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leadja_ibfk_4` FOREIGN KEY (`MusorId`) REFERENCES `musor` (`MusorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `musor`
--
ALTER TABLE `musor`
  ADD CONSTRAINT `musor_ibfk_1` FOREIGN KEY (`CsatornaNev`) REFERENCES `tvcsatorna` (`CsatornaNev`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stablista`
--
ALTER TABLE `stablista`
  ADD CONSTRAINT `stablista_ibfk_1` FOREIGN KEY (`MusorId`) REFERENCES `musor` (`MusorId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
