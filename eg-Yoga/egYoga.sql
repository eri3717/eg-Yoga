-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 25, 2019 at 04:22 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egYoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_type` varchar(30) NOT NULL,
  `class_detail` text NOT NULL,
  `class_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_type`, `class_detail`, `class_level`) VALUES
(1, 'Slow Flow', 'Slow Flow Yoga incorporates poses that range from gentle to challenging, but done with stable, self-centering energy. The pace of these classes is slower and emphasizes safe alignment.\r\n \r\nThe toned-down speed of these classes is more conducive to the meditative practices of mindfulness of action and awareness of breathing while being just as beneficial for building strength, stability, and postural integrity.\r\n \r\nThis class is well-suited to newer students, or for those who desire deep concentration within their practice. You will leave feeling aligned, alert and renewed.', NULL),
(2, 'Complete Yoga', 'A Sanskrit word for \"complete\" is sadhana, which also means \"effective; leading straight to a goal; guiding well.\"\r\nThis Hatha based class takes on a slower pace in order to achieve relaxation while still maintaining engagement of the body and mind. Ending with sufficient time for focused pranayama and meditation.', 'All Levels'),
(3, 'Hatha Yoga', '', NULL),
(4, 'Roll & Align', 'In this light hearted class, you will unwind tension to feel more mobility and freedom in your practice. We will use a combination of ball massage, alignment cues, active movements, pranayama and rest to cultivate grace, contentment and love.', NULL),
(5, 'Vinyasa Flow', 'This dynamic class, carefully connecting breath to movement, creates an active sequence linking poses together. Vinyasa flow is designed to build heat, strength and mental focus. Each teacher creates their own unique sequence - and will teach to help all the different levels of students in the room from active and vigorous pace to a more gentle flow. Feel free to ask the front desk if you have any questions. Touch base with your teacher to let them know about your practice or what you are curious about trying.', 'All Level'),
(6, 'Bhakti Vinyasa', 'Bhakti Vinyasa happens in a warm (not hot) room and moves similar to a level 2/3 Vinyasa “Flow” class; active beginners familiar with Sun Salutations, Warrior poses, and some intermediate to advanced postures are most welcome! Enjoy a rigorous flow grounded in yoga philosophy and devotion with an emphasis on the seamless connection between breath and movement of the body. This challenging practice will invigorate and inspire.\r\n ', 'Level 2-3'),
(7, 'Alignment Flow', 'For the anatomy curious or anyone looking to flow more mindfully ~ this flow is for you. Create intention around your breath, positioning and asana. Safe and intelligent sequencing with focused movement and breath allow for a softening around your own edges. Melt into a flow that weaves together an intentional and inspired movement practice. All levels welcome.', 'All Levels'),
(8, 'Yin Yoga', 'Yin Yoga is a series of passive poses held for 2 to 5 minutes, releasing the connective tissue, creating greater flexibility for other activities. Yin Yoga lengthens and strengthens the joints, providing the base for a deeper active asana practice. Holding the pose allows the muscles to relax, releasing tension and toxins, while bringing the pose deeper into the body.\r\n \r\nThis class is designed for anyone wanting to increase their range of motion, loosen up from their regular workout, or find a deeper edge to their yoga practice. You\'ll notice a difference by the end of class.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `instructor_Fname` varchar(30) NOT NULL,
  `instructor_Lname` varchar(30) NOT NULL,
  `instructor_detail` text NOT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_Fname`, `instructor_Lname`, `instructor_detail`, `picture`) VALUES
