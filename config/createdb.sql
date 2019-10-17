-- MySQL Script generated by MySQL Workbench
-- Tue Oct 15 09:59:13 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema michaelpascale
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema michaelpascale
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `michaelpascale` DEFAULT CHARACTER SET utf8 ;
USE `michaelpascale` ;
-- -----------------------------------------------------
-- Table `michaelpascale`.`Challenge`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `michaelpascale`.`Challenge` ;

CREATE TABLE IF NOT EXISTS `michaelpascale`.`Challenge` (
  `challengeID` INT NOT NULL AUTO_INCREMENT,
  `problem` LONGTEXT NOT NULL,
  `solution` LONGTEXT NOT NULL,
  PRIMARY KEY (`challengeID`),
  UNIQUE INDEX `challengeID_UNIQUE` (`challengeID` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `michaelpascale`.`Login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `michaelpascale`.`Login` ;

CREATE TABLE IF NOT EXISTS `michaelpascale`.`Login` (
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `password_UNIQUE` (`password` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `michaelpascale`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `michaelpascale`.`User` ;

CREATE TABLE IF NOT EXISTS `michaelpascale`.`User` (
  `username` VARCHAR(16) NOT NULL,
  `isParticipant` TINYINT NOT NULL DEFAULT 0,
  `isAdmin` TINYINT NOT NULL DEFAULT 0,
  `isOrganizer` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`),
  UNIQUE INDEX `Login_username_UNIQUE` (`username` ASC) VISIBLE,
  CONSTRAINT `fk_User_Login`
    FOREIGN KEY (`username`)
    REFERENCES `michaelpascale`.`Login` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `michaelpascale`.`ParticipantChallenge`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `michaelpascale`.`ParticipantChallenge` ;

CREATE TABLE IF NOT EXISTS `michaelpascale`.`ParticipantChallenge` (
  `username` VARCHAR(16) NOT NULL,
  `challengeID` INT NOT NULL,
  `attempt` LONGTEXT NULL,
  `numAttempts` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`, `challengeID`),
  INDEX `fk_ParticipantChallenge_Challenge1_idx` (`challengeID` ASC) VISIBLE,
  CONSTRAINT `fk_ParticipantChallenge_User1`
    FOREIGN KEY (`username`)
    REFERENCES `michaelpascale`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ParticipantChallenge_Challenge1`
    FOREIGN KEY (`challengeID`)
    REFERENCES `michaelpascale`.`Challenge` (`challengeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `michaelpascale`.`OrganizerChallenge`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `michaelpascale`.`OrganizerChallenge` ;

CREATE TABLE IF NOT EXISTS `michaelpascale`.`OrganizerChallenge` (
  `username` VARCHAR(16) NOT NULL,
  `challengeID` INT NOT NULL,
  PRIMARY KEY (`username`, `challengeID`),
  INDEX `fk_OrganizerChallenge_Challenge1_idx` (`challengeID` ASC) VISIBLE,
  CONSTRAINT `fk_OrganizerChallenge_User1`
    FOREIGN KEY (`username`)
    REFERENCES `michaelpascale`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrganizerChallenge_Challenge1`
    FOREIGN KEY (`challengeID`)
    REFERENCES `michaelpascale`.`Challenge` (`challengeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
