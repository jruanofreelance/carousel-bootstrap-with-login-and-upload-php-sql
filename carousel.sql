SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `admins` (
  `adminsId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admins` (`adminsId`, `email`, `password`, `name`, `image`) VALUES
(1, 'myemail@gmail.com', '1234', 'jruano', 'jruano.jpg');

CREATE TABLE `slider` (
  `slideId` int(11) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `slider` (`slideId`, `image`) VALUES
(1, 'slide-01.jpg'),
(2, 'slide-02.jpg'),
(3, 'slide-03.jpg');

ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminsId`);

ALTER TABLE `slider`
  ADD PRIMARY KEY (`slideId`);

ALTER TABLE `slider`
  MODIFY `slideId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
