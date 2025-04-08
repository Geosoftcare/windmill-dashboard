-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 12:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `distances`
--

CREATE TABLE `distances` (
  `userId` int(11) NOT NULL COMMENT 'This is an auto increment user ID',
  `origin_postcode` varchar(500) NOT NULL COMMENT 'This column contain carer current postcodes',
  `destination_postcode` varchar(500) NOT NULL COMMENT 'This is the destination post codes',
  `distance` varchar(500) NOT NULL COMMENT 'This is the calculated distance',
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'The actual time of the data insertion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing_config`
--

CREATE TABLE `tbl_billing_config` (
  `userId` int(11) NOT NULL,
  `col_billing_add` varchar(500) NOT NULL,
  `col_invoice_numb` varchar(500) NOT NULL,
  `col_office_numb` varchar(500) NOT NULL,
  `col_payment_details` varchar(500) NOT NULL,
  `col_communication` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancelled_call`
--

CREATE TABLE `tbl_cancelled_call` (
  `userId` int(11) NOT NULL,
  `col_client_name` varchar(500) NOT NULL,
  `col_care_call` varchar(500) NOT NULL,
  `col_client_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `col_time` varchar(500) NOT NULL,
  `col_cancellation_by` varchar(500) NOT NULL,
  `col_reason` varchar(500) NOT NULL,
  `col_pay_status` varchar(500) NOT NULL,
  `col_invoice` varchar(500) NOT NULL,
  `col_note` text NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_care_calls`
--

CREATE TABLE `tbl_care_calls` (
  `userId` int(11) NOT NULL,
  `col_client_Id` varchar(500) NOT NULL,
  `col_client_name` varchar(500) NOT NULL,
  `col_shift_date` varchar(500) NOT NULL,
  `col_care_call` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `col_carer_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_care_calls`
--

INSERT INTO `tbl_care_calls` (`userId`, `col_client_Id`, `col_client_name`, `col_shift_date`, `col_care_call`, `uryyToeSS4`, `col_carer_Id`, `col_company_Id`, `dateTime`) VALUES
(1, '65', 'Charity Addison', '2024-10-24', 'Morning', '1023', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:55:21'),
(2, '73', 'Donovan Byron', '2024-10-24', 'Morning', '1025', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:59:01');

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
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `extra_call1` varchar(500) NOT NULL,
  `extra_call2` varchar(500) NOT NULL,
  `extra_call3` varchar(500) NOT NULL,
  `extra_call4` varchar(500) NOT NULL,
  `col_extra_visit` text NOT NULL,
  `monday` varchar(500) NOT NULL,
  `tuesday` varchar(500) NOT NULL,
  `wednesday` varchar(500) NOT NULL,
  `thursday` varchar(500) NOT NULL,
  `friday` varchar(500) NOT NULL,
  `saturday` varchar(500) NOT NULL,
  `sunday` varchar(500) NOT NULL,
  `client_startMed` varchar(500) NOT NULL,
  `client_endMed` varchar(500) NOT NULL,
  `col_fifo` varchar(500) NOT NULL,
  `col_occurence` varchar(500) NOT NULL,
  `col_period_one` varchar(100) NOT NULL,
  `col_period_two` varchar(100) NOT NULL,
  `client_med_Id` varchar(500) NOT NULL,
  `med_colours` varchar(500) NOT NULL,
  `visibility` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clients_medication_records`
--

INSERT INTO `tbl_clients_medication_records` (`med_Id`, `uryyToeSS4`, `med_name`, `med_dosage`, `med_type`, `med_support_required`, `med_package`, `med_details`, `date_uploaded`, `time_uploaded`, `care_call1`, `care_call2`, `care_call3`, `care_call4`, `extra_call1`, `extra_call2`, `extra_call3`, `extra_call4`, `col_extra_visit`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `client_startMed`, `client_endMed`, `col_fifo`, `col_occurence`, `col_period_one`, `col_period_two`, `client_med_Id`, `med_colours`, `visibility`, `col_company_Id`, `dateTime`) VALUES
(1, '1023', 'Paracetamol', '20mg', 'Tablets', 'Prompt', 'PRN', 'The carer will see this note in the app each time they complete this task.', 'October 17, 2024', '01:25 pm', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', '2024-10-17', '', '6', '2024-10-17', '', 'Daily', '001', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:00'),
(2, '1023', 'Morphine sulfate', '10mg', 'As required', 'Administer', 'Scheduled', 'The carer will see this note in the app each time they complete this task.', 'October 17, 2024', '01:26 pm', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', '2024-10-17', '', '6', '2024-10-17', '', 'Daily', '002', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:13'),
(3, '1024', 'Paracetamol', '20mg', 'Tablets', 'Prompt', 'PRN', 'The medication box is in the upper left cabinet in the kitchen', 'October 21, 2024', '09:34 am', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', '2024-10-21', '', '3', '2024-10-21', '', 'Daily', '003', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 12:08:05'),
(4, '1024', 'Medi Derma-S barrier cream ', '10mg', 'Barrier cream', 'Administer', 'Scheduled', 'The medication box is in the upper left cabinet in the kitchen.', 'October 21, 2024', '09:35 am', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', '2024-10-21', '', '2', '2024-10-21', '', 'Daily', '004', '#000', '2024-10-21', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 10:27:17'),
(5, '1025', 'Paracetamol', '20mg', 'Tablets', 'Administer', 'PRN', 'Two tablets to be given daily', 'October 21, 2024', '09:40 am', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', '2024-10-21', '', '1', '2024-10-21', '2', 'Weeks', '005', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:59:22'),
(6, '1025', 'Donepezil', '25,000unit', 'Capsule', 'Administer', 'Scheduled', '', 'October 21, 2024', '09:41 am', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Fridat', 'Saturday', 'Sunday', '2024-10-21', '', '2', '2024-11-21', '', 'Monthly', '006', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:59:31');

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
  `extra_call1` varchar(500) NOT NULL,
  `extra_call2` varchar(500) NOT NULL,
  `extra_call3` varchar(500) NOT NULL,
  `extra_call4` varchar(500) NOT NULL,
  `col_extra_visit` text NOT NULL,
  `monday` varchar(500) NOT NULL,
  `tuesday` varchar(500) NOT NULL,
  `wednesday` varchar(500) NOT NULL,
  `thursday` varchar(500) NOT NULL,
  `friday` varchar(500) NOT NULL,
  `saturday` varchar(500) NOT NULL,
  `sunday` varchar(500) NOT NULL,
  `tast_anytimeSession` varchar(500) NOT NULL,
  `task_startDate` varchar(500) NOT NULL,
  `task_endDate` varchar(500) NOT NULL,
  `col_fifo` varchar(500) NOT NULL,
  `col_occurence` varchar(500) NOT NULL,
  `col_period_one` varchar(500) NOT NULL,
  `col_period_two` varchar(500) NOT NULL,
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

INSERT INTO `tbl_clients_task_records` (`client_Id`, `uryyToeSS4`, `client_taskName`, `client_task_details`, `care_call1`, `care_call2`, `care_call3`, `care_call4`, `extra_call1`, `extra_call2`, `extra_call3`, `extra_call4`, `col_extra_visit`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `tast_anytimeSession`, `task_startDate`, `task_endDate`, `col_fifo`, `col_occurence`, `col_period_one`, `col_period_two`, `date_uploaded`, `time_uploaded`, `client_task_Id`, `task_colours`, `visibility`, `col_company_Id`, `dateTime`) VALUES
(1, '1023', 'Access house via key safe', 'Keysafe code is 4332', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Anytime/Session', '2024-10-17', '', '6', '2024-10-17', '', 'Daily', '', '', '001', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:25'),
(2, '1023', 'Assist to change incontinence pad', 'The carer will see this note in the app each time they complete this task.', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Anytime/Session', '2024-10-17', '', '6', '2024-10-17', '', 'Daily', '', '', '002', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:34'),
(3, '1024', 'Apply cream to vulnerable areas', 'The carer will see this note in the app each time they complete this task.', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Anytime/Session', '2024-10-21', '', '1', '2024-10-21', '', 'Daily', '', '', '003', '#000', '2024-10-21', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 10:27:23'),
(4, '1024', 'Assist to have a full body wash', 'Kindly assist to have a full body wash and please be gentle thank you.', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Anytime/Session', '2024-10-21', '', '2', '2024-10-21', '', 'Daily', '', '', '004', '#000', '2024-10-21', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 10:27:27'),
(5, '1025', 'Assist to dress / undress', 'Please all her dresses are well arranged in the walldrop', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Anytime/Session', '2024-10-21', '', '1', '2024-10-21', '', 'Daily', '', '', '005', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:59:50'),
(6, '1025', 'Assist to have a shower', 'Kindly use the bathing soap', 'Breakfast', 'Lunch', 'Tea', 'Bed', '', '', '', '', '', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Anytime/Session', '2024-10-21', '', '2', '2024-10-21', '', 'Daily', '', '', '006', '#000', '2024-10-24', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 15:00:00');

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
  `col_monday` varchar(500) NOT NULL,
  `col_tuesday` varchar(500) NOT NULL,
  `col_wednesday` varchar(500) NOT NULL,
  `col_thursday` varchar(500) NOT NULL,
  `col_friday` varchar(500) NOT NULL,
  `col_saturday` varchar(500) NOT NULL,
  `col_sunday` varchar(500) NOT NULL,
  `col_client_funding` varchar(500) NOT NULL,
  `col_funding_rate` varchar(500) NOT NULL,
  `col_required_carers` varchar(500) NOT NULL,
  `col_startDate` varchar(500) NOT NULL,
  `col_endDate` varchar(500) NOT NULL,
  `col_occurence` varchar(500) NOT NULL,
  `col_period_one` varchar(500) NOT NULL,
  `col_period_two` varchar(500) NOT NULL,
  `col_right_to_display` varchar(500) NOT NULL,
  `col_val_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clienttime_calls`
--

INSERT INTO `tbl_clienttime_calls` (`userId`, `client_name`, `client_area`, `uryyToeSS4`, `care_calls`, `dateTime_in`, `dateTime_out`, `col_monday`, `col_tuesday`, `col_wednesday`, `col_thursday`, `col_friday`, `col_saturday`, `col_sunday`, `col_client_funding`, `col_funding_rate`, `col_required_carers`, `col_startDate`, `col_endDate`, `col_occurence`, `col_period_one`, `col_period_two`, `col_right_to_display`, `col_val_Id`, `col_company_Id`, `dateTime`) VALUES
(1, 'Charity Addison', 'Codsall', '1023', 'Morning', '06:00', '07:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:17:46'),
(2, 'Charity Addison', 'Codsall', '1023', 'Lunch', '10:00', '10:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:18:04'),
(3, 'Charity Addison', 'Codsall', '1023', 'Tea', '14:00', '14:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:18:28'),
(4, 'Charity Addison', 'Codsall', '1023', 'Bed', '18:00', '18:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:18:45'),
(5, 'Ciaran Jillian', 'Codsall', '1024', 'Morning', '07:00', '08:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:19:16'),
(6, 'Ciaran Jillian', 'Codsall', '1024', 'Lunch', '10:30', '11:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:19:37'),
(7, 'Ciaran Jillian', 'Codsall', '1024', 'Tea', '14:30', '15:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:19:59'),
(8, 'Ciaran Jillian', 'Codsall', '1024', 'Bed', '19:00', '19:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:20:27'),
(9, 'Donovan Byron', 'Codsall', '1025', 'Morning', '09:00', '09:45', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:21:13'),
(10, 'Donovan Byron', 'Codsall', '1025', 'Lunch', '11:30', '12:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:21:50'),
(11, 'Donovan Byron', 'Codsall', '1025', 'Tea', '15:00', '16:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:23:06'),
(12, 'Donovan Byron', 'Codsall', '1025', 'Bed', '19:30', '20:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_invoice`
--

CREATE TABLE `tbl_client_invoice` (
  `userId` int(11) NOT NULL,
  `col_invoice_date` varchar(500) NOT NULL,
  `col_invoice_time` varchar(500) NOT NULL,
  `col_client_name` varchar(500) NOT NULL,
  `col_contract_rate` varchar(500) NOT NULL,
  `col_worked_time` varchar(500) NOT NULL,
  `col_client_Id` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `col_company_Id` varchar(500) NOT NULL,
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
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `col_company_Id` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_notes`
--

INSERT INTO `tbl_client_notes` (`userId`, `uryyToeSS4`, `client_note`, `dateof_note`, `timeof_note`, `col_company_Id`, `date`) VALUES
(1, '1023', 'Upload client latest update.', '', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-17 12:24:27'),
(2, '1024', 'Upload client latest update.', '', '', '', '2024-10-21 08:33:33'),
(3, '1025', 'Upload client latest update.', '', '', '', '2024-10-21 08:39:11');

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
  `comp_location_view` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_runs`
--

INSERT INTO `tbl_client_runs` (`userId`, `run_name`, `run_town`, `col_run_city`, `run_ids`, `comp_location_view`, `col_company_Id`, `dateTime`) VALUES
(1, 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1', 'Wolverhampton', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:48:58'),
(2, 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '2', 'Wolverhampton', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_status_records`
--

CREATE TABLE `tbl_client_status_records` (
  `userId` int(11) NOT NULL,
  `col_client_name` varchar(500) NOT NULL,
  `col_reason` varchar(500) NOT NULL,
  `col_start_date` varchar(500) NOT NULL,
  `col_end_date` varchar(500) NOT NULL,
  `col_client_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contract`
--

CREATE TABLE `tbl_contract` (
  `userId` int(11) NOT NULL,
  `col_all` varchar(500) NOT NULL,
  `col_name` varchar(500) NOT NULL,
  `col_payer` varchar(500) NOT NULL,
  `col_service_type` varchar(500) NOT NULL,
  `col_rate_card` varchar(500) NOT NULL,
  `col_invoice_format` varchar(500) NOT NULL,
  `col_invoice_group` varchar(500) NOT NULL,
  `col_payer_Id` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
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
  `planned_timeIn` varchar(500) NOT NULL,
  `planned_timeOut` varchar(500) NOT NULL,
  `shift_start_time` varchar(500) NOT NULL,
  `shift_end_time` varchar(500) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `col_care_call` varchar(500) NOT NULL,
  `client_group` varchar(500) NOT NULL,
  `carer_Name` varchar(500) NOT NULL,
  `task_note` text NOT NULL,
  `col_carer_Id` varchar(500) NOT NULL,
  `timesheet_date` varchar(500) NOT NULL,
  `col_area_Id` varchar(1000) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_call_status` varchar(500) NOT NULL,
  `col_carecall_rate` varchar(500) NOT NULL,
  `col_miles` varchar(500) NOT NULL,
  `col_mileage` varchar(500) NOT NULL,
  `col_worked_time` varchar(500) NOT NULL,
  `col_client_rate` varchar(500) NOT NULL,
  `col_client_payer` varchar(500) NOT NULL,
  `col_visit_status` varchar(500) NOT NULL,
  `col_visit_confirmation` varchar(500) NOT NULL,
  `col_care_call_Id` varchar(500) NOT NULL,
  `col_postcode` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_daily_shift_records`
--

INSERT INTO `tbl_daily_shift_records` (`userId`, `shift_status`, `shift_date`, `planned_timeIn`, `planned_timeOut`, `shift_start_time`, `shift_end_time`, `client_name`, `uryyToeSS4`, `col_care_call`, `client_group`, `carer_Name`, `task_note`, `col_carer_Id`, `timesheet_date`, `col_area_Id`, `col_company_Id`, `col_call_status`, `col_carecall_rate`, `col_miles`, `col_mileage`, `col_worked_time`, `col_client_rate`, `col_client_payer`, `col_visit_status`, `col_visit_confirmation`, `col_care_call_Id`, `col_postcode`, `dateTime`) VALUES
(1, 'Checked in', '2024-10-24', '06:00', '07:00', '15:54', '15:58', 'Charity Addison', '1023', 'Morning', 'Codsall', 'Samson Sam', 'done all tasks and client was happy', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '2024-10-24', '1', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Completed', '11.55', '5.4 mi', '1.35', '01:00', '23.32', 'Staffordshire', 'True', 'Unconfirmed', '65', 'WV6 3AC', '2024-10-24 14:58:16'),
(2, 'Checked in', '2024-10-24', '', '', '15:58', 'Null', 'Donovan Byron', '1025', 'Morning', 'Codsall', 'Samson Sam', 'Null', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '2024-10-24', '1', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '', '', '4.7 mi', '', '', '17.49', 'Staffordshire', 'True', 'Unconfirmed', '73', 'WV6 8PQ', '2024-10-24 14:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `userId` int(11) NOT NULL,
  `col_description` varchar(500) NOT NULL,
  `col_document` varchar(500) NOT NULL,
  `uryyTteamoeSS4` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
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
-- Table structure for table `tbl_finished_meds`
--

CREATE TABLE `tbl_finished_meds` (
  `med_Id` int(11) NOT NULL,
  `task_name` varchar(500) NOT NULL,
  `med_date` varchar(500) NOT NULL,
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
  `care_calls` varchar(500) NOT NULL,
  `care_call_days` varchar(500) NOT NULL,
  `col_task_status` varchar(500) NOT NULL,
  `timesheet_date` varchar(500) NOT NULL,
  `col_care_call_Id` varchar(1000) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_finished_meds`
--

INSERT INTO `tbl_finished_meds` (`med_Id`, `task_name`, `med_date`, `task_timeIn`, `task_note`, `task_SpecialId`, `uryyToeSS4`, `team_1email`, `team_2email`, `category`, `col_dosage`, `col_carername`, `col_outcome`, `care_calls`, `care_call_days`, `col_task_status`, `timesheet_date`, `col_care_call_Id`, `col_company_Id`, `dateTime`) VALUES
(1, 'Paracetamol', '2024-10-24', '11:14am', '', '001', '1023', 'samsonosaretin@yahoo.com', '', 'Medication', '20mg', 'Samson Sam', 'Fully taken', 'Morning', 'Thursday', 'Updated', '', '65', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:00'),
(2, 'Morphine sulfate', '2024-10-24', '11:14am', '', '002', '1023', 'samsonosaretin@yahoo.com', '', 'Medication', '10mg', 'Samson Sam', 'Fully taken', 'Morning', 'Thursday', 'Updated', '', '65', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:13'),
(3, 'Paracetamol', '2024-10-24', '11:14am', '', '005', '1025', 'samsonosaretin@yahoo.com', '', 'Medication', '20mg', 'Samson Sam', 'Fully taken', 'Morning', 'Thursday', 'Updated', '', '73', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:59:22'),
(4, 'Donepezil', '2024-10-24', '11:14am', '', '006', '1025', 'samsonosaretin@yahoo.com', '', 'Medication', '25,000unit', 'Samson Sam', 'Fully taken', 'Morning', 'Thursday', 'Updated', '', '73', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:59:31');

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
  `care_calls` varchar(500) NOT NULL,
  `care_call_days` varchar(500) NOT NULL,
  `col_task_status` varchar(500) NOT NULL,
  `timesheet_date` varchar(500) NOT NULL,
  `col_care_call_Id` varchar(1000) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_finished_tasks`
--

INSERT INTO `tbl_finished_tasks` (`task_Id`, `task_name`, `task_date`, `task_timeIn`, `task_note`, `task_SpecialId`, `uryyToeSS4`, `team_1email`, `team_2email`, `category`, `col_dosage`, `col_carername`, `col_outcome`, `care_calls`, `care_call_days`, `col_task_status`, `timesheet_date`, `col_care_call_Id`, `col_company_Id`, `dateTime`) VALUES
(1, 'Access house via key safe', '2024-10-24', '11:14am', '', '001', '1023', 'samsonosaretin@yahoo.com', '', 'Task', 'Null', 'Samson Sam', 'Successful', 'Morning', 'Thursday', 'Updated', '', '65', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:25'),
(2, 'Assist to change incontinence pad', '2024-10-24', '11:14am', '', '002', '1023', 'samsonosaretin@yahoo.com', '', 'Task', 'Null', 'Samson Sam', 'Successful', 'Morning', 'Thursday', 'Updated', '', '65', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:56:34'),
(3, 'Assist to dress / undress', '2024-10-24', '11:14am', '', '005', '1025', 'samsonosaretin@yahoo.com', '', 'Task', 'Null', 'Samson Sam', 'Successful', 'Morning', 'Thursday', 'Updated', '', '73', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 14:59:50'),
(4, 'Assist to have a shower', '2024-10-24', '11:14am', '', '006', '1025', 'samsonosaretin@yahoo.com', '', 'Task', 'Null', 'Samson Sam', 'Successful', 'Morning', 'Thursday', 'Updated', '', '73', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-24 15:00:00');

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
-- Table structure for table `tbl_funding`
--

CREATE TABLE `tbl_funding` (
  `userId` int(11) NOT NULL,
  `col_client_name` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `col_payer` varchar(500) NOT NULL,
  `col_pay_rate` varchar(500) NOT NULL,
  `col_invoice_format` varchar(500) NOT NULL,
  `col_local_auth` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
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
  `col_second_phone` text NOT NULL,
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
  `col_Office_Incharge` text NOT NULL,
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
  `col_pay_rate` varchar(500) NOT NULL,
  `col_swn_number` text NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_general_client_form`
--

INSERT INTO `tbl_general_client_form` (`userId`, `client_title`, `client_first_name`, `client_last_name`, `client_middle_name`, `client_preferred_name`, `client_email_address`, `client_referred_to`, `client_date_of_birth`, `client_ailment`, `client_primary_phone`, `col_second_phone`, `client_culture_religion`, `client_sexuality`, `client_area`, `client_address_line_1`, `client_address_line_2`, `client_city`, `client_county`, `client_poster_code`, `client_country`, `client_access_details`, `client_highlights`, `col_Office_Incharge`, `client_status`, `ClientStatuscolors`, `clientStart_date`, `clientEnd_date`, `uryyToeSS4`, `client_service`, `what_is_important_to_me`, `my_likes_and_dislikes`, `my_current_condition`, `my_medical_history`, `my_physical_health`, `my_mental_health`, `how_i_communicate`, `assistive_equipment_i_use`, `btnActiveState`, `careplanStatus`, `client_latitude`, `client_longitude`, `col_pay_rate`, `col_swn_number`, `col_company_Id`, `dateTime`) VALUES
(1, 'Mrs.', 'Charity', 'Addison', 'Libby', 'Bryar', 'dasytopy@mailinator.com', 'She/Her', '1977-12-22', 'Bed bound', '343 444 5545', '', 'Neo-Paganism', 'Female', 'Codsall', '44', 'Minus nostrud eaque ', 'Wolverhampton', 'West Midlands', 'WV6 3AC', 'United Kingdom', '5433', 'An About Me page is an opportunity to share your brand\'s story and connect with customers. Read this to learn how to write a good About Me page.\r\n<br><br>\r\nAn ‘About Me\' landing page is a crucial part of any website. Your ‘About Me\' page is how potential customers and employers are going to learn more about you and your business, but it\'s also going to help you form strong connections with your readers. When your customers feel like they actually know you, you\'ll become a much more credible brand in their eyes.\r\n<br><br>\r\nBut writing an ‘About Me\' page isn\'t so easy. Sure, it\'s easy to talk about yourself, but how do you condense all the important parts into a short paragraph?\r\n<br><br>\r\nDon\'t worry—we\'ll be showing you exactly how in this article.\r\n<br><br>\r\nIn this article, we\'ll be going over everything you need to know about how to write an ‘About Me\' page. We\'ll be discussing the aspects that make a good ‘About Me\' page, an ‘About Me\' template, tips for writing an ‘About Me\' page, and more. We\'ll even go over some ‘About Me\' examples, so you can get a better idea of exactly how to write yours.', 'Wolverhampton', 'Active', '#27ae60', '2023-04-06T23:26', '', '1023', 'Domiciliary care', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', '', '', '52.5868159', '-2.1256587', '', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-17 12:24:27'),
(2, 'Mrs.', 'Ciaran', 'Jillian', 'Ariel', 'Arsenio', 'tefum@mailinator.com', 'She/Her', '1971-08-02', 'Bedbound', '787 675 9985', '', 'Tenrikyo', 'Female', 'Codsall', '54', 'Molestiae consectetu', 'Wolverhampton', 'West Midlands', 'WV10 2UJ', 'United Kingdom', 'Access key 3674', 'I am a person who is positive about every aspect of life. There are many things I like to do, to see, and to experience. I like to read, I like to write; I like to think, I like to dream; I like to talk, I like to listen. I like to see the sunrise in the morning, I like to see the moonlight at night; I like to feel the music flowing on my face, I like to smell the wind coming from the ocean. I like to look at the clouds in the sky with a blank mind, I like to do thought experiment when I cannot sleep in the middle of the night. I like flowers in spring, rain in summer, leaves in autumn, and snow in winter. I like to sleep early, I like to get up late; I like to be alone, I like to be surrounded by people. I like country’s peace, I like metropolis’ noise; I like the beautiful west lake in Hangzhou, I like the flat cornfield in Champaign. I like delicious food and comfortable shoes; I like good books and romantic movies. I like the land and the nature, I like people. And, I like to laugh. ', 'Wolverhampton', 'Active', '#27ae60', '2019-02-27T23:06', '', '1024', 'Domiciliary care', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', '', '', '52.5868159', '-2.1256587', '', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 08:33:33'),
(3, 'Mrs.', 'Donovan', 'Byron', 'Nolan', 'Bethany', 'sumy@mailinator.com', 'She/Her', '1938-08-31', 'Hip replacement', '345 995 2364', '', 'Shinto', 'Female', 'Codsall', '53', 'Possimus amet vel ', 'Wolverhampton', 'West Midlands', 'WV6 8PQ', 'United Kingdom', '9998', 'I always wanted to be a great writer, like Victor Hugo who wrote \"Les Miserable\", or like Roman Roland who wrote \"John Christopher\". They have influenced millions of people through their books. I also wanted to be a great psychologist, like William James or Sigmund Freud, who could read people’s mind. Of course, I am nowhere close to these people, yet. I am just someone who does some teaching, some research, and some writing. But my dream is still alive. ', 'Wolverhampton', 'Active', '#27ae60', '2019-08-19T20:16', '', '1025', 'Domiciliary care', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', '', '', '52.5868159', '-2.1256587', '', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 08:39:11');

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
  `transportation` varchar(500) NOT NULL,
  `col_pay_rate` varchar(500) NOT NULL,
  `col_rate_type` varchar(500) NOT NULL,
  `col_mileage` text NOT NULL,
  `employment_type` varchar(500) NOT NULL,
  `col_company_city` varchar(500) NOT NULL,
  `col_start_date` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_team_resource` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_general_team_form`
--

INSERT INTO `tbl_general_team_form` (`userId`, `team_title`, `team_first_name`, `team_last_name`, `team_middle_name`, `team_preferred_name`, `team_email_address`, `team_referred_to`, `team_date_of_birth`, `team_nationality`, `team_primary_phone`, `team_culture_religion`, `team_sexuality`, `team_dbs`, `team_nin`, `team_address_line_1`, `team_address_line_2`, `team_city`, `team_county`, `team_poster_code`, `team_country`, `team_status`, `TeamStatuscolors`, `uryyTteamoeSS4`, `privilege`, `team_info`, `transportation`, `col_pay_rate`, `col_rate_type`, `col_mileage`, `employment_type`, `col_company_city`, `col_start_date`, `col_company_Id`, `col_team_resource`, `dateTime`) VALUES
(1, 'Lady.', 'Kirby', 'Hakeem', 'Fletcher', 'Oliver', 'sahepiducu@mailinator.com', 'She/Her', '1940-04-20', 'Netherlands Antilles', '454 566 7674', 'Christianity', 'Female', '234523425', '2564564364563', '923', 'Aut sed enim rerum p', 'Wolverhampton', 'West Midlands', 'WV8 6AB', 'Korea, Republic of', 'Active', 'rgba(41, 128, 185,1.0)', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', '', '', 'Car', '11.44', 'Care Assistant Driver', '0.25', 'Permanent employment', 'Wolverhampton', '2023-12-30', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'RS07647', '2024-10-21 09:17:12'),
(2, 'Mr.', 'Samson', 'Sam', 'Gift', 'Samson', 'samsonosaretin@yahoo.com', 'He/Him', '1926-11-30', 'Nigeria', '354 998 8857', 'Christianity', 'Male', '886968675', '0095898589553', '3', 'Duis sed aut incidid', 'Wolverhampton', 'West Midlands', 'WV6 6SA', 'United Kingdom', 'Active', 'rgba(33, 150, 243,1.0)', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '', '', 'Car', '11.55', 'Care Assistant Driver', '0.25', 'Permanent employment', 'Wolverhampton', '2022-03-29', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'RS02081', '2024-10-25 15:18:06');

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
  `col_cookies_identifier` varchar(500) NOT NULL,
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

--
-- Dumping data for table `tbl_goesoft_carers_account`
--

INSERT INTO `tbl_goesoft_carers_account` (`userId`, `user_fullname`, `user_email_address`, `user_phone_number`, `user_password`, `col_cookies_identifier`, `date_registered`, `time_registered`, `user_special_Id`, `verification_code`, `status1`, `status2`, `VNumber`, `carer_deviceId`, `care_plan_status`, `col_company_Id`, `dateTime`) VALUES
(1, 'Samson Sam', 'samsonosaretin@yahoo.com', '354 998 8857', '83e19a9ce479dc064bab4bd50134db14918cc967debd3ad223bb8993c523788d', '2', '2024-10-21', '11:56am', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Not active', '0', 'disabled', '', 'LAPTOP-7C75NONC', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-28 11:46:18');

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
  `finance_access` varchar(500) NOT NULL,
  `finance_access2` varchar(500) NOT NULL,
  `admin_access` varchar(500) NOT NULL,
  `col_finance_status_color` varchar(500) NOT NULL,
  `col_company_compliment` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_goesoft_users`
--

INSERT INTO `tbl_goesoft_users` (`userId`, `user_fullname`, `user_email_address`, `company_name`, `user_password`, `date_registered`, `time_registered`, `user_special_Id`, `VNumber`, `verification_code`, `status1`, `status2`, `myviewArea`, `client_view`, `team_view`, `my_city`, `my_ip`, `my_country`, `finance_access`, `finance_access2`, `admin_access`, `col_finance_status_color`, `col_company_compliment`, `col_company_Id`, `dateTime`) VALUES
(1, 'Geocare Services Limited', 'osaretin4samson@gmail.com', 'Geocare Services Limited', 'a8f5dea10f7504a0305998adef3a9c8c2f769c475ad5a3baf23acf9be81cea33', '2024-10-17', '13:37pm', 'ee99b0242544889d323a41e90ee024757dc7458285f2490fe3637f127bf7c368', '0692845', 'Verified', '0', 'disabled', 'Wolverhampton', 'Wolverhampton', 'Wolverhampton', 'Wolverhampton', '127.0.0.1', 'Not Define', 'Granted', 'Granted', 'Granted', '', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-17 12:28:59');

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
(8, 'Perton', 'Wolverhampton', '2024-03-07 13:38:59'),
(9, 'Fenton', 'Stoke on Trent', '2024-05-15 09:30:26'),
(10, 'Hanley', 'Stoke on Trent', '2024-05-15 09:30:37'),
(11, 'Walsall', 'Wolverhampton', '2024-06-19 09:36:43'),
(12, 'Burntwood', 'Wolverhampton', '2024-06-19 10:43:50'),
(13, 'Cannock', 'Wolverhampton', '2024-06-19 10:44:08'),
(14, 'Great Wyrley', 'Wolverhampton', '2024-06-20 14:43:40'),
(15, 'Bolton', 'Manchester', '2024-06-21 09:55:00'),
(16, 'Stourbridge', 'Wolverhampton', '2024-06-21 11:36:40'),
(17, 'Kinver', 'Wolverhampton', '2024-06-21 15:01:49'),
(18, 'ST', 'Stoke on Trent', '2024-06-24 08:21:22'),
(19, 'Wombourne', 'Wolverhampton', '2024-07-05 10:33:46'),
(20, 'Penn road ', 'Wolverhampton', '2024-08-01 08:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday`
--

CREATE TABLE `tbl_holiday` (
  `userId` int(11) NOT NULL,
  `col_description` varchar(500) NOT NULL,
  `col_holiday_date` varchar(500) NOT NULL,
  `col_pay_multiplier` varchar(500) NOT NULL,
  `col_charge_multiplier` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoices`
--

CREATE TABLE `tbl_invoices` (
  `userId` int(11) NOT NULL,
  `col_invoice_Id` varchar(500) NOT NULL,
  `col_payer` varchar(500) NOT NULL,
  `col_payer_rate` varchar(500) NOT NULL,
  `col_time_in` varchar(500) NOT NULL,
  `col_time_out` varchar(500) NOT NULL,
  `col_care_recipient` varchar(500) NOT NULL,
  `col_worked_rate` varchar(500) NOT NULL,
  `col_worked_time` varchar(500) NOT NULL,
  `col_invoice_start_date` varchar(500) NOT NULL,
  `col_invoice_end_date` varchar(500) NOT NULL,
  `col_carer_Id` varchar(500) NOT NULL,
  `col_client_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_rate`
--

CREATE TABLE `tbl_invoice_rate` (
  `userId` int(11) NOT NULL,
  `col_name` varchar(500) NOT NULL,
  `col_days` varchar(500) NOT NULL,
  `col_applies` varchar(500) NOT NULL,
  `col_type` varchar(500) NOT NULL,
  `col_rates` varchar(500) NOT NULL,
  `col_service_type` varchar(500) NOT NULL,
  `col_fee_name` varchar(500) NOT NULL,
  `col_fee_rate` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoice_rate`
--

INSERT INTO `tbl_invoice_rate` (`userId`, `col_name`, `col_days`, `col_applies`, `col_type`, `col_rates`, `col_service_type`, `col_fee_name`, `col_fee_rate`, `col_special_Id`, `col_company_Id`, `col_date`, `dateTime`) VALUES
(1, 'Staffordshire', 'All', 'Always', 'Fixed', '23.32', 'Domiciliary care', 'NON', '0.00', '1', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21', '2024-10-21 09:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manage_runs`
--

CREATE TABLE `tbl_manage_runs` (
  `userId` int(11) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `col_run_name` varchar(500) NOT NULL,
  `client_area` varchar(500) NOT NULL,
  `col_client_city` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `care_calls` varchar(500) NOT NULL,
  `dateTime_in` varchar(500) NOT NULL,
  `dateTime_out` varchar(500) NOT NULL,
  `col_monday` varchar(500) NOT NULL,
  `col_tuesday` varchar(500) NOT NULL,
  `col_wednesday` varchar(500) NOT NULL,
  `col_thursday` varchar(500) NOT NULL,
  `col_friday` varchar(500) NOT NULL,
  `col_saturday` varchar(500) NOT NULL,
  `col_sunday` varchar(500) NOT NULL,
  `col_client_funding` varchar(500) NOT NULL,
  `col_funding_rate` varchar(500) NOT NULL,
  `col_required_carers` varchar(500) NOT NULL,
  `col_startDate` varchar(500) NOT NULL,
  `col_endDate` varchar(500) NOT NULL,
  `col_occurence` varchar(500) NOT NULL,
  `col_period_one` varchar(500) NOT NULL,
  `col_period_two` varchar(500) NOT NULL,
  `col_right_to_display` varchar(500) NOT NULL,
  `run_area_nameId` varchar(500) NOT NULL,
  `col_status` varchar(500) NOT NULL,
  `col_val_Id` varchar(1000) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_manage_runs`
--

INSERT INTO `tbl_manage_runs` (`userId`, `client_name`, `col_run_name`, `client_area`, `col_client_city`, `uryyToeSS4`, `care_calls`, `dateTime_in`, `dateTime_out`, `col_monday`, `col_tuesday`, `col_wednesday`, `col_thursday`, `col_friday`, `col_saturday`, `col_sunday`, `col_client_funding`, `col_funding_rate`, `col_required_carers`, `col_startDate`, `col_endDate`, `col_occurence`, `col_period_one`, `col_period_two`, `col_right_to_display`, `run_area_nameId`, `col_status`, `col_val_Id`, `col_company_Id`, `dateTime`) VALUES
(1, 'Charity Addison', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1023', 'Morning', '06:00', '07:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-11-04 11:57:52'),
(2, 'Charity Addison', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1023', 'Lunch', '10:00', '10:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:09'),
(3, 'Charity Addison', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1023', 'Tea', '14:00', '14:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:13'),
(4, 'Charity Addison', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1023', 'Bed', '18:00', '18:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:14'),
(5, 'Ciaran Jillian', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1024', 'Morning', '07:00', '08:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:16'),
(6, 'Ciaran Jillian', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1024', 'Lunch', '10:30', '11:00', '', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-11-04 11:41:10'),
(7, 'Ciaran Jillian', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1024', 'Tea', '14:30', '15:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:21'),
(8, 'Ciaran Jillian', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1024', 'Bed', '19:00', '19:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:23'),
(9, 'Donovan Byron', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1025', 'Morning', '09:00', '09:45', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:25'),
(10, 'Donovan Byron', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1025', 'Lunch', '11:30', '12:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:27'),
(11, 'Donovan Byron', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1025', 'Tea', '15:00', '16:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:28'),
(12, 'Donovan Byron', 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1025', 'Bed', '19:30', '20:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '1', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '1', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:49:30'),
(13, 'Charity Addison', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1023', 'Morning', '06:00', '07:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:25'),
(14, 'Charity Addison', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1023', 'Lunch', '10:00', '10:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:26'),
(15, 'Charity Addison', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1023', 'Tea', '14:00', '14:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:28'),
(16, 'Charity Addison', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1023', 'Bed', '18:00', '18:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:28'),
(17, 'Ciaran Jillian', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1024', 'Morning', '07:00', '08:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:30'),
(18, 'Ciaran Jillian', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1024', 'Lunch', '10:30', '11:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:31'),
(19, 'Ciaran Jillian', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1024', 'Tea', '14:30', '15:00', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:33'),
(20, 'Ciaran Jillian', 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '1024', 'Bed', '19:00', '19:30', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Staffordshire', '23.32', '2', '2024-10-21', '', '2024-10-21', '', 'Daily', 'True', '2', 'rgba(22, 160, 133,1.0)', '', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21 09:50:37');

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
(2, 'Donepezil', '5mg', 'Tablets', '2024-07-31 07:32:41'),
(3, 'Rivastigmine', '50mg', 'Capsule', '2024-03-07 09:41:55'),
(4, 'Galantamine', '10mg', 'Tablets', '2024-03-07 09:42:13'),
(5, 'Memantine', '10mg', 'Syrup', '2024-03-07 09:44:14'),
(6, 'E45', '20mg', 'General cream', '2024-03-07 09:44:27'),
(7, 'Barrier', '10mg', 'Barrier cream', '2024-03-07 09:45:06'),
(8, 'Air wick', '--', 'Air spray', '2024-03-07 09:45:34'),
(9, 'Medi Derma-S barrier cream ', 'Scheduled/Twice a Day', 'Barrier cream', '2024-05-24 11:34:50'),
(10, 'Bumetanide', '1mg', 'Tablets', '2024-06-17 13:57:12'),
(11, 'Generic E45 cream', 'Apply thin film', 'As required', '2024-06-18 08:56:51'),
(12, 'Butec 5micrograms/hour transdermal patches', '5 Micrograms/hour', 'Patches', '2024-06-17 14:44:14'),
(13, 'Cyanocobalamin', '50microgram', 'Tablets', '2024-06-17 14:44:48'),
(14, 'Cyclizine', '50mg', 'Tablets', '2024-06-17 14:45:13'),
(15, 'Morphine sulfate', '10mg/5ml', 'Oral Solution', '2024-06-17 14:47:02'),
(16, 'Stexerol-D3', '25,000unit', 'Tablets', '2024-06-17 14:47:26'),
(17, 'Barrier Cream', 'Apply in required area', 'Cream', '2024-06-18 11:21:14');

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
-- Table structure for table `tbl_payer`
--

CREATE TABLE `tbl_payer` (
  `userId` int(11) NOT NULL,
  `col_name` varchar(500) NOT NULL,
  `col_email` varchar(500) NOT NULL,
  `col_phone_number` varchar(500) NOT NULL,
  `col_invoice_pref` varchar(500) NOT NULL,
  `col_address` varchar(500) NOT NULL,
  `col_status` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_rate`
--

CREATE TABLE `tbl_pay_rate` (
  `userId` int(11) NOT NULL,
  `col_name` varchar(500) NOT NULL,
  `col_days` varchar(500) NOT NULL,
  `col_applies` varchar(500) NOT NULL,
  `col_type` varchar(500) NOT NULL,
  `col_rates` varchar(500) NOT NULL,
  `col_service_type` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pay_rate`
--

INSERT INTO `tbl_pay_rate` (`userId`, `col_name`, `col_days`, `col_applies`, `col_type`, `col_rates`, `col_service_type`, `col_special_Id`, `col_company_Id`, `col_date`, `dateTime`) VALUES
(1, 'Care Assistant Driver', 'All', 'Always', 'Fixed', '11.55', 'Personal Care', '1021', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-21', '2024-10-21 08:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_run`
--

CREATE TABLE `tbl_pay_run` (
  `userId` int(11) NOT NULL,
  `col_caregiver` varchar(500) NOT NULL,
  `col_Time_In` varchar(500) NOT NULL,
  `col_Time_Out` varchar(500) NOT NULL,
  `col_work_rate` varchar(500) NOT NULL,
  `col_travel_rate` varchar(500) NOT NULL,
  `col_waiting_rate` varchar(500) NOT NULL,
  `col_miles` varchar(500) NOT NULL,
  `col_mileage_rate` varchar(500) NOT NULL,
  `col_extra_rate` varchar(500) NOT NULL,
  `col_start_date` varchar(500) NOT NULL,
  `col_end_date` varchar(500) NOT NULL,
  `col_month` varchar(500) NOT NULL,
  `col_pay_runId` varchar(500) NOT NULL,
  `col_carer_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
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
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_Id`, `position_name`, `position_details`, `col_company_Id`, `dateTime`) VALUES
(1, 'Support worker', 'Support worker', 'd8fc9011255b509d7ad3fe3d960a8933af1d678d51510cd39fcf749f53dcfd74', '2024-09-03 09:16:52'),
(2, 'Health Care Assistant', 'HCA', 'd8fc9011255b509d7ad3fe3d960a8933af1d678d51510cd39fcf749f53dcfd74', '2024-09-03 09:16:54'),
(3, 'Senior Carer', 'Senior carer', 'd8fc9011255b509d7ad3fe3d960a8933af1d678d51510cd39fcf749f53dcfd74', '2024-09-03 09:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order`
--

CREATE TABLE `tbl_purchase_order` (
  `userId` int(11) NOT NULL,
  `col_client_name` varchar(500) NOT NULL,
  `col_payer` varchar(500) NOT NULL,
  `col_contract_name` varchar(500) NOT NULL,
  `col_contract_rate` varchar(500) NOT NULL,
  `col_service_type` varchar(500) NOT NULL,
  `col_hours_per_week` varchar(500) NOT NULL,
  `col_client_Id` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recent_search`
--

CREATE TABLE `tbl_recent_search` (
  `search_id` int(11) NOT NULL,
  `search_query` varchar(300) NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_calls`
--

CREATE TABLE `tbl_schedule_calls` (
  `userId` int(100) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `client_area` varchar(500) NOT NULL,
  `col_area_city` varchar(500) NOT NULL,
  `col_area_Id` varchar(500) NOT NULL,
  `uryyToeSS4` varchar(500) NOT NULL,
  `first_carer` varchar(500) NOT NULL,
  `first_carer_Id` varchar(500) NOT NULL,
  `care_calls` varchar(500) NOT NULL,
  `dateTime_in` varchar(500) NOT NULL,
  `dateTime_out` varchar(500) NOT NULL,
  `col_fifo` varchar(500) NOT NULL,
  `col_required_carers` varchar(500) NOT NULL,
  `Clientshift_Date` varchar(500) NOT NULL,
  `team_resource` varchar(500) NOT NULL,
  `timeline_colour` varchar(500) NOT NULL,
  `col_visitColor_code` varchar(500) NOT NULL,
  `rightTo_display` varchar(500) NOT NULL,
  `call_status` varchar(500) NOT NULL,
  `bgChange` varchar(500) NOT NULL,
  `currMonths` varchar(500) NOT NULL,
  `col_occurence` varchar(500) NOT NULL,
  `col_period_one` varchar(500) NOT NULL,
  `col_period_two` varchar(500) NOT NULL,
  `col_pay_status` varchar(500) NOT NULL,
  `col_invoice_status` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_weekly_routine` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedule_calls`
--

INSERT INTO `tbl_schedule_calls` (`userId`, `client_name`, `client_area`, `col_area_city`, `col_area_Id`, `uryyToeSS4`, `first_carer`, `first_carer_Id`, `care_calls`, `dateTime_in`, `dateTime_out`, `col_fifo`, `col_required_carers`, `Clientshift_Date`, `team_resource`, `timeline_colour`, `col_visitColor_code`, `rightTo_display`, `call_status`, `bgChange`, `currMonths`, `col_occurence`, `col_period_one`, `col_period_two`, `col_pay_status`, `col_invoice_status`, `col_company_Id`, `col_weekly_routine`, `dateTime`) VALUES
(1, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '06:00', '07:00', '', '2', '2024-11-04', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:33:48'),
(2, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:00', '10:30', '', '2', '2024-11-04', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:33:48'),
(3, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:00', '14:30', '', '2', '2024-11-04', 'RS02081', '#34495e', '#34495e', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:59:45'),
(4, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '18:00', '18:30', '', '2', '2024-11-04', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:33:48'),
(5, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '07:00', '08:00', '', '2', '2024-11-04', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:33:48'),
(6, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:30', '11:00', '', '2', '2024-11-04', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:33:48'),
(7, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:30', '15:00', '', '2', '2024-11-04', 'RS02081', '#34495e', '#34495e', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:59:48'),
(8, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '19:00', '19:30', '', '2', '2024-11-04', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 13:33:48'),
(16, 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '2', 'Null', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Care run', '06:00', '19:30', '', 'Null', '2024-11-04', 'RS02081', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-04 13:33:48'),
(17, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '06:00', '07:00', '', '2', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(18, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:00', '10:30', '', '2', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(19, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:00', '14:30', '', '2', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(20, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '18:00', '18:30', '', '2', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(21, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '07:00', '08:00', '', '2', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(22, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:30', '15:00', '', '2', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(23, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:00', '19:30', '', '2', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(24, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '09:00', '09:45', '', '1', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(25, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '11:30', '12:00', '', '1', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(26, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '15:00', '16:00', '', '1', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(27, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:30', '20:00', '', '1', '2024-11-04', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 14:25:26'),
(32, 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1', 'Null', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Care run', '06:00', '20:00', '', 'Null', '2024-11-04', 'RS07647', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-04 14:25:26'),
(33, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '06:00', '07:00', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(34, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:00', '10:30', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(35, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:00', '14:30', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(36, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '18:00', '18:30', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(37, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '07:00', '08:00', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(38, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:30', '11:00', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(39, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:30', '15:00', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(40, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:00', '19:30', '', '2', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(41, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '09:00', '09:45', '', '1', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(42, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '11:30', '12:00', '', '1', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(43, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '15:00', '16:00', '', '1', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(44, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:30', '20:00', '', '1', '2024-11-05', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:48'),
(48, 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1', 'Null', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Care run', '06:00', '20:00', '', 'Null', '2024-11-05', 'RS07647', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-04 15:16:48'),
(49, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '06:00', '07:00', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(50, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:00', '10:30', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(51, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:00', '14:30', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(52, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '18:00', '18:30', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(53, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '07:00', '08:00', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(54, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:30', '11:00', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(55, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:30', '15:00', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(56, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '19:00', '19:30', '', '2', '2024-11-05', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-04 15:16:51'),
(64, 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '2', 'Null', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Care run', '06:00', '19:30', '', 'Null', '2024-11-05', 'RS02081', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-04 15:16:51'),
(65, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '06:00', '07:00', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(66, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:00', '10:30', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(67, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:00', '14:30', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(68, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '18:00', '18:30', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(69, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '07:00', '08:00', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(70, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:30', '11:00', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(71, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:30', '15:00', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(72, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:00', '19:30', '', '2', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(73, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '09:00', '09:45', '', '1', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(74, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '11:30', '12:00', '', '1', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(75, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '15:00', '16:00', '', '1', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(76, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:30', '20:00', '', '1', '2024-11-06', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:42'),
(80, 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1', 'Null', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Care run', '06:00', '20:00', '', 'Null', '2024-11-06', 'RS07647', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-06 11:25:42'),
(81, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '06:00', '07:00', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(82, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:00', '10:30', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(83, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:00', '14:30', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(84, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '18:00', '18:30', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(85, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '07:00', '08:00', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(86, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:30', '11:00', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(87, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:30', '15:00', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(88, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '19:00', '19:30', '', '2', '2024-11-06', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:45'),
(96, 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '2', 'Null', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Care run', '06:00', '19:30', '', 'Null', '2024-11-06', 'RS02081', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-06 11:25:45'),
(97, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '06:00', '07:00', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(98, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:00', '10:30', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(99, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:00', '14:30', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(100, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '18:00', '18:30', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(101, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '07:00', '08:00', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(102, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:30', '11:00', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(103, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:30', '15:00', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(104, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '19:00', '19:30', '', '2', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(105, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '09:00', '09:45', '', '1', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(106, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '11:30', '12:00', '', '1', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(107, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '15:00', '16:00', '', '1', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(108, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '19:30', '20:00', '', '1', '2024-11-07', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:49'),
(112, 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1', 'Null', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Care run', '06:00', '20:00', '', 'Null', '2024-11-07', 'RS02081', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-06 11:25:49'),
(113, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '06:00', '07:00', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(114, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:00', '10:30', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(115, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:00', '14:30', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(116, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '18:00', '18:30', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(117, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '07:00', '08:00', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(118, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:30', '11:00', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(119, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:30', '15:00', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(120, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:00', '19:30', '', '2', '2024-11-07', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:51'),
(128, 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '2', 'Null', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Care run', '06:00', '19:30', '', 'Null', '2024-11-07', 'RS07647', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-06 11:25:51'),
(129, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '06:00', '07:00', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(130, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:00', '10:30', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(131, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:00', '14:30', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(132, 'Charity Addison', 'Codsall', 'Wolverhampton', '1', '1023', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '18:00', '18:30', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(133, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '07:00', '08:00', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(134, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '10:30', '11:00', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(135, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '14:30', '15:00', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(136, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '1', '1024', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '19:00', '19:30', '', '2', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(137, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Morning', '09:00', '09:45', '', '1', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(138, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Lunch', '11:30', '12:00', '', '1', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(139, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Tea', '15:00', '16:00', '', '1', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(140, 'Donovan Byron', 'Codsall', 'Wolverhampton', '1', '1025', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Bed', '19:30', '20:00', '', '1', '2024-11-08', 'RS02081', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:57'),
(144, 'Codsall phase 1 driver run only', 'Codsall', 'Wolverhampton', '1', 'Null', 'Samson Sam', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', 'Care run', '06:00', '20:00', '', 'Null', '2024-11-08', 'RS02081', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-06 11:25:57'),
(145, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '06:00', '07:00', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59'),
(146, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:00', '10:30', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59');
INSERT INTO `tbl_schedule_calls` (`userId`, `client_name`, `client_area`, `col_area_city`, `col_area_Id`, `uryyToeSS4`, `first_carer`, `first_carer_Id`, `care_calls`, `dateTime_in`, `dateTime_out`, `col_fifo`, `col_required_carers`, `Clientshift_Date`, `team_resource`, `timeline_colour`, `col_visitColor_code`, `rightTo_display`, `call_status`, `bgChange`, `currMonths`, `col_occurence`, `col_period_one`, `col_period_two`, `col_pay_status`, `col_invoice_status`, `col_company_Id`, `col_weekly_routine`, `dateTime`) VALUES
(147, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:00', '14:30', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59'),
(148, 'Charity Addison', 'Codsall', 'Wolverhampton', '2', '1023', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '18:00', '18:30', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59'),
(149, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Morning', '07:00', '08:00', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59'),
(150, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Lunch', '10:30', '11:00', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59'),
(151, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Tea', '14:30', '15:00', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59'),
(152, 'Ciaran Jillian', 'Codsall', 'Wolverhampton', '2', '1024', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Bed', '19:00', '19:30', '', '2', '2024-11-08', 'RS07647', '#34495e', 'rgba(255, 255, 255,1.0)', 'True', 'Scheduled', 'rgba(44, 62, 80,.5)', '', '', '', 'Daily', 'True', 'True', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'e488bd248ecd3e256d735cd103128a019482eb87b435629ef356d954dd013e4f', '2024-11-06 11:25:59'),
(160, 'Codsall phase 2 non driver run only', 'Codsall', 'Wolverhampton', '2', 'Null', 'Kirby Hakeem', '350a9ef530d26ae20356e386402c7500af04651d61de0dc32077f9bed3b49583', 'Care run', '06:00', '19:30', '', 'Null', '2024-11-08', 'RS07647', 'rgba(200, 214, 229,1.0)', '', 'True', 'Progressive', 'rgba(200, 214, 229,1.0)', '', '', 'Null', 'Null', 'Null', 'Null', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', 'Null', '2024-11-06 11:25:59');

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
(22, 'Assist with shower', 'Personal care', '2024-03-07 09:33:19'),
(23, 'Assist to dress / undress', 'Personal care', '2024-05-24 10:49:44'),
(24, 'Assist to have a full body wash', 'Personal care', '2024-05-24 10:50:01'),
(25, 'Ensure leg brace is worn', 'Medical', '2024-05-24 10:50:31'),
(26, 'Assist to prepare breakfast', 'Nutrition and hydration', '2024-05-24 10:50:56'),
(27, 'Assist to prepare drink of choice', 'Nutrition and hydration', '2024-05-24 10:51:17'),
(28, 'Make lunch ready for them to access themselves', 'Nutrition and hydration', '2024-05-24 10:51:47'),
(29, 'Check skin integrity', 'Medical', '2024-05-24 10:52:14'),
(30, 'Ensure home is secure', 'Environmental', '2024-05-24 10:52:34'),
(31, 'Return the keys to the key safe', 'Environmental', '2024-05-24 10:52:51'),
(32, 'Assist to prepare meal', 'Nutrition and hydration', '2024-05-24 10:53:31'),
(33, 'Clean and tidy the kitchen', 'Environmental', '2024-05-24 10:53:58'),
(34, 'Assist to have a shower', 'Personal care', '2024-05-24 10:54:18'),
(35, 'Assist to change incontinence pad', 'Personal care', '2024-05-24 10:57:26'),
(36, 'Assist with transfer', 'Everyday activities', '2024-05-24 10:57:42'),
(37, 'Monitor bowel movement', 'Everyday activities', '2024-05-24 10:58:04'),
(38, 'Empty and disconnect night bag', 'Everyday activities', '2024-05-24 10:58:34'),
(39, 'Empty leg bag', 'Everyday activities', '2024-05-24 10:59:33'),
(40, 'Attach night bag and switch tap to open', 'Everyday activities', '2024-05-24 11:00:02'),
(41, 'Assist with transfer into wheelchair', 'Everyday activities', '2024-05-24 11:00:28'),
(42, 'Assist out of bed with stand or hoist', 'Everyday activities', '2024-05-24 11:00:55'),
(43, 'Monitor urine', 'Everyday activities', '2024-05-24 11:01:51'),
(44, 'Clean glasses', 'Everyday activities', '2024-05-24 11:02:07'),
(45, 'Assist to have a strip wash', 'Personal care', '2024-05-24 11:05:36'),
(46, 'Assist to prepare meal with drinks', 'Social support', '2024-05-24 11:06:02'),
(47, 'Assist with putting compression stockings on', 'Social support', '2024-05-24 11:06:40'),
(48, 'Wash and cream legs', 'Personal care', '2024-05-24 11:06:56'),
(49, 'Support to go to the toilet', 'Administrative', '2024-05-24 11:07:26'),
(50, 'Assist to transfer with hoist', 'Personal care', '2024-05-24 11:13:50'),
(51, 'Wear mask', 'Administrative', '2024-05-24 11:14:13'),
(52, 'Knock before entering home', 'Environmental', '2024-05-24 11:44:59'),
(53, 'Assist with mobilizing', 'Social support', '2024-05-24 11:45:25'),
(54, 'Clean and tidy the bathroom', 'Everyday activities', '2024-05-24 11:46:03'),
(55, 'Clean and tidy the bedroom', 'Everyday activities', '2024-05-24 11:46:21'),
(56, 'Change bedding', 'Environmental', '2024-05-24 11:47:00'),
(57, 'Empty and clean commode', 'Everyday activities', '2024-05-24 12:58:18'),
(58, 'Assist with transfer out of wheelchair', 'Social support', '2024-05-24 13:13:11'),
(59, 'Apply cream to vulnerable areas', 'Medical', '2024-06-17 13:53:00'),
(60, 'Access house via key safe', 'Environmental', '2024-06-17 13:53:10'),
(61, 'Put On Back Brace', 'Medical', '2024-06-17 13:53:38'),
(62, 'Assist to change into clean clothes', 'Personal care', '2024-06-17 13:54:05'),
(63, 'Ensure walking aid is within reach', 'Everyday activities', '2024-06-17 13:54:24'),
(64, 'Personal care', 'Personal care', '2024-07-22 14:47:37'),
(65, 'Empty catheter bag', 'Everyday activities', '2024-08-05 09:38:01'),
(66, 'Ensure client is wearing lifeline', 'Everyday activities', '2024-08-19 11:06:48'),
(67, 'body wash, dressing up, cream vulnerable areas', 'Personal care', '2024-08-19 15:58:41');

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
-- Table structure for table `tbl_team_documents`
--

CREATE TABLE `tbl_team_documents` (
  `userId` int(11) NOT NULL COMMENT 'Id number for team',
  `col_Id_image` varchar(500) NOT NULL COMMENT 'Team Id card doc',
  `col_drivers_licence_image` varchar(500) NOT NULL COMMENT 'Team drivers licence doc',
  `col_bank_statement_image` varchar(500) NOT NULL COMMENT 'Team bank statement doc',
  `col_utility_bill_image` varchar(500) NOT NULL COMMENT 'Team utility bill doc',
  `col_references_image` varchar(500) NOT NULL COMMENT 'Team reference doc',
  `col_dbs_records_image` varchar(500) NOT NULL COMMENT 'Team dbs record doc',
  `uryyTteamoeSS4` varchar(500) NOT NULL COMMENT 'Team special Id',
  `col_company_Id` varchar(500) NOT NULL COMMENT 'Team company Id',
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Date updated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_employment`
--

CREATE TABLE `tbl_team_employment` (
  `userId` int(11) NOT NULL COMMENT 'Id number for all team',
  `col_first_name` varchar(500) NOT NULL COMMENT 'For team first name',
  `col_last_name` varchar(500) NOT NULL COMMENT 'For team last name',
  `col_employee_no` varchar(500) NOT NULL COMMENT 'Employee number',
  `col_team_role` varchar(500) NOT NULL COMMENT 'Role',
  `col_contract_type` varchar(500) NOT NULL COMMENT 'Contract type',
  `col_contract` varchar(500) NOT NULL COMMENT 'Contract',
  `col_weekly_contract_hour` varchar(500) NOT NULL COMMENT 'Weekly contracted hours',
  `col_covid_vacin` varchar(500) NOT NULL COMMENT 'Covid vaccination status',
  `uryyTteamoeSS4` varchar(500) NOT NULL COMMENT 'Team special id',
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Date data was updated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_status`
--

CREATE TABLE `tbl_team_status` (
  `userId` int(11) NOT NULL,
  `col_full_name` varchar(500) NOT NULL,
  `col_startDate` varchar(500) NOT NULL,
  `col_endDate` varchar(500) NOT NULL,
  `col_team_condition` varchar(500) NOT NULL,
  `col_note` text NOT NULL,
  `col_approval` varchar(500) NOT NULL,
  `uryyTteamoeSS4` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_team_status`
--

INSERT INTO `tbl_team_status` (`userId`, `col_full_name`, `col_startDate`, `col_endDate`, `col_team_condition`, `col_note`, `col_approval`, `uryyTteamoeSS4`, `col_company_Id`, `dateTime`) VALUES
(1, 'Samson Sam', '2024-10-25', '2024-10-29', 'Annual Leave', 'Working professionals are required to submit an online email to their respective employees when considering taking any type of leave.', 'Approve', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-25 15:12:07'),
(2, 'Samson Sam', '2024-10-30', '2024-11-08', 'Casual Leave', 'Your action is going to affect this carer availability status. Be sure you want to proceed with this action.', 'Approve', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-25 12:15:52'),
(3, 'Samson Sam', '2024-10-25', '2030-12-26', 'Active', '', 'Approved', '41f8050a2961dd69987dd388718c4b55e56abb2deb3c5cdd51004948d3337e90', '55eada2764f31f36506cb8731c454d5535d330765091edec5d93943bd672a238', '2024-10-25 15:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_travel_rate`
--

CREATE TABLE `tbl_travel_rate` (
  `userId` int(11) NOT NULL,
  `col_name` varchar(500) NOT NULL,
  `col_hourly_rate` varchar(500) NOT NULL,
  `col_mileage_rate` varchar(500) NOT NULL,
  `col_break` varchar(500) NOT NULL,
  `col_pay_waiting_time` varchar(500) NOT NULL,
  `col_special_Id` varchar(500) NOT NULL,
  `col_company_Id` varchar(500) NOT NULL,
  `col_date` varchar(500) NOT NULL,
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
-- Table structure for table `timeline_schedule`
--

CREATE TABLE `timeline_schedule` (
  `userId` int(11) NOT NULL,
  `clientName` varchar(500) NOT NULL,
  `carerName` varchar(500) NOT NULL,
  `time_in` varchar(500) NOT NULL,
  `time_out` varchar(500) NOT NULL,
  `dataTime` datetime NOT NULL
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
-- Indexes for table `distances`
--
ALTER TABLE `distances`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_billing_config`
--
ALTER TABLE `tbl_billing_config`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_cancelled_call`
--
ALTER TABLE `tbl_cancelled_call`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_care_calls`
--
ALTER TABLE `tbl_care_calls`
  ADD PRIMARY KEY (`userId`);

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
-- Indexes for table `tbl_client_invoice`
--
ALTER TABLE `tbl_client_invoice`
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
-- Indexes for table `tbl_client_status_records`
--
ALTER TABLE `tbl_client_status_records`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_contract`
--
ALTER TABLE `tbl_contract`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_daily_shift_records`
--
ALTER TABLE `tbl_daily_shift_records`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_equipment_risk_assessment`
--
ALTER TABLE `tbl_equipment_risk_assessment`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_finished_meds`
--
ALTER TABLE `tbl_finished_meds`
  ADD PRIMARY KEY (`med_Id`);

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
-- Indexes for table `tbl_funding`
--
ALTER TABLE `tbl_funding`
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
-- Indexes for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_invoice_rate`
--
ALTER TABLE `tbl_invoice_rate`
  ADD PRIMARY KEY (`userId`);

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
-- Indexes for table `tbl_payer`
--
ALTER TABLE `tbl_payer`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_pay_rate`
--
ALTER TABLE `tbl_pay_rate`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_pay_run`
--
ALTER TABLE `tbl_pay_run`
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
-- Indexes for table `tbl_purchase_order`
--
ALTER TABLE `tbl_purchase_order`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_recent_search`
--
ALTER TABLE `tbl_recent_search`
  ADD PRIMARY KEY (`search_id`);

--
-- Indexes for table `tbl_report_issues`
--
ALTER TABLE `tbl_report_issues`
  ADD PRIMARY KEY (`report_Id`);

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
-- Indexes for table `tbl_team_documents`
--
ALTER TABLE `tbl_team_documents`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_team_employment`
--
ALTER TABLE `tbl_team_employment`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_team_status`
--
ALTER TABLE `tbl_team_status`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_travel_rate`
--
ALTER TABLE `tbl_travel_rate`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_visit_tasks_plan`
--
ALTER TABLE `tbl_visit_tasks_plan`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `timeline_schedule`
--
ALTER TABLE `timeline_schedule`
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
-- AUTO_INCREMENT for table `distances`
--
ALTER TABLE `distances`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This is an auto increment user ID';

--
-- AUTO_INCREMENT for table `tbl_billing_config`
--
ALTER TABLE `tbl_billing_config`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cancelled_call`
--
ALTER TABLE `tbl_cancelled_call`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_care_calls`
--
ALTER TABLE `tbl_care_calls`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_chat_system`
--
ALTER TABLE `tbl_chat_system`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_clients_medication_records`
--
ALTER TABLE `tbl_clients_medication_records`
  MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_clients_task_records`
--
ALTER TABLE `tbl_clients_task_records`
  MODIFY `client_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_clienttime_calls`
--
ALTER TABLE `tbl_clienttime_calls`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_client_invoice`
--
ALTER TABLE `tbl_client_invoice`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client_medical`
--
ALTER TABLE `tbl_client_medical`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client_nok`
--
ALTER TABLE `tbl_client_nok`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client_notes`
--
ALTER TABLE `tbl_client_notes`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_client_runs`
--
ALTER TABLE `tbl_client_runs`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_client_status_records`
--
ALTER TABLE `tbl_client_status_records`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contract`
--
ALTER TABLE `tbl_contract`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_daily_shift_records`
--
ALTER TABLE `tbl_daily_shift_records`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_equipment_risk_assessment`
--
ALTER TABLE `tbl_equipment_risk_assessment`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_finished_meds`
--
ALTER TABLE `tbl_finished_meds`
  MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_finished_tasks`
--
ALTER TABLE `tbl_finished_tasks`
  MODIFY `task_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fire_action_plan`
--
ALTER TABLE `tbl_fire_action_plan`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_funding`
--
ALTER TABLE `tbl_funding`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_general_client_form`
--
ALTER TABLE `tbl_general_client_form`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_general_team_form`
--
ALTER TABLE `tbl_general_team_form`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_goesoft_carers_account`
--
ALTER TABLE `tbl_goesoft_carers_account`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_goesoft_users`
--
ALTER TABLE `tbl_goesoft_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_group_list`
--
ALTER TABLE `tbl_group_list`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice_rate`
--
ALTER TABLE `tbl_invoice_rate`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_manage_runs`
--
ALTER TABLE `tbl_manage_runs`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_medication_list`
--
ALTER TABLE `tbl_medication_list`
  MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `tbl_payer`
--
ALTER TABLE `tbl_payer`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pay_rate`
--
ALTER TABLE `tbl_pay_rate`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pay_run`
--
ALTER TABLE `tbl_pay_run`
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
-- AUTO_INCREMENT for table `tbl_purchase_order`
--
ALTER TABLE `tbl_purchase_order`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_recent_search`
--
ALTER TABLE `tbl_recent_search`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_report_issues`
--
ALTER TABLE `tbl_report_issues`
  MODIFY `report_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_schedule_calls`
--
ALTER TABLE `tbl_schedule_calls`
  MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `tbl_sensory_impairment_plan`
--
ALTER TABLE `tbl_sensory_impairment_plan`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_task_list`
--
ALTER TABLE `tbl_task_list`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_team_certificates`
--
ALTER TABLE `tbl_team_certificates`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_team_documents`
--
ALTER TABLE `tbl_team_documents`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id number for team';

--
-- AUTO_INCREMENT for table `tbl_team_employment`
--
ALTER TABLE `tbl_team_employment`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id number for all team';

--
-- AUTO_INCREMENT for table `tbl_team_status`
--
ALTER TABLE `tbl_team_status`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_travel_rate`
--
ALTER TABLE `tbl_travel_rate`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_visit_tasks_plan`
--
ALTER TABLE `tbl_visit_tasks_plan`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeline_schedule`
--
ALTER TABLE `timeline_schedule`
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
