-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 09:08 PM
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
-- Database: `zanzon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID_Admin` int(11) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `Email_admin` varchar(255) NOT NULL,
  `Password_admin` varchar(255) NOT NULL,
  `CPassword_admin` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID_Admin`, `username_admin`, `Email_admin`, `Password_admin`, `CPassword_admin`, `role`) VALUES
(1, 'admin12', 'admin12@gmail.com', '1qaz2wsx3edc', '1qaz2wsx3edc', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `title_contact` varchar(200) NOT NULL,
  `address_contact` varchar(250) NOT NULL,
  `phone_contact` varchar(250) NOT NULL,
  `phone_hotline_contact` varchar(250) NOT NULL,
  `email_contact` varchar(250) NOT NULL,
  `email_support_contact` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `title_contact`, `address_contact`, `phone_contact`, `phone_hotline_contact`, `email_contact`, `email_support_contact`) VALUES
(1, 'Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human', '123 Main Street, Anytown, CA 12345 – USA', '(123) 123 4567', '100 967 8456', 'yourmail@domain.com', 'support@hastech.company');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_form_personal` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `id_form_address` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address_complement` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip/postal_code` varchar(50) NOT NULL,
  `countries` varchar(255) NOT NULL,
  `provinces` varchar(255) NOT NULL,
  `Province With_Price_For_Delivery` varchar(255) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `buliding_number` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `id_form_shipping` int(11) NOT NULL,
  `cash_delivery` varchar(100) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `name_card` varchar(255) NOT NULL,
  `expiry_date_month` varchar(100) NOT NULL,
  `expiry_date_year` varchar(100) NOT NULL,
  `card_security_code` varchar(100) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `id_form_payment` int(11) NOT NULL,
  `agree` varchar(255) NOT NULL,
  `id_order_cash` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `id_user`, `id_form_personal`, `first_name`, `last_name`, `user_name`, `phone_number`, `email`, `address`, `id_form_address`, `company`, `address_complement`, `city`, `zip/postal_code`, `countries`, `provinces`, `Province With_Price_For_Delivery`, `area_name`, `street_name`, `buliding_number`, `check_out`, `id_form_shipping`, `cash_delivery`, `card_number`, `name_card`, `expiry_date_month`, `expiry_date_year`, `card_security_code`, `promo_code`, `id_form_payment`, `agree`, `id_order_cash`) VALUES
