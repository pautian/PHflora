-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 01:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phflora`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_reg` (IN `reg` VARCHAR(45))   BEGIN
	DELETE FROM register
    WHERE register_id = reg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_reg` (IN `reg` VARCHAR(45), IN `pd` VARCHAR(11), IN `fullname` VARCHAR(45), IN `gen` ENUM('M','F'), IN `addr` VARCHAR(250), IN `birth` DATE, IN `ag` INT(11), IN `contact` VARCHAR(45), IN `email` VARCHAR(100))   BEGIN
	INSERT INTO register (register_id, passwordreg, name, gender, address, birth_date, age, contact_number, email, account_type, type_description)
	VALUES (reg, pd, fullname, gen, addr, birth, ag, contact, email, 'USR', 'User');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `contribution_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `contributor` varchar(11) NOT NULL,
  `contribution_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`contribution_id`, `plant_id`, `contributor`, `contribution_date`) VALUES
(32, 43, 'kristine123', '1970-01-01'),
(33, 44, 'lorz', '1970-01-01'),
(34, 45, 'paupaula', '1970-01-01'),
(35, 46, 'kristine123', '1970-01-01'),
(37, 1, 'paupaula', '2023-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `contribution_submitted`
--

CREATE TABLE `contribution_submitted` (
  `contribution_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `contributor` varchar(11) NOT NULL,
  `contribution_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contribution_submitted`
--

