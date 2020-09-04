-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2016 at 11:17 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `right_brands`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(32) NOT NULL,
  `blog_details` varchar(555) NOT NULL,
  `photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_title`, `blog_details`, `photo`) VALUES
(4, 'Beauty Cream', 'Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.Testing Data.', 'cream2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'Mobiles'),
(2, 'Cosmetics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_user` varchar(70) NOT NULL,
  `customer_method` varchar(70) NOT NULL,
  `customer_message` varchar(230) NOT NULL,
  `customer_password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_user`, `customer_method`, `customer_message`, `customer_password`) VALUES
(43, 'shagor ahmed', 'Dhaka', '01838548009', 'shagor@gmail.com', 'cash', 'I want to contact you', '123'),
(44, 'Ariful islam', 'Khulna', '01838548009', 'arif09@gmail.com', 'cash', 'I want to contact you', '1234'),
(45, 'mr abbas uddin', 'london', '+44015845671254', 'abbas@gmail.com', 'bkash', 'i want my product indeed.', '123');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_prodid` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_prodid`, `image_name`, `image_desc`) VALUES
(1, 1, 'product1.jpg', ''),
(2, 2, 'product2.jpg', ''),
(3, 3, 'product3.jpg', ''),
(4, 4, 'product4.jpg', ''),
(5, 5, 'product5.jpg', ''),
(6, 6, 'product6.jpg', ''),
(7, 7, '25e6e805ff981b635796479a39576aaf.jpg', ''),
(8, 8, 'b8141cd3bd65cb10e066e3125823b475.jpg', ''),
(10, 10, 'e04e64a1c280bafabfc3aaf998190d9f.jpg', ''),
(12, 12, 'b77c6661e327cb8540c5d8843d91440b.jpg', ''),
(13, 13, 'ef373bf8f1e71bf33c8ef936ec046a92.jpg', ''),
(14, 14, 'fda226d9a87c5b967738a84f43e8ba8e.jpg', ''),
(15, 15, '43c67fec1d71887d3ff0508dd830773b.png', ''),
(16, 16, 'main.jpg', ''),
(17, 17, 'recommend8.jpg', ''),
(18, 18, 'recommend9.jpg', ''),
(19, 19, '19aa.png', ''),
(20, 19, 'ee.jpg', ''),
(21, 19, 'fb.jpg', ''),
(22, 21, 'dbbd15d78b58cf1a35efd0052a8cb0fc.jpg', ''),
(23, 21, 'ce528faeec391a16d48ae7801a721b93.jpg', ''),
(24, 21, '8568b033f80349b9126163d6047c4bd8.jpg', ''),
(25, 21, 'ee6a7635c6ec5a4b11a73b69e8d62c92.jpg', ''),
(26, 22, '255f13963e776bf83cfefe458c296681.jpg', ''),
(27, 23, 'e9e466db5df0bb2855e7cda11c81c9fe.jpg', ''),
(31, 0, '2e787d3d2efbc7bdce6480b84bfaa89b.jpg', ''),
(32, 0, 'fd341d64a5e745c24743873267b0eb25.jpg', ''),
(33, 0, 'fa6becbae904663322937f858951b6f7.jpg', ''),
(34, 0, 'bde42190e2b2814794cacc7e297d02f7.jpg', ''),
(35, 0, 'd565ce6492ff309f85b3679de14a2933.jpg', ''),
(36, 0, '36297ea01e831100834e4da5805e5931.jpg', ''),
(37, 0, '694414fd9afc30ce159474884503af0f.jpg', ''),
(38, 0, 'fe8f74bc5f2500e612b8d15fdddae7ea.jpg', ''),
(39, 0, 'db824bf358dd005545bb736c66668a35.jpg', ''),
(40, 0, '6cc9f768f965f8b5e91a8149d61a6e0f.jpg', ''),
(41, 0, '435358c118e29d6067facdf3f33a03e5.jpg', ''),
(42, 0, '2f76939249eb45a1d6730e52578e24f0.jpg', ''),
(43, 0, 'ec7f36e80ae0325674883d0f904f8d51.jpg', ''),
(46, 26, '29646e045e5a5fa2d36d406d421b5be3.jpg', ''),
(47, 26, 'e88196476c41bf7897d1a479c6f5bc3d.jpg', ''),
(48, 27, '20568b17e95d5403ee1f377d13fbc6e7.jpg', ''),
(49, 28, 'dac83bd9f306315ce129f914b5d70465.jpg', ''),
(50, 29, '878a34c50362014741cb6ced2bc1c40a.jpg', ''),
(51, 30, '3eee918aacbc3ffa37782de30e2d685d.jpg', ''),
(52, 31, '2254660934c0d89044b0316b0c28881c.jpg', ''),
(53, 32, 'd6284aa8d625f37ca22645fd8300b1d6.jpg', ''),
(54, 33, '130d2c9ca7ccbe663fc3223872428efc.jpg', ''),
(55, 34, 'cb946f1e6e3aae512ccc7b6b3a55649c.png', ''),
(56, 35, 'a2c3a9eb310007b4e09ab1dd1f1d0fd6.jpg', ''),
(58, 37, 'b8cd47d29fb6a6d56aa19269b3b5289b.jpg', ''),
(59, 0, '37bfcd6d62575f6184047e5e9375f7fc.jpg', ''),
(60, 0, '4c2992210bf6b71a74779e05cd20f0dc.jpg', ''),
(61, 0, 'a38a86e1d7cac84a9c753923a8f66661.png', ''),
(62, 0, '73ad81d7ed3c244d0509c4f271215cb8.jpg', ''),
(63, 39, '8f35fc29c055c95489a4069f650d6081.jpg', ''),
(65, 41, '1cf89b9c717c2157715a4b6b073c2ff8.png', ''),
(66, 42, '41924b87f9e56fa06827d590f3f41daa.jpg', ''),
(67, 43, 'cd66e3c57b265930e8c2f0f6856c55f9.jpg', ''),
(69, 45, '782473198e4693e7521f5176ca553771.jpg', ''),
(70, 46, '74fd5730f40742e361d5cefc408f5ee1.jpg', ''),
(71, 47, '58e3fad767c16c2c024474f23ff778ff.jpg', ''),
(72, 48, 'eb6383f9d0e133447b71669a6258d045.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `new_cosmetic`
--

CREATE TABLE `new_cosmetic` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_cosmetic`
--

INSERT INTO `new_cosmetic` (`id`, `title`, `photo`) VALUES
(1, 'cream', 'cream.jpg'),
(4, 'cream2', 'cream2.jpg'),
(5, 'cream3', 'cream3.png');

-- --------------------------------------------------------

--
-- Table structure for table `new_mobile`
--

CREATE TABLE `new_mobile` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_mobile`
--

INSERT INTO `new_mobile` (`id`, `title`, `photo`) VALUES
(10, 'oppo c1', 'oppo3.jpg'),
(11, 'oppo', 'oppo2.png'),
(13, 'OPPO-C1', 'oppo1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_custid` int(11) NOT NULL,
  `order_totalamount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `order_custid`, `order_totalamount`, `status`) VALUES
(47, '2016-05-10 12:29:10', 43, 36000, 1),
(48, '2016-05-10 12:34:28', 44, 7400, 1),
(49, '2016-05-10 16:23:18', 45, 6000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(11) NOT NULL,
  `orderdetail_orderid` int(11) NOT NULL,
  `orderdetail_temporderprodid` int(11) NOT NULL,
  `orderdetail_productquantity` int(11) NOT NULL,
  `orderdetail_temporderimageid` int(11) NOT NULL,
  `orderdetail_tempordersubtotal` int(11) NOT NULL,
  `orderdetail_customarid` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `orderdetail_orderid`, `orderdetail_temporderprodid`, `orderdetail_productquantity`, `orderdetail_temporderimageid`, `orderdetail_tempordersubtotal`, `orderdetail_customarid`) VALUES
(11, 10, 39, 2, 63, 7400, 0),
(20, 24, 9, 3, 9, 900, 0),
(24, 28, 47, 1, 71, 1000, 0),
(26, 31, 45, 1, 69, 2000, 0),
(27, 34, 42, 1, 66, 1200, 0),
(28, 35, 42, 1, 66, 1200, 0),
(29, 37, 47, 2, 71, 2000, 0),
(30, 39, 43, 1, 67, 900, 0),
(31, 41, 47, 1, 71, 1000, 0),
(32, 42, 47, 2, 71, 2000, 0),
(33, 43, 30, 5, 51, 1400, 41),
(34, 44, 14, 2, 14, 24000, 41),
(35, 45, 18, 1, 18, 400, 4),
(36, 46, 33, 2, 54, 15000, 42),
(37, 47, 8, 2, 8, 36000, 43),
(38, 48, 39, 2, 63, 7400, 44),
(39, 49, 47, 6, 71, 6000, 45);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_catid` int(11) NOT NULL,
  `prod_subcatid` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` int(50) NOT NULL,
  `prod_desc` varchar(555) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `prod_code` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_catid`, `prod_subcatid`, `prod_name`, `prod_price`, `prod_desc`, `status`, `prod_code`) VALUES
(2, 1, 1, 'Iphone', 5200, '', 1, ''),
(3, 4, 19, 'SAMSUNG', 7800, '', 2, ''),
(4, 4, 19, 'FACEWASH', 350, '', 2, ''),
(7, 1, 3, 'SAMSUNG', 14000, '', 1, ''),
(10, 1, 4, 'Samsung-Tab-3', 13500, '', 2, ''),
(12, 1, 3, 'SONY', 50000, '', 1, ''),
(13, 1, 1, 'SAMSUNG', 13000, '', 2, ''),
(14, 1, 1, 'SONY', 12000, '', 2, ''),
(15, 1, 3, 'SAMSUNG', 35000, '', 2, ''),
(16, 4, 19, 'Facewash', 300, '', 2, ''),
(17, 4, 19, 'FACEWASH', 300, '', 2, ''),
(18, 4, 19, 'COSMETIC', 400, '', 2, ''),
(21, 4, 2, 'Iphone 65', 68000, '', 1, ''),
(23, 2, 13, 'Facewash', 230, '', 1, ''),
(28, 0, 0, 'SOFT COLOR', 350, '', 1, ''),
(29, 2, 14, 'SOFT ', 400, '', 1, ''),
(30, 2, 14, 'SOFT COLOR', 280, '', 1, ''),
(31, 2, 15, 'WATCH', 5500, '', 1, ''),
(32, 2, 15, 'watch', 6000, '', 1, ''),
(33, 2, 15, 'WATCH', 7500, '', 1, ''),
(35, 2, 15, 'WATCH', 7800, '', 1, ''),
(37, 0, 17, 'Orginal', 6500, '', 1, ''),
(39, 0, 17, 'Orginal', 3700, '', 1, ''),
(41, 1, 5, 'MOBILE', 6500, '', 1, ''),
(42, 2, 12, 'SPECIAL WATER PLUS CREAM', 1200, 'Deoproc Special Water Plus Is A Specialized Moisturizer That Keeps A Dried And Tired Skin Moist By Directly Supplying Moisture To Skin With Water Sparkling At The Moment Of Application. The Included Arbutin Brings Back A Transparent And Clean Skin By Suppressing Melanin Production, And The Adenosine Ingredient Creates An Optimal Skin Environment Capable Of Skin Restoration By Reducing Wrinkles While Increasing Skin Elasticity.', 1, 'CODE-1127'),
(43, 2, 12, 'TINTED LIP BALM', 900, 'DEOPROCE', 1, 'CODE-4004'),
(45, 2, 12, ' UV WATERFUL CUSHION SPF50+/PA+++', 2000, 'From UV block to make-up at once, Waterful Cushion makes natural moist and glossy skin', 1, 'CODE-1600'),
(46, 2, 12, ' UV WATERFUL CUSHION SPF50+/PA+++', 2000, 'From UV block to make-up at once, Waterful Cushion makes natural moist and glossy skin', 1, 'CODE-1600'),
(47, 2, 12, 'HAIR ESSENCE', 1000, 'This hair essence adds moisture to your hair, leaving it silky soft and smooth\r\n\r\nAs part of the serum argan and linseed oil, which contributes to improving the hair,moisturizing and repairing, preventing breakage and cross section of the hair,protects against external environmental influences,Serum solders split ends,making it alive and silky without weighthing it down.\r\nApplication: Serum applied both on dry and on wet hair.', 1, 'CODE-1335'),
(48, 1, 1, 'oppo my phone', 112233, 'বাংলাদেশ', 1, 'oppo-F1');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `name`, `date`, `phone`, `email`, `message`) VALUES
(9, 'samim', '2016-06-06 16:14:59', '112233', 'samin@gmail.com', 'hey wassup..!!!');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(150) NOT NULL,
  `slider_desc` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `discount_image` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_desc`, `image`, `discount_image`, `position`) VALUES
(1, 'Affordable Rate', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '8319da7fd5214d0a8960bf48e84cf31f.jpg', '', ''),
(2, '100% Export Quality', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Fastrack-38016pl02-Sports-Men-Watch-SDL779261905-1-f6f55.jpg', '', ''),
(3, 'Stylish & Comfortable 33', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 33', '91hhyl40pUL._SL1500_.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_catid` varchar(20) NOT NULL,
  `subcategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcat_catid`, `subcategory`) VALUES
