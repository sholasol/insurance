-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2021 at 09:53 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ith`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `activity` text NOT NULL,
  `query` text NOT NULL,
  `role` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `userID`, `activity`, `query`, `role`, `created`) VALUES
(1, 11, 'Created Complain', 'Create', 4, '2019-03-13'),
(2, 2, 'Treated Customer complain', 'Update', 4, '2019-03-13'),
(3, 2, 'Treated Customer complain', 'Update', 4, '2019-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `beneficiary_id` int(10) NOT NULL,
  `policy` varchar(12) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `type` enum('Primary','Secondary') NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `benefiary_percentage` int(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`beneficiary_id`, `policy`, `lastname`, `firstname`, `dob`, `type`, `gender`, `phone_no`, `email`, `benefiary_percentage`, `address`) VALUES
(1, 'MI/AI/52245', 'John', 'Joy', '0000-00-00', 'Primary', 'Male', '08126357700', 'joy@aol.com', 0, 'Yaba'),
(2, 'MI/CH/02042', 'Yemi', 'Shadola', '0000-00-00', 'Primary', 'Male', '08134562001', 's.ola@owned.com', 0, 'Badagry, Lagos'),
(3, 'MI/LU/52432', 'Olaleye', 'Fola', '0000-00-00', 'Primary', 'Male', '08076443450', 'fola2@yahoo.com', 0, 'Lagos'),
(4, 'MI/LU/44043', 'James', 'Harry', '0000-00-00', 'Primary', 'Male', '8132452670', 'h.james@yahoo.com', 0, 'Lagos'),
(5, 'MI/LU/02531', 'Olaleye', 'Fola', '0000-00-00', 'Primary', 'Male', '8076443450', 'fola@yahoo.com', 0, 'Lagos'),
(6, 'MI/LU/12114', 'James', 'Brown', '0000-00-00', 'Primary', 'Male', '8123409876', 'b.james@yahoo.com', 0, 'Lagos');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `insurance_id`, `category`, `created_by`, `created`) VALUES
(1, 1, 'Agriculture', 2, '2019-01-19'),
(2, 4, 'Life', 5, '2019-03-12'),
(3, 4, 'Non-life', 5, '2019-03-12'),
(4, 4, 'Agriculture', 5, '2019-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `claimdoc`
--

CREATE TABLE `claimdoc` (
  `id` int(11) NOT NULL,
  `policy` varchar(20) NOT NULL,
  `doc` varchar(150) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `claimdoc`
--

INSERT INTO `claimdoc` (`id`, `policy`, `doc`, `created`) VALUES
(1, 'MI/AI/21402', '../upload/181a549053b6061d359ec6f03d32907d.jpg', '2019-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claim_id` int(10) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `marketer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `policy` varchar(12) NOT NULL,
  `premium` int(11) NOT NULL,
  `sum_assured` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `notif_date` date NOT NULL,
  `incident_date` date NOT NULL,
  `loss_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `claim_amount` int(50) NOT NULL,
  `amount_paid` int(50) NOT NULL,
  `payment_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `discharge_voucher_no` int(10) NOT NULL,
  `discharge_voucher_date` date NOT NULL,
  `discharge_voucher_acceptance_date` date NOT NULL,
  `nature_of_loss` varchar(500) NOT NULL,
  `narration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claim_id`, `insurance_id`, `partner_id`, `marketer_id`, `user_id`, `policy`, `premium`, `sum_assured`, `product`, `plan`, `notif_date`, `incident_date`, `loss_id`, `status`, `claim_amount`, `amount_paid`, `payment_date`, `closing_date`, `discharge_voucher_no`, `discharge_voucher_date`, `discharge_voucher_acceptance_date`, `nature_of_loss`, `narration`) VALUES
(1, 3, 6, 9, 11, 'MI/AI/21402', 200000, 500000, 1, 1, '2019-05-22', '2019-05-14', 0, 'Pending', 500000, 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00', 'Nature of loss', 'Narration');

-- --------------------------------------------------------

--
-- Table structure for table `claims_status`
--

CREATE TABLE `claims_status` (
  `claim_status_id` int(10) NOT NULL,
  `claim_status` enum('Opening','Spending','Settled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `commission_id` int(10) NOT NULL,
  `insurance_id` int(10) NOT NULL,
  `payment_id` int(50) NOT NULL,
  `partner_id` int(50) NOT NULL,
  `marketer_id` int(11) NOT NULL,
  `policy` varchar(20) NOT NULL,
  `premium` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `commission_rate` int(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `settlement_date` date NOT NULL,
  `commission_percentage` double NOT NULL,
  `marketer_com` int(50) NOT NULL,
  `commission_value` int(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ins_comm_amount` int(50) NOT NULL,
  `partner_comm_amount` int(50) NOT NULL,
  `withholding_tax` int(50) NOT NULL,
  `merchant_amount` int(50) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`commission_id`, `insurance_id`, `payment_id`, `partner_id`, `marketer_id`, `policy`, `premium`, `product_id`, `plan_id`, `commission_rate`, `status`, `settlement_date`, `commission_percentage`, `marketer_com`, `commission_value`, `start_date`, `end_date`, `ins_comm_amount`, `partner_comm_amount`, `withholding_tax`, `merchant_amount`, `created`) VALUES
