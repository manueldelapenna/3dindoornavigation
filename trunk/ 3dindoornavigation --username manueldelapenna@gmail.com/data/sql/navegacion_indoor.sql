-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2013 a las 22:02:25
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `indoor_navigation`
--
CREATE DATABASE IF NOT EXISTS `indoor_navigation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `indoor_navigation`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructura`
--

CREATE TABLE IF NOT EXISTS `estructura` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo` bigint(20) NOT NULL,
  `capacidad` bigint(20) NOT NULL,
  `es_navegable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `estructura`
--

INSERT INTO `estructura` (`id`, `nombre`, `tipo`, `capacidad`, `es_navegable`) VALUES
(1, 'Facultad de Informática', 2, 1000, 0),
(2, 'Pared de afuera', 3, 0, 0),
(3, 'Consultorio Médico', 1, 10, 1),
(4, 'Pared al lado de Económico Financiera', 3, 0, 0),
(5, 'Área Económico Financiera', 1, 15, 1),
(6, 'Secretaria Administrativa', 1, 15, 1),
(7, 'Despacho', 1, 15, 1),
(8, 'Depto. Personal y Concursos', 1, 15, 1),
(9, 'Oficina de alumnos', 1, 15, 1),
(10, 'Oficina G', 1, 15, 1),
(11, 'Intendencia', 1, 10, 1),
(12, 'Biblioteca', 1, 50, 1),
(13, 'Aula 5 Fortran', 1, 150, 1),
(14, 'Aula 1 PL/1', 1, 50, 1),
(15, 'Aula 2 APL', 1, 50, 1),
(16, 'Aula 3 Cobol', 1, 50, 1),
(17, 'Aula 4 Lisp', 1, 50, 1),
(18, 'Escalera 2', 1, 10, 1),
(19, 'Pared', 3, 0, 0),
(20, 'Baño hombres 2', 1, 15, 1),
(21, 'Baño mujeres 2', 1, 15, 1),
(22, 'Centro de estudiantes', 1, 15, 1),
(23, 'Baño Hombres 1', 1, 15, 1),
(24, 'Baño mujeres 1', 1, 15, 1),
(25, 'Escalera 1', 1, 15, 1),
(26, 'Ascensor', 1, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `tipo` bigint(20) NOT NULL,
  `estructura_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`id`, `nombre`, `tipo`, `estructura_id`) VALUES
(1, 'Biblioteca1.jpeg', 1, 12),
(2, 'Biblioteca2.jpeg', 1, 12),
(3, 'Biblioteca3.jpeg', 1, 12),
(4, 'Biblioteca5.jpeg', 1, 12),
(5, 'Biblioteca6.jpeg', 1, 12),
(6, 'Biblioteca7.jpeg', 1, 12),
(7, 'Biblioteca8.jpeg', 1, 12),
(8, 'Biblioteca9.jpeg', 1, 12),
(9, 'Biblioteca10.jpeg', 1, 12),
(10, 'Biblioteca11.jpeg', 1, 12),
(11, 'Aula 1 - PL1.jpeg', 1, 14),
(12, 'Aula 2 - APL.jpeg', 1, 15),
(13, 'Aula 3 - COBOL.jpeg', 1, 16),
(14, 'Aula 4 - LISP.jpeg', 1, 17),
(15, 'Aula 5 - FORTRAN.jpeg', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pared_dibujable`
--

CREATE TABLE IF NOT EXISTS `pared_dibujable` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `punto_1_id` bigint(20) NOT NULL,
  `punto_2_id` bigint(20) NOT NULL,
  `link_imagen` text NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `punto_1_id_idx` (`punto_1_id`),
  KEY `punto_2_id_idx` (`punto_2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Volcado de datos para la tabla `pared_dibujable`
--

INSERT INTO `pared_dibujable` (`id`, `punto_1_id`, `punto_2_id`, `link_imagen`, `descripcion`) VALUES
(6, 5, 6, 'link 5', 'Pared de entrada principal a la Facultad.'),
(7, 6, 7, 'link 6', 'Pared union, frente con lateral derecha.'),
(8, 7, 8, 'link 7', 'Pared Lateral derecha sobre la entrada princial de la facultad'),
(9, 8, 9, 'link 8', 'Pared union lateral derecha, lateral siguiente.'),
(10, 9, 123, 'link 9', 'Pared final, derecha atras.'),
(12, 109, 12, 'link 11', 'Pared detras de la Fotocopiadora.'),
(13, 12, 17, 'link 12', 'Pasiilo a sector nuevo, Entrada secundaria, frente aula 5, pasillo interno hasta biblioteca.'),
(19, 17, 18, 'link 15', 'Union pasillo lateral izquierdo, con frente de Biblioteca.'),
(20, 18, 21, 'link 16', 'Frente de la Biblioteca de la Facultad'),
(21, 21, 22, 'link 17', 'Union Biblioteca, con pasillo de Alumnos.'),
(22, 22, 23, 'link 18', 'Pasillo interno, con salida al patio interno, frente a alumnos'),
(23, 23, 39, 'link 19', 'Puerta Entrada a pasillo interno, entrando por la entrada de bicicletas.'),
(27, 43, 46, 'link  22', 'Alumnos'),
(28, 46, 50, 'link 23', 'Alumnos ventanilla principal.'),
(29, 50, 55, 'link 24', 'pared lateral alumnos'),
(31, 55, 65, 'link 26', 'Intencia, Oficina G, Alumnos B, Personal y Concursos'),
(37, 89, 76, 'link 28', 'Frente Aula 1, 2, 3 y 4'),
(39, 120, 76, 'link 29', 'Lateral aula 1'),
(42, 89, 92, 'link 32', 'Pared final aula 4 mirando desde pizarron.'),
(44, 123, 126, 'link 34', 'Baño mujeres 1'),
(45, 126, 127, 'link 35', 'Pared lateral derecha de la escalera a 2do piso'),
(46, 127, 128, 'link 36', 'Frente del ascensor + escalera'),
(47, 128, 125, 'Link 37', 'Pared lateral izquierda ascensor mirando de frente.'),
(48, 120, 125, 'link 38', 'Baño de Hombres 1'),
(49, 92, 101, 'link 39', 'Escalera a primer piso, entrada por atras cercana al aula 4'),
(51, 5, 65, 'Link', 'Pared lateral derecha Intendencia'),
(52, 102, 101, 'Link', 'Puerta baño de hombres 2'),
(53, 107, 102, 'Link', 'Union Baño mujeres y hombres 2'),
(54, 107, 108, 'link', 'Puerta baño mujeres 2'),
(55, 108, 109, 'link', 'BAño mujeres 2, pared final del mapa'),
(56, 38, 39, 'link', 'Pared frontal escalera 3'),
(57, 38, 43, 'link', 'Pared lateral final Economica financiera con escalera 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE IF NOT EXISTS `puntos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `punto_origen_x` bigint(20) NOT NULL,
  `punto_origen_y` bigint(20) NOT NULL,
  `estructura_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`id`, `punto_origen_x`, `punto_origen_y`, `estructura_id`) VALUES
(1, 0, 0, 1),
(2, 1650, 0, 1),
(3, 1650, 100, 1),
(4, 2990, 100, 1),
(5, 3085, 270, 1),
(6, 4140, 270, 1),
(7, 4140, 350, 1),
(8, 4680, 1350, 1),
(9, 4610, 1380, 1),
(10, 4780, 1680, 1),
(11, 1490, 3480, 1),
(12, 1100, 2780, 1),
(13, 1510, 2560, 1),
(14, 910, 1480, 1),
(15, 1710, 1050, 1),
(16, 2300, 2150, 1),
(17, 3650, 1400, 1),
(18, 3550, 1220, 1),
(19, 2890, 1640, 1),
(20, 2430, 810, 1),
(21, 3330, 810, 1),
(22, 3270, 600, 1),
(23, 600, 600, 1),
(24, 600, 350, 1),
(25, 300, 350, 1),
(26, 300, 600, 1),
(27, 0, 600, 1),
(28, 0, 0, 2),
(29, 300, 0, 2),
(30, 300, 600, 2),
(31, 0, 600, 2),
(32, 300, 0, 3),
(33, 600, 0, 3),
(34, 600, 450, 3),
(35, 300, 450, 3),
(36, 600, 0, 4),
(37, 1050, 0, 4),
(38, 1050, 300, 4),
(39, 600, 300, 4),
(40, 1050, 0, 5),
(41, 1650, 0, 5),
(42, 1650, 450, 5),
(43, 1050, 450, 5),
(44, 1650, 100, 6),
(45, 1950, 100, 6),
(46, 1950, 450, 6),
(47, 1650, 450, 6),
(48, 1950, 100, 7),
(49, 2250, 100, 7),
(50, 2250, 450, 7),
(51, 1950, 450, 7),
(52, 2250, 100, 8),
(53, 2550, 100, 8),
(54, 2550, 350, 8),
(55, 2250, 350, 8),
(56, 2550, 100, 9),
(57, 2850, 100, 9),
(58, 2850, 350, 9),
(59, 2550, 350, 9),
(60, 2850, 100, 10),
(61, 2990, 100, 10),
(62, 2990, 350, 10),
(63, 2850, 350, 10),
(64, 2990, 105, 11),
(65, 3160, 350, 11),
(66, 2990, 350, 11),
(67, 3330, 810, 12),
(68, 2430, 810, 12),
(69, 2890, 1640, 12),
(70, 3550, 1220, 12),
(71, 2300, 2150, 13),
(72, 1710, 1050, 13),
(73, 910, 1480, 13),
(74, 1510, 2560, 13),
(75, 4050, 2080, 14),
(76, 3740, 1540, 14),
(77, 3410, 1720, 14),
(78, 3710, 2260, 14),
(79, 3710, 2260, 15),
(80, 3410, 1720, 15),
(81, 3080, 1910, 15),
(82, 3370, 2450, 15),
(83, 3370, 2450, 16),
(84, 3080, 1910, 16),
(85, 2750, 2100, 16),
(86, 3040, 2630, 16),
(87, 3040, 2630, 17),
(88, 2750, 2100, 17),
(89, 1860, 2580, 17),
(90, 2150, 3120, 17),
(91, 2150, 3120, 18),
(92, 1950, 2750, 18),
(93, 1560, 2960, 18),
(94, 1760, 3330, 18),
(95, 1980, 3040, 19),
(96, 1850, 2800, 19),
(97, 1670, 2900, 19),
(98, 1790, 3140, 19),
(99, 1760, 3330, 20),
(100, 1560, 2960, 20),
(101, 1490, 3000, 20),
(102, 1520, 3060, 20),
(103, 1450, 3100, 20),
(104, 1620, 3410, 20),
(105, 1620, 3410, 21),
(106, 1450, 3100, 21),
(107, 1380, 3130, 21),
(108, 1350, 3070, 21),
(109, 1285, 3110, 21),
(110, 1490, 3480, 21),
(111, 1100, 2780, 22),
(112, 1380, 2630, 22),
(113, 1470, 2790, 22),
(114, 1260, 2900, 22),
(115, 1320, 3010, 22),
(116, 1250, 3050, 22),
(117, 4050, 2080, 23),
(118, 4440, 1870, 23),
(119, 4360, 1700, 23),
(120, 3960, 1920, 23),
(121, 4440, 1870, 24),
(122, 4780, 1680, 24),
(123, 4690, 1520, 24),
(124, 4350, 1700, 24),
(125, 4140, 1820, 25),
(126, 4580, 1580, 25),
(127, 4460, 1360, 25),
(128, 4020, 1600, 25),
(129, 4190, 1640, 26),
(130, 4410, 1520, 26),
(131, 4360, 1420, 26),
(132, 4140, 1540, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_navegacion`
--

CREATE TABLE IF NOT EXISTS `punto_navegacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `punto_origen_x` bigint(20) NOT NULL,
  `punto_origen_y` bigint(20) NOT NULL,
  `estructura_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Volcado de datos para la tabla `punto_navegacion`
--

INSERT INTO `punto_navegacion` (`id`, `nombre`, `punto_origen_x`, `punto_origen_y`, `estructura_id`) VALUES
(1, 'P1', 3615, 220, NULL),
(2, 'P2', 3615, 525, NULL),
(3, 'P3', 3065, 525, NULL),
(4, 'P4', 3065, 300, 11),
(5, 'P5', 2920, 525, NULL),
(6, 'P6', 2920, 300, 10),
(7, 'P7', 2700, 525, NULL),
(8, 'P8', 2700, 300, 9),
(9, 'P9', 2400, 525, NULL),
(10, 'P10', 2400, 300, 8),
(11, 'P11', 2100, 525, NULL),
(12, 'P12', 2100, 400, 7),
(13, 'P13', 1800, 525, NULL),
(14, 'P14', 1800, 400, 6),
(15, 'P15', 1350, 525, NULL),
(16, 'P16', 1350, 400, 5),
(17, 'P17', 825, 525, NULL),
(18, 'P18', 825, 250, 4),
(19, 'P19', 825, 563, NULL),
(20, 'P20', 550, 563, NULL),
(21, 'P21', 550, 400, 3),
(22, 'P22', 2100, 650, NULL),
(23, 'P23', 2400, 650, NULL),
(24, 'p24', 3815, 900, NULL),
(25, 'p25', 3350, 1050, 12),
(26, 'p26', 4030, 1290, NULL),
(27, 'p27', 4130, 1230, NULL),
(28, 'p28', 4280, 1530, 26),
(29, 'p29', 4270, 1150, NULL),
(30, 'p30', 4440, 1440, 25),
(31, 'p31', 4380, 1090, NULL),
(32, 'p32', 4670, 1620, 24),
(33, 'p33', 3830, 1400, NULL),
(34, 'p34', 4120, 1920, 23),
(35, 'p35', 3540, 1560, NULL),
(36, 'p36', 3620, 1700, 14),
(37, 'p37', 3210, 1750, NULL),
(38, 'p38', 3300, 1890, 15),
(39, 'p39', 2880, 1940, NULL),
(40, 'p40', 2960, 2080, 16),
(41, 'p41', 2550, 2130, NULL),
(42, 'p42', 2630, 2270, 17),
(43, 'p43', 1775, 2550, NULL),
(44, 'p44', 1930, 2830, 18),
(45, 'p45', 1630, 2625, NULL),
(46, 'p46', 1540, 2460, 13),
(47, 'p47', 1500, 2700, NULL),
(48, 'p48', 1400, 2530, NULL),
(49, 'p49', 1230, 2330, NULL),
(50, 'p50', 1370, 2150, 13),
(51, 'p51', 1060, 1930, NULL),
(52, 'p52', 1200, 1840, 13),
(53, 'p53', 1600, 2890, NULL),
(54, 'p54', 1440, 2990, NULL),
(55, 'p55', 1470, 3050, NULL),
(56, 'p56', 1540, 3010, 20),
(57, 'p57', 1380, 3020, NULL),
(58, 'p58', 1410, 3080, NULL),
(59, 'p59', 1335, 3120, 21),
(60, 'p60', 1300, 3060, NULL),
(61, 'p61', 1270, 3000, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_navegacion_punto_navegacion`
--

CREATE TABLE IF NOT EXISTS `punto_navegacion_punto_navegacion` (
  `punto_navegacion_1_id` bigint(20) NOT NULL DEFAULT '0',
  `punto_navegacion_2_id` bigint(20) NOT NULL DEFAULT '0',
  `distancia` float(18,2) NOT NULL,
  PRIMARY KEY (`punto_navegacion_1_id`,`punto_navegacion_2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `punto_navegacion_punto_navegacion`
--

INSERT INTO `punto_navegacion_punto_navegacion` (`punto_navegacion_1_id`, `punto_navegacion_2_id`, `distancia`) VALUES
(1, 2, 305.00),
(2, 3, 550.00),
(2, 24, 425.00),
(3, 4, 225.00),
(3, 5, 145.00),
(5, 6, 225.00),
(5, 7, 220.00),
(7, 8, 225.00),
(7, 9, 300.00),
(9, 10, 225.00),
(9, 11, 300.00),
(9, 23, 125.00),
(11, 12, 125.00),
(11, 13, 300.00),
(11, 22, 125.00),
(13, 14, 125.00),
(13, 15, 450.00),
(15, 16, 125.00),
(15, 17, 525.00),
(17, 18, 275.00),
(17, 19, 37.50),
(19, 20, 275.00),
(20, 21, 162.50),
(24, 25, 515.00),
(24, 26, 440.00),
(26, 27, 100.00),
(26, 33, 250.00),
(27, 28, 350.00),
(27, 29, 140.00),
(29, 30, 350.00),
(29, 31, 110.00),
(31, 32, 580.00),
(33, 34, 580.00),
(33, 35, 340.00),
(35, 36, 190.00),
(35, 37, 380.00),
(37, 38, 190.00),
(37, 39, 380.00),
(39, 40, 190.00),
(39, 41, 380.00),
(41, 42, 190.00),
(41, 43, 825.00),
(43, 44, 255.00),
(43, 45, 145.00),
(45, 46, 215.00),
(45, 47, 130.00),
(47, 48, 220.00),
(47, 53, 240.00),
(48, 49, 350.00),
(49, 50, 190.00),
(49, 51, 350.00),
(51, 52, 190.00),
(53, 54, 160.00),
(54, 55, 80.00),
(54, 57, 160.00),
(55, 56, 120.00),
(57, 58, 80.00),
(57, 60, 130.00),
(58, 59, 120.00),
(60, 61, 110.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Claudio', 'Borré', 'borre.claudio@gmail.com', 'claudio', 'sha1', '73b49f7fa540b2dbba86d9f98d917d6d', '4c709dc731e4da96f662b31615229f745932867f', 1, 1, '2013-10-31 00:32:13', '2012-11-01 21:28:43', '2013-10-31 00:32:13'),
(2, 'Luciano', 'Appathie', 'luciano.appathie@gmail.com', 'luciano', 'sha1', '9ab44ed71a59096dc51682cd58ffe72c', '2ce5e1c4c48e884c739bb7117a182914c333e97c', 1, 1, '2012-11-26 10:13:03', '2012-11-01 21:28:43', '2012-11-26 10:13:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pared_dibujable`
--
ALTER TABLE `pared_dibujable`
  ADD CONSTRAINT `pared_dibujable_punto_1_id_puntos_id` FOREIGN KEY (`punto_1_id`) REFERENCES `puntos` (`id`),
  ADD CONSTRAINT `pared_dibujable_punto_2_id_puntos_id` FOREIGN KEY (`punto_2_id`) REFERENCES `puntos` (`id`);

--
-- Filtros para la tabla `punto_navegacion_punto_navegacion`
--
ALTER TABLE `punto_navegacion_punto_navegacion`
  ADD CONSTRAINT `pppi` FOREIGN KEY (`punto_navegacion_1_id`) REFERENCES `punto_navegacion` (`id`);

--
-- Filtros para la tabla `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
