-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 04:02:09
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `petsmarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cab_diagnostico`
--

CREATE TABLE `cab_diagnostico` (
  `id_diagnostico` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cab_diagnostico`
--

INSERT INTO `cab_diagnostico` (`id_diagnostico`, `nombre`, `estado`) VALUES
(1, 'BABESIA CANIS', 1),
(2, 'EHRLICHIA CANIS', 1),
(3, 'ANAPLASMA CANINA', 1),
(4, 'MICOPLASMA', 1),
(5, 'LYME', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cab_grupo`
--

CREATE TABLE `cab_grupo` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipoExamen` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cab_grupo`
--

INSERT INTO `cab_grupo` (`id_grupo`, `nombre`, `id_tipoExamen`, `estado`) VALUES
(1, 'PARÁMETROS', 1, 1),
(2, 'PARAMETROS DE DIAGNOSTICO PRIMARIO', 2, 1),
(3, 'PARAMETRO DE ELECTROLITO PLUS', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cab_pregunta`
--

CREATE TABLE `cab_pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `nombre` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cab_pregunta`
--

INSERT INTO `cab_pregunta` (`id_pregunta`, `nombre`, `estado`) VALUES
(1, 'SU PERRO TIENE FIEBRE ALTA TODOS LOS DIAS?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telf` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `direccion`, `telf`, `correo`, `edad`, `sexo`, `cedula`, `nacionalidad`, `clave`, `estado`) VALUES
(1, 'ROMINA', 'GONZALEZ', 'FLORESTA 4 MZ 54', '095639844', 'rgonzalez@gmail.com', 35, 'FEMENINO', '0914523698', 'ECUATORIANA', 'cliente001', 1),
(2, 'FELIPA', 'FREIRE', 'CDLA SAMANES V', '0923655784', 'bfreire@gmail.com', 21, 'FEMENINO', '0954089231', 'ECUATORIANA', 'cliente002', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_diagnostico`
--

CREATE TABLE `det_diagnostico` (
  `id_detdiagnostico` int(11) NOT NULL,
  `id_sintoma` int(11) NOT NULL,
  `id_diagnostico` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `det_diagnostico`
--

INSERT INTO `det_diagnostico` (`id_detdiagnostico`, `id_sintoma`, `id_diagnostico`, `estado`) VALUES
(13, 2, 2, 1),
(14, 6, 2, 1),
(15, 7, 2, 1),
(19, 8, 3, 1),
(20, 1, 3, 1),
(21, 8, 1, 1),
(22, 2, 1, 1),
(23, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_grupo`
--

CREATE TABLE `det_grupo` (
  `id_detgrupo` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `det_grupo`
--

INSERT INTO `det_grupo` (`id_detgrupo`, `id_grupo`, `id_examen`, `estado`) VALUES
(4, 1, 6, 1),
(5, 1, 2, 1),
(6, 1, 4, 1),
(7, 1, 3, 1),
(8, 2, 6, 1),
(9, 2, 1, 1),
(10, 2, 5, 1),
(11, 3, 6, 1),
(12, 3, 2, 1),
(13, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_ordenexamen`
--

CREATE TABLE `det_ordenexamen` (
  `id_detorden` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `valor` double NOT NULL,
  `indicador` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `det_ordenexamen`
--

INSERT INTO `det_ordenexamen` (`id_detorden`, `id_orden`, `id_grupo`, `id_examen`, `valor`, `indicador`, `estado`) VALUES
(1, 3, 1, 6, 0, 0, 0),
(2, 3, 1, 2, 0, 0, 0),
(3, 3, 1, 4, 0, 0, 0),
(4, 3, 1, 3, 0, 0, 0),
(5, 3, 2, 6, 0, 0, 0),
(6, 3, 2, 1, 0, 0, 0),
(7, 3, 2, 5, 0, 0, 0),
(8, 4, 3, 6, 0, 0, 0),
(9, 4, 3, 2, 0, 0, 0),
(10, 4, 3, 3, 0, 0, 0),
(11, 5, 1, 6, 0, 0, 0),
(12, 5, 1, 2, 0, 0, 0),
(13, 5, 1, 4, 0, 0, 0),
(14, 5, 1, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_pregunta`
--

CREATE TABLE `det_pregunta` (
  `id_detpregunta` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telf` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`, `direccion`, `telf`, `correo`, `edad`, `sexo`, `cedula`, `nacionalidad`, `estado`, `id_sucursal`) VALUES
(1, 'JUAN RUBEN', 'RAMIREZ', 'LOS ESTEROS MZ 675', '099632148', 'jramirez@gmail.com', 32, 'MASCULINO', '0912659874', 'ECUATORIANA', 1, 1),
(2, 'VIVIANA', 'CRUZ', 'CDLA LA VALDIVIA MZ 34', '096325984', 'vcruz@hotmail.com', 28, 'FEMENINO', '0936942511', 'ECUATORIANA', 1, 1),
(3, 'CLAUDIA', 'RAMIREZ', 'CDLA. LA AURORA', '0968426955', 'cramirez@gmail.com', 29, 'FEMENINO', '0917213698', 'ECUATORIANA', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id_especie`, `nombre`, `estado`) VALUES
(1, 'PERRO', 1),
(2, 'GATO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id_examen` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codigo` varchar(5) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `valor_min` double NOT NULL,
  `valor_max` double NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id_examen`, `nombre`, `codigo`, `valor_min`, `valor_max`, `estado`) VALUES
(1, 'LEUCOCITOS (GLOBULOS BLANCOS)', 'LEU', 6, 17, 1),
(2, 'ERITROCITOS (GLOBULOS ROJOS)', 'ERI', 5.1, 8.5, 1),
(3, 'HEMOGLOBINA', 'HEM', 11, 19, 1),
(4, 'HEMATOCRITO', 'HEA', 33, 56, 1),
(5, 'PLAQUETAS', 'PLA', 200, 500, 1),
(6, 'ALP-PS (HIGADO)', 'ALP', 32, 185, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `id_insumo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `id_tipoInsumo` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`id_insumo`, `nombre`, `stock`, `id_tipoInsumo`, `estado`) VALUES
(1, 'Diaton-Lyse-D', 100, 1, 1),
(2, 'Drabkins', 80, 1, 1),
(3, 'Tubos de ensayo', 250, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_examen`
--

CREATE TABLE `orden_examen` (
  `id_orden` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codigo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_final` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_examen`
--

INSERT INTO `orden_examen` (`id_orden`, `id_paciente`, `fecha`, `codigo`, `estado`, `fecha_final`) VALUES
(3, 1, '2024-11-11 22:10', '202411110PETMARKET003', 1, '2024-11-11'),
(4, 1, '2024-11-11 23:00', '202411110PETMARKET004', 0, '2024-11-11'),
(5, 2, '2024-11-25 16:57', '202411250PETMARKET004', 1, '2024-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `peso` double NOT NULL,
  `fecha_nacimiento` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sexo` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tamanio` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_cliente` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `edad`, `peso`, `fecha_nacimiento`, `sexo`, `tamanio`, `estado`, `id_cliente`, `id_raza`) VALUES
(1, 'FIRULAIS', 10, 6.5, '2024-01-10', 'MACHO', 'GRANDE', 1, 1, 1),
(2, 'SOL', 12, 10, '2023-10-25', 'HEMBRA', 'EXTRA GRANDE', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `valor` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `valor`, `estado`) VALUES
(1, 'https://lmipagweb.com/reportes.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id_raza` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_especie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id_raza`, `nombre`, `estado`, `id_especie`) VALUES
(1, 'PITBULL', 1, 1),
(2, 'SIAMES', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `nombre` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_sintoma` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `nombre`, `id_sintoma`, `estado`) VALUES
(1, 'FIEBRE ALTA', 0, 1),
(2, 'DOLOR DE ESPALDA', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintoma`
--

CREATE TABLE `sintoma` (
  `id_sintoma` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sintoma`
--

INSERT INTO `sintoma` (`id_sintoma`, `nombre`, `estado`) VALUES
(1, 'FIEBRE', 1),
(2, 'DEBILIDAD', 1),
(5, 'PERDIDA DE APETITO', 1),
(6, 'RESPIRA CON DIFICULTAD', 1),
(7, 'TIENE GARRAPATAS', 1),
(8, 'COJERA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre`, `direccion`, `numero`, `estado`) VALUES
(1, 'MATRIZ', 'CDLA LOS ESTEROS MZ 789 V 9', '042687123', 1),
(2, 'SUCURSAL SUR', 'CDLA GUASMO SUR II', '042314789', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_examen`
--

CREATE TABLE `tipo_examen` (
  `id_tipoExamen` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_examen`
--

INSERT INTO `tipo_examen` (`id_tipoExamen`, `nombre`, `estado`) VALUES
(1, 'HEMOGRAMA', 1),
(2, 'QUIMICA SANGUINEA SEAMATY', 1),
(3, 'HECES', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_insumo`
--

CREATE TABLE `tipo_insumo` (
  `id_tipoInsumo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_insumo`
--

INSERT INTO `tipo_insumo` (`id_tipoInsumo`, `nombre`, `estado`) VALUES
(1, 'REACTIVOS', 1),
(2, 'MATERIALES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipoUsuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `op01` int(11) NOT NULL DEFAULT 0,
  `op02` int(11) NOT NULL DEFAULT 0,
  `op03` int(11) NOT NULL DEFAULT 0,
  `op04` int(11) NOT NULL DEFAULT 0,
  `op05` int(11) NOT NULL DEFAULT 0,
  `op06` int(11) NOT NULL DEFAULT 0,
  `op07` int(11) NOT NULL DEFAULT 0,
  `op08` int(11) NOT NULL DEFAULT 0,
  `op09` int(11) NOT NULL DEFAULT 0,
  `op10` int(11) NOT NULL DEFAULT 0,
  `op11` int(11) NOT NULL DEFAULT 0,
  `op12` int(11) NOT NULL DEFAULT 0,
  `op13` int(11) NOT NULL DEFAULT 0,
  `op14` int(11) NOT NULL DEFAULT 0,
  `op15` int(11) NOT NULL DEFAULT 0,
  `op16` int(11) NOT NULL DEFAULT 0,
  `op17` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipoUsuario`, `nombre`, `op01`, `op02`, `op03`, `op04`, `op05`, `op06`, `op07`, `op08`, `op09`, `op10`, `op11`, `op12`, `op13`, `op14`, `op15`, `op16`, `op17`, `estado`) VALUES
(1, 'ADMINISTRADOR', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'VETERINARIO', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1),
(3, 'EMPLEADO', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `clave`, `id_tipoUsuario`, `id_empleado`, `estado`) VALUES
(1, 'admin', 'admin123', 1, 1, 1),
(2, 'veter', 'veter123', 2, 2, 1),
(3, 'emple', 'emple123', 3, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cab_diagnostico`
--
ALTER TABLE `cab_diagnostico`
  ADD PRIMARY KEY (`id_diagnostico`);

--
-- Indices de la tabla `cab_grupo`
--
ALTER TABLE `cab_grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `cab_pregunta`
--
ALTER TABLE `cab_pregunta`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `det_diagnostico`
--
ALTER TABLE `det_diagnostico`
  ADD PRIMARY KEY (`id_detdiagnostico`);

--
-- Indices de la tabla `det_grupo`
--
ALTER TABLE `det_grupo`
  ADD PRIMARY KEY (`id_detgrupo`);

--
-- Indices de la tabla `det_ordenexamen`
--
ALTER TABLE `det_ordenexamen`
  ADD PRIMARY KEY (`id_detorden`);

--
-- Indices de la tabla `det_pregunta`
--
ALTER TABLE `det_pregunta`
  ADD PRIMARY KEY (`id_detpregunta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `orden_examen`
--
ALTER TABLE `orden_examen`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id_raza`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`);

--
-- Indices de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  ADD PRIMARY KEY (`id_sintoma`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  ADD PRIMARY KEY (`id_tipoExamen`);

--
-- Indices de la tabla `tipo_insumo`
--
ALTER TABLE `tipo_insumo`
  ADD PRIMARY KEY (`id_tipoInsumo`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cab_diagnostico`
--
ALTER TABLE `cab_diagnostico`
  MODIFY `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cab_grupo`
--
ALTER TABLE `cab_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cab_pregunta`
--
ALTER TABLE `cab_pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `det_diagnostico`
--
ALTER TABLE `det_diagnostico`
  MODIFY `id_detdiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `det_grupo`
--
ALTER TABLE `det_grupo`
  MODIFY `id_detgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `det_ordenexamen`
--
ALTER TABLE `det_ordenexamen`
  MODIFY `id_detorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `det_pregunta`
--
ALTER TABLE `det_pregunta`
  MODIFY `id_detpregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orden_examen`
--
ALTER TABLE `orden_examen`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id_raza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  MODIFY `id_sintoma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  MODIFY `id_tipoExamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_insumo`
--
ALTER TABLE `tipo_insumo`
  MODIFY `id_tipoInsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
