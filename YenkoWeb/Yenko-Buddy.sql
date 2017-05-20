-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: Yenko-Buddy
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ARDUINO`
--

DROP TABLE IF EXISTS `ARDUINO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ARDUINO` (
  `ArduinoID` int(11) NOT NULL AUTO_INCREMENT,
  `SimCode` varchar(45) NOT NULL,
  `RegNo` int(11) NOT NULL,
  PRIMARY KEY (`ArduinoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ARDUINO`
--

LOCK TABLES `ARDUINO` WRITE;
/*!40000 ALTER TABLE `ARDUINO` DISABLE KEYS */;
/*!40000 ALTER TABLE `ARDUINO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ASSOCIATION`
--

DROP TABLE IF EXISTS `ASSOCIATION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ASSOCIATION` (
  `AssociationID` int(11) NOT NULL AUTO_INCREMENT,
  `AssociationName` varchar(45) DEFAULT NULL,
  `ContactPerson` varchar(45) DEFAULT NULL,
  `ContactNumber` varchar(45) DEFAULT NULL,
  `SuburbID` varchar(45) DEFAULT NULL,
  `SystemAdminID` int(11) NOT NULL,
  PRIMARY KEY (`AssociationID`),
  KEY `fk_ASSOCIATION_1_idx` (`SystemAdminID`),
  CONSTRAINT `fk_ASSOCIATION_1` FOREIGN KEY (`SystemAdminID`) REFERENCES `SYSTEM-ADMINISTRATOR` (`SystemAdminID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ASSOCIATION`
--

LOCK TABLES `ASSOCIATION` WRITE;
/*!40000 ALTER TABLE `ASSOCIATION` DISABLE KEYS */;
INSERT INTO `ASSOCIATION` VALUES (1,'Newlands West Association','Thandi','06332322','NW',1);
/*!40000 ALTER TABLE `ASSOCIATION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ASSOCIATION-ADMINISTRATOR`
--

DROP TABLE IF EXISTS `ASSOCIATION-ADMINISTRATOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ASSOCIATION-ADMINISTRATOR` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `Address1` varchar(45) NOT NULL,
  `SuburbID` varchar(45) NOT NULL,
  `PostalCode` varchar(4) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `AssociationID` int(11) NOT NULL,
  PRIMARY KEY (`AdminID`),
  KEY `fk_ASSOCIATION-ADMINISTRATOR_1_idx` (`SuburbID`),
  KEY `fk_ASSOCIATION-ADMINISTRATOR_2_idx` (`AssociationID`),
  CONSTRAINT `fk_ASSOCIATION-ADMINISTRATOR_1` FOREIGN KEY (`SuburbID`) REFERENCES `SUBURB` (`SuburbID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ASSOCIATION-ADMINISTRATOR_2` FOREIGN KEY (`AssociationID`) REFERENCES `ASSOCIATION` (`AssociationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ASSOCIATION-ADMINISTRATOR`
--

LOCK TABLES `ASSOCIATION-ADMINISTRATOR` WRITE;
/*!40000 ALTER TABLE `ASSOCIATION-ADMINISTRATOR` DISABLE KEYS */;
INSERT INTO `ASSOCIATION-ADMINISTRATOR` VALUES (1,'Bongani','Somhlahlo','b@gmail.com','0333333','3 What Street','SMD','6001','bs',1);
/*!40000 ALTER TABLE `ASSOCIATION-ADMINISTRATOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CITY`
--

DROP TABLE IF EXISTS `CITY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CITY` (
  `CityID` varchar(45) NOT NULL,
  `CityName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CITY`
--

LOCK TABLES `CITY` WRITE;
/*!40000 ALTER TABLE `CITY` DISABLE KEYS */;
INSERT INTO `CITY` VALUES ('',NULL),('DBN','Durban'),('PE','Port Elizabeth');
/*!40000 ALTER TABLE `CITY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DRIVER`
--

DROP TABLE IF EXISTS `DRIVER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DRIVER` (
  `DriverID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `IDNo` varchar(13) NOT NULL,
  `ContactNumber` varchar(45) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `Address1` varchar(45) NOT NULL,
  `SuburbID` varchar(45) NOT NULL,
  `PostalCode` varchar(4) NOT NULL,
  `ProofOfResidence` varchar(45) NOT NULL,
  `DriversLicence` varchar(45) NOT NULL,
  `OwnerID` int(11) NOT NULL,
  PRIMARY KEY (`DriverID`),
  KEY `SuburbID_idx` (`SuburbID`),
  KEY `fk_DRIVER_1_idx` (`OwnerID`),
  CONSTRAINT `SuburbIDfk` FOREIGN KEY (`SuburbID`) REFERENCES `SUBURB` (`SuburbID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DRIVER_1` FOREIGN KEY (`OwnerID`) REFERENCES `OWNER` (`OwnerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DRIVER`
--

LOCK TABLES `DRIVER` WRITE;
/*!40000 ALTER TABLE `DRIVER` DISABLE KEYS */;
/*!40000 ALTER TABLE `DRIVER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `JOURNEY`
--

DROP TABLE IF EXISTS `JOURNEY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `JOURNEY` (
  `JourneyID` int(11) NOT NULL AUTO_INCREMENT,
  `RegNo` int(11) NOT NULL,
  `DriverID` int(11) NOT NULL,
  `PassengerID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `Rating` varchar(45) DEFAULT NULL,
  `Comment` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`JourneyID`,`RegNo`,`DriverID`,`PassengerID`),
  KEY `fk_JOURNEY_PASSENGER1_idx` (`PassengerID`),
  KEY `fk_JOURNEY_DRIVER2_idx` (`DriverID`),
  KEY `fk_JOURNEY_1_idx` (`RegNo`),
  CONSTRAINT `fk_JOURNEY_1` FOREIGN KEY (`RegNo`) REFERENCES `TAXI` (`OwnerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_JOURNEY_DRIVER2` FOREIGN KEY (`DriverID`) REFERENCES `DRIVER` (`DriverID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_JOURNEY_PASSENGER1` FOREIGN KEY (`PassengerID`) REFERENCES `PASSENGER` (`PassengerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `JOURNEY`
--

LOCK TABLES `JOURNEY` WRITE;
/*!40000 ALTER TABLE `JOURNEY` DISABLE KEYS */;
/*!40000 ALTER TABLE `JOURNEY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OWNER`
--

DROP TABLE IF EXISTS `OWNER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OWNER` (
  `OwnerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `IDNo` varchar(13) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `Address1` varchar(45) NOT NULL,
  `SuburbID` varchar(45) NOT NULL,
  `PostalCode` varchar(4) NOT NULL,
  `NoOfTaxis` varchar(45) NOT NULL,
  `AssociationID` int(11) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `ProofOfResidence` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`OwnerID`),
  KEY `SuburbID_idx` (`SuburbID`),
  KEY `fk_OWNER_1_idx` (`AssociationID`),
  CONSTRAINT `SuburbID` FOREIGN KEY (`SuburbID`) REFERENCES `SUBURB` (`SuburbID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OWNER_1` FOREIGN KEY (`AssociationID`) REFERENCES `ASSOCIATION` (`AssociationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OWNER`
--

LOCK TABLES `OWNER` WRITE;
/*!40000 ALTER TABLE `OWNER` DISABLE KEYS */;
INSERT INTO `OWNER` VALUES (3,'Nobuhle','Luthuli','9309160396085','weeluthuli@gmail.com','01269871','133 Litchirich Road','NW','4037','23',1,'lut',''),(4,'Wendy','Luthuli','92060506081','w@gmail.com','01269871','133 Litchirich Road','NW','4037','3',1,'ii',''),(5,'l','u','t','h','u','l','NW','1','2',NULL,'l',NULL),(6,'Wendy','Luthuli','92060506081','weeluthuli@gmail.com','01269871','133 Litchirich Road','NW','4037','23',NULL,'n','');
/*!40000 ALTER TABLE `OWNER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PASSENGER`
--

DROP TABLE IF EXISTS `PASSENGER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PASSENGER` (
  `PassengerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Kin1: Name` varchar(45) NOT NULL,
  `Kin1: ContactNumber` varchar(10) NOT NULL,
  `Kin2: Name` varchar(45) NOT NULL,
  `Kin2: ContactNumber` varchar(45) NOT NULL,
  PRIMARY KEY (`PassengerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PASSENGER`
--

LOCK TABLES `PASSENGER` WRITE;
/*!40000 ALTER TABLE `PASSENGER` DISABLE KEYS */;
/*!40000 ALTER TABLE `PASSENGER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROBLEM`
--

DROP TABLE IF EXISTS `PROBLEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROBLEM` (
  `ProblemID` int(11) NOT NULL AUTO_INCREMENT,
  `Time` datetime NOT NULL,
  `Date` date NOT NULL,
  `Comment` varchar(45) NOT NULL,
  `RegNo` int(11) NOT NULL,
  `PassengerID` int(11) NOT NULL,
  `TypeID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ProblemID`),
  KEY `fk_PROBLEM_2_idx` (`TypeID`),
  KEY `fk_PROBLEM_1_idx` (`PassengerID`),
  CONSTRAINT `fk_PROBLEM_1` FOREIGN KEY (`PassengerID`) REFERENCES `PASSENGER` (`PassengerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROBLEM_2` FOREIGN KEY (`TypeID`) REFERENCES `PROBLEM-TYPE` (`TypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROBLEM`
--

LOCK TABLES `PROBLEM` WRITE;
/*!40000 ALTER TABLE `PROBLEM` DISABLE KEYS */;
/*!40000 ALTER TABLE `PROBLEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROBLEM-TYPE`
--

DROP TABLE IF EXISTS `PROBLEM-TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROBLEM-TYPE` (
  `TypeID` varchar(45) NOT NULL,
  `Descripton` varchar(45) NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROBLEM-TYPE`
--

LOCK TABLES `PROBLEM-TYPE` WRITE;
/*!40000 ALTER TABLE `PROBLEM-TYPE` DISABLE KEYS */;
/*!40000 ALTER TABLE `PROBLEM-TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUBURB`
--

DROP TABLE IF EXISTS `SUBURB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUBURB` (
  `SuburbID` varchar(45) NOT NULL,
  `SuburbName` varchar(45) DEFAULT NULL,
  `CityID` varchar(45) NOT NULL,
  PRIMARY KEY (`SuburbID`),
  KEY `CityID_idx` (`CityID`),
  CONSTRAINT `CityID` FOREIGN KEY (`CityID`) REFERENCES `CITY` (`CityID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUBURB`
--

LOCK TABLES `SUBURB` WRITE;
/*!40000 ALTER TABLE `SUBURB` DISABLE KEYS */;
INSERT INTO `SUBURB` VALUES ('NW','Newlands West','DBN'),('SMD','Summerstrand','PE');
/*!40000 ALTER TABLE `SUBURB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SYSTEM-ADMINISTRATOR`
--

DROP TABLE IF EXISTS `SYSTEM-ADMINISTRATOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SYSTEM-ADMINISTRATOR` (
  `SystemAdminID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `IDNo` varchar(13) NOT NULL,
  `ContactNumber` varchar(45) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `Address1` varchar(45) NOT NULL,
  `SuburbID` varchar(45) NOT NULL,
  `PostalCode` varchar(4) NOT NULL,
  `ProofOfResidence` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`SystemAdminID`),
  KEY `fk_SYSTEM-ADMINISTRATOR_1_idx` (`SuburbID`),
  CONSTRAINT `fk_SYSTEM-ADMINISTRATOR_1` FOREIGN KEY (`SuburbID`) REFERENCES `SUBURB` (`SuburbID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SYSTEM-ADMINISTRATOR`
--

LOCK TABLES `SYSTEM-ADMINISTRATOR` WRITE;
/*!40000 ALTER TABLE `SYSTEM-ADMINISTRATOR` DISABLE KEYS */;
INSERT INTO `SYSTEM-ADMINISTRATOR` VALUES (1,'Bongani','Somhlahlo','558855555','06102222','b@gmail.com','1 What Street','SMD','6001','','bs');
/*!40000 ALTER TABLE `SYSTEM-ADMINISTRATOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TAXI`
--

DROP TABLE IF EXISTS `TAXI`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TAXI` (
  `RegNo` varchar(45) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `Description` varchar(45) NOT NULL,
  `Model` varchar(45) NOT NULL,
  `Year` varchar(4) NOT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `OwnerID` int(11) NOT NULL,
  PRIMARY KEY (`RegNo`),
  KEY `fk_TAXI_1_idx` (`OwnerID`),
  CONSTRAINT `fk_TAXI_1` FOREIGN KEY (`OwnerID`) REFERENCES `OWNER` (`OwnerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TAXI`
--

LOCK TABLES `TAXI` WRITE;
/*!40000 ALTER TABLE `TAXI` DISABLE KEYS */;
/*!40000 ALTER TABLE `TAXI` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TAXI-DRIVER`
--

DROP TABLE IF EXISTS `TAXI-DRIVER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TAXI-DRIVER` (
  `RegNo` int(11) NOT NULL,
  `DriverID` int(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  PRIMARY KEY (`RegNo`,`DriverID`),
  KEY `fk_TAXI-DRIVER_TAXI1_idx` (`RegNo`),
  KEY `fk_TAXI-DRIVER_1_idx` (`DriverID`),
  CONSTRAINT `fk_TAXI-DRIVER_1` FOREIGN KEY (`DriverID`) REFERENCES `DRIVER` (`DriverID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TAXI-DRIVER_2` FOREIGN KEY (`RegNo`) REFERENCES `TAXI` (`OwnerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TAXI-DRIVER`
--

LOCK TABLES `TAXI-DRIVER` WRITE;
/*!40000 ALTER TABLE `TAXI-DRIVER` DISABLE KEYS */;
/*!40000 ALTER TABLE `TAXI-DRIVER` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-05 16:07:05
