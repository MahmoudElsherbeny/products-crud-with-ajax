-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2023 at 11:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasks_scandiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `attributes` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `type`, `attributes`, `created_at`, `updated_at`) VALUES
(21, 'KMJ250014', 'war & peace', 80.00, 'book', '{\"weight\":\"1 KG\"}', '2023-05-04 10:15:26', '2023-05-04 10:15:26'),
(22, 'KMJ250015', 'war & peace', 80.50, 'book', '{\"weight\":\"1 KG\"}', '2023-05-04 10:15:46', '2023-05-04 10:15:46'),
(23, 'KMJ250016', 'war & peace', 80.00, 'book', '{\"weight\":\"1 KG\"}', '2023-05-04 10:16:07', '2023-05-04 10:16:07'),
(24, 'KMJ250017', 'js course', 150.00, 'dvd', '{\"size\":\"250 MB\"}', '2023-05-04 10:20:16', '2023-05-04 10:20:16'),
(25, 'KMJ250114', 'js course', 150.00, 'dvd', '{\"size\":\"250 MB\"}', '2023-05-04 10:20:42', '2023-05-04 10:20:42'),
(26, 'KMJ250211', 'film', 55.59, 'dvd', '{\"size\":\"220 MB\"}', '2023-05-04 10:21:16', '2023-05-04 10:21:16'),
(27, 'KMJ250310', 'chair', 250.00, 'furniture', '{\"dimensions\":\"10x20x30\"}', '2023-05-04 10:21:48', '2023-05-04 10:21:48'),
(28, 'KMJ250312', 'chair', 160.00, 'furniture', '{\"dimensions\":\"5x10x15\"}', '2023-05-04 10:22:29', '2023-05-04 10:22:29'),
(29, 'KMJ250318', 'table', 499.99, 'furniture', '{\"dimensions\":\"20x40x60\"}', '2023-05-04 10:23:05', '2023-05-04 10:23:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
