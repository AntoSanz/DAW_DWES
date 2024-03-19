-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-11-2020 a las 19:27:10
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Tema2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnos`
--

CREATE TABLE `Alumnos` (
  `Dni` varchar(9) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido1` varchar(25) NOT NULL,
  `Apellido2` varchar(25) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Alumnos`
--

INSERT INTO `Alumnos` (`Dni`, `Nombre`, `Apellido1`, `Apellido2`, `Edad`, `Telefono`) VALUES
('05123456G', 'Mikado', 'Jap', 'Ones', -304045200, '656425489'),
('05456456C', 'Mar', 'Cador', 'Fernandez', -686278800, '123456789'),
('05815115P', 'Pedro', 'Mechero', 'Ruiz', 988063200, '666999888'),
('11111111A', 'Jose', 'Moreno', 'Perez', 349830000, '666554433'),
('22222222H', 'Teresa', 'Garmendia', 'Lopez', 402620400, '689010343'),
('55555555P', 'Elena', 'Nitodel', 'Bosque', 910306800, '262358977'),
('63258741P', 'Pepa', 'Camacho', 'Felipe', 1282687200, '698741523'),
('70193455A', 'Carlos', 'Rodríguez', 'Jiménez', 966722400, '652483110'),
('70851324T', 'Javier', 'Texeido', 'Diaz', 554940000, '680347166'),
('71469170Z', 'Agustín', 'Borja', 'Lopez', 385426800, '666491382'),
('72863944L', 'Eriz', 'Torres', 'García', 742773600, '692716834'),
('74185296I', 'Paquita', 'Salas', 'Rodriguez', 1330038000, '698523417'),
('88888888Z', 'Pablo', 'Zarate', 'Carvajal', 679960800, '655901234'),
('95698741L', 'Toni', 'Gonzalo', 'Rivero', 914281200, '698741523'),
('98741523P', 'Juanita', 'Ruiz', 'Espinosa', -172976400, '698523741');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD PRIMARY KEY (`Dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
