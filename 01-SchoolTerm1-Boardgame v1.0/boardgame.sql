-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 okt 2018 om 12:56
-- Serverversie: 10.1.35-MariaDB
-- PHP-versie: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boardgame`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `battles`
--

CREATE TABLE `battles` (
  `battles_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gameid` int(11) NOT NULL,
  `score01` int(11) NOT NULL,
  `score02` int(11) NOT NULL,
  `score03` int(11) DEFAULT NULL,
  `score04` int(11) DEFAULT NULL,
  `score05` int(11) DEFAULT NULL,
  `score06` int(11) DEFAULT NULL,
  `wonby` varchar(11) NOT NULL,
  `rounds` int(11) NOT NULL,
  `played_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) NOT NULL,
  `player01` varchar(100) NOT NULL,
  `player02` varchar(100) DEFAULT NULL,
  `player03` varchar(100) DEFAULT NULL,
  `player04` varchar(100) DEFAULT NULL,
  `player05` varchar(100) DEFAULT NULL,
  `player06` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `battles`
--

INSERT INTO `battles` (`battles_id`, `name`, `gameid`, `score01`, `score02`, `score03`, `score04`, `score05`, `score06`, `wonby`, `rounds`, `played_date`, `img`, `player01`, `player02`, `player03`, `player04`, `player05`, `player06`) VALUES
(31, '<strong>Game of Thrones:</strong> Deadliest match', 1, 1, 2, 3, 4, 5, 6, 'Veggiecoder', 21, '2018-10-31 07:18:35', 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png', 'Troll-king', 'Veggiecoder', 'Drummerboy', 'CooleGozer', 'Qq', 'Kim'),
(32, '<strong>Game of Thrones:</strong> Ninja warriors', 1, 1, 2, 0, 1, NULL, NULL, 'CooleGozer', 4, '2018-10-31 07:25:17', 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png', 'Veggiecoder', 'CooleGozer', 'Kim', 'NewbiePlaya', NULL, NULL),
(33, '<strong>World of Warcraft:</strong> Nerds on top', 1, 2, 3, 1, 0, NULL, NULL, 'CooleGozer', 6, '2018-10-31 07:32:43', 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5', 'Veggiecoder', 'CooleGozer', 'Buurman&Buurman', 'NewbiePlaya', NULL, NULL),
(34, '<strong>Lord of the Rings:</strong> RingsAreAwesome', 1, 1, 3, 1, 1, 0, NULL, 'Drummerboy', 6, '2018-10-31 07:36:25', 'https://img00.deviantart.net/0156/i/2013/095/e/9/lord_of_the_rings_icon_by_slamiticon-d60ici4.png', 'Veggiecoder', 'Drummerboy', 'Qq', 'Kim', 'NewbiePlaya', NULL),
(80, '<strong>World of Warcraft:</strong> Winner', 1, 2, 0, 0, NULL, NULL, NULL, 'Veggiecoder', 2, '2018-10-31 12:49:13', 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5', 'Veggiecoder', 'Drummerboy', 'CooleGozer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE armscii8_bin NOT NULL,
  `description` varchar(255) COLLATE armscii8_bin NOT NULL,
  `release_date` year(4) NOT NULL,
  `image` varchar(255) COLLATE armscii8_bin NOT NULL,
  `winner` varchar(255) COLLATE armscii8_bin NOT NULL,
  `min_players` int(11) NOT NULL,
  `max_players` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`game_id`, `name`, `description`, `release_date`, `image`, `winner`, `min_players`, `max_players`) VALUES
(1, 'Game of Thrones', 'A Game of Thrones is an epic board game in which it will take more than military might to win.', 2003, 'https://www.lautapelit.fi/images/tuotekuvat/kuva400/lautapelit/game-of-thrones-2nd-edition.jpg', 'Kim', 3, 6),
(3, 'World of Warcraft', 'World of Warcraft: The Board Game is an adventure board game based on the popular World of Warcraft MMORPG.', 2005, 'http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/DhwAAOxyOMdS-tAQ/$_3.JPG?set_id=2', 'Veggiecoder', 2, 6),
(4, 'Lord of the Rings', 'Lord of the Rings is a board game based on the high fantasy novel The Lord of the Rings by J. R. R. Tolkien. ', 2000, 'https://images-na.ssl-images-amazon.com/images/I/914GYKLDR-L._SX466_.jpg', 'cd', 2, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `player`
--

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `gamestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`) VALUES
(7, 'FakeNews', 'Troll-king', 'trumpworld@hotmail.com', '$2y$10$PBZQ1SH0lYRpU4B0HKfO0OUfRVKavRTPFy8meVlwXfT2EfFMqGTCG'),
(10, 'Akash', 'Veggiecoder', 'akash.soedamah@gmail.com', '$2y$10$O.K6CpwFH8ZzrDDOr/6tVux/EbhiWjZJaL5PxYBGKIGKfzgBe.T7O'),
(11, 'Quincy', 'Drummerboy', 'Quincy@example.com', '$2y$10$gBIPyFcF8x3j3PYcTN2BpO/ToaBnqUKoubL3ry30vAxzCw8CWUokm'),
(12, 'Akash', 'CooleGozer', 'Asdasd@gmail.com', '$2y$10$vBMt/W3oq5QP.D/Vjb043Ozp6sQlK8sPEuHsbsDxknYugPNkKofaG'),
(14, 'Bert', 'Qq', 'Qq@example.com', '$2y$10$xkhrR8TcrMXPs73S1tfI5usBxhsQTN2Xfg8hXpqPCQyGV.RqnxqkW'),
(15, 'Kimberley', 'Kim', 'Kavdbos@hotmail.com', '$2y$10$n6O0kLly5EF/55b8q4JFF.yRYdcfkW6wT3m/n1s4dowBhZE2nQExG'),
(17, 'Buurman', 'Buurman&amp;Buurman', 'Buurman@hotmail.com', '$2y$10$KGX2a3uflhXsSx0ofHzn2efT4XvR.cwEtXUYGY.T.QpewyXyzTmFG'),
(18, 'Akash', 'NewbiePlaya', 'Newplayer@gmail.com', '$2y$10$1D4bosLVj0gnU1I1QO7pnO9QgKvG858oRl3si7S.qFXh7IGdtMhGC'),
(19, 'Henry', 'Boss-donna', 'Akash.soeda@gmail.com', '$2y$10$DhQIyRQKbo3bEFLq9EkrGu9iW0HXk8y1EZR3i8YIJaH8H7P/LHYVS');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `battles`
--
ALTER TABLE `battles`
  ADD PRIMARY KEY (`battles_id`);

--
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexen voor tabel `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `battles`
--
ALTER TABLE `battles`
  MODIFY `battles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `player`
--
ALTER TABLE `player`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