(2, 14, 1, 'user', 'tow', 'user_tow', '0799044444', 'abodfigo81@gmail.com', 'california-usa', 1, 'normical', 'hkljhkj', 'jvmhjbvjh', '11152', 'UK', 'North East', '1.35', 'aaaa', 'hkljhkj', '12s', 'check out', 0, '', '', '', '', '', '', '', 0, '', 0),
(7, 16, 1, 'user', 'one', 'userone1', '0788964631', 'abdalla_rasras@yahoo.com', 'ontario-canda', 1, 'wqwdwqs', '', 'jvmhjbvjh', '11152', 'CA', 'British Columbia', '0.9', 'ewefwef', 'czxscsdcdas', 'y43', 'check out', 0, '', '', '', '', '', '', '', 0, '', 0),
(20, 20, 1, 'user', 'three', 'user_three_3', '0799049999', 'user3@gmail.com', 'Amman-Jordan', 1, '', '', 'jvmhjbvjh', '11152', 'JO', 'Zarqa`a', '1', 'aaaa', 'hkljhkj', 'y43', 'check out', 0, '', '', '', '', '', '', '', 0, '', 0),
(21, 29, 1, 'abood', 'wedew', 'abood_we2', '0799999999', 'aboodwe2@gmail.com', 'amman', 1, '', '', 'amman', '52111', 'UK', 'North East', '1.35', 'adawd', 'fgdfgdf', '32', 'check out', 0, '', '', '', '', '', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `img_feedback` text NOT NULL,
  `description_feedback` varchar(500) NOT NULL,
  `name_feedback` varchar(150) NOT NULL,
  `email_feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `img_feedback`, `description_feedback`, `name_feedback`, `email_feedback`) VALUES
(1, '2.png', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odiodignissim qui blandit praesent luptatum zzril', 'Juhn Doe', 'demo@hasthemes.com'),
(2, '3.png', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odiodignissim qui blandit praesent luptatum zzril', 'Juhn Doe', 'demo@hasthemes.com'),
(4, '4.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem temporibus facilis,quo error iste ipsa hic dolor necessitatibus, magnam earum illum eos pariatur cumque maxime ratione consectetur consequuntur voluptates repudiandae', 'Jessya Inn', 'Jessya@hasthemes.com'),
(7, '3.png', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odiodignissim qui blandit praesent luptatum zzril', 'Juhn Doe', 'juhn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id_footer` int(11) NOT NULL,
  `img_logo_footer` text NOT NULL,
  `slogin_footer` varchar(500) NOT NULL,
  `facebook_footer` varchar(255) NOT NULL,
  `insta_footer` varchar(255) NOT NULL,
  `whats_footer` varchar(255) NOT NULL,
  `title_security1` varchar(150) NOT NULL,
  `title_security2` varchar(150) NOT NULL,
  `title_security3` varchar(150) NOT NULL,
  `title_security4` varchar(150) NOT NULL,
  `desc_security1` varchar(500) NOT NULL,
  `desc_security2` varchar(500) NOT NULL,
  `desc_security3` varchar(500) NOT NULL,
  `desc_security4` varchar(500) NOT NULL,
  `img_security` text NOT NULL,
  `Q1` varchar(255) NOT NULL,
  `Q2` varchar(255) NOT NULL,
  `Q3` varchar(255) NOT NULL,
  `Q4` varchar(255) NOT NULL,
  `A1` varchar(255) NOT NULL,
  `A2` varchar(255) NOT NULL,
  `A4` varchar(255) NOT NULL,
  `vid_A` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id_footer`, `img_logo_footer`, `slogin_footer`, `facebook_footer`, `insta_footer`, `whats_footer`, `title_security1`, `title_security2`, `title_security3`, `title_security4`, `desc_security1`, `desc_security2`, `desc_security3`, `desc_security4`, `img_security`, `Q1`, `Q2`, `Q3`, `Q4`, `A1`, `A2`, `A4`, `vid_A`) VALUES
(1, 'logo-dark.jpg', 'We are a team of designers and developers that create high quality Magento, Prestashop, Opencart', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.whatsapp.com', 'Welcome To Zonan', 'Our Company', 'Our Team', 'Testimonial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore aperiam fugit consequuntur voluptatibus ex sint iure in, distinctio sed dolorem aspernatur veritatis repellendus dolorum voluptate, animi libero officiis eveniet accusamus recusandae. Temporibus amet ducimus sapiente voluptatibus autem dolorem magnam quas, officiis eveniet accusamus animi libero officiis eveniet accusamus recusandae. Temporibus Sint voluptatum beatae necessitatibus quos mollitia vero, optio asperiores aut tempor', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing elit', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing elit', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing elit', '5.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse deserunt tempore hic earum perspiciatis ?', 'dolor sit, amet consectetur adipisicing elit. Esse deserunt tempore hic earum perspiciatis ?', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse deserunt tempore hic earum perspiciatis ?', 'Lorem ipsum dolor sit, amet consectetur deserunt tempore hic earum perspiciatis ?', 'consectetur adipisicing elit. Ipsam laudantium assumenda quia culpa aliquid ad maxime nulla pariatur dolor voluptate deserunt quis dignissimos optio beatae labore, numquam rem', 'consectetur adipisicing elit. Ipsam laudantium assumenda quia culpa aliquid ad maxime nulla pariatur dolor voluptate deserunt quis dignissimos optio beatae labore, numquam rem', 'consectetur adipisicing elit. Ipsam laudantium assumenda quia culpa aliquid ad maxime nulla pariatur dolor voluptate deserunt quis dignissimos optio beatae labore, numquam rem', 'pexels_videos_4549 (1080p).mp4');

-- --------------------------------------------------------

--
-- Table structure for table `form_contact`
--

CREATE TABLE `form_contact` (
  `id_form_contact` int(11) NOT NULL,
  `name_form` varchar(200) NOT NULL,
  `email_form` varchar(200) NOT NULL,
  `subject_form` varchar(250) NOT NULL,
  `message_form` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_contact`
--

INSERT INTO `form_contact` (`id_form_contact`, `name_form`, `email_form`, `subject_form`, `message_form`) VALUES
(13, 'ali', 'ali21@yahoo.com', 'ewfwef ef ewrfewffe ferf erf', 'micus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(11) NOT NULL,
  `img_logo` text NOT NULL,
  `dash_logo` text NOT NULL,
  `dash_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `img_logo`, `dash_logo`, `dash_name`) VALUES
(1, 'logo-dark.jpg', 'apple-icon.png', 'Main Dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `inner_slider_banner`
--

CREATE TABLE `inner_slider_banner` (
  `id_inner_slider_banner` int(11) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inner_slider_banner`
--

INSERT INTO `inner_slider_banner` (`id_inner_slider_banner`, `banner`) VALUES
(1, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `intro`
--

CREATE TABLE `intro` (
  `id_intro` int(11) NOT NULL,
  `vid_intro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intro`
--

INSERT INTO `intro` (`id_intro`, `vid_intro`) VALUES
(1, 'pexels_videos_4549 (1080p).mp4');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id_promo_code` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id_promo_code`, `code`, `discount_amount`, `expiration_date`) VALUES
(8, '391163', 10.00, '2024-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `pwdrest`
--

CREATE TABLE `pwdrest` (
  `id_pwdRest` int(11) NOT NULL,
  `email_reset` varchar(500) NOT NULL,
  `token_reset` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pwdrest`
--

INSERT INTO `pwdrest` (`id_pwdRest`, `email_reset`, `token_reset`) VALUES
(10, 'abodfigo81@gmail.com', '79274840c3679c61e5efdada80aeac18bab6bd198ec312be807d3ea79779b0d8'),
(11, 'abodfigo81@gmail.com', '9c1d4ce040cb521587cc22d4bd08ea07c3353600175a31b24a84b2e6c4e4e568'),
(12, 'abodfigo81@gmail.com', 'ebf7ff8528c07ec7c6f7f1a879930dcbda53a00709d7c5eb449792847c341357');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'vendor');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slidebar` int(11) NOT NULL,
  `title_slidebar` varchar(200) NOT NULL,
  `description_slide_bar` varchar(500) NOT NULL,
  `btn_slider` varchar(500) NOT NULL,
  `img_slider_bar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slidebar`, `title_slidebar`, `description_slide_bar`, `btn_slider`, `img_slider_bar`) VALUES
(2, 'Wow skin Science', 'Charcoal & Keratin Shampoo 300ml', 'index.php', 'slide1.jpg'),
(3, 'cleanse and refresh', 'Sisley Pre-Shampoo Purifying Mask', 'index.php', 'slide2.jpg'),
(4, 'Wow skin Science', 'skin Charcoal & Keratin', 'index.php', 'slide3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id_stores` int(11) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `store_logo` text NOT NULL,
  `email_store` varchar(250) NOT NULL,
  `phone_number_stoe` varchar(250) NOT NULL,
  `username_store` varchar(250) NOT NULL,
  `wbi_store_info` varchar(500) NOT NULL,
  `card_number` varchar(500) NOT NULL,
  `name_card` varchar(250) NOT NULL,
  `Expiry_date` varchar(200) NOT NULL,
  `Card_Security_Code` varchar(100) NOT NULL,
  `Shipping_Address` varchar(500) NOT NULL,
  `Shop_Category` enum('CLOTHING','SHOES','BAGS','PERFUMES','ACCESSORIES','GAMING','OTHER') NOT NULL,
  `Shop_Sub_Category` enum('Female','Male','Kids','All','Hand Made','Gaming Accessories','Figurines','Makeup','Phone Accessories','Arts') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id_stores`, `store_name`, `store_logo`, `email_store`, `phone_number_stoe`, `username_store`, `wbi_store_info`, `card_number`, `name_card`, `Expiry_date`, `Card_Security_Code`, `Shipping_Address`, `Shop_Category`, `Shop_Sub_Category`) VALUES
(1, 'Store 1', 'aaaa.png', 'store33@gmail.com', '0799999999', 'store55', 'Bank IBAN', '1111 2222 3333 4444', 'aaaa bbbbb', '07/28', '122', 'https://maps.app.goo.gl/b5ALb3PHQnBHPu967', 'SHOES', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `topages_basket`
--

CREATE TABLE `topages_basket` (
  `id_basket` int(11) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_prudoct` int(100) NOT NULL,
  `prudoct_name_basket` varchar(255) NOT NULL,
  `store_logo_basket` text NOT NULL,
  `name_logo_basket` varchar(255) NOT NULL,
  `name_product_basket_ar` varchar(255) NOT NULL,
  `name_store_basket_ar` varchar(250) NOT NULL,
  `price_basket` varchar(150) NOT NULL,
  `qty_basket` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topages_basket`
--

INSERT INTO `topages_basket` (`id_basket`, `id_user`, `id_prudoct`, `prudoct_name_basket`, `store_logo_basket`, `name_logo_basket`, `name_product_basket_ar`, `name_store_basket_ar`, `price_basket`, `qty_basket`) VALUES
(134, 14, 55, 'Product 40', 'Website Logo.png', 'Store 3', 'المنتج 40', 'المتجر الثالث', '27', 4),
(149, 14, 24, 'Product 11', 'Website Logo.png', 'Store one', 'المنتج 11', 'المتجر الاول', '24', 1),
(152, 23, 24, 'Product 11', 'Website Logo.png', 'Store one', 'المنتج 11', 'المتجر الاول', '24', 1),
(153, 23, 40, 'Product 26', 'Website Logo.png', 'Store tow', 'المنتج 26', 'المتجر الثاني', '8.5', 1),
(154, 24, 24, 'Product 11', 'Website Logo.png', 'Store one', 'المنتج 11', 'المتجر الاول', '24', 1),
(155, 24, 40, 'Product 26', 'Website Logo.png', 'Store tow', 'المنتج 26', 'المتجر الثاني', '8.5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topages_compare`
--

CREATE TABLE `topages_compare` (
  `id_product_compare` int(11) NOT NULL,
  `id_product` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `name_product_compare` varchar(255) NOT NULL,
  `store_logo_compare` text NOT NULL,
  `name_store_compare` varchar(255) NOT NULL,
  `price_compare` varchar(100) NOT NULL,
  `Description_compare` varchar(500) NOT NULL,
  `name_product_ar_compare` varchar(255) NOT NULL,
  `name_store_ar_compare` varchar(255) NOT NULL,
  `Description_ar_compare` varchar(500) NOT NULL,
  `size_compare` varchar(150) NOT NULL,
  `color_compare` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topages_compare`
--

INSERT INTO `topages_compare` (`id_product_compare`, `id_product`, `id_user`, `name_product_compare`, `store_logo_compare`, `name_store_compare`, `price_compare`, `Description_compare`, `name_product_ar_compare`, `name_store_ar_compare`, `Description_ar_compare`, `size_compare`, `color_compare`) VALUES
(45, 43, 14, 'Product 28', 'Website Logo.png', 'Store tow', '6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'المنتج 28', 'المتجر الثاني', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل.', 'M', '#4d4c4c'),
(46, 55, 14, 'Product 40', 'Website Logo.png', 'Store 3', '27', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'المنتج 40', 'المتجر الثالث', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل.', 'M', '#9832ec'),
(47, 25, 20, 'Product number twelve', 'Website Logo.png', 'Store one', '25', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'المنتج رقم الثاني عشر', 'المتجر الاول', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل.', 'S', '#ff0026'),
(48, 54, 16, 'Product 39', 'Website Logo.png', 'Store 3', '15', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'المنتج 39', 'المتجر الثالث', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'M', '#1f66d1'),
(49, 49, 16, 'Product 34', 'Website Logo.png', 'Store 3', '20', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'المنتج 34', 'المتجر الثالث', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'L', '#ee1717'),
(50, 56, 16, 'Product 41', 'Website Logo.png', 'Store 3', '20', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'المنتج 41', 'المتجر الثالث', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'L', '#ffe11f'),
(51, 40, 23, 'Product 26', 'Website Logo.png', 'Store tow', '8.5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'المنتج 26', 'المتجر الثاني', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'M', '#b3b607'),
(52, 28, 23, 'Product number fifteen', 'Website Logo.png', 'Store one', '36', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'المنتج الرقم خامس عشر', 'المتجر الاول', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'L', '#824ee4'),
(53, 40, 24, 'Product 26', 'Website Logo.png', 'Store tow', '8.5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'المنتج 26', 'المتجر الثاني', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'M', '#b3b607'),
(54, 28, 24, 'Product number fifteen', 'Website Logo.png', 'Store one', '36', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', 'المنتج الرقم خامس عشر', 'المتجر الاول', 'يجب أن يكون العميل قادرًا على متابعة خدمة العملاء الخاصة بالعميل', 'L', '#824ee4');

-- --------------------------------------------------------

--
-- Table structure for table `topages_favorite`
--

CREATE TABLE `topages_favorite` (
  `id_favorite` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prudoct` int(11) NOT NULL,
  `prudoct_name_favorite` varchar(255) NOT NULL,
  `store_logo_favorite` text NOT NULL,
  `name_logo_favorite` varchar(255) NOT NULL,
  `name_product_ar_favorite` varchar(255) NOT NULL,
  `name_store_ar_favorite` varchar(255) NOT NULL,
  `price_favorite` varchar(100) NOT NULL,
  `qty_favortie` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topages_favorite`
--

INSERT INTO `topages_favorite` (`id_favorite`, `id_user`, `id_prudoct`, `prudoct_name_favorite`, `store_logo_favorite`, `name_logo_favorite`, `name_product_ar_favorite`, `name_store_ar_favorite`, `price_favorite`, `qty_favortie`) VALUES
(60, 14, 30, 'Product 17', 'Website Logo.png', 'Store tow', 'المنتج 17', 'المتجر الثاني', '25', 1),
(77, 23, 24, 'Product 11', 'Website Logo.png', 'Store one', 'المنتج 11', 'المتجر الاول', '24', 2),
(78, 23, 23, 'Product number ten', 'Website Logo.png', 'Store one', 'المنتج رقم عشرة', 'المتجر الاول', '8.75', 1),
(79, 24, 24, 'Product 11', 'Website Logo.png', 'Store one', 'المنتج 11', 'المتجر الاول', '24', 2),
(80, 24, 23, 'Product number ten', 'Website Logo.png', 'Store one', 'المنتج رقم عشرة', 'المتجر الاول', '8.75', 1);

-- --------------------------------------------------------

--
-- Table structure for table `under_slider_one`
--

CREATE TABLE `under_slider_one` (
  `id_under_one` int(11) NOT NULL,
  `title_under_one_1` varchar(250) NOT NULL,
  `title_under_one_2` varchar(250) NOT NULL,
  `discount_under_one` varchar(100) NOT NULL,
  `link_under_one` varchar(500) NOT NULL,
  `img_under_one` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `under_slider_one`
--

INSERT INTO `under_slider_one` (`id_under_one`, `title_under_one_1`, `title_under_one_2`, `discount_under_one`, `link_under_one`, `img_under_one`) VALUES
(1, 'Cyber Monday', 'Big Sale', '50', 'index.php', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `under_slider_tow`
--

CREATE TABLE `under_slider_tow` (
  `id_under_tow` int(11) NOT NULL,
  `title_under_tow_1` varchar(200) NOT NULL,
  `title_under_tow_2` varchar(200) NOT NULL,
  `discount_under_tow` varchar(100) NOT NULL,
  `link_under_tow` varchar(500) NOT NULL,
  `img_under_tow` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `under_slider_tow`
--

INSERT INTO `under_slider_tow` (`id_under_tow`, `title_under_tow_1`, `title_under_tow_2`, `discount_under_tow`, `link_under_tow`, `img_under_tow`) VALUES
(1, 'Black Fridays', 'Sale Up To', '70', 'index.php', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `first_name`, `last_name`, `display_name`, `user_name`, `phone_number`, `email`, `password`, `cpassword`, `address`, `role`) VALUES
(14, 'user', 'tow', 'user tow', 'user_tow', '0799044444', 'abodfigo81@gmail.com', 'Ewqasdcxz4321', 'Ewqasdcxz4321', 'usa - california', 'user'),
(16, 'user', 'one', 'user one', 'userone1', '0788964631', 'abdalla_rasras@yahoo.com', '1qaz2wsx3edc4rfvdd', '1qaz2wsx3edc4rfvdd', 'canda - quebec', 'user'),
(20, 'user', 'three', 'user three', 'user_three_3', '0799049999', 'user3@gmail.com', '1qaz2wsx3edc4rfvd', '1qaz2wsx3edc4rfvd', 'Amman-Jordan', 'user'),
(29, 'abood', 'wedew', 'abood wedew', 'abood_we2', '0799999999', 'aboodwe2@gmail.com', 'ZAQXSWCDE123', 'ZAQXSWCDE123', 'amman', 'user'),
(30, 'user ', 'number19', '', 'user_number19', '0799992222', 'usernumber19@gmail.com', 'QWSAZX21', 'QWSAZX21', 'amman', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id_footer`);

--
-- Indexes for table `form_contact`
--
ALTER TABLE `form_contact`
  ADD PRIMARY KEY (`id_form_contact`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `inner_slider_banner`
--
ALTER TABLE `inner_slider_banner`
  ADD PRIMARY KEY (`id_inner_slider_banner`);

--
-- Indexes for table `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id_intro`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id_promo_code`);

--
-- Indexes for table `pwdrest`
--
ALTER TABLE `pwdrest`
  ADD PRIMARY KEY (`id_pwdRest`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slidebar`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id_stores`);

--
-- Indexes for table `topages_basket`
--
ALTER TABLE `topages_basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Indexes for table `topages_compare`
--
ALTER TABLE `topages_compare`
  ADD PRIMARY KEY (`id_product_compare`);

--
-- Indexes for table `topages_favorite`
--
ALTER TABLE `topages_favorite`
  ADD PRIMARY KEY (`id_favorite`);

--
-- Indexes for table `under_slider_one`
--
ALTER TABLE `under_slider_one`
  ADD PRIMARY KEY (`id_under_one`);

--
-- Indexes for table `under_slider_tow`
--
ALTER TABLE `under_slider_tow`
  ADD PRIMARY KEY (`id_under_tow`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id_footer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_contact`
--
ALTER TABLE `form_contact`
  MODIFY `id_form_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inner_slider_banner`
--
ALTER TABLE `inner_slider_banner`
  MODIFY `id_inner_slider_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `intro`
--
ALTER TABLE `intro`
  MODIFY `id_intro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id_promo_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pwdrest`
--
ALTER TABLE `pwdrest`
  MODIFY `id_pwdRest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slidebar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id_stores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topages_basket`
--
ALTER TABLE `topages_basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `topages_compare`
--
ALTER TABLE `topages_compare`
  MODIFY `id_product_compare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `topages_favorite`
--
ALTER TABLE `topages_favorite`
  MODIFY `id_favorite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `under_slider_one`
--
ALTER TABLE `under_slider_one`
  MODIFY `id_under_one` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `under_slider_tow`
--
ALTER TABLE `under_slider_tow`
  MODIFY `id_under_tow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
