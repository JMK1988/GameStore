-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-09-2021 a las 21:46:11
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_final`
--
CREATE DATABASE `proyecto_final` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `proyecto_final`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ordenLista` int(2) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `detalle`, `ordenLista`) VALUES
(1, 'Juegos', 2),
(2, 'Consolas', 1),
(3, 'Accesorios', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidodetalle`
--

CREATE TABLE IF NOT EXISTS `pedidodetalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioSinIva` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPedido` (`idPedido`),
  KEY `idProductos` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `pedidodetalle`
--

INSERT INTO `pedidodetalle` (`id`, `idPedido`, `idProducto`, `detalle`, `cantidad`, `precioSinIva`) VALUES
(1, 1, 7, 'Parlante Gx Gaming Sw-g', 1, '1000.00'),
(2, 1, 11, 'Mouse Logitech G Pro Gaming', 2, '1000.00'),
(3, 1, 6, 'PlayStation 3 512Gb ', 1, '1000.00'),
(4, 1, 2, 'PlayStation 4 Slim 1Tb', 1, '1000.00'),
(5, 1, 1, 'PlayStation 5', 1, '1000.00'),
(6, 2, 18, 'StarCraft 2', 1, '1111.00'),
(7, 2, 19, 'Battlefield 5', 1, '1112.00'),
(8, 2, 9, 'Joystick Ps4 Dualshock 4 Black', 1, '1000.00'),
(9, 3, 20, 'Mortal Kombat 11', 1, '1212.00'),
(10, 3, 24, 'PlayStation Store', 1, '1200.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedidos` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ApellidoNombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDoc` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `localidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codPostal` int(4) NOT NULL,
  `domicilio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `envio` char(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'S-Si, N-No',
  PRIMARY KEY (`idPedidos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedidos`, `fecha`, `hora`, `ApellidoNombre`, `tipoDoc`, `documento`, `localidad`, `codPostal`, `domicilio`, `telefono`, `email`, `envio`) VALUES
(1, '2021-09-17', '10:34:00', 'afas', 'DNI', 33856698, 'asfa', 2112, 'asf', 2121, '121', 'N'),
(2, '2021-09-17', '10:35:00', '1', 'DNI', 22589965, 'a', 1231, 'a', 1, '1', 'N'),
(3, '2021-09-17', '10:53:00', 'asf', 'DNI', 33856698, '12', 1212, '12', 121, '111', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `destacado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N' COMMENT 'S-Si, N-No',
  `precioSinIva` decimal(10,2) NOT NULL,
  `OrdenLista` int(2) NOT NULL,
  `PorcIva` decimal(4,2) DEFAULT '0.00' COMMENT '21,00 - 10,5',
  `idCategoria` int(11) NOT NULL,
  `foto1` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto3` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idSubCategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `idCategoria` (`idCategoria`),
  KEY `idSubCategoria` (`idSubCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=58 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `detalle`, `destacado`, `precioSinIva`, `OrdenLista`, `PorcIva`, `idCategoria`, `foto1`, `foto2`, `foto3`, `idSubCategoria`) VALUES
(1, 'PlayStation 5', 'N', '1000.00', 1, '0.00', 2, 'images/consolas/ps52.jpeg', NULL, NULL, NULL),
(2, 'PlayStation 4 Slim 1Tb', 'N', '1000.00', 2, '0.00', 2, 'images/consolas/Ps4.png', NULL, NULL, NULL),
(3, 'Xbox Serie S 512Gb', 'N', '1000.00', 3, '0.00', 2, 'images/consolas/xbox S5.jpg', NULL, NULL, NULL),
(4, 'Xbox Serie X 1Tb ', 'N', '1000.00', 4, '0.00', 2, 'images/consolas/xbox-series-x-1tb-edicion-estandar-80660.jpg', NULL, NULL, NULL),
(5, 'Nintendo Switch Neon', 'N', '1000.00', 5, '0.00', 2, 'images/consolas/nintendo-switch-neon-12761.jpg', NULL, NULL, NULL),
(6, 'PlayStation 3 512Gb ', 's', '1000.00', 6, '0.00', 2, 'images/consolas/2235-problema-fechas-ps3-fat-corregido.webp', 'images/ETIQUETA-SALE.PNG', NULL, NULL),
(7, 'Parlante Gx Gaming Sw-g', 's', '1000.00', 1, '0.00', 3, 'images/accesorios/parlante-gx-gaming-swg21-1250-8263.jpg', 'images/ETIQUETA-SALE.PNG', NULL, NULL),
(8, 'Auricular Trust Carus Gxt 322', 'N', '1000.00', 2, '0.00', 3, 'images/accesorios/headset-trust-carus-gxt-322-black-76356.png', NULL, NULL, NULL),
(9, 'Joystick Ps4 Dualshock 4 Black', 'N', '1000.00', 3, '0.00', 3, 'images/accesorios/joystick-ps4-dualshock-4-black-76287.jpg', NULL, NULL, NULL),
(10, 'Disco solido Adata 1 Tb', 'N', '1000.00', 4, '0.00', 3, 'images/accesorios/disco-rigido-externo-adata-1tb-durable-82851.jpg', NULL, NULL, NULL),
(11, 'Mouse Logitech G Pro Gaming', 's', '1000.00', 5, '0.00', 3, 'images/accesorios/mouse-logitech-g-pro-gaming-8099.jpg', 'images/ETIQUETA-SALE.PNG', NULL, NULL),
(12, 'Router Tp Link Ti Wr840n', 's', '1000.00', 6, '0.00', 3, 'images/accesorios/router-tp-link-tl-wr840n-73003.jpg', 'images/ETIQUETA-SALE.PNG', NULL, NULL),
(13, 'Fifa 2022', 'N', '1000.00', 1, '0.00', 1, 'images/juegos/preventa-ps5-fifa-22-83381.jpg', NULL, NULL, 1),
(14, 'CoD Black Ops Cold War', 'N', '1001.00', 2, '0.00', 1, 'images/juegos/ps5-call-of-duty-black-ops-cold-war-78482.jpg', NULL, NULL, 1),
(15, 'Demons Souls', 'N', '1003.00', 3, '0.00', 1, 'images/juegos/ps5-demons-souls-79399.jpg', NULL, NULL, 1),
(16, 'BattleField 2042', 'N', '1100.00', 4, '0.00', 1, 'images/juegos/preventa-ps5-battlefield-2042-83061.jpg', NULL, NULL, 1),
(17, 'Fortnite The Last Laugh', 'N', '1111.00', 5, '0.00', 1, 'images/juegos/ps5-fortnite-the-last-laugh-bundle-79091.jpg', NULL, NULL, 1),
(18, 'StarCraft 2', 'S', '1111.00', 6, '0.00', 1, 'images/juegos/starcraft2.png', 'images/ETIQUETA-SALE.PNG', NULL, NULL),
(19, 'Battlefield 5', 'S', '1112.00', 7, '0.00', 1, 'images/juegos/battlefield5.png', 'images/ETIQUETA-SALE.PNG', NULL, NULL),
(20, 'Mortal Kombat 11', 'n', '1212.00', 8, '0.00', 1, 'images/juegos/mortalkombat11.png', '', NULL, NULL),
(24, 'PlayStation Store', 'N', '1200.00', 9, '0.00', 1, 'images/juegos/psstore.jpeg', NULL, NULL, NULL),
(25, 'Cave Story', 'N', '1211.00', 10, '0.00', 1, 'images/juegos/nsw-cave-story--8199.jpg', NULL, NULL, NULL),
(27, 'Donkey kong CTF', 'N', '1.00', 11, '0.00', 1, 'images/juegos/nsw-donkey-kong-country-tropical-freeze-8203.jpg', NULL, NULL, NULL),
(28, 'DBZ Xenoverse 2', 'N', '2.00', 12, '0.00', 1, 'images/juegos/nsw-dragon-ball-xenoverse-2-8207.jpg', NULL, NULL, NULL),
(29, 'Pokemon Sword', 'N', '3.00', 13, '0.00', 1, 'images/juegos/nsw-pokemon-espada-12613.jpg', NULL, NULL, NULL),
(30, 'Zelda Breath of the wild', 'N', '4.00', 14, '0.00', 1, 'images/juegos/nsw-zelda-breath-of-the-wild-8248.jpg', NULL, NULL, NULL),
(31, 'The last of us 2', 'N', '5.00', 15, '0.00', 1, 'images/juegos/preventa-the-last-of-us-2-75679.jpg', NULL, NULL, NULL),
(32, 'GTA 5 Premium', 'N', '6.00', 16, '0.00', 1, 'images/juegos/ps4-gta-5-premium-edition-12732.jpg', NULL, NULL, NULL),
(33, 'CyberPunk 2077', 'N', '7.00', 17, '0.00', 1, 'images/juegos/ps4-preventa-cyberpunk-2077-75758.jpg', NULL, NULL, NULL),
(34, 'Fifa Street', 'N', '8.00', 18, '0.00', 1, 'images/juegos/ps3-fifa-street-8326.jpg', NULL, NULL, NULL),
(35, 'GTA V', 'N', '9.00', 19, '0.00', 1, 'images/juegos/ps3-gta-5-8333.jpg', NULL, NULL, NULL),
(36, 'Rayman Origins', 'N', '10.00', 20, '0.00', 1, 'images/juegos/ps3-rayman-origins-8390.jpg', NULL, NULL, NULL),
(37, 'Webcam Logitech C505', 'N', '1.00', 7, '0.00', 3, 'images/accesorios/webcam-logitech-c505-hd-83881.jpg', NULL, NULL, NULL),
(38, 'Webcam Logitech C920s', 'N', '2.00', 8, '0.00', 3, 'images/accesorios/webcam-logitech-c920s-pro-hd-83456.png', NULL, NULL, NULL),
(39, 'Kontrol Freek Apex', 'N', '3.00', 9, '0.00', 3, 'images/accesorios/kontrol-freek-speed-freek-apex-74850.jpg', NULL, NULL, NULL),
(40, 'Kontrol Freek Grips', 'N', '4.00', 10, '0.00', 3, 'images/accesorios/kontrol-freek-grips-for-ps4-74838.jpg', NULL, NULL, NULL),
(41, 'Webcam Coby Dash', 'N', '5.00', 11, '0.00', 3, 'images/accesorios/camara-coby-dash-cam-82130.jpeg', NULL, NULL, NULL),
(42, 'Donkey kong CTF', 'N', '1.00', 11, '0.00', 1, 'images/juegos/nsw-donkey-kong-country-tropical-freeze-8203.jpg', NULL, NULL, NULL),
(43, 'DBZ Xenoverse 2', 'N', '2.00', 12, '0.00', 1, 'images/juegos/nsw-dragon-ball-xenoverse-2-8207.jpg', NULL, NULL, NULL),
(44, 'Pokemon Sword', 'N', '3.00', 13, '0.00', 1, 'images/juegos/nsw-pokemon-espada-12613.jpg', NULL, NULL, NULL),
(45, 'Zelda Breath of the wild', 'N', '4.00', 14, '0.00', 1, 'images/juegos/nsw-zelda-breath-of-the-wild-8248.jpg', NULL, NULL, NULL),
(46, 'The last of us 2', 'N', '5.00', 15, '0.00', 1, 'images/juegos/preventa-the-last-of-us-2-75679.jpg', NULL, NULL, NULL),
(47, 'GTA 5 Premium', 'N', '6.00', 16, '0.00', 1, 'images/juegos/ps4-gta-5-premium-edition-12732.jpg', NULL, NULL, NULL),
(48, 'CyberPunk 2077', 'N', '7.00', 17, '0.00', 1, 'images/juegos/ps4-preventa-cyberpunk-2077-75758.jpg', NULL, NULL, NULL),
(49, 'Fifa Street', 'N', '8.00', 18, '0.00', 1, 'images/juegos/ps3-fifa-street-8326.jpg', NULL, NULL, NULL),
(50, 'GTA V', 'N', '9.00', 19, '0.00', 1, 'images/juegos/ps3-gta-5-8333.jpg', NULL, NULL, NULL),
(51, 'Rayman Origins', 'N', '10.00', 20, '0.00', 1, 'images/juegos/ps3-rayman-origins-8390.jpg', NULL, NULL, NULL),
(52, 'Webcam Logitech C505', 'N', '1.00', 7, '0.00', 3, 'images/accesorios/webcam-logitech-c505-hd-83881.jpg', NULL, NULL, NULL),
(53, 'Webcam Logitech C920s', 'N', '2.00', 8, '0.00', 3, 'images/accesorios/webcam-logitech-c920s-pro-hd-83456.png', NULL, NULL, NULL),
(54, 'Kontrol Freek Apex', 'N', '3.00', 9, '0.00', 3, 'images/accesorios/kontrol-freek-speed-freek-apex-74850.jpg', NULL, NULL, NULL),
(55, 'Kontrol Freek Grips', 'N', '4.00', 10, '0.00', 3, 'images/accesorios/kontrol-freek-grips-for-ps4-74838.jpg', NULL, NULL, NULL),
(56, 'Webcam Coby Dash', 'N', '5.00', 11, '0.00', 3, 'images/accesorios/camara-coby-dash-cam-82130.jpeg', NULL, NULL, NULL),
(57, 'Mortal Kombat 11 Ultimate', 'N', '11.00', 21, '0.00', 1, 'images/juegos/xbox-mortal-kombat-11-ultimate-79094.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `idSubCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ordenLista` int(2) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idSubCategoria`),
  KEY `idCategorias` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCategoria`, `detalle`, `ordenLista`, `idCategoria`) VALUES
(1, 'Ps5', 1, 1),
(2, 'Ps4', 2, 1),
(3, 'Ps3', 3, 1),
(4, 'XboxS', 4, 1),
(5, 'Pc', 5, 1),
(6, 'Switch', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'mkruppa', '12345', 'mkruppa@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidodetalle`
--
ALTER TABLE `pedidodetalle`
  ADD CONSTRAINT `pedidodetalle_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedidos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidodetalle_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProductos`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idSubCategoria`) REFERENCES `subcategoria` (`idSubCategoria`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
