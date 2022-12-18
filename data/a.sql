-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2022 lúc 12:45 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datncc`
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
(1, 'admin@gmail.com', 'Admin nghĩa', '1970-01-01', '0246879135', NULL, NULL, NULL, NULL, '$2y$10$rGIvA.Ga.FFU4op9fqijQe.eeB1yrMghcwFNxhfuSoVPcKwE7k93e', 1, 1, 1, 1, '2022-10-19 00:38:43', '2022-11-28 21:52:47', 'assets/img/profile-photos/Profile-Icon.png'),
(3, 'scsd@gmail.com', 'Huỳnh Hà Thúy Hằng', NULL, '0398861434', 'Dược Hạ -Tiên Dược - Sóc Sơn - Hà Nội', NULL, NULL, NULL, '$2y$10$6yanh2N71/r/Q3p6EE870e9Mhzf85ytTB/d28GmLFQtO6.DkInfRW', 1, 2, 2, 7, '2022-10-25 07:28:51', '2022-10-25 07:28:51', 'assets/img/profile-photos/Profile-Icon.png'),
(4, 'anhg@gmail.com', 'Trần Chí Oai', '2022-10-16', '0398861232', 'Dược Hạ -Tiên Dược - Sóc Sơn - Hà Nội', NULL, NULL, NULL, '$2y$10$jdz9cyYaQYHG0FhvQp30D.avLWO4n8TtZ2nY8qzBYksO1FAtEXjNW', 1, 4, 3, 9, '2022-10-25 07:30:17', '2022-10-25 07:30:17', 'assets/img/profile-photos/Profile-Icon.png'),
(5, 'tuan@gmail.com', 'Lê Thị Thuỳ Dung', '2022-10-29', '0398864444', 'Dược Hạ -Tiên Dược - Sóc Sơn - Hà Nội', NULL, NULL, NULL, '$2y$10$Fa9NRS7Ke4IeAtpHnppZ..FtK8CXXdIIZj39LOvTaJIU7FezheOaK', 1, 6, 4, 1, '2022-10-25 07:31:04', '2022-12-02 01:17:31', 'uploads/admin/admin_ypcv4mAdZNcplq2WR6f8hCwkgqAP7czvZdQDMNUs.png'),
(6, 'trang@gmail.com', 'Phùng Thi Trang', '2022-10-21', '0398860000', 'Dược Hạ -Tiên Dược - Sóc Sơn - Hà Nội', NULL, NULL, NULL, '$2y$10$ElEETlWxQ31tf03OcMcrtevYmftPD.TSSUJ3dgQqHm3GWh3Q8/2la', 1, 9, 4, 7, '2022-10-25 07:32:19', '2022-12-02 01:16:45', 'uploads/admin/admin_767izDmk2v1gNqO70bxbREXeST9PCQQ7xEL5NvIj.png'),
(7, 'nghia@gmail.com', 'Trương Đức Nghĩa', '1970-01-01', '0372559460', 'Phú Thọ', NULL, NULL, NULL, '$2y$10$lZL.q7LmuA6UVD7T0ofNSeJ3/gZbAVkMp8lUkrxDyJrAfP10SHTju', 1, 5, 4, 1, '2022-12-01 00:34:34', '2022-12-01 00:34:34', 'uploads/admin/admin_6TLCOTYulQTCMfH153LSz1YqsGTAdfgzbnJ73s4K.png');

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

--
-- Đang đổ dữ liệu cho bảng `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `price`, `image`, `size`, `short_desc`, `created_at`, `updated_at`) VALUES
(1, 'Máy chụp X-quang răng Conebeam', '2190000', 'uploads/equipments/Máy chụp X-quang răng Conebeam_5TLUTPOIPzFDbHWb28t3NFAxNfmp9tsWyNsnlxRk.png', '1', 'Máy chụp X-quang răng 3D chụp phim toàn cảnh cho hình ảnh không gian 3 chiều giúp bác sĩ quan sát được các cấu trúc răng và xương hàm. \\n Ảnh X-quang chụp bằng hệ thống Conebeam thấy rõ được sự tương quan giữa răng và các cấu trúc quanh răng như dây thần kinh, xoang hàm.Đây là thiết bị nha khoa hiện đại ứng dụng trong hầu hết các dịch vụ tại Nha khoa Trẻ. Bác sĩ sẽ kiểm tra sang thương sâu bên trong răng ở tình trạng sâu răng viêm tủy, hỗ trợ xác định vị trí mức độ phức tạp của răng khôn, xác định cấu trúc răng và xương hàm để lên kế hoạch niềng răng, hỗ trợ cấy ghép Implant.', '2022-10-20 06:59:15', '2022-10-20 06:59:45'),
(2, 'Máy scan răng Irero', '2190000', '', 'sdc', 'Một trong những thiết bị nha khoa hiện đại mà không phải nha khoa nào cũng có được sử dụng tại Nha khoa Trẻ là máy Scan răng Itero. Sử dụng Itero trong chỉnh nha sẽ giúp lấy dấu răng nhanh chóng, chính xác, xem trước được kết quả niềng răng thông qua một ứng dụng lên kết với máy là “Clincheck”. Việc scan mẫu hàm chính xác sẽ giúp bác sĩ thiết kế khay niềng đạt độ chính xác cao, thiết kế các giải pháp điều trị, dự đoán kết quả điều trị đạt hiệu quả cao.', '2022-10-20 07:00:57', '2022-10-20 07:00:57'),
(3, 'Máy lấy cao răng siêu âm', '2190000', 'uploads/equipments/Máy lấy cao răng siêu âm_zR47ZqBAJeINdIToVRqVC8l1QpJvnBkuenvl3ai5.jpg', '1', 'Thiết bị nha khoa cơ bản không thể thiếu tại các nha khoa là máy lấy cao răng. Hiện nay, dòng máy lấy cao răng siêu âm giúp bệnh nhân loại bỏ được nỗi lo đau nhức, ê buốt răng sau điều trị. Thiết bị này loại bỏ được vôi răng hiệu quả nhất, mảng bám và cao răng trên bề mặt răng, kẽ răng và dưới nướu nhờ vào đầu siêu âm cực nhỏ, kết hợp với độ rung và tia phun nước nhỏ để làm sạch mọi ngóc ngách của răng.', '2022-10-20 07:01:50', '2022-10-20 07:01:50'),
(4, 'Máy tẩy trắng răng Laser Whitening', '2190000', '', '1', 'Tẩy trắng răng Laser Whitening thực hiện điều trị trong 60 phút là bạn đã sở hữu hàm răng trắng răng mà lại hoàn toàn không tổn hại gì đến men răng cũng như sức khỏe răng miệng. Khác với các thiết bị nha khoa tẩy trắng răng trước đó thì đây là phương pháp được khuyên dùng, tẩy trắng răng Laser có bổ sung fluor kết hợp với bước sóng Laser sẽ thâm nhập vào sâu bên trong men răng, từ đó làm trắng răng một cách vượt trội và kết quả duy trì lâu dài.', '2022-10-20 07:10:40', '2022-10-20 07:10:40'),
(5, 'Máy cắt răng Bien Air', '2190000', '', '1', 'Nhổ răng khôn không đau cũng cần đến sự hỗ trợ của máy cắt răng Bien Air. Lưỡi cắt răng được thiết kế một cách thông minh, khác hẳn với lưỡi dao cắt tiểu phẫu thông thường. Nhổ răng bằng máy cắt răng Bien Air không sử dụng nhiều tác động cơ học từ tay của các bác sĩ mà dựa vào lực tác động giúp chia cắt thân răng một cách nhanh chóng, dễ dàng và chính xác. Máy Bien Air được thiết kế và kiểm soát bằng hệ thống máy vi tính đi kèm, nhờ đó quá trình gây tê hay lượng thuốc tê sử dụng sẽ được kiểm soát một cách chính xác, chặt chẽ nhất. Với thiết bị nha khoa hiện đại sẽ giúp quá trình điều trị của bạn tại nha khoa diễn ra suôn sẻ và thuận lợi. Đồng thời các bác sĩ cần có chuyên môn cao, giàu kinh nghiệm để ứng dụng linh hoạt và hiệu quả các thiết bị nha khoa thì mới giúp khách hàng đạt kết quả tốt nhất. Đảm bảo được đầy đủ các yếu tố này nên Nha khoa Trẻ luôn được khách hàng tin tưởng và yên tâm giao phó nụ cười của mình. Nếu bạn cần tư vấn hoặc thăm khám bất kỳ một dịch vụ nào của Nha khoa Trẻ thì bạn có thể liên hệ trực tiếp với chúng tôi để được bác sĩ giàu kinh nghiệm hỗ trợ nhanh chóng.', '2022-10-20 07:11:22', '2022-10-20 07:11:22'),
(6, 'Máy nhổ răng siêu âm Piezotome', '2190000', 'uploads/equipments/Máy nhổ răng siêu âm Piezotome_tZh9ehw4epiUqmwobqIX0gr6v8e64NAKF9AF5Rnb.jpg', '1', 'Thiết bị nha khoa ứng dụng trong dịch vụ nhổ răng khôn không đau tại Nha khoa Trẻ là máy siêu âm Piezotome. Các trường hợp răng khôn mọc lệch, mọc ngầm hay các trường hợp răng khôn phức tạp hơn nữa thì việc ứng dụng các thiết bị nha khoa hiện đại là rất cần thiết để đảm bảo an toàn, tránh biến chứng không mong muốn và giúp bệnh nhân không đau nhức nhiều khi nhổ răng. Máy Piezotome sử dụng chuyển động linh hoạt với tần số chọn lọc từ 28-36 KHz, chỉ tác động lên các mô cứng, hạn chế tối đa việc tác động đến mô mềm. Đồng thời giúp tái tạo tế bào mới một cách tối ưu, giảm bớt những cơn đau sau điều trị, làm lành vết thương tốt hơn.', '2022-10-20 07:11:53', '2022-10-20 07:11:53');

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

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `customer_name`, `customer_email`, `customer_avatar`, `content`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Trương Nghĩa', 'nghia@gmail.com', 'uploads/feedbacks/feedback_VaG8h4k16FDiAT5di7ekhcQNXLQEQsDNaUAsp5bV.png', 'Làm xong cũng chẳng đau gì chỉ thấy đẹp thôi, mình tự tin hát và trước ống kính lắm rồi.', 1, '2022-10-25 21:11:46', '2022-10-25 21:13:39'),
(2, 'Hoàng Phi Huyền', 'Huyen@gmail.com', 'uploads/feedbacks/feedback_lBJpXlncujBOxD1sSTb7cEj9Hl3co4RG3VPllcpz.png', 'Răng của Huyền trước đây khá đều, tuy nhiên lại không được trắng sáng. Dù không tự ti nhưng là 1 Boss của hệ thống hơn 1000 người thì hình ảnh nụ cười rạng rỡ chính là yếu tố khiến Huyền luôn được yêu mến và tin tưởng.', 1, '2022-10-25 21:16:54', '2022-10-25 21:16:54'),
(3, 'Trà Giang', 'Giang@gmail.com', 'uploads/feedbacks/feedback_BP9QgnMzJnR8oGM8bzVCAMR6bKgxuecbSHtVdEf4.png', 'Răng của Giang trước đây gặp rất nhiều vấn đề, răng khấp khểnh, cười hở lợi và không được trắng sáng.', 1, '2022-10-25 21:17:48', '2022-10-25 21:18:11'),
(4, 'Nguyễn Quyên', 'quyen@gmail.com', 'uploads/feedbacks/feedback_FZhbXR3mjYavjfVstn89GMKeBfUTIN2p6D0jLAZC.png', 'Bây giờ mình luôn tự tin , thoải mái mỗi khi cười và nhận được rất nhiều lời khen từ bạn bè và đối tác.', 1, '2022-10-25 21:18:48', '2022-10-25 21:19:43'),
(5, 'PÔNG CHUẨN', 'chuan@gmail.com', 'uploads/feedbacks/feedback_KksMtPJ89bMQQ0LMUORvPGKV3AHMCmkmeiQYRQiz.png', 'Ai cũng khen răng mình đẹp, đi làm gặp nhiều anh chị nghệ sĩ đã làm răng rồi mà mọi người vẫn hỏi mình làm răng ở đâu, Mình cảm ơn Win Smile rất nhiều.', 1, '2022-10-25 21:20:17', '2022-10-25 21:20:44'),
(6, 'Đức Bo', 'bo@gmail.com', 'assets/img/profile-photos/no-image.png', 'great', 0, '2022-10-26 00:55:59', '2022-10-26 01:06:38'),
(7, 'nghĩa Trần', 'tran@gmail.com', 'assets/img/profile-photos/no-image.png', 'như cácx', 0, '2022-10-26 01:04:24', '2022-10-26 01:04:24'),
(10, 'Trần Tuấn', 'tuan@gmail.com', 'assets/img/profile-photos/no-image.png', 'Nha Khoa Đức Nghĩa Tuyệt Con Mẹ Nó Vời !', 0, '2022-10-26 01:28:23', '2022-10-26 01:28:23'),
(11, 'nghia', 'nghia@gmail.com', 'assets/img/profile-photos/no-image.png', 'great', 0, '2022-10-26 07:27:44', '2022-10-26 07:27:44'),
(12, 'ngg', 'nghia@gmail.com', 'assets/img/profile-photos/no-image.png', 'ajakjdaksdsak', 0, '2022-10-26 07:54:44', '2022-10-26 07:54:44');

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
(1, 'Giám đốc', '2022-10-19 00:38:31', '2022-10-25 07:20:43', '<p>Ut officia provident esse. Dolor tempora est et molestiae eveniet harum incidunt consectetur. Distinctio sint et et tempora qui quam.</p>'),
(2, 'Phó giám đóc', '2022-10-19 00:38:31', '2022-10-25 07:20:55', '<p>Provident in nobis iusto dignissimos sed. Minima quasi tempore optio et in ab. Provident ut soluta similique facere.</p>'),
(3, 'Giáo sư', '2022-10-19 00:38:31', '2022-10-25 07:21:44', '<p>Perspiciatis qui ut deleniti impedit. Enim rem placeat aut maiores. Non est eum consequatur molestiae. Aspernatur saepe voluptas saepe ut voluptas maxime facere.</p>'),
(4, 'Thạc sĩ', '2022-10-19 00:38:31', '2022-10-25 07:21:54', '<p>Qui neque impedit et ea et facilis ullam. Quae sed numquam tenetur voluptatem. Est eos qui quia nostrum sunt corrupti eos. Numquam assumenda nemo dolore ut.</p>'),
(5, 'Tiến sĩ', '2022-10-19 00:38:31', '2022-10-25 07:22:10', '<p>Delectus quam dolorem vitae illo non. Enim voluptatem adipisci modi consequatur sint fuga culpa saepe. Voluptatem quod provident in eum ullam minima qui fugit. Culpa voluptatem in doloribus.</p>'),
(6, 'Alvena McDermott', '2022-10-19 00:38:32', '2022-10-19 00:38:32', 'Et quos eaque iusto ad. Ipsum ipsum quos voluptatem autem doloribus voluptatem. Consequuntur modi ipsum quos est ea qui rerum.');

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
(43, '2022_10_25_141317_add_details_to_service_table', 4),
(44, '2022_11_01_153544_add_token_to_patients_table', 5);

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
(1, 'Tooth extraction aftercare: A how-to guide', NULL, '<p>A dentist or dental surgeon will perform the extraction in their clinic and then give the person some instructions for caring for the area as it heals.</p>\r\n\r\n<p>During the appointment, the dental surgeon will inject a strong anesthetic into the area around the tooth to prevent the person from feeling any pain. They will then use a series of instruments to loosen the tooth before pulling it out.</p>\r\n\r\n<p>After removing the tooth, they will place gauze over the extraction site to help control bleeding and promote clotting.</p>\r\n\r\n<p>Learn more about tooth extraction aftercare in this article. We also provide a general healing timeline and explain when to speak to a dentist.</p>\r\n\r\n<h3>Aftercare</h3>\r\n\r\n<p>Aftercare for an extracted tooth can vary slightly depending on a few factors.</p>\r\n\r\n<p>These include which tooth the dentist took out, as some teeth have deeper roots than others and take longer to heal. However, most people find that pain decreases after about 3 days.</p>\r\n\r\n<p>One of the most important aspects of aftercare is maintaining the blood clot that forms in the socket where the tooth used to be.</p>\r\n\r\n<p>Caring for this blood clot is key to the healing process, and it helps prevent painful complications, such as dry socket.</p>\r\n\r\n<p><img alt=\"\" sizes=\"(max-width: 2500px) 100vw, 2500px\" src=\"http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline-640x427.jpg\" srcset=\"http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline-640x427.jpg 640w, http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline-1280x853.jpg 1280w, http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline-768x512.jpg 768w, http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline-1536x1024.jpg 1536w, http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline-320x213.jpg 320w, http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline-600x400.jpg 600w, http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/timeline.jpg 1920w\" width=\"2500\" /></p>\r\n\r\n<p>Days 1&ndash;2</p>\r\n\r\n<p>Much of the aftercare in the first couple of days following an extraction focuses on allowing a blood clot to form and caring for the mouth in general.</p>\r\n\r\n<p>As some experts note, low level bleeding for up to 24 hours after an extraction is perfectly normal. However, active bleeding after this point requires treatment.</p>\r\n\r\n<p>Here are a few additional tips for the first 2 days of aftercare:</p>\r\n\r\n<ul>\r\n	<li><strong>Get plenty of rest:</strong>&nbsp;Expect to be resting for at least the first 24 hours after the extraction.</li>\r\n	<li><strong>Change the gauze as necessary:</strong>&nbsp;It is important to leave the first gauze in the mouth for at least a few hours to allow the clot to form. After this, it is fine to change the gauze as often as necessary.</li>\r\n	<li><strong>Avoid rinsing:</strong>&nbsp;As tempting as it can be, avoid rinsing, swishing, or gargling anything in the mouth while the area is still clotting. These actions may dislodge any clot that is forming and affect the healing time.</li>\r\n	<li><strong>Do not use straws:</strong>&nbsp;Using a straw places a lot of pressure on the healing wound, which can easily dislodge the blood clot.</li>\r\n	<li><strong>Do not spit:</strong>&nbsp;Spitting also creates pressure in the mouth, which may dislodge the blood clot.</li>\r\n	<li><strong>Avoid blowing the nose or sneezing:</strong>&nbsp;If the surgeon removed a tooth from the upper half of the mouth, blowing the nose or sneezing can create pressure in the head that may dislodge the developing blood clot. Avoid blowing the nose and sneezing if possible.</li>\r\n	<li><strong>Do not smoke:</strong>&nbsp;Smoking creates the same pressure in the mouth as using a straw. While it is best to avoid smoking during the entire healing process, it is crucial not to smoke during the first couple of days as the blood clot forms.</li>\r\n	<li><strong>Take pain relievers:</strong>&nbsp;Over-the-counter pain relievers may help reduce pain and inflammation.</li>\r\n	<li><strong>Use cold compresses:</strong>&nbsp;Placing an ice pack or a towel-wrapped bag of ice on the area for 10&ndash;20 minutes at a time may help dull pain.</li>\r\n	<li><strong>Elevate the head:</strong>&nbsp;When sleeping, use extra pillows to elevate the head. Lying too flat may allow blood to pool in the head and prolong healing time.</li>\r\n	<li><strong>Take any medications that the dentist recommends:</strong>&nbsp;The dental surgeon may order prescription medications for complex removals. It is important to complete the full course of treatment.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/01/featured_image_shop-640x367.jpg\" width=\"2500\" /></p>\r\n\r\n<p>Days 3&ndash;10</p>\r\n\r\n<p>After the clot has formed, it is vital to keep it securely in place and to follow some extra steps for oral hygiene to help prevent other issues.</p>\r\n\r\n<p>Tips for aftercare between the third and 10th day include:</p>\r\n\r\n<ul>\r\n	<li><strong>Saline rinses:</strong>&nbsp;When the clot is securely in place, gently rinse the mouth with a warm saline solution or a pinch of salt in warm water. This mixture helps kill bacteria in the mouth, which may prevent infections as the mouth heals.</li>\r\n	<li><strong>Brush and floss as usual:</strong>&nbsp;Brush and floss the teeth as usual, but take care to avoid the extracted tooth altogether. The saline solution and any medicated mouthwash that a dentist recommends should be enough to clean this area.</li>\r\n	<li><strong>Eat soft foods:</strong>&nbsp;Throughout the entire healing process, people should eat soft foods that do not require a lot of chewing and are unlikely to become trapped in the empty socket. Consider sticking to soups, yogurt, applesauce, and similar foods. Avoid hard toast, chips, and foods containing seeds.</li>\r\n</ul>\r\n\r\n<p>Aftercare for multiple teeth</p>\r\n\r\n<p>Sometimes, dental surgeons will need to extract more than one tooth at a time. When extracting multiple teeth, the surgeon is more likely to recommend general anesthesia instead of using a local anesthetic.</p>\r\n\r\n<p>The person will, therefore, be unconscious throughout the process. The dentist will also give them some special instructions leading up to the extraction, such as avoiding food for a certain time. After the procedure, the person will need someone else to drive them home.</p>\r\n\r\n<p>Caring for multiple extractions can be challenging, especially if they are on different sides of the mouth. Dentists may have specific instructions for these cases, and they may request a follow-up appointment shortly after the extraction.</p>\r\n\r\n<p>They may also use clotting aids in the extraction sites. These are small pieces of natural material that helps clotting. The body breaks the clotting aids down safely and absorbs them over time.</p>', 1, '', '2022-10-19 00:43:38', '2022-10-19 00:43:38'),
(2, 'The unexpected dangers of gum disease', NULL, '<p><img alt=\"\" src=\"http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/smile-1280x854.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/single-service-2-1280x854.jpg\" /></p>\r\n\r\n<p><img alt=\"background_career\" src=\"http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/background_career-1280x853.jpg\" /></p>\r\n\r\n<p><img alt=\"about_us_background\" src=\"http://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/02/about_us_background-1280x853.jpg\" /></p>\r\n\r\n<p>Gum disease is common and unpleasant, but, according to a growing body of evidence, it could also play a role in a surprising range of seemingly unrelated health problems. Cleaning your teeth may be even more important than you thought. Plaque &mdash; a sticky substance that contains bacteria &mdash; builds up on teeth. If it is not brushed away, the bacteria can irritate the gums.</p>\r\n\r\n<p>The gums may then become swollen, sore, or infected; this is referred to as gingivitis. In general, gum disease can be treated or prevented by maintaining a good oral health regime. However, if it is left to develop, it can result in periodontitis, which weakens the supporting structures of the teeth.</p>\r\n\r\n<p>Gum disease, which is also called periodontal disease, is widespread. According to the Centers for Disease Control and Prevention (CDC), almost half of adults in the United States have some degree of gum disease.</p>\r\n\r\n<p>The mechanisms behind periodontal disease are relatively well-understood, and newer research shows that this health problem may play a role in the development of a number of other conditions, including Alzheimer&rsquo;s disease, cancer, and respiratory disease. In this Spotlight, we will cover some of the surprising links between gum disease and disparate health issues.</p>\r\n\r\n<h3>Gums and the brain</h3>\r\n\r\n<p>Although spatially the gums are near the brain, one wouldn&rsquo;t normally associate dental complaints with neurological conditions.</p>\r\n\r\n<p>However, some studies have found a link between periodontal disease and tooth loss and cognitive function. One study looking at cognitive performance followed 597 men for up to 32 years. The authors conclude:</p>\r\n\r\n<blockquote>\r\n<p>Risk of cognitive decline in older men increases as more teeth are lost. Periodontal disease and caries, major reasons for tooth loss, are also related to cognitive decline.</p>\r\n</blockquote>\r\n\r\n<p>Researchers have also linked periodontal disease with an increased buildup of beta-amyloid in the brain &mdash; the neurological hallmark of Alzheimer&rsquo;s.</p>\r\n\r\n<p>Other experiments have produced evidence that one type of bacteria commonly found in cases of periodontitis &mdash; Porphyromonas gingivalis &mdash; can be found in the brains of individuals with Alzheimer&rsquo;s.</p>\r\n\r\n<p>Following on from that discovery, in a more recent study, researchers showed that P. gingivalis infection boosts the production of beta-amyloid in the brain.</p>\r\n\r\n<blockquote>\r\n<p>Periodontal disease was associated with a small, but significant, increase in overall cancer risk.</p>\r\n</blockquote>\r\n\r\n<p>In this study, the researchers paid particular attention to an enzyme produced by P. gingivalis called gingipain. They found that this protease was toxic to tau, another protein that plays a pivotal role in Alzheimer&rsquo;s.</p>\r\n\r\n<p>It is worth noting that other researchers have concluded that beta-amyloid is produced in response to a pathogen. The way we view Alzheimer&rsquo;s is slowly changing.</p>\r\n\r\n<p>In the future, scientists hope that targeting gingipain enzymes might help stop neurodegeneration in some people with Alzheimer&rsquo;s disease. They have already designed a gingipain inhibitor, which they are testing in humans.</p>', 1, '', '2022-10-19 00:44:42', '2022-10-19 00:44:42'),
(3, 'ajdbkjasd', NULL, '<p>A dentist or dental surgeon will perform the extraction in their clinic and then give the person some instructions for caring for the area as it heals.</p>\r\n\r\n<p>During the appointment, the dental surgeon will inject a strong anesthetic into the area around the tooth to prevent the person from feeling any pain. They will then use a series of instruments to loosen the tooth before pulling it out.</p>\r\n\r\n<p>After removing the tooth, they will place gauze over the extraction site to help control bleeding and promote clotting.</p>\r\n\r\n<p>Learn more about tooth extraction aftercare in this article. We also provide a general healing timeline and explain when to speak to a dentist.</p>\r\n\r\n<h3>Aftercare</h3>\r\n\r\n<p>Aftercare for an extracted tooth can vary slightly depending on a few factors.</p>\r\n\r\n<p>These include which tooth the dentist took out, as some teeth have deeper roots than others and take longer to heal. However, most people find that pain decreases after about 3 days.</p>\r\n\r\n<p>One of the most important aspects of aftercare is maintaining the blood clot that forms in the socket where the tooth used to be.</p>\r\n\r\n<p>Caring for this blood clot is key to the healing process, and it helps prevent painful complications, such as dry socket.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/e9711aad-c591-4103-b7e2-f96bbde1a440\" width=\"2731\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Days 1&ndash;2</p>\r\n\r\n<p>Much of the aftercare in the first couple of days following an extraction focuses on allowing a blood clot to form and caring for the mouth in general.</p>\r\n\r\n<p>As some experts note, low level bleeding for up to 24 hours after an extraction is perfectly normal. However, active bleeding after this point requires treatment.</p>\r\n\r\n<p>Here are a few additional tips for the first 2 days of aftercare:</p>\r\n\r\n<ul>\r\n	<li><strong>Get plenty of rest:</strong>&nbsp;Expect to be resting for at least the first 24 hours after the extraction.</li>\r\n	<li><strong>Change the gauze as necessary:</strong>&nbsp;It is important to leave the first gauze in the mouth for at least a few hours to allow the clot to form. After this, it is fine to change the gauze as often as necessary.</li>\r\n	<li><strong>Avoid rinsing:</strong>&nbsp;As tempting as it can be, avoid rinsing, swishing, or gargling anything in the mouth while the area is still clotting. These actions may dislodge any clot that is forming and affect the healing time.</li>\r\n	<li><strong>Do not use straws:</strong>&nbsp;Using a straw places a lot of pressure on the healing wound, which can easily dislodge the blood clot.</li>\r\n	<li><strong>Do not spit:</strong>&nbsp;Spitting also creates pressure in the mouth, which may dislodge the blood clot.</li>\r\n	<li><strong>Avoid blowing the nose or sneezing:</strong>&nbsp;If the surgeon removed a tooth from the upper half of the mouth, blowing the nose or sneezing can create pressure in the head that may dislodge the developing blood clot. Avoid blowing the nose and sneezing if possible.</li>\r\n	<li><strong>Do not smoke:</strong>&nbsp;Smoking creates the same pressure in the mouth as using a straw. While it is best to avoid smoking during the entire healing process, it is crucial not to smoke during the first couple of days as the blood clot forms.</li>\r\n	<li><strong>Take pain relievers:</strong>&nbsp;Over-the-counter pain relievers may help reduce pain and inflammation.</li>\r\n	<li><strong>Use cold compresses:</strong>&nbsp;Placing an ice pack or a towel-wrapped bag of ice on the area for 10&ndash;20 minutes at a time may help dull pain.</li>\r\n	<li><strong>Elevate the head:</strong>&nbsp;When sleeping, use extra pillows to elevate the head. Lying too flat may allow blood to pool in the head and prolong healing time.</li>\r\n	<li><strong>Take any medications that the dentist recommends:</strong>&nbsp;The dental surgeon may order prescription medications for complex removals. It is important to complete the full course of treatment.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://denticare.bold-themes.com/allen/wp-content/uploads/sites/16/2020/01/featured_image_shop-640x367.jpg\" width=\"2500\" /></p>\r\n\r\n<p>Days 3&ndash;10</p>\r\n\r\n<p>After the clot has formed, it is vital to keep it securely in place and to follow some extra steps for oral hygiene to help prevent other issues.</p>\r\n\r\n<p>Tips for aftercare between the third and 10th day include:</p>\r\n\r\n<ul>\r\n	<li><strong>Saline rinses:</strong>&nbsp;When the clot is securely in place, gently rinse the mouth with a warm saline solution or a pinch of salt in warm water. This mixture helps kill bacteria in the mouth, which may prevent infections as the mouth heals.</li>\r\n	<li><strong>Brush and floss as usual:</strong>&nbsp;Brush and floss the teeth as usual, but take care to avoid the extracted tooth altogether. The saline solution and any medicated mouthwash that a dentist recommends should be enough to clean this area.</li>\r\n	<li><strong>Eat soft foods:</strong>&nbsp;Throughout the entire healing process, people should eat soft foods that do not require a lot of chewing and are unlikely to become trapped in the empty socket. Consider sticking to soups, yogurt, applesauce, and similar foods. Avoid hard toast, chips, and foods containing seeds.</li>\r\n</ul>\r\n\r\n<p>Aftercare for multiple teeth</p>\r\n\r\n<p>Sometimes, dental surgeons will need to extract more than one tooth at a time. When extracting multiple teeth, the surgeon is more likely to recommend general anesthesia instead of using a local anesthetic.</p>\r\n\r\n<p>The person will, therefore, be unconscious throughout the process. The dentist will also give them some special instructions leading up to the extraction, such as avoiding food for a certain time. After the procedure, the person will need someone else to drive them home.</p>\r\n\r\n<p>Caring for multiple extractions can be challenging, especially if they are on different sides of the mouth. Dentists may have specific instructions for these cases, and they may request a follow-up appointment shortly after the extraction.</p>\r\n\r\n<p>They may also use clotting aids in the extraction sites. These are small pieces of natural material that helps clotting. The body breaks the clotting aids down safely and absorbs them over time.</p>', 1, '', '2022-10-26 07:16:54', '2022-10-26 07:16:54'),
(4, 'test bjx', 6, '<h2><strong>Niềng răng trong suốt l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p><a href=\"https://nhakhoahanseoul.com/dich-vu/nieng-rang/\">Niềng răng</a>&nbsp;trong suốt (Transparent Braces) hay c&ograve;n được gọi l&agrave; niềng răng kh&ocirc;ng mắc c&agrave;i, niềng răng th&aacute;o lắp, niềng răng v&ocirc; h&igrave;nh l&agrave; phương ph&aacute;p chỉnh nha hiện đại nhất hiện nay.</p>\r\n\r\n<p>Niềng răng trong suốt kh&ocirc;ng sử dụng hệ thống mắc c&agrave;i, d&acirc;y cung quen thuộc như phương ph&aacute;p niềng răng truyền thống m&agrave; thay v&agrave;o đ&oacute;, bệnh nh&acirc;n sẽ sử dụng bộ khay niềng từ nhựa cao cấp, được thiết kế dựa tr&ecirc;n cấu tr&uacute;c răng của người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"Niềng răng trong suốt\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot.jpg\" srcset=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot.jpg 800w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot-300x242.jpg 300w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot-768x619.jpg 768w\" width=\"800\" /></p>\r\n\r\n<p><em>H&igrave;nh ảnh bệnh nh&acirc;n niềng răng trong suốt</em></p>\r\n\r\n<p>Kỹ thuật n&agrave;y gi&uacute;p điều chỉnh c&aacute;c răng mọc sai lệch về đ&uacute;ng vị tr&iacute; tr&ecirc;n khung h&agrave;m v&agrave; cải thiện c&aacute;c khuyết điểm như h&ocirc;, vẩu, m&oacute;m, sai khớp cắn,&hellip; Niềng răng trong suốt chỉ t&aacute;c động l&ecirc;n c&aacute;c răng cần nắn chỉnh v&agrave; kh&ocirc;ng t&aacute;c động l&ecirc;n to&agrave;n bộ cung h&agrave;m n&ecirc;n c&oacute; thể hạn chế được t&igrave;nh trạng đau đớn hơn so với c&aacute;c phương ph&aacute;p niềng răng kh&aacute;c.</p>\r\n\r\n<h2><strong>Ph&acirc;n loại niềng răng trong suốt</strong></h2>\r\n\r\n<p>C&ugrave;ng với sự ph&aacute;t triển của c&ocirc;ng nghệ v&agrave; nhằm đ&aacute;p ứng nhu cầu sử dụng ng&agrave;y c&agrave;ng cao của kh&aacute;ch h&agrave;ng, hiện nay tr&ecirc;n thị trường đ&atilde; xuất hiện rất nhiều loại niềng răng trong suốt trong đ&oacute; phổ biến nhất l&agrave; 4 loại:</p>\r\n\r\n<ul>\r\n	<li><strong><em>Niềng răng Invisalign:</em></strong>&nbsp;l&agrave; sản phẩm của tập đo&agrave;n Align Technology (ra đời từ năm 1997 v&agrave; hiện c&oacute; trụ sở ch&iacute;nh tại San Jose, California, Mỹ). Được sản xuất từ vật liệu độc quyền v&agrave; sản xuất trực tiếp từ Mỹ, đến nay, niềng răng Invisalign đ&atilde; trở th&agrave;nh phương ph&aacute;p niềng răng trong suốt đứng top 1 tr&ecirc;n thị trường. B&ecirc;n cạnh đ&oacute;, Invisalign c&ograve;n kh&ocirc;ng ngừng nghi&ecirc;n cứu c&aacute;c c&ocirc;ng nghệ mới nhằm cải tiến cho sản phẩm của m&igrave;nh, ti&ecirc;u biểu phải kể đến Clincheck &ndash; phần mềm dựng h&igrave;nh ảnh 3F cho ph&eacute;p xem trước kết quả v&agrave; qu&aacute; tr&igrave;nh thực hiện niềng răng.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Niềng răng trong suốt invisalign\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot-invisalign.jpg\" srcset=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot-invisalign.jpg 800w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot-invisalign-300x200.jpg 300w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-trong-suot-invisalign-768x512.jpg 768w\" width=\"800\" /></p>\r\n\r\n<ul>\r\n	<li><strong><em>Niềng răng 3D Clear Aligner:</em></strong>&nbsp;đ&acirc;y l&agrave; một sản phẩm của Việt Nam được sản xuất dựa tr&ecirc;n c&ocirc;ng nghệ của Đức. Khay niềng 3D Clear Aligner được l&agrave;m từ nhựa trong suốt v&agrave; được chế t&aacute;c thủ c&ocirc;ng. Sau khi lấy dấu h&agrave;m, c&aacute;c kỹ thuật vi&ecirc;n sẽ chế t&aacute;c khay niềng trực tiếp tr&ecirc;n mẫu dấu h&agrave;m thạch cao, v&igrave; thế phương ph&aacute;p đ&ograve;i hỏi b&aacute;c sĩ c&oacute; tay nghề cao v&agrave; sự kh&eacute;o l&eacute;o. V&igrave; được sản xuất tr&ecirc;n c&aacute;c mẫu h&agrave;m thạch cao n&ecirc;n độ ch&iacute;nh x&aacute;c sẽ k&eacute;m hơn khay niềng Invisalign.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Niềng răng Clear Aligner\" sizes=\"(max-width: 848px) 100vw, 848px\" src=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-clear-aligner.jpg\" srcset=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-clear-aligner.jpg 848w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-clear-aligner-300x221.jpg 300w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-clear-aligner-768x566.jpg 768w\" width=\"848\" /></p>\r\n\r\n<ul>\r\n	<li><strong><em>Niềng răng ClearCorrect:</em></strong>&nbsp;l&agrave; sản phẩm nổi tiếng của tập đo&agrave;n Straumann Group (được th&agrave;nh lập từ năm 2006 v&agrave; c&oacute; trụ sở ch&iacute;nh tại Round Rock, Texas, Mỹ). Hiện nay, Straumann Group được xem l&agrave; một trong những tập đo&agrave;n h&agrave;ng đầu về thiết bị y tế tr&ecirc;n thế giới. T&iacute;nh đến hiện tại, ClearCorrect c&oacute; số lượng kh&aacute;ch h&agrave;ng gần như tương đương với Invisalign của Align Technology.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Niềng răng ClearCorrect\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-ClearCorrect.jpg\" srcset=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-ClearCorrect.jpg 800w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-ClearCorrect-300x168.jpg 300w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Nieng-rang-ClearCorrect-768x431.jpg 768w\" width=\"800\" /></p>\r\n\r\n<h2><strong>Những ai n&ecirc;n niềng răng trong suốt?</strong></h2>\r\n\r\n<p>Phương ph&aacute;p niềng răng trong suốt c&oacute; thể khắc phục một số trường hợp c&oacute; khuyết điểm về răng như:</p>\r\n\r\n<ul>\r\n	<li><strong><em>Răng h&ocirc;, vẩu:</em></strong>&nbsp;t&igrave;nh trạng n&agrave;y thường do nguy&ecirc;n nh&acirc;n bẩm sinh v&agrave; g&acirc;y ra sự sai lệch khớp cắn khiến bệnh nh&acirc;n gặp kh&oacute; khăn trong ăn uống, giao tiếp, cần thực hiện điều trị sớm để c&oacute; hiệu quả tốt nhất.</li>\r\n	<li><strong><em>Răng mọc lệch lạc:</em></strong>&nbsp;đ&acirc;y l&agrave; t&igrave;nh trạng răng mọc lệch khỏi vị tr&iacute; đ&uacute;ng tr&ecirc;n cung h&agrave;m, mọc lộn xộn, chen ch&uacute;c hoặc thụt s&acirc;u v&agrave;o trong vừa g&acirc;y mất thẩm mỹ vừa khiến bệnh nh&acirc;n dễ mắc phải c&aacute;c bệnh l&yacute; về răng miệng.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Răng mọc lệch\" sizes=\"(max-width: 603px) 100vw, 603px\" src=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Rang-moc-lech.jpg\" srcset=\"https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Rang-moc-lech.jpg 603w, https://nhakhoahanseoul.com/wp-content/uploads/2022/11/Rang-moc-lech-300x289.jpg 300w\" width=\"603\" /></p>\r\n\r\n<p><em>H&igrave;nh ảnh c&aacute;c loại răng mọc lệch</em></p>\r\n\r\n<ul>\r\n	<li><strong><em>Răng m&oacute;m:</em></strong>&nbsp;đ&acirc;y l&agrave; t&igrave;nh trạng khớp cắn bị ngược, xương h&agrave;m b&ecirc;n dưới hướng ra ph&iacute;a trước nhiều hơn xương h&agrave;m b&ecirc;n tr&ecirc;n, ảnh hưởng đến việc ăn uống v&agrave; khiến h&agrave;m răng xấu hơn.</li>\r\n	<li><strong><em>Răng thưa:</em></strong>&nbsp;l&agrave; t&igrave;nh trạng giữa c&aacute;c răng xuất hiện khe hở lớn, thường thấy nhất ở răng cửa, c&oacute; thể do bẩm sinh hoặc do bị mất răng. Răng thưa c&oacute; thể cải thiện bằng nhiều c&aacute;ch kh&aacute;c nhau như: bọc sứ, tr&aacute;m răng nhưng niềng răng vẫn l&agrave; phương ph&aacute;p tốt nhất để duy tr&igrave; hiệu quả l&acirc;u d&agrave;i.</li>\r\n</ul>\r\n\r\n<p>Ngo&agrave;i ra, đối với những người c&oacute; y&ecirc;u cầu cao về thẩm mỹ hoặc c&aacute;c trường hợp bệnh nh&acirc;n bị dị ứng kim loại, kh&ocirc;ng thể sử dụng c&aacute;c loại kh&iacute; cụ kim loại để chỉnh nha, niềng răng trong suốt l&agrave; giải ph&aacute;p l&yacute; tưởng nhất hiện nay.</p>\r\n\r\n<h2><strong>Ưu v&agrave; nhược điểm của phương ph&aacute;p niềng răng trong suốt</strong></h2>\r\n\r\n<p>Sở dĩ, niềng răng trong suốt được y&ecirc;u th&iacute;ch đến thế nhờ sở hữu h&agrave;ng loạt ưu điểm nổi trội. Tuy nhi&ecirc;n, phương ph&aacute;p cũng c&oacute; một số nhược điểm bệnh nh&acirc;n cần biết trước khi quyết định thực hiện.</p>\r\n\r\n<h3><strong><em>Ưu điểm</em></strong></h3>\r\n\r\n<ul>\r\n	<li><strong><em>T&iacute;nh thẩm mỹ cao:</em></strong>&nbsp;l&agrave; một trong những ưu điểm nổi bật khiến niềng răng trong suốt kh&aacute;c biệt ho&agrave;n to&agrave;n so với phương ph&aacute;p niềng răng truyền thống. Khi sử dụng niềng răng trong suốt, người đối diện sẽ rất kh&oacute; nhận ra bạn đang niềng răng, gi&uacute;p bạn tự tin hơn trong giao tiếp h&agrave;ng ng&agrave;y.</li>\r\n	<li><strong><em>Độ an to&agrave;n cao:</em></strong>&nbsp;khay niềng trong suốt được l&agrave;m từ chất liệu nhựa cao cấp th&acirc;n thiện v&agrave; được kiểm định khắt khe kh&aacute;ch h&agrave;ng c&oacute; thể an t&acirc;m sử dụng m&agrave; kh&ocirc;ng cần lo lắng đến c&aacute;c phản ứng phụ. Ngo&agrave;i ra, khay niềng được l&agrave;m rất mỏng đ&uacute;ng theo cấu tr&uacute;c răng n&ecirc;n sẽ kh&ocirc;ng g&acirc;y cộm, kh&oacute; chịu hay tổn thương b&ecirc;n trong m&aacute;, lưỡi như phương ph&aacute;p niềng răng sử dụng mắc c&agrave;i.</li>\r\n</ul>', 1, '', '2022-12-11 08:57:19', '2022-12-11 08:57:19');

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
(1, 'Myron Cremin', 'https://via.placeholder.com/640x480.png/004411?text=voluptatum', 'Suscipit voluptas qui consequatur provident. Et illo asperiores velit velit et. Aspernatur non sed totam sunt. Non quae consequatur omnis. Temporibus recusandae quia consequatur porro fugiat sed est.', '2022-10-19 00:38:29', '2022-10-19 00:38:29'),
(2, 'Jarvis Kuphal', 'https://via.placeholder.com/640x480.png/002299?text=veritatis', 'Dolores et quis deleniti sit. Voluptatibus illum voluptatum totam culpa aut soluta nostrum. Et illum earum officiis libero voluptatem voluptate esse quibusdam.', '2022-10-19 00:38:29', '2022-10-19 00:38:29'),
(3, 'Turner Hane', 'https://via.placeholder.com/640x480.png/004466?text=officia', 'Odit commodi culpa et ut nihil voluptatibus. Cum illum doloremque quae pariatur blanditiis sapiente expedita possimus. Debitis quia quia autem voluptatem.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(4, 'Delpha Labadie', 'https://via.placeholder.com/640x480.png/00ff22?text=aspernatur', 'At ullam praesentium voluptatem doloremque quibusdam ipsam sunt. Alias consequatur omnis molestiae quidem. Doloribus quaerat ut nihil est assumenda molestiae veniam.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(5, 'Natalie West', 'https://via.placeholder.com/640x480.png/00ffaa?text=error', 'Aut sunt repudiandae qui magni sed. Blanditiis rem quis magnam accusantium ab debitis harum. Velit nihil omnis nobis.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(6, 'Justina Boyer', 'https://via.placeholder.com/640x480.png/00ff66?text=vero', 'Dolores atque assumenda commodi. Tenetur consequuntur culpa repellendus aut. Vel numquam non quasi quisquam. Repellat repellendus et adipisci qui.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(7, 'Mr. Ole Swift', 'https://via.placeholder.com/640x480.png/001199?text=odit', 'Consectetur maiores magnam sunt officia sed aliquam. Qui sed animi et soluta. Eos voluptatem voluptate eum minima non perspiciatis debitis. Non et aut quia temporibus.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(8, 'Ms. Ayana Altenwerth', 'https://via.placeholder.com/640x480.png/0022ee?text=voluptatem', 'Nobis quia sunt qui. Placeat eligendi repellat vel maiores voluptas.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(9, 'Prof. Alison Ward', 'https://via.placeholder.com/640x480.png/006644?text=quasi', 'Exercitationem quidem impedit laboriosam consectetur error. Sed voluptas pariatur aliquid quia. Repellat mollitia architecto blanditiis et.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(10, 'Dr. Elyse Nolan PhD', 'https://via.placeholder.com/640x480.png/004444?text=nulla', 'Autem quis quia numquam voluptatibus consequatur. Ipsam sit quo consequatur quis.', '2022-10-19 00:38:30', '2022-10-19 00:38:30');

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
(2, 2, 'uploads/newsImages/newsImage_Re73vS5Kd5TVxY1J5OSRmTRefiRkfuUus3o4Ztpn.jpg', '2022-10-19 00:44:42', '2022-10-19 00:44:42'),
(3, 1, 'uploads/newsImages/newsImage_2zVgIlQZahvu0mJVWzkGXGHMQfTqNcDUmktrqaaN.jpg', '2022-12-11 08:46:59', '2022-12-11 08:46:59'),
(4, 4, 'uploads/newsImages/newsImage_RKEAURFBgWf7tlNccVmLPxXpk0OVFYyImPrlqfgQ.jpg', '2022-12-11 08:57:19', '2022-12-11 08:57:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'nghia', '0372559460', 'Tiền mặt', '<p>alo alo</p>', '3|5', '41', '380116081324', 27868987, '2022-10-26 07:38:01', '2022-10-26 07:38:01', '2022-10-26', 1),
(2, 'nghia', '0372559460', 'Tiền mặt', '<p>alo alo</p>', '3|5', '41', '257102680092', 27868987, '2022-10-26 07:38:21', '2022-10-26 07:38:21', '2022-10-26', 1),
(3, 'nghia', '0372559460', 'Tiền mặt', '<p>alo alo</p>', '3|5', '41', '469595828080', 27868987, '2022-10-26 07:39:25', '2022-10-26 07:39:25', '2022-10-26', 1),
(4, 'nghia', '0372559460', 'Tiền mặt', '<p>alo alo</p>', '3|5', '41', '914128065005', 27868987, '2022-10-26 07:45:20', '2022-10-26 07:45:20', '2022-10-26', 1),
(5, 'nnnnnn', '0372559623', 'Tiền mặt', '<p>T&igrave;nh h&igrave;nh l&agrave; sức khỏe oke</p>', '4|5|7|18', '24', '606875905474', 50418463, '2022-11-02 07:23:20', '2022-11-02 07:23:20', '2022-11-02', 2),
(6, 'Nguyễn Anh Tuấn', '0372559461', 'Tiền mặt', '<p>vi&ecirc;m ch&acirc;n răng</p>', '3|6', '25|26', '215022375129', 22769412, '2022-11-03 21:26:21', '2022-11-03 21:26:21', '2022-11-04', 3),
(7, 'Đào Thị Yến Nhi', '0372559466', 'Tiền mặt', '<p>cute</p>', '5|6', '25|28|33|38', '408759463895', 29085071, '2022-11-03 21:39:00', '2022-11-03 21:39:00', '2022-11-04', 4),
(8, 'Thu Cúc', '0372559433', 'Tiền mặt', '<p>Nhớ uống thuốc nha</p>', '2|5', '23', '371471703712', 40379829, '2022-11-22 02:50:28', '2022-11-22 02:50:28', '2022-11-22', 5),
(9, 'Nghĩa', '0372559465', 'Tiền mặt', '<p>alo</p>', '3', '24', '214134731320', 14061664, '2022-11-23 08:19:51', '2022-11-23 08:19:51', '2022-11-23', 6),
(10, 'Thu Cúc', '0372559433', 'Tiền mặt', '<p>Nhớ uống thuốc nha</p>', '2|5', '23', '445318550448', 40379829, '2022-11-27 20:36:46', '2022-11-27 20:36:46', '2022-11-28', 5),
(11, 'Thu Cúc', '0372559433', 'Tiền mặt', '<p>good</p>', '4|7', '25', '517146379273', 32234562, '2022-11-28 21:41:11', '2022-11-28 21:41:11', '2022-11-29', 7),
(12, 'nghia tr', '0372559444', 'Tiền mặt', '<p>jbadskdkasbdsa</p>', '3', '26', '838565000941', 14061664, '2022-11-30 08:41:38', '2022-11-30 08:41:38', '2022-11-30', 8),
(13, 'nghia tr', '0372559461', 'Tiền mặt', '<p>ajskdnksaj</p>', '3', '24', '419767073932', 14061664, '2022-11-30 08:47:14', '2022-11-30 08:47:14', '2022-11-30', 9);

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
(1, 'nghia', '0372559460', '2022-10-27', '132486282', '<p>alo alo</p>', 'pt', 4, 3, '2022-10-26', '2022-10-26 07:37:39', '2022-10-26 07:45:26', 4, ''),
(2, 'nnnnnn', '0372559623', '2002-03-12', '132486282', '<p>T&igrave;nh h&igrave;nh l&agrave; sức khỏe oke</p>', 'w', 6, 3, '2022-10-30', '2022-10-27 21:22:20', '2022-11-02 07:23:26', 5, ''),
(3, 'Nguyễn Anh Tuấn', '0372559461', '1970-01-01', '132486283', 'viêm chân răng', 'Phú Thọ', 2, 3, '2022-10-28', '2022-11-03 21:26:02', '2022-11-03 21:26:24', 6, 'ct5zjs1wv6cs0chwamiuswaub'),
(4, 'Đào Thị Yến Nhi', '0372559466', '2022-11-02', '132487283', 'cute', 'Ứng Hòa, Hà Nội', 9, 0, '2022-11-17', '2022-11-03 21:38:49', '2022-11-04 02:06:31', 7, '5rcvoikjwijaoyo62cgcglnpz'),
(5, 'Thu Cúc', '0372559433', '1970-01-01', '111111111', 'Nhớ uống thuốc nha', 'Hải Phòng x Phú Thọ', 16, 3, '2022-11-22', '2022-11-22 02:50:10', '2022-11-27 20:36:51', 10, '6wn2ph1cucqgxlcfcsa8dgzny'),
(6, 'Nghĩa', '0372559465', '1970-01-01', '111111111', 'alo', 'phú thọ', 17, 3, '1970-01-01', '2022-11-23 08:19:27', '2022-11-23 08:19:54', 9, 'trfp0ap4jxpzu6nt8kciylqlb'),
(7, 'Thu Cúc', '0372559433', '2003-12-08', '111111111', 'good', 'Hải Phòng', 20, 3, '1970-01-01', '2022-11-28 21:40:59', '2022-11-28 21:41:15', 11, 'ncxhycdk5aiwrdbdcweggvfbs'),
(8, 'nghia tr', '0372559444', '2022-11-24', '111111111', 'jbadskdkasbdsa', 'phus thoj', 21, 3, '2022-02-12', '2022-11-30 08:41:26', '2022-11-30 08:41:40', 12, 'nqeomuyzlmw9jpbjyea7dcr8y'),
(9, 'nghia tr', '0372559461', '1970-01-01', '111111111', 'ajskdnksaj', 'phus thoj', 22, 3, '1970-01-01', '2022-11-30 08:46:44', '2022-11-30 08:47:16', 13, 'ylwbqqlkhqqkllbvnrqrh6d5m');

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
(1, 1, 5),
(2, 1, 6),
(3, 2, 4),
(4, 2, 5),
(5, 3, 4),
(6, 3, 6),
(7, 4, 6),
(8, 4, 3),
(9, 5, 5),
(10, 6, 5),
(11, 7, 4),
(12, 7, 6),
(13, 8, 5),
(14, 9, 4);

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
(4, 2, 5),
(5, 2, 7),
(6, 2, 18),
(7, 3, 3),
(8, 3, 6),
(9, 4, 5),
(10, 4, 6),
(11, 5, 2),
(12, 5, 5),
(13, 6, 3),
(14, 7, 4),
(15, 7, 7),
(16, 8, 3),
(17, 9, 3);

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
(1, '1', '41'),
(2, '2', '24'),
(3, '3', '25'),
(4, '3', '26'),
(5, '4', '25'),
(6, '4', '28'),
(7, '4', '33'),
(8, '4', '38'),
(9, '5', '23'),
(10, '6', '24'),
(11, '7', '25'),
(12, '8', '26'),
(13, '9', '24');

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
(1, 'Roles', '', '0', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(2, 'List Roles', 'List_Roles', '1', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(3, 'Add Roles', 'Add_Roles', '1', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(4, 'Edit Roles', 'Edit_Roles', '1', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(5, 'Delete Roles', 'Delete_Roles', '1', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(6, 'Rooms', '', '0', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(7, 'List Rooms', 'List_Rooms', '6', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(8, 'Add Rooms', 'Add_Rooms', '6', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(9, 'Edit Rooms', 'Edit_Rooms', '6', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(10, 'Delete Rooms', 'Delete_Rooms', '6', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(11, 'Permissions', '', '0', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(12, 'List Permissions', 'List_Permissions', '11', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(13, 'Add Permissions', 'Add_Permissions', '11', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(14, 'Edit Permissions', 'Edit_Permissions', '11', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(15, 'Delete Permissions', 'Delete_Permissions', '11', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(16, 'Admins', '', '0', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(21, 'Patients', '', '0', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(22, 'List Patients', 'List_Patients', '21', '2022-10-19 00:38:37', '2022-10-19 00:38:37'),
(23, 'Add Patients', 'Add_Patients', '21', '2022-10-19 00:38:38', '2022-10-19 00:38:38'),
(24, 'Edit Patients', 'Edit_Patients', '21', '2022-10-19 00:38:38', '2022-10-19 00:38:38'),
(25, 'Delete Patients', 'Delete_Patients', '21', '2022-10-19 00:38:38', '2022-10-19 00:38:38'),
(26, 'Levels', '', '0', '2022-10-19 00:38:38', '2022-10-19 00:38:38'),
(27, 'List Levels', 'List_Levels', '26', '2022-10-19 00:38:38', '2022-10-19 00:38:38'),
(28, 'Add Levels', 'Add_Levels', '26', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(29, 'Edit Levels', 'Edit_Levels', '26', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(30, 'Delete Levels', 'Delete_Levels', '26', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(31, 'Services', '', '0', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(32, 'List Services', 'List_Services', '31', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(33, 'Add Services', 'Add_Services', '31', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(34, 'Edit Services', 'Edit_Services', '31', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(35, 'Delete Services', 'Delete_Services', '31', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(36, 'Equipments', '', '0', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(37, 'List Equipments', 'List_Equipments', '36', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(38, 'Add Equipments', 'Add_Equipments', '36', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(39, 'Edit Equipments', 'Edit_Equipments', '36', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(40, 'Delete Equipments', 'Delete_Equipments', '36', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(41, 'Products', '', '0', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(42, 'List Products', 'List_Products', '41', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(43, 'Add Products', 'Add_Products', '41', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(44, 'Edit Products', 'Edit_Products', '41', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(45, 'Delete Products', 'Delete_Products', '41', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(46, 'Orders', '', '0', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(47, 'List Orders', 'List_Orders', '46', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(48, 'Add Orders', 'Add_Orders', '46', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(49, 'Edit Orders', 'Edit_Orders', '46', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(50, 'Delete Orders', 'Delete_Orders', '46', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(51, 'Schedules', '', '0', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(52, 'List Schedules', 'List_Schedules', '51', '2022-10-19 00:38:39', '2022-10-19 00:38:39'),
(53, 'Add Schedules', 'Add_Schedules', '51', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(54, 'Edit Schedules', 'Edit_Schedules', '51', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(55, 'Delete Schedules', 'Delete_Schedules', '51', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(56, 'Specialists', '', '0', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(57, 'List Specialists', 'List_Specialists', '56', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(58, 'Add Specialists', 'Add_Specialists', '56', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(59, 'Edit Specialists', 'Edit_Specialists', '56', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(60, 'Delete Specialists', 'Delete_Specialists', '56', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(65, 'List Admins', 'List_Admins', '16', '2022-11-28 21:47:59', '2022-11-28 21:47:59'),
(66, 'Add Admins', 'Add_Admins', '16', '2022-11-28 21:47:59', '2022-11-28 21:47:59'),
(67, 'Edit Admins', 'Edit_Admins', '16', '2022-11-28 21:47:59', '2022-11-28 21:47:59'),
(68, 'Delete Admins', 'Delete_Admins', '16', '2022-11-28 21:47:59', '2022-11-28 21:47:59'),
(69, 'Web_settings', '', '0', '2022-11-28 21:56:59', '2022-11-28 21:56:59'),
(70, 'List Web_settings', 'List_Web_settings', '69', '2022-11-28 21:56:59', '2022-11-28 21:56:59'),
(71, 'Add Web_settings', 'Add_Web_settings', '69', '2022-11-28 21:56:59', '2022-11-28 21:56:59'),
(72, 'Edit Web_settings', 'Edit_Web_settings', '69', '2022-11-28 21:56:59', '2022-11-28 21:56:59'),
(73, 'Delete Web_settings', 'Delete_Web_settings', '69', '2022-11-28 21:56:59', '2022-11-28 21:56:59'),
(76, 'News', '', '0', '2022-12-11 08:44:30', '2022-12-11 08:44:30'),
(77, 'List News', 'List_News', '76', '2022-12-11 08:44:30', '2022-12-11 08:44:30'),
(78, 'Add News', 'Add_News', '76', '2022-12-11 08:44:30', '2022-12-11 08:44:30'),
(79, 'Edit News', 'Edit_News', '76', '2022-12-11 08:44:30', '2022-12-11 08:44:30'),
(80, 'Delete News', 'Delete_News', '76', '2022-12-11 08:44:30', '2022-12-11 08:44:30'),
(81, 'NewCategory', '', '0', '2022-12-11 08:45:14', '2022-12-11 08:45:14'),
(82, 'List NewCategory', 'List_NewCategory', '81', '2022-12-11 08:45:14', '2022-12-11 08:45:14'),
(83, 'Add NewCategory', 'Add_NewCategory', '81', '2022-12-11 08:45:14', '2022-12-11 08:45:14'),
(84, 'Edit NewCategory', 'Edit_NewCategory', '81', '2022-12-11 08:45:14', '2022-12-11 08:45:14'),
(85, 'Delete NewCategory', 'Delete_NewCategory', '81', '2022-12-11 08:45:14', '2022-12-11 08:45:14');

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
(54, 65, 3),
(55, 66, 3),
(56, 67, 3),
(57, 68, 3),
(58, 70, 3),
(59, 71, 3),
(60, 72, 3),
(61, 73, 3),
(62, 77, 3),
(63, 78, 3),
(64, 79, 3),
(65, 80, 3),
(66, 82, 3),
(67, 83, 3),
(68, 84, 3),
(69, 85, 3);

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
(1, 4, 'Floy Stehr', '11615900', 'https://via.placeholder.com/640x480.png/00ddcc?text=iste', 'Aut voluptatem consectetur ducimus cumque porro optio. Possimus qui mollitia in nobis veniam repellat ab quae. Est reiciendis qui hic non maxime. Nemo aut et sit illum dolores.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(2, 10, 'Erin Gutkowski', '24382506', 'https://via.placeholder.com/640x480.png/005500?text=ipsam', 'Dolor dolor autem et ut. A consequatur perferendis vero labore corrupti. Earum suscipit quia totam nulla.', '2022-10-19 00:38:35', '2022-10-19 00:38:35'),
(3, 8, 'Prof. Malachi Wunsch', '11871664', 'https://via.placeholder.com/640x480.png/009922?text=necessitatibus', 'Autem labore dolore iusto odio recusandae qui. Ipsa est excepturi eum quia illo ratione. Quisquam laborum iste quaerat eos ad quis aperiam.', '2022-10-19 00:38:35', '2022-10-19 00:38:35'),
(4, 5, 'Desmond Franecki', '2317498', 'https://via.placeholder.com/640x480.png/00ee88?text=neque', 'Excepturi nemo quam asperiores quia at iure suscipit sed. Voluptatem praesentium sapiente autem deleniti. Ratione modi sit quidem.', '2022-10-19 00:38:35', '2022-10-19 00:38:35'),
(5, 5, 'Kenya Johns III', '13807323', 'https://via.placeholder.com/640x480.png/00bbff?text=dolores', 'Iure minus vel in corporis ullam consequatur vitae dolor. Dolorem id quisquam et qui tempora autem. Unde est veniam saepe nihil dolorem. Aut at harum impedit ducimus velit facere sit.', '2022-10-19 00:38:35', '2022-10-19 00:38:35'),
(6, 9, 'Dr. Juwan Kreiger II', '6517748', 'https://via.placeholder.com/640x480.png/00dd77?text=autem', 'Quam ab voluptas dolore a. Autem dolores non voluptas sit nesciunt quod dolor. Dolor blanditiis neque fugiat consequatur quos fugit neque. Itaque laborum voluptas reiciendis et sapiente labore.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(7, 6, 'Jazmyn Zieme', '27727064', 'https://via.placeholder.com/640x480.png/00dd55?text=voluptatem', 'Minus ratione quam dolorem dolores sit. Doloremque praesentium deserunt quae corporis rerum nulla. Omnis quo vel quidem mollitia sed dolor non.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(8, 4, 'Miss Marielle Schmitt I', '1277633', 'https://via.placeholder.com/640x480.png/0066cc?text=quo', 'Commodi dolore repudiandae in accusantium. Cupiditate et soluta enim enim voluptates. Maxime dolorem error sit autem dolorem eaque aperiam odio.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(9, 10, 'Amya Bruen III', '23704847', 'https://via.placeholder.com/640x480.png/00aaee?text=quia', 'Molestiae cupiditate itaque ipsam. Animi ullam minima earum sunt. Doloremque porro consequatur incidunt hic. Aut autem voluptas quia quia repellat.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(10, 10, 'Jillian Kuvalis V', '23418813', 'https://via.placeholder.com/640x480.png/000033?text=amet', 'Perspiciatis fugiat et sit provident. Rerum dolore ut reiciendis assumenda quibusdam recusandae quis ut. Quaerat rem animi dolore et numquam commodi nesciunt.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(11, 7, 'Dr. Evalyn Lang DVM', '16238234', 'https://via.placeholder.com/640x480.png/00bb33?text=minima', 'Distinctio magnam odit tenetur non voluptas. Laborum id et perferendis consequatur quo. Facere quo dolor quidem aut deleniti.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(12, 2, 'Ivah Kirlin', '12428406', 'https://via.placeholder.com/640x480.png/001155?text=voluptates', 'Cupiditate eligendi repudiandae quo libero optio asperiores et iure. Quidem vel magni porro fugit laborum libero. Praesentium harum placeat quia et saepe mollitia.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(13, 3, 'Shad Welch', '24156675', 'https://via.placeholder.com/640x480.png/009922?text=voluptatum', 'Consequatur repudiandae sunt fugiat ipsam ipsam consequatur. Eaque id omnis ipsa totam ipsa molestiae ut. Officiis animi inventore ut. Veritatis velit culpa nihil corrupti.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(14, 4, 'Prof. Jackeline Christiansen', '7756536', 'https://via.placeholder.com/640x480.png/00dd33?text=ut', 'Ab velit sit odio velit delectus mollitia. Quia nemo culpa porro sit libero. Veniam autem libero qui sunt cum tempore expedita.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(15, 10, 'Mr. Edgar Kuhn', '26174300', 'https://via.placeholder.com/640x480.png/00aa44?text=eveniet', 'Corrupti voluptatem est recusandae et accusamus omnis mollitia. Et eius nisi ullam voluptatem aliquid quis asperiores. Et neque ut ratione error. Velit amet voluptatem sunt quia tempore.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(16, 10, 'Paxton Jacobson', '7065374', 'https://via.placeholder.com/640x480.png/009955?text=similique', 'Aperiam omnis quis quia. Molestiae expedita quos possimus consequatur. Excepturi nam at fuga voluptatem ullam hic.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(17, 3, 'Josiane Hessel V', '13716152', 'https://via.placeholder.com/640x480.png/00aa44?text=esse', 'Esse deleniti tempore minus et. Omnis et nihil non quis error nisi est. Temporibus exercitationem aut quia consectetur natus voluptatem. Et est nisi libero non aut quo vel.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(18, 5, 'Mandy Heller', '4376578', 'https://via.placeholder.com/640x480.png/0066aa?text=temporibus', 'Aut sit architecto ex molestiae eum autem. Et aut vitae eligendi expedita eum. Nemo molestiae repellat temporibus et. Facere dolore est inventore aut id. Ullam et velit itaque quia optio.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(19, 9, 'Cecelia Kautzer', '19017458', 'https://via.placeholder.com/640x480.png/00bb22?text=autem', 'Eos corporis ea ducimus voluptatem quo dolores. Quia hic totam dolores amet quia aut. Totam non et molestias distinctio. Omnis excepturi cupiditate consequuntur voluptas et pariatur ullam.', '2022-10-19 00:38:36', '2022-10-19 00:38:36'),
(20, 4, 'Velva Keeling', '5111066', 'https://via.placeholder.com/640x480.png/0066bb?text=doloribus', 'Nostrum delectus porro expedita qui adipisci. Vel magnam rerum nisi quibusdam quam voluptatem id. Laboriosam architecto ipsam a nisi adipisci laborum quo.', '2022-10-19 00:38:36', '2022-10-19 00:38:36');

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
(1, 'Ayden Torphy', 'https://via.placeholder.com/640x480.png/00eeee?text=rem', 'Architecto dolorum ipsam voluptatibus veniam quis natus in. Molestiae quod voluptatum ex excepturi illum qui aut. Excepturi et rerum accusantium architecto non quis ut explicabo.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(2, 'Ms. Bella Bednar', 'https://via.placeholder.com/640x480.png/00ffcc?text=repudiandae', 'Et repudiandae autem dolore ea eos dolores animi. Exercitationem et magnam labore iste consequuntur eos. Tempore iusto possimus aliquid quia perspiciatis. Tempore sapiente tenetur repudiandae.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(3, 'Rogers Hilpert', 'https://via.placeholder.com/640x480.png/0022ee?text=dicta', 'Et qui nostrum quo labore laboriosam. Sint et animi neque minima eum nemo. Magni quis est quo sit voluptatem aliquam dicta dolores.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(4, 'Daisha Kuhn', 'https://via.placeholder.com/640x480.png/0077ee?text=voluptatem', 'Deleniti omnis consequatur odio explicabo autem. Et ut animi praesentium ex vero aut. Voluptates veritatis eos libero et eum molestias. Eaque sapiente maxime occaecati omnis vitae rerum.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(5, 'Teresa Halvorson', 'https://via.placeholder.com/640x480.png/0088cc?text=architecto', 'Officiis sunt reprehenderit doloribus dolorem consequatur enim debitis sit. Dolorem iure ut doloribus ut quis. Qui et ea fugiat modi nesciunt.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(6, 'Mathew Labadie', 'https://via.placeholder.com/640x480.png/003388?text=veniam', 'Sed ducimus delectus sit quos quia. Et quia reiciendis asperiores fugit maxime. Aliquid rerum adipisci rerum qui quo quam totam. Voluptas beatae saepe iure aperiam.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(7, 'Brennan Ondricka II', 'https://via.placeholder.com/640x480.png/00aaaa?text=iure', 'Velit illum sed tempora nulla. Sit aspernatur amet qui vero et. Nisi aliquam minima magni porro omnis aut.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(8, 'Jamison Heidenreich', 'https://via.placeholder.com/640x480.png/000011?text=id', 'Fuga ut vitae corporis omnis sed voluptatem. Sequi aut nulla esse tenetur omnis qui eveniet. Beatae aspernatur rerum quam vel temporibus provident nihil.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(9, 'Baylee Klocko', 'https://via.placeholder.com/640x480.png/00ff88?text=voluptatibus', 'Aut explicabo commodi sunt ea optio quo a. Fugiat ipsum vero ut officia. Quia adipisci consectetur modi officia et accusantium aliquid. Aut modi nam est voluptatem labore.', '2022-10-19 00:38:34', '2022-10-19 00:38:34'),
(10, 'Celine Lindgren IV', 'https://via.placeholder.com/640x480.png/00ff22?text=quod', 'Iure et distinctio cumque tenetur. At laboriosam dolorem ducimus vitae accusamus. Doloribus et aspernatur amet perferendis.', '2022-10-19 00:38:34', '2022-10-19 00:38:34');

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
(1, 'Guest', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(2, 'Manager', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(3, 'Admin', '2022-10-19 00:38:40', '2022-10-19 00:38:40'),
(4, 'Doctor', '2022-10-19 00:38:40', '2022-10-19 00:38:40');

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
(3, 3, 4),
(4, 4, 4),
(5, 5, 4),
(6, 6, 4),
(7, 7, 4);

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
(1, 'Mr. Celestino Will', 'Ut ex aperiam et asperiores. Ipsa neque nihil odit enim. Dolores aut saepe quis asperiores est voluptatem. Vitae sint iure nihil enim quo voluptatem.', 'Dolor necessitatibus et cum. Harum perferendis adipisci nihil aut quae reprehenderit harum.', 'Iusto neque dolor cupiditate tempora doloribus. Voluptate ut ipsa ut numquam aut ipsam molestiae. Nobis distinctio qui nisi. Hic ratione quibusdam nihil id labore in qui.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(2, 'Horacio Beahan MD', 'Officiis a nobis consequuntur impedit commodi. Repellendus consequatur nemo quam. Eos quos dolore enim enim in eos. Animi amet nobis autem consequuntur sunt eos.', 'Earum molestiae nihil numquam voluptatem eveniet et. Doloribus magnam est facere consequuntur.', 'Dolor pariatur reprehenderit rerum et. Ducimus quos est numquam.', '2022-10-19 00:38:30', '2022-10-19 00:38:30'),
(3, 'Miss Audra Pfeffer', 'Cupiditate voluptas quia accusantium dolorem et non. Et consectetur id at nisi perspiciatis voluptatem ex. Maiores perferendis voluptas sed consequuntur molestiae.', 'Nemo animi consequatur doloremque et vel facere et. Distinctio ut ut debitis ut eveniet. Ullam minima tempora dolor officia enim hic. Natus rem itaque ut nesciunt ad quia.', 'Facere voluptatem ipsum ad qui fuga molestiae quia. Et eos occaecati quia veniam eum. Doloremque dignissimos nisi dolorem. Qui aut sed est sint iusto necessitatibus ipsum.', '2022-10-19 00:38:31', '2022-10-19 00:38:31'),
(4, 'Jazmyn O\'Conner', 'Est voluptatem eligendi dolor ut. Eum eaque qui nostrum. Culpa sapiente aut maiores modi molestiae occaecati numquam.', 'Voluptatem quo aliquid culpa eius cumque. Consequatur omnis aut ut.', 'Inventore impedit maiores perspiciatis quis dignissimos velit molestiae natus. Maxime eius error veniam aut. Quidem iusto quisquam ut eos numquam in. Voluptatem hic porro quaerat quasi.', '2022-10-19 00:38:31', '2022-10-19 00:38:31'),
(5, 'Mr. Nathaniel Doyle II', 'Accusamus consequatur illo et modi at. Vel dolor sit et qui tempore similique. Dolor veritatis rerum minima.', 'Cumque enim possimus enim expedita velit. Repellendus facere aliquid ut quia perferendis. Aliquam accusantium id dolores qui dolor. Nihil corrupti omnis est quia at labore.', 'Maiores et et cum deserunt quasi. Dignissimos enim magnam libero. Tempore eum harum voluptatem. Nesciunt iusto et libero.', '2022-10-19 00:38:31', '2022-10-19 00:38:31'),
(6, 'Barbara Lakin', 'Nemo vero et esse quis dolorem commodi. Et nulla voluptate quod unde libero nesciunt nesciunt. Necessitatibus reprehenderit eum fugit corrupti quis. Culpa vel animi qui.', 'Autem quasi quasi quis corrupti quidem voluptatibus. Rerum assumenda voluptatem eos quibusdam molestiae et ipsa. Et amet quis maxime officiis. Molestias nemo doloremque enim neque quibusdam dolor.', 'Modi ullam consequatur neque qui enim qui. Excepturi aut illum molestiae corporis accusamus velit quo. Voluptas maxime quibusdam laborum.', '2022-10-19 00:38:31', '2022-10-19 00:38:31'),
(7, 'Linwood Torphy', 'Aliquam repellendus corrupti dolor id. Fugiat laudantium in qui fugiat enim sint. Enim qui veritatis molestiae ut. Vel ut consequuntur nulla tenetur ex deserunt.', 'Adipisci beatae quidem ut aut occaecati. Asperiores est debitis officia non. Dolores atque qui repellat reiciendis dolorem repellendus. Quod omnis dolorem asperiores sed tempore quia.', 'Qui officia consectetur quo porro. Soluta fugiat odio corporis vel. Ad voluptatem quam aut debitis atque qui. Earum cum iste nihil neque.', '2022-10-19 00:38:31', '2022-10-19 00:38:31'),
(8, 'Ismael Hartmann', 'Qui eaque quam recusandae reprehenderit. Sapiente voluptatem et dolorem ducimus eum. Saepe voluptas non rerum laborum atque provident.', 'Aut voluptates quidem molestiae vel fuga perferendis quod ipsam. Praesentium dicta aut ut repellat enim vitae dolorem. Minus culpa sed voluptas nisi.', 'Odit maxime blanditiis et vel possimus molestiae illo ab. Perspiciatis occaecati suscipit sint et sapiente consequatur. Veniam quos dolore ad quisquam id sunt et qui.', '2022-10-19 00:38:31', '2022-10-19 00:38:31'),
(9, 'Brent Berge', 'Voluptate odio eos recusandae quisquam at. In voluptatibus voluptatem ab est rem. Qui delectus consequuntur laborum. Velit repellat aut saepe beatae ipsa velit dolor.', 'Pariatur occaecati aut qui eum voluptates. Cumque et voluptatem reprehenderit et adipisci error ut.', 'Omnis at totam quo occaecati aliquam corporis asperiores. Quidem perferendis mollitia ea molestias et et.', '2022-10-19 00:38:31', '2022-10-19 00:38:31'),
(10, 'Prof. Sandra Welch', 'Est minus reprehenderit maxime a. Vero blanditiis ut repudiandae. Et nemo enim saepe. Nihil amet qui quisquam labore eum iure molestiae. Sapiente ut impedit labore vel et quia qui nihil.', 'Impedit enim suscipit incidunt laudantium non et enim nobis. Natus corporis magni ipsa dolor. Quae necessitatibus ratione totam non sapiente aliquid placeat.', 'Possimus voluptatibus ratione eum non. Sed in corporis ipsam labore consequatur. Id pariatur nulla magni quo.', '2022-10-19 00:38:31', '2022-10-19 00:38:31');

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
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `schedules`
--

INSERT INTO `schedules` (`id`, `fullname`, `birthday`, `gender`, `phone`, `email`, `address`, `cmnd`, `content`, `date`, `status`, `created_at`, `updated_at`, `counter`, `patient_id`) VALUES
(2, 'Nguyễn Anh Tuấn', '1970-01-01', 1, '0372559461', 'truongducnghia030802@gmail.com', 'Phọ thọ', NULL, '<p>okoay</p>', '2022-10-28', 3, '2022-10-25 06:14:18', '2022-11-03 21:26:02', 2, 3),
(4, 'nghia', NULL, 1, '0372559460', 'truongducnghia030802@gmail.com', NULL, NULL, NULL, '2022-10-26', 3, '2022-10-26 07:27:16', '2022-10-26 07:37:39', 1, 1),
(5, 'nghia', '2022-11-01', 1, '0372559460', 'truongducnghia030802@gmail.com', 'asd', '2222222222', '<p>asdsa</p>', '2022-10-28', 1, '2022-10-26 08:01:59', '2022-10-26 08:01:59', 1, NULL),
(6, 'nnnnnn', '2002-03-12', 1, '0372559623', 'truongducnghia030802@gmail.com', 'w', '12312321321', '<p>ad</p>', '2022-10-30', 3, '2022-10-26 08:03:56', '2022-10-27 21:22:20', 1, 2),
(9, 'Đào Thị Yến Nhi', '2022-11-02', 1, '0372559466', 'truongducnghia030802@gmail.com', 'Ứng Hòa, Hà Nội', NULL, '<p>hello nghĩa</p>', '2022-11-17', 3, '2022-11-03 21:36:00', '2022-11-03 21:38:49', 1, 4),
(13, 'Trương Đức Nghĩa', NULL, 1, '0372559462', NULL, NULL, NULL, NULL, '1970-01-01', 0, '2022-11-22 00:55:10', '2022-11-22 00:55:10', 0, NULL),
(14, 'Trương Đức Nghĩa', NULL, 1, '0372559469', NULL, NULL, NULL, NULL, '2022-11-22', 0, '2022-11-22 01:39:02', '2022-11-22 01:39:02', 0, NULL),
(15, 'Trương Đức Nghĩa', NULL, 1, '037255946123', NULL, NULL, NULL, NULL, '2022-11-22', 0, '2022-11-22 01:59:40', '2022-11-22 01:59:40', 0, NULL),
(16, 'Thu Cúc', '1970-01-01', 2, '0372559433', 'truongducnghia030802@gmail.com', 'Hải Phòng x Phú Thọ', '1111111111', '<p>miss you</p>', '2022-11-22', 3, '2022-11-22 02:16:04', '2022-11-22 02:50:10', 1, 5),
(17, 'Nghĩa', '1970-01-01', 1, '0372559465', 'truongducnghia030802@gmail.com', 'phú thọ', '111111111', '<p>alo</p>', '1970-01-01', 3, '2022-11-23 08:13:55', '2022-11-23 08:19:27', 1, 6),
(18, 'truong duc ngh', NULL, 1, '03725594612', NULL, NULL, NULL, NULL, '2022-11-23', 0, '2022-11-23 08:35:13', '2022-11-23 08:35:13', 0, NULL),
(19, 'Thu Cúc', NULL, 1, '03725594331', NULL, NULL, NULL, NULL, '1970-01-01', 0, '2022-11-27 21:05:10', '2022-11-27 21:05:10', 0, NULL),
(20, 'Thu Cúc', '1970-01-01', 2, '0372559433', 'truongducnghia030802@gmail.com', 'Hải Phòng', '111111111', '<p>hello&nbsp;</p>', '1970-01-01', 3, '2022-11-28 20:55:26', '2022-11-28 21:40:59', 1, 7),
(21, 'nghia tr', '2022-11-24', 1, '0372559444', 'truongducnghia030802@gmail.com', 'phus thoj', '111111111', '<p>adsdsa</p>', '2022-02-12', 3, '2022-11-30 08:39:21', '2022-11-30 08:41:26', 1, 8),
(22, 'nghia tr', '1970-01-01', 1, '0372559461', 'truongducnghia030802@gmail.com', 'phus thoj', '111111111', '<p>ashbdjsahbdas</p>', '1970-01-01', 3, '2022-11-30 08:44:31', '2022-11-30 08:46:44', 1, 9),
(29, 'Trương Đức Nghĩa', NULL, 1, '0372559460', NULL, NULL, NULL, NULL, '1970-01-01', 0, '2022-12-01 02:46:44', '2022-12-01 02:46:44', 0, NULL),
(32, 'Nga', NULL, 1, '0372559999', NULL, NULL, NULL, NULL, '2022-12-09', 0, '2022-12-05 02:44:41', '2022-12-05 02:44:41', 0, NULL);

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
(1, 5, 24),
(2, 5, 25),
(3, 6, 24),
(4, 2, 25),
(5, 2, 26),
(6, 9, 25),
(7, 9, 28),
(8, 9, 33),
(9, 9, 38),
(11, 16, 23),
(12, 17, 24),
(14, 21, 26),
(15, 22, 24),
(21, 32, 22);

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
(21, 'Niềng Răng', '2190000', 0, 1, '2022-10-25 06:59:30', '2022-10-25 06:59:30', '', NULL),
(22, 'Niềng răng mắc cài kim loại', '2190000', 21, 1, '2022-10-25 07:00:28', '2022-11-21 01:56:35', '', NULL),
(23, 'Niềng răng mắc cài kim loại tự buộc', '2190000', 21, 1, '2022-10-25 07:00:42', '2022-11-21 01:57:04', '', NULL),
(24, 'Niềng răng mắc cài sứ', '2190000', 21, 1, '2022-10-25 07:00:56', '2022-11-21 01:57:38', '', NULL),
(25, 'Niềng răng mắc cài sứ tự buộc', '2190000', 21, 1, '2022-10-25 07:01:26', '2022-11-21 01:59:21', '', NULL),
(26, 'Niềng răng mắc cài pha lê', '2190000', 21, 1, '2022-10-25 07:01:36', '2022-11-21 02:00:06', '', NULL),
(27, 'Niềng răng mặt lưỡi', '2190000', 21, 1, '2022-10-25 07:01:53', '2022-11-21 02:00:54', '', NULL),
(28, 'Niềng răng invisalign thẩm mỹ', '2190000', 21, 1, '2022-10-25 07:02:09', '2022-11-21 02:01:39', '', NULL),
(29, 'Bọc răng sứ', '2190000', 0, 1, '2022-10-25 07:02:37', '2022-10-25 07:02:37', '', NULL),
(30, 'Dán sứ Veneer lisi', '2190000', 29, 1, '2022-10-25 07:02:48', '2022-11-21 02:02:11', '', NULL),
(31, 'Dán sứ Veneer Emax', '2190000', 29, 1, '2022-10-25 07:03:18', '2022-11-21 02:02:52', '', NULL),
(32, 'Dán sứ Ziconia', '2190000', 29, 1, '2022-10-25 07:03:28', '2022-11-21 02:03:20', '', NULL),
(33, 'Bọc sứ Orodent', '2190000', 29, 1, '2022-10-25 07:03:55', '2022-11-21 02:03:49', '', NULL),
(34, 'Bọc sứ Lava 3M', '2190000', 29, 1, '2022-10-25 07:04:05', '2022-11-21 02:04:23', '', NULL),
(35, 'Bọc sứ Nacerna', '2190000', 29, 1, '2022-10-25 07:04:20', '2022-11-21 01:55:19', '', NULL),
(36, 'Bọc sứ Venus', '2190000', 29, 1, '2022-10-25 07:04:33', '2022-11-21 01:55:41', '', NULL),
(37, 'Trồng Răng Implant', '2190000', 50, 1, '2022-10-25 07:05:11', '2022-11-21 02:13:37', '', NULL),
(38, 'Trồng Răng Implant Straumann', '2190000', 50, 1, '2022-10-25 07:05:50', '2022-11-21 02:14:00', '', NULL),
(39, 'Trồng Răng Implant Dentimun', '2190000', 50, 1, '2022-10-25 07:05:59', '2022-11-21 02:14:23', '', NULL),
(40, 'Trồng Răng Implant Osstem', '2190000', 50, 1, '2022-10-25 07:06:19', '2022-11-21 02:13:16', '', NULL),
(41, 'Trồng Răng Implant Biotem', '2190000', 50, 1, '2022-10-25 07:07:32', '2022-11-21 02:12:58', '', NULL),
(42, 'Trồng Răng All-on-six', '2190000', 50, 1, '2022-10-25 07:07:45', '2022-11-21 02:12:36', '', NULL),
(43, 'Trồng Răng All-on-four', '2190000', 50, 1, '2022-10-25 07:11:06', '2022-11-21 02:12:11', '', NULL),
(44, 'Bệnh lý', '2190000', 0, 1, '2022-10-25 07:12:33', '2022-10-25 07:12:33', '', NULL),
(45, 'Lấy cao răng', '30000', 44, 1, '2022-10-25 07:12:59', '2022-11-21 01:50:42', '', NULL),
(46, 'Hàn trám răng', '2190000', 44, 1, '2022-10-25 07:13:21', '2022-11-21 01:50:17', '', NULL),
(47, 'Điều trị tủy răng', '2190000', 44, 1, '2022-10-25 07:13:37', '2022-11-21 01:49:55', '', NULL),
(48, 'Điều trị nha chu', '2190000', 44, 1, '2022-10-25 07:13:55', '2022-11-21 01:49:27', '', NULL),
(49, 'Điều trị cười hở lợi', '2190000', 44, 1, '2022-10-25 07:14:06', '2022-10-26 07:18:34', '', NULL),
(50, 'Trồng răng thẩm mỹ', '200000000', 0, 1, '2022-11-21 02:11:43', '2022-11-21 02:11:43', '', NULL);

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
(1, 'Nhổ răng khôn', 'Nhổ răng khôn mọc ngầm không đau tại Nha Khoa Đức Nghĩa công nghệ hiện đại được coi là giải pháp tối ưu, nhanh chóng giúp bạn loại bỏ chiếc răng một cách nhẹ nhàng.', NULL, 1, '2022-10-19 00:38:32', '2022-10-25 06:24:03'),
(7, 'Bọc răng sứ', 'Sử dụng răng sứ được làm hoàn toàn từ sứ hoặc sứ kết hợp cùng kim loại để chụp lên phần răng khiếm khuyết hoặc hư tổn để tái tạo hình dáng, kích thước và màu sắc như răng thật.', 'Sử dụng răng sứ được làm hoàn toàn từ sứ hoặc sứ kết hợp cùng kim loại để chụp lên phần răng khiếm khuyết hoặc hư tổn để tái tạo hình dáng, kích thước và màu sắc như răng thật.', 1, '2022-10-19 00:38:32', '2022-10-25 06:31:06'),
(8, 'Niềng răng thẩm mĩ', 'Phương pháp sử dụng khí cụ chuyên dụng được gắn cố định hoặc tháo lắp trên răng để giúp dịch chuyển và sắp xếp răng về đúng vị trí.', 'Phương pháp sử dụng khí cụ chuyên dụng được gắn cố định hoặc tháo lắp trên răng để giúp dịch chuyển và sắp xếp răng về đúng vị trí.', 1, '2022-10-19 00:38:32', '2022-10-25 06:30:49'),
(9, 'Làm trắng răng', 'Công nghệ hiện đại hoạt động dựa trên sự kết hợp đặc biệt giữa chất gel làm trắng với ánh sáng xanh dịu nhẹ', 'Công nghệ hiện đại hoạt động dựa trên sự kết hợp đặc biệt giữa chất gel làm trắng với ánh sáng xanh dịu nhẹ', 1, '2022-10-19 00:38:32', '2022-10-25 06:31:21'),
(11, 'Trồng răng  thẩm mỹ', 'Trồng răng thẩm mỹ , tinh tế', NULL, 1, '2022-11-21 02:06:30', '2022-11-21 02:06:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specialist_gallery`
--

CREATE TABLE `specialist_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'image option path'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `specialist_gallery`
--

INSERT INTO `specialist_gallery` (`id`, `specialist_id`, `path`) VALUES
(9, 11, 'uploads/specialist/specialist_XPYKOHK7nf5Ha6MbUTayVJH36bscgLYbOkJH7EQr.jpg'),
(15, 9, 'uploads/specialist/specialist_j0eaOfrgNIqVpJubRWUNYUZVt0cNMw4jeiFWH7Ox.jpg'),
(16, 8, 'uploads/specialist/specialist_bsbQu9nzMrwbRki2piZy0HGaSx2alyQK48yg7ypj.jpg'),
(17, 7, 'uploads/specialist/specialist_OVrJ6eWvWBWXsKKoqNJHqm4qvphoDNJPilFx8llM.jpg'),
(18, 1, 'uploads/specialist/specialist_0PODBFMrRTJoY08EDN90NIgfCCoemHb5siD08rAR.jpg');

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
(1, 'nghia', NULL, '$2y$10$ZB8POpYp0vhPagRFQoyrE.SNVuu/Oks0fBAiHGj1y.nmOyIF71uvm', '0372559460', 'truongducnghia030802@gmail.com', NULL, '2022-10-26 07:29:40', '2022-10-26 07:29:40', NULL, 1, NULL, NULL, 1),
(2, 'nnnnnn', NULL, '$2y$10$jlvizdID4QBPgNfooUJyKeBz1KXupDwGyBbWHEnoPxYqCmljVW/ie', '0372559621', 'truongducnghia030802@gmail.com', NULL, '2022-10-26 08:03:56', '2022-10-26 08:05:09', '2002-03-12', 1, '12312321321', 'w', 1),
(3, 'nnnnnn', NULL, '$2y$10$qagDMVRKVdXr2X0DBlIWse.CU1uKfg2QNvOenMXjXkRuuR5qPJ5xu', '0372559623', 'truongducnghia030802@gmail.com', NULL, '2022-10-26 08:06:55', '2022-10-26 08:06:55', '2002-03-12', 1, '12312321321', 'w', 1),
(4, 'nghia tr', NULL, '$2y$10$6SwEaoDClWIuOtWTu6N.peOjUUkoCTveJvVpZJiRsu01YrvdAO2la', '0372559461', 'truongducnghia030802@gmail.com', NULL, '2022-11-03 21:23:47', '2022-11-30 08:45:47', '1970-01-01', 1, '111111111', 'phus thoj', 1),
(5, 'Đào Thị Yến Nhi', NULL, '$2y$10$abEKp8lzQw6VBBPXAFGp1eHMsg4AZNHybGYhcmL5y5MbdthuXfP7C', '0372559466', 'truongducnghia030802@gmail.com', NULL, '2022-11-03 21:37:35', '2022-11-03 21:37:35', '2022-11-02', 1, NULL, 'Ứng Hòa, Hà Nội', 1),
(6, 'Tham Minh Duc', NULL, '$2y$10$bS2jtFQaNvpLKtfar6artO0M096BmGcmiUPnIxFZC2CBMIFWL3iH.', '0337867677', NULL, NULL, '2022-11-19 20:53:15', '2022-11-19 20:53:15', '1970-01-01', 1, NULL, NULL, 1),
(7, 'Thu Cúc', NULL, '$2y$10$8yyVeoRkmfBE3xRLyEbCPuC08DWjYZIQH2gdJGkFDOuZvv1CWYxIG', '0372559433', 'truongducnghia030802@gmail.com', NULL, '2022-11-22 02:17:28', '2022-11-28 21:38:16', '1970-01-01', 2, '111111111', 'Hải Phòng', 1),
(8, 'Nghĩa', NULL, '$2y$10$L8F1eB10//nCm8J6ejj0uOpPfLSMgH2vKtwBmyZbmMITob6O2Cuai', '0372559465', 'truongducnghia030802@gmail.com', NULL, '2022-11-23 08:15:09', '2022-11-23 08:15:09', '1970-01-01', 1, '111111111', 'phú thọ', 1),
(9, 'nghia tr', NULL, '$2y$10$cJmb4AZtUttKPFc9njlDY.YxT8nfmyi5ctJUTSDcFLVm9Mxg0C6LG', '0372559444', 'truongducnghia030802@gmail.com', NULL, '2022-11-30 08:40:21', '2022-11-30 08:40:21', '2022-11-24', 1, '111111111', 'phus thoj', 1);

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
(1, 'uploads/webSetting/webSetting_UQL9KU60DXH28RXt9etT5trEKWzOLGY8lbro86kh.png', 'Nha khoa Đức Nghĩa', 'nhakhoaducnghia.vn', '0989581167', 'nhakhoaducnghia@gmail.com', 'https://facebook.com/dukeonda.b', 'https://twitter.com', 'https://instagram.com', 'https://youtobe.com', 'Ngõ 155, Đường Cầu Giấy', '08h00', '18h30', '2022-10-18', '2022-10-23', '<p>hello babie</p>', '<p>kh&ocirc;ng c&oacute; g&igrave; l&agrave; chi tiết cả</p>', '2022-11-03 08:47:25', '2022-11-28 22:12:53');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `equipment_galleries`
--
ALTER TABLE `equipment_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `patient_doctors`
--
ALTER TABLE `patient_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `patient_products`
--
ALTER TABLE `patient_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `patient_services`
--
ALTER TABLE `patient_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `permission_roles`
--
ALTER TABLE `permission_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `schedule_services`
--
ALTER TABLE `schedule_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `specialist_gallery`
--
ALTER TABLE `specialist_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Các ràng buộc cho bảng `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `patients_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`);

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
