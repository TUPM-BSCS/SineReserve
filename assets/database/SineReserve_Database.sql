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

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `bran_id` int(11) NOT NULL AUTO_INCREMENT,
  `bran_name` varchar(20) NOT NULL,
  `bran_add` varchar(30) NOT NULL,
  PRIMARY KEY (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `branch` */

/*Table structure for table `cinema` */

DROP TABLE IF EXISTS `cinema`;

CREATE TABLE `cinema` (
  `cine_id` int(11) NOT NULL AUTO_INCREMENT,
  `cine_name` varchar(10) DEFAULT NULL,
  `lb_slots` int(11) DEFAULT NULL,
  `ub_slots` int(11) DEFAULT NULL,
  `bran_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cine_id`),
  KEY `bran_id` (`bran_id`),
  CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`bran_id`) REFERENCES `branch` (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cinema` */

/*Table structure for table `movie` */

DROP TABLE IF EXISTS `movie`;

CREATE TABLE `movie` (
  `mov_id` int(11) NOT NULL AUTO_INCREMENT,
  `mov_name` varchar(20) DEFAULT NULL,
  `mov_desc` text,
  `mov_rating` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `movie` */

/*Table structure for table `reserved_by` */

DROP TABLE IF EXISTS `reserved_by`;

CREATE TABLE `reserved_by` (
  `or_no` varchar(10) NOT NULL DEFAULT '',
  `or_date` date DEFAULT NULL,
  `type_reserved` varchar(10) DEFAULT NULL,
  `sched_id` varchar(10) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`or_no`),
  KEY `sched_id` (`sched_id`),
  KEY `username` (`username`),
  CONSTRAINT `reserved_by_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `shows` (`sched_id`),
  CONSTRAINT `reserved_by_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reserved_by` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL AUTO_INCREMENT,
  `review` text,
  `user_rating` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`rev_id`),
  KEY `mov_id` (`mov_id`),
  KEY `username` (`username`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `review` */

/*Table structure for table `shows` */

DROP TABLE IF EXISTS `shows`;

CREATE TABLE `shows` (
  `sched_id` varchar(10) NOT NULL DEFAULT '',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `seat_type` varchar(10) DEFAULT NULL,
  `lb_slots_avail` int(11) DEFAULT NULL,
  `ub_slots_avail` int(11) DEFAULT NULL,
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
  `password` varchar(15) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `fname` varchar(15) DEFAULT NULL,
  `minit` varchar(5) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
