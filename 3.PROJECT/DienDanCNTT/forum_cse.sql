-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2020 lúc 06:07 PM
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
(40, 'cacacaca266', '2020-10-19 11:08:41', '2020-10-25 14:37:45', 22, 2),
(44, '666', '2020-10-19 11:33:16', NULL, 25, 2),
(47, 'eq', '2020-10-19 11:58:29', NULL, 22, 1),
(75, '&lt;p&gt;ahihi&lt;/p&gt;', '2020-10-25 13:46:08', NULL, 76, 2),
(76, '&lt;p&gt;69&lt;/p&gt;', '2020-10-25 14:10:02', NULL, 22, 2),
(78, '&lt;p&gt;663&lt;/p&gt;', '2020-10-25 14:41:47', NULL, 22, 2),
(79, '&lt;p&gt;grhrhrh&lt;/p&gt;', '2020-10-25 14:56:43', NULL, 76, 2),
(82, '&lt;figure class=&quot;image image-style-side&quot;&gt;&lt;img src=&quot;https://s0ft4pc.com/wp-content/uploads/2020/01/XDNHV.gif?x36652&quot;&gt;&lt;/figure&gt;', '2020-11-02 14:51:18', NULL, 76, 2);

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
(24, '9', '*', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `others`
--

CREATE TABLE `others` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `others`
--

INSERT INTO `others` (`id`, `name`, `link`) VALUES
(1, 'about', 'http://localhost:8080/Forum/index.php?controller=posts&action=index&p_id=82'),
(2, 'rule', 'http://localhost:8080/Forum/index.php?controller=posts&action=index&p_id=82');

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
(22, 'Adu vip', '2020-10-18 14:42:01', '2020-10-18 15:29:51', '12323233errr333wwd33êê', '', 1, 2, 1, NULL),
(25, '333', '2020-10-18 16:03:16', '2020-10-18 16:05:15', 'egefegeg99', '', 1, 1, 1, 1),
(33, 'hhh', '2020-10-19 09:40:23', NULL, 'ttt', '', 1, 2, 1, 0),
(35, '3223', '2020-10-19 09:47:12', '2020-10-24 16:31:33', '2525252', 'badge badge-success Share', 1, 2, 1, 1),
(41, 'hrhrhrhr', '2020-10-20 15:02:33', NULL, 'ehsehsehse', '', 1, 2, 1, 4),
(69, 'cacsavsava', '2020-10-24 15:28:17', NULL, '<p>vdvadvadv</p>', '', 1, 2, 27, NULL),
(70, 'Đẳng', '2020-10-24 15:58:39', NULL, '<p>đẳng</p>', '', 1, 2, 28, NULL),
(74, 'vavavadvd', '2020-10-24 16:15:28', '2020-10-24 16:44:44', '<p>vdvfvfsvs</p>ce', 'badge badge-primary Quest', 1, 2, 1, NULL),
(76, 'Công việc cần làm tiếp theo', '2020-10-24 16:44:18', '2020-11-02 15:29:19', '&lt;p&gt;//.Th&ecirc;m avatar cho user&lt;/p&gt;&lt;p&gt;//*Th&ecirc;m t&iacute;nh năng report&lt;/p&gt;&lt;p&gt;//*Th&ecirc;m t&iacute;nh năng block user&lt;/p&gt;&lt;p&gt;//*Sửa lại crud cho admin chuẩn hơn&lt;/p&gt;&lt;p&gt;//Thiết kế footer,header&lt;/p&gt;&lt;p&gt;*Th&ecirc;m lu&ocirc;n chữ k&yacute;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;*Th&ecirc;m t&iacute;nh năng đ&oacute;ng b&agrave;i viết&lt;/p&gt;&lt;p&gt;*Th&ecirc;m t&iacute;nh năng ph&acirc;n trang&lt;/p&gt;&lt;p&gt;*Box chat &hellip;..&lt;/p&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://s0ft4pc.com/wp-content/uploads/2020/01/XDNHV.gif?x36652&quot;&gt;&lt;/figure&gt;', '', 1, 2, 1, NULL),
(82, 'Nội quy diễn đàn', '2020-11-02 16:51:26', '2020-11-02 16:56:26', '&lt;h1&gt;&lt;strong&gt;Kh&ocirc;ng được chửi bậy.&lt;/strong&gt;&lt;/h1&gt;&lt;p&gt;bla bla bla&lt;/p&gt;', 'badge badge-danger Warning', 1, 2, 1, NULL),
(83, 'gagaga', '2020-11-02 17:01:22', NULL, '&lt;p&gt;vavavav&lt;/p&gt;', 'badge badge-danger Warning', 1, 2, 31, NULL),
(84, 'svadv', '2020-11-02 17:03:28', NULL, '&lt;p&gt;vavavs&lt;/p&gt;', 'badge badge-primary Quest', 1, 2, 1, NULL);

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
(27, 'hihihih', 'hihihi', 2),
(28, 'okokoko', 'ijihihi', 7),
(30, 'ahiahia', 'ahihfiòa', 1),
(31, 'vaváváv', 'davadvadv', 1),
(33, 'verfafr', 'grafeaf', 1),
(34, 'topic hay', '123', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `avt` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'none.jpg',
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
(1, 'hieu2k', 'Hieu Tr', 'hieu20723@gmail.com', 'none.jpg', '123456', NULL, '2020-10-14 15:08:59', 0, 1),
(2, 'hieus207', 'Hiếu Trịnh', 'hieus207@gmail.com', '1604321168_2.jpg', '123', NULL, '2020-10-18 14:41:24', 1, 1),
(6, 'aeaeae', 'aeaeaea', 'aeae@aeae', 'none.jpg', '123', NULL, '2020-10-21 10:27:26', 0, 1),
(11, 'aduvip', 'Vip', 'ava@gm', '1', '123', NULL, '2020-10-21 10:37:27', 1, 1),
(13, 'eee', '222', '22@2', 'none.jpg', '222', NULL, '2020-10-21 11:27:38', 0, 1),
(23, 'aavabac', 'Ahiahi', 'acavava@gm', 'none.jpg', '123', NULL, '2020-10-22 13:14:57', 0, 0),
(26, 'Aduvouoip', 'fkoeko', 'fkoefko@fmoa', 'none.jpg', '123', NULL, '2020-10-22 13:20:17', 0, 0);

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
(7, 'zoneTest33', '3'),
(10, 'hihih', '2321`3'),
(11, 'ahihi', 'hahahah'),
(12, 'cc', 'v');

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
-- Chỉ mục cho bảng `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `mitopics`
--
ALTER TABLE `mitopics`
  MODIFY `mitopic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `others`
--
ALTER TABLE `others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `reports`
--
ALTER TABLE `reports`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
