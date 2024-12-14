-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 08:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vendor_zanzon`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_traking_orders` varchar(255) NOT NULL,
  `store_logo` text NOT NULL,
  `name_store` varchar(255) NOT NULL,
  `Customer_Name` varchar(200) NOT NULL,
  `Customer_Phone_Number` varchar(250) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `Product_Name` varchar(300) NOT NULL,
  `Product_Name_ar` varchar(255) NOT NULL,
  `name_store_ar` varchar(255) NOT NULL,
  `price_product` varchar(100) NOT NULL,
  `Order_Category` varchar(255) NOT NULL,
  `Order_Sub_Category` varchar(255) NOT NULL,
  `Total_Amount_Price` varchar(250) NOT NULL,
  `QTY` int(100) NOT NULL,
  `color` varchar(255) NOT NULL,
  `order_s_p_d` enum('online','cash on delivery') NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_user`, `id_traking_orders`, `store_logo`, `name_store`, `Customer_Name`, `Customer_Phone_Number`, `order_id`, `Product_Name`, `Product_Name_ar`, `name_store_ar`, `price_product`, `Order_Category`, `Order_Sub_Category`, `Total_Amount_Price`, `QTY`, `color`, `order_s_p_d`, `date_order`) VALUES
(70, 14, '375', 'Website Logo.png', 'Store 3', 'user tow', '0799044444', '336', 'Product 40', 'المنتج 40', 'المتجر الثالث', '27', 'GAMING', 'All-GAMING', '27', 1, '#9832ec', 'online', '2024-06-25 15:02:50'),
(71, 14, '320', 'Website Logo.png', 'Store tow', 'user tow', '0799044444', '296', 'Product 28', 'المنتج 28', 'المتجر الثاني', '6', 'PERFUMES', 'Male-PERFUMES', '6', 1, '#4d4c4c', 'online', '2024-06-25 15:10:35'),
(72, 14, '101', 'Website Logo.png', 'Store one', 'user tow', '0799044444', '53', 'Product number seven', 'المنتج رقم 7', 'المتجر الاول', '24', 'CLOTHING', 'All-CLOTHING', '24', 1, '#f67e0e', 'online', '2024-06-25 15:17:33'),
(73, 14, '66', 'Website Logo.png', 'Store tow', 'user tow', '0799044444', '25', 'Product 28', 'المنتج 28', 'المتجر الثاني', '6', 'PERFUMES', 'Male-PERFUMES', '6', 1, '#4d4c4c', 'online', '2024-06-25 15:21:33'),
(74, 14, '211', 'Website Logo.png', 'Store 3', 'user tow', '0799044444', '149', 'Product 41', 'المنتج 41', 'المتجر الثالث', '20', 'GAMING', 'All-GAMING', '20', 1, '#ffe11f', 'online', '2024-06-25 16:00:26'),
(75, 20, '495', 'Website Logo.png', 'Store one', 'user three', '0799049999', '355', 'Product 6', 'المنتج 6', 'المتجر الاول', '4', 'CLOTHING', 'Kids-CLOTHING', '4', 1, '#f066eb', 'cash on delivery', '2024-06-27 00:17:53'),
(76, 20, '495', 'Website Logo.png', 'Store tow', 'user three', '0799049999', '355', 'Product 20', 'المنتج 20', 'المتجر الثاني', '70', 'BAGS', 'Male-BAGS', '70', 1, '#000000', 'cash on delivery', '2024-06-27 00:17:54'),
(77, 20, '495', 'Website Logo.png', 'Store one', 'user three', '0799049999', '355', 'Product number twelve', 'المنتج رقم الثاني عشر', 'المتجر الاول', '25', 'SHOES', 'Male-SHOES', '25', 1, '#ff0026', 'cash on delivery', '2024-06-27 00:17:55'),
(78, 20, '486', 'Website Logo.png', 'Store one', 'user three', '0799049999', '449', 'Product number ten', 'المنتج رقم عشرة', 'المتجر الاول', '8.75', 'SHOES', 'Female-SHOES', '8.75', 1, '#f718ef', 'online', '2024-06-27 00:25:18'),
(79, 20, '95', 'Website Logo.png', 'Store 3', 'user three', '0799049999', '354', 'Product 34', 'المنتج 34', 'المتجر الثالث', '20', 'ACCESSORIES', 'All-ACCESSORIES', '40', 2, '#ee1717', 'cash on delivery', '2024-06-27 19:38:25'),
(80, 16, '474', 'Website Logo.png', 'Store one', 'user one', '0788964631', '436', 'Product 3', 'المنتج 3', 'المتجر الاول', '20', 'CLOTHING', 'Male-CLOTHING', '60', 3, '#fa0000', 'online', '2024-06-30 16:01:11'),
(81, 16, '354', 'Website Logo.png', 'Store tow', 'user one', '0788964631', '471', 'Product 20', 'المنتج 20', 'المتجر الثاني', '70', 'BAGS', 'Male-BAGS', '70', 1, '#000000', 'cash on delivery', '2024-06-30 16:02:17'),
(84, 16, '569', 'Website Logo.png', 'Store one', 'user one', '0788964631', '471', 'Product number 1', 'المنتج رقم واحد', 'المتجر الاول', '8', 'CLOTHING', 'Female-CLOTHING', '8', 1, '#c8f8f9', 'online', '2024-07-02 15:56:22'),
(85, 16, '145', 'Website Logo.png', 'Store tow', 'user one', '0788964631', '139', 'Product 51', 'المنتج 51', 'المتجر الثاني', '25', 'OTHERS', 'Arts-OTHERS', '50', 2, '#ff5900', 'online', '2024-07-02 16:06:47'),
(87, 20, '68', 'Website Logo.png', 'Store one', 'user three', '0799049999', '44', 'Product number 1', 'المنتج رقم واحد', 'المتجر الاول', '8', 'CLOTHING', 'Female-CLOTHING', '16', 2, '#c8f8f9', 'online', '2024-10-22 21:26:50'),
(88, 29, '316', 'Website Logo.png', 'Store tow', 'abood wedew', '0799999999', '255', 'Product 51', 'المنتج 51', 'المتجر الثاني', '25', 'OTHERS', 'Arts-OTHERS', '50', 2, '#ff5900', 'online', '2024-12-02 18:52:42'),
(89, 29, '324', 'Website Logo.png', 'Store 3', 'abood wedew', '0799999999', '298', 'Product 32', 'المنتج 32', 'المتجر الثالث', '7', 'ACCESSORIES', 'Hand Made-ACCESSORIES', '14', 2, '#fff70f', 'online', '2024-12-02 19:09:55'),
(90, 29, '169', 'Website Logo.png', 'Store tow', 'abood wedew', '0799999999', '318', 'Product 28', 'المنتج 28', 'المتجر الثاني', '6', 'PERFUMES', 'Male-PERFUMES', '6', 1, '#4d4c4c', 'cash on delivery', '2024-12-02 19:15:49'),
(91, 29, '169', 'logo-small.png', 'store 44', 'abood wedew', '0799999999', '318', 'product 101', 'منتج 101', 'متجر 44', '18', 'SHOES', 'Male-SHOES', '54', 3, '#1e5ddc', 'cash on delivery', '2024-12-02 19:15:52'),
(92, 20, '144', 'Website Logo.png', 'Store one', 'user three', '0799049999', '246', 'Product number 4', 'المنتج رقم اربعة', 'المتجر الاول', '10', 'CLOTHING', 'Male-CLOTHING', '30', 3, '#1db5f7', 'cash on delivery', '2024-12-02 21:24:31'),
(93, 20, '144', 'Website Logo.png', 'Store one', 'user three', '0799049999', '246', 'Product number seven', 'المنتج رقم 7', 'المتجر الاول', '24', 'CLOTHING', 'All-CLOTHING', '96', 4, '#f67e0e', 'cash on delivery', '2024-12-02 21:24:32'),
(94, 20, '433', 'Website Logo.png', 'Store tow', 'user three', '0799049999', '348', 'Product 18', 'المنتج 18', 'المتجر الثاني', '15', 'BAGS', 'Female-BAGS', '30', 2, '#9918aa', 'online', '2024-12-02 22:23:33'),
(95, 20, '51', 'Website Logo.png', 'Store 3', 'user three', '0799049999', '48', 'Product thirty seven', 'المنتج السابع والثلاثين', 'المتجر الثالث', '34', 'GAMING', 'Gaming Accessories-GAMING', '68', 2, '#e411cb', 'online', '2024-12-02 22:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders_users`
--

