/*
SQLyog Community v12.14 (64 bit)
MySQL - 5.6.25 : Database - SineReserve
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`SineReserve` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `SineReserve`;

/*Table structure for table `actor` */

DROP TABLE IF EXISTS `actor`;

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL AUTO_INCREMENT,
  `actor_name` varchar(30) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`actor_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `actor` */

insert  into `actor`(`actor_id`,`actor_name`,`mov_id`) values 
(1,'Anna Kendrick',1),
(2,'Skylar Astin',1),
(3,'Ben Platt',1),
(4,'Brittany Snow',1),
(5,'Adrian Quinton',2),
(6,'Colin Firth',2),
(7,'Mark Strong',2),
(8,'Jonno Davis',2),
(9,'Anna Kendrick',3),
(10,'Skylar Astin',3),
(11,'Ben Platt',3),
(12,'Brittany Snow',3),
(13,'Marc Abaya',4),
(14,'Arthur Acuña',4),
(15,'Archie Alemania',4),
(16,'Alvin Anson',4);

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL DEFAULT '',
  `admin_password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`admin_id`,`admin_password`) values 
('admin','12345');

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `bran_id` int(11) NOT NULL AUTO_INCREMENT,
  `bran_name` varchar(20) DEFAULT NULL,
  `bran_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `branch` */

insert  into `branch`(`bran_id`,`bran_name`,`bran_address`) values 
(1,'Sine Manila','Ermita, Manila');

/*Table structure for table `card` */

DROP TABLE IF EXISTS `card`;

CREATE TABLE `card` (
  `card_no` varchar(10) NOT NULL DEFAULT '',
  `card_pin` varchar(4) DEFAULT NULL,
  `card_points` decimal(9,4) DEFAULT NULL,
  PRIMARY KEY (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `card` */

insert  into `card`(`card_no`,`card_pin`,`card_points`) values 
('1587349320','1234','1007.0000'),
('1728274500','3820','750.0000'),
('1790275010','9203','898.0000'),
('2169227550','8493','999.0000'),
('2212823040','1234','2532.0000'),
('4175534050','3023','7777.0000'),
('4205903750','9043','820.0000'),
('4248623970','3292','1500.0000'),
('7788201180','8932','690.0000'),
('8521468010','3823','690.0000'),
('9875840250','4830','1039.0000');

/*Table structure for table `cinema` */

DROP TABLE IF EXISTS `cinema`;

CREATE TABLE `cinema` (
  `cine_id` int(11) NOT NULL AUTO_INCREMENT,
  `cine_name` varchar(10) DEFAULT NULL,
  `bran_id` int(11) DEFAULT NULL,
  `cine_slots` int(11) DEFAULT NULL,
  PRIMARY KEY (`cine_id`),
  KEY `bran_id` (`bran_id`),
  CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`bran_id`) REFERENCES `branch` (`bran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `cinema` */

insert  into `cinema`(`cine_id`,`cine_name`,`bran_id`,`cine_slots`) values 
(1,'Cinema 1',1,220),
(2,'Cinema 2',1,240),
(3,'Cinema 3',1,260),
(4,'Cinema 4',1,280),
(5,'Cinema 5',1,300);

