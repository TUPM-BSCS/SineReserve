-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2015 at 12:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sinereserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `rev_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `review` text,
  `user_rating` int(11) DEFAULT NULL,
  `mov_id` int(11) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`rev_id`),
  KEY `mov_id` (`mov_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rev_id`, `title`, `review`, `user_rating`, `mov_id`, `username`) VALUES
(1, 'Lorem Ipsum the Movie is so Consectetur', 'This movie is so Lorem Ipsum dolor sit amet, the cast was portrayed consectetur adipiscing elit very much. The story was Nunc nec magna non orci lobortis cursus.', 5, 3, 'DarkKnight07'),
(2, 'Lorem Ipsum is Consectetur but...', 'This movie is so Lorem Ipsum dolor sit amet, the cast was portrayed consectetur adipiscing elit very much. The story was Nunc nec magna non orci lobortis cursus.', 4, 3, 'TheDigsters');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
