/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100110
Source Host           : localhost:3306
Source Database       : employee

Target Server Type    : MYSQL
Target Server Version : 100110
File Encoding         : 65001

Date: 2017-05-12 22:23:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for client_tb
-- ----------------------------
DROP TABLE IF EXISTS `client_tb`;
CREATE TABLE `client_tb` (
  `PK_clientID` int(20) NOT NULL AUTO_INCREMENT,
  `client_title` varchar(20) DEFAULT NULL,
  `client_firstname` varchar(20) NOT NULL,
  `client_lastname` varchar(20) NOT NULL,
  `client_phone` int(20) DEFAULT NULL,
  `client_email` varchar(20) DEFAULT NULL,
  `client_wechat` varchar(20) DEFAULT NULL,
  `client_address` varchar(20) DEFAULT NULL,
  `client_NoOfPurchased` int(20) DEFAULT NULL,
  `client_firb` tinyint(1) DEFAULT NULL,
  `client_Subscriptions` tinyint(1) DEFAULT NULL,
  `client_comments` varchar(100) DEFAULT NULL,
  `FK_saleID` int(20) NOT NULL,
  PRIMARY KEY (`PK_clientID`),
  UNIQUE KEY `PK_clientID_2` (`PK_clientID`),
  KEY `PK_clientID` (`PK_clientID`),
  KEY `FK_saleID` (`FK_saleID`),
  KEY `client_firstname` (`client_firstname`,`client_lastname`),
  KEY `client_phone` (`client_phone`),
  KEY `client_email` (`client_email`),
  CONSTRAINT `client_tb_ibfk_1` FOREIGN KEY (`FK_saleID`) REFERENCES `staff_tb` (`PK_staffID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of client_tb
-- ----------------------------
INSERT INTO `client_tb` VALUES ('1', 'Highest', 'J ', 'SEHN', '1234567890', 'jj@163.com', 'AAA', 'first street', '1', '1', '1', 'highest', '1');
INSERT INTO `client_tb` VALUES ('2', 'High', 'J', 'YOU', '2147483647', '15@163.COM', 'BBB ', 'second street', '1', '1', '1', 'high', '2');
INSERT INTO `client_tb` VALUES ('3', 'Best', 'H', 'GU', '2147483647', 'gu@hotmail.com', 'CCC', 'third', '2', '0', '0', 'best', '3');
INSERT INTO `client_tb` VALUES ('4', 'Good', 'M', 'TSU', '2147483647', 'yd@hotmail.com', 'DDD', 'fourth', '2', '0', '0', 'good', '3');
INSERT INTO `client_tb` VALUES ('5', 'five', 'AA', 'BB', '2147483647', 'hi@hello.com', 'AGGD', 'fifth', '2', '1', '0', 'very good', '5');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Carine ', 'Schmitt', '40.32.2555', '54, rue Royale', 'Nantes', 'France');
INSERT INTO `customers` VALUES ('2', 'Jean', 'King', '7025551838', '8489 Strong St.', 'Las Vegas', 'USA');
INSERT INTO `customers` VALUES ('3', 'Peter', 'Ferguson', '03 9520 4555', '636 St Kilda Road', 'Melbourne', 'Australia');
INSERT INTO `customers` VALUES ('4', 'Janine ', 'Labrune', '40.67.8555', '67, rue des Cinquante Otages', 'Nantes', 'France');
INSERT INTO `customers` VALUES ('5', 'Jonas ', 'Bergulfsen', '07-98 9555', 'Erling Skakkes gate 78', 'Stavern', 'Norway');
INSERT INTO `customers` VALUES ('6', 'Susan', 'Nelson', '4155551450', '5677 Strong St.', 'San Rafael', 'USA');
INSERT INTO `customers` VALUES ('7', 'Zbyszek ', 'Piestrzeniewicz', '(26) 642-7555', 'ul. Filtrowa 68', 'Warszawa', 'Poland');
INSERT INTO `customers` VALUES ('8', 'Roland', 'Keitel', '+49 69 66 90 2555', 'Lyonerstr. 34', 'Frankfurt', 'Germany');
INSERT INTO `customers` VALUES ('9', 'Julie', 'Murphy', '6505555787', '5557 North Pendale Street', 'San Francisco', 'USA');
INSERT INTO `customers` VALUES ('10', 'Kwai', 'Lee', '2125557818', '897 Long Airport Avenue', 'NYC', 'USA');
INSERT INTO `customers` VALUES ('11', 'Diego ', 'Freyre', '(91) 555 94 44', 'C/ Moralzarzal, 86', 'Madrid', 'Spain');
INSERT INTO `customers` VALUES ('12', 'Christina ', 'Berglund', '0921-12 3555', 'Berguvsvägen  8', 'Luleå', 'Sweden');
INSERT INTO `customers` VALUES ('13', 'Jytte ', 'Petersen', '31 12 3555', 'Vinbæltet 34', 'Kobenhavn', 'Denmark');
INSERT INTO `customers` VALUES ('14', 'Mary ', 'Saveley', '78.32.5555', '2, rue du Commerce', 'Lyon', 'France');
INSERT INTO `customers` VALUES ('15', 'Eric', 'Natividad', '+65 221 7555', 'Bronz Sok.', 'Singapore', 'Singapore');
INSERT INTO `customers` VALUES ('16', 'Jeff', 'Young', '2125557413', '4092 Furth Circle', 'NYC', 'USA');
INSERT INTO `customers` VALUES ('17', 'Kelvin', 'Leong', '2155551555', '7586 Pompton St.', 'Allentown', 'USA');
INSERT INTO `customers` VALUES ('18', 'Juri', 'Hashimoto', '6505556809', '9408 Furth Circle', 'Burlingame', 'USA');
INSERT INTO `customers` VALUES ('19', 'Wendy', 'Victorino', '+65 224 1555', '106 Linden Road Sandown', 'Singapore', 'Singapore');
INSERT INTO `customers` VALUES ('20', 'Veysel', 'Oeztan', '+47 2267 3215', 'Brehmen St. 121', 'Bergen', 'Norway  ');
INSERT INTO `customers` VALUES ('21', 'Keith', 'Franco', '2035557845', '149 Spinnaker Dr.', 'New Haven', 'USA');
INSERT INTO `customers` VALUES ('22', 'Isabel ', 'de Castro', '(1) 356-5555', 'Estrada da saúde n. 58', 'Lisboa', 'Portugal');
INSERT INTO `customers` VALUES ('23', 'Martine ', 'Rancé', '20.16.1555', '184, chaussée de Tournai', 'Lille', 'France');
INSERT INTO `customers` VALUES ('24', 'Marie', 'Bertrand', '(1) 42.34.2555', '265, boulevard Charonne', 'Paris', 'France');
INSERT INTO `customers` VALUES ('25', 'Jerry', 'Tseng', '6175555555', '4658 Baden Av.', 'Cambridge', 'USA');
INSERT INTO `customers` VALUES ('26', 'Julie', 'King', '2035552570', '25593 South Bay Ln.', 'Bridgewater', 'USA');
INSERT INTO `customers` VALUES ('27', 'Mory', 'Kentary', '+81 06 6342 5555', '1-6-20 Dojima', 'Kita-ku', 'Japan');
INSERT INTO `customers` VALUES ('28', 'Michael', 'Frick', '2125551500', '2678 Kingston Rd.', 'NYC', 'USA');
INSERT INTO `customers` VALUES ('29', 'Matti', 'Karttunen', '90-224 8555', 'Keskuskatu 45', 'Helsinki', 'Finland');
INSERT INTO `customers` VALUES ('30', 'Rachel', 'Ashworth', '(171) 555-1555', 'Fauntleroy Circus', 'Manchester', 'UK');
INSERT INTO `customers` VALUES ('31', 'Dean', 'Cassidy', '+353 1862 1555', '25 Maiden Lane', 'Dublin', 'Ireland');
INSERT INTO `customers` VALUES ('32', 'Leslie', 'Taylor', '6175558428', '16780 Pompton St.', 'Brickhaven', 'USA');
INSERT INTO `customers` VALUES ('33', 'Elizabeth', 'Devon', '(171) 555-2282', '12, Berkeley Gardens Blvd', 'Liverpool', 'UK');
INSERT INTO `customers` VALUES ('34', 'Yoshi ', 'Tamuri', '(604) 555-3392', '1900 Oak St.', 'Vancouver', 'Canada');
INSERT INTO `customers` VALUES ('35', 'Miguel', 'Barajas', '6175557555', '7635 Spinnaker Dr.', 'Brickhaven', 'USA');
INSERT INTO `customers` VALUES ('36', 'Julie', 'Young', '6265557265', '78934 Hillside Dr.', 'Pasadena', 'USA');
INSERT INTO `customers` VALUES ('37', 'Brydey', 'Walker', '+612 9411 1555', 'Suntec Tower Three', 'Singapore', 'Singapore');
INSERT INTO `customers` VALUES ('38', 'Frédérique ', 'Citeaux', '88.60.1555', '24, place Kléber', 'Strasbourg', 'France');
INSERT INTO `customers` VALUES ('39', 'Mike', 'Gao', '+852 2251 1555', 'Bank of China Tower', 'Central Hong Kong', 'Hong Kong');
INSERT INTO `customers` VALUES ('40', 'Eduardo ', 'Saavedra', '(93) 203 4555', 'Rambla de Cataluña, 23', 'Barcelona', 'Spain');
INSERT INTO `customers` VALUES ('41', 'Mary', 'Young', '3105552373', '4097 Douglas Av.', 'Glendale', 'USA');
INSERT INTO `customers` VALUES ('42', 'Horst ', 'Kloss', '0372-555188', 'Taucherstraße 10', 'Cunewalde', 'Germany');
INSERT INTO `customers` VALUES ('43', 'Palle', 'Ibsen', '86 21 3555', 'Smagsloget 45', 'Århus', 'Denmark');
INSERT INTO `customers` VALUES ('44', 'Jean ', 'Fresnière', '(514) 555-8054', '43 rue St. Laurent', 'Montréal', 'Canada');
INSERT INTO `customers` VALUES ('45', 'Alejandra ', 'Camino', '(91) 745 6555', 'Gran Vía, 1', 'Madrid', 'Spain');
INSERT INTO `customers` VALUES ('46', 'Valarie', 'Thompson', '7605558146', '361 Furth Circle', 'San Diego', 'USA');
INSERT INTO `customers` VALUES ('47', 'Helen ', 'Bennett', '(198) 555-8888', 'Garden House', 'Cowes', 'UK');
INSERT INTO `customers` VALUES ('48', 'Annette ', 'Roulet', '61.77.6555', '1 rue Alsace-Lorraine', 'Toulouse', 'France');
INSERT INTO `customers` VALUES ('49', 'Renate ', 'Messner', '069-0555984', 'Magazinweg 7', 'Frankfurt', 'Germany');
INSERT INTO `customers` VALUES ('50', 'Paolo ', 'Accorti', '011-4988555', 'Via Monte Bianco 34', 'Torino', 'Italy');
INSERT INTO `customers` VALUES ('51', 'Daniel', 'Da Silva', '+33 1 46 62 7555', '27 rue du Colonel Pierre Avia', 'Paris', 'France');
INSERT INTO `customers` VALUES ('52', 'Daniel ', 'Tonini', '30.59.8555', '67, avenue de l\'Europe', 'Versailles', 'France');
INSERT INTO `customers` VALUES ('53', 'Henriette ', 'Pfalzheim', '0221-5554327', 'Mehrheimerstr. 369', 'Köln', 'Germany');
INSERT INTO `customers` VALUES ('54', 'Elizabeth ', 'Lincoln', '(604) 555-4555', '23 Tsawassen Blvd.', 'Tsawassen', 'Canada');
INSERT INTO `customers` VALUES ('55', 'Peter ', 'Franken', '089-0877555', 'Berliner Platz 43', 'München', 'Germany');
INSERT INTO `customers` VALUES ('56', 'Anna', 'O\'Hara', '02 9936 8555', '201 Miller Street', 'North Sydney', 'Australia');
INSERT INTO `customers` VALUES ('57', 'Giovanni ', 'Rovelli', '035-640555', 'Via Ludovico il Moro 22', 'Bergamo', 'Italy');
INSERT INTO `customers` VALUES ('58', 'Adrian', 'Huxley', '+61 2 9495 8555', 'Monitor Money Building', 'Chatswood', 'Australia');
INSERT INTO `customers` VALUES ('59', 'Marta', 'Hernandez', '6175558555', '39323 Spinnaker Dr.', 'Cambridge', 'USA');
INSERT INTO `customers` VALUES ('60', 'Ed', 'Harrison', '+41 26 425 50 01', 'Rte des Arsenaux 41 ', 'Fribourg', 'Switzerland');
INSERT INTO `customers` VALUES ('61', 'Mihael', 'Holz', '0897-034555', 'Grenzacherweg 237', 'Genève', 'Switzerland');
INSERT INTO `customers` VALUES ('62', 'Jan', 'Klaeboe', '+47 2212 1555', 'Drammensveien 126A', 'Oslo', 'Norway  ');
INSERT INTO `customers` VALUES ('63', 'Bradley', 'Schuyler', '+31 20 491 9555', 'Kingsfordweg 151', 'Amsterdam', 'Netherlands');
INSERT INTO `customers` VALUES ('64', 'Mel', 'Andersen', '030-0074555', 'Obere Str. 57', 'Berlin', 'Germany');
INSERT INTO `customers` VALUES ('65', 'Pirkko', 'Koskitalo', '981-443655', 'Torikatu 38', 'Oulu', 'Finland');
INSERT INTO `customers` VALUES ('66', 'Catherine ', 'Dewey', '(02) 5554 67', 'Rue Joseph-Bens 532', 'Bruxelles', 'Belgium');
INSERT INTO `customers` VALUES ('67', 'Steve', 'Frick', '9145554562', '3758 North Pendale Street', 'White Plains', 'USA');
INSERT INTO `customers` VALUES ('68', 'Wing', 'Huang', '5085559555', '4575 Hillside Dr.', 'New Bedford', 'USA');
INSERT INTO `customers` VALUES ('69', 'Julie', 'Brown', '6505551386', '7734 Strong St.', 'San Francisco', 'USA');
INSERT INTO `customers` VALUES ('70', 'Mike', 'Graham', '+64 9 312 5555', '162-164 Grafton Road', 'Auckland  ', 'New Zealand');
INSERT INTO `customers` VALUES ('71', 'Ann ', 'Brown', '(171) 555-0297', '35 King George', 'London', 'UK');
INSERT INTO `customers` VALUES ('72', 'William', 'Brown', '2015559350', '7476 Moss Rd.', 'Newark', 'USA');
INSERT INTO `customers` VALUES ('73', 'Ben', 'Calaghan', '61-7-3844-6555', '31 Duncan St. West End', 'South Brisbane', 'Australia');
INSERT INTO `customers` VALUES ('74', 'Kalle', 'Suominen', '+358 9 8045 555', 'Software Engineering Center', 'Espoo', 'Finland');
INSERT INTO `customers` VALUES ('75', 'Philip ', 'Cramer', '0555-09555', 'Maubelstr. 90', 'Brandenburg', 'Germany');
INSERT INTO `customers` VALUES ('76', 'Francisca', 'Cervantes', '2155554695', '782 First Street', 'Philadelphia', 'USA');
INSERT INTO `customers` VALUES ('77', 'Jesus', 'Fernandez', '+34 913 728 555', 'Merchants House', 'Madrid', 'Spain');
INSERT INTO `customers` VALUES ('78', 'Brian', 'Chandler', '2155554369', '6047 Douglas Av.', 'Los Angeles', 'USA');
INSERT INTO `customers` VALUES ('79', 'Patricia ', 'McKenna', '2967 555', '8 Johnstown Road', 'Cork', 'Ireland');
INSERT INTO `customers` VALUES ('80', 'Laurence ', 'Lebihan', '91.24.4555', '12, rue des Bouchers', 'Marseille', 'France');
INSERT INTO `customers` VALUES ('81', 'Paul ', 'Henriot', '26.47.1555', '59 rue de l\'Abbaye', 'Reims', 'France');
INSERT INTO `customers` VALUES ('82', 'Armand', 'Kuger', '+27 21 550 3555', '1250 Pretorius Street', 'Hatfield', 'South Africa');
INSERT INTO `customers` VALUES ('83', 'Wales', 'MacKinlay', '64-9-3763555', '199 Great North Road', 'Auckland', 'New Zealand');
INSERT INTO `customers` VALUES ('84', 'Karin', 'Josephs', '0251-555259', 'Luisenstr. 48', 'Münster', 'Germany');
INSERT INTO `customers` VALUES ('85', 'Juri', 'Yoshido', '6175559555', '8616 Spinnaker Dr.', 'Boston', 'USA');
INSERT INTO `customers` VALUES ('86', 'Dorothy', 'Young', '6035558647', '2304 Long Airport Avenue', 'Nashua', 'USA');
INSERT INTO `customers` VALUES ('87', 'Lino ', 'Rodriguez', '(1) 354-2555', 'Jardim das rosas n. 32', 'Lisboa', 'Portugal');
INSERT INTO `customers` VALUES ('88', 'Braun', 'Urs', '0452-076555', 'Hauptstr. 29', 'Bern', 'Switzerland');
INSERT INTO `customers` VALUES ('89', 'Allen', 'Nelson', '6175558555', '7825 Douglas Av.', 'Brickhaven', 'USA');
INSERT INTO `customers` VALUES ('90', 'Pascale ', 'Cartrain', '(071) 23 67 2555', 'Boulevard Tirou, 255', 'Charleroi', 'Belgium');
INSERT INTO `customers` VALUES ('91', 'Georg ', 'Pipps', '6562-9555', 'Geislweg 14', 'Salzburg', 'Austria');
INSERT INTO `customers` VALUES ('92', 'Arnold', 'Cruz', '+63 2 555 3587', '15 McCallum Street', 'Makati City', 'Philippines');
INSERT INTO `customers` VALUES ('93', 'Maurizio ', 'Moroni', '0522-556555', 'Strada Provinciale 124', 'Reggio Emilia', 'Italy');
INSERT INTO `customers` VALUES ('94', 'Akiko', 'Shimamura', '+81 3 3584 0555', '2-2-8 Roppongi', 'Minato-ku', 'Japan');
INSERT INTO `customers` VALUES ('95', 'Dominique', 'Perrier', '(1) 47.55.6555', '25, rue Lauriston', 'Paris', 'France');
INSERT INTO `customers` VALUES ('96', 'Rita ', 'Müller', '0711-555361', 'Adenauerallee 900', 'Stuttgart', 'Germany');
INSERT INTO `customers` VALUES ('97', 'Sarah', 'McRoy', '04 499 9555', '101 Lambton Quay', 'Wellington', 'New Zealand');
INSERT INTO `customers` VALUES ('98', 'Michael', 'Donnermeyer', ' +49 89 61 08 9555', 'Hansastr. 15', 'Munich', 'Germany');
INSERT INTO `customers` VALUES ('99', 'Maria', 'Hernandez', '2125558493', '5905 Pompton St.', 'NYC', 'USA');
INSERT INTO `customers` VALUES ('100', 'Alexander ', 'Feuer', '0342-555176', 'Heerstr. 22', 'Leipzig', 'Germany');
INSERT INTO `customers` VALUES ('101', 'Dan', 'Lewis', '2035554407', '2440 Pompton St.', 'Glendale', 'USA');
INSERT INTO `customers` VALUES ('102', 'Martha', 'Larsson', '0695-34 6555', 'Åkergatan 24', 'Bräcke', 'Sweden');
INSERT INTO `customers` VALUES ('103', 'Sue', 'Frick', '4085553659', '3086 Ingle Ln.', 'San Jose', 'USA');
INSERT INTO `customers` VALUES ('104', 'Roland ', 'Mendel', '7675-3555', 'Kirchgasse 6', 'Graz', 'Austria');
INSERT INTO `customers` VALUES ('105', 'Leslie', 'Murphy', '2035559545', '567 North Pendale Street', 'New Haven', 'USA');
INSERT INTO `customers` VALUES ('106', 'Yu', 'Choi', '2125551957', '5290 North Pendale Street', 'NYC', 'USA');
INSERT INTO `customers` VALUES ('107', 'Martín ', 'Sommer', '(91) 555 22 82', 'C/ Araquil, 67', 'Madrid', 'Spain');
INSERT INTO `customers` VALUES ('108', 'Sven ', 'Ottlieb', '0241-039123', 'Walserweg 21', 'Aachen', 'Germany');
INSERT INTO `customers` VALUES ('109', 'Violeta', 'Benitez', '5085552555', '1785 First Street', 'New Bedford', 'USA');
INSERT INTO `customers` VALUES ('110', 'Carmen', 'Anton', '+34 913 728555', 'c/ Gobelas, 19-1 Urb. La Florida', 'Madrid', 'Spain');
INSERT INTO `customers` VALUES ('111', 'Sean', 'Clenahan', '61-9-3844-6555', '7 Allen Street', 'Glen Waverly', 'Australia');
INSERT INTO `customers` VALUES ('112', 'Franco', 'Ricotti', '+39 022515555', '20093 Cologno Monzese', 'Milan', 'Italy');
INSERT INTO `customers` VALUES ('113', 'Steve', 'Thompson', '3105553722', '3675 Furth Circle', 'Burbank', 'USA');
INSERT INTO `customers` VALUES ('114', 'Hanna ', 'Moos', '0621-08555', 'Forsterstr. 57', 'Mannheim', 'Germany');
INSERT INTO `customers` VALUES ('115', 'Alexander ', 'Semenov', '+7 812 293 0521', '2 Pobedy Square', 'Saint Petersburg', 'Russia');
INSERT INTO `customers` VALUES ('116', 'Raanan', 'Altagar,G M', '+ 972 9 959 8555', '3 Hagalim Blv.', 'Herzlia', 'Israel');
INSERT INTO `customers` VALUES ('117', 'José Pedro ', 'Roel', '(95) 555 82 82', 'C/ Romero, 33', 'Sevilla', 'Spain');
INSERT INTO `customers` VALUES ('118', 'Rosa', 'Salazar', '2155559857', '11328 Douglas Av.', 'Philadelphia', 'USA');
INSERT INTO `customers` VALUES ('119', 'Sue', 'Taylor', '4155554312', '2793 Furth Circle', 'Brisbane', 'USA');
INSERT INTO `customers` VALUES ('120', 'Thomas ', 'Smith', '(171) 555-7555', '120 Hanover Sq.', 'London', 'UK');
INSERT INTO `customers` VALUES ('121', 'Valarie', 'Franco', '6175552555', '6251 Ingle Ln.', 'Boston', 'USA');
INSERT INTO `customers` VALUES ('122', 'Tony', 'Snowden', '+64 9 5555500', 'Arenales 1938 3\'A\'', 'Auckland  ', 'New Zealand');

-- ----------------------------
-- Table structure for department_tb
-- ----------------------------
DROP TABLE IF EXISTS `department_tb`;
CREATE TABLE `department_tb` (
  `PK_deptID` int(20) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(20) DEFAULT NULL,
  `dept_leader` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PK_deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department_tb
-- ----------------------------
INSERT INTO `department_tb` VALUES ('1', 'Team A', 'A leader');
INSERT INTO `department_tb` VALUES ('2', 'Team B', 'B leader');
INSERT INTO `department_tb` VALUES ('3', 'Team C ', 'C leader');
INSERT INTO `department_tb` VALUES ('4', 'Team D ', 'D leader');
INSERT INTO `department_tb` VALUES ('5', 'Team E ', 'E leader');

-- ----------------------------
-- Table structure for login_tb
-- ----------------------------
DROP TABLE IF EXISTS `login_tb`;
CREATE TABLE `login_tb` (
  `PK_LoginID` int(10) NOT NULL,
  `login_name` varchar(20) DEFAULT NULL,
  `login_password` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PK_LoginID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_tb
-- ----------------------------
INSERT INTO `login_tb` VALUES ('0', null, null, null);
INSERT INTO `login_tb` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'active');
INSERT INTO `login_tb` VALUES ('2', 'Eddy', '817ac4898a54568561273707d3c2b90a', 'active');

-- ----------------------------
-- Table structure for projectdeveloper_tb
-- ----------------------------
DROP TABLE IF EXISTS `projectdeveloper_tb`;
CREATE TABLE `projectdeveloper_tb` (
  `PK_PDID` int(20) NOT NULL AUTO_INCREMENT,
  `SD_name` varchar(20) NOT NULL,
  `SD_comments` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PK_PDID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projectdeveloper_tb
-- ----------------------------
INSERT INTO `projectdeveloper_tb` VALUES ('1', 'Sun', 'A');
INSERT INTO `projectdeveloper_tb` VALUES ('2', 'Moon', 'B');
INSERT INTO `projectdeveloper_tb` VALUES ('3', 'Earth', 'C');
INSERT INTO `projectdeveloper_tb` VALUES ('4', 'Star', 'D');
INSERT INTO `projectdeveloper_tb` VALUES ('5', 'Space', 'E');
INSERT INTO `projectdeveloper_tb` VALUES ('6', 'World', 'F');

-- ----------------------------
-- Table structure for project_tb
-- ----------------------------
DROP TABLE IF EXISTS `project_tb`;
CREATE TABLE `project_tb` (
  `PK_SPID` int(20) NOT NULL AUTO_INCREMENT,
  `SP_name` varchar(20) NOT NULL,
  `SP_stage` varchar(20) DEFAULT NULL,
  `SP_comments` varchar(100) DEFAULT NULL,
  `FK_PDID` int(20) NOT NULL,
  PRIMARY KEY (`PK_SPID`),
  KEY `FK_PDID` (`FK_PDID`),
  CONSTRAINT `project_tb_ibfk_1` FOREIGN KEY (`FK_PDID`) REFERENCES `projectdeveloper_tb` (`PK_PDID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_tb
-- ----------------------------
INSERT INTO `project_tb` VALUES ('1', 'Sun', 'Apple', 'OK', '1');
INSERT INTO `project_tb` VALUES ('2', 'Moon', 'Adidas', 'OKK', '2');
INSERT INTO `project_tb` VALUES ('3', 'Earth', 'Mike', 'KKO', '3');
INSERT INTO `project_tb` VALUES ('4', 'Star', 'Kumho', 'KO', '4');
INSERT INTO `project_tb` VALUES ('5', 'Space', 'Australia', 'KK', '5');
INSERT INTO `project_tb` VALUES ('6', 'World', 'China', 'OO', '6');

-- ----------------------------
-- Table structure for property_tb
-- ----------------------------
DROP TABLE IF EXISTS `property_tb`;
CREATE TABLE `property_tb` (
  `PK_PPID` int(20) NOT NULL AUTO_INCREMENT,
  `PP_lotnumber` varchar(20) DEFAULT NULL,
  `PP_apptnumber` varchar(20) DEFAULT NULL,
  `PP_price` decimal(20,0) DEFAULT NULL,
  `FK_staffID` int(20) NOT NULL,
  `FK_clientID` int(20) NOT NULL,
  `PP_comments` varchar(100) DEFAULT NULL,
  `FK_SPID` int(20) DEFAULT NULL,
  PRIMARY KEY (`PK_PPID`),
  KEY `FK_staffID` (`FK_staffID`),
  KEY `FK_clientID` (`FK_clientID`),
  KEY `FK_SPID` (`FK_SPID`),
  CONSTRAINT `property_tb_ibfk_1` FOREIGN KEY (`FK_staffID`) REFERENCES `staff_tb` (`PK_staffID`),
  CONSTRAINT `property_tb_ibfk_2` FOREIGN KEY (`FK_clientID`) REFERENCES `client_tb` (`PK_clientID`),
  CONSTRAINT `property_tb_ibfk_3` FOREIGN KEY (`FK_SPID`) REFERENCES `project_tb` (`PK_SPID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of property_tb
-- ----------------------------
INSERT INTO `property_tb` VALUES ('1', '5', '20101', '400000', '1', '1', 'solved', '1');
INSERT INTO `property_tb` VALUES ('2', '33', '410', '40000', '2', '2', 'solved', '2');
INSERT INTO `property_tb` VALUES ('3', '35', '4120', '40000', '3', '3', 'solved', '3');
INSERT INTO `property_tb` VALUES ('4', '37', '1240', '24503', '3', '4', 'solved', '4');
INSERT INTO `property_tb` VALUES ('5', '45', '2540', '254610', '4', '4', 'solved', '5');
INSERT INTO `property_tb` VALUES ('6', '40', '4510', '5410', '5', '3', 'solved', '6');
INSERT INTO `property_tb` VALUES ('9', 'ZZZ', 'XXX', '4500', '1', '5', 'Computer', '4');
INSERT INTO `property_tb` VALUES ('10', 'KKK', 'EEE', '3000', '4', '5', 'Great', '1');

-- ----------------------------
-- Table structure for sales_tb
-- ----------------------------
DROP TABLE IF EXISTS `sales_tb`;
CREATE TABLE `sales_tb` (
  `No_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_name` varchar(255) DEFAULT NULL,
  `purchaser_name` varchar(255) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firb` tinyint(1) DEFAULT NULL,
  `LotNo` int(20) DEFAULT NULL,
  `AptNo` int(20) DEFAULT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_devname` varchar(255) DEFAULT NULL,
  `projectname` varchar(255) DEFAULT NULL,
  `price` decimal(20,0) DEFAULT NULL,
  PRIMARY KEY (`No_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sales_tb
-- ----------------------------

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `key` varchar(20) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('fontsize', '14');

-- ----------------------------
-- Table structure for staff_tb
-- ----------------------------
DROP TABLE IF EXISTS `staff_tb`;
CREATE TABLE `staff_tb` (
  `PK_staffID` int(20) NOT NULL AUTO_INCREMENT,
  `staff_firstname` varchar(20) NOT NULL,
  `staff_lastname` varchar(20) NOT NULL,
  `staff_phone` int(20) DEFAULT NULL,
  `staff_email` varchar(20) DEFAULT NULL,
  `staff_wechat` varchar(20) DEFAULT NULL,
  `staff_employment_status` varchar(20) DEFAULT NULL,
  `staff_jobtitle` varchar(20) DEFAULT NULL,
  `staff_messagetoclient` varchar(50) DEFAULT NULL,
  `staff_comments` varchar(100) DEFAULT NULL,
  `FK_department` int(20) NOT NULL,
  PRIMARY KEY (`PK_staffID`),
  KEY `FK_department` (`FK_department`),
  KEY `staff_firstname` (`staff_firstname`,`staff_lastname`),
  CONSTRAINT `staff_tb_ibfk_1` FOREIGN KEY (`FK_department`) REFERENCES `department_tb` (`PK_deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff_tb
-- ----------------------------
INSERT INTO `staff_tb` VALUES ('1', 'Lucy WANG', 'Tony Ju', '111222333', 'Lucy@hotmail.com', 'LUCY', 'Working', 'salesman', 'message1', 'good1', '1');
INSERT INTO `staff_tb` VALUES ('2', 'Lucy WANG', 'Liz', '444555666', 'Liz@hotmail.com', 'LIZ', 'Working', 'saleman2', 'message2', 'good2', '2');
INSERT INTO `staff_tb` VALUES ('3', 'Linda', 'Lin', '777888999', 'Lin@yandex.com', 'LIN', 'working', 'salesman3', 'message3', 'good3', '3');
INSERT INTO `staff_tb` VALUES ('4', 'Ollie ', 'WANG', '333666999', 'WANG@163.com', 'WANG', 'working', 'salesman4', 'message4', 'GOOD', '4');
INSERT INTO `staff_tb` VALUES ('5', ' Bill Mai', 'Susan SU', '444888666', 'Susan SU@gmail.com', 'Susan SU', 'working', 'salesman5', 'MESSAGE5 ', 'GOOD5', '5');
