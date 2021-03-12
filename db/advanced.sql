-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: advanced
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB-1:10.3.13+maria~bionic-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','14',NULL),('create-branch','13',NULL);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin',1,'admin can create both branch and company',NULL,NULL,NULL,NULL),('create-branch',1,'allow a user to create a branch',NULL,NULL,NULL,NULL),('create-company',1,'allow a user to create a company',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('admin','create-branch'),('admin','create-company');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_company_id` int(11) NOT NULL,
  `branch_name` varchar(45) NOT NULL,
  `branch_address` varchar(128) NOT NULL,
  `branch_create_date` datetime NOT NULL,
  `branch_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`branch_id`),
  KEY `fk_branches_companies` (`branch_company_id`),
  CONSTRAINT `fk_branches_companies` FOREIGN KEY (`branch_company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,1,'Branch1','Branch1 address','2019-04-01 12:52:52','active'),(2,2,'Branch2','Branch2 address','2019-04-01 12:53:15','active'),(3,1,'branch 3','branch 3 address','2019-04-01 16:02:06','active'),(4,2,'branch 4','branch 4 address','2019-04-01 16:02:20','active'),(5,1,'branch 4','brach 4 address','2019-04-01 16:16:03','active');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidates` (
  `date` date DEFAULT NULL,
  `category` varchar(256) DEFAULT NULL,
  `venue` varchar(256) DEFAULT NULL,
  `advt_no` varchar(256) DEFAULT NULL,
  `post_type` varchar(256) DEFAULT NULL,
  `criteria_met` varchar(256) DEFAULT NULL,
  `post` varchar(256) DEFAULT NULL,
  `location_of_post` varchar(256) DEFAULT NULL,
  `payscale` varchar(256) DEFAULT NULL,
  `class` varchar(256) DEFAULT NULL,
  `discipline` varchar(256) DEFAULT NULL,
  `shortlisted_as_ur` varchar(256) DEFAULT NULL,
  `candidate_name` varchar(256) NOT NULL,
  `dob` date DEFAULT NULL,
  `address_1` varchar(256) DEFAULT NULL,
  `address_2` varchar(256) DEFAULT NULL,
  `address_3` varchar(256) DEFAULT NULL,
  `district` varchar(256) DEFAULT NULL,
  `state` varchar(256) DEFAULT NULL,
  `pin` varchar(16) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `ex_serviceman` varchar(8) DEFAULT NULL,
  `pwd` varchar(8) DEFAULT NULL,
  `pwd_type` varchar(8) DEFAULT NULL,
  `departmental` varchar(8) DEFAULT NULL,
  `cpfno` varchar(16) DEFAULT NULL,
  `current_work_location` varchar(256) DEFAULT NULL,
  `ex_apprentice` varchar(8) DEFAULT NULL,
  `qualification` varchar(256) DEFAULT NULL,
  `percentage_in_qualification` varchar(16) DEFAULT NULL,
  `total_marks` varchar(16) DEFAULT NULL,
  `wt_85` varchar(16) DEFAULT NULL,
  `wt_90` varchar(16) DEFAULT NULL,
  `skill_test_steno` varchar(8) DEFAULT NULL,
  `skill_test_typing` varchar(8) DEFAULT NULL,
  `skill_test_others` varchar(8) DEFAULT NULL,
  `pst` varchar(8) DEFAULT NULL,
  `pet` varchar(8) DEFAULT NULL,
  `marks_written_A` varchar(16) DEFAULT NULL,
  `marks_acad_B_15` varchar(16) DEFAULT NULL,
  `marks_acad_B_10` varchar(16) DEFAULT NULL,
  `marks_apprent_5` varchar(16) DEFAULT NULL,
  `marks_apprent_0` varchar(16) DEFAULT NULL,
  `totalmarks_ABC` varchar(16) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2168 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','DURGESH DINESH PAWAR','1997-10-25','AUDUMBAR NAGAR AMRUTHDHAM NASHIK','','','NASHIK','MAHARASHTRA','422003','7768081711','durgeshpawar.official@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','80.06','72','85','NA','','','','','','80','','10','0','','90',2145,180102077662),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','RAHUL KESHAVRAO ANDHALGAONKAR','1995-04-19','OPP. LAXMI DECORATION','ZADE CHOWK LALGANJ','','NAGPUR','MAHARASHTRA','440002','8793474238','rahul20161995@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','71.76','71','85','NA','','','','','','80','','10','0','','90',2146,180102052220),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','SHELKE BALAJI DAGDUJI','1991-11-20','P.NO 1D BELA NAGAR TARODA KHU','3 ROOM NANDED','','NANDED','MAHARASHTRA','431605','9096318150','bdshelke@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','73.37','70','85','NA','','','','','','80','','10','0','','90',2147,180102015979),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','KUNAL UTTAM WAGH','1993-12-01','10 A KRISHNASHRADHA APPT','KATHE NAGAR UPNAGAR NASIK','NASIK MAHARASHTRA','NASHIK','MAHARASHTRA','422006','9561573614','kunalwagh1293@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','74.33','70','85','NA','','','','','','80','','10','0','','90',2148,180102033133),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','VAZAREKAR MAHESH DATTATRAYA','1992-10-31','HOME NO.219 SHIVAJI NAGAR','MHADA COLONY','BHOKARDAN ROAD','JALNA','MAHARASHTRA','431203','9158568876','mdvazarekar@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','67.11','70','85','NA','','','','','','80','','10','0','','90',2149,180102033219),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','LALIT LAKHAN RAJGADKAR','1994-10-06','NEAR KALE ATTA CHAKI AMBEDKAR NAGAR','BABUPETH CHANDRAPUR','','CHANDRAPUR','MAHARASHTRA','442403','9130263648','lalitrajgadkar07@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','68.36','70','85','NA','','','','','','80','','10','0','','90',2150,180102044267),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','NIKHIL PRASAD PATIL','1998-04-07','201 PLOT NO10 SHRI RATNA MCCH SOC.','','','RAIGAD','MAHARASHTRA','410206','8425898507','np280715@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','72.47','69','85','NA','','','','','','80','','10','0','','90',2151,180102039145),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','BHUKYA MANJULA','1997-05-14','H.NO 3  18','BHIKKUTHANADA','PALVANCHA','KHAMMAM','TELANGANA','507115','8897485637','manjulakishan1@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','83.82','69','85','NA','','','','','','80','','10','0','','90',2152,180102039627),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','SOYAM SURAJ ANNAJI','1995-10-19','TIWARI LAYOUT INFRONT OF POLICE','QUATER ARVI ROAD WARDHA','','WARDHA','MAHARASHTRA','442001','7776017353','surajsoyam01@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','60.84','69','85','NA','','','','','','80','','10','0','','90',2153,180102041074),(NULL,'ST','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','SUDEWAD ASHWINIKUMAR CHANDARAO','1994-06-15','SHREENIWAS SWAMI VIVEKANAD NAGAR','PAWADEWADI ROAD NEAR FARANDE NAGAR','NANDED','NANDED','MAHARASHTRA','431605','8087705980','ashvinsudewad@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','79.16','69','85','NA','','','','','','80','','10','0','','90',2154,180102048367),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','PATOLE TUSHAR SUNIL','1997-06-13','VADGAON PUNE','','','HAVELI','MAHARASHTRA','411041','7507749882','13797tushar@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','87.5','74','85','NA','','','','','','80','','10','5','','90',2155,180102040012),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','THOSRE SAGAR SUDHAKAR','1995-01-21','AT BHOD POST SUKODA','TAL AKOLA','','AKOLA','MAHARASHTRA','444006','8698028573','sagarthosre@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','67.1','79','85','NA','','','','','','80','','10','0','','90',2156,180102032364),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','SHAHAJI LAXMAN SHINDE','1997-08-09','261 CHMABHAR GALLI','TULSHI','TAL MADHA','SOLAPUR','MAHARASHTRA','413302','9096642546','shahajishinde1010@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','86.24','78','85','NA','','','','','','80','','10','0','','90',2157,180102030532),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','MESHRAM SHUBHAM SIDDHARTH','1995-01-17','PLOT NO. 01 AWALE NAGAR','TEKA NAKA POST UPPALWADI','','NAGPUR','MAHARASHTRA','440026','7709595767','ssmeshram17@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','74.12','78','85','NA','','','','','','80','','10','0','','90',2158,180102078156),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','PRITAM PANDIT POWAR','1992-08-26','AT PO KERLE TAL KARVEER','','','KOLHAPUR','MAHARASHTRA','416229','9011635656','powarpritam5656@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','70.98','77','85','NA','','','','','','80','','10','0','','90',2159,180102013760),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','MASHALKAR GANPATRAO ANNAPPA','1993-09-22','NEAR KALIKA TEMPLE','KUMBHAR GALLI MIRAJ','MIRAJ','SANGLI','MAHARASHTRA','416410','9552058085','ganeshm.gceme@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','74.54','77','85','NA','','','','','','80','','10','0','','90',2160,180102038863),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','SHUBHAM DEVKUMAR DAHAT','1995-05-27','GOVINDPUR ROAD SANJAYNAGAR','NEAR BUDDHA VIHAR','','GONDIA','MAHARASHTRA','441601','8412043163','shubhamdahat1995@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','84.9','77','85','NA','','','','','','80','','10','0','','90',2161,180102040911),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','PRAMOD KRISHNAT ROTE','1994-05-19','AT MANDARE POST SAWARDE','TAL KARVIR','DIST KOLHAPUR','KOLHAPUR','MAHARASHTRA','416001','7020060741','pramodrote0712@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','63.33','76','85','NA','','','','','','80','','10','0','','90',2162,180102021453),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','CHAKRANARAYAN AMOL VASUDEO','1987-05-20','NEW MAHSUL COLONY KHADKI','AKOLA','','AKOLA','MAHARASHTRA','444001','9970024776','amol.chakranarayan@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','76.7','76','85','NA','','','','','','80','','10','0','','90',2163,180102062128),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','HEMANT BHASKAR BANSOD','1988-08-11','AT POST SAWARGAON','TAHSIL NAGBHIR','','CHANDRAPUR','MAHARASHTRA','441221','8956230680','hemantbbansod@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','79.24','75','85','NA','','','','','','80','','10','0','','90',2164,180102014168),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','MADHALE JAGDISH PRABHAKAR','1985-12-02','OLD SHIRODA NAKA','SALAIWADA','TALUKA  SAWANTWADI','SINDHUDURG','MAHARASHTRA','416510','8308639442','jagdishmadhale02@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','67.54','75','85','NA','','','','','','80','','10','0','','90',2165,180102031161),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','KAMBLE SWAPNIL GANESH','1993-11-06','ROOM NO 14 AMBIKA BUILDING','H P K MARG','SHRI KRISHNA CHOWK KURLA WEST','MUMBAI','MAHARASHTRA','400070','8082646593','swapnilk401@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','85.79','75','85','NA','','','','','','80','','10','0','','90',2166,180102065611),(NULL,'SC','','04/2018,WOU,Mumbai','Non Executives','','ASSISTANT TECHNICIAN (MECHANICAL)','WOU, Mumbai','Rs. 12,000- 27000/-','Class III','Engg','No','MAYUR HIRALAL MESHRAM','1990-03-23','AT POST NAVKHALA TA NAGBHIR','DIST CHANDRAPUR','','CHANDRAPUR','MAHARASHTRA','441205','9518757829','mayurmesh54@gmail.com','N','N','0','N','0','0','N','3 YEARS DIPLOMA IN MECHANICAL ENGINEERING','62.86','75','85','NA','','','','','','80','','10','0','','90',2167,180102067540);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_address` varchar(128) NOT NULL,
  `company_create_date` datetime NOT NULL,
  `company_status` enum('active','inactive') NOT NULL,
  `company_start_date` date NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'abc','abc@abc.com','abc city','2019-04-01 07:12:23','active','0000-00-00'),(2,'xyz','xyz@xyz.com','xyz city','2019-04-01 12:49:35','inactive','0000-00-00'),(3,'some company','some@some.com','some address','2019-04-02 00:00:00','active','2019-04-02'),(4,'company 3','company3@company3.com','company 3 address','2019-04-02 00:00:00','active','2019-04-02');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daily_progress_reports`
--

DROP TABLE IF EXISTS `daily_progress_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_progress_reports` (
  `daily_progress_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `daily_progress_report_survey` int(11) NOT NULL,
  `daily_progress_report_field_party` int(11) NOT NULL,
  `daily_progress_report_date` date NOT NULL,
  `daily_progress_report_accepted_shots` int(11) NOT NULL,
  `daily_progress_report_rejected_shots` int(11) NOT NULL,
  `daily_progress_report_skipped_shots` int(11) NOT NULL,
  `daily_progress_report_repeated_shots` int(11) NOT NULL,
  `daily_progress_report_instrument` enum('UL-508XT','UL-408','ION Analog','ION Digital') DEFAULT NULL,
  `daily_progress_report_skm` double NOT NULL,
  PRIMARY KEY (`daily_progress_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_progress_reports`
--

LOCK TABLES `daily_progress_reports` WRITE;
/*!40000 ALTER TABLE `daily_progress_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_progress_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(45) NOT NULL,
  `department_create_date` datetime NOT NULL,
  `department_status` enum('active','inactive') NOT NULL,
  `department_branch_id` int(11) NOT NULL,
  `department_company_id` int(11) NOT NULL,
  PRIMARY KEY (`department_id`),
  CONSTRAINT `fk_departments_branches` FOREIGN KEY (`department_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_departments_companies` FOREIGN KEY (`department_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Department 1','2019-04-01 13:12:43','active',1,2),(2,'Department 2','2019-04-01 13:17:05','active',2,1);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dpr_onland`
--

DROP TABLE IF EXISTS `dpr_onland`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dpr_onland` (
  `dpr_id` int(11) NOT NULL AUTO_INCREMENT,
  `dpr_date` date NOT NULL,
  `dpr_field_party` int(11) NOT NULL,
  `dpr_shots_acc` int(11) DEFAULT 0,
  `dpr_shots_rej` int(11) DEFAULT 0,
  `dpr_shots_skip` int(11) DEFAULT 0,
  `dpr_shots_rec` int(11) DEFAULT 0,
  `dpr_conv_factor` double DEFAULT 0,
  `dpr_coverage` double DEFAULT 0,
  `dpr_area` varchar(128) DEFAULT NULL,
  `dpr_shot_type` enum('EXPLOSIVE','VIBROSEIS') DEFAULT NULL,
  `dpr_acq_type` enum('3D','2D','3D3C','4D','4D3C') DEFAULT NULL,
  `dpr_party_type` enum('DEPARTMENTAL','OUTSOURCED') DEFAULT NULL,
  PRIMARY KEY (`dpr_id`),
  KEY `fk_dpr_onland_1` (`dpr_field_party`),
  CONSTRAINT `fk_dpr_onland_1` FOREIGN KEY (`dpr_field_party`) REFERENCES `field_parties` (`field_party_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dpr_onland`
--

LOCK TABLES `dpr_onland` WRITE;
/*!40000 ALTER TABLE `dpr_onland` DISABLE KEYS */;
/*!40000 ALTER TABLE `dpr_onland` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_parties`
--

DROP TABLE IF EXISTS `field_parties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_parties` (
  `field_party_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_party_name` varchar(45) DEFAULT NULL,
  `field_party_type` enum('DEPARTMENTAL','OUTSOURCED','VSP') DEFAULT NULL,
  `field_party_region` int(11) DEFAULT NULL,
  `field_party_chief` int(11) DEFAULT NULL,
  `field_party_create_date` date DEFAULT NULL,
  PRIMARY KEY (`field_party_id`),
  KEY `fk_field_parties_chief` (`field_party_chief`),
  KEY `fk_field_parties_region` (`field_party_region`),
  CONSTRAINT `fk_field_parties_chief` FOREIGN KEY (`field_party_chief`) REFERENCES `manpowers` (`manpower_cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_field_parties_region` FOREIGN KEY (`field_party_region`) REFERENCES `regions` (`region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_parties`
--

LOCK TABLES `field_parties` WRITE;
/*!40000 ALTER TABLE `field_parties` DISABLE KEYS */;
INSERT INTO `field_parties` VALUES (13,'GP-03','DEPARTMENTAL',7,57581,'2019-04-09'),(14,'GP-16','DEPARTMENTAL',7,78212,'2019-04-09'),(15,'GP-06','DEPARTMENTAL',7,NULL,'2019-04-09'),(16,'GP-15','DEPARTMENTAL',7,NULL,'2019-04-09'),(17,'GP-26','DEPARTMENTAL',7,NULL,'2019-04-09'),(18,'GP-61','DEPARTMENTAL',7,NULL,'2019-04-09'),(19,'GP-81','DEPARTMENTAL',7,NULL,'2019-04-09'),(20,'GP-11','DEPARTMENTAL',1,77011,'2019-08-20'),(21,'GP-12','DEPARTMENTAL',1,81764,'2019-08-20'),(22,'GP-29','DEPARTMENTAL',1,77017,'2019-08-20'),(23,'GP-04','DEPARTMENTAL',1,77017,'2019-08-20'),(24,'GP-64','VSP',1,46827,'2019-08-20'),(25,'GP-38','DEPARTMENTAL',2,122513,'2019-08-20'),(26,'GP-82','DEPARTMENTAL',2,121616,'2019-08-20'),(27,'GP-08','DEPARTMENTAL',3,66438,'2019-08-20'),(28,'GP-09','DEPARTMENTAL',3,55101,'2019-08-20'),(29,'GP-10','DEPARTMENTAL',3,66440,'2019-08-20'),(30,'GP-23','DEPARTMENTAL',3,95931,'2019-08-20'),(31,'GP-62','VSP',3,66460,'2019-08-20'),(32,'GP-90','VSP',3,81301,'2019-08-20'),(33,'GP-17','DEPARTMENTAL',4,46694,'2019-08-20'),(34,'GP-18','DEPARTMENTAL',4,NULL,'2019-08-20'),(36,'GP-100','OUTSOURCED',5,NULL,'2019-08-21'),(37,'DOLPHIN INC','OUTSOURCED',5,NULL,'2019-08-21');
/*!40000 ALTER TABLE `field_parties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manpowers`
--

DROP TABLE IF EXISTS `manpowers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manpowers` (
  `manpower_cpf` int(11) NOT NULL,
  `manpower_name` varchar(64) NOT NULL,
  `manpower_designation` enum('Executive Director','Group General Manager','Chief General Manager','General Manager','Deputy General Manager','Chief Manager','Chief Geophysicist','Chief Geologist','Chief Chemist','Chief Engineer','Manager','Superintending Geophysicist','Superintending Geologist','Superintending Chemist','Superintending Engineer','Executive Engineer','Senior Officer','Assistant Executive Engineer','Senior Geologist','Senior Chemist','Geophysicist','Geologist','Chemist','Assistant Officer','Assistant Engineer','Personal Secretary','Chief Superintendent','Senior Foreman','Senior Superintendent','Superintendent','Foreman','Assistant Superintendent','Assistant Foreman','Junior Engineer','Junior Superintendent','Junior Accountant','Topman','Chargeman','Assistant Grade I','Junior Technician','Rig man','Assistant Grade II','Assistant Junior Technician','Assistant Rig man','Assistant Grade III','Junior Assistant Technician','Junior Assistant A-I','Head Worker W-VII','Deputy Head Worker','Senior Worker W-V','Attendant Grade -I','Attendant Grade -II','Attendant Grade –III','Junior Attendant') DEFAULT NULL,
  `manpower_discipline` enum('Geophysics','E&T','Programming','Survey','Electronics','HR','MM','IT','P&A','Mechanical','Duplicating Mechanical','Drilling','Marine','Technical','Field','Crane','Office','H/V','H/E','Auto','Auto Elect','Winch','Hygiene','Geoscience','T/B','Steno') DEFAULT NULL,
  `manpower_charge` varchar(32) DEFAULT NULL,
  `manpower_level` enum('E9','E8','E7','E6','E5','E4','E3','E2','E1','E0','A4','A3','A2','A1','W7','W6','W5','W4','W3','W2','W1','S4','S3','S2','S1') DEFAULT NULL,
  `manpower_mobile_number` varchar(20) DEFAULT NULL,
  `manpower_create_date` date NOT NULL,
  PRIMARY KEY (`manpower_cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manpowers`
--

LOCK TABLES `manpowers` WRITE;
/*!40000 ALTER TABLE `manpowers` DISABLE KEYS */;
INSERT INTO `manpowers` VALUES (27352,'Anil  Rajput',NULL,NULL,'',NULL,'','2019-04-12'),(29069,'Moinuddin A Kadri',NULL,NULL,'',NULL,'','2019-04-12'),(29167,'Baban Jha',NULL,NULL,'',NULL,'','2019-04-12'),(33179,'Y.K. BHARADWAJ',NULL,NULL,'',NULL,'','2019-04-16'),(39579,'R D Chowdhary',NULL,NULL,'',NULL,'','2019-04-16'),(39592,'MADAN SINGH RANA',NULL,NULL,'',NULL,'','2019-04-16'),(39606,'Sunita Mathur',NULL,NULL,'',NULL,'','2019-04-16'),(39619,'A.K. Vyas',NULL,NULL,'',NULL,'','2019-04-12'),(39630,'P.L.Bairwa',NULL,NULL,'',NULL,'','2019-04-12'),(39633,'K S Rao',NULL,NULL,'',NULL,'','2019-04-16'),(39689,'H.B. Makwana',NULL,NULL,'',NULL,'','2019-04-12'),(40085,'Y. S. Rawat',NULL,NULL,'',NULL,'','2019-04-12'),(42828,'S C Dobriyal',NULL,NULL,'',NULL,'','2019-04-16'),(42829,'S.D. Bhatt',NULL,NULL,'',NULL,'','2019-04-12'),(42842,'R K Garg',NULL,NULL,'',NULL,'','2019-04-12'),(42846,'CPS Rana',NULL,NULL,'',NULL,'','2019-04-16'),(42872,'I H KHAN',NULL,NULL,'',NULL,'','2019-04-16'),(42893,'Dr.GVR Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(42903,'M M Burman',NULL,NULL,'',NULL,'','2019-04-16'),(42922,'J.S. Bisht',NULL,'Geophysics','EA to HGS Vadodara','E6','','2019-04-12'),(42926,'M.P. SINGH',NULL,NULL,'',NULL,'','2019-04-16'),(42928,'BIRENDRA SINGH ASWAL',NULL,NULL,'',NULL,'','2019-04-16'),(42934,'S. P. MAITHANI',NULL,NULL,'',NULL,'','2019-04-16'),(42935,'S.K. DHOUNDIYAL',NULL,NULL,'',NULL,'','2019-04-16'),(42936,'RAJ KUMAR KANNOJIA',NULL,NULL,'',NULL,'','2019-04-16'),(42939,'PRADEEP KUMAR GARG',NULL,NULL,'',NULL,'','2019-04-16'),(45961,'M. Poosamuthu.',NULL,NULL,'',NULL,'','2019-04-16'),(45981,'A Nagarajan',NULL,NULL,'',NULL,'','2019-04-16'),(46090,'Chiranjit Boruah',NULL,NULL,'',NULL,'','2019-04-16'),(46192,'P.Ahmed',NULL,NULL,'',NULL,'','2019-04-16'),(46219,'Mukteswar Borah',NULL,NULL,'',NULL,'','2019-04-16'),(46285,'Jitu Ram Panging',NULL,NULL,'',NULL,'','2019-04-16'),(46330,'P Gogoi',NULL,NULL,'',NULL,'','2019-04-16'),(46362,'B C Gogoi',NULL,NULL,'',NULL,'','2019-04-16'),(46549,'D Sarkar',NULL,NULL,'',NULL,'','2019-04-16'),(46625,'A. Banerjee',NULL,NULL,'',NULL,'','2019-04-16'),(46652,'P. Lehri',NULL,NULL,'',NULL,'','2019-04-12'),(46659,'M K Jain',NULL,NULL,'',NULL,'','2019-04-16'),(46694,'Ranabir Biswas',NULL,NULL,'',NULL,'','2019-04-16'),(46818,'Ananthesh S Rao',NULL,NULL,'',NULL,'','2019-04-16'),(46827,'B S Kumar',NULL,'Electronics','','E5','','2019-04-09'),(46834,'Sribanta N.Dhal',NULL,NULL,'',NULL,'','2019-04-12'),(46863,'Rohit Pratik',NULL,NULL,'',NULL,'','2019-04-12'),(46885,'Sansar Singh',NULL,NULL,'',NULL,'','2019-04-16'),(46899,'H.K.Basumatari',NULL,NULL,'',NULL,'','2019-04-12'),(48006,'Birendra Yadav',NULL,NULL,'',NULL,'','2019-04-12'),(48219,'PRASAD RAM BALAK',NULL,NULL,'',NULL,'','2019-04-16'),(48263,'D.R. Patel',NULL,NULL,'',NULL,'','2019-04-12'),(48274,'B.P. Khalasi',NULL,NULL,'',NULL,'','2019-04-12'),(48275,'A.M. Patel',NULL,NULL,'',NULL,'','2019-04-12'),(48300,'A.B. Patel',NULL,NULL,'',NULL,'','2019-04-12'),(49325,'Sugandha S  Kelshikar',NULL,NULL,'',NULL,'','2019-04-16'),(49617,'N V Rajan',NULL,NULL,'',NULL,'','2019-04-16'),(50249,'L N Dutta',NULL,NULL,'',NULL,'','2019-04-16'),(51045,'R K Biswas',NULL,NULL,'',NULL,'','2019-04-16'),(51125,'K.S. Galani',NULL,NULL,'',NULL,'','2019-04-12'),(51614,'B. Uma',NULL,NULL,'',NULL,'','2019-04-16'),(51837,'P.A. Chithambaran',NULL,NULL,'',NULL,'','2019-04-16'),(51977,'K. Satyanarayana  ',NULL,NULL,'',NULL,'','2019-04-16'),(51985,'J. Raman   ',NULL,NULL,'',NULL,'','2019-04-16'),(52624,'Matibar Singh',NULL,NULL,'',NULL,'','2019-04-12'),(52628,'Neeraj Jain',NULL,NULL,'',NULL,'','2019-04-12'),(52637,'Chinmoy Chakravorty',NULL,NULL,'',NULL,'','2019-04-12'),(52830,'M N Borah',NULL,NULL,'',NULL,'','2019-04-16'),(52874,'Prodip Ojha',NULL,NULL,'',NULL,'','2019-04-16'),(53538,'Rohit Kumar P.Savanur',NULL,NULL,'',NULL,'','2019-04-12'),(53844,'Rajesh Madan',NULL,NULL,'',NULL,'','2019-04-12'),(53845,'P C Jain',NULL,NULL,'',NULL,'','2019-04-12'),(53887,'S C Dubey',NULL,NULL,'',NULL,'','2019-04-12'),(53894,'M H Sastry',NULL,NULL,'',NULL,'','2019-04-16'),(53899,'D. Biswas',NULL,NULL,'',NULL,'','2019-04-16'),(53900,'B K Mohapatra',NULL,NULL,'',NULL,'','2019-04-16'),(53957,'S V Purushottham',NULL,NULL,'',NULL,'','2019-04-16'),(53969,'Pankaj Agarwal',NULL,NULL,'',NULL,'','2019-04-12'),(54008,'AYM Swamy',NULL,NULL,'',NULL,'','2019-04-16'),(54037,'P C Kesavan  ',NULL,NULL,'',NULL,'','2019-04-16'),(54042,'S. M Murthy',NULL,NULL,'',NULL,'','2019-04-16'),(54043,'ACN Sivasubramani',NULL,NULL,'',NULL,'','2019-04-16'),(54055,'P. Chandran',NULL,NULL,'',NULL,'','2019-04-16'),(54065,'H. N. Garg',NULL,NULL,'',NULL,'','2019-04-12'),(54078,'Sudhirkant',NULL,NULL,'',NULL,'','2019-04-12'),(54080,'Sunil Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(54084,'Dr. Sanjeev Tandon',NULL,NULL,'',NULL,'','2019-04-12'),(54091,'K.Arulappan',NULL,NULL,'',NULL,'','2019-04-16'),(54095,'N Seshan(Auto)',NULL,NULL,'',NULL,'','2019-04-16'),(54707,'D Saha',NULL,NULL,'',NULL,'','2019-04-16'),(54710,'S.K.Dhar',NULL,NULL,'',NULL,'','2019-04-16'),(54781,'Prodip Sonowal',NULL,NULL,'',NULL,'','2019-04-16'),(54835,'B. N. Bhatta',NULL,NULL,'',NULL,'','2019-04-16'),(54936,'C.Borgohain',NULL,NULL,'',NULL,'','2019-04-16'),(55012,'Siben Guha',NULL,NULL,'',NULL,'','2019-04-16'),(55095,'P. N. Gahlot',NULL,NULL,'',NULL,'','2019-04-16'),(55101,'Dipankar Paul',NULL,NULL,'',NULL,'','2019-04-16'),(55912,'C. K. Manna',NULL,NULL,'',NULL,'','2019-04-16'),(55915,'D. K. Malik',NULL,NULL,'',NULL,'','2019-04-16'),(55971,'S. N. Mandal',NULL,NULL,'',NULL,'','2019-04-16'),(55982,'Prit Pal Singh',NULL,NULL,'',NULL,'','2019-04-16'),(55988,'P. Mishra',NULL,NULL,'',NULL,'','2019-04-16'),(56578,'A.K.Sharma',NULL,NULL,'',NULL,'','2019-04-16'),(57281,'S.S.Singh',NULL,NULL,'',NULL,'','2019-04-12'),(57287,'K Ramakrishna',NULL,NULL,'',NULL,'','2019-04-16'),(57290,'Y.V.Durga Prasad',NULL,NULL,'',NULL,'','2019-04-12'),(57324,'P K Bose',NULL,NULL,'',NULL,'','2019-04-16'),(57581,'A K Sahoo',NULL,'Geophysics','Party Chief GP-03','E6','','2019-04-10'),(59125,'JIA LAL',NULL,NULL,'',NULL,'','2019-04-16'),(61004,'Alok Sinha',NULL,'Geophysics','','E6','8291281761','2019-04-04'),(61049,'A Dakshina Murthy',NULL,NULL,'',NULL,'','2019-04-16'),(61066,'Hardayal Singh',NULL,NULL,'',NULL,'','2019-04-12'),(61105,'S P Nirala',NULL,NULL,'',NULL,'','2019-04-12'),(61115,'Min Bahadur Chetri',NULL,NULL,'',NULL,'','2019-04-12'),(61121,'Dwarika Prasad',NULL,NULL,'',NULL,'','2019-04-12'),(61134,'V.C. Ajudiya',NULL,NULL,'',NULL,'','2019-04-12'),(61142,'M.S. Katara',NULL,NULL,'',NULL,'','2019-04-12'),(61146,'S.I. Rana',NULL,NULL,'',NULL,'','2019-04-12'),(61149,'G.R Patel',NULL,NULL,'',NULL,'','2019-04-12'),(61153,'M. M. Shaikh',NULL,NULL,'',NULL,'','2019-04-12'),(61155,'A.G. Choudhary',NULL,NULL,'',NULL,'','2019-04-12'),(61158,'I.M. Malek',NULL,NULL,'',NULL,'','2019-04-12'),(61166,'D.M. Nayee',NULL,NULL,'',NULL,'','2019-04-12'),(61201,'R.D. Patel',NULL,NULL,'',NULL,'','2019-04-12'),(61277,'Umamahesswar',NULL,NULL,'',NULL,'','2019-04-16'),(61291,'L.S. Bisht',NULL,NULL,'',NULL,'','2019-04-12'),(61298,'M.M. Prajapati',NULL,NULL,'',NULL,'','2019-04-12'),(61299,'T B Patel',NULL,NULL,'',NULL,'','2019-04-12'),(61300,'S.M. Patel',NULL,NULL,'',NULL,'','2019-04-12'),(61317,'SK Chowdhury',NULL,NULL,'',NULL,'','2019-04-16'),(61350,'C K Ramachandran',NULL,NULL,'',NULL,'','2019-04-16'),(61361,'G.J. Mahiwal',NULL,NULL,'',NULL,'','2019-04-12'),(61362,'R.S. Rathwa',NULL,NULL,'',NULL,'','2019-04-12'),(61363,'N.S. Soni',NULL,NULL,'',NULL,'','2019-04-12'),(61364,'R.B. Parmar',NULL,NULL,'',NULL,'','2019-04-12'),(61366,'P.M. Parmar',NULL,NULL,'',NULL,'','2019-04-12'),(61369,'D.S.Prajapathi',NULL,NULL,'',NULL,'','2019-04-16'),(61370,'R.C. Vasava',NULL,NULL,'',NULL,'','2019-04-12'),(61371,'S.R. Vasava',NULL,NULL,'',NULL,'','2019-04-12'),(61394,'Ashok Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(61415,'C P Daswal',NULL,NULL,'',NULL,'','2019-04-16'),(61417,'D Bose',NULL,NULL,'',NULL,'','2019-04-16'),(61423,'P.L.Chamoli',NULL,NULL,'',NULL,'','2019-04-12'),(61428,'O.P.Srivastava',NULL,NULL,'',NULL,'','2019-04-12'),(61461,'Artatran Ojha',NULL,NULL,'',NULL,'','2019-04-12'),(61484,'R.K. Bhattacharjee',NULL,NULL,'',NULL,'','2019-04-16'),(61485,'S Basu',NULL,NULL,'',NULL,'','2019-04-16'),(62118,'Sanjib Sett',NULL,NULL,'',NULL,'','2019-04-16'),(62169,'S K Sharma',NULL,NULL,'',NULL,'','2019-04-16'),(62181,'A Mohamed Ali',NULL,NULL,'',NULL,'','2019-04-16'),(62198,'K V Krishnan',NULL,'Geophysics','CGS','E8','9435718502','2019-04-03'),(62427,'P. Thangamalar',NULL,NULL,'',NULL,'','2019-04-16'),(62443,'S Ashok Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(62477,'PJ Thankachan',NULL,NULL,'',NULL,'','2019-04-16'),(62494,'D. Mahalingam',NULL,NULL,'',NULL,'','2019-04-16'),(62570,'A. K. Kar',NULL,NULL,'',NULL,'','2019-04-16'),(62688,'M.Selvakumar',NULL,NULL,'',NULL,'','2019-04-16'),(62693,'V Gopinathan',NULL,NULL,'',NULL,'','2019-04-16'),(62726,'Ratan Lal Basak',NULL,NULL,'',NULL,'','2019-04-12'),(62741,'A K Khulbe',NULL,NULL,'',NULL,'','2019-04-16'),(62754,'VVRK Prasad',NULL,NULL,'',NULL,'','2019-04-12'),(62764,'S. K. Nath',NULL,NULL,'',NULL,'','2019-04-16'),(62785,'S. N. Bhattacharya',NULL,NULL,'',NULL,'','2019-04-16'),(62804,'V Prabhakar',NULL,NULL,'',NULL,'','2019-04-16'),(63578,'D K Arandhara',NULL,NULL,'',NULL,'','2019-04-16'),(63600,'H K Borah',NULL,NULL,'',NULL,'','2019-04-16'),(63607,'P Sonowal',NULL,NULL,'',NULL,'','2019-04-16'),(63618,'L K Baruah',NULL,NULL,'',NULL,'','2019-04-16'),(63629,'A C Hazarika',NULL,NULL,'',NULL,'','2019-04-16'),(64074,'Manish Chaturvedi',NULL,NULL,'',NULL,'','2019-04-12'),(64385,'S.Muruganandam',NULL,NULL,'',NULL,'','2019-04-16'),(64410,'S Gupta',NULL,NULL,'',NULL,'','2019-04-16'),(64468,'A.U. Parmar',NULL,NULL,'',NULL,'','2019-04-12'),(65145,'S Boruah',NULL,NULL,'',NULL,'','2019-04-16'),(65253,'M L  Paul',NULL,NULL,'',NULL,'','2019-04-16'),(65254,'A.Gofur ',NULL,NULL,'',NULL,'','2019-04-16'),(65299,'D Bharali',NULL,NULL,'',NULL,'','2019-04-16'),(65438,'Bagai Saikai',NULL,NULL,'',NULL,'','2019-04-16'),(65470,'M Sonowal',NULL,NULL,'',NULL,'','2019-04-16'),(66097,'S Koch',NULL,NULL,'',NULL,'','2019-04-16'),(66098,'K R Gogoi',NULL,NULL,'',NULL,'','2019-04-16'),(66104,'J C Basumatari',NULL,NULL,'',NULL,'','2019-04-16'),(66279,'S P Bora',NULL,NULL,'',NULL,'','2019-04-16'),(66374,'Robin Kalita',NULL,NULL,'',NULL,'','2019-04-16'),(66428,'N M Dutta',NULL,NULL,'',NULL,'','2019-04-16'),(66438,'B K Sharma',NULL,NULL,'',NULL,'','2019-04-16'),(66440,'Bipul Sen',NULL,NULL,'',NULL,'','2019-04-16'),(66442,'Jaganath Saikia',NULL,NULL,'',NULL,'','2019-04-12'),(66445,'Sobhakar Sarmah',NULL,NULL,'',NULL,'','2019-04-16'),(66458,'Ashoke Hazarika',NULL,NULL,'',NULL,'','2019-04-16'),(66460,'H N Bhattacharjee',NULL,NULL,'',NULL,'','2019-04-16'),(66939,'P. K. Talukdar',NULL,NULL,'',NULL,'','2019-04-16'),(66941,'PK Battacharjee',NULL,NULL,'',NULL,'','2019-04-16'),(66967,'Dwijen Gogoi',NULL,NULL,'',NULL,'','2019-04-16'),(66970,'R Borah',NULL,NULL,'',NULL,'','2019-04-16'),(66971,'A K  Dutta',NULL,NULL,'',NULL,'','2019-04-16'),(69969,'D.K. Nikam',NULL,NULL,'',NULL,'','2019-04-12'),(70474,'Annie Mathew',NULL,NULL,'',NULL,'','2019-04-12'),(70485,'Ashutosh Torne',NULL,NULL,'',NULL,'','2019-04-12'),(70514,'B R Shilwant',NULL,NULL,'',NULL,'','2019-04-16'),(70523,'J N Vaity',NULL,NULL,'',NULL,'','2019-04-16'),(70541,'D C Rabha',NULL,NULL,'',NULL,'','2019-04-16'),(70554,'Manav Kumar',NULL,'Geophysics','','E3','','2019-04-13'),(70576,'S K Yadav',NULL,NULL,'',NULL,'','2019-04-16'),(70580,'Manoj K Bhartee',NULL,NULL,'',NULL,'','2019-04-16'),(70581,'SANDEEP CHAUHAN',NULL,NULL,'',NULL,'','2019-04-16'),(72075,'A.K. Jha',NULL,NULL,'',NULL,'','2019-04-12'),(72582,'S.F.Vankar',NULL,NULL,'',NULL,'','2019-04-12'),(73423,'V. Natarajan',NULL,NULL,'',NULL,'','2019-04-16'),(73461,'D John Stephen',NULL,NULL,'',NULL,'','2019-04-16'),(73617,'J S Babu',NULL,NULL,'',NULL,'','2019-04-16'),(73666,'T Venkateswarlu',NULL,NULL,'',NULL,'','2019-04-16'),(73677,'V. Balu ',NULL,NULL,'',NULL,'','2019-04-16'),(73706,'B Santhi',NULL,NULL,'',NULL,'','2019-04-16'),(73741,'R.Chandrababu',NULL,NULL,'',NULL,'','2019-04-16'),(73758,'R Subhashini',NULL,NULL,'',NULL,'','2019-04-16'),(73759,'N Sri Hari',NULL,NULL,'',NULL,'','2019-04-16'),(73760,'RSK Rajan',NULL,NULL,'',NULL,'','2019-04-16'),(73761,'L Shanthi',NULL,NULL,'',NULL,'','2019-04-16'),(73764,'PK Majhi',NULL,NULL,'',NULL,'','2019-04-16'),(73782,'Manish S Bonal',NULL,NULL,'',NULL,'','2019-04-16'),(73783,'Naveen Poonia',NULL,'Geophysics','','E3','','2019-04-13'),(73784,'P.V.Vinod',NULL,NULL,'',NULL,'','2019-04-12'),(73789,'D. Baskar',NULL,NULL,'',NULL,'','2019-04-16'),(73790,'M.Jagadeesh Babu',NULL,NULL,'',NULL,'','2019-04-16'),(73791,'R. Madhusoodhanan',NULL,NULL,'',NULL,'','2019-04-16'),(73792,'Aneesh MS',NULL,NULL,'',NULL,'','2019-04-16'),(73793,'J. Balaji',NULL,NULL,'',NULL,'','2019-04-16'),(73794,'MVL Kameswari',NULL,NULL,'',NULL,'','2019-04-16'),(75323,'R.K.Bhatt',NULL,NULL,'',NULL,'','2019-04-12'),(75324,'K G Saha',NULL,NULL,'',NULL,'','2019-04-16'),(75475,'ANIRUDDHA CHAKRABORTY',NULL,NULL,'',NULL,'','2019-04-16'),(75566,'A Ghosh',NULL,NULL,'',NULL,'','2019-04-16'),(75569,'Sanjay Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(75573,'Sunil Kumar Chaudhary',NULL,NULL,'',NULL,'','2019-04-12'),(75574,'A K Bakshi',NULL,'Geophysics','','E5','','2019-04-13'),(75575,'Jaganath Dash',NULL,'Geophysics','','E5','','2019-04-13'),(75584,'T. K. Das',NULL,NULL,'',NULL,'','2019-04-16'),(76205,'P.Sadhu',NULL,NULL,'',NULL,'','2019-04-16'),(76215,'Jayanta Bhattacherjee',NULL,NULL,'',NULL,'','2019-04-16'),(76216,'R.B. Singh',NULL,NULL,'',NULL,'','2019-04-12'),(76293,'S W Haque',NULL,NULL,'',NULL,'','2019-04-16'),(76710,'R. Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(76990,'R.R. Vasava',NULL,NULL,'',NULL,'','2019-04-12'),(77001,'M B Viswanathan',NULL,NULL,'',NULL,'','2019-04-16'),(77005,'K Parasuraman',NULL,NULL,'',NULL,'','2019-04-16'),(77011,'P Rajappan',NULL,NULL,'',NULL,'','2019-04-16'),(77012,'S Easwaran',NULL,NULL,'',NULL,'','2019-04-16'),(77014,'P.Udayakumar',NULL,NULL,'',NULL,'','2019-04-16'),(77016,'K Baskarn ',NULL,NULL,'',NULL,'','2019-04-16'),(77017,'V Thanakumar',NULL,NULL,'',NULL,'','2019-04-16'),(77018,'V Chelladurai',NULL,NULL,'',NULL,'','2019-04-16'),(77025,'S. Bhaskaran',NULL,NULL,'',NULL,'','2019-04-12'),(77039,'S. Sivakami',NULL,NULL,'',NULL,'','2019-04-16'),(77042,'M.Murali',NULL,NULL,'',NULL,'','2019-04-16'),(77043,'T.K.Mani',NULL,NULL,'',NULL,'','2019-04-16'),(77047,'D. Raja',NULL,NULL,'',NULL,'','2019-04-16'),(77701,'R.K. Mandal',NULL,NULL,'',NULL,'','2019-04-12'),(77718,'Chiranjit Singh',NULL,NULL,'',NULL,'','2019-04-16'),(77732,'J.K.Parikh',NULL,NULL,'',NULL,'','2019-04-12'),(77734,'C.D. Patel',NULL,NULL,'',NULL,'','2019-04-12'),(77735,'P.M Rajwadi',NULL,NULL,'',NULL,'','2019-04-12'),(77736,'P.K Vaghela',NULL,NULL,'',NULL,'','2019-04-12'),(77741,'R.S. Suthar',NULL,NULL,'',NULL,'','2019-04-12'),(77782,'Manish Gupta',NULL,NULL,'',NULL,'','2019-04-16'),(77795,'Lakshman Katheria',NULL,NULL,'',NULL,'','2019-04-16'),(78034,'K S Rathod',NULL,'Mechanical','','S2','','2019-04-13'),(78074,'M. C. Pathak',NULL,NULL,'',NULL,'','2019-04-12'),(78212,'Amit Agarwal',NULL,'Geophysics','Party Chief GP-16','E6','','2019-04-09'),(78213,'Subir Chakravarty',NULL,NULL,'',NULL,'','2019-04-16'),(78220,'Anand Prakash',NULL,NULL,'',NULL,'','2019-04-16'),(78252,'B Ravindranath',NULL,NULL,'',NULL,'','2019-04-16'),(78352,'Ranjit Deka',NULL,NULL,'',NULL,'','2019-04-16'),(78434,'Narasinha G.Rathod',NULL,NULL,'',NULL,'','2019-04-16'),(78438,'T B Das',NULL,NULL,'',NULL,'','2019-04-16'),(78439,'Jagdish Singh',NULL,NULL,'',NULL,'','2019-04-12'),(78550,'Madan Mohan Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(79502,'Amit Banerjee',NULL,'Geophysics','','E5','','2019-04-13'),(79560,'C S Bahuguna',NULL,NULL,'',NULL,'','2019-04-16'),(79579,'K.V.G.K. Rao',NULL,NULL,'',NULL,'','2019-04-12'),(79592,'Mrs.Srilata Mohapatra',NULL,NULL,'',NULL,'','2019-04-16'),(79821,'M. M. Chavda',NULL,NULL,'',NULL,'','2019-04-12'),(81122,'P. Prabakar',NULL,NULL,'',NULL,'','2019-04-16'),(81301,'A M Singha',NULL,NULL,'',NULL,'','2019-04-16'),(81694,'Sailya Hazarika',NULL,NULL,'',NULL,'','2019-04-16'),(81764,'G.N.Baruah',NULL,NULL,'',NULL,'','2019-04-16'),(81765,'Rupjit Acharjya',NULL,NULL,'',NULL,'','2019-04-16'),(81773,'Dr. B K Sarma',NULL,NULL,'',NULL,'','2019-04-16'),(81863,'Pradip Kalita',NULL,NULL,'',NULL,'','2019-04-16'),(81864,'L Sonowal',NULL,NULL,'',NULL,'','2019-04-16'),(82115,'J S Pal',NULL,NULL,'',NULL,'','2019-04-12'),(82198,'G.L.N.Reddy',NULL,NULL,'',NULL,'','2019-04-12'),(82255,'SUBHASH CHAND',NULL,NULL,'',NULL,'','2019-04-16'),(82260,'Jagmeet Singh ',NULL,NULL,'',NULL,'','2019-04-12'),(82393,'K Nabakumar',NULL,'Geophysics','','E5','9410390598','2019-04-04'),(82488,'D.N.Bain',NULL,NULL,'',NULL,'','2019-04-16'),(82490,'S Manjula',NULL,NULL,'',NULL,'','2019-04-16'),(82607,'Narendra Kumar',NULL,'Programming','','E4','9435718370','2019-04-03'),(82815,'R. Babu',NULL,NULL,'',NULL,'','2019-04-16'),(83234,'Rajeev Agarwal',NULL,NULL,'',NULL,'','2019-04-16'),(83261,'P M Terwankar',NULL,NULL,'',NULL,'','2019-04-16'),(90154,'V Laxman',NULL,NULL,'',NULL,'','2019-04-16'),(91611,'Ram Phukan',NULL,NULL,'',NULL,'','2019-04-16'),(91612,'U.K.Hazarika',NULL,NULL,'',NULL,'','2019-04-16'),(91613,'R K Bordoloi',NULL,NULL,'',NULL,'','2019-04-16'),(91772,'Polash R Bora',NULL,NULL,'',NULL,'','2019-04-16'),(91773,'Randeep Guha',NULL,NULL,'',NULL,'','2019-04-12'),(91804,'Anjan Neog',NULL,NULL,'',NULL,'','2019-04-16'),(92375,'D J Dutta',NULL,NULL,'',NULL,'','2019-04-16'),(92376,'Nipul Baruah',NULL,NULL,'',NULL,'','2019-04-16'),(92379,'Chintu Konwar',NULL,NULL,'',NULL,'','2019-04-16'),(92381,'R Adhikary',NULL,NULL,'',NULL,'','2019-04-16'),(92382,'U C Roy',NULL,NULL,'',NULL,'','2019-04-16'),(92383,'S I Khandakar',NULL,NULL,'',NULL,'','2019-04-16'),(92387,'J Rehman',NULL,NULL,'',NULL,'','2019-04-16'),(92419,'Premanshu Nandi',NULL,NULL,'',NULL,'','2019-04-16'),(92467,'Ibrahim Bora',NULL,NULL,'',NULL,'','2019-04-16'),(92485,'Pramesh K.Satapathy',NULL,NULL,'',NULL,'','2019-04-16'),(92486,'Sonu Prasad',NULL,NULL,'',NULL,'','2019-04-16'),(93405,'P Preethi',NULL,NULL,'',NULL,'','2019-04-16'),(94114,'Sunil Mandal',NULL,NULL,'',NULL,'','2019-04-16'),(94221,'Alok Roy',NULL,NULL,'',NULL,'','2019-04-16'),(94315,'Shyam Vashistha',NULL,NULL,'',NULL,'','2019-04-12'),(94344,'S. D. Barman',NULL,NULL,'',NULL,'','2019-04-16'),(94350,'Tulsi Madhukar',NULL,NULL,'',NULL,'','2019-04-16'),(94353,'Ananta Kr. Biswas',NULL,NULL,'',NULL,'','2019-04-16'),(95707,'A. K. Basak',NULL,NULL,'',NULL,'','2019-04-16'),(95709,'Puneet Saxena',NULL,NULL,'',NULL,'','2019-04-12'),(95724,'Jayashree Prusty',NULL,NULL,'',NULL,'','2019-04-12'),(95726,'Sandeep Rana',NULL,NULL,'',NULL,'','2019-04-16'),(95839,'Pavan K Pathak',NULL,NULL,'',NULL,'','2019-04-16'),(95931,'K.Joute',NULL,NULL,'',NULL,'','2019-04-16'),(96822,'Gyan Prakash',NULL,NULL,'',NULL,'','2019-04-12'),(96823,'SHIVESH JOSHI',NULL,NULL,'',NULL,'','2019-04-16'),(96824,'Sumit Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(96825,'Yogesh Sajwan',NULL,NULL,'',NULL,'','2019-04-12'),(96880,'D.Surender',NULL,NULL,'',NULL,'','2019-04-16'),(104505,'Mahavir Singh',NULL,NULL,'',NULL,'','2019-04-12'),(105086,'P. Rajanarayana',NULL,NULL,'',NULL,'','2019-04-12'),(105089,'M Sudhakar',NULL,NULL,'',NULL,'','2019-04-16'),(105091,'K.Karthik',NULL,NULL,'',NULL,'','2019-04-12'),(105377,'Pardeep sharma',NULL,NULL,'',NULL,'','2019-04-16'),(105379,'A Ashraf',NULL,NULL,'',NULL,'','2019-04-16'),(105383,'GVS Kishore',NULL,NULL,'',NULL,'','2019-04-16'),(105384,'Rajib Das',NULL,NULL,'',NULL,'','2019-04-16'),(105387,'Avanish Shukla',NULL,NULL,'',NULL,'','2019-04-12'),(105388,'Satish Chilaka',NULL,NULL,'',NULL,'','2019-04-16'),(105391,'Deb K. Chatterjee',NULL,NULL,'',NULL,'','2019-04-16'),(105396,'A. Raghavendra',NULL,NULL,'',NULL,'','2019-04-12'),(105400,'V.Naresh',NULL,NULL,'',NULL,'','2019-04-12'),(105401,'Rajendra Prasad',NULL,NULL,'',NULL,'','2019-04-16'),(105402,'Chitti Polinaidu',NULL,NULL,'',NULL,'','2019-04-12'),(105403,'Y K Singh',NULL,NULL,'',NULL,'','2019-04-16'),(105404,'V.P.Singh',NULL,NULL,'',NULL,'','2019-04-12'),(105557,'S. S. Das',NULL,NULL,'',NULL,'','2019-04-16'),(105564,'B. F. Dean',NULL,NULL,'',NULL,'','2019-04-16'),(105567,'T. K. Maji, ',NULL,NULL,'',NULL,'','2019-04-16'),(106153,'Sumit Das',NULL,NULL,'',NULL,'','2019-04-12'),(106154,'Prabhat Ranjan',NULL,'Geophysics','','E3','9410397014','2019-04-04'),(106157,'Ms A.Lakshmi Prasanna',NULL,NULL,'',NULL,'','2019-04-12'),(106158,'Laxman B',NULL,NULL,'',NULL,'','2019-04-16'),(106159,'Dr. R Jaiswal',NULL,NULL,'',NULL,'','2019-04-16'),(106161,'Diljith D T',NULL,NULL,'',NULL,'','2019-04-16'),(106164,'Venkata Giri Thota',NULL,NULL,'',NULL,'','2019-04-16'),(106170,'Eswara Rao V',NULL,NULL,'',NULL,'','2019-04-16'),(106171,'Ravi Kumar Palaka',NULL,NULL,'',NULL,'','2019-04-16'),(106172,'Srinivasa Rao Panga',NULL,NULL,'',NULL,'','2019-04-12'),(106224,'Rajesh Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(106504,'Barunkumar Sardar',NULL,NULL,'',NULL,'','2019-04-12'),(106784,'N Kotnees',NULL,NULL,'',NULL,'','2019-04-16'),(106785,'Nikhil Dua',NULL,NULL,'',NULL,'','2019-04-16'),(106907,'Prosenjit Das',NULL,NULL,'',NULL,'','2019-04-16'),(120686,'Prakash Kumar Chavda',NULL,NULL,'',NULL,'','2019-04-12'),(120689,'Kirit P. Patel',NULL,NULL,'',NULL,'','2019-04-12'),(120712,'Hetal Vasava',NULL,NULL,'',NULL,'','2019-04-12'),(120716,'Amitkumar L. Chauhan',NULL,NULL,'',NULL,'','2019-04-12'),(120799,'Arpan H.Gosaliya',NULL,NULL,'',NULL,'','2019-04-12'),(120896,'S.A.Navsariwala',NULL,NULL,'',NULL,'','2019-04-12'),(120934,'Mihir B. Pathak',NULL,NULL,'',NULL,'','2019-04-12'),(120978,'Samir N. Bhardwaj',NULL,NULL,'',NULL,'','2019-04-12'),(121041,'Mayur N. Trivedi',NULL,NULL,'',NULL,'','2019-04-12'),(121144,'K Radhika',NULL,NULL,'',NULL,'','2019-04-16'),(121163,'Panuganti Sreenu',NULL,NULL,'',NULL,'','2019-04-16'),(121203,'J.Benon Francis Silas',NULL,NULL,'',NULL,'','2019-04-16'),(121241,'D.R. Mahadik',NULL,NULL,'',NULL,'','2019-04-16'),(121278,'DHANANJAI SHARMA',NULL,NULL,'',NULL,'','2019-04-16'),(121409,'V K Singh',NULL,NULL,'',NULL,'','2019-04-16'),(121413,'S Kr. Shrivastava ',NULL,NULL,'',NULL,'','2019-04-16'),(121575,'J. Singh, ',NULL,NULL,'',NULL,'','2019-04-16'),(121595,'Sarathbabu S',NULL,NULL,'',NULL,'','2019-04-16'),(121598,'Sudip Ghara',NULL,NULL,'',NULL,'','2019-04-16'),(121601,'Trideep B',NULL,NULL,'',NULL,'','2019-04-16'),(121609,'A Nisarudheen',NULL,NULL,'',NULL,'','2019-04-16'),(121610,'Mithun K V',NULL,NULL,'',NULL,'','2019-04-16'),(121616,'AWADHESH KUMAR',NULL,NULL,'',NULL,'','2019-04-16'),(121648,'Amit Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(121649,'Abhishek Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(121652,'P K. Singh',NULL,NULL,'',NULL,'','2019-04-16'),(121725,'KANHAIYA KUMAR',NULL,NULL,'',NULL,'','2019-04-16'),(121744,'Govind Chauhan',NULL,NULL,'',NULL,'','2019-04-12'),(121754,'Illaiah Kunde',NULL,NULL,'',NULL,'','2019-04-12'),(121756,'Kamlesh Verma',NULL,NULL,'',NULL,'','2019-04-12'),(121760,'Pradeep Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(121781,'I N B Rao',NULL,NULL,'',NULL,'','2019-04-16'),(121782,'Afsal K Ismail',NULL,NULL,'',NULL,'','2019-04-16'),(121783,'D. Ramesh',NULL,NULL,'',NULL,'','2019-04-16'),(121786,'Honey Abraham',NULL,NULL,'',NULL,'','2019-04-16'),(121909,'Saideswar Rao',NULL,NULL,'',NULL,'','2019-04-12'),(121912,'Gopalakrishana Kuna',NULL,NULL,'',NULL,'','2019-04-12'),(121932,'Arvind Behera',NULL,NULL,'',NULL,'','2019-04-16'),(121971,'Praveen Vohat',NULL,NULL,'',NULL,'','2019-04-12'),(122025,'Julie Saikia',NULL,NULL,'',NULL,'','2019-04-16'),(122026,'Anirood H Hazarika',NULL,NULL,'',NULL,'','2019-04-16'),(122028,'Ranjan Paul',NULL,NULL,'',NULL,'','2019-04-16'),(122044,'C K Chutia',NULL,NULL,'',NULL,'','2019-04-16'),(122103,'Inamul Haque',NULL,NULL,'',NULL,'','2019-04-16'),(122185,'Akhilesh Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(122187,'Satish Kumar G',NULL,NULL,'',NULL,'','2019-04-16'),(122197,'Sudheesh T.S',NULL,NULL,'',NULL,'','2019-04-12'),(122208,'Devendra S Thakur',NULL,NULL,'',NULL,'','2019-04-16'),(122220,'N M Kachhadiya',NULL,NULL,'',NULL,'','2019-04-12'),(122225,'Tejas Joshi',NULL,NULL,'',NULL,'','2019-04-12'),(122340,'Vipul Chawla',NULL,NULL,'',NULL,'','2019-04-12'),(122355,'Mrs. V L L Krishnaveni E',NULL,NULL,'',NULL,'','2019-04-16'),(122358,'Vipin Gupta',NULL,NULL,'',NULL,'','2019-04-12'),(122362,'Abhra Chowdhary',NULL,NULL,'',NULL,'','2019-04-12'),(122365,'N. P. Singh',NULL,NULL,'',NULL,'','2019-04-12'),(122377,'Anoop Padmanabhan',NULL,NULL,'',NULL,'','2019-04-12'),(122378,'Aravind Sivadas',NULL,NULL,'',NULL,'','2019-04-12'),(122435,'G. Rajasekhar',NULL,NULL,'',NULL,'','2019-04-12'),(122436,'Dharmendra Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(122513,'ANOOP BHARADWAJ',NULL,NULL,'',NULL,'','2019-04-16'),(122514,'R.K.Yadav',NULL,NULL,'',NULL,'','2019-04-12'),(122517,'Satyendra Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(122536,'Ramkesh Meena',NULL,NULL,'',NULL,'','2019-04-12'),(122578,'R. V Rao',NULL,NULL,'',NULL,'','2019-04-16'),(122661,'Amit Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(122664,'R Periasamy',NULL,NULL,'',NULL,'','2019-04-16'),(123178,'S Shekhar',NULL,NULL,'',NULL,'','2019-04-16'),(123184,'Deepak Prakash',NULL,NULL,'',NULL,'','2019-04-16'),(123191,'Dileep Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(123238,'Jagadeesh P',NULL,NULL,'',NULL,'','2019-04-16'),(123325,'Pritam Bera',NULL,NULL,'',NULL,'','2019-04-16'),(123344,'Selvakumar C',NULL,NULL,'',NULL,'','2019-04-16'),(123347,'U. K. Santra',NULL,NULL,'',NULL,'','2019-04-16'),(123553,'K.G.Johnson',NULL,NULL,'',NULL,'','2019-04-16'),(123633,'Sunil Kolakaluri',NULL,NULL,'',NULL,'','2019-04-16'),(123634,'N C Smitha',NULL,NULL,'',NULL,'','2019-04-16'),(123747,'M. Vijayakumar',NULL,NULL,'',NULL,'','2019-04-16'),(123753,'Md. Maniruzzaman',NULL,NULL,'',NULL,'','2019-04-16'),(123798,'MOHAN PAL',NULL,NULL,'',NULL,'','2019-04-16'),(123800,'Indrajit Daluji',NULL,NULL,'',NULL,'','2019-04-12'),(123807,'A Toppo',NULL,NULL,'',NULL,'','2019-04-16'),(123813,'SUDHAKAR RAO BADISHA',NULL,NULL,'',NULL,'','2019-04-16'),(123815,'S Konda',NULL,NULL,'',NULL,'','2019-04-12'),(123816,'K Obelesu',NULL,NULL,'',NULL,'','2019-04-16'),(123819,'V S Prasad Bonda',NULL,NULL,'',NULL,'','2019-04-12'),(123822,'ANAND MOHAN',NULL,NULL,'',NULL,'','2019-04-16'),(124520,'Haobijam Romen Meitei',NULL,'Geophysics','','E2','','2019-04-13'),(124582,'Ms Supriya Shukla',NULL,NULL,'',NULL,'','2019-04-16'),(124601,'B Maneesh',NULL,NULL,'',NULL,'','2019-04-16'),(124710,'Vijay Prabhakar Ghadge',NULL,NULL,'',NULL,'','2019-04-16'),(124879,'Jayesh M thanage',NULL,NULL,'',NULL,'','2019-04-16'),(124887,'H. S. Kurmi',NULL,NULL,'',NULL,'','2019-04-16'),(124913,'G.Loganathan',NULL,NULL,'',NULL,'','2019-04-16'),(124988,'REWAT',NULL,NULL,'',NULL,'','2019-04-16'),(125188,'Sidhesh K Pandey',NULL,NULL,'',NULL,'','2019-04-16'),(125197,'Neeraj Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(125211,'Nagabhushanrao Konna',NULL,NULL,'',NULL,'','2019-04-16'),(125351,'SANYASIRAO KONDRI',NULL,NULL,'',NULL,'','2019-04-16'),(125391,'Ms Alpana Gautam',NULL,NULL,'',NULL,'','2019-04-12'),(125408,'Vijay K Rai',NULL,NULL,'',NULL,'','2019-04-16'),(125619,'Bhanu Pratap Singh',NULL,'Programming','','E2','9969226645','2019-04-04'),(126793,'G Krishnakumar',NULL,NULL,'',NULL,'','2019-04-16'),(126811,'K Mathivanan',NULL,NULL,'',NULL,'','2019-04-16'),(126857,'Rongoli Suryanarayana ',NULL,NULL,'',NULL,'','2019-04-16'),(126911,'SANDEEP KUMAR',NULL,NULL,'',NULL,'','2019-04-16'),(127024,'Ms.Swati Singh',NULL,NULL,'',NULL,'','2019-04-12'),(127808,'Rahul Mukund Jungade',NULL,NULL,'',NULL,'','2019-04-16'),(128241,'Rakesh Kr. Yadav',NULL,NULL,'',NULL,'','2019-04-16'),(128364,'ANUJ KUMAR',NULL,NULL,'',NULL,'','2019-04-16'),(128365,'NITESH CHANDRA TIWARI',NULL,NULL,'',NULL,'','2019-04-16'),(128370,'DIKSHA KALA',NULL,NULL,'',NULL,'','2019-04-16'),(128371,'TARUN UPADHAYAY',NULL,NULL,'',NULL,'','2019-04-16'),(129758,'A Senthil',NULL,NULL,'',NULL,'','2019-04-16'),(129760,'Nand Vipparti',NULL,NULL,'',NULL,'','2019-04-16'),(129763,'S.Thulasi',NULL,NULL,'',NULL,'','2019-04-16'),(129791,'K Jaiganesh',NULL,NULL,'',NULL,'','2019-04-16'),(129806,'C Kartikh',NULL,NULL,'',NULL,'','2019-04-16'),(130014,'Ashvin P. Nakum',NULL,NULL,'',NULL,'','2019-04-12'),(130844,'V.B. Parekh',NULL,NULL,'',NULL,'','2019-04-12'),(130863,'Ms.Minu Sharma',NULL,NULL,'',NULL,'','2019-04-12'),(130866,'D C Gandhi',NULL,NULL,'',NULL,'','2019-04-12'),(130874,'R R Joshi',NULL,NULL,'',NULL,'','2019-04-12'),(130876,'J.B. Leuva',NULL,NULL,'',NULL,'','2019-04-12'),(130892,'Amitkumar I.Patel',NULL,NULL,'',NULL,'','2019-04-12'),(130893,'T.A. Kharwal',NULL,NULL,'',NULL,'','2019-04-12'),(130894,'Manish N.Prajapati',NULL,NULL,'',NULL,'','2019-04-12'),(130897,'Hemant  B Parmar',NULL,NULL,'',NULL,'','2019-04-12'),(130915,'Ajay S.Talegaonkar',NULL,NULL,'',NULL,'','2019-04-12'),(130918,'D.M. Kantariya',NULL,NULL,'',NULL,'','2019-04-12'),(130919,'M.A. Rathwa',NULL,NULL,'',NULL,'','2019-04-12'),(130923,'S.H.Chauhan',NULL,NULL,'',NULL,'','2019-04-12'),(130944,'Sanjay D.Jingar',NULL,NULL,'',NULL,'','2019-04-12'),(130945,'G C Rathva',NULL,NULL,'',NULL,'','2019-04-12'),(130947,'V.C. Mistry',NULL,NULL,'',NULL,'','2019-04-12'),(131177,'Manoharlal Chaudhary',NULL,NULL,'',NULL,'','2019-04-12'),(131233,'Satya Narayan',NULL,NULL,'',NULL,'','2019-04-16'),(131234,'Rajan Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(131237,'O P Goswami',NULL,NULL,'',NULL,'','2019-04-16'),(131239,'Piyush K Mishra',NULL,NULL,'',NULL,'','2019-04-16'),(131253,'S H Mavani',NULL,NULL,'',NULL,'','2019-04-16'),(131360,'Akshay V',NULL,NULL,'',NULL,'','2019-04-16'),(131437,'Ms.Pratima Singh',NULL,NULL,'',NULL,'','2019-04-12'),(131439,'Vikas Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(131520,'Chinmoy Kumbhakar',NULL,NULL,'',NULL,'','2019-04-12'),(131522,'Tameem Bin Saud',NULL,NULL,'',NULL,'','2019-04-16'),(131524,'Baruneswar Baskey',NULL,NULL,'',NULL,'','2019-04-16'),(131526,'S K Sumant',NULL,NULL,'',NULL,'','2019-04-16'),(131798,'Pradeep Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(132299,'Shashank Sangewar',NULL,NULL,'',NULL,'','2019-04-12'),(132429,'Gabriel Pegu',NULL,NULL,'',NULL,'','2019-04-16'),(132575,'Mehul D Parmar',NULL,NULL,'',NULL,'','2019-04-12'),(132592,'A A Handique',NULL,NULL,'',NULL,'','2019-04-16'),(132769,'Jaywheel Patel',NULL,NULL,'',NULL,'','2019-04-12'),(132773,'L Devishree',NULL,NULL,'',NULL,'','2019-04-16'),(133065,'Munirkhan Chauhan',NULL,NULL,'',NULL,'','2019-04-12'),(133394,'Sukdev Das',NULL,NULL,'',NULL,'','2019-04-16'),(133408,'Pradeep Soren',NULL,NULL,'',NULL,'','2019-04-12'),(133447,'Ravi Dwivedi',NULL,NULL,'',NULL,'','2019-04-12'),(133452,'Prashant Singh',NULL,NULL,'',NULL,'','2019-04-12'),(133476,'S.N. Adapureddy',NULL,NULL,'',NULL,'','2019-04-16'),(133480,'Sachinkumar Daiya',NULL,NULL,'',NULL,'','2019-04-12'),(133487,'Umesh Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(133488,'Ramesh Gupta',NULL,NULL,'',NULL,'','2019-04-12'),(133494,'Kotaiah Keesara',NULL,NULL,'',NULL,'','2019-04-16'),(133517,'Akash Chandra',NULL,NULL,'',NULL,'','2019-04-16'),(133518,'Abhinav Mittal',NULL,NULL,'',NULL,'','2019-04-16'),(133541,'R K Lalitbhai',NULL,NULL,'',NULL,'','2019-04-16'),(133545,'Tulasi Ram Survada',NULL,NULL,'',NULL,'','2019-04-16'),(133562,'Yogesh Singh',NULL,NULL,'',NULL,'','2019-04-12'),(133586,'SACHIN MANGAL',NULL,NULL,'',NULL,'','2019-04-16'),(133589,'Prabhakar Mondal',NULL,NULL,'',NULL,'','2019-04-16'),(133860,'C. Vijaya Babu',NULL,NULL,'',NULL,'','2019-04-16'),(133862,'Dipayan Mukherjee',NULL,NULL,'',NULL,'','2019-04-16'),(133872,'Nagendra Babu Mahadasu',NULL,NULL,'',NULL,'','2019-04-16'),(134068,'Jitendra Yadav',NULL,NULL,'',NULL,'','2019-04-16'),(134069,'Shubham',NULL,NULL,'',NULL,'','2019-04-16'),(134071,'Deepak ',NULL,NULL,'',NULL,'','2019-04-16'),(134104,'Pratik Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(134133,'Digvijay Singh',NULL,NULL,'',NULL,'','2019-04-12'),(134147,'Biva Sharma',NULL,NULL,'',NULL,'','2019-04-16'),(134169,'Saikat Jana',NULL,NULL,'',NULL,'','2019-04-16'),(134203,'Amit Kumar Singh',NULL,NULL,'',NULL,'','2019-04-16'),(134221,'Nirban Majhi',NULL,NULL,'',NULL,'','2019-04-16'),(134290,'Rohan P Ghyare',NULL,NULL,'',NULL,'','2019-04-16'),(134293,'Souvic Maity',NULL,NULL,'',NULL,'','2019-04-16'),(134313,'Atanu Ghosh',NULL,NULL,'',NULL,'','2019-04-16'),(134353,'Sanjeev Kumar',NULL,NULL,'',NULL,'','2019-04-12'),(134394,'Bipasha Paul',NULL,NULL,'',NULL,'','2019-04-16'),(134406,'Anand Besra',NULL,NULL,'',NULL,'','2019-04-16'),(134409,'Diptendu Patra',NULL,NULL,'',NULL,'','2019-04-16'),(134410,'Sudeep Sarkar',NULL,NULL,'',NULL,'','2019-04-16'),(134416,'Ankit Kumar Singh',NULL,NULL,'',NULL,'','2019-04-12'),(134418,'Ramdev',NULL,NULL,'',NULL,'','2019-04-12'),(134484,'Anjali Goswami',NULL,NULL,'',NULL,'','2019-04-12'),(134489,'HIMANSHU MIDHA',NULL,NULL,'',NULL,'','2019-04-16'),(134490,'KESHAV KUMAR',NULL,NULL,'',NULL,'','2019-04-16'),(134496,'M Pruthvee',NULL,NULL,'',NULL,'','2019-04-16'),(134515,'Paul Mickey Toppo',NULL,NULL,'',NULL,'','2019-04-12'),(134521,'Anuj Kumar Singh',NULL,NULL,'',NULL,'','2019-04-12'),(134546,'Kshitij Tripathi',NULL,NULL,'',NULL,'','2019-04-16'),(134602,'Nishant',NULL,NULL,'',NULL,'','2019-04-16'),(134631,'Saikat Payra',NULL,NULL,'',NULL,'','2019-04-16'),(134637,'M.R. Behra',NULL,NULL,'',NULL,'','2019-04-16'),(134664,'MOH VASEEM AKRAM',NULL,NULL,'',NULL,'','2019-04-16'),(135034,'Nidhi Kumari',NULL,NULL,'',NULL,'','2019-04-16'),(135257,'Ashish Ranjan',NULL,NULL,'',NULL,'','2019-04-12'),(135276,'Dheerendra Mishra',NULL,NULL,'',NULL,'','2019-04-16'),(135307,'Palash Siddha ',NULL,NULL,'',NULL,'','2019-04-16'),(135383,'Abhishek Kumar Sharma ',NULL,NULL,'',NULL,'','2019-04-16'),(135435,'Debasish Darshan Das',NULL,NULL,'',NULL,'','2019-04-12'),(135598,'Kethavath Shiva',NULL,NULL,'',NULL,'','2019-04-16'),(135665,'Brijesh Kumar Pandey',NULL,NULL,'',NULL,'','2019-04-16'),(135728,'Manish Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(135730,'Arif Rizwan',NULL,NULL,'',NULL,'','2019-04-16'),(135733,'Pallavi Sahu',NULL,NULL,'',NULL,'','2019-04-16'),(135736,'AKSHAY BAJPAI',NULL,NULL,'',NULL,'','2019-04-16'),(135741,'Suman Mazumder',NULL,NULL,'',NULL,'','2019-04-16'),(135744,'SASWATA BAG',NULL,NULL,'',NULL,'','2019-04-16'),(135749,'Prashant',NULL,NULL,'',NULL,'','2019-04-12'),(135750,'Bhupal Mani',NULL,NULL,'',NULL,'','2019-04-16'),(135757,'Abdur Rouf',NULL,NULL,'',NULL,'','2019-04-12'),(135761,'Gobinda Dhara ',NULL,NULL,'',NULL,'','2019-04-16'),(135769,'Saurav Dasgupta',NULL,NULL,'',NULL,'','2019-04-16'),(135781,'Lovepreet Singh',NULL,NULL,'',NULL,'','2019-04-16'),(135792,'Raj Kumar',NULL,NULL,'',NULL,'','2019-04-16'),(135808,'Apurba Dutta',NULL,NULL,'',NULL,'','2019-04-16'),(135824,'Bashir Ali',NULL,NULL,'',NULL,'','2019-04-16'),(135859,'VIJAY KUMAR MAHATO',NULL,NULL,'',NULL,'','2019-04-16'),(135862,'Parshant',NULL,NULL,'',NULL,'','2019-04-16'),(135866,'Ms.Nisha',NULL,NULL,'',NULL,'','2019-04-12'),(135884,'SAJAN KUMAR',NULL,NULL,'',NULL,'','2019-04-16'),(135892,'P A Ingle',NULL,NULL,'',NULL,'','2019-04-16'),(135998,'Deepak',NULL,NULL,'',NULL,'','2019-04-16');
/*!40000 ALTER TABLE `manpowers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1553836353),('m130524_201442_init',1553836359),('m190124_110200_add_verification_token_column_to_user_table',1553836359);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postings`
--

DROP TABLE IF EXISTS `postings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postings` (
  `posting_id` int(11) NOT NULL AUTO_INCREMENT,
  `posting_cpf` int(11) NOT NULL,
  `posting_region` int(11) NOT NULL,
  `posting_at` enum('Base Office','RCC','Processing','Interpretation','Database','REL','QC','NSP','BM Office','HGS Office','Operations','Planning & Contract','CGS Office/MAP','Block','BMG','GP-03','GP-06','GP-08','GP-09','GP-10','GP-11','GP-12','GP-16','GP-17','GP-23','GP-26','GP-38','GP-61','GP-62','GP-64','GP-81','GP-82','GP-90','VSP Party','HR','Finance','Infocom Services','Specialist Group','MM','Logistics','HSE','Security') NOT NULL,
  `posting_on` date NOT NULL,
  PRIMARY KEY (`posting_id`),
  KEY `fk_postings_manpowers` (`posting_cpf`),
  KEY `fk_postings_regions` (`posting_region`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postings`
--

LOCK TABLES `postings` WRITE;
/*!40000 ALTER TABLE `postings` DISABLE KEYS */;
INSERT INTO `postings` VALUES (6,62198,5,'CGS Office/MAP','2019-02-01'),(7,82393,5,'CGS Office/MAP','2019-04-01'),(8,61004,5,'CGS Office/MAP','2019-04-01'),(10,82607,5,'CGS Office/MAP','2019-04-01'),(11,57581,7,'GP-03','2019-04-01'),(12,78212,7,'GP-16','2019-04-09'),(13,42922,7,'HGS Office','2019-04-01'),(14,125619,5,'CGS Office/MAP','2017-06-01'),(15,106154,5,'CGS Office/MAP','2018-06-16'),(16,106154,3,'Processing','2015-05-27');
/*!40000 ALTER TABLE `postings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(32) NOT NULL,
  `region_description` mediumtext DEFAULT NULL,
  `region_create_date` date NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Chennai','Geophysical Services, Chennai','2019-04-09'),(2,'Dehradun','Geophysical Services, Dehradun','2019-04-09'),(3,'Jorhat','Geophysical Services, Jorhat','2019-04-09'),(4,'Kolkata','Geophysical Services, Kolkata','2019-04-09'),(5,'Mumbai','Geophysical Services, mumbai','2019-04-09'),(7,'Vadodara','Geophysical Services, Vadodara','2019-04-09');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_sig` varchar(45) DEFAULT NULL,
  `survey_name` varchar(45) DEFAULT NULL,
  `survey_region` int(11) DEFAULT NULL,
  `survey_description` text DEFAULT NULL,
  `survey_shot_type` enum('EXPLOSIVE','VIBROSEIS','AIRGUN') DEFAULT NULL,
  `survey_acq_type` enum('3D','3D3C','2D','4D','3D-OBC','3D-3D-OBN','3D-BROADBAND') DEFAULT NULL,
  `survey_area_name` varchar(128) DEFAULT NULL,
  `survey_field_party` int(11) DEFAULT NULL,
  `survey_information` varchar(1024) DEFAULT NULL,
  `survey_onshore_offshore` enum('ONSHORE','OFFSHORE','TRANSITION ZONE') DEFAULT NULL,
  `survey_create_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`survey_id`),
  CONSTRAINT `fk_surveys_1` FOREIGN KEY (`survey_id`) REFERENCES `field_parties` (`field_party_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveys`
--

LOCK TABLES `surveys` WRITE;
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;
/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targets`
--

DROP TABLE IF EXISTS `targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `targets` (
  `target_id` int(11) NOT NULL AUTO_INCREMENT,
  `target_field_party` int(11) NOT NULL,
  `target_date` date NOT NULL,
  `target_conversion_factor` double NOT NULL,
  `target_mgh` int(11) NOT NULL,
  PRIMARY KEY (`target_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targets`
--

LOCK TABLES `targets` WRITE;
/*!40000 ALTER TABLE `targets` DISABLE KEYS */;
/*!40000 ALTER TABLE `targets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (13,'bhanu','','','w22-9poNI4bZGXohAmHtpMVC1E4eL2d-','$2y$13$vVWtvfcrXOVZZX.MDSjZ1.QJMkYWTkqkWodeyqJLIgdRi0zpoI7vG',NULL,'bp.mnnit@gmail.com',10,1553852028,1553852028,'D_GZ5tHvhJWLO9DzVEMZtBRWt4Is8fC8_1553852028'),(14,'rahul','Rahul','Khanna','X6nsd3mmjzbQdR8o-13ja33r3szBLlzW','$2y$13$smvUoPVANJZyYW1seqOC4.D7JY0oiGDZ4P0hfE9Q7.M4wxqwYyQ8m',NULL,'rahulkhanna@gmail.com',10,1554096505,1554096505,'KjVrK_kQsByuD4uy-8vAw13L-DR9EBOA_1554096505');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-23 15:35:56