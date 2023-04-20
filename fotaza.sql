-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2021 a las 15:12:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fotaza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(8) NOT NULL,
  `publicacionId` int(8) NOT NULL,
  `usuarioId` int(8) NOT NULL,
  `fechaDeCreacion` datetime NOT NULL DEFAULT current_timestamp(),
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes`
--

CREATE TABLE `interes` (
  `id` int(8) NOT NULL,
  `usuarioId` int(8) NOT NULL,
  `categoriaId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `id` int(8) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(8) NOT NULL,
  `usuarioId` int(8) NOT NULL,
  `categoriaId` int(8) NOT NULL,
  `licenciaId` int(8) NOT NULL,
  `fechaDePublicacion` datetime NOT NULL DEFAULT current_timestamp(),
  `titulo` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `formato` varchar(50) NOT NULL,
  `resolucion` varchar(10) NOT NULL,
  `ancho` int(11) NOT NULL,
  `alto` int(11) NOT NULL,
  `etiqueta1` varchar(30) NOT NULL,
  `etiqueta2` varchar(30) NOT NULL,
  `etiqueta3` varchar(30) NOT NULL,
  `estado` bit(1) NOT NULL,
  `publica` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(8) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id` int(8) NOT NULL,
  `usuarioId` int(8) NOT NULL,
  `publicacionId` int(8) NOT NULL,
  `cantidadEstrellas` int(8) NOT NULL,
  `fechaDeValoracion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicacionId` (`publicacionId`,`usuarioId`),
  ADD KEY `usuarioId` (`usuarioId`);

--
-- Indices de la tabla `interes`
--
ALTER TABLE `interes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuarioId`,`categoriaId`),
  ADD KEY `categoriaId` (`categoriaId`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuarioId`,`categoriaId`,`licenciaId`),
  ADD KEY `categoriaId` (`categoriaId`),
  ADD KEY `licenciaId` (`licenciaId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuarioId`,`publicacionId`),
  ADD KEY `publicacionId` (`publicacionId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `interes`
--
ALTER TABLE `interes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`publicacionId`) REFERENCES `publicacion` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `interes`
--
ALTER TABLE `interes`
  ADD CONSTRAINT `interes_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `interes_ibfk_2` FOREIGN KEY (`categoriaId`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `publicacion_ibfk_2` FOREIGN KEY (`categoriaId`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `publicacion_ibfk_3` FOREIGN KEY (`licenciaId`) REFERENCES `licencia` (`id`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`publicacionId`) REFERENCES `publicacion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
