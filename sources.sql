-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 11:24 PM
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
-- Table structure for table `name_id`
--

CREATE TABLE `name_id` (
  `site_id` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `name_id`
--

INSERT INTO `name_id` (`site_id`, `number`) VALUES
('Project Isidore', 1);

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
(1, 'New Advent', 'https://www.newadvent.org/', 'Reference', '<p>New Advent is a one-stop site for Catholic news, an online Bible, resources on the Church Fathers, and much more.</p>\r\n', '2018-05-21'),
(2, 'Hillbilly Thomists', 'https://www.dominicanajournal.org/music/the-hillbilly-thomists/', 'Fun', '<p>The Hillbilly Thomists are a Dominican bluegrass group based in Washington, D.C. They have played for several years before releasing their first album in 2017.</p>\r\n', '2018-05-21'),
(3, 'Latin Mass Directory', 'https://www.latinmassdir.org/', 'Liturgy', '<p>Looking for a Latin Mass? The Latin Mass Directory will help you find Latin Masses all over the world!</p>\r\n', '2018-05-21'),
(4, 'ChurchPop', 'https://www.churchpop.com/', 'Fun', '<p>ChurchPop includes a wide variety of fun, exciting ways to learn about Catholicism.</p>\r\n', '2018-05-23'),
(5, 'OPChant', 'https://www.youtube.com/channel/UCR4myAMEoTjCu2WVBcuXKSg', 'Videos', '<p>OPChant is a Dominican-run YouTube channel that features lots of demonstrations of Gregorian Chant. They also feature samples from the Dominican Rite of the Mass.</p>\r\n\r\n<p><iframe align=\"middle\" frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed?listType=playlist&amp;list=UUR4myAMEoTjCu2WVBcuXKSg\" width=\"560\"></iframe></p>\r\n', '2020-12-06'),
(6, 'Historical Recreation of a 15th-Century Mass', 'https://youtu.be/UTSJ7LqZLYQ', 'Videos', '<p>Ever wonder what the Mass looked like hundreds of years ago? Wonder no more! This recreation was filmed to give viewers an idea of what the Mass looked like on October 4, 1450, the Eighteenth Sunday after Pentecost.</p>\r\n\r\n<p><iframe align=\"middle\" frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube-nocookie.com/embed/UTSJ7LqZLYQ\" width=\"560\"></iframe></p>\r\n', '2018-07-13'),
(8, 'Thomistic Institute', 'https://thomisticinstitute.org/', 'Reference', '<p>Looking for informative lectures on the Faith? The Thomistic Institute of Washington, D.C. has you covered! Based in the Dominican House of Studies, the Thomistic Institute features a wide variety of lectures and videos covering many different topics. You can even attend some of their lectures via Zoom.</p>\r\n', '2021-04-03'),
(9, 'Clamavi de Profundis', 'https://www.youtube.com/channel/UCC8prZi7q1vnP0A3XX4EWxQ', 'Fun', '<p>Clamavi de Profundis is a musical group that writes and performs original Gregorian Chant as well as covers of Tolkien&rsquo;s poems from&nbsp;<em>The Lord of the Rings</em>. The entire group consists of one family that does the composing, arranging, and album art.</p>\r\n\r\n<p><iframe align=\"middle\" frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/videoseries?list=UUC8prZi7q1vnP0A3XX4EWxQ\" width=\"560\"></iframe></p>\r\n', '2018-08-25'),
(10, 'Live Mass', 'http://livemass.net/', 'Liturgy', '<p>Live Mass allows users to stream the Extraordinary Form of the Roman Rite (Traditional Latin Mass) 24/7. Includes Masses from Warrington, England; Sarasota, Florida; Guadalajara, Mexico; and Fribourg, Switzerland.</p>\r\n', '2018-05-21'),
(11, 'Regina Magazine', 'http://reginamag.com/', 'Culture', '<p>Regina Magazine is an online magazine dedicated to preserving and passing on Catholic culture. In addition to highlighting Catholic stories from all over the world, they also feature an online store and organized trips to Italy, Ireland, and England.</p>\r\n', '2018-05-21'),
(12, 'Fr. Z\'s Blog', 'http://wdtprs.com/blog/', 'Commentary', '<p>Fr. John Zuhlsdorf, also known as Fr. Z, provides insightful and often humorous commentary on the state of the modern church.</p>\r\n', '2018-05-21'),
(13, 'Shroud of Turin', 'http://shroud.com/', 'Reference', '<p>The Shroud of Turin is believed by many to be the burial shroud of Jesus Christ. Others dismiss it as an extremely sophisticated forgery. Here to bring some clarity to the issue is Barrie Schwortz, one of the members from the 1978 Shroud of Turin Research Project (STURP)&nbsp;and the Shroud of Turin Education and Resource Association. Its members have compiled a comprehensive list of studies and articles on the various aspects of the Shroud of Turin.</p>\r\n', '2018-05-22'),
(14, 'Franciscan Monastery of the Holy Land in America', 'https://myfranciscan.org/', 'Fun', '<p>Ever wanted to visit the Holy Land but didn&rsquo;t have the money? At the Franciscan Monastery of the Holy Land in America, you can visit detailed replicas of famous Holy Land sites without having to leave the country! Displays include replicas of the Nativity Grotto in Bethlehem, the site of the Transfiguration, and Christ&rsquo;s tomb.</p>\r\n', '2018-05-22'),
(15, 'Ascension Presents', 'https://www.youtube.com/channel/UCVdGX3N-WIJ5nUvklBTNhAw', 'Videos', '<p>Ascension Presents is a YouTube channel that provides informational videos on a wide variety of topics, all geared for helping Catholics navigate modern-day obstacles in spiritual life.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/videoseries?list=UUVdGX3N-WIJ5nUvklBTNhAw\" width=\"560\"></iframe></p>\r\n', '2018-05-25'),
(16, 'Tumblar House', 'https://tumblarhouse.com/', 'Books', '<p>Tumblar House is a Catholic publishing company dedicated to evangelizing through good literature. With both fiction and non-fiction categories, they feature classic authors such as Hilarie Belloc and J. R. R. Tolkien as well as more modern names like Charles A. Coulombe and Solange Hertz.</p>\r\n\r\n<p>(As an aside, the webmaster highly recommends William L. Biersach&rsquo;s&nbsp;<em>Father Baptist</em>&nbsp;mystery series.)</p>\r\n', '2018-05-26'),
(17, 'Venite: A Celebration of Catholics Saints, Feasts, & Liturgical Music', 'https://www.youtube.com/channel/UCaSQfDxog016QiURpitFjbw', 'Videos', '<p>The Venite YouTube channel provides traditional Gregorian Chant for various feast days throughout the liturgical year.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/videoseries?list=UUaSQfDxog016QiURpitFjbw\" width=\"560\"></iframe></p>\r\n', '2018-05-28'),
(18, 'TAN Books', 'https://www.tanbooks.com/', 'Books', '<p>Founded in 1967, TAN Books has earned a reputation for publishing a wide variety of Catholic materials, including writings of the saints. No matter how obscure the title is, TAN Books is bound to have it in stock.</p>\r\n', '2018-05-28'),
(19, 'Eternal Word Television Network (EWTN)', 'http://ewtn.com/', 'Reference', '<p>EWTN is much more than a Catholic cable TV station&ndash;it spans the entire globe and has a library, video archives, a store, news reports, and a whole lot more.</p>\r\n', '2018-05-31'),
(20, 'Eye of the Tiber', 'http://www.eyeofthetiber.com/', 'Fun', '<p>Ever get tired of all of the bickering and infighting in Catholic news? Check out Eye of the Tiber for a fresh, satirical spin on the state of the Church!</p>\r\n', '2018-06-01'),
(21, 'Institute of Catholic Culture', 'https://instituteofcatholicculture.org/', 'Reference', '<p>The Institute of Catholic Culture offers free online lectures for just about everything related to Catholicism. With 800+ hours of audio and video content, you&rsquo;re sure to find information on any topic, no matter how obscure.</p>\r\n', '2018-06-02'),
(22, 'The Holy See', 'http://w2.vatican.va/content/vatican/en.html', 'Reference', '<p>The Holy See is the official Vatican website and provides access to information on every pope, every document, and every teaching of the Magisterium. Available languages include English, French, German, Spanish, Italian, and Latin.</p>\r\n', '2018-06-07'),
(23, 'Fish Eaters', 'https://fisheaters.com/', 'Reference', '<p>Fish Eaters is a resource for learning and understanding more about traditional Catholicism. Not only do they have great resources for prayers, they also have a discussion forum and a CafePress shop!</p>\r\n', '2018-06-29'),
(24, 'A Roman Catholic Drillbook', 'http://www.romanitaspress.com/roman-catholic-drillbook', 'Books', '<p>Originally published in 1925,&nbsp;<em>A Roman Catholic Drillbook</em>&nbsp;has been republished for the first time in decades by Romanitas Press. This book contains several easy-to-memorize drills of information about the Bible, Sacred Liturgy, the Sacraments, and much more. Learning the tenants of the Faith has never been easier!</p>\r\n', '2018-07-20'),
(25, 'Order of Preachers (Dominicans)', 'http://www.op.org/en', 'Reference', '<p>The Order of Preachers, also known as Dominicans, were established in the year 1216 by St. Dominic. Their motto, &ldquo;To pray, to bless, to preach,&rdquo; reflects their commitment to education and evangelization. One of the most well-known Dominican saints is St. Thomas Aquinas.</p>\r\n', '2018-08-04'),
(26, 'Order of Friars Minor (Franciscans)', 'https://ofm.org/', 'Reference', '<p>The Order of Friars Minor, also known as Franciscans, were established in 1217 by St. Francis of Assisi. They have dedicated themselves to living in poverty and sharing what little they have with the poor of other countries.</p>\r\n', '2018-08-04'),
(27, 'The Lepanto Institute', 'http://www.lepantoinstitute.org/', 'Commentary', '<p>Ever wonder if an organization that has &ldquo;Catholic&rdquo; in its name is really adhering to the teachings of the Church? That&rsquo;s where the Lepanto Institute comes in. Their team investigates various Catholic organizations to determine if they truly are Catholic or if they are supporting abortion in spite of their Catholic name.</p>\r\n', '2018-08-25'),
(28, 'Patron Saint Name Generator', 'http://saintsnamegenerator.com/index.php', 'Fun', '<p>Looking to learn about a new saint in the new year? Look no further than the Patron Saint Name Generator. With the click of a button, you&rsquo;ll learn about a particular saint, their feast day, and what they are the patron of.</p>\r\n', '2018-12-30'),
(29, 'Dr. Taylor Marshall', 'https://taylormarshall.com/', 'Reference', '<p>Dr. Taylor Marshall is a speaker and apologist who presents answers to commonly-asked questions about all aspects of the Faith. He is well-known for presenting complex theological concepts in terms that the average layman can understand.</p>\r\n', '2018-12-30'),
(30, 'Adoration of the Cross', 'https://www.youtube.com/channel/UCoLmw-7YiyXJA6Ma0DvAzhg', 'Videos', '<hr />\r\n<p>Adoration of the Cross is a YouTube channel that posts Gregorian, Byzantine, and Templar chants. It&rsquo;s a great way to hear the ancient musical traditions of the Church.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/videoseries?list=UUoLmw-7YiyXJA6Ma0DvAzhg\" width=\"100%\"></iframe></p>\r\n', '2019-06-10'),
(31, 'A Catholic Quest for the Holy Grail', 'https://www.tumblarhouse.com/products/a-catholic-quest-for-the-holy-grail-charles-coulombe', 'Books', '<p>Published by&nbsp;<a href=\"https://tumblarhouse.com\" target=\"_blank\">Tumblar House</a>,&nbsp;<em>A Catholic Quest for the Holy Grail</em>&nbsp;tackles the Catholic elements of the stories of King Arthur and the Holy Grail. The rich Catholic history of these stories creates a far more exciting saga than any mere fiction could hope.</p>\r\n', '2019-06-12'),
(32, 'uCatholic', 'https://ucatholic.com/', 'Reference', '<p>uCatholic is your one-stop hub for all things related to Catholicism. It features news, daily Mass readings, feast days, and even an online store.</p>\r\n', '2020-12-06'),
(33, 'Catholic to the Max', 'https://www.catholictothemax.com/', 'Fun', '<p>Looking for a great Catholic-themed gift? Chances are you can find it at Catholic to the Max! Featuring clothing, jewelry, posters, and more, you&rsquo;re sure to find exactly what your looking for.</p>\r\n', '2020-12-06'),
(34, 'Thomistic Institute', 'https://thomisticinstitute.org/', 'Reference', '<p>Looking for informative lectures on the Faith? The Thomistic Institute of Washington, D.C. has you covered! Based in the Dominican House of Studies, the Thomistic Institute features a wide variety of lectures and videos covering many different topics. You can even attend some of their lectures via Zoom.</p>\r\n', '2021-02-24'),
(35, 'OSV Institute', 'https://osvinstitute.com', 'Culture', '<p>The OSV Institute believes in encouraging and inspiring Catholics to change the world. It offers training programs and grants to help Catholics fulfill their dreams and spread the Gospel.</p>\r\n', '2021-04-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `name_id`
--
ALTER TABLE `name_id`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `name_id`
--
ALTER TABLE `name_id`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