(2, 'Jamila', 'Ekukpe', 'BORN: Dallas, TX<br>\r\nCURRENT TOWN: San Francisco, CA<br>\r\nOCCUPATION: Yoga student and teacher<br><br>\r\nJamila Ekukpe came to California while serving in the Air Force and have been practicing yoga since.\r\n<br><br>\r\nAfter graduating with a BA in Communication Studies, she enrolled in her first 200hr teacher training with Annie Carpenter and have continued studies Richard Rosen at You and the Mat. Her teachings derive from several traditions of yoga and an expanded study of Katonah yoga in NYC.', NULL),
(3, 'Richard', 'Rosen', 'Richard began his practice of Hatha Yoga in 1980 at the Yoga Room in Berkeley, and from 1982 to 1985 trained at the BKS Iyengar Yoga Institute in San Francisco.<br>\r\n\r\n In 1987 he co-founded the Piedmont Yoga Studio with his good friends Clare Finn and Rodney Yee, and taught there for nearly 28 years until it closed its doors in January 2015. <br>\r\n\r\nHe continues to teach at the same studio, now called Nest Yoga, for the new director, Kim Lally. Richard is a contributing editor at Yoga Journal magazine, and since 1990 he’s written feature articles, book reviews, a variety of columns, and over 300 yoga video reviews. ', NULL),
(4, 'Quamay', 'Sams', 'Quamay began his yoga journey in the summer of 2016. With his deep passion for mindfulness, he had developed a strong love for the subtle energies of the body and strives to create a balance between movement and meditation.\r\nAfter receiving his 200-hour training certificate in his home of NYC for Power Vinyasa, Quamay moved to the Bay Area in 2018 to pursue further education and opportunity for sharing his knowledge. Studying with Jason Crandell he continues to share his love of the practice through skillful sequencing and deep anatomical influence.\r\n\r\nBuilding on strength and alignment with a focus on Pranayama, expect a well-rounded class that will push you mentally and physically to feel more powerful within yourself.', NULL),
(5, 'Lynn', 'Ursic', 'BORN: Coos Bay, Oregon\r\nCURRENT TOWN: Oakland OCCUPATION: Yoga Instructor | Designer\r\nwebsite: lynnursic.com\r\n \r\nLynn Ursic | Roll + Align\r\n \r\nLynn arrived to the heart of Hatha Yoga in 2010 at Piedmont Yoga Studio, training with Richard Rosen and esteemed faculty. She brings an athlete‘s sense of body and a designer’s sense of space to her teaching. Relentlessly kind and attentive, Lynn sends her students out of practice feeling relaxed, refreshed and self reliant. Her mission is simple, bring into the world more clarity, more compassion, more hope, more love. She has great gratitude for her many wise, wonderful teachers and mentors.', NULL),
(6, 'Kristen', 'Coyle', 'About Kristen Coyle, E-RYT 500: I am a dedicated yoga practitioner, teacher and yoga teacher trainer with twelve years of teaching experience. I enjoy cultivating community wherever I go through the universal language of yoga and have led classes, workshops, trainings and retreats at various locales around the world.\r\nAs an instructor, my intentions are to be a clear conduit for the teachings to flow through me in a way that is both empowering and undiluted. My classes are rooted in alignment-based Vinyasa Yoga principles and invite practitioners to explore their potential through challenging, intelligent sequencing, breath-work, mantra and yogic philosophy.\r\nI have 15 years of experience as a therapeutic bodyworker and bring my knowledge of anatomy both physically and energetically into my teachings to create a multi-dimensional, holistic practice.', NULL),
(7, 'Whitney', 'Walsh', 'First and foremost, Whitney is a student of yoga. A disciplined practice keeps her body healthy and her mind at ease. Second, she is a yoga teacher. She avidly studies SmartFLOW® yoga with Annie Carpenter. Her classes are vigorous and lighthearted with intentional and intelligent sequencing. By focusing on the mechanics and anatomy of different bodies, she provides structure to transition her students safely through modified and advanced movements. She strives to inspire her students to use breath and asana (poses) to explore not only how to accept themselves but how to embrace themselves.', NULL),
(8, 'Karly', 'Railsback', 'Hometown: Gold Country, CA\r\nCurrent Town: Oakland\r\nOccupation: Yoga Teacher, Certified Massage Therapist, and Mom\r\nA Registered Yoga Teacher, Certified Massage Therapist and Ayurvedic Health Educator; Karly’s yoga classes focus on unwinding tension while developing strength, flexibly and ease. Over the last 15 years she has studied and practiced holistic health in California, Alaska and Hawai’i. Inspiration for her teaching comes from contemporary yoga teachers of many lineages, Tibetan Buddhism and the science of Ayurveda. She aspires to make yoga an accessible, practical and empowering practice of self-care for all who seek it. www.karlyrailsback.com\r\n\r\n\"My love of yoga began in 2006 while working as a massage therapist at a wilderness resort in Southeast Alaska. I had studied Buddhism and mindfulness meditation while earning my bachelors in Community Studies at UC Santa Cruz, loved being active in sports and the outdoors; so it seemed natural to give yoga a try. My nightly yoga practice quickly became my way to focus the mind while mitigating the affects of many hands-on-hours as a bodyworker. Over a decade later the practice continues to inspire and soothe me. I have been fortunate to study many styles of yoga with teachers around the world. I completed my first 200hr teaching program in 2009 at Open Space in Honolulu. In 2013, completed the 500hr Registered Yoga Teacher program with Yoga Tree San Francisco earning additional certifications in yin yoga, prenatal yoga and yoga nidra. I currently enjoy dropping in for class with local teachers Annie Carpenter and Jason Crandall, and rolling out my mat at home and sharing the yoga practice with my family.\"', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `email`, `password`, `status`) VALUES
(4, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'A'),
(8, 'eri@kredo.com', '202cb962ac59075b964b07152d234b70', 'U'),
(9, 'john@kredo.com', '202cb962ac59075b964b07152d234b70', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `lesson_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `participants` int(11) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `class_id`, `instructor_id`, `lesson_date`, `start_time`, `end_time`, `participants`, `status`) VALUES
(13, 1, 1, '2019-10-24', '08:00:00', '09:00:00', 0, 'done'),
(14, 2, 2, '2019-10-24', '13:00:00', '14:00:00', 0, 'done'),
(15, 3, 3, '2019-10-25', '11:00:00', '12:00:00', 1, 'done'),
(16, 4, 4, '2019-10-25', '20:00:00', '21:00:00', 2, 'going'),
(17, 5, 5, '2019-10-26', '15:00:00', '16:00:00', 1, 'going'),
(18, 6, 6, '2019-10-26', '18:00:00', '19:00:00', 0, 'waiting'),
(19, 1, 1, '2019-10-26', '09:00:00', '10:00:00', 0, 'waiting'),
(20, 7, 7, '2019-10-28', '06:00:00', '07:00:00', 0, 'waiting'),
(21, 8, 8, '2019-10-28', '19:00:00', '20:00:00', 0, 'waiting'),
(23, 2, 5, '2019-10-29', '18:00:00', '19:00:00', 0, 'waiting'),
(24, 1, 1, '2019-10-24', '08:00:00', '09:00:00', 1, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `ticket_type` varchar(20) NOT NULL,
  `ticket_details` text NOT NULL,
  `ticket_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_type`, `ticket_details`, `ticket_price`) VALUES
(1, '1', 'You can book 1 Lesson', 25),
(2, '3', 'You can book 3 Lessons \r\nget free 1 bottle water', 60),
(3, '5', 'You can book 5 Lessons\r\nget free 5 bottle water', 90),
(4, '10', 'You can book 10 Lessons\r\nget free 10 bottle water \r\nand free towels', 160);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` date NOT NULL,
  `loginid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `gender`, `birthday`, `loginid`) VALUES
(4, 'admin', 'admin', 'male', '2019-10-22', 4),
(8, 'eri', 'koshiishi', 'female', '2019-10-24', 8),
(9, 'john', 'k', 'male', '2019-10-25', 9);

-- --------------------------------------------------------

--
-- Table structure for table `userSchedule`
--

CREATE TABLE `userSchedule` (
  `us_id` int(11) NOT NULL,
  `loginid` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `booked_Ldate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `us_status` varchar(10) NOT NULL DEFAULT 'booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userSchedule`
--

INSERT INTO `userSchedule` (`us_id`, `loginid`, `schedule_id`, `booked_Ldate`, `us_status`) VALUES
(11, 8, 24, '2019-10-23 16:00:00', 'booked'),
(12, 8, 15, '2019-10-24 16:00:00', 'booked'),
(13, 8, 16, '2019-10-24 16:00:00', 'booked'),
(14, 8, 17, '2019-10-25 16:00:00', 'booked'),
(15, 9, 16, '2019-10-24 16:00:00', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `userTicket`
--

CREATE TABLE `userTicket` (
  `user_ticket_id` int(11) NOT NULL,
  `loginid` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `ticket_amount` int(11) NOT NULL,
  `ticket_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userTicket`
--

INSERT INTO `userTicket` (`user_ticket_id`, `loginid`, `ticket_id`, `ticket_amount`, `ticket_date`) VALUES
(7, 1, 1, 1, '2019-10-14 04:23:50'),
(8, 1, 2, 3, '2019-10-14 04:24:10'),
(9, 1, 3, 5, '2019-10-15 01:09:21'),
(10, 1, 1, -1, '2019-10-15 02:00:38'),
(11, 1, 2, -1, '2019-10-15 02:03:26'),
(12, 1, 1, -1, '2019-10-16 11:22:20'),
(13, 1, 1, -1, '2019-10-22 01:11:58'),
(14, 1, 2, 2, '2019-10-22 08:09:47'),
(15, 5, 2, 2, '2019-10-22 23:30:17'),
(16, 1, 2, 1, '2019-10-23 04:46:41'),
(17, 1, 1, -1, '2019-10-23 12:35:58'),
(18, 1, 1, -1, '2019-10-23 12:36:10'),
(19, 1, 2, 3, '2019-10-24 03:17:28'),
(20, 7, 1, 1, '2019-10-24 16:48:49'),
(21, 8, 2, 2, '2019-10-25 00:15:15'),
(22, 8, 3, 2, '2019-10-25 00:18:37'),
(23, 9, 1, 1, '2019-10-25 03:37:53'),
(24, 9, 2, 2, '2019-10-25 03:38:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userSchedule`
--
ALTER TABLE `userSchedule`
  ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `userTicket`
--
ALTER TABLE `userTicket`
  ADD PRIMARY KEY (`user_ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userSchedule`
--
ALTER TABLE `userSchedule`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userTicket`
--
ALTER TABLE `userTicket`
  MODIFY `user_ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
