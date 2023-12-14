-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE `estaciones` (
  `ID_estacion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `Capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`ID_estacion`, `Nombre`, `Ciudad`, `Capacidad`) VALUES
(1, 'Sirkeci', 'Estambul', 2500),
(3, 'asdas', 'Estambul', 312311),
(20, 'dasdasda', 'Estambul', 31231231);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trenes`
--

CREATE TABLE `trenes` (
  `ID_tren` int(11) NOT NULL,
  `ID_estacion` int(11) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Capacidad_pasajeros` int(11) NOT NULL,
  `Fecha_fabricacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trenes`
--

INSERT INTO `trenes` (`ID_tren`, `ID_estacion`, `Modelo`, `Capacidad_pasajeros`, `Fecha_fabricacion`) VALUES
(1, 1, 'Zuzuki', 300, '2013-12-11'),
(5, 20, 'sadasda', 0, '5222-02-25'),
(12, 3, 'Honda', 300, '2222-02-05'),
(13, 20, 'Honda', 33333, '2222-02-20'),
(14, 3, 'sadasd', 200, '2222-02-02'),
(16, 1, 'Zuzukii', 33333, '5222-02-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(1, '1050356672', 'Steven Alexanderr', 'Montenegro Flores', '0985004757', 'stevenflores2011@hotmail.com', '123', 'Administrador'),
(3, '2300357478', 'David', 'Echeverriaaaa', '0985004564', 'david_23@gmail.com', '1234', 'Vendedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  ADD PRIMARY KEY (`ID_estacion`);

--
-- Indices de la tabla `trenes`
--
ALTER TABLE `trenes`
  ADD PRIMARY KEY (`ID_tren`),
  ADD KEY `Trenes_Estaciones` (`ID_estacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  MODIFY `ID_estacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `trenes`
--
ALTER TABLE `trenes`
  MODIFY `ID_tren` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
