-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 11, 2022 lúc 06:23 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn_be3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `birthday` date DEFAULT NULL COMMENT 'sinh nhat customer',
  `gender` tinyint(4) DEFAULT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1 COMMENT 'disable hay active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email_verified_at`, `password`, `phone`, `email_user`, `remember_token`, `created_at`, `updated_at`, `birthday`, `gender`, `cmnd`, `is_active`) VALUES
(5, 'hazii', NULL, '$2y$10$ovCM6o4LDMsos5Uqhhg4p.3UjxtpAL47zc947Oz5CYki2RZOqTsb6', '0989581166', 'hipbu18@gmail.com', NULL, '2022-10-15 09:18:24', '2022-10-15 09:18:24', NULL, NULL, NULL, 1),
(6, 'Hehehe', NULL, '$2y$10$9WopM441.oOK436vd7Rh2.ZZmOiEENGMWojgDsc.aPqJRwYApPaIq', '0967301765', 'hieptvh@ecommage.com', NULL, '2022-10-15 10:13:11', '2022-10-15 10:13:11', NULL, NULL, NULL, 1),
(7, 'hehhee', NULL, '$2y$10$72p3LrtEYNA6J.yiRwAjdehQHRIFXREFjV3oLHG4suxsnyRHB5yem', '0967301767', 'hieptvh@ecommage.com', NULL, '2022-10-15 10:14:22', '2022-10-15 10:14:22', NULL, NULL, NULL, 1),
(8, 'asdasdsa', NULL, '$2y$10$ocxjaV62xNsiXddAkM1Bs.Nec/63ngQUEcsfJHLtkYv.OMSsB/tG6', '0967301761', 'huehlu0708@gmail.com', NULL, '2022-10-15 10:28:22', '2022-10-15 10:28:22', NULL, NULL, NULL, 1),
(9, 'ádasdasdasd', NULL, '$2y$10$rpV6q8YTQpD7ad2vx5chYuWZ2tPBZwIrbj5UTY/.rI7KLaLnCSFNW', '0967501761', 'hipbu18@gmail.com', NULL, '2022-10-15 10:29:02', '2022-10-15 10:29:02', NULL, NULL, NULL, 1),
(10, 'asdasd', NULL, '$2y$10$LaKIndH/TCKZNB2qd9OK4ennGlpQLgrcQL5zK/cJYlAlS/anFmMLS', '0967301762', 'hieptvhph14543@fpt.edu.vn', NULL, '2022-10-15 10:38:49', '2022-10-15 10:38:49', '2022-10-20', 1, '111111111111', 1),
(11, 'ádasd', NULL, '$2y$10$Xljv8C2xeAODfRNLKNjbLe.wBVHa97CcQ3PGwuOGAZ.I0RMx6iaDy', '0967321761', 'hieptvhph14543@fpt.edu.vn', NULL, '2022-10-15 10:46:07', '2022-10-15 10:46:07', '2022-10-19', 1, '111111111111', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
