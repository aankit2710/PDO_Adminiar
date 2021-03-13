-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 07:44 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jean_institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_details`
--

CREATE TABLE `about_details` (
  `about_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `about_heading1` varchar(255) NOT NULL,
  `about_content1` text NOT NULL,
  `about_heading2` varchar(255) NOT NULL,
  `about_content2` text NOT NULL,
  `about_heading3` varchar(255) NOT NULL,
  `about_content3` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_details`
--

INSERT INTO `about_details` (`about_id`, `user_id`, `about_heading1`, `about_content1`, `about_heading2`, `about_content2`, `about_heading3`, `about_content3`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'Our Mission &amp; Core Values', '&lt;p&gt;United Health Institute (UHI)&amp;nbsp;is a leading&amp;nbsp;provider of a wide range of training. We offer various educational programs&amp;nbsp;that lead our students to become certified/licensed in their desired fields. We provide&amp;nbsp;our instructors with an integrated platform that allows them to deliver&amp;nbsp;quality, trusted learning content, continuing education, and certification management to new learners, healthcare professionals, Health IT professionals, and various institutions.&lt;/p&gt;\r\n\r\n&lt;p&gt;Upon completing their chosen program, our learners usually have the option to work from home or at various healthcare facilities in the Healthcare or IT sector. We strive to provide the most seamless and effective learning experience possible and help you become essential to an industry that needs you.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;OUR CORE VALUES ARE:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Innovative Thinking&lt;/strong&gt;&amp;mdash;We offer&amp;nbsp;a cutting-edge learning platform and collaborative model that attract a dynamic pool of talented instructors that drive our student, team, and company succes.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Team Success&lt;/strong&gt;&amp;mdash;We don&amp;rsquo;t succeed unless our learners and instructors do. We provide our instructors with the technology and platform to deliver their content and help our&amp;nbsp;learners acquire and sharpen the skillset they need to succeed.&amp;nbsp;&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Embracing Change&lt;/strong&gt;&amp;mdash;We&amp;nbsp;drive the change the way instructors and learners collaborate through innovative products and services.&amp;nbsp;&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Positivity and Dynamism&lt;/strong&gt;&amp;mdash;We are a very dynamic team&amp;nbsp;that seek to make our learners successful. We pride ourselves on the success of our students.&lt;/li&gt;\r\n&lt;/ul&gt;', 'Who We Are', '&lt;p&gt;United Health Institute (UHI) was founded by a group of IT Experts and University Professors who have created online-teaching platforms and/or thaught online for various Institutions&amp;nbsp;including Capita Plc, Purdue University, University of Indiana, University of Tennessee, Coventry University, University of London (UK). Those highly talented and experienced professionals realized there were a need in the sector&amp;nbsp;for a platform that gives Independent Instructors the ability to offer their contents to their students, UHI was born.&lt;/p&gt;\r\n\r\n&lt;p&gt;Since then UHI has grown from a single learning conntent provider&amp;nbsp;to a global trusted online&amp;nbsp;training platform and professional development provider. We not only offer&amp;nbsp;accredited training and continuing education to individual learners, we&amp;nbsp;partner&amp;nbsp;with colleges, universities, and healthcare employers across the world.&lt;/p&gt;\r\n\r\n&lt;p&gt;We are committed to helping our learners advance their careers and improve their lives as we strive&amp;nbsp;to make the&amp;nbsp;learning experience more accessible, efficient, and effective for everyone.&lt;/p&gt;', 'Acknowledgements', '&lt;ul&gt;\r\n	&lt;li&gt;Named as the best online learning platform by LeSage Foundation (2018, 2019, 2020)&lt;/li&gt;\r\n	&lt;li&gt;Among the Department of Defense&amp;rsquo;s inaugural partners in the Military Spouse Employment Partnership program&lt;/li&gt;\r\n	&lt;li&gt;Collaborated on the development of the Amerinet ICD-10 Tool Kit, available to Amerinet&amp;rsquo;s 3,000 acute care and more than 60,000 non-acute care health system partners.&lt;/li&gt;\r\n	&lt;li&gt;Listed as HDMRI preferred learning partner.&amp;nbsp;&lt;/li&gt;\r\n	&lt;li&gt;Featured on Naples Daily News&lt;/li&gt;\r\n&lt;/ul&gt;', '2020-08-20 23:33:31', '2020-10-14 12:45:34', '108.214.163.28'),
(2, 0, 'Our Mission &amp; Core Values', '&lt;p&gt;United Health Institute (UHI)&amp;nbsp;is a leading&amp;nbsp;provider of a wide range of training. We offer various educational programs&amp;nbsp;that lead our students to become certified/licensed in their desired fields. We provide&amp;nbsp;our instructors with an integrated technology platform that allow them to deliver&amp;nbsp;quality, trusted learning content, continuing education, and certification management to new learners, healthcare professionals, and institutions. We strive to provide the most seamless and effective learning experience possible.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;OUR CORE VALUES ARE:&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Innovative Thinking&lt;/strong&gt;&amp;mdash;We offer&amp;nbsp;a cutting-edge learning platform and collaborative model that attract a dynamic pool of talented instructors that drive our student, team, and company succes.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Team Success&lt;/strong&gt;&amp;mdash;We don&amp;rsquo;t succeed unless our learners and instructors do. We provide our instructors with the technology and platform to deliver their content and help our&amp;nbsp;learners acquire and sharpen the skillset they need to succeed.&amp;nbsp;&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Embracing Change&lt;/strong&gt;&amp;mdash;We&amp;nbsp;drive the change the way instructors and learners collaborate through innovative products and services.&amp;nbsp;&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Ownership&lt;/strong&gt;&amp;mdash;We own the results of our work. No scapegoats, no excuses. We learn and improve through accountability. We celebrate our wins, learn from our mistakes, give credit where it&amp;rsquo;s due, and look for ways to scale success&amp;mdash;because success is something everyone should own.&lt;/li&gt;\r\n&lt;/ul&gt;', 'Who We Are', '&lt;p&gt;United Health Institute (UHI) was founded by a group of IT Experts and University Professors who have created online-teaching platforms and/or thaught online for various Institutions&amp;nbsp;including Capita Plc, Purdue University, University of Indiana, University of Tennessee, Coventry University, University of London (UK). Those highly talented and experienced professionals realized there were a need in the sector&amp;nbsp;for a platform that gives Independent Instructors the ability to offer their contents to their students, UHI was born.&lt;/p&gt;\r\n\r\n&lt;p&gt;Since then UHI has grown from a single learning conntent provider&amp;nbsp;to a global trusted online&amp;nbsp;training platform and professional development provider. We not only offer&amp;nbsp;accredited training and continuing education to individual learners, we&amp;nbsp;partner&amp;nbsp;with colleges, universities, and healthcare employers across the world.&lt;/p&gt;\r\n\r\n&lt;p&gt;We are committed to helping our learners advance their careers and improve their lives as it strives to make the healthcare learning experience more accessible, efficient, and effective for everyone.&lt;/p&gt;', 'Acknowledgements', '&lt;ul&gt;\r\n	&lt;li&gt;Named as a Military Friendly School by G.I. Jobs Magazine (2011, 2012, 2013, 2014, and 2015)&lt;/li&gt;\r\n	&lt;li&gt;Among the Department of Defense&amp;rsquo;s inaugural partners in the Military Spouse Employment Partnership program&lt;/li&gt;\r\n	&lt;li&gt;Integral to the development of the Amerinet ICD-10 Tool Kit, available to Amerinet&amp;rsquo;s 3,000 acute care and more than 60,000 non-acute care health system partners&lt;/li&gt;\r\n	&lt;li&gt;Included on the MountainWest Capital Network Utah 100 list for 11 consecutive years&lt;/li&gt;\r\n	&lt;li&gt;Listed on the Inc. 500|5000 list recognizing the fastest growing private companies in the nation for 9 years&lt;/li&gt;\r\n	&lt;li&gt;Featured on the Viewpoints with Terry Bradshaw, Good Morning America, CNN, and USA Today&lt;/li&gt;\r\n&lt;/ul&gt;', '2020-10-14 10:20:56', '2020-10-14 12:08:14', '108.214.163.28');

-- --------------------------------------------------------

--
-- Table structure for table `added_courses`
--

CREATE TABLE `added_courses` (
  `course_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `coursedetail` varchar(255) DEFAULT NULL,
  `coursecontent` text DEFAULT NULL,
  `video_names` varchar(255) NOT NULL,
  `playtime_string` varchar(255) DEFAULT NULL,
  `videosize` varchar(255) DEFAULT NULL,
  `video_resolution` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `added_courses`
