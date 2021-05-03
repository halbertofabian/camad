-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-05-2021 a las 18:33:02
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sead`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_caja_cja`
--

CREATE TABLE `tbl_caja_cja` (
  `cja_id_caja` int(11) NOT NULL,
  `cja_nombre` varchar(100) NOT NULL,
  `cja_id_sucursal` varchar(100) NOT NULL,
  `cja_usuario_registro` text NOT NULL,
  `cja_fecha_registro` datetime NOT NULL,
  `cja_uso` char(1) NOT NULL DEFAULT '0',
  `cja_copn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_caja_cja`
--

INSERT INTO `tbl_caja_cja` (`cja_id_caja`, `cja_nombre`, `cja_id_sucursal`, `cja_usuario_registro`, `cja_fecha_registro`, `cja_uso`, `cja_copn_id`) VALUES
(1, 'CAJA 1 MADERO', 'd7a33a4fa6c3c60527abbee3afe843ef', 'Héctor Alberto Lopez Fabian', '2021-01-10 08:42:09', '0', 0),
(2, 'CAJA 2 MADERO', 'd7a33a4fa6c3c60527abbee3afe843ef', 'Héctor Alberto Lopez Fabian', '2021-01-10 10:39:48', '1', 30),
(3, 'CAJA 1 MEXICO', '74460210405f05c5826fb4a89ee89160', 'Héctor Alberto Lopez Fabian', '2021-01-11 10:55:41', '1', 32),
(4, 'CAJA 2 MEXICO', '74460210405f05c5826fb4a89ee89160', 'Héctor Alberto Lopez Fabian', '2021-01-13 01:27:55', '0', 0),
(5, 'c', '2cff89ccbcb6602c5967850d5a5133b6', 'Auditor de prueba', '2021-01-23 06:42:33', '1', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_caja_open_copn`
--

CREATE TABLE `tbl_caja_open_copn` (
  `copn_id` int(11) NOT NULL,
  `copn_ingreso_inicio` double(10,2) DEFAULT NULL,
  `copn_usuario_abrio` int(20) DEFAULT NULL,
  `copn_usuario_cerro` varchar(50) DEFAULT NULL,
  `copn_ingreso_efectivo` double(10,2) DEFAULT NULL,
  `copn_ingreso_banco` double(10,2) DEFAULT NULL,
  `copn_efectivo_real` double(10,2) NOT NULL,
  `copn_banco_real` double(10,2) NOT NULL,
  `copn_fecha_abrio` datetime DEFAULT NULL,
  `copn_fecha_cierre` datetime DEFAULT NULL,
  `copn_usuario_autorizo` text NOT NULL,
  `copn_autorizo` char(1) NOT NULL,
  `copn_id_caja` int(11) DEFAULT NULL,
  `copn_id_sucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_caja_open_copn`
--

INSERT INTO `tbl_caja_open_copn` (`copn_id`, `copn_ingreso_inicio`, `copn_usuario_abrio`, `copn_usuario_cerro`, `copn_ingreso_efectivo`, `copn_ingreso_banco`, `copn_efectivo_real`, `copn_banco_real`, `copn_fecha_abrio`, `copn_fecha_cierre`, `copn_usuario_autorizo`, `copn_autorizo`, `copn_id_caja`, `copn_id_sucursal`) VALUES
(2, 2500.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-11 11:47:23', NULL, '', '', 2, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(3, 3500.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:05:09', NULL, '', '', 2, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(4, 3500.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:06:07', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(5, 7000.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:06:18', NULL, '', '', 2, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(6, 2500.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:06:59', NULL, '', '', 2, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(7, 7000.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:07:04', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(8, 3500.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:09:14', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(9, 0.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:10:00', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(10, 0.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:10:01', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(11, 0.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:10:02', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(12, 0.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:16:43', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(13, 1000.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:24:49', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(14, 1000.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:34:00', NULL, '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(15, 0.00, 71, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 12:44:48', NULL, '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(16, 500.00, 71, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 01:28:08', NULL, '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(17, 500.00, 71, NULL, NULL, NULL, 0.00, 0.00, '2021-01-12 01:29:24', NULL, '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(18, 100.00, 71, 'Juan Herandez Garcia', 3500.00, 2000.00, 3500.00, 2000.00, '2021-01-12 01:48:12', '2021-01-12 12:57:43', '', '', 2, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(19, 100.00, 1, 'Héctor Alberto Lopez Fabian', 700.00, 0.00, 700.00, 0.00, '2021-01-12 01:49:48', '2021-01-12 10:49:24', '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(20, 0.00, 71, 'Juan Herandez Garcia', 3250.00, 4500.00, 2250.00, 4500.00, '2021-01-12 01:02:17', '2021-01-12 01:06:17', '', '', 2, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(21, 0.00, 1, 'Héctor Alberto Lopez Fabian', 440.00, 1900.00, 440.00, 1900.00, '2021-01-13 12:12:55', '2021-01-13 12:50:50', '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(22, 0.00, 1, 'Héctor Alberto Lopez Fabian', 0.00, 0.00, 0.00, 0.00, '2021-01-13 01:37:55', '2021-01-13 01:42:06', '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(23, 0.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-01-13 01:42:52', NULL, '', '', NULL, '74460210405f05c5826fb4a89ee89160'),
(24, 0.00, 1, 'Héctor Alberto Lopez Fabian', 0.00, 0.00, 0.00, 0.00, '2021-01-13 01:46:22', '2021-01-13 03:46:58', '', '', 4, '74460210405f05c5826fb4a89ee89160'),
(25, 500.00, 1, 'Héctor Alberto Lopez Fabian', 0.00, 0.00, 500.00, 0.00, '2021-01-13 03:50:33', '2021-01-13 03:51:51', '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(26, 100.00, 1, 'Héctor Alberto Lopez Fabian', 4100.00, 900.00, 4100.00, 900.00, '2021-01-13 04:28:27', '2021-01-13 05:00:58', '', '', 4, '74460210405f05c5826fb4a89ee89160'),
(27, 1000.00, 1, 'Héctor Alberto Lopez Fabian', 700.00, 0.00, 700.00, 0.00, '2021-01-13 05:05:31', '2021-01-13 05:06:37', '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(28, 0.00, 1, 'Héctor Alberto Lopez Fabian', 0.00, 0.00, 350.00, 0.00, '2021-01-17 11:15:06', '2021-01-18 01:05:49', '', '', 3, '74460210405f05c5826fb4a89ee89160'),
(29, 0.00, 1, 'Héctor Alberto Lopez Fabian', 5050.00, 0.00, 5050.00, 0.00, '2021-01-18 01:06:05', '2021-01-31 10:05:30', '', '', 1, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(30, 0.00, 71, NULL, NULL, NULL, 0.00, 0.00, '2021-01-18 03:59:56', NULL, '', '', 2, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(31, 0.00, 82, NULL, NULL, NULL, 0.00, 0.00, '2021-01-23 06:42:39', NULL, '', '', 5, '2cff89ccbcb6602c5967850d5a5133b6'),
(32, 0.00, 1, NULL, NULL, NULL, 0.00, 0.00, '2021-03-07 09:23:07', NULL, '', '', 3, '74460210405f05c5826fb4a89ee89160');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria_gastos_gts`
--

CREATE TABLE `tbl_categoria_gastos_gts` (
  `gts_id` int(11) NOT NULL,
  `gts_nombre` varchar(100) NOT NULL,
  `gts_presupuesto` double(8,2) DEFAULT NULL,
  `gts_id_sucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_categoria_gastos_gts`
--

INSERT INTO `tbl_categoria_gastos_gts` (`gts_id`, `gts_nombre`, `gts_presupuesto`, `gts_id_sucursal`) VALUES
(3, 'Gastos administrativo', 0.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cortes_cts`
--

CREATE TABLE `tbl_cortes_cts` (
  `cts_id` int(11) NOT NULL,
  `cts_fecha_registro` datetime NOT NULL,
  `cts_usuario_registro` text NOT NULL,
  `cts_usuario_autorizo` text NOT NULL,
  `cts_fecha_autorizo` datetime NOT NULL,
  `cts_nota` text NOT NULL,
  `cts_detalle` text NOT NULL,
  `cts_estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cupones_cps`
--

CREATE TABLE `tbl_cupones_cps` (
  `cps_codigo` varchar(100) NOT NULL,
  `cps_nombre` text DEFAULT NULL,
  `cps_asociado` text DEFAULT NULL,
  `cps_fecha_inicio` datetime DEFAULT NULL,
  `cps_fecha_fin` datetime DEFAULT NULL,
  `cps_tope` varchar(10) DEFAULT NULL,
  `cps_uso` int(11) DEFAULT 0,
  `cps_usuario_registro` text DEFAULT NULL,
  `cps_fecha_registro` datetime DEFAULT NULL,
  `cps_sku_producto` text DEFAULT NULL,
  `cps_restricciones` text DEFAULT NULL,
  `cps_estado` varchar(1) DEFAULT '1',
  `cps_descuento_pagos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cupones_cps`
--

INSERT INTO `tbl_cupones_cps` (`cps_codigo`, `cps_nombre`, `cps_asociado`, `cps_fecha_inicio`, `cps_fecha_fin`, `cps_tope`, `cps_uso`, `cps_usuario_registro`, `cps_fecha_registro`, `cps_sku_producto`, `cps_restricciones`, `cps_estado`, `cps_descuento_pagos`) VALUES
('BECA_50', 'BECA SEAD ', 'sin_vendedor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '-', 0, 'Héctor Alberto Lopez Fabian', '2021-02-09 12:56:30', 'all_paquetes', '{\"aply\":{\"tipo\":\"all_student\",\"data\":\"\"},\"cupon\":{\"cps_r_inscripcion\":\"0\",\"cps_r_examen\":\"0\",\"cps_r_guia\":\"0\",\"cps_r_incorporacion\":\"0\",\"cps_r_certificado\":\"0\",\"cps_r_semanas\":\"0\"}}', '1', '[\"50\",\"40\",\"30\",\"25\",\"\",\"15\"]'),
('BECA_UNICA', 'CUPON BECA 60', 'sin_vendedor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '-', 0, 'Héctor Alberto Lopez Fabian', '2021-02-09 01:04:19', 'all_paquetes', '{\"aply\":{\"tipo\":\"all_student\",\"data\":\"\"},\"cupon\":{\"cps_r_inscripcion\":\"0\",\"cps_r_examen\":\"0\",\"cps_r_guia\":\"0\",\"cps_r_incorporacion\":\"0\",\"cps_r_certificado\":\"0\",\"cps_r_semanas\":\"0\"}}', '1', '[\"60\",\"\",\"\",\"\",\"\",\"\"]'),
('P-1', 'CUPON PRUEBA', 'sin_vendedor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '8', 2, 'Héctor Alberto Lopez Fabian', '2021-01-05 02:55:21', 'all_paquetes', '{\"aply\":{\"tipo\":\"all_student\",\"data\":\"\"},\"cupon\":{\"cps_r_inscripcion\":\"50\",\"cps_r_examen\":\"0\",\"cps_r_guia\":\"0\",\"cps_r_incorporacion\":\"0\",\"cps_r_certificado\":\"0\",\"cps_r_semanas\":\"0\"}}', '1', '[\"50\",\"40\",\"30\",\"25\",\"20\",\"15\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ficha_pago_fpg`
--

CREATE TABLE `tbl_ficha_pago_fpg` (
  `fpg_id` int(11) NOT NULL,
  `fpg_alumno` int(20) DEFAULT NULL,
  `fpg_paquete` varchar(100) DEFAULT NULL,
  `fpg_inscripcion` double DEFAULT NULL,
  `fpg_examen` double DEFAULT NULL,
  `fpg_guia` double DEFAULT NULL,
  `fpg_incorporacion` double DEFAULT NULL,
  `fpg_certificado` double DEFAULT NULL,
  `fpg_semana` double DEFAULT NULL,
  `fpg_numero_semana` int(11) DEFAULT NULL,
  `fpg_pago_online` text NOT NULL,
  `fpg_liga` text DEFAULT NULL,
  `fpg_usuario_registro` text DEFAULT NULL,
  `fpg_fecha_registro` datetime DEFAULT NULL,
  `fpg_estado` varchar(1) DEFAULT '1',
  `fpg_id_sucursal` varchar(100) DEFAULT NULL,
  `fpg_cupon` text DEFAULT NULL,
  `fpg_cupon_detalle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_ficha_pago_fpg`
--

INSERT INTO `tbl_ficha_pago_fpg` (`fpg_id`, `fpg_alumno`, `fpg_paquete`, `fpg_inscripcion`, `fpg_examen`, `fpg_guia`, `fpg_incorporacion`, `fpg_certificado`, `fpg_semana`, `fpg_numero_semana`, `fpg_pago_online`, `fpg_liga`, `fpg_usuario_registro`, `fpg_fecha_registro`, `fpg_estado`, `fpg_id_sucursal`, `fpg_cupon`, `fpg_cupon_detalle`) VALUES
(30, 72, 'PREPA_EXPRESS', 1800, 2000, 300, 1300, 4500, 0, 4, '', '', 'Juan Herandez Garcia', '2021-01-04 10:11:51', '1', 'ST-5eda37ea1f6680605459bc0a773e5d3d', NULL, NULL),
(31, 73, 'PREPA_EXPRESS', 1800, 2000, 300, 1300, 4500, 0, 4, '', '', 'Juan Herandez Garcia', '2021-01-04 10:19:40', '1', 'ST-5eda37ea1f6680605459bc0a773e5d3d', NULL, NULL),
(34, 75, 'PREPA_EXPRESS', 1800, 2000, 300, 1300, 4500, 0, 4, '', '', 'Héctor Alberto Lopez Fabian', '2021-01-05 01:24:37', '1', '74460210405f05c5826fb4a89ee89160', NULL, NULL),
(35, 76, 'PREPA_EXPRESS', 1800, 2000, 300, 1300, 4500, 0, 4, '', '', 'Juan Herandez Garcia', '2021-01-05 02:25:29', '1', 'd7a33a4fa6c3c60527abbee3afe843ef', NULL, NULL),
(36, 77, 'PREPA_EXPRESS', 1800, 2000, 300, 1300, 4500, 0, 4, '', '', 'Héctor Alberto Lopez Fabian', '2021-01-05 02:39:03', '1', 'd7a33a4fa6c3c60527abbee3afe843ef', NULL, NULL),
(37, 75, 'pauqte_prueba', 44, 4, 4, 4, 4, 350, 4, '', '', 'Héctor Alberto Lopez Fabian', '2021-01-17 11:14:48', '1', '74460210405f05c5826fb4a89ee89160', NULL, NULL),
(42, 85, 'PREPA_EXPRESS_ONLINE', 1400, 2800, 420, 2520, 3150, 0, 4, '{\"PAGOS\":3,\"TOTAL\":\"14,700.00\",\"DESCUENTO\":\"30\",\"TOTAL-DESCUENTO\":\"3,430.00\",\"TOTAL-PAGO\":\"10,290.00\"}', '', 'REGISTRO ONLINE', '2021-02-14 02:34:47', '1', '9f3b645d6b56fd6e1b79e9b92b903ea5', NULL, NULL),
(43, 86, 'PREPA_EXPRESS_ONLINE', 1200, 2400, 360, 2160, 2700, 0, 4, '{\"PAGOS\":2,\"TOTAL\":\"14,700.00\",\"DESCUENTO\":\"40\",\"TOTAL-DESCUENTO\":\"4,410.00\",\"TOTAL-PAGO\":\"8,820.00\"}', '', 'REGISTRO ONLINE', '2021-02-14 07:56:52', '1', '9f3b645d6b56fd6e1b79e9b92b903ea5', NULL, NULL),
(44, 77, 'paquete_1_examen', 1800, 500, 500, 3333, 5000, 0, 4, '', '', 'Héctor Alberto Lopez Fabian', '2021-03-07 12:26:59', '1', 'd7a33a4fa6c3c60527abbee3afe843ef', NULL, NULL),
(45, 90, 'paquete_1_examen', 1800, 500, 500, 3333, 5000, 0, 4, '', '', 'Héctor Alberto Lopez Fabian', '2021-03-07 12:42:31', '1', 'd7a33a4fa6c3c60527abbee3afe843ef', NULL, NULL),
(46, 91, 'paquete_1_examen', 1800, 500, 500, 3333, 5000, 0, 4, '', '', 'Héctor Alberto Lopez Fabian', '2021-03-07 09:16:02', '1', '74460210405f05c5826fb4a89ee89160', NULL, NULL),
(47, 92, 'Paquete_de_prueba', 1530, 1275, 195.5, 1530, 3825, 424.15, 17, '{\"PAGOS\":6,\"TOTAL\":\"18,313.00\",\"DESCUENTO\":\"15\",\"TOTAL-DESCUENTO\":\"2,594.34\",\"TOTAL-PAGO\":\"15,566.05\"}', '', 'REGISTRO ONLINE', '2021-03-31 10:43:13', '1', '9f3b645d6b56fd6e1b79e9b92b903ea5', NULL, NULL),
(48, 93, 'Paquete_de_prueba', 1530, 1275, 195.5, 1530, 3825, 424.15, 17, '{\"PAGOS\":6,\"TOTAL\":\"18,313.00\",\"DESCUENTO\":\"15\",\"TOTAL-DESCUENTO\":\"2,594.34\",\"TOTAL-PAGO\":\"15,566.05\"}', '', 'REGISTRO ONLINE', '2021-03-31 12:34:32', '1', '9f3b645d6b56fd6e1b79e9b92b903ea5', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ficha_venta_vfch`
--

CREATE TABLE `tbl_ficha_venta_vfch` (
  `vfch_id` varchar(100) NOT NULL,
  `vfch_referencia` text NOT NULL,
  `vfch_monto` double DEFAULT NULL,
  `vfch_mp` text DEFAULT NULL,
  `vfch_sub_monto` double DEFAULT NULL,
  `vfch_descuento` text DEFAULT NULL,
  `vfch_fecha_registro` datetime DEFAULT NULL,
  `vfch_fecha_pagada` datetime DEFAULT NULL,
  `vfch_alumno` varchar(20) DEFAULT NULL,
  `vfch_ficha_pago` int(11) NOT NULL,
  `vfch_usuario_registro` text DEFAULT NULL,
  `vfch_estado` varchar(100) DEFAULT 'PENDIENTE',
  `vfch_solicitud_cancelacion` char(1) NOT NULL DEFAULT '0',
  `vfch_justificacion` text NOT NULL,
  `vfch_fecha_solicitud` datetime NOT NULL,
  `vfch_usuario_solicito` text NOT NULL,
  `vfch_fecha_aprobacion` datetime NOT NULL,
  `vfch_usuario_aprobo` text NOT NULL,
  `vfch_id_sucursal` varchar(100) NOT NULL,
  `vfch_id_corte` varchar(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_ficha_venta_vfch`
--

INSERT INTO `tbl_ficha_venta_vfch` (`vfch_id`, `vfch_referencia`, `vfch_monto`, `vfch_mp`, `vfch_sub_monto`, `vfch_descuento`, `vfch_fecha_registro`, `vfch_fecha_pagada`, `vfch_alumno`, `vfch_ficha_pago`, `vfch_usuario_registro`, `vfch_estado`, `vfch_solicitud_cancelacion`, `vfch_justificacion`, `vfch_fecha_solicitud`, `vfch_usuario_solicito`, `vfch_fecha_aprobacion`, `vfch_usuario_aprobo`, `vfch_id_sucursal`, `vfch_id_corte`) VALUES
('0001', '', NULL, NULL, NULL, NULL, '2021-01-04 10:23:00', NULL, NULL, 0, 'Juan Herandez Garcia', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0002', '', 800, 'EFECTIVO', 800, '', '2021-01-04 10:25:06', '2021-01-04 10:25:31', 'ST-0072', 30, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0003', '6365643633', 1300, 'DEPOSITO', 1300, '', '2021-01-05 12:52:58', '2021-01-05 12:53:29', 'ST-0073', 31, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0004', '', 1200, 'EFECTIVO', 1200, '', '2021-01-05 01:36:14', '2021-01-05 01:36:39', 'SM-0074', 34, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '1'),
('0005', '', 300, 'EFECTIVO', 300, '', '2021-01-05 02:05:39', '2021-01-05 02:06:04', 'ST-0072', 30, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0006', '', NULL, NULL, NULL, NULL, '2021-01-05 02:11:46', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0007', '', 1500, 'EFECTIVO', 1500, '', '2021-01-05 02:18:04', '2021-01-05 02:18:26', 'ST-0072', 30, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0008', '', 1250, 'EFECTIVO', 1250, '', '2021-01-05 02:20:03', '2021-01-05 02:20:21', 'ST-0072', 30, 'Héctor Alberto Lopez Fabian', 'CANCELADO', '2', 'Se equivoco el asesor educativod', '2021-01-05 10:58:30', 'Héctor Alberto Lopez Fabian', '2021-01-05 02:01:51', 'Héctor Alberto Lopez Fabian', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0009', '', 250, 'EFECTIVO', 250, '', '2021-01-05 02:21:30', '2021-01-05 02:21:43', 'ST-0072', 30, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0010', '', 1200, 'EFECTIVO', 1200, '', '2021-01-05 02:28:07', '2021-01-05 02:28:48', 'SMD-0076', 35, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0011', '', 1150, 'EFECTIVO', 1150, '', '2021-01-05 02:40:51', '2021-01-05 02:41:07', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'CANCELADO', '2', 'Me equivoque', '2021-01-05 09:39:50', '', '2021-01-05 09:40:42', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0012', '', 950, 'EFECTIVO', 950, '', '2021-01-05 02:41:38', '2021-01-05 02:41:52', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'CANCELADO', '2', 'Me equivoque de alumno', '2021-01-05 02:42:53', 'Héctor Alberto Lopez Fabian', '2021-01-05 02:46:30', 'Héctor Alberto Lopez Fabian', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0013', '', NULL, NULL, NULL, NULL, '2021-01-05 02:50:36', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0014', '', 100, 'EFECTIVO', 200, 'P-1', '2021-01-05 02:55:45', '2021-01-05 02:57:07', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0015', '', 150, 'EFECTIVO', 300, 'P-1', '2021-01-05 02:57:23', '2021-01-05 03:00:36', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0016', '', 1300, 'EFECTIVO', 1300, '', '2021-01-05 09:46:33', '2021-01-05 09:46:49', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'CANCELADO', '2', 'Se equivoco', '2021-01-05 09:50:46', 'Héctor Alberto Lopez Fabian', '2021-01-06 12:15:00', 'Enrique Gonzales', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0017', '', NULL, NULL, NULL, NULL, '2021-01-05 11:19:01', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '1'),
('0018', '', 900, 'EFECTIVO', 900, '', '2021-01-05 11:23:09', '2021-01-05 11:23:24', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '1'),
('0019', '', NULL, NULL, NULL, NULL, '2021-01-05 11:24:19', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '1'),
('0020', '', NULL, NULL, NULL, NULL, '2021-01-05 11:25:06', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d', '1'),
('0021', '', NULL, NULL, NULL, NULL, '2021-01-05 11:25:36', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '1'),
('0022', '', 750, 'EFECTIVO', 750, '', '2021-01-05 11:29:10', '2021-01-05 11:29:47', 'ST-0072', 30, 'Héctor Alberto Lopez Fabian', 'CANCELADO', '2', 'ok', '2021-01-06 11:30:30', 'Héctor Alberto Lopez Fabian', '2021-01-06 11:31:14', 'Héctor Alberto Lopez Fabian', '74460210405f05c5826fb4a89ee89160', '1'),
('0023', '', 400, 'EFECTIVO', 400, '', '2021-01-05 11:31:37', '2021-01-05 11:32:08', 'SM-0074', 34, 'Héctor Alberto Lopez Fabian', 'CANCELADO', '2', 'Me equivoque', '2021-01-06 12:03:31', 'Juan Herandez Garcia', '2021-01-06 12:11:29', 'Enrique Gonzales', '74460210405f05c5826fb4a89ee89160', '1'),
('0024', '', 900, 'EFECTIVO', 900, '', '2021-01-09 02:51:50', '2021-01-09 02:52:00', 'SM-0074', 34, 'Responsable', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '1'),
('0025', '', 300, 'EFECTIVO', 300, '', '2021-01-09 02:52:25', '2021-01-09 02:52:43', 'SM-0074', 34, 'Responsable', 'CANCELADO', '2', 'Se equivoco en el pago', '2021-01-09 02:53:58', 'Responsable', '2021-01-09 02:57:46', 'Responsable', '74460210405f05c5826fb4a89ee89160', '1'),
('0026', '368536533', 2000, 'DEPOSITO', 2000, '', '2021-01-09 04:51:51', '2021-01-09 04:52:07', 'SM-0074', 34, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '1'),
('0027', '', NULL, NULL, NULL, NULL, '2021-01-12 12:26:00', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '1'),
('0028', '', 500, 'EFECTIVO', 500, '', '2021-01-12 12:27:00', '2021-01-12 12:27:15', 'SM-0074', 34, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '13'),
('0029', '', 2200, 'EFECTIVO', 2200, '', '2021-01-12 01:48:28', '2021-01-12 01:48:42', 'SMD-0076', 35, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '18'),
('0030', '', 700, 'EFECTIVO', 700, '', '2021-01-12 01:49:59', '2021-01-12 01:50:09', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '19'),
('0031', '', 1300, 'EFECTIVO', 1300, '', '2021-01-12 10:00:49', '2021-01-12 10:01:23', 'SM-0074', 34, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '18'),
('0032', '6456745645644', 2000, 'TRANSFERENCIA', 2000, '', '2021-01-12 10:11:17', '2021-01-12 10:11:41', 'SMD-0077', 36, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '18'),
('0033', '', 1250, 'EFECTIVO', 1250, '', '2021-01-12 01:02:57', '2021-01-12 01:03:26', 'SMD-0077', 36, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '20'),
('0034', '', NULL, NULL, NULL, NULL, '2021-01-12 01:03:37', NULL, NULL, 0, 'Juan Herandez Garcia', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '20'),
('0035', '', 1000, 'EFECTIVO', 1000, '', '2021-01-12 01:04:30', '2021-01-12 01:04:43', 'SMD-0076', 35, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '20'),
('0036', '76756545454', 4500, 'DEPOSITO', 4500, '', '2021-01-12 01:04:59', '2021-01-12 01:05:15', 'SMD-0076', 35, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '20'),
('0037', '6657676657', 2000, 'TRANSFERENCIA', 2000, '', '2021-01-13 12:44:35', '2021-01-13 12:44:53', 'SM-0074', 34, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '21'),
('0038', '', 1500, 'EFECTIVO', 1500, '', '2021-01-13 04:28:35', '2021-01-13 04:28:55', 'SM-0074', 34, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '26'),
('0039', '677777888888', 500, 'TRANSFERENCIA', 500, '', '2021-01-13 04:29:10', '2021-01-13 04:29:21', 'SM-0074', 34, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '26'),
('0040', '', 350, 'EFECTIVO', 350, '', '2021-01-17 11:15:16', '2021-01-17 11:15:24', 'SM-0074', 37, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '28'),
('0041', '', NULL, NULL, NULL, NULL, '2021-01-18 12:46:41', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '28'),
('0042', '', 4000, 'EFECTIVO', 4000, '', '2021-01-18 01:39:19', '2021-01-18 01:39:33', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '29'),
('0043', '', NULL, NULL, NULL, NULL, '2021-01-18 01:52:10', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '29'),
('0044', '', NULL, NULL, NULL, NULL, '2021-01-18 02:14:27', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '29'),
('0045', '', 550, 'EFECTIVO', 550, '', '2021-01-18 02:14:37', '2021-01-18 02:14:46', 'SMD-0077', 36, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '29'),
('0046', '', 500, 'EFECTIVO', 500, '', '2021-01-18 03:49:19', '2021-01-18 03:50:56', 'SMD-0076', 35, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '29'),
('0047', '', 250, 'EFECTIVO', 250, '', '2021-01-18 04:00:22', '2021-01-18 04:00:32', 'SMD-0076', 35, 'Juan Herandez Garcia', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'd7a33a4fa6c3c60527abbee3afe843ef', '30'),
('0048', '', NULL, NULL, NULL, NULL, '2021-02-14 04:58:15', NULL, NULL, 0, 'REGISTRO ONLINE', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0049', 'k2k5zdmh2xr1dxqbuaxf', 3430, 'Tarjeta', 4900, '30', '2021-02-14 06:42:18', '2021-02-14 06:42:18', 'pb0083', 42, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0050', 'kvwjenvil3y6ujxjtln2', 3430, 'Tarjeta', 4900, '30', '2021-02-14 06:59:42', '2021-02-14 06:59:42', 'pb0083', 42, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0051', 'k0iam2aw9hfq4kej49zi', 3430, 'Tarjeta', 4900, '30', '2021-02-14 07:03:11', '2021-02-14 07:03:11', 'pb0083', 42, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0052', 'k07ql7gzyvawtwjthqre', 3430, 'Tarjeta', 4900, '30', '2021-02-14 07:05:05', '2021-02-14 07:05:05', 'pb0083', 42, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0053', 'k0wkjtalumxbjkfyn2y4', 4410, 'Tarjeta', 7350, '40', '2021-02-14 07:57:20', '2021-02-14 07:57:20', 'pb0086', 43, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0054', 'kftsid95a8sgqhwmhccs', 4410, 'Tarjeta', 7350, '40', '2021-02-15 09:07:09', '2021-02-15 09:07:09', 'pb0086', 43, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0055', '', 1800, 'EFECTIVO', 1800, '', '2021-03-07 09:23:17', '2021-03-07 09:23:36', 'SM-0091', 46, 'Héctor Alberto Lopez Fabian', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '32'),
('0056', '', NULL, NULL, NULL, NULL, '2021-03-07 09:24:22', NULL, NULL, 0, 'Héctor Alberto Lopez Fabian', 'PENDIENTE', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '74460210405f05c5826fb4a89ee89160', '32'),
('0057', 'ch_1Ib8wTLLBkZC6OyUfqIOnTho', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 12:38:59', '2021-03-31 12:38:59', 'pb0093', 48, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0058', 'ch_1Ib92mLLBkZC6OyUvj0hq4Xs', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 12:45:30', '2021-03-31 12:45:30', 'pb0093', 48, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0059', 'ch_1Ib98nLLBkZC6OyUsluDoYYV', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 12:51:43', '2021-03-31 12:51:43', 'pb0093', 48, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0060', 'ch_1Ib9DnLLBkZC6OyUtu9QCJwD', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 12:56:53', '2021-03-31 12:56:53', 'pb0093', 48, 'REGISTRO ONLINE', 'CANCELADO', '2', 'Cargo no reconocido', '2021-03-31 01:19:08', 'Héctor Alberto Lopez Fabian', '2021-03-31 01:19:47', 'Héctor Alberto Lopez Fabian', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0061', 'ch_1Ib9O6LLBkZC6OyUgi3KHiyn', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 01:07:33', '2021-03-31 01:07:33', 'pb0093', 48, 'REGISTRO ONLINE', 'CANCELADO', '2', 'Cargo no reconocido', '2021-03-31 01:22:24', 'Héctor Alberto Lopez Fabian', '2021-03-31 01:22:32', 'Héctor Alberto Lopez Fabian', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0062', 'ch_1Ib9VyLLBkZC6OyU8AsKtUXe', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 01:15:41', '2021-03-31 01:15:41', 'pb0093', 48, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0063', 'ch_1Ib9aYLLBkZC6OyUFSK1czfy', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 01:20:24', '2021-03-31 01:20:24', 'pb0093', 48, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE'),
('0064', 'ch_1Ib9cuLLBkZC6OyUzPUZxWBD', 2594.34, 'Tarjeta', 3052.1666666667, '15', '2021-03-31 01:22:51', '2021-03-31 01:22:51', 'pb0093', 48, 'REGISTRO ONLINE', 'PAGADO', '0', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '9f3b645d6b56fd6e1b79e9b92b903ea5', 'ONLINE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gastos_tgts`
--

CREATE TABLE `tbl_gastos_tgts` (
  `tgts_id` int(11) NOT NULL,
  `tgts_categoria` int(11) NOT NULL,
  `tgts_concepto` text NOT NULL,
  `tgts_fecha_gasto` datetime NOT NULL,
  `tgts_cantidad` double(8,2) NOT NULL,
  `tgts_mp` varchar(50) NOT NULL,
  `tgts_nota` text DEFAULT NULL,
  `tgts_estado_borrado` char(1) DEFAULT '0',
  `tgts_usuario_registro` varchar(50) DEFAULT NULL,
  `tgts_id_sucursal` varchar(100) NOT NULL,
  `tgts_id_corte` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_gastos_tgts`
--

INSERT INTO `tbl_gastos_tgts` (`tgts_id`, `tgts_categoria`, `tgts_concepto`, `tgts_fecha_gasto`, `tgts_cantidad`, `tgts_mp`, `tgts_nota`, `tgts_estado_borrado`, `tgts_usuario_registro`, `tgts_id_sucursal`, `tgts_id_corte`) VALUES
(6, 3, 'Renta', '2021-01-09 00:00:00', 2500.00, 'TRANSFERENCIA', '', '0', 'Héctor Alberto Lopez Fabian', 'd7a33a4fa6c3c60527abbee3afe843ef', 1),
(7, 3, 'Luz', '2021-01-09 00:00:00', 1200.00, 'EFECTIVO', '', '0', 'Héctor Alberto Lopez Fabian', 'd7a33a4fa6c3c60527abbee3afe843ef', 1),
(10, 3, 'Pago de luz', '2021-01-13 12:18:19', 560.00, 'EFECTIVO', '', '0', 'Héctor Alberto Lopez Fabian', '74460210405f05c5826fb4a89ee89160', 21),
(11, 3, 'Agua', '2021-01-13 12:42:57', 200.00, 'DEPOSITO', 'r4333335555', '0', 'Héctor Alberto Lopez Fabian', '74460210405f05c5826fb4a89ee89160', 21),
(12, 3, 'qUINCENA', '2021-01-13 04:33:38', 1000.00, 'EFECTIVO', '', '0', 'Héctor Alberto Lopez Fabian', '74460210405f05c5826fb4a89ee89160', 26),
(13, 3, 'ok', '2021-01-13 04:35:03', 100.00, 'DEPOSITO', '', '0', 'Héctor Alberto Lopez Fabian', '74460210405f05c5826fb4a89ee89160', 26),
(14, 3, 'Agua', '2021-01-13 05:06:01', 300.00, 'EFECTIVO', '', '0', 'Héctor Alberto Lopez Fabian', '74460210405f05c5826fb4a89ee89160', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ingresos_igs`
--

CREATE TABLE `tbl_ingresos_igs` (
  `igs_id` int(11) NOT NULL,
  `igs_concepto` text NOT NULL,
  `igs_monto` double(10,2) NOT NULL,
  `igs_fecha_registro` datetime NOT NULL,
  `igs_usuario_registro` text NOT NULL,
  `igs_mp` text NOT NULL,
  `igs_id_sucursal` varchar(100) NOT NULL,
  `igs_id_corte` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_ingresos_igs`
--

INSERT INTO `tbl_ingresos_igs` (`igs_id`, `igs_concepto`, `igs_monto`, `igs_fecha_registro`, `igs_usuario_registro`, `igs_mp`, `igs_id_sucursal`, `igs_id_corte`) VALUES
(3, 'Venta de examen efectivo', 1000.00, '2021-01-09 00:00:00', 'Héctor Alberto Lopez Fabian', 'EFECTIVO', '74460210405f05c5826fb4a89ee89160', 1),
(4, 'Venta examen Deposito', 1000.00, '2021-01-09 00:00:00', 'Héctor Alberto Lopez Fabian', 'TARJETA', '74460210405f05c5826fb4a89ee89160', 1),
(5, 'Gastos del plantel', 3700.00, '2021-01-09 00:00:00', 'Héctor Alberto Lopez Fabian', 'EFECTIVO', 'd7a33a4fa6c3c60527abbee3afe843ef', 1),
(6, 'x', 100.00, '2021-01-09 06:01:39', 'Héctor Alberto Lopez Fabian', 'DEPOSITO', '74460210405f05c5826fb4a89ee89160', 1),
(9, 'Un concepto x', 1000.00, '2021-01-13 12:13:28', 'Héctor Alberto Lopez Fabian', 'EFECTIVO', '74460210405f05c5826fb4a89ee89160', 21),
(10, 'Pago en linea', 100.00, '2021-01-13 12:20:34', 'Héctor Alberto Lopez Fabian', 'TARJETA', '74460210405f05c5826fb4a89ee89160', 21),
(11, 'V', 3500.00, '2021-01-13 04:33:17', 'Héctor Alberto Lopez Fabian', 'EFECTIVO', '74460210405f05c5826fb4a89ee89160', 26),
(12, 'x', 500.00, '2021-01-13 04:34:46', 'Héctor Alberto Lopez Fabian', 'DEPOSITO', '74460210405f05c5826fb4a89ee89160', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_medios_mds`
--

CREATE TABLE `tbl_medios_mds` (
  `mds_id` int(11) NOT NULL,
  `mds_tipo` text DEFAULT NULL,
  `mds_nombre` text DEFAULT NULL,
  `mds_titulo` text DEFAULT NULL,
  `mds_texto_alternativo` text DEFAULT NULL,
  `mds_leyenda` text DEFAULT NULL,
  `mds_descripcion` text DEFAULT NULL,
  `mds_url` text DEFAULT NULL,
  `mds_fecha_subida` datetime DEFAULT NULL,
  `mds_usuario_registro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paquetes_pagos_ppg`
--

CREATE TABLE `tbl_paquetes_pagos_ppg` (
  `ppg_id` int(11) NOT NULL,
  `ppg_ficha_pago` int(11) DEFAULT NULL,
  `ppg_ficha_venta` varchar(100) NOT NULL,
  `ppg_monto` double DEFAULT NULL,
  `ppg_descuento` double NOT NULL,
  `ppg_total` double NOT NULL,
  `ppg_fecha_registro` datetime DEFAULT NULL,
  `ppg_concepto` text DEFAULT NULL,
  `ppg_referencia` text NOT NULL,
  `ppg_usuario_registro` text DEFAULT NULL,
  `ppg_adeudo` double DEFAULT NULL,
  `ppg_estado_pagado` varchar(100) DEFAULT 'PENDIENTE',
  `ppg_fecha_pagado` datetime DEFAULT NULL,
  `ppg_mp` text DEFAULT NULL,
  `ppg_id_sucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_paquetes_pagos_ppg`
--

INSERT INTO `tbl_paquetes_pagos_ppg` (`ppg_id`, `ppg_ficha_pago`, `ppg_ficha_venta`, `ppg_monto`, `ppg_descuento`, `ppg_total`, `ppg_fecha_registro`, `ppg_concepto`, `ppg_referencia`, `ppg_usuario_registro`, `ppg_adeudo`, `ppg_estado_pagado`, `ppg_fecha_pagado`, `ppg_mp`, `ppg_id_sucursal`) VALUES
(239, 30, '0002', 800, 0, 800, '2021-01-04 10:25:24', 'PPG_INSCRIPCION', '', 'Juan Herandez Garcia', 1000, 'PAGADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(240, 31, '0003', 1000, 0, 1000, '2021-01-05 12:53:07', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 800, 'PAGADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(241, 31, '0003', 300, 0, 300, '2021-01-05 12:53:14', 'PPG_GUIA', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(244, 34, '0004', 900, 0, 800, '2021-01-05 01:36:35', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 900, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(245, 34, '0004', 300, 0, 300, '2021-01-05 01:36:24', 'PPG_GUIA', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(246, 30, '0005', 300, 0, 300, '2021-01-05 02:05:59', 'PPG_GUIA', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(247, 30, '0007', 1500, 0, 1500, '2021-01-05 02:18:16', 'PPG_EXAMEN', '', 'Héctor Alberto Lopez Fabian', 500, 'PAGADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(248, 30, '0008', 250, 0, 250, '2021-01-05 02:20:10', 'PPG_EXAMEN', '', 'Héctor Alberto Lopez Fabian', 250, 'CANCELADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(249, 30, '0008', 1000, 0, 1000, '2021-01-05 02:20:14', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 0, 'CANCELADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(250, 30, '0009', 250, 0, 250, '2021-01-05 02:21:35', 'PPG_EXAMEN', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(251, 35, '0010', 900, 0, 900, '2021-01-05 02:28:25', 'PPG_INSCRIPCION', '', 'Juan Herandez Garcia', 900, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(252, 35, '0010', 300, 0, 300, '2021-01-05 02:28:26', 'PPG_GUIA', '', 'Juan Herandez Garcia', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(253, 36, '0011', 1000, 0, 1000, '2021-01-05 02:40:58', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 800, 'CANCELADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(254, 36, '0011', 150, 0, 150, '2021-01-05 02:41:02', 'PPG_GUIA', '', 'Héctor Alberto Lopez Fabian', 150, 'CANCELADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(255, 36, '0012', 150, 0, 150, '2021-01-05 02:41:42', 'PPG_GUIA', '', 'Héctor Alberto Lopez Fabian', 0, 'CANCELADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(256, 36, '0012', 800, 0, 800, '2021-01-05 02:41:44', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 0, 'CANCELADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(257, 36, '0014', 200, 50, 100, '2021-01-05 02:56:23', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 600, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(258, 36, '0015', 300, 50, 150, '2021-01-05 02:57:38', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 300, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(259, 36, '0016', 1300, 0, 1300, '2021-01-05 09:46:44', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 0, 'CANCELADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(260, 36, '0018', 900, 0, 900, '2020-12-01 00:59:59', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 900, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(261, 30, '0022', 250, 0, 250, '2021-01-05 11:29:36', 'PPG_EXAMEN', '', 'Héctor Alberto Lopez Fabian', 0, 'CANCELADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(262, 30, '0022', 500, 0, 500, '2021-01-05 11:29:41', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 500, 'CANCELADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(263, 34, '0023', 400, 0, 400, '2021-01-05 11:32:03', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 500, 'CANCELADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(264, 34, '0024', 900, 0, 900, '2021-01-09 02:51:54', 'PPG_INSCRIPCION', '', 'Responsable', 0, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(265, 34, '0025', 300, 0, 300, '2021-01-09 02:52:38', 'PPG_INCORPORACION', '', 'Responsable', 1000, 'CANCELADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(266, 34, '0026', 2000, 0, 2000, '2021-01-09 04:51:57', 'PPG_EXAMEN', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(267, 34, '0028', 500, 0, 500, '2021-01-12 12:27:09', 'PPG_CERTIFICADO', '', 'Héctor Alberto Lopez Fabian', 4000, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(268, 35, '0029', 900, 0, 900, '2021-01-12 01:48:32', 'PPG_INSCRIPCION', '', 'Juan Herandez Garcia', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(269, 35, '0029', 1300, 0, 1300, '2021-01-12 01:48:35', 'PPG_INCORPORACION', '', 'Juan Herandez Garcia', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(270, 36, '0030', 400, 0, 400, '2021-01-12 01:50:02', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(271, 36, '0030', 300, 0, 300, '2021-01-12 01:50:05', 'PPG_GUIA', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(272, 34, '0031', 1300, 0, 1300, '2021-01-12 10:01:16', 'PPG_INCORPORACION', '', 'Juan Herandez Garcia', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(273, 36, '0032', 2000, 0, 2000, '2021-01-12 10:11:22', 'PPG_EXAMEN', '', 'Juan Herandez Garcia', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(274, 36, '0033', 750, 0, 750, '2021-01-12 01:03:05', 'PPG_INCORPORACION', '', 'Juan Herandez Garcia', 550, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(275, 36, '0033', 500, 0, 500, '2021-01-12 01:03:14', 'PPG_CERTIFICADO', '', 'Juan Herandez Garcia', 4000, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(276, 35, '0035', 1000, 0, 1000, '2021-01-12 01:04:38', 'PPG_EXAMEN', '', 'Juan Herandez Garcia', 1000, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(277, 35, '0036', 4500, 0, 4500, '2021-01-12 01:05:07', 'PPG_CERTIFICADO', '', 'Juan Herandez Garcia', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(278, 34, '0037', 2000, 0, 2000, '2021-01-13 12:44:46', 'PPG_CERTIFICADO', '', 'Héctor Alberto Lopez Fabian', 2000, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(279, 34, '0038', 1500, 0, 1500, '2021-01-13 04:28:47', 'PPG_CERTIFICADO', '', 'Héctor Alberto Lopez Fabian', 500, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(280, 34, '0039', 500, 0, 500, '2021-01-13 04:29:13', 'PPG_CERTIFICADO', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(281, 37, '0040', 350, 0, 350, '2021-01-17 11:15:19', 'PPG_SEMANAL', '', 'Héctor Alberto Lopez Fabian', 1050, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(282, 36, '0042', 4000, 0, 4000, '2021-01-18 01:39:27', 'PPG_CERTIFICADO', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(283, 36, '0045', 550, 0, 550, '2021-01-18 02:14:42', 'PPG_INCORPORACION', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(284, 35, '0046', 500, 0, 500, '2021-01-18 03:49:29', 'PPG_EXAMEN', '', 'Héctor Alberto Lopez Fabian', 500, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(285, 35, '0047', 250, 0, 250, '2021-01-18 04:00:28', 'PPG_EXAMEN', '', 'Juan Herandez Garcia', 250, 'PAGADO', NULL, NULL, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(286, 42, '0049', 4900, 30, 3430, '2021-02-14 06:42:18', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 6860, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(287, 42, '0050', 4900, 30, 3430, '2021-02-14 06:59:42', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 3430, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(289, 42, '0052', 4900, 30, 3430, '2021-02-14 07:05:05', 'PPG_ONLINE', '', 'REGISTRO ONLINE', -3430, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(290, 43, '0053', 7350, 40, 4410, '2021-02-14 07:57:20', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 4410, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(291, 43, '0054', 7350, 40, 4410, '2021-02-15 09:07:09', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 0, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(292, 46, '0055', 1800, 0, 1800, '2021-03-07 09:23:28', 'PPG_INSCRIPCION', '', 'Héctor Alberto Lopez Fabian', 0, 'PAGADO', NULL, NULL, '74460210405f05c5826fb4a89ee89160'),
(293, 48, '0057', 3052.1666666667, 15, 2594.34, '2021-03-31 12:38:59', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 12971.71, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(294, 48, '0058', 3052.1666666667, 15, 2594.34, '2021-03-31 12:45:30', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 10377.37, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(295, 48, '0059', 3052.1666666667, 15, 2594.34, '2021-03-31 12:51:43', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 7783.03, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(296, 48, '0060', 3052.1666666667, 15, 2594.34, '2021-03-31 12:56:53', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 5188.69, 'CANCELADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(297, 48, '0061', 3052.1666666667, 15, 2594.34, '2021-03-31 01:07:33', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 2594.35, 'CANCELADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(298, 48, '0062', 3052.1666666667, 15, 2594.34, '2021-03-31 01:15:41', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 0.0099999999983993, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(299, 48, '0063', 3052.1666666667, 15, 2594.34, '2021-03-31 01:20:24', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 0.0099999999983993, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(300, 48, '0064', 3052.1666666667, 15, 2594.34, '2021-03-31 01:22:51', 'PPG_ONLINE', '', 'REGISTRO ONLINE', 0.0099999999983993, 'PAGADO', NULL, NULL, '9f3b645d6b56fd6e1b79e9b92b903ea5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paquete_pqt`
--

CREATE TABLE `tbl_paquete_pqt` (
  `pqt_sku` varchar(100) NOT NULL,
  `pqt_nombre` text DEFAULT NULL,
  `pqt_modalidad` text DEFAULT NULL,
  `pqt_duracion` text DEFAULT NULL,
  `pqt_descripcion` text DEFAULT NULL,
  `pqt_estado_actividad` char(1) DEFAULT '1',
  `pqt_costo` text DEFAULT NULL,
  `pqt_usuario_registro` int(20) DEFAULT NULL,
  `pqt_fecha_registro` datetime DEFAULT NULL,
  `pqt_cupon_default` text NOT NULL,
  `pqt_id_sucursal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_paquete_pqt`
--

INSERT INTO `tbl_paquete_pqt` (`pqt_sku`, `pqt_nombre`, `pqt_modalidad`, `pqt_duracion`, `pqt_descripcion`, `pqt_estado_actividad`, `pqt_costo`, `pqt_usuario_registro`, `pqt_fecha_registro`, `pqt_cupon_default`, `pqt_id_sucursal`) VALUES
('paquete_1_examen', 'paquete 1 examen', 'PRESENCIAL', '4 SEMANAS', '', '1', '{\"duracion_semana\":\"4\",\"costo_semana\":\"0.00\",\"descripcion_semana\":\"\",\"costo_inscripcion\":\"1800.00\",\"descripcion_inscripcion\":\"\",\"costo_guia\":\"500.00\",\"descripcion_guia\":\"\",\"costo_examen\":\"500.00\",\"descripcion_examen\":\"\",\"costo_incorporacion\":\"3333.00\",\"descripcion_incorporacion\":\"\",\"costo_certificado\":\"5000.00\",\"descripcion_certificado\":\"\"}', 1, '2021-03-07 12:26:03', '0', 'd7a33a4fa6c3c60527abbee3afe843ef'),
('Paquete_de_prueba', 'Paquete de prueba', 'ONLINE', '17 SEMANAS', '<div><b>Un paquete de prueba con descripción&nbsp;</b></div><ul><li><b>a</b></li><li><b>b</b></li><li><b>c</b></li><li><b>d</b></li></ul><p><b><br></b><img src=\"data:image/png;base64,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\" data-filename=\"9d4352b8bf376c4349188c5cf26699b8.png\" style=\"width: 270px;\"></p>', '1', '{\"duracion_semana\":\"17\",\"costo_semana\":\"499.00\",\"descripcion_semana\":\"\",\"costo_inscripcion\":\"1800.00\",\"descripcion_inscripcion\":\"\",\"costo_guia\":\"230.00\",\"descripcion_guia\":\"\",\"costo_examen\":\"1500.00\",\"descripcion_examen\":\"\",\"costo_incorporacion\":\"1800.00\",\"descripcion_incorporacion\":\"\",\"costo_certificado\":\"4500.00\",\"descripcion_certificado\":\"\"}', 1, '2021-01-25 01:19:05', 'BECA_50', '2cff89ccbcb6602c5967850d5a5133b6'),
('pauqte_prueba', 'pauqte prueba', 'PRESENCIAL', '4 SEMANAS', '', '1', '{\"duracion_semana\":\"4\",\"costo_semana\":\"350.00\",\"descripcion_semana\":\"\",\"costo_inscripcion\":\"44.00\",\"descripcion_inscripcion\":\"\",\"costo_guia\":\"4.00\",\"descripcion_guia\":\"\",\"costo_examen\":\"4.00\",\"descripcion_examen\":\"\",\"costo_incorporacion\":\"4.00\",\"descripcion_incorporacion\":\"\",\"costo_certificado\":\"4.00\",\"descripcion_certificado\":\"\"}', 1, '2021-01-06 12:50:13', '', '74460210405f05c5826fb4a89ee89160'),
('PREPA_EXPRESS', 'PREPA EXPRESS', 'PRESENCIAL', '4 SEMANAS', 'Paquete express de preparatoria', '1', '{\"duracion_semana\":\"4\",\"costo_semana\":\"0.00\",\"descripcion_semana\":\"\",\"costo_inscripcion\":\"1800.00\",\"descripcion_inscripcion\":\"\",\"costo_guia\":\"300.00\",\"descripcion_guia\":\"\",\"costo_examen\":\"2000.00\",\"descripcion_examen\":\"\",\"costo_incorporacion\":\"1300.00\",\"descripcion_incorporacion\":\"\",\"costo_certificado\":\"4500.00\",\"descripcion_certificado\":\"\"}', 1, '2021-01-04 04:54:14', '', 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
('PREPA_EXPRESS_MADERO', 'PREPA EXPRESS', 'PRESENCIAL', '4 SEMANAS', 'Paquete express de preparatoria', '0', '{\"duracion_semana\":\"4\",\"costo_semana\":\"350.00\",\"descripcion_semana\":\"\",\"costo_inscripcion\":\"500.00\",\"descripcion_inscripcion\":\"\",\"costo_guia\":\"500.00\",\"descripcion_guia\":\"\",\"costo_examen\":\"400.00\",\"descripcion_examen\":\"\",\"costo_incorporacion\":\"1300.00\",\"descripcion_incorporacion\":\"\",\"costo_certificado\":\"3500.00\",\"descripcion_certificado\":\"\"}', 1, '2021-01-23 10:22:08', '', 'd7a33a4fa6c3c60527abbee3afe843ef'),
('PREPA_EXPRESS_ONLINE', 'PREPA EXPRESS ONLINE', 'ONLINE', '8 SEMANAS', '<p>ESTE PAQUETE INCLUYE</p><ul><li>CERTIFICACION</li><li>INSCRIPCION</li><li>EXAMEN</li><li>MATERIAL DE APOYO, GUIA DE EXAMEN</li><li>INCORPORACION A LA SEP</li></ul>', '1', '{\"duracion_semana\":\"4\",\"costo_semana\":\"0.00\",\"descripcion_semana\":\"\",\"costo_inscripcion\":\"2000.00\",\"descripcion_inscripcion\":\"\",\"costo_guia\":\"600.00\",\"descripcion_guia\":\"\",\"costo_examen\":\"4000.00\",\"descripcion_examen\":\"\",\"costo_incorporacion\":\"3600.00\",\"descripcion_incorporacion\":\"\",\"costo_certificado\":\"4500.00\",\"descripcion_certificado\":\"\"}', 1, '2021-02-09 01:17:33', 'BECA_50', '9f3b645d6b56fd6e1b79e9b92b903ea5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursal_scl`
--

CREATE TABLE `tbl_sucursal_scl` (
  `scl_id` varchar(100) NOT NULL,
  `scl_nombre` text NOT NULL,
  `scl_direccion` text NOT NULL,
  `scl_rfc` text NOT NULL,
  `scl_telefono` text NOT NULL,
  `scl_sub_fijo` text NOT NULL,
  `scl_acceso_usr` text NOT NULL,
  `scl_usuario_registro` text NOT NULL,
  `scl_fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_sucursal_scl`
--

INSERT INTO `tbl_sucursal_scl` (`scl_id`, `scl_nombre`, `scl_direccion`, `scl_rfc`, `scl_telefono`, `scl_sub_fijo`, `scl_acceso_usr`, `scl_usuario_registro`, `scl_fecha_registro`) VALUES
('2cff89ccbcb6602c5967850d5a5133b6', 'English Intitute', '', '', '', 'EI-', '[\"0080\",\"ST-0001\"]', 'Héctor Alberto Lopez Fabian', '2021-01-23 10:40:57'),
('74460210405f05c5826fb4a89ee89160', 'SUCURSAL MEXICO', 'Gastelum #893, Plaza Copa Cabana local 12 , zona centro, Ensenada B. C.	', 'SEL200724P58', '8331304192', 'SM-', '[\"0079\",\"0002\",\"ST-0001\"]', 'Héctor Alberto Lopez Fabian', '2021-01-05 12:20:27'),
('9f3b645d6b56fd6e1b79e9b92b903ea5', 'Plantel de prueba', '', '', '', 'pb', '[\"0078\",\"ST-0001\"]', 'Héctor Alberto Lopez Fabian', '2021-01-07 01:42:27'),
('d7a33a4fa6c3c60527abbee3afe843ef', 'SUCURSAL MADERO', 'Fray Andres de Olmos #105 , Zona Centro Tampico Tamps.	', 'SEL200724P58', '353453453', 'SMD-', '[\"0078\",\"0002\",\"ST-0001\"]', 'Héctor Alberto Lopez Fabian', '2021-01-05 02:13:41'),
('ST-5eda37ea1f6680605459bc0a773e5d3d', 'SUCURSAL TAMPICO', 'Capitán Pérez 204, zona centro,\r\nAltamira Tamps., México CP.\r\n89600.', 'SEL200724P58', '6462640926	', 'ST-', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios_usr`
--

CREATE TABLE `tbl_usuarios_usr` (
  `usr_id` int(20) NOT NULL,
  `usr_matricula` varchar(20) NOT NULL,
  `usr_modalidad` varchar(50) NOT NULL DEFAULT 'PRESENCIAL',
  `usr_pqt_interes_nombre` text NOT NULL,
  `usr_pqt_interes_sku` text NOT NULL,
  `usr_nombre` varchar(100) DEFAULT NULL,
  `usr_app` text DEFAULT NULL,
  `usr_apm` text DEFAULT NULL,
  `usr_telefono` varchar(25) DEFAULT NULL,
  `usr_direccion` text DEFAULT NULL,
  `usr_calle` text DEFAULT NULL,
  `usr_ne` text DEFAULT NULL,
  `usr_ni` text DEFAULT NULL,
  `usr_cp` text DEFAULT NULL,
  `usr_colonia` text DEFAULT NULL,
  `usr_estado` text DEFAULT NULL,
  `usr_municipio` text DEFAULT NULL,
  `usr_pais` varchar(100) DEFAULT 'México',
  `usr_correo` varchar(100) DEFAULT NULL,
  `usr_clave` text DEFAULT NULL,
  `usr_rol` varchar(50) DEFAULT 'Ejecutivo',
  `usr_estado_verificacion` char(1) DEFAULT '0',
  `usr_token` text DEFAULT NULL,
  `usr_recuperar_clave` char(1) DEFAULT '0',
  `usr_usuario_registro` text DEFAULT NULL,
  `usr_fecha_registro` datetime DEFAULT NULL,
  `usr_firma` text NOT NULL,
  `usr_caja` int(11) NOT NULL,
  `usr_id_sucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios_usr`
--

INSERT INTO `tbl_usuarios_usr` (`usr_id`, `usr_matricula`, `usr_modalidad`, `usr_pqt_interes_nombre`, `usr_pqt_interes_sku`, `usr_nombre`, `usr_app`, `usr_apm`, `usr_telefono`, `usr_direccion`, `usr_calle`, `usr_ne`, `usr_ni`, `usr_cp`, `usr_colonia`, `usr_estado`, `usr_municipio`, `usr_pais`, `usr_correo`, `usr_clave`, `usr_rol`, `usr_estado_verificacion`, `usr_token`, `usr_recuperar_clave`, `usr_usuario_registro`, `usr_fecha_registro`, `usr_firma`, `usr_caja`, `usr_id_sucursal`) VALUES
(1, 'ST-0001', 'PRESENCIAL', '', '', 'Héctor Alberto Lopez Fabian', NULL, NULL, '7341006945', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'lf_alberto@outlook.com', '$2y$10$aoxEa2vQk/Q1nCmqstx.hekj732WAifRPcpkrcqE5iqA4UcfzoJIa', 'Administrador', '1', '', '0', '', '0000-00-00 00:00:00', 'app/upload/firmas_digitales/e9ad68ea30526588c82473535d7af3c4/ST-0001.png', 32, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(71, '0002', 'PRESENCIAL', '', '', 'Juan Herandez Garcia', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'juan@gmail.com', '$2y$10$k0nVshY3UFOT1AkOr/MPYOEDjqpmJxNzpvPfJz6C145QPplSPFCcC', 'Asesor Educativo', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-01-04 10:06:16', 'app/upload/firmas_digitales/0002.png', 30, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(72, 'ST-0072', 'PRESENCIAL', '', '', 'Luis Antonio', 'Lopez', 'Fabian', '342425242', NULL, 'Jose Acosta', '3970', '', '42720', 'Villas de gualupe', 'Jalisco', 'Guadalajara', 'México', 'luis@gmail.com', '', 'Alumno', '0', NULL, '0', 'Juan Herandez Garcia', '2021-01-04 10:08:44', '', 0, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(73, 'ST-0073', 'PRESENCIAL', '', '', 'Susana', 'Salgado', 'Cueto', '7282525625', NULL, 'Hidalgo', '406', '', '7255', 'Jojutla Centro', 'Tamaulipas', 'Jojutla', 'México', 'susan@gmail.com', '$2y$10$ws2ukmupfTu877WCDILGMOhdBfOGnqoBZgpY7UL53/A3gRHWzNpB6', 'Alumno', '0', NULL, '0', 'Juan Herandez Garcia', '2021-01-04 10:19:07', '', 0, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(75, 'SM-0074', 'PRESENCIAL', '', '', 'Fernando', 'Salgado', 'Huerta', '', NULL, 'xx', 'xx', 'xx', 'xx', 'xx', 'Tamaulipas', 'xx', 'México', 'fernando@gmail.com', '$2y$10$unSj9tpFbh1R9wuEWSTyw.ClGyDXgvENGkCsp6I5.zoNpIxa5GqGq', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-01-05 01:13:53', '', 0, '74460210405f05c5826fb4a89ee89160'),
(76, 'SMD-0076', 'PRESENCIAL', '', '', 'Hugo Alberto', 'Sanhez', 'López', '', NULL, 'x', 'x', '', 'x', 'x', 'Tamaulipas', 'x', 'México', 'hugo@gmail.com', '$2y$10$X4qo90JDa4SQZvZx0pVBje1zm7GRI8u.acfY1i42UjsCSm4/LNp/C', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-01-05 02:17:27', '', 0, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(77, 'SMD-0077', 'PRESENCIAL', '', '', 'Erika', 'Gonzales', 'Arteaga', '', NULL, 'v', 'v', '', 'v', 'v', 'Tamaulipas', 'v', 'México', 'erika@gmail.com', '$2y$10$tQKaqe2h8OZ8gb574b1VR.4nUqL78XdJvurmL38F5Zsaf9KNTvZ8S', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-01-05 02:38:38', '', 0, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(78, '0078', 'PRESENCIAL', '', '', 'Enrique Gonzales', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'enr@gmail.com', '$2y$10$DaNOMUFhy77zWt0yy5kpcefyDFhooJcCvbVC15OY6ghSJ4Lm2JWu2', 'Responsable de sucursal', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-01-05 11:48:10', '', 0, 'ST-5eda37ea1f6680605459bc0a773e5d3d'),
(79, '0079', 'PRESENCIAL', '', '', 'Responsable', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'respo@gmail.com', '$2y$10$2hte4iowQuHMoVr9yVPSTuDzlK/hyOoV2hHk3xQ1B4lMgfdxbj7D.', 'Responsable de sucursal', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-01-09 02:42:27', '', 0, '74460210405f05c5826fb4a89ee89160'),
(82, '0080', 'PRESENCIAL', '', '', 'Auditor de prueba', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'auditor.exte@gmail.com', '$2y$10$alei9MyvfiaHdZNh0MNdDOzn.XCUtEZ80xsmwo06E0/zpGqIPMqKq', 'Auditor externo', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-01-23 10:39:19', '', 31, 'd7a33a4fa6c3c60527abbee3afe843ef'),
(85, 'pb0083', 'ONLINE', 'PREPA EXPRESS ONLINE', 'PREPA_EXPRESS_ONLINE', 'Oscar', 'Burgos', 'Lopez', '678546544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'burgos@gmail.com', '$2y$10$TpYVEUQtxKBzu.aE1FGoXuotyUXPgmMKt8yVgchaMC47MwNbtS7jK', 'Alumno', '0', NULL, '0', 'REGISTRO ONLINE', '2021-02-09 04:15:53', '', 0, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(86, 'pb0086', 'ONLINE', 'PREPA EXPRESS ONLINE', 'PREPA_EXPRESS_ONLINE', 'Susana ', 'Salgado', 'Cueto', '3656356753', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'susi.chivas@gmail.com', '$2y$10$1VyWXypVcbD1P1Nmj1gk4.xtp2vHKwprP0zxU03fyUbkxo3PTOnQi', 'Alumno', '0', NULL, '0', 'REGISTRO ONLINE', '2021-02-14 07:56:11', '', 0, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(87, 'SM-0087', 'PRESENCIAL', '', '', 'Susi', 'Gonzales', 'Pineda', 'x', NULL, 'x', 'x', 'x', 'x', 'x', 'Tamaulipas', 'x', 'México', 'susi@softmor.com', '', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-03-07 12:20:02', '', 0, '74460210405f05c5826fb4a89ee89160'),
(88, 'SM-0088', 'PRESENCIAL', '', '', 'juan alberto', 'gonzales', 'guitierritos', 'x', NULL, 'x', 'x', 'x', 'x', 'x', 'Tamaulipas', 'x', 'México', 'gon@gmail.com', '', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-03-07 12:26:53', '', 0, '74460210405f05c5826fb4a89ee89160'),
(89, 'SM-0089', 'PRESENCIAL', '', '', 'h', 'h', 'h', 'x', NULL, 'x', 'x', 'x', 'x', 'x', 'Tamaulipas', 'x', 'México', 'hfd_98@gmail.com', '', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-03-07 12:33:23', '', 0, '74460210405f05c5826fb4a89ee89160'),
(90, 'SM-0090', 'PRESENCIAL', '', '', 'd', 'd', 'd', 'd', NULL, 'x', 'x', 'x', 'x', 'x', 'Tamaulipas', 'x', 'México', 'ddd@ddd.com', '', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-03-07 12:42:20', '', 0, '74460210405f05c5826fb4a89ee89160'),
(91, 'SM-0091', 'PRESENCIAL', '', '', 'cesar o', 'x', 'x', 'x', NULL, 'x', 'x', 'x', 'x', 'x', 'Tamaulipas', 'x', 'México', 'x@gmail.com', '', 'Alumno', '0', NULL, '0', 'Héctor Alberto Lopez Fabian', '2021-03-07 09:15:50', '', 0, '74460210405f05c5826fb4a89ee89160'),
(92, 'pb0092', 'ONLINE', 'Paquete de prueba', 'Paquete_de_prueba', 'Yovanny ', 'Sanchez', 'Contreras', '353674367433', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'boy_america97@hotmail.com', '$2y$10$oRp4BhcTtH0CBADo/wBhH.BfaRzEIN2HEsrK7ibs/V0G7tZ.WzIGq', 'Alumno', '0', NULL, '0', 'REGISTRO ONLINE', '2021-03-31 10:38:49', '', 0, '9f3b645d6b56fd6e1b79e9b92b903ea5'),
(93, 'pb0093', 'ONLINE', 'Paquete de prueba', 'Paquete_de_prueba', 'Yovanny', 'Sanchez', 'Contreras', '73763533355', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'boy_america9@hotmail.com', '$2y$10$24fvyHEM6YcLikm6/VzZ1.dtCfyhiY8zpn0h4JexpHQ1epl5tkdyO', 'Alumno', '0', NULL, '0', 'REGISTRO ONLINE', '2021-03-31 12:34:13', '', 0, '9f3b645d6b56fd6e1b79e9b92b903ea5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_caja_cja`
--
ALTER TABLE `tbl_caja_cja`
  ADD PRIMARY KEY (`cja_id_caja`),
  ADD UNIQUE KEY `cja_nombre` (`cja_nombre`);

--
-- Indices de la tabla `tbl_caja_open_copn`
--
ALTER TABLE `tbl_caja_open_copn`
  ADD PRIMARY KEY (`copn_id`),
  ADD KEY `copn_usr_fk` (`copn_usuario_abrio`),
  ADD KEY `copn_cja_fk` (`copn_id_caja`),
  ADD KEY `copn_scl_fk` (`copn_id_sucursal`);

--
-- Indices de la tabla `tbl_categoria_gastos_gts`
--
ALTER TABLE `tbl_categoria_gastos_gts`
  ADD PRIMARY KEY (`gts_id`);

--
-- Indices de la tabla `tbl_cortes_cts`
--
ALTER TABLE `tbl_cortes_cts`
  ADD PRIMARY KEY (`cts_id`);

--
-- Indices de la tabla `tbl_cupones_cps`
--
ALTER TABLE `tbl_cupones_cps`
  ADD PRIMARY KEY (`cps_codigo`);

--
-- Indices de la tabla `tbl_ficha_pago_fpg`
--
ALTER TABLE `tbl_ficha_pago_fpg`
  ADD PRIMARY KEY (`fpg_id`),
  ADD KEY `fpg_alumno_fk` (`fpg_alumno`),
  ADD KEY `fpg_paquete_fk` (`fpg_paquete`);

--
-- Indices de la tabla `tbl_ficha_venta_vfch`
--
ALTER TABLE `tbl_ficha_venta_vfch`
  ADD PRIMARY KEY (`vfch_id`);

--
-- Indices de la tabla `tbl_gastos_tgts`
--
ALTER TABLE `tbl_gastos_tgts`
  ADD PRIMARY KEY (`tgts_id`),
  ADD KEY `fk_tgts_categoria` (`tgts_categoria`);

--
-- Indices de la tabla `tbl_ingresos_igs`
--
ALTER TABLE `tbl_ingresos_igs`
  ADD PRIMARY KEY (`igs_id`);

--
-- Indices de la tabla `tbl_medios_mds`
--
ALTER TABLE `tbl_medios_mds`
  ADD PRIMARY KEY (`mds_id`);

--
-- Indices de la tabla `tbl_paquetes_pagos_ppg`
--
ALTER TABLE `tbl_paquetes_pagos_ppg`
  ADD PRIMARY KEY (`ppg_id`),
  ADD KEY `ppg_ficha_pago_fk` (`ppg_ficha_pago`);

--
-- Indices de la tabla `tbl_paquete_pqt`
--
ALTER TABLE `tbl_paquete_pqt`
  ADD PRIMARY KEY (`pqt_sku`),
  ADD KEY `pqt_usuario_fk` (`pqt_usuario_registro`);

--
-- Indices de la tabla `tbl_sucursal_scl`
--
ALTER TABLE `tbl_sucursal_scl`
  ADD PRIMARY KEY (`scl_id`);

--
-- Indices de la tabla `tbl_usuarios_usr`
--
ALTER TABLE `tbl_usuarios_usr`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_matricula` (`usr_matricula`),
  ADD KEY `usr_suc_fk` (`usr_id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_caja_cja`
--
ALTER TABLE `tbl_caja_cja`
  MODIFY `cja_id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_caja_open_copn`
--
ALTER TABLE `tbl_caja_open_copn`
  MODIFY `copn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tbl_categoria_gastos_gts`
--
ALTER TABLE `tbl_categoria_gastos_gts`
  MODIFY `gts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_cortes_cts`
--
ALTER TABLE `tbl_cortes_cts`
  MODIFY `cts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_ficha_pago_fpg`
--
ALTER TABLE `tbl_ficha_pago_fpg`
  MODIFY `fpg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tbl_gastos_tgts`
--
ALTER TABLE `tbl_gastos_tgts`
  MODIFY `tgts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_ingresos_igs`
--
ALTER TABLE `tbl_ingresos_igs`
  MODIFY `igs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_medios_mds`
--
ALTER TABLE `tbl_medios_mds`
  MODIFY `mds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_paquetes_pagos_ppg`
--
ALTER TABLE `tbl_paquetes_pagos_ppg`
  MODIFY `ppg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios_usr`
--
ALTER TABLE `tbl_usuarios_usr`
  MODIFY `usr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_caja_open_copn`
--
ALTER TABLE `tbl_caja_open_copn`
  ADD CONSTRAINT `copn_cja_fk` FOREIGN KEY (`copn_id_caja`) REFERENCES `tbl_caja_cja` (`cja_id_caja`),
  ADD CONSTRAINT `copn_scl_fk` FOREIGN KEY (`copn_id_sucursal`) REFERENCES `tbl_sucursal_scl` (`scl_id`),
  ADD CONSTRAINT `copn_usr_fk` FOREIGN KEY (`copn_usuario_abrio`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Filtros para la tabla `tbl_ficha_pago_fpg`
--
ALTER TABLE `tbl_ficha_pago_fpg`
  ADD CONSTRAINT `fpg_alumno_fk` FOREIGN KEY (`fpg_alumno`) REFERENCES `tbl_usuarios_usr` (`usr_id`),
  ADD CONSTRAINT `fpg_paquete_fk` FOREIGN KEY (`fpg_paquete`) REFERENCES `tbl_paquete_pqt` (`pqt_sku`);

--
-- Filtros para la tabla `tbl_gastos_tgts`
--
ALTER TABLE `tbl_gastos_tgts`
  ADD CONSTRAINT `fk_tgts_categoria` FOREIGN KEY (`tgts_categoria`) REFERENCES `tbl_categoria_gastos_gts` (`gts_id`);

--
-- Filtros para la tabla `tbl_paquetes_pagos_ppg`
--
ALTER TABLE `tbl_paquetes_pagos_ppg`
  ADD CONSTRAINT `ppg_ficha_pago_fk` FOREIGN KEY (`ppg_ficha_pago`) REFERENCES `tbl_ficha_pago_fpg` (`fpg_id`);

--
-- Filtros para la tabla `tbl_paquete_pqt`
--
ALTER TABLE `tbl_paquete_pqt`
  ADD CONSTRAINT `pqt_usuario_fk` FOREIGN KEY (`pqt_usuario_registro`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Filtros para la tabla `tbl_usuarios_usr`
--
ALTER TABLE `tbl_usuarios_usr`
  ADD CONSTRAINT `usr_suc_fk` FOREIGN KEY (`usr_id_sucursal`) REFERENCES `tbl_sucursal_scl` (`scl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
