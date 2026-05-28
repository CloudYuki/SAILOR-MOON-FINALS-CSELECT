-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2026 at 07:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"sailormoon_db\",\"table\":\"gallery_media\"},{\"db\":\"sailormoon_db\",\"table\":\"characters\"},{\"db\":\"sailormoon_db\",\"table\":\"contact_messages\"},{\"db\":\"sailormoon_db\",\"table\":\"highlights\"},{\"db\":\"sailormoon_db\",\"table\":\"newsletter_subscribers\"},{\"db\":\"sailormoon_db\",\"table\":\"admin_users\"},{\"db\":\"sailormoon_db\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2026-05-28 05:20:12', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `sailormoon_db`
--
CREATE DATABASE IF NOT EXISTS `sailormoon_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sailormoon_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `username`, `email`, `password_hash`, `created_at`, `last_login`) VALUES
(1, 'admin', 'admin@sailormoon.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2026-05-24 16:29:23', NULL),
(2, 'Test1', 'Test1@gmail.com', '1b4f0e9851971998e732078544c96b36c3d01cedf7caa332359d6f1d83567014', '2026-05-24 16:32:34', '2026-05-28 13:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `character_id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `origin_text` text DEFAULT NULL,
  `planet` varchar(100) DEFAULT NULL,
  `weapon` varchar(150) DEFAULT NULL,
  `element` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`character_id`, `slug`, `name`, `origin_text`, `planet`, `weapon`, `element`, `color`, `image_path`, `display_order`, `created_at`) VALUES
