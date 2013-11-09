# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.32)
# Database: college_management
# Generation Time: 2013-11-09 07:46:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attendance
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_time_table_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance_detail` enum('P','A','L') DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attendance_student_idx` (`student_id`),
  KEY `fk_attendance_class_time_table_idx` (`class_time_table_id`),
  CONSTRAINT `fk_attendance_class_time_table` FOREIGN KEY (`class_time_table_id`) REFERENCES `class_time_table` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attendance_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;

INSERT INTO `attendance` (`id`, `class_time_table_id`, `student_id`, `date`, `attendance_detail`, `cdate`, `mdate`)
VALUES
	(5,2,3,'2013-10-03','P',NULL,NULL),
	(27,3,1,'2013-10-04','P','2013-10-03','2013-10-03'),
	(28,3,2,'2013-10-04','A','2013-10-03','2013-10-03'),
	(29,3,4,'2013-10-04','P','2013-10-03','2013-10-03'),
	(30,4,3,'2013-10-04','P','2013-10-05','2013-10-05'),
	(31,4,1,'2013-10-04','A','2013-10-05','2013-10-05'),
	(38,1,1,'2013-10-01','P','2013-10-05','2013-10-05'),
	(39,1,2,'2013-10-01','L','2013-10-05','2013-10-05'),
	(40,1,4,'2013-10-01','A','2013-10-05','2013-10-05'),
	(41,7,1,'2013-10-06','P','2013-10-05','2013-10-05'),
	(42,7,2,'2013-10-06','A','2013-10-05','2013-10-05'),
	(43,7,4,'2013-10-06','L','2013-10-05','2013-10-05'),
	(44,6,1,'2013-10-03','L','2013-10-05','2013-10-05'),
	(45,6,2,'2013-10-03','A','2013-10-05','2013-10-05'),
	(46,6,4,'2013-10-03','P','2013-10-05','2013-10-05');

/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table class_time_table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `class_time_table`;

CREATE TABLE `class_time_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_class_time_table_course_idx` (`course_id`),
  KEY `fk_class_time_table_intake_idx` (`intake_id`),
  KEY `fk_class_time_table_unit_idx` (`unit_id`),
  KEY `fk_class_time_table_staff_idx` (`trainer_id`),
  KEY `fk_class_time_table__idx` (`venue_id`),
  CONSTRAINT `fk_class_time_table_` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_time_table_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_time_table_intake` FOREIGN KEY (`intake_id`) REFERENCES `intake` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_time_table_staff` FOREIGN KEY (`trainer_id`) REFERENCES `staff` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_time_table_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `class_time_table` WRITE;
/*!40000 ALTER TABLE `class_time_table` DISABLE KEYS */;

INSERT INTO `class_time_table` (`id`, `course_id`, `intake_id`, `unit_id`, `trainer_id`, `venue_id`, `date`, `from_time`, `to_time`, `cdate`, `mdate`)
VALUES
	(1,1,1,4,2,1,'2013-10-01','10:00:00','12:00:00',NULL,NULL),
	(2,2,1,6,2,3,'2013-10-03','11:00:00','13:00:00','1970-01-01','2013-10-02'),
	(3,1,1,5,2,3,'2013-10-04','11:00:00','13:00:00','2013-10-03','2013-10-03'),
	(4,2,1,6,2,2,'2013-10-04','10:00:00','12:00:00','2013-10-05','2013-10-05'),
	(6,1,1,4,2,2,'2013-10-03','05:00:00','07:00:00','2013-10-05','2013-10-05'),
	(7,1,1,4,3,4,'2013-10-06','11:00:00','13:00:00','2013-10-05','2013-10-05'),
	(8,1,1,4,3,4,'2013-10-08','11:00:00','13:00:00','2013-10-06','2013-10-07'),
	(9,1,1,4,2,2,'2013-10-07','11:00:00','13:00:00','2013-10-07','2013-10-07'),
	(10,1,1,4,3,3,'2013-10-09','10:00:00','13:00:00','2013-10-07','2013-10-07'),
	(11,1,1,4,3,1,'2013-10-10','09:00:00','10:00:00','2013-10-07','2013-10-07'),
	(12,1,1,4,3,4,'2013-10-11','13:00:00','14:30:00','2013-10-07','2013-10-07');

