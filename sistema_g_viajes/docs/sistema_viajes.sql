/*
Navicat MySQL Data Transfer

Source Server         : conex 3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : sistema_viajes

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-07-18 13:08:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for destinos
-- ----------------------------
DROP TABLE IF EXISTS `destinos`;
CREATE TABLE `destinos` (
  `destino_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`destino_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of destinos
-- ----------------------------
INSERT INTO `destinos` VALUES ('1', 'Machu Picchu', 'Perú', 'Una de las siete maravillas del mundo', '1500.00');
INSERT INTO `destinos` VALUES ('2', 'Gran Cañón', 'Estados Unidos', 'Impresionante formación natural', '1200.00');
INSERT INTO `destinos` VALUES ('3', 'Taj Mahal', 'India', 'Monumento icónico de la India', '2000.00');

-- ----------------------------
-- Table structure for reservas
-- ----------------------------
DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
  `reserva_id` int(11) NOT NULL AUTO_INCREMENT,
  `destino_id` int(11) NOT NULL,
  `turista_id` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  PRIMARY KEY (`reserva_id`),
  KEY `destino_id` (`destino_id`),
  KEY `turista_id` (`turista_id`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`destino_id`) REFERENCES `destinos` (`destino_id`),
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`turista_id`) REFERENCES `turistas` (`turista_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservas
-- ----------------------------
INSERT INTO `reservas` VALUES ('1', '1', '1', '2024-08-01');
INSERT INTO `reservas` VALUES ('2', '2', '2', '2024-08-05');
INSERT INTO `reservas` VALUES ('3', '3', '3', '2024-08-10');
INSERT INTO `reservas` VALUES ('4', '1', '2', '2024-07-19');

-- ----------------------------
-- Table structure for turistas
-- ----------------------------
DROP TABLE IF EXISTS `turistas`;
CREATE TABLE `turistas` (
  `turista_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`turista_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of turistas
-- ----------------------------
INSERT INTO `turistas` VALUES ('1', 'Juan', 'Pérez', 'juan.perez@example.com', '123456789');
INSERT INTO `turistas` VALUES ('2', 'Ana', 'García', 'ana.garcia@example.com', '987654321');
INSERT INTO `turistas` VALUES ('3', 'Luis', 'Martínez', 'luis.martinez@example.com', '456123789');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin', 'admin', 'admin', '202cb962ac59075b964b07152d234b70');
