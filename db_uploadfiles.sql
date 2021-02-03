-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021-02-03 11:50:50
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uploadfiles`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_files`
--

CREATE TABLE `tb_files` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) COLLATE utf8_bin NOT NULL,
  `fileName` varchar(100) COLLATE utf8_bin NOT NULL,
  `fileUrl` varchar(100) COLLATE utf8_bin NOT NULL,
  `createTime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE `tb_user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(100) COLLATE utf8_bin NOT NULL,
  `upass` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`uid`, `uname`, `upass`) VALUES
(1, 'admin', 'admin'),
(10000, 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_files`
--
ALTER TABLE `tb_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tb_files`
--
ALTER TABLE `tb_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010;
--
-- 使用表AUTO_INCREMENT `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
