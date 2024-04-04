DROP TABLE IF EXISTS `Preferences`;
DROP TABLE IF EXISTS `Applications`;
DROP TABLE IF EXISTS `PreferencesForRooms`;
DROP TABLE IF EXISTS `Rooms`;
DROP TABLE IF EXISTS `Students`;
DROP TABLE IF EXISTS `Mails`;
DROP TABLE IF EXISTS `Admin_Hostel_Manager`;











-- Table: Admin_Hostel_Manager

CREATE TABLE `Admin_Hostel_Manager` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `MobNo` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsAdmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY (`Username`)
);

-- Table: Mails
CREATE TABLE `Mails` (
  `MIS` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Is_registered` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MIS`)
);


-- Table: Students
CREATE TABLE `Students` (
  `MIS` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mob` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Year_of_study` enum('FY', 'SY', 'TY','Final Year') NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Category` enum('Open', 'EWS', 'OBC','SC','ST') NOT NULL,
  PRIMARY KEY (`MIS`),
  FOREIGN KEY (`MIS`) REFERENCES `Mails` (`MIS`) ON DELETE CASCADE
);





-- Table: Rooms
CREATE TABLE `Rooms` (
  `room_no` int(3) NOT NULL,
  `Is_alloted` tinyint(1),
  `MIS1` varchar(255),
  `MIS2` varchar(255),
  `MIS3` varchar(255),
  `MIS4` varchar(255),
  PRIMARY KEY (`room_no`),
  FOREIGN KEY (`MIS1`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE,
  FOREIGN KEY (`MIS2`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE,
  FOREIGN KEY (`MIS3`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE,
  FOREIGN KEY (`MIS4`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE
);



-- Table: PreferencesForRooms
CREATE TABLE `PreferencesForRooms` (
  `MIS1` varchar(255) NOT NULL,
  `MIS2` varchar(255) NOT NULL,
  `MIS3` varchar(255) NOT NULL,
  `MIS4` varchar(255) NOT NULL,
  PRIMARY KEY (`MIS1`),
  FOREIGN KEY (`MIS1`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE,
  FOREIGN KEY (`MIS2`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE,
  FOREIGN KEY (`MIS3`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE,
  FOREIGN KEY (`MIS4`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE
);

-- Table: Applications
CREATE TABLE `Applications` (
  `MIS` varchar(255) NOT NULL,
  `CGPA` decimal(5,2) NOT NULL,
  `Backlogs` int(10) NOT NULL,
  `IsApproved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MIS`),
  FOREIGN KEY (`MIS`) REFERENCES `Students` (`MIS`) ON DELETE CASCADE
);





-- Table: Preferences
CREATE TABLE `Preferences` (
  `MIS1` varchar(255) NOT NULL,
  `pref1` int(3) DEFAULT NULL,
  `pref2` int(3) DEFAULT NULL,
  `pref3` int(3) DEFAULT NULL,
  `pref4` int(3) DEFAULT NULL,
  `pref5` int(3) DEFAULT NULL,
  `pref6` int(3) DEFAULT NULL,
  `pref7` int(3) DEFAULT NULL,
  `pref8` int(3) DEFAULT NULL,
  `pref9` int(3) DEFAULT NULL,
  `pref10` int(3) DEFAULT NULL,
  `pref11` int(3) DEFAULT NULL,
  `pref12` int(3) DEFAULT NULL,
  `pref13` int(3) DEFAULT NULL,
  `pref14` int(3) DEFAULT NULL,
  `pref15` int(3) DEFAULT NULL,
  `pref16` int(3) DEFAULT NULL,
  `pref17` int(3) DEFAULT NULL,
  `pref18` int(3) DEFAULT NULL,
  `pref19` int(3) DEFAULT NULL,
  `pref20` int(3) DEFAULT NULL,
  `pref21` int(3) DEFAULT NULL,
  `pref22` int(3) DEFAULT NULL,
  `pref23` int(3) DEFAULT NULL,
  `pref24` int(3) DEFAULT NULL,
  `pref25` int(3) DEFAULT NULL,
  `pref26` int(3) DEFAULT NULL,
  `pref27` int(3) DEFAULT NULL,
  `pref28` int(3) DEFAULT NULL,
  `pref29` int(3) DEFAULT NULL,
  `pref30` int(3) DEFAULT NULL,
  `pref31` int(3) DEFAULT NULL,
  `pref32` int(3) DEFAULT NULL,
  `pref33` int(3) DEFAULT NULL,
  `pref34` int(3) DEFAULT NULL,
  `pref35` int(3) DEFAULT NULL,
  `pref36` int(3) DEFAULT NULL,
  `pref37` int(3) DEFAULT NULL,
  `pref38` int(3) DEFAULT NULL,
  `pref39` int(3) DEFAULT NULL,
  `pref40` int(3) DEFAULT NULL,
  `pref41` int(3) DEFAULT NULL,
  `pref42` int(3) DEFAULT NULL,
  `pref43` int(3) DEFAULT NULL,
  `pref44` int(3) DEFAULT NULL,
  `pref45` int(3) DEFAULT NULL,
  `pref46` int(3) DEFAULT NULL,
  `pref47` int(3) DEFAULT NULL,
  `pref48` int(3) DEFAULT NULL,
  `pref49` int(3) DEFAULT NULL,
  `pref50` int(3) DEFAULT NULL,
  PRIMARY KEY (`MIS1`),
  FOREIGN KEY (`MIS1`) REFERENCES `PreferencesForRooms` (`MIS1`) ON DELETE CASCADE
);









-- Lock Admin_Hostel_Manager table
LOCK TABLES Admin_Hostel_Manager WRITE;

-- Add data to Admin_Hostel_Manager table
INSERT INTO Admin_Hostel_Manager (Username, Name, MobNo, Mail, Password, IsAdmin) VALUES
('admin', 'Vishal Ajabe', '7620873431', 'ajabeva21.comp@coeptech.ac.in', 'admin', 1),
('manager', 'Anuj Abhang', '7620873431', 'abhangap21.comp@coeptech.ac.in', 'manager', 0);

-- Release lock on Admin_Hostel_Manager table
UNLOCK TABLES;

-- Lock Mails table
LOCK TABLES Mails WRITE;

-- Add data to Mails table
-- INSERT INTO Mails (MIS, Mail) VALUES
-- ('112103007', 'ajabeva21.comp@coeptech.ac.in'),
-- ('112103071', 'khemnarst21.comp@coeptech.ac.in'),
-- ('112103041', 'dudhalevs21.comp@coeptech.ac.in'),
-- ('112103003', 'abhangap21.comp@coeptech.ac.in');





LOAD DATA INFILE 'StudentMails.csv'
INTO TABLE `Mails`
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 0 ROWS -- ignore the first line as it doesn't contain headers
(`MIS`,`Mail`);




-- Release lock on Mails table
UNLOCK TABLES;

-- Lock Students table
LOCK TABLES Students WRITE;

-- Add data to Students table
INSERT INTO Students (MIS, Name, Mob, Branch, Year_of_study, Password, Category) VALUES
('112103007', 'Vishal Ajabe', '7620873431', 'Computer', '3', 'vishal', 'EWS'),
('112103003', 'Anuj Abhang', '7620873431', 'Computer', '3', 'anuj', 'Open'),
('112103071', 'Sanchit Khemnar', '7620873431', 'Computer', '3', 'sanchit', 'OBC'),
('112103041', 'Vedant Dudhale', '7620873431', 'Computer', '3', 'vedant', 'Open');

-- Release lock on Students table
UNLOCK TABLES;




-- Lock Rooms table
LOCK TABLES Rooms WRITE;

-- Add data to Rooms table
INSERT INTO Rooms (room_no, Is_alloted, MIS1, MIS2,MIS3,MIS4) VALUES
(1,0,NULL,NULL,NULL,NULL),
(2,0,NULL,NULL,NULL,NULL),
(3,0,NULL,NULL,NULL,NULL),
(4,0,NULL,NULL,NULL,NULL),
(5,0,NULL,NULL,NULL,NULL),
(6,0,NULL,NULL,NULL,NULL),
(7,0,NULL,NULL,NULL,NULL),
(8,0,NULL,NULL,NULL,NULL),
(9,0,NULL,NULL,NULL,NULL),
(10,0,NULL,NULL,NULL,NULL),
(11,0,NULL,NULL,NULL,NULL),
(12,0,NULL,NULL,NULL,NULL),
(13,0,NULL,NULL,NULL,NULL),
(14,0,NULL,NULL,NULL,NULL),
(15,0,NULL,NULL,NULL,NULL),
(16,0,NULL,NULL,NULL,NULL),
(17,0,NULL,NULL,NULL,NULL),
(18,0,NULL,NULL,NULL,NULL),
(19,0,NULL,NULL,NULL,NULL),
(20,0,NULL,NULL,NULL,NULL),
(21,0,NULL,NULL,NULL,NULL),
(22,0,NULL,NULL,NULL,NULL),
(23,0,NULL,NULL,NULL,NULL),
(24,0,NULL,NULL,NULL,NULL),
(25,0,NULL,NULL,NULL,NULL),
(26,0,NULL,NULL,NULL,NULL),
(27,0,NULL,NULL,NULL,NULL),
(28,0,NULL,NULL,NULL,NULL),
(29,0,NULL,NULL,NULL,NULL),
(30,0,NULL,NULL,NULL,NULL),
(31,0,NULL,NULL,NULL,NULL),
(32,0,NULL,NULL,NULL,NULL),
(33,0,NULL,NULL,NULL,NULL),
(34,0,NULL,NULL,NULL,NULL),
(35,0,NULL,NULL,NULL,NULL),
(36,0,NULL,NULL,NULL,NULL),
(37,0,NULL,NULL,NULL,NULL),
(38,0,NULL,NULL,NULL,NULL),
(39,0,NULL,NULL,NULL,NULL),
(40,0,NULL,NULL,NULL,NULL),
(41,0,NULL,NULL,NULL,NULL),
(42,0,NULL,NULL,NULL,NULL),
(43,0,NULL,NULL,NULL,NULL),
(44,0,NULL,NULL,NULL,NULL),
(45,0,NULL,NULL,NULL,NULL),
(46,0,NULL,NULL,NULL,NULL),
(47,0,NULL,NULL,NULL,NULL),
(48,0,NULL,NULL,NULL,NULL),
(49,0,NULL,NULL,NULL,NULL),
(50,0,NULL,NULL,NULL,NULL);

-- Release lock on Rooms table
UNLOCK TABLES;


LOCK TABLES PreferencesForRooms WRITE;

-- Add data to PreferencesForRooms table
INSERT INTO PreferencesForRooms (MIS1, MIS2, MIS3, MIS4) VALUES
('112103007', '112103003', '112103071', '112103041');

-- Release lock on PreferencesForRooms table
UNLOCK TABLES;


-- Lock Applications table
LOCK TABLES Applications WRITE;

-- Add data to Applications table
INSERT INTO Applications (MIS, CGPA, Backlogs, IsApproved) VALUES
('112103007', 8.5, 0, 0),
('112103003', 6.5, 0, 0),
('112103071', 8.1, 0, 0),
('112103041', 7.8, 1, 0);

-- Release lock on Applications table
UNLOCK TABLES;

-- Lock PreferencesForRooms table

-- Lock Preferences table
LOCK TABLES Preferences WRITE;

-- Add data to Preferences table
INSERT INTO Preferences (MIS1, pref1, pref2,pref3,pref4) VALUES
('112103007', 21, 45,54,65);

-- Release lock on Preferences table
UNLOCK TABLES;
