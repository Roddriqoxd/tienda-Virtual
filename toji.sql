-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 01:39:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `toji`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Tecnologia'),
(6, 'Casa'),
(10, 'Automoviles'),
(16, 'motocicletas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_cliente` int(150) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `producto`, `id_producto`, `estado`, `precio`, `cantidad`, `id_cliente`, `fecha`) VALUES
(162, 'Medidor digital XIAOMI', 49, 'vendido', 240, 1, 72290589, '2022-11-30'),
(163, 'Nevera portatil para auto', 48, 'vendido', 260, 1, 72290589, '2022-11-30'),
(165, 'Nevera portatil para auto', 48, 'vendido', 260, 1, 78965412, '2022-11-30'),
(166, 'Medidor digital XIAOMI', 49, 'vendido', 480, 2, 78965412, '2022-11-30'),
(167, 'moto', 64, 'vendido', 150, 1, 75596677, '2022-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(150) NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `nombre`, `apellido`, `telefono`, `direccion`, `total`, `fecha`) VALUES
(136, 'Rodrigo', 'Lopez', 72290589, 'Calle porvenir entre Granado #521 Sacaba', 500, '2022-11-30'),
(137, 'Carlos', 'Peredo', 78965412, 'Calle demetrio perez entre porvenir Sacaba', 740, '2022-11-30'),
(138, 'pedro', 'carlos', 75596677, 'sacaba', 150, '2022-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio_normal` decimal(20,0) NOT NULL,
  `precio_rebajado` decimal(20,0) NOT NULL,
  `imagen2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `imagen3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `imagen4` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `cantidad`, `descripcion`, `id_categoria`, `imagen`, `precio_normal`, `precio_rebajado`, `imagen2`, `imagen3`, `imagen4`) VALUES
(47, 'Aspiradora para auto', 92, 'El artículo que usted precisa tener para garantizar con practicidad la limpieza de su automóvil es el aspirador de polvo portátil para automóviles Tramontina, 60 W, 12 V. Con cable eléctrico de 2 metros y filtro fácil de retirar, es perfecto para usar en automóviles, camiones o inclusive barcos y trailers. Tiene capacidad de 0,5 l en el depósito de polvo y viene con cepillo y boquilla prolongadora. Tiene una potencia de 60 W, tensión de 12 V e inclusive tiene enchufe para el encendedor de cigarrillos del vehículo. Garantice ya ese producto que le va a ofrecer un automóvil siempre limpio y agradable.', 1, '20221019183758.jpg', '150', '130', '202210191837582.jpg', '202210191837583.jpg', '202210191837584.jpg'),
(48, 'Nevera portatil para auto', 244, 'Perfecta para bebidas, alimentos, medicamentos, etc.\r\nPara viajes, paseos, camping y repartos de alimentos fríos o calientes!\r\n\r\nConéctela a la salida de encendedor de autos, camionetas, micros, camiones, motor homes, casas rodantes, embarcaciones y más!\r\n\r\nCARACTERISTICAS\r\nConservadora Termoeléctrica, color celeste y blanca\r\nVoltaje: 12 VCC\r\nAislación: Espuma de poliuretano de alta densidad libre de CFC\r\nCapacidad: 7,5 litros. Especialmente diseñado para el uso en el automóvil, fijación fácil y segura con el cinturón de seguridad del coche.\r\nLa refrigeración y la función de calefacción, se adapta a botellas y/o latas de 0.7 litros y sistema de ventilación individual con caja interior metálica.\r\nCable de conexión a 12 V. (no viene con conexión a 220V)\r\n\r\nAlto: 27 cm.\r\nAncho: 19 cm.\r\nProfundidad: 33 cm\r\nPeso 2 Kg aprox.', 10, '20221019191957.jpg', '260', '260', '202210191919572.jpg', '202210191919573.jpg', '202210191919574.jpg'),
(49, 'Medidor digital XIAOMI', 16, 'Caracteristicas:\r\nPantalla LCD de alta precisión\r\nTamaño mini, peso ligero a 35 g, medición de distancia ultra larga de 99 metros\r\nBatería de polímero de litio incorporada de 200 mAh, 5 minutos de carga, 2 horas de duración de la batería\r\n\r\nEspecificación:\r\nNombre del producto: Duke\r\nMaterial de la carcasa: aleación de aluminio + silicona\r\nPantalla: pantalla LCD VA de 1,8 pulgadas (texto blanco sobre fondo negro)\r\nTamaño: 53 * 15 mm\r\nPeso neto: 35g\r\nRango único: hasta 9,99 metros\r\nAlcance acumulado: hasta 99,99 metros\r\nPrecisión: ± 0,5%, admite sintonización continua\r\nTiempo de luz de fondo: 30-180 segundos\r\nBatería: 200 mAh 0,74 Wh\r\nPuerto de carga: tipo C\r\n\r\nEl paquete incluye:\r\nRegla eléctrica 1X\r\nCable 1X', 1, '20221019193241.jpg', '250', '240', '202210191932412.jpg', '202210191932413.jpg', '202210191932414.jpg'),
(62, 'Compresor de aire digital', 1, 'El Inflador de neumáticos es muy seguro y fácil de operar. Solo póngalo en el calcetín potente e inflarlo. El rango de inflado es de 3,5 m para conectar las ruedas delanteras y traseras del coche. El tubo inflable se puede guardar en una ranura en la parte posterior después de usarlo.\r\n\r\nColor: negro + amarillo\r\nMaterial:ABS\r\n\r\nContenido del paquete:\r\n1 * bomba inflable\r\n3 * boca inflable\r\n1 x fusible\r\n1 * manual en inglés\r\n\r\nSolo el contenido del paquete anterior, otros artículos no están incluidos.\r\nNota: La luz y las diferentes pantallas pueden hacer que el color del artículo en la imagen sea un poco diferente al real. El error de medición permitido es de +/- 1-3cm.\r\n\r\n', 1, '20221104012722.jpg', '240', '220', '202211040127222.jpg', '202211040127223.jpg', '202211040127224.jpg'),
(64, 'moto', 254, 'moto nueva', 16, '20221201021506.jpg', '150', '150', '202212010215062.jpg', '202212010215063.jpg', '202212010215064.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`) VALUES
(1, 'Jose Rodrigo Lopez Fuentes', ' toji', 'tojionlinestore'),
(7, 'Administrador', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `pedidos` (`telefono`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
