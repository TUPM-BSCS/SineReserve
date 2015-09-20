-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2015 at 08:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sinereserve`
--
CREATE DATABASE IF NOT EXISTS `sinereserve` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sinereserve`;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE IF NOT EXISTS `actor` (
  `actor_id` int(11) NOT NULL DEFAULT '0',
  `actor_lname` varchar(20) DEFAULT NULL,
  `actor_fname` varchar(20) DEFAULT NULL,
  `actor_minit` varchar(5) DEFAULT NULL,
  `actor_sex` varchar(2) DEFAULT NULL,
  `actor_birthdate` date DEFAULT NULL,
  `actor_photo` text,
  PRIMARY KEY (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `actor_lname`, `actor_fname`, `actor_minit`, `actor_sex`, `actor_birthdate`, `actor_photo`) VALUES
(1, 'Kendrick', 'Anna', 'C', 'F', '1985-08-09', 'assets/images/actors/anna_kendrick.jpg'),
(2, 'Astin', 'Skylar', NULL, 'M', '1987-09-23', 'assets/images/actors/skylar_astin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(10) NOT NULL DEFAULT '',
  `admin_password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `bran_id` int(11) NOT NULL DEFAULT '0',
  `bran_name` varchar(20) DEFAULT NULL,
  `bran_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bran_id`, `bran_name`, `bran_address`) VALUES
(1, 'Sine Manila', 'Ermita, Manila'),
(2, 'Sine Makati', 'Gil Puyat Ave., Makati'),
(3, 'Sine Laguna', 'San Pedro, Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `card_no` varchar(10) NOT NULL DEFAULT '',
  `card_pin` varchar(4) DEFAULT NULL,
  `card_points` decimal(9,4) DEFAULT NULL,
  PRIMARY KEY (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_no`, `card_pin`, `card_points`) VALUES
('1587349320', '1234', '1007.0000'),
('1728274500', '3820', '750.0000'),
('1790275010', '9203', '898.0000'),
('2169227550', '8493', '999.0000'),
('2212823040', '1234', '2532.0000'),
('4175534050', '3023', '7777.0000'),
('4205903750', '9043', '820.0000'),
('4248623970', '3292', '1500.0000'),
('7788201180', '8932', '500.0000'),
('8521468010', '3823', '690.0000'),
('9875840250', '4830', '1039.0000');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE IF NOT EXISTS `cast` (
  `cast_id` int(11) NOT NULL DEFAULT '0',
  `cast_role` varchar(30) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cast_id`),
  KEY `actor_id` (`actor_id`),
  KEY `mov_id` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`cast_id`, `cast_role`, `actor_id`, `mov_id`) VALUES
(1, 'Beca', 1, 3),
(2, 'Jesse', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `cine_id` int(11) NOT NULL DEFAULT '0',
  `cine_name` varchar(10) DEFAULT NULL,
  `bran_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cine_id`),
  KEY `bran_id` (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cine_id`, `cine_name`, `bran_id`) VALUES
(1, 'Cinema 1', 1),
(2, 'Cinema 2', 1),
(3, 'Cinema 3', 1),
(4, 'Cinema 4', 1),
(5, 'Cinema 5', 1),
(6, 'Cinema 6', 1),
(7, 'Cinema 7', 1),
(8, 'Cinema 8', 1),
(9, 'Cinema 9', 1),
(10, 'Cinema 10', 1),
(11, 'Cinema 1', 2),
(12, 'Cinema 2', 2),
(13, 'Cinema 3 ', 2),
(14, 'Cinema 4', 2),
(15, 'Cinema 5', 2),
(16, 'Cinema 6', 2),
(17, 'Cinema 7', 2),
(18, 'Cinema 8', 2),
(19, 'Cinema 9', 2),
(20, 'Cinema 10', 2),
(21, 'Cinema 11', 2),
(22, 'Cinema 12', 2),
(23, 'Cinema 1', 3),
(24, 'Cinema 2', 3),
(25, 'Cinema 3', 3),
(26, 'Cinema 4', 3),
(27, 'Cinema 5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(11) NOT NULL DEFAULT '0',
  `genre_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Crime and Gangster'),
(5, 'Drama'),
(6, 'Historical'),
(7, 'Horror'),
(8, 'Musical'),
(9, 'Romance'),
(10, 'Science Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `genre_of_movie`
--

CREATE TABLE IF NOT EXISTS `genre_of_movie` (
  `gm_id` int(11) NOT NULL DEFAULT '0',
  `genre_id` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`gm_id`),
  KEY `genre_id` (`genre_id`),
  KEY `mov_id` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_of_movie`
--

INSERT INTO `genre_of_movie` (`gm_id`, `genre_id`, `mov_id`) VALUES
(1, 3, 3),
(2, 8, 3),
(3, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `log_id` int(11) NOT NULL DEFAULT '0',
  `log_descp` text,
  `log_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
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

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_name`, `mov_plot`, `mov_rating`, `mov_running_time`, `mov_release_date`, `mov_poster`, `mov_trailer`) VALUES
(3, 'Pitch Perfect', 'The Barden Bellas are a collegiate, all-girls a cappella singing group thriving on female pop songs and their perfect looks. After a disastrous failing at last year''s finals, they are forced to regroup. Among the new recruits is freshman Beca, an independent, aspiring DJ with no interest in the college life. But after she meets Jesse, from the rival all-male a cappella group, Beca has a new outlook and takes it upon herself to help the Bellas find their new look and sound and get back into the competition.', 'PG-13', '01:52:00', '2014-09-28', 'assets/images/pitch1.jpg', 'https://www.youtube.com/embed/8dItOM6eYXY?iv_load_policy=3'),
(4, 'Pitch Perfect 2', 'The Bellas are back, and they are better than ever. After being humiliated in front of none other than the President of the United States of America, the Bellas are taken out of the Aca-Circuit. In order to clear their name and regain their status, the Bellas take on a seemingly impossible task: winning an International competition no American team has ever won. In order to accomplish this monumental task, they need to strengthen the bonds of friendship and sisterhood, and blow away the competition with their amazing aca-magic! With all new friends and old rivals tagging along for the trip, the Bellas can hopefully accomplish their dreams once again.', 'PG-13', '01:55:00', '2015-05-15', 'assets/images/pitch2.jpg', 'https://www.youtube.com/embed/1RgKlnG5aQY?iv_load_policy=3'),
(5, 'Kingsman: The Secret', 'Based upon the acclaimed comic book and directed by Matthew Vaughn, Kingsman: The Secret Service tells the story of a super-secret spy organization that recruits an unrefined but promising street kid into the agency''s ultra-competitive training program just as a global threat emerges from a twisted tech genius.', 'R', NULL, '2015-02-13', NULL, NULL),
(6, '21 Jump Street', 'In high school, Schmidt (Jonah Hill) was a dork and Jenko (Channing Tatum) was the popular jock. After graduation, both of them joined the police force and ended up as partners riding bicycles in the city park. Since they are young and look like high school students, they are assigned to an undercover unit to infiltrate a drug ring that is supplying high school students synthetic drugs.', 'R', NULL, '2012-03-16', NULL, NULL),
(7, '22 Jump Street', 'After making their way through high school (twice), big changes are in store for officers Schmidt (Jonah Hill) and Jenko (Channing Tatum) when they go deep undercover at a local college. But when Jenko meets a kindred spirit on the football team, and Schmidt infiltrates the bohemian art major scene, they begin to question their partnership. Now they don''t have to just crack the case - they have to figure out if they can have a mature relationship. If these two overgrown adolescents can grow from freshmen into real men, college might be the best thing that ever happened to them.', 'R', NULL, '2014-06-13', NULL, NULL),
(8, 'Inside Out', 'After young Riley is uprooted from her Midwest life and moved to San Francisco, her emotions - Joy, Fear, Anger, Disgust and Sadness - conflict on how best to navigate a new city, house, and school.', 'PG', NULL, '2015-06-19', NULL, NULL),
(9, 'Pixels', 'When aliens misinterpret video feeds of classic arcade games as a declaration of war, they attack the Earth in the form of the video games.', 'PG-13', NULL, '2015-06-24', NULL, NULL),
(10, 'The Little Ghost', 'The Little Ghost lives in the castle over looking a small town and awakens for precisely one hour after the clock strikes midnight. Follow him on this adventure to see his first sunrise ever!', 'PG', NULL, '2015-09-02', NULL, NULL),
(11, 'No Escape', 'In their new overseas home, an American family soon finds themselves caught in the middle of a coup, and they frantically look for a safe escape in an environment where foreigners are being immediately executed.', 'R', NULL, '2015-08-26', NULL, NULL),
(12, 'Hitman: Agent 47', 'An assassin teams up with a woman to help her find her father and uncover the mysteries of her ancestry.', 'R', NULL, '2015-08-21', NULL, NULL),
(13, 'Star Wars: Episode V', 'A continuation of the saga created by George Lucas set thirty years after Star Wars: Episode VI - Return of the Jedi (1983).', '', NULL, '2015-12-18', NULL, NULL),
(14, 'Maze Runner: The Sco', 'After having escaped the Maze, the Gladers now face a new set of challenges on the open roads of a desolate landscape filled with unimaginable obstacles.', 'PG-13', NULL, '2015-09-18', NULL, NULL),
(15, 'Heneral Luna', 'A Filipino general who believes he can turn the tide of battle in the Philippine-American war. But little does he know that he faces a greatest threat to the country''s revolution against the invading Americans.', NULL, NULL, '2015-09-09', NULL, NULL),
(16, 'Felix Manalo', 'Felix Manalo covers Manalo''s life, particularly his religious journey that culminated in his establishing the Iglesia ni Cristo, which he registered with the Philippine government on 27 July 1914. The film will also depict the origins of the church during the American Occupation, its growth in the Philippines and the church''s struggles before it reached its present stature.', '', NULL, '2015-10-07', NULL, NULL),
(18, 'Suicide Squad', 'A secret government agency recruits imprisoned supervillains to execute dangerous black ops missions in exchange for clemency.', NULL, NULL, '2016-08-05', NULL, NULL),
(19, 'Captain America: Civ', 'An incident leads to the Avengers developing a schism over how to deal with situations, which escalates into an open fight between allies Iron Man and Captain America.', NULL, NULL, '2016-05-06', NULL, NULL),
(20, 'Alice Through The Lo', 'Plot is still unknown.', NULL, NULL, '2016-05-27', NULL, NULL),
(21, 'Finding Dory', 'The friendly-but-forgetful blue tang fish reunites with her loved ones, and everyone learns a few things about the true meaning of family along the way.', NULL, NULL, '2016-06-17', NULL, NULL),
(22, 'Kung Fu Panda 3', 'Continuing his "legendary adventures of awesomeness", Po must face two hugely epic, but different threats: one supernatural and the other a little closer to his home.', NULL, NULL, '2016-01-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo_and_event`
--

CREATE TABLE IF NOT EXISTS `promo_and_event` (
  `prom_id` int(11) NOT NULL DEFAULT '0',
  `prom_title` varchar(20) DEFAULT NULL,
  `prom_banner` text,
  PRIMARY KEY (`prom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo_in_branch`
--

CREATE TABLE IF NOT EXISTS `promo_in_branch` (
  `prob_id` int(11) NOT NULL DEFAULT '0',
  `prom_id` int(11) DEFAULT NULL,
  `bran_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prob_id`),
  KEY `prom_id` (`prom_id`),
  KEY `bran_id` (`bran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserved_by`
--

CREATE TABLE IF NOT EXISTS `reserved_by` (
  `or_no` varchar(10) NOT NULL DEFAULT '',
  `or_date` date DEFAULT NULL,
  `sched_id` int(11) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`or_no`),
  KEY `sched_id` (`sched_id`),
  KEY `username` (`username`),
  KEY `seat_id` (`seat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `rev_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(20) DEFAULT NULL,
  `review` text,
  `user_rating` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rev_id`),
  KEY `username` (`username`),
  KEY `mov_id` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rev_id`, `title`, `review`, `user_rating`, `review_date`, `username`, `mov_id`) VALUES
(1, 'BeChloe is life <3', 'I just watched this movie, and it is really fantastic, the story is good and the way they act is kinda natural, which gives the movie a relateable feel. I really loved the bathroom scene where they sang titanium because there''s something in the way Beca and Chloe looks at each other. OMG! This is a must watch movie, for those who love romantic musical movies with a hint of comedy, this movie is highly recommended.', 5, '2015-09-20', 'MichelleAnn07', 3);

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE IF NOT EXISTS `screenshots` (
  `sc_id` int(11) NOT NULL DEFAULT '0',
  `sc_details` varchar(30) DEFAULT NULL,
  `sc_url` text,
  `mov_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sc_id`),
  KEY `mov_id` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`sc_id`, `sc_details`, `sc_url`, `mov_id`) VALUES
(1, 'The bathroom scene.', 'assets/images/screenshots/pitch_perfect_1.jpg', 3),
(2, 'Treblemakers in riff-off', 'assets/images/screenshots/pitch_perfect_2.jpg', 3),
(3, 'Barden Bellas performance', 'assets/images/screenshots/pitch_perfect_3.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE IF NOT EXISTS `seat` (
  `seat_id` int(11) NOT NULL DEFAULT '0',
  `seat_no` int(11) DEFAULT NULL,
  `seat_type` varchar(2) DEFAULT NULL,
  `cine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`seat_id`),
  KEY `cine_id` (`cine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
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
  KEY `mov_id` (`mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`sched_id`, `start_time`, `end_time`, `date`, `slots_avail`, `cost`, `cine_id`, `mov_id`) VALUES
(111111, '12:00:00', '01:00:00', '2015-09-20', 220, NULL, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
  KEY `card_no` (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `PASSWORD`, `email`, `lname`, `fname`, `minit`, `sex`, `birthdate`, `address`, `card_no`) VALUES
('AnnaKendrick47', 'bechloe', 'annakendrunk@gm', 'Kendrick', 'Anna', 'S.', 'F', '1985-08-09', 'Portland, USA', '1587349320'),
('bsnowhuh', 'islife', 'bsnowie@gmail.c', 'Snow', 'Brittany', 'K.', 'F', '1986-05-09', 'Los Angeles, USA', '1728274500'),
('DannyBoy', 'win10', 'danfalcon@yahoo', 'Falcon', 'Dan Kristopher', 'L.', 'M', '1996-02-29', 'Caloocan City, Philippines', '4205903750'),
('janrenz01', 'lmao', 'renzodigman@gma', 'Digman', 'Renzo Jan', 'M.', 'M', '1996-07-04', 'Pasig City, Philippines', '4175534050'),
('MichelleAnn07', 'yass', 'mendozamichelle', 'Mendoza', 'Michelle Ann', 'B.', 'F', '1995-10-04', 'Tondo, Manila, Philippines', '1790275010'),
('RaymarB-boy', 'guhehe69', 'raymarmonte@gma', 'Monte', 'Raymar', 'V.', 'M', '1996-09-06', 'San Pedro, Laguna, Philippines', '2169227550'),
('renzoralph07', 'secret', 'renzopua@gmail.', 'Pua', 'Renzo Ralph', 'M.', 'M', '1996-04-15', 'Bulacan,Philippines', '2212823040'),
('WalterWhite', 'yosup', 'jannwalter@gmai', 'Pura', 'Walter Jann', 'B.', 'M.', '1996-06-30', 'Fairview, Quezon City, Philippines', '4248623970');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast`
--
ALTER TABLE `cast`
  ADD CONSTRAINT `cast_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`),
  ADD CONSTRAINT `cast_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`bran_id`) REFERENCES `branch` (`bran_id`);

--
-- Constraints for table `genre_of_movie`
--
ALTER TABLE `genre_of_movie`
  ADD CONSTRAINT `genre_of_movie_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`),
  ADD CONSTRAINT `genre_of_movie_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `promo_in_branch`
--
ALTER TABLE `promo_in_branch`
  ADD CONSTRAINT `promo_in_branch_ibfk_1` FOREIGN KEY (`prom_id`) REFERENCES `promo_and_event` (`prom_id`),
  ADD CONSTRAINT `promo_in_branch_ibfk_2` FOREIGN KEY (`bran_id`) REFERENCES `branch` (`bran_id`);

--
-- Constraints for table `reserved_by`
--
ALTER TABLE `reserved_by`
  ADD CONSTRAINT `reserved_by_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `shows` (`sched_id`),
  ADD CONSTRAINT `reserved_by_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `reserved_by_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);

--
-- Constraints for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD CONSTRAINT `screenshots_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`cine_id`) REFERENCES `cinema` (`cine_id`);

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`cine_id`) REFERENCES `cinema` (`cine_id`),
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`card_no`) REFERENCES `card` (`card_no`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
