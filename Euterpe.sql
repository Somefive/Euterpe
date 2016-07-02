/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : euterpe

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2016-07-02 15:07:39
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
  `date` timestamp NULL DEFAULT NULL,
  `model` varchar(20) DEFAULT 'None',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of composition
-- ----------------------------
INSERT INTO `composition` VALUES ('9', '2', '1', 'NewComposition', '\n<!--            <span class=\"composer-normal\">Normal</span>-->\n<!--            <span class=\"composer-history\" title=\"history\"></span>-->\n<!--            <span class=\"composer-note\" title=\"note\"></span>-->\n<!--            <span class=\"composer-comment\" title=\"comment\"></span>-->\n            \n            <span class=\"composer-normal\">Normal</span>\n            <span class=\"composer-history glyphicon glyphicon-time\" title=\"\" contenteditable=\"false\" data-toggle=\"tooltip\" data-placement=\"top\" style=\"display: none;\" data-original-title=\"history\"></span>\n            <span class=\"composer-note glyphicon glyphicon-edit\" title=\"\" contenteditable=\"false\" data-toggle=\"tooltip\" data-placement=\"top\" style=\"display: none;\" data-original-title=\"note\"></span>\n            <span class=\"composer-comment glyphicon glyphicon-list-alt\" title=\"\" contenteditable=\"false\" data-toggle=\"tooltip\" data-placement=\"top\" style=\"display: none;\" data-original-title=\"comment\"></span>\n                ', 'Todo', '0', 'nothing', '2016-05-24 10:53:03', 'None');
INSERT INTO `composition` VALUES ('10', '2', '1', 'Weekly Journal of Learning 11', '<div>This week on class we mainly talked about film music. Film music is one kind of music that often appears with images so some famous music can always easily construct some scene in the audience mind and remind audience of the film plot which actually extends the power of a simple piece of music.</div><div>As an important part of a film, the functions of music can diversify from rendering atmosphere to characterizing some figures. In the class, we listened to the main theme music of the famous adventurous movie - Raiders of the Lost Ark - The Raiders March. This music is obviously able to ignite audience\'s desire to follow the main character\'s footstep and start their adventure in their own inner world. However, while the opening part plays an important role to lead the audience into the plot, the middle part helps construct the film scene. It expands the audience\'s imagination and locate it in the specific place where the story takes place.</div><div>What is interesting is that when film music firstly developed at early 19th century, it functions only as a background to silent film. At first, it is said that the image and the music cannot conform to each other. Later, musicians improved it because they found it\'s important to make the background music and the front image coordinate with each other. Today, music means more. Few great works can work without excellent music.</div>', 'Completed', '0', 'very very very good essay. You shouldn\'t miss it!!!!!', '2016-05-24 10:59:01', 'True');

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
-- Table structure for `courseware`
-- ----------------------------
DROP TABLE IF EXISTS `courseware`;
CREATE TABLE `courseware` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `readTime` text COLLATE utf8_unicode_ci,
  `quizzId` int(11) DEFAULT NULL,
  `uploadTime` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of courseware
