-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 10, 2022 lúc 07:40 PM
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
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'link fb ca nhan',
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'link twitter ca nhan',
  `email_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'link email ca nhan',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 is active, 0 is not active',
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `specialist_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Bác sĩ thuộc phòng ban',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `email`, `fullname`, `birthday`, `phone`, `address`, `facebook_url`, `twitter_url`, `email_url`, `password`, `is_active`, `room_id`, `level_id`, `specialist_id`, `created_at`, `updated_at`, `avatar`, `description`) VALUES
(1, 'admin@gmail.com', 'Admin', NULL, '0246879135', '', '', '', '', '$2y$10$3R9tLKxwchDFzDbNnKtpmO8WRkgdmZj0AhRd2XhIkGCT49LscNsKO', 1, 1, 1, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', '', NULL),
(2, 'hieptvh18@gmail.com', 'Tran Bac Si', '2003-01-01', '0967301761', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 'asda', 'asd', NULL, '$2y$10$l28EkX2StVJRwYt9jOlhCuGuP2hLz6cFbnc8vrw9KoJKqM.nhJr7u', 1, 6, 5, 2, '2022-10-15 02:44:06', '2022-10-15 02:44:06', 'uploads/admin/admin_e5PP9Tcd0xt9nge5ghJYngf1tTYsdsmRPbR3CFvE.png', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `equipments`
--

CREATE TABLE `equipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `equipment_galleries`
--

CREATE TABLE `equipment_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ten khach feedback',
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'avatar fake',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Có được phép hiển thị phía fe hay không',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chức vụ bác sĩ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`, `description`) VALUES
(1, 'Reginald McLaughlin', '2022-10-13 10:08:18', '2022-10-13 10:08:18', 'Non aut omnis quia adipisci omnis doloremque iste. Commodi quidem consequuntur dicta ducimus numquam id ut assumenda. Qui quis eius sapiente non repudiandae deleniti sint.'),
(2, 'Mr. Vicente Bogisich', '2022-10-13 10:08:18', '2022-10-13 10:08:18', 'Provident animi ut rem atque illo. Expedita quis sit quia rerum quia tempora. Aperiam minus et est incidunt odit omnis. Ut modi et earum voluptatem.'),
(3, 'Sanford Schamberger III', '2022-10-13 10:08:18', '2022-10-13 10:08:18', 'Soluta aperiam impedit et tempore voluptatum. Possimus veniam quis et magni doloribus. Voluptas voluptas fugiat ut qui nam. Omnis quas pariatur fugiat nostrum maiores eligendi voluptas.'),
(4, 'Miss Millie Kiehn DDS', '2022-10-13 10:08:18', '2022-10-13 10:08:18', 'Et dolorem officiis natus praesentium doloribus quae. Est doloremque nihil repellat quia aut id vel. Dolorem aspernatur qui sint laboriosam ut natus dolorem.'),
(5, 'Desiree O\'Hara DVM', '2022-10-13 10:08:18', '2022-10-13 10:08:18', 'Et perspiciatis rerum voluptatem et ut consequatur. Aut aut quia libero quae sit ratione ad. Quos cupiditate assumenda non et sit fugit repellendus.'),
(6, 'Meghan Dooley', '2022-10-13 10:08:18', '2022-10-13 10:08:18', 'Aliquid quis repellat quia harum est. Omnis ducimus est ut maiores cumque. Repudiandae sed et numquam quis quod. Quo reiciendis autem corporis. Quae consequatur aut velit.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_08_05_144337_create_specialists_table', 1),
(4, '2022_08_23_120001_create_rooms_table', 1),
(5, '2022_08_23_129999_create_levels_table', 1),
(6, '2022_08_23_130000_create_permissions_table', 1),
(7, '2022_08_23_130702_create_roles_table', 1),
(8, '2022_08_23_130703_create_permission_roles_table', 1),
(9, '2022_08_23_130706_create_admins_table', 1),
(10, '2022_08_23_130707_create_role_admins_table', 1),
(11, '2022_09_08_142131_create_services_table', 1),
(12, '2022_09_08_151428_create_specialist_gallery_table', 1),
(13, '2022_09_12_160625_create_schedules_table', 1),
(14, '2022_09_14_103326_create_equipments_table', 1),
(15, '2022_09_15_154703_create_patients_table', 1),
(16, '2022_09_15_155034_create_equipment_galleries_table', 1),
(17, '2022_09_17_174416_update_to_admins_table', 1),
(18, '2022_09_20_100751_add_attribute_status_into_levels_table', 1),
(19, '2022_09_20_150307_add_details_to_services_table', 1),
(20, '2022_09_29_153147_create_product_types_table', 1),
(21, '2022_09_29_153151_create_products_table', 1),
(22, '2022_09_29_153154_create_orders_table', 1),
(23, '2022_09_30_042603_create_users_table', 1),
(24, '2022_09_30_152554_creat_patient_services_table', 1),
(25, '2022_10_04_033311_update_to_schedules_table', 1),
(26, '2022_10_04_042426_create_schedule_services_table', 1),
(27, '2022_10_04_125232_create_patient_products_table', 1),
(28, '2022_10_04_181111_create_patient_doctors_table', 1),
(29, '2022_10_07_161129_add_count_to_schedules_table', 1),
(30, '2022_10_11_033754_update_to_orders_table', 1),
(31, '2022_10_12_094951_update_to_users_table', 1),
(32, '2022_10_13_155740_create_news_categories_table', 1),
(33, '2022_10_13_155751_create_news_table', 1),
(34, '2022_10_13_155802_create_news_images_table', 1),
(35, '2022_10_13_163202_create_web_settings_table', 1),
(36, '2022_10_12_153415_add_attribute_description_into_levels_table', 2),
(37, '2022_10_15_110924_update_to_orders_table', 3),
(38, '2022_10_15_111759_update_to_patients_table', 3),
(40, '2022_10_15_150613_update_to_users_table', 4),
(41, '2022_10_15_170228_update_to_schedules_table', 5),
(42, '2022_10_19_155408_create_feedbacks_table', 6),
(43, '2022_10_19_162918_create_notices_table', 6),
(44, '2022_10_25_141317_add_details_to_service_table', 6),
(45, '2022_11_01_153544_add_token_to_patients_table', 6),
(46, '2022_11_13_151710_add_detail_to_schedule_table', 6),
(47, '2022_11_19_105118_update_to_notices_table', 6),
(48, '2022_11_19_105119_create_notice_admins_table', 6),
(49, '2022_11_30_033358_change_to_schedules_table', 6),
(50, '2022_11_30_034615_change_to_patients_table', 6),
(51, '2022_12_06_020345_drop_column_cmnd_to_schedules_table', 6),
(52, '2022_12_06_020518_drop_column_cmnd_to_patients_table', 6),
(53, '2022_12_09_013615_update_to_admins_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tieu de bai post',
  `news_category` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'ID danh muc bai post',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'noi dung chi tiet bai post',
  `author_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'ID tac gia',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'the tag gan kem bai post, luu nhieu tag cung luc dang string cach nhau dau ","',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `news_category`, `content`, `author_id`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'Đại dịch Covid 20 bùng phát', 1, 'Đại dịch lại bùng phát aaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaa\r\naaaaaaaâaaaaaaaaaaaaa', 1, 'covid', '2022-10-15 02:13:54', '2022-10-15 02:13:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'image category',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'description category',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_categories`
--

INSERT INTO `news_categories` (`id`, `category_name`, `category_image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Thế giới', 'uploads/newCategories/newCategory_BBYUO7vYo56J6og8fMJsfF2eQ1rnwTiONWpeZBDJ.png', 'Đây là tin tức thế giới', '2022-10-15 02:10:50', '2022-10-15 02:10:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_images`
--

CREATE TABLE `news_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID bai post',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_images`
--

INSERT INTO `news_images` (`id`, `news_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/newsImages/newsImage_I6XTYpskSrd0vpjRUyIdmfpTZ0MP3vzhgW31o6wQ.png', '2022-10-15 02:13:54', '2022-10-15 02:13:54'),
(2, 1, 'uploads/newsImages/newsImage_HksCPQZW0XGuGiO9EMZvn2C6MAF0ZJ08I9purivB.png', '2022-10-15 02:13:54', '2022-10-15 02:13:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notice_admins`
--

CREATE TABLE `notice_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `notice_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ten khach hang',
  `customer_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_bill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_phone`, `payment_method`, `description`, `product_id`, `service_id`, `code_bill`, `total`, `created_at`, `updated_at`, `date`, `patient_id`) VALUES
(1, 'Hiep', '0967301761', 'tiền mặt', '<p>gdfgdfgdfg</p>\r\n\r\n<p>dfgdf</p>\r\n\r\n<p>dfgdfgd</p>', '3|5|6', '1', '150561500110', 70544118, '2022-10-15 02:45:59', '2022-10-15 02:45:59', '2022-10-15', NULL),
(2, 'Hiep', '0967301761', 'chuyển khoản', '<p>adasdasd</p>\r\n\r\n<p>asdasd</p>\r\n\r\n<p>asdasd</p>', '3|5|6', '1', '996531373000', 70544118, '2022-10-15 03:56:16', '2022-10-15 03:56:16', '2022-10-15', NULL),
(3, 'Tran hoang hiep', '0967301763', 'tiền mặt', '<p>&acirc;aaaaaaaa</p>', '6', '5', '110027090659', 28315827, '2022-10-15 04:01:43', '2022-10-15 04:01:43', '2022-10-15', NULL),
(4, 'Hiep', '0967301761', 'tiền mặt', '<p>&aacute;đ&aacute;adasd</p>', '3|5|6', '1', '390763876187', 70544118, '2022-10-15 09:44:52', '2022-10-15 09:44:52', '2022-10-15', 1),
(5, 'hehhee', '0967301767', 'chuyển khoản', '<p>asdsd&aacute;dasdsad</p>', '5', '4', '848741431792', 44622093, '2022-10-15 10:20:10', '2022-10-15 10:20:10', '2022-10-15', 3),
(6, 'ádasdasdasd', '0967501761', 'tiền mặt', '<p>&aacute;dasd</p>', '4', '3|5', '123273364229', 24677900, '2022-10-15 10:30:04', '2022-10-15 10:30:04', '2022-10-15', 4),
(7, 'asdasd', '0967301762', 'tiền mặt', '<p>adasds</p>', '6', '3|5', '718524708611', 44205531, '2022-10-15 10:40:16', '2022-10-15 10:40:16', '2022-10-15', 5),
(8, 'ádasd', '0967321761', 'tiền mặt', '<p>&aacute;dasd&aacute;d</p>', '2', '3', '539820391868', 36005220, '2022-10-15 10:46:38', '2022-10-15 10:46:38', '2022-10-15', 6),
(9, 'ádasd', '0967321761', 'tiền mặt', '<p>&aacute;dasd&aacute;d</p>', '2', '3', '304696852673', 36005220, '2022-10-15 10:47:20', '2022-10-15 10:47:20', '2022-10-15', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả chi tiết bệnh tình',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `token_url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patients`
--

INSERT INTO `patients` (`id`, `customer_name`, `phone`, `birthday`, `description`, `address`, `schedule_id`, `status`, `date`, `created_at`, `updated_at`, `order_id`, `token_url`) VALUES
(1, 'Hiep', '0967301761', '2022-10-03', 'áđáadasd', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 1, 3, '2022-10-20', '2022-10-15 02:44:40', '2022-10-15 09:44:52', 4, ''),
(2, 'Tran hoang hiep', '0967301763', '2022-09-25', 'sdfsdfsdf', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 2, 0, '2022-10-19', '2022-10-15 03:58:28', '2022-10-15 03:58:28', NULL, ''),
(3, 'hehhee', '0967301767', '2022-09-27', 'asdsdádasdsad', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 7, 3, '2022-10-28', '2022-10-15 10:19:58', '2022-10-15 10:20:10', 5, ''),
(4, 'ádasdasdasd', '0967501761', '2022-10-19', 'ádasd', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 9, 3, '2022-10-26', '2022-10-15 10:29:52', '2022-10-15 10:30:04', 6, ''),
(5, 'asdasd', '0967301762', '2022-10-20', 'adasds', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 13, 3, '2022-10-28', '2022-10-15 10:40:09', '2022-10-15 10:40:16', 7, ''),
(6, 'ádasd', '0967321761', '2022-10-19', 'ádasdád', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 14, 3, '2022-10-20', '2022-10-15 10:46:31', '2022-10-15 10:47:26', 9, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patient_doctors`
--

CREATE TABLE `patient_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patient_doctors`
--

INSERT INTO `patient_doctors` (`id`, `patient_id`, `doctor_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patient_products`
--

CREATE TABLE `patient_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patient_products`
--

INSERT INTO `patient_products` (`id`, `patient_id`, `product_id`) VALUES
(1, 1, 3),
(2, 1, 5),
(3, 1, 6),
(4, 2, 6),
(5, 3, 5),
(6, 4, 4),
(7, 5, 6),
(8, 6, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patient_services`
--

CREATE TABLE `patient_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patient_services`
--

INSERT INTO `patient_services` (`id`, `patient_id`, `service_id`) VALUES
(1, '1', '1'),
(2, '2', '5'),
(3, '3', '4'),
(4, '4', '3'),
(5, '4', '5'),
(6, '5', '3'),
(7, '5', '5'),
(8, '6', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên quyền',
  `permission_key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `permission_key_code`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Roles', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(2, 'List Roles', 'List_Roles', '1', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(3, 'Add Roles', 'Add_Roles', '1', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(4, 'Edit Roles', 'Edit_Roles', '1', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(5, 'Delete Roles', 'Delete_Roles', '1', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(6, 'Rooms', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(7, 'List Rooms', 'List_Rooms', '6', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(8, 'Add Rooms', 'Add_Rooms', '6', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(9, 'Edit Rooms', 'Edit_Rooms', '6', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(10, 'Delete Rooms', 'Delete_Rooms', '6', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(11, 'Permissions', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(12, 'List Permissions', 'List_Permissions', '11', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(13, 'Add Permissions', 'Add_Permissions', '11', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(14, 'Edit Permissions', 'Edit_Permissions', '11', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(15, 'Delete Permissions', 'Delete_Permissions', '11', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(16, 'Admins', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(17, 'List Admins', 'List_Admins', '16', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(18, 'Add Admins', 'Add_Admins', '16', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(19, 'Edit Admins', 'Edit_Admins', '16', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(20, 'Delete Admins', 'Delete_Admins', '16', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(21, 'Patients', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(22, 'List Patients', 'List_Patients', '21', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(23, 'Add Patients', 'Add_Patients', '21', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(24, 'Edit Patients', 'Edit_Patients', '21', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(25, 'Delete Patients', 'Delete_Patients', '21', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(26, 'Levels', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(27, 'List Levels', 'List_Levels', '26', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(28, 'Add Levels', 'Add_Levels', '26', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(29, 'Edit Levels', 'Edit_Levels', '26', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(30, 'Delete Levels', 'Delete_Levels', '26', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(31, 'Services', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(32, 'List Services', 'List_Services', '31', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(33, 'Add Services', 'Add_Services', '31', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(34, 'Edit Services', 'Edit_Services', '31', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(35, 'Delete Services', 'Delete_Services', '31', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(36, 'Equipments', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(37, 'List Equipments', 'List_Equipments', '36', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(38, 'Add Equipments', 'Add_Equipments', '36', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(39, 'Edit Equipments', 'Edit_Equipments', '36', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(40, 'Delete Equipments', 'Delete_Equipments', '36', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(41, 'Products', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(42, 'List Products', 'List_Products', '41', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(43, 'Add Products', 'Add_Products', '41', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(44, 'Edit Products', 'Edit_Products', '41', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(45, 'Delete Products', 'Delete_Products', '41', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(46, 'Orders', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(47, 'List Orders', 'List_Orders', '46', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(48, 'Add Orders', 'Add_Orders', '46', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(49, 'Edit Orders', 'Edit_Orders', '46', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(50, 'Delete Orders', 'Delete_Orders', '46', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(51, 'Schedules', '', '0', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(52, 'List Schedules', 'List_Schedules', '51', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(53, 'Add Schedules', 'Add_Schedules', '51', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(54, 'Edit Schedules', 'Edit_Schedules', '51', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(55, 'Delete Schedules', 'Delete_Schedules', '51', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(56, 'Web_settings', '', '0', '2022-10-15 01:14:03', '2022-10-15 01:14:03'),
(57, 'List Web_settings', 'List_Web_settings', '56', '2022-10-15 01:14:03', '2022-10-15 01:14:03'),
(58, 'Add Web_settings', 'Add_Web_settings', '56', '2022-10-15 01:14:03', '2022-10-15 01:14:03'),
(59, 'Edit Web_settings', 'Edit_Web_settings', '56', '2022-10-15 01:14:03', '2022-10-15 01:14:03'),
(60, 'Delete Web_settings', 'Delete_Web_settings', '56', '2022-10-15 01:14:03', '2022-10-15 01:14:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_roles`
--

CREATE TABLE `permission_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_roles`
--

INSERT INTO `permission_roles` (`id`, `permission_id`, `role_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 2, 3),
(7, 3, 3),
(8, 4, 3),
(9, 5, 3),
(10, 7, 3),
(11, 8, 3),
(12, 9, 3),
(13, 10, 3),
(14, 12, 3),
(15, 13, 3),
(16, 14, 3),
(17, 15, 3),
(18, 17, 3),
(19, 18, 3),
(20, 19, 3),
(21, 20, 3),
(22, 22, 3),
(23, 23, 3),
(24, 24, 3),
(25, 25, 3),
(26, 27, 3),
(27, 28, 3),
(28, 29, 3),
(29, 30, 3),
(30, 32, 3),
(31, 33, 3),
(32, 34, 3),
(33, 35, 3),
(34, 37, 3),
(35, 38, 3),
(36, 39, 3),
(37, 40, 3),
(38, 42, 3),
(39, 43, 3),
(40, 44, 3),
(41, 45, 3),
(42, 47, 3),
(43, 48, 3),
(44, 49, 3),
(45, 50, 3),
(46, 52, 3),
(47, 53, 3),
(48, 54, 3),
(49, 55, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên thuốc, sản phẩm chức năng...',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `type_id`, `name`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'Hank Schimmel', '4977194', 'https://via.placeholder.com/640x480.png/00bb77?text=reprehenderit', 'Unde ab sed et repellat est rerum officia. Culpa repellat voluptatem dolores molestias nulla. Ut dolorem aut repellat laboriosam repudiandae accusantium. Quo enim iste et consectetur eos non.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(2, 3, 'Otis Torp', '20115516', 'https://via.placeholder.com/640x480.png/008822?text=quia', 'Repudiandae id omnis unde ea. Accusantium cum impedit mollitia. Porro animi eligendi eligendi repellat. Tempore soluta reiciendis sit quam et.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(3, 4, 'Rafaela Rodriguez', '23711437', 'https://via.placeholder.com/640x480.png/0077bb?text=iusto', 'Neque et quisquam animi ea facere. Eveniet non accusantium sapiente vitae rem reprehenderit. Amet quia animi sint consequuntur voluptas nihil.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(4, 8, 'Evert Hill', '1663252', 'https://via.placeholder.com/640x480.png/00cc77?text=explicabo', 'Omnis minus omnis molestiae. Necessitatibus iusto omnis quaerat accusamus vitae impedit. Quidem recusandae saepe vel ut nisi odit. Itaque nesciunt placeat voluptas aut rem vitae.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(5, 9, 'Dr. Maximo Runolfsdottir', '10076536', 'https://via.placeholder.com/640x480.png/005522?text=quas', 'Quisquam quo rerum sapiente aut exercitationem reprehenderit. Odit modi nobis fuga vitae et. Ab veritatis libero voluptate. Ut sit et aut.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(6, 4, 'Parker Mitchell', '21190883', 'https://via.placeholder.com/640x480.png/009977?text=sunt', 'Animi aut consequatur tempora et omnis maiores. In quibusdam aut non maiores. Et harum expedita asperiores vero deleniti. Culpa vero dolorem facere quae fugit.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(7, 3, 'Tia Mills', '29084381', 'https://via.placeholder.com/640x480.png/0055dd?text=est', 'Ipsum perspiciatis voluptates consequatur dolore facilis debitis. Vel est nisi incidunt tenetur dicta totam. Aliquid neque eos vitae non natus.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(8, 2, 'Jace Bartell', '14123722', 'https://via.placeholder.com/640x480.png/004444?text=impedit', 'Velit ea non quis ipsam expedita. Nihil quasi esse unde assumenda. Deleniti sed debitis nisi ducimus eos quasi aspernatur. Ea veniam aut qui eius temporibus omnis et.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(9, 2, 'Hailie Bernhard', '27971467', 'https://via.placeholder.com/640x480.png/00ff22?text=officia', 'Voluptas eaque dicta fuga quo placeat facilis et. Repudiandae eos aut possimus ea. Aut recusandae sit eos debitis. Quia est quibusdam fuga quo.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(10, 10, 'Neva Predovic', '9713306', 'https://via.placeholder.com/640x480.png/00aa00?text=optio', 'Aperiam culpa totam illo molestiae occaecati. Excepturi eligendi saepe praesentium dolorem quis. Nisi repudiandae ut doloribus similique veniam. Voluptatem error laudantium delectus consequatur.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(11, 5, 'Mr. Austen Hickle', '27642303', 'https://via.placeholder.com/640x480.png/008855?text=iusto', 'Iure qui consequuntur nam dolor. Est quas aut eligendi eligendi sapiente. Necessitatibus quibusdam omnis vel.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(12, 7, 'Rhoda Kertzmann', '10229896', 'https://via.placeholder.com/640x480.png/000055?text=molestiae', 'Et illum hic voluptatem et. Enim et qui odit sint. Et fugiat molestiae magnam assumenda sint. Ea minus dicta voluptatem id tempore.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(13, 7, 'Aubree Swaniawski', '20490931', 'https://via.placeholder.com/640x480.png/001166?text=et', 'Iusto et explicabo aspernatur blanditiis beatae eum. Harum sint ipsam nostrum. Totam quia quia blanditiis impedit.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(14, 10, 'Miss Agustina Legros', '1416111', 'https://via.placeholder.com/640x480.png/008822?text=autem', 'Suscipit esse distinctio natus temporibus dolores sed animi est. Doloribus nesciunt magni recusandae. Voluptates autem architecto omnis asperiores rerum.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(15, 7, 'Anabelle Hauck', '21096149', 'https://via.placeholder.com/640x480.png/00dd66?text=non', 'Fuga dolore ea sunt nemo. Hic minima dolorem esse fuga nesciunt et quidem. Molestias sit officiis beatae quidem.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(16, 10, 'Dr. Sidney Rodriguez II', '25501405', 'https://via.placeholder.com/640x480.png/00ee77?text=et', 'Doloremque rerum sed quia labore. Corrupti sint est praesentium aut ut quod. Pariatur consequatur voluptatem sit sapiente est totam.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(17, 2, 'Marilyne Franecki Jr.', '26450843', 'https://via.placeholder.com/640x480.png/00bbff?text=debitis', 'Culpa voluptate recusandae sint voluptatem accusamus aut quia. Culpa vel sit fuga. Id esse quidem optio et est.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(18, 9, 'Mr. Dallin Harris', '9643310', 'https://via.placeholder.com/640x480.png/00ee88?text=praesentium', 'Dolor recusandae quas eum quidem necessitatibus ut illum. Explicabo sed rem nihil et. Eligendi accusamus ut modi.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(19, 10, 'Miss Scarlett Dickinson', '15375544', 'https://via.placeholder.com/640x480.png/003333?text=excepturi', 'Eos qui impedit ex facere repudiandae eum excepturi molestiae. Optio tempore ad nisi. Vel veniam quos ut eos nihil ut. Illum ut laudantium eum voluptas a iure.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(20, 2, 'Shana Kovacek III', '19921922', 'https://via.placeholder.com/640x480.png/00ff11?text=cumque', 'Qui suscipit corrupti explicabo. Qui sunt nesciunt in eius nobis. Voluptatem saepe beatae placeat aut quasi iste ex sapiente.', '2022-10-13 10:08:18', '2022-10-13 10:08:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Julie Hayes', 'https://via.placeholder.com/640x480.png/006600?text=provident', 'Earum debitis voluptatibus sint et et itaque. Itaque ut perspiciatis molestiae consequatur nesciunt illo. Possimus optio ut aut cupiditate assumenda. Mollitia in voluptatem quidem a.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(2, 'Tanya Mueller', 'https://via.placeholder.com/640x480.png/00bb88?text=sint', 'Id ut cupiditate voluptate officia. Corporis quibusdam repudiandae nobis. Libero est autem aperiam est incidunt expedita. Numquam laborum consectetur accusantium omnis numquam. Ab nobis quo iure.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(3, 'Jodie Kessler', 'https://via.placeholder.com/640x480.png/00aa00?text=ullam', 'Quas dolor ab quos ab rerum. Vel vel aut non facere aut amet. Molestiae necessitatibus non quis odio sunt. Sed ab placeat rerum doloribus libero sunt nemo iusto.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(4, 'Skylar King', 'https://via.placeholder.com/640x480.png/00ccff?text=eligendi', 'Rerum vel assumenda perferendis aperiam totam. Dolor aliquid aut ut rem dolor dolores. Exercitationem omnis tempora ut ab autem et ab.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(5, 'Clementine Lindgren', 'https://via.placeholder.com/640x480.png/0066aa?text=quo', 'Id quod earum velit repellendus eaque ipsum officia. Delectus impedit quis expedita. Qui cumque sint ut deleniti eos error hic.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(6, 'Maurice Hessel', 'https://via.placeholder.com/640x480.png/009944?text=rerum', 'Voluptatibus qui nemo reprehenderit aperiam occaecati saepe tempora. Ipsam mollitia ipsam dicta laboriosam sunt dolores.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(7, 'Merl Cormier', 'https://via.placeholder.com/640x480.png/00bb44?text=officia', 'Quis ut aut saepe quis voluptas temporibus est quod. Ad deleniti exercitationem voluptas quas. Blanditiis enim accusamus qui qui atque. Dolore veritatis velit dolor voluptas distinctio incidunt eum.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(8, 'Camila Pfeffer', 'https://via.placeholder.com/640x480.png/009900?text=sit', 'Et occaecati enim officiis et veniam omnis at est. Dolorum cum corrupti modi est aut optio rerum. Quia impedit non qui repudiandae in sed architecto ut.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(9, 'Jerrell Howe I', 'https://via.placeholder.com/640x480.png/000000?text=consequatur', 'Quis quos cupiditate blanditiis labore a. Sunt temporibus id provident ex nesciunt rerum est. Repellendus in quaerat consequatur error assumenda eaque corrupti.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(10, 'Garland Kub V', 'https://via.placeholder.com/640x480.png/005500?text=non', 'Nulla sit est consequatur eius placeat iusto. Mollitia rerum quae ut numquam laboriosam officia. Quas modi qui ad eligendi possimus tempora quis rerum.', '2022-10-13 10:08:18', '2022-10-13 10:08:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên vai trò',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Guest', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(2, 'Manager', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(3, 'Admin', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(4, 'Doctor', '2022-10-13 10:08:18', '2022-10-13 10:08:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_admins`
--

CREATE TABLE `role_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_admins`
--

INSERT INTO `role_admins` (`id`, `admin_id`, `role_id`) VALUES
(1, 1, 3),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên phòng ban',
  `history` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Lịch sử phát triển',
  `mission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'nhiệm vụ, vai trò',
  `achievement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thành tựu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `history`, `mission`, `achievement`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Scot Schiller DDS', 'Consequuntur excepturi quas aut quia illum id. Illo qui esse animi. Ipsum natus corporis soluta adipisci.', 'Autem possimus est iure ut voluptatem veritatis. Maxime est velit reiciendis quia.', 'Doloremque sit occaecati culpa adipisci. Vitae pariatur aperiam impedit quod. Officia quos qui quis aut. Quia odio dicta maxime neque tempore cum aliquam suscipit.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(2, 'Electa Dietrich', 'Tempora est quidem laudantium et corporis temporibus quasi. Velit id repellat omnis nesciunt. Sed rerum hic ut excepturi dolores modi.', 'Odio qui eum repellendus autem dolor ratione repudiandae. Laborum optio dolorem nesciunt qui. Et dolores aspernatur commodi omnis. Alias accusantium quo occaecati voluptas dicta et.', 'Nostrum est occaecati fuga aliquid et assumenda sunt suscipit. Deleniti quam corporis ut omnis rerum maxime. Sint minus aut ipsam tenetur qui. Eos ab doloremque facere aut aut.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(3, 'Ms. Ivy Kozey', 'Odio quo accusamus aut beatae enim quo exercitationem. Ex et nobis quam non. Porro placeat id corporis.', 'Inventore aliquam itaque nihil eum. Inventore iure reiciendis facere quia alias quia voluptates. Quidem hic voluptas quo autem. Qui et nemo est voluptatibus quia ut dolorum provident.', 'Ea fugit et aut. Itaque cum sit hic eaque. Provident et qui rerum sed id. Quisquam nulla veniam ab harum maiores at.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(4, 'Amir Gaylord', 'Modi cum in non quia. Sed ut sequi laborum distinctio suscipit veritatis. Dicta libero totam modi deserunt sed deleniti. Distinctio tempore a consequatur maiores maxime dolores.', 'Sint at vero quasi et ut. Dolor sunt sed autem qui. Aut autem maxime error itaque. Ducimus est non omnis a quia cupiditate. Ut vel pariatur nobis et. Eos modi sed est fugiat ut.', 'Unde aut sit itaque est qui. Quis non impedit consequatur dolorem incidunt dicta. Neque modi qui et et similique. Cupiditate asperiores doloremque deleniti alias id occaecati nihil aut.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(5, 'Kacie Bayer', 'Voluptatem ea et quas porro atque ut consequatur veniam. Consequatur enim eos recusandae possimus et beatae iusto. Est vero molestiae qui cumque odio qui sed.', 'Beatae enim vel reprehenderit. Libero dolores asperiores officiis magni repellat. Beatae et molestiae et quod. Reiciendis est sed laudantium. Sit quibusdam animi sunt.', 'Id reiciendis nisi incidunt nisi. Qui odio minima alias rerum totam nulla. Ut cum saepe repellat sed magnam. Reprehenderit eveniet tempora provident assumenda.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(6, 'Amiya Murray', 'Consectetur aliquam nesciunt dolor occaecati. Qui non quia officiis impedit qui iure repudiandae. Dolores aut sit saepe sed. Eligendi quasi culpa reiciendis provident unde consequatur.', 'Eum saepe quo reprehenderit exercitationem delectus neque. Illum facere veritatis hic deleniti. Dolores omnis maiores illo corporis.', 'Itaque quos vitae assumenda similique distinctio provident porro. Fugit aliquid et aut.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(7, 'Emmitt Bruen', 'Saepe est et voluptatem ut consequatur sunt. Et eum ut sed quia impedit qui molestias ut. Veniam repellendus enim et maxime deserunt doloremque consequatur. Molestiae dolores quis et beatae.', 'Accusantium iste vel nemo dolorum vitae est. Expedita neque rerum voluptate et eum voluptatem et. Tempora quia omnis laborum quam sit. Voluptatum nam maxime eligendi molestias.', 'Veniam id culpa ea facere error dolor voluptatem. Est placeat laboriosam quia quos ab ea. Fuga quis dolore earum aut necessitatibus et vitae. Ipsa id possimus voluptatem.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(8, 'Rodolfo Hauck', 'Omnis ad necessitatibus aut aperiam enim quibusdam qui. Mollitia itaque ipsa necessitatibus. Modi ut quo minima occaecati illo sint quos. Omnis nam cumque consequuntur rem et voluptates.', 'Et autem laudantium cum omnis corrupti vel deserunt. Quaerat cumque est quasi aut. Doloremque ut recusandae id itaque iste fuga est. Et qui doloremque repellat impedit.', 'Dolor adipisci aut totam est natus qui. Dolores quasi dolorem cupiditate delectus est omnis. Voluptas numquam saepe ad nam. Nihil tenetur esse aut veritatis odit.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(9, 'Bobby Tremblay', 'Dolorem voluptates dignissimos eos omnis ratione. Repudiandae deleniti cum non nihil et et provident. Tempore natus qui similique non.', 'Iste et mollitia consequatur suscipit distinctio nostrum ratione. Sequi eius assumenda veritatis aut. Omnis ducimus nam debitis ipsa. Ullam cumque a cumque et. Sed velit et occaecati.', 'Asperiores nemo velit itaque. Laudantium ad rerum illum vel ratione numquam voluptas. Magnam sed voluptas velit. Est qui numquam alias distinctio magnam cumque rerum.', '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(10, 'Faye Sawayn', 'Nostrum voluptatibus animi dolorum. Dolorem impedit beatae omnis voluptatem et eos velit. Perspiciatis fugit eum impedit aut consequatur.', 'Ut maiores optio fuga. Voluptatem est ut dolorem tenetur. Molestias et omnis magnam quae repellendus earum. Doloribus aut ratione porro vel corrupti aut fuga.', 'Quae deleniti voluptatem id. Et at non sed esse officiis. Velit culpa nisi delectus amet veritatis eum.', '2022-10-13 10:08:18', '2022-10-13 10:08:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` smallint(6) NOT NULL DEFAULT 1,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Status lịch khám: 0 is chưa xác nhận, 1 is đã xác nhận, 2 is hủy lịch',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT 0 COMMENT 'STT lịch khám',
  `patient_id` int(11) DEFAULT NULL,
  `is_rebooking` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: khám thường, 1: khám lại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `schedules`
--

INSERT INTO `schedules` (`id`, `fullname`, `birthday`, `gender`, `phone`, `email`, `address`, `content`, `date`, `status`, `created_at`, `updated_at`, `counter`, `patient_id`, `is_rebooking`) VALUES
(1, 'Hiep', '2022-10-03', 1, '0967301761', 'hipbu18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asdasd</p>', '2022-10-27', 3, '2022-10-15 02:41:17', '2022-10-15 02:45:59', 1, NULL, 0),
(2, 'Tran hoang hiep', '2022-09-25', 2, '0967301763', 'hipbu18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asdasd</p>', '2022-10-19', 3, '2022-10-15 03:57:10', '2022-10-15 04:01:43', 1, NULL, 0),
(5, 'hazii', '2022-09-14', 1, '0989581166', 'hipbu18@gmail.com', 'asdhaisudhai', '<p>toi bi benh hoi mieng</p>', '2022-09-14', 1, '2022-10-15 09:11:53', '2022-10-15 09:16:22', 1, NULL, 0),
(6, 'Hehehe', '2002-01-16', 1, '0967301765', 'hieptvh@ecommage.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>xxxxxxxxxxxxxxxxxxxxxx</p>', '2022-10-19', 1, '2022-10-15 10:13:11', '2022-10-15 10:13:11', 1, NULL, 0),
(7, 'hehhee', '2022-09-27', 1, '0967301767', 'hieptvh@ecommage.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asdasdasd</p>', '2022-10-28', 3, '2022-10-15 10:14:22', '2022-10-15 10:20:10', 1, NULL, 0),
(8, 'asdasdsa', '2022-09-26', 1, '0967301761', 'huehlu0708@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asdasd&aacute;d</p>', '2022-10-20', 1, '2022-10-15 10:28:22', '2022-10-15 10:28:22', 1, NULL, 0),
(9, 'ádasdasdasd', '2022-10-19', 1, '0967501761', 'hipbu18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asdasdasdasd</p>', '2022-10-26', 3, '2022-10-15 10:29:02', '2022-10-15 10:30:04', 1, NULL, 0),
(10, 'asdasdasd', '2022-10-20', 1, '0967301769', 'hieptvhph14543@fpt.edu.vn', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>sadas</p>', '2022-10-21', 1, '2022-10-15 10:35:28', '2022-10-15 10:35:28', 0, NULL, 0),
(11, 'asdasd', '2022-10-20', 1, '0967301762', 'hieptvhph14543@fpt.edu.vn', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asd</p>', '2022-10-20', 1, '2022-10-15 10:36:34', '2022-10-15 10:38:49', 2, NULL, 0),
(12, 'asdasd', '2022-10-20', 1, '0967301762', 'hieptvhph14543@fpt.edu.vn', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asd</p>', '2022-10-20', 1, '2022-10-15 10:38:49', '2022-10-15 10:38:49', 0, NULL, 0),
(13, 'asdasd', '2022-10-20', 1, '0967301762', 'hieptvhph14543@fpt.edu.vn', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asd</p>', '2022-10-20', 3, '2022-10-15 10:39:19', '2022-10-15 10:40:16', 0, NULL, 0),
(14, 'ádasd', '2022-10-19', 1, '0967321761', 'hieptvhph14543@fpt.edu.vn', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '<p>asd</p>', '2022-10-25', 3, '2022-10-15 10:46:07', '2022-10-15 10:47:26', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedule_services`
--

CREATE TABLE `schedule_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `schedule_services`
--

INSERT INTO `schedule_services` (`id`, `schedule_id`, `service_id`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 5, 1),
(4, 7, 4),
(5, 8, 4),
(6, 8, 6),
(7, 9, 3),
(8, 9, 5),
(9, 13, 3),
(10, 13, 5),
(11, 14, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `service_name`, `price`, `parent_id`, `is_active`, `created_at`, `updated_at`, `image`, `description`) VALUES
(1, 'Mireille Barrows', '15565262', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(2, 'Clemens Stoltenberg', '22842485', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(3, 'Orrin McLaughlin', '15889704', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(4, 'America Pouros', '34545557', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(5, 'Elva Runte', '7124944', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(6, 'Rosina Nitzsche', '34664', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(7, 'Mr. Clifford Yundt', '9789444', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(8, 'Vicente Blanda', '28184787', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(9, 'Pascale Miller', '1399626', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(10, 'Dr. Precious Zulauf PhD', '7776199', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(11, 'Asa Murazik', '56770983', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(12, 'Antwon O\'Keefe', '12127077', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(13, 'Mr. Jasen Blick', '59214900', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(14, 'Dr. Corbin Dicki', '51642028', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(15, 'Conrad Luettgen MD', '4340903', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(16, 'Duncan Schroeder', '31149163', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(17, 'Brett Muller', '44316348', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(18, 'Nelle Towne', '41777789', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(19, 'Braxton Powlowski', '1293303', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL),
(20, 'Shanel Mayer Jr.', '42275594', 0, 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specialists`
--

CREATE TABLE `specialists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'chức năng',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` smallint(6) NOT NULL DEFAULT 1 COMMENT '1 is active, 0 is not active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `specialists`
--

INSERT INTO `specialists` (`id`, `specialist_name`, `function`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Kevon Littel', 'Architecto aliquam et dolorem non iusto perspiciatis consequatur voluptas. Id eum voluptas distinctio illo. Nulla facere eius id corporis ducimus qui dolores.', 'Est eligendi et repudiandae ea molestiae est quaerat. Rerum officia aut tempore distinctio recusandae. Minima maxime eos debitis dolorem. Cum animi voluptas dignissimos id qui sit.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(2, 'Jevon Strosin Sr.', 'Ducimus quis enim aut magnam sed eos ut. Ex non magni magni sapiente numquam molestiae. Dolorem fuga exercitationem dolorem repudiandae.', 'Impedit corrupti voluptate facilis eos velit laborum. Quia sit maiores voluptas tenetur et sint. Laborum eos quaerat ea fugit. Explicabo aut illum ullam in sequi reprehenderit.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(3, 'Dr. Jaiden Ferry', 'Maxime fugiat dicta quia nisi eius id aliquid eius. Tempore ex voluptas natus ducimus expedita. Tenetur beatae velit quia dolorum error ipsam.', 'Ratione odit velit minus quae. Sunt aut ut impedit deleniti dolores quo. Et facere voluptatem quo et sunt.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(4, 'Adeline Torp', 'Repellat voluptatem sunt in distinctio dolorem omnis placeat. Quis tenetur neque veniam voluptatibus. Consequatur sint ipsum rerum maxime numquam.', 'Eius magnam excepturi vel. In quos sapiente esse sed rerum et.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(5, 'Garrick Zulauf', 'Est nobis voluptatem distinctio rerum cum repellendus sit sequi. Non voluptatem exercitationem dolore. Dignissimos similique ullam nulla reiciendis fugiat qui.', 'Numquam nihil corrupti optio natus odit quisquam. Quis corrupti itaque asperiores illo est aliquam laborum. Quaerat qui assumenda necessitatibus possimus.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(6, 'Douglas Grant', 'Nulla debitis modi repellat aut consequatur. Impedit ut velit aliquid. Possimus sit nam corrupti et expedita.', 'Inventore officiis non harum voluptatem alias. Aut sequi eos saepe exercitationem quia et. Velit quia non dolorum voluptatem nihil quo ut. Molestias rerum id est perspiciatis.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(7, 'Pattie Satterfield DVM', 'Ratione nemo sit porro vel eveniet. Pariatur ipsam ut modi ex dolores unde voluptatem. Autem voluptatem voluptatem occaecati velit tempora provident. Dolores illo occaecati sapiente dicta.', 'Sed et dolor velit. Consequatur odit porro qui molestiae soluta adipisci provident. Non magni id quae nobis incidunt tempora.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(8, 'Ms. Wava Murazik DDS', 'Suscipit earum repellat facilis aut sint quae. Tempore voluptate laudantium facere fugiat illo. Ullam accusantium odio odio sint voluptatem ex.', 'Vel quae consectetur facere et. Provident qui et illo. Facere minus sint id nulla blanditiis. Impedit maiores sed ipsum maiores nam.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(9, 'Elsa Runolfsdottir', 'Dolorem facere nisi minus unde porro. Eligendi laboriosam harum repellat sequi. Facere fugiat magnam et perspiciatis debitis nostrum debitis corporis. Esse ea ea minus voluptatem ut non fugiat.', 'Quidem ab sequi aliquam nostrum aut aut. Suscipit sequi velit voluptas dolores vero omnis. Asperiores facilis ipsum dolorum aspernatur sit voluptas. Et provident autem omnis ullam.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18'),
(10, 'Jerod Lebsack', 'Ipsum illo ea molestiae accusantium molestiae architecto. Culpa et aut voluptatem et ratione omnis atque. Ipsa quia qui voluptatem illo.', 'Nisi explicabo ipsa et ut. Et earum beatae facere cupiditate voluptas error. Reprehenderit iste molestias possimus facere et.', 1, '2022-10-13 10:08:18', '2022-10-13 10:08:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specialist_gallery`
--

CREATE TABLE `specialist_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'image option path'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1 COMMENT 'disable hay active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email_verified_at`, `password`, `phone`, `email_user`, `remember_token`, `created_at`, `updated_at`, `birthday`, `gender`, `cmnd`, `address`, `is_active`) VALUES
(5, 'hazii', NULL, '$2y$10$ovCM6o4LDMsos5Uqhhg4p.3UjxtpAL47zc947Oz5CYki2RZOqTsb6', '0989581166', 'hipbu18@gmail.com', NULL, '2022-10-15 09:18:24', '2022-10-15 09:18:24', NULL, NULL, NULL, NULL, 1),
(6, 'Hehehe', NULL, '$2y$10$9WopM441.oOK436vd7Rh2.ZZmOiEENGMWojgDsc.aPqJRwYApPaIq', '0967301765', 'hieptvh@ecommage.com', NULL, '2022-10-15 10:13:11', '2022-10-15 10:13:11', NULL, NULL, NULL, NULL, 1),
(7, 'hehhee', NULL, '$2y$10$72p3LrtEYNA6J.yiRwAjdehQHRIFXREFjV3oLHG4suxsnyRHB5yem', '0967301767', 'hieptvh@ecommage.com', NULL, '2022-10-15 10:14:22', '2022-10-15 10:14:22', NULL, NULL, NULL, NULL, 1),
(8, 'asdasdsa', NULL, '$2y$10$ocxjaV62xNsiXddAkM1Bs.Nec/63ngQUEcsfJHLtkYv.OMSsB/tG6', '0967301761', 'huehlu0708@gmail.com', NULL, '2022-10-15 10:28:22', '2022-10-15 10:28:22', NULL, NULL, NULL, NULL, 1),
(9, 'ádasdasdasd', NULL, '$2y$10$rpV6q8YTQpD7ad2vx5chYuWZ2tPBZwIrbj5UTY/.rI7KLaLnCSFNW', '0967501761', 'hipbu18@gmail.com', NULL, '2022-10-15 10:29:02', '2022-10-15 10:29:02', NULL, NULL, NULL, NULL, 1),
(10, 'asdasd', NULL, '$2y$10$LaKIndH/TCKZNB2qd9OK4ennGlpQLgrcQL5zK/cJYlAlS/anFmMLS', '0967301762', 'hieptvhph14543@fpt.edu.vn', NULL, '2022-10-15 10:38:49', '2022-10-15 10:38:49', '2022-10-20', 1, '111111111111', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 1),
(11, 'ádasd', NULL, '$2y$10$Xljv8C2xeAODfRNLKNjbLe.wBVHa97CcQ3PGwuOGAZ.I0RMx6iaDy', '0967321761', 'hieptvhph14543@fpt.edu.vn', NULL, '2022-10-15 10:46:07', '2022-10-15 10:46:07', '2022-10-19', 1, '111111111111', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 1);

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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD KEY `admins_room_id_foreign` (`room_id`),
  ADD KEY `admins_level_id_foreign` (`level_id`),
  ADD KEY `admins_specialist_id_foreign` (`specialist_id`);

--
-- Chỉ mục cho bảng `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `equipment_galleries`
--
ALTER TABLE `equipment_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `levels_name_unique` (`name`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_news_category_foreign` (`news_category`),
  ADD KEY `news_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_categories_category_name_unique` (`category_name`);

--
-- Chỉ mục cho bảng `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_images_news_id_foreign` (`news_id`);

--
-- Chỉ mục cho bảng `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notice_admins`
--
ALTER TABLE `notice_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notice_admins_admin_id_foreign` (`admin_id`),
  ADD KEY `notice_admins_notice_id_foreign` (`notice_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_schedule_id_foreign` (`schedule_id`),
  ADD KEY `patients_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `patient_doctors`
--
ALTER TABLE `patient_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_doctors_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_doctors_doctor_id_foreign` (`doctor_id`);

--
-- Chỉ mục cho bảng `patient_products`
--
ALTER TABLE `patient_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_products_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `patient_services`
--
ALTER TABLE `patient_services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_permission_name_unique` (`permission_name`);

--
-- Chỉ mục cho bảng `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_roles_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_roles_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_type_id_foreign` (`type_id`);

--
-- Chỉ mục cho bảng `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Chỉ mục cho bảng `role_admins`
--
ALTER TABLE `role_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_admins_admin_id_foreign` (`admin_id`),
  ADD KEY `role_admins_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `schedule_services`
--
ALTER TABLE `schedule_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_services_schedule_id_foreign` (`schedule_id`),
  ADD KEY `schedule_services_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialists_specialist_name_unique` (`specialist_name`);

--
-- Chỉ mục cho bảng `specialist_gallery`
--
ALTER TABLE `specialist_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_gallery_specialist_id_foreign` (`specialist_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `equipment_galleries`
--
ALTER TABLE `equipment_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `notice_admins`
--
ALTER TABLE `notice_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `patient_doctors`
--
ALTER TABLE `patient_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `patient_products`
--
ALTER TABLE `patient_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `patient_services`
--
ALTER TABLE `patient_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `permission_roles`
--
ALTER TABLE `permission_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role_admins`
--
ALTER TABLE `role_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `schedule_services`
--
ALTER TABLE `schedule_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `specialist_gallery`
--
ALTER TABLE `specialist_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `news_news_category_foreign` FOREIGN KEY (`news_category`) REFERENCES `news_categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news_images`
--
ALTER TABLE `news_images`
  ADD CONSTRAINT `news_images_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `notice_admins`
--
ALTER TABLE `notice_admins`
  ADD CONSTRAINT `notice_admins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notice_admins_notice_id_foreign` FOREIGN KEY (`notice_id`) REFERENCES `notices` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `patient_doctors`
--
ALTER TABLE `patient_doctors`
  ADD CONSTRAINT `patient_doctors_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_doctors_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `patient_products`
--
ALTER TABLE `patient_products`
  ADD CONSTRAINT `patient_products_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD CONSTRAINT `permission_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_admins`
--
ALTER TABLE `role_admins`
  ADD CONSTRAINT `role_admins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `schedule_services`
--
ALTER TABLE `schedule_services`
  ADD CONSTRAINT `schedule_services_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `specialist_gallery`
--
ALTER TABLE `specialist_gallery`
  ADD CONSTRAINT `specialist_gallery_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