INSERT INTO `contribution_submitted` (`contribution_id`, `plant_id`, `contributor`, `contribution_date`) VALUES
(5, 8, 'lorz', '2023-02-22'),
(6, 9, 'lorz', '2023-02-23'),
(7, 10, 'lorz', '2023-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `contrib_references`
--

CREATE TABLE `contrib_references` (
  `references_id` int(11) NOT NULL,
  `contribution_id` int(11) NOT NULL,
  `source` varchar(45) NOT NULL,
  `link` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contrib_references`
--

INSERT INTO `contrib_references` (`references_id`, `contribution_id`, `source`, `link`) VALUES
(28, 32, 'Website', 'https://www.itis.gov/servlet/SingleRpt/SingleRpt?search_topic=TSN&amp;search_value=32970#null'),
(29, 33, 'Website', 'https://www.itis.gov/servlet/SingleRpt/SingleRpt?search_topic=TSN&amp;search_value=42451#null'),
(30, 34, 'Website', 'https://powo.science.kew.org/taxon/urn:lsid:ipni.org:names:537726-1'),
(31, 35, 'Website', 'https://www.itis.gov/servlet/SingleRpt/SingleRpt?search_topic=TSN&amp;search_value=507050#null');

-- --------------------------------------------------------

--
-- Table structure for table `contrib_references_submitted`
--

CREATE TABLE `contrib_references_submitted` (
  `references_id` int(11) NOT NULL,
  `contribution_id` int(11) NOT NULL,
  `source` varchar(45) NOT NULL,
  `link` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contrib_references_submitted`
--

INSERT INTO `contrib_references_submitted` (`references_id`, `contribution_id`, `source`, `link`) VALUES
(5, 5, 'testsn', 'testsn'),
(6, 6, 'test123', 'test123'),
(7, 7, 'alelhykalbo', 'alelhykalbo');

-- --------------------------------------------------------

--
-- Table structure for table `geninfo`
--

CREATE TABLE `geninfo` (
  `plant_id` int(11) NOT NULL,
  `scientific_name` varchar(45) NOT NULL,
  `common_name` varchar(45) NOT NULL,
  `p_order` varchar(45) NOT NULL,
  `family` varchar(45) NOT NULL,
  `pdescription` varchar(2500) NOT NULL,
  `photo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `geninfo`
--

INSERT INTO `geninfo` (`plant_id`, `scientific_name`, `common_name`, `p_order`, `family`, `pdescription`, `photo_id`) VALUES
(1, 'MUSA TEXTILIS', 'ABACA', 'ZINGIBERALES', 'MUSACEAE', 'the plant, native to the philippines, achieved importance as a source of cordage fibre in the 19th century.', NULL),
(3, 'ACACIA CONFUSA', 'SMALL PHILIPPINE ACACIA', 'FABALES', 'FABACEAE', 'Small tree; adult foliage of falcate phyllodes, juvenile and sucker-shoot foliage of bipinnate leaves; trunk up to 1m thick in very old trees.', NULL),
(43, 'Jasminum sambac', 'Sampaguita', 'Lamiales', 'Oleaceae', 'Growth Form	A woody climber or shrub, it has a erect or twining growth form and can grow up to 3m in height. Foliage	The leaves are arranged in opposite pairs. The leaves are shiny and broad-ovate in shape with conspicuous veins. Leaf tips are sharp.   Flowers	Extremely fragrant single flowers, borne in abundance. Flowers have rounded petals. Flowers appear at the tip.', 34),
(44, 'COCOS NUCIFERA', 'NIYOG', 'ARECALES', 'ARECACEAE', 'coconut palm, (Cocos nucifera), palm of the family Arecaceae, cultivated extensively in tropical areas for its edible fruit, the coconut. Coconut palms are found in tropical coastal areas nearly worldwide and probably originated somewhere in Indo-Malaya. They are the most economically important palm species, coconuts being one of the predominant crops of the tropics.', 35),
(45, 'Lilium Philippinense', 'Philippine Lily', 'Liliales', 'Liliaceae', 'The native range of this species is Taiwan to Philippines (NW. Luzon). It is a bulbous geophyte and grows primarily in the subtropical biome.', 36),
(46, 'Vanda Sanderiana', 'Waling Waling', 'Asparagales', 'Orchidaceae', '', 37);

--
-- Triggers `geninfo`
--
DELIMITER $$
CREATE TRIGGER `tr_delgeninfo` BEFORE DELETE ON `geninfo` FOR EACH ROW INSERT INTO geninfohist
VALUES (NULL, old.plant_id, old.scientific_name, old.common_name, old.p_order, old.family, old.pdescription, old.photo_id, USER(), CURRENT_TIMESTAMP(), 'Delete')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_insgeninfo` AFTER INSERT ON `geninfo` FOR EACH ROW INSERT INTO geninfohist
VALUES (NULL, new.plant_id, new.scientific_name, new.common_name, new.p_order, new.family, new.pdescription, new.photo_id, USER(), CURRENT_TIMESTAMP(), 'Insert')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_geninfoafter` AFTER UPDATE ON `geninfo` FOR EACH ROW INSERT INTO geninfohist
VALUES (NULL, new.plant_id, new.scientific_name, new.common_name, new.p_order, new.family, new.pdescription, new.photo_id, USER(), CURRENT_TIMESTAMP(), 'Update')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_updgeninfobefore` BEFORE UPDATE ON `geninfo` FOR EACH ROW INSERT INTO geninfohist
VALUES (NULL, old.plant_id, old.scientific_name, old.common_name, old.p_order, old.family, old.pdescription, old.photo_id, USER(), CURRENT_TIMESTAMP(), 'Update')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `geninfohist`
--

CREATE TABLE `geninfohist` (
  `planthist_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `scientific_name` varchar(45) NOT NULL,
  `common_name` varchar(45) NOT NULL,
  `p_order` varchar(45) NOT NULL,
  `family` varchar(2500) NOT NULL,
  `pdescription` varchar(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `editor` varchar(11) NOT NULL,
  `actions` varchar(10) NOT NULL,
  `date_changed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `geninfohist`
--

INSERT INTO `geninfohist` (`planthist_id`, `plant_id`, `scientific_name`, `common_name`, `p_order`, `family`, `pdescription`, `status`, `photo_id`, `editor`, `actions`, `date_changed`) VALUES
(3, 1, 'MUSA TEXTILIS', 'ABACA', 'ZINGIBERALES', 'MUSACEAE', 'The plant, ', '', 32, '', 'Update', NULL),
(4, 1, 'MUSA TEXTILIS', 'ABACA', 'ZINGIBERALES', 'MUSACEAE', 'The plant, ', '', 32, '', 'Update', NULL),
(5, 43, 'Jasminum sambac', 'Sampaguita', 'Lamiales', 'Oleaceae', 'Growth Form', '', 34, '', 'Insert', NULL),
(6, 44, 'Cocos Nucifera', 'Niyog', 'Arecales', 'Arecaceae', '', '', 35, '', 'Insert', NULL),
(7, 44, 'Cocos Nucifera', 'Niyog', 'Arecales', 'Arecaceae', '', '', 35, '', 'Update', NULL),
(8, 44, 'Cocos Nucifera', 'Niyog', 'Arecales', 'Arecaceae', '', '', 35, '', 'Update', NULL),
(9, 45, 'Lilium Philippinense', 'Philippine Lily', 'Liliales', 'Liliaceae', 'The native ', '', 36, '', 'Insert', NULL),
(10, 46, 'Vanda Sanderiana', 'Waling Waling', 'Asparagales', 'Orchidaceae', '', '', 37, '', 'Insert', NULL),
(11, 47, 'delete', 'delete', 'delete', 'delete', 'delete', '', 38, '', 'Insert', NULL),
(12, 47, 'delete', 'delete', 'delete', 'delete', 'delete', '', 38, '', 'Update', NULL),
(13, 47, 'delete', 'delete', 'delete', 'delete', 'delete', '', 38, '', 'Update', NULL),
(14, 47, 'UPDATE', 'DELETE', 'DELETE', 'DELETE', 'delete', '', 38, '', 'Update', NULL),
(15, 47, 'UPDATE', 'DELETE', 'DELETE', 'DELETE', 'delete', '', 38, '', 'Update', NULL),
(16, 48, 'testing', 'testing', 'testing', 'testing', 'testing', '', 39, '', 'Insert', NULL),
(17, 48, 'testing', 'testing', 'testing', 'testing', 'testing', '', 39, '', 'Update', NULL),
(18, 48, 'testing', 'testing', 'testing', 'testing', 'testing', '', 39, '', 'Update', NULL),
(19, 48, '123', 'TESTING', 'TESTING', 'TESTING', 'testing', '', 39, '', 'Delete', NULL),
(20, 47, 'DELETE', 'DELETE', 'DELETE', 'DELETE', 'delete', '', 38, '', 'Delete', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `geninfo_submitted`
--

CREATE TABLE `geninfo_submitted` (
  `plant_id` int(11) NOT NULL,
  `scientific_name` varchar(45) NOT NULL,
  `common_name` varchar(45) NOT NULL,
  `p_order` varchar(45) NOT NULL,
  `family` varchar(45) NOT NULL,
  `pdescription` varchar(2500) NOT NULL,
  `photo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `geninfo_submitted`
--

INSERT INTO `geninfo_submitted` (`plant_id`, `scientific_name`, `common_name`, `p_order`, `family`, `pdescription`, `photo_id`) VALUES
(8, 'testsn', 'testsn', 'testsn', 'testsn', 'testsn', 6),
(9, 'test123', 'test123', 'test123', 'test123', 'test123', 7),
(10, 'alelhykalbo', 'alelhykalbo', 'alelhykalbo', 'alelhykalbo', 'alelhykalbo', 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `geninfo_v`
-- (See below for the actual view)
--
CREATE TABLE `geninfo_v` (
`plant_id` int(11)
,`scientific_name` varchar(45)
,`common_name` varchar(45)
,`p_order` varchar(45)
,`family` varchar(45)
,`pdescription` varchar(2500)
,`photo_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `habitat`
--

CREATE TABLE `habitat` (
  `plant_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `habitat`
--

INSERT INTO `habitat` (`plant_id`, `place_id`) VALUES
(1, 5),
(44, 4),
(44, 9),
(44, 10),
(44, 11),
(45, 14),
(46, 9),
(46, 11);

-- --------------------------------------------------------

--
-- Table structure for table `habitat_submitted`
--

CREATE TABLE `habitat_submitted` (
  `plant_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `habitat_submitted`
--

INSERT INTO `habitat_submitted` (`plant_id`, `place_id`) VALUES
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `photo_id` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `title` varchar(50) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `photographer` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `date_taken` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`photo_id`, `photo`, `title`, `caption`, `photographer`, `publisher`, `date_taken`) VALUES
(34, 'https://www.gardenia.net/storage/app/public/uploads/images/detail/OPwgaaEZEa3kE2zkRa0SXIHUk3Qc9BPEzt3ohuIm.webp', '', '', '', 'gardenia.net', '1970-01-01'),
(35, 'https://www.britannica.com/plant/coconut-palm#/media/1/123794/256426', 'coconut palm', 'Coconut palm (Cocos nucifera) laden with coconuts.', '', 'Encyclopædia Britannica', '1970-01-01'),
(36, 'https://en.wikipedia.org/wiki/Lilium_philippinense#/media/File:LiliumPhillipinenseFlora6.jpg', 'Lilium phillipinense', '', 'Denis Barthel', '', '1970-01-01'),
(37, 'https://www.inaturalist.org/photos/58103660', '', '', 'anncabras24', 'iNaturalist', '1970-01-01'),
(38, 'delete', 'delete', 'delete', 'delete', 'delete', '2023-02-23'),
(39, 'testing', 'testing', 'testing', 'testing', 'testing', '2023-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `pictures_submitted`
--

CREATE TABLE `pictures_submitted` (
  `photo_id` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `title` varchar(50) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `photographer` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `date_taken` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures_submitted`
--

INSERT INTO `pictures_submitted` (`photo_id`, `photo`, `title`, `caption`, `photographer`, `publisher`, `date_taken`) VALUES
(6, 'testsn', 'testsn', 'testsn', 'testsn', 'testsn', '1970-01-01'),
(7, 'test123', 'test123', 'test123', 'test123', 'test123', '2023-02-23'),
(8, 'alelhykalbo', 'alelhykalbo', 'alelhykalbo', 'alelhykalbo', 'alelhykalbo', '2023-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `island_group` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `place_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `island_group`, `region`, `place_description`) VALUES
(1, 'Luzon', 'Ilocos Region', 'Region I'),
(2, 'Luzon', 'Cagayan Valley', 'Region II'),
(3, 'Luzon', 'Central Luzon', 'Region III'),
(4, 'Luzon', 'Calabarzon', 'Region IV-A'),
(5, 'Luzon', 'Bicol Region', 'Region V'),
(6, 'Luzon', 'Western Visayas', 'Region VI'),
(7, 'Visayas', 'Central Visayas', 'Region VII'),
(8, 'Visayas', 'Eastern Visayas', 'Region VIII'),
(9, 'Visayas', 'Zamboanga Peninsula', 'Region IX'),
(10, 'Mindanao', 'Northern Mindanao', 'Region X'),
(11, 'Mindanao', 'Davao Region', 'Region XI'),
(12, 'Mindanao', 'Soccsksargen', 'Region XII'),
(13, 'Luzon', 'National Capital Region', 'NCR'),
(14, 'Luzon', 'Cordillera Administrative Region', 'CAR'),
(16, 'Mindanao', 'Caraga', 'Region XIII'),
(17, 'Luzon', 'Southwestern Tagalog Region', 'Mimaropa'),
(19, 'Mindanao', 'Bangsamoro', 'BARMM');

-- --------------------------------------------------------

--
-- Stand-in structure for view `plantcontributors`
-- (See below for the actual view)
--
CREATE TABLE `plantcontributors` (
`contributor` varchar(11)
,`contribution_date` date
,`plant_id` int(11)
,`scientific_name` varchar(45)
,`common_name` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `plantcontributorsreferences`
-- (See below for the actual view)
--
CREATE TABLE `plantcontributorsreferences` (
`contributor` varchar(11)
,`contribution_date` date
,`plant_id` int(11)
,`scientific_name` varchar(45)
,`common_name` varchar(45)
,`source` varchar(45)
,`link` varchar(2500)
);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` varchar(45) NOT NULL,
  `passwordreg` varchar(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `address` varchar(250) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_type` varchar(3) NOT NULL,
  `type_description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `passwordreg`, `name`, `gender`, `address`, `birth_date`, `age`, `contact_number`, `email`, `account_type`, `type_description`) VALUES
('jhannex420', 'antant', 'Anthony Olasiman', 'M', ' 4/F S M Megamall Building B Edsa 1550, Mandaluyong City', '2002-04-26', 20, '09215545064', 'anthonyolasiman@gmailcom', 'ADM', 'Administrator'),
('kristine123', 'marktine', 'Kristine Castilla', 'F', 'Roosevelt St., 5002 Sta. Barbara,  Iloilo', '2001-03-02', 20, '09215547398', 'betweenkristinecastillo@gmail.com', 'ADM', 'Administrator'),
('lorz', '123', 'Lorenzo Salvador', 'M', 'Jalandoni Building, Manila, Metro Manila', '1988-02-19', 35, '09215545036', 'lorz@gmail.com', 'USR', 'User'),
('migzdino', 'dino', 'Lorenzo Boyles', 'M', 'Unit V MCM Building, National Highway, Old Bulihan, Silang', '2002-02-27', 20, '09215545074', 'lorenzolovesdinos@gmail.com', 'USR', 'User'),
('owenanicas', '123', 'Owen Elexis', 'M', '10 Duhat st., Resettlement Area, Brgy. Kalawaan, Pasig City', '2002-02-27', 20, '09215545074', 'owenelexis0327@gmail.com', 'ADM', 'Administrator'),
('paupaula', 'uapuap', 'Paula Evangelista', 'F', 'Francisco de Castro, General Mariano Alvarez', '2000-04-22', 20, '09213445064', 'paupaula@gmail.com', 'ADM', 'Administrator'),
('Test User', 'test', 'user', 'F', 'The Mended Blade', '2023-02-22', 35, '09215545036', 'testuser@gmail.com', 'USR', 'User');

-- --------------------------------------------------------

--
-- Structure for view `geninfo_v`
--
DROP TABLE IF EXISTS `geninfo_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `geninfo_v`  AS SELECT `geninfo`.`plant_id` AS `plant_id`, `geninfo`.`scientific_name` AS `scientific_name`, `geninfo`.`common_name` AS `common_name`, `geninfo`.`p_order` AS `p_order`, `geninfo`.`family` AS `family`, `geninfo`.`pdescription` AS `pdescription`, `geninfo`.`photo_id` AS `photo_id` FROM `geninfo``geninfo`  ;

-- --------------------------------------------------------

--
-- Structure for view `plantcontributors`
--
DROP TABLE IF EXISTS `plantcontributors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `plantcontributors`  AS SELECT `c`.`contributor` AS `contributor`, `c`.`contribution_date` AS `contribution_date`, `c`.`plant_id` AS `plant_id`, `g`.`scientific_name` AS `scientific_name`, `g`.`common_name` AS `common_name` FROM (`contribution` `c` join `geninfo` `g` on(`c`.`plant_id` = `g`.`plant_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `plantcontributorsreferences`
--
DROP TABLE IF EXISTS `plantcontributorsreferences`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `plantcontributorsreferences`  AS SELECT `c`.`contributor` AS `contributor`, `c`.`contribution_date` AS `contribution_date`, `c`.`plant_id` AS `plant_id`, `g`.`scientific_name` AS `scientific_name`, `g`.`common_name` AS `common_name`, `r`.`source` AS `source`, `r`.`link` AS `link` FROM ((`contribution` `c` join `geninfo` `g` on(`c`.`plant_id` = `g`.`plant_id`)) join `contrib_references` `r` on(`c`.`contribution_id` = `r`.`contribution_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`contribution_id`,`plant_id`),
  ADD KEY `plantidcontributiongeninfo` (`plant_id`),
  ADD KEY `contributorcontributionregister` (`contributor`);

--
-- Indexes for table `contribution_submitted`
--
ALTER TABLE `contribution_submitted`
  ADD PRIMARY KEY (`contribution_id`,`plant_id`),
  ADD KEY `plantidcontributiongeninfo-sub` (`plant_id`),
  ADD KEY `contributorcontributionregister-sub` (`contributor`);

--
-- Indexes for table `contrib_references`
--
ALTER TABLE `contrib_references`
  ADD PRIMARY KEY (`references_id`),
  ADD KEY `contributionidreferencescontribution` (`contribution_id`);

--
-- Indexes for table `contrib_references_submitted`
--
ALTER TABLE `contrib_references_submitted`
  ADD PRIMARY KEY (`references_id`),
  ADD KEY `contributionidreferencescontribution-sub` (`contribution_id`);

--
-- Indexes for table `geninfo`
--
ALTER TABLE `geninfo`
  ADD PRIMARY KEY (`plant_id`),
  ADD KEY `photoidgeninfopictures` (`photo_id`);

--
-- Indexes for table `geninfohist`
--
ALTER TABLE `geninfohist`
  ADD PRIMARY KEY (`planthist_id`);

--
-- Indexes for table `geninfo_submitted`
--
ALTER TABLE `geninfo_submitted`
  ADD PRIMARY KEY (`plant_id`),
  ADD KEY `photoidgeninfopictures-sub` (`photo_id`);

--
-- Indexes for table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`plant_id`,`place_id`),
  ADD KEY `placeidhabitatplace` (`place_id`);

--
-- Indexes for table `habitat_submitted`
--
ALTER TABLE `habitat_submitted`
  ADD KEY `plantidhabitatgeninfo-sub` (`plant_id`),
  ADD KEY `placeidhabitatplace-sub` (`place_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `pictures_submitted`
--
ALTER TABLE `pictures_submitted`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `contribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `contribution_submitted`
--
ALTER TABLE `contribution_submitted`
  MODIFY `contribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contrib_references`
--
ALTER TABLE `contrib_references`
  MODIFY `references_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contrib_references_submitted`
--
ALTER TABLE `contrib_references_submitted`
  MODIFY `references_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `geninfo`
--
ALTER TABLE `geninfo`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `geninfohist`
--
ALTER TABLE `geninfohist`
  MODIFY `planthist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `geninfo_submitted`
--
ALTER TABLE `geninfo_submitted`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pictures_submitted`
--
ALTER TABLE `pictures_submitted`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contribution`
--
ALTER TABLE `contribution`
  ADD CONSTRAINT `contributorcontributionregister` FOREIGN KEY (`contributor`) REFERENCES `register` (`register_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantidcontributiongeninfo` FOREIGN KEY (`plant_id`) REFERENCES `geninfo` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contribution_submitted`
--
ALTER TABLE `contribution_submitted`
  ADD CONSTRAINT `contributorcontributionregister-sub` FOREIGN KEY (`contributor`) REFERENCES `register` (`register_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantidcontributiongeninfo-sub` FOREIGN KEY (`plant_id`) REFERENCES `geninfo_submitted` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contrib_references`
--
ALTER TABLE `contrib_references`
  ADD CONSTRAINT `contributionidreferencescontribution` FOREIGN KEY (`contribution_id`) REFERENCES `contribution` (`contribution_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contrib_references_submitted`
--
ALTER TABLE `contrib_references_submitted`
  ADD CONSTRAINT `contributionidreferencescontribution-sub` FOREIGN KEY (`contribution_id`) REFERENCES `contribution_submitted` (`contribution_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `geninfo`
--
ALTER TABLE `geninfo`
  ADD CONSTRAINT `photoidgeninfopictures` FOREIGN KEY (`photo_id`) REFERENCES `pictures` (`photo_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `geninfo_submitted`
--
ALTER TABLE `geninfo_submitted`
  ADD CONSTRAINT `photoidgeninfopictures-sub` FOREIGN KEY (`photo_id`) REFERENCES `pictures_submitted` (`photo_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `habitat`
--
ALTER TABLE `habitat`
  ADD CONSTRAINT `placeidhabitatplace` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantidhabitatgeninfo` FOREIGN KEY (`plant_id`) REFERENCES `geninfo` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `habitat_submitted`
--
ALTER TABLE `habitat_submitted`
  ADD CONSTRAINT `placeidhabitatplace-sub` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantidhabitatgeninfo-sub` FOREIGN KEY (`plant_id`) REFERENCES `geninfo_submitted` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
