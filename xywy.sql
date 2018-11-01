/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xywy

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-01 17:40:51
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
INSERT INTO `sp_cate` VALUES ('22', '男神馆', '14', '');
INSERT INTO `sp_cate` VALUES ('23', '阳痿早泄', '14', '');
INSERT INTO `sp_cate` VALUES ('24', '男性生精', '14', '');
INSERT INTO `sp_cate` VALUES ('25', '脱发白发', '14', '');
INSERT INTO `sp_cate` VALUES ('26', '补益用药', '14', '');
INSERT INTO `sp_cate` VALUES ('27', '泌尿系统', '14', '');
INSERT INTO `sp_cate` VALUES ('28', '补血气', '15', '');
INSERT INTO `sp_cate` VALUES ('29', '月经不调', '15', '');
INSERT INTO `sp_cate` VALUES ('30', '妇科炎症', '15', '');
INSERT INTO `sp_cate` VALUES ('31', '促孕备孕', '15', '');
INSERT INTO `sp_cate` VALUES ('32', '孕产调理', '15', '');
INSERT INTO `sp_cate` VALUES ('33', '银屑病', '16', '');
INSERT INTO `sp_cate` VALUES ('34', '白癜风', '16', '');
INSERT INTO `sp_cate` VALUES ('35', '痔疮', '16', '');
INSERT INTO `sp_cate` VALUES ('36', '色斑', '16', '');
INSERT INTO `sp_cate` VALUES ('37', '疤痕', '16', '');
INSERT INTO `sp_cate` VALUES ('38', '真菌感染', '16', '');
INSERT INTO `sp_cate` VALUES ('39', '皮炎湿疹', '16', '');
INSERT INTO `sp_cate` VALUES ('40', '癫痫', '17', '');
INSERT INTO `sp_cate` VALUES ('41', '中风', '17', '');
INSERT INTO `sp_cate` VALUES ('42', '痴呆', '17', '');
INSERT INTO `sp_cate` VALUES ('43', '抑郁症', '17', '');
INSERT INTO `sp_cate` VALUES ('44', '精神分裂', '17', '');
INSERT INTO `sp_cate` VALUES ('45', '制氧机专区', '18', '');
INSERT INTO `sp_cate` VALUES ('46', '过敏性鼻炎', '18', '');
INSERT INTO `sp_cate` VALUES ('47', '支气管炎', '18', '');
INSERT INTO `sp_cate` VALUES ('48', '哮喘', '18', '');
INSERT INTO `sp_cate` VALUES ('49', '高血压', '19', '');
INSERT INTO `sp_cate` VALUES ('50', '冠心病', '19', '');
INSERT INTO `sp_cate` VALUES ('51', '高血脂', '19', '');
INSERT INTO `sp_cate` VALUES ('52', '糖尿病', '19', '');
INSERT INTO `sp_cate` VALUES ('53', '精制三七粉', '19', '');
INSERT INTO `sp_cate` VALUES ('54', '骨质疏松', '20', '');
INSERT INTO `sp_cate` VALUES ('55', '中药养生馆', '20', '');
INSERT INTO `sp_cate` VALUES ('56', '类风湿', '20', '');
INSERT INTO `sp_cate` VALUES ('57', '结肠炎', '21', '');
INSERT INTO `sp_cate` VALUES ('58', '消化道溃疡', '21', '');
INSERT INTO `sp_cate` VALUES ('59', '保肝护肝', '21', '');
INSERT INTO `sp_cate` VALUES ('60', '血糖仪专区', '21', '');
INSERT INTO `sp_cate` VALUES ('61', '肝硬化肝纤维化', '21', '');
INSERT INTO `sp_cate` VALUES ('62', '鲜花礼品1', '21', '');
INSERT INTO `sp_cate` VALUES ('63', '乙肝专区', '21', '');
INSERT INTO `sp_cate` VALUES ('64', '阳痿 早泄', '22', '');
INSERT INTO `sp_cate` VALUES ('65', '前列腺疾病', '22', '');
INSERT INTO `sp_cate` VALUES ('66', '生精强精', '22', '');
INSERT INTO `sp_cate` VALUES ('67', '滋补养生', '22', '');
INSERT INTO `sp_cate` VALUES ('68', '脱发 白发', '22', '');
INSERT INTO `sp_cate` VALUES ('69', '泌尿 系统', '22', '');
INSERT INTO `sp_cate` VALUES ('70', '尖锐湿疹', '22', '');
INSERT INTO `sp_cate` VALUES ('71', '延时', '23', '');
INSERT INTO `sp_cate` VALUES ('72', '阳痿', '23', '');
INSERT INTO `sp_cate` VALUES ('73', '温肾壮阳', '23', '');
INSERT INTO `sp_cate` VALUES ('74', '缺啥补啥', '23', '');
INSERT INTO `sp_cate` VALUES ('75', '戒烟药', '23', '');
INSERT INTO `sp_cate` VALUES ('76', '保健用品', '23', '');
INSERT INTO `sp_cate` VALUES ('77', '补肾益精', '24', '');
INSERT INTO `sp_cate` VALUES ('78', '少精弱精', '24', '');
INSERT INTO `sp_cate` VALUES ('79', '遗精阳痿', '24', '');
INSERT INTO `sp_cate` VALUES ('80', '检测器材', '24', '');
INSERT INTO `sp_cate` VALUES ('81', '保健药品', '24', '');
INSERT INTO `sp_cate` VALUES ('82', '雄激素性秃发', '25', '');
INSERT INTO `sp_cate` VALUES ('83', '脂溢性脱发', '25', '');
INSERT INTO `sp_cate` VALUES ('84', '肾虚脱发', '25', '');
INSERT INTO `sp_cate` VALUES ('85', '血虚脱发', '25', '');
INSERT INTO `sp_cate` VALUES ('86', '保健送礼', '25', '');
INSERT INTO `sp_cate` VALUES ('87', '中药调理', '25', '');
INSERT INTO `sp_cate` VALUES ('88', '养生食品', '25', '');
INSERT INTO `sp_cate` VALUES ('89', '辅助器械', '25', '');
INSERT INTO `sp_cate` VALUES ('90', '外用护理', '25', '');
INSERT INTO `sp_cate` VALUES ('91', '滋阴补肾', '26', '');
INSERT INTO `sp_cate` VALUES ('92', '温肾助阳', '26', '');
INSERT INTO `sp_cate` VALUES ('93', '阴阳调和', '26', '');
INSERT INTO `sp_cate` VALUES ('94', '补气养血', '26', '');
INSERT INTO `sp_cate` VALUES ('95', '中药 调理', '27', '');
INSERT INTO `sp_cate` VALUES ('96', '保健 送礼', '27', '');
INSERT INTO `sp_cate` VALUES ('97', '养生 食品', '27', '');
INSERT INTO `sp_cate` VALUES ('98', '辅助 器械', '27', '');
INSERT INTO `sp_cate` VALUES ('99', '暖宫礼包', '28', '');
INSERT INTO `sp_cate` VALUES ('100', '补血礼包', '28', '');
INSERT INTO `sp_cate` VALUES ('101', '养颜礼包', '28', '');
INSERT INTO `sp_cate` VALUES ('102', '外用辅助', '28', '');
INSERT INTO `sp_cate` VALUES ('103', ' 中药调理', '28', '');
INSERT INTO `sp_cate` VALUES ('104', ' 保健养生', '28', '');
INSERT INTO `sp_cate` VALUES ('105', '补血食品', '28', '');
INSERT INTO `sp_cate` VALUES ('106', '美白祛斑', '28', '');
INSERT INTO `sp_cate` VALUES ('107', '减肥瘦身', '28', '');
INSERT INTO `sp_cate` VALUES ('108', '补气补血', '28', '');
INSERT INTO `sp_cate` VALUES ('109', '暖宫 礼包', '29', '');
INSERT INTO `sp_cate` VALUES ('110', '补血 礼包', '29', '');
INSERT INTO `sp_cate` VALUES ('111', '养颜 礼包', '29', '');
INSERT INTO `sp_cate` VALUES ('112', '外用 辅助', '29', '');
INSERT INTO `sp_cate` VALUES ('113', ' 中药 调理', '29', '');
INSERT INTO `sp_cate` VALUES ('114', ' 保健 养生', '29', '');
INSERT INTO `sp_cate` VALUES ('115', '补血 食品', '29', '');
INSERT INTO `sp_cate` VALUES ('116', '美白 祛斑', '29', '');
INSERT INTO `sp_cate` VALUES ('117', '减肥 瘦身', '29', '');
INSERT INTO `sp_cate` VALUES ('118', '补气 补血', '29', '');
INSERT INTO `sp_cate` VALUES ('119', '清洗礼包', '30', '');
INSERT INTO `sp_cate` VALUES ('120', '抗菌礼包', '30', '');
INSERT INTO `sp_cate` VALUES ('121', ' 养颜 礼包', '30', '');
INSERT INTO `sp_cate` VALUES ('122', ' 外用 辅助', '30', '');
INSERT INTO `sp_cate` VALUES ('123', '  中药 调理 ', '30', '');
INSERT INTO `sp_cate` VALUES ('124', '  保健 养生', '30', '');
INSERT INTO `sp_cate` VALUES ('125', '  补血 食品', '30', '');
INSERT INTO `sp_cate` VALUES ('126', ' 美白 祛斑', '30', '');
INSERT INTO `sp_cate` VALUES ('127', ' 减肥 瘦身', '30', '');
INSERT INTO `sp_cate` VALUES ('128', ' 月经 不调', '30', '');
INSERT INTO `sp_cate` VALUES ('129', '排卵试纸', '31', '');
INSERT INTO `sp_cate` VALUES ('130', '体温计', '31', '');
INSERT INTO `sp_cate` VALUES ('131', '补充叶酸', '31', '');
INSERT INTO `sp_cate` VALUES ('132', '补充维生素', '31', '');
INSERT INTO `sp_cate` VALUES ('133', '维生素', '31', '');
INSERT INTO `sp_cate` VALUES ('134', '补充矿物质', '31', '');
INSERT INTO `sp_cate` VALUES ('135', '矿物质', '31', '');
INSERT INTO `sp_cate` VALUES ('136', '  中药  调理', '31', '');
INSERT INTO `sp_cate` VALUES ('137', '  保健 礼包', '31', '');
INSERT INTO `sp_cate` VALUES ('138', '补气血', '31', '');
INSERT INTO `sp_cate` VALUES ('139', ' 养生 食品', '31', '');
INSERT INTO `sp_cate` VALUES ('140', '外用护肤', '31', '');
INSERT INTO `sp_cate` VALUES ('141', '调经促孕', '31', '');
INSERT INTO `sp_cate` VALUES ('142', '暖宫促孕', '31', '');
INSERT INTO `sp_cate` VALUES ('143', '促孕-医院常开', '31', '');
INSERT INTO `sp_cate` VALUES ('144', '孕期补充叶酸', '32', '');
INSERT INTO `sp_cate` VALUES ('145', '维生素和矿物质', '32', '');
INSERT INTO `sp_cate` VALUES ('146', '孕产期需要补气血', '32', '');
INSERT INTO `sp_cate` VALUES ('147', ' 辅助 器械', '32', '');
INSERT INTO `sp_cate` VALUES ('148', '宝宝必备', '32', '');
INSERT INTO `sp_cate` VALUES ('149', ' 中药  调理', '32', '');
INSERT INTO `sp_cate` VALUES ('150', ' 保健 送礼', '32', '');
INSERT INTO `sp_cate` VALUES ('151', '  养生 食品', '32', '');
INSERT INTO `sp_cate` VALUES ('152', ' 外用 护理', '32', '');
INSERT INTO `sp_cate` VALUES ('153', '保胎', '32', '');
INSERT INTO `sp_cate` VALUES ('154', '排恶霸', '32', '');
INSERT INTO `sp_cate` VALUES ('155', '医院 常开', '33', '');
INSERT INTO `sp_cate` VALUES ('156', '中药  调理', '33', '');
INSERT INTO `sp_cate` VALUES ('157', '保健  送礼', '33', '');
INSERT INTO `sp_cate` VALUES ('158', '外用 护理', '33', '');
INSERT INTO `sp_cate` VALUES ('159', '  养生  食品', '33', '');
INSERT INTO `sp_cate` VALUES ('160', '外用 器械', '33', '');
INSERT INTO `sp_cate` VALUES ('161', '医院  常开', '34', '');
INSERT INTO `sp_cate` VALUES ('162', '中药   调理', '34', '');
INSERT INTO `sp_cate` VALUES ('163', ' 保健  送礼', '34', '');
INSERT INTO `sp_cate` VALUES ('164', '外用  护理', '34', '');
INSERT INTO `sp_cate` VALUES ('165', '养生  食品', '34', '');
INSERT INTO `sp_cate` VALUES ('166', '外用  器械', '34', '');
INSERT INTO `sp_cate` VALUES ('167', '提高 免疫力', '34', '');
INSERT INTO `sp_cate` VALUES ('168', '外用  辅助', '35', '');
INSERT INTO `sp_cate` VALUES ('169', '保健 美肤', '35', '');
INSERT INTO `sp_cate` VALUES ('170', '清洁美肤', '35', '');
INSERT INTO `sp_cate` VALUES ('171', ' 养生  食品', '35', '');
INSERT INTO `sp_cate` VALUES ('172', '  外用  辅助', '36', '');
INSERT INTO `sp_cate` VALUES ('173', '保健  美肤', '36', '');
INSERT INTO `sp_cate` VALUES ('174', '清洁 美肤', '36', '');
INSERT INTO `sp_cate` VALUES ('175', '   养生  食品', '36', '');
INSERT INTO `sp_cate` VALUES ('176', '外用辅助', '37', '');
INSERT INTO `sp_cate` VALUES ('177', '保健美肤', '37', '');
INSERT INTO `sp_cate` VALUES ('178', '美白美颜', '37', '');
INSERT INTO `sp_cate` VALUES ('179', '养生食品', '37', '');
INSERT INTO `sp_cate` VALUES ('180', '医院常开', '38', '');
INSERT INTO `sp_cate` VALUES ('181', '中药调理', '38', '');
INSERT INTO `sp_cate` VALUES ('182', '保健送礼', '38', '');
INSERT INTO `sp_cate` VALUES ('183', '外用护理', '38', '');
INSERT INTO `sp_cate` VALUES ('184', '养生食品', '38', '');
INSERT INTO `sp_cate` VALUES ('185', '中药调理', '39', '');
INSERT INTO `sp_cate` VALUES ('186', '保健送礼', '39', '');
INSERT INTO `sp_cate` VALUES ('187', '外用护理', '39', '');
INSERT INTO `sp_cate` VALUES ('188', '养生食品', '39', '');
INSERT INTO `sp_cate` VALUES ('189', '保健送礼', '40', '');
INSERT INTO `sp_cate` VALUES ('190', '中药调理', '40', '');
INSERT INTO `sp_cate` VALUES ('191', '养生食品', '40', '');
INSERT INTO `sp_cate` VALUES ('192', '辅助器械', '40', '');
INSERT INTO `sp_cate` VALUES ('193', '外用护理', '40', '');
INSERT INTO `sp_cate` VALUES ('194', '保健送礼', '41', '');
INSERT INTO `sp_cate` VALUES ('195', '中药调理', '41', '');
INSERT INTO `sp_cate` VALUES ('196', '养生食品', '41', '');
INSERT INTO `sp_cate` VALUES ('197', '辅助器械', '41', '');
INSERT INTO `sp_cate` VALUES ('198', '外用护理', '41', '');
INSERT INTO `sp_cate` VALUES ('199', '保健送礼', '42', '');
INSERT INTO `sp_cate` VALUES ('200', '中药调理', '42', '');
INSERT INTO `sp_cate` VALUES ('201', '养生食品', '42', '');
INSERT INTO `sp_cate` VALUES ('202', '辅助器械', '42', '');
INSERT INTO `sp_cate` VALUES ('203', '外用护理', '42', '');
INSERT INTO `sp_cate` VALUES ('204', '保健送礼', '43', '');
INSERT INTO `sp_cate` VALUES ('205', '中药调理', '43', '');
INSERT INTO `sp_cate` VALUES ('206', '养生食品', '43', '');
INSERT INTO `sp_cate` VALUES ('207', '辅助器械', '43', '');
INSERT INTO `sp_cate` VALUES ('208', '外用护理', '43', '');
INSERT INTO `sp_cate` VALUES ('209', '保健送礼', '44', '');
INSERT INTO `sp_cate` VALUES ('210', '中药调理', '44', '');
INSERT INTO `sp_cate` VALUES ('211', '养生食品', '44', '');
INSERT INTO `sp_cate` VALUES ('212', '辅助器械', '44', '');
INSERT INTO `sp_cate` VALUES ('213', '外用护理', '44', '');
INSERT INTO `sp_cate` VALUES ('214', '清热消毒', '45', '');
INSERT INTO `sp_cate` VALUES ('215', '止咳平喘', '45', '');
INSERT INTO `sp_cate` VALUES ('216', '制氧机专区', '45', '');
INSERT INTO `sp_cate` VALUES ('217', '医用级护理', '45', '');
INSERT INTO `sp_cate` VALUES ('218', '智能使用', '45', '');
INSERT INTO `sp_cate` VALUES ('219', '雾化器专区', '45', '');
INSERT INTO `sp_cate` VALUES ('220', '超生式/压电式雾化器', '45', '');
INSERT INTO `sp_cate` VALUES ('221', '鱼跃压缩式雾化器', '45', '');
INSERT INTO `sp_cate` VALUES ('222', '欧姆龙压缩式雾化器', '45', '');
INSERT INTO `sp_cate` VALUES ('223', '儿童专用', '45', '');
INSERT INTO `sp_cate` VALUES ('224', '洗鼻器专区', '45', '');
INSERT INTO `sp_cate` VALUES ('225', '鼻腔护理专区', '45', '');
INSERT INTO `sp_cate` VALUES ('226', '免疫调节', '46', '');
INSERT INTO `sp_cate` VALUES ('227', '外用器械', '46', '');
INSERT INTO `sp_cate` VALUES ('228', '外用护理', '46', '');
INSERT INTO `sp_cate` VALUES ('229', '保健送礼', '46', '');
INSERT INTO `sp_cate` VALUES ('230', '中药调理', '46', '');
INSERT INTO `sp_cate` VALUES ('231', '中药调理', '47', '');
INSERT INTO `sp_cate` VALUES ('232', '免疫调节', '47', '');
INSERT INTO `sp_cate` VALUES ('233', '辅助器械', '47', '');
INSERT INTO `sp_cate` VALUES ('234', '外用护理', '47', '');
INSERT INTO `sp_cate` VALUES ('235', '养生食品', '47', '');
INSERT INTO `sp_cate` VALUES ('236', '免疫调节', '48', '');
INSERT INTO `sp_cate` VALUES ('237', '中药调理', '48', '');
INSERT INTO `sp_cate` VALUES ('238', '保健送礼', '48', '');
INSERT INTO `sp_cate` VALUES ('239', '养生食品', '48', '');
INSERT INTO `sp_cate` VALUES ('240', '外用器械', '48', '');
INSERT INTO `sp_cate` VALUES ('241', '中药调理', '49', '');
INSERT INTO `sp_cate` VALUES ('242', '保健送礼', '49', '');
INSERT INTO `sp_cate` VALUES ('243', '养生食品', '49', '');
INSERT INTO `sp_cate` VALUES ('244', '智能测血压', '49', '');
INSERT INTO `sp_cate` VALUES ('245', '医院常开', '50', '');
INSERT INTO `sp_cate` VALUES ('246', '保健送礼', '50', '');
INSERT INTO `sp_cate` VALUES ('247', '中药调理', '50', '');
INSERT INTO `sp_cate` VALUES ('248', '保健送礼', '51', '');
INSERT INTO `sp_cate` VALUES ('249', '中药调理', '51', '');
INSERT INTO `sp_cate` VALUES ('250', '医院常开', '51', '');
INSERT INTO `sp_cate` VALUES ('251', '外用器械', '51', '');
INSERT INTO `sp_cate` VALUES ('252', '滋补肝肾', '52', '');
INSERT INTO `sp_cate` VALUES ('253', '滋补代用茶', '52', '');
INSERT INTO `sp_cate` VALUES ('254', '无糖膳食', '52', '');
INSERT INTO `sp_cate` VALUES ('255', '监测血糖', '52', '');
INSERT INTO `sp_cate` VALUES ('256', '中药调理', '52', '');
INSERT INTO `sp_cate` VALUES ('257', '保健送礼', '52', '');
INSERT INTO `sp_cate` VALUES ('258', '辅助器械', '52', '');
INSERT INTO `sp_cate` VALUES ('259', '皮肤瘙痒', '52', '');
INSERT INTO `sp_cate` VALUES ('260', '滋补肝肾', '52', '');
INSERT INTO `sp_cate` VALUES ('261', '冠心病专区', '52', '');
INSERT INTO `sp_cate` VALUES ('262', '高血脂专区', '52', '');
INSERT INTO `sp_cate` VALUES ('263', '高血压专区', '52', '');
INSERT INTO `sp_cate` VALUES ('264', '瘦身专区', '52', '');
INSERT INTO `sp_cate` VALUES ('265', '三七精华养生', '53', '');
INSERT INTO `sp_cate` VALUES ('266', '同类三七粉', '53', '');
INSERT INTO `sp_cate` VALUES ('267', '礼致父母', '53', '');
INSERT INTO `sp_cate` VALUES ('268', '礼致伴侣', '53', '');
INSERT INTO `sp_cate` VALUES ('269', '礼致孩子', '53', '');
INSERT INTO `sp_cate` VALUES ('270', '精选好货', '53', '');
INSERT INTO `sp_cate` VALUES ('271', '小康学堂', '53', '');
INSERT INTO `sp_cate` VALUES ('272', '保健送礼', '54', '');
INSERT INTO `sp_cate` VALUES ('273', '中药调理', '54', '');
INSERT INTO `sp_cate` VALUES ('274', '辅助器械', '54', '');
INSERT INTO `sp_cate` VALUES ('275', '外用护理', '54', '');
INSERT INTO `sp_cate` VALUES ('276', '四季养生', '55', '');
INSERT INTO `sp_cate` VALUES ('277', '辅助器械', '56', '');
INSERT INTO `sp_cate` VALUES ('278', '保健送礼', '56', '');
INSERT INTO `sp_cate` VALUES ('279', '中药调理', '56', '');
INSERT INTO `sp_cate` VALUES ('280', '外用护理', '56', '');
INSERT INTO `sp_cate` VALUES ('281', '爱护肠胃', '57', '');
INSERT INTO `sp_cate` VALUES ('282', '理气健脾', '57', '');
INSERT INTO `sp_cate` VALUES ('283', '提高免疫', '57', '');
INSERT INTO `sp_cate` VALUES ('284', '养胃礼包', '57', '');
INSERT INTO `sp_cate` VALUES ('285', '中药调理', '57', '');
INSERT INTO `sp_cate` VALUES ('286', '保健送礼', '57', '');
INSERT INTO `sp_cate` VALUES ('287', '便秘保健', '57', '');
INSERT INTO `sp_cate` VALUES ('288', '养生食品', '57', '');
INSERT INTO `sp_cate` VALUES ('289', '腹痛', '57', '');
INSERT INTO `sp_cate` VALUES ('290', '腹泻', '57', '');
INSERT INTO `sp_cate` VALUES ('291', '胃痛胃胀', '57', '');
INSERT INTO `sp_cate` VALUES ('292', '贫血', '57', '');
INSERT INTO `sp_cate` VALUES ('293', '风湿骨痛', '57', '');
INSERT INTO `sp_cate` VALUES ('294', '爱护肠胃', '58', '');
INSERT INTO `sp_cate` VALUES ('295', '提高免疫', '58', '');
INSERT INTO `sp_cate` VALUES ('296', '润肠通便', '58', '');
INSERT INTO `sp_cate` VALUES ('297', '养胃护胃', '58', '');
INSERT INTO `sp_cate` VALUES ('298', '中药调理', '58', '');
INSERT INTO `sp_cate` VALUES ('299', '补充营养', '58', '');
INSERT INTO `sp_cate` VALUES ('300', '养生食品', '58', '');
INSERT INTO `sp_cate` VALUES ('301', '腹痛', '58', '');
INSERT INTO `sp_cate` VALUES ('302', '胃酸过多', '58', '');
INSERT INTO `sp_cate` VALUES ('303', '胃痛', '58', '');
INSERT INTO `sp_cate` VALUES ('304', '医院常开', '59', '');
INSERT INTO `sp_cate` VALUES ('305', '中药调理', '59', '');
INSERT INTO `sp_cate` VALUES ('306', '保健送礼', '59', '');
INSERT INTO `sp_cate` VALUES ('307', '养生食品', '59', '');
INSERT INTO `sp_cate` VALUES ('308', '强生', '60', '');
INSERT INTO `sp_cate` VALUES ('309', '三诺', '60', '');
INSERT INTO `sp_cate` VALUES ('310', '罗氏', '60', '');
INSERT INTO `sp_cate` VALUES ('311', '雅培', '60', '');
INSERT INTO `sp_cate` VALUES ('312', '鱼跃', '60', '');
INSERT INTO `sp_cate` VALUES ('313', '欧姆龙', '60', '');
INSERT INTO `sp_cate` VALUES ('314', '血糖/尿酸双检测', '60', '');
INSERT INTO `sp_cate` VALUES ('315', '用药控制', '60', '');
INSERT INTO `sp_cate` VALUES ('316', '采血消毒', '60', '');
INSERT INTO `sp_cate` VALUES ('317', '合理饮食', '60', '');
INSERT INTO `sp_cate` VALUES ('318', '中药调理', '60', '');
INSERT INTO `sp_cate` VALUES ('319', '保健护理', '60', '');
INSERT INTO `sp_cate` VALUES ('320', '预防三高', '60', '');
INSERT INTO `sp_cate` VALUES ('321', '医院常开', '61', '');
INSERT INTO `sp_cate` VALUES ('322', '中药调理', '61', '');
INSERT INTO `sp_cate` VALUES ('323', '保健送礼', '61', '');
INSERT INTO `sp_cate` VALUES ('324', '养生食品', '61', '');
INSERT INTO `sp_cate` VALUES ('325', '改善疲劳', '61', '');
INSERT INTO `sp_cate` VALUES ('326', '医院常开', '62', '');
INSERT INTO `sp_cate` VALUES ('327', '保健送礼', '62', '');
INSERT INTO `sp_cate` VALUES ('328', '中药调理', '62', '');
INSERT INTO `sp_cate` VALUES ('329', '养生食品', '62', '');
INSERT INTO `sp_cate` VALUES ('330', '辅助器械', '62', '');
INSERT INTO `sp_cate` VALUES ('331', '医院常开', '63', '');
INSERT INTO `sp_cate` VALUES ('332', '中药调理', '63', '');
INSERT INTO `sp_cate` VALUES ('333', '保健送礼', '63', '');
INSERT INTO `sp_cate` VALUES ('334', '养生食品', '63', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_dingdans
-- ----------------------------
INSERT INTO `sp_dingdans` VALUES ('5', null, null, '111', '11111111111', '22222222222222222', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"2\",\"xj\":416},{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17},{\"id\":\"80\",\"goods_name\":\"\\u5b89\\u798f\\u8fbe \\u5ea6\\u4ed6\\u96c4\\u80fa\\u8f6f\\u80f6\\u56ca 0.5mg*10\\u7c92\",\"goods_sn\":\"1538139737969562\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae2658d74d8.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae2658d74d8.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae2658d74d8.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae2658d74d8.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3ab97726e.jpg\",\"market_price\":\"112.00\",\"shop_price\":\"86.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;\\u524d\\u5217\\u817a\\u7684\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"100.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139736\",\"updatetime\":\"1538210489\",\"count\":\"1\",\"xj\":86},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],1217]', '1539168047759', '1539168047', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('6', null, null, '2222', '11111111111', '333333333333', '22', '33333333', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208},{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17},{\"id\":\"80\",\"goods_name\":\"\\u5b89\\u798f\\u8fbe \\u5ea6\\u4ed6\\u96c4\\u80fa\\u8f6f\\u80f6\\u56ca 0.5mg*10\\u7c92\",\"goods_sn\":\"1538139737969562\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae2658d74d8.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae2658d74d8.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae2658d74d8.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae2658d74d8.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3ab97726e.jpg\",\"market_price\":\"112.00\",\"shop_price\":\"86.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;\\u524d\\u5217\\u817a\\u7684\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"100.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139736\",\"updatetime\":\"1538210489\",\"count\":\"1\",\"xj\":86},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],1009]', '1539168684209', '1539168684', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('7', null, null, '啦啦啦', '18718115564', '广东省广州市天河区兴华', '备注', '发票抬头', '[[{\"id\":\"80\",\"goods_name\":\"\\u5b89\\u798f\\u8fbe \\u5ea6\\u4ed6\\u96c4\\u80fa\\u8f6f\\u80f6\\u56ca 0.5mg*10\\u7c92\",\"goods_sn\":\"1538139737969562\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae2658d74d8.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae2658d74d8.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae2658d74d8.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae2658d74d8.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3ab97726e.jpg\",\"market_price\":\"112.00\",\"shop_price\":\"86.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;\\u524d\\u5217\\u817a\\u7684\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"100.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139736\",\"updatetime\":\"1538210489\",\"count\":\"1\",\"xj\":86},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"2\",\"xj\":1396}],1482]', '1539224247214', '1539224247', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('8', 'makeapile', '12', '来来来', '18718115564', '广东省广州市天河区兴华街道', '备注', '抬头', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208},{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"3\",\"xj\":51}],259]', '1539224388735', '1539224388', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('9', 'makeapile', '12', '来来来', '18718115564', '1111111111111', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208}],208]', '1539227907294', '1539227907', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('10', 'makeapile', '12', '111', '11111111111', '1111111111', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],906]', '1539228754628', '1539228754', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('11', 'makeapile', '12', '222', '11111111111', '333333333333', '', '', '[[{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],698]', '1539238601721', '1539238601', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('12', 'makeapile', '12', '张三', '18718115564', '广东省广州市天河区兴华街道', '备注', '发票', '[[{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"10\",\"xj\":170},{\"id\":\"80\",\"goods_name\":\"\\u5b89\\u798f\\u8fbe \\u5ea6\\u4ed6\\u96c4\\u80fa\\u8f6f\\u80f6\\u56ca 0.5mg*10\\u7c92\",\"goods_sn\":\"1538139737969562\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae2658d74d8.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae2658d74d8.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae2658d74d8.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae2658d74d8.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3ab97726e.jpg\",\"market_price\":\"112.00\",\"shop_price\":\"86.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;\\u524d\\u5217\\u817a\\u7684\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"100.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139736\",\"updatetime\":\"1538210489\",\"count\":\"1\",\"xj\":86}],256]', '1539248383564', '1539248383', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('13', 'makeapile', '12', '111', '11111111111', '111111111111111', '', '', '[[{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],698]', '1539248924652', '1539248924', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('14', 'makeapile', '12', '1111', '11111111111', '1111111111111111111111', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208},{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],923]', '1539249676363', '1539249676', '219.137.184.5', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('15', '123456', '13', '苏番薯', '15813562346', '广州天河区燕塘力达广场', '', '', '[[{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17},{\"id\":\"80\",\"goods_name\":\"\\u5b89\\u798f\\u8fbe \\u5ea6\\u4ed6\\u96c4\\u80fa\\u8f6f\\u80f6\\u56ca 0.5mg*10\\u7c92\",\"goods_sn\":\"1538139737969562\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae2658d74d8.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae2658d74d8.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae2658d74d8.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae2658d74d8.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3ab97726e.jpg\",\"market_price\":\"112.00\",\"shop_price\":\"86.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;\\u524d\\u5217\\u817a\\u7684\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"100.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139736\",\"updatetime\":\"1538210489\",\"count\":\"1\",\"xj\":86},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],801]', '1539249967170', '1539249967', '183.3.255.32', '广东省深圳市 电信');
INSERT INTO `sp_dingdans` VALUES ('16', '123456', '13', '苏番薯', '15813562346', '12345678936985', '', '', '[[{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],698]', '1539250024575', '1539250024', '183.3.255.32', '广东省深圳市 电信');
INSERT INTO `sp_dingdans` VALUES ('17', 'makeapile', '12', '1111', '11111111111', '1111111111111111111111', '', '', '[[{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],715]', '1539258372912', '1539258372', '183.36.112.205', '广东省深圳市 电信');
INSERT INTO `sp_dingdans` VALUES ('18', 'makeapile', '12', '1111', '11111111111', '1111111111111111111111', '', '', '[[{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17}],17]', '1539259862926', '1539259862', '183.36.112.205', '广东省深圳市 电信');
INSERT INTO `sp_dingdans` VALUES ('19', 'makeapile', '12', '1111', '11111111111', '1111111111111111111111', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208},{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],923]', '1539311511435', '1539311511', '219.137.187.167', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('20', 'makeapile', '12', '1111', '11111111111', '1111111111111111111111', '', '', '[[{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17}],17]', '1539311568458', '1539311568', '219.137.187.167', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('21', 'makeapile', '12', '1111', '11111111111', '1111111111111111111111', '', '', '[[{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17}],17]', '1539491300807', '1539491300', '113.71.197.191', '广东省佛山市 电信');
INSERT INTO `sp_dingdans` VALUES ('22', 'makeapile', '12', null, null, null, null, null, '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208},{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"2\",\"xj\":34},{\"id\":\"80\",\"goods_name\":\"\\u5b89\\u798f\\u8fbe \\u5ea6\\u4ed6\\u96c4\\u80fa\\u8f6f\\u80f6\\u56ca 0.5mg*10\\u7c92\",\"goods_sn\":\"1538139737969562\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae2658d74d8.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae2658d74d8.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae2658d74d8.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae2658d74d8.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3ab97726e.jpg\",\"market_price\":\"112.00\",\"shop_price\":\"86.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;\\u524d\\u5217\\u817a\\u7684\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"100.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139736\",\"updatetime\":\"1538210489\",\"count\":\"3\",\"xj\":258},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"4\",\"xj\":2792}],3292]', '1539594616373', '1539594616', '219.137.184.22', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('23', 'makeapile', '12', '姓名', '11111111111', '详细地址详细地址详细地址详细地址', '订单备注', '发票抬头', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208},{\"id\":\"79\",\"goods_name\":\"\\u524d\\u5217\\u5eb7 \\u666e\\u4e50\\u5b89\\u7247 0.57g*60\\u7247\\/\\u76d2\",\"goods_sn\":\"1538139469279263\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae254ced5dc.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae254ced5dc.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae254ced5dc.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae254ced5dc.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3b1ec90d7.jpg\",\"market_price\":\"19.00\",\"shop_price\":\"17.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;\\u7531\\u4e8e\\u524d\\u5217\\u817a\\u708e\\u75c7\\u6216\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u7ec4\\u65b9\\u4e2d\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;\",\"goods_weight\":\"200.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139468\",\"updatetime\":\"1538210590\",\"count\":\"1\",\"xj\":17},{\"id\":\"80\",\"goods_name\":\"\\u5b89\\u798f\\u8fbe \\u5ea6\\u4ed6\\u96c4\\u80fa\\u8f6f\\u80f6\\u56ca 0.5mg*10\\u7c92\",\"goods_sn\":\"1538139737969562\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/5bae2658d74d8.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/sm_5bae2658d74d8.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/mid_5bae2658d74d8.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-28\\/max_5bae2658d74d8.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3ab97726e.jpg\",\"market_price\":\"112.00\",\"shop_price\":\"86.00\",\"onsale\":\"1\",\"cate_id\":\"65\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;\\u524d\\u5217\\u817a\\u7684\\u9010\\u6e10\\u589e\\u5927\\u5bf9\\u5c3f\\u9053\\u53ca\\u8180\\u80f1\\u51fa\\u53e3\\u4ea7\\u751f\\u538b\\u8feb\\uff0c\\u5bfc\\u81f4\\u524d\\u5217\\u817a\\u589e\\u751f\\u6392\\u5c3f\\u56f0\\u96be\\uff0c\\u9700\\u8981\\u6d3b\\u8840\\u5316\\u7600\\uff0c\\u53ea\\u6709\\u524d\\u5217\\u817a\\u758f\\u901a\\u4e86\\uff0c\\u624d\\u80fd\\u5229\\u5c3f\\u6b62\\u75db\\u3002\\u9e92\\u9e9f\\u4e38\\u542b\\u6709\\u4e39\\u53c2\\uff0c\\u90c1\\u91d1\\uff0c\\u9752\\u76ae\\uff0c\\u80fd\\u591f\\u884c\\u6c14\\u6d3b\\u8840\\uff0c\\u884c\\u8840\\u795b\\u7600\\uff0c\\u6d88\\u80bf\\u6b62\\u75db\\uff0c\\u5728\\u8865\\u80be\\u7684\\u540c\\u65f6\\uff0c\\u758f\\u901a\\u524d\\u5217\\u817a\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;\\/&gt;&lt;\\/span&gt;&lt;\\/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"100.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538139736\",\"updatetime\":\"1538210489\",\"count\":\"1\",\"xj\":86},{\"id\":\"81\",\"goods_name\":\"\\u9e92\\u9e9f\\u724c \\u9e92\\u9e9f\\u4e38 30g*6\\u74f6\",\"goods_sn\":\"1538209275984630\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb03586.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/sm_5baf35fb03586.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/mid_5baf35fb03586.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/max_5baf35fb03586.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf35fb234d1.jpg\",\"market_price\":\"789.00\",\"shop_price\":\"698.00\",\"onsale\":\"1\",\"cate_id\":\"66\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180929\\/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538209275\",\"updatetime\":\"1538209275\",\"count\":\"1\",\"xj\":698}],1009]', '1539594936940', '1539594936', '219.137.184.22', '广东省广州市番禺区 电信');
INSERT INTO `sp_dingdans` VALUES ('24', 'makeapile', '12', '', '', '', '', '', '[[{\"id\":\"78\",\"goods_name\":\"\\u5fc5\\u5229\\u52b2 \\u76d0\\u9178\\u8fbe\\u6cca\\u897f\\u6c40\\u7247 30mg*3\\u7247 \\u3010\\u5382\\u5bb6\\u6388\\u6743 \\u6b63\\u54c1\\u6b63\\u8d27\",\"goods_sn\":\"1538061058673212\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/5bacf42c83745.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/sm_5bacf42c83745.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/mid_5bacf42c83745.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-09-27\\/max_5bacf42c83745.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-09-29\\/5baf3a2d6fdb8.jpg\",\"market_price\":\"380.00\",\"shop_price\":\"208.00\",\"onsale\":\"1\",\"cate_id\":\"64\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: \\u5fae\\u8f6f\\u96c5\\u9ed1, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20180927\\/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;\\/&gt;\\u6e29\\u99a8\\u63d0\\u793a\\uff1a\\u8bf7\\u4ed4\\u7ec6\\u9605\\u8bfb\\u8bf4\\u660e\\u4e66\\u5e76\\u5728\\u533b\\u5e08\\u6307\\u5bfc\\u4e0b\\u4f7f\\u7528\\u3002\\u4f9d\\u636e\\u300a\\u836f\\u54c1\\u7ecf\\u8425\\u8d28\\u91cf\\u7ba1\\u7406\\u89c4\\u8303\\u300b\\uff0c\\u9664\\u836f\\u54c1\\u8d28\\u91cf\\u539f\\u56e0\\u5916\\uff0c\\u836f\\u54c1\\u4e00\\u7ecf\\u552e\\u51fa\\uff0c\\u4e0d\\u5f97\\u9000\\u6362\\u3002&lt;\\/span&gt;&lt;\\/p&gt;&lt;p&gt;&lt;br\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":\"90.00\",\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1538061058\",\"updatetime\":\"1538210349\",\"count\":\"1\",\"xj\":208}],208]', '1539670820966', '1539670820', '118.196.151.91', '广东省广州市 长城宽带');
INSERT INTO `sp_dingdans` VALUES ('25', 'klwlbj', '15', 'ddd', '15626140870', 'sss辅导费方式发送到发送到发送到发送到发送到发送到', '对对对', '对对对', '[[{\"id\":\"83\",\"goods_name\":\"\\u8349\\u6676\\u534e\\u7834\\u58c1\\u8349\\u672c \\u5f53\\u5f52\\u7834\\u58c1\\u996e\\u7247 2g*20\\u888b\",\"goods_sn\":\"1539617566795292\",\"original\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b31ecc8da.jpg\",\"sm_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/sm_5bc4b31ecc8da.jpg\",\"mid_thumb\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/mid_5bc4b31ecc8da.jpg\",\"max_thumb\":\"\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/max_5bc4b31ecc8da.jpg\",\"s_pic\":\".\\/Public\\/Uploads\\/Goods\\/2018-10-15\\/5bc4b31eed60c.jpg\",\"market_price\":\"88.00\",\"shop_price\":\"68.00\",\"onsale\":\"1\",\"cate_id\":\"186\",\"brand_id\":\"0\",\"type_id\":\"0\",\"goods_desc\":\"&lt;p&gt;&lt;img src=&quot;\\/ueditor\\/php\\/upload\\/image\\/20181015\\/1539617494.jpg&quot; title=&quot;1539617494.jpg&quot; alt=&quot;20181015233023.jpg&quot;\\/&gt;&lt;\\/p&gt;\",\"goods_weight\":null,\"weight_unit\":\"g\",\"sms\":null,\"addtime\":\"1539617566\",\"updatetime\":\"1539617566\",\"count\":\"2\",\"xj\":136}],136]', '1540958428112', '1540958428', '219.137.185.230', '广东省广州市番禺区 电信');

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
  `onsale` enum('1','0') NOT NULL DEFAULT '1' COMMENT '是否上架',
  `cate_id` mediumint(9) NOT NULL COMMENT '所属栏目',
  `brand_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '所属品牌',
  `type_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '所属商品类型',
  `goods_desc` text NOT NULL COMMENT '详情描述',
  `goods_weight` decimal(10,2) DEFAULT NULL COMMENT '商品重量',
  `weight_unit` enum('g','kg') NOT NULL DEFAULT 'g' COMMENT '重量单位',
  `sms` text,
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '上架时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `shop_price` (`shop_price`,`cate_id`,`brand_id`,`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_goods
-- ----------------------------
INSERT INTO `sp_goods` VALUES ('78', '必利劲 盐酸达泊西汀片 30mg*3片 【厂家授权 正品正货', '1538061058673212', '/Public/Uploads/Goods/2018-09-27/5bacf42c83745.jpg', './Public/Uploads/Goods/2018-09-27/sm_5bacf42c83745.jpg', './Public/Uploads/Goods/2018-09-27/mid_5bacf42c83745.jpg', './Public/Uploads/Goods/2018-09-27/max_5bacf42c83745.jpg', './Public/Uploads/Goods/2018-09-29/5baf3a2d6fdb8.jpg', '380.00', '208.00', '1', '64', '0', '0', '&lt;p&gt;&lt;span style=&quot;color: rgb(136, 136, 136); font-family: 微软雅黑, Verdana, Arial, Helvetica, sans-serif; font-size: 20.4187px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20180927/1538061949.jpg&quot; title=&quot;1538061949.jpg&quot; alt=&quot;20180927230555.jpg&quot;/&gt;温馨提示：请仔细阅读说明书并在医师指导下使用。依据《药品经营质量管理规范》，除药品质量原因外，药品一经售出，不得退换。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '90.00', 'g', null, '1538061058', '1538210349');
INSERT INTO `sp_goods` VALUES ('79', '前列康 普乐安片 0.57g*60片/盒', '1538139469279263', '/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg', './Public/Uploads/Goods/2018-09-28/sm_5bae254ced5dc.jpg', './Public/Uploads/Goods/2018-09-28/mid_5bae254ced5dc.jpg', './Public/Uploads/Goods/2018-09-28/max_5bae254ced5dc.jpg', './Public/Uploads/Goods/2018-09-29/5baf3b1ec90d7.jpg', '19.00', '17.00', '1', '65', '0', '0', '&lt;p style=&quot;line-height: 1.5em;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 微软雅黑, Verdana, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255); font-size: 14px;&quot;&gt;由于前列腺炎症或逐渐增大对尿道及膀胱出口产生压迫，导致前列腺增生排尿困难，需要活血化瘀，只有前列腺疏通了，才能利尿止痛。麒麟丸组方中含有丹参，郁金，青皮，能够行气活血，行血祛瘀，消肿止痛，在补肾的同时，疏通前列腺。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 微软雅黑, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20180929/1538207955.jpg&quot; title=&quot;1538207955.jpg&quot; alt=&quot;22.jpg&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 微软雅黑, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 微软雅黑, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 微软雅黑, Verdana, Arial, Helvetica, sans-serif; font-size: 21.9893px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;', '200.00', 'g', null, '1538139468', '1538210590');
INSERT INTO `sp_goods` VALUES ('80', '安福达 度他雄胺软胶囊 0.5mg*10粒', '1538139737969562', '/Public/Uploads/Goods/2018-09-28/5bae2658d74d8.jpg', './Public/Uploads/Goods/2018-09-28/sm_5bae2658d74d8.jpg', './Public/Uploads/Goods/2018-09-28/mid_5bae2658d74d8.jpg', './Public/Uploads/Goods/2018-09-28/max_5bae2658d74d8.jpg', './Public/Uploads/Goods/2018-09-29/5baf3ab97726e.jpg', '112.00', '86.00', '1', '65', '0', '0', '&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;前列腺的逐渐增大对尿道及膀胱出口产生压迫，导致前列腺增生排尿困难，需要活血化瘀，只有前列腺疏通了，才能利尿止痛。麒麟丸含有丹参，郁金，青皮，能够行气活血，行血祛瘀，消肿止痛，在补肾的同时，疏通前列腺。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;line-height: 1.75em;&quot;&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;line-height: 2em; margin-bottom: 5px;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20180929/1538206668.jpg&quot; title=&quot;1538206668.jpg&quot; alt=&quot;20180929153728.jpg&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 5px; line-height: 2em;&quot;&gt;&lt;br/&gt;&lt;/p&gt;', '100.00', 'g', null, '1538139736', '1538210489');
INSERT INTO `sp_goods` VALUES ('81', '麒麟牌 麒麟丸 30g*6瓶', '1538209275984630', '/Public/Uploads/Goods/2018-09-29/5baf35fb03586.jpg', './Public/Uploads/Goods/2018-09-29/sm_5baf35fb03586.jpg', './Public/Uploads/Goods/2018-09-29/mid_5baf35fb03586.jpg', './Public/Uploads/Goods/2018-09-29/max_5baf35fb03586.jpg', './Public/Uploads/Goods/2018-09-29/5baf35fb234d1.jpg', '789.00', '698.00', '1', '66', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20180929/1538209266.jpg&quot; title=&quot;1538209266.jpg&quot; alt=&quot;20180929162042.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1538209275', '1538209275');
INSERT INTO `sp_goods` VALUES ('82', '斯利安 叶酸片 0.4mg*31片(预防胎儿先天性神经管畸形', '1539617296361180', '/Public/Uploads/Goods/2018-10-15/5bc4b210a07cb.jpg', './Public/Uploads/Goods/2018-10-15/sm_5bc4b210a07cb.jpg', './Public/Uploads/Goods/2018-10-15/mid_5bc4b210a07cb.jpg', './Public/Uploads/Goods/2018-10-15/max_5bc4b210a07cb.jpg', './Public/Uploads/Goods/2018-10-15/5bc4b210c07c3.jpg', '48.00', '29.00', '1', '108', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539617237.jpg&quot; title=&quot;1539617237.jpg&quot; alt=&quot;20181015232645.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1539617296', '1539617296');
INSERT INTO `sp_goods` VALUES ('83', '草晶华破壁草本 当归破壁饮片 2g*20袋', '1539617566795292', '/Public/Uploads/Goods/2018-10-15/5bc4b31ecc8da.jpg', './Public/Uploads/Goods/2018-10-15/sm_5bc4b31ecc8da.jpg', './Public/Uploads/Goods/2018-10-15/mid_5bc4b31ecc8da.jpg', './Public/Uploads/Goods/2018-10-15/max_5bc4b31ecc8da.jpg', './Public/Uploads/Goods/2018-10-15/5bc4b31eed60c.jpg', '88.00', '68.00', '1', '186', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539617494.jpg&quot; title=&quot;1539617494.jpg&quot; alt=&quot;20181015233023.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1539617566', '1539617566');
INSERT INTO `sp_goods` VALUES ('84', '沃荣 大枣(新疆灰枣) 200g(新疆维吾尔自治区 红枣)', '1539617747771644', '/Public/Uploads/Goods/2018-10-15/5bc4b3d3360c8.jpg', './Public/Uploads/Goods/2018-10-15/sm_5bc4b3d3360c8.jpg', './Public/Uploads/Goods/2018-10-15/mid_5bc4b3d3360c8.jpg', './Public/Uploads/Goods/2018-10-15/max_5bc4b3d3360c8.jpg', './Public/Uploads/Goods/2018-10-15/5bc4b3d356ede.jpg', '26.00', '13.00', '1', '210', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539617741.jpg&quot; title=&quot;1539617741.jpg&quot; alt=&quot;20181015233425.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1539617747', '1539617747');
INSERT INTO `sp_goods` VALUES ('85', '仙琚 谱乐益 匹多莫德颗粒 2g:0.4g*30袋', '1539617916631732', '/Public/Uploads/Goods/2018-10-15/5bc4b47cd15b3.jpg', './Public/Uploads/Goods/2018-10-15/sm_5bc4b47cd15b3.jpg', './Public/Uploads/Goods/2018-10-15/mid_5bc4b47cd15b3.jpg', './Public/Uploads/Goods/2018-10-15/max_5bc4b47cd15b3.jpg', './Public/Uploads/Goods/2018-10-15/5bc4b47cf2573.jpg', '275.00', '199.00', '1', '237', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539617900.jpg&quot; title=&quot;1539617900.jpg&quot; alt=&quot;20181015233713.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1539617916', '1539617916');
INSERT INTO `sp_goods` VALUES ('86', '云三七 三七超细粉 90g(3g*30袋)', '1539618051774348', '/Public/Uploads/Goods/2018-10-15/5bc4b5033b7ee.jpg', './Public/Uploads/Goods/2018-10-15/sm_5bc4b5033b7ee.jpg', './Public/Uploads/Goods/2018-10-15/mid_5bc4b5033b7ee.jpg', './Public/Uploads/Goods/2018-10-15/max_5bc4b5033b7ee.jpg', './Public/Uploads/Goods/2018-10-15/5bc4b503609c6.jpg', '298.00', '233.00', '1', '265', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618045.jpg&quot; title=&quot;1539618045.jpg&quot; alt=&quot;20181015233938.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1539618051', '1539618051');
INSERT INTO `sp_goods` VALUES ('87', '高纤宝 玉米粥片 420g/包', '1539618235345749', '/Public/Uploads/Goods/2018-10-15/5bc4b5bae888c.jpg', './Public/Uploads/Goods/2018-10-15/sm_5bc4b5bae888c.jpg', './Public/Uploads/Goods/2018-10-15/mid_5bc4b5bae888c.jpg', './Public/Uploads/Goods/2018-10-15/max_5bc4b5bae888c.jpg', './Public/Uploads/Goods/2018-10-15/5bc4b5bb15ed1.jpg', '39.00', '19.90', '1', '279', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618232.jpg&quot; title=&quot;1539618232.jpg&quot; alt=&quot;20181015234232.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1539618234', '1539618234');
INSERT INTO `sp_goods` VALUES ('88', '粤粤 玫瑰柠檬茶(代用茶) 3g*6袋', '1539618378172389', '/Public/Uploads/Goods/2018-10-15/5bc4b649dcfeb.jpg', './Public/Uploads/Goods/2018-10-15/sm_5bc4b649dcfeb.jpg', './Public/Uploads/Goods/2018-10-15/mid_5bc4b649dcfeb.jpg', './Public/Uploads/Goods/2018-10-15/max_5bc4b649dcfeb.jpg', './Public/Uploads/Goods/2018-10-15/5bc4b64a079c4.jpg', '38.00', '19.90', '1', '332', '0', '0', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20181015/1539618375.jpg&quot; title=&quot;1539618375.jpg&quot; alt=&quot;20181015234507.jpg&quot;/&gt;&lt;/p&gt;', null, 'g', null, '1539618377', '1539618377');

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
INSERT INTO `sp_ip` VALUES ('120', '0.0.0.0', 'm_index', '', '1540969956', '1541038163', '26');
INSERT INTO `sp_ip` VALUES ('121', '127.0.0.1', 'm_index', '', '1540976486', '1541065068', '102');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_user
-- ----------------------------
INSERT INTO `sp_user` VALUES ('12', '18718115564', 'makeapile', '88888888L', '219.137.185.58', '1538648724');
INSERT INTO `sp_user` VALUES ('13', '15813562346', '123456', '123456', '183.3.255.32', '1539249906');
INSERT INTO `sp_user` VALUES ('14', '1', '2', '3', '219.137.187.167', '1539425306');
INSERT INTO `sp_user` VALUES ('15', '15626140870', 'klwlbj', 'aaa123456', '219.137.185.230', '1540951858');
