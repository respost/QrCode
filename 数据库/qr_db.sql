/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : qr_db

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2021-08-29 12:26:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `qr_code`
-- ----------------------------
DROP TABLE IF EXISTS `qr_code`;
CREATE TABLE `qr_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qr` varchar(128) NOT NULL DEFAULT '',
  `name` varchar(10) NOT NULL DEFAULT '',
  `alipay` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(255) NOT NULL DEFAULT '',
  `wechat` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qr_code
-- ----------------------------

-- ----------------------------
-- Table structure for `qr_poster`
-- ----------------------------
DROP TABLE IF EXISTS `qr_poster`;
CREATE TABLE `qr_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qr_poster
-- ----------------------------

-- ----------------------------
-- Table structure for `qr_user`
-- ----------------------------
DROP TABLE IF EXISTS `qr_user`;
CREATE TABLE `qr_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `appid` varchar(20) NOT NULL,
  `appkey` varchar(255) DEFAULT NULL,
  `deskey` varchar(8) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `regdate` datetime DEFAULT NULL,
  `lastdate` datetime DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `wechat` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `clear_ip` datetime DEFAULT NULL,
  `qqopenid` varchar(100) DEFAULT NULL,
  `agent` int(11) NOT NULL DEFAULT '0' COMMENT '上级（推荐人）',
  `realname` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `alipay` varchar(20) DEFAULT NULL COMMENT '支付宝账号',
  `qrcode` varchar(100) DEFAULT NULL COMMENT '收款码',
  `avatar` varchar(200) DEFAULT NULL COMMENT '用户头像',
  `status` tinyint(4) DEFAULT '1' COMMENT '0禁用  1启用',
  `censor` int(11) DEFAULT '0' COMMENT '0待审核 1已审核',
  PRIMARY KEY (`id`,`agent`),
  KEY `token` (`id`,`username`,`appkey`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qr_user
-- ----------------------------
