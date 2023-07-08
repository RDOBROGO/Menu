-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Lip 2023, 03:25
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
-- Baza danych: `menu`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dania_glowne`
--

CREATE TABLE `dania_glowne` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `skladniki` text NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dania_glowne`
--

INSERT INTO `dania_glowne` (`id`, `nazwa`, `skladniki`, `cena`) VALUES
(1, 'Kotlet schabowy z ziemniakami', 'Schab 200g<br>\r\nZiemniaki 100g<br>\r\nSurówka z kapusty / buraki / marchew 100g', 35),
(2, 'Rosół', '', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desery`
--

CREATE TABLE `desery` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `skladniki` text NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `danie` text NOT NULL,
  `kategoria` int(11) NOT NULL,
  `cena` float NOT NULL,
  `skladniki` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dishes`
--

INSERT INTO `dishes` (`id`, `danie`, `kategoria`, `cena`, `skladniki`) VALUES
(8, 'Kurczak curry', 1, 25, 'Kurczak</br>cebula</br>pomidory</br>przyprawy curry</br>mleko kokosowe</br>ryż'),
(9, 'Spaghetti bolognese', 1, 30, 'Makaron spaghetti</br>mielone mięso</br>cebula</br>czosnek</br>pomidory</br>sos pomidorowy</br>przyprawy'),
(10, 'Filet z łososia', 1, 35, 'Filet z łososia</br>cytryna</br>masło</br>zioła</br>sałata</br>ziemniaki'),
(11, 'Sernik', 2, 15, 'Ser biały</br>jajka</br>cukier</br>masło</br>herbatniki</br>wanilia'),
(12, 'Brownie z lodami', 2, 20, 'Czekolada</br>masło</br>jajka</br>cukier</br>mąka</br>lody waniliowe'),
(13, 'Tarta owocowa', 2, 18, 'Kruche ciasto</br>świeże owoce (truskawki, jagody, maliny)</br>cukier puder</br>żelatyna'),
(14, 'Coca-Cola', 3, 8, ''),
(15, 'Woda mineralna', 3, 5, ''),
(16, 'Sok pomarańczowy', 3, 10, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dishes_category`
--

CREATE TABLE `dishes_category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dishes_category`
--

INSERT INTO `dishes_category` (`id`, `name`) VALUES
(1, 'Dania główne'),
(2, 'Desery'),
(3, 'Napoje');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `napoje`
--

CREATE TABLE `napoje` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `email` varchar(254) NOT NULL,
  `haslo` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`email`, `haslo`) VALUES
('admin@admin.pl', 'admin1');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dania_glowne`
--
ALTER TABLE `dania_glowne`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `desery`
--
ALTER TABLE `desery`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `dishes_category`
--
ALTER TABLE `dishes_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `napoje`
--
ALTER TABLE `napoje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dania_glowne`
--
ALTER TABLE `dania_glowne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `desery`
--
ALTER TABLE `desery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `dishes_category`
--
ALTER TABLE `dishes_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `napoje`
--
ALTER TABLE `napoje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