(1, 'moon', 'Sailor Moon', 'Usagi Tsukino is an ordinary teenage girl who discovers she is the reincarnation of Princess Serenity. She transforms into Sailor Moon, the champion of justice, to protect Earth from evil forces.', 'Moon', 'Moon Stick & Tiara', 'Love & Justice', 'Pink & White', '../assets/profiles/moon.png', 1, '2026-05-24 16:29:23'),
(2, 'mercury', 'Sailor Mercury', 'Ami Mizuno is a brilliant student with an IQ of 300. She is the first Sailor Guardian to join Sailor Moon and acts as the team strategist.', 'Mercury', 'Mini Computer', 'Water & Ice', 'Blue & Light Blue', '../assets/profiles/mercury.png', 2, '2026-05-24 16:29:23'),
(3, 'mars', 'Sailor Mars', 'Rei Hino is a shrine maiden with spiritual powers and premonitions. As Sailor Mars, she wields the power of fire and passion.', 'Mars', 'Ofuda Scrolls', 'Fire & Passion', 'Red & Purple', '../assets/profiles/mars.png', 3, '2026-05-24 16:29:23'),
(4, 'jupiter', 'Sailor Jupiter', 'Makoto Kino is a tall, strong girl who loves cooking and plants. As Sailor Jupiter, she controls lightning and plant-based attacks.', 'Jupiter', 'Physical Strength & Thunder', 'Lightning & Wood', 'Green & Pink', '../assets/profiles/jupiter.png', 4, '2026-05-24 16:29:23'),
(5, 'venus', 'Sailor Venus', 'Minako Aino is a cheerful idol who was the first to awaken as a Sailor Guardian. As Sailor Venus, she is the Guardian of Love and Beauty.', 'Venus', 'Love Chain', 'Love & Light', 'Orange & Yellow', '../assets/profiles/venus.png', 5, '2026-05-24 16:29:23'),
(6, 'chibi', 'Sailor Chibi Moon', 'Chibiusa is the daughter of Neo-Queen Serenity from the 30th century. She travels back in time and becomes Sailor Chibi Moon.', 'Moon', 'Pink Moon Rod', 'Love & Dreams', 'Pink & Red', '../assets/profiles/chibi_moon.png', 6, '2026-05-24 16:29:23'),
(7, 'uranus', 'Sailor Uranus', 'Haruka Tenoh is a talented race car driver and the Guardian of the Sky. As Sailor Uranus, she controls wind and sky-based attacks.', 'Uranus', 'Space Sword', 'Sky & Wind', 'Navy Blue & Gold', '../assets/profiles/uranus.png', 7, '2026-05-24 16:29:23'),
(8, 'neptune', 'Sailor Neptune', 'Michiru Kaioh is an elegant violinist and painter with deep connection to the ocean. As Sailor Neptune, she wields the power of the sea.', 'Neptune', 'Deep Aqua Mirror', 'Ocean & Elegance', 'Teal & Aqua', '../assets/profiles/neptune.png', 8, '2026-05-24 16:29:23'),
(9, 'pluto', 'Sailor Pluto', 'Setsuna Meioh is the mysterious Guardian of Time who protects the Space-Time Door. She watches over the flow of time.', 'Pluto', 'Garnet Rod', 'Time & Space', 'Dark Green & Black', '../assets/profiles/pluto.png', 9, '2026-05-24 16:29:23'),
(10, 'saturn', 'Sailor Saturn', 'Hotaru Tomoe is the Guardian of Destruction and Rebirth, possessing the most destructive power among all Sailor Guardians.', 'Saturn', 'Silence Glaive', 'Destruction & Rebirth', 'Purple & Black', '../assets/profiles/saturn.png', 10, '2026-05-24 16:29:23'),
(11, 'Utot', 'Test Charactere', '', 'namek', 'balisong', 'Gluttony', 'black', '', 0, '2026-05-27 17:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `character_abilities`
--

CREATE TABLE `character_abilities` (
  `ability_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `ability_name` varchar(255) NOT NULL,
  `display_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `character_abilities`
--

INSERT INTO `character_abilities` (`ability_id`, `character_id`, `ability_name`, `display_order`) VALUES
(1, 1, 'Moon Prism Power transformation', 1),
(2, 1, 'Moon Tiara Action attack', 2),
(3, 1, 'Moon Princess Halation', 3),
(4, 1, 'Healing and purification powers', 4),
(5, 1, 'Silver Crystal ultimate power', 5),
(6, 2, 'Mercury Power transformation', 1),
(7, 2, 'Bubble Spray fog attack', 2),
(8, 2, 'Mercury Aqua Rhapsody', 3),
(9, 2, 'Shabon Spray Freezing', 4),
(10, 2, 'Computer analysis and strategy', 5),
(11, 3, 'Mars Power transformation', 1),
(12, 3, 'Fire Soul attack', 2),
(13, 3, 'Burning Mandala', 3),
(14, 3, 'Mars Flame Sniper', 4),
(15, 3, 'Spiritual detection and exorcism', 5),
(16, 4, 'Jupiter Power transformation', 1),
(17, 4, 'Supreme Thunder attack', 2),
(18, 4, 'Sparkling Wide Pressure', 3),
(19, 4, 'Jupiter Oak Evolution', 4),
(20, 4, 'Superhuman strength', 5),
(21, 5, 'Venus Power transformation', 1),
(22, 5, 'Crescent Beam attack', 2),
(23, 5, 'Venus Love-Me Chain', 3),
(24, 5, 'Rolling Heart Vibration', 4),
(25, 5, 'Leadership and tactical command', 5),
(26, 6, 'Pink Moon Crystal Power', 1),
(27, 6, 'Pink Sugar Heart Attack', 2),
(28, 6, 'Twinkle Yell summoning', 3),
(29, 6, 'Rainbow Moon Heart Ache', 4),
(30, 6, 'Assisted time travel', 5),
(31, 7, 'Uranus Planet Power, Make Up', 1),
(32, 7, 'World Shaking ground attack', 2),
(33, 7, 'Space Sword Blaster', 3),
(34, 7, 'Space Turbulence', 4),
(35, 7, 'Superhuman speed and strength', 5),
(36, 8, 'Neptune Planet Power', 1),
(37, 8, 'Deep Submerge water attack', 2),
(38, 8, 'Submarine Reflection', 3),
(39, 8, 'Deep Aqua Mirror vision', 4),
(40, 8, 'Mirror-based visions', 5),
(41, 9, 'Pluto Planet Power', 1),
(42, 9, 'Dead Scream attack', 2),
(43, 9, 'Time Stop (forbidden)', 3),
(44, 9, 'Space-Time manipulation', 4),
(45, 9, 'Guardian of Space-Time Door', 5),
(46, 10, 'Saturn Planet Power', 1),
(47, 10, 'Death Reborn Revolution', 2),
(48, 10, 'Silence Glaive Surprise', 3),
(49, 10, 'Power of destruction and rebirth', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `message_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` datetime DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`message_id`, `name`, `email`, `subject`, `message`, `submitted_at`, `is_read`) VALUES
(1, 'Luna Cat', 'luna@moonkingdom.com', 'Fan Question', 'Is there going to be a new Sailor Moon season soon?', '2026-05-24 16:29:23', 1),
(2, 'Tuxedo Mask', 'tuxedo@endymion.com', 'General Inquiry', 'I love this website! Amazing work on the design.', '2026-05-24 16:29:23', 0),
(3, 'Test_contact1', 'Test_contact@gmail.com', 'Testing', 'Apaka angas', '2026-05-25 19:38:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_media`
--

CREATE TABLE `gallery_media` (
  `media_id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `display_order` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_media`
--

INSERT INTO `gallery_media` (`media_id`, `caption`, `image_path`, `display_order`, `created_at`) VALUES
(1, 'Sailor Moon Transformation', '../assets/media/transformation.gif', 1, '2026-05-24 16:29:23'),
(2, 'Inner Senshi Group', '../assets/media/group.gif', 2, '2026-05-24 16:29:23'),
(3, 'Moon Princess', '../assets/media/moon_princess.gif', 3, '2026-05-24 16:29:23'),
(4, 'Sailor Mercury', '../assets/media/sailor_mercury.gif', 4, '2026-05-24 16:29:23'),
(5, 'Sailor Mars', '../assets/media/sailor_mars.gif', 5, '2026-05-24 16:29:23'),
(6, 'Sailor Jupiter', '../assets/media/sailor_jupiter.gif', 6, '2026-05-24 16:29:23'),
(7, 'Sailor Venus', '../assets/media/sailor_venus.gif', 7, '2026-05-24 16:29:23'),
(8, 'Chibiusa', '../assets/media/chibiusa.gif', 8, '2026-05-24 16:29:23'),
(9, 'Outer Senshi', '../assets/media/outer_senshi.gif', 9, '2026-05-24 16:29:23'),
(10, 'Luna & Artemis', '../assets/media/luna_artemis.gif', 10, '2026-05-24 16:29:23'),
(11, 'Silver Crystal', '../assets/media/silver_crystal.gif', 11, '2026-05-24 16:29:23'),
(12, 'Moon Kingdom', '../assets/media/moon_kingdom.gif', 12, '2026-05-24 16:29:23'),
(13, 'TestMedia', 'noneTest', 0, '2026-05-27 18:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `highlight_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`highlight_id`, `title`, `description`, `image_path`, `display_order`, `created_at`) VALUES
(1, 'Moon Prism Power!', 'Usagi\'s first transformation into Sailor Moon, where she discovers her destiny as a guardian and begins her journey to protect love and justice.', '../assets/highlights/firstTransformation.gif', 1, '2026-05-24 16:29:23'),
(2, 'Meeting the Guardians', 'The heartwarming moments when Sailor Moon meets Mercury, Mars, Jupiter, and Venus, forming an unbreakable bond of friendship.', '../assets/highlights/meeting.jpg', 2, '2026-05-24 16:29:23'),
(3, 'Princess Serenity Revealed', 'The emotional revelation of Sailor Moon\'s true identity as Princess Serenity and her tragic past with Prince Endymion.', '../assets/highlights/princess.jpeg', 3, '2026-05-24 16:29:23'),
(4, 'Defeating Queen Beryl', 'The epic final battle against Queen Beryl, where Sailor Moon uses the Silver Crystal\'s power to save the world and her friends.', '../assets/highlights/Crystal-13-6.jpg', 4, '2026-05-24 16:29:23'),
(5, 'Chibiusa\'s Arrival', 'The mysterious pink-haired girl from the future arrives, bringing new adventures and revealing shocking connections to Sailor Moon.', '../assets/highlights/chibi.jpg', 5, '2026-05-24 16:29:23'),
(6, 'Outer Senshi Unite', 'The powerful Outer Guardians — Uranus, Neptune, and Pluto — join forces with the Inner Senshi to face new cosmic threats.', '../assets/highlights/attack.jpg', 6, '2026-05-24 16:29:23'),
(7, 'Testting Highlight', 'TEst', '../', 7, '2026-05-25 20:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`subscriber_id`, `email`, `subscribed_at`, `is_active`) VALUES
(1, 'superfan@example.com', '2026-05-24 16:29:23', 1),
(2, 'moonfan123@example.com', '2026-05-24 16:29:23', 1),
(3, 'sailormoonlover@example.com', '2026-05-24 16:29:23', 1),
(4, 'test_NewsLetter1@hotmail.com', '2026-05-25 19:40:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `first_name`, `last_name`, `created_at`, `last_login`, `is_active`) VALUES
(1, 'moonlover', 'moonlover@example.com', '2a9d0b49b5ab85ef1f1e9c0b18a0b7d1f3d7d7b22c8b2f1d1e9c0b18a0b7d1a', 'Usagi', 'Tsukino', '2026-05-24 16:29:23', NULL, 1),
(2, 'sailorfan', 'sailorfan@example.com', 'e3f2c1a0b9d8e7f6c5b4a3d2e1f0c9b8a7d6e5f4c3b2a1d0e9f8c7b6a5d4e3f', 'Ami', 'Mizuno', '2026-05-24 16:29:23', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`character_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `character_abilities`
--
ALTER TABLE `character_abilities`
  ADD PRIMARY KEY (`ability_id`),
  ADD KEY `character_id` (`character_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `gallery_media`
--
ALTER TABLE `gallery_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`highlight_id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `character_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `character_abilities`
--
ALTER TABLE `character_abilities`
  MODIFY `ability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_media`
--
ALTER TABLE `gallery_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `highlight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `character_abilities`
--
ALTER TABLE `character_abilities`
  ADD CONSTRAINT `character_abilities_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `characters` (`character_id`) ON DELETE CASCADE;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
