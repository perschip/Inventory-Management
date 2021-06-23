# Inventory-Management


Inventory Management System Created for CompSci Independent Study.



Database Schema

# Create Database

CREATE DATABASE inventory;

# Create User's Table

use inventory;

CREATE TABLE `users` (
	`ID` INT NOT NULL AUTO_INCREMENT,
	`FIRST_NAME` TEXT,
	`LAST_NAME` TEXT,
	`EMAIL` TEXT,
	`SIDE` TEXT,
	`PERMISSION_LEVEL` INT,
	`PASSWORD` VARCHAR
);

# Add Master User

INSERT INTO  `users` (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, SIDE, PERMISSION_LEVEL) VALUES (`John`, `Doe`, `john.doe@email.com`, SHA1(`Password`), `Global`, `4`);

# Create Technology Table

use inventory;

CREATE TABLE `technology` (
	`ID` INT NOT NULL AUTO_INCREMENT,
	`DEVICE_NAME` TEXT,
	`DEVICE_MODEL` TEXT,
	`DEVICE_MAKE` TEXT,
	`DEVICE_IP` TEXT,
	`DEVICE_MANUFACTURE` TEXT,
	`DEVICE_LOCATION` TEXT,
	`DEVICE_SERIAL` TEXT
);

# Create Buildings Table

use inventory;

CREATE TABLE `buildings` (
	`ID` INT NOT NULL AUTO_INCREMENT,
	`BUILDING_NAME` TEXT,
	`BUILDING_ADDRESS` TEXT,
	`BUILDING_STATE` TEXT,
	`BUILDING_CITY` TEXT,
	`BUILDING_ZIPCODE` TEXT
);
