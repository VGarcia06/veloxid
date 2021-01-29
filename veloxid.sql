-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-01-2021 a las 14:26:08
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veloxid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `allocations`
--

CREATE TABLE `allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `allocations`
--

INSERT INTO `allocations` (`id`, `estado`, `driver_id`, `service_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 13, '2020-12-09 05:51:57', '2021-01-26 16:01:44', NULL),
(2, 3, 2, 17, '2020-12-09 18:54:12', '2021-01-26 15:59:54', NULL),
(3, 3, 2, 16, '2020-12-09 18:56:06', '2021-01-26 15:57:40', NULL),
(4, 5, 2, 15, '2020-12-09 19:02:13', '2021-01-26 05:57:25', NULL),
(5, 3, 2, 12, '2020-12-09 19:34:03', '2021-01-26 04:27:12', NULL),
(6, 3, 2, 14, '2020-12-09 19:34:09', '2021-01-26 05:57:10', NULL),
(7, 3, 2, 18, '2020-12-09 19:57:50', '2021-01-27 03:11:41', NULL),
(8, 3, 2, 26, '2021-01-15 22:45:28', '2021-01-26 05:53:04', NULL),
(9, 4, 2, 25, '2021-01-16 02:58:32', '2021-01-26 20:07:19', NULL),
(10, 5, 2, 24, '2021-01-16 03:05:11', '2021-01-26 04:27:28', NULL),
(11, 5, 2, 32, '2021-01-26 04:50:13', '2021-01-27 07:23:44', NULL),
(12, 3, 2, 34, '2021-01-26 20:32:25', '2021-01-27 06:55:04', NULL),
(13, 3, 2, 33, '2021-01-26 20:33:31', '2021-01-27 07:23:59', NULL),
(14, 0, 1, 37, '2021-01-27 06:30:26', '2021-01-27 06:30:26', NULL),
(15, 3, 2, 36, '2021-01-27 06:31:30', '2021-01-27 07:33:35', NULL),
(16, 5, 2, 11, '2021-01-27 20:21:05', '2021-01-27 20:23:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `allocation_vehicle`
--

CREATE TABLE `allocation_vehicle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `allocation_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliars`
--

CREATE TABLE `auxiliars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `allocation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `auxiliars`
--

INSERT INTO `auxiliars` (`id`, `nombre`, `numero`, `document_type_id`, `allocation_id`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Hola', '944884', 1, 1, '2020-12-09 21:29:37', '2020-12-09 21:29:37'),
(2, 'Dr. Hola', '944884', 1, 1, '2020-12-09 21:45:57', '2020-12-09 21:45:57'),
(3, 'pedro salas rosales', '222222', 1, 2, '2020-12-09 21:54:43', '2020-12-09 21:54:43'),
(4, 'pedro salas rosales', '222222', 1, 2, '2020-12-09 21:54:48', '2020-12-09 21:54:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Salas', NULL, NULL),
(2, 'Comedores', NULL, NULL),
(3, 'Dormitorios', NULL, NULL),
(4, 'Televisores', NULL, NULL),
(5, 'Equipos de sonido', NULL, NULL),
(6, 'Refrigeradoras', NULL, NULL),
(7, 'Lavadoras', NULL, NULL),
(8, 'Parrillas', NULL, NULL),
(9, 'Cajas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distrito` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `distrito`, `zona_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Carabayllo', 1, NULL, NULL, NULL),
(2, 'Comas', 1, NULL, NULL, NULL),
(3, 'Independencia', 1, NULL, NULL, NULL),
(4, 'Los olivos', 1, NULL, NULL, NULL),
(5, 'Puente Piedra', 1, NULL, NULL, NULL),
(6, 'San Martin De Porres', 1, NULL, NULL, NULL),
(7, 'Ate', 2, NULL, NULL, NULL),
(8, 'La Molina', 2, NULL, NULL, NULL),
(9, 'San Juan de Lurigancho', 2, NULL, NULL, NULL),
(10, 'Santa Anita', 2, NULL, NULL, NULL),
(11, 'Barranco', 3, NULL, NULL, NULL),
(12, 'Lince', 3, NULL, NULL, NULL),
(13, 'Miraflores', 3, NULL, NULL, NULL),
(14, 'San Borja', 3, NULL, NULL, NULL),
(15, 'San Isidro', 3, NULL, NULL, NULL),
(16, 'Surco', 3, NULL, NULL, NULL),
(17, 'Surquillo', 3, NULL, NULL, NULL),
(18, 'Breña', 4, NULL, NULL, NULL),
(19, 'Centro de Lima', 4, NULL, NULL, NULL),
(20, 'El Agustino', 4, NULL, NULL, NULL),
(21, 'La Victoria', 4, NULL, NULL, NULL),
(22, 'Rimac', 4, NULL, NULL, NULL),
(23, 'San Luis', 4, NULL, NULL, NULL),
(24, 'Callao', 5, NULL, NULL, NULL),
(25, 'Chaclacayo', 6, NULL, NULL, NULL),
(26, 'Cineguilla', 6, NULL, NULL, NULL),
(27, 'Lurigancho', 6, NULL, NULL, NULL),
(28, 'Chorrillos', 7, NULL, NULL, NULL),
(29, 'Pachacamac', 7, NULL, NULL, NULL),
(30, 'San Juan De Miraflores', 7, NULL, NULL, NULL),
(31, 'Santa María Del Mar', 7, NULL, NULL, NULL),
(32, 'Villa el Salvador', 7, NULL, NULL, NULL),
(33, 'Villa María Del Triunfo', 7, NULL, NULL, NULL),
(34, 'Jesús María', 8, NULL, NULL, NULL),
(35, 'Magdalena', 8, NULL, NULL, NULL),
(36, 'Pueblo Libre', 8, NULL, NULL, NULL),
(37, 'San Miguel', 8, NULL, NULL, NULL),
(38, 'Lurin', 9, NULL, NULL, NULL),
(39, 'Pucusana', 9, NULL, NULL, NULL),
(40, 'Punta Hermosa', 9, NULL, NULL, NULL),
(41, 'Punta Negra', 9, NULL, NULL, NULL),
(42, 'San Bartolo', 9, NULL, NULL, NULL),
(43, 'Ancón', 10, NULL, NULL, NULL),
(44, 'Santa Rosa', 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documenttype`
--

CREATE TABLE `documenttype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documenttype`
--

INSERT INTO `documenttype` (`id`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'DNI', NULL, NULL),
(2, 'Carnet de Extranjeria', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licenciaConducir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constanciaEstadoSalud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuentaBancaria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `drivers`
--

INSERT INTO `drivers` (`id`, `licenciaConducir`, `constanciaEstadoSalud`, `cuentaBancaria`, `banco`, `idUser`, `created_at`, `updated_at`) VALUES
(1, '12343567674', 'drivers/TbAsKwFv2RnQcqKqbbKdOj9DOYUEvh5CLi7c7jGZ.pdf', '123000045567567', 'Interbank', 5, '2020-11-03 06:10:10', '2020-11-13 05:42:48'),
(2, 'A98756428', 'drivers/I6YDeW17l99ynf8NmuCIMm7hDQpv4iROkbcBCDax.png', '099635785212125', 'BCP', 26, '2020-11-19 02:38:06', '2020-11-19 02:38:06'),
(3, 'Q75856987', 'drivers/rvpiSUlvpH5lBKnomPyehU8vA5oIJrLQrhf8jrqd.png', '996547858585123', 'BCP', 27, '2020-11-19 02:44:23', '2020-11-19 02:44:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driver_evaluations`
--

CREATE TABLE `driver_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valor` tinyint(1) NOT NULL,
  `driver_revision_id` bigint(20) UNSIGNED NOT NULL,
  `driver_requirement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `driver_evaluations`
--

INSERT INTO `driver_evaluations` (`id`, `valor`, `driver_revision_id`, `driver_requirement_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 1, 2, NULL, NULL),
(3, 1, 1, 3, NULL, NULL),
(4, 1, 1, 4, NULL, NULL),
(5, 1, 1, 5, NULL, NULL),
(6, 1, 1, 6, NULL, NULL),
(7, 1, 2, 1, NULL, NULL),
(8, 1, 2, 2, NULL, NULL),
(9, 1, 2, 3, NULL, NULL),
(10, 1, 2, 4, NULL, NULL),
(11, 1, 2, 5, NULL, NULL),
(12, 1, 2, 6, NULL, NULL),
(13, 1, 3, 1, NULL, NULL),
(14, 1, 3, 2, NULL, NULL),
(15, 1, 3, 3, NULL, NULL),
(16, 1, 3, 4, NULL, NULL),
(17, 1, 3, 5, NULL, NULL),
(18, 1, 3, 6, NULL, NULL),
(19, 1, 4, 1, NULL, NULL),
(20, 1, 4, 2, NULL, NULL),
(21, 1, 4, 3, NULL, NULL),
(22, 1, 4, 4, NULL, NULL),
(23, 1, 4, 5, NULL, NULL),
(24, 1, 4, 6, NULL, NULL),
(25, 1, 5, 1, NULL, NULL),
(26, 1, 5, 2, NULL, NULL),
(27, 1, 5, 3, NULL, NULL),
(28, 1, 5, 4, NULL, NULL),
(29, 1, 5, 5, NULL, NULL),
(30, 1, 5, 6, NULL, NULL),
(31, 1, 6, 1, NULL, NULL),
(32, 1, 6, 2, NULL, NULL),
(33, 1, 6, 3, NULL, NULL),
(34, 1, 6, 4, NULL, NULL),
(35, 1, 6, 5, NULL, NULL),
(36, 1, 6, 6, NULL, NULL),
(37, 1, 7, 1, NULL, NULL),
(38, 1, 7, 2, NULL, NULL),
(39, 1, 7, 3, NULL, NULL),
(40, 1, 7, 4, NULL, NULL),
(41, 1, 7, 5, NULL, NULL),
(42, 1, 7, 6, NULL, NULL),
(43, 1, 8, 1, NULL, NULL),
(44, 1, 8, 2, NULL, NULL),
(45, 1, 8, 3, NULL, NULL),
(46, 1, 8, 4, NULL, NULL),
(47, 1, 8, 5, NULL, NULL),
(48, 1, 8, 6, NULL, NULL),
(49, 1, 9, 1, NULL, NULL),
(50, 1, 9, 2, NULL, NULL),
(51, 1, 9, 3, NULL, NULL),
(52, 1, 9, 4, NULL, NULL),
(53, 0, 9, 5, NULL, NULL),
(54, 0, 9, 6, NULL, NULL),
(55, 1, 10, 1, NULL, NULL),
(56, 1, 10, 2, NULL, NULL),
(57, 1, 10, 3, NULL, NULL),
(58, 1, 10, 4, NULL, NULL),
(59, 1, 10, 5, NULL, NULL),
(60, 1, 10, 6, NULL, NULL),
(61, 1, 11, 1, NULL, NULL),
(62, 1, 11, 2, NULL, NULL),
(63, 1, 11, 3, NULL, NULL),
(64, 0, 11, 4, NULL, NULL),
(65, 1, 11, 5, NULL, NULL),
(66, 0, 11, 6, NULL, NULL),
(67, 1, 12, 1, NULL, NULL),
(68, 1, 12, 2, NULL, NULL),
(69, 1, 12, 3, NULL, NULL),
(70, 1, 12, 4, NULL, NULL),
(71, 1, 12, 5, NULL, NULL),
(72, 1, 12, 6, NULL, NULL),
(73, 1, 13, 1, NULL, NULL),
(74, 1, 13, 2, NULL, NULL),
(75, 1, 13, 3, NULL, NULL),
(76, 1, 13, 4, NULL, NULL),
(77, 1, 13, 5, NULL, NULL),
(78, 1, 13, 6, NULL, NULL),
(79, 1, 14, 1, NULL, NULL),
(80, 1, 14, 2, NULL, NULL),
(81, 1, 14, 3, NULL, NULL),
(82, 1, 14, 4, NULL, NULL),
(83, 0, 14, 5, NULL, NULL),
(84, 0, 14, 6, NULL, NULL),
(85, 1, 15, 1, NULL, NULL),
(86, 1, 15, 2, NULL, NULL),
(87, 1, 15, 3, NULL, NULL),
(88, 1, 15, 4, NULL, NULL),
(89, 1, 15, 5, NULL, NULL),
(90, 1, 15, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driver_requirements`
--

CREATE TABLE `driver_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requerimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `driver_requirements`
--

INSERT INTO `driver_requirements` (`id`, `requerimiento`, `created_at`, `updated_at`) VALUES
(1, 'Guantes', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(2, 'Uniforme', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(3, 'Protector solar', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(4, 'Mascarilla', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(5, 'Mameluco', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(6, 'Protector facial', '2020-11-06 05:34:08', '2020-11-06 05:34:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driver_revisions`
--

CREATE TABLE `driver_revisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `requirement_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `driver_revisions`
--

INSERT INTO `driver_revisions` (`id`, `observacion`, `driver_id`, `requirement_status_id`, `created_at`, `updated_at`) VALUES
(1, 'Todo okey', 1, 2, '2020-11-15 08:29:54', '2020-11-15 08:29:54'),
(2, 'Casi todo okey', 1, 2, '2020-11-15 08:52:45', '2020-11-15 08:52:45'),
(3, 'Prueba', 1, 1, '2020-11-20 18:24:03', '2020-11-20 18:24:03'),
(4, 'Prueba 2', 1, 2, '2020-11-20 19:51:37', '2020-11-20 19:51:37'),
(5, 'Pruebas', 1, 2, '2020-11-20 22:52:05', '2020-11-20 22:52:05'),
(6, 'Prueba 4', 1, 2, '2020-11-23 07:59:48', '2020-11-23 07:59:48'),
(7, 'TODO OK', 2, 1, '2020-11-24 01:27:20', '2020-11-24 01:27:20'),
(8, 'Cuenta con todos los requerimientos nuevos a la fecha', 2, 1, '2020-12-09 19:03:36', '2020-12-09 19:03:36'),
(9, NULL, 2, 2, '2020-12-09 19:31:00', '2020-12-09 19:31:00'),
(10, NULL, 2, 1, '2020-12-09 19:33:30', '2020-12-09 19:33:30'),
(11, 'No cuenta con mascarilla', 2, 2, '2021-01-15 22:35:28', '2021-01-15 22:35:28'),
(12, NULL, 2, 1, '2021-01-15 22:44:57', '2021-01-15 22:44:57'),
(13, NULL, 1, 1, '2021-01-25 15:25:25', '2021-01-25 15:25:25'),
(14, NULL, 2, 2, '2021-01-26 20:34:30', '2021-01-26 20:34:30'),
(15, NULL, 2, 1, '2021-01-26 20:36:46', '2021-01-26 20:36:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driver_zona`
--

CREATE TABLE `driver_zona` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `zona_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_state_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `galleries`
--

INSERT INTO `galleries` (`id`, `imagen`, `service_state_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'services/yI75OseivSWFlv3mMz7RbGX2yMwobIXhfSbwzXnp.jpg', 4, 33, '2021-01-27 07:22:13', '2021-01-27 07:22:13'),
(2, 'services/6XekcJ97qL2RQc1U5YrFiOTfHxq9XiFB6CFCBlJ6.jpg', 4, 36, '2021-01-27 07:27:18', '2021-01-27 07:27:18'),
(3, 'services/OGcigHHBWeuAjAgsRn59gpJXIjHtWaWiZC7xKGhm.jpg', 4, 33, '2021-01-27 07:32:38', '2021-01-27 07:32:38'),
(4, 'services/zeiKqbBMQurBOPTUd88g1kOAWqtbj0L42oo8A3mZ.jpg', 4, 14, '2021-01-27 07:33:42', '2021-01-27 07:33:42'),
(5, 'services/glYlxJ5p2eXbKX6h3kPaowrfUJVu8MKq9HbQes3B.jpg', 4, 34, '2021-01-27 07:34:38', '2021-01-27 07:34:38'),
(6, 'services/rfEvPZu1D6jnpyjatmO9uZipJf4d7paBn4uqIisD.jpg', 4, 24, '2021-01-27 07:39:10', '2021-01-27 07:39:10'),
(7, 'services/2avfMRL9XMpc59Dsq6qBW3U8R229aoSuZTYomA7k.jpg', 4, 25, '2021-01-27 07:43:00', '2021-01-27 07:43:00'),
(8, 'services/qcryozY2XM9D6T6g3Gyiw31mYUNMw2d9niVdj7bz.jpg', 4, 26, '2021-01-27 07:44:23', '2021-01-27 07:44:23'),
(9, 'services/UKqwk23pXZo8zyBQj4uvjqjFttsea8mhb3Pwor2W.jpg', 4, 18, '2021-01-27 07:46:24', '2021-01-27 07:46:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lateralmenus`
--

CREATE TABLE `lateralmenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idModule` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lateralmenus`
--

INSERT INTO `lateralmenus` (`id`, `nombre`, `href`, `icon`, `idModule`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'home', 'mdi mdi-home menu-icon', 4, NULL, NULL),
(2, 'Vehiculos', '/vehiculos', 'mdi mdi-truck menu-icon', 1, NULL, NULL),
(3, 'Conductores', '/conductores', 'mdi mdi-truck menu-icon', 2, NULL, NULL),
(4, 'Evaluar', '/evaluacion', 'mdi mdi-clipboard-outline menu-icon', 5, NULL, NULL),
(5, 'Historial', '/revisiones', 'mdi mdi-chart-histogram menu-icon', 5, NULL, NULL),
(6, 'Pedidos', '/pedidos', 'mdi mdi-archive menu-icon', 3, NULL, NULL),
(7, 'Pedidos Asignados', '/confirmacionconductor', 'mdi mdi-archive menu-icon', 6, NULL, NULL),
(8, 'Mis Pedidos', '/tracking', 'mdi mdi-archive menu-icon', 7, NULL, NULL),
(9, 'Cotizar Servicio', '/cotizacion', 'mdi mdi-grease-pencil menu-icon', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2020_10_17_171638_create_status_table', 1),
(41, '2020_10_17_172216_create_usertype_table', 1),
(42, '2020_10_17_172455_create_documenttype_table', 1),
(43, '2020_10_17_172620_create_drivers_table', 1),
(44, '2020_10_17_173342_create_persons_table', 1),
(45, '2020_10_21_030752_create_vehicles_table', 1),
(46, '2020_10_21_034135_create_vehicletype_table', 1),
(47, '2020_10_21_144317_create_driver_revisions_table', 1),
(48, '2020_10_21_145550_create_vehicle_revisions_table', 1),
(49, '2020_10_21_145710_create_driver_requirements_table', 1),
(50, '2020_10_21_145742_create_vehicle_requirements_table', 1),
(51, '2020_10_21_145913_create_requirement_status_table', 1),
(52, '2020_10_21_152451_create_driver_evaluations_table', 1),
(53, '2020_10_21_152522_create_vehicle_evaluations_table', 1),
(54, '2020_10_30_054535_create_modules_table', 1),
(55, '2020_10_30_054557_create_lateralmenus_table', 1),
(56, '2020_10_30_055942_create_rolesmodules_table', 1),
(57, '2020_11_04_163515_add_softdelete_column_to_vehicles_table', 2),
(58, '2020_11_04_173632_add_softdelete_column_to_users_table', 3),
(59, '2020_11_04_174107_add_softdeletes_column_to_users_table', 4),
(60, '2020_11_08_004228_create_service_states_table', 5),
(61, '2020_11_07_233928_create_services_table', 6),
(62, '2020_11_07_234728_create_products_table', 7),
(63, '2020_11_07_234924_create_galleries_table', 8),
(64, '2020_11_07_235344_create_allocations_table', 9),
(65, '2020_11_07_235403_create_auxiliars_table', 10),
(66, '2020_11_07_235453_create_distritos_table', 11),
(67, '2020_11_07_235659_create_zonas_table', 12),
(68, '2020_11_08_010920_create_driver_zona_table', 13),
(69, '2020_11_08_013950_create_prices_table', 14),
(70, '2020_11_08_013623_create_categories_table', 15),
(71, '2020_11_08_013644_create_subcategories_table', 15),
(72, '2020_11_08_014304_create_vehicle_subcategory_table', 15),
(73, '2020_11_17_215141_create_allocation_vehicle_table', 15),
(74, '2020_11_19_233824_create_revisions_table', 15),
(75, '2020_11_19_234535_create_revisionables_table', 15),
(76, '2016_06_01_000001_create_oauth_auth_codes_table', 16),
(77, '2016_06_01_000002_create_oauth_access_tokens_table', 16),
(78, '2016_06_01_000003_create_oauth_refresh_tokens_table', 16),
(79, '2016_06_01_000004_create_oauth_clients_table', 16),
(80, '2016_06_01_000005_create_oauth_personal_access_clients_table', 16),
(81, '2020_12_08_032243_add_peso_column_to_products_table', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Vehiculos', NULL, NULL),
(2, 'Conductores\r\n', NULL, NULL),
(3, 'Pedidos', NULL, NULL),
(4, 'Home', NULL, NULL),
(5, 'Evaluar', NULL, NULL),
(6, 'Pedidos', NULL, NULL),
(7, 'Pedidos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ReH4Ez7chW2TQU12CiI0SXbRuVS3ppXhmlHKSbNn', NULL, 'http://localhost', 1, 0, 0, '2020-12-07 22:34:11', '2020-12-07 22:34:11'),
(2, NULL, 'Laravel Password Grant Client', '6u9u63fvIZD4EvWo45p43YkLtUtLjYuB2IeYCyat', 'users', 'http://localhost', 0, 1, 0, '2020-12-07 22:34:11', '2020-12-07 22:34:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-12-07 22:34:11', '2020-12-07 22:34:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--

CREATE TABLE `persons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idDocumentType` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persons`
--

INSERT INTO `persons` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `direccion`, `imagen`, `numero`, `idDocumentType`, `idUser`, `created_at`, `updated_at`) VALUES
(2, 'Franceshca', 'Marres', 'Salhuana', 98151848, 'AV. Miguel grau 1696', 'drivers/VjqtXP9EwbnHbGEbGA9YFFDdKMx1L3ywXBak7OL2.jpeg', '77269631', 1, 5, '2020-11-03 06:10:10', '2021-01-15 05:27:37'),
(3, 'Marieta', 'Marres', 'Salhuana', 123456789, 'Los Angeles', NULL, '12345678', 1, 1, NULL, NULL),
(24, 'Diego', 'Velasquez', 'Bendezu', 996188340, 'villa el salvador', 'drivers/YHNeHOh1y6OIOmCUCjtDZE50w3A2ybyWv08dlB7g.jpeg', '98756428', 1, 26, '2020-11-19 02:38:06', '2021-01-15 05:34:59'),
(25, 'Victor', 'Garcia', 'Torres', 987478320, 'Lurin', 'drivers/5DcxFBJ2gNO1nOcy0eVoYDi8FIvcvgoNDXAMVkLR.jpeg', '75856987', 1, 27, '2020-11-19 02:44:23', '2021-01-15 05:35:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `zona_origen_id` bigint(20) UNSIGNED NOT NULL,
  `zona_destino_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prices`
--

INSERT INTO `prices` (`id`, `price`, `zona_origen_id`, `zona_destino_id`, `vehicle_type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 150, 5, 1, 3, NULL, NULL, NULL),
(2, 180, 5, 2, 3, NULL, NULL, NULL),
(3, 270, 5, 3, 3, NULL, NULL, NULL),
(4, 180, 5, 4, 3, NULL, NULL, NULL),
(5, 170, 5, 5, 3, NULL, NULL, NULL),
(6, 230, 5, 6, 3, NULL, NULL, NULL),
(7, 200, 5, 7, 3, NULL, NULL, NULL),
(8, 170, 5, 8, 3, NULL, NULL, NULL),
(9, 230, 5, 9, 3, NULL, NULL, NULL),
(10, 210, 5, 10, 3, NULL, NULL, NULL),
(11, 170, 4, 1, 3, NULL, NULL, NULL),
(12, 170, 4, 2, 3, NULL, NULL, NULL),
(13, 170, 4, 3, 3, NULL, NULL, NULL),
(14, 140, 4, 4, 3, NULL, NULL, NULL),
(15, 180, 4, 5, 3, NULL, NULL, NULL),
(16, 180, 4, 6, 3, NULL, NULL, NULL),
(17, 150, 4, 7, 3, NULL, NULL, NULL),
(18, 170, 4, 8, 3, NULL, NULL, NULL),
(19, 230, 4, 9, 3, NULL, NULL, NULL),
(20, 210, 4, 10, 3, NULL, NULL, NULL),
(21, 200, 2, 1, 3, NULL, NULL, NULL),
(22, 140, 2, 2, 3, NULL, NULL, NULL),
(23, 200, 2, 3, 3, NULL, NULL, NULL),
(24, 170, 2, 4, 3, NULL, NULL, NULL),
(25, 180, 2, 5, 3, NULL, NULL, NULL),
(26, 180, 2, 6, 3, NULL, NULL, NULL),
(27, 180, 2, 7, 3, NULL, NULL, NULL),
(28, 150, 2, 8, 3, NULL, NULL, NULL),
(29, 230, 2, 9, 3, NULL, NULL, NULL),
(30, 210, 2, 10, 3, NULL, NULL, NULL),
(31, 260, 6, 1, 3, NULL, NULL, NULL),
(32, 180, 6, 2, 3, NULL, NULL, NULL),
(33, 180, 6, 3, 3, NULL, NULL, NULL),
(34, 180, 6, 4, 3, NULL, NULL, NULL),
(35, 230, 6, 5, 3, NULL, NULL, NULL),
(36, 140, 6, 6, 3, NULL, NULL, NULL),
(37, 230, 6, 7, 3, NULL, NULL, NULL),
(38, 150, 6, 8, 3, NULL, NULL, NULL),
(39, 230, 6, 9, 3, NULL, NULL, NULL),
(40, 210, 6, 10, 3, NULL, NULL, NULL),
(41, 180, 3, 1, 3, NULL, NULL, NULL),
(42, 200, 3, 2, 3, NULL, NULL, NULL),
(43, 140, 3, 3, 3, NULL, NULL, NULL),
(44, 170, 3, 4, 3, NULL, NULL, NULL),
(45, 270, 3, 5, 3, NULL, NULL, NULL),
(46, 180, 3, 6, 3, NULL, NULL, NULL),
(47, 150, 3, 7, 3, NULL, NULL, NULL),
(48, 120, 3, 8, 3, NULL, NULL, NULL),
(49, 230, 3, 9, 3, NULL, NULL, NULL),
(50, 210, 3, 10, 3, NULL, NULL, NULL),
(51, 180, 8, 1, 3, NULL, NULL, NULL),
(52, 150, 8, 2, 3, NULL, NULL, NULL),
(53, 120, 8, 3, 3, NULL, NULL, NULL),
(54, 170, 8, 4, 3, NULL, NULL, NULL),
(55, 170, 8, 5, 3, NULL, NULL, NULL),
(56, 150, 8, 6, 3, NULL, NULL, NULL),
(57, 200, 8, 7, 3, NULL, NULL, NULL),
(58, 140, 8, 8, 3, NULL, NULL, NULL),
(59, 230, 8, 9, 3, NULL, NULL, NULL),
(60, 210, 8, 10, 3, NULL, NULL, NULL),
(61, 140, 1, 1, 3, NULL, NULL, NULL),
(62, 200, 1, 2, 3, NULL, NULL, NULL),
(63, 180, 1, 3, 3, NULL, NULL, NULL),
(64, 170, 1, 4, 3, NULL, NULL, NULL),
(65, 150, 1, 5, 3, NULL, NULL, NULL),
(66, 260, 1, 6, 3, NULL, NULL, NULL),
(67, 180, 1, 7, 3, NULL, NULL, NULL),
(68, 180, 1, 8, 3, NULL, NULL, NULL),
(69, 260, 1, 9, 3, NULL, NULL, NULL),
(70, 150, 1, 10, 3, NULL, NULL, NULL),
(71, 180, 7, 1, 3, NULL, NULL, NULL),
(72, 180, 7, 2, 3, NULL, NULL, NULL),
(73, 150, 7, 3, 3, NULL, NULL, NULL),
(74, 150, 7, 4, 3, NULL, NULL, NULL),
(75, 200, 7, 5, 3, NULL, NULL, NULL),
(76, 230, 7, 6, 3, NULL, NULL, NULL),
(77, 140, 7, 7, 3, NULL, NULL, NULL),
(78, 200, 7, 8, 3, NULL, NULL, NULL),
(79, 180, 7, 9, 3, NULL, NULL, NULL),
(80, 210, 7, 10, 3, NULL, NULL, NULL),
(81, 150, 10, 1, 3, NULL, NULL, NULL),
(82, 210, 10, 2, 3, NULL, NULL, NULL),
(83, 210, 10, 3, 3, NULL, NULL, NULL),
(84, 210, 10, 4, 3, NULL, NULL, NULL),
(85, 210, 10, 5, 3, NULL, NULL, NULL),
(86, 210, 10, 6, 3, NULL, NULL, NULL),
(87, 210, 10, 7, 3, NULL, NULL, NULL),
(88, 210, 10, 8, 3, NULL, NULL, NULL),
(89, 270, 10, 9, 3, NULL, NULL, NULL),
(90, 140, 10, 10, 3, NULL, NULL, NULL),
(91, 260, 9, 1, 3, NULL, NULL, NULL),
(92, 230, 9, 2, 3, NULL, NULL, NULL),
(93, 230, 9, 3, 3, NULL, NULL, NULL),
(94, 230, 9, 4, 3, NULL, NULL, NULL),
(95, 230, 9, 5, 3, NULL, NULL, NULL),
(96, 230, 9, 6, 3, NULL, NULL, NULL),
(97, 180, 9, 7, 3, NULL, NULL, NULL),
(98, 230, 9, 8, 3, NULL, NULL, NULL),
(99, 140, 9, 9, 3, NULL, NULL, NULL),
(100, 270, 9, 10, 3, NULL, NULL, NULL),
(101, 100, 5, 1, 2, NULL, NULL, NULL),
(102, 120, 5, 2, 2, NULL, NULL, NULL),
(103, 180, 5, 3, 2, NULL, NULL, NULL),
(104, 120, 5, 4, 2, NULL, NULL, NULL),
(105, 110, 5, 5, 2, NULL, NULL, NULL),
(106, 150, 5, 6, 2, NULL, NULL, NULL),
(107, 130, 5, 7, 2, NULL, NULL, NULL),
(108, 110, 5, 8, 2, NULL, NULL, NULL),
(109, 150, 5, 9, 2, NULL, NULL, NULL),
(110, 140, 5, 10, 2, NULL, NULL, NULL),
(111, 110, 4, 1, 2, NULL, NULL, NULL),
(112, 110, 4, 2, 2, NULL, NULL, NULL),
(113, 110, 4, 3, 2, NULL, NULL, NULL),
(114, 90, 4, 4, 2, NULL, NULL, NULL),
(115, 120, 4, 5, 2, NULL, NULL, NULL),
(116, 120, 4, 6, 2, NULL, NULL, NULL),
(117, 100, 4, 7, 2, NULL, NULL, NULL),
(118, 110, 4, 8, 2, NULL, NULL, NULL),
(119, 150, 4, 9, 2, NULL, NULL, NULL),
(120, 140, 4, 10, 2, NULL, NULL, NULL),
(121, 130, 2, 1, 2, NULL, NULL, NULL),
(122, 90, 2, 2, 2, NULL, NULL, NULL),
(123, 130, 2, 3, 2, NULL, NULL, NULL),
(124, 110, 2, 4, 2, NULL, NULL, NULL),
(125, 120, 2, 5, 2, NULL, NULL, NULL),
(126, 120, 2, 6, 2, NULL, NULL, NULL),
(127, 120, 2, 7, 2, NULL, NULL, NULL),
(128, 100, 2, 8, 2, NULL, NULL, NULL),
(129, 150, 2, 9, 2, NULL, NULL, NULL),
(130, 140, 2, 10, 2, NULL, NULL, NULL),
(131, 170, 6, 1, 2, NULL, NULL, NULL),
(132, 120, 6, 2, 2, NULL, NULL, NULL),
(133, 120, 6, 3, 2, NULL, NULL, NULL),
(134, 120, 6, 4, 2, NULL, NULL, NULL),
(135, 150, 6, 5, 2, NULL, NULL, NULL),
(136, 90, 6, 6, 2, NULL, NULL, NULL),
(137, 150, 6, 7, 2, NULL, NULL, NULL),
(138, 100, 6, 8, 2, NULL, NULL, NULL),
(139, 150, 6, 9, 2, NULL, NULL, NULL),
(140, 140, 6, 10, 2, NULL, NULL, NULL),
(141, 120, 3, 1, 2, NULL, NULL, NULL),
(142, 130, 3, 2, 2, NULL, NULL, NULL),
(143, 90, 3, 3, 2, NULL, NULL, NULL),
(144, 110, 3, 4, 2, NULL, NULL, NULL),
(145, 180, 3, 5, 2, NULL, NULL, NULL),
(146, 120, 3, 6, 2, NULL, NULL, NULL),
(147, 100, 3, 7, 2, NULL, NULL, NULL),
(148, 80, 3, 8, 2, NULL, NULL, NULL),
(149, 150, 3, 9, 2, NULL, NULL, NULL),
(150, 140, 3, 10, 2, NULL, NULL, NULL),
(151, 120, 8, 1, 2, NULL, NULL, NULL),
(152, 100, 8, 2, 2, NULL, NULL, NULL),
(153, 80, 8, 3, 2, NULL, NULL, NULL),
(154, 110, 8, 4, 2, NULL, NULL, NULL),
(155, 110, 8, 5, 2, NULL, NULL, NULL),
(156, 100, 8, 6, 2, NULL, NULL, NULL),
(157, 130, 8, 7, 2, NULL, NULL, NULL),
(158, 90, 8, 8, 2, NULL, NULL, NULL),
(159, 150, 8, 9, 2, NULL, NULL, NULL),
(160, 140, 8, 10, 2, NULL, NULL, NULL),
(161, 90, 1, 1, 2, NULL, NULL, NULL),
(162, 130, 1, 2, 2, NULL, NULL, NULL),
(163, 120, 1, 3, 2, NULL, NULL, NULL),
(164, 110, 1, 4, 2, NULL, NULL, NULL),
(165, 100, 1, 5, 2, NULL, NULL, NULL),
(166, 170, 1, 6, 2, NULL, NULL, NULL),
(167, 120, 1, 7, 2, NULL, NULL, NULL),
(168, 120, 1, 8, 2, NULL, NULL, NULL),
(169, 170, 1, 9, 2, NULL, NULL, NULL),
(170, 100, 1, 10, 2, NULL, NULL, NULL),
(171, 120, 7, 1, 2, NULL, NULL, NULL),
(172, 120, 7, 2, 2, NULL, NULL, NULL),
(173, 100, 7, 3, 2, NULL, NULL, NULL),
(174, 100, 7, 4, 2, NULL, NULL, NULL),
(175, 130, 7, 5, 2, NULL, NULL, NULL),
(176, 150, 7, 6, 2, NULL, NULL, NULL),
(177, 90, 7, 7, 2, NULL, NULL, NULL),
(178, 130, 7, 8, 2, NULL, NULL, NULL),
(179, 120, 7, 9, 2, NULL, NULL, NULL),
(180, 140, 7, 10, 2, NULL, NULL, NULL),
(181, 100, 10, 1, 2, NULL, NULL, NULL),
(182, 140, 10, 2, 2, NULL, NULL, NULL),
(183, 140, 10, 3, 2, NULL, NULL, NULL),
(184, 140, 10, 4, 2, NULL, NULL, NULL),
(185, 140, 10, 5, 2, NULL, NULL, NULL),
(186, 140, 10, 6, 2, NULL, NULL, NULL),
(187, 140, 10, 7, 2, NULL, NULL, NULL),
(188, 140, 10, 8, 2, NULL, NULL, NULL),
(189, 180, 10, 9, 2, NULL, NULL, NULL),
(190, 90, 10, 10, 2, NULL, NULL, NULL),
(191, 170, 9, 1, 2, NULL, NULL, NULL),
(192, 150, 9, 2, 2, NULL, NULL, NULL),
(193, 150, 9, 3, 2, NULL, NULL, NULL),
(194, 150, 9, 4, 2, NULL, NULL, NULL),
(195, 150, 9, 5, 2, NULL, NULL, NULL),
(196, 150, 9, 6, 2, NULL, NULL, NULL),
(197, 120, 9, 7, 2, NULL, NULL, NULL),
(198, 150, 9, 8, 2, NULL, NULL, NULL),
(199, 90, 9, 9, 2, NULL, NULL, NULL),
(200, 180, 9, 10, 2, NULL, NULL, NULL),
(201, 60, 5, 1, 1, NULL, NULL, NULL),
(202, 70, 5, 2, 1, NULL, NULL, NULL),
(203, 110, 5, 3, 1, NULL, NULL, NULL),
(204, 70, 5, 4, 1, NULL, NULL, NULL),
(205, 70, 5, 5, 1, NULL, NULL, NULL),
(206, 90, 5, 6, 1, NULL, NULL, NULL),
(207, 80, 5, 7, 1, NULL, NULL, NULL),
(208, 70, 5, 8, 1, NULL, NULL, NULL),
(209, 90, 5, 9, 1, NULL, NULL, NULL),
(210, 80, 5, 10, 1, NULL, NULL, NULL),
(211, 70, 4, 1, 1, NULL, NULL, NULL),
(212, 70, 4, 2, 1, NULL, NULL, NULL),
(213, 70, 4, 3, 1, NULL, NULL, NULL),
(214, 50, 4, 4, 1, NULL, NULL, NULL),
(215, 70, 4, 5, 1, NULL, NULL, NULL),
(216, 70, 4, 6, 1, NULL, NULL, NULL),
(217, 60, 4, 7, 1, NULL, NULL, NULL),
(218, 70, 4, 8, 1, NULL, NULL, NULL),
(219, 90, 4, 9, 1, NULL, NULL, NULL),
(220, 80, 4, 10, 1, NULL, NULL, NULL),
(221, 80, 2, 1, 1, NULL, NULL, NULL),
(222, 50, 2, 2, 1, NULL, NULL, NULL),
(223, 80, 2, 3, 1, NULL, NULL, NULL),
(224, 70, 2, 4, 1, NULL, NULL, NULL),
(225, 70, 2, 5, 1, NULL, NULL, NULL),
(226, 70, 2, 6, 1, NULL, NULL, NULL),
(227, 70, 2, 7, 1, NULL, NULL, NULL),
(228, 60, 2, 8, 1, NULL, NULL, NULL),
(229, 90, 2, 9, 1, NULL, NULL, NULL),
(230, 80, 2, 10, 1, NULL, NULL, NULL),
(231, 100, 6, 1, 1, NULL, NULL, NULL),
(232, 70, 6, 2, 1, NULL, NULL, NULL),
(233, 70, 6, 3, 1, NULL, NULL, NULL),
(234, 70, 6, 4, 1, NULL, NULL, NULL),
(235, 90, 6, 5, 1, NULL, NULL, NULL),
(236, 50, 6, 6, 1, NULL, NULL, NULL),
(237, 90, 6, 7, 1, NULL, NULL, NULL),
(238, 60, 6, 8, 1, NULL, NULL, NULL),
(239, 90, 6, 9, 1, NULL, NULL, NULL),
(240, 80, 6, 10, 1, NULL, NULL, NULL),
(241, 70, 3, 1, 1, NULL, NULL, NULL),
(242, 80, 3, 2, 1, NULL, NULL, NULL),
(243, 50, 3, 3, 1, NULL, NULL, NULL),
(244, 70, 3, 4, 1, NULL, NULL, NULL),
(245, 110, 3, 5, 1, NULL, NULL, NULL),
(246, 70, 3, 6, 1, NULL, NULL, NULL),
(247, 60, 3, 7, 1, NULL, NULL, NULL),
(248, 50, 3, 8, 1, NULL, NULL, NULL),
(249, 90, 3, 9, 1, NULL, NULL, NULL),
(250, 80, 3, 10, 1, NULL, NULL, NULL),
(251, 70, 8, 1, 1, NULL, NULL, NULL),
(252, 60, 8, 2, 1, NULL, NULL, NULL),
(253, 50, 8, 3, 1, NULL, NULL, NULL),
(254, 70, 8, 4, 1, NULL, NULL, NULL),
(255, 70, 8, 5, 1, NULL, NULL, NULL),
(256, 60, 8, 6, 1, NULL, NULL, NULL),
(257, 80, 8, 7, 1, NULL, NULL, NULL),
(258, 50, 8, 8, 1, NULL, NULL, NULL),
(259, 90, 8, 9, 1, NULL, NULL, NULL),
(260, 80, 8, 10, 1, NULL, NULL, NULL),
(261, 50, 1, 1, 1, NULL, NULL, NULL),
(262, 80, 1, 2, 1, NULL, NULL, NULL),
(263, 70, 1, 3, 1, NULL, NULL, NULL),
(264, 70, 1, 4, 1, NULL, NULL, NULL),
(265, 60, 1, 5, 1, NULL, NULL, NULL),
(266, 100, 1, 6, 1, NULL, NULL, NULL),
(267, 70, 1, 7, 1, NULL, NULL, NULL),
(268, 70, 1, 8, 1, NULL, NULL, NULL),
(269, 100, 1, 9, 1, NULL, NULL, NULL),
(270, 60, 1, 10, 1, NULL, NULL, NULL),
(271, 70, 7, 1, 1, NULL, NULL, NULL),
(272, 70, 7, 2, 1, NULL, NULL, NULL),
(273, 60, 7, 3, 1, NULL, NULL, NULL),
(274, 60, 7, 4, 1, NULL, NULL, NULL),
(275, 80, 7, 5, 1, NULL, NULL, NULL),
(276, 90, 7, 6, 1, NULL, NULL, NULL),
(277, 50, 7, 7, 1, NULL, NULL, NULL),
(278, 80, 7, 8, 1, NULL, NULL, NULL),
(279, 70, 7, 9, 1, NULL, NULL, NULL),
(280, 80, 7, 10, 1, NULL, NULL, NULL),
(281, 60, 10, 1, 1, NULL, NULL, NULL),
(282, 80, 10, 2, 1, NULL, NULL, NULL),
(283, 80, 10, 3, 1, NULL, NULL, NULL),
(284, 80, 10, 4, 1, NULL, NULL, NULL),
(285, 80, 10, 5, 1, NULL, NULL, NULL),
(286, 80, 10, 6, 1, NULL, NULL, NULL),
(287, 80, 10, 7, 1, NULL, NULL, NULL),
(288, 80, 10, 8, 1, NULL, NULL, NULL),
(289, 110, 10, 9, 1, NULL, NULL, NULL),
(290, 50, 10, 10, 1, NULL, NULL, NULL),
(291, 100, 9, 1, 1, NULL, NULL, NULL),
(292, 90, 9, 2, 1, NULL, NULL, NULL),
(293, 90, 9, 3, 1, NULL, NULL, NULL),
(294, 90, 9, 4, 1, NULL, NULL, NULL),
(295, 90, 9, 5, 1, NULL, NULL, NULL),
(296, 90, 9, 6, 1, NULL, NULL, NULL),
(297, 70, 9, 7, 1, NULL, NULL, NULL),
(298, 90, 9, 8, 1, NULL, NULL, NULL),
(299, 50, 9, 9, 1, NULL, NULL, NULL),
(300, 110, 9, 10, 1, NULL, NULL, NULL),
(301, 18, 5, 1, 0, NULL, NULL, NULL),
(302, 22, 5, 2, 0, NULL, NULL, NULL),
(303, 32, 5, 3, 0, NULL, NULL, NULL),
(304, 22, 5, 4, 0, NULL, NULL, NULL),
(305, 20, 5, 5, 0, NULL, NULL, NULL),
(306, 27, 5, 6, 0, NULL, NULL, NULL),
(307, 23, 5, 7, 0, NULL, NULL, NULL),
(308, 20, 5, 8, 0, NULL, NULL, NULL),
(309, 20, 4, 1, 0, NULL, NULL, NULL),
(310, 20, 4, 2, 0, NULL, NULL, NULL),
(311, 20, 4, 3, 0, NULL, NULL, NULL),
(312, 16, 4, 4, 0, NULL, NULL, NULL),
(313, 22, 4, 5, 0, NULL, NULL, NULL),
(314, 22, 4, 6, 0, NULL, NULL, NULL),
(315, 18, 4, 7, 0, NULL, NULL, NULL),
(316, 20, 4, 8, 0, NULL, NULL, NULL),
(317, 23, 2, 1, 0, NULL, NULL, NULL),
(318, 16, 2, 2, 0, NULL, NULL, NULL),
(319, 23, 2, 3, 0, NULL, NULL, NULL),
(320, 20, 2, 4, 0, NULL, NULL, NULL),
(321, 22, 2, 5, 0, NULL, NULL, NULL),
(322, 22, 2, 6, 0, NULL, NULL, NULL),
(323, 22, 2, 7, 0, NULL, NULL, NULL),
(324, 18, 2, 8, 0, NULL, NULL, NULL),
(325, 22, 6, 2, 0, NULL, NULL, NULL),
(326, 22, 6, 3, 0, NULL, NULL, NULL),
(327, 22, 6, 4, 0, NULL, NULL, NULL),
(328, 27, 6, 5, 0, NULL, NULL, NULL),
(329, 16, 6, 6, 0, NULL, NULL, NULL),
(330, 27, 6, 7, 0, NULL, NULL, NULL),
(331, 18, 6, 8, 0, NULL, NULL, NULL),
(332, 22, 3, 1, 0, NULL, NULL, NULL),
(333, 23, 3, 2, 0, NULL, NULL, NULL),
(334, 16, 3, 3, 0, NULL, NULL, NULL),
(335, 20, 3, 4, 0, NULL, NULL, NULL),
(336, 32, 3, 5, 0, NULL, NULL, NULL),
(337, 22, 3, 6, 0, NULL, NULL, NULL),
(338, 18, 3, 7, 0, NULL, NULL, NULL),
(339, 14, 3, 8, 0, NULL, NULL, NULL),
(340, 22, 8, 1, 0, NULL, NULL, NULL),
(341, 18, 8, 2, 0, NULL, NULL, NULL),
(342, 14, 8, 3, 0, NULL, NULL, NULL),
(343, 20, 8, 4, 0, NULL, NULL, NULL),
(344, 20, 8, 5, 0, NULL, NULL, NULL),
(345, 18, 8, 6, 0, NULL, NULL, NULL),
(346, 23, 8, 7, 0, NULL, NULL, NULL),
(347, 16, 8, 8, 0, NULL, NULL, NULL),
(348, 16, 1, 1, 0, NULL, NULL, NULL),
(349, 23, 1, 2, 0, NULL, NULL, NULL),
(350, 22, 1, 3, 0, NULL, NULL, NULL),
(351, 20, 1, 4, 0, NULL, NULL, NULL),
(352, 18, 1, 5, 0, NULL, NULL, NULL),
(353, 31, 1, 6, 0, NULL, NULL, NULL),
(354, 22, 1, 7, 0, NULL, NULL, NULL),
(355, 22, 1, 8, 0, NULL, NULL, NULL),
(356, 22, 7, 1, 0, NULL, NULL, NULL),
(357, 22, 7, 2, 0, NULL, NULL, NULL),
(358, 18, 7, 3, 0, NULL, NULL, NULL),
(359, 18, 7, 4, 0, NULL, NULL, NULL),
(360, 23, 7, 5, 0, NULL, NULL, NULL),
(361, 27, 7, 6, 0, NULL, NULL, NULL),
(362, 16, 7, 7, 0, NULL, NULL, NULL),
(363, 23, 7, 8, 0, NULL, NULL, NULL),
(364, 20, 10, 10, 0, NULL, NULL, NULL),
(365, 20, 9, 9, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ancho` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `largo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `alto`, `ancho`, `largo`, `peso`, `precio_unitario`, `cantidad`, `descripcion`, `imagen`, `subcategory_id`, `service_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '1', '1', 60, 1, 'a', NULL, 1, 9, '2020-12-08 03:39:06', '2020-12-08 03:39:06', NULL),
(2, '2CM', '3CM', '33CM', '2KG', 70, 1, 'asdasd', NULL, 1, 10, '2020-12-08 21:04:30', '2020-12-08 21:04:30', NULL),
(3, '2CM', '3CM', '33CM', '2KG', 70, 1, 'asdasd', NULL, 1, 11, '2020-12-08 21:04:41', '2020-12-08 21:04:41', NULL),
(4, '3CM', '3CM', '3CM', '3KG', 70, 3, 'sadas', NULL, 1, 11, '2020-12-09 00:07:56', '2020-12-09 00:07:56', NULL),
(5, '3CM', '3CM', '3CM', '3KG', 70, 1, '3', NULL, 1, 12, '2020-12-09 00:16:51', '2020-12-09 00:16:51', NULL),
(6, '3CM', '4CM', '4CM', '3KG', 70, 1, 'ss', NULL, 1, 13, '2020-12-09 00:33:10', '2020-12-09 00:33:10', NULL),
(7, '5CM', '90CM', '90CM', '7KG', 60, 1, 'Mesa de centro de cedro', NULL, 1, 14, '2020-12-09 15:26:18', '2020-12-09 15:26:18', NULL),
(8, '5CM', '90CM', '90CM', '7KG', 60, 1, 'Mesa de centro de cedro', NULL, 1, 15, '2020-12-09 15:26:18', '2020-12-09 15:26:18', NULL),
(9, '3CM', '70CM', '89CM', '15KG', 70, 1, 'Mesa de centro con base vidrio', NULL, 1, 16, '2020-12-09 15:51:43', '2020-12-09 15:51:43', NULL),
(10, '30CM', '70CM', '89CM', '3KG', 70, 1, 'Mesa de centro con vidrio', NULL, 1, 17, '2020-12-09 15:56:39', '2020-12-09 15:56:39', NULL),
(11, '80CM', '100CM', '80CM', '20KG', 70, 1, 'Mesa de centro rochelle', NULL, 1, 18, '2020-12-09 19:38:06', '2020-12-09 19:38:06', NULL),
(12, '1MT', '2MT', '3MT', '10KG', 60, 1, 'Producto 1', NULL, 1, 19, '2020-12-09 22:34:16', '2020-12-09 22:34:16', NULL),
(13, '3MT', '2MT', '1MT', '15undefined', 60, 2, 'Producto 2', NULL, 1, 19, '2020-12-09 22:34:16', '2020-12-09 22:34:16', NULL),
(14, '2MT', '2MT', '2MT', '20KG', 60, 3, 'Producto 3', NULL, 1, 19, '2020-12-09 22:34:16', '2020-12-09 22:34:16', NULL),
(15, '80CM', '70CM', '170CM', '70KG', 200, 1, 'Juego de comedor', '/storage/products/PmQ3acj7UdLVTE3682bcJzFvMWotbC8FJxgJvG1s.jpg', 78, 20, '2021-01-15 14:58:22', '2021-01-28 05:28:50', NULL),
(16, '70CM', '60CM', '90CM', '50KG', 100, 1, 'Sillon 3 cuerpos', '/storage/products/JPH0m58m0JllqEBq2YRkbKuVVpPlPVNRTb85ewWz.jpg', 70, 20, '2021-01-15 14:58:22', '2021-01-28 05:35:05', NULL),
(17, '40CM', '120CM', '190CM', '80KG', 90, 2, 'Dormitorio de 1.5 plz', '/storage/products/nLfkeb5jtCJgOICpbU8M5e74diAZPWwsH1UQKfUV.jpg', 93, 21, '2021-01-15 21:03:39', '2021-01-28 05:52:24', NULL),
(18, '70CM', '80CM', '230CM', '120KG', 140, 1, 'Juego de sala 3 2 1', NULL, 65, 22, '2021-01-15 21:17:37', '2021-01-15 21:17:37', NULL),
(19, '70CM', '60CM', '160CM', '60KG', 140, 1, 'juego de sala saifer 3 2', '/storage/products/4M1YgwIFNeIbTRwC0CgBZnL3cnr18tKuc5I832a6.jpg', 65, 23, '2021-01-15 21:28:03', '2021-01-28 05:48:42', NULL),
(20, '50CM', '70CM', '120CM', '15KG', 90, 1, 'Banqueta de 3', '/storage/products/zEgR4XTKgpO4aTtpNwiiKUPLcsNkGmgM3TrIdYrI.jpg', 70, 24, '2021-01-15 21:38:02', '2021-01-28 05:47:37', NULL),
(21, '70CM', '130CM', '200CM', '90KG', 170, 2, 'Cama queen', NULL, 94, 25, '2021-01-15 22:04:43', '2021-01-15 22:04:43', NULL),
(22, '10CM', '10CM', '10CM', '5KG', 70, 4, 'Cojines', NULL, 100, 26, '2021-01-15 22:26:35', '2021-01-15 22:26:35', NULL),
(23, '95CM', '5CM', '100CM', '15KG', 110, 1, 'zxjchzkjc', NULL, 80, 26, '2021-01-15 22:26:35', '2021-01-15 22:26:35', NULL),
(24, '60CM', '70CM', '120CM', '60KG', 120, 1, 'Silon 3 cuerpos', '/storage/products/Tjks1SI3nPnTv5WloaqXz1ml84LFrpurAcJB8OMd.jpg', 70, 27, '2021-01-16 03:39:37', '2021-01-28 05:44:30', NULL),
(25, '70CM', '70CM', NULL, '40KG', NULL, NULL, 'sillon', '/storage/products/BMoef9qiDAjmP2CE4Lj2C1cFV0XqpT9wYjjbaPV4.png', 63, 28, '2021-01-25 05:32:55', '2021-01-25 05:36:24', NULL),
(26, '12CM', '20CM', '120CM', '60KG', 140, 1, 'sala 3 2 1', '/storage/products/8isKFjdz96sQxDqvsPrMJq1qlvDvLfy1oynSIeW6.jpg', 65, 28, '2021-01-25 05:32:55', '2021-01-28 05:42:35', NULL),
(27, '20CM', '30CM', '60CM', '1KG', 80, 1, 'mesa de centro', '/storage/products/srgKy1yIwEWzogezzHAn3LYMxivxJEpMuguphsvS.jpg', 63, 29, '2021-01-25 15:31:00', '2021-01-28 05:39:46', NULL),
(28, '60CM', '70CM', '120CM', '60KG', 200, 1, 'centro de tv 55', NULL, 68, 30, '2021-01-25 16:12:28', '2021-01-25 16:12:28', NULL),
(29, '12CM', NULL, NULL, '12KG', 50, 1, 'mesita', '/storage/products/mNq7pqJtS6HgKU2uq4GVAXCVo51mPPZ3LwI7EJYW.jpg', 63, 31, '2021-01-25 22:47:46', '2021-01-28 06:08:59', NULL),
(30, '120CM', '120CM', '120CM', '90KG', 140, 1, 'sala 3 2', NULL, 65, 32, '2021-01-26 04:48:46', '2021-01-26 04:48:46', NULL),
(31, '12CM', NULL, NULL, '56KG', NULL, NULL, 'mesa', '/storage/products/icuqEbKm6ZaLXhN5o0nRfvk5KZRxR7gyCfZunupe.png', 63, 33, '2021-01-26 14:44:35', '2021-01-26 19:45:41', NULL),
(32, '80CM', '120CM', '190CM', '80KG', 200, 1, 'JUEGO DE COMEDOR', NULL, 78, 34, '2021-01-26 16:33:21', '2021-01-26 16:33:21', NULL),
(33, '20CM', '29CM', '20CM', '120KG', 90, 1, 'SDASD', NULL, 80, 35, '2021-01-26 20:54:00', '2021-01-26 20:54:00', NULL),
(34, '21CM', NULL, NULL, '1T', NULL, NULL, 'sillones', '/storage/products/DEkirKCB3T3tpmnXwQM2yzm93kpy2CsqBnpu0VDq.jpg', 63, 36, '2021-01-27 05:44:48', '2021-01-28 05:10:49', NULL),
(35, '123CM', NULL, NULL, '123KG', 50, 1, 'enajsksdsas', NULL, 72, 37, '2021-01-27 06:20:44', '2021-01-27 06:20:44', NULL),
(36, '12CM', NULL, NULL, '12KG', 90, 1, 'producto 1', NULL, 64, 38, '2021-01-27 06:55:03', '2021-01-27 06:55:03', NULL),
(37, '14CM', '13CM', NULL, '12KG', 90, 1, 'producto 1', NULL, 64, 38, '2021-01-27 06:55:03', '2021-01-27 06:55:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requirement_status`
--

CREATE TABLE `requirement_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `requirement_status`
--

INSERT INTO `requirement_status` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Apto', NULL, NULL),
(2, 'No apto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisionables`
--

CREATE TABLE `revisionables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `revision_id` bigint(20) UNSIGNED DEFAULT NULL,
  `revisionable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `revisionable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `revisionables`
--

INSERT INTO `revisionables` (`id`, `revision_id`, `revisionable_id`, `revisionable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'App\\Models\\DriverRevision', NULL, NULL),
(2, 1, 6, 'App\\Models\\VehicleRevision', NULL, NULL),
(3, 2, 6, 'App\\Models\\DriverRevision', NULL, NULL),
(4, 2, 7, 'App\\Models\\VehicleRevision', NULL, NULL),
(5, 3, 7, 'App\\Models\\DriverRevision', NULL, NULL),
(6, 3, 8, 'App\\Models\\VehicleRevision', NULL, NULL),
(7, 4, 8, 'App\\Models\\DriverRevision', NULL, NULL),
(8, 4, 9, 'App\\Models\\VehicleRevision', NULL, NULL),
(9, 4, 9, 'App\\Models\\DriverRevision', NULL, NULL),
(10, 4, 10, 'App\\Models\\VehicleRevision', NULL, NULL),
(11, 4, 10, 'App\\Models\\DriverRevision', NULL, NULL),
(12, 4, 11, 'App\\Models\\VehicleRevision', NULL, NULL),
(13, 5, 11, 'App\\Models\\DriverRevision', NULL, NULL),
(14, 5, 12, 'App\\Models\\VehicleRevision', NULL, NULL),
(15, 5, 12, 'App\\Models\\DriverRevision', NULL, NULL),
(16, 5, 13, 'App\\Models\\VehicleRevision', NULL, NULL),
(17, 6, 13, 'App\\Models\\DriverRevision', NULL, NULL),
(18, 6, 14, 'App\\Models\\VehicleRevision', NULL, NULL),
(19, 7, 15, 'App\\Models\\VehicleRevision', NULL, NULL),
(20, 7, 14, 'App\\Models\\DriverRevision', NULL, NULL),
(21, 7, 16, 'App\\Models\\VehicleRevision', NULL, NULL),
(22, 7, 15, 'App\\Models\\DriverRevision', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisions`
--

CREATE TABLE `revisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `revisions`
--

INSERT INTO `revisions` (`id`, `driver_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-20 22:52:05', '2020-11-20 22:52:05'),
(2, 1, '2020-11-23 07:59:48', '2020-11-23 07:59:48'),
(3, 2, '2020-11-24 01:27:20', '2020-11-24 01:27:20'),
(4, 2, '2020-12-09 19:03:36', '2020-12-09 19:03:36'),
(5, 2, '2021-01-15 22:35:28', '2021-01-15 22:35:28'),
(6, 1, '2021-01-25 15:25:25', '2021-01-25 15:25:25'),
(7, 2, '2021-01-26 20:34:28', '2021-01-26 20:34:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesmodules`
--

CREATE TABLE `rolesmodules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idModule` bigint(20) UNSIGNED NOT NULL,
  `idUsertype` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rolesmodules`
--

INSERT INTO `rolesmodules` (`id`, `idModule`, `idUsertype`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 4, 3, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 5, 3, NULL, NULL),
(5, 3, 3, NULL, NULL),
(6, 7, 1, NULL, NULL),
(7, 6, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direccion_origen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_recojo` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `transaction_id` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distrito_origen_id` bigint(20) UNSIGNED NOT NULL,
  `distrito_destino_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_state_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `direccion_origen`, `direccion_destino`, `fecha_recojo`, `fecha_entrega`, `total`, `transaction_id`, `distrito_origen_id`, `distrito_destino_id`, `user_id`, `service_state_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Origen', 'Destino', '2020-12-11 21:02:16', '2020-12-10 21:02:16', 100, '1', 1, 2, 1, 1, NULL, NULL, NULL),
(9, 'asdfasdf', 'asfdafd', '2020-12-09 00:00:00', '2020-12-22 00:00:00', 60, '0', 1, 1, 28, 1, '2020-12-08 03:39:06', '2020-12-08 03:39:06', NULL),
(10, 'oso...', 'rio... xd', '2020-12-08 00:00:00', '2020-12-09 00:00:00', 70, '0', 1, 1, 28, 1, '2020-12-08 21:04:30', '2020-12-08 21:04:30', NULL),
(11, 'de aqui', 'a aqui', '2020-12-09 00:00:00', '2020-12-11 00:00:00', 280, '0', 1, 1, 28, 3, '2020-12-09 00:07:56', '2021-01-27 20:21:44', NULL),
(12, 'asdasd', 'asdasda', '2020-12-04 00:00:00', '2020-12-11 00:00:00', 70, '0', 1, 1, 28, 3, '2020-12-09 00:16:51', '2021-01-16 03:02:37', NULL),
(13, 'ahora si', 'ahora si di', '2020-12-10 00:00:00', '2020-12-05 00:00:00', 70, '684707079-a9201715-78ea-4bfc-b223-ee4b0c727bc2', 1, 1, 26, 3, '2020-12-09 00:33:10', '2020-12-09 05:57:19', NULL),
(14, 'Av las gaviotas 125', 'Av ferrocarril 230', '2020-12-11 00:00:00', '2020-12-11 00:00:00', 60, '684707079-dcfd1362-0bcc-4063-a86f-fcbb04e24a0f', 1, 1, 28, 4, '2020-12-09 15:26:18', '2021-01-16 03:02:35', NULL),
(15, 'Av las gaviotas 125', 'Av ferrocarril 230', '2020-12-11 00:00:00', '2020-12-11 00:00:00', 60, '684707079-5f120769-50a8-4085-bf43-396c3bab76ad', 1, 1, 28, 3, '2020-12-09 15:26:18', '2021-01-16 03:02:40', NULL),
(16, 'Av matellini 123', 'Av los ingenieros 123', '2020-12-11 00:00:00', '2020-12-13 00:00:00', 70, '684707079-5fc32ffd-ea5c-499e-bf90-a29a9220844d', 1, 1, 29, 3, '2020-12-09 15:51:43', '2021-01-16 03:02:43', NULL),
(17, 'Av las asturias 1233', 'Av los increibles 230', '2020-12-10 00:00:00', '2020-12-11 00:00:00', 70, '684707079-ce0e6672-28d1-4419-a5a0-cc1aa97db649', 1, 1, 29, 3, '2020-12-09 15:56:39', '2020-12-09 21:16:31', NULL),
(18, 'jiron los caballos 160', 'Calle las alforjas 255', '2020-12-10 00:00:00', '2020-12-11 00:00:00', 70, '684707079-d48912a0-71a5-42e3-93fd-c5102a531cb1', 1, 1, 30, 4, '2020-12-09 19:38:06', '2021-01-27 07:46:24', NULL),
(19, 'Dirección de Recojo', 'Dirección de Entrega', '2020-12-10 00:00:00', '2020-12-12 00:00:00', 360, '684707079-1e36b2ee-3984-48fc-b49c-b334523f17c6', 1, 1, 28, 1, '2020-12-09 22:34:16', '2020-12-09 22:34:16', NULL),
(20, 'av las gaviotas 175', 'st 1 gp 26 mz j lt 5', '2021-01-18 00:00:00', '2021-01-19 00:00:00', 300, '684707079-f317f224-d051-453d-9e3c-242a68de5763', 1, 1, 28, 1, '2021-01-15 14:58:22', '2021-01-15 14:58:22', NULL),
(21, 'Av guardia civil 233', 'Av los angeles 132', '2021-01-16 00:00:00', '2021-01-18 00:00:00', 180, '684707079-169b429a-de03-471c-8569-c07dc1d98d05', 1, 1, 28, 1, '2021-01-15 21:03:39', '2021-01-15 21:03:39', NULL),
(22, 'AV MIRAMAR 232', 'AV 28 DE JULIO 123', '2021-01-18 00:00:00', '2021-01-18 00:00:00', 140, '684707079-2f9b3345-ea95-487d-abe9-81691c23261e', 1, 1, 28, 1, '2021-01-15 21:17:37', '2021-01-15 21:17:37', NULL),
(23, 'Cedros 123 Los olivos', 'Los giraldos 123 Independencia', '2021-01-19 00:00:00', '2021-01-19 00:00:00', 140, '684707079-fee7883f-dddd-42b1-a210-1fbff29e1755', 1, 1, 28, 1, '2021-01-15 21:28:03', '2021-01-15 21:28:03', NULL),
(24, 'Av guardia civil 344 Chorrillos', 'Av miramar 333 VES', '2021-01-18 00:00:00', '2021-01-21 00:00:00', 90, '684707079-1202eae5-8a78-4d21-ae04-677ff379f182', 1, 1, 28, 4, '2021-01-15 21:38:02', '2021-01-27 07:39:10', NULL),
(25, 'Av prolongacion 123 sd', 'Av la libertad 123', '2021-01-20 00:00:00', '2021-01-20 00:00:00', 340, '684707079-aef51c82-26b1-4c47-b06a-b0cd26b672e7', 36, 19, 28, 4, '2021-01-15 22:04:43', '2021-01-27 07:43:00', NULL),
(26, 'dlskfjsdalkfjsdlkj', 'asdpfijsdafjsdokfjsad', '2021-01-16 00:00:00', '2021-01-18 00:00:00', 390, '684707079-864ad8ed-16d1-4db5-bf92-0affdd4492c7', 10, 18, 31, 4, '2021-01-15 22:26:35', '2021-01-27 07:44:23', NULL),
(27, 'St 1 gp 26 mz j lt 5', 'Calle los girasoles 132', '2021-01-18 00:00:00', '2021-01-20 00:00:00', 120, '684707079-6630c487-7b93-4d74-848e-f894c7c2123f', 5, 12, 28, 1, '2021-01-16 03:39:37', '2021-01-16 03:39:37', NULL),
(28, 'St 1', 'st 2', '2021-01-03 00:00:00', '2021-01-27 00:00:00', 190, '684707079-9fb9fc14-f93b-405b-bf36-6083892c72d7', 11, 15, 28, 1, '2021-01-25 05:32:55', '2021-01-25 05:32:55', NULL),
(29, 'av las', 'av los', '2021-01-26 00:00:00', '2021-01-28 00:00:00', 80, '684707079-a6ceaad8-390e-4b3c-837a-a43d54d1f523', 7, 6, 28, 1, '2021-01-25 15:31:00', '2021-01-25 15:31:00', NULL),
(30, 'av lasss', 'av lossss', '2021-01-29 00:00:00', '2021-01-30 00:00:00', 200, '684707079-48ff19c2-a41a-4609-8be2-e82cc92f6191', 3, 10, 33, 1, '2021-01-25 16:12:28', '2021-01-25 16:12:28', NULL),
(31, 'AV. MIGUEL GRAU', 'CHORRILLOS', '2021-01-26 00:00:00', '2021-01-30 00:00:00', 50, '684707079-b1c46bc2-b789-4450-aecd-35c30cac0128', 1, 2, 28, 6, '2021-01-25 22:47:46', '2021-01-25 22:47:46', NULL),
(32, 'prueba 1', 'prueba 2', '2021-01-26 00:00:00', '2021-01-27 00:00:00', 140, '684707079-54fe7a4e-44d9-4e45-883b-1ad41c721b9b', 32, 30, 32, 6, '2021-01-26 04:48:46', '2021-01-27 07:23:44', NULL),
(33, 'AV. MIGUEL GRAU 16996 JOSE GALVEZ', 'AV. LOS ANGELES MZ 4', '2021-01-20 00:00:00', '2021-01-30 00:00:00', 50, '684707079-e0f87102-de4e-46ca-aa2e-58b2cdbc179c', 1, 2, 28, 4, '2021-01-26 14:44:35', '2021-01-27 07:32:38', NULL),
(34, 'PRUEBA FINAL', 'PRUEBA SIGUIENTE', '2021-01-27 00:00:00', '2021-01-28 00:00:00', 200, '684707079-fcb0fd55-bd3d-46ed-8e50-330b40615fdd', 9, 11, 32, 4, '2021-01-26 16:33:21', '2021-01-27 07:34:38', NULL),
(35, 'ASDSADSA', 'ASDASD', '2021-01-28 00:00:00', '2021-01-27 00:00:00', 90, '684707079-bdd09daf-e34f-4f5e-ac95-b25efb2cf4b1', 12, 15, 35, 4, '2021-01-26 20:54:00', '2021-01-26 20:54:00', NULL),
(36, 'AV PRUEBA', 'AV PRUEBA 1', '2021-01-27 00:00:00', '2021-01-30 00:00:00', 50, '684707079-5bab1376-351d-4cd0-bbe5-172b740cc006', 1, 2, 28, 4, '2021-01-27 05:44:48', '2021-01-27 07:33:42', NULL),
(37, 'JOSE GALVEZ', 'VILLA EL SALVADOR', '2021-01-28 00:00:00', '2021-01-29 00:00:00', 50, '684707079-dd732f78-1971-4454-8e42-93d71161fb62', 3, 2, 37, 2, '2021-01-27 06:20:44', '2021-01-27 06:30:26', NULL),
(38, 'MI CASA', 'TU CASA', '2021-01-28 00:00:00', '2021-01-28 00:00:00', 180, '684707079-5f4e3c20-8911-42bd-8452-265276b7fc2a', 2, 2, 38, 1, '2021-01-27 06:55:03', '2021-01-27 06:55:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_states`
--

CREATE TABLE `service_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `service_states`
--

INSERT INTO `service_states` (`id`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pendiente', NULL, NULL, NULL),
(2, 'Aceptado', NULL, NULL, NULL),
(3, 'En tránsito', NULL, NULL, NULL),
(4, 'Entregado', NULL, NULL, NULL),
(5, 'Falso flete', NULL, NULL, NULL),
(6, 'Rechazado', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'activo', NULL, NULL),
(2, 'inactivo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategories`
--

INSERT INTO `subcategories` (`id`, `nombre`, `category_id`, `vehicle_type_id`, `created_at`, `updated_at`) VALUES
(63, 'Mesa de centro', 1, 1, NULL, NULL),
(64, 'Sofas', 1, 2, NULL, NULL),
(65, 'Juego de sala', 1, 3, NULL, NULL),
(66, 'Centro de televisión en caja', 1, 1, NULL, NULL),
(67, 'Centro de televisión 1.5 m.', 1, 2, NULL, NULL),
(68, 'Centro de televisión mayores a 1.5 m', 1, 3, NULL, NULL),
(69, 'Banquetas', 1, 1, NULL, NULL),
(70, 'Sillones', 1, 2, NULL, NULL),
(71, 'Cuadros', 2, 1, NULL, NULL),
(72, 'Espejos', 2, 1, NULL, NULL),
(73, 'Repostero', 2, 2, NULL, NULL),
(74, 'Comoda', 2, 3, NULL, NULL),
(75, 'Vitrina', 2, 3, NULL, NULL),
(76, 'Sillas', 2, 1, NULL, NULL),
(77, 'Mesa de comedor', 2, 2, NULL, NULL),
(78, 'Juego de comedor', 2, 3, NULL, NULL),
(79, 'Televisión 30\"-50\"', 4, 1, NULL, NULL),
(80, 'Televisión 50\"-70\"', 4, 2, NULL, NULL),
(81, 'Equipo de sonido', 5, 1, NULL, NULL),
(82, 'Parlante de evento', 5, 2, NULL, NULL),
(83, 'Refrigeradora hasta 150 litros', 6, 1, NULL, NULL),
(84, 'Refrigeradora de 150 litros hasya 220 litros', 6, 2, NULL, NULL),
(85, 'Refrigeradora mayores a 220 litros', 6, 3, NULL, NULL),
(86, 'Congeladora', 6, 2, NULL, NULL),
(87, 'Lavadora', 7, 2, NULL, NULL),
(88, 'Secadora', 7, 2, NULL, NULL),
(89, 'Colchon', 3, 1, NULL, NULL),
(90, 'Cama 2 plazas', 3, 2, NULL, NULL),
(91, 'Cama king', 3, 3, NULL, NULL),
(92, 'Escritorio', 3, 1, NULL, NULL),
(93, 'Cama 1.5 plazas', 3, 2, NULL, NULL),
(94, 'Cama queen', 3, 3, NULL, NULL),
(95, 'Ropero desarmado', 3, 1, NULL, NULL),
(96, 'Ropero hasta 2 metros', 3, 2, NULL, NULL),
(97, 'Ropero mayor a 2 metros', 3, 3, NULL, NULL),
(98, 'Parrilla hasta 1.2 metros', 8, 1, NULL, NULL),
(99, 'Parrilla desde 1.2 metros', 8, 2, NULL, NULL),
(100, 'Cajas de 0.4 a 0.8 metros', 9, 1, NULL, NULL),
(101, 'Cajas de 0.8 a 1.5 metros', 9, 2, NULL, NULL),
(102, 'Cajas mayores a 1.5 metros', 9, 3, NULL, NULL),
(103, 'Paquete pequeño', 9, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idStatus` bigint(20) UNSIGNED NOT NULL COMMENT '0:ACTIVO/1:INACTIVO',
  `idUserType` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `idStatus`, `idUserType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jefe', 'jefe@veloxid.com', NULL, '$2y$10$Sp9DyOPaxZfF1jtD9tnRQugQHKJxrwg3E0fjoziX2962FdG3ax92y', NULL, 0, 3, NULL, NULL, NULL),
(5, 'pierina', 'pierina@gmail.com', NULL, '$2y$10$THi1XvzI5Hn0D1jCM.9iZO3XIxMZafWdcq7/3d3X2itQ16TVvL9Wm', NULL, 1, 2, '2020-11-03 06:10:10', '2021-01-15 05:27:36', NULL),
(26, 'cdiego', 'vdiegob@gmail.com', NULL, '$2y$10$Sp9DyOPaxZfF1jtD9tnRQugQHKJxrwg3E0fjoziX2962FdG3ax92y', NULL, 1, 2, '2020-11-19 02:38:06', '2021-01-15 05:34:59', NULL),
(27, 'Conductor', 'conductor@veloxid.com', NULL, '$2y$10$Sp9DyOPaxZfF1jtD9tnRQugQHKJxrwg3E0fjoziX2962FdG3ax92y', NULL, 1, 2, '2020-11-19 02:44:23', '2021-01-15 05:35:12', NULL),
(28, 'Cliente', 'cliente@veloxid.com', NULL, '$2y$10$Sp9DyOPaxZfF1jtD9tnRQugQHKJxrwg3E0fjoziX2962FdG3ax92y', NULL, 1, 1, '2020-12-05 22:12:23', '2020-12-05 22:12:23', NULL),
(29, 'Diego Velasquez', 'dvelasquezb@hogaryspacios.com.pe', NULL, '$2y$10$MGYUZd4PwqDX/cpOag2r/u0wSggfKq8xsPNoYmjMWagGaCLQQWe/a', NULL, 1, 1, '2020-12-09 15:46:52', '2020-12-09 15:46:52', NULL),
(30, 'Ricardo Angulo Montes', 'Ricardo.angulo@hogaryspacios.com.pe', NULL, '$2y$10$FKrdEANHHZ3QwXsELou37OGI6PE4n76NsMIEQr/zZ9KB8RM4vgwri', NULL, 1, 1, '2020-12-09 19:19:56', '2020-12-09 19:19:56', NULL),
(31, 'Jose Calvo', 'jose.calvo@hogaryspacios.com.pe', NULL, '$2y$10$.D.s6t6L9WhBaTuubQgNp.k5vjiTNkmyRW9NszTIMjlscHCzKhFOK', NULL, 1, 1, '2021-01-15 22:17:47', '2021-01-15 22:17:47', NULL),
(32, 'Diego Velasquez Bendezu', 'diego.velasquez@hogaryspacios.com.pe', NULL, '$2y$10$WO5.CK17UkQvfLLIi3OS4u25GvaV0H.W4LtAha.2guEmb47ukighK', NULL, 1, 1, '2021-01-16 03:53:11', '2021-01-16 03:53:11', NULL),
(33, 'Sebastian Velasquez', 'diego_2000_10@hotmail.com', NULL, '$2y$10$kFKgvLB9AoaHHd9xay0pKuHc/e41lFVE7SqN8jte9HveJkozvCc22', NULL, 1, 1, '2021-01-25 16:08:00', '2021-01-25 16:08:00', NULL),
(34, 'Diego prueba', 'diegovb2303@gmail.com', NULL, '$2y$10$v0K7dsk.KJ/kgZYD8oAZHuNQgP6ozUlMUjL1AaeZGHUjpRxDQIX9y', NULL, 1, 1, '2021-01-26 16:36:43', '2021-01-26 16:36:43', NULL),
(35, 'Ricardo Angulo', 'ricardo.angulo@hogaryspacios.com', NULL, '$2y$10$br6QhmcF.j8/0we/3b/44eRuf1zHdJfWf.nTA6TL81z/9ZoOWtefm', NULL, 1, 1, '2021-01-26 20:49:50', '2021-01-26 20:49:50', NULL),
(36, 'Marfrancis Marres Salhuana', 'mmarres_2420@hotmail.com', NULL, '$2y$10$4lm1XRcqlOw81stv.RtB5egn1tbUlTn6JKGN/nlsFNKRvUelO7o0a', NULL, 1, 1, '2021-01-27 05:56:35', '2021-01-27 05:56:35', NULL),
(37, 'Lourdes Salhuana Cerron', 'salhuana_poemas@hotmai.com', NULL, '$2y$10$CpDo9qPygDYw6YmKFDcbN.QG6ScPQuEM/49z7yFCBy5kjuIIKO48W', NULL, 1, 1, '2021-01-27 06:18:06', '2021-01-27 06:18:06', NULL),
(38, 'Gustavo Pezo Ramirez', 'gustavob@gmail.com', NULL, '$2y$10$BDQXeN9uGIZhc0FL./AhbulutqbEtde55jg7JkvZPL6joNHZUfVFO', NULL, 1, 1, '2021-01-27 06:54:14', '2021-01-27 06:54:14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertype`
--

CREATE TABLE `usertype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usertype`
--

INSERT INTO `usertype` (`id`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Cliente', NULL, NULL),
(2, 'Conductor', NULL, NULL),
(3, 'Jefe de Transporte', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidadCarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idVehicleType` bigint(20) UNSIGNED NOT NULL,
  `idDriver` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `placa`, `capacidadCarga`, `imagen`, `idVehicleType`, `idDriver`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WEYYA', '30KG', '', 1, 1, NULL, '2020-11-06 05:23:07', '2020-11-06 05:23:07'),
(2, '21345HT', '4647', '', 1, 1, '2020-11-03 17:25:48', '2020-11-10 06:54:55', '2020-11-10 06:54:55'),
(3, 'afasfasf', '56Kg', 'vehicles/OKMX2oEPMH4cgbMVnVCLBaOCbC3WWWa9bZLd6RU2.jpeg', 1, 1, '2020-11-03 17:26:55', '2020-11-10 07:02:02', NULL),
(4, '1234-LOL', '31kg', 'vehicles/crgpNUftaPGcz8p8gfunwJMZ9HpbsJSFlewqqD2h.jpeg', 1, 1, '2020-11-04 02:52:06', '2020-11-10 07:03:13', NULL),
(5, 'AHGFJ-1234', '3T', 'vehicles/Tm4yuDoDLwLzdkRyntUFsXfJXAG6bTWPpDfcFkue.jpeg', 7, 2, '2020-11-24 01:23:43', '2021-01-25 05:27:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicletype`
--

INSERT INTO `vehicletype` (`id`, `nombre`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Motocicleta', '0', NULL, NULL),
(2, 'Auto Sedan', '1', NULL, NULL),
(3, 'Auto Station Wagon', '1', NULL, NULL),
(4, 'Auto Básico', '1', NULL, NULL),
(5, 'Furgon', '2', NULL, NULL),
(6, 'Camión chico', '2', NULL, NULL),
(7, 'Camión grande', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle_evaluations`
--

CREATE TABLE `vehicle_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valor` tinyint(1) NOT NULL,
  `vehicle_revision_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_requirement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicle_evaluations`
--

INSERT INTO `vehicle_evaluations` (`id`, `valor`, `vehicle_revision_id`, `vehicle_requirement_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 1, 2, NULL, NULL),
(3, 1, 1, 3, NULL, NULL),
(4, 1, 1, 4, NULL, NULL),
(5, 1, 1, 5, NULL, NULL),
(6, 1, 1, 6, NULL, NULL),
(7, 1, 1, 7, NULL, NULL),
(8, 1, 1, 8, NULL, NULL),
(9, 1, 1, 9, NULL, NULL),
(10, 1, 1, 10, NULL, NULL),
(11, 1, 1, 11, NULL, NULL),
(12, 1, 1, 12, NULL, NULL),
(13, 1, 1, 13, NULL, NULL),
(14, 1, 2, 1, NULL, NULL),
(15, 1, 2, 2, NULL, NULL),
(16, 1, 2, 3, NULL, NULL),
(17, 1, 2, 4, NULL, NULL),
(18, 1, 2, 5, NULL, NULL),
(19, 1, 2, 6, NULL, NULL),
(20, 1, 2, 7, NULL, NULL),
(21, 1, 2, 8, NULL, NULL),
(22, 1, 2, 9, NULL, NULL),
(23, 1, 2, 10, NULL, NULL),
(24, 1, 2, 11, NULL, NULL),
(25, 1, 2, 12, NULL, NULL),
(26, 1, 2, 13, NULL, NULL),
(27, 1, 3, 1, NULL, NULL),
(28, 1, 3, 2, NULL, NULL),
(29, 1, 3, 3, NULL, NULL),
(30, 1, 3, 4, NULL, NULL),
(31, 1, 3, 5, NULL, NULL),
(32, 1, 3, 6, NULL, NULL),
(33, 1, 3, 7, NULL, NULL),
(34, 1, 3, 8, NULL, NULL),
(35, 1, 3, 9, NULL, NULL),
(36, 1, 3, 10, NULL, NULL),
(37, 1, 4, 1, NULL, NULL),
(38, 1, 4, 2, NULL, NULL),
(39, 1, 4, 3, NULL, NULL),
(40, 1, 4, 4, NULL, NULL),
(41, 1, 4, 5, NULL, NULL),
(42, 1, 4, 6, NULL, NULL),
(43, 1, 4, 7, NULL, NULL),
(44, 1, 4, 8, NULL, NULL),
(45, 1, 4, 9, NULL, NULL),
(46, 1, 4, 10, NULL, NULL),
(47, 1, 4, 11, NULL, NULL),
(48, 1, 4, 12, NULL, NULL),
(49, 1, 4, 13, NULL, NULL),
(50, 1, 5, 1, NULL, NULL),
(51, 1, 5, 2, NULL, NULL),
(52, 1, 5, 3, NULL, NULL),
(53, 1, 5, 4, NULL, NULL),
(54, 1, 5, 5, NULL, NULL),
(55, 1, 5, 6, NULL, NULL),
(56, 1, 5, 7, NULL, NULL),
(57, 1, 5, 8, NULL, NULL),
(58, 1, 5, 9, NULL, NULL),
(59, 1, 5, 10, NULL, NULL),
(60, 1, 5, 11, NULL, NULL),
(61, 1, 5, 12, NULL, NULL),
(62, 1, 5, 13, NULL, NULL),
(63, 1, 6, 1, NULL, NULL),
(64, 1, 6, 2, NULL, NULL),
(65, 1, 6, 3, NULL, NULL),
(66, 1, 6, 4, NULL, NULL),
(67, 1, 6, 5, NULL, NULL),
(68, 1, 6, 6, NULL, NULL),
(69, 1, 6, 7, NULL, NULL),
(70, 1, 6, 8, NULL, NULL),
(71, 1, 6, 9, NULL, NULL),
(72, 1, 6, 10, NULL, NULL),
(73, 1, 6, 11, NULL, NULL),
(74, 1, 6, 12, NULL, NULL),
(75, 1, 6, 13, NULL, NULL),
(76, 1, 7, 1, NULL, NULL),
(77, 1, 7, 2, NULL, NULL),
(78, 1, 7, 3, NULL, NULL),
(79, 1, 7, 4, NULL, NULL),
(80, 1, 7, 5, NULL, NULL),
(81, 1, 7, 6, NULL, NULL),
(82, 1, 7, 7, NULL, NULL),
(83, 1, 7, 8, NULL, NULL),
(84, 1, 7, 9, NULL, NULL),
(85, 1, 7, 10, NULL, NULL),
(86, 1, 7, 11, NULL, NULL),
(87, 1, 7, 12, NULL, NULL),
(88, 1, 7, 13, NULL, NULL),
(89, 1, 8, 1, NULL, NULL),
(90, 1, 8, 2, NULL, NULL),
(91, 1, 8, 3, NULL, NULL),
(92, 1, 8, 4, NULL, NULL),
(93, 1, 8, 5, NULL, NULL),
(94, 1, 8, 6, NULL, NULL),
(95, 1, 8, 7, NULL, NULL),
(96, 1, 8, 8, NULL, NULL),
(97, 1, 8, 9, NULL, NULL),
(98, 1, 8, 10, NULL, NULL),
(99, 1, 8, 11, NULL, NULL),
(100, 1, 8, 12, NULL, NULL),
(101, 1, 8, 13, NULL, NULL),
(102, 1, 9, 1, NULL, NULL),
(103, 1, 9, 2, NULL, NULL),
(104, 1, 9, 3, NULL, NULL),
(105, 1, 9, 4, NULL, NULL),
(106, 1, 9, 5, NULL, NULL),
(107, 1, 9, 6, NULL, NULL),
(108, 1, 9, 7, NULL, NULL),
(109, 1, 9, 8, NULL, NULL),
(110, 1, 9, 9, NULL, NULL),
(111, 1, 9, 10, NULL, NULL),
(112, 1, 9, 11, NULL, NULL),
(113, 1, 9, 12, NULL, NULL),
(114, 1, 9, 13, NULL, NULL),
(115, 1, 10, 1, NULL, NULL),
(116, 1, 10, 2, NULL, NULL),
(117, 1, 10, 3, NULL, NULL),
(118, 1, 10, 4, NULL, NULL),
(119, 1, 10, 5, NULL, NULL),
(120, 0, 10, 6, NULL, NULL),
(121, 0, 10, 7, NULL, NULL),
(122, 0, 10, 8, NULL, NULL),
(123, 0, 10, 9, NULL, NULL),
(124, 0, 10, 10, NULL, NULL),
(125, 0, 10, 11, NULL, NULL),
(126, 0, 10, 12, NULL, NULL),
(127, 0, 10, 13, NULL, NULL),
(128, 1, 11, 1, NULL, NULL),
(129, 1, 11, 2, NULL, NULL),
(130, 1, 11, 3, NULL, NULL),
(131, 1, 11, 4, NULL, NULL),
(132, 1, 11, 5, NULL, NULL),
(133, 1, 11, 6, NULL, NULL),
(134, 1, 11, 7, NULL, NULL),
(135, 1, 11, 8, NULL, NULL),
(136, 1, 11, 9, NULL, NULL),
(137, 1, 11, 10, NULL, NULL),
(138, 1, 11, 11, NULL, NULL),
(139, 1, 11, 12, NULL, NULL),
(140, 1, 11, 13, NULL, NULL),
(141, 1, 12, 1, NULL, NULL),
(142, 1, 12, 2, NULL, NULL),
(143, 0, 12, 3, NULL, NULL),
(144, 1, 12, 4, NULL, NULL),
(145, 0, 12, 5, NULL, NULL),
(146, 0, 12, 6, NULL, NULL),
(147, 1, 12, 7, NULL, NULL),
(148, 1, 12, 8, NULL, NULL),
(149, 0, 12, 9, NULL, NULL),
(150, 0, 12, 10, NULL, NULL),
(151, 0, 12, 11, NULL, NULL),
(152, 1, 12, 12, NULL, NULL),
(153, 0, 12, 13, NULL, NULL),
(154, 1, 13, 1, NULL, NULL),
(155, 1, 13, 2, NULL, NULL),
(156, 1, 13, 3, NULL, NULL),
(157, 1, 13, 4, NULL, NULL),
(158, 1, 13, 5, NULL, NULL),
(159, 1, 13, 6, NULL, NULL),
(160, 1, 13, 7, NULL, NULL),
(161, 1, 13, 8, NULL, NULL),
(162, 1, 13, 9, NULL, NULL),
(163, 1, 13, 10, NULL, NULL),
(164, 1, 13, 11, NULL, NULL),
(165, 1, 13, 12, NULL, NULL),
(166, 1, 13, 13, NULL, NULL),
(167, 1, 14, 1, NULL, NULL),
(168, 1, 14, 2, NULL, NULL),
(169, 1, 14, 3, NULL, NULL),
(170, 1, 14, 4, NULL, NULL),
(171, 1, 14, 5, NULL, NULL),
(172, 1, 14, 6, NULL, NULL),
(173, 1, 14, 7, NULL, NULL),
(174, 1, 14, 8, NULL, NULL),
(175, 1, 14, 9, NULL, NULL),
(176, 1, 14, 10, NULL, NULL),
(177, 1, 14, 11, NULL, NULL),
(178, 1, 14, 12, NULL, NULL),
(179, 1, 14, 13, NULL, NULL),
(180, 0, 15, 1, NULL, NULL),
(181, 1, 15, 2, NULL, NULL),
(182, 0, 15, 3, NULL, NULL),
(183, 1, 15, 4, NULL, NULL),
(184, 0, 15, 5, NULL, NULL),
(185, 0, 15, 6, NULL, NULL),
(186, 0, 15, 7, NULL, NULL),
(187, 0, 15, 8, NULL, NULL),
(188, 0, 15, 9, NULL, NULL),
(189, 0, 15, 10, NULL, NULL),
(190, 0, 15, 11, NULL, NULL),
(191, 0, 15, 12, NULL, NULL),
(192, 0, 15, 13, NULL, NULL),
(193, 1, 16, 1, NULL, NULL),
(194, 1, 16, 2, NULL, NULL),
(195, 1, 16, 3, NULL, NULL),
(196, 1, 16, 4, NULL, NULL),
(197, 1, 16, 5, NULL, NULL),
(198, 1, 16, 6, NULL, NULL),
(199, 1, 16, 7, NULL, NULL),
(200, 1, 16, 8, NULL, NULL),
(201, 1, 16, 9, NULL, NULL),
(202, 1, 16, 10, NULL, NULL),
(203, 1, 16, 11, NULL, NULL),
(204, 1, 16, 12, NULL, NULL),
(205, 1, 16, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle_requirements`
--

CREATE TABLE `vehicle_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requerimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicle_requirements`
--

INSERT INTO `vehicle_requirements` (`id`, `requerimiento`, `created_at`, `updated_at`) VALUES
(1, 'Estado de carroceria', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(2, 'Estado de aseo', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(3, 'Estado de parabrisas', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(4, 'Estado de faros', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(5, 'Estado de alarma de retroceso', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(6, 'Documentacion', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(7, 'Estado de cinturones de seguridad', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(8, 'Soat', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(9, 'Estado de espejos', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(10, 'Estado de limpia parabrisas', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(11, 'Estado de neumáticos', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(12, 'Estado de frenos', '2020-11-06 05:34:08', '2020-11-06 05:34:08'),
(13, 'Estado del interior de vehículo', '2020-11-06 05:34:08', '2020-11-06 05:34:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle_revisions`
--

CREATE TABLE `vehicle_revisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `requirement_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicle_revisions`
--

INSERT INTO `vehicle_revisions` (`id`, `observacion`, `vehicle_id`, `requirement_status_id`, `created_at`, `updated_at`) VALUES
(1, 'Todo okey', 3, 1, '2020-11-15 08:30:00', '2020-11-15 08:30:00'),
(2, 'Todo okey :D', 4, 1, '2020-11-15 08:30:54', '2020-11-15 08:30:54'),
(3, 'Casi todo okey', 3, 1, '2020-11-15 08:52:54', '2020-11-15 08:52:54'),
(4, 'Prueba', 3, 1, '2020-11-20 18:26:04', '2020-11-20 18:26:04'),
(5, 'Prueba 2', 3, 1, '2020-11-20 19:52:07', '2020-11-20 19:52:07'),
(6, 'Pruebas', 3, 1, '2020-11-20 22:52:20', '2020-11-20 22:52:20'),
(7, 'Prueba 4', 4, 1, '2020-11-23 07:59:51', '2020-11-23 07:59:51'),
(8, 'TODO OK CON EL VEHICULO.', 5, 1, '2020-11-24 01:27:52', '2020-11-24 01:27:52'),
(9, 'Recién ha llevado a mantenimiento el camión y ya se encuentra activo', 5, 1, '2020-12-09 19:04:26', '2020-12-09 19:04:26'),
(10, NULL, 5, 2, '2020-12-09 19:31:03', '2020-12-09 19:31:03'),
(11, NULL, 5, 1, '2020-12-09 19:33:41', '2020-12-09 19:33:41'),
(12, 'El interior del vehículo un asco', 5, 2, '2021-01-15 22:36:43', '2021-01-15 22:36:43'),
(13, NULL, 5, 1, '2021-01-15 22:45:03', '2021-01-15 22:45:03'),
(14, NULL, 4, 1, '2021-01-25 15:25:41', '2021-01-25 15:25:41'),
(15, NULL, 5, 2, '2021-01-26 20:34:28', '2021-01-26 20:34:28'),
(16, NULL, 5, 1, '2021-01-26 20:36:07', '2021-01-26 20:36:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle_subcategory`
--

CREATE TABLE `vehicle_subcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `zona`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lima norte', NULL, NULL, NULL),
(2, 'Lima este', NULL, NULL, NULL),
(3, 'Lima moderna', NULL, NULL, NULL),
(4, 'Lima centro', NULL, NULL, NULL),
(5, 'Callao', NULL, NULL, NULL),
(6, 'Lima este B', NULL, NULL, NULL),
(7, 'Lima sur', NULL, NULL, NULL),
(8, 'Lima moderna - B', NULL, NULL, NULL),
(9, 'Playa-Sur', NULL, NULL, NULL),
(10, 'Playa Norte', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `allocation_vehicle`
--
ALTER TABLE `allocation_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auxiliars`
--
ALTER TABLE `auxiliars`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documenttype`
--
ALTER TABLE `documenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `driver_evaluations`
--
ALTER TABLE `driver_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `driver_requirements`
--
ALTER TABLE `driver_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `driver_revisions`
--
ALTER TABLE `driver_revisions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `driver_zona`
--
ALTER TABLE `driver_zona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lateralmenus`
--
ALTER TABLE `lateralmenus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requirement_status`
--
ALTER TABLE `requirement_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `revisionables`
--
ALTER TABLE `revisionables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rolesmodules`
--
ALTER TABLE `rolesmodules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `service_states`
--
ALTER TABLE `service_states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicle_evaluations`
--
ALTER TABLE `vehicle_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicle_requirements`
--
ALTER TABLE `vehicle_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicle_revisions`
--
ALTER TABLE `vehicle_revisions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicle_subcategory`
--
ALTER TABLE `vehicle_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `allocation_vehicle`
--
ALTER TABLE `allocation_vehicle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auxiliars`
--
ALTER TABLE `auxiliars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `documenttype`
--
ALTER TABLE `documenttype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `driver_evaluations`
--
ALTER TABLE `driver_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `driver_requirements`
--
ALTER TABLE `driver_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `driver_revisions`
--
ALTER TABLE `driver_revisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `driver_zona`
--
ALTER TABLE `driver_zona`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `lateralmenus`
--
ALTER TABLE `lateralmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persons`
--
ALTER TABLE `persons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `requirement_status`
--
ALTER TABLE `requirement_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `revisionables`
--
ALTER TABLE `revisionables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rolesmodules`
--
ALTER TABLE `rolesmodules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `service_states`
--
ALTER TABLE `service_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vehicle_evaluations`
--
ALTER TABLE `vehicle_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de la tabla `vehicle_requirements`
--
ALTER TABLE `vehicle_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `vehicle_revisions`
--
ALTER TABLE `vehicle_revisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vehicle_subcategory`
--
ALTER TABLE `vehicle_subcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
