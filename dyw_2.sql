-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2016 at 09:16 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dyw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_dyw`
--

CREATE TABLE IF NOT EXISTS `admin_dyw` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_access` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_dyw`
--

INSERT INTO `admin_dyw` (`admin_id`, `admin_name`, `admin_access`, `password`) VALUES
(1, 'mohmmed', '123', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `advantages`
--

CREATE TABLE IF NOT EXISTS `advantages` (
  `adv_id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_name` varchar(200) NOT NULL,
  `adv_other` varchar(300) NOT NULL,
  `hall_id` int(11) NOT NULL,
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `advantages`
--

INSERT INTO `advantages` (`adv_id`, `adv_name`, `adv_other`, `hall_id`) VALUES
(1, 'Ø§Ù„Ø±ÙƒÙ†', 'Ø¨ÙŠØ¨ÙŠØ¨ÙŠ', 3),
(2, 'Ø§Ù„Ø±ÙƒÙ†', 'Ø¨Ø¨Ø¨', 1),
(3, 'Ø§Ù„Ø±ÙƒÙ†', 'ggg', 2),
(4, 'Ø§Ù„Ø±ÙƒÙ†', 'fdfdf', 3),
(5, 'Ø§Ù„Ø±ÙƒÙ†', 'ffffffffffffff', 4),
(6, 'D', 'DEEE', 5),
(7, 'D', 'gggggg', 6),
(8, 'Ø§Ù„Ø±ÙƒÙ†', 'Ù…Ø±ÙƒÙ†', 7),
(9, 'ØµÙˆØªÙŠØ§Øª', 'Ù…ÙƒØ¨Ø±Ø§Øª ØµÙˆØª ÙÙŠ Ø¬Ù…ÙŠØ¹ Ø§Ù„Ø§Ø±ÙƒØ§Ù†', 8);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_date` date NOT NULL,
  `booking_period` varchar(100) NOT NULL,
  `hall_id` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date`, `booking_period`, `hall_id`) VALUES
(1, '2016-07-08', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(2, '2016-07-13', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 2),
(3, '2016-07-27', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(4, '2016-07-19', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(5, '2016-07-21', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(6, '2016-07-19', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(7, '2016-07-24', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(8, '2016-07-27', 'ØµØ¨Ø§Ø­Ø§Ù‹', 1),
(9, '2016-07-31', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(10, '2016-07-25', 'ØµØ¨Ø§Ø­Ø§Ù‹', 1),
(11, '2016-07-26', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(12, '2016-07-13', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(13, '2016-07-20', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(14, '2016-07-28', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(15, '2016-08-24', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(16, '2016-07-07', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(17, '2016-07-31', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 2),
(18, '2016-07-04', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(19, '2016-07-29', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(20, '2016-06-15', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(21, '2016-07-06', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 1),
(22, '2016-07-06', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 3),
(23, '2016-07-05', 'Ø§Ù„ÙŠÙˆÙ… ÙƒØ§Ù…Ù„Ø§Ù‹', 2);

-- --------------------------------------------------------

--
-- Table structure for table `clinte`
--

CREATE TABLE IF NOT EXISTS `clinte` (
  `clinte_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinte_name` varchar(100) NOT NULL,
  `clinte_phone` varchar(20) NOT NULL,
  `clinte_email` varchar(100) NOT NULL,
  `clinte_password` varchar(100) NOT NULL,
  `clinte_staute` tinyint(1) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `clinte_user` varchar(100) NOT NULL,
  PRIMARY KEY (`clinte_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `clinte`
--

