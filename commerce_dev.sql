-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 26, 2023 lúc 12:51 AM
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
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `views_count` bigint(20) DEFAULT 0,
  `name_category` varchar(255) NOT NULL,
  `slug_category` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `views_count`, `name_category`, `slug_category`, `deleted_at`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 0, 'quần áo thể thao', 'quan-ao-the-thao', '2023-09-25 09:02:09', 0, '2023-09-25 08:59:42', '2023-09-25 09:02:09'),
(2, 0, 'ÁO KHOÁC', 'ao-khoac', '2023-09-25 09:07:06', 0, '2023-09-25 09:00:56', '2023-09-25 09:07:06'),
(3, 0, 'Quần Short', 'quan-short', '2023-09-25 09:07:02', 0, '2023-09-25 09:01:03', '2023-09-25 09:07:02'),
(4, 0, 'SƠ MI', 'so-mi', '2023-09-25 09:06:59', 0, '2023-09-25 09:01:11', '2023-09-25 09:06:59'),
(5, 0, 'QUẦN DÀI', 'quan-dai', '2023-09-25 09:06:55', 0, '2023-09-25 09:01:21', '2023-09-25 09:06:55'),
(6, 0, 'QUẦN SHORT', 'quan-short', '2023-09-25 09:06:52', 0, '2023-09-25 09:01:27', '2023-09-25 09:06:52'),
(7, 0, 'SALE', 'sale', '2023-09-25 09:02:16', 0, '2023-09-25 09:01:47', '2023-09-25 09:02:16'),
(8, 0, 'QUẦN SHORT', 'quan-short', '2023-09-25 09:06:49', 0, '2023-09-25 09:01:58', '2023-09-25 09:06:49'),
(9, 0, 'Áo Khoác Nỉ', 'ao-khoac-ni', '2023-09-25 09:06:46', 2, '2023-09-25 09:02:47', '2023-09-25 09:06:46'),
(10, 0, 'Áo Khoác Dù', 'ao-khoac-du', '2023-09-25 09:06:41', 2, '2023-09-25 09:02:55', '2023-09-25 09:06:41'),
(11, 0, 'Áo Khoác Kaki', 'ao-khoac-kaki', '2023-09-25 09:06:38', 2, '2023-09-25 09:03:02', '2023-09-25 09:06:38'),
(12, 0, 'Áo Khoác Kaki', 'ao-khoac-kaki', '2023-09-25 09:06:34', 2, '2023-09-25 09:03:11', '2023-09-25 09:06:34'),
(13, 0, 'Áo Khoác Blazer', 'ao-khoac-blazer', '2023-09-25 09:06:30', 2, '2023-09-25 09:03:23', '2023-09-25 09:06:30'),
(14, 0, 'Áo Thun Tay Ngắn', 'ao-thun-tay-ngan', '2023-09-25 09:06:27', 3, '2023-09-25 09:03:31', '2023-09-25 09:06:27'),
(15, 0, 'Áo Thun Tay Dài', 'ao-thun-tay-dai', '2023-09-25 09:06:24', 3, '2023-09-25 09:03:38', '2023-09-25 09:06:24'),
(16, 0, 'Áo Thun Polo', 'ao-thun-polo', '2023-09-25 09:06:18', 3, '2023-09-25 09:03:45', '2023-09-25 09:06:18'),
(17, 0, 'Áo Khoác', 'ao-khoac', NULL, 0, '2023-09-25 09:07:34', '2023-09-25 09:07:34'),
(18, 0, 'Áo Khoác Nữ', 'ao-khoac-nu', NULL, 17, '2023-09-25 09:07:43', '2023-09-25 09:07:43'),
(19, 0, 'Áo Khoác UNISEX', 'ao-khoac-unisex', NULL, 17, '2023-09-25 09:07:49', '2023-09-25 09:07:49'),
(20, 0, 'Áo Khoác Nam', 'ao-khoac-nam', NULL, 17, '2023-09-25 09:07:53', '2023-09-25 09:07:53'),
(21, 0, 'Áo Thun', 'ao-thun', NULL, 23, '2023-09-25 09:08:29', '2023-09-25 09:09:57'),
(22, 0, 'Quần Dài', 'quan-dai', NULL, 23, '2023-09-25 09:08:35', '2023-09-25 09:09:37'),
(23, 0, 'Đồ Nam', 'do-nam', NULL, 0, '2023-09-25 09:08:44', '2023-09-25 09:08:44'),
(24, 0, 'Áo Sơ mi nam', 'ao-so-mi-nam', NULL, 23, '2023-09-25 09:08:59', '2023-09-25 09:08:59'),
(25, 0, 'Quần Short', 'quan-short', NULL, 23, '2023-09-25 09:09:07', '2023-09-25 09:09:07'),
(26, 0, 'Đồ Nữ', 'do-nu', NULL, 0, '2023-09-25 09:10:20', '2023-09-25 09:10:20'),
(27, 0, 'Áo Kiểu', 'ao-kieu', NULL, 26, '2023-09-25 09:10:26', '2023-09-25 09:10:26'),
(28, 0, 'Áo Thun', 'ao-thun', NULL, 26, '2023-09-25 09:10:34', '2023-09-25 09:10:34'),
(29, 0, 'Áo Sơ Mi Nữ', 'ao-so-mi-nu', NULL, 26, '2023-09-25 09:10:40', '2023-09-25 09:11:53'),
(30, 0, 'Chân Váy', 'chan-vay', NULL, 26, '2023-09-25 09:10:51', '2023-09-25 09:10:51'),
(31, 0, 'Đầm Nữ', 'dam-nu', NULL, 26, '2023-09-25 09:10:56', '2023-09-25 09:11:38');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id_menus` bigint(20) UNSIGNED NOT NULL,
  `name_menus` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `route` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id_menus`, `name_menus`, `parent_id`, `route`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trang Chủ', 0, '127.0.0.1:8000/', 'trang-chu', '2023-09-25 08:54:53', '2023-09-25 09:12:36', '2023-09-25 09:12:36'),
