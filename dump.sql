 
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
 
CREATE DATABASE `my_cms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `my_cms`;
 
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_connected` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
INSERT INTO `pages` (`id`, `title`, `content`, `hidden`) VALUES
(1, 'Home', '<h1>Ceci est ma maison !</h1>',    0);
 
