-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 10:53:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zafiro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos`
--

CREATE TABLE `apartamentos` (
  `id_apartamento` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `bloque` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `apartamentos`
--

INSERT INTO `apartamentos` (`id_apartamento`, `numero`, `bloque`, `piso`, `id_usuario`) VALUES
(2, '2', 3, 4, 0),
(3, '15', 11, 10, 1),
(5, '26', 2, 5, 2),
(6, '101', 2, 3, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE `deudas` (
  `id_deudas` int(11) NOT NULL,
  `valor_deuda` float NOT NULL,
  `fecha` date NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deudas`
--

INSERT INTO `deudas` (`id_deudas`, `valor_deuda`, `fecha`, `id_usuarios`) VALUES
(1, 300, '2023-10-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pagos` int(11) NOT NULL,
  `valor_pagado` float NOT NULL,
  `fecha` date NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pagos`, `valor_pagado`, `fecha`, `id_usuarios`) VALUES
(1, 300, '2023-11-19', 1),
(3, 500, '2023-11-20', 2),
(4, 50000, '2023-10-29', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_deuda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `id_deuda`) VALUES
(1, 'Juan Camilo Sanchez', 0),
(2, 'Cindy Pamela Moreno', 0),
(4, 'Carlos Cordoba', 0),
(5, 'Camila Zuñiga Correa', 0),
(6, 'Samuel Dorado', 0),
(8, 'Richad schukerbergg', 0),
(9, 'luffy D', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD PRIMARY KEY (`id_apartamento`);

--
-- Indices de la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD PRIMARY KEY (`id_deudas`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pagos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apartamentos`
--
ALTER TABLE `apartamentos`
  MODIFY `id_apartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `deudas`
--
ALTER TABLE `deudas`
  MODIFY `id_deudas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
