

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL auto_increment,
  `categoryName` varchar(100) NOT NULL,
  PRIMARY KEY  (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(1, 'Red');
INSERT INTO `categories` VALUES(2, 'Brown');
INSERT INTO `categories` VALUES(3, 'Green');
INSERT INTO `categories` VALUES(4, 'White');
INSERT INTO `categories` VALUES(5, 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL auto_increment,
  `categoryID` int(11) NOT NULL,
  `productCode` varchar(10) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `listPrice` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `file_ext` varchar(100) NOT NULL,
  PRIMARY KEY  (`productID`),
  UNIQUE KEY `productCode` (`productCode`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES(1, 5, 'b923856', 'Ocean Blue', 17.98, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'gif');
INSERT INTO `products` VALUES(2, 5, 'b57567', 'Sky Blue', 23.99, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'gif');
INSERT INTO `products` VALUES(3, 5, 'b7907987', 'Silver Blue', 22.99, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'gif');
INSERT INTO `products` VALUES(4, 5, 'b643646', 'Easter Blue', 34.99, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'gif');
INSERT INTO `products` VALUES(5, 3, 'g98709', 'Lime Green', 22.98, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'gif');
INSERT INTO `products` VALUES(6, 3, 'g457443', 'Medium Green', 19.99, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'gif');
INSERT INTO `products` VALUES(7, 3, 'g908789', 'Army Green', 17.99, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'gif');
