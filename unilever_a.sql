/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : unilever_a

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2017-09-22 10:01:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_number` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户编号',
  `loginname` varchar(45) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '账户名',
  `nickname` varchar(45) CHARACTER SET utf8 DEFAULT '' COMMENT '用户名',
  `password` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '密码',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `last_login_at` int(11) DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(45) CHARACTER SET utf8 DEFAULT '' COMMENT '上次登录ip',
  `last_login_source` varchar(45) COLLATE utf8_bin DEFAULT '' COMMENT '登录来源',
  `is_disabled` int(11) DEFAULT '0' COMMENT '是否禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户信息表';

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', null, 'admin', '管理员', '96e79218965eb72c92a549dd5a330112', '1464923527', '1505375591', '::1', '网页', '0');
INSERT INTO `admin_user` VALUES ('46', 'AU20160527000046', 'xunap', 'xunao', '96e79218965eb72c92a549dd5a330112', '1464327156', '0', '', '', '0');
INSERT INTO `admin_user` VALUES ('47', 'AU20160607000047', 'test', '测试账号', '7efce94ec1aef400505b38a7d3c74ce4', '1465268663', '1487838150', '139.162.72.41', '网页', '0');
INSERT INTO `admin_user` VALUES ('48', 'AU20160624000048', 'aa', 'aa', '96e79218965eb72c92a549dd5a330112', '1466747648', '0', '', '', '1');
INSERT INTO `admin_user` VALUES ('49', 'AU20160624000049', 'aa12', '1212', '96e79218965eb72c92a549dd5a330112', '1466750934', '0', '', '', '0');
INSERT INTO `admin_user` VALUES ('50', 'AU20160624000050', 'aaaa12', '121212', '96e79218965eb72c92a549dd5a330112', '1466751843', '1466755419', '127.0.0.1', '网页', '0');
INSERT INTO `admin_user` VALUES ('51', 'AU20160624000051', 'haha', 'haha', 'af86b1aa81826c2fa6ef605c4f5b3d81', '1466752700', '1467009993', '117.64.41.146', '网页', '0');
INSERT INTO `admin_user` VALUES ('52', 'AU20160719000052', 'ceshi', '测试账号', 'e10adc3949ba59abbe56e057f20f883e', '1468920530', '1468920549', '116.231.178.180', '网页', '0');
INSERT INTO `admin_user` VALUES ('53', 'AU20160721000053', '111111', '111111', '96e79218965eb72c92a549dd5a330112', '1469100883', '1479260258', '::1', '网页', '0');

-- ----------------------------
-- Table structure for `answer`
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `question` int(11) DEFAULT NULL,
  `answer` text,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='答案';

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('52', '32', null, '{\"1\":\"\\u7f51\\u7ad9\",\"2\":\"\\u5f88\\u4e86\\u89e3\",\"3\":\"\\u6ee1\\u610f\",\"4\":\"\\u9ed1\\u6912\\u8471\\u9999\\u8584\\u997c\",\"5\":\"\\u613f\\u610f\",\"6\":\"\\u613f\\u610f\",\"8\":\"\\u7231\\u5728\\u63d0\\u62c9\\u7c73\\u82cf\",\"9\":\"\\u7acb\\u987f\\u51b0\\u8336\\u7c89\",\"7\":\"\\u963f\\u8428\\u5fb7\",\"10\":\"\\u6309\\u65f6\"}', '1495014502');
INSERT INTO `answer` VALUES ('50', '30', null, '{\"1\":\"\\u4e86\\u89e3\\u6e20\\u9053\",\"2\":\"\\u5f88\\u4e86\\u89e3\",\"3\":\"\\u6ee1\\u610f\",\"4\":\"\\u7f57\\u52d2\\u706b\\u817f\\u77ed\\u68cd\",\"5\":\"\\u613f\\u610f\",\"6\":\"\\u613f\\u610f\",\"8\":\"\\u7231\\u5728\\u63d0\\u62c9\\u7c73\\u82cf\",\"9\":\"\\u7acb\\u987f\\u4e09\\u89d2\\u8336\\u5305\",\"7\":\"\\u5176\\u4ed6\\u5efa\\u8bae\",\"10\":\"\\u5bf9\\u996e\\u54c1\\u9700\\u6c42\"}', '1494917585');
INSERT INTO `answer` VALUES ('51', '31', null, '{\"1\":\"\\u7f51\\u7ad9\",\"2\":\"\\u5f88\\u4e86\\u89e3\",\"3\":\"\\u6ee1\\u610f\",\"4\":\"\\u9ed1\\u6912\\u8471\\u9999\\u8584\\u997c\",\"5\":\"\\u613f\\u610f\",\"6\":\"\\u613f\\u610f\",\"8\":\"\\u7231\\u5728\\u63d0\\u62c9\\u7c73\\u82cf\",\"9\":\"\\u7acb\\u987f\\u51b0\\u8336\\u7c89\",\"7\":\"\\u963f\\u8428\\u5fb7\",\"10\":\"\\u6309\\u65f6\"}', '1495014500');
INSERT INTO `answer` VALUES ('48', '28', null, '{\"1\":\"\\u793e\\u4ea4\\u6e20\\u9053\",\"2\":\"\\u4e00\\u822c\",\"3\":\"\\u4e0d\\u592a\\u6ee1\\u610f\",\"4\":\"\\u7f57\\u52d2\\u706b\\u817f\\u77ed\\u68cd\",\"5\":\"\\u613f\\u610f\",\"6\":\"\\u4e0d\\u613f\\u7406\",\"8\":\"\\u7231\\u5728\\u63d0\\u62c9\\u7c73\\u82cf\",\"9\":\"\\u7acb\\u987f\\u5c0f\\u7687\\u7f50\",\"7\":\"\",\"10\":\"\\u8d8a\\u6765\\u8d8a\"}', '1494914276');
INSERT INTO `answer` VALUES ('49', '29', null, '{\"1\":\"\\u89c6\\u9891\",\"2\":\"\\u5f88\\u4e86\\u89e3\",\"3\":\"\\u6ee1\\u610f\",\"4\":\"\\u7f57\\u52d2\\u706b\\u817f\\u77ed\\u68cd\",\"5\":\"\\u613f\\u610f\",\"6\":\"\\u613f\\u610f\",\"8\":\"\\u7231\\u5728\\u63d0\\u62c9\\u7c73\\u82cf\",\"9\":\"\\u7acb\\u987f\\u4e09\\u89d2\\u8336\\u5305\",\"7\":\"\\u5efa\\u8bae\",\"10\":\"\\u9700\\u6c42\"}', '1494916508');
INSERT INTO `answer` VALUES ('44', '24', null, '{\"1\":\"\\u7f51\\u7ad9\",\"2\":\"\\u5f88\\u4e86\\u89e3\",\"3\":\"\\u4e00\\u822c\",\"4\":\"\\u70df\\u718f\\u57f9\\u6839\\u829d\\u58eb\\u4e09\\u660e\\u6cbb\",\"5\":\"\\u4e0d\\u613f\\u7406\",\"6\":\"\\u4e0d\\u613f\\u7406\",\"8\":\"\\u7231\\u5728\\u63d0\\u62c9\\u7c73\\u82cf\",\"9\":\"\\u7acb\\u987f\\u51b0\\u8336\\u7c89\",\"7\":\"666\",\"10\":\"\\u6ca1\\u6709\"}', '1494863884');
INSERT INTO `answer` VALUES ('45', '25', null, '{\"1\":\"\\u5176\\u4ed6\\u554a\\u554a\",\"2\":\"\\u5f88\\u4e86\\u89e3\",\"3\":\"\\u4e00\\u822c\",\"4\":\"\\u9ed1\\u6912\\u8471\\u9999\\u8584\\u997c\",\"5\":\"\\u613f\\u610f\",\"6\":\"\\u4e0d\\u613f\\u7406\",\"8\":\"\\u6ee1\\u6ee1\\u767d\\u679c\\u9999\\u8336\",\"9\":\"\\u7acb\\u987f\\u51b0\\u8336\\u7c89\",\"7\":\"\\u5feb\\u5feb\\u5feb\\u5feb\\u5feb\",\"10\":\"\\u554a\\u554a\\u554a\"}', '1494864410');
INSERT INTO `answer` VALUES ('46', '26', null, '{\"1\":\"\\u767e\\u5ea6\\u4eba\\u5bb6\",\"2\":\"\\u4e00\\u822c\",\"3\":\"\\u6ee1\\u610f\",\"4\":\"\\u70df\\u718f\\u57f9\\u6839\\u829d\\u58eb\\u4e09\\u660e\\u6cbb\",\"5\":\"\\u4e0d\\u613f\\u7406\",\"6\":\"\\u613f\\u610f\",\"8\":\"\\u6ee1\\u6ee1\\u767d\\u679c\\u9999\\u8336\",\"9\":\"\\u7acb\\u987f\\u51b0\\u8336\\u7c89\",\"7\":\"\\u5efa\\u8bae\",\"10\":\"\\u9700\\u6c42\"}', '1494864647');
INSERT INTO `answer` VALUES ('47', '27', null, '{\"1\":\"\\u767e\\u5ea6\",\"2\":\"\\u5f88\\u4e86\\u89e3\",\"3\":\"\\u4e00\\u822c\",\"4\":\"\\u7f57\\u52d2\\u706b\\u817f\\u77ed\\u68cd\",\"5\":\"\\u4e0d\\u613f\\u7406\",\"6\":\"\\u613f\\u610f\",\"8\":\"\\u6ee1\\u6ee1\\u767d\\u679c\\u9999\\u8336\",\"9\":\"\\u7acb\\u987f\\u4e09\\u89d2\\u8336\\u5305\",\"7\":\"\\u6ca1\\u6709\\u5c31\",\"10\":\"\\u6ca1\\u6709\\u7684\"}', '1494864659');

-- ----------------------------
-- Table structure for `authassignment`
-- ----------------------------
DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `fk_authassignment_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authassignment
-- ----------------------------
INSERT INTO `authassignment` VALUES ('管理员', '1', null, 'N;');
INSERT INTO `authassignment` VALUES ('管理员', '47', null, 'N;');
INSERT INTO `authassignment` VALUES ('管理员', '49', null, 'N;');
INSERT INTO `authassignment` VALUES ('管理员', '50', null, 'N;');