/*!40000 ALTER TABLE `class_time_table` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;

INSERT INTO `country` (`id`, `name`, `code`)
VALUES
	(1,'Afghanistan','AF'),
	(2,'Albania','AL'),
	(3,'Algeria','DZ'),
	(4,'American Samoa','AS'),
	(5,'Andorra','AD'),
	(6,'Angola','AG'),
	(7,'Anguilla','AI'),
	(8,'Argentina','AR'),
	(9,'Armenia','AA'),
	(10,'Aruba','AW'),
	(11,'Australia','AU'),
	(12,'Austria','AT'),
	(13,'Azerbaijan','AZ'),
	(14,'Azores','AP'),
	(15,'Bahamas','BS'),
	(16,'Bahrain','BH'),
	(17,'Bangladesh','BD'),
	(18,'Barbados','BB'),
	(19,'Belarus','BY'),
	(20,'Belgium','BE'),
	(21,'Belize','BZ'),
	(22,'Benin','BJ'),
	(23,'Bermuda','BM'),
	(24,'Bhutan','BT'),
	(25,'Bolivia','BO'),
	(26,'Bonaire','BL'),
	(27,'Bosnia & Herzegovina','BA'),
	(28,'Botswana','BW'),
	(29,'Brazil','BR'),
	(30,'British Indian Ocean Ter','BC'),
	(31,'Brunei','BN'),
	(32,'Bulgaria','BG'),
	(33,'Burkina Faso','BF'),
	(34,'Burundi','BI'),
	(35,'Cambodia','KH'),
	(36,'Cameroon','CM'),
	(37,'Canada','CA'),
	(38,'Canary Islands','IC'),
	(39,'Cape Verde','CV'),
	(40,'Cayman Islands','KY'),
	(41,'Central African Republic','CF'),
	(42,'Chad','TD'),
	(43,'Channel Islands','CD'),
	(44,'Chile','CL'),
	(45,'China','CN'),
	(46,'Christmas Island','CI'),
	(47,'Cocos Island','CS'),
	(48,'Columbia','CO'),
	(49,'Comoros','CC'),
	(50,'Congo','CG'),
	(51,'Cook Islands','CK'),
	(52,'Costa Rica','CR'),
	(53,'Cote D\'Ivoire','CT'),
	(54,'Croatia','HR'),
	(55,'Cuba','CU'),
	(56,'Curacao','CB'),
	(57,'Cyprus','CY'),
	(58,'Czech Republic','CZ'),
	(59,'Denmark','DK'),
	(60,'Djibouti','DJ'),
	(61,'Dominica','DM'),
	(62,'Dominican Republic','DO'),
	(63,'East Timor','TM'),
	(64,'Ecuador','EC'),
	(65,'Egypt','EG'),
	(66,'El Salvador','SV'),
	(67,'Equatorial Guinea','GQ'),
	(68,'Eritrea','ER'),
	(69,'Estonia','EE'),
	(70,'Ethiopia','ET'),
	(71,'Falkland Islands','FA'),
	(72,'Faroe Islands','FO'),
	(73,'Fiji','FJ'),
	(74,'Finland','FI'),
	(75,'France','FR'),
	(76,'French Guiana','GF'),
	(77,'French Polynesia','PF'),
	(78,'French Southern Ter','FS'),
	(79,'Gabon','GA'),
	(80,'Gambia','GM'),
	(81,'Georgia','GE'),
	(82,'Germany','DE'),
	(83,'Ghana','GH'),
	(84,'Gibraltar','GI'),
	(85,'United Kingdom','UK'),
	(86,'Greece','GR'),
	(87,'Greenland','GL'),
	(88,'Grenada','GD'),
	(89,'Guadeloupe','GP'),
	(90,'Guam','GU'),
	(91,'Guatemala','GT'),
	(92,'Guinea','GN'),
	(93,'Guyana','GY'),
	(94,'Haiti','HT'),
	(95,'Hawaii','HW'),
	(96,'Honduras','HN'),
	(97,'Hong Kong','HK'),
	(98,'Hungary','HU'),
	(99,'Iceland','IS'),
	(100,'India','IN'),
	(101,'Indonesia','ID'),
	(102,'Iran','IA'),
	(103,'Iraq','IQ'),
	(104,'Ireland','IR'),
	(105,'Isle of Man','IM'),
	(106,'Israel','IL'),
	(107,'Italy','IT'),
	(108,'Jamaica','JM'),
	(109,'Japan','JP'),
	(110,'Jordan','JO'),
	(111,'Kazakhstan','KZ'),
	(112,'Kenya','KE'),
	(113,'Kiribati','KI'),
	(114,'Korea North','NK'),
	(115,'Korea South','KS'),
	(116,'Kuwait','KW'),
	(117,'Kyrgyzstan','KG'),
	(118,'Laos','LA'),
	(119,'Latvia','LV'),
	(120,'Lebanon','LB'),
	(121,'Lesotho','LS'),
	(122,'Liberia','LR'),
	(123,'Libya','LY'),
	(124,'Liechtenstein','LI'),
	(125,'Lithuania','LT'),
	(126,'Luxembourg','LU'),
	(127,'Macau','MO'),
	(128,'Macedonia','MK'),
	(129,'Madagascar','MG'),
	(130,'Malaysia','MY'),
	(131,'Malawi','MW'),
	(132,'Maldives','MV'),
	(133,'Mali','ML'),
	(134,'Malta','MT'),
	(135,'Marshall Islands','MH'),
	(136,'Martinique','MQ'),
	(137,'Mauritania','MR'),
	(138,'Mauritius','MU'),
	(139,'Mayotte','ME'),
	(140,'Mexico','MX'),
	(141,'Midway Islands','MI'),
	(142,'Moldova','MD'),
	(143,'Monaco','MC'),
	(144,'Mongolia','MN'),
	(145,'Montserrat','MS'),
	(146,'Morocco','MA'),
	(147,'Mozambique','MZ'),
	(148,'Myanmar','MM'),
	(149,'Nambia','NA'),
	(150,'Nauru','NU'),
	(151,'Nepal','NP'),
	(152,'Netherland Antilles','AN'),
	(153,'Netherlands','NL'),
	(154,'Nevis','NV'),
	(155,'New Caledonia','NC'),
	(156,'New Zealand','NZ'),
	(157,'Nicaragua','NI'),
	(158,'Niger','NE'),
	(159,'Nigeria','NG'),
	(160,'Niue','NW'),
	(161,'Norfolk Island','NF'),
	(162,'Norway','NO'),
	(163,'Oman','OM'),
	(164,'Pakistan','PK'),
	(165,'Palau Island','PW'),
	(166,'Palestine','PS'),
	(167,'Panama','PA'),
	(168,'Papua New Guinea','PG'),
	(169,'Paraguay','PY'),
	(170,'Peru','PE'),
	(171,'Philippines','PH'),
	(172,'Pitcairn Island','PO'),
	(173,'Poland','PL'),
	(174,'Portugal','PT'),
	(175,'Puerto Rico','PR'),
	(176,'Qatar','QA'),
	(177,'Reunion','RE'),
	(178,'Romania','RO'),
	(179,'Russia','RU'),
	(180,'Rwanda','RW'),
	(181,'St Barthelemy','NT'),
	(182,'St Eustatius','EU'),
	(183,'St Helena','HE'),
	(184,'St Kitts-Nevis','KN'),
	(185,'St Lucia','LC'),
	(186,'St Maarten','MB'),
	(187,'St Pierre & Miquelon','PM'),
	(188,'St Vincent & Grenadines','VC'),
	(189,'Saipan','SP'),
	(190,'Samoa','SO'),
	(191,'San Marino','SM'),
	(192,'Sao Tome & Principe','ST'),
	(193,'Saudi Arabia','SA'),
	(194,'Senegal','SN'),
	(195,'Seychelles','SC'),
	(196,'Serbia & Montenegro','SS'),
	(197,'Sierra Leone','SL'),
	(198,'Singapore','SG'),
	(199,'Slovakia','SK'),
	(200,'Slovenia','SI'),
	(201,'Solomon Islands','SB'),
	(202,'Somalia','OI'),
	(203,'South Africa','ZA'),
	(204,'Spain','ES'),
	(205,'Sri Lanka','LK'),
	(206,'Sudan','SD'),
	(207,'Suriname','SR'),
	(208,'Swaziland','SZ'),
	(209,'Sweden','SE'),
	(210,'Switzerland','CH'),
	(211,'Syria','SY'),
	(212,'Tahiti','TA'),
	(213,'Taiwan','TW'),
	(214,'Tajikistan','TJ'),
	(215,'Tanzania','TZ'),
	(216,'Thailand','TH'),
	(217,'Togo','TG'),
	(218,'Tokelau','TK'),
	(219,'Tonga','TO'),
	(220,'Trinidad & Tobago','TT'),
	(221,'Tunisia','TN'),
	(222,'Turkey','TR'),
	(223,'Turkmenistan','TU'),
	(224,'Turks & Caicos Is','TC'),
	(225,'Tuvalu','TV'),
	(226,'Uganda','UG'),
	(227,'Ukraine','UA'),
	(228,'United Arab Emirates','AE'),
	(229,'USA','US'),
	(230,'Uruguay','UY'),
	(231,'Uzbekistan','UZ'),
	(232,'Vanuatu','VU'),
	(233,'Vatican City State','VS'),
	(234,'Venezuela','VE'),
	(235,'Vietnam','VN'),
	(236,'Virgin Islands (Brit)','VB'),
	(237,'Virgin Islands (USA)','VA'),
	(238,'Wake Island','WK'),
	(239,'Wallis & Futana Is','WF'),
	(240,'Yemen','YE'),
	(241,'Zaire','ZR'),
	(242,'Zambia','ZM'),
	(243,'Zimbabwe','ZW');

/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `duration_type` varchar(20) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `course_level_id` int(11) DEFAULT NULL,
  `course_field_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_course_level1_idx` (`course_level_id`),
  KEY `fk_course_course_field1_idx` (`course_field_id`),
  CONSTRAINT `fk_course_course_field1` FOREIGN KEY (`course_field_id`) REFERENCES `course_field` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_course_level1` FOREIGN KEY (`course_level_id`) REFERENCES `course_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;

INSERT INTO `course` (`id`, `name`, `code`, `duration`, `duration_type`, `cdate`, `mdate`, `is_active`, `course_level_id`, `course_field_id`)
VALUES
	(1,'M Tech','M101',2,'Year','1970-01-01','2013-09-23',1,1,NULL),
	(2,'MCA','C102',3,'Year','2013-10-02','2013-10-02',1,1,NULL),
	(3,'Btech','b103',4,'Year','2013-10-03','2013-10-03',1,1,NULL);

/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course_field
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course_field`;

CREATE TABLE `course_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table course_intake
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course_intake`;

CREATE TABLE `course_intake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_intake_course1_idx` (`course_id`),
  KEY `fk_course_intake_intake1_idx` (`intake_id`),
  CONSTRAINT `fk_course_intake_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_intake_intake1` FOREIGN KEY (`intake_id`) REFERENCES `intake` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `course_intake` WRITE;
/*!40000 ALTER TABLE `course_intake` DISABLE KEYS */;

