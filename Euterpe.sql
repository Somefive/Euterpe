<<<<<<< HEAD
/*
Navicat MySQL Data Transfer
=======
-- MySQL dump 10.13  Distrib 5.6.27, for Win64 (x86_64)
--
-- Host: localhost    Database: Euterpe
-- ------------------------------------------------------
-- Server version	5.6.27
>>>>>>> 454db6e40e88415158af1086396055700c9d2a47

Source Server         : localhost_3306
Source Server Version : 50628
Source Host           : localhost:3306
Source Database       : euterpe

Target Server Type    : MYSQL
Target Server Version : 50628
File Encoding         : 65001

Date: 2016-04-07 01:17:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `composition`
-- ----------------------------
DROP TABLE IF EXISTS `composition`;
CREATE TABLE `composition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT '0',
  `title` varchar(80) DEFAULT 'Title',
  `content` longtext,
  `status` varchar(45) DEFAULT 'Unfinished',
  `score` int(11) DEFAULT '0',
  `remark` longtext,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of composition
-- ----------------------------

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', 'TestCourse', 'This course is opened for backend test.');
INSERT INTO `course` VALUES ('2', 'AnotherTestCourse', 'Another course opened for test.');
INSERT INTO `course` VALUES ('3', 'NewCourse', 'Hello World');

-- ----------------------------
-- Table structure for `courseenrollment`
-- ----------------------------
DROP TABLE IF EXISTS `courseenrollment`;
CREATE TABLE `courseenrollment` (
  `courseid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of courseenrollment
-- ----------------------------
INSERT INTO `courseenrollment` VALUES ('1', '2', '0000-00-00');
INSERT INTO `courseenrollment` VALUES ('2', '2', null);
INSERT INTO `courseenrollment` VALUES ('1', '1', null);
INSERT INTO `courseenrollment` VALUES ('1', '4', null);
INSERT INTO `courseenrollment` VALUES ('1', '5', null);
INSERT INTO `courseenrollment` VALUES ('1', '9', null);
INSERT INTO `courseenrollment` VALUES ('1', '6', null);
INSERT INTO `courseenrollment` VALUES ('2', '6', null);
INSERT INTO `courseenrollment` VALUES ('3', '6', null);
INSERT INTO `courseenrollment` VALUES ('1', '10', null);

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
<<<<<<< HEAD
=======
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (22,5,'2016-03-08 21:09:43','','<p>会不会递增呀好伤心。</p><p>下面是乱写的。。。</p><p>123456</p>','5','9','吴行行',0,0,'49|50|59',1),(24,9,'2016-03-08 21:20:30','第4个帖子','<p>为啥写这个帖子，不知道</p>','9|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|6|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|10|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5','1|5','9|ykd|第4个帖子|<p>为啥写这个帖子，不知道</p>|2016-03-08|1|2',1,2,'22|43|44|45|70',0),(26,5,'2016-03-08 22:49:17','再来一个帖子','<ul><li>能够看到滚动条的效果了！好开心好开心！<a href=\"http://localhost:8080/course/discussion/discussion\">我的地址！</a></li></ul>','5|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9','1|2|9','5|吴行行|再来一个帖子|<ul><li>能够看到滚动条的效果了！好开心好开心！<a href=\"http://localhost:8080/course/discussion/discussion\">我的地址！</a></li></ul>|2016-03-08|0|2',0,2,'46',0),(33,5,'2016-03-10 20:53:32','123','<p>测试发帖！好紧张！！！！</p>','5',NULL,'5|吴行行|das|<p>呵呵呵呵</p>|2016-03-09|1|2',1,2,NULL,1),(37,9,'2016-03-11 10:12:11','╭(╯^╰)╮','<p>╭(╯^╰)╮</p>','9|5|5|5|5','9','9|ykd|╭(╯^╰)╮|<p>╭(╯^╰)╮</p>|2016-03-11|1|0',1,0,NULL,0),(38,9,'2016-03-11 13:06:36','对自己匿名？','<p style=\"margin-left: 20px;\">RT</p>','9|5|5|5|5|2',NULL,'9|ykd|对自己匿名？|<p style=\"margin-left: 20px;\">RT</p>|2016-03-11|1|0',1,0,NULL,0),(39,9,'2016-03-11 16:02:46','屏蔽能实现吗？','<p>RT测试</p>','9|5|5|5|5|5|5|5|2',NULL,'9|ykd|屏蔽能实现吗？|<p>RT测试</p>|2016-03-11|0|0',0,0,NULL,0),(40,9,'2016-03-11 16:03:58','重新测试','<p>╭(╯^╰)╮</p>','9|5|5|2',NULL,'9|ykd|重新测试|<p>╭(╯^╰)╮</p>|2016-03-11|0|0',0,0,NULL,0),(42,9,'2016-03-11 16:05:57','重新测试','<p>╭(╯^╰)╮</p>','9|5|5|5|5',NULL,'9|ykd|重新测试|<p>╭(╯^╰)╮</p>|2016-03-11|0|2',0,2,NULL,0),(43,9,'2016-03-11 16:16:18','','<p>回复的帖子咋看不到呢？？</p>',NULL,NULL,'ykd',0,0,NULL,1),(44,5,'2016-03-12 17:02:42','','<p>回复第四个帖子！</p>',NULL,NULL,'吴行行',0,0,NULL,1),(45,5,'2016-03-13 00:09:53','','<p>我要回帖！能不能显示呀！我在测试回帖的显示!</p>',NULL,NULL,'吴行行',0,0,NULL,1),(46,5,'2016-03-13 00:16:53','','<p>要保证每个帖子都有回帖！我瞎说的...</p>',NULL,NULL,'吴行行',0,0,NULL,1),(49,5,'2016-03-17 23:07:18','','<p>测试气泡,测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></p>',NULL,NULL,'吴行行',0,0,NULL,2),(50,5,'2016-03-17 23:18:04','','<p>接下来还要测试气泡！测试气泡！怎么选一个好的颜色呀！</p>',NULL,NULL,'吴行行',0,0,NULL,2),(52,5,'2016-03-21 13:10:16','测试@','<p>hello！@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> 吴行行</p>','5',NULL,'5|吴行行|测试@|<p>hello！@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> 吴行行</p>|2016-03-21|0|0',0,0,NULL,0),(57,9,'2016-03-21 15:13:56','dad','<p>sadds@@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> ykddsada</p>','9|5|5',NULL,'9|ykd|dad|<p>sadds@@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> ykddsada</p>|2016-03-21|0|0',0,0,NULL,0),(58,10,'2016-03-21 23:36:38','测试发帖','<p>我是王俊杰</p>','10|5|5',NULL,'10|王俊杰|测试发帖|<p>我是王俊杰</p>|2016-03-21|0|0',0,0,NULL,0),(59,10,'2016-03-21 23:37:12','','<p>123</p>',NULL,NULL,'王俊杰',0,0,NULL,2),(66,10,'2016-03-21 23:42:08','测试发帖','<p>@</p>','10|5|5',NULL,'10|王俊杰|测试发帖|<p>@</p>|2016-03-21|0|0',0,0,NULL,0),(68,5,'2016-03-25 22:15:50','@功能越来越完善了','<p>​<a>@ykd&nbsp;</a>&nbsp;佳夫凯迪你们快看</end></p>','5',NULL,'5|吴行行|@功能越来越完善了|<p>​@<!--<start--> ykd<end>&nbsp;佳夫凯迪你们快看</end></p>|2016-03-25|0|0',0,0,NULL,0),(69,5,'2016-03-25 22:18:52','eqw','<p>​qweqw@</p>','5',NULL,'5|吴行行|eqw|<p>​qweqw@</p>|2016-03-25|0|0',0,0,NULL,0),(70,5,'2016-03-25 23:11:01','','<p>新排版之后测试回帖</p>',NULL,NULL,'吴行行',0,0,'84',1),(71,5,'2016-03-26 12:55:57','@自己能不能行','<p>​<a>@吴行行&nbsp;</a><a>@吴行行1&nbsp;</a>&nbsp;</end></p>','5','5','5|吴行行|@自己能不能行|<p>​@<!--<start--> 吴行行@ 吴行行1<end>&nbsp;</end></p>|2016-03-26|0|0',0,0,'72',0),(72,5,'2016-03-26 12:56:29','','<p>回复自己能不能行</p>',NULL,NULL,'吴行行',0,0,NULL,1),(74,5,'2016-03-26 21:11:18','新功能','<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;新功能耶！</end></p>','5',NULL,'5|吴行行|新功能|<p>​@<!--<start--> test@ ykd<end>&nbsp;新功能耶！</end></p>|2016-03-26|0|0',0,0,NULL,0),(75,5,'2016-03-26 22:05:27','规整','<p>​1344<a>@ykd&nbsp;</a>&nbsp;<a>@ykd&nbsp;</a><a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;</end></p>','5',NULL,'5|吴行行|规整|<p>​1344@<!--<start--> ykd<end>&nbsp;@</end><!--<start--> ykd@ test@ ykd<end>&nbsp;</end></p>|2016-03-26|0|0',0,0,NULL,0),(81,5,'2016-03-27 00:27:42','快来看发帖动画','<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;快试试动画效果</end></p>','5|9|2',NULL,'5|吴行行|快来看发帖动画|<p>​@<!--<start--> test@ ykd<end>&nbsp;快试试动画效果</end></p>|2016-03-27|0|0',0,0,'82',0),(82,9,'2016-03-27 20:25:08','','<p>我看到啦！！！！！</p>',NULL,NULL,'ykd',0,0,NULL,1),(83,9,'2016-03-27 20:25:37','测试@提醒','<p><a>@吴行行&nbsp;</a>&nbsp;能收到吗</end></p>','9|5|5|2',NULL,'9|ykd|测试@提醒|<p>@<!--<start--> 吴行行<end>&nbsp;能收到吗</end></p>|2016-03-27|0|0',0,0,NULL,0),(84,9,'2016-03-27 20:27:40','','<p>排版不错!</p>',NULL,NULL,'ykd',0,0,NULL,2);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remind`
--
>>>>>>> 454db6e40e88415158af1086396055700c9d2a47

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('22', '5', '2016-03-08 21:09:43', '', '<p>会不会递增呀好伤心。</p><p>下面是乱写的。。。</p><p>123456</p>', '5', '9', '吴行行', '0', '0', '49|50|59', '1');
INSERT INTO `post` VALUES ('24', '9', '2016-03-08 21:20:30', '第4个帖子', '<p>为啥写这个帖子，不知道</p>', '9|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|6|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|10|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5', '1|5', '9|ykd|第4个帖子|<p>为啥写这个帖子，不知道</p>|2016-03-08|1|2', '1', '2', '22|43|44|45|70', '0');
INSERT INTO `post` VALUES ('33', '5', '2016-03-10 20:53:32', '123', '<p>测试发帖！好紧张！！！！</p>', '5', null, '5|吴行行|das|<p>呵呵呵呵</p>|2016-03-09|1|2', '1', '2', null, '1');
INSERT INTO `post` VALUES ('37', '9', '2016-03-11 10:12:11', '╭(╯^╰)╮', '<p>╭(╯^╰)╮</p>', '9|5|5|5|5', '9', '9|ykd|╭(╯^╰)╮|<p>╭(╯^╰)╮</p>|2016-03-11|1|0', '1', '0', null, '0');
INSERT INTO `post` VALUES ('38', '9', '2016-03-11 13:06:36', '对自己匿名？', '<p style=\"margin-left: 20px;\">RT</p>', '9|5|5|5|5|2', null, '9|ykd|对自己匿名？|<p style=\"margin-left: 20px;\">RT</p>|2016-03-11|1|0', '1', '0', null, '0');
INSERT INTO `post` VALUES ('39', '9', '2016-03-11 16:02:46', '屏蔽能实现吗？', '<p>RT测试</p>', '9|5|5|5|5|5|5|5|2', null, '9|ykd|屏蔽能实现吗？|<p>RT测试</p>|2016-03-11|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('40', '9', '2016-03-11 16:03:58', '重新测试', '<p>╭(╯^╰)╮</p>', '9|5|5|2', null, '9|ykd|重新测试|<p>╭(╯^╰)╮</p>|2016-03-11|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('42', '9', '2016-03-11 16:05:57', '重新测试', '<p>╭(╯^╰)╮</p>', '9|5|5|5|5', null, '9|ykd|重新测试|<p>╭(╯^╰)╮</p>|2016-03-11|0|2', '0', '2', null, '0');
INSERT INTO `post` VALUES ('43', '9', '2016-03-11 16:16:18', '', '<p>回复的帖子咋看不到呢？？</p>', null, null, 'ykd', '0', '0', null, '1');
INSERT INTO `post` VALUES ('44', '5', '2016-03-12 17:02:42', '', '<p>回复第四个帖子！</p>', null, null, '吴行行', '0', '0', null, '1');
INSERT INTO `post` VALUES ('45', '5', '2016-03-13 00:09:53', '', '<p>我要回帖！能不能显示呀！我在测试回帖的显示!</p>', null, null, '吴行行', '0', '0', null, '1');
INSERT INTO `post` VALUES ('49', '5', '2016-03-17 23:07:18', '', '<p>测试气泡,测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\">测试气泡,<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></p>', null, null, '吴行行', '0', '0', null, '2');
INSERT INTO `post` VALUES ('50', '5', '2016-03-17 23:18:04', '', '<p>接下来还要测试气泡！测试气泡！怎么选一个好的颜色呀！</p>', null, null, '吴行行', '0', '0', null, '2');
INSERT INTO `post` VALUES ('52', '5', '2016-03-21 13:10:16', '测试@', '<p>hello！@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> 吴行行</p>', '5', null, '5|吴行行|测试@|<p>hello！@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> 吴行行</p>|2016-03-21|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('57', '9', '2016-03-21 15:13:56', 'dad', '<p>sadds@@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> ykddsada</p>', '9|5|5', null, '9|ykd|dad|<p>sadds@@<!--<strong data-verified=\'redactor\' data-redactor-tag=\'strong\'--> ykddsada</p>|2016-03-21|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('58', '10', '2016-03-21 23:36:38', '测试发帖', '<p>我是王俊杰</p>', '10|5|5', null, '10|王俊杰|测试发帖|<p>我是王俊杰</p>|2016-03-21|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('59', '10', '2016-03-21 23:37:12', '', '<p>123</p>', null, null, '王俊杰', '0', '0', null, '2');
INSERT INTO `post` VALUES ('66', '10', '2016-03-21 23:42:08', '测试发帖', '<p>@</p>', '10|5|5', null, '10|王俊杰|测试发帖|<p>@</p>|2016-03-21|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('68', '5', '2016-03-25 22:15:50', '@功能越来越完善了', '<p>​<a>@ykd&nbsp;</a>&nbsp;佳夫凯迪你们快看</end></p>', '5', null, '5|吴行行|@功能越来越完善了|<p>​@<!--<start--> ykd<end>&nbsp;佳夫凯迪你们快看</end></p>|2016-03-25|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('69', '5', '2016-03-25 22:18:52', 'eqw', '<p>​qweqw@</p>', '5', null, '5|吴行行|eqw|<p>​qweqw@</p>|2016-03-25|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('70', '5', '2016-03-25 23:11:01', '', '<p>新排版之后测试回帖</p>', null, null, '吴行行', '0', '0', '84', '1');
INSERT INTO `post` VALUES ('71', '5', '2016-03-26 12:55:57', '@自己能不能行', '<p>​<a>@吴行行&nbsp;</a><a>@吴行行1&nbsp;</a>&nbsp;</end></p>', '5', '5', '5|吴行行|@自己能不能行|<p>​@<!--<start--> 吴行行@ 吴行行1<end>&nbsp;</end></p>|2016-03-26|0|0', '0', '0', '72', '0');
INSERT INTO `post` VALUES ('72', '5', '2016-03-26 12:56:29', '', '<p>回复自己能不能行</p>', null, null, '吴行行', '0', '0', null, '1');
INSERT INTO `post` VALUES ('74', '5', '2016-03-26 21:11:18', '新功能', '<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;新功能耶！</end></p>', '5', null, '5|吴行行|新功能|<p>​@<!--<start--> test@ ykd<end>&nbsp;新功能耶！</end></p>|2016-03-26|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('75', '5', '2016-03-26 22:05:27', '规整', '<p>​1344<a>@ykd&nbsp;</a>&nbsp;<a>@ykd&nbsp;</a><a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;</end></p>', '5', null, '5|吴行行|规整|<p>​1344@<!--<start--> ykd<end>&nbsp;@</end><!--<start--> ykd@ test@ ykd<end>&nbsp;</end></p>|2016-03-26|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('81', '5', '2016-03-27 00:27:42', '快来看发帖动画', '<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;快试试动画效果</end></p>', '5|9|2', null, '5|吴行行|快来看发帖动画|<p>​@<!--<start--> test@ ykd<end>&nbsp;快试试动画效果</end></p>|2016-03-27|0|0', '0', '0', '82', '0');
INSERT INTO `post` VALUES ('82', '9', '2016-03-27 20:25:08', '', '<p>我看到啦！！！！！</p>', null, null, 'ykd', '0', '0', null, '1');
INSERT INTO `post` VALUES ('83', '9', '2016-03-27 20:25:37', '测试@提醒', '<p><a>@吴行行&nbsp;</a>&nbsp;能收到吗</end></p>', '9|5|5', null, '9|ykd|测试@提醒|<p>@<!--<start--> 吴行行<end>&nbsp;能收到吗</end></p>|2016-03-27|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('84', '9', '2016-03-27 20:27:40', '', '<p>排版不错!</p>', null, null, 'ykd', '0', '0', null, '2');

-- ----------------------------
-- Table structure for `remind`
-- ----------------------------
DROP TABLE IF EXISTS `remind`;
CREATE TABLE `remind` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `reminded` text COLLATE utf8_unicode_ci NOT NULL COMMENT ' reminded{remindedPostId:[remindManId1:remindPostId1,remindManId2:remindPostId2,...]……} ',
  `replyedOfA` text COLLATE utf8_unicode_ci COMMENT 'replyedOfA{replyedPostId:[replyManId1:replyPostId1,replyManId2:replyId2,...],...}',
  `replyedOfB` text COLLATE utf8_unicode_ci COMMENT 'replyedOfB{replyedPostId:[replyManId1:replyPostId1,replyManId2:replyId2,...],...}',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of remind
-- ----------------------------
INSERT INTO `remind` VALUES ('吴行行', '5', '', '', '');
INSERT INTO `remind` VALUES ('test', '6', ';74:[5:74];75:[5:75];81:[5:81]', null, null);
INSERT INTO `remind` VALUES ('吴行行1', '8', ';71:[5:71]', null, null);
INSERT INTO `remind` VALUES ('ykd', '9', ';57:[9:57];66:[10:66];67:[5:67];68:[5:68];74:[5:74];75:[5:75,5:75,5:75];81:[5:81]', ';24:[5:70];24:[5:79]', null);

-- ----------------------------
-- Table structure for `studentbasicinformation`
-- ----------------------------
DROP TABLE IF EXISTS `studentbasicinformation`;
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

-- ----------------------------
-- Records of studentbasicinformation
-- ----------------------------
INSERT INTO `studentbasicinformation` VALUES ('1', 'None', null, null, null, 'femal', null, 'N');
INSERT INTO `studentbasicinformation` VALUES ('2', 'Tsinghua', '2014000000', '学生', 'default student', 'male', '120', 'N');
INSERT INTO `studentbasicinformation` VALUES ('3', 'Tsinghua', '2014000000', '机器人', 'Robot Student', 'male', '123456', 'N');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
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

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Teacher', '8ab7bbdf01a24e988c50c4cfe9557814', '', '', '', 'Teacher');
INSERT INTO `user` VALUES ('2', 'Student', 'f5c0a1c9384c2e25e79ba1abf5d9a037', '', '', 'student@mails.tsinghua.edu.cn', 'Student');
INSERT INTO `user` VALUES ('3', 'RobotStudent', '2e4a1167ef74ccb04890d01da97602c7', '', '', 'robotstudent@mail.tsinghua.edu.cn', 'Student');
INSERT INTO `user` VALUES ('4', '陈光斌', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'cgb14@mails.tsinghua.edu.cn', 'Student');
INSERT INTO `user` VALUES ('5', '吴行行', 'e807f1fcf82d132f9bb018ca6738a19f', '', '', 'wuxx14@mails.tsinghua.edu.cn', 'Student');
INSERT INTO `user` VALUES ('6', 'test', 'e10adc3949ba59abbe56e057f20f883e', '', '', '123@dwq.com', 'Student');
INSERT INTO `user` VALUES ('7', 'test2', 'e10adc3949ba59abbe56e057f20f883e', '', '', '213@da.com', 'Student');
INSERT INTO `user` VALUES ('8', '吴行行1', 'e10adc3949ba59abbe56e057f20f883e', '', '', '12@312.com', 'Student');
INSERT INTO `user` VALUES ('9', 'ykd', 'e10adc3949ba59abbe56e057f20f883e', '', '', '123@qq.com', 'Student');
INSERT INTO `user` VALUES ('10', '王俊杰', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'tfdatr@csiscs.sasda', 'Student');

-- ----------------------------
-- Table structure for `wiki`
-- ----------------------------
DROP TABLE IF EXISTS `wiki`;
CREATE TABLE `wiki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `detail` text,
  `favor` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`title`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
<<<<<<< HEAD

-- ----------------------------
-- Records of wiki
-- ----------------------------
INSERT INTO `wiki` VALUES ('4', '2', 'Euterpe', '希腊神话;女神', '司音乐及抒情诗的女神');
INSERT INTO `wiki` VALUES ('5', '2', 'Hestia', '希腊神话;女神', '<希神>赫斯提; （女灶神，罗马神话中称为Vesta）');
INSERT INTO `wiki` VALUES ('18', '2', 'Test', 'test;    debug;', 'tst');
=======
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wiki`
--

LOCK TABLES `wiki` WRITE;
/*!40000 ALTER TABLE `wiki` DISABLE KEYS */;
INSERT INTO `wiki` VALUES (4,'2','Euterpe','希腊神话;女神','司音乐及抒情诗的女神',0),(5,'2','Hestia','希腊神话;女神','<希神>赫斯提; （女灶神，罗马神话中称为Vesta）',8),(18,'2','Test','test;    debug;','tst',4);
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

-- Dump completed on 2016-04-07 23:13:20
>>>>>>> 454db6e40e88415158af1086396055700c9d2a47
