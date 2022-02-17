/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50736
 Source Host           : localhost:3306
 Source Schema         : oes

 Target Server Type    : MySQL
 Target Server Version : 50736
 File Encoding         : 65001

 Date: 17/02/2022 13:41:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `aname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `apass` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  UNIQUE INDEX `aid`(`aid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, '0001', 'admin', 'admin');
INSERT INTO `admin` VALUES (2, '0002', 'admin2', 'admin2');
INSERT INTO `admin` VALUES (3, '0003', 'admin3', 'admin3');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `cname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ccapacity` int(11) NULL DEFAULT NULL,
  `cplace` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ctime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ccredit` float NULL DEFAULT NULL,
  `c_tid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  UNIQUE INDEX `cid`(`cid`) USING BTREE,
  INDEX `c_tid`(`c_tid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (1, '0001', '实用英语', 60, '1教206', '周1,1-2节', 3, '19990001');
INSERT INTO `course` VALUES (2, '0002', '计算机基础', 20, '2教306', '周2,3-4节', 1, '20050054');
INSERT INTO `course` VALUES (3, '0003', '英语口语', 30, '1教302', '周3,1-2节', 4.5, '20070014');
INSERT INTO `course` VALUES (4, '0004', '程序设计基础', 50, '2教402', '周2,5-6节', 4, '20030001');
INSERT INTO `course` VALUES (5, '0005', '多媒体技术', 10, '3教302', '周5,7-8节', 2, '19780001');
INSERT INTO `course` VALUES (6, '0006', '形势与政策', 22, '1教303', '周4,9-10节', 5, '19920004');
INSERT INTO `course` VALUES (7, '0007', '数据结构', 30, '5教203', '周3,1-2节', 3.5, '20060006');
INSERT INTO `course` VALUES (8, '0008', 'oop编程', 70, '6教205', '周6,3-4节', 2.5, '20030049');
INSERT INTO `course` VALUES (9, '0009', '汇编语言程序设计', 90, '1教202', '周7,5-6节', 4, '19890007');
INSERT INTO `course` VALUES (10, '0010', '计算机网络', 100, '6教206', '周6,3-4节', 5, '20050055');

-- ----------------------------
-- Table structure for dept
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `did` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dinfo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  UNIQUE INDEX `did`(`did`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dept
-- ----------------------------
INSERT INTO `dept` VALUES (1, '01000', '数理学院', NULL);
INSERT INTO `dept` VALUES (2, '02000', '经济与贸易学院', NULL);
INSERT INTO `dept` VALUES (3, '03000', '计算机科学与工程学院', NULL);
INSERT INTO `dept` VALUES (4, '04000', '重庆汽车学院', NULL);
INSERT INTO `dept` VALUES (5, '05000', '人文社会科学学院', NULL);
INSERT INTO `dept` VALUES (6, '06000', '会计学院', NULL);
INSERT INTO `dept` VALUES (7, '07000', '电子信息与自动化学院', NULL);
INSERT INTO `dept` VALUES (8, '08000', '工商管理学院', NULL);
INSERT INTO `dept` VALUES (9, '09000', '材料科学与工程学院', NULL);
INSERT INTO `dept` VALUES (10, '10000', '生物工程学院', NULL);
INSERT INTO `dept` VALUES (11, '11000', '外国语学院', NULL);
INSERT INTO `dept` VALUES (12, '20000', '商贸信息学院', NULL);
INSERT INTO `dept` VALUES (13, '21000', '应用技术学院', NULL);

-- ----------------------------
-- Table structure for sc
-- ----------------------------
DROP TABLE IF EXISTS `sc`;
CREATE TABLE `sc`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_cid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sc_sid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `score` float NULL DEFAULT NULL,
  `credit_get` float NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  INDEX `sc_sid`(`sc_sid`) USING BTREE,
  INDEX `sc_cid`(`sc_cid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sc
-- ----------------------------
INSERT INTO `sc` VALUES (1, '0001', '20720310307', NULL, NULL);
INSERT INTO `sc` VALUES (2, '0002', '20720310307', NULL, NULL);
INSERT INTO `sc` VALUES (3, '0003', '20720310306', NULL, NULL);
INSERT INTO `sc` VALUES (4, '0004', '20720310306', NULL, NULL);
INSERT INTO `sc` VALUES (5, '0003', '20720310307', NULL, NULL);
INSERT INTO `sc` VALUES (6, '0004', '20720310307', NULL, NULL);
INSERT INTO `sc` VALUES (7, '0006', '20720310306', NULL, NULL);
INSERT INTO `sc` VALUES (8, '0007', '20720310306', NULL, NULL);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `spass` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `s_did` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  UNIQUE INDEX `sid`(`sid`) USING BTREE,
  INDEX `s_did`(`s_did`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, '20620310326', '谭琳', '123456', '01000');
INSERT INTO `student` VALUES (2, '20720310112', '许飞', '123456', '02000');
INSERT INTO `student` VALUES (3, '20720310301', '陈金梅', '123456', '03000');
INSERT INTO `student` VALUES (4, '20720310302', '丁华章', '123456', '04000');
INSERT INTO `student` VALUES (5, '20720310303', '冯继超', '123456', '04000');
INSERT INTO `student` VALUES (6, '20720310304', '龚明校', '123456', '04000');
INSERT INTO `student` VALUES (7, '20720310305', '贺婧婷', '123456', '04000');
INSERT INTO `student` VALUES (8, '20720310306', '胡伟', '123456', '04000');
INSERT INTO `student` VALUES (9, '20720310307', '黄锦湫', '123456', '01000');
INSERT INTO `student` VALUES (10, '20720310308', '黄昭华', '123456', '01000');
INSERT INTO `student` VALUES (11, '20720310309', '黄洲', '123456', '08000');
INSERT INTO `student` VALUES (12, '20720310310', '李彬彬', '123456', '07000');
INSERT INTO `student` VALUES (13, '20720310311', '梁宗荫', '123456', '08000');
INSERT INTO `student` VALUES (14, '20720310312', '刘天阁', '123456', '07000');
INSERT INTO `student` VALUES (15, '20720310313', '罗洁', '123456', '08000');
INSERT INTO `student` VALUES (16, '20720310314', '彭鹃', '123456', '10000');
INSERT INTO `student` VALUES (17, '20720310315', '饶益', '123456', '05000');
INSERT INTO `student` VALUES (18, '20720310316', '任俞', '123456', '06000');
INSERT INTO `student` VALUES (19, '20720310317', '石磊', '123456', '21000');
INSERT INTO `student` VALUES (20, '20720310318', '谢东霖', '123456', '05000');
INSERT INTO `student` VALUES (21, '20720310319', '谢羽', '123456', '06000');
INSERT INTO `student` VALUES (22, '20720310320', '许杨', '123456', '10000');
INSERT INTO `student` VALUES (23, '20720310321', '尤霜', '123456', '06000');
INSERT INTO `student` VALUES (24, '20720310322', '张潇颀', '123456', '20000');
INSERT INTO `student` VALUES (25, '20720310323', '周勇', '123456', '10000');
INSERT INTO `student` VALUES (26, '20720310324', '邱磊', '123456', '10000');
INSERT INTO `student` VALUES (27, '20720310325', '陶阳明', '123456', '21000');
INSERT INTO `student` VALUES (28, '20720310326', '张作龙', '123456', '05000');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tpass` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `t_did` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  UNIQUE INDEX `tid`(`tid`) USING BTREE,
  INDEX `t_did`(`t_did`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES (1, '19990001', '曹锋华', '123456', '05000');
INSERT INTO `teacher` VALUES (2, '20050054', '陈韵', '123456', '05000');
INSERT INTO `teacher` VALUES (3, '20070014', '陈怡', '123456', '02000');
INSERT INTO `teacher` VALUES (4, '20030001', '董国春', '123456', '03000');
INSERT INTO `teacher` VALUES (5, '19780001', '傅珊', '123456', '07000');
INSERT INTO `teacher` VALUES (6, '19920004', '郭赤环', '123456', '20000');
INSERT INTO `teacher` VALUES (7, '20060006', '侯锋', '123456', '02000');
INSERT INTO `teacher` VALUES (8, '20030049', '胡洪波', '123456', '10000');
INSERT INTO `teacher` VALUES (9, '19890007', '林华先', '123456', '11000');
INSERT INTO `teacher` VALUES (10, '20050055', '刘佳', '123456', '05000');
INSERT INTO `teacher` VALUES (11, '20020010', '刘欣', '123456', '21000');

SET FOREIGN_KEY_CHECKS = 1;
