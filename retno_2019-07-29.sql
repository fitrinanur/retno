# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: retno
# Generation Time: 2019-07-29 05:35:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table abilities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `abilities`;

CREATE TABLE `abilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abilities_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `abilities` WRITE;
/*!40000 ALTER TABLE `abilities` DISABLE KEYS */;

INSERT INTO `abilities` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'view-users','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(2,'create-users','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(3,'update-users','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(4,'delete-users','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(5,'view-role','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(6,'update-role','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(7,'view-report','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(8,'update-report','2019-07-21 14:27:22','2019-07-21 14:27:22');

/*!40000 ALTER TABLE `abilities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ability_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ability_role`;

CREATE TABLE `ability_role` (
  `ability_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `ability_role_ability_id_foreign` (`ability_id`),
  KEY `ability_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ability_role` WRITE;
/*!40000 ALTER TABLE `ability_role` DISABLE KEYS */;

INSERT INTO `ability_role` (`ability_id`, `role_id`)
VALUES
	(1,3),
	(2,3),
	(3,3),
	(4,3),
	(5,3),
	(6,3),
	(7,3),
	(8,3),
	(7,1),
	(8,1);

/*!40000 ALTER TABLE `ability_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table frequent
# ------------------------------------------------------------

DROP TABLE IF EXISTS `frequent`;

CREATE TABLE `frequent` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_treatment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freq` int(11) NOT NULL,
  `support` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `frequent` WRITE;
/*!40000 ALTER TABLE `frequent` DISABLE KEYS */;

INSERT INTO `frequent` (`id`, `code_treatment`, `treatment_name`, `freq`, `support`, `created_at`, `updated_at`)
VALUES
	(1,'F1','Herbal Facial Lift',10,1.1111111111111112,NULL,NULL),
	(2,'F1','Herbal Facial Liur walet',2,0.2222222222222222,NULL,NULL),
	(3,'F3','Herbal Facial Liur walet',1,0.1111111111111111,NULL,NULL),
	(4,'H1','Hair Spa',1,0.1111111111111111,NULL,NULL),
	(5,'H13','Catok',5,0.5555555555555556,NULL,NULL),
	(6,'H2','Creambath',1,0.1111111111111111,NULL,NULL),
	(7,'S2','Pedicure',1,0.1111111111111111,NULL,NULL),
	(8,'S3','Waxing',1,0.1111111111111111,NULL,NULL),
	(9,'S4','Gurah Ratus',2,0.2222222222222222,NULL,NULL),
	(10,'S5','Ear Candle Theraphy',1,0.1111111111111111,NULL,NULL);

/*!40000 ALTER TABLE `frequent` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;

INSERT INTO `members` (`id`, `name`, `no_member`, `birthday`, `phone_number`, `email`, `address`, `created_at`, `updated_at`)
VALUES
	(1,'Amirasyahdad','M180720191','1995-09-10','085678123198','amira23@gmail.com','Blotan rt 02/18 Baki Siwal Sukoharjo','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(2,'Rahma Ainur Rofiq','M180720192','1986-03-13','085742088411','rahma_ar@gmail.com','Surakarta','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(3,'Frida Megawati','M180720193','1997-01-20','085734088911','fridamega@gmail.com','Karanganyar','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(4,'Retno Tri Asih','M180720194','1997-03-11','085642789189','asih1103@gmail.com','Surakarta','2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(5,'fitrina nur','M201907226CF1C','','81548494999','vitaqueenstar@gmail.com','Jl. Kyai Sahid Gang Mahoni Griya Permata Asri SIngopuran Kartasura','2019-07-22 08:12:07','2019-07-22 08:12:07'),
	(6,'fitrina nur','M201907226E425','','81548494999','vitaqueenstar@gmail.com','Jl. Kyai Sahid Gang Mahoni Griya Permata Asri SIngopuran Kartasura','2019-07-22 08:12:07','2019-07-22 08:12:07');

/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_07_10_074353_create_roles_table',1),
	(4,'2019_07_10_074419_create_abilities_table',1),
	(5,'2019_07_10_074501_create_ability_role_table',1),
	(6,'2019_07_18_141104_create_members_table',1),
	(7,'2019_07_19_041125_create_transactions_table',1),
	(8,'2019_07_19_041803_create_treatments_table',1),
	(9,'2019_07_21_080115_create_rule_table',1),
	(10,'2019_07_21_080127_create_setting_table',1),
	(11,'2019_07_21_080142_create_frequent_table',1),
	(12,'2019_07_23_081030_create_umums_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'Owner',NULL,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(2,'Front Office',NULL,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(3,'Admin',NULL,'2019-07-21 14:27:22','2019-07-21 14:27:22');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rule`;

CREATE TABLE `rule` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `antecedent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `consequent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `support` double NOT NULL,
  `confidence` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `rule` WRITE;
/*!40000 ALTER TABLE `rule` DISABLE KEYS */;

