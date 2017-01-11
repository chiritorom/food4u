
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-01-2017 a las 15:02:33
-- Versión del servidor: 10.0.28-MariaDB-wsrep
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u660241010_f4u`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `idData` int(11) NOT NULL AUTO_INCREMENT,
  `idPage` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `data` text,
  `idTemplate` int(11) DEFAULT NULL,
  PRIMARY KEY (`idData`),
  KEY `FK_Data_Page_idx` (`idPage`),
  KEY `FK_Data_Template_idx` (`idTemplate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`idData`, `idPage`, `position`, `data`, `idTemplate`) VALUES
(1, 1, 1, 'banner01.jpg|banner-video.mp4|COMER RICO Y SALUDABLE NUNCA FUE TAN FÁCIL|No cocines, no limpies, disfruta tu vida!| Nuestros chefs y nutricionistas esperan tus órdenes.|Ver platos|#', 1),
(2, 1, 2, 'Nuestros nutricionistas a tu disposición|Podrás armar tu plan nutricional de acuerdo a tus objetivos y contarás con asesoría permanente.|Nuestros chefs cocinan para ti|Nuestros chefs cocinan cada día tus platos usando ingredientes frescos y de temporada.|Una entrega diaria|Haz tu pedido hasta 48 horas antes del día en que deseees recibirlo.|Nuevos platos cada semana|Te ofrecemos nuevas propuestas cada semana. Tú eliges!', 2),
(3, 1, 3, 'Esta semana', 3),
(4, 1, 4, 'Platos de la estación|Come rico y saludable.|Ver platos|#|FIT|Tu informe nutricional gratis y asesoría permanente para el logro de tus objetivos.|Ver más|#', 4),
(5, 1, 5, 'No hay datos', 5),
(6, 2, 1, 'No hay datos', 6),
(8, 3, 1, 'No hay datos', 7),
(9, 4, 1, 'No hay datos', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `idPage` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `idPageType` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  PRIMARY KEY (`idPage`),
  KEY `FK_Page_PageType_idx` (`idPageType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`idPage`, `name`, `url`, `position`, `idPageType`, `state`) VALUES
(1, 'Inicio', 'inicio', 1, 2, 0),
(2, 'Nuestros platos', 'nuestros-platos', 2, 2, 1),
(3, 'Cómo funciona', 'como-funciona', 3, 2, 1),
(4, 'Nosotros', 'nosotros', 4, 2, 1),
(5, 'Blog', 'blog', 5, 2, 1),
(6, 'Contacto', 'contacto', 6, 2, 1),
(7, 'Inicia sesión', '#', 1, 1, 1),
(8, 'Mis platos', '#', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagetype`
--

CREATE TABLE IF NOT EXISTS `pagetype` (
  `idPageType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPageType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pagetype`
--

INSERT INTO `pagetype` (`idPageType`, `type`) VALUES
(1, 'Menu'),
(2, 'Submenu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plate`
--

CREATE TABLE IF NOT EXISTS `plate` (
  `idPlate` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `description` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idPlate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `plate`
--

INSERT INTO `plate` (`idPlate`, `name`, `price`, `image`, `url`, `description`, `date`) VALUES
(1, 'Plato 01', '9.00', 'this-week01.jpg', 'plato-01', 'Descipcion del plato', '2016-12-25 03:42:53'),
(2, 'Plato 02', '16.00', 'this-week01.jpg', 'plato-02', 'Descripciiooooooon', '2017-01-08 01:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `idPurchase` int(11) NOT NULL,
  `idUserClient` int(11) DEFAULT NULL,
  `idPlate` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`idPurchase`),
  KEY `FK_Purchase_UserClient_idx` (`idUserClient`),
  KEY `FK_Purchase_Plate_idx` (`idPlate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `idTemplate` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTemplate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `template`
--

INSERT INTO `template` (`idTemplate`, `name`) VALUES
(1, 'vdo-ttl-sttl-btn1'),
(2, 'icn-ttl-prgph1'),
(3, 'sld-this-week'),
(4, 'ttl-prgph-btn1'),
(5, 'blg-img-ttl-prgph'),
(6, 'img-btn-ttl-prgph'),
(7, 'icn-ttl-prgph-img'),
(8, 'ttl-prgph-img');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `firstName`, `LastName`, `email`) VALUES
(1, 'Carlos Alexander', 'Chirito Rmero', 'chiritorom@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useradmin`
--

CREATE TABLE IF NOT EXISTS `useradmin` (
  `idUserAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUserAdmin`),
  KEY `FK_UserAdmin_User_idx` (`IdUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `useradmin`
--

INSERT INTO `useradmin` (`idUserAdmin`, `username`, `password`, `IdUser`) VALUES
(1, 'webmaster', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userclient`
--

CREATE TABLE IF NOT EXISTS `userclient` (
  `idUserClient` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUserClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `FK_Data_Page` FOREIGN KEY (`idPage`) REFERENCES `page` (`idPage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Data_Template` FOREIGN KEY (`idTemplate`) REFERENCES `template` (`idTemplate`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `FK_Page_PageType` FOREIGN KEY (`idPageType`) REFERENCES `pagetype` (`idPageType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `FK_Purchase_Plate` FOREIGN KEY (`idPlate`) REFERENCES `plate` (`idPlate`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Purchase_UserClient` FOREIGN KEY (`idUserClient`) REFERENCES `userclient` (`idUserClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `useradmin`
--
ALTER TABLE `useradmin`
  ADD CONSTRAINT `FK_UserAdmin_User` FOREIGN KEY (`IdUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
