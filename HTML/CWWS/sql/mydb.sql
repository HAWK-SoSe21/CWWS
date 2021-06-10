-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 05:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articel`
--

CREATE TABLE `articel` (
  `Articel_id` int(11) NOT NULL,
  `Articel_name` varchar(45) NOT NULL,
  `Articel_format_height` float NOT NULL,
  `Articel_format_width` float NOT NULL,
  `Articel_format_length` float NOT NULL,
  `Articel_picture` blob NOT NULL,
  `Articel_description` varchar(45) NOT NULL,
  `Articel_alias` varchar(45) NOT NULL,
  `Articel_expiry` date NOT NULL,
  `User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storage_yard`
--

CREATE TABLE `storage_yard` (
  `Storage_id` int(11) NOT NULL,
  `Storage_name` varchar(45) NOT NULL,
  `Storage_description` varchar(45) DEFAULT NULL,
  `Storage_category` varchar(45) NOT NULL,
  `Storage_picture` blob NOT NULL,
  `Storage_format_heigth` float NOT NULL,
  `Storage_format_width` float NOT NULL,
  `Storage_format_length` float NOT NULL,
  `Storage_furniture` varchar(45) NOT NULL,
  `User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `substorage_yard`
--

CREATE TABLE `substorage_yard` (
  `Substorage_id` int(11) NOT NULL,
  `Substorage_name` varchar(45) NOT NULL,
  `Substorage_description` varchar(45) NOT NULL,
  `Substorage_picture` blob DEFAULT NULL,
  `Storage_yard_Storage_id` int(11) NOT NULL,
  `Storage_yard_User_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `User_first_name` varchar(45) NOT NULL,
  `User_second_name` varchar(45) NOT NULL,
  `User_password` varchar(255) NOT NULL,
  `User_email` varchar(45) NOT NULL,
  `User_birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `User_first_name`, `User_second_name`, `User_password`, `User_email`, `User_birthday`) VALUES
(3, 'amine', 'amine', '$2y$10$Xxj2R2xIhwwdK1ebauGao.no6E694Gf0GdmC3VWsmmxnZTmTwAW7S', 'amine@gmail.com', '1990-11-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articel`
--
ALTER TABLE `articel`
  ADD PRIMARY KEY (`Articel_id`,`User_User_id`),
  ADD UNIQUE KEY `Articel_id_UNIQUE` (`Articel_id`),
  ADD KEY `fk_Articel_User1_idx` (`User_User_id`);

--
-- Indexes for table `storage_yard`
--
ALTER TABLE `storage_yard`
  ADD PRIMARY KEY (`Storage_id`,`User_User_id`),
  ADD UNIQUE KEY `Storage_id_UNIQUE` (`Storage_id`),
  ADD KEY `fk_Storage_yard_User_idx` (`User_User_id`);

--
-- Indexes for table `substorage_yard`
--
ALTER TABLE `substorage_yard`
  ADD PRIMARY KEY (`Substorage_id`,`Storage_yard_Storage_id`,`Storage_yard_User_User_id`),
  ADD UNIQUE KEY `Substorage_id_UNIQUE` (`Substorage_id`),
  ADD KEY `fk_Substorage_yard_Storage_yard1_idx` (`Storage_yard_Storage_id`,`Storage_yard_User_User_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_id_UNIQUE` (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articel`
--
ALTER TABLE `articel`
  MODIFY `Articel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage_yard`
--
ALTER TABLE `storage_yard`
  MODIFY `Storage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `substorage_yard`
--
ALTER TABLE `substorage_yard`
  MODIFY `Substorage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articel`
--
ALTER TABLE `articel`
  ADD CONSTRAINT `fk_Articel_User1` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `storage_yard`
--
ALTER TABLE `storage_yard`
  ADD CONSTRAINT `fk_Storage_yard_User` FOREIGN KEY (`User_User_id`) REFERENCES `user` (`User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `substorage_yard`
--
ALTER TABLE `substorage_yard`
  ADD CONSTRAINT `fk_Substorage_yard_Storage_yard1` FOREIGN KEY (`Storage_yard_Storage_id`,`Storage_yard_User_User_id`) REFERENCES `storage_yard` (`Storage_id`, `User_User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
