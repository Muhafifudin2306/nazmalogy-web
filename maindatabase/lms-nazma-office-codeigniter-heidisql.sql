-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table lms-nazma-office-codeigniter.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.categories: ~3 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Marketing', '2023-05-24 22:01:05', '2023-05-24 22:01:05'),
	(2, 'Business', '2023-05-24 22:01:05', '2023-05-24 22:01:05'),
	(3, 'Management', '2023-05-24 22:01:05', '2023-05-24 22:01:05');

-- Dumping structure for table lms-nazma-office-codeigniter.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cover` text COLLATE utf8mb4_general_ci,
  `rating` decimal(20,1) DEFAULT '0.0',
  `participant` int DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instructor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_general_ci,
  `intro_link` text COLLATE utf8mb4_general_ci,
  `intro_duration` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mentoring_link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.courses: ~1 rows (approximately)
INSERT INTO `courses` (`id`, `cover`, `rating`, `participant`, `title`, `instructor`, `summary`, `intro_link`, `intro_duration`, `created_at`, `updated_at`, `mentoring_link`) VALUES
	(25, 'Screenshot_(16)1.png', 0.0, 0, 'Pembelajaran Digital Marketing', 'Wiwit AB', '    <div xss=removed><div xss=removed><b>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat odio quibusdam eum excepturi molestiae doloribus inventore iste ullam, enim quasi neque. Ex sint rerum nostrum? Sequi cumque eius quam, provident assumenda beatae aperiam temporibus, amet ullam non aliquid recuaasaasandae ipsum odit soluta commodi deleniti corrupti! Numquam quae facere consequuntur sint.</b></div></div>', 'OdLGq9y_OC8', 3, '2023-05-25 03:05:40', '2023-05-25 03:05:40', 'https://www.google.com/'),
	(27, 'hqdefault.jpg', 0.0, 0, 'Global Enterpreneurship', 'Wiwi AB', '<p><span xss=removed><b>Hallo, Sobat..\r\nKali ini kita akan belajar bareng lagi ya mengenai Desain Organisasi, yuk mari kita simak bersama!\r\n\r\nJangan Lupa Like, Comment, Share & Subscribe Untuk Video Belajar Lainnya!</b></span><br></p>', 'vIudlgadXlw', 5, '2023-05-25 03:05:42', '2023-05-25 03:05:42', 'https://www.google.com/');

-- Dumping structure for table lms-nazma-office-codeigniter.course_has_category
CREATE TABLE IF NOT EXISTS `course_has_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_course` bigint unsigned DEFAULT NULL,
  `id_category` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_course_has_category_courses` (`id_course`),
  KEY `FK_course_has_category_categories` (`id_category`),
  CONSTRAINT `FK_course_has_category_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_course_has_category_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.course_has_category: ~4 rows (approximately)
INSERT INTO `course_has_category` (`id`, `id_course`, `id_category`, `created_at`, `updated_at`) VALUES
	(180, 25, 1, '2023-05-18 14:33:40', '2023-05-18 14:33:40'),
	(181, 25, 3, '2023-05-18 14:33:40', '2023-05-18 14:33:40'),
	(182, 27, 1, '2023-05-23 04:05:17', '2023-05-23 04:05:17'),
	(183, 27, 2, '2023-05-23 04:05:17', '2023-05-23 04:05:17');

-- Dumping structure for table lms-nazma-office-codeigniter.course_has_playlist
CREATE TABLE IF NOT EXISTS `course_has_playlist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_course` bigint unsigned DEFAULT NULL,
  `id_playlist` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_course_has_playlist_courses` (`id_course`),
  KEY `FK_course_has_playlist_playlists` (`id_playlist`),
  CONSTRAINT `FK_course_has_playlist_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_course_has_playlist_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.course_has_playlist: ~5 rows (approximately)
INSERT INTO `course_has_playlist` (`id`, `id_course`, `id_playlist`) VALUES
	(10, 25, 5),
	(12, 25, 7),
	(13, 25, 8),
	(16, 27, 10),
	(17, 27, 11);

-- Dumping structure for table lms-nazma-office-codeigniter.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pos-code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.members: ~0 rows (approximately)

-- Dumping structure for table lms-nazma-office-codeigniter.member_has_tag
CREATE TABLE IF NOT EXISTS `member_has_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_member` bigint unsigned DEFAULT NULL,
  `id_tag` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_member_has_tag_members` (`id_member`),
  KEY `FK_member_has_tag_tags` (`id_tag`),
  CONSTRAINT `FK_member_has_tag_members` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_member_has_tag_tags` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.member_has_tag: ~0 rows (approximately)

-- Dumping structure for table lms-nazma-office-codeigniter.playlists
CREATE TABLE IF NOT EXISTS `playlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.playlists: ~7 rows (approximately)
INSERT INTO `playlists` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(5, 'Bab 1. Perkenalan dan Benchmarking', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(7, 'Bab 2. Strategi Marketing', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(8, 'Bab 3. Mitra dan Sponsorship', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(9, 'Bab 4. Laba dan Koneksi', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(10, 'Desain Organisasi', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(11, 'Global Enterprenership', '2023-05-25 03:40:58', '2023-05-25 03:40:58');

-- Dumping structure for table lms-nazma-office-codeigniter.progress
CREATE TABLE IF NOT EXISTS `progress` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_playlist` bigint unsigned DEFAULT NULL,
  `id_video` bigint unsigned DEFAULT NULL,
  `id_course` bigint unsigned DEFAULT NULL,
  `id_user` bigint unsigned DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_playlist_has_video_courses` (`id_course`),
  KEY `FK_classes_playlists` (`id_playlist`),
  KEY `FK_classes_videos` (`id_video`),
  KEY `FK_progress_users` (`id_user`),
  CONSTRAINT `FK_classes_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_classes_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_playlist_has_video_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_progress_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.progress: ~0 rows (approximately)

-- Dumping structure for table lms-nazma-office-codeigniter.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'Super Admin'),
	(2, 'Instructor'),
	(3, 'Member');

-- Dumping structure for table lms-nazma-office-codeigniter.subscribes
CREATE TABLE IF NOT EXISTS `subscribes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.subscribes: ~6 rows (approximately)
INSERT INTO `subscribes` (`id`, `email`) VALUES
	(1, 'muhafifudin66@gmail.com'),
	(2, 'muhafifudin2306@gmail.com'),
	(3, 'jowenize@mailinator.com'),
	(4, 'cobacobalagi@gmail.com'),
	(5, 'anisa66@gmail.com'),
	(6, 'anisa66@gmail.com'),
	(7, 'cobacobalagi@gmail.com'),
	(8, 'cek@mail.com'),
	(9, 'muhafifudin266@gmail.com'),
	(10, 'jowenize@mailinator.comfgffhgf'),
	(11, 'anisa66@gmail.comjjkjkjk');

-- Dumping structure for table lms-nazma-office-codeigniter.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.tags: ~0 rows (approximately)

-- Dumping structure for table lms-nazma-office-codeigniter.testimonies
CREATE TABLE IF NOT EXISTS `testimonies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `rating` decimal(20,6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.testimonies: ~3 rows (approximately)
INSERT INTO `testimonies` (`id`, `image`, `author`, `job`, `message`, `rating`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At magni praesentium deleniti rem accusantium blanditiis voluptatibus sapiente! Reiciendis quia sunt unde dolorum possimus sit consequuntur ducimus, minus incidunt quisquam necessitatibus quidem voluptates aliquid nostrum ullam omnis illum quaerat nulla atque saepe tempore doloribus vero aperiam. Asperiores suscipit distinctio deleniti alias.', 5.000000, '2023-05-25 04:25:10', '2023-05-25 04:25:10', 1),
	(2, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam suscipit expedita quibusdam recusandae dolore magni voluptas id voluptatem consequatur facilis!', 5.000000, '2023-05-25 04:25:11', '2023-05-25 04:25:11', 1),
	(3, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit earum est facilis, quia provident amet obcaecati suscipit natus. Fuga veritatis dolores fugit magni, quisquam facere ipsa vel consectetur corrupti explicabo?', 5.000000, '2023-05-25 04:25:12', '2023-05-25 04:25:12', 0);

-- Dumping structure for table lms-nazma-office-codeigniter.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_role` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_roles` (`id_role`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`, `updated_at`, `id_role`) VALUES
	(10, 'muhafifudin66@gmail.com', 'Muhammad Afifudin', '$2y$10$LvUn3mQZXhqfNKuzUHtHKOKje5bB7F7ACXphpgO4wWMN4sHEs1JW6', '2023-05-09 01:21:48', '2023-05-09 01:21:48', 1),
	(21, 'anisa66@gmail.com', 'Anisa Mahda Habsari', '$2y$10$sVq5z2Tr774mJJ2UiVK7OOWbN1fxPuoVAv2Z/fD76hLh.CNCC2uHC', '2023-05-09 01:52:28', '2023-05-09 01:52:28', 3),
	(22, 'jafowikab@mailinator.com', 'Jaden Richer', '$2y$10$nlbtKajrO8KTX3w0KchejugPrhp/AttzIwPF47MkSaFKyWhNK9ae6', '2023-05-12 07:33:01', '2023-05-12 07:33:01', 2),
	(27, 'muhafifudin2306@gmail.com', 'Muhammad Afifudin', '$2y$10$zsNHcv.ydTmfRqvF2Rxyf.r6LRwR65don6O5aNuIFIqwc69GHxND6', '2023-05-14 01:13:00', '2023-05-14 01:13:00', 3);

-- Dumping structure for table lms-nazma-office-codeigniter.user_has_course
CREATE TABLE IF NOT EXISTS `user_has_course` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_course` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `progress` decimal(20,6) DEFAULT NULL,
  `rating` decimal(20,1) DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_user_has_course_users` (`id_user`),
  KEY `FK_user_has_course_courses` (`id_course`),
  CONSTRAINT `FK_user_has_course_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_course_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.user_has_course: ~1 rows (approximately)
INSERT INTO `user_has_course` (`id`, `id_user`, `id_course`, `status`, `progress`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
	(35, 21, 27, 1, 100.000000, 4.0, 'mantap, bismillah bang', '2023-05-25 03:18:13', '2023-05-25 03:18:13');

-- Dumping structure for table lms-nazma-office-codeigniter.user_has_course_saved
CREATE TABLE IF NOT EXISTS `user_has_course_saved` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_course` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_has_course_saved_users` (`id_user`),
  KEY `FK_user_has_course_saved_courses` (`id_course`),
  CONSTRAINT `FK_user_has_course_saved_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_course_saved_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.user_has_course_saved: ~1 rows (approximately)
INSERT INTO `user_has_course_saved` (`id`, `id_user`, `id_course`) VALUES
	(146, 21, 25);

-- Dumping structure for table lms-nazma-office-codeigniter.user_has_video
CREATE TABLE IF NOT EXISTS `user_has_video` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_video` bigint unsigned DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `id_course` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_has_video_users` (`id_user`),
  KEY `FK_user_has_video_videos` (`id_video`),
  KEY `FK_user_has_video_courses` (`id_course`),
  CONSTRAINT `FK_user_has_video_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_video_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_video_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.user_has_video: ~0 rows (approximately)
INSERT INTO `user_has_video` (`id`, `id_user`, `id_video`, `status`, `id_course`) VALUES
	(62, 21, 10, 1, 27),
	(63, 21, 11, 1, 27),
	(64, 21, 12, 1, 27),
	(66, 21, 13, 1, 27);

-- Dumping structure for table lms-nazma-office-codeigniter.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `link` text COLLATE utf8mb4_general_ci,
  `duration` int DEFAULT NULL,
  `id_playlist` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_videos_videos` (`id_playlist`) USING BTREE,
  CONSTRAINT `FK_videos_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.videos: ~8 rows (approximately)
INSERT INTO `videos` (`id`, `link`, `duration`, `id_playlist`, `title`) VALUES
	(5, 'eLWBHVRn7QQ', 3, 7, 'Mengenal Strategi Marketing'),
	(6, 'cpas2BjauvU', 2, 7, 'Tips Jitu Marketing'),
	(8, 'FRh7LvlQTuA', 1, 5, 'Pengertian Marketing'),
	(9, 'UU1hPQp4h_0', 8, 9, 'Instrumentasi Sponsorship'),
	(10, 'vIudlgadXlw', 5, 10, 'Desain Organisasi | PART 2'),
	(11, 'FwbnCRFXJT0', 6, 10, 'Desain Organisasi | PART 1'),
	(12, 'TOaBJtmaphU', 8, 11, 'Pengenalan Pemasaran Global'),
	(13, '955Y3QxiJ5c', 9, 11, 'Global Entrepreneurship');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
