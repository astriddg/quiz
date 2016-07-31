-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2016 at 03:08 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `id` int(10) unsigned NOT NULL,
  `numero_quiz` int(10) unsigned NOT NULL,
  `numero_question` int(10) unsigned NOT NULL,
  `question` varchar(200) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`id`, `numero_quiz`, `numero_question`, `question`, `type`) VALUES
(1, 1, 1, 'Que va être la question du référundum ?', '1rep'),
(2, 1, 2, 'Quand se déroulera le vote ?', '1rep'),
(3, 1, 3, 'Quand aurons-nous les résultats ?', '1rep'),
(4, 1, 4, 'Si le résultat est « oui », quand la décision prendra-t-elle effet ?', '1rep'),
(5, 1, 5, 'Qui peut voter ?', '1rep'),
(6, 1, 6, 'De ces personnages célèbres, qui est pour Brexit ?', '1rep'),
(7, 1, 7, 'Quel évènement a provoqué un changement important dans les sondages une semaine avant le vote ?', '1rep'),
(8, 1, 8, 'Quelles seront les conséquences pour le Royaume-Uni ?', '1rep'),
(9, 2, 1, 'Qui a fondé l''empire Trump ?', '1rep'),
(10, 2, 2, 'Quelle position a-t-il dans sa fratrie ?', '1rep'),
(11, 2, 3, 'Pourquoi n''a-t-il pas participé à la guerre du Viet Nam', '1rep'),
(12, 2, 4, 'Combien de femmes a-t-il eu ?', '1rep'),
(13, 2, 5, 'Laquelle de ces citations ne vient pas de Trump ?', '1rep'),
(14, 3, 1, 'Quel sujet était donné aux L en philo cette année ?', '1rep'),
(15, 3, 2, 'Sur quel sujet d''histoire les ES ont-ils du plancher cette année ?', '1rep'),
(16, 3, 3, 'Quel est l''un des sujets à traîter en SVT pour les terminales S de cette année ?', '1rep'),
(17, 2, 6, 'Dans cette liste, quels sont les enfants de Donald ?', 'multirep'),
(18, 3, 4, 'Lesquels de ces sujets étaient donnés au bac de français 2016.', 'multirep'),
(19, 1, 9, 'Peu de villes ont voté pour rester, dans celles ci-dessous, lesquelles ont voté « Bremain » ?', 'multirep'),
(20, 1, 10, 'Quel était (à l''unité près) pourcentage du vote "partir de l''Europe" ?', 'nombre'),
(21, 1, 11, 'Remettez les nations du Royaume-Uni dans l''ordre du plus haut taux de vote leave au plus bas.', 'ordre'),
(22, 2, 7, 'En quelle année Donald Trump est-il né ?', 'nombre'),
(23, 2, 8, 'Remettez les femmes de Donald Trump dans l''ordre chronologique.', 'ordre'),
(24, 3, 5, 'Quel était (à l''unité près) le pourcentage de reçus au bac cette année ?', 'nombre'),
(25, 3, 6, 'Quel bac contient le plus d''étudiants et lequel en contient le moins ?', 'ordre');

-- --------------------------------------------------------

--
-- Table structure for table `Reponses`
--

