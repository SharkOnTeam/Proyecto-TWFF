-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2020 a las 05:45:55
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
-- Base de datos: `bd_twff`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `imagenCategoria` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `categoria`, `imagenCategoria`, `deleted`) VALUES
(1, 'Tradicionales', 'http://localhost:50/TWFF/vendor/uploads/bg-tradicional_1.PNG', 1),
(2, 'Animadas', 'http://localhost:50/TWFF/vendor/template/front_end/img/uploads/bg-animado.PNG', 1),
(4, 'Eventos', 'http://localhost:50/TWFF/vendor/template/front_end/img/uploads/bg-especial.PNG', 1),
(18, 'Coloridas', 'bg-especial.PNG', 0),
(21, 'Personajes', 'bg-animado_1.PNG', 1),
(22, 'Personajes 2', 'bg-animado.PNG', 1),
(23, 'Tradicionales 2', 'bg-tradicional_1.PNG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `estado_idEstado` int(11) NOT NULL,
  `mayoreo_idMayoreo` int(11) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `estado_idEstado`, `mayoreo_idMayoreo`, `ciudad`, `deleted`) VALUES
(1, 1, 1, 'Acámbaro', 1),
(2, 1, 1, 'Celaya', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `usuario_idUsuario` int(11) NOT NULL,
  `palabraComentario` varchar(45) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `calificacion` varchar(45) NOT NULL,
  `fechaComentario` date NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidoproducto`
--

CREATE TABLE `detallepedidoproducto` (
  `idDetallePedidoProducto` int(11) NOT NULL,
  `pedido_idPedido` int(11) NOT NULL,
  `producto_idProducto` int(11) NOT NULL,
  `metodoPago_metodoPago` int(11) NOT NULL,
  `metodoEnvio_idMetodoEnvio` int(11) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `descuento` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `estatus` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproductooferta`
--

CREATE TABLE `detalleproductooferta` (
  `idDetalleProductoOferta` int(11) NOT NULL,
  `producto_idProducto` int(11) NOT NULL,
  `oferta_idOferta` int(11) NOT NULL,
  `precioDescuento` decimal(10,0) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `usuario_idUsuario` int(11) NOT NULL,
  `pais_idPais` int(11) NOT NULL,
  `estado_idEstado` int(11) NOT NULL,
  `ciudad_idCiudad` int(11) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numExt` varchar(45) NOT NULL,
  `numInt` varchar(45) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `pais_idPais` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `pais_idPais`, `estado`, `deleted`) VALUES
(1, 1, 'Guanajuato', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `usuario_idUsuario` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`idFaq`, `usuario_idUsuario`, `pregunta`, `respuesta`, `deleted`) VALUES
(5, 13, 'Pregunta 2', 'Respuesta 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `idFavorito` int(11) NOT NULL,
  `usuario_idUsuario` int(11) NOT NULL,
  `producto_idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mayoreo`
--

CREATE TABLE `mayoreo` (
  `idMayoreo` int(11) NOT NULL,
  `cantidadMayoreo` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mayoreo`
--

INSERT INTO `mayoreo` (`idMayoreo`, `cantidadMayoreo`, `deleted`) VALUES
(1, 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodoenvio`
--

CREATE TABLE `metodoenvio` (
  `idMetodoEnvio` int(11) NOT NULL,
  `metodoEnvio` varchar(45) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodoenvio`
--

INSERT INTO `metodoenvio` (`idMetodoEnvio`, `metodoEnvio`, `deleted`) VALUES
(1, 'DHL', 1),
(2, 'FeDex', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodopago`
--

CREATE TABLE `metodopago` (
  `idMetodoPago` int(11) NOT NULL,
  `metodoPago` varchar(45) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodopago`
--

INSERT INTO `metodopago` (`idMetodoPago`, `metodoPago`, `deleted`) VALUES
(1, 'PayPal', 1),
(2, 'OXXO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `idOferta` int(11) NOT NULL,
  `descripcionOferta` varchar(200) NOT NULL,
  `descuento` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`idOferta`, `descripcionOferta`, `descuento`, `deleted`) VALUES
(2, 'Oferta del 20% de descuento', 20, 1),
(3, 'Oferta del 15% de descuento', 15, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `pais`, `deleted`) VALUES
(1, 'México', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `usuario_idUsuario` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `usuario_idUsuario`, `fechaPedido`, `deleted`) VALUES
(3, 12, '2020-07-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `subcategoria_idSubcategoria` int(11) NOT NULL,
  `producto` varchar(45) NOT NULL,
  `descripcionProducto` varchar(200) NOT NULL,
  `precioMenudeo` decimal(10,2) NOT NULL,
  `precioMayoreo` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagenProducto` varchar(200) NOT NULL,
  `imagenProducto2` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `subcategoria_idSubcategoria`, `producto`, `descripcionProducto`, `precioMenudeo`, `precioMayoreo`, `stock`, `imagenProducto`, `imagenProducto2`, `deleted`) VALUES
(1, 1, 'Spiderman', 'Piñata de Spiderman con decoración simple', '350.00', '0.00', 50, 'bg-especial.PNG', 'bg-animado.PNG', 1),
(3, 2, 'Princesa Cenicienta', 'Piñata del Princesa Cenicienta con decoración simple', '350.00', '0.00', 9, 'bg-especial.PNG', 'bg-animado.PNG', 1),
(4, 2, 'Mickey Mouse', 'Piñata de Mickey Mouse con decoración simple', '400.00', '0.00', 6, 'bg-especial.PNG', 'bg-animado.PNG', 1),
(5, 3, 'Piñata 5 picos morada', 'Piñata con 5 conos de color morado', '300.00', '0.00', 20, 'bg-especial.PNG', 'bg-animado.PNG', 1),
(8, 4, 'Piñata 7 picos azul', 'Piñata con 7 conos de color azul', '300.00', '0.00', 10, 'bg-especial.PNG', 'bg-animado.PNG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idSubcategoria` int(11) NOT NULL,
  `categoria_idCategoria` int(11) NOT NULL,
  `subcategoria` varchar(45) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubcategoria`, `categoria_idCategoria`, `subcategoria`, `deleted`) VALUES
(1, 2, 'Marvel', 1),
(2, 2, 'Disney', 1),
(3, 1, '5picos', 1),
(4, 1, '7picos', 1),
(7, 2, 'Pixar', 1),
(8, 4, 'Baby shower', 1),
(9, 4, 'Graduación', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `nombreUsuario` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `privilegios` tinyint(4) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `nombreUsuario`, `apellido`, `email`, `password`, `privilegios`, `deleted`) VALUES
(10, 'Ale24', '', '', 'jandis@hotmail.com', 'f7edfedc98e1d9f95c1d66be09c764ed4aa694f2', 1, 1),
(11, 'juan12', '', '', 'juan@hotmail.com', 'f19d60ee9396bd8505a7ee85b5933923a5a7a685', 1, 1),
(12, 'alex19', '', '', 'alex19@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1, 1),
(13, 'Admin', '', '', 'admintwff@twff.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`),
  ADD KEY `fk_ciu_est` (`estado_idEstado`),
  ADD KEY `fk_ciu_may` (`mayoreo_idMayoreo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `fk_com_usu` (`usuario_idUsuario`);

--
-- Indices de la tabla `detallepedidoproducto`
--
ALTER TABLE `detallepedidoproducto`
  ADD PRIMARY KEY (`idDetallePedidoProducto`),
  ADD KEY `fk_detPedPro_metE` (`metodoEnvio_idMetodoEnvio`),
  ADD KEY `fk_detPedPro_metP` (`metodoPago_metodoPago`),
  ADD KEY `fk_detPedPro_ped` (`pedido_idPedido`),
  ADD KEY `fk_detPedPro_pro` (`producto_idProducto`);

--
-- Indices de la tabla `detalleproductooferta`
--
ALTER TABLE `detalleproductooferta`
  ADD PRIMARY KEY (`idDetalleProductoOferta`),
  ADD KEY `fk_detProOfe_pro` (`producto_idProducto`),
  ADD KEY `fk_detProOfe_ofe` (`oferta_idOferta`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `fk_dir_usu` (`usuario_idUsuario`),
  ADD KEY `fk_dir_ciu` (`ciudad_idCiudad`),
  ADD KEY `fk_dir_est` (`estado_idEstado`),
  ADD KEY `fk_dir_pai` (`pais_idPais`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`),
  ADD KEY `fk_est_pai` (`pais_idPais`);

--
-- Indices de la tabla `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`),
  ADD KEY `fk_faq_usu` (`usuario_idUsuario`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `fk_fav_pro` (`producto_idProducto`),
  ADD KEY `fk_fav_usu` (`usuario_idUsuario`);

--
-- Indices de la tabla `mayoreo`
--
ALTER TABLE `mayoreo`
  ADD PRIMARY KEY (`idMayoreo`);

--
-- Indices de la tabla `metodoenvio`
--
ALTER TABLE `metodoenvio`
  ADD PRIMARY KEY (`idMetodoEnvio`);

--
-- Indices de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`idMetodoPago`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`idOferta`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_ped_usu` (`usuario_idUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_pro_subcat` (`subcategoria_idSubcategoria`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idSubcategoria`),
  ADD KEY `fk_subcat_cat` (`categoria_idCategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detallepedidoproducto`
--
ALTER TABLE `detallepedidoproducto`
  MODIFY `idDetallePedidoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleproductooferta`
--
ALTER TABLE `detalleproductooferta`
  MODIFY `idDetalleProductoOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `favorito`
--
ALTER TABLE `favorito`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mayoreo`
--
ALTER TABLE `mayoreo`
  MODIFY `idMayoreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `metodoenvio`
--
ALTER TABLE `metodoenvio`
  MODIFY `idMetodoEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  MODIFY `idMetodoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idSubcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciu_est` FOREIGN KEY (`estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ciu_may` FOREIGN KEY (`mayoreo_idMayoreo`) REFERENCES `mayoreo` (`idMayoreo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_com_usu` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepedidoproducto`
--
ALTER TABLE `detallepedidoproducto`
  ADD CONSTRAINT `fk_detPedPro_metE` FOREIGN KEY (`metodoEnvio_idMetodoEnvio`) REFERENCES `metodoenvio` (`idMetodoEnvio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detPedPro_metP` FOREIGN KEY (`metodoPago_metodoPago`) REFERENCES `metodopago` (`idMetodoPago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detPedPro_ped` FOREIGN KEY (`pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detPedPro_pro` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleproductooferta`
--
ALTER TABLE `detalleproductooferta`
  ADD CONSTRAINT `fk_detProOfe_ofe` FOREIGN KEY (`oferta_idOferta`) REFERENCES `oferta` (`idOferta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detProOfe_pro` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_dir_ciu` FOREIGN KEY (`ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dir_est` FOREIGN KEY (`estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dir_pai` FOREIGN KEY (`pais_idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dir_usu` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_est_pai` FOREIGN KEY (`pais_idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `fk_faq_usu` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `fk_fav_pro` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fav_usu` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_ped_usu` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_pro_subcat` FOREIGN KEY (`subcategoria_idSubcategoria`) REFERENCES `subcategoria` (`idSubcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_subcat_cat` FOREIGN KEY (`categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