--

INSERT INTO `added_courses` (`course_id`, `program_id`, `instructor_id`, `category_name`, `coursedetail`, `coursecontent`, `video_names`, `playtime_string`, `videosize`, `video_resolution`, `ip`, `created`) VALUES
(43, 1, 1, 'Healthcare', 'Program Orientation', 'test', '[\"13881606475279.pdf\",\"22511606475279.mp4\"]', '0:30', '1500989', '400x226', '49.36.174.87', '2020-11-27 04:08:00'),
(44, 9, 1, 'Healthcare', 'testing', '', '[\"17291606502516.pdf\"]', NULL, '146324', 'x', '180.151.87.82', '2020-11-27 11:41:56'),
(45, 9, 1, 'Healthcare', 'testing', '<p>hi</p>', '[\"13691606502855.mp4\"]', '0:20', '1341874', '480x360', '180.151.87.82', '2020-11-27 11:47:35'),
(46, 10, 1, 'Administration', 'chekingg', '<p>hi</p>', '[\"141606503133.mp4\"]', '0:20', '1341874', '480x360', '180.151.87.82', '2020-11-27 11:52:13'),
(47, 18, 1, 'Medical Coding', 'Program Orientation', '<p>hi</p>', '[\"18711606853467.mp4\",\"25561606853467.pdf\"]', NULL, '146324', 'x', '180.151.87.82', '2020-12-01 13:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postId` int(11) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text DEFAULT NULL,
  `postCont` text DEFAULT NULL,
  `postImage` varchar(255) NOT NULL,
  `postStatus` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-Active,1-In Active	',
  `postDate` datetime DEFAULT NULL,
  `postModified` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postId`, `userId`, `postTitle`, `postDesc`, `postCont`, `postImage`, `postStatus`, `postDate`, `postModified`, `ip`) VALUES
(1, 1, 'CareerStep Launches New Scholarship Program to Support BIPOC Healthcare Learners', '&lt;p&gt;Scholarship program provides wide variety of healthcare program choices and one-on-one learner support.&lt;/p&gt;', '&lt;p&gt;Earlier this year, I made a commitment to the Carrus team that we would do more to promote diversity, equity, and inclusion at our company and within health care. The team has taken meaningful steps toward this, from increasing community involvement, to expanding internal diversity training, to launching a scholarship program specifically for Black, Indigenous and People of Color (BIPOC). Below are details about the scholarship. Good luck to all applicants!&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;The Scholarship&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;https://www.careerstep.com/&quot;&gt;CareerStep&lt;/a&gt;, the Allied Health training division of&amp;nbsp;&lt;a href=&quot;https://www.carruslearn.com/&quot;&gt;Carrus&lt;/a&gt;, has created a scholarship program specifically for Black, Indigenous and People of Color (BIPOC) who want to begin or grow their careers in the healthcare industry. Four scholarship winners will be able to select any&amp;nbsp;&lt;a href=&quot;https://www.careerstep.com/programs&quot;&gt;CareerStep program&lt;/a&gt;&amp;nbsp;and receive additional&amp;nbsp;&lt;a href=&quot;https://www.careerstep.com/help/advantedge&quot;&gt;AdvantEDGE&lt;/a&gt;&amp;nbsp;mentoring throughout their programs. Four semi-finalists will receive a $1,000 credit toward the CareerStep program of their choice.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;With a variety of healthcare programs on offer, scholarship winners will also receive personalized coaching throughout their chosen program. With CareerStep&amp;rsquo;s AdvantEDGE support program, learners have expanded resources and support, including a personalized learner action plan, one-on-one training sessions, and time-management tools.&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;The scholarship submission process includes providing general contact information and responding to a series of brief essay questions.&amp;nbsp;&lt;/p&gt;', 'b6128d830e2fa4295f47bdc7d3881017.jpg', 0, '2020-08-22 05:05:20', '0000-00-00 00:00:00', '113.193.79.1');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `extra_phone_number` varchar(25) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `extra_email_address` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lattitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`contact_id`, `user_id`, `content`, `phone_number`, `extra_phone_number`, `email_address`, `extra_email_address`, `address`, `lattitude`, `longitude`, `fax`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, '&lt;p&gt;Let us know about your questions or concerns. We will get back to you as soon as we can.&lt;/p&gt;', '+1 615-266-4266', '', 'info@unitedhealthagency.com', '', '857 97th Avenue N., Naples, 34108, FL', '26.2601697', '-81.8028204', '', '2020-08-22 03:20:47', '0000-00-00 00:00:00', '113.193.79.1');

-- --------------------------------------------------------

--
-- Table structure for table `contact_inquiries`
--

CREATE TABLE `contact_inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0="Email Sent",1="Email Not Sent"',
  `person_name` varchar(50) NOT NULL,
  `person_email` varchar(50) NOT NULL,
  `person_phone` varchar(20) NOT NULL,
  `inquiry_subject` varchar(255) NOT NULL,
  `inquiry_msg` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_orders`
--

CREATE TABLE `course_orders` (
  `enrolled_category` varchar(255) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `enrolled_course` int(11) NOT NULL,
  `enrolled_course_detail` varchar(255) DEFAULT NULL,
  `enrolled_date` datetime NOT NULL,
  `student_id` int(11) NOT NULL,
  `instructor_id` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_orders`
--

INSERT INTO `course_orders` (`enrolled_category`, `order_id`, `enrolled_course`, `enrolled_course_detail`, `enrolled_date`, `student_id`, `instructor_id`, `created`, `ip`) VALUES
('healthcare', 1, 1, NULL, '2020-09-26 13:58:06', 1, '', '2020-09-26 06:58:06', '106.210.33.203'),
('healthcare', 7, 1, NULL, '2020-09-29 01:08:38', 10, '', '2020-09-28 18:08:38', '69.137.9.27'),
('healthcare', 6, 1, NULL, '2020-09-26 15:34:54', 9, '', '2020-09-26 08:34:54', '106.210.33.203'),
('healthcare', 5, 1, NULL, '2020-09-26 15:32:06', 8, '', '2020-09-26 08:32:06', '106.210.33.203'),
('healthcare', 8, 1, NULL, '2020-09-29 01:15:30', 11, '', '2020-09-28 18:15:30', '223.233.88.226'),
('healthcare', 9, 1, NULL, '2020-09-29 01:20:43', 13, '', '2020-09-28 18:20:43', '223.233.88.226'),
('healthcare', 10, 1, NULL, '2020-09-29 01:35:47', 16, '', '2020-09-28 18:35:47', '223.233.88.226'),
('healthcare', 11, 1, NULL, '2020-09-29 01:40:24', 17, '', '2020-09-28 18:40:24', '223.233.88.226'),
('healthcare', 12, 1, NULL, '2020-09-29 11:29:03', 20, '', '2020-09-29 04:29:03', '1.23.55.149'),
(NULL, 13, 1, NULL, '2020-09-29 11:32:07', 21, '', '2020-09-29 04:32:07', '1.23.55.149'),
('healthcare', 14, 1, NULL, '2020-09-29 17:46:00', 22, '', '2020-09-29 10:46:00', '223.233.88.226'),
('healthcare', 15, 1, NULL, '2020-09-29 17:47:17', 23, '', '2020-09-29 10:47:17', '69.137.9.27'),
('healthcare', 16, 1, NULL, '2020-09-29 18:26:05', 24, '', '2020-09-29 11:26:05', '106.223.5.200'),
('healthcare', 17, 1, NULL, '2020-09-29 18:29:57', 25, '', '2020-09-29 11:29:57', '106.223.5.200'),
('healthcare', 18, 1, NULL, '2020-10-02 11:35:27', 26, '1', '2020-10-02 04:35:27', '223.225.91.46'),
('healthcare', 19, 1, NULL, '2020-10-02 11:36:33', 27, '1', '2020-10-02 04:36:33', '223.225.91.46'),
('healthcare', 20, 1, NULL, '2020-10-12 15:38:43', 28, '1', '2020-10-12 08:38:43', '180.151.87.82'),
('healthcare', 21, 1, NULL, '2020-10-12 20:21:14', 29, '1', '2020-10-12 13:21:14', '180.151.87.82'),
('healthcare', 22, 1, NULL, '2020-10-12 20:25:32', 30, '1', '2020-10-12 13:25:32', '180.151.87.82'),
('healthcare', 23, 1, NULL, '2020-11-09 05:02:51', 31, '1', '2020-11-08 22:02:51', '49.36.164.106'),
('healthcare', 24, 1, NULL, '2020-11-09 05:07:49', 1, '1', '2020-11-08 22:07:49', '49.36.164.106'),
('Other Training Options', 25, 4, NULL, '2020-11-09 05:09:47', 1, '24', '2020-11-08 22:09:47', '49.36.164.106'),
('Healthcare', 26, 1, NULL, '2020-11-12 19:19:44', 34, '1', '2020-11-12 12:19:44', '223.233.88.46'),
('Healthcare', 27, 1, NULL, '2020-11-22 00:34:08', 35, '1', '2020-11-21 17:34:08', '69.137.9.27'),
('Healthcare', 28, 1, NULL, '2020-11-22 00:52:57', 36, '1', '2020-11-21 17:52:57', '69.137.9.27'),
('Test Course', 29, 18, NULL, '2020-12-01 20:44:12', 37, '1', '2020-12-01 13:44:12', '180.151.87.82'),
('Test Course', 30, 18, NULL, '2020-12-01 21:10:02', 38, '1', '2020-12-01 14:10:02', '49.36.175.232');

-- --------------------------------------------------------

--
-- Table structure for table `employment_inquiries`
--

CREATE TABLE `employment_inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0="Email Sent",1="Email Not Sent"',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `county` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `em_fullname` varchar(50) DEFAULT NULL,
  `em_phone` varchar(20) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `date_avail` varchar(100) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `curr_working` varchar(10) DEFAULT NULL,
  `avail_work` varchar(100) DEFAULT NULL,
  `ever_app` varchar(10) DEFAULT NULL,
  `app_when` varchar(100) DEFAULT NULL,
  `last_grade_hs` varchar(10) DEFAULT NULL,
  `name_hs` varchar(255) DEFAULT NULL,
  `loc_hs` varchar(255) DEFAULT NULL,
  `lastyr_comp` varchar(10) DEFAULT NULL,
  `name_coll` varchar(255) DEFAULT NULL,
  `loc_coll` varchar(255) DEFAULT NULL,
  `resume` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `user_id`, `heading`, `content`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'Can I pay online?', '&lt;p&gt;Yes, online payment is possible by clicking on the &amp;quot;Payments&amp;quot; button at the top of our website.&lt;/p&gt;', '2020-07-14 21:54:13', '2020-07-17 12:44:28', '108.214.163.28'),
(2, 1, 'Will I still receive services if I don\'t have or do not want to use health insurance?', '&lt;p&gt;Yes, we provide services to clients who have health insurance as well as those who don&amp;#39;t have health insurance. Clients who don&amp;#39;t want to use health insurance or don&amp;#39;t have health insurance cover 100% of the services cost.&lt;/p&gt;', '2020-07-17 12:44:04', '0000-00-00 00:00:00', '108.214.163.28');

-- --------------------------------------------------------

--
-- Table structure for table `first_step_inquiries`
--

CREATE TABLE `first_step_inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0="Email Sent",1="Email Not Sent"',
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `first_step_inquiries`
--

INSERT INTO `first_step_inquiries` (`inquiry_id`, `user_id`, `email_sent`, `name`, `phone`, `email`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 1, 'sandeep bajpai', '08130237503', 'sandeepbajpai44@gmail.com', '2020-08-28 01:07:10', '0000-00-00 00:00:00', '116.68.245.240');

-- --------------------------------------------------------

--
-- Table structure for table `home_details`
--

CREATE TABLE `home_details` (
  `home_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `counties` varchar(100) NOT NULL,
  `clients` varchar(100) NOT NULL,
  `licences` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_details`
--

INSERT INTO `home_details` (`home_id`, `user_id`, `heading`, `content`, `counties`, `clients`, `licences`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'A Better Way to Learn', '&lt;p&gt;United Health Institute (UHI)&amp;nbsp;is a leading&amp;nbsp;provider of a wide range of training. We offer various educational programs&amp;nbsp;that lead our students to become certified/licensed in their desired fields. We provide&amp;nbsp;our instructors with an integrated platform that allows them to deliver&amp;nbsp;quality, trusted learning content, continuing education, and certification management to new learners, healthcare professionals, Health IT professionals, and various institutions.&lt;/p&gt;\r\n\r\n&lt;p&gt;Upon completing their chosen program, our learners usually have the option to work from home or at various healthcare facilities in the Healthcare or IT sector. We strive to provide the most seamless and effective learning experience possible and help you become essential to an industry that needs you.&lt;/p&gt;', '', '', '', '2020-07-14 04:22:25', '2020-10-14 12:44:11', '108.214.163.28');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `policy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `introduction` text DEFAULT NULL,
  `education_levels` text NOT NULL,
  `telephone_number` varchar(100) NOT NULL,
  `email_address` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `text_password` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `area_of_expertise` text NOT NULL,
  `experience` varchar(255) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0 COMMENT '0:Not Activated, 1:Activated',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `prefix`, `first_name`, `last_name`, `introduction`, `education_levels`, `telephone_number`, `email_address`, `password`, `text_password`, `resume`, `address`, `area_of_expertise`, `experience`, `languages`, `profile_pic`, `is_verified`, `status`, `created_at`, `modified_at`, `ip`, `email_sent`) VALUES
(1, 'Mr.', 'Sandeep', 'Bajpai', 'The introduction is Here', 'B.Tech,LLB', '08130237503', 'sandeepbajpai44@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'test', 'f3703b04c4396ceaff8e6ff3bd156f69.pdf', 'US', 'PHP,HTML,CSS', '5 Years', 'Hindi, English', '232982404963a425a49fbc9d6411c60a.png', 1, 0, '2020-09-20 03:31:08', '2020-11-26 07:09:05', '49.36.174.87', 1),
(27, 'Mr.', 'larry', 'belford', 'The introduction is Here 2', 'Graduate', '0000000000', 'test@gmail.com', '25d55ad283aa400af464c76d713c07ad', '12345678', '52a23cdbd9c40d1ceab9507bcb05671b.pdf', 'DE', 'PHP,Development', '', '', NULL, 1, 0, '2020-11-12 12:10:09', '2020-11-12 12:10:09', '223.233.88.46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `case_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_phone` varchar(20) NOT NULL,
  `member_designation` varchar(100) NOT NULL,
  `member_pic` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`member_id`, `user_id`, `member_name`, `member_email`, `member_phone`, `member_designation`, `member_pic`, `description`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'Misty Frost', 'info@unitedhealthagency.com', '12345698778', 'Chief Executive Officer', 'f0dc7b2ec38b583dc298328e657773f3.png', '&lt;p&gt;As CEO of Carrus, Misty drives the vision and strategy behind our company mission.&lt;/p&gt;\r\n\r\n&lt;p&gt;Misty&amp;rsquo;s 25-year career includes extensive global experience at a senior executive level, including serving as SVP of global marketing at Instructure, where she led the global growth strategy and drove value from a private startup to a publicly traded business valued at over $1 billion. Prior to this role, she served as VP of delivery services for Datamark and worked with various global brands, including Intel, Nortel Networks, Hyatt Hotels, and Disney.&lt;/p&gt;\r\n\r\n&lt;p&gt;In addition to leading the charge at Carrus, Misty serves on the board of directors for Marketware and Equality Utah. She&amp;rsquo;s also an active member in the Women&amp;rsquo;s Tech Council and Utah Wonder Women, a group dedicated to developing women&amp;rsquo;s executive leadership.&lt;/p&gt;', '2020-08-22 03:53:23', '0000-00-00 00:00:00', '113.193.79.1');

-- --------------------------------------------------------

--
-- Table structure for table `our_team_content`
--

CREATE TABLE `our_team_content` (
  `policy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `our_team_content`
--

INSERT INTO `our_team_content` (`policy_id`, `user_id`, `heading`, `content`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'Our Leadership', '&lt;p&gt;Meet the team driving Carrus forward. With these folks at the helm, we&amp;rsquo;re creating an integrated technology platform that provides the most seamless and effective healthcare learning experience possible.&lt;/p&gt;', '2020-08-20 23:36:17', '2020-08-22 03:47:54', '113.193.79.1');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `page_image` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `user_id`, `page_name`, `content`, `page_image`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'RCM Health Care Services', '&lt;p&gt;United Health Institute has partnered with RCM Health Care Services to give our learners more job opportunities than ever before.&lt;/p&gt;\r\n\r\n&lt;p&gt;RCM is a premier provider of staffing solutions for over 400 healthcare institutions, placing more than 72,000 healthcare professionals in both remote and traditional new jobs across the nation. They intend to employ United Health Institute learners, specifically those trained for careers related to health information management.&lt;/p&gt;\r\n\r\n&lt;p&gt;With healthcare growing faster than any other industry &amp;ndash; 2.4 million new job openings are expected by 2026 &amp;ndash; healthcare organizations are looking for qualified professionals to fill their openings. RCM Health Care Services will match United Health Institute learners with careers suited to their training. This partnership between RCM and United Health Institute speaks volumes to the quality of United Health Institute&amp;#39;s training and the confidence you can have in your preparation for the workforce upon completing your training.&lt;/p&gt;', '9eb9cd58b9ea5e04c890326b5c1f471f.png', '2020-08-21 02:02:31', '0000-00-00 00:00:00', '123.136.205.232'),
(2, 1, 'Our Culture', '&lt;p&gt;Carrus (then called Career Step) was founded in 1992 by a stay-at-home parent who&amp;rsquo;d enrolled in a medical transcription correspondence course in hopes of expanding her career opportunities. When she realized the course&amp;rsquo;s potential to improve the lives of people like her, she decided to build a business that would make similar courses available to the masses.&lt;/p&gt;\r\n\r\n&lt;p&gt;In the decades since, Carrus has grown from a single medical transcription course to one of the nation&amp;rsquo;s most trusted online healthcare training and professional development providers. Carrus not only offers accredited training and continuing education to individual learners, it partners with colleges, universities, and healthcare employers across the country.&lt;/p&gt;\r\n\r\n&lt;p&gt;In 2019, with CEO Misty Frost at the helm, Carrus began offering two solutions to meet the distinct needs of future and current healthcare workers: CareerStep, a training platform for students seeking to enter and advance in the healthcare field, and CareerCert (formerly Medic-CE.com and ACLS.com), a continuing ed and certification-management platform for established medical professionals.&lt;/p&gt;\r\n\r\n&lt;p&gt;Carrus remains committed to helping people advance their careers and improve their lives as it strives to make the healthcare learning experience more accessible, efficient, and effective for everyone.&lt;/p&gt;', '65db30186e4d18c4bcbec80e691b801f.jpg', '2020-08-22 03:35:50', '0000-00-00 00:00:00', '113.193.79.1'),
(3, 1, 'Financial Assistance', '&lt;p&gt;At CareerStep, we understand that one of the biggest questions tied to furthering your career training is how to pay for it. To help, CareerStep offers low program prices that don&amp;#39;t burden you with large amounts of debt and that position you for career advancement. We&amp;#39;ve also designed multiple financial payment plans and actively participate in a number of assistance programs that allow you to choose the funding option that best fits your needs. For financial assistance, contact CareerStep today.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Prices&lt;/h2&gt;\r\n\r\n&lt;p&gt;See a complete list of all the CareerStep programs and their&amp;nbsp;&lt;a href=&quot;https://www.careerstep.com/pricing&quot;&gt;current prices&lt;/a&gt;. Signing up in any CareerStep program provides everything you need to succeed.&lt;/p&gt;', '65db30186e4d18c4bcbec80e691b801f.jpg', '2020-08-22 04:40:24', '0000-00-00 00:00:00', '113.193.79.1'),
(4, 1, 'AdvantEDGE', '&lt;h3&gt;Healthcare Training Support, Powered By Ambition.*&lt;/h3&gt;\r\n\r\n&lt;p&gt;You can learn anything. But it isn&amp;rsquo;t easy&amp;mdash;and for some, it&amp;rsquo;s a monstrous undertaking. That&amp;rsquo;s because training is a journey, and the road to an exciting new career is never a straight shot. We can help you find the right path.&lt;/p&gt;', '156005c5baf40ff51a327f1c34f2975b.jpg', '2020-08-22 04:42:19', '0000-00-00 00:00:00', '113.193.79.1'),
(5, 1, 'Extensions', '&lt;p&gt;&lt;strong&gt;NEED MORE TIME TO COMPLETE YOUR COURSE?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Every learner who signs up in one of Career Step&amp;rsquo;s online courses receives an initial 6 or 12 month period of course access depending on the program. If you need&amp;nbsp;&lt;strong&gt;extra time&lt;/strong&gt;&amp;nbsp;to complete the course after your initial period, we have extensions available for purchase. Extensions can be purchased beginning&amp;nbsp;&lt;strong&gt;3 months prior to your program expiration.&lt;/strong&gt;&amp;nbsp;You can now choose the extension term that best meets your needs.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you think you will need more than a one-month extension, take advantage of our multi-month pricing for the&amp;nbsp;&lt;strong&gt;biggest savings.&lt;/strong&gt;&lt;/p&gt;', '156005c5baf40ff51a327f1c34f2975b.jpg', '2020-08-22 04:46:43', '2020-08-22 04:56:03', '113.193.79.1'),
(6, 1, 'Military', '&lt;p&gt;&lt;strong&gt;Career Training Across The Military Community&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Military spouses of active-duty service members may qualify for the MyCAA grant for MyCAA training organizations, which can completely cover the costs of their program while they gain training proven to prepare them for the workforce.&lt;/p&gt;\r\n\r\n&lt;p&gt;The&amp;nbsp;MyCAA funding program&amp;nbsp;is an initiative that enables eligible military spouses to build a rewarding career through a $4000 scholarship. This funding covers training courses in healthcare, administration, and technology, which can all be taken at CareerStep, a premier MyCAA-approved organization enabling spouses to have a career no matter where they live. All our programs are completely covered by MyCAA, so if you qualify you can train with no out-of-pocket expenses.&lt;/p&gt;', 'fe5df232cafa4c4e0f1a0294418e5660.jpg', '2020-08-22 04:50:59', '2020-10-12 12:36:46', '180.151.87.82'),
(7, 1, 'MyCAA', '&lt;p&gt;&lt;strong&gt;Career Training for Military Spouses Covered by MyCAA Grants&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;The MyCAA program, run by the Department of Defense, offers up to&amp;nbsp;&lt;strong&gt;$4,000&lt;/strong&gt;&amp;nbsp;in funding to eligible military spouses for career training. CareerStep&amp;rsquo;s MyCAA approved career training will give you the tools you need to get certified, find a job, and start working.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Who qualifies for MyCAA Grants?&lt;/h2&gt;\r\n\r\n&lt;p&gt;Spouses of active-duty Army, Navy, Air Force, Marine, or National Guard/ARG service members in pay grades E1-E5, O1-O2, and W1-W2. If you do not qualify for MyCAA funding we have other military discount and scholarship options available.&lt;/p&gt;\r\n\r\n&lt;h2&gt;CareerStep and MyCAA&lt;/h2&gt;\r\n\r\n&lt;p&gt;CareerStep&amp;rsquo;s online programs include everything you need to train for a rewarding new career, and with MyCAA funding, military spouses can get training with no out-of-pocket expense! CareerStep will also include a&amp;nbsp;&lt;strong&gt;laptop&lt;/strong&gt;&amp;nbsp;for MyCAA learners that sign up for most of our programs.&lt;/p&gt;', '4a47a0db6e60853dedfcfdf08a5ca249.png', '2020-08-22 04:52:35', '2020-08-22 04:56:55', '113.193.79.1'),
(8, 1, 'Army Ca Funding', '&lt;p&gt;&lt;strong&gt;Healthcare training from CareerStep is available at no cost to you - with up to $4,000 available through the Army Credentialing Assistance Program. Prepare for life after the military with certification in one of the fastest growing industries in the country.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;What is Army Credentialing Assistance?&lt;/h2&gt;\r\n\r\n&lt;p&gt;As part of their effort to help Servicemembers transition into civilian life more smoothly, the Department of Defense began the Army Credentialing Assistance Program in 2018. The program creates opportunities for Servicemembers to earn professional and technical credits, increasing their employment opportunities after being discharged.&lt;/p&gt;\r\n\r\n&lt;p&gt;The program is very similar to the Army&amp;#39;s existing Tuition Assistance program but is intended specifically for certificate and credential training programs rather than degree-focused programs. By opening this funding to these programs, thousands of opportunities are now available to veterans without the need for years of expensive and time-consuming class time.&lt;/p&gt;', 'fe5df232cafa4c4e0f1a0294418e5660.jpg', '2020-08-22 04:54:17', '0000-00-00 00:00:00', '113.193.79.1'),
(9, 1, 'Why UHI?', '&lt;h3&gt;&lt;strong&gt;We&amp;#39;re a Perfect Fit&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Want affordable training? We&amp;#39;ve got that. Need some flexibility? We offer that, too. Looking to get trained, certified, and hired fast? Looks like we&amp;#39;re a match.&lt;/p&gt;\r\n\r\n&lt;h3&gt;A Better Way to Learn&lt;/h3&gt;\r\n\r\n&lt;p&gt;Traditional education isn&amp;#39;t for everyone. Curriculums are broad, schedules are rigid, and the commitment is a huge time-suck, taking years (and years) to complete. Oh, and it&amp;#39;s expensive too, leaving students drowing in debt.&amp;nbsp;&lt;strong&gt;That&amp;#39;s why we&amp;#39;re disrupting learning.&lt;/strong&gt;&lt;/p&gt;', '8cda81fc7ad906927144235dda5fdf15.jpg', '2020-08-22 04:58:16', '2020-08-22 04:59:08', '113.193.79.1'),
(10, 1, 'Partners', '&lt;p&gt;Over 700 employers have hired CareerStep learners over the years. These include national, regional, and local employers. As the vast majority of CareerStep Medical Transcription learners work from home, the majority of the large companies that hire our learners are national&amp;nbsp;medical transcription&amp;nbsp;service organizations. Learners that complete our other programs are typically hired by companies in their local areas. These national companies have hired CareerStep learners and recommend CareerStep training because our learners fill their need for productive, quality, well-trained employees.&lt;/p&gt;', 'd0096ec6c83575373e3a21d129ff8fef.jpg', '2020-08-22 04:59:51', '0000-00-00 00:00:00', '113.193.79.1'),
(11, 1, 'Resources', '&lt;p&gt;Watch videos to find out more about our programs and our training. You can also find program tours that let you take a peek into the courses and webinars on various career opportunities to help you explore different career fields.&lt;/p&gt;', '9eb9cd58b9ea5e04c890326b5c1f471f.png', '2020-08-22 05:00:36', '0000-00-00 00:00:00', '113.193.79.1'),
(12, 1, 'Education', '&lt;p&gt;Consistent and continuous revenue cycle improvement ultimately depends on your staff&amp;mdash;their knowledge of revenue cycle components, their drive for professional growth, and their commitment to your organization&amp;rsquo;s financial goals.&lt;/p&gt;\r\n\r\n&lt;h3&gt;CareerStep offers the educational resources you need to ensure your team is prepared for today&amp;rsquo;s challenges.&lt;/h3&gt;\r\n\r\n&lt;p&gt;We take an innovative two-step approach:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;strong&gt;Evaluate:&lt;/strong&gt;&amp;nbsp;A truly strategic approach must begin with a plan. Our evaluations help you pinpoint the areas that need improvement to ensure you&amp;rsquo;re making the most of your time and investment.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Educate:&lt;/strong&gt;&amp;nbsp;After our comprehensive evaluations, you&amp;rsquo;ll know exactly which education programs your team needs so you can target your investment for the best results.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Tailoring your education strategy to your team&amp;rsquo;s unique needs empowers you to build the very best team while providing career growth opportunities and fostering employee loyalty.&lt;/p&gt;', '799bad5a3b514f096e69bbc4a7896cd9.jpg', '2020-08-22 05:01:26', '0000-00-00 00:00:00', '113.193.79.1'),
(13, 1, 'Academic Partnerships', '&lt;h2&gt;WHY SHOULD MY SCHOOL PARTNER WITH CAREERSTEP?&lt;/h2&gt;\r\n\r\n&lt;p&gt;CareerStep has been training career-ready professionals for 25 years, and our unique industry relationships allow us to make sure students are gaining the skills employers need, ensuring your students&amp;rsquo; success. A CareerStep academic partnership helps you:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;Serve your students&lt;/strong&gt;&amp;nbsp;&amp;ndash; Offer programs that boast job search assistance, industry approval, and industry certification preparation to help your students start rewarding new careers.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Lift your bottom line&lt;/strong&gt;&amp;nbsp;&amp;ndash; Increase your revenue without adding to your workload, and take advantage of our payment plans, military funding expertise, and state funding experience.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Work smarter, not harder&lt;/strong&gt;&amp;nbsp;- Turn-key programs include everything you need to make the program successful at your school; high-quality curriculum, student support, marketing help, and more.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Request information to be contacted about becoming a CareerStep academic partner!&lt;/p&gt;', '799bad5a3b514f096e69bbc4a7896cd9.jpg', '2020-08-22 05:02:16', '0000-00-00 00:00:00', '113.193.79.1'),
(14, 1, 'Healthcare Organizations', '&lt;h3&gt;We&amp;rsquo;ve Got You Covered&lt;/h3&gt;\r\n\r\n&lt;p&gt;Whether you&amp;rsquo;re just trying to keep ahead of your 2-year recertification cycle or you&amp;rsquo;re ready to advance your career as a Critical Care Paramedic, Medic-CE, a CareerStep company, has the training you need&lt;/p&gt;', '18e2999891374a475d0687ca9f989d83.jpg', '2020-08-22 05:03:20', '0000-00-00 00:00:00', '113.193.79.1'),
(15, 1, 'Referral Resource Center', '&lt;h2&gt;Referral Program&lt;/h2&gt;\r\n\r\n&lt;p&gt;CareerStep provides career-training that changes lives for the better, and you can be a part of it. We&amp;rsquo;ve set up a Referral Program so you can help people you know start new careers they&amp;rsquo;ll love&amp;mdash;and get rewarded for it at the same time.&lt;/p&gt;\r\n\r\n&lt;p&gt;First, if you don&amp;rsquo;t already have a referral account, you can sign up for the program&amp;nbsp;here. (If you forgot your referral information, send an email to&amp;nbsp;referral@careerstep.com, and we can look it up for you.)&lt;/p&gt;\r\n\r\n&lt;p&gt;Next, let all your friends, family, and acquaintances know about Career tep and what we have to offer. Have them visit your referral webpage so they&amp;rsquo;ll be tagged in our system with your unique Referrer ID. Or they can call us at 1-800-411-7073 and tell us you referred them.&lt;/p&gt;\r\n\r\n&lt;p&gt;Finally, if they sign up, you get paid. It&amp;rsquo;s that easy. We send out electronic payments once a month in the month following the signup. For example, if you have any referrals sign up in June, you&amp;rsquo;ll get paid around July 20. And the way it&amp;rsquo;s structured, the higher the number of referrals you have sign up in a given month, the higher your bonus for each referral.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;$100 per signup for 1-2 signups a month&lt;/li&gt;\r\n	&lt;li&gt;$200 per signup for 3-4 signup a month&lt;/li&gt;\r\n	&lt;li&gt;$250 per signup for 5+ signup a month&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;It really is that simple! Watch our Referral Program video and then&amp;nbsp;&lt;a href=&quot;https://www.careerstep.com/referral#resources&quot;&gt;check out some of our resources below&lt;/a&gt;&amp;nbsp;so you can help your friends find a new career and start earning referral bonuses.&lt;/p&gt;', '30e62fddc14c05988b44e7c02788e187.jpg', '2020-08-22 05:36:01', '2020-08-22 05:49:44', '113.193.79.1'),
(16, 1, 'Teacher\'s Profile', '&lt;h3&gt;Striving to make the web a more beautiful place every single day&lt;/h3&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.&lt;/p&gt;', '30e62fddc14c05988b44e7c02788e187.jpg', '2020-08-22 05:36:01', '2020-11-16 10:49:28', '49.36.170.132');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `student_id` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `payment_currency` varchar(255) DEFAULT NULL,
  `receiver_email` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `txnid`, `payment_amount`, `payment_status`, `itemid`, `item_name`, `payment_currency`, `receiver_email`, `payer_email`, `createdtime`) VALUES
