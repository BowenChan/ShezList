CREATE SCHEMA IF NOT EXISTS `shezlist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `shezlist`;

-- Setting the Foreign Key check to 0 to allow deletion
SET FOREIGN_KEY_CHECKS = 0;


-- ---------------------------------------------------
-- -----------  CREATING TABLE USER  -----------------
-- ---------------------------------------------------

DROP TABLE IF EXISTS `shezlist`.`user`;

CREATE TABLE IF NOT EXISTS `shezlist`.`user`(
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(40) NULL,
	`phone_number` VARCHAR(40) NULL,
	`rating` INT NULL,
	PRIMARY KEY (`user_id`),
	UNIQUE INDEX `user_id_unique` (`user_id` ASC))
;

-- ---------------------------------------------------
-- --------  CREATING TABLE USER ACCOUNT -------------
-- ---------------------------------------------------
DROP TABLE IF EXISTS `shezlist`.`user_account`;

CREATE TABLE IF NOT EXISTS `shezlist`.`user_account`(
	`user_id` INT NOT NULL,
	`username` VARCHAR(40) NULL,
	`password` VARCHAR(40) NULL,
	-- Added Hash Password --
	`hashPassword` varChar(40) NULL,
	PRIMARY KEY(`user_id`),
	INDEX `user_id_idx`(`user_id` ASC),
	CONSTRAINT `user_id`
		FOREIGN KEY (`user_id`)
		REFERENCES `shezlist`.`user` (`user_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

-- ---------------------------------------------------
-- --------  CREATING TABLE Privilege Rights  --------
-- ---------------------------------------------------

DROP TABLE IF EXISTS `shezlist`.`privilege_rights`;

CREATE TABLE IF NOT EXISTS `shezlist`.`privilege_rights`(
	`role_id` INT NOT NULL AUTO_INCREMENT,
	`role` VARCHAR(40) NULL,
	`read` INT NULL,
	`deleteP` INT NULL,
	`write` INT NULL,
	`delete_all` INT NULL,
	`ban` INT NULL,
	`block` INT NULL,
	`remove` INT NULL,
	`give_admin_access` INT NULL,
	`modify_db` INT NULL,
	PRIMARY KEY (`role_id`),
	UNIQUE INDEX `role_id_unique` (`role_id` ASC)

);

-- ---------------------------------------------------
-- -------  Inserting TABLE Privilege Rights  --------
-- ---------------------------------------------------

INSERT INTO `shezlist`.`privilege_rights`(`role`, `read`, `deleteP`, `write`, `delete_all`, `ban`, `block`, `remove`, `give_admin_access`, `modify_db`) VALUES
("member", 0,0,0,0,0,0,0,0,0),
("moderator", 0,0,0,0,0,0,0,0,0),
("admin",1,1,1,1,1,1,1,1,1);

-- ---------------------------------------------------
-- --------  CREATING TABLE USER ACCESS --------------
-- ---------------------------------------------------
DROP TABLE IF EXISTS `shezlist`.`user_access`;