-- ----------------------------
-- Table structure for `authitem`
-- ----------------------------
DROP TABLE IF EXISTS `authitem`;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  `priority` int(11) DEFAULT '100' COMMENT '优先级',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authitem
-- ----------------------------
INSERT INTO `authitem` VALUES ('操作日志', '0', null, null, null, '100');
INSERT INTO `authitem` VALUES ('用户信息', '0', null, null, null, '100');
INSERT INTO `authitem` VALUES ('用户管理', '0', null, null, null, '100');
INSERT INTO `authitem` VALUES ('管理员', '2', '管理员', null, 'N;', '1');
INSERT INTO `authitem` VALUES ('系统用户管理', '0', '', null, 'N;', '100');
INSERT INTO `authitem` VALUES ('角色管理', '0', null, null, null, '100');
INSERT INTO `authitem` VALUES ('问卷管理', '0', null, null, null, '100');
INSERT INTO `authitem` VALUES ('问卷详情', '0', null, null, null, '100');

-- ----------------------------
-- Table structure for `authitemchild`
-- ----------------------------
DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `fk_authitemchild_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_authitemchild_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authitemchild
-- ----------------------------
INSERT INTO `authitemchild` VALUES ('管理员', '操作日志');
INSERT INTO `authitemchild` VALUES ('管理员', '用户信息');
INSERT INTO `authitemchild` VALUES ('管理员', '用户管理');
INSERT INTO `authitemchild` VALUES ('管理员', '系统用户管理');
INSERT INTO `authitemchild` VALUES ('管理员', '角色管理');
INSERT INTO `authitemchild` VALUES ('管理员', '问卷管理');
INSERT INTO `authitemchild` VALUES ('管理员', '问卷详情');

-- ----------------------------
-- Table structure for `fabulous`
-- ----------------------------
DROP TABLE IF EXISTS `fabulous`;
CREATE TABLE `fabulous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of fabulous
-- ----------------------------
INSERT INTO `fabulous` VALUES ('58', '26', '::1', '1495416406');
INSERT INTO `fabulous` VALUES ('59', '30', '::1', '1495416408');
INSERT INTO `fabulous` VALUES ('60', '30', '::1', '1495416409');
INSERT INTO `fabulous` VALUES ('61', '26', '::1', '1495416410');
INSERT INTO `fabulous` VALUES ('62', '30', '::1', '1495416922');

