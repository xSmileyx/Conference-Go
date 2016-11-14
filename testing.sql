-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2016 at 05:06 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=716683 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookingdetails`
--

INSERT INTO `tblbookingdetails` (`booking_id`, `p_id`, `p_firstname`, `p_surname`, `confpass_reference`, `room_id`, `start_date`, `end_date`, `adults`, `children`, `room_requirements`, `special_requirements`, `booking_date`) VALUES
(228706, 318499, 'Rayner', 'Paun', NULL, 235122, '2016-11-14', '2016-11-14', 1, 2, 'Non smoking', 'Wee`', '2016-11-14'),
(312308, 318499, 'Rayner', 'Paun', 592592, 637203, '2017-05-11', '2017-05-11', 1, 0, 'Smoking', 'Weed~', '2016-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tblcaterer`
--

CREATE TABLE IF NOT EXISTS `tblcaterer` (
  `caterer_id` int(6) NOT NULL,
  `caterer_name` varchar(40) DEFAULT NULL,
  `caterer_phone` int(15) DEFAULT NULL,
  `caterer_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100005 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcaterer`
--

INSERT INTO `tblcaterer` (`caterer_id`, `caterer_name`, `caterer_phone`, `caterer_email`) VALUES
(100001, 'MB Caterers', 1231111111, ''),
(100002, 'Joyous Gourmet Catering', 146832151, ''),
(100003, 'SRC Catering', 597865489, NULL),
(100004, 'Joyous Gourmt Catering3', 128754123, 'jgc@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconference`
--

INSERT INTO `tblconference` (`conf_id`, `conf_name`, `conf_startdate`, `conf_enddate`, `conf_numpass`, `caterer_id`, `venue_id`, `em_id`, `conf_desc`) VALUES
(1, 'Autistic Children', '2017-05-17', '2017-05-19', 300, 100002, 200002, 1, 'Talk and learn on how to help autistic children!'),
(2, 'Artificial Intelligence', '2017-10-13', '2017-10-15', 100, 100001, 200003, 1, 'Learn how intelligence machines shapes our world!'),
(4, 'ads', '2015-10-13', '0000-00-00', 100, 100001, 200002, 1, 'asdfad'),
(5, 'Test conference', '2015-10-13', '2015-10-15', 100, 100003, 200003, 1, ''),
(6, 'Test conference 2', '2016-10-18', '2015-10-25', 10, 100002, 200003, 1, '');

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
(1, 848611, 406341, 2, '2016-11-13', 0),
(1, 318499, 592592, 1, '2016-11-14', 0),
(2, 848611, 721688, 6, '2016-11-13', 0),
(2, 318499, 851965, 5, '2016-11-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_speaker`
--

CREATE TABLE IF NOT EXISTS `tblconf_speaker` (
  `cspeak_index` int(6) NOT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `speaker_id` int(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconf_speaker`
--

INSERT INTO `tblconf_speaker` (`cspeak_index`, `conf_id`, `speaker_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 4),
(4, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tblconf_sponsor`
--

CREATE TABLE IF NOT EXISTS `tblconf_sponsor` (
  `cs_index` int(6) NOT NULL,
  `sponsor_id` int(6) DEFAULT NULL,
  `conf_id` int(6) DEFAULT NULL,
  `amount_provided` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconf_sponsor`
--

INSERT INTO `tblconf_sponsor` (`cs_index`, `sponsor_id`, `conf_id`, `amount_provided`) VALUES
(1, 1, 1, 100000),
(2, 3, 1, 50000),
(3, 3, 4, 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldash`
--

INSERT INTO `tbldash` (`dash_id`, `banner_image`, `event_name`, `event_desc`, `event_image`, `key_spname1`, `key_sp1`, `key_spname2`, `key_sp2`, `key_spname3`, `key_sp3`, `venue_name`, `details`, `venue_image`) VALUES
(3, 0x32343934392d3131312e706e67, 'Autistic Children', 'Talk and learn on how to help autistic children!', 0x32363832352d3131312e706e67, 'Johnny Test', 0x37353039362d3131312e706e67, 'James Cameron', 0x38383031382d3131312e706e67, 'John Snowy', 0x34303838392d3131312e706e67, 'Borneo Convention Center, Kuching', 'Best convention centre in town!', 0x38373438302d3131312e706e67);

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
(1, 'Samu', 'admin', 'Sadeiyen', 'Samu Pillai', 145689784, 'samu@swinburne.edu.my');

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
  `hotel_image` longblob NOT NULL,
  `hotel_address` varchar(100) NOT NULL,
  `hotel_location_desc` varchar(500) NOT NULL,
  `hotel_contact` varchar(15) NOT NULL,
  `room_rate` int(4) NOT NULL,
  `hotel_feature_amenities` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhotel`
--

INSERT INTO `tblhotel` (`hotel_id`, `hotel_name`, `hotel_image`, `hotel_address`, `hotel_location_desc`, `hotel_contact`, `room_rate`, `hotel_feature_amenities`) VALUES
(1, 'Riverside Majestic Hotel', 0x39343432302d7269766572736964652e6a7067, 'Jalan Tunku Abdul Rahman, 93100 Kuching, Sarawak, Malaysia', 'Located in Kuching City Centre, this hotel is within a 5-minute walk of Tun Jugah Shopping Center and Tua Pek Kong. Hills Shopping Mall and Chinese History Museum are also within 10 minutes.', '168047360', 130, 'This hotel features a restaurant, an outdoor pool, and a bar/lounge. Free WiFi in public areas and free self parking are also provided. Additionally, 24-hour room service, a business center, and conference rooms are onsite. All 241 rooms offer free WiFi, 24-hour room service, and LCD TVs with satellite channels. Minibars, coffee makers, and free newspapers are among the other amenities available to guests.'),
(2, 'Pullman Hotel Kuching', 0x37323030352d70756c6c6d616e2e6a7067, '1a Jalan Mathies, Sarawak, Kuching, Malaysia', 'Located in Kuching City Centre, this luxury hotel is within a 5-minute walk of Hills Shopping Mall and Tun Jugah Shopping Center. Tua Pek Kong and Chinese History Museum are also within 10 minutes.', '168034125', 202, '2 restaurants, a full-service spa, and an outdoor pool are available at this hotel. WiFi in public areas is free. Additionally, a health club, a bar/lounge, and a poolside bar are onsite. All 389 rooms provide free WiFi, 24-hour room service, and satellite TV. Other amenities available to guests include minibars, free newspapers, and in-room massages.'),
(3, 'Grand Continental Hotel Kuching', 0x313834382d6772616e642e6a7067, 'Jalan Ban Hock,  Kuching, Sarawak, Malaysia', 'Located in Kuching City Centre, this hotel is within a 10-minute walk of Tun Jugah Shopping Center and Hills Shopping Mall. Tua Pek Kong and South City Park are also within 1 mile (2 km)', '148037760', 137, 'This hotel features a restaurant, a coffee shop/cafÃ©, and a 24-hour business center. Free WiFi in public areas and free self parking are also provided. Additionally, 24-hour room service, a business center, and conference rooms are onsite. All 180 rooms provide conveniences like refrigerators and coffee makers, plus free WiFi and 24-hour room service. LCD TVs, minibars, and free newspapers are among the other amenities available to guests.');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotifications`
--

INSERT INTO `tblnotifications` (`n_id`, `p_id`, `notification_title`, `notification_message`, `em_id`, `date_received`, `status`) VALUES
(3, 318499, 'Hello!', 'Greetings!', 1, '2016-11-13', 0),
(4, 848611, 'Who??', 'Its John Cenaaaaa~! Tutututtuuu~', 1, '2016-11-13', 0);

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
(123456, 'asd', 'asd', 'asd', 'asd', 'asd', 1234569787, '1993-05-11', 'asdasdasd', 'malaysia', 'kuching', 'sarawak', '93350', 1, 'student'),
(299846, 'sel', '456', 'Selven', 'Samu', 'sel@gmail.com', 16804760, '1994-08-07', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Jenjarom', 'Selangor', '89507', 0, 'Student'),
(318499, 'neko', '123', 'Rayner', 'Paun', 'neko.hart@yahoo.com', 168047360, '1994-12-02', 'Kg.Maang, P.O BOX 242 Penampang', 'Malaysia', 'Kota Kinabalu', 'Sabah', '89507', 1, 'Student'),
(848611, 'deez', '456', 'John', 'Cena', 'john.cena@gmail.com', 154173010, '1977-04-23', '1205 E 12th Ave, Tampa, FL 33605', 'United States', 'Tampa', 'Florida', '33605', 0, 'Wrestler');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpasstype`
--

INSERT INTO `tblpasstype` (`pass_id`, `pass_type`, `pass_desc`, `pass_price`, `pass_amount`, `pass_availability`, `conf_id`) VALUES
(1, 'Early Bird', 'For the early birds.', 50, 100, 99, 1),
(2, 'Normal', 'Effective after early bird passes are over.', 100, 100, 99, 1),
(3, 'VIP', 'For the VIP.', 150, 50, 50, 1),
(4, 'Early Bird', 'For the early birds.', 70, 100, 100, 2),
(5, 'Normal', 'Effective after early bird passes are over.', 100, 200, 199, 2),
(6, 'Premium', 'For the premium participants.', 200, 30, 29, 2);

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
(294452, 2, 'Double Room'),
(334521, 1, 'Double Room'),
(346243, 3, 'Superior Twin Suite'),
(568332, 2, 'Deluxe Room'),
(633583, 3, 'Double Room'),
(637203, 3, 'Business Suite'),
(733541, 1, 'Single Room'),
(783452, 2, 'Deluxe Twin Room'),
(837511, 1, 'Superior Twin Room'),
(937522, 2, 'Single Room'),
(963813, 3, 'Executive Superior'),
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`session_id`, `conf_id`, `speaker_id`, `session_day`, `session_starttime`, `session_endtime`, `session_room`, `session_name`) VALUES
(1, 1, 1, '2017-05-17', '10:30:00', '11:00:00', '1', 'Helping autistic children.'),
(2, 1, 2, '2017-05-18', '10:30:00', '11:00:00', '2', 'Understanding autistic children.'),
(3, 1, 1, '2017-05-18', '10:30:00', '11:30:00', '1', 'Raising autistic children.'),
(4, 1, 3, '2017-05-19', '10:00:00', '11:00:00', '1', 'Speech about autistic children.'),
(5, 2, 14, '2017-10-13', '13:00:00', '15:00:00', '3', 'Logical path of ethical AI'),
(6, 2, 6, '2017-10-14', '10:00:00', '12:00:00', '3', 'AI vs Human'),
(7, 2, 5, '2017-10-15', '09:00:00', '11:30:00', '3', 'AI: Apocalypse or Salvation?');

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
(3138321, 1, 1, 'Presenting a paper', 848611),
(4063411, 1, 1, 'Participating in a symposium', 848611),
(4063413, 1, 3, 'Chairing a session', 848611),
(5925921, 1, 1, 'Presenting a paper', 318499),
(5925922, 1, 2, 'Presenting a keynote or invited address', 318499),
(5925923, 1, 3, 'Chairing a session', 318499),
(5925924, 1, 4, 'Participating in a symposium', 318499),
(7216885, 2, 5, 'Participating in a symposium', 848611),
(7216887, 2, 7, 'Presenting a paper', 848611),
(8519655, 2, 5, 'Presenting a paper', 318499),
(8519656, 2, 6, 'Chairing a session', 318499),
(8519657, 2, 7, 'Presenting a paper', 318499);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblspeaker`
--

INSERT INTO `tblspeaker` (`speaker_id`, `speaker_firstname`, `speaker_lastname`, `speaker_details`, `speaker_image`) VALUES
(1, 'Jonny', 'Test', 'Phd in something\r\nCurrent research: Bla Bla', ''),
(2, 'John', 'Snowy', '', ''),
(3, 'James', 'Cameron', 'Film maker\r\nCurrent research: Avatar', ''),
(4, 'Tony', 'Stark', '', ''),
(5, 'Janet', 'Van Dyne', '', ''),
(6, 'Bruce', 'Banner', '', ''),
(14, 'Henry', 'Pym', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsponsor`
--

INSERT INTO `tblsponsor` (`sponsor_id`, `sponsor_name`, `sponsor_email`, `sponsor_phone`, `sponsor_logo`) VALUES
(1, 'Swinburne', 'swin@swiburne.edu.my', 123658479, ''),
(3, 'KFC', 'kfc@hotmail.com', 1598631475, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltour`
--

CREATE TABLE IF NOT EXISTS `tbltour` (
  `tour_id` int(6) NOT NULL,
  `tour_name` varchar(50) DEFAULT NULL,
  `tour_location` varchar(50) NOT NULL,
  `tour_price` int(5) NOT NULL,
  `tour_duration` varchar(10) NOT NULL,
  `tour_starttime` time NOT NULL,
  `tour_image` longblob NOT NULL,
  `includes` varchar(200) NOT NULL,
  `excludes` varchar(200) NOT NULL,
  `remarks` varchar(2000) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `validity` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltour`
--

INSERT INTO `tbltour` (`tour_id`, `tour_name`, `tour_location`, `tour_price`, `tour_duration`, `tour_starttime`, `tour_image`, `includes`, `excludes`, `remarks`, `description`, `validity`) VALUES
(1, 'Mulu Caves and Pinnacles', 'Miri, Sarawak', 1548, '3 day(s)', '09:00:00', 0x32373537382d6d756c752e6a7067, '- 1 night accommodation at Mulu Marriott & Spa.\n- 2 nights accommodation at Camp 5 - Dormitory.\n- 3 breakfast, 3 lunch & 2 dinner\n- Entrance fee, guide fee, boat transfers.\n- All transfers & tours', 'Airfare, Airport Tax, Tipping, Optional Tour, Travel Insurance & Personal MISC Expenses, Subject to 6% GST.', 'The above rate only valid for Malaysian market. \r\nAdditional RM 25.00 to be add on for International market.\r\nSurcharge of RM 40.00 per room per night from 01st November 2015 until 31st March 2017.\r\n: Rates quote are based on group of 2 Adults and above per person. \r\nItems to bring: Flat shoes with good gripping-soles, light cotton, clothing, torch light, insect repellent, raincoat, towel, swim wear, own drinking bottle, personal toiletries & first aid kit. \r\nAdvisable to pack a light overnight bag for stay in longhouses, national parks, jungle, beaches and caves. \r\n: All rates quoted are in Malaysia ringgit and base on Twin / Triple Share (SIC basis).\r\nNo child rate.\r\nEvery person participating in any tour or holiday organized shall do so at his/her own risk. The company will not be responsible for any loss or additional expenses due to delay, sickness, weather, strikes, war, quarantine or related factors.', 'Day 01\r\n\r\nArrival - Deer Cave - Lang Cave\r\nUpon arrival Mulu Airport, meet and greet by our friendly representative and transfer to Mulu Marriott Resort & Spa for check in. Afternoon meet at resort lobby and transfer to Mulu National Park headquarters. Upon registration and proceed on plank walk for 3 Km to reach Deer Cave & Lang Cave. After exploring the caves, proceed to bats observatory to observe bats flying out of caves entrance at late evening (Only confine to fine weather). Return journey on the same plank walk to park headquarters and transfer back to resort & overnight.\r\n\r\nDay 02\r\n\r\nPenan Settlement - Wind Cave - Clearwater Cave - Long Litut\r\nBreakfast at resort and transfer by longboat proceed to Batu Bungan - Penan Settlement, to observe the tribe lifestyle and to select handicrafts on display for sale at Penan Settlement. Continue journey by longboat to Wind Cave and Clearwater Cave. Picnic lunch at Clearwater summer huts. relax for a while then continue journey by longboat to Long Litut. Then jungle trek for 3 hours to Camp 5. Dinner and overnight at Camp 5.\r\n\r\nDay 03\r\n\r\nGunung Api ~ Pinnacles\r\nBreakfast at Camp 5. After breakfast ascend to Gunung Api for 3 hours to view the magnificent Pinnacles. During the climb you will see many species of plants, all types of insects within this virgin jungle of Borneo. Pack lunch will be serve at the observatory point. After lunch descend to Camp 5. Dinner and overnight at Camp 5.\r\n\r\nDay 04\r\n\r\nLong Litut - Departure\r\nBreakfast at Camp 5 and jungle trek to Long Litut and transfer to Clearwater summer hut for picnic lunch and later on you can enjoy swimming at the clear water spring. Transfer by longboat to Mulu airport for flight to your next destination. ', '2017-10-21'),
(2, 'Bako and Iban Longhouse', 'Bako, Kuching', 1625, '5 day(s)', '05:30:00', 0x36373838312d62616b6f2e6a7067, '2 nights accommodation at City Hotel as your choice, 2 night accommodation at Hilton International Batang Ai Longhouse Resort. 4 Breakfast, 3 Lunches & 2 Dinner. Guided Kuching City & Shopping Tour, B', 'Airfare, Airport Tax, Tipping, Optional Tour, Travel Insurance & Personal MISC Expenses, Peak Season Surcharge.', 'Rates quote are based on group of 2 Adults and above per person. Please bring torchlight, Insect repellent, raincoat, towel, swim wear& own drinking bottle.	Guesthouse accommodation is based on a very BASIC CONCEPT and dormitories style with basic facilities only. Advisable to pack a light overnight bag for stay in longhouses, national parks, jungle, beaches and caves. : Child with 1/2 share room will 90% of adult rate, Child with extra bed will be 80% of adult rate and Child without extra bed will be 60% of adult rate. S.O.T. (Suggest Optional Tour) is chargeable accordingly. Strictly for Malaysian, Indonesian, Bruneian & Singaporean only. Sequence of the tour is subject to change. Package rate subject to change without prior notice. Every person participating in any tour or holiday organized shall do so at his/her own risk. The organizer will not be responsible for any loss or additional expenses due to delay, disease outbreaks, weather, war, quarantine or other factors beyond control.', '\r\nDay 01\r\n\r\nArrival\r\nUpon arrival at Kuching International Airport, meet and greet by our friendly representative and transfer to City Hotel of your choice for check in and overnight.\r\n\r\nDay 02\r\n\r\nTraditional Iban Longhouse Safari\r\nBreakfast at the hotel, morning check out from the hotel and proceed for TRADITIONAL IBAN LONGHOUSE SAFARI. A village of 20 - 25 "bilek" or rooms (each for one family) all under one roof of a long stretchwooden house standing on stilts. The expedition will begin with a 4 hours car ride passing through the scenic greenery countryside. The vast land on both side of the road are can be seen dotted with vegetable farms, padi fields, rubber, pepper, oil palm and cocoa plantations which generated some of the top revenue earner crops of Sarawak. En route you will have a brief stopover at small native town called Serian for a chance to experience the busy daily wet market and witness some of the rare jungle produce brought by the native from the deep jungle to sell to the town folks. Another en route for a brief lunch break at "Lachau" small popular "cowboy" town for Indonesian natives from the nearby Kalimantan border town to do barter trade without proper document. You could do your last minutes shopping for the visiting gift to present to your Iban host. The car ride will end at a river bank where a further native longboat ride will take you upstream. The journey varies depending on the water level of the river and which longhouse from 20 mins to nearly an hour. Poling under trees bending protectively over the river and shooting rapids (during dry season, you might be required to get down and help the boatman to drag the boat for a short distance) before arriving at your destination. Upon arrival at the longhouse, you can tour around the longhouse while the "semi-wild" boars and hunting dogs running nearby. You can mingle with the longhouse folks & talk about their daily activities and the communal style of living at the longhouse or share your side of the story. Cool off and relax yourself in the river is one of the best thing to do after the whole long journey. After dinner, you will be led to the longhouse again. The Iban maidens and Ã¢â‚¬ËœwarriorsÃ¢â‚¬â„¢ will perform a welcome dance while "tuak" - the locally brewed rice wines are served as welcome drink. Overnight at Iban Longhouse''s Guesthouse.\r\n\r\nDay 03\r\n\r\nLonghouse Activities - Nature Walk\r\nAfter breakfast, you will be invited to watch the demonstration of one of the Iban favourite gambling game - "cock fighting" and using of the blowpipe will be held at the open space. The is a chance for you to try on this popular leisure game and polish your skill of using the deadly weapon - "blowpipe". Afternoon proceed for nature walk. You will be then be brought back to the river bank to proceed for a short car ride and another 20 mins boat ride across a man-make lake that will bring you to the luxury longhouse resort. Check in at the Hilton International Batang Ai Longhouse Resort. For those who have more energy to spare can join the Nature Walk led by the in-house "naturalist". The 2 km jungle trekking will bring you into the unspoilt jungle nearby the resort to learn about plants and animals that enable the native to survive without modern facilities. There will be a 60 metres long "canopy walk" hanging 30 metres above the ground and a 40 metres high platform to enable you to enjoy a good bird eyes view of the surrounding. Lunch & Dinner is provided. Overnight at the resort.\r\n\r\nDay 04\r\n\r\nTraditional Iban Longhouse Safari\r\nAfter breakfast at the Resort, proceed for TRADITIONAL IBAN LONGHOUSE SAFARI. A village of 20 - 25 "bilek" or rooms (each for one family) all under one roof of a long stretch wooden house standing on stilts. Upon arrival at the riverbank, the native long boat ride will take you upstream. Boat ride journey varies depending on which longhouse and water level of the river from 30 min to nearly an hour. Poling under tress bending protectively over the river and shooting rapids (during dry season, you might be required get down and help the boatman to drag the boat for a short distance) before arriving at your destination. Upon arrival at the Longhouse, you can turn around the longhouse while the "semi-wild" boars and hunting dogs running nearby. You can mingle with the Longhouse folks & talk about their daily activities and the communal style of living at the Longhouse or share your side of the story. The Iban maidens and "warriors" will perform a welcome dance while "tuak" - the locally brewed rice wine are served as welcome drink. Demonstration of their favourite gambling game - "cock fighting" and using of the blowpipe will be held at the open space. This is a chance for you to try on this popular leisure game and polish your skill of using the deadly weapon - "blowpipe". Lunch is provided, after lunch, you will then be brought back to the riverbank transfer back to the Resort. For those who have more energy to spa', '2017-10-06'),
(3, 'Kayaking Through Nature', 'Borneo Highlands, Kuching', 188, '6 hour(s)', '07:00:00', 0x363638332d6b6179616b2e6a7067, '- Transport, packed lunch and mineral water.\r\n- 6% GST', 'Personal Expenses', '- Rates quote are based on Seat In Coach basis. \r\n- Rates subject to change without prior notice. \r\n- Every person participating in any tour or holiday organized shall do so at his/her own risk. The organizer will not be responsible for any loss or additional expenses due to delay, disease outbreaks, natural disasters, war or other factors beyond control. \r\nItems to bring : Light clothing, towel swim wear, waterproof camera, insect repellent, sun block & flat shoe.', 'After about 40 minutes drive from town you are transported to the mist covered hill sides of Borneo Highlands with undulating terrain dotted by small scale pepper farms where you''ll alight at Bengoh, a delightful Bidayuh village and staging point for journeys by foot or rivers deep into the interiors. Here you''ll be given brief paddling instructions and safety briefing before proceeding down some steps to a small tributary where your parked kayaks await you for a group photo opportunity before we embark on our kayaking adventure. This shaded stream with overhanging trees, steep banks and a bridge overhead has just enough room for your kayaks to get through and meanders a short distance before opening into the vista of Sg. Sarawak Kiri. The wider rive will allow an easier passage and open up vistas with views of the secondary forests and the farmlands of the local villagers. Youâ€™ll see bananas and cocoa trees growing on these pockets of farm land. The gentle flowing river aids the journey and soon everyone will be paddling with confidence and enjoying the scenery as well as the fresh air. Sounds of birds and insects accompanied the kayakers along the entire journey culminating In the sights of unique limestone rock outcrop formations on the right side of the river which makes for a wonderful photo-opportunity for all. A short paddle away after this we will reach Kg Danu where we will alight on a pebbled island under a pedestrian only suspension bridge. A walk up some steps, a short stroll across the suspension bridge while taking in the panaromic views and youâ€™ll be across the river to Kg Semadang where your transport awaits you for the return journey to Kuching with memorable memories of your rainforest kayaking experience. (Packed lunch will be provided).', '2017-05-18');

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
(318994, 1, 318499, 'Rayner', 'Paun', 851965, 'Mulu Caves and Pinnacles', 'Miri, Sarawak', '3 day(s)', '09:00:00', '2017-10-21', 1548, '2016-11-14'),
(562421, 3, 318499, 'Rayner', 'Paun', NULL, 'Kayaking Through Nature', 'Borneo Highlands, Kuching', '6 hour(s)', '07:00:00', '2016-11-14', 188, '2016-11-14'),
(905263, 3, 318499, 'Rayner', 'Paun', 592592, 'Kayaking Through Nature', 'Borneo Highlands, Kuching', '6 hour(s)', '07:00:00', '2017-05-10', 188, '2016-11-14'),
(968731, 2, 318499, 'Rayner', 'Paun', NULL, 'Bako and Iban Longhouse', 'Bako, Kuching', '5 day(s)', '05:30:00', '2016-11-14', 1625, '2016-11-14'),
(994433, 1, 318499, 'Rayner', 'Paun', NULL, 'Mulu Caves and Pinnacles', 'Miri, Sarawak', '3 day(s)', '09:00:00', '2016-11-14', 1548, '2016-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tblvenue`
--

CREATE TABLE IF NOT EXISTS `tblvenue` (
  `venue_id` int(6) NOT NULL,
  `venue_name` varchar(50) DEFAULT NULL,
  `venue_address` varchar(100) DEFAULT NULL,
  `venue_nrooms` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=200005 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvenue`
--

INSERT INTO `tblvenue` (`venue_id`, `venue_name`, `venue_address`, `venue_nrooms`) VALUES
(200002, 'Borneo Convention Center, Kuching', 'The Isthmus, Sejingkat, 93050 Kuching, Sarawak, Malaysia', 3),
(200003, 'ICube Innovation, Kuching', 'B424-B432, Block B, Level 4, ICOM Square 93450 Sarawak, Jalan Pending, 93450 Kuc', 2),
(200004, 'Hilton Kuching', 'Jalan Tunku Abdul Rahman, 93100 Kuching, Sarawak, Malaysia', 5);

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
  ADD PRIMARY KEY (`p_session_id`), ADD KEY `tblsession_participant_ibfk_2` (`p_id`), ADD KEY `tblsession_participant_ibfk_1` (`session_id`);

--
-- Indexes for table `tblspeaker`
--
ALTER TABLE `tblspeaker`
  ADD PRIMARY KEY (`speaker_id`);

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
  ADD PRIMARY KEY (`tourbooking_id`), ADD KEY `tbltourbookingdetails_ibfk_1` (`p_id`), ADD KEY `tbltourbookingdetails_ibfk_2` (`confpass_reference`), ADD KEY `tbltourbookingdetails_ibfk_3` (`tour_id`);

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
  MODIFY `booking_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=716683;
--
-- AUTO_INCREMENT for table `tblcaterer`
--
ALTER TABLE `tblcaterer`
  MODIFY `caterer_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100005;
--
-- AUTO_INCREMENT for table `tblconference`
--
ALTER TABLE `tblconference`
  MODIFY `conf_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblconf_speaker`
--
ALTER TABLE `tblconf_speaker`
  MODIFY `cspeak_index` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblconf_sponsor`
--
ALTER TABLE `tblconf_sponsor`
  MODIFY `cs_index` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbleventmanager`
--
ALTER TABLE `tbleventmanager`
  MODIFY `em_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblhotel`
--
ALTER TABLE `tblhotel`
  MODIFY `hotel_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  MODIFY `n_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblparticipant`
--
ALTER TABLE `tblparticipant`
  MODIFY `p_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=848612;
--
-- AUTO_INCREMENT for table `tblpasstype`
--
ALTER TABLE `tblpasstype`
  MODIFY `pass_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblsession`
--
ALTER TABLE `tblsession`
  MODIFY `session_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblspeaker`
--
ALTER TABLE `tblspeaker`
  MODIFY `speaker_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblsponsor`
--
ALTER TABLE `tblsponsor`
  MODIFY `sponsor_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbltour`
--
ALTER TABLE `tbltour`
  MODIFY `tour_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblvenue`
--
ALTER TABLE `tblvenue`
  MODIFY `venue_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200005;
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
ADD CONSTRAINT `tblconf_participant_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`) ON DELETE CASCADE,
ADD CONSTRAINT `tblconf_participant_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`) ON DELETE CASCADE,
ADD CONSTRAINT `tblconf_participant_ibfk_3` FOREIGN KEY (`pass_id`) REFERENCES `tblpasstype` (`pass_id`) ON DELETE CASCADE;

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
ADD CONSTRAINT `tblconf_sponsor_ibfk_1` FOREIGN KEY (`conf_id`) REFERENCES `tblconference` (`conf_id`) ON DELETE CASCADE,
ADD CONSTRAINT `tblconf_sponsor_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `tblsponsor` (`sponsor_id`) ON DELETE CASCADE;

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
ADD CONSTRAINT `tblsession_participant_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `tblsession` (`session_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tblsession_participant_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbltourbookingdetails`
--
ALTER TABLE `tbltourbookingdetails`
ADD CONSTRAINT `tbltourbookingdetails_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tblparticipant` (`p_id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbltourbookingdetails_ibfk_2` FOREIGN KEY (`confpass_reference`) REFERENCES `tblconf_participant` (`confpass_reference`) ON DELETE CASCADE,
ADD CONSTRAINT `tbltourbookingdetails_ibfk_3` FOREIGN KEY (`tour_id`) REFERENCES `tbltour` (`tour_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
