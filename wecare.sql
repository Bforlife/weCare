-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 09:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `reg_date`) VALUES
(1, 'Mmasinachi', 'mma@yahoo.net', '123456', '2025-06-03 01:49:21'),
(2, 'Blessing Okoudu', 'okoudub@yahoo.com', '123456', '2025-06-03 02:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `service_address` varchar(255) NOT NULL,
  `referral_source` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`, `service_address`, `referral_source`, `reg_date`) VALUES
(8, ' Chidi Okoro', 'chidi@gmail.net', '08024264373262', '12345', '  Work Plaza', 'Social Media', '2025-05-05 09:58:36'),
(9, ' Chioma Jekins', 'chioma@yahoo.net', ' 090483938493', '12345', '  Work Plaza Road', 'Friend or Family', '2025-05-05 09:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `costPrice` decimal(10,2) NOT NULL,
  `sellingPrice` decimal(10,2) NOT NULL,
  `openingStock` int(11) NOT NULL,
  `closingStock` int(11) NOT NULL,
  `productCode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `category`, `price`, `quantity`, `description`, `image`, `color`, `size`, `costPrice`, `sellingPrice`, `openingStock`, `closingStock`, `productCode`, `created_at`) VALUES
(20, 'Lip gloss', 'Makeup', 2800.00, 60, 'Culpa aliqua non labore proident.\r\n', 'https://res.cloudinary.com/dautlarnb/image/upload/v1748859331/okizlx9aa8tzrncww0qo.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748859335/spo6bwfs095wpz7b3tuy.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748859338/b8dghyf7r8vygr3h5fk9.jpg', 'Pink', '0.08', 1200.00, 2800.00, 60, 59, 'herewfkj987234', '2025-06-02 10:15:55'),
(12, 'Fragrance', 'Fragrance', 2300.00, 40, 'Elit proident laborum pariatur Lorem dolore aliquip enim.\r\n', 'https://res.cloudinary.com/dautlarnb/image/upload/v1745322890/xllysdjdhn0zml2zmcyu.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1745322893/bgqzevvspu3cab3ugppj.jpg', 'purple', '0.89g', 1200.00, 2300.00, 60, 60, 'dfdsfdifreifer33', '2025-04-22 11:55:00'),
(11, 'Blush set', 'Makeup', 1500.00, 1, 'This is a product used to blend in makeup and makeup products. \r\nThis product is the complete set of brushes you\'ll need as a beginner or a pro.', 'https://res.cloudinary.com/dautlarnb/image/upload/v1745322705/k2ydpakttilfclw7cwqo.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1745322707/oacv61hqmx1m7u6fjioy.jpg', 'red', '0.89g', 900.00, 1500.00, 12, 3, 'dhskam47438', '2025-04-22 11:51:53'),
(18, 'LipGloss for women', 'Makeup', 2300.00, 40, 'dfffsadaeweqeswdsa', 'https://res.cloudinary.com/dautlarnb/image/upload/v1748811653/cior3shandygfs4acigd.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748811656/jwo0rhme7c4vcgfk6kla.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748811659/izpmks92pboczhueztpf.jpg', 'Red', '0.3kg', 1200.00, 2300.00, 60, 59, 'hfkrueieor74', '2025-06-01 21:01:17'),
(17, 'Fragrance', 'Skincare', 5000.00, 2, ' Ex enim fugiat dolor id nisi est dolor et nostrud ex aliqua consequat.\r\n', 'https://res.cloudinary.com/dautlarnb/image/upload/v1748289636/jjoalth7uog5g0ttqrwu.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748289638/llnehuxgzhjjqqbvipjc.jpg', 'brown', '4.5', 3800.00, 5000.00, 5000, 4943, 'yuieey748', '2025-05-26 20:00:53'),
(23, 'Lip gloss', 'Makeup', 2300.00, 60, 'Culpa aliqua non labore proident.\r\n', 'https://res.cloudinary.com/dautlarnb/image/upload/v1748861341/ksisjeyfju7gzez9uexb.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748861343/nkgapnvjohzngmtsthed.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748861346/a7vtbwozn7payce3hsgm.jpg', 'Pink', '0.08', 1200.00, 2300.00, 60, 60, 'jdfjhdslhf7', '2025-06-02 10:49:23'),
(24, 'Sunscreen', 'Skincare', 6000.00, 100, 'Anim consectetur occaecat ex elit sunt quis in adipisicing nulla.\r\n', 'https://res.cloudinary.com/dautlarnb/image/upload/v1748861915/bxzkxqeubtcmbebdjhaq.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748861917/v5tn4cwwtr69dce7b6ca.jpg,https://res.cloudinary.com/dautlarnb/image/upload/v1748861919/mlgsajzwpxd3ahcz6cbo.jpg', 'Pink', '2.3kg', 4500.00, 6000.00, 100, 98, 'yrirueeie', '2025-06-02 10:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(6) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `prdt_id` int(6) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `review_msg` text NOT NULL,
  `star` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_id`, `prdt_id`, `customer_name`, `email`, `reg_date`, `review_msg`, `star`) VALUES
(1, 'ORD683D84732479F', 26, '  Chioma Jekins', 'chioma@yahoo.net', '2025-06-02 12:12:17', 'Anim consectetur occaecat ex elit sunt quis in adipisicing nulla.\r\n', '4'),
(2, 'ORD683D84732479F', 26, '  Chioma Jekins', 'chioma@yahoo.net', '2025-06-02 12:23:24', 'Deserunt ad minim sint voluptate Lorem consequat qui laborum.\r\n', '2'),
(3, 'ORD683DE96337878', 29, '  Chioma Jekins', 'chioma@yahoo.net', '2025-06-02 19:13:16', 'jsadlkhsad;asa', '1'),
(4, 'ORD683D84732479F', 26, '  Chioma Jekins', 'chioma@yahoo.net', '2025-06-02 22:09:20', 'dfdsf', '1'),
(5, 'ORD683E1735B705E', 31, '  Chioma Jekins', 'chioma@yahoo.net', '2025-06-02 22:28:04', ' Cillum elit ipsum dolore enim consequat dolore eiusmod in qui.\r\n', '3'),
(6, 'ORD68415BBE2AD6A', 33, '  Chioma Jekins', 'chioma@yahoo.net', '2025-06-05 09:57:01', 'Occaecat quis nisi aute incididunt minim occaecat.\r\n', '4');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(6) NOT NULL,
  `prdt_id` int(6) NOT NULL,
  `prdt_code` varchar(255) NOT NULL,
  `prdt_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `qty` int(6) NOT NULL,
  `total` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `order_note` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_option` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `delivery_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `prdt_id`, `prdt_code`, `prdt_name`, `price`, `color`, `size`, `qty`, `total`, `customer_name`, `phone`, `email`, `shipping_address`, `order_id`, `order_note`, `order_date`, `pay_option`, `payment_status`, `delivery_date`) VALUES
