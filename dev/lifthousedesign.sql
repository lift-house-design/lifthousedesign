SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

CREATE  TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `password` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `disabled` TINYINT(4) NOT NULL DEFAULT '0' ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `clients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clients` ;

CREATE  TABLE IF NOT EXISTS `clients` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `users_id` INT(11) NOT NULL ,
  `billing_first_name` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `billing_last_name` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `billing_address1` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `billing_address2` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `billing_city` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `billing_state` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `billing_zip` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `alternate_address1` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `alternate_address2` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `alternate_city` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `alternate_state` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `alternate_zip` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `contact_first_name` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `contact_last_name` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `office_phone` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `office_phone_ext` VARCHAR(5) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `mobile_phone` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `mobile_phone_txt_capable` TINYINT(4) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_clients_users1_idx` (`users_id` ASC) ,
  CONSTRAINT `fk_clients_users1`
    FOREIGN KEY (`users_id` )
    REFERENCES `users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `employees`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `employees` ;

CREATE  TABLE IF NOT EXISTS `employees` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `users_id` INT(11) NOT NULL ,
  `first_name` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `last_name` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `job_title` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_employees_users_idx` (`users_id` ASC) ,
  CONSTRAINT `fk_employees_users`
    FOREIGN KEY (`users_id` )
    REFERENCES `users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `projects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects` ;

CREATE  TABLE IF NOT EXISTS `projects` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `clients_id` INT(11) NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `domain_name` VARCHAR(128) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `version` DECIMAL(3,1) NULL DEFAULT NULL ,
  `version_name` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `disabled` TINYINT(4) NOT NULL DEFAULT '0' ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  `billing_rate` DECIMAL(4,2) NULL DEFAULT NULL ,
  `billing_amount` DECIMAL(5,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_project_clients1_idx` (`clients_id` ASC) ,
  CONSTRAINT `fk_project_clients1`
    FOREIGN KEY (`clients_id` )
    REFERENCES `clients` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `features`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `features` ;

CREATE  TABLE IF NOT EXISTS `features` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `projects_id` INT(11) NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `estimated_time` DECIMAL(4,1) NULL DEFAULT NULL ,
  `disabled` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0' ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  `billing_rate` DECIMAL(4,2) NULL DEFAULT NULL ,
  `billing_amount` DECIMAL(5,2) NULL DEFAULT NULL ,
  `is_punch_item` TINYINT(4) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_features_projects1_idx` (`projects_id` ASC) ,
  CONSTRAINT `fk_features_projects1`
    FOREIGN KEY (`projects_id` )
    REFERENCES `projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `inquiries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inquiries` ;

CREATE  TABLE IF NOT EXISTS `inquiries` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `company` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `website` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `phone` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `project_info` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `email_successful` TINYINT(4) NULL DEFAULT '0' ,
  `email_debug` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `time`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `time` ;

CREATE  TABLE IF NOT EXISTS `time` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `features_id` INT(11) NOT NULL ,
  `employees_id` INT(11) NOT NULL ,
  `time_in` DATETIME NOT NULL ,
  `time_out` DATETIME NOT NULL ,
  `notes` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_time_features1_idx` (`features_id` ASC) ,
  INDEX `fk_time_employees1_idx` (`employees_id` ASC) ,
  CONSTRAINT `fk_time_features1`
    FOREIGN KEY (`features_id` )
    REFERENCES `features` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_time_employees1`
    FOREIGN KEY (`employees_id` )
    REFERENCES `employees` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `portfolio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portfolio` ;

CREATE  TABLE IF NOT EXISTS `portfolio` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NOT NULL ,
  `description` TEXT NOT NULL ,
  `image` VARCHAR(256) NOT NULL ,
  `url` VARCHAR(64) NOT NULL ,
  `disabled` TINYINT NOT NULL DEFAULT 0 ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `portfolio`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `portfolio` (`id`, `name`, `description`, `image`, `url`, `disabled`, `created_at`, `updated_at`) VALUES (1, 'Accident Review', 'Some description.', 'http://placehold.it/200x170', 'http://www.accidentreview.com', 0, '2013-06-27 18:25:13', '2013-06-27 18:25:13');
INSERT INTO `portfolio` (`id`, `name`, `description`, `image`, `url`, `disabled`, `created_at`, `updated_at`) VALUES (NULL, 'Locizzle', 'Some description.', 'http://placehold.it/200x170', 'https://www.locizzle.com', 0, '2013-06-27 18:25:13', '2013-06-27 18:25:13');
INSERT INTO `portfolio` (`id`, `name`, `description`, `image`, `url`, `disabled`, `created_at`, `updated_at`) VALUES (NULL, 'Seekonk Car Storage', 'Some description.', 'http://placehold.it/200x170', 'http://www.seekonkcarstorage.com', 0, '2013-06-27 18:25:13', '2013-06-27 18:25:13');
INSERT INTO `portfolio` (`id`, `name`, `description`, `image`, `url`, `disabled`, `created_at`, `updated_at`) VALUES (NULL, 'Another Site', 'Some description.', 'http://placehold.it/200x170', 'http://www.google.com', 0, '2013-06-27 18:25:13', '2013-06-27 18:25:13');

COMMIT;