(1, '1', 'oppo'),
(3, '1', 'SUB-2'),
(4, '1', 'SUB-3'),
(5, '1', 'SUB-4'),
(6, '1', 'SUB-5'),
(7, '1', 'SUB-6'),
(12, '2', 'SUB-C'),
(13, '2', 'SUB-C2'),
(14, '2', 'SUB-C3'),
(15, '2', 'SUB-C4'),
(16, '2', 'SUB-C5'),
(17, '0', 'Sub-w');

-- --------------------------------------------------------

--
-- Table structure for table `temp_order`
--

CREATE TABLE `temp_order` (
  `temporder_id` int(11) NOT NULL,
  `temporder_date` datetime NOT NULL,
  `temporder_session_id` varchar(100) NOT NULL,
  `temporder_prodid` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `temporder_imageid` int(11) NOT NULL,
  `temporder_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_order`
--

INSERT INTO `temp_order` (`temporder_id`, `temporder_date`, `temporder_session_id`, `temporder_prodid`, `product_quantity`, `temporder_imageid`, `temporder_subtotal`) VALUES
(1, '2016-03-19 10:13:37', '6d6st9i60ro28504sq33t9dpg0', 7, 1, 7, 3500),
(2, '2016-04-12 16:37:58', 'mdq2r70lvspvlpuflq1fkqemi4', 2, 1, 2, 5200),
(7, '2016-04-16 14:11:42', 'et68mto0ei7t42563dedrc8sq6', 32, 1, 53, 6000),
(8, '2016-04-19 17:14:57', 'mhfl91pg5fts0aevsq161tscu0', 3, 1, 3, 7800),
(10, '2016-04-20 16:38:50', '32bsn025oh2bj8gt4hobnb5ha0', 7, 1, 7, 14000),
(12, '2016-04-24 18:10:39', '7223fruuoi5j6u0medo0jr8od6', 42, 1, 66, 15000),
(13, '2016-04-25 11:47:21', '0pnat20i7oqt8b359shrfc5lc1', 44, 1, 68, 8000),
(17, '2016-04-25 17:50:15', '2t32qu65h72gm8h6pk56toumk0', 45, 2, 69, 12000),
(32, '2016-04-26 16:35:33', 'msoqjv9i1sj6i0urlkaofom1m4', 42, 1, 66, 1200),
(41, '2016-05-10 17:03:44', '5390h04jj9ina1dem2bpsukna4', 8, 2, 8, 36000),
(42, '2016-05-14 16:30:30', 'idlnabnv46bd19n266e2qfpt80', 39, 5, 63, 18500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(10) NOT NULL,
  `parent` varchar(50) NOT NULL,
  `userstatus` enum('Active','Disable') NOT NULL,
  `registrationtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `parent`, `userstatus`, `registrationtime`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, '', 'Active', '2013-05-13 05:35:00'),
(2, 'arifcs22', '4e5186d89433ffd24a436bb1f96a37a75b920422', 1, 'Admin', 'Active', '2015-08-06 04:57:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `new_cosmetic`
--
ALTER TABLE `new_cosmetic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_mobile`
--
ALTER TABLE `new_mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderdetail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `temp_order`
--
ALTER TABLE `temp_order`
  ADD PRIMARY KEY (`temporder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `new_cosmetic`
--
ALTER TABLE `new_cosmetic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `new_mobile`
--
ALTER TABLE `new_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `temp_order`
--
ALTER TABLE `temp_order`
  MODIFY `temporder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