(12, 37, '61U149213N119032K', '360.00', 'Completed', '1+Healthcare', 'Medical Coding and Billing', 'USD', 'ashwanidevil@gmail.com', 'ashwanidevil-buyer@gmail.com', '2020-09-26 14:28:09'),
(11, 36, '90710619T7495941W', '1.00', 'Completed', '1+Healthcare', 'Medical Coding and Billing', 'USD', 'vacationwebowners@gmail.com', 'jmjcharles@gmail.com', '2020-11-22 00:53:34'),
(10, 35, '3VL65965BJ621571V', '1.00', 'Completed', '1+Healthcare', 'Medical Coding and Billing', 'USD', 'vacationwebowners@gmail.com', 'jmjcharles@gmail.com', '2020-11-22 00:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `payout_message`
--

CREATE TABLE `payout_message` (
  `payout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payout_message_content` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payout_message`
--

INSERT INTO `payout_message` (`payout_id`, `user_id`, `payout_message_content`, `ip`, `created`, `modified`) VALUES
(1, 1, '&lt;p&gt;You are working with UHI then the payout is 70% from total amount of per programs.&lt;/p&gt;', '180.151.87.82', '2020-10-12 09:20:11', '2020-10-12 09:27:15'),
(2, 0, '&lt;p&gt;You are working with UHI then the payout is 70% from total amount of per program.&lt;/p&gt;', '180.151.87.82', '2020-10-12 09:25:49', '2020-10-12 09:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `prog` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `time_period` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `user_id`, `service_id`, `category`, `prog`, `price`, `content`, `time_period`, `created_date`, `modified_date`, `ip`) VALUES
(19, 1, 19, 'Health Care', '', '20', '&lt;p&gt;HI&lt;/p&gt;', '90', '2020-11-27 15:04:30', '2020-11-27 15:04:30', '180.151.87.82'),
(20, 1, 19, 'Administration', '', '10', '&lt;p&gt;hi&lt;/p&gt;', '30 Days', '2020-11-27 15:05:07', '2020-11-27 15:05:07', '180.151.87.82'),
(21, 1, 23, 'Administration', '', '20', '&lt;p&gt;HI&lt;/p&gt;', '90', '2020-11-27 15:05:39', '2020-11-27 15:05:39', '180.151.87.82'),
(22, 1, 20, 'Technology', '', '10', '&lt;p&gt;HI&lt;/p&gt;', '90', '2020-11-27 15:06:04', '2020-11-27 15:06:04', '180.151.87.82'),
(23, 1, 24, 'Technology', '', '20', '&lt;p&gt;HI&lt;/p&gt;', '90', '2020-11-27 15:06:26', '2020-11-27 15:06:26', '180.151.87.82'),
(24, 1, 38, 'Test Department', '', '10', '&lt;p&gt;HI&lt;/p&gt;', '30 Days', '2020-11-27 15:07:52', '2020-11-27 15:07:52', '180.151.87.82'),
(25, 1, 20, 'Test Department', '', '10', '&lt;p&gt;HI&lt;/p&gt;', '90', '2020-11-27 15:08:36', '2020-11-27 15:08:36', '180.151.87.82'),
(26, 1, 39, 'INstructor Program', '', '10', '&lt;p&gt;hi&lt;/p&gt;', '90', '2020-11-27 15:13:35', '2020-11-27 15:13:35', '180.151.87.82'),
(18, 1, 18, 'Health Care', '', '10', '&lt;p&gt;HI&lt;/p&gt;', '30 Days', '2020-11-27 15:03:38', '2020-11-27 15:03:38', '180.151.87.82');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `policy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`policy_id`, `user_id`, `heading`, `content`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'Privacy Policy', '&lt;p&gt;UnitedHealth Agency LLC aims to protect your privacy while continuously improving the services we offer you.&lt;/p&gt;\r\n\r\n&lt;p&gt;UnitedHealth Agency LLC Privacy Policy (hereinafter called the &amp;ldquo;Privacy Policy&amp;rdquo;) keeps your personal information confidential through the personal data collection on our online platforms (website, applications, social networks), when you fill out the Request services or Employment forms, and when we organize events or through any other forms of interaction.&lt;/p&gt;\r\n\r\n&lt;p&gt;Our Privacy Policy does not apply to the personal data collected by other third party websites or applications that may provide links to or be accessible from any of the United Health Agency LLC platforms.&lt;/p&gt;', '2020-07-14 21:52:26', '2020-07-17 12:29:51', '108.214.163.28');

-- --------------------------------------------------------

--
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `about_me` text NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`profile_id`, `user_id`, `profile_name`, `about_me`, `company_name`, `website_name`, `profile_pic`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'JEAN CHARLES', '&lt;p&gt;JEAN CHARLES&lt;/p&gt;', 'United Health Agency', 'https://unitedhealthagency.com/', NULL, '2020-07-14 04:11:15', '0000-00-00 00:00:00', '27.63.44.125');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rate_content`
--

CREATE TABLE `rate_content` (
  `policy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refund_policy`
--

CREATE TABLE `refund_policy` (
  `policy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refund_policy`
--

INSERT INTO `refund_policy` (`policy_id`, `user_id`, `heading`, `content`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'Refund  Policy', '&lt;p&gt;UnitedHealth Agency LLC aims to protect your refund while continuously improving the services we offer you.&lt;/p&gt;\r\n\r\n&lt;p&gt;UnitedHealth Agency LLC Privacy Policy (hereinafter called the &amp;ldquo;Privacy Policy&amp;rdquo;) keeps your personal information confidential through the personal data collection on our online platforms (website, applications, social networks), when you fill out the Request services or Employment forms, and when we organize events or through any other forms of interaction.&lt;/p&gt;\r\n\r\n&lt;p&gt;Our Privacy Policy does not apply to the personal data collected by other third party websites or applications that may provide links to or be accessible from any of the United Health Agency LLC platforms.&lt;/p&gt;', '2020-07-14 21:52:26', '2020-08-22 06:02:06', '113.193.79.1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews_detail`
--

