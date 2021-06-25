CREATE DATABASE `recepti` /;

USE `recepti`;



DROP TABLE IF EXISTS `recepti`;

CREATE TABLE `receptii` (
  `IDRecepta` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ocena` float(11) NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IDVrste` int(11) NOT NULL,
  PRIMARY KEY (`IDRecepta`),
  KEY `IDVrste` (`IDVrste`),
  CONSTRAINT `recepti_fk1` FOREIGN KEY (`IDVrste`) REFERENCES `vrstaRecepta` (`IDVrste`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



insert  into `receptii`(`IDRecepta`,`naziv`,`ocena`,`opis`,`IDVrste`) values 
(1,'Rolovana piletina',9.3,'Spremiti  200g svezeg belog mesa, i kupiti 500 grama slanine. Sveze isitnjeno meso dodati u sos od ...',2);


DROP TABLE IF EXISTS `vrstaRecepta`;

CREATE TABLE `vrstaRecepta` (
  `IDVrste` int(11) NOT NULL,
  `NazivVrste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDVrste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


insert  into `vrstaRecepta`(`IDVrste`,`NazivVrste`) values 
(1,'Predjelo'),
(2,'Glavno jelo'),
(3,'Dezert');
