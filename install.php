<?php 

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include(dirname(__FILE__) . '/lib/mysql.php');

echo "\nCreating users table... "; flush();

mysqli_query($users_db, 'CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(20) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo_url` varchar(200) NULL,
  `money` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;');

echo "done."; flush();
echo "\nCreating orders table... "; flush();

mysqli_query($orders_db, 'CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `creator` varchar(20) NOT NULL,
  `owner` varchar(20) NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `gross` decimal(9,2) unsigned NOT NULL DEFAULT '0.00',
  `fee` decimal(9,2) unsigned NOT NULL DEFAULT '0.00',
  `net` decimal(9,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;');

echo "done.\n\n"; flush();

mysqli_close($users_db);
mysqli_close($orders_db);