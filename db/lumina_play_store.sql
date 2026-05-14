-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2026 a las 13:50:44
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lumina_play_store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'RPG'),
(2, 'Fantasía'),
(3, 'Acción'),
(4, 'Ciencia Ficción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `tipo` enum('Libro','Videojuego') NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio_puntos` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `tipo`, `descripcion`, `precio_puntos`, `stock`, `imagen`, `id_categoria`) VALUES
(1, 'The Witcher 3: Wild Hunt', 'Videojuego', 'Juego de rol de mundo abierto con Geralt de Rivia.', 2500, 10, NULL, 1),
(2, 'El Nombre del Viento', 'Libro', 'Novela de fantasía épica escrita por Patrick Rothfuss.', 1200, 5, NULL, 2),
(3, 'Cyberpunk 2077', 'Videojuego', 'Aventura de acción y rol en Night City.', 3000, 8, NULL, 4),
(4, 'Dune', 'Libro', 'Clásico de la ciencia ficción de Frank Herbert.', 1500, 12, NULL, 4),
(5, 'Red Dead Redemption 2', 'Videojuego', '-', 1500, 28, 'rdr.jpg', 1),
(6, 'Uncharted 4', 'Videojuego', '-', 3000, 40, 'uncharted.jpg', 1),
(7, 'The Last of Us', 'Videojuego', '-', 3000, 22, 'tlou.jpg', 1),
(8, 'The Last of Us 2', 'Videojuego', '-', 3000, 34, 'tlou.jpg', 1),
(9, 'Call of Duty Black Ops 3', 'Videojuego', '-', 3000, 50, 'uncharted.jpg', 1),
(10, 'Rainbow Six Siege', 'Videojuego', '-', 3000, 42, 'uncharted.jpg', 1),
(11, 'Stardew Valley', 'Videojuego', '-', 3000, 46, 'uncharted.jpg', 1),
(12, 'Harry Potter y la piedra filosofal', 'Libro', '-', 3000, 47, 'uncharted.jpg', 2),
(13, 'Proyecto Hail Mary', 'Libro', '-', 3000, 49, 'uncharted.jpg', 2),
(14, 'Monster', 'Libro', '-', 3000, 32, 'uncharted.jpg', 2),
(15, 'Mortadelo y Filemon', 'Libro', '-', 3000, 12, 'uncharted.jpg', 2),
(16, 'One piece', 'Libro', '-', 3000, 67, 'uncharted.jpg', 2),
(17, 'Jeronimo Stilton', 'Libro', '-', 3000, 87, 'uncharted.jpg', 2),
(18, 'Izaroko altxorra', 'Libro', '-', 3000, 43, 'uncharted.jpg', 2),
(19, 'El señor de los anillos', 'Libro', '-', 3000, 23, 'uncharted.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp(),
  `puntos_gastados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo_puntos` int(11) DEFAULT 0,
  `rol` enum('admin','usuario') DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `saldo_puntos`, `rol`, `fecha_registro`) VALUES
(1, 'Lumina Admin', 'admin@luminaplay.com', '123456', 99999, 'admin', '2026-04-21 16:20:34'),
(2, 'Carlos Gamer', 'carlos@email.com', '123456', 5000, 'usuario', '2026-04-21 16:20:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
