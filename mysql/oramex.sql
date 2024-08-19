-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-08-2024 a las 15:46:53
-- Versión del servidor: 5.7.44-log-cll-lve
-- Versión de PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `avellan3_oramex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `fecha_evento` datetime DEFAULT NULL,
  `cupos_totales` int(11) DEFAULT '0',
  `cupos_disponibles` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `latitud` decimal(9,6) NOT NULL,
  `longitud` decimal(9,6) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `nombre_ubicacion` varchar(255) DEFAULT NULL,
  `horario` varchar(255) DEFAULT NULL,
  `imagen_agenda_url` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descripcion`, `imagen_url`, `video_url`, `fecha_evento`, `cupos_totales`, `cupos_disponibles`, `status`, `latitud`, `longitud`, `telefono`, `correo`, `nombre_ubicacion`, `horario`, `imagen_agenda_url`) VALUES
(1, 'LAOUC Community Tour 2024', 'el mejor evento del 2024', '447957884_978588997606883_3843027677723416457_n.png', 'https://youtu.be/c29j5UJ9Xvc', '2024-08-02 08:00:00', 100, 0, 0, 0.000000, 0.000000, '52', 'contacto@oramex.mx', 'Auditorio Sotero Prieto Anexo de la Facultad de IngenierÃ­a UNAM, CDMX', '', 'AGENDA ORAMEX_AGENDA (1).png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_speakers`
--

CREATE TABLE `eventos_speakers` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `speaker_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos_speakers`
--

INSERT INTO `eventos_speakers` (`id`, `evento_id`, `speaker_id`) VALUES
(1, NULL, NULL),
(2, 1, 1),
(3, NULL, NULL),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `contrasena`) VALUES
(1, 'Admin', 'admin123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `speakers`
--

CREATE TABLE `speakers` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `bio` text,
  `foto_url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `speakers`
--

INSERT INTO `speakers` (`id`, `nombre`, `bio`, `foto_url`, `status`) VALUES
(1, 'Juan Perez', 'experto en ORACLE', '448247891_982227377243045_4008458643193067146_n.jpg', 0),
(2, 'Juan', 'dsjfhsdjfhsjfgshj', '392784715_982272780571838_471280313220624744_n.jpg', 0),
(3, 'Juan', 'dsjfhsdjfhsjfgshj', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_id` (`evento_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos_speakers`
--
ALTER TABLE `eventos_speakers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_id` (`evento_id`),
  ADD KEY `speaker_id` (`speaker_id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos_speakers`
--
ALTER TABLE `eventos_speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