/*Table structure for table `genre` */

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(20) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`genre_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `genre` */

insert  into `genre`(`genre_id`,`genre_name`,`mov_id`) values 
(1,'Comedy',1),
(2,'Music',1),
(3,'Romance',1),
(4,'Action',2),
(5,'Adventure',2),
(6,'Comedy',2),
(7,'Director',2),
(8,'Comedy',3),
(9,'Music',3),
(10,'Romance',3),
(11,'Action',4),
(12,'History',4);

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `mov_id` int(11) NOT NULL AUTO_INCREMENT,
  `mov_name` varchar(50) DEFAULT NULL,
  `mov_plot` text,
  `mov_rating` varchar(5) DEFAULT NULL,
  `mov_running_time` varchar(10) DEFAULT NULL,
  `mov_release_date` date DEFAULT NULL,
  `mov_poster_img` text,
  `mov_trailer` text,
  `mov_color` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `movie` */

insert  into `movie`(`mov_id`,`mov_name`,`mov_plot`,`mov_rating`,`mov_running_time`,`mov_release_date`,`mov_poster_img`,`mov_trailer`,`mov_color`) values 
(1,'Pitch Perfect','Beca, a freshman at Barden University, is cajoled into joining The Bellas, her school\'s all-girls singing group. Injecting some much needed energy into their repertoire, The Bellas take on their male rivals in a campus competition.','7.2','112 min','2012-10-05','assets/images/posters/1.jpg','https://www.youtube.com/embed/8dItOM6eYXY?iv_load_policy=3','DCD514'),
(2,'Kingsman: The Secret Service','A spy organization recruits an unrefined, but promising street kid into the agency\'s ultra-competitive training program, just as a global threat emerges from a twisted tech genius.','7.8','129 min','2015-02-13','assets/images/posters/2.jpg','https://www.youtube.com/embed/kl8F-8tR8to?iv_load_policy=3','A33624'),
(3,'Pitch Perfect 2','After a humiliating command performance at Lincoln Center, the Barden Bellas enter an international competition that no American group has ever won in order to regain their status and right to perform.','6.6','115 min','2015-05-15','assets/images/posters/3.jpg','https://www.youtube.com/embed/KBwOYQd21TY?iv_load_policy=3','B8B659'),
(4,'Heneral Luna','A Filipino general who believes he can turn the tide of battle in the Philippine-American war. But little does he know that he faces a greatest threat to the country\'s revolution against the invading Americans.','8.9','118 min','2015-09-09','assets/images/posters/4.jpg','https://www.youtube.com/embed/I_T1ykhy3Fg?iv_load_policy=3','825430');

/*Table structure for table `promo_and_event` */

DROP TABLE IF EXISTS `promo_and_event`;

CREATE TABLE `promo_and_event` (
  `prom_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_title` varchar(20) DEFAULT NULL,
  `prom_banner` text,
  `prom_start_date` date DEFAULT NULL,
  `prom_end_date` date DEFAULT NULL,
  PRIMARY KEY (`prom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `promo_and_event` */

insert  into `promo_and_event`(`prom_id`,`prom_title`,`prom_banner`,`prom_start_date`,`prom_end_date`) values 
(1,'A February Promo','assets/images/pande/febpromo.jpg','2015-02-01','2015-02-28'),
(2,'Another February Pro','assets/images/pande/anotherfebpromo.jpg','2015-02-01','2015-02-28'),
(3,'A February Event','assets/images/pande/febevent.jpg','2015-02-01','2015-02-28');

/*Table structure for table `promo_in_branch` */

DROP TABLE IF EXISTS `promo_in_branch`;

