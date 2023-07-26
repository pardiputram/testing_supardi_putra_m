/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : testing

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2023-07-26 17:12:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_absensi`
-- ----------------------------
DROP TABLE IF EXISTS `tb_absensi`;
CREATE TABLE `tb_absensi` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) DEFAULT NULL,
  `status_piket` int DEFAULT NULL,
  `jabatan` varchar(64) DEFAULT NULL,
  `ket` text,
  `tgl_input` datetime DEFAULT NULL,
  `adm_input` varchar(64) DEFAULT NULL,
  `tgl_piket` date DEFAULT NULL,
  `id_anggota` int DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `idx` (`idx`) USING BTREE,
  KEY `id_anggota` (`id_anggota`) USING BTREE,
  KEY `status_piket` (`status_piket`) USING BTREE,
  CONSTRAINT `id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`idx`) ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tb_absensi
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_anggota`
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggota`;
CREATE TABLE `tb_anggota` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) DEFAULT NULL,
  `jabatan` varchar(64) DEFAULT NULL,
  `piket` int DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `idx` (`idx`) USING BTREE,
  KEY `piket` (`piket`) USING BTREE,
  CONSTRAINT `piket` FOREIGN KEY (`piket`) REFERENCES `tb_dropdown_piket` (`id_piket`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tb_anggota
-- ----------------------------
INSERT INTO `tb_anggota` VALUES ('1', 'Iman', 'Anggota', '1');
INSERT INTO `tb_anggota` VALUES ('2', 'Maulana', 'Anggota', '2');
INSERT INTO `tb_anggota` VALUES ('3', 'Agus', 'Anggota', '3');
INSERT INTO `tb_anggota` VALUES ('4', 'Adon', 'Anggota', '1');
INSERT INTO `tb_anggota` VALUES ('5', 'Adi', 'Anggota', '2');
INSERT INTO `tb_anggota` VALUES ('6', 'Zaki', 'Anggota', '3');
INSERT INTO `tb_anggota` VALUES ('7', 'Yoga', 'Anggota', '1');
INSERT INTO `tb_anggota` VALUES ('8', 'Budi', 'Anggota', '2');
INSERT INTO `tb_anggota` VALUES ('9', 'Yuda', 'Anggota', '3');

-- ----------------------------
-- Table structure for `tb_dropdown_piket`
-- ----------------------------
DROP TABLE IF EXISTS `tb_dropdown_piket`;
CREATE TABLE `tb_dropdown_piket` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) DEFAULT NULL,
  `id_piket` int DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `id_piket` (`id_piket`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tb_dropdown_piket
-- ----------------------------
INSERT INTO `tb_dropdown_piket` VALUES ('1', 'piket hadir', '1');
INSERT INTO `tb_dropdown_piket` VALUES ('2', 'cadangan piket', '2');
INSERT INTO `tb_dropdown_piket` VALUES ('3', 'lepas piket', '3');
INSERT INTO `tb_dropdown_piket` VALUES ('4', 'tidak hadir', '4');

-- ----------------------------
-- Table structure for `tb_piket`
-- ----------------------------
DROP TABLE IF EXISTS `tb_piket`;
CREATE TABLE `tb_piket` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `jadwal_piket` varchar(5) DEFAULT NULL,
  `tgl_piket` date DEFAULT NULL,
  `id_piket` int DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tb_piket
-- ----------------------------
INSERT INTO `tb_piket` VALUES ('1', 'A', '2023-06-20', '1');
INSERT INTO `tb_piket` VALUES ('2', 'B', '2023-06-21', '2');
INSERT INTO `tb_piket` VALUES ('3', 'C', '2023-06-22', '3');
INSERT INTO `tb_piket` VALUES ('4', 'A', '2023-06-23', '1');
INSERT INTO `tb_piket` VALUES ('5', 'B', '2023-06-24', '2');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_general_ci,
  `jabatan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_status` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_adm` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_adm` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `posisi` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_hp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'pimpinan kelompok', 'pimpinan.kelompok', '$2y$10$dCGhrxGWByZjpCXSzooe7.JOk9GsvY3rEkuTiE6321ZY9wXQEIp0e', '1', '1', '2023-06-30 05:08:34', null, '2023-07-26 06:06:24', '1', '1', 'Laki-laki', 'jakartaa', '081234423235');
INSERT INTO `tb_user` VALUES ('10', 'pimpinan apel', 'pimpinan.apel', '$2y$10$dCGhrxGWByZjpCXSzooe7.JOk9GsvY3rEkuTiE6321ZY9wXQEIp0e', '2', '1', null, null, '2023-07-26 06:08:22', '1', '2', 'Laki-laki', 'sdfhhsdhsdhs', '0812432543514');
