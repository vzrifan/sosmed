-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 21.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `sosmed`
--
-- --------------------------------------------------------
--
-- Struktur dari tabel `admin`
--
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--
INSERT INTO
  `admin` (`id`, `username`, `password`)
VALUES
  (1, 'admin', 'admin');

-- --------------------------------------------------------
--
-- Struktur dari tabel `comments`
--
CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_posting` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment_text` varchar(1000) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comments`
--
INSERT INTO
  `comments` (
    `id_comment`,
    `id_posting`,
    `id_user`,
    `comment_text`,
    `comment_date`
  )
VALUES
  (1, 1, 2, 'Great post!', '2023-12-23 11:15:00'),
  (2, 2, 3, 'Nice content!', '2023-12-23 11:20:00'),
  (
    3,
    2,
    1,
    'I have a question.',
    '2023-12-23 11:25:00'
  ),
  (
    4,
    1,
    3,
    'Thanks for sharing!',
    '2023-12-23 11:30:00'
  ),
  (
    5,
    3,
    2,
    'Interesting topic!',
    '2023-12-23 11:35:00'
  ),
  (6, 1, 2, 'ok', '2023-12-23 19:20:04'),
  (7, 10, 2, 'gg', '2023-12-23 20:42:37'),
  (8, 10, 2, 'wkwkwk', '2023-12-23 20:42:56'),
  (9, 8, 2, 'okk', '2023-12-23 20:44:07'),
  (10, 10, 2, 'okk', '2023-12-23 20:45:13');

-- --------------------------------------------------------
--
-- Struktur dari tabel `followers`
--
CREATE TABLE `followers` (
  `followers_id` int(11) NOT NULL,
  `following_id` int(11) DEFAULT NULL,
  `follower_id` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `followers`
--
INSERT INTO
  `followers` (`followers_id`, `following_id`, `follower_id`)
VALUES
  (1, 6, 1),
  (2, 2, 1),
  (3, 3, 1),
  (4, 2, 3),
  (7, 3, 2),
  (8, 6, 2),
  (14, 1, 2);

-- --------------------------------------------------------
--
-- Struktur dari tabel `likes`
--
CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_posting` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likes`
--
INSERT INTO
  `likes` (`id_like`, `id_user`, `id_posting`, `created_at`)
VALUES
  (22, 2, 9, '2023-12-23 20:34:02'),
  (23, 2, 1, '2023-12-23 20:34:40'),
  (25, 2, 6, '2023-12-23 20:35:53'),
  (26, 2, 2, '2023-12-23 20:36:16'),
  (27, 2, 3, '2023-12-23 20:36:30'),
  (28, 2, 8, '2023-12-23 20:36:45'),
  (34, 2, 4, '2023-12-23 20:45:09');

-- --------------------------------------------------------
--
-- Struktur dari tabel `posting`
--
CREATE TABLE `posting` (
  `id_posting` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posting`
--
INSERT INTO
  `posting` (`id_posting`, `id`, `content`, `post_date`)
VALUES
  (
    1,
    1,
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis, metus sit amet fringilla lacinia, felis dolor tincidunt libero, vel iaculis metus urna eu eros.',
    '2023-12-23 18:01:37'
  ),
  (
    2,
    2,
    'Phasellus sagittis ipsum eget odio aliquet, vel facilisis mi aliquet. Sed vel tortor quis metus fringilla posuere ut id purus.',
    '2023-12-23 18:01:37'
  ),
  (
    3,
    6,
    'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut vehicula est eu tortor euismod, vel tristique justo finibus.',
    '2023-12-23 18:01:37'
  ),
  (
    4,
    6,
    'Suspendisse potenti. Sed et arcu in velit rhoncus vulputate vel vel elit. Nulla facilisi.',
    '2023-12-23 18:01:37'
  ),
  (
    6,
    2,
    'Curabitur fermentum lectus eget sapien ultrices, ut semper nisl consectetur. Vestibulum malesuada purus non mauris auctor.',
    '2023-12-23 18:01:37'
  ),
  (
    7,
    2,
    'Fusce in libero urna. Donec vel dui sed neque cursus laoreet eu id velit.',
    '2023-12-23 18:01:37'
  ),
  (
    8,
    2,
    'In vel justo vitae velit varius luctus in ac sem. Etiam ut sagittis justo. Aliquam erat volutpat.',
    '2023-12-23 18:01:37'
  ),
  (
    9,
    2,
    'Integer vel purus id leo congue egestas. Morbi nec metus vitae lectus bibendum auctor.',
    '2023-12-23 18:01:37'
  ),
  (
    10,
    2,
    'Praesent vel eros quis mauris blandit facilisis. Proin vel lectus vel purus finibus fermentum a sit amet nisl.',
    '2023-12-23 18:12:55'
  );

-- --------------------------------------------------------
--
-- Struktur dari tabel `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--
INSERT INTO
  `users` (`id`, `username`, `password`)
VALUES
  (
    1,
    'user1',
    '$2y$10$Bwk8m9uCSyzwQJD6CpkKZeOebo.hTeb6yIn6EIGJ5.AuLxZqOOKk6'
  ),
  (
    2,
    'user2',
    '$2y$10$HAjhjwUN0VJJXZjxEg5lY.J1Zy//MuGQZwNYkj6HLuxhdTpYYozWm'
  ),
  (
    3,
    'user3',
    '$2y$10$/MdSCaWytOoc/9.he3gDXONjONEmmEgcfw7JThesVUKO/tX5ExcoO'
  ),
  (
    6,
    'admin',
    '$2y$10$U//YocU6P1vxgp0/P/Gd6.hRtQs9Yq4it9jytnsoCbE.IYWq43D6i'
  );

--
-- Indexes for dumped tables
--
--
-- Indeks untuk tabel `admin`
--
ALTER TABLE
  `admin`
ADD
  PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE
  `comments`
ADD
  PRIMARY KEY (`id_comment`),
ADD
  KEY `id_posting` (`id_posting`),
ADD
  KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `followers`
--
ALTER TABLE
  `followers`
ADD
  PRIMARY KEY (`followers_id`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE
  `likes`
ADD
  PRIMARY KEY (`id_like`),
ADD
  KEY `id_user` (`id_user`),
ADD
  KEY `id_posting` (`id_posting`);

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE
  `posting`
ADD
  PRIMARY KEY (`id_posting`),
ADD
  KEY `id` (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--
--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE
  `admin`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE
  `comments`
MODIFY
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;

--
-- AUTO_INCREMENT untuk tabel `followers`
--
ALTER TABLE
  `followers`
MODIFY
  `followers_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 15;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE
  `likes`
MODIFY
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 35;

--
-- AUTO_INCREMENT untuk tabel `posting`
--
ALTER TABLE
  `posting`
MODIFY
  `id_posting` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--
--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE
  `comments`
ADD
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_posting`) REFERENCES `posting` (`id_posting`) ON DELETE CASCADE,
ADD
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE
  `likes`
ADD
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
ADD
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_posting`) REFERENCES `posting` (`id_posting`);

--
-- Ketidakleluasaan untuk tabel `posting`
--
ALTER TABLE
  `posting`
ADD
  CONSTRAINT `posting_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;