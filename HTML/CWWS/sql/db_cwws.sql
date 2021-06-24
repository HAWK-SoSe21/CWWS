-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Jun 2021 um 13:16
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
  `Articel_picture` blob NOT NULL,
  `Articel_rotatable` tinyint(1) DEFAULT NULL,
  `Articel_stackable` tinyint(1) DEFAULT NULL,
  `Articel_binding` tinyint(1) DEFAULT NULL,
  `Articel_extracted` tinyint(1) DEFAULT NULL,
  `Articel_time_of_storage` date NOT NULL,
  `Articel_group_Articel_group_id` int(11) NOT NULL,
  `Usage_statistics_idUsage_statistics` int(11) NOT NULL,
  `Properties_Properties_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Articel_group_Articel_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 'Raum1', 'groß'),
(16, 'Raum2', 'groß'),
(17, 'test', 'test'),
(18, 'test', 'test'),
(19, 'Raum3', 'winzig');

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
(15, '/uploads/storages/article.png', 1, NULL, 15, NULL),
(16, '/uploads/storages/profile.jpg', 1, NULL, 16, NULL),
(17, '/uploads/storages/', 1, NULL, 17, NULL),
(18, '/uploads/storages/', 2, NULL, 18, NULL),
(19, '/uploads/storages/DSC_0357.JPG', 2, NULL, 19, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subarticel`
--

CREATE TABLE `subarticel` (
  `Subarticel_id` int(11) NOT NULL,
  `Subarticel_quantity` int(11) DEFAULT NULL,
  `Articel_Articel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `substorage_yard`
--

CREATE TABLE `substorage_yard` (
  `Substorage_id` int(11) NOT NULL,
  `Substorage_quantity` int(11) NOT NULL,
  `Substorage_category` varchar(45) NOT NULL,
  `Substorage_yard_picture` blob DEFAULT NULL,
  `Storage_yard_Storage_id` int(11) NOT NULL,
  `Properties_Properties_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `substorage_yard_fixed`
--

CREATE TABLE `substorage_yard_fixed` (
  `Substorage_fixed_id` int(11) NOT NULL,
  `Substorage_fixed_category` varchar(45) NOT NULL,
  `Format_Format_id` int(11) NOT NULL,
  `Articel_Articel_id` int(11) NOT NULL,
  `Substorage_yard_Substorage_id` int(11) NOT NULL,
  `Properties_Properties_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `substorage_yard_mobile`
--

CREATE TABLE `substorage_yard_mobile` (
  `Substorage_mobile_id` int(11) NOT NULL,
  `Substorage_mobile_cover` tinyint(1) NOT NULL,
  `Substorage_yard_mobile_binding` tinyint(1) DEFAULT NULL,
  `Substorage_mobile_category` varchar(45) NOT NULL,
  `Substorage_yard_mobile_Substorage_mobile_id` int(11) NOT NULL,
  `Format_Format_id` int(11) NOT NULL,
  `Articel_Articel_id` int(11) NOT NULL,
  `Substorage_yard_fixed_Substorage_fixed_id` int(11) NOT NULL,
  `Properties_Properties_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'Ingo', '$2y$10$ATX2oPRmNzrCK/PN6Y77vu7mf9k8omAXgW.g0G4srHLVvJO3CWI36', 'Ingo@gmail.com');

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
  ADD KEY `fk_Articel_Properties1_idx` (`Properties_Properties_id`);

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
  MODIFY `Articel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `articel_group`
--
ALTER TABLE `articel_group`
  MODIFY `Articel_group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `format`
--
ALTER TABLE `format`
  MODIFY `Format_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `properties`
--
ALTER TABLE `properties`
  MODIFY `Properties_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `storage_yard`
--
ALTER TABLE `storage_yard`
  MODIFY `Storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `subarticel`
--
ALTER TABLE `subarticel`
  MODIFY `Subarticel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `substorage_yard`
--
ALTER TABLE `substorage_yard`
  MODIFY `Substorage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `substorage_yard_fixed`
--
ALTER TABLE `substorage_yard_fixed`
  MODIFY `Substorage_fixed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `substorage_yard_mobile`
--
ALTER TABLE `substorage_yard_mobile`
  MODIFY `Substorage_mobile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `usage_statistics`
--
ALTER TABLE `usage_statistics`
  MODIFY `idUsage_statistics` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
