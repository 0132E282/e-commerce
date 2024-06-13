-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2024 lúc 10:23 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `commerce_dev`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `status`, `user_id`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Chanel', 'fffffádads', 1, 1, 'chanel', NULL, '2024-05-13 03:59:56', '2024-05-29 01:51:07'),
(2, 'Hermès', NULL, 1, 1, 'hermes', NULL, '2024-05-13 04:01:55', '2024-05-13 14:07:55'),
(3, 'Gucci', NULL, 1, 1, 'gucci', NULL, '2024-05-13 04:02:03', '2024-05-13 14:07:56'),
(4, 'Louis Vuitton', NULL, 1, 1, 'louis-vuitton', NULL, '2024-05-13 04:02:11', '2024-05-13 14:08:08'),
(5, 'Prada', NULL, 1, 1, 'prada', NULL, '2024-05-13 04:02:18', '2024-05-13 04:02:18'),
(6, 'Dior', NULL, 1, 1, 'dior', NULL, '2024-05-13 04:02:26', '2024-05-13 04:02:26'),
(7, 'Christian Dior', NULL, 1, 1, 'christian-dior', NULL, '2024-05-13 04:02:32', '2024-05-13 04:02:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `views_count` bigint(20) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `status` int(1) DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `views_count`, `name`, `status`, `slug`, `description`, `deleted_at`, `parent_id`, `created_at`, `updated_at`) VALUES
(520, 0, 'thời trang nam', 1, 'thoi-trang-nam', '', NULL, NULL, '2024-05-03 09:18:10', '2024-05-07 07:18:55'),
(521, 0, 'Thời trang nữ', 1, 'thoi-trang-nu', '', NULL, NULL, '2024-05-03 09:18:10', '2024-05-03 09:18:10'),
(522, 0, 'Thời trang cho bé', 1, 'thoi-trang-cho-be', '', NULL, NULL, '2024-05-03 09:18:10', '2024-05-03 09:18:10'),
(523, 0, 'Phụ kiện', 1, 'phu-kien', '', NULL, NULL, '2024-05-03 09:18:10', '2024-05-03 09:18:10'),
(528, 0, 'Đầm', 1, 'dam', '', NULL, 521, '2024-05-03 09:41:11', '2024-05-03 09:41:11'),
(529, 0, 'Vấy', 1, 'vay', '', NULL, 521, '2024-05-03 09:41:11', '2024-05-03 09:41:11'),
(530, 0, 'Áo sơ mi', 1, 'ao-so-mi', NULL, NULL, 520, '2024-05-03 09:41:11', '2024-05-03 09:44:08'),
(531, 0, 'Vấy ngắn', 1, 'vay-ngan', '', NULL, 521, '2024-05-03 09:41:11', '2024-05-03 09:41:11'),
(532, 0, 'Áo sơ mi', 1, 'ao-so-mi', '', NULL, 521, '2024-05-03 09:43:00', '2024-05-03 09:43:00'),
(533, 0, 'Quần tây', 1, 'quan-tay', NULL, NULL, 520, '2024-05-03 09:43:00', '2024-05-03 09:44:24'),
(534, 0, 'Quần Sọt', 1, 'quan-sot', NULL, NULL, 520, '2024-05-03 09:43:00', '2024-05-03 09:44:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'f41d9eab-160a-4882-b00c-e58fdd9743c0', 'redis', 'default', '{\"uuid\":\"f41d9eab-160a-4882-b00c-e58fdd9743c0\",\"timeout\":null,\"id\":\"PvYCWqx7A946UY4OPGgJPE7S3Y4PfN7G\",\"backoff\":null,\"displayName\":\"App\\\\Jobs\\\\SendMailJob\",\"maxTries\":null,\"failOnTimeout\":false,\"maxExceptions\":null,\"retryUntil\":null,\"data\":{\"command\":\"O:20:\\\"App\\\\Jobs\\\\SendMailJob\\\":3:{s:9:\\\"\\u0000*\\u0000toMail\\\";s:31:\\\"nguyenhoangphuc201122@gmail.com\\\";s:7:\\\"\\u0000*\\u0000mail\\\";O:19:\\\"App\\\\Mail\\\\ConcatMail\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Orders\\\";s:2:\\\"id\\\";i:74;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-06-12 14:55:15.405207\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\",\"commandName\":\"App\\\\Jobs\\\\SendMailJob\"},\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"attempts\":1}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\SendMailJob has been attempted too many times. in D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\MaxAttemptsExceededException.php:24\nStack trace:\n#0 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(785): Illuminate\\Queue\\MaxAttemptsExceededException::forJob(Object(Illuminate\\Queue\\Jobs\\RedisJob))\n#1 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(519): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\RedisJob))\n#2 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(429): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), 1)\n#3 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#4 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(333): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->runNextJob(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#6 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#7 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#8 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#9 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#10 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#11 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#12 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#13 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#15 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 D:\\coder\\htdoc\\laravel\\e-commerce\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 D:\\coder\\htdoc\\laravel\\e-commerce\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}', '2024-06-12 07:58:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `location` varchar(15) DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `hidden`, `description`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '213', NULL, 0, NULL, 1, '2024-05-09 08:03:14', '2024-05-09 09:31:45', '2024-05-09 09:31:45'),
(2, 'main', 'top', 0, '123', 1, '2024-05-09 09:01:43', '2024-05-27 01:14:13', '2024-05-27 01:14:13'),
(3, '213', NULL, 0, '123123', 1, '2024-05-09 09:04:11', '2024-05-09 09:19:52', '2024-05-09 09:19:52'),
(4, 'main-sub', 'bottom', 0, NULL, 1, '2024-05-15 01:44:31', '2024-05-15 01:44:31', NULL),
(5, 'main', 'top', 0, NULL, 1, '2024-05-27 01:14:32', '2024-05-27 01:14:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_item`
--

CREATE TABLE `menu_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `location` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_item`
--

INSERT INTO `menu_item` (`id`, `title`, `link`, `type`, `parent_id`, `menu_id`, `created_at`, `updated_at`, `deleted_at`, `location`) VALUES
(45, 'Trang chủ', 'http://127.0.0.1:8000', 2, NULL, 5, '2024-05-27 01:17:55', '2024-05-27 06:40:08', NULL, NULL),
(47, 'Áo sơ mi', 'http://127.0.0.1:8000/shop/category/ao-so-mi', 1, 54, 4, '2024-05-29 02:01:01', '2024-05-29 02:15:35', NULL, NULL),
(48, 'Quần tây', 'http://127.0.0.1:8000/shop/category/quan-tay', 1, 54, 4, '2024-05-29 02:01:01', '2024-05-29 02:15:35', NULL, NULL),
(52, 'Prada', 'http://127.0.0.1:8000/shop/brands/prada', 4, 58, 4, '2024-05-29 02:14:14', '2024-05-29 04:37:02', NULL, NULL),
(53, 'Dior', 'http://127.0.0.1:8000/shop/brands/dior', 4, 58, 4, '2024-05-29 02:14:14', '2024-05-29 04:37:02', NULL, NULL),
(54, 'thời trang nam', 'http://127.0.0.1:8000/shop/category/thoi-trang-nam', 1, NULL, 4, '2024-05-29 02:15:25', '2024-05-29 02:15:25', NULL, NULL),
(58, 'Thương hiệu', NULL, 3, NULL, 4, '2024-05-29 04:36:57', '2024-05-29 04:36:57', NULL, NULL),
(59, 'thời trang nam', 'http://127.0.0.1:8000/shop/category/thoi-trang-nam', 1, NULL, 5, '2024-05-29 04:37:46', '2024-05-29 04:37:46', NULL, NULL),
(60, 'Áo sơ mi', 'http://127.0.0.1:8000/shop/category/ao-so-mi', 1, 59, 5, '2024-05-29 04:37:46', '2024-05-29 04:37:51', NULL, NULL),
(61, 'Quần tây', 'http://127.0.0.1:8000/shop/category/quan-tay', 1, 59, 5, '2024-05-29 04:37:46', '2024-05-29 04:37:51', NULL, NULL),
(62, 'Quần Sọt', 'http://127.0.0.1:8000/shop/category/quan-sot', 1, 59, 5, '2024-05-29 04:37:46', '2024-05-29 04:37:51', NULL, NULL),
(63, 'Đầm', 'http://127.0.0.1:8000/shop/category/dam', 1, 67, 5, '2024-05-29 04:37:57', '2024-05-29 04:38:07', NULL, NULL),
(64, 'Vấy', 'http://127.0.0.1:8000/shop/category/vay', 1, 67, 5, '2024-05-29 04:37:57', '2024-05-29 04:38:07', NULL, NULL),
(65, 'Vấy ngắn', 'http://127.0.0.1:8000/shop/category/vay-ngan', 1, 67, 5, '2024-05-29 04:37:57', '2024-05-29 04:38:07', NULL, NULL),
(66, 'Áo sơ mi', 'http://127.0.0.1:8000/shop/category/ao-so-mi', 1, 67, 5, '2024-05-29 04:37:57', '2024-05-29 04:38:07', NULL, NULL),
(67, 'Thời trang nữ', 'http://127.0.0.1:8000/shop/category/thoi-trang-nu', 1, NULL, 5, '2024-05-29 04:37:59', '2024-05-29 04:37:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_05_044546_crate-category', 1),
(7, '2023_09_08_033846__create-products', 1),
(8, '2023_09_08_040107__create-tag', 1),
(9, '2023_09_08_040150__create-product-tags', 1),
(12, '2023_09_17_163318_create_permissions', 1),
(13, '2023_09_17_163512_create_roles', 1),
(14, '2023_09_18_045952_create-user_role', 1),
(20, '2024_05_05_051112_create_product_variations_table', 2),
(21, '2023_09_12_071550__crete_slider', 3),
(22, '2023_09_07_110949__create-menus', 4),
(23, '2024_05_09_134445_tab-menu-item', 4),
(24, '2023_09_18_050432__create-permissions_roles', 5),
(25, '2023_09_14_103414__create-setting', 6),
(26, '2024_05_13_060801_create-brands', 7),
(27, '2024_05_13_104309_add_products', 8),
(31, '2023_09_22_200548__create-orders', 9),
(32, '2024_04_30_150131_order-item', 9),
(33, '2024_05_22_173524_add-for-key-order-item', 10),
(34, '2024_05_25_150533_create_comments', 11),
(35, '2024_06_08_054507_create_notifications_table', 12),
(36, '2024_06_11_035616_create_jobs_table', 13),
(37, '2024_06_11_061623_add_google_id_to_users', 14),
(38, '2024_06_11_081044_add_facebook_id_to_users', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('005afd56-ff51-4020-8162-b0681e6fee9d', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:37:49', '2024-06-12 07:37:49'),
('07d24f66-7ba6-424c-9a19-27e1fa0e1809', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:38:03', '2024-06-12 07:38:03'),
('0acc63da-6ad2-45b7-a379-da91d00e7d30', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:30:54', '2024-06-12 07:30:54'),
('0c3247eb-7986-495b-9b8e-b1a158ff982f', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:37:49', '2024-06-12 07:37:49'),
('1dfca346-1137-4504-ac3e-a460b3b335ed', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:42:55', '2024-06-12 07:42:55'),
('1eb2ece7-52cd-4e6b-b273-7e772bd04cff', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:43:06', '2024-06-12 07:43:06'),
('20e4593e-a89f-4188-b864-86e520011b89', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:44:15', '2024-06-12 07:44:15'),
('42091642-5a46-414c-854e-bc7a5e33cfbd', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #472266\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/75\",\"review\":{\"id\":75,\"user_id\":8,\"status\":null,\"note\":\"1212\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"An Giang\\\",\\\"district\\\":\\\"An Ph\\\\u00fa\\\",\\\"wards\\\":\\\"An Ph\\\\u00fa\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":472266,\"created_at\":\"2024-06-12T15:09:19.000000Z\",\"updated_at\":\"2024-06-12T15:09:19.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 08:09:20', '2024-06-12 08:09:20'),
('53484c63-1ce1-46e9-bf84-f9571d3fe683', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:53:15', '2024-06-12 07:53:15'),
('578d1f17-9010-4fd3-bf39-c3ef8d8710ba', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:53:21', '2024-06-12 07:53:21'),
('598add98-3e48-46ba-a975-c66b73bed008', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:42:31', '2024-06-12 07:42:31'),
('6b9a89f3-fb81-421c-b9fd-cf135ceeccad', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:53:15', '2024-06-12 07:53:15'),
('6e755e60-88d0-45c4-b52b-badb4dc35f32', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:53:21', '2024-06-12 07:53:21'),
('738c6674-18b0-42fa-85af-703d7a839eea', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #738801\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/73\",\"review\":{\"id\":73,\"user_id\":1,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"12\\\",\\\"wards\\\":\\\"\\\\u0110\\\\u00f4ng H\\\\u01b0ng Thu\\\\u1eadn\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":738801,\"created_at\":\"2024-06-11T06:11:09.000000Z\",\"updated_at\":\"2024-06-11T06:11:09.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-10 23:11:10', '2024-06-10 23:11:10'),
('804b2c32-eeb7-4d6f-ba93-715465cf42eb', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:42:40', '2024-06-12 07:42:40'),
('90affa4e-1ddb-4060-aeaa-734feda420a2', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #472266\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/75\",\"review\":{\"id\":75,\"user_id\":8,\"status\":null,\"note\":\"1212\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"An Giang\\\",\\\"district\\\":\\\"An Ph\\\\u00fa\\\",\\\"wards\\\":\\\"An Ph\\\\u00fa\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":472266,\"created_at\":\"2024-06-12T15:09:19.000000Z\",\"updated_at\":\"2024-06-12T15:09:19.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 08:09:20', '2024-06-12 08:09:20'),
('98daf3b0-0a4a-42c8-8dbf-3b72ba392b35', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:42:40', '2024-06-12 07:42:40'),
('9b4d08c0-f462-4de8-b7a4-ff6f4012601b', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:38:03', '2024-06-12 07:38:03'),
('aa780a4a-3fa4-43b5-8e63-252355b188b1', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 1, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #738801\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/73\",\"review\":{\"id\":73,\"user_id\":1,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"12\\\",\\\"wards\\\":\\\"\\\\u0110\\\\u00f4ng H\\\\u01b0ng Thu\\\\u1eadn\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":738801,\"created_at\":\"2024-06-11T06:11:09.000000Z\",\"updated_at\":\"2024-06-11T06:11:09.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-10 23:11:10', '2024-06-10 23:11:10'),
('bd9957ff-1b93-4d5e-92e3-94725f81a0ad', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:42:31', '2024-06-12 07:42:31'),
('ccf3067b-0291-42e7-8d59-4d924231cf9c', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:44:15', '2024-06-12 07:44:15'),
('cda419e8-7a50-4fc4-9d05-211cf38e1c1e', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 2, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:42:55', '2024-06-12 07:42:55'),
('d97891ae-225e-4837-85ac-c3cecf2eb9d0', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:43:06', '2024-06-12 07:43:06'),
('df2c148d-f953-4d07-91da-70c53ba73a4c', 'App\\Notifications\\InvoicePaid', 'App\\Models\\User', 8, '{\"title\":\"c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi\",\"content\":\"\\u0111\\u01a1n h\\u00e0ng c\\u1ea7n c\\u1ea7n x\\u00e1t nh\\u1eadn #858343\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/detail\\/74\",\"review\":{\"id\":74,\"user_id\":8,\"status\":null,\"note\":\"123123\",\"fullname\":\"Ph\\u00fac Nuy\\u1ec5n Ho\\u00e0ng\",\"address\":\"{\\\"provinces\\\":\\\"H\\\\u1ed3 Ch\\\\u00ed Minh\\\",\\\"district\\\":\\\"11\\\",\\\"wards\\\":\\\"03\\\",\\\"details\\\":\\\"123\\\"}\",\"email\":\"nguyenhoangphuc201122@gmail.com\",\"phone\":\"0777575100\",\"payment\":null,\"paid_at\":null,\"phone_verified_at\":null,\"trading_code\":858343,\"created_at\":\"2024-06-12T14:30:53.000000Z\",\"updated_at\":\"2024-06-12T14:30:53.000000Z\",\"deleted_at\":null}}', NULL, '2024-06-12 07:30:54', '2024-06-12 07:30:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`address`)),
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `trading_code` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `note`, `fullname`, `address`, `email`, `phone`, `payment`, `paid_at`, `phone_verified_at`, `trading_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 815744, '2024-05-22 20:12:53', '2024-05-29 00:54:26', NULL),
(2, 1, NULL, '12', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"5\",\"wards\":\"05\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 661786, '2024-05-24 06:19:45', '2024-05-24 06:19:45', NULL),
(3, 1, NULL, '1222', 'Nguyễn văn A', '{\"provinces\":\"B\\u1eafc Giang\",\"district\":\"Hi\\u1ec7p H\\u00f2a\",\"wards\":\"Ch\\u00e2u Minh\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575101', NULL, NULL, NULL, 916495, '2024-05-24 07:46:59', '2024-05-24 07:46:59', NULL),
(4, 1, NULL, '122', 'Lê thị trăm', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"06\",\"details\":\"2222\"}', 'nguyenhoangphuc201122@gmail.com', '0777575101', NULL, NULL, NULL, 575095, '2024-05-24 07:47:37', '2024-05-24 07:47:37', NULL),
(5, 1, 1, '12123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"B\\u00ecnh Th\\u1ea1nh\",\"wards\":\"14\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 95188, '2024-05-25 06:10:44', '2024-05-25 22:22:42', NULL),
(6, 1, NULL, NULL, 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00ecnh D\\u01b0\\u01a1ng\",\"district\":\"B\\u1ebfn C\\u00e1t\",\"wards\":\"Ch\\u00e1nh Ph\\u00fa H\\u00f2a\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 342791, '2024-05-25 06:17:10', '2024-05-25 06:17:10', NULL),
(7, 1, 1, 'qư', 'Nguyễn văn B', '{\"provinces\":\"\\u0110i\\u1ec7n Bi\\u00ean\",\"district\":\"M\\u01b0\\u1eddng Lay\",\"wards\":\"Na Lay\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 125615, '2024-05-25 07:20:48', '2024-05-25 22:22:23', NULL),
(8, NULL, NULL, 'ádasd', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'VN_PAY', NULL, NULL, 4574, '2024-05-27 13:01:25', '2024-05-27 13:01:25', NULL),
(9, NULL, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"B\\u00e0 R\\u1ecba\",\"wards\":\"Ho\\u00e0 Long\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'VN_PAY', NULL, NULL, 673887, '2024-05-27 13:13:24', '2024-05-27 13:13:24', NULL),
(10, NULL, NULL, '121312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"12\",\"wards\":\"\\u0110\\u00f4ng H\\u01b0ng Thu\\u1eadn\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 251215, '2024-05-27 13:17:28', '2024-05-27 13:17:28', NULL),
(11, NULL, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 929404, '2024-05-27 13:18:02', '2024-05-27 13:18:02', NULL),
(12, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"05\",\"details\":\"aaa\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', '2024-05-27 13:32:11', NULL, 227440, '2024-05-27 13:30:45', '2024-05-27 13:32:54', NULL),
(13, 1, 0, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"3\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'VN_PAY', NULL, NULL, 700725, '2024-05-27 13:38:37', '2024-05-27 13:39:51', NULL),
(14, NULL, NULL, '12312313', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"An Giang\",\"district\":\"Ch\\u00e2u Ph\\u00fa\",\"wards\":\"B\\u00ecnh Long\",\"details\":\"aaa\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 152717, '2024-05-28 06:44:54', '2024-05-28 06:44:54', NULL),
(15, NULL, NULL, '12312313', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"An Giang\",\"district\":\"Ch\\u00e2u Ph\\u00fa\",\"wards\":\"B\\u00ecnh Long\",\"details\":\"aaa\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 16834, '2024-05-28 06:45:06', '2024-05-28 06:45:06', NULL),
(16, NULL, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"04\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 739640, '2024-05-28 06:45:53', '2024-05-28 06:45:53', NULL),
(17, NULL, 0, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 894886, '2024-05-28 06:46:41', '2024-05-28 06:46:42', NULL),
(18, NULL, NULL, '13123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"04\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 207701, '2024-05-28 06:54:34', '2024-05-28 06:54:34', NULL),
(19, NULL, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 211071, '2024-05-28 06:55:10', '2024-05-28 06:55:10', NULL),
(20, 1, NULL, '2122', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc K\\u1ea1n\",\"district\":\"B\\u1eafc K\\u1ea1n\",\"wards\":\"D\\u01b0\\u01a1ng Quang\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 273442, '2024-05-28 11:01:29', '2024-05-28 11:01:29', NULL),
(21, 1, NULL, '2122', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc K\\u1ea1n\",\"district\":\"B\\u1eafc K\\u1ea1n\",\"wards\":\"D\\u01b0\\u01a1ng Quang\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 44391, '2024-05-28 11:01:37', '2024-05-28 11:01:37', NULL),
(22, 1, NULL, '2122', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc K\\u1ea1n\",\"district\":\"B\\u1eafc K\\u1ea1n\",\"wards\":\"D\\u01b0\\u01a1ng Quang\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 373076, '2024-05-28 11:01:52', '2024-05-28 11:01:52', NULL),
(23, 1, NULL, '123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"01\",\"details\":\"12123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 964858, '2024-05-28 11:02:27', '2024-05-28 11:02:27', NULL),
(24, 1, NULL, '12', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 123341, '2024-05-28 11:02:53', '2024-05-28 11:02:53', NULL),
(25, 1, NULL, '12', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 504100, '2024-05-28 11:05:22', '2024-05-28 11:05:22', NULL),
(26, 1, NULL, '122', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"B\\u00e0 R\\u1ecba\",\"wards\":\"Ho\\u00e0 Long\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 907877, '2024-05-28 11:05:55', '2024-05-28 11:05:55', NULL),
(27, 1, NULL, '122', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"B\\u00e0 R\\u1ecba\",\"wards\":\"Ho\\u00e0 Long\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 19815, '2024-05-28 11:06:06', '2024-05-28 11:06:06', NULL),
(28, 1, NULL, '122112', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 11911, '2024-05-28 11:07:44', '2024-05-28 11:07:44', NULL),
(29, 1, NULL, '123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 263329, '2024-05-28 11:09:18', '2024-05-28 11:09:18', NULL),
(30, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"01\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 643093, '2024-05-28 11:09:33', '2024-05-28 11:09:33', NULL),
(31, 1, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"01\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 602097, '2024-05-28 11:09:55', '2024-05-28 11:09:55', NULL),
(32, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 388705, '2024-05-28 11:10:20', '2024-05-28 11:10:20', NULL),
(33, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 921760, '2024-05-28 11:10:57', '2024-05-28 11:10:57', NULL),
(34, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 646999, '2024-05-28 11:12:47', '2024-05-28 11:12:47', NULL),
(35, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 797919, '2024-05-28 11:13:09', '2024-05-28 11:13:09', NULL),
(36, 1, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"01\",\"details\":\"123123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 488794, '2024-05-28 11:13:53', '2024-05-28 11:13:53', NULL),
(37, 1, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"01\",\"details\":\"123123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 166342, '2024-05-28 11:13:59', '2024-05-28 11:13:59', NULL),
(38, 1, NULL, '123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 327120, '2024-05-28 11:14:30', '2024-05-28 11:14:30', NULL),
(39, 1, NULL, '123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 377966, '2024-05-28 11:14:56', '2024-05-28 11:14:56', NULL),
(40, 1, NULL, '31231', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"04\",\"details\":\"12312312\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 789740, '2024-05-28 11:15:34', '2024-05-28 11:15:34', NULL),
(41, NULL, NULL, '123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"Ch\\u00e2u \\u0110\\u1ee9c\",\"wards\":\"B\\u00e0u Chinh\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 359088, '2024-05-28 23:32:17', '2024-05-28 23:32:17', NULL),
(42, NULL, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 380519, '2024-05-28 23:32:59', '2024-05-28 23:32:59', NULL),
(43, NULL, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 341118, '2024-05-28 23:34:51', '2024-05-28 23:34:51', NULL),
(44, NULL, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 735860, '2024-05-28 23:35:03', '2024-05-28 23:35:03', NULL),
(45, NULL, NULL, '23123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"04\",\"details\":\"1231\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 60000, '2024-05-28 23:36:45', '2024-05-28 23:36:45', NULL),
(46, NULL, NULL, '31231', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc Giang\",\"district\":\"Hi\\u1ec7p H\\u00f2a\",\"wards\":\"B\\u1eafc L\\u00fd\",\"details\":\"12312\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 272814, '2024-05-28 23:39:01', '2024-05-28 23:39:01', NULL),
(47, NULL, NULL, '31231', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc Giang\",\"district\":\"Hi\\u1ec7p H\\u00f2a\",\"wards\":\"B\\u1eafc L\\u00fd\",\"details\":\"12312\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 2267, '2024-05-28 23:39:05', '2024-05-28 23:39:05', NULL),
(48, NULL, NULL, '31231', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc Giang\",\"district\":\"Hi\\u1ec7p H\\u00f2a\",\"wards\":\"B\\u1eafc L\\u00fd\",\"details\":\"12312\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 763112, '2024-05-28 23:39:17', '2024-05-28 23:39:17', NULL),
(49, NULL, NULL, '123213', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"04\",\"details\":\"aaa\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 644811, '2024-05-28 23:41:12', '2024-05-28 23:41:12', NULL),
(50, 1, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"Ch\\u00e2u \\u0110\\u1ee9c\",\"wards\":\"B\\u00ecnh Gi\\u00e3\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'VN_PAY', NULL, NULL, 590571, '2024-05-28 23:53:08', '2024-05-28 23:53:08', NULL),
(51, 1, NULL, '121212', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"01\",\"details\":\"1212\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'VN_PAY', NULL, NULL, 583610, '2024-05-28 23:54:12', '2024-05-28 23:54:12', NULL),
(52, 1, NULL, '121212', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc K\\u1ea1n\",\"district\":\"Ch\\u1ee3 \\u0110\\u1ed3n\",\"wards\":\"B\\u1eb1ng Ph\\u00fac\",\"details\":\"1212\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'VN_PAY', NULL, NULL, 424755, '2024-05-28 23:54:23', '2024-06-01 05:23:22', NULL),
(53, 1, NULL, '3122', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1ea1c Li\\u00eau\",\"district\":\"\\u0110\\u00f4ng H\\u1ea3i\",\"wards\":\"An Ph\\u00fac\",\"details\":\"1231\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'VN_PAY', NULL, NULL, 422776, '2024-05-28 23:55:07', '2024-05-28 23:55:07', NULL),
(54, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"1\",\"wards\":\"C\\u1ea7u Kho\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', 'MOMO', NULL, NULL, 197080, '2024-05-29 00:00:07', '2024-05-29 00:00:07', NULL),
(55, 1, NULL, '1231233', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"12\",\"wards\":\"\\u0110\\u00f4ng H\\u01b0ng Thu\\u1eadn\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 645868, '2024-06-03 04:50:20', '2024-06-03 04:50:20', NULL),
(56, 1, 0, '1231312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"12\",\"wards\":\"\\u0110\\u00f4ng H\\u01b0ng Thu\\u1eadn\",\"details\":\"aaa\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 66880, '2024-06-03 04:52:34', '2024-06-03 04:53:43', NULL),
(57, 1, 0, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 875912, '2024-06-03 04:54:04', '2024-06-03 04:54:06', NULL),
(58, 1, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 853276, '2024-06-03 05:41:08', '2024-06-03 05:41:08', NULL),
(59, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"10\",\"wards\":\"02\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 688682, '2024-06-03 08:00:12', '2024-06-03 08:00:12', NULL),
(60, NULL, NULL, '12312', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"12\",\"wards\":\"Hi\\u1ec7p Th\\u00e0nh\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 159661, '2024-06-07 16:20:46', '2024-06-07 16:20:46', NULL),
(61, NULL, NULL, '123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"aaa\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 835832, '2024-06-08 20:21:24', '2024-06-08 20:21:24', NULL),
(62, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 996366, '2024-06-09 00:31:17', '2024-06-09 00:31:17', NULL),
(63, 1, NULL, 'mnbnb', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 929055, '2024-06-09 06:40:41', '2024-06-09 06:40:41', NULL),
(64, NULL, NULL, '12', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"B\\u00e0 R\\u1ecba\",\"wards\":\"Kim Dinh\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 535253, '2024-06-10 04:29:06', '2024-06-10 04:29:06', NULL),
(65, 1, NULL, '12313', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc K\\u1ea1n\",\"district\":\"B\\u1ea1ch Th\\u00f4ng\",\"wards\":\"Cao S\\u01a1n\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 539319, '2024-06-10 17:02:55', '2024-06-10 17:02:55', NULL),
(66, 1, 1, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"3\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 952027, '2024-06-10 17:34:40', '2024-06-10 19:09:02', NULL),
(67, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u1eafc Giang\",\"district\":\"Hi\\u1ec7p H\\u00f2a\",\"wards\":\"Ch\\u00e2u Minh\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 520933, '2024-06-10 19:15:02', '2024-06-10 19:15:02', NULL),
(68, 1, NULL, NULL, 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"Ch\\u00e2u \\u0110\\u1ee9c\",\"wards\":\"B\\u00e0u Chinh\",\"details\":\"123123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 333983, '2024-06-10 19:16:22', '2024-06-10 19:16:22', NULL),
(69, 1, NULL, NULL, 'Phúc Nuyễn Hoàng', '{\"provinces\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"district\":\"\\u0110\\u1ea5t \\u0110\\u1ecf\",\"wards\":\"L\\u00e1ng D\\u00e0i\",\"details\":\"123123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 651702, '2024-06-10 21:09:28', '2024-06-10 21:09:28', NULL),
(70, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"12\",\"wards\":\"Hi\\u1ec7p Th\\u00e0nh\",\"details\":\"aaa\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 485465, '2024-06-10 21:21:58', '2024-06-10 21:21:58', NULL),
(71, 1, NULL, '111', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"12\",\"wards\":\"\\u0110\\u00f4ng H\\u01b0ng Thu\\u1eadn\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 912930, '2024-06-10 21:32:38', '2024-06-10 21:32:38', NULL),
(72, 1, NULL, '1', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 583780, '2024-06-10 21:33:21', '2024-06-10 21:33:21', NULL),
(73, 1, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"12\",\"wards\":\"\\u0110\\u00f4ng H\\u01b0ng Thu\\u1eadn\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 738801, '2024-06-10 23:11:09', '2024-06-10 23:11:09', NULL),
(74, 8, NULL, '123123', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"H\\u1ed3 Ch\\u00ed Minh\",\"district\":\"11\",\"wards\":\"03\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 858343, '2024-06-12 07:30:53', '2024-06-12 07:30:53', NULL),
(75, 8, NULL, '1212', 'Phúc Nuyễn Hoàng', '{\"provinces\":\"An Giang\",\"district\":\"An Ph\\u00fa\",\"wards\":\"An Ph\\u00fa\",\"details\":\"123\"}', 'nguyenhoangphuc201122@gmail.com', '0777575100', NULL, NULL, NULL, 472266, '2024-06-12 08:09:19', '2024-06-12 08:09:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`, `variation_id`) VALUES
(1, 1, 1, 387000, '2024-05-22 20:12:53', '2024-05-22 20:12:53', 36),
(2, 2, 1, 257000, '2024-05-24 06:19:45', '2024-05-24 06:19:45', 32),
(3, 3, 1, 257000, '2024-05-24 07:46:59', '2024-05-24 07:46:59', 31),
(4, 4, 1, 387000, '2024-05-24 07:47:37', '2024-05-24 07:47:37', 34),
(5, 5, 1, 2298000, '2024-05-25 06:10:44', '2024-05-25 06:10:44', 55),
(6, 6, 1, 2298000, '2024-05-25 06:17:10', '2024-05-25 06:17:10', 56),
(7, 7, 3, 555000, '2024-05-25 07:20:48', '2024-05-25 07:20:48', 49),
(8, 8, 1, 257000, '2024-05-27 13:01:25', '2024-05-27 13:01:25', 32),
(9, 9, 1, 257000, '2024-05-27 13:13:24', '2024-05-27 13:13:24', 31),
(10, 10, 1, 257000, '2024-05-27 13:17:28', '2024-05-27 13:17:28', 31),
(11, 11, 1, 257000, '2024-05-27 13:18:02', '2024-05-27 13:18:02', 31),
(12, 12, 1, 257000, '2024-05-27 13:30:45', '2024-05-27 13:30:45', 33),
(13, 13, 1, 257000, '2024-05-27 13:38:37', '2024-05-27 13:38:37', 32),
(14, 14, 2, 2298000, '2024-05-28 06:44:54', '2024-05-28 06:44:54', 56),
(15, 15, 2, 2298000, '2024-05-28 06:45:06', '2024-05-28 06:45:06', 56),
(16, 16, 2, 2298000, '2024-05-28 06:45:53', '2024-05-28 06:45:53', 56),
(17, 17, 2, 2298000, '2024-05-28 06:46:41', '2024-05-28 06:46:41', 56),
(18, 18, 2, 387000, '2024-05-28 06:54:34', '2024-05-28 06:54:34', 35),
(19, 19, 1, 327000, '2024-05-28 06:55:10', '2024-05-28 06:55:10', 51),
(20, 20, 1, 2298000, '2024-05-28 11:01:29', '2024-05-28 11:01:29', 55),
(21, 21, 1, 2298000, '2024-05-28 11:01:37', '2024-05-28 11:01:37', 55),
(22, 22, 1, 2298000, '2024-05-28 11:01:52', '2024-05-28 11:01:52', 55),
(23, 23, 1, 2298000, '2024-05-28 11:02:27', '2024-05-28 11:02:27', 55),
(24, 24, 1, 2298000, '2024-05-28 11:02:53', '2024-05-28 11:02:53', 55),
(25, 25, 1, 2298000, '2024-05-28 11:05:22', '2024-05-28 11:05:22', 55),
(26, 26, 1, 2298000, '2024-05-28 11:05:55', '2024-05-28 11:05:55', 55),
(27, 27, 1, 2298000, '2024-05-28 11:06:06', '2024-05-28 11:06:06', 55),
(28, 28, 1, 2298000, '2024-05-28 11:07:44', '2024-05-28 11:07:44', 54),
(29, 29, 1, 2298000, '2024-05-28 11:09:18', '2024-05-28 11:09:18', 54),
(30, 30, 1, 2298000, '2024-05-28 11:09:33', '2024-05-28 11:09:33', 54),
(31, 31, 1, 2298000, '2024-05-28 11:09:55', '2024-05-28 11:09:55', 54),
(32, 32, 1, 2298000, '2024-05-28 11:10:20', '2024-05-28 11:10:20', 54),
(33, 33, 1, 2298000, '2024-05-28 11:10:57', '2024-05-28 11:10:57', 54),
(34, 34, 1, 2298000, '2024-05-28 11:12:47', '2024-05-28 11:12:47', 54),
(35, 35, 1, 2298000, '2024-05-28 11:13:09', '2024-05-28 11:13:09', 54),
(36, 36, 1, 2298000, '2024-05-28 11:13:53', '2024-05-28 11:13:53', 54),
(37, 37, 1, 2298000, '2024-05-28 11:13:59', '2024-05-28 11:13:59', 54),
(38, 38, 1, 2298000, '2024-05-28 11:14:30', '2024-05-28 11:14:30', 54),
(39, 39, 1, 2298000, '2024-05-28 11:14:56', '2024-05-28 11:14:56', 54),
(40, 40, 1, 2298000, '2024-05-28 11:15:34', '2024-05-28 11:15:34', 54),
(41, 41, 1, 555000, '2024-05-28 23:32:17', '2024-05-28 23:32:17', 49),
(42, 42, 1, 555000, '2024-05-28 23:32:59', '2024-05-28 23:32:59', 49),
(43, 43, 1, 555000, '2024-05-28 23:34:51', '2024-05-28 23:34:51', 49),
(44, 44, 1, 555000, '2024-05-28 23:35:03', '2024-05-28 23:35:03', 49),
(45, 45, 1, 555000, '2024-05-28 23:36:45', '2024-05-28 23:36:45', 49),
(46, 46, 1, 555000, '2024-05-28 23:39:01', '2024-05-28 23:39:01', 49),
(47, 47, 1, 555000, '2024-05-28 23:39:05', '2024-05-28 23:39:05', 49),
(48, 48, 1, 555000, '2024-05-28 23:39:18', '2024-05-28 23:39:18', 49),
(49, 49, 1, 555000, '2024-05-28 23:41:12', '2024-05-28 23:41:12', 49),
(50, 50, 1, 327000, '2024-05-28 23:53:08', '2024-05-28 23:53:08', 52),
(51, 51, 1, 327000, '2024-05-28 23:54:12', '2024-05-28 23:54:12', 50),
(52, 52, 1, 327000, '2024-05-28 23:54:23', '2024-05-28 23:54:23', 50),
(53, 53, 1, 327000, '2024-05-28 23:55:07', '2024-05-28 23:55:07', 50),
(54, 54, 1, 327000, '2024-05-29 00:00:07', '2024-05-29 00:00:07', 50),
(55, 54, 4, 2298000, '2024-06-01 05:15:15', '2024-06-01 05:15:15', 55),
(56, 55, 1, 257000, '2024-06-03 04:50:20', '2024-06-03 04:50:20', 32),
(57, 56, 1, 257000, '2024-06-03 04:52:34', '2024-06-03 04:52:34', 31),
(58, 57, 1, 257000, '2024-06-03 04:54:04', '2024-06-03 04:54:04', 31),
(59, 58, 1, 257000, '2024-06-03 05:41:08', '2024-06-03 05:41:08', 33),
(60, 59, 1, 257000, '2024-06-03 08:00:12', '2024-06-03 08:00:12', 31),
(61, 60, 1, 257000, '2024-06-07 16:20:46', '2024-06-07 16:20:46', 32),
(62, 61, 1, 2298000, '2024-06-08 20:21:24', '2024-06-08 20:21:24', 57),
(63, 62, 1, 257000, '2024-06-09 00:31:17', '2024-06-09 00:31:17', 31),
(64, 63, 1, 2298000, '2024-06-09 06:40:41', '2024-06-09 06:40:41', 55),
(65, 64, 1, 387000, '2024-06-10 04:29:06', '2024-06-10 04:29:06', 37),
(66, 65, 1, 387000, '2024-06-10 17:02:55', '2024-06-10 17:02:55', 34),
(67, 66, 1, 387000, '2024-06-10 17:34:40', '2024-06-10 17:34:40', 36),
(68, 67, 1, 555000, '2024-06-10 19:15:02', '2024-06-10 19:15:02', 49),
(69, 68, 1, 327000, '2024-06-10 19:16:22', '2024-06-10 19:16:22', 52),
(70, 69, 1, 555000, '2024-06-10 21:09:28', '2024-06-10 21:09:28', 49),
(71, 70, 1, 555000, '2024-06-10 21:21:58', '2024-06-10 21:21:58', 49),
(72, 71, 1, 555000, '2024-06-10 21:32:38', '2024-06-10 21:32:38', 49),
(73, 72, 1, 555000, '2024-06-10 21:33:21', '2024-06-10 21:33:21', 49),
(74, 73, 1, 555000, '2024-06-10 23:11:09', '2024-06-10 23:11:09', 49),
(75, 74, 1, 327000, '2024-06-12 07:30:53', '2024-06-12 07:30:53', 52),
(76, 75, 1, 555000, '2024-06-12 08:09:19', '2024-06-12 08:09:19', 49);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `key_code` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `key_code`, `parent_id`, `created_at`, `updated_at`) VALUES
(213, 'PRODUCT', 'Quản lý sản phẩm', NULL, NULL, '2024-05-11 08:41:53', '2024-05-11 08:53:10'),
(214, 'CREATE_PRODUCT', 'Tạo sản phẩm', 'create_product', 213, '2024-05-11 08:41:53', '2024-05-11 08:41:53'),
(215, 'UPDATE_PRODUCT', 'Cập nhập sản Phẩm', 'update_product', 213, '2024-05-11 08:41:53', '2024-05-11 08:52:30'),
(216, 'DELETE_PRODUCT', 'Xóa sản phẩm', 'delete_product', 213, '2024-05-11 08:41:53', '2024-05-11 08:52:44'),
(217, 'VIEW_PRODUCT', 'Xem sản phẩm', 'show_product', 213, '2024-05-11 08:41:53', '2024-05-11 08:52:56'),
(218, 'RESTORE_PRODUCT', 'khôi phục sản phẩm', 'restore_product', 213, '2024-05-11 08:41:53', '2024-05-11 08:53:28'),
(219, 'DESTROY_PRODUCT', 'Xóa vĩnh viễn sản phẩm', 'destroy_product', 213, '2024-05-11 08:41:53', '2024-05-11 08:53:56'),
(220, 'VIEW_TRASH_PRODUCT', 'Xem sản phẩm đã xóa', 'view_trash_product', 213, '2024-05-11 08:41:53', '2024-05-11 08:53:56'),
(221, 'USER', 'Quản lý người dùng', NULL, NULL, '2024-05-11 09:11:49', '2024-05-29 01:23:00'),
(225, 'VIEW_USER', 'Xem người dùng', 'show_users', 221, '2024-05-11 09:11:49', '2024-05-29 00:17:45'),
(226, 'RESTORE_USER', 'khôi phục người dùng', 'restore_users', 221, '2024-05-11 09:11:49', '2024-05-29 00:17:45'),
(227, 'DESTROY_USER', 'xóa vĩnh viễn', 'destroy_users', 221, '2024-05-11 09:11:49', '2024-05-29 00:17:45'),
(228, 'VIEW_TRASH_USER', 'xem thùng rác', 'view_trash_users', 221, '2024-05-11 09:11:49', '2024-05-29 00:17:45'),
(229, 'CREATE_USER', 'Tạo mới tài khoản', 'create_users', 221, '2024-05-11 09:17:11', '2024-05-29 00:17:45'),
(230, 'UPDATE_USER', 'Cập nhập tài khoản', 'update_users', 221, '2024-05-11 09:17:11', '2024-05-29 00:17:45'),
(231, 'DELETE_USER', 'Xóa tài khoản', 'delete_users', 221, '2024-05-11 09:17:11', '2024-05-29 00:17:45'),
(240, 'CATEGORY', 'quản lý danh mục', NULL, NULL, '2024-05-11 09:17:48', '2024-05-11 09:19:18'),
(241, 'CREATE_CATEGORY', 'Create Category', 'create_category', 240, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(242, 'UPDATE_CATEGORY', 'Update Category', 'update_category', 240, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(243, 'DELETE_CATEGORY', 'Delete Category', 'delete_category', 240, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(244, 'VIEW_CATEGORY', 'View Category', 'show_category', 240, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(245, 'RESTORE_CATEGORY', 'Restore Category', 'restore_category', 240, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(246, 'DESTROY_CATEGORY', 'Destroy Category', 'destroy_category', 240, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(247, 'VIEW_TRASH_CATEGORY', 'View Trash Category', 'view_trash_category', 240, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(248, 'ROLES', 'Quản lý phân quyền', NULL, NULL, '2024-05-11 09:17:48', '2024-05-11 09:19:18'),
(252, 'VIEW_ROLES', 'Xem danh dách quyền', 'show_role', 248, '2024-05-11 09:17:48', '2024-05-14 09:13:03'),
(256, 'SLIDER', 'quản lý slider', NULL, NULL, '2024-05-11 09:17:48', '2024-05-11 09:19:18'),
(257, 'CREATE_SLIDER', 'Tạo slider', 'create_sliders', 256, '2024-05-11 09:17:48', '2024-05-29 01:58:11'),
(258, 'UPDATE_SLIDER', 'Cập nhập thông tin slider', 'update_sliders', 256, '2024-05-11 09:17:48', '2024-05-29 01:58:11'),
(259, 'DELETE_SLIDER', 'Xóa slider', 'delete_sliders', 256, '2024-05-11 09:17:48', '2024-05-29 01:58:11'),
(260, 'VIEW_SLIDER', 'Xem slider', 'show_sliders', 256, '2024-05-11 09:17:48', '2024-05-29 01:58:11'),
(261, 'RESTORE_SLIDER', 'Khôi phục slider đã xóa', 'restore_sliders', 256, '2024-05-11 09:17:48', '2024-05-29 01:58:11'),
(262, 'DESTROY_SLIDER', 'xóa vĩnh viễn slider', 'destroy_sliders', 256, '2024-05-11 09:17:48', '2024-05-29 01:58:11'),
(263, 'VIEW_TRASH_SLIDER', 'xem slider đã xóa', 'view_trash_sliders', 256, '2024-05-11 09:17:48', '2024-05-29 01:58:11'),
(264, 'MENUS', 'Quản lý menu', NULL, NULL, '2024-05-11 09:17:48', '2024-05-11 09:19:18'),
(265, 'CREATE_MENUS', 'Create Menus', 'create_menu', 264, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(266, 'UPDATE_MENUS', 'Update Menus', 'update_menu', 264, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(267, 'DELETE_MENUS', 'Delete Menus', 'delete_menu', 264, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(268, 'VIEW_MENUS', 'View Menus', 'show_menu', 264, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(269, 'RESTORE_MENUS', 'Restore Menus', 'restore_menu', 264, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(270, 'DESTROY_MENUS', 'Destroy Menus', 'destroy_menu', 264, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(271, 'VIEW_TRASH_MENUS', 'View Trash Menus', 'view_trash_menu', 264, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(272, 'ORDERS', 'quản lý đơn hàng', NULL, NULL, '2024-05-11 09:17:48', '2024-05-11 09:19:18'),
(273, 'CREATE_ORDERS', 'Create Orders', 'create_orders', 272, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(274, 'UPDATE_ORDERS', 'Update Orders', 'update_orders', 272, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(275, 'DELETE_ORDERS', 'Delete Orders', 'delete_orders', 272, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(276, 'VIEW_ORDERS', 'View Orders', 'show_orders', 272, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(277, 'RESTORE_ORDERS', 'Restore Orders', 'restore_orders', 272, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(278, 'DESTROY_ORDERS', 'Destroy Orders', 'destroy_orders', 272, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(279, 'VIEW_TRASH_ORDERS', 'View Trash Orders', 'view_trash_orders', 272, '2024-05-11 09:17:48', '2024-05-11 09:17:48'),
(288, 'CREATE_ROLES', 'Tạo quyền', 'create_role', 248, '2024-05-14 09:13:03', '2024-05-14 09:13:03'),
(289, 'UPDATE_ROLES', 'Cập nhập quyền', 'update_role', 248, '2024-05-14 09:13:03', '2024-05-14 09:13:03'),
(290, 'DELETE_ROLES', 'Xóa quyền', 'delete_role', 248, '2024-05-14 09:13:03', '2024-05-14 09:13:03'),
(299, 'SETTING', 'manager setting', NULL, NULL, '2024-05-29 01:15:18', '2024-05-29 01:15:18'),
(300, 'VIEW_ANY_SETTING', 'View Any Setting', 'view_any_setting', 299, '2024-05-29 01:15:18', '2024-05-29 01:15:18'),
(301, 'PAYMENT_SETTING', 'Payment Setting', 'payment_setting', 299, '2024-05-29 01:15:18', '2024-05-29 01:15:18'),
(302, 'PERMISSIONS_SETTING', 'Permissions Setting', 'permissions_setting', 299, '2024-05-29 01:15:18', '2024-05-29 01:15:18'),
(303, 'CONTACT_SETTING', 'Contact Setting', 'contact_setting', 299, '2024-05-29 01:15:18', '2024-05-29 01:15:18'),
(304, 'SYSTEM_SETTING', 'System Setting', 'system_setting', 299, '2024-05-29 01:15:18', '2024-05-29 01:15:18'),
(305, 'ADMIN', 'Qản lý trang admin', NULL, NULL, '2024-05-29 01:15:24', '2024-05-29 01:56:51'),
(306, 'VIEW_ADMIN', 'Xem thống  kê', 'show_admin', 305, '2024-05-29 01:15:24', '2024-05-29 01:56:51'),
(307, 'BRANDS', 'Quản lý nhản hiệu', NULL, NULL, '2024-05-29 01:16:09', '2024-05-29 01:22:50'),
(308, 'CREATE_BRANDS', 'Tạo mới nhản hiệu', 'create_brands', 307, '2024-05-29 01:16:09', '2024-05-29 01:22:30'),
(309, 'UPDATE_BRANDS', 'Cập nhập nhản hiệu', 'update_brands', 307, '2024-05-29 01:16:09', '2024-05-29 01:22:30'),
(310, 'DELETE_BRANDS', 'Xóa nhản hiệu', 'delete_brands', 307, '2024-05-29 01:16:09', '2024-05-29 01:22:30'),
(311, 'VIEW_BRANDS', 'Xem nhản hiệu', 'show_brands', 307, '2024-05-29 01:16:09', '2024-05-29 01:22:30'),
(312, 'RESTORE_BRANDS', 'Khôi phục nhản hiệu', 'restore_brands', 307, '2024-05-29 01:16:09', '2024-05-29 01:22:30'),
(313, 'DESTROY_BRANDS', 'Xóa vĩnh viễn nhản hiệu', 'destroy_brands', 307, '2024-05-29 01:16:09', '2024-05-29 01:22:30'),
(314, 'VIEW_TRASH_BRANDS', 'Xem nhản hiệu đã xóa', 'view_trash_brands', 307, '2024-05-29 01:16:09', '2024-05-29 01:22:30'),
(315, 'REVIEWS', 'quản lý đánh giá của người dùng', NULL, NULL, '2024-05-29 01:56:51', '2024-05-29 01:56:51'),
(316, 'VIEW_REVIEWS', 'Xem đánh giá', 'show_admin', 315, '2024-05-29 01:56:51', '2024-05-29 01:56:51'),
(317, 'REPLY_REVIEWS', 'Trả lời đánh giá', 'reply_reviews', 315, '2024-05-29 01:56:51', '2024-05-29 01:56:51'),
(318, 'DELETE_REVIEWS', 'Xóa đánh giá', 'delete_reviews', 315, '2024-05-29 01:56:51', '2024-05-29 01:56:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions_role`
--

CREATE TABLE `permissions_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions_role`
--

INSERT INTO `permissions_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 214, 9, NULL, NULL),
(7, 215, 9, NULL, NULL),
(8, 216, 9, NULL, NULL),
(9, 217, 9, NULL, NULL),
(10, 218, 9, NULL, NULL),
(11, 219, 9, NULL, NULL),
(12, 220, 9, NULL, NULL),
(13, 214, 10, NULL, NULL),
(14, 215, 10, NULL, NULL),
(15, 216, 10, NULL, NULL),
(16, 217, 10, NULL, NULL),
(17, 218, 10, NULL, NULL),
(18, 219, 10, NULL, NULL),
(19, 220, 10, NULL, NULL),
(20, 225, 10, NULL, NULL),
(21, 226, 10, NULL, NULL),
(22, 227, 10, NULL, NULL),
(23, 228, 10, NULL, NULL),
(24, 229, 10, NULL, NULL),
(25, 231, 10, NULL, NULL),
(26, 241, 10, NULL, NULL),
(27, 242, 10, NULL, NULL),
(28, 243, 10, NULL, NULL),
(29, 244, 10, NULL, NULL),
(30, 245, 10, NULL, NULL),
(31, 246, 10, NULL, NULL),
(32, 247, 10, NULL, NULL),
(33, 252, 10, NULL, NULL),
(34, 257, 10, NULL, NULL),
(35, 258, 10, NULL, NULL),
(36, 259, 10, NULL, NULL),
(37, 260, 10, NULL, NULL),
(38, 261, 10, NULL, NULL),
(39, 262, 10, NULL, NULL),
(40, 263, 10, NULL, NULL),
(41, 265, 10, NULL, NULL),
(42, 266, 10, NULL, NULL),
(43, 267, 10, NULL, NULL),
(44, 268, 10, NULL, NULL),
(45, 269, 10, NULL, NULL),
(46, 270, 10, NULL, NULL),
(47, 271, 10, NULL, NULL),
(48, 273, 10, NULL, NULL),
(49, 274, 10, NULL, NULL),
(50, 275, 10, NULL, NULL),
(51, 276, 10, NULL, NULL),
(52, 277, 10, NULL, NULL),
(53, 278, 10, NULL, NULL),
(54, 279, 10, NULL, NULL),
(55, 214, 11, NULL, NULL),
(56, 215, 11, NULL, NULL),
(57, 216, 11, NULL, NULL),
(58, 217, 11, NULL, NULL),
(59, 218, 11, NULL, NULL),
(60, 220, 11, NULL, NULL),
(61, 225, 11, NULL, NULL),
(62, 226, 11, NULL, NULL),
(63, 227, 11, NULL, NULL),
(64, 228, 11, NULL, NULL),
(65, 229, 11, NULL, NULL),
(66, 230, 11, NULL, NULL),
(67, 231, 11, NULL, NULL),
(68, 241, 11, NULL, NULL),
(69, 242, 11, NULL, NULL),
(70, 243, 11, NULL, NULL),
(71, 244, 11, NULL, NULL),
(72, 245, 11, NULL, NULL),
(73, 246, 11, NULL, NULL),
(74, 247, 11, NULL, NULL),
(75, 252, 11, NULL, NULL),
(76, 257, 11, NULL, NULL),
(77, 258, 11, NULL, NULL),
(78, 259, 11, NULL, NULL),
(79, 260, 11, NULL, NULL),
(80, 261, 11, NULL, NULL),
(81, 262, 11, NULL, NULL),
(82, 263, 11, NULL, NULL),
(83, 273, 11, NULL, NULL),
(84, 274, 11, NULL, NULL),
(85, 275, 11, NULL, NULL),
(86, 276, 11, NULL, NULL),
(87, 277, 11, NULL, NULL),
(88, 278, 11, NULL, NULL),
(89, 279, 11, NULL, NULL),
(90, 276, 12, NULL, NULL),
(91, 276, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `views_count` bigint(20) DEFAULT 0,
  `feature_image` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `description_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `content`, `views_count`, `feature_image`, `status`, `description_image`, `id_category`, `deleted_at`, `user_id`, `created_at`, `updated_at`, `brand_id`) VALUES
(93, 'Áo Sơ Mi Cổ Mở Tay Ngắn Sợi Nhân Tạo Nhanh Khô Biểu Tượng Dáng Rộng BST Thiết Kế The Day&amp;amp;amp;#039;s Eye 27', 'ao-so-mi-co-mo-tay-ngan-soi-nhan-tao-nhanh-kho-bieu-tuong-dang-rong-bst-thiet-ke-the-dayampampamp039s-eye-27', '<p><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Chất liệu: Poly</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Thành phần: 100% Polyester</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Co giãn</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Vải nhẹ</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Mềm mịn</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Thấm hút</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Nhanh khô</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Cổ áo Cuban thời trang</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Họa tiết hài hào đối xứng 2...&nbsp;</span><a href=\"https://www.yame.vn/shop/the-days-eye/ao-so-mi-cuban-the-days-eye-27-0022081?c=Tr%E1%BA%AFng#\" class=\"exp readmore\" style=\"color: rgb(255, 0, 0); background-color: rgb(255, 255, 255); transition: all 0.3s ease 0s; font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Đọc tiếp</a><br></p>', 0, '/storage/products/s40YeoHmwLMhxym9j1uyPrgespAFiuHXKBIsYsqr.jpg', 1, '[\"\\/storage\\/products\\/C8o8wuiiIbQABgP9seLUa3KtHpKgdObJM0yzzwj6.jpg\",\"\\/storage\\/products\\/DsXurwYTECbRuKcv9q9ypt4dJoXKYHckBRRafTMQ.jpg\",\"\\/storage\\/products\\/dA9OpOmkBE36f8Gh0cA8DJNU0vnJxWlzJwG8FVXK.jpg\",\"\\/storage\\/products\\/gsEbSFQ5QK0piXi1npWLcRC9G9aBE7QrHgumYICv.jpg\",\"\\/storage\\/products\\/w6q1rf6uGs6HcTHRixEMzUkUT62BevaqwTpWCXYb.jpg\",\"\\/storage\\/products\\/8tfJJYYgC9sPgMXmoMsmJRRd1jGQDRXNSJgib4Gn.jpg\",\"\\/storage\\/products\\/OP3TBnpzbvjk16iosb6jNjtggkknKi9J49bJPKNQ.jpg\"]', 530, NULL, 1, '2024-05-13 07:59:12', '2024-06-01 04:21:53', 1),
(94, 'Áo Khoác Không Nón Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng Đơn Giản Y2010 Originals Ver46', 'ao-khoac-khong-non-vai-thun-thoang-mat-bieu-tuong-dang-rong-don-gian-y2010-originals-ver46', '<h5 class=\"display-6\" style=\"font-size: 1.2rem; color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Mô tả sản phẩm</h5><p><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Áo Khoác Cardigan Đơn Giản Y Nguyên Bản Ver46</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Chất liệu: COTTON DOUBLE FACE</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Vải sợi Cotton được dệt theo \"DOUBLE-FACE\" có cấu trúc 2 bề mặt giống nhau, có thể sử dụng đư...&nbsp;</span><a href=\"https://www.yame.vn/shop/ao-khoac-djon-gian-sale/ao-khoac-cardigan-on-gian-y-nguyen-ban-ver46-0021048?c=X%C3%A1m#\" class=\"exp readmore\" style=\"color: rgb(255, 0, 0); background-color: rgb(255, 255, 255); transition: all 0.3s ease 0s; font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Đọc tiếp</a><br></p>', 0, '/storage/products/d8q6SE4Ex1I6bdNxWzgXcjytI9AkzCq5wY3x454K.jpg', 1, '[\"\\/storage\\/products\\/qZfXfP9yBNP04lnVgmfOj1tm3WxcrZQAxmktbzpS.jpg\",\"\\/storage\\/products\\/Pdm56Sa0Ye3vUNxfBXVKnJJGBFrz0cwYuuyVG15q.jpg\",\"\\/storage\\/products\\/Hi8oXgilTApP92D1LmPzxfmRg3nWOMFoya9G0pnw.jpg\",\"\\/storage\\/products\\/Vp26jnV2m4rcooGa1bvgRHa0ekRaM1BQBe6xqVs4.jpg\",\"\\/storage\\/products\\/wEMit9yyLoh22TYoe45fyJuvhtRnn8peUDewoaDU.jpg\",\"\\/storage\\/products\\/Xa3VdYO5DFFz9ZUEMHhILAHaSt5WD2NsSu9s5xth.jpg\"]', 530, NULL, 1, '2024-05-13 08:36:39', '2024-05-13 14:10:40', 1),
(95, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64', 'ao-khoac-co-non-vai-thun-giu-am-tron-dang-rong-don-gian-y2010-originals-ver64', '<h5 class=\"display-6\" style=\"font-size: 1.2rem; color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Mô tả sản phẩm</h5><p><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Chất liệu: French Terry</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Thành phần: 100% Cotton</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Thấm hút thoát ẩm</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Mềm mại</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Co giãn đàn hồi</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Thân thiện môi trường</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Họa tiết in dẻo</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Reverse Coil Zipper (Những chiếc khoá túi này có bề mặt ngoài dẹp, phẳng trong khi răng khoá thì ở trong)</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><a href=\"https://www.yame.vn/shop/ao-khoac-djon-gian-sale/ao-khoac-hoodie-zipper-on-gian-y-nguyen-ban-ver64-0021481?c=Xanh%20Bi%E1%BB%83n#\" class=\"exp\" style=\"color: rgb(68, 68, 68); background-color: rgb(255, 255, 255); transition: all 0.3s ease 0s; font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">^ Ẩn bớt nội dung</a><br></p>', 0, '/storage/products/oc607L7OF8VtD31KhJ9oSUYCMaRQ2zCpMVVA7rkL.jpg', 1, '[\"\\/storage\\/products\\/uLXQTkhz2AhYKfxVScs45ZlgWT8C2hZ6LqytjOk7.jpg\",\"\\/storage\\/products\\/jwMii4xMQLrrKDI2QdbHkpWcpA0R3iAS9jdMGReX.jpg\",\"\\/storage\\/products\\/Cri82rilq6UGmzq55AdzNURAMKW0YZJrYAAYHnZg.jpg\",\"\\/storage\\/products\\/MD3oZBbRhLr8PvL8OegEWQJSh4PZFX0LuNOGswnl.jpg\",\"\\/storage\\/products\\/pvVtWqEdZvGjxPqXrNQ3ajmfTPQL9mqN2n49t0x9.jpg\",\"\\/storage\\/products\\/z4SxlCwIjrotkZIelVg5qi4lDobtqCO8dehw1i8D.jpg\"]', 521, NULL, 1, '2024-05-13 08:46:59', '2024-05-25 06:06:30', 4),
(96, 'Áo Khoác Không Nón Vải Denim Chống Nắng Phối Màu Dáng Rộng BST Thiết Kế Space Ver3', 'ao-khoac-khong-non-vai-denim-chong-nang-phoi-mau-dang-rong-bst-thiet-ke-space-ver3', '<h5 class=\"display-6\" style=\"font-size: 1.2rem; color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Mô tả sản phẩm</h5><p><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Áo Khoác Varsity Ngân Hà Space Ver3</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Chất liệu : Vải Kaki Nhung</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Thành phần: 100% Polyester</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Họa tiết thêu + thêu đắp giống</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Cổ áo, cổ tay, lai áo được bo vải gân</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Áo được cài bằng nút bấm</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Túi trong tiện dụng</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><a href=\"https://www.yame.vn/shop/ao-khoac-djon-gian-sale/ao-khoac-varsity-ngan-ha-space-ver3-0020557?c=Xanh%20D%C6%B0%C6%A1ng#\" class=\"exp\" style=\"color: rgb(68, 68, 68); background-color: rgb(255, 255, 255); transition: all 0.3s ease 0s; font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">^ Ẩn bớt nội dung</a><br></p>', 0, '/storage/products/hvU8K0jlegrpsOsI3QqiXUVNVzP6sQnpuASSVHGZ.jpg', 1, '[]', 529, NULL, 1, '2024-05-13 08:52:19', '2024-05-25 07:14:49', 1),
(97, 'Áo Sơ Mi Cổ Lãnh tụ Tay Dài Sợi Cà Phê Kiểm Soát Mùi Trơn Dáng Vừa Đơn Giản Y2010 Originals Ver15', 'ao-so-mi-co-lanh-tu-tay-dai-soi-ca-phe-kiem-soat-mui-tron-dang-vua-don-gian-y2010-originals-ver15', '<p><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Sơ Mi Cổ Lãnh Tụ Đơn Giản Y Nguyên Bản Ver15</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Chất liệu: Sợi Cà Phê</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">Thành phần: 50% Coffee 50% Polyester</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Odor Control - Kiểm soát mùi</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Fast Drying - Nhanh khô</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ Ice Cool Touch - Làm mát cơ thể</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">+ UV Protechtion - Chống nắng</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><span style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">- Họa tiết thêu + may đắp nhãn dệt</span><br style=\"color: rgb(17, 17, 17); font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\"><a href=\"https://www.yame.vn/shop/so-mi-don-gian-sale/so-mi-co-lanh-tu-on-gian-y-nguyen-ban-ver15-0020679?c=Tr%E1%BA%AFng#\" class=\"exp\" style=\"color: rgb(68, 68, 68); background-color: rgb(255, 255, 255); transition: all 0.3s ease 0s; font-family: mulish, raleway, &quot;helvetica neue&quot;, Arial, &quot;noto sans&quot;, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;;\">^ Ẩn bớt nội dung</a><br></p>', 0, '/storage/products/NSe2mPS0owId16SAxEU4h0wx5wWen6p7AaDkYeHD.jpg', 1, '[]', 530, NULL, 1, '2024-05-13 09:02:09', '2024-05-25 06:06:31', 2),
(98, 'ĐẦM TƠ HỒNG BẤU LY TRƯỚC', 'dam-to-hong-bau-ly-truoc', '<p><br></p>', 0, '/storage/products/fxet5zgZbFR5iChZGfSwGdE9gJZroxc3Vk6YfMB4.jpg', 1, '[\"\\/storage\\/products\\/g1j903GGzqbIEsZwCeqdagMEGIQ9iz2OZeMyzssL.jpg\",\"\\/storage\\/products\\/myyFdGBAfZSLHEz2DgNn8FAyXU8tJrnRU82iPukD.jpg\"]', 528, NULL, 1, '2024-05-25 06:04:52', '2024-05-25 06:06:32', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tag` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `id_tag`, `id_product`, `created_at`, `updated_at`) VALUES
(27, 16, 94, NULL, NULL),
(28, 16, 95, NULL, NULL),
(29, 17, 95, NULL, NULL),
(30, 18, 98, NULL, NULL),
(31, 19, 93, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT 0,
  `quantity` bigint(20) DEFAULT 0,
  `reduced_price` bigint(20) DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variations`
--

INSERT INTO `product_variations` (`id`, `name`, `feature_image`, `color`, `size`, `price`, `quantity`, `reduced_price`, `product_id`, `created_at`, `updated_at`) VALUES
(31, 'Áo Sơ Mi Cổ Mở Tay Ngắn Sợi Nhân Tạo Nhanh Khô Biểu Tượng Dáng Rộng BST Thiết Kế The Day&amp;amp;amp;#039;s Eye 27 Trắng-M', NULL, 'Trắng', 'M', 257000, 1, 1, 93, '2024-05-13 07:59:12', '2024-06-09 00:31:17'),
(32, 'Áo Sơ Mi Cổ Mở Tay Ngắn Sợi Nhân Tạo Nhanh Khô Biểu Tượng Dáng Rộng BST Thiết Kế The Day&amp;amp;amp;#039;s Eye 27 Trắng-L', NULL, 'Trắng', 'L', 257000, 1, 1, 93, '2024-05-13 07:59:12', '2024-06-07 16:20:46'),
(33, 'Áo Sơ Mi Cổ Mở Tay Ngắn Sợi Nhân Tạo Nhanh Khô Biểu Tượng Dáng Rộng BST Thiết Kế The Day&amp;amp;amp;#039;s Eye 27 Trắng-S', NULL, 'Trắng', 'S', 257000, 1, 0, 93, '2024-05-13 07:59:12', '2024-06-03 05:41:08'),
(34, 'Áo Khoác Không Nón Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng Đơn Giản Y2010 Originals Ver46 đỏ-S', NULL, 'đỏ', 'S', 387000, 1, 193500, 94, '2024-05-13 08:36:39', '2024-06-10 17:02:55'),
(35, 'Áo Khoác Không Nón Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng Đơn Giản Y2010 Originals Ver46 xanh-S', NULL, 'xanh', 'S', 387000, 2, 193500, 94, '2024-05-13 08:36:39', '2024-05-28 06:54:34'),
(36, 'Áo Khoác Không Nón Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng Đơn Giản Y2010 Originals Ver46 đỏ-L', NULL, 'đỏ', 'L', 387000, 2, 193500, 94, '2024-05-13 08:36:39', '2024-06-10 19:09:02'),
(37, 'Áo Khoác Không Nón Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng Đơn Giản Y2010 Originals Ver46 xanh-L', NULL, 'xanh', 'L', 387000, 1, 193500, 94, '2024-05-13 08:36:39', '2024-06-10 04:29:06'),
(38, 'Áo Khoác Không Nón Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng Đơn Giản Y2010 Originals Ver46 đỏ-X', NULL, 'đỏ', 'X', 387000, 123, 193500, 94, '2024-05-13 08:36:39', '2024-05-13 08:36:39'),
(39, 'Áo Khoác Không Nón Vải Thun Thoáng Mát Biểu Tượng Dáng Rộng Đơn Giản Y2010 Originals Ver46 xanh-X', NULL, 'xanh', 'X', 387000, 123, 193500, 94, '2024-05-13 08:36:39', '2024-05-13 08:36:39'),
(40, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 xanh-M', NULL, 'xanh', 'M', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(41, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 đỏ-M', NULL, 'đỏ', 'M', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(42, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 vàng-M', NULL, 'vàng', 'M', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(43, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 xanh-XL', NULL, 'xanh', 'XL', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(44, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 đỏ-XL', NULL, 'đỏ', 'XL', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(45, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 vàng-XL', NULL, 'vàng', 'XL', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(46, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 xanh-2XL', NULL, 'xanh', '2XL', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(47, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 đỏ-2XL', NULL, 'đỏ', '2XL', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(48, 'Áo Khoác Có Nón Vải Thun Giữ Ấm Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver64 vàng-2XL', NULL, 'vàng', '2XL', 557000, 42, 278500, 95, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(49, 'Áo Khoác Không Nón Vải Denim Chống Nắng Phối Màu Dáng Rộng BST Thiết Kế Space Ver3 đỏ-L', NULL, 'đỏ', 'L', 555000, 1, 277500, 96, '2024-05-13 08:52:19', '2024-06-12 08:09:19'),
(50, 'Áo Sơ Mi Cổ Lãnh tụ Tay Dài Sợi Cà Phê Kiểm Soát Mùi Trơn Dáng Vừa Đơn Giản Y2010 Originals Ver15 Xanh-M', NULL, 'Xanh', 'M', 327000, 1, 163500, 97, '2024-05-13 09:02:09', '2024-05-29 00:00:07'),
(51, 'Áo Sơ Mi Cổ Lãnh tụ Tay Dài Sợi Cà Phê Kiểm Soát Mùi Trơn Dáng Vừa Đơn Giản Y2010 Originals Ver15 đỏ-M', NULL, 'đỏ', 'M', 327000, 1, 163500, 97, '2024-05-13 09:02:09', '2024-05-28 06:55:10'),
(52, 'Áo Sơ Mi Cổ Lãnh tụ Tay Dài Sợi Cà Phê Kiểm Soát Mùi Trơn Dáng Vừa Đơn Giản Y2010 Originals Ver15 Xanh-L', NULL, 'Xanh', 'L', 327000, 1, 163500, 97, '2024-05-13 09:02:09', '2024-06-12 07:30:53'),
(53, 'Áo Sơ Mi Cổ Lãnh tụ Tay Dài Sợi Cà Phê Kiểm Soát Mùi Trơn Dáng Vừa Đơn Giản Y2010 Originals Ver15 đỏ-L', NULL, 'đỏ', 'L', 327000, 42, 163500, 97, '2024-05-13 09:02:09', '2024-05-13 09:02:09'),
(54, 'ĐẦM TƠ HỒNG BẤU LY TRƯỚC Hồng-S', NULL, 'Hồng', 'S', 2298000, 1, NULL, 98, '2024-05-25 06:04:52', '2024-05-28 11:15:34'),
(55, 'ĐẦM TƠ HỒNG BẤU LY TRƯỚC Hồng-M', NULL, 'Hồng', 'M', 2298000, 1, NULL, 98, '2024-05-25 06:04:52', '2024-06-09 06:40:41'),
(56, 'ĐẦM TƠ HỒNG BẤU LY TRƯỚC Hồng-L', NULL, 'Hồng', 'L', 2298000, 2, NULL, 98, '2024-05-25 06:04:52', '2024-05-28 06:46:41'),
(57, 'ĐẦM TƠ HỒNG BẤU LY TRƯỚC Hồng-XL', NULL, 'Hồng', 'XL', 2298000, 1, NULL, 98, '2024-05-25 06:04:52', '2024-06-08 20:21:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `parent_id`, `id_user`, `product_id`, `content`, `rating`, `created_at`, `updated_at`, `email`, `name`) VALUES
(6, NULL, 1, 96, 'bình luận nè', 3, '2024-05-25 09:22:47', '2024-05-25 09:22:47', 'admin01@admin.com', 'admin master'),
(7, NULL, 1, 96, 'sdfsdf', 2, '2024-05-25 09:25:40', '2024-05-25 09:25:40', 'admin01@admin.com', 'admin master'),
(8, NULL, 1, 96, 'sdfsdf', 2, '2024-05-25 09:25:41', '2024-05-25 09:25:41', 'admin01@admin.com', 'admin master'),
(9, NULL, 1, 96, 'áo', 1, '2024-05-25 09:25:51', '2024-05-25 09:25:51', 'admin01@admin.com', 'admin master'),
(10, NULL, 1, 96, 'áo', 3, '2024-05-25 09:26:01', '2024-05-25 09:26:01', 'admin01@admin.com', 'admin master'),
(11, NULL, 1, 96, 'áo', 2, '2024-05-25 09:26:31', '2024-05-25 09:26:31', 'admin01@admin.com', 'admin master'),
(12, NULL, 1, 96, 'ádasd', 5, '2024-05-25 09:27:19', '2024-05-25 09:27:19', 'admin01@admin.com', 'admin master'),
(14, NULL, 1, 96, 'ádasd', 3, '2024-05-25 09:27:32', '2024-05-25 09:27:32', 'admin01@admin.com', 'admin master'),
(15, NULL, 1, 96, 'ádasd', 5, '2024-05-25 09:27:52', '2024-05-25 09:27:52', 'admin01@admin.com', 'admin master'),
(16, NULL, 1, 96, 'ádasd', 5, '2024-05-25 09:28:52', '2024-05-25 09:28:52', 'admin01@admin.com', 'admin master'),
(17, NULL, 1, 96, 'ádasd', 5, '2024-05-25 09:29:33', '2024-05-25 09:29:33', 'admin01@admin.com', 'admin master'),
(18, NULL, 1, 96, 'ádasd', 5, '2024-05-25 09:29:54', '2024-05-25 09:29:54', 'admin01@admin.com', 'admin mastera'),
(20, 6, 1, NULL, 'ádfsdfasdf', NULL, '2024-05-26 06:07:13', '2024-05-26 06:07:13', 'admin01@admin.com', 'admin master'),
(24, NULL, 1, 96, 'ádasd', 3, '2024-05-27 15:16:11', '2024-05-27 15:16:11', 'admin01@admin.com', 'admin master'),
(25, NULL, 1, 98, 'Sản phẩm đánh giá', 3, '2024-05-27 15:22:28', '2024-05-27 15:22:28', 'admin01@admin.com', 'admin master'),
(26, NULL, NULL, 93, '12312312', 3, '2024-05-28 06:39:16', '2024-05-28 06:39:16', 'nguyenhoangphuc201122@gmail.com', 'Phúc Nuyễn Hoàng'),
(27, NULL, NULL, 93, '12312312', 3, '2024-05-28 06:39:24', '2024-05-28 06:39:24', 'nguyenhoangphuc201122@gmail.com', 'Phúc Nuyễn Hoàng'),
(28, NULL, NULL, 93, '12312312', 3, '2024-05-28 06:39:43', '2024-05-28 06:39:43', 'nguyenhoangphuc201122@gmail.com', 'Phúc Nuyễn Hoàng'),
(29, NULL, NULL, 93, '12312', 2, '2024-05-28 06:40:00', '2024-05-28 06:40:00', 'nguyenhoangphuc201122@gmail.com', 'Phúc Nuyễn Hoàng'),
(31, 20, 1, NULL, 'ádasd', NULL, '2024-05-29 01:38:02', '2024-05-29 01:38:02', 'admin01@admin.com', 'admin master'),
(32, 20, 1, NULL, 'ádasdas', NULL, '2024-05-29 01:38:06', '2024-05-29 01:38:06', 'admin01@admin.com', 'admin master'),
(33, NULL, NULL, 94, '234234', 5, '2024-06-08 19:44:46', '2024-06-08 19:44:46', 'nguyenhoangphuc201122@gmail.com', 'Phúc Nuyễn Hoàng'),
(34, NULL, NULL, 94, '123123', 3, '2024-06-08 19:47:30', '2024-06-08 19:47:30', 'nguyenhoangphuc201122@gmail.com', 'Phúc Nuyễn Hoàng'),
(35, NULL, 1, 98, '123123', NULL, '2024-06-10 07:31:14', '2024-06-10 07:31:14', 'admin01@admin.com', 'admin master'),
(36, NULL, 1, 98, '123123', NULL, '2024-06-10 07:32:18', '2024-06-10 07:32:18', 'admin01@admin.com', 'admin mastera'),
(37, NULL, 1, 98, '123123', 4, '2024-06-10 07:32:34', '2024-06-10 07:32:34', 'admin01@admin.com', 'admin mastera'),
(38, NULL, 1, 98, '12312', 4, '2024-06-10 07:41:35', '2024-06-10 07:41:35', 'admin01@admin.com', 'admin master'),
(39, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:29', '2024-06-10 07:43:29', 'admin01@admin.com', 'admin master'),
(40, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:32', '2024-06-10 07:43:32', 'admin01@admin.com', 'admin master'),
(41, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:33', '2024-06-10 07:43:33', 'admin01@admin.com', 'admin master'),
(42, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:33', '2024-06-10 07:43:33', 'admin01@admin.com', 'admin master'),
(43, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:33', '2024-06-10 07:43:33', 'admin01@admin.com', 'admin master'),
(44, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:34', '2024-06-10 07:43:34', 'admin01@admin.com', 'admin master'),
(45, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:34', '2024-06-10 07:43:34', 'admin01@admin.com', 'admin master'),
(46, NULL, 1, 98, '123', NULL, '2024-06-10 07:43:42', '2024-06-10 07:43:42', 'admin01@admin.com', 'admin master'),
(47, NULL, 1, 98, '123', NULL, '2024-06-10 07:44:52', '2024-06-10 07:44:52', 'admin01@admin.com', 'admin master'),
(48, NULL, 1, 98, '123123', 2, '2024-06-10 07:45:08', '2024-06-10 07:45:08', 'admin01@admin.com', 'admin master'),
(49, NULL, 1, 98, '123123', 2, '2024-06-10 07:46:12', '2024-06-10 07:46:12', 'admin01@admin.com', 'admin master'),
(50, NULL, 1, 98, '123123', 2, '2024-06-10 07:46:29', '2024-06-10 07:46:29', 'admin01@admin.com', 'admin master'),
(51, NULL, 1, 98, '123123', 2, '2024-06-10 07:47:04', '2024-06-10 07:47:04', 'admin01@admin.com', 'admin master'),
(52, NULL, 1, 98, '123123', 2, '2024-06-10 07:48:18', '2024-06-10 07:48:18', 'admin01@admin.com', 'admin master'),
(53, NULL, 1, 98, '123123', 2, '2024-06-10 07:48:28', '2024-06-10 07:48:28', 'admin01@admin.com', 'admin master'),
(54, NULL, 1, 98, '123123', 2, '2024-06-10 07:48:43', '2024-06-10 07:48:43', 'admin01@admin.com', 'admin master'),
(55, NULL, 1, 98, 'sdsdf', NULL, '2024-06-10 07:49:06', '2024-06-10 07:49:06', 'admin01@admin.com', 'admin master'),
(56, NULL, 1, 98, 'sdsdf', NULL, '2024-06-10 07:49:34', '2024-06-10 07:49:34', 'admin01@admin.com', 'admin master'),
(57, NULL, 1, 98, 'sdsdf', NULL, '2024-06-10 07:49:36', '2024-06-10 07:49:36', 'admin01@admin.com', 'admin master'),
(58, NULL, 1, 98, 'sdsdf', NULL, '2024-06-10 07:49:36', '2024-06-10 07:49:36', 'admin01@admin.com', 'admin master'),
(59, NULL, 1, 98, '12123', NULL, '2024-06-10 07:54:12', '2024-06-10 07:54:12', 'admin01@admin.com', 'admin master'),
(60, NULL, 1, 98, '12123', NULL, '2024-06-10 07:54:29', '2024-06-10 07:54:29', 'admin01@admin.com', 'admin master'),
(61, NULL, 1, 98, '12123', NULL, '2024-06-10 07:54:56', '2024-06-10 07:54:56', 'admin01@admin.com', 'admin master'),
(62, NULL, 1, 98, '12123', NULL, '2024-06-10 07:55:23', '2024-06-10 07:55:23', 'admin01@admin.com', 'admin master'),
(63, NULL, 1, 98, '12123', NULL, '2024-06-10 07:56:27', '2024-06-10 07:56:27', 'admin01@admin.com', 'admin master'),
(64, NULL, 1, 98, '12123', NULL, '2024-06-10 07:57:07', '2024-06-10 07:57:07', 'admin01@admin.com', 'admin master'),
(65, NULL, 1, 98, '12123', NULL, '2024-06-10 07:57:16', '2024-06-10 07:57:16', 'admin01@admin.com', 'admin master'),
(66, NULL, 1, 98, '12123', NULL, '2024-06-10 07:57:23', '2024-06-10 07:57:23', 'admin01@admin.com', 'admin master'),
(67, NULL, 1, 94, '123', NULL, '2024-06-10 17:03:16', '2024-06-10 17:03:16', 'admin01@admin.com', 'admin master'),
(68, NULL, 1, 94, '123', NULL, '2024-06-10 17:03:19', '2024-06-10 17:03:19', 'admin01@admin.com', 'admin master'),
(69, NULL, 1, 94, '123', 4, '2024-06-10 17:04:27', '2024-06-10 17:04:27', 'admin01@admin.com', 'admin master123'),
(70, NULL, 1, 94, '123', 4, '2024-06-10 17:04:36', '2024-06-10 17:04:36', 'admin01@admin.com', 'admin master123'),
(71, NULL, 1, 94, '123', 4, '2024-06-10 17:04:48', '2024-06-10 17:04:48', 'admin01@admin.com', 'admin master123'),
(72, NULL, 1, 94, '123', 4, '2024-06-10 17:05:22', '2024-06-10 17:05:22', 'admin01@admin.com', 'admin master123'),
(73, NULL, 1, 94, '123', 4, '2024-06-10 17:05:31', '2024-06-10 17:05:31', 'admin01@admin.com', 'admin master123'),
(74, NULL, 1, 94, '123', 4, '2024-06-10 17:05:43', '2024-06-10 17:05:43', 'admin01@admin.com', 'admin master123'),
(75, NULL, 1, 94, '123', 4, '2024-06-10 17:05:52', '2024-06-10 17:05:52', 'admin01@admin.com', 'admin master123'),
(76, NULL, 1, 94, '123', 4, '2024-06-10 17:06:18', '2024-06-10 17:06:18', 'admin01@admin.com', 'admin master123'),
(77, NULL, 1, 94, '123', 4, '2024-06-10 17:06:34', '2024-06-10 17:06:34', 'admin01@admin.com', 'admin master123'),
(78, NULL, 1, 94, '123', 4, '2024-06-10 17:06:58', '2024-06-10 17:06:58', 'admin01@admin.com', 'admin master'),
(79, NULL, 1, 94, '123', 4, '2024-06-10 17:07:20', '2024-06-10 17:07:20', 'admin01@admin.com', 'admin master'),
(80, NULL, 1, 94, '123', NULL, '2024-06-10 17:07:38', '2024-06-10 17:07:38', 'admin01@admin.com', 'admin master'),
(81, NULL, 1, 97, '123', NULL, '2024-06-10 19:15:46', '2024-06-10 19:15:46', 'admin01@admin.com', 'admin master'),
(82, NULL, 1, 96, '123', 3, '2024-06-10 22:39:05', '2024-06-10 22:39:05', 'admin01@admin.com', 'admin master'),
(83, NULL, 1, 96, '123', 3, '2024-06-10 22:39:07', '2024-06-10 22:39:07', 'admin01@admin.com', 'admin master'),
(84, NULL, 1, 96, '123', NULL, '2024-06-10 22:55:25', '2024-06-10 22:55:25', 'admin01@admin.com', 'admin master'),
(85, NULL, 1, 96, '123', NULL, '2024-06-10 22:55:26', '2024-06-10 22:55:26', 'admin01@admin.com', 'admin master'),
(86, NULL, 1, 96, 'ádasd', NULL, '2024-06-10 22:55:33', '2024-06-10 22:55:33', 'admin01@admin.com', 'admin master'),
(87, NULL, 1, 96, 'ádasd', NULL, '2024-06-10 23:03:59', '2024-06-10 23:03:59', 'admin01@admin.com', 'admin master'),
(88, 87, 1, NULL, 'ádasd', NULL, '2024-06-10 23:04:08', '2024-06-10 23:04:08', 'admin01@admin.com', 'admin master');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'Nhân viên bán hàng', NULL, NULL, '2024-05-11 10:17:19', '2024-05-11 10:17:19'),
(10, 'nhân viên dev', NULL, NULL, '2024-05-14 07:23:34', '2024-05-14 07:23:34'),
(11, 'quản lý', NULL, NULL, '2024-05-14 07:24:34', '2024-05-14 07:24:34'),
(12, 'Nhân viên bán hàng', NULL, NULL, '2024-06-09 01:01:24', '2024-06-09 01:01:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`value`)),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'info_contact', '{\"email\":{\"icon\":\"bi bi-envelope\",\"value\":\"nguyenhoangphuc201122@gmail.com\",\"display\":\"on\",\"location\":\"left\",\"links\":null},\"phone\":{\"icon\":\"bi bi-telephone-fill\",\"value\":\"0777575100\",\"display\":\"on\",\"location\":\"left\",\"links\":null},\"address\":{\"icon\":\"bi bi-geo-alt-fill\",\"value\":\"Q12,TP H\\u1ed3 ch\\u00ed minh\",\"display\":\"on\",\"location\":\"left\",\"links\":\"https:\\/\\/maps.app.goo.gl\\/EY77scjHjfdTe1WU8\"},\"facebook\":{\"icon\":\"bi bi-facebook\",\"value\":null,\"display\":\"on\",\"location\":\"right\",\"links\":\"https:\\/\\/www.facebook.com\"},\"zalo\":{\"icon\":\"bi bi-telephone-fill\",\"value\":\"0777575100\",\"display\":\"on\",\"location\":\"right\",\"links\":null}}', NULL, '2024-05-12 02:45:11', '2024-06-08 15:34:10'),
(13, 'setting_system', '{\"title_website\":\"E-shopper\",\"timezone\":\"vn\",\"language\":\"em\",\"logo\":\"\\/storage\\/system\\/jAARj48tuARQnactzw0ioa6BZQkxH0nC8SMXnwc8.png\",\"icon_title_website\":\"\\/storage\\/system\\/9RCRhjKDv8gHIpQ2Fmx9Aqg9zgoRHk87ImA3BXM3.png\"}', NULL, '2024-05-13 13:36:01', '2024-05-14 08:52:12'),
(14, 'payment', '{\"momo\":{\"endpoint\":\"https:\\/\\/test-payment.momo.vn\\/v2\\/gateway\\/api\\/create\",\"secretKey\":\"at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa\",\"accessKey\":\"klm05TvNBzhg7h7j\",\"partnerCode\":\"MOMOBKUN20180529\",\"ipnUrl\":\"https:\\/\\/webhook.site\\/b3088a6a-2d17-4f8d-a383-71389a6c600b\",\"redirectUrl\":null},\"vnpay\":{\"vnp_HashSecret\":\"XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN\",\"vnp_TmnCode\":\"CGXZLS0Z\"}}', NULL, '2024-05-28 10:41:39', '2024-05-28 23:51:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `links` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views_count` bigint(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `image_url`, `title`, `content`, `location`, `links`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `views_count`) VALUES
(1, '/storage/sliders/WvBc9Yq1zMAX0O9DxHMLl8zgrIf0FQq1aj8G8Opp.jpg', 'Thời trang trẻ em', '123123', 1, NULL, 1, '2024-05-09 00:40:51', '2024-05-14 08:56:56', NULL, 0),
(2, '/storage/sliders/dW1R8ZSMh9Z6IDqeNCqfRuAap7sJZRycBb76Xfq6.jpg', 'Thời trang nữ', 'ádasd', 2, 123, 1, '2024-05-09 00:57:01', '2024-05-09 01:24:33', NULL, 0),
(4, '/storage/sliders/GnH9CStDWm3I6GPxBPtAearWwObk7xFg6P6xHgrf.jpg', 'Thời trang nam', '123', 3, 123, 1, '2024-05-09 01:00:34', '2024-05-09 01:23:14', NULL, 0),
(5, '/storage/sliders/JBgYLVmEsof9Ndo8tu8VjZPsglo0dvMb5mu2OaeH.png', '123123', '123123', NULL, 123, 1, '2024-06-01 04:44:18', '2024-06-01 04:45:10', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'qưeqwe', NULL, '2024-05-05 05:57:04', '2024-05-05 05:57:04'),
(2, 'qưeqweeeee', NULL, '2024-05-05 05:57:04', '2024-05-05 05:57:04'),
(3, '12323', NULL, '2024-05-05 05:59:07', '2024-05-05 05:59:07'),
(4, '12312321', NULL, '2024-05-05 05:59:07', '2024-05-05 05:59:07'),
(5, '123123', NULL, '2024-05-05 09:58:21', '2024-05-05 09:58:21'),
(6, '21312', NULL, '2024-05-06 03:15:20', '2024-05-06 03:15:20'),
(7, '12312', NULL, '2024-05-06 20:19:40', '2024-05-06 20:19:40'),
(8, '333333333', NULL, '2024-05-06 20:20:06', '2024-05-06 20:20:06'),
(9, '213', NULL, '2024-05-06 21:18:15', '2024-05-06 21:18:15'),
(10, 'áo thung', NULL, '2024-05-06 22:38:08', '2024-05-06 22:38:08'),
(11, 'áo thung xám', NULL, '2024-05-06 22:38:08', '2024-05-06 22:38:08'),
(12, '13', NULL, '2024-05-13 05:51:55', '2024-05-13 05:51:55'),
(13, '222', NULL, '2024-05-13 05:51:55', '2024-05-13 05:51:55'),
(14, '123', NULL, '2024-05-13 05:58:10', '2024-05-13 05:58:10'),
(15, '3333', NULL, '2024-05-13 05:58:10', '2024-05-13 05:58:10'),
(16, 'áo', NULL, '2024-05-13 08:36:39', '2024-05-13 08:36:39'),
(17, 'áddp', NULL, '2024-05-13 08:46:59', '2024-05-13 08:46:59'),
(18, 'Đầm', NULL, '2024-05-25 06:04:52', '2024-05-25 06:04:52'),
(19, 'sdfasdf', NULL, '2024-06-01 04:21:38', '2024-06-01 04:21:38'),
(20, 'ádfasdf', NULL, '2024-06-01 04:21:38', '2024-06-01 04:21:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar_url` varchar(255) DEFAULT 'https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?t=st=1695654153~exp=1695654753~hmac=ccdb7ab9b584ef4ad693ca318468fa2a00e1fb54c36baee3dac67355bccaf946',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar_url`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `facebook_id`, `google_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin master', 'https://www.pphfoundation.ca/wp-content/uploads/2018/05/default-avatar-600x600.png', 'admin01@admin.com', NULL, '$2y$10$2qAfsLf5IZWqpT4co3mbve9AGIVDoF6gKg4iOu6gXllw9Vn1zbBOu', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Nguyễn Hoàng Phúc', 'https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?t=st=1695654153~exp=1695654753~hmac=ccdb7ab9b584ef4ad693ca318468fa2a00e1fb54c36baee3dac67355bccaf946', 'nguyenhoangphuc211122@gmail.com', NULL, '$2y$10$Qc0tsv23OBPYH8vquGj.GuvZCjLkuiVNZ9ygLLVF6rKLIyNNRf6pG', NULL, NULL, NULL, NULL, '2024-05-10 13:26:07', '2024-06-08 14:11:48', 1),
(8, 'Hoàng Phúc Nguyễn', 'https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?t=st=1695654153~exp=1695654753~hmac=ccdb7ab9b584ef4ad693ca318468fa2a00e1fb54c36baee3dac67355bccaf946', 'nguyenhoangphuc201122@gmail.com', NULL, '$2y$10$vZwFO2MqQB5bWbrhuyDDWu5ArB/BmpgrGv9Aac2UJDOL67r4Sg.K.', NULL, 'Ob4vt8NhGDBwEhv1mzvxAMAjTUPLaY45n10Raas60BQyULJnHf0IufpfpV7a', '1783940355733607', '115782043516573192991', '2024-06-12 06:23:53', '2024-06-12 07:00:35', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `id_user`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 2, 9, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_item_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_item_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_variation_id_foreign` (`variation_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `permissions_role`
--
ALTER TABLE `permissions_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permissions_role_role_id_foreign` (`role_id`);

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
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_id_category_foreign` (`id_category`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tags_id_product_foreign` (`id_product`),
  ADD KEY `product_tags_id_tag_foreign` (`id_tag`);

--
-- Chỉ mục cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variations_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_parent_id_foreign` (`parent_id`),
  ADD KEY `reviews_id_user_foreign` (`id_user`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`),
  ADD UNIQUE KEY `users_facebook_id_unique` (`facebook_id`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_id_user_foreign` (`id_user`),
  ADD KEY `user_role_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT cho bảng `permissions_role`
--
ALTER TABLE `permissions_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_item_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_item` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `product_variations` (`id`);

--
-- Các ràng buộc cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `permissions_role`
--
ALTER TABLE `permissions_role`
  ADD CONSTRAINT `permissions_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_id_tag_foreign` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `sliders` (`id`);

--
-- Các ràng buộc cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_role_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
