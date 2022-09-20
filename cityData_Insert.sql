DROP DATABASE IF EXISTS cityData;

CREATE DATABASE cityData;

USE cityData;

CREATE TABLE IF NOT EXISTS `Country` (
  `identifier` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `Region` (
  `identifier` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  `country` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`identifier`),
  FOREIGN KEY (country) REFERENCES Country(identifier)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `Department` (
  `identifier` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  `department_number` char(3) NOT NULL,
  `region` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`identifier`),
  FOREIGN KEY (region) REFERENCES Region(identifier)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `City` (
  `identifier` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  `city_code` CHAR(5) NOT NULL,
  `postal_code` CHAR(5) NOT NULL,
  `department` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`identifier`),
  FOREIGN KEY (department) REFERENCES Department(identifier)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;