/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.6.24 : Database - sinereserve
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sinereserve` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sinereserve`;

/*Table structure for table `actor` */

DROP TABLE IF EXISTS `actor`;

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL DEFAULT '0',
  `actor_lname` varchar(20) DEFAULT NULL,
  `actor_fname` varchar(20) DEFAULT NULL,
  `actor_minit` varchar(5) DEFAULT NULL,
  `actor_sex` varchar(2) DEFAULT NULL,
  `actor_birthdate` date DEFAULT NULL,
  `actor_photo` text,
  PRIMARY KEY (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `actor` */

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL DEFAULT '',
  `admin_password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `bran_id` int(11) NOT NULL DEFAULT '0',
  `bran_name` varchar(20) DEFAULT NULL,
  `bran_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `branch` */

/*Table structure for table `card` */

DROP TABLE IF EXISTS `card`;

CREATE TABLE `card` (
  `card_no` varchar(10) NOT NULL DEFAULT '',
  `card_pin` varchar(4) DEFAULT NULL,
  `card_points` decimal(9,4) DEFAULT NULL,
  PRIMARY KEY (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `card` */

/*Table structure for table `cast` */

DROP TABLE IF EXISTS `cast`;

CREATE TABLE `cast` (
  `cast_id` int(11) NOT NULL DEFAULT '0',
  `cast_role` varchar(30) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cast_id`),
  KEY `actor_id` (`actor_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `cast_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`),
  CONSTRAINT `cast_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cast` */

/*Table structure for table `cinema` */

DROP TABLE IF EXISTS `cinema`;

CREATE TABLE `cinema` (
  `cine_id` int(11) NOT NULL DEFAULT '0',
  `cine_name` varchar(10) DEFAULT NULL,
  `bran_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cine_id`),
  KEY `bran_id` (`bran_id`),
  CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`bran_id`) REFERENCES `branch` (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cinema` */

/*Table structure for table `genre` */

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL DEFAULT '0',
  `genre_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `genre` */

/*Table structure for table `genre_of_movie` */

DROP TABLE IF EXISTS `genre_of_movie`;

CREATE TABLE `genre_of_movie` (
  `gm_id` int(11) NOT NULL DEFAULT '0',
  `genre_id` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`gm_id`),
  KEY `genre_id` (`genre_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `genre_of_movie_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`),
  CONSTRAINT `genre_of_movie_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `genre_of_movie` */

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL DEFAULT '0',
  `log_descp` text,
  `log_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `logs` */

/*Table structure for table `movie` */

DROP TABLE IF EXISTS `movie`;

CREATE TABLE `movie` (
  `mov_id` int(11) NOT NULL DEFAULT '0',
  `mov_name` varchar(50) DEFAULT NULL,
  `mov_plot` text,
  `mov_rating` varchar(5) DEFAULT NULL,
  `mov_running_time` time DEFAULT NULL,
  `mov_release_date` date DEFAULT NULL,
  `mov_poster` text,
  `mov_trailer` text,
  PRIMARY KEY (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `movie` */

/*Table structure for table `promo_and_event` */

DROP TABLE IF EXISTS `promo_and_event`;

CREATE TABLE `promo_and_event` (
  `prom_id` int(11) NOT NULL DEFAULT '0',
  `prom_title` varchar(20) DEFAULT NULL,
  `prom_banner` text,
  PRIMARY KEY (`prom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `promo_and_event` */

/*Table structure for table `promo_in_branch` */

DROP TABLE IF EXISTS `promo_in_branch`;

CREATE TABLE `promo_in_branch` (
  `prob_id` int(11) NOT NULL DEFAULT '0',
  `prom_id` int(11) DEFAULT NULL,
  `bran_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prob_id`),
  KEY `prom_id` (`prom_id`),
  KEY `bran_id` (`bran_id`),
  CONSTRAINT `promo_in_branch_ibfk_1` FOREIGN KEY (`prom_id`) REFERENCES `promo_and_event` (`prom_id`),
  CONSTRAINT `promo_in_branch_ibfk_2` FOREIGN KEY (`bran_id`) REFERENCES `branch` (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `promo_in_branch` */

/*Table structure for table `reserved_by` */

DROP TABLE IF EXISTS `reserved_by`;

CREATE TABLE `reserved_by` (
  `or_no` varchar(10) NOT NULL DEFAULT '',
  `or_date` date DEFAULT NULL,
  `sched_id` int(11) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`or_no`),
  KEY `sched_id` (`sched_id`),
  KEY `username` (`username`),
  KEY `seat_id` (`seat_id`),
  CONSTRAINT `reserved_by_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `shows` (`sched_id`),
  CONSTRAINT `reserved_by_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  CONSTRAINT `reserved_by_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reserved_by` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(20) DEFAULT NULL,
  `review` text,
  `user_rating` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rev_id`),
  KEY `username` (`username`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `review` */

/*Table structure for table `screenshots` */

DROP TABLE IF EXISTS `screenshots`;

CREATE TABLE `screenshots` (
  `sc_id` int(11) NOT NULL DEFAULT '0',
  `sc_details` varchar(30) DEFAULT NULL,
  `sc_url` text,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sc_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `screenshots_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `screenshots` */

/*Table structure for table `seat` */

DROP TABLE IF EXISTS `seat`;

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL DEFAULT '0',
  `seat_no` int(11) DEFAULT NULL,
  `seat_type` varchar(2) DEFAULT NULL,
  `cine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`seat_id`),
  KEY `cine_id` (`cine_id`),
  CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`cine_id`) REFERENCES `cinema` (`cine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `seat` */

/*Table structure for table `shows` */

DROP TABLE IF EXISTS `shows`;

CREATE TABLE `shows` (
  `sched_id` int(11) NOT NULL DEFAULT '0',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `slots_avail` int(11) DEFAULT NULL,
  `cost` decimal(9,4) DEFAULT NULL,
  `cine_id` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sched_id`),
  KEY `cine_id` (`cine_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`cine_id`) REFERENCES `cinema` (`cine_id`),
  CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shows` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL DEFAULT '',
  `PASSWORD` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `fname` varchar(15) DEFAULT NULL,
  `minit` varchar(5) DEFAULT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `card_no` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `card_no` (`card_no`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`card_no`) REFERENCES `card` (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
