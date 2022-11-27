-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 01:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upes-reclamos`
--
CREATE DATABASE IF NOT EXISTS `upes-reclamos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `upes-reclamos`;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `configuraciones`
--

DROP TABLE IF EXISTS `configuraciones`;
CREATE TABLE `configuraciones` (
  `id_configuracion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reclamo`
--

DROP TABLE IF EXISTS `reclamo`;
CREATE TABLE `reclamo` (
  `id_reclamo` int(11) NOT NULL,
  `id_tiporeclamo` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `id_reclamo` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` int(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_reclamo`
--

DROP TABLE IF EXISTS `tipo_reclamo`;
CREATE TABLE `tipo_reclamo` (
  `id_tiporeclamo` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `carnet` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarioxreclamo`
--

DROP TABLE IF EXISTS `usuarioxreclamo`;
CREATE TABLE `usuarioxreclamo` (
  `id_usuario_reclamo` int(11) NOT NULL,
  `id_asignacion` int(11) NOT NULL,
  `id_reclamo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `fecha_asignacion` timestamp NULL DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id_configuracion`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `reclamo`
--
ALTER TABLE `reclamo`
  ADD PRIMARY KEY (`id_reclamo`),
  ADD KEY `areaXreclamo` (`id_area`),
  ADD KEY `tipoReclamoXreclamo` (`id_tiporeclamo`),
  ADD KEY `estadoXreclamo` (`id_estado`);

--
-- Indexes for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `reclamoXrespuesta` (`id_reclamo`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `tipo_reclamo`
--
ALTER TABLE `tipo_reclamo`
  ADD PRIMARY KEY (`id_tiporeclamo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `RolXUsuario` (`id_rol`);

--
-- Indexes for table `usuarioxreclamo`
--
ALTER TABLE `usuarioxreclamo`
  ADD PRIMARY KEY (`id_usuario_reclamo`,`id_asignacion`) USING BTREE,
  ADD KEY `reclamoXusuarioXreclamo` (`id_reclamo`),
  ADD KEY `usuarioXusuarioXreclamo` (`id_usuario`),
  ADD KEY `usuarioAsigXusuarioXreclamo` (`id_asignado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id_configuracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reclamo`
--
ALTER TABLE `reclamo`
  MODIFY `id_reclamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_reclamo`
--
ALTER TABLE `tipo_reclamo`
  MODIFY `id_tiporeclamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarioxreclamo`
--
ALTER TABLE `usuarioxreclamo`
  MODIFY `id_usuario_reclamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reclamo`
--
ALTER TABLE `reclamo`
  ADD CONSTRAINT `areaXreclamo` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `estadoXreclamo` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `tipoReclamoXreclamo` FOREIGN KEY (`id_tiporeclamo`) REFERENCES `tipo_reclamo` (`id_tiporeclamo`);

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `reclamoXrespuesta` FOREIGN KEY (`id_reclamo`) REFERENCES `reclamo` (`id_reclamo`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `RolXUsuario` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Constraints for table `usuarioxreclamo`
--
ALTER TABLE `usuarioxreclamo`
  ADD CONSTRAINT `reclamoXusuarioXreclamo` FOREIGN KEY (`id_reclamo`) REFERENCES `reclamo` (`id_reclamo`),
  ADD CONSTRAINT `usuarioAsigXusuarioXreclamo` FOREIGN KEY (`id_asignado`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuarioXusuarioXreclamo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
