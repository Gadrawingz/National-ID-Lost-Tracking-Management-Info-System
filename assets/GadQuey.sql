

CREATE TABLE `nid_tracking`.`found` 
( `id_pk` INT(10) NOT NULL AUTO_INCREMENT , `nid_names` INT NOT NULL , 
	`nid_dob` VARCHAR(16) NOT NULL , `nid_sex` VARCHAR(2) NOT NULL , 
	`nid_place_of_issue` VARCHAR(150) NOT NULL , `nid_image` VARCHAR(200) NOT NULL , 
	`found_location` CHAR(2) NULL , `finder_fn` VARCHAR(100) NULL , 
	`finder_ln` VARCHAR(100) NULL , `finder_contact` VARCHAR(255) NULL , 
	`found_date` VARCHAR NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	PRIMARY KEY (`id_pk`)) ENGINE = InnoDB;


CREATE TABLE `nid_tracking`.`lost_check` ( 
	`check_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`nid_number` INT(16) NOT NULL COMMENT 'Treated as Fake FK', 
	`is_found` TINYINT(1) NOT NULL DEFAULT '0', 
	`has_reward` TINYINT(1) NOT NULL DEFAULT '0' , 
	`is_received` TINYINT(1) NOT NULL DEFAULT '0' , 
	`action_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	PRIMARY KEY (`check_id`)) ENGINE = InnoDB;