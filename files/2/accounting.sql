-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2012 at 01:11 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `activity_date` int(12) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `activity_type` int(4) DEFAULT NULL,
  `action_id` int(4) DEFAULT NULL,
  `action_group` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_id`, `activity_date`, `user_id`, `activity_type`, `action_id`, `action_group`) VALUES
(1, 1331790330, 1, 1, 1, 'user'),
(2, 1331794227, 1, 1, 1, 'user'),
(3, 1332308175, 1, 3, 5, 'cost'),
(4, 1332308190, 1, 4, 5, 'cost'),
(5, 1332311411, 1, 2, 1, 'user'),
(6, 1332311420, 1, 1, 1, 'user'),
(7, 1332395321, 1, 1, 1, 'user'),
(8, 1332473347, 1, 2, 1, 'user'),
(9, 1332473357, 1, 1, 1, 'user'),
(10, 1332473359, 1, 2, 1, 'user'),
(11, 1332473405, 1, 1, 1, 'user'),
(12, 1332484487, 1, 3, 6, 'cost'),
(13, 1332489296, 1, 2, 1, 'user'),
(14, 1332489315, 1, 1, 1, 'user'),
(15, 1332489355, 1, 5, 1, 'user'),
(16, 1332489357, 1, 2, 1, 'user'),
(17, 1332489362, 2, 1, 2, 'user'),
(18, 1332740626, 1, 1, 1, 'user'),
(19, 1332741548, 1, 9, 22, 'staff'),
(20, 1332813082, 1, 2, 1, 'user'),
(21, 1332813149, 1, 1, 1, 'user'),
(22, 1332907840, 1, 11, 1, 'user'),
(23, 1332907843, 1, 2, 1, 'user'),
(24, 1332907851, 1, 1, 1, 'user'),
(25, 1332907865, 1, 11, 1, 'user'),
(26, 1332917634, 1, 2, 1, 'user'),
(27, 1332917988, 1, 1, 1, 'user'),
(28, 1332918036, 1, 6, 2, 'user'),
(29, 1332918060, 1, 7, 2, 'user'),
(30, 1332918124, 1, 9, 4, 'staff'),
(31, 1332918163, 1, 11, 1, 'user'),
(32, 1332918185, 1, 11, 1, 'user'),
(33, 1332921551, 1, 5, 1, 'user'),
(34, 1332987287, 1, 2, 1, 'user'),
(35, 1332987293, 1, 1, 1, 'user'),
(36, 1332988989, 1, 3, 7, 'cost'),
(37, 1333087505, 1, 2, 1, 'user'),
(38, 1333087511, 1, 1, 1, 'user'),
(39, 1333422207, 1, 3, 8, 'cost'),
(40, 1333422221, 1, 4, 8, 'cost'),
(41, 1333701217, 1, 1, 1, 'user'),
(42, 1334109896, 1, 8, 480, 'admin'),
(43, 1334109914, 1, 8, 479, 'admin'),
(44, 1334114540, 1, 8, 1, 'admin'),
(45, 1336457249, 1, 1, 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
  `activity_type` int(4) unsigned NOT NULL,
  `activity_description` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`activity_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_type`
--

INSERT INTO `activity_type` (`activity_type`, `activity_description`) VALUES
(1, 'log in'),
(2, 'log out'),
(3, 'create profile'),
(4, 'update profile'),
(5, 'create user'),
(6, 'update user'),
(7, 'deactive user'),
(8, 'active user'),
(9, 'move user to non-working'),
(10, 'move user to working list'),
(11, 'change password');

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) CHARACTER SET latin1 NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text CHARACTER SET latin1,
  `data` text CHARACTER SET latin1,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', 1, '', 'N;'),
('manager', 2, '', 'N;'),
('manager', 3, '', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET latin1,
  `bizrule` text CHARACTER SET latin1,
  `data` text CHARACTER SET latin1,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`, `update_user_id`) VALUES
('admin', 2, 'access to the application administration functionality', NULL, 'N;', NULL),
('createUser', 0, 'create a new user', NULL, 'N;', NULL),
('deactiveUser', 0, 'deactive User', NULL, NULL, NULL),
('deleteUser', 0, 'remove a user', NULL, 'N;', NULL),
('input_user', 2, NULL, NULL, NULL, NULL),
('manager', 2, 'manager', NULL, NULL, NULL),
('manageUser', 0, 'manage users', NULL, 'N;', NULL),
('readUser', 0, 'read user profile information', NULL, 'N;', NULL),
('updateUser', 0, 'edit user profile', NULL, 'N;', NULL),
('user', 2, 'user', NULL, 'N;', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) CHARACTER SET latin1 NOT NULL,
  `child` varchar(64) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `FK_child_authitem` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('manager', 'activeUser'),
