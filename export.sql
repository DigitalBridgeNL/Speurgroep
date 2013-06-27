-- phpMyAdmin SQL Dump
-- version 2.6.3-pl1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generatie Tijd: 27 Jun 2013 om 23:28
-- Server versie: 4.1.21
-- PHP Versie: 5.0.4
-- 
-- Database: `speurgroep`
-- 

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `categorie`
-- 

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `categorie`
-- 

INSERT INTO `categorie` VALUES (1, 'help en info');
INSERT INTO `categorie` VALUES (2, 'overige');
INSERT INTO `categorie` VALUES (3, 'dragons');

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `page`
-- 

CREATE TABLE `page` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `tekst` longtext NOT NULL,
  `catid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `fk_page_cat` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `page`
-- 

INSERT INTO `page` VALUES (1, 'Introductie', '<p>De bedoeling van Speurgroep is om consumenten aan de juiste bedrijven te koppelen, maar ook om bedrijven aan bedrijven te koppel uit andere branches, zodat de consument op 1 plek, zowel de aannemer als de schilder kan vinden of de rijschool en het autobedrijf en daardoor ook de juiste verzekering. De beste vakman of dienstaanbieder op 1 site en misschien wel op 1 adverteerderspagina voor het gemak van de consument.</p>\r\n\r\n<p>De consument kan op de website van Speurgroep direct zoeken naar een vakman of dienstverlener, daarbij kan er een offerte worden opgevraagd bij meerdere bedrijven.</p>\r\n\r\n<p>De bedrijven, bij wie een offerte is opgevraagd, kunnen dan weer reageren door een juiste offerte uit te brengen aan de consument. Doordat de diverse bedrijven uit het het bestand van Speurgroep bij elkaars branches kunnen en mogen adverteren kan en zal er een juiste cohesie ontstaan in het juist verstrekken van de offerte/informatie aan de consument.</p>\r\n', 1);
INSERT INTO `page` VALUES (2, 'Voorbeeldadvertentie', '<p><u>schnitzel</u></p>\r\n', 1);
INSERT INTO `page` VALUES (8, 'dwadddddd', '', 2);
INSERT INTO `page` VALUES (9, 'wqeert', '', 3);
INSERT INTO `page` VALUES (10, '235234234', '', 3);
INSERT INTO `page` VALUES (3, 'Automatische verlenging', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets dwadawdhuawuihdawuihdauihdawuiLorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1);
INSERT INTO `page` VALUES (6, 'creazy', '<p>dwadawdwadwadaw</p>', 0);
INSERT INTO `page` VALUES (7, 'dwadwa', '', 2);

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `pagescat`
-- 

CREATE TABLE `pagescat` (
  `id` int(11) NOT NULL auto_increment,
  `pageid` int(11) default NULL,
  `catid` int(11) default NULL,
  `namepage` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_pagescat_page` (`pageid`),
  KEY `fk_pagescat_cat` (`catid`),
  KEY `fk_pagescat_name` (`namepage`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `pagescat`
-- 

INSERT INTO `pagescat` VALUES (1, 1, 1, 'Introductie');
INSERT INTO `pagescat` VALUES (2, 2, 1, 'Voorbeeld advertentie');
INSERT INTO `pagescat` VALUES (3, 3, 1, 'Automatische verlenging');

-- --------------------------------------------------------

-- 
-- Tabel structuur voor tabel `user`
-- 

CREATE TABLE `user` (
  `userID` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL default '',
  `password` varchar(25) NOT NULL default '',
  `kvknr` varchar(50) default NULL,
  `btwnr` varchar(50) default NULL,
  `type` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Gegevens worden uitgevoerd voor tabel `user`
-- 

INSERT INTO `user` VALUES (1, 'info@speurgroep.nl', 'Lennon460', '55665888', '851.8090248.B01', 'owner');
