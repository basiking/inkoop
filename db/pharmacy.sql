-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 mrt 2021 om 22:49
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `contactID` int(5) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `streetName` varchar(100) NOT NULL,
  `streetNumber` varchar(10) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `postalCode` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`contactID`, `firstName`, `lastName`, `streetName`, `streetNumber`, `cityName`, `postalCode`, `phoneNumber`, `email`, `date`, `message`) VALUES
(4, 'sadfasfdfdsaafsd', 'sdfakjlhfadshjklafdshkjlfd', 'jfasdkjhlfsdakjlsdfa', 'eqrdfaskjh', 'erqsdfagvkjlhdsfahkljfdashjkl', 'qrafsdkjlhasdflkjhad', 'qrsafdhkjlfdsahjlkka', 'asdfhjklfsdajklhdfsajkhl@adsf.fdgh', '2021-03-09 11:43:17', 'sdfvaljkhjakhdlsfgljkahsfdhjlkafsdvhlkjasdfhjlksfdalkhjsfadlhkjasfdjlhksdfa hljksfadlkjhsdfalkhjsfadlhkjasfdjklhdsaf'),
(5, 'sadfsfdsfd', 'sfdasadfsafdsfa', 'dasfdfsdaasfd', 'safdfsadfa', 'safdasfdsfad', 'sdfafdsaafdsf', 'dsafsdasfadfdsa', 'sadfsfda@asdfdsfa.jk', '2021-03-10 11:30:09', 'aids'),
(6, 'asdf', 'dafs', 'dfsa', 'sdfa', 'sadf', 'fsda', 'fasd', 'afsd@asfd.c', '2021-03-11 17:39:20', 'aasdasdsda'),
(7, 'dsfdsaffads', 'fsdasadfsafd', 'sadsfadasfdafsd', '234', 'asdf', '1788 GB', '0682049747', 'asdfdfsaasdfafds@asdf.nl', '2021-03-13 01:53:33', 'adsfafsdasfdasdfasdf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicine`
--

CREATE TABLE `medicine` (
  `medicineID` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medicine`
--

INSERT INTO `medicine` (`medicineID`, `name`, `info`) VALUES
(3, 'Diclofenac', 'Pijnstiller met een onstekingsremmende werking'),
(4, 'Amoxicilline', 'Antibioticum voor bepaalde infecties.'),
(5, 'Omeprazol', 'Medicijn voor maagklachten bij klachten als brandend maagzuur of maagzweren.'),
(6, 'Doxycycline', 'Antibiotica voor infecties en bij acne of de ziekte van Lyme'),
(7, 'Ibuprofen', 'Ontstekingsremmend medicijn dat wordt voorgeschreven bij pijn of koorts'),
(8, 'Metoprolol', 'Geneesmiddel dat de hartslag vertraagt en de bloeddruk verlaagt.'),
(9, 'Salbutamol', 'Ontspant de spieren en zorgt er voor dat je gemakkelijker kunt ademen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `news`
--

INSERT INTO `news` (`newsID`, `title`, `content`, `date`) VALUES
(1, 'Text Nieuws', 'dit is een textbericht', '2021-01-28'),
(2, 'Nieuwsbericht 2', 'Dit is een tweede nieuwsbericht', '2021-01-29'),
(3, 'ayy lmao', '9/11 was een inside job', '2021-01-21'),
(4, 'Wow wat mooi', 'dit is een heel oud nieuwsbericht', '2020-12-17'),
(5, 'toekomst', 'dit bericht komt uit de toekomst... o shieet', '2023-03-02');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `creationDate`) VALUES
(1, 'asdf', '$2y$10$A4k6GKfMu5qkirXbqHuVRuwD/77aJaNF.Xo.ZSHH6lxZ68CRnXO7G', 'asdfdfsaasdfafds@asdf.nl', '2021-03-13 01:57:55'),
(2, 'yeet', '$2y$10$vjd47LY0P6XhAYiWGMoPAuuyJfvRYh/saFLph9hD6xUWgLW7MaMbe', 'yeet@yeet.nl', '2021-03-13 02:07:55'),
(4, 'haaaaaaaaaaha', '$2y$10$5DQG5NbAGsODlKYKTXoxi.iLZuRgG03BCPXAoScNA6O7x7H.C8oRS', 'oooooooooooo@oo.nl', '2021-03-24 21:48:31');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`),
  ADD UNIQUE KEY `contactID` (`contactID`);

--
-- Indexen voor tabel `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicineID`),
  ADD UNIQUE KEY `medicineID` (`medicineID`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`),
  ADD UNIQUE KEY `newsID` (`newsID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicineID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