('manager', 'createUser'),
('manager', 'deactiveUser'),
('admin', 'deleteUser'),
('manager', 'input_user'),
('admin', 'manager'),
('manager', 'manageUser'),
('manager', 'readUser'),
('manager', 'updateUser'),
('input_user', 'user'),
('manager', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `contract_user` int(12) NOT NULL,
  `contract_start` int(12) NOT NULL,
  `contract_length` int(12) NOT NULL,
  `contract_end` int(12) NOT NULL,
  `contract_stop` int(12) NOT NULL,
  `contract_stop_reason` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contract_status` int(1) NOT NULL DEFAULT '1',
  `contract_actor` int(12) NOT NULL,
  PRIMARY KEY (`contract_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_user`, `contract_start`, `contract_length`, `contract_end`, `contract_stop`, `contract_stop_reason`, `contract_status`, `contract_actor`) VALUES
(1, 1325264400, 12, 1356800400, 0, '', 1, 1),
(3, 1325350800, 12, 1356886800, 0, '', 1, 1),
(4, 1328029200, 12, -86400, 1332867600, '', 0, 1),
(5, 1328029200, 12, 1359565200, 0, '', 1, 1),
(6, 1330534800, 12, 1361984400, 0, '', 1, 1),
(7, 1320080400, 12, 1351616400, 0, '', 1, 1),
(8, 1328029200, 12, 1359565200, 0, '', 1, 1),
(9, 1317571200, 12, 1349107200, 0, '', 1, 1),
(10, 1309449600, 12, 1340985600, 0, '', 1, 1),
(11, 1328029200, 12, -86400, 0, '', 1, 1),
(12, 1304265600, 12, 1335801600, 0, '', 1, 1),
(13, 1304179200, 12, 1335715200, 0, '', 1, 1),
(14, 1301587200, 12, 1333123200, 0, '', 1, 1),
(15, 1328029200, 12, 1359565200, 0, '', 1, 1),
(16, 1314806400, 12, 1346342400, 0, '', 1, 1),
(17, 1304265600, 12, 1335801600, 0, '', 1, 1),
(18, 1300575600, 12, -86400, 0, '', 1, 1),
(19, 1332712800, 12, 1364166000, 0, '', 1, 1),
(20, -3600, 0, -86400, 0, '', 1, 1),
(21, -3600, 0, -86400, 0, '', 1, 1),
(22, 474764400, 12, 506214000, 1332694800, 'hihi', 0, 1),
(23, -3600, 0, -86400, 0, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `cost_id` int(12) NOT NULL AUTO_INCREMENT,
  `cost_title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cost_value` bigint(20) NOT NULL,
  `cost_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cost_reporter` int(12) NOT NULL COMMENT 'Reporter',
  `cost_time` int(12) NOT NULL,
  `cost_value_usd` bigint(20) NOT NULL,
  PRIMARY KEY (`cost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Operation Cost' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`cost_id`, `cost_title`, `cost_value`, `cost_description`, `cost_reporter`, `cost_time`, `cost_value_usd`) VALUES
(5, 'Mot trieu xai choi', 1000000, '<p>\r\n	Mot trieu xai choi ne</p>\r\n', 1, 1332308186, 48),
(6, 'Mot trieu xai choi', 5210000000, '', 1, 1332484487, 250000),
(7, 'Tiền quà vặt', 1000000, '<p>\r\n	hehe</p>\r\n', 1, 1332988989, 48),
(8, 'Tiền đi chơi', 1000000, '<p>\r\n	Đi chơi Vũng t&agrave;u</p>\r\n', 1, 1333422221, 48);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mod_id` int(12) NOT NULL AUTO_INCREMENT,
  `mod_types` int(4) DEFAULT NULL,
  `mod_date` int(12) DEFAULT NULL,
  `mod_status` int(4) DEFAULT NULL,
  `mod_info` longtext,
  `mod_active` int(4) DEFAULT NULL,
  `mod_user_id` int(12) DEFAULT NULL,
  `mod_sender_id` int(12) DEFAULT NULL,
  `mod_title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title',
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) unsigned NOT NULL COMMENT 'user id',
  `user_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'employee id',
  `user_first_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_last_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_full_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_dob` int(10) NOT NULL COMMENT 'date of birth',
  `user_job_title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_job_function` enum('Management','Admin','Software','Sourcing') COLLATE utf8_unicode_ci NOT NULL,
  `user_background` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_degree_type` enum('Associates','Diploma/Certificate','Bachelors','Masters','Doctorate','N/A') COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_degree_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_probation_start_date` int(12) DEFAULT NULL,
  `user_probation_length` int(4) DEFAULT NULL,
  `user_official_start_date` int(12) DEFAULT NULL,
  `user_official_contract_length` int(4) DEFAULT NULL,
  `user_net_salary` int(12) DEFAULT NULL COMMENT 'VND',
  `user_petrol_allowance` int(12) DEFAULT NULL COMMENT 'VND',
  `user_other_allowance` int(12) DEFAULT NULL COMMENT 'VND',
  `user_email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_telephone_number` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_home_address` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_notes` longtext COLLATE utf8_unicode_ci,
  `user_image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'image',
  `user_cv` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cv',
  `user_education` longtext COLLATE utf8_unicode_ci,
  `user_skill` longtext COLLATE utf8_unicode_ci,
  `user_employment` longtext COLLATE utf8_unicode_ci,
  `user_status` int(1) unsigned DEFAULT '0' COMMENT '0:working, 1:non-working',
  `user_end_contract_date` int(12) DEFAULT NULL,
  `user_scenario` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'scenario',
  `user_time` int(12) DEFAULT NULL COMMENT 'time log',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `gross` float DEFAULT NULL,
  `net` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=481 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`employee_id`, `gross`, `net`, `price`) VALUES
