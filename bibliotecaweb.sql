-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_biblioteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_biblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_biblioteca` DEFAULT CHARACTER SET utf8 ;
USE `bd_biblioteca` ;

-- -----------------------------------------------------
-- Table `bd_biblioteca`.`tb_autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_biblioteca`.`tb_autor` (
  `idt_autor` INT NOT NULL AUTO_INCREMENT,
  `nme_autor` VARCHAR(45) NOT NULL,
  `dta_nasc_autor` DATE NOT NULL,
  PRIMARY KEY (`idt_autor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_biblioteca`.`tb_editora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_biblioteca`.`tb_editora` (
  `idt_editora` INT NOT NULL AUTO_INCREMENT,
  `nme_editora` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idt_editora`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_biblioteca`.`tb_genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_biblioteca`.`tb_genero` (
  `idt_genero` INT NOT NULL AUTO_INCREMENT,
  `nme_genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idt_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_biblioteca`.`ta_livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_biblioteca`.`ta_livro` (
  `idt_livro` INT NOT NULL AUTO_INCREMENT,
  `cod_autor` INT NOT NULL,
  `cod_editora` INT NOT NULL,
  `cod_genero` INT NOT NULL,
  `nme_livro` VARCHAR(45) NOT NULL,
  `dta_public_livro` DATE NOT NULL,
  `caminho_livro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idt_livro`),
  INDEX `fk_tb_livro_tb_autor_idx` (`cod_autor` ASC),
  INDEX `fk_tb_livro_tb_editora1_idx` (`cod_editora` ASC),
  INDEX `fk_tb_livro_tb_genero1_idx` (`cod_genero` ASC),
  CONSTRAINT `fk_tb_livro_tb_autor`
    FOREIGN KEY (`cod_autor`)
    REFERENCES `bd_biblioteca`.`tb_autor` (`idt_autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_livro_tb_editora1`
    FOREIGN KEY (`cod_editora`)
    REFERENCES `bd_biblioteca`.`tb_editora` (`idt_editora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_livro_tb_genero1`
    FOREIGN KEY (`cod_genero`)
    REFERENCES `bd_biblioteca`.`tb_genero` (`idt_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_biblioteca`.`tb_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_biblioteca`.`tb_perfil` (
  `idt_perfil` INT NOT NULL AUTO_INCREMENT,
  `nme_perfil` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idt_perfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_biblioteca`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_biblioteca`.`tb_usuario` (
  `idt_usuario` INT NOT NULL AUTO_INCREMENT,
  `cod_perfil` INT NOT NULL,
  `nme_usuario` VARCHAR(45) NOT NULL,
  `email_usuario` VARCHAR(250) NOT NULL,
  `dta_nascimento` DATE NOT NULL,
  `senha_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idt_usuario`),
  INDEX `fk_tb_usuario_tb_perfil1_idx` (`cod_perfil` ASC),
  CONSTRAINT `fk_tb_usuario_tb_perfil1`
    FOREIGN KEY (`cod_perfil`)
    REFERENCES `bd_biblioteca`.`tb_perfil` (`idt_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
