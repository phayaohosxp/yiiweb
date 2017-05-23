/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-12 09:44:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbvisit
-- ----------------------------
DROP TABLE IF EXISTS `tbvisit`;
CREATE TABLE `tbvisit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` varchar(255) DEFAULT NULL,
  `date_visit` date DEFAULT NULL,
  `time_visit` time DEFAULT NULL,
  `weight` decimal(11,2) DEFAULT NULL,
  `height` decimal(11,2) DEFAULT NULL,
  `pulse` int(11) DEFAULT NULL,
  `sbp` int(11) DEFAULT NULL,
  `dbp` int(11) DEFAULT NULL,
  `mental` varchar(255) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbvisit
-- ----------------------------
