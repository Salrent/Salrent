-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Sty 2023, 14:19
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sale`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale`
--

CREATE TABLE `sale` (
  `nr` int(11) NOT NULL,
  `pietro` int(11) NOT NULL,
  `typ` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `miejsca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sale`
--

INSERT INTO `sale` (`nr`, `pietro`, `typ`, `status`, `miejsca`) VALUES
(5, 0, 'salakonf', 1, 20),
(6, 0, 'salakonf', 1, 20),
(7, 0, 'salakonf', 1, 30),
(8, 0, 'salawykl', 1, 30),
(9, 0, 'salawykl', 1, 40),
(10, 0, 'salawykl', 1, 40),
(11, 0, 'audytorium', 1, 120),
(12, 0, 'audytorium', 1, 120),
(105, 1, 'salakonf', 1, 20),
(106, 1, 'salakonf', 1, 20),
(107, 1, 'salakonf', 1, 30),
(108, 1, 'salawykl', 1, 30),
(109, 1, 'salawykl', 0, 40),
(110, 1, 'salawykl', 0, 40),
(111, 1, 'audytorium', 1, 120),
(112, 1, 'audytorium', 1, 120);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sale`
--
ALTER TABLE `sale`
  ADD KEY `nr` (`nr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