(2, 'cửa hàng', 0, '127.0.0.1:8000/shop', 'cua-hang', '2023-09-25 08:55:35', '2023-09-25 09:12:39', '2023-09-25 09:12:39'),
(3, 'TRANG CHỦ', 0, 'http://127.0.0.1:8000/', 'trang-chu', '2023-09-25 09:13:05', '2023-09-25 15:44:25', NULL),
(4, 'sản phẩm', 0, 'http://127.0.0.1:8000/shop', 'san-pham', '2023-09-25 09:13:30', '2023-09-25 15:42:15', '2023-09-25 15:42:15'),
(5, 'áo khoát', 4, 'http://127.0.0.1:8000/shop/category/ao-khoac', 'ao-khoat', '2023-09-25 09:15:24', '2023-09-25 15:42:15', '2023-09-25 15:42:15'),
(6, 'ÁO KHOÁC', 10, 'http://127.0.0.1:8000/shop/category/ao-khoac', 'ao-khoac', '2023-09-25 15:42:45', '2023-09-25 15:49:43', '2023-09-25 15:49:43'),
(7, 'ÁO KHOÁC NAM', 6, 'http://127.0.0.1:8000/shop/category/ao-khoac-nam', 'ao-khoac-nam', '2023-09-25 15:43:18', '2023-09-25 15:49:37', '2023-09-25 15:49:37'),
(8, 'ÁO KHOÁC NỮ', 6, 'http://127.0.0.1:8000/shop/category/ao-khoac-nu', 'ao-khoac-nu', '2023-09-25 15:45:47', '2023-09-25 15:49:40', '2023-09-25 15:49:40'),
(9, 'ÁO KHOÁC UNISEX', 6, 'http://127.0.0.1:8000/shop/category/ao-khoac-unisex', 'ao-khoac-unisex', '2023-09-25 15:46:37', '2023-09-25 15:49:43', '2023-09-25 15:49:43'),
(10, 'SẢN PHẨM', 0, 'http://127.0.0.1:8000/shop', 'san-pham', '2023-09-25 15:48:22', '2023-09-25 15:48:22', NULL);

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
(5, '2023_09_05_044546_crate-categoryr', 1),
(6, '2023_09_07_110949__create-menus', 1),
(7, '2023_09_08_033846__create-products', 1),
(8, '2023_09_08_035340__create-product-images', 1),
(9, '2023_09_08_040107__create-tag', 1),
(10, '2023_09_08_040150__create-product-tags', 1),
(11, '2023_09_12_071550__crete_slider', 1),
(12, '2023_09_14_103414__create-setting', 1),
(13, '2023_09_17_163318_create_permissions', 1),
(14, '2023_09_17_163512_create_roles', 1),
(15, '2023_09_18_045952_create-user_role', 1),
(16, '2023_09_18_050432__create-permissions_roles', 1),
(17, '2023_09_22_200521__create-order-item', 1),
(18, '2023_09_22_200548__create-orders', 1),
(19, '2023_09_22_200623__create-cusomers', 1),
(20, '2023_09_22_202542__creae-fonregin-rorders', 1),
(21, '2023_09_22_204051__create-fonregin-order_item', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customers_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT 0,
  `tola` bigint(20) NOT NULL DEFAULT 0,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions_role`
--

CREATE TABLE `permissions_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_permissions` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `price_product` bigint(20) NOT NULL,
  `slug_product` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `views_count` bigint(20) DEFAULT 0,
  `count_warehouse` bigint(20) DEFAULT 0,
  `like_count` bigint(20) DEFAULT 0,
  `comment_count` bigint(20) DEFAULT 0,
  `feature_image` varchar(255) NOT NULL DEFAULT '/storage/uploads/images/products/QsEd3sG9UNk2597dJ17Os5gRXrpXcTtswiuhm7eZ.jpg',
  `id_category` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `price_product`, `slug_product`, `content`, `views_count`, `count_warehouse`, `like_count`, `comment_count`, `feature_image`, `id_category`, `deleted_at`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'ÁO KHOÁC KAKI UNISEX - TOTODAY - CREWMATE', 450000, 'ao-khoac-kaki-unisex-totoday-crewmate', NULL, 0, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/EjiE8u4Jtn5JAxVRrZ2pqvFqlyaHBD2G2srEe17z.jpg', NULL, '2023-09-25 09:31:03', 1, '2023-09-25 09:29:53', '2023-09-25 09:31:03'),
(2, 'ÁO KHOÁC KAKI UNISEX - TOTODAY - CREWMATE', 450000, 'ao-khoac-kaki-unisex-totoday-crewmate', NULL, 2, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/w6fHMsiI1o7Z6Pjzjjmy9UCZdtDtnAYitivnJ3k0.jpg', 19, NULL, 1, '2023-09-25 09:30:53', '2023-09-25 09:58:28'),
(3, 'ÁO KHOÁC KAKI UNISEX - TOTODAY - BASIC WHITE CAP', 415000, 'ao-khoac-kaki-unisex-totoday-basic-white-cap', NULL, 2, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/q5kgMCP5FQ5EvpOWIbhSYzFCEiU1bG5e9zvVzJM8.jpg', 19, NULL, 1, '2023-09-25 09:32:38', '2023-09-25 10:28:05'),
(4, 'ÁO KHOÁC THUN NỮ - TOTODAY - STRAWBERRY BEAR', 375000, 'ao-khoac-thun-nu-totoday-strawberry-bear', NULL, 2, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/pA8B5NyPAc80HNsm7HtAnalCIkWL85OzVQiUB495.jpg', 18, NULL, 1, '2023-09-25 09:35:10', '2023-09-25 15:41:48'),
(5, 'ÁO KHOÁC DÙ NỮ - TOTODAY - BLISSFULLY', 345000, 'ao-khoac-du-nu-totoday-blissfully', NULL, 1, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/XHKg0s4P42RWAHBRryRrrCvTA7MzeghXzzDmDvoN.jpg', 18, NULL, 1, '2023-09-25 09:36:55', '2023-09-25 15:41:32'),
(6, 'Váy liền nữ cổ tròn cộc tay dáng ôm', 149500, 'vay-lien-nu-co-tron-coc-tay-dang-om', NULL, 0, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/YdiZwmWEoUAHrVznDqM1IpqbeYpM30rt7qfHYwa7.webp', 30, NULL, 1, '2023-09-25 15:33:01', '2023-09-25 15:33:01'),
(7, 'ÁO THUN NỮ - TOTODAY - NARIELE EXCEPTION', 235000, 'ao-thun-nu-totoday-nariele-exception', NULL, 0, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/lShGazGt14L9MqpAaU1w1xOrvsNZFxMbBugWN0M8.jpg', 28, NULL, 1, '2023-09-25 15:37:00', '2023-09-25 15:37:00'),
(8, 'ÁO THUN NỮ - TOTODAY - CROWNS', 255000, 'ao-thun-nu-totoday-crowns', NULL, 0, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/JeOenwL5K3fabMfrhxXDN4uJXdpI2B5ot7czTIJ1.jpg', 28, NULL, 1, '2023-09-25 15:38:38', '2023-09-25 15:38:38'),
(9, 'ÁO SƠ MI NAM - TOTODAY - 09302', 315000, 'ao-so-mi-nam-totoday-09302', NULL, 1, 0, 0, 0, 'http://127.0.0.1:8000/storage/uploads/images/products/mlvpMkOTvhjLKoi4z4L6AmqTuU0vz95W3idTFNvU.jpg', 23, NULL, 1, '2023-09-25 15:40:51', '2023-09-25 15:41:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id_image` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id_image`, `id_product`, `path`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'http://127.0.0.1:8000/storage/uploads/images/products/J7uMBDmpXglGZfcIlbst0tvBW6soKjY6ihnGoUnE.jpg', NULL, '2023-09-25 09:32:38', '2023-09-25 09:32:38'),
(2, 3, 'http://127.0.0.1:8000/storage/uploads/images/products/nc9yCxc4YsxKEoGZzruhzJfK8IHTspGZM5GXh8i5.jpg', NULL, '2023-09-25 09:32:39', '2023-09-25 09:32:39'),
(3, 3, 'http://127.0.0.1:8000/storage/uploads/images/products/VaKBvSGZLLmTzNjc8uMof0Z4P5PWkrS87Mr3tBxK.jpg', NULL, '2023-09-25 09:32:39', '2023-09-25 09:32:39'),
(4, 3, 'http://127.0.0.1:8000/storage/uploads/images/products/36RCQhFn21xD1vxZam6LxGg7BxPQF5ldPLGt42nq.jpg', NULL, '2023-09-25 09:32:39', '2023-09-25 09:32:39'),
(5, 2, 'http://127.0.0.1:8000/storage/uploads/images/products/LasFjK8OezPoAsXfZ3IDYwEXOPzKPyXoB2fmmEyH.jpg', NULL, '2023-09-25 09:33:27', '2023-09-25 09:33:27'),
(6, 2, 'http://127.0.0.1:8000/storage/uploads/images/products/onSE8Cd46hwCU4NnqTu882oBwPTGugI2FyiFW6jE.jpg', NULL, '2023-09-25 09:33:28', '2023-09-25 09:33:28'),
(7, 2, 'http://127.0.0.1:8000/storage/uploads/images/products/p5GfaBObVhEKLIVnB3Z36Tv3iZVZH1GVzP5kSBAb.jpg', NULL, '2023-09-25 09:33:28', '2023-09-25 09:33:28'),
(8, 2, 'http://127.0.0.1:8000/storage/uploads/images/products/Z7y8MXD5EwQTNAw7YOOJ9E8yZem6QWkaiF2zFkaN.jpg', NULL, '2023-09-25 09:33:28', '2023-09-25 09:33:28'),
(9, 2, 'http://127.0.0.1:8000/storage/uploads/images/products/olAkBFAeUkaL5synwAg3MEZp2Jm3bvqIPNT6X5R8.jpg', NULL, '2023-09-25 09:33:28', '2023-09-25 09:33:28'),
(10, 4, 'http://127.0.0.1:8000/storage/uploads/images/products/9eXxWXKHBL21aSW5xom5uJ9bhkzoEREZK4Qfo14I.jpg', NULL, '2023-09-25 09:35:10', '2023-09-25 09:35:10'),
(11, 4, 'http://127.0.0.1:8000/storage/uploads/images/products/AQvRAD6zFF0IM1FB9UM6kNe0PyKv4zhZ01Utflds.jpg', NULL, '2023-09-25 09:35:10', '2023-09-25 09:35:10'),
(12, 4, 'http://127.0.0.1:8000/storage/uploads/images/products/8gME4wMFRP2TIzHkYxG9uaMlvtfv7JMUlmEOlYGQ.jpg', NULL, '2023-09-25 09:35:10', '2023-09-25 09:35:10'),
(13, 4, 'http://127.0.0.1:8000/storage/uploads/images/products/cOINsS1uVapftg93UkcpxY72tS9df6SHLLVnSfdF.jpg', NULL, '2023-09-25 09:35:10', '2023-09-25 09:35:10'),
(14, 5, 'http://127.0.0.1:8000/storage/uploads/images/products/58H83STiMajELgJyqG0lcewu259CRjno9fVYCEaB.jpg', NULL, '2023-09-25 09:36:55', '2023-09-25 09:36:55'),
(15, 5, 'http://127.0.0.1:8000/storage/uploads/images/products/uxuqyexQlPhQu6jPawrOCtwuZoymSJw5ui6LXG2B.jpg', NULL, '2023-09-25 09:36:55', '2023-09-25 09:36:55'),
(16, 5, 'http://127.0.0.1:8000/storage/uploads/images/products/60WMpYIG0wGg2yHzt2f3r6mrsKaCSNML0XTc5X8H.jpg', NULL, '2023-09-25 09:36:55', '2023-09-25 09:36:55'),
(17, 5, 'http://127.0.0.1:8000/storage/uploads/images/products/miCn2ov3IUClm50Gl16V2QBfNQTVOSJvBiYl0OGX.jpg', NULL, '2023-09-25 09:36:55', '2023-09-25 09:36:55'),
(18, 5, 'http://127.0.0.1:8000/storage/uploads/images/products/i3Jb1AfZk1wClr7M9yE22X6EgodW8e48FGDOS7l3.jpg', NULL, '2023-09-25 09:36:56', '2023-09-25 09:36:56'),
(19, 6, 'http://127.0.0.1:8000/storage/uploads/images/products/9VuwsWN0N5YkFb4Xb92GviBeHxgUq3vHM6yMUEV8.webp', NULL, '2023-09-25 15:33:02', '2023-09-25 15:33:02'),
(20, 6, 'http://127.0.0.1:8000/storage/uploads/images/products/yXMZkfpsufdeBVJq4e3tpcUtXQYsO8XnHs0ZcS0B.webp', NULL, '2023-09-25 15:33:02', '2023-09-25 15:33:02'),
(21, 6, 'http://127.0.0.1:8000/storage/uploads/images/products/RTwqvlGNncmwr5yBKgpEMSuSKfJghHmNjgJCQB3w.webp', NULL, '2023-09-25 15:33:02', '2023-09-25 15:33:02'),
(22, 7, 'http://127.0.0.1:8000/storage/uploads/images/products/NtHLm4BYe4RCRj8ZKJxXpDJH7F9wbG9NVUI2KC8T.jpg', NULL, '2023-09-25 15:37:00', '2023-09-25 15:37:00'),
(23, 7, 'http://127.0.0.1:8000/storage/uploads/images/products/pnoCa9hxsFzqyX860R8Dd78bI6RLgVjlyFpmKvP0.jpg', NULL, '2023-09-25 15:37:00', '2023-09-25 15:37:00'),
(24, 7, 'http://127.0.0.1:8000/storage/uploads/images/products/BbCNW0ZO3G6rdnOl15oJcNbOq41eqpyshRp6ARz6.jpg', NULL, '2023-09-25 15:37:00', '2023-09-25 15:37:00'),
(25, 7, 'http://127.0.0.1:8000/storage/uploads/images/products/5QhcD65yv42UHFLJoBlfqjC4TSU6XNEMGZcmnnpK.jpg', NULL, '2023-09-25 15:37:00', '2023-09-25 15:37:00'),
(26, 7, 'http://127.0.0.1:8000/storage/uploads/images/products/OJmWRLd36aBTB0boxv0l4lIR4NhtkZQeCOuq73jD.jpg', NULL, '2023-09-25 15:37:00', '2023-09-25 15:37:00'),
(27, 8, 'http://127.0.0.1:8000/storage/uploads/images/products/iaX2YIXPFRfAGd7gh7iAnwur9jX6ZQAR59vcqQrD.jpg', NULL, '2023-09-25 15:38:38', '2023-09-25 15:38:38'),
(28, 8, 'http://127.0.0.1:8000/storage/uploads/images/products/4GUxSx18jpj7BjVGiPEyo1XnRxNAnP5T8IGga03V.jpg', NULL, '2023-09-25 15:38:38', '2023-09-25 15:38:38'),
(29, 8, 'http://127.0.0.1:8000/storage/uploads/images/products/daJXvP8SZIHd05W60iiarB2zDnmvhyPsVkSnSy0A.jpg', NULL, '2023-09-25 15:38:38', '2023-09-25 15:38:38'),
(30, 9, 'http://127.0.0.1:8000/storage/uploads/images/products/GUVbeGdL7A6IqFqd3Dk0erqYA694etCUTEw99R1H.jpg', NULL, '2023-09-25 15:40:51', '2023-09-25 15:40:51'),
(31, 9, 'http://127.0.0.1:8000/storage/uploads/images/products/Uq7tUxqo4u5uV8lyGUTx6r4YP3xbROup1GGoyyTu.jpg', NULL, '2023-09-25 15:40:51', '2023-09-25 15:40:51'),
(32, 9, 'http://127.0.0.1:8000/storage/uploads/images/products/E0AMTYIafIkdrh7PtY7FVIf8HgGqpW5ort8qsCVa.jpg', NULL, '2023-09-25 15:40:51', '2023-09-25 15:40:51');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id_setting` bigint(20) UNSIGNED NOT NULL,
  `name_setting` varchar(255) NOT NULL,
  `value_setting` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id_slider` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `name_slider` varchar(255) NOT NULL,
  `description_slider` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id_slider`, `deleted_at`, `image_url`, `name_slider`, `description_slider`, `created_at`, `updated_at`) VALUES
