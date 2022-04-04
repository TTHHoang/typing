-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 mrt 2021 om 09:58
-- Serverversie: 10.1.10-MariaDB
-- PHP-versie: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `typinggame`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `highscore`
--

CREATE TABLE `highscore` (
  `username` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `highscore` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `highscore`
--

INSERT INTO `highscore` (`username`, `level`, `highscore`, `id`) VALUES
('d', 1, 30, 2),
('d', 2, 26, 3),
('v', 1, 30, 4),
('vv', 1, 5, 5),
('h', 1, 1, 6),
('v', 2, 2, 7),
('test1', 1, 19, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `userpass`, `level`) VALUES
(1, 'hang', 'hang', 0),
(17, 'd', '$2y$10$vfDWCEoRPmdMa3jyF.MISeAWOIT2eIskD4sEEPzrXO68Ckb40kT6u', 0),
(18, 'dd', '$2y$10$UnR/aTvB1lzkcfyZnWO53eUK9tRQ2B7GiaBNJUrPb4fVV0OOiabQa', 0),
(19, 'ddd', '$2y$10$zLYuBGWef8jRhvU9ZP9IOOyOIuF/oJfxrCVMCZBvL0YmHqWv1tTl6', 0),
(20, 's', '$2y$10$gGtETr0qphmf9mEo2pxGru.r8Np/cmc2BbtGWoNfmJBJshwIqtHG2', 0),
(21, 'g', '$2y$10$zbMpGj2B76G2rTD36DU3JefGGqUIzAwM04xTRPHCjNAm.wlNdMVSO', 0),
(22, 'vv', '$2y$10$DwNbHYY49VQL.3OZMghF/.d1jjnHbGtOJtx3AplaAj.B0RVmfj57m', 0),
(23, 'v', '$2y$10$ZVKdJNn/PgBV/v/jYSiygOCsv05zSyFH3S0VIu/QKKExXtCRmc32i', 0),
(24, 'h', '$2y$10$XVAEUOCgJxe76j9STPW5Z.VbD6W9BGC/aG3ScXLJhcHbBXZ1Buy1y', 0),
(25, 'test', '$2y$10$aS9jvHaF4FvxDNnZIzlyAeFp2ZJA86SlMKgpYpaTDSnxAHPjRRRSW', 0),
(26, 'test1', '$2y$10$S77KUWMgjWvZn.1nloWTceag44d.tbG551UCCA12ZXerME4NBAorO', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `highscore`
--
ALTER TABLE `highscore`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `highscore`
--
ALTER TABLE `highscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
