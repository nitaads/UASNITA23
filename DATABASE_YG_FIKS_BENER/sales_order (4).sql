-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 05:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `alamat`, `telepon`) VALUES
(3, 'Lee mark rem', 'rancadulang', '0897617277'),
(4, 'jungwoo', 'kemiri', '09867223245'),
(5, 'ningning', 'borobudur', '089675552323');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `status` enum('draft','dikirim','selesai','dibatalkan') NOT NULL DEFAULT 'draft',
  `total_harga` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_sales`, `id_customer`, `tanggal_order`, `status`, `total_harga`) VALUES
(3, 1, 3, '2025-06-08', 'draft', 0.00),
(4, 1, 4, '2025-06-09', 'dikirim', 0.00),
(5, 2, 3, '2025-06-10', 'selesai', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` decimal(50,2) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode_produk`, `nama_produk`, `harga`, `stok`) VALUES
(2, '001', 'jam', 100000.00, 8),
(3, '002', 'tas', 5000000.00, 10),
(4, '003', 'sepatu', 7000000.00, 8),
(5, '004', 'baju', 10000000.00, 9),
(6, '005', 'totebag', 350000.00, 7),
(7, '006', 'celana', 1000000.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `idsales` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `idsales`, `nama`) VALUES
(1, 111, 'jay'),
(2, 222, 'Ryan'),
(3, 333, 'zeus'),
(4, 444, 'yamal'),
(7, 555, 'yeri');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `subtotal` bigint(20) DEFAULT NULL,
  `status` enum('draft','dikirim','selesai','dibatalkan') NOT NULL DEFAULT 'draft',
  `nama` varchar(50) NOT NULL,
  `tglorder` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `product_id`, `nama_pelanggan`, `jumlah`, `harga_satuan`, `subtotal`, `status`, `nama`, `tglorder`) VALUES
(1, 4, 'mark', 2, 7000000, 14000000, 'draft', 'yamal', '2025-06-03'),
(8, 5, 'mark', 2, 50000000, 100000000, 'draft', 'Ryan', '2025-06-02'),
(19, 7, 'nounan', 6, 1000000, 6000000, 'dibatalkan', 'yeri', '2025-06-05'),
(21, 5, 'baijing', 1, 10000, 10000, 'selesai', 'jay', '2025-06-09'),
(23, 4, 'mark', 2, 70000000, 140000000, 'draft', 'Ryan', '2025-06-16'),
(24, 4, 'jay', 2, 70000000, 140000000, 'dikirim', 'Ryan', '2025-06-16'),
(25, 5, 'jake', 2, 50000000, 100000000, 'draft', 'Ryan', '2025-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('sales','admin','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(7, 'mark', '1234567', 'admin'),
(9, 'jay', '$2y$10$WFlmfBzXIfsOREnl3lONH.qpVXJHPEK.p6JHCwxfMgoTHek1ebjKm', 'sales'),
(11, 'jake', '$2y$10$4j5Y.sXfQEnU9jlY7BH6B.LvgfmnI7p9Dl.qW0.D.ZdZ8KUuu4SC.', 'manager'),
(12, 'rem', '$2y$10$utfqw/XAnkNDd23qhHlnkONWzaRCBJVoHpd69qEfkfTeL65HEN6v2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sales` (`id_sales`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_sales`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
