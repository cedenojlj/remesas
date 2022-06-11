-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2021 a las 18:07:24
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encomiendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `idBanco` int(11) NOT NULL,
  `banco` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idPais` int(11) NOT NULL,
  `ba_ciudad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `ba_email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `ba_tlf` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `ba_direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`idBanco`, `banco`, `idPais`, `ba_ciudad`, `ba_email`, `ba_tlf`, `ba_direccion`) VALUES
(4, 'Banco de Venezuela', 1, 'Maturin', 'bcv@gmail.com', '+587', 'Sede Maturin edo Monagas'),
(5, 'Banco Caroni', 2, 'Cumana', 'car@gmail.com', '+589696', 'Cumana Sucre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `idBeneficiario` int(11) NOT NULL,
  `be_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `be_apellido` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `be_fechaNacimiento` date NOT NULL,
  `idPais` int(11) NOT NULL,
  `be_ciudad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `be_direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `be_tlf` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `be_email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `be_identidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idTipoIdentidad` int(11) NOT NULL,
  `be_nacionalidad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `be_facebook` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `be_whatsapp` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `be_telegram` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `be_numCuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idTipoCuenta` int(11) NOT NULL,
  `idBanco` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`idBeneficiario`, `be_nombre`, `be_apellido`, `be_fechaNacimiento`, `idPais`, `be_ciudad`, `be_direccion`, `be_tlf`, `be_email`, `be_identidad`, `idTipoIdentidad`, `be_nacionalidad`, `be_facebook`, `be_whatsapp`, `be_telegram`, `be_numCuenta`, `idTipoCuenta`, `idBanco`, `idMoneda`, `idEstado`) VALUES
(1, 'juan', 'guerra', '1980-02-15', 2, 'quito', 'quito ecuador', '+5896989', 'juan@gmail.com', '748585', 2, 'ecuatoriano', 'juan', '+589636', '+589636', '478596', 2, 5, 2, 2),
(3, 'BASILIUS', 'perez', '2021-05-30', 1, 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '7859', 1, 'venezolano', '', '', '', '12345678912345678933', 1, 4, 3, 1),
(4, 'ILLENY', 'perez', '0000-00-00', 1, 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '748585', 1, 'ecuatoriano', '', '', '', '12345678912345678933', 1, 4, 3, 1),
(8, 'CUTLUYA', 'perez', '2021-06-03', 1, 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '748585', 1, '', '', '', '', '12345678912345678933', 1, 5, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `cl_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cl_apellido` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cl_fechaNacimiento` date NOT NULL,
  `idPais` int(11) NOT NULL,
  `cl_provincia` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cl_ciudad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cl_direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `cl_tlf` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cl_email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cl_identidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idTipoIdentidad` int(11) NOT NULL,
  `cl_fechaEmision` date NOT NULL,
  `cl_fechaCaducidad` date NOT NULL,
  `cl_nacionalidad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cl_facebook` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cl_whatsapp` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cl_telegram` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cl_limite` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `cl_doc_cedula` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cl_doc_form` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cl_doc_otro` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `cl_nombre`, `cl_apellido`, `cl_fechaNacimiento`, `idPais`, `cl_provincia`, `cl_ciudad`, `cl_direccion`, `cl_tlf`, `cl_email`, `cl_identidad`, `idTipoIdentidad`, `cl_fechaEmision`, `cl_fechaCaducidad`, `cl_nacionalidad`, `cl_facebook`, `cl_whatsapp`, `cl_telegram`, `cl_limite`, `idMoneda`, `idEstado`, `cl_doc_cedula`, `cl_doc_form`, `cl_doc_otro`) VALUES
