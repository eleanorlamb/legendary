--
-- Table structure for table `expansions`
--

DROP TABLE IF EXISTS `expansions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expansions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expansions`
--

LOCK TABLES `expansions` WRITE;
/*!40000 ALTER TABLE `expansions` DISABLE KEYS */;
INSERT INTO `expansions` VALUES (1,'Base'),(2,'Dark City'),(3,'Fantastic Four'),(4,'Paint the Town Red'),(5,'Guardians of the Galaxy'),(6,'Secret Wars - Volume 1'),(7,'Secret Wars - Volume 2'),(8,'Captain America 75th Anniversary');
/*!40000 ALTER TABLE `expansions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `heroes` (
  `id` int(11) NOT NULL,
  `expansion` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `team` int(11) NOT NULL,
  `Tech` int(11) NOT NULL,
  `Strength` int(11) NOT NULL,
  `Instinct` int(11) NOT NULL,
  `Ranged` int(11) NOT NULL,
  `Covert` int(11) NOT NULL,
  `Buy` int(11) NOT NULL,
  `Fight` int(11) NOT NULL,
  `SP Team` int(11) NOT NULL,
  `SP Tech` int(11) NOT NULL,
  `SP Strength` int(11) NOT NULL,
  `SP Instinct` int(11) NOT NULL,
  `SP Ranged` int(11) NOT NULL,
  `SP Covert` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heroes`
--

LOCK TABLES `heroes` WRITE;
/*!40000 ALTER TABLE `heroes` DISABLE KEYS */;
INSERT INTO `heroes` VALUES (1,1,'Hawkeye',3,9,0,5,0,0,0,14,5,3,0,0,0,0),(2,1,'Thor',3,0,5,0,9,0,11,3,0,0,5,0,3,0),(3,1,'Iron Man',3,9,0,0,5,0,0,8,0,9,0,0,5,0),(4,1,'Black Widow',3,5,0,0,0,9,0,9,0,5,0,0,0,5),(5,1,'Hulk',3,0,9,5,0,0,0,14,0,0,6,0,0,0),(6,1,'Captain America',3,3,5,5,0,1,5,9,1,0,0,0,0,0),(7,8,'Captain America 1941',3,5,5,1,0,3,0,9,3,0,5,0,0,0),(8,8,'Captain America (Falcon)',3,3,0,5,5,1,5,9,0,0,0,5,0,0),(9,2,'Iceman',4,0,3,0,11,0,5,9,0,0,0,0,13,0),(10,2,'Nightcrawler',4,0,0,8,0,6,5,9,0,0,0,3,3,0),(11,2,'Jean Grey',4,0,0,0,6,8,5,9,6,0,0,0,0,0),(12,1,'Emma Forst',4,0,1,3,5,5,5,9,0,0,0,0,0,5),(13,1,'Gambit',4,0,0,4,5,5,3,6,0,0,0,3,0,0),(14,2,'Professor X',4,0,0,5,8,1,5,9,5,0,0,5,0,0),(15,1,'Rogue',4,0,0,0,6,8,5,6,0,0,5,0,0,5),(16,1,'Storm',4,0,0,0,11,3,5,9,0,0,0,0,6,0),(17,1,'Wolverine',4,0,0,14,0,0,0,14,0,0,0,9,0,0),(18,2,'Bishop',4,0,0,0,8,5,0,9,1,0,0,0,3,5),(19,2,'Angel',4,0,6,3,0,5,5,4,0,0,0,0,0,0),(20,1,'Cyclops',4,0,5,0,9,0,5,9,1,0,0,0,0,0),(21,8,'Agent X-13',1,5,0,1,5,3,5,14,11,0,0,0,0,3),(22,1,'Nick Fury',1,6,3,0,0,5,0,8,8,5,0,0,0,0),(23,8,'Steve Rogers',1,1,5,5,0,3,5,9,5,0,0,0,0,0),(24,1,'Spider-Man',2,3,5,5,0,1,5,5,0,0,0,0,0,0),(25,1,'Deadpool',7,5,0,4,0,5,5,9,0,0,0,0,0,0),(26,8,'Winter Soldier',7,6,5,0,0,3,5,9,0,11,0,0,0,0),(27,2,'Wolverine X-Force',5,0,3,5,0,6,0,11,0,0,0,5,0,0),(28,2,'Forge',5,14,0,0,0,0,8,9,0,11,0,0,0,0),(29,2,'Domino',5,8,0,5,0,1,14,14,6,0,0,0,0,0),(30,2,'Colossus',5,0,11,0,0,3,5,9,0,0,3,0,0,0),(31,2,'Cable',5,5,0,0,6,3,5,9,3,0,0,0,0,0),(32,2,'Ghost Rider',6,5,3,0,6,0,5,6,6,0,3,0,0,0),(33,2,'The Punisher',6,11,3,0,0,0,6,3,0,10,3,0,0,0),(34,2,'Elektra',6,0,0,9,0,5,6,8,1,0,0,0,0,5),(35,2,'Iron Fist',6,0,9,5,0,0,5,6,0,0,3,0,0,0),(36,2,'Daredevil',6,0,5,6,0,3,5,9,0,0,0,0,0,0),(37,2,'Blade',6,3,5,1,0,5,0,14,0,0,0,0,0,0);
/*!40000 ALTER TABLE `heroes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Shield'),(2,'Spider Friends'),(3,'Avengers'),(4,'X-Men'),(5,'X-Force'),(6,'Marvel Knights'),(7,'Unaffiliated');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;