/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-12 21:26:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbperson
-- ----------------------------
DROP TABLE IF EXISTS `tbperson`;
CREATE TABLE `tbperson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prename` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `age_y` int(11) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `prov_code` varchar(255) DEFAULT NULL,
  `amp_code` varchar(255) DEFAULT NULL,
  `tmb_code` varchar(255) DEFAULT NULL,
  `dischage_code` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `note` text,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `d_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbperson
-- ----------------------------
INSERT INTO `tbperson` VALUES ('1', 'นาย', 'อุเทน', 'จาดยางโทน', null, '', null, '', '56', '5602', '560207', '', null, '', '1', null, null);
INSERT INTO `tbperson` VALUES ('2', 'นาง', 'aaaa', 'aaaaaaaaaaaa', null, '', null, '', '56', '5605', '560507', '', null, '', '2', '2', '2017-05-12 21:24:34');
INSERT INTO `tbperson` VALUES ('3', 'นาย', 'ออออสส', 'กกกกก', null, '', null, '', '56', '5609', '560901', '', null, '', '2', '2', '2017-05-12 21:24:59');
INSERT INTO `tbperson` VALUES ('4', 'นาย', 'กกกก', 'กกกก', null, '', null, '', '54', '5406', '540602', '', null, '', '2', '2', '2017-05-12 21:15:47');
