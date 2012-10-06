-- Adminer 3.5.1 MySQL dump

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
      `admin_rule` int(11) NOT NULL,
      `moderator_rule` int(11) NOT NULL,
      `user_rule` int(11) NOT NULL,
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


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` text NOT NULL,
      `email` text NOT NULL,
      `password` text NOT NULL,
      `picture` text NOT NULL,
      `signature` text NOT NULL,
      `user_role` int(11) NOT NULL,
      PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `replies`;
CREATE TABLE `replies` (
      `topic_id` int(11) NOT NULL,
      `user_id` int(11) NOT NULL,
      `reply_id` int(11) NOT NULL AUTO_INCREMENT,
      `content` text NOT NULL,
      PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2012-09-22 16:18:17
