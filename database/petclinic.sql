-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2023 pada 13.24
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petclinic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `doctor_gender` varchar(10) NOT NULL,
  `doctor_address` varchar(100) NOT NULL,
  `doctor_phone` varchar(15) NOT NULL,
  `doctor_photo` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_name`, `doctor_gender`, `doctor_address`, `doctor_phone`, `doctor_photo`) VALUES
(2, 'Deni', 'Male', 'Bandung', '089814124124', 'default.png'),
(5, 'Tes', 'Male', 'Jakarta', '08921839132', 'd.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicals_210017`
--

CREATE TABLE `medicals_210017` (
  `mr_id_210017` int(11) NOT NULL,
  `mr_date_210017` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pet_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `symptom_210017` varchar(255) NOT NULL,
  `diagnose_210017` varchar(255) NOT NULL,
  `treatment_210017` varchar(255) NOT NULL,
  `cost_210017` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `medicals_210017`
--

INSERT INTO `medicals_210017` (`mr_id_210017`, `mr_date_210017`, `pet_id`, `doctor_id`, `symptom_210017`, `diagnose_210017`, `treatment_210017`, `cost_210017`) VALUES
(1, '2022-12-03 04:00:07', 2, 2, 'gatal', 'jamuran', 'salep', 10),
(2, '2022-12-03 04:09:50', 2, 2, 'bersin', 'flu', 'obat khusus', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(30) NOT NULL,
  `pet_type` varchar(30) NOT NULL,
  `pet_gender` varchar(10) NOT NULL,
  `pet_age` int(11) NOT NULL,
  `pet_owner` varchar(50) NOT NULL,
  `pet_address` varchar(100) NOT NULL,
  `pet_phone` varchar(15) NOT NULL,
  `pet_photo` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `pet_type`, `pet_gender`, `pet_age`, `pet_owner`, `pet_address`, `pet_phone`, `pet_photo`) VALUES
(2, 'Axel', 'Bird', 'Male', 6, 'Deni', 'Bandung', '089128392123', 'bird.jpg'),
(3, 'Shiro', 'Cat', 'Female', 3, 'Tes', 'Jakarta', '089214372184', 'cat.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_210017`
--

CREATE TABLE `users_210017` (
  `userid_210017` int(11) NOT NULL,
  `username_210017` varchar(100) NOT NULL,
  `password_210017` varchar(255) NOT NULL,
  `usertype_210017` varchar(10) NOT NULL,
  `fullname_210017` varchar(100) NOT NULL,
  `user_photo_210017` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_210017`
--

INSERT INTO `users_210017` (`userid_210017`, `username_210017`, `password_210017`, `usertype_210017`, `fullname_210017`, `user_photo_210017`) VALUES
(1, 'Deni', '$2y$10$N9oBwVzFUze..XC/zhEkxOG7/z3Kg6QAW/FUMCq456dQsrv1DEUyK', 'Manager', 'Deni Purwanto', '3.jpg'),
(2, 'Denii', '$2y$10$MjnSlu6PpiRDiowGlpLlpuXLwra6nNDL42uJWoUHAenZKyZtQuMOG', 'Staff', 'Deni Purwanto', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indeks untuk tabel `medicals_210017`
--
ALTER TABLE `medicals_210017`
  ADD PRIMARY KEY (`mr_id_210017`),
  ADD KEY `pet_id` (`pet_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indeks untuk tabel `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indeks untuk tabel `users_210017`
--
ALTER TABLE `users_210017`
  ADD PRIMARY KEY (`userid_210017`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `medicals_210017`
--
ALTER TABLE `medicals_210017`
  MODIFY `mr_id_210017` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_210017`
--
ALTER TABLE `users_210017`
  MODIFY `userid_210017` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `medicals_210017`
--
ALTER TABLE `medicals_210017`
  ADD CONSTRAINT `medicals_210017_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`),
  ADD CONSTRAINT `medicals_210017_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
