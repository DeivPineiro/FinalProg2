-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 02:34:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fendardo_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `m_Mastil` enum('Maple','Rosewood') NOT NULL,
  `m_Cuerpos` enum('Maple','Rosewood') NOT NULL,
  `n_Clavijas` int(10) UNSIGNED NOT NULL,
  `n_Trastes` int(10) UNSIGNED NOT NULL,
  `t_Mastil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `m_Mastil`, `m_Cuerpos`, `n_Clavijas`, `n_Trastes`, `t_Mastil`) VALUES
(2, 'Rosewood', 'Maple', 4, 20, 'c-shaped'),
(3, 'Maple', 'Maple', 4, 20, 'c-shaped'),
(4, 'Rosewood', 'Maple', 5, 20, 'C'),
(6, 'Maple', 'Maple', 4, 20, 'C'),
(11, 'Maple', 'Maple', 5, 20, 'C'),
(16, 'Rosewood', 'Maple', 4, 20, 'C'),
(17, 'Maple', 'Maple', 4, 20, 'C'),
(18, 'Maple', 'Maple', 6, 22, 'C'),
(19, 'Rosewood', 'Maple', 6, 22, 'C'),
(20, 'Rosewood', 'Maple', 6, 22, 'D'),
(21, 'Rosewood', 'Maple', 6, 22, 'C'),
(22, 'Rosewood', 'Maple', 6, 22, 'D Modern'),
(23, 'Rosewood', 'Maple', 6, 22, 'C Modern'),
(24, 'Rosewood', 'Maple', 6, 22, 'C Modern'),
(25, 'Maple', 'Maple', 6, 22, 'C Modern');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas_x_pastillas`
--

