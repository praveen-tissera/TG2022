-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 07:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket_mg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `order_id` int(11) NOT NULL,
  `row_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`order_id`, `row_id`, `product_id`, `user_id`, `quantity`) VALUES
(9, 11, 10, 1, 5),
(10, 12, 9, 1, 1),
(11, 13, 2, 1, 3),
(13, 16, 5, 3, 3),
(13, 17, 13, 3, 1),
(14, 18, 2, 4, 4),
(17, 19, 17, 6, 3),
(18, 20, 25, 8, 1),
(19, 21, 25, 8, 1),
(20, 22, 25, 9, 1),
(22, 23, 25, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `availability` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `item_title`, `Category`, `availability`) VALUES
(1, 'Papaya', 'Fruits', 'yes'),
(2, 'Banana', 'Fruits', 'no'),
(3, 'Organic Pumpkin', 'Vegetables', 'no'),
(4, 'Organic Carrots', 'Vegetables', 'yes'),
(5, 'Pre Packed Big Onions', 'Vegetables', 'yes'),
(6, 'Cabbage', 'Vegetables', 'yes'),
(7, 'Lifebuoy Handwash Care 200ml', 'Household', 'yes'),
(8, 'Sparkle Sponge Scrubber', 'Household', 'no'),
(9, 'Bio Clean Toilet Bowl Cleaner 500ml', 'Household', 'yes'),
(10, 'Vim Dishwash Bar Lime 400g', 'Household', 'yes'),
(11, 'Elegant Non-Medical Kn95 Face Mask', 'Household', 'no'),
(12, 'Panasonic Led Bulb 9W C/D Pin', 'Household', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_place_date` date NOT NULL,
  `order_place_time` time NOT NULL,
  `pickup_time` time NOT NULL,
  `staff_id` int(11) NOT NULL,
  `order_placed` enum('review','placed') NOT NULL,
  `order_status` enum('new','processing','completed','dispatch') NOT NULL,
  `dispatch_time` time NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `total`, `order_place_date`, `order_place_time`, `pickup_time`, `staff_id`, `order_placed`, `order_status`, `dispatch_time`, `payment_id`) VALUES
(9, 2, 5600, '2019-02-18', '22:12:00', '16:45:00', 2, 'review', 'new', '00:00:00', 1),
(10, 3, 3960, '2019-02-18', '23:43:00', '17:30:00', 2, 'placed', 'new', '00:00:00', 1),
(11, 2, 4000, '2019-02-19', '00:19:00', '17:00:00', 1, 'placed', 'new', '00:00:00', 2),
(12, 4, 3000, '2019-02-19', '11:26:00', '17:30:00', 2, 'placed', 'new', '00:00:00', 3),
(13, 6, 3300, '2019-02-19', '21:15:00', '17:30:00', 2, 'placed', 'new', '00:00:00', 2),
(14, 6, 3000, '2019-02-19', '21:19:00', '17:15:00', 1, 'placed', 'new', '00:00:00', 3),
(15, 6, 2000, '2019-02-19', '22:04:00', '16:45:00', 1, 'placed', 'new', '00:00:00', 4),
(16, 6, 3000, '2019-02-19', '23:09:00', '17:00:00', 1, 'placed', 'new', '00:00:00', 5),
(17, 6, 720, '2020-01-21', '20:16:00', '09:15:00', 1, 'placed', 'processing', '00:00:00', 5),
(18, 8, 1, '2020-01-26', '10:26:00', '11:15:00', 2, 'placed', 'new', '00:00:00', 1),
(19, 8, 1, '2020-01-26', '10:39:00', '11:00:00', 2, 'placed', 'completed', '00:00:00', 4),
(20, 9, 1, '2020-02-03', '23:08:00', '10:30:00', 1, 'placed', 'dispatch', '17:42:00', 3),
(21, 9, 0, '2023-01-25', '23:23:00', '08:30:00', 1, 'placed', 'new', '00:00:00', 3),
(22, 9, 0, '2023-01-25', '23:28:00', '08:30:00', 1, 'placed', 'new', '00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `txn_id` varchar(255) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `PayerStatus` varchar(50) NOT NULL,
  `PayerMail` int(100) NOT NULL,
  `Total` decimal(19,2) NOT NULL,
  `SubTotal` decimal(19,2) NOT NULL,
  `Tax` decimal(19,2) NOT NULL,
  `Payment_state` varchar(50) NOT NULL,
  `CreateTime` varchar(50) NOT NULL,
  `UpdateTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`txn_id`, `payment_id`, `PaymentMethod`, `PayerStatus`, `PayerMail`, `Total`, `SubTotal`, `Tax`, `Payment_state`, `CreateTime`, `UpdateTime`) VALUES
('2T609685ND249973K', 1, 'paypal', 'VERIFIED', 0, '1.00', '1.00', '0.00', 'completed', '2020-01-26T04:53:49Z', '2020-01-26T04:53:49Z'),
('73A14245DW820114X', 2, 'paypal', 'VERIFIED', 0, '1.00', '1.00', '0.00', 'completed', '2020-01-26T05:09:04Z', '2020-01-26T05:09:04Z'),
('8U797845YM694115U', 3, 'paypal', 'VERIFIED', 0, '1.00', '1.00', '0.00', 'completed', '2020-02-03T17:38:45Z', '2020-02-03T17:38:45Z'),
('7913633089861420T', 4, 'paypal', 'VERIFIED', 0, '0.01', '0.01', '0.00', 'completed', '2023-01-25T17:58:24Z', '2023-01-25T17:58:24Z'),
('25406360HS919174D', 5, 'paypal', 'VERIFIED', 0, '1.00', '1.00', '0.00', 'completed', '2023-01-29T07:20:48Z', '2023-01-29T07:20:48Z');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(30) NOT NULL,
  `availability` enum('yes','no') NOT NULL,
  `currency` enum('LKR','Dollers','Pounds') NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_title`, `product_image`, `availability`, `currency`, `price`) VALUES
