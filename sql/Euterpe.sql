/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50631
Source Host           : localhost:3306
Source Database       : euterpe

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2016-08-07 01:42:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for composition
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
-- Table structure for course
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
-- Table structure for courseenrollment
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
INSERT INTO `courseenrollment` VALUES ('1', '11', null);

-- ----------------------------
-- Table structure for courseware
-- ----------------------------
DROP TABLE IF EXISTS `courseware`;
CREATE TABLE `courseware` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `readTime` text COLLATE utf8_unicode_ci,
  `uploadTime` text COLLATE utf8_unicode_ci NOT NULL,
  `quizFilename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quizUploadTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of courseware
-- ----------------------------
INSERT INTO `courseware` VALUES ('1', 'slide04_5385', null, 'April 13,2016', 'sample.txt', '0000-00-00 00:00:00');
INSERT INTO `courseware` VALUES ('2', 'slide04_53885', null, 'April 13,2016', 'sample.txt', '0000-00-00 00:00:00');
INSERT INTO `courseware` VALUES ('3', 'Solutions for Q3', null, 'April 13,2016', null, null);
INSERT INTO `courseware` VALUES ('7', 'Chapter 11', null, 'April 13,2016', null, null);
INSERT INTO `courseware` VALUES ('8', 'Chapter 12', null, 'April 13,2016', null, null);

-- ----------------------------
-- Table structure for discussion
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
-- Table structure for objectivequiz
-- ----------------------------
DROP TABLE IF EXISTS `objectivequiz`;
CREATE TABLE `objectivequiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '对应提交的quizid',
  `quizId` int(11) NOT NULL,
  `order` int(11) NOT NULL COMMENT '题号',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'A:...;B:...;',
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `rightStudent` text COLLATE utf8_unicode_ci COMMENT 'id',
  `wrongStudent` text COLLATE utf8_unicode_ci COMMENT 'id:answers;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of objectivequiz