INSERT INTO `course_intake` (`id`, `cdate`, `mdate`, `course_id`, `intake_id`)
VALUES
	(3,'2013-10-02','2013-10-02',1,1),
	(4,'2013-10-02','2013-10-02',2,1);

/*!40000 ALTER TABLE `course_intake` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course_level`;

CREATE TABLE `course_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `course_level` WRITE;
/*!40000 ALTER TABLE `course_level` DISABLE KEYS */;

INSERT INTO `course_level` (`id`, `name`, `cdate`, `mdate`)
VALUES
	(1,'Graduation',NULL,NULL);

/*!40000 ALTER TABLE `course_level` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table intake
# ------------------------------------------------------------

DROP TABLE IF EXISTS `intake`;

CREATE TABLE `intake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `intake` WRITE;
/*!40000 ALTER TABLE `intake` DISABLE KEYS */;

INSERT INTO `intake` (`id`, `name`, `code`, `start_date`, `end_date`, `cdate`, `mdate`)
VALUES
	(1,'sem1 2013','2013','2013-09-01','2014-02-28','2013-09-26','2013-10-02');

/*!40000 ALTER TABLE `intake` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table result
# ------------------------------------------------------------

DROP TABLE IF EXISTS `result`;

CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL,
  `internal_marks` int(11) DEFAULT NULL,
  `external_marks` int(11) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_result_student_id_idx` (`student_id`),
  KEY `fk_result_unit_id_idx` (`unit_id`),
  KEY `fk_result_intake_id_idx` (`intake_id`),
  KEY `fk_result_course_id` (`course_id`),
  CONSTRAINT `fk_result_intake_id` FOREIGN KEY (`intake_id`) REFERENCES `intake` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_result_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_result_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;

INSERT INTO `result` (`id`, `student_id`, `course_id`, `unit_id`, `intake_id`, `internal_marks`, `external_marks`, `cdate`, `mdate`)
VALUES
	(1,1,1,4,1,45,40,NULL,NULL),
	(2,3,2,6,1,37,45,NULL,NULL),
	(4,1,1,3,1,33,44,NULL,NULL),
	(5,2,1,4,1,40,20,NULL,NULL),
	(6,2,1,3,1,2,35,NULL,NULL),
	(7,4,1,4,1,45,66,NULL,NULL),
	(8,1,1,5,1,30,60,NULL,NULL),
	(9,2,1,5,1,25,55,NULL,NULL);

/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `photo` tinytext,
  `photo_path` tinytext,
  `is_active` tinyint(1) DEFAULT '1',
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `join_date` date DEFAULT NULL,
  `sex` enum('M','F') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_staff_staff_type_idx` (`type`),
  KEY `fk_staff_country1_idx` (`country_id`),
  CONSTRAINT `fk_staff_country1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_staff_staff_type` FOREIGN KEY (`type`) REFERENCES `staff_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `zip_code`, `phone`, `fax`, `photo`, `photo_path`, `is_active`, `cdate`, `mdate`, `type`, `country_id`, `join_date`, `sex`)
VALUES
	(2,'test','Last','trainer@test.com','','','state','323212','22323','3432d','Screen Shot 2013-09-24 at 4.09.57 PM.png','/uploads/staff/Screen Shot 2013-09-24 at 4.09.57 PM.png',1,'2013-09-25','2013-10-06',1,1,'2013-09-11','M'),
	(3,'trainer2','trainer2','trainer2@test.com','test address','Amritsar','Punjab','140001','32323232321','2232323233','3tractor.png','/uploads/staff/ranbir-kapoor-in-formal-dress.jpg',1,'2013-09-26','2013-10-06',1,100,'2010-03-03',NULL),
	(4,'staff','staf','staff@test.com','','','','','','','4BVD_Swedish_Design_Award_3.jpg',NULL,1,'2013-10-05','2013-10-06',2,100,'0001-11-30','M');

/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table staff_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `staff_type`;

CREATE TABLE `staff_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `staff_type` WRITE;
/*!40000 ALTER TABLE `staff_type` DISABLE KEYS */;

