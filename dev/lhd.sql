-- MySQL dump 10.13  Distrib 5.5.29, for osx10.6 (i386)
--
-- Host: localhost    Database: lifthousedesign
-- ------------------------------------------------------
-- Server version	5.5.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_groups`
--

DROP TABLE IF EXISTS `blog_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_groups`
--

LOCK TABLES `blog_groups` WRITE;
/*!40000 ALTER TABLE `blog_groups` DISABLE KEYS */;
INSERT INTO `blog_groups` VALUES (1,'Admin'),(4,'Banned'),(3,'Friend'),(5,'Guest'),(2,'Member');
/*!40000 ALTER TABLE `blog_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_pages`
--

DROP TABLE IF EXISTS `blog_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT '',
  `body` longtext,
  `show_in_list` tinyint(1) DEFAULT '1',
  `list_order` int(11) DEFAULT '0',
  `clean` varchar(128) DEFAULT '',
  `url` varchar(128) DEFAULT '',
  `user_id` int(11) DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_pages`
--

LOCK TABLES `blog_pages` WRITE;
/*!40000 ALTER TABLE `blog_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_permissions`
--

DROP TABLE IF EXISTS `blog_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_permissions` (
  `id` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT '',
  `group_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_permissions`
--

LOCK TABLES `blog_permissions` WRITE;
/*!40000 ALTER TABLE `blog_permissions` DISABLE KEYS */;
INSERT INTO `blog_permissions` VALUES ('add_draft','Add Drafts',0),('add_draft','Add Drafts',1),('add_group','Add Groups',0),('add_group','Add Groups',1),('add_page','Add Pages',0),('add_page','Add Pages',1),('add_post','Add Posts',0),('add_post','Add Posts',1),('add_user','Add Users',0),('add_user','Add Users',1),('change_settings','Change Settings',0),('change_settings','Change Settings',1),('delete_draft','Delete Drafts',0),('delete_draft','Delete Drafts',1),('delete_group','Delete Groups',0),('delete_group','Delete Groups',1),('delete_own_draft','Delete Own Drafts',0),('delete_own_draft','Delete Own Drafts',1),('delete_own_post','Delete Own Posts',0),('delete_own_post','Delete Own Posts',1),('delete_page','Delete Pages',0),('delete_page','Delete Pages',1),('delete_post','Delete Posts',0),('delete_post','Delete Posts',1),('delete_user','Delete Users',0),('delete_user','Delete Users',1),('edit_draft','Edit Drafts',0),('edit_draft','Edit Drafts',1),('edit_group','Edit Groups',0),('edit_group','Edit Groups',1),('edit_own_draft','Edit Own Drafts',0),('edit_own_draft','Edit Own Drafts',1),('edit_own_post','Edit Own Posts',0),('edit_own_post','Edit Own Posts',1),('edit_page','Edit Pages',0),('edit_page','Edit Pages',1),('edit_post','Edit Posts',0),('edit_post','Edit Posts',1),('edit_user','Edit Users',0),('edit_user','Edit Users',1),('ga_exclude_group','Exclude from Google Analytics',0),('toggle_extensions','Toggle Extensions',0),('toggle_extensions','Toggle Extensions',1),('view_draft','View Drafts',0),('view_draft','View Drafts',1),('view_own_draft','View Own Drafts',0),('view_own_draft','View Own Drafts',1),('view_private','View Private Posts',0),('view_private','View Private Posts',1),('view_private','View Private Posts',3),('view_scheduled','View Scheduled Posts',0),('view_scheduled','View Scheduled Posts',1),('view_scheduled','View Scheduled Posts',3),('view_site','View Site',0),('view_site','View Site',1),('view_site','View Site',2),('view_site','View Site',3),('view_site','View Site',5);
/*!40000 ALTER TABLE `blog_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_post_attributes`
--

DROP TABLE IF EXISTS `blog_post_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post_attributes` (
  `post_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `value` longtext,
  PRIMARY KEY (`post_id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post_attributes`
--

LOCK TABLES `blog_post_attributes` WRITE;
/*!40000 ALTER TABLE `blog_post_attributes` DISABLE KEYS */;
INSERT INTO `blog_post_attributes` VALUES (1,'body','<p>It has recently come to our attention that <a href=\"http://addons.prestashop.com/en/payments-gateways-prestashop-modules/1733-rbs-worldpay.html\" target=\"_blank\">Official PrestaShop RBS WorldPay module</a> will only work for European accounts. In North America, you must use the <a href=\"http://addons.prestashop.com/en/payments-gateways-prestashop-modules/4154-authorizenet-aim.html\" target=\"_blank\">Authorize.net module</a> to integrate with all RBS accounts. </p><p><span style=\"line-height: 1.45em;\">The good news is that the Authorize.net module is 100% free, and the RBS representatives are more than happy to provide you with everything you need to set it up.</span></p>'),(1,'tags','---\nDeploy: \"deploy\"\n'),(1,'title','Warning! Do Not Buy the PrestaShop WorldPay Module!');
/*!40000 ALTER TABLE `blog_post_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feather` varchar(32) DEFAULT '',
  `clean` varchar(128) DEFAULT '',
  `url` varchar(128) DEFAULT '',
  `pinned` tinyint(1) DEFAULT '0',
  `status` varchar(32) DEFAULT 'public',
  `user_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (1,'text','warning-do-not-buy-the-prestashop-worldpay-module','warning-do-not-buy-the-prestashop-worldpay-module',0,'public',1,'2013-10-15 10:32:04','2013-10-16 09:27:37');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_sessions`
--

DROP TABLE IF EXISTS `blog_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '',
  `data` longtext,
  `user_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_sessions`
--

LOCK TABLES `blog_sessions` WRITE;
/*!40000 ALTER TABLE `blog_sessions` DISABLE KEYS */;
INSERT INTO `blog_sessions` VALUES ('80f39c7b8bce1b117a125dd24b91eeff','redirect_to|s:38:\"http://local.lifthousedesign.com/blog/\";',0,'2013-10-29 10:29:23',NULL),('b2fda189d30046a7c5532bb7a3f7f093','user_id|s:1:\"1\";redirect_to|s:38:\"http://local.lifthousedesign.com/blog/\";',1,'2013-10-15 10:54:40','2013-10-16 09:26:46');
/*!40000 ALTER TABLE `blog_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_users`
--

DROP TABLE IF EXISTS `blog_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) DEFAULT '',
  `password` varchar(60) DEFAULT '',
  `full_name` varchar(250) DEFAULT '',
  `email` varchar(128) DEFAULT '',
  `website` varchar(128) DEFAULT '',
  `group_id` int(11) DEFAULT '0',
  `approved` tinyint(1) DEFAULT '1',
  `joined_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_users`
--

LOCK TABLES `blog_users` WRITE;
/*!40000 ALTER TABLE `blog_users` DISABLE KEYS */;
INSERT INTO `blog_users` VALUES (1,'admin','$2a$08$x2Vdkz2GiNlzgJ/7beHiIe92DOeh6d37Se9MsAi1Im4JhtrSxsJTe','','bain.lifthousedesign@gmail.com','http://local.lifthousedesign.com/blog',1,1,'2013-10-14 22:34:42');
/*!40000 ALTER TABLE `blog_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `company` varchar(64) DEFAULT NULL,
  `website` varchar(64) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `project_info` text NOT NULL,
  `email_successful` tinyint(4) DEFAULT '0',
  `email_debug` text,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
INSERT INTO `inquiries` VALUES (1,'',NULL,NULL,'',NULL,'',1,NULL,'2013-07-11 19:14:42');
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `url` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,'Locizzle','Locizzle.com is an automated Home Inspection bidding platform. Leave the calls, emails, and wasted time behind. Locizzle provides a quicker, easier way to schedule a Home Inspection, impressing those tech savvy Home Buyers.','/assets/img/portfolio/locizzle.png','https://locizzle.com','2013-06-25 23:27:13','2013-07-05 12:23:47'),(2,'Moonstar Alpha','In preparation for the much anticipated debut album \"<em>TERRORS FROM THE OUTER RIM</em>\", Moonstar Alpha is able to keep his fan base up to date. With sound clips, blog posts, and tour dates of his side project \"Descendants of Erdrick\", Moonstar Alpha is able to stay connected with his fans.','/assets/img/portfolio/moonstar.png','http://moonstaralpha.com','2013-06-25 23:27:13','2013-07-05 12:23:47'),(3,'Accident Review','AccidentReview.com offers quality content management to streamline accident reconstruction and insurance settlements.','/assets/img/portfolio/accident_review.png','http://accidentreview.com','2013-06-25 23:27:13','2013-07-05 12:23:47'),(4,'Orius','OriusBand.com Is a custom webpage for a local band. It is a prime example of how Lift House Design can produce a quality product even when budgets are streched thin.','/assets/img/portfolio/orius.png','http://oriusband.com','2013-06-25 23:27:13','2013-07-05 12:23:47');
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `harvest_client_id` int(11) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `phone_number` varchar(14) DEFAULT NULL,
  `fax_number` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bain.lifthousedesign@gmail.com','7505d64a54e061b7acd54ccd58b49dc43500b635',0,0,'2013-06-25 23:27:13','2013-06-25 23:27:13','2013-09-26 16:44:03','Nick','Niebaum','Lift House Design','(304) 871-6066','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-29 11:03:41