(1, 'jose', 'cedeno', '1979-01-12', 1, 'monagas', 'maturin', 'maturin edo monagas', '+587896', 'jose@gmail.com', '785896', 1, '2021-04-14', '2021-04-24', 'venezolano', 'jose', '+5967996', '+58966896', 5000, 1, 1, 'diagrama.bmp', '', ''),
(4, 'illeny', 'bermudez', '2021-03-01', 3, 'maturin', 'maturin', 'maturin edo monagas', '+5896', 'illeny@gmail.com', '14256', 1, '2021-03-29', '2021-04-30', 'venezolano', 'illeny', '+5896', '+58996', 10000, 1, 1, 'pcb.jpg', '', ''),
(5, 'Andres', 'Villalobos', '2021-03-09', 4, 'caracas', 'caracas', 'caracas venezuela', '+5885', 'andres@gmail.com', '45896', 2, '2021-04-20', '2021-04-07', 'venezolano', 'andres', '+5896', '+5896', 452896, 4, 2, '', '', ''),
(7, 'ALIAR', 'perez', '0000-00-00', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-18', 'ecuatoriano', '', '', '', 1230, 1, 1, 'facturacion.JPG', '', ''),
(9, 'CUTLUYA', 'perez', '0000-00-00', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-02', 'ecuatoriano', '', '', '', 1230, 1, 1, 'procesadores.jpg', '', ''),
(10, 'CUTLUYA', 'perez', '0000-00-00', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-12', 'ecuatoriano', '', '', '', 1230, 1, 1, 'factura.PNG', '', ''),
(11, 'BASILIUS', 'perez', '2021-06-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-18', 'ecuatoriano', '', '', '', 1230, 1, 1, 'images.jpg', '', ''),
(12, 'BANSI', 'perez', '2021-06-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-05-30', '2021-06-03', 'ecuatoriano', '', '', '', 1230, 1, 1, 'images.jpg', '', ''),
(13, 'VALE', 'perez', '2021-06-02', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-09', '2021-06-17', 'ecuatoriano', '', '', '', 1230, 1, 1, 'factura.PNG', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `idCuenta` int(11) NOT NULL,
  `cu_numCta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idBanco` int(11) NOT NULL,
  `idTipoCuenta` int(11) NOT NULL,
  `idPagador` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `cu_numCta`, `idBanco`, `idTipoCuenta`, `idPagador`, `idMoneda`) VALUES
(1, '12345885889669685968', 4, 1, 3, 1),
(2, '41257896521258787888', 4, 1, 3, 2),
(3, '12345678985964857534', 5, 1, 4, 4),
(4, '12345678912345678917', 4, 1, 4, 1),
(5, '12345678912345678777', 5, 1, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadogiro`
--

CREATE TABLE `estadogiro` (
  `idEstadoGiro` int(11) NOT NULL,
  `estadoGiro` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estadogiro`
--

INSERT INTO `estadogiro` (`idEstadoGiro`, `estadoGiro`) VALUES
(1, 'En proceso'),
(2, 'Pagados'),
(3, 'Anulado'),
(4, 'En suspenso'),
(5, 'Sin Fondos'),
(6, 'En Suspenso CF'),
(7, 'En Suspenso SF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro`
--

CREATE TABLE `giro` (
  `idGiro` bigint(20) NOT NULL,
  `gi_fecha` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idBeneficiario` int(11) NOT NULL,
  `idAgente` int(11) NOT NULL,
  `idPagador` int(11) NOT NULL,
  `idPais` int(11) NOT NULL,
  `gi_importe` decimal(65,2) NOT NULL,
  `gi_Total` decimal(65,2) NOT NULL,
  `gi_TotalLocal` decimal(65,2) NOT NULL,
  `idMonedaCobro` int(11) NOT NULL,
  `idMonedaPago` int(11) NOT NULL,
  `gi_tasa` decimal(65,2) NOT NULL,
  `gi_tipoCambio` decimal(65,2) NOT NULL,
  `gi_impuesto` decimal(10,2) NOT NULL,
  `idTipoRetiro` int(11) NOT NULL,
  `gi_Banco` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `gi_numCta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `gi_TipoCuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idEstadoGiro` int(11) NOT NULL,
  `gi_clave` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `gi_comentario` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `giro`
--

INSERT INTO `giro` (`idGiro`, `gi_fecha`, `idUsuario`, `idCliente`, `idBeneficiario`, `idAgente`, `idPagador`, `idPais`, `gi_importe`, `gi_Total`, `gi_TotalLocal`, `idMonedaCobro`, `idMonedaPago`, `gi_tasa`, `gi_tipoCambio`, `gi_impuesto`, `idTipoRetiro`, `gi_Banco`, `gi_numCta`, `gi_TipoCuenta`, `idEstadoGiro`, `gi_clave`, `gi_comentario`) VALUES
(1, '2021-04-02', 14, 4, 1, 3, 4, 1, '1000.00', '1120.00', '830.00', 1, 2, '1.23', '2123.45', '16.00', 2, 'venezuela', '125636', 'ahorro', 2, '12563', 'comentario'),
(2, '2021-04-05', 14, 4, 1, 3, 4, 1, '2000.00', '2120.00', '1830.00', 1, 2, '1.33', '3123.45', '16.00', 2, 'venezuela', '125636', 'ahorro', 3, '12563', 'comentario'),
(3, '2021-04-07', 14, 4, 1, 3, 4, 1, '3000.00', '3120.00', '830.00', 1, 2, '1.23', '2123.45', '16.00', 2, 'venezuela', '125636', 'ahorro', 1, '12563', 'comentario'),
(4, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '1102.13', 1, 1, '0.00', '0.00', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 2, 'AwIynRl7r2', ''),
(5, '2021-04-30', 14, 1, 1, 3, 4, 2, '100.00', '111.32', '82.46', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 2, '8ZR4hpwJpo', 'comentario de ejemplo'),
(6, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '816.39', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 2, 'Doy16gme8E', 'comentario de ejemplo'),
(7, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '816.39', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'SrsxkpppRH', 'comentario de ejemplo'),
(8, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '816.39', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '5h50m44N1z', 'comentario de ejemplo'),
(9, '2021-04-30', 14, 1, 1, 3, 4, 1, '5000.00', '5505.73', '4078.32', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '9D2kE5uNAM', 'comentario de ejemplo'),
(10, '2021-04-30', 14, 4, 1, 3, 4, 1, '100.00', '5505.73', '4078.32', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 3, 'dmIdMziFwn', 'comentario de ejemplo'),
(11, '2021-05-06', 14, 1, 1, 3, 4, 1, '100.00', '111.32', '111.32', 1, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'enZYw5aPFK', ''),
(12, '2021-05-06', 14, 1, 1, 3, 4, 1, '100.00', '111.32', '111.32', 1, 1, '1.23', '2123.45', '0.00', 2, 'Banco Caroni', '478596', 'Corriente', 1, '45R9NmxNoT', 'comentario'),
(13, '2021-05-06', 16, 1, 1, 3, 4, 1, '12.00', '14.44', '14.44', 1, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'IVIO7Arbso', ''),
(16, '2021-05-20', 16, 5, 1, 3, 4, 5, '10.00', '1737.00', '2004.00', 2, 4, '1.23', '2123.45', '0.00', 1, 'caroni', '47859', 'corriente', 1, 'm2sbpI9CTR', 'coment'),
(21, '2021-05-20', 16, 5, 1, 3, 4, 5, '10.00', '1737.39', '2004.94', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'ExG2aXXx6d', ''),
(22, '2021-05-20', 16, 5, 1, 3, 4, 5, '22.00', '1750.60', '2020.19', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '3AfCXQ0hbL', ''),
(23, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '9xd8WvEdfm', ''),
(24, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'NR874Yxdeu', ''),
(25, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'jVxQt2B35N', ''),
(26, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'V8sSgAdwhV', ''),
(27, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '2LkQsqUGmT', ''),
(28, '2021-06-01', 16, 13, 3, 3, 4, 5, '29.90', '36.73', '100000.00', 3, 4, '1.23', '0.90', '0.00', 1, 'Banco de Venezuela', '12345678912345678933', 'Ahorro', 1, '3iLoSS4aQS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identidad`
--

CREATE TABLE `identidad` (
  `idTipoIdentidad` int(11) NOT NULL,
  `tipoIdentidad` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `identidad`
--

INSERT INTO `identidad` (`idTipoIdentidad`, `tipoIdentidad`) VALUES
(1, 'Cedula'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `idMoneda` int(11) NOT NULL,
  `mo_codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `moneda` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`idMoneda`, `mo_codigo`, `moneda`, `idPais`) VALUES
(1, 'USD', 'Dolar EEUU', 3),
(2, 'EURO', 'Union Europea', 4),
(3, 'BS', 'Bolivares', 1),
(4, 'FR', 'Francos', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedaenvio`
--

CREATE TABLE `monedaenvio` (
  `idMonedaEnvio` int(11) NOT NULL,
  `mo_codigo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `moneda` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `idPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `monedaenvio`
--

INSERT INTO `monedaenvio` (`idMonedaEnvio`, `mo_codigo`, `moneda`, `idPais`) VALUES
(1, 'USD', 'Dollar EEUU', 3),
(2, 'EURO', 'Union Europea', 4),
(3, 'BS', 'Bolivares', 1),
(4, 'FR', 'Francos', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idMovimiento` bigint(20) NOT NULL,
  `fechaOperacion` date NOT NULL,
  `numOperacion` bigint(20) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `entrada` decimal(65,2) NOT NULL,
  `salida` decimal(65,2) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipoCambio` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`idMovimiento`, `fechaOperacion`, `numOperacion`, `idCuenta`, `entrada`, `salida`, `idUsuario`, `creacion`, `tipoCambio`) VALUES
(1, '2021-04-21', 2147483647, 1, '2000.00', '8.45', 14, '2021-04-21 21:11:45', '0.00'),
(90, '2021-04-21', 123456700, 1, '1.78', '8.45', 14, '2021-04-21 15:33:48', '0.00'),
(91, '2021-04-22', 123456701, 1, '1.79', '8.46', 14, '2021-04-21 15:33:48', '0.00'),
(92, '2021-04-23', 123456702, 1, '2.50', '8.47', 14, '2021-04-21 21:04:29', '0.00'),
(93, '2021-04-24', 123456703, 1, '10.23', '8.48', 14, '2021-04-21 21:14:58', '0.00'),
(94, '2021-04-25', 123456704, 1, '1.82', '8.49', 14, '2021-04-21 15:33:48', '0.00'),
(95, '2021-04-26', 123456705, 1, '1.83', '8.50', 14, '2021-04-21 15:33:48', '0.00'),
(96, '2021-04-27', 123456706, 1, '1.84', '8.51', 14, '2021-04-21 15:33:48', '0.00'),
(97, '2021-04-28', 123456707, 1, '1.85', '8.52', 14, '2021-04-21 15:33:49', '0.00'),
(98, '2021-04-29', 123456708, 1, '1.86', '8.53', 14, '2021-04-21 15:33:49', '0.00'),
(99, '2021-04-30', 123456709, 1, '1.87', '8.54', 14, '2021-04-21 15:33:49', '0.00'),
(100, '2021-04-21', 74896, 3, '1545.45', '0.00', 14, '2021-04-22 20:53:46', '0.00'),
(101, '2021-04-22', 1425789, 4, '500.00', '0.00', 14, '2021-04-30 03:33:39', '0.00'),
(102, '2021-04-23', 748596, 4, '250.00', '0.00', 14, '2021-04-30 03:33:59', '0.00'),
(103, '2021-04-24', 7485969, 4, '0.00', '120.00', 14, '2021-04-30 03:34:24', '0.00'),
(104, '2021-04-25', 7485632, 4, '0.00', '145.00', 14, '2021-04-30 03:35:14', '0.00'),
(105, '2021-04-23', 748563, 5, '700.00', '0.00', 14, '2021-04-30 03:36:50', '0.00'),
(106, '2021-04-24', 152896, 5, '200.00', '0.00', 14, '2021-04-30 03:37:12', '0.00'),
(107, '2021-04-24', 74858, 5, '0.00', '155.12', 14, '2021-04-30 03:37:51', '0.00'),
(108, '2021-04-27', 7485, 5, '0.00', '114.00', 14, '2021-04-30 03:38:25', '0.00'),
(109, '2021-04-27', 1526, 3, '4500.00', '0.00', 14, '2021-04-30 03:39:31', '0.00'),
(110, '2021-04-28', 74896, 3, '0.00', '145.00', 14, '2021-04-30 03:40:03', '0.00'),
(111, '2021-04-29', 748, 3, '0.00', '223.04', 14, '2021-04-30 03:40:33', '0.00'),
(112, '2021-05-09', 777, 4, '5000.00', '0.00', 14, '2021-05-09 14:31:14', '0.00'),
(113, '2021-04-26', 45263, 4, '0.00', '222.23', 14, '2021-05-09 14:59:57', '0.00'),
(114, '2021-04-27', 74896, 4, '0.00', '55.12', 14, '2021-05-09 15:00:01', '0.00'),
(115, '2021-04-28', 452, 4, '0.00', '12.78', 14, '2021-05-09 15:00:02', '0.00'),
(116, '2021-05-14', 1, 1, '0.00', '100.00', 16, '2021-05-10 08:03:34', '0.00'),
(117, '2021-05-10', 77777, 1, '0.00', '78.00', 16, '2021-05-10 08:37:26', '1455.78');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagador`
--

CREATE TABLE `pagador` (
  `idPagador` int(11) NOT NULL,
  `pagador` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `idPais` int(11) NOT NULL,
  `pa_provincia` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pa_ciudad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pa_direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pa_tlf` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pa_email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pa_cp` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pa_Director` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pa_tlfDirector` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pa_emailDirector` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pa_tlfEnvios` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pa_emailEnvios` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pa_GteContabilidad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pa_tlfContabilidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pa_emailContabilidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pa_horarios` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pa_contrato` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pa_inicioOperaciones` date NOT NULL,
  `pa_limite` int(11) NOT NULL,
  `pa_web` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pa_conciliarCada` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL,
  `pa_comision` decimal(3,2) NOT NULL,
  `pa_fijo` decimal(10,2) NOT NULL,
  `idTipoComision` int(11) NOT NULL,
  `idTipoEmpresa` int(11) NOT NULL,
  `pa_tasa` decimal(20,2) NOT NULL,
  `pa_tipoCambio` decimal(20,2) NOT NULL,
  `pa_impuesto` decimal(20,2) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagador`
--

INSERT INTO `pagador` (`idPagador`, `pagador`, `idPais`, `pa_provincia`, `pa_ciudad`, `pa_direccion`, `pa_tlf`, `pa_email`, `pa_cp`, `pa_Director`, `pa_tlfDirector`, `pa_emailDirector`, `pa_tlfEnvios`, `pa_emailEnvios`, `pa_GteContabilidad`, `pa_tlfContabilidad`, `pa_emailContabilidad`, `pa_horarios`, `pa_contrato`, `pa_inicioOperaciones`, `pa_limite`, `pa_web`, `pa_conciliarCada`, `idMoneda`, `pa_comision`, `pa_fijo`, `idTipoComision`, `idTipoEmpresa`, `pa_tasa`, `pa_tipoCambio`, `pa_impuesto`, `idEstado`) VALUES
(3, 'Agentejose', 1, 'Monagas', 'Maturin', 'Maturin edo Monagas', '+589696', 'agjose@gmail.com', '58969', 'jose', '+596', 'jose@gmail.com', '+58963', 'jose@gmail.com', 'pedro', '+5896', 'pedro@gmail.com', '7 a 8 am y 2 a 6 pm', '74896', '2021-04-19', 5000, 'www.jose.com', 30, 1, '5.31', '2.12', 3, 1, '1.35', '2450.45', '16.43', 1),
(4, 'Pagadorjose', 5, 'Quito', 'Quito', 'Quito', '+589', 'pagjose@gmail.com', '78596', 'pajose', '+5896', 'pagjose@gmail.com', '+5896', 'pagjose@gmail.com', 'jose', '+59963', 'pagjose@gmail.com', '7 a 8 am y 2 a 6 pm', '748596', '2021-04-19', 7851, 'www.pajose.com', 30, 2, '4.78', '1.00', 3, 2, '1.23', '0.90', '16.12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `pais`) VALUES
(1, 'Venezuela'),
(2, 'Ecuador'),
(3, 'EEUU'),
(4, 'España'),
(5, 'Suiza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocomision`
--

CREATE TABLE `tipocomision` (
  `idTipoComision` int(11) NOT NULL,
  `tipoComision` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipocomision`
--

INSERT INTO `tipocomision` (`idTipoComision`, `tipoComision`) VALUES
(1, 'Porcentual'),
(2, 'Fijo'),
(3, 'Mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocuenta`
--

CREATE TABLE `tipocuenta` (
  `idTipoCuenta` int(11) NOT NULL,
  `tipoCuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipocuenta`
--

INSERT INTO `tipocuenta` (`idTipoCuenta`, `tipoCuenta`) VALUES
(1, 'Ahorro'),
(2, 'Corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoempresa`
--

CREATE TABLE `tipoempresa` (
  `idTipoEmpresa` int(11) NOT NULL,
  `tipoEmpresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipoempresa`
--

INSERT INTO `tipoempresa` (`idTipoEmpresa`, `tipoEmpresa`) VALUES
(1, 'Agente'),
(2, 'Corresponsal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporetiro`
--

CREATE TABLE `tiporetiro` (
  `idTipoRetiro` int(11) NOT NULL,
  `tipoRetiro` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiporetiro`
--

INSERT INTO `tiporetiro` (`idTipoRetiro`, `tipoRetiro`) VALUES
(1, 'Ventanilla'),
(2, 'Deposito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporol`
--

CREATE TABLE `tiporol` (
  `idTipoRol` int(11) NOT NULL,
  `rol` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tiporol`
--

INSERT INTO `tiporol` (`idTipoRol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Consultor'),
(4, 'Validador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `us_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `us_apellido` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `us_direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `us_tlf` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `us_email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `us_clave` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `us_identificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `us_ciudad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `idPagador` int(11) NOT NULL,
  `idTipoRol` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `us_nombre`, `us_apellido`, `us_direccion`, `us_tlf`, `us_email`, `us_clave`, `us_identificacion`, `us_ciudad`, `idPagador`, `idTipoRol`, `idEstado`) VALUES
(14, 'jose', 'cedeno', 'maturin', '+589639', 'cedenojlj@gmail.com', '$2y$10$.fWia3eVC/QNl7Y20.uRzes3SpThD7OpDiFjzdtmSOb/viQIOYvoi', '125896', 'maturin', 3, 1, 1),
(15, 'pedro', 'perez', 'maturin', '+589639', 'perez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '7458968', 'maturin', 4, 1, 1),
(16, 'paco', 'silvert', 'ecuador', '+589689633', 'paco@gmail.com', '$2y$10$x8pVdcd6gipkL7n8Rj0KV.LLJGGxuxtaFnWh6lWOwf1AWKgBVbgoG', '15263', 'quito', 3, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`idBanco`),
  ADD KEY `idPais` (`idPais`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`idBeneficiario`),
  ADD KEY `idPais` (`idPais`),
  ADD KEY `idTipoIdentidad` (`idTipoIdentidad`),
  ADD KEY `idTipoCuenta` (`idTipoCuenta`),
  ADD KEY `idBanco` (`idBanco`),
  ADD KEY `idMoneda` (`idMoneda`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idPais` (`idPais`),
  ADD KEY `idTipoIdentidad` (`idTipoIdentidad`),
  ADD KEY `idMoneda` (`idMoneda`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`idCuenta`),
  ADD KEY `idBanco` (`idBanco`),
  ADD KEY `idTipoCuenta` (`idTipoCuenta`),
  ADD KEY `idPagador` (`idPagador`),
  ADD KEY `idMoneda` (`idMoneda`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `estadogiro`
--
ALTER TABLE `estadogiro`
  ADD PRIMARY KEY (`idEstadoGiro`);

--
-- Indices de la tabla `giro`
--
ALTER TABLE `giro`
  ADD PRIMARY KEY (`idGiro`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idUsuario_2` (`idUsuario`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idBeneficiario` (`idBeneficiario`),
  ADD KEY `idAgente` (`idAgente`),
  ADD KEY `idPagador` (`idPagador`),
  ADD KEY `idPais` (`idPais`),
  ADD KEY `idMonedaCobro` (`idMonedaCobro`),
  ADD KEY `idMonedaPago` (`idMonedaPago`),
  ADD KEY `idTipoRetiro` (`idTipoRetiro`),
  ADD KEY `idEstadoGiro` (`idEstadoGiro`);

--
-- Indices de la tabla `identidad`
--
ALTER TABLE `identidad`
  ADD PRIMARY KEY (`idTipoIdentidad`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`idMoneda`),
  ADD KEY `idPais` (`idPais`);

--
-- Indices de la tabla `monedaenvio`
--
ALTER TABLE `monedaenvio`
  ADD PRIMARY KEY (`idMonedaEnvio`),
  ADD KEY `idPais` (`idPais`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `idCuenta` (`idCuenta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `pagador`
--
ALTER TABLE `pagador`
  ADD PRIMARY KEY (`idPagador`),
  ADD KEY `idPais` (`idPais`),
  ADD KEY `idMoneda` (`idMoneda`),
  ADD KEY `idTipoComision` (`idTipoComision`),
  ADD KEY `idTipoEmpresa` (`idTipoEmpresa`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `tipocomision`
--
ALTER TABLE `tipocomision`
  ADD PRIMARY KEY (`idTipoComision`);

--
-- Indices de la tabla `tipocuenta`
--
ALTER TABLE `tipocuenta`
  ADD PRIMARY KEY (`idTipoCuenta`);

--
-- Indices de la tabla `tipoempresa`
--
ALTER TABLE `tipoempresa`
  ADD PRIMARY KEY (`idTipoEmpresa`);

--
-- Indices de la tabla `tiporetiro`
--
ALTER TABLE `tiporetiro`
  ADD PRIMARY KEY (`idTipoRetiro`);

--
-- Indices de la tabla `tiporol`
--
ALTER TABLE `tiporol`
  ADD PRIMARY KEY (`idTipoRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idPagador` (`idPagador`),
  ADD KEY `idTipoRol` (`idTipoRol`),
  ADD KEY `idEstado` (`idEstado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `idBanco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `idBeneficiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `idCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estadogiro`
--
ALTER TABLE `estadogiro`
  MODIFY `idEstadoGiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `giro`
--
ALTER TABLE `giro`
  MODIFY `idGiro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `identidad`
--
ALTER TABLE `identidad`
  MODIFY `idTipoIdentidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `idMoneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `monedaenvio`
--
ALTER TABLE `monedaenvio`
  MODIFY `idMonedaEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idMovimiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `pagador`
--
ALTER TABLE `pagador`
  MODIFY `idPagador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipocomision`
--
ALTER TABLE `tipocomision`
  MODIFY `idTipoComision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipocuenta`
--
ALTER TABLE `tipocuenta`
  MODIFY `idTipoCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoempresa`
--
ALTER TABLE `tipoempresa`
  MODIFY `idTipoEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiporetiro`
--
ALTER TABLE `tiporetiro`
  MODIFY `idTipoRetiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiporol`
--
ALTER TABLE `tiporol`
  MODIFY `idTipoRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `banco`
--
ALTER TABLE `banco`
  ADD CONSTRAINT `banco_ibfk_1` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`idBanco`) REFERENCES `banco` (`idBanco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beneficiario_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beneficiario_ibfk_3` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beneficiario_ibfk_4` FOREIGN KEY (`idTipoIdentidad`) REFERENCES `identidad` (`idTipoIdentidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beneficiario_ibfk_5` FOREIGN KEY (`idTipoCuenta`) REFERENCES `tipocuenta` (`idTipoCuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beneficiario_ibfk_6` FOREIGN KEY (`idMoneda`) REFERENCES `moneda` (`idMoneda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`idTipoIdentidad`) REFERENCES `identidad` (`idTipoIdentidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`idMoneda`) REFERENCES `moneda` (`idMoneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_4` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`idTipoCuenta`) REFERENCES `tipocuenta` (`idTipoCuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuenta_ibfk_2` FOREIGN KEY (`idBanco`) REFERENCES `banco` (`idBanco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuenta_ibfk_3` FOREIGN KEY (`idPagador`) REFERENCES `pagador` (`idPagador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuenta_ibfk_4` FOREIGN KEY (`idMoneda`) REFERENCES `moneda` (`idMoneda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `giro`
--
ALTER TABLE `giro`
  ADD CONSTRAINT `giro_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_10` FOREIGN KEY (`idEstadoGiro`) REFERENCES `estadogiro` (`idEstadoGiro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_11` FOREIGN KEY (`idMonedaPago`) REFERENCES `monedaenvio` (`idMonedaEnvio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_3` FOREIGN KEY (`idBeneficiario`) REFERENCES `beneficiario` (`idBeneficiario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_4` FOREIGN KEY (`idPagador`) REFERENCES `pagador` (`idPagador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_5` FOREIGN KEY (`idAgente`) REFERENCES `pagador` (`idPagador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_6` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_7` FOREIGN KEY (`idMonedaCobro`) REFERENCES `moneda` (`idMoneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giro_ibfk_9` FOREIGN KEY (`idTipoRetiro`) REFERENCES `tiporetiro` (`idTipoRetiro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD CONSTRAINT `moneda_ibfk_1` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `monedaenvio`
--
ALTER TABLE `monedaenvio`
  ADD CONSTRAINT `monedaenvio_ibfk_1` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagador`
--
ALTER TABLE `pagador`
  ADD CONSTRAINT `pagador_ibfk_1` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pagador_ibfk_2` FOREIGN KEY (`idMoneda`) REFERENCES `moneda` (`idMoneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pagador_ibfk_3` FOREIGN KEY (`idTipoComision`) REFERENCES `tipocomision` (`idTipoComision`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pagador_ibfk_4` FOREIGN KEY (`idTipoEmpresa`) REFERENCES `tipoempresa` (`idTipoEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pagador_ibfk_5` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idPagador`) REFERENCES `pagador` (`idPagador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`idTipoRol`) REFERENCES `tiporol` (`idTipoRol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
