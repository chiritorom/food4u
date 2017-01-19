-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2017 a las 18:22:08
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ncode_food4u`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `idData` int(11) NOT NULL,
  `idPage` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `data` text,
  `idTemplate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, 4, 1, 'No hay datos', 8),
(10, 9, 1, NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gender`
--

CREATE TABLE `gender` (
  `idGender` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gender`
--

INSERT INTO `gender` (`idGender`, `description`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE `page` (
  `idPage` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `idPageType` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, 'Mis platos', '#', 2, 1, 1),
(9, 'Perfil', 'perfil', 3, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagetype`
--

CREATE TABLE `pagetype` (
  `idPageType` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `plate` (
  `idPlate` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `description` text,
  `date` datetime DEFAULT NULL,
  `state` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plate`
--

INSERT INTO `plate` (`idPlate`, `name`, `price`, `image`, `url`, `description`, `date`, `state`) VALUES
(1, 'Plato 01', '9.00', 'this-week01.jpg', 'plato-01', 'Descipcion del plato', '2016-12-25 03:42:53', 1),
(2, 'Plato 02', '16.00', 'this-week01.jpg', 'plato-02', 'Descripciiooooooon', '2017-01-08 01:30:00', 1),
(4, 'Plato03', '20.00', 'thumb.jpg', NULL, 'asddd', NULL, 0),
(5, 'sdf', '0.00', 'thumb1.jpg', NULL, 'sdf', '2017-01-13 01:22:25', 0),
(6, 'asd', '0.00', 'thumb2.jpg', NULL, 'we', '2017-01-12 19:27:00', 0),
(7, 'asd', '34.00', 'Plato-comida.jpg', NULL, 'asd', '2017-01-12 23:39:21', 0),
(8, 'fsdf', '56.00', 'fondo.jpg', NULL, '34', '2017-01-12 23:39:53', 0),
(9, 'asd', '0.00', 'thumb3.jpg', NULL, '34', '2017-01-12 23:41:14', 0),
(10, 'asd', '34.00', 'thumb4.jpg', NULL, 'asd', '2017-01-12 23:42:30', 0),
(11, 'asd', '45.00', 'thumb5.jpg', NULL, 'asdd', '2017-01-12 23:46:17', 0),
(12, 'hhh', '45.00', 'thumb6.jpg', NULL, 'asdsd', '2017-01-12 23:46:34', 0),
(13, 'Prueba', '45.60', 'thumb7.jpg', NULL, 'asdd', '2017-01-12 23:50:53', 0),
(14, 'Plato034', '45.00', 'Plato-comida5.jpg', NULL, 'deeees', '2017-01-13 14:40:15', 1),
(15, 'Plato55', '45.00', 'Plato-comida4.jpg', NULL, 'Pruebaa23\r\n', '2017-01-13 15:08:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase`
--

CREATE TABLE `purchase` (
  `idPurchase` int(11) NOT NULL,
  `idPlate` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL,
  `idUserClient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `template`
--

CREATE TABLE `template` (
  `idTemplate` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, 'ttl-prgph-img'),
(9, 'perfil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `primaryLastName` varchar(45) DEFAULT NULL,
  `secondLastName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `firstName`, `primaryLastName`, `secondLastName`, `email`) VALUES
(1, 'Carlos Alexander', 'Chirito', 'Romero', 'chiritorom@gmail.com'),
(2, NULL, NULL, NULL, 'chiritorom1@gmail.com'),
(3, NULL, NULL, NULL, 'chiritorom2@gmail.com'),
(4, NULL, NULL, NULL, 'c2@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useradmin`
--

CREATE TABLE `useradmin` (
  `idUserAdmin` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `useradmin`
--

INSERT INTO `useradmin` (`idUserAdmin`, `username`, `password`, `IdUser`) VALUES
(1, 'webmaster', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userclient`
--

CREATE TABLE `userclient` (
  `idUserClient` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idGender` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `physicalActivity` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `userclient`
--

INSERT INTO `userclient` (`idUserClient`, `password`, `idUser`, `idGender`, `birthday`, `mobile`, `weight`, `height`, `age`, `physicalActivity`) VALUES
(1, '123456', 1, 1, '1994-08-07', '941477604', NULL, NULL, 22, NULL),
(2, '123', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`idData`),
  ADD KEY `FK_Data_Page_idx` (`idPage`),
  ADD KEY `FK_Data_Template_idx` (`idTemplate`);

--
-- Indices de la tabla `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`idGender`);

--
-- Indices de la tabla `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`idPage`),
  ADD KEY `FK_Page_PageType_idx` (`idPageType`);

--
-- Indices de la tabla `pagetype`
--
ALTER TABLE `pagetype`
  ADD PRIMARY KEY (`idPageType`);

--
-- Indices de la tabla `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`idPlate`);

--
-- Indices de la tabla `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`idPurchase`),
  ADD KEY `FK_Purchase_Plate_idx` (`idPlate`),
  ADD KEY `FK_Purchase_UserClient_idx` (`idUserClient`);

--
-- Indices de la tabla `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`idTemplate`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`idUserAdmin`),
  ADD KEY `FK_UserAdmin_User_idx` (`IdUser`);

--
-- Indices de la tabla `userclient`
--
ALTER TABLE `userclient`
  ADD PRIMARY KEY (`idUserClient`),
  ADD KEY `FK_UserClient_User_idx` (`idUser`),
  ADD KEY `FK_UserClient_Gender_idx` (`idGender`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `idData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `gender`
--
ALTER TABLE `gender`
  MODIFY `idGender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `page`
--
ALTER TABLE `page`
  MODIFY `idPage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pagetype`
--
ALTER TABLE `pagetype`
  MODIFY `idPageType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `plate`
--
ALTER TABLE `plate`
  MODIFY `idPlate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `template`
--
ALTER TABLE `template`
  MODIFY `idTemplate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `idUserAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `userclient`
--
ALTER TABLE `userclient`
  MODIFY `idUserClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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

--
-- Filtros para la tabla `userclient`
--
ALTER TABLE `userclient`
  ADD CONSTRAINT `FK_UserClient_Gender` FOREIGN KEY (`idGender`) REFERENCES `gender` (`idGender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_UserClient_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
