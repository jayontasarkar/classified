-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table elibrary.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `borrow_id` int(10) unsigned DEFAULT NULL,
  `member_id` int(10) unsigned DEFAULT NULL,
  `penalty` double(8,2) DEFAULT NULL,
  `payment` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.accounts: ~0 rows (approximately)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `borrow_id`, `member_id`, `penalty`, `payment`, `discount`, `created_at`, `updated_at`) VALUES
	(1, NULL, 2, NULL, 300.00, 50.00, '2017-04-09 00:28:20', '2017-04-09 00:28:20');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table elibrary.authors
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.authors: ~2 rows (approximately)
DELETE FROM `authors`;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`id`, `name`, `biography`, `nationality`, `created_at`, `updated_at`) VALUES
	(1, 'Test Author 1', 'biography of test author 1', 1, '2017-03-29 00:27:46', '2017-03-29 00:35:36'),
	(2, 'Test Author 2', NULL, 2, '2017-03-29 00:28:29', '2017-03-29 00:28:29'),
	(3, 'Test Author 3', NULL, 1, '2017-03-29 00:29:01', '2017-03-29 00:29:01');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;

-- Dumping structure for table elibrary.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_copy` int(11) NOT NULL,
  `available_copy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.books: ~9 rows (approximately)
DELETE FROM `books`;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `isbn`, `title`, `author_id`, `category_id`, `location`, `total_copy`, `available_copy`, `created_at`, `updated_at`) VALUES
	(1, 'C2450', 'Test title of Book 1', 3, 4, NULL, 10, 8, '2017-03-30 00:47:50', '2017-04-09 00:39:46'),
	(2, 'C2451', 'Test Title of Book 2', 1, 4, NULL, 15, 11, '2017-03-30 00:48:33', '2017-04-09 00:52:07'),
	(3, 'C2452', 'Test Title of Book 3', 3, 1, NULL, 5, 5, '2017-03-30 00:49:03', '2017-04-07 15:25:14'),
	(4, 'C2453', 'Test Title of Book 4', 3, 4, 'Test location of Book 1', 20, 18, '2017-03-31 12:50:55', '2017-04-09 00:44:59'),
	(5, 'C2454', 'Test title of Book 5', 2, 3, 'Test location of Book 1', 10, 8, '2017-04-04 00:29:04', '2017-04-09 00:55:09'),
	(6, 'C2455', 'test title of book 6', 2, 2, 'test location', 10, 10, '2017-04-07 10:29:28', '2017-04-07 10:29:28'),
	(7, 'C2456', 'test title of book 7', 1, 2, 'test location', 12, 12, '2017-04-07 10:29:57', '2017-04-07 10:29:58'),
	(8, 'C2457', 'test title of book 8', 3, 1, 'test location', 6, 6, '2017-04-07 10:30:33', '2017-04-07 10:30:34'),
	(9, 'C2458', 'test title of book 9', 3, 2, 'test location', 4, 3, '2017-04-07 10:31:02', '2017-04-09 00:45:00');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Dumping structure for table elibrary.borrows
CREATE TABLE IF NOT EXISTS `borrows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `penalty` double(8,2) NOT NULL DEFAULT 0.00,
  `copies` int(11) NOT NULL DEFAULT 1,
  `borrow_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `return_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.borrows: ~2 rows (approximately)
DELETE FROM `borrows`;
/*!40000 ALTER TABLE `borrows` DISABLE KEYS */;
INSERT INTO `borrows` (`id`, `book_id`, `member_id`, `penalty`, `copies`, `borrow_date`, `return_date`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 0.00, 1, '2017-03-29 00:52:07', NULL, '2017-04-09 00:52:07', '2017-04-09 00:52:07'),
	(2, 5, 2, 0.00, 1, '2017-04-09 00:55:09', NULL, '2017-04-09 00:52:07', '2017-04-09 00:55:09');
/*!40000 ALTER TABLE `borrows` ENABLE KEYS */;

-- Dumping structure for table elibrary.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.categories: ~4 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Category 1', 'description of test category 1', '2017-03-28 11:10:57', '2017-03-28 11:10:57'),
	(2, 'Category 2', 'description of test category 2', '2017-03-28 11:11:22', '2017-03-28 11:11:22'),
	(3, 'Category 3', 'description of test category 3', '2017-03-28 11:14:35', '2017-03-28 11:14:35'),
	(4, 'Category 4', 'description of test category 4', '2017-03-28 11:20:48', '2017-03-28 23:48:44');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table elibrary.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.galleries: ~12 rows (approximately)
DELETE FROM `galleries`;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` (`id`, `path`, `created_at`, `updated_at`) VALUES
	(1, '149076841858db52229cfca.jpg', '2017-03-29 12:20:18', '2017-03-29 12:20:18'),
	(3, '149076841958db5223997cd.jpg', '2017-03-29 12:20:19', '2017-03-29 12:20:19'),
	(4, '149076841958db5223a4107.jpg', '2017-03-29 12:20:19', '2017-03-29 12:20:19'),
	(5, '149076844958db5241c7e81.jpg', '2017-03-29 12:20:49', '2017-03-29 12:20:49'),
	(6, '149076845058db524217cb0.jpg', '2017-03-29 12:20:50', '2017-03-29 12:20:50'),
	(7, '149076845058db52429f78b.jpg', '2017-03-29 12:20:50', '2017-03-29 12:20:50'),
	(8, '149076845058db5242e8782.jpg', '2017-03-29 12:20:50', '2017-03-29 12:20:50'),
	(9, '149076846858db5254be1bd.jpg', '2017-03-29 12:21:08', '2017-03-29 12:21:08'),
	(10, '149076846858db5254cb75d.jpg', '2017-03-29 12:21:08', '2017-03-29 12:21:08'),
	(11, '149076846958db525568206.jpg', '2017-03-29 12:21:09', '2017-03-29 12:21:09'),
	(12, '149076846958db5255b8c67.jpg', '2017-03-29 12:21:09', '2017-03-29 12:21:09');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;