CREATE TABLE `promo_in_branch` (
  `prob_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_id` int(11) DEFAULT NULL,
  `bran_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prob_id`),
  KEY `prom_id` (`prom_id`),
  KEY `bran_id` (`bran_id`),
  CONSTRAINT `promo_in_branch_ibfk_1` FOREIGN KEY (`prom_id`) REFERENCES `promo_and_event` (`prom_id`),
  CONSTRAINT `promo_in_branch_ibfk_2` FOREIGN KEY (`bran_id`) REFERENCES `branch` (`bran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `promo_in_branch` */

insert  into `promo_in_branch`(`prob_id`,`prom_id`,`bran_id`) values 
(1,1,1),
(2,2,1),
(3,3,1);

/*Table structure for table `reserved_by` */

DROP TABLE IF EXISTS `reserved_by`;

CREATE TABLE `reserved_by` (
  `or_no` varchar(10) NOT NULL,
  `or_date` date DEFAULT NULL,
  `sched_id` int(11) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`or_no`),
  KEY `sched_id` (`sched_id`),
  KEY `username` (`username`),
  CONSTRAINT `reserved_by_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `shows` (`sched_id`),
  CONSTRAINT `reserved_by_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reserved_by` */

insert  into `reserved_by`(`or_no`,`or_date`,`sched_id`,`username`) values 
('5nhwle7du2','2015-03-01',2,'MichelleAnn07'),
('HmTfJtnvJL','2015-02-01',1,'RaymarB-boy');

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `review` text,
  `user_rating` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rev_id`),
  KEY `username` (`username`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `review` */

insert  into `review`(`rev_id`,`title`,`review`,`user_rating`,`review_date`,`username`,`mov_id`) values 
(1,'BeChloe is life <3','I just watched this movie, and it is really fantastic, the story is good and the way they act is kinda natural, which gives the movie a relateable feel. I really loved the bathroom scene where they sang titanium because there\'s something in the way Beca and Chloe looks at each other. OMG! This is a must watch movie, for those who love romantic musical movies with a hint of comedy, this movie is highly recommended.',5,'2013-10-04','MichelleAnn07',1);

/*Table structure for table `screenshots` */

DROP TABLE IF EXISTS `screenshots`;

CREATE TABLE `screenshots` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_details` varchar(30) DEFAULT NULL,
  `sc_img` text,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sc_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `screenshots_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `screenshots` */

insert  into `screenshots`(`sc_id`,`sc_details`,`sc_img`,`mov_id`) values 
(1,'The bathroom scene','assets/images/screenshots/pitch_perfect_1.jpg',1),
(2,'Treblemakers in riff-off','assets/images/screenshots/pitch_perfect_2.jpg',1),
(3,'Barden Bellas performance','assets/images/screenshots/pitch_perfect_3.jpg',1),
(4,'Galahad pointing a gun','assets/images/screenshots/kingsman_1.jpg',2),
(5,'Galahad and Egzy walking','assets/images/screenshots/kingsman_2.jpg',2),
(6,'Samuel Jackson being awesome','assets/images/screenshots/kingsman_3.jpg',2),
(7,'You\'re physically flawless','assets/images/screenshots/pitch_perfect_2_1.jpg',3),
(8,'John and Gail','assets/images/screenshots/pitch_perfect_2_2.jpg',3),
(9,'The Tone Hangers','assets/images/screenshots/pitch_perfect_2_3.jpg',3),
(10,'MGA TAKSIIIIILLL!','assets/images/screenshots/heneral_luna_1.jpg',4),
(11,'MGA DUWAAAAAAAGG!','assets/images/screenshots/heneral_luna_2.jpg',4),
(12,'Nagalaw pa ba yan?','assets/images/screenshots/heneral_luna_3.jpg',4);

/*Table structure for table `shows` */

DROP TABLE IF EXISTS `shows`;

CREATE TABLE `shows` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `show_date` date DEFAULT NULL,
  `slots_avail` int(11) DEFAULT NULL,
  `cost` decimal(9,4) DEFAULT NULL,
  `cine_id` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  `date_posted` date DEFAULT NULL,
  PRIMARY KEY (`sched_id`),
  KEY `cine_id` (`cine_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`cine_id`) REFERENCES `cinema` (`cine_id`),
  CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `shows` */

insert  into `shows`(`sched_id`,`start_time`,`end_time`,`show_date`,`slots_avail`,`cost`,`cine_id`,`mov_id`,`date_posted`) values 
(1,'01:00:00','03:10:00','2015-02-14',280,'250.0000',4,2,'2015-01-01'),
(2,'12:00:00','02:00:00','2015-05-16',260,'250.0000',3,3,'2015-03-01');

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
  `address` varchar(255) DEFAULT NULL,
  `card_no` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `card_no` (`card_no`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`card_no`) REFERENCES `card` (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`PASSWORD`,`email`,`lname`,`fname`,`minit`,`sex`,`birthdate`,`address`,`card_no`) values 
('AnnaKendrick47','bechloe','annakendrunk@gmail.com','Kendrick','Anna','S.','F','1985-08-09','Portland, USA','1587349320'),
('bsnowhuh','islife','bsnowie@gmail.com','Snow','Brittany','K.','F','1986-05-09','Los Angeles, USA','1728274500'),
('DannyBoy','win10','danfalcon@yahoo.com','Falcon','Dan Kristopher','L.','M','1996-02-29','Caloocan City, Philippines','4205903750'),
('janrenz01','lmao','renzodigman@gmail.com','Digman','Renzo Jan','M.','M','1996-07-04','Pasig City, Philippines','4175534050'),
('MichelleAnn07','yass','mendozamichelleann@yahoo.com','Mendoza','Michelle Ann','B.','F','1995-10-04','Tondo, Manila, Philippines','1790275010'),
('RaymarB-boy','guhehe69','raymarmonte@gmail.com','Monte','Raymar','V.','Z','1996-09-06','San Pedro, Laguna, Philippines','2169227550'),
('renzoralph07','secret','renzopua@gmail.com','Pua','Renzo Ralph','M.','M','1996-04-15','Bulacan,Philippines','2212823040'),
('WalterWhite','yosup','jannwalter@gmail.com','Pura','Walter Jann','B.','M','1996-06-30','Fairview, Quezon City, Philippines','4248623970');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
