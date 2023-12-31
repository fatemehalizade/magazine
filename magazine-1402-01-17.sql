-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 10:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `en_name`, `level`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'آشپزی', 'cooking', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(2, 'سلامت', 'exercise', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(3, 'زیبایی', 'make-up', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(4, 'تغذیه', 'feeding', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(5, 'روانشناسی', 'psychology', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(6, 'سبک زندگی', 'life-style', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(7, 'موفقیت', 'success', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(8, 'سرگرمی', 'fun', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(9, 'مد', 'fashion', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45'),
(10, 'نشریه ها', 'journal', 1, 0, '2023-04-04 09:50:45', '2023-04-04 09:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `full_name`, `email`, `comment`, `comment_id`, `status`, `created_at`, `updated_at`, `post_id`) VALUES
(2, 'test', 'test@gmail.com', 'comment test :)', 0, 1, '2023-04-04 07:30:41', '2023-04-04 07:30:41', 7),
(3, 'test2', 'test@gmail.com', 'test 2 comment :)', 0, 1, '2023-04-04 07:53:10', '2023-04-04 07:53:10', 7),
(4, 'test3', 'test3@gmail.com', 'test 3 comment :)', 0, 1, '2023-04-04 07:53:27', '2023-04-04 07:53:27', 7),
(5, 'reply , test', 'testtest@gmail.com', 'a', 2, 1, '2023-04-04 07:30:41', '2023-04-04 07:30:41', 7),
(6, 'reply , test 5', 'test5test@gmail.com', 'reply commet id 5', 5, 1, '2023-04-04 07:30:41', '2023-04-04 07:30:41', 7),
(7, 'بهرام گور', 'bahram@gmail.com', 'این اولین نظر تستی است .', 0, 1, '2023-04-06 01:49:04', '2023-04-06 01:49:04', 1),
(8, 'سکینه بابلی', 'babol@gmail.com', 'به به چه دمی !', 0, 1, '2023-04-06 05:20:31', '2023-04-06 05:20:31', 1),
(9, 'رحمان و رحیم', 'rahman@gmail.com', 'reply --- test 3 comment :)', 4, 1, '2023-04-06 07:43:56', '2023-04-06 07:43:56', 7);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, 'رحمان و رحیم', 'a@gmail.com', 'موضوع تستی', 'پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی . پیام تستی .', '2023-04-04 06:20:24', '2023-04-04 06:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_02_103725_create_roles_table', 1),
(6, '2023_03_02_104047_create_messages_table', 1),
(7, '2023_03_02_104804_create_socialmedias_table', 1),
(8, '2023_03_02_105252_create_profile_table', 1),
(9, '2023_03_02_105855_create_tags_table', 1),
(10, '2023_03_02_110012_create_categories_table', 1),
(11, '2023_03_02_110328_create_comments_table', 1),
(12, '2023_03_02_110713_create_posts_table', 1),
(13, '2023_03_02_111238_create_views_table', 1),
(14, '2023_03_04_063217_create_post_tag_table', 1),
(15, '2023_03_04_063404_create_role_user_table', 1),
(16, '2023_03_27_101213_create_tickets_table', 1),
(17, '2023_03_02_112310_add_foreign_key', 2),
(18, '2023_03_04_062707_add_foreign_key', 2),
(19, '2023_03_04_063001_add_foreign_key', 2),
(20, '2023_03_27_101327_add_foreign_key', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `suggested` int(11) NOT NULL DEFAULT 0,
  `time_reading` int(11) NOT NULL DEFAULT 0,
  `summery` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `subject`, `status`, `suggested`, `time_reading`, `summery`, `description`, `created_at`, `updated_at`, `user_id`, `category_id`) VALUES
(1, 'upload/post/test.jpg', 'تست 3', 1, 0, 6, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 5),
(2, 'upload/post/test.jpg', 'تست 33', 1, 1, 3, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 4),
(3, 'upload/post/test.jpg', '354 تست', 0, 0, 8, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 7),
(4, 'upload/post/test.jpg', 'تست 539', 1, 1, 5, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 3),
(5, 'upload/post/test.jpg', 'تست 853', 1, 1, 11, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 4),
(6, 'upload/post/test.jpg', '953 تست', 1, 0, 12, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 5),
(7, 'upload/post/test.jpg', 'تست 234', 1, 0, 6, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 10),
(8, 'upload/post/test.jpg', 'تست 300', 0, 1, 9, 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . ', '2023-04-04 10:18:14', '2023-04-04 10:18:14', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `tag_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 6, 5, '2023-04-04 10:31:30', '2023-04-04 10:31:30'),
(2, 5, 5, '2023-04-04 10:31:47', '2023-04-04 10:31:47'),
(3, 2, 2, '2023-04-04 10:32:29', '2023-04-04 10:32:29'),
(4, 6, 6, '2023-04-04 10:31:30', '2023-04-04 10:31:30'),
(5, 3, 5, '2023-04-04 10:31:30', '2023-04-04 10:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `logo`, `name`, `mobile_number`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'مجله خبری بانوان', '09391295257', 'مازندران ، ساری', 'این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . این یک متن تستی است . ', '2023-04-04 09:47:43', '2023-04-04 09:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-04-04 10:22:38', '2023-04-04 10:22:38'),
(2, 'writer', '2023-04-04 10:22:38', '2023-04-04 10:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-04-04 10:23:14', '2023-04-04 10:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedias`
--

CREATE TABLE `socialmedias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmedias`
--

INSERT INTO `socialmedias` (`id`, `name`, `en_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'ایمیل', 'email', 'info@example.com', '2023-04-04 09:48:29', '2023-04-04 09:48:29'),
(2, 'اینستاگرام', 'instagram', '#', '2023-04-04 09:48:29', '2023-04-04 09:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'پست', '2023-04-04 10:25:26', '2023-04-04 10:25:26'),
(2, 'محصول', '2023-04-04 10:25:26', '2023-04-04 10:25:26'),
(3, 'تستی', '2023-04-04 10:25:26', '2023-04-04 10:25:26'),
(4, 'مجله', '2023-04-04 10:25:26', '2023-04-04 10:25:26'),
(5, 'مجله خبری بانوان', '2023-04-04 10:25:26', '2023-04-04 10:25:26'),
(6, 'خبری', '2023-04-04 10:25:26', '2023-04-04 10:25:26'),
(7, 'بانوان', '2023-04-04 10:25:26', '2023-04-04 10:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from_user` bigint(20) UNSIGNED NOT NULL,
  `to_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `first_name`, `last_name`, `mobile_number`, `email`, `email_verified_at`, `username`, `password`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'فاطمه', 'علیزاده', '09391295157', 'fatemeh.alzd.faz@gmail.com', NULL, 'admin', 'admin', 'تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تستی . تست', 1, NULL, '2023-04-04 10:16:43', '2023-04-04 10:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `ip`, `created_at`, `updated_at`, `user_id`, `post_id`) VALUES
(1, '::1', '2023-04-04 06:54:50', '2023-04-04 06:54:50', NULL, 5),
(2, '::1', '2023-04-04 06:54:57', '2023-04-04 06:54:57', NULL, 5),
(3, '::1', '2023-04-04 07:00:46', '2023-04-04 07:00:46', NULL, 5),
(4, '::1', '2023-04-04 07:01:22', '2023-04-04 07:01:22', NULL, 5),
(5, '::1', '2023-04-04 07:02:00', '2023-04-04 07:02:00', NULL, 5),
(6, '::1', '2023-04-04 07:02:20', '2023-04-04 07:02:20', NULL, 5),
(7, '::1', '2023-04-04 07:02:57', '2023-04-04 07:02:57', NULL, 5),
(8, '::1', '2023-04-04 07:03:37', '2023-04-04 07:03:37', NULL, 7),
(9, '::1', '2023-04-04 07:23:52', '2023-04-04 07:23:52', NULL, 7),
(10, '::1', '2023-04-04 07:24:30', '2023-04-04 07:24:30', NULL, 7),
(11, '::1', '2023-04-04 07:24:41', '2023-04-04 07:24:41', NULL, 7),
(12, '::1', '2023-04-04 07:27:03', '2023-04-04 07:27:03', NULL, 7),
(13, '::1', '2023-04-04 07:27:27', '2023-04-04 07:27:27', NULL, 7),
(14, '::1', '2023-04-04 07:27:30', '2023-04-04 07:27:30', NULL, 7),
(15, '::1', '2023-04-04 07:28:23', '2023-04-04 07:28:23', NULL, 7),
(16, '::1', '2023-04-04 07:28:33', '2023-04-04 07:28:33', NULL, 7),
(17, '::1', '2023-04-04 07:29:54', '2023-04-04 07:29:54', NULL, 7),
(18, '::1', '2023-04-04 07:30:34', '2023-04-04 07:30:34', NULL, 7),
(19, '::1', '2023-04-04 07:30:42', '2023-04-04 07:30:42', NULL, 7),
(20, '::1', '2023-04-04 07:30:48', '2023-04-04 07:30:48', NULL, 7),
(21, '::1', '2023-04-04 07:31:50', '2023-04-04 07:31:50', NULL, 7),
(22, '::1', '2023-04-04 07:31:52', '2023-04-04 07:31:52', NULL, 7),
(23, '::1', '2023-04-04 07:51:53', '2023-04-04 07:51:53', NULL, 7),
(24, '::1', '2023-04-04 07:52:12', '2023-04-04 07:52:12', NULL, 7),
(25, '::1', '2023-04-04 07:52:45', '2023-04-04 07:52:45', NULL, 7),
(26, '::1', '2023-04-04 07:53:10', '2023-04-04 07:53:10', NULL, 7),
(27, '::1', '2023-04-04 07:53:27', '2023-04-04 07:53:27', NULL, 7),
(28, '::1', '2023-04-04 07:54:14', '2023-04-04 07:54:14', NULL, 7),
(29, '::1', '2023-04-04 07:54:44', '2023-04-04 07:54:44', NULL, 7),
(30, '::1', '2023-04-04 07:55:49', '2023-04-04 07:55:49', NULL, 7),
(31, '::1', '2023-04-04 07:56:46', '2023-04-04 07:56:46', NULL, 7),
(32, '::1', '2023-04-04 07:57:42', '2023-04-04 07:57:42', NULL, 7),
(33, '::1', '2023-04-04 07:58:27', '2023-04-04 07:58:27', NULL, 7),
(34, '::1', '2023-04-04 08:00:58', '2023-04-04 08:00:58', NULL, 7),
(35, '::1', '2023-04-04 08:01:44', '2023-04-04 08:01:44', NULL, 7),
(36, '::1', '2023-04-04 08:02:40', '2023-04-04 08:02:40', NULL, 7),
(37, '::1', '2023-04-04 08:03:22', '2023-04-04 08:03:22', NULL, 7),
(38, '::1', '2023-04-04 08:03:53', '2023-04-04 08:03:53', NULL, 7),
(39, '::1', '2023-04-04 08:04:37', '2023-04-04 08:04:37', NULL, 7),
(40, '::1', '2023-04-04 08:05:20', '2023-04-04 08:05:20', NULL, 7),
(41, '::1', '2023-04-04 08:06:01', '2023-04-04 08:06:01', NULL, 7),
(42, '::1', '2023-04-04 08:06:39', '2023-04-04 08:06:39', NULL, 7),
(43, '::1', '2023-04-04 08:26:45', '2023-04-04 08:26:45', NULL, 4),
(44, '::1', '2023-04-04 08:26:51', '2023-04-04 08:26:51', NULL, 7),
(45, '127.0.0.1', '2023-04-06 01:36:18', '2023-04-06 01:36:18', NULL, 7),
(46, '127.0.0.1', '2023-04-06 01:47:58', '2023-04-06 01:47:58', NULL, 7),
(47, '127.0.0.1', '2023-04-06 01:48:15', '2023-04-06 01:48:15', NULL, 1),
(48, '127.0.0.1', '2023-04-06 01:49:05', '2023-04-06 01:49:05', NULL, 1),
(49, '127.0.0.1', '2023-04-06 01:49:11', '2023-04-06 01:49:11', NULL, 1),
(50, '127.0.0.1', '2023-04-06 01:49:28', '2023-04-06 01:49:28', NULL, 1),
(51, '127.0.0.1', '2023-04-06 05:20:32', '2023-04-06 05:20:32', NULL, 1),
(52, '127.0.0.1', '2023-04-06 05:20:41', '2023-04-06 05:20:41', NULL, 1),
(53, '127.0.0.1', '2023-04-06 05:56:04', '2023-04-06 05:56:04', NULL, 8),
(54, '127.0.0.1', '2023-04-06 05:56:34', '2023-04-06 05:56:34', NULL, 4),
(55, '127.0.0.1', '2023-04-06 05:56:45', '2023-04-06 05:56:45', NULL, 8),
(56, '127.0.0.1', '2023-04-06 05:57:14', '2023-04-06 05:57:14', NULL, 8),
(57, '127.0.0.1', '2023-04-06 05:57:38', '2023-04-06 05:57:38', NULL, 8),
(58, '127.0.0.1', '2023-04-06 05:58:06', '2023-04-06 05:58:06', NULL, 8),
(59, '127.0.0.1', '2023-04-06 05:58:48', '2023-04-06 05:58:48', NULL, 8),
(60, '127.0.0.1', '2023-04-06 06:03:39', '2023-04-06 06:03:39', NULL, 4),
(61, '127.0.0.1', '2023-04-06 06:03:48', '2023-04-06 06:03:48', NULL, 4),
(62, '127.0.0.1', '2023-04-06 06:03:51', '2023-04-06 06:03:51', NULL, 4),
(63, '127.0.0.1', '2023-04-06 06:04:36', '2023-04-06 06:04:36', NULL, 4),
(64, '127.0.0.1', '2023-04-06 06:30:14', '2023-04-06 06:30:14', NULL, 5),
(65, '127.0.0.1', '2023-04-06 06:30:45', '2023-04-06 06:30:45', NULL, 7),
(66, '127.0.0.1', '2023-04-06 06:44:39', '2023-04-06 06:44:39', NULL, 7),
(67, '127.0.0.1', '2023-04-06 06:45:20', '2023-04-06 06:45:20', NULL, 7),
(68, '127.0.0.1', '2023-04-06 07:32:40', '2023-04-06 07:32:40', NULL, 7),
(69, '127.0.0.1', '2023-04-06 07:32:50', '2023-04-06 07:32:50', NULL, 5),
(70, '127.0.0.1', '2023-04-06 07:41:04', '2023-04-06 07:41:04', NULL, 5),
(71, '127.0.0.1', '2023-04-06 07:42:35', '2023-04-06 07:42:35', NULL, 5),
(72, '127.0.0.1', '2023-04-06 07:42:54', '2023-04-06 07:42:54', NULL, 7),
(73, '127.0.0.1', '2023-04-06 07:43:56', '2023-04-06 07:43:56', NULL, 7),
(74, '127.0.0.1', '2023-04-06 07:44:17', '2023-04-06 07:44:17', NULL, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_category_id_index` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_tag_id_index` (`tag_id`),
  ADD KEY `post_tag_post_id_index` (`post_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `socialmedias`
--
ALTER TABLE `socialmedias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_from_user_index` (`from_user`),
  ADD KEY `tickets_to_user_index` (`to_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_user_id_index` (`user_id`),
  ADD KEY `views_post_id_index` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socialmedias`
--
ALTER TABLE `socialmedias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_from_user_foreign` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_to_user_foreign` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
