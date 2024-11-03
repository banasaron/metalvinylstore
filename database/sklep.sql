-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 12:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--
CREATE DATABASE IF NOT EXISTS `sklep` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sklep`;

-- --------------------------------------------------------

--
-- Table structure for table `login_sessions`
--

CREATE TABLE `login_sessions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `data_sesji` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_sessions`
--

INSERT INTO `login_sessions` (`id`, `id_user`, `login`, `data_sesji`) VALUES
(11, 40, 'nazwa', '2024-10-16 22:00:00'),
(12, 40, 'nazwa', '2024-10-16 22:00:00'),
(13, 40, 'nazwa', '2024-10-16 22:00:00'),
(14, 40, 'nazwa', '0000-00-00 00:00:00'),
(15, 40, 'nazwa', '0000-00-00 00:00:00'),
(16, 40, 'nazwa', '0000-00-00 00:00:00'),
(17, 40, 'nazwa', '2024-10-16 22:00:00'),
(18, 40, 'nazwa', '0000-00-00 00:00:00'),
(19, 40, 'nazwa', '0000-00-00 00:00:00'),
(20, 40, 'nazwa', '2024-10-17 08:06:07'),
(24, 40, 'nazwa', '2024-10-29 08:15:42'),
(26, 42, '123', '2024-10-29 08:48:52'),
(27, 40, 'nazwa', '2024-10-30 10:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_login` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cart` varchar(300) NOT NULL,
  `koszt` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_login`, `date`, `cart`, `koszt`) VALUES
(1, '123', '2024-10-30 22:16:59', 'ID38x2,ID63x3', 0.00),
(5, 'nazwa', '2024-10-30 22:31:17', 'ID41x1, ID39x2, ID18x2, ID57x1', 141.00),
(14, 'nazwa', '2024-10-30 22:36:10', 'ID111x1', 0.00),
(15, 'nazwa', '2024-10-30 22:36:44', 'ID39x1', 20.00),
(16, 'nazwa', '2024-10-30 23:04:41', 'ID63x24', 624.00);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `imie` varchar(40) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `temat` varchar(30) NOT NULL,
  `opis` varchar(300) NOT NULL,
  `data_requestu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(11) DEFAULT NULL,
  `kod_pocztowy` varchar(6) DEFAULT NULL,
  `miejscowosc` varchar(30) DEFAULT NULL,
  `ulica` varchar(30) DEFAULT NULL,
  `nr_domu_lokalu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `imie`, `nazwisko`, `login`, `password`, `email`, `telefon`, `kod_pocztowy`, `miejscowosc`, `ulica`, `nr_domu_lokalu`) VALUES
(31, 'imie', 'nazwisko', 'cos tam cos tam', 'a665a45920422f9d417e4867efdc4f', 'email@chuj.pl', '', NULL, NULL, NULL, NULL),
(37, 'imie', 'nazwisko', 'chuj chu chuj', 'tak', 'xjkaskx@xajnksx.pl', '111-111-111', NULL, NULL, NULL, NULL),
(38, 'aron', 'banas', 'banasaron', '123', 'saxnxkjasnx@asxax.pl', '111', NULL, NULL, NULL, NULL),
(40, 'imie', '321', 'nazwa', '123', 'email@gmail.com', '333333333', '11-111', 'asdasd', 'asdsadsad', '12'),
(42, 'asdasd', 'asdasd', '123', '123', 'asdasd@asdasd.pl', '', '11-111', 'miejscowosccaaa', 'ulicaaaa', '12/34a');

-- --------------------------------------------------------

--
-- Table structure for table `vinyls`
--

