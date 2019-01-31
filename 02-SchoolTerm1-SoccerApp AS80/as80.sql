-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 nov 2018 om 22:40
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
-- Database: `as80`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_item_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog_item`
--

CREATE TABLE `blog_item` (
  `id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blog_item`
--

INSERT INTO `blog_item` (`id`, `title`, `description`, `image`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Grand Opening AS\'80 teams', 'Dit seizoen helemaal nieuw: De Grand Opening voor de AS\'80 teams. Waar we dit vorig jaar voor alle selectieteams hebben georganiseerd, doen we het dit jaar ook voor alle AS\'80 teams.\r\n\r\nHoe stoer is dat?!, om samen met je team aan al je familie, vrienden en kennissen geintroduceerd te worden? Het veld op komen lopen in je stoere AS\'80 tenue, vette muziek uit de speakers en wat al niet meer?\r\n\r\nEr zijn springkussens, we hebben popcorn, suikerspinnen, je kan je inschrijven voor de AS\'80 penaltybokaal en nog zo veel meer!!!\r\n\r\nBe there!', 'https://as80.nl/files/library/4f08fb13-73d9-45f7-8b05-5810424ce47c.jpg', 2, '2018-11-15 00:00:00', NULL, NULL),
(2, 'Trainingsschema 2018/2019', 'Ruim 2 weken geleden hebben wij het voorlopige trainingsschema gepresenteerd. We zijn, in vergelijking met vorig seizoen, met ruim 200 leden gegroeid en hebben er meer dan 20 teams bijgekregen. Je kunt je wellicht voorstellen dat het maken van het trainingsschema een enorme klus is, waarbij we bijna geen rekening meer kunnen houden met individuele verzoeken, omdat we simpelweg te weinig ruimte hebben. Uiteraard zijn we al geruime tijd in gesprek met de Gemeente Almere voor extra capaciteit qua velden. Dit is echter een vrij complex proces en zeker niet van vandaag op morgen opgelost. We houden je op de hoogte als hierin noemenswaardige veranderingen optreden.\r\n\r\n \r\n\r\nHet reeds gecommuniceerde trainingsschema\r\n\r\nHet reeds gecommuniceerde schema is niet meer actueel. Wij hebben in dit schema de fout gemaakt te veel teams op 1 veld te plaatsen. Vandaar een compleet nieuw schema. Als je immers begint met schuiven in het schema, heeft dat invloed op het hele schema.\r\n\r\n \r\n\r\nTrots\r\n\r\nWe zijn erg trots op het feit dat we alle teams 2x trainen per week kunnen bieden en dat slechts een beperkt aantal teams hun 2de training op natuurgras hebben. En mocht het natuurgras toch afgekeurd worden, train je in ieder geval altijd 1x per week op kunstgras (tenzij er sneeuw op ligt ?).\r\n\r\n \r\n\r\nDefinitief trainingsschema\r\n\r\nIn de bijlage tref je het definitieve trainingsschema aan voor seizoen 2018/2019. Deze staat inmiddels ook op de website. Past de tijd of dag niet zoals nu in het schema staat?, kunnen wij je geen alternatief bieden. We respecteren dan de uitschrijving.\r\n\r\n \r\n\r\nVoorkeuren doorgegeven / wijzigingen doorgegeven\r\n\r\nEr zijn trainers/leden/ouders die gemaild hebben en voorkeuren aangegeven hebben qua dagen en tijd om te trainen. Het kan best voorkomen dat we er niet in geslaagd zijn hieraan te voldoen. Het individuele verzoek past dan simpelweg niet in het grote plaatje.  Dit is niet om ons er gemakkelijk van af te maken of om \"te pesten”, het is niet te realiseren.\r\n\r\n \r\n\r\nTrainingsschema op de website\r\n\r\nHet trainingsschema op de website is leidend. Deze is te volgen via: https://as80.nl/site/default.asp?option=960&menu=2\r\n\r\n \r\n\r\nAS’80 Academytraining (3de training)\r\n\r\n1 x per 2 weken trainen de AS’80 Academyteams 3x per week. Hiervoor geldt een schema met even en oneven weken. Vanuit de TJC zal hierover aankomende week gecommuniceerd worden.\r\n\r\n \r\n\r\nVragen?\r\n\r\nStuur een mail naar Hoofdcoordinator@as80.nl ', 'https://scontent.cdninstagram.com/vp/fdd1adfa1b998d47170b051856acdfed/5C746DBA/t51.2885-15/sh0.08/e35/s640x640/43914400_180221812881608_1249050332140526511_n.jpg', 4, '2018-11-15 00:00:00', NULL, NULL),
(3, 'Trainingsschema 2018/2019', 'Wat een prestatie!!!! Voor de 2de keer in de geschiedenis van AS80 een team in de derde divisie! De O13-1 alsnog gepromoveerd! Meer dan trots op spelers/trainers/ begeleiding/ouders/verzorgers. We bouwen en bouwen! Samen de Sterkste!', 'https://as80.nl/files/library/37345048_2116404848434077_3018314419319865344_n.jpg', 4, '2018-11-15 00:00:00', NULL, NULL),
(6, 'Kijk ze shinen @ MO9-1', 'Vandaag een historische dag: De MO9-1 heeft haar eerste wedstrijd gespeeld. Supertrots op alle betrokkenen die dit mogelijk hebben gemaakt!!!\r\n\r\nZie ze shinen in dat vette tenue!!!', 'https://as80.nl/files/library/42328705_2244768772264350_1765914351081881600_n.jpg', 6, '2018-11-05 11:56:37', NULL, NULL),
(7, 'Pascal Doest bij AS\'80', 'Vandaag kwam Pascal Doest onze keepers trainen. Een meer dan geweldige ervaring voor de kids, onze keepertrainers Ronald Laarman en Michel Kramer en uiteraard de stralende ouders langs de kant.\r\n\r\nOnze hoofdcoordinator Jan Hofsommer en onze kersverse keeperscoordinator Dennis van der Wal waren ook van de partij.\r\n\r\nAlles onder het toeziend oog van TJC bovenbouw M.l. Gaemers en Legends Soccer Academy\r\n\r\nVoor herhaling vatbaar!', 'https://as80.nl/files/library/ce2ac188-ab71-4106-b63b-fbba3cb418e6.jpg', 8, '2018-11-05 11:56:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `car_parent`
--

CREATE TABLE `car_parent` (
  `id` int(11) NOT NULL,
  `max_passengers` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `car_parent`
--

INSERT INTO `car_parent` (`id`, `max_passengers`, `user_id`) VALUES
(5, 3, 1),
(8, 123, 5),
(9, 5, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT 'Name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(21, 'Almere'),
(15, 'Amsterdam'),
(17, 'Den Haag'),
(16, 'Eindhoven'),
(20, 'Groningen'),
(19, 'Rotterdam'),
(18, 'Utrecht');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `club`
--

INSERT INTO `club` (`id`, `name`, `city_id`) VALUES
(1, 'FC Amsty', 15),
(2, 'FC Denny', 17),
(3, 'FC Jostiband', 16),
(4, 'FC Groningen', 20),
(5, 'AFC Ajax', 15),
(6, 'AS\'80', 21);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `hash` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(260) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `image`, `text`) VALUES
(16, 'Actie shot tijdens de training.jpg', 'Actie shot tijdens de training'),
(17, 'As80 bikkels aan het juichen.jpg', 'As80 bikkels aan het juichen'),
(18, 'Een goede training van de D2.jpg', 'Een goede training van de D2'),
(19, 'Wat een mooi schot.jpg', 'Wat een mooi schot'),
(20, 'Actie tegen de rode duivels.jpg', 'Actie tegen club de rode duivels');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `home_team_id` int(11) NOT NULL,
  `away_team_id` int(11) NOT NULL,
  `description` tinytext,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `match`
--

INSERT INTO `match` (`id`, `date`, `home_team_id`, `away_team_id`, `description`, `type`) VALUES
(1, '2018-11-22 00:00:00', 4, 6, 'yes', 0),
(2, '2018-11-22 00:00:00', 4, 4, 'awd', 0),
(3, '2018-11-04 13:45:00', 4, 4, 'awd', 0),
(4, '2018-11-04 13:45:00', 4, 4, 'yes', 0),
(5, '2018-11-04 13:45:00', 4, 4, 'from trainer', 0),
(6, '2018-11-04 13:45:00', 4, 4, 'aheaeheheh', 0),
(7, '2018-11-04 13:45:00', 4, 4, 'afesgdh', 0),
(8, '2018-11-05 13:45:00', 8, 9, 'Deze wedstrijd wordt gespeeld tegen AFC Ajax de A2. We gaan ze pakken!', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `match_result`
--

CREATE TABLE `match_result` (
  `match_id` int(11) NOT NULL,
  `count_home` int(11) NOT NULL,
  `count_away` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `match_result`
--

INSERT INTO `match_result` (`match_id`, `count_home`, `count_away`) VALUES
(1, 1, 1),
(3, 3, 1),
(6, 6, 3),
(7, 0, 3),
(8, 5, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `team_id` int(11) NOT NULL,
  `share_status` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `member_player`
--

CREATE TABLE `member_player` (
  `parent_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `member_player`
