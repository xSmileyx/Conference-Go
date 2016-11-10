-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 04:10 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingdetails`
--

CREATE TABLE IF NOT EXISTS `tblbookingdetails` (
  `booking_id` int(6) NOT NULL,
  `p_id` int(6) DEFAULT NULL,
  `p_firstname` varchar(20) DEFAULT NULL,
  `p_surname` varchar(30) DEFAULT NULL,
  `confpass_reference` int(6) DEFAULT NULL,
  `room_id` int(6) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `adults` int(2) NOT NULL,
  `children` int(2) NOT NULL,
  `room_requirements` varchar(30) DEFAULT NULL,
  `special_requirements` varchar(300) NOT NULL,
  `booking_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=767615 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookingdetails`
--

INSERT INTO `tblbookingdetails` (`booking_id`, `p_id`, `p_firstname`, `p_surname`, `confpass_reference`, `room_id`, `start_date`, `end_date`, `adults`, `children`, `room_requirements`, `special_requirements`, `booking_date`) VALUES
(167365, 318499, 'Rayner', 'Paun', NULL, 334521, '2016-11-09', '2016-11-19', 1, 1, 'Non smoking', '', '2016-11-09'),
(731414, 848611, 'John', 'Cena', NULL, 243433, '2016-10-28', '2016-12-23', 3, 2, 'Smoking', '', '2016-10-28'),
(767614, 318499, 'Rayner', 'Paun', NULL, 211881, '2016-10-30', '2016-12-02', 2, 3, 'Non smoking', 'Softest pillows.', '2016-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblcaterer`
--

