-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2021 a las 01:33:42
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

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
(8, 'CUTLUYA', 'perez', '2021-06-03', 1, 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '748585', 1, '', '', '', '', '12345678912345678933', 1, 5, 3, 1),
(9, 'JOSE FELIX', 'perez', '2021-07-03', 1, 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '7859', 1, 'venezolano', '', '', '', '12345678912345678933', 1, 4, 1, 1);

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
(4, 'illeny', 'bermudez', '2021-03-01', 3, 'maturin', 'maturin', 'maturin edo monagas', '+5896', 'illeny@gmail.com', '14256', 1, '2021-03-29', '2021-04-30', 'venezolano', 'illeny', '+5896', '+58996', 10000, 1, 1, 'collarin 2.png', 'collarin.png', 'camilla.png'),
(5, 'Andres', 'Villalobos', '2021-03-09', 4, 'caracas', 'caracas', 'caracas venezuela', '+5885', 'andres@gmail.com', '45896', 2, '2021-04-20', '2021-04-07', 'venezolano', 'andres', '+5896', '+5896', 452896, 4, 2, '', '', ''),
(7, 'ALIAR', 'perez', '2021-07-08', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-18', 'ecuatoriano', '', '', '', 1230, 1, 1, 'material inmovilizador.png', 'collarin.png', 'doctora.png'),
(9, 'CUTLUYA', 'perez', '0000-00-00', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-02', 'ecuatoriano', '', '', '', 1230, 1, 1, 'procesadores.jpg', '', ''),
(10, 'CUTLUYA', 'perez', '0000-00-00', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-12', 'ecuatoriano', '', '', '', 1230, 1, 1, 'factura.PNG', '', ''),
(11, 'BASILIUS', 'perez', '2021-06-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-02', '2021-06-18', 'ecuatoriano', '', '', '', 1230, 1, 1, 'images.jpg', '', ''),
(12, 'BANSI', 'perez', '2021-06-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-05-30', '2021-06-03', 'ecuatoriano', '', '', '', 1230, 1, 1, 'images.jpg', '', ''),
(13, 'VALE', 'perez', '2021-06-02', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-06-09', '2021-10-17', 'ecuatoriano', '', '', '', 1230, 1, 1, '', '', ''),
(14, 'JOSE FELIX', 'perez', '2021-07-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-07-03', '2021-07-31', 'ecuatoriano', '', '', '', 1230, 1, 1, 'pic_20210703195129.jpeg', '', ''),
(15, 'antonio', 'perez', '2021-07-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-07-03', '2021-07-31', 'ecuatoriano', '', '', '', 1230, 1, 1, 'pic_20210703235540.jpeg', '', ''),
(16, 'JOSE FELIX', 'perez', '2021-07-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-07-03', '2021-07-31', 'ecuatoriano', '', '', '', 1230, 1, 1, 'afiche.JPG', '', ''),
(17, 'CUTLUYA', 'perez', '2021-07-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-07-03', '2021-07-31', 'ecuatoriano', '', '', '', 1230, 1, 1, 'pic_20210704000111.jpeg', '', ''),
(18, 'ALIAR', 'perez', '2021-07-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-07-03', '2021-07-31', 'ecuatoriano', '', '', '', 1230, 1, 1, 'afiche.JPG', '', ''),
(19, 'BASILIUS', 'perez', '2021-07-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-07-03', '2021-07-31', 'ecuatoriano', '', '', '', 1230, 1, 1, 'pic_20210704003931.jpeg', '', ''),
(20, 'BASILIUS', 'perez', '2021-07-03', 1, 'Activo', 'maturin', 'maturin', '+589689633', 'antonio@gmail.com', '1452368', 1, '2021-07-03', '2021-07-31', 'ecuatoriano', '', '', '', 1230, 1, 1, 'afiche.JPG', '', '');

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
  `gi_comentario` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `comisionMatriz` decimal(65,2) NOT NULL,
  `comisionAgente` decimal(65,2) NOT NULL,
  `comisionCorresponsal` decimal(65,2) NOT NULL,
  `beneficio` decimal(65,2) NOT NULL,
  `TasaFrancoDolar` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `giro`
--

INSERT INTO `giro` (`idGiro`, `gi_fecha`, `idUsuario`, `idCliente`, `idBeneficiario`, `idAgente`, `idPagador`, `idPais`, `gi_importe`, `gi_Total`, `gi_TotalLocal`, `idMonedaCobro`, `idMonedaPago`, `gi_tasa`, `gi_tipoCambio`, `gi_impuesto`, `idTipoRetiro`, `gi_Banco`, `gi_numCta`, `gi_TipoCuenta`, `idEstadoGiro`, `gi_clave`, `gi_comentario`, `comisionMatriz`, `comisionAgente`, `comisionCorresponsal`, `beneficio`, `TasaFrancoDolar`) VALUES
(1, '2021-04-02', 14, 4, 1, 3, 4, 1, '1000.00', '1120.00', '830.00', 1, 2, '1.23', '2123.45', '16.00', 2, 'venezuela', '125636', 'ahorro', 2, '12563', 'comentario', '0.00', '0.00', '0.00', '0.00', '0.00'),
(2, '2021-04-05', 14, 4, 1, 3, 4, 1, '2000.00', '2120.00', '1830.00', 1, 2, '1.33', '3123.45', '16.00', 2, 'venezuela', '125636', 'ahorro', 3, '12563', 'comentario', '0.00', '0.00', '0.00', '0.00', '0.00'),
(3, '2021-04-07', 14, 4, 1, 3, 4, 1, '3000.00', '3120.00', '830.00', 1, 2, '1.23', '2123.45', '16.00', 2, 'venezuela', '125636', 'ahorro', 1, '12563', 'comentario', '0.00', '0.00', '0.00', '0.00', '0.00'),
(4, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '1102.13', 1, 1, '0.00', '0.00', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 2, 'AwIynRl7r2', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(5, '2021-04-30', 14, 1, 1, 3, 4, 2, '100.00', '111.32', '82.46', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 2, '8ZR4hpwJpo', 'comentario de ejemplo', '0.00', '0.00', '0.00', '0.00', '0.00'),
(6, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '816.39', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 2, 'Doy16gme8E', 'comentario de ejemplo', '0.00', '0.00', '0.00', '0.00', '0.00'),
(7, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '816.39', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'SrsxkpppRH', 'comentario de ejemplo', '0.00', '0.00', '0.00', '0.00', '0.00'),
(8, '2021-04-30', 14, 1, 1, 3, 4, 1, '1000.00', '1102.13', '816.39', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '5h50m44N1z', 'comentario de ejemplo', '0.00', '0.00', '0.00', '0.00', '0.00'),
(9, '2021-04-30', 14, 1, 1, 3, 4, 1, '5000.00', '5505.73', '4078.32', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '9D2kE5uNAM', 'comentario de ejemplo', '0.00', '0.00', '0.00', '0.00', '0.00'),
(10, '2021-04-30', 14, 4, 1, 3, 4, 1, '100.00', '5505.73', '4078.32', 2, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 3, 'dmIdMziFwn', 'comentario de ejemplo', '0.00', '0.00', '0.00', '0.00', '0.00'),
(11, '2021-05-06', 14, 1, 1, 3, 4, 1, '100.00', '111.32', '111.32', 1, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'enZYw5aPFK', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(12, '2021-05-06', 14, 1, 1, 3, 4, 1, '100.00', '111.32', '111.32', 1, 1, '1.23', '2123.45', '0.00', 2, 'Banco Caroni', '478596', 'Corriente', 1, '45R9NmxNoT', 'comentario', '0.00', '0.00', '0.00', '0.00', '0.00'),
(13, '2021-05-06', 16, 1, 1, 3, 4, 1, '12.00', '14.44', '14.44', 1, 1, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'IVIO7Arbso', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(16, '2021-05-20', 16, 5, 1, 3, 4, 5, '10.00', '1737.00', '2004.00', 2, 4, '1.23', '2123.45', '0.00', 1, 'caroni', '47859', 'corriente', 1, 'm2sbpI9CTR', 'coment', '0.00', '0.00', '0.00', '0.00', '0.00'),
(21, '2021-05-20', 16, 5, 1, 3, 4, 5, '10.00', '1737.39', '2004.94', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'ExG2aXXx6d', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(22, '2021-05-20', 16, 5, 1, 3, 4, 5, '22.00', '1750.60', '2020.19', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '3AfCXQ0hbL', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(23, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '9xd8WvEdfm', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(24, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'NR874Yxdeu', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(25, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'jVxQt2B35N', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(26, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'V8sSgAdwhV', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(27, '2021-05-25', 16, 5, 1, 3, 4, 5, '1.00', '1727.48', '1993.51', 2, 4, '1.23', '2123.45', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, '2LkQsqUGmT', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(28, '2021-06-01', 16, 13, 3, 3, 4, 5, '29.90', '36.73', '100000.00', 3, 4, '1.23', '0.90', '0.00', 1, 'Banco de Venezuela', '12345678912345678933', 'Ahorro', 1, '3iLoSS4aQS', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(29, '2021-06-16', 16, 13, 1, 3, 4, 5, '100.00', '126.37', '208701.58', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'VJEWCmLtLw', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(30, '2021-06-17', 16, 11, 1, 3, 4, 5, '120.00', '230223.32', '198176.81', 3, 4, '2.47', '1.88', '0.00', 2, 'Banco Caroni', '478596', 'Corriente', 1, 'QcddHz3fBc', '', '10.32', '0.42', '3.01', '6.88', '0.00'),
(31, '2021-06-17', 16, 11, 1, 3, 4, 5, '181.66', '340599.66', '300000.00', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'mK1BDBSkPj', '', '13.08', '0.54', '3.01', '9.53', '0.00'),
(32, '2021-06-17', 16, 11, 1, 3, 4, 5, '120.00', '230223.32', '198176.81', 3, 4, '2.47', '1.88', '0.00', 2, 'Banco Caroni', '478596', 'Corriente', 1, 'NjIUK9EOoL', '', '10.32', '0.42', '3.01', '6.88', '0.00'),
(33, '2021-06-17', 16, 11, 1, 3, 4, 5, '181.66', '340599.66', '300000.00', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'qYmZxigPgm', '', '13.08', '0.54', '3.01', '9.53', '0.00'),
(34, '2021-06-18', 16, 11, 1, 3, 4, 5, '181.66', '340599.66', '300000.00', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'ZcM5uJg7ZT', '', '13.08', '0.54', '3.01', '9.53', '1.18'),
(35, '2021-06-18', 16, 11, 1, 3, 4, 5, '181.66', '340599.66', '300000.00', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'HkwNbEHw9g', '', '13.08', '0.54', '3.01', '9.53', '1.18'),
(36, '2021-06-21', 14, 13, 8, 3, 4, 5, '181.66', '331387.36', '300000.00', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '12345678912345678933', 'Ahorro', 1, '3vERfIc4OM', '', '10.11', '0.42', '3.01', '6.68', '2.33'),
(37, '2021-06-21', 14, 13, 8, 3, 4, 5, '302.76', '545647.36', '500000.00', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '12345678912345678933', 'Ahorro', 1, 'w0op6elRAX', '', '14.70', '0.60', '3.01', '11.08', '2.33'),
(38, '2021-07-04', 16, 18, 1, 3, 4, 5, '242.21', '482875.57', '400000.00', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'N3yVyQJC2X', '', '18.38', '5.30', '3.01', '18.38', '0.91'),
(39, '2021-07-11', 16, 14, 1, 3, 4, 5, '181.66', '368353.20', '300006.66', 3, 4, '2.47', '1.88', '0.00', 1, 'Banco Caroni', '478596', 'Corriente', 1, 'Vo51o5IMKU', '', '15.03', '3.97', '3.01', '15.03', '0.91');

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
  `moneda` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`idMoneda`, `mo_codigo`, `moneda`) VALUES
(1, 'USD', 'Dolar EEUU'),
(2, 'EURO', 'Union Europea'),
(3, 'BS', 'Bolivares'),
(4, 'CHF', 'Francos Suizo'),
(5, 'AFN', 'Afgani afgano'),
(6, 'ALL', 'Lek'),
(7, 'DZD', 'Dinar argelino'),
(8, 'AOA', 'Kwanza angoleño'),
(9, 'XCD', 'Dolardel Caribe Oriental'),
(10, 'SAR', 'Riyal saudI'),
(11, 'ARS', 'Peso argentino'),
(12, 'AMD', 'Dram armenio'),
(13, 'AWG', 'FlorIn arubeño'),
(14, 'AUD', 'Dolaraustraliano'),
(15, 'AZN', 'Manat azerbaiyano'),
(16, 'BSD', 'Dolarbahameño'),
(17, 'BDT', 'Taka'),
(18, 'BBD', 'Dolarde Barbados'),
(19, 'BHD', 'Dinar bareinI'),
(20, 'BZD', 'Dolarbeliceño'),
(21, 'XOF', 'Franco CFA de Africa Occidental'),
(22, 'BMD', 'Dolarbermudeño'),
(23, 'BYR', 'Rublo bielorruso'),
(24, 'MMK', 'Kyat birmano'),
(25, 'BOB', 'Boliviano'),
(26, 'BAM', 'Marco bosnioherzegovino'),
(27, 'BWP', 'Pula'),
(28, 'BRL', 'Real brasileño'),
(29, 'BND', 'Dolarde Brunei'),
(30, 'BGN', 'Lev'),
(31, 'BIF', 'Franco burundEs'),
(32, 'BTN', 'Ngultrum butanEs'),
(33, 'CVE', 'Escudo caboverdiano'),
(34, 'KHR', 'Riel camboyano'),
(35, 'XAF', 'Franco CFA de Africa Central'),
(36, 'CAD', 'Dolarcanadiense'),
(37, 'CLP', 'Peso chileno'),
(38, 'CNY', 'Renminbi'),
(39, 'COP', 'Peso colombiano'),
(40, 'KMF', 'Franco comorense'),
(41, 'CDF', 'Franco congoleño'),
(42, 'CRC', 'ColOn costarricense'),
(43, 'HRK', 'Kuna'),
(44, 'CUP', 'Peso cubano'),
(45, 'ANG', 'FlorIn antillano neerlandEs'),
(46, 'DKK', 'Corona danesa'),
(47, 'EGP', 'Libra egipcia'),
(48, 'AED', 'Dirham DE EAU'),
(49, 'ERN', 'Nakfa'),
(50, 'ETB', 'Birr etIope'),
(51, 'FJD', 'Dolarfiyiano'),
(52, 'PHP', 'Peso filipino'),
(53, 'XDR', 'SDR (Derecho Especial de Retiro)'),
(54, 'GMD', 'Dalasi'),
(55, 'GEL', 'Lari'),
(56, 'GHS', 'Cedi'),
(57, 'GIP', 'Libra gibraltareña'),
(58, 'GTQ', 'Quetzal'),
(59, 'GBP', 'Libra esterlina'),
(60, 'GNF', 'Franco guineano'),
(61, 'GYD', 'DolarguyanEs'),
(62, 'HNL', 'Lempira'),
(63, 'HKD', 'Dolarde Hong Kong'),
(64, 'HUF', 'Forinto hUngaro'),
(65, 'INR', 'Rupia india'),
(66, 'IDR', 'Rupia indonesia'),
(67, 'IQD', 'Dinar iraquI'),
(68, 'NOK', 'Corona noruega'),
(69, 'ISK', 'Corona islandesa'),
(70, 'KYD', 'Dolarde las Islas Cayman'),
(71, 'NZD', 'Dolarde la Islas Cook'),
(72, 'FKP', 'Libra malvinense'),
(73, 'SBD', 'Dolarde Islas SalomOn'),
(74, 'ILS', 'Nuevo sEquel'),
(75, 'JMD', 'Dolarjamaiquino'),
(76, 'JPY', 'Yen'),
(77, 'JOD', 'Dinar jordano'),
(78, 'KZT', 'Tenge kazajo'),
(79, 'KES', 'ChelIn keniano'),
(80, 'KGS', 'Som'),
(81, 'KWD', 'Dinar kuwaitI'),
(82, 'LSL', 'Loti'),
(83, 'LRD', 'Dolarliberiano'),
(84, 'LYD', 'Dinar libio'),
(85, 'LBP', 'Libra libanesa'),
(86, 'MOP', 'Pataca'),
(87, 'MKD', 'Dinar'),
(88, 'MGA', 'Ariary malgache'),
(89, 'MYR', 'Ringgit malayo'),
(90, 'MWK', 'Kwacha malauI'),
(91, 'MVR', 'Rupia de maldivas'),
(92, 'MAD', 'DIrham marroquI'),
(93, 'MUR', 'Rupia de Mauricio'),
(94, 'MRO', 'Uguiya'),
(95, 'MNT', 'Tugrik'),
(96, 'MZN', 'Metical mozambiqueño'),
(97, 'MXN', 'Peso mexicano'),
(98, 'NAD', 'Dolarde Namibia'),
(99, 'NPR', 'Rupia nepalI'),
(100, 'NIO', 'COrdoba oro'),
(101, 'XPF', 'Franco CFP'),
(102, 'OMR', 'Rial omanI'),
(103, 'XUA', 'BAD UNIDAD DE CUENTAS'),
(104, 'PKR', 'Rupia pakistanI'),
(105, 'PGK', 'Kina'),
(106, 'PYG', 'GuaranI'),
(107, 'PEN', 'Nuevo Sol'),
(108, 'PLN', 'Zloty'),
(109, 'QAR', 'Riyal catarI'),
(110, 'LAK', 'Kip laosiano'),
(111, 'CZK', 'Czech Koruna'),
(112, 'KRW', 'Won'),
(113, 'MDL', 'Leu Moldavo'),
(114, 'KPW', 'Won norcoreano'),
(115, 'DOP', 'Peso dominicano'),
(116, 'IRR', 'Rial iranI'),
(117, 'TZS', 'ChelIn tanzano'),
(118, 'SYP', 'Libra siria'),
(119, 'RWF', 'Franco ruandEs'),
(120, 'RON', 'Leu rumano'),
(121, 'RUB', 'Rublo ruso'),
(122, 'WST', 'Tala'),
(123, 'STD', 'Dobra'),
(124, 'SHP', 'Libra de Santa Helena'),
(125, 'RSD', 'Dinar serbio'),
(126, 'SCR', 'Rupia de Seychelles'),
(127, 'SLL', 'Leone'),
(128, 'SGD', 'Dolarde Singapur'),
(129, 'SOS', 'ChelIn somalI'),
(130, 'LKR', 'Rupia de Sri Lanka'),
(131, 'SZL', 'Lilangeni'),
(132, 'ZAR', 'Rand'),
(133, 'SDG', 'Libra sudanesa'),
(134, 'SSP', 'Libra sursudanesa'),
(135, 'SEK', 'Corona sueca'),
(136, 'SRD', 'Dolarde Surinam'),
(137, 'THB', 'Baht'),
(138, 'TWD', 'Nuevo Dolarde TaiwAn'),
(139, 'TJS', 'Somoni'),
(140, 'TOP', 'Pa’anga'),
(141, 'TTD', 'Dolarde Trinidad y Tobago'),
(142, 'TMT', 'Manat turcomano'),
(143, 'TRY', 'Lira turca'),
(144, 'TND', 'Dinar tunecino'),
(145, 'UGX', 'ChelIn ugandEs'),
(146, 'UAH', 'Grivnia'),
(147, 'UYU', 'Peso uruguayo'),
(148, 'UZS', 'Som uzbeko'),
(149, 'VUV', 'Vatu'),
(150, 'VND', 'Dong'),
(151, 'YER', 'Rial yemenI'),
(152, 'DJF', 'Franco yibutiano'),
(153, 'ZMW', 'Kwacha zambiano'),
(154, 'ZWL', 'Dolarzimbabuense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedaenvio`
--

CREATE TABLE `monedaenvio` (
  `idMonedaEnvio` int(11) NOT NULL,
  `mo_codigo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `moneda` varchar(250) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `monedaenvio`
--

INSERT INTO `monedaenvio` (`idMonedaEnvio`, `mo_codigo`, `moneda`) VALUES
(1, 'USD', 'Dollar EEUU'),
(2, 'EURO', 'Union Europea'),
(3, 'BS', 'Bolivares'),
(4, 'FR', 'Francos'),
(5, 'AFN', 'Afgani afgano'),
(6, 'ALL', 'Lek'),
(7, 'DZD', 'Dinar argelino'),
(8, 'AOA', 'Kwanza angoleño'),
(9, 'XCD', 'Dolardel Caribe Oriental'),
(10, 'SAR', 'Riyal saudI'),
(11, 'ARS', 'Peso argentino'),
(12, 'AMD', 'Dram armenio'),
(13, 'AWG', 'FlorIn arubeño'),
(14, 'AUD', 'Dolaraustraliano'),
(15, 'AZN', 'Manat azerbaiyano'),
(16, 'BSD', 'Dolarbahameño'),
(17, 'BDT', 'Taka'),
(18, 'BBD', 'Dolarde Barbados'),
(19, 'BHD', 'Dinar bareinI'),
(20, 'BZD', 'Dolarbeliceño'),
(21, 'XOF', 'Franco CFA de Africa Occidental'),
(22, 'BMD', 'Dolarbermudeño'),
(23, 'BYR', 'Rublo bielorruso'),
(24, 'MMK', 'Kyat birmano'),
(25, 'BOB', 'Boliviano'),
(26, 'BAM', 'Marco bosnioherzegovino'),
(27, 'BWP', 'Pula'),
(28, 'BRL', 'Real brasileño'),
(29, 'BND', 'Dolarde Brunei'),
(30, 'BGN', 'Lev'),
(31, 'BIF', 'Franco burundEs'),
(32, 'BTN', 'Ngultrum butanEs'),
(33, 'CVE', 'Escudo caboverdiano'),
(34, 'KHR', 'Riel camboyano'),
(35, 'XAF', 'Franco CFA de Africa Central'),
(36, 'CAD', 'Dolarcanadiense'),
(37, 'CLP', 'Peso chileno'),
(38, 'CNY', 'Renminbi'),
(39, 'COP', 'Peso colombiano'),
(40, 'KMF', 'Franco comorense'),
(41, 'CDF', 'Franco congoleño'),
(42, 'CRC', 'ColOn costarricense'),
(43, 'HRK', 'Kuna'),
(44, 'CUP', 'Peso cubano'),
(45, 'ANG', 'FlorIn antillano neerlandEs'),
(46, 'DKK', 'Corona danesa'),
(47, 'EGP', 'Libra egipcia'),
(48, 'AED', 'Dirham DE EAU'),
(49, 'ERN', 'Nakfa'),
(50, 'ETB', 'Birr etIope'),
(51, 'FJD', 'Dolarfiyiano'),
(52, 'PHP', 'Peso filipino'),
(53, 'XDR', 'SDR (Derecho Especial de Retiro)'),
(54, 'GMD', 'Dalasi'),
(55, 'GEL', 'Lari'),
(56, 'GHS', 'Cedi'),
(57, 'GIP', 'Libra gibraltareña'),
(58, 'GTQ', 'Quetzal'),
(59, 'GBP', 'Libra esterlina'),
(60, 'GNF', 'Franco guineano'),
(61, 'GYD', 'DolarguyanEs'),
(62, 'HNL', 'Lempira'),
(63, 'HKD', 'Dolarde Hong Kong'),
(64, 'HUF', 'Forinto hUngaro'),
(65, 'INR', 'Rupia india'),
(66, 'IDR', 'Rupia indonesia'),
(67, 'IQD', 'Dinar iraquI'),
(68, 'NOK', 'Corona noruega'),
(69, 'ISK', 'Corona islandesa'),
(70, 'KYD', 'Dolarde las Islas Cayman'),
(71, 'NZD', 'Dolarde la Islas Cook'),
(72, 'FKP', 'Libra malvinense'),
(73, 'SBD', 'Dolarde Islas SalomOn'),
(74, 'ILS', 'Nuevo sEquel'),
(75, 'JMD', 'Dolarjamaiquino'),
(76, 'JPY', 'Yen'),
(77, 'JOD', 'Dinar jordano'),
(78, 'KZT', 'Tenge kazajo'),
(79, 'KES', 'ChelIn keniano'),
(80, 'KGS', 'Som'),
(81, 'KWD', 'Dinar kuwaitI'),
(82, 'LSL', 'Loti'),
(83, 'LRD', 'Dolarliberiano'),
(84, 'LYD', 'Dinar libio'),
(85, 'LBP', 'Libra libanesa'),
(86, 'MOP', 'Pataca'),
(87, 'MKD', 'Dinar'),
(88, 'MGA', 'Ariary malgache'),
(89, 'MYR', 'Ringgit malayo'),
(90, 'MWK', 'Kwacha malauI'),
(91, 'MVR', 'Rupia de maldivas'),
(92, 'MAD', 'DIrham marroquI'),
(93, 'MUR', 'Rupia de Mauricio'),
(94, 'MRO', 'Uguiya'),
(95, 'MNT', 'Tugrik'),
(96, 'MZN', 'Metical mozambiqueño'),
(97, 'MXN', 'Peso mexicano'),
(98, 'NAD', 'Dolarde Namibia'),
(99, 'NPR', 'Rupia nepalI'),
(100, 'NIO', 'COrdoba oro'),
(101, 'XPF', 'Franco CFP'),
(102, 'OMR', 'Rial omanI'),
(103, 'XUA', 'BAD UNIDAD DE CUENTAS'),
(104, 'PKR', 'Rupia pakistanI'),
(105, 'PGK', 'Kina'),
(106, 'PYG', 'GuaranI'),
(107, 'PEN', 'Nuevo Sol'),
(108, 'PLN', 'Zloty'),
(109, 'QAR', 'Riyal catarI'),
(110, 'LAK', 'Kip laosiano'),
(111, 'CZK', 'Czech Koruna'),
(112, 'KRW', 'Won'),
(113, 'MDL', 'Leu Moldavo'),
(114, 'KPW', 'Won norcoreano'),
(115, 'DOP', 'Peso dominicano'),
(116, 'IRR', 'Rial iranI'),
(117, 'TZS', 'ChelIn tanzano'),
(118, 'SYP', 'Libra siria'),
(119, 'RWF', 'Franco ruandEs'),
(120, 'RON', 'Leu rumano'),
(121, 'RUB', 'Rublo ruso'),
(122, 'WST', 'Tala'),
(123, 'STD', 'Dobra'),
(124, 'SHP', 'Libra de Santa Helena'),
(125, 'RSD', 'Dinar serbio'),
(126, 'SCR', 'Rupia de Seychelles'),
(127, 'SLL', 'Leone'),
(128, 'SGD', 'Dolarde Singapur'),
(129, 'SOS', 'ChelIn somalI'),
(130, 'LKR', 'Rupia de Sri Lanka'),
(131, 'SZL', 'Lilangeni'),
(132, 'ZAR', 'Rand'),
(133, 'SDG', 'Libra sudanesa'),
(134, 'SSP', 'Libra sursudanesa'),
(135, 'SEK', 'Corona sueca'),
(136, 'SRD', 'Dolarde Surinam'),
(137, 'THB', 'Baht'),
(138, 'TWD', 'Nuevo Dolarde TaiwAn'),
(139, 'TJS', 'Somoni'),
(140, 'TOP', 'Pa’anga'),
(141, 'TTD', 'Dolarde Trinidad y Tobago'),
(142, 'TMT', 'Manat turcomano'),
(143, 'TRY', 'Lira turca'),
(144, 'TND', 'Dinar tunecino'),
(145, 'UGX', 'ChelIn ugandEs'),
(146, 'UAH', 'Grivnia'),
(147, 'UYU', 'Peso uruguayo'),
(148, 'UZS', 'Som uzbeko'),
(149, 'VUV', 'Vatu'),
(150, 'VND', 'Dong'),
(151, 'YER', 'Rial yemenI'),
(152, 'DJF', 'Franco yibutiano'),
(153, 'ZMW', 'Kwacha zambiano'),
(154, 'ZWL', 'Dolarzimbabuense');

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
(3, 'Agentejose', 1, 'Monagas', 'Maturin', 'Maturin edo Monagas', '+589696', 'agjose@gmail.com', '58969', 'jose', '+596', 'jose@gmail.com', '+58963', 'jose@gmail.com', 'pedro', '+5896', 'pedro@gmail.com', '7 a 8 am y 2 a 6 pm', '74896', '2021-04-19', 5000, 'www.jose.com', 30, 1, '4.11', '1.88', 1, 1, '1.24', '3104.77', '16.43', 1),
(4, 'Pagadorjose', 5, 'Quito', 'Quito', 'Quito', '+589', 'pagjose@gmail.com', '78596', 'pajose', '+5896', 'pagjose@gmail.com', '+5896', 'pagjose@gmail.com', 'jose', '+59963', 'pagjose@gmail.com', '7 a 8 am y 2 a 6 pm', '748596', '2021-04-19', 7851, 'www.pajose.com', 30, 2, '8.55', '1.22', 2, 2, '2.47', '1.88', '16.12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idMoneda` int(11) NOT NULL,
  `idMonedaEnvio` int(11) NOT NULL,
  `tipoCambio` decimal(65,2) NOT NULL,
  `porcentajeTipoCambio` decimal(20,2) NOT NULL,
  `fijo` decimal(65,2) NOT NULL,
  `porcentaje` decimal(20,2) NOT NULL,
  `idTipoComision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `pais`, `idMoneda`, `idMonedaEnvio`, `tipoCambio`, `porcentajeTipoCambio`, `fijo`, `porcentaje`, `idTipoComision`) VALUES
(1, 'VENEZUELA', 3, 3, '0.91', '7.18', '4.96', '3.24', 3),
(2, 'ECUADOR', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(3, 'EEUU', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(4, 'ESPAÑA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(5, 'SUIZA', 4, 4, '2.33', '7.13', '3.22', '1.77', 2),
(6, 'AFGANISTAN', 5, 5, '2.33', '7.13', '3.22', '1.77', 2),
(7, 'ALBANIA', 6, 6, '2.33', '7.13', '3.22', '1.77', 2),
(8, 'ALEMANIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(9, 'ALGERIA', 7, 7, '2.33', '7.13', '3.22', '1.77', 2),
(10, 'ANDORRA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(11, 'ANGOLA', 8, 8, '2.33', '7.13', '3.22', '1.77', 2),
(12, 'ANGUILLA', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(13, 'ANTIGUA Y BARBUDA', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(14, 'ARABIA SAUDITA', 10, 10, '2.33', '7.13', '3.22', '1.77', 2),
(15, 'ARGENTINA', 11, 11, '2.33', '7.13', '3.22', '1.77', 2),
(16, 'ARMENIA', 12, 12, '2.33', '7.13', '3.22', '1.77', 2),
(17, 'ARUBA', 13, 13, '2.33', '7.13', '3.22', '1.77', 2),
(18, 'AUSTRALIA', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(19, 'AUSTRIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(20, 'AZERBAIYAN', 15, 15, '2.33', '7.13', '3.22', '1.77', 2),
(21, 'BAHAMAS', 16, 16, '2.33', '7.13', '3.22', '1.77', 2),
(22, 'BANGLADESH', 17, 17, '2.33', '7.13', '3.22', '1.77', 2),
(23, 'BARBADOS', 18, 18, '2.33', '7.13', '3.22', '1.77', 2),
(24, 'BAREIN', 19, 19, '2.33', '7.13', '3.22', '1.77', 2),
(25, 'BELICE', 20, 20, '2.33', '7.13', '3.22', '1.77', 2),
(26, 'BENIN', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(27, 'BERMUDA', 22, 22, '2.33', '7.13', '3.22', '1.77', 2),
(28, 'BIELORRUSIA', 23, 23, '2.33', '7.13', '3.22', '1.77', 2),
(29, 'BIRMANIA', 24, 24, '2.33', '7.13', '3.22', '1.77', 2),
(30, 'BOLIVIA ', 25, 25, '2.33', '7.13', '3.22', '1.77', 2),
(31, 'BONAIRE  SAN EUSTAQUIO Y SABA', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(32, 'BOSNIA Y HERZEGOVINA', 26, 26, '2.33', '7.13', '3.22', '1.77', 2),
(33, 'BOTSUANA', 27, 27, '2.33', '7.13', '3.22', '1.77', 2),
(34, 'BRASIL', 28, 28, '2.33', '7.13', '3.22', '1.77', 2),
(35, 'BRUNEI DARUSSALAM', 29, 29, '2.33', '7.13', '3.22', '1.77', 2),
(36, 'BULGARIA', 30, 30, '2.33', '7.13', '3.22', '1.77', 2),
(37, 'BURKINA FASO', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(38, 'BURUNDI', 31, 31, '2.33', '7.13', '3.22', '1.77', 2),
(39, 'BUTAN', 32, 32, '2.33', '7.13', '3.22', '1.77', 2),
(40, 'BELGICA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(41, 'CABO VERDE', 33, 33, '2.33', '7.13', '3.22', '1.77', 2),
(42, 'CAMBOYA', 34, 34, '2.33', '7.13', '3.22', '1.77', 2),
(43, 'CAMERUN', 35, 35, '2.33', '7.13', '3.22', '1.77', 2),
(44, 'CANADA', 36, 36, '2.33', '7.13', '3.22', '1.77', 2),
(45, 'CHAD', 35, 35, '2.33', '7.13', '3.22', '1.77', 2),
(46, 'CHILE', 37, 37, '2.33', '7.13', '3.22', '1.77', 2),
(47, 'CHINA', 38, 38, '2.33', '7.13', '3.22', '1.77', 2),
(48, 'CHIPRE', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(49, 'COLOMBIA', 39, 39, '2.33', '7.13', '3.22', '1.77', 2),
(50, 'COMORAS', 40, 40, '2.33', '7.13', '3.22', '1.77', 2),
(51, 'CONGO', 41, 41, '2.33', '7.13', '3.22', '1.77', 2),
(52, 'COSTA DE MARFIL', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(53, 'COSTA RICA', 42, 42, '2.33', '7.13', '3.22', '1.77', 2),
(54, 'CROACIA', 43, 43, '2.33', '7.13', '3.22', '1.77', 2),
(55, 'CUBA', 44, 44, '2.33', '7.13', '3.22', '1.77', 2),
(56, 'CURAZAO', 45, 45, '2.33', '7.13', '3.22', '1.77', 2),
(57, 'DINAMARCA', 46, 46, '2.33', '7.13', '3.22', '1.77', 2),
(58, 'DOMINICA', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(59, 'EGIPTO', 47, 47, '2.33', '7.13', '3.22', '1.77', 2),
(60, 'EL SALVADOR', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(61, 'EMIRATOS ARABES UNIDOS', 48, 48, '2.33', '7.13', '3.22', '1.77', 2),
(62, 'ERITREA', 49, 49, '2.33', '7.13', '3.22', '1.77', 2),
(63, 'ESLOVAQUIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(64, 'ESLOVENIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(65, 'ESTADOS UNIDOS DE AMERICA', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(66, 'ESTONIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(67, 'ETIOPIA', 50, 50, '2.33', '7.13', '3.22', '1.77', 2),
(68, 'FIJI', 51, 51, '2.33', '7.13', '3.22', '1.77', 2),
(69, 'FILIPINAS', 52, 52, '2.33', '7.13', '3.22', '1.77', 2),
(70, 'FINLANDIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(71, 'FONDO MONETARIO INTERNACIONAL', 53, 53, '2.33', '7.13', '3.22', '1.77', 2),
(72, 'FRANCIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(73, 'GABON', 35, 35, '2.33', '7.13', '3.22', '1.77', 2),
(74, 'GAMBIA', 54, 54, '2.33', '7.13', '3.22', '1.77', 2),
(75, 'GEORGIA', 55, 55, '2.33', '7.13', '3.22', '1.77', 2),
(76, 'GHANA', 56, 56, '2.33', '7.13', '3.22', '1.77', 2),
(77, 'GIBRALTAR', 57, 57, '2.33', '7.13', '3.22', '1.77', 2),
(78, 'GRANADA', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(79, 'GRECIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(80, 'GROENLANDIA', 46, 46, '2.33', '7.13', '3.22', '1.77', 2),
(81, 'GUADALUPE', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(82, 'GUAM', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(83, 'GUATEMALA', 58, 58, '2.33', '7.13', '3.22', '1.77', 2),
(84, 'GUERNSEY', 59, 59, '2.33', '7.13', '3.22', '1.77', 2),
(85, 'GUINEA', 60, 60, '2.33', '7.13', '3.22', '1.77', 2),
(86, 'GUINEA ECUATORIAL', 35, 35, '2.33', '7.13', '3.22', '1.77', 2),
(87, 'GUINEA-BISSAU', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(88, 'GUYANA', 61, 61, '2.33', '7.13', '3.22', '1.77', 2),
(89, 'GUYANA FRANCESA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(90, 'HAITI', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(91, 'HOLANDA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(92, 'HONDURAS', 62, 62, '2.33', '7.13', '3.22', '1.77', 2),
(93, 'HONG KONG', 63, 63, '2.33', '7.13', '3.22', '1.77', 2),
(94, 'HUNGRIA', 64, 64, '2.33', '7.13', '3.22', '1.77', 2),
(95, 'INDIA', 65, 65, '2.33', '7.13', '3.22', '1.77', 2),
(96, 'INDONESIA', 66, 66, '2.33', '7.13', '3.22', '1.77', 2),
(97, 'IRAK', 67, 67, '2.33', '7.13', '3.22', '1.77', 2),
(98, 'IRLANDA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(99, 'ISLA BOUVET', 68, 68, '2.33', '7.13', '3.22', '1.77', 2),
(100, 'ISLA DE MAN', 59, 59, '2.33', '7.13', '3.22', '1.77', 2),
(101, 'ISLA DE NAVIDAD', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(102, 'ISLA NORFOLK', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(103, 'ISLANDIA', 69, 69, '2.33', '7.13', '3.22', '1.77', 2),
(104, 'ISLAS CAIMAN', 70, 70, '2.33', '7.13', '3.22', '1.77', 2),
(105, 'ISLAS COCOS', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(106, 'ISLAS COOK', 71, 71, '2.33', '7.13', '3.22', '1.77', 2),
(107, 'ISLAS FAROE', 46, 46, '2.33', '7.13', '3.22', '1.77', 2),
(108, 'ISLAS HEARD Y McDONALD', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(109, 'ISLAS MALVINAS', 72, 72, '2.33', '7.13', '3.22', '1.77', 2),
(110, 'ISLAS MARIANS DEL NORTE', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(111, 'ISLAS MARSHALL', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(112, 'ISLAS SALOMON', 73, 73, '2.33', '7.13', '3.22', '1.77', 2),
(113, 'ISLAS SVALBARD Y JAN MAYEN', 68, 68, '2.33', '7.13', '3.22', '1.77', 2),
(114, 'ISLAS TURCOS Y CAICOS', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(115, 'ISLAS ULTRAMARINAS MENORES DE EE. UU.', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(116, 'ISLAS VIRGENES (EEUU)', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(117, 'ISLAS VIRGENES BRITANICAS', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(118, 'ISLAS ÅLAND', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(119, 'ISRAEL', 74, 74, '2.33', '7.13', '3.22', '1.77', 2),
(120, 'ITALIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(121, 'JAMAICA', 75, 75, '2.33', '7.13', '3.22', '1.77', 2),
(122, 'JAPON', 76, 76, '2.33', '7.13', '3.22', '1.77', 2),
(123, 'JERSEY', 59, 59, '2.33', '7.13', '3.22', '1.77', 2),
(124, 'JORDANIA', 77, 77, '2.33', '7.13', '3.22', '1.77', 2),
(125, 'KAZAJISTAN', 78, 78, '2.33', '7.13', '3.22', '1.77', 2),
(126, 'KENIA', 79, 79, '2.33', '7.13', '3.22', '1.77', 2),
(127, 'KIRGUISTAN', 80, 80, '2.33', '7.13', '3.22', '1.77', 2),
(128, 'KIRIBATI', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(129, 'KUWAIT', 81, 81, '2.33', '7.13', '3.22', '1.77', 2),
(130, 'LESOTO', 82, 82, '2.33', '7.13', '3.22', '1.77', 2),
(131, 'LETONIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(132, 'LIBERIA', 83, 83, '2.33', '7.13', '3.22', '1.77', 2),
(133, 'LIBIA', 84, 84, '2.33', '7.13', '3.22', '1.77', 2),
(134, 'LIECHTENSTEIN', 4, 4, '2.33', '7.13', '3.22', '1.77', 2),
(135, 'LITUANIA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(136, 'LUXEMBURGO', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(137, 'LIBANO', 85, 85, '2.33', '7.13', '3.22', '1.77', 2),
(138, 'MACAO', 86, 86, '2.33', '7.13', '3.22', '1.77', 2),
(139, 'MACEDONIA', 87, 87, '2.33', '7.13', '3.22', '1.77', 2),
(140, 'MADAGASCAR', 88, 88, '2.33', '7.13', '3.22', '1.77', 2),
(141, 'MALASIA', 89, 89, '2.33', '7.13', '3.22', '1.77', 2),
(142, 'MALAWI', 90, 90, '2.33', '7.13', '3.22', '1.77', 2),
(143, 'MALDIVAS', 91, 91, '2.33', '7.13', '3.22', '1.77', 2),
(144, 'MALTA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(145, 'MALI', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(146, 'MARRUECOS', 92, 92, '2.33', '7.13', '3.22', '1.77', 2),
(147, 'MARTINICA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(148, 'MAURICIO', 93, 93, '2.33', '7.13', '3.22', '1.77', 2),
(149, 'MAURITANIA', 94, 94, '2.33', '7.13', '3.22', '1.77', 2),
(150, 'MAYOTTE', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(151, 'MICRONESIA', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(152, 'MONGOLIA', 95, 95, '2.33', '7.13', '3.22', '1.77', 2),
(153, 'MONTENEGRO', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(154, 'MONTSERRAT', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(155, 'MOZAMBIQUE', 96, 96, '2.33', '7.13', '3.22', '1.77', 2),
(156, 'MEXICO', 97, 97, '2.33', '7.13', '3.22', '1.77', 2),
(157, 'MONACO', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(158, 'NAMIBIA', 98, 98, '2.33', '7.13', '3.22', '1.77', 2),
(159, 'NAURU', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(160, 'NEPAL', 99, 99, '2.33', '7.13', '3.22', '1.77', 2),
(161, 'NICARAGUA', 100, 100, '2.33', '7.13', '3.22', '1.77', 2),
(162, 'NIGERIA', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(163, 'NIUE', 71, 71, '2.33', '7.13', '3.22', '1.77', 2),
(164, 'NORUEGA', 68, 68, '2.33', '7.13', '3.22', '1.77', 2),
(165, 'NUEVA CALEDONIA', 101, 101, '2.33', '7.13', '3.22', '1.77', 2),
(166, 'NUEVA ZELANDA', 71, 71, '2.33', '7.13', '3.22', '1.77', 2),
(167, 'OMAN', 102, 102, '2.33', '7.13', '3.22', '1.77', 2),
(168, 'PAISES MIEMBROS DEL BANCO AFRICANO DE DESARROLLO', 103, 103, '2.33', '7.13', '3.22', '1.77', 2),
(169, 'PAKISTAN', 104, 104, '2.33', '7.13', '3.22', '1.77', 2),
(170, 'PALAU', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(171, 'PANAMA', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(172, 'PAPUA NUEVA GUINEA', 105, 105, '2.33', '7.13', '3.22', '1.77', 2),
(173, 'PARAGUAY', 106, 106, '2.33', '7.13', '3.22', '1.77', 2),
(174, 'PERU', 107, 107, '2.33', '7.13', '3.22', '1.77', 2),
(175, 'PITCAIRN', 71, 71, '2.33', '7.13', '3.22', '1.77', 2),
(176, 'POLINESIA FRANCESA', 101, 101, '2.33', '7.13', '3.22', '1.77', 2),
(177, 'POLONIA', 108, 108, '2.33', '7.13', '3.22', '1.77', 2),
(178, 'PORTUGAL', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(179, 'PUERTO RICO', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(180, 'QATAR', 109, 109, '2.33', '7.13', '3.22', '1.77', 2),
(181, 'REINO UNIDO DE GRAN BRETAÑA E IRLANDA DEL NORTE', 59, 59, '2.33', '7.13', '3.22', '1.77', 2),
(182, 'REPUBLICA DEMOCRATICA POPULAR LAO', 110, 110, '2.33', '7.13', '3.22', '1.77', 2),
(183, 'REPUBLICA CENTROAFRICANA (LA)', 35, 35, '2.33', '7.13', '3.22', '1.77', 2),
(184, 'REPUBLICA CHECA', 111, 111, '2.33', '7.13', '3.22', '1.77', 2),
(185, 'REPUBLICA DE COREA DEL SUR', 112, 112, '2.33', '7.13', '3.22', '1.77', 2),
(186, 'REPUBLICA DE MOLDAVIA', 113, 113, '2.33', '7.13', '3.22', '1.77', 2),
(187, 'REPUBLICA DEMOCRATICA DE COREA DEL NORTE', 114, 114, '2.33', '7.13', '3.22', '1.77', 2),
(188, 'REPUBLICA DOMINICANA', 115, 115, '2.33', '7.13', '3.22', '1.77', 2),
(189, 'REPUBLICA ISLAMICA DE IRAN', 116, 116, '2.33', '7.13', '3.22', '1.77', 2),
(190, 'REPUBLICA UNIDA DE TANZANIA', 117, 117, '2.33', '7.13', '3.22', '1.77', 2),
(191, 'REPUBLICA ARABE SIRIA', 118, 118, '2.33', '7.13', '3.22', '1.77', 2),
(192, 'REUNION', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(193, 'RUANDA', 119, 119, '2.33', '7.13', '3.22', '1.77', 2),
(194, 'RUMANIA', 120, 120, '2.33', '7.13', '3.22', '1.77', 2),
(195, 'RUSIA', 121, 121, '2.33', '7.13', '3.22', '1.77', 2),
(196, 'SAHARA OCCIDENTAL', 92, 92, '2.33', '7.13', '3.22', '1.77', 2),
(197, 'SAMOA', 122, 122, '2.33', '7.13', '3.22', '1.77', 2),
(198, 'SAMOA AMERICANA', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(199, 'SAN BARTOLOME', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(200, 'SAN CRISTOBAL Y NIEVES', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(201, 'SAN MARINO', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(202, 'SAN MARTIN', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(203, 'SAN MARTIN (PARTE HOLANDESA)', 45, 45, '2.33', '7.13', '3.22', '1.77', 2),
(204, 'SAN PEDRO Y MIQUELON', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(205, 'SAN TOME Y PRINCIPE', 123, 123, '2.33', '7.13', '3.22', '1.77', 2),
(206, 'SAN VICENTE Y LAS GRANADINAS', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(207, 'SANTA HELENA ASCENCION Y TRISTAN DE ACUÑA', 124, 124, '2.33', '7.13', '3.22', '1.77', 2),
(208, 'SANTA LUCIA', 9, 9, '2.33', '7.13', '3.22', '1.77', 2),
(209, 'SANTA SEDE', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(210, 'SENEGAL', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(211, 'SERBIA', 125, 125, '2.33', '7.13', '3.22', '1.77', 2),
(212, 'SEYCHELLES', 126, 126, '2.33', '7.13', '3.22', '1.77', 2),
(213, 'SIERRA LEONA', 127, 127, '2.33', '7.13', '3.22', '1.77', 2),
(214, 'SINGAPUR', 128, 128, '2.33', '7.13', '3.22', '1.77', 2),
(215, 'SOMALIA', 129, 129, '2.33', '7.13', '3.22', '1.77', 2),
(216, 'SRI LANKA', 130, 130, '2.33', '7.13', '3.22', '1.77', 2),
(217, 'SUAZILANDIA', 131, 131, '2.33', '7.13', '3.22', '1.77', 2),
(218, 'SUDAFRICA', 132, 132, '2.33', '7.13', '3.22', '1.77', 2),
(219, 'SUDAN', 133, 133, '2.33', '7.13', '3.22', '1.77', 2),
(220, 'SUDAN DEL SUR', 134, 134, '2.33', '7.13', '3.22', '1.77', 2),
(221, 'SUECIA', 135, 135, '2.33', '7.13', '3.22', '1.77', 2),
(222, 'SURINAM', 136, 136, '2.33', '7.13', '3.22', '1.77', 2),
(223, 'TAILANDIA', 137, 137, '2.33', '7.13', '3.22', '1.77', 2),
(224, 'TAIWAN', 138, 138, '2.33', '7.13', '3.22', '1.77', 2),
(225, 'TAJIKISTAN', 139, 139, '2.33', '7.13', '3.22', '1.77', 2),
(226, 'TERRITORIO BRITANICO DEL OCEANO INDICO', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(227, 'TERRITORIOS AUSTRALES FRANCESES', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(228, 'TIMOR ORIENTAL', 1, 1, '2.33', '7.13', '3.22', '1.77', 2),
(229, 'TOGO', 21, 21, '2.33', '7.13', '3.22', '1.77', 2),
(230, 'TOKELAU', 71, 71, '2.33', '7.13', '3.22', '1.77', 2),
(231, 'TONGA', 140, 140, '2.33', '7.13', '3.22', '1.77', 2),
(232, 'TRINIDAD Y TOBAGO', 141, 141, '2.33', '7.13', '3.22', '1.77', 2),
(233, 'TURMENISTAN', 142, 142, '2.33', '7.13', '3.22', '1.77', 2),
(234, 'TURQUIA', 143, 143, '2.33', '7.13', '3.22', '1.77', 2),
(235, 'TUVALU', 14, 14, '2.33', '7.13', '3.22', '1.77', 2),
(236, 'TUNEZ', 144, 144, '2.33', '7.13', '3.22', '1.77', 2),
(237, 'UGANDA', 145, 145, '2.33', '7.13', '3.22', '1.77', 2),
(238, 'UKRANIA', 146, 146, '2.33', '7.13', '3.22', '1.77', 2),
(239, 'UNION EUROPEA', 2, 2, '2.33', '7.13', '3.22', '1.77', 2),
(240, 'URUGUAY', 147, 147, '2.33', '7.13', '3.22', '1.77', 2),
(241, 'UZBEKISTAN', 148, 148, '2.33', '7.13', '3.22', '1.77', 2),
(242, 'VANUATU', 149, 149, '2.33', '7.13', '3.22', '1.77', 2),
(243, 'VIETNAM', 150, 150, '2.33', '7.13', '3.22', '1.77', 2),
(244, 'WALLIS Y FUTUNA', 101, 101, '2.33', '7.13', '3.22', '1.77', 2),
(245, 'YEMEN', 151, 151, '2.33', '7.13', '3.22', '1.77', 2),
(246, 'YIBUTI', 152, 152, '2.33', '7.13', '3.22', '1.77', 2),
(247, 'ZAMBIA', 153, 153, '2.33', '7.13', '3.22', '1.77', 2),
(248, 'ZIMBABUE', 154, 154, '2.33', '7.13', '3.22', '1.77', 2);

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
(2, 'Cajero'),
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
(16, 'paco', 'silvert', 'ecuador', '+589689633', 'paco@gmail.com', '$2y$10$wPpTq/Yys5QYV67HtjCAleZaN/OOwikIvjEgaRP8N.53pvNfgqBqy', '15263', 'quito', 3, 1, 1),
(17, 'ALIAR', 'perez', 'maturin', '+589689633', 'ALIAR@GMAIL.COM', '$2y$10$NkiRDxdqGBYRZzsa65Ev9usNc2LPLGE66Dv3hyQgcQXBwqCKQlOb2', '33333', 'maturin', 3, 2, 1),
(18, 'RODOLFO', 'perez', 'maturin', '+589689633', 'RODOLFO@GMAIL.COM', '$2y$10$DA1kjWmquE41q5I1p/8N3OXXneVmmK2xYqvKes6zIeVkPYB5rrApu', '33333', 'maturin', 3, 3, 1),
(19, 'BLANCO', 'perez', 'maturin', '+589689633', 'BLANCO@GMAIL.COM', '$2y$10$OA15OJyYvpIwjx.Qy6NC4OIa5lCSKKuBnd3fWM8POmIQ6j3PlhJK2', '22222', 'maturin', 3, 4, 1);

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
  ADD PRIMARY KEY (`idMoneda`);

--
-- Indices de la tabla `monedaenvio`
--
ALTER TABLE `monedaenvio`
  ADD PRIMARY KEY (`idMonedaEnvio`);

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
  ADD PRIMARY KEY (`idPais`),
  ADD KEY `idMoneda` (`idMoneda`),
  ADD KEY `idMonedaEnvio` (`idMonedaEnvio`),
  ADD KEY `idTipoComision` (`idTipoComision`);

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
  MODIFY `idBeneficiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `idGiro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `identidad`
--
ALTER TABLE `identidad`
  MODIFY `idTipoIdentidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `idMoneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `monedaenvio`
--
ALTER TABLE `monedaenvio`
  MODIFY `idMonedaEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

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
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

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
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- Filtros para la tabla `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `pais_ibfk_1` FOREIGN KEY (`idMoneda`) REFERENCES `moneda` (`idMoneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pais_ibfk_2` FOREIGN KEY (`idMonedaEnvio`) REFERENCES `monedaenvio` (`idMonedaEnvio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pais_ibfk_3` FOREIGN KEY (`idTipoComision`) REFERENCES `tipocomision` (`idTipoComision`) ON DELETE CASCADE ON UPDATE CASCADE;

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