INSERT INTO `rule` (`id`, `antecedent`, `consequent`, `support`, `confidence`, `created_at`, `updated_at`)
VALUES
	(1,'H1-Hair Spa','H2-Creambath',0.1111111111111111,1,NULL,NULL),
	(2,'H2-Creambath','H1-Hair Spa',0.1111111111111111,1,NULL,NULL),
	(3,'S4-Gurah Ratus','S5-Ear Candle Theraphy',0.1111111111111111,1,NULL,NULL),
	(4,'S5-Ear Candle Theraphy','S4-Gurah Ratus',0.1111111111111111,1,NULL,NULL),
	(5,'S2-Pedicure','S3-Waxing',0.1111111111111111,1,NULL,NULL),
	(6,'S3-Waxing','S2-Pedicure',0.1111111111111111,1,NULL,NULL);

/*!40000 ALTER TABLE `rule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table setting
# ------------------------------------------------------------

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;

INSERT INTO `setting` (`id`, `key`, `value`, `created_at`, `updated_at`)
VALUES
	(1,'min_conf','0',NULL,'2019-07-25 13:52:43'),
	(2,'min_sup','0',NULL,'2019-07-25 13:52:43');

/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment_id` int(10) unsigned NOT NULL,
  `code_treatment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;

INSERT INTO `transactions` (`id`, `transaction_code`, `member_id`, `member_name`, `treatment_id`, `code_treatment`, `treatment_name`, `catatan`, `extra`, `total`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,'TRS1D65C',1,'Retno',1,'F1','Herbal Facial Lift','test',0,75000,3,'2019-07-19 14:28:41','2019-07-19 14:28:41'),
	(2,'TRS4C6BB',2,'Asih',1,'F1','Herbal Facial Lift','Aisyah',10000,85000,3,'2019-07-19 14:34:53','2019-07-19 14:34:53'),
	(3,'TRS09C94',0,'Umum',13,'H13','Catok','umum test',10000,185000,3,'2019-07-19 14:48:33','2019-07-19 14:48:33'),
	(4,'TRS09C94',0,'Umum',13,'H13','Catok','umum test',10000,185000,3,'2019-07-19 14:48:33','2019-07-19 14:48:33'),
	(5,'TRS1D65C',1,'Retno',1,'F1','Herbal Facial Lift','test',0,75000,3,'2019-07-19 14:28:41','2019-07-19 14:28:41'),
	(6,'TRS4C6BB',2,'Asih',1,'F1','Herbal Facial Lift','Aisyah',10000,85000,3,'2019-07-19 14:34:53','2019-07-19 14:34:53'),
	(7,'TRS09C94',0,'Umum',13,'H13','Catok','umum test',10000,185000,3,'2019-07-19 14:48:33','2019-07-19 14:48:33'),
	(8,'TRS1D65C',1,'Retno',1,'F1','Herbal Facial Lift','test',0,75000,3,'2019-07-19 14:28:41','2019-07-19 14:28:41'),
	(9,'TRS4C6BB',2,'Asih',1,'F1','Herbal Facial Lift','Aisyah',10000,85000,3,'2019-07-19 14:34:53','2019-07-19 14:34:53'),
	(10,'TRS09C94',0,'Umum',13,'H13','Catok','umum test',10000,185000,3,'2019-07-19 14:48:33','2019-07-19 14:48:33'),
	(11,'TRS1D65C',1,'Retno',1,'F1','Herbal Facial Lift','test',0,75000,3,'2019-07-19 14:28:41','2019-07-19 14:28:41'),
	(12,'TRS4C6BB',2,'Asih',1,'F1','Herbal Facial Lift','Aisyah',10000,85000,3,'2019-07-19 14:34:53','2019-07-19 14:34:53'),
	(14,'TRS09C94',0,'Umum',13,'H13','Catok','umum test',10000,185000,3,'2019-07-19 14:48:33','2019-07-19 14:48:33'),
	(15,'TRS1D65C',1,'Retno',1,'F1','Herbal Facial Lift','test',0,75000,3,'2019-07-19 14:28:41','2019-07-19 14:28:41'),
	(16,'TRS4C6BB',2,'Asih',1,'F1','Herbal Facial Lift','Aisyah',10000,85000,3,'2019-07-19 14:34:53','2019-07-19 14:34:53'),
	(17,'TRS11111',1,'Retno',1,'H1','Hair Spa','admin',10000,85000,3,'2019-07-21 22:19:39','2019-07-21 22:19:39'),
	(18,'TRS11111',1,'Retno',1,'H2','Creambath','Aisya',0,90000,3,'2019-07-21 22:20:46','2019-07-21 22:20:46'),
	(19,'TRSF23C3',3,'Frida Megawati',1,'F1','Herbal Facial Liur walet','b',10000,210000,3,'2019-07-22 08:00:28','2019-07-22 08:00:28'),
	(20,'TRS4528A',1,'Frida Megawati',1,'F1','Herbal Facial Liur walet','10000',10000,885000,3,'2019-07-22 08:01:09','2019-07-22 08:01:09'),
	(21,'TRS842B6',4,'Retno Tri Asih',3,'F3','Herbal Facial Liur walet','test',10000,210000,3,'2019-07-22 08:02:26','2019-07-22 08:02:26'),
	(22,'TRSE96A2',3,'Frida Megawati',20,'S2','Pedicure','1',10000,155000,3,'2019-07-22 08:04:43','2019-07-22 08:04:43'),
	(23,'TRSE96A2',3,'Frida Megawati',21,'S3','Waxing','1',10000,155000,3,'2019-07-22 08:04:43','2019-07-22 08:04:43'),
	(24,'TRS9368E',0,'UMUM',22,'S4','Gurah Ratus','Biaya Admin',10000,80000,3,'2019-07-22 08:11:32','2019-07-22 08:11:32'),
	(25,'TRS9368E',0,'UMUM',22,'S4','Gurah Ratus','Biaya Admin',10000,80000,3,'2019-07-22 08:12:07','2019-07-22 08:12:07'),
	(26,'TRS9368E',0,'UMUM',23,'S5','Ear Candle Theraphy','Biaya Admin',10000,80000,3,'2019-07-22 08:12:07','2019-07-22 08:12:07');

/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table treatments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `treatments`;

CREATE TABLE `treatments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_treatment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `treatments` WRITE;
/*!40000 ALTER TABLE `treatments` DISABLE KEYS */;