-- ----------------------------
-- Table structure for `front_user`
-- ----------------------------
DROP TABLE IF EXISTS `front_user`;
CREATE TABLE `front_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(45) NOT NULL COMMENT '昵称',
  `password` varchar(45) DEFAULT NULL COMMENT '密码',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机',
  `birth` varchar(45) DEFAULT NULL COMMENT '生日',
  `email` varchar(45) DEFAULT NULL COMMENT '邮箱',
  `gender` int(11) DEFAULT '3' COMMENT '性别1男2女3保密',
  `user_pic` varchar(45) DEFAULT NULL COMMENT '用户图像',
  `province` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `profession` int(11) DEFAULT NULL COMMENT '职业',
  `education` int(11) DEFAULT NULL COMMENT '学历',
  `register_type` int(11) DEFAULT '1' COMMENT '注册方式： 1: 本地注册 2： 微信注册， 3：qq注册 4 ：微博',
  `login_token` varchar(45) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `weixin_token` varchar(255) DEFAULT NULL,
  `qq_token` varchar(255) DEFAULT NULL,
  `weibo_token` varchar(255) DEFAULT NULL,
  `invite_code` varchar(45) DEFAULT NULL COMMENT '邀请码',
  `marry` int(11) DEFAULT '0' COMMENT '0未婚 1已婚',
  `children` int(11) DEFAULT '1' COMMENT '0 1有',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL COMMENT '姓名',
  `id_card` varchar(255) DEFAULT NULL COMMENT '身份证号',
  `openid` varchar(255) DEFAULT NULL COMMENT '微信标识',
  `hotel` varchar(255) DEFAULT NULL COMMENT '酒店',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户';

-- ----------------------------
-- Records of front_user
-- ----------------------------
INSERT INTO `front_user` VALUES ('1', 'aa', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', null, null, null, null, null, '安徽');
INSERT INTO `front_user` VALUES ('2', 'aa', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', null, null, null, null, null, '安徽');
INSERT INTO `front_user` VALUES ('3', 'a', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1492680956', null, null, null, null, '安徽');
INSERT INTO `front_user` VALUES ('4', '王家郴', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1492770685', null, null, null, null, '上海市民体育馆');
INSERT INTO `front_user` VALUES ('5', '蒋伟君', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493110888', null, null, null, null, '万豪');
INSERT INTO `front_user` VALUES ('6', 'aa', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493113322', null, null, null, null, '安徽');
INSERT INTO `front_user` VALUES ('7', 'aa6', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493113360', null, null, null, null, '安徽');
INSERT INTO `front_user` VALUES ('8', 'aa', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493807208', null, null, null, null, '安徽');
INSERT INTO `front_user` VALUES ('9', 'xunao', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493807638', null, null, null, null, '上海');
INSERT INTO `front_user` VALUES ('10', 'xunao1', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493807654', null, null, null, null, '上海');
INSERT INTO `front_user` VALUES ('11', 'xunao2', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493807668', null, null, null, null, '上海');
INSERT INTO `front_user` VALUES ('12', 'xunao6', null, null, null, null, '3', null, null, null, null, null, null, '1', null, null, null, null, null, null, '0', '1', '1493807701', null, null, null, null, '上海');

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(45) NOT NULL COMMENT '业务名',
  `operation_type` varchar(45) NOT NULL COMMENT '操作类型',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `created_by` int(11) NOT NULL COMMENT '操作人',
  `comment` varchar(200) DEFAULT '' COMMENT '备注/描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COMMENT='日志';

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('1', '习惯', '习惯删除', '1490756227', '1', '0');
INSERT INTO `log` VALUES ('2', '习惯', '习惯删除', '1490756235', '1', '0');
INSERT INTO `log` VALUES ('3', '习惯', '习惯删除', '1490756245', '1', '0');
INSERT INTO `log` VALUES ('4', '习惯', '习惯删除', '1490757169', '1', '0');
INSERT INTO `log` VALUES ('5', '习惯', '新增', '1490758355', '1', '');
INSERT INTO `log` VALUES ('6', '习惯', '新增', '1490761248', '1', '');
INSERT INTO `log` VALUES ('7', '习惯', '新增', '1490762892', '1', '');
INSERT INTO `log` VALUES ('8', '习惯', '新增', '1490762932', '1', '');
INSERT INTO `log` VALUES ('9', '习惯', '新增', '1490762976', '1', '');
INSERT INTO `log` VALUES ('10', '习惯', '新增', '1490763131', '1', '');
INSERT INTO `log` VALUES ('11', '习惯', '新增', '1490763293', '1', '');
INSERT INTO `log` VALUES ('12', '习惯', '新增', '1490763459', '1', '');
INSERT INTO `log` VALUES ('13', '习惯', '新增', '1490763569', '1', '');
INSERT INTO `log` VALUES ('14', '任务', '编辑', '1490763648', '1', '');
INSERT INTO `log` VALUES ('15', '习惯', '习惯删除', '1490763669', '1', '0');
INSERT INTO `log` VALUES ('16', '任务', '编辑', '1490780555', '1', '');
INSERT INTO `log` VALUES ('17', '习惯进阶设置', '编辑', '1490781147', '1', '');
INSERT INTO `log` VALUES ('18', '心愿', '新增', '1490859976', '1', '');
INSERT INTO `log` VALUES ('19', '心愿产品', '编辑', '1490862261', '1', '');
INSERT INTO `log` VALUES ('20', '习惯', '习惯删除', '1490863945', '1', '0');
INSERT INTO `log` VALUES ('21', '习惯', '习惯删除', '1490863955', '1', '0');
INSERT INTO `log` VALUES ('22', '习惯', '习惯删除', '1490863976', '1', '0');
INSERT INTO `log` VALUES ('23', '产品', '习惯删除', '1490865937', '1', '0');
INSERT INTO `log` VALUES ('24', '产品', '习惯删除', '1490865945', '1', '0');
INSERT INTO `log` VALUES ('25', '树', '新增', '1490942859', '1', '0');
INSERT INTO `log` VALUES ('26', '树', '编辑', '1490942916', '1', '0');
INSERT INTO `log` VALUES ('27', '树', '编辑', '1490942942', '1', '0');
INSERT INTO `log` VALUES ('28', '习惯', '新增', '1490947886', '1', '');
INSERT INTO `log` VALUES ('29', '任务', '编辑', '1490947959', '1', '');
INSERT INTO `log` VALUES ('30', '习惯进阶设置', '编辑', '1490948267', '1', '');
INSERT INTO `log` VALUES ('31', '习惯进阶设置', '编辑', '1490948289', '1', '');
INSERT INTO `log` VALUES ('32', '习惯进阶设置', '编辑', '1490948420', '1', '');
INSERT INTO `log` VALUES ('33', '习惯进阶设置', '编辑', '1490948636', '1', '');
INSERT INTO `log` VALUES ('34', '习惯进阶设置', '编辑', '1490948740', '1', '');
INSERT INTO `log` VALUES ('35', '习惯进阶设置', '编辑', '1490948847', '1', '');
INSERT INTO `log` VALUES ('36', '习惯进阶设置', '编辑', '1490948864', '1', '');
INSERT INTO `log` VALUES ('37', '习惯进阶设置', '编辑', '1490949139', '1', '');
INSERT INTO `log` VALUES ('38', '习惯进阶设置', '编辑', '1490949178', '1', '');
INSERT INTO `log` VALUES ('39', '树任务', '新增', '1490949245', '1', '0');
INSERT INTO `log` VALUES ('40', '习惯进阶设置', '编辑', '1490949299', '1', '');
INSERT INTO `log` VALUES ('41', '任务', '编辑', '1490949357', '1', '');
INSERT INTO `log` VALUES ('42', '树任务', '编辑', '1490949398', '1', '0');
INSERT INTO `log` VALUES ('43', '任务', '编辑', '1490949860', '1', '');
INSERT INTO `log` VALUES ('44', '习惯进阶设置', '编辑', '1490950004', '1', '');
INSERT INTO `log` VALUES ('45', '习惯进阶设置', '编辑', '1490950023', '1', '');
INSERT INTO `log` VALUES ('46', '习惯进阶设置', '编辑', '1490950613', '1', '');
INSERT INTO `log` VALUES ('47', '树任务', '编辑', '1490950622', '1', '0');
INSERT INTO `log` VALUES ('48', '习惯进阶设置', '编辑', '1490950772', '1', '');
INSERT INTO `log` VALUES ('49', '习惯进阶设置', '编辑', '1490950790', '1', '');
INSERT INTO `log` VALUES ('50', '心愿', '新增', '1490951464', '1', '');
INSERT INTO `log` VALUES ('51', '心愿产品', '编辑', '1491030734', '1', '');
INSERT INTO `log` VALUES ('52', '心愿产品', '编辑', '1491030822', '1', '');
INSERT INTO `log` VALUES ('53', '习惯', '习惯删除', '1491032630', '1', '0');
INSERT INTO `log` VALUES ('54', '树语', '新增', '1491037899', '1', '0');
INSERT INTO `log` VALUES ('55', '树语', '编辑', '1491038751', '1', '0');
INSERT INTO `log` VALUES ('56', '树阶段', '编辑', '1491369544', '1', '0');
INSERT INTO `log` VALUES ('57', '树阶段', '编辑', '1491369924', '1', '0');
INSERT INTO `log` VALUES ('58', '树阶段', '编辑', '1491370008', '1', '0');
INSERT INTO `log` VALUES ('59', '树阶段', '编辑', '1491371660', '1', '0');
INSERT INTO `log` VALUES ('60', '习惯进阶设置', '编辑', '1491377280', '1', '');
INSERT INTO `log` VALUES ('61', '习惯进阶设置', '编辑', '1491377293', '1', '');
INSERT INTO `log` VALUES ('62', '蝴蝶', '编辑', '1491380109', '1', '0');
INSERT INTO `log` VALUES ('63', '蝴蝶', '新增', '1491380329', '1', '0');
INSERT INTO `log` VALUES ('64', '蝴蝶', '编辑', '1491380357', '1', '0');
INSERT INTO `log` VALUES ('65', '心愿产品', '编辑', '1491380372', '1', '');
INSERT INTO `log` VALUES ('66', '蝴蝶', '新增', '1491380384', '1', '0');
INSERT INTO `log` VALUES ('67', '蝴蝶', '新增', '1491380420', '1', '0');
INSERT INTO `log` VALUES ('68', '树阶段', '编辑', '1491383767', '1', '0');
INSERT INTO `log` VALUES ('69', '树阶段', '编辑', '1491383823', '1', '0');
INSERT INTO `log` VALUES ('70', '树阶段', '编辑', '1491383839', '1', '0');
INSERT INTO `log` VALUES ('71', '树阶段', '编辑', '1491383858', '1', '0');
INSERT INTO `log` VALUES ('72', '角色管理', '修改', '1491387599', '1', '');
INSERT INTO `log` VALUES ('73', '心愿产品', '编辑', '1491449404', '1', '');
INSERT INTO `log` VALUES ('74', '心愿产品', '编辑', '1491449419', '1', '');
INSERT INTO `log` VALUES ('75', '心愿产品', '编辑', '1491449521', '1', '');
INSERT INTO `log` VALUES ('76', '心愿产品', '编辑', '1491449560', '1', '');
INSERT INTO `log` VALUES ('77', '心愿产品', '编辑', '1491449578', '1', '');
INSERT INTO `log` VALUES ('78', '心愿产品', '编辑', '1491454215', '1', '');
INSERT INTO `log` VALUES ('79', '心愿产品', '编辑', '1491454228', '1', '');
INSERT INTO `log` VALUES ('80', '心愿产品', '编辑', '1491454242', '1', '');
INSERT INTO `log` VALUES ('81', '心愿产品', '编辑', '1491454257', '1', '');
INSERT INTO `log` VALUES ('82', '心愿产品', '编辑', '1491454377', '1', '');
INSERT INTO `log` VALUES ('83', '心愿产品', '编辑', '1491454424', '1', '');
INSERT INTO `log` VALUES ('84', '心愿产品', '编辑', '1491454580', '1', '');
INSERT INTO `log` VALUES ('85', '心愿订单', '编辑', '1491455106', '1', '');
INSERT INTO `log` VALUES ('86', '心愿订单', '编辑', '1491455203', '1', '');
INSERT INTO `log` VALUES ('87', '心愿订单', '编辑', '1491455253', '1', '');
INSERT INTO `log` VALUES ('88', '心愿订单', '编辑', '1491455433', '1', '');
INSERT INTO `log` VALUES ('89', '心愿订单', '编辑', '1491455559', '1', '');
INSERT INTO `log` VALUES ('90', '心愿订单', '编辑', '1491455721', '1', '');
INSERT INTO `log` VALUES ('91', '心愿订单', '编辑', '1491455898', '1', '');
INSERT INTO `log` VALUES ('92', '角色管理', '修改', '1491457650', '1', '');
INSERT INTO `log` VALUES ('93', '角色管理', '修改', '1491458872', '1', '');
INSERT INTO `log` VALUES ('94', '角色管理', '修改', '1491459945', '1', '');
INSERT INTO `log` VALUES ('95', '角色管理', '修改', '1491461783', '1', '');
INSERT INTO `log` VALUES ('96', '任务', '编辑', '1491812978', '1', '');
INSERT INTO `log` VALUES ('97', '任务', '编辑', '1491813419', '1', '');
INSERT INTO `log` VALUES ('98', '任务', '编辑', '1491813436', '1', '');
INSERT INTO `log` VALUES ('99', '任务', '编辑', '1491813921', '1', '');
INSERT INTO `log` VALUES ('100', '任务', '编辑', '1491814215', '1', '');
INSERT INTO `log` VALUES ('101', '习惯', '新增', '1491815392', '1', '');
INSERT INTO `log` VALUES ('102', '习惯', '新增', '1491815959', '1', '');
INSERT INTO `log` VALUES ('103', '任务', '编辑', '1491816247', '1', '');
INSERT INTO `log` VALUES ('104', '角色管理', '修改', '1492680229', '1', '');

-- ----------------------------
-- Table structure for `log_detail`
-- ----------------------------
DROP TABLE IF EXISTS `log_detail`;
CREATE TABLE `log_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(45) NOT NULL COMMENT '表名',
  `oldValue` varchar(1000) DEFAULT '' COMMENT '旧值',
  `newValue` varchar(1000) DEFAULT '' COMMENT '新值',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `created_by` int(11) NOT NULL COMMENT '操作人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COMMENT='日志详情表';

