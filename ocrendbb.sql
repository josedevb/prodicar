-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2016 a las 07:17:36
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `imagen` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcate`, `nombre`, `contiene`, `descripcion`, `imagen`) VALUES
(1, 'Napoli', 'Nuestra pizza Napoli contiene: borde de queso, queso fundido, salsa roja y especias.', 'Perfecta para los amantes de la pizza tradicional.', 'views/images/napoli.jpg'),
(2, 'Jamón y queso', 'Nuestra pizza Jamón y Queso contiene: borde de queso, jamón, queso fundido, maíz, y especias.', 'Jamón Importado de la mas alta calidad para el gusto en general.', 'views/images/jamon.jpg'),
(3, '4 estaciones', 'Nuestra pizza 4 Estaciones contiene: aceitunas negras, maiz, queso fundido, champiñones y jamón.', 'Un clima de sabores en tu paladar.', 'views/images/4esta.jpg'),
(4, 'Hawaiana', 'Nuestra pizza Hawaiana contiene: Piña, jamón, queso fundido, y especias.', 'Una combinación tropical de frutas y contornos hechos para ti.', 'views/images/hawaina.jpg'),
(5, 'Vegetariana', 'Nuestra pizza Vegetariana contiene: Tomate, cebolla, aceitunas negras, pepinillos, queso fundido, y especias.', 'Vegetales frescos y 100% limpios para tu degustación.', 'views/images/vegeta.jpg'),
(6, 'Primavera', 'Nuestra pizza Primavera contiene: Tocineta, maiz, queso fundido, y jamón.', 'El mejor tocino importado de la ciudad, liberado de gérmenes', 'views/images/prima.jpg');

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
-- Estructura de tabla para la tabla `costo`
--

CREATE TABLE `costo` (
  `idcosto` bigint(255) UNSIGNED NOT NULL,
  `idingre` int(255) NOT NULL,
  `idcatepizz` int(255) NOT NULL
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
  `iduser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfact` bigint(255) UNSIGNED NOT NULL,
  `iduser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `idtama` bigint(255) UNSIGNED NOT NULL,
  `size` varchar(10) NOT NULL,
  `precio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pizzatam`
--

INSERT INTO `pizzatam` (`idtama`, `size`, `precio`) VALUES
(1, 'Familiar', '5000'),
(2, 'Mediana', '4000'),
(3, 'Pequeña', '3000');

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
-- Indices de la tabla `costo`
--
ALTER TABLE `costo`
  ADD PRIMARY KEY (`idcosto`);

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
  ADD PRIMARY KEY (`idtama`);

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
  MODIFY `idcate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `catepizz`
--
ALTER TABLE `catepizz`
  MODIFY `idcatepizz` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `costo`
--
ALTER TABLE `costo`
  MODIFY `idcosto` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `iddatosp` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfact` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `idingre` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pizzatam`
--
ALTER TABLE `pizzatam`
  MODIFY `idtama` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
