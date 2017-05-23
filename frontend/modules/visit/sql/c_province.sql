/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : yiiweb4

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-05-12 09:43:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for c_province
-- ----------------------------
DROP TABLE IF EXISTS `c_province`;
CREATE TABLE `c_province` (
  `changwatcode` varchar(2) NOT NULL,
  `changwatname` varchar(255) DEFAULT NULL,
  `zonecode` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`changwatcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_province
-- ----------------------------
INSERT INTO `c_province` VALUES ('', 'ไม่ระบุ', '99');
INSERT INTO `c_province` VALUES ('10', 'กรุงเทพมหานคร', '13');
INSERT INTO `c_province` VALUES ('11', 'สมุทรปราการ', '06');
INSERT INTO `c_province` VALUES ('12', 'นนทบุรี', '04');
INSERT INTO `c_province` VALUES ('13', 'ปทุมธานี', '04');
INSERT INTO `c_province` VALUES ('14', 'พระนครศรีอยุธยา', '04');
INSERT INTO `c_province` VALUES ('15', 'อ่างทอง', '04');
INSERT INTO `c_province` VALUES ('16', 'ลพบุรี', '04');
INSERT INTO `c_province` VALUES ('17', 'สิงห์บุรี', '04');
INSERT INTO `c_province` VALUES ('18', 'ชัยนาท', '03');
INSERT INTO `c_province` VALUES ('19', 'สระบุรี', '04');
INSERT INTO `c_province` VALUES ('20', 'ชลบุรี', '06');
INSERT INTO `c_province` VALUES ('21', 'ระยอง', '06');
INSERT INTO `c_province` VALUES ('22', 'จันทบุรี', '06');
INSERT INTO `c_province` VALUES ('23', 'ตราด', '06');
INSERT INTO `c_province` VALUES ('24', 'ฉะเชิงเทรา', '06');
INSERT INTO `c_province` VALUES ('25', 'ปราจีนบุรี', '06');
INSERT INTO `c_province` VALUES ('26', 'นครนายก', '04');
INSERT INTO `c_province` VALUES ('27', 'สระแก้ว', '06');
INSERT INTO `c_province` VALUES ('30', 'นครราชสีมา', '09');
INSERT INTO `c_province` VALUES ('31', 'บุรีรัมย์', '09');
INSERT INTO `c_province` VALUES ('32', 'สุรินทร์', '09');
INSERT INTO `c_province` VALUES ('33', 'ศรีสะเกษ', '10');
INSERT INTO `c_province` VALUES ('34', 'อุบลราชธานี', '10');
INSERT INTO `c_province` VALUES ('35', 'ยโสธร', '10');
INSERT INTO `c_province` VALUES ('36', 'ชัยภูมิ', '09');
INSERT INTO `c_province` VALUES ('37', 'อำนาจเจริญ', '10');
INSERT INTO `c_province` VALUES ('38', 'บึงกาฬ', '08');
INSERT INTO `c_province` VALUES ('39', 'หนองบัวลำภู', '08');
INSERT INTO `c_province` VALUES ('40', 'ขอนแก่น', '07');
INSERT INTO `c_province` VALUES ('41', 'อุดรธานี', '08');
INSERT INTO `c_province` VALUES ('42', 'เลย', '08');
INSERT INTO `c_province` VALUES ('43', 'หนองคาย', '08');
INSERT INTO `c_province` VALUES ('44', 'มหาสารคาม', '07');
INSERT INTO `c_province` VALUES ('45', 'ร้อยเอ็ด', '07');
INSERT INTO `c_province` VALUES ('46', 'กาฬสินธุ์', '07');
INSERT INTO `c_province` VALUES ('47', 'สกลนคร', '08');
INSERT INTO `c_province` VALUES ('48', 'นครพนม', '08');
INSERT INTO `c_province` VALUES ('49', 'มุกดาหาร', '10');
INSERT INTO `c_province` VALUES ('50', 'เชียงใหม่', '01');
INSERT INTO `c_province` VALUES ('51', 'ลำพูน', '01');
INSERT INTO `c_province` VALUES ('52', 'ลำปาง', '01');
INSERT INTO `c_province` VALUES ('53', 'อุตรดิตถ์', '02');
INSERT INTO `c_province` VALUES ('54', 'แพร่', '01');
INSERT INTO `c_province` VALUES ('55', 'น่าน', '01');
INSERT INTO `c_province` VALUES ('56', 'พะเยา', '01');
INSERT INTO `c_province` VALUES ('57', 'เชียงราย', '01');
INSERT INTO `c_province` VALUES ('58', 'แม่ฮ่องสอน', '01');
INSERT INTO `c_province` VALUES ('60', 'นครสวรรค์', '03');
INSERT INTO `c_province` VALUES ('61', 'อุทัยธานี', '03');
INSERT INTO `c_province` VALUES ('62', 'กำแพงเพชร', '03');
INSERT INTO `c_province` VALUES ('63', 'ตาก', '02');
INSERT INTO `c_province` VALUES ('64', 'สุโขทัย', '02');
INSERT INTO `c_province` VALUES ('65', 'พิษณุโลก', '02');
INSERT INTO `c_province` VALUES ('66', 'พิจิตร', '03');
INSERT INTO `c_province` VALUES ('67', 'เพชรบูรณ์', '02');
INSERT INTO `c_province` VALUES ('70', 'ราชบุรี', '05');
INSERT INTO `c_province` VALUES ('71', 'กาญจนบุรี', '05');
INSERT INTO `c_province` VALUES ('72', 'สุพรรณบุรี', '05');
INSERT INTO `c_province` VALUES ('73', 'นครปฐม', '05');
INSERT INTO `c_province` VALUES ('74', 'สมุทรสาคร', '05');
INSERT INTO `c_province` VALUES ('75', 'สมุทรสงคราม', '05');
INSERT INTO `c_province` VALUES ('76', 'เพชรบุรี', '05');
INSERT INTO `c_province` VALUES ('77', 'ประจวบคีรีขันธ์', '05');
INSERT INTO `c_province` VALUES ('80', 'นครศรีธรรมราช', '11');
INSERT INTO `c_province` VALUES ('81', 'กระบี่', '11');
INSERT INTO `c_province` VALUES ('82', 'พังงา', '11');
INSERT INTO `c_province` VALUES ('83', 'ภูเก็ต', '11');
INSERT INTO `c_province` VALUES ('84', 'สุราษฎร์ธานี', '11');
INSERT INTO `c_province` VALUES ('85', 'ระนอง', '11');
INSERT INTO `c_province` VALUES ('86', 'ชุมพร', '11');
INSERT INTO `c_province` VALUES ('90', 'สงขลา', '12');
INSERT INTO `c_province` VALUES ('91', 'สตูล', '12');
INSERT INTO `c_province` VALUES ('92', 'ตรัง', '12');
INSERT INTO `c_province` VALUES ('93', 'พัทลุง', '12');
INSERT INTO `c_province` VALUES ('94', 'ปัตตานี', '12');
INSERT INTO `c_province` VALUES ('95', 'ยะลา', '12');
INSERT INTO `c_province` VALUES ('96', 'นราธิวาส', '12');
INSERT INTO `c_province` VALUES ('99', 'ไม่ทราบ', '99');
