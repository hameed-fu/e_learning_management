-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2024 at 04:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_ak`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `instructor_id`, `lecture_id`, `title`, `description`, `due_date`) VALUES
(1, 1, 3, 'title Intro', 'title Intro', '2024-07-05'),
(4, 1, 3, 'Intro', 'description', '2024-07-05'),
(5, 1, 3, 'Intro', 'Modified', '2024-07-05'),
(6, 1, 3, 'Intro', 'description', '2024-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE `assignment_submission` (
  `submission_id` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `submission_date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`) VALUES
(1, 'Web designing', 'Nostrud veniam do s'),
(2, 'Programing', 'test\r\n'),
(3, 'Business', '');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `student-id` varchar(13) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `from_date` int(11) NOT NULL,
  `to_date` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `certificate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `lecture_id` varchar(13) NOT NULL,
  `comments` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_description` text NOT NULL,
  `category_id` varchar(11) NOT NULL,
  `number_of_students` varchar(40) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `category_id`, `number_of_students`, `start_date`, `end_date`) VALUES
(1, 'Web Development', '343', '3', '50', '2024-06-01', '2024-06-30'),
(2, 'Web desining', '343', '2', '50', '2024-06-01', '2024-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` varchar(13) NOT NULL,
  `course_id` varchar(13) NOT NULL,
  `enrollment_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `first_name`, `last_name`, `email`, `password`, `phone`) VALUES
(1, 'Kainat', 'Noor', 'k@gmail.com', 'Slade', '9876545678'),
(2, 'Aman', 'Amna', 'amna@gmail.com', '12345678', '2323232323'),
(3, 'Faith', 'Est soluta ex dolor ', 'Amal', 'Boris', '+1 (802) 633-9741'),
(4, 'Leo', 'Ab nobis ea officia ', 'Jermaine', 'Lila', '+1 (275) 168-5851'),
(5, 'Micah', 'Ipsa sunt pariatur', 'Shelley', 'Hedley', '+1 (783) 293-6795'),
(6, 'Kyla', 'Tempora dolor doloru', 'Rajah', 'Erasmus', '+1 (445) 703-8538'),
(7, 'Sheraz khan', 'OK', 'sheraz@gmail.com', '12345678', '343343'),
(8, 'Ali', 'khan', 'ali@gmail.com', '12345678', '90909090'),
(9, 'Kainat', 'test', 'Kainat@gmail.com', '12345678', '12345678987654');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lecture_id` int(11) NOT NULL,
  `instructor_id` varchar(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject_id` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `content_URL` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `instructor_id`, `title`, `subject_id`, `description`, `content_URL`, `creation_date`, `last_updated`) VALUES
(3, '2', 'Leture one', '6', 'Voluptatem Officia ', 'Nichole Farley', '2024-07-01 05:50:47', '2024-06-14 08:28:54'),
(4, '  6', ' Margaret Arnold', ' 1', 'Modi sit distinctio', 'Malachi Bush', '2024-06-14 03:29:02', '2024-06-14 08:29:02'),
(5, '  2', ' fsafsdafds', ' 6', 'test', 'test', '2024-06-24 03:04:40', '2024-06-24 08:04:40'),
(6, '  9', ' test', ' 1', 'tst', 'http://localhost/lms/backend/add_lectures.php', '2024-06-24 03:25:08', '2024-06-24 08:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `course_id`, `message`, `date_created`) VALUES
(3, '2', '1', 'Saba rashae college ta + juice', '2024-07-06'),
(4, '3', '1', 'OKOKOK', ''),
(5, '2', '2', 'tst', '2024-06-25 07:37:57'),
(6, '1', '1', 'Sba chai rawrae', '2024-07-01 07:58:57'),
(7, '3', '2', 'Et tenetur distincti', '2024-07-02'),
(8, '2', '2', 'sba ba chuti v', '2024-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(11) NOT NULL,
  `last_name` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`) VALUES
(1, 'Keith', 'Stuart', 'neqequ@mailinator.com', 'Pa$$w0rd!', '9876545678', 'Sandra'),
(3, 'Wyatt', 'Kirby', 'xeje@mailinator.com', 'Pa$$w0rd!', 'Kato', 'Yvonne');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `title` varchar(200) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `code` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `course_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`title`, `subject_id`, `code`, `description`, `course_id`) VALUES
('Computer Science', 1, '3re', 'fdsafdsa', '2'),
('HTML', 5, 'HTML-23232', 'Modified', '2'),
('PHP', 6, '343', '', '3'),
('Photoshop', 7, '34343', '', '2'),
('CSS', 8, 'fdsfd', '', '1'),
('DEMO', 9, 'de', '', '1'),
('Raja Osborne', 10, 'Jack Diaz', '', '1'),
('English', 11, '0987899878', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `instructor-id` (`instructor_id`),
  ADD KEY `lecture-id` (`lecture_id`);

--
-- Indexes for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `student-id` (`student_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `course-id` (`course_id`),
  ADD KEY `from-date` (`from_date`),
  ADD KEY `student-id` (`student-id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user-id` (`user_id`),
  ADD KEY `lecture-id` (`lecture_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student-id` (`student_id`),
  ADD KEY `course-id` (`course_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course-id` (`course_id`);

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
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
