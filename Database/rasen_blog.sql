-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2023 at 03:53 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasen_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int NOT NULL,
  `admin_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'MdRasen', 'aamin.hossen99@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `cate_name` varchar(100) NOT NULL,
  `cate_slug` varchar(100) NOT NULL,
  `cate_desc` text NOT NULL,
  `cate_sort` int NOT NULL,
  `cate_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_slug`, `cate_desc`, `cate_sort`, `cate_status`) VALUES
(14, 'HTML', 'html', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis pariatur consectetur doloremque.', 1, 'Active'),
(15, 'CSS', 'css', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis pariatur consectetur doloremque.', 2, 'Active'),
(16, 'JavaScript', 'javascript', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis pariatur consectetur doloremque.', 3, 'Active'),
(17, 'Bootstrap', 'bootstrap', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis pariatur consectetur doloremque.', 4, 'Active'),
(18, 'Others', 'others', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis pariatur consectetur doloremque.', 5, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `post_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cate_id` int NOT NULL,
  `post_desc` longtext NOT NULL,
  `post_tags` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_author` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_total_views` int DEFAULT '0',
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_slug`, `post_img`, `cate_id`, `post_desc`, `post_tags`, `post_author`, `post_status`, `post_total_views`, `updated_at`) VALUES
(28, 'What is a blog post?', 'what-is-a-blog-post-', '1679500303-portfolio-1.jpg', 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus nibh sit amet lectus lacinia porttitor. Nunc scelerisque ipsum vel venenatis elementum. Donec sed neque elementum, ullamcorper urna non, sodales purus. Donec vitae faucibus purus. Cras nec auctor lectus, ut congue eros. In in rutrum massa. Integer tincidunt lacinia sapien a interdum. Nulla faucibus neque ac nunc dictum eleifend. Etiam cursus non ligula sed gravida. Phasellus sit amet lorem lobortis, malesuada augue ac, vestibulum risus. In hac habitasse platea dictumst. Fusce varius risus libero, ac malesuada purus congue eget. Nulla rutrum arcu eu tincidunt lacinia. Sed eget metus ut nibh fermentum hendrerit.\r\n\r\nDonec scelerisque nulla non justo convallis dignissim. Praesent at neque laoreet, fringilla erat at, vestibulum mi. Praesent tincidunt, nibh sit amet commodo dignissim, sapien tortor consectetur erat, nec dignissim ante mi sed nulla. Vivamus et accumsan ante. Nam tristique auctor nisi sed ornare. Duis finibus, turpis ac porttitor bibendum, tellus lectus sodales lacus, in ultrices urna lacus vel dui. Praesent sodales maximus condimentum. Donec et ante scelerisque lacus rutrum convallis eu quis urna. Phasellus laoreet finibus odio, a tempor diam rutrum in. In hac habitasse platea dictumst. Maecenas aliquam vel turpis sit amet elementum. Cras eget nisl ligula. Curabitur in velit ultricies, iaculis nibh sit amet, pretium risus. Pellentesque mollis massa vitae interdum finibus. Integer quis sem egestas leo pretium suscipit vel vel nisi. Donec ornare urna turpis, ac tincidunt arcu consequat vel.\r\n\r\nDuis ac malesuada odio. Nunc metus magna, aliquam et turpis ac, feugiat ullamcorper risus. Curabitur ultrices eleifend pretium. Nullam cursus felis non lacinia mattis. Suspendisse potenti. Donec ac dignissim massa, ut scelerisque nulla. Sed tellus ipsum, viverra nec leo sit amet, gravida rhoncus eros. Praesent ullamcorper augue a tellus porta consequat. Vestibulum non odio tortor. Quisque in ligula quis nisl convallis blandit. Mauris lacus mauris, condimentum id risus sit amet, mattis dictum nisl. Donec arcu ex, facilisis et eros nec, posuere dictum nulla. Aenean sit amet porta velit. Sed semper est nulla, vitae blandit enim accumsan ut. Pellentesque et metus a lorem pulvinar imperdiet at sit amet nisl.', 'Tags', 'Admin', 'Active', 0, '2023-03-22'),
(29, 'Dummy Blog post 1', 'dummy-blog-post-1', '1679500329-portfolio-2.jpg', 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus nibh sit amet lectus lacinia porttitor. Nunc scelerisque ipsum vel venenatis elementum. Donec sed neque elementum, ullamcorper urna non, sodales purus. Donec vitae faucibus purus. Cras nec auctor lectus, ut congue eros. In in rutrum massa. Integer tincidunt lacinia sapien a interdum. Nulla faucibus neque ac nunc dictum eleifend. Etiam cursus non ligula sed gravida. Phasellus sit amet lorem lobortis, malesuada augue ac, vestibulum risus. In hac habitasse platea dictumst. Fusce varius risus libero, ac malesuada purus congue eget. Nulla rutrum arcu eu tincidunt lacinia. Sed eget metus ut nibh fermentum hendrerit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus nibh sit amet lectus lacinia porttitor. Nunc scelerisque ipsum vel venenatis elementum. Donec sed neque elementum, ullamcorper urna non, sodales purus. Donec vitae faucibus purus. Cras nec auctor lectus, ut congue eros. In in rutrum massa. Integer tincidunt lacinia sapien a interdum. Nulla faucibus neque ac nunc dictum eleifend. Etiam cursus non ligula sed gravida. Phasellus sit amet lorem lobortis, malesuada augue ac, vestibulum risus. In hac habitasse platea dictumst. Fusce varius risus libero, ac malesuada purus congue eget. Nulla rutrum arcu eu tincidunt lacinia. Sed eget metus ut nibh fermentum hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus nibh sit amet lectus lacinia porttitor. Nunc scelerisque ipsum vel venenatis elementum. Donec sed neque elementum, ullamcorper urna non, sodales purus. Donec vitae faucibus purus. Cras nec auctor lectus, ut congue eros. In in rutrum massa. Integer tincidunt lacinia sapien a interdum. Nulla faucibus neque ac nunc dictum eleifend. Etiam cursus non ligula sed gravida. Phasellus sit amet lorem lobortis, malesuada augue ac, vestibulum risus. In hac habitasse platea dictumst. Fusce varius risus libero, ac malesuada purus congue eget. Nulla rutrum arcu eu tincidunt lacinia. Sed eget metus ut nibh fermentum hendrerit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus nibh sit amet lectus lacinia porttitor. Nunc scelerisque ipsum vel venenatis elementum. Donec sed neque elementum, ullamcorper urna non, sodales purus. Donec vitae faucibus purus. Cras nec auctor lectus, ut congue eros. In in rutrum massa. Integer tincidunt lacinia sapien a interdum. Nulla faucibus neque ac nunc dictum eleifend. Etiam cursus non ligula sed gravida. Phasellus sit amet lorem lobortis, malesuada augue ac, vestibulum risus. In hac habitasse platea dictumst. Fusce varius risus libero, ac malesuada purus congue eget. Nulla rutrum arcu eu tincidunt lacinia. Sed eget metus ut nibh fermentum hendrerit.', 'Tags', 'Admin', 'Active', 0, '2023-03-22'),
(30, 'Dummy Blog post 2', 'dummy-blog-post-2', '1679500351-portfolio-3.jpg', 18, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus nibh sit amet lectus lacinia porttitor. Nunc scelerisque ipsum vel venenatis elementum. Donec sed neque elementum, ullamcorper urna non, sodales purus. Donec vitae faucibus purus. Cras nec auctor lectus, ut congue eros. In in rutrum massa. Integer tincidunt lacinia sapien a interdum. Nulla faucibus neque ac nunc dictum eleifend. Etiam cursus non ligula sed gravida. Phasellus sit amet lorem lobortis, malesuada augue ac, vestibulum risus. In hac habitasse platea dictumst. Fusce varius risus libero, ac malesuada purus congue eget. Nulla rutrum arcu eu tincidunt lacinia. Sed eget metus ut nibh fermentum hendrerit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus nibh sit amet lectus lacinia porttitor. Nunc scelerisque ipsum vel venenatis elementum. Donec sed neque elementum, ullamcorper urna non, sodales purus. Donec vitae faucibus purus. Cras nec auctor lectus, ut congue eros. In in rutrum massa. Integer tincidunt lacinia sapien a interdum. Nulla faucibus neque ac nunc dictum eleifend. Etiam cursus non ligula sed gravida. Phasellus sit amet lorem lobortis, malesuada augue ac, vestibulum risus. In hac habitasse platea dictumst. Fusce varius risus libero, ac malesuada purus congue eget. Nulla rutrum arcu eu tincidunt lacinia. Sed eget metus ut nibh fermentum hendrerit.', 'Tags', 'Admin', 'Active', 0, '2023-03-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
