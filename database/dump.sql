CREATE DATABASE IF NOT EXISTS `db_blog_novembre` 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use db_blog_novembre;

CREATE TABLE IF NOT EXISTS `users` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(255) NOT NULL UNIQUE,
	`password` VARCHAR(256) NOT NULL,
	`pseudo` VARCHAR(255),
	`admin` ENUM('true','false') DEFAULT 'false',
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles` (
	`article_id` INT NOT NULL AUTO_INCREMENT,
	`content` TEXT,
	`date` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`user_id` INT NOT NULL,
	PRIMARY KEY (`article_id`),
	CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `comments` (
	`comment_id` INT NOT NULL AUTO_INCREMENT,
	`content` TEXT,
	`date` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`user_id` INT NOT NULL,
	`previous_comment_id` INT NOT NULL,
	PRIMARY KEY (`comment_id`),
	CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
	CONSTRAINT FOREIGN KEY (`previous_comment_id`) REFERENCES `comments`(`comment_id`) ON DELETE CASCADE
) ENGINE=InnoDB;