-- ----------------------------
INSERT INTO `objectivequiz` VALUES ('363', '2', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('364', '2', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);
INSERT INTO `objectivequiz` VALUES ('369', '1', '1', '1. Who is the best singer?', 'A. Jay Chou;B. Taylor Swift;C. Jhon Lengend;D. Morron 5;', 'CD', null, null);
INSERT INTO `objectivequiz` VALUES ('370', '1', '3', '3. Which are the right methods ?', 'A. AAA;B. BBB;C. CCC;D. DDD;', 'B', null, null);

-- ----------------------------
-- Table structure for post
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `post` VALUES ('66', '10', '2016-03-21 23:42:08', '测试发帖', '<p>@</p>', '10|5|5|9', '9', '10|王俊杰|测试发帖|<p>@</p>|2016-03-21|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('68', '5', '2016-03-25 22:15:50', '@功能越来越完善了', '<p>​<a>@ykd&nbsp;</a>&nbsp;佳夫凯迪你们快看</end></p>', '5|9|9', null, '5|吴行行|@功能越来越完善了|<p>​@<!--<start--> ykd<end>&nbsp;佳夫凯迪你们快看</end></p>|2016-03-25|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('69', '5', '2016-03-25 22:18:52', 'eqw', '<p>​qweqw@</p>', '5|9|9', null, '5|吴行行|eqw|<p>​qweqw@</p>|2016-03-25|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('70', '5', '2016-03-25 23:11:01', '', '<p>新排版之后测试回帖</p>', null, null, '吴行行', '0', '0', '84', '1');
INSERT INTO `post` VALUES ('71', '5', '2016-03-26 12:55:57', '@自己能不能行', '<p>​<a>@吴行行&nbsp;</a><a>@吴行行1&nbsp;</a>&nbsp;</end></p>', '5|9|9', '5', '5|吴行行|@自己能不能行|<p>​@<!--<start--> 吴行行@ 吴行行1<end>&nbsp;</end></p>|2016-03-26|0|0', '0', '0', '72', '0');
INSERT INTO `post` VALUES ('72', '5', '2016-03-26 12:56:29', '', '<p>回复自己能不能行</p>', null, null, '吴行行', '0', '0', null, '1');
INSERT INTO `post` VALUES ('74', '5', '2016-03-26 21:11:18', '新功能', '<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;新功能耶！</end></p>', '5|9|9|9|9|9', null, '5|吴行行|新功能|<p>​@<!--<start--> test@ ykd<end>&nbsp;新功能耶！</end></p>|2016-03-26|0|0', '0', '0', null, '0');
INSERT INTO `post` VALUES ('81', '5', '2016-03-27 00:27:42', '快来看发帖动画', '<p>​<a>@test&nbsp;</a><a>@ykd&nbsp;</a>&nbsp;快试试动画效果</end></p>', '5|9|2|9|9|9|9|9|9|9|9|9|9', null, '5|吴行行|快来看发帖动画|<p>​@<!--<start--> test@ ykd<end>&nbsp;快试试动画效果</end></p>|2016-03-27|0|0', '0', '0', '', '0');
INSERT INTO `post` VALUES ('84', '9', '2016-03-27 20:27:40', '', '<p>排版不错!</p>', null, null, 'ykd', '0', '0', null, '2');
INSERT INTO `post` VALUES ('85', '5', '2016-04-12 20:04:15', '31232131', '<p>​412421421</p>', '5|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9', null, '5|吴行行|31232131|<p>​412421421</p>|2016-04-12|0|0', '0', '0', '', '0');
INSERT INTO `post` VALUES ('86', '5', '2016-04-12 20:04:59', '412421', '<p>​412412421</p>', '5|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9|9', '9', '5|吴行行|412421|<p>​412412421</p>|2016-04-12|0|0', '0', '0', '87|88|89|90', '0');
INSERT INTO `post` VALUES ('87', '5', '2016-04-12 20:05:19', '', '<p>321321213</p>', null, null, '吴行行', '0', '0', null, '1');
INSERT INTO `post` VALUES ('88', '9', '2016-07-30 09:00:04', '', '<p>1</p>', null, null, 'ykd', null, null, null, '1');
INSERT INTO `post` VALUES ('89', '9', '2016-07-30 09:00:11', '', '<p>2</p>', null, null, 'ykd', null, null, null, '1');
INSERT INTO `post` VALUES ('90', '9', '2016-07-30 09:00:21', '', '<p>3</p>', null, null, 'ykd', null, null, null, '1');
INSERT INTO `post` VALUES ('91', '9', '2016-08-04 06:24:07', '1231', '<p>​1313</p>', '9', '9', '9|ykd|1231|<p>​1313</p>|2016-08-04||', null, null, null, '0');

-- ----------------------------
-- Table structure for remind
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
INSERT INTO `remind` VALUES ('吴行行', '5', '', ';85:[9:90];86:[9:88];86:[9:89];86:[9:90]', '');
INSERT INTO `remind` VALUES ('test', '6', ';74:[5:74];75:[5:75];81:[5:81]', null, null);
INSERT INTO `remind` VALUES ('吴行行1', '8', ';71:[5:71]', null, null);
INSERT INTO `remind` VALUES ('ykd', '9', ';67:[5:67];75:[5:75,5:75,5:75]', ';24:[5:70];24:[5:79]', null);

-- ----------------------------
-- Table structure for studentanswer
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
-- Table structure for studentbasicinformation
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
-- Table structure for subjectivequiz
-- ----------------------------
DROP TABLE IF EXISTS `subjectivequiz`;
CREATE TABLE `subjectivequiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(11) NOT NULL,
  `order` int(11) NOT NULL COMMENT '对应题号',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doneStudent` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of subjectivequiz
-- ----------------------------
INSERT INTO `subjectivequiz` VALUES ('316', '2', '2', '2. Decribe the future you imagine.', null, null);
INSERT INTO `subjectivequiz` VALUES ('319', '1', '2', '2. Decribe the future you imagine.', null, null);

-- ----------------------------
-- Table structure for user
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
INSERT INTO `user` VALUES ('11', '123456', 'e10adc3949ba59abbe56e057f20f883e', '', '', '123@qqc.pm', 'Student');

-- ----------------------------
-- Table structure for wiki
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
INSERT INTO `wiki` VALUES ('21', '2', 'bird', 'animal;动物;', '鸟，一种动物', '6');
INSERT INTO `wiki` VALUES ('22', '2', 'sheep', 'animal;动物;', '绵羊，一种动物', '0');
INSERT INTO `wiki` VALUES ('23', '2', 'horse', 'animal;动物;', '马，一种动物', '0');
INSERT INTO `wiki` VALUES ('24', '2', 'tiger', 'animal;动物;', '老虎，一种动物', '0');
INSERT INTO `wiki` VALUES ('25', '2', 'ant', '昆虫;insect;', '蚂蚁，一种昆虫', '0');
INSERT INTO `wiki` VALUES ('26', '2', 'butterfly', 'insect;昆虫', '蝴蝶，一种昆虫？', '0');
INSERT INTO `wiki` VALUES ('27', '2', 'snake', '动物;animal', '蛇，一种动物', '1');
