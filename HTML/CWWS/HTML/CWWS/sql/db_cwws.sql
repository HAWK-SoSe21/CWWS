-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jul 2021 um 12:03
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_cwws`
--
CREATE DATABASE IF NOT EXISTS `db_cwws` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_cwws`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aliase`
--

CREATE TABLE `aliase` (
  `Aliase_1` varchar(45) NOT NULL,
  `Articel_Articel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articel`
--

CREATE TABLE `articel` (
  `Articel_id` int(11) NOT NULL,
  `Articel_expiry` date DEFAULT NULL,
  `Articel_picture` blob DEFAULT NULL,
  `Articel_rotatable` tinyint(1) DEFAULT NULL,
  `Articel_stackable` tinyint(1) DEFAULT NULL,
  `Articel_binding` tinyint(1) DEFAULT NULL,
  `Articel_extracted` tinyint(1) DEFAULT NULL,
  `Articel_time_of_storage` date DEFAULT NULL,
  `Articel_group_Articel_group_id` int(11) DEFAULT NULL,
  `Usage_statistics_idUsage_statistics` int(11) DEFAULT NULL,
  `Properties_Properties_id` int(11) DEFAULT NULL,
  `Format_Format_id` int(11) DEFAULT NULL,
  `aliase` varchar(255) DEFAULT NULL,
  `Substorage_yard_Substorage_mobile_id` int(11) DEFAULT NULL,
  `User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `articel`
--

