-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 12:49 AM
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
-- Database: `pizzafutar`
--

CREATE DATABASE IF NOT EXISTS pizzafutar;
USE pizzafutar;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `address`, `phone`, `email`) VALUES
(1, 'John Doe', '123 Main St', '555-1234', 'john@example.com'),
(2, 'Jane Smith', '456 Oak St', '555-5678', 'jane@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `pizza_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `pizza_id`, `image_path`) VALUES
(1, 1, 'images/menu1.jpg'),
(2, 2, 'images/menu2.jpg'),
(3, 3, 'images/menu3.jpg'),
(7, 4, 'images/menu4.jpg'),
(8, 5, 'images/menu5.jpg'),
(9, 6, 'images/menu6.jpg'),
(10, 7, 'images/menu7.jpg'),
(11, 8, 'images/menu8.jpg'),
(12, 9, 'images/menu9.jpg'),
(13, 10, 'images/menu10.jpg'),
(14, 11, 'images/menu11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_details` text DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_details`, `order_date`) VALUES
(1, 4, 'Order Details:\nPizza Name: Margherita\nQuantity: 1\nPrice: $8.99\n\nPizza Name: Pepperoni\nQuantity: 1\nPrice: $10.99\n\nTotal Price: $19.98', '2023-12-10 22:44:52'),
(2, 4, 'Order Details:\nPizza Name: Margherita\nQuantity: 1\nPrice: $8.99\n\nPizza Name: Pepperoni\nQuantity: 1\nPrice: $10.99\n\nTotal Price: $19.98', '2023-12-10 22:52:50'),
(3, 4, 'Order Details:\nPizza Name: Margherita\nQuantity: 3\nPrice: $26.97\n\nPizza Name: Pepperoni\nQuantity: 1\nPrice: $10.99\n\nPizza Name: Vegetarian\nQuantity: 1\nPrice: $9.99\n\nTotal Price: $47.95', '2023-12-10 22:58:21'),
(4, 7, 'Order Details:\nPizza Name: Meat Lover\nQuantity: 6\nPrice: $77.94\n\nTotal Price: $77.94', '2023-12-10 22:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `pizza_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`pizza_id`, `name`, `price`, `description`) VALUES
(1, 'Margherita', 8.99, 'Classic tomato and cheese'),
(2, 'Pepperoni', 10.99, 'Pepperoni and cheese'),
(3, 'Vegetarian', 9.99, 'Mushrooms, onions, peppers, and cheese'),
(4, 'Hawaiian', 11.99, 'Ham, pineapple, and cheese'),
(5, 'Meat Lover\'s', 12.99, 'Pepperoni, sausage, bacon, and ham'),
(6, 'BBQ Chicken', 11.99, 'Grilled chicken, BBQ sauce, red onions, and cheese'),
(7, 'Margarita', 9.99, 'Fresh tomatoes, mozzarella, basil, and olive oil'),
(8, 'Buffalo Chicken', 12.99, 'Buffalo sauce, grilled chicken, red onions, and blue cheese'),
(9, 'Supreme', 13.99, 'Pepperoni, sausage, mushrooms, green peppers, onions, and olives'),
(10, 'White Pizza', 10.99, 'Ricotta, garlic, olive oil, and mozzarella'),
(11, 'Pesto Chicken', 11.99, 'Pesto sauce, grilled chicken, cherry tomatoes, and feta cheese');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `customer_id`) VALUES
(4, 'erik', '$2y$10$vnapCk1WDJZuVDf9QT8XtOsvNPgv/SLNSIeSwPDCGlGxsTLL6yfiO', NULL),
(5, 'user', '$2y$10$TW6h2qDJKJsRM3MFnVB9.umQZx4xrEh05q4MiAQqCLRfdC.d2DazK', NULL),
(6, 'admin', '$2y$10$wgyA7gh5C5PRF7keCh0Jtulr48OFLM0jDtTNk9Wa3CfjASSIn4nHq', NULL),
(7, 'user2', '$2y$10$JnuGnIgeyHiHoB0wE9BhCOUvotOwxonaEuRUqWDE9bUxgcJ7ikgxC', NULL),
(8, 'user2', '$2y$10$lw1qFnQhZu/0jN6cHfTAvO9Ufoc/yYeIAE2HTstzzKpLzVR5ywB3y', NULL),
(9, 'user3', '$2y$10$/nPrHGbPj7GUXS1uReobm..CIPCNlds91kqe95QbBvGDRm2EkIOne', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `pizza_id` (`pizza_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`pizza_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
