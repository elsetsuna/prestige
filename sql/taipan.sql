-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2015 at 08:23 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taipan`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
`id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `card_owner` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `signon_bonus` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `card_id`, `card_owner`, `status`, `signon_bonus`) VALUES
(1, 2147483647, 'Budi', 1, 0),
(2, 1231234, 'Joko', 1, 0),
(3, 1231235, 'Muhamad', 1, 0),
(4, 1231236, 'Maimun', 1, 0),
(5, 1231237, 'Apel', 1, 0),
(6, 1231238, 'Timun', 1, 0),
(7, 1231239, 'Sawit', 1, 0),
(8, 1231240, 'Susilo', 1, 0),
(9, 1231241, '', 1, 0),
(10, 1231242, '', 1, 0),
(11, 2147483647, '', 1, 0),
(12, 2147483647, '', 1, 0),
(13, 1231250, '', 1, 0),
(14, 1231251, '', 1, 0),
(15, 1231252, '', 1, 0),
(16, 1231253, '', 1, 0),
(17, 1231254, '', 1, 1),
(18, 1231255, '', 1, 1),
(19, 1231256, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`member_id` int(11) NOT NULL,
  `member_name` varchar(40) NOT NULL,
  `member_idtype` varchar(40) NOT NULL,
  `member_idnum` int(11) NOT NULL,
  `member_dob` date NOT NULL,
  `member_mphone` int(11) NOT NULL,
  `member_ophone` int(11) NOT NULL,
  `member_email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE IF NOT EXISTS `navbar` (
`id` int(11) NOT NULL,
  `sort_id` int(11) NOT NULL,
  `nav_name` varchar(255) NOT NULL,
  `nav_icon` varchar(255) NOT NULL,
  `nav_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='store navigation data' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `sort_id`, `nav_name`, `nav_icon`, `nav_link`, `status`) VALUES
(1, 15, 'Set Rate', 'icon-money', '?module=setrate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `point_log`
--

CREATE TABLE IF NOT EXISTS `point_log` (
`no` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `sales_amount` int(11) NOT NULL,
  `point_get` int(11) NOT NULL,
  `point_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `point_log`
--

INSERT INTO `point_log` (`no`, `card_id`, `invoice_no`, `sales_amount`, `point_get`, `point_date`) VALUES
(4, 1231251, 1231235, 100000000, 1000, '2015-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `card_id` int(11) NOT NULL,
  `t_point` int(11) NOT NULL,
  `a_point` int(11) NOT NULL,
  `u_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`card_id`, `t_point`, `a_point`, `u_point`) VALUES
(1231250, 100, 35, 65),
(1231251, 1185, 1185, 0),
(1231252, 0, 0, 0),
(1231253, 0, 0, 0),
(1231254, 0, 0, 0),
(1231255, 0, 0, 0),
(1231256, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `rates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rates`) VALUES
(100000);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
`no` int(11) NOT NULL,
  `reward` varchar(255) NOT NULL,
  `r_category` varchar(255) NOT NULL,
  `point_used` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`no`, `reward`, `r_category`, `point_used`, `remarks`, `status`, `create_time`, `last_update`) VALUES
(2, 'pancake', 'snack', 10, 'pancake durian medium sized', 1, '2015-06-13', '2015-06-13'),
(3, 'tumis kangkung', 'food', 7, 'porsi kecil', 1, '2015-06-15', '2015-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `reward_category`
--

CREATE TABLE IF NOT EXISTS `reward_category` (
`no` int(11) NOT NULL,
  `r_category` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `reward_category`
--

INSERT INTO `reward_category` (`no`, `r_category`, `status`, `create_time`) VALUES
(2, 'food', 1, '2015-06-13'),
(3, 'drinks', 1, '2015-06-13'),
(7, 'tahu', 1, '2015-06-13'),
(8, 'voucher', 1, '2015-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
`ssid_id` int(11) NOT NULL,
  `ssid` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`ssid_id`, `ssid`) VALUES
(1, 'uj1oifur0ssh6q9nolok5v9d64');

-- --------------------------------------------------------

--
-- Table structure for table `signon`
--

CREATE TABLE IF NOT EXISTS `signon` (
`no` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `bonus_status` int(11) NOT NULL COMMENT '1=claimed , 0=unclaimed',
  `claim_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `signon`
--

INSERT INTO `signon` (`no`, `card_id`, `bonus_status`, `claim_date`) VALUES
(1, 1231255, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `logintime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `logintime`) VALUES
(1, 'qwe', '$2y$10$0R9FJfyLUMqUETEruEaWa.S7Ik1UGRzbeY5iLyeI/FLvMTunXzStK', 'qwe@asd.com', '2015-06-16 05:24:02'),
(2, 'marvin', '$2y$10$0R9FJfyLUMqUETEruEaWa.S7Ik1UGRzbeY5iLyeI/FLvMTunXzStK', 'vnz_inside@aol.com', '2015-06-16 05:24:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_log`
--
ALTER TABLE `point_log`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
 ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `reward_category`
--
ALTER TABLE `reward_category`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`ssid_id`);

--
-- Indexes for table `signon`
--
ALTER TABLE `signon`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `point_log`
--
ALTER TABLE `point_log`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reward_category`
--
ALTER TABLE `reward_category`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
MODIFY `ssid_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `signon`
--
ALTER TABLE `signon`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
