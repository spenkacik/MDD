# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: blog
# Generation Time: 2013-05-03 03:07:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `entry_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `author`, `content`, `entry_id`, `created_at`, `updated_at`)
VALUES
	(1,'Chris','Hello',0,1365982283,1367542215),
	(2,'Sam','World',0,1365982300,1367542215),
	(13,'Flarglegaben','Another comment for entry 4.',0,1366017916,1367547015),
	(15,'Freud','A comment for entry 4.',0,1366020670,1367547015),
	(16,'Sigmond','This is a post from sigmund.',0,1366020775,1367546701),
	(17,'Samagain','Another comment for this post.',0,1366749963,1367542215),
	(18,'Sam Penkacik','Sample comment. Sample comment. Sample Comment.',0,1366752301,1367547021),
	(19,'Sir Commentmaker','I make comments for fun!',0,1366756251,1367542215),
	(21,'Sam Penkacik','Sure! All you need to do is use a media query for the size that you want the button to change at.',6,1366802592,1366802592),
	(22,'Freud','This is a post from Freud.',0,1366802853,1367546701),
	(24,'Skeptical User','I\'m not sure it can be done. You should probably just give up.',6,1367550008,1367550008),
	(25,'Clueless User','I have no idea what is going on!?',6,1367550039,1367550039);

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table entries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `entries`;

CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `entries` WRITE;
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;

INSERT INTO `entries` (`id`, `title`, `content`, `created_at`, `updated_at`)
VALUES
	(6,'How do I make a button wide?','I need to make a button larger for a mobile site, but keep it normal size for the full site. Is there any way to do this using HTML/CSS?',1366801135,1366801135),
	(8,'console.log, console.error for PHP?','When developing web applications, at the clientside level I use console.log and console.error to help me see what\'s going on. I am looking for a similar feature at the serverside level to help me see what\'s going on. I have seen error_log which writes errors to the server\'s log file and wanted to know if there is a similar function for writing to the servers access logs?',1367549804,1367549804),
	(9,'Preflight of cross domain Ajax with custom header (using jquery) always getting cancelled','I am trying to make a cross domain POST with custom headers, but the preflight always getting cancelled (That\'s the word in Chrome\'s \"Inspect Element\" panel >> \"Network\" label), and I cannot tell whether it was cancelled by the browser or by jQuery. I don\'t think it\'s server-side issue, because there is nothing about the OPTIONS request method in server\'s log. I think the preflight request was never been made.\r\n\r\nSo, any idea?\r\n\r\nThanks in advance.',1367549873,1367549873),
	(10,'MVC 4 C# How to create a method that returns a list<object>','I am using EF and seeding our DB with some product data. The data with which I\'m seeding has a part which will be repeated about 100 times. Rather than copy and paste my code I would rather populate my list with a method but as I am a newbie, I cannot seem to make this work properly. The part I would like to return from a method would be something like: ProductOptions = getOptions() All that nested code can be repeated verbatim. I have tried working from some other examples but I keep on getting errors in Visual Studio. If I could get a very basic approach to this, that would be greatly appreciated.',1367549934,1367549934),
	(11,'jquery toggle is not executing in firefox','For some reason in firefox 20.0 on the starting point configurations expander, the toggle doesn\'t work.\r\nHow can I fix this?',1367549977,1367549977);

/*!40000 ALTER TABLE `entries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`type`, `name`, `migration`)
VALUES
	('app','default','001_create_entries'),
	('app','default','002_create_comments'),
	('app','default','003_create_users');

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`)
VALUES
	(1,'sam','password'),
	(4,'fbuser_1328460025',''),
	(5,'newuser','password');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
