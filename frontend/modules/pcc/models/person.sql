/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-23 12:21:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prename` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `moo` varchar(255) DEFAULT NULL,
  `prov_code` varchar(255) DEFAULT NULL,
  `amp_code` varchar(255) DEFAULT NULL,
  `tmb_code` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `rapid` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('1', 'นาย', 'ออออ', 'ยยยยยย', '2015-01-06', '2', '12', '4', '50', '5011', '501105', '', '', 'green', null, null, null, '2017-05-23 11:54:43');
INSERT INTO `person` VALUES ('3', 'นาง', 'cxcxcxc', 'xcxcxc', '2009-01-04', '8', '', '', '51', '5101', '510101', '', '', 'yellow', null, null, null, null);
INSERT INTO `person` VALUES ('5', 'นาง', 'dvdvxcv', 'xcxcxc', '2017-01-02', null, '', '', '51', '5101', '510108', '', '', 'red', null, null, null, null);