(34, 18, 'hfkrueieor74', 'LipGloss for women', '2300.00', 'Red', '0.3kg', 1, 2300, '  Chioma Jekins', '  090483938493', 'chioma@yahoo.net', '   Work Plaza Road', 'ORD68434D47418DB', 'Commodo dolore in et elit excepteur officia enim Lorem voluptate dolore commodo minim sunt id.\r\n', '2025-06-06 21:19:24', 'transfer', 'pending', '2025-06-06 21:19:24'),
(29, 19, 'fdbbvcxvxre344', 'LipGloss for women', '2300.00', 'Red', '0.3kg', 1, 2300, '  Chioma Jekins', '  090483938493', 'chioma@yahoo.net', '   Work Plaza Road', 'ORD683DE96337878', 'fgfgd', '2025-06-02 19:11:49', 'transfer', 'pending', '2025-06-02 19:11:49'),
(30, 20, 'herewfkj987234', 'Lip gloss', '2800.00', 'Pink', '0.08', 1, 2800, '  Chioma Jekins', '  090483938493', 'chioma@yahoo.net', '   Work Plaza Road', 'ORD683E12DD20755', 'hjkghjh', '2025-06-02 22:08:48', 'transfer', 'pending', '2025-06-02 22:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `reg_date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `reg_date`) VALUES
(1, 'chinny@yahoo.net', '12345', '', '', ''),
(3, 'mary@gmail.com', '12345', 'Mary Sheldon', '09034567238', '2025-04-17 07:33:20'),
(4, 'b@gmail.com', '123456', 'Blessing', '07057478234', '2025-04-30 16:45:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productCode` (`productCode`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
