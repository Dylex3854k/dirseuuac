-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2024 a las 20:21:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dir2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `id` int(11) NOT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fechaFirma` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `convenio`
--

INSERT INTO `convenio` (`id`, `institucion`, `descripcion`, `fechaFirma`) VALUES
(1, 'CRISCOS', 'Consejo de Rectores por la Integración de la Subregión Centro Oeste de Sudamérica', '2024-06-18'),
(2, 'UDUAL', 'Unión de Universidades de América Latina y el Caribe', '2024-06-18'),
(3, 'ALIANZA DEL PACÍFICO', 'Grupo de Universidades (México, Colombia, Perú y Chile)', '2024-06-18'),
(4, 'UNIVERSIA', 'Portal de las Universidades Españolas y Latinoamericanas', '2024-06-18'),
(5, 'OUI-eMOVIES', 'Red Latino Americana', '2024-06-18'),
(6, 'Erasmus Plus o Erasmus+', 'Promovida por la Unión Europea, a través de la Comisión Europea', '2024-06-18'),
(7, 'REDI-PERU', 'Red Peruana de Internacionalización de la Educación Superior', '2024-06-18'),
(8, 'REDISUR-PERÚ', 'Red Interuniversitaria del Sur del Perú', '2024-06-18'),
(9, 'FUNDACION CAROLINA', 'Canadá', '2024-06-18'),
(10, 'FUNDACIÓN FULLBRIGHT', 'Estados Unidos', '2024-06-18'),
(11, 'CONSEJO NACIONAL DE CIENCIA TECNOLOGIA E INNOVACION TECNOLÓGICA', 'Perú', '2024-06-18'),
(12, 'PROGRAMA RETO EXCELENCIA', 'Impulsa la Autoridad Nacional del Servicio Civil (SERVIR – Perú)', '2024-06-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_gestionreporte`
--

