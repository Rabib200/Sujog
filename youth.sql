-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 06:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `approveByAdmin` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `appProcess` longtext NOT NULL,
  `eligibilities` longtext NOT NULL,
  `benefits` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fundingType` varchar(255) NOT NULL,
  `sDate` varchar(255) NOT NULL,
  `eDate` varchar(255) NOT NULL,
  `featuredImage` varchar(255) NOT NULL,
  `appliedLink` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `organizers` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `organizerMail` varchar(255) NOT NULL,
  `organizerPhone` int(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`approveByAdmin`, `title`, `description`, `appProcess`, `eligibilities`, `benefits`, `type`, `fundingType`, `sDate`, `eDate`, `featuredImage`, `appliedLink`, `location`, `organizers`, `tags`, `organizerMail`, `organizerPhone`, `post_id`, `id`) VALUES
(0, 'Abstractd Visual Art Prize 2022', 'Abstractd promotes abstract artists from around the world through their thriving Instagram account. They also curate an ongoing collection in collaboration with Kaleido, an innovative art platform and community.', 'Create a Kaleido account. You will need to do this on a desktop computer (not a mobile device)\r\nPublish at least five artworks to Kaleido. The more artwork you publish, the more chances you have to win.\r\nSubmit the link to your Kaleido profile', 'Portfolio must include at least 5 artworks. Artworks submitted must be abstract artwork. Abstract staff will act as jurors. The artist will retain ownership of the physical artwork and its image rights. Open to abstract artists of legal age\r\nAbstract art,', 'First Place $1000, Second Place $700, Third Place $300, 10x Honorable Mentions $100', 'Competition', 'Partially-Funded', '2022-09-16', '2022-09-27', 'web/632383e55fd702.04938483.jpg ', 'https://abstractd.kaleido.art/', 'Dhaka', 'Sahid Hossain Mustakim', 'Online', 'sratul35@gmail.com', 1409096307, 7, 11),
(0, 'Patrimonito Storyboard Competition 2022', 'The UNESCO World Heritage Centre is pleased to launch the latest edition of the Patrimonito Storyboard Competition 2022. This competition aims to provide young people with an opportunity to use their creative and problem-solving skills to raise awareness ', 'Preparing a storyboard is like drawing a comic book. It is a script that presents a story through sketches in chronological sequence. Usually, a storyboard is drawn in pencil, ink, or through digital drawing tools. The images or visual illustrations of th', 'The Patrimonito storyboard competition is open to young people from all over the world aged between 12 and 18 years old.\r\nThe artworks must be created solely by the participant(s), either by hand or using digital drawing tools.', 'They invite young people from around the world to reflect on\r\nthe pressing issue of Climate Change, its impact on the World Heritage sites around them, and solutions or measures in their opinion, that would help address these challenges.', 'Competition', 'Fully-Funded', '2022-09-19', '2022-09-30', 'web/632385206d5073.64845603.jpg ', 'https://whc.unesco.org/en/patrimonito-2022/#participate', 'Sylhet', 'Hriday Das', 'Online', 'smustakim201274@bscse.uiu.ac.bd', 1409096307, 8, 11),
(1, 'The Elisabeth Amélie Fund Scholarship 2022', 'Grants to enable foreign master’s students to do an internship in sustainable water management in a developing country. Grants awarded by the Elisabeth & Amélie Fund. \r\nThe Elisabeth & Amelie Fund supports sustainable water management in developing countries, among others by financing on-the-spot internships for students from developing countries who are studying in Belgium.\r\n\r\nThe Elisabeth & Amelie Fund takes into consideration an integrated approach to water management that includes technical and/or sociological aspects.\r\n', 'You have to log in or register before you can complete an application form.\r\nYou can temporarily save your (partly) completed form and complete it later.\r\nTo continue working on your application form, please log in.\r\nComplete the application form online (you can take your time and do it in several stages if you like).\r\nWhen your application has been fully completed, send it in.\r\nThey will send you a confirmation by e-mail, as well as a pdf of your application.', 'Students from developing countries who are pursuing a master’s level degree (master’s, specialisation master’s or a second bachelor’s degree)\r\nStudents who are working on a thesis that is linked to water management.', 'The grant will cover the expenses inherent to the internship, up to a maximum of € 5,000.\r\nThe internship, which should last 1 to 2 months, must take place between December 2022 and the end of August 2023.\r\nAbout ten grants shall be awarded.', 'Competition', 'General', '2022-09-20', '2022-10-20', 'web/63238a81152af4.74690333.jpg ', 'https://www.kbs-frb.be/en/call-scholarships-2022-elisabeth-amelie-fund', 'Barishal', 'Samanta Binte Sultan', 'Offline', 'sratul35@gmail.com', 1568083850, 9, 10),
(1, 'TE Connectivity African Heritage Scholarship Program', 'TE Connectivity has established a 2-year scholarship program to assist college students who will be sophomores for the 2022-2023 academic year and are majoring in Engineering (all disciplines), Operations Management, Finance, Supply Chain, or Marketing. The program provides a college scholarship paired with career development, including a required PAID internship with TE Connectivity for two summers after the sophomore year of college.  Learn more about the African Heritage Scholarship Program and visit the TE Connectivity Careers Page.\r\n\r\nThe program is administered by Scholarship America®, the nation’s largest designer and manager of scholarships and other education support programs for corporations, foundations, associations, and individuals. Eligibility for individual programs is determined at the sole discretion of the sponsor, and eligible applications are reviewed by Scholarship America’s evaluation team. \r\n\r\nFinancial needs will be considered. Recipients must demonstrate need.\r\n\r\nScholarship America will select up to 40 finalists. Provided there are qualified applicants, approximately five (5) finalists will be selected from each of the five (5) preferred HBCUs and fifteen (15) finalists will be selected from any four-­year college or university in the United States.\r\n\r\nTE Connectivity will request video interviews with the finalists and will select up to 14 recipients.\r\n\r\nScholarship America processes scholarship payments on behalf of TE Connectivity. Payment is made in September 2023, after successful completion of PAID internship with TE Connectivity\r\n', 'As part of your application, you must upload the following:\r\n\r\nA current, complete transcript of grades. Grade reports are not accepted. Transcripts must display student name, school name, grades and credit hours for each course and term in which each course was taken\r\nA copy of the latest 1040 tax filing', 'Applicants to the TE Connectivity African Heritage Scholarship Program must:\r\n\r\nBe a U.S. citizen or permanent resident\r\nSelf-identify as Black or African American or multiracial*\r\nBe enrolling as college sophomores for the 2022-2023 academic year\r\nBe willing to accept a 2023 summer paid internship with TE Connectivity**\r\nHave a minimum grade point average of 3.0 on a 4.0 scale (or its equivalent)\r\nBe majoring in Engineering (all disciplines), Operations Management, Finance, Supply Chain, or Marketing\r\nBe enrolled in full-time undergraduate study at an accredited four-year college or university (in the U.S.) and planning to continue full-time enrollment for the entire upcoming academic year\r\nApplicants who self-identify as more than one race/ethnicity are eligible as long as one of the races/ethnicities is Black or African American.\r\n\r\nRecipients (both new and renewal) must complete a summer paid internship to receive their award disbursement the following fall. Internships are full-time positions, 40 hours per week.', 'If selected as a recipient, the student will receive\r\n\r\nan award of up to $22,500 per year in each of the next two years upon successful completion of the paid summer internships. Up to 14 awards will be granted.\r\nAward amounts will be determined based on', 'Scholarship', 'General', '2022-09-08', '2022-10-07', 'web/63238b738a7976.70832764.jpg ', 'https://learnmore.scholarsapply.org/teconnectivity-african-heritage/', 'Dhaka', 'Sahid Hossain Mustakim', 'Offline', 'smustakim201274@bscse.uiu.ac.bd', 1409096307, 10, 10),
(1, 'UPG Sustainability Leadership Program 2023 (Fully Funded to USA)', 'UPG Sustainability Leadership Program 2023 (Fully Funded to USA).  Are you a passionate citizen, aged 18 to 35, that believes your actions can support your local community and that every small positive action can make the world a better place? Then you are welcome to apply for the 2023 Program.', 'Apply through the Apply now link.\r\nCompetition for the UPGSL is merit-based. After the deadline, all eligible applications will be reviewed by a selection panel. Individuals and Institutions of any nature interested in sending candidates are entitled to apply for the program. Before applying for UPG Sustainability Leadership, they encourage you to register as a UPG Champion (either as an individual or as an organization) as they prioritize champions who are engaged in UPG.', 'Participants will have the costs of the program covered – Training material.  Accommodation, subsistence, local transportation, international flights (a round trip flight from participant’s hometown to the US);\r\nAll 500 participants will receive an online training and will be certified as UPG Sustainability Leaders after completion of the course.', 'Participants will have the costs of the program covered – Training material.  Accommodation, subsistence, local transportation, international flights (a round trip flight from participant’s hometown to the US);\r\nAll 500 participants will receive an online', 'Miscellaneos', 'Fully-Funded', '2022-09-16', '2022-12-31', 'web/63238c9d508378.46552285.jpg ', 'https://act.unitedpeople.global/upg-sustainability-leadership/', 'Dhaka', 'Samanta Binte Sultan', 'Online', 'smustakim201274@bscse.uiu.ac.bd', 1409096307, 11, 10),
(1, 'Taiwanese Talent Intl. Remote Internship', 'Share\r\nTweet\r\nSubscribe\r\nTCA is calling for overseas organizations (founded outside of Taiwan, People Republic of China, Hong Kong and Macau) that are looking for international young talent and are willing to offer remote internship opportunities for Taiwanese students. If your organization is interested in recruiting Taiwanese talent, come to join the 2022 TCA Program and become their internship host partner! ', 'If your organization is interested in recruiting Taiwanese talent, come to join the 2022 TCA Program and become their internship host partner!', 'If your organization is interested in recruiting Taiwanese talent, come to join the 2022 TCA Program and become their internship host partner!', 'If your organization is interested in recruiting Taiwanese talent, come to join the 2022 TCA Program and become their internship host partner!', 'Internship', 'Fully-Funded', '2022-09-14', '2022-09-30', 'web/63238e1b5d7820.73316768.jpg ', 'https://www.talentcirculationalliance.org/post/621ed6fe80a0db44fb0751c7', 'Chattogram', 'Nur Islam', 'Online', 'sratul35@gmail.com', 1409096307, 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `admin_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`admin_id`, `u_id`, `type`, `location`, `user_id`) VALUES
(1, 29, 'Internships', 'Barishal', 1),
(1, 30, 'Fellowships', 'Chattogram', 11),
(1, 31, 'Workshops', 'Dhaka', 11),
(1, 32, 'Any Opportunity', 'Dhaka', 10),
(1, 33, 'Any Opportunity', 'Barishal', 10),
(1, 34, 'Any Opportunity', 'Dhaka', 10),
(1, 35, 'Any Opportunity', 'Rangpur', 12),
(1, 36, 'Internships', 'Dhaka', 12),
(1, 37, 'Any Opportunity', 'Dhaka', 12),
(1, 38, 'Workshops', 'Dhaka', 10),
(1, 49, 'Internships', 'Dhaka', 10),
(1, 50, 'Competitions', 'Dhaka', 10),
(1, 51, 'Scholarships', 'Dhaka', 10),
(1, 52, 'Scholarships', 'Dhaka', 10),
(1, 53, 'Scholarships', 'Dhaka', 10),
(1, 54, 'Scholarships', 'Dhaka', 10),
(1, 55, 'Scholarships', 'Dhaka', 10),
(1, 56, 'Scholarships', 'Dhaka', 10),
(1, 57, 'Fellowships', 'Rangpur', 10),
(1, 58, 'Scholarships', 'Barishal', 22),
(1, 59, 'Scholarships', 'Barishal', 22),
(1, 60, 'Internships', 'Barishal', 22),
(1, 61, 'Internships', 'Barishal', 24);

