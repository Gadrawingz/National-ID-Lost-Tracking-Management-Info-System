

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


CREATE TABLE `nid_tracking`.`police_station` ( 
	`station_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`station_name` VARCHAR(200) NOT NULL , 
	`district` VARCHAR(100) NOT NULL , 
	`sector` VARCHAR(100) NOT NULL , 
	`station_commander` VARCHAR(100) NOT NULL , 
	`contact_number` VARCHAR(20) NOT NULL , 
	`username` VARCHAR(50) NOT NULL , 
	`password` VARCHAR(100) NOT NULL ,
	`status` TINYINT(1) NOT NULL DEFAULT '1' ,
	PRIMARY KEY (`station_id`)) ENGINE = InnoDB;



ALTER TABLE `user` CHANGE `admin_id` 
`user_id` INT(10) NOT NULL AUTO_INCREMENT, 
CHANGE `username` `telephone` VARCHAR(20) CHARACTER SET 
utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, 
CHANGE `email` `created_at` DATETIME NOT NULL;

ALTER TABLE `user` CHANGE `user_id` `user_id` INT(10) NOT NULL AUTO_INCREMENT;