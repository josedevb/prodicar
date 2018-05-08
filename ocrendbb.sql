-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2018 a las 22:30:40
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ocrendbb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcate` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contiene` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idprecio` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcate`, `nombre`, `contiene`, `descripcion`, `imagen`, `idprecio`) VALUES
(1, 'Pulpón', 'deleitate con el mejor corte de res', 'RES - Corte de primera', 'views/images/pulpon.jpg', 1),
(2, 'Pelota', 'Prueba el mejor corte de pelotax', 'RES - Pelota', 'views/images/pelota.jpg', 1),
(3, 'Lomito', 'Prueba el mejor lomito', 'RES - Lomito', 'views/images/lomito.jpg', 7),
(4, 'Lomo de aguja', 'Deleitate con el mejor lomo de aguja', 'RES - Lomo de aguja', 'views/images/lomo_aguja.jpg', 1),
(5, 'Punta trasera', 'Deleitate con el mejor corte de punta traser', 'RES - Corte de primera', 'views/images/punta_trasera.jpg', 1),
(6, 'Balona', 'Corte e segunda balona', 'RES - Balona', 'views/images/balona.jpg', 2),
(7, 'Falda', 'Corte de segunda Res', 'RES - falda', 'views/images/falda.jpg', 2),
(8, 'Pollito de res', 'El mejor pollo de res', 'RES - Corte de res de segunda', 'views/images/pollito_res.jpg', 2),
(9, 'Osobuco', 'El mejor osobuco', 'Corte de tercera', 'views/images/osobuco.jpg', 3),
(10, 'Costilla', 'Corte de tercera costilla', 'RES - Costilla', 'views/images/costilla.jpg', 3),
(11, 'Huesos rojos', 'Lo mejor en huesos rojos', 'RES - Corte de tercera', 'views/images/huesos_rojos.jpg', 3),
(12, 'Rabo de res', 'Lo mejor en rabo de res', 'RES - Corte de tercera', 'views/images/rabo_res.jpg', 3),
(13, 'Costillas de cerdo', 'Lo mejor en costillas de cerdo', 'Cerdo', 'views/images/costilla_cerdo.jpg', 5),
(14, 'Lomo', 'El mejor lomo de cerdo', 'Lomo de cerdo', 'views/images/lomo.jpg', 5),
(15, 'Pernil', 'El mejor pernil de cerdo', 'Pernil de cerdo', 'views/images/pernil.jpg', 5),
(16, 'Chuleta', 'Lo mejor en chuleta de cerdo', 'Corte de cerdo - Chuleta', 'views/images/chuletas.jpg', 5),
(17, 'Pollo entero', 'El mejor pollo entero', 'Pollo entero', 'views/images/pollo_entero.jpg', 4),
(18, 'Muslos', 'EL mejor muslo de pollo', 'Pollo - Muslo', 'views/images/muslos.jpg', 4),
(19, 'Pechugas', 'Las mejores pechugas', 'Pechugas - Pollo', 'views/images/pechugas.jpg', 4),
(20, 'Alitas', 'Lo mejor en alitas de pollo', 'Pollo - Alitas', 'views/images/alitas.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catepizz`
--

CREATE TABLE `catepizz` (
  `idcatepizz` bigint(255) UNSIGNED NOT NULL,
  `idcate` int(255) NOT NULL,
  `idtama` int(255) NOT NULL,
  `idfact` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `iddatosp` bigint(255) UNSIGNED NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `informacion` varchar(180) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `iduser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`iddatosp`, `nombre`, `apellido`, `direccion`, `numero`, `informacion`, `razon_social`, `iduser`) VALUES
(1, 'Jose', 'Barrios', 'Haticos por arriba sector el potente', '04266419051', 'Administrador de Gustock', 'Gustock', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfact` bigint(255) UNSIGNED NOT NULL,
  `idcate` int(50) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `iduser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfact`, `idcate`, `referencia`, `cantidad`, `fecha`, `hora`, `iduser`) VALUES
(1, 4, 'ref11', 1, '18-05-07', '04:14:20', 1),
(2, 2, 'fe', 1, '18-05-07', '04:21:48', 1),
(3, 2, 'fe', 1, '18-05-07', '04:21:48', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `idingre` bigint(255) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `costo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`idingre`, `nombre`, `costo`) VALUES
(1, 'Queso', 200),
(2, 'Jamón', 300),
(3, 'Tocineta', 400),
(4, 'Maíz', 500),
(5, 'Anchoas', 600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzatam`
--

CREATE TABLE `pizzatam` (
  `idpizzatam` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `idprecio` int(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `corte` varchar(50) NOT NULL,
  `precio` int(50) NOT NULL,
  `disponible` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`idprecio`, `tipo`, `corte`, `precio`, `disponible`) VALUES
(1, 'Res', 'Corte de primera', 650000, 1),
(2, 'Res', 'Corte de segunda', 600000, 1),
(3, 'Res', 'Corte de tercera', 550000, 1),
(4, 'Pollo', 'Unico', 500000, 0),
(5, 'Cerdo', 'Unico', 400000, 1),
(6, 'Res', 'Lomito', 700000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `iduser` int(255) NOT NULL,
  `user` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `permisos` int(1) NOT NULL DEFAULT '0',
  `activo` int(1) NOT NULL DEFAULT '0',
  `keyreg` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keypass` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `new_pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ultima_conexion` int(32) NOT NULL DEFAULT '0',
  `no_leidos` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `user`, `pass`, `email`, `permisos`, `activo`, `keyreg`, `keypass`, `new_pass`, `ultima_conexion`, `no_leidos`) VALUES
(1, 'jozekcore', '09e1d9410d7b09074aa53e1b49841181', 'josedbarrios7@gmail.com', 0, 1, '9831b4e9020c4ff4955fa84a0b6d6472', '', '', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcate`);

--
-- Indices de la tabla `catepizz`
--
ALTER TABLE `catepizz`
  ADD PRIMARY KEY (`idcatepizz`);

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`iddatosp`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfact`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`idingre`);

--
-- Indices de la tabla `pizzatam`
--
ALTER TABLE `pizzatam`
  ADD PRIMARY KEY (`idpizzatam`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`idprecio`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `catepizz`
--
ALTER TABLE `catepizz`
  MODIFY `idcatepizz` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `iddatosp` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfact` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `idingre` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pizzatam`
--
ALTER TABLE `pizzatam`
  MODIFY `idpizzatam` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `idprecio` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
