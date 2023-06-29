/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : ecommerce

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 26/06/2023 21:12:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `status` smallint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES (32, 1, 101, 1, 1, '2023-06-14 10:36:07', '2023-06-14 10:54:57');
INSERT INTO `carts` VALUES (33, 1, 105, 1, 1, '2023-06-14 10:54:37', '2023-06-14 10:54:57');
INSERT INTO `carts` VALUES (34, 1, 102, 1, 1, '2023-06-14 10:54:44', '2023-06-14 10:54:57');
INSERT INTO `carts` VALUES (35, 1, 103, 1, 1, '2023-06-14 10:58:55', '2023-06-14 10:58:57');
INSERT INTO `carts` VALUES (36, 1, 101, 1, 1, '2023-06-14 11:34:45', '2023-06-14 11:34:49');
INSERT INTO `carts` VALUES (37, 1, 105, 1, 1, '2023-06-15 00:11:23', '2023-06-15 00:11:28');
INSERT INTO `carts` VALUES (38, 5, 101, 1, 1, '2023-06-26 11:35:07', '2023-06-26 11:35:14');
INSERT INTO `carts` VALUES (39, 5, 101, 1, 1, '2023-06-26 11:36:02', '2023-06-26 11:36:07');
INSERT INTO `carts` VALUES (40, 5, 101, 1, 1, '2023-06-26 11:37:16', '2023-06-26 11:37:19');
INSERT INTO `carts` VALUES (41, 5, 101, 1, 1, '2023-06-26 11:37:30', '2023-06-26 11:40:04');
INSERT INTO `carts` VALUES (42, 5, 101, 1, 1, '2023-06-26 11:40:28', '2023-06-26 11:42:50');
INSERT INTO `carts` VALUES (43, 5, 101, 1, 1, '2023-06-26 11:42:59', '2023-06-26 11:43:03');
INSERT INTO `carts` VALUES (44, 5, 101, 1, 1, '2023-06-26 11:43:38', '2023-06-26 11:44:37');
INSERT INTO `carts` VALUES (45, 5, 101, 1, 1, '2023-06-26 11:44:53', '2023-06-26 11:44:57');
INSERT INTO `carts` VALUES (46, 5, 101, 1, 1, '2023-06-26 11:45:24', '2023-06-26 11:45:29');
INSERT INTO `carts` VALUES (47, 5, 101, 3, 1, '2023-06-26 11:46:00', '2023-06-26 11:46:05');
INSERT INTO `carts` VALUES (48, 5, 104, 2, 1, '2023-06-26 13:12:28', '2023-06-26 13:12:35');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Beans', 'beans', 'beans', 'product/almond-1687782179.jpg', '2023-06-25 23:39:12', '2023-06-26 12:22:59');
INSERT INTO `categories` VALUES (2, 'Rice', 'rice', 'rice', 'product/brown-rice-1687782190.jpg', '2023-06-26 11:53:09', '2023-06-26 12:23:10');
INSERT INTO `categories` VALUES (3, 'Breads & Eggs', 'breads-eggs', 'bread', 'product/bread-1687782202.jpg', '2023-06-26 11:54:24', '2023-06-26 12:23:22');
INSERT INTO `categories` VALUES (4, 'Tea & Coffee', 'tea-coffee', 'tea', 'product/blackcurrant-tea-1687782236.jpg', '2023-06-26 11:54:31', '2023-06-26 12:23:56');
INSERT INTO `categories` VALUES (5, 'Fruits', 'fruits', 'fruit', 'product/apple-1687782253.jpg', '2023-06-26 11:54:38', '2023-06-26 12:24:13');
INSERT INTO `categories` VALUES (10, 'Vegetables', 'vegetables', 'vegetables', 'product/carrot-1687784897.jpg', '2023-06-26 13:08:17', '2023-06-26 13:08:17');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for investments
-- ----------------------------
DROP TABLE IF EXISTS `investments`;
CREATE TABLE `investments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `investor_id` int NOT NULL,
  `invest_quantity` int NULL DEFAULT NULL,
  `commission` int NOT NULL,
  `income` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of investments
-- ----------------------------
INSERT INTO `investments` VALUES (2, 101, 9, 10, 5, 8000, '2023-06-26 11:07:47', '2023-06-26 11:45:29');
INSERT INTO `investments` VALUES (4, 104, 10, 10, 2, 480, '2023-06-26 13:09:49', '2023-06-26 13:12:35');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_06_12_121316_create_carts_table', 2);
INSERT INTO `migrations` VALUES (6, '2023_06_12_121322_create_products_table', 2);
INSERT INTO `migrations` VALUES (7, '2023_06_25_160354_create_categories_table', 3);
INSERT INTO `migrations` VALUES (8, '2023_06_26_022801_create_investments_table', 4);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (5, 'App\\Models\\User', 2, 'auth_token', '9623fd071cef28990e20646710c110bdea1d789b8b0b91abcefb29c0f2770259', '[\"*\"]', NULL, NULL, '2023-06-12 13:36:26', '2023-06-12 13:36:26');
INSERT INTO `personal_access_tokens` VALUES (15, 'App\\Models\\User', 4, 'auth_token', 'c962db8e35949d6279b737b72180ac6053d58e01a7b86ac403cde8bb88de1b63', '[\"*\"]', NULL, NULL, '2023-06-12 14:36:13', '2023-06-12 14:36:13');
INSERT INTO `personal_access_tokens` VALUES (31, 'App\\Models\\User', 7, 'auth_token', '4e3c8fea1951eae424d918b418ffed65165ca21cb2275aea416f6af187ae21b0', '[\"*\"]', NULL, NULL, '2023-06-15 11:17:22', '2023-06-15 11:17:22');
INSERT INTO `personal_access_tokens` VALUES (35, 'App\\Models\\User', 8, 'auth_token', '138f169fb1da5fe302994cf3968a4d8e548737dcf3a84c18d371a0015a2dbfb2', '[\"*\"]', NULL, NULL, '2023-06-26 11:00:44', '2023-06-26 11:00:44');
INSERT INTO `personal_access_tokens` VALUES (38, 'App\\Models\\User', 10, 'auth_token', '61f4bbf03b7c4093b6f6895fbc27586e8270643e5e36511cdfb1bee5d4aab98c', '[\"*\"]', NULL, NULL, '2023-06-26 13:09:49', '2023-06-26 13:09:49');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (101, 'beans', 'Biji Kopi', 'biji-kopi', 'Biji Kopi Asli 1KG', 'product/raw-beans-1686738494.jpg', 20000, 11, '2023-06-14 10:28:14', '2023-06-26 11:46:05');
INSERT INTO `products` VALUES (102, 'rice', 'Beras Pulen', 'beras-pulen', 'Beras 1KG', 'product/brown-rice-1686739242.jpg', 14000, 13, '2023-06-14 10:40:42', '2023-06-14 10:54:57');
INSERT INTO `products` VALUES (104, 'fruit', 'Jeruk', 'jeruk', 'Jeruk 1Kg', 'product/orange-1686739717.jpg', 12000, 6, '2023-06-14 10:48:37', '2023-06-26 13:12:35');
INSERT INTO `products` VALUES (105, 'tea', 'Matcha Tea', 'matcha-tea', 'Matcha 1Pcs', 'product/matcha-1686739755.jpg', 22000, 17, '2023-06-14 10:49:15', '2023-06-15 00:11:28');
INSERT INTO `products` VALUES (108, 'vegetables', 'Wortel', 'wortel', 'Wortel 1Kg', 'product/carrot-1686761272.jpg', 8000, 20, '2023-06-14 16:47:52', '2023-06-14 16:47:52');
INSERT INTO `products` VALUES (109, 'bread', 'Roti Tawar', 'roti-tawar', 'Roti Tawar 1Pcs', 'product/bread-1-1686761947.jpg', 12500, 20, '2023-06-14 16:59:07', '2023-06-14 16:59:07');
INSERT INTO `products` VALUES (112, 'rice', 'Beras Putih', 'beras-putih', 'Beras Putih 5Kg', 'product/organic-rice-1687781783.jpg', 55000, 5, '2023-06-26 12:16:23', '2023-06-26 12:16:23');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` enum('admin','user','investor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'user', 'pembeli', 'Pembeli', 'pembeli@gmail.com', '$2y$10$bQMJZU3ygC7Li9JaBfgs/uQyfGWmvN83HaMxegS1yRWuNJbBHbxFy', NULL, '2023-06-12 12:37:23', '2023-06-12 12:37:23');
INSERT INTO `users` VALUES (4, 'user', 'pembeli2', 'Pembeli 2', 'pembeli2@gmail.com', '$2y$10$d8muJabvlXc.ps5GSlPy5.1cKpdRPVs9s4jgrdeZqKnrQrK3uYZcG', NULL, '2023-06-12 14:36:13', '2023-06-12 14:36:13');
INSERT INTO `users` VALUES (5, 'admin', 'root', 'Root', 'root@gmail.com', '$2y$10$bQMJZU3ygC7Li9JaBfgs/uQyfGWmvN83HaMxegS1yRWuNJbBHbxFy', NULL, '2023-06-15 17:39:45', '2023-06-15 17:39:47');
INSERT INTO `users` VALUES (7, 'admin', 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$jklldmhLzRSelbHjVTSrTeHdHioWmffu1EiWsUI7Sl.tVP67QjSK2', NULL, '2023-06-15 11:17:10', '2023-06-15 11:17:10');
INSERT INTO `users` VALUES (9, 'investor', 'investor1', 'Investor', 'investor1@gmail.com', '$2y$10$K.5UwiEV1dSPedFHYu7ZoO4Tif5R32.sr7.6yOc9zg3bEpevBEyD6', NULL, '2023-06-26 11:07:47', '2023-06-26 11:07:47');
INSERT INTO `users` VALUES (10, 'investor', 'investor2', 'Investor 2', 'investor2@gmail.com', '$2y$10$0EVhIrthdEfLFi90b/3X9OledwFg6V.etq32NOpZSZw8IoNwdHsTm', NULL, '2023-06-26 13:09:49', '2023-06-26 13:09:49');

SET FOREIGN_KEY_CHECKS = 1;