-- Dumping structure for table elibrary.histories
CREATE TABLE IF NOT EXISTS `histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `borrow_id` int(10) unsigned NOT NULL,
  `copies` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'borrow',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.histories: ~2 rows (approximately)
DELETE FROM `histories`;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
INSERT INTO `histories` (`id`, `borrow_id`, `copies`, `type`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'borrow', '2017-04-09 00:52:07', '2017-04-09 00:52:07'),
	(2, 2, 1, 'borrow', '2017-04-09 00:52:08', '2017-04-09 00:52:08');
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;

-- Dumping structure for table elibrary.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.members: ~4 rows (approximately)
DELETE FROM `members`;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` (`id`, `code`, `name`, `address`, `phone`, `type`, `gender`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'S0125', 'Dummy Member 1', 'test address 1', '01354364560', 'student', 'male', NULL, 1, '2017-03-31 13:03:52', '2017-03-31 13:03:52'),
	(2, 'S0126', 'Dummy Student 2', 'test address 2', '01744520020', 'student', 'male', NULL, 1, '2017-03-31 13:04:33', '2017-03-31 13:04:33'),
	(3, 'S0127', 'Dummy Student 3', 'test address 3', '01354364534', 'student', 'male', NULL, 1, '2017-03-31 13:05:07', '2017-03-31 13:05:07'),
	(4, 'T0125', 'Dummy Faculty 1', 'test address 4', '01745098237', 'teacher', 'male', NULL, 1, '2017-04-04 23:40:13', '2017-04-04 23:40:13');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;

-- Dumping structure for table elibrary.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.migrations: ~7 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(15, '2014_10_12_000000_create_users_table', 1),
	(16, '2014_10_12_100000_create_password_resets_table', 1),
	(17, '2017_03_23_181852_create_sessions_table', 1),
	(18, '2017_03_26_131601_create_members_table', 1),
	(19, '2017_03_27_143244_create_galleries_table', 1),
	(20, '2017_03_28_101554_create_categories_table', 1),
	(21, '2017_03_29_000153_create_authors_table', 2),
	(23, '2017_03_30_001258_create_books_table', 3),
	(24, '2017_03_31_230104_create_borrows_table', 4),
	(25, '2017_04_07_234351_create_histories_table', 5),
	(26, '2017_04_08_234935_create_accounts_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table elibrary.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table elibrary.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.sessions: ~3 rows (approximately)
DELETE FROM `sessions`;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0bN0oXUgvJ8wlGkdaK2Wx3jGYGFhd33sLNwz3xbz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxOToiaHR0cDovL2VsaWJyYXJ5LmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJSdFo5VTY2WlQzTUNEZ3ZyYnRHZFE2U01OdEpobERzR0VTa21hTXFjIjt9', 1491850937),
	('pqi9Lnts7jm5vHffefkPqe6RFZ1CSG3UmdLwwLzn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicVBVVTBmM0NxTnVIM2JPY2Q4ZDhEajcxRDlvME94emJXYnMyamg0TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9lbGlicmFyeS5kZXYvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjA6e319', 1491850875),
	('sTWm0qs6yxQQIFpDEJuMz1VjFRLFgUbuevTZ1PTC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFIyb1NaYUs0Q3ZQYmdKVHBtT0xudEpnTnNzMjBrTTlIc0xzbHd3UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9lbGlicmFyeS5kZXYvdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1491678275),
	('vn8X0ySEe5PIMf95qykWJcuYqKaCMvHkuiIDNtGn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia3F0Yll2SGhZZnBXVjRGckRZWXhxWFNzR0NYRXB4VThNNUdYdldDOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9lbGlicmFyeS5kZXYvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjA6e319', 1491854287);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table elibrary.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `address`, `password`, `type`, `status`, `avatar`, `dob`, `gender`, `code`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
	(1, 'Jayonta Sarkar', 'jayonta.aiub@gmail.com', 'jayonta', '01744520025', 'Nikunjo-2, Uttara, Dhaka', '$2y$10$AqoPRCqgmtDRa749JPDFnO7MFbHTBRlr67fTA0KF2nfTxQxUgzPH2', 'librarian', 1, '149078630958db98054fe56.png', '1989-06-30 00:00:00', 'male', 'L101', 'HPpgBfvcIxI5PgAeLCUEnUgN82yx40aodmFPBQWp50mWYXXTlh9nuPeUWxbx', '2017-04-11 01:03:08', '2017-03-29 14:56:35', '2017-04-11 01:03:08'),
	(2, 'Murad Hossain', NULL, 'murad', '01733254720', 'Laxmipur, Fulbari, Dinajpur', '$2y$10$sTtoDb/8UDEB8wEt9NIFoOq.pv5wkGsTgRP5BVCfE.azRHRYxD2ya', 'librarian', 1, NULL, '1984-04-09 00:00:00', 'male', 'L102', NULL, NULL, '2017-04-09 01:04:34', '2017-04-09 01:04:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
