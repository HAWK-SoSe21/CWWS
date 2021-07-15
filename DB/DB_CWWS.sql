-- MySQL Script generated by MySQL Workbench
-- Thu Jul 15 15:55:19 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_cwws
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_cwws
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_cwws` DEFAULT CHARACTER SET utf8 ;
USE `db_cwws` ;

-- -----------------------------------------------------
-- Table `db_cwws`.`properties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`properties` (
  `Properties_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Properties_name` VARCHAR(45) NOT NULL,
  `Properties_description` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Properties_id`),
  UNIQUE INDEX `Properties_name_UNIQUE` (`Properties_name` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`last_modified`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`last_modified` (
  `last_modified_id` INT(11) NOT NULL AUTO_INCREMENT,
  `last_modified_datetime` DATETIME NULL,
  `last_modified_user_id` INT(11) NULL,
  PRIMARY KEY (`last_modified_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_cwws`.`articel_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`articel_group` (
  `Articel_group_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Articel_group_picture` VARCHAR(255) NULL DEFAULT NULL,
  `last_modified_last_modified_id` INT(11) NULL,
  `Properties_Properties_id` INT(11) NOT NULL,
  PRIMARY KEY (`Articel_group_id`),
  UNIQUE INDEX `Articel_id_UNIQUE` (`Articel_group_id` ASC) ,
  INDEX `fk_Articel_group_Properties1_idx` (`Properties_Properties_id` ASC) ,
  INDEX `fk_articel_group_last_modified1_idx` (`last_modified_last_modified_id` ASC) ,
  CONSTRAINT `fk_Articel_group_Properties1`
    FOREIGN KEY (`Properties_Properties_id`)
    REFERENCES `db_cwws`.`properties` (`Properties_id`),
  CONSTRAINT `fk_articel_group_last_modified1`
    FOREIGN KEY (`last_modified_last_modified_id`)
    REFERENCES `db_cwws`.`last_modified` (`last_modified_id`)
    
    )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`format`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`format` (
  `Format_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Format_height` VARCHAR(55) NOT NULL,
  `Format_width` VARCHAR(55) NOT NULL,
  `Format_length` VARCHAR(55) NOT NULL,
  `Format_volume` VARCHAR(55) NULL DEFAULT NULL,
  `Format_available_storage_space` INT NULL,
  PRIMARY KEY (`Format_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`usage_statistics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`usage_statistics` (
  `Usage_statistics_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Usage_statistics_number_of_accesses` INT(10) UNSIGNED NULL DEFAULT NULL,
  `Usage_statistics_last_modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`Usage_statistics_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`user` (
  `User_id` INT(11) NOT NULL AUTO_INCREMENT,
  `User_name` VARCHAR(45) NOT NULL,
  `User_password` VARCHAR(255) NOT NULL,
  `User_email` VARCHAR(45) NOT NULL,
  `User_is_admin` TINYINT(1) NULL DEFAULT 0,
  `User_is_active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`User_id`),
  UNIQUE INDEX `User_id_UNIQUE` (`User_id` ASC) ,
  UNIQUE INDEX `User_email_UNIQUE` (`User_email` ASC) ,
  UNIQUE INDEX `User_name_UNIQUE` (`User_name` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`order` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `order_stackable` TINYINT(1) NULL DEFAULT NULL,
  `order_rotateable` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_cwws`.`articel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`articel` (
  `Articel_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Articel_picture` VARCHAR(255) NOT NULL,
  `Articel_expiry` DATE NULL DEFAULT NULL,
  `Articel_fragile` TINYINT(1) NULL DEFAULT NULL,
  `Articel_group_Articel_group_id` INT(11) NULL DEFAULT NULL,
  `Usage_statistics_Usage_statistics_id` INT(11) NULL DEFAULT NULL,
  `order_order_id` INT NULL DEFAULT NULL,
  `Properties_Properties_id` INT(11) NOT NULL,
  `Format_Format_id` INT(11) NOT NULL,
  `user_User_id` INT(11) NOT NULL,
  PRIMARY KEY (`Articel_id`),
  UNIQUE INDEX `Articel_id_UNIQUE` (`Articel_id` ASC) ,
  INDEX `fk_Articel_Articel_group1_idx` (`Articel_group_Articel_group_id` ASC) ,
  INDEX `fk_Articel_Properties1_idx` (`Properties_Properties_id` ASC) ,
  INDEX `fk_Articel_Format1_idx` (`Format_Format_id` ASC) ,
  INDEX `fk_Articel_Usage_statistics1_idx` (`Usage_statistics_Usage_statistics_id` ASC) ,
  INDEX `fk_articel_user1_idx` (`user_User_id` ASC) ,
  INDEX `fk_articel_order1_idx` (`order_order_id` ASC) ,
  CONSTRAINT `fk_Articel_Articel_group1`
    FOREIGN KEY (`Articel_group_Articel_group_id`)
    REFERENCES `db_cwws`.`articel_group` (`Articel_group_id`),
  CONSTRAINT `fk_Articel_Format1`
    FOREIGN KEY (`Format_Format_id`)
    REFERENCES `db_cwws`.`format` (`Format_id`),
  CONSTRAINT `fk_Articel_Properties1`
    FOREIGN KEY (`Properties_Properties_id`)
    REFERENCES `db_cwws`.`properties` (`Properties_id`),
  CONSTRAINT `fk_Articel_Usage_statistics1`
    FOREIGN KEY (`Usage_statistics_Usage_statistics_id`)
    REFERENCES `db_cwws`.`usage_statistics` (`Usage_statistics_id`),
  CONSTRAINT `fk_articel_user1`
    FOREIGN KEY (`user_User_id`)
    REFERENCES `db_cwws`.`user` (`User_id`),
  CONSTRAINT `fk_articel_order1`
    FOREIGN KEY (`order_order_id`)
    REFERENCES `db_cwws`.`order` (`order_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`aliase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`aliase` (
  `Aliase_1` VARCHAR(45) NOT NULL,
  `Articel_Articel_id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Aliase_1`),
  INDEX `fk_Aliase_Articel1_idx` (`Articel_Articel_id` ASC) ,
  CONSTRAINT `fk_Aliase_Articel1`
    FOREIGN KEY (`Articel_Articel_id`)
    REFERENCES `db_cwws`.`articel` (`Articel_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`storage_yard`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`storage_yard` (
  `Storage_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Storage_picture` VARCHAR(255) NOT NULL,
  `Storage_last_modified` DATETIME NULL,
  `Usage_statistics_idUsage_statistics` INT(11) NULL DEFAULT NULL,
  `Format_Format_id` INT(11) NOT NULL,
  `Properties_Properties_id` INT(11) NOT NULL,
  `user_User_id` INT(11) NOT NULL,
  PRIMARY KEY (`Storage_id`),
  UNIQUE INDEX `Storage_id_UNIQUE` (`Storage_id` ASC) ,
  INDEX `fk_Storage_yard_Format1_idx` (`Format_Format_id` ASC) ,
  INDEX `fk_Storage_yard_Properties1_idx` (`Properties_Properties_id` ASC) ,
  INDEX `fk_Storage_yard_Usage_statistics1_idx` (`Usage_statistics_idUsage_statistics` ASC) ,
  INDEX `fk_storage_yard_user1_idx` (`user_User_id` ASC) ,
  CONSTRAINT `fk_Storage_yard_Format1`
    FOREIGN KEY (`Format_Format_id`)
    REFERENCES `db_cwws`.`format` (`Format_id`),
  CONSTRAINT `fk_Storage_yard_Properties1`
    FOREIGN KEY (`Properties_Properties_id`)
    REFERENCES `db_cwws`.`properties` (`Properties_id`),
  CONSTRAINT `fk_Storage_yard_Usage_statistics1`
    FOREIGN KEY (`Usage_statistics_idUsage_statistics`)
    REFERENCES `db_cwws`.`usage_statistics` (`Usage_statistics_id`),
  CONSTRAINT `fk_storage_yard_user1`
    FOREIGN KEY (`user_User_id`)
    REFERENCES `db_cwws`.`user` (`User_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`subarticel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`subarticel` (
  `Subarticel_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Subarticel_quantity` INT(11) NULL DEFAULT NULL,
  `Subarticel_quantity_is_procent` TINYINT(1) NULL DEFAULT NULL,
  `Subarticel_binding` TINYINT(1) NULL DEFAULT NULL,
  `Subarticel_extracted` TINYINT(1) NULL DEFAULT NULL,
  `Subarticel_time_of_storage` DATE NULL DEFAULT NULL,
  `Articel_Articel_id` INT(11) NOT NULL,
  PRIMARY KEY (`Subarticel_id`),
  UNIQUE INDEX `Subarticel_id_UNIQUE` (`Subarticel_id` ASC) ,
  INDEX `fk_Subarticel_Articel1_idx` (`Articel_Articel_id` ASC) ,
  CONSTRAINT `fk_Subarticel_Articel1`
    FOREIGN KEY (`Articel_Articel_id`)
    REFERENCES `db_cwws`.`articel` (`Articel_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`substorage_yard`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`substorage_yard` (
  `Substorage_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Substorage_quantity` INT(11) NOT NULL,
  `Substorage_category` VARCHAR(45) NOT NULL,
  `Substorage_picture` VARCHAR(255) NULL DEFAULT NULL,
  `Properties_Properties_id` INT(11) NULL DEFAULT NULL,
  `last_modified_last_modified_id` INT(11) NULL,
  `Storage_yard_Storage_id` INT(11) NOT NULL,
  `format_Format_id` INT(11) NULL,
  PRIMARY KEY (`Substorage_id`),
  INDEX `fk_Substorage_yard_Storage_yard1_idx` (`Storage_yard_Storage_id` ASC) ,
  INDEX `fk_Substorage_yard_Properties1_idx` (`Properties_Properties_id` ASC) ,
  INDEX `fk_substorage_yard_last_modified1_idx` (`last_modified_last_modified_id` ASC) ,
  INDEX `fk_substorage_yard_format1_idx` (`format_Format_id` ASC) ,
  CONSTRAINT `fk_Substorage_yard_Properties1`
    FOREIGN KEY (`Properties_Properties_id`)
    REFERENCES `db_cwws`.`properties` (`Properties_id`),
  CONSTRAINT `fk_Substorage_yard_Storage_yard1`
    FOREIGN KEY (`Storage_yard_Storage_id`)
    REFERENCES `db_cwws`.`storage_yard` (`Storage_id`),
  CONSTRAINT `fk_substorage_yard_last_modified1`
    FOREIGN KEY (`last_modified_last_modified_id`)
    REFERENCES `db_cwws`.`last_modified` (`last_modified_id`)
    
    ,
  CONSTRAINT `fk_substorage_yard_format1`
    FOREIGN KEY (`format_Format_id`)
    REFERENCES `db_cwws`.`format` (`Format_id`)
    
    )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`substorage_yard_fixed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`substorage_yard_fixed` (
  `Substorage_fixed_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Substorage_fixed_category` VARCHAR(45) NOT NULL,
  `Articel_Articel_id` INT(11) NULL DEFAULT NULL,
  `Properties_Properties_id` INT(11) NULL DEFAULT NULL,
  `last_modified_last_modified_id` INT(11) NULL,
  `Format_Format_id` INT(11) NOT NULL,
  `Substorage_yard_Substorage_id` INT(11) NOT NULL,
  PRIMARY KEY (`Substorage_fixed_id`),
  INDEX `fk_Substorage_yard_fixed_Format1_idx` (`Format_Format_id` ASC) ,
  INDEX `fk_Substorage_yard_fixed_Articel1_idx` (`Articel_Articel_id` ASC) ,
  INDEX `fk_Substorage_yard_fixed_Substorage_yard1_idx` (`Substorage_yard_Substorage_id` ASC) ,
  INDEX `fk_Substorage_yard_fixed_Properties1_idx` (`Properties_Properties_id` ASC) ,
  INDEX `fk_substorage_yard_fixed_last_modified1_idx` (`last_modified_last_modified_id` ASC) ,
  CONSTRAINT `fk_Substorage_yard_fixed_Articel1`
    FOREIGN KEY (`Articel_Articel_id`)
    REFERENCES `db_cwws`.`articel` (`Articel_id`),
  CONSTRAINT `fk_Substorage_yard_fixed_Format1`
    FOREIGN KEY (`Format_Format_id`)
    REFERENCES `db_cwws`.`format` (`Format_id`),
  CONSTRAINT `fk_Substorage_yard_fixed_Properties1`
    FOREIGN KEY (`Properties_Properties_id`)
    REFERENCES `db_cwws`.`properties` (`Properties_id`),
  CONSTRAINT `fk_Substorage_yard_fixed_Substorage_yard1`
    FOREIGN KEY (`Substorage_yard_Substorage_id`)
    REFERENCES `db_cwws`.`substorage_yard` (`Substorage_id`),
  CONSTRAINT `fk_substorage_yard_fixed_last_modified1`
    FOREIGN KEY (`last_modified_last_modified_id`)
    REFERENCES `db_cwws`.`last_modified` (`last_modified_id`)
    
    )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_cwws`.`substorage_yard_mobile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cwws`.`substorage_yard_mobile` (
  `Substorage_mobile_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Substorage_mobile_cover` TINYINT(1) NOT NULL,
  `Substorage_mobile_category` VARCHAR(45) NOT NULL,
  `Substorage_mobile_binding` TINYINT(1) NULL DEFAULT NULL,
  `Substorage_mobile_extracted` TINYINT(1) NULL DEFAULT NULL,
  `Substorage_yard_mobile_Substorage_mobile_id` INT(11) NULL DEFAULT NULL,
  `Properties_Properties_id` INT(11) NULL DEFAULT NULL,
  `order_order_id` INT NULL DEFAULT NULL,
  `last_modified_last_modified_id` INT(11) NULL,
  `Format_Format_id` INT(11) NOT NULL,
  `Articel_Articel_id` INT(11) NOT NULL,
  `Substorage_yard_fixed_Substorage_fixed_id` INT(11) NOT NULL,
  PRIMARY KEY (`Substorage_mobile_id`),
  UNIQUE INDEX `Substorage_mobile_id_UNIQUE` (`Substorage_mobile_id` ASC) ,
  INDEX `fk_Substorage_yard_mobile_Substorage_yard_mobile1_idx` (`Substorage_yard_mobile_Substorage_mobile_id` ASC) ,
  INDEX `fk_Substorage_yard_mobile_Format1_idx` (`Format_Format_id` ASC) ,
  INDEX `fk_Substorage_yard_mobile_Articel1_idx` (`Articel_Articel_id` ASC) ,
  INDEX `fk_Substorage_yard_mobile_Substorage_yard_fixed1_idx` (`Substorage_yard_fixed_Substorage_fixed_id` ASC) ,
  INDEX `fk_Substorage_yard_mobile_Properties1_idx` (`Properties_Properties_id` ASC) ,
  INDEX `fk_substorage_yard_mobile_order1_idx` (`order_order_id` ASC) ,
  INDEX `fk_substorage_yard_mobile_last_modified1_idx` (`last_modified_last_modified_id` ASC) ,
  CONSTRAINT `fk_Substorage_yard_mobile_Articel1`
    FOREIGN KEY (`Articel_Articel_id`)
    REFERENCES `db_cwws`.`articel` (`Articel_id`),
  CONSTRAINT `fk_Substorage_yard_mobile_Format1`
    FOREIGN KEY (`Format_Format_id`)
    REFERENCES `db_cwws`.`format` (`Format_id`),
  CONSTRAINT `fk_Substorage_yard_mobile_Properties1`
    FOREIGN KEY (`Properties_Properties_id`)
    REFERENCES `db_cwws`.`properties` (`Properties_id`),
  CONSTRAINT `fk_Substorage_yard_mobile_Substorage_yard_fixed1`
    FOREIGN KEY (`Substorage_yard_fixed_Substorage_fixed_id`)
    REFERENCES `db_cwws`.`substorage_yard_fixed` (`Substorage_fixed_id`),
  CONSTRAINT `fk_Substorage_yard_mobile_Substorage_yard_mobile1`
    FOREIGN KEY (`Substorage_yard_mobile_Substorage_mobile_id`)
    REFERENCES `db_cwws`.`substorage_yard_mobile` (`Substorage_mobile_id`),
  CONSTRAINT `fk_substorage_yard_mobile_order1`
    FOREIGN KEY (`order_order_id`)
    REFERENCES `db_cwws`.`order` (`order_id`),
  CONSTRAINT `fk_substorage_yard_mobile_last_modified1`
    FOREIGN KEY (`last_modified_last_modified_id`)
    REFERENCES `db_cwws`.`last_modified` (`last_modified_id`)
    
    )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
