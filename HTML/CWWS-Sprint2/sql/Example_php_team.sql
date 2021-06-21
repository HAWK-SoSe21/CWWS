-- ----------------------------------------------------------------------------------------
-- MySQL Script generated by MySQL Workbench
-- MySQL Workbench Forward Engineering
-- Date: Thu May 27 11:36:41 2021
-- Model: Example_php_team    
-- Version: 1.0
-- Author: Gerrit Bohne
-- ----------------------------------------------------------------------------------------

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `User_id` INT NOT NULL AUTO_INCREMENT,
  `User_first_name` VARCHAR(45) NOT NULL,
  `User_second_name` VARCHAR(45) NOT NULL,
  `User_password` VARCHAR(45) NOT NULL,
  `User_email` VARCHAR(45) NOT NULL,
  `User_birthday` DATE NOT NULL,
  PRIMARY KEY (`User_id`),
  UNIQUE INDEX `User_id_UNIQUE` (`User_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Articel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Articel` (
  `Articel_id` INT NOT NULL AUTO_INCREMENT,
  `Articel_name` VARCHAR(45) NOT NULL,
  `Articel_format_height` FLOAT NOT NULL,
  `Articel_format_width` FLOAT NOT NULL,
  `Articel_format_length` FLOAT NOT NULL,
  `Articel_picture` BLOB NOT NULL,
  `Articel_description` VARCHAR(45) NOT NULL,
  `Articel_alias` VARCHAR(45) NOT NULL,
  `Articel_expiry` DATE NOT NULL,
  `User_User_id` INT NOT NULL,
  PRIMARY KEY (`Articel_id`, `User_User_id`),
  UNIQUE INDEX `Articel_id_UNIQUE` (`Articel_id` ASC),
  INDEX `fk_Articel_User1_idx` (`User_User_id` ASC),
  CONSTRAINT `fk_Articel_User1`
    FOREIGN KEY (`User_User_id`)
    REFERENCES `mydb`.`User` (`User_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Storage_yard`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Storage_yard` (
  `Storage_id` INT NOT NULL AUTO_INCREMENT,
  `Storage_name` VARCHAR(45) NOT NULL,
  `Storage_description` VARCHAR(45) NULL,
  `Storage_category` VARCHAR(45) NOT NULL,
  `Storage_picture` BLOB NOT NULL,
  `Storage_format_heigth` FLOAT NOT NULL,
  `Storage_format_width` FLOAT NOT NULL,
  `Storage_format_length` FLOAT NOT NULL,
  `Storage_furniture` VARCHAR(45) NOT NULL,
  `User_User_id` INT NOT NULL,
  PRIMARY KEY (`Storage_id`, `User_User_id`),
  UNIQUE INDEX `Storage_id_UNIQUE` (`Storage_id` ASC),
  INDEX `fk_Storage_yard_User_idx` (`User_User_id` ASC),
  CONSTRAINT `fk_Storage_yard_User`
    FOREIGN KEY (`User_User_id`)
    REFERENCES `mydb`.`User` (`User_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Substorage_yard`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Substorage_yard` (
  `Substorage_id` INT NOT NULL AUTO_INCREMENT,
  `Substorage_name` VARCHAR(45) NOT NULL,
  `Substorage_description` VARCHAR(45) NOT NULL,
  `Substorage_picture` BLOB NULL,
  `Storage_yard_Storage_id` INT NOT NULL,
  `Storage_yard_User_User_id` INT NOT NULL,
  PRIMARY KEY (`Substorage_id`, `Storage_yard_Storage_id`, `Storage_yard_User_User_id`),
  UNIQUE INDEX `Substorage_id_UNIQUE` (`Substorage_id` ASC),
  INDEX `fk_Substorage_yard_Storage_yard1_idx` (`Storage_yard_Storage_id` ASC, `Storage_yard_User_User_id` ASC),
  CONSTRAINT `fk_Substorage_yard_Storage_yard1`
    FOREIGN KEY (`Storage_yard_Storage_id` , `Storage_yard_User_User_id`)
    REFERENCES `mydb`.`Storage_yard` (`Storage_id` , `User_User_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;