-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 11:47:11
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idProfesor_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `idProfesor_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `idProfesor_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE `boletin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `idProfesor_materia` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_nota`
--

CREATE TABLE `clasificacion_nota` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`) VALUES
(5, 'ingenieria de sistemas I'),
(6, 'administracion de empresas I'),
(7, 'ingenieria civil I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_actividad`
--

CREATE TABLE `entrega_actividad` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_acudiente`
--

CREATE TABLE `estudiante_acudiente` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAcudiente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_acudiente`
--

INSERT INTO `estudiante_acudiente` (`id`, `idUsuario`, `idAcudiente`) VALUES
(1, 2, 4),
(4, 5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_curso`
--

CREATE TABLE `estudiante_curso` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_curso`
--

INSERT INTO `estudiante_curso` (`id`, `idUsuario`, `idCurso`, `fechaInicio`, `fechaFin`) VALUES
(1, 2, 5, '2018-01-01', '2017-11-30'),
(2, 12, 7, '2017-11-01', '2018-07-01'),
(3, 13, 5, '2016-01-01', '2017-11-01'),
(4, 5, 6, '2017-01-01', '2017-12-01'),
(5, 13, 6, '2017-12-01', '2018-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_materia`
--

CREATE TABLE `estudiante_materia` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idMateria_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciosesion`
--

CREATE TABLE `iniciosesion` (
  `id` int(11) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `iniciosesion`
--

INSERT INTO `iniciosesion` (`id`, `contrasena`, `idUsuario`) VALUES
(1, '123456', 1),
(2, '123456', 2),
(3, '123456', 3),
(4, '123456', 5),
(5, '123456789', 6),
(6, '123456', 8),
(7, '123456', 9),
(8, '123456', 10),
(9, '123456', 11),
(10, '123456', 12),
(11, '123456', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`) VALUES
(1, 'fisica'),
(2, 'matematicas'),
(3, 'espaÃ±ol'),
(4, 'calculo D'),
(5, 'economia'),
(6, 'sociales'),
(7, 'cicencias naturales'),
(8, 'contabilidad'),
(9, 'artistica'),
(10, 'calculo integral'),
(11, 'matematicas I'),
(12, 'ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_curso`
--

CREATE TABLE `materia_curso` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idProfesor_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_curso`
--

INSERT INTO `materia_curso` (`id`, `idCurso`, `idProfesor_materia`) VALUES
(1, 5, 30),
(2, 6, 34),
(3, 6, 33),
(4, 7, 32),
(5, 7, 31),
(6, 6, 36),
(7, 6, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nota` float NOT NULL,
  `idClasificacion_nota` int(11) NOT NULL,
  `idBoletin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor_materia`
--

INSERT INTO `profesor_materia` (`id`, `idUsuario`, `idMateria`, `estado`) VALUES
(23, 8, 4, 1),
(24, 3, 10, 0),
(25, 9, 9, 0),
(26, 8, 9, 1),
(27, 8, 7, 1),
(28, 9, 10, 1),
(29, 10, 10, 1),
(30, 8, 11, 1),
(31, 10, 11, 1),
(32, 3, 1, 1),
(33, 9, 8, 1),
(34, 3, 2, 1),
(35, 8, 2, 1),
(36, 11, 5, 1),
(37, 11, 10, 1),
(38, 11, 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `rh` varchar(5) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `perfil` int(11) NOT NULL,
  `genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `identificacion`, `telefono`, `direccion`, `fechaNacimiento`, `rh`, `correo`, `perfil`, `genero`) VALUES
(1, 'Carlos Andres', 'lopez', '11111111111', '316 280 9825', 'cra 246 # 25-63', '2017-09-04', 'A+', 'andres_l159@hotmail.com', 1, 'masculino'),
(2, ' carlos andres ', 'lopez', '123456', '32567787654', 'cra25#25-25', '2017-10-18', 'O+', 'andres@andres.com', 3, 'masculino'),
(3, 'jessica', 'lopez', '123456', '2111111', 'cra25#25-25', '2017-10-02', 'o+', 'jessica@jessica.com', 2, 'femenino'),
(4, 'jessica', 'lopez', ' 13547987654', '2777777', 'cra25#25-25', '0000-00-00', 'o+', 'sd@df.com', 4, 'femenino'),
(5, 'leo', 'loaisa', '123456', '3123123123', 'cra24#24-24', '1991-12-31', 'o+', 'leo@leo.com', 3, 'masculino'),
(6, 'wilson', 'leal', '123456789', '3111111111', 'cra24#24-24', '1991-12-31', 'o+', 'ejemplo@ejemplo.com', 3, 'masculino'),
(7, '  leandra ', 'loaisa', '123456789', '3123123123', 'cra24#24-24', '0000-00-00', '', 'lea@lea.com', 4, 'femenino'),
(8, 'eduardo', 'lazaro', '123456', '3128362532', 'cra25#25-25', '2017-10-25', 'O-', 'eduardo@eduardo.com', 2, 'masculino'),
(9, 'caleb', 'marruecos', '123456', '3123123123', 'cra24#24-24', '1991-12-31', 'AB+', 'caleb@caleb.com', 2, 'masculino'),
(10, 'camilo', 'paez', '123456', '3128362532', 'cra25#25-25', '1991-08-01', 'AB+', 'camilo@camilo.com', 2, 'masculino'),
(11, 'luciana', 'valencia', '123456', '32567787654', 'cra25#25-25', '1998-02-27', 'AB+', 'luciana@luciana.com', 2, 'femenino'),
(12, 'calisto', 'vega', '123456', '32567787654', 'cra25#25-25', '1992-08-02', 'A+', 'calisto@calisto.com', 3, 'masculino'),
(13, 'daniel', 'becerra', '123456', '3162809825', 'cra25#25-25', '1991-01-01', 'O+', 'daniel@daniel.com', 3, 'masculino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clasificacion_nota`
--
ALTER TABLE `clasificacion_nota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrega_actividad`
--
ALTER TABLE `entrega_actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante_acudiente`
--
ALTER TABLE `estudiante_acudiente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante_materia`
--
ALTER TABLE `estudiante_materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iniciosesion`
--
ALTER TABLE `iniciosesion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia_curso`
--
ALTER TABLE `materia_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `boletin`
--
ALTER TABLE `boletin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clasificacion_nota`
--
ALTER TABLE `clasificacion_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `entrega_actividad`
--
ALTER TABLE `entrega_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiante_acudiente`
--
ALTER TABLE `estudiante_acudiente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estudiante_materia`
--
ALTER TABLE `estudiante_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `iniciosesion`
--
ALTER TABLE `iniciosesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `materia_curso`
--
ALTER TABLE `materia_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
