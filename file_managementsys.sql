-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 10:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_managementsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `admin_user` text NOT NULL,
  `admin_password` text NOT NULL,
  `admin_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `admin_user`, `admin_password`, `admin_status`) VALUES
(15, 'admin', 'admin@gmail.com', '$2y$12$4BsIl4qwetbeAxFOCfK6Yeuqdk8rOWX1HasLDmnwyomwqa1byhqvy', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `folder_content`
--

CREATE TABLE `folder_content` (
  `fol_id` int(11) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `emp_status` varchar(255) NOT NULL,
  `date_created` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folder_content1`
--

CREATE TABLE `folder_content1` (
  `fol_id` int(11) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `emp_status` varchar(255) NOT NULL,
  `date_created` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder_content1`
--

INSERT INTO `folder_content1` (`fol_id`, `file_path`, `full_name`, `emp_status`, `date_created`) VALUES
(1, '../uploads1/nario_folder/', 'Nario Luis', 'Employee', '2022-03-15 15:13:31'),
(2, '../uploads1/nel_main/', 'Nario Luis', 'Employee', '2022-03-15 15:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email_address` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `id`, `email_address`, `action`, `actions`, `ip`, `host`, `login_time`, `logout_time`) VALUES
(0, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'Mar-15-2022 03:13 PM', 'May-20-2022 01:53 AM'),
(0, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-19-2022 02:03 AM', 'May-20-2022 01:53 AM'),
(0, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-19-2022 09:36 PM', 'May-20-2022 01:53 AM'),
(0, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-19-2022 09:39 PM', 'May-20-2022 01:53 AM'),
(0, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-19-2022 11:55 PM', 'May-20-2022 01:53 AM'),
(0, 1, 'toledojonel557@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 01:52 AM', 'May-20-2022 01:53 AM'),
(0, 11, 'obalmariacecilia@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 03:25 AM', 'May-20-2022 02:24 PM'),
(0, 11, 'obalmariacecilia@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 02:19 PM', 'May-20-2022 02:24 PM'),
(0, 11, 'obalmariacecilia@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 02:20 PM', 'May-20-2022 02:24 PM'),
(0, 14, 'obalmariacecilia15@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 02:57 PM', 'May-20-2022 03:01 PM'),
(0, 14, 'obalmariacecilia15@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 03:00 PM', 'May-20-2022 03:01 PM'),
(0, 11, 'obalmariacecilia@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 03:56 PM', ''),
(0, 11, 'obalmariacecilia@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 03:58 PM', ''),
(0, 16, 'obalmariacecilia15@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 04:09 PM', ''),
(0, 11, 'obalmariacecilia@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-20-2022 04:12 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `history_log1`
--

CREATE TABLE `history_log1` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `admin_user` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log1`
--

INSERT INTO `history_log1` (`log_id`, `id`, `admin_user`, `action`, `actions`, `ip`, `host`, `login_time`, `logout_time`) VALUES
(0, 15, 'admin@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'Mar-15-2022 03:11 PM', 'Mar-15-2022 03:12 PM'),
(0, 15, 'admin@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-19-2022 02:06 AM', ''),
(0, 15, 'admin@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-19-2022 09:38 PM', ''),
(0, 15, 'admin@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-RFP03T6H', 'May-19-2022 11:02 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `user_profile` text CHARACTER SET utf8 NOT NULL,
  `name` text NOT NULL,
  `user_position` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `email_address` text NOT NULL,
  `user_password` text NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `user_profile`, `name`, `user_position`, `user_contact`, `user_address`, `email_address`, `user_password`, `user_status`, `code`) VALUES
(1, '../image_upload/202203151647328367_anduin.png', 'nario luis', 'encoder', '09876867878', 'francisville', 'toledojonel557@gmail.com', '$2y$12$4e9AaOAAgJRkGeR3DM1sDultkp9xvSFxbz/ANW5lOfCgZh7WDlqyK', 'Employee', ''),
(2, 'image_upload/202205191652984331_', 'michael deompoc', 'driver', '09876867878', 'mambugan antipolo  city', 'michael@gmail.com', '$2y$12$X7J0hKt3Tiib7huSo9SeOOoJcrCVEJjRZvIaOqpq4grcuIr3M0Rs2', 'Employee', ''),
(11, 'image_upload/202205191652988326_ball.jpeg', 'maria ceclilia toledo', 'accountancy', '09876867878', 'san mateo rizal', 'obalmariacecilia@gmail.com', '$2y$10$pz645sZ2S5gDuwGZX6PUquhno/d7dPKHiljYf78XyEiEkSUmloO.W', 'Employee', ''),
(16, 'image_upload/202205201653031932_251156859_2092237270952579_3467619070059051588_n.jpg', 'maria obal', 'accountancy', '09797897898', 'san mateo', 'obalmariacecilia15@gmail.com', '$2y$10$T81ep07I4lgd7rJODgVJw.PvVazdgyrz47cx.VAjUF5k7Y02tp.sC', 'Employee', '');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trash1`
--

CREATE TABLE `trash1` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trash2`
--

CREATE TABLE `trash2` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trash_admin`
--

CREATE TABLE `trash_admin` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trash_admin1`
--

CREATE TABLE `trash_admin1` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trash_admin2`
--

CREATE TABLE `trash_admin2` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_adminfiles`
--

CREATE TABLE `upload_adminfiles` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_adminfiles1`
--

CREATE TABLE `upload_adminfiles1` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_adminfiles2`
--

CREATE TABLE `upload_adminfiles2` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE `upload_files` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(300) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `COMMENT` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_files`
--

INSERT INTO `upload_files` (`ID`, `NAME`, `SIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `EMAIL`, `FOLDERSELECT`, `VARIABLE`, `COMMENT`, `TYPE`, `LOGIN_ID`) VALUES
(1, '2021 BALMART BALANCE SHEET.xlsx', '33111', '0', 'Mar-15-2022 03:14 PM', 'Employee', 'Nario Luis', '../uploads1/../uploads1/nario_folder/2021 BALMART BALANCE SHEET.xlsx', '../uploads1/nario_folder/', 'nice one', 'file', '1'),
(2, '../uploads1/nario_folder/', '0', '0', 'Mar-15-2022 03:19 PM', 'Employee', 'Nario Luis', '', '../uploads1/nario_folder//nario_sub/', '', 'folder', '1'),
(3, '../uploads1/nel_main/', '0', '0', 'May-20-2022 12:19 AM', 'Employee', 'Nario Luis', '', '../uploads1/nel_main//ne_sub/', '', 'folder', '2'),
(4, 'ORASYSTEM-Student (1).docx', '412272', '0', 'May-20-2022 12:21 AM', 'Employee', 'Nario Luis', '../uploads1/../uploads1/nel_main/ORASYSTEM-Student (1).docx', '../uploads1/nel_main/', 'hi nel', 'file', '2');

-- --------------------------------------------------------

--
-- Table structure for table `upload_files1`
--

CREATE TABLE `upload_files1` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `COMMENT` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_files1`
--

INSERT INTO `upload_files1` (`ID`, `NAME`, `SIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `EMAIL`, `FOLDERSELECT`, `VARIABLE`, `COMMENT`, `TYPE`, `LOGIN_ID`, `GET_ID`) VALUES
(1, 'deadline govt contri. 2021.docx', '1387966', '0', '2022-03-15 15:19:24', 'Employee', 'Nario Luis', '', '../uploads1/nario_folder//nario_sub/', 'my comment', 'sub_file1', 'sub_2', 2),
(2, '../uploads1/nario_folder//nario_sub/', '0', '0', 'Mar-15-2022 03:19 PM', 'Employee', 'Nario Luis', '', '../uploads1/nario_folder//nario_sub//sub_3/', '', 'folder', 'sub_2', 2),
(3, 'Access-Control-Software.docx', '301826', '0', '2022-05-20 00:20:12', 'Employee', 'Nario Luis', '', '../uploads1/nel_main//ne_sub/', '', 'sub_file1', 'sub_3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `upload_files2`
--

CREATE TABLE `upload_files2` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FOLDERSELECT` varchar(200) NOT NULL,
  `VARIABLE` text NOT NULL,
  `COMMENT` text NOT NULL,
  `TYPE` text NOT NULL,
  `LOGIN_ID` text NOT NULL,
  `GET_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_files2`
--

INSERT INTO `upload_files2` (`ID`, `NAME`, `SIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `EMAIL`, `FOLDERSELECT`, `VARIABLE`, `COMMENT`, `TYPE`, `LOGIN_ID`, `GET_ID`) VALUES
(1, 'Wireframe (1).docx', '6341516', '0', '2022-05-20 00:23:05', 'Employee', 'Nario Luis', '', '../uploads1/nario_folder//nario_sub//sub_3/', 'ok salamat', 'sub_file2', 'sub_2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder_content`
--
ALTER TABLE `folder_content`
  ADD PRIMARY KEY (`fol_id`);

--
-- Indexes for table `folder_content1`
--
ALTER TABLE `folder_content1`
  ADD PRIMARY KEY (`fol_id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trash1`
--
ALTER TABLE `trash1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trash2`
--
ALTER TABLE `trash2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trash_admin`
--
ALTER TABLE `trash_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trash_admin1`
--
ALTER TABLE `trash_admin1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trash_admin2`
--
ALTER TABLE `trash_admin2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_adminfiles`
--
ALTER TABLE `upload_adminfiles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_adminfiles1`
--
ALTER TABLE `upload_adminfiles1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_adminfiles2`
--
ALTER TABLE `upload_adminfiles2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_files1`
--
ALTER TABLE `upload_files1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_files2`
--
ALTER TABLE `upload_files2`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `folder_content`
--
ALTER TABLE `folder_content`
  MODIFY `fol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folder_content1`
--
ALTER TABLE `folder_content1`
  MODIFY `fol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trash1`
--
ALTER TABLE `trash1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trash2`
--
ALTER TABLE `trash2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trash_admin`
--
ALTER TABLE `trash_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trash_admin1`
--
ALTER TABLE `trash_admin1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trash_admin2`
--
ALTER TABLE `trash_admin2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upload_adminfiles`
--
ALTER TABLE `upload_adminfiles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_adminfiles1`
--
ALTER TABLE `upload_adminfiles1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_adminfiles2`
--
ALTER TABLE `upload_adminfiles2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upload_files1`
--
ALTER TABLE `upload_files1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upload_files2`
--
ALTER TABLE `upload_files2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
