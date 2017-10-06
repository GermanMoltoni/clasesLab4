-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2017 a las 02:20:26
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moltonipplab42017`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `sabor` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pathFoto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pizza`
--

INSERT INTO `pizza` (`id`, `sabor`, `tipo`, `cantidad`, `pathFoto`) VALUES
(1, 'Con Tomate', 'Molde', 3, 'pizza1.jpg'),
(2, 'Con Huevo Frito', 'Piedra', 4, 'pizza2.jpg'),
(5, 'Con Jamon', '33', 0, 'pizza3.jpg'),
(6, 'Con Jamon', '2', 0, 'pizza3.jpg'),
(9, 'Palmitos', '22', 0, 'pizza4.jpg'),
(10, 'Con Jamon', 'Piedra', 232, 'pizza3.jpg'),
(11, 'Palmitos', 'Piedra', 22, 'pizza4.jpg'),
(12, 'Palmitos', 'Piedra', 0, 'pizza4.jpg'),
(13, 'perro', 'Molde', 22, 'pizza4.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
