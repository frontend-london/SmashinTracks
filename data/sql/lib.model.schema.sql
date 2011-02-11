
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- banners
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;


CREATE TABLE `banners`
(
	`banners_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`banners_type` SMALLINT(6)  NOT NULL,
	`banners_path` VARCHAR(32)  NOT NULL,
	`banners_url` VARCHAR(200)  NOT NULL,
	`banners_order` INTEGER(11)  NOT NULL,
	`banners_active` TINYINT(1)  NOT NULL,
	PRIMARY KEY (`banners_id`),
	UNIQUE KEY `banners_U_1` (`banners_path`),
	KEY `banners_WHERE_ORDER`(`banners_type`, `banners_active`, `banners_order`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- configurations
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `configurations`;


CREATE TABLE `configurations`
(
	`configurations_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`configurations_name` VARCHAR(45)  NOT NULL,
	`configuratkons_value` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`configurations_id`),
	UNIQUE KEY `configurations_U_1` (`configurations_name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- genres
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;


CREATE TABLE `genres`
(
	`genres_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`genres_name` VARCHAR(45)  NOT NULL,
	`genres_path` VARCHAR(50),
	PRIMARY KEY (`genres_id`),
	UNIQUE KEY `genres_U_1` (`genres_name`),
	UNIQUE KEY `genres_U_2` (`genres_path`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- profiles
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `profiles`;


CREATE TABLE `profiles`
(
	`profiles_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`profiles_name` VARCHAR(200)  NOT NULL,
	`profiles_email` VARCHAR(200)  NOT NULL,
	`profiles_password` VARCHAR(32)  NOT NULL,
	`profiles_text` VARCHAR(500)  NOT NULL,
	`profiles_date` DATETIME  NOT NULL,
	`profiles_path` VARCHAR(200)  NOT NULL,
	`profiles_photo` TINYINT(1) default 0 NOT NULL,
	`profiles_balance` INTEGER(11) default 0 NOT NULL,
	`profiles_blocked` TINYINT(1) default 0 NOT NULL,
	`profiles_deleted` TINYINT(1) default 0 NOT NULL,
	`profiles_password_url` VARCHAR(32),
	`profiles_newsletter` TINYINT(1) default 0 NOT NULL,
	PRIMARY KEY (`profiles_id`),
	UNIQUE KEY `profiles_U_1` (`profiles_name`),
	UNIQUE KEY `profiles_U_2` (`profiles_email`),
	UNIQUE KEY `profiles_U_3` (`profiles_path`),
	KEY `profiles_WHERE_ORDER`(`profiles_deleted`, `profiles_blocked`, `profiles_date`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- profiles_baskets
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `profiles_baskets`;


CREATE TABLE `profiles_baskets`
(
	`profiles_baskets_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`profiles_id` INTEGER(11)  NOT NULL,
	`tracks_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`profiles_baskets_id`),
	KEY `fk_pb_profiles_id`(`profiles_id`),
	KEY `fk_pb_tracks_id`(`tracks_id`),
	CONSTRAINT `profiles_baskets_FK_1`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `profiles_baskets_FK_2`
		FOREIGN KEY (`tracks_id`)
		REFERENCES `tracks` (`tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- profiles_urls
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `profiles_urls`;


CREATE TABLE `profiles_urls`
(
	`profiles_urls_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`profiles_id` INTEGER(11)  NOT NULL,
	`profiles_urls_url` VARCHAR(200)  NOT NULL,
	PRIMARY KEY (`profiles_urls_id`),
	KEY `fk_pu_profiles_id`(`profiles_id`),
	CONSTRAINT `profiles_urls_FK_1`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- profiles_viewed
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `profiles_viewed`;


CREATE TABLE `profiles_viewed`
(
	`profiles_viewed_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`artists_id` INTEGER(11)  NOT NULL,
	`profiles_id` INTEGER(11),
	`profiles_viewed_ip_address` VARCHAR(15),
	`profiles_viewed_date` DATETIME  NOT NULL,
	PRIMARY KEY (`profiles_viewed_id`),
	KEY `fk_pv_artists_id`(`artists_id`),
	KEY `fk_pv_profiles_id`(`profiles_id`),
	CONSTRAINT `profiles_viewed_FK_1`
		FOREIGN KEY (`artists_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `profiles_viewed_FK_2`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- profiles_wishlists
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `profiles_wishlists`;


CREATE TABLE `profiles_wishlists`
(
	`profiles_wishlists_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`profiles_id` INTEGER(11)  NOT NULL,
	`tracks_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`profiles_wishlists_id`),
	KEY `fk_pw_profiles_id`(`profiles_id`),
	KEY `fk_pw_tracks_id`(`tracks_id`),
	CONSTRAINT `profiles_wishlists_FK_1`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `profiles_wishlists_FK_2`
		FOREIGN KEY (`tracks_id`)
		REFERENCES `tracks` (`tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- texts
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `texts`;


CREATE TABLE `texts`
(
	`texts_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`texts_name` VARCHAR(45)  NOT NULL,
	`texts_value` TEXT  NOT NULL,
	PRIMARY KEY (`texts_id`),
	UNIQUE KEY `texts_U_1` (`texts_name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- texts_faq
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `texts_faq`;


CREATE TABLE `texts_faq`
(
	`texts_faq_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`texts_faq_question` VARCHAR(300)  NOT NULL,
	`texts_faq_answer` TEXT  NOT NULL,
	`texts_faq_order` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`texts_faq_id`),
	KEY `texts_faq_ORDER`(`texts_faq_order`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tracks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tracks`;


CREATE TABLE `tracks`
(
	`tracks_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`tracks_title` VARCHAR(200)  NOT NULL,
	`tracks_artist` VARCHAR(200)  NOT NULL,
	`profiles_id` INTEGER(11)  NOT NULL,
	`tracks_path` VARCHAR(200)  NOT NULL,
	`tracks_time` INTEGER(11)  NOT NULL,
	`tracks_accepted` TINYINT(1) default 0 NOT NULL,
	`tracks_date` DATETIME  NOT NULL,
	`tracks_deleted` TINYINT(1) default 0 NOT NULL,
	PRIMARY KEY (`tracks_id`),
	UNIQUE KEY `tracks_U_1` (`tracks_path`),
	KEY `fk_t_profiles_id`(`profiles_id`),
	KEY `tracks_WHERE_ORDER`(`tracks_deleted`, `tracks_accepted`, `tracks_date`),
	CONSTRAINT `tracks_FK_1`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tracks_genres
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tracks_genres`;


CREATE TABLE `tracks_genres`
(
	`tracks_genres_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`tracks_id` INTEGER(11)  NOT NULL,
	`genres_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`tracks_genres_id`),
	KEY `fk_tg_tracks_id`(`tracks_id`),
	KEY `fk_tg_genres_id`(`genres_id`),
	CONSTRAINT `tracks_genres_FK_1`
		FOREIGN KEY (`tracks_id`)
		REFERENCES `tracks` (`tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `tracks_genres_FK_2`
		FOREIGN KEY (`genres_id`)
		REFERENCES `genres` (`genres_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tracks_played
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tracks_played`;


CREATE TABLE `tracks_played`
(
	`tracks_played_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`tracks_id` INTEGER(11)  NOT NULL,
	`profiles_id` INTEGER(11),
	`tracks_played_ip_address` VARCHAR(15),
	`tracks_played_date` DATETIME  NOT NULL,
	PRIMARY KEY (`tracks_played_id`),
	KEY `fk_tp_tracks_id`(`tracks_id`),
	KEY `fk_tp_profiles_id`(`profiles_id`),
	CONSTRAINT `tracks_played_FK_1`
		FOREIGN KEY (`tracks_id`)
		REFERENCES `tracks` (`tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `tracks_played_FK_2`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tracks_recommends
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tracks_recommends`;


CREATE TABLE `tracks_recommends`
(
	`tracks_recommends_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`tracks_id` INTEGER(11)  NOT NULL,
	`tracks_recommends_order` INTEGER(11)  NOT NULL,
	`tracks_recommends_active` TINYINT(1) default 0 NOT NULL,
	PRIMARY KEY (`tracks_recommends_id`),
	KEY `fk_tr_tracks_id`(`tracks_id`),
	KEY `tracks_recommends_WHERE_ORDER`(`tracks_recommends_active`, `tracks_recommends_order`),
	CONSTRAINT `tracks_recommends_FK_1`
		FOREIGN KEY (`tracks_id`)
		REFERENCES `tracks` (`tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- transactions
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;


CREATE TABLE `transactions`
(
	`transactions_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`transactions_date` DATETIME  NOT NULL,
	`transactions_paymethod` SMALLINT(6)  NOT NULL,
	`transactions_paypal_address` VARCHAR(200),
	PRIMARY KEY (`transactions_id`),
	KEY `transactions_ORDER`(`transactions_date`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- transactions_saldo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `transactions_saldo`;


CREATE TABLE `transactions_saldo`
(
	`transactions_saldo_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`transactions_tracks_id` INTEGER(11)  NOT NULL,
	`profiles_id` INTEGER(11),
	`transactions_saldo_value` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`transactions_saldo_id`),
	KEY `fk_ts_transactions_tracks_id`(`transactions_tracks_id`),
	KEY `fk_ts_profies_id`(`profiles_id`),
	CONSTRAINT `transactions_saldo_FK_1`
		FOREIGN KEY (`transactions_tracks_id`)
		REFERENCES `transactions_tracks` (`transactions_tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `transactions_saldo_FK_2`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- transactions_tracks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `transactions_tracks`;


CREATE TABLE `transactions_tracks`
(
	`transactions_tracks_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`transactions_id` INTEGER(11)  NOT NULL,
	`tracks_id` INTEGER(11)  NOT NULL,
	`tracks_path` VARCHAR(32)  NOT NULL,
	PRIMARY KEY (`transactions_tracks_id`),
	UNIQUE KEY `transactions_tracks_U_1` (`tracks_path`),
	KEY `fk_tt_transactions_id`(`transactions_id`),
	KEY `fk_tt_tracks_id`(`tracks_id`),
	CONSTRAINT `transactions_tracks_FK_1`
		FOREIGN KEY (`transactions_id`)
		REFERENCES `transactions` (`transactions_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `transactions_tracks_FK_2`
		FOREIGN KEY (`tracks_id`)
		REFERENCES `tracks` (`tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- transactions_tracks_downloads
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `transactions_tracks_downloads`;


CREATE TABLE `transactions_tracks_downloads`
(
	`transactions_tracks_downloads_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`transactions_tracks_id` INTEGER(11)  NOT NULL,
	`transactions_tracks_downloads_date` DATETIME  NOT NULL,
	PRIMARY KEY (`transactions_tracks_downloads_id`),
	KEY `fk_ttd_transactions_tracks_id`(`transactions_tracks_id`),
	KEY `transactions_tracks_downloads_ORDER`(`transactions_tracks_downloads_date`),
	CONSTRAINT `transactions_tracks_downloads_FK_1`
		FOREIGN KEY (`transactions_tracks_id`)
		REFERENCES `transactions_tracks` (`transactions_tracks_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- withdraws
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `withdraws`;


CREATE TABLE `withdraws`
(
	`withdraws_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`profiles_id` INTEGER(11)  NOT NULL,
	`withdraws_paypal_address` VARCHAR(200)  NOT NULL,
	`withdraws_date` DATETIME  NOT NULL,
	`withdraws_saldo_value` INTEGER(11)  NOT NULL,
	`withdraws_status` SMALLINT(6) default 0 NOT NULL,
	PRIMARY KEY (`withdraws_id`),
	KEY `fk_w_profiles_id`(`profiles_id`),
	KEY `withdraws_WHERE_ORDER`(`withdraws_status`, `withdraws_date`),
	CONSTRAINT `withdraws_FK_1`
		FOREIGN KEY (`profiles_id`)
		REFERENCES `profiles` (`profiles_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
