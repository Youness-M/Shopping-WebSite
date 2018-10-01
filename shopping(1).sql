-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2018 at 11:43 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `basketcooki`
--

DROP TABLE IF EXISTS `basketcooki`;
CREATE TABLE IF NOT EXISTS `basketcooki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookiname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `productid` int(11) NOT NULL,
  `numberoforder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=271 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `basketcooki`
--

INSERT INTO `basketcooki` (`id`, `cookiname`, `productid`, `numberoforder`) VALUES
(225, '1537611301.27923899', 3, 1),
(224, '1537611301.27923899', 2, 1),
(223, '1537611301.27923899', 7, 1),
(222, '1537611301.27923899', 4, 1),
(221, '1537611301.27923899', 8, 2),
(220, '1537611301.27923899', 5, 1),
(219, '1537379257.72126901', 4, 1),
(218, '1537379257.72126901', 1, 1),
(215, '1535709594.39882492', 4, 1),
(216, '1537072669.68526375', 6, 1),
(210, '1535709594.39882492', 5, 3),
(209, '1535709594.39882492', 1, 5),
(208, '1535709594.39882492', 6, 3),
(270, '1537635560.04358024', 10, 1),
(268, '1537635560.04358024', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `citysname`
--

DROP TABLE IF EXISTS `citysname`;
CREATE TABLE IF NOT EXISTS `citysname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `statesid` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `citysname`
--

INSERT INTO `citysname` (`id`, `cityname`, `statesid`) VALUES
(1, 'تهران 1', 1),
(2, 'تهران 2', 1),
(3, 'تهران 3', 1),
(4, 'تهران 4', 1),
(5, 'شیراز 1', 2),
(6, 'شیراز 2', 2),
(7, 'شیراز 3', 2),
(8, 'تبریز 1', 3),
(9, 'تبریز 2', 3),
(10, 'تبریز 3', 3),
(11, 'مشهد 1', 4),
(12, 'مشهد 2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_tbl`
--

DROP TABLE IF EXISTS `menu_tbl`;
CREATE TABLE IF NOT EXISTS `menu_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `menu_tbl`
--

INSERT INTO `menu_tbl` (`id`, `title`, `img`) VALUES
(1, 'گوشی همراه', 'img/laptop.png'),
(2, 'تجهیزات خانگی', 'img/laptop.png'),
(3, 'تلویزیون', 'img/tv.png'),
(4, 'کامپیوتر', 'img/pc.png');

-- --------------------------------------------------------

--
-- Table structure for table `messagestbl`
--

DROP TABLE IF EXISTS `messagestbl`;
CREATE TABLE IF NOT EXISTS `messagestbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `mainmsg` text COLLATE utf8_persian_ci NOT NULL,
  `sendingtime` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `forwhichuser` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `messagestbl`
--

INSERT INTO `messagestbl` (`id`, `title`, `mainmsg`, `sendingtime`, `status`, `forwhichuser`) VALUES
(5, 'پیام 5', 'سوال: مرتب کردن متن یک صفحه توسط دستورات html - برنامه ...\r\nbarnamenevis.org/showthread.php?457769-مرتب-کردن-متن-یک...دستورات-html\r\n\r\n۴ تیر ۱۳۹۳ - نقل قول: مرتب کردن متن یک صفحه توسط دستورات html. نقل قول نوشته شده توسط nokhodi ..... عکس وسط چین باشه حتی با دستورات جایگزینی متن (توابع php) کد نوشتم که جوب نداد...:( ... text-align : justify ;. direction : rtl ;}. img{.', '6', '1', '11'),
(23, 'پیام 9', '', '', '0', '11'),
(26, 'پیام 9', '', '', '0', '11'),
(28, 'پیام 9', '', '', '1', '11'),
(15, 'پیام 5', '', '', '1', '11'),
(21, 'پیام 9', '', '', '1', '11'),
(25, 'پیام 9', '', '', '0', '11'),
(24, 'پیام 9', '', '', '0', '11'),
(27, 'پیام 9', '', '', '0', '11');

-- --------------------------------------------------------

--
-- Table structure for table `newproducts_tbl`
--

DROP TABLE IF EXISTS `newproducts_tbl`;
CREATE TABLE IF NOT EXISTS `newproducts_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `slidsstatus` int(1) NOT NULL,
  `numberofproduct` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `numberofsel` int(11) NOT NULL,
  `pishnahadshegeftangiz` int(11) NOT NULL,
  `numofseen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `newproducts_tbl`
--

INSERT INTO `newproducts_tbl` (`id`, `title`, `img`, `slidsstatus`, `numberofproduct`, `cost`, `numberofsel`, `pishnahadshegeftangiz`, `numofseen`) VALUES
(1, 'محصول جدید یک', 'img/mahsol1.jpg', 1, 30, 12000, 15, 0, 100),
(2, 'محصول جدید دو', 'img/mahsol2.jpg', 0, 0, 30000, 2, 0, 500),
(3, 'محصول جدید سه', 'img/mahsol3.jpg', 1, 2, 19000, 3, 0, 250),
(4, 'محصول جدید چهار', 'img/mahsol4.jpg', 1, 2, 23000, 45, 0, 80),
(5, 'محصول جدید پنج', 'img/mahsol5.jpg', 1, 0, 102500, 16, 0, 120),
(6, 'محصول شماره شش', 'img/mahsol6.jpg', 1, 15, 300000, 12, 1, 505),
(7, 'محصول شماره هفت', 'img/mahsol6.jpg', 1, 16, 40000, 15, 1, 500),
(8, 'محصول جدید هشت', 'img/mahsol4.jpg', 1, 21, 23050, 20, 0, 100),
(9, 'ماشین ساخت آمریکا', 'img/mahsol3.jpg', 1, 2, 15000, 10, 0, 200),
(10, 'ماشین ژاپنی', 'img/mahsol1.jpg', 1, 30, 14000, 25, 0, 200);

-- --------------------------------------------------------

--
-- Table structure for table `statesname`
--

DROP TABLE IF EXISTS `statesname`;
CREATE TABLE IF NOT EXISTS `statesname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statename` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `statesname`
--

INSERT INTO `statesname` (`id`, `statename`) VALUES
(1, 'تهران'),
(2, 'شیراز'),
(3, 'تبریز'),
(4, 'مشهد'),
(5, 'اصفهان'),
(7, 'البرز\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `submenu_tbl`
--

DROP TABLE IF EXISTS `submenu_tbl`;
CREATE TABLE IF NOT EXISTS `submenu_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `parent` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `submenu_tbl`
--

INSERT INTO `submenu_tbl` (`id`, `title`, `parent`) VALUES
(1, 'سامسونگ', 'گوشی همراه'),
(2, 'آیفون', 'گوشی همراه'),
(3, 'لباس شویی', 'تجهیزات خانگی'),
(4, 'بخار شو', 'تجهیزات خانگی'),
(5, 'کولر', 'تجهیزات خانگی');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `phonenumber` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `postcode` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `postaddress` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `ashnaei` text COLLATE utf8_persian_ci NOT NULL,
  `khabarnamehemail` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `khbarnamehsms` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `dateofregistering` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `sex` enum('0','1') COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `email`, `phonenumber`, `username`, `password`, `state`, `city`, `postcode`, `postaddress`, `ashnaei`, `khabarnamehemail`, `khbarnamehsms`, `dateofregistering`, `sex`) VALUES
(12, 'youness@gmail.com', '09376764611', 'یونس', 'e10adc3949ba59abbe56e057f20f883e', '2', '5', '1123456789', 'terhran-tehran', '1', '1', '1', '۲۲:۴۹:۰۸ , ۱۳۹۷/۶/۳۱', '1'),
(11, 'shahrzad@gmail.com', '09376764611', 'شهرزاد', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '1123456789', 'terhran-tehran', '2', '1', '1', '۲۳:۳۱:۴۸ , ۱۳۹۷/۶/۲۱', '1'),
(10, 'ashkan@gmail.com', '09376764611', 'اشکان', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '1123456789', 'terhran-tehran', '5', '1', '1', '۱۶:۵۷:۳۷ , ۱۳۹۷/۶/۲۱', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
