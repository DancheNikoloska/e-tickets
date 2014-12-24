
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `boughttickets`;
DROP TABLE IF EXISTS `buyback`;
DROP TABLE IF EXISTS `events`;
DROP TABLE IF EXISTS `genres`;
DROP TABLE IF EXISTS `tickets`;
DROP TABLE IF EXISTS `users`;


CREATE TABLE IF NOT EXISTS `boughttickets` (
`bought_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(10, 7, 24, 4);


CREATE TABLE IF NOT EXISTS `buyback` (
`buyback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `events` (
`event_id` int(11) NOT NULL,
  `event_name` varchar(500) COLLATE utf8_bin NOT NULL,
  `event_description` text COLLATE utf8_bin NOT NULL,
  `period_date` date NOT NULL,
  `period_time` time NOT NULL DEFAULT '20:00:00',
  `genre_id` int(11) NOT NULL,
  `small_img` varchar(500) NOT NULL,
  `big_img` varchar(500) NOT NULL,
  `active` int(11) NOT NULL
    
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `period_date`, `period_time`, `genre_id`, `small_img`, `big_img`,`active`) VALUES
(1, 'Сината птица', 'Нашите секакви дејанија и дела, расфрлани во тесната рамка на нашите кратки животи, се скаменети споменици со коишто живееме секојдневно, комуницираме со нив, се препираме или другаруваме со нив. За луѓето од творештвото, делото е нешто со што се обидува да содејствува со бесконечното Време кое пред 12-ина милијарди години почнало да тече, кога во „Големиот Тресок“ настанало сè што е видливо и невидливо во новонастанатиот бескраен простор на вселената. Создавајќи монументи со кои пловиме по континуитетот на временскиот брзак, се обидуваме барем за еден момент да го замрзнеме неумоливото брзање на вселената, а притоа многу добро знаеме дека тоа ќе ни успее само ако го преживееме мраз-студеното сечило на судот на времето. Всушност, се работи за победа над смртта и за слава на животот.\r\nПотрагата по сината птица е потрага по нас самите, потрага по нашата среќа – и тоа среќата дефинирана како суштински контакт со себеси, со сопствените копнежи, соништа и мисли (нештата од кои, всушност луѓето се направени). Единствената смисла е постојано да се трага и бара – само така може да се создаде светот на убавината (онаа иста убавина за која Достоевски смета дека ќе го спаси светот).', '2015-01-28', '20:00:00', 5, 'sinapticaM', 'sinapticaG',1),
(2, 'Не се клади на Енглези', 'Претстава која го третира феноменот спортско обложување. Текстот во суштина се занимава со прицините и последиците од истиот. Бескрајно долгата транзициска беда, надежта на пониските социјални слоеви за брза заработка, дегенерација на нацијата итн.\r\nЖанровски претставата е комедија, но во текстот може да се насетат и болните аспекти на девијантната појава, обложувањето. На секундарно ниво оваа претстава ја истражува и границата помеѓу човековата себичност и искреното пријателство.', '2015-01-24', '17:30:00', 1,  'neSeKladiM', 'neSeKladiG',1),
(3, 'Парите се отепувачка', 'Парите се отепувачка е претстава, која не дава одговори, но затоа се бори да постави прецизни прашања. Зошто Европа инсистира ние да ги совладаме сопствените демони кога таа има повеќе демони по глава на жител? Дали мимикријата е природна човекова состојба и дали човекот, кој ја имитира и канализира свеста на својот идол подобро може да се снајде од оригиналниот граѓанин на Балканот? Парите се…тоа е борба помеѓу толкувањата и интерпретациите, помеѓу маргините на нормалното и шизофреното, помеѓу лажното и помалку лажното…', '2015-01-25', '21:00:00', 3, 'pariteM', 'pariteG',1),
(4, 'Свадбата на Фигаро', 'Поради нејзината невообичаена форма и содржина во времето кога се појавила, комедијата "Свадбата на Фигаро" предизвикала вистинска револуција во книжевноста! Поради густината и важноста на многу прашања (за страста и неверството, за борбата со интимни и јавни искушенија, за можноста на општествените промени, за револуцијата и нејзините заразни илузии…) пиесата "Свадбата на Фигаро" многумина ја прогласиле дури и за предизвикувач на Француската револуција! Оваа пиеса е една од најславните комедии на сите времиња. Таа е редок пример, во светската драматургија, на подеднаков успех и популарност кај најшироката публика, но и кај тетарските гурмани! Фигаро ќе се жени. Но секогаш ќе остане духовен ерген!', '2014-12-30', '19:00:00', 1,  'figaroM', 'figaroG',1),
(5, 'Кој се плаши од Вирџинија Вулф', ' "Кој се плаши од Вирџинија Вулф" – најпознатата пиеса на Едвард Олби, еден од неколкуте највпечатливи драмски наслови, чијашто популарност се едначи со онаа на "Чекајќи го Годо", "Столови", "Госпоѓица Јулија", "Три сестри", "Животот е сон", "Дон Жуан", "Хамлет", "Антигонa". За овие наслови слушнале дури и оние што драмите на кои се однесуваат никогаш не ги гледале или читале. "Вирџинија Вулф" е праизведена пред точно половина век: на 13 октомври 1962 г., на Бродвеј, во тогаш престижниот Били Роуз Театар. Оценета е како шокантна, контроверзна, остра, возбудлива, неодолива…', '2015-02-03', '20:00:00', 5, 'vulfM', 'vulfG',1),
(6, 'Огнени јазици', 'Претставата  "Огнени јазици" го драматизира прашањето што е преводот и колку е тој воопшто можен? Примерот на светите браќа Кирил и Методиј ни кажаува дека тој и тоа како е можен. Во деветтиот век тие ја преведоа Библијата на славјански јазик, ја создадоа кирилицата и помогнаа во христијанизирањето на славјанскиот свет. Од сите овие прични, тие денес го носат името апостоли на Славјаните. ', '2015-02-08', '18:00:00', 4, 'ogneniM', 'ogneniG',1),
(7, 'Изгубени германци', 'Овој текст е базиран на вистинска приказна. По Втората светска војна, во Југославија, од високи инстанции од Белград, во Македонија доаѓа строго доверлива команда до инстанциите: да се испратат луѓе и голема механизација во напуштен стар рудник, на тромеѓата помеѓу Југославија, Грција и Бугарија. Наредбава е малку чудна бидејќи целото локално население знае дека рудникот го напуштиле некои Французи, уште во 18 век. Копај, копај – ништо. Прашањето е зошто ваква чудна наредба? Одговорот е во архивите на берлинскиот Рајхстаг. Разузнавачките служби на сојузниците, по паѓањето на Третиот Рајх, успеваат да најдат крајно педантно архивирана документација која докажува дека рудникот работел за време на војната. И дека остварувал големи приходи. Кој да се сомнева во германската прецизност!', '2015-02-14', '21:00:00', 4, 'germanciM', 'germanciG',1);


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



CREATE TABLE IF NOT EXISTS `tickets` (
`ticket_id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `event_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;


INSERT INTO `tickets` (`ticket_id`, `row`, `seat`, `code`, `event_id`, `price`) VALUES
(1, 1, 10, 'ABS7777', 3, 150),
(15, 3, 6, '89NNNK',1, 150),
(16, 1, 3, 'OIM9i9i',1, 150),
(17, 3, 5, '7d8s7dh',2, 150),
(18, 1, 2, 'htbt8e8',3, 150),
(19, 2, 2, 'grji889',2, 150),
(20, 1, 2, 'dadm777',5, 150),
(21, 1, 11, 'ABS7778',6, 150),
(23, 10, 5, 'GFG263',6, 150),
(24, 10, 6, 'JNJN888',7, 150);

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `usertype` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `usertype`) VALUES
(1, 'marija', 'marijapass', 'marija@yahoo.com', 'Корисник'),
(2, 'darinka', 'darinkapass', 'darinka@yahoo.com', 'Корисник'),
(3, 'danche', 'danchepass', 'danche@yahoo.com', 'Корисник'),
(4, 'user1', 'user1pass', 'user1@yahoo.com', 'Корисник'),
(5, 'user2', 'user2pass', 'user2@yahoo.com', 'Корисник'),
(6, 'admin', 'adminpass', 'admin@yahoo.com', 'Администратор');


ALTER TABLE `boughttickets`
 ADD PRIMARY KEY (`bought_id`), ADD KEY `user_id` (`user_id`), ADD KEY `event_id` (`event_id`), ADD KEY `ticket_id` (`ticket_id`);


ALTER TABLE `buyback`
 ADD PRIMARY KEY (`buyback_id`), ADD KEY `user_id` (`user_id`), ADD KEY `ticket_id` (`ticket_id`), ADD KEY `event_id` (`event_id`);

ALTER TABLE `events`
 ADD PRIMARY KEY (`event_id`), ADD KEY `genre_id` (`genre_id`);


ALTER TABLE `genres`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `tickets`
 ADD PRIMARY KEY (`ticket_id`), ADD KEY `event_id` (`event_id`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);


ALTER TABLE `boughttickets`
MODIFY `bought_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;

ALTER TABLE `buyback`
MODIFY `buyback_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `events`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

ALTER TABLE `genres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;

ALTER TABLE `tickets`
MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;

ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;


ALTER TABLE `boughttickets`
ADD CONSTRAINT `boughttickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `boughttickets_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
ADD CONSTRAINT `boughttickets_ibfk_3` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`);


ALTER TABLE `buyback`
ADD CONSTRAINT `buyback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `buyback_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`),
ADD CONSTRAINT `buyback_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);



ALTER TABLE `tickets`
ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `events`
ADD CONSTRAINT `genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