(1, 1, 0, 6, 0, 'MI/AI/21454', 200000, 1, 1, 10, 'Pending', '0000-00-00', 0.1, 0, 20000, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '2019-01-24'),
(2, 1, 0, 6, 0, 'MI/AI/34035', 200000, 1, 1, 10, 'Pending', '0000-00-00', 0.1, 0, 20000, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '2019-01-24'),
(3, 1, 0, 6, 0, 'MI/AI/52245', 200000, 1, 1, 10, 'Pending', '0000-00-00', 0.1, 0, 20000, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '2019-01-24'),
(4, 1, 0, 6, 9, 'MI/AI/21402', 200000, 1, 1, 10, 'Pending', '0000-00-00', 0.1, 10000, 20000, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '2019-01-25'),
(5, 1, 0, 6, 9, 'MI/AI/22442', 200000, 1, 1, 10, 'Pending', '0000-00-00', 0.1, 10000, 20000, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '2019-01-25'),
(6, 1, 0, 6, 9, 'MI/AI/04051', 30000, 4, 9, 0, 'Pending', '0000-00-00', 0, 0, 0, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '2019-01-29'),
(7, 1, 0, 6, 9, 'MI/AI/11444', 30000, 4, 9, 0, 'Pending', '0000-00-00', 0, 0, 0, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '2019-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commission` double NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `product_id`, `plan_id`, `user_id`, `commission`, `created`) VALUES
(1, 1, 0, 6, 10, '2019-04-17'),
(2, 1, 0, 16, 14, '2019-04-17'),
(3, 1, 0, 18, 17, '2019-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `complain` text NOT NULL,
  `policy` varchar(15) NOT NULL,
  `insurance` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `created` date NOT NULL,
  `resolved` date NOT NULL,
  `remark` text NOT NULL,
  `resolved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `userID`, `complain`, `policy`, `insurance`, `status`, `created`, `resolved`, `remark`, `resolved_by`) VALUES
(1, 11, 'I need an update on this policy.', 'MI/AI/21402', 1, 'Resolved', '2019-03-13', '2019-03-13', 'Your complaints has been resolved.', 2),
(2, 11, 'This is another complain from me.', 'MI/AI/21402', 1, 'Pending', '2019-03-13', '0000-00-00', '', 0),
(3, 11, 'Testing activities log with complaints module.', 'MI/AI/21402', 1, 'Pending', '2019-03-13', '0000-00-00', '', 0),
(4, 11, 'Another activities testing', 'MI/AI/21402', 1, 'Pending', '2019-03-13', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE `cover` (
  `cover_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cover` varchar(400) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cover`
--

INSERT INTO `cover` (`cover_id`, `plan_id`, `product_id`, `cover`, `amount`, `created`) VALUES
(1, 1, 1, 'Eye Glasses', 5000, '2018-12-20'),
(2, 1, 1, 'Eye Tests', 2000, '2018-12-20'),
(3, 1, 1, 'Surgery', 20000, '2018-12-20'),
(6, 1, 1, 'Blood Transfussion', 10000, '2018-12-21'),
(7, 2, 1, 'Hospital Cost', 150000, '2018-12-21'),
(8, 2, 1, 'Upto 500000 Funeral Cost', 500000, '2018-12-21'),
(9, 2, 1, '2000000 Family Benefit', 2000000, '2018-12-21'),
(10, 3, 1, 'Eye Test', 0, '2018-12-21'),
(11, 3, 1, 'Eye Glasses', 2500, '2018-12-21'),
(12, 3, 1, 'Hospitalization Cost', 0, '2018-12-21'),
(38, 6, 2, 'Medication', 10000, '2018-12-26'),
(39, 6, 2, 'Hospitalization', 20000, '2018-12-26'),
(40, 6, 2, 'Sugery', 50000, '2018-12-26'),
(41, 7, 2, 'Hospitalization', 30000, '2018-12-26'),
(42, 7, 2, 'Test', 150000, '2018-12-26'),
(43, 7, 2, 'Medication', 20000, '2018-12-26'),
(44, 7, 2, 'Sugery', 50000, '2018-12-26'),
(45, 8, 3, 'Loss', 200000, '2018-12-26'),
(46, 8, 3, 'Death Benefit', 500000, '2018-12-26'),
(47, 8, 3, 'Job Loss', 200000, '2018-12-26'),
(48, 9, 4, 'Job Loss', 200000, '2019-01-01'),
(49, 10, 6, 'Repair', 100000, '2019-01-02'),
(50, 10, 6, 'Painting', 50000, '2019-01-02'),
(51, 11, 7, 'Restocking of Items', 100000, '2019-01-08'),
(52, 12, 8, 'Medical Expenses', 50000, '2019-01-08'),
(53, 12, 8, 'Medication', 10000, '2019-01-08'),
(54, 12, 8, 'Test', 5000, '2019-01-08'),
(55, 13, 11, 'Job Loss', 100000, '2019-03-12'),
(56, 14, 12, 'Job Loss', 100000, '2019-03-12'),
(59, 15, 9, 'Cover1', 2000, '2019-03-27'),
(61, 15, 9, 'Cover3', 1000, '2019-03-27'),
(65, 16, 9, 'Cover33', 6574, '2019-03-27'),
(66, 16, 9, 'Cover34', 65743, '2019-03-27'),
(67, 1, 1, 'Testing Godl Cover', 334400, '2019-04-06'),
(68, 18, 14, 'Cover', 2000000, '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `icustomer`
--

CREATE TABLE `icustomer` (
  `id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `icustomer`
--

INSERT INTO `icustomer` (`id`, `insurance_id`, `partner_id`, `customer_id`) VALUES
(1, 1, 0, 8),
(2, 2, 0, 14),
(3, 2, 0, 18),
(4, 0, 0, 24),
(8, 1, 0, 36),
(11, 1, 0, 39),
(12, 1, 0, 40),
(13, 1, 0, 41),
(14, 1, 0, 48),
(15, 1, 0, 7),
(16, 1, 6, 11),
(17, 1, 0, 12),
(18, 1, 6, 13),
(19, 1, 6, 14),
(20, 4, 0, 15),
(21, 3, 0, 19),
(22, 3, 0, 20),
(23, 3, 0, 21),
(24, 3, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `imarketer`
--

CREATE TABLE `imarketer` (
  `id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `imarketer`
--

INSERT INTO `imarketer` (`id`, `insurance_id`, `partner_id`, `user_id`) VALUES
(2, 1, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_company`
--

CREATE TABLE `insurance_company` (
  `company_id` int(6) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `prefix` varchar(2) NOT NULL,
  `rc_no` varchar(20) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `address` text NOT NULL,
  `acct_no` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_company`
--

INSERT INTO `insurance_company` (`company_id`, `company_name`, `prefix`, `rc_no`, `phone_no`, `address`, `acct_no`, `email`, `created`, `created_by`) VALUES
(1, 'AIICO', 'AI', 'CN0001', 123456354, 'Victoria Island', 134562000, 'business@aiico.com', '2018-12-10', 1),
(2, 'Leadway Insurance', 'LW', 'RCN00192', 134250987, 'Victoria Island', 1230980, 'info@leadway.com', '2018-12-11', 1),
(3, 'Law Union &amp; Rock', 'LU', 'BN00211', 12000345, 'Yaba Lagos', 1122090, 'admin@lur.com', '2019-01-08', 1),
(4, 'Consolidated Hallmark Insurance', 'CH', 'RN64547', 127379900, 'Lagos', 10889901, 'info@chi.com', '2019-01-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(10) NOT NULL,
  `policy_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `invoice_date` date NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipartner`
--

CREATE TABLE `ipartner` (
  `id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `pcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `ipartner`
--

INSERT INTO `ipartner` (`id`, `insurance_id`, `partner_id`, `pcode`) VALUES
(1, 1, 6, ''),
(2, 4, 16, 'MI/P/51341'),
(3, 0, 17, 'MI/P/14220'),
(4, 0, 18, 'MI/P/13131');

-- --------------------------------------------------------

--
-- Table structure for table `iuser`
--

CREATE TABLE `iuser` (
  `id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `iuser`
--

INSERT INTO `iuser` (`id`, `insurance_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 4, 5),
(5, 1, 23),
(6, 1, 24),
(7, 3, 25),
(8, 1, 26),
(9, 3, 27);

-- --------------------------------------------------------

--
-- Table structure for table `loss`
--

CREATE TABLE `loss` (
  `loss_id` int(10) NOT NULL,
  `nature_loss` enum('Accidental damage to own property','Third party damage','Theft or Vandalization','Fire damage','Third party injury or death') NOT NULL,
  `narration_loss` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mcustomer`
--

CREATE TABLE `mcustomer` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `marketer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `mcustomer`
--

INSERT INTO `mcustomer` (`id`, `partner_id`, `marketer_id`, `user_id`) VALUES
(1, 6, 9, 12),
(2, 6, 9, 13),
(3, 6, 9, 14);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partner_id` int(10) NOT NULL,
  `partner_name` varchar(50) NOT NULL,
  `partner_rc_no` int(10) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partner_product`
--

CREATE TABLE `partner_product` (
  `partner_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status_id` int(10) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `policy_id` int(10) NOT NULL,
  `mode_payment` enum('ussd','online','transfer') NOT NULL,
  `transfer_reference` int(10) NOT NULL,
  `amount_paid` int(50) NOT NULL,
  `value_date` date NOT NULL,
  `trans_date` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `aggregator_commission` int(50) NOT NULL,
  `agent_commission` int(50) NOT NULL,
  `receipt_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pcustomer`
--

CREATE TABLE `pcustomer` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `pcustomer`
--

INSERT INTO `pcustomer` (`id`, `partner_id`, `user_id`) VALUES
(1, 6, 7),
(2, 6, 12),
(3, 6, 13),
(4, 6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `plan_setup`
--

CREATE TABLE `plan_setup` (
  `plan_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `premium` int(50) NOT NULL,
  `product_id` int(10) NOT NULL,
  `discounts` int(50) NOT NULL,
  `sum_assured` int(50) NOT NULL,
  `expenses` int(50) NOT NULL,
  `commission` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_setup`
--

INSERT INTO `plan_setup` (`plan_id`, `name`, `premium`, `product_id`, `discounts`, `sum_assured`, `expenses`, `commission`, `created`) VALUES
(1, 'Gold', 200000, 1, 0, 500000, 0, 20000, '2018-12-20'),
(2, 'Silver', 2000000, 1, 0, 5000000, 0, 200000, '2018-12-21'),
(3, 'Bronze', 10000, 1, 0, 100000, 0, 1000, '2018-12-21'),
(6, 'Gold', 20000, 2, 0, 500000, 0, 2000, '2018-12-26'),
(7, 'Silver', 25000, 2, 0, 750000, 0, 2500, '2018-12-26'),
(8, 'Gold', 100000, 3, 0, 1500000, 0, 10000, '2018-12-26'),
(9, 'Gold', 30000, 4, 0, 300000, 0, 1500, '2019-01-01'),
(10, 'Silver', 200000, 6, 0, 300000, 0, 10000, '2019-01-02'),
(11, 'Gold', 200000, 7, 0, 2000000, 0, 0, '2019-01-08'),
(12, 'Gold', 20000, 8, 0, 400000, 0, 0, '2019-01-08'),
(13, 'Gold', 300000, 11, 0, 500000, 0, 0, '2019-03-12'),
(14, 'Gold', 200000, 12, 0, 5000000, 0, 0, '2019-03-12'),
(15, 'Testing Plan', 0, 9, 0, 0, 0, 0, '2019-03-27'),
(16, 'Test Testing Plan', 0, 9, 0, 0, 0, 0, '2019-03-27'),
(17, 'Silver', 0, 1, 0, 0, 0, 0, '2019-04-06'),
(18, 'Teen Personal Account', 0, 14, 0, 0, 0, 0, '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `pmarketer`
--

CREATE TABLE `pmarketer` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `pmarketer`
--

INSERT INTO `pmarketer` (`id`, `partner_id`, `user_id`, `code`) VALUES
(1, 5, 11, 'MI/MK/00453'),
(2, 5, 12, 'MI/MK/43400'),
(3, 5, 13, 'MI/MK/43521'),
(4, 5, 29, 'MI/MK/14322'),
(5, 5, 30, 'MI/MK/43453'),
(6, 6, 8, 'MI/MK/05244'),
(7, 6, 0, 'MI/MK/03204'),
(8, 6, 9, 'MI/MK/30533'),
(9, 6, 10, 'MI/MK/04301');

-- --------------------------------------------------------

--
-- Table structure for table `product_setup`
--

CREATE TABLE `product_setup` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `insurance_id` int(10) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sup_doc` varbinary(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_setup`
--

INSERT INTO `product_setup` (`product_id`, `product_name`, `description`, `insurance_id`, `status`, `start_date`, `end_date`, `sup_doc`, `category`, `type`, `type_id`) VALUES
(1, 'LUR Life Plan', 'Law union and rock Life plan cover you in event of sicknesses & death.', 1, 'Active', '2019-01-17', '0000-00-00', '', 'Life', 'Life', 0),
(4, 'LUR Savings Plan', 'The saving plan enables individual to save for the future and towards a target.', 1, 'Active', '2018-12-31', '0000-00-00', '', 'Savings', 'Life', 0),
(5, 'Third Party Motor', 'The thrid party is a motor plan for accident involving a third party.', 1, 'Active', '2018-12-31', '0000-00-00', '', 'Motor', 'Non-Life', 0),
(7, 'Comprehensive Motor', 'Comprehensive motor insurance provide full cover for the holder of this policy', 1, 'Active', '2019-01-08', '0000-00-00', '', 'Motor', 'Non-Life', 0),
(8, 'LUR Instant Plan', 'Law union and rock is an instant plan for all customers.', 3, 'Active', '2019-01-08', '0000-00-00', '', 'Life', 'Life', 0),
(9, 'Third Party Motor', 'The thrid party is a motor plan for accident involving a third party.', 3, 'Active', '2019-01-08', '0000-00-00', '', 'Motor', 'Non-Life', 0),
(12, 'Marine', 'This cover all marine businesses and provide a solid cover for your business.', 4, 'Active', '2019-03-12', '0000-00-00', '', 'Marine', 'Life', 0),
(13, 'Fire and Buglary', 'Fire and Buglary is a special plan for domestic accident and any other accidents.', 0, 'Active', '2019-03-23', '0000-00-00', '', 'Fire', 'Agriculture', 0),
(14, 'Teen Parsonal Account', 'This is a teen personal account. This cover every aspect of teen life.', 0, 'Active', '2019-05-02', '0000-00-00', '', 'Life', 'Life', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `type_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`type_id`, `insurance_id`, `type`, `created_by`, `created`) VALUES
(1, 1, 'Life', 2, '2019-01-19'),
(2, 4, 'Life', 5, '2019-03-12'),
(3, 4, 'Non-life', 5, '2019-03-12'),
(4, 4, 'Agriculture', 5, '2019-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `commission` double NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `product_id`, `plan`, `insurance_id`, `partner_id`, `commission`, `created`) VALUES
(1, 2, 6, 2, 5, 10, '2019-01-03'),
(2, 2, 6, 2, 6, 9, '2019-01-04'),
(3, 2, 6, 2, 25, 8, '2019-01-04'),
(4, 2, 6, 2, 26, 10, '2019-01-04'),
(5, 1, 1, 1, 5, 9, '2019-01-08'),
(6, 8, 12, 3, 21, 9, '2019-01-09'),
(7, 1, 3, 1, 5, 11, '2019-01-19'),
(8, 1, 1, 1, 21, 10, '2019-01-19'),
(9, 1, 1, 1, 42, 9, '2019-01-23'),
(10, 1, 1, 1, 6, 10, '2019-01-24'),
(11, 11, 13, 4, 16, 9, '2019-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'Super'),
(2, 'Admin'),
(3, 'partner'),
(4, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `insurance_id`, `product_id`, `partner_id`, `created`) VALUES
(1, 1, 1, 5, '2019-01-22'),
(2, 1, 4, 5, '2019-01-22'),
(4, 2, 2, 5, '2019-01-22'),
(5, 3, 8, 5, '2019-01-22'),
(6, 1, 1, 6, '2019-01-24'),
(7, 1, 4, 6, '2019-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `support_doc`
--

CREATE TABLE `support_doc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `doc` varchar(30) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `support_doc`
--

INSERT INTO `support_doc` (`id`, `user_id`, `insurance_id`, `doc`, `created`) VALUES
(1, 20, 0, '../upload8303565b577895f03f746', '2019-05-21'),
(2, 20, 0, '../upload10f845eb981b1f445bbe9', '2019-05-21'),
(3, 21, 0, '../upload/120d239b851fc7802bfc', '2019-05-21'),
(4, 21, 0, '../upload/953551a7ceb3bc975af3', '2019-05-21'),
(5, 22, 3, '../upload/72e6a0d2cf143be258a6', '2019-05-21'),
(6, 22, 3, '../upload/61349bbfe69f078ce247', '2019-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `insurance_id` int(10) NOT NULL,
  `partner_id` int(10) NOT NULL,
  `marketer_id` int(11) NOT NULL,
  `policy` varchar(12) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `product` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `premium` int(50) NOT NULL,
  `sum_assured` int(50) NOT NULL,
  `age` varchar(20) NOT NULL,
  `benefit` varchar(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `payment_freq` varchar(20) NOT NULL,
  `underwriting_year` int(4) NOT NULL,
  `transaction_date` date NOT NULL,
  `auth_date` date NOT NULL,
  `auth_by` varchar(100) NOT NULL,
  `captured_by` varchar(100) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `insurance_type` varchar(50) NOT NULL,
  `engine` varchar(50) NOT NULL,
  `chasis_no` varchar(100) NOT NULL,
  `car_make` varchar(20) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `reg_no_car` varchar(20) NOT NULL,
  `payment_start_date` date NOT NULL,
  `payment_end_date` date NOT NULL,
  `outstanding_installment` int(50) NOT NULL,
  `paid_installment` int(50) NOT NULL,
  `outstanding_amount` int(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `renewal_no` int(50) NOT NULL,
  `is_renewal` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `insurance_id`, `partner_id`, `marketer_id`, `policy`, `start_date`, `end_date`, `product`, `plan`, `premium`, `sum_assured`, `age`, `benefit`, `discount`, `payment_freq`, `underwriting_year`, `transaction_date`, `auth_date`, `auth_by`, `captured_by`, `duration`, `insurance_type`, `engine`, `chasis_no`, `car_make`, `car_model`, `reg_no_car`, `payment_start_date`, `payment_end_date`, `outstanding_installment`, `paid_installment`, `outstanding_amount`, `status`, `renewal_no`, `is_renewal`) VALUES
(1, 7, 1, 6, 0, 'MI/AI/52245', '2019-01-07', '2021-01-06', 1, 1, 200000, 500000, '', '', 0, 'Monthly', 2019, '2019-01-07', '0000-00-00', '', '6', '2', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(2, 11, 1, 6, 9, 'MI/AI/21402', '2019-01-25', '2021-01-24', 1, 1, 200000, 500000, '', '', 0, 'Monthly', 2019, '2019-01-25', '0000-00-00', '', '9', '2', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(3, 12, 1, 6, 9, 'MI/AI/22442', '2019-01-10', '2020-01-10', 1, 1, 200000, 500000, '', '', 0, 'Monthly', 2019, '2019-01-10', '0000-00-00', '', '9', '1', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(4, 13, 1, 6, 9, 'MI/AI/04051', '2019-01-28', '2020-01-28', 4, 9, 30000, 300000, '', '', 0, 'Quarterly', 2019, '2019-01-28', '0000-00-00', '', '9', '1', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(5, 14, 1, 6, 9, 'MI/AI/11444', '2019-01-17', '2023-01-16', 4, 9, 30000, 300000, '', '', 0, 'Biannual', 2019, '2019-01-17', '0000-00-00', '', '9', '4', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(6, 15, 3, 0, 0, 'MI/CH/02042', '2019-03-12', '2020-03-11', 11, 13, 300000, 500000, '', '', 0, 'Biannual', 2019, '2019-03-12', '0000-00-00', '', '5', '1', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(7, 19, 3, 0, 0, 'MI/LU/52432', '2019-05-21', '2022-05-20', 8, 12, 20000, 400000, '', '', 0, 'Annually', 2019, '2019-05-21', '0000-00-00', '', '4', '3', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(8, 20, 3, 0, 0, 'MI/LU/44043', '2019-05-21', '2023-05-20', 8, 12, 20000, 400000, '', '', 0, 'Biannual', 2019, '2019-05-21', '0000-00-00', '', '4', '4', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(9, 21, 3, 0, 0, 'MI/LU/02531', '2019-05-21', '2024-05-19', 8, 12, 20000, 400000, '', '', 0, 'Quarterly', 2019, '2019-05-21', '0000-00-00', '', '4', '5', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No'),
(10, 22, 3, 0, 0, 'MI/LU/12114', '2019-05-21', '2021-05-20', 9, 15, 0, 0, '', '', 0, 'Biannual', 2019, '2019-05-21', '0000-00-00', '', '4', '2', '', '', '23141AJA', 'FORD', 'Explorer', 'BDG324JH', '0000-00-00', '0000-00-00', 0, 0, 0, 'Active', 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `rc` varchar(12) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nfname` varchar(200) NOT NULL,
  `nlname` varchar(200) NOT NULL,
  `nphone` varchar(200) NOT NULL,
  `nemail` varchar(200) NOT NULL,
  `naddress` text NOT NULL,
  `created` date NOT NULL,
  `createdby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `rc`, `telephone`, `email`, `address`, `city`, `state`, `dob`, `lastname`, `firstname`, `middlename`, `password`, `role_id`, `nfname`, `nlname`, `nphone`, `nemail`, `naddress`, `created`, `createdby`) VALUES
(1, 'SuperAdmin', '', '', 'super@super.com', '', 'Lagos', '', '0000-00-00', 'Admin', 'Super', '', '$2y$12$heLUzHFGwgIXehP2HiYDK.LQxJjb0pK2tVzsZvttxsmsx4BgrDBte', 1, '', '', '', '', '', '0000-00-00', 1),
(2, '', '', '08077660090', 'admin@aiico.com', 'Victoria Island', '', '', '0000-00-00', 'Admin', 'AIICO', '', '$2y$12$SFDgxv9R7iu6iPWBAqOzNesCr5bPUCVwLtEA/PHnVJpcTQnUNQhOa', 2, '', '', '', '', '', '2019-01-24', 1),
(3, '', '', '0123546789', 'admin@leadway.com', 'Victoria Island', '', '', '0000-00-00', 'Admin', 'Leadway', '', '$2y$12$O07jGy./7B/iIP/nvNQqH.FAh8U2eKPMClCl1dbr1nq2zBVdiWeYe', 2, '', '', '', '', '', '2019-01-24', 1),
(4, '', '', '0124567389', 'admin@lur.com', 'Yaba Lagos', '', '', '0000-00-00', 'LUR', 'Admin', '', '$2y$12$BKWf6BDPeUEa3RFQ4svXXO9nIgVmFCEJWFkIJZ0WVfFKH3pvzKT7W', 2, '', '', '', '', '', '2019-01-24', 1),
(5, '', '', '0123546000', 'admin@chi.com', 'Lagos', '', '', '0000-00-00', 'CHI', 'Admin', '', '$2y$12$4Yf7BvA17vu343W2/nWgbOcSzwJsHFvMKCi7V0ZMQE3lorm2v0aye', 2, '', '', '', '', '', '2019-01-24', 1),
(6, '', 'BN54647', '014660980', 'info@abc.com', 'Lagos Island', '', '', '0000-00-00', '', 'MFB Finance', '', '$2y$12$3nmyXbb2.JRAlV2Z0/VNWuQAL2RSZbrdloktdsTnZ1f.Ofm98APxG', 3, '', '', '', '', '', '2019-01-24', 1),
(7, '', '', '09054363700', 'ola.olu@yahoo.com', 'Ikoyi', '', '', '1987-01-08', 'Olu', 'Ola', '', '$2y$12$IPHYpkD4/HXCam7FvtHKBOCo2urWs7M3UU18XEcUbQXXt/xyKxjnu', 4, 'Joy', 'John', '08126357700', 'joy@aol.com', 'Yaba', '2019-01-24', 6),
(8, '', '', '09023409088', 'ola_m@mail.com', 'Lagos', '', '', '2000-01-15', 'Markerters', 'Ola', '', '$2y$12$sYFf3KxLFvks/9SjUFEhFOfTJNJW/joW.e2X9Md7wBBUCaql/PkQK', 5, '', '', '', '', '', '2019-01-24', 6),
(9, '', '', '09033300900', 'g.will@mail.com', 'Gbagada Lagos', '', '', '1990-01-01', 'Williams', 'Gray', '', '$2y$12$rP3BW/JOKQUpq6UAZcHcX.7xp8DPYExWi5CMnllcwYqDarI8UoIsq', 5, '', '', '', '', '', '2019-01-24', 6),
(10, '', '', '08132456700', 'market@market.com', 'Lagos', '', '', '2000-01-01', 'Info', 'market', '', '$2y$12$QfjSoCgmJ2ylcrRG01mvXuXL8at80RZPyIUD5JnqN5MI5SC0IYq6m', 5, '', '', '', '', '', '2019-01-25', 6),
(11, '', '', '08032400099', 'fola@yahoo.com', 'Bariga', '', '', '1990-01-01', 'Ola', 'Festus', '', '$2y$12$yVbwjIQIA.vpXKmvjow/QetJ4b47RvXble8r8mXKJ.8BdHJblEkHW', 4, 'Ola', 'Brown', '09090090099', 'o.brown@mail.com', 'Bariga', '2019-01-25', 9),
(12, '', '', '09087655600', 'festus@gmail.com', 'Bariga', '', '', '1989-01-08', 'Festus', 'Fola', '', '$2y$12$551/c9GrQ8SKhw8ONWx73.VfENSC6plvl0sQ9mlljrrPP11imkhlW', 4, 'Ola', 'Yemi', '07023440099', 'o.yemi@yahoo.com', 'Bariga', '2019-01-25', 9),
(13, '', '', '08099900000', 'j.wess@yahoo.com', 'Ajah', '', '', '2000-01-16', 'Wess', 'Jeremy', '', '$2y$12$iVm2Ici1K2f0DIXh1n6nceDI3lsmNd2Vt8vIqNgz0vPob47KeKcc6', 4, 'George', 'Wess', '08132452600', 'g.wess@gmail.com', 'Ajah', '2019-01-29', 9),
(14, '', '', '08123487653', 'drek@yahoo.com', 'Gbagada', '', '', '1990-01-16', 'James', 'Drek', '', '$2y$12$hpTBazzXh/QxMtrm9HK3SOexHcPEMH00HjUXmz014lNEpQIM2G2Yu', 4, 'Grace', 'James', '09023251600', 'grace.j@yahoo.com', 'Gbagada Lagos', '2019-01-29', 9),
(15, '', '', '09023425600', 'joy.j@yahoo.com', 'Lagos', '', '', '2019-03-13', 'Joy', 'James', '', '$2y$12$QNgg7QeSIbBM.UB.cCkHJ.kV9U8goNzmNgiIkIcTdogMSdPNSkfm6', 4, 'Ojo', 'Ade', '08173820000', 'ojo.ade@yahoo.com', '3, Joseph Street, Lagos Island.', '2019-03-12', 5),
(16, '', 'RC65352', '013409890', 'info@lloyd.com', 'Egbeda Lagos', '', '', '0000-00-00', '', 'LLoyds Brokers', '', '$2y$12$JZHgyzLfnX1yixB/hMV2LenPjMw4V3BbY4STKwnapmMPxBMO4bOmm', 3, '', '', '', '', '', '2019-03-12', 4),
(17, '', 'hdhdh', 'djdjdh', 'email@mail.com', 'jdjfdjf', '', '', '0000-00-00', '', 'gfhfh', '', '$2y$12$WKNcs2D0uMjbnAvQgH7NTexrw1XhjqqbtgbIhJOX8zTfPE8825A22', 3, '', '', '', '', '', '2019-03-22', 0),
(18, '', 'Ayo Ojo', '8069440804', 'ay.akeju88@yahoo.com', 'Lagos', '', '', '0000-00-00', '', 'Ayo Ojo', '', '$2y$12$Z.skYc.yMaRq26NMHfmhkeWTB/sT3yhnzjWxumIdQSEaXwmfiIsXq', 3, '', '', '', '', '', '2019-03-22', 0),
(19, '', '', '08132452670', 'h.james@yahoo.com', 'Lagos', '', '', '2000-05-21', 'James', 'Harry', '', '$2y$12$UAYurBorvuBcXwLOADldJOgip7ER67LtcPe.m84Fo2gDm9ZUKTO3O', 4, 'Brown', 'James', '8123409876', 'b.james2@yahoo.com', 'Lagos', '2019-05-21', 4),
(20, '', '', '8123409876', 'b.james@yahoo.com', 'Lagos', '', '', '1989-05-14', 'James', 'Brown', '', '$2y$12$ntI89i4d8mSAEe1BU3.sYunZeSEGETOvmVrtSrw49k0hidVQ.I6qO', 4, 'Fola', 'Olaleye', '8076443450', 'fola@yahoo.com', 'Lagos', '2019-05-21', 4),
(21, '', '', '08076443000', 'tola@yahoo.com', 'Lagos', '', '', '1988-05-20', 'Olaleye', 'Tola', '', '$2y$12$rXz1ri86.Cs.A1aNRvjz.eKqcnrP8ISXX1qPJ31rJG.PVRAOpBdrO', 4, 'Harry', 'James', '8132452670', 'h.james@yahoo.com', 'Lagos', '2019-05-21', 4),
(22, '', '', '08076538900', 'f.foluwa@yahoo.com', 'Lagos', '', '', '1990-05-20', 'Folulwa', 'Fiyin', '', '$2y$12$C72zSbW.r4kVnm/vqTRaa.sEGo21Y13FODuOPguYZnLERu6kLdW9u', 4, 'Harry', 'James', '8132452670', 'h.james@yahoo.com', 'Lagos', '2019-05-21', 4),
(23, '', '', '09023400000', 'ade@aiico.com', 'Lagos', '', '', '0000-00-00', 'Damola', 'Ade', '', '$2y$12$TlLUQ7WYPGlz5uGGvcxNL.3bZmZYtqggJokADZ14QfZ3Qrztip1nS', 6, '', '', '', '', '', '2019-05-22', 2),
(24, '', '', '08123456700', 'user@aiico.com', 'Lagos', '', '', '0000-00-00', 'James', 'Grace', '', '$2y$12$4FopCo6YHi0Khok4zwNbIeZzAD2gbKy9C2ry3HM9vyHhNZASAs08O', 7, '', '', '', '', '', '2019-05-22', 2),
(25, '', '', '09087644600', 'fincom@lur.com', 'Yaba', '', '', '0000-00-00', 'Dept', 'Finance', '', '$2y$12$ET.cyZnSMvVjkw.mxCEFCeYMqtEB7KqNTlLfYJNJNM5Hok9RK.d6y', 6, '', '', '', '', '', '2019-05-23', 2),
(26, '', '', '012345022', 'fincom@aiico.com', 'Victoria Island', '', '', '0000-00-00', 'Dept', 'Finance', '', '$2y$12$LbPJDxcWwsDbnjOiW.nssOftMAmV1SoTz3w.vRlQbxIGKKdyw4Pti', 6, '', '', '', '', '', '2019-05-23', 2),
(27, '', '', '012350987', 'finco@lur.com', 'Yaba', '', '', '0000-00-00', 'Acc', 'Finance', '', '$2y$12$oIvD05HV3NeJJf/yTRhuL.PTGtEVle1I8hRRQhgKJbbsDSv945ELa', 6, '', '', '', '', '', '2019-05-23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_to_policy`
--

CREATE TABLE `user_to_policy` (
  `user_id` int(10) NOT NULL,
  `policy_id` int(10) NOT NULL,
  `policy_no` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status_id` int(10) NOT NULL,
  `next_kin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `claimdoc`
--
ALTER TABLE `claimdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover`
--
ALTER TABLE `cover`
  ADD PRIMARY KEY (`cover_id`);

--
-- Indexes for table `icustomer`
--
ALTER TABLE `icustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imarketer`
--
ALTER TABLE `imarketer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_company`
--
ALTER TABLE `insurance_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `ipartner`
--
ALTER TABLE `ipartner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iuser`
--
ALTER TABLE `iuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcustomer`
--
ALTER TABLE `mcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pcustomer`
--
ALTER TABLE `pcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_setup`
--
ALTER TABLE `plan_setup`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `pmarketer`
--
ALTER TABLE `pmarketer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_setup`
--
ALTER TABLE `product_setup`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_doc`
--
ALTER TABLE `support_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_to_policy`
--
ALTER TABLE `user_to_policy`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `beneficiary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `claimdoc`
--
ALTER TABLE `claimdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `commission_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cover`
--
ALTER TABLE `cover`
  MODIFY `cover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `icustomer`
--
ALTER TABLE `icustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `imarketer`
--
ALTER TABLE `imarketer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insurance_company`
--
ALTER TABLE `insurance_company`
  MODIFY `company_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ipartner`
--
ALTER TABLE `ipartner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iuser`
--
ALTER TABLE `iuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mcustomer`
--
ALTER TABLE `mcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pcustomer`
--
ALTER TABLE `pcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_setup`
--
ALTER TABLE `plan_setup`
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pmarketer`
--
ALTER TABLE `pmarketer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_setup`
--
ALTER TABLE `product_setup`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `support_doc`
--
ALTER TABLE `support_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