CREATE TABLE `reviews_detail` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `c_review` longtext NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `instructor_id` int(25) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `review_image` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL,
  `modified_date` date DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-Active,1-In Active',
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews_detail`
--

INSERT INTO `reviews_detail` (`review_id`, `user_id`, `img`, `c_name`, `heading`, `c_review`, `course_name`, `instructor_id`, `teacher_name`, `review_image`, `created_date`, `modified_date`, `ip`, `status`, `rating`) VALUES
(1, 1, '', 'Sandeep', 'Medical Administrative Assistant', '&lt;p&gt;When I enrolled, I did not know I would be making the best professional decision of my life. . .Within 3 weeks of graduation, I had 4 job offers. I took a great job with an amazing company and get up every morning excited to go to work.&lt;/p&gt;', NULL, 27, NULL, NULL, '2020-08-21', NULL, '123.136.205.232', 0, 5),
(2, 1, '', 'Sandeep', 'Medical Administrative Assistant', '&lt;p&gt;When I enrolled, I did not know I would be making the best professional decision of my life. .Within 3 weeks of graduation, I had 4 job offers. I took a great job with an amazing company and get up every morning excited to go to work.&lt;/p&gt;', NULL, 1, NULL, NULL, '2020-08-21', NULL, '123.136.205.232', 0, 5),
(3, 0, '', 'testing', 'bljblib', 'hello', NULL, NULL, NULL, '', '2020-11-18', NULL, NULL, 0, 0),
(4, 0, '', 'testing', 'bljblib', 'hello', NULL, NULL, NULL, '', '2020-11-18', NULL, NULL, 0, 0),
(5, 0, '', 'testing', 'helloo', 'hello', NULL, NULL, NULL, '', '2020-11-18', NULL, NULL, 0, 0),
(6, 1, '', 'testing', 'helloo', 'hellooo', NULL, NULL, NULL, '', '2020-11-18', NULL, NULL, 0, 0),
(8, 1, '', 'Sandeep', 'test', '<p>Atest review</p>', 'medicall', NULL, 'sandeep', '', '2020-11-19', '2020-11-19', NULL, 0, 3),
(9, 1, '', 'Sandeep', 'hello', '<p>hello test</p>', NULL, NULL, NULL, '', '2020-11-19', '2020-11-19', NULL, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `program_name` varchar(255) DEFAULT NULL,
  `service_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `service_image` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `user_id`, `category_name`, `program_name`, `service_name`, `content`, `service_image`, `created_date`, `modified_date`, `ip`) VALUES
