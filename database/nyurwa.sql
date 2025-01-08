-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 03:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyurwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `interest` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `defects`
--

CREATE TABLE `defects` (
  `id` int(11) NOT NULL,
  `rawmaterialid` int(11) NOT NULL,
  `rawmaterial` varchar(200) NOT NULL,
  `quantity` float NOT NULL,
  `sprice` float NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defects`
--

INSERT INTO `defects` (`id`, `rawmaterialid`, `rawmaterial`, `quantity`, `sprice`, `amount`, `date`, `user`) VALUES
(7, 0, 'Chicks broilers', 3, 3500, 10500, '2025-01-05', 'mucyo'),
(8, 0, 'chicks layers', 12, 12000, 144000, '2025-01-05', 'mucyo');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `rawItem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `rawItem`) VALUES
(1, 'Salaries'),
(2, 'Water'),
(3, 'Electricity');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_register`
--

CREATE TABLE `expenses_register` (
  `id` int(11) NOT NULL,
  `expense` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses_register`
--

INSERT INTO `expenses_register` (`id`, `expense`, `amount`, `date`, `user`) VALUES
(1, 'Salaries', 250000, '2025-01-05', 'mucyo'),
(2, 'Water', 4500, '2025-01-05', 'mucyo');

-- --------------------------------------------------------

--
-- Table structure for table `finalproducts`
--