-- --------------------------------------------------------

--
-- Table structure for table `searchbar`
--

CREATE TABLE `searchbar` (
  `id` int(11) NOT NULL,
  `search_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `searchbar`
--

INSERT INTO `searchbar` (`id`, `search_id`, `value`, `admin_id`) VALUES
(10, 1, 'comp', 1),
(10, 30, 'sc', 1),
(11, 31, 'job', 1),
(1, 32, 'work', 1),
(10, 33, 'asd', 1),
(10, 34, 'comp', 1),
(22, 35, 'Yout', 1),
(22, 45, 'asd', 1),
(22, 46, 'yout', 1),
(22, 47, 'globa', 1),
(22, 48, 'Tai', 1),
(24, 49, 'asd', 1),
(24, 50, 'scholar', 1),
(24, 51, 'has', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `points`) VALUES
(1, 'sahid', 'sratul3523@gmail.com', '1234', 100),
(10, 'Sahid Hossain Mustakim', 'smustakim201274@bscse.uiu.ac.bd', '123', 600),
(11, 'Nur Islam', 'nur@gmail.com', '1234', 200),
(12, 'Hriday Das', 'hriday@gmail.com', '2461', 0),
(13, 'Mehsan Islam', 'mehsan877143@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(14, 'Sahid Hossain Mustakim', 'sratul35@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1000),
(21, 'Tashfia Zaman', 'tash@gmail.com', 'cf05968255451bdefe3c5bc64d550517', 200),
(22, 'Mustakim Hossain', 'smustakim011201274@bscse.uiu.ac.bd', 'ec52b19758fd5c594838196f974a5cc3', 0),
(23, 'sa', 'asd@gmail.com', '123', 0),
(24, 'Tashfia Zaman', 'tash3@gmail.com', '2461', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `Test2` (`user_id`),
  ADD KEY `Test2w` (`admin_id`);

--
-- Indexes for table `searchbar`
--
ALTER TABLE `searchbar`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `asdadad` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `searchbar`
--
ALTER TABLE `searchbar`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `search`
--
ALTER TABLE `search`
  ADD CONSTRAINT `Test2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Test2w` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `searchbar`
--
ALTER TABLE `searchbar`
  ADD CONSTRAINT `asdadad` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
