-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2020 at 02:53 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphafk6_smartparking`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` longtext NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `Username`, `first_name`, `last_name`, `Email`, `Password`, `phone_number`, `image`, `dob`, `address`, `gender`) VALUES
(1, 'Admin', 'admin', 'Admins', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5656598598', 'download_(4).jpeg', '12/12/1998', '0', 'Male'),
(2, 'Gopal123', 'Gopal', 'Sharma', 'gopal@alphawizz.awsapps.com', 'ccd5e84f60d8694f5bcad804f151c29b', '4545556656', 'myw3schoolsimage.jpg', '19/02/1998', 'PU-3 Commercial, Princes Business Skypark, 6th Floor, 611, AB Rd, Scheme No 54, Indore, Madhya Pradesh 452010', 'Male'),
(3, 'admin', 'admin', '123', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', '', '21/2/1996', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `appointment_date` varchar(100) NOT NULL,
  `appointment_time` varchar(100) NOT NULL,
  `status` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `shifting` int(10) NOT NULL,
  `appointment_reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`appointment_id`, `patient_id`, `doctor_id`, `department_id`, `appointment_date`, `appointment_time`, `status`, `created`, `full_name`, `phone_number`, `gender`, `address`, `age`, `description`, `shifting`, `appointment_reason`) VALUES
(1, 80, 63, 0, '2020-03-08', '02:38:16 pm', 0, '2020-03-04 09:24:30', 'ankita', '7485963214', 'Female', '', 20, '', 1, ''),
(2, 80, 71, 0, '2020-03-05', '02:39:36 pm', 1, '2020-03-04 09:35:24', 'seema', '7485096354', 'Female', '', 42, '', 1, ''),
(3, 80, 71, 0, '2020-03-06', '02:44:15 pm', 0, '2020-03-04 09:15:02', 'garima', '8059648685', 'Female', '', 25, '', 2, ''),
(4, 80, 71, 0, '2020-03-05', '02:47:27 pm', 1, '2020-03-04 09:37:40', 'sudesh', '9638054896', 'Male', '', 26, '', 2, ''),
(5, 80, 71, 0, '2020-03-05', '02:59:43 pm', 1, '2020-03-04 09:40:21', 'ashish', '9842584456', 'Male', '', 45, '', 1, ''),
(6, 80, 63, 0, '2020-03-06', '03:18:41 pm', 0, '2020-03-04 09:49:41', 'yash', '8079468497', 'Male', '', 25, '', 1, ''),
(7, 80, 71, 0, '2020-03-06', '04:50:57 PM', 0, '2020-03-05 11:21:19', 'uma', '8745624488', 'Female', '', 25, '', 1, ''),
(8, 74, 69, 0, '2020-03-07', '09:06:59 pm', 0, '2020-03-05 15:37:36', 'ibrar ', '7084110844', 'Male', 'bzha', 35, '', 1, ''),
(9, 74, 69, 0, '2020-03-07', '09:07:59 pm', 1, '2020-03-05 15:45:58', 'asfak', '9956039060', 'Male', 'ksvaj', 38, '', 1, ''),
(10, 74, 69, 0, '2020-03-07', '09:09:09 pm', 0, '2020-03-05 15:40:14', 'Abhishek', '7838586182', 'Male', 'nznaj', 45, '', 1, ''),
(11, 74, 69, 0, '2020-03-07', '09:11:00 pm', 0, '2020-03-05 15:42:12', 'ajeet', '8738815758', 'Male', 'jsjs', 41, '', 1, ''),
(12, 74, 69, 0, '2020-03-07', '09:12:38 pm', 0, '2020-03-05 15:43:37', 'aksh', '7239010509', 'Male', 'b HGH hi bg', 43, '', 1, ''),
(13, 74, 69, 0, '2020-03-07', '09:14:23 pm', 0, '2020-03-05 15:45:39', 'anjni', '6005341685', 'Male', 'giddy', 48, '', 1, ''),
(14, 74, 69, 0, '2020-03-07', '09:16:35 pm', 0, '2020-03-05 15:47:25', 'apretr', '8115985211', 'Male', 'bafggss', 40, '', 1, ''),
(15, 74, 69, 0, '2020-03-07', '09:18:48 pm', 0, '2020-03-05 15:49:40', 'puspendr', '6207751325', 'Male', ', n him', 39, '', 1, ''),
(16, 74, 69, 0, '2020-03-07', '09:19:58 pm', 0, '2020-03-05 15:51:26', 'golu', '8317012242', 'Male', 'cinch', 35, '', 1, ''),
(17, 74, 69, 0, '2020-03-07', '09:21:38 pm', 0, '2020-03-05 15:53:04', 'jubair', '9838713717', 'Male', 'vino sah', 42, '', 1, ''),
(18, 82, 69, 0, '2020-03-07', '09:41:45 PM', 1, '2020-03-06 03:36:03', 'chs', '0798521025', 'Male', 'ysdfg', 35, '', 1, ''),
(19, 82, 69, 0, '2020-03-07', '09:41:45 PM', 1, '2020-03-05 16:15:18', 'chs', '0798521025', 'Male', 'ysdfg', 35, '', 1, ''),
(20, 36, 7, 0, '2020-03-09', '10:16:21 AM', 0, '2020-03-09 04:54:38', 'Rahul', '9895656565', '?????', '', 12, '', 1, ''),
(21, 36, 7, 0, '2020-03-09', '10:39:20 AM', 0, '2020-03-09 05:10:00', 'rahul', '9907898654', 'Male', '', 12, '', 1, ''),
(22, 36, 7, 0, '2020-03-09', '11:14:44 AM', 0, '2020-03-09 05:45:14', 'rahul', '7845454545', 'Male', '', 45, '', 1, ''),
(23, 36, 7, 0, '2020-03-09', '11:24:37 AM', 0, '2020-03-09 05:55:18', 'rahul sharma', '1221212121', 'Male', 'test', 21, '', 1, ''),
(24, 36, 7, 0, '2020-03-09', '06:07:28 pm', 0, '2020-03-09 12:37:47', 'rahul ', '9988588855', 'Male', '', 35, '', 1, ''),
(25, 83, 71, 0, '2020-03-12', '12:58:39 p.m.', 0, '2020-03-11 07:29:37', 'raju', '9855478632', 'Male', '', 52, '', 1, ''),
(26, 83, 72, 0, '2020-03-13', '02:09:31 p.m.', 0, '2020-03-11 08:40:20', 'monu', '9663280480', 'Male', '', 22, '', 1, ''),
(27, 83, 72, 0, '2020-03-13', '02:11:44 p.m.', 0, '2020-03-11 08:42:08', 'sonu', '7480566458', 'Male', '', 22, '', 2, ''),
(28, 83, 71, 0, '2020-03-12', '02:13:26 p.m.', 0, '2020-03-11 08:43:56', 'mona', '8796624581', 'Female', '', 20, '', 2, ''),
(29, 83, 72, 0, '2020-03-13', '02:22:17 p.m.', 0, '2020-03-11 08:52:57', 'sona', '8967618878', 'Female', '', 20, '', 1, ''),
(30, 83, 71, 0, '2020-03-12', '02:36:44 p.m.', 0, '2020-03-11 09:08:26', 'rona', '8055475776', 'Female', '', 22, '', 2, ''),
(31, 36, 7, 0, '2020-03-16', '07:09:47 PM', 0, '2020-03-16 13:40:19', 'neha', '1212121212', 'Female', '', 2, '', 2, ''),
(32, 36, 7, 0, '2020-03-17', '06:37:20 pm', 1, '2020-03-17 13:11:04', 'Shubham Sharma', '9586858585', 'Male', '', 25, '', 2, ''),
(33, 36, 7, 0, '2020-03-24', '09:37:28 am', 1, '2020-03-24 11:50:10', 'rahul', '9907898654', 'Male', '', 25, '', 1, ''),
(34, 88, 126, 0, '2020-03-26', '03:53:45 p.m.', 1, '2020-03-24 10:31:29', 'sonu', '7412580963', 'Male', '', 20, '', 1, ''),
(35, 88, 71, 0, '2020-03-26', '03:55:24 p.m.', 0, '2020-03-24 10:25:58', 'garima', '8741253690', 'Female', '', 26, '', 2, ''),
(36, 88, 126, 0, '2020-03-30', '03:58:00 p.m.', 0, '2020-03-24 10:29:17', 'xyz', '9856325840', 'Female', '', 8, '', 2, ''),
(37, 90, 7, 0, '2020-03-24', '05:14:54 pm', 1, '2020-03-24 11:50:13', 'Rahul', '9907854884', 'Male', '', 25, '', 2, ''),
(38, 90, 7, 0, '2020-03-24', '07:34:16 pm', 0, '2020-03-24 14:05:24', 'rahul', '9907898645', 'Male', 'aggag', 25, '', 2, ''),
(39, 90, 7, 0, '2020-03-24', '07:47:48 pm', 0, '2020-03-24 14:18:53', 'jjjj', '5555555555', 'Male', '', 5, '', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `Banner`
--

CREATE TABLE `Banner` (
  `id` int(100) NOT NULL,
  `banner_image` varchar(190) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Banner`
--

INSERT INTO `Banner` (`id`, `banner_image`) VALUES
(1, 'b1.png'),
(2, 'b2.png'),
(3, 'b3.png'),
(4, 'b4.png'),
(5, 'b5.png'),
(6, 'b6.png'),
(7, 'b7.png'),
(8, 'b8.png');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `pick_location` text NOT NULL,
  `drop_location` text NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `pick_time` varchar(255) DEFAULT NULL,
  `pick_date` varchar(255) DEFAULT NULL,
  `stuf_name` varchar(255) NOT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `packaging_required` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `attachment_image` text,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_mobilenumber` varchar(100) NOT NULL,
  `lift_facility` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pick_date_time` varchar(255) NOT NULL,
  `user_id` int(25) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `is_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `pick_location`, `drop_location`, `vehicle_type`, `pick_time`, `pick_date`, `stuf_name`, `floor`, `packaging_required`, `amount`, `payment_type`, `distance`, `attachment_image`, `receiver_name`, `receiver_mobilenumber`, `lift_facility`, `landmark`, `description`, `pick_date_time`, `user_id`, `driver_id`, `driver_location`, `status`, `date_time`, `is_status`) VALUES
(1, '[{\"address\":\"Unnamed Road, Hatuniya, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933688037758007,\"longitude\":75.91591726988555}]', '[{\"address\":\"Unnamed Road, Madhya Pradesh 453771, India\\n\",\"latitude\":22.952999592232025,\"longitude\":75.87171413004398}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, '', '', 'No', '', 'test', 'May 18 2020   11:44', 2, 1, '\"[{\\\"latitude\\\":22.9331453,\\\"longitude\\\":75.8866171}]\"', '', '0000-00-00 00:00:00', 1),
(2, '[{\"address\":\"Unnamed Road, Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933145210724614,\"longitude\":75.88661715388298}]', '[{\"address\":\"Unnamed Road, Madhya Pradesh 453771, India\\n\",\"latitude\":22.957705183130503,\"longitude\":75.86132626980542}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, '', '', 'No', '', 'test', 'May 18 2020   11:59', 2, 1, '\"[{\\\"latitude\\\":22.932253,\\\"longitude\\\":75.8848019}]\"', '', '0000-00-00 00:00:00', 1),
(3, '[{\"address\":\"Unnamed Road, Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.932253154064874,\"longitude\":75.88480196893215}]', '[{\"address\":\"Unnamed Road, Kudana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.965561876929232,\"longitude\":75.86769115179777}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, 'AL cricket', '543212601', 'No', '543212601', 'test', 'May 18 2020   19:19', 2, 1, '\"[{\\\"latitude\\\":22.9305628,\\\"longitude\\\":75.8862541}]\"', '', '0000-00-00 00:00:00', 1),
(4, '[{\"address\":\"Unnamed Road, Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933145210724614,\"longitude\":75.88661715388298}]', '[{\"address\":\"Unnamed Road, Makodiya, Madhya Pradesh 453771, India\\n\",\"latitude\":22.941985486372584,\"longitude\":75.92175107449293}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, '', '', 'No', '', 'test', 'May 19 2020   10:41', 2, 1, '\"[{\\\"latitude\\\":22.9357565,\\\"longitude\\\":75.8913365}]\"', '', '0000-00-00 00:00:00', 1),
(5, '[{\"address\":\"222 Al Khaleej Rd - Al Baraha - Dubai - United Arab Emirates\\n\",\"latitude\":25.2853739,\"longitude\":55.32163449999999}]', '[{\"address\":\"Dubai International Airport Terminal 3 - Duty Free Hall - ??? - United Arab Emirates\\n\",\"latitude\":25.2531745,\"longitude\":55.36567280000001}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, '', '', 'No', '', 'test', 'May 19 2020   10:48', 2, 1, '\"[{\\\"latitude\\\":22.9298671,\\\"longitude\\\":75.8866171}]\"', '', '0000-00-00 00:00:00', 1),
(6, '[{\"address\":\"Unnamed Road - ??????? - ??????? - United Arab Emirates\\n\",\"latitude\":25.30568258817395,\"longitude\":55.368395447731025}]', '[{\"address\":\"S115 - Al Nahda 1 - Dubai - United Arab Emirates\\n\",\"latitude\":25.29768979941059,\"longitude\":55.37128418684006}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, 'Alex', '+251965565927', 'No', '+251965565927', 'guz', 'May 19 2020   21:38', 3, 2, '', '', '0000-00-00 00:00:00', 1),
(7, '[{\"address\":\"Unnamed Road - ??????? - ??????? - United Arab Emirates\\n\",\"latitude\":25.305761394949997,\"longitude\":55.36840047687292}]', '[{\"address\":\"4th St - Al NahdaAl Nahda 1 - Dubai - United Arab Emirates\\n\",\"latitude\":25.29673101734034,\"longitude\":55.36368079483509}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, '', '', 'No', '', 'xyz', 'May 19 2020 09:42', 3, 2, '', '', '0000-00-00 00:00:00', 1),
(8, '[{\"address\":\"Unnamed Road - ??????? - ??????? - United Arab Emirates\\n\",\"latitude\":25.305726538113085,\"longitude\":55.368396788835526}]', '[{\"address\":\"Al Razooqi Building, Near ENOC Gas Station - Amman St - Al NahdaAl Nahda 1 - Dubai - United Arab Emirates\\n\",\"latitude\":25.2949622673197,\"longitude\":55.3717415034771}]', '3', NULL, NULL, 'Housemove', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, '', '', 'No', '', '', 'May 19 2020   21:46', 5, 0, '', '', '0000-00-00 00:00:00', 0),
(9, '[{\"address\":\"Unnamed Road - ??????? - ??????? - United Arab Emirates\\n\",\"latitude\":25.305738662231406,\"longitude\":55.3683977946639}]', '[{\"address\":\"D97 - Al Nahda - Dubai - United Arab Emirates\\n\",\"latitude\":25.292629054086063,\"longitude\":55.370883867144585}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, 'xyz', '050', 'No', '050', 'xyz', 'May 19 2020   22:15', 5, 2, '', '', '0000-00-00 00:00:00', 1),
(10, '[{\"address\":\"Hagere Selam, Ethiopia\\n\",\"latitude\":14.19766449884927,\"longitude\":36.991146504879}]', '[{\"address\":\"Arata, Eritrea\\n\",\"latitude\":14.19766449884927,\"longitude\":40.73831420391798}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, 'Ali', '0553697056', 'No', '0553697056', 'ggg', 'May 20 2020   01:11', 3, 2, '', '', '0000-00-00 00:00:00', 1),
(11, '[{\"address\":\"Sarbet, ??? ???, Ethiopia\\n\",\"latitude\":8.994448199999999,\"longitude\":38.738308}]', '[{\"address\":\"A5, Addis Ababa, Ethiopia\\n\",\"latitude\":8.983553299999999,\"longitude\":38.6952423}]', '1', NULL, NULL, 'Document', NULL, 'No', '100 AED', 'Cash', '4.5km', NULL, '', '', 'No', '', '', 'May 20 2020   01:14', 6, 2, '', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_notificaion`
--

CREATE TABLE `booking_notificaion` (
  `notification_id` int(11) NOT NULL,
  `paitent_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `vehicle_type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `read_status` int(11) NOT NULL,
  `is_status` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_notificaion`
--

INSERT INTO `booking_notificaion` (`notification_id`, `paitent_id`, `doctor_id`, `booking_id`, `vehicle_type`, `title`, `message`, `read_status`, `is_status`, `date_time`) VALUES
(1, 2, 19, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:17'),
(2, 2, 20, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:18'),
(3, 2, 21, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:18'),
(4, 2, 22, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:18'),
(5, 2, 23, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:19'),
(6, 2, 24, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:19'),
(7, 2, 25, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:19'),
(8, 2, 26, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:20'),
(9, 2, 27, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:20'),
(10, 2, 28, 1, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-18 11:45:20'),
(11, 2, 1, 2, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-18 11:59:37'),
(12, 2, 1, 3, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-18 19:20:13'),
(13, 2, 1, 4, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-19 10:42:30'),
(14, 2, 2, 4, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-19 10:42:30'),
(15, 2, 1, 5, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-19 10:50:16'),
(16, 2, 2, 5, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-19 10:50:16'),
(17, 3, 1, 6, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-19 23:09:13'),
(18, 3, 2, 6, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-19 23:09:13'),
(19, 3, 1, 7, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-19 23:12:50'),
(20, 3, 2, 7, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-19 23:12:50'),
(21, 5, 1, 8, 3, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-19 23:16:52'),
(22, 5, 2, 8, 3, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-19 23:16:52'),
(23, 5, 1, 9, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-19 23:46:17'),
(24, 5, 2, 9, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-19 23:46:17'),
(25, 3, 1, 10, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-20 00:41:21'),
(26, 3, 2, 10, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-20 00:41:21'),
(27, 6, 1, 11, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-05-20 00:45:30'),
(28, 6, 2, 11, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-05-20 00:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `id` int(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`id`, `department_name`, `description`, `status`) VALUES
(2, 'Nuero', 'edited', 1),
(4, 'dental', 'dsfsfdsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fees` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `biography` longtext NOT NULL,
  `status` int(2) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `exp` int(11) NOT NULL,
  `hospital_id` varchar(100) NOT NULL,
  `Appointment_limit` int(11) NOT NULL,
  `Firebase_token` longtext NOT NULL,
  `otp` int(11) NOT NULL,
  `user_type` int(25) NOT NULL,
  `Vehicle_Type` varchar(111) NOT NULL,
  `device_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`id`, `first_name`, `last_name`, `username`, `fees`, `email`, `password`, `dob`, `gender`, `address`, `Country`, `education`, `city`, `state`, `postal_code`, `phone_number`, `image`, `biography`, `status`, `profession`, `exp`, `hospital_id`, `Appointment_limit`, `Firebase_token`, `otp`, `user_type`, `Vehicle_Type`, `device_token`) VALUES
(1, '', '', 'Rahul', 0, '', '', '', '', '', '', '', '', '', '', '9907898654', '', '', 0, '', 0, '', 0, 'ckQoN19DTXOOZeZwm9-1MG:APA91bFmCeNd3Cvp4vE3-iExzgTXOEXnDehNJPGEOidsBuzCojuxBElyrQqnTZXdX9aZ0PepXcU7L16TzESFKLzY_lHwd-4yYM0QIsmrB-vNOAC4uUBd4mBdO6KqqD0L3irtYpl5VV-T', 2340, 0, '1', ''),
(2, '', '', 'xyz', 0, '', '', '', '', '', '', '', '', '', '', '0522462818', '', '', 0, '', 0, '', 0, 'fJjpnCjHSFqlTnDZaCXmyj:APA91bGCUjhQfbIbizLdeJur3herS-v1VVZ04top-iHkzp4ZW6lSVNm1upsci207rJ50Ec7CXyrJFJpkfv0TZeZNCSAMNpgW1lnhCjpFnC0jhONtaANrZ1xDOq2RYa3Ew46ptyGB9lkt', 8689, 0, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `Doctors_availablity`
--

CREATE TABLE `Doctors_availablity` (
  `id` int(11) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctors_availablity`
--

INSERT INTO `Doctors_availablity` (`id`, `from_date`, `to_date`, `doctor_id`, `status`) VALUES
(16, '1970-01-01 12:00:00', '1970-01-01 12:00:00', 7, 0),
(15, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(14, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(13, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(12, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(11, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(10, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(17, '2020-01-29 12:00:00', '2020-01-29 12:00:00', 7, 1),
(18, '2020-01-29 12:00:00', '2020-01-30 12:00:00', 7, 0),
(19, '2020-01-29 12:00:00', '2020-01-30 12:00:00', 7, 1),
(20, '2020-01-30 12:00:00', '2020-01-30 12:00:00', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Doctor_review`
--

CREATE TABLE `Doctor_review` (
  `id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `comment` longtext NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctor_review`
--

INSERT INTO `Doctor_review` (`id`, `doctor_id`, `patient_id`, `comment`, `rating`) VALUES
(3, 14, 34, 'hii ', 4),
(4, 14, 34, 'hii ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Doctor_schedule`
--

CREATE TABLE `Doctor_schedule` (
  `id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `available` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  `morning_start_time` varchar(100) NOT NULL,
  `morning_end_time` varchar(100) NOT NULL,
  `evening_start_time` varchar(100) NOT NULL,
  `evening_end_time` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `evening_morning_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctor_schedule`
--

INSERT INTO `Doctor_schedule` (`id`, `doctor_id`, `department_id`, `available`, `start_time`, `end_time`, `status`, `morning_start_time`, `morning_end_time`, `evening_start_time`, `evening_end_time`, `from_date`, `to_date`, `evening_morning_status`) VALUES
(2, 12, 2, '[\"Monday\"]', '12.00', '6.00 AM', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(4, 11, 2, '[\"Tuesday\",\"Wednesday\",\"Thursday\"]', '10:00 AM', '8:00 PM', 1, '8.00AM', '12.30AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(29, 7, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '1:03 PM', '1:03 PM', 1, '08:00 Am', '11:00 Am', '04:00 PM', '09:00 PM', '2020-03-07', '2020-03-08', '1,1'),
(49, 14, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '9:00 AM', '6:30 PM', 1, '8.00AM', '11.30AM', '6.00PM', '8.30PM', '2020-01-30', '2020-01-30', '1,1'),
(50, 57, 2, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Friday\"]', '5:00 PM', '11:00 PM', 1, '08.00 AM', '11.00AM', '05.00 PM', '09.00 PM', '2020-01-31', '2020-02-22', '1,1'),
(51, 42, 0, '[\"Tuesday\",\"Thursday\",\"Saturday\"]', '', '', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(52, 43, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '', '', 1, '', '', '5.00PM', '9.00PM', '0000-00-00', '0000-00-00', '0,1'),
(53, 44, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '3:00 PM', '9:00 PM', 1, '', '', '5.00PM', '9.00PM', '0000-00-00', '0000-00-00', '1,1'),
(55, 11, 2, '[\"Tuesday\",\"Thursday\",\"Saturday\"]', '12:00 PM', '10:30 PM', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(56, 13, 2, '[\"Monday\"]', '12:39 PM', '12:39 PM', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(57, 46, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '8.00AM', '11.00AM', '', '', '2020-02-23', '2020-02-23', '0,1'),
(58, 20, 2, '[\"Sunday\",\"Monday\",\"Tuesday\"]', '5:28 PM', '5:28 PM', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(59, 27, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(60, 28, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(61, 29, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(62, 30, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(63, 31, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(64, 32, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(65, 34, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(66, 35, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(67, 36, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,1'),
(68, 37, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(69, 38, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(70, 40, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(71, 57, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Friday\",\"Sunday\"]', '', '', 0, '08.00 AM', '11.00 AM', '04.00 PM', '07.00 PM', '2020-02-26', '2020-02-29', '1,1'),
(72, 53, 2, '[\"Sunday\",\"Monday\"]', '6:03 PM', '6:03 PM', 0, '8.00AM', '11.00AM', '', '', '2020-02-13', '2020-02-19', '1,1'),
(82, 58, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '10:30 PM', '12.00 PM', '04.00 PM', '07.00 PM', '0000-00-00', '0000-00-00', '1,1'),
(83, 54, 0, '', '', '', 0, '08.00 AM', '11.00 AM', '04.00 PM', '07.00 PM', '0000-00-00', '0000-00-00', '1,1'),
(87, 55, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '', '', 0, '9:30AM', '07:00 AM', '02:00 PM', '9:30PM', '2020-02-29', '2020-03-01', '1,1'),
(88, 71, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"]', '', '', 1, '08:00 Am', '10:00 Am', '07:00 PM', '22:00 PM', '2020-03-10', '2020-03-11', '1,1'),
(89, 57, 0, '', '', '', 0, '08.00 AM', '11.00 AM', '04.00 PM', '07.00 PM', '0000-00-00', '0000-00-00', '1,1'),
(90, 62, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"]', '', '', 0, '11:00 AM', '12:00 PM', '04:00 PM', '8:00 PM', '2020-02-29', '2020-03-01', '1,1'),
(91, 63, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '', '', 1, '07:00 Am', '12:00 PM', '07:00 PM', '22:16 PM', '2020-03-07', '2020-03-08', '1,1'),
(92, 64, 0, '[\"Monday\",\"Wednesday\",\"Friday\"]', '', '', 0, '9:0AM', '12:0AM', '5:0PM', '9:0PM', '2020-03-02', '2020-03-05', '1,1'),
(93, 65, 0, '', '', '', 0, '', '', '', '', '2020-02-28', '2020-02-28', ''),
(94, 66, 0, '[\"Monday\",\"Wednesday\",\"Friday\",\"Sunday\"]', '', '', 1, '9:0PM', '1:0PM', '5:30PM', '10:46PM', '2020-03-02', '2020-03-08', '1,1'),
(95, 67, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Sunday\"]', '', '', 0, '9:0PM', '11:0PM', '', '', '2020-03-01', '2020-03-05', '1,0'),
(96, 70, 0, '[\"Monday\",\"Wednesday\",\"Friday\"]', '', '', 1, '', '', '', '', '0000-00-00', '0000-00-00', ''),
(97, 69, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '9:12PM', '1:12PM', '3:37PM', '5:37PM', '2020-03-13', '2020-03-22', '1,1'),
(98, 72, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"]', '', '', 0, '8:00 Am', '11:00 Am', '7:00 PM', '10:00 PM', '2020-03-14', '2020-03-15', '1,1'),
(99, 126, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '8:00 Am', '11:00 Am', '7:00 PM', '10:00 PM', '2020-03-25', '2020-03-25', '1,1');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`id`, `doctor_id`, `patient_id`, `feedback`) VALUES
(1, 7, 20, 'best doctor'),
(2, 11, 20, 'best doctor'),
(3, 13, 20, 'best doctor'),
(4, 14, 20, 'best doctor'),
(5, 20, 20, 'best doctor'),
(6, 20, 20, 'best doctor'),
(7, 20, 21, 'best doctor'),
(8, 20, 23, 'best doctor');

-- --------------------------------------------------------

--
-- Table structure for table `Hospital`
--

CREATE TABLE `Hospital` (
  `id` int(100) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `hospital_address` varchar(100) NOT NULL,
  `hospital_service` longtext NOT NULL,
  `hospital_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hospital`
--

INSERT INTO `Hospital` (`id`, `hospital_name`, `hospital_address`, `hospital_service`, `hospital_image`) VALUES
(6, 'Bombay Hospital', 'Bombay Hospital, Eastern Ring Road, Tulsi Nagar, Vijay Nagar, Indore, Madhya Pradesh, India', 'Considered the premier private trust hospital in India which was Set up in 1950s by the great philan', 'famous_hospital2.jpeg'),
(13, 'AIIMS, All India Institute of Medical Sciences', 'All India Institute of Medical Sciences. Ansari Nagar, New Delhi - 110029', 'Considered the premier private trust hospital in India which was Set up in 1930s by the great philan', 'famous_hospital1.jpeg'),
(19, 'King Edward Memorial Hospital', ' Acharya Donde Marg, Parel, Mumbai, Maharashtra 400012', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub.', 'King_Edward_Memorial_Hospital.jpg'),
(20, 'Hiranandani Hospital', 'Hill Side Avenue, Hiranandani Gardens, Powai, Mumbai – 400 076. Phone: 022 25763300 / 3333 – 022 710', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub, where patients get world class healthcare facilities, coming at affordable prices. Hospitals all over the country are equipped with trained doctors, medical staff and infrastructure, to help the patient get fit and fine with the best possible treatment.   Listed below are top 15 best hospitals in India:  15. Sir Ganga Ram Hospital Sir-Ganga-Ram-Hospital  This is a 675 bed multi-specialty hospital located in New Delhi. The Minimal Access Surgery Department of the hospital is the first of its kind in South Asia.', 'hirandani-hospital.jpg'),
(6, 'Bombay Hospital', 'Bombay Hospital, Eastern Ring Road, Tulsi Nagar, Vijay Nagar, Indore, Madhya Pradesh, India', 'Considered the premier private trust hospital in India which was Set up in 1950s by the great philan', 'famous_hospital2.jpeg'),
(13, 'AIIMS, All India Institute of Medical Sciences', 'All India Institute of Medical Sciences. Ansari Nagar, New Delhi - 110029', 'Considered the premier private trust hospital in India which was Set up in 1930s by the great philan', 'famous_hospital1.jpeg'),
(19, 'King Edward Memorial Hospital', ' Acharya Donde Marg, Parel, Mumbai, Maharashtra 400012', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub.', 'King_Edward_Memorial_Hospital.jpg'),
(20, 'Hiranandani Hospital', 'Hill Side Avenue, Hiranandani Gardens, Powai, Mumbai – 400 076. Phone: 022 25763300 / 3333 – 022 710', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub, where patients get world class healthcare facilities, coming at affordable prices. Hospitals all over the country are equipped with trained doctors, medical staff and infrastructure, to help the patient get fit and fine with the best possible treatment.   Listed below are top 15 best hospitals in India:  15. Sir Ganga Ram Hospital Sir-Ganga-Ram-Hospital  This is a 675 bed multi-specialty hospital located in New Delhi. The Minimal Access Surgery Department of the hospital is the first of its kind in South Asia.', 'hirandani-hospital.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Loan`
--

CREATE TABLE `Loan` (
  `id` int(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `loan_amount` int(100) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `loan_interest` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `patient_name` varchar(111) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Loan`
--

INSERT INTO `Loan` (`id`, `patient_id`, `loan_amount`, `from`, `to`, `loan_interest`, `status`, `patient_name`, `phone_number`) VALUES
(9, '', 25, '2020-01-31', '2020-02-02', 0, 1, 'gopal sharma', 2147483647),
(10, '', 25, '2020-01-31', '2020-03-02', 0, 0, 'rahul sharma', 2147483647),
(11, '', 55, '2020-01-31', '2021-01-31', 0, 2, 'mukesh dubey', 2147483647),
(16, '90', 12, '2020-12-12', '2020-04-12', 0, 1, 'gopal sharma', 2147483647),
(17, '20', 23000, '2020-12-05', '2020-12-06', 5, 0, 'gopal sharma', 2147483647),
(18, '20', 23000, '1970-01-01', '1970-01-01', 5, 2, 'gopal sharma', 2147483647),
(19, '20', 23000, '2020-12-05', '2020-12-06', 5, 0, 'gopal sharma', 2147483647),
(20, '36', 1000, '2020-02-22', '2020-02-22', 2020, 0, 'tedd', 2147483647),
(21, '36', 1000, '2020-02-22', '2020-02-22', 2020, 2, 'test', 2147483647),
(22, '36', 4800, '2020-02-23', '2020-02-25', 2020, 0, 'mikesh', 2147483647),
(23, '50', 1000, '2020-02-29', '2020-11-08', 2020, 2, 'bf', 2147483647),
(24, '36', 10000000, '2020-02-26', '2020-03-27', 2020, 0, 'THAKUR ', 2147483647),
(25, '36', 1000, '2020-02-29', '2020-02-29', 2020, 0, 'tkfkfktkrrk', 2147483647),
(26, '36', 1000, '2020-02-25', '2020-02-25', 2020, 2, 'fifjfk', 2147483647),
(27, '72', 1000, '2020-03-01', '2020-03-22', 2020, 0, 'THAKUR ', 2147483647),
(28, '72', 12, '2020-03-04', '2020-03-22', 2020, 0, 'munna singh', 2147483647),
(29, '73', 3500, '2020-02-29', '2020-03-28', 2020, 0, 'manash', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `Loan_amount`
--

CREATE TABLE `Loan_amount` (
  `id` int(100) NOT NULL,
  `loan_amount` int(100) NOT NULL,
  `loan_intrest` int(10) NOT NULL,
  `weekly_payment` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Loan_amount`
--

INSERT INTO `Loan_amount` (`id`, `loan_amount`, `loan_intrest`, `weekly_payment`) VALUES
(1, 1000, 5, 200),
(2, 2000, 5, 200),
(3, 3500, 6, 300),
(4, 4800, 6, 400),
(5, 5200, 6, 400),
(6, 6500, 6, 400),
(7, 7000, 6, 400),
(8, 12, 3, 1),
(9, 10000000, 50, 1000),
(10, 10000000, 50, 1000),
(11, 10000000, 50, 1000),
(12, 10000000, 34, 12000),
(13, 34000, 35, 1200),
(14, 34000, 35, 1200),
(15, 34000, 35, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE `Notification` (
  `notification_id` int(100) NOT NULL,
  `user_type` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `appointment_id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notification` longtext NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `read_status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE `Patients` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `Firebase_token` longtext NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `dob`, `gender`, `disease`, `address`, `Country`, `city`, `state`, `postal_code`, `phone_number`, `image`, `status`, `Firebase_token`, `otp`) VALUES
(1, '', '', 'Shubham Sharma', '', '', '', '', '', '', '', '', '', '', '9907898656', '', 0, '', 0),
(2, '', '', 'Gopal Sharma', '', '', '', '', '', '', '', '', '', '', '9907898654', '', 0, 'cQCJR8FXScu1rsmENe-ZZz:APA91bGIsWIMKLYtxHiImUWOOOLi4rZ19LCaRlgPmm6rTcUGoo8X5HOiytBHbBQiRsJuISQXnrxlKcPvPSWv0_XgCmEC34GVgoUkQ0lKaVHs-iswBMGQNrfjPsyoCnKomhvPhWWWCb3V', 3126),
(3, '', '', 'semrdin', '', '', '', '', '', '', '', '', '', '', '0522462818', '', 0, 'cz00E2idQWybRx1XnTW7WB:APA91bEDWjbO6aD-a0xzJ-HMjjgD4qmzD_EXeJPinZZ7UPpl7ytjxyWGNIlsJ2gtQysKpRhUa8dScBeGjZd0zlqnOfxg9vQjiVJVDPl47dPmF41Np9yA-OUotG7wWBoJVXt_bbPVYLw6', 7741),
(4, '', '', 'xyz', '', '', '', '', '', '', '', '', '', '', '0920028180', '', 0, '', 0),
(5, '', '', 'hh', '', '', '', '', '', '', '', '', '', '', '0523464112', '', 0, 'dRoqqiwdRfank2xo9b04BQ:APA91bHGO1ioNIEPalbQoDslSB3I3nkMBMpAyUHGX4AyFbvGUnldcM28ahcrYK_MkWr3HUUlEzqigyr0xeY_t6Opoj8jgR34EYV0wMMUbIat6k07HGix01vv5BPkgGlMqDkJGcWWvS_N', 2403),
(6, '', '', 'nej', '', '', '', '', '', '', '', '', '', '', '0921028180', '', 0, 'cz00E2idQWybRx1XnTW7WB:APA91bEDWjbO6aD-a0xzJ-HMjjgD4qmzD_EXeJPinZZ7UPpl7ytjxyWGNIlsJ2gtQysKpRhUa8dScBeGjZd0zlqnOfxg9vQjiVJVDPl47dPmF41Np9yA-OUotG7wWBoJVXt_bbPVYLw6', 3323);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `date_created`, `date_updated`, `status`, `cat_id`) VALUES
(1, 'Grocery', '2020-04-23 00:00:00', '2020-04-23 10:49:36', 1, 1),
(2, 'Document', '2020-04-23 00:00:00', '2020-04-23 10:49:42', 1, 1),
(3, 'Food', '2020-04-23 00:00:00', '2020-04-23 10:49:46', 1, 1),
(4, 'Small item', '2020-04-23 00:00:00', '2020-04-23 10:49:49', 1, 1),
(5, 'Sparepart', '2020-04-23 00:00:00', '2020-04-23 10:49:54', 1, 1),
(6, 'Other', '2020-04-23 00:00:00', '2020-04-23 10:49:58', 1, 1),
(7, 'Housemove', '2020-04-23 00:00:00', '2020-04-23 10:50:03', 1, 2),
(8, 'Tyres', '2020-04-23 00:00:00', '2020-04-23 10:50:07', 1, 2),
(9, 'Spareparts', '2020-04-23 00:00:00', '2020-04-23 10:50:12', 1, 2),
(10, 'Furniture ', '2020-04-23 00:00:00', '2020-04-23 10:50:15', 1, 2),
(11, 'Electronics', '2020-04-23 00:00:00', '2020-04-23 10:50:20', 1, 2),
(12, 'Other', '2020-04-23 00:00:00', '2020-04-23 10:50:23', 1, 2),
(13, 'Housemove', '2020-04-23 00:00:00', '2020-04-23 10:50:28', 1, 3),
(14, 'Tyres', '2020-04-23 00:00:00', '2020-04-23 10:50:32', 1, 3),
(15, 'Spareparts', '2020-04-23 00:00:00', '2020-04-23 10:50:37', 1, 3),
(16, 'Electronics', '2020-04-23 00:00:00', '2020-04-23 10:50:41', 1, 3),
(17, 'Furniture', '2020-04-23 00:00:00', '2020-04-23 10:50:44', 1, 3),
(18, 'Other', '2020-04-23 00:00:00', '2020-04-23 10:50:48', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category`
--

CREATE TABLE `vehicle_category` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_category`
--

INSERT INTO `vehicle_category` (`id`, `name`, `date_created`, `date_updated`, `status`) VALUES
(1, 'Motorcycle', '2020-04-23 00:00:00', '2020-04-23 10:40:40', 1),
(2, 'Pickup', '2020-04-23 00:00:00', '2020-04-23 10:41:45', 1),
(3, 'Truck', '2020-04-23 00:00:00', '2020-04-23 10:41:35', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `Banner`
--
ALTER TABLE `Banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_notificaion`
--
ALTER TABLE `booking_notificaion`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctors_availablity`
--
ALTER TABLE `Doctors_availablity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctor_review`
--
ALTER TABLE `Doctor_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctor_schedule`
--
ALTER TABLE `Doctor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Loan`
--
ALTER TABLE `Loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Loan_amount`
--
ALTER TABLE `Loan_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking_notificaion`
--
ALTER TABLE `booking_notificaion`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
