-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-10-2017 a las 05:22:05
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `PPLab4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `habilitado` int(11) NOT NULL,
  `pathFoto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`id`, `nombre`, `mail`, `sexo`, `password`, `habilitado`, `pathFoto`) VALUES
(1, 'Steve Jobs', 'stevejobs@apple', 'M', '4297f44b13955235245b2497399d7a', 1, 'stevejobs@apple.jpg'),
(2, 'Tom Cruise', 'tomcruise@tom', 'M', '4297f44b13955235245b2497399d7a', 1, 'tomcruise@tom.jpg'),
(3, 'Julia Roberts', 'juliaroberts@julia', 'F', '4297f44b13955235245b2497399d7a', 1, 'juliaroberts@julia.jpg'),
(4, 'Freddy Mercury', 'freddie@queen', 'M', '4297f44b13955235245b2497399d7a', 1, 'freddie@queen.jpg'),
(5, 'Defecto', 'defecto@ejemplo', 'M', '4297f44b13955235245b2497399d7a', 1, 'defecto@ejemplo.png'),
(6, 'Tina Turner', 'tina@turner', 'F', '4297f44b13955235245b2497399d7a', 1, 'tina@turner.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Persona`
--
ALTER TABLE `Persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