(1, NULL, NULL, 50),
(5, 5000000, 4475000, NULL),
(11, 5000000, 4475000, NULL),
(12, 5614040, 5000000, NULL),
(13, 5614040, 5000000, NULL),
(14, 6081870, 5000000, NULL),
(15, 5000000, 4475000, NULL),
(16, 6081870, 5000000, NULL),
(17, 6081870, 5000000, NULL),
(18, 6081870, 5000000, NULL),
(19, 6081870, 5000000, NULL),
(20, 6081870, 5000000, NULL),
(21, 6081870, 5000000, NULL),
(22, 6000000, 5330000, NULL),
(23, 5614040, 5000000, NULL),
(466, NULL, NULL, 345),
(468, NULL, NULL, 123),
(470, NULL, NULL, 340),
(472, NULL, NULL, 150),
(474, NULL, NULL, 200),
(476, NULL, NULL, 100),
(478, NULL, NULL, 900),
(479, NULL, NULL, 650),
(480, NULL, NULL, 512);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `user_username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_first_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_last_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_full_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_company` smallint(4) DEFAULT '0',
  `user_email` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_lastvisit` int(11) DEFAULT NULL,
  `user_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `user_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_timezone` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Asia/Saigon',
  `user_image` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'avatar',
  `user_cv` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cv',
  `user_created_date` int(12) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_first_name`, `user_last_name`, `user_full_name`, `user_company`, `user_email`, `user_password`, `user_lastvisit`, `user_active`, `user_token`, `user_timezone`, `user_image`, `user_cv`, `user_created_date`) VALUES
(1, 'admin', 'Tuyen', 'Kim', 'Kim Tuyen', 1, 'jgalvin@glandoresystems.com', '61bd60c60d9fb60cc8fc7767669d40a1', 1336457248, '1', 'f369bcedcc25976af4b30d9ec26f389ef7382b81', 'Asia/Saigon', '0', NULL, 1331517402),
(2, 'dung', 'vo', 'van', 'vo van dung', 0, 'dungdeveloper@gmail.com', 'cd9e88e897d996ff8baacc82d03448d8', 0, '0', NULL, 'Asia/Saigon', NULL, NULL, 1332489355),
(3, 'maihong', 'hong', 'mai', 'mai hong', 0, 'hong.mai@kinsale.vn', '8372ef282783c5b13a87d8ec1d8460ae', NULL, '1', NULL, 'Asia/Saigon', NULL, NULL, 1332921551);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE IF NOT EXISTS `vacation` (
  `vacation_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `start_day` int(12) unsigned NOT NULL,
  `end_day` int(12) unsigned NOT NULL,
  `total` decimal(4,1) NOT NULL,
  `reason` int(4) unsigned NOT NULL COMMENT '1:vacation, 2:illness, 3:wedding, 4:bereavement, 5:maternity, 0:inactive;',
  `more_reason` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(12) unsigned NOT NULL,
  `request_day` int(12) unsigned NOT NULL,
  `status` int(4) unsigned DEFAULT '1' COMMENT '1:waiting, 2:request_cancel, 3:accept, 4:cancel, 5:decline, 0:inactive;',
  `time` enum('am','pm') COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_one` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Manager Comment',
  `comment_two` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User Comment',
  PRIMARY KEY (`vacation_id`),
  KEY `FK_vacation` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `FK_vacation` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