CREATE TABLE `Reponses` (
  `id` int(10) unsigned NOT NULL,
  `numero_quiz` int(10) unsigned NOT NULL,
  `numero_question` int(10) unsigned NOT NULL,
  `numero_reponse` int(11) NOT NULL,
  `reponse` varchar(200) NOT NULL,
  `vrai` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reponses`
--

INSERT INTO `Reponses` (`id`, `numero_quiz`, `numero_question`, `numero_reponse`, `reponse`, `vrai`) VALUES
(1, 1, 1, 1, 'Aimez-vous l''Union Européenne ?', 0),
(2, 1, 1, 2, 'Le Royaume-Uni doit-il quitter ou rester dans l''Union Européenne', 1),
(3, 1, 1, 3, 'l''Union Européenne doit-elle être démantelée ?', 0),
(4, 1, 1, 4, 'Faut-il changer la gouvernance de l''Union Européenne ?', 0),
(5, 1, 2, 1, 'Le 23 juin 2016', 1),
(6, 1, 2, 2, 'Le 24 juin 2016', 0),
(7, 1, 2, 3, 'Le 11 juin 2016', 0),
(8, 1, 2, 4, 'Le 24 juin 2017', 0),
(9, 1, 3, 1, 'Le soir du vote à 22h', 0),
(10, 1, 3, 2, 'Le lendemain à 7h', 1),
(11, 1, 4, 1, 'Immédiatement', 0),
(12, 1, 4, 2, 'Le lundi suivant', 0),
(13, 1, 4, 3, 'Le gouvernement a jusqu''au 1e janvier 2017 pour se préparer à efféctuer cette décision', 0),
(14, 1, 4, 4, 'Le gouvernement a deux ans pour se préparer à efféctuer cette décision', 1),
(15, 1, 5, 1, 'Tout citoyen britannique, irlandais ou du Commonwealth résidant au Royaume-Uni', 1),
(16, 1, 5, 2, 'Tout citoyen britannique ou de l''Union Européenne résidant au Royaume-Uni', 0),
(17, 1, 5, 3, 'Toute personne résidant au Royaume-Uni depuis plus de 15 ans.', 0),
(18, 1, 6, 1, 'David Cameron', 0),
(19, 1, 6, 2, 'Richard Branson', 0),
(20, 1, 6, 3, 'Boris Johnson', 1),
(21, 1, 6, 4, 'Kristen Scott-Thomas', 0),
(22, 1, 7, 1, 'L''élection de Donald Trump à la présidence des Etats-Unis', 0),
(23, 1, 7, 2, 'Le meurtre de Jo Cox, membre du parlement Britannique et pro-Europe', 1),
(24, 1, 7, 3, 'Le démarrage de l''Euro 2016', 0),
(25, 1, 8, 1, 'Mauvaises', 0),
(26, 1, 8, 2, 'Bonnes', 0),
(27, 1, 8, 3, 'Personne ne sait vraiment', 1),
(28, 2, 1, 1, 'L''arrière-grand-père de Donald, Philipp Trump, qui crée la « Trump Tower Organisation »', 0),
(29, 2, 1, 2, 'La grand-mère de Donald, Elizabeth, qui crée « Elizabeth Trump and Sons »', 1),
(30, 2, 1, 3, 'Donald Trump', 0),
(31, 2, 2, 1, 'Il est le troisième sur quatre', 1),
(32, 2, 2, 2, 'Il est l''ainé', 0),
(33, 2, 2, 3, 'Il est le dernier sur 5', 0),
(34, 2, 2, 4, 'Il est au milieu d''une fratrie de trois', 0),
(35, 2, 3, 1, 'Il était contre cette guerre', 0),
(36, 2, 3, 2, 'A cause de sa mauvaise santé', 0),
(37, 2, 3, 3, 'Il avait reçu un très haut numéro à la lotterie de guerre, ce qui veut dire que son tour d''enrôlement arrive trop tard.', 1),
(38, 2, 4, 1, '3', 1),
(39, 2, 4, 2, '5', 0),
(40, 2, 4, 3, '2', 0),
(41, 2, 5, 1, 'Le concept de réchauffement climatique a été créé par et pour les Chinois dans le but de rendre l''industrie américaine non-compétitive.', 0),
(42, 2, 5, 2, 'Si les Iraniens attaquaient Israël avec une arme nucléaire, nous riposterions à l''Iran. [...] Nous pourrions totalement les anéantir.', 1),
(43, 2, 5, 3, 'Comment peut-elle satisfaire son pays si elle ne satisfait pas son mari ?', 0),
(44, 2, 5, 4, 'Une source extrêmement crédible a téléphoné mon bureau et m’a dit que le certificat de naissance de Obama est faux.', 0),
(45, 2, 5, 5, 'On pouvait voir du sang sortir de ses yeux, du sang sortir de son... où que ce soit', 0),
(46, 3, 1, 1, '"Nos convictions morales sont-elles fondées sur l''expérience ?"', 1),
(47, 3, 1, 2, '"Respecter tout être vivant, est-ce un devoir moral ?"', 0),
(48, 3, 2, 3, '"En vous appuyant sur les exemples étudiés au cours de l’année, vous traiterez le sujet suivant : médias et opinion publique dans les grandes crises politiques en France depuis l’Affaire Dreyfus"', 1),
(49, 3, 2, 4, '"En vous appuyant sur le cas du produit mondialisé étudié dans l’année, vous présenterez la mondialisation en fonctionnement"', 0),
(50, 3, 3, 1, '"Préciser l’origine de l’énergie interne de la Terre, présenter ses modes de transfert vers la surface et expliquer pourquoi certaines zones du globe sont favorables à son exploitation géothermique."', 0),
(51, 3, 3, 2, 'Exposer en quoi les structures des organes impliqués dans les échanges nutritifs externes et internes d’une plante sont adaptées à son mode de vie fixé.', 1),
(52, 2, 6, 1, 'Donald', 1),
(53, 2, 6, 2, 'Fred', 0),
(54, 2, 6, 3, 'Elizabeth', 0),
(55, 2, 6, 4, 'Eric', 1),
(56, 2, 6, 5, 'Ivanka', 1),
(57, 3, 4, 1, '«Pensez-vous que la poésie soit une invitation au voyage ? Vous répondrez à cette question en vous fondant sur les textes du corpus ainsi que sur les textes et œuvres que vous avez étudiés et lus.»', 0),
(58, 3, 4, 2, '«En vous fondant ces exemples et dans votre expérience de spectateur, vous vous demanderez dans quelle mesure la mise en scène renforce l’émotion que suscite le texte théâtral.»', 0),
(59, 3, 4, 3, '« Les écrivains peuvent-ils encore nous surprendre lorsqu''ils s''emparent d''un mythe souvent réécrit ? »', 1),
(60, 3, 4, 4, '« Les écrivains ont-ils pour mission essentielle de célébrer ce qui fait la grandeur de l’être humain ?', 1),
(61, 1, 9, 1, 'Glasgow ', 1),
(62, 1, 9, 2, 'Londres', 1),
(63, 1, 9, 3, 'Birmingham', 0),
(64, 1, 9, 4, 'Cambridge', 1),
(65, 1, 9, 5, 'Cardiff', 0),
(66, 1, 10, 1, '52', 1),
(67, 1, 11, 1, 'Angleterre', 1),
(68, 1, 11, 2, 'Pays de Galles', 1),
(69, 1, 11, 3, 'Irelande du Nord', 1),
(70, 1, 11, 4, 'Ecosse', 1),
(71, 2, 7, 1, '1947', 1),
(72, 2, 8, 1, 'Ivanna', 1),
(73, 2, 8, 2, 'Marla', 1),
(74, 2, 8, 3, 'Melania', 1),
(75, 3, 5, 1, '89', 1),
(76, 3, 6, 1, 'Général', 1),
(77, 3, 6, 2, 'Pro', 1),
(78, 3, 6, 3, 'Techno', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Table_quiz`
--

CREATE TABLE `Table_quiz` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Table_quiz`
--

INSERT INTO `Table_quiz` (`id`, `nom`) VALUES
(1, 'Tout savoir sur Brexit'),
(2, 'Connaissez-vous bien Donald Trump ?'),
(3, 'Les sujets du bac');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_quiz` (`numero_quiz`);

--
-- Indexes for table `Reponses`
--
ALTER TABLE `Reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reponse_quiz` (`numero_quiz`),
  ADD KEY `fk_reponse_question` (`numero_question`);

--
-- Indexes for table `Table_quiz`
--
ALTER TABLE `Table_quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `Reponses`
--
ALTER TABLE `Reponses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `Table_quiz`
--
ALTER TABLE `Table_quiz`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `fk_question_quiz` FOREIGN KEY (`numero_quiz`) REFERENCES `Table_quiz` (`id`);

--
-- Constraints for table `Reponses`
--
ALTER TABLE `Reponses`
  ADD CONSTRAINT `fk_reponse_question` FOREIGN KEY (`numero_question`) REFERENCES `Questions` (`id`),
  ADD CONSTRAINT `fk_reponse_quiz` FOREIGN KEY (`numero_quiz`) REFERENCES `Table_quiz` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
