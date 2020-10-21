-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2020 lúc 05:42 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

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
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_at` timestamp NULL DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`cm_id`, `body`, `create_at`, `edit_at`, `post_id`, `user_id`) VALUES
(30, '33', '2020-10-19 10:09:19', '0000-00-00 00:00:00', 35, 2),
(31, '6', '2020-10-19 10:09:28', '2020-10-19 11:44:06', 25, 2),
(36, 'aaa69ihhihih7', '2020-10-19 10:57:41', '0000-00-00 00:00:00', 22, 2),
(37, '333', '2020-10-19 11:06:39', NULL, 22, 2),
(38, 'defedêđe', '2020-10-19 11:06:47', '0000-00-00 00:00:00', 22, 2),
(39, 'vdvdd', '2020-10-19 11:08:38', '0000-00-00 00:00:00', 22, 2),
(40, 'cacacaca2', '2020-10-19 11:08:41', '0000-00-00 00:00:00', 22, 2),
(44, '666', '2020-10-19 11:33:16', NULL, 25, 2),
(47, 'eq', '2020-10-19 11:58:29', NULL, 22, 1),
(62, '6262626', '2020-10-20 14:49:47', NULL, 39, 2);

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
(10, 'AVSAVSAV', 'SAVADVADV', 5),
(11, 'SVSACAS', 'CASCSAC', 6),
(12, 'A ASCSC', 'CSACSACSAC', 7),
(13, ' ASCASCSAC', 'SCSACA', 8),
(14, 'CASCSAC', 'CASCSAC', 9);

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
(22, 'Adu vip', '2020-10-18 14:42:01', '2020-10-18 15:29:51', '12323233errr333wwd33êê', 'eehehehehe', 1, 2, 1, NULL),
(25, '333', '2020-10-18 16:03:16', '2020-10-18 16:05:15', 'egefegeg99', '22', 1, 1, 1, 1),
(33, 'hhh', '2020-10-19 09:40:23', NULL, 'ttt', 't', 1, 2, 1, 0),
(35, '3223', '2020-10-19 09:47:12', NULL, '2525252', '5', 1, 2, 1, 1),
(39, 'câcca', '2020-10-20 01:38:52', '2020-10-20 01:38:57', 'áéấeww', '2', 1, 1, 1, 1),
(41, 'hrhrhrhr', '2020-10-20 15:02:33', NULL, 'ehsehsehse', 'eh', 1, 2, 1, 4),
(43, 'DSẤÉAE', '2020-10-21 15:38:26', NULL, 'DASDSADSADSAD', NULL, 1, 6, 5, NULL),
(44, 'ADASDSADSAD', '2020-10-21 15:38:41', NULL, 'ASDSADSADSADSA', 'ADASDSA', 1, 2, 5, NULL),
(45, 'ACSACSACSAC', '2020-10-21 15:38:54', NULL, 'CASCSACSACSA', NULL, 1, 6, 8, NULL),
(46, 'VAVSAVSAV', '2020-10-21 15:39:07', NULL, 'VASVSAVASVAS', 'ASVSAVA', 1, 13, 9, NULL),
(47, 'AVSAVA', '2020-10-21 15:39:26', NULL, 'VAVSAVA', 'VASVA', 1, 2, 6, NULL),
(48, 'ACASCSA', '2020-10-21 15:39:30', NULL, 'ACSACSA', '', 1, 2, 6, NULL),
(49, 'CASCSAC', '2020-10-21 15:39:33', NULL, 'CASCSAC', '', 1, 2, 6, NULL),
(50, 'CASCASCSACW', '2020-10-21 15:39:44', NULL, 'CASCSACSAC', 'CSACAS', 1, 2, 7, NULL),
(51, 'ZAAWAWC', '2020-10-21 15:39:49', NULL, 'CACAW', 'CSAVASVA', 1, 2, 7, NULL),
(52, 'VAVAEVAC', '2020-10-21 15:39:55', NULL, 'EVEVAVEA', 'VAEVAEVAEV', 1, 2, 7, NULL),
(53, 'EAVAVD', '2020-10-21 15:40:03', NULL, 'ZVAVAVA', 'ZVAD', 1, 2, 9, NULL),
(54, 'ASVASCAD', '2020-10-21 15:40:14', NULL, 'ASVSAVSA', 'CASCAV', 1, 2, 8, NULL),
(55, 'ACSACASC', '2020-10-21 15:41:14', NULL, 'CCASCSAC', 'AC', 1, 2, 5, 10),
(56, 'CASCSAC', '2020-10-21 15:41:22', NULL, 'SCASCSAC', 'ACSAC', 1, 2, 5, 10),
(57, 'SACSAC', '2020-10-21 15:41:32', NULL, 'CSACSACS ', 'SCASC', 1, 2, 6, 11),
(58, 'ACASCSAC', '2020-10-21 15:41:39', NULL, 'CASCSAC', 'SACSACSA', 1, 2, 7, 12),
(59, 'CASCSAC', '2020-10-21 15:41:47', NULL, 'ASSDASDAS', 'ASDSADCCE', 1, 2, 8, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reports`
--

CREATE TABLE `reports` (
  `rp_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cm_id` int(11) DEFAULT 0,
  `post_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `us_reported_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `reports`
--

INSERT INTO `reports` (`rp_id`, `content`, `create_at`, `cm_id`, `post_id`, `user_id`, `us_reported_id`) VALUES
(4, 'agag', '2020-10-20 12:22:58', 0, 0, 1, 2);

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
(5, '65626', '65', 2),
(6, '2265', NULL, 4),
(7, '265', NULL, 5),
(8, '98989', NULL, 6),
(9, '495956', NULL, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `avt` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `email`, `avt`, `password`, `code`, `create_at`, `admin`, `status`) VALUES
(1, 'hieu2k', 'Hieu Tr', 'hieu207@gmail.com', NULL, '123456', NULL, '2020-10-14 15:08:59', 0, 0),
(2, 'hieus207', 'Hiếu Trịnh', 'hieus207@gmail.com', NULL, '123', NULL, '2020-10-18 14:41:24', 1, 0),
(6, 'aeaeae', 'aeaeaea', 'aeae@aeae', NULL, '123', NULL, '2020-10-21 10:27:26', 0, 1),
(11, 'aduvip', 'Vip', 'ava@gm', NULL, '123', NULL, '2020-10-21 10:37:27', 1, 0),
(13, 'eee', '222', '22@2', NULL, '222', NULL, '2020-10-21 11:27:38', 0, 1);

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
(4, '1112225', '4444'),
(5, '111222', '4444'),
(6, '5565', '26');

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
-- Chỉ mục cho bảng `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rp_id`),
  ADD KEY `us_reported_id` (`us_reported_id`);

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
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `mitopics`
--
ALTER TABLE `mitopics`
  MODIFY `mitopic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `reports`
--
ALTER TABLE `reports`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Các ràng buộc cho bảng `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`us_reported_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`zone_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
