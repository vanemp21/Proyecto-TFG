-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla restaurante-macia.carrito
CREATE TABLE IF NOT EXISTS `carrito` (
  `idPedido` varchar(200) NOT NULL DEFAULT '0',
  `idComida` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla restaurante-macia.carrito: ~0 rows (aproximadamente)
DELETE FROM `carrito`;

-- Volcando estructura para tabla restaurante-macia.comida
CREATE TABLE IF NOT EXISTS `comida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `imagen` varchar(5000) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL COMMENT '1= COMIDA, 2= BEBIDA',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla restaurante-macia.comida: ~45 rows (aproximadamente)
DELETE FROM `comida`;
INSERT INTO `comida` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `tipo`) VALUES
	(1, 'Hamburguesa', 'Deliciosa hamburguesa hecha de vacuno tierno en la parrilla', 'https://i.imgur.com/VDoFYzu.png', 10, 1),
	(2, 'HotDog', 'Delicioso perrito caliente con ketchup y mostaza ', 'https://i.imgur.com/CLi4sPk.png', 15, 1),
	(3, 'Tequeños', 'Deliciosos tequeños rellenos de queso recién hechos y caseros de la casa', 'https://i.imgur.com/wHeC2l4.png', 11, 0),
	(4, 'Croquetas', 'Croquetas con autentica bechamel casera, rellenas de jamón', 'https://i.imgur.com/S18jKaN.png', 12, 0),
	(5, 'Espaguetis', 'Espaguetis con salsa a la boloñesa con receta de la casa', 'https://i.imgur.com/i30WJdc.png', 10, 1),
	(6, 'Pizza', 'Pizza de jamón york y queso hecha en nuestro horno de piedra', 'https://i.imgur.com/6qGFVhK.png', 10, 1),
	(7, 'Kebap', 'Kebap durum mixto con salsa de yogur, ketchup y verduras ', 'https://i.imgur.com/ndxGtt1.png', 10, 1),
	(8, 'Patatas', 'Patatas fritas para acompañar, recién hechas ', 'https://i.imgur.com/X6K9kKF.png', 10, 1),
	(9, 'Alitas de pollo', 'Alitas de pollo rebozadas en la casa con una salsa especial de la casa', 'https://i.imgur.com/0Nben6y.png', 10, 1),
	(10, 'CocaCola', 'Refresco de CocaCola en botella de cristal', 'https://i.imgur.com/hKKejBz.png', 1, 2),
	(11, 'Sandwich', 'Sandwich de jamón york y queso con una base de mantequilla', 'https://i.imgur.com/TDyv6sx.png', 10, 1),
	(12, 'Tortilla', 'Tortilla de patatas con cebolla y patatas de cosecha propia', 'https://i.imgur.com/DrQ8G0P.png', 10, 1),
	(13, 'Nuggets', 'Nuggets de pollo con un rebozado crocante y una pizca de picante', 'https://i.imgur.com/70m7riC.png', 10, 0),
	(14, 'Aros de cebolla', 'Aros de cebolla enharinados con harina de trigo de la casa', 'https://i.imgur.com/ElCsrcz.png', 10, 0),
	(15, 'Gyozas', 'Gyozas de atún y bonito con tomate y cebolla ', 'https://i.imgur.com/y9rg6lW.png', 10, 0),
	(16, 'Ensalada', 'Ensalada con tomate, atún, aceitunas, lechuga y alineada', 'https://i.imgur.com/BHDNEyk.png', 2, 1),
	(17, 'Sopa', 'Sopa de fideos y carne picada ', 'https://i.imgur.com/66Jo4e5.png', 3, 1),
	(18, 'Arroz', 'Arroz blanco para acompañar cualquier otro plato', 'https://i.imgur.com/kW4KGS4.png', 4, 1),
	(19, 'Pan de ajo', 'Pan de ajo hecho a mano en nuestros hornos de piedra', 'https://i.imgur.com/LesdPa7.png', 3, 0),
	(20, 'Panecillo', 'Panecillo para acompañar cualquier otro plato recién hecho', 'https://i.imgur.com/D93zxEB.png', 1, 0),
	(21, 'Boquerones', 'Boquerones alineados', 'https://i.imgur.com/hjD3G2g.png', 3, 0),
	(22, 'Tartaleta carne', 'Deliciosa tartaleta de carne picada y cebolla recién hecha', 'https://i.imgur.com/OFrecER.png', 3, 0),
	(23, 'Aceitunas', 'Aceitunas cosechadas en nuestras tierras ', 'https://i.imgur.com/LelUeCM.png', 1, 0),
	(24, 'Chips', 'Patatas de bolsa de las clásicas', 'https://i.imgur.com/eMb3Khk.png', 2, 0),
	(25, 'Ñoquis', 'Ñoquis con delicoso tomate frito', 'https://i.imgur.com/eMW4vMe.png', 2, 0),
	(26, 'Cerveza', 'Refrescante cerveza en botellín', 'https://i.imgur.com/Kd8Z8TV.png', 2, 2),
	(27, 'Agua', 'Agua fresca en botella', 'https://i.imgur.com/NFrIua8.png', 1, 2),
	(28, 'Vino', 'Vino en lata de la mejor cosecha', 'https://i.imgur.com/zlCDxWz.png', 3, 2),
	(29, 'Fanta', 'Refrescante Fanta en lata', 'https://i.imgur.com/KnVvZk7.png', 1, 2),
	(30, 'Monster', 'Refrescante Monster en lata', 'https://i.imgur.com/D66wrOZ.png', 2, 2),
	(31, 'Sidra', 'Refrescante Sidra en lata sin alcohol', 'https://i.imgur.com/8f62xib.png', 3, 2),
	(32, 'Nestea', 'Refrescante Nestea en botella', 'https://i.imgur.com/EzCzsR5.png', 1, 2),
	(33, 'Acuarius', 'Refrescante Acuarios en botella', 'https://i.imgur.com/viW6GZX.png', 1, 2),
	(34, 'Zumo naranja', 'Refrescante zumo de naranja recién exprimido en botella', 'https://i.imgur.com/5rETj2u.png', 1, 2),
	(35, 'Zumo piña', 'Refrescante zumo de piña en botella', 'https://i.imgur.com/bLv1agg.png', 1, 2),
	(36, 'Sprite', 'Refrescante Sprite en botella', 'https://i.imgur.com/S8ylQVl.png', 1, 2),
	(37, 'Helado limón', 'Delicioso helado hecho en casa de limón y canela', 'https://i.imgur.com/mrYCpYh.png', 3, 3),
	(38, 'Helado fresa', 'Delicioso helado hecho en casa de fresa y pepitas de chocolate', 'https://i.imgur.com/P4njNB8.png', 3, 3),
	(39, 'Helado choco', 'Delicioso helado hecho en casa de chocolate y nata', 'https://i.imgur.com/blVsiKK.png', 3, 3),
	(40, 'Yogur fresa', 'Yogur de fresa de Danone', 'https://i.imgur.com/Y8OZhpc.png', 2, 3),
	(41, 'Yogur fruta', 'Yogur de frutas de Danone', 'https://i.imgur.com/RcKEJPL.png', 2, 3),
	(42, 'Yogur avena', 'Yogur de avena de con frutos secos y fruta del bosque', 'https://i.imgur.com/rWbVLeI.png', 2, 3),
	(43, 'Tarta limón', 'Tarta de limón hecho en casa con un toque ácido', 'https://i.imgur.com/jqzgJSx.png', 4, 3),
	(44, 'Tarta chocolate', 'Tarta de chocolate hecho en casa con un toque a café', 'https://i.imgur.com/L2Nx6Cu.png', 4, 3),
	(45, 'Tarta fresa', 'Tarta de fresa hecha en casa con un toque a canela', 'https://i.imgur.com/PxZiN0a.png', 4, 3);

-- Volcando estructura para tabla restaurante-macia.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `conectado` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=493 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla restaurante-macia.login: ~0 rows (aproximadamente)
DELETE FROM `login`;

-- Volcando estructura para tabla restaurante-macia.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` varchar(200) NOT NULL DEFAULT '0',
  `idComida` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla restaurante-macia.pedidos: ~0 rows (aproximadamente)
DELETE FROM `pedidos`;

-- Volcando estructura para tabla restaurante-macia.registro
CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `correo` varchar(350) NOT NULL,
  `pass` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `unique_correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla restaurante-macia.registro: ~3 rows (aproximadamente)
DELETE FROM `registro`;
INSERT INTO `registro` (`id`, `nombre`, `correo`, `pass`) VALUES
	(24, 'VanessaRubio', 'VanessaRubio@gmail.es', 'VanessaRubio1'),
	(25, 'administrador', 'admin@gmail.es', 'admin123'),
	(26, 'Profesor', 'user@gmail.es', 'user123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
