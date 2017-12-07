-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2017 a las 16:15:07
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `navicu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE IF NOT EXISTS `establecimiento` (
  `id_h` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_h` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_h` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_i` date NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_h`),
  KEY `id_u` (`id_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`id_h`, `nombre_h`, `ubicacion`, `tipo_h`, `fecha_i`, `id_u`) VALUES
(1, 'Lancelot', 'Barquisimeto', 'Posadas', '2010-10-12', 3),
(2, 'Lancelot 1', 'Barquisimeto', 'Hoteles', '2010-10-12', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
  `id_hb` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_hb` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tarifa` float NOT NULL,
  `maxp` int(11) NOT NULL,
  `img` text COLLATE utf8_spanish_ci NOT NULL,
  `id_h` int(11) NOT NULL,
  PRIMARY KEY (`id_hb`),
  KEY `id_h` (`id_h`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_hb`, `nombre_hb`, `tarifa`, `maxp`, `img`, `id_h`) VALUES
(24, 'dd12a', 23, 43, 'imgs/hab\\dd12a.jpg', 2),
(25, 'gggd', 50, 2, 'imgs/hab\\gggd.jpg', 2),
(26, 'Casa', 500, 10, 'imgs/hab\\Casa.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_hotelero`
--

CREATE TABLE IF NOT EXISTS `usuario_hotelero` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario_hotelero`
--

INSERT INTO `usuario_hotelero` (`id_u`, `nombre`, `apellido`, `fecha_nac`, `correo`) VALUES
(2, 'Alfonso', 'Suarez', '2017-12-04', 'reree@gmail.com'),
(3, 'RERE', 'tq', '2017-01-12', 'ererere@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `establecimiento_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `usuario_hotelero` (`id_u`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`id_h`) REFERENCES `establecimiento` (`id_h`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
