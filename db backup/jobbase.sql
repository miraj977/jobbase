-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2020 at 09:51 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `summary`, `user_id`, `create_date`) VALUES
(1, 'Web Development', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 10, '2020-04-02 00:00:00'),
(2, 'Application Development', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.d', 10, '2020-04-02 00:00:00'),
(4, 'Artificial Intelligence', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 10, '2020-04-02 20:53:53'),
(8, 'Mobile development', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 11, '2020-04-02 21:14:35'),
(9, '.NET Development', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 11, '2020-04-02 21:16:29'),
(10, 'Software Development', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 11, '2020-04-02 21:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `requirements` text NOT NULL,
  `salary_range` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id`, `category_id`, `user_id`, `title`, `description`, `type`, `requirements`, `salary_range`, `city`, `state`, `zipcode`, `contact_phone`, `contact_email`, `is_published`, `create_date`) VALUES
(1, 1, 10, 'Web Developer', 'Great opportunity for a junior developer\r\nIncredible work culture\r\nWork with the latest technology and frameworks to build new platforms', 'Developer', 'Responsibilities:\r\nImplement front-end user interfaces for the clients internal portal, e-commerce site and blog\r\nCode new web components and features in an open source web ecosystem (PHP + JavaScript)\r\nCreate HTML assets for multi-lingual email campaigns\r\nContribute to broader digital transformation projects', '55k-80k', 'Sydney', 'NSW', '2000', '0492883933', 'c@comp.com', 1, '2020-04-02 21:26:14'),
(2, 10, 10, 'Software Developer', 'Great opportunity for a junior developer\r\nIncredible work culture\r\nWork with the latest technology and frameworks to build new platforms', 'Full-time', 'Great opportunity for a junior developer\r\nIncredible work culture\r\nWork with the latest technology and frameworks to build new platforms', '80k-110k', 'Sydney', 'NSW', '2000', '229494893', 'softw@g.com', 1, '2020-04-02 21:26:14'),
(3, 4, 10, 'Python Developer', 'At Lexer, we help make complex data simple for retail businesses, and our roadmap is jam-packed full of market-first features. We’re looking for developers to code, test and ship deep integrations with the data platforms (e.g. Mailchimp, Shopify etc.) that our clients use and to help design and build the next generation of our data ingestion APIs.', 'Full-time', 'Production experience with Python (or maybe Ruby, Scala or...)\r\n\r\nExperience with writing code that uses AWS services such as SQS, S3, Lambda, ECS, API Gateway etc.s\r\n\r\nExperience with Elasticsearch and/or PostgreSQL\r\n\r\nKnowledge of software testing and information security best practices\r\n\r\nAn eye for code style and quality and a drive to continually improve\r\n\r\nFamiliarity with Github, Linux, Docker and build tools such as Buildkite\r\n\r\nExperience working in a dev ops environment (e.g. with automated testing and deployment, infrastructure as code, application monitoring etc.)\r\n\r\nFierce attention to detail, and personal pride in the quality of your work', '$70k-$90k', 'Hurstville', 'NSW', '2220', '+61450476273', 'nirushakhadka977@gmail.com', 1, '2020-04-03 00:47:04'),
(4, 9, 11, 'ASP.NET Dev', 'At Lexer, we help make complex data simple for retail businesses, and our roadmap is jam-packed full of market-first features. We’re looking for developers to code, test and ship deep integrations with the data platforms (e.g. Mailchimp, Shopify etc.) that our clients use and to help design and build the next generation of our data ingestion APIs.', 'casual', 'Build new integrations in Python with third party data platforms (we currently have ~20 integrations e.g. Shopify, Mailchimp etc)\r\n\r\nMaintain our existing integrations, keeping up to date with changes to third party APIs and ensuring that they continue to help our clients meet the outcomes they require\r\n\r\nBecome the subject matter expert in how to best work with the systems we integrate with', '$50k-$70k', 'Hurstville', 'NSW', '2220', '+61411381165', 'mirajaryal@gmail.com', 1, '2020-04-03 00:50:09'),
(5, 8, 11, 'React Developer', 'Changing the value here doesn\'t make sense, because it\'s active field. It means value will be synchronized with the model value.\r\n\r\nJust change the value of $model->hidden1 to change it. Or it will be changed after receiving data from user after submitting form.', 'Full-time', 'This is an attempt to reconcile two extreme positions in a way that is acceptable to the majority of the community:\r\n\r\nSome feel it\'s irrelevant that it\'s homework: always just answer with complete code.\r\nSome feel that Stack Overflow is not the place for homework: close all homework questions immediately.\r\nThis post is not the official position of the Stack Overflow administrators, but rather a community-edited effort to provide clear guidelines on how to respond to homework. Individual community members should, of course, use their own judgment.\r\n\r\nThe guidelines outlined below are rooted in two principles:\r\n\r\nIt is okay to ask about homework. For one, it would be impossible to stop it all even if we wanted to. Stack Overflow exists to help programmers learn and provide a standard repository for programming problems, both simple and complex, and this includes helping students.\r\n\r\nProviding an answer that doesn\'t help a student learn is not in the student\'s own best interest. Therefore you might choose to treat homework questions differently than other questions.', '$90k-$110k', 'Hurstville', 'NSW', '2220', '+61411381165', 'mirajaryal@gmail.com', 1, '2020-04-03 15:32:50'),
(7, 2, 1, 'Java Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'contract', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '$50k-$70k', 'Hurstville', 'NSW', '2220', '+61411381165', 'mirajaryal@gmail.com', 1, '2020-04-03 20:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `email`, `password`, `auth_key`, `create_date`) VALUES
(1, 'Super User', 'admin', 'admin@admin.com', 'f25c71d9bcd588c85ffa55e9e60f9c24', 'BjyVxmIaOTfeXrxb34Kcj3DU3Is9lD9r', '2020-04-03 09:23:58'),
(10, 'Miraj Aryal', 'mraz', 'mirajaryal@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'ikyAwpABZ5sYgIhWFLjw4QfpCZXxHcah', '2020-04-03 03:47:20'),
(11, 'Nirusha Khadka', 'nucha', 'nirushakhadka977@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'LDJ-jeQllN-ALD7OLseQ07mhAaz8dilw', '2020-04-03 04:20:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
