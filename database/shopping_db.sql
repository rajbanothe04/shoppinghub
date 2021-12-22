-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2021 at 03:57 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE IF NOT EXISTS `attribute` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `att_name` varchar(100) NOT NULL,
  `att_type` varchar(50) NOT NULL,
  `att_values` varchar(255) DEFAULT NULL,
  `att_fieldsize` varchar(50) DEFAULT NULL,
  `att_custprice` varchar(50) DEFAULT NULL,
  `mandatory` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`att_id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`att_id`, `att_name`, `att_type`, `att_values`, `att_fieldsize`, `att_custprice`, `mandatory`) VALUES
(15, 'Choose Editing Type', 'radio_type', 'Black & White, color', '', '', 'Yes'),
(14, 'Customize Service', 'rate_change', 'Please Select,1,2,3,4,5,6,7,8,9,10', '', '', 'No'),
(29, 'Additional Information', 'free_text', '', '2', '', 'No'),
(12, 'Type of Shoot', 'predefined_values', 'Please Select,Wedding/Event,Portrait,Commercial,Stock,Real Estate', '', '', 'Yes'),
(11, 'Order Name', 'single_line_free_text', '', '', '', 'Yes'),
(17, 'White Balance', 'predefined_values', 'Neural,Cool,Warm', '', '', 'Yes'),
(18, 'Would you like Photographer Editor', 'radio_type', 'Yes,No', '', '', 'No'),
(19, 'Number of Images to be Uploaded', 'predefined_values', '1,2,3,4,5,6,7,8,9,10', '', '', 'No'),
(20, 'Include Color-correction?', 'predefined_values', 'No color correction, Color correct all the images to the following Editing style.', '', '', 'No'),
(21, 'Number of images to be submitted', 'single_line_free_text', '', '', '', 'Yes'),
(22, 'What editing style would you like applied to this order? ', 'predefined_values', 'PE Standard, PE FIlm,PE Dark & Moody, PE Light & Airy,PE Warm Creamy,Custom', '', '', 'Yes'),
(23, 'Describe the work to be done, per image:', 'single_line_free_text', '', '', '', 'No'),
(24, 'Return file format  ', 'predefined_values', 'Download Flattened JPGs,Download Layered PSDs', '', '', 'Yes'),
(25, 'Gallery Upload Details ', 'single_line_free_text', '', '', '', 'No'),
(26, 'Pre-approved amount (Optional)', 'single_line_free_text', '', '', '', 'No'),
(27, 'Discount Details', 'predefined_values', '', '', '', 'No'),
(28, 'Code', 'single_line_free_text', '', '', '', 'No'),
(13, 'Choose Filter', 'checkbox_type', 'Blemish Removal,Skin Smoothing,Flyaway Hairs (across face, 2 people max),Braces Removal,Eyeglass Glare Removal,Skin Smoothing (body, including face),Background Swap (include support image for sky),Face/Head Swap (2 people max)', '', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card` varchar(50) NOT NULL,
  `cvv` int(11) NOT NULL,
  `card_number` int(11) NOT NULL,
  `exp_month` int(2) NOT NULL,
  `exp_year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1216 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `cityname`, `state_id`) VALUES
(1, 'Mumbai', 1),
(2, 'Delhi', 2),
(3, 'Bengaluru', 3),
(4, 'Ahmedabad', 4),
(5, 'Hyderabad', 5),
(6, 'Chennai', 6),
(7, 'Kolkata', 7),
(8, 'Pune', 1),
(9, 'Jaipur', 8),
(10, 'Surat', 4),
(11, 'Lucknow', 9),
(12, 'Kanpur', 9),
(13, 'Nagpur', 1),
(14, 'Patna', 10),
(15, 'Indore', 11),
(16, 'Thane', 1),
(17, 'Bhopal', 11),
(18, 'Visakhapatnam', 12),
(19, 'Vadodara', 4),
(20, 'Firozabad', 9),
(21, 'Ludhiana', 13),
(22, 'Rajkot', 4),
(23, 'Agra', 9),
(24, 'Siliguri', 7),
(25, 'Nashik', 1),
(26, 'Faridabad', 14),
(27, 'Patiala', 13),
(28, 'Meerut', 9),
(29, 'Kalyan-Dombivali', 1),
(30, 'Vasai-Virar', 1),
(31, 'Varanasi', 9),
(32, 'Srinagar', 15),
(33, 'Dhanbad', 16),
(34, 'Jodhpur', 8),
(35, 'Amritsar', 13),
(36, 'Raipur', 17),
(37, 'Allahabad', 9),
(38, 'Coimbatore', 6),
(39, 'Jabalpur', 11),
(40, 'Gwalior', 11),
(41, 'Vijayawada', 12),
(42, 'Madurai', 6),
(43, 'Guwahati', 18),
(44, 'Chandigarh', 19),
(45, 'Hubli-Dharwad', 3),
(46, 'Amroha', 9),
(47, 'Moradabad', 9),
(48, 'Gurgaon', 14),
(49, 'Aligarh', 9),
(50, 'Solapur', 1),
(51, 'Ranchi', 16),
(52, 'Jalandhar', 13),
(53, 'Tiruchirappalli', 6),
(54, 'Bhubaneswar', 20),
(55, 'Salem', 6),
(56, 'Warangal', 5),
(57, 'Mira-Bhayandar', 1),
(58, 'Thiruvananthapuram', 21),
(59, 'Bhiwandi', 1),
(60, 'Saharanpur', 9),
(61, 'Guntur', 12),
(62, 'Amravati', 1),
(63, 'Bikaner', 8),
(64, 'Noida', 9),
(65, 'Jamshedpur', 16),
(66, 'Bhilai Nagar', 17),
(67, 'Cuttack', 20),
(68, 'Kochi', 21),
(69, 'Udaipur', 8),
(70, 'Bhavnagar', 4),
(71, 'Dehradun', 22),
(72, 'Asansol', 7),
(73, 'Nanded-Waghala', 1),
(74, 'Ajmer', 8),
(75, 'Jamnagar', 4),
(76, 'Ujjain', 11),
(77, 'Sangli', 1),
(78, 'Loni', 9),
(79, 'Jhansi', 9),
(80, 'Pondicherry', 23),
(81, 'Nellore', 12),
(82, 'Jammu', 15),
(83, 'Belagavi', 3),
(84, 'Raurkela', 20),
(85, 'Mangaluru', 3),
(86, 'Tirunelveli', 6),
(87, 'Malegaon', 1),
(88, 'Gaya', 10),
(89, 'Tiruppur', 6),
(90, 'Davanagere', 3),
(91, 'Kozhikode', 21),
(92, 'Akola', 1),
(93, 'Kurnool', 12),
(94, 'Bokaro Steel City', 16),
(95, 'Rajahmundry', 12),
(96, 'Ballari', 3),
(97, 'Agartala', 24),
(98, 'Bhagalpur', 10),
(99, 'Latur', 1),
(100, 'Dhule', 1),
(101, 'Korba', 17),
(102, 'Bhilwara', 8),
(103, 'Brahmapur', 20),
(104, 'Mysore', 25),
(105, 'Muzaffarpur', 10),
(106, 'Ahmednagar', 1),
(107, 'Kollam', 21),
(108, 'Raghunathganj', 7),
(109, 'Bilaspur', 17),
(110, 'Shahjahanpur', 9),
(111, 'Thrissur', 21),
(112, 'Alwar', 8),
(113, 'Kakinada', 12),
(114, 'Nizamabad', 5),
(115, 'Sagar', 11),
(116, 'Tumkur', 3),
(117, 'Hisar', 14),
(118, 'Rohtak', 14),
(119, 'Panipat', 14),
(120, 'Darbhanga', 10),
(121, 'Kharagpur', 7),
(122, 'Aizawl', 26),
(123, 'Ichalkaranji', 1),
(124, 'Tirupati', 12),
(125, 'Karnal', 14),
(126, 'Bathinda', 13),
(127, 'Rampur', 9),
(128, 'Shivamogga', 3),
(129, 'Ratlam', 11),
(130, 'Modinagar', 9),
(131, 'Durg', 17),
(132, 'Shillong', 27),
(133, 'Imphal', 28),
(134, 'Hapur', 9),
(135, 'Ranipet', 6),
(136, 'Anantapur', 12),
(137, 'Arrah', 10),
(138, 'Karimnagar', 5),
(139, 'Parbhani', 1),
(140, 'Etawah', 9),
(141, 'Bharatpur', 8),
(142, 'Begusarai', 10),
(143, 'New Delhi', 2),
(144, 'Chhapra', 10),
(145, 'Kadapa', 12),
(146, 'Ramagundam', 5),
(147, 'Pali', 8),
(148, 'Satna', 11),
(149, 'Vizianagaram', 12),
(150, 'Katihar', 10),
(151, 'Hardwar', 22),
(152, 'Sonipat', 14),
(153, 'Nagercoil', 6),
(154, 'Thanjavur', 6),
(155, 'Murwara (Katni)', 11),
(156, 'Naihati', 7),
(157, 'Sambhal', 9),
(158, 'Nadiad', 4),
(159, 'Yamunanagar', 14),
(160, 'English Bazar', 7),
(161, 'Eluru', 12),
(162, 'Munger', 10),
(163, 'Panchkula', 14),
(164, 'Raayachuru', 3),
(165, 'Panvel', 1),
(166, 'Deoghar', 16),
(167, 'Ongole', 12),
(168, 'Nandyal', 12),
(169, 'Morena', 11),
(170, 'Bhiwani', 14),
(171, 'Porbandar', 4),
(172, 'Palakkad', 21),
(173, 'Anand', 4),
(174, 'Purnia', 10),
(175, 'Baharampur', 7),
(176, 'Barmer', 8),
(177, 'Morvi', 4),
(178, 'Orai', 9),
(179, 'Bahraich', 9),
(180, 'Sikar', 8),
(181, 'Vellore', 6),
(182, 'Singrauli', 11),
(183, 'Khammam', 5),
(184, 'Mahesana', 4),
(185, 'Silchar', 18),
(186, 'Sambalpur', 20),
(187, 'Rewa', 11),
(188, 'Unnao', 9),
(189, 'Hugli-Chinsurah', 7),
(190, 'Raiganj', 7),
(191, 'Phusro', 16),
(192, 'Adityapur', 16),
(193, 'Alappuzha', 21),
(194, 'Bahadurgarh', 14),
(195, 'Machilipatnam', 12),
(196, 'Rae Bareli', 9),
(197, 'Jalpaiguri', 7),
(198, 'Bharuch', 4),
(199, 'Pathankot', 13),
(200, 'Hoshiarpur', 13),
(201, 'Baramula', 15),
(202, 'Adoni', 12),
(203, 'Jind', 14),
(204, 'Tonk', 8),
(205, 'Tenali', 12),
(206, 'Kancheepuram', 6),
(207, 'Vapi', 4),
(208, 'Sirsa', 14),
(209, 'Navsari', 4),
(210, 'Mahbubnagar', 5),
(211, 'Puri', 20),
(212, 'Robertson Pet', 3),
(213, 'Erode', 6),
(214, 'Batala', 13),
(215, 'Haldwani-cum-Kathgodam', 22),
(216, 'Vidisha', 11),
(217, 'Saharsa', 10),
(218, 'Thanesar', 14),
(219, 'Chittoor', 12),
(220, 'Veraval', 4),
(221, 'Lakhimpur', 9),
(222, 'Sitapur', 9),
(223, 'Hindupur', 12),
(224, 'Santipur', 7),
(225, 'Balurghat', 7),
(226, 'Ganjbasoda', 11),
(227, 'Moga', 13),
(228, 'Proddatur', 12),
(229, 'Srinagar', 22),
(230, 'Medinipur', 7),
(231, 'Habra', 7),
(232, 'Sasaram', 10),
(233, 'Hajipur', 10),
(234, 'Bhuj', 4),
(235, 'Shivpuri', 11),
(236, 'Ranaghat', 7),
(237, 'Shimla', 29),
(238, 'Tiruvannamalai', 6),
(239, 'Kaithal', 14),
(240, 'Rajnandgaon', 17),
(241, 'Godhra', 4),
(242, 'Hazaribag', 16),
(243, 'Bhimavaram', 12),
(244, 'Mandsaur', 11),
(245, 'Dibrugarh', 18),
(246, 'Kolar', 3),
(247, 'Bankura', 7),
(248, 'Mandya', 3),
(249, 'Dehri-on-Sone', 10),
(250, 'Madanapalle', 12),
(251, 'Malerkotla', 13),
(252, 'Lalitpur', 9),
(253, 'Bettiah', 10),
(254, 'Pollachi', 6),
(255, 'Khanna', 13),
(256, 'Neemuch', 11),
(257, 'Palwal', 14),
(258, 'Palanpur', 4),
(259, 'Guntakal', 12),
(260, 'Nabadwip', 7),
(261, 'Udupi', 3),
(262, 'Jagdalpur', 17),
(263, 'Motihari', 10),
(264, 'Pilibhit', 9),
(265, 'Dimapur', 30),
(266, 'Mohali', 13),
(267, 'Sadulpur', 8),
(268, 'Rajapalayam', 6),
(269, 'Dharmavaram', 12),
(270, 'Kashipur', 22),
(271, 'Sivakasi', 6),
(272, 'Darjiling', 7),
(273, 'Chikkamagaluru', 3),
(274, 'Gudivada', 12),
(275, 'Baleshwar Town', 20),
(276, 'Mancherial', 5),
(277, 'Srikakulam', 12),
(278, 'Adilabad', 5),
(279, 'Yavatmal', 1),
(280, 'Barnala', 13),
(281, 'Nagaon', 18),
(282, 'Narasaraopet', 12),
(283, 'Raigarh', 17),
(284, 'Roorkee', 22),
(285, 'Valsad', 4),
(286, 'Ambikapur', 17),
(287, 'Giridih', 16),
(288, 'Chandausi', 9),
(289, 'Purulia', 7),
(290, 'Patan', 4),
(291, 'Bagaha', 10),
(292, 'Hardoi ', 9),
(293, 'Achalpur', 1),
(294, 'Osmanabad', 1),
(295, 'Deesa', 4),
(296, 'Nandurbar', 1),
(297, 'Azamgarh', 9),
(298, 'Ramgarh', 16),
(299, 'Firozpur', 13),
(300, 'Baripada Town', 20),
(301, 'Karwar', 3),
(302, 'Siwan', 10),
(303, 'Rajampet', 12),
(304, 'Pudukkottai', 6),
(305, 'Anantnag', 15),
(306, 'Tadpatri', 12),
(307, 'Satara', 1),
(308, 'Bhadrak', 20),
(309, 'Kishanganj', 10),
(310, 'Suryapet', 5),
(311, 'Wardha', 1),
(312, 'Ranebennuru', 3),
(313, 'Amreli', 4),
(314, 'Neyveli (TS)', 6),
(315, 'Jamalpur', 10),
(316, 'Marmagao', 31),
(317, 'Udgir', 1),
(318, 'Tadepalligudem', 12),
(319, 'Nagapattinam', 6),
(320, 'Buxar', 10),
(321, 'Aurangabad', 1),
(322, 'Jehanabad', 10),
(323, 'Phagwara', 13),
(324, 'Khair', 9),
(325, 'Sawai Madhopur', 8),
(326, 'Kapurthala', 13),
(327, 'Chilakaluripet', 12),
(328, 'Aurangabad', 10),
(329, 'Malappuram', 21),
(330, 'Rewari', 14),
(331, 'Nagaur', 8),
(332, 'Sultanpur', 9),
(333, 'Nagda', 11),
(334, 'Port Blair', 32),
(335, 'Lakhisarai', 10),
(336, 'Panaji', 31),
(337, 'Tinsukia', 18),
(338, 'Itarsi', 11),
(339, 'Kohima', 30),
(340, 'Balangir', 20),
(341, 'Nawada', 10),
(342, 'Jharsuguda', 20),
(343, 'Jagtial', 5),
(344, 'Viluppuram', 6),
(345, 'Amalner', 1),
(346, 'Zirakpur', 13),
(347, 'Tanda', 9),
(348, 'Tiruchengode', 6),
(349, 'Nagina', 9),
(350, 'Yemmiganur', 12),
(351, 'Vaniyambadi', 6),
(352, 'Sarni', 11),
(353, 'Theni Allinagaram', 6),
(354, 'Margao', 31),
(355, 'Akot', 1),
(356, 'Sehore', 11),
(357, 'Mhow Cantonment', 11),
(358, 'Kot Kapura', 13),
(359, 'Makrana', 8),
(360, 'Pandharpur', 1),
(361, 'Miryalaguda', 5),
(362, 'Shamli', 9),
(363, 'Seoni', 11),
(364, 'Ranibennur', 3),
(365, 'Kadiri', 12),
(366, 'Shrirampur', 1),
(367, 'Rudrapur', 22),
(368, 'Parli', 1),
(369, 'Najibabad', 9),
(370, 'Nirmal', 5),
(371, 'Udhagamandalam', 6),
(372, 'Shikohabad', 9),
(373, 'Jhumri Tilaiya', 16),
(374, 'Aruppukkottai', 6),
(375, 'Ponnani', 21),
(376, 'Jamui', 10),
(377, 'Sitamarhi', 10),
(378, 'Chirala', 12),
(379, 'Anjar', 4),
(380, 'Karaikal', 23),
(381, 'Hansi', 14),
(382, 'Anakapalle', 12),
(383, 'Mahasamund', 17),
(384, 'Faridkot', 13),
(385, 'Saunda', 16),
(386, 'Dhoraji', 4),
(387, 'Paramakudi', 6),
(388, 'Balaghat', 11),
(389, 'Sujangarh', 8),
(390, 'Khambhat', 4),
(391, 'Muktsar', 13),
(392, 'Rajpura', 13),
(393, 'Kavali', 12),
(394, 'Dhamtari', 17),
(395, 'Ashok Nagar', 11),
(396, 'Sardarshahar', 8),
(397, 'Mahuva', 4),
(398, 'Bargarh', 20),
(399, 'Kamareddy', 5),
(400, 'Sahibganj', 16),
(401, 'Kothagudem', 5),
(402, 'Ramanagaram', 3),
(403, 'Gokak', 3),
(404, 'Tikamgarh', 11),
(405, 'Araria', 10),
(406, 'Rishikesh', 22),
(407, 'Shahdol', 11),
(408, 'Medininagar (Daltonganj)', 16),
(409, 'Arakkonam', 6),
(410, 'Washim', 1),
(411, 'Sangrur', 13),
(412, 'Bodhan', 5),
(413, 'Fazilka', 13),
(414, 'Palacole', 12),
(415, 'Keshod', 4),
(416, 'Sullurpeta', 12),
(417, 'Wadhwan', 4),
(418, 'Gurdaspur', 13),
(419, 'Vatakara', 21),
(420, 'Tura', 27),
(421, 'Narnaul', 14),
(422, 'Kharar', 13),
(423, 'Yadgir', 3),
(424, 'Ambejogai', 1),
(425, 'Ankleshwar', 4),
(426, 'Savarkundla', 4),
(427, 'Paradip', 20),
(428, 'Virudhachalam', 6),
(429, 'Kanhangad', 21),
(430, 'Kadi', 4),
(431, 'Srivilliputhur', 6),
(432, 'Gobindgarh', 13),
(433, 'Tindivanam', 6),
(434, 'Mansa', 13),
(435, 'Taliparamba', 21),
(436, 'Manmad', 1),
(437, 'Tanuku', 12),
(438, 'Rayachoti', 12),
(439, 'Virudhunagar', 6),
(440, 'Koyilandy', 21),
(441, 'Jorhat', 18),
(442, 'Karur', 6),
(443, 'Valparai', 6),
(444, 'Srikalahasti', 12),
(445, 'Neyyattinkara', 21),
(446, 'Bapatla', 12),
(447, 'Fatehabad', 14),
(448, 'Malout', 13),
(449, 'Sankarankovil', 6),
(450, 'Tenkasi', 6),
(451, 'Ratnagiri', 1),
(452, 'Rabkavi Banhatti', 3),
(453, 'Sikandrabad', 9),
(454, 'Chaibasa', 16),
(455, 'Chirmiri', 17),
(456, 'Palwancha', 5),
(457, 'Bhawanipatna', 20),
(458, 'Kayamkulam', 21),
(459, 'Pithampur', 11),
(460, 'Nabha', 13),
(461, 'Shahabad, Hardoi', 9),
(462, 'Dhenkanal', 20),
(463, 'Uran Islampur', 1),
(464, 'Gopalganj', 10),
(465, 'Bongaigaon City', 18),
(466, 'Palani', 6),
(467, 'Pusad', 1),
(468, 'Sopore', 15),
(469, 'Pilkhuwa', 9),
(470, 'Tarn Taran', 13),
(471, 'Renukoot', 9),
(472, 'Mandamarri', 5),
(473, 'Shahabad', 3),
(474, 'Barbil', 20),
(475, 'Koratla', 5),
(476, 'Madhubani', 10),
(477, 'Arambagh', 7),
(478, 'Gohana', 14),
(479, 'Ladnu', 8),
(480, 'Pattukkottai', 6),
(481, 'Sirsi', 3),
(482, 'Sircilla', 5),
(483, 'Tamluk', 7),
(484, 'Jagraon', 13),
(485, 'AlipurdUrban Agglomerationr', 7),
(486, 'Alirajpur', 11),
(487, 'Tandur', 5),
(488, 'Naidupet', 12),
(489, 'Tirupathur', 6),
(490, 'Tohana', 14),
(491, 'Ratangarh', 8),
(492, 'Dhubri', 18),
(493, 'Masaurhi', 10),
(494, 'Visnagar', 4),
(495, 'Vrindavan', 9),
(496, 'Nokha', 8),
(497, 'Nagari', 12),
(498, 'Narwana', 14),
(499, 'Ramanathapuram', 6),
(500, 'Ujhani', 9),
(501, 'Samastipur', 10),
(502, 'Laharpur', 9),
(503, 'Sangamner', 1),
(504, 'Nimbahera', 8),
(505, 'Siddipet', 5),
(506, 'Suri', 7),
(507, 'Diphu', 18),
(508, 'Jhargram', 7),
(509, 'Shirpur-Warwade', 1),
(510, 'Tilhar', 9),
(511, 'Sindhnur', 3),
(512, 'Udumalaipettai', 6),
(513, 'Malkapur', 1),
(514, 'Wanaparthy', 5),
(515, 'Gudur', 12),
(516, 'Kendujhar', 20),
(517, 'Mandla', 11),
(518, 'Mandi', 29),
(519, 'Nedumangad', 21),
(520, 'North Lakhimpur', 18),
(521, 'Vinukonda', 12),
(522, 'Tiptur', 3),
(523, 'Gobichettipalayam', 6),
(524, 'Sunabeda', 20),
(525, 'Wani', 1),
(526, 'Upleta', 4),
(527, 'Narasapuram', 12),
(528, 'Nuzvid', 12),
(529, 'Tezpur', 18),
(530, 'Una', 4),
(531, 'Markapur', 12),
(532, 'Sheopur', 11),
(533, 'Thiruvarur', 6),
(534, 'Sidhpur', 4),
(535, 'Sahaswan', 9),
(536, 'Suratgarh', 8),
(537, 'Shajapur', 11),
(538, 'Rayagada', 20),
(539, 'Lonavla', 1),
(540, 'Ponnur', 12),
(541, 'Kagaznagar', 5),
(542, 'Gadwal', 5),
(543, 'Bhatapara', 17),
(544, 'Kandukur', 12),
(545, 'Sangareddy', 5),
(546, 'Unjha', 4),
(547, 'Lunglei', 26),
(548, 'Karimganj', 18),
(549, 'Kannur', 21),
(550, 'Bobbili', 12),
(551, 'Mokameh', 10),
(552, 'Talegaon Dabhade', 1),
(553, 'Anjangaon', 1),
(554, 'Mangrol', 4),
(555, 'Sunam', 13),
(556, 'Gangarampur', 7),
(557, 'Thiruvallur', 6),
(558, 'Tirur', 21),
(559, 'Rath', 9),
(560, 'Jatani', 20),
(561, 'Viramgam', 4),
(562, 'Rajsamand', 8),
(563, 'Yanam', 23),
(564, 'Kottayam', 21),
(565, 'Panruti', 6),
(566, 'Dhuri', 13),
(567, 'Namakkal', 6),
(568, 'Kasaragod', 21),
(569, 'Modasa', 4),
(570, 'Rayadurg', 12),
(571, 'Supaul', 10),
(572, 'Kunnamkulam', 21),
(573, 'Umred', 1),
(574, 'Bellampalle', 5),
(575, 'Sibsagar', 18),
(576, 'Mandi Dabwali', 14),
(577, 'Ottappalam', 21),
(578, 'Dumraon', 10),
(579, 'Samalkot', 12),
(580, 'Jaggaiahpet', 12),
(581, 'Goalpara', 18),
(582, 'Tuni', 12),
(583, 'Lachhmangarh', 8),
(584, 'Bhongir', 5),
(585, 'Amalapuram', 12),
(586, 'Firozpur Cantt.', 13),
(587, 'Vikarabad', 5),
(588, 'Thiruvalla', 21),
(589, 'Sherkot', 9),
(590, 'Palghar', 1),
(591, 'Shegaon', 1),
(592, 'Jangaon', 5),
(593, 'Bheemunipatnam', 12),
(594, 'Panna', 11),
(595, 'Thodupuzha', 21),
(596, 'KathUrban Agglomeration', 15),
(597, 'Palitana', 4),
(598, 'Arwal', 10),
(599, 'Venkatagiri', 12),
(600, 'Kalpi', 9),
(601, 'Rajgarh (Churu)', 8),
(602, 'Sattenapalle', 12),
(603, 'Arsikere', 3),
(604, 'Ozar', 1),
(605, 'Thirumangalam', 6),
(606, 'Petlad', 4),
(607, 'Nasirabad', 8),
(608, 'Phaltan', 1),
(609, 'Rampurhat', 7),
(610, 'Nanjangud', 3),
(611, 'Forbesganj', 10),
(612, 'Tundla', 9),
(613, 'BhabUrban Agglomeration', 10),
(614, 'Sagara', 3),
(615, 'Pithapuram', 12),
(616, 'Sira', 3),
(617, 'Bhadrachalam', 5),
(618, 'Charkhi Dadri', 14),
(619, 'Chatra', 16),
(620, 'Palasa Kasibugga', 12),
(621, 'Nohar', 8),
(622, 'Yevla', 1),
(623, 'Sirhind Fatehgarh Sahib', 13),
(624, 'Bhainsa', 5),
(625, 'Parvathipuram', 12),
(626, 'Shahade', 1),
(627, 'Chalakudy', 21),
(628, 'Narkatiaganj', 10),
(629, 'Kapadvanj', 4),
(630, 'Macherla', 12),
(631, 'Raghogarh-Vijaypur', 11),
(632, 'Rupnagar', 13),
(633, 'Naugachhia', 10),
(634, 'Sendhwa', 11),
(635, 'Byasanagar', 20),
(636, 'Sandila', 9),
(637, 'Gooty', 12),
(638, 'Salur', 12),
(639, 'Nanpara', 9),
(640, 'Sardhana', 9),
(641, 'Vita', 1),
(642, 'Gumia', 16),
(643, 'Puttur', 3),
(644, 'Jalandhar Cantt.', 13),
(645, 'Nehtaur', 9),
(646, 'Changanassery', 21),
(647, 'Mandapeta', 12),
(648, 'Dumka', 16),
(649, 'Seohara', 9),
(650, 'Umarkhed', 1),
(651, 'Madhupur', 16),
(652, 'Vikramasingapuram', 6),
(653, 'Punalur', 21),
(654, 'Kendrapara', 20),
(655, 'Sihor', 4),
(656, 'Nellikuppam', 6),
(657, 'Samana', 13),
(658, 'Warora', 1),
(659, 'Nilambur', 21),
(660, 'Rasipuram', 6),
(661, 'Ramnagar', 22),
(662, 'Jammalamadugu', 12),
(663, 'Nawanshahr', 13),
(664, 'Thoubal', 28),
(665, 'Athni', 3),
(666, 'Cherthala', 21),
(667, 'Sidhi', 11),
(668, 'Farooqnagar', 5),
(669, 'Peddapuram', 12),
(670, 'Chirkunda', 16),
(671, 'Pachora', 1),
(672, 'Madhepura', 10),
(673, 'Pithoragarh', 22),
(674, 'Tumsar', 1),
(675, 'Phalodi', 8),
(676, 'Tiruttani', 6),
(677, 'Rampura Phul', 13),
(678, 'Perinthalmanna', 21),
(679, 'Padrauna', 9),
(680, 'Pipariya', 11),
(681, 'Dalli-Rajhara', 17),
(682, 'Punganur', 12),
(683, 'Mattannur', 21),
(684, 'Mathura', 9),
(685, 'Thakurdwara', 9),
(686, 'Nandivaram-Guduvancheri', 6),
(687, 'Mulbagal', 3),
(688, 'Manjlegaon', 1),
(689, 'Wankaner', 4),
(690, 'Sillod', 1),
(691, 'Nidadavole', 12),
(692, 'Surapura', 3),
(693, 'Rajagangapur', 20),
(694, 'Sheikhpura', 10),
(695, 'Parlakhemundi', 20),
(696, 'Kalimpong', 7),
(697, 'Siruguppa', 3),
(698, 'Arvi', 1),
(699, 'Limbdi', 4),
(700, 'Barpeta', 18),
(701, 'Manglaur', 22),
(702, 'Repalle', 12),
(703, 'Mudhol', 3),
(704, 'Shujalpur', 11),
(705, 'Mandvi', 4),
(706, 'Thangadh', 4),
(707, 'Sironj', 11),
(708, 'Nandura', 1),
(709, 'Shoranur', 21),
(710, 'Nathdwara', 8),
(711, 'Periyakulam', 6),
(712, 'Sultanganj', 10),
(713, 'Medak', 5),
(714, 'Narayanpet', 5),
(715, 'Raxaul Bazar', 10),
(716, 'Rajauri', 15),
(717, 'Pernampattu', 6),
(718, 'Nainital', 22),
(719, 'Ramachandrapuram', 12),
(720, 'Vaijapur', 1),
(721, 'Nangal', 13),
(722, 'Sidlaghatta', 3),
(723, 'Punch', 15),
(724, 'Pandhurna', 11),
(725, 'Wadgaon Road', 1),
(726, 'Talcher', 20),
(727, 'Varkala', 21),
(728, 'Pilani', 8),
(729, 'Nowgong', 11),
(730, 'Naila Janjgir', 17),
(731, 'Mapusa', 31),
(732, 'Vellakoil', 6),
(733, 'Merta City', 8),
(734, 'Sivaganga', 6),
(735, 'Mandideep', 11),
(736, 'Sailu', 1),
(737, 'Vyara', 4),
(738, 'Kovvur', 12),
(739, 'Vadalur', 6),
(740, 'Nawabganj', 9),
(741, 'Padra', 4),
(742, 'Sainthia', 7),
(743, 'Siana', 9),
(744, 'Shahpur', 3),
(745, 'Sojat', 8),
(746, 'Noorpur', 9),
(747, 'Paravoor', 21),
(748, 'Murtijapur', 1),
(749, 'Ramnagar', 10),
(750, 'Sundargarh', 20),
(751, 'Taki', 7),
(752, 'Saundatti-Yellamma', 3),
(753, 'Pathanamthitta', 21),
(754, 'Wadi', 3),
(755, 'Rameshwaram', 6),
(756, 'Tasgaon', 1),
(757, 'Sikandra Rao', 9),
(758, 'Sihora', 11),
(759, 'Tiruvethipuram', 6),
(760, 'Tiruvuru', 12),
(761, 'Mehkar', 1),
(762, 'Peringathur', 21),
(763, 'Perambalur', 6),
(764, 'Manvi', 3),
(765, 'Zunheboto', 30),
(766, 'Mahnar Bazar', 10),
(767, 'Attingal', 21),
(768, 'Shahbad', 14),
(769, 'Puranpur', 9),
(770, 'Nelamangala', 3),
(771, 'Nakodar', 13),
(772, 'Lunawada', 4),
(773, 'Murshidabad', 7),
(774, 'Mahe', 23),
(775, 'Lanka', 18),
(776, 'Rudauli', 9),
(777, 'Tuensang', 30),
(778, 'Lakshmeshwar', 3),
(779, 'Zira', 13),
(780, 'Yawal', 1),
(781, 'Thana Bhawan', 9),
(782, 'Ramdurg', 3),
(783, 'Pulgaon', 1),
(784, 'Sadasivpet', 5),
(785, 'Nargund', 3),
(786, 'Neem-Ka-Thana', 8),
(787, 'Memari', 7),
(788, 'Nilanga', 1),
(789, 'Naharlagun', 33),
(790, 'Pakaur', 16),
(791, 'Wai', 1),
(792, 'Tarikere', 3),
(793, 'Malavalli', 3),
(794, 'Raisen', 11),
(795, 'Lahar', 11),
(796, 'Uravakonda', 12),
(797, 'Savanur', 3),
(798, 'Sirohi', 8),
(799, 'Udhampur', 15),
(800, 'Umarga', 1),
(801, 'Pratapgarh', 8),
(802, 'Lingsugur', 3),
(803, 'Usilampatti', 6),
(804, 'Palia Kalan', 9),
(805, 'Wokha', 30),
(806, 'Rajpipla', 4),
(807, 'Vijayapura', 3),
(808, 'Rawatbhata', 8),
(809, 'Sangaria', 8),
(810, 'Paithan', 1),
(811, 'Rahuri', 1),
(812, 'Patti', 13),
(813, 'Zaidpur', 9),
(814, 'Lalsot', 8),
(815, 'Maihar', 11),
(816, 'Vedaranyam', 6),
(817, 'Nawapur', 1),
(818, 'Solan', 29),
(819, 'Vapi', 4),
(820, 'Sanawad', 11),
(821, 'Warisaliganj', 10),
(822, 'Revelganj', 10),
(823, 'Sabalgarh', 11),
(824, 'Tuljapur', 1),
(825, 'Simdega', 16),
(826, 'Musabani', 16),
(827, 'Kodungallur', 21),
(828, 'Phulabani', 20),
(829, 'Umreth', 4),
(830, 'Narsipatnam', 12),
(831, 'Nautanwa', 9),
(832, 'Rajgir', 10),
(833, 'Yellandu', 5),
(834, 'Sathyamangalam', 6),
(835, 'Pilibanga', 8),
(836, 'Morshi', 1),
(837, 'Pehowa', 14),
(838, 'Sonepur', 10),
(839, 'Pappinisseri', 21),
(840, 'Zamania', 9),
(841, 'Mihijam', 16),
(842, 'Purna', 1),
(843, 'Puliyankudi', 6),
(844, 'Shikarpur, Bulandshahr', 9),
(845, 'Umaria', 11),
(846, 'Porsa', 11),
(847, 'Naugawan Sadat', 9),
(848, 'Fatehpur Sikri', 9),
(849, 'Manuguru', 5),
(850, 'Udaipur', 24),
(851, 'Pipar City', 8),
(852, 'Pattamundai', 20),
(853, 'Nanjikottai', 6),
(854, 'Taranagar', 8),
(855, 'Yerraguntla', 12),
(856, 'Satana', 1),
(857, 'Sherghati', 10),
(858, 'Sankeshwara', 3),
(859, 'Madikeri', 3),
(860, 'Thuraiyur', 6),
(861, 'Sanand', 4),
(862, 'Rajula', 4),
(863, 'Kyathampalle', 5),
(864, 'Shahabad, Rampur', 9),
(865, 'Tilda Newra', 17),
(866, 'Narsinghgarh', 11),
(867, 'Chittur-Thathamangalam', 21),
(868, 'Malaj Khand', 11),
(869, 'Sarangpur', 11),
(870, 'Robertsganj', 9),
(871, 'Sirkali', 6),
(872, 'Radhanpur', 4),
(873, 'Tiruchendur', 6),
(874, 'Utraula', 9),
(875, 'Patratu', 16),
(876, 'Vijainagar, Ajmer', 8),
(877, 'Periyasemur', 6),
(878, 'Pathri', 1),
(879, 'Sadabad', 9),
(880, 'Talikota', 3),
(881, 'Sinnar', 1),
(882, 'Mungeli', 17),
(883, 'Sedam', 3),
(884, 'Shikaripur', 3),
(885, 'Sumerpur', 8),
(886, 'Sattur', 6),
(887, 'Sugauli', 10),
(888, 'Lumding', 18),
(889, 'Vandavasi', 6),
(890, 'Titlagarh', 20),
(891, 'Uchgaon', 1),
(892, 'Mokokchung', 30),
(893, 'Paschim Punropara', 7),
(894, 'Sagwara', 8),
(895, 'Ramganj Mandi', 8),
(896, 'Tarakeswar', 7),
(897, 'Mahalingapura', 3),
(898, 'Dharmanagar', 24),
(899, 'Mahemdabad', 4),
(900, 'Manendragarh', 17),
(901, 'Uran', 1),
(902, 'Tharamangalam', 6),
(903, 'Tirukkoyilur', 6),
(904, 'Pen', 1),
(905, 'Makhdumpur', 10),
(906, 'Maner', 10),
(907, 'Oddanchatram', 6),
(908, 'Palladam', 6),
(909, 'Mundi', 11),
(910, 'Nabarangapur', 20),
(911, 'Mudalagi', 3),
(912, 'Samalkha', 14),
(913, 'Nepanagar', 11),
(914, 'Karjat', 1),
(915, 'Ranavav', 4),
(916, 'Pedana', 12),
(917, 'Pinjore', 14),
(918, 'Lakheri', 8),
(919, 'Pasan', 11),
(920, 'Puttur', 12),
(921, 'Vadakkuvalliyur', 6),
(922, 'Tirukalukundram', 6),
(923, 'Mahidpur', 11),
(924, 'Mussoorie', 22),
(925, 'Muvattupuzha', 21),
(926, 'Rasra', 9),
(927, 'Udaipurwati', 8),
(928, 'Manwath', 1),
(929, 'Adoor', 21),
(930, 'Uthamapalayam', 6),
(931, 'Partur', 1),
(932, 'Nahan', 29),
(933, 'Ladwa', 14),
(934, 'Mankachar', 18),
(935, 'Nongstoin', 27),
(936, 'Losal', 8),
(937, 'Sri Madhopur', 8),
(938, 'Ramngarh', 8),
(939, 'Mavelikkara', 21),
(940, 'Rawatsar', 8),
(941, 'Rajakhera', 8),
(942, 'Lar', 9),
(943, 'Lal Gopalganj Nindaura', 9),
(944, 'Muddebihal', 3),
(945, 'Sirsaganj', 9),
(946, 'Shahpura', 8),
(947, 'Surandai', 6),
(948, 'Sangole', 1),
(949, 'Pavagada', 3),
(950, 'Tharad', 4),
(951, 'Mansa', 4),
(952, 'Umbergaon', 4),
(953, 'Mavoor', 21),
(954, 'Nalbari', 18),
(955, 'Talaja', 4),
(956, 'Malur', 3),
(957, 'Mangrulpir', 1),
(958, 'Soro', 20),
(959, 'Shahpura', 8),
(960, 'Vadnagar', 4),
(961, 'Raisinghnagar', 8),
(962, 'Sindhagi', 3),
(963, 'Sanduru', 3),
(964, 'Sohna', 14),
(965, 'Manavadar', 4),
(966, 'Pihani', 9),
(967, 'Safidon', 14),
(968, 'Risod', 1),
(969, 'Rosera', 10),
(970, 'Sankari', 6),
(971, 'Malpura', 8),
(972, 'Sonamukhi', 7),
(973, 'Shamsabad, Agra', 9),
(974, 'Nokha', 10),
(975, 'PandUrban Agglomeration', 7),
(976, 'Mainaguri', 7),
(977, 'Afzalpur', 3),
(978, 'Shirur', 1),
(979, 'Salaya', 4),
(980, 'Shenkottai', 6),
(981, 'Pratapgarh', 24),
(982, 'Vadipatti', 6),
(983, 'Nagarkurnool', 5),
(984, 'Savner', 1),
(985, 'Sasvad', 1),
(986, 'Rudrapur', 9),
(987, 'Soron', 9),
(988, 'Sholingur', 6),
(989, 'Pandharkaoda', 1),
(990, 'Perumbavoor', 21),
(991, 'Maddur', 3),
(992, 'Nadbai', 8),
(993, 'Talode', 1),
(994, 'Shrigonda', 1),
(995, 'Madhugiri', 3),
(996, 'Tekkalakote', 3),
(997, 'Seoni-Malwa', 11),
(998, 'Shirdi', 1),
(999, 'SUrban Agglomerationr', 9),
(1000, 'Terdal', 3),
(1001, 'Raver', 1),
(1002, 'Tirupathur', 6),
(1003, 'Taraori', 14),
(1004, 'Mukhed', 1),
(1005, 'Manachanallur', 6),
(1006, 'Rehli', 11),
(1007, 'Sanchore', 8),
(1008, 'Rajura', 1),
(1009, 'Piro', 10),
(1010, 'Mudabidri', 3),
(1011, 'Vadgaon Kasba', 1),
(1012, 'Nagar', 8),
(1013, 'Vijapur', 4),
(1014, 'Viswanatham', 6),
(1015, 'Polur', 6),
(1016, 'Panagudi', 6),
(1017, 'Manawar', 11),
(1018, 'Tehri', 22),
(1019, 'Samdhan', 9),
(1020, 'Pardi', 4),
(1021, 'Rahatgarh', 11),
(1022, 'Panagar', 11),
(1023, 'Uthiramerur', 6),
(1024, 'Tirora', 1),
(1025, 'Rangia', 18),
(1026, 'Sahjanwa', 9),
(1027, 'Wara Seoni', 11),
(1028, 'Magadi', 3),
(1029, 'Rajgarh (Alwar)', 8),
(1030, 'Rafiganj', 10),
(1031, 'Tarana', 11),
(1032, 'Rampur Maniharan', 9),
(1033, 'Sheoganj', 8),
(1034, 'Raikot', 13),
(1035, 'Pauri', 22),
(1036, 'Sumerpur', 9),
(1037, 'Navalgund', 3),
(1038, 'Shahganj', 9),
(1039, 'Marhaura', 10),
(1040, 'Tulsipur', 9),
(1041, 'Sadri', 8),
(1042, 'Thiruthuraipoondi', 6),
(1043, 'Shiggaon', 3),
(1044, 'Pallapatti', 6),
(1045, 'Mahendragarh', 14),
(1046, 'Sausar', 11),
(1047, 'Ponneri', 6),
(1048, 'Mahad', 1),
(1049, 'Lohardaga', 16),
(1050, 'Tirwaganj', 9),
(1051, 'Margherita', 18),
(1052, 'Sundarnagar', 29),
(1053, 'Rajgarh', 11),
(1054, 'Mangaldoi', 18),
(1055, 'Renigunta', 12),
(1056, 'Longowal', 13),
(1057, 'Ratia', 14),
(1058, 'Lalgudi', 6),
(1059, 'Shrirangapattana', 3),
(1060, 'Niwari', 11),
(1061, 'Natham', 6),
(1062, 'Unnamalaikadai', 6),
(1063, 'PurqUrban Agglomerationzi', 9),
(1064, 'Shamsabad, Farrukhabad', 9),
(1065, 'Mirganj', 10),
(1066, 'Todaraisingh', 8),
(1067, 'Warhapur', 9),
(1068, 'Rajam', 12),
(1069, 'Urmar Tanda', 13),
(1070, 'Lonar', 1),
(1071, 'Powayan', 9),
(1072, 'P.N.Patti', 6),
(1073, 'Palampur', 29),
(1074, 'Srisailam Project (Right Flank Colony) Township', 12),
(1075, 'Sindagi', 3),
(1076, 'Sandi', 9),
(1077, 'Vaikom', 21),
(1078, 'Malda', 7),
(1079, 'Tharangambadi', 6),
(1080, 'Sakaleshapura', 3),
(1081, 'Lalganj', 10),
(1082, 'Malkangiri', 20),
(1083, 'Rapar', 4),
(1084, 'Mauganj', 11),
(1085, 'Todabhim', 8),
(1086, 'Srinivaspur', 3),
(1087, 'Murliganj', 10),
(1088, 'Reengus', 8),
(1089, 'Sawantwadi', 1),
(1090, 'Tittakudi', 6),
(1091, 'Lilong', 28),
(1092, 'Rajaldesar', 8),
(1093, 'Pathardi', 1),
(1094, 'Achhnera', 9),
(1095, 'Pacode', 6),
(1096, 'Naraura', 9),
(1097, 'Nakur', 9),
(1098, 'Palai', 21),
(1099, 'Morinda, India', 13),
(1100, 'Manasa', 11),
(1101, 'Nainpur', 11),
(1102, 'Sahaspur', 9),
(1103, 'Pauni', 1),
(1104, 'Prithvipur', 11),
(1105, 'Ramtek', 1),
(1106, 'Silapathar', 18),
(1107, 'Songadh', 4),
(1108, 'Safipur', 9),
(1109, 'Sohagpur', 11),
(1110, 'Mul', 1),
(1111, 'Sadulshahar', 8),
(1112, 'Phillaur', 13),
(1113, 'Sambhar', 8),
(1114, 'Prantij', 8),
(1115, 'Nagla', 22),
(1116, 'Pattran', 13),
(1117, 'Mount Abu', 8),
(1118, 'Reoti', 9),
(1119, 'Tenu dam-cum-Kathhara', 16),
(1120, 'Panchla', 7),
(1121, 'Sitarganj', 22),
(1122, 'Pasighat', 33),
(1123, 'Motipur', 10),
(1124, 'O\' Valley', 6),
(1125, 'Raghunathpur', 7),
(1126, 'Suriyampalayam', 6),
(1127, 'Qadian', 13),
(1128, 'Rairangpur', 20),
(1129, 'Silvassa', 34),
(1130, 'Nowrozabad (Khodargama)', 11),
(1131, 'Mangrol', 8),
(1132, 'Soyagaon', 1),
(1133, 'Sujanpur', 13),
(1134, 'Manihari', 10),
(1135, 'Sikanderpur', 9),
(1136, 'Mangalvedhe', 1),
(1137, 'Phulera', 8),
(1138, 'Ron', 3),
(1139, 'Sholavandan', 6),
(1140, 'Saidpur', 9),
(1141, 'Shamgarh', 11),
(1142, 'Thammampatti', 6),
(1143, 'Maharajpur', 11),
(1144, 'Multai', 11),
(1145, 'Mukerian', 13),
(1146, 'Sirsi', 9),
(1147, 'Purwa', 9),
(1148, 'Sheohar', 10),
(1149, 'Namagiripettai', 6),
(1150, 'Parasi', 9),
(1151, 'Lathi', 4),
(1152, 'Lalganj', 9),
(1153, 'Narkhed', 1),
(1154, 'Mathabhanga', 7),
(1155, 'Shendurjana', 1),
(1156, 'Peravurani', 6),
(1157, 'Mariani', 18),
(1158, 'Phulpur', 9),
(1159, 'Rania', 14),
(1160, 'Pali', 11),
(1161, 'Pachore', 11),
(1162, 'Parangipettai', 6),
(1163, 'Pudupattinam', 6),
(1164, 'Panniyannur', 21),
(1165, 'Maharajganj', 10),
(1166, 'Rau', 11),
(1167, 'Monoharpur', 7),
(1168, 'Mandawa', 8),
(1169, 'Marigaon', 18),
(1170, 'Pallikonda', 6),
(1171, 'Pindwara', 8),
(1172, 'Shishgarh', 9),
(1173, 'Patur', 1),
(1174, 'Mayang Imphal', 28),
(1175, 'Mhowgaon', 11),
(1176, 'Guruvayoor', 21),
(1177, 'Mhaswad', 1),
(1178, 'Sahawar', 9),
(1179, 'Sivagiri', 6),
(1180, 'Mundargi', 3),
(1181, 'Punjaipugalur', 6),
(1182, 'Kailasahar', 24),
(1183, 'Samthar', 9),
(1184, 'Sakti', 17),
(1185, 'Sadalagi', 3),
(1186, 'Silao', 10),
(1187, 'Mandalgarh', 8),
(1188, 'Loha', 1),
(1189, 'Pukhrayan', 9),
(1190, 'Padmanabhapuram', 6),
(1191, 'Belonia', 24),
(1192, 'Saiha', 26),
(1193, 'Srirampore', 7),
(1194, 'Talwara', 13),
(1195, 'Puthuppally', 21),
(1196, 'Khowai', 24),
(1197, 'Vijaypur', 11),
(1198, 'Takhatgarh', 8),
(1199, 'Thirupuvanam', 6),
(1200, 'Adra', 7),
(1201, 'Piriyapatna', 3),
(1202, 'Obra', 9),
(1203, 'Adalaj', 4),
(1204, 'Nandgaon', 1),
(1205, 'Barh', 10),
(1206, 'Chhapra', 4),
(1207, 'Panamattom', 21),
(1208, 'Niwai', 9),
(1209, 'Bageshwar', 22),
(1210, 'Tarbha', 20),
(1211, 'Adyar', 3),
(1212, 'Narsinghgarh', 11),
(1213, 'Warud', 1),
(1214, 'Asarganj', 10),
(1215, 'Sarsod', 14);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryname`) VALUES
(1, 'India'),
(2, 'USA'),
(3, 'South Africa');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_name` varchar(50) NOT NULL,
  `ser_description` varchar(100) NOT NULL,
  `ser_ternaround` int(11) NOT NULL,
  `ser_type` varchar(20) NOT NULL,
  `ser_cust_price` float NOT NULL,
  `ser_qty` int(11) NOT NULL,
  `ser_activation` varchar(10) DEFAULT 'No',
  PRIMARY KEY (`ser_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ser_id`, `ser_name`, `ser_description`, `ser_ternaround`, `ser_type`, `ser_cust_price`, `ser_qty`, `ser_activation`) VALUES
(7, 'Photoshop Retouching', 'Photoshop Retouching', 2, 'standard', 2, 1, 'Yes'),
(8, 'Custom Presets', 'Custom Presets', 1, 'standard', 1, 1, 'No'),
(9, 'Retouching - A La Carte', 'Retouching - A La Carte', 2, 'standard', 2, 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `service_attribute`
--

DROP TABLE IF EXISTS `service_attribute`;
CREATE TABLE IF NOT EXISTS `service_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_attribute`
--

INSERT INTO `service_attribute` (`id`, `service_id`, `attribute_id`) VALUES
(15, 7, 11),
(16, 7, 12),
(17, 7, 13),
(18, 7, 15),
(19, 7, 14),
(20, 7, 17),
(21, 7, 18),
(27, 7, 29),
(23, 9, 11),
(24, 9, 13),
(25, 9, 14),
(26, 9, 17);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statename` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `statename`, `country_id`) VALUES
(1, 'Maharashtra', 1),
(2, 'Delhi', 1),
(3, 'Karnataka', 1),
(4, 'Gujarat', 1),
(5, 'Telangana', 1),
(6, 'Tamil Nadu', 1),
(7, 'West Bengal', 1),
(8, 'Rajasthan', 1),
(9, 'Uttar Pradesh', 1),
(10, 'Bihar', 1),
(11, 'Madhya Pradesh', 1),
(12, 'Andhra Pradesh', 1),
(13, 'Punjab', 1),
(14, 'Haryana', 1),
(15, 'Jammu and Kashmir', 1),
(16, 'Jharkhand', 1),
(17, 'Chhattisgarh', 1),
(18, 'Assam', 1),
(19, 'Chandigarh', 1),
(20, 'Odisha', 1),
(21, 'Kerala', 1),
(22, 'Uttarakhand', 1),
(23, 'Puducherry', 1),
(24, 'Tripura', 1),
(25, 'Karnatka', 1),
(26, 'Mizoram', 1),
(27, 'Meghalaya', 1),
(28, 'Manipur', 1),
(29, 'Himachal Pradesh', 1),
(30, 'Nagaland', 1),
(31, 'Goa', 1),
(32, 'Andaman and Nicobar Islands', 1),
(33, 'Arunachal Pradesh', 1),
(34, 'Dadra and Nagar Haveli', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `publication_status`) VALUES
(2, 'Samsung', 'Samsung desc', 1),
(3, 'IPhone', 'IPhone Desc<br>', 1),
(4, 'H&M', 'H&amp;M Desc', 1),
(5, 'Adidas', 'Adidas Desc', 1),
(6, 'Razer', 'Razer Desc', 1),
(8, 'Other', 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_description`, `publication_status`) VALUES
(1, 'Computer', '                                                                        Computer Desc                                                                ', 1),
(2, 'Laptop', 'Laptop Desc', 1),
(3, 'Smartphone', 'Smartphone Desc', 1),
(4, 'Smart TV', 'SmartTV Desc', 1),
(5, 'Clothing', 'Clothing Desc  ', 1),
(6, 'Shoes & Sneakers', 'Shoes &amp; Sneakers Desc', 1),
(7, 'Accessories', '                                                                        Accessories Desc.                                                                ', 1),
(8, 'House Hold', 'House Hold', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `phone` bigint(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `uname`, `pword`, `country`, `state`, `city`, `zip`, `gender`, `file`, `phone`) VALUES
(37, 'Rajkumar Banothe', 'rajbanothe@gmail.com', 'abc12345', '1', '1', '13', 440001, 'Male', 'http://localhost/shoppinghub/uploads/11.jpg', 8585454545),
(38, 'Nitin Lonare', 'nitin@gmail.com', 'abc12345', '1', '1', '25', 441122, 'Male', 'http://localhost/shoppinghub/uploads/IMG_20170530_110049.jpg', 5544774411),
(39, 'Navin Yele', 'navinyele@gmail.com', 'abc12345', '1', '11', '363', 778844, 'Male', 'http://localhost/shoppinghub/uploads/Navin1.jpg', 9966554433);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount_cal`
--

DROP TABLE IF EXISTS `tbl_discount_cal`;
CREATE TABLE IF NOT EXISTS `tbl_discount_cal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `disc_amount` float NOT NULL,
  `dis_type` varchar(55) NOT NULL,
  `grand_tot` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discount_cal`
--

INSERT INTO `tbl_discount_cal` (`id`, `customer_id`, `order_total`, `disc_amount`, `dis_type`, `grand_tot`, `date`) VALUES
(40, 37, 202, 50, 'percent', 101, '2021-12-09 21:49:33'),
(41, 37, 405, 200, 'amount', 205, '2021-12-09 21:54:55'),
(42, 37, 160, 50, 'percent', 80, '2021-12-09 22:14:45'),
(43, 37, 0, 0, '', 0, '2021-12-09 23:25:32'),
(44, 37, 30, 25, 'percent', 22.5, '2021-12-09 23:33:51'),
(45, 37, 0, 0, '', 0, '2021-12-10 08:31:37'),
(46, 37, 1400, 200, 'amount', 1200, '2021-12-10 08:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disc_coupon`
--

DROP TABLE IF EXISTS `tbl_disc_coupon`;
CREATE TABLE IF NOT EXISTS `tbl_disc_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `disc_name` varchar(55) NOT NULL,
  `disc_amount` int(50) NOT NULL,
  `disc_type` varchar(55) NOT NULL DEFAULT 'percent',
  `no_of_uses` int(11) NOT NULL,
  `discount_category` varchar(55) NOT NULL,
  `no_of_used` int(10) NOT NULL DEFAULT '0',
  `disc_start_date` date NOT NULL,
  `disc_end_date` date NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_disc_coupon`
--

INSERT INTO `tbl_disc_coupon` (`id`, `code`, `disc_name`, `disc_amount`, `disc_type`, `no_of_uses`, `discount_category`, `no_of_used`, `disc_start_date`, `disc_end_date`, `action`) VALUES
(17, 'FLAT35%OFF', 'Percent', 25, 'percent', 3, 'Rewards Point Discount', 0, '2021-12-13', '2022-01-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gift_coupon`
--

DROP TABLE IF EXISTS `tbl_gift_coupon`;
CREATE TABLE IF NOT EXISTS `tbl_gift_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `disc_name` varchar(100) NOT NULL,
  `disc_amount` float NOT NULL,
  `disc_type` varchar(55) NOT NULL DEFAULT 'amount',
  `disc_amount_left` float NOT NULL,
  `discount_category` varchar(55) NOT NULL,
  `no_of_uses` int(10) NOT NULL DEFAULT '0',
  `dis_start_date` date NOT NULL,
  `dis_end_date` date NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gift_coupon`
--

INSERT INTO `tbl_gift_coupon` (`id`, `code`, `disc_name`, `disc_amount`, `disc_type`, `disc_amount_left`, `discount_category`, `no_of_uses`, `dis_start_date`, `dis_end_date`, `action`) VALUES
(18, '$320OFF', 'Discount', 340, 'amount', 340, 'Referral Code Discount', 0, '2021-12-13', '2022-01-28', ''),
(17, '$600OFF', 'Discount', 600, 'amount', 600, 'Rewards Point Discount', 0, '2021-12-13', '2022-01-01', ''),
(20, '$100OFF', 'Discount', 100, 'amount', 100, 'High Volume Discount', 0, '2021-12-08', '2021-12-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `disc_amount` float NOT NULL,
  `dis_type` varchar(50) NOT NULL,
  `grand_tot` float NOT NULL,
  `action` varchar(20) NOT NULL DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `disc_amount`, `dis_type`, `grand_tot`, `action`, `order_date`) VALUES
(40, 37, 47, 54, 202, 50, 'percent', 101, 'pending', '2021-12-14 10:09:26'),
(41, 37, 48, 55, 405, 200, 'amount', 205, 'pending', '2021-12-14 10:09:26'),
(43, 37, 49, 57, 160, 50, 'percent', 80, 'pending', '2021-12-14 10:09:26'),
(45, 37, 51, 59, 30, 25, 'percent', 22.5, 'pending', '2021-12-14 10:09:26'),
(47, 37, 53, 61, 1400, 200, 'amount', 1200, 'pending', '2021-12-14 10:09:26'),
(51, 37, 57, 65, 30, 25, 'percent', 22.5, 'pending', '2021-12-14 10:09:26'),
(52, 37, 58, 66, 502, 0, '', 502, 'pending', '2021-12-14 10:09:26'),
(53, 37, 59, 67, 615, 0, '', 615, 'pending', '2021-12-14 10:09:26'),
(54, 37, 60, 68, 30, 25, 'percent', 22.5, 'pending', '2021-12-14 10:09:26'),
(55, 37, 61, 69, 168, 25, 'percent', 126, 'pending', '2021-12-14 10:09:26'),
(57, 37, 63, 71, 190, 190, 'amount', 0, 'pending', '2021-12-14 10:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_image` varchar(55) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `customer_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `product_image`, `order_date`) VALUES
(40, 37, 40, 7, 'Mountain Rain Jacket', 101, 2, 'Five_Ten.jpg', '2021-12-09 21:49:36'),
(41, 37, 41, 15, 'Samsung Galaxy Z Flip3 5G', 405, 1, 'Samsung_Galaxy.jpg', '2021-12-09 21:54:59'),
(43, 37, 44, 2, 'Face Covers 3-Pack', 15, 1, 'feature-pic22.jpg', '2021-12-09 23:25:35'),
(45, 37, 46, 6, 'Samsung Galaxy S21 Ultra', 505, 1, 'sm21u.jpg', '2021-12-10 08:31:40'),
(47, 37, 48, 17, 'Nike Mens Jacket CT2255', 140, 2, 'nik1.jpg', '2021-12-10 12:14:34'),
(51, 37, 52, 4, 'AUE60 Crystal 4K UHD', 195, 2, 'pic3.jpg', '2021-12-10 14:25:10'),
(52, 37, 52, 3, 'Slim Fit Linen Blazer', 56, 2, 'feature-pic33.jpg', '2021-12-10 14:25:10'),
(53, 37, 53, 1, 'Ultraboost DNA Black Python Shoes', 205, 3, 'feature-pic11.jpg', '2021-12-10 14:26:29'),
(54, 37, 54, 2, 'Face Covers 3-Pack', 15, 2, 'feature-pic22.jpg', '2021-12-10 14:44:42'),
(55, 37, 55, 3, 'Slim Fit Linen Blazer', 56, 3, 'feature-pic33.jpg', '2021-12-11 13:42:38'),
(57, 37, 57, 8, 'Galaxy Buds Pro', 95, 2, 'budspro1.jpg', '2021-12-14 10:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(50) NOT NULL,
  `actions` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_type`, `actions`) VALUES
(47, 'cashon', 'pending'),
(48, 'cashon', 'pending'),
(49, 'cashon', 'pending'),
(50, 'cashon', 'pending'),
(51, 'cashon', 'pending'),
(52, 'cashon', 'pending'),
(53, 'cashon', 'pending'),
(54, 'cashon', 'pending'),
(55, 'cashon', 'pending'),
(56, 'net_banking', 'pending'),
(57, 'net_banking', 'pending'),
(58, 'cashon', 'pending'),
(59, 'cashon', 'pending'),
(60, 'cashon', 'pending'),
(61, 'net_banking', 'pending'),
(62, 'cashon', 'pending'),
(63, 'cashon', 'pending'),
(64, 'cashon', 'pending'),
(65, 'cashon', 'pending'),
(66, 'cashon', 'pending'),
(67, 'cashon', 'pending'),
(68, 'cashon', 'pending'),
(69, 'cashon', 'pending'),
(71, 'cashon', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_feature` tinyint(4) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_author` int(11) NOT NULL,
  `product_view` int(11) NOT NULL DEFAULT '0',
  `published_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publication_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_short_description`, `product_long_description`, `product_image`, `product_price`, `product_quantity`, `product_feature`, `product_category`, `product_brand`, `product_author`, `product_view`, `published_date`, `publication_status`) VALUES
(1, 'Ultraboost DNA Black Python Shoes', 'Responsive shoes snakeskin acc.', 'Black pythons are sleek, cool and a little bit dangerous. Channel the exotic beauty of the Australian snake and make it yours in these adidas Ultraboost DNA Black Python Shoes. The stretchy knit upper features snakeskin-inspired details. Energy-returning cushioning keeps you comfortable when you\'re on the move.', 'feature-pic11.jpg', 205, 50, 1, 6, 5, 1, 0, '2017-11-30 14:24:41', 1),
(2, 'Face Covers 3-Pack', 'Two 3-packs for $30 with code MASKUP. Size M/L is recommended for most adults. This product is not eligible for returns or exchanges.', 'Made with soft, breathable fabric the adidas Face Cover is comfortable, washable and reusable for practicing healthy habits every day. This cover is not a medically-graded mask nor personal protective equipment.', 'feature-pic22.jpg', 15, 50, 1, 5, 5, 1, 0, '2017-11-30 14:29:04', 1),
(3, 'Slim Fit Linen Blazer', 'Single-breasted blazer in woven linen fabric. Narrow, notched lapels with decorative buttonhole. Chest pocket, front pockets with flap, and two inner pockets.', 'Single-breasted blazer in woven linen fabric. Narrow, notched lapels with decorative buttonhole. Chest pocket, front pockets with flap, and two inner pockets. Two buttons at front, decorative buttons at cuffs, and vent at back. Lined. Slim Fit – tapered at chest and waist with slightly narrower sleeves for a tailored silhouette.\n\n', 'feature-pic33.jpg', 56, 35, 1, 5, 4, 1, 0, '2017-11-30 14:38:25', 1),
(4, 'AUE60 Crystal 4K UHD', '4K UHD TV goes beyond regular FHD with 4x more pixels, offering your eyes the sharp and crisp images they deserve. Now you can see even the small details in the scene.', 'A sleek and elegant design that draws you to the purest picture. Crafted with an effortless minimalistic style from every angle and a boundless design that sets new standards. Keep your cables tidy and conceal them, reducing clutter and keeping a seamless look for your TV. Choose your favorite voice assistant; Bixby, Amazon Alexa or Google Assistant. For the first time, all are built into your Samsung TV to provide the optimal entertainment experience and advanced control in your connected home.\n\n', 'pic3.jpg', 1000, 150, 1, 4, 2, 1, 0, '2017-11-30 14:38:57', 1),
(5, 'Razer 15.6', 'Designed for gaming, the Razer 15.6\" Blade 15 Gaming Laptop combines mobility with performance. Graphics are handled by the dedicated NVIDIA GeForce GTX 1660 Ti graphics card with VRAM.     ', 'Designed for gaming, the Razer 15.6\" Blade 15 Gaming Laptop combines mobility with performance. Graphics are handled by the dedicated NVIDIA GeForce GTX 1660 Ti graphics card with VRAM. It also features a 10th Gen 2.6 GHz Intel Core i7-10750H six-core processor and 16GB of 2933 MHz of DDR4 RAM. Its 256GB NVME PCIe M.2 SSD allows for fast boot times. For online multiplayer features, the Razer Blade 15 can utilize Wi-Fi 6 (802.11ax) or a wired Gigabit Ethernet connection. It also supports wireless accessories via Bluetooth 5.1 technology. The Razer Blade 15 features a precision-crafted aluminum chassis.\n\nThe 15.6\" display features a FHD 1920 x 1080 resolution and are individually factory calibrated, providing 100% of the sRGB color space. The bezels are thin, measuring in at about 4.9mm. The screen also has a matte finish to reduce glare in brightly-lit environments. The keyboard is backlit and supports Razer Chroma single-zone RGB lighting. Other features included Thunderbolt 3, USB Type-C, USB Type-A, and a 3.5mm audio jack. Windows 10 Home is the installed operating system.', 'preview-img.jpg', 700, 56, 1, 1, 6, 1, 0, '2017-11-30 14:40:34', 1),
(6, 'Samsung Galaxy S21 Ultra', 'The highest resolution photos and video on a smartphone', 'Samsung Electronics Co., Ltd. unveiled the Galaxy S21 Ultra, a flagship that pushes the boundaries of what a smartphone can do. The S21 Ultra pulls out all the stops for those who want Samsung’s best-of-the-best with our most advanced pro-grade camera system and our brightest, most intelligent display. It takes productivity and creativity up a notch by bringing the popular S Pen experience to the Galaxy S series for the first time.</span>', 'sm21u.jpg', 505, 12, 1, 3, 2, 1, 0, '2021-05-12 09:20:39', 1),
(7, 'Mountain Rain Jacket', 'A Lightweight Rain Jacket for Wet Weather Rides.', '<span style=\"font-family: AdihausDIN, Helvetica, Arial, sans-serif; font-size: 16px; white-space: pre-line; background-color: rgb(255, 255, 255);\">Expand your wet weather options.&nbsp;</span><span style=\"font-family: AdihausDIN, Helvetica, Arial, sans-serif; font-size: 16px; white-space: pre-line; background-color: rgb(255, 255, 255);\">The adidas Five Ten All-Mountain Rain Jacket keeps you dry and on the bike through cool misty days and afternoon showers.&nbsp;</span><span style=\"font-family: AdihausDIN, Helvetica, Arial, sans-serif; font-size: 16px; white-space: pre-line; background-color: rgb(255, 255, 255);\">RAIN.RDY keeps out wind and rain, while elastic cuffs, hem and hood further seal out the elements while you ride.&nbsp;</span><span style=\"font-family: AdihausDIN, Helvetica, Arial, sans-serif; font-size: 16px; white-space: pre-line; background-color: rgb(255, 255, 255);\">Its lightweight build makes for easy packing. Zip out the showers and keep on riding.</span>', 'Five_Ten.jpg', 101, 26, 1, 5, 5, 1, 0, '2021-05-12 16:00:39', 1),
(8, 'Galaxy Buds Pro', 'Introducing the New Galaxy Buds Pro', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Our most immersive buds yet deliver powerful studio sound and crystal-clear call quality. Use Intelligent Active Noise Cancellation1 to escape into your music at a moment’s notice. Answer calls with just your voice and let in the sounds that matter most with adjustable ambient sound. Escape and tune in to your own moment of Zen—all with a single tap. Intelligent Active Noise Cancellation gives you the power to adjust your settings based on the world around you, so you always hear what you want to hear.1 Turn it to High on a noisy bus or to Low in a quiet library—no need to change the volume.</span></font>', 'budspro1.jpg', 95, 21, 1, 5, 2, 1, 0, '2021-05-12 16:31:50', 1),
(14, 'Jabra Elite 75t Bluetooth ', '<b style=\"background-color: rgb(255, 255, 255);\">Designed for secure fit and amazing durability</b>', 'Ergonomic shape makes eargels exceptionally comfortable and the ideal fit for every type of ear – IP55 weather-resistant rating against dust and water.<div>Brand	?Jabra Manufacturer	?Jabra, GN AUDIO A/S Lautrupbeira 7 DK-2750 ballerup denmark Model	?100-99090000-40 Model Name	?Elite 75t Model Year	?2019 Product Dimensions	?2.19 x 1.94 x 1.62 cm; 45 Grams Batteries	?2 Lithium ion batteries required. (included) Item model number	?100-99090000-40 Compatible Devices	?IOS , blackberry, android Special Features	?Wireless Mounting Hardware	?Headset, charging cable, ear gels, manual Number Of Items	?3</div>', 'JabraElite-75t.jpg', 160, 20, 0, 7, 3, 37, 0, '2021-12-03 10:20:23', 1),
(15, 'Samsung Galaxy Z Flip3 5G', '                                                                                                            5G Ready powered by Qualcomm Snapdragon 888 Octa-Core processor, 8GB RAM, 128GB internal memory (UFS 3.1) , Android operating system and dual SIM (one nano Sim &amp; one e-Sim)                                                                ', '                                                                                                            OS	?Android 11.0 RAM	?8 GB Product Dimensions	?7.2 x 0.7 x 16.6 cm; 183 Grams Batteries	?2 Lithium ion batteries required. (included) Connectivity technologies	?Wi-Fi Special features	?Fingerprint Scanner, Front Camera, Dual_Sim, Dual Camera, Camera Display technology	?FHD+ Infinity-O Colours displayed	?Dynamic 2X, Adaptive 120Hz(10~120Hz), FHD+ Infinity-O Display(2,640 x 1,080) 22:9 ratio, 425PPI| Cover Display - 1.9 Super 60Hz (260 x 512), 302PPI Other display features	?Wireless Device interface - primary	?Touchscreen Other camera features	?Dual Rear Camera (12 MP + 12 MP) | 10 MP Front Camera Form factor	?Flip Colour	?Cream Battery Power Rating	?3300 Whats in the box	?Handset, Non-removable Battery Included, Data Cable (C-to-C), Ejection Pin, Quick Start Guide, Protective Vinyl, Protective Films (Main Display) Manufacturer	?SAMSUNG ELECTRONICS CO Country of Origin	?Republic of Korea Item Weight	?183 g&nbsp;                                                                                                ', 'Samsung_Galaxy.jpg', 405, 25, 0, 3, 2, 37, 0, '2021-12-03 10:21:47', 1),
(16, 'Labebe Squirrel Plush Stuffed Animal Rocker ', 'Labebe Squirrel Plush Stuffed Animal Rocker Wooden Rocking Horse Toy for Kids, Blue , 1-3 Years', '                                                                                                            Model Number	?HY1520022-FBA-UK Assembly Required	?Yes Batteries Required	?No Batteries Included	?No Material Type(s)	?Wood, Plush Remote Control Included?	?No Color	?Blue Product Dimensions	?59.69 x 33.02 x 49.53 cm; 5.22 Kilograms Item model number	?HY1520022-FBA-UK Manufacturer recommended age	?1 month and up Manufacturer	?labebe Country of Origin	?USA Item Weight	?5 kg 220 g                                                                                                ', 'lab.jpg', 15, 30, 0, 8, 8, 37, 0, '2021-12-03 10:25:50', 1),
(17, 'Nike Mens Jacket CT2255', '                                                                                                            Built with 2 layers of wind-resistant and waterproof GORE-TEX materials and combined with a 3-piece hood which provides coverage and a personalized fit,&nbsp;                                                                ', '                                                                        <div><span style=\"font-size: 13.3333px;\">the two-tone jacket is finished with DWR (durable, water-repellent) Nike ACG JKT HD Gore-Tex Blk/HabRed - Waterproof - 3-piece hood with a drawcord - Zippered kangaroo pockets - 2 pockets lined with GORE-TEX - Elastic at the wrist</span></div>                                    Nike ACG GORE-TEX means “you are in for a treat” in Nike language. Let’s assume you live in an area that covers all the great features of “the weather,” sun, rain, and wind (yes, we know that there is more), then this Nike ACG GORE-TEX Jacket serves imaginary high-fives because it got you covered. Built with 2 layers of wind-resistant and waterproof GORE-TEX materials and combined with a 3-piece hood which provides coverage and a personalized fit, the two-tone jacket is finished with DWR (durable, water-repellent) - Nike ACG JKT HD Gore-Tex Blk/HabRed - Waterproof - 3-piece hood with a drawcord - Zippered kangaroo pockets - 2 pockets lined with GORE-TEX - Elastic at the wrist - Adjustable drawcord at the hem - Embroidered Nike ACG logo at the right chest - 100% recycled polyester                                                                                                ', 'nik1.jpg', 140, 35, 0, 5, 5, 37, 0, '2021-12-03 10:30:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `shipping_name` varchar(50) NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_phone` varchar(20) NOT NULL,
  `shipping_zipcode` varchar(20) NOT NULL,
  `order_total` float NOT NULL,
  `disc_amount` float NOT NULL,
  `dis_type` varchar(50) NOT NULL,
  `grand_tot` float NOT NULL,
  `shipping_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `customer_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_city`, `shipping_country`, `shipping_phone`, `shipping_zipcode`, `order_total`, `disc_amount`, `dis_type`, `grand_tot`, `shipping_date`) VALUES
(47, 37, 'Rajkumar Banothe', 'rajbanothe@gmail.com', 'Gondia', 'Gondia', 'India', '9898656532', '440001', 202, 50, 'percent', 101, '2021-12-14 11:19:51'),
(48, 37, 'Navin Yele', 'navinyele@gmail.com', 'Nagpur', 'Nagpur', 'India', '4545457887', '440001', 405, 200, 'amount', 205, '2021-12-14 11:19:51'),
(49, 37, 'Rajkumar Banothe', 'rajbanothe@gmail.com', 'Gondia', 'Gondia', 'India', '9898656532', '440001', 160, 50, 'percent', 80, '2021-12-14 11:19:51'),
(51, 37, 'Navin Yele', 'navinyele@gmail.com', 'Nagpur', 'Nagpur', 'India', '4545457887', '440551', 30, 25, 'percent', 22.5, '2021-12-14 11:19:51'),
(53, 37, 'Rajkumar Banothe', 'rajbanothe04@gmail.com', 'Gondia', 'Gondia', 'India', '8855447722', '440028', 1400, 200, 'amount', 1200, '2021-12-14 11:19:51'),
(57, 37, 'Navin Yele', 'navinyele@gmail.com', 'Gondia', 'Gondia', 'India', '8855447722', '440028', 30, 25, 'percent', 22.5, '2021-12-14 11:19:51'),
(58, 37, 'Navin Yele', 'navinyele@gmail.com', 'Gondia', 'Gondia', 'India', '8855447722', '440028', 502, 0, '', 502, '2021-12-14 11:19:51'),
(59, 37, 'Navin Yele', 'navinyele@gmail.com', 'Gondia', 'Gondia', 'India', '8855447722', '440028', 615, 0, '', 615, '2021-12-14 11:19:51'),
(60, 37, 'Navin Yele', 'navinyele@gmail.com', 'Gondia', 'Gondia', 'India', '8855447722', '440028', 30, 25, 'percent', 22.5, '2021-12-14 11:19:51'),
(61, 37, 'Navin Yele', 'navinyele@gmail.com', 'Seoni', 'Seoni', 'India', '8855447722', '440028', 168, 25, 'percent', 126, '2021-12-14 11:19:51'),
(63, 37, 'Navin Yele', 'navinyele@gmail.com', 'Gondia', 'Gondia', 'India', '8855447722', '440028', 190, 190, 'amount', 0, '2021-12-14 11:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`, `created_time`, `updated_time`) VALUES
(1, 'Admin', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, '2021-12-02 11:13:43', '2021-12-02 11:13:43'),
(2, 'Admin1', 'admin1@admin.com', '0192023a7bbd73250516f069df18b500', 1, '2021-12-02 11:13:43', '2021-12-02 11:13:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