INSERT INTO `staff_type` (`id`, `title`)
VALUES
	(1,'Trainer'),
	(2,'Official');

/*!40000 ALTER TABLE `staff_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table staff_unit_mapping
# ------------------------------------------------------------

DROP TABLE IF EXISTS `staff_unit_mapping`;

CREATE TABLE `staff_unit_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_staff_unit_mapping_unit1_idx` (`unit_id`),
  KEY `fk_staff_unit_mapping_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_staff_unit_mapping_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_staff_unit_mapping_unit1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `staff_unit_mapping` WRITE;
/*!40000 ALTER TABLE `staff_unit_mapping` DISABLE KEYS */;

INSERT INTO `staff_unit_mapping` (`id`, `unit_id`, `staff_id`, `cdate`, `mdate`)
VALUES
	(2,4,2,'2013-09-26','2013-09-26'),
	(3,4,3,'2013-09-26','2013-09-26'),
	(4,5,2,'2013-09-26','2013-09-26'),
	(5,6,2,'2013-10-02','2013-10-02');

/*!40000 ALTER TABLE `staff_unit_mapping` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `sex` enum('M','F') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` tinytext,
  `photo_path` tinytext,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_country1_idx` (`country_id`),
  CONSTRAINT `fk_student_country1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;

INSERT INTO `student` (`id`, `first_name`, `last_name`, `email`, `address1`, `address2`, `city`, `state`, `phone`, `fax`, `zip`, `sex`, `dob`, `photo`, `photo_path`, `cdate`, `mdate`, `is_active`, `country_id`)
VALUES
	(1,'Student','Student L','student@test.com','Address1','','Amritsar','Punjab','9876987569','9887877799','10001','F','1990-06-12','1pic6.jpg','/uploads/student/pic6.jpg','2013-09-29','2013-10-06',1,100),
	(2,'Student2','Student L','student2@test.com','Address1','','Amritsar','Punjab','23322323','232323223','333322','F','1993-06-15','pic2.jpg','/uploads/student/pic2.jpg','2013-09-29','2013-09-29',1,100),
	(3,'Student2','Student L','student3@test.com','Address1','','Amritsar','Punjab','23322323','232323223','333322','F','1993-06-15','pic4.jpg','/uploads/student/pic4.jpg','2013-09-29','2013-10-02',1,100),
	(4,'Student4','','student4@test.com','Address1 esfsff3','','Amritsar','Punjab','2323233232','','','M','0000-00-00','4pic6.jpg','/uploads/student/pic7.jpg','2013-09-29','2013-10-07',1,100),
	(5,'stu','last','stu@test.com','test','','test','test','45454545','','','F','0000-00-00','5lion.jpg',NULL,'2013-10-05','2013-10-06',1,100);

/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_course`;

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL,
  `course_fee` float DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_course_course1_idx` (`course_id`),
  KEY `fk_student_course_student1_idx` (`student_id`),
  KEY `fk_student_course_intake1_idx` (`intake_id`),
  CONSTRAINT `fk_student_course_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_course_intake1` FOREIGN KEY (`intake_id`) REFERENCES `intake` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_course_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `student_course` WRITE;
/*!40000 ALTER TABLE `student_course` DISABLE KEYS */;

