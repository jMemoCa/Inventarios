-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2019 a las 10:31:04
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5
create database Inventario
use Inventario
CREATE TABLE `accions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 
INSERT INTO `accions` (`id`, `accion`, `created_at`, `updated_at`) VALUES
(1, 'categorias>consultar', NULL, NULL),
(2, 'articulos>crear', NULL, NULL),
(3, 'articulos>consultar', NULL, NULL),
(4, 'articulos>eliminar', NULL, NULL),
(5, 'articulos>editar', NULL, NULL),
(6, 'categorias>editar', NULL, NULL),
(7, 'categorias>eliminar', NULL, NULL),
(8, 'categorias>crear', NULL, NULL),
(9, 'permisos>consultar', NULL, NULL),
(10, 'permisos>crear', NULL, NULL),
(11, 'permisos>eliminar', NULL, NULL),
(12, 'roles>consultar', NULL, NULL),
(13, 'roles>editar', NULL, NULL),
(14, 'roles>crear', NULL, NULL),
(15, 'roles>eliminar', NULL, NULL),
(16, 'usuarios>cambiarPass', NULL, NULL),
(17, 'usuarios>consultar', NULL, NULL),
(18, 'permisos>crear', NULL, NULL),
(19, 'permisos>eliminar', NULL, NULL);

 

CREATE TABLE `accion_rol` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `accion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 

INSERT INTO `accion_rol` (`id`, `rol_id`, `accion_id`, `created_at`, `updated_at`) VALUES
(27, 1, 1, NULL, NULL),
(28, 1, 2, NULL, NULL),
(29, 1, 3, NULL, NULL),
(30, 1, 4, NULL, NULL),
(31, 1, 5, NULL, NULL),
(32, 1, 6, NULL, NULL),
(33, 1, 7, NULL, NULL),
(34, 1, 8, NULL, NULL),
(35, 1, 9, NULL, NULL),
(36, 2, 1, NULL, NULL),
(37, 2, 2, NULL, NULL),
(38, 2, 3, NULL, NULL),
(39, 2, 4, NULL, NULL),
(40, 2, 5, NULL, NULL),
(41, 2, 6, NULL, NULL),
(42, 2, 7, NULL, NULL),
(43, 2, 8, NULL, NULL),
(44, 3, 1, NULL, NULL),
(45, 3, 2, NULL, NULL),
(46, 3, 3, NULL, NULL),
(47, 3, 5, NULL, NULL),
(48, 3, 6, NULL, NULL),
(49, 4, 1, NULL, NULL),
(50, 4, 3, NULL, NULL),
(51, 1, 18, NULL, NULL),
(52, 1, 19, NULL, NULL);

 
CREATE TABLE `articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `articulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `categoriaId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 

INSERT INTO `articulos` (`id`, `articulo`, `descripcion`, `cantidad`, `categoriaId`, `created_at`, `updated_at`) VALUES
(1, 'Silla', 'Todos los enlatados', 1, 1, '2019-05-13 15:48:28', '2019-05-13 15:48:28'),
(2, 'Puerta', 'Puerta de madera', 1, 1, '2019-05-14 05:18:27', '2019-05-14 05:18:27');

-- --------------------------------------------------------
 

CREATE TABLE `bitacoras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `accionId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

INSERT INTO `categorias` (`id`, `categoria`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Oficina', 'Moviliario de Oficina', '2019-05-13 15:46:07', '2019-05-13 15:46:07');

 

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2019_05_13_054232_create_categorias_table', 1),
(10, '2019_05_13_054254_create_articulos_table', 1),
(11, '2019_05_13_054320_create_rols_table', 1),
(12, '2019_05_13_054336_create_modulos_table', 1),
(13, '2019_05_13_054354_create_accions_table', 1),
(14, '2019_05_13_054501_create_password_resets_table', 1),
(15, '2019_05_13_054502_create_users_table', 1),
(16, '2019_05_13_054503_create_bitacoras_table', 1),
(17, '2019_05_13_120313_create_rol_user_table', 2),
(18, '2019_05_13_131159_create_rol_accion_table', 3),
(19, '2019_05_14_031153_create_accion_rol_table', 4);

 

CREATE TABLE `modulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

CREATE TABLE `rols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

INSERT INTO `rols` (`id`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Supervisor', NULL, NULL),
(3, 'Supervisor General', NULL, NULL),
(4, 'Vendedor', NULL, NULL);

 

CREATE TABLE `rol_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

INSERT INTO `rol_user` (`id`, `rol_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL);

 

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rolId` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rolId`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan Guillermo Camarillo', 'j.guillermo.ca@gmail.com', NULL, '$2y$10$KmPQHZx.9VbnpstAzr7fQe.ba4TUb5BfqBhtmUwJ6Ty5AhuAukIw6', 1, NULL, '2019-05-13 16:04:20', '2019-05-13 16:04:20');

 
--
ALTER TABLE `accions`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `accion_rol`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articulos_categoriaid_foreign` (`categoriaId`);

 
ALTER TABLE `bitacoras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacoras_userid_foreign` (`userId`),
  ADD KEY `bitacoras_accionid_foreign` (`accionId`);
 
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

 
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `rol_user`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rolid_foreign` (`rolId`);

 
 
ALTER TABLE `accions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
 
ALTER TABLE `accion_rol`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
 
ALTER TABLE `articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

 
ALTER TABLE `bitacoras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

 
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

 
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;


ALTER TABLE `modulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `rols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `rol_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_categoriaid_foreign` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`id`);


ALTER TABLE `bitacoras`
  ADD CONSTRAINT `bitacoras_accionid_foreign` FOREIGN KEY (`accionId`) REFERENCES `accions` (`id`),
  ADD CONSTRAINT `bitacoras_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);


ALTER TABLE `users`
  ADD CONSTRAINT `users_rolid_foreign` FOREIGN KEY (`rolId`) REFERENCES `rols` (`id`);
COMMIT;