(1, 1, 'Passion Fruit', 'passion.png', 'yes', 'LKR', '350.00'),
(2, 6, 'Organic Pumpkin', 'pumpkin.png', 'yes', 'LKR', '650.00'),
(3, 6, 'Organic Carrots', 'carrots.png', 'yes', 'LKR', '290.00'),
(4, 6, 'Pre Packed Big Onions', 'onions.png', 'yes', 'LKR', '450.00'),
(5, 6, 'Cabbage', 'cabbage.png', 'yes', 'LKR', '350.00'),
(6, 7, 'Lifebuoy Handwash Care 200ml', 'handwash.png', 'yes', 'LKR', '680.00'),
(7, 7, 'Sparkle Sponge Scrubber', 'spong.png', 'yes', 'LKR', '480.00'),
(8, 7, 'Bio Clean Toilet Bowl Cleaner 500ml', 'toilet.png', 'yes', 'LKR', '340.00'),
(9, 7, 'Vim Dishwash Bar Lime 400g', 'vim.png', 'yes', 'LKR', '310.00'),
(10, 7, 'Oxypura Care Face Mask', 'mask.png', 'yes', 'LKR', '380.00'),
(11, 7, 'Panasonic Led Bulb 15W C/D Pin', 'bulb.png', 'yes', 'LKR', '250.00'),
(12, 7, 'Eagle Candles White 5S', 'candles.png', 'yes', 'LKR', '202.00'),
(13, 4, 'Smak Nectar Aloe Vera 1L', 'drink.png', 'yes', 'LKR', '180.00'),
(14, 4, 'Eh Ginger Beer 1.5L', 'gingerbeer.png', 'yes', 'LKR', '200.00'),
(15, 4, 'Nescafe Ice Cold Coffee 180ml', 'nescafe.png', 'yes', 'LKR', '150.00'),
(16, 4, 'Eh Fit O Mango 200ml', 'fito.png', 'yes', 'LKR', '280.00'),
(17, 4, 'Coca Cola Zero Pet 400ml', 'cocacola.png', 'yes', 'LKR', '240.00'),
(18, 4, 'Milo Chocolate Food Drink 180Ml 6S', 'milo.png', 'yes', 'LKR', '240.00'),
(19, 5, 'Prawns Medium', 'prawns.png', 'yes', 'LKR', '290.00'),
(20, 5, 'Tuna Fish', 'tuna.png', 'yes', 'LKR', '290.00'),
(22, 5, 'Cleaned Cuttlefish', 'cuttle fish.png', 'yes', 'LKR', '444.00'),
(23, 5, 'White Mullet', 'fish.png', 'yes', 'LKR', '444.00'),
(24, 1, 'Apple - Fuji', 'apple.png', 'yes', 'LKR', '450.00'),
(25, 1, 'Grapes - Black', '1675314549grapes.png', 'yes', 'LKR', '150.00'),
(26, 1, 'Melon - Red Fantasy', 'watermelon.png', 'yes', 'LKR', '190.00'),
(27, 1, 'Pineapple', 'pineapple.png', 'yes', 'LKR', '560.00'),
(30, 7, 'Wykefarm Sliced Matured C/Cheddar 160g', 'cheese.png', 'no', 'LKR', '2500.00'),
(31, 1, 'Mango - Tjc', 'mango.png', 'yes', 'LKR', '1350.00'),
(32, 4, 'Kist Ride Classic 250ml', 'energydrink.png', 'yes', 'LKR', '390.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_catagory`
--

CREATE TABLE `tbl_product_catagory` (
  `catagory_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `availability` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_catagory`
--

INSERT INTO `tbl_product_catagory` (`catagory_id`, `category_name`, `availability`) VALUES
(1, 'Fruits', 'yes'),
(4, 'Beverages', 'yes'),
(5, 'Fish', 'yes'),
(6, 'Vegetables', 'yes'),
(7, 'Household', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_item`
--

CREATE TABLE `tbl_product_item` (
  `tbl_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_item`
--

INSERT INTO `tbl_product_item` (`tbl_id`, `product_id`, `item_id`) VALUES
(1, 23, 1),
(2, 23, 4),
(3, 24, 4),
(4, 24, 5),
(5, 25, 1),
(6, 25, 4),
(7, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_title` varchar(255) NOT NULL,
  `promotion_image` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`promotion_id`, `promotion_title`, `promotion_image`, `status`) VALUES
(1, 'test promotion', '1554025365Desert.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(2) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staff_role` enum('staff','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `username`, `title`, `first_name`, `last_name`, `password`, `staff_role`) VALUES
(1, 'chamara', 'mr', 'chamara', 'chaturanga', '123', 'staff'),
(2, 'samera', 'mr', 'samera', 'perera', '123', 'manager'),
(3, 'dumidu', 'mr', 'dumidu', 'jayakody', '123', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_items` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`supplier_id`, `supplier_name`, `product_category`, `product_items`) VALUES
(1, 'Senaka Sillva', 'Household', 'Hand and Body care\r\nCleaning Durables\r\nCleaning Consumables\r\nGeneral Needs\r\n\r\n\r\n'),
(2, 'Ranjith Perera', 'Fruits', 'Organic \r\nInorganic'),
(3, 'Ajith Senanayaka', 'Beverages', 'Juices & Carbonates\r\nSports & Energy Drinks\r\nRTD Beverages\r\nWater\r\nCoffee'),
(4, 'samantha Rathnayaka', 'Fish', 'Fresh Sea Food'),
(6, 'Dilan Fernando', 'Vegetables', 'Low Country Vegetables\r\nUp Country Vegetables\r\nOrganic\r\nPackets and Units');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `register_date` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('register','guest') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `title`, `first_name`, `last_name`, `phone_number`, `register_date`, `password`, `user_type`, `status`) VALUES
(1, 'saman@gmail.com', 'mr', 'nirash', 'perera', '0713694511', '2019-01-23', '', 'guest', 'active'),
(2, 'nimal@gmail.com', 'Mr', 'praveen', 'tissera', '0713467833', '2019-02-18', '', 'guest', 'active'),
(3, 'wimal@gmail.com', 'Mr', 'surangi', 'tissera', '0713467833', '2019-02-18', '', 'guest', 'active'),
(4, 'hazmath@gmail.com', 'Mr', 'hazmath', 'abc', '0713467833', '2019-02-19', '', 'guest', 'active'),
(6, 'praveenlog@gmail.com', 'Mr', 'praveen', 'tissera', '0713467833', '2019-02-18', '123', 'register', 'active'),
(7, 'p@gmail.com', 'Mr', 'praveen', 'tissa', '0713691344', '2020-01-25', '', 'guest', 'active'),
(8, 'ptissera@gmail.com', 'Mr', 'praveen', 'tissera', '0713691344', '2020-01-25', '123456', 'register', 'active'),
(9, 'dammith@gmail.com', 'Mr', 'dammith', 'asanka', '0712563544', '2020-02-03', '', 'guest', 'active'),
(10, 'ranminijayawardena@gmail.com', 'Mr', 'Randithi', 'Jayawardena', '0778964758', '2023-01-29', '', 'guest', 'active'),
(11, 'methni.20211578@iit.ac.lk', 'Mr', 'Randithi', 'Jayawardena', '0778964758', '2023-02-12', '', 'guest', 'active'),
(12, 'bandu@gmail.com', 'Mrs', 'Ranmini', 'Jayawardena', '0710599566', '2023-02-12', '123', 'register', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `txn_id` (`txn_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_product_catagory`
--
ALTER TABLE `tbl_product_catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `tbl_product_item`
--
ALTER TABLE `tbl_product_item`
  ADD PRIMARY KEY (`tbl_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_product_catagory`
--
ALTER TABLE `tbl_product_catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product_item`
--
ALTER TABLE `tbl_product_item`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `tbl_staff` (`staff_id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payments` (`payment_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_product_catagory` (`catagory_id`);

--
-- Constraints for table `tbl_product_item`
--
ALTER TABLE `tbl_product_item`
  ADD CONSTRAINT `tbl_product_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
