-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 25 Sty 2017, 17:41
-- Wersja serwera: 5.6.31
-- Wersja PHP: 5.5.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `modul_stracks`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `banners`
--

CREATE TABLE `banners` (
  `banners_id` int(11) NOT NULL,
  `banners_type` smallint(6) NOT NULL,
  `banners_path` varchar(32) NOT NULL,
  `banners_url` varchar(200) NOT NULL,
  `banners_order` int(11) NOT NULL,
  `banners_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `configurations`
--

CREATE TABLE `configurations` (
  `configurations_id` int(11) NOT NULL,
  `configurations_name` varchar(45) NOT NULL,
  `configuratkons_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `genres`
--

CREATE TABLE `genres` (
  `genres_id` int(11) NOT NULL,
  `genres_name` varchar(45) NOT NULL,
  `genres_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paypal_cart_info`
--

CREATE TABLE `paypal_cart_info` (
  `paypal_cart_info_id` int(11) NOT NULL,
  `txnid` varchar(30) NOT NULL DEFAULT '',
  `itemname` varchar(255) NOT NULL DEFAULT '',
  `itemnumber` varchar(50) DEFAULT NULL,
  `os0` varchar(20) DEFAULT NULL,
  `on0` varchar(50) DEFAULT NULL,
  `os1` varchar(20) DEFAULT NULL,
  `on1` varchar(50) DEFAULT NULL,
  `quantity` char(3) NOT NULL DEFAULT '',
  `invoice` varchar(255) NOT NULL DEFAULT '',
  `custom` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paypal_payment_info`
--

CREATE TABLE `paypal_payment_info` (
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `buyer_email` varchar(100) NOT NULL DEFAULT '',
  `street` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `state` char(3) NOT NULL DEFAULT '',
  `zipcode` varchar(11) NOT NULL DEFAULT '',
  `memo` varchar(255) DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `itemnumber` varchar(50) DEFAULT NULL,
  `os0` varchar(20) DEFAULT NULL,
  `on0` varchar(50) DEFAULT NULL,
  `os1` varchar(20) DEFAULT NULL,
  `on1` varchar(50) DEFAULT NULL,
  `quantity` char(3) DEFAULT NULL,
  `paymentdate` varchar(50) NOT NULL DEFAULT '',
  `paymenttype` varchar(10) NOT NULL DEFAULT '',
  `txnid` varchar(30) NOT NULL DEFAULT '',
  `mc_gross` varchar(6) NOT NULL DEFAULT '',
  `mc_fee` varchar(5) NOT NULL DEFAULT '',
  `paymentstatus` varchar(15) NOT NULL DEFAULT '',
  `pendingreason` varchar(10) DEFAULT NULL,
  `txntype` varchar(10) NOT NULL DEFAULT '',
  `tax` varchar(10) DEFAULT NULL,
  `mc_currency` varchar(5) NOT NULL DEFAULT '',
  `reasoncode` varchar(20) NOT NULL DEFAULT '',
  `custom` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(20) NOT NULL DEFAULT '',
  `datecreation` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paypal_subscription_info`
--

CREATE TABLE `paypal_subscription_info` (
  `paypal_subscription_info_id` int(11) NOT NULL,
  `subscr_id` varchar(255) NOT NULL DEFAULT '',
  `sub_event` varchar(50) NOT NULL DEFAULT '',
  `subscr_date` varchar(255) NOT NULL DEFAULT '',
  `subscr_effective` varchar(255) NOT NULL DEFAULT '',
  `period1` varchar(255) NOT NULL DEFAULT '',
  `period2` varchar(255) NOT NULL DEFAULT '',
  `period3` varchar(255) NOT NULL DEFAULT '',
  `amount1` varchar(255) NOT NULL DEFAULT '',
  `amount2` varchar(255) NOT NULL DEFAULT '',
  `amount3` varchar(255) NOT NULL DEFAULT '',
  `mc_amount1` varchar(255) NOT NULL DEFAULT '',
  `mc_amount2` varchar(255) NOT NULL DEFAULT '',
  `mc_amount3` varchar(255) NOT NULL DEFAULT '',
  `recurring` varchar(255) NOT NULL DEFAULT '',
  `reattempt` varchar(255) NOT NULL DEFAULT '',
  `retry_at` varchar(255) NOT NULL DEFAULT '',
  `recur_times` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `payment_txn_id` varchar(50) NOT NULL DEFAULT '',
  `subscriber_emailaddress` varchar(255) NOT NULL DEFAULT '',
  `datecreation` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles`
--

CREATE TABLE `profiles` (
  `profiles_id` int(11) NOT NULL,
  `profiles_name` varchar(30) NOT NULL,
  `profiles_email` varchar(50) NOT NULL,
  `profiles_password` varchar(64) NOT NULL,
  `profiles_text` varchar(500) NOT NULL,
  `profiles_date` datetime NOT NULL,
  `profiles_path` varchar(50) NOT NULL,
  `profiles_photo` tinyint(1) NOT NULL DEFAULT '0',
  `profiles_balance` int(11) NOT NULL DEFAULT '0',
  `profiles_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `profiles_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `profiles_register_url` varchar(32) DEFAULT NULL,
  `profiles_password_url` varchar(32) DEFAULT NULL,
  `profiles_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `profiles_sales_inform_instantly` tinyint(1) NOT NULL DEFAULT '0',
  `profiles_sales_inform_daily` tinyint(1) NOT NULL DEFAULT '0',
  `profiles_sales_inform_weekly` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles_baskets`
--

CREATE TABLE `profiles_baskets` (
  `profiles_baskets_id` int(11) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL,
  `profiles_baskets_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles_urls`
--

CREATE TABLE `profiles_urls` (
  `profiles_urls_id` int(11) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `profiles_urls_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles_viewed`
--

CREATE TABLE `profiles_viewed` (
  `profiles_viewed_id` int(11) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `profiles_viewed_ip_address` varchar(15) DEFAULT NULL,
  `profiles_viewed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles_wishlists`
--

CREATE TABLE `profiles_wishlists` (
  `profiles_wishlists_id` int(11) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL,
  `profiles_wishlists_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `texts`
--

CREATE TABLE `texts` (
  `texts_id` int(11) NOT NULL,
  `texts_name` varchar(45) NOT NULL,
  `texts_value` text NOT NULL,
  `texts_help` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `texts_faq`
--

CREATE TABLE `texts_faq` (
  `texts_faq_id` int(11) NOT NULL,
  `texts_faq_question` varchar(300) NOT NULL,
  `texts_faq_answer` text NOT NULL,
  `texts_faq_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tracks`
--

CREATE TABLE `tracks` (
  `tracks_id` int(11) NOT NULL,
  `tracks_title` varchar(200) NOT NULL,
  `tracks_artist` varchar(200) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `tracks_path` varchar(200) NOT NULL,
  `tracks_time` int(11) NOT NULL,
  `tracks_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `tracks_date` datetime NOT NULL,
  `tracks_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tracks_genres`
--

CREATE TABLE `tracks_genres` (
  `tracks_genres_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL,
  `genres_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tracks_played`
--

CREATE TABLE `tracks_played` (
  `tracks_played_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL,
  `tracks_played_ip_address` varchar(15) NOT NULL,
  `tracks_played_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tracks_recommends`
--

CREATE TABLE `tracks_recommends` (
  `tracks_recommends_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL,
  `tracks_recommends_order` int(11) NOT NULL,
  `tracks_recommends_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tracks_votes`
--

CREATE TABLE `tracks_votes` (
  `tracks_votes_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `tracks_votes_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `transactions_id` int(11) NOT NULL,
  `transactions_date` datetime NOT NULL,
  `transactions_paymethod` smallint(6) DEFAULT NULL,
  `transactions_paypal_txnid` varchar(30) DEFAULT NULL,
  `transactions_done` tinyint(1) NOT NULL DEFAULT '0',
  `profiles_id` int(11) DEFAULT NULL,
  `transactions_path` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions_saldo`
--

CREATE TABLE `transactions_saldo` (
  `transactions_saldo_id` int(11) NOT NULL,
  `transactions_tracks_id` int(11) NOT NULL,
  `profiles_id` int(11) DEFAULT NULL,
  `transactions_saldo_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions_tracks`
--

CREATE TABLE `transactions_tracks` (
  `transactions_tracks_id` int(11) NOT NULL,
  `transactions_id` int(11) NOT NULL,
  `tracks_id` int(11) NOT NULL,
  `transactions_tracks_path` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions_tracks_downloads`
--

CREATE TABLE `transactions_tracks_downloads` (
  `transactions_tracks_downloads_id` int(11) NOT NULL,
  `transactions_tracks_id` int(11) NOT NULL,
  `transactions_tracks_downloads_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `withdraws`
--

CREATE TABLE `withdraws` (
  `withdraws_id` int(11) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `withdraws_paypal_address` varchar(200) NOT NULL,
  `withdraws_date` datetime NOT NULL,
  `withdraws_saldo_value` int(11) NOT NULL,
  `withdraws_status` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banners_id`),
  ADD UNIQUE KEY `banners_U_1` (`banners_path`),
  ADD KEY `banners_WHERE_ORDER` (`banners_type`,`banners_active`,`banners_order`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`configurations_id`),
  ADD UNIQUE KEY `configurations_U_1` (`configurations_name`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genres_id`),
  ADD UNIQUE KEY `genres_U_1` (`genres_name`),
  ADD UNIQUE KEY `genres_U_2` (`genres_path`);

--
-- Indexes for table `paypal_cart_info`
--
ALTER TABLE `paypal_cart_info`
  ADD PRIMARY KEY (`paypal_cart_info_id`),
  ADD KEY `paypal_cart_info_FK_1` (`txnid`);

--
-- Indexes for table `paypal_payment_info`
--
ALTER TABLE `paypal_payment_info`
  ADD PRIMARY KEY (`txnid`);

--
-- Indexes for table `paypal_subscription_info`
--
ALTER TABLE `paypal_subscription_info`
  ADD PRIMARY KEY (`paypal_subscription_info_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profiles_id`),
  ADD UNIQUE KEY `profiles_U_1` (`profiles_name`),
  ADD UNIQUE KEY `profiles_U_2` (`profiles_email`),
  ADD UNIQUE KEY `profiles_U_3` (`profiles_path`),
  ADD KEY `profiles_WHERE_ORDER` (`profiles_deleted`,`profiles_blocked`,`profiles_date`);

--
-- Indexes for table `profiles_baskets`
--
ALTER TABLE `profiles_baskets`
  ADD PRIMARY KEY (`profiles_baskets_id`),
  ADD KEY `fk_pb_profiles_id` (`profiles_id`),
  ADD KEY `fk_pb_tracks_id` (`tracks_id`);

--
-- Indexes for table `profiles_urls`
--
ALTER TABLE `profiles_urls`
  ADD PRIMARY KEY (`profiles_urls_id`),
  ADD KEY `fk_pu_profiles_id` (`profiles_id`);

--
-- Indexes for table `profiles_viewed`
--
ALTER TABLE `profiles_viewed`
  ADD PRIMARY KEY (`profiles_viewed_id`),
  ADD KEY `fk_pv_profiles_id` (`profiles_id`);

--
-- Indexes for table `profiles_wishlists`
--
ALTER TABLE `profiles_wishlists`
  ADD PRIMARY KEY (`profiles_wishlists_id`),
  ADD KEY `fk_pw_profiles_id` (`profiles_id`),
  ADD KEY `fk_pw_tracks_id` (`tracks_id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`texts_id`),
  ADD UNIQUE KEY `texts_U_1` (`texts_name`);

--
-- Indexes for table `texts_faq`
--
ALTER TABLE `texts_faq`
  ADD PRIMARY KEY (`texts_faq_id`),
  ADD KEY `texts_faq_ORDER` (`texts_faq_order`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`tracks_id`),
  ADD KEY `fk_t_profiles_id` (`profiles_id`),
  ADD KEY `tracks_WHERE_ORDER` (`tracks_deleted`,`tracks_accepted`,`tracks_date`),
  ADD KEY `tracks_path` (`tracks_path`);

--
-- Indexes for table `tracks_genres`
--
ALTER TABLE `tracks_genres`
  ADD PRIMARY KEY (`tracks_genres_id`),
  ADD KEY `fk_tg_tracks_id` (`tracks_id`),
  ADD KEY `fk_tg_genres_id` (`genres_id`);

--
-- Indexes for table `tracks_played`
--
ALTER TABLE `tracks_played`
  ADD PRIMARY KEY (`tracks_played_id`),
  ADD KEY `fk_tp_tracks_id` (`tracks_id`);

--
-- Indexes for table `tracks_recommends`
--
ALTER TABLE `tracks_recommends`
  ADD PRIMARY KEY (`tracks_recommends_id`),
  ADD KEY `fk_tr_tracks_id` (`tracks_id`),
  ADD KEY `tracks_recommends_WHERE_ORDER` (`tracks_recommends_active`,`tracks_recommends_order`);

--
-- Indexes for table `tracks_votes`
--
ALTER TABLE `tracks_votes`
  ADD PRIMARY KEY (`tracks_votes_id`),
  ADD KEY `tracks_votes_FK_1` (`tracks_id`),
  ADD KEY `tracks_votes_FK_2` (`profiles_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `transactions_ORDER` (`transactions_date`),
  ADD KEY `transactions_FK_1` (`transactions_paypal_txnid`),
  ADD KEY `transactions_FK_2` (`profiles_id`);

--
-- Indexes for table `transactions_saldo`
--
ALTER TABLE `transactions_saldo`
  ADD PRIMARY KEY (`transactions_saldo_id`),
  ADD KEY `fk_ts_transactions_tracks_id` (`transactions_tracks_id`),
  ADD KEY `fk_ts_profies_id` (`profiles_id`);

--
-- Indexes for table `transactions_tracks`
--
ALTER TABLE `transactions_tracks`
  ADD PRIMARY KEY (`transactions_tracks_id`),
  ADD UNIQUE KEY `transactions_tracks_U_1` (`transactions_tracks_path`),
  ADD KEY `fk_tt_transactions_id` (`transactions_id`),
  ADD KEY `fk_tt_tracks_id` (`tracks_id`);

--
-- Indexes for table `transactions_tracks_downloads`
--
ALTER TABLE `transactions_tracks_downloads`
  ADD PRIMARY KEY (`transactions_tracks_downloads_id`),
  ADD KEY `fk_ttd_transactions_tracks_id` (`transactions_tracks_id`),
  ADD KEY `transactions_tracks_downloads_ORDER` (`transactions_tracks_downloads_date`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`withdraws_id`),
  ADD KEY `fk_w_profiles_id` (`profiles_id`),
  ADD KEY `withdraws_WHERE_ORDER` (`withdraws_status`,`withdraws_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `banners`
--
ALTER TABLE `banners`
  MODIFY `banners_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT dla tabeli `configurations`
--
ALTER TABLE `configurations`
  MODIFY `configurations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `genres`
--
ALTER TABLE `genres`
  MODIFY `genres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT dla tabeli `paypal_cart_info`
--
ALTER TABLE `paypal_cart_info`
  MODIFY `paypal_cart_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2906;
--
-- AUTO_INCREMENT dla tabeli `paypal_subscription_info`
--
ALTER TABLE `paypal_subscription_info`
  MODIFY `paypal_subscription_info_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profiles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1388;
--
-- AUTO_INCREMENT dla tabeli `profiles_baskets`
--
ALTER TABLE `profiles_baskets`
  MODIFY `profiles_baskets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1711;
--
-- AUTO_INCREMENT dla tabeli `profiles_urls`
--
ALTER TABLE `profiles_urls`
  MODIFY `profiles_urls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT dla tabeli `profiles_viewed`
--
ALTER TABLE `profiles_viewed`
  MODIFY `profiles_viewed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111340;
--
-- AUTO_INCREMENT dla tabeli `profiles_wishlists`
--
ALTER TABLE `profiles_wishlists`
  MODIFY `profiles_wishlists_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;
--
-- AUTO_INCREMENT dla tabeli `texts`
--
ALTER TABLE `texts`
  MODIFY `texts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT dla tabeli `texts_faq`
--
ALTER TABLE `texts_faq`
  MODIFY `texts_faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT dla tabeli `tracks`
--
ALTER TABLE `tracks`
  MODIFY `tracks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1538;
--
-- AUTO_INCREMENT dla tabeli `tracks_genres`
--
ALTER TABLE `tracks_genres`
  MODIFY `tracks_genres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4097;
--
-- AUTO_INCREMENT dla tabeli `tracks_played`
--
ALTER TABLE `tracks_played`
  MODIFY `tracks_played_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227103;
--
-- AUTO_INCREMENT dla tabeli `tracks_recommends`
--
ALTER TABLE `tracks_recommends`
  MODIFY `tracks_recommends_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;
--
-- AUTO_INCREMENT dla tabeli `tracks_votes`
--
ALTER TABLE `tracks_votes`
  MODIFY `tracks_votes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89658;
--
-- AUTO_INCREMENT dla tabeli `transactions_saldo`
--
ALTER TABLE `transactions_saldo`
  MODIFY `transactions_saldo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9313;
--
-- AUTO_INCREMENT dla tabeli `transactions_tracks`
--
ALTER TABLE `transactions_tracks`
  MODIFY `transactions_tracks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3106;
--
-- AUTO_INCREMENT dla tabeli `transactions_tracks_downloads`
--
ALTER TABLE `transactions_tracks_downloads`
  MODIFY `transactions_tracks_downloads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2801;
--
-- AUTO_INCREMENT dla tabeli `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `withdraws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `paypal_cart_info`
--
ALTER TABLE `paypal_cart_info`
  ADD CONSTRAINT `paypal_cart_info_FK_1` FOREIGN KEY (`txnid`) REFERENCES `paypal_payment_info` (`txnid`);

--
-- Ograniczenia dla tabeli `profiles_baskets`
--
ALTER TABLE `profiles_baskets`
  ADD CONSTRAINT `profiles_baskets_FK_1` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`),
  ADD CONSTRAINT `profiles_baskets_FK_2` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`tracks_id`);

--
-- Ograniczenia dla tabeli `profiles_urls`
--
ALTER TABLE `profiles_urls`
  ADD CONSTRAINT `profiles_urls_FK_1` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`);

--
-- Ograniczenia dla tabeli `profiles_viewed`
--
ALTER TABLE `profiles_viewed`
  ADD CONSTRAINT `profiles_viewed_FK_1` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`);

--
-- Ograniczenia dla tabeli `profiles_wishlists`
--
ALTER TABLE `profiles_wishlists`
  ADD CONSTRAINT `profiles_wishlists_FK_1` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`),
  ADD CONSTRAINT `profiles_wishlists_FK_2` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`tracks_id`);

--
-- Ograniczenia dla tabeli `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_FK_1` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`);

--
-- Ograniczenia dla tabeli `tracks_genres`
--
ALTER TABLE `tracks_genres`
  ADD CONSTRAINT `tracks_genres_FK_1` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`tracks_id`),
  ADD CONSTRAINT `tracks_genres_FK_2` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`genres_id`);

--
-- Ograniczenia dla tabeli `tracks_played`
--
ALTER TABLE `tracks_played`
  ADD CONSTRAINT `tracks_played_FK_1` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`tracks_id`);

--
-- Ograniczenia dla tabeli `tracks_recommends`
--
ALTER TABLE `tracks_recommends`
  ADD CONSTRAINT `tracks_recommends_FK_1` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`tracks_id`);

--
-- Ograniczenia dla tabeli `tracks_votes`
--
ALTER TABLE `tracks_votes`
  ADD CONSTRAINT `tracks_votes_FK_1` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`tracks_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tracks_votes_FK_2` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_FK_1` FOREIGN KEY (`transactions_paypal_txnid`) REFERENCES `paypal_payment_info` (`txnid`),
  ADD CONSTRAINT `transactions_FK_2` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`);

--
-- Ograniczenia dla tabeli `transactions_saldo`
--
ALTER TABLE `transactions_saldo`
  ADD CONSTRAINT `transactions_saldo_FK_1` FOREIGN KEY (`transactions_tracks_id`) REFERENCES `transactions_tracks` (`transactions_tracks_id`),
  ADD CONSTRAINT `transactions_saldo_FK_2` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`);

--
-- Ograniczenia dla tabeli `transactions_tracks`
--
ALTER TABLE `transactions_tracks`
  ADD CONSTRAINT `transactions_tracks_FK_1` FOREIGN KEY (`transactions_id`) REFERENCES `transactions` (`transactions_id`),
  ADD CONSTRAINT `transactions_tracks_FK_2` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`tracks_id`);

--
-- Ograniczenia dla tabeli `transactions_tracks_downloads`
--
ALTER TABLE `transactions_tracks_downloads`
  ADD CONSTRAINT `transactions_tracks_downloads_FK_1` FOREIGN KEY (`transactions_tracks_id`) REFERENCES `transactions_tracks` (`transactions_tracks_id`);

--
-- Ograniczenia dla tabeli `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_FK_1` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`profiles_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
