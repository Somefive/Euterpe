/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50628
Source Host           : localhost:3306
Source Database       : euterpe

Target Server Type    : MYSQL
Target Server Version : 50628
File Encoding         : 65001

Date: 2016-04-02 15:39:49
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
-- Table structure for `discussion`
-- ----------------------------
DROP TABLE IF EXISTS `discussion`;
CREATE TABLE `discussion` (
  `stuname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of discussion
-- ----------------------------
INSERT INTO `discussion` VALUES ('未嫁父', 'question', 'hahahaah', null);
INSERT INTO `discussion` VALUES ('未嫁父', 'question', '哈哈哈', '哈哈哈哈哈哈哈哈哈哈哈哈');

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
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('89', '5', '2016-04-02 15:35:36', '18', '<p>​</p>', '5', null, '5|吴行行|18|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('90', '5', '2016-04-02 15:35:42', '17', '<p>​</p>', '5', null, '5|吴行行|17|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('91', '5', '2016-04-02 15:35:52', '16', '<p>​</p>', '5', null, '5|吴行行|16|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('92', '5', '2016-04-02 15:36:08', '15', '<p>​</p>', '5', null, '5|吴行行|15|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('93', '5', '2016-04-02 15:36:14', '14', '<p>​</p>', '5', null, '5|吴行行|14|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('94', '5', '2016-04-02 15:36:21', '13', '<p>​</p>', '5', null, '5|吴行行|13|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('95', '5', '2016-04-02 15:36:27', '12', '<p>​</p>', '5', null, '5|吴行行|12|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('96', '5', '2016-04-02 15:36:32', '11', '<p>​</p>', '5', null, '5|吴行行|11|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('97', '5', '2016-04-02 15:36:40', '10', '<p>​</p>', '5', null, '5|吴行行|10|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('98', '5', '2016-04-02 15:36:51', '9', '<p>​</p>', '5', null, '5|吴行行|9|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('99', '5', '2016-04-02 15:37:02', '8', '<p>​</p>', '5', null, '5|吴行行|8|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('100', '5', '2016-04-02 15:37:08', '7', '<p>​</p>', '5', null, '5|吴行行|7|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('101', '5', '2016-04-02 15:37:17', '6', '<p>​</p>', '5', null, '5|吴行行|6|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('102', '5', '2016-04-02 15:37:25', '5', '<p>​</p>', '5', null, '5|吴行行|5|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('103', '5', '2016-04-02 15:37:33', '4', '<p>​</p>', '5', null, '5|吴行行|4|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('104', '5', '2016-04-02 15:37:41', '3', '<p>​</p>', '5', null, '5|吴行行|3|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('105', '5', '2016-04-02 15:37:51', '2', '<p>​</p>', '5', null, '5|吴行行|2|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('106', '5', '2016-04-02 15:37:57', '1', '<p>​</p>', '5', null, '5|吴行行|1|<p>​</p>|2016-04-02|0|0', '0', '0', null, '0');

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
INSERT INTO `remind` VALUES ('RobotStudent', '3', ';85:[5:85]', null, null);
INSERT INTO `remind` VALUES ('陈光斌', '4', ';85:[5:85]', null, null);
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
