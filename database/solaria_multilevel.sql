-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 04:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account`
(
    `id`       int(11)      NOT NULL,
    `email`    varchar(255) NOT NULL,
    `username` varchar(10)  NOT NULL,
    `password` varchar(255) NOT NULL,
    `name`     varchar(100) NOT NULL,
    `level`    varchar(255) NOT NULL DEFAULT 'user'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `username`, `password`, `name`, `level`)
VALUES (22, 'yulan@gmail.com', 'yulan', '6d36960121cd9e977cf735df95f48a87', 'yulan', 'user'),
       (23, 'zeus@gmail.com', 'zeus', '098ef03a15eaf14dfe66a596cf0eb510', 'zeus', 'user'),
       (26, 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin`
(
    `id`              int(11)      NOT NULL,
    `email`           varchar(255) NOT NULL,
    `username`        varchar(10)  NOT NULL,
    `password`        varchar(255) NOT NULL,
    `name`            varchar(100) NOT NULL,
    `profile_picture` varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `name`, `profile_picture`)
VALUES (1, 'admin@gmail.com', 'admin', 'admin', 'fatwa@admin', ''),
       (2, 'gg@gmail.com', 'ludacris', '12345678', 'ludacris', '');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi`
(
    `id_subject`  int(11)      NOT NULL,
    `nama_materi` varchar(100) NOT NULL,
    `date`        timestamp    NOT NULL DEFAULT current_timestamp(),
    `description` varchar(255) NOT NULL,
    `file`        varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_subject`, `nama_materi`, `date`, `description`, `file`)
VALUES (24, 'Kimia', '2021-11-26 10:33:24', 'Termo Kimia', 'termokimia_edited.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product`
(
    `id_product`   int(11)               NOT NULL,
    `product_name` varchar(100)          NOT NULL,
    `price`        int(100)              NOT NULL,
    `qty`          int(255)              NOT NULL,
    `description`  varchar(500)          NOT NULL,
    `status`       enum ('true','false') NOT NULL DEFAULT 'true',
    `img`          varchar(255)          NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `price`, `qty`, `description`, `status`, `img`)
VALUES (27, 'Death Star', 70000, 0, 'Prepare for war!!!!', 'false', '12405.jpg'),
       (28, '[First Order] Tie Fighter\r\n\r\n', 1000, 0,
        'A product of Sienar-Jaemus Fleet Systems, the TIE/fo carried the appearance of its predecessor, the TIE/ln space superiority starfighter, though it featured internal advancements that provided it with greater defensive capabilities.',
        'false', '2888034-middle.png'),
       (30, 'Millennium Falcon', 99999, 0,
        'The Millennium Falcon, originally designated YT 492727ZED and formerly known as the Stellar Envoy, was a Corellian YT-1300f light freighter most famously used by the smugglers Han Solo and Chewbacca, during and following the Galactic Civil War.',
        'false', 'star-wars-millennium-falcon-11562863034ii1e8arwof.png'),
       (32, 'Mars', 564112, 0, 'Red planet', 'false', 'mars.png'),
       (35, 'X-wing', 564112, 2, 'Best Plane', 'true', 'x-wing.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail`
(
    `id_product_detail` int(11)   NOT NULL,
    `id_product`        int(11)   NOT NULL,
    `id`                int(11)   NOT NULL,
    `buy_qty`           int(11)   NOT NULL,
    `transaction_date`  timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id_product_detail`, `id_product`, `id`, `buy_qty`, `transaction_date`)
VALUES (7, 28, 22, 100, '2021-11-28 11:30:29'),
       (8, 30, 22, 1, '2021-11-28 11:30:29'),
       (9, 32, 22, 1, '2021-11-28 11:30:29'),
       (10, 33, 22, 1, '2021-11-28 11:30:29'),
       (12, 34, 22, 3, '2021-11-28 11:30:29'),
       (19, 35, 22, 1, '2021-11-28 11:42:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `email` (`email`, `username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
    ADD PRIMARY KEY (`id_subject`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
    ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
    ADD PRIMARY KEY (`id_product_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 27;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
    MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
    MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 36;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
    MODIFY `id_product_detail` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
