-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2025 a las 20:30:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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
  `nombre` varchar(100) NOT NULL,
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
(5, 'LYME', 1),
(6, 'NO PRESENTA ENFERMEDAD HEMOPARASITARIA', 1);

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
  `nombre` varchar(500) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cab_pregunta`
--

INSERT INTO `cab_pregunta` (`id_pregunta`, `nombre`, `estado`) VALUES
(4, '¿CóMO HA MEDIDO LA FIEBRE DE SU MASCOTA?', 1),
(5, '¿SU MASCOTA HA DEJADO DE COMER REPENTINAMENTE O HA REDUCIDO SU CONSUMO DE ALIMENTO?', 1),
(6, '¿LA FALTA DE APETITO HA PERSISTIDO POR MáS DE UN DíA?', 1),
(7, '¿SU MASCOTA SE MUESTRA MENOS ACTIVA DE LO HABITUAL?', 1),
(8, '¿EL LETARGO ES CONSTANTE O VARíA DURANTE EL DíA?', 1),
(9, '¿HA NOTADO ENCíAS PáLIDAS O BLANQUECINAS EN SU MASCOTA?', 1),
(10, '¿SU MASCOTA PARECE MáS DéBIL O SE CANSA CON FACILIDAD?', 1),
(11, '¿SU MASCOTA TIENE DIFICULTAD PARA LEVANTARSE DESPUéS DE ESTAR ACOSTADA?', 1),
(12, '¿EVITA ACTIVIDADES FíSICAS COMO SALTAR O SUBIR ESCALERAS?', 1),
(13, '¿HA NOTADO BULTOS VISIBLES EN EL CUELLO O AXILAS DE SU MASCOTA?', 1),
(14, '¿LOS BULTOS SON SENSIBLES O DOLOROSOS AL TACTO?', 1),
(16, '¿EL SANGRADO NASAL OCURRE CON FRECUENCIA?', 1),
(17, '¿CóMO HA SIDO EL CAMBIO EN SU COMPORTAMIENTO ALIMENTICIO?', 1),
(18, '¿CóMO DESCRIBIRíA EL NIVEL DE ACTIVIDAD DE SU MASCOTA?', 1),
(19, '¿EN QUé MOMENTO DEL DíA NOTA MAYOR LETARGO EN SU MASCOTA?', 1),
(20, '¿CóMO LUCEN LAS ENCíAS DE SU MASCOTA AL OBSERVARLAS?', 1),
(21, '¿CóMO DESCRIBIRíA LA ENERGíA GENERAL DE SU MASCOTA?', 1),
(22, '¿CóMO SE COMPORTA SU MASCOTA AL LEVANTARSE DESPUéS DE ESTAR ACOSTADA?', 1),
(23, '¿QUé TAN DISPUESTA ESTá SU MASCOTA A REALIZAR ACTIVIDADES FíSICAS?', 1),
(24, '¿CóMO ES LA SENSIBILIDAD DE ESOS BULTOS AL TACTO?', 1),
(25, '¿HA OBSERVADO SANGRADO NASAL EN SU MASCOTA?', 1),
(26, '¿CON QUé FRECUENCIA HA OCURRIDO EL SANGRADO NASAL?', 1),
(27, '¿CóMO SE VEN LOS OJOS, PIEL O ENCíAS DE SU MASCOTA?', 1),
(28, '¿CóMO ES LA APARIENCIA DE LA ORINA DE SU MASCOTA?', 1),
(29, '¿CóMO HA SIDO LA CONSISTENCIA DE LAS HECES DE SU MASCOTA?', 1),
(30, '¿CUáNTO TIEMPO HA PERSISTIDO LA DIARREA?', 1),
(31, '¿CóMO AFECTA LA COJERA A LA MOVILIDAD DE SU MASCOTA?', 1),
(32, '¿HA NOTADO INFLAMACIóN VISIBLE EN LA PATA AFECTADA?', 1),
(33, '¿CóMO DESCRIBIRíA LOS TEMBLORES MUSCULARES EN SU MASCOTA?', 1),
(34, '¿EN QUé MOMENTO OCURREN LOS TEMBLORES?', 1),
(35, '¿CóMO HA SIDO EL VóMITO DE SU MASCOTA?', 1),
(36, '¿QUé CONTENíA EL VóMITO DE SU MASCOTA?', 1),
(37, '¿HA NOTADO QUE SU MASCOTA TIENE FIEBRE O TEMPERATURA ELEVADA AL TACTO?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telf` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `direccion`, `telf`, `correo`, `edad`, `sexo`, `cedula`, `nacionalidad`, `clave`, `estado`) VALUES
(1, 'ROMINA', 'GONZALEZ', 'FLORESTA 4 MZ 54', '095639844', 'rgonzalez@gmail.com', 35, 'FEMENINO', '0914523698', 'ECUATORIANA', 'cliente001', 1),
(2, 'FELIPA', 'FREIRE', 'CDLA SAMANES V', '0923655784', 'bfreire@gmail.com', 21, 'FEMENINO', '0954089231', 'ECUATORIANA', 'cliente002', 1),
(3, 'Juan', 'Diego', 'Floreana 208 y mexico', '0998295740', 'diegogavilanes574@gmail.com', 0, 'MASCULINO', '0958251811', 'Ecuatoriano', 'admin123', 1),
(4, 'Sebas', 'Gavilanes', 'Floreana 208 y mexico', '0998295741', 'venombenito1@gmail.com', 0, 'MASCULINO', '0958251761', 'Ecuatoriano', 'admin123', 1);

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
(24, 10, 1, 1),
(25, 1, 1, 1),
(26, 14, 1, 1),
(27, 9, 1, 1),
(28, 5, 1, 1),
(29, 10, 3, 1),
(30, 11, 3, 1),
(31, 1, 3, 1),
(32, 12, 3, 1),
(33, 9, 3, 1),
(34, 10, 5, 1),
(35, 8, 5, 1),
(36, 11, 5, 1),
(37, 1, 5, 1),
(38, 9, 5, 1),
(39, 10, 2, 1),
(40, 1, 2, 1),
(41, 13, 2, 1),
(42, 12, 2, 1),
(43, 9, 2, 1),
(44, 10, 4, 1),
(45, 15, 4, 1),
(46, 9, 4, 1),
(47, 5, 4, 1),
(48, 17, 4, 1),
(49, 15, 6, 1),
(50, 1, 6, 1);

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
(8, 2, 6, 1),
(9, 2, 1, 1),
(10, 2, 5, 1),
(11, 3, 6, 1),
(12, 3, 2, 1),
(13, 3, 3, 1),
(18, 1, 6, 1),
(19, 1, 2, 1),
(20, 1, 4, 1),
(21, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_igrupo`
--

CREATE TABLE `det_igrupo` (
  `id_detIgrupo` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_insumo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `det_igrupo`
--

INSERT INTO `det_igrupo` (`id_detIgrupo`, `id_grupo`, `id_insumo`, `cantidad`, `estado`) VALUES
(3, 1, 3, 3, 1),
(4, 1, 2, 4, 1);

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
(1, 3, 1, 6, 120, 0, 1),
(2, 3, 1, 2, 4, 1, 1),
(3, 3, 1, 4, 25, 1, 1),
(4, 3, 1, 3, 12, 0, 1),
(5, 3, 2, 6, 120, 0, 1),
(6, 3, 2, 1, 130, 1, 1),
(7, 3, 2, 5, 250, 0, 1),
(8, 4, 3, 6, 32, 0, 0),
(9, 4, 3, 2, 5, 1, 0),
(10, 4, 3, 3, 12, 0, 0),
(11, 5, 1, 6, 30, 1, 0),
(12, 5, 1, 2, 20, 1, 0),
(13, 5, 1, 4, 50, 0, 0),
(14, 5, 1, 3, 17, 0, 0),
(15, 7, 2, 6, 31, 1, 0),
(16, 7, 2, 1, 6, 0, 0),
(17, 7, 2, 5, 201, 0, 0),
(18, 8, 3, 6, 31, 1, 0),
(19, 8, 3, 2, 5, 1, 0),
(20, 8, 3, 3, 12, 0, 0),
(21, 9, 3, 6, 31, 1, 0),
(22, 9, 3, 2, 5, 1, 0),
(23, 9, 3, 3, 12, 0, 0),
(24, 10, 3, 6, 32, 0, 0),
(25, 10, 3, 2, 5, 1, 0),
(26, 10, 3, 3, 12, 0, 0),
(27, 11, 3, 6, 31, 1, 0),
(28, 11, 3, 2, 5, 1, 0),
(29, 11, 3, 3, 12, 0, 0),
(30, 12, 3, 6, 31, 1, 0),
(31, 12, 3, 2, 5, 1, 0),
(32, 12, 3, 3, 12, 0, 0),
(33, 13, 3, 6, 0, 1, 0),
(34, 13, 3, 2, 0, 1, 0),
(35, 13, 3, 3, 0, 1, 0),
(36, 14, 3, 6, 0, 1, 0),
(37, 14, 3, 2, 0, 1, 0),
(38, 14, 3, 3, 0, 1, 0),
(39, 15, 3, 6, 0, 1, 0),
(40, 15, 3, 2, 0, 1, 0),
(41, 15, 3, 3, 0, 1, 0),
(42, 16, 3, 6, 0, 1, 0),
(43, 16, 3, 2, 0, 1, 0),
(44, 16, 3, 3, 0, 1, 0),
(45, 17, 3, 6, 0, 1, 0),
(46, 17, 3, 2, 0, 1, 0),
(47, 17, 3, 3, 0, 1, 0),
(48, 18, 3, 6, 0, 1, 0),
(49, 18, 3, 2, 0, 1, 0),
(50, 18, 3, 3, 0, 1, 0),
(51, 19, 3, 6, 0, 1, 0),
(52, 19, 3, 2, 0, 1, 0),
(53, 19, 3, 3, 0, 1, 0),
(54, 20, 3, 6, 0, 1, 0),
(55, 20, 3, 2, 0, 1, 0),
(56, 20, 3, 3, 0, 1, 0),
(57, 21, 3, 6, 0, 1, 0),
(58, 21, 3, 2, 0, 1, 0),
(59, 21, 3, 3, 0, 1, 0),
(60, 22, 3, 6, 0, 1, 0),
(61, 22, 3, 2, 0, 1, 0),
(62, 22, 3, 3, 0, 1, 0),
(63, 23, 3, 6, 0, 1, 0),
(64, 23, 3, 2, 0, 1, 0),
(65, 23, 3, 3, 0, 1, 0),
(66, 24, 3, 6, 0, 1, 0),
(67, 24, 3, 2, 0, 1, 0),
(68, 24, 3, 3, 0, 1, 0),
(69, 25, 3, 6, 0, 1, 0),
(70, 25, 3, 2, 0, 1, 0),
(71, 25, 3, 3, 0, 1, 0),
(72, 26, 3, 6, 0, 1, 0),
(73, 26, 3, 2, 0, 1, 0),
(74, 26, 3, 3, 0, 1, 0),
(75, 27, 3, 6, 0, 1, 0),
(76, 27, 3, 2, 0, 1, 0),
(77, 27, 3, 3, 0, 1, 0),
(78, 28, 3, 6, 0, 1, 0),
(79, 28, 3, 2, 0, 1, 0),
(80, 28, 3, 3, 0, 1, 0),
(81, 29, 3, 6, 0, 1, 0),
(82, 29, 3, 2, 0, 1, 0),
(83, 29, 3, 3, 0, 1, 0),
(84, 30, 3, 6, 0, 1, 0),
(85, 30, 3, 2, 0, 1, 0),
(86, 30, 3, 3, 0, 1, 0),
(87, 31, 3, 6, 0, 1, 0),
(88, 31, 3, 2, 0, 1, 0),
(89, 31, 3, 3, 0, 1, 0),
(90, 32, 3, 6, 0, 1, 0),
(91, 32, 3, 2, 0, 1, 0),
(92, 32, 3, 3, 0, 1, 0),
(93, 33, 3, 6, 0, 1, 0),
(94, 33, 3, 2, 0, 1, 0),
(95, 33, 3, 3, 0, 1, 0),
(96, 34, 3, 6, 0, 1, 0),
(97, 34, 3, 2, 0, 1, 0),
(98, 34, 3, 3, 0, 1, 0),
(99, 35, 3, 6, 0, 1, 0),
(100, 35, 3, 2, 0, 1, 0),
(101, 35, 3, 3, 0, 1, 0),
(102, 36, 3, 6, 0, 1, 0),
(103, 36, 3, 2, 0, 1, 0),
(104, 36, 3, 3, 0, 1, 0),
(105, 37, 3, 6, 0, 1, 0),
(106, 37, 3, 2, 0, 1, 0),
(107, 37, 3, 3, 0, 1, 0),
(108, 38, 3, 6, 0, 1, 0),
(109, 38, 3, 2, 0, 1, 0),
(110, 38, 3, 3, 0, 1, 0);

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
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telf` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(5) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
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
  `fecha` varchar(20) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_final` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_examen`
--

INSERT INTO `orden_examen` (`id_orden`, `id_paciente`, `fecha`, `codigo`, `estado`, `fecha_final`) VALUES
(3, 1, '2024-11-11 22:10', '202411110PETMARKET003', 2, '2024-11-11'),
(4, 1, '2024-11-11 23:00', '202411110PETMARKET004', 2, '2024-11-11'),
(5, 2, '2024-11-25 16:57', '202411250PETMARKET004', 2, '2024-11-28'),
(7, 3, '2025-01-10 21:43', '202501100PETMARKET005', 0, '2025-01-10'),
(8, 3, '2025-01-10 21:54', '202501100PETMARKET001', 2, '2025-01-10'),
(9, 3, '2025-01-10 22:07', '202501100PETMARKET001', 2, '2025-01-10'),
(10, 3, '2025-01-10 22:10', '202501100PETMARKET001', 2, '2025-01-10'),
(11, 3, '2025-01-10 22:15', '202501100PETMARKET001', 2, '2025-01-10'),
(12, 3, '2025-01-10 22:17', '202501100PETMARKET001', 2, '2025-01-10'),
(13, 3, '2025-01-10 22:21', '202501100PETMARKET001', 2, '2025-01-10'),
(14, 3, '2025-01-10 22:27', '202501100PETMARKET001', 2, '2025-01-10'),
(15, 3, '2025-01-10 22:34', '202501100PETMARKET001', 2, '2025-01-10'),
(16, 3, '2025-01-10 22:42', '202501100PETMARKET001', 2, '2025-01-10'),
(17, 3, '2025-01-10 22:50', '202501100PETMARKET001', 2, '2025-01-10'),
(18, 4, '2025-01-10 22:53', '202501100PETMARKET001', 2, '2025-01-10'),
(19, 4, '2025-01-10 22:57', '202501100PETMARKET001', 2, '2025-01-10'),
(20, 4, '2025-01-10 23:06', '202501100PETMARKET001', 2, '2025-01-10'),
(21, 3, '2025-01-10 23:07', '202501100PETMARKET001', 2, '2025-01-10'),
(22, 4, '2025-01-10 23:11', '202501100PETMARKET001', 2, '2025-01-10'),
(23, 4, '2025-01-10 23:27', '202501100PETMARKET001', 2, '2025-01-10'),
(24, 4, '2025-01-10 23:31', '202501100PETMARKET001', 2, '2025-01-10'),
(25, 4, '2025-01-10 23:38', '202501100PETMARKET001', 2, '2025-01-10'),
(26, 4, '2025-01-10 23:42', '202501100PETMARKET001', 2, '2025-01-10'),
(27, 4, '2025-01-10 23:51', '202501100PETMARKET001', 2, '2025-01-10'),
(28, 4, '2025-01-10 23:51', '202501100PETMARKET001', 2, '2025-01-10'),
(29, 4, '2025-01-10 23:53', '202501100PETMARKET001', 2, '2025-01-10'),
(30, 4, '2025-01-10 23:55', '202501100PETMARKET001', 2, '2025-01-10'),
(31, 4, '2025-01-10 23:57', '202501100PETMARKET001', 2, '2025-01-10'),
(32, 4, '2025-01-11 00:00', '202501110PETMARKET001', 2, '2025-01-11'),
(33, 4, '2025-01-12 12:37', '202501120PETMARKET001', 2, '2025-01-12'),
(34, 4, '2025-01-12 12:44', '202501120PETMARKET001', 2, '2025-01-12'),
(35, 4, '2025-01-12 12:52', '202501120PETMARKET001', 2, '2025-01-12'),
(36, 4, '2025-01-12 12:58', '202501120PETMARKET001', 2, '2025-01-12'),
(37, 4, '2025-01-12 13:03', '202501120PETMARKET001', 2, '2025-01-12'),
(38, 4, '2025-01-12 13:05', '202501120PETMARKET001', 2, '2025-01-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `peso` double NOT NULL,
  `fecha_nacimiento` varchar(11) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `tamanio` varchar(12) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_cliente` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `edad`, `peso`, `fecha_nacimiento`, `sexo`, `tamanio`, `estado`, `id_cliente`, `id_raza`) VALUES
(1, 'FIRULAIS', 10, 6.5, '2024-01-10', 'MACHO', 'GRANDE', 1, 1, 1),
(2, 'SOL', 12, 10, '2023-10-25', 'HEMBRA', 'EXTRA GRANDE', 1, 1, 1),
(3, 'Togo', 49, 10, '2020-06-15', 'MACHO', 'MEDIANO', 1, 3, 1),
(4, 'pepo', 13, 6, '2023-10-10', 'MACHO', 'MEDIANO', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `valor` varchar(500) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
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
  `nombre` varchar(500) NOT NULL,
  `id_sintoma` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `nombre`, `id_sintoma`, `estado`) VALUES
(20, 'TEMPERATURA ALTA', 1, 1),
(21, 'TEMPERATURA NORMAL', 1, 1),
(22, 'NO ESTOY SEGURO', 0, 1),
(24, 'CON TERMóMETRO', 1, 1),
(25, 'AL TACTO', 1, 1),
(26, 'NO LA HE MEDIDO', 0, 1),
(28, 'HA DEJADO DE COMER COMPLETAMENTE', 5, 1),
(29, 'COME MENOS DE LO HABITUAL', 5, 1),
(30, 'MANTIENE SU APETITO NORMAL', 0, 1),
(31, 'SOLO HA RECHAZADO SU COMIDA HABITUAL', 5, 1),
(32, 'RECHAZA TODOS LOS ALIMENTOS', 5, 1),
(33, 'SOLO HA REDUCIDO LIGERAMENTE LA CANTIDAD', 0, 1),
(35, 'MUY BAJA ACTIVIDAD', 9, 1),
(36, 'ACTIVIDAD LIGERAMENTE REDUCIDA', 9, 1),
(37, 'ACTIVIDAD NORMAL', 0, 1),
(38, 'DURANTE TODO EL DíA', 9, 1),
(39, 'SOLO EN LAS MAñANAS', 0, 1),
(40, 'SOLO EN LAS TARDES', 0, 1),
(41, 'MUY PáLIDAS', 10, 1),
(42, 'LIGERAMENTE PáLIDAS', 10, 1),
(43, 'DE COLOR ROSADO NORMAL', 0, 1),
(44, 'MUY DéBIL Y CANSADA', 10, 1),
(45, 'LEVEMENTE MENOS ACTIVA', 10, 1),
(46, 'IGUAL DE ACTIVA QUE SIEMPRE', 0, 1),
(47, 'SE LEVANTA CON MUCHA DIFICULTAD', 11, 1),
(48, 'SE LEVANTA CON ALGO DE RIGIDEZ', 11, 1),
(49, 'SE LEVANTA CON NORMALIDAD', 0, 1),
(50, '', 0, 1),
(51, 'EVITA COMPLETAMENTE MOVERSE', 11, 1),
(52, 'SE MUEVE CON PRECAUCIóN', 0, 1),
(53, 'REALIZA SUS ACTIVIDADES NORMALMENTE', 0, 1),
(54, 'BULTOS GRANDES Y NOTORIOS', 12, 1),
(55, 'BULTOS PEQUEñOS Y LEVES', 12, 1),
(56, 'NO HE NOTADO NADA', 0, 1),
(57, 'MUY DOLOROSOS AL TACTO', 12, 1),
(58, 'LEVEMENTE SENSIBLES', 12, 1),
(59, 'NO PARECEN CAUSAR MOLESTIA', 0, 1),
(60, 'SANGRADO ABUNDANTE', 13, 1),
(61, 'SANGRADO LEVE', 13, 1),
(62, 'NO HE OBSERVADO SANGRADO', 0, 1),
(63, 'OCURRE CON MUCHA FRECUENCIA', 13, 1),
(64, 'HA OCURRIDO EN POCAS OCASIONES', 13, 1),
(65, 'SOLO HA SUCEDIDO UNA VEZ', 0, 1),
(66, 'AMARILLENTOS DE FORMA EVIDENTE', 14, 1),
(67, 'LIGERAMENTE AMARILLENTOS', 0, 1),
(68, 'DE COLOR NORMAL', 0, 1),
(69, 'ORINA MUY OSCURA', 14, 1),
(70, 'ORINA LIGERAMENTE MáS OSCURA', 0, 1),
(71, 'ORINA CON COLORACIóN NORMAL', 0, 1),
(72, 'TOTALMENTE LíQUIDAS', 15, 1),
(73, 'SEMILíQUIDAS', 0, 1),
(74, 'NORMALES', 0, 1),
(75, 'MáS DE UN DíA', 15, 1),
(76, 'SOLO UNAS HORAS', 0, 1),
(77, 'NO HA PRESENTADO DIARREA', 0, 1),
(78, 'NO PUEDE APOYAR LA PATA', 8, 1),
(79, 'COJEA LEVEMENTE AL CAMINAR', 8, 1),
(80, 'CAMINA SIN PROBLEMAS', 0, 1),
(81, 'INFLAMACIóN MUY EVIDENTE', 8, 1),
(82, 'LEVE HINCHAZóN', 0, 1),
(83, 'SIN INFLAMACIóN VISIBLE', 0, 1),
(84, 'FRECUENTES E INTENSOS', 16, 1),
(85, 'OCASIONALES Y LEVES', 16, 1),
(86, 'NO HA PRESENTADO TEMBLORES', 0, 1),
(87, 'SOLO EN REPOSO', 0, 1),
(88, 'SOLO DURANTE LA ACTIVIDAD', 0, 1),
(89, 'TANTO EN REPOSO COMO EN ACTIVIDAD', 16, 1),
(90, 'VóMITO FRECUENTE Y ABUNDANTE', 17, 1),
(91, 'VóMITO OCASIONAL', 0, 1),
(92, 'NO HA VOMITADO', 0, 1),
(93, 'ALIMENTOS SIN DIGERIR', 17, 1),
(94, 'SOLO LíQUIDO', 0, 1),
(95, 'NO SE PUEDE DETERMINAR', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintoma`
--

CREATE TABLE `sintoma` (
  `id_sintoma` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sintoma`
--

INSERT INTO `sintoma` (`id_sintoma`, `nombre`, `estado`) VALUES
(1, 'FIEBRE', 1),
(5, 'PERDIDA DE APETITO', 1),
(8, 'COJERA', 1),
(9, 'LETARGO', 1),
(10, 'ANEMIA', 1),
(11, 'DOLOR ARTICULAR', 1),
(12, 'INFLAMACION GANGLIOS', 1),
(13, 'HEMORRAGIA NASAL', 1),
(14, 'ICTERICIA', 1),
(15, 'DIARREA', 1),
(16, 'TEMBLORES MUSCULARES', 1),
(17, 'VOMITO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
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
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
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
-- Indices de la tabla `det_igrupo`
--
ALTER TABLE `det_igrupo`
  ADD PRIMARY KEY (`id_detIgrupo`);

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
  MODIFY `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cab_grupo`
--
ALTER TABLE `cab_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cab_pregunta`
--
ALTER TABLE `cab_pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `det_diagnostico`
--
ALTER TABLE `det_diagnostico`
  MODIFY `id_detdiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `det_grupo`
--
ALTER TABLE `det_grupo`
  MODIFY `id_detgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `det_igrupo`
--
ALTER TABLE `det_igrupo`
  MODIFY `id_detIgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `det_ordenexamen`
--
ALTER TABLE `det_ordenexamen`
  MODIFY `id_detorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id_raza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  MODIFY `id_sintoma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
