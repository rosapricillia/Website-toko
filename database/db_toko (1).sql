-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306:4306
-- Waktu pembuatan: 23 Agu 2024 pada 18.41
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `login_id`, `produk_id`, `jumlah`, `created_on`) VALUES
(32, 7, 2, 1, '2023-07-29 14:26:27'),
(41, 4, 12, 1, '2024-08-23 16:38:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_on`) VALUES
(1, 'ocha', 'yeppo@gmail.com', '2147483647', 'ssddsd', '2023-06-03 16:45:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_table`
--

CREATE TABLE `login_table` (
  `login_id` int(11) NOT NULL,
  `login_name` varchar(250) NOT NULL,
  `login_email` varchar(250) NOT NULL,
  `login_pw` varchar(250) NOT NULL,
  `login_mobile` varchar(20) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_table`
--

INSERT INTO `login_table` (`login_id`, `login_name`, `login_email`, `login_pw`, `login_mobile`, `role_as`, `created_on`) VALUES
(2, 'admin', 'admin@gmail.com', '12345', '2147483647', 1, '2023-06-03 06:48:13'),
(3, 'user', 'user@gmail.com', '54321', '2147483647', 0, '2023-06-03 07:44:32'),
(4, 'ocha', 'ocha@gmail.com', 'ocha123', '2147483647', 0, '2023-06-03 08:05:44'),
(5, 'martha', 'martha@gmail.com', 'martha123', '2147483647', 0, '2023-06-03 08:11:33'),
(6, 'nesa', 'nesa@gmail.com', 'nesa123', '087766554433', 0, '2023-06-05 17:40:26'),
(7, 'ocha yeppo', 'ochayeppo@gmail.com', '1234567', '0812356788764', 0, '2023-07-29 14:24:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `login_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `status` tinytext NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`orders_id`, `tracking_no`, `login_id`, `nama`, `no_telp`, `kode_pos`, `payment_id`, `total`, `alamat`, `payment_mode`, `status`, `created_on`) VALUES
(1, 'lolyshop38111263542148', 2, 'Martalina feronika sihombing', '081263542148', '20217', 0, 198000, 'jssjsjsj', 'COD', '2', '2023-06-05 17:37:10'),
(2, 'lolyshop303077766655', 6, 'nesa', '0877766655', '20217', 0, 99000, 'air bersih', 'COD', '2\n', '2023-06-05 17:43:57'),
(3, 'lolyshop99331263542148', 3, 'ida', '081263542148', '20217', 0, 900000, 'jajjjajja', 'COD', '1', '2023-06-05 19:29:24'),
(4, 'lolyshop64451263542148', 3, 'Rosa ', '081263542148', '20217', 0, 798000, 'medan', 'COD', '0', '2023-06-06 07:14:34'),
(5, 'lolyshop39611263542148', 7, 'Rosa Pricillia Christine Sihombing', '081263542148', '20217', 0, 198000, 'vcgvb', 'COD', '0', '2023-07-29 14:25:25'),
(6, 'lolyshop43061263542148', 2, 'Rosa ', '081263542148', '20217', 0, 267000, 'jjjhjhjkh', 'COD', '0', '2024-08-23 06:49:54'),
(7, 'lolyshop74801263542148', 2, 'ida', '081263542148', '201879', 0, 200000, 'medan', 'COD', '0', '2024-08-23 16:02:27'),
(8, 'lolyshop93361263542148', 2, 'Rona Mauli Simamora', '081263542148', '89879', 0, 99000, 'riau', 'COD', '0', '2024-08-23 16:32:14'),
(9, 'lolyshop96191263542148', 4, 'Rosa ', '081263542148', '89899', 0, 168000, 'medan timur\r\n', 'COD', '0', '2024-08-23 16:34:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `orders_id` int(191) NOT NULL,
  `produk_id` int(191) NOT NULL,
  `jumlah` int(191) NOT NULL,
  `produk_price` int(191) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_item`
--

INSERT INTO `order_item` (`id`, `orders_id`, `produk_id`, `jumlah`, `produk_price`, `created_on`) VALUES
(1, 1, 9, 2, 99000, '2023-06-05 17:37:10'),
(2, 2, 2, 1, 99000, '2023-06-05 17:43:57'),
(5, 3, 8, 3, 300000, '2023-06-05 19:29:24'),
(6, 4, 8, 2, 300000, '2023-06-06 07:14:34'),
(7, 4, 2, 2, 99000, '2023-06-06 07:14:34'),
(8, 5, 2, 2, 99000, '2023-07-29 14:25:25'),
(9, 6, 6, 2, 99000, '2024-08-23 06:49:54'),
(10, 6, 3, 1, 69000, '2024-08-23 06:49:54'),
(11, 7, 12, 1, 200000, '2024-08-23 16:02:27'),
(12, 8, 2, 1, 99000, '2024-08-23 16:32:14'),
(13, 9, 3, 1, 69000, '2024-08-23 16:34:31'),
(14, 9, 2, 1, 99000, '2024-08-23 16:34:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Make Up'),
(2, 'Skincare'),
(3, 'Vitamin'),
(4, 'Obat'),
(5, 'Aksesoris Fashion');

-- --------------------------------------------------------

--
-- Struktur dari tabel `update_produk`
--

CREATE TABLE `update_produk` (
  `produk_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `produk_name` varchar(250) NOT NULL,
  `produk_price` int(11) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_image` varchar(250) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `update_produk`
--

INSERT INTO `update_produk` (`produk_id`, `id_kategori`, `produk_name`, `produk_price`, `produk_deskripsi`, `produk_stok`, `produk_image`, `post_date`) VALUES
(2, 1, 'Lipstik', 99000, 'bagus', 8, 'lipmatezwart.jpg', '2023-05-24 17:00:00'),
(3, 2, 'wpl dedorant', 69000, 'bagus', 17, 'wpldedorant.jpeg', '2023-05-24 17:00:00'),
(4, 3, 'wpl collagen ', 199000, 'bagus', 40, 'vitamin.jpeg', '2023-05-24 17:00:00'),
(5, 4, 'Minyak', 160000, 'bagus', 10, 'obat.jpeg', '2023-05-24 17:00:00'),
(6, 5, 'Kaca Mata Tren', 99000, 'bagus', 14, 'kacamata.jpeg', '2023-05-24 17:00:00'),
(8, 3, 'BLACKMORES MULTI', 300000, 'bagusssss', 7, 'blackmores_multi.jpg', '2023-06-05 17:16:38'),
(9, 2, 'Hair Treatment Shampoo', 56000, 'sangatt bagus', 41, 'hair_treatment.jpg', '2023-06-05 17:17:19'),
(10, 4, 'Massage Oil', 45000, 'Membuat kulit menjadi kencang', 12, 'massage_oil.jpg', '2023-06-06 02:47:02'),
(11, 3, 'Joju', 180000, 'Memperbaiki Kulit dari dalam', 20, 'joju.jpeg', '2024-08-23 15:50:47'),
(12, 2, 'Serum Pemutih', 200000, 'Serum dengan cairan kental dioleskan ke kulit.\r\nMencerahkan Kulit', 9, 'serum_putih.jpeg', '2024-08-23 16:01:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`login_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indeks untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `update_produk`
--
ALTER TABLE `update_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login_table`
--
ALTER TABLE `login_table`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `update_produk`
--
ALTER TABLE `update_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