INSERT INTO `articel` (`Articel_id`, `Articel_expiry`, `Articel_picture`, `Articel_rotatable`, `Articel_stackable`, `Articel_binding`, `Articel_extracted`, `Articel_time_of_storage`, `Articel_group_Articel_group_id`, `Usage_statistics_idUsage_statistics`, `Properties_Properties_id`, `Format_Format_id`, `aliase`, `Substorage_yard_Substorage_mobile_id`, `User_User_id`) VALUES
(9, '2021-06-26', 0x2f75706c6f6164732f61727469636c65732f556e62656e616e6e742e504e47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 72, 27, 'M16', 4, 1),
(10, '2021-07-01', 0x2f75706c6f6164732f61727469636c65732f556e62656e616e6e742e504e47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 73, 28, 'Dübel M16', 5, 3),
(11, '2021-07-02', 0x2f75706c6f6164732f61727469636c65732f556e62656e616e6e742e504e47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 74, 29, 'testtt', 5, 3),
(12, '2021-07-02', 0x2f75706c6f6164732f61727469636c65732f73746f726167652e706e67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 77, 31, 't', 6, 3),
(13, '2021-07-10', 0x2f75706c6f6164732f61727469636c65732f61727469636c652e706e67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 85, 33, 'testpsodo', 6, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articel_group`
--

CREATE TABLE `articel_group` (
  `Articel_group_id` int(11) NOT NULL,
  `Articel_group_picture` blob DEFAULT NULL,
  `Properties_Properties_id` int(11) NOT NULL,
  `Usage_statistics_idUsage_statistics` int(11) NOT NULL,
  `User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `format`
--

CREATE TABLE `format` (
  `Format_id` int(11) NOT NULL,
  `Format_height` varchar(55) NOT NULL,
  `Format_width` varchar(55) NOT NULL,
  `Format_length` varchar(55) NOT NULL,
  `Format_volume` varchar(55) DEFAULT NULL,
  `Articel_group_Articel_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `format`
--

INSERT INTO `format` (`Format_id`, `Format_height`, `Format_width`, `Format_length`, `Format_volume`, `Articel_group_Articel_group_id`) VALUES
(2, '0.05', '0.06', '0.03', NULL, NULL),
(3, '0.05', '0.06', '0.03', NULL, NULL),
(4, '0.07', '0.33', '0.21', NULL, NULL),
(5, '0.05', '0.06', '0.03', NULL, NULL),
(6, 'Incididunt quos amet', 'Laudantium laborum', 'Enim aut irure commo', NULL, NULL),
(7, 'Quod cupiditate minu', 'Facilis voluptate as', 'Quas dolore odio inv', NULL, NULL),
(8, 'Aliquam sunt iure su', 'Anim eos maiores bla', 'Vero similique vitae', NULL, NULL),
(9, 'Aliquam sunt iure su', 'Anim eos maiores bla', 'Vero similique vitae', NULL, NULL),
(10, 'Aliquam sunt iure su', 'Anim eos maiores bla', 'Vero similique vitae', NULL, NULL),
(11, 'Aliquam sunt iure su', 'Anim eos maiores bla', 'Vero similique vitae', NULL, NULL),
(12, '12.2cm', '11.0 cm', '12.3 cm', NULL, NULL),
(13, '0.01', '0.01', '33.3', NULL, NULL),
(14, '77.6 cm', '44  cm', '50 cm', NULL, NULL),
(18, 'Ut ut ducimus fugit', 'At esse dolore minim', 'Doloremque anim assu', NULL, NULL),
(21, '', '', '', NULL, NULL),
(22, '44', '55', '66', NULL, NULL),
(23, '12', '11', '22', NULL, NULL),
(24, '112', '144', '133', NULL, NULL),
(25, '412', '444', '433', NULL, NULL),
(26, '1', '1', '1', NULL, NULL),
(27, '20.3cm ', '10cm', '4cm', NULL, NULL),
(28, '33.4cm', '33.3cm', '33.3cm', NULL, NULL),
(29, '2.2cm', '3cm', '3cm', NULL, NULL),
(30, '33.4 cm', '33 cm', '33 cm', NULL, NULL),
(31, '1.12cm', '4.4cm', '3.3cm', NULL, NULL),
(32, '22', '33', '22', NULL, NULL),
(33, '3', '3', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `properties`
--

CREATE TABLE `properties` (
  `Properties_id` int(11) NOT NULL,
  `Properties_name` varchar(45) NOT NULL,
  `Properties_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `properties`
--

INSERT INTO `properties` (`Properties_id`, `Properties_name`, `Properties_description`) VALUES
(15, 'Raum1', 'klein'),
(16, 'Raum2', 'groß'),
(18, 'Raum3', 'groß'),
(19, 'test updated', 'test2'),
(20, 'test updated', 'test2'),
(21, ' qsdqtest updated', 'test2'),
(22, 'klein box', 'test description'),
(23, 'klein box1', 'test description updated'),
(24, 'klein box1', 'test description updated'),
(25, 'klein box1', 'test description updated'),
(26, 'test', 'test description'),
(27, 'test', 'test description'),
(28, 'test', 'test description'),
(29, 'test', 'test description'),
(30, 'test', 'test description'),
(31, 'test', 'test description'),
(32, 'test', 'test description'),
(33, 'Möbel1', 'test description1'),
(34, 'Möbel1', 'test description'),
(35, 'möbel2', 'test description'),
(36, 'Möbel3', 'description updated'),
(37, 'Holly Bowman', 'Fuga Sint illo maio'),
(38, 'Holly Bowman', 'Fuga Sint illo maio'),
(39, 'Holly Bowman', 'Fuga Sint illo maio'),
(40, 'Holly Bowman', 'Fuga Sint illo maio'),
(41, 'Holly Bowman', 'Fuga Sint illo maio'),
(42, 'Holly Bowman', 'Fuga Sint illo maio'),
(43, 'Holly Bowman', 'Fuga Sint illo maio'),
(44, 'Holly Bowman', 'Fuga Sint illo maio'),
(45, 'Holly Bowman', 'Fuga Sint illo maio'),
(46, 'Schuplade 1', 'klein'),
(47, 'Schuplade 2', 'groß'),
(48, 'Jonah Luna', 'Sed aliqua Ratione '),
(49, 'Timothy Clark', 'Cillum dignissimos v'),
(50, '    update Amir Cortez', ''),
(51, 'Amir Cortez', 'Dolores impedit ius'),
(52, 'Amir Cortez', 'rezsrsrsrsrsrs'),
(53, 'Amir Cortez', ''),
(54, 'raum 4', 'klein'),
(55, 'möbel4', 'klein'),
(56, 'Box1', 'test'),
(57, 'Fach 1', 'test'),
(58, 'Box2', 'test'),
(59, 'Gary Mcclain', 'Qui voluptas at sint'),
(60, 'Moana Dickson', 'Cillum cum occaecat '),
(61, 'Moana Dickson', 'Cillum cum occaecat '),
(62, 'Moana Dickson', 'Cillum cum occaecat '),
(63, 'Moana Dickson', 'Cillum cum occaecat '),
(64, 'Moana Dickson', 'Cillum cum occaecat '),
(65, 'Artikel1', 'C '),
(66, 'Zephr Cooley', 'Unde dicta impedit '),
(67, 'Artikel2', 'klein'),
(68, 'Artikel33', 'klein'),
(69, '4artikel 4', '4jbj'),
(70, '', ''),
(71, 'Fach 2', 'groß'),
(72, '  Schrauben', ' testt '),
(73, 'Dübel', 'test'),
(74, 'Test1', 'test'),
(75, 'Raum5', 'groß'),
(76, 'Karton 1', ''),
(77, 'Test2', 'test'),
(78, 'test55', 'groß'),
(79, 'neu tes', 'beu test'),
(80, 'neu test', 'neu test'),
(81, 'neutest', 'blaue'),
(82, 'neuneutest', 'neu'),
(83, 'Raum55', 'test'),
(84, 'Möbel5', 'test'),
(85, 'test', 'test'),
(86, 'Raum6', 'viel zu klein'),
(87, 'Möbel6', 'Klapperregal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `storage_yard`
--

CREATE TABLE `storage_yard` (
  `Storage_id` int(11) NOT NULL,
  `Storage_picture` varchar(255) NOT NULL,
  `User_User_id` int(11) NOT NULL,
  `Format_Format_id` int(11) DEFAULT NULL,
  `Properties_Properties_id` int(11) NOT NULL,
  `Usage_statistics_idUsage_statistics` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `storage_yard`
--

INSERT INTO `storage_yard` (`Storage_id`, `Storage_picture`, `User_User_id`, `Format_Format_id`, `Properties_Properties_id`, `Usage_statistics_idUsage_statistics`) VALUES
(15, '/uploads/storages/lager.png', 3, NULL, 15, NULL),
(16, '/uploads/storages/article.png', 1, NULL, 16, NULL),
(18, '/uploads/storages/hawk.jpg', 1, NULL, 18, NULL),
(19, '/uploads/storages/lager.png', 3, NULL, 54, NULL),
(23, '/uploads/storages/article.png', 3, NULL, 83, NULL),
(24, '/uploads/storages/', 4, NULL, 86, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subarticel`
--

CREATE TABLE `subarticel` (
  `Subarticel_id` int(11) NOT NULL,
  `Subarticel_quantity` int(11) DEFAULT NULL,
  `Articel_Articel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `subarticel`
--

INSERT INTO `subarticel` (`Subarticel_id`, `Subarticel_quantity`, `Articel_Articel_id`) VALUES
(22, 20, 9),
(23, 20, 10),
(24, -2, 9),
(25, -6, 10),
(26, 30, 13),
(27, -1, 13);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `substorage_yard`
--

CREATE TABLE `substorage_yard` (
  `Substorage_id` int(11) NOT NULL,
  `Substorage_quantity` int(11) NOT NULL,
  `Substorage_category` varchar(45) NOT NULL,
  `Substorage_yard_picture` varchar(255) DEFAULT NULL,
  `Storage_yard_Storage_id` int(11) NOT NULL,
  `Properties_Properties_id` int(11) NOT NULL,
  `User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `substorage_yard`
--

INSERT INTO `substorage_yard` (`Substorage_id`, `Substorage_quantity`, `Substorage_category`, `Substorage_yard_picture`, `Storage_yard_Storage_id`, `Properties_Properties_id`, `User_User_id`) VALUES
(3, 2, 'Schränke', '/uploads/sub_storages/einstellungen.png', 15, 34, 3),
(4, 40, 'Räume', '/uploads/sub_storages/article.png', 15, 35, 0),
(5, 13, 'Schränke', '/uploads/sub_storages/lager.png', 15, 36, 0),
(6, 5, 'Schränke', '/uploads/sub_storages/lager.png', 19, 55, 0),
(10, 3, 'Schrank', '/uploads/sub_storages/', 23, 84, 3),
(11, 3, 'Regal', '/uploads/sub_storages/', 24, 87, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `substorage_yard_fixed`
--

CREATE TABLE `substorage_yard_fixed` (
  `Substorage_fixed_id` int(11) NOT NULL,
  `Substorage_fixed_category` varchar(45) NOT NULL,
  `Format_Format_id` int(11) NOT NULL,
  `Articel_Articel_id` int(11) DEFAULT NULL,
  `Substorage_yard_Substorage_id` int(11) NOT NULL,
  `Properties_Properties_id` int(11) NOT NULL,
  `Substorage_fixed_picture` varchar(255) NOT NULL,
  `User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `substorage_yard_fixed`
--

INSERT INTO `substorage_yard_fixed` (`Substorage_fixed_id`, `Substorage_fixed_category`, `Format_Format_id`, `Articel_Articel_id`, `Substorage_yard_Substorage_id`, `Properties_Properties_id`, `Substorage_fixed_picture`, `User_User_id`) VALUES
(7, 'Schränke', 4, NULL, 5, 46, '/uploads/sub_storages_fixed/einstellungen.png', 3),
(8, 'Schränke', 5, NULL, 3, 47, '/uploads/sub_storages_fixed/lager.png', 3),
(9, 'Schränke', 13, NULL, 4, 57, '/uploads/sub_storages_fixed/profile.jpg', 3),
(10, 'Schränke', 26, NULL, 3, 71, '/uploads/sub_storages_fixed/lager.png', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `substorage_yard_mobile`
--

CREATE TABLE `substorage_yard_mobile` (
  `Substorage_mobile_id` int(11) NOT NULL,
  `Substorage_mobile_cover` varchar(255) DEFAULT NULL,
  `Substorage_yard_mobile_binding` tinyint(1) DEFAULT NULL,
  `Substorage_mobile_category` varchar(45) DEFAULT NULL,
  `Substorage_yard_mobile_Substorage_mobile_id` int(11) DEFAULT NULL,
  `Format_Format_id` int(11) DEFAULT NULL,
  `Articel_Articel_id` int(11) DEFAULT NULL,
  `Substorage_yard_fixed_Substorage_fixed_id` int(11) DEFAULT NULL,
  `Properties_Properties_id` int(11) DEFAULT NULL,
  `Substorage_mobile_picture` varchar(255) DEFAULT NULL,
  `User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `substorage_yard_mobile`
--

INSERT INTO `substorage_yard_mobile` (`Substorage_mobile_id`, `Substorage_mobile_cover`, `Substorage_yard_mobile_binding`, `Substorage_mobile_category`, `Substorage_yard_mobile_Substorage_mobile_id`, `Format_Format_id`, `Articel_Articel_id`, `Substorage_yard_fixed_Substorage_fixed_id`, `Properties_Properties_id`, `Substorage_mobile_picture`, `User_User_id`) VALUES
(4, '', NULL, 'Schränke', NULL, 12, NULL, 7, 56, '/uploads/sub_storages_fixed/hawk.jpg', 3),
(5, '', NULL, 'Räume', NULL, 14, NULL, 8, 58, '/uploads/sub_storages_fixed/storage.png', 3),
(6, '', NULL, 'Schränke', NULL, 30, NULL, 9, 76, '/uploads/sub_storages_fixed/lager.png', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usage_statistics`
--

CREATE TABLE `usage_statistics` (
  `idUsage_statistics` int(11) NOT NULL,
  `Usage_statistics_number_of_accesses` int(10) UNSIGNED DEFAULT NULL,
  `Usage_statistics_last_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(45) NOT NULL,
  `User_password` varchar(255) NOT NULL,
  `User_email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`User_id`, `User_name`, `User_password`, `User_email`) VALUES
(1, 'Elmostafa Hniziz', '$2y$10$wQghenjEVCojZj.QSbFnLuVeTLKpA6M18bCmdv.trHJkG1id/QjfS', 'el.hniziz@gmail.com'),
(2, 'ayoub', '$2y$10$Ixdta8StV2nAq0L/w3qCTeesTwVv6EjF1V.NnE/di8S4HLIXnPXY.', 'ayoub@test.com'),
(3, 'ayoub', '$2y$10$fjUd0PefwRnrCm7fVLfOhODAbys1QmKncJomZlN6gF18.LY3UlSGa', 'ayoub@gmail.com'),
(4, 'test', '$2y$10$6DySexuXB94xcj9w4rXho.vxTX2mGOHt83j/geMaasbgbU5K/lrUq', 'test@test.com');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aliase`
--
ALTER TABLE `aliase`
  ADD PRIMARY KEY (`Aliase_1`),
  ADD KEY `fk_Aliase_Articel1_idx` (`Articel_Articel_id`);

--
-- Indizes für die Tabelle `articel`
--
ALTER TABLE `articel`
  ADD PRIMARY KEY (`Articel_id`),
  ADD UNIQUE KEY `Articel_id_UNIQUE` (`Articel_id`),
  ADD KEY `fk_Articel_Articel_group1_idx` (`Articel_group_Articel_group_id`),
  ADD KEY `fk_Articel_Usage_statistics1_idx` (`Usage_statistics_idUsage_statistics`),
  ADD KEY `fk_Articel_Properties1_idx` (`Properties_Properties_id`),
  ADD KEY `Format_Format_id` (`Format_Format_id`),
  ADD KEY `Substorage_yard_Substorage_mobile_id` (`Substorage_yard_Substorage_mobile_id`);

--
-- Indizes für die Tabelle `articel_group`
--
ALTER TABLE `articel_group`
  ADD PRIMARY KEY (`Articel_group_id`),
  ADD UNIQUE KEY `Articel_id_UNIQUE` (`Articel_group_id`),
  ADD KEY `fk_Articel_group_Properties1_idx` (`Properties_Properties_id`),
  ADD KEY `fk_Articel_group_Usage_statistics1_idx` (`Usage_statistics_idUsage_statistics`),
  ADD KEY `fk_Articel_group_User1_idx` (`User_User_id`);

--
-- Indizes für die Tabelle `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`Format_id`),
  ADD KEY `fk_Format_Articel_group1_idx` (`Articel_group_Articel_group_id`);

--
-- Indizes für die Tabelle `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`Properties_id`);

--
-- Indizes für die Tabelle `storage_yard`
--
ALTER TABLE `storage_yard`
  ADD PRIMARY KEY (`Storage_id`),
  ADD UNIQUE KEY `Storage_id_UNIQUE` (`Storage_id`),
  ADD KEY `fk_Storage_yard_User1_idx` (`User_User_id`),
  ADD KEY `fk_Storage_yard_Format1_idx` (`Format_Format_id`),
  ADD KEY `fk_Storage_yard_Properties1_idx` (`Properties_Properties_id`),
  ADD KEY `fk_Storage_yard_Usage_statistics1_idx` (`Usage_statistics_idUsage_statistics`);

--
-- Indizes für die Tabelle `subarticel`
--
ALTER TABLE `subarticel`
  ADD PRIMARY KEY (`Subarticel_id`),
  ADD UNIQUE KEY `Subarticel_id_UNIQUE` (`Subarticel_id`),
  ADD KEY `fk_Subarticel_Articel1_idx` (`Articel_Articel_id`);

--
-- Indizes für die Tabelle `substorage_yard`
--
ALTER TABLE `substorage_yard`
  ADD PRIMARY KEY (`Substorage_id`),
  ADD KEY `fk_Substorage_yard_Storage_yard1_idx` (`Storage_yard_Storage_id`),
  ADD KEY `fk_Substorage_yard_Properties1_idx` (`Properties_Properties_id`);

--
-- Indizes für die Tabelle `substorage_yard_fixed`
--
ALTER TABLE `substorage_yard_fixed`
  ADD PRIMARY KEY (`Substorage_fixed_id`),
  ADD KEY `fk_Substorage_yard_fixed_Format1_idx` (`Format_Format_id`),
  ADD KEY `fk_Substorage_yard_fixed_Articel1_idx` (`Articel_Articel_id`),
  ADD KEY `fk_Substorage_yard_fixed_Substorage_yard1_idx` (`Substorage_yard_Substorage_id`),
  ADD KEY `fk_Substorage_yard_fixed_Properties1_idx` (`Properties_Properties_id`);

--
-- Indizes für die Tabelle `substorage_yard_mobile`
--
ALTER TABLE `substorage_yard_mobile`
  ADD PRIMARY KEY (`Substorage_mobile_id`),
  ADD UNIQUE KEY `Substorage_mobile_id_UNIQUE` (`Substorage_mobile_id`),
  ADD KEY `fk_Substorage_yard_mobile_Substorage_yard_mobile1_idx` (`Substorage_yard_mobile_Substorage_mobile_id`),
  ADD KEY `fk_Substorage_yard_mobile_Format1_idx` (`Format_Format_id`),
  ADD KEY `fk_Substorage_yard_mobile_Articel1_idx` (`Articel_Articel_id`),
  ADD KEY `fk_Substorage_yard_mobile_Substorage_yard_fixed1_idx` (`Substorage_yard_fixed_Substorage_fixed_id`),
  ADD KEY `fk_Substorage_yard_mobile_Properties1_idx` (`Properties_Properties_id`);

--
-- Indizes für die Tabelle `usage_statistics`
--
ALTER TABLE `usage_statistics`
  ADD PRIMARY KEY (`idUsage_statistics`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_id_UNIQUE` (`User_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articel`
--
ALTER TABLE `articel`
  MODIFY `Articel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `articel_group`
--
ALTER TABLE `articel_group`
  MODIFY `Articel_group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `format`
--
ALTER TABLE `format`
  MODIFY `Format_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT für Tabelle `properties`
--
ALTER TABLE `properties`
  MODIFY `Properties_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT für Tabelle `storage_yard`
--
ALTER TABLE `storage_yard`
  MODIFY `Storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `subarticel`
--
ALTER TABLE `subarticel`
  MODIFY `Subarticel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `substorage_yard`
--
ALTER TABLE `substorage_yard`
  MODIFY `Substorage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `substorage_yard_fixed`
--
ALTER TABLE `substorage_yard_fixed`
  MODIFY `Substorage_fixed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `substorage_yard_mobile`
--
ALTER TABLE `substorage_yard_mobile`
  MODIFY `Substorage_mobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `usage_statistics`
--
ALTER TABLE `usage_statistics`
  MODIFY `idUsage_statistics` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `aliase`
--
ALTER TABLE `aliase`
  ADD CONSTRAINT `fk_Aliase_Articel1` FOREIGN KEY (`Articel_Articel_id`) REFERENCES `articel` (`Articel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `articel`
--
ALTER TABLE `articel`
  ADD CONSTRAINT `articel_ibfk_1` FOREIGN KEY (`Format_Format_id`) REFERENCES `format` (`Format_id`),
  ADD CONSTRAINT `articel_ibfk_2` FOREIGN KEY (`Substorage_yard_Substorage_mobile_id`) REFERENCES `substorage_yard_mobile` (`Substorage_mobile_id`),
  ADD CONSTRAINT `fk_Articel_Articel_group1` FOREIGN KEY (`Articel_group_Articel_group_id`) REFERENCES `articel_group` (`Articel_group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articel_Properties1` FOREIGN KEY (`Properties_Properties_id`) REFERENCES `properties` (`Properties_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articel_Usage_statistics1` FOREIGN KEY (`Usage_statistics_idUsage_statistics`) REFERENCES `usage_statistics` (`idUsage_statistics`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `articel_group`
--
ALTER TABLE `articel_group`
  ADD CONSTRAINT `fk_Articel_group_Properties1` FOREIGN KEY (`Properties_Properties_id`) REFERENCES `properties` (`Properties_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articel_group_Usage_statistics1` FOREIGN KEY (`Usage_statistics_idUsage_statistics`) REFERENCES `usage_statistics` (`idUsage_statistics`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articel_group_User1` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `format`
--
ALTER TABLE `format`
  ADD CONSTRAINT `fk_Format_Articel_group1` FOREIGN KEY (`Articel_group_Articel_group_id`) REFERENCES `articel_group` (`Articel_group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `storage_yard`
--
ALTER TABLE `storage_yard`
  ADD CONSTRAINT `fk_Storage_yard_Format1` FOREIGN KEY (`Format_Format_id`) REFERENCES `format` (`Format_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Storage_yard_Properties1` FOREIGN KEY (`Properties_Properties_id`) REFERENCES `properties` (`Properties_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Storage_yard_Usage_statistics1` FOREIGN KEY (`Usage_statistics_idUsage_statistics`) REFERENCES `usage_statistics` (`idUsage_statistics`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Storage_yard_User1` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `subarticel`
--
ALTER TABLE `subarticel`
  ADD CONSTRAINT `fk_Subarticel_Articel1` FOREIGN KEY (`Articel_Articel_id`) REFERENCES `articel` (`Articel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `substorage_yard`
--
ALTER TABLE `substorage_yard`
  ADD CONSTRAINT `fk_Substorage_yard_Properties1` FOREIGN KEY (`Properties_Properties_id`) REFERENCES `properties` (`Properties_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_Storage_yard1` FOREIGN KEY (`Storage_yard_Storage_id`) REFERENCES `storage_yard` (`Storage_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `substorage_yard_fixed`
--
ALTER TABLE `substorage_yard_fixed`
  ADD CONSTRAINT `fk_Substorage_yard_fixed_Articel1` FOREIGN KEY (`Articel_Articel_id`) REFERENCES `articel` (`Articel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_fixed_Format1` FOREIGN KEY (`Format_Format_id`) REFERENCES `format` (`Format_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_fixed_Properties1` FOREIGN KEY (`Properties_Properties_id`) REFERENCES `properties` (`Properties_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_fixed_Substorage_yard1` FOREIGN KEY (`Substorage_yard_Substorage_id`) REFERENCES `substorage_yard` (`Substorage_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `substorage_yard_mobile`
--
ALTER TABLE `substorage_yard_mobile`
  ADD CONSTRAINT `fk_Substorage_yard_mobile_Articel1` FOREIGN KEY (`Articel_Articel_id`) REFERENCES `articel` (`Articel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_mobile_Format1` FOREIGN KEY (`Format_Format_id`) REFERENCES `format` (`Format_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_mobile_Properties1` FOREIGN KEY (`Properties_Properties_id`) REFERENCES `properties` (`Properties_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_mobile_Substorage_yard_fixed1` FOREIGN KEY (`Substorage_yard_fixed_Substorage_fixed_id`) REFERENCES `substorage_yard_fixed` (`Substorage_fixed_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Substorage_yard_mobile_Substorage_yard_mobile1` FOREIGN KEY (`Substorage_yard_mobile_Substorage_mobile_id`) REFERENCES `substorage_yard_mobile` (`Substorage_mobile_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;