<?php 

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include(dirname(__FILE__) . '/lib/mysql.php');

echo "\nCreating users table... "; flush();

mysqli_query($users_db, "CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(20) NOT NULL,
  `type` tinyint(1) unsigned NULL,
  `name` varchar(100) NULL,
  `photo_url` varchar(200) NULL,
  `money` decimal(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;");

echo "done."; flush();
echo "\nCreating orders table... "; flush();

mysqli_query($orders_db, "CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `menu_id` int(5) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;");

echo "done."; flush();
echo "\nCreating menu table... "; flush();

mysqli_query($menu_db, "CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(9,2) unsigned NOT NULL DEFAULT '0.00',
  `picture` varchar(256) NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;");

echo "done.\n\n"; flush();

mysqli_close($users_db);
mysqli_close($orders_db);
mysqli_close($menu_db);
