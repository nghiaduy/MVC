-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 09:10 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'economy'),
(4, 'information'),
(6, 'Sport'),
(7, 'Soccer');

-- --------------------------------------------------------

--
-- Table structure for table `newpost`
--

CREATE TABLE `newpost` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` mediumtext COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` char(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `tag` varchar(200) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `newpost`
--

INSERT INTO `newpost` (`id`, `title`, `description`, `image`, `status`, `author`, `created_at`, `updated_at`, `tag`, `category`) VALUES
(21, 'The two crabs', 'One fine day two Crabs came out from their home to take a stroll on the sand. â€œChild,â€ said the mother, â€œyou are walking very ungracefully. You should accustom yourself to walking straight forward without twisting from side to side.â€ â€œPray, mother,â€ said the young one, â€œdo but set the example yourself, and I will follow you.â€ â€œExamples is the best preceptâ€', 'slide5.png', 'public', 'Duy', '2020-10-03', '2021-04-14', 'Human', 'Information'),
(26, 'The crow and the vase', 'In a spell of dry weather, when the Birds could find very little to drink, a thirsty Crow found a pitcher with a little water in it. But the pitcher was high and had a narrow neck, and no matter how he tried, the Crow could not reach the water. The poor thing felt as if he must die of thirst. Then an idea came to him. Picking up some small pebbles, he dropped them into the pitcher one by one. With each pebble the water rose a little higher until at last it was near enough so he could drink. â€œIn a pinch a good use of our wits may help us out.â€', 'silde1.png', 'public', 'Duy', '2020-10-03', '2021-04-14', 'Human', 'Information'),
(27, 'What is the afterlife like?', 'Sidy and Irve are business partners. They made a deal that who dies first will contact other the living one from the afterlife. So Irve dies. Sidy doesnâ€™t hear from him for about a year, figures there is no afterlife. Then one day he gets a call. Itâ€™s Irv. â€œSo there is an afterlife! Whatâ€™s it like?â€ Sid asks. â€œWell, I sleep very late. I get up, have a big breakfast. Then I have sex, lots of sex. Then I go back to sleep, but I get up for lunch, have a big lunch. Have some more sex, take a nap. Huge dinner. More sex. Go to sleep and wake up the next day.â€ â€œOh, my God,â€ says Sid. â€œSo thatâ€™s what heaven is like?â€ â€œOh no,â€ says Irv. â€œIâ€™m not in heaven. Iâ€™m a bear in Yellowstone Park.â€', 'post4.png', 'public', 'Duy', '2020-10-04', '2021-04-14', 'Human', 'Economy'),
(28, 'Poor or rich', 'One day, a rich dad took his son on a trip to a poor village. He wanted to show his son how the people in the village lived. They spent time on a farm of one of the poorest families. At the end of the day, the dad asked: â€œDid you see how poor they are? What did you learn?â€\r\n\r\nThe boy answered: â€œWe have a dog, they have four. We have a pool, they have a river. We buy food and they grow theirs. We have walls to protect us, they have friends.â€\r\n\r\nAfter they left, the boy wanted to tell his dad the truth. â€œWell, thanks for showing me how poor we areâ€, said the boy.\r\n\r\nAfter they left, the boy wanted to tell his dad the truth. â€œWell, thanks for showing me how poor we areâ€, said the boy.', 'poor-and-rich-1.jpg', 'public', 'DuyND', '2020-10-05', '2021-04-14', 'Human', 'Economy'),
(32, 'The snailâ€™s slow speed', 'A guy is sitting at home when he hears a knock at the door. He opens the door and sees a snail on the porch. He picks up the snail and throws it as far as he can 3 years later, he heard a knock on the door again. He opens the door and sees the snail. This snail says, â€œWhat the hell was that all about?â€.', 'post3.png', 'public', 'Duy', '2020-10-06', '2021-04-14', 'Computer', 'Sport'),
(33, 'The boy and the barbershop', 'A young boy enters a barbershop and the barber whispers to his customer. â€œThis is the dumbest kid in the world. Watch while I prove it to you.â€ The barber puts a dollar bill in one hand and two quarters in the other, then calls the boy over and asks, â€œWhich do you want, son?â€ The boy takes the quarters and leaves. â€œWhat did I tell you?â€ said the barber. After, when the customer leaves, the man sees the young baby coming out of the ice cream store. He said, â€œHey, baby boy! Can I ask you a question? Why did you choose the quarter instead of the dollar bill?â€ The boy licked his cone and replied, â€œBecause the day I take the dollar, the game is over!â€', '2240.jpg', 'public', 'Duy', '2020-10-06', '2021-04-14', 'Human', 'Economy'),
(37, 'The boy Test', 'A young boy enters a barbershop and the barber whispers to his customer. â€œThis is the dumbest kid in the world. Watch while I prove it to you.â€ The barber puts a dollar bill in one hand and two quarters in the other, then calls the boy over and asks, â€œWhich do you want, son?â€ The boy takes the quarters and leaves. â€œWhat did I tell you?â€ said the barber. After, when the customer leaves, the man sees the young baby coming out of the ice cream store. He said, â€œHey, baby boy! Can I ask you a question? Why did you choose the quarter instead of the dollar bill?â€ The boy licked his cone and replied, â€œBecause the day I take the dollar, the game is over!â€', 'austin(1).png', 'public', 'Duy', '2021-04-28', NULL, 'Human', 'Economy');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci COMMENT='demo_register';

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `address`) VALUES
(12, 'DuyND', 'nghiaduy02@gmail.com', '123', 'TN'),
(13, 'Duy', 'Duytntn@gmail.com', '123', 'ThÃ¡i nguyÃªn phÃº bÃ¬nh'),
(14, 'Test', 'testcheckout@gmail.com', '123', 'VN');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(10, 'human'),
(11, 'action'),
(12, 'computer'),
(13, 'moto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newpost`
--
ALTER TABLE `newpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newpost`
--
ALTER TABLE `newpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