INSERT INTO `clinte` (`clinte_id`, `clinte_name`, `clinte_phone`, `clinte_email`, `clinte_password`, `clinte_staute`, `admin_id`, `clinte_user`) VALUES
(1, 'Ø®Ø§Ù„Ø¯', '773882858', 'khalidhack07@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'khalid'),
(2, 'hutime', '772323', 'hutmi@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'hutem'),
(3, 'ØµØ§Ù„Ø­', '73343', 'ss@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'salh'),
(4, 'fd', '7444', 'fd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'rr'),
(5, 'fd', '6674', 'fd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'tt'),
(6, 'yy', '777', 'kh@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'tt'),
(7, 're', '6666', 'fd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'rr'),
(8, 'fd', '534', 'fd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'rr'),
(9, 're', '423', 'fd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'rr'),
(10, 're', '423', 'fd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'rr'),
(11, 'ff', '777', 'fd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'rr'),
(12, 'kh', '77783333', 'khalidalansi59@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 'khaid');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_path` longtext NOT NULL,
  `picture_number` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `picture_path`, `picture_number`, `hall_id`) VALUES
(16, '../upload/146833399513614982_1366585676701804_3268953870577488613_n.jpg', 1, 5),
(17, '../upload/1468333995Ø¨Ø¯ÙˆÙ† Ø¹Ù†ÙˆØ§Ù†.jpg', 2, 5),
(18, '../upload/1468366989BGy1joPiBJdgYeF8kLfPChBvpXA0RMFK.jpg', 1, 6),
(19, '../upload/146836698913615206_969047439859137_8653024414349004433_n.jpg', 2, 6),
(22, '../upload/146843637210709_1405733679729959_4200414103920049575_n.jpg', 1, 7),
(23, '../upload/146843637310898026_1382079715428176_1674412086137690626_n.jpg', 2, 7),
(24, '../upload/14684363731936657734.jpg', 3, 7),
(25, '../upload/1468508436-1338529810.jpg', 1, 8),
(26, '../upload/1468508436-1182266330.jpg', 2, 8),
(27, '../upload/1468508436-1182266330.jpg', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `yhalls`
--

CREATE TABLE IF NOT EXISTS `yhalls` (
  `hall_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_name` varchar(100) NOT NULL,
  `hall_address` varchar(100) NOT NULL,
  `hall_size` int(11) NOT NULL,
  `hall_city` varchar(100) NOT NULL,
  `hall_phone` int(11) NOT NULL,
  `hall_map` longtext NOT NULL,
  `hall_type` text NOT NULL,
  `hall_price` int(11) NOT NULL,
  `hall_zone` varchar(200) NOT NULL,
  `hall_details` longtext NOT NULL,
  `hall_image` longtext NOT NULL,
  `hall_staute` tinyint(1) NOT NULL,
  `clinte_id` int(11) NOT NULL,
  PRIMARY KEY (`hall_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `yhalls`
--

INSERT INTO `yhalls` (`hall_id`, `hall_name`, `hall_address`, `hall_size`, `hall_city`, `hall_phone`, `hall_map`, `hall_type`, `hall_price`, `hall_zone`, `hall_details`, `hall_image`, `hall_staute`, `clinte_id`) VALUES
(5, 'GF', 'FDD', 777777, 'ØµÙ†Ø¹Ø§Ø¡', 1202222, 'http://127.0.01/phpmyadmin/index.php?db=dyw&token=7549362042a0828107e5a214839d69bc#PMAURL:db=dyw&table=yhalls&target=sql.php&token=7549362042a0828107e5a214839d69bc', 'Ø¹Ø§Ù…Ù‡', 200, 'G', 'TTTTT', '../upload/146833399510561652_204919213185755_6387608119979354949_n.jpg', 0, 7),
(6, 'yyy', 'Ø§Ù…Ø§Ù… Ø¬Ø§Ù…Ø¹ Ø§Ù„Ø®ÙŠØ±', 777777, 'adan', 1202222, 'http://127.0.01/phpmyadmin/index.php?db=dyw&token=7549362042a0828107e5a214839d69bc#PMAURL:db=dyw&table=yhalls&target=sql.php&token=7549362042a0828107e5a214839d69bc', 'Ø¹Ø§Ù…Ù‡', 200, 'G', 'yy', '../upload/146836698813600019_1082199578526984_902416270440981420_n.jpg', 0, 7),
(7, 'Ø§Ù„Ø²Ù‡ÙˆØ±', 'Ø§Ù…Ø§Ù… Ø¬Ø§Ù…Ø¹ Ø§Ù„Ø®ÙŠØ±', 2000, 'sana', 1202222, 'http://127.0.01/phpmyadmin/index.php?db=dyw&token=7549362042a0828107e5a214839d69bc#PMAURL:db=dyw&table=yhalls&target=sql.php&token=7549362042a0828107e5a214839d69bc', 'Ø¹Ø§Ù…Ù‡', 200, 'sanaold', 'Ø¨ÙŠØ¨ÙŠØ¨ÙŠ', '../upload/14684363721463076_1409656419334336_6830614556640684419_n.jpg', 0, 7),
(8, 'Ù‡Ù‡Ù‡', 'Ù‡Ø¨Ø±Ù‡ ÙˆØ§Ø¯ÙŠ Ø¬Ù…ÙŠÙ„', 2000, 'sana', 1202222, 'http://127.0.01/phpmyadmin/index.php?db=dyw&token=7549362042a0828107e5a214839d69bc#PMAURL:db=dyw&table=yhalls&target=sql.php&token=7549362042a0828107e5a214839d69bc', 'Ø¹Ø§Ù…Ù‡', 200, 'shaob', 'Ù„Ø¯ÙŠÙ‡Ø§ Ø§Ù„Ù‚Ø¯Ø±Ù‡ Ø¹Ù„Ù‰ Ø§Ù„Ø§Ù†ØªÙ‚Ø§Ù„', '../upload/146850843610709_1405733679729959_4200414103920049575_n.jpg', 0, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
