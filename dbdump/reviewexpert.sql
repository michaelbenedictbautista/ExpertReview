-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 21, 2022 at 09:50 AM
-- Server version: 8.0.28
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviewexpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int NOT NULL,
  `restaurant_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_mon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_tue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_wed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_thu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_fri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_sat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_sun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_id` int NOT NULL,
  `restaurant_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `restaurant_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_address`, `restaurant_phone`, `restaurant_web`, `restaurant_menu`, `restaurant_hours_mon`, `restaurant_hours_tue`, `restaurant_hours_wed`, `restaurant_hours_thu`, `restaurant_hours_fri`, `restaurant_hours_sat`, `restaurant_hours_sun`, `restaurant_image`, `UpdatedDate`, `cat_id`, `restaurant_name`, `restaurant_details`) VALUES
(1, '363A Pitt St, Sydney NSW 2000', '0292690299', 'https://www.facebook.com/Myungjang363A/', 'https://www.facebook.com/Myungjang363A/', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', NULL, '2022-03-21 09:29:15', 1, 'Myung jang and Obaltan restaurant', 'Bustling, rustic-chic Korean BBQ restaurant with individual grills and Sydney Harbour Bridge mural.'),
(2, '186-188 Victoria St, Potts Point NSW 2010', '0285934567', 'http://chacobar.com.au/', 'http://chacobar.com.au/', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', NULL, '2022-03-21 09:34:23', 2, 'Chaco Bar', 'Industrial-chic destination spotlighting elevated Japanese bar bites & infused sake offerings.'),
(3, 'Ground Floor shop 12/501 George St, Sydney NSW 2000', NULL, 'http://www.chefsgallery.com.au/', 'https://order-direct.com.au/group/chefsgallery', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', '05:30-11:30', NULL, '2022-03-21 09:39:15', 3, 'Chefs Gallery Town Hall', 'Modern setup for handmade Chinese noodles and creative share plates cooked in an open kitchen.');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_category`
--

CREATE TABLE `restaurant_category` (
  `cat_id` int NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `restaurant_category`
--

INSERT INTO `restaurant_category` (`cat_id`, `cat_name`) VALUES
(1, 'Korean'),
(2, 'Japanese'),
(3, 'Chinese'),
(4, 'Mexican'),
(5, 'Thai'),
(6, 'Fast Food');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `user_image` date DEFAULT NULL,
  `UpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_name`, `user_email`, `user_password`, `birthday`, `gender`, `user_image`, `UpdatedDate`) VALUES
(1, 'Igor', 'Brandao', 'Igooor', 'igor@gmail.com', 'pwigor', '2000-01-01', 'male', NULL, '2022-03-21 08:49:23'),
(2, 'Michael', 'Bautista', 'Michaeeel', 'michael@gmail.com', 'pwmichael', '2000-01-01', 'male', NULL, '2022-03-21 08:50:48'),
(3, 'kosuke', 'inami', 'kosukeee', 'kosuke@gmail.com', 'pwkosuke', '2000-01-01', 'male', NULL, '2022-03-21 08:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `review_comment` text NOT NULL,
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `restaurant_id` int DEFAULT NULL,
  `review_star` int NOT NULL,
  `review_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`review_id`, `user_id`, `review_comment`, `review_date`, `restaurant_id`, `review_star`, `review_title`) VALUES
(1, 1, 'Good and spacious kbbq place (great for big groups). Ordering is convenient after they added the qr code scanning for the menu so you can order through your phone and pay later. Meat are really good and service is great (they change the grills frequently and quickly). Wish they had some dessert though', '2022-03-21 09:46:34', 1, 4, 'Great Korean BBQ Place'),
(2, 2, 'Well worth the drive from the west. Great for occasions, groups or casual. The tasting menu was delicious with a variety of flavours and food we’ve never had before. The cocktails were very nice, especially the melon drink.\r\n\r\nDishes came out at a decent pace. The atmosphere is warm with the ambient lighting and smell of cooking meat. Staff were patient and friendly and took their time to explain each dish. Can recommend.', '2022-03-21 09:47:40', 2, 5, 'Japanese Morden Bar'),
(3, 3, 'Overall we really enjoyed the food. Our favourite dishes were the Dan Dan Noodles, Beetroot noodles with mushrooms and the water spinach.  The salt and pepper calamari were well below average with very small pieces of calamari that were tough and chewy. Service was below average, not attentive. The dishes we did like would make it worth going back for.', '2022-03-21 09:50:05', 3, 3, 'Not Bad Not So good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `restaurant_category` (`cat_id`);

--
-- Constraints for table `user_post`
--
ALTER TABLE `user_post`
  ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_post_ibfk_3` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
