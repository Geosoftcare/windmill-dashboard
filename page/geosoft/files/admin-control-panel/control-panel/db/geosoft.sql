-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 04:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geosoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat_system`
--

CREATE TABLE `tbl_chat_system` (
  `userId` int(11) NOT NULL,
  `carer_email` varchar(500) NOT NULL,
  `carer_name` varchar(500) NOT NULL,
  `carer_specialId` varchar(500) NOT NULL,
  `carer_chat` text NOT NULL,
  `time_sent` varchar(500) NOT NULL,
  `date_sent` varchar(500) NOT NULL,
  `chat_color` varchar(500) NOT NULL,
  `admin_email` varchar(500) NOT NULL,
  `admin_name` varchar(500) NOT NULL,
  `admin_chat` text NOT NULL,
  `admin_specialId` varchar(500) NOT NULL,
  `adTime_sent` varchar(500) NOT NULL,
  `adDate_sent` varchar(500) NOT NULL,
  `adChat_color` varchar(500) NOT NULL,
  `chat_status` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chat_system`
--

INSERT INTO `tbl_chat_system` (`userId`, `carer_email`, `carer_name`, `carer_specialId`, `carer_chat`, `time_sent`, `date_sent`, `chat_color`, `admin_email`, `admin_name`, `admin_chat`, `admin_specialId`, `adTime_sent`, `adDate_sent`, `adChat_color`, `chat_status`, `dateTime`) VALUES
(1, 'mattmars@yahoo.com', 'Matt Mars', '4a7891f51878bba09a738d2d9bb499b44443d125e00e9cf77253539eb43cfae8', 'Hello is there anyone there i need to know more about Pamela harrington.', '14:48', 'April 10, 2024', 'rgba(41, 128, 185,1.0)', 'admin@geosoft.com', 'Admin User', 'We use cookies to enhance your browsing experience, analyze traffic, serve ads, and personalize content. Click \'Accept\' to consent to our use of cookies or \'Manage\' to change default cookie settings.', '4ecc00b015a395ca54c74db5792c91a792d1ff7e0ad3d9bec7386e34208d49f2', '15:00', 'April 10, 2024', 'rgba(22, 160, 133,1.0)', 'Not pending', '2024-04-10 14:40:42'),
(3, 'mattmars@yahoo.com', 'Matt Mars', '4a7891f51878bba09a738d2d9bb499b44443d125e00e9cf77253539eb43cfae8', 'We use cookies to enhance your browsing experience, analyze traffic, serve ads, and personalize content. Click \'Accept\' to consent to our use of cookies or \'Manage\' to change default cookie settings.', '15:13', 'April 10, 2024', 'rgba(41, 128, 185,1.0)', '', '', 'Please wait...', '', '', '', '', 'Pending', '2024-04-10 14:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients_medication_records`
--

CREATE TABLE `tbl_clients_medication_records` (
  `med_Id` int(11) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `med_name` varchar(500) NOT NULL,
  `med_dosage` varchar(500) NOT NULL,
  `med_type` varchar(500) NOT NULL,
  `med_support_required` varchar(500) NOT NULL,
  `med_package` varchar(500) NOT NULL,
  `med_details` varchar(500) NOT NULL,
  `date_uploaded` varchar(500) NOT NULL,
  `time_uploaded` varchar(500) NOT NULL,
  `care_call1` varchar(500) NOT NULL,
  `care_call2` varchar(500) NOT NULL,
  `care_call3` varchar(500) NOT NULL,
  `care_call4` varchar(500) NOT NULL,
  `monday` varchar(500) NOT NULL,
  `tuesday` varchar(500) NOT NULL,
  `wednesday` varchar(500) NOT NULL,
  `thursday` varchar(500) NOT NULL,
  `friday` varchar(500) NOT NULL,
  `saturday` varchar(500) NOT NULL,
  `sunday` varchar(500) NOT NULL,
  `client_med_Id` varchar(500) NOT NULL,
  `med_colours` varchar(500) NOT NULL,
  `visibility` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clients_medication_records`
--

INSERT INTO `tbl_clients_medication_records` (`med_Id`, `uryyToeSS4`, `med_name`, `med_dosage`, `med_type`, `med_support_required`, `med_package`, `med_details`, `date_uploaded`, `time_uploaded`, `care_call1`, `care_call2`, `care_call3`, `care_call4`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `client_med_Id`, `med_colours`, `visibility`, `col_company_Id`, `dateTime`) VALUES
(1, 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Air wick', '10mg', 'Barrier cream', 'Administer', 'Scheduled', 'The carer will see this note in the app each time they complete this task.', 'April 26, 2024', '01:55 pm', 'Breakfast', 'Lunch', 'Tea', 'Bed', 'Monnday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'b8ab075090b7249b2c717bf5cdad2c44af77c0d434d5156955e52fa455d8da4f', 'white', 'Not updated', '', '2024-04-26 12:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients_task_records`
--

CREATE TABLE `tbl_clients_task_records` (
  `client_Id` int(11) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `client_taskName` varchar(500) NOT NULL,
  `client_task_details` varchar(500) NOT NULL,
  `care_call1` varchar(500) NOT NULL,
  `care_call2` varchar(500) NOT NULL,
  `care_call3` varchar(500) NOT NULL,
  `care_call4` varchar(500) NOT NULL,
  `monday` varchar(500) NOT NULL,
  `tuesday` varchar(500) NOT NULL,
  `wednesday` varchar(500) NOT NULL,
  `thursday` varchar(500) NOT NULL,
  `friday` varchar(500) NOT NULL,
  `saturday` varchar(500) NOT NULL,
  `sunday` varchar(500) NOT NULL,
  `tast_anytimeSession` varchar(500) NOT NULL,
  `task_startDate` varchar(500) NOT NULL,
  `date_uploaded` varchar(500) NOT NULL,
  `time_uploaded` varchar(500) NOT NULL,
  `client_task_Id` varchar(500) NOT NULL,
  `task_colours` varchar(500) NOT NULL,
  `visibility` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clients_task_records`
--

INSERT INTO `tbl_clients_task_records` (`client_Id`, `uryyToeSS4`, `client_taskName`, `client_task_details`, `care_call1`, `care_call2`, `care_call3`, `care_call4`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `tast_anytimeSession`, `task_startDate`, `date_uploaded`, `time_uploaded`, `client_task_Id`, `task_colours`, `visibility`, `col_company_Id`, `dateTime`) VALUES
(1, 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Assist with shower', 'The carer will see this note in the app each time they complete this task.', 'Breakfast', 'Lunch', 'Tea', 'Bed', 'Monnday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Anytime/Session', '2024-04-27', 'April 26, 2024', '01:44 pm', '3759a3e59ba0660f4b2bdd86620f1060aafdcf18493d669f0cb75b13dbb8a3d9', 'white', 'Not updated', '', '2024-04-26 12:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clienttime_calls`
--

CREATE TABLE `tbl_clienttime_calls` (
  `userId` int(11) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `client_area` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `care_calls` varchar(500) NOT NULL,
  `dateTime_in` varchar(500) NOT NULL,
  `dateTime_out` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clienttime_calls`
--

INSERT INTO `tbl_clienttime_calls` (`userId`, `client_name`, `client_area`, `uryyToeSS4`, `care_calls`, `dateTime_in`, `dateTime_out`, `dateTime`) VALUES
(1, 'Phillip Mason', 'Codsall', 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Morning', 'Null', 'Null', '2024-04-26 12:10:00'),
(2, 'Phillip Mason', 'Codsall', 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Lunch', 'Null', 'Null', '2024-04-26 12:10:00'),
(3, 'Phillip Mason', 'Codsall', 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Tea', 'Null', 'Null', '2024-04-26 12:10:00'),
(4, 'Phillip Mason', 'Codsall', 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Bed', 'Null', 'Null', '2024-04-26 12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_medical`
--

CREATE TABLE `tbl_client_medical` (
  `userId` int(11) NOT NULL,
  `col_nhs_number` varchar(500) NOT NULL,
  `col_medical_support` varchar(500) NOT NULL,
  `col_allergies` varchar(500) NOT NULL,
  `col_gp_name` varchar(500) NOT NULL,
  `col_phone_number` varchar(500) NOT NULL,
  `gp_email_address` varchar(500) NOT NULL,
  `gp_address` varchar(500) NOT NULL,
  `col_pharmancy_name` varchar(500) NOT NULL,
  `pharmacy_phone` varchar(500) NOT NULL,
  `col_pharmancy_address` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_nok`
--

CREATE TABLE `tbl_client_nok` (
  `userId` int(11) NOT NULL,
  `col_first_name` varchar(500) NOT NULL,
  `col_last_name` varchar(500) NOT NULL,
  `col_relationship` varchar(500) NOT NULL,
  `col_phone_number` varchar(500) NOT NULL,
  `col_type_ofContact` varchar(500) NOT NULL,
  `nok_emailaddress` varchar(500) NOT NULL,
  `col_client_statement` varchar(500) NOT NULL,
  `lpa_documents` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_nok`
--

INSERT INTO `tbl_client_nok` (`userId`, `col_first_name`, `col_last_name`, `col_relationship`, `col_phone_number`, `col_type_ofContact`, `nok_emailaddress`, `col_client_statement`, `lpa_documents`, `uryyToeSS4`, `dateTime`) VALUES
(1, 'Next', 'kin', 'Family', '4352342435', 'Friendly', 'next@gmail.com', 'Yes', '10.14.HOME_.CC.PlanningYouthService.jpg', 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', '2024-04-26 13:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_notes`
--

CREATE TABLE `tbl_client_notes` (
  `userId` int(11) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `client_note` text NOT NULL,
  `dateof_note` varchar(500) NOT NULL,
  `timeof_note` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_notes`
--

INSERT INTO `tbl_client_notes` (`userId`, `uryyToeSS4`, `client_note`, `dateof_note`, `timeof_note`, `date`) VALUES
(1, 'ad80e9e9179da4b28f45b330b7e6aa8d69422d213c090849be7564a303269cd1', 'Instead of lots of commands to output HTML (as seen in C or Perl), PHP pages contain HTML with embedded code that does \"something\" (in this case, output \"Hi, I\'m a PHP script!\"). The PHP code is enclosed in special start and end processing instructions <?php and ?> that allow you to jump into and out of \"PHP mode.\"\r\n<br><br>\r\nWhat distinguishes PHP from something like client-side JavaScript is that the code is executed on the server, generating HTML which is then sent to the client. The client would receive the results of running that script, but would not know what the underlying code was. You can even configure your web server to process all your HTML files with PHP, and then there\'s really no way that users can tell what you have up your sleeve.\r\n<br><br>\r\nThe best part about using PHP is that it is extremely simple for a newcomer, but offers many advanced features for a professional programmer. Don\'t be afraid to read the long list of PHP\'s features. You can jump in, in a short time, and start writing simple scripts in a few hours.', 'March, 11 2024', '18:42', '2024-03-11 18:42:43'),
(2, 'ad80e9e9179da4b28f45b330b7e6aa8d69422d213c090849be7564a303269cd1', 'PHP is an open-source, server-side programming language that can be used to create websites, applications, customer relationship management systems and more. It is a widely-used general-purpose language that can be embedded into HTML. This functionality with HTML means that the PHP language has remained popular with developers as it helps to simplify HTML code.\r\n<br><br>\r\nWhat does PHP stand for?\r\nPHP stands for ‘PHP: Hypertext Preprocessor’, with the original PHP within this standing for ‘Personal Home Page’. The acronym has changed as the language developed since its launch in 1994 to more accurately reflect its nature. \r\n<br><br>\r\nSince its release, there have been 8 versions of PHP, as of 2022, with version 8.1 currently a popular choice among those using the language on their websites.', '', '', '2024-03-11 18:59:30'),
(3, '185e5ceea48ce2798d2491577fec04db05077a411d324694ec7d6037d30f101a', 'Upload client latest update.', '', '', '2024-04-05 09:21:04'),
(4, 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Upload client latest update.', '', '', '2024-04-26 12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_runs`
--

CREATE TABLE `tbl_client_runs` (
  `userId` int(11) NOT NULL,
  `run_name` varchar(500) NOT NULL,
  `run_town` varchar(500) NOT NULL,
  `col_run_city` varchar(500) NOT NULL,
  `run_ids` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_shift_records`
--

CREATE TABLE `tbl_daily_shift_records` (
  `userId` int(11) NOT NULL,
  `shift_status` varchar(500) NOT NULL,
  `shift_date` varchar(500) NOT NULL,
  `shift_start_time` varchar(500) NOT NULL,
  `shift_end_time` varchar(500) NOT NULL,
  `secStart_time` varchar(500) NOT NULL,
  `secEnd_time` varchar(500) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `client_group` varchar(500) NOT NULL,
  `team_1Name` varchar(500) NOT NULL,
  `team_2Name` varchar(500) NOT NULL,
  `task_note` text NOT NULL,
  `firstCarer_userId` varchar(500) NOT NULL,
  `secondCarer_userId` varchar(500) NOT NULL,
  `checkinout_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_risk_assessment`
--

CREATE TABLE `tbl_equipment_risk_assessment` (
  `userId` int(11) NOT NULL,
  `equipment_details` varchar(500) NOT NULL,
  `to_be_use_to` varchar(500) NOT NULL,
  `col_how` text NOT NULL,
  `last_serviced` varchar(500) NOT NULL,
  `next_service` varchar(500) NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finished_tasks`
--

CREATE TABLE `tbl_finished_tasks` (
  `task_Id` int(11) NOT NULL,
  `task_name` varchar(500) NOT NULL,
  `task_date` varchar(500) NOT NULL,
  `task_timeIn` varchar(500) NOT NULL,
  `task_note` text NOT NULL,
  `task_SpecialId` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `team_1email` varchar(500) NOT NULL,
  `team_2email` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `col_dosage` varchar(500) NOT NULL,
  `col_carername` varchar(500) NOT NULL,
  `col_outcome` varchar(500) NOT NULL,
  `care_call1` varchar(500) NOT NULL,
  `care_call2` varchar(500) NOT NULL,
  `care_call3` varchar(500) NOT NULL,
  `care_call4` varchar(500) NOT NULL,
  `monday` varchar(500) NOT NULL,
  `tuesday` varchar(500) NOT NULL,
  `wednesday` varchar(500) NOT NULL,
  `thursday` varchar(500) NOT NULL,
  `friday` varchar(500) NOT NULL,
  `saturday` varchar(500) NOT NULL,
  `sunday` varchar(500) NOT NULL,
  `col_task_status` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_action_plan`
--

CREATE TABLE `tbl_fire_action_plan` (
  `userId` int(11) NOT NULL,
  `emergency_exit1` varchar(500) NOT NULL,
  `emergency_exit2` varchar(500) NOT NULL,
  `refuge_room_details` varchar(500) NOT NULL,
  `locality_of_window` varchar(500) NOT NULL,
  `assessor` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_client_form`
--

CREATE TABLE `tbl_general_client_form` (
  `userId` int(11) NOT NULL,
  `client_title` varchar(500) NOT NULL,
  `client_first_name` varchar(500) NOT NULL,
  `client_last_name` varchar(500) NOT NULL,
  `client_middle_name` varchar(500) NOT NULL,
  `client_preferred_name` varchar(500) NOT NULL,
  `client_email_address` varchar(500) NOT NULL,
  `client_referred_to` varchar(500) NOT NULL,
  `client_date_of_birth` varchar(500) NOT NULL,
  `client_ailment` varchar(500) NOT NULL,
  `client_primary_phone` varchar(500) NOT NULL,
  `client_culture_religion` varchar(500) NOT NULL,
  `client_sexuality` varchar(500) NOT NULL,
  `client_area` varchar(500) NOT NULL,
  `client_address_line_1` varchar(500) NOT NULL,
  `client_address_line_2` varchar(500) NOT NULL,
  `client_city` varchar(500) NOT NULL,
  `client_county` varchar(500) NOT NULL,
  `client_poster_code` varchar(500) NOT NULL,
  `client_country` varchar(500) NOT NULL,
  `client_access_details` varchar(500) NOT NULL,
  `client_highlights` text NOT NULL,
  `client_status` varchar(500) NOT NULL,
  `ClientStatuscolors` varchar(500) NOT NULL,
  `clientStart_date` varchar(500) NOT NULL,
  `clientEnd_date` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `client_service` varchar(500) NOT NULL,
  `what_is_important_to_me` text NOT NULL,
  `my_likes_and_dislikes` text NOT NULL,
  `my_current_condition` text NOT NULL,
  `my_medical_history` text NOT NULL,
  `my_physical_health` text NOT NULL,
  `my_mental_health` text NOT NULL,
  `how_i_communicate` text NOT NULL,
  `assistive_equipment_i_use` text NOT NULL,
  `btnActiveState` varchar(500) NOT NULL,
  `careplanStatus` varchar(500) NOT NULL,
  `client_latitude` varchar(500) NOT NULL,
  `client_longitude` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_general_client_form`
--

INSERT INTO `tbl_general_client_form` (`userId`, `client_title`, `client_first_name`, `client_last_name`, `client_middle_name`, `client_preferred_name`, `client_email_address`, `client_referred_to`, `client_date_of_birth`, `client_ailment`, `client_primary_phone`, `client_culture_religion`, `client_sexuality`, `client_area`, `client_address_line_1`, `client_address_line_2`, `client_city`, `client_county`, `client_poster_code`, `client_country`, `client_access_details`, `client_highlights`, `client_status`, `ClientStatuscolors`, `clientStart_date`, `clientEnd_date`, `uryyToeSS4`, `client_service`, `what_is_important_to_me`, `my_likes_and_dislikes`, `my_current_condition`, `my_medical_history`, `my_physical_health`, `my_mental_health`, `how_i_communicate`, `assistive_equipment_i_use`, `btnActiveState`, `careplanStatus`, `client_latitude`, `client_longitude`, `col_company_Id`, `dateTime`) VALUES
(1, 'Mr.', 'Phillip', 'Mason', 'Phill', 'Phill', '', 'He/Him', '2002-12-03', 'Dimentia', '09574363784', 'Christianity', 'Male', 'Codsall', '22', 'Culwell Street', 'Wolverhampton', 'West Midlands', 'CA2 6BS', 'United Kingdom', '3423', 'If something has gone wrong that causes a patient’s death or such severe harm that the patient is unlikely to regain consciousness or capacity, you must be open and honest with those close to the patient.3, 23 Take time to convey the information in a compassionate way, giving them the opportunity to ask questions at the time and afterwards.24  \r\n\r\n<br /><br />\r\nYou must show respect for, and respond sensitively to, the wishes and needs of bereaved people. You must take into account what you know of the patient’s wishes about what should happen after their death, including their views about sharing information. You should be prepared to offer support and assistance to bereaved people – for example by explaining where they can get information about, and help with, administrative and practical tasks following a death; or by involving other members of the team, such as chaplaincy or bereavement care staff. 25, 26 \r\n<br /><br />\r\nYou should make sure, as far as possible, that those close to the patient have been offered appropriate support, and that they have a specific point of contact in case they have concerns or questions at a later date.', 'Active', '#27ae60', '2024-04-26T13:09', '', 'be7960cb8233ddcbf923c1fc6bb8ca6d2779972dabfefe0b8dbec78f2d666567', 'Domiciliary care', 'Null', 'Null', 'Null', 'Hello world', 'Null', 'Null', 'Null', 'Null', '', '', '52.590064', '-2.1210836', '071efc90e868997470246bac0ff90e4e0bededa1b12164e4a95d24ab8e0279a7', '2024-04-26 13:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_team_form`
--

CREATE TABLE `tbl_general_team_form` (
  `userId` int(11) NOT NULL,
  `team_title` varchar(500) NOT NULL,
  `team_first_name` varchar(500) NOT NULL,
  `team_last_name` varchar(500) NOT NULL,
  `team_middle_name` varchar(500) NOT NULL,
  `team_preferred_name` varchar(500) NOT NULL,
  `team_email_address` varchar(500) NOT NULL,
  `team_referred_to` varchar(500) NOT NULL,
  `team_date_of_birth` varchar(500) NOT NULL,
  `team_nationality` varchar(500) NOT NULL,
  `team_primary_phone` varchar(500) NOT NULL,
  `team_culture_religion` varchar(500) NOT NULL,
  `team_sexuality` varchar(500) NOT NULL,
  `team_dbs` varchar(500) NOT NULL,
  `team_nin` varchar(500) NOT NULL,
  `team_address_line_1` varchar(500) NOT NULL,
  `team_address_line_2` varchar(500) NOT NULL,
  `team_city` varchar(500) NOT NULL,
  `team_county` varchar(500) NOT NULL,
  `team_poster_code` varchar(500) NOT NULL,
  `team_country` varchar(500) NOT NULL,
  `team_status` varchar(500) NOT NULL,
  `TeamStatuscolors` varchar(500) NOT NULL,
  `uryyTteamoeSS4` varchar(500) NOT NULL,
  `privilege` varchar(500) NOT NULL,
  `team_info` text NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goesoft_carers_account`
--

CREATE TABLE `tbl_goesoft_carers_account` (
  `userId` int(11) NOT NULL,
  `user_fullname` text NOT NULL,
  `user_email_address` varchar(500) NOT NULL,
  `user_phone_number` varchar(500) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `date_registered` varchar(500) NOT NULL,
  `time_registered` varchar(500) NOT NULL,
  `user_special_Id` varchar(500) NOT NULL,
  `verification_code` varchar(500) NOT NULL,
  `status1` varchar(500) NOT NULL,
  `status2` varchar(500) NOT NULL,
  `VNumber` varchar(500) NOT NULL,
  `carer_deviceId` varchar(500) NOT NULL,
  `care_plan_status` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goesoft_users`
--

CREATE TABLE `tbl_goesoft_users` (
  `userId` int(11) NOT NULL,
  `user_fullname` varchar(500) NOT NULL,
  `user_email_address` varchar(500) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `date_registered` varchar(500) NOT NULL,
  `time_registered` varchar(500) NOT NULL,
  `user_special_Id` varchar(500) NOT NULL,
  `VNumber` varchar(100) NOT NULL,
  `verification_code` varchar(500) NOT NULL,
  `status1` varchar(500) NOT NULL,
  `status2` varchar(500) NOT NULL,
  `myviewArea` varchar(500) NOT NULL,
  `client_view` varchar(500) NOT NULL,
  `team_view` varchar(500) NOT NULL,
  `my_city` varchar(500) NOT NULL,
  `my_ip` varchar(500) NOT NULL,
  `my_country` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_goesoft_users`
--

INSERT INTO `tbl_goesoft_users` (`userId`, `user_fullname`, `user_email_address`, `company_name`, `user_password`, `date_registered`, `time_registered`, `user_special_Id`, `VNumber`, `verification_code`, `status1`, `status2`, `myviewArea`, `client_view`, `team_view`, `my_city`, `my_ip`, `my_country`, `col_company_Id`, `dateTime`) VALUES
(1, 'Ese Sphere', 'admin@geosoft.com', 'Geocare Services Limited', 'a8f5dea10f7504a0305998adef3a9c8c2f769c475ad5a3baf23acf9be81cea33', '2024-04-16', '12:12pm', '6691b61d6874ec29b95d01dea34ff3ffda35bfb5ba9dc3b560794d7d4b6905e2', '0676345', 'Verified', '0', 'disabled', 'Wolverhampton', 'Wolverhampton', 'Wolverhampton', 'Not Define', '::1', 'Not Define', '071efc90e868997470246bac0ff90e4e0bededa1b12164e4a95d24ab8e0279a7', '2024-04-26 11:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_list`
--

CREATE TABLE `tbl_group_list` (
  `group_id` int(11) NOT NULL,
  `group_area` varchar(500) NOT NULL,
  `group_city` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_group_list`
--

INSERT INTO `tbl_group_list` (`group_id`, `group_area`, `group_city`, `dateTime`) VALUES
(1, 'Hednesford', 'Cannock', '2024-03-07 09:49:01'),
(2, 'Pattingham', 'Wolverhampton', '2024-03-07 09:49:09'),
(3, 'Codsall', 'Wolverhampton', '2024-03-07 09:49:15'),
(4, 'Norton canes', 'Cannock', '2024-03-07 09:49:24'),
(5, 'STO', 'Stock on trent', '2024-03-07 09:49:43'),
(6, 'Aldridge', 'Walsall', '2024-03-07 09:50:44'),
(7, 'Bescot', 'Walsall', '2024-03-07 09:50:54'),
(8, 'Perton', 'Wolverhampton', '2024-03-07 13:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manage_runs`
--

CREATE TABLE `tbl_manage_runs` (
  `userId` int(11) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `client_area` varchar(500) NOT NULL,
  `col_client_city` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `care_calls` varchar(500) NOT NULL,
  `dateTime_in` varchar(500) NOT NULL,
  `dateTime_out` varchar(500) NOT NULL,
  `run_area_nameId` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medication_list`
--

CREATE TABLE `tbl_medication_list` (
  `med_Id` int(11) NOT NULL,
  `med_name` varchar(500) NOT NULL,
  `med_dosage` varchar(500) NOT NULL,
  `med_type` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medication_list`
--

INSERT INTO `tbl_medication_list` (`med_Id`, `med_name`, `med_dosage`, `med_type`, `dateTime`) VALUES
(1, 'Paracetamol', '500mg', 'Tablets', '2024-03-07 09:38:37'),
(2, 'donepezil', '5mg', 'Tablets', '2024-03-07 09:41:38'),
(3, 'Rivastigmine', '50mg', 'Capsule', '2024-03-07 09:41:55'),
(4, 'Galantamine', '10mg', 'Tablets', '2024-03-07 09:42:13'),
(5, 'Memantine', '10mg', 'Syrup', '2024-03-07 09:44:14'),
(6, 'E45', '20mg', 'General cream', '2024-03-07 09:44:27'),
(7, 'Barrier', '10mg', 'Barrier cream', '2024-03-07 09:45:06'),
(8, 'Air wick', '--', 'Air spray', '2024-03-07 09:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mental_health_assessment_tool`
--

CREATE TABLE `tbl_mental_health_assessment_tool` (
  `userId` int(11) NOT NULL,
  `assess_name` varchar(500) NOT NULL,
  `digit_zerro` varchar(500) NOT NULL,
  `digit_one` varchar(500) NOT NULL,
  `digit_two` varchar(500) NOT NULL,
  `digit_three` varchar(500) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_moving_and_handling`
--

CREATE TABLE `tbl_moving_and_handling` (
  `userId` int(11) NOT NULL,
  `actions` varchar(500) NOT NULL,
  `assistance_required` varchar(500) NOT NULL,
  `empty_col` varchar(500) NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_needs_assessment`
--

CREATE TABLE `tbl_needs_assessment` (
  `userId` int(11) NOT NULL,
  `my_needs` varchar(500) NOT NULL,
  `outcome_i_want` text NOT NULL,
  `wshthmat` text NOT NULL,
  `crthmamdo` text NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` text NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_outcome_of_assessment`
--

CREATE TABLE `tbl_outcome_of_assessment` (
  `userId` int(11) NOT NULL,
  `my_description` varchar(500) NOT NULL,
  `col_yes` varchar(500) NOT NULL,
  `col_no` varchar(500) NOT NULL,
  `not_capable` varchar(500) NOT NULL,
  `unable_to_assist` varchar(500) NOT NULL,
  `able_to_assist` varchar(500) NOT NULL,
  `fully_capable` varchar(500) NOT NULL,
  `comments` text NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` varchar(500) NOT NULL,
  `assessment_type` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personalised_risk_assessment`
--

CREATE TABLE `tbl_personalised_risk_assessment` (
  `userId` int(11) NOT NULL,
  `identified_hazard` varchar(500) NOT NULL,
  `risk_level` varchar(500) NOT NULL,
  `wiarahmtbh` text NOT NULL,
  `hitrmom` text NOT NULL,
  `wshwho` text NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_Id` int(11) NOT NULL,
  `position_name` varchar(500) NOT NULL,
  `position_details` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_Id`, `position_name`, `position_details`, `dateTime`) VALUES
(1, 'Support worker', 'Support worker', '2024-03-08 10:03:32'),
(2, 'Health Care Assistant', 'HCA', '2024-03-08 10:03:43'),
(3, 'Senior Carer', 'Senior carer', '2024-03-08 10:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_issues`
--

CREATE TABLE `tbl_report_issues` (
  `report_Id` int(11) NOT NULL,
  `reP56klix75ort` varchar(500) NOT NULL,
  `team_members` varchar(500) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `report_title` varchar(500) NOT NULL,
  `report_details` text NOT NULL,
  `reply_report` text NOT NULL,
  `report_status` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_call`
--

CREATE TABLE `tbl_schedule_call` (
  `event_id` int(11) NOT NULL,
  `team_name` varchar(500) NOT NULL,
  `team_name2` varchar(500) NOT NULL,
  `groupLocate` varchar(500) NOT NULL,
  `event_start_date` varchar(500) NOT NULL,
  `event_end_date` varchar(500) NOT NULL,
  `schedule_CarerId` varchar(500) NOT NULL,
  `schedule_secondCarerId` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_calls`
--

CREATE TABLE `tbl_schedule_calls` (
  `userId` int(11) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `client_area` varchar(500) NOT NULL,
  `col_area_city` varchar(500) NOT NULL,
  `col_area_Id` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `first_carer` varchar(500) NOT NULL,
  `second_carer` varchar(500) NOT NULL,
  `first_carer_Id` varchar(500) NOT NULL,
  `second_carer_Id` varchar(500) NOT NULL,
  `care_calls` varchar(500) NOT NULL,
  `dateTime_in` varchar(500) NOT NULL,
  `dateTime_out` varchar(500) NOT NULL,
  `Clientshift_Date` varchar(500) NOT NULL,
  `client_resource` varchar(500) NOT NULL,
  `timeline_colour` varchar(500) NOT NULL,
  `rightTo_display` varchar(500) NOT NULL,
  `call_status` varchar(500) NOT NULL,
  `checkinout_Id` varchar(500) NOT NULL,
  `bgChange` varchar(500) NOT NULL,
  `currMonths` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sensory_impairment_plan`
--

CREATE TABLE `tbl_sensory_impairment_plan` (
  `userId` int(11) NOT NULL,
  `impairment_need` varchar(500) NOT NULL,
  `interventions` text NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_list`
--

CREATE TABLE `tbl_task_list` (
  `task_id` int(11) NOT NULL,
  `task_title` varchar(500) NOT NULL,
  `task_category` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_task_list`
--

INSERT INTO `tbl_task_list` (`task_id`, `task_title`, `task_category`, `dateTime`) VALUES
(1, 'Assist with meal preparation', 'Nutrition and hydration', '2024-03-07 09:01:39'),
(2, 'Assist with personal care', 'Personal care', '2024-03-07 09:02:09'),
(3, 'Assist with walking around', 'Environmental', '2024-03-07 09:06:20'),
(4, 'Assist with setting up peg feed', 'Nutrition and hydration', '2024-03-07 09:06:48'),
(5, 'Assist with hoisting', 'Social support', '2024-03-07 09:07:03'),
(6, 'Assist with preparing tea', 'Nutrition and hydration', '2024-03-07 09:09:50'),
(7, 'Assist with laundering', 'Environmental', '2024-03-07 09:12:03'),
(8, 'Assist with shopping', 'Social support', '2024-03-07 09:12:20'),
(9, 'Keep the house clean', 'Environmental', '2024-03-07 09:14:39'),
(10, 'Assist with medication', 'Medical', '2024-03-07 09:15:08'),
(11, 'Assist with exercise', 'Everyday activities', '2024-03-07 09:15:29'),
(12, 'Hand braces', 'Medical', '2024-03-07 09:16:01'),
(13, 'Assist with safty boot', 'Medical', '2024-03-07 09:16:21'),
(14, 'Empty commode', 'Social support', '2024-03-07 09:16:38'),
(15, 'Assist with appointment schedule', 'Administrative', '2024-03-07 09:17:06'),
(16, 'Assist with feeding', 'Nutrition and hydration', '2024-03-07 09:30:34'),
(17, 'Assist with change of clothes', 'Personal care', '2024-03-07 09:31:00'),
(18, 'Assist with change of pad', 'Personal care', '2024-03-07 09:31:16'),
(19, 'Assis with repositioning', 'Social support', '2024-03-07 09:31:34'),
(20, 'Assist with shaving', 'Personal care', '2024-03-07 09:32:09'),
(21, 'Assist with mouth brushing', 'Personal care', '2024-03-07 09:32:33'),
(22, 'Assist with shower', 'Personal care', '2024-03-07 09:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_certificates`
--

CREATE TABLE `tbl_team_certificates` (
  `userId` int(11) NOT NULL,
  `cert_name` varchar(500) NOT NULL,
  `cert_expire` varchar(500) NOT NULL,
  `dateUpload` varchar(500) NOT NULL,
  `cert_file` varchar(500) NOT NULL,
  `uryyTteamoeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visit_tasks_plan`
--

CREATE TABLE `tbl_visit_tasks_plan` (
  `userId` int(11) NOT NULL,
  `visit` varchar(500) NOT NULL,
  `ttbc` text NOT NULL,
  `etbuattbao` text NOT NULL,
  `submitedDate` varchar(500) NOT NULL,
  `assessorName` varchar(500) NOT NULL,
  `assessorEmail` varchar(500) NOT NULL,
  `help_tasks` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_test`
--

CREATE TABLE `weekly_test` (
  `userId` int(11) NOT NULL,
  `cons_no` varchar(500) NOT NULL,
  `col_name` varchar(500) NOT NULL,
  `col_money` varchar(500) NOT NULL,
  `curYear` varchar(500) NOT NULL,
  `curMonth` varchar(500) NOT NULL,
  `currentDate` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chat_system`
--
ALTER TABLE `tbl_chat_system`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_clients_medication_records`
--
ALTER TABLE `tbl_clients_medication_records`
  ADD PRIMARY KEY (`med_Id`);

--
-- Indexes for table `tbl_clients_task_records`
--
ALTER TABLE `tbl_clients_task_records`
  ADD PRIMARY KEY (`client_Id`);

--
-- Indexes for table `tbl_clienttime_calls`
--
ALTER TABLE `tbl_clienttime_calls`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_client_medical`
--
ALTER TABLE `tbl_client_medical`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_client_nok`
--
ALTER TABLE `tbl_client_nok`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_client_notes`
--
ALTER TABLE `tbl_client_notes`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_client_runs`
--
ALTER TABLE `tbl_client_runs`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_daily_shift_records`
--
ALTER TABLE `tbl_daily_shift_records`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_equipment_risk_assessment`
--
ALTER TABLE `tbl_equipment_risk_assessment`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_finished_tasks`
--
ALTER TABLE `tbl_finished_tasks`
  ADD PRIMARY KEY (`task_Id`);

--
-- Indexes for table `tbl_fire_action_plan`
--
ALTER TABLE `tbl_fire_action_plan`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_general_client_form`
--
ALTER TABLE `tbl_general_client_form`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_general_team_form`
--
ALTER TABLE `tbl_general_team_form`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_goesoft_carers_account`
--
ALTER TABLE `tbl_goesoft_carers_account`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_goesoft_users`
--
ALTER TABLE `tbl_goesoft_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_group_list`
--
ALTER TABLE `tbl_group_list`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tbl_manage_runs`
--
ALTER TABLE `tbl_manage_runs`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_medication_list`
--
ALTER TABLE `tbl_medication_list`
  ADD PRIMARY KEY (`med_Id`);

--
-- Indexes for table `tbl_mental_health_assessment_tool`
--
ALTER TABLE `tbl_mental_health_assessment_tool`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_moving_and_handling`
--
ALTER TABLE `tbl_moving_and_handling`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_needs_assessment`
--
ALTER TABLE `tbl_needs_assessment`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_outcome_of_assessment`
--
ALTER TABLE `tbl_outcome_of_assessment`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_personalised_risk_assessment`
--
ALTER TABLE `tbl_personalised_risk_assessment`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_Id`);

--
-- Indexes for table `tbl_report_issues`
--
ALTER TABLE `tbl_report_issues`
  ADD PRIMARY KEY (`report_Id`);

--
-- Indexes for table `tbl_schedule_call`
--
ALTER TABLE `tbl_schedule_call`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_schedule_calls`
--
ALTER TABLE `tbl_schedule_calls`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_sensory_impairment_plan`
--
ALTER TABLE `tbl_sensory_impairment_plan`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_task_list`
--
ALTER TABLE `tbl_task_list`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tbl_team_certificates`
--
ALTER TABLE `tbl_team_certificates`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_visit_tasks_plan`
--
ALTER TABLE `tbl_visit_tasks_plan`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `weekly_test`
--
ALTER TABLE `weekly_test`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chat_system`
--
ALTER TABLE `tbl_chat_system`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_clients_medication_records`
--
ALTER TABLE `tbl_clients_medication_records`
  MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_clients_task_records`
--
ALTER TABLE `tbl_clients_task_records`
  MODIFY `client_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_clienttime_calls`
--
ALTER TABLE `tbl_clienttime_calls`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_client_medical`
--
ALTER TABLE `tbl_client_medical`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client_nok`
--
ALTER TABLE `tbl_client_nok`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_client_notes`
--
ALTER TABLE `tbl_client_notes`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_client_runs`
--
ALTER TABLE `tbl_client_runs`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_daily_shift_records`
--
ALTER TABLE `tbl_daily_shift_records`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_equipment_risk_assessment`
--
ALTER TABLE `tbl_equipment_risk_assessment`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_finished_tasks`
--
ALTER TABLE `tbl_finished_tasks`
  MODIFY `task_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fire_action_plan`
--
ALTER TABLE `tbl_fire_action_plan`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_general_client_form`
--
ALTER TABLE `tbl_general_client_form`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_general_team_form`
--
ALTER TABLE `tbl_general_team_form`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_goesoft_carers_account`
--
ALTER TABLE `tbl_goesoft_carers_account`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_goesoft_users`
--
ALTER TABLE `tbl_goesoft_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_group_list`
--
ALTER TABLE `tbl_group_list`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_manage_runs`
--
ALTER TABLE `tbl_manage_runs`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medication_list`
--
ALTER TABLE `tbl_medication_list`
  MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_mental_health_assessment_tool`
--
ALTER TABLE `tbl_mental_health_assessment_tool`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_moving_and_handling`
--
ALTER TABLE `tbl_moving_and_handling`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_needs_assessment`
--
ALTER TABLE `tbl_needs_assessment`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_outcome_of_assessment`
--
ALTER TABLE `tbl_outcome_of_assessment`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_personalised_risk_assessment`
--
ALTER TABLE `tbl_personalised_risk_assessment`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_report_issues`
--
ALTER TABLE `tbl_report_issues`
  MODIFY `report_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_schedule_call`
--
ALTER TABLE `tbl_schedule_call`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_schedule_calls`
--
ALTER TABLE `tbl_schedule_calls`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sensory_impairment_plan`
--
ALTER TABLE `tbl_sensory_impairment_plan`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_task_list`
--
ALTER TABLE `tbl_task_list`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_team_certificates`
--
ALTER TABLE `tbl_team_certificates`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_visit_tasks_plan`
--
ALTER TABLE `tbl_visit_tasks_plan`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekly_test`
--
ALTER TABLE `weekly_test`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
