-- MySQL dump 10.13  Distrib 5.6.27, for Win64 (x86_64)
--
-- Host: localhost    Database: Euterpe
-- ------------------------------------------------------
-- Server version	5.6.27

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
-- Table structure for table `composition`
--

DROP TABLE IF EXISTS `composition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `composition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT '0',
  `title` varchar(80) DEFAULT 'Title',
  `content` longtext,
  `status` varchar(45) DEFAULT 'Unfinished',
  `score` int(11) DEFAULT '0',
  `remark` longtext,
  `date` timestamp NULL DEFAULT NULL,
  `model` varchar(20) DEFAULT 'None',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `composition`
--

LOCK TABLES `composition` WRITE;
/*!40000 ALTER TABLE `composition` DISABLE KEYS */;
INSERT INTO `composition` VALUES (9,2,1,'NewComposition','\n<!--            <span class=\"composer-normal\">Normal</span>-->\n<!--            <span class=\"composer-history\" title=\"history\"></span>-->\n<!--            <span class=\"composer-note\" title=\"note\"></span>-->\n<!--            <span class=\"composer-comment\" title=\"comment\"></span>-->\n            \n            <span class=\"composer-normal\">Normal</span>\n            <span class=\"composer-history glyphicon glyphicon-time\" title=\"\" contenteditable=\"false\" data-toggle=\"tooltip\" data-placement=\"top\" style=\"display: none;\" data-original-title=\"history\"></span>\n            <span class=\"composer-note glyphicon glyphicon-edit\" title=\"\" contenteditable=\"false\" data-toggle=\"tooltip\" data-placement=\"top\" style=\"display: none;\" data-original-title=\"note\"></span>\n            <span class=\"composer-comment glyphicon glyphicon-list-alt\" title=\"\" contenteditable=\"false\" data-toggle=\"tooltip\" data-placement=\"top\" style=\"display: none;\" data-original-title=\"comment\"></span>\n                ','Todo',0,'nothing','2016-05-24 02:53:03','None'),(10,2,1,'Weekly Journal of Learning 11','<div>This week on class we mainly talked about film music. Film music is one kind of music that often appears with images so some famous music can always easily construct some scene in the audience mind and remind audience of the film plot which actually extends the power of a simple piece of music.</div><div>As an important part of a film, the functions of music can diversify from rendering atmosphere to characterizing some figures. In the class, we listened to the main theme music of the famous adventurous movie - Raiders of the Lost Ark - The Raiders March. This music is obviously able to ignite audience\'s desire to follow the main character\'s footstep and start their adventure in their own inner world. However, while the opening part plays an important role to lead the audience into the plot, the middle part helps construct the film scene. It expands the audience\'s imagination and locate it in the specific place where the story takes place.</div><div>What is interesting is that when film music firstly developed at early 19th century, it functions only as a background to silent film. At first, it is said that the image and the music cannot conform to each other. Later, musicians improved it because they found it\'s important to make the background music and the front image coordinate with each other. Today, music means more. Few great works can work without excellent music.</div>','Completed',0,'very very very good essay. You shouldn\'t miss it!!!!!','2016-05-24 02:59:01','True');
/*!40000 ALTER TABLE `composition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'TestCourse','This course is opened for backend test.'),(2,'AnotherTestCourse','Another course opened for test.'),(3,'NewCourse','Hello World');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseenrollment`
--

DROP TABLE IF EXISTS `courseenrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseenrollment` (
  `courseid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseenrollment`
--

LOCK TABLES `courseenrollment` WRITE;
/*!40000 ALTER TABLE `courseenrollment` DISABLE KEYS */;
INSERT INTO `courseenrollment` VALUES (1,2,'0000-00-00'),(2,2,NULL),(1,1,NULL),(1,4,NULL),(1,5,NULL),(1,9,NULL),(1,6,NULL),(2,6,NULL),(3,6,NULL),(1,10,NULL);
/*!40000 ALTER TABLE `courseenrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseware`
--

DROP TABLE IF EXISTS `courseware`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseware` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `readTime` text COLLATE utf8_unicode_ci,
  `quizzId` int(11) DEFAULT NULL,
  `uploadTime` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseware`
--

LOCK TABLES `courseware` WRITE;
/*!40000 ALTER TABLE `courseware` DISABLE KEYS */;
INSERT INTO `courseware` VALUES (1,'slide04_5385',NULL,NULL,'April 13,2016'),(2,'slide04_53885',NULL,NULL,'April 13,2016'),(3,'Solutions for Q3',NULL,NULL,'April 13,2016'),(7,'Chapter 11',NULL,NULL,'April 13,2016'),(8,'Chapter 12',NULL,NULL,'April 13,2016');
/*!40000 ALTER TABLE `courseware` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion`
--

DROP TABLE IF EXISTS `discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion` (
  `stuname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion`
--

LOCK TABLES `discussion` WRITE;
/*!40000 ALTER TABLE `discussion` DISABLE KEYS */;
INSERT INTO `discussion` VALUES ('未嫁父','question','hahahaah',NULL),('未嫁父','question','哈哈哈','哈哈哈哈哈哈哈哈哈哈哈哈');
/*!40000 ALTER TABLE `discussion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `postManId` int(11) DEFAULT '0',
  `time` datetime DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `readMenList` text COLLATE utf8_unicode_ci,
  `likeMenList` text COLLATE utf8_unicode_ci COMMENT '点赞人的名字,用|分隔开',
  `simpleInfo` text COLLATE utf8_unicode_ci,
  `anoymous` tinyint(1) DEFAULT NULL,
  `shieldteacher` tinyint(1) DEFAULT NULL,
  `nextPostId` text COLLATE utf8_unicode_ci,
  `isPost` int(1) DEFAULT NULL,
  PRIMARY KEY (`postId`),
  KEY `postId` (`postId`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (22,5,'2016-03-08 21:09:43','','<p>会不会递增呀好伤心。</p><p>下面是乱写的。。。</p><p>123456</p>','5','9','吴行行',0,0,'49|50|59',1),(24,9,'2016-03-08 21:20:30','第4个帖子','<p>为啥写这个帖子，不知道</p>','9|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|6|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|10|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5','1|5','9|ykd|第4个帖子|<p>为啥写这个帖子，不知道</p>|2016-03-08|1|2',1,2,'22|43|44|45|70',0),(33,5,'2016-03-10 20:53:32','123','<p>测试发帖！好紧张！！！！</p>','5',NULL,'5|吴行行|das|<p>呵呵呵呵</p>|2016-03-09|1|2',1,2,NULL,1),(37,9,'2016-03-11 10:12:11','╭(╯^╰)╮','<p>╭(╯^╰)╮</p>','9|5|5|5|5|5|5','9','9|ykd|╭(╯^╰)╮|<p>╭(╯^╰)╮</p>|2016-03-11|1|0',1,0,NULL,0),(38,9,'2016-03-11 13:06:36','对自己匿名？','<p style=\"margin-left: 20px;\">RT</p>','9|5|5|5|5|2',NULL,'9|ykd|对自己匿名？|<p style=\"margin-left: 20px;\">RT</p>|2016-03-11|1|0',1,0,NULL,0),(39,9,'2016-03-11 16:02:46','屏蔽能实现吗？','<p>RT测试</p>','9|5|5|5|5|5|5|5|2|5',NULL,'9|ykd|屏蔽能实现吗？|<p>RT测试</p>|2016-03-11|0|0',0,0,NULL,0),(40,9,'2016-03-11 16:03:58','重新测试','<p>╭(╯^╰)╮</p>','9|5|5|2',NULL,'9|ykd|重新测试|<p>╭(╯^╰)╮</p>|2016-03-11|0|0',0,0,NULL,0),(42,9,'2016-03-11 16:05:57','重新测试','<p>╭(╯^╰)╮</p>','9|5|5|5|5',NULL,'9|ykd|重新测试|<p>╭(╯^╰)╮</p>|2016-03-11|0|2',0,2,NULL,0),(43,9,'2016-03-11 16:16:18','','<p>回复的帖子咋看不到呢？？</p>',NULL,NULL,'ykd',0,0,NULL,1),(44,5,'2016-03-12 17:02:42','','<p>回复第四个帖子！</p>',NULL,NULL,'吴行行',0,0,NULL,1),(45,5,'2016-03-13 00:09:53','','<p>我要回帖！能不能显示呀！我在测试回帖的显示!</p>',NULL,NULL,'吴行行',0,0,NULL,1),(49,5,'2016-03-17 23:07:18','','<p>测试气泡,测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></p>',NULL,NULL,'吴行行',0,0,NULL,2),(50,5,'2016-03-17 23:18:04','','<p>接下来还要测试气泡！测试气泡！怎么选一个好的颜色呀！</p>',NULL,NULL,'吴行行',0,0,NULL,2),(52,5,'2016-03-21 13:10:16','测试@','<p>hello！@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> 吴行行</p>','5',NULL,'5|吴行行|测试@|<p>hello！@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> 吴行行</p>|2016-03-21|0|0',0,0,NULL,0),(57,9,'2016-03-21 15:13:56','dad','<p>sadds@@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> ykddsada</p>','9|5|5',NULL,'9|ykd|dad|<p>sadds@@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> ykddsada</p>|2016-03-21|0|0',0,0,NULL,0),(58,10,'2016-03-21 23:36:38','测试发帖','<p>我是王俊杰</p>','10|5|5',NULL,'10|王俊杰|测试发帖|<p>我是王俊杰</p>|2016-03-21|0|0',0,0,NULL,0),(59,10,'2016-03-21 23:37:12','','<p>123</p>',NULL,NULL,'王俊杰',0,0,NULL,2),(66,10,'2016-03-21 23:42:08','测试发帖','<p>@</p>','10|5|5',NULL,'10|王俊杰|测试发帖|<p>@</p>|2016-03-21|0|0',0,0,NULL,0),(68,5,'2016-03-25 22:15:50','@功能越来越完善了','<p>​<a>@ykd&nbsp;</a>&nbsp;佳夫凯迪你们快看</end></p>','5',NULL,'5|吴行行|@功能越来越完善了|<p>​@<!--<start--> ykd<end>&nbsp;佳夫凯迪你们快看</end></p>|2016-03-25|0|0',0,0,NULL,0),(69,5,'2016-03-25 22:18:52','eqw','<p>​qweqw@</p>','5',NULL,'5|吴行行|eqw|<p>​qweqw@</p>|2016-03-25|0|0',0,0,NULL,0),(70,5,'2016-03-25 23:11:01','','<p>新排版之后测试回帖</p>',NULL,NULL,'吴行行',0,0,'84',1),(71,5,'2016-03-26 12:55:57','@自己能不能行','<p>​<a>@吴行行&nbsp;</a><a>@吴行行1&nbsp;</a>&nbsp;</end></p>','5','5','5|吴行行|@自己能不能行|<p>​@<!--<start--> 吴行行@ 吴行行1<end>&nbsp;</end></p>|2016-03-26|0|0',0,0,'72',0),(72,5,'2016-03-26 12:56:29','','<p>回复自己能不能行</p>',NULL,NULL,'吴行行',0,0,NULL,1),(74,5,'2016-03-26 21:11:18','新功能','<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;新功能耶！</end></p>','5',NULL,'5|吴行行|新功能|<p>​@<!--<start--> test@ ykd<end>&nbsp;新功能耶！</end></p>|2016-03-26|0|0',0,0,NULL,0),(81,5,'2016-03-27 00:27:42','快来看发帖动画','<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;快试试动画效果</end></p>','5|9|2',NULL,'5|吴行行|快来看发帖动画|<p>​@<!--<start--> test@ ykd<end>&nbsp;快试试动画效果</end></p>|2016-03-27|0|0',0,0,'82',0),(82,9,'2016-03-27 20:25:08','','<p>我看到啦！！！！！</p>',NULL,NULL,'ykd',0,0,NULL,1),(84,9,'2016-03-27 20:27:40','','<p>排版不错!</p>',NULL,NULL,'ykd',0,0,NULL,2),(85,5,'2016-04-12 20:04:15','31232131','<p>​412421421</p>','5',NULL,'5|吴行行|31232131|<p>​412421421</p>|2016-04-12|0|0',0,0,NULL,0),(86,5,'2016-04-12 20:04:59','412421','<p>​412412421</p>','5',NULL,'5|吴行行|412421|<p>​412412421</p>|2016-04-12|0|0',0,0,'87',0),(87,5,'2016-04-12 20:05:19','','<p>321321213</p>',NULL,NULL,'吴行行',0,0,NULL,1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remind`
--

DROP TABLE IF EXISTS `remind`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remind` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `reminded` text COLLATE utf8_unicode_ci NOT NULL COMMENT ' reminded{remindedPostId:[remindManId1:remindPostId1,remindManId2:remindPostId2,...]……} ',
  `replyedOfA` text COLLATE utf8_unicode_ci COMMENT 'replyedOfA{replyedPostId:[replyManId1:replyPostId1,replyManId2:replyId2,...],...}',
  `replyedOfB` text COLLATE utf8_unicode_ci COMMENT 'replyedOfB{replyedPostId:[replyManId1:replyPostId1,replyManId2:replyId2,...],...}',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remind`
--

LOCK TABLES `remind` WRITE;
/*!40000 ALTER TABLE `remind` DISABLE KEYS */;
INSERT INTO `remind` VALUES ('吴行行',5,'','',''),('test',6,';74:[5:74];75:[5:75];81:[5:81]',NULL,NULL),('吴行行1',8,';71:[5:71]',NULL,NULL),('ykd',9,';57:[9:57];66:[10:66];67:[5:67];68:[5:68];74:[5:74];75:[5:75,5:75,5:75];81:[5:81]',';24:[5:70];24:[5:79]',NULL);
/*!40000 ALTER TABLE `remind` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentbasicinformation`
--

DROP TABLE IF EXISTS `studentbasicinformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentbasicinformation` (
  `id` int(11) NOT NULL,
  `school` varchar(45) DEFAULT 'None',
  `schoolid` varchar(45) DEFAULT NULL,
  `chname` varchar(45) DEFAULT NULL,
  `enname` varchar(45) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `verify` varchar(5) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentbasicinformation`
--

LOCK TABLES `studentbasicinformation` WRITE;
/*!40000 ALTER TABLE `studentbasicinformation` DISABLE KEYS */;
INSERT INTO `studentbasicinformation` VALUES (1,'None',NULL,NULL,NULL,'femal',NULL,'N'),(2,'Tsinghua','2014000000','学生','default student','male','120','N'),(3,'Tsinghua','2014000000','机器人','Robot Student','male','123456','N');
/*!40000 ALTER TABLE `studentbasicinformation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `authKey` varchar(45) NOT NULL DEFAULT '',
  `accessToken` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `type` varchar(45) NOT NULL DEFAULT 'Student',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Teacher','8ab7bbdf01a24e988c50c4cfe9557814','','','','Teacher'),(2,'Student','f5c0a1c9384c2e25e79ba1abf5d9a037','','','student@mails.tsinghua.edu.cn','Student'),(3,'RobotStudent','2e4a1167ef74ccb04890d01da97602c7','','','robotstudent@mail.tsinghua.edu.cn','Student'),(4,'陈光斌','e10adc3949ba59abbe56e057f20f883e','','','cgb14@mails.tsinghua.edu.cn','Student'),(5,'吴行行','e807f1fcf82d132f9bb018ca6738a19f','','','wuxx14@mails.tsinghua.edu.cn','Student'),(6,'test','e10adc3949ba59abbe56e057f20f883e','','','123@dwq.com','Student'),(7,'test2','e10adc3949ba59abbe56e057f20f883e','','','213@da.com','Student'),(8,'吴行行1','e10adc3949ba59abbe56e057f20f883e','','','12@312.com','Student'),(9,'ykd','e10adc3949ba59abbe56e057f20f883e','','','123@qq.com','Student'),(10,'王俊杰','e10adc3949ba59abbe56e057f20f883e','','','tfdatr@csiscs.sasda','Student');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wiki`
--

DROP TABLE IF EXISTS `wiki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wiki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `detail` text,
  `favor` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`title`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wiki`
--

LOCK TABLES `wiki` WRITE;
/*!40000 ALTER TABLE `wiki` DISABLE KEYS */;
INSERT INTO `wiki` VALUES (5,'2','Hestia','女神;罗马神话','<希神>赫斯提; （女灶神，罗马神话中称为Vesta）',2),(18,'2','Test','test;    debug;','tst',0),(19,'2','dog','animal;动物;','狗，一种动物',0),(20,'2','cat','animal;动物;','猫，一种动物',0),(21,'2','bird','animal;动物;','鸟，一种动物',3),(22,'2','sheep','animal;动物;','绵羊，一种动物',0),(23,'2','horse','animal;动物;','马，一种动物',0),(24,'2','tiger','animal;动物;','老虎，一种动物',0),(25,'2','ant','昆虫;insect;','蚂蚁，一种昆虫',0),(26,'2','butterfly','insect;昆虫','蝴蝶，一种昆虫？',0),(27,'2','snake','动物;animal','蛇，一种动物',1);
/*!40000 ALTER TABLE `wiki` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-01 21:34:23
