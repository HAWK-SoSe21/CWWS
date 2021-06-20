-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Jun 2021 um 12:47
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
-- Datenbank: `mydb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articel`
--

CREATE TABLE `articel` (
  `Articel_id` int(11) NOT NULL,
  `Articel_name` varchar(45) NOT NULL,
  `Articel_format_height` varchar(255) NOT NULL,
  `Articel_format_width` varchar(255) NOT NULL,
  `Articel_format_length` varchar(255) NOT NULL,
  `Articel_picture` varchar(255) NOT NULL,
  `Articel_description` varchar(45) NOT NULL,
  `Articel_alias` varchar(45) NOT NULL,
  `Articel_expiry` date NOT NULL,
  `User_User_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `articel`
--

INSERT INTO `articel` (`Articel_id`, `Articel_name`, `Articel_format_height`, `Articel_format_width`, `Articel_format_length`, `Articel_picture`, `Articel_description`, `Articel_alias`, `Articel_expiry`, `User_User_id`) VALUES
(14, 'Schraube', '1,3', '2,567', '3', '/uploads/articles/', '123', '', '2021-06-25', 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `storage_yard`
--

CREATE TABLE `storage_yard` (
  `Storage_id` int(11) NOT NULL,
  `Storage_name` varchar(45) NOT NULL,
  `Storage_description` varchar(45) DEFAULT NULL,
  `Storage_category` varchar(45) NOT NULL,
  `Storage_picture` varchar(255) NOT NULL,
  `Storage_format_heigth` double NOT NULL,
  `Storage_format_width` double NOT NULL,
  `Storage_format_length` double NOT NULL,
  `Storage_furniture` varchar(45) NOT NULL,
  `User_User_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `storage_yard`
--

INSERT INTO `storage_yard` (`Storage_id`, `Storage_name`, `Storage_description`, `Storage_category`, `Storage_picture`, `Storage_format_heigth`, `Storage_format_width`, `Storage_format_length`, `Storage_furniture`, `User_User_id`) VALUES
(8, 'Lager1', 'irgendetwas', 'Schränke', '/uploads/storages/', 1.2, 2, 3, '', 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `substorage_yard`
--

CREATE TABLE `substorage_yard` (
  `Substorage_id` int(11) NOT NULL,
  `Substorage_name` varchar(45) NOT NULL,
  `Substorage_description` varchar(45) NOT NULL,
  `Substorage_picture` varchar(255) DEFAULT NULL,
  `Storage_yard_Storage_id` int(11) NOT NULL,
  `Storage_yard_User_User_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `substorage_yard`
--

INSERT INTO `substorage_yard` (`Substorage_id`, `Substorage_name`, `Substorage_description`, `Substorage_picture`, `Storage_yard_Storage_id`, `Storage_yard_User_User_id`) VALUES
(4, 'kiste', '123', '/uploads/sub_storages/', 8, 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `User_id` varchar(11) NOT NULL,
  `User_password` varchar(255) NOT NULL,
  `User_email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`User_id`, `User_password`, `User_email`) VALUES
('test', '$2y$10$7Kc9/FZYsNDPI./axEsp3.Oyei8IfX/5/Nosy.OfJeS.pI4ZI0C3i', 'test@test.com');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articel`
--
ALTER TABLE `articel`
  ADD PRIMARY KEY (`Articel_id`,`User_User_id`),
  ADD UNIQUE KEY `Articel_id_UNIQUE` (`Articel_id`),
  ADD KEY `fk_Articel_User1_idx` (`User_User_id`);

--
-- Indizes für die Tabelle `storage_yard`
--
ALTER TABLE `storage_yard`
  ADD PRIMARY KEY (`Storage_id`,`User_User_id`),
  ADD UNIQUE KEY `Storage_id_UNIQUE` (`Storage_id`),
  ADD KEY `fk_Storage_yard_User_idx` (`User_User_id`);

--
-- Indizes für die Tabelle `substorage_yard`
--
ALTER TABLE `substorage_yard`
  ADD PRIMARY KEY (`Substorage_id`,`Storage_yard_Storage_id`,`Storage_yard_User_User_id`),
  ADD UNIQUE KEY `Substorage_id_UNIQUE` (`Substorage_id`),
  ADD KEY `fk_Substorage_yard_Storage_yard1_idx` (`Storage_yard_Storage_id`,`Storage_yard_User_User_id`);

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
  MODIFY `Articel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `storage_yard`
--
ALTER TABLE `storage_yard`
  MODIFY `Storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `substorage_yard`
--
ALTER TABLE `substorage_yard`
  MODIFY `Substorage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `articel`
--
ALTER TABLE `articel`
  ADD CONSTRAINT `fk_Articel_User1` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `storage_yard`
--
ALTER TABLE `storage_yard`
  ADD CONSTRAINT `fk_Storage_yard_User` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `substorage_yard`
--
ALTER TABLE `substorage_yard`
  ADD CONSTRAINT `fk_Substorage_yard_Storage_yard1` FOREIGN KEY (`Storage_yard_Storage_id`,`Storage_yard_User_User_id`) REFERENCES `storage_yard` (`Storage_id`, `User_User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
