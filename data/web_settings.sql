-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 11, 2022 lúc 07:32 AM
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
-- Cấu trúc bảng cho bảng `web_settings`
--

CREATE TABLE `web_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'logo: png,jpg,jpeg',
  `web_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ten website|ten doanh nghiep',
  `base_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'link website',
  `phones` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0989581167' COMMENT 'so dien thoai lien he, luu nhieu so',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'nhakhoaducnghia@gmail.com' COMMENT 'email',
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'https://facebook.com' COMMENT 'fb',
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'https://facebook.com' COMMENT 'twitter_url',
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'https://facebook.com' COMMENT 'instagram_url',
  `youtobe_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'https://facebook.com' COMMENT 'youtobe_url',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ngõ 155, đường Cầu Giấy' COMMENT 'dia chi',
  `open_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'gio mo cua',
  `close_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'gio dong cua',
  `start_date` date NOT NULL COMMENT 'ngay bat dau lam viec trong tuan',
  `end_date` date NOT NULL COMMENT 'ngay ket thuc trong tuan',
  `short_introduce` text COLLATE utf8mb4_unicode_ci DEFAULT 'Triết lý của ĐỨC NGHĨA sẽ giúp bạn khỏe mạnh, hạnh phúc vì chúng tôi hiểu vai trò quan trọng trong sức khỏe răng miệng của bạn.' COMMENT 'gioi thieu ngan',
  `introduce` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'gioi thieu chi tiet ve chung toi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `web_settings`
--

INSERT INTO `web_settings` (`id`, `logo`, `web_name`, `base_url`, `phones`, `email`, `facebook_url`, `twitter_url`, `instagram_url`, `youtobe_url`, `address`, `open_time`, `close_time`, `start_date`, `end_date`, `short_introduce`, `introduce`, `created_at`, `updated_at`) VALUES
(1, 'uploads/webSetting/webSetting_YBvr34Qo3TJTO5kL1k7KN1y8pR0VByVeNrgO4Hn2.png', 'Nha khoa Đức Nghĩa', 'nhakhoaducnghia.vn', '0989581167', 'nhakhoaducnghia@gmail.com', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://youtobe.com', 'Ngõ 155, Đường Cầu Giấy', '08h00', '18h30', '2022-10-18', '2022-10-23', '<p>Triết l&yacute; của ĐỨC NGHĨA sẽ gi&uacute;p bạn khỏe mạnh, hạnh ph&uacute;c v&igrave; ch&uacute;ng t&ocirc;i hiểu vai tr&ograve; quan trọng trong sức khỏe răng miệng của bạn.</p>', '<p>Triết l&yacute; của ĐỨC NGHĨA sẽ gi&uacute;p bạn khỏe mạnh, hạnh ph&uacute;c v&igrave; ch&uacute;ng t&ocirc;i hiểu vai tr&ograve; quan trọng trong sức khỏe răng miệng của bạn.</p>', '2022-11-19 08:41:27', '2022-12-03 10:35:22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
