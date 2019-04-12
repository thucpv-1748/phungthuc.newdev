-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 03, 2019 lúc 04:56 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cinema`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Phim Hanh Dong', 'Phim Hanh Dong', '2019-03-11 20:23:37', '2019-03-11 20:23:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(6,3) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `coupon_code`, `status`, `type`, `price`, `percent`, `created_at`, `updated_at`) VALUES
(2, 'giam 50%', 'wNQv5z0IFj', '1', '2', '0.000', 60, '2019-03-11 23:47:19', '2019-03-26 20:37:38'),
(4, 'giam 100k', 'YcYyiWFKlq', '1', '1', '100.000', 0, '2019-03-12 02:25:11', '2019-03-12 02:25:11'),
(5, 'tesst1111', 'UXbAczfOON', '1', '1', '20.000', 0, '2019-03-26 03:38:57', '2019-03-26 03:39:17'),
(6, 'tesssss', '05efmmKZ09', '0', '2', '0.000', 50, '2019-03-26 21:03:23', '2019-03-26 21:03:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fast_foods`
--

CREATE TABLE `fast_foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(6,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fast_foods`
--

INSERT INTO `fast_foods` (`id`, `name`, `description`, `price`) VALUES
(2, 'Bong ngo', 'bong', '50.000'),
(3, 'ga', NULL, '100.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `fist_show` date DEFAULT NULL,
  `director` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `films`
--

INSERT INTO `films` (`id`, `title`, `img`, `description`, `language`, `subtitle`, `status`, `time`, `fist_show`, `director`, `actor`, `category_id`) VALUES
(1, 'HAI PHƯỢNG', 'resources/img/upload/download.jpeg', 'wqqc', 'Turkey', 'Viet nam', '1', 90, '2019-03-07', NULL, 'Marvel Studios', 1),
(2, 'CAPTAIN MARVEL', 'resources/img/upload/captainmarvel_1543909413009.jpg', NULL, 'United States', 'Viet nam', '1', 95, NULL, 'Marvel Studios', 'Marvel Studios', 1),
(3, 'CÔNG VIÊN KỲ DIỆU', 'resources/img/upload/congvienkydieu.jpg', NULL, 'United States', 'Viet nam', '1', 95, NULL, 'Robert Iscove, Clare Kilner, David Feiss', 'Robert Iscove, Clare Kilner, David Feiss', 1),
(4, 'YÊU NHẦM BẠN THÂN', 'resources/img/upload/160_14_7.jpg', NULL, 'United States', 'Viet nam', '1', 95, NULL, 'Robert Iscove, Clare Kilner, David Feiss', 'Robert Iscove, Clare Kilner, David Feiss', 1),
(5, 'ZOMBIE ĐẠI HẠ GIÁ', 'resources/img/upload/tof_160.jpg', NULL, 'United States', 'Viet nam', '1', 95, NULL, 'Marvel Studios', 'Robert Iscove, Clare Kilner, David Feiss', 1),
(6, 'CHÚA QUỶ', 'resources/img/upload/160_14_13.jpg', '121', 'United States', 'Viet nam', '1', 95, NULL, 'Marvel Studios', 'Robert Iscove, Clare Kilner, David Feiss', 1),
(7, 'sss', 'resources/img/upload/160_14_7.jpg', 'sss11', 'ss', 'ss', '2', 120, '2019-03-12', 'Marvel Studios', 'ss', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_02_19_074739_create_roles_table', 1),
(15, '2019_02_22_020823_add_column_users_table', 1),
(16, '2019_02_28_063008_create_categories_table', 1),
(17, '2019_02_28_063459_create_films_table', 1),
(18, '2019_02_28_071246_create_stores_table', 1),
(19, '2019_02_28_071750_create_rooms_table', 1),
(20, '2019_02_28_073302_create_seats_table', 1),
(21, '2019_02_28_074218_create_time_shows_table', 1),
(22, '2019_02_28_080305_create_order_fast_food_and_coupon_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `coupon_id` int(10) UNSIGNED DEFAULT NULL,
  `time_show_id` int(10) UNSIGNED DEFAULT NULL,
  `fast_food_ids` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` decimal(6,3) DEFAULT NULL,
  `sale_price` decimal(6,3) DEFAULT NULL,
  `final_price` decimal(6,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `time_show_id`, `fast_food_ids`, `seat`, `status`, `total_price`, `sale_price`, `final_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2', '0-6,0-9,0-10,2-4,2-5,2-7', '0', '650.000', '60.000', '260.000', '2019-03-13 19:51:44', '2019-04-01 23:30:16'),
(2, 1, 2, 1, '2', '0-6,0-7,0-8,1-2,2-6,2-8', '1', '650.000', '50.000', '325.000', '2019-03-13 19:55:57', '2019-03-14 01:24:42'),
(3, 1, NULL, 2, '2', '0-6,1-7,2-4,2-5,2-7,3-4', '1', '950.000', NULL, '950.000', '2019-03-13 23:07:09', '2019-03-13 23:07:09'),
(7, 1, NULL, 5, '2-2,3-2,', '0-15,0-12,0-11', NULL, '600.000', NULL, '600.000', '2019-03-31 19:17:01', '2019-03-31 19:17:01'),
(8, 1, NULL, 3, NULL, '2-9,2-10', '0', '260.000', NULL, '260.000', '2019-03-31 20:36:37', '2019-04-01 23:35:26'),
(9, 1, NULL, 4, '2-1,3-1,', '2-9, 1-3, 0-13, 0-11', NULL, '550.000', NULL, '550.000', '2019-03-31 20:51:14', '2019-03-31 20:51:14'),
(10, 1, NULL, 2, '2-1,', '-9,1-9,1-8', NULL, '500.000', NULL, '500.000', '2019-03-31 20:54:44', '2019-03-31 20:54:44'),
(11, 1, NULL, 1, '2-1,3-1,', '2-18,2-15,0-13,', NULL, '450.000', NULL, '450.000', '2019-03-31 21:04:45', '2019-03-31 21:04:45'),
(12, 1, NULL, 4, NULL, '0-10,0-15,0-16,2-12,2-15,2-16', '0', '600.000', NULL, '600.000', '2019-04-01 19:12:48', '2019-04-01 23:32:54'),
(13, 1, NULL, 4, NULL, '0-8,2-5,2-7', '0', '300.000', NULL, '300.000', '2019-04-01 21:26:31', '2019-04-01 23:34:44'),
(14, 1, NULL, 2, NULL, '3-11,3-12,2-12,2-11,', NULL, NULL, NULL, '600.000', '2019-04-02 02:49:12', '2019-04-02 02:49:12'),
(15, 1, NULL, 2, '3-1,', '3-14,2-15,0-14,1-14,', NULL, '700.000', NULL, '700.000', '2019-04-02 04:07:06', '2019-04-02 04:07:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'employee', 'A User', '2019-03-11 19:51:39', '2019-03-19 20:16:56'),
(2, 'user', 'A Saler User', '2019-03-11 19:51:39', '2019-03-11 19:51:39'),
(3, 'admin', 'A Admin User', '2019-03-11 19:51:39', '2019-03-11 19:51:39'),
(4, 'sale', '123', '2019-03-19 20:02:32', '2019-03-25 01:16:32'),
(5, 'them', '212', '2019-03-25 01:17:42', '2019-03-25 01:18:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 3, 1),
(2, 1, 2),
(3, 3, 3),
(4, 2, 3),
(5, 3, 1),
(6, 3, 1),
(7, 1, 4),
(8, 1, 32),
(10, 3, 31),
(11, 3, 31),
(15, 3, 32),
(16, 2, 38),
(17, 2, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `store_id`) VALUES
(2, 'Ha noi-room1', 2),
(3, 'HCM', 1),
(7, 'room 10', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seats`
--

CREATE TABLE `seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `row` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `seats`
--

INSERT INTO `seats` (`id`, `row`, `col`, `room_id`) VALUES
(5, '0', '18', 2),
(6, '1', '3', 2),
(7, '2', '18', 2),
(8, '0', '15', 3),
(9, '1', '15', 3),
(10, '2', '15', 3),
(11, '3', '15', 3),
(18, '0', '18', 7),
(19, '1', '18', 7),
(20, '2', '18', 7),
(21, '3', '19', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stores`
--

INSERT INTO `stores` (`id`, `name`, `description`) VALUES
(1, 'Ha noi', 'ha noi'),
(2, 'HCM', 'TP HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time_shows`
--

CREATE TABLE `time_shows` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED DEFAULT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_show` datetime DEFAULT NULL,
  `price` decimal(6,3) DEFAULT NULL,
  `sale_price` decimal(6,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `time_shows`
--

INSERT INTO `time_shows` (`id`, `film_id`, `room_id`, `status`, `time_show`, `price`, `sale_price`) VALUES
(1, 1, 2, '1', '2019-04-02 16:00:00', '120.000', '100.000'),
(2, 1, 3, '1', '2019-04-02 18:00:00', '150.000', NULL),
(3, 2, 2, '1', '2019-04-01 13:00:00', '130.000', NULL),
(4, 1, 2, '1', '2019-04-02 15:03:00', '100.000', NULL),
(5, 1, 2, '1', '2019-04-02 15:00:00', '100.000', NULL),
(6, 3, 7, '1', '2019-04-01 19:00:00', '120.000', '110.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `date_of_birth`) VALUES
(1, 'Admin Name', 'admin@gmail.com', '$2y$10$iyB9y53RXhvB6mm0C4slUu..uCX95vRAhd0nEPMcSHltWZ2T7ESUG', '0GGB5afP84lTRZPyVGWTpQHFujgGdmLOoqW05gY89XR72GwlpqVVSGoLzURd', '2019-03-11 19:51:39', '2019-03-25 18:25:52', '1234544', '2019-01-21'),
(2, 'admin2', 'admin2@gmail.com', '$2y$10$eHZny/slSGMmGrYfBotYTOJlXLgGxUFABtlMrDm9usRyPzTwuOUFS', NULL, '2019-03-14 20:41:29', '2019-03-14 20:41:29', '123456786', '2019-03-15'),
(3, 'admin2', 'admin23@gmail.com', '$2y$10$sxcCth7jsvqyvGeu9vJHce8CpDbbDCOjR.fDs1pRi44/cdMFmHN5C', NULL, '2019-03-19 20:45:23', '2019-03-19 20:45:23', '123456786', '2019-03-15'),
(4, 'tesst', 'tesst@gmail.com', '$2y$10$vY4RY6J/2lN.ga4fvM2BsesobZzzP90kVgPZHoxYMdveOT5VrcVP2', NULL, '2019-03-22 02:52:38', '2019-03-22 02:52:38', NULL, NULL),
(31, 'phung 123456 thuc', 'hoang212@gmail.com', '$2y$10$fRMPn0VyY9JR19AcM7Wi.ucR/vaHgPnGnnfPH.TefX.Scmw61PkuG', NULL, '2019-03-24 23:05:02', '2019-03-24 23:44:17', '123456789', '2019-03-07'),
(32, 'neww new222212', 'hoang222@gmail.com', '$2y$10$tjov3F/RmV05KSQOifge0.N.XB6ZN4VozGlI3.Fi9zilF8.yuCG/6', 'ZqeYHUqUZnx5t9oF7a95G19OtUWJfKTblUmWmhM1uryqLgfretcRVXQehu0P', '2019-03-24 23:48:30', '2019-03-25 00:49:44', '01234567891', '2019-03-02'),
(38, 'neww new', 'hoangsssss@gmail.com', '$2y$10$LrCA5UbvpKX7jTyG2.2t8es0ATP/0GMWmGSyRwQOmVxpb.UUOyNFG', NULL, '2019-04-01 02:28:35', '2019-04-01 02:28:35', '0123456789', '2019-04-01'),
(40, 'neww new', 'aaaa@gmail.com', '$2y$10$UkHoKs23ChEyGiTOtoT7ouEZdLviQEsGMe5wmmq6ezCgNgEvFH7iW', NULL, '2019-04-01 02:32:08', '2019-04-01 02:32:08', '0123456789', '2019-02-02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `fast_foods`
--
ALTER TABLE `fast_foods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`),
  ADD KEY `orders_time_show_id_foreign` (`time_show_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_store_id_foreign` (`store_id`);

--
-- Chỉ mục cho bảng `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_room_id_foreign` (`room_id`);

--
-- Chỉ mục cho bảng `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `time_shows`
--
ALTER TABLE `time_shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_shows_room_id_foreign` (`room_id`),
  ADD KEY `time_shows_film_id_foreign` (`film_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `fast_foods`
--
ALTER TABLE `fast_foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `time_shows`
--
ALTER TABLE `time_shows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `orders_time_show_id_foreign` FOREIGN KEY (`time_show_id`) REFERENCES `time_shows` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

--
-- Các ràng buộc cho bảng `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Các ràng buộc cho bảng `time_shows`
--
ALTER TABLE `time_shows`
  ADD CONSTRAINT `time_shows_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `time_shows_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
