/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50628
Source Host           : localhost:3306
Source Database       : euterpe

Target Server Type    : MYSQL
Target Server Version : 50628
File Encoding         : 65001

Date: 2016-03-10 15:37:15
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
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of composition
-- ----------------------------

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
  `isPost` bit(1) DEFAULT NULL,
  PRIMARY KEY (`postId`),
  KEY `postId` (`postId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('22', '5', '2016-03-08 21:09:43', '测试主键的递增', '<p>会不会递增呀好伤心。</p><p>下面是乱写的。。。</p><p>123456</p>', null, null, '5|吴行行|测试主键的递增|<p>会不会递增呀好伤心。</p><p>下面是乱写的。。。</p><p>123456</p>|2016-03-08|1|2', '0', '0', '', '\0');
INSERT INTO `post` VALUES ('23', '5', '2016-03-08 21:11:10', '测试图片上传', '<p>来个图片</p><p>来个图片<br></p><p>来个图片<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">来个图片<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><img src=\"/uploads/5/7a07e25c31-u-98798092877674487fm-116gp-0.jpg\"><span class=\"redactor-invisible-space\"><br></span></span></span></p>', '1|5', '1|2|3', '5|吴行行|测试图片上传|<p>来个图片</p><p>来个图片<br></p><p>来个图片<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">来个图片<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><img src=\"/uploads/5/7a07e25c31-u-98798092877674487fm-116gp-0.jpg\"><span class=\"redactor-invisible-space\"><br></span></span></span></p>|2016-03-08|1|2', '0', '0', null, '\0');
INSERT INTO `post` VALUES ('24', '9', '2016-03-08 21:20:30', '第4个帖子', '<p>为啥写这个帖子，不知道</p>', null, '1', '9|ykd|第4个帖子|<p>为啥写这个帖子，不知道</p>|2016-03-08|1|2', '0', '0', '22|23', '');
INSERT INTO `post` VALUES ('25', '5', '2016-03-08 21:52:20', '马上要出操了', '<p>好伤心，根本不想出操！根本不想！！</p>', null, null, '5|吴行行|马上要出操了|<p>好伤心，根本不想出操！根本不想！！</p>|2016-03-08|1|2', '0', '0', null, '');
INSERT INTO `post` VALUES ('26', '5', '2016-03-08 22:49:17', '再来一个帖子', '<ul><li>能够看到滚动条的效果了！好开心好开心！<a href=\"http://localhost:8080/course/discussion/discussion\">我的地址！</a></li></ul>', null, '1|2', '5|吴行行|再来一个帖子|<ul><li>能够看到滚动条的效果了！好开心好开心！<a href=\"http://localhost:8080/course/discussion/discussion\">我的地址！</a></li></ul>|2016-03-08|1|2', '0', '0', null, '');
INSERT INTO `post` VALUES ('27', '9', '2016-03-08 23:19:10', '测试', '<p><img src=\"/uploads/5/0ec2ae1d04-u-98798092877674487fm-116gp-0.jpg\"></p>', null, null, '9|ykd|测试|<p><img src=\"/uploads/5/0ec2ae1d04-u-98798092877674487fm-116gp-0.jpg\"></p>|2016-03-08|1|2', '0', '0', null, '');
INSERT INTO `post` VALUES ('28', '5', '2016-03-09 00:14:59', '最后测试一次！', '<p>明天就要给老师展示了好紧张，最后测试一次！</p><p>我先测试一个图片哈</p><p><img src=\"/uploads/5/086c98cd8f-imgfortest.jpg\"></p><hr><p>再来一个链接，点击它会跳转<a href=\"http://localhost:8080/course/discussion/discussion\" target=\"_blank\">我的讨论区！</a></p><p>换个颜色！<span style=\"color: rgb(192, 80, 77);\">这是红色!</span></p>', null, null, '5|吴行行|最后测试一次！|<p>明天就要给老师展示了好紧张，最后测试一次！</p><p>我先测试一个图片哈</p><p><img src=\"/uploads/5/086c98cd8f-imgfortest.jpg\"></p><hr><p>再来一个链接，点击它会跳转<a href=\"http://localhost:8080/course/discussion/discussion\" target=\"_blank\">我的讨论区！</a></p><p>换个颜色！<span style=\"color: rgb(192, 80, 77);\">这是红色!</span></p>|2016-03-09|1|2', '0', '0', null, '');
INSERT INTO `post` VALUES ('29', '5', '2016-03-08 20:44:43', '测试精简信息', '<p><i><tt>string</tt></i></p><dd><p>输入字符串。</p></dd><dt><span class=\"term\"><i><tt>start</tt></i></span></dt><dd><p>如果 <i><tt>start</tt></i> 是非负数，返回的字符串将从 <i><tt>string</tt></i> 的 <i><tt>start</tt></i> 位置开始，从 0 开始计算。例如，在字符串 “<i>abcdef</i>” 中，在位置 <i>0</i> 的字符是 “<i>a</i>”，位置 <i>2</i> 的字符串是 “<i>c</i>” 等等。</p><p>如果 <i><tt>start</tt></i> 是负数，返回的字符串将从 <i><tt>string</tt></i> 结尾处向前数第 <i><tt>start</tt></i> 个字符开始。</p><p>如果 <i><tt>string</tt></i> 的长度小于或等于</p></dd>', '1|2|3', '1|2', '5|吴行行|测试精简信息|<p><i><tt>string</tt></i></p><dd><p>输入字符串。</p></dd><dt><span class=\"term\"><i><tt>start</tt></i></span></dt><dd><p>如果 <i><tt>start</tt></i> 是非负数，返回的字符串将从 <i><tt>string</tt></i> 的 <i><tt>start</tt></i> 位置开始，从 0 开始计算。例如，在字符串 “<i>abcdef</i>” 中，在位置 <i>0</i> 的字符是 “<i>a</i>”，位置 <i>2</i> 的字符串是 “<i>c</i>” 等等。</p><p>如果 <i><tt>start</tt></i> 是负数，返回的字符串将从 <i><tt>string</tt></i> 结尾处向前数第 <i><tt>start</tt></i> 个字符开始。</p><p>如果 <i><tt>string</tt></i> 的长度小于或等于</p></dd>|2016-03-08|1|2', '0', '0', null, '');
INSERT INTO `post` VALUES ('31', '9', '2016-03-09 00:40:22', '学习学习', '<p>深夜党学习大神代码</p>', '|5|5|5|5|5|5', null, '9|ykd|学习学习|<p>深夜党学习大神代码</p>|2016-03-09|1|2', '0', '0', null, '');
INSERT INTO `post` VALUES ('32', '5', '2016-03-09 22:26:52', 'das', '<p>asds</p>', '5', null, '5|吴行行|das|<p>asds</p>|2016-03-09|1|2', '1', '2', null, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
