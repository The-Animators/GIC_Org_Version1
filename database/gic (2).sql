-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 11:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gic`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_agency`
--

CREATE TABLE `master_agency` (
  `magency_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_dt` datetime NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:deleted,1:running	',
  `fk_mcompany_id` int(11) NOT NULL,
  `magency_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '	0:In-Active,1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_agency`
--

INSERT INTO `master_agency` (`magency_id`, `code`, `name`, `link`, `username`, `password`, `create_date`, `modify_dt`, `added_by`, `ip`, `del_flag`, `fk_mcompany_id`, `magency_status`) VALUES
(1, 'AL', 'Alok', 'alok.com', 'alok', '123', '2021-04-03 18:36:29', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1),
(2, 'KN', 'Khurana', 'khurana.com', 'khurana', '456', '2021-04-03 18:36:29', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1),
(3, 'MG', 'Mangesh', 'mangesh.com', 'mangesh', '789', '2021-04-03 18:36:29', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_company`
--

CREATE TABLE `master_company` (
  `mcompany_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '	0:In-Active,1:Active',
  `short_name` varchar(100) DEFAULT NULL,
  `common_email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `office_contact` varchar(100) DEFAULT NULL,
  `tollfree_no_1` varchar(100) DEFAULT NULL,
  `tollfree_no_2` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `cheque_name` varchar(255) DEFAULT NULL,
  `courier_address` text DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(50) DEFAULT NULL,
  `micr_code` varchar(20) DEFAULT NULL,
  `account_holder_name_1` varchar(255) DEFAULT NULL,
  `account_number_1` varchar(255) DEFAULT NULL,
  `bank_name_1` varchar(255) DEFAULT NULL,
  `branch_name_1` varchar(255) DEFAULT NULL,
  `ifsc_code_1` varchar(50) DEFAULT NULL,
  `micr_code_1` varchar(20) DEFAULT NULL,
  `payment_link` varchar(255) DEFAULT NULL,
  `payment_steps` text DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_dt` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:deleted,1:running	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_company`
--

INSERT INTO `master_company` (`mcompany_id`, `company_name`, `company_status`, `short_name`, `common_email`, `address`, `city`, `zipcode`, `state`, `office_contact`, `tollfree_no_1`, `tollfree_no_2`, `website`, `cheque_name`, `courier_address`, `account_holder_name`, `account_number`, `bank_name`, `branch_name`, `ifsc_code`, `micr_code`, `account_holder_name_1`, `account_number_1`, `bank_name_1`, `branch_name_1`, `ifsc_code_1`, `micr_code_1`, `payment_link`, `payment_steps`, `create_date`, `modify_dt`, `added_by`, `ip`, `del_flag`) VALUES
(1, 'PS Code Hub', 1, 'PS98', 'pscodehub@gmail.com', 'Kurla', 'Mumbai', '400070', 'Maharastra67', '8578345478', '328754327925', '379853425', 'pscodehub.com', 'ICICI', 'Parel', 'Himanhsu', '27324682942', 'ICICI Bank', 'Parel', 'hfwguyebhufc', 'hfbsbfskf', '', '', '', '', '', '', 'googlpay.com', 'Step1:Test1\nStep2:Test2\nStep3:test3', '2021-04-04 18:40:31', '0000-00-00 00:00:00', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_member`
--

CREATE TABLE `master_member` (
  `mmember_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact1` varchar(50) NOT NULL,
  `contact2` varchar(50) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_dt` datetime NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `del_flag` tinyint(4) DEFAULT 1 COMMENT '0:deleted,1:running	',
  `fk_mcompany_id` int(11) NOT NULL,
  `mmember_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '	0:In-Active,1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_member`
--

INSERT INTO `master_member` (`mmember_id`, `name`, `contact1`, `contact2`, `email1`, `email2`, `department`, `designation`, `create_date`, `modify_dt`, `added_by`, `ip`, `del_flag`, `fk_mcompany_id`, `mmember_status`) VALUES
(1, 'Priyanshu', '8947357238', '7632853425', 'priyanshu@gmil.com', '', '', 'Admin', '2021-04-03 18:36:29', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1),
(2, 'Himanshu', '7684456548', '5477676776', 'himmat@gmail.com', '', '', 'Super Admin', '2021-04-03 18:36:29', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1),
(3, 'Tushi', '7654695469', '7648234623', 'tushi@gmail.com', '', '', 'Manager', '2021-04-03 18:36:29', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1),
(4, 'Himmat', '2874293574', '8742953453', 'himanhsu@gmail.com', '', '', 'Branch Manager', '2021-04-03 18:36:29', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_tpa`
--

CREATE TABLE `master_tpa` (
  `mtpa_id` int(11) NOT NULL,
  `tpa_name` varchar(255) NOT NULL,
  `tpa_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:In-Active,1:Active',
  `short_name` varchar(100) DEFAULT NULL,
  `common_email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `office_contact` varchar(100) DEFAULT NULL,
  `tollfree_no_1` varchar(100) DEFAULT NULL,
  `tollfree_no_2` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_dt` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:deleted,1:running	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_tpa`
--

INSERT INTO `master_tpa` (`mtpa_id`, `tpa_name`, `tpa_status`, `short_name`, `common_email`, `address`, `city`, `zipcode`, `state`, `office_contact`, `tollfree_no_1`, `tollfree_no_2`, `website`, `create_date`, `modify_dt`, `added_by`, `ip`, `del_flag`) VALUES
(1, 'Web School', 1, 'Web', 'webschool@gmail.com', 'Sangrur', 'Sangrur', '875645', 'Panjab', '767486949648', '823423563', '7834345634', 'webschool.com', '2021-04-04 09:36:02', '0000-00-00 00:00:00', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_tpa_member`
--

CREATE TABLE `master_tpa_member` (
  `mtpa_member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact1` varchar(50) NOT NULL,
  `contact2` varchar(50) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_dt` datetime NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `del_flag` tinyint(4) DEFAULT 1 COMMENT '0:deleted,1:running	',
  `fk_mtpa_id` int(11) NOT NULL,
  `mtpa_member_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '	0:In-Active,1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_tpa_member`
--

INSERT INTO `master_tpa_member` (`mtpa_member_id`, `name`, `contact1`, `contact2`, `email1`, `email2`, `department`, `designation`, `create_date`, `modify_dt`, `added_by`, `ip`, `del_flag`, `fk_mtpa_id`, `mtpa_member_status`) VALUES
(1, 'Rahul', '4545657568', '238345634', 'rahul@gmail.com', '', '', 'Manager', '2021-04-04 09:36:02', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1),
(2, 'Omkar', '874696545', '375348534', 'omkar@gmail.com', '', '', 'Branch Manager', '2021-04-04 09:36:02', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1),
(3, 'Sandhu', '348457343', '3784358', 'sandhu@gmail.com', '', '', 'Super Admin', '2021-04-04 09:36:02', '0000-00-00 00:00:00', NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(50) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `menu_status` tinyint(4) DEFAULT 1 COMMENT '0:In-Active,1:Active',
  `create_date` datetime DEFAULT NULL,
  `modify_dt` datetime DEFAULT NULL,
  `del_flag` tinyint(4) DEFAULT 1 COMMENT '0:deleted,1:running'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_order`, `menu_status`, `create_date`, `modify_dt`, `del_flag`) VALUES
(1, 'Groups', '#', 'fe-airplay', 2, 1, '2021-04-02 01:37:33', NULL, 1),
(2, 'Policy', '#', 'fe-briefcase', 3, 1, '2021-04-02 01:40:04', NULL, 1),
(3, 'Claims', '#', 'fe-box', 6, 1, '2021-04-02 01:40:47', '2021-04-02 11:07:44', 1),
(4, 'Comission', '#', 'fe-edit', 7, 1, '2021-04-02 01:41:33', '2021-04-02 11:07:56', 1),
(5, 'Endorsement', '#', 'fe-sidebar', 5, 1, '2021-04-02 01:42:51', '2021-04-02 11:07:34', 1),
(6, 'Calculator', '#', 'fe-file-plus', 8, 1, '2021-04-02 01:44:42', '2021-04-02 11:08:05', 1),
(7, 'Renewal', '#', 'fe-plus-square', 4, 1, '2021-04-02 01:45:35', '2021-04-02 11:07:19', 1),
(8, 'Dashboard', 'sup_admin/dashboard', 'fe-bar-chart', 1, 1, '2021-04-02 01:57:49', '2021-04-02 02:00:32', 1),
(9, 'Master', '#', 'fe-menu', 10, 1, '2021-04-02 02:05:56', '2021-04-02 11:08:25', 1),
(10, 'Work', 'work_management', 'fe-airplay', 9, 1, '2021-04-02 05:54:53', '2021-04-02 11:08:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(45) NOT NULL,
  `staff_username` varchar(45) NOT NULL,
  `staff_password` varchar(45) NOT NULL,
  `staff_email` text NOT NULL,
  `fk_user_role_id` int(11) NOT NULL,
  `staff_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '	0:In-Active,1:Active',
  `del_flag` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:deleted,1:running	',
  `create_date` datetime DEFAULT NULL,
  `modify_dt` datetime DEFAULT NULL,
  `role_permission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_username`, `staff_password`, `staff_email`, `fk_user_role_id`, `staff_status`, `del_flag`, `create_date`, `modify_dt`, `role_permission`) VALUES
(1, 'Priyanshu SIngh', 'priyanshu123', '1234', 'animator@gmail.com', 1, 1, 1, '2021-04-02 04:09:25', '2021-04-03 11:29:56', '[[\"1\",\"1\",\"0\",\"0\",\"1\"],[\"1\",\"1\",\"1\",\"1\",\"2\"],[\"0\",\"0\",\"1\",\"1\",\"3\"]]'),
(2, 'Dhruvil Gala', 'gala123', '123', 'animator@gmail.com', 2, 1, 1, '2021-04-02 04:12:28', '2021-04-02 04:32:40', NULL),
(3, 'Amber Sinha', 'sinha123', '1234', 'pscodehub@gmail.com', 1, 1, 1, '2021-04-02 10:30:23', NULL, '[[\"0\",\"1\",\"1\",\"0\",\"1\"],[\"0\",\"1\",\"0\",\"1\",\"2\"],[\"0\",\"0\",\"1\",\"1\",\"3\"]]'),
(4, 'Harsh', 'harsh', '123', 'animator@gmail.com', 2, 1, 1, '2021-04-03 11:35:30', NULL, '[[\"1\",\"0\",\"0\",\"1\",\"1\"],[\"0\",\"1\",\"1\",\"0\",\"2\"],[\"0\",\"0\",\"1\",\"0\",\"3\"]]');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(11) NOT NULL,
  `submenu_name` varchar(50) DEFAULT NULL,
  `submenu_url` varchar(255) DEFAULT NULL,
  `submenu_order` int(11) DEFAULT NULL,
  `submenu_status` tinyint(4) DEFAULT 1 COMMENT '0:In-Active,1:Active',
  `fk_menu_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modify_dt` datetime DEFAULT NULL,
  `del_flag` tinyint(4) DEFAULT 1 COMMENT '0:deleted,1:running	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `submenu_name`, `submenu_url`, `submenu_order`, `submenu_status`, `fk_menu_id`, `create_date`, `modify_dt`, `del_flag`) VALUES
(1, 'Insurance  Company Details', 'master/insurance_company_details', 1, 1, 9, '2021-04-02 02:07:18', '2021-04-03 01:29:30', 1),
(2, 'Staff', 'master/staff', 3, 1, 9, '2021-04-02 02:09:27', '2021-04-04 12:20:43', 1),
(3, 'Roles', 'sup_admin/roles', 4, 1, 9, '2021-04-02 02:13:02', '2021-04-04 12:20:51', 1),
(5, 'TPA', 'master/tpa', 2, 1, 9, '2021-04-04 12:20:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `user_role_title` varchar(50) DEFAULT NULL,
  `user_role_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:In-Active,1:Active',
  `sub_menu_permission` varchar(100) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `modify_dt` datetime DEFAULT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:deleted,1:running'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `user_role_title`, `user_role_status`, `sub_menu_permission`, `create_date`, `modify_dt`, `del_flag`) VALUES
(1, 'Super Admin', 1, '2,3', '2021-04-02 04:17:53', '2021-04-02 11:04:47', 1),
(2, 'Admin', 1, '1,3', '2021-04-02 04:23:56', '2021-04-02 11:05:02', 1),
(3, 'Manager', 1, '1,2,3', '2021-04-02 11:02:49', '2021-04-02 11:05:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_agency`
--
ALTER TABLE `master_agency`
  ADD PRIMARY KEY (`magency_id`);

--
-- Indexes for table `master_company`
--
ALTER TABLE `master_company`
  ADD PRIMARY KEY (`mcompany_id`);

--
-- Indexes for table `master_member`
--
ALTER TABLE `master_member`
  ADD PRIMARY KEY (`mmember_id`);

--
-- Indexes for table `master_tpa`
--
ALTER TABLE `master_tpa`
  ADD PRIMARY KEY (`mtpa_id`);

--
-- Indexes for table `master_tpa_member`
--
ALTER TABLE `master_tpa_member`
  ADD PRIMARY KEY (`mtpa_member_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`,`staff_username`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_agency`
--
ALTER TABLE `master_agency`
  MODIFY `magency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_company`
--
ALTER TABLE `master_company`
  MODIFY `mcompany_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_member`
--
ALTER TABLE `master_member`
  MODIFY `mmember_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `master_tpa`
--
ALTER TABLE `master_tpa`
  MODIFY `mtpa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_tpa_member`
--
ALTER TABLE `master_tpa_member`
  MODIFY `mtpa_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