--

INSERT INTO `member_player` (`parent_id`, `player_id`) VALUES
(2, 3),
(3, 2),
(8, 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `blog` int(11) NOT NULL,
  `media` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `parent_preferences`
--

CREATE TABLE `parent_preferences` (
  `id` int(11) NOT NULL,
  `is_smoking_allowed` int(11) NOT NULL,
  `is_pet_allowed` int(11) NOT NULL,
  `is_food_allowed` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `player_not_available`
--

CREATE TABLE `player_not_available` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `player_team`
--

CREATE TABLE `player_team` (
  `team_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `player_team`
--

INSERT INTO `player_team` (`team_id`, `player_id`) VALUES
(4, 1),
(4, 3),
(4, 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ride`
--

CREATE TABLE `ride` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ride_request`
--

CREATE TABLE `ride_request` (
  `id` int(11) NOT NULL,
  `car_parent_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ride_request`
--

INSERT INTO `ride_request` (`id`, `car_parent_id`, `player_id`, `match_id`) VALUES
(14, 5, 1, 1),
(15, 8, 1, 6),
(16, 5, 1, 1),
(17, 5, 1, 1),
(18, 5, 1, 1),
(19, 5, 1, 1),
(20, 5, 1, 1),
(21, 5, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `club_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `team`
--

INSERT INTO `team` (`id`, `name`, `club_id`, `coach_id`) VALUES
(4, 'v.v. AS\'80', 1, 4),
(6, 'FC Utrecht', 2, 3),
(7, 'FC Groningen', 3, 4),
(8, 'v.v. AS\'80 - A1', 6, 6),
(9, 'AFC Ajax - A2', 5, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(256) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `date_birth` datetime NOT NULL,
  `gender` varchar(1) NOT NULL,
  `is_verified` int(1) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `hash`, `date_birth`, `gender`, `is_verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Arnout', 'Quint', 'arnout@fbi.gov', 'lol123', '', '2018-11-22 00:00:00', '0', 0, '2018-11-28 00:00:00', NULL, NULL),
(2, 'Joel', 'Boafo', 'joel@fbi.gov', 'lol123', '', '2018-11-22 00:00:00', '0', 0, '2018-11-28 00:00:00', NULL, NULL),
(3, 'Akash', 'Soedamah', 'akash@fbi.gov', 'lol123', '', '2018-11-22 00:00:00', '0', 0, '2018-11-28 00:00:00', NULL, NULL),
(4, 'Desley', 'Roelofsen', 'desley@fbi.gov', 'lol123', '', '2018-11-22 00:00:00', '0', 0, '2018-11-28 00:00:00', NULL, NULL),
(5, 'Admin', 'role', 'admin@admin.nl', '$2y$10$szYux7jroRRlsvEMWfMdOuMNY5VlQ5Y/FttIE8pLML93OvWMKrs9a', '', '1998-07-05 00:00:00', 'm', 0, NULL, NULL, NULL),
(6, 'Trainer', 'role', 'trainer@trainer.nl', '$2y$10$szYux7jroRRlsvEMWfMdOuMNY5VlQ5Y/FttIE8pLML93OvWMKrs9a', '', '1998-07-05 00:00:00', 'm', 0, NULL, NULL, NULL),
(7, 'Player', 'role', 'player@player.nl', '$2y$10$szYux7jroRRlsvEMWfMdOuMNY5VlQ5Y/FttIE8pLML93OvWMKrs9a', '', '1998-07-05 00:00:00', 'm', 0, NULL, NULL, NULL),
(8, 'Parent', 'role', 'ouder@ouder.nl', '$2y$10$szYux7jroRRlsvEMWfMdOuMNY5VlQ5Y/FttIE8pLML93OvWMKrs9a', '', '1998-07-05 00:00:00', 'm', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_car_available`
--

CREATE TABLE `user_car_available` (
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_car_available`
--

INSERT INTO `user_car_available` (`match_id`, `user_id`) VALUES
(1, 1),
(1, 5),
(2, 5),
(6, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_has_role`
--

CREATE TABLE `user_has_role` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_has_role`
--

INSERT INTO `user_has_role` (`user_role_id`, `user_id`) VALUES
(1, 8),
(2, 1),
(2, 3),
(2, 7),
(3, 6),
(4, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'Ouder'),
(2, 'Player'),
(3, 'Trainer'),
(4, 'Admin');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_blog_comment_blog_item1_idx` (`blog_item_id`),
  ADD KEY `fk_blog_comment_users1_idx` (`user_id`);

--
-- Indexen voor tabel `blog_item`
--
ALTER TABLE `blog_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_blog_items_users1_idx` (`user_id`);

--
-- Indexen voor tabel `car_parent`
--
ALTER TABLE `car_parent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_car_parent_user1_idx` (`user_id`);

--
-- Indexen voor tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexen voor tabel `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `fk_club_city1_idx` (`city_id`);

--
-- Indexen voor tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `users_id_UNIQUE` (`user_id`),
  ADD KEY `fk_forgot_password_users1_idx` (`user_id`);

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_program_team1_idx` (`home_team_id`),
  ADD KEY `fk_program_team2_idx` (`away_team_id`);

--
-- Indexen voor tabel `match_result`
--
ALTER TABLE `match_result`
  ADD UNIQUE KEY `match_id_UNIQUE` (`match_id`),
  ADD KEY `fk_match_result_match1_idx` (`match_id`);

--
-- Indexen voor tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_media_team1_idx` (`team_id`),
  ADD KEY `fk_media_user1_idx` (`user_id`);

--
-- Indexen voor tabel `member_player`
--
ALTER TABLE `member_player`
  ADD UNIQUE KEY `player_id_UNIQUE` (`player_id`),
  ADD KEY `fk_member_player_user1_idx` (`parent_id`),
  ADD KEY `fk_member_player_user2_idx` (`player_id`);

--
-- Indexen voor tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD KEY `fk_notification_choises_users1_idx` (`user_id`);

--
-- Indexen voor tabel `parent_preferences`
--
ALTER TABLE `parent_preferences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `parent_id_UNIQUE` (`user_id`),
  ADD KEY `fk_parent_preferences_user1_idx` (`user_id`);

--
-- Indexen voor tabel `player_not_available`
--
ALTER TABLE `player_not_available`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_is_available_matches1_idx` (`match_id`),
  ADD KEY `fk_player_not_available_user1_idx` (`user_id`);

--
-- Indexen voor tabel `player_team`
--
ALTER TABLE `player_team`
  ADD UNIQUE KEY `player_id_UNIQUE` (`player_id`),
  ADD KEY `fk_player_team_team1_idx` (`team_id`),
  ADD KEY `fk_player_team_user1_idx` (`player_id`);

--
-- Indexen voor tabel `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `match_id_UNIQUE` (`match_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_ride_match1_idx` (`match_id`);

--
-- Indexen voor tabel `ride_request`
--
ALTER TABLE `ride_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ride_request_car_parent1_idx` (`car_parent_id`),
  ADD KEY `fk_ride_request_user1_idx` (`player_id`),
  ADD KEY `fk_ride_request_match1_idx` (`match_id`);

--
-- Indexen voor tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `club_id_UNIQUE` (`club_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `fk_team_club1_idx` (`club_id`),
  ADD KEY `fk_teams_user1_idx` (`coach_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexen voor tabel `user_car_available`
--
ALTER TABLE `user_car_available`
  ADD PRIMARY KEY (`match_id`,`user_id`),
  ADD KEY `fk_parent_car_available_match1_idx` (`match_id`),
  ADD KEY `fk_parent_car_available_user1_idx` (`user_id`);

--
-- Indexen voor tabel `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD KEY `fk_user_has_role_user_role1_idx` (`user_role_id`),
  ADD KEY `fk_user_has_role_user1_idx` (`user_id`);

--
-- Indexen voor tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `blog_item`
--
ALTER TABLE `blog_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `car_parent`
--
ALTER TABLE `car_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `parent_preferences`
--
ALTER TABLE `parent_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `player_not_available`
--
ALTER TABLE `player_not_available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `ride`
--
ALTER TABLE `ride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `ride_request`
--
ALTER TABLE `ride_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `fk_blog_comment_blog_item1` FOREIGN KEY (`blog_item_id`) REFERENCES `blog_item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_blog_comment_users1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `blog_item`
--
ALTER TABLE `blog_item`
  ADD CONSTRAINT `fk_blog_items_users1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `car_parent`
--
ALTER TABLE `car_parent`
  ADD CONSTRAINT `fk_car_parent_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `fk_club_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `fk_forgot_password_users1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `fk_program_team1` FOREIGN KEY (`home_team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_program_team2` FOREIGN KEY (`away_team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `match_result`
--
ALTER TABLE `match_result`
  ADD CONSTRAINT `fk_match_result_match1` FOREIGN KEY (`match_id`) REFERENCES `match` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media_team1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_media_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `member_player`
--
ALTER TABLE `member_player`
  ADD CONSTRAINT `fk_member_player_user1` FOREIGN KEY (`parent_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_member_player_user2` FOREIGN KEY (`player_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification_choises_users1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `parent_preferences`
--
ALTER TABLE `parent_preferences`
  ADD CONSTRAINT `fk_parent_preferences_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `player_not_available`
--
ALTER TABLE `player_not_available`
  ADD CONSTRAINT `fk_is_available_matches1` FOREIGN KEY (`match_id`) REFERENCES `match` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_player_not_available_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `player_team`
--
ALTER TABLE `player_team`
  ADD CONSTRAINT `fk_player_team_team1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_player_team_user1` FOREIGN KEY (`player_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `fk_ride_match1` FOREIGN KEY (`match_id`) REFERENCES `match` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `ride_request`
--
ALTER TABLE `ride_request`
  ADD CONSTRAINT `fk_ride_request_car_parent1` FOREIGN KEY (`car_parent_id`) REFERENCES `car_parent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ride_request_match1` FOREIGN KEY (`match_id`) REFERENCES `match` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ride_request_user1` FOREIGN KEY (`player_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `fk_team_club1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teams_user1` FOREIGN KEY (`coach_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `user_car_available`
--
ALTER TABLE `user_car_available`
  ADD CONSTRAINT `fk_parent_car_available_match1` FOREIGN KEY (`match_id`) REFERENCES `match` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parent_car_available_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD CONSTRAINT `fk_user_has_role_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_role_user_role1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
