# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: blog
# Generation Time: 2013-04-26 08:12:00 +0000
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
	(1,'Chris','Hello',1,1365982283,1365982283),
	(2,'Sam','World',1,1365982300,1365982300),
	(13,'Flarglegaben','Another comment for entry 4.',4,1366017916,1366017916),
	(15,'Freud','A comment for entry 4.',4,1366020670,1366020670),
	(16,'Sigmond','This is a post from sigmund.',2,1366020775,1366020775),
	(17,'Samagain','Another comment for this post.',1,1366749963,1366749963),
	(18,'Sam Penkacik','Sample comment. Sample comment. Sample Comment.',5,1366752301,1366752301),
	(19,'Sir Commentmaker','I make comments for fun!',1,1366756251,1366756251),
	(21,'Sam Penkacik','Sure! All you need to do is use a media query for the size that you want the button to change at.',6,1366802592,1366802592),
	(22,'Freud','This is a post from Freud.',2,1366802853,1366802853);

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
	(1,'Scholarship Application','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pharetra, lorem a pretium sollicitudin, lectus quam hendrerit tellus, ut consequat justo sapien at mi. Aliquam erat volutpat. Etiam mollis egestas neque, at dignissim diam hendrerit rutrum. Quisque gravida turpis sit amet dui congue in euismod nisl posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce a elit sit amet arcu porta blandit at a massa. Cras tortor risus, consequat eget scelerisque et, suscipit non odio. Integer faucibus dolor convallis erat auctor tristique. In venenatis sapien sed ligula semper eu congue tortor pellentesque. Sed ultrices tincidunt nibh sit amet convallis. Proin vitae quam sed eros accumsan commodo. Nam faucibus, metus non dignissim fermentum, enim odio fermentum arcu, id tempus magna orci ut lorem.',1365892199,1366763382),
	(2,'MDD Project 3','Quisque gravida turpis sit amet dui congue in euismod nisl posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce a elit sit amet arcu porta blandit at a massa. Cras tortor risus, consequat eget scelerisque et, suscipit non odio. Integer faucibus dolor convallis erat auctor tristique. In venenatis sapien sed ligula semper eu congue tortor pellentesque. Sed ultrices tincidunt nibh sit amet convallis. Proin vitae quam sed eros accumsan commodo. Nam faucibus, metus non dignissim fermentum, enim odio fermentum arcu, id tempus magna orci ut lorem.',1365892221,1365892231),
	(4,'3rd Entry','Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. Lorem ipsum sit amet. ',1366016570,1366752347),
	(5,'Sample Post 4','Yay! Now that you have a GrubHub account, your life will be problem-free forever* because the ordering is free and the good times never stop flowin\', just like the fondue fountain over at Golden Corral.',1366752272,1366752272),
	(6,'How do I make a button wide?','I need to make a button larger for a mobile site, but keep it normal size for the full site. Is there any way to do this using HTML/CSS?',1366801135,1366801135);

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
	('app','default','002_create_comments');

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(10) DEFAULT NULL,
  `oauth_uid` text,
  `username` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
