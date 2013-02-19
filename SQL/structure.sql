-- Adminer 3.6.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `topics_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `password_recoveries`;
CREATE TABLE `password_recoveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `hash` text NOT NULL,
  `attemp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `replies`;
CREATE TABLE `replies` (
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login',  'Login privileges, granted after account confirmation'),
(2, 'admin',  'Administrative user, has access to everything.');

DROP TABLE IF EXISTS `roles_categories`;
CREATE TABLE `roles_categories` (
  `category_id` int(11) NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `roles_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `roles_categories_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`),
  CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `author_id` text NOT NULL,
  `published` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 2013-02-19 19:00:47
