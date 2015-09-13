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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `branch` */

insert  into `branch`(`bran_id`,`bran_name`,`bran_add`) values (1,'Sine Manila','Ermita, Manila'),(2,'Sine Makati','Gil Puyat Ave., Makati'),(3,'Sine Laguna','San Pedro, Laguna');

/*Table structure for table `card` */

DROP TABLE IF EXISTS `card`;

CREATE TABLE `card` (
  `card_no` varchar(10) NOT NULL DEFAULT '',
  `card_pin` varchar(4) DEFAULT NULL,
  `card_points` decimal(9,4) DEFAULT NULL,
  PRIMARY KEY (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `card` */

insert  into `card`(`card_no`,`card_pin`,`card_points`) values ('1587349320','1234','1007.0000'),('1728274500','3820','750.0000'),('1790275010','9203','898.0000'),('2169227550','8493','999.0000'),('2212823040','1234','2532.0000'),('4175534050','3023','7777.0000'),('4205903750','9043','820.0000'),('4248623970','3292','1500.0000'),('7788201180','8932','500.0000'),('8521468010','3823','690.0000'),('9875840250','4830','1039.0000');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `cinema` */

insert  into `cinema`(`cine_id`,`cine_name`,`lb_slots`,`ub_slots`,`bran_id`) values (1,'Cinema 1',340,340,1),(2,'Cinema 2',340,340,1),(3,'Cinema 3',360,360,1),(4,'Cinema 4',300,320,1),(5,'Cinema 5',280,250,1),(6,'Cinema 6',380,350,1),(7,'Cinema 7',500,500,1),(8,'Cinema 8',280,300,1),(9,'Cinema 9',370,370,1),(10,'Cinema 10',400,400,1),(11,'Cinema 1',280,280,2),(12,'Cinema 2',340,340,2),(13,'Cinema 3 ',200,200,2),(14,'Cinema 4',300,300,2),(15,'Cinema 5',350,350,2),(16,'Cinema 6',330,330,2),(17,'Cinema 7',500,500,2),(18,'Cinema 8',280,280,2),(19,'Cinema 9',390,390,2),(20,'Cinema 10',410,410,2),(21,'Cinema 11',400,400,2),(22,'Cinema 12',330,330,2),(23,'Cinema 1',220,220,3),(24,'Cinema 2',450,450,3),(25,'Cinema 3',300,300,3),(26,'Cinema 4',310,310,3),(27,'Cinema 5',300,300,3);

/*Table structure for table `movie` */

DROP TABLE IF EXISTS `movie`;

CREATE TABLE `movie` (
  `mov_id` int(11) NOT NULL AUTO_INCREMENT,
  `mov_name` varchar(20) DEFAULT NULL,
  `mov_desc` text,
  `mov_rating` varchar(5) DEFAULT NULL,
  `mov_cost` decimal(9,4) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  PRIMARY KEY (`mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `movie` */

insert  into `movie`(`mov_id`,`mov_name`,`mov_desc`,`mov_rating`,`mov_cost`,`release_date`) values (3,'Pitch Perfecy','The Barden Bellas are a collegiate, all-girls a cappella singing group thriving on female pop songs and their perfect looks. After a disastrous failing at last year\'s finals, they are forced to regroup. Among the new recruits is freshman Beca, an independent, aspiring DJ with no interest in the college life. But after she meets Jesse, from the rival all-male a cappella group, Beca has a new outlook and takes it upon herself to help the Bellas find their new look and sound and get back into the competition.','PG-13','205.0000','2014-09-28'),(4,'Pitch Perfect 2','The Bellas are back, and they are better than ever. After being humiliated in front of none other than the President of the United States of America, the Bellas are taken out of the Aca-Circuit. In order to clear their name and regain their status, the Bellas take on a seemingly impossible task: winning an International competition no American team has ever won. In order to accomplish this monumental task, they need to strengthen the bonds of friendship and sisterhood, and blow away the competition with their amazing aca-magic! With all new friends and old rivals tagging along for the trip, the Bellas can hopefully accomplish their dreams once again.','PG-13','205.0000','2015-05-15'),(5,'Kingsman: The Secret','Based upon the acclaimed comic book and directed by Matthew Vaughn, Kingsman: The Secret Service tells the story of a super-secret spy organization that recruits an unrefined but promising street kid into the agency\'s ultra-competitive training program just as a global threat emerges from a twisted tech genius.','R','205.0000','2015-02-13'),(6,'21 Jump Street','In high school, Schmidt (Jonah Hill) was a dork and Jenko (Channing Tatum) was the popular jock. After graduation, both of them joined the police force and ended up as partners riding bicycles in the city park. Since they are young and look like high school students, they are assigned to an undercover unit to infiltrate a drug ring that is supplying high school students synthetic drugs.','R','195.0000','2012-03-16'),(7,'22 Jump Street','After making their way through high school (twice), big changes are in store for officers Schmidt (Jonah Hill) and Jenko (Channing Tatum) when they go deep undercover at a local college. But when Jenko meets a kindred spirit on the football team, and Schmidt infiltrates the bohemian art major scene, they begin to question their partnership. Now they don\'t have to just crack the case - they have to figure out if they can have a mature relationship. If these two overgrown adolescents can grow from freshmen into real men, college might be the best thing that ever happened to them.','R','195.0000','2014-06-13');

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
  `card_no` varchar(10) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `card_no` (`card_no`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`card_no`) REFERENCES `card` (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`password`,`email`,`lname`,`fname`,`minit`,`sex`,`birthdate`,`address`,`card_no`) values ('AnnaKendrick47','bechloe','annakendrunk@gm','Kendrick','Anna','S.','F','1985-08-09','Portland, USA','1587349320'),('bsnowhuh','islife','bsnowie@gmail.c','Snow','Brittany','K.','F','1986-05-09','Los Angeles, USA','1728274500'),('DannyBoy','win10','danfalcon@yahoo','Falcon','Dan Kristopher','L.','M','1996-02-29','Caloocan City, Philippines','4205903750'),('DarkKnight07','secret','renzopua@gmail.','Pua','Renzo Ralph','M.','M','1996-04-15','Bulacan,Philippines','2212823040'),('MichelleAnn07','yass','mendozamichelle','Mendoza','Michelle Ann','B.','F','1995-10-04','Tondo, Manila, Philippines','1790275010'),('RaymarB-boy','guhehe69','raymarmonte@gma','Monte','Raymar','V.','M','1996-09-06','San Pedro, Laguna, Philippines','2169227550'),('TheDigsters','lmao','renzodigman@gma','Digman','Renzo Jan','M.','M','1996-07-04','Pasig City, Philippines','4175534050'),('WalterWhite','yosup','jannwalter@gmai','Pura','Walter Jann','B.','M.','1996-06-30','Fairview, Quezon City, Philippines','4248623970');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
