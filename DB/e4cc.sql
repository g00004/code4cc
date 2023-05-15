-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-05-2023 a las 21:05:13
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e4cc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_ingresos`
--

CREATE TABLE `log_ingresos` (
  `idlog` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log_ingresos`
--

INSERT INTO `log_ingresos` (`idlog`, `user_id`, `mensaje`, `datetime`) VALUES
(2, 1, 'Inicio Sesion', '2023-05-15 15:14:17'),
(3, 1, 'Cerro Sesion', '2023-05-15 15:14:22'),
(4, 1, 'Inicio Sesion', '2023-05-15 15:21:41'),
(5, 1, 'Cerro Sesion', '2023-05-15 15:30:21'),
(6, 1, 'Inicio Sesion', '2023-05-15 15:30:26'),
(7, 1, 'Cerro Sesion', '2023-05-15 16:09:38'),
(8, 1, 'Inicio Sesion', '2023-05-15 16:09:50'),
(9, 1, 'Cerro Sesion', '2023-05-15 16:59:04'),
(10, 1, 'Inicio Sesion', '2023-05-15 16:59:08'),
(11, 1, 'Cerro Sesion', '2023-05-15 16:59:10'),
(12, 9, 'Inicio Sesion', '2023-05-15 16:59:17'),
(13, 9, 'Cerro Sesion', '2023-05-15 17:01:57'),
(14, 1, 'Inicio Sesion', '2023-05-15 17:02:01'),
(15, 1, 'Cerro Sesion', '2023-05-15 19:04:09'),
(16, 14, 'Inicio Sesion', '2023-05-15 19:04:15'),
(17, 14, 'Cerro Sesion', '2023-05-15 19:04:19'),
(18, 1, 'Inicio Sesion', '2023-05-15 19:04:23'),
(19, 1, 'Cerro Sesion', '2023-05-15 19:05:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pago_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cantidad` text NOT NULL,
  `monto_pagar` decimal(12,2) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`pago_id`, `user_id`, `cantidad`, `monto_pagar`, `fecha`, `comentario`) VALUES
(1, 1, '2', '200.00', '2023-05-15', 'comentairo'),
(2, 14, '20', '5000.00', '2023-05-14', 'este es la caja de comentairos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `password`, `id_rol`, `estado`, `created_at`) VALUES
(1, 'Gerardo', 'Marroquín', 'gerar0704_jack@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Admin', 'Activo', '2023-06-15 22:09:18'),
(14, 'Luna', 'Marroquin', 'luna@hotmail.com', '202cb962ac59075b964b07152d234b70', 'User', 'Activo', '2023-05-15 19:04:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log_ingresos`
--
ALTER TABLE `log_ingresos`
  ADD PRIMARY KEY (`idlog`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pago_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `log_ingresos`
--
ALTER TABLE `log_ingresos`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pago_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
