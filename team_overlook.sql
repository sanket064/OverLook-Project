-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2019 at 02:51 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vikrantr_overlook`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(255) NOT NULL,
  `assignment_name` varchar(255) DEFAULT NULL,
  `assignment_class_id` int(255) DEFAULT NULL,
  `assignment_teacher_name` varchar(255) DEFAULT NULL,
  `assignment_date_given` date DEFAULT NULL,
  `assignment_date_due` date DEFAULT NULL,
  `assignment_term` varchar(255) DEFAULT NULL,
  `assignment_description` varchar(255) DEFAULT NULL,
  `assignment_credits` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `assignment_name`, `assignment_class_id`, `assignment_teacher_name`, `assignment_date_given`, `assignment_date_due`, `assignment_term`, `assignment_description`, `assignment_credits`) VALUES
(63, 'Front-End Site', 11, 'Mustafa', NULL, '2019-08-23', '1', 'Build a cool front end design', '2'),
(62, 'React Website', 5, 'Mustafa', NULL, '2019-08-23', '1', 'Build a website using React', '4'),
(61, 'Business Strategies', 3, 'Patrick', NULL, '2019-08-23', '1', 'Create a business strategy for an application', '1'),
(60, 'SEO Website', 13, 'Patrick', NULL, '2019-08-23', '1', 'Find the SEO flaws in this website', '1'),
(59, 'Plugins', 7, 'Saurav', NULL, '2019-08-23', '1', 'Build your own plugin', '2'),
(58, 'Wordpress Website', 1, 'Saurav', NULL, '2019-08-23', '1', 'Build a great Wordpress website', '1'),
(57, 'Application Design', 10, 'Shuwen', NULL, '2019-08-23', '1', 'Design a wonderful user interface', '4'),
(55, 'Login Form', 2, 'Nathan', NULL, '2019-08-23', '1', 'Build a login system from scratch', '2'),
(56, 'Mobile Typography', 4, 'Shuwen', NULL, '2019-08-23', '1', 'Design a beautiful mobile design', '4'),
(54, 'MVC Frameworks', 9, 'Nathan', NULL, '2019-08-23', '1', 'Build a MVC from scratch', '4');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classes_id` int(255) NOT NULL,
  `classes_term` varchar(255) DEFAULT NULL,
  `classes_name` varchar(255) DEFAULT NULL,
  `classes_description` text,
  `classes_teacher` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classes_id`, `classes_term`, `classes_name`, `classes_description`, `classes_teacher`) VALUES
(1, '1', 'Wordpress', 'Wordpress development course, 6 months of learning absolutely nothing. No notes will be given to you. If you miss a class we will ensure that you do not learn anything from us.', 'Saurav'),
(2, '1', 'Programming Logic', 'You are supposed to figure out loops, arrays, closures, bind, call, tap and more', 'Nathan'),
(3, '1', 'Business', 'Business and marketing for digital based products in important', 'Patrick'),
(4, '1', 'UI/UX Design', 'User Interface design is important for all devices to show data.', 'Shuwen '),
(5, '1', 'Advanced Front-End', 'Learning how to use the latest front end development technology to create robust design', 'Mustafa '),
(6, '1', 'API Development', 'Learn how to connect to API\'s and servers.', 'Dan'),
(7, '2', 'Advanced Wordpress', 'Wordpress development course, 6 months of learning absolutely nothing. No notes will be given to you. If you miss a class we will ensure that you do not learn anything from us.', 'Saurav'),
(8, '1', 'Javascript Basics', 'The basic principles and logic that go behind javaScript development', 'Nathan'),
(9, '1', 'MVC Frameworks', 'Learn how MVC functions, build a website and make a CMS', 'Nathan'),
(10, '1', 'Mobile Design', 'User Interface design is important for all devices to show data.', 'Shuwen '),
(11, '1', 'SASS', 'Learning how to use the latest front end development technology to create robust design', 'Mustafa '),
(12, '1', 'HTML & CSS', 'Learn the basics of web development', 'Nathan'),
(13, '1', 'Marketing', 'Marketing for digital based products in important', 'Patrick'),
(14, '1', 'Application Programming Interface', 'Learning how to use the latest front end development technology to create robust design', 'Dan');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(255) NOT NULL,
  `student_assignment` varchar(255) DEFAULT NULL,
  `student_assignment_student_id` int(255) DEFAULT NULL,
  `student_assignment_assignment_id` int(255) DEFAULT NULL,
  `student_assignment_date_submitted` date DEFAULT NULL,
  `student_assignment_marks` int(255) DEFAULT NULL,
  `student_assignment_comments` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `student_assignment`, `student_assignment_student_id`, `student_assignment_assignment_id`, `student_assignment_date_submitted`, `student_assignment_marks`, `student_assignment_comments`) VALUES
(215, 'Screen Shot 2019-06-30 at 11.53.53 AM.png', 7, 63, '2019-08-23', NULL, NULL),
(213, NULL, 5, 63, NULL, NULL, NULL),
(214, NULL, 6, 63, NULL, NULL, NULL),
(212, NULL, 2, 63, NULL, NULL, NULL),
(210, NULL, 7, 62, NULL, NULL, NULL),
(211, 'Screen Shot 2019-07-06 at 1.22.29 PM.png', 1, 63, '2019-08-23', 97, 'I love the work'),
(209, NULL, 6, 62, NULL, NULL, NULL),
(208, NULL, 5, 62, NULL, NULL, NULL),
(207, NULL, 2, 62, NULL, NULL, NULL),
(206, 'about-icons-08.jpg', 1, 62, '2019-08-23', NULL, NULL),
(205, NULL, 7, 61, NULL, NULL, NULL),
(204, NULL, 6, 61, NULL, NULL, NULL),
(203, NULL, 5, 61, NULL, NULL, NULL),
(202, NULL, 2, 61, NULL, NULL, NULL),
(200, NULL, 7, 60, NULL, NULL, NULL),
(201, NULL, 1, 61, NULL, NULL, NULL),
(199, NULL, 6, 60, NULL, NULL, NULL),
(198, NULL, 5, 60, NULL, NULL, NULL),
(197, NULL, 2, 60, NULL, NULL, NULL),
(196, NULL, 1, 60, NULL, NULL, NULL),
(195, 'Screen Shot 2019-07-03 at 7.32.10 PM.png', 7, 59, '2019-08-23', NULL, NULL),
(193, NULL, 5, 59, NULL, NULL, NULL),
(194, NULL, 6, 59, NULL, NULL, NULL),
(192, NULL, 2, 59, NULL, NULL, NULL),
(190, NULL, 7, 58, NULL, NULL, NULL),
(191, NULL, 1, 59, NULL, NULL, NULL),
(189, NULL, 6, 58, NULL, NULL, NULL),
(188, NULL, 5, 58, NULL, NULL, NULL),
(186, NULL, 1, 58, NULL, NULL, NULL),
(187, NULL, 2, 58, NULL, NULL, NULL),
(185, NULL, 7, 57, NULL, NULL, NULL),
(184, NULL, 6, 57, NULL, NULL, NULL),
(183, NULL, 5, 57, NULL, NULL, NULL),
(182, NULL, 2, 57, NULL, NULL, NULL),
(181, NULL, 1, 57, NULL, NULL, NULL),
(180, NULL, 7, 56, NULL, NULL, NULL),
(178, NULL, 5, 56, NULL, NULL, NULL),
(177, NULL, 2, 56, NULL, NULL, NULL),
(175, 'Screen Shot 2019-07-03 at 7.32.10 PM.png', 7, 55, '2019-08-23', NULL, NULL),
(176, NULL, 1, 56, NULL, NULL, NULL),
(173, NULL, 5, 55, NULL, NULL, NULL),
(174, NULL, 6, 55, NULL, NULL, NULL),
(172, NULL, 2, 55, NULL, NULL, NULL),
(170, NULL, 7, 54, NULL, NULL, NULL),
(171, 'Screen Shot 2019-07-03 at 11.49.39 AM.png', 1, 55, '2019-08-23', 95, 'Wonderful work, everything works'),
(169, NULL, 6, 54, NULL, NULL, NULL),
(167, NULL, 2, 54, NULL, NULL, NULL),
(168, NULL, 5, 54, NULL, NULL, NULL),
(166, NULL, 1, 54, NULL, NULL, NULL),
(179, NULL, 6, 56, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `rand_salt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_role`, `rand_salt`) VALUES
(1, 'vik', '$1$D3mZjl7d$gkp0rkcCZppTWrYk5VaTT/', 'Vikrant', 'Rajan', 'vikrantrajan93@gmail.com', 'Student', '$2y$10$iusesomecrazystrings22'),
(2, 'Ahmed', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Ahmed', 'Mohamed', 'ahmed@vanarts.com', 'Student', '$2y$10$iusesomecrazystrings22'),
(3, 'nleggat', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Nathan', 'Leggat', 'nathan@vanarts.com', 'Teacher', '$2y$10$iusesomecrazystrings22'),
(4, 'patrick', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Patrick', 'S', 'patrick@vanarts.com', 'Teacher', '$2y$10$iusesomecrazystrings22'),
(5, 'jerry', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Jerry', 'Cruz', 'jerry@gmail.om', 'Student', '$2y$10$iusesomecrazystrings22'),
(6, 'Sam', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Sam', 'Wise', 'sam@gmail.com', 'Student', '$2y$10$iusesomecrazystrings22'),
(7, 'Holly', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Holly', 'Skweep', 'holly@gmail.com', 'Student', '$2y$10$iusesomecrazystrings22'),
(8, 'dan', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Dan', 'Brooks', 'danbrooks@gmail.com', 'Teacher', '$2y$10$iusesomecrazystrings22'),
(9, 'saurav', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Saurav', 'P', 'saurav@gmail.com', 'Teacher', '$2y$10$iusesomecrazystrings22'),
(10, 'shuwen', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Shuwen', 'Chang', 'shuwen@gmail.com', 'Teacher', '$2y$10$iusesomecrazystrings22'),
(11, 'mustafa', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Mustafa', 'Q', 'mustafa@gmail.com', 'Teacher', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classes_id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classes_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
