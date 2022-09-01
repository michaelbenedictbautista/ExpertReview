-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: expert_review
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant` (
  `restaurant_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_mon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_tue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_wed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_thu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_fri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_sat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_hours_sun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `restaurant_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_id` int NOT NULL,
  `restaurant_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `restaurant_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`restaurant_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `restaurant_category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` VALUES (1,'363A Pitt St, Sydney NSW 2000','0292690299','https://www.facebook.com/Myungjang363A/','https://www.facebook.com/Myungjang363A/','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','myungJang.jpg','2022-03-30 09:49:32',1,'Myung jang and Obaltan restaurant','Bustling, rustic-chic Korean BBQ restaurant with individual grills and Sydney Harbour Bridge mural.'),(2,'186-188 Victoria St, Potts Point NSW 2010','0285934567','http://chacobar.com.au/','http://chacobar.com.au/','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','chacoBar.jpg','2022-03-30 09:49:45',2,'Chaco Bar','Industrial-chic destination spotlighting elevated Japanese bar bites & infused sake offerings.'),(3,'Ground Floor shop 12/501 George St, Sydney NSW 2000','0416618820','http://www.chefsgallery.com.au/','https://order-direct.com.au/group/chefsgallery','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','05:30-11:30','chefsGallery.jpg','2022-04-04 10:18:42',3,'Chefs Gallery Town Hall','Modern setup for handmade Chinese noodles and creative share plates cooked in an open kitchen.'),(4,'565 Botany Rd, Zetland NSW 2017','0291673994','https://brazilianflame.com.au/','https://brazilianflame.com.au/our-shop/','11:00-8:00','11:00-8:00','11:00-8:00','11:00-8:00','11:00-8:00','11:00-8:00','11:00-4:00','brazilianFlame.png','2022-04-04 19:36:29',6,'Brazilian Flame Meats and Barbeque','A straightforward counter-service venue offering Brazilian BBQ dishes & hearty sides.'),(5,'238-262 Bunnerong Rd, Hillsdale NSW 2036','0410538118','https://dumpling-queen.business.site/?m=true','https://dumpling-queen.business.site/?m=true#menu','10:00-9:00','10:00-9:00','10:00-9:00','10:00-9:00','10:00-9:00','10:00-9:00','10:00-9:00','dumpling.png','2022-04-04 10:00:47',3,'Dumpling Queen','Located in Eastgardens, you can Dine-in or Takeaway the best of the Chinese food in this restaurant.'),(6,'1207 Anzac Parade, Matraville NSW 2036','0293110655','https://bigbunz.npaondemand.com.au/','https://bigbunz.npaondemand.com.au/','Closed','Closed','10:30-8:15','10:30-8:15','10:30-8:15','10:30-8:15','10:30-8:15','bigBunz.png','2022-04-04 10:07:16',6,'BIG BUNZ','BIG BUNZ is real food. Real food because it’s prepared and made from scratch using fresh ingredients to give the best flavour and health benefits.\r\nIt is essentially home-made, high quality, fast food. The beef patties are home-made, using our own authentic recipe, house-ground and made from 100% grass-fed aged Angus beef, the chicken patties are 100% chicken breast fillet marinated with our own recipe. We make our own veggie patties, fillet our fish & have a large range of house-made special sauces.'),(7,'3/944 Anzac Parade, Maroubra NSW 2035','0293491821','https://infernogrill.com.au/','https://infernogrill.com.au/menu/','04:00-10:00','04:00-10:00','04:00-10:00','04:00-10:00','04:00-10:00','12:00-10:00','12:00-10:00','infernoGrill.png','2022-04-04 10:11:49',6,'Inferno Grill','Family restaurant located at Maroubra Junction. Dine-in, take-away or home delivery. We are licenced and offer $5 beers every day.\r\n\r\n'),(8,'63 Erskineville Rd, Erskineville NSW 2043','0280847438','https://www.kukitanuki.com.au/','https://www.kukitanuki.com.au/collections/all','Closed','05:00-09:00','05:00-09:00','05:00-09:00','05:00-10:00','05:00-10:00','Closed','kuki.png','2022-04-04 10:17:59',2,'Kuki Tanuki','Japanese fare & sake in cool digs with distressed-wood decor, cartoon murals & outdoor seating.'),(9,'12/489-491 King St, Newtown NSW 2042','0295501119','https://www.arabella.com.au/reservations/','https://www.arabella.com.au/white-menu/','01:00-12:00','04:00-12:00','12:00-01:00','12:00-01:00','12:00-01:00','12:00-01:00','12:00-01:00','arabella.png','2022-04-04 10:32:10',6,'Arabella Lebanese Restaurant','Vibrant Lebanese place for meze plates and banquets, with colourful decor and weekend belly dancing.'),(10,'Shop 1/343 Condamine St, Manly Vale NSW 2093','0299070669','https://www.bangkoksoul.com.au/','https://www.localforyoucart.com/ordering/restaurant/menu?restaurant_uid=871497e6-55f9-4899-9191-f97aec858fe3','12:00-9:00','12:00-9:00','12:00-9:00','12:00-9:00','12:00-9:00','12:00-9:00','12:00-9:00','bangkok.png','2022-04-04 10:38:04',5,'Bangkok Soul Thai Restaurant\r\n','Bangkok Soul Thai Restaurant was established among family and friends who have the same passion for Thai food under same the philosophy “Do it with love, make all the dishes like the ones at home”. Every single dish will be prepared with love. We do believe that Thai food is unique and we reflect that uniqueness in the dishes we make. Bangkok Soul’s menus are inspired by Thai traditional recipes and street foods from central Thailand with local fresh ingredients, only the best consistency and fine quality are chosen on the menu.'),(11,'593 King St, Newtown NSW 2042','0295162870','https://laddasthai.com.au/','https://laddasthai.com.au/order-now#entrees','11:00-10:00','11:00-10:00','11:00-10:00','11:00-10:00','11:00-10:00','11:00-10:00','04:00-10:00','laddas.png','2022-04-04 10:45:28',5,'Ladda\'s The Thai','Amazing Thai food that is located in Newtown.'),(12,'288 Bondi Rd, Bondi NSW 2026','0293881451','https://www.carbonmexican.com.au/','https://www.carbonmexican.com.au/menu','11:00-10:00','11:00-10:00','11:00-10:00','11:00-10:00','11:00-10:00','11:00-10:00','04:00-11:00','carbon.png','2022-04-04 10:50:04',4,'Carbon','A special restaurant with traditional and authentic Mexican food.'),(13,'2/177-179 Glenayr Ave, Bondi Beach NSW 2026','0293881432','https://taqiza.com.au/','https://taqiza.com.au/menu','05:00-10:30pm','05:00-10:30pm','05:00-10:30pm','05:00-10:30pm','03:00-11:00','12:00-11:00','Closed','taqiza.png','2022-04-04 10:56:59',4,'TAQIZA','Fresh from the streets of Mexico, Taqiza is a local Bondi gem that serves up delicious Mexican cuisine that pays homage to its homeland traditions.'),(14,'1-7 Albion Pl, Sydney NSW 2000','0432748907','http://www.danjee.com.au/','http://www.danjee.com.au/home/wp-content/themes/theme/menu_20170917.pdf','12:00-09:00','12:00-09:00','12:00-09:00','12:00-09:00','12:00-10:00','12:00-10:00','12:00-09:00','danjee.png','2022-04-06 09:50:05',1,'Danjee Korean','Upscale Korean mains, plus BBQ dishes & share plates, are presented in a bright, modern dining room.'),(15,'Level 2/605-609 George St, Sydney NSW 2000','0292690222','https://kpos.com.au/seoulria/','https://kpos.com.au/seoulria/index.php','12:00-10:00','12:00-10:00','12:00-10:00','12:00-10:00','12:00-10:00','12:00-10:00','12:00-10:00','seoulria.png','2022-04-06 09:54:30',1,'Seoulria','Colourful Korean hot pots, BBQ pork and kimchi in a brightly lit restaurant with long tables.'),(16,'141 York St, Sydney NSW 2000','0292832990','https://nazimi.com.au/','https://nazimi.com.au/','11:00-9:00','11:00-9:00','11:00-9:00','11:00-9:00','11:00-9:00','11:00-9:00','11:00-9:00','nazimi.png','2022-04-06 10:05:00',2,'Nazimi','Classic Japanese dining in a cosy space, for sushi and sashimi platters plus lunchtime bento boxes.'),(17,'shop 11/537-551 George St, Sydney NSW 2000','0292835525','https://mappen.com.au/','https://mappen.com.au/','11:00-08:30','11:00-08:30','11:00-08:30','11:00-08:30','11:00-08:30','11:00-08:30','11:00-08:30','mappen.png','2022-04-06 10:08:30',2,'Mappen','A retro Japanese self-serve rice and noodle bar featuring udon and soba soups, tempura and toppings.'),(18,'368 Kent St, Sydney NSW 2000','0292621350','https://www.kurosydney.com/kuro-dine-in','https://www.kurosydney.com/kuro-dine-in','Closed','06:00-11:30','06:00-11:30','06:00-11:30','06:00-11:30','06:00-11:30','Closed','kuro.png','2022-04-06 10:12:59',2,'Kuro Bar & Dining','Polished Japanese eatery serving cooked & raw dishes in an industrial-chic space that has a bar.'),(19,'Chifley, L1/2 Chifley Square, Sydney NSW 2000','0292229960','https://azuma32.wixsite.com/azumatakeaway','https://azuma32.wixsite.com/azumatakeaway','Closed','Closed','12:00-08:30','12:00-08:30','12:00-08:30','12:00-08:30','Closed','azuma.png','2022-04-06 10:17:54',2,'Azuma','Sophisticated Japanese restaurant with a tasting menu & a la carte options in a stylish setting.'),(20,'17-19 Bridge Street entry, Bridge Ln, Sydney NSW 2000','0292411991','https://kidkyoto.com.au/#top','https://kidkyoto.com.au/#menu','Closed','12:00-10:00','12:00-10:00','12:00-10:00','12:00-10:00','12:00-10:00','Closed','kidKyoto.png','2022-04-06 10:21:44',2,'Kid Kyoto','Popular eatery for Japanese dishes & cocktails in a hip setting, plus sake workshops.'),(21,'32 Falcon St, Crows Nest NSW 2065','04262666222','https://www.thefork.com.au/restaurant/no32-restaurant-r678767#booking','https://www.thefork.com.au/restaurant/no32-restaurant-r678767/menu#booking','Closed','Closed','06:00-11:00','06:00-11:00','06:00-11:00','06:00-11:00','06:00-11:00','no32.png','2022-04-07 09:51:05',3,'NO.32 Restaurant & Bar','In the City Recital Hall\r\nModern Asian cuisine in a stylish laneway restaurant with speciality cocktails and banquet menus.'),(22,' Shop 38 Level 1 Piccadilly Tower, 133/145 Castlereagh St, Sydney NSW 2000','0292836288','palacechinese.com.au','palacechinese.com.au','Closed','11:30-10:00','11:30-10:00','11:30-10:00','11:30-10:00','09:00-10:00','09:00-10:00','placeChinese.png','2022-04-07 09:55:19',3,'Palace Chinese Restaurant','Lunchtime yum cha and an extensive supper menu are served in a big room decorated with Chinese motifs.'),(23,'157 Elizabeth St, Brisbane City QLD 4000','0433017020','https://marurestaurant.com.au/brisbane-cbd/','https://marurestaurant.com.au/brisbane-cbd/','11:30-09:00','11:30-09:00','11:30-09:00','11:30-09:00','11:30-10:00','11:30-10:00','11:30-09:00','maru.png','2022-04-07 09:58:53',1,'Maru','A laid-back spot serving classic BBQ fare with table hotplates, rice dishes and complimentary sides.'),(24,'35 Goulburn St, Haymarket NSW 2000','0292110890','http://daejangkum.com.au/menu_entree?ckattempt=1','http://daejangkum.com.au/menu_entree?ckattempt=1','12:00-12:00','12:00-12:00','12:00-12:00','12:00-12:00','12:00-12:00','12:00-12:00','12:00-12:00','daejang.png','2022-04-07 10:02:52',1,'Dae Jang Kum Haymarket','Over 150 Korean dishes served in a homestyle late-night restaurant with wooden chairs and tables.'),(25,'202 Broadway, Sydney NSW 2008','0280393595','https://thetwowolves.com.au/eat-drink/','https://thetwowolves.com.au/eat-drink/','10:00-09:00','10:00-09:00','10:00-09:00','10:00-09:00','10:00-09:00','10:00-09:00','10:00-08:00','wolves.png','2022-04-07 10:07:15',4,'The Two Wolves','Mexican dining in colourfully hip surrounds with a market-to-table menu, cocktails and mezcal.'),(26,' 58 Elizabeth St, Sydney NSW 2000','0283854373','http://barriocellar.com.au/','http://barriocellar.com.au/','Closed','12:00-11:00','12:00-11:00','12:00-12:00','12:00-12:00','12:00-12:00','Closed','barrio.png','2022-04-07 10:11:07',4,'Barrio Cellar','Stylish bar in basement digs with vintage lighting, offering tequila cocktails & Mexican bites.'),(27,'106/8 Quay Street Prince Centre Building, Level 1, Haymarket NSW 2000','0292115749','https://caysorn.com.au/menu.php','https://caysorn.com.au/menu.php','11:00-09:30','11:00-09:30','11:00-09:30','11:00-09:30','11:00-09:30','11:00-09:30','11:00-09:30','caysorn.png','2022-04-07 10:15:35',5,'Caysorn Thai','Traditional & modern Southern Thai cuisine in a casual, stylish restaurant with banquettes.');
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_category`
--