CREATE TABLE `caracteristicas_x_pastillas` (
  `id` int(11) NOT NULL,
  `id_caracteristicas` int(11) UNSIGNED NOT NULL,
  `id_pastillas` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristicas_x_pastillas`
--

INSERT INTO `caracteristicas_x_pastillas` (`id`, `id_caracteristicas`, `id_pastillas`) VALUES
(4, 2, 8),
(6, 4, 8),
(7, 4, 16),
(8, 3, 8),
(9, 3, 16),
(14, 11, 10),
(18, 18, 2),
(21, 19, 20),
(23, 20, 5),
(28, 22, 23),
(29, 23, 1),
(30, 23, 14),
(31, 23, 24),
(32, 24, 1),
(33, 24, 14),
(34, 24, 15),
(35, 25, 1),
(36, 25, 14),
(37, 25, 24),
(39, 2, 16),
(44, 6, 9),
(45, 6, 17),
(49, 16, 10),
(50, 16, 17),
(51, 17, 11),
(53, 18, 20),
(54, 19, 2),
(56, 20, 6),
(58, 21, 4),
(59, 21, 21),
(60, 22, 3),
(61, 22, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `importe` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `fecha`, `importe`) VALUES
(21, 9, '2023-08-09', 2500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id` int(11) UNSIGNED NOT NULL,
  `marca` varchar(256) NOT NULL,
  `nombre` enum('Guitarra','Bajo','Bateria') NOT NULL,
  `modelo` varchar(256) NOT NULL,
  `serie` varchar(256) NOT NULL,
  `id_caracteristica` int(10) UNSIGNED NOT NULL,
  `color` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `precio` float(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id`, `marca`, `nombre`, `modelo`, `serie`, `id_caracteristica`, `color`, `img`, `precio`) VALUES
(33, 'Fender', 'Bajo', 'JazzBass', 'AMERICAN PROFESSIONAL II JAZZ BASS® FRETLESS', 2, 'Sunburst', 'jazzBass_Sunburst.jpg', 2800.00),
(34, 'Fender', 'Bajo', 'JazzBass', 'AMERICAN PROFESSIONAL II JAZZ BASS V', 4, 'Olympic White', 'jazzBass_White.jpg', 2750.00),
(35, 'Fender', 'Bajo', 'JazzBass', 'AMERICAN PROFESSIONAL II JAZZ BASS', 3, 'Mystic Surf Green', 'jazzBass_Mystic_Surf_Green.jpg', 2650.00),
(36, 'Fender', 'Bajo', 'JazzBass', 'AMERICAN ULTRA JAZZ BASS', 6, 'Texas tea', 'jazzBass_Texas_Tea.jpg', 2650.00),
(37, 'Fender', 'Bajo', 'PrecisionBass', 'AMERICAN ULTRA PRECISION BASS', 16, 'Mocha Burst', 'precision_Mocha_Burst.jpg', 2550.00),
(38, 'Fender', 'Bajo', 'PrecisionBass', 'AMERICAN PROFESSIONAL II PRECISION BASS V', 11, 'Drak Night', 'precision_Dark_Night.jpg', 2500.00),
(39, 'Fender', 'Bajo', 'PrecisionBass', 'AMERICAN PERFORMER PRECISION BASS', 16, 'Sunburt', 'precision_Color_Sunburst.jpg', 2450.00),
(40, 'Fender', 'Bajo', 'PrecisionBass', 'VINTERA \'50S PRECISION BASS', 17, 'Sea foam green', 'precision_Sea.jpg', 2750.00),
(41, 'Fender', 'Guitarra', 'Telecaster', 'AMERICAN VINTAGE II 1975 DELUXE', 18, 'Black', 'tele_Black.jpg', 2650.00),
(42, 'Fender', 'Guitarra', 'Telecaster', 'American Profesional II Deluxe', 19, 'Sunburst', 'tele_SunBurst.jpg', 2500.00),
(43, 'Fender', 'Guitarra', 'Telecaster', 'American Ultra', 20, 'White', 'tele_White.jpg', 2800.00),
(44, 'Fender', 'Guitarra', 'Telecaster', 'Gold Foil', 21, 'White Blonde', 'tele_WBlonde.jpg', 2450.00),
(45, 'Fender', 'Guitarra', 'Stratocaster', 'American Ultra Stratocaster', 22, 'Ultraburst', 'strat_Ultraburst.jpg', 2300.00),
(46, 'Fender', 'Guitarra', 'Stratocaster', 'Limited Edition Player Stratocaster', 23, 'Red', 'strat_Player.jpg', 2550.00),
(47, 'Fender', 'Guitarra', 'Stratocaster', 'Player Plus Stratocaster', 24, 'Belair Blue', 'strat_PlayerPlus.jpg', 2500.00),
(48, 'Fender', 'Guitarra', 'Stratocaster', 'Player Plus Stratocaster Fire', 25, 'Belair Red', 'strat_PlayerPlusFire.jpg', 2500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos_x_compras`
--

CREATE TABLE `instrumentos_x_compras` (
  `id` int(11) UNSIGNED NOT NULL,
  `compra_id` int(11) UNSIGNED NOT NULL,
  `instrumento_id` int(11) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instrumentos_x_compras`
--

INSERT INTO `instrumentos_x_compras` (`id`, `compra_id`, `instrumento_id`, `cantidad`) VALUES
(28, 21, 42, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pastillas`
--

CREATE TABLE `pastillas` (
  `id_Pastilla` int(10) UNSIGNED NOT NULL,
  `marca` varchar(256) NOT NULL,
  `modelo` varchar(256) NOT NULL,
  `color` varchar(256) NOT NULL,
  `posicion` enum('mastil','central','puente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pastillas`
--

INSERT INTO `pastillas` (`id_Pastilla`, `marca`, `modelo`, `color`, `posicion`) VALUES
(1, 'Fender', 'Strat simple coil', 'White', 'mastil'),
(2, 'Fender', 'Humbuker', 'Inox', 'mastil'),
(3, 'Fender', 'Strat simple coil', 'vintage', 'mastil'),
(4, 'Fender', 'Mini gold foil mini', 'Gold', 'mastil'),
(5, 'Fender', 'tele Simple coil', 'Black', 'puente'),
(6, 'Fender', 'Tele inox simple coil', 'Inox', 'mastil'),
(7, 'Fender', 'Humbuker inox', 'inox', 'central'),
(8, 'Fender', 'V-MOD II single-coil JazzBass', 'Black', 'mastil'),
(9, 'Fender', 'Vintage single-coil de noiselees', 'Black', 'mastil'),
(10, 'Fender', 'PBass ', 'Black', 'mastil'),
(11, 'Fender', '50 PBass', 'Black', 'central'),
(14, 'Fender', 'Strat simple coil', 'White', 'central'),
(15, 'Fender', 'Humbuker', 'Inox', 'puente'),
(16, 'Fender', 'V-MOD II single-coil JazzBass', 'Black', 'puente'),
(17, 'Fender', 'Vintage single-coil de noiselees', 'Black', 'puente'),
(18, 'Fender', '50 PBass', 'Black', 'mastil'),
(19, 'Fender', 'PBass ', 'Black', 'central'),
(20, 'Fender', 'Humbuker', 'Inox', 'puente'),
(21, 'Fender', 'Mini gold foil mini', 'Gold', 'puente'),
(22, 'Fender', 'Strat simple coil', 'vintage', 'central'),
(23, 'Fender', 'Strat simple coil', 'vintage', 'puente'),
(24, 'Fender', 'Strat simple coil', 'White', 'puente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `rol` enum('usuario','superAdmin','admin','edit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `password`, `email`, `rol`) VALUES
(1, 'David Piñeiro', '$2y$10$9beB7VNoRYzOgwOoI8lJMe.RSWuhhwkpDNDoRI/OJv.nYWrRhQTfi', 'david.pineiro@davinci.edi.ar', 'superAdmin'),
(2, 'Jorge Perez', '$2y$10$X/Ym1KxL9hC6Br8EEXl3seHYMaxkhrmEkfbJvWvPsYvtJn9wR94pG', 'jorge.perez@davinci.edu.ar', 'admin'),
(3, 'Usuario', '$2y$10$9beB7VNoRYzOgwOoI8lJMe.RSWuhhwkpDNDoRI/OJv.nYWrRhQTfi', 'Usuario@yahoo.com.ar', 'usuario'),
(4, 'Editor', '$2y$10$9beB7VNoRYzOgwOoI8lJMe.RSWuhhwkpDNDoRI/OJv.nYWrRhQTfi', 'Usuario@yahoo.com.ar', 'edit');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caracteristicas_x_pastillas`
--
ALTER TABLE `caracteristicas_x_pastillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caracteristicas` (`id_caracteristicas`),
  ADD KEY `id_pastillas` (`id_pastillas`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_user` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caracteristica` (`id_caracteristica`);

--
-- Indices de la tabla `instrumentos_x_compras`
--
ALTER TABLE `instrumentos_x_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`,`instrumento_id`),
  ADD KEY `instrumento_id` (`instrumento_id`);

--
-- Indices de la tabla `pastillas`
--
ALTER TABLE `pastillas`
  ADD PRIMARY KEY (`id_Pastilla`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `caracteristicas_x_pastillas`
--
ALTER TABLE `caracteristicas_x_pastillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `instrumentos_x_compras`
--
ALTER TABLE `instrumentos_x_compras`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `pastillas`
--
ALTER TABLE `pastillas`
  MODIFY `id_Pastilla` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristicas_x_pastillas`
--
ALTER TABLE `caracteristicas_x_pastillas`
  ADD CONSTRAINT `caracteristicas_x_pastillas_ibfk_1` FOREIGN KEY (`id_pastillas`) REFERENCES `pastillas` (`id_Pastilla`) ON UPDATE CASCADE,
  ADD CONSTRAINT `caracteristicas_x_pastillas_ibfk_2` FOREIGN KEY (`id_caracteristicas`) REFERENCES `caracteristicas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD CONSTRAINT `instrumentos_ibfk_1` FOREIGN KEY (`id_caracteristica`) REFERENCES `caracteristicas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `instrumentos_x_compras`
--
ALTER TABLE `instrumentos_x_compras`
  ADD CONSTRAINT `instrumentos_x_compras_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `instrumentos_x_compras_ibfk_2` FOREIGN KEY (`instrumento_id`) REFERENCES `instrumentos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
