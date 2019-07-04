-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019 年 7 月 04 日 13:52
-- サーバのバージョン： 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsf_d03_db01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `Uname` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザ名',
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ログインID',
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'パスワード',
  `kanri_flg` int(4) NOT NULL COMMENT '一般：0，管理者：1',
  `life_flg` int(4) NOT NULL COMMENT 'アクティブ：0，非アクティブ：1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `Uname`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'enoki', 'shigeharu', 'greengreen', 0, 0),
(4, 'aa', 'aa', 'aa', 1, 0),
(5, 'bb', 'bb', 'bb', 0, 0),
(6, 'enoki', 'enoki', 'enoki', 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_mypantry_table`
--

CREATE TABLE `gs_mypantry_table` (
  `id` int(12) NOT NULL,
  `product` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名',
  `category` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `kane_price` int(12) DEFAULT NULL COMMENT '安売り価格',
  `basyo_place` text COLLATE utf8_unicode_ci COMMENT '安い場所',
  `comment` text COLLATE utf8_unicode_ci COMMENT '備考',
  `indate` date NOT NULL COMMENT '登録日時',
  `enough` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'たりるかたりないか',
  `ONOFF` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'いるかいらないか'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_mypantry_table`
--

INSERT INTO `gs_mypantry_table` (`id`, `product`, `category`, `kane_price`, `basyo_place`, `comment`, `indate`, `enough`, `ONOFF`) VALUES
(7, 'メディファス 室内猫 毛玉ケアプラス ', 'Cat', 1040, 'amazon', '1歳から チキン&フィッシュ味 1.41kg(235gx6)', '2019-06-13', 'ON', '必要'),
(8, 'ニュートロ　ナチュラルチョイス', 'Cat', 2490, 'yahoo!shoping', '室内猫用　アダルト　チキン　２Kg', '2019-06-13', 'OFF', '必要'),
(9, '炭の消臭シート ( 20枚入 )', 'Cat', 940, 'yahoo!shoping', '税抜3000円以上で送料無料', '2019-06-13', 'OFF', '必要');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_mypantry_table`
--
ALTER TABLE `gs_mypantry_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gs_mypantry_table`
--
ALTER TABLE `gs_mypantry_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
