-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2021 a las 02:19:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appagro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carId` int(50) NOT NULL,
  `usuId` int(50) NOT NULL,
  `proId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carId`, `usuId`, `proId`) VALUES
(3, 7, 11),
(4, 7, 5),
(6, 5, 6),
(8, 8, 6),
(9, 8, 6),
(12, 5, 8),
(13, 5, 8),
(14, 5, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `eveId` int(11) NOT NULL,
  `eveNombre` varchar(20) NOT NULL,
  `eveUbicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`eveId`, `eveNombre`, `eveUbicacion`) VALUES
(2, 'feria la sierra', 'aqui cerca'),
(3, 'feria la sierra', 'aqui cerca'),
(4, 'feria la sierra', 'aqui cerca'),
(5, 'feria la sierra', 'aqui cerca'),
(6, 'feria la sierra', 'aqui cerca'),
(7, 'feria la sierra', 'aqui cerca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inversionista`
--

CREATE TABLE `inversionista` (
  `invId` int(11) NOT NULL,
  `invNombre` varchar(50) NOT NULL,
  `invImagen` longblob DEFAULT NULL,
  `invDescripcion` varchar(200) DEFAULT NULL,
  `invTelefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inversionista`
--

INSERT INTO `inversionista` (`invId`, `invNombre`, `invImagen`, `invDescripcion`, `invTelefono`) VALUES
(4, 'inverson edynson', NULL, NULL, NULL),
(5, 'inversor yeison', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `ofeId` int(50) NOT NULL,
  `ofeNombre` varchar(20) NOT NULL,
  `ofeImagen` longblob DEFAULT NULL,
  `ofeCantidad` int(50) NOT NULL,
  `ofeDescuento` int(20) NOT NULL,
  `ofePrecio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`ofeId`, `ofeNombre`, `ofeImagen`, `ofeCantidad`, `ofeDescuento`, `ofePrecio`) VALUES
(1, 'oferta modificada', NULL, 4356, 106, 10),
(2, 'oferta 1', NULL, 10, 10, 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE `organizacion` (
  `orgId` int(11) NOT NULL,
  `orgNombre` varchar(50) NOT NULL,
  `orgImagen` longblob DEFAULT NULL,
  `orgUbicacion` varchar(50) NOT NULL,
  `orgTelefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`orgId`, `orgNombre`, `orgImagen`, `orgUbicacion`, `orgTelefono`) VALUES
(1, 'oragnizaicon modificado', NULL, 'descripcionanado', '00000000'),
(5, 'organizacion 1', NULL, 'descripcionanado', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `proId` int(50) NOT NULL,
  `proNombre` varchar(50) NOT NULL,
  `proCantidad` int(50) NOT NULL,
  `proPrecio` int(50) NOT NULL,
  `proImagen` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`proId`, `proNombre`, `proCantidad`, `proPrecio`, `proImagen`) VALUES
(2, 'esteban', 234, 1000, NULL),
(3, 'esteban', 234, 1000, NULL),
(5, 'coco', 456, 3456, NULL),
(6, 'lenteja', 3, 3000, NULL),
(8, 'esteban', 234, 1000, NULL),
(9, 'esteban', 234, 1000, NULL),
(10, 'esteban', 234, 1000, NULL),
(11, 'esteban', 234, 1000, NULL),
(12, 'interfaz', 10000, 10000, 0x70657266696c2e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuId` int(20) NOT NULL,
  `usuNombre` varchar(50) NOT NULL,
  `usuUsername` varchar(50) NOT NULL,
  `usuRole` varchar(50) NOT NULL,
  `usuPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuId`, `usuNombre`, `usuUsername`, `usuRole`, `usuPassword`) VALUES
(1, 'administrador', 'admin', 'admin', ''),
(5, 'miguel', 'migelillo', 'no_admin', 'miguel'),
(7, 'esteban', 'loco', 'no_admin', 'esteban'),
(8, 'esteban', 'loc', 'no_admin', 'esteban');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carId`),
  ADD KEY `usuId` (`usuId`),
  ADD KEY `proId` (`proId`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`eveId`);

--
-- Indices de la tabla `inversionista`
--
ALTER TABLE `inversionista`
  ADD PRIMARY KEY (`invId`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`ofeId`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`orgId`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`proId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuId`),
  ADD UNIQUE KEY `usuUsername` (`usuUsername`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `eveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `inversionista`
--
ALTER TABLE `inversionista`
  MODIFY `invId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `ofeId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `orgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `proId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuId`) REFERENCES `usuario` (`usuId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`proId`) REFERENCES `producto` (`proId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