INSERT INTO `student_course` (`id`, `course_id`, `student_id`, `intake_id`, `course_fee`, `cdate`, `mdate`)
VALUES
	(6,1,2,1,3000,'2013-09-29','2013-09-29'),
	(8,1,4,1,40000,'2013-09-29','2013-09-29'),
	(9,1,4,1,50000,'2013-09-29','2013-09-29'),
	(10,1,1,1,40000,'2013-09-29','2013-09-29'),
	(11,2,3,1,30000,'2013-10-02','2013-10-02'),
	(12,2,1,1,600000,'2013-10-03','2013-10-03'),
	(13,2,5,1,50000,'2013-10-05','2013-10-05');

/*!40000 ALTER TABLE `student_course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_course_fee_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_course_fee_map`;

CREATE TABLE `student_course_fee_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_course_id` int(11) DEFAULT NULL,
  `paid_fee` float DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_course_fee_map_student_course1_idx` (`student_course_id`),
  KEY `fk_student_course_fee_map_user1_idx` (`user_id`),
  CONSTRAINT `fk_student_course_fee_map_student_course1` FOREIGN KEY (`student_course_id`) REFERENCES `student_course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_course_fee_map_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `student_course_fee_map` WRITE;
/*!40000 ALTER TABLE `student_course_fee_map` DISABLE KEYS */;