INSERT INTO `treatments` (`id`, `code_treatment`, `name`, `category`, `price`, `created_at`, `updated_at`)
VALUES
	(1,'F1','Herbal Facial Liur walet','Face',75000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(2,'F2','Acne Facial Liur walet','Face',75000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(3,'F3','Herbal Facial Liur walet','Face',75000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(4,'F4','Herbal Facelift Liur walet','Face',125000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(5,'F5','Herbal Facelift With Masker Gold 24K','Face',175000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(6,'F6','Herbal Facelift Lengkap','Face',250000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(7,'F7','Natural Soft Peeling (By Dokter)','Face',400000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(8,'F8','Vampire Facial','Face',400000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(9,'B1','Body Massage Aroma Theraphy','Body',100000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(10,'B2','Body Whitening','Body',300000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(11,'B3','Walet Body Scrub & Body Mask','Body',150000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(12,'B4','Aromatic Body Slimming','Body',200000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(13,'B5','Traditional Hot Stone Massage','Body',250000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(14,'H1','Cuci Blow Biasa','Hair',25000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(15,'H2','Cuci Blow Variasi','Hair',35000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(16,'H3','Creambath','Hair',35000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(17,'H4','Hair Spa','Hair',50000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(18,'H5','Masker Rambut','Hair',60000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(19,'S1','Menicure','Special',35000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(20,'S2','Pedicure','Special',45000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(21,'S3','Waxing','Special',100000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(22,'S4','Gurah Ratus','Special',35000,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(23,'S5','Ear Candle Theraphy','Special',35000,'2019-07-21 14:27:22','2019-07-21 14:27:22');

/*!40000 ALTER TABLE `treatments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table umums
# ------------------------------------------------------------

DROP TABLE IF EXISTS `umums`;

CREATE TABLE `umums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role_id`, `avatar`, `deleted_at`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Owner','Direktur','owner@example.com','$2y$10$0hfBaiMkcfCeOX8SJeroOOA9stZQvwVEiNtK939FiOnc8IukTTmjG',1,NULL,NULL,NULL,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(2,'Front Office','Front office','Frontoffice@example.com','$2y$10$oguJwhkcwtNRyFu1mtkiu.QKMPokLN2jWOaHCFDGw0T.yJuWwMUXm',2,NULL,NULL,NULL,'2019-07-21 14:27:22','2019-07-21 14:27:22'),
	(3,'Admin','Admin','Admin@example.com','$2y$10$rZlQ.lJfQd2tgZVU.hixROHg4ti0x4Q/fGTuYvqTJmnVPqvUw6dzq',3,NULL,NULL,NULL,'2019-07-21 14:27:22','2019-07-21 14:27:22');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