CREATE TABLE `orders_users` (
  `id_order_user` int(11) NOT NULL,
  `id_user` int(111) NOT NULL,
  `id_traking_orders` varchar(255) NOT NULL,
  `name_order_user` varchar(200) NOT NULL,
  `date_order_user` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_order_user` tinyint(4) NOT NULL DEFAULT 0,
  `total_order_user` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_users`
--

INSERT INTO `orders_users` (`id_order_user`, `id_user`, `id_traking_orders`, `name_order_user`, `date_order_user`, `status_order_user`, `total_order_user`) VALUES
(46, 14, '375', 'user tow', '2024-06-25 15:02:50', 0, '29.05'),
(47, 14, '320', 'user tow', '2024-06-25 15:10:35', 2, '8.05'),
(48, 14, '101', 'user tow', '2024-06-25 15:17:33', 0, '26.05'),
(49, 14, '66', 'user tow', '2024-06-25 15:21:32', 4, '8.05'),
(50, 14, '211', 'user tow', '2024-06-25 16:00:26', 0, '22.05'),
(51, 20, '495', 'user three', '2024-06-27 00:17:53', 0, '102.15'),
(52, 20, '486', 'user three', '2024-06-27 00:25:18', 0, '10.8'),
(53, 20, '95', 'user three', '2024-06-27 19:38:25', 4, '43.15'),
(54, 16, '474', 'user one', '2024-06-30 16:01:11', 0, '62.05'),
(55, 16, '354', 'user one', '2024-06-30 16:02:16', 3, '72.9'),
(56, 16, '418', 'user one', '2024-07-02 15:52:21', 0, '87.95'),
(57, 16, '569', 'user one', '2024-07-02 15:56:21', 0, '10.05'),
(58, 16, '145', 'user one', '2024-07-02 16:06:47', 2, '72.05'),
(59, 20, '68', 'user three', '2024-10-22 21:26:50', 0, '18.05'),
(60, 29, '316', 'abood wedew', '2024-12-02 18:52:41', 0, '52.05'),
(61, 29, '324', 'abood wedew', '2024-12-02 19:09:55', 0, '16.05'),
(62, 29, '169', 'abood wedew', '2024-12-02 19:15:49', 0, '63.4'),
(63, 20, '144', 'user three', '2024-12-02 21:24:31', 0, '128.8'),
(64, 20, '433', 'user three', '2024-12-02 22:23:33', 0, '32.05'),
(65, 20, '51', 'user three', '2024-12-02 22:29:15', 0, '60.05');

-- --------------------------------------------------------

--
-- Table structure for table `prudocts`
--

CREATE TABLE `prudocts` (
  `id_name_prudoct` int(11) NOT NULL,
  `store_name_prudoct` varchar(250) NOT NULL,
  `store_logo_prudoct` text NOT NULL,
  `Products_Name` varchar(500) NOT NULL,
  `Product_Short_Description` varchar(250) NOT NULL,
  `Product_Full_Description` varchar(500) NOT NULL,
  `Product_Material` varchar(255) NOT NULL,
  `Products_Sizes` varchar(255) NOT NULL,
  `Product_Colors` varchar(250) NOT NULL,
  `Product_Price` varchar(100) NOT NULL,
  `discout_prudoct` int(100) NOT NULL,
  `Delivery_Policy_Time` varchar(500) NOT NULL,
  `Return_Policy` varchar(500) NOT NULL,
  `Products_Category` varchar(200) NOT NULL,
  `Products_sub_Category` varchar(200) NOT NULL,
  `store_name_prudoct_arbic` varchar(255) NOT NULL,
  `Products_Name_arabic` varchar(255) NOT NULL,
  `Product_Short_Description_arabic` varchar(255) NOT NULL,
  `Product_Full_Description_arbic` varchar(500) NOT NULL,
  `Product_Material_arabic` varchar(255) NOT NULL,
  `Delivery_Policy_Time_arbic` varchar(255) NOT NULL,
  `Return_Policy_arabic` varchar(255) NOT NULL,
  `avg_rates` varchar(100) NOT NULL,
  `product_views` int(100) NOT NULL,
  `status_product_qty` int(11) NOT NULL,
  `stock_status` varchar(255) NOT NULL,
  `num_buys` varchar(500) NOT NULL,
  `date_prudoct` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prudocts`
--

INSERT INTO `prudocts` (`id_name_prudoct`, `store_name_prudoct`, `store_logo_prudoct`, `Products_Name`, `Product_Short_Description`, `Product_Full_Description`, `Product_Material`, `Products_Sizes`, `Product_Colors`, `Product_Price`, `discout_prudoct`, `Delivery_Policy_Time`, `Return_Policy`, `Products_Category`, `Products_sub_Category`, `store_name_prudoct_arbic`, `Products_Name_arabic`, `Product_Short_Description_arabic`, `Product_Full_Description_arbic`, `Product_Material_arabic`, `Delivery_Policy_Time_arbic`, `Return_Policy_arabic`, `avg_rates`, `product_views`, `status_product_qty`, `stock_status`, `num_buys`, `date_prudoct`) VALUES
(14, 'Store one', 'Website Logo.png', 'Product number 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#c8f8f9', '10', 20, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Female-CLOTHING', 'المتجر الاول', 'المنتج رقم واحد', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.55', 126, 1, 'In stock', '2', '2024-05-13'),
(15, 'Store one', 'Website Logo.png', 'Product 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#ffffff', '15', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Female-CLOTHING', 'المتجر الاول', 'المنتج 2', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.1', 69, 1, 'In stock', '', '2024-05-13'),
(16, 'Store one', 'Website Logo.png', 'Product 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#fa0000', '20', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Male-CLOTHING', 'المتجر الاول', 'المنتج 3', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '4.7', 48, 1, 'في المخزون', '2', '2024-05-11'),
(17, 'Store one', 'Website Logo.png', 'Product number 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XXL', '#1db5f7', '20', 50, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Male-CLOTHING', 'المتجر الاول', 'المنتج رقم اربعة', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.766666666666667', 66, 1, 'In stock', '2', '2024-05-13'),
(18, 'Store one', 'Website Logo.png', 'Product 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#000000', '10', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Kids-CLOTHING', 'المتجر الاول', 'المنتج الخامس', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 14, 1, 'في المخزون', '', '2024-05-13'),
(19, 'Store one', 'Website Logo.png', 'Product 6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#f066eb', '16', 75, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Kids-CLOTHING', 'المتجر الاول', 'المنتج 6', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '3.15', 31, 1, 'في المخزون', '3', '2024-05-13'),
(20, 'Store one', 'Website Logo.png', 'Product number seven', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XXXL', '#f67e0e', '30', 20, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'All-CLOTHING', 'المتجر الاول', 'المنتج رقم 7', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '4.6', 82, 1, 'In stock', '4', '2024-05-13'),
(21, 'Store one', 'Website Logo.png', 'Product 8', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#ffffff', '25', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance modules', 'CLOTHING', 'All-CLOTHING', 'المتجر الاول', 'المنتج 8', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '1.8', 10, 1, '', '', '2024-05-13'),
(22, 'Store one', 'Website Logo.png', 'Product 9', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#f35959', '35', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'Female-SHOES', 'المتجر الاول', 'المنتج 9', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.2', 36, 1, 'In stock', '1', '2024-05-11'),
(23, 'Store one', 'Website Logo.png', 'Product number ten', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#f718ef', '35', 75, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'Female-SHOES', 'المتجر الاول', 'المنتج رقم عشرة', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '3.1', 102, 1, 'في المخزون', '6', '2024-05-13'),
(24, 'Store one', 'Website Logo.png', 'Product 11', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#2684e8', '40', 40, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'Male-SHOES', 'المتجر الاول', 'المنتج 11', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '4.1', 90, 1, 'في المخزون', '2', '2024-05-13'),
(25, 'Store one', 'Website Logo.png', 'Product number twelve', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#ff0026', '25', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'Male-SHOES', 'المتجر الاول', 'المنتج رقم الثاني عشر', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 75, 1, 'In stock', '2', '2024-05-13'),
(26, 'Store one', 'Website Logo.png', 'Product 13', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#ffffff', '15', 25, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'Kids-SHOES', 'المتجر الاول', 'المنتج 13', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 8, 1, 'In stock', '', '2024-05-13'),
(27, 'Store one', 'Website Logo.png', 'Product 14', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#eeff00', '20', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'Kids-SHOES', 'المتجر الاول', 'المنتج 14', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 10, 1, 'في المخزون', '', '2024-05-13'),
(28, 'Store one', 'Website Logo.png', 'Product number fifteen', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#824ee4', '40', 10, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'All-SHOES', 'المتجر الاول', 'المنتج الرقم خامس عشر', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 6, 1, 'في المخزون', '', '2024-05-13'),
(29, 'Store one', 'Website Logo.png', 'Product 16', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#4d495b', '25', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'SHOES', 'All-SHOES', 'المتجر الاول', 'المنتج 16', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 21, 1, 'In stock', '1', '2024-05-13'),
(30, 'Store tow', 'Website Logo.png', 'Product 17', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#ff3300', '25', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'Female-BAGS', 'المتجر الثاني', 'المنتج 17', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2', 94, 0, 'نفد المخزون', '3', '2024-05-11'),
(32, 'Store tow', 'Website Logo.png', 'Product 18', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#9918aa', '15', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'Female-BAGS', 'المتجر الثاني', 'المنتج 18', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '1.7', 116, 1, 'In stock', '3', '2024-05-13'),
(33, 'Store tow', 'Website Logo.png', 'Product number nineteen', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#f90101', '60', 30, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'Male-BAGS', 'المتجر الثاني', 'المنتج رقم 19', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '4.1', 33, 1, 'في المخزون', '2', '2024-05-13'),
(34, 'Store tow', 'Website Logo.png', 'Product 20', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#000000', '70', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'Male-BAGS', 'المتجر الثاني', 'المنتج 20', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 78, 1, 'في المخزون', '2', '2024-05-13'),
(35, 'Store tow', 'Website Logo.png', 'Product 21', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#67db3d', '30', 10, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'Kids-BAGS', 'المتجر الثاني', 'المنتج 21', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.4', 15, 1, 'في المخزون', '', '2024-05-13'),
(36, 'Store tow', 'Website Logo.png', 'Product 22', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#4bb975', '45', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'Kids-BAGS', 'المتجر الثاني', 'المنتج 22', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 15, 1, 'في المخزون', '1', '2024-05-13'),
(37, 'Store tow', 'Website Logo.png', 'Product 23', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#000000', '70', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'All-BAGS', 'المتجر الثاني', 'المنتج 23', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 5, 1, 'In stock', '1', '2024-05-13'),
(38, 'Store tow', 'Website Logo.png', 'Product 24', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#ffffff', '60', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'BAGS', 'All-BAGS', 'المتجر الثاني', 'المنتج 24', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 0, 1, 'In stock', '1', '2024-05-13'),
(39, 'Store tow', 'Website Logo.png', 'Product 25', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#fbff1a', '25', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'Female-PERFUMES', 'المتجر الثاني', 'المنتج 25', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2', 81, 1, 'In stock', '3', '2024-05-10'),
(40, 'Store tow', 'Website Logo.png', 'Product 26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#b3b607', '10', 15, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'Female-PERFUMES', 'المتجر الثاني', 'المنتج 26', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.6', 5, 1, 'في المخزون', '1', '2024-05-13'),
(41, 'Store tow', 'Website Logo.png', 'Product 26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#444365', '20', 10, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'Male-PERFUMES', 'المتجر الثاني', 'المنتج 26', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 1, 1, '', '', '2024-05-13'),
(42, 'Store tow', 'Website Logo.png', 'Product 27', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#17dae8', '15', 5, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'Kids-PERFUMES', 'المتجر الثاني', 'المنتج 27', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 1, 1, 'In stock', '1', '2024-05-13'),
(43, 'Store tow', 'Website Logo.png', 'Product 28', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#4d4c4c', '20', 70, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'Male-PERFUMES', 'المتجر الثاني', 'المنتج 28', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '1.6599999999999997', 94, 1, 'In stock', '8', '2024-05-13'),
(44, 'Store tow', 'Website Logo.png', 'Product 29', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XXXL', '#8af91a', '20', 70, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'Kids-PERFUMES', 'المتجر الثاني', 'المنتج 29', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 1, 1, 'في المخزون', '', '2024-05-13'),
(45, 'Store tow', 'Website Logo.png', 'Product 30', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#493235', '25', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'All-PERFUMES', 'المتجر الثاني', 'المنتج 30', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 3, 1, '', '', '2024-05-13'),
(46, 'Store tow', 'Website Logo.png', 'Product 31', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#0cb090', '20', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'PERFUMES', 'All-PERFUMES', 'المتجر الثاني', 'المنتج 31', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2', 34, 1, 'في المخزون', '2', '2024-05-13'),
(47, 'Store 3', 'Website Logo.png', 'Product 32', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#fff70f', '7', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'ACCESSORIES', 'Hand Made-ACCESSORIES', 'المتجر الثالث', 'المنتج 32', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.5', 20, 1, 'In stock', '3', '2024-05-13'),
(48, 'Store 3', 'Website Logo.png', 'Product 33', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#ecbe18', '5', 70, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'ACCESSORIES', 'Hand Made-ACCESSORIES', 'المتجر الثالث', 'المنتج 33', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.3', 36, 1, 'In stock', '1', '2024-05-13'),
(49, 'Store 3', 'Website Logo.png', 'Product 34', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#ee1717', '20', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'ACCESSORIES', 'All-ACCESSORIES', 'المتجر الثالث', 'المنتج 34', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '5', 19, 1, 'في المخزون', '3', '2024-05-13'),
(50, 'Store 3', 'Website Logo.png', 'Product 35', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#fa2ee2', '30', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'ACCESSORIES', 'All-ACCESSORIES', 'المتجر الثالث', 'المنتج 35', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '3', 46, 1, 'In stock', '1', '2024-05-13'),
(51, 'Store 3', 'Website Logo.png', 'Product 36', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#d69595', '40', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'GAMING', 'Gaming Accessories-GAMING', 'المتجر الثالث', 'المنتج 36', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '3.7', 4, 1, 'In stock', '', '2024-05-13'),
(52, 'Store 3', 'Website Logo.png', 'Product thirty seven', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#e411cb', '40', 15, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'GAMING', 'Gaming Accessories-GAMING', 'المتجر الثالث', 'المنتج السابع والثلاثين', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '4.2', 82, 1, 'In stock', '1', '2024-05-13'),
(53, 'Store 3', 'Website Logo.png', 'Product 38', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#c4f500', '12', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'GAMING', 'Figurines-GAMING', 'المتجر الثالث', 'المنتج 38', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 0, 1, '', '', '2024-05-13'),
(54, 'Store 3', 'Website Logo.png', 'Product 39', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#1f66d1', '30', 50, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'GAMING', 'Figurines-GAMING', 'المتجر الثالث', 'المنتج 39', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '1.4', 5, 1, 'في المخزون', '2', '2024-05-13'),
(55, 'Store 3', 'Website Logo.png', 'Product 40', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#9832ec', '30', 10, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'GAMING', 'All-GAMING', 'المتجر الثالث', 'المنتج 40', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 3, 1, 'في المخزون', '2', '2024-05-13'),
(56, 'Store 3', 'Website Logo.png', 'Product 41', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#ffe11f', '20', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'GAMING', 'All-GAMING', 'المتجر الثالث', 'المنتج 41', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '3.45', 27, 1, 'In stock', '3', '2024-05-13'),
(57, 'Store 3', 'Website Logo.png', 'Product 42', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#ff0000', '15', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Makeup-OTHERS', 'المتجر الثالث', 'المنتج 42', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '1.9', 14, 1, 'In stock', '', '2024-05-13'),
(58, 'Store 3', 'Website Logo.png', 'Product 43', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#e27474', '7', 80, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Makeup-OTHERS', 'المتجر الثالث', 'المنتج 43', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '3.5', 29, 1, 'في المخزون', '1', '2024-05-13'),
(59, 'Store 3', 'Website Logo.png', 'Product 44', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'L', '#dfdddd', '30', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Phone Accessories-OTHERS', 'المتجر الثالث', 'المنتج 44', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 7, 1, 'In stock', '2', '2024-05-13'),
(60, 'Store 3', 'Website Logo.png', 'Product 45', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#000000', '15', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Phone Accessories-OTHERS', 'المتجر الثالث', 'المنتج 45', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 12, 1, 'في المخزون', '', '2024-05-13'),
(61, 'Store one', 'Website Logo.png', 'Product 46', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'M', '#4b4949', '20', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Hand Made-OTHERS', 'المتجر الاول', 'المنتج 46', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 5, 1, 'In stock', '2', '2024-05-13'),
(62, 'Store one', 'Website Logo.png', 'Product 47', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#fff71a', '5', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Arts-OTHERS', 'المتجر الثاني', 'المنتج 47', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 23, 0, 'نفد المخزون', '1', '2024-05-13'),
(63, 'Store tow', 'Website Logo.png', 'Product 50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#80ff66', '5', 50, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Hand Made-OTHERS', 'المتجر الثاني', 'المنتج 50', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '3', 6, 1, 'في المخزون', '1', '2024-05-13'),
(64, 'Store tow', 'Website Logo.png', 'Product 51', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'S', '#ff5900', '25', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'OTHERS', 'Arts-OTHERS', 'المتجر الثاني', 'المنتج 51', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'المواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '2.8', 15, 1, 'In stock', '2', '2024-05-13'),
(79, 'Store tow', 'Website Logo.png', 'Product aaaa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facers', 'raw materials', 'XL', '#2bd5f3', '20', 5, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Male-CLOTHING', 'المتجر الثاني', 'المنتج اااا', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'مواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '4.2', 5, 1, 'في المخزون', '', '2024-07-02'),
(80, 'Store tow', 'Website Logo.png', 'Product 222', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nihil dolores praesentium facer', 'raw materials', 'XL', '#4f4096', '45', 0, 'edit with Customer reassurance module', 'edit with Customer reassurance module', 'CLOTHING', 'Female-CLOTHING', 'المتجر الثاني', 'المنتج 222', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل.', 'الشركة نفسها هي شركة ناجحة جدا. علاوة على ذلك، عدم القيام بأي شيء مع آلام الحاضر', 'مواد الخام', 'التعديل باستخدام وحدة طمأنة العملاء', 'التعديل باستخدام وحدة طمأنة العملاء', '', 2, 1, 'In stock', '', '2024-07-02'),
(81, 'store 44', 'logo-small.png', 'product 101', 'sdascascascc z dcascascasm cjkanscj ', 'akmflkmalf klamfokmaklwemflkmalkm fjniofklaewfm ioam fkanfo efimnaoewfnm', 'material raw', 'M', '#1e5ddc', '20', 10, 'dmksmk kdmsiocmlam,sv kdnmvikasdlc iasjc asuhasjsdcniu', 'shfoijesoifo9ajefw haiwjdnmpoj;kfc iuhfiuesnfun;iea', 'SHOES', 'Male-SHOES', 'متجر 44', 'منتج 101', 'منككيمبنمةش تنىشنبتبىكنتثىب يسنتبىمنتيس', 'حجخبنحثة  خحثةحبسب ؤمخشثسؤحخبةسثبنمت:÷ُ بكتنىخكه:آٍ ـربىكهىكُِ', 'مواد خام', 'نحخنخثس خهتشخثهيؤىسىبهؤخثسشنخ هخسشثخه', 'كنيتتبؤخنسي هتشسيهخؤتهخشة هختشيسخهتخهي ىسيه', '', 4, 1, 'In stock', '1', '2024-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `id_pwdReset` int(12) NOT NULL,
  `reset_email` text NOT NULL,
  `reset_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`id_pwdReset`, `reset_email`, `reset_token`) VALUES
(143, 'store1@gmail.com', 'b2d1947f4a77380cfa92d211ca2d0aeef22a159d440374504180698ed5b0a9be'),
(144, 'abdalla_rasras@yahoo.com', '9eb64b113e0f707afecf558d27c690b4da4481e165a1af86e5834e8918d997f1'),
(145, 'abdalla_rasras@yahoo.com', '07de11b73068d15a0a85281af448b87d7b01ea61d817271498fab940b4122ed3');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prudoct` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `comment_star` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id_review`, `id_user`, `id_prudoct`, `rating`, `comment_star`, `date`) VALUES
(16, 14, '17', '5', 'frsrv gfvr dsfg rggD', '2024-01-28 02:54:29'),
(17, 14, '17', '2', 'dcsdvsdv cv df dx dfvds', '2024-01-28 15:58:47'),
(18, 14, '19', '2', 'knki hjbkj hj bjh,l hj,l ', '2024-01-28 16:23:25'),
(19, 14, '14', '0', 'kmkml', '2024-01-28 22:10:50'),
(20, 14, '14', '1', 'hio uibn hjvyuh', '2024-01-29 21:40:48'),
(21, 14, '22', '2', 'uikjb uibbuk', '2024-01-29 21:48:18'),
(22, 14, '16', '0', 'jhnkjnj', '2024-01-29 23:43:27'),
(23, 14, '54', '1.4', 'sajxoismc jnoasi ckjsnackn sazc njc jkaz', '2024-01-30 00:36:19'),
(24, 14, '47', '2.8', 'ddxv xv sdv DV xc', '2024-01-30 00:37:27'),
(25, 14, '47', '2.2', 'sacas acas asc', '2024-01-30 00:38:13'),
(26, 14, '19', '4.3', 'hgjh hbjhkj gh h  g k', '2024-01-30 21:31:01'),
(27, 14, '20', '4.6', 'hkj vgh gcjfc ff j ', '2024-01-31 02:13:44'),
(28, 14, '14', '2', 'sdcv cv dv dfvdff', '2024-02-01 15:51:32'),
(29, 14, '14', '5', 'sdfsdfsdf c d bdfv', '2024-02-01 16:29:36'),
(30, 14, '16', '4.7', 'mgiodgidm jknijdnfj j vjda fvjn dfla', '2024-02-02 20:41:39'),
(31, 14, '14', '2.2', 'sacsa dfvdfsv', '2024-02-06 14:55:27'),
(32, 14, '15', '3', 'gfghj ggvkhb hj jhb', '2024-02-06 16:26:13'),
(33, 14, '15', '1.3', 'udshkfjsd jksdbn', '2024-02-06 16:44:13'),
(34, 14, '15', '2.1', ' jknkj kjlnkj ', '2024-02-06 17:00:41'),
(35, 14, '21', '1.8', 'dsfsav dfvsdv c dvsdv dfvdfvrdv fvsdfv dfv', '2024-02-06 19:41:00'),
(36, 14, '15', '0.3', 'jbjiinl bibn hbkh', '2024-02-06 21:49:38'),
(37, 14, '15', '3.1', 'jhinj jbuyg hjk', '2024-02-06 21:52:24'),
(38, 14, '19', '0.3', 'hbjh jhbljbh bljbj hjbh bj', '2024-02-06 22:09:14'),
(39, 14, '15', '1', 'sdcs fvdf dz', '2024-02-07 00:29:57'),
(40, 14, '22', '2.4', 'smkmcl sk dkv sdk k ks', '2024-02-07 00:37:47'),
(41, 14, '24', '3.7', 'dsd vds sdcsd sdcd', '2024-02-07 00:52:10'),
(42, 14, '24', '4.5', 'swfv dfbdbfz', '2024-02-07 00:57:26'),
(43, 16, '40', '2.6', 'fdsvs fbdf cvbdffb c vdf', '2024-02-08 15:06:52'),
(44, 16, '35', '1.2', 'ergergb  fggbrbfgbf', '2024-02-08 15:13:33'),
(45, 16, '35', '4', 'njnjk jknkjnk jljk', '2024-02-08 15:14:01'),
(46, 16, '46', '2', 'fdbd fgbfgbbf fb', '2024-02-08 15:24:29'),
(47, 16, '63', '3', 'fgbf v fgbf v fvb ', '2024-02-08 15:35:42'),
(48, 16, '56', '2.7', 'lkfnmlkvds fvdfv', '2024-02-08 16:53:03'),
(49, 16, '50', '3', 'dbd fgbfgb f fgb', '2024-02-08 16:53:58'),
(50, 16, '56', '4.2', 'dscds dscsdc sdc sdcsdcsdc sd!!', '2024-02-09 01:03:45'),
(51, 16, '39', '2', 'sdcsd dfvsd xcsdcvsdvs df ', '2024-02-14 16:28:50'),
(52, 16, '33', '4.1', 'svfd v dfvd dv df ddfa', '2024-02-14 16:30:01'),
(53, 16, '51', '3.7', 'hk;jk jkbilbn jbliul.i.', '2024-02-14 22:21:37'),
(54, 16, '49', '5', 'nLKlk m,nZKL>N m,Z m,xz', '2024-02-14 22:36:26'),
(55, 16, '48', '2.3', 'mo;p  jnbiujnjhbkl hjbvlu', '2024-02-16 16:46:18'),
(56, 16, '30', '3', 'jbkij jbljk jlijk kjl j', '2024-02-17 14:20:02'),
(57, 16, '57', '1.3', 'esdeasvcvdsvsddce', '2024-02-18 14:22:15'),
(58, 16, '57', '2.5', 'rsef b dfdsf dfsvfsv dfs df', '2024-02-18 14:23:01'),
(59, 16, '43', '2.4', 'dsfsv fvsf fdsdf dfvdf svsdvd dfvsdfvb gf', '2024-03-01 19:09:25'),
(60, 16, '32', '1.7', 'lw;elmaf jk jubf efjlc wlj, wEW', '2024-03-01 19:12:15'),
(61, 14, '35', '2', 'erge fgbfbg fbgfgb', '2024-03-03 16:45:14'),
(62, 16, '64', '2.8', 'dfsdcs cvdfvdf f wef', '2024-04-22 18:57:50'),
(63, 20, '43', '2.3', 'dsdd cv frvweav awecwe', '2024-05-29 23:15:57'),
(64, 20, '43', '1.2', 'dsfS sfSDFsDf fds', '2024-05-29 23:29:56'),
(65, 20, '43', '1.2', 'sdfsd asdASd dsed', '2024-05-29 23:32:01'),
(66, 20, '43', '1.2', 'dsfsdf sdfsd', '2024-05-29 23:33:46'),
(67, 20, '43', '0', 'klszx\r\n', '2024-05-29 23:34:38'),
(68, 20, '43', '0.2', 'sadas sdcsd', '2024-05-30 00:00:18'),
(69, 20, '58', '3.5', 'asdcasd', '2024-05-30 16:50:30'),
(70, 20, '52', '4.2', 'fhjgfh', '2024-05-30 18:27:43'),
(71, 20, '52', '0.4', 'bbhjb hbjh jb jh', '2024-05-30 18:28:47'),
(72, 20, '23', '0.3', 'zcasc xc sxc  xc', '2024-06-01 13:13:38'),
(73, 20, '23', '3.1', 'sfsd dfbvdv', '2024-06-01 13:14:32'),
(74, 20, '17', '1.3', 'vdsfvdsvdf cvdfvdfv', '2024-06-23 15:23:30'),
(75, 14, '30', '1', 'dfsdf sdvsdv', '2024-06-25 16:54:08'),
(76, 14, '30', '2', 'dcsdd f df va r', '2024-06-25 16:55:29'),
(77, 16, '79', '4.2', 'منتج ممتاز ', '2024-07-02 15:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `store_information`
--

CREATE TABLE `store_information` (
  `id_store_info` int(11) NOT NULL,
  `StoreName_info` varchar(250) NOT NULL,
  `img_store_info` text NOT NULL,
  `email_store_info` varchar(250) NOT NULL,
  `ph_n_store_info` varchar(250) NOT NULL,
  `pass_store_info` varchar(250) NOT NULL,
  `cpss_store_info` varchar(250) NOT NULL,
  `wbi_store_info` varchar(500) NOT NULL,
  `cardNumber_store_info` varchar(250) NOT NULL,
  `cardName_store_info` varchar(250) NOT NULL,
  `Expirydate_store_info` varchar(250) NOT NULL,
  `CardSecurity_store_info` varchar(250) NOT NULL,
  `ShippingAddress_store_info` varchar(500) NOT NULL,
  `Shop_Category_store_info` varchar(500) NOT NULL,
  `Shop_sub_Category_store_info` varchar(500) NOT NULL,
  `agree_terms` varchar(250) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_information`
--

INSERT INTO `store_information` (`id_store_info`, `StoreName_info`, `img_store_info`, `email_store_info`, `ph_n_store_info`, `pass_store_info`, `cpss_store_info`, `wbi_store_info`, `cardNumber_store_info`, `cardName_store_info`, `Expirydate_store_info`, `CardSecurity_store_info`, `ShippingAddress_store_info`, `Shop_Category_store_info`, `Shop_sub_Category_store_info`, `agree_terms`, `role`) VALUES
(14, 'Store tow', 'Website Logo.png', 'abodfigo81@gmail.com', '0799999666', '123qweasdzxc', '123qweasdzxc', 'A1112CG', '1111 2222 3333 5555', 'aaaaa', '06/18', '123', 'https://google.map.com', 'BAGS,PERFUMES', 'Female-BAGS,Male-BAGS,Kids-BAGS,All-BAGS,Female-PERFUMES,Male-PERFUMES,Kids-PERFUMES,All-PERFUMES', 'agree terms', 'vendor'),
(18, 'Store 3', 'Website Logo.png', 'abdalla_rasras@yahoo.com', '0799333333', 'QAZWSXEDC321', 'QAZWSXEDC321', 'abdalla_rasras@yahoo.com', '1111 4444 2222 1111', 'ASD FFV', '03/15', '222', 'https://google.map.com', 'ACCESSORIES,GAMING,OTHERS', 'Hand Made-ACCESSORIES,All-ACCESSORIES,Gaming Accessories-GAMING,Figurines-GAMING,All-GAMING,Makeup-OTHERS,Phone Accessories-OTHERS', 'agree terms', 'vendor'),
(19, 'Store one', 'Website Logo.png', 'store1@gmail.com', '0799333322', 'qazwsx11', 'qazwsx11', 'JO123456789AAWW112', '1111 5555 7777 111', 'abcpp', '02/12', '123', 'https://google.map.com', 'CLOTHING,SHOES', 'Female-CLOTHING,Male-CLOTHING,Kids-CLOTHING,All-CLOTHING,Female-SHOES,Male-SHOES,Kids-SHOES,All-SHOES', 'agree terms', 'vendor'),
(29, 'store 44', 'logo-small.png', 'store42@gmail.com', '0788888822', 'Asdewq123', 'Asdewq123', '2e3q3e3wedf', '1111 2222 3333 4444', 'Store four', '11/21', '123', 'irbid', 'CLOTHING,PERFUMES', 'Female-CLOTHING,All-CLOTHING,Male-PERFUMES', 'agree terms', 'vendor');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id_interest` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_name_prudoct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `orders_users`
--
ALTER TABLE `orders_users`
  ADD PRIMARY KEY (`id_order_user`);

--
-- Indexes for table `prudocts`
--
ALTER TABLE `prudocts`
  ADD PRIMARY KEY (`id_name_prudoct`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`id_pwdReset`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `store_information`
--
ALTER TABLE `store_information`
  ADD PRIMARY KEY (`id_store_info`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id_interest`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_name_prudoct` (`id_name_prudoct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `orders_users`
--
ALTER TABLE `orders_users`
  MODIFY `id_order_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `prudocts`
--
ALTER TABLE `prudocts`
  MODIFY `id_name_prudoct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `id_pwdReset` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `store_information`
--
ALTER TABLE `store_information`
  MODIFY `id_store_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id_interest` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