-- ----------------------------
INSERT INTO `courseware` VALUES ('1', 'slide04_5385', null, null, 'April 13,2016');
INSERT INTO `courseware` VALUES ('2', 'slide04_53885', null, null, 'April 13,2016');
INSERT INTO `courseware` VALUES ('3', 'Solutions for Q3', null, null, 'April 13,2016');
INSERT INTO `courseware` VALUES ('7', 'Chapter 11', null, null, 'April 13,2016');
INSERT INTO `courseware` VALUES ('8', 'Chapter 12', null, null, 'April 13,2016');

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
-- Table structure for `objectivequiz`
-- ----------------------------
DROP TABLE IF EXISTS `objectivequiz`;
CREATE TABLE `objectivequiz` (
  `quizId` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL COMMENT '对应提交的quizid',
  `order` int(11) NOT NULL COMMENT '题号',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'A:...;B:...;',
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `rightStudent` text COLLATE utf8_unicode_ci COMMENT 'id',
  `wrongStudent` text COLLATE utf8_unicode_ci COMMENT 'id:answers;',
  PRIMARY KEY (`quizId`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of objectivequiz
-- ----------------------------
INSERT INTO `objectivequiz` VALUES ('59', '165', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('60', '165', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('61', '166', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('62', '166', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('63', '167', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('64', '167', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('65', '168', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('66', '168', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('67', '169', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('68', '169', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('69', '170', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('70', '170', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('71', '171', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('72', '171', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('73', '172', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('74', '172', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('75', '173', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('76', '173', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('77', '174', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('78', '174', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('79', '175', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('80', '175', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('81', '176', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('82', '176', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('83', '177', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('84', '177', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('85', '178', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('86', '178', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('87', '179', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('88', '179', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('89', '180', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('90', '180', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('91', '181', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('92', '181', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('93', '182', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('94', '182', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('95', '183', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('96', '183', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('97', '184', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('98', '184', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('99', '185', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('100', '185', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('101', '186', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('102', '186', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('103', '187', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('104', '187', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('105', '188', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('106', '188', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('107', '189', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('108', '189', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('109', '190', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('110', '190', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('111', '191', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('112', '191', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('113', '192', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('114', '192', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('115', '193', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('116', '193', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('117', '194', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('118', '194', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('119', '195', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('120', '195', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('121', '196', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('122', '196', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('123', '197', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('124', '197', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('125', '198', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('126', '198', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('127', '199', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('128', '199', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('129', '200', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('130', '200', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('131', '201', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('132', '201', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('133', '202', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('134', '202', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('135', '203', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('136', '203', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('137', '204', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('138', '204', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('139', '205', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('140', '205', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('141', '206', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('142', '206', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('143', '207', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('144', '207', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('22', '5', '2016-03-08 21:09:43', '', '<p>会不会递增呀好伤心。</p><p>下面是乱写的。。。</p><p>123456</p>', '5', '9', '吴行行', '0', '0', '49|50|59', '1');
INSERT INTO `post` VALUES ('24', '9', '2016-03-08 21:20:30', '第4个帖子', '<p>为啥写这个帖子，不知道</p>', '9|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|6|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|10|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5|5', '1|5', '9|ykd|第4个帖子|<p>为啥写这个帖子，不知道</p>|2016-03-08|1|2', '1', '2', '22|43|44|45|70', '0');
INSERT INTO `post` VALUES ('33', '5', '2016-03-10 20:53:32', '123', '<p>测试发帖！好紧张！！！！</p>', '5', null, '5|吴行行|das|<p>呵呵呵呵</p>|2016-03-09|1|2', '1', '2', null, '1');
INSERT INTO `post` VALUES ('37', '9', '2016-03-11 10:12:11', '╭(╯^╰)╮', '<p>╭(╯^╰)╮</p>', '9|5|5|5|5|5|5', '9', '9|ykd|╭(╯^╰)╮|<p>╭(╯^╰)╮</p>|2016-03-11|1|0', '1', '0', null, '0');
INSERT INTO `post` VALUES ('38', '9', '2016-03-11 13:06:36', '对自己匿名？', '<p style=\"margin-left: 20px;\">RT</p>', '9|5|5|5|5|2', null, '9|ykd|对自己匿名？|<p style=\"margin-left: 20px;\">RT</p>|2016-03-11|1|0', '1', '0', null, '0');
INSERT INTO `post` VALUES ('39', '9', '2016-03-11 16:02:46', '屏蔽能实现吗？', '<p>RT测试</p>', '9|5|5|5|5|5|5|5|2|5', null, '9|ykd|屏蔽能实现吗？|<p>RT测试</p>|2016-03-11|0|0', '0', '0', null, '0');
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
INSERT INTO `post` VALUES ('81', '5', '2016-03-27 00:27:42', '快来看发帖动画', '<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;快试试动画效果</end></p>', '5|9|2', null, '5|吴行行|快来看发帖动画|<p>​@<!--<start--> test@ ykd<end>&nbsp;快试试动画效果</end></p>|2016-03-27|0|0', '0', '0', '82', '0');
INSERT INTO `post` VALUES ('82', '9', '2016-03-27 20:25:08', '', '<p>我看到啦！！！！！</p>', null, null, 'ykd', '0', '0', null, '1');
INSERT INTO `post` VALUES ('84', '9', '2016-03-27 20:27:40', '', '<p>排版不错!</p>', null, null, 'ykd', '0', '0', null, '2');
INSERT INTO `post` VALUES ('85', '5', '2016-04-12 20:04:15', '31232131', '<p>​412421421</p>', '5', null, '5|吴行行|31232131|<p>​412421421</p>|2016-04-12|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('86', '5', '2016-04-12 20:04:59', '412421', '<p>​412412421</p>', '5', null, '5|吴行行|412421|<p>​412412421</p>|2016-04-12|0|0', '0', '0', '87', '0');
INSERT INTO `post` VALUES ('87', '5', '2016-04-12 20:05:19', '', '<p>321321213</p>', null, null, '吴行行', '0', '0', null, '1');

-- ----------------------------
-- Table structure for `quiz`
-- ----------------------------
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `uploadtime` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of quiz
-- ----------------------------
INSERT INTO `quiz` VALUES ('165', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('166', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('167', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('168', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('169', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('170', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('171', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('172', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('173', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('174', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('175', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('176', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('177', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('178', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('179', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('180', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('181', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('182', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('183', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('184', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('185', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('186', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('187', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('188', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('189', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('190', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('191', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('192', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('193', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('194', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('195', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('196', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('197', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('198', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('199', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('200', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('201', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('202', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('203', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('204', 'sample.txt', 'April 23,2016');
INSERT INTO `quiz` VALUES ('205', 'sample.txt', 'April 25,2016');
INSERT INTO `quiz` VALUES ('206', 'sample.txt', 'April 25,2016');
INSERT INTO `quiz` VALUES ('207', 'sample.txt', 'June 22,2016');

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
-- Table structure for `studentanswer`
-- ----------------------------
DROP TABLE IF EXISTS `studentanswer`;
CREATE TABLE `studentanswer` (
  `studentId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of studentanswer
-- ----------------------------

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
-- Table structure for `subjectivequiz`
-- ----------------------------
DROP TABLE IF EXISTS `subjectivequiz`;
CREATE TABLE `subjectivequiz` (
  `quizId` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL COMMENT '对应题号',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `doneStudent` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`quizId`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of subjectivequiz
-- ----------------------------
INSERT INTO `subjectivequiz` VALUES ('28', '165', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('29', '166', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('30', '167', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('31', '168', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('32', '169', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('33', '170', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('34', '171', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('35', '172', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('36', '173', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('37', '174', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('38', '175', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('39', '176', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('40', '177', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('41', '178', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('42', '179', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('43', '180', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('44', '181', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('45', '182', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('46', '183', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('47', '184', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('48', '185', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('49', '186', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('50', '187', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('51', '188', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('52', '189', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('53', '190', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('54', '191', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('55', '192', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('56', '193', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('57', '194', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('58', '195', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('59', '196', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('60', '197', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('61', '198', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('62', '199', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('63', '200', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('64', '201', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('65', '202', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('66', '203', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('67', '204', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('68', '205', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('69', '206', '2', '2. Decribe the future you imagine.', null);
INSERT INTO `subjectivequiz` VALUES ('70', '207', '2', '2. Decribe the future you imagine.', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wiki
-- ----------------------------
INSERT INTO `wiki` VALUES ('5', '2', 'Hestia', '女神;罗马神话', '<希神>赫斯提; （女灶神，罗马神话中称为Vesta）', '2');
INSERT INTO `wiki` VALUES ('18', '2', 'Test', 'test;    debug;', 'tst', '0');
INSERT INTO `wiki` VALUES ('19', '2', 'dog', 'animal;动物;', '狗，一种动物', '0');
INSERT INTO `wiki` VALUES ('20', '2', 'cat', 'animal;动物;', '猫，一种动物', '0');
INSERT INTO `wiki` VALUES ('21', '2', 'bird', 'animal;动物;', '鸟，一种动物', '3');
INSERT INTO `wiki` VALUES ('22', '2', 'sheep', 'animal;动物;', '绵羊，一种动物', '0');
INSERT INTO `wiki` VALUES ('23', '2', 'horse', 'animal;动物;', '马，一种动物', '0');
INSERT INTO `wiki` VALUES ('24', '2', 'tiger', 'animal;动物;', '老虎，一种动物', '0');
INSERT INTO `wiki` VALUES ('25', '2', 'ant', '昆虫;insect;', '蚂蚁，一种昆虫', '0');
INSERT INTO `wiki` VALUES ('26', '2', 'butterfly', 'insect;昆虫', '蝴蝶，一种昆虫？', '0');
INSERT INTO `wiki` VALUES ('27', '2', 'snake', '动物;animal', '蛇，一种动物', '1');
