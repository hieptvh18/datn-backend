-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 04, 2022 lúc 02:11 PM
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
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `email`, `fullname`, `birthday`, `phone`, `address`, `facebook_url`, `twitter_url`, `email_url`, `password`, `is_active`, `room_id`, `level_id`, `specialist_id`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'admin@gmail.com', 'Admin', NULL, '0246879135', '', '', '', '', '$2y$10$vU1U6gqoF0C/f7wgebN9auPIBL8hJSwTkQl0ssvpxC4gNd5gLEUXy', 1, 1, 1, 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59', 'assets/img/profile-photos/Profile-Icon.png'),
(2, 'hieptvh18@gmail.com', 'Hiep hoang tran', '2022-09-27', '0989581167', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', NULL, NULL, NULL, '$2y$10$lqaKAjex.yVBhpFbL7ilSusrwXTQdCg4H.FiiYAALDLoHkix.YNHS', 1, 3, 4, 3, '2022-10-16 00:29:33', '2022-10-16 00:29:33', 'uploads/admin/admin_mIiVytQCo6eAxGB65hZ7PJY7egzJ9drlb2IsrqPY.png');

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
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Prof. Marian Zieme II', '2022-10-16 00:27:59', '2022-10-16 00:27:59', 'Numquam est voluptatem tenetur eos dolorem praesentium aperiam. Quia est quos id reiciendis dolore et. Perferendis aut deleniti sint omnis id sed.'),
(2, 'Asha Rowe', '2022-10-16 00:27:59', '2022-10-16 00:27:59', 'Facere est veritatis voluptatem ut. Quasi maxime hic qui soluta. Voluptate laborum nobis nostrum modi.'),
(3, 'Mitchell Wolf', '2022-10-16 00:27:59', '2022-10-16 00:27:59', 'Est aliquid eum eum voluptas maxime. Non neque accusantium necessitatibus ut dolores cumque quia assumenda. Qui vitae aspernatur consequuntur animi illo animi.'),
(4, 'Keira White', '2022-10-16 00:27:59', '2022-10-16 00:27:59', 'Quidem accusamus facilis aut consequatur reiciendis. Quod a facilis ea dolorem. Pariatur ex ea magni excepturi.'),
(5, 'Mr. Christop Bednar', '2022-10-16 00:27:59', '2022-10-16 00:27:59', 'Voluptatum voluptates libero sint nulla velit fugiat. Voluptatem autem ad illum nostrum quis. Possimus ullam quia aut.'),
(6, 'Ms. Destany Ritchie', '2022-10-16 00:27:59', '2022-10-16 00:27:59', 'Delectus dolorem molestias atque modi ut. Sunt ut magnam adipisci hic vero.');

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
(32, '2022_10_12_153415_add_attribute_description_into_levels_table', 1),
(33, '2022_10_13_155740_create_news_categories_table', 1),
(34, '2022_10_13_155751_create_news_table', 1),
(35, '2022_10_13_155802_create_news_images_table', 1),
(36, '2022_10_13_163202_create_web_settings_table', 1),
(37, '2022_10_15_110924_update_to_orders_table', 1),
(38, '2022_10_15_111759_update_to_patients_table', 1),
(39, '2022_10_15_150613_update_to_users_table', 1),
(40, '2022_10_15_170228_update_to_schedules_table', 1),
(41, '2022_10_19_155408_create_feedbacks_table', 2),
(42, '2022_10_19_162918_create_notices_table', 3),
(43, '2022_10_25_141317_add_details_to_service_table', 3),
(44, '2022_11_01_150915_update_to_patients_table', 4),
(45, '2022_11_01_150915_add_column_to_patients_table', 5),
(46, '2022_11_01_150915_add_attribute_to_patients_table', 6),
(47, '2022_11_01_153544_add_token_to_patients_table', 7),
(48, '2022_11_13_151710_add_detail_to_schedule_table', 8),
(49, '2022_11_19_105118_update_to_notices_table', 9),
(50, '2022_11_19_105119_create_notice_admins_table', 9),
(51, '2022_11_30_033358_change_to_schedules_table', 10),
(52, '2022_11_30_034615_change_to_patients_table', 10);

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
(1, 'tin tuc', 5, '<p>asdasdasdasdsa</p>', 1, 'asdsad', '2022-10-19 08:22:52', '2022-10-19 08:22:52');

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
(1, 'Afton Swift', 'https://via.placeholder.com/640x480.png/000044?text=molestias', 'Ad ut nam asperiores quasi. Animi voluptatem est qui qui excepturi. Qui temporibus dolorem vel illo facilis alias iste. Qui ducimus et maxime labore autem voluptatibus voluptatem itaque.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(2, 'Lucy Yundt', 'https://via.placeholder.com/640x480.png/001199?text=ut', 'Molestias quis optio illum accusantium. Non deserunt qui voluptatem voluptates temporibus. Ipsum aut blanditiis consequuntur est fugiat.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(3, 'Keanu Romaguera', 'https://via.placeholder.com/640x480.png/005577?text=est', 'Veniam non consequatur impedit et. Rerum eum sapiente quis. Animi quidem quaerat quaerat placeat earum. Cupiditate tempora perspiciatis possimus consequatur sint.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(4, 'Jennyfer Shanahan II', 'https://via.placeholder.com/640x480.png/00cc55?text=molestiae', 'Facilis quia quae dolores et suscipit saepe. Voluptates laudantium fugit adipisci nobis at. Ut ut recusandae ad voluptas porro quis. Ea dolore tempora temporibus et est.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(5, 'Hertha Stroman', 'https://via.placeholder.com/640x480.png/007700?text=nihil', 'Debitis quo consequatur inventore necessitatibus aut quasi dolorem nihil. Ducimus aut quibusdam molestias dicta reprehenderit quas. Dolor libero numquam quo unde sed. Ex et et qui eius.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(6, 'Jordi Wunsch', 'https://via.placeholder.com/640x480.png/00ee55?text=qui', 'Incidunt sit nam sunt expedita perferendis dolore sint. Aut est optio sunt officiis. Occaecati qui voluptatum dicta iste enim et tenetur. Praesentium est perspiciatis aut et est ut.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(7, 'Nelda Hermann', 'https://via.placeholder.com/640x480.png/007799?text=libero', 'Atque voluptatem consectetur et temporibus a quaerat. Aspernatur ut est et facilis commodi voluptatem illo. Ab occaecati odio est sunt iste.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(8, 'Jennifer Walter', 'https://via.placeholder.com/640x480.png/00aaee?text=quod', 'Ut dolorem expedita dignissimos dolores sequi et. Nihil neque ea quaerat dolorem sint ea. Veritatis et ipsum quod eum.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(9, 'Evert Jast', 'https://via.placeholder.com/640x480.png/009933?text=sint', 'Eos asperiores aliquid eum non tenetur nesciunt qui. Provident officia unde quia nam aut. Laudantium qui voluptates sequi qui qui.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(10, 'Desiree Schowalter', 'https://via.placeholder.com/640x480.png/003355?text=tenetur', 'Rerum quibusdam esse dolore cum. Quo explicabo et deserunt molestiae saepe est autem. Natus labore temporibus tempora blanditiis optio. Maxime nobis quas ea sit deleniti nobis.', '2022-10-16 00:27:59', '2022-10-16 00:27:59');

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
(1, 1, 'uploads/newsImages/newsImage_XfVLeZ3RbqQcbkSSBe4xbQ45kI9M5KYGrxwmUy1e.png', '2022-10-19 08:22:52', '2022-10-19 08:22:52');

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

--
-- Đang đổ dữ liệu cho bảng `notices`
--

INSERT INTO `notices` (`id`, `content`, `date`, `read`, `created_at`, `updated_at`) VALUES
(1, 'SDT 01111111111 đã đặt lịch khám.', NULL, '0', '2022-11-19 07:59:31', '2022-11-19 07:59:31'),
(2, 'SDT 0967301712 đã đặt lịch khám.', NULL, '0', '2022-11-19 08:01:31', '2022-11-19 08:01:31'),
(3, 'SDT 0989581100 đã đặt lịch khám.', NULL, '0', '2022-11-19 08:04:57', '2022-11-19 08:04:57'),
(4, 'SDT 0989581188 đã đặt lịch khám.', NULL, '0', '2022-11-19 08:24:22', '2022-11-19 08:24:22');

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
(1, 'Nguyễn Thùy Trinh', '0989581168', 'Tiền mặt', '<p>asd&aacute;d</p>', '3|5', '1', '801452991500', 100825530, '2022-10-16 00:40:17', '2022-10-16 00:40:17', '2022-10-16', 1),
(2, 'sdfsdf', '0967301763', 'Chuyển khoản', '<p>sdfsdf</p>', '4|6', '4|8', '235567872592', 99123971, '2022-10-16 03:50:53', '2022-10-16 03:50:53', '2022-10-16', 2),
(3, 'hiep', '0989581167', 'Tiền mặt', '<p>sdfsdf</p>', '12', '4', '818473932803', 54796969, '2022-11-01 09:09:56', '2022-11-01 09:09:56', '2022-11-01', 5),
(4, 'asdasdasd', '0967301761', 'Tiền mặt', '<p>eddfdsfsdfsdf</p>', '3', '5', '862631717794', 40537925, '2022-11-09 07:32:35', '2022-11-09 07:32:35', '2022-11-09', 6),
(5, 'asdasdasdasd', '0967301761', 'Tiền mặt', '<p>asdasdasdasd</p>', '5', '2', '597786525716', 94217780, '2022-11-09 07:36:23', '2022-11-09 07:36:23', '2022-11-09', 7),
(6, 'asdasdasda', '0967301761', 'Tiền mặt', '<p>dsaasadasd</p>', '5', '8', '777854527999', 30789780, '2022-11-09 07:37:28', '2022-11-09 07:37:28', '2022-11-09', 8),
(7, 'hiep adasd', '0967301766', 'Tiền mặt', '<p>sdfsdfsf</p>', '2', '2', '877664872533', 69140381, '2022-11-19 08:36:58', '2022-11-19 08:36:58', '2022-11-19', 9);

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
  `cmnd` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chứng minh nd',
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

INSERT INTO `patients` (`id`, `customer_name`, `phone`, `birthday`, `cmnd`, `description`, `address`, `schedule_id`, `status`, `date`, `created_at`, `updated_at`, `order_id`, `token_url`) VALUES
(1, 'Nguyễn Thùy Trinh', '0989581168', '1999-09-12', '235684597', 'asdád', 'Hà Nội', 1, 3, '2022-10-15', '2022-10-16 00:37:54', '2022-10-16 00:40:22', 1, ''),
(2, 'sdfsdf', '0967301763', '2022-10-28', '111111111111', 'sdfsdf', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 4, 3, '2022-10-19', '2022-10-16 03:48:05', '2022-10-16 03:50:57', 2, ''),
(3, 'Tesster', '0967301761', '2022-10-02', '111111111111', 'asdasdasd', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 3, 0, '2022-10-25', '2022-11-01 08:36:34', '2022-11-01 08:36:34', NULL, 'EkAqYQfA2lfzTBZ1Ka3CH6F6N'),
(4, 'aaaaa', '0967301761', '2022-11-24', '111111111111', 'dfsf', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 5, 0, '2022-11-19', '2022-11-01 08:56:41', '2022-11-01 08:56:41', NULL, 'mlqw8copnj8an2sd8jsdvlxih'),
(5, 'hiep', '0989581167', '2022-11-18', '111111111111', 'sdfsdf', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 6, 3, '2022-11-25', '2022-11-01 09:03:48', '2022-11-01 09:10:01', 3, 'ayycea9qsfcrgu0pff2oqnyja'),
(6, 'asdasdasd', '0967301761', '2022-10-21', '111111111111', 'eddfdsfsdfsdf', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 21, 3, '2022-11-17', '2022-11-09 07:32:28', '2022-11-09 07:32:39', 4, '9qb80vsboq6uxahp60zncpyd0'),
(7, 'asdasdasdasd', '0967301761', '2022-10-30', '111111111111', 'asdasdasdasd', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 22, 3, '2022-11-18', '2022-11-09 07:36:14', '2022-11-09 07:36:27', 5, '1uz1vvdrlfsclpuc8rgsf1zzz'),
(8, 'asdasdasda', '0967301761', '2022-10-21', '111111111111', 'dsaasadasd', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 23, 3, '2022-11-30', '2022-11-09 07:37:24', '2022-11-09 07:37:32', 6, 'ooa8mczalrdlvm7dk3lor4mrg'),
(9, 'hiep adasd', '0967301766', '2022-11-11', '111111111111', 'sdfsdfsf asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', 47, 0, '2022-11-24', '2022-11-19 08:36:42', '2022-12-03 10:43:56', 7, 'sdyrzels5df1bjdooia8omb4k');

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
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2);

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
(3, 2, 4),
(4, 2, 6),
(5, 3, 6),
(6, 4, 2),
(7, 5, 12),
(8, 6, 3),
(9, 7, 5),
(10, 8, 5),
(11, 9, 2);

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
(2, '2', '4'),
(3, '2', '8'),
(4, '3', '5'),
(5, '4', '4'),
(6, '4', '8'),
(7, '5', '4'),
(8, '6', '5'),
(9, '7', '2'),
(10, '8', '8'),
(11, '9', '2');

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
(1, 'Roles', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(2, 'List Roles', 'List_Roles', '1', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(3, 'Add Roles', 'Add_Roles', '1', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(4, 'Edit Roles', 'Edit_Roles', '1', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(5, 'Delete Roles', 'Delete_Roles', '1', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(6, 'Rooms', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(7, 'List Rooms', 'List_Rooms', '6', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(8, 'Add Rooms', 'Add_Rooms', '6', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(9, 'Edit Rooms', 'Edit_Rooms', '6', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(10, 'Delete Rooms', 'Delete_Rooms', '6', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(11, 'Permissions', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(12, 'List Permissions', 'List_Permissions', '11', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(13, 'Add Permissions', 'Add_Permissions', '11', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(14, 'Edit Permissions', 'Edit_Permissions', '11', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(15, 'Delete Permissions', 'Delete_Permissions', '11', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(16, 'Admins', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(17, 'List Admins', 'List_Admins', '16', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(18, 'Add Admins', 'Add_Admins', '16', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(19, 'Edit Admins', 'Edit_Admins', '16', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(20, 'Delete Admins', 'Delete_Admins', '16', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(21, 'Patients', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(22, 'List Patients', 'List_Patients', '21', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(23, 'Add Patients', 'Add_Patients', '21', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(24, 'Edit Patients', 'Edit_Patients', '21', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(25, 'Delete Patients', 'Delete_Patients', '21', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(26, 'Levels', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(27, 'List Levels', 'List_Levels', '26', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(28, 'Add Levels', 'Add_Levels', '26', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(29, 'Edit Levels', 'Edit_Levels', '26', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(30, 'Delete Levels', 'Delete_Levels', '26', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(31, 'Services', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(32, 'List Services', 'List_Services', '31', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(33, 'Add Services', 'Add_Services', '31', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(34, 'Edit Services', 'Edit_Services', '31', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(35, 'Delete Services', 'Delete_Services', '31', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(36, 'Equipments', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(37, 'List Equipments', 'List_Equipments', '36', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(38, 'Add Equipments', 'Add_Equipments', '36', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(39, 'Edit Equipments', 'Edit_Equipments', '36', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(40, 'Delete Equipments', 'Delete_Equipments', '36', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(41, 'Products', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(42, 'List Products', 'List_Products', '41', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(43, 'Add Products', 'Add_Products', '41', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(44, 'Edit Products', 'Edit_Products', '41', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(45, 'Delete Products', 'Delete_Products', '41', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(46, 'Orders', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(47, 'List Orders', 'List_Orders', '46', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(48, 'Add Orders', 'Add_Orders', '46', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(49, 'Edit Orders', 'Edit_Orders', '46', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(50, 'Delete Orders', 'Delete_Orders', '46', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(51, 'Schedules', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(52, 'List Schedules', 'List_Schedules', '51', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(53, 'Add Schedules', 'Add_Schedules', '51', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(54, 'Edit Schedules', 'Edit_Schedules', '51', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(55, 'Delete Schedules', 'Delete_Schedules', '51', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(56, 'Specialists', '', '0', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(57, 'List Specialists', 'List_Specialists', '56', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(58, 'Add Specialists', 'Add_Specialists', '56', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(59, 'Edit Specialists', 'Edit_Specialists', '56', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(60, 'Delete Specialists', 'Delete_Specialists', '56', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(61, 'Web_settings', '', '0', '2022-12-03 10:12:38', '2022-12-03 10:12:38'),
(62, 'List Web_settings', 'List_Web_settings', '61', '2022-12-03 10:12:38', '2022-12-03 10:12:38'),
(63, 'Add Web_settings', 'Add_Web_settings', '61', '2022-12-03 10:12:38', '2022-12-03 10:12:38'),
(64, 'Edit Web_settings', 'Edit_Web_settings', '61', '2022-12-03 10:12:38', '2022-12-03 10:12:38'),
(65, 'Delete Web_settings', 'Delete_Web_settings', '61', '2022-12-03 10:12:38', '2022-12-03 10:12:38'),
(66, 'FeedBack', '', '0', '2022-12-03 10:13:57', '2022-12-03 10:13:57'),
(67, 'List FeedBack', 'List_FeedBack', '66', '2022-12-03 10:13:57', '2022-12-03 10:13:57'),
(68, 'Add FeedBack', 'Add_FeedBack', '66', '2022-12-03 10:13:57', '2022-12-03 10:13:57'),
(69, 'Edit FeedBack', 'Edit_FeedBack', '66', '2022-12-03 10:13:57', '2022-12-03 10:13:57'),
(70, 'Delete FeedBack', 'Delete_FeedBack', '66', '2022-12-03 10:13:57', '2022-12-03 10:13:57');

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
(49, 55, 3),
(50, 57, 3),
(51, 58, 3),
(52, 59, 3),
(53, 60, 3),
(54, 62, 3),
(55, 63, 3),
(56, 64, 3),
(57, 65, 3);

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
(1, 3, 'Dane Toy', '17935322', 'https://via.placeholder.com/640x480.png/003300?text=consequatur', 'Possimus possimus odio consequatur beatae esse non sint. Voluptatem laboriosam et consequatur sed nobis. Occaecati aut voluptatem qui laboriosam adipisci est amet. Id amet rerum eius praesentium.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(2, 2, 'Terry Hahn', '1266391', 'https://via.placeholder.com/640x480.png/00ddff?text=dolor', 'Ipsam praesentium fugit provident cumque ad autem eum. Maiores harum ab sit cum animi molestiae. Ipsum quaerat est non at. Enim repellat blanditiis quae ea adipisci nihil dolor.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(3, 9, 'Roxane Ratke I', '25831919', 'https://via.placeholder.com/640x480.png/00ff66?text=veniam', 'Quo vitae asperiores sit omnis. Quia hic unde ut dolor ut est ea. Deserunt at laborum modi quia qui tempora eum. Est porro nisi dolor.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(4, 2, 'Dr. Seamus Schultz DDS', '29137116', 'https://via.placeholder.com/640x480.png/00ffcc?text=magni', 'Sunt quis quaerat dolorum iste. Ipsam et neque aut ullam. Dolorem est cumque sint rerum nam non placeat.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(5, 6, 'Katrina Kassulke', '26343790', 'https://via.placeholder.com/640x480.png/00bb55?text=nesciunt', 'Distinctio et sunt voluptatem asperiores at cumque. Et excepturi quod dolorem rerum omnis.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(6, 2, 'Ms. Sister Macejkovic III', '21544064', 'https://via.placeholder.com/640x480.png/007711?text=voluptas', 'Aut officia architecto asperiores minus. Doloremque ut suscipit necessitatibus ut provident blanditiis et. Iure impedit animi non sint.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(7, 9, 'Shawna Kreiger', '29885810', 'https://via.placeholder.com/640x480.png/009988?text=consequatur', 'Deleniti ullam et minima quia voluptatem. Porro fugiat ut quas qui quo quos. Aliquid voluptatum iste unde sunt deserunt animi.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(8, 10, 'Dr. Stephon Schneider', '27382405', 'https://via.placeholder.com/640x480.png/008877?text=voluptate', 'Eveniet et qui eligendi architecto velit quo. Nulla eius iusto quia hic cupiditate odio. Quia sit quo rerum doloremque. Nemo quasi eos ab.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(9, 7, 'Andreanne Auer', '21758803', 'https://via.placeholder.com/640x480.png/009977?text=id', 'Enim blanditiis est earum magni quo. Aut molestias eos ut tempora perferendis. Et quod perferendis voluptates neque quidem quas.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(10, 8, 'Izaiah Schoen', '22875134', 'https://via.placeholder.com/640x480.png/00ffff?text=eligendi', 'Veritatis rerum omnis dolor quia voluptatem qui vel. Accusantium quo ex rerum quis placeat. Quisquam quia ipsam harum. Vitae quo maiores doloribus quisquam est quo ratione voluptas.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(11, 10, 'Jewell Fritsch', '21285992', 'https://via.placeholder.com/640x480.png/00ccbb?text=rerum', 'Molestiae occaecati in rerum ullam. Aut pariatur laudantium et beatae ut illum. Deserunt sapiente ullam ea qui. Nihil atque veritatis ipsa illo omnis.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(12, 4, 'Alfredo Lubowitz', '10800168', 'https://via.placeholder.com/640x480.png/005566?text=aperiam', 'Est tenetur voluptas nam. Inventore et consectetur fuga amet occaecati placeat sapiente. Molestiae quasi id et quidem. Ab doloremque voluptas voluptatem fugiat et quam.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(13, 5, 'Zachary Bernier', '28618893', 'https://via.placeholder.com/640x480.png/00aa77?text=dolorum', 'Quae consequatur excepturi dignissimos vero consequatur quia. Eum velit sed tenetur voluptas error aut nihil. Expedita suscipit aliquam quae ipsum est.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(14, 6, 'Burley Witting IV', '9133031', 'https://via.placeholder.com/640x480.png/008811?text=dolor', 'Vitae ea et fugiat culpa. Modi dolores possimus neque numquam qui. Voluptas minus aut dignissimos velit est et corrupti. Voluptate totam corrupti minus et eaque.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(15, 6, 'Isaiah Baumbach', '5050090', 'https://via.placeholder.com/640x480.png/0033ee?text=id', 'Eum minus omnis eligendi sequi minus ut eveniet. Porro animi itaque sint nesciunt labore. Magnam est veritatis voluptas commodi delectus dolores vel.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(16, 9, 'Perry Nicolas', '29982604', 'https://via.placeholder.com/640x480.png/0000ff?text=aut', 'Incidunt quia quia error. Soluta voluptatem id et quam. Expedita vel ea in. Ea tenetur voluptatem maxime consequuntur saepe repudiandae totam enim.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(17, 3, 'Mrs. Breanne Altenwerth Jr.', '21569889', 'https://via.placeholder.com/640x480.png/001100?text=vitae', 'Ducimus expedita aut eligendi id ea ipsum cum. Eligendi facilis temporibus magni dolorem sit. Assumenda est velit veritatis excepturi deleniti odit. Eligendi repellat ut sint hic.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(18, 9, 'Kaycee Graham', '492735', 'https://via.placeholder.com/640x480.png/00eedd?text=ratione', 'Dolores atque consequatur in qui. Consequatur qui pariatur quam cumque ut dolorum. Atque quo reiciendis aliquid hic necessitatibus ratione facere voluptatem. Deserunt minus at laudantium.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(19, 7, 'Gina Hagenes II', '20847764', 'https://via.placeholder.com/640x480.png/0077ee?text=at', 'Reiciendis maxime harum vel laborum. Sint eveniet non et ipsam enim doloremque dolorem. Dolor sit ipsa aut ut.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(20, 3, 'Gonzalo Ziemann', '10998498', 'https://via.placeholder.com/640x480.png/0044bb?text=optio', 'Ut sint eum vitae eveniet nihil pariatur. Vel in iure impedit asperiores omnis.', '2022-10-16 00:27:59', '2022-10-16 00:27:59');

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
(1, 'Frankie Dickinson', 'https://via.placeholder.com/640x480.png/00ee22?text=et', 'Dolores ab placeat occaecati neque voluptatum consectetur sit adipisci. Laborum accusantium iste soluta porro. Quas eaque quia quam quia beatae quaerat.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(2, 'Vivianne Shields III', 'https://via.placeholder.com/640x480.png/0033bb?text=officiis', 'Nesciunt at eligendi eum dolor reiciendis incidunt voluptas. Eligendi reprehenderit illum blanditiis rerum perferendis.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(3, 'Antoinette Hessel I', 'https://via.placeholder.com/640x480.png/003344?text=laudantium', 'Porro laudantium unde a magni soluta qui voluptatem eius. Ratione quam minus dolores saepe accusamus ipsa modi. Et fugiat deleniti aut pariatur laborum assumenda. Amet itaque qui itaque dignissimos.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(4, 'Aiyana Jerde', 'https://via.placeholder.com/640x480.png/00eebb?text=molestiae', 'Sed non possimus minus facere repellat minima. Dignissimos eos necessitatibus magni sint. Repellat sed est occaecati voluptatem. Modi quod corporis ab facere aliquid quia.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(5, 'Hallie O\'Hara MD', 'https://via.placeholder.com/640x480.png/008833?text=nesciunt', 'Est molestiae aperiam repellendus ut. Qui officiis tenetur non consequuntur voluptas vero et. Eveniet ducimus accusamus enim iusto. Maiores non est ut sed.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(6, 'Rafael Ankunding', 'https://via.placeholder.com/640x480.png/001122?text=magni', 'Aspernatur iure error et possimus. Laborum quas excepturi magni consectetur ut aut. Voluptatibus at tempore esse. Iusto aperiam autem amet. Ullam nostrum architecto natus aut quaerat.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(7, 'Mr. Rodrigo Reichert V', 'https://via.placeholder.com/640x480.png/00ee66?text=nihil', 'Mollitia quia sit dolores nihil dolorem aut debitis. At possimus sed labore sed quas consectetur. Facere aut a id. Aperiam ea iure autem in. Asperiores quidem unde magni animi.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(8, 'Demario Emmerich', 'https://via.placeholder.com/640x480.png/004422?text=provident', 'Aut expedita et voluptas itaque a debitis. Id sit ea eum nulla. Corporis hic perferendis pariatur id non. Non quam suscipit dicta perferendis omnis modi.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(9, 'Prof. Kitty Casper', 'https://via.placeholder.com/640x480.png/003366?text=dolor', 'Culpa eius doloribus ipsum recusandae vitae. Sit nemo itaque ratione molestiae suscipit maiores. In aut quaerat omnis tempora est. Illum aut inventore id in impedit.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(10, 'Kaylin Schneider', 'https://via.placeholder.com/640x480.png/0022bb?text=quia', 'Ipsam nostrum hic sint aperiam id. Autem amet omnis accusantium est sint minima dolor. Expedita aut aut quibusdam vero molestias non. Aliquid ullam dicta minus quia eum.', '2022-10-16 00:27:59', '2022-10-16 00:27:59');

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
(1, 'Guest', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(2, 'Manager', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(3, 'Admin', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(4, 'Doctor', '2022-10-16 00:27:59', '2022-10-16 00:27:59');

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
(1, 'Morton Kunze', 'Cumque consequuntur possimus deserunt placeat fuga. Est molestiae quo cumque sint. Magnam occaecati veritatis rerum sunt. Maxime repudiandae quam et odit alias.', 'Eligendi saepe enim quibusdam quo occaecati nam. Aut aut dolor fuga consequatur occaecati exercitationem et. Quos ut dolorem autem est voluptatem dolores nihil voluptatibus.', 'Tempora incidunt voluptas beatae omnis labore non. Eius eos doloribus nam accusamus. Et magnam blanditiis nobis corrupti molestias quia.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(2, 'Dr. Vincent Hyatt II', 'Ipsa placeat dolore aut. Distinctio voluptate beatae ut nostrum. Eum ut omnis fugit nostrum optio expedita ab sint. Quia cum occaecati quo dolores non ad eveniet.', 'Aut dolor aut atque aut magnam. Officia optio eum deleniti atque sunt fuga. Dolorum maxime voluptates qui veritatis adipisci sequi.', 'Consequuntur voluptatem accusamus autem. Ea placeat minus vitae tempora veritatis.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(3, 'Marlene Stanton', 'Et alias nihil et aut qui dolor. Alias quaerat et et architecto provident et tempora. Possimus aut quae ullam repellendus et quia alias aut.', 'Reprehenderit voluptas alias deleniti qui. Sit ipsum non debitis voluptatem ut. Vitae voluptate ullam debitis assumenda id earum. Commodi animi at cum non nam doloribus.', 'Quia voluptatem nihil a. Vel incidunt natus eaque aspernatur tempore sit. Iste sint qui eos nostrum non ut pariatur tempora.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(4, 'Priscilla Gorczany', 'Provident quae expedita inventore occaecati nobis. Animi quis cumque amet mollitia vel quidem aut. Eum asperiores maxime dolor voluptas in ut.', 'Eligendi enim quis et illo ea. Voluptatem et ipsam distinctio voluptatem quod totam. Et autem in quisquam sed sapiente perferendis fugiat.', 'Dolor minus libero dolor est. Libero ipsam quo dolorem velit. Iste nihil adipisci blanditiis asperiores explicabo animi explicabo laboriosam.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(5, 'Rubye Huels', 'Eum enim eos molestiae illum aut. Quibusdam est placeat et ut quidem culpa reiciendis. Laborum veritatis voluptatem rerum aliquid eaque ut esse.', 'Ab eaque placeat sit distinctio quos ut consequatur. Doloribus nulla ad vero inventore illo iusto. At consequatur aliquid dolores architecto tempora velit. Qui quo eius repudiandae.', 'Omnis velit maxime maxime possimus inventore impedit non. Dolores consequatur atque dolorem similique. Sunt suscipit reprehenderit impedit eos quam cumque et.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(6, 'Bridget Terry', 'Sunt adipisci aut expedita eius est unde laboriosam. Ex impedit iste quia adipisci ab rem omnis adipisci. Minus consequuntur dolor quod quo.', 'Soluta ut neque hic ut nihil ut sequi. Quia quia facilis at quas vero quos iusto. Ut cumque fuga vitae illum odio est quaerat. Magnam magnam neque et qui sunt ratione.', 'Deserunt ad non ut. Sit nesciunt ratione recusandae saepe quia nam itaque ea. Beatae ut sint repudiandae aperiam ut sit qui. Aperiam fugiat molestiae illo culpa.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(7, 'Dr. Vergie Zboncak', 'Magni adipisci repellendus illum et iusto. Perspiciatis nam quaerat porro qui dolore sed. Ut nulla reprehenderit nobis necessitatibus ratione.', 'Repellendus alias eos quaerat debitis laudantium. Iste eius odit sed nobis recusandae. Deleniti voluptatem aliquid a.', 'Sunt voluptatem minima aliquid quam praesentium explicabo. Et autem pariatur et nam. Repellat rerum consequuntur quibusdam quasi dolorum odit excepturi.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(8, 'Heath Haag I', 'Est totam iure aut fugiat molestias. Id reiciendis fugiat aliquid. Necessitatibus tempore libero aut dolore non quaerat qui quis.', 'Molestias vel harum facilis ipsa. Voluptas rem delectus dignissimos animi. Consequuntur dicta corporis quia enim esse. Eum voluptatibus rerum est saepe ullam non.', 'Facere porro rerum et non. At neque voluptatibus voluptatem quo itaque sit. Consectetur sit hic quo molestias illo consequatur. Voluptas et commodi tempore.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(9, 'Prof. Viviane Kunde IV', 'Cum et reprehenderit libero dolor est facere. Voluptate est aut minus tempore est ut. Et illum amet quis maxime enim cum nostrum. Aut laudantium suscipit ab aut qui mollitia ipsum sed.', 'Numquam natus a quam. Modi ducimus sapiente tenetur voluptas. Ut et in quia iste nihil alias molestiae sed.', 'Voluptatem hic a placeat libero magnam eum non non. Tenetur natus quo quas voluptatem quis. Et vero cum quidem non.', '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(10, 'Deborah Heidenreich', 'Et veniam repudiandae reiciendis non doloribus iste. Vel delectus hic quo alias numquam eveniet. Aliquam aspernatur enim ipsam ut itaque.', 'Doloribus sit cumque eaque corrupti. Ut quia qui vel vel reiciendis architecto. Dolor quisquam itaque ipsa consectetur quibusdam. Illo est adipisci quia.', 'Dolorum aspernatur veniam fugit itaque quia vitae ut. Earum iure ut perferendis officia. Odio asperiores architecto reprehenderit numquam laudantium eum et.', '2022-10-16 00:27:59', '2022-10-16 00:27:59');

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
  `cmnd` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `schedules` (`id`, `fullname`, `birthday`, `gender`, `phone`, `email`, `address`, `cmnd`, `content`, `date`, `status`, `created_at`, `updated_at`, `counter`, `patient_id`, `is_rebooking`) VALUES
(1, 'Nguyễn Thùy Trinh', '1999-09-12', 2, '0989581168', 'hipbu18@gmail.com', 'Hà Nội', '235684597', NULL, '2022-10-15', 3, '2022-10-16 00:30:56', '2022-10-16 00:37:54', 1, 1, 0),
(2, 'Nguyễn Thùy Thủy', '1989-09-12', 2, '0989581167', 'hieptvh18@gmail.com', 'Hà Nội', '235684597', NULL, '2022-10-15', 1, '2022-10-16 00:30:56', '2022-11-24 09:59:59', 1, NULL, 0),
(3, 'Tesster', '2022-10-02', 1, '0967301761', 'huehlu0708@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>asdas</p>', '2022-10-25', 3, '2022-10-16 00:54:22', '2022-11-01 08:36:34', 1, 3, 0),
(4, 'sdfsdf', '2022-10-28', 1, '0967301763', 'huehlu0708@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>sdfdsdf</p>', '2022-10-19', 3, '2022-10-16 03:46:13', '2022-10-16 03:48:05', 1, 2, 0),
(5, 'aaaaa', '2022-11-24', 1, '0967301761', 'huehlu0708@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>asadsd</p>', '2022-11-19', 3, '2022-11-01 08:54:20', '2022-11-01 08:56:41', 1, 4, 0),
(6, 'hiep', '2022-11-18', 1, '0989581167', 'hieptvh@ecommage.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>rwerwer</p>', '2022-11-25', 3, '2022-11-01 09:03:06', '2022-11-01 09:03:48', 1, 5, 0),
(7, 'sfdsdf', '2022-10-30', 1, '0967301731', 'hipbu18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>asd</p>', '2022-11-26', 1, '2022-11-02 07:36:18', '2022-11-02 07:36:18', 0, NULL, 0),
(8, 'asdasd', '2022-10-31', 1, '0967301761', 'hipbu18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>asdasd</p>', '2022-11-22', 1, '2022-11-02 07:37:04', '2022-11-02 07:37:04', 1, NULL, 0),
(9, 'asdasdasd', '2022-10-30', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-26', 1, '2022-11-02 07:37:58', '2022-11-02 07:37:58', 0, NULL, 0),
(10, 'asdasdasd', '2022-10-30', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-26', 1, '2022-11-02 07:38:36', '2022-11-02 07:38:36', 0, NULL, 0),
(11, 'asdasdasd', '2022-10-21', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-24', 1, '2022-11-02 07:39:04', '2022-11-02 07:39:04', 0, NULL, 0),
(12, 'asdasdasd', '2022-10-21', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-24', 1, '2022-11-02 07:41:07', '2022-11-02 07:41:07', 0, NULL, 0),
(13, 'asdasdasd', '2022-10-21', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-24', 1, '2022-11-02 07:42:05', '2022-11-02 07:42:05', 0, NULL, 0),
(14, 'asdasdasd', '2022-10-21', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-24', 1, '2022-11-02 07:42:45', '2022-11-02 07:42:45', 0, NULL, 0),
(15, 'asdasdasd', '2022-10-21', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-25', 1, '2022-11-02 07:43:56', '2022-11-02 07:43:56', 0, NULL, 0),
(16, 'asdasdasd', '2022-10-21', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-25', 1, '2022-11-02 07:47:37', '2022-11-02 07:47:37', 0, NULL, 0),
(17, 'asdasdasd', '2022-10-21', 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-25', 1, '2022-11-02 07:48:12', '2022-11-02 07:48:12', 0, NULL, 0),
(18, 'asdasdasd', NULL, 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-25', 1, '2022-11-02 07:48:35', '2022-11-02 07:48:35', 0, NULL, 0),
(19, 'asdasdasd', NULL, 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-25', 1, '2022-11-02 07:48:42', '2022-11-02 07:48:42', 0, NULL, 0),
(20, 'asdasdasd', NULL, 1, '0967304761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>aasdasd</p>', '2022-11-25', 1, '2022-11-02 07:49:05', '2022-11-02 07:49:05', 0, NULL, 0),
(21, 'asdasdasd', '2022-10-21', 1, '0967301761', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>asasasdsad</p>', '2022-11-17', 3, '2022-11-09 07:31:55', '2022-11-09 07:32:28', 1, 6, 0),
(22, 'asdasdasdasd', '2022-10-30', 1, '0967301761', 'huehlu0708@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>asdasdasd</p>', '2022-11-18', 3, '2022-11-09 07:35:39', '2022-11-09 07:36:14', 1, 7, 0),
(23, 'asdasdasda', '2022-10-21', 1, '0967301761', 'hieptvh@ecommage.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>adasdasdasdasdasd</p>', '2022-11-30', 3, '2022-11-09 07:37:05', '2022-11-09 07:37:24', 1, 8, 0),
(24, 'hiep hihi', NULL, 1, '0989581166', NULL, NULL, NULL, NULL, '2022-11-23', 0, '2022-11-19 02:36:42', '2022-11-19 02:36:42', 0, NULL, 0),
(27, 'Trần Thị Thanh Huê1', NULL, 1, '0967301762', NULL, NULL, NULL, NULL, '2022-11-21', 0, '2022-11-19 02:44:06', '2022-11-19 02:44:06', 0, NULL, 0),
(28, 'Trần Thị Thanh Huê133', NULL, 1, '0967301764', NULL, NULL, NULL, NULL, '2022-11-29', 0, '2022-11-19 02:45:54', '2022-11-19 02:45:54', 0, NULL, 0),
(29, '22Trần Thị Thanh Huê133', NULL, 1, '0967301765', NULL, NULL, NULL, NULL, '2022-11-29', 0, '2022-11-19 02:58:06', '2022-11-19 02:58:06', 0, NULL, 0),
(30, '22Trần Thị Thanh Huê13311', NULL, 1, '0967301766', NULL, NULL, NULL, NULL, '2022-11-29', 0, '2022-11-19 03:05:29', '2022-11-19 03:05:29', 0, NULL, 0),
(31, '22Trần Thị Thanh Huê1331122', NULL, 1, '0967301767', NULL, NULL, NULL, NULL, '2022-11-29', 0, '2022-11-19 03:10:13', '2022-11-19 03:10:13', 0, NULL, 0),
(32, '22Trần Thị Thanh Huê133112w2', NULL, 1, '0967301768', NULL, NULL, NULL, NULL, '2022-11-29', 0, '2022-11-19 03:26:09', '2022-11-19 03:26:09', 0, NULL, 0),
(33, 'Hiệp Trần3', NULL, 1, '0967304763', NULL, NULL, NULL, NULL, '2022-11-27', 0, '2022-11-19 03:27:17', '2022-11-19 03:27:17', 0, NULL, 0),
(34, 'Hiệp Trần3sw', NULL, 1, '0967304768', NULL, NULL, NULL, NULL, '2022-12-20', 0, '2022-11-19 03:28:56', '2022-11-19 03:28:56', 0, NULL, 0),
(35, 'Hiệp Trần3sws', NULL, 1, '0967304769', NULL, NULL, NULL, NULL, '2022-12-26', 0, '2022-11-19 03:30:12', '2022-11-19 03:30:12', 0, NULL, 0),
(36, 'asdasd', NULL, 1, '0967301711', NULL, NULL, NULL, NULL, '2022-11-22', 0, '2022-11-19 03:31:00', '2022-11-19 03:31:00', 0, NULL, 0),
(37, 'asdasdss', NULL, 1, '0967301715', NULL, NULL, NULL, NULL, '2022-11-28', 0, '2022-11-19 03:36:08', '2022-11-19 03:36:08', 0, NULL, 0),
(38, 'asdasdssww', NULL, 1, '0967301717', NULL, NULL, NULL, NULL, '2022-11-21', 0, '2022-11-19 03:36:21', '2022-11-19 03:36:21', 0, NULL, 0),
(39, 'Trần Thị Thanh Huê', NULL, 1, '01111111111', NULL, NULL, NULL, NULL, '2022-11-25', 0, '2022-11-19 07:59:31', '2022-11-19 07:59:31', 0, NULL, 0),
(40, '22Hiệp Trần', NULL, 1, '0967301712', NULL, NULL, NULL, NULL, '2022-11-27', 0, '2022-11-19 08:01:31', '2022-11-19 08:01:31', 0, NULL, 0),
(41, 'Hiep tran hoang', '2022-09-14', 1, '0989581100', 'hiep@gmail.com', 'asdhaisudhai', '184473304', 'toi bi benh hoi mieng', '2022-09-14', 0, '2022-11-19 08:04:57', '2022-11-19 08:04:57', 0, NULL, 0),
(42, 'Trần Thị Thanh Huê', NULL, 1, '0989581199', NULL, NULL, NULL, NULL, '2022-11-23', 0, '2022-11-19 08:18:05', '2022-11-19 08:18:05', 0, NULL, 0),
(43, 'Trần Thị Thanh Huê111', NULL, 1, '0989581191', NULL, NULL, NULL, NULL, '2022-11-22', 0, '2022-11-19 08:23:05', '2022-11-19 08:23:05', 0, NULL, 0),
(44, 'Hiệp Trần', '1970-01-01', 1, '0989581188', NULL, NULL, NULL, NULL, '2022-11-29', 1, '2022-11-19 08:24:22', '2022-11-19 08:25:51', 1, NULL, 0),
(45, 'sdfsdf', '2022-10-28', 1, '0967301761', 'huehlu0708@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', NULL, '2022-11-25', 1, '2022-11-19 08:27:41', '2022-11-19 08:27:41', 1, NULL, 1),
(46, 'sdfsdf', '2022-10-28', 1, '0967301761', 'huehlu0708@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', NULL, '2022-11-25', 1, '2022-11-19 08:29:35', '2022-11-19 08:29:35', 0, NULL, 1),
(47, 'hiep adasd', '2022-11-11', 1, '0967301766', 'hieptvh18@gmail.com', 'Thôn 2- Sơn Diệm -Hương Sơn - Hà Tĩnh', '111111111111', '<p>sadasdasd</p>', '2022-11-24', 3, '2022-11-19 08:31:10', '2022-11-19 08:36:42', 1, 9, 0),
(48, 'Nguyễn Thùy Trinh', '1999-09-12', 2, '235688544', 'trinhnt@gmail.com', 'Hà Nội', '235684597', '', '2022-10-15', 0, '2022-11-19 08:51:26', '2022-11-19 08:51:26', 0, NULL, 0),
(49, 'Nguyễn Thùy Thủy', '1989-09-12', 2, '285688544', 'thuynt@gmail.com', 'Hà Nội', '235684597', '', '2022-10-15', 0, '2022-11-19 08:51:26', '2022-11-19 08:51:26', 0, NULL, 0),
(50, 'Nguyễn Thùy Trinh', '1999-09-12', 1, '0989581168', 'huehlu0708@gmail.com', 'Hà Nội', '235684597', '<p>dasdasdasdsad</p>', '2022-11-25', 1, '2022-11-19 08:53:09', '2022-11-19 08:53:09', 2, NULL, 1);

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
(2, 2, 1),
(3, 3, 5),
(4, 4, 4),
(5, 4, 8),
(6, 5, 4),
(7, 5, 8),
(8, 6, 4),
(9, 8, 4),
(10, 21, 5),
(11, 22, 2),
(12, 23, 8),
(13, 44, 5),
(14, 47, 2),
(15, 48, 1),
(16, 49, 1);

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
(1, 'Ms. Luella Senger', '48649821', 0, 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59', NULL, NULL),
(2, 'Natalia Price Jr.', '67873990', 0, 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59', NULL, NULL),
(4, 'Chăm sóc răng', '43996801', 0, 1, '2022-10-16 00:27:59', '2022-10-16 01:04:56', '', NULL),
(5, 'Niềng răng', '14706006', 0, 1, '2022-10-16 00:27:59', '2022-10-16 01:05:33', '', NULL),
(8, 'Abraham Schinner', '4445990', 0, 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59', NULL, NULL),
(9, 'Mr. Cary Zulauf V', '66879190', 0, 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59', NULL, NULL),
(13, 'Albertha Jenkins', '28211677', 0, 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59', NULL, NULL);

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
(1, 'Abigayle Dooley', 'Voluptatem sed alias nulla. Repellat repudiandae voluptatibus accusamus alias labore ab eaque. Adipisci sit ipsa in fugiat non numquam.', 'Corrupti odio possimus porro laborum. Qui et qui deserunt id ut ipsam. Eos quisquam aliquam neque dignissimos atque. Quae voluptatem fuga ut dolorem.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(2, 'Arely Weissnat', 'Reiciendis laboriosam maxime ut architecto facilis. Distinctio adipisci officia sunt fuga. Mollitia sit omnis et laudantium reprehenderit laudantium.', 'Iure natus facilis eveniet tempore aperiam inventore. Ex dolor sit mollitia ipsum voluptas optio est. Nesciunt vel asperiores earum quia ut. Praesentium sequi doloribus dicta fugit non in id.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(3, 'Faustino Ledner DVM', 'Non beatae odit sit maxime. Sit dolores et saepe esse consequatur alias quam. Nulla iure ut veniam non dignissimos consequuntur commodi. Ut voluptatem sed tempore molestiae et quo est suscipit.', 'Commodi nisi id qui asperiores et aperiam nihil. Est dolorem veritatis vero quis fugiat quis. Porro natus enim voluptatem illo consequatur. Velit sed sed exercitationem architecto.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(4, 'Marcus Kuhic', 'Sint voluptatem ullam velit repudiandae aut ut laboriosam. Ipsam nesciunt itaque ut harum rerum optio ut provident. Praesentium et voluptates sint nihil ut perferendis sint voluptatum.', 'Occaecati illum vel id aliquam recusandae pariatur voluptatem. Excepturi ea autem tenetur quia aperiam.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(5, 'Lina Auer DVM', 'Explicabo nisi aliquid quia consequuntur ducimus. Veniam aliquam totam numquam. Consequatur sapiente assumenda ea reprehenderit est at non.', 'Culpa et eveniet ad eius accusamus laborum iste. Ad aliquam cupiditate quia tempora non iure et. Commodi odio quam nesciunt atque at accusamus. Aut quas atque qui id exercitationem.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(6, 'Delores Nader', 'Et ea suscipit quam et. Ut alias eveniet veniam repudiandae velit. Qui maiores temporibus rerum omnis ducimus est. Sed placeat totam et voluptatem.', 'Qui laborum reprehenderit voluptatum odio ut ut. Perferendis eum reprehenderit ipsam officiis nobis.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(7, 'Prof. Saul O\'Connell MD', 'Qui vero consequatur quia fugit ut. Voluptatem at eveniet doloremque perspiciatis dolore laborum. Quo quod omnis minima voluptatem.', 'Officiis itaque quibusdam ratione nobis nihil. Autem porro ut adipisci error non illo labore nemo. Accusamus aut facere quis quo et.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(8, 'Mrs. Lura O\'Kon', 'Ab est excepturi sint sit. Cum aspernatur tempora illum est consectetur et. Culpa est qui architecto omnis dolore voluptatem sit ab.', 'Vitae dolorum nisi minus rerum. Magnam fugit error aut eos excepturi. Non earum voluptatem et sapiente atque sapiente ut. Ut dolorem maiores eum aut at ab praesentium nostrum.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(9, 'Grayson Ondricka', 'Et tempora eum molestiae minima. Vel sed autem illo provident consequatur illo ad. Numquam aut error quidem necessitatibus aut ducimus sunt. Sed in deserunt sapiente ut molestiae omnis inventore.', 'Vel qui occaecati quaerat qui voluptas. Ex sint non accusamus quis consequuntur expedita. Aut reiciendis beatae saepe. Voluptatem reprehenderit aut minus provident qui totam facilis.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59'),
(10, 'Dr. Coralie Schneider DVM', 'Ut necessitatibus qui deserunt enim est ut asperiores. Totam iure et laudantium et vitae ipsa. Nisi distinctio exercitationem vel itaque voluptates. Repellat voluptatem omnis rerum ea ea.', 'Reiciendis consequatur sit et. Ea nostrum ratione voluptatum et quaerat laudantium fugit sit. Aut suscipit voluptas in blanditiis fugiat. Necessitatibus ut alias consequatur facere neque.', 1, '2022-10-16 00:27:59', '2022-10-16 00:27:59');

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
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `notice_admins`
--
ALTER TABLE `notice_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `patient_doctors`
--
ALTER TABLE `patient_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `patient_products`
--
ALTER TABLE `patient_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `patient_services`
--
ALTER TABLE `patient_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `permission_roles`
--
ALTER TABLE `permission_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `schedule_services`
--
ALTER TABLE `schedule_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
