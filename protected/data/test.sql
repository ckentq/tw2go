-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Mar 23, 2011, 09:09 AM
-- 伺服器版本: 5.1.36
-- PHP 版本: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `test`
--

-- --------------------------------------------------------

--
-- 資料表格式： `tbl_pd_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_pd_profiles` (
  `p_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '說明',
  `size` text COLLATE utf8_unicode_ci NOT NULL,
  `due` date NOT NULL,
  `preserve` date NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `max` text COLLATE utf8_unicode_ci NOT NULL,
  `max_month` text COLLATE utf8_unicode_ci NOT NULL,
  `duration` text COLLATE utf8_unicode_ci NOT NULL,
  `ps` text COLLATE utf8_unicode_ci,
  `certify` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `tbl_pd_profiles`
--


-- --------------------------------------------------------

--
-- 資料表格式： `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `cover` text COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 列出以下資料庫的數據： `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `owner`, `category`, `cover`, `active`, `sort`) VALUES
(1, '鳳梨酥', 2, 1, NULL, 1, 0),
(2, '饅頭', 3, 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- 資料表格式： `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `owner` tinyint(1) NOT NULL DEFAULT '0',
  `shopName` varchar(255) NOT NULL DEFAULT '',
  `shopUrl` varchar(255) NOT NULL DEFAULT '',
  `shopPhone` int(11) NOT NULL DEFAULT '0',
  `shopFax` varchar(255) NOT NULL DEFAULT '',
  `shopAddr` varchar(255) NOT NULL DEFAULT '',
  `shopCapital` varchar(255) NOT NULL DEFAULT '',
  `dirName` varchar(255) NOT NULL DEFAULT '',
  `dirPhone` varchar(255) NOT NULL DEFAULT '',
  `dirMobile` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 列出以下資料庫的數據： `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`, `owner`, `shopName`, `shopUrl`, `shopPhone`, `shopFax`, `shopAddr`, `shopCapital`, `dirName`, `dirPhone`, `dirMobile`) VALUES
(1, 'Admin', 'Administrator', '0000-00-00', 0, '', '', 0, '', '', '', '', '', ''),
(2, '我是', 'Demo', '0000-00-00', 1, '三多鳳梨酥', '', 0, '', '', '', '', '', ''),
(3, 'chung', 'kent', '2011-03-10', 1, '', '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表格式： `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 列出以下資料庫的數據： `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', '姓', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(2, 'firstname', '名子', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(3, 'birthday', '生日', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 2, 2),
(4, 'owner', '商家', 'BOOL', 0, 0, 1, '', '1==Yes;0==No', '請輸入是否為商家', '', '0', '', '', 3, 2),
(5, 'shopName', '商店名稱', 'VARCHAR', 255, 3, 4, '', '', '', '', '', '', '', 4, 4),
(6, 'shopUrl', '公司網站', 'VARCHAR', 255, 5, 4, '', '', '', '', '', '', '', 5, 4),
(7, 'shopPhone', '連絡電話', 'INTEGER', 11, 9, 4, '', '', '', '', '0', '', '', 6, 4),
(8, 'shopFax', '傳真', 'VARCHAR', 255, 6, 4, '', '', '', '', '', '', '', 0, 4),
(9, 'shopAddr', '地址', 'VARCHAR', 255, 6, 4, '', '', '', '', '', '', '', 0, 4),
(10, 'shopCapital', '公司資本額', 'VARCHAR', 255, 3, 4, '', '', '', '', '', '', '', 0, 4),
(11, 'dirName', '負責人姓名', 'VARCHAR', 255, 4, 4, '', '', '', '', '', '', '', 0, 4),
(12, 'dirPhone', '負責人電話', 'VARCHAR', 255, 7, 4, '', '', '', '', '', '', '', 0, 4),
(13, 'dirMobile', '負責人手機', 'VARCHAR', 64, 8, 4, '', '', '', '', '', '', '', 0, 4);

-- --------------------------------------------------------

--
-- 資料表格式： `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 列出以下資料庫的數據： `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1299225185, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 1300783781, 0, 1),
(3, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'test@demo.com', '0efd9817cc6dd26cd9537d5ec485daaa', 1299166974, 1299221678, 0, 1);