CREATE TABLE `convenio_gestionreporte` (
  `id` int(11) NOT NULL,
  `convenio_id` int(11) NOT NULL,
  `gest_rep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresado`
--

CREATE TABLE `egresado` (
  `egresado_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `añoGraduacion` date DEFAULT NULL,
  `facultad` varchar(255) DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `egresado`
--

INSERT INTO `egresado` (`egresado_id`, `nombre`, `apellidos`, `añoGraduacion`, `facultad`, `carrera`) VALUES
(1, 'Maria', 'Lopez Martinez', '2019-07-10', 'Facultad de Medicina', 'Medicina General'),
(2, 'Carlos', 'Rodriguez Sanchez', '2018-05-22', 'Facultad de Ciencias', 'Biología'),
(3, 'Ana', 'Gonzalez Perez', '2017-11-30', 'Facultad de Derecho', 'Derecho'),
(4, 'Luis', 'Fernandez Garcia', '2021-08-12', 'Facultad de Arquitectura', 'Arquitectura'),
(5, 'Laura', 'Martinez Lopez', '2016-09-18', 'Facultad de Psicología', 'Psicología'),
(6, 'Jose', 'Hernandez Ruiz', '2015-04-20', 'Facultad de Economía', 'Economía'),
(7, 'Elena', 'Ramirez Gomez', '2022-12-01', 'Facultad de Educación', 'Educación Primaria'),
(8, 'Diego', 'Sanchez Lopez', '2020-03-25', 'Facultad de Comunicación', 'Periodismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `even_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fechaIni` datetime DEFAULT NULL,
  `fechaFin` datetime NOT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`even_id`, `nombre`, `fechaIni`, `fechaFin`, `ubicacion`, `imagen`) VALUES
(1, 'Festidanzas Andinas', '2024-06-18 09:00:00', '2024-06-18 13:00:00', 'Coliseo Cerrado', '../img/rs7.jpg'),
(4, 'COLACI&Oacute;N Y JURAMENTACI&Oacute;N DE SALUD', '2024-06-06 00:00:00', '2024-06-06 00:00:00', 'Aula Magna 2 - Campus Qollana', '../img/MAIRACARMEN.jpg'),
(7, 'CAPACITACI&Oacute;N PARA FONDOS CONCURSABLES', '2024-06-11 00:00:00', '2024-06-11 00:00:00', 'Reuni&oacute;n Virtual', '../img/ADMINISTRADOR.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_reporte`
--

CREATE TABLE `gestion_reporte` (
  `gest_rep_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fechaIni` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `perDIR_id` int(11) DEFAULT NULL,
  `evento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `gestion_reporte`
--

INSERT INTO `gestion_reporte` (`gest_rep_id`, `nombre`, `fechaIni`, `fechaFin`, `perDIR_id`, `evento_id`) VALUES
(1, 'Festidanzas Andinas', '2024-06-11', '2024-06-18', 1, 1),
(5, 'COLACI&Oacute;N Y JURAMENTACI&Oacute;N DE SALUD', '2024-06-06', '2024-06-06', 1, 4),
(8, 'CAPACITACI&Oacute;N PARA FONDOS CONCURSABLES', '2024-06-11', '2024-06-11', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaldir`
--

CREATE TABLE `personaldir` (
  `perDIR_id` int(11) NOT NULL,
  `nombreCom` varchar(255) NOT NULL,
  `cargo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personaldir`
--

INSERT INTO `personaldir` (`perDIR_id`, `nombreCom`, `cargo`) VALUES
(1, 'MAIRA DEL CARMEN DE BUENAVISTA', 'ADMINISTRADOR'),
(2, 'KALEVI TUPAC\r\n', 'Especialista-DS'),
(3, 'FRANK MELENDEZ ', 'Coordinador-Seguiemiento Egresados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `id_postulante` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `id_laboral` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `pres_id` int(11) NOT NULL,
  `montoAsignado` float DEFAULT NULL,
  `montoEjecutado` float DEFAULT NULL,
  `gest_rep_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`pres_id`, `montoAsignado`, `montoEjecutado`, `gest_rep_id`) VALUES
(1, 500, 500, 1),
(4, 1500, 1500, 5),
(7, 123, 123, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto_laboral`
--

CREATE TABLE `puesto_laboral` (
  `id_laboral` int(11) NOT NULL,
  `nombre_puesto` varchar(255) NOT NULL,
  `descripcion_puesto` text DEFAULT NULL,
  `requisitos` text DEFAULT NULL,
  `descripcion_Empresa` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `perDIR_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `puesto_laboral`
--

INSERT INTO `puesto_laboral` (`id_laboral`, `nombre_puesto`, `descripcion_puesto`, `requisitos`, `descripcion_Empresa`, `imagen`, `perDIR_id`) VALUES
(2, 'EJECUTIVO DE VENTAS CORPORATIVAS', 'FULL-TIME, VENDER, ASESORAR Y PROMOCIONAR LA L&Iacute;NEA DE PRODUCTOS DE CULQI.', 'NO ESPECIFICADO', 'RECONOCIDA EMPRESA DEL RUBRO MEDIOS DE PAGO', '../img/MAIRACARMEN.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientoegresado`
--

CREATE TABLE `seguimientoegresado` (
  `seg_egre_id` int(11) NOT NULL,
  `estadoActual` varchar(255) DEFAULT NULL,
  `lugar_trabajo` varchar(255) NOT NULL,
  `puesto_desempeñado` varchar(255) NOT NULL,
  `fechaActualizacion` date DEFAULT NULL,
  `perDIR_id` int(11) DEFAULT NULL,
  `egresado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `seguimientoegresado`
--

INSERT INTO `seguimientoegresado` (`seg_egre_id`, `estadoActual`, `lugar_trabajo`, `puesto_desempeñado`, `fechaActualizacion`, `perDIR_id`, `egresado_id`) VALUES
(9, 'wreecfdf', 'dsfgg', 'sdfdf', '2024-06-09', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `perDIR_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nick`, `nombre`, `pass`, `correo`, `nivel`, `perDIR_id`) VALUES
(1, 'ADMINISTRADOR', 'MAIRA DEL CARMEN DE BUENAVISTA', '7c222fb2927d828af22f592134e8932480637c0d', 'asdf@cfvgbh.com', 'ADMINISTRADOR', 1),
(2, 'PERSONAL', 'KALEVI VGHBJNKMLL', '7c222fb2927d828af22f592134e8932480637c0d', 'kale@gmail.com', 'PERSONAL', 2),
(3, 'COORDINADOR', 'FRANK MELENDEZ ', '7c222fb2927d828af22f592134e8932480637c0d', 'frankcito@gmail.com', 'COORDINADOR', 3),
(6, 'REGULAR', 'ANA JOSEFINA DE LA CRUZ BARRIOS', '7c222fb2927d828af22f592134e8932480637c0d', 'banana@gmail.com', 'REGULAR', NULL),
(7, 'EGRESADO', 'VALENTINA ECHEGARAI CACERES', '7c222fb2927d828af22f592134e8932480637c0d', 'tina@gmail.com', 'EGRESADO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntariado`
--

CREATE TABLE `voluntariado` (
  `voluntariado_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `gest_rep_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `voluntariado`
--

INSERT INTO `voluntariado` (`voluntariado_id`, `nombre`, `fechaInicio`, `fechaFin`, `gest_rep_id`) VALUES
(1, 'Festidanzas Andinas', '2024-06-11', '2024-06-18', 1),
(4, 'COLACI&Oacute;N Y JURAMENTACI&Oacute;N DE SALUD', '2024-06-06', '2024-06-06', 5),
(7, 'CAPACITACI&Oacute;N PARA FONDOS CONCURSABLES', '2024-06-11', '2024-06-11', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

CREATE TABLE `voluntario` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `sexo` enum('MASCULINO','FEMENINO') NOT NULL,
  `codigo_estudiante` varchar(20) NOT NULL,
  `correo_institucional` varchar(100) DEFAULT NULL,
  `numero_celular` varchar(20) NOT NULL,
  `estado_actual` varchar(50) NOT NULL,
  `facultad` varchar(100) DEFAULT NULL,
  `escuela_profesional` varchar(100) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `voluntariado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `voluntario`
--

INSERT INTO `voluntario` (`id`, `nombre_completo`, `dni`, `sexo`, `codigo_estudiante`, `correo_institucional`, `numero_celular`, `estado_actual`, `facultad`, `escuela_profesional`, `idUsuario`, `voluntariado_id`) VALUES
(7, 'ANA JOSEFINA DE LA CRUZ BARRIOS', '72345678', 'FEMENINO', '20231234', '20231234@uandina.com', '987654321', 'REGULAR', 'Facultad de Ciencias Sociales, Educaci&oacute;n y Humanidades', 'Psicolog&iacute;a', 6, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenio_gestionreporte`
--
ALTER TABLE `convenio_gestionreporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `convenio_id` (`convenio_id`),
  ADD KEY `gest_rep_id` (`gest_rep_id`);

--
-- Indices de la tabla `egresado`
--
ALTER TABLE `egresado`
  ADD PRIMARY KEY (`egresado_id`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`even_id`);

--
-- Indices de la tabla `gestion_reporte`
--
ALTER TABLE `gestion_reporte`
  ADD PRIMARY KEY (`gest_rep_id`),
  ADD KEY `perDIR_id` (`perDIR_id`),
  ADD KEY `FK_GestionRepo_Evento` (`evento_id`);

--
-- Indices de la tabla `personaldir`
--
ALTER TABLE `personaldir`
  ADD PRIMARY KEY (`perDIR_id`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`id_postulante`),
  ADD KEY `id_laboral` (`id_laboral`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`pres_id`),
  ADD KEY `gest_rep_id` (`gest_rep_id`);

--
-- Indices de la tabla `puesto_laboral`
--
ALTER TABLE `puesto_laboral`
  ADD PRIMARY KEY (`id_laboral`),
  ADD KEY `perDIR_id` (`perDIR_id`);

--
-- Indices de la tabla `seguimientoegresado`
--
ALTER TABLE `seguimientoegresado`
  ADD PRIMARY KEY (`seg_egre_id`),
  ADD KEY `perDIR_id` (`perDIR_id`),
  ADD KEY `egresado_id` (`egresado_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `perDIR_id` (`perDIR_id`);

--
-- Indices de la tabla `voluntariado`
--
ALTER TABLE `voluntariado`
  ADD PRIMARY KEY (`voluntariado_id`),
  ADD KEY `FK_Voluntariado_GestionReporte` (`gest_rep_id`);

--
-- Indices de la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voluntariado_id` (`voluntariado_id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `convenio_gestionreporte`
--
ALTER TABLE `convenio_gestionreporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egresado`
--
ALTER TABLE `egresado`
  MODIFY `egresado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `even_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `gestion_reporte`
--
ALTER TABLE `gestion_reporte`
  MODIFY `gest_rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personaldir`
--
ALTER TABLE `personaldir`
  MODIFY `perDIR_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `id_postulante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `puesto_laboral`
--
ALTER TABLE `puesto_laboral`
  MODIFY `id_laboral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimientoegresado`
--
ALTER TABLE `seguimientoegresado`
  MODIFY `seg_egre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `voluntariado`
--
ALTER TABLE `voluntariado`
  MODIFY `voluntariado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `voluntario`
--
ALTER TABLE `voluntario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `convenio_gestionreporte`
--
ALTER TABLE `convenio_gestionreporte`
  ADD CONSTRAINT `convenio_gestionreporte_ibfk_1` FOREIGN KEY (`convenio_id`) REFERENCES `convenio` (`id`),
  ADD CONSTRAINT `convenio_gestionreporte_ibfk_2` FOREIGN KEY (`gest_rep_id`) REFERENCES `gestion_reporte` (`gest_rep_id`);

--
-- Filtros para la tabla `gestion_reporte`
--
ALTER TABLE `gestion_reporte`
  ADD CONSTRAINT `FK_GestionRepo_Evento` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`even_id`),
  ADD CONSTRAINT `gestion_reporte_ibfk_1` FOREIGN KEY (`perDIR_id`) REFERENCES `personaldir` (`perDIR_id`);

--
-- Filtros para la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD CONSTRAINT `postulante_ibfk_1` FOREIGN KEY (`id_laboral`) REFERENCES `puesto_laboral` (`id_laboral`),
  ADD CONSTRAINT `postulante_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `presupuesto_ibfk_1` FOREIGN KEY (`gest_rep_id`) REFERENCES `gestion_reporte` (`gest_rep_id`);

--
-- Filtros para la tabla `puesto_laboral`
--
ALTER TABLE `puesto_laboral`
  ADD CONSTRAINT `puesto_laboral_ibfk_1` FOREIGN KEY (`perDIR_id`) REFERENCES `personaldir` (`perDIR_id`);

--
-- Filtros para la tabla `seguimientoegresado`
--
ALTER TABLE `seguimientoegresado`
  ADD CONSTRAINT `seguimientoegresado_ibfk_1` FOREIGN KEY (`perDIR_id`) REFERENCES `personaldir` (`perDIR_id`),
  ADD CONSTRAINT `seguimientoegresado_ibfk_2` FOREIGN KEY (`egresado_id`) REFERENCES `egresado` (`egresado_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_Usuario_PersonalDIR` FOREIGN KEY (`perDIR_id`) REFERENCES `personaldir` (`perDIR_id`);

--
-- Filtros para la tabla `voluntariado`
--
ALTER TABLE `voluntariado`
  ADD CONSTRAINT `FK_Voluntariado_GestionReporte` FOREIGN KEY (`gest_rep_id`) REFERENCES `gestion_reporte` (`gest_rep_id`);

--
-- Filtros para la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD CONSTRAINT `voluntario_ibfk_1` FOREIGN KEY (`voluntariado_id`) REFERENCES `voluntariado` (`voluntariado_id`),
  ADD CONSTRAINT `voluntario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