CREATE TABLE IF NOT EXISTS `shezlist`.`user_access` (
	`UA_user_id` INT NOT NULL,
	`UA_role_id` INT NULL,
	PRIMARY KEY (`UA_user_id`),
	UNIQUE INDEX `UA_user_id_unique` (`UA_user_id` ASC),
	INDEX `UA_user_id_idx` (`UA_user_id` ASC),
	INDEX `UA_role_id_idx` (`UA_role_id` ASC),
	CONSTRAINT `UA_user_id`
		FOREIGN KEY (`UA_user_id`)
		REFERENCES `shezlist`.`user` (`user_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT `UA_role_id`
		FOREIGN KEY (`UA_role_id`)
		REFERENCES `shezlist`.`privilege_rights`(`role_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

-- ---------------------------------------------------
-- --------  CREATING TABLE TRANSACTION --------------
-- ---------------------------------------------------

DROP TABLE IF EXISTS `shezlist`.`transaction`;

CREATE TABLE IF NOT EXISTS `shezlist`.`transaction`(
	`transaction_id` INT NOT NULL AUTO_INCREMENT,
	`user_1_id` INT NOT NULL,
	`user_1_rating` INT NULL,
	`user_2_id` INT NOT NULL,
	`user_2_rating` INT NULL,
	INDEX `trx_user_1_id_idx` (`user_1_id` ASC),
	INDEX `trx_user_2_id_idx` (`user_2_id` ASC),
	CONSTRAINT `user_1_id`
		FOREIGN KEY (`user_1_id`)
		REFERENCES `shezlist`.`user` (`user_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT `user_2_id`
		FOREIGN KEY (`user_2_id`)
		REFERENCES `shezlist`.`user` (`user_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (`transaction_id`),
	UNIQUE KEY `transaction_id_unique` (`transaction_id` ASC)
);

-- ---------------------------------------------------
-- ----------  CREATING TABLE CONDITION --------------
-- ---------------------------------------------------

DROP TABLE IF EXISTS `shezlist`.`condition`;

CREATE TABLE IF NOT EXISTS `shezlist`.`condition`(
	`condition_id` INT NOT NULL AUTO_INCREMENT,
	`quality` VARCHAR(40) NOT NULL,
	PRIMARY KEY (`condition_id`),
	UNIQUE KEY `condition_id_unique` (`condition_id` ASC)

);

-- ---------------------------------------------------
-- -------------  INSERTING CONDITION ----------------
-- ---------------------------------------------------

INSERT INTO `shezlist`.`condition`(`quality`) VALUES
('POOR'),
('DECENT'),
('WORN DOWN'),
('NEW');

-- ---------------------------------------------------
-- ----------  CREATING TABLE CONDITION --------------
-- ---------------------------------------------------

DROP TABLE IF EXISTS `shezlist`.`category`;

CREATE TABLE IF NOT EXISTS `shezlist`.`condition`(
	`category_id` INT NOT NULL AUTO_INCREMENT,
	`categoryType` VARCHAR(40) NOT NULL,
	PRIMARY KEY (`category_id`),
	UNIQUE KEY `category_id_unique` (`category_id` ASC)

);


-- ---------------------------------------------------
-- -------------  INSERTING Category ----------------
-- ---------------------------------------------------

INSERT INTO `shezlist`.`category`(`categorType`) VALUES
('MATH'),
('ENGLISH'),
('HISTORY'),
('SCIENCE');

-- ---------------------------------------------------
-- -------------  CREATING TABLE POST ----------------
-- ---------------------------------------------------

DROP TABLE IF EXISTS `shezlist`.`post`;

CREATE TABLE IF NOT EXISTS `shezlist`.`post`(
	`post_id` INT NOT NULL AUTO_INCREMENT,
	`pst_user_id` INT NOT NULL,
	`title` VARCHAR(40) NULL,
	`description` VARCHAR(40) NULL,
	`book_category` INT NULL,
	`condition_id` INT NULL,
	`image_url` VARCHAR(40) NULL,
	PRIMARY KEY (`post_id`),
	UNIQUE KEY `post_id_unique` (`post_id` ASC),
	INDEX `pst_user_id_idx` (`pst_user_id` ASC),
	INDEX `condition_id_idx` (`condition_id` ASC),
	CONSTRAINT `pst_user_id`
		FOREIGN KEY (`pst_user_id`)
		REFERENCES `shezlist`.`user` (`user_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT `condition_id`
		FOREIGN KEY (`condition_id`)
		REFERENCES `shezlist`.`condition` (`condition_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

-- ---------------------------------------------------
-- -----------  CREATING TABLE FAVORITE --------------
-- ---------------------------------------------------

DROP TABLE IF EXISTS `shezlist`.`favorite`;

CREATE TABLE IF NOT EXISTS `shezlist`.`favorite`(
	`favorite_id` INT NOT NULL AUTO_INCREMENT,
	`fav_post_id` INT NOT NULL,
	`fav_user_id` INT NOT NULL,
	PRIMARY KEY (`favorite_id`),
	UNIQUE KEY `favorite_id_unique` (`favorite_id` ASC),
	INDEX `fav_user_id_idx` (`fav_user_id` ASC),
	INDEX `fav_post_id_idx` (`fav_post_id` ASC),
	CONSTRAINT `fav_user_id`
		FOREIGN KEY (`fav_user_id`)
		REFERENCES `shezlist`.`user` (`user_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT `fav_post_id`
		FOREIGN KEY (`fav_post_id`)
		REFERENCES `shezlist`.`post` (`post_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE

);

SET FOREIGN_KEY_CHECKS = 1;



