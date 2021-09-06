-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 01:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ca`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=deleted,1=active,2=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `code`, `unique_id`, `created_at`, `row_status`) VALUES
(1, 'CPT', 'cpt', '', '2019-07-22 12:55:20', 1),
(2, 'IPCC', 'ipcc', 'ipcc19_100002', '2019-07-22 12:55:20', 1),
(3, 'Final', 'final', '', '2019-07-22 12:55:20', 1),
(4, 'CPT(New)', 'cptn', '', '2019-07-22 12:55:20', 1),
(5, 'IPCC(New)', 'ipccn', '', '2019-07-22 12:55:20', 1),
(6, 'Final(New)', 'finaln', '', '2019-07-22 12:55:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `scheduled_date` datetime DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(60) NOT NULL,
  `syllabus` varchar(60) NOT NULL,
  `max_marks` int(11) NOT NULL,
  `time_out` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `scheduled_date`, `subject_id`, `subject_code`, `syllabus`, `max_marks`, `time_out`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, '1970-01-01 05:30:00', 1, 'Ac21', 'Accounts Haly Yearly', 50, 120, '2019-12-17 13:22:12', NULL, 1),
(2, 2, NULL, 2, '102', 'F Name', 12, 120, '2019-12-20 16:24:20', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `exam_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_downloads`
--

CREATE TABLE `exam_downloads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `evaluator_id` int(11) NOT NULL,
  `marks` decimal(2,2) NOT NULL,
  `out_of` decimal(2,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Downloaded,2= Answer Upload, 3 = Eva Download, 4 = Eva Upload, 5= Closed tab'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_downloads`
--

INSERT INTO `exam_downloads` (`id`, `user_id`, `exam_id`, `evaluator_id`, `marks`, `out_of`, `created_at`, `modified_at`, `row_status`) VALUES
(3, 2, 1, 0, '0.00', '0.00', '2019-12-17 17:57:50', '2019-12-17 17:58:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exam_plan_relation`
--

CREATE TABLE `exam_plan_relation` (
  `id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `scheduled_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = Active, 2 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_plan_relation`
--

INSERT INTO `exam_plan_relation` (`id`, `exam_id`, `plan_id`, `scheduled_date`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 1, 2, '2019-12-23', '2019-12-17 13:22:12', NULL, 1),
(2, 1, 4, NULL, '2019-12-17 13:22:12', NULL, 1),
(3, 1, 5, '2019-12-20', '2019-12-17 13:22:12', NULL, 1),
(4, 2, 1, NULL, '2019-12-20 16:24:20', NULL, 1),
(5, 2, 2, '2019-10-20', '2019-12-20 16:24:20', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `exam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `e_brochers`
--

CREATE TABLE `e_brochers` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `message`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 'gfgfg', '2019-12-18 17:46:55', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feeling_formal`
--

CREATE TABLE `feeling_formal` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_at` datetime NOT NULL,
  `logout_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `login_at`, `logout_at`) VALUES
(1, 1, '2019-12-20 16:30:26', '2019-12-20 16:38:03'),
(2, 2, '2019-12-18 13:12:39', '2019-12-13 17:53:09'),
(3, 3, '2019-12-20 16:39:05', '2019-12-20 16:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `main_videos`
--

CREATE TABLE `main_videos` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Completed,2=Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_videos`
--

INSERT INTO `main_videos` (`id`, `course_id`, `subject_id`, `title`, `url`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 1, 'Video1', 'https://www.youtube.com/embed/6Q5hwAo1WE0', '2019-12-18 15:13:57', NULL, 1),
(2, 2, 1, 'bhkbh', 'https://www.youtube.com/embed/6Q5hwAo1WE0', '2019-12-18 15:14:16', NULL, 1),
(3, 2, 4, 'TTTTT', 'https://www.youtube.com/embed/6Q5hwAo1WE0', '2019-12-18 16:50:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `question` varchar(225) NOT NULL,
  `choice1` varchar(225) NOT NULL,
  `choice2` varchar(225) NOT NULL,
  `choice3` varchar(225) NOT NULL,
  `choice4` varchar(225) NOT NULL,
  `answer` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`id`, `type_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 1, 'Question1', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice1', '2019-12-13 17:51:43', NULL, 1),
(2, 1, 'Question3', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice2', '2019-12-13 17:51:43', NULL, 1),
(3, 1, 'Question3', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice3', '2019-12-13 17:51:43', NULL, 1),
(4, 1, 'Question4', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice4', '2019-12-13 17:51:43', NULL, 1),
(5, 1, 'Question5', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice1', '2019-12-13 17:51:43', NULL, 1),
(6, 1, 'Question6', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice2', '2019-12-13 17:51:43', NULL, 1),
(7, 1, 'Question7', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice3', '2019-12-13 17:51:43', NULL, 1),
(8, 1, 'Question8', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice4', '2019-12-13 17:51:43', NULL, 1),
(9, 1, 'Question9', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice1', '2019-12-13 17:51:43', NULL, 1),
(10, 1, 'Question10', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice2', '2019-12-13 17:51:43', NULL, 1),
(11, 2, 'Question1', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice1', '2019-12-13 17:52:50', NULL, 1),
(12, 2, 'Question2', 'Choice1', 'Choice2', 'Choice3', 'Choice4', 'Choice2', '2019-12-13 17:52:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_results`
--

CREATE TABLE `mcq_results` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `scored` int(11) NOT NULL,
  `answers` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_results`
--

INSERT INTO `mcq_results` (`id`, `name`, `email`, `mobile`, `type_id`, `total`, `scored`, `answers`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'Mahesh', 'mahi@g.com', '8121815502', 1, 10, 4, '[\"Choice1\",\"Choice3\",\"Choice3\",\"Choice1\",\"Choice1\",\"Choice3\",\"Choice1\",\"Choice4\",\"Choice4\",\"Choice1\"]', '2019-12-13 17:54:14', NULL, 1),
(2, 'Yesh', 'tgy@gmai.com', '1234567892', 1, 10, 4, '[\"Choice2\",\"Choice1\",\"Choice3\",\"Choice4\",\"Choice4\",\"Choice3\",\"Choice3\",\"Choice4\",\"Choice4\",\"Choice3\"]', '2019-12-20 16:29:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_type`
--

CREATE TABLE `mcq_type` (
  `id` int(11) NOT NULL,
  `course` varchar(60) NOT NULL,
  `test` varchar(60) NOT NULL,
  `no_of_questions` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_type`
--

INSERT INTO `mcq_type` (`id`, `course`, `test`, `no_of_questions`, `description`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 'IPCC', 'Test1', 10, 'Noting', '2019-12-13 17:51:43', NULL, 1),
(2, 'IPCC', 'Test2', 2, 'noting', '2019-12-13 17:52:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `course_id`, `subject_id`, `title`, `url`, `created_at`, `row_status`) VALUES
(1, 2, 1, 'bhkbh', '', '2019-12-18 15:11:54', 1),
(2, 2, 2, 'Law', '', '2019-12-18 15:12:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `notification` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `row_status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0=Deleted,1=Completed,2=Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `notification`, `created_at`, `row_status`) VALUES
(1, 1, 'Welcome To CA Exam Series', 'CA Exam Series Heartly Welcoming You.', '2019-12-12 11:12:27', 2),
(2, 2, 'Welcome To CA Exam Series', 'CA Exam Series Heartly Welcoming You.', '2019-12-13 17:30:07', 2),
(3, 3, 'Welcome To CA Exam Series', 'CA Exam Series Heartly Welcoming You.', '2019-12-20 16:39:05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = General, 1 = Group 1, 2 = Group 2, 3 = Both Groups',
  `subject_id` int(11) DEFAULT NULL,
  `subject_name` varchar(100) NOT NULL,
  `actual_price` float NOT NULL,
  `discount_price` float NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `course_id`, `plan_id`, `type`, `subject_id`, `subject_name`, `actual_price`, `discount_price`, `description`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 5, 1, NULL, 'Group 1', 1996, 1799, '12 Unit Exams:@8 Full Syllabus Exams:@100% Coverage:@Systematic Schedule:@Description5', '2019-12-13 13:33:47', NULL, 1),
(2, 2, 5, 2, NULL, 'Group 2', 1500, 1200, 'Description1:@Description2:@Description3:@Description4:@Description5', '2019-12-13 18:52:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_purchase`
--

CREATE TABLE `package_purchase` (
  `id` int(11) NOT NULL,
  `track_id` varchar(30) NOT NULL,
  `cart_packages` text NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_purchase`
--

INSERT INTO `package_purchase` (`id`, `track_id`, `cart_packages`, `subtotal`, `discount`, `grand_total`, `discount_id`, `user_id`, `created_at`, `modified_at`, `row_status`) VALUES
(1, '1576246761163', '1,2', '2999', '0', '2999', 0, 2, '2019-12-13 19:49:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module` tinyint(4) NOT NULL COMMENT '1=Chapter, 2=Section, 3=Unit ',
  `plan_code` varchar(20) NOT NULL,
  `plan_type` enum('scheduled','unscheduled','','') NOT NULL,
  `plan` varchar(150) NOT NULL,
  `headerbox` text NOT NULL,
  `downbox` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `course_id`, `module`, `plan_code`, `plan_type`, `plan`, `headerbox`, `downbox`, `description`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 1, 'ipcc_superior', 'unscheduled', 'Superior', 'Winners Choice', 'Winners Choice', 'You Plan Your Exam:@Each Chapter = 1 Exam:@120+ Exams:@14 Mock Exams :@100% Coverage ', '2019-12-02 15:33:43', NULL, 1),
(2, 2, 1, 'ipcc_premier', 'scheduled', 'Premier', 'Achiever\'s Choice ', 'Winners Choice', 'You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam', '2019-12-02 15:34:54', NULL, 1),
(3, 2, 2, 'ipcc_dimand', 'unscheduled', 'Dimand', 'Succeeder\'s   Choice ', 'Winners Choice', 'You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam', '2019-12-02 15:35:58', NULL, 1),
(4, 2, 2, 'ipcc_platinum', 'scheduled', 'Platinum', 'Performance\'s Choice', 'Winners Choice', 'You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam', '2019-12-02 15:36:58', NULL, 1),
(5, 2, 3, 'ipcc_gold', 'scheduled', 'GOLD', 'Winners Choice', 'Winners Choice', 'You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam', '2019-12-13 13:30:34', NULL, 1),
(6, 2, 3, 'ipcc_silver', 'scheduled', 'SILVER', 'Winners Choice', 'Winners Choice', 'You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam:@You Plan Your Exam', '2019-12-13 13:30:04', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` float NOT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `course_id`, `plan_id`, `name`, `code`, `discount`, `valid_from`, `valid_to`, `created_at`, `row_status`) VALUES
(1, 2, 5, 'MAHI', 'MAHI50', 10, '2019-12-11', '2019-12-20', '2019-12-13 18:09:37', 1),
(2, 2, 5, 'SA120', 'SA1220', 10, '2019-12-20', '2019-12-20', '2019-12-20 16:37:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo_discount`
--

CREATE TABLE `promo_discount` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requestcallback`
--

CREATE TABLE `requestcallback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `reason` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 3 COMMENT '0=Deleted,1=Completed,2=Processing,3=Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL,
  `unique_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `code`, `unique_id`) VALUES
(1, 'Super Admin', '', ''),
(2, 'User', '', ''),
(3, 'Evaluator', 'EVA', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `course_id`, `plan_id`, `file_name`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 2, 'dummy.pdf', '2019-12-13 16:18:48', NULL, 1),
(2, 2, 3, 'dummy.pdf', '2019-12-13 16:19:10', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `setting_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `row_status_cd` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-Deleted 1-Active 2-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `setting_type`, `description`, `created_by`, `created_at`, `modified_by`, `modified_at`, `row_status_cd`) VALUES
(1, 'system_name', 'CA Exam Series', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(2, 'system_title', 'your success begins Here', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(3, 'address', 'Hyderabad', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(4, 'mobile', '9603960346', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(5, 'system_email', 'info@caexamseries.com', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(6, 'email_password', '123123', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(7, 'sms_username', 'info@123', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(8, 'sms_sender', 'TRAIL', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(9, 'sms_hash', 'HASH', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(10, 'privacy', '<h1>Privacy Policy</h1>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Please read the following terms and conditions carefully as it sets out the terms of a legally binding agreement between you (the reader) and Business Standard Private Limited.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>1) Introduction</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>This following sets out the terms and conditions on which you may use the content on&nbsp;<br />\r\n	<a href=\"http://www.business-standard.com/\" target=\"_blank\">business-standard.com</a>&nbsp;website, business-standard.com&#39;s mobile browser site, Business Standard instore Applications and other digital publishing services (<a href=\"http://www.smartinvestor.in/\" target=\"_blank\">www.smartinvestor.in</a>,&nbsp;<a href=\"http://www.bshindi.com/\" target=\"_blank\">www.bshindi.com</a>&nbsp;and&nbsp;<a href=\"http://www.bsmotoring.com/\" target=\"_blank\">www.bsmotoring,com</a>) owned by Business Standard Private Limited, all the services herein will be referred to as Business Standard Content Services.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>2) Registration Access and Use</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>We welcome users to register on our digital platforms. We offer the below mentioned registration services which may be subject to change in the future. All changes will be appended in the terms and conditions page and communicated to existing users by email.</p>\r\n\r\n	<p>Registration services are offered for individual subscribers only. If multiple individuals propose to access the same account or for corporate accounts kindly contact or write in to us. Subscription rates will vary for multiple same time access.</p>\r\n\r\n	<p>The nature and volume of Business Standard content services you consume on the digital platforms will vary according to the type of registration you choose, on the geography you reside or the offer you subscribe to.</p>\r\n\r\n	<p>a) Free Registration</p>\r\n\r\n	<p>b) Premium Registration</p>\r\n\r\n	<p>c) Special Offers</p>\r\n\r\n	<p>d) Combo registrations with partners</p>\r\n\r\n	<p>The details of the services and access offered for each account have been listed on&nbsp;<br />\r\n	<a href=\"http://www.business-standard.com/subscription-cart/product\" target=\"_blank\">www.business-standard.com/subscription-cart/product</a></p>\r\n\r\n	<p>We may in exceptional circumstances cease to provide subscription services. We will give you at least 7 days notice of this, if possible. If we do so, then we will have no further obligation to you.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>3) Privacy Policy and Registration</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>All information received by us from your registration on business-standard.com or other digital products of Business Standard will be used by Business Standard in accordance with our Privacy Policy. Kindly read the below mentioned details.</p>\r\n\r\n	<p>On registration, we expect you to provide Business Standard with an accurate and complete information of the compulsory fields. We also expect you to keep the information secure, specifically access passwords and payment information. Kindly update the information periodically to keep your account relevant. Business Standard will rely on any information you provide to us.</p>\r\n\r\n	<p>Each registration is for a single user only. On registration, you will choose a user name and password (&quot;ID&quot;). You are not allowed to share your ID or give access to your account to anyone else. Business Standard Premium subscription does not allow multiple users on a network or within an organization to use the same ID.</p>\r\n\r\n	<p>On knowledge, Business Standard may cancel or suspend your access to Business Standard premium services if it comes across you sharing your personal access without further obligation to you.</p>\r\n\r\n	<p>You are responsible for all the use of business-standard.com premium service made by you or anyone else using your ID and for preventing unauthorised use of your ID. If you believe there has been any breach of security such as the disclosure, theft or unauthorised use of your ID or any payment information, you must notify Business Standard immediately by e-mailing us at&nbsp;<a href=\"https://www.business-standard.com/issue-report/report\">assist@bsmail.in</a>. We recommend that you do not select an obvious user password (such as your name) and that you change it regularly.</p>\r\n\r\n	<p>If you provide Business Standard with an email address that will result in any messages Business Standard may send you being sent to you via a network or device operated or owned by a third party (e.g. your employer or college) then you promise that you are entitled to receive those messages. To ensure email&#39;s land in your inbox, you will add the bsmail receipt id to your safe list. You also agree that Business Standard may stop sending messages to you without notifying you.</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Important&nbsp;- Kindly note</p>\r\n	</li>\r\n	<li>\r\n	<p>(A) When you participate and choose to subscribe to joint content subscription offers that Business Standard partners with; your email id, access password and entered personal information will be shared with the participating content partner brand via an encrypted server to server protocol. This sharing is to facilitate your seamless access across the partner brand&#39;s platform. Once you login to the partner brand&#39;s platform, specific terms and privacy policies of the partner brand (mentioned on its website) will apply.</p>\r\n	</li>\r\n	<li>\r\n	<p>(B) Joint offers including special price offers are generally limited to new users on the partner sites. Clubbed Offers on partner sites will not be available to you should your email id be registered with the partner website.<br />\r\n	<br />\r\n	You are advised to study the offer before you subscribe.<br />\r\n	<br />\r\n	Merely subscribing to such a joint offer does not make you eligible to gain access to the partner platform. Business Standard does not take responsibility of providing you with an access on the partner site for existing users/subscribers of these sites.</p>\r\n	</li>\r\n	<li>\r\n	<p>(C) When you subscribe to joint offers supported by (non-content) brands; specific brands would ask you to share personal or private information in lieu of a value that the brand extends. By participating in such offers you implicitly and by confirming the terms of the offer you agree to share your registration information and personal data with the concerned brand. The brand or its associates may use this personal information to contact you with their promotional offers. Further by participating to such offers your will be additionally governed by the privacy policy and terms and conditions of the concerned brand. You are advised to go through them carefully before you decide to opt in.</p>\r\n	</li>\r\n	<li>\r\n	<p>As a registered user of or subscriber to business-standard.com you may choose to use business-standard.com&#39;s &quot;Remember me&quot; log in feature that enables you to be logged in automatically to business-standard.com whenever you visit business-standard.com without having to manually log in each time. We recommend that you do not enable this feature on any computer that is or may be used by anyone other than you in order to prevent unauthorized access by third parties to both your subscription details and features of business-standard.com personal to you.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>4. Personal Subscription Services</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Personal subscription services include Business Standard premium access to behind the pay wall content. When you subscribe to Business Standard Premium access, you gain access to opinion pieces, comment and exclusive features specially chosen for you by the Business Standard editors.</p>\r\n\r\n	<p>The nature of content behind the pay wall is subject to change; the final decision of which lies with the Editor.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Types of subscription:</strong></p>\r\n\r\n	<p>Services may differ from country to country and the device from which you subscribe. Subscriptions packages and price may also vary in time.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Contract formation:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard will try to process your subscription promptly but does not guarantee that your subscription will be activated by any specified time. By submitting your payment and other subscription details, you are making an offer to us to buy a subscription. Your offer will only be accepted by us and a contract formed when we have successfully verified your payment details and email address, at which point we will provide you with access to your subscription. Business Standard reserves the right to reject any offer in its discretion, for any or no reason.</p>\r\n\r\n	<p>Business Standard may partner with third party content providers to offer bundled services, under which the payment for both the services will be collected by Business Standard. Business Standard will endeavor to provide a seamless access to all such third parties with a single one point access. There could be a gap in this seamless access due to a technology breakdown, temporary disconnection of the internet connection or any factors beyond the reasonable control of Business Standard. In such cases the contract will be formed once the access to the partner services are restored.</p>\r\n\r\n	<p>You are requested to read through the terms and conditions offered by content partners to Business Standard. Most partners offer bundled services for new users. Existing subscribers of partners are not eligible for bundled subscription. Should you happen to be one please note that the partner will be liable to reject your offer to subscribe under the bundled subscription not leading to contract formation as a result.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Payment details:</strong></p>\r\n\r\n	<p>When you purchase a subscription, you must provide us with complete and accurate payment information. By submitting payment details you promise that you are entitled to purchase a subscription using those payment details. If we do not receive payment authorization or any authorization is subsequently cancelled, we may immediately terminate or suspend your access to your subscription. In suspicious circumstances we may contact the issuing bank/payment provider and/or law enforcement authorities or other appropriate third parties. If you are entitled to a refund under these terms and conditions we will credit that refund to the card or other payment method you used to submit payment, unless it has expired in which case we will contact you.</p>\r\n\r\n	<p>Business Standard will use the services of quality third party payment service providers to process your payment. Payment options are primarily through credit card. Business Standard may offer other payment mechanisms from time to time.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Pricing:</strong></p>\r\n\r\n	<p>The subscription price will be made clear to you on our sign-up pages or otherwise during the sign-up process and may vary from time to time, by region or by country. You agree to pay the fees at the rates notified to you at the time you purchase your subscription. Subscription to premium services on Business Standard are generally of monthly frequency. Business Standard however may choose to offer fixed term or fixed payment frequency offers from time to time. The currency in which your subscription is payable will be specified during the order process, depending on the service and your country of residence. Eligibility for any discounts is ascertained at the time you subscribe and cannot be changed during the term of your subscription. We will always tell you in advance of any increase in the price of your subscription and offer you an opportunity to cancel it if you do not wish to pay the new price.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Taxes:</strong></p>\r\n\r\n	<p>Subscription and access to content services fall under the purview of Service Tax as per the current indirect taxation policy, Government of India. Taxes are applicable for consumption of content on the website and other products of Business Standard uniformly for customers based in India and outside the country. Unless otherwise indicated, prices stated on our website are inclusive of applicable Service Tax, any applicable value added tax (VAT) or other sales taxes.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Pricing errors:</strong></p>\r\n\r\n	<p>If we incorrectly state a price to you whether online or otherwise, we are not obliged to provide you with a subscription at that price, even if we have mistakenly accepted your offer to buy a subscription at that price, and we reserve the right to subsequently notify you of any pricing error. If we do this, you may cancel the subscription without any obligation to us and we will refund you any money you have paid us in full, or you may pay the correct price. If you refuse to exercise either of these choices then we may cancel your subscription and will refund you any money you have paid us in full. We will always act in good faith in determining whether a genuine pricing error has occurred.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Other costs:</strong></p>\r\n\r\n	<p>In addition to any subscription fees you pay, you are responsible for paying any internet connection or other telecommunications charges that you may incur by accessing the premium services or using the services available on it. For example, if you use any of our mobile services then your network operator may charge you for data or messaging services.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>5. Subscription Period, Renewal and Cancellation of Personal Subscriptions</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Renewals:</strong></p>\r\n\r\n	<p>If you chose to pay monthly, your subscription will continue until you tell us that you no longer wish to receive it, in which case you will stop paying the monthly fees. We will notify you at least 7 days in advance of any changes to the price in your subscription that will apply upon next monthly renewal.</p>\r\n\r\n	<p>Please visit the &quot;How to cancel&quot; section below for details of how to cancel your monthly subscription.</p>\r\n\r\n	<p>Unless you notify us before the end of your chosen subscription period that you no longer wish to receive it, your subscription will renew for another period as applicable. We will charge the subscription using the same card or other payment method that you previously used.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cancellation Policy</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>For Digital subscriptions by placing your order you agree that we may start your subscription immediately upon our accepting your order. This means that you are not entitled to a refund if you change your mind after we have provided you with access to your subscription.</p>\r\n\r\n	<p>Except as set out in the previous section, you do not have any right to cancel your subscription or any part of it until the end of your then current subscription period.</p>\r\n\r\n	<p>Although you may notify us of your intention to cancel at any time, such notice will only take effect at the end of your then current subscription period, and you will not receive a refund</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>How to cancel?</strong></p>\r\n\r\n	<p>You may notify us of your wish to cancel your subscription by contacting our Customer Services team at assist@bsmail.in. To enable us cancel your subscription please provide us with your complete name (as was in the subscription order form), Email address and Contact number clearly written out.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cancellation by us:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard reserves the right to suspend or terminate your subscription if you breach these terms and conditions, with or without notice and without further obligation to you. We may also suspend or terminate your subscription if we are prevented from providing services to you by circumstances beyond our control. If we terminate your subscription for any reason and/or permanently cease publishing business-standard.com, or cease to provide subscription services then, unless there are exceptional circumstances, we will provide you with a pro rata refund to your credit card. This means that we will refund you with any amounts that you have paid us in advance that relate to any remaining and unexpired period of your subscription.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cancellation of your registration:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>If you are a registered user, but not a subscriber, then Business Standard reserves the right to suspend or terminate your registration at any time, with or without notice and without further obligation to you. If you would like to cancel your registration then please contact our customer services team at assist@bsmail.in.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>6. Who Your Personal Subscription Contract is with</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>If you buy a Business-standard.com digital subscription and are resident in any country, then you will be contracting with Business Standard Private Limited, Nehru House, 4, Bahadur Shah Zafar Marg, New Delhi - 110 002</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>7. User Generated Content</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Business-standard.com includes comments sections, blogs and other interactive features that allow interaction between users and between users and Business Standard. We call the information posted by or contributed by users &quot;User Generated Content&quot; or &quot;UGC&quot;.</p>\r\n\r\n	<p>If you wish to view or participate by way of UGC then you must comply with specific rules and guidelines. We also recommend that you read our Comments Guidelines which provide further guidance in relation to commenting on Business-standard.com.</p>\r\n\r\n	<p>You are responsible for all the content of any of your UGC that you or we publish. You are financially responsible to us for any claim against us by any third party that your UGC is not in accordance with the UGC policy</p>\r\n\r\n	<p>You further agree that you will:</p>\r\n\r\n	<p>* Only publish UGC that is your original content and will not infringe the copyright or other rights of any third party when publishing UGC. Not post, link to or otherwise publish any UGC containing any form of advertising or promotion for goods and services or any spam or other form of unsolicited communication.</p>\r\n\r\n	<p>* Not post, link to or otherwise publish any UGC with recommendations to buy or not buy a particular share or other investment or which contain confidential information of another party or which otherwise have the purpose of affecting the price or value of any share or other investment.</p>\r\n\r\n	<p>* Not post, link to or otherwise publish any UGC that is threatening, offensive, libellous, indecent or otherwise unlawful.</p>\r\n\r\n	<p>* Not post comments that are discriminatory in nature, for example, comments which make attacks on the grounds of race, religion, sex, gender, sexual orientation, disability or age.</p>\r\n\r\n	<p>* Respectfully challenge different points of view but not personally attack other commentators.</p>\r\n\r\n	<p>* Not disguise the origin of any UGC and not impersonate any person or entity (including Business Standard employees or Forum guests or hosts) or misrepresent any connection with any person or entity.</p>\r\n\r\n	<p>* Not post or otherwise publish any UGC unrelated to the Forum or the Forum&#39;s topic.</p>\r\n\r\n	<p>* Not post or transmit any UGC that contains software viruses, files or code designed to interrupt, destroy or limit the functionality of Business-Standard.com or any computer software or equipment.</p>\r\n\r\n	<p>* Not collect or store other users personal data.</p>\r\n\r\n	<p>* Not restrict or inhibit any other user from using the Forums.</p>\r\n\r\n	<p>* Comply with the guidelines for commenting set out in our Commenting FAQ.</p>\r\n\r\n	<p>It is not possible for Business Standard to fully monitor all UGC published on business-standard.com but where we have actually received notice of any UGC that is potentially misleading, untrue, offensive, unlawful, infringes third party rights or is potentially in breach of these terms and conditions, then we will review that UGC, decide whether to remove it from business-standard.com and act accordingly. This may include banning a user from participation in UGC on Business-standard.com. If you believe that any UGC published on business-standard.com infringes any legal rights that you may have or is not allowed under these terms and conditions, please notify us immediately with specific details by contacting us at&nbsp;<a href=\"https://www.business-standard.com/issue-report/report\">assist@bsmail.in</a>&nbsp;or&nbsp;<a href=\"mailto:feedback@bsmail.in\">feedback@bsmail.in</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>8. Third Party Sites and Services</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Business-standard.com may contain links to other Internet websites or online and mobile services provided by independent third parties, including websites of our advertisers and sponsors (what we call &quot;Third Party Sites&quot;), either directly or through frames. Third Party Sites also include co-branded with Business Standard and so include Business Standard&#39;s trade marks.</p>\r\n\r\n	<p>It is your decision whether you purchase or use any third party products or services made available on or via Third Party Sites and you should read Section 9 below carefully. Our Privacy Policy does not apply to Third Party Sites.</p>\r\n\r\n	<p>Business-Standard.com contains advertising and sponsorship. Advertisers and sponsors are responsible for ensuring that material submitted for inclusion on Business-standard.com complies with international and national law. Business Standard is not responsible for any error or inaccuracy in advertising, incorrect links or sponsorship material.</p>\r\n\r\n	<p>Copyright in any software that is made available for download from Business-standard.com belongs to Business Standard or its suppliers or contributors. Your use of the software is governed by the terms of any licence agreement that may accompany or be included with the software. Do not install or use any of this software unless you agree to such licence agreement. Business Standard is not responsible for any technical or other issues that may happen if you download third party software.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>9. Our Responsibilities towards You</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>A summary of what this section means: this section is important and you should read it carefully. It makes clear to what extent, if any, Business Standard accepts responsibility (liability) to you for your use of Business-standard.com or in respect of any third party products or services that we refer to or advertisements or any other link to on business-standard.com. Unless you are a premium subscriber to Business-standard.com, we accept no financial responsibility to you arising from your use of business-standard.com or the content, advertisements and links published on business-standard.com. If you are a Business Standard premium service subscriber, we limit our financial responsibility to you arising from your use of Business-Standard.com and/or the Premium Services you consume on business-standard.com to the price you paid for your subscription.</p>\r\n\r\n	<p>In no circumstances do we accept responsibility for your use of Third Party Sites or services not limited to advertisements, links in respect of any Third Party Products. By Third Party Sites we mean websites, online or mobile services provided by third parties, including websites of advertisers and sponsors that may appear on business-standard.com. By Third Party Products we mean products or services provided by third parties.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limitations of content published on Business-Standard.com:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>All content published on Business-Standard.com (including any information we publish regarding Third Party Products) is only for your general information and entertainment purposes and is not intended to address your particular requirements. In particular, Content created by Business Standard, its syndication partners and including UGC and any other content provided by third parties and distributed by business-standard.com, does not constitute any form of advice, recommendation, representation, endorsement or arrangement by Business Standard. It is not intended to be and should not be relied upon by users in making (or refraining from making) any specific investment, purchase, sale or other decisions. Appropriate independent advice should be obtained before making any such decision, such as from a qualified financial adviser.</p>\r\n\r\n	<p>Any agreements, transactions or other arrangements made between you and any third party named on (or linked to from) Business-Standard.com are at your own responsibility and entered into at your own risk. Any information that you receive via Business-standard.com, whether or not it is classified as &quot;real time&quot;, may have stopped being current by the time it reaches you. Share price information may be rounded up/down and therefore may not be entirely accurate.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>What we promise:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard promises to develop and operate business-standard.com with reasonable skill and care and will use reasonable efforts to promptly remedy any faults of which it is aware or made aware of.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>What we do not promise:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard does not provide any promises or warranties other than defined above. The content is provided on an &quot;as is&quot; and &quot;as available&quot; basis. While the content creation team and its partners from whom content is syndicated make the best of their efforts to put together accurate, complete and authentic content, Business Standard and business-standard.com does not make any promises in respect of content published on its website and/or the services and functions available on or through business-standard.com or of the quality, completeness or accuracy of the information published on or linked to from business-standard.com other than as expressly stated above.</p>\r\n\r\n	<p>The above disclaimers apply to your use of Business-Standard.com. Without limiting the above, Business Standard is not liable for matters beyond its reasonable control. Business Standard does not control third party communications networks (including your internet service provider), the internet, acts of god or the acts of third parties.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Our financial responsibility to you:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>You agree that if we are in breach of these terms and conditions, we will only be responsible to you for any damages that you incur arising out of your use of Business-standard.com (to the extent that Business Standard&#39;s liability is not otherwise excluded by this section 9) as follows:</p>\r\n\r\n	<p>If you incur any loss as a result of using Business-Standard.com or any Content outside the scope of these terms and conditions, Business Standard accepts no responsibility (liability) to you for this.</p>\r\n\r\n	<p>You will be responsible for all claims, liabilities, damages, cost and expenses suffered or incurred as a result of your breach of these terms and conditions.</p>\r\n\r\n	<p>Business Standard will only be responsible for loss or damage you suffer which is the reasonably foreseeable result of Business-Standard&#39;s breach of a legal duty of care owed to you.</p>\r\n\r\n	<p>Business Standard will not be responsible to you for any loss or damage suffered by your business, such as lost data, lost profits or any business interruption.</p>\r\n\r\n	<p>If you have a premium subscription then you may terminate your subscription in writing to Business Standard. If business-standard.com is unavailable or inaccessible to you for more than 5 days in a 30 day period, as a result of the fault or failure of Business Standard, in which case we will refund you any amount that you have paid to us in advance that relates to any period which was still to run on your subscription. You may instead at your option receive a renewal to your subscription free-of-charge at the point of renewal.</p>\r\n\r\n	<p>The limitations of liability in this section 9 apply for the benefit of Business Standard, its affiliates, and all of their respective officers, directors, employees, agents or any company who we transfer our rights and obligations to in accordance with these terms and conditions.</p>\r\n\r\n	<p>To the full extent permitted by law you acknowledge and agree that our third party content and data suppliers have no liability whatsoever to you in respect of any of their data supplied to you as part of Business Standard.com</p>\r\n\r\n	<p>Business Standard&#39;s liability will not be limited in the case of death or personal injury directly caused by Business Standard&#39;s negligence in those countries where it is unlawful for Business Standard to seek to exclude such liability.</p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<h2>10. Choice of Law and Jurisdiction</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>If you are a user whose principal address or principal use of Business Standard Digital services occurs in any jurisdiction across the world then these terms and conditions will be subject to Indian law. In this case, to the extent possible in the applicable jurisdiction, both you and we agree that the competent courts in New Delhi, India will have non-exclusive jurisdiction to settle any dispute which may arise out of, under, or in connection with these terms and conditions.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>11. General</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>You may not license or transfer any of your rights under these terms and conditions. We may transfer any of our rights or obligations under these terms and conditions to any individual, organization or entity but if we do so we will ensure that any company/individual/entity to whom we transfer our rights or obligations will continue to honour your rights under them. Any resultant changes to the terms and conditions will be intimated to you via email and updated on this website.</p>\r\n\r\n	<p>If any provision of these terms and conditions is found to be invalid by any court having competent jurisdiction, the invalidity of that provision will not affect the validity of the remaining provisions of these terms and conditions, which will remain in full force and effect.</p>\r\n\r\n	<p>Failure by either party to exercise any right or remedy under these terms and conditions does not constitute a waiver of that right or remedy. Headings in these terms and conditions are for convenience only and will have no legal meaning or effect.</p>\r\n\r\n	<p>These terms and conditions constitute the entire agreement between you and Business Standard Private Limited for your use of the Business Standard website, Business Standard mobile and other digital products and services from Business Standard. They supersede all previous communications, representations and arrangements, either written or oral.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>12. Content ownership</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>All Content created and published on the digital platforms under the url http://www.business-standard.com the mobile browser site, applications, Business Standard E-paper belong to Business Standard Private Limited and its licensors who own all intellectual property rights (including copyright and database rights) No intellectual property rights in any of the content are transferred to you while you consume the content on this platform. &quot;BS&quot; and &quot;Business Standard&quot; are registered trade marks of Business Standard Private Limited and you may not use them without prior written permission from Business Standard. You are permitted to use the content on this platform only as set out in our Copyright Policy.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>13. Changes to Terms and Conditions and Validity</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>These terms and conditions were published on 1st June 2016 and replace with immediate effect the terms and conditions previously published.</p>\r\n	</li>\r\n</ul>\r\n', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1);
INSERT INTO `settings` (`settings_id`, `setting_type`, `description`, `created_by`, `created_at`, `modified_by`, `modified_at`, `row_status_cd`) VALUES
(11, 'terms', '<h1 style=\"text-align: center;\"><span style=\"color:#FF0000\">Terms &amp; Conditions</span></h1>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Please read the following terms and conditions carefully as it sets out the terms of a legally binding agreement between you (the reader) and Business Standard Private Limited.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>1) Introduction</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>This following sets out the terms and conditions on which you may use the content on&nbsp;<br />\r\n	<a href=\"http://www.business-standard.com/\" target=\"_blank\">business-standard.com</a>&nbsp;website, business-standard.com&#39;s mobile browser site, Business Standard instore Applications and other digital publishing services (<a href=\"http://www.smartinvestor.in/\" target=\"_blank\">www.smartinvestor.in</a>,&nbsp;<a href=\"http://www.bshindi.com/\" target=\"_blank\">www.bshindi.com</a>&nbsp;and&nbsp;<a href=\"http://www.bsmotoring.com/\" target=\"_blank\">www.bsmotoring,com</a>) owned by Business Standard Private Limited, all the services herein will be referred to as Business Standard Content Services.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>2) Registration Access and Use</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>We welcome users to register on our digital platforms. We offer the below mentioned registration services which may be subject to change in the future. All changes will be appended in the terms and conditions page and communicated to existing users by email.</p>\r\n\r\n	<p>Registration services are offered for individual subscribers only. If multiple individuals propose to access the same account or for corporate accounts kindly contact or write in to us. Subscription rates will vary for multiple same time access.</p>\r\n\r\n	<p>The nature and volume of Business Standard content services you consume on the digital platforms will vary according to the type of registration you choose, on the geography you reside or the offer you subscribe to.</p>\r\n\r\n	<p>a) Free Registration</p>\r\n\r\n	<p>b) Premium Registration</p>\r\n\r\n	<p>c) Special Offers</p>\r\n\r\n	<p>d) Combo registrations with partners</p>\r\n\r\n	<p>The details of the services and access offered for each account have been listed on&nbsp;<br />\r\n	<a href=\"http://www.business-standard.com/subscription-cart/product\" target=\"_blank\">www.business-standard.com/subscription-cart/product</a></p>\r\n\r\n	<p>We may in exceptional circumstances cease to provide subscription services. We will give you at least 7 days notice of this, if possible. If we do so, then we will have no further obligation to you.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>3) Privacy Policy and Registration</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>All information received by us from your registration on business-standard.com or other digital products of Business Standard will be used by Business Standard in accordance with our Privacy Policy. Kindly read the below mentioned details.</p>\r\n\r\n	<p>On registration, we expect you to provide Business Standard with an accurate and complete information of the compulsory fields. We also expect you to keep the information secure, specifically access passwords and payment information. Kindly update the information periodically to keep your account relevant. Business Standard will rely on any information you provide to us.</p>\r\n\r\n	<p>Each registration is for a single user only. On registration, you will choose a user name and password (&quot;ID&quot;). You are not allowed to share your ID or give access to your account to anyone else. Business Standard Premium subscription does not allow multiple users on a network or within an organization to use the same ID.</p>\r\n\r\n	<p>On knowledge, Business Standard may cancel or suspend your access to Business Standard premium services if it comes across you sharing your personal access without further obligation to you.</p>\r\n\r\n	<p>You are responsible for all the use of business-standard.com premium service made by you or anyone else using your ID and for preventing unauthorised use of your ID. If you believe there has been any breach of security such as the disclosure, theft or unauthorised use of your ID or any payment information, you must notify Business Standard immediately by e-mailing us at&nbsp;<a href=\"https://www.business-standard.com/issue-report/report\">assist@bsmail.in</a>. We recommend that you do not select an obvious user password (such as your name) and that you change it regularly.</p>\r\n\r\n	<p>If you provide Business Standard with an email address that will result in any messages Business Standard may send you being sent to you via a network or device operated or owned by a third party (e.g. your employer or college) then you promise that you are entitled to receive those messages. To ensure email&#39;s land in your inbox, you will add the bsmail receipt id to your safe list. You also agree that Business Standard may stop sending messages to you without notifying you.</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Important&nbsp;- Kindly note</p>\r\n	</li>\r\n	<li>\r\n	<p>(A) When you participate and choose to subscribe to joint content subscription offers that Business Standard partners with; your email id, access password and entered personal information will be shared with the participating content partner brand via an encrypted server to server protocol. This sharing is to facilitate your seamless access across the partner brand&#39;s platform. Once you login to the partner brand&#39;s platform, specific terms and privacy policies of the partner brand (mentioned on its website) will apply.</p>\r\n	</li>\r\n	<li>\r\n	<p>(B) Joint offers including special price offers are generally limited to new users on the partner sites. Clubbed Offers on partner sites will not be available to you should your email id be registered with the partner website.<br />\r\n	<br />\r\n	You are advised to study the offer before you subscribe.<br />\r\n	<br />\r\n	Merely subscribing to such a joint offer does not make you eligible to gain access to the partner platform. Business Standard does not take responsibility of providing you with an access on the partner site for existing users/subscribers of these sites.</p>\r\n	</li>\r\n	<li>\r\n	<p>(C) When you subscribe to joint offers supported by (non-content) brands; specific brands would ask you to share personal or private information in lieu of a value that the brand extends. By participating in such offers you implicitly and by confirming the terms of the offer you agree to share your registration information and personal data with the concerned brand. The brand or its associates may use this personal information to contact you with their promotional offers. Further by participating to such offers your will be additionally governed by the privacy policy and terms and conditions of the concerned brand. You are advised to go through them carefully before you decide to opt in.</p>\r\n	</li>\r\n	<li>\r\n	<p>As a registered user of or subscriber to business-standard.com you may choose to use business-standard.com&#39;s &quot;Remember me&quot; log in feature that enables you to be logged in automatically to business-standard.com whenever you visit business-standard.com without having to manually log in each time. We recommend that you do not enable this feature on any computer that is or may be used by anyone other than you in order to prevent unauthorized access by third parties to both your subscription details and features of business-standard.com personal to you.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>4. Personal Subscription Services</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Personal subscription services include Business Standard premium access to behind the pay wall content. When you subscribe to Business Standard Premium access, you gain access to opinion pieces, comment and exclusive features specially chosen for you by the Business Standard editors.</p>\r\n\r\n	<p>The nature of content behind the pay wall is subject to change; the final decision of which lies with the Editor.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Types of subscription:</strong></p>\r\n\r\n	<p>Services may differ from country to country and the device from which you subscribe. Subscriptions packages and price may also vary in time.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Contract formation:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard will try to process your subscription promptly but does not guarantee that your subscription will be activated by any specified time. By submitting your payment and other subscription details, you are making an offer to us to buy a subscription. Your offer will only be accepted by us and a contract formed when we have successfully verified your payment details and email address, at which point we will provide you with access to your subscription. Business Standard reserves the right to reject any offer in its discretion, for any or no reason.</p>\r\n\r\n	<p>Business Standard may partner with third party content providers to offer bundled services, under which the payment for both the services will be collected by Business Standard. Business Standard will endeavor to provide a seamless access to all such third parties with a single one point access. There could be a gap in this seamless access due to a technology breakdown, temporary disconnection of the internet connection or any factors beyond the reasonable control of Business Standard. In such cases the contract will be formed once the access to the partner services are restored.</p>\r\n\r\n	<p>You are requested to read through the terms and conditions offered by content partners to Business Standard. Most partners offer bundled services for new users. Existing subscribers of partners are not eligible for bundled subscription. Should you happen to be one please note that the partner will be liable to reject your offer to subscribe under the bundled subscription not leading to contract formation as a result.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Payment details:</strong></p>\r\n\r\n	<p>When you purchase a subscription, you must provide us with complete and accurate payment information. By submitting payment details you promise that you are entitled to purchase a subscription using those payment details. If we do not receive payment authorization or any authorization is subsequently cancelled, we may immediately terminate or suspend your access to your subscription. In suspicious circumstances we may contact the issuing bank/payment provider and/or law enforcement authorities or other appropriate third parties. If you are entitled to a refund under these terms and conditions we will credit that refund to the card or other payment method you used to submit payment, unless it has expired in which case we will contact you.</p>\r\n\r\n	<p>Business Standard will use the services of quality third party payment service providers to process your payment. Payment options are primarily through credit card. Business Standard may offer other payment mechanisms from time to time.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Pricing:</strong></p>\r\n\r\n	<p>The subscription price will be made clear to you on our sign-up pages or otherwise during the sign-up process and may vary from time to time, by region or by country. You agree to pay the fees at the rates notified to you at the time you purchase your subscription. Subscription to premium services on Business Standard are generally of monthly frequency. Business Standard however may choose to offer fixed term or fixed payment frequency offers from time to time. The currency in which your subscription is payable will be specified during the order process, depending on the service and your country of residence. Eligibility for any discounts is ascertained at the time you subscribe and cannot be changed during the term of your subscription. We will always tell you in advance of any increase in the price of your subscription and offer you an opportunity to cancel it if you do not wish to pay the new price.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Taxes:</strong></p>\r\n\r\n	<p>Subscription and access to content services fall under the purview of Service Tax as per the current indirect taxation policy, Government of India. Taxes are applicable for consumption of content on the website and other products of Business Standard uniformly for customers based in India and outside the country. Unless otherwise indicated, prices stated on our website are inclusive of applicable Service Tax, any applicable value added tax (VAT) or other sales taxes.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Pricing errors:</strong></p>\r\n\r\n	<p>If we incorrectly state a price to you whether online or otherwise, we are not obliged to provide you with a subscription at that price, even if we have mistakenly accepted your offer to buy a subscription at that price, and we reserve the right to subsequently notify you of any pricing error. If we do this, you may cancel the subscription without any obligation to us and we will refund you any money you have paid us in full, or you may pay the correct price. If you refuse to exercise either of these choices then we may cancel your subscription and will refund you any money you have paid us in full. We will always act in good faith in determining whether a genuine pricing error has occurred.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Other costs:</strong></p>\r\n\r\n	<p>In addition to any subscription fees you pay, you are responsible for paying any internet connection or other telecommunications charges that you may incur by accessing the premium services or using the services available on it. For example, if you use any of our mobile services then your network operator may charge you for data or messaging services.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>5. Subscription Period, Renewal and Cancellation of Personal Subscriptions</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Renewals:</strong></p>\r\n\r\n	<p>If you chose to pay monthly, your subscription will continue until you tell us that you no longer wish to receive it, in which case you will stop paying the monthly fees. We will notify you at least 7 days in advance of any changes to the price in your subscription that will apply upon next monthly renewal.</p>\r\n\r\n	<p>Please visit the &quot;How to cancel&quot; section below for details of how to cancel your monthly subscription.</p>\r\n\r\n	<p>Unless you notify us before the end of your chosen subscription period that you no longer wish to receive it, your subscription will renew for another period as applicable. We will charge the subscription using the same card or other payment method that you previously used.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cancellation Policy</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>For Digital subscriptions by placing your order you agree that we may start your subscription immediately upon our accepting your order. This means that you are not entitled to a refund if you change your mind after we have provided you with access to your subscription.</p>\r\n\r\n	<p>Except as set out in the previous section, you do not have any right to cancel your subscription or any part of it until the end of your then current subscription period.</p>\r\n\r\n	<p>Although you may notify us of your intention to cancel at any time, such notice will only take effect at the end of your then current subscription period, and you will not receive a refund</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>How to cancel?</strong></p>\r\n\r\n	<p>You may notify us of your wish to cancel your subscription by contacting our Customer Services team at assist@bsmail.in. To enable us cancel your subscription please provide us with your complete name (as was in the subscription order form), Email address and Contact number clearly written out.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cancellation by us:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard reserves the right to suspend or terminate your subscription if you breach these terms and conditions, with or without notice and without further obligation to you. We may also suspend or terminate your subscription if we are prevented from providing services to you by circumstances beyond our control. If we terminate your subscription for any reason and/or permanently cease publishing business-standard.com, or cease to provide subscription services then, unless there are exceptional circumstances, we will provide you with a pro rata refund to your credit card. This means that we will refund you with any amounts that you have paid us in advance that relate to any remaining and unexpired period of your subscription.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cancellation of your registration:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>If you are a registered user, but not a subscriber, then Business Standard reserves the right to suspend or terminate your registration at any time, with or without notice and without further obligation to you. If you would like to cancel your registration then please contact our customer services team at assist@bsmail.in.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>6. Who Your Personal Subscription Contract is with</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>If you buy a Business-standard.com digital subscription and are resident in any country, then you will be contracting with Business Standard Private Limited, Nehru House, 4, Bahadur Shah Zafar Marg, New Delhi - 110 002</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>7. User Generated Content</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Business-standard.com includes comments sections, blogs and other interactive features that allow interaction between users and between users and Business Standard. We call the information posted by or contributed by users &quot;User Generated Content&quot; or &quot;UGC&quot;.</p>\r\n\r\n	<p>If you wish to view or participate by way of UGC then you must comply with specific rules and guidelines. We also recommend that you read our Comments Guidelines which provide further guidance in relation to commenting on Business-standard.com.</p>\r\n\r\n	<p>You are responsible for all the content of any of your UGC that you or we publish. You are financially responsible to us for any claim against us by any third party that your UGC is not in accordance with the UGC policy</p>\r\n\r\n	<p>You further agree that you will:</p>\r\n\r\n	<p>* Only publish UGC that is your original content and will not infringe the copyright or other rights of any third party when publishing UGC. Not post, link to or otherwise publish any UGC containing any form of advertising or promotion for goods and services or any spam or other form of unsolicited communication.</p>\r\n\r\n	<p>* Not post, link to or otherwise publish any UGC with recommendations to buy or not buy a particular share or other investment or which contain confidential information of another party or which otherwise have the purpose of affecting the price or value of any share or other investment.</p>\r\n\r\n	<p>* Not post, link to or otherwise publish any UGC that is threatening, offensive, libellous, indecent or otherwise unlawful.</p>\r\n\r\n	<p>* Not post comments that are discriminatory in nature, for example, comments which make attacks on the grounds of race, religion, sex, gender, sexual orientation, disability or age.</p>\r\n\r\n	<p>* Respectfully challenge different points of view but not personally attack other commentators.</p>\r\n\r\n	<p>* Not disguise the origin of any UGC and not impersonate any person or entity (including Business Standard employees or Forum guests or hosts) or misrepresent any connection with any person or entity.</p>\r\n\r\n	<p>* Not post or otherwise publish any UGC unrelated to the Forum or the Forum&#39;s topic.</p>\r\n\r\n	<p>* Not post or transmit any UGC that contains software viruses, files or code designed to interrupt, destroy or limit the functionality of Business-Standard.com or any computer software or equipment.</p>\r\n\r\n	<p>* Not collect or store other users personal data.</p>\r\n\r\n	<p>* Not restrict or inhibit any other user from using the Forums.</p>\r\n\r\n	<p>* Comply with the guidelines for commenting set out in our Commenting FAQ.</p>\r\n\r\n	<p>It is not possible for Business Standard to fully monitor all UGC published on business-standard.com but where we have actually received notice of any UGC that is potentially misleading, untrue, offensive, unlawful, infringes third party rights or is potentially in breach of these terms and conditions, then we will review that UGC, decide whether to remove it from business-standard.com and act accordingly. This may include banning a user from participation in UGC on Business-standard.com. If you believe that any UGC published on business-standard.com infringes any legal rights that you may have or is not allowed under these terms and conditions, please notify us immediately with specific details by contacting us at&nbsp;<a href=\"https://www.business-standard.com/issue-report/report\">assist@bsmail.in</a>&nbsp;or&nbsp;<a href=\"mailto:feedback@bsmail.in\">feedback@bsmail.in</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>8. Third Party Sites and Services</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Business-standard.com may contain links to other Internet websites or online and mobile services provided by independent third parties, including websites of our advertisers and sponsors (what we call &quot;Third Party Sites&quot;), either directly or through frames. Third Party Sites also include co-branded with Business Standard and so include Business Standard&#39;s trade marks.</p>\r\n\r\n	<p>It is your decision whether you purchase or use any third party products or services made available on or via Third Party Sites and you should read Section 9 below carefully. Our Privacy Policy does not apply to Third Party Sites.</p>\r\n\r\n	<p>Business-Standard.com contains advertising and sponsorship. Advertisers and sponsors are responsible for ensuring that material submitted for inclusion on Business-standard.com complies with international and national law. Business Standard is not responsible for any error or inaccuracy in advertising, incorrect links or sponsorship material.</p>\r\n\r\n	<p>Copyright in any software that is made available for download from Business-standard.com belongs to Business Standard or its suppliers or contributors. Your use of the software is governed by the terms of any licence agreement that may accompany or be included with the software. Do not install or use any of this software unless you agree to such licence agreement. Business Standard is not responsible for any technical or other issues that may happen if you download third party software.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>9. Our Responsibilities towards You</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>A summary of what this section means: this section is important and you should read it carefully. It makes clear to what extent, if any, Business Standard accepts responsibility (liability) to you for your use of Business-standard.com or in respect of any third party products or services that we refer to or advertisements or any other link to on business-standard.com. Unless you are a premium subscriber to Business-standard.com, we accept no financial responsibility to you arising from your use of business-standard.com or the content, advertisements and links published on business-standard.com. If you are a Business Standard premium service subscriber, we limit our financial responsibility to you arising from your use of Business-Standard.com and/or the Premium Services you consume on business-standard.com to the price you paid for your subscription.</p>\r\n\r\n	<p>In no circumstances do we accept responsibility for your use of Third Party Sites or services not limited to advertisements, links in respect of any Third Party Products. By Third Party Sites we mean websites, online or mobile services provided by third parties, including websites of advertisers and sponsors that may appear on business-standard.com. By Third Party Products we mean products or services provided by third parties.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limitations of content published on Business-Standard.com:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>All content published on Business-Standard.com (including any information we publish regarding Third Party Products) is only for your general information and entertainment purposes and is not intended to address your particular requirements. In particular, Content created by Business Standard, its syndication partners and including UGC and any other content provided by third parties and distributed by business-standard.com, does not constitute any form of advice, recommendation, representation, endorsement or arrangement by Business Standard. It is not intended to be and should not be relied upon by users in making (or refraining from making) any specific investment, purchase, sale or other decisions. Appropriate independent advice should be obtained before making any such decision, such as from a qualified financial adviser.</p>\r\n\r\n	<p>Any agreements, transactions or other arrangements made between you and any third party named on (or linked to from) Business-Standard.com are at your own responsibility and entered into at your own risk. Any information that you receive via Business-standard.com, whether or not it is classified as &quot;real time&quot;, may have stopped being current by the time it reaches you. Share price information may be rounded up/down and therefore may not be entirely accurate.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>What we promise:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard promises to develop and operate business-standard.com with reasonable skill and care and will use reasonable efforts to promptly remedy any faults of which it is aware or made aware of.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>What we do not promise:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Business Standard does not provide any promises or warranties other than defined above. The content is provided on an &quot;as is&quot; and &quot;as available&quot; basis. While the content creation team and its partners from whom content is syndicated make the best of their efforts to put together accurate, complete and authentic content, Business Standard and business-standard.com does not make any promises in respect of content published on its website and/or the services and functions available on or through business-standard.com or of the quality, completeness or accuracy of the information published on or linked to from business-standard.com other than as expressly stated above.</p>\r\n\r\n	<p>The above disclaimers apply to your use of Business-Standard.com. Without limiting the above, Business Standard is not liable for matters beyond its reasonable control. Business Standard does not control third party communications networks (including your internet service provider), the internet, acts of god or the acts of third parties.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Our financial responsibility to you:</strong></p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>You agree that if we are in breach of these terms and conditions, we will only be responsible to you for any damages that you incur arising out of your use of Business-standard.com (to the extent that Business Standard&#39;s liability is not otherwise excluded by this section 9) as follows:</p>\r\n\r\n	<p>If you incur any loss as a result of using Business-Standard.com or any Content outside the scope of these terms and conditions, Business Standard accepts no responsibility (liability) to you for this.</p>\r\n\r\n	<p>You will be responsible for all claims, liabilities, damages, cost and expenses suffered or incurred as a result of your breach of these terms and conditions.</p>\r\n\r\n	<p>Business Standard will only be responsible for loss or damage you suffer which is the reasonably foreseeable result of Business-Standard&#39;s breach of a legal duty of care owed to you.</p>\r\n\r\n	<p>Business Standard will not be responsible to you for any loss or damage suffered by your business, such as lost data, lost profits or any business interruption.</p>\r\n\r\n	<p>If you have a premium subscription then you may terminate your subscription in writing to Business Standard. If business-standard.com is unavailable or inaccessible to you for more than 5 days in a 30 day period, as a result of the fault or failure of Business Standard, in which case we will refund you any amount that you have paid to us in advance that relates to any period which was still to run on your subscription. You may instead at your option receive a renewal to your subscription free-of-charge at the point of renewal.</p>\r\n\r\n	<p>The limitations of liability in this section 9 apply for the benefit of Business Standard, its affiliates, and all of their respective officers, directors, employees, agents or any company who we transfer our rights and obligations to in accordance with these terms and conditions.</p>\r\n\r\n	<p>To the full extent permitted by law you acknowledge and agree that our third party content and data suppliers have no liability whatsoever to you in respect of any of their data supplied to you as part of Business Standard.com</p>\r\n\r\n	<p>Business Standard&#39;s liability will not be limited in the case of death or personal injury directly caused by Business Standard&#39;s negligence in those countries where it is unlawful for Business Standard to seek to exclude such liability.</p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<h2>10. Choice of Law and Jurisdiction</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>If you are a user whose principal address or principal use of Business Standard Digital services occurs in any jurisdiction across the world then these terms and conditions will be subject to Indian law. In this case, to the extent possible in the applicable jurisdiction, both you and we agree that the competent courts in New Delhi, India will have non-exclusive jurisdiction to settle any dispute which may arise out of, under, or in connection with these terms and conditions.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>11. General</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>You may not license or transfer any of your rights under these terms and conditions. We may transfer any of our rights or obligations under these terms and conditions to any individual, organization or entity but if we do so we will ensure that any company/individual/entity to whom we transfer our rights or obligations will continue to honour your rights under them. Any resultant changes to the terms and conditions will be intimated to you via email and updated on this website.</p>\r\n\r\n	<p>If any provision of these terms and conditions is found to be invalid by any court having competent jurisdiction, the invalidity of that provision will not affect the validity of the remaining provisions of these terms and conditions, which will remain in full force and effect.</p>\r\n\r\n	<p>Failure by either party to exercise any right or remedy under these terms and conditions does not constitute a waiver of that right or remedy. Headings in these terms and conditions are for convenience only and will have no legal meaning or effect.</p>\r\n\r\n	<p>These terms and conditions constitute the entire agreement between you and Business Standard Private Limited for your use of the Business Standard website, Business Standard mobile and other digital products and services from Business Standard. They supersede all previous communications, representations and arrangements, either written or oral.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>12. Content ownership</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>All Content created and published on the digital platforms under the url http://www.business-standard.com the mobile browser site, applications, Business Standard E-paper belong to Business Standard Private Limited and its licensors who own all intellectual property rights (including copyright and database rights) No intellectual property rights in any of the content are transferred to you while you consume the content on this platform. &quot;BS&quot; and &quot;Business Standard&quot; are registered trade marks of Business Standard Private Limited and you may not use them without prior written permission from Business Standard. You are permitted to use the content on this platform only as set out in our Copyright Policy.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>13. Changes to Terms and Conditions and Validity</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>These terms and conditions were published on 1st June 2016 and replace with immediate effect the terms and conditions previously published.</p>\r\n	</li>\r\n</ul>\r\n', 'System', '2019-04-30 15:41:07', NULL, '0000-00-00 00:00:00', 1),
(12, 'facebook', 'http://fb.comd', 'System', '2019-07-22 14:05:08', NULL, '0000-00-00 00:00:00', 1),
(13, 'twiter', '', 'System', '2019-07-22 14:05:08', NULL, '0000-00-00 00:00:00', 1),
(14, 'youtube', '', 'System', '2019-07-22 14:05:08', NULL, '0000-00-00 00:00:00', 1),
(15, 'whatsapp_number', '9603960346', 'System', '2019-09-27 06:53:07', NULL, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopbooks`
--

CREATE TABLE `shopbooks` (
  `id` int(11) NOT NULL,
  `book_type` enum('softcopy','hardcopy','','') NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `pages` varchar(100) NOT NULL,
  `actual_price` float NOT NULL,
  `discount_price` float NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `sms` text NOT NULL,
  `plan_ids` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = Active, 2 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_by_plan`
--

CREATE TABLE `sms_by_plan` (
  `id` bigint(20) NOT NULL,
  `sms_id` bigint(20) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = Active, 2 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = General, 1 = Group 1, 2 = Group 2',
  `course_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `type`, `course_id`, `created_at`, `row_status`) VALUES
(1, 'Accounts', 1, 2, '2019-12-02 15:43:50', 1),
(2, 'LAW', 1, 2, '2019-12-16 11:52:55', 1),
(3, 'Costing & FM', 1, 2, '2019-12-16 11:53:29', 1),
(4, 'Taxation', 1, 2, '2019-12-16 11:54:08', 1),
(5, 'ADV.Accounting', 2, 2, '2019-12-16 11:54:37', 1),
(6, 'Auditing', 2, 2, '2019-12-16 11:54:54', 1),
(7, 'IT & SM', 2, 2, '2019-12-16 11:55:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trail_dashboard`
--

CREATE TABLE `trail_dashboard` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `url` text NOT NULL,
  `instructions` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trail_dashboard`
--

INSERT INTO `trail_dashboard` (`id`, `course`, `url`, `instructions`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 'https://www.youtube.com/embed/QQJjI1CB0eM:@https://www.youtube.com/embed/QQJjI1CB0eM:@https://www.youtube.com/embed/QQJjI1CB0eM', 'Introduction1:@Introduction2:@Introduction3:@Introduction4:@Introduction5', '2019-12-13 17:33:03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trail_exams`
--

CREATE TABLE `trail_exams` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `exam` varchar(60) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '	0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trail_exams`
--

INSERT INTO `trail_exams` (`id`, `course`, `exam`, `subject`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 'M-Law', 'MLaw', '2019-12-13 17:34:17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trail_exam_downloads`
--

CREATE TABLE `trail_exam_downloads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `evaluator_id` int(11) NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `out_of` decimal(5,2) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Downloaded,2= Answer Upload, 3 = Eva Download, 4 = Eva Upload'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trail_exam_downloads`
--

INSERT INTO `trail_exam_downloads` (`id`, `user_id`, `exam_id`, `evaluator_id`, `marks`, `out_of`, `modified_at`, `created_at`, `row_status`) VALUES
(1, 2, 1, 0, '0.00', '0.00', NULL, '2019-12-13 17:34:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trail_results`
--

CREATE TABLE `trail_results` (
  `id` bigint(20) NOT NULL,
  `trail_exam_downloads_id` int(11) NOT NULL,
  `marks` decimal(10,0) NOT NULL,
  `out_of` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = Active, 2 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `icai_reg_no` bigint(30) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `exam_type` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 3 COMMENT '0=Deleted,1=Active,2=Inactive,3=Trail,4=Failed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `unique_id`, `icai_reg_no`, `first_name`, `last_name`, `email`, `mobile`, `exam_type`, `password`, `address`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 1, 'SA_100001', 0, 'Super Admin', '', 'admin@gmail.com', '8121815502', '', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', '2019-07-20 15:18:30', NULL, 1),
(2, 2, 'ipcc19_100001', 1244564, 'mahesh', '', 'mahi@gmail.com', '8121815501', '2', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '', '2019-12-13 17:28:55', '2019-12-13 17:28:55', 1),
(3, 2, 'ipcc19_100002', 123, 'sujith', '', 'yeswanth@gmail.com', '8143671872', '2', '7ca49b480f4ad303e77d35fc0ba426e30332ec95051a34a75affedf485054e2a', '', '2019-12-20 16:38:43', '2019-12-20 16:38:43', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_plan_relation`
--

CREATE TABLE `users_plan_relation` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = Active, 2 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_plan_relation`
--

INSERT INTO `users_plan_relation` (`id`, `user_id`, `plan_id`, `package_id`, `created_at`, `modified_at`, `row_status`) VALUES
(1, 2, 5, 1, '2019-12-13 19:49:22', NULL, 1),
(2, 2, 5, 2, '2019-12-13 19:49:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `row_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deleted,1=Active,2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_downloads`
--
ALTER TABLE `exam_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_plan_relation`
--
ALTER TABLE `exam_plan_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_brochers`
--
ALTER TABLE `e_brochers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeling_formal`
--
ALTER TABLE `feeling_formal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_videos`
--
ALTER TABLE `main_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_results`
--
ALTER TABLE `mcq_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_type`
--
ALTER TABLE `mcq_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_purchase`
--
ALTER TABLE `package_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_discount`
--
ALTER TABLE `promo_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestcallback`
--
ALTER TABLE `requestcallback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `shopbooks`
--
ALTER TABLE `shopbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_by_plan`
--
ALTER TABLE `sms_by_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trail_dashboard`
--
ALTER TABLE `trail_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trail_exams`
--
ALTER TABLE `trail_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trail_exam_downloads`
--
ALTER TABLE `trail_exam_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trail_results`
--
ALTER TABLE `trail_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_plan_relation`
--
ALTER TABLE `users_plan_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_downloads`
--
ALTER TABLE `exam_downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_plan_relation`
--
ALTER TABLE `exam_plan_relation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_brochers`
--
ALTER TABLE `e_brochers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feeling_formal`
--
ALTER TABLE `feeling_formal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_videos`
--
ALTER TABLE `main_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mcq_results`
--
ALTER TABLE `mcq_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mcq_type`
--
ALTER TABLE `mcq_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package_purchase`
--
ALTER TABLE `package_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promo_discount`
--
ALTER TABLE `promo_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestcallback`
--
ALTER TABLE `requestcallback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shopbooks`
--
ALTER TABLE `shopbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_by_plan`
--
ALTER TABLE `sms_by_plan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trail_dashboard`
--
ALTER TABLE `trail_dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trail_exams`
--
ALTER TABLE `trail_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trail_exam_downloads`
--
ALTER TABLE `trail_exam_downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trail_results`
--
ALTER TABLE `trail_results`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_plan_relation`
--
ALTER TABLE `users_plan_relation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