CREATE TABLE IF NOT EXISTS `tblcaterer` (
  `caterer_id` int(6) NOT NULL,
  `caterer_name` varchar(40) DEFAULT NULL,
  `caterer_phone` int(15) DEFAULT NULL,
  `caterer_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcaterer`
--

INSERT INTO `tblcaterer` (`caterer_id`, `caterer_name`, `caterer_phone`, `caterer_email`) VALUES
(100001, 'MB Caterers', 1231111111, ''),
(100002, 'Joyous Gourmet Catering', 146832151, ''),
(100003, 'SRC Catering', 597865489, NULL),
(100004, 'Joyous Gourmt Catering3', 128754123, 'jgc@gmail.com'),
(100005, 'Joyous Gourmt Catering33', 128754123, 'jgc@gmail.com'),
(100006, 'test caterer', 145689121, 'caterertest@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblconference`
--

CREATE TABLE IF NOT EXISTS `tblconference` (
  `conf_id` int(6) NOT NULL,
  `conf_name` varchar(50) DEFAULT NULL,
  `conf_startdate` date DEFAULT NULL,
  `conf_enddate` date DEFAULT NULL,
  `conf_numpass` int(4) DEFAULT NULL,
  `caterer_id` int(6) DEFAULT NULL,
  `venue_id` int(6) DEFAULT NULL,
  `em_id` int(6) DEFAULT NULL,
  `conf_desc` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconference`
--

INSERT INTO `tblconference` (`conf_id`, `conf_name`, `conf_startdate`, `conf_enddate`, `conf_numpass`, `caterer_id`, `venue_id`, `em_id`, `conf_desc`) VALUES
(1, 'Autistic Children', '2016-05-17', '2016-05-19', 300, 100002, 200002, 1, 'Talk and learn on how to help autistic children!'),
(2, 'ads', '2015-10-13', '0000-00-00', 0, 100001, 200003, 1, 'asdasdad'),
(4, 'ads', '2015-10-13', '0000-00-00', 100, 100001, 200002, 1, 'asdfad'),
(5, 'Test conference', '2015-10-13', '2015-10-15', 100, 100003, 200003, 1, ''),
(6, 'Test conference 2', '2016-10-29', '2015-11-02', 10, 100002, 200003, 1, ''),
(8, 'test conference 2', '2016-11-16', '2016-11-19', 100, 100001, 200002, 1, 'testing'),
(9, 'asd', '2016-11-16', '2016-11-17', 12, 100002, 200002, 1, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_participant`
--

CREATE TABLE IF NOT EXISTS `tblconf_participant` (
  `conf_id` int(6) DEFAULT NULL,
  `p_id` int(6) DEFAULT NULL,
  `confpass_reference` int(6) NOT NULL DEFAULT '0',
  `pass_id` int(11) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `sponsor_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconf_participant`
--

INSERT INTO `tblconf_participant` (`conf_id`, `p_id`, `confpass_reference`, `pass_id`, `purchase_date`, `sponsor_id`) VALUES
(6, 318499, 0, 3, NULL, 0),
(1, 848611, 1646, 1, NULL, 0),
(1, 318499, 108700, 1, '2016-11-07', 0),
(1, 318499, 253939, 1, NULL, 0),
(1, 318499, 299451, 3, NULL, 0),
(1, 848611, 313832, 1, '2016-11-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_speaker`
--

CREATE TABLE IF NOT EXISTS `tblconf_speaker` (
  `cspeak_index` int(6) NOT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `speaker_id` int(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconf_speaker`
--

INSERT INTO `tblconf_speaker` (`cspeak_index`, `conf_id`, `speaker_id`) VALUES
(1, 2, 1),
(2, 2, 14),
(3, 2, 4),
(4, 2, 14),
(5, 6, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_sponsor`
--

CREATE TABLE IF NOT EXISTS `tblconf_sponsor` (
  `cs_index` int(6) NOT NULL,
  `sponsor_id` int(6) DEFAULT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `amount_provided` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconf_sponsor`
--

INSERT INTO `tblconf_sponsor` (`cs_index`, `sponsor_id`, `conf_id`, `amount_provided`) VALUES
(1, 1, 1, 100000),
(2, 3, 1, 50000),
(3, 3, 4, 10),
(4, 5, 4, 10),
(5, 5, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbldash`
--

CREATE TABLE IF NOT EXISTS `tbldash` (
  `dash_id` int(11) NOT NULL,
  `banner_image` longblob NOT NULL,
  `event_name` varchar(70) NOT NULL,
  `event_desc` text NOT NULL,
  `event_image` longblob NOT NULL,
  `key_spname1` varchar(70) NOT NULL,
  `key_sp1` longblob NOT NULL,
  `key_spname2` varchar(70) NOT NULL,
  `key_sp2` longblob NOT NULL,
  `key_spname3` varchar(70) NOT NULL,
  `key_sp3` longblob NOT NULL,
  `venue_name` varchar(70) NOT NULL,
  `details` text NOT NULL,
  `venue_image` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldash`
--

INSERT INTO `tbldash` (`dash_id`, `banner_image`, `event_name`, `event_desc`, `event_image`, `key_spname1`, `key_sp1`, `key_spname2`, `key_sp2`, `key_spname3`, `key_sp3`, `venue_name`, `details`, `venue_image`) VALUES
(3, 0x32343934392d3131312e706e67, 'asdasda', 'asdasdas', 0x32363832352d3131312e706e67, 'asdasd', 0x37353039362d3131312e706e67, 'adasd', 0x38383031382d3131312e706e67, 'asdasd', 0x34303838392d3131312e706e67, 'asdasd', 'asdasd', 0x38373438302d3131312e706e67),
(4, 0x31343635362d61646d696e62616e6e6572312e6a7067, 'testing conference autism', 'testttttttttt', 0x37383932372d343830783438302e706e67, 'barry', 0x37383635322d62617272792e706e67, 'michel', 0x333832342d6d696368656c2e706e67, 'temple', 0x32363030342d74656d706c652e706e67, 'testing venue', 'event detailssssssssssss', 0x31303237322d62672e6a7067),
(6, 0x32303930342d67616c6c6572795f315f313339373034313539302e6a706567, 'tecvbn', 'ddfgccvbj', 0x38353531342d646f776e6c6f61642e6a7067, 'asd', 0x34373837312d646176652d6665726775736f6e2d616c69676e6d656e742d636f6e666572656e63652d737065616b65722e6a7067, '844', 0x38323832352d476967614f4d537065616b65722e6a7067, 'bbbb', 0x31373734392d6775792d6b61776173616b692d6b65796e6f74652d737065616b65722e6a7067, 'asdfg', 'xcv', 0x32303134352d646f776e6c6f6164202832292e6a7067),
(7, 0x343932372d67616c6c6572795f315f313339373034313539302e6a706567, 'test conference 2', 'test', 0x38383937302d343830783438302e706e67, 'test', 0x34303938332d62617272792e706e67, 'test1', 0x38363836312d646176652d6665726775736f6e2d616c69676e6d656e742d636f6e666572656e63652d737065616b65722e6a7067, 'test23', 0x37343039302d74656d706c652e706e67, 'Borneo Convention Center, Kuching', 'test venue details', 0x38353039312d62672e6a7067),
(8, 0x31343132372d67616c6c6572795f315f313339373034313539302e6a706567, 'test conference 2', 'test conference for autistic', 0x35363837352d646f776e6c6f61642e6a7067, '1', 0x36373939362d476967614f4d537065616b65722e6a7067, '2', 0x343033332d62617272792e706e67, '3', 0x35333336372d646176652d6665726775736f6e2d616c69676e6d656e742d636f6e666572656e63652d737065616b65722e6a7067, 'Borneo Convention Center, Kuching', 'bcck\r\ntime : 10 00\r\ndate: 10/11/16', 0x33333730382d62672e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbldashboard`
--

CREATE TABLE IF NOT EXISTS `tbldashboard` (
  `dash_id` int(6) NOT NULL,
  `dash_name` varchar(50) NOT NULL,
  `conf_id` int(6) NOT NULL,
  `conf_details` text NOT NULL,
  `banner_image` longblob NOT NULL,
  `speaker1_id` int(6) NOT NULL,
  `speaker2_id` int(6) NOT NULL,
  `speaker3_id` int(6) NOT NULL,
  `venue_id` int(6) NOT NULL,
  `venue_image` longblob NOT NULL,
  `venue_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiries`
--

CREATE TABLE IF NOT EXISTS `tblenquiries` (
  `en_id` int(6) NOT NULL,
  `p_id` int(6) NOT NULL,
  `p_firstname` varchar(20) NOT NULL,
  `p_surname` varchar(30) NOT NULL,
  `msg_title` varchar(30) NOT NULL,
  `msg_enquiry` varchar(300) NOT NULL,
  `enquiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenquiries`
--

INSERT INTO `tblenquiries` (`en_id`, `p_id`, `p_firstname`, `p_surname`, `msg_title`, `msg_enquiry`, `enquiry_date`) VALUES
(181491, 848611, 'John', 'Cena', 'Password', 'Can you help me changing my password?', '2016-08-17'),
(963730, 318499, 'Rayner', 'Paun', 'Username', 'Is it possible to change my username?', '2016-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventmanager`
--

CREATE TABLE IF NOT EXISTS `tbleventmanager` (
  `em_id` int(6) NOT NULL,
  `em_username` varchar(15) DEFAULT NULL,
  `em_password` varchar(15) DEFAULT NULL,
  `em_firstname` varchar(15) DEFAULT NULL,
  `em_lastname` varchar(25) DEFAULT NULL,
  `em_phone` int(15) DEFAULT NULL,
  `em_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbleventmanager`
--

INSERT INTO `tbleventmanager` (`em_id`, `em_username`, `em_password`, `em_firstname`, `em_lastname`, `em_phone`, `em_email`) VALUES
(1, 'samu', 'admin', 'Sadeiyen', 'Samu Pillai', 145689784, 'samu@swinburne.edu.my');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedbacks`
--

CREATE TABLE IF NOT EXISTS `tblfeedbacks` (
  `fd_id` int(6) NOT NULL,
  `conf_name` varchar(50) NOT NULL,
  `p_id` int(6) NOT NULL,
  `p_firstname` varchar(20) NOT NULL,
  `p_surname` varchar(30) NOT NULL,
  `fd_subject` varchar(30) NOT NULL,
  `fd_comment` varchar(300) NOT NULL,
  `fd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfeedbacks`
--

INSERT INTO `tblfeedbacks` (`fd_id`, `conf_name`, `p_id`, `p_firstname`, `p_surname`, `fd_subject`, `fd_comment`, `fd_date`) VALUES
(286517, 'Autistic Children', 318499, 'Rayner', 'Paun', 'Awesome!', 'The food(only) was great!', '2016-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `tblhotel`
--

CREATE TABLE IF NOT EXISTS `tblhotel` (
  `hotel_id` int(6) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_address` varchar(100) NOT NULL,
  `hotel_city` varchar(30) NOT NULL,
  `hotel_state` varchar(30) NOT NULL,
  `hotel_zipcode` int(5) NOT NULL,
  `hotel_location_desc` varchar(500) NOT NULL,
  `hotel_contact` varchar(15) NOT NULL,
  `room_rate` int(4) NOT NULL,
  `hotel_feature_amenities` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhotel`
--

INSERT INTO `tblhotel` (`hotel_id`, `hotel_name`, `hotel_address`, `hotel_city`, `hotel_state`, `hotel_zipcode`, `hotel_location_desc`, `hotel_contact`, `room_rate`, `hotel_feature_amenities`) VALUES
(1, 'Riverside Majestic Hotel', 'Jalan Tunku Abdul Rahman, 93100 Kuching, Sarawak, Malaysia', 'Kuching', 'Sarawak', 93756, 'Located in Kuching City Centre, this hotel is within a 5-minute walk of Tun Jugah Shopping Center and Tua Pek Kong. Hills Shopping Mall and Chinese History Museum are also within 10 minutes.', '60 82-532 222', 130, 'This hotel features a restaurant, an outdoor pool, and a bar/lounge. Free WiFi in public areas and free self parking are also provided. Additionally, 24-hour room service, a business center, and conference rooms are onsite. All 241 rooms offer free WiFi, 24-hour room service, and LCD TVs with satellite channels. Minibars, coffee makers, and free newspapers are among the other amenities available to guests.'),
(2, 'Pullman Hotel Kuching', '1a Jalan Mathies, Sarawak, Kuching, Malaysia', 'Kuching', 'Sarawak', 93100, 'Located in Kuching City Centre, this luxury hotel is within a 5-minute walk of Hills Shopping Mall and Tun Jugah Shopping Center. Tua Pek Kong and Chinese History Museum are also within 10 minutes.', '60 82-222 888', 202, '2 restaurants, a full-service spa, and an outdoor pool are available at this hotel. WiFi in public areas is free. Additionally, a health club, a bar/lounge, and a poolside bar are onsite. All 389 rooms provide free WiFi, 24-hour room service, and satellite TV. Other amenities available to guests include minibars, free newspapers, and in-room massages.'),
(3, 'Grand Margherita Hotel', 'Jalan Tunku Abdul Rahman, Kuching, Sarawak, Malaysia', 'Kuching', 'Sarawak', 93748, 'This family-friendly Kuching hotel is located in the entertainment district, within a 10-minute walk of Tun Jugah Shopping Center, Hills Shopping Mall, and Chinese History Museum. Tua Pek Kong and Sarawak Tourism Complex are also within 15 minutes.', '60 82-418 911', 150, 'Along with a restaurant, this smoke-free hotel has an outdoor pool and a health club. Free WiFi in public areas and free self parking are also provided. Other amenities include a bar/lounge, a coffee shop/café, and 24-hour room service. All 288 rooms offer free WiFi and free wired Internet, plus 24-hour room service and satellite TV. Minibars, coffee makers, and free newspapers are among the other amenities available to guests.'),
(4, 'Hilton Hotel Kuching', 'Jalan Tunku Abdul Rahman, Kuching, Sarawak, Malaysia', 'Kuching', 'Sarawak', 93100, 'This family-friendly Kuching hotel is steps from Hills Shopping Mall and Tua Pek Kong. Tun Jugah Shopping Center and Chinese History Museum are also within 10 minutes.', '60 82-222 888', 275, '5 restaurants, an outdoor pool, and a 24-hour fitness center are available at this smoke-free hotel. Self parking is free. Additionally, a bar/lounge, a poolside bar, and a coffee shop/café are onsite. All 315 rooms offer WiFi, 24-hour room service, and LCD TVs with cable channels. Other amenities available to guests include wired Internet, minibars, and premium bedding.'),
(5, 'Grand Continental Hotel Kuching', 'Jalan Ban Hock,  Kuching, Sarawak, Malaysia', 'Kuching', 'Sarawak', 93100, 'Located in Kuching City Centre, this hotel is within a 10-minute walk of Tun Jugah Shopping Center and Hills Shopping Mall. Tua Pek Kong and South City Park are also within 1 mi (2 km)', '60 82-230 399', 137, 'This hotel features a restaurant, a coffee shop/café, and a 24-hour business center. Free WiFi in public areas and free self parking are also provided. Additionally, 24-hour room service, a business center, and conference rooms are onsite. All 180 rooms provide conveniences like refrigerators and coffee makers, plus free WiFi and 24-hour room service. LCD TVs, minibars, and free newspapers are among the other amenities available to guests.');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotifications`
--

CREATE TABLE IF NOT EXISTS `tblnotifications` (
  `n_id` int(6) NOT NULL,
  `p_id` int(6) NOT NULL,
  `notification_title` varchar(30) NOT NULL,
  `notification_message` varchar(500) NOT NULL,
  `em_id` int(6) DEFAULT NULL,
  `date_received` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotifications`
--

INSERT INTO `tblnotifications` (`n_id`, `p_id`, `notification_title`, `notification_message`, `em_id`, `date_received`, `status`) VALUES
(1, 318499, 'Booking successful.', 'Dear user, your booking is a success!', 1, '2016-11-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblparticipant`
--

CREATE TABLE IF NOT EXISTS `tblparticipant` (
  `p_id` int(6) NOT NULL,
  `p_username` varchar(20) DEFAULT NULL,
  `p_password` varchar(15) DEFAULT NULL,
  `p_firstname` varchar(20) DEFAULT NULL,
  `p_surname` varchar(30) DEFAULT NULL,
  `p_email` varchar(50) DEFAULT NULL,
  `p_phone` int(15) DEFAULT NULL,
  `p_dob` date DEFAULT NULL,
  `p_address` varchar(50) DEFAULT NULL,
  `p_country` varchar(30) DEFAULT NULL,
  `p_city` varchar(30) DEFAULT NULL,
  `p_state` varchar(30) DEFAULT NULL,
  `p_postalcode` varchar(10) DEFAULT NULL,
  `p_newsletter` tinyint(1) DEFAULT NULL,
  `p_occupation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=848612 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblparticipant`
--

INSERT INTO `tblparticipant` (`p_id`, `p_username`, `p_password`, `p_firstname`, `p_surname`, `p_email`, `p_phone`, `p_dob`, `p_address`, `p_country`, `p_city`, `p_state`, `p_postalcode`, `p_newsletter`, `p_occupation`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'asd', 1234569787, '1993-05-11', 'asdasdasd', 'malaysia', 'kuching', 'sarawak', '93350', 1, 'student'),
(299846, 'sel', '456', 'Selven', 'Samu', 'sel@gmail.com', 16804760, '1994-08-07', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Jenjarom', 'Selangor', '89507', 0, 'Student'),
(318499, 'neko', '123', 'Rayner', 'Paun', 'neko.hart@yahoo.com', 168047360, '1994-12-02', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Kota Kinabalu', 'Sabah', '89507', 1, 'Student'),
(848611, 'deez', '456', 'John', 'Cena', 'neko.hart@gmail.com', 16987456, '2016-05-20', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Sandakan', 'Sabah', '89507', 0, 'Studsss');

-- --------------------------------------------------------

--
-- Table structure for table `tblpasstype`
--

CREATE TABLE IF NOT EXISTS `tblpasstype` (
  `pass_id` int(6) NOT NULL,
  `pass_type` varchar(25) DEFAULT NULL,
  `pass_desc` text,
  `pass_price` int(5) DEFAULT NULL,
  `pass_amount` int(4) DEFAULT NULL,
  `pass_availability` int(4) NOT NULL,
  `conf_id` int(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpasstype`
--

INSERT INTO `tblpasstype` (`pass_id`, `pass_type`, `pass_desc`, `pass_price`, `pass_amount`, `pass_availability`, `conf_id`) VALUES
(1, 'Early Bird', 'For the early birds.', 50, 100, 99, 1),
(2, 'Normal', 'Effective after early bird period is over.', 100, 100, 99, 1),
(3, 'VIP', 'For the VIP.', 150, 50, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE IF NOT EXISTS `tblroom` (
  `room_id` int(6) NOT NULL,
  `hotel_id` int(6) NOT NULL,
  `room_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`room_id`, `hotel_id`, `room_type`) VALUES
(191261, 1, 'Family Room'),
(211881, 1, 'Business Suite'),
(235122, 2, 'Superior Room'),
(243433, 3, 'Single Room'),
(285075, 5, 'Double Room'),
(294452, 2, 'Double Room'),
(334521, 1, 'Double Room'),
(346243, 3, 'Superior Twin Suite'),
(374954, 4, 'Deluxe King Bedroom'),
(546714, 4, 'Executive Room'),
(568332, 2, 'Deluxe Room'),
(585685, 5, 'Single Room'),
(633583, 3, 'Double Room'),
(637203, 3, 'Junior Suite'),
(714295, 5, 'Executive Room'),
(733541, 1, 'Single Room'),
(739025, 5, 'Family Room'),
(783452, 2, 'Deluxe Twin Room'),
(832384, 4, 'Single Room'),
(837511, 1, 'Superior Twin Room'),
(853324, 4, 'King Guestroom Plus'),
(937522, 2, 'Single Room'),
(954164, 4, 'Double Room'),
(963813, 3, 'Executive Superior'),
(982735, 5, 'Deluxe Twin Room'),
(983631, 1, 'Deluxe King Room');

-- --------------------------------------------------------

--
-- Table structure for table `tblsession`
--

CREATE TABLE IF NOT EXISTS `tblsession` (
  `session_id` int(6) NOT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `speaker_id` int(6) DEFAULT NULL,
  `session_day` date DEFAULT NULL,
  `session_starttime` time DEFAULT NULL,
  `session_endtime` time DEFAULT NULL,
  `session_room` varchar(25) DEFAULT NULL,
  `session_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`session_id`, `conf_id`, `speaker_id`, `session_day`, `session_starttime`, `session_endtime`, `session_room`, `session_name`) VALUES
(1, 1, 1, '2016-05-17', '10:30:00', '11:00:00', '1', 'Helping autistic children.'),
(2, 1, 2, '2016-05-17', '10:30:00', '11:00:00', '2', 'Understanding autistic children.'),
(3, 1, 1, '2016-05-17', '11:00:00', '11:30:00', '1', 'Raising autistic children.'),
(8, 2, 3, '2016-10-18', '10:00:00', '11:00:00', '1', 'aasdasd'),
(9, 6, 21, '2016-11-23', '00:00:00', '01:12:00', '1', 'ASDF'),
(12, 6, 1, '2016-11-16', '01:00:00', '02:00:00', '1', 'asdfg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsession_participant`
--

CREATE TABLE IF NOT EXISTS `tblsession_participant` (
  `p_session_id` int(6) NOT NULL,
  `conf_id` int(6) NOT NULL,
  `session_id` int(6) NOT NULL,
  `participation_type` varchar(50) NOT NULL,
  `p_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession_participant`
--

INSERT INTO `tblsession_participant` (`p_session_id`, `conf_id`, `session_id`, `participation_type`, `p_id`) VALUES
(1087009, 1, 9, 'Chairing a session', 318499),
(3138321, 1, 1, 'Presenting a paper', 848611);

-- --------------------------------------------------------

--
-- Table structure for table `tblspeaker`
--

CREATE TABLE IF NOT EXISTS `tblspeaker` (
  `speaker_id` int(6) NOT NULL,
  `speaker_firstname` varchar(30) DEFAULT NULL,
  `speaker_lastname` varchar(40) DEFAULT NULL,
  `speaker_details` text,
  `speaker_image` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblspeaker`
--

INSERT INTO `tblspeaker` (`speaker_id`, `speaker_firstname`, `speaker_lastname`, `speaker_details`, `speaker_image`) VALUES
(1, 'Jonny', 'Test', 'Phd in something\r\nCurrent research: Bla Bla', ''),
(2, 'John', 'Snowy', '', ''),
(3, 'James', 'Cameron', 'Film maker\r\nCurrent research: Avatar', ''),
(4, 'Tony', 'Stark', '', ''),
(14, 'Barry', 'Prizant', '', ''),
(15, 'Barry3', 'Prizant', '', ''),
(16, 'Barry33', 'Prizant', '', ''),
(19, 'asd', 'asdasdasd', 'asdasd', 0x343731302d3131312e706e67),
(20, 'asd', 'asdasdasd', 'asdasd', 0x35373439312d3131312e706e67),
(21, 'test', 'speaker', 'test details', 0x37363535322d6775792d6b61776173616b692d6b65796e6f74652d737065616b65722e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tblsponsor`
--

CREATE TABLE IF NOT EXISTS `tblsponsor` (
  `sponsor_id` int(6) NOT NULL,
  `sponsor_name` varchar(50) DEFAULT NULL,
  `sponsor_email` varchar(50) DEFAULT NULL,
  `sponsor_phone` int(15) DEFAULT NULL,
  `sponsor_logo` longblob
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsponsor`
--

INSERT INTO `tblsponsor` (`sponsor_id`, `sponsor_name`, `sponsor_email`, `sponsor_phone`, `sponsor_logo`) VALUES
(1, 'Swinburne', 'swin@swiburne.edu.my', 123658479, 0x33343337322d646176652d6665726775736f6e2d616c69676e6d656e742d636f6e666572656e63652d737065616b65722e6a7067),
(3, 'KFC', 'kfc@hotmail.com', 1598631475, NULL),
(4, 'Swinburnez3', 'testttt@test.com', 146832151, ''),
(5, 'Swinburnez3', 'testttt@test.com', 146832154, ''),
(7, 'qqqq', 'qq@a.com', 123456777, 0x32313736322d),
(8, 'asdfgh', 'zzzz@gmail.com', 1231212121, 0x38363232372d),
(9, 'zxc', 'tp@tp.com', 1231212121, 0x34333437302d);

-- --------------------------------------------------------

--
-- Table structure for table `tbltour`
--

CREATE TABLE IF NOT EXISTS `tbltour` (
  `tour_id` int(6) NOT NULL,
  `tour_name` varchar(50) DEFAULT NULL,
  `tour_location` varchar(50) NOT NULL,
  `tour_price` int(5) NOT NULL,
  `tour_duration` varchar(40) NOT NULL,
  `tour_starttime` varchar(50) NOT NULL,
  `tour_image` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltour`
--

INSERT INTO `tbltour` (`tour_id`, `tour_name`, `tour_location`, `tour_price`, `tour_duration`, `tour_starttime`, `tour_image`) VALUES
(1, 'Bako National Park Day Trip', 'Bako National Park, Kuching, Sarawak', 280, '5-6', '7.30AM', ''),
(2, 'Amazing Rafflesia', 'Gunung Gading National Park, Kuching, Sarawak', 265, '5-8', '8.30AM', ''),
(3, 'Semenggoh Orangutans', 'Semenggoh Wildlife Centre, Kuching, Sarawak', 225, '3', '8.15AM', ''),
(4, 'zxc', 'zxz', 12321, '11', '00:31', 0x38353336382d466f746f7243726561746564312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbltourbookingdetails`
--

CREATE TABLE IF NOT EXISTS `tbltourbookingdetails` (
  `tourbooking_id` int(6) NOT NULL,
  `tour_id` int(6) NOT NULL,
  `p_id` int(6) DEFAULT NULL,
  `p_firstname` varchar(20) DEFAULT NULL,
  `p_surname` varchar(30) DEFAULT NULL,
  `confpass_reference` int(6) DEFAULT NULL,
  `tour_name` varchar(40) DEFAULT NULL,
  `tour_location` varchar(50) DEFAULT NULL,
  `tour_duration` varchar(40) DEFAULT NULL,
  `tour_starttime` varchar(40) DEFAULT NULL,
  `tour_startday` date NOT NULL,
  `tour_price` int(5) DEFAULT NULL,
  `booking_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltourbookingdetails`
--

INSERT INTO `tbltourbookingdetails` (`tourbooking_id`, `tour_id`, `p_id`, `p_firstname`, `p_surname`, `confpass_reference`, `tour_name`, `tour_location`, `tour_duration`, `tour_starttime`, `tour_startday`, `tour_price`, `booking_date`) VALUES
(325766, 1, 848611, 'John', 'Cena', NULL, 'Bako National Park Day Trip', 'Bako National Park, Kuching, Sarawak', '5', '7.30AM', '2016-12-23', 250, '2016-10-28'),
(347981, 1, 318499, 'Rayner', 'Paun', NULL, 'Bako National Park Day Trip', 'Bako National Park, Kuching, Sarawak', '5', '7.30AM', '2016-11-18', 250, '2016-11-09'),
(513657, 1, 318499, 'Rayner', 'Paun', NULL, 'Bako National Park Day Trip', 'Bako National Park, Kuching, Sarawak', '5', '7.30AM', '2016-11-07', 250, '2016-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblvenue`
--

CREATE TABLE IF NOT EXISTS `tblvenue` (
  `venue_id` int(6) NOT NULL,
  `venue_name` varchar(50) DEFAULT NULL,
  `venue_address` varchar(80) DEFAULT NULL,
  `venue_nrooms` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=200007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvenue`
--

INSERT INTO `tblvenue` (`venue_id`, `venue_name`, `venue_address`, `venue_nrooms`) VALUES
(200002, 'Borneo Convention Center, Kuching', 'The Isthmus, Sejingkat, 93050 Kuching, Sarawak, Malaysia', 3),
(200003, 'BCCK2', 'Kuching', 10),
(200005, 'home', 'kuching', 5),
(200006, 'test venue', 'test address venue', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
  ADD PRIMARY KEY (`booking_id`), ADD KEY `p_id` (`p_id`), ADD KEY `confpass_reference` (`confpass_reference`), ADD KEY `tblbookingdetails_ibfk_3` (`room_id`);

--
-- Indexes for table `tblcaterer`
--
ALTER TABLE `tblcaterer`
  ADD PRIMARY KEY (`caterer_id`);

--
-- Indexes for table `tblconference`
--
ALTER TABLE `tblconference`
  ADD PRIMARY KEY (`conf_id`), ADD KEY `em_id` (`em_id`), ADD KEY `caterer_id` (`caterer_id`), ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `tblconf_participant`
--
ALTER TABLE `tblconf_participant`
  ADD PRIMARY KEY (`confpass_reference`), ADD KEY `conf_id` (`conf_id`), ADD KEY `p_id` (`p_id`), ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `tblconf_speaker`
--
ALTER TABLE `tblconf_speaker`
  ADD PRIMARY KEY (`cspeak_index`), ADD KEY `conf_id` (`conf_id`), ADD KEY `speaker_id` (`speaker_id`);

--
-- Indexes for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
  ADD PRIMARY KEY (`cs_index`), ADD KEY `conf_id` (`conf_id`), ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Indexes for table `tbldash`
--
ALTER TABLE `tbldash`
  ADD PRIMARY KEY (`dash_id`), ADD UNIQUE KEY `dash_id` (`dash_id`);

--
-- Indexes for table `tbldashboard`
--
ALTER TABLE `tbldashboard`
  ADD PRIMARY KEY (`dash_id`);

--
-- Indexes for table `tblenquiries`
--
ALTER TABLE `tblenquiries`
  ADD PRIMARY KEY (`en_id`), ADD KEY `tblenquiries_ibfk_1` (`p_id`);

--
-- Indexes for table `tbleventmanager`
--
ALTER TABLE `tbleventmanager`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tblfeedbacks`
--
ALTER TABLE `tblfeedbacks`
  ADD PRIMARY KEY (`fd_id`), ADD KEY `tblfeedbacks_ibfk_1` (`p_id`);

--
-- Indexes for table `tblhotel`
--
ALTER TABLE `tblhotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tblparticipant`
--
ALTER TABLE `tblparticipant`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tblpasstype`
--
ALTER TABLE `tblpasstype`
  ADD PRIMARY KEY (`pass_id`), ADD KEY `conf_id` (`conf_id`), ADD KEY `conf_id_2` (`conf_id`);

--
-- Indexes for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`room_id`), ADD KEY `tblroom_ibfk_1` (`hotel_id`);

--
-- Indexes for table `tblsession`
--
ALTER TABLE `tblsession`
  ADD PRIMARY KEY (`session_id`), ADD KEY `conf_id` (`conf_id`), ADD KEY `speaker_id` (`speaker_id`);

--
-- Indexes for table `tblsession_participant`
--
ALTER TABLE `tblsession_participant`
  ADD PRIMARY KEY (`p_session_id`), ADD KEY `tblsession_participant_ibfk_1` (`session_id`), ADD KEY `tblsession_participant_ibfk_2` (`p_id`);

--
-- Indexes for table `tblspeaker`
--
ALTER TABLE `tblspeaker`
  ADD PRIMARY KEY (`speaker_id`), ADD FULLTEXT KEY `speaker_firstname` (`speaker_firstname`);

--
-- Indexes for table `tblsponsor`
--
ALTER TABLE `tblsponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `tbltour`
--
ALTER TABLE `tbltour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tbltourbookingdetails`
--
ALTER TABLE `tbltourbookingdetails`
  ADD PRIMARY KEY (`tourbooking_id`), ADD KEY `tbltourbookingdetails_ibfk_1` (`p_id`), ADD KEY `tbltourbookingdetails_ibfk_2` (`confpass_reference`);

--
-- Indexes for table `tblvenue`
--
ALTER TABLE `tblvenue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
  MODIFY `booking_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=767615;
--
-- AUTO_INCREMENT for table `tblcaterer`
--
ALTER TABLE `tblcaterer`
  MODIFY `caterer_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100007;
--
-- AUTO_INCREMENT for table `tblconference`
--
ALTER TABLE `tblconference`
  MODIFY `conf_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblconf_speaker`
--
ALTER TABLE `tblconf_speaker`
  MODIFY `cspeak_index` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
  MODIFY `cs_index` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbldash`
--
ALTER TABLE `tbldash`
  MODIFY `dash_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbldashboard`
--
ALTER TABLE `tbldashboard`
  MODIFY `dash_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbleventmanager`
--
ALTER TABLE `tbleventmanager`
  MODIFY `em_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  MODIFY `n_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblparticipant`
--
ALTER TABLE `tblparticipant`
  MODIFY `p_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=848612;
--
-- AUTO_INCREMENT for table `tblpasstype`
--
ALTER TABLE `tblpasstype`
  MODIFY `pass_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblsession`
--
ALTER TABLE `tblsession`
  MODIFY `session_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblspeaker`
--
ALTER TABLE `tblspeaker`
  MODIFY `speaker_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tblsponsor`
--
ALTER TABLE `tblsponsor`
  MODIFY `sponsor_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbltour`
--
ALTER TABLE `tbltour`
  MODIFY `tour_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblvenue`
--
ALTER TABLE `tblvenue`
  MODIFY `venue_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200007;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbookingdetails`
--
ALTER TABLE `tblbookingdetails`
ADD CONSTRAINT `tblbookingdetails_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`) ON DELETE CASCADE,
ADD CONSTRAINT `tblbookingdetails_ibfk_2` FOREIGN KEY (`confpass_reference`) REFERENCES `tblconf_participant` (`confpass_reference`) ON DELETE CASCADE,
ADD CONSTRAINT `tblbookingdetails_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `tblroom` (`room_id`) ON DELETE CASCADE;

--
-- Constraints for table `tblconference`
--
ALTER TABLE `tblconference`
ADD CONSTRAINT `tblconference_ibfk_1` FOREIGN KEY (`em_id`) REFERENCES `tbleventmanager` (`em_id`),
ADD CONSTRAINT `tblconference_ibfk_2` FOREIGN KEY (`caterer_id`) REFERENCES `tblcaterer` (`caterer_id`),
ADD CONSTRAINT `tblconference_ibfk_3` FOREIGN KEY (`venue_id`) REFERENCES `tblvenue` (`venue_id`);

--
-- Constraints for table `tblconf_participant`
--
ALTER TABLE `tblconf_participant`
ADD CONSTRAINT `tblconf_participant_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
ADD CONSTRAINT `tblconf_participant_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`),
ADD CONSTRAINT `tblconf_participant_ibfk_3` FOREIGN KEY (`pass_id`) REFERENCES `tblpasstype` (`pass_id`);

--
-- Constraints for table `tblconf_speaker`
--
ALTER TABLE `tblconf_speaker`
ADD CONSTRAINT `tblconf_speaker_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
ADD CONSTRAINT `tblconf_speaker_ibfk_2` FOREIGN KEY (`speaker_id`) REFERENCES `tblspeaker` (`speaker_id`);

--
-- Constraints for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
ADD CONSTRAINT `tblconf_sponsor_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
ADD CONSTRAINT `tblconf_sponsor_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `tblsponsor` (`sponsor_id`);

--
-- Constraints for table `tblenquiries`
--
ALTER TABLE `tblenquiries`
ADD CONSTRAINT `tblenquiries_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`) ON DELETE CASCADE;

--
-- Constraints for table `tblfeedbacks`
--
ALTER TABLE `tblfeedbacks`
ADD CONSTRAINT `tblfeedbacks_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`) ON DELETE CASCADE;

--
-- Constraints for table `tblpasstype`
--
ALTER TABLE `tblpasstype`
ADD CONSTRAINT `tblpasstype_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`);

--
-- Constraints for table `tblroom`
--
ALTER TABLE `tblroom`
ADD CONSTRAINT `tblroom_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `tblhotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsession`
--
ALTER TABLE `tblsession`
ADD CONSTRAINT `tblsession_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`),
ADD CONSTRAINT `tblsession_ibfk_2` FOREIGN KEY (`speaker_id`) REFERENCES `tblspeaker` (`speaker_id`);

--
-- Constraints for table `tblsession_participant`
--
ALTER TABLE `tblsession_participant`
ADD CONSTRAINT `tblsession_participant_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `tblsession` (`session_id`) ON DELETE CASCADE,
ADD CONSTRAINT `tblsession_participant_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbltourbookingdetails`
--
ALTER TABLE `tbltourbookingdetails`
ADD CONSTRAINT `tbltourbookingdetails_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`),
ADD CONSTRAINT `tbltourbookingdetails_ibfk_2` FOREIGN KEY (`confpass_reference`) REFERENCES `tblconf_participant` (`confpass_reference`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
