-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2022 a las 19:38:17
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `odontologia_lv8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion`
--

CREATE TABLE `accion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `accion`
--

INSERT INTO `accion` (`id`, `nombre`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Curacion', '#a38b0f', '2022-09-28 05:04:58', '2022-09-28 17:35:46'),
(2, 'Extraccion', '#053aa3', '2022-09-28 12:27:07', '2022-09-28 12:27:07'),
(3, 'Vacío', '#828282', '2022-09-28 17:05:45', '2022-09-28 17:05:45'),
(4, 'Acción x', '#dc1e1e', '2022-09-28 18:19:55', '2022-09-28 18:19:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `IdTratamientos` int(11) NOT NULL,
  `IdMedico` int(11) NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Enfermedad` varchar(255) NOT NULL,
  `Estadocita` varchar(50) NOT NULL,
  `Estadopago` varchar(50) NOT NULL,
  `Costo` decimal(18,2) NOT NULL,
  `Pagado` decimal(18,2) NOT NULL,
  `Saldo` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `IdTratamientos`, `IdMedico`, `IdPaciente`, `Fecha`, `Hora`, `Enfermedad`, `Estadocita`, `Estadopago`, `Costo`, `Pagado`, `Saldo`, `created_at`, `updated_at`) VALUES
(68, 17, 8, 39, '2022-10-04', '10:00:00', 'fsfsffsf', 'Asignado', 'Aplicado', '400.00', '400.00', '0.00', '2022-10-03 22:41:52', '2022-10-03 22:43:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id`, `Descripcion`, `created_at`, `updated_at`) VALUES
(3, 'ODONTOLOGIA PREVENTIVA', '2019-12-05 04:50:31', '2019-12-05 04:50:31'),
(5, 'PERIODONCIA', '2019-12-05 14:56:34', '2019-12-05 14:56:34'),
(6, 'ORTODONCIA', '2019-12-05 14:56:45', '2019-12-05 14:56:45'),
(8, 'PATOLOGIA BUCAL', '2019-12-05 14:57:52', '2019-12-05 14:57:52'),
(11, 'CIRUGIA ORAL', '2019-12-06 15:14:26', '2019-12-06 15:14:36'),
(12, 'nueva esp', '2022-08-29 15:56:58', '2022-08-29 15:56:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `trata_medic` int(11) NOT NULL,
  `propen_hemo` int(11) NOT NULL,
  `alergico` int(11) NOT NULL,
  `hipertenso` int(11) NOT NULL,
  `diabetico` int(11) NOT NULL,
  `embarazada` int(11) NOT NULL,
  `motivo_consul` text NOT NULL,
  `diagnostico` text NOT NULL,
  `observacion` text NOT NULL,
  `referido` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `id_paciente`, `trata_medic`, `propen_hemo`, `alergico`, `hipertenso`, `diabetico`, `embarazada`, `motivo_consul`, `diagnostico`, `observacion`, `referido`, `created_at`, `updated_at`) VALUES
(1, 39, 0, 0, 1, 0, 1, 0, 'motivo x', '', '', 'Juan perez', '2022-09-26 20:36:50', '2022-09-26 22:04:01'),
(2, 40, 1, 0, 0, 0, 0, 0, 'gdfgdf', 'ggdf', '', '', '2022-10-03 22:39:10', '2022-10-03 22:39:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `Nombres` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `IdEspecialidad` int(11) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `Nombres`, `Apellidos`, `DNI`, `IdEspecialidad`, `Direccion`, `Email`, `Telefono`, `created_at`, `updated_at`) VALUES
(8, 'Medico', 'Juan Perez', '85236014', 11, 'Huancayo - Junin', 'medico01@tc.com', '999999999', '2022-05-13 16:05:48', '2022-05-13 16:05:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2018_06_16_223458_create_queja_table', 1),
(14, '2018_06_24_212356_create_respuesta_table', 1),
(15, '2018_06_27_165155_create_carrera_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `num_diente` int(11) NOT NULL,
  `lado` varchar(20) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `simbolo` varchar(50) NOT NULL,
  `id_tratamiento` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `odontograma`
--

INSERT INTO `odontograma` (`id`, `fecha`, `id_paciente`, `num_diente`, `lado`, `accion`, `simbolo`, `id_tratamiento`, `descripcion`, `id_usuario`, `created_at`, `updated_at`) VALUES
(44, '2022-09-28', 39, 82, 'Centro', '', '5', 17, '', 12, '2022-09-28 20:21:33', '2022-09-28 20:21:33'),
(47, '2022-09-28', 39, 13, 'Centro', '', '1', 15, '', 12, '2022-09-28 20:22:34', '2022-09-28 20:22:34'),
(48, '2022-09-28', 39, 63, 'Centro', '1', '', 17, '', 12, '2022-09-28 20:23:03', '2022-09-28 20:23:03'),
(49, '2022-09-28', 39, 73, 'Centro', '', '4', 15, '', 12, '2022-09-28 22:21:40', '2022-09-28 22:21:40'),
(50, '2022-09-29', 39, 21, 'Derecho', '1', '', 17, '', 12, '2022-09-29 05:29:46', '2022-09-29 05:29:46'),
(51, '2022-10-03', 39, 15, 'Centro', '', '3', 15, '', 12, '2022-10-03 22:42:46', '2022-10-03 22:42:46'),
(52, '2022-10-03', 39, 11, 'Arriba', '1', '', 17, 'ggg', 12, '2022-10-03 22:42:56', '2022-10-03 22:42:56'),
(53, '2022-10-03', 39, 11, 'Derecho', '2', '', 15, 'ddd', 12, '2022-10-03 22:43:11', '2022-10-03 22:43:11'),
(54, '2022-10-04', 39, 53, 'Centro', '', '2', 17, '', 12, '2022-10-04 21:07:28', '2022-10-04 21:07:28'),
(55, '2022-10-04', 39, 13, 'Arriba', '2', '', 17, '', 12, '2022-10-04 21:16:14', '2022-10-04 21:16:14'),
(56, '2022-10-04', 39, 11, 'Derecho', '4', '', 17, '', 12, '2022-10-04 21:38:25', '2022-10-04 21:38:25'),
(57, '2022-10-05', 39, 14, 'Derecho', '4', '', 17, '', 12, '2022-10-05 15:54:19', '2022-10-05 15:54:19'),
(58, '2022-10-05', 39, 11, 'Centro', '', '5', 15, '', 12, '2022-10-05 15:54:25', '2022-10-05 15:54:25'),
(59, '2022-10-05', 39, 61, 'Centro', '', '4', 15, '', 12, '2022-10-05 16:00:51', '2022-10-05 16:00:51'),
(60, '2022-10-05', 39, 83, 'Izquierdo', '2', '', 15, '', 12, '2022-10-05 16:00:58', '2022-10-05 16:00:58'),
(61, '2022-10-05', 39, 71, 'Centro', '1', '', 13, '', 12, '2022-10-05 16:01:07', '2022-10-05 16:01:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `IdCita` int(11) NOT NULL,
  `Monto` decimal(18,2) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `IdCita`, `Monto`, `IdUsuario`, `created_at`, `updated_at`) VALUES
(53, 60, '20.00', 12, '2022-05-14 19:48:48', '2022-05-14 19:48:48'),
(54, 60, '100.00', 12, '2022-05-14 19:50:31', '2022-05-14 19:50:31'),
(55, 60, '60.00', 12, '2022-05-14 19:57:14', '2022-05-14 19:57:14'),
(56, 61, '0.00', 12, '2022-05-14 19:58:46', '2022-05-14 19:58:46'),
(57, 62, '100.00', 12, '2022-05-15 16:49:45', '2022-05-15 16:49:45'),
(58, 62, '50.00', 12, '2022-05-15 16:50:45', '2022-05-15 16:50:45'),
(59, 63, '0.00', 12, '2022-06-05 15:07:14', '2022-06-05 15:07:14'),
(60, 63, '48.00', 12, '2022-06-05 15:08:02', '2022-06-05 15:08:02'),
(61, 64, '150.00', 12, '2022-06-08 22:20:56', '2022-06-08 22:20:56'),
(62, 65, '0.00', 12, '2022-06-08 22:21:50', '2022-06-08 22:21:50'),
(63, 66, '300.00', 12, '2022-06-08 22:22:23', '2022-06-08 22:22:23'),
(64, 65, '50.00', 12, '2022-06-08 22:23:08', '2022-06-08 22:23:08'),
(65, 65, '80.00', 12, '2022-06-08 22:23:20', '2022-06-08 22:23:20'),
(66, 67, '50.00', 12, '2022-08-29 16:00:30', '2022-08-29 16:00:30'),
(67, 67, '10.00', 12, '2022-08-29 16:01:05', '2022-08-29 16:01:05'),
(68, 67, '50.00', 12, '2022-08-29 16:01:11', '2022-08-29 16:01:11'),
(69, 67, '20.00', 12, '2022-08-29 16:01:18', '2022-08-29 16:01:18'),
(70, 68, '200.00', 12, '2022-10-03 22:41:52', '2022-10-03 22:41:52'),
(71, 68, '100.00', 12, '2022-10-03 22:43:43', '2022-10-03 22:43:43'),
(72, 68, '100.00', 12, '2022-10-03 22:43:49', '2022-10-03 22:43:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simbolos`
--

CREATE TABLE `simbolos` (
  `id` int(11) NOT NULL,
  `texto` varchar(50) NOT NULL,
  `fondo` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `significado` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` int(11) NOT NULL,
  `Tratamientos` varchar(255) NOT NULL,
  `Precio` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `Tratamientos`, `Precio`, `created_at`, `updated_at`) VALUES
(11, 'ODONTOPEDIATRIA', '160.00', '2019-11-16 22:18:06', '2019-11-16 22:18:06'),
(12, 'PROTESIS DENTAL', '180.00', '2019-11-16 22:18:20', '2019-11-16 22:18:20'),
(13, 'ORTODONCIA', '130.00', '2019-12-15 21:27:20', '2019-12-15 21:27:20'),
(15, 'ENDODONCIA', '150.00', '2019-12-15 23:02:42', '2022-05-15 16:48:22'),
(16, 'PROTESIS', '300.00', '2019-12-15 23:09:59', '2019-12-15 23:09:59'),
(17, 'CARIES', '400.00', '2019-12-15 23:10:14', '2022-06-08 22:19:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `TipoDoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumDoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` int(11) NOT NULL,
  `Foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IdMedico` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `TipoDoc`, `NumDoc`, `name`, `email`, `password`, `Rol`, `Estado`, `Foto`, `Telefono`, `remember_token`, `IdMedico`, `created_at`, `updated_at`) VALUES
(12, 'DNI', '12345678', 'Admin Tarea Completa', 'admin@gmail.com', '$2y$10$tPZkRoHWGE8OGf/l5ixdiO/cNPbAduGVGFDQagueA8CeBv1toAh7K', 'Administrador', 1, 'Default.png', '957716730', 'IJKoLXeOWg7u09HazNozYAADLTvBaEkWET7EfkhjWe9marygv8S9IraTvyr3', 0, '2019-10-10 05:25:47', '2022-09-26 17:00:02'),
(36, 'DNI', '85236014', 'Medico Juan Perez', 'medico01@gmail.com', '$2y$10$Iislr2Ao9NDwm381v5jdwuyapdMHkXMWwDus9ibH0eRcBHAM0UQui', 'Medico', 1, 'Default.png', '999999999', 'mxTHg9KyTh8u8tsRv0AKGnQalbM29Of7if6j0eiWx1YuX3idfHFcukMmB372', 8, '2022-05-13 16:05:48', '2022-05-13 16:05:48'),
(39, 'DNI', '87777777', 'Junior chamorro', 'jhu2995@hotmail.com', '$2y$10$0jT06Zd2eo.UmKUQENbxEegqjXFpx6FxjZyExlHoMaOSeRzypDClC', 'Paciente', 1, 'Default.png', '999999000', NULL, 0, '2022-09-26 20:36:50', '2022-09-26 22:03:50'),
(40, 'DNI', '56565660', 'Tarea Completo', 'tcaaa@gmail.com', '$2y$10$UAV4IalNqrA7Q5qaA5KLB.XGv3zowRu8llLCdItJNrLJ/1hgqTm4K', 'Paciente', 1, 'Default.png', '999999999', NULL, 0, '2022-10-03 22:39:10', '2022-10-03 22:39:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accion`
--
ALTER TABLE `accion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdMedico` (`IdMedico`),
  ADD KEY `IdPaciente` (`IdPaciente`),
  ADD KEY `IdTratamientos` (`IdTratamientos`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `simbolos`
--
ALTER TABLE `simbolos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accion`
--
ALTER TABLE `accion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `simbolos`
--
ALTER TABLE `simbolos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`IdMedico`) REFERENCES `medicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`IdPaciente`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `especialidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD CONSTRAINT `odontograma_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
