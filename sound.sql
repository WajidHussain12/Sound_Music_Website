-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 08:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`id`, `name`, `username`, `email`, `password`, `confirmpassword`, `usertype`) VALUES
(1, 'admin', 'admin123', 'admin123@123.com', '123', '123', 'admin'),
(2, 'noman', 'noman', 'noman@123.com', 'Noman123@', 'Noman123@', 'user'),
(3, 'WajidHussain', 'WajidHussain', 'hussainwajid615@gmail.com', 'Wajid@123', 'Wajid@123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `song_rating`
--

CREATE TABLE `song_rating` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Song_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song_rating`
--

INSERT INTO `song_rating` (`id`, `User_id`, `Song_id`, `rating`, `timestamp`) VALUES
(1, 2, 46, 3, '2023-03-04 07:16:54'),
(2, 3, 46, 4, '2023-03-04 07:15:03'),
(3, 2, 45, 3, '2023-03-03 03:33:31'),
(4, 3, 44, 5, '2023-03-03 01:56:36'),
(5, 3, 45, 5, '2023-03-03 02:02:49'),
(6, 3, 48, 5, '2023-03-03 02:02:56'),
(7, 2, 48, 5, '2023-03-03 02:03:52'),
(8, 2, 44, 5, '2023-03-03 03:33:41'),
(9, 3, 95, 4, '2023-03-04 07:15:03'),
(10, 3, 96, 4, '2023-03-04 07:15:05'),
(11, 3, 97, 3, '2023-03-04 07:15:06'),
(12, 3, 98, 2, '2023-03-04 07:15:08'),
(13, 3, 99, 3, '2023-03-03 21:40:22'),
(14, 3, 100, 4, '2023-03-04 07:15:12'),
(15, 3, 101, 4, '2023-03-03 21:40:26'),
(16, 3, 102, 3, '2023-03-04 07:15:17'),
(17, 3, 103, 3, '2023-03-03 21:40:29'),
(18, 3, 114, 4, '2023-03-04 07:15:34'),
(19, 3, 112, 3, '2023-03-04 07:15:30'),
(20, 3, 106, 5, '2023-03-04 07:15:20'),
(21, 3, 107, 4, '2023-03-04 07:15:22'),
(22, 3, 108, 4, '2023-03-04 07:15:23'),
(23, 3, 109, 4, '2023-03-04 07:15:24'),
(24, 3, 110, 3, '2023-03-04 07:15:27'),
(25, 3, 111, 5, '2023-03-04 07:15:28'),
(26, 3, 113, 4, '2023-03-04 07:15:33'),
(27, 3, 115, 2, '2023-03-04 07:15:35'),
(28, 3, 116, 3, '2023-03-04 07:15:38'),
(29, 3, 117, 3, '2023-03-04 07:15:41'),
(30, 3, 118, 2, '2023-03-04 07:15:42'),
(31, 3, 119, 4, '2023-03-04 07:15:44'),
(32, 3, 120, 4, '2023-03-04 07:15:46'),
(33, 3, 121, 5, '2023-03-04 07:15:48'),
(34, 3, 123, 2, '2023-03-04 07:15:51'),
(35, 3, 124, 4, '2023-03-04 07:15:53'),
(36, 3, 125, 3, '2023-03-04 07:15:54'),
(37, 3, 126, 3, '2023-03-04 07:15:56'),
(38, 3, 127, 3, '2023-03-04 07:15:57'),
(39, 3, 128, 4, '2023-03-04 07:15:58'),
(40, 3, 129, 2, '2023-03-04 07:16:00'),
(41, 3, 130, 4, '2023-03-04 07:16:02'),
(42, 3, 131, 3, '2023-03-04 07:16:03'),
(43, 3, 132, 4, '2023-03-04 07:16:05'),
(44, 3, 133, 4, '2023-03-04 07:16:07'),
(45, 3, 134, 4, '2023-03-04 07:16:09'),
(46, 3, 135, 4, '2023-03-04 07:16:10'),
(47, 3, 136, 5, '2023-03-04 07:16:12'),
(48, 3, 137, 5, '2023-03-04 07:16:13'),
(49, 2, 95, 2, '2023-03-04 07:16:56'),
(50, 2, 96, 2, '2023-03-04 07:16:57'),
(51, 2, 97, 4, '2023-03-04 07:16:58'),
(52, 2, 98, 5, '2023-03-04 07:17:00'),
(53, 2, 99, 3, '2023-03-04 07:17:01'),
(54, 2, 100, 3, '2023-03-04 07:17:03'),
(55, 2, 101, 2, '2023-03-04 07:17:04'),
(56, 2, 102, 2, '2023-03-04 07:17:06'),
(57, 2, 103, 4, '2023-03-04 07:17:08'),
(58, 2, 106, 3, '2023-03-04 07:17:10'),
(59, 2, 107, 2, '2023-03-04 07:17:13'),
(60, 2, 108, 4, '2023-03-04 07:17:14'),
(61, 2, 109, 4, '2023-03-04 07:17:20'),
(62, 2, 110, 2, '2023-03-04 07:17:22'),
(63, 2, 111, 2, '2023-03-04 07:17:23'),
(64, 2, 112, 5, '2023-03-04 07:17:24'),
(65, 2, 113, 5, '2023-03-04 07:17:25'),
(66, 2, 114, 3, '2023-03-04 07:17:29'),
(67, 2, 115, 2, '2023-03-04 07:17:31'),
(68, 2, 116, 2, '2023-03-04 07:17:33'),
(69, 2, 117, 2, '2023-03-04 07:17:34'),
(70, 2, 118, 2, '2023-03-04 07:17:35'),
(71, 2, 119, 4, '2023-03-04 07:17:37'),
(72, 2, 120, 3, '2023-03-04 07:17:38'),
(73, 2, 121, 4, '2023-03-04 07:17:39'),
(74, 2, 123, 2, '2023-03-04 07:17:40'),
(75, 2, 124, 2, '2023-03-04 07:17:42'),
(76, 2, 125, 2, '2023-03-04 07:17:44'),
(77, 2, 126, 2, '2023-03-04 07:17:45'),
(78, 2, 127, 4, '2023-03-04 07:17:46'),
(79, 2, 128, 5, '2023-03-04 07:17:48'),
(80, 2, 129, 3, '2023-03-04 07:17:50'),
(81, 2, 130, 3, '2023-03-04 07:17:51'),
(82, 2, 131, 4, '2023-03-04 07:17:53'),
(83, 2, 132, 4, '2023-03-04 07:17:54'),
(84, 2, 133, 3, '2023-03-04 07:17:56'),
(85, 2, 134, 5, '2023-03-04 07:17:57'),
(86, 2, 135, 2, '2023-03-04 07:18:00'),
(87, 2, 136, 3, '2023-03-04 07:18:03'),
(88, 2, 137, 5, '2023-03-04 07:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `song_table`
--

CREATE TABLE `song_table` (
  `Song_id` int(100) NOT NULL,
  `Song_Name` varchar(200) NOT NULL,
  `Artist_Name` varchar(200) NOT NULL,
  `Album_Name` varchar(200) NOT NULL,
  `Film_Name` varchar(200) NOT NULL,
  `Song_TimeDuration` varchar(5) NOT NULL,
  `Year` int(50) NOT NULL,
  `Song_File` varchar(200) NOT NULL,
  `Song_Img` varchar(200) NOT NULL,
  `Song_Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song_table`
--

INSERT INTO `song_table` (`Song_id`, `Song_Name`, `Artist_Name`, `Album_Name`, `Film_Name`, `Song_TimeDuration`, `Year`, `Song_File`, `Song_Img`, `Song_Category`) VALUES
(46, 'TITLE TRACK SONG - BHOOL BHULAIYAA 2', 'Neeraj Shridhar', 'BHOOL BHULAIYAA 2', 'BHOOL BHULAIYAA 2', '3:31', 2022, 'Audio_Songs/Title Track Bhool Bhulaiyaa 2 320 Kbps.mp3', 'Audio_Songs_Images/TITLE TRACK- BHOOL BHULAIYAA 2.jpg', 'Bollywood'),
(95, 'Choomantar', 'Aditi Singh Sharma, Benny Dayal', 'Mere Brother Ki Dulhan', 'Mere Brother Ki Dulhan', '4:20', 2011, 'Audio_Songs/Choomantar Mere Brother Ki Dulhan 320 Kbps.mp3', 'Audio_Songs_Images/Choomantar.jpg', 'Bollywood'),
(96, 'O Mere Khuda', 'Atif Aslam, Garima Jhingoon', ' Prince', ' Prince', '3:19', 2010, 'Audio_Songs/O Mere Khuda.mp3', 'Audio_Songs_Images/O Mere Khuda.picjpg.jpg', 'Bollywood'),
(97, 'Raat Gayi So Baat Gayi', 'Asees Kaur, Vishal Dadlani', 'Bhoot Police', 'Bhoot Police', '1:54', 2022, 'Audio_Songs/Raat Gayi So Baat Gayi Bhoot Police 320 Kbps.mp3', 'Audio_Songs_Images/Raat Gayi So Baat Gayi .jpg', 'Bollywood'),
(98, 'Aayi Aayi Bhoot Police', 'Sunidhi Chauhan, Mellow D, Vishal Dadlani', 'Bhoot Police', 'Bhoot Police', '4:46', 2022, 'Audio_Songs/Aayi Aayi Bhoot Police 320 Kbps.mp3', 'Audio_Songs_Images/ayi ayi bhooy police.jpg', 'Bollywood'),
(99, 'Aasan Nahin Yahan', 'Arijit Singh', 'Aashiqui 2', 'Aashiqui 2', '3:34', 2013, 'Audio_Songs/Aasan Nahin Yahan - Aashiqui 2.mp3', 'Audio_Songs_Images/Aasan Nahin Yahan.jpg', 'Bollywood'),
(100, 'Tum Hi Ho', ' Arijit Singh', 'Aashiqui 2', 'Aashiqui 2', '4:22', 2013, 'Audio_Songs/Tum Hi Ho - Aashiqui 2.mp3', 'Audio_Songs_Images/Tum Hi Ho.jpg', 'Bollywood'),
(101, 'Aal Izz Well Remix', 'Shaan, Swanand Kirkire, Sonu Nigam', '3 idiots', '3 idiots', '4:40', 2009, 'Audio_Songs/Aal Izz Well Remix.mp3', 'Audio_Songs_Images/all is well.jpg', 'Bollywood'),
(102, 'Behti Hawa Sa Tha Woh', 'Shantanu Moitra, Shaan', '3 Idiots', '3 Idiots', '4:59', 2009, 'Audio_Songs/Behti Hawa Sa Tha Woh.mp3', 'Audio_Songs_Images/Behti Hawa Sa Tha Wo.jpg', 'Bollywood'),
(103, 'Jhoome Jo Pathaan', ' Vishal Dadlani, Sheykhar Ravjiani, Sukriti Kakar, Arijit Singh', 'PATHAAN', 'PATHAAN', '3:28', 2022, 'Audio_Songs/02 - Jhoome Jo Pathaan (320 Kbps).mp3', 'Audio_Songs_Images/Jhoome Jo Pathaan.jpg', 'Bollywood'),
(106, 'Sanam Teri Kasam Title Song', 'Himesh Reshammiya, Sanjoy Chowdhury', 'Sanam Teri Kasam ', 'Sanam Teri Kasam ', '5:14', 2016, 'Audio_Songs/01 Sanam Teri Kasam (Title Song) Ankit Tiwari -320Kbps.mp3', 'Audio_Songs_Images/Sanam Teri Kasam Title Song.jpg', 'Bollywood'),
(107, 'O Saki Saki', 'B Praak, Tulsi Kumar, Neha Kakkar', 'Batla House', 'Batla House', '3:11', 2019, 'Audio_Songs/O Saki Saki - Batla House.mp3', 'Audio_Songs_Images/O SAKI SAKI.jpg', 'Bollywood'),
(108, 'Maula Mere Maula ', 'Roopkumar Rathod', 'Anwar', 'Anwar', '6:4', 2006, 'Audio_Songs/Maula Mere Maula (Anwar).mp3', 'Audio_Songs_Images/Maula Mere Maula.jpg', 'Bollywood'),
(109, 'Main Hoon Hero Tera (Salman Khan Version)', 'Salman Khan', 'Hero', 'Hero', '4:44', 2015, 'Audio_Songs/Main Hoon Hero Tera (Salman Khan) Hero 320Kbps.mp3', 'Audio_Songs_Images/Main Hoon Hero Tera.jpg', 'Bollywood'),
(110, 'Haan Tu Hain', 'Pritam Chakraborty, KK', 'Jannat In Search of Heaven', 'Jannat In Search of Heaven...', '5:25', 2008, 'Audio_Songs/03. Haan Tu Hain.mp3', 'Audio_Songs_Images/Haan Tu Hain.jpg', 'Bollywood'),
(111, 'Zara Sa', 'Krishnakumar Kunnath as kk', 'Jannat In Search of Heaven', 'Jannat: In Search of Heaven...', '5:3', 2008, 'Audio_Songs/01. Zara Sa.mp3', 'Audio_Songs_Images/Zara Sa.jpg', 'Bollywood'),
(112, 'Jannat Jahan', 'Pritam Chakraborty, Rupam Islam', 'Jannat In Search of Heaven', 'Jannat In Search of Heaven', '3:43', 2008, 'Audio_Songs/05. Jannat Jahan.mp3', 'Audio_Songs_Images/Jannat Jahan.jpg', 'Bollywood'),
(113, 'Kiya Mujhe Pyaar Hai - Remix', 'Krishnakumar Kunnath as KK', 'Woh Lamhe', 'Woh Lamhe', '4:11', 2006, 'Audio_Songs/08. Kiya Mujhe Pyaar Hai - Remix.mp3', 'Audio_Songs_Images/Kya Mujhe Pyar.jpg', 'Bollywood'),
(114, 'Mann Kunto Maula', 'Altamash Faridi and Shadab Faridi', 'Gunday', 'Gunday', '4:45', 2014, 'Audio_Songs/06 Mann Kunto Maula (Altamash Faridi & Shadab Faridi).mp3', 'Audio_Songs_Images/Mann Kunto Maula.jpg', 'Bollywood'),
(115, 'Husn Parcham', 'Raja Kumari, Bhoomi Trivedi', 'Zero', 'Zero', '3:6', 2018, 'Audio_Songs/Husn Parcham - Zero.mp3', 'Audio_Songs_Images/Husn Parcham.jpg', 'Bollywood'),
(116, 'Hookah Bar', 'Aaman Trikha, Himesh Reshammiya, Vinit Singh', 'Khiladi 786', 'Khiladi 786', '3:22', 2012, 'Audio_Songs/09 Hookah Bar (Remix) Khiladi 786.mp3', 'Audio_Songs_Images/Hookah bar.jpg', 'Bollywood'),
(117, 'Haseeno Ka Deewana', 'Payal Dev, Raftaar', 'Kaabil', 'Kaabil', '3:49', 2016, 'Audio_Songs/Haseeno Ka Deewana - Kaabil (Raftaar) 320Kbps.mp3', 'Audio_Songs_Images/Haseeno Ka Deewana.jpg', 'Bollywood'),
(118, 'Dus Bahane 2.0', 'Vishal–Shekhar KK, Shaan, Tulsi Kumar', 'Baaghi 3', 'Baaghi 3', '3:21', 2020, 'Audio_Songs/Dus Bahane 2 - Baaghi 3.mp3', 'Audio_Songs_Images/Dus Bahane 2.0.jpg', 'Bollywood'),
(119, 'Laapata', 'Krishnakumar Kunnath as kk', 'Ek Tha Tiger', 'Ek Tha Tiger', '4:16', 2012, 'Audio_Songs/Laapata (Ek Tha Tiger).mp3', 'Audio_Songs_Images/Laapata.jpg', 'Bollywood'),
(120, 'Banjaara', 'Sukhwinder Singh | Sohail Sen', 'Ek Tha Tiger', 'Ek Tha Tiger', '4:35', 2012, 'Audio_Songs/Banjaara (Ek Tha Tiger).mp3', 'Audio_Songs_Images/Banjaara.jpg', 'Bollywood'),
(121, 'Mashallah', 'Shreya Ghoshal, Sajid-Wajid, Kausar Munir', 'Ek Tha Tiger', 'Ek Tha Tiger', '4:45', 2012, 'Audio_Songs/Mashallah   Ek Tha Tiger.mp3', 'Audio_Songs_Images/Mashallah.jpg', 'Bollywood'),
(123, 'Love Me Like You Do', 'Ellie Goulding', 'Fifty Shades of Grey', 'Fifty Shades of Grey', '4:13', 2015, 'Audio_Songs/Love Me Like You Do(PagalWorld.com.se).mp3', 'Audio_Songs_Images/Love Me Like You Do.jpg', 'Hollywood'),
(124, 'Unstoppable', 'sia', 'sia', 'sia', '4:6', 2021, 'Audio_Songs/Unstoppable(PaglaSongs).mp3', 'Audio_Songs_Images/Unstoppable.jpg', 'Hollywood'),
(125, 'Waka Waka', 'Shakira', 'The Official 2010 FIFA World Cup', 'The Official 2010 FIFA World Cup', '3:23', 2010, 'Audio_Songs/Shakira_-_Waka_Waka_This_Time_for_Africa_.mp3', 'Audio_Songs_Images/Shakira - Waka Waka.jpg', 'Hollywood'),
(126, 'Danza Kuduro REMIX', 'Fast Five', 'Don Omar', 'Don Omar', '3:59', 2010, 'Audio_Songs/Don Omar Danza Kuduro (Remix)(audiosong.in).mp3', 'Audio_Songs_Images/Don Omar - Danza Kuduro remix.jpg', 'Hollywood'),
(127, 'Danza Kuduro', 'Don Omar', 'Fast Five', 'Fast Five', '4:18', 2010, 'Audio_Songs/Danza-Kuduro(PaglaSongs).mp3', 'Audio_Songs_Images/Danza Kuduro.jpg', 'Hollywood'),
(128, 'On The Floor', 'Jennifer Lopez', 'ft Pitbull', 'ft. Pitbull', '4:18', 2011, 'Audio_Songs/Jennifer-Lopez-On-The-Floor-Ft.-Pitbull-via-Naijafinix.com_.mp3', 'Audio_Songs_Images/On The Floor.jpg', 'Hollywood'),
(129, 'Amplifier', 'Imran Khan', 'Amplifier', 'Amplifier', '3:51', 2009, 'Audio_Songs/Amplifier(PaglaSongs).mp3', 'Audio_Songs_Images/Amplifier.jpg', 'Hollywood'),
(130, 'Despacito', 'Luis Fonsi', 'Daddy Yankee', 'Daddy Yankee', '4:41', 2017, 'Audio_Songs/Despacito(PagalWorld).mp3', 'Audio_Songs_Images/Despacito.jpg', 'Hollywood'),
(131, 'Tajdar E Haram', 'Sajid Wajid', 'Satyameva Jayate', 'Satyameva Jayate', '4:51', 2018, 'Audio_Songs/03 Tajdar E Haram - Satyameva Jayate.mp3', 'Audio_Songs_Images/Tajdar E Haram.jpg', 'Bollywood'),
(132, 'Madhubala', 'Ali Zafar, Shweta Pandit', 'Mere Brother Ki Dulhan', 'Mere Brother Ki Dulhan', '4:22', 2012, 'Audio_Songs/05. Madhubala.mp3', 'Audio_Songs_Images/Madhubala.jpg', 'Bollywood'),
(133, 'Do Dhaari Talwaar', 'Shahid Mallya, Shweta Pandit', 'Mere Brother Ki Dulhan', 'Mere Brother Ki Dulhan', '5:0', 2012, 'Audio_Songs/06. Do Dhaari Talwaar.mp3', 'Audio_Songs_Images/Do Dhaari Talwaar.jpg', 'Bollywood'),
(134, 'Mere Brother Ki Dulhan', ' KK (Backing Vocals: Krishna Beura)', 'Mere Brother Ki Dulhan', 'Mere Brother Ki Dulhan', '4:24', 2012, 'Audio_Songs/01. Mere Brother Ki Dulhan.mp3', 'Audio_Songs_Images/Mere Brother Ki Dulhan.jpg', 'Bollywood'),
(135, 'Aa Bhi Jaa Sanam', 'Atif Aslam', 'Prince', 'Prince', '3:8', 2010, 'Audio_Songs/Aa Bhi Ja Sanam.mp3', 'Audio_Songs_Images/Aa Bhi Jaa Sanam.jpg', 'Bollywood'),
(136, 'DILBAR', 'Ikka Singh, Dhvani Bhanushali, Neha Kakkar, Asees Kaur', ' Satyameva Jayate', ' Satyameva Jayate', '3:4', 2018, 'Audio_Songs/01 Dilbar - Satyameva Jayate.mp3', 'Audio_Songs_Images/DILBAR.jpg', 'Bollywood'),
(137, 'The Monster Song - KGF Chapter 2', 'Adithi Sagar', 'KGF Chapter 2', 'KGF Chapter 2', '2:46', 2022, 'Audio_Songs/The Monster Song - KGF 2.mp3', 'Audio_Songs_Images/The Monster Song - KGF Chapter 2.jpg', 'Bollywood');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song_rating`
--
ALTER TABLE `song_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song_table`
--
ALTER TABLE `song_table`
  ADD PRIMARY KEY (`Song_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `song_rating`
--
ALTER TABLE `song_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `song_table`
--
ALTER TABLE `song_table`
  MODIFY `Song_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