-- ----------------------------
-- Records of log_detail
-- ----------------------------
INSERT INTO `log_detail` VALUES ('1', '', 'url:127.0.0.1/index.php/habit/deleteid=6 {\"id\":\"6\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"2\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"6\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"2\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490756227', '1');
INSERT INTO `log_detail` VALUES ('2', '', 'url:127.0.0.1/index.php/habit/deleteid=6 {\"id\":\"6\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"2\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"6\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"2\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490756235', '1');
INSERT INTO `log_detail` VALUES ('3', '', 'url:127.0.0.1/index.php/habit/deleteid=6 {\"id\":\"6\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"2\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"6\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"2\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490756245', '1');
INSERT INTO `log_detail` VALUES ('4', '', 'url:127.0.0.1/index.php/habit/deleteid=10 {\"id\":\"10\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"10\",\"name\":\"\\u6d4b\\u8bd5\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5\",\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490757169', '1');
INSERT INTO `log_detail` VALUES ('5', 'task_info', '', '{\"unit_sort\":1,\"id\":\"11\",\"name\":null,\"title\":null,\"unit\":null,\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490758357', '1');
INSERT INTO `log_detail` VALUES ('6', 'sk_habit', '', '{\"unit_sort\":1,\"id\":\"12\",\"name\":null,\"title\":null,\"unit\":null,\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490761249', '1');
INSERT INTO `log_detail` VALUES ('7', 'sk_habit', '', '{\"unit_sort\":1,\"create_time\":1490762892,\"id\":\"13\",\"name\":null,\"title\":null,\"unit\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490762892', '1');
INSERT INTO `log_detail` VALUES ('8', 'sk_habit', '', '{\"unit_sort\":1,\"create_time\":1490762932,\"id\":\"14\",\"name\":null,\"title\":null,\"unit\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490762932', '1');
INSERT INTO `log_detail` VALUES ('9', 'sk_habit', '', '{\"unit_sort\":1,\"create_time\":1490762976,\"id\":\"15\",\"name\":null,\"title\":null,\"unit\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490762976', '1');
INSERT INTO `log_detail` VALUES ('10', 'sk_habit', '', '{\"unit_sort\":\"0\",\"name\":\"\\u975e\\u4eba\\u9632\",\"unit\":\"\\u4e2a\\u4eba\\u80a1\",\"create_time\":1490763131,\"id\":\"16\",\"title\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490763131', '1');
INSERT INTO `log_detail` VALUES ('11', 'sk_habit', '', '{\"unit_sort\":\"1\",\"name\":\"\\u6d4b\\u8bd5002\",\"unit\":\"\\u6d4b\\u8bd5002\",\"create_time\":1490763293,\"id\":\"17\",\"title\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490763293', '1');
INSERT INTO `log_detail` VALUES ('12', 'sk_habit', '', '{\"unit_sort\":\"\",\"name\":\"\\u6d4b\\u8bd5003\",\"unit\":\"\\u6d4b\\u8bd5003\",\"create_time\":1490763459,\"id\":\"18\",\"title\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490763459', '1');
INSERT INTO `log_detail` VALUES ('13', 'sk_habit', '', '{\"unit_sort\":\"1\",\"name\":\"\\u6d4b\\u8bd5005\",\"unit\":\"\\u6d4b\\u8bd5005\",\"create_time\":1490763569,\"id\":\"19\",\"title\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490763569', '1');
INSERT INTO `log_detail` VALUES ('14', 'task_info', '{\"id\":\"16\",\"name\":\"\\u975e\\u4eba\\u9632\",\"title\":null,\"unit\":\"\\u4e2a\\u4eba\\u80a1\",\"unit_sort\":\"0\",\"tag\":null,\"poster\":null,\"create_time\":\"1490763131\",\"update_time\":null}', '{\"id\":\"16\",\"name\":\"\\u6d4b\\u8bd5001\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5001\",\"unit_sort\":1,\"tag\":null,\"poster\":null,\"create_time\":\"1490763131\",\"update_time\":null}', '1490763648', '1');
INSERT INTO `log_detail` VALUES ('15', '', 'url:127.0.0.1/index.php/habit/deleteid=13 {\"id\":\"13\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":\"1490762892\",\"update_time\":null}', '{\"id\":\"13\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":\"1490762892\",\"update_time\":null}', '1490763669', '1');
INSERT INTO `log_detail` VALUES ('16', 'task_info', '{\"id\":\"3\",\"habit_id\":null,\"stage\":\"0\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":null,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"3\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e09\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":null,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490780555', '1');
INSERT INTO `log_detail` VALUES ('17', 'sk_habit_satge', '{\"id\":\"4\",\"habit_id\":null,\"stage\":\"0\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":null,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"4\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u56db\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":null,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490781147', '1');
INSERT INTO `log_detail` VALUES ('18', 'sk_habit', '', '{\"is_deleted\":0,\"name\":\"\\u7a7a\\u8c03\",\"serial_nu\":\"123456\",\"stock\":\"998\",\"price\":\"998\",\"wish_nu\":\"200\",\"desc\":\"\\u6d4b\\u8bd5\",\"create_time\":1490859976,\"ratio\":\"2:2\",\"id\":\"3\",\"cat_id\":null,\"poster\":null,\"update_time\":null}', '1490859976', '1');
INSERT INTO `log_detail` VALUES ('19', 'task_info', '{\"id\":\"1\",\"name\":\"LED\\u62a4\\u773c\\u706f\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"990\",\"desc\":null,\"is_deleted\":\"0\",\"wish_nu\":\"200\",\"price\":\"99.99\",\"ratio\":\"1:1\",\"create_time\":\"2017-03-21 14:00\",\"update_time\":null}', '{\"id\":\"1\",\"name\":\"LED\\u62a4\\u773c\\u706f\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"990\",\"desc\":\"\\u53bb\",\"is_deleted\":\"0\",\"wish_nu\":\"99.99\",\"price\":\"99.99\",\"ratio\":\"1:2\",\"create_time\":\"2017-03-21 14:00\",\"update_time\":1490862261}', '1490862262', '1');
INSERT INTO `log_detail` VALUES ('20', '', 'url:127.0.0.1/index.php/habit/deleteid=12 {\"id\":\"12\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"12\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490863945', '1');
INSERT INTO `log_detail` VALUES ('21', '', 'url:127.0.0.1/index.php/habit/deleteid=12 {\"id\":\"12\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"12\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490863955', '1');
INSERT INTO `log_detail` VALUES ('22', '', 'url:127.0.0.1/index.php/habit/deleteid=12 {\"id\":\"12\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"12\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1490863976', '1');
INSERT INTO `log_detail` VALUES ('23', '', 'url:127.0.0.1/index.php/skWish/deleteid=2 {\"id\":\"2\",\"name\":\"5\\u901a\\u9053\\u9065\\u63a7\\u98de\\u673a\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"180\",\"desc\":null,\"is_deleted\":\"0\",\"wish_nu\":\"350\",\"price\":\"200\",\"ratio\":\"1:1\",\"create_time\":\"2017-03-21 14:00\",\"update_time\":null}', '{\"id\":\"2\",\"name\":\"5\\u901a\\u9053\\u9065\\u63a7\\u98de\\u673a\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"180\",\"desc\":null,\"is_deleted\":\"0\",\"wish_nu\":\"350\",\"price\":\"200\",\"ratio\":\"1:1\",\"create_time\":\"2017-03-21 14:00\",\"update_time\":null}', '1490865937', '1');
INSERT INTO `log_detail` VALUES ('24', '', 'url:127.0.0.1/index.php/skWish/deleteid=2 {\"id\":\"2\",\"name\":\"5\\u901a\\u9053\\u9065\\u63a7\\u98de\\u673a\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"180\",\"desc\":null,\"is_deleted\":\"0\",\"wish_nu\":\"350\",\"price\":\"200\",\"ratio\":\"1:1\",\"create_time\":\"2017-03-21 14:00\",\"update_time\":null}', '{\"id\":\"2\",\"name\":\"5\\u901a\\u9053\\u9065\\u63a7\\u98de\\u673a\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"180\",\"desc\":null,\"is_deleted\":\"0\",\"wish_nu\":\"350\",\"price\":\"200\",\"ratio\":\"1:1\",\"create_time\":\"2017-03-21 14:00\",\"update_time\":null}', '1490865945', '1');
INSERT INTO `log_detail` VALUES ('25', 'sk_live', 'url:127.0.0.1/index.php/live/createpage= ', '{\"name\":\"\\u80e1\\u6768\\u6811\",\"title\":\"\\u987d\\u5f3a\\u6bc5\\u529b\",\"habit_nu\":\"3\",\"create_time\":1490942859,\"update_time\":1490942859,\"id\":\"2\",\"poster\":null}', '1490942859', '1');
INSERT INTO `log_detail` VALUES ('26', 'sk_live', 'url:127.0.0.1/index.php/live/update/1page= {\"id\":\"1\",\"name\":\"\\u6cd5\\u68a7\\u6850\",\"title\":\"\\u6d6a\\u6f2b\\u60c5\\u6000\",\"habit_nu\":\"3\",\"poster\":null,\"create_time\":\"1490937768\",\"update_time\":\"1490937768\"}', '{\"id\":\"1\",\"name\":\"\\u6cd5\\u68a7\\u6850\",\"title\":\"\\u6d6a\\u6f2b\\u60c5\\u6000\",\"habit_nu\":\"31\",\"poster\":null,\"create_time\":\"1490937768\",\"update_time\":1490942916}', '1490942916', '1');
INSERT INTO `log_detail` VALUES ('27', 'sk_live', 'url:127.0.0.1/index.php/live/update/1page= {\"id\":\"1\",\"name\":\"\\u6cd5\\u68a7\\u6850\",\"title\":\"\\u6d6a\\u6f2b\\u60c5\\u6000\",\"habit_nu\":\"31\",\"poster\":null,\"create_time\":\"1490937768\",\"update_time\":\"1490942916\"}', '{\"id\":\"1\",\"name\":\"\\u6cd5\\u68a7\\u6850\",\"title\":\"\\u6d6a\\u6f2b\\u60c5\\u6000\",\"habit_nu\":\"3\",\"poster\":null,\"create_time\":\"1490937768\",\"update_time\":1490942942}', '1490942942', '1');
INSERT INTO `log_detail` VALUES ('28', 'sk_habit', '', '{\"unit_sort\":\"1\",\"name\":\"\\u7761\\u61d2\\u89c9\",\"unit\":\"\\u5206\\u949f\",\"create_time\":1490947886,\"id\":\"20\",\"title\":null,\"tag\":null,\"poster\":null,\"update_time\":null}', '1490947887', '1');
INSERT INTO `log_detail` VALUES ('29', 'task_info', '{\"id\":\"15\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":\"1490762976\",\"update_time\":null}', '{\"id\":\"15\",\"name\":\"ceshi\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5001\",\"unit_sort\":1,\"tag\":null,\"poster\":null,\"create_time\":\"1490762976\",\"update_time\":1490947959}', '1490947960', '1');
INSERT INTO `log_detail` VALUES ('30', 'sk_habit_satge', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":null,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490948266,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490948267', '1');
INSERT INTO `log_detail` VALUES ('31', 'sk_habit_satge', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490948266\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490948289,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490948289', '1');
INSERT INTO `log_detail` VALUES ('32', 'sk_habit_satge', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490948289\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490948420,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490948420', '1');
INSERT INTO `log_detail` VALUES ('33', 'sk_habit_satge', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490948420\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490948636,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490948636', '1');
INSERT INTO `log_detail` VALUES ('34', 'sk_habit_satge', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490948636\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490948740,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490948740', '1');
INSERT INTO `log_detail` VALUES ('35', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490948740\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490948847,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490948847', '1');
INSERT INTO `log_detail` VALUES ('36', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490948847\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490948864,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490948864', '1');
INSERT INTO `log_detail` VALUES ('37', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490948864\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490949138,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490949139', '1');
INSERT INTO `log_detail` VALUES ('38', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490949138\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490949178,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490949178', '1');
INSERT INTO `log_detail` VALUES ('39', 'sk_live_task', 'url:127.0.0.1/index.php/liveTask/createpage= ', '{\"type\":\"2\",\"value_own\":\"3\",\"value\":\"6\",\"create_time\":1490949245,\"update_time\":1490949245,\"id\":\"2\"}', '1490949245', '1');
INSERT INTO `log_detail` VALUES ('40', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490949178\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490949299,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490949299', '1');
INSERT INTO `log_detail` VALUES ('41', 'task_info', '{\"id\":\"14\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":\"1490762932\",\"update_time\":null}', '{\"id\":\"14\",\"name\":\"nihao\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":1,\"tag\":null,\"poster\":null,\"create_time\":\"1490762932\",\"update_time\":1490949357}', '1490949357', '1');
INSERT INTO `log_detail` VALUES ('42', 'sk_live_task', 'url:127.0.0.1/index.php/liveTask/update/1page= {\"id\":\"1\",\"type\":\"1\",\"value_own\":\"1\",\"value\":\"2\",\"create_time\":null,\"update_time\":null}', '{\"id\":\"1\",\"type\":\"1\",\"value_own\":\"1\",\"value\":\"2\",\"create_time\":null,\"update_time\":1490949398}', '1490949398', '1');
INSERT INTO `log_detail` VALUES ('43', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490949299\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490949859,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490949860', '1');
INSERT INTO `log_detail` VALUES ('44', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490949859\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e94\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490950004,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490950004', '1');
INSERT INTO `log_detail` VALUES ('45', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e94\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490950004\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490950023,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490950023', '1');
INSERT INTO `log_detail` VALUES ('46', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490950023\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490950613,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490950614', '1');
INSERT INTO `log_detail` VALUES ('47', 'sk_live_task', 'url:127.0.0.1/index.php/liveTask/update/1page= {\"id\":\"1\",\"type\":\"1\",\"value_own\":\"1\",\"value\":\"2\",\"create_time\":null,\"update_time\":\"1490949398\"}', '{\"id\":\"1\",\"type\":\"1\",\"value_own\":\"2\",\"value\":\"2\",\"create_time\":null,\"update_time\":1490950622}', '1490950622', '1');
INSERT INTO `log_detail` VALUES ('48', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490950613\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490950771,\"state_1\":\"252\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490950772', '1');
INSERT INTO `log_detail` VALUES ('49', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490950771\",\"state_1\":\"252\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":null,\"stage_nu\":null,\"create_time\":null,\"update_time\":1490950790,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1490950790', '1');
INSERT INTO `log_detail` VALUES ('50', 'sk_habit', '', '{\"is_deleted\":0,\"name\":\"\\u7535\\u8111\",\"serial_nu\":\"1234556789\",\"stock\":\"200\",\"price\":\"5000\",\"wish_nu\":\"5000\",\"desc\":\"<img src=\\\"\\/uploads\\/image\\/20170331\\/20170331111016_73176.jpg\\\" alt=\\\"\\\" \\/><img src=\\\"\\/uploads\\/image\\/20170331\\/20170331111101_76123.jpg\\\" alt=\\\"\\\" \\/>\",\"create_time\":1490951464,\"ratio\":\"1:1\",\"id\":\"4\",\"cat_id\":null,\"poster\":null,\"update_time\":null}', '1490951465', '1');
INSERT INTO `log_detail` VALUES ('51', 'task_info', '{\"id\":\"1\",\"nick_name\":\"\\u6d4b\\u8bd5@\",\"password\":\"123456\",\"phone\":\"15156880287\",\"birth\":\"1990.01.02\",\"email\":\"1@qq.com\",\"gender\":\"0\",\"user_pic\":null,\"province\":\"\\u5b89\\u5fbd\\u7701\",\"city\":\"\\u5408\\u80a5\\u5e02\",\"area\":\"\\u5305\\u6cb3\\u533a\",\"profession\":\"0\",\"education\":\"0\",\"register_type\":\"1\",\"login_token\":null,\"last_login\":null,\"weixin_token\":null,\"qq_token\":null,\"weibo_token\":null,\"invite_code\":null,\"marry\":\"0\",\"children\":\"0\",\"create_time\":null,\"update_time\":null,\"name\":\"\\u6d4b\\u8bd5\",\"id_card\":\"1234567890\"}', '{\"id\":\"1\",\"nick_name\":\"\\u6d4b\\u8bd5@\",\"password\":\"123456\",\"phone\":\"15156880287\",\"birth\":\"1990.01.02\",\"email\":\"1@qq.com\",\"gender\":\"0\",\"user_pic\":null,\"province\":\"\\u5b89\\u5fbd\\u7701\",\"city\":\"\\u5408\\u80a5\\u5e02\",\"area\":\"\\u5305\\u6cb3\\u533a\",\"profession\":\"1\",\"education\":\"0\",\"register_type\":\"1\",\"login_token\":null,\"last_login\":null,\"weixin_token\":null,\"qq_token\":null,\"weibo_token\":null,\"invite_code\":null,\"marry\":\"0\",\"children\":\"0\",\"create_time\":1491030734,\"update_time\":1491030734,\"name\":\"\\u6d4b\\u8bd5\",\"id_card\":\"1234567890\"}', '1491030734', '1');
INSERT INTO `log_detail` VALUES ('52', 'task_info', '{\"id\":\"2\",\"nick_name\":\"xunao\",\"password\":\"123456\",\"phone\":\"123456789\",\"birth\":\"1989.01.02\",\"email\":\"987654321@qq.com\",\"gender\":\"1\",\"user_pic\":null,\"province\":null,\"city\":null,\"area\":null,\"profession\":\"1\",\"education\":\"2\",\"register_type\":\"1\",\"login_token\":null,\"last_login\":null,\"weixin_token\":null,\"qq_token\":null,\"weibo_token\":null,\"invite_code\":null,\"marry\":\"1\",\"children\":\"1\",\"create_time\":null,\"update_time\":null,\"name\":\"\\u6d4b\\u8bd52\",\"id_card\":\"987654321123456789\"}', '{\"id\":\"2\",\"nick_name\":\"xunao\",\"password\":\"123456\",\"phone\":\"123456789\",\"birth\":\"1989.01.02\",\"email\":\"987654321@qq.com\",\"gender\":\"1\",\"user_pic\":null,\"province\":null,\"city\":null,\"area\":null,\"profession\":\"1\",\"education\":\"2\",\"register_type\":\"1\",\"login_token\":null,\"last_login\":null,\"weixin_token\":null,\"qq_token\":null,\"weibo_token\":null,\"invite_code\":null,\"marry\":\"0\",\"children\":\"0\",\"create_time\":1491030822,\"update_time\":1491030822,\"name\":\"\\u6d4b\\u8bd52\",\"id_card\":\"987654321123456789\"}', '1491030822', '1');
INSERT INTO `log_detail` VALUES ('53', '', 'url:127.0.0.1/index.php/habit/deleteid=11 {\"id\":\"11\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"11\",\"name\":null,\"title\":null,\"unit\":null,\"unit_sort\":\"1\",\"tag\":null,\"poster\":null,\"create_time\":null,\"update_time\":null}', '1491032630', '1');
INSERT INTO `log_detail` VALUES ('54', 'sk_tree_show', 'url:127.0.0.1/index.php/treeShow/createpage= ', '{\"live_id\":\"1\",\"special\":0,\"content\":\"\\u4f60\\u597d\",\"stage\":\"2\",\"create_time\":1491037899,\"update_time\":1491037899,\"id\":\"2\"}', '1491037899', '1');
INSERT INTO `log_detail` VALUES ('55', 'sk_tree_show', 'url:127.0.0.1/index.php/treeShow/update/1page= {\"id\":\"1\",\"live_id\":\"1\",\"stage\":\"1\",\"content\":\"\\u597d\\u7684\",\"special\":\"1\",\"create_time\":\"1491033811\",\"update_time\":\"1491033811\"}', '{\"id\":\"1\",\"live_id\":\"1\",\"stage\":\"1\",\"content\":\"\\u597d\\u7684\",\"special\":\"1\",\"create_time\":\"1491033811\",\"update_time\":1491038751}', '1491038751', '1');
INSERT INTO `log_detail` VALUES ('56', 'sk_live_stage', 'url:127.0.0.1/index.php/treeStage/update/2page= {\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491026206\",\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"1\"}', '{\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491369544,\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '1491369544', '1');
INSERT INTO `log_detail` VALUES ('57', 'sk_live_stage', 'url:127.0.0.1/index.php/treeStage/update/2page= {\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491369544\",\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '{\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491369924,\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"1\"}', '1491369924', '1');
INSERT INTO `log_detail` VALUES ('58', 'sk_live_stage', 'url:127.0.0.1/index.php/treeStage/update/2page= {\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491369924\",\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"1\"}', '{\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491370008,\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '1491370009', '1');
INSERT INTO `log_detail` VALUES ('59', 'sk_live_stage', 'url:127.0.0.1/index.php/treeStage/update/2page= {\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491370008\",\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '{\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491371660,\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '1491371660', '1');
INSERT INTO `log_detail` VALUES ('60', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":\"10\",\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1490950790\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":\"15\",\"stage_nu\":null,\"create_time\":null,\"update_time\":1491377280,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1491377280', '1');
INSERT INTO `log_detail` VALUES ('61', 'task_info', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":\"15\",\"stage_nu\":null,\"create_time\":null,\"update_time\":\"1491377280\",\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '{\"id\":\"1\",\"habit_id\":null,\"stage\":\"\\u7b2c\\u4e00\\u9636\\u6bb5\",\"shine\":\"200\",\"perfect\":\"10\",\"stage_nu\":null,\"create_time\":null,\"update_time\":1491377293,\"state_1\":\"25\",\"state_2\":\"50\",\"state_3\":\"75\",\"state_4\":\"100\"}', '1491377294', '1');
INSERT INTO `log_detail` VALUES ('62', 'sk_butterfly', 'url:127.0.0.1/index.php/scalewing/update/1page= {\"id\":\"1\",\"name\":\"\\u6bdb\\u6bdb\\u866b\",\"value\":\"50\",\"value_type\":\"1\",\"create_time\":null,\"update_time\":null}', '{\"id\":\"1\",\"name\":\"\\u6bdb\\u6bdb\\u866b\",\"value\":\"51\",\"value_type\":\"1\",\"create_time\":null,\"update_time\":null}', '1491380109', '1');
INSERT INTO `log_detail` VALUES ('63', 'sk_butterfly', 'url:127.0.0.1/index.php/scalewing/createpage= ', '{\"name\":\"\\u86f9\",\"value\":\"100\",\"value_type\":\"1\",\"create_time\":1491380329,\"id\":\"2\",\"update_time\":null}', '1491380329', '1');
INSERT INTO `log_detail` VALUES ('64', 'sk_butterfly', 'url:127.0.0.1/index.php/scalewing/update/1page= {\"id\":\"1\",\"name\":\"\\u6bdb\\u6bdb\\u866b\",\"value\":\"51\",\"value_type\":\"1\",\"create_time\":null,\"update_time\":null}', '{\"id\":\"1\",\"name\":\"\\u6bdb\\u6bdb\\u866b\",\"value\":\"50\",\"value_type\":\"1\",\"create_time\":null,\"update_time\":null}', '1491380357', '1');
INSERT INTO `log_detail` VALUES ('65', 'task_info', '{\"id\":\"1\",\"name\":\"LED\\u62a4\\u773c\\u706f\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"990\",\"desc\":\"\\u53bb\",\"is_deleted\":\"0\",\"wish_nu\":\"100\",\"price\":\"99.99\",\"ratio\":\"1:2\",\"create_time\":\"1490869354\",\"update_time\":\"1490862261\",\"purchase_price\":\"99.99\",\"sale_price\":\"150\",\"discount_price\":\"100\",\"title\":null}', '{\"id\":\"1\",\"name\":\"LED\\u62a4\\u773c\\u706f\",\"cat_id\":null,\"serial_nu\":\"20111334\",\"poster\":null,\"stock\":\"990\",\"desc\":\"\\u53bb\",\"is_deleted\":\"0\",\"wish_nu\":\"99.99\",\"price\":\"99.99\",\"ratio\":\":\",\"create_time\":\"1490869354\",\"update_time\":1491380372,\"purchase_price\":\"99.99\",\"sale_price\":\"150\",\"discount_price\":\"100\",\"title\":\"\\u62a4\\u773c\\u706f\"}', '1491380373', '1');
INSERT INTO `log_detail` VALUES ('66', 'sk_butterfly', 'url:127.0.0.1/index.php/scalewing/createpage= ', '{\"name\":\"\\u5c0f\\u8774\\u8776\",\"value\":\"150\",\"value_type\":\"1\",\"create_time\":1491380384,\"id\":\"3\",\"update_time\":null}', '1491380384', '1');
INSERT INTO `log_detail` VALUES ('67', 'sk_butterfly', 'url:127.0.0.1/index.php/scalewing/createpage= ', '{\"name\":\"\\u5927\\u8774\\u8776\",\"value\":\"200\",\"value_type\":\"2\",\"create_time\":1491380420,\"id\":\"4\",\"update_time\":null}', '1491380420', '1');
INSERT INTO `log_detail` VALUES ('68', 'sk_live_stage', 'url:127.0.0.1/index.php/treeUpgrade/update/1page= {\"id\":\"1\",\"live_id\":\"1\",\"shape\":\"1\",\"stage\":\"1\",\"live_nu\":\"50\",\"duration\":\"5\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491026206\",\"stage_1\":\"1\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"1\"}', '{\"id\":\"1\",\"live_id\":\"1\",\"shape\":\"1\",\"stage\":\"1\",\"live_nu\":\"51\",\"duration\":\"5\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491383767,\"stage_1\":\"1\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"1\"}', '1491383767', '1');
INSERT INTO `log_detail` VALUES ('69', 'sk_live_stage', 'url:127.0.0.1/index.php/treeUpgrade/update/2page= {\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491371660\",\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '{\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"101\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491383823,\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '1491383823', '1');
INSERT INTO `log_detail` VALUES ('70', 'sk_live_stage', 'url:127.0.0.1/index.php/treeUpgrade/update/1page= {\"id\":\"1\",\"live_id\":\"1\",\"shape\":\"1\",\"stage\":\"1\",\"live_nu\":\"51\",\"duration\":\"5\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491383767\",\"stage_1\":\"1\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"1\"}', '{\"id\":\"1\",\"live_id\":\"1\",\"shape\":\"1\",\"stage\":\"1\",\"live_nu\":\"50\",\"duration\":\"5\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491383839,\"stage_1\":\"1\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"1\"}', '1491383839', '1');
INSERT INTO `log_detail` VALUES ('71', 'sk_live_stage', 'url:127.0.0.1/index.php/treeUpgrade/update/2page= {\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"101\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":\"1491383823\",\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '{\"id\":\"2\",\"live_id\":\"1\",\"shape\":\"2\",\"stage\":\"1\",\"live_nu\":\"100\",\"duration\":\"6\",\"sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"special_sign\":\"\\u5b9d\\u5b9d\\u6e34\\u4e86,\\u5b9d\\u5b9d\\u8981\\u5403\\u996d\\u996d,\\u5929\\u5929\\u6765\\u770b\\u6211\\u54e6,\\u9694\\u58c1\\u7684\\u6765\\u8fc7\\u4e86,\\u4eca\\u5929\\u5f88\\u5f00\\u5fc3\\u554a\",\"create_time\":\"1491026206\",\"update_time\":1491383858,\"stage_1\":\"2\",\"stage_2\":null,\"stage_3\":null,\"stage_4\":null,\"water\":\"10\",\"fertilize\":\"10\",\"water_own\":\"10\",\"fertilize_own\":\"10\",\"water_own_interval\":\"2\",\"fertilize_own_interval\":\"2\",\"extra_live\":\"2\"}', '1491383858', '1');
INSERT INTO `log_detail` VALUES ('72', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491449404', '1');
INSERT INTO `log_detail` VALUES ('73', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491449419', '1');
INSERT INTO `log_detail` VALUES ('74', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491449521', '1');
INSERT INTO `log_detail` VALUES ('75', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491449560', '1');
INSERT INTO `log_detail` VALUES ('76', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491449578', '1');
INSERT INTO `log_detail` VALUES ('77', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491454215', '1');
INSERT INTO `log_detail` VALUES ('78', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491454228', '1');
INSERT INTO `log_detail` VALUES ('79', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491454242', '1');
INSERT INTO `log_detail` VALUES ('80', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491454257', '1');
INSERT INTO `log_detail` VALUES ('81', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491454377', '1');
INSERT INTO `log_detail` VALUES ('82', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":null}', '1491454424', '1');
INSERT INTO `log_detail` VALUES ('83', 'task_info', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":null}', '{\"detail_id\":\"1\",\"order_id\":\"1\",\"order_type\":\"0\",\"product_id\":\"1\",\"user_id\":\"1\",\"pay_status\":\"0\",\"remarks\":\"\\u767d\\u8272\",\"number\":null,\"price\":null,\"fee\":null,\"shipping_status\":\"0\"}', '1491454580', '1');
INSERT INTO `log_detail` VALUES ('84', 'task_info', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":\"2\",\"tag\":\"1\",\"poster\":null,\"create_time\":null,\"update_time\":null}', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":0,\"tag\":\"1\",\"poster\":null,\"create_time\":null,\"update_time\":1491812977}', '1491812978', '1');
INSERT INTO `log_detail` VALUES ('85', 'task_info', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":\"0\",\"tag\":\"1\",\"poster\":null,\"create_time\":null,\"update_time\":\"1491812977\"}', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":1,\"tag\":\"1\",\"poster\":null,\"create_time\":null,\"update_time\":1491813419}', '1491813419', '1');
INSERT INTO `log_detail` VALUES ('86', 'task_info', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":\"1\",\"tag\":\"1\",\"poster\":null,\"create_time\":null,\"update_time\":\"1491813419\"}', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":1,\"tag\":\"1\",\"poster\":null,\"create_time\":null,\"update_time\":1491813436}', '1491813436', '1');
INSERT INTO `log_detail` VALUES ('87', 'task_info', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":\"1\",\"tag\":\"1\",\"poster\":null,\"create_time\":null,\"update_time\":\"1491813436\"}', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":1,\"tag\":\"1\",\"poster\":\"\",\"create_time\":null,\"update_time\":1491813921}', '1491813921', '1');
INSERT INTO `log_detail` VALUES ('88', 'task_info', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":\"1\",\"tag\":\"1\",\"poster\":\"\",\"create_time\":null,\"update_time\":\"1491813921\"}', '{\"id\":\"1\",\"name\":\"\\u65e9\\u7761\",\"title\":null,\"unit\":\"\\u5206\\u949f\",\"unit_sort\":1,\"tag\":\"1\",\"poster\":\"\\/uploads\\/images\\/2017-04\\/SivU254CrL.jpg\",\"create_time\":null,\"update_time\":1491814215}', '1491814215', '1');
INSERT INTO `log_detail` VALUES ('89', 'sk_habit', '', '{\"unit_sort\":\"-1\",\"name\":\"\\u65c5\\u6e38\",\"poster\":\"\\/uploads\\/images\\/2017-04\\/x5ADjm4LDg.jpg\",\"unit\":\"\\u5929\",\"create_time\":1491815392,\"id\":\"21\",\"title\":null,\"tag\":null,\"update_time\":null}', '1491815392', '1');
INSERT INTO `log_detail` VALUES ('90', 'sk_habit', '', '{\"unit_sort\":\"0\",\"name\":\"\\u6d4b\\u8bd5123\",\"poster\":\"\\/uploads\\/images\\/2017-04\\/7v3YsroiLH.jpg\",\"unit\":\"\\u79d2\",\"create_time\":1491815959,\"id\":\"22\",\"title\":null,\"tag\":null,\"update_time\":null}', '1491815959', '1');
INSERT INTO `log_detail` VALUES ('91', 'task_info', '{\"id\":\"16\",\"name\":\"\\u6d4b\\u8bd5001\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5001\",\"unit_sort\":\"1\",\"tag\":\"2\",\"poster\":null,\"create_time\":\"1490763131\",\"update_time\":null}', '{\"id\":\"16\",\"name\":\"\\u6d4b\\u8bd5001\",\"title\":null,\"unit\":\"\\u6d4b\\u8bd5001\",\"unit_sort\":1,\"tag\":\"\\u5065\\u5eb7\",\"poster\":\"\\/uploads\\/images\\/2017-04\\/4wOTU0TZrZ.jpg\",\"create_time\":\"1490763131\",\"update_time\":1491816247}', '1491816248', '1');

-- ----------------------------
-- Table structure for `publication_record`
-- ----------------------------
DROP TABLE IF EXISTS `publication_record`;
CREATE TABLE `publication_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '名称',
  `sex` int(2) DEFAULT NULL COMMENT '性别1男2女',
  `phone` varchar(11) COLLATE utf8_bin DEFAULT NULL COMMENT '手机号',
  `cate` int(2) DEFAULT NULL COMMENT '类别 ，1找人2人找车',
  `star_ad` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '出发地',
  `en_ad` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '终点站',
  `luguo` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '途径地',
  `date` date DEFAULT NULL COMMENT '出发日期',
  `time` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '出发时间',
  `num` int(11) DEFAULT NULL COMMENT '人数',
  `free` double(11,0) DEFAULT NULL COMMENT '费用',
  `wwe` int(11) DEFAULT NULL COMMENT '免责说明',
  `kong` int(11) DEFAULT NULL COMMENT '空几位',
  `carded` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '车型',
  `remark` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '不撑说明',
  `add_time` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '创建时间',
  `car_man` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '人车',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of publication_record
-- ----------------------------
INSERT INTO `publication_record` VALUES ('26', '杨女士', '2', '13866725293', '2', '泗县黑塔', '合肥市包河区工大北区', '', '2018-09-21', '2018-09-21 07:30', null, '90', '1', '2', '小轿车', '希望是老司机', '1505615890', '人找车');
INSERT INTO `publication_record` VALUES ('27', '王先生', '1', '13866963222', '1', '合肥肥东', '泗县草庙', '', '2018-09-28', '2018-09-28 14:30', null, '80', '1', '5', '商务车', '车内禁止吸烟', '1505622942', '车找人');
INSERT INTO `publication_record` VALUES ('28', '徐女士', '2', '13569632368', '2', '合肥包河万达广场', '泗县大庄', '', '2019-09-29', '2018-09-29 09:30', null, '100', '1', '1', '小轿车', '回家求带，请司机师傅联系我', '1505623742', '人找车');
INSERT INTO `publication_record` VALUES ('29', '李雪', '1', '18556557876', '2', '合肥天鹅湖', '泗县草沟', '', '2018-10-01', '2018-10-01 10:00', null, '90', '1', '2', '小轿车', '', '1505629762', '人找车');
INSERT INTO `publication_record` VALUES ('30', '程', '1', '13637171755', '1', '南京新街口', '合肥天鹅湖', '五河，定远', '2018-09-27', '2018-09-28 07:00', null, '100', '1', '2', '商务车', '', '1505632587', '车找人');
INSERT INTO `publication_record` VALUES ('32', '李女士', '2', '18155768667', '2', '肥东县城', '泗县', '', '2018-10-01', '2018-10-01 08:00', null, '90', '1', '1', '小轿车', '', '1505634137', '人找车');
INSERT INTO `publication_record` VALUES ('35', '许可', '1', '13866859632', '1', '上海东方明珠', '南京夫子庙', '', '2018-09-19', '2018-09-19 16:26', null, '50', '1', '5', '小轿车', '好无聊', '1505809681', '车找人');
INSERT INTO `publication_record` VALUES ('36', '何女士', '2', '13866859693', '2', '合肥逍遥津', '泗县', '', '2018-10-02', '2017-12-02 08:30', null, '85', '1', '1', '小轿车', '', '1505871379', '人找车');
INSERT INTO `publication_record` VALUES ('37', '杨先生', '1', '13866725293', '1', '合肥包河万达', '泗县山头', '五河，明光', '2018-10-01', '2017-12-01 09:00', null, '80', '1', '3', '小轿车', '全程高速途径泗县屏山，大庄', '1505884351', '车找人');
INSERT INTO `publication_record` VALUES ('38', '黑人', '1', '18021515218', '2', '合肥', '南京天润城地铁口', '', '2018-09-20', '2018-09-20 14:18', null, '120', '1', '2', '小轿车', '', '1505888379', '人找车');

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '题目',
  `choise` varchar(255) DEFAULT NULL COMMENT '选项',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='问卷';

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '您对今晚的活动是否满意？', '满意,一般,不满意', null);
INSERT INTO `question` VALUES ('2', '您觉得此次酒店自助餐烧烤档特色大全对您开发菜谱或创新菜品有帮助么？', '有,没有', null);
INSERT INTO `question` VALUES ('3', '您对今天分享的哪道菜谱／汁酱（腌料、蘸料）最有印象？', null, null);
INSERT INTO `question` VALUES ('4', '您会将这道菜／汁酱运用到您的烧烤档中去吗？', '会,不会', null);
INSERT INTO `question` VALUES ('5', '您对联合利华饮食策划旗下的哪一款产品感兴趣？', null, null);
INSERT INTO `question` VALUES ('6', '您对本次活动还有其它建议吗？（例如了解其它特色烧烤主题、其它特色汁酱等）', null, null);
INSERT INTO `question` VALUES ('7', '', null, null);

-- ----------------------------
-- Table structure for `questions`
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques2` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques3` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques4` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques5` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques6` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques7` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques8` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques9` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ques10` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of questions
-- ----------------------------

-- ----------------------------
-- Table structure for `upload`
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(20) COLLATE utf8_bin NOT NULL,
  `fileurl` varchar(30) COLLATE utf8_bin NOT NULL,
  `time` int(20) NOT NULL,
  `zan` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of upload
-- ----------------------------
INSERT INTO `upload` VALUES ('26', '杨柳', '13866858569', '/uploads/images/IMG_1478.JPG', '1495415334', '7');
INSERT INTO `upload` VALUES ('30', '杨', '15688888888', '/uploads/images/875752610.jpeg', '1495415646', '4');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `phone` varchar(11) COLLATE utf8_bin DEFAULT NULL COMMENT '手机号',
  `city` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '城市',
  `corporate` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '公司名称',
  `job` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '职业',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('24', 'yrxiao', '2147483647', 'hefei', 'xunao', '连锁店老板', '1494863884');
INSERT INTO `user` VALUES ('25', '雨涵', '2147483647', 'hed', 'xunao', '面包店老板', '1494864410');
INSERT INTO `user` VALUES ('26', '杨柳', '2147483647', '合肥', '百度', '调味品经销商／批发商', '1494864647');
INSERT INTO `user` VALUES ('27', 'Kerwin', '2147483647', '合肥', '上海', '连锁店采购', '1494864659');
INSERT INTO `user` VALUES ('28', '杨威', '13869636356', '合肥', '越多越好', '调味品经销商／批发商', '1494914276');
INSERT INTO `user` VALUES ('29', '姓名', '13866859686', '所在城市', '公司名称', '行政总厨', '1494916508');
INSERT INTO `user` VALUES ('30', '姓名', '13866565656', '所在城市', '公司名称', '行政总厨', '1494917585');
INSERT INTO `user` VALUES ('31', '123', '13866725293', '请问', '请问', '行政总厨', '1495014500');
INSERT INTO `user` VALUES ('32', '123', '13866725293', '请问', '请问', '行政总厨', '1495014502');
