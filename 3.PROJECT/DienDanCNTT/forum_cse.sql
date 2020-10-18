-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2020 lúc 06:47 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `forum_cse`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `cm_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`cm_id`, `body`, `post_id`, `user_id`) VALUES
(5, 'eeegegege', 3, 1),
(6, 'ggegegagaga', 3, 1),
(7, 'gagagag', 3, 1),
(8, 'eeer', 22, 1),
(10, 'Vip that su', 22, 2),
(12, 'Vip qua ba con', 22, 1),
(18, 'lllll', 25, 1),
(19, 'heheheheheheh', 27, 2),
(20, 'hehehehehe', 27, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mitopics`
--

CREATE TABLE `mitopics` (
  `mitopic_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mitopics`
--

INSERT INTO `mitopics` (`mitopic_id`, `title`, `description`, `topic_id`) VALUES
(1, 'Topic con 1', 'gigido', 1),
(2, 'mitopic 2', 'edđ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_at` timestamp NULL DEFAULT NULL,
  `body` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `mitopic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `create_at`, `edit_at`, `body`, `tags`, `status`, `user_id`, `topic_id`, `mitopic_id`) VALUES
(3, 'Post số 1', '2020-10-18 07:12:30', NULL, 'nội dung gì đó', 'hhahahaha', 1, 1, 1, NULL),
(6, 'eeeehehehe', '2020-10-18 11:04:46', NULL, 'eehehahahah', NULL, 1, 1, 1, NULL),
(9, 'hehehehe', '2020-10-18 13:28:27', NULL, 'tét2', '3', 1, 1, 1, NULL),
(10, 'eee44', '2020-10-18 13:37:41', NULL, 'ggg3', 'eee', 1, 1, 1, NULL),
(11, 'eeeee', '2020-10-18 13:38:15', NULL, 'gggf', 'eees', 1, 1, 1, NULL),
(13, 'ggge333', '2020-10-18 13:38:50', NULL, 'adfa', '334', 1, 1, 1, NULL),
(15, 'post test cr1', '2020-10-18 13:39:47', NULL, '23233', 'e', 1, 1, 4, NULL),
(16, 'rrr', '2020-10-18 13:39:59', NULL, 'ggrg', 'eee', 1, 1, 4, NULL),
(22, 'Adu vip', '2020-10-18 14:42:01', '2020-10-18 15:29:51', '12323233errr333wwd33êê', 'eehehehehe', 1, 2, 1, NULL),
(24, 'gegeg', '2020-10-18 15:57:01', NULL, 'gegegeg', 'gegeg', 1, 1, 3, NULL),
(25, '333', '2020-10-18 16:03:16', '2020-10-18 16:05:15', 'egefegeg99', '22', 1, 1, 1, 1),
(27, 'eheheheh', '2020-10-18 16:41:46', '2020-10-18 16:42:01', 'hehehehe', 'ehehehe', 1, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`topic_id`, `title`, `description`, `zone_id`) VALUES
(1, 'Topic lày', 'adu vip', 1),
(2, 'Topic test 2', 'viet gi do', 2),
(3, 'Topic test 2', 'viet gi do', 2),
(4, 'topic vi du', '111', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `email`, `password`, `code`, `create_at`, `admin`, `status`) VALUES
(1, 'hieu2k', 'Hieu Tr', 'hieu207@gmail.com', '123456', NULL, '2020-10-14 15:08:59', 0, 0),
(2, 'hieus207', 'Hiếu Trịnh', 'hieus207@gmail.com', '123', NULL, '2020-10-18 14:41:24', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `zones`
--

INSERT INTO `zones` (`zone_id`, `title`, `description`) VALUES
(1, 'Khu Vực giải trí', 'Nơi vui chơi giải trí'),
(2, 'đây là zone thứ 2 chẳng hạn', 'mô tả cái zone này'),
(3, 'zone 3', 'mo ta gi do');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `mitopics`
--
ALTER TABLE `mitopics`
  ADD PRIMARY KEY (`mitopic_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `mitopics`
--
ALTER TABLE `mitopics`
  MODIFY `mitopic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `mitopics`
--
ALTER TABLE `mitopics`
  ADD CONSTRAINT `mitopics_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`zone_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