CREATE TABLE `finalproducts` (
  `id` int(11) NOT NULL,
  `rawItem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `tin` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `otherincomes`
--

CREATE TABLE `otherincomes` (
  `id` int(11) NOT NULL,
  `income` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otherincomes`
--

INSERT INTO `otherincomes` (`id`, `income`, `amount`, `date`, `user`) VALUES
(1, 'fgfd', 120, '2025-01-05', 'Narame1');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `finalproduct` varchar(100) NOT NULL,
  `package` varchar(200) NOT NULL,
  `pprice` float NOT NULL,
  `sprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packagesentry`
--

CREATE TABLE `packagesentry` (
  `id` int(11) NOT NULL,
  `finalproductid` int(11) NOT NULL,
  `package` varchar(200) NOT NULL,
  `quantity` float NOT NULL,
  `date` date NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packagesexit`
--

CREATE TABLE `packagesexit` (
  `id` int(11) NOT NULL,
  `finalproductid` int(11) NOT NULL,
  `package` varchar(200) NOT NULL,
  `quantity` float NOT NULL,
  `sprice` float NOT NULL,
  `total` float NOT NULL,
  `date` date NOT NULL,
  `customer` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packagesstock`
--

CREATE TABLE `packagesstock` (
  `id` int(11) NOT NULL,
  `finalproductid` int(11) NOT NULL,
  `package` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `sprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `pprice` float NOT NULL,
  `sprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `item`, `pprice`, `sprice`) VALUES
(1, 'Chicks broilers', 1200, 3000),
(2, 'chicks layers', 1850, 30000),
(3, 'Crumbs', 40000, 0),
(4, 'Layer starter', 38000, 0),
(5, 'Layer Mash', 3700, 0),
(6, 'Pellets', 38000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterialentry`
--

CREATE TABLE `rawmaterialentry` (
  `id` int(11) NOT NULL,
  `rawmaterialid` int(11) NOT NULL,
  `rawmaterial` varchar(200) NOT NULL,
  `quantity` float NOT NULL,
  `sprice` float NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawmaterialentry`
--

INSERT INTO `rawmaterialentry` (`id`, `rawmaterialid`, `rawmaterial`, `quantity`, `sprice`, `amount`, `date`, `user`) VALUES
(1, 0, 'Chicks broilers', 1200, 0, 0, '2024-12-30', 'Narame1'),
(2, 0, 'chicks layers', 1752, 0, 0, '2024-12-30', 'Narame1'),
(3, 0, 'Layer Mash', 20, 0, 0, '2024-12-30', 'Narame1'),
(4, 0, 'Crumbs', 20, 0, 0, '2024-12-30', 'Narame1'),
(5, 0, 'Pellets', 20, 100, 2000, '2024-12-30', 'Narame1'),
(6, 0, 'chicks layers', 120, 500, 60000, '2025-01-05', 'Narame1'),
(7, 0, 'Crumbs', 70, 1300, 91000, '2025-01-05', 'Narame1'),
(10, 0, 'Chicks broilers', 120, 500, 60000, '2025-01-05', 'mucyo'),
(13, 0, 'Chicks broilers', 80, 0, 0, '2025-01-06', 'mucyo');

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterialexit`
--

CREATE TABLE `rawmaterialexit` (
  `id` int(11) NOT NULL,
  `rawmaterialid` int(11) NOT NULL,
  `rawmaterial` varchar(200) NOT NULL,
  `quantity` float NOT NULL,
  `sprice` float NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawmaterialexit`
--

INSERT INTO `rawmaterialexit` (`id`, `rawmaterialid`, `rawmaterial`, `quantity`, `sprice`, `amount`, `date`, `user`, `status`) VALUES
(1, 0, 'Chicks broilers', 500, 0, 0, '2024-12-30', 'Narame1', 'Pending'),
(2, 0, 'Crumbs', 12, 0, 0, '2024-12-30', 'Narame1', 'Pending'),
(3, 0, 'Pellets', 8, 0, 0, '2024-12-30', 'Narame1', 'Pending'),
(4, 0, 'Chicks broilers', 3, 0, 0, '2025-01-05', 'Narame1', 'Pending'),
(5, 0, 'Chicks broilers', 77, 500, 38500, '2025-01-05', 'Narame1', 'Pending'),
(9, 0, 'chicks layers', 10, 0, 0, '2025-01-06', 'mucyo', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterials`
--

CREATE TABLE `rawmaterials` (
  `id` int(11) NOT NULL,
  `rawItem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawmaterials`
--

INSERT INTO `rawmaterials` (`id`, `rawItem`) VALUES
(1, 'Chicks broilers'),
(2, 'chicks layers'),
(3, 'Pellets'),
(4, 'Crumbs'),
(5, 'Layer Mash'),
(6, 'Layer starter');

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterialstock`
--

CREATE TABLE `rawmaterialstock` (
  `id` int(11) NOT NULL,
  `materialid` int(11) NOT NULL,
  `rawmaterial` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawmaterialstock`
--

INSERT INTO `rawmaterialstock` (`id`, `materialid`, `rawmaterial`, `qty`) VALUES
(1, 0, 'Chicks broilers', 824),
(2, 0, 'chicks layers', 1865),
(3, 0, 'Layer Mash', 20),
(4, 0, 'Crumbs', 101),
(5, 0, 'Pellets', 12);

-- --------------------------------------------------------

--
-- Table structure for table `saving`
--

CREATE TABLE `saving` (
  `id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `date` date NOT NULL,
  `saving` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `names` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `names`, `category`) VALUES
(8, 'bm', '123', 'BIZIMANA Mathias', 'Accountant'),
(12, 'Muhawe', 'Ernestine', 'MUHAWENIMANA ERNESTINE', 'Human resource'),
(13, 'Narame1', 'IYAMUREMYE', 'NARAME Emerthe', 'Managing director'),
(14, 'adam', '$2y$10$oD4Y7na2BdD3dNQqg2JB1.8r0cZm6Pwp6xF.atShehlzMgyczA4ri', 'adam', 'Managing director'),
(16, 'albine', '$2y$10$XJRU6ndREsG3WnkvFcE4pOXD2ro2rhgN/VlCgsXM7paV.4umkUiDC', 'kundwa mucyo albine', 'Managing director'),
(17, 'mucyo', '$2y$10$Ta97T8lynXkUvgWWSUtnNe.dWmo1BR0JzDq.ReL0WoZ/Td0DtLVVa', 'mucyo', 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defects`
--
ALTER TABLE `defects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_register`
--
ALTER TABLE `expenses_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalproducts`
--
ALTER TABLE `finalproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherincomes`
--
ALTER TABLE `otherincomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagesentry`
--
ALTER TABLE `packagesentry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagesexit`
--
ALTER TABLE `packagesexit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagesstock`
--
ALTER TABLE `packagesstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterialentry`
--
ALTER TABLE `rawmaterialentry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterialexit`
--
ALTER TABLE `rawmaterialexit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterials`
--
ALTER TABLE `rawmaterials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterialstock`
--
ALTER TABLE `rawmaterialstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving`
--
ALTER TABLE `saving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `defects`
--
ALTER TABLE `defects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses_register`
--
ALTER TABLE `expenses_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finalproducts`
--
ALTER TABLE `finalproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otherincomes`
--
ALTER TABLE `otherincomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packagesentry`
--
ALTER TABLE `packagesentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packagesexit`
--
ALTER TABLE `packagesexit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packagesstock`
--
ALTER TABLE `packagesstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rawmaterialentry`
--
ALTER TABLE `rawmaterialentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rawmaterialexit`
--
ALTER TABLE `rawmaterialexit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rawmaterials`
--
ALTER TABLE `rawmaterials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rawmaterialstock`
--
ALTER TABLE `rawmaterialstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saving`
--
ALTER TABLE `saving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
