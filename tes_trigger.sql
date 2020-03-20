/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tes_trigger

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-20 15:49:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for beli
-- ----------------------------
DROP TABLE IF EXISTS `beli`;
CREATE TABLE `beli` (
  `id_beli` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` varchar(5) DEFAULT NULL,
  `nama_barang` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_in` datetime DEFAULT NULL,
  PRIMARY KEY (`id_beli`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beli
-- ----------------------------
INSERT INTO `beli` VALUES ('1', '1', 'brg', '10', null, null);
INSERT INTO `beli` VALUES ('2', '1', 'brg', '13', null, null);

-- ----------------------------
-- Table structure for jual
-- ----------------------------
DROP TABLE IF EXISTS `jual`;
CREATE TABLE `jual` (
  `id_jual` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pelanggan` varchar(10) NOT NULL,
  `kd_barang` varchar(5) DEFAULT NULL,
  `nama_barang` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jual
-- ----------------------------
INSERT INTO `jual` VALUES ('1', '12', '1', 'brg1', '3');

-- ----------------------------
-- Table structure for stok
-- ----------------------------
DROP TABLE IF EXISTS `stok`;
CREATE TABLE `stok` (
  `kd_barang` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stok
-- ----------------------------
INSERT INTO `stok` VALUES ('1', '20');
DROP TRIGGER IF EXISTS `beli_barang`;
DELIMITER ;;
CREATE TRIGGER `beli_barang` AFTER INSERT ON `beli` FOR EACH ROW BEGIN
 INSERT INTO stok SET
 kd_barang = NEW.kd_barang, jumlah=New.jumlah
 ON DUPLICATE KEY UPDATE jumlah=jumlah+New.jumlah;
 END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `jual_barang`;
DELIMITER ;;
CREATE TRIGGER `jual_barang` AFTER INSERT ON `jual` FOR EACH ROW BEGIN
 UPDATE stok
 SET jumlah = jumlah - NEW.jumlah
 WHERE
 kd_barang = NEW.kd_barang;
 END
;;
DELIMITER ;
