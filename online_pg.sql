-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 10:42 AM
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
-- Database: `online_pg`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_pg`
--

CREATE TABLE `add_pg` (
  `pg_id` int(11) NOT NULL,
  `pg_name` varchar(50) NOT NULL,
  `pg_address` varchar(100) NOT NULL,
  `pg_state` varchar(20) NOT NULL,
  `pg_district` varchar(20) NOT NULL,
  `pg_city` varchar(20) NOT NULL,
  `pg_img` varchar(150) NOT NULL,
  `pg_vid` varchar(150) NOT NULL,
  `pg_price` int(11) NOT NULL,
  `pg_description` varchar(500) NOT NULL,
  `pg_owner` int(11) NOT NULL,
  `pg_bedroom` varchar(10) NOT NULL,
  `pg_bathroom` varchar(10) NOT NULL,
  `pg_kitchen` varchar(10) NOT NULL,
  `pg_furnishing` varchar(30) NOT NULL,
  `pg_parking` varchar(10) NOT NULL,
  `pg_wifi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_pg`
--

INSERT INTO `add_pg` (`pg_id`, `pg_name`, `pg_address`, `pg_state`, `pg_district`, `pg_city`, `pg_img`, `pg_vid`, `pg_price`, `pg_description`, `pg_owner`, `pg_bedroom`, `pg_bathroom`, `pg_kitchen`, `pg_furnishing`, `pg_parking`, `pg_wifi`) VALUES
(1, 'Emerald Terrace', 'Perambalur(PO),Tamil Nadu,686624', 'Tamil Nadu', 'Perambalur', 'Perambalur', 'room1.jpg', 'vid3.mp4', 15000, 'Comfortable and convenient PG accommodation in a prime location. Ideal for students and working professionals.', 3, '1', '1', 'no', 'Furnished', 'no', 'yes'),
(2, 'Sunset Villas', 'Manjeri(PO),Malappuram,453324\n ', 'Kerala', 'Malappuram', 'Manjeri', 'room-2.jpg', 'vid4.mp4', 20000, 'Affordable and comfortable PG accommodation in a great location. Perfect for students and professionals.', 4, '2', '2', 'no', 'Unfurnished', 'yes', 'no'),
(3, 'Parkside Manor', 'Vadakara(PO),Kozhikode,678854', 'Kerala', 'Kozhikode', 'Vadakara', 'room-3.jpg', 'vid5.mp4', 14350, 'Convenient and cozy PG accommodation available for students and professionals. Located in a safe and accessible area.', 3, '2', '2', 'yes', 'Unfurnished', 'no', 'no'),
(4, 'Brookstone Apartments', 'Chennai,Tamil Nadu,453321', 'Tamil Nadu', 'Chennai', 'Chennai', 'room-4.jpg', 'vid6.mp4', 10000, 'Well-located and spacious PG accommodation ideal for students and working professionals.', 3, '3', '1', 'yes', 'Furnished', 'yes', 'yes'),
(5, 'Garden Gate Residences', 'Muvattupuzha(PO),Mvattupuzha,345562', 'Kerala', 'Ernakulam', 'Muvattupuzha', 'room-5.jpg', 'vid7.mp4', 14350, 'Convienient,comfortable and Affortable PG accomation', 3, '2', '1', 'yes', 'Semi-Furnished', 'no', 'no'),
(6, 'Ahalya Apartment', 'Near Nirmala College Muvattupuzha,\r\nMuvattupuzha (PO),\r\nMuvattupuzha ', 'Kerala', 'Ernakulam', 'Muvattupuzha', 'services-2.jpg', 'vid7.mp4', 30000, 'Peaceful apartment with more rooms and more facilities....', 7, '2', '3', 'yes', 'Semi-Furnished', 'yes', 'no'),
(7, 'Manjapra Residency', 'Manjapra P.O,Manjapra,Angamaly\r\n683581', 'Kerala', 'Ernakulam', 'Kochi', 'room7.jpg', 'vid5.mp4', 14550, 'This PG for rent offers a comfortable and functional space within a larger residence, perfect for individuals seeking temporary or long-term accommodation.', 8, '1', '3', 'yes', 'Semi-Furnished', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `add_room`
--

CREATE TABLE `add_room` (
  `room_no` int(20) NOT NULL,
  `room_sell` varchar(20) NOT NULL,
  `manage` varchar(20) NOT NULL,
  `manage_name` varchar(20) NOT NULL,
  `manage_no` varchar(20) NOT NULL,
  `room_address` varchar(100) NOT NULL,
  `room_state` varchar(50) NOT NULL,
  `room_district` varchar(50) NOT NULL,
  `room_city` varchar(20) NOT NULL,
  `room_description` varchar(100) NOT NULL,
  `room_bed` varchar(20) NOT NULL,
  `room_img` varchar(150) NOT NULL,
  `room_vid` varchar(150) NOT NULL,
  `room_price` int(20) NOT NULL,
  `room_bathroom` varchar(20) NOT NULL,
  `room_kitchen` varchar(20) NOT NULL,
  `room_furnishing` varchar(20) NOT NULL,
  `room_wifi` varchar(20) NOT NULL,
  `room_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_room`
--

INSERT INTO `add_room` (`room_no`, `room_sell`, `manage`, `manage_name`, `manage_no`, `room_address`, `room_state`, `room_district`, `room_city`, `room_description`, `room_bed`, `room_img`, `room_vid`, `room_price`, `room_bathroom`, `room_kitchen`, `room_furnishing`, `room_wifi`, `room_owner`) VALUES
(112, 'bed-wise', '', '', '', 'Kotarakara Chapel Pady\nKotarakara(PO)\nErnakulam,\n623345', 'Kerala', 'Ernakulam', 'Kochi', 'A VERY BEAUTIFUL ROOM WITH COOKING FACILITIES FREE WIFI etc.....', '4', 'room-6.jpg', 'vid4.mp4', 5400, 'Not Attached', 'yes', 'Unfurnished', 'yes', 7),
(116, 'room-wise', 'other', 'Dona Thankachan', '1234567890', 'Kothamangalam P.O,Ernakulam', 'Kerala', 'Ernakulam', 'Kothamangalam', 'A VERY BEAUTIFUL ROOM WITH NEEDED FACILITIES.........', '3', 'room7.jpg', 'vid2.mp4', 3500, 'Attached', 'yes', 'Furnished', 'yes', 3),
(234, 'room-wise', '', '', '', 'Near Valipalli Kothamangalam,\nKothamangalam (PO),Kothamangalam,345562', 'Kerala', 'Ernakulam', 'Kothamangalam', 'A VERY BEAUTIFUL ROOM WITH NEEDED FACILITIES.......', '3', 'room-4.jpg', 'vid3.mp4', 6700, 'Attached', 'yes', 'Unfurnished', 'yes', 7),
(304, 'bed-wise', '', '', '', 'Alappuzha(PO),Alapuzha,234415', 'Kerala', 'Alappuzha', 'Alappuzha', 'SPACIOUS AND WELL-MAINTAINED ROOM AVAILABLE FOR RENT IN A PRIME LOCATION.', '2', 'room-1.jpg', 'vid1', 3200, 'Attached', 'yes', 'Furnished', 'yes', 3),
(312, '', '', '', '', 'Malappuram(PO),Malappuram,564432 ', 'Kerala', 'Malappuram', 'Malappuram', 'WELL-FURNISHED AND COMFORTABLE ROOM AVAILABLE IN A CONVENIENT LOCATION.', '3', 'room-2.jpg', 'vid2.mp4', 2445, 'Attached', 'yes', 'Semi-Furnished', 'yes', 3);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `type` varchar(10) NOT NULL,
  `join_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `stay` int(20) NOT NULL,
  `book_id` int(10) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `book_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`type`, `join_date`, `due_date`, `stay`, `book_id`, `cus_id`, `room_id`, `book_status`) VALUES
('room', '2024-08-29', NULL, 5, 1, 2, 116, 'Booked with cash'),
('room', '2024-08-31', NULL, 2, 2, 2, 234, 'Rejected'),
('room', '2024-09-02', '1970-03-01', 2, 3, 2, 304, 'Rejected'),
('room', '2024-09-04', '1970-04-01', 2, 4, 2, 304, 'Booked with Online Payment'),
('room', '2024-09-04', '2024-12-04', 3, 5, 2, 304, 'Booked with cash'),
('house', '2024-09-04', '2024-11-04', 2, 6, 2, 5, 'Booked with Online Payment'),
('house', '2024-09-30', '2024-10-30', 1, 7, 2, 6, 'Approved'),
('house', '2024-09-18', '2025-01-18', 4, 8, 5, 7, 'Rejected'),
('house', '2024-09-22', '2024-10-22', 1, 9, 2, 7, 'Booked with Online Payment'),
('house', '2024-09-23', '2024-10-23', 1, 10, 2, 5, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `reg_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `aadhar` varchar(12) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `login_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`reg_id`, `fname`, `email`, `phno`, `aadhar`, `gender`, `login_id`) VALUES
(1, 'BINJU RAGHAVAN', 'binju123@gmail.com', '1234567895', '123456789012', 'female', 2),
(2, 'Merin Mary Biju', 'merin12@gmail.com', '1234567899', '0', '', 5),
(3, 'Edwin Raju', 'edwin1@gmail.com', '1234567890', '0', '', 9),
(4, 'Sangeeth KS', 'sangeeth123@gmail.com', '1234567891', '0', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cus_password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `login_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `cus_password`, `user_type`, `login_status`) VALUES
(1, 'admin', 'admin', 'admin', '1'),
(2, 'binju123@gmail.com', 'qwerty', 'customer', '1'),
(3, 'san7@gmail.com', 'qwerty', 'owner', '1'),
(4, 'merin87@gmail.com', 'merin345', 'owner', '1'),
(5, 'merin12@gmail.com', 'merin12', 'customer', '1'),
(6, 'dona@gmail.com', 'dona678', 'owner', '0'),
(7, 'mahi@gmail.com', 'mahi123', 'owner', '1'),
(8, 'ebis123@gmail.com', 'qwerty', 'owner', '1'),
(9, 'edwin1@gmail.com', 'qwerty', 'customer', '1'),
(10, 'sangeeth123@gmail.com', 'qwerty', 'customer', '1'),
(11, 'sangeeth123@gmail.com', 'qwerty', 'customer', '1'),
(12, 'dona@gmail.com', '12345', 'owner', '0');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `reg_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `owner_address` varchar(100) NOT NULL,
  `id_proof` varchar(150) NOT NULL,
  `owner_state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `login_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`reg_id`, `fname`, `phno`, `email`, `owner_address`, `id_proof`, `owner_state`, `district`, `city`, `login_id`) VALUES
(1, 'Sangeeth ks', '8069898307', 'san7@gmail.com', 'Tharamattam(H),Kothamamangalam(PO),Kothamangalam', 'id4.webp', 'Kerala', 'Ernakulam', 'Kothamangalam', 3),
(2, 'merin mary', '1234567899', 'merin87@gmail.com', 'Vazhakalayil(H),Coonoor(PO),Coonoor', 'id3.jpg', 'Tamil Nadu', 'Nilgiris', 'Coonoor', 4),
(3, 'dona thankachan', '0806989835', 'dona@gmail.com', 'Palatty(H),Wayanad(PO),Wayanad', 'id2.jpg', 'Kerala', 'Wayanad', 'Kalpetta', 6),
(4, 'Mahindra Rao', '9876534512', 'mahi@gmail.com', 'Thottarakara(H)\r\nKottarakara(PO)\r\nErnakulam ', 'id1.png', 'Kerala', 'Kottayam', 'Kottayam', 7),
(5, 'Ebison biju', '1234567890', 'ebis123@gmail.com', 'Nettikkadan(H),Manjapra P.O,Angamaly\r\n683581', 'id4.webp', 'Kerala', 'Ernakulam', 'Kochi', 8),
(6, 'dona', '1234567789', 'dona@gmail.com', 'qwertyuiopasdfgh\r\nsdfghjk\r\nsdfghjk', 'id4.webp', 'Kerala', 'Kottayam', 'Vaikom', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_pg`
--
ALTER TABLE `add_pg`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `add_room`
--
ALTER TABLE `add_room`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `login_id` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_pg`
--
ALTER TABLE `add_pg`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `reg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `reg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
