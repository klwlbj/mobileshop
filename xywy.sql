/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xywy

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-14 17:15:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_ad
-- ----------------------------
DROP TABLE IF EXISTS `sp_ad`;
CREATE TABLE `sp_ad` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `adname` varchar(45) NOT NULL COMMENT '广告名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '广告类型 1：代表图片  2：代表动画',
  `picurl` varchar(60) NOT NULL COMMENT '广告图片',
  `link` varchar(60) NOT NULL COMMENT '链接地址',
  `ison` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否启用 0：代表不启用 1：代表启用',
  `posid` mediumint(9) NOT NULL COMMENT '所属广告位',
  PRIMARY KEY (`id`),
  KEY `posid` (`posid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_ad
-- ----------------------------

-- ----------------------------
-- Table structure for sp_address
-- ----------------------------
DROP TABLE IF EXISTS `sp_address`;
CREATE TABLE `sp_address` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) NOT NULL DEFAULT '1',
  `address` text NOT NULL,
  `phone` bigint(20) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `set` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `province` varchar(30) NOT NULL DEFAULT '00',
  `city` varchar(30) NOT NULL DEFAULT '000',
  `district` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='地址表';

-- ----------------------------
-- Records of sp_address
-- ----------------------------
INSERT INTO `sp_address` VALUES ('9', '15', '木烤火杘', '15626140870', '灶秋士竹', '0', '北京市', '北京市市辖区', '昌平区');
INSERT INTO `sp_address` VALUES ('8', '15', '木紧紧地', '15626140870', '烤火', '0', '北京市', '北京市市辖区', '石景山区');
INSERT INTO `sp_address` VALUES ('23', '15', '火杘火杘火尸', '15626140870', '标榜着', '0', '北京市', '北京市市辖区', '东城区');

-- ----------------------------
-- Table structure for sp_admin
-- ----------------------------
DROP TABLE IF EXISTS `sp_admin`;
CREATE TABLE `sp_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `username` varchar(20) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_admin
-- ----------------------------
INSERT INTO `sp_admin` VALUES ('1', 'ydx', 'bf54a49a3c8c10e91a0e204cfc8e0446');

-- ----------------------------
-- Table structure for sp_adpic
-- ----------------------------
DROP TABLE IF EXISTS `sp_adpic`;
CREATE TABLE `sp_adpic` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '动画广告图片id',
  `imgurl` varchar(60) NOT NULL COMMENT '图片地址',
  `links` varchar(60) NOT NULL COMMENT '链接地址',
  `adid` mediumint(9) NOT NULL COMMENT '所属广告id',
  PRIMARY KEY (`id`),
  KEY `adid` (`adid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_adpic
-- ----------------------------

-- ----------------------------
-- Table structure for sp_adpos
-- ----------------------------
DROP TABLE IF EXISTS `sp_adpos`;
CREATE TABLE `sp_adpos` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '广告位id',
  `pname` varchar(45) NOT NULL COMMENT '广告位名称',
  `width` smallint(5) unsigned NOT NULL COMMENT '广告位宽度',
  `height` smallint(5) unsigned NOT NULL COMMENT '广告位高度',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_adpos
-- ----------------------------

-- ----------------------------
-- Table structure for sp_article
-- ----------------------------
DROP TABLE IF EXISTS `sp_article`;
CREATE TABLE `sp_article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(45) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `cateid` mediumint(9) NOT NULL COMMENT '文章所属栏目',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_article
-- ----------------------------
INSERT INTO `sp_article` VALUES ('1', '全场满58元免邮费', '&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑; line-height: 30px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;全场满58元免邮费&lt;/span&gt;&lt;/p&gt;', '1');
INSERT INTO `sp_article` VALUES ('2', '蔬菜今日八折，欢迎选购', '&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑; line-height: 30px; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;蔬菜今日八折，欢迎选购&lt;/span&gt;&lt;/p&gt;', '1');

-- ----------------------------
-- Table structure for sp_attr
-- ----------------------------
DROP TABLE IF EXISTS `sp_attr`;
CREATE TABLE `sp_attr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(20) NOT NULL COMMENT '属性名称',
  `attr_type` enum('0','1') NOT NULL COMMENT '属性类型 0:唯一属性 1：单选属性',
  `attr_values` text NOT NULL COMMENT '属性值',
  `type_id` mediumint(9) NOT NULL COMMENT '对应类型id',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_attr
-- ----------------------------
INSERT INTO `sp_attr` VALUES ('1', '销售方式', '0', '斤,包', '1');
INSERT INTO `sp_attr` VALUES ('2', '级别', '0', '干茶树菇,新鲜茶树菇', '2');

-- ----------------------------
-- Table structure for sp_attrser
-- ----------------------------
DROP TABLE IF EXISTS `sp_attrser`;
CREATE TABLE `sp_attrser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '搜索属性id',
  `attr_id` mediumint(9) NOT NULL COMMENT '属性id',
  `attr_value` varchar(60) NOT NULL COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_attrser
-- ----------------------------

-- ----------------------------
-- Table structure for sp_brand
-- ----------------------------
DROP TABLE IF EXISTS `sp_brand`;
CREATE TABLE `sp_brand` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) NOT NULL,
  `brand_logo` varchar(100) NOT NULL,
  `brand_url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_brand
-- ----------------------------

-- ----------------------------
-- Table structure for sp_cate
-- ----------------------------
DROP TABLE IF EXISTS `sp_cate`;
CREATE TABLE `sp_cate` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `catename` varchar(30) NOT NULL COMMENT '栏目名称',
  `pid` smallint(5) NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  `search_attr_id` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=335 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_cate
-- ----------------------------
INSERT INTO `sp_cate` VALUES ('14', '玩具', '0', '');
INSERT INTO `sp_cate` VALUES ('15', '副食品', '0', '');
INSERT INTO `sp_cate` VALUES ('16', '牛奶酒水', '0', '');
INSERT INTO `sp_cate` VALUES ('17', '茶饮', '0', '');
INSERT INTO `sp_cate` VALUES ('18', '生活用品', '0', '');
INSERT INTO `sp_cate` VALUES ('19', '文化用品', '0', '');
INSERT INTO `sp_cate` VALUES ('20', '鲜花礼品', '0', '');
INSERT INTO `sp_cate` VALUES ('21', '定制服务', '0', '');
INSERT INTO `sp_cate` VALUES ('22', '食品', '14', '');
INSERT INTO `sp_cate` VALUES ('23', '食品', '14', '');
INSERT INTO `sp_cate` VALUES ('24', '食品', '14', '');
INSERT INTO `sp_cate` VALUES ('25', '食品', '14', '');
INSERT INTO `sp_cate` VALUES ('26', '食品', '14', '');
INSERT INTO `sp_cate` VALUES ('27', '食品', '14', '');
INSERT INTO `sp_cate` VALUES ('28', '食品', '15', '');
INSERT INTO `sp_cate` VALUES ('29', '食品', '15', '');
INSERT INTO `sp_cate` VALUES ('30', '食品', '15', '');
INSERT INTO `sp_cate` VALUES ('31', '食品', '15', '');
INSERT INTO `sp_cate` VALUES ('32', '食品', '15', '');
INSERT INTO `sp_cate` VALUES ('33', '食品', '16', '');
INSERT INTO `sp_cate` VALUES ('34', '食品', '16', '');
INSERT INTO `sp_cate` VALUES ('35', '食品', '16', '');
INSERT INTO `sp_cate` VALUES ('36', '食品', '16', '');
INSERT INTO `sp_cate` VALUES ('37', '食品', '16', '');
INSERT INTO `sp_cate` VALUES ('38', '食品', '16', '');
INSERT INTO `sp_cate` VALUES ('39', '食品', '16', '');
INSERT INTO `sp_cate` VALUES ('40', '食品', '17', '');
INSERT INTO `sp_cate` VALUES ('41', '食品', '17', '');
INSERT INTO `sp_cate` VALUES ('42', '食品', '17', '');
INSERT INTO `sp_cate` VALUES ('43', '食品', '17', '');
INSERT INTO `sp_cate` VALUES ('44', '食品', '17', '');
INSERT INTO `sp_cate` VALUES ('45', '食品', '18', '');
INSERT INTO `sp_cate` VALUES ('46', '食品', '18', '');
INSERT INTO `sp_cate` VALUES ('47', '食品', '18', '');
INSERT INTO `sp_cate` VALUES ('48', '食品', '18', '');
INSERT INTO `sp_cate` VALUES ('49', '食品', '19', '');
INSERT INTO `sp_cate` VALUES ('50', '食品', '19', '');
INSERT INTO `sp_cate` VALUES ('51', '食品', '19', '');
INSERT INTO `sp_cate` VALUES ('52', '食品', '19', '');
INSERT INTO `sp_cate` VALUES ('53', '食品', '19', '');
INSERT INTO `sp_cate` VALUES ('54', '食品', '20', '');
INSERT INTO `sp_cate` VALUES ('55', '食品', '20', '');
INSERT INTO `sp_cate` VALUES ('56', '食品', '20', '');
INSERT INTO `sp_cate` VALUES ('57', '食品', '21', '');
INSERT INTO `sp_cate` VALUES ('58', '食品', '21', '');
INSERT INTO `sp_cate` VALUES ('59', '食品', '21', '');
INSERT INTO `sp_cate` VALUES ('60', '食品', '21', '');
INSERT INTO `sp_cate` VALUES ('61', '食品', '21', '');
INSERT INTO `sp_cate` VALUES ('62', '食品', '21', '');
INSERT INTO `sp_cate` VALUES ('63', '食品', '21', '');
INSERT INTO `sp_cate` VALUES ('64', '食品', '22', '');
INSERT INTO `sp_cate` VALUES ('65', '食品', '22', '');
INSERT INTO `sp_cate` VALUES ('66', '食品', '22', '');
INSERT INTO `sp_cate` VALUES ('67', '食品', '22', '');
INSERT INTO `sp_cate` VALUES ('68', '食品', '22', '');
INSERT INTO `sp_cate` VALUES ('69', '食品', '22', '');
INSERT INTO `sp_cate` VALUES ('70', '食品', '22', '');
INSERT INTO `sp_cate` VALUES ('71', '食品', '23', '');
INSERT INTO `sp_cate` VALUES ('72', '食品', '23', '');
INSERT INTO `sp_cate` VALUES ('73', '食品', '23', '');
INSERT INTO `sp_cate` VALUES ('74', '食品', '23', '');
INSERT INTO `sp_cate` VALUES ('75', '食品', '23', '');
INSERT INTO `sp_cate` VALUES ('76', '食品', '23', '');
INSERT INTO `sp_cate` VALUES ('77', '食品', '24', '');
INSERT INTO `sp_cate` VALUES ('78', '食品', '24', '');
INSERT INTO `sp_cate` VALUES ('79', '食品', '24', '');
INSERT INTO `sp_cate` VALUES ('80', '食品', '24', '');
INSERT INTO `sp_cate` VALUES ('81', '食品', '24', '');
INSERT INTO `sp_cate` VALUES ('82', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('83', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('84', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('85', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('86', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('87', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('88', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('89', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('90', '食品', '25', '');
INSERT INTO `sp_cate` VALUES ('91', '食品', '26', '');
INSERT INTO `sp_cate` VALUES ('92', '食品', '26', '');
INSERT INTO `sp_cate` VALUES ('93', '食品', '26', '');
INSERT INTO `sp_cate` VALUES ('94', '食品', '26', '');
INSERT INTO `sp_cate` VALUES ('95', '食品', '27', '');
INSERT INTO `sp_cate` VALUES ('96', '食品', '27', '');
INSERT INTO `sp_cate` VALUES ('97', '食品', '27', '');
INSERT INTO `sp_cate` VALUES ('98', '食品', '27', '');
INSERT INTO `sp_cate` VALUES ('99', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('100', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('101', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('102', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('103', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('104', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('105', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('106', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('107', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('108', '食品', '28', '');
INSERT INTO `sp_cate` VALUES ('109', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('110', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('111', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('112', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('113', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('114', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('115', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('116', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('117', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('118', '食品', '29', '');
INSERT INTO `sp_cate` VALUES ('119', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('120', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('121', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('122', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('123', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('124', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('125', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('126', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('127', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('128', '食品', '30', '');
INSERT INTO `sp_cate` VALUES ('129', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('130', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('131', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('132', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('133', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('134', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('135', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('136', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('137', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('138', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('139', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('140', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('141', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('142', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('143', '食品', '31', '');
INSERT INTO `sp_cate` VALUES ('144', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('145', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('146', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('147', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('148', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('149', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('150', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('151', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('152', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('153', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('154', '食品', '32', '');
INSERT INTO `sp_cate` VALUES ('155', '食品', '33', '');
INSERT INTO `sp_cate` VALUES ('156', '食品', '33', '');
INSERT INTO `sp_cate` VALUES ('157', '食品', '33', '');
INSERT INTO `sp_cate` VALUES ('158', '食品', '33', '');
INSERT INTO `sp_cate` VALUES ('159', '食品', '33', '');
INSERT INTO `sp_cate` VALUES ('160', '食品', '33', '');
INSERT INTO `sp_cate` VALUES ('161', '食品', '34', '');
INSERT INTO `sp_cate` VALUES ('162', '食品', '34', '');
INSERT INTO `sp_cate` VALUES ('163', '食品', '34', '');
INSERT INTO `sp_cate` VALUES ('164', '食品', '34', '');
INSERT INTO `sp_cate` VALUES ('165', '食品', '34', '');
INSERT INTO `sp_cate` VALUES ('166', '食品', '34', '');
INSERT INTO `sp_cate` VALUES ('167', '食品', '34', '');
INSERT INTO `sp_cate` VALUES ('168', '食品', '35', '');
INSERT INTO `sp_cate` VALUES ('169', '食品', '35', '');
INSERT INTO `sp_cate` VALUES ('170', '食品', '35', '');
INSERT INTO `sp_cate` VALUES ('171', '食品', '35', '');
INSERT INTO `sp_cate` VALUES ('172', '食品', '36', '');
INSERT INTO `sp_cate` VALUES ('173', '食品', '36', '');
INSERT INTO `sp_cate` VALUES ('174', '食品', '36', '');
INSERT INTO `sp_cate` VALUES ('175', '食品', '36', '');
INSERT INTO `sp_cate` VALUES ('176', '食品', '37', '');
INSERT INTO `sp_cate` VALUES ('177', '食品', '37', '');
INSERT INTO `sp_cate` VALUES ('178', '食品', '37', '');
INSERT INTO `sp_cate` VALUES ('179', '食品', '37', '');
INSERT INTO `sp_cate` VALUES ('180', '食品', '38', '');
INSERT INTO `sp_cate` VALUES ('181', '食品', '38', '');
INSERT INTO `sp_cate` VALUES ('182', '食品', '38', '');
INSERT INTO `sp_cate` VALUES ('183', '食品', '38', '');
INSERT INTO `sp_cate` VALUES ('184', '食品', '38', '');
INSERT INTO `sp_cate` VALUES ('185', '食品', '39', '');
INSERT INTO `sp_cate` VALUES ('186', '食品', '39', '');
INSERT INTO `sp_cate` VALUES ('187', '食品', '39', '');
INSERT INTO `sp_cate` VALUES ('188', '食品', '39', '');
INSERT INTO `sp_cate` VALUES ('189', '食品', '40', '');
INSERT INTO `sp_cate` VALUES ('190', '食品', '40', '');
INSERT INTO `sp_cate` VALUES ('191', '食品', '40', '');
INSERT INTO `sp_cate` VALUES ('192', '食品', '40', '');
INSERT INTO `sp_cate` VALUES ('193', '食品', '40', '');
INSERT INTO `sp_cate` VALUES ('194', '食品', '41', '');
INSERT INTO `sp_cate` VALUES ('195', '食品', '41', '');
INSERT INTO `sp_cate` VALUES ('196', '食品', '41', '');
INSERT INTO `sp_cate` VALUES ('197', '食品', '41', '');
INSERT INTO `sp_cate` VALUES ('198', '食品', '41', '');
INSERT INTO `sp_cate` VALUES ('199', '食品', '42', '');
INSERT INTO `sp_cate` VALUES ('200', '食品', '42', '');
INSERT INTO `sp_cate` VALUES ('201', '食品', '42', '');
INSERT INTO `sp_cate` VALUES ('202', '食品', '42', '');
INSERT INTO `sp_cate` VALUES ('203', '食品', '42', '');
INSERT INTO `sp_cate` VALUES ('204', '食品', '43', '');
INSERT INTO `sp_cate` VALUES ('205', '食品', '43', '');
INSERT INTO `sp_cate` VALUES ('206', '食品', '43', '');
INSERT INTO `sp_cate` VALUES ('207', '食品', '43', '');
INSERT INTO `sp_cate` VALUES ('208', '食品', '43', '');
INSERT INTO `sp_cate` VALUES ('209', '食品', '44', '');
INSERT INTO `sp_cate` VALUES ('210', '食品', '44', '');
INSERT INTO `sp_cate` VALUES ('211', '食品', '44', '');
INSERT INTO `sp_cate` VALUES ('212', '食品', '44', '');
INSERT INTO `sp_cate` VALUES ('213', '食品', '44', '');
INSERT INTO `sp_cate` VALUES ('214', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('215', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('216', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('217', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('218', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('219', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('220', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('221', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('222', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('223', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('224', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('225', '食品', '45', '');
INSERT INTO `sp_cate` VALUES ('226', '食品', '46', '');
INSERT INTO `sp_cate` VALUES ('227', '食品', '46', '');
INSERT INTO `sp_cate` VALUES ('228', '食品', '46', '');
INSERT INTO `sp_cate` VALUES ('229', '食品', '46', '');
INSERT INTO `sp_cate` VALUES ('230', '食品', '46', '');
INSERT INTO `sp_cate` VALUES ('231', '食品', '47', '');
INSERT INTO `sp_cate` VALUES ('232', '食品', '47', '');
INSERT INTO `sp_cate` VALUES ('233', '食品', '47', '');
INSERT INTO `sp_cate` VALUES ('234', '食品', '47', '');
INSERT INTO `sp_cate` VALUES ('235', '食品', '47', '');
INSERT INTO `sp_cate` VALUES ('236', '食品', '48', '');
INSERT INTO `sp_cate` VALUES ('237', '食品', '48', '');
INSERT INTO `sp_cate` VALUES ('238', '食品', '48', '');
INSERT INTO `sp_cate` VALUES ('239', '食品', '48', '');
INSERT INTO `sp_cate` VALUES ('240', '食品', '48', '');
INSERT INTO `sp_cate` VALUES ('241', '食品', '49', '');
INSERT INTO `sp_cate` VALUES ('242', '食品', '49', '');
INSERT INTO `sp_cate` VALUES ('243', '食品', '49', '');
INSERT INTO `sp_cate` VALUES ('244', '食品', '49', '');
INSERT INTO `sp_cate` VALUES ('245', '食品', '50', '');
INSERT INTO `sp_cate` VALUES ('246', '食品', '50', '');
INSERT INTO `sp_cate` VALUES ('247', '食品', '50', '');
INSERT INTO `sp_cate` VALUES ('248', '食品', '51', '');
INSERT INTO `sp_cate` VALUES ('249', '食品', '51', '');
INSERT INTO `sp_cate` VALUES ('250', '食品', '51', '');
INSERT INTO `sp_cate` VALUES ('251', '食品', '51', '');
INSERT INTO `sp_cate` VALUES ('252', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('253', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('254', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('255', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('256', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('257', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('258', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('259', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('260', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('261', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('262', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('263', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('264', '食品', '52', '');
INSERT INTO `sp_cate` VALUES ('265', '食品', '53', '');
INSERT INTO `sp_cate` VALUES ('266', '食品', '53', '');
INSERT INTO `sp_cate` VALUES ('267', '食品', '53', '');
INSERT INTO `sp_cate` VALUES ('268', '食品', '53', '');
INSERT INTO `sp_cate` VALUES ('269', '食品', '53', '');
INSERT INTO `sp_cate` VALUES ('270', '食品', '53', '');
INSERT INTO `sp_cate` VALUES ('271', '食品', '53', '');
INSERT INTO `sp_cate` VALUES ('272', '食品', '54', '');
INSERT INTO `sp_cate` VALUES ('273', '食品', '54', '');
INSERT INTO `sp_cate` VALUES ('274', '食品', '54', '');
INSERT INTO `sp_cate` VALUES ('275', '食品', '54', '');
INSERT INTO `sp_cate` VALUES ('276', '食品', '55', '');
INSERT INTO `sp_cate` VALUES ('277', '食品', '56', '');
INSERT INTO `sp_cate` VALUES ('278', '食品', '56', '');
INSERT INTO `sp_cate` VALUES ('279', '食品', '56', '');
INSERT INTO `sp_cate` VALUES ('280', '食品', '56', '');
INSERT INTO `sp_cate` VALUES ('281', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('282', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('283', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('284', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('285', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('286', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('287', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('288', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('289', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('290', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('291', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('292', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('293', '食品', '57', '');
INSERT INTO `sp_cate` VALUES ('294', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('295', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('296', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('297', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('298', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('299', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('300', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('301', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('302', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('303', '食品', '58', '');
INSERT INTO `sp_cate` VALUES ('304', '食品', '59', '');
INSERT INTO `sp_cate` VALUES ('305', '食品', '59', '');
INSERT INTO `sp_cate` VALUES ('306', '食品', '59', '');
INSERT INTO `sp_cate` VALUES ('307', '食品', '59', '');
INSERT INTO `sp_cate` VALUES ('308', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('309', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('310', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('311', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('312', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('313', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('314', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('315', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('316', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('317', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('318', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('319', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('320', '食品', '60', '');
INSERT INTO `sp_cate` VALUES ('321', '食品', '61', '');
INSERT INTO `sp_cate` VALUES ('322', '食品', '61', '');
INSERT INTO `sp_cate` VALUES ('323', '食品', '61', '');
INSERT INTO `sp_cate` VALUES ('324', '食品', '61', '');
INSERT INTO `sp_cate` VALUES ('325', '食品', '61', '');
INSERT INTO `sp_cate` VALUES ('326', '食品', '62', '');
INSERT INTO `sp_cate` VALUES ('327', '食品', '62', '');
INSERT INTO `sp_cate` VALUES ('328', '食品', '62', '');
INSERT INTO `sp_cate` VALUES ('329', '食品', '62', '');
INSERT INTO `sp_cate` VALUES ('330', '食品', '62', '');
INSERT INTO `sp_cate` VALUES ('331', '食品', '63', '');
INSERT INTO `sp_cate` VALUES ('332', '食品', '63', '');
INSERT INTO `sp_cate` VALUES ('333', '食品', '63', '');
INSERT INTO `sp_cate` VALUES ('334', '食品', '63', '');

-- ----------------------------
-- Table structure for sp_category
-- ----------------------------
DROP TABLE IF EXISTS `sp_category`;
CREATE TABLE `sp_category` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章栏目id',
  `catename` varchar(45) NOT NULL COMMENT '文章栏目名称',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章栏目类型 0：普通栏目类型  1：帮助栏目类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_category
-- ----------------------------
INSERT INTO `sp_category` VALUES ('1', '最新活动', '1');
INSERT INTO `sp_category` VALUES ('2', '商城公告', '1');

-- ----------------------------
-- Table structure for sp_config
-- ----------------------------
DROP TABLE IF EXISTS `sp_config`;
CREATE TABLE `sp_config` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '配置项id',
  `enname` varchar(30) NOT NULL COMMENT '配置英文名称',
  `cnname` varchar(30) NOT NULL COMMENT '配置中文名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置类型 1：文本框 2：文本域 3：单选按钮 4：复选框 5：下拉菜单',
  `values` varchar(160) DEFAULT NULL COMMENT '配置可选值',
  `value` varchar(60) DEFAULT NULL COMMENT '配置选定值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_config
-- ----------------------------

-- ----------------------------
-- Table structure for sp_dingdan
-- ----------------------------
DROP TABLE IF EXISTS `sp_dingdan`;
CREATE TABLE `sp_dingdan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sid` int(10) DEFAULT NULL,
  `truename` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `ProvinceId` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_dingdan
-- ----------------------------
INSERT INTO `sp_dingdan` VALUES ('1', '79', '张三', '18817788896', '440000', '广州市天河区兴华街道', '到付');
INSERT INTO `sp_dingdan` VALUES ('2', '79', '李四', '18818115566', '440000', '广州市天河区燕塘地铁站A出口', '需要今天发货');
INSERT INTO `sp_dingdan` VALUES ('3', '78', '王五', '18744455566', '440000', '广州市白云区金沙洲', '尽快发货，到付');
INSERT INTO `sp_dingdan` VALUES ('4', '79', '张珊珊', '18699988877', '440000', '广州市天河区粤垦路', '尽快发到付');

-- ----------------------------
-- Table structure for sp_dingdans
-- ----------------------------
DROP TABLE IF EXISTS `sp_dingdans`;
CREATE TABLE `sp_dingdans` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `truename` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `fptt` varchar(50) DEFAULT NULL,
  `data` text,
  `sn` varchar(50) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `ipdz` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_dingdans
-- ----------------------------
INSERT INTO `sp_dingdans` VALUES ('31', 'klwlbj', '15', '灶秋士竹', '15626140870', '北京市北京市市辖区昌平区木烤火杘', '', '', '[[{\"id\":\"79\",\"goods_name\":\"\\u7ca4\\u7ca4 \\u73ab\\u7470\\u67e0\\u6aac\\u8336(\\u4ee3\\u7528\\u8336) 3g*6\\u888b\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/5be3fb723ebaa.JPG\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/sm_5be3fb723ebaa.JPG\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/mid_5be3fb723ebaa.JPG\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/max_5be3fb723ebaa.JPG\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b64a079c4.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"100.00\",\"vip2_price\":\"100.00\",\"vip3_price\":\"100.00\",\"vip4_price\":\"100.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":100}],100]', '1542073059403', '1542073059', '127.0.0.1', '');
INSERT INTO `sp_dingdans` VALUES ('32', 'klwlbj', '15', '烤火', '15626140870', '北京市北京市市辖区东城区木紧紧地', '', '', '[[{\"id\":\"79\",\"goods_name\":\"\\u7ca4\\u7ca4 \\u73ab\\u7470\\u67e0\\u6aac\\u8336(\\u4ee3\\u7528\\u8336) 3g*6\\u888b\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/5be3fb723ebaa.JPG\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/sm_5be3fb723ebaa.JPG\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/mid_5be3fb723ebaa.JPG\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/max_5be3fb723ebaa.JPG\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b64a079c4.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"100.00\",\"vip2_price\":\"100.00\",\"vip3_price\":\"100.00\",\"vip4_price\":\"100.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":100}],100]', '1542073366453', '1542073366', '127.0.0.1', '');
INSERT INTO `sp_dingdans` VALUES ('33', 'klwlbj', '15', '烤火', '15626140870', '北京市北京市市辖区东城区木紧紧地', '', '', '[[{\"id\":\"81\",\"goods_name\":\"\\u7ca4\\u7ca4 \\u73ab\\u7470\\u67e0\\u6aac\\u8336(\\u4ee3\\u7528\\u8336) 3g*6\\u888b4\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/5be3fb723ebaa.JPG\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/sm_5be3fb723ebaa.JPG\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/mid_5be3fb723ebaa.JPG\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/max_5be3fb723ebaa.JPG\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b64a079c4.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"100.00\",\"vip2_price\":\"100.00\",\"vip3_price\":\"100.00\",\"vip4_price\":\"100.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"\\u76d2\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":100}],100]', '1542088880749', '1542088880', '127.0.0.1', '');
INSERT INTO `sp_dingdans` VALUES ('34', '123456', '13', null, null, '', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u7ca4\\u7ca4 \\u73ab\\u7470\\u67e0\\u6aac\\u8336(\\u4ee3\\u7528\\u8336) 3g*6\\u888b1\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/5be3fb723ebaa.JPG\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/sm_5be3fb723ebaa.JPG\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/mid_5be3fb723ebaa.JPG\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/max_5be3fb723ebaa.JPG\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b64a079c4.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"vip2_price\":\"100.00\",\"vip3_price\":\"100.00\",\"vip4_price\":\"100.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"\\u76d2\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208}],208]', '1542089048886', '1542089048', '127.0.0.1', '');
INSERT INTO `sp_dingdans` VALUES ('35', '123456', '13', null, null, '', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u7ca4\\u7ca4 \\u73ab\\u7470\\u67e0\\u6aac\\u8336(\\u4ee3\\u7528\\u8336) 3g*6\\u888b1\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/5be3fb723ebaa.JPG\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/sm_5be3fb723ebaa.JPG\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/mid_5be3fb723ebaa.JPG\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/max_5be3fb723ebaa.JPG\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b64a079c4.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"vip2_price\":\"100.00\",\"vip3_price\":\"100.00\",\"vip4_price\":\"100.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"\\u76d2\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208}],208]', '1542089177788', '1542089177', '127.0.0.1', '');
INSERT INTO `sp_dingdans` VALUES ('36', 'klwlbj', '15', '烤火', '15626140870', '北京市北京市市辖区东城区木紧紧地', '', '', '[[{\"id\":\"85\",\"goods_name\":\"\\u7ca4\\u7ca4 \\u73ab\\u7470\\u67e0\\u6aac\\u8336(\\u4ee3\\u7528\\u8336) 3g*6\\u888b8\",\"goods_sn\":\"1539617916631732\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/5be3fb723ebaa.JPG\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/sm_5be3fb723ebaa.JPG\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/mid_5be3fb723ebaa.JPG\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/max_5be3fb723ebaa.JPG\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b64a079c4.jpg\",\"market_price\":\"275.00\",\"shop_price\":\"100.00\",\"vip2_price\":\"100.00\",\"vip3_price\":\"100.00\",\"vip4_price\":\"100.00\",\"onsale\":\"1\",\"cate_id\":\"237\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"\\u76d2\",\"sms\":null,\"addtime\":\"1539617916\",\"updatetime\":\"1539617916\",\"count\":\"1\",\"xj\":100}],100]', '1542092332581', '1542092332', '127.0.0.1', '');
INSERT INTO `sp_dingdans` VALUES ('37', 'klwlbj', '15', null, null, '', '', '', '[[{\"id\":\"81\",\"goods_name\":\"\\u7ca4\\u7ca4 \\u73ab\\u7470\\u67e0\\u6aac\\u8336(\\u4ee3\\u7528\\u8336) 3g*6\\u888b4\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/5be3fb723ebaa.JPG\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/sm_5be3fb723ebaa.JPG\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/mid_5be3fb723ebaa.JPG\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-11-08\\/max_5be3fb723ebaa.JPG\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b64a079c4.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"100.00\",\"vip2_price\":\"100.00\",\"vip3_price\":\"100.00\",\"vip4_price\":\"100.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"\\u76d2\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":100}],100]', '1542180927132', '1542180927', '127.0.0.1', '');

-- ----------------------------
-- Table structure for sp_goods
-- ----------------------------
DROP TABLE IF EXISTS `sp_goods`;
CREATE TABLE `sp_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(30) NOT NULL COMMENT '商品名称',
  `goods_sn` char(16) NOT NULL COMMENT '商品编号',
  `original` varchar(100) NOT NULL COMMENT '原图',
  `sm_thumb` varchar(100) NOT NULL COMMENT '小缩略图',
  `mid_thumb` varchar(100) NOT NULL COMMENT '中缩略图',
  `max_thumb` varchar(100) NOT NULL COMMENT '大缩略图',
  `s_pic` varchar(100) DEFAULT NULL,
  `market_price` decimal(10,2) NOT NULL COMMENT '市场价格',
  `shop_price` decimal(10,2) NOT NULL COMMENT '本店价格',
  `vip2_price` decimal(10,2) NOT NULL DEFAULT '100.00',
  `vip3_price` decimal(10,2) NOT NULL DEFAULT '100.00',
  `vip4_price` decimal(10,2) NOT NULL DEFAULT '100.00',
  `onsale` enum('1','0') NOT NULL DEFAULT '1' COMMENT '是否上架',
  `cate_id` mediumint(9) NOT NULL COMMENT '所属栏目',
  `brand_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '所属品牌',
  `type_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '所属商品类型',
  `goods_desc` text NOT NULL COMMENT '详情描述',
  `goods_weight` decimal(10,2) DEFAULT NULL COMMENT '商品重量',
  `weight_unit` enum('盒','箱','袋','瓶','支','罐','') NOT NULL DEFAULT '盒' COMMENT '重量单位',
  `sms` text,
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '上架时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `shop_price` (`shop_price`,`cate_id`,`brand_id`,`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_goods
-- ----------------------------
INSERT INTO `sp_goods` VALUES ('78', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋1', '1538061058673212', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '380.00', '208.00', '100.00', '100.00', '100.00', '1', '64', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '90.00', '盒', null, '1538061058', '1538210349');
INSERT INTO `sp_goods` VALUES ('79', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋2', '1538139469279263', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '19.00', '17.00', '100.00', '100.00', '100.00', '1', '65', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '200.00', '盒', null, '1538139468', '1538210590');
INSERT INTO `sp_goods` VALUES ('80', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋3', '1538139737969562', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '112.00', '86.00', '100.00', '100.00', '100.00', '1', '65', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '100.00', '盒', null, '1538139736', '1538210489');
INSERT INTO `sp_goods` VALUES ('81', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋4', '1538209275984630', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '789.00', '698.00', '100.00', '100.00', '100.00', '1', '66', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, '盒', null, '1538209275', '1538209275');
INSERT INTO `sp_goods` VALUES ('82', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋5', '1539617296361180', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '48.00', '29.00', '100.00', '100.00', '100.00', '1', '108', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, '盒', null, '1539617296', '1539617296');
INSERT INTO `sp_goods` VALUES ('83', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋6', '1539617566795292', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '88.00', '68.00', '100.00', '100.00', '100.00', '1', '186', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, '盒', null, '1539617566', '1539617566');
INSERT INTO `sp_goods` VALUES ('84', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋7', '1539617747771644', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '26.00', '13.00', '100.00', '100.00', '100.00', '1', '210', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, '盒', null, '1539617747', '1539617747');
INSERT INTO `sp_goods` VALUES ('85', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋8', '1539617916631732', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '275.00', '199.00', '100.00', '100.00', '100.00', '1', '237', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, '盒', null, '1539617916', '1539617916');
INSERT INTO `sp_goods` VALUES ('86', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋43', '1539618051774348', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '298.00', '233.00', '100.00', '100.00', '100.00', '1', '265', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, '盒', null, '1539618051', '1539618051');
INSERT INTO `sp_goods` VALUES ('87', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋234', '1539618235345749', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '39.00', '19.90', '100.00', '100.00', '100.00', '1', '279', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, '盒', null, '1539618234', '1539618234');
INSERT INTO `sp_goods` VALUES ('88', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋63', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', null, '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('89', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋34234', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', '', '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('91', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋2423', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', '', '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('92', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋6545', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', '', '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('93', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋422', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', '', '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('94', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋5345', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', '', '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('95', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋564', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', '', '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('96', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋32', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '盒', '', '1539618377', '1541667698');
INSERT INTO `sp_goods` VALUES ('97', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋', '1539618378172389', './Public/Uploads/Goods/2018-11-08/5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/sm_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/mid_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-11-08/max_5be3fb723ebaa.JPG', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '101.00', '100.00', '100.00', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', '1.00', '罐', '', '1539618377', '1542078623');

-- ----------------------------
-- Table structure for sp_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `sp_goods_attr`;
CREATE TABLE `sp_goods_attr` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品id',
  `attr_id` mediumint(8) unsigned NOT NULL COMMENT '属性id',
  `attr_value` varchar(150) NOT NULL COMMENT '属性值',
  `attr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '属性价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for sp_goods_pic
-- ----------------------------
DROP TABLE IF EXISTS `sp_goods_pic`;
CREATE TABLE `sp_goods_pic` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品id',
  `original` varchar(100) NOT NULL COMMENT '商品原图',
  `max_thumb` varchar(100) NOT NULL COMMENT '大缩略图',
  `sm_thumb` varchar(100) NOT NULL COMMENT '小缩略图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_goods_pic
-- ----------------------------

-- ----------------------------
-- Table structure for sp_ip
-- ----------------------------
DROP TABLE IF EXISTS `sp_ip`;
CREATE TABLE `sp_ip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `btime` varchar(20) DEFAULT NULL,
  `count` int(20) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_ip
-- ----------------------------
INSERT INTO `sp_ip` VALUES ('1', '58.62.31.163', 'm_index', '广东省广州市 电信', '1538213834', null, '4');
INSERT INTO `sp_ip` VALUES ('2', '219.137.187.204', 'm_index', '广东省广州市番禺区 电信', '1538217984', null, '5');
INSERT INTO `sp_ip` VALUES ('3', '101.227.139.163', 'm_index', '上海市上海市 电信', '1538219229', '1539574712', '5');
INSERT INTO `sp_ip` VALUES ('4', '14.16.95.112', 'm_index', '广东省广州市 电信', '1538219472', null, '1');
INSERT INTO `sp_ip` VALUES ('5', '183.3.255.32', 'm_index', '广东省深圳市 电信', '1538219621', null, '34');
INSERT INTO `sp_ip` VALUES ('6', '112.60.1.73', 'm_index', '广东省 移动', '1538219623', null, '9');
INSERT INTO `sp_ip` VALUES ('7', '157.255.172.16', 'm_index', '广东省深圳市 联通', '1538219623', null, '3');
INSERT INTO `sp_ip` VALUES ('8', '157.255.172.126', 'm_index', '广东省深圳市 联通', '1538219624', null, '5');
INSERT INTO `sp_ip` VALUES ('9', '113.96.231.120', 'm_index', '广东省深圳市 电信', '1538219628', null, '2');
INSERT INTO `sp_ip` VALUES ('10', '61.151.178.236', 'm_index', '上海市上海市 电信', '1538220091', null, '1');
INSERT INTO `sp_ip` VALUES ('11', '157.255.172.15', 'm_index', '广东省深圳市 联通', '1538220951', null, '3');
INSERT INTO `sp_ip` VALUES ('12', '14.215.160.169', 'm_index', '广东省广州市 电信', '1538221268', null, '1');
INSERT INTO `sp_ip` VALUES ('13', '101.89.29.78', 'm_index', '上海市上海市 电信', '1538221483', null, '1');
INSERT INTO `sp_ip` VALUES ('14', '157.255.172.22', 'm_index', '广东省深圳市 联通', '1538221869', null, '2');
INSERT INTO `sp_ip` VALUES ('15', '112.60.1.124', 'm_index', '广东省 移动', '1538221869', null, '5');
INSERT INTO `sp_ip` VALUES ('16', '157.255.172.19', 'm_index', '广东省深圳市 联通', '1538222962', null, '5');
INSERT INTO `sp_ip` VALUES ('17', '113.69.247.105', 'm_index', '广东省佛山市 电信', '1538224562', null, '12');
INSERT INTO `sp_ip` VALUES ('18', '120.198.253.161', 'm_index', '广东省广州市 移动', '1538224775', null, '1');
INSERT INTO `sp_ip` VALUES ('19', '14.215.160.134', 'm_index', '广东省广州市 电信', '1538232075', null, '1');
INSERT INTO `sp_ip` VALUES ('20', '14.215.160.165', 'm_index', '广东省广州市 电信', '1538260172', null, '1');
INSERT INTO `sp_ip` VALUES ('21', '219.137.187.81', 'm_index', '广东省广州市番禺区 电信', '1538270876', null, '5');
INSERT INTO `sp_ip` VALUES ('22', '112.60.1.97', 'm_index', '广东省 移动', '1538270952', null, '6');
INSERT INTO `sp_ip` VALUES ('23', '112.60.1.79', 'm_index', '广东省 移动', '1538272111', null, '9');
INSERT INTO `sp_ip` VALUES ('24', '157.255.172.20', 'm_index', '广东省深圳市 联通', '1538272111', null, '1');
INSERT INTO `sp_ip` VALUES ('25', '42.236.10.92', 'm_index', '河南省郑州市 联通', '1538274791', null, '1');
INSERT INTO `sp_ip` VALUES ('26', '120.92.72.144', 'm_index', '北京市海淀区 电信', '1538292884', null, '1');
INSERT INTO `sp_ip` VALUES ('27', '119.138.13.213', 'm_index', '广东省韶关市 电信', '1538366907', null, '3');
INSERT INTO `sp_ip` VALUES ('28', '101.89.29.86', 'm_index', '上海市上海市 电信', '1538366967', null, '1');
INSERT INTO `sp_ip` VALUES ('29', '51.38.12.13', 'm_index', '法国', '1538567230', null, '2');
INSERT INTO `sp_ip` VALUES ('30', '219.137.185.58', 'm_index', '广东省广州市番禺区 电信', '1538614938', null, '72');
INSERT INTO `sp_ip` VALUES ('31', '101.226.226.221', 'm_index', '上海市上海市 电信', '1538614998', '1539394332', '1');
INSERT INTO `sp_ip` VALUES ('32', '61.129.6.227', 'm_index', '上海市上海市 电信', '1538615120', null, '2');
INSERT INTO `sp_ip` VALUES ('33', '101.199.120.145', 'm_index', '北京市西城区 电信', '1538617438', null, '2');
INSERT INTO `sp_ip` VALUES ('34', '180.163.220.43', 'm_index', '上海市上海市 电信', '1538617497', null, '1');
INSERT INTO `sp_ip` VALUES ('35', '101.89.29.92', 'm_index', '上海市上海市 电信', '1538619234', null, '1');
INSERT INTO `sp_ip` VALUES ('36', '210.209.72.243', 'm_index', '香港特别行政区', '1538624426', null, '1');
INSERT INTO `sp_ip` VALUES ('37', '58.247.206.155', 'm_index', '上海市浦东新区 联通', '1538626758', null, '1');
INSERT INTO `sp_ip` VALUES ('38', '101.91.60.104', 'm_index', '上海市上海市 电信', '1538647260', null, '1');
INSERT INTO `sp_ip` VALUES ('39', '118.196.156.49', 'm_index', '广东省广州市 长城宽带', '1538654263', null, '2');
INSERT INTO `sp_ip` VALUES ('40', '219.137.185.122', 'm_index', '广东省广州市番禺区 电信', '1538702498', null, '7');
INSERT INTO `sp_ip` VALUES ('41', '47.92.101.29', 'm_index', '河北省张家口市 阿里云', '1538722940', null, '1');
INSERT INTO `sp_ip` VALUES ('42', '120.78.45.55', 'm_index', '广东省深圳市 阿里云', '1538799586', null, '2');
INSERT INTO `sp_ip` VALUES ('43', '219.137.187.239', 'm_index', '广东省广州市番禺区 电信', '1538986506', null, '1');
INSERT INTO `sp_ip` VALUES ('44', '223.166.222.11', 'm_index', '上海市上海市 联通', '1538986565', null, '3');
INSERT INTO `sp_ip` VALUES ('45', '219.137.185.168', 'm_index', '广东省广州市番禺区 电信', '1539048295', null, '3');
INSERT INTO `sp_ip` VALUES ('46', '61.151.178.166', 'm_index', '上海市上海市 电信', '1539048609', null, '1');
INSERT INTO `sp_ip` VALUES ('47', '123.125.67.159', 'm_index', '北京市北京市 联通', '1539062003', null, '1');
INSERT INTO `sp_ip` VALUES ('48', '219.137.185.27', 'm_index', '广东省广州市番禺区 电信', '1539071781', null, '5');
INSERT INTO `sp_ip` VALUES ('49', '101.89.29.97', 'm_index', '上海市上海市 电信', '1539071907', null, '1');
INSERT INTO `sp_ip` VALUES ('50', '118.196.67.29', 'm_index', '广东省广州市 长城宽带', '1539084843', null, '1');
INSERT INTO `sp_ip` VALUES ('51', '14.215.160.138', 'm_index', '广东省广州市 电信', '1539101496', null, '1');
INSERT INTO `sp_ip` VALUES ('52', '219.137.184.5', 'm_index', '广东省广州市番禺区 电信', '1539136960', null, '27');
INSERT INTO `sp_ip` VALUES ('53', '101.91.62.89', 'm_index', '上海市上海市 电信', '1539137020', null, '2');
INSERT INTO `sp_ip` VALUES ('54', '112.60.1.64', 'm_index', '广东省 移动', '1539155541', null, '3');
INSERT INTO `sp_ip` VALUES ('55', '157.255.172.25', 'm_index', '广东省深圳市 联通', '1539155542', null, '3');
INSERT INTO `sp_ip` VALUES ('56', '157.255.172.18', 'm_index', '广东省深圳市 联通', '1539155542', null, '1');
INSERT INTO `sp_ip` VALUES ('57', '58.250.137.191', 'm_index', '广东省深圳市 联通', '1539155545', null, '2');
INSERT INTO `sp_ip` VALUES ('58', '58.251.112.211', 'm_index', '广东省深圳市 联通', '1539155545', null, '3');
INSERT INTO `sp_ip` VALUES ('59', '157.255.172.21', 'm_index', '广东省深圳市 联通', '1539155545', null, '2');
INSERT INTO `sp_ip` VALUES ('60', '58.250.137.194', 'm_index', '广东省深圳市 联通', '1539155545', null, '1');
INSERT INTO `sp_ip` VALUES ('61', '183.36.112.205', 'm_index', '广东省深圳市 电信', '1539157705', '1539575132', '14');
INSERT INTO `sp_ip` VALUES ('62', '61.129.6.174', 'm_index', '上海市上海市 电信', '1539157765', null, '1');
INSERT INTO `sp_ip` VALUES ('63', '101.91.60.108', 'm_index', '上海市上海市 电信', '1539168108', '1540224253', '7');
INSERT INTO `sp_ip` VALUES ('64', '118.196.159.195', 'm_index', '广东省广州市 长城宽带', '1539175366', null, '2');
INSERT INTO `sp_ip` VALUES ('65', '42.236.10.78', 'm_index', '河南省郑州市 联通', '1539221031', '1539463091', '2');
INSERT INTO `sp_ip` VALUES ('66', '180.163.220.126', 'm_index', '上海市上海市 电信', '1539221096', null, '1');
INSERT INTO `sp_ip` VALUES ('67', '61.151.207.186', 'm_index', '上海市上海市 电信', '1539250420', null, '1');
INSERT INTO `sp_ip` VALUES ('68', '61.151.178.197', 'm_index', '上海市上海市 电信', '1539258479', '1540224112', '5');
INSERT INTO `sp_ip` VALUES ('69', '219.137.187.167', 'm_index', '广东省广州市番禺区 电信', '1539306133', '1539423334', '291');
INSERT INTO `sp_ip` VALUES ('70', '101.227.139.178', 'm_index', '上海市上海市 电信', '1539306628', null, '1');
INSERT INTO `sp_ip` VALUES ('71', '61.151.178.177', 'm_index', '上海市上海市 电信', '1539307673', null, '2');
INSERT INTO `sp_ip` VALUES ('72', '61.151.178.164', 'm_index', '上海市上海市 电信', '1539310542', null, '1');
INSERT INTO `sp_ip` VALUES ('73', '42.197.143.237', 'm_index', '广东省广州市 长城宽带', '1539356634', null, '3');
INSERT INTO `sp_ip` VALUES ('74', '180.163.220.5', 'm_index', '上海市上海市 电信', '1539441749', '1539574818', '2');
INSERT INTO `sp_ip` VALUES ('75', '14.215.160.202', 'm_index', '广东省广州市 电信', '1539491178', null, '1');
INSERT INTO `sp_ip` VALUES ('76', '113.71.197.191', 'm_index', '广东省佛山市 电信', '1539491204', '1539509874', '7');
INSERT INTO `sp_ip` VALUES ('77', '42.236.10.84', 'm_index', '河南省郑州市 联通', '1539555535', null, '1');
INSERT INTO `sp_ip` VALUES ('78', '219.137.184.22', 'm_index', '广东省广州市番禺区 电信', '1539567056', '1539594145', '48');
INSERT INTO `sp_ip` VALUES ('79', '61.129.6.251', 'm_index', '上海市上海市 电信', '1539567117', '1540951842', '3');
INSERT INTO `sp_ip` VALUES ('80', '61.151.179.83', 'm_index', '上海市上海市 电信', '1539569832', null, '1');
INSERT INTO `sp_ip` VALUES ('81', '180.163.220.47', 'm_index', '上海市上海市 电信', '1539574865', null, '1');
INSERT INTO `sp_ip` VALUES ('82', '101.199.121.77', 'm_index', '北京市西城区 电信', '1539575889', null, '1');
INSERT INTO `sp_ip` VALUES ('83', '101.132.97.6', 'm_index', '上海市上海市 阿里云', '1539578466', null, '1');
INSERT INTO `sp_ip` VALUES ('84', '118.196.151.91', 'm_index', '广东省广州市 长城宽带', '1539605146', '1539675901', '78');
INSERT INTO `sp_ip` VALUES ('85', '61.129.6.225', 'm_index', '上海市上海市 电信', '1539606226', null, '1');
INSERT INTO `sp_ip` VALUES ('86', '101.89.29.94', 'm_index', '上海市上海市 电信', '1539613433', '1540951843', '2');
INSERT INTO `sp_ip` VALUES ('87', '101.227.139.172', 'm_index', '上海市上海市 电信', '1539617373', null, '1');
INSERT INTO `sp_ip` VALUES ('88', '121.42.241.2', 'm_index', '山东省青岛市 阿里云', '1539655326', null, '2');
INSERT INTO `sp_ip` VALUES ('89', '47.92.120.136', 'm_index', '河北省张家口市 阿里云', '1539666107', null, '1');
INSERT INTO `sp_ip` VALUES ('90', '61.151.178.163', 'm_index', '上海市上海市 电信', '1539669076', null, '2');
INSERT INTO `sp_ip` VALUES ('91', '61.129.6.151', 'm_index', '上海市上海市 电信', '1539673115', null, '1');
INSERT INTO `sp_ip` VALUES ('92', '47.99.185.3', 'm_index', '浙江省杭州市 阿里云', '1539694344', null, '2');
INSERT INTO `sp_ip` VALUES ('93', '219.137.187.73', 'm_index', '广东省广州市番禺区 电信', '1539744223', null, '1');
INSERT INTO `sp_ip` VALUES ('94', '118.197.35.117', 'm_index', '广东省广州市 长城宽带', '1539786352', '1539967731', '6');
INSERT INTO `sp_ip` VALUES ('95', '39.107.127.149', 'm_index', '浙江省杭州市 阿里云', '1539814871', null, '1');
INSERT INTO `sp_ip` VALUES ('96', '219.137.187.253', 'm_index', '广东省广州市番禺区 电信', '1539856420', null, '3');
INSERT INTO `sp_ip` VALUES ('97', '101.91.60.110', 'm_index', '上海市上海市 电信', '1539967762', null, '1');
INSERT INTO `sp_ip` VALUES ('98', '101.91.60.107', 'm_index', '上海市上海市 电信', '1539967791', null, '2');
INSERT INTO `sp_ip` VALUES ('99', '113.69.245.84', 'm_index', '广东省佛山市 电信', '1540095358', null, '1');
INSERT INTO `sp_ip` VALUES ('100', '14.215.161.78', 'm_index', '广东省广州市 电信', '1540125052', null, '1');
INSERT INTO `sp_ip` VALUES ('101', '113.71.197.78', 'm_index', '广东省佛山市 电信', '1540125098', null, '1');
INSERT INTO `sp_ip` VALUES ('102', '47.100.51.203', 'm_index', '上海市上海市 阿里云', '1540185483', null, '1');
INSERT INTO `sp_ip` VALUES ('103', '58.62.28.17', 'm_index', '广东省广州市 电信', '1540202431', null, '1');
INSERT INTO `sp_ip` VALUES ('104', '113.96.219.243', 'm_index', '广东省深圳市 电信', '1540223462', '1540224826', '10');
INSERT INTO `sp_ip` VALUES ('105', '157.255.172.24', 'm_index', '广东省深圳市 联通', '1540223465', null, '1');
INSERT INTO `sp_ip` VALUES ('106', '61.129.8.179', 'm_index', '上海市上海市 电信', '1540223521', null, '1');
INSERT INTO `sp_ip` VALUES ('107', '113.103.9.26', 'm_index', '广东省广州市 电信', '1540223609', null, '1');
INSERT INTO `sp_ip` VALUES ('108', '113.111.228.187', 'm_index', '广东省广州市 电信', '1540223764', null, '1');
INSERT INTO `sp_ip` VALUES ('109', '113.111.229.4', 'm_index', '广东省广州市 电信', '1540223785', null, '1');
INSERT INTO `sp_ip` VALUES ('110', '113.111.229.229', 'm_index', '广东省广州市 电信', '1540223803', null, '1');
INSERT INTO `sp_ip` VALUES ('111', '113.96.218.50', 'm_index', '广东省深圳市 电信', '1540223836', null, '1');
INSERT INTO `sp_ip` VALUES ('112', '219.137.186.53', 'm_index', '广东省广州市番禺区 电信', '1540272667', null, '4');
INSERT INTO `sp_ip` VALUES ('113', '116.22.44.42', 'm_index', '广东省广州市 电信', '1540286842', null, '2');
INSERT INTO `sp_ip` VALUES ('114', '120.92.72.99', 'm_index', '北京市海淀区 电信', '1540366667', null, '1');
INSERT INTO `sp_ip` VALUES ('115', '219.137.186.35', 'm_index', '广东省广州市番禺区 电信', '1540445719', null, '2');
INSERT INTO `sp_ip` VALUES ('116', '106.14.114.244', 'm_index', '上海市上海市 阿里云', '1540463627', null, '1');
INSERT INTO `sp_ip` VALUES ('117', '101.227.130.206', 'm_index', '上海市上海市 电信', '1540621095', null, '1');
INSERT INTO `sp_ip` VALUES ('118', '123.125.71.114', 'm_index', '北京市北京市 联通', '1540792026', null, '1');
INSERT INTO `sp_ip` VALUES ('119', '219.137.185.230', 'm_index', '广东省广州市番禺区 电信', '1540895240', '1540951813', '14');
INSERT INTO `sp_ip` VALUES ('120', '0.0.0.0', 'm_index', '', '1540969956', '1541140006', '30');
INSERT INTO `sp_ip` VALUES ('121', '127.0.0.1', 'm_index', '', '1540976486', '1542182667', '438');

-- ----------------------------
-- Table structure for sp_member
-- ----------------------------
DROP TABLE IF EXISTS `sp_member`;
CREATE TABLE `sp_member` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `username` varchar(30) NOT NULL COMMENT '用户名称',
  `password` char(32) NOT NULL COMMENT '用户密码',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `check_mail` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已验证 0：未验证 1：已验证',
  `mail_str` varchar(32) NOT NULL COMMENT '邮箱验证字符串',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:保密 1：男 2：女',
  `points` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '余额',
  `regtime` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member
-- ----------------------------
INSERT INTO `sp_member` VALUES ('1', '111111', 'adbc91a43e988a3b5b745b8529a90b61', '', '0', '204b215dbfd81f6f4a907c581043cafe', '0', '0', '0.00', '1514519536');
INSERT INTO `sp_member` VALUES ('2', 'lan456', '1ab176c929820b43299da0710348bdcb', '', '0', '69f55771895fa43449dc9441edc68770', '0', '0', '0.00', '1514520038');

-- ----------------------------
-- Table structure for sp_member_level
-- ----------------------------
DROP TABLE IF EXISTS `sp_member_level`;
CREATE TABLE `sp_member_level` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(20) NOT NULL COMMENT '等级名称',
  `points_min` int(10) unsigned NOT NULL COMMENT '积分下限',
  `points_max` int(10) unsigned NOT NULL COMMENT '积分上限',
  `rate` tinyint(3) unsigned NOT NULL COMMENT '折扣率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member_level
-- ----------------------------

-- ----------------------------
-- Table structure for sp_member_price
-- ----------------------------
DROP TABLE IF EXISTS `sp_member_price`;
CREATE TABLE `sp_member_price` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) NOT NULL COMMENT '会员等级价格',
  `level_id` mediumint(9) NOT NULL COMMENT '等级id',
  `goods_id` mediumint(9) NOT NULL COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member_price
-- ----------------------------

-- ----------------------------
-- Table structure for sp_nav
-- ----------------------------
DROP TABLE IF EXISTS `sp_nav`;
CREATE TABLE `sp_nav` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `nav_name` varchar(30) NOT NULL COMMENT '导航名称',
  `nav_url` varchar(150) NOT NULL COMMENT '导航地址',
  `nav_blank` tinyint(1) NOT NULL DEFAULT '1' COMMENT '导航打开方式 0：当前页打开 1：新页面打开',
  `nav_pos` tinyint(1) NOT NULL DEFAULT '2' COMMENT '导航位置 1：顶部 2：中间 3：底部',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_nav
-- ----------------------------

-- ----------------------------
-- Table structure for sp_order
-- ----------------------------
DROP TABLE IF EXISTS `sp_order`;
CREATE TABLE `sp_order` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `sn` char(16) NOT NULL COMMENT '订单编号',
  `addtime` int(11) NOT NULL COMMENT '下单时间',
  `shr` varchar(30) NOT NULL COMMENT '收货人',
  `province` varchar(30) NOT NULL COMMENT '省',
  `city` varchar(30) NOT NULL COMMENT '市',
  `county` varchar(60) NOT NULL COMMENT '县',
  `adress` varchar(255) NOT NULL COMMENT '详细地址',
  `phone` varchar(11) NOT NULL COMMENT '电话',
  `mid` mediumint(9) NOT NULL COMMENT '下单会员id',
  `peisong` varchar(30) NOT NULL COMMENT '配送方式',
  `pay` varchar(30) NOT NULL COMMENT '支付方式',
  `gtprice` decimal(10,2) NOT NULL COMMENT '商品总价',
  `yprice` decimal(10,2) NOT NULL COMMENT '运费价格',
  `tprice` decimal(10,2) NOT NULL COMMENT '订单总价',
  `order_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未确认，1：已确认，2：申请退货，3：退货成功',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：未支付，1：已支付',
  `fh_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：未发货，1：已发货，2：已收货',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_order
-- ----------------------------

-- ----------------------------
-- Table structure for sp_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `sp_order_goods`;
CREATE TABLE `sp_order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品订单id',
  `goods_id` mediumint(9) NOT NULL COMMENT '商品id',
  `goods_name` varchar(150) NOT NULL COMMENT '商品名称',
  `goods_attr_id` varchar(60) NOT NULL COMMENT '属性id字符串',
  `goods_attr_str` varchar(150) NOT NULL COMMENT '属性字符串',
  `goods_price` decimal(10,2) NOT NULL COMMENT '本店价',
  `goods_marktprice` decimal(10,2) NOT NULL COMMENT '市场价',
  `goods_num` smallint(6) NOT NULL COMMENT '商品数量',
  `order_id` mediumint(9) NOT NULL COMMENT '订单id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for sp_product
-- ----------------------------
DROP TABLE IF EXISTS `sp_product`;
CREATE TABLE `sp_product` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(9) NOT NULL COMMENT '商品id',
  `goods_number` int(11) NOT NULL COMMENT '库存量',
  `goods_attr` varchar(150) NOT NULL COMMENT '库存属性',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_product
-- ----------------------------
INSERT INTO `sp_product` VALUES ('1', '1', '100', '');

-- ----------------------------
-- Table structure for sp_recpos
-- ----------------------------
DROP TABLE IF EXISTS `sp_recpos`;
CREATE TABLE `sp_recpos` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `recname` varchar(30) NOT NULL COMMENT '推荐位名称',
  `rectype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '推荐位类型  1：商品推荐位 2：分类推荐位',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_recpos
-- ----------------------------
INSERT INTO `sp_recpos` VALUES ('1', '首页推荐', '1');
INSERT INTO `sp_recpos` VALUES ('2', '右侧-热销商品', '1');
INSERT INTO `sp_recpos` VALUES ('3', '首页-特价区', '1');

-- ----------------------------
-- Table structure for sp_recvalue
-- ----------------------------
DROP TABLE IF EXISTS `sp_recvalue`;
CREATE TABLE `sp_recvalue` (
  `valueid` mediumint(9) NOT NULL,
  `recid` mediumint(9) NOT NULL,
  `rectype` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_recvalue
-- ----------------------------
INSERT INTO `sp_recvalue` VALUES ('21', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('70', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('69', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('63', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('54', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('54', '2', '1');
INSERT INTO `sp_recvalue` VALUES ('42', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('41', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('41', '2', '1');
INSERT INTO `sp_recvalue` VALUES ('36', '2', '1');
INSERT INTO `sp_recvalue` VALUES ('29', '1', '1');
INSERT INTO `sp_recvalue` VALUES ('4', '2', '1');
INSERT INTO `sp_recvalue` VALUES ('73', '3', '1');
INSERT INTO `sp_recvalue` VALUES ('62', '3', '1');
INSERT INTO `sp_recvalue` VALUES ('78', '1', '1');

-- ----------------------------
-- Table structure for sp_shrinfo
-- ----------------------------
DROP TABLE IF EXISTS `sp_shrinfo`;
CREATE TABLE `sp_shrinfo` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '收货人id',
  `shr` varchar(30) NOT NULL COMMENT '姓名',
  `province` varchar(50) NOT NULL COMMENT '省',
  `city` varchar(50) NOT NULL COMMENT '市',
  `county` varchar(60) NOT NULL COMMENT '县',
  `adress` varchar(255) NOT NULL COMMENT '详细地址',
  `phone` varchar(11) NOT NULL COMMENT '电话',
  `mid` mediumint(9) NOT NULL COMMENT '会员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_shrinfo
-- ----------------------------

-- ----------------------------
-- Table structure for sp_type
-- ----------------------------
DROP TABLE IF EXISTS `sp_type`;
CREATE TABLE `sp_type` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_type
-- ----------------------------

-- ----------------------------
-- Table structure for sp_user
-- ----------------------------
DROP TABLE IF EXISTS `sp_user`;
CREATE TABLE `sp_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) DEFAULT NULL,
  `nick` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `ctime` varchar(50) DEFAULT NULL,
  `vip` enum('1','2','3','4') DEFAULT '1' COMMENT 'vip等级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_user
-- ----------------------------
INSERT INTO `sp_user` VALUES ('12', '18718115564', 'makeapile', '88888888L', '219.137.185.58', '1538648724', '1');
INSERT INTO `sp_user` VALUES ('13', '15813562346', '123456', '123456', '183.3.255.32', '1539249906', '1');
INSERT INTO `sp_user` VALUES ('14', '1', '2', '3', '219.137.187.167', '1539425306', '1');
INSERT INTO `sp_user` VALUES ('15', '15626140870', 'klwlbj', 'aaa123456', '219.137.185.230', '1540951858', '3');
