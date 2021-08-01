-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2020 at 09:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claim_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense_claim`
--

CREATE TABLE `expense_claim` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `staff_no` varchar(50) DEFAULT NULL,
  `depatment` varchar(50) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `first_500` decimal(10,2) DEFAULT NULL,
  `thereafter` decimal(10,2) DEFAULT NULL,
  `staff_signature` varchar(50) DEFAULT NULL,
  `signature` varchar(50) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_claim`
--

INSERT INTO `expense_claim` (`id`, `name`, `staff_no`, `depatment`, `month`, `first_500`, `thereafter`, `staff_signature`, `signature`, `uploaded_by`) VALUES
(1, 'fdsd', 'dfdfd', 'dfsdfsdf', 'dfdsf', '43.00', '443.00', '343', '43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `expense_claim_form_data_a`
--

CREATE TABLE `expense_claim_form_data_a` (
  `id` int(11) NOT NULL,
  `cur_date` date DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `amount_1` decimal(10,2) DEFAULT NULL,
  `amount_2` decimal(10,2) DEFAULT NULL,
  `expense_claim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_claim_form_data_a`
--

INSERT INTO `expense_claim_form_data_a` (`id`, `cur_date`, `description`, `remarks`, `amount_1`, `amount_2`, `expense_claim_id`) VALUES
(1, '2020-08-05', 'fdsfdsf', 'dfdsfdsf', '43.00', '4343.00', 1),
(2, '2020-08-20', 'ffdsfdf', 'dfdsfdsf', '343.00', '343.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_claim_form_data_b`
--

CREATE TABLE `expense_claim_form_data_b` (
  `id` int(11) NOT NULL,
  `destination_and_purpose_trip` varchar(50) DEFAULT NULL,
  `no_of_km` varchar(50) DEFAULT NULL,
  `parj_and_toll` varchar(50) DEFAULT NULL,
  `account_rm` varchar(50) DEFAULT NULL,
  `misc_rm` varchar(50) DEFAULT NULL,
  `b_fast` decimal(10,2) DEFAULT NULL,
  `lunch` decimal(10,2) DEFAULT NULL,
  `dinner` decimal(10,2) DEFAULT NULL,
  `amount_rm_1` decimal(10,2) DEFAULT NULL,
  `amount_rm_2` decimal(10,2) DEFAULT NULL,
  `explain_claim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_claim_form_data_b`
--

INSERT INTO `expense_claim_form_data_b` (`id`, `destination_and_purpose_trip`, `no_of_km`, `parj_and_toll`, `account_rm`, `misc_rm`, `b_fast`, `lunch`, `dinner`, `amount_rm_1`, `amount_rm_2`, `explain_claim_id`) VALUES
(1, 'dsfdsfdsf', '44', '43', '43', '344', '3343.00', '4.00', '3434.00', '434.00', '34.00', 1),
(2, 'vff', '434', '434', '3434', '434', '343.00', '3434.00', '434.00', '343.00', '43.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `overtime_teaching`
--

CREATE TABLE `overtime_teaching` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `faculty_of` varchar(50) DEFAULT NULL,
  `emp_no` varchar(50) DEFAULT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `total_contact` decimal(10,2) DEFAULT NULL,
  `total_excess_252` decimal(10,2) DEFAULT NULL,
  `diploma_lecture_rate` decimal(10,2) DEFAULT NULL,
  `diploma_tutorial_rate` decimal(10,2) DEFAULT NULL,
  `degree_lecture_rate` decimal(10,2) DEFAULT NULL,
  `degree_tutorial_rate` decimal(10,2) DEFAULT NULL,
  `signature_hod` varchar(50) DEFAULT NULL,
  `signature_dean` varchar(50) DEFAULT NULL,
  `signature_deputy_vc` varchar(50) DEFAULT NULL,
  `added_by` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime_teaching`
--

INSERT INTO `overtime_teaching` (`id`, `name`, `faculty_of`, `emp_no`, `dept_name`, `position`, `semester`, `total_contact`, `total_excess_252`, `diploma_lecture_rate`, `diploma_tutorial_rate`, `degree_lecture_rate`, `degree_tutorial_rate`, `signature_hod`, `signature_dean`, `signature_deputy_vc`, `added_by`) VALUES
(2, 'dff', 'dfdf', '3', 'ok', 'dfsdf', 'three two', '322.00', '433434.00', '33.00', '343.00', '3.00', '434.00', 'erer', 'dfsdf', 'fgfgf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `overtime_teaching_data`
--

CREATE TABLE `overtime_teaching_data` (
  `id` int(11) NOT NULL,
  `added_date` date DEFAULT NULL,
  `cur_day` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `sub_code` varchar(50) DEFAULT NULL,
  `no_of_std` decimal(10,2) DEFAULT NULL,
  `deg_diploma_level` varchar(50) DEFAULT NULL,
  `lecture` decimal(10,2) DEFAULT NULL,
  `tutorial` decimal(10,2) DEFAULT NULL,
  `overtime_teaching_tbl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime_teaching_data`
--

INSERT INTO `overtime_teaching_data` (`id`, `added_date`, `cur_day`, `subject`, `sub_code`, `no_of_std`, `deg_diploma_level`, `lecture`, `tutorial`, `overtime_teaching_tbl_id`) VALUES
(3, '2020-09-09', 'dfdf', 'ddf', 'dsfds', '345.00', 'bfgf', '554.00', '35.00', 2),
(4, '2020-09-16', 'dsfdsf', 'dsfds', 'dfssdf', '34.00', 'ffg', '55.00', '545.00', 2),
(5, '2020-09-09', 'dfdf', 'fsdfs', 'fddsf', '34.00', 'hghh', '55.00', '5454.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `part_time_teaching`
--

CREATE TABLE `part_time_teaching` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `school_of` varchar(50) DEFAULT NULL,
  `month_name` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `lecture_per_hour` decimal(10,2) DEFAULT NULL,
  `tutorial_per_hour` decimal(10,2) DEFAULT NULL,
  `traveling_reimbursement_days` int(11) DEFAULT NULL,
  `signature_hod` varchar(50) DEFAULT NULL,
  `signature_dean` varchar(50) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_by` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_time_teaching`
--

INSERT INTO `part_time_teaching` (`id`, `name`, `school_of`, `month_name`, `department`, `lecture_per_hour`, `tutorial_per_hour`, `traveling_reimbursement_days`, `signature_hod`, `signature_dean`, `added_date`, `added_by`) VALUES
(3, 'fdfdsf', 'dfsdf', 'dfsdsf', 'dfsdsf', '3.00', '3.00', 5, 'dfdsf', 'dfdsfdsf', '2020-09-15', 2),
(4, 'fdsf', 'dfsdsf', 'dfdsf', 'fdsf', '34.00', '34.00', 434, 'erer', 'erre', '2020-09-16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `part_time_teaching_data`
--

CREATE TABLE `part_time_teaching_data` (
  `id` int(11) NOT NULL,
  `added_date` date DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `lectur_hour` int(11) DEFAULT NULL,
  `lecture_type` int(11) DEFAULT NULL,
  `varified_by_hod` varchar(50) DEFAULT NULL,
  `part_time_teaching_tbl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_time_teaching_data`
--

INSERT INTO `part_time_teaching_data` (`id`, `added_date`, `subject`, `lectur_hour`, `lecture_type`, `varified_by_hod`, `part_time_teaching_tbl_id`) VALUES
(6, '2020-09-04', 'dsfdsf', 545, 0, 'yes', 4),
(7, '2020-09-10', 'dsfds', 55, 1, 'yes', 4);

-- --------------------------------------------------------

--
-- Table structure for table `question_paper_form`
--

CREATE TABLE `question_paper_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `emp_no` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `cur_status` varchar(50) DEFAULT NULL,
  `cur_month` varchar(50) DEFAULT NULL,
  `two_hour_script` decimal(10,2) DEFAULT NULL,
  `two_and_half_hour_script` decimal(10,2) DEFAULT NULL,
  `three_hour_script` decimal(10,2) DEFAULT NULL,
  `two_hour_paper` decimal(10,2) DEFAULT NULL,
  `two_and_half_hour_paper` decimal(10,2) DEFAULT NULL,
  `three_hour_paper` decimal(10,2) DEFAULT NULL,
  `signature` varchar(50) DEFAULT NULL,
  `cur_date` date DEFAULT NULL,
  `signature_hod_or_cordinator` varchar(50) DEFAULT NULL,
  `signature_dean_of_school` varchar(50) DEFAULT NULL,
  `signature_head_of_exam_unit` varchar(50) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_paper_form`
--

INSERT INTO `question_paper_form` (`id`, `name`, `school`, `emp_no`, `department`, `cur_status`, `cur_month`, `two_hour_script`, `two_and_half_hour_script`, `three_hour_script`, `two_hour_paper`, `two_and_half_hour_paper`, `three_hour_paper`, `signature`, `cur_date`, `signature_hod_or_cordinator`, `signature_dean_of_school`, `signature_head_of_exam_unit`, `uploaded_by`) VALUES
(1, 'fdfdf', 'dfdfssdf', 'dfdsf', 'dsfdsf', 'dfdsf', 'dfsdf', '3.00', '34.00', '344.00', '4343.00', '47686', '434.00', 'terfsdfdf', '2020-08-20', 'fdfdf', 'dfsdsf', 'dsfsdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question_paper_form_data`
--

CREATE TABLE `question_paper_form_data` (
  `id` int(11) NOT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `duration_of_question` varchar(50) DEFAULT NULL,
  `ans_script_or_question_set_amount` decimal(10,2) DEFAULT NULL,
  `ans_script_or_question_set_amount_type` smallint(6) DEFAULT NULL,
  `question_paper_form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_paper_form_data`
--

INSERT INTO `question_paper_form_data` (`id`, `semester`, `subject`, `duration_of_question`, `ans_script_or_question_set_amount`, `ans_script_or_question_set_amount_type`, `question_paper_form_id`) VALUES
(1, 'fdfsd', 'dfssdf', '32', '3.00', 1, 1),
(2, 'f', 'dfsdf', '34', '34.00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_type` smallint(6) DEFAULT NULL,
  `active_status` tinyint(1) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `active_status`, `pass`) VALUES
(1, 'fuadashraful', 'fuadashraful16@gmail.com', 1, 1, '123456'),
(2, 'anikvai', 'anik@gmail.com', 2, 1, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense_claim`
--
ALTER TABLE `expense_claim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_claim_form_data_a`
--
ALTER TABLE `expense_claim_form_data_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_claim_id` (`expense_claim_id`);

--
-- Indexes for table `expense_claim_form_data_b`
--
ALTER TABLE `expense_claim_form_data_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `explain_claim_id` (`explain_claim_id`);

--
-- Indexes for table `overtime_teaching`
--
ALTER TABLE `overtime_teaching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime_teaching_data`
--
ALTER TABLE `overtime_teaching_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtime_teaching_tbl_id` (`overtime_teaching_tbl_id`);

--
-- Indexes for table `part_time_teaching`
--
ALTER TABLE `part_time_teaching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_time_teaching_data`
--
ALTER TABLE `part_time_teaching_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_time_teaching_tbl_id` (`part_time_teaching_tbl_id`);

--
-- Indexes for table `question_paper_form`
--
ALTER TABLE `question_paper_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_paper_form_data`
--
ALTER TABLE `question_paper_form_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_paper_form_id` (`question_paper_form_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense_claim`
--
ALTER TABLE `expense_claim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_claim_form_data_a`
--
ALTER TABLE `expense_claim_form_data_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_claim_form_data_b`
--
ALTER TABLE `expense_claim_form_data_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `overtime_teaching`
--
ALTER TABLE `overtime_teaching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `overtime_teaching_data`
--
ALTER TABLE `overtime_teaching_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `part_time_teaching`
--
ALTER TABLE `part_time_teaching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `part_time_teaching_data`
--
ALTER TABLE `part_time_teaching_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_paper_form`
--
ALTER TABLE `question_paper_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_paper_form_data`
--
ALTER TABLE `question_paper_form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense_claim_form_data_a`
--
ALTER TABLE `expense_claim_form_data_a`
  ADD CONSTRAINT `expense_claim_form_data_a_ibfk_1` FOREIGN KEY (`expense_claim_id`) REFERENCES `expense_claim` (`id`);

--
-- Constraints for table `expense_claim_form_data_b`
--
ALTER TABLE `expense_claim_form_data_b`
  ADD CONSTRAINT `expense_claim_form_data_b_ibfk_1` FOREIGN KEY (`explain_claim_id`) REFERENCES `expense_claim` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `overtime_teaching_data`
--
ALTER TABLE `overtime_teaching_data`
  ADD CONSTRAINT `overtime_teaching_data_ibfk_1` FOREIGN KEY (`overtime_teaching_tbl_id`) REFERENCES `overtime_teaching` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `part_time_teaching_data`
--
ALTER TABLE `part_time_teaching_data`
  ADD CONSTRAINT `part_time_teaching_data_ibfk_1` FOREIGN KEY (`part_time_teaching_tbl_id`) REFERENCES `part_time_teaching` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_paper_form_data`
--
ALTER TABLE `question_paper_form_data`
  ADD CONSTRAINT `question_paper_form_data_ibfk_1` FOREIGN KEY (`question_paper_form_id`) REFERENCES `question_paper_form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
