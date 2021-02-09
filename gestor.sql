-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2021 a las 02:19:12
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
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivos`
--

CREATE TABLE `t_archivos` (
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_archivos`
--

INSERT INTO `t_archivos` (`id_archivo`, `id_usuario`, `id_categoria`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(4, 52, 5, 'wallpaperflare.com_wallpaper.jpg', 'jpg', '../../archivos/52/wallpaperflare.com_wallpaper.jpg', '2021-02-06 00:45:36'),
(5, 52, 8, 'evi1.PNG', 'PNG', '../../archivos/52/evi1.PNG', '2021-02-06 00:47:39'),
(7, 52, 5, 'PO PA  - RKT - MAMBO DJ .mp3', 'mp3', '../../archivos/52/PO PA  - RKT - MAMBO DJ .mp3', '2021-02-07 19:38:47'),
(8, 52, 5, 'Por Fase 3, CDMX aplicará Hoy No Circula para todos los autos a partir del 23 de Abril..mp4', 'mp4', '../../archivos/52/Por Fase 3, CDMX aplicará Hoy No Circula para todos los autos a partir del 23 de Abril..mp4', '2021-02-07 19:39:04'),
(9, 52, 5, '515731204.pdf', 'pdf', '../../archivos/52/515731204.pdf', '2021-02-07 19:39:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categorias`
--

CREATE TABLE `t_categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_categorias`
--

INSERT INTO `t_categorias` (`id_categoria`, `id_usuario`, `nombre`, `fechaInsert`) VALUES
(5, 52, 'Películas', '2021-02-03 22:36:17'),
(8, 52, 'Trabajo', '2021-02-04 01:17:33'),
(9, 52, 'Videos', '2021-02-04 11:36:49'),
(10, 53, 'Colección', '2021-02-04 11:38:26'),
(11, 53, 'Laburo', '2021-02-04 11:39:07'),
(12, 52, 'Casa', '2021-02-07 19:48:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `email` varchar(245) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `nombre`, `fechaNacimiento`, `email`, `usuario`, `password`) VALUES
(52, 'Franco', '2000-07-07', 'franco@gmail.com', 'kali', '8cb2237d0679ca88db6464eac60da96345513964'),
(53, 'Franco', '2021-02-03', 'frann@gmail.com', 'Franco', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `fkArchivosCategorias_idx` (`id_categoria`),
  ADD KEY `fkUsuariosArchivos_idx` (`id_usuario`);

--
-- Indices de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fkCategoriaUsuario_idx` (`id_usuario`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categoria`) REFERENCES `t_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD CONSTRAINT `fkCategoriaUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
