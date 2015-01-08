-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2015 at 09:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `boughttickets`
--

CREATE TABLE IF NOT EXISTS `boughttickets` (
`bought_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boughttickets`
--

INSERT INTO `boughttickets` (`bought_id`, `event_id`, `ticket_id`, `user_id`) VALUES
(1, 1, 15, 3),
(2, 1, 16, 3),
(3, 2, 17, 1),
(4, 3, 18, 2),
(5, 2, 19, 5),
(6, 5, 20, 5),
(7, 3, 1, 5),
(8, 6, 21, 5),
(9, 6, 23, 4),
(10, 7, 24, 4),
(11, 6, 28, 7),
(12, 6, 29, 7),
(13, 6, 30, 7),
(14, 8, 31, 7),
(15, 8, 32, 7),
(16, 8, 33, 7),
(17, 8, 34, 7),
(18, 9, 35, 8),
(19, 9, 36, 8),
(20, 9, 37, 8),
(21, 9, 38, 8),
(22, 9, 40, 8),
(23, 9, 41, 8),
(24, 2, 42, 8),
(25, 2, 43, 8),
(26, 2, 44, 8),
(27, 2, 45, 8),
(28, 2, 46, 8),
(29, 2, 47, 8),
(30, 2, 48, 8),
(31, 3, 49, 8),
(32, 3, 50, 8),
(33, 2, 51, 3),
(34, 2, 52, 3),
(35, 2, 53, 3),
(36, 2, 54, 3),
(37, 4, 55, 3),
(38, 4, 56, 3),
(39, 4, 57, 3),
(40, 4, 58, 3),
(41, 1, 59, 1),
(42, 1, 60, 1),
(43, 5, 61, 1),
(44, 5, 62, 1),
(45, 5, 63, 1),
(46, 7, 64, 1),
(47, 7, 65, 1),
(48, 7, 66, 1),
(49, 3, 67, 2),
(50, 3, 68, 2),
(51, 3, 69, 2),
(52, 6, 70, 2),
(53, 6, 71, 2),
(54, 6, 72, 2),
(55, 6, 73, 2),
(56, 8, 74, 2),
(57, 8, 75, 2),
(58, 8, 76, 2),
(59, 8, 77, 2),
(60, 5, 78, 4),
(61, 5, 79, 4),
(62, 5, 80, 4),
(63, 5, 81, 4),
(64, 1, 82, 4),
(65, 1, 83, 4),
(66, 1, 84, 4),
(67, 1, 85, 4),
(68, 1, 86, 4),
(69, 1, 87, 4),
(70, 3, 88, 9),
(71, 3, 89, 9),
(72, 3, 90, 9),
(73, 3, 91, 9),
(74, 6, 92, 9),
(75, 6, 93, 9),
(76, 1, 94, 9),
(77, 1, 95, 9),
(78, 10, 96, 3),
(79, 10, 97, 3),
(80, 10, 98, 3);

-- --------------------------------------------------------

--
-- Table structure for table `buyback`
--

CREATE TABLE IF NOT EXISTS `buyback` (
`buyback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `time_reserved` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`event_id` int(11) NOT NULL,
  `event_name` varchar(500) COLLATE utf8_bin NOT NULL,
  `event_description` text COLLATE utf8_bin NOT NULL,
  `period_date` date NOT NULL,
  `period_time` time NOT NULL DEFAULT '20:00:00',
  `genre_id` int(11) NOT NULL,
  `small_img` varchar(500) COLLATE utf8_bin NOT NULL,
  `big_img` varchar(500) COLLATE utf8_bin NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `period_date`, `period_time`, `genre_id`, `small_img`, `big_img`, `active`) VALUES
(1, 'Сината птица', 'Нашите секакви дејанија и дела, расфрлани во тесната рамка на нашите кратки животи, се скаменети споменици со коишто живееме секојдневно, комуницираме со нив, се препираме или другаруваме со нив. За луѓето од творештвото, делото е нешто со што се обидува да содејствува со бесконечното Време кое пред 12-ина милијарди години почнало да тече, кога во „Големиот Тресок“ настанало сè што е видливо и невидливо во новонастанатиот бескраен простор на вселената. Создавајќи монументи со кои пловиме по континуитетот на временскиот брзак, се обидуваме барем за еден момент да го замрзнеме неумоливото брзање на вселената, а притоа многу добро знаеме дека тоа ќе ни успее само ако го преживееме мраз-студеното сечило на судот на времето. Всушност, се работи за победа над смртта и за слава на животот.\r\nПотрагата по сината птица е потрага по нас самите, потрага по нашата среќа – и тоа среќата дефинирана како суштински контакт со себеси, со сопствените копнежи, соништа и мисли (нештата од кои, всушност луѓето се направени). Единствената смисла е постојано да се трага и бара – само така може да се создаде светот на убавината (онаа иста убавина за која Достоевски смета дека ќе го спаси светот).', '2015-01-28', '20:00:00', 5, 'sinapticaM', 'sinapticaG', 1),
(2, 'Не се клади на Енглези', 'Претстава која го третира феноменот спортско обложување. Текстот во суштина се занимава со прицините и последиците од истиот. Бескрајно долгата транзициска беда, надежта на пониските социјални слоеви за брза заработка, дегенерација на нацијата итн.\r\nЖанровски претставата е комедија, но во текстот може да се насетат и болните аспекти на девијантната појава, обложувањето. На секундарно ниво оваа претстава ја истражува и границата помеѓу човековата себичност и искреното пријателство.', '2015-01-24', '17:30:00', 1, 'neSeKladiM', 'neSeKladiG', 1),
(3, 'Парите се отепувачка', 'Парите се отепувачка е претстава, која не дава одговори, но затоа се бори да постави прецизни прашања. Зошто Европа инсистира ние да ги совладаме сопствените демони кога таа има повеќе демони по глава на жител? Дали мимикријата е природна човекова состојба и дали човекот, кој ја имитира и канализира свеста на својот идол подобро може да се снајде од оригиналниот граѓанин на Балканот? Парите се…тоа е борба помеѓу толкувањата и интерпретациите, помеѓу маргините на нормалното и шизофреното, помеѓу лажното и помалку лажното…', '2014-11-25', '21:00:00', 3, 'pariteM', 'pariteG', 1),
(4, 'Свадбата на Фигаро', 'Поради нејзината невообичаена форма и содржина во времето кога се појавила, комедијата "Свадбата на Фигаро" предизвикала вистинска револуција во книжевноста! Поради густината и важноста на многу прашања (за страста и неверството, за борбата со интимни и јавни искушенија, за можноста на општествените промени, за револуцијата и нејзините заразни илузии…) пиесата "Свадбата на Фигаро" многумина ја прогласиле дури и за предизвикувач на Француската револуција! Оваа пиеса е една од најславните комедии на сите времиња. Таа е редок пример, во светската драматургија, на подеднаков успех и популарност кај најшироката публика, но и кај тетарските гурмани! Фигаро ќе се жени. Но секогаш ќе остане духовен ерген!', '2014-12-30', '19:00:00', 1, 'figaroM', 'figaroG', 1),
(5, 'Вирџинија Вулф', ' "Вирџинија Вулф" – најпознатата пиеса на Едвард Олби, еден од неколкуте највпечатливи драмски наслови, чијашто популарност се едначи со онаа на "Чекајќи го Годо", "Столови", "Госпоѓица Јулија", "Три сестри", "Животот е сон", "Дон Жуан", "Хамлет", "Антигонa". За овие наслови слушнале дури и оние што драмите на кои се однесуваат никогаш не ги гледале или читале. "Вирџинија Вулф" е праизведена пред точно половина век: на 13 октомври 1962 г., на Бродвеј, во тогаш престижниот Били Роуз Театар. Оценета е како шокантна, контроверзна, остра, возбудлива, неодолива…', '2014-11-23', '20:00:00', 5, 'vulfM', 'vulfG', 1),
(6, 'Огнени јазици', 'Претставата  "Огнени јазици" го драматизира прашањето што е преводот и колку е тој воопшто можен? Примерот на светите браќа Кирил и Методиј ни кажаува дека тој и тоа како е можен. Во деветтиот век тие ја преведоа Библијата на славјански јазик, ја создадоа кирилицата и помогнаа во христијанизирањето на славјанскиот свет. Од сите овие прични, тие денес го носат името апостоли на Славјаните. ', '2014-10-15', '18:00:00', 4, 'ogneniM', 'ogneniG', 1),
(7, 'Изгубени германци', 'Овој текст е базиран на вистинска приказна. По Втората светска војна, во Југославија, од високи инстанции од Белград, во Македонија доаѓа строго доверлива команда до инстанциите: да се испратат луѓе и голема механизација во напуштен стар рудник, на тромеѓата помеѓу Југославија, Грција и Бугарија. Наредбава е малку чудна бидејќи целото локално население знае дека рудникот го напуштиле некои Французи, уште во 18 век. Копај, копај – ништо. Прашањето е зошто ваква чудна наредба? Одговорот е во архивите на берлинскиот Рајхстаг. Разузнавачките служби на сојузниците, по паѓањето на Третиот Рајх, успеваат да најдат крајно педантно архивирана документација која докажува дека рудникот работел за време на војната. И дека остварувал големи приходи. Кој да се сомнева во германската прецизност!', '2015-02-14', '21:00:00', 4, 'germanciM', 'germanciG', 1),
(8, 'Последна шанса', 'Последна шанса е монодрама, која се занимава со ефектот на суперфицијалниот вирус, кој преку мејнстрим медиумите, ја инфицира секоја пора на нашето совремие. Се работи за псевдо реално шоу во кој ја следиме неверојатната животна приказна на еден сосема обичен човек. Совршен почеток за секое реално шоу зар не. Особено сите оние инспирирани од Големиот брат, на Орвел, кој никогаш не го потценил сопствениот род дотаму, за да помисли дека неговиот свет, неколку децении подоцна, ќе биде интерпретиран на така тривијален начин. Реалните шоуа од типот на Големиот брат (Big Brother) и неговите безбројни дегенерирани и мутирани нуспојави, полека но сигурно ја турка ТВ популацијата во деволуционен процес, кој неминовно води кон идиократија. Воаејризам како оправдание за сопствените неуспеси. Tabula rasa. Лесен плен за кој било државник со здрав концепт за контрола. Кругот се затвора и повторно доаѓаме до Големиот брат, но сега оној поблиску до оригиналниот свет на Орвел.', '2015-02-12', '20:00:00', 5, 'poslednaSansaM', 'poslednaSansaG', 1),
(9, 'Госпоѓа Министерка', '"Госпоѓа Министерка", заедно со "Чорбаџи Теодос" и "Сомнително лице" се трите најизведувани досега претстави воопшто и важат за бренд. Праизведбата на пиесата од Бранислав Нушиќ се случи на сцената на Београдско народно позориште во 1929 година, а во октомври истата година премиерно е изведена и во Скопје.', '2015-03-10', '19:00:00', 1, 'ministerkaM', 'ministerkaG', 1),
(10, 'Сомнително лице', 'Адаптација на делото на Бранислав Нушиќ, во режија на Синиша Ефтимов. Комедија за мрзеливи и неспособни чиновнци кои своите одлики ги добиваат со сушење и чување на чорапите и долниот веш во фасциклите наменети за значајни случаи. Претстава која ќе ве насмее до солзи', '2015-01-20', '20:00:00', 1, 'somnitelnoM', 'somnitelnoG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
`id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `description`) VALUES
(1, 'Комедија', 'Комедијата е еден од основните видови драма, во кој судирот, дејствието и личностите се прикажани во смешна форма. '),
(3, 'Трагедија', 'Трагедија е вид драмско дело во кое се прикажуваат мрачни, жестоки и тажни настани од животот, страшното и ужасното во него, промени од среќа во несреќа, пропаст на возвишени идеали и смрт на главните ликови.'),
(4, 'Трагикомедија', 'Трагикомедијата е драмска творба во која се испреплетуваат комични и трагични елементи.'),
(5, 'Драма', 'Драма (во потесна смисла на зборот) како посебен вид не е ниту трагична, ниту комична, туку реална. Во неа доминираат теми и мотиви од секојдневниот живот');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
`ticket_id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `event_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `row`, `seat`, `code`, `event_id`, `price`) VALUES
(1, 1, 10, 'ABS7777', 3, 150),
(15, 3, 6, '89NNNK', 1, 150),
(16, 1, 3, 'OIM9i9i', 1, 150),
(17, 3, 5, '7d8s7dh', 2, 150),
(18, 1, 2, 'htbt8e8', 3, 150),
(19, 2, 2, 'grji889', 2, 150),
(20, 1, 2, 'dadm777', 5, 150),
(21, 1, 11, 'ABS7778', 6, 150),
(23, 10, 5, 'GFG263', 6, 150),
(24, 10, 6, 'JNJN888', 7, 150),
(25, 7, 9, '77336bcfe36e35', 9, 150),
(26, 7, 10, '2c67a347a5dab2', 9, 150),
(27, 7, 11, 'd75813f233808a', 9, 150),
(28, 7, 15, '006fcada8fb3ee', 6, 150),
(29, 7, 16, '2eb21fd4fca2dd', 6, 150),
(30, 7, 17, '9519a7a01ead1d', 6, 150),
(31, 1, 7, '1c59a245bf20e7', 8, 150),
(32, 1, 8, '0c94db7419dda0', 8, 150),
(33, 2, 7, 'd338ccef54c033', 8, 150),
(34, 2, 8, '2400f50ec6c33b', 8, 150),
(35, 1, 17, 'b4444de5c399e3', 9, 150),
(36, 1, 18, 'f06b099e2a385b', 9, 150),
(37, 2, 17, 'bafeb5da4cdb2d', 9, 150),
(38, 2, 18, '50e9e268b1b4dd', 9, 150),
(40, 2, 10, 'd85b212bb1e01e', 9, 150),
(41, 2, 11, 'c5547d4d905324', 9, 150),
(42, 3, 8, '32c47a7c0e0630', 2, 150),
(43, 3, 9, '55982968635e8a', 2, 150),
(44, 3, 10, '04f9c5bd17495c', 2, 150),
(45, 4, 8, '31497e84c17c35', 2, 150),
(46, 4, 9, '8fe8809710f069', 2, 150),
(47, 4, 10, '9ca117f0b5dca7', 2, 150),
(48, 3, 11, '44fc71f3c5a515', 2, 150),
(49, 2, 8, 'ec4117381df616', 3, 150),
(50, 2, 9, '6e295cbf3e25f4', 3, 150),
(51, 7, 8, 'f952e8f610915c', 2, 150),
(52, 7, 9, '4ba014ee4f988d', 2, 150),
(53, 7, 10, 'fa5afe040b8379', 2, 150),
(54, 7, 11, 'c38a14e0ae9088', 2, 150),
(55, 1, 8, '312ba71280fa87', 4, 150),
(56, 1, 9, 'e9e895fd078046', 4, 150),
(57, 1, 10, 'b4d02d52884622', 4, 150),
(58, 1, 7, 'b7963cc8e60335', 4, 150),
(59, 8, 9, 'cc32264a245963', 1, 150),
(60, 8, 10, '97d4dc5bfd6bb9', 1, 150),
(61, 10, 13, '1849bc3f08234f', 5, 150),
(62, 10, 14, 'fa3238cefa625f', 5, 150),
(63, 10, 15, '9e7aef2ebfea52', 5, 150),
(64, 7, 5, 'ede48412c37e5b', 7, 150),
(65, 7, 6, '3694bcbbe7f04f', 7, 150),
(66, 7, 7, 'f02846439a22e8', 7, 150),
(67, 7, 1, '93bfe8685fc2e4', 3, 150),
(68, 7, 2, '79bd5452d0da6c', 3, 150),
(69, 7, 3, 'fc8e2fdaee8f90', 3, 150),
(70, 7, 5, '6b984d0bd06108', 6, 150),
(71, 7, 6, '13e555abe26356', 6, 150),
(72, 8, 6, 'c144a1828402db', 6, 150),
(73, 8, 7, '2110ace5484e04', 6, 150),
(74, 15, 8, '36bc5543b3201d', 8, 150),
(75, 15, 9, '9ed30a83a632d7', 8, 150),
(76, 15, 10, 'aa9aae1fd35f6d', 8, 150),
(77, 15, 11, 'e6af834796ea37', 8, 150),
(78, 1, 17, '77a4573f62daee', 5, 150),
(79, 1, 18, '5566542643740b', 5, 150),
(80, 15, 7, '63178da618077e', 5, 150),
(81, 15, 8, 'a4cad4acae06de', 5, 150),
(82, 2, 17, '4082ed44f6f496', 1, 150),
(83, 3, 17, 'a8874a960fcb50', 1, 150),
(84, 4, 17, '84f5abae75cb9f', 1, 150),
(85, 2, 18, '2fd5cf27e272f9', 1, 150),
(86, 3, 18, '82ead8220f59ad', 1, 150),
(87, 4, 18, 'f3c2f7dc39ebad', 1, 150),
(88, 7, 17, '560e62c358d66a', 3, 150),
(89, 7, 18, '99188dce4ad006', 3, 150),
(90, 7, 16, 'ba8c03a7cef2cd', 3, 150),
(91, 7, 15, '5968c9929cc6bf', 3, 150),
(92, 2, 8, '6e92dafb13706c', 6, 150),
(93, 2, 9, 'a2db6f8b030cfb', 6, 150),
(94, 7, 10, '1b9a2b0d35e83e', 1, 150),
(95, 7, 9, 'dcbb01f1b82282', 1, 150),
(96, 3, 9, '9507074a15949a', 10, 150),
(97, 3, 8, '86355a35d7530f', 10, 150),
(98, 3, 10, 'c3b3ca34583d2e', 10, 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `usertype` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `usertype`) VALUES
(1, 'marija', 'd6ddeebe2292284c655890bd90029447', 'marija@yahoo.com', 'Корисник'),
(2, 'darinka', 'b7a5317ad50e2ae4acfe8471cbb8f860', 'darinka@yahoo.com', 'Корисник'),
(3, 'danche', 'bfe1549a1ec46597205ad25422d0f60c', 'danche@yahoo.com', 'Корисник'),
(4, 'user1', '20a0db53bc1881a7f739cd956b740039', 'user1@yahoo.com', 'Корисник'),
(5, 'user2', '1926f73f97bf1985b2b367730cb75071', 'user2@yahoo.com', 'Корисник'),
(6, 'admin', '1877fcc1b7ec74e144d319929edb40a9', 'admin@yahoo.com', 'Администратор'),
(7, 'user7', 'fd0e0e066ea6d0a3b5aab9622e3daaee', 'user7@gmail.com', 'Корисник'),
(8, 'user8', '67332dfd6cba2083ed4b0993ef6fccfb', 'user8@gmail.com', 'Корисник'),
(9, 'user9', '6ccd03a4df3d733fcdf6f930772b28ee', 'user9@gmail.com', 'Корисник');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boughttickets`
--
ALTER TABLE `boughttickets`
 ADD PRIMARY KEY (`bought_id`), ADD KEY `user_id` (`user_id`), ADD KEY `event_id` (`event_id`), ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `buyback`
--
ALTER TABLE `buyback`
 ADD PRIMARY KEY (`buyback_id`), ADD KEY `user_id` (`user_id`), ADD KEY `ticket_id` (`ticket_id`), ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`event_id`), ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`ticket_id`), ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boughttickets`
--
ALTER TABLE `boughttickets`
MODIFY `bought_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `buyback`
--
ALTER TABLE `buyback`
MODIFY `buyback_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `boughttickets`
--
ALTER TABLE `boughttickets`
ADD CONSTRAINT `boughttickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `boughttickets_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
ADD CONSTRAINT `boughttickets_ibfk_3` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`);

--
-- Constraints for table `buyback`
--
ALTER TABLE `buyback`
ADD CONSTRAINT `buyback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `buyback_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`),
ADD CONSTRAINT `buyback_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