INSERT INTO `student_course_fee_map` (`id`, `student_course_id`, `paid_fee`, `cdate`, `mdate`, `user_id`)
VALUES
	(1,8,2000,NULL,NULL,1),
	(2,8,3000,'2013-09-29','2013-09-29',1),
	(3,9,6000,'2013-09-29','2013-09-29',1),
	(4,8,1500,'2013-09-29','2013-09-29',1),
	(5,8,1200,'2013-09-29','2013-09-29',1),
	(6,8,2000,'2013-09-29','2013-09-29',1),
	(7,9,0,'2013-09-29','2013-09-29',1),
	(8,10,10000,'2013-09-29','2013-09-29',1),
	(9,8,3000,'2013-09-30','2013-09-30',1),
	(10,9,3500,'2013-09-30','2013-09-30',1),
	(11,10,20000,'2013-10-03','2013-10-03',1),
	(12,8,3000,'2013-10-05','2013-10-05',1),
	(13,9,1500,'2013-10-05','2013-10-05',1),
	(14,11,2000,'2013-10-05','2013-10-05',1),
	(16,10,500,'2013-10-05','2013-10-05',8),
	(17,12,500,'2013-10-05','2013-10-05',8);

/*!40000 ALTER TABLE `student_course_fee_map` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table unit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_unit_course1_idx` (`course_id`),
  CONSTRAINT `fk_unit_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;

INSERT INTO `unit` (`id`, `name`, `code`, `course_id`, `cdate`, `mdate`, `is_active`)
VALUES
	(3,'Subject 1','S101',1,NULL,NULL,1),
	(4,'DBMS','S101',1,'2013-09-26','2013-09-26',1),
	(5,'NetWorking','S102',1,'2013-09-26','2013-09-26',1),
	(6,'OS','S104',2,'2013-10-02','2013-10-02',1);

/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `type`, `user_id`)
VALUES
	(1,'admin','admin','admin@test.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',1,NULL),
	(2,'test','Last','trainer1@test.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',2,2),
	(3,'trainer2','trainer2','trainer@test.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',2,3),
	(4,'Student','Student L','student@test.com','8cb2237d0679ca88db6464eac60da96345513964',4,1),
	(5,'Student2','Student L','Student2@test.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',4,2),
	(6,'Student2','Student L','Student3@test.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',4,3),
	(7,'Student4','','student4@test.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',4,4),
	(8,'staff','staf','staff@test.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',3,4),
	(9,'stu','last','stu@test.com','768688326452736e111c5f9a17a7f6adbe39c73a',4,5);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venue
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venue`;

CREATE TABLE `venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cdate` date DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;

INSERT INTO `venue` (`id`, `name`, `cdate`, `mdate`, `is_active`)
VALUES
	(1,'Room 101',NULL,NULL,1),
	(2,'Room 102',NULL,NULL,1),
	(3,'Room 103',NULL,NULL,1),
	(4,'Room 104',NULL,NULL,1);

/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