DROP TABLE IF EXISTS `restaurant_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant_category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_category`
--

LOCK TABLES `restaurant_category` WRITE;
/*!40000 ALTER TABLE `restaurant_category` DISABLE KEYS */;
INSERT INTO `restaurant_category` VALUES (1,'Korean'),(2,'Japanese'),(3,'Chinese'),(4,'Mexican'),(5,'Thai'),(6,'Fast Food');
/*!40000 ALTER TABLE `restaurant_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `user_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Igor','Brandao','Igooor','igor@gmail.com','pwigor','2000-01-01','male','user3_igor.jpg','2022-03-30 12:10:16'),(2,'Michael','Bautista','Michaeeel','michael@gmail.com','pwmichael','2000-01-01','male','user2_mike.jpg','2022-03-30 12:10:35'),(3,'kosuke','inami','kosukeee','kosuke@gmail.com','pwkosuke','2000-01-01','male','user1_kos.jpg','2022-03-30 12:10:49');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_post`
--

DROP TABLE IF EXISTS `user_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_post` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `review_comment` text NOT NULL,
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `restaurant_id` int DEFAULT NULL,
  `review_star` int NOT NULL,
  `review_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `user_id` (`user_id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `user_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `user_post_ibfk_3` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_post`
--

LOCK TABLES `user_post` WRITE;
/*!40000 ALTER TABLE `user_post` DISABLE KEYS */;
INSERT INTO `user_post` VALUES (1,1,'Good and spacious kbbq place (great for big groups). Ordering is convenient after they added the qr code scanning for the menu so you can order through your phone and pay later. Meat are really good and service is great (they change the grills frequently and quickly). Wish they had some dessert though','2022-03-21 09:46:34',1,4,'Great Korean BBQ Place'),(2,2,'Well worth the drive from the west. Great for occasions, groups or casual. The tasting menu was delicious with a variety of flavours and food we’ve never had before. The cocktails were very nice, especially the melon drink.\r\n\r\nDishes came out at a decent pace. The atmosphere is warm with the ambient lighting and smell of cooking meat. Staff were patient and friendly and took their time to explain each dish. Can recommend.','2022-03-21 09:47:40',2,5,'Japanese Morden Bar'),(3,3,'Overall we really enjoyed the food. Our favourite dishes were the Dan Dan Noodles, Beetroot noodles with mushrooms and the water spinach.  The salt and pepper calamari were well below average with very small pieces of calamari that were tough and chewy. Service was below average, not attentive. The dishes we did like would make it worth going back for.','2022-03-21 09:50:05',3,3,'Not Bad Not So good');
/*!40000 ALTER TABLE `user_post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 22:27:10
