/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-12 09:44:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for c_discharge
-- ----------------------------
DROP TABLE IF EXISTS `c_discharge`;
CREATE TABLE `c_discharge` (
  `dischargecode` char(1) NOT NULL,
  `dischargedesc` varchar(30) NOT NULL,
  PRIMARY KEY (`dischargecode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_discharge
-- ----------------------------
INSERT INTO `c_discharge` VALUES ('1', 'ตาย');
INSERT INTO `c_discharge` VALUES ('2', 'ย้าย');
INSERT INTO `c_discharge` VALUES ('3', 'สาบสูญ');
INSERT INTO `c_discharge` VALUES ('9', 'ไม่จำหน่าย');
