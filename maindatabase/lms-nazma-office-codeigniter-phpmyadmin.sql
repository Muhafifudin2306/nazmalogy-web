-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2023 at 02:55 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms-nazma-office-codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Marketing'),
(2, 'Business'),
(3, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover` text,
  `rating` decimal(20,1) DEFAULT '0.0',
  `participant` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `summary` text,
  `intro_link` text,
  `intro_duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `cover`, `rating`, `participant`, `title`, `instructor`, `summary`, `intro_link`, `intro_duration`, `created_at`, `updated_at`) VALUES
(25, 'Screenshot_(16)1.png', '0.0', 0, 'Pembelajaran Digital Marketing', 'Wiwit AB', '    <div xss=removed><div xss=removed><b>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat odio quibusdam eum excepturi molestiae doloribus inventore iste ullam, enim quasi neque. Ex sint rerum nostrum? Sequi cumque eius quam, provident assumenda beatae aperiam temporibus, amet ullam non aliquid recuaasaasandae ipsum odit soluta commodi deleniti corrupti! Numquam quae facere consequuntur sint.</b></div></div>', 'OdLGq9y_OC8', 3, '2023-05-18 14:52:09', '2023-05-18 14:52:09'),
(27, 'hqdefault.jpg', '0.0', 0, 'Global Enterpreneurship', 'Wiwi AB', '<p><span xss=removed><b>Hallo, Sobat..\r\nKali ini kita akan belajar bareng lagi ya mengenai Desain Organisasi, yuk mari kita simak bersama!\r\n\r\nJangan Lupa Like, Comment, Share & Subscribe Untuk Video Belajar Lainnya!</b></span><br></p>', 'vIudlgadXlw', 5, '2023-05-23 04:07:59', '2023-05-23 04:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `course_has_category`
--

CREATE TABLE `course_has_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL,
  `id_category` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_has_category`
--

INSERT INTO `course_has_category` (`id`, `id_course`, `id_category`, `created_at`, `updated_at`) VALUES
(180, 25, 1, '2023-05-18 14:33:40', '2023-05-18 14:33:40'),
(181, 25, 3, '2023-05-18 14:33:40', '2023-05-18 14:33:40'),
(182, 27, 1, '2023-05-23 04:05:17', '2023-05-23 04:05:17'),
(183, 27, 2, '2023-05-23 04:05:17', '2023-05-23 04:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `course_has_playlist`
--

CREATE TABLE `course_has_playlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL,
  `id_playlist` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_has_playlist`
--

INSERT INTO `course_has_playlist` (`id`, `id_course`, `id_playlist`) VALUES
(10, 25, 5),
(12, 25, 7),
(13, 25, 8),
(16, 27, 10),
(17, 27, 11);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `summary` text,
  `job` varchar(255) DEFAULT NULL,
  `address` text,
  `district` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `pos-code` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member_has_tag`
--

CREATE TABLE `member_has_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_member` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tag` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Bab 1. Perkenalan dan Benchmarking', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
(7, 'Bab 2. Strategi Marketing', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
(8, 'Bab 3. Mitra dan Sponsorship', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
(9, 'Bab 4. Laba dan Koneksi', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
(10, 'Desain Organisasi', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
(11, 'Global Enterprenuership', '2023-05-23 04:12:24', '2023-05-23 04:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_playlist` bigint(20) UNSIGNED DEFAULT NULL,
  `id_video` bigint(20) UNSIGNED DEFAULT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Instructor'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`) VALUES
(1, 'muhafifudin66@gmail.com'),
(2, 'muhafifudin2306@gmail.com'),
(3, 'jowenize@mailinator.com'),
(4, 'cobacobalagi@gmail.com'),
(5, 'anisa66@gmail.com'),
(6, 'anisa66@gmail.com'),
(7, 'cobacobalagi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE `testimonies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `message` text,
  `rating` decimal(20,6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`id`, `image`, `author`, `job`, `message`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At magni praesentium deleniti rem accusantium blanditiis voluptatibus sapiente! Reiciendis quia sunt unde dolorum possimus sit consequuntur ducimus, minus incidunt quisquam necessitatibus quidem voluptates aliquid nostrum ullam omnis illum quaerat nulla atque saepe tempore doloribus vero aperiam. Asperiores suscipit distinctio deleniti alias.', '5.000000', '2023-05-23 13:54:43', '2023-05-23 13:48:30'),
(2, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam suscipit expedita quibusdam recusandae dolore magni voluptas id voluptatem consequatur facilis!', '5.000000', '2023-05-23 13:48:05', '2023-05-23 13:48:05'),
(3, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit earum est facilis, quia provident amet obcaecati suscipit natus. Fuga veritatis dolores fugit magni, quisquam facere ipsa vel consectetur corrupti explicabo?', '5.000000', '2023-05-23 13:34:07', '2023-05-23 13:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_role` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`, `updated_at`, `id_role`) VALUES
(10, 'muhafifudin66@gmail.com', 'Muhammad Afifudin', '$2y$10$LvUn3mQZXhqfNKuzUHtHKOKje5bB7F7ACXphpgO4wWMN4sHEs1JW6', '2023-05-09 01:21:48', '2023-05-09 01:21:48', 1),
(21, 'anisa66@gmail.com', 'Anisa Mahda Habsari', '$2y$10$sVq5z2Tr774mJJ2UiVK7OOWbN1fxPuoVAv2Z/fD76hLh.CNCC2uHC', '2023-05-09 01:52:28', '2023-05-09 01:52:28', 3),
(22, 'jafowikab@mailinator.com', 'Jaden Richer', '$2y$10$nlbtKajrO8KTX3w0KchejugPrhp/AttzIwPF47MkSaFKyWhNK9ae6', '2023-05-12 07:33:01', '2023-05-12 07:33:01', 2),
(27, 'muhafifudin2306@gmail.com', 'Muhammad Afifudin', '$2y$10$zsNHcv.ydTmfRqvF2Rxyf.r6LRwR65don6O5aNuIFIqwc69GHxND6', '2023-05-14 01:13:00', '2023-05-14 01:13:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_course`
--

CREATE TABLE `user_has_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `progress` decimal(20,6) DEFAULT NULL,
  `rating` decimal(20,1) DEFAULT NULL,
  `feedback` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_has_course`
--

INSERT INTO `user_has_course` (`id`, `id_user`, `id_course`, `status`, `progress`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(33, 27, 27, 1, '100.000000', '5.0', NULL, '2023-05-24 03:22:22', '2023-05-24 03:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_course_saved`
--

CREATE TABLE `user_has_course_saved` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_has_course_saved`
--

INSERT INTO `user_has_course_saved` (`id`, `id_user`, `id_course`) VALUES
(142, 21, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_video`
--

CREATE TABLE `user_has_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_video` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` text,
  `duration` int(11) DEFAULT NULL,
  `id_playlist` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `link`, `duration`, `id_playlist`, `title`) VALUES
(5, 'eLWBHVRn7QQ', 3, 7, 'Mengenal Strategi Marketing'),
(6, 'cpas2BjauvU', 2, 7, 'Tips Jitu Marketing'),
(8, 'FRh7LvlQTuA', 1, 5, 'Pengertian Marketing'),
(9, 'UU1hPQp4h_0', 8, 9, 'Instrumentasi Sponsorship'),
(10, 'vIudlgadXlw', 5, 10, 'Desain Organisasi | PART 2'),
(11, 'FwbnCRFXJT0', 6, 10, 'Desain Organisasi | PART 1'),
(12, 'TOaBJtmaphU', 8, 11, 'Pengenalan Pemasaran Global'),
(13, '955Y3QxiJ5c', 9, 11, 'Global Entrepreneurship');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_has_category`
--
ALTER TABLE `course_has_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_course_has_category_courses` (`id_course`),
  ADD KEY `FK_course_has_category_categories` (`id_category`);

--
-- Indexes for table `course_has_playlist`
--
ALTER TABLE `course_has_playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_course_has_playlist_courses` (`id_course`),
  ADD KEY `FK_course_has_playlist_playlists` (`id_playlist`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_has_tag`
--
ALTER TABLE `member_has_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_member_has_tag_members` (`id_member`),
  ADD KEY `FK_member_has_tag_tags` (`id_tag`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_playlist_has_video_courses` (`id_course`),
  ADD KEY `FK_classes_playlists` (`id_playlist`),
  ADD KEY `FK_classes_videos` (`id_video`),
  ADD KEY `FK_progress_users` (`id_user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_roles` (`id_role`);

--
-- Indexes for table `user_has_course`
--
ALTER TABLE `user_has_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_has_course_users` (`id_user`),
  ADD KEY `FK_user_has_course_courses` (`id_course`);

--
-- Indexes for table `user_has_course_saved`
--
ALTER TABLE `user_has_course_saved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_has_course_saved_users` (`id_user`),
  ADD KEY `FK_user_has_course_saved_courses` (`id_course`);

--
-- Indexes for table `user_has_video`
--
ALTER TABLE `user_has_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_has_video_users` (`id_user`),
  ADD KEY `FK_user_has_video_videos` (`id_video`),
  ADD KEY `FK_user_has_video_courses` (`id_course`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_videos_videos` (`id_playlist`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `course_has_category`
--
ALTER TABLE `course_has_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `course_has_playlist`
--
ALTER TABLE `course_has_playlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_has_tag`
--
ALTER TABLE `member_has_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_has_course`
--
ALTER TABLE `user_has_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_has_course_saved`
--
ALTER TABLE `user_has_course_saved`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `user_has_video`
--
ALTER TABLE `user_has_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_has_category`
--
ALTER TABLE `course_has_category`
  ADD CONSTRAINT `FK_course_has_category_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_course_has_category_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_has_playlist`
--
ALTER TABLE `course_has_playlist`
  ADD CONSTRAINT `FK_course_has_playlist_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_course_has_playlist_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_has_tag`
--
ALTER TABLE `member_has_tag`
  ADD CONSTRAINT `FK_member_has_tag_members` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_member_has_tag_tags` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `FK_classes_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_classes_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_playlist_has_video_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_progress_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_course`
--
ALTER TABLE `user_has_course`
  ADD CONSTRAINT `FK_user_has_course_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_has_course_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_course_saved`
--
ALTER TABLE `user_has_course_saved`
  ADD CONSTRAINT `FK_user_has_course_saved_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_has_course_saved_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_video`
--
ALTER TABLE `user_has_video`
  ADD CONSTRAINT `FK_user_has_video_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_has_video_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_has_video_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `FK_videos_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
