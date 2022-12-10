-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 10, 2022 lúc 07:26 PM
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
-- Cơ sở dữ liệu: `datn_be_16_10`
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
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `is_active` tinyint(4) DEFAULT 1 COMMENT 'disable hay active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email_verified_at`, `password`, `phone`, `email_user`, `remember_token`, `created_at`, `updated_at`, `birthday`, `gender`, `cmnd`, `address`, `is_active`) VALUES
(2, 'Tesster', NULL, '$2y$10$KD5J.8BpEtDIWhXTliUWuOG425XiRVDrYksPC0AQJvz7QbYGucfTe', '0967301761', 'huehlu0708@gmail.com', NULL, '2022-10-16 00:54:22', '2022-10-16 00:54:22', '2022-10-02', 1, '111111111111', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 1),
(3, 'sdfsdf', NULL, '$2y$10$upjnDCwcAg20FHUZvjjLk.KUtLPqPBZR.ziR5Ziu/U9mClNBI2TE2', '0967301763', 'huehlu0708@gmail.com', NULL, '2022-10-16 03:46:13', '2022-10-16 03:46:13', '2022-10-28', 1, '111111111111', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 1),
(4, 'Nguyễn Thùy Thủy', NULL, '$2y$10$IiT8zzIuNlUXg..aTjJW0u9cqh3d/Q0ZDS9ZQzgQ/y5XXtS1P6Q26', '0989581167', 'hieptvh18@gmail.com', NULL, '2022-11-01 09:03:07', '2022-11-24 09:59:59', '1989-09-12', 2, '235684597', 'Hà Nội', 1),
(5, 'Hiệp Trần', NULL, '$2y$10$RyUqOiexRwWnrAyqh2T.VORh/xsGwosZwIOAF/pyiHlj3Gz4ZGgEu', '0989581188', NULL, NULL, '2022-11-19 08:25:51', '2022-11-19 08:25:51', '1970-01-01', 1, NULL, NULL, 1),
(6, 'hiep adasd', NULL, '$2y$10$I56GrmQS0aPvQ1PhOw83OONPnrWCQQj/XckK8OGqZ89Cgr.Wk9vfy', '0967301766', 'hieptvh18@gmail.com', NULL, '2022-11-19 08:31:10', '2022-11-19 08:31:10', '2022-11-11', 1, '111111111111', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 1),
(7, 'Nguyễn Thùy Trinh', NULL, '$2y$10$dCzzZOGsAnudwoBqXTF4heSYEZVD1EZapdFn8ZlMVEYzxkteMsGpy', '0989581168', 'huehlu0708@gmail.com', NULL, '2022-11-19 08:53:09', '2022-11-19 08:53:09', '1999-09-12', 1, '235684597', 'Hà Nội', 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
