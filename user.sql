-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Sty 2023, 12:29
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `salrent`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `miasto` varchar(255) NOT NULL,
  `kod` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `imie`, `nazwisko`, `email`, `haslo`, `miasto`, `kod`, `status`) VALUES
(1, 'dominik', 'jaszkowski', 'ja-do@wp.pl', '$2y$10$w21aVCZmK7w/YqWt9AZcqOGOZ5A66.enZC6WWxCc1Ger6zci1BPK2', 'Gdynia', 0, 'verified'),
(2, 'test1', 'tescik1', 'test1@wp.pl', '$2y$10$w21aVCZmK7w/YqWt9AZcqOGOZ5A66.enZC6WWxCc1Ger6zci1BPK2', '', 0, 'verified'),
(3, 'test2', 'tescik2', 'test2@wp.pl', '$2y$10$w21aVCZmK7w/YqWt9AZcqOGOZ5A66.enZC6WWxCc1Ger6zci1BPK2', '', 0, 'verified'),
(4, 'test3', 'tescik3', 'test3@wp.pl', '$2y$10$w21aVCZmK7w/YqWt9AZcqOGOZ5A66.enZC6WWxCc1Ger6zci1BPK2', '', 0, 'verified'),
(5, 'test4', 'tescik4', 'test4@wp.pl', '$2y$10$w21aVCZmK7w/YqWt9AZcqOGOZ5A66.enZC6WWxCc1Ger6zci1BPK2', '', 0, 'verified'),
(6, 'test5', 'tescik5', 'test5@wp.pl', '$2y$10$w21aVCZmK7w/YqWt9AZcqOGOZ5A66.enZC6WWxCc1Ger6zci1BPK2', '', 0, 'verified');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