(18, 1, 'Test Course', 'Medical Coding', 'Health Care', '&lt;p&gt;HI Jean&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:44:17', '0000-00-00 00:00:00', '180.151.87.82'),
(19, 1, 'Test Course', 'Medical Transcriptionist', 'Administration', '&lt;p&gt;HI Jean&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:45:16', '0000-00-00 00:00:00', '180.151.87.82'),
(20, 1, 'Test Course', 'Health Data Analyst', 'Technology', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:47:34', '0000-00-00 00:00:00', '180.151.87.82'),
(21, 1, 'Test Course', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:50:15', '0000-00-00 00:00:00', '180.151.87.82'),
(22, 1, 'Test Course', 'Physical Therapy Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:51:04', '0000-00-00 00:00:00', '180.151.87.82'),
(23, 1, 'Test Course', 'Administrative Assistant', 'Administration', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:52:03', '0000-00-00 00:00:00', '180.151.87.82'),
(24, 1, 'Test Course', 'Healthcare Privacy &amp;amp; Security', 'Technology', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:52:41', '0000-00-00 00:00:00', '180.151.87.82'),
(25, 1, 'Program Orientation', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:53:50', '0000-00-00 00:00:00', '180.151.87.82'),
(26, 1, 'Human Growth and Development', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', NULL, '2020-11-27 13:55:14', '0000-00-00 00:00:00', '180.151.87.82'),
(27, 1, 'The Older Adult in Society', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:55:48', '0000-00-00 00:00:00', '180.151.87.82'),
(28, 1, 'Communication', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', NULL, '2020-11-27 13:56:04', '0000-00-00 00:00:00', '180.151.87.82'),
(29, 1, 'Individuals and Families', 'Home Health Aide', 'Health Care', '&lt;p&gt;hi&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:56:22', '0000-00-00 00:00:00', '180.151.87.82'),
(30, 1, 'Special Problems/Abuse', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:56:47', '0000-00-00 00:00:00', '180.151.87.82'),
(31, 1, 'Death and Dying', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:57:07', '0000-00-00 00:00:00', '180.151.87.82'),
(32, 1, 'Nutrition', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:57:25', '0000-00-00 00:00:00', '180.151.87.82'),
(33, 1, 'Home Management', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:57:46', '0000-00-00 00:00:00', '180.151.87.82'),
(34, 1, 'Home Safety', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:58:22', '0000-00-00 00:00:00', '180.151.87.82'),
(35, 1, 'Blood Borne Diseases and Universal', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:58:46', '0000-00-00 00:00:00', '180.151.87.82'),
(36, 1, 'Precautions', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:59:06', '0000-00-00 00:00:00', '180.151.87.82'),
(37, 1, 'Client Health Part I', 'Home Health Aide', 'Health Care', '&lt;p&gt;HI&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-11-27 13:59:27', '0000-00-00 00:00:00', '180.151.87.82'),
(44, 1, 'Instructor Course', 'INstructor Program', 'INstructor Department', '&lt;p&gt;Test&lt;/p&gt;', 'f69fff8c944b962580b66f371e08babe.jpg', '2020-12-01 13:04:42', '0000-00-00 00:00:00', '180.151.87.82');

-- --------------------------------------------------------

--
-- Table structure for table `service_inquiries`
--

CREATE TABLE `service_inquiries` (
  `service_inquiry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0="Email Sent",1="Email Not Sent"',
  `who_needs_care` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `type_of_care_needed` text DEFAULT NULL,
  `date_needed` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city_st_zip` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `days_of_week` varchar(50) DEFAULT NULL,
  `hours_per_week` varchar(255) DEFAULT NULL,
  `arrival_time` varchar(100) DEFAULT NULL,
  `departure_time` varchar(100) DEFAULT NULL,
  `requestors_name` varchar(50) DEFAULT NULL,
  `best_contact_num` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `insurance_provider` varchar(255) DEFAULT NULL,
  `insurance_id` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `slider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_order` int(5) NOT NULL DEFAULT 0,
  `caption` text NOT NULL,
  `ext_txt` text NOT NULL,
  `ext_txt_line` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`slider_id`, `user_id`, `img_name`, `img_order`, `caption`, `ext_txt`, `ext_txt_line`, `created`, `modified`, `ip`, `status`) VALUES
(4, 1, '19591597990748.jpg', 1, 'Find a Job in an Industry That Needs You', 'You have value. The healthcare industry needs you. And with the right knowledge and training, you could make a huge difference at home and in your community.', 'Ready to get Started?', '2020-08-20 23:19:08', '2020-08-20 23:20:00', '123.136.205.232', '1'),
(5, 1, '2881597990748.jpg', 2, 'Find a Job in an Industry That Needs You', 'You have value. The healthcare industry needs you. And with the right knowledge and training, you could make a huge difference at home and in your community.', 'Ready to get Started?', '2020-08-20 23:19:08', '2020-08-20 23:20:04', '123.136.205.232', '1'),
(6, 1, '34951597990748.jpg', 3, 'Find a Job in an Industry That Needs You', 'You have value. The healthcare industry needs you. And with the right knowledge and training, you could make a huge difference at home and in your community.', 'Ready to get Started?', '2020-08-20 23:19:08', '2020-08-20 23:20:07', '123.136.205.232', '1');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `social_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `pinterest` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`social_id`, `user_id`, `facebook`, `twitter`, `pinterest`, `linkedin`, `instagram`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'https://www.facebook.com/', 'https://twitter.com/', 'https://in.pinterest.com/', 'https://www.linkedin.com/in/', 'https://www.instagram.com/', '2020-07-14 04:21:31', '0000-00-00 00:00:00', '27.63.44.125');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `instructor_id` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `telephone_number` varchar(100) NOT NULL,
  `email_address` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `text_password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `payment_completed` int(11) NOT NULL DEFAULT 0 COMMENT '0:Payment Pending, 1: Payment Completed',
  `txnid` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `instructor_id`, `first_name`, `last_name`, `telephone_number`, `email_address`, `password`, `text_password`, `address`, `profile_pic`, `payment_completed`, `txnid`, `status`, `created_at`, `modified_at`, `ip`, `email_sent`) VALUES
(1, '1', 'Sandeep', 'Bajpai', '8130237503', 'sandeepbajpai44@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '1234', 'Test Address', '232982404963a425a49fbc9d6411c60a.png', 1, '61U149213N119032K', 1, '2020-09-26 06:58:01', '2020-10-02 03:10:36', '223.225.91.46', 1),
(28, '1', 'nick', 'De', '99999999', 'paul.inhouseprogramers@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', 'dsas', NULL, 0, '', 1, '2020-10-12 08:38:43', '2020-10-12 08:38:43', '180.151.87.82', 1),
(29, '1', 'dsFEWF', 'DAf', '56456', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', 'erwqer', NULL, 0, '', 0, '2020-10-12 13:21:14', '2020-10-12 13:21:14', '180.151.87.82', 1),
(30, '1', 'DSHAGJKL', 'BKL', '7569478', 'HSJAHK@GMAIL.COM', 'a3e6114fc709668dbb98933043dc0948', 'HVCYSDFGY', 'BCSKL', NULL, 0, '', 0, '2020-10-12 13:25:32', '2020-10-12 13:25:32', '180.151.87.82', 1),
(31, '1', 'testiong', 'sharma', '9898989898', 'aankit2685@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', 'ankit address', NULL, 0, '', 0, '2020-11-08 22:02:51', '2020-11-08 22:02:51', '49.36.164.106', 1),
(32, '1', 'Ankit', 'sharma', '9898989898', 'admin@gmail.com', 'e36ef6d1d8c2714c2944456022573606', 'jean@IHP@2020', 'test', NULL, 0, '', 0, '2020-11-08 22:07:49', '2020-11-08 22:07:49', '49.36.164.106', 1),
(33, '24', 'Alex', 'Smith', '9898989898', 'admin@gmail.com', 'e36ef6d1d8c2714c2944456022573606', 'jean@IHP@2020', 'ankit address', NULL, 0, '', 0, '2020-11-08 22:09:47', '2020-11-08 22:09:47', '49.36.164.106', 1),
(34, '1', 'ankit', 'test', '00000000000', 'ankit55@gmail.com', '25d55ad283aa400af464c76d713c07ad', '12345678', 'testgfh', NULL, 0, '', 0, '2020-11-12 12:19:44', '2020-11-12 12:19:44', '223.233.88.46', 1),
(35, '1', 'Jean', 'Charles', '7866149349', 'jmjcharles@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '857 97TH AVENUE N.', NULL, 1, '3VL65965BJ621571V', 1, '2020-11-21 17:34:08', '2020-11-21 17:34:08', '69.137.9.27', 1),
(36, '1', 'Jean', 'Charles', '7866149349', 'jjcharles@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'E N.', NULL, 1, '90710619T7495941W', 1, '2020-11-21 17:52:57', '2020-11-21 17:52:57', '69.137.9.27', 1),
(37, '1', 'Larry', 'Belford', '6897685986', 'kshitij06888@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', 'dsad', NULL, 1, '', 1, '2020-12-01 13:44:12', '2020-12-01 13:44:12', '180.151.87.82', 1),
(38, '1', 'testiong', 'sharma', '9898989898', 'admin@gmail.com', 'e36ef6d1d8c2714c2944456022573606', 'jean@IHP@2020', 'ankit address', NULL, 0, '', 0, '2020-12-01 14:10:02', '2020-12-01 14:10:02', '49.36.175.232', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_inquiries`
--

CREATE TABLE `subscribe_inquiries` (
  `subscribe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe_inquiries`
--

INSERT INTO `subscribe_inquiries` (`subscribe_id`, `user_id`, `email`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'sandeepbajpai44@gmail.com', '2020-08-28 01:15:00', '0000-00-00 00:00:00', '116.68.245.240');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `user_id`, `heading`, `content`, `created_date`, `modified_date`, `ip`) VALUES
(1, 1, 'Terms and Conditions', '&lt;p&gt;&lt;strong&gt;UnitedHealth Agency LLC,&lt;/strong&gt; is dedicated to healthcare industry, aims to protect your privacy while continuously improving the services we offer you.&lt;/p&gt;\r\n\r\n&lt;p&gt;We offer Healthcare professionals for individual homecare as well as nursing homes, clinics, hospitals and other healthcare facilities.&lt;/p&gt;\r\n\r\n&lt;p&gt;UnitedHealth Agency LLC Privacy Policy (hereinafter called the &amp;ldquo;Privacy Policy&amp;rdquo;) keeps your personal information confidential through the personal data collection on our online platforms (website, applications, social networks), when you fill out the Request services or Employment forms, and when we organize events or through any other forms of interaction.&lt;/p&gt;\r\n\r\n&lt;p&gt;Our Privacy Policy does not apply to the personal data collected by other third party websites or applications that may provide links to or be accessible from any of the United Health Agency LLC platforms.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2020-07-14 21:53:22', '2020-07-17 12:35:53', '108.214.163.28');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `password`, `is_admin`, `last_login`, `ip`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2020-12-05 09:55:23', '106.215.63.235');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_details`
--
ALTER TABLE `about_details`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `added_courses`
--
ALTER TABLE `added_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `course_orders`
--
ALTER TABLE `course_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `employment_inquiries`
--
ALTER TABLE `employment_inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `first_step_inquiries`
--
ALTER TABLE `first_step_inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `home_details`
--
ALTER TABLE `home_details`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `our_team_content`
--
ALTER TABLE `our_team_content`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_message`
--
ALTER TABLE `payout_message`
  ADD PRIMARY KEY (`payout_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `rate_content`
--
ALTER TABLE `rate_content`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `refund_policy`
--
ALTER TABLE `refund_policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `reviews_detail`
--
ALTER TABLE `reviews_detail`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_inquiries`
--
ALTER TABLE `service_inquiries`
  ADD PRIMARY KEY (`service_inquiry_id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subscribe_inquiries`
--
ALTER TABLE `subscribe_inquiries`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_details`
--
ALTER TABLE `about_details`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `added_courses`
--
ALTER TABLE `added_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_orders`
--
ALTER TABLE `course_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employment_inquiries`
--
ALTER TABLE `employment_inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `first_step_inquiries`
--
ALTER TABLE `first_step_inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_details`
--
ALTER TABLE `home_details`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_team_content`
--
ALTER TABLE `our_team_content`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payout_message`
--
ALTER TABLE `payout_message`
  MODIFY `payout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_details`
--
ALTER TABLE `profile_details`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_content`
--
ALTER TABLE `rate_content`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund_policy`
--
ALTER TABLE `refund_policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews_detail`
--
ALTER TABLE `reviews_detail`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `service_inquiries`
--
ALTER TABLE `service_inquiries`
  MODIFY `service_inquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subscribe_inquiries`
--
ALTER TABLE `subscribe_inquiries`
  MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
