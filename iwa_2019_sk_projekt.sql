-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 10:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwa_2019_sk_projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(10) NOT NULL,
  `tip_id` int(10) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `slika` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `tip_id`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `email`, `slika`) VALUES
(1, 0, 'admin', 'foi', 'Administrator', 'Admin', 'admin@foi.hr', 'korisnici/admin.jpg'),
(2, 1, 'voditelj', '123456', 'voditelj', 'Vodi', 'voditelj@foi.hr', 'korisnici/admin.jpg'),
(3, 1, 'kos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 'korisnici/pkos.jpg'),
(4, 1, 'vzecc', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 'korisnici/vzec.jpg'),
(5, 2, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 'korisnici/qtarantino.jpg'),
(6, 2, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 'korisnici/mbellucci.jpg'),
(7, 2, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 'korisnici/vmortensen.jpg'),
(8, 2, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 'korisnici/jgarner.jpg'),
(9, 2, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 'korisnici/nportman.jpg'),
(11, 2, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 'korisnici/hberry.jpg'),
(12, 2, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 'korisnici/vdiesel.jpg'),
(13, 2, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 'korisnici/ecuthbert.jpg'),
(14, 2, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 'korisnici/janiston.jpg'),
(15, 2, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 'korisnici/ctheron.jpg'),
(16, 2, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 'korisnici/nkidman.jpg'),
(17, 2, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 'korisnici/ewatson.jpg'),
(18, 1, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 'korisnici/kdunst.jpg'),
(19, 2, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 'korisnici/sjohansson.jpg'),
(20, 2, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 'korisnici/philton.jpg'),
(21, 2, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 'korisnici/kbeckinsale.jpg'),
(22, 2, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 'korisnici/tcruise.jpg'),
(23, 2, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 'korisnici/hduff.jpg'),
(24, 2, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 'korisnici/ajolie.jpg'),
(25, 0, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 'korisnici/kknightley.jpg'),
(26, 2, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 'korisnici/obloom.jpg'),
(27, 2, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 'korisnici/llohan.jpg'),
(28, 2, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 'korisnici/jdepp.jpg'),
(29, 2, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 'korisnici/kreeves.jpg'),
(30, 1, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 'korisnici/thanks.jpg'),
(31, 2, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 'korisnici/elongoria.jpg'),
(32, 2, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 'korisnici/rde.jpg'),
(33, 2, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 'korisnici/jheder.jpg'),
(34, 2, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 'korisnici/rmcadams.jpg'),
(35, 2, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 'korisnici/cbale.jpg'),
(36, 1, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 'korisnici/jalba.jpg'),
(37, 2, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 'korisnici/bpitt.jpg'),
(43, 2, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 'korisnici/apacino.jpg'),
(44, 2, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 'korisnici/wsmith.jpg'),
(45, 2, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 'korisnici/ncage.jpg'),
(46, 2, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 'korisnici/vanne.jpg'),
(47, 2, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 'korisnici/kheigl.jpg'),
(48, 2, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 'korisnici/gbutler.jpg'),
(49, 2, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 'korisnici/jbiel.jpg'),
(50, 2, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 'korisnici/ldicaprio.jpg'),
(51, 2, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 'korisnici/mdamon.jpg'),
(52, 2, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 'korisnici/hpanettiere.jpg'),
(53, 2, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 'korisnici/rreynolds.jpg'),
(54, 2, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 'korisnici/jstatham.jpg'),
(55, 2, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 'korisnici/enorton.jpg'),
(56, 2, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 'korisnici/mwahlberg.jpg'),
(57, 2, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 'korisnici/jmcavoy.jpg'),
(58, 2, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 'korisnici/epage.jpg'),
(59, 2, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 'korisnici/mcyrus.jpg'),
(60, 2, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 'korisnici/kstewart.jpg'),
(61, 2, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 'korisnici/mfox.jpg'),
(62, 2, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 'korisnici/slabeouf.jpg'),
(63, 2, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 'korisnici/ceastwood.jpg'),
(64, 2, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 'korisnici/srogen.jpg'),
(67, 1, 'gdsgs', '123445435', 'Rakel', 'Rimay', '', 'korisnici/chanel.jpg'),
(70, 1, 'a', 'b', 'c', 'd', 'em', 'f'),
(71, 1, 'thedt', '123456', 'thujzik', 'uoiuoti', 'trzurzurzu', 'korisnici/chanel.jpg'),
(72, 1, 'dsfgwrg', 'rgerga', 'rfgrehgtrh', 'gfhxgfhx', 'htrhfhgh', 'thgfhgfxh'),
(73, 2, 'korisnik', '2323', 'ti', 'ja', 'lll@gmail.com', 'tregedgv'),
(74, 1, 'modddd', '2323', 'modd', 'aaaa', 'mod@tvz.hr', 'grgde');

-- --------------------------------------------------------

--
-- Table structure for table `obrt`
--

CREATE TABLE `obrt` (
  `obrt_id` int(10) NOT NULL,
  `moderator_id` int(10) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `opis` text DEFAULT NULL,
  `kontakt_informacije` text NOT NULL,
  `certificiran` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obrt`
--

INSERT INTO `obrt` (`obrt_id`, `moderator_id`, `naziv`, `opis`, `kontakt_informacije`, `certificiran`) VALUES
(1, 2, 'Pčelarstvo Balint', 'Pčelarski obrt „Balint“ u djelatnosti pčelarstva postoji već 15 godina. Pčelari s 300-tinjak LR košnica te njeguje stacionarni i seleći način pčelarenja. Jamstvo kvalitete našeg meda je dugogodišnja tradicija kojom smo stekli ogromno iskustvo što potvrđuju i brojne nagrade i priznanja za kvalitetu meda. U radu sa i oko pčela uključena je čitava obitelj Balint. Naš glavni proizvod je domaći med vrhunske kvalitete. Uz med bavimo se i proizvodnjom ostalih pčelinjih proizvoda kao što su propolis, pelud, vosak te med u saću. Cjelokupnu proizvodnju plasiramo uglavnom prodajom na malo na domaćem lokalnom tržištu. Vrlo rado sudjelujemo na svim sajamskim manifestacijama kako regionalnog tako i međunarodnog karaktera, što nam omogućuje neposredan kontakt sa potrošačima i konzumentima naših proizvoda te pruža priliku za nove poslovne aktivnosti.', 'a p', 1),
(2, 18, 'MEDEA', '---', 'hi', 1),
(3, 30, 'Mihaljević BeeFram', 'U potrazi za što čistijim i kvalitetnijim medom selimo pčele s paše na pašu od slavonskih šuma i Bilogore preko Like i Velebita pa sve do dalmatinskih otoka. Na taj način dobivamo više različitih vrsta meda, a svaki med je poseban po svom okusu, boji, mirisu i zdravstvenoj namjeni temeljenoj na narodnoj medicini.', 'Franje Lučića 32, 10000 Zagreb; Tel: 01 3385 473; Mob: 091 2538 260; E-mail: nektar@nektar.hr', 1),
(4, 1, '', '', '', 1),
(8, 3, 'rajoi', 'fjeaoifj', '4', 1),
(9, 4, 'jtaet', 'thrt', 'trdtsr', 0),
(10, 74, 'kkell222', 'obrt', '342435', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ocjena`
--

CREATE TABLE `ocjena` (
  `ocjena_id` int(10) NOT NULL,
  `korisnik_id` int(10) NOT NULL,
  `proizvod_id` int(10) NOT NULL,
  `ocjena` int(2) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ocjena`
--

INSERT INTO `ocjena` (`ocjena_id`, `korisnik_id`, `proizvod_id`, `ocjena`, `datum`) VALUES
(1, 1, 1, 3, '2018-06-01 11:21:22'),
(2, 1, 2, 2, '2018-06-09 12:22:22'),
(3, 1, 3, 4, '2019-06-01 13:23:22'),
(4, 1, 6, 5, '2019-06-09 14:24:22'),
(5, 1, 5, 1, '2019-06-01 15:25:22'),
(6, 1, 6, 2, '2019-06-09 16:26:22'),
(7, 1, 7, 5, '2019-06-01 17:27:22'),
(8, 1, 8, 4, '2019-06-09 18:28:22'),
(9, 1, 9, 3, '2019-06-01 19:29:22'),
(10, 2, 1, 4, '2019-06-09 20:21:22'),
(11, 2, 2, 4, '2019-06-09 21:22:22'),
(12, 2, 3, 3, '2019-06-01 22:23:22'),
(13, 2, 6, 4, '2019-06-09 23:24:22'),
(14, 2, 5, 4, '2019-06-01 00:25:22'),
(15, 2, 6, 3, '2019-06-09 01:26:22'),
(16, 2, 7, 5, '2019-06-01 10:27:22'),
(17, 2, 8, 4, '2019-06-09 02:28:22'),
(18, 2, 9, 2, '2019-06-09 09:29:22'),
(19, 3, 1, 1, '2019-06-01 10:21:22'),
(20, 3, 2, 2, '2019-06-09 10:22:22'),
(21, 3, 3, 5, '2019-06-09 12:23:22'),
(22, 3, 6, 4, '2019-06-01 12:24:22'),
(23, 3, 5, 3, '2019-06-09 12:25:22'),
(24, 3, 6, 3, '2019-06-09 15:26:22'),
(25, 3, 7, 3, '2019-06-01 15:27:22'),
(26, 3, 8, 3, '2019-06-09 14:28:22'),
(27, 3, 9, 4, '2019-06-09 13:29:22'),
(28, 4, 1, 3, '2019-06-01 11:21:22'),
(29, 4, 2, 2, '2019-06-09 08:22:22'),
(30, 4, 3, 1, '2019-06-09 07:23:22'),
(31, 4, 6, 5, '2019-06-01 06:24:22'),
(32, 4, 5, 4, '2019-06-09 05:25:22'),
(33, 4, 6, 5, '2019-06-01 15:26:22'),
(34, 4, 7, 5, '2019-06-09 14:27:22'),
(35, 4, 8, 4, '2019-06-09 13:28:22'),
(36, 4, 9, 3, '2019-06-01 12:29:22'),
(37, 1, 10, 4, '2020-08-17 19:41:19'),
(38, 2, 13, 5, '2020-08-29 22:29:40'),
(39, 1, 22, 3, '2020-08-30 18:27:43'),
(40, 1, 23, 3, '2020-09-04 01:37:24'),
(41, 1, 4, 3, '2021-05-26 13:32:23'),
(42, 1, 11, 5, '2022-10-12 22:42:07'),
(43, 1, 15, 4, '2022-10-18 20:37:29'),
(44, 13, 2, 4, '2022-11-16 19:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `proizvod_id` int(10) NOT NULL,
  `obrt_id` int(10) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `opis` text NOT NULL,
  `slika` text NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvod_id`, `obrt_id`, `naziv`, `opis`, `slika`, `video`) VALUES
(1, 1, 'Med', 'U svojoj proizvodnji i ponudi imamo gotovo sve kontinentalne vrste meda: bagrem, lipa, kesten, amorfa, livadni i cvjetni med, šumski med, suncokretov med i med uljane repice', 'http://www.pcelarstvobalint.hr/wp-content/uploads/2016/02/med.png', 'http://techslides.com/demos/sample-videos/small.mp4'),
(2, 1, 'Med u saću', 'Med u saću je izuzetno kvalitetan i ukusan proizvod koji je doslovno pravo bogatstvo kao za nepce tako i za cjelokupni ljudski organizam, djeluje protiv upale dišnih putova, sinusa i zubnog mesa', 'http://www.pcelarstvobalint.hr/wp-content/uploads/2016/02/sace.png', 'http://www.html5videoplayer.net/videos/toystory.mp4'),
(3, 1, 'Propolis', 'Propolis je najistraživaniji pčelinji proizvod. To je smolasta smjesa koju pčele prikupljaju sa pupoljaka stabala, biljnih sokova ili drugih biljnih izvora te potiče regeneraciju tkiva i jača imunološki sustav', 'http://www.pcelarstvobalint.hr/wp-content/uploads/2016/02/propolis.png', 'http://techslides.com/demos/sample-videos/small.mp4'),
(4, 1, 'Pelud', 'Pelud ili cvjetni prah, jedna od rijetkih prirodnih namirnica koje se ne mogu proizvesti u laboratoriju, sadrži sve hranjive tvari nužne za rast i razvoj organizma: bjelančevine, masti, ugljikohidrate, vitamine', 'http://www.pcelarstvobalint.hr/wp-content/uploads/2016/02/pelud.png', 'http://www.html5videoplayer.net/videos/toystory.mp4'),
(5, 1, 'Lješnjaci i orasi u medu', 'Lješnjaci i orasi kao prirodni afrodizijaci čiji je učinak naglašen i pojačan povezivanjem istih u mješavinu meda daju ljudskom organizmu i tijelu energiju i druge vitalne elemente', 'http://www.pcelarstvobalint.hr/wp-content/uploads/2016/02/ljesnjaci.png', 'http://techslides.com/demos/sample-videos/small.mp4'),
(6, 1, 'Med u poklon pakiranjima', 'Originalan, zdrav i vrijedan poklon za svaku prigodu. Darivajte svoje najmilije slatkim poklon paketima Pčelarstva Balint...svijeće, vrećice, kutije, staklenke, poklon pakiranja, blagdanski paketi', 'http://www.pcelarstvobalint.hr/wp-content/uploads/2016/02/pokloni.png', 'http://www.html5videoplayer.net/videos/toystory.mp4'),
(7, 3, 'Bagremov med', '900 g – 60,00 kn Svjetložute je boje, blaga i ugodna mirisa i okusa, lagan i ukusan preporučuje se djeci i rekovalescentima. Pomaže kod nesanice, otklanja posljedice stresa, a pogodan je i za dijabetičare.', 'http://mihaljevicmed.hr/wp-content/uploads/2019/02/DSC_4356.jpg', 'http://mihaljevicmed.hr/wp-content/uploads/2019/10/Mihaljevi%C4%87-med-1.mp4'),
(8, 3, 'Lipov med', '900 g – 60,00 kn Svjetložute boje, ugodnog voćnog okusa, pomaže kod prehlade i upale dišnih puteva te potiče znojenje. Olakšava izbacivanje štetnih tvari iz organizma, rad metabolizama i rad bubrega. Ne preporučuje se srčanim bolesnicima.', 'http://mihaljevicmed.hr/wp-content/uploads/2019/02/DSC_4357.jpg', 'http://mihaljevicmed.hr/wp-content/uploads/2019/10/Mihaljevi%C4%87-med-1.mp4'),
(9, 3, 'Kestenov med', '900 g – 65,00 kn Crvenkastosmeđe, tamne boje, jakog i pomalo gorkog okusa. Povoljno djeluje na rad cjelokupnog probavnog sustava. Potiče rad crijeva, olakšava rad jetre i žući te štiti želučanu i crijevnu sluznicu.', 'http://mihaljevicmed.hr/wp-content/uploads/2019/02/DSC_4358.jpg', 'http://mihaljevicmed.hr/wp-content/uploads/2019/10/Mihaljevi%C4%87-med-1.mp4'),
(10, 3, 'Cvjetni/Livadni med', '900 g – 55,00 kn Boja i okus ovise o lokaciji iz koje potječe. To je uglavnom mješani med različito medonosnog livadnog bilja ugodnog okusa. Zahvaljujući raznolikom i bogatom sastavu ima široku primjenu. Koristi se dnevnoj prehrani, a odgovara gotovo svima.', 'http://mihaljevicmed.hr/wp-content/uploads/2019/02/DSC_4353.jpg', 'http://mihaljevicmed.hr/wp-content/uploads/2019/10/Mihaljevi%C4%87-med-1.mp4'),
(11, 3, 'Dalmatinski med', '900 g – 70,00 kn Je mješavina mediteranskog medonosnog bilja kao što su: kadulja, vrijesak, drača, ružmarin i dr. Tamne je boje i fantastičnog okusa. Kaduljin med pomaže kod kašlja i bronhitisa, te želučanih tegoba, a vrijesakov med olakšava reumu i bolesti mokraćnog sustava.', 'http://mihaljevicmed.hr/wp-content/uploads/2019/02/DSC_4355.jpg', 'http://mihaljevicmed.hr/wp-content/uploads/2019/10/Mihaljevi%C4%87-med-1.mp4'),
(13, 2, 'jaaaaaaaa', 'aaaa', 'bbb', 'ccccc'),
(15, 2, 'ghd', 'aaaa', 'http://www.pcelarstvobalint.hr/wp-content/uploads/2016/02/med.png', 'ccccc'),
(18, 2, 'rztrz', 'Mutlib', '2', 'eaf'),
(20, 2, 'thedh', 'Monster', 'bbb', 'ccccc'),
(22, 8, 'r', 'd', 'c', 'd'),
(23, 4, '', '', '', ''),
(24, 2, 'jergf', 'gedgre', 'hnfn', 'gdfgdf');

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `tip_id` int(10) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'voditelj'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `fk_korisnik_tip_korisnika_idx` (`tip_id`);

--
-- Indexes for table `obrt`
--
ALTER TABLE `obrt`
  ADD PRIMARY KEY (`obrt_id`),
  ADD UNIQUE KEY `naziv_UNIQUE` (`naziv`),
  ADD KEY `fk_kateogrija_predmeta_korisnik1_idx` (`moderator_id`);

--
-- Indexes for table `ocjena`
--
ALTER TABLE `ocjena`
  ADD PRIMARY KEY (`ocjena_id`),
  ADD KEY `fk_vozilo_zaposlenik1_idx` (`proizvod_id`),
  ADD KEY `fk_automobil_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`proizvod_id`),
  ADD UNIQUE KEY `naziv_UNIQUE` (`naziv`),
  ADD KEY `fk_vozilo_tvrtka1` (`obrt_id`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`tip_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `obrt`
--
ALTER TABLE `obrt`
  MODIFY `obrt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ocjena`
--
ALTER TABLE `ocjena`
  MODIFY `ocjena_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `proizvod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `tip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_id`) REFERENCES `tip_korisnika` (`tip_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `obrt`
--
ALTER TABLE `obrt`
  ADD CONSTRAINT `fk_kateogrija_predmeta_korisnik1` FOREIGN KEY (`moderator_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ocjena`
--
ALTER TABLE `ocjena`
  ADD CONSTRAINT `fk_automobil_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vozilo_zaposlenik1` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`proizvod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `fk_vozilo_tvrtka1` FOREIGN KEY (`obrt_id`) REFERENCES `obrt` (`obrt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
