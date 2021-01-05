-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 03:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `introibo`
--

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) NOT NULL,
  `Source` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Category` text NOT NULL,
  `Description` text NOT NULL,
  `Posting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `Source`, `URL`, `Category`, `Description`, `Posting`) VALUES
(1, 'New Advent', 'https://www.newadvent.org/', 'Reference', 'New Advent is a one-stop site for Catholic news, an online Bible, resources on the Church Fathers, and much more.', '2020-10-19'),
(2, 'Hillbilly Thomists', 'https://www.dominicanajournal.org/music/the-hillbilly-thomists/', 'Fun', 'The Hillbilly Thomists are a Dominican bluegrass group based in Washington, D.C. They have played for several years before releasing their first album in 2017.', '2020-10-21'),
(3, 'Latin Mass Directory', 'https://www.latinmassdir.org/', 'Reference', 'Looking for a Latin Mass? The Latin Mass Directory will help you find Latin Masses all over the world!', '2020-11-05'),
(4, 'ChurchPop', 'https://www.churchpop.com/', 'Fun', 'ChurchPop includes a wide variety of fun, exciting ways to learn about Catholicism', '2020-12-04'),
(5, 'OPChant', 'https://www.youtube.com/channel/UCR4myAMEoTjCu2WVBcuXKSg', 'Videos', '<p>OPChant is a Dominican-run YouTube channel that features lots of demonstrations of Gregorian Chant. They also feature samples from the Dominican Rite of the Mass.</p>\r\n\r\n<p><iframe align=\"middle\" frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed?listType=playlist&amp;list=UUR4myAMEoTjCu2WVBcuXKSg\" width=\"560\"></iframe></p>\r\n', '2020-12-19'),
(6, 'Historical Recreation of a 15th-Century Mass', 'https://youtu.be/UTSJ7LqZLYQ', 'Videos', '<p>Ever wonder what the Mass looked like hundreds of years ago? Wonder no more! This recreation was filmed to give viewers an idea of what the Mass looked like on October 4, 1450, the Eighteenth Sunday after Pentecost.</p>\r\n\r\n<p><iframe align=\"middle\" frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube-nocookie.com/embed/UTSJ7LqZLYQ\" width=\"560\"></iframe></p>\r\n', '2020-12-22'),
(7, 'Tumblar House', 'https://www.tumblarhouse.com/', 'Books', '<p>Tumblar House is a Catholic publishing company dedicated to evangelizing through good literature. With both fiction and non-fiction categories, they feature classic authors such as Hilarie Belloc and J. R. R. Tolkien as well as more modern names like Charles A. Coulombe and Solange Hertz.</p>\r\n\r\n<p>(As an aside, the webmaster highly recommends William L. Biersach&rsquo;s&nbsp;<em>Father Baptist</em>&nbsp;mystery series.)</p>\r\n', '2020-12-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