(1, NULL, 'http://127.0.0.1:8000/storage/uploads/images/slider/88E3cNbGBqO6V3mLMwJuRCI9HBPGJa2VxsDragTs.jpg', 'Bộ Sưu Tập Thu Đông Mới Nhất!', 'Chào đón mùa thu với phong cách mới lạ và đầy cá tính! Bộ sưu tập Thu Đông của chúng tôi đã sẵn sàng để bạn thể hiện bản thân một cách độc đáo.', '2023-09-25 09:41:50', '2023-09-25 09:52:11'),
(2, NULL, 'http://127.0.0.1:8000/storage/uploads/images/slider/q7hKwvrtXhsYB7sBTOfSVXrf1kc1TgRchH9i7pee.jpg', 'Sắp Tới Mùa Thu: Bộ Sưu Tập Thời Trang Lôi Cuốn', 'Chào đón mùa thu với phong cách mới lạ và đầy cá tính! Bộ sưu tập Thu Đông của chúng tôi đã sẵn sàng để bạn thể hiện bản thân một cách độc đáo.', '2023-09-25 09:42:58', '2023-09-25 09:51:21'),
(3, NULL, 'http://127.0.0.1:8000/storage/uploads/images/slider/GxQEXIQRQjS6Hb3lXyRiUW2DvLJd9sEH3uhzmNyM.jpg', 'Thời Trang Chất Lượng Chỉ Có Tại Chúng Tôi', 'Chào đón mùa thu với phong cách mới lạ và đầy cá tính! Bộ sưu tập Thu Đông của chúng tôi đã sẵn sàng để bạn thể hiện bản thân một cách độc đáo.', '2023-09-25 09:44:08', '2023-09-25 09:51:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id_tag` bigint(20) UNSIGNED NOT NULL,
  `name_tag` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar_url`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin master', 'https://www.pphfoundation.ca/wp-content/uploads/2018/05/default-avatar-600x600.png', 'admin01@admin.com', NULL, '$2y$10$Lq/VuXcng8GsdSdCHliJJuUYagyFELCcDv4TWwDLbHnVxzuQkTY3O', NULL, NULL, NULL, NULL);

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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

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
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menus`);

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
  ADD KEY `orders_customers_id_foreign` (`customers_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions_role`
--
ALTER TABLE `permissions_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_permissions_foreign` (`id_permissions`),
  ADD KEY `permissions_role_id_role_foreign` (`id_role`);

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
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `products_user_id` (`id_user`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `product_images_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tags_id_product_foreign` (`id_product`),
  ADD KEY `product_tags_id_tag_foreign` (`id_tag`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menus` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions_role`
--
ALTER TABLE `permissions_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id_image` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id_slider` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);

--
-- Các ràng buộc cho bảng `permissions_role`
--
ALTER TABLE `permissions_role`
  ADD CONSTRAINT `permissions_role_id_permissions_foreign` FOREIGN KEY (`id_permissions`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permissions_role_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `products_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Các ràng buộc cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `product_tags_id_tag_foreign` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`);

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