CREATE TABLE `vinyls` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(70) NOT NULL,
  `zespol` varchar(20) NOT NULL,
  `rok_wydania` int(4) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vinyls`
--

INSERT INTO `vinyls` (`id`, `nazwa`, `zespol`, `rok_wydania`, `cena`) VALUES
(1, 'demonoir', '1349', 2010, 30.5),
(2, 'massive cauldron of chaos', '1349', 2014, 30.5),
(3, 'slaves', '1349', 2014, 12),
(4, 'the infernal pathway (black)', '1349', 2019, 15.5),
(5, 'the infernal pathway (yellow)', '1349', 2019, 23.5),
(6, 'the wolf and the king (black)', '1349', 2024, 31),
(7, 'the wolf and the king (white)', '1349', 2024, 38),
(18, 'bathory', 'bathory', 1984, 25),
(19, 'destroyer of worlds', 'bathory', 2001, 25),
(20, 'hammerheart', 'bathory', 1990, 25),
(21, 'jubileum vol i', 'bathory', 1992, 25),
(22, 'jubileum vol ii', 'bathory', 1993, 25),
(23, 'jubileum vol iii', 'bathory', 1998, 25),
(24, 'nordland I & II', 'bathory', 2003, 25),
(25, 'nordland i', 'bathory', 2002, 25),
(26, 'nordland ii', 'bathory', 2003, 25),
(27, 'octagon', 'bathory', 1995, 25),
(28, 'requeim', 'bathory', 1994, 25),
(29, 'the return', 'bathory', 1985, 25),
(30, 'twilight of the gods', 'bathory', 1991, 25),
(31, 'under the sign of the black mark', 'bathory', 1987, 25),
(32, 'black sabbath', 'black sabbath', 1970, 30),
(33, 'master of reailty', 'black sabbath', 1971, 30),
(34, 'paranoid', 'black sabbath', 1970, 30),
(35, 'sabotage', 'black sabbath', 1975, 30),
(36, 'technical ecstasy', 'black sabbath', 1976, 30),
(37, 'volume 4', 'black sabbath', 1972, 30),
(38, 'anthology', 'burzum', 2008, 25),
(39, 'aske (black)', 'burzum', 1993, 20),
(40, 'aske (grey)', 'burzum', 1993, 27.5),
(41, 'belus', 'burzum', 2010, 25),
(42, 'burzum (black)', 'burzum', 1992, 20),
(43, 'burzum (grey)', 'burzum', 1992, 27.5),
(44, 'daudi baldrs', 'burzum', 1997, 20),
(45, 'det som engang var', 'burzum', 1993, 20),
(46, 'draugen - rarities', 'burzum', 2005, 30),
(47, 'fallen', 'burzum', 2011, 20),
(48, 'filosofem', 'burzum', 1996, 25),
(49, 'from depths of darkness', 'burzum', 2011, 25),
(50, 'hildskjalf', 'burzum', 1999, 20),
(51, 'hvis lyset tar oss', 'burzum', 1994, 20),
(52, 'sol austan, mani vestan', 'burzum', 2013, 25),
(53, 'the ways of yore', 'burzum', 2014, 25),
(54, 'thulean mysteries', 'burzum', 2020, 30),
(55, 'umskiptar', 'burzum', 2012, 25),
(56, 'chaos horrific', 'cannibal corpse', 2023, 17.5),
(57, 'black shining leather', 'carpathian forest', 2013, 26),
(58, 'morbid fascination of death', 'carpathian forest', 2011, 26),
(59, 'strange old brew', 'carpathian forest', 2013, 13.5),
(60, 'through chasm, caves and titan', 'carpathian forest', 2013, 20.5),
(61, 'the secrets of the black arts', 'dark funeral', 2021, 18.5),
(62, 'vobsicum satanas', 'dark funeral', 2021, 20.5),
(63, 'a blaze in nothern sky', 'darkthrone', 1992, 26),
(64, 'arctic thunder', 'darkthrone', 2016, 26),
(65, 'astral fortress', 'darkthrone', 2022, 26),
(66, 'circle the wagons', 'darkthrone', 2010, 26),
(67, 'dark thrones & black flags', 'darkthrone', 2008, 26),
(68, 'eternal hails', 'darkthrone', 2021, 26),
(69, 'f o a d', 'darkthrone', 2007, 26),
(70, 'goatlord', 'darkthrone', 1996, 26),
(71, 'it beckons us all', 'darkthrone', 2024, 31),
(72, 'old star', 'darkthrone', 2019, 26),
(73, 'plagueweilder', 'darkthrone', 2001, 26),
(74, 'ravishing grimness', 'darkthrone', 1999, 26),
(75, 'sardonic wrath', 'darkthrone', 2004, 26),
(76, 'sempiternal past', 'darkthrone', 2011, 26),
(77, 'soulside journey', 'darkthrone', 1991, 26),
(78, 'transilvanian hunger', 'darkthrone', 1994, 26),
(79, 'under a funeral moon', 'darkthrone', 1993, 26),
(80, 'leprosy', 'death', 1988, 28),
(81, 'live in los angeles', 'death', 2001, 28),
(82, 'spiritual healing', 'death', 1990, 28),
(83, 'scars of the crucifix', 'deicide', 2004, 30),
(84, 'enthrone darkness triumphant (reloaded)', 'dimmu borgir', 2024, 30),
(85, 'northern forces over wacken', 'dimmu borgir', 2024, 40),
(86, 'puritanical euphoric misanthropia', 'dimmu borgir', 2001, 25),
(87, 'puritanical euphoric misanthropia (remixed & remastered)', 'dimmu borgir', 2024, 30),
(88, 'spiritual black dimensions', 'dimmu borgir', 1999, 13.5),
(89, 'stormblast mmv', 'dimmu borgir', 2005, 17),
(90, 'the somberlain', 'dissection', 1993, 40),
(91, 'anthems to the welkin at dusk', 'emperor', 0, 0),
(92, 'emperor-5', 'emperor', 0, 0),
(93, 'emperor', 'emperor', 0, 0),
(94, 'ix equilibrium', 'emperor', 0, 0),
(95, 'at the heart of winter', 'immortal', 0, 0),
(96, 'battels in the north', 'immortal', 0, 0),
(97, 'blizzard beasts', 'immortal', 0, 0),
(98, 'damned in black', 'immortal', 0, 0),
(99, 'diabolical fullmoon mysticism', 'immortal', 0, 0),
(100, 'puer holocaust', 'immortal', 0, 0),
(101, 'a matter od life death (2015 r', 'iron maiden', 0, 0),
(102, 'dance of death (2015 remaster)', 'iron maiden', 0, 0),
(103, 'fear of the dark (2015 remaster)', 'iron maiden', 0, 0),
(104, 'no prayer for the dying', 'iron maiden', 0, 0),
(105, 'powerslave', 'iron maiden', 0, 0),
(106, 'virtual xi (2015 remaster)', 'iron maiden', 0, 0),
(107, 'hostmorke', 'isengard', 0, 0),
(108, 'spectres of gorgoroth', 'isengard', 0, 0),
(109, 'vandreren', 'isengard', 0, 0),
(110, 'varjevndogn', 'isengard', 0, 0),
(111, '38 minutes of life', 'kat', 0, 0),
(112, 'ballady', 'kat', 0, 0),
(113, 'bastard', 'kat', 0, 0),
(114, 'bialo czarna', 'kat', 0, 0),
(115, 'róże miłości najchętniej przyjmują się na grobach', 'kat', 0, 0),
(116, 'szydercze zwierciadło', 'kat', 0, 0),
(117, 'międzyzdroje', 'lady pank', 0, 0),
(118, 'nana', 'lady pank', 0, 0),
(119, 'łowcy głów', 'lady pank', 0, 0),
(120, 'a silhouette in splinters', 'leviathan', 0, 0),
(121, 'howl mockery at the cross', 'leviathan', 0, 0),
(122, 'massive conspiracy against all life', 'leviathan', 0, 0),
(123, 'tentacles of whorrer', 'leviathan', 0, 0),
(124, 'the tenth sub-level of suicide', 'leviathan', 0, 0),
(125, 'dystopia', 'megadeth', 0, 0),
(126, 'endgame', 'megadeth', 0, 0),
(127, 'united abominations', 'megadeth', 0, 0),
(128, 'and justice of all', 'metallica', 0, 0),
(129, 'death magnetic', 'metallica', 0, 0),
(130, 'hardwired to self-destruct', 'metallica', 0, 0),
(131, 'kill em all', 'metallica', 0, 0),
(132, 'load', 'metallica', 0, 0),
(133, 'master of puppets', 'metallica', 0, 0),
(134, 'metallica', 'metallica', 0, 0),
(135, 'reload', 'metallica', 0, 0),
(136, 'ride the lighning', 'metallica', 0, 0),
(137, 'st. anger', 'metallica', 0, 0),
(138, 'destroy your life for satan', 'mutiilation', 0, 0),
(139, 'sorrow galaxies', 'mutiilation', 0, 0),
(140, 'the lost tapes', 'mutiilation', 0, 0),
(141, 'bleach', 'nirvana', 0, 0),
(142, 'from the muddy banks of the wishkah (live)', 'nirvana', 0, 0),
(143, 'nevermind', 'nirvana', 0, 0),
(144, 'unplugged in new york', 'nirvana', 0, 0),
(145, 'hospodi', 'patriarkh', 0, 0),
(146, 'litourgiya', 'patriarkh', 0, 0),
(147, 'maria', 'patriarkh', 0, 0),
(148, 'raskol', 'patriarkh', 0, 0),
(149, 'rammsein', 'rammstein', 0, 0),
(150, 'rosenrot', 'rammstein', 0, 0),
(151, 'sehnsucht', 'rammstein', 0, 0),
(152, 'coat of arms', 'sabaton', 0, 0),
(153, 'the great war', 'sabaton', 0, 0),
(154, 'crust', 'sarcofago', 0, 0),
(155, 'die... hard', 'sarcofago', 0, 0),
(156, 'hate', 'sarcofago', 0, 0),
(157, 'inri', 'sarcofago', 0, 0),
(158, 'rotting', 'sarcofago', 0, 0),
(159, 'the laws of scourge', 'sarcofago', 0, 0),
(160, 'the worst', 'sarcofago', 0, 0),
(161, 'death - pierce me', 'silencer', 0, 0),
(162, '1994 monsters of rock argentina', 'slayer', 0, 0),
(163, 'diabolus in musica', 'slayer', 0, 0),
(164, 'divine intervention', 'slayer', 0, 0),
(165, 'god hates us all', 'slayer', 0, 0),
(166, 'hauting the chapel', 'slayer', 0, 0),
(167, 'hell awaits', 'slayer', 0, 0),
(168, 'live undead', 'slayer', 0, 0),
(169, 'praying to satan', 'slayer', 0, 0),
(170, 'seasons in the abyss', 'slayer', 0, 0),
(171, 'show no mercy', 'slayer', 0, 0),
(172, 'world painted blood', 'slayer', 0, 0),
(173, 'mezmerize', 'system of a down', 0, 0),
(174, 'system of a down', 'system of a down', 0, 0),
(175, 'toxicity', 'system of a down', 0, 0),
(176, 'et hav av avstand', 'taake', 0, 0),
(177, 'kong vinter', 'taake', 0, 0),
(178, 'stridens hus', 'taake', 0, 0),
(179, 'faith', 'the cure', 0, 0),
(180, 'kiss me, kiss me, kiss me', 'the cure', 0, 0),
(181, 'pornography', 'the cure', 0, 0),
(182, 'seventeen seconds', 'the cure', 0, 0),
(183, 'the head on the door', 'the cure', 0, 0),
(184, 'the top', 'the cure', 0, 0),
(185, 'three imaginary boys', 'the cure', 0, 0),
(186, 'in nomine satanas', 'venom', 0, 0),
(187, 'scandinavian assult', 'venom', 0, 0),
(188, 'arntor', 'windir', 0, 0),
(189, 'likferd', 'windir', 0, 0),
(190, 'soknardalr', 'windir', 0, 0),
(191, 'xasthur', 'xasthur', 0, 0),
(192, 'fuck the universe', 'craft', 2005, 0),
(193, 'total soul rape', 'craft', 2000, 0),
(194, 'terror propaganda (second black metal attack)', 'craft', 2002, 0),
(195, 'void', 'craft', 2011, 0),
(196, 'white noise and black metal', 'craft', 2018, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_sessions`
--
ALTER TABLE `login_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`),
  ADD KEY `fk_login` (`login`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `vinyls`
--
ALTER TABLE `vinyls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_sessions`
--
ALTER TABLE `login_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `vinyls`
--
ALTER TABLE `vinyls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_sessions`
--
ALTER TABLE `login_sessions`
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_login`) REFERENCES `user` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
