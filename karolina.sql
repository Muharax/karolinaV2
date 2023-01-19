-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Sty 2023, 18:38
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `karolina`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(55) COLLATE utf8_polish_ci NOT NULL,
  `nr` int(11) DEFAULT NULL,
  `nazwa_zdjecia` varchar(33) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`, `nr`, `nazwa_zdjecia`) VALUES
(1, 'Pieczywo', 1, 'pieczywo'),
(2, 'Owoce', 2, 'owoce'),
(3, 'Przyprawy', 3, 'przyprawy'),
(4, 'Warzywa', 4, 'warzywa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id`, `id_user`, `id_produktu`, `ilosc`) VALUES
(1, 18, 2, 20),
(8, 18, 1, 12),
(9, 18, 3, 7),
(10, 18, 4, 3),
(11, 18, 5, 4),
(12, 18, 6, 1),
(13, 18, 7, 1),
(14, 18, 8, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pieczywo`
--

CREATE TABLE `pieczywo` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `ilosc` int(11) NOT NULL,
  `nazwa_zdjecia` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pieczywo`
--

INSERT INTO `pieczywo` (`id`, `nazwa`, `cena`, `ilosc`, `nazwa_zdjecia`) VALUES
(1, 'Bułka zwykła', 1.09, 77, 'bulka-zwykla'),
(2, 'Bułka niezwykła', 2.09, 32, 'bulka-niezwykla'),
(3, 'Bułka kaizerka', 0.99, 12, 'bulka-niezwykla'),
(4, 'Chleb pszenny', 1.59, 12, 'bulka-niezwykla'),
(5, 'Chleb razowy', 1.99, 12, 'bulka-niezwykla'),
(6, 'Chleb razowy wielozbożowy', 1.99, 12, 'bulka-niezwykla'),
(7, 'Bagietka długa', 1.99, 12, 'bulka-niezwykla'),
(8, 'Bagietka', 1.99, 12, 'bulka-niezwykla');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `ilosc` int(11) NOT NULL,
  `nazwa_zdjecia` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `jm` varchar(6) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `id_kategorii`, `nazwa`, `cena`, `ilosc`, `nazwa_zdjecia`, `jm`) VALUES
(1, 1, 'Bułka duża', 1.09, 77, 'bulka-duza', ''),
(2, 1, 'Kaizerka', 2.09, 32, 'kaizerka', ''),
(3, 1, 'Bułka mała', 0.99, 12, 'bulka-mala', ''),
(4, 1, 'Chleb mały', 1.59, 12, 'chleb-maly', ''),
(5, 1, 'Chleb razowy', 1.99, 12, 'bulka-niezwykla', ''),
(6, 2, 'Jabłka polskie', 1.99, 12, 'jablka-polskie', ''),
(7, 2, 'Pomarańcze', 1.99, 12, 'pomarancze', 'kg'),
(8, 3, 'Pieprz czarny KNORR', 2.99, 12, 'pieprz-knorr', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `pkt` int(11) NOT NULL,
  `logowania` int(11) NOT NULL,
  `data_rejestracji` datetime NOT NULL COMMENT 'Data Rejestracji',
  `imie` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `ip` varchar(20) NOT NULL,
  `EAN` varchar(22) NOT NULL DEFAULT 'XXX',
  `stanKonta` float NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `pkt`, `logowania`, `data_rejestracji`, `imie`, `nazwisko`, `ip`, `EAN`, `stanKonta`) VALUES
(18, 'ADMIN11', '$2y$10$lcVDzhWdbXJ87mr9mdcqqObFRV.WsbkbU5McOaQ4LCbBqOEhS6enW', 398, 990, '2021-04-24 12:10:15', 'Mirosław', 'Kanciarz', '', '84:0b:16:c3', 0),
(22, 'ADMIN111', '$2y$10$eh.K9KnWTAYpNDw1FtX19OtVUFliDl56XBWghH5JtoHAIJTeYnV16', 5, 48, '2021-04-24 12:10:15', 'Michał ', 'Rozkrok', '', 'XXX', 0),
(25, '01585', '$2y$10$eh.K9KnWTAYpNDw1FtX19OtVUFliDl56XBWghH5JtoHAIJTeYnV16', 2, 31, '2021-04-24 12:10:15', 'Admin', 'Admin', '', 'XXX', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pieczywo`
--
ALTER TABLE `pieczywo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `pieczywo`
--
ALTER TABLE `pieczywo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
