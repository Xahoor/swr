-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2026 at 09:21 AM
-- Server version: 10.6.28-MariaDB-cll-lve-log
-- PHP Version: 8.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swatwome_swri`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_objectives`
--

CREATE TABLE `about_objectives` (
  `id` int(11) NOT NULL,
  `about_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_objectives`
--

INSERT INTO `about_objectives` (`id`, `about_id`, `title`, `description`, `created_at`) VALUES
(7, 1, 'Promote Literacy', 'Enhancing basic and advanced literacy among women and girls.', '2026-07-16 10:25:08'),
(8, 1, 'Women Empowerment', 'Providing platforms for women to gain independence and confidence.', '2026-07-16 10:25:08'),
(9, 1, 'Skills Development', 'Offering vocational and professional training for better livelihoods.', '2026-07-16 10:25:08'),
(10, 1, 'Community Engagement', 'Mobilizing local communities to support women\'s education.', '2026-07-16 10:25:08'),
(11, 1, 'Gender Equality', 'Advocating for equal rights and opportunities in all sectors.', '2026-07-16 10:25:08'),
(12, 1, 'Social Welfare', 'Supporting the overall well-being of women and their families.', '2026-07-16 10:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_subtitle` text DEFAULT NULL,
  `story_heading` varchar(255) DEFAULT NULL,
  `story_paragraph1` text DEFAULT NULL,
  `story_paragraph2` text DEFAULT NULL,
  `story_image` varchar(255) DEFAULT NULL,
  `office_heading` varchar(255) DEFAULT NULL,
  `office_name` varchar(255) DEFAULT NULL,
  `office_floor` varchar(100) DEFAULT NULL,
  `office_nearby_location` varchar(255) DEFAULT NULL,
  `office_road` varchar(255) DEFAULT NULL,
  `office_city` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `page_title`, `page_subtitle`, `story_heading`, `story_paragraph1`, `story_paragraph2`, `story_image`, `office_heading`, `office_name`, `office_floor`, `office_nearby_location`, `office_road`, `office_city`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'Learn about our journey, mission, and commitment to the women of Swat.', 'Our Story', 'The Swat Women Rise Initiative was born out of a profound need to address the educational and social challenges faced by girls and women in the Swat region. Recognizing that education is the most powerful tool for change, our founders set out to create an organization that provides not just learning, but empowerment.', 'Since our inception, we have focused on creating inclusive environments where every individual, regardless of gender, has the opportunity to learn and grow. Our story is one of resilience, community support, and an unwavering belief in the potential of women to transform their nation.', '1784535520_Screenshot_20260720-131427.png', 'Registered Office', 'Marhaba Plaza', '1st Floor', 'Near General Bus Stand', 'By Pass Road', 'Mingora Swat, KPK', '2026-07-16 10:21:42', '2026-07-20 08:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'fahad1', '$2y$10$vhV8jWtf55NmnPgT42aHhubPBgefM1FCeXYttc1SJCQ7o9A4jvvAW', '2026-07-18 13:51:11', '2026-07-19 08:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(11) NOT NULL,
  `benefit` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `benefit`, `sort_order`, `created_at`) VALUES
(1, 'Registered organization officially recognized and transparent.', 0, '2026-07-15 16:49:11'),
(2, 'Community driven rooted in the local needs of Swat.', 0, '2026-07-15 16:49:11'),
(3, 'Women focused prioritizing the needs and voices of women.', 0, '2026-07-15 16:49:11'),
(4, 'Education first believing education is the key to all progress', 0, '2026-07-15 16:49:11'),
(5, 'Skilled leadership led by dedicated for professionals.', 0, '2026-07-15 16:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `board_governance`
--

CREATE TABLE `board_governance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board_governance`
--

INSERT INTO `board_governance` (`id`, `name`, `role`, `organization`, `created_at`, `updated_at`) VALUES
(6, 'Ms. Naeema Sikandar', 'Women Right Activist', 'Private Job', '2026-07-20 10:29:33', '2026-07-20 10:29:33'),
(7, 'Mr. Nazir Ahmad', 'Member BoG', 'Manager in Jublee Insurance Company', '2026-07-21 07:45:36', '2026-07-21 07:45:36'),
(8, 'Ms. Noor Ul Ain', 'Women Right Activist', 'Private Job', '2026-07-21 07:46:09', '2026-07-21 07:46:09'),
(9, 'Mr. Niaz Ahmad', 'Social Activist', 'Private Job', '2026-07-21 07:46:32', '2026-07-21 07:46:32'),
(10, 'Mr. Salah Ud Din', 'Social Activist', 'Private Job', '2026-07-21 07:46:58', '2026-07-21 07:46:58'),
(11, 'Ms. Nazia', 'Women Right Activist', 'Private Job', '2026-07-21 07:47:28', '2026-07-21 07:47:28'),
(12, 'Mr. Muhammad Fahad Nazir', 'Social Activist', '', '2026-07-21 07:47:47', '2026-07-21 07:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `subject`, `message`, `created_at`) VALUES
(6, 'Kifayat', 'kifayat409070@gmail.com', 'Hahhaha', 'F u', '2026-07-24 08:28:27'),
(7, 'Khalil ullah', 'khalil123@gmail.com', 'For contributions ', 'I am interested ', '2026-07-24 08:40:52'),
(8, 'Azmat ullah', 'azmat678@gmail.com', 'Programs', 'Waiting for upcoming programs to attend ', '2026-07-24 08:47:07'),
(9, 'Yaseen Habib', 'changeezkhan2008@gmail.com', 'Khan', 'Test test', '2026-07-24 16:59:04'),
(10, 'Azeem khan', 'azeemkhan816@gmail.com', 'Session dates', 'Could please share upcoming events dates?', '2026-07-24 17:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_subtitle` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`id`, `page_title`, `page_subtitle`, `address`, `email`, `facebook_url`, `instagram_url`, `linkedin_url`, `youtube_url`, `updated_at`) VALUES
(1, 'Contact Us', 'We\'d love to hear from you. Get in touch with us for any inquiries or support.', 'Marhaba Plaza, 1st Floor, Near General Bus Stand, By Pass Road, Mingora Swat, KPK', 'fahadnazir3099@gmail.com', 'https://facebook.com', 'https://instagram.com', 'https://youtube.com', 'https://youtube.com', '2026-07-19 09:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `event_date` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `event_date`, `created_at`, `updated_at`) VALUES
(3, 'Awareness Campaign', '2026-09-27', '2026-07-16 18:22:38', '2026-09-17 03:07:58'),
(6, 'Training session regarding education', '2026-10-04', '2026-07-26 06:36:39', '2026-09-17 03:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `executive_committee`
--

CREATE TABLE `executive_committee` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `executive_committee`
--

INSERT INTO `executive_committee` (`id`, `position`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Chairperson', 'Leading the strategic direction of the initiative.', '2026-07-16 17:23:29', '2026-07-16 17:23:29'),
(3, 'Finance Secretary', 'Overseeing financial planning and transparency.', '2026-07-16 17:23:29', '2026-07-16 17:23:29'),
(4, 'Member BoG', 'Providing oversight and governance support.', '2026-07-16 17:23:29', '2026-07-16 17:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `focus_areas`
--

CREATE TABLE `focus_areas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `focus_areas`
--

INSERT INTO `focus_areas` (`id`, `title`, `sort_order`, `created_at`) VALUES
(1, 'Quality Education', 0, '2026-07-15 16:45:41'),
(2, 'Women Empowerment', 0, '2026-07-15 16:45:41'),
(3, 'Skills Development', 0, '2026-07-15 16:47:22'),
(4, 'Community Engagement', 0, '2026-07-15 16:47:22'),
(5, 'Safe Spaces', 0, '2026-07-15 16:47:22'),
(6, 'Co-Education', 0, '2026-07-15 16:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `created_at`, `updated_at`) VALUES
(7, '1784536019_Screenshot_20260720-132304.png', '2026-07-20 08:26:59', '2026-07-20 08:26:59'),
(8, '1784536042_Screenshot_20260720-131325.png', '2026-07-20 08:27:22', '2026-07-20 08:27:22'),
(9, '1784536074_Screenshot_20260720-131427.png', '2026-07-20 08:27:55', '2026-07-20 08:27:55'),
(10, '1784536096_Screenshot_20260720-131719.png', '2026-07-20 08:28:17', '2026-07-20 08:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `get_involved_header`
--

CREATE TABLE `get_involved_header` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_subtitle` text NOT NULL,
  `volunteer_heading` varchar(255) NOT NULL,
  `volunteer_description` text NOT NULL,
  `partner_heading` varchar(255) NOT NULL,
  `partner_description` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `get_involved_header`
--

INSERT INTO `get_involved_header` (`id`, `page_title`, `page_subtitle`, `volunteer_heading`, `volunteer_description`, `partner_heading`, `partner_description`, `updated_at`) VALUES
(1, 'Get Involved ', 'Join our mission to empower the women of Swat. Every contribution counts.', 'Become a Volunteer ', 'Share your time and skills to help us grow. Whether you\'re a teacher, a professional, or a student, your help is invaluable. ', 'Become a Partner ', 'We welcome collaborations with organizations that share our vision. Let\'s work together for sustainable change.', '2026-07-18 13:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `about_heading` varchar(255) DEFAULT NULL,
  `about_paragraph1` text DEFAULT NULL,
  `about_paragraph2` text DEFAULT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `vision_title` varchar(255) DEFAULT NULL,
  `vision_description` text DEFAULT NULL,
  `mission_title` varchar(255) DEFAULT NULL,
  `mission_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `hero_title`, `hero_subtitle`, `hero_description`, `hero_image`, `about_heading`, `about_paragraph1`, `about_paragraph2`, `about_image`, `vision_title`, `vision_description`, `mission_title`, `mission_description`, `created_at`, `updated_at`) VALUES
(1, 'SWAT WOMEN RISE INITIATIVE', 'Educate a Girl, Empower a Nation', 'Promoting Equal Learning Opportunities Through Education and Co-Education.', '1784396081_pi.PNG', 'Who We Are', 'Swat Women Rise Initiative is dedicated to empowering women and girls in the Swat region through education and skill development. We exist to bridge the gap in learning opportunities and foster a community where every woman can lead with confidence.', 'Our commitment is to create a sustainable impact by providing the tools and resources necessary for women to thrive in all aspects of life.', '1784535859_Screenshot_20260720-131325.png', 'Our Vision', 'To see a Swat where every girl and woman has equal access to education, leadership opportunities, and social awareness, enabling them to contribute fully to society.', 'Our Mission', 'To promote quality education, skills, leadership, and social awareness among women and girls, fostering an environment of equality and empowerment.', '2026-07-15 15:37:39', '2026-07-20 08:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `leadership_page`
--

CREATE TABLE `leadership_page` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_subtitle` text DEFAULT NULL,
  `founder_image` varchar(255) DEFAULT NULL,
  `founder_name` varchar(255) DEFAULT NULL,
  `founder_designation` varchar(255) DEFAULT NULL,
  `founder_message` text DEFAULT NULL,
  `founder_biography` text DEFAULT NULL,
  `founder_experience` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leadership_page`
--

INSERT INTO `leadership_page` (`id`, `page_title`, `page_subtitle`, `founder_image`, `founder_name`, `founder_designation`, `founder_message`, `founder_biography`, `founder_experience`, `created_at`, `updated_at`) VALUES
(1, 'Our Leadership ', 'Meet the dedicated individuals behind the Swat Women Rise Initiative.', '1784537371_Screenshot_20260720-134759.png', 'Muhammad Fahad Nazir', 'Founder', '\"Our vision is to see a Swat where every girl and woman has equal access to education and leadership opportunities. We are committed to fostering an environment where women can rise and contribute fully to the nation\'s progress.\"', 'Muhammad Fahad Nazir is a visionary leader with extensive experience in community development and educational advocacy. With a background in social sciences and multiple professional certifications in leadership and management, he has dedicated his career to creating social impact in the Swat region.', 'With over a decade of experience working with various national and international organizations, Fahad has a deep understanding of the local socio-economic landscape. His leadership is characterized by a community-driven approach and a focus on sustainable development.', '2026-07-16 17:21:53', '2026-07-20 08:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '1784576265_Screenshot_20260720-224956.png', 'Visits to Different Offices', 'Our team visited different government and private offices to introduce our organization and discuss opportunities for future collaboration. We shared information about our work and built connections to support upcoming projects.', '2026-07-16 18:20:38', '2026-07-21 16:38:20'),
(2, '1784535734_Screenshot_20260720-132144.png', 'Community Awareness Campaign on Girls Education', 'Our team visited local villages and met with parents and community members to raise awareness about the importance of girls education. We encouraged families to support girls in going to school and completing their education.', '2026-07-16 18:20:38', '2026-07-21 16:27:11'),
(5, '1784651529_pi.PNG', 'Progress of Our Work', 'Our team reviewed the progress of our ongoing activities and discussed the achievements made so far. We identified challenges, shared updates, and planned the next steps to ensure the successful completion of our initiative. ', '2026-07-21 16:32:10', '2026-07-21 16:39:26'),
(6, '1784651845_aww.PNG', 'Awareness Session with locals', 'We invited locals to an awareness session where we shared information about the importance of our work. We encouraged them to support our initiative and spread awareness within their communities.', '2026-07-21 16:37:26', '2026-07-21 19:11:59'),
(7, '1784652969_mad.PNG', 'Awareness Session at Female Madrasa', 'We conducted an awareness session at a female madrasa to encourage students to continue their education while also learning practical skills. We shared information about the importance of education, skill development, and how these can help them build a better future.', '2026-07-21 16:56:09', '2026-07-21 16:56:09'),
(8, '1784653054_WhatsApp Image 2026-07-18 at 7.40.35 PM.jpeg', 'Training Session for locals ', 'We conducted a training session for local to share information about the benefits of women’s empowerment. We encouraged them to communicate this message with other people in their communities and support women’s education, skills, and equal opportunities.', '2026-07-21 16:57:34', '2026-07-21 19:11:06'),
(9, '1784653402_dngo.jpeg', 'Meeting with Different NGOs', 'We met with representatives from different NGOs to share our experiences and learn from their work. During the meetings, we discussed community development, exchanged ideas, and explored opportunities for future collaboration.', '2026-07-21 17:03:22', '2026-07-21 17:03:22'),
(10, '1784653714_aaaa.PNG', 'Empowerment Session for Girls', 'We conducted a session for girls who are continuing their education and developing their skills. The session focused on encouraging them to become role models and spread awareness in their communities, especially among girls and women facing challenges, about the importance of education and empowerment.', '2026-07-21 17:08:34', '2026-07-21 17:08:34'),
(11, '1784881843_Screenshot_20260724-132620.png', 'Productive meeting with Rozan Pakistan ', 'A productive meeting with Rozan Pakistan NGO members, where we shared valuable experiences, exchanged ideas, and discussed collaborative strategies to strengthen and improve our upcoming programs for greater community impact.', '2026-07-24 08:30:44', '2026-07-24 08:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `news_page`
--

CREATE TABLE `news_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_page`
--

INSERT INTO `news_page` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'News & Events', 'Stay updated with our latest activities and upcoming events.', '2026-07-16 18:17:45', '2026-07-18 08:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `partner_inquiries`
--

CREATE TABLE `partner_inquiries` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(200) NOT NULL,
  `representative_name` varchar(150) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partner_inquiries`
--

INSERT INTO `partner_inquiries` (`id`, `organization_name`, `representative_name`, `purpose`, `message`, `created_at`) VALUES
(1, 'ABC Foundation', 'Ahmed Khan', 'Educational Support', 'We want to collaborate for educational programs and community awareness campaigns.', '2026-07-18 08:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `feature_1` varchar(255) DEFAULT NULL,
  `feature_2` varchar(255) DEFAULT NULL,
  `feature_3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `image`, `title`, `description`, `feature_1`, `feature_2`, `feature_3`, `created_at`, `updated_at`) VALUES
(4, '1784397560_cdev.PNG', 'Community Engagement', 'We work closely with the community to raise awareness about the importance of women\'s education and rights. Through campaigns and meetings, we foster a supportive environment for change.', 'Awareness Sessions', 'Community Meetings', 'Social Advocacy Campaigns', '2026-07-16 11:25:01', '2026-07-18 17:59:20'),
(5, '1784576140_Screenshot_20260720-131427.png', 'Leadership Development', 'Developing the next generation of leaders is vital. We provide youth and women with mentorship and training to take on leadership roles in society.', 'Youth Leadership Programs', 'Mentorship Networks', 'Public Speaking Training', '2026-07-16 11:25:01', '2026-07-20 19:35:41'),
(9, '1784576096_Screenshot_20260720-131719.png', 'Quality Education', 'We provide comprehensive educational support to girls and women, ensuring they have access to quality learning resources, mentorship, and formal education opportunities. Our programs are designed to bridge the literacy gap and prepare students for a brighter future.', 'Literacy Campaigns', 'Scholarship Support', 'Tutoring & Mentorship', '2026-07-16 11:20:48', '2026-07-20 19:34:57'),
(10, '1784397047_l1.PNG', 'Women Empowerment', 'Our empowerment programs focus on building leadership, confidence, and entrepreneurship among women. We believe that by giving women the tool to lead, they can transform their families and communities.', 'Leadership Workshops', 'Confidence Building Sessions', 'Entrepreneurship Training', '2026-07-16 11:20:48', '2026-07-18 17:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `programs_page`
--

CREATE TABLE `programs_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs_page`
--

INSERT INTO `programs_page` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Our Programs', 'Dedicated initiatives to empower, educate, and uplift.', '2026-07-16 11:14:31', '2026-07-16 16:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_applications`
--

CREATE TABLE `volunteer_applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer_applications`
--

INSERT INTO `volunteer_applications` (`id`, `full_name`, `email`, `phone`, `skills`, `message`, `created_at`) VALUES
(1, 'Ali Khan', 'ali@gmail.com', '03000000000', 'Teaching', 'I want to support girls education programs.', '2026-07-18 08:15:36'),
(5, 'Shah', 'shah123@gmail.com', '03489368425', 'Developer ', 'I am interested ', '2026-07-19 08:05:52'),
(6, 'Zahoor ', 'za2564459@gmail.com', '03308759103', 'IT', 'I want to join the organization so what steps should i take?', '2026-07-21 06:20:18'),
(7, 'usama mahboob', 'usamamehboob8@gmail.com', '0491172336', 'Marketing ', '', '2026-07-21 07:25:28'),
(8, 'usama mahboob', 'usamamehboob8@gmail.com', '0491172336', 'Marketing ', '', '2026-07-21 07:25:30'),
(9, 'Muhammad Waqas ', 'mwrahi@gmail.com', '03469306016', 'E-commerce, IT', 'I\'m Glad to see such a great and visionary project in my hometown, my skills and services are available as volunteer to this program.', '2026-07-21 10:32:25'),
(10, 'Muhammad Waqas ', 'mwrahi@gmail.com', '03469306016', 'E-commerce, IT', 'I\'m Glad to see such a great and visionary project in my hometown, my skills and services are available as volunteer to this program.', '2026-07-21 10:32:25'),
(11, 'Syed Nasir Shah', 'snassh@outlook.com', '03470194216', 'Marketing ', 'A great initiative ', '2026-07-21 13:23:58'),
(12, 'Fawad ahmad', 'fd457045@gmail.com', '03174167889', 'Marketing', 'Assalam-o-Alaikum,\r\nMy name is Fawad Ahmad, and I am working in medicine distribution in Kanju, Swat, Khyber Pakhtunkhwa. I am interested in joining your organization as a member/volunteer and working for poor and deserving people in my area.\r\nI would like to support medicine distribution and help provide medicines to people who cannot afford them. Please guide me about your membership/application process and let me know how I can work with your organization in Swat.\r\nI will be grateful for your support and guidance.\r\nThank you.\r\nFawad Ahmad\r\nKanju, Swat, KP', '2026-09-14 19:30:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_objectives`
--
ALTER TABLE `about_objectives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_id` (`about_id`);

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_governance`
--
ALTER TABLE `board_governance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `executive_committee`
--
ALTER TABLE `executive_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `focus_areas`
--
ALTER TABLE `focus_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_involved_header`
--
ALTER TABLE `get_involved_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leadership_page`
--
ALTER TABLE `leadership_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_page`
--
ALTER TABLE `news_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_inquiries`
--
ALTER TABLE `partner_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs_page`
--
ALTER TABLE `programs_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer_applications`
--
ALTER TABLE `volunteer_applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_objectives`
--
ALTER TABLE `about_objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `board_governance`
--
ALTER TABLE `board_governance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `executive_committee`
--
ALTER TABLE `executive_committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `focus_areas`
--
ALTER TABLE `focus_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `get_involved_header`
--
ALTER TABLE `get_involved_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leadership_page`
--
ALTER TABLE `leadership_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news_page`
--
ALTER TABLE `news_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partner_inquiries`
--
ALTER TABLE `partner_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `programs_page`
--
ALTER TABLE `programs_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volunteer_applications`
--
ALTER TABLE `volunteer_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_objectives`
--
ALTER TABLE `about_objectives`
  ADD CONSTRAINT `about_objectives_ibfk_1` FOREIGN KEY (`about_id`) REFERENCES `about_page` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
