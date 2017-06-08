-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2015 at 05:45 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sc_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `comment` text NOT NULL,
  `date_publish` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `date_publish`) VALUES
(9, 22, 1, 'Example Comment ......', '2015-06-14 15:56:32'),
(10, 22, 1, 'an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software ', '2015-06-14 15:56:37'),
(11, 22, 1, 'an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. ', '2015-06-14 15:56:40'),
(28, 22, 1, 'an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software ', '2015-06-16 21:00:36'),
(29, 22, 1, 'an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software ', '2015-06-16 21:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE IF NOT EXISTS `massage` (
  `id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `massage` varchar(200) NOT NULL,
  `pass` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(15) NOT NULL,
  `name` text,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ephone` varchar(20) DEFAULT NULL,
  `contact_person` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `website` text,
  `fbid` varchar(20) DEFAULT NULL,
  `additional_info` text,
  `profile_picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `ephone`, `contact_person`, `date_of_birth`, `blood_group`, `gender`, `address`, `website`, `fbid`, `additional_info`, `profile_picture`) VALUES
(1, 'Tushar Rahman(Tushar)', 'malihakhan3689@gmail.com', '+8801720386866', '01720376866', 'Amma', '1991-11-22', 'A+', 'Male', 'Shahibag', 'www.facebook.com', 'cloudos1', 'Super User', '../profile_photos/25862-img_20140511_164123_1.jpg'),
(5, 'Galib Imtiaz(Gabil)', 'tushar@gmail.com', '+8801720386866', '01825824842', 'Amma', '1990-12-18', 'A-', 'Male', 'Shahibag,chapain,savar Dhaka, House Number 754', 'www.facebook.com', 'cloudos1', '', '../profile_photos/24328-23400.png'),
(6, 'Ashikur Rahman(Ashik)', 'sawon82@yahoo.com', '01720386866', '01825824842', 'tushar', '1992-11-18', 'A+', 'Male', 'Shahibag,chapain,savar Dhaka, House Number 754', 'www.facebook.com', 'cloudos1', 'dsg', '../profile_photos/95428-23507.png'),
(7, 'Tushar Rahman(Gabil)', 'cloudos12@gmail.com', '+8801720386866', '01720376866', 'tushar', '1992-10-15', 'A+', 'Male', 'Shahibag', 'www.facebook.com', 'cloudos1', 'dfh', '../profile_photos/90976-23400.png'),
(8, 'Tushar Rahman(Ashik)', 'sdfdsfs@gmail.com', '+8801720386866', '01825824842', 'Amma', '1992-12-17', 'A+', 'Male', 'Shahibag,chapain,savar Dhaka, House Number 754', 'www.facebook.com', 'cloudos1', '', '../profile_photos/5872-23400.png'),
(9, 'Shahin Alam(fazil)', 'shagg00@gmail.com', '01720386866', '01720386866', 'abba', '1222-01-19', 'A+', 'Male', 'CHaoain ghotola', 'www.ghura.com', 'balfelani', ' sdf', '../profile_photos/56684-23507.png'),
(10, 'Shahin Alam(fazil)', 'malihakhan3688@gmail.com', '01720386866', '01720386866', 'abba', '1222-04-18', 'A+', 'Male', 'CHaoain ghotola', 'www.ghura.com', 'balfelani', 'dgf', '../profile_photos/99349-21266.png'),
(11, 'Tushar Rahman(Tushar)', 'cloudos2@gmail.com', '01720386866', '01720386866', 'Amma', '1994-02-18', 'A+', 'Male', 'Talbag', 'www.sc.com', 'cloudos1', '  afsfsdf', '../profile_photos/57521-img_1093.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ride_posts`
--

CREATE TABLE IF NOT EXISTS `ride_posts` (
  `id` int(15) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `map_link` varchar(100) DEFAULT NULL,
  `ext_link` varchar(100) DEFAULT NULL,
  `details` text,
  `cover_link` varchar(100) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride_posts`
--

INSERT INTO `ride_posts` (`id`, `user_id`, `title`, `destination`, `map_link`, `ext_link`, `details`, `cover_link`, `time`) VALUES
(22, 1, 'Savar Cyclists BIKE-FRIDAY 15-11', 'Gazapur', 'https://web.whatsapp.com/', 'https://web.whatsapp.com/', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '../post_photos/52083-sdfdsf.png', '2015-06-12 21:24:26'),
(34, 1, 'Savar Cyclists BIKE-FRIDAY 15-11g', 'Gazapur', 'https://web.whatsapp.com/', 'https://web.whatsapp.com/', '&#2454;&#2503;&#2482;&#2494; &#2453;&#2503;&#2472; &#2480;&#2494;&#2468; &#2488;&#2494;&#2524;&#2503; &#2468;&#2495;&#2472;&#2463;&#2494;&#2527; &#2489;&#2476;&#2503;!!&#2454;&#2503;&#2482;&#2494; &#2489;&#2476;&#2503; &#2480;&#2494;&#2468; &#2535;&#2534; &#2463;&#2494;&#2527;&#2404;&#2437;&#2472;&#2503;&#2453; &#2438;&#2480;&#2494;&#2478; &#2453;&#2439;&#2480;&#2494; &#2470;&#2503;&#2454;&#2476;&#2507;&#2404; unsure emoticon &#2479;&#2494;&#2439;&#2489;&#2507;&#2453; &#2476;&#2509;&#2480;&#2494;&#2460;&#2495;&#2482;&#2503;&#2480; &#2488;&#2494;&#2478;&#2509;&#2476;&#2494; &#2478;&#2495;&#2488; &#2453;&#2480;&#2494; &#2479;&#2494;&#2476;&#2503; &#2472;&#2494;&#2404;&#2453;&#2497;&#2472;&#2497; &#2488;&#2489;&#2499;&#2470;&#2527; &#2476;&#2494;&#2472; &#2476;&#2509;&#2479;&#2453;&#2509;&#2468;&#2495; &#2438;&#2478;&#2494;&#2480;&#2503; &#2447;&#2453;&#2463;&#2497; &#2465;&#2494;&#2439;&#2453;&#2494; &#2470;&#2495;&#2527;&#2503;&#2472;&#2404;&#2438;&#2478;&#2495; &#2456;&#2497;&#2478;&#2494;&#2439;&#2468;&#2503; &#2455;&#2503;&#2482;&#2494;&#2478;&#2404;&#2437;&#2453;&#2494; &#2476;&#2494;&#2439;&#2404; &#2454;&#2503;&#2482;&#2494; &#2453;&#2503;&#2472; &#2480;&#2494;&#2468; &#2488;&#2494;&#2524;&#2503; &#2468;&#2495;&#2472;&#2463;&#2494;&#2527; &#2489;&#2476;&#2503;!!&#2454;&#2503;&#2482;&#2494; &#2489;&#2476;&#2503; &#2480;&#2494;&#2468; &#2535;&#2534; &#2463;&#2494;&#2527;&#2404;&#2437;&#2472;&#2503;&#2453; &#2438;&#2480;&#2494;&#2478; &#2453;&#2439;&#2480;&#2494; &#2470;&#2503;&#2454;&#2476;&#2507;&#2404; unsure emoticon &#2479;&#2494;&#2439;&#2489;&#2507;&#2453; &#2476;&#2509;&#2480;&#2494;&#2460;&#2495;&#2482;&#2503;&#2480; &#2488;&#2494;&#2478;&#2509;&#2476;&#2494; &#2478;&#2495;&#2488; &#2453;&#2480;&#2494; &#2479;&#2494;&#2476;&#2503; &#2472;&#2494;&#2404;&#2453;&#2497;&#2472;&#2497; &#2488;&#2489;&#2499;&#2470;&#2527; &#2476;&#2494;&#2472; &#2476;&#2509;&#2479;&#2453;&#2509;&#2468;&#2495; &#2438;&#2478;&#2494;&#2480;&#2503; &#2447;&#2453;&#2463;&#2497; &#2465;&#2494;&#2439;&#2453;&#2494; &#2470;&#2495;&#2527;&#2503;&#2472;&#2404;&#2438;&#2478;&#2495; &#2456;&#2497;&#2478;&#2494;&#2439;&#2468;&#2503; &#2455;&#2503;&#2482;&#2494;&#2478;&#2404;&#2437;&#2453;&#2494; &#2476;&#2494;&#2439;&#2404; &#2454;&#2503;&#2482;&#2494; &#2453;&#2503;&#2472; &#2480;&#2494;&#2468; &#2488;&#2494;&#2524;&#2503; &#2468;&#2495;&#2472;&#2463;&#2494;&#2527; &#2489;&#2476;&#2503;!!&#2454;&#2503;&#2482;&#2494; &#2489;&#2476;&#2503; &#2480;&#2494;&#2468; &#2535;&#2534; &#2463;&#2494;&#2527;&#2404;&#2437;&#2472;&#2503;&#2453; &#2438;&#2480;&#2494;&#2478; &#2453;&#2439;&#2480;&#2494; &#2470;&#2503;&#2454;&#2476;&#2507;&#2404; unsure emoticon &#2479;&#2494;&#2439;&#2489;&#2507;&#2453; &#2476;&#2509;&#2480;&#2494;&#2460;&#2495;&#2482;&#2503;&#2480; &#2488;&#2494;&#2478;&#2509;&#2476;&#2494; &#2478;&#2495;&#2488; &#2453;&#2480;&#2494; &#2479;&#2494;&#2476;&#2503; &#2472;&#2494;&#2404;&#2453;&#2497;&#2472;&#2497; &#2488;&#2489;&#2499;&#2470;&#2527; &#2476;&#2494;&#2472; &#2476;&#2509;&#2479;&#2453;&#2509;&#2468;&#2495; &#2438;&#2478;&#2494;&#2480;&#2503; &#2447;&#2453;&#2463;&#2497; &#2465;&#2494;&#2439;&#2453;&#2494; &#2470;&#2495;&#2527;&#2503;&#2472;&#2404;&#2438;&#2478;&#2495; &#2456;&#2497;&#2478;&#2494;&#2439;&#2468;&#2503; &#2455;&#2503;&#2482;&#2494;&#2478;&#2404;&#2437;&#2453;&#2494; &#2476;&#2494;&#2439;&#2404; ', '../post_photos/91583-1969227_484491758346096_917565314_n.jpg', '2015-06-15 05:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` char(60) NOT NULL,
  `access` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `access`) VALUES
(1, 'mtushar091', '$2y$10$ODRkNWQzOTFhNTBlYWEyZOJ/xz1QrVlmNVm4.xdmE3yiiWCJlOhO6', '3'),
(5, 'localhost', '$2y$10$MDAxZjg5NDE0N2YyM2JkNe0dyo1D2wUexRfON4elXBIg3MuLQuWJi', '2'),
(6, 'mtushar444', '$2y$10$MTNiODdiZmVjYzFhZmQ4YOLl2WsPKmJzw6Scp5J0prIfUGTqEEkOW', '1'),
(7, 'mtushar810', '$2y$10$ZjUzOGZjZDJlNzcwZmViMOsciYriCQguOwJKApTP7dvnBV4snRCyO', '1'),
(8, 'root', '$2y$10$OTRlYmE5NjYyZTUyZDY2NOxWBN37q52pdBAwjHe7QLX36g7r7.kxa', '1'),
(9, 'juwelrana091', '$2y$10$ZGRjNWJmZmM0NzNlMGVmZeF5sUolA8EsrbCD88CP98tv84J8oOk2K', '1'),
(10, 'juwelrana09', '$2y$10$NWIxY2EyOTU0MDk1OGMyM.yDNkBReEFnX35T9oGNlIPkgtJMu5TBW', '1'),
(11, 'mtushar091', '$2y$10$MDUyNTU2NmZjOTA0MzBlYOwpbZ3yJNP24l9wjO/4BLeowMIL7y2DC', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_posts`
--
ALTER TABLE `ride_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ride_posts`
--
ALTER TABLE `ride_posts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `ride_posts` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
