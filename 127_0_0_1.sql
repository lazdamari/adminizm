-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Eki 2018, 15:10:57
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_settings`
--

DROP TABLE IF EXISTS `email_settings`;
CREATE TABLE IF NOT EXISTS `email_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protocol` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `host` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `port` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `gonderici` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `alici` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `email_settings`
--

INSERT INTO `email_settings` (`id`, `protocol`, `host`, `port`, `user`, `password`, `gonderici`, `alici`, `user_name`, `isActive`) VALUES
(1, 'smtp', 'mail.ensargunaydin.net', '587', 'info@ensargunaydin.net', '22645334Eg', 'info@ensargunaydin.net', 'info@ensargunaydin.net', 'CMS', 1),
(2, 'smtp', 'smtp.gmail.com', '587', 'bote.ensargunaydin@gmail.com', '64d6d00f7afe157ef67928b123f82468', 'ensargunaydin7@gmail.com', 'bote.ensargunaydin@gmail.com', 'CMS', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gallery_name` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gallery_type` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `folder_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galleries`
--

INSERT INTO `galleries` (`id`, `url`, `gallery_name`, `gallery_type`, `folder_name`, `isActive`, `createdAt`, `rank`) VALUES
(11, 'video-galerim', 'video galerim', 'video', '', 1, '2018-09-29 20:39:48', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(2, 4, 'uploads/galleries_v/images/deneme-urun-basligi/001.jpg', 0, 1, '2018-09-29 19:48:41'),
(3, 4, 'uploads/galleries_v/images/deneme-urun-basligi/002.jpg', 0, 1, '2018-09-29 19:48:41'),
(4, 4, 'uploads/galleries_v/images/deneme-urun-basligi/003.jpg', 0, 1, '2018-09-29 19:48:41'),
(5, 4, 'uploads/galleries_v/images/deneme-urun-basligi/101.jpg', 0, 1, '2018-09-29 19:48:41'),
(6, 4, 'uploads/galleries_v/images/deneme-urun-basligi/102.jpg', 0, 1, '2018-09-29 19:48:41'),
(7, 4, 'uploads/galleries_v/images/deneme-urun-basligi/103.jpg', 0, 1, '2018-09-29 19:48:41'),
(8, 4, 'uploads/galleries_v/images/deneme-urun-basligi/104.jpg', 0, 1, '2018-09-29 19:48:41'),
(9, 4, 'uploads/galleries_v/images/deneme-urun-basligi/105.jpg', 0, 1, '2018-09-29 19:48:41'),
(10, 4, 'uploads/galleries_v/images/deneme-urun-basligi/201.jpg', 0, 1, '2018-09-29 19:48:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `news_type` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `url`, `title`, `description`, `news_type`, `img_url`, `video_url`, `rank`, `isActive`, `createdAt`) VALUES
(7, 'wwersdfsdf', 'wwersdfsdf', '<p>sfdsdfsdfs</p>', 'image', 'screenshot-1203.png', '#', 0, 1, '2018-09-23 12:23:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `popups`
--

DROP TABLE IF EXISTS `popups`;
CREATE TABLE IF NOT EXISTS `popups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `page` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `url`, `title`, `description`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'deneme-urun-basligi', 'deneme ürün başlığı', '<p>deneme ürün açıuklamalası</p>', 3, 1, '2018-09-22 10:59:44'),
(2, 'alert-denemesi', 'alert denemeşi', '                            <p>alert denendi asdasd</p>                        ', 0, 1, '2018-09-22 15:06:32'),
(3, 'asdads', 'asdads', '<p>asdasdad</p>', 1, 1, '2018-09-22 15:07:34'),
(4, 'adsa', 'adsa', '<p>sdasdasdads</p>', 2, 0, '2018-09-22 15:09:52'),
(5, 'asdasd', 'asdasd', '<p>asdadsaasdads</p>', 4, 1, '2018-09-22 15:10:02'),
(6, 'asfdsa', 'asfdsa', '<p>dasdasdasd</p>', 5, 1, '2018-09-22 15:13:17'),
(7, 'ghjsi', 'ghjşi', '<p>bnöç.</p>', 6, 1, '2018-09-22 15:14:03'),
(8, 'oipoipi', 'oıpoıpı', '<p>oşpşıpoıpı</p>', 0, 1, '2018-09-22 15:15:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img_url`, `rank`, `isActive`, `isCover`, `createdAt`) VALUES
(4, 1, 'screenshot-1203.png', 3, 0, 0, '2018-09-22 11:14:09'),
(9, 4, 'screenshot-120.png', 0, 1, 0, '2018-09-22 15:14:29'),
(11, 8, 'screenshot-1204.png', 1, 1, 0, '2018-09-22 15:15:28'),
(12, 8, 'screenshot-1205.png', 0, 1, 1, '2018-09-22 15:15:32'),
(14, 8, 'greyfurt-728x410.jpg', 2, 1, 0, '2018-09-22 15:15:39'),
(15, 8, 'logo2.jpg', 3, 1, 0, '2018-09-22 15:15:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `references`
--

DROP TABLE IF EXISTS `references`;
CREATE TABLE IF NOT EXISTS `references` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `references`
--

INSERT INTO `references` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(3, 'asdasd', 'asdasd', '<p>asdasdasdasdasd</p>', 'logo21.jpg', 1, 1, '2018-09-25 14:28:23'),
(4, 'asdasd', 'asdasd', '<p>asdadasd</p>', 'logo.png', 0, 1, '2018-09-25 14:28:33');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `about_us` longtext COLLATE utf8_turkish_ci,
  `mission` longtext COLLATE utf8_turkish_ci,
  `vision` longtext COLLATE utf8_turkish_ci,
  `logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `allowButton` tinyint(4) DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `button_caption` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_type` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_time` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `kullanici_adi`, `full_name`, `email`, `password`, `isActive`, `createdAt`) VALUES
(3, 'admin', 'Administrator', 'info@adminizm.net', 'e10adc3949ba59abbe56e057f20f883e', 1, '2018-10-01 10:04:08'),
(4, 'fatihsoyler', 'Fatih Söyler', 'fatih@soyler.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2018-10-01 12:23:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
--
-- Veritabanı: `nmap`
--
CREATE DATABASE IF NOT EXISTS `nmap` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nmap`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_config`
--

DROP TABLE IF EXISTS `monitor_config`;
CREATE TABLE IF NOT EXISTS `monitor_config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `monitor_config`
--

INSERT INTO `monitor_config` (`key`, `value`) VALUES
('language', 'en_US'),
('proxy', '0'),
('proxy_url', ''),
('proxy_user', ''),
('proxy_password', ''),
('email_status', '1'),
('email_from_email', 'monitor@example.org'),
('email_from_name', 'Server Monitor'),
('email_smtp', ''),
('email_smtp_host', ''),
('email_smtp_port', ''),
('email_smtp_security', ''),
('email_smtp_username', ''),
('email_smtp_password', ''),
('sms_status', '0'),
('sms_gateway', 'mollie'),
('sms_gateway_username', 'username'),
('sms_gateway_password', 'password'),
('sms_from', '1234567890'),
('pushover_status', '0'),
('pushover_api_token', ''),
('password_encrypt_key', '481fb11c3a155e6dd100958e03dabd851bfc60de'),
('alert_type', 'status'),
('log_status', '1'),
('log_email', '1'),
('log_sms', '1'),
('log_pushover', '1'),
('log_retention_period', '365'),
('version', '3.2.0'),
('version_update_check', '3.2.0'),
('auto_refresh_servers', '0'),
('show_update', '1'),
('last_update_check', '1537370059'),
('cron_running', '0'),
('cron_running_time', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_log`
--

DROP TABLE IF EXISTS `monitor_log`;
CREATE TABLE IF NOT EXISTS `monitor_log` (
  `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `server_id` int(11) UNSIGNED NOT NULL,
  `type` enum('status','email','sms','pushover') NOT NULL,
  `message` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_log_users`
--

DROP TABLE IF EXISTS `monitor_log_users`;
CREATE TABLE IF NOT EXISTS `monitor_log_users` (
  `log_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`log_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_servers`
--

DROP TABLE IF EXISTS `monitor_servers`;
CREATE TABLE IF NOT EXISTS `monitor_servers` (
  `server_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` varchar(500) NOT NULL,
  `port` int(5) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `type` enum('ping','service','website') NOT NULL DEFAULT 'service',
  `pattern` varchar(255) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `error` varchar(255) DEFAULT NULL,
  `rtime` float(9,7) DEFAULT NULL,
  `last_online` datetime DEFAULT NULL,
  `last_check` datetime DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `email` enum('yes','no') NOT NULL DEFAULT 'yes',
  `sms` enum('yes','no') NOT NULL DEFAULT 'no',
  `pushover` enum('yes','no') NOT NULL DEFAULT 'yes',
  `warning_threshold` mediumint(1) UNSIGNED NOT NULL DEFAULT '1',
  `warning_threshold_counter` mediumint(1) UNSIGNED NOT NULL DEFAULT '0',
  `timeout` smallint(1) UNSIGNED DEFAULT NULL,
  `website_username` varchar(255) DEFAULT NULL,
  `website_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_servers_history`
--

DROP TABLE IF EXISTS `monitor_servers_history`;
CREATE TABLE IF NOT EXISTS `monitor_servers_history` (
  `servers_history_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `server_id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `latency_min` float(9,7) NOT NULL,
  `latency_avg` float(9,7) NOT NULL,
  `latency_max` float(9,7) NOT NULL,
  `checks_total` int(11) UNSIGNED NOT NULL,
  `checks_failed` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`servers_history_id`),
  UNIQUE KEY `server_id_date` (`server_id`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_servers_uptime`
--

DROP TABLE IF EXISTS `monitor_servers_uptime`;
CREATE TABLE IF NOT EXISTS `monitor_servers_uptime` (
  `servers_uptime_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `server_id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL,
  `latency` float(9,7) DEFAULT NULL,
  PRIMARY KEY (`servers_uptime_id`),
  KEY `server_id` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_users`
--

DROP TABLE IF EXISTS `monitor_users`;
CREATE TABLE IF NOT EXISTS `monitor_users` (
  `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) NOT NULL COMMENT 'user''s name, unique',
  `password` varchar(255) NOT NULL COMMENT 'user''s password in salted and hashed format',
  `password_reset_hash` char(40) DEFAULT NULL COMMENT 'user''s password reset code',
  `password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `rememberme_token` varchar(64) DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `level` tinyint(2) UNSIGNED NOT NULL DEFAULT '20',
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `pushover_key` varchar(255) NOT NULL,
  `pushover_device` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unique_username` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `monitor_users`
--

INSERT INTO `monitor_users` (`user_id`, `user_name`, `password`, `password_reset_hash`, `password_reset_timestamp`, `rememberme_token`, `level`, `name`, `mobile`, `pushover_key`, `pushover_device`, `email`) VALUES
(1, 'ensargunaydin', '$2y$10$yfUn7dSEfJ.STrmZ5YEcvek5GnYHJ92wJAUieO7JJfgbstuv0ROx.', NULL, NULL, NULL, 10, 'ensargunaydin', '', '', '', 'ensargunaydin7@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_users_preferences`
--

DROP TABLE IF EXISTS `monitor_users_preferences`;
CREATE TABLE IF NOT EXISTS `monitor_users_preferences` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monitor_users_servers`
--

DROP TABLE IF EXISTS `monitor_users_servers`;
CREATE TABLE IF NOT EXISTS `monitor_users_servers` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `server_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `monitor_users_servers`
--

INSERT INTO `monitor_users_servers` (`user_id`, `server_id`) VALUES
(1, 1),
(1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
