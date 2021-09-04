-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 04:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ith2`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `beneficiary_id` int(10) NOT NULL,
  `policy_id` int(10) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `type` enum('Primary','Secondary') NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `benefiary_percentage` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claim_id` int(10) NOT NULL,
  `policy_id` int(10) NOT NULL,
  `notif_date` date NOT NULL,
  `incident_date` date NOT NULL,
  `loss_id` int(10) NOT NULL,
  `claim_status_id` int(10) NOT NULL,
  `claim_amount` int(50) NOT NULL,
  `amount_paid` int(50) NOT NULL,
  `payment_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `discharge_voucher_no` int(10) NOT NULL,
  `discharge_voucher_date` date NOT NULL,
  `discharge_voucher_acceptance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `policy_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `commission_rate` int(50) NOT NULL,
  `status` enum('Settled','Pending') NOT NULL,
  `settlement_date` date NOT NULL,
  `commission_percentage` int(50) NOT NULL,
  `commission_actual` int(50) NOT NULL,
  `commission_value` int(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ins_comm_amount` int(50) NOT NULL,
  `partner_comm_amount` int(50) NOT NULL,
  `withholding_tax` int(50) NOT NULL,
  `merchant_amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `insurance_company`
--

CREATE TABLE `insurance_company` (
  `company_id` int(6) NOT NULL,
  `company_name` varchar(50) NOT NULL,
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

INSERT INTO `insurance_company` (`company_id`, `company_name`, `rc_no`, `phone_no`, `address`, `acct_no`, `email`, `created`, `created_by`) VALUES
(1, 'AIICO', 'CN0001', 123456354, 'Victoria Island', 134562000, 'business@aiico.com', '2018-12-10', 1),
(2, 'Leadway Insurance', 'RCN00192', 134250987, 'Victoria Island', 1230980, 'info@leadway.com', '2018-12-11', 1);

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
  `partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `ipartner`
--

INSERT INTO `ipartner` (`id`, `insurance_id`, `partner_id`) VALUES
(1, 2, 5),
(2, 2, 6);

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
(2, 2, 3);

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
-- Table structure for table `plan_setup`
--

CREATE TABLE `plan_setup` (
  `plan_id` int(10) NOT NULL,
  `premium` int(50) NOT NULL,
  `product_id` int(10) NOT NULL,
  `discounts` int(50) NOT NULL,
  `sum_assured` int(50) NOT NULL,
  `expenses` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_setup`
--

CREATE TABLE `product_setup` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `insurance_id` int(10) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sup_doc` varbinary(50) NOT NULL,
  `commission` int(50) NOT NULL,
  `type` varchar(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_setup`
--

INSERT INTO `product_setup` (`product_id`, `product_name`, `insurance_id`, `status`, `start_date`, `end_date`, `sup_doc`, `commission`, `type`, `type_id`) VALUES
(1, 'AIICO Instant Plan', 1, 'Active', '2018-12-11', '2019-12-11', '', 1000, '0', 0),
(2, 'AIICO Livestock', 1, 'Active', '2018-12-11', '2019-12-11', '', 1500, '0', 0);

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
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `insurance_id` int(10) NOT NULL,
  `partner_id` int(10) NOT NULL,
  `policy_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `premium` int(50) NOT NULL,
  `sum_assured` int(50) NOT NULL,
  `age` varchar(20) NOT NULL,
  `benefit` varchar(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `payment_freq` enum('Monthly','Annually') NOT NULL,
  `underwriting_year` int(4) NOT NULL,
  `transaction_date` date NOT NULL,
  `auth_date` date NOT NULL,
  `auth_by` varchar(100) NOT NULL,
  `captured_by` varchar(100) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `chasis_no` int(20) NOT NULL,
  `car_make` varchar(20) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `reg_no_car` varchar(20) NOT NULL,
  `payment_start_date` date NOT NULL,
  `payment_end_date` date NOT NULL,
  `outstanding_installment` int(50) NOT NULL,
  `paid_installment` int(50) NOT NULL,
  `outstanding_amount` int(50) NOT NULL,
  `status` enum('Cancelled','Draft','Terminated') NOT NULL,
  `renewal_no` int(50) NOT NULL,
  `is_renewal` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
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

INSERT INTO `users` (`user_id`, `username`, `telephone`, `email`, `address`, `city`, `state`, `dob`, `lastname`, `firstname`, `middlename`, `password`, `role_id`, `nfname`, `nlname`, `nphone`, `nemail`, `naddress`, `created`, `createdby`) VALUES
(1, 'Super_Admin', '', 'super@super.com', '', 'Lagos', 'Lagos', '0000-00-00', 'Admin', 'Super', '', '$2y$12$heLUzHFGwgIXehP2HiYDK.LQxJjb0pK2tVzsZvttxsmsx4BgrDBte', 1, '', '', '', '', '', '2018-12-11', 1),
(2, '', '0123450987', 'admin@aiico.com', 'Lagos', '', '', '0000-00-00', 'Admin', 'AIICO', '', '$2y$12$SyLqKvRPl1QDkRFcY7B/.OskgU0kv6MI8zeOWHE4j31usToMUacAu', 2, '', '', '', '', '', '2018-12-11', 1),
(3, '', '08124350980', 'admin@leadway.com', 'Victoria Island', '', '', '0000-00-00', 'Admin', 'Leadway', '', '$2y$12$tnk0O0azFkHH.aKdKD7jZu2RkiIHM/CfbObo2G1mcGlKeLsclQ5bC', 2, '', '', '', '', '', '2018-12-11', 1),
(5, '', '0123000354', 'info@abc.com', 'Lekki Lagos', '', '', '0000-00-00', '', 'ABC MFBank', '', '$2y$12$ApEXy0ho1b0JaQMgHqD0Y.GP1EiOERJ6NniAtp3.maqvZGOK.jbcC', 3, '', '', '', '', '', '2018-12-11', 0),
(6, '', '08134562700', 'info@broklyn.com', 'Lagos', '', '', '0000-00-00', '', 'Broklyn Brokers', '', '$2y$12$50vJmy7pUimveqfcDiOHxOOfLRELEFwQrWGJO7VMIncvNZ/hxmQRS', 3, '', '', '', '', '', '2018-12-11', 2);

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
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `icustomer`
--
ALTER TABLE `icustomer`
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
-- Indexes for table `plan_setup`
--
ALTER TABLE `plan_setup`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `product_setup`
--
ALTER TABLE `product_setup`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

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
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `beneficiary_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icustomer`
--
ALTER TABLE `icustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_company`
--
ALTER TABLE `insurance_company`
  MODIFY `company_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ipartner`
--
ALTER TABLE `ipartner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iuser`
--
ALTER TABLE `iuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_setup`
--
ALTER TABLE `product_setup`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
