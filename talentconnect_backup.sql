-- MySQL dump 10.13  Distrib 9.3.0, for macos15.2 (arm64)
--
-- Host: localhost    Database: talentconnect
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `job_id` bigint unsigned NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `applicants_user_id_foreign` (`user_id`),
  KEY `applicants_job_id_foreign` (`job_id`),
  CONSTRAINT `applicants_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `applicants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` VALUES (1,12,36,'Htet Naung Oo','+1 (233) 965-1707','kewuqa@mailinator.com','Duis consectetur ra','Eiusmod laborum in s','resumes/YbiY3slW0NUQHQA0cj84VKvkVuNTkdijx4OTrhbQ.pdf','2026-02-06 11:20:33','2026-02-11 12:35:09','accepted'),(2,12,1,'Octavius Carter','+1 (348) 213-1261','xoguw@mailinator.com','Illum id fugiat ha','Rerum quidem asperna','resumes/7XCuo7zmUGjg5BDlWzZUpZj5gFlFS8PYs3WdWNsh.pdf','2026-02-08 05:49:34','2026-02-08 05:49:34','pending'),(3,12,4,'Stacey Stafford','+1 (836) 427-3505','banyqa@mailinator.com','Earum culpa accusamu','Harum anim natus non','resumes/k7BkH0IqoZRW2RS1KMyA8f8AzOS7RmSDgJ8uIABF.pdf','2026-02-09 23:54:35','2026-02-09 23:54:35','pending'),(4,12,3,'Jaquelyn Prince','+1 (471) 413-8157','pyvuny@mailinator.com','Sequi eum ea ullamco',NULL,'resumes/TukulYkuuDhfO5JW3LewvF7NLX3RZENZs6fvuQQe.pdf','2026-02-10 10:49:11','2026-02-10 10:49:11','pending'),(5,12,2,'Jarrod Wong','+1 (551) 402-9439','jotax@mailinator.com','Quia molestiae quis',NULL,'resumes/G6G9CBRDD8BGGoCdzuLQLzepYAuM6rLFTBrN3XuM.pdf','2026-02-10 11:17:08','2026-02-10 11:17:08','pending'),(6,16,36,'Erich Nicholson','+1 (394) 809-8065','zudosymun@mailinator.com','Enim sint facere pa',NULL,'resumes/K5WkucnTdSfcu2vyQWMS0c9NmazqyOvLQO2YuVT9.pdf','2026-02-11 00:10:04','2026-02-11 00:10:33','accepted');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `experiences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_user_id_foreign` (`user_id`),
  CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences`
--

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` VALUES (15,11,'Senior Developer','MMSIT','2025-02-01 00:00:00',NULL,NULL,'2026-02-13 00:19:10','2026-02-13 00:19:10'),(18,12,'Student','UCSY','2026-01-01 00:00:00','2026-02-01 00:00:00',NULL,'2026-02-18 21:11:05','2026-02-18 21:11:05'),(19,12,'Instructor','UIT','2026-01-01 00:00:00','2026-02-01 00:00:00',NULL,'2026-02-18 21:11:05','2026-02-18 21:11:05');
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_listings`
--

DROP TABLE IF EXISTS `job_listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_listings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `salary` int NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` enum('Full-Time','Part-Time','Contract','Temporary','Internship','Volunteer','On-Call') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Full-Time',
  `remote` tinyint(1) NOT NULL DEFAULT '0',
  `requirements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'approved',
  `rejection_reason` text COLLATE utf8mb4_unicode_ci,
  `deadline` timestamp NULL DEFAULT NULL,
  `openings` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `job_listings_user_id_foreign` (`user_id`),
  CONSTRAINT `job_listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_listings`
--

LOCK TABLES `job_listings` WRITE;
/*!40000 ALTER TABLE `job_listings` DISABLE KEYS */;
INSERT INTO `job_listings` VALUES (1,'Junior PHP Developer','Work on Laravel-based web applications, maintain existing features, and assist senior developers in building scalable systems.','2026-02-06 10:36:16','2026-02-06 10:36:16',6,800000,'php,laravel,backend','Full-Time',0,'Basic PHP & Laravel knowledge, MySQL, Git','Lunch allowance, annual bonus, paid leave','Hledan Center','Yangon','Yangon','11051','hr@mmtech.com','09-421234567','MM Tech Solutions','Local software company providing business web solutions.','logos/mmtech.png','https://mmtech.com','approved',NULL,NULL,1),(2,'Graphic Designer','Design marketing materials, social media posts, and branding assets.','2026-02-06 10:36:16','2026-02-06 10:36:16',5,700000,'design,photoshop,illustrator','Full-Time',0,'Adobe Photoshop, Illustrator, creativity','Creative environment, performance bonus','Tamwe','Yangon','Yangon','11211','design@creativehub.mm','09-444556677','Creative Hub Myanmar','Branding and design studio.','logos/creativehub.png','https://creativehub.mm','approved',NULL,NULL,1),(3,'Digital Marketing Executive','Plan and execute Facebook and Google Ads campaigns and analyze performance.','2026-02-06 10:36:16','2026-02-06 10:36:16',2,850000,'marketing,facebook ads,seo','Full-Time',0,'Digital marketing experience, analytics skills','Commission, phone allowance','Bahan','Yangon','Yangon','11201','hr@marketplus.mm','09-422334455','Market Plus MM','Marketing agency for local businesses.','logos/marketplus.png','https://marketplus.mm','approved',NULL,NULL,1),(4,'Content Writer (Myanmar)','Write Myanmar-language content for blogs, websites, and social media.','2026-02-06 10:36:16','2026-02-06 10:36:16',1,600000,'content,writing,myanmar','Part-Time',1,'Strong Myanmar writing skills','Remote work, flexible schedule','Remote','Yangon','Yangon','00000','editor@mmmedia.com','09-400112233','MM Media','Online media and content company.','logos/mmmedia.png','https://mmmedia.com','approved',NULL,NULL,1),(5,'IT Support Technician','Provide technical support, troubleshoot hardware and software issues.','2026-02-06 10:36:16','2026-02-06 10:36:16',6,750000,'it support,hardware,network','Full-Time',0,'Basic networking, Windows OS knowledge','OT pay, insurance','Industrial Zone','Hlaing','Yangon','11401','support@netmm.com','09-466778899','Net MM Co., Ltd','IT services and networking solutions.','logos/netmm.png','https://netmm.com','approved',NULL,NULL,1),(6,'Mobile App Developer (Flutter)','Develop and maintain Flutter mobile applications for Android and iOS.','2026-02-06 10:36:16','2026-02-06 10:36:16',7,1200000,'flutter,mobile,dart','Full-Time',1,'Flutter, REST API integration','Remote work, annual bonus','Remote','Mandalay','Mandalay','05011','jobs@appdev.mm','09-455998877','AppDev Myanmar','Mobile application development company.','logos/appdev.png','https://appdev.mm','approved',NULL,NULL,1),(7,'HR Assistant','Assist HR department in recruitment, employee records, and payroll support.','2026-02-06 10:36:16','2026-02-06 10:36:16',2,650000,'hr,administration','Full-Time',0,'HR knowledge, MS Excel','Annual leave, training','Downtown','Mandalay','Mandalay','05021','hr@royalgroup.mm','09-433221100','Royal Group Myanmar','Diversified local business group.','logos/royalgroup.png','https://royalgroup.mm','approved',NULL,NULL,1),(8,'Accountant','Handle daily accounting operations, financial reports, and tax preparation.','2026-02-06 10:36:16','2026-02-06 10:36:16',8,900000,'accounting,finance','Full-Time',0,'Accounting degree, Excel, MYOB','Yearly bonus, paid leave','Chan Aye Tharzan','Mandalay','Mandalay','05031','finance@mandalaytrade.mm','09-477889900','Mandalay Trading Co.','Wholesale and retail trading company.','logos/mandalaytrade.png','https://mandalaytrade.mm','approved',NULL,NULL,1),(9,'Software Engineer','As a Software Engineer at Algorix, you will be responsible for designing, developing, and maintaining high-quality software applications. You will work closely with cross-functional teams to deliver scalable and efficient solutions that meet business needs. The role involves writing clean, maintainable code, participating in code reviews, and staying current with industry trends to ensure our technology stack remains cutting-edge.','2026-02-06 10:36:16','2026-02-20 04:09:22',2,90000,'development,coding,java,python','Part-Time',0,'Bachelors degree in Computer Science or related field, 3+ years of software development experience','Healthcare, 401(k) matching, flexible work hours','123 Main St','Albany','NY','12201','info@algorix.com','348-334-3949','Algorix','Algorix is a leading tech firm specializing in innovative software solutions and cutting-edge technology.','logos/logo-algorix.png','https://algorix.com','approved','not valid',NULL,1),(10,'Marketing Specialist','Bitwave is seeking a creative and strategic Marketing Specialist to develop and execute comprehensive marketing campaigns. In this role, you will be responsible for market research, identifying target audiences, and crafting compelling messages to drive brand awareness and engagement. You\'ll work closely with the sales and product teams to align marketing strategies with business goals and analyze campaign performance to optimize results.','2026-02-06 10:36:16','2026-02-06 10:36:16',3,70000,'marketing,advertising','Full-Time',1,'Bachelors degree in Marketing or related field, experience in digital marketing','Health and dental insurance, paid time off, remote work options','456 Market St','San Francisco','CA','94105','info@bitwave.com','454-344-3344','Bitwave','Bitwave is a dynamic marketing agency focused on delivering innovative marketing strategies and results-driven solutions.','logos/logo-bitwave.png','https://bitwave.com','approved',NULL,NULL,1),(12,'Data Analyst','Quantum Code is in search of a Data Analyst to join our team and transform complex data into actionable insights. You will utilize various analytical tools and techniques to interpret data, identify trends, and provide strategic recommendations. Your role will involve working closely with stakeholders to understand their data needs, delivering detailed reports, and contributing to data-driven decision-making processes to support the company’s objectives.','2026-02-06 10:36:16','2026-02-06 10:36:16',5,75000,'data analysis,statistics','Full-Time',0,'Bachelors degree in Data Science or related field, strong analytical skills','Health benefits, remote work options, casual dress code','101 Data St','Chicago','IL','60616','info@quantumcode.com','444-555-5555','Quantum Code','Quantum Code is a prominent data analytics company providing insightful data solutions and analytics for better decision-making.','logos/logo-quantumcode.png','https://quantumcode.com','approved',NULL,NULL,1),(13,'Graphic Designer','As a Graphic Designer at Shield, you will be at the forefront of our creative projects, working on diverse design tasks that range from branding and advertising to digital and print media. You will be responsible for creating visually compelling designs that effectively communicate our brand message and captivate our audience. Collaboration with other creative professionals and the ability to take a concept from idea to execution will be key to your success.','2026-02-06 10:36:16','2026-02-06 10:36:16',2,70000,'graphic design,creative','Full-Time',0,'Bachelors degree in Graphic Design or related field, proficiency in Adobe Creative Suite','Flexible work hours, creative work environment, opportunities for growth','234 Design Blvd','Albany','NY','12203','info@shield.com','499-321-9876','Shield','Shield is a leading design agency known for its innovative approach to graphic design and creative solutions.','logos/logo-shield.png','https://shield.com','approved',NULL,NULL,1),(14,'Data Scientist','Join Sparkle as a Data Scientist and play a pivotal role in analyzing and interpreting complex datasets to derive meaningful insights. You will be responsible for building predictive models, implementing machine learning algorithms, and applying statistical techniques to solve real-world problems. Collaboration with cross-functional teams to integrate data-driven solutions into business strategies and products will be a key part of your role.','2026-02-06 10:36:16','2026-02-06 10:36:16',3,100000,'data science,machine learning','Full-Time',1,'Masters or Ph.D. in Data Science or related field, experience with machine learning algorithms','Competitive salary, remote work options, professional development','567 Data Drive','Boston','MA','02108','info@sparkle.com','684-789-1234','Sparkle','Sparkle is an innovative company specializing in data science and machine learning, committed to solving complex data problems.','logos/logo-sparkle.png','https://sparkle.com','approved',NULL,NULL,1),(15,'UX Designer','Vencom is seeking a UX Designer to enhance our user experience through intuitive and engaging design solutions. You will conduct user research, create wireframes and prototypes, and collaborate with developers and product managers to implement design improvements. Your focus will be on understanding user needs and ensuring our products are both functional and aesthetically pleasing.','2026-02-06 10:36:16','2026-02-06 10:36:16',1,80000,'UX design,user research','Full-Time',0,'Bachelors degree in UX Design or related field, experience with design tools like Sketch or Figma','Health insurance, collaborative work environment, growth opportunities','890 UX Rd','Seattle','WA','98101','info@vencom.com','567-890-1234','Vencom','Vencom is a design-driven company focused on creating exceptional user experiences through innovative UX design.','logos/logo-vencom.png','https://vencom.com','approved',NULL,NULL,1),(17,'Product Manager','Pink Pig is searching for a Product Manager to lead the development and enhancement of our tech products. You will work closely with engineering, design, and marketing teams to define product vision, create roadmaps, and deliver high-quality products that meet customer needs. Your role involves gathering and prioritizing product requirements, overseeing project timelines, and ensuring successful product launches.','2026-02-06 10:36:16','2026-02-06 10:36:16',6,90000,'product management,tech','Full-Time',0,'Bachelors degree in Business or Engineering, experience in product management','Health benefits, competitive salary, growth opportunities','234 Innovation Ln','New York','NY','10001','info@pinkpig.com','212-555-6789','Pink Pig','Pink Pig is a technology company dedicated to creating innovative products and solutions that drive industry advancement.','logos/logo-pink-pig.png','https://pinkpig.com','approved',NULL,NULL,1),(18,'IT Support Specialist','Tec Solutions is hiring an IT Support Specialist to provide technical assistance and support to our clients. You will troubleshoot hardware and software issues, assist with network and system configurations, and ensure the smooth operation of IT infrastructure. Your role involves responding to support requests, documenting issues, and collaborating with the technical team to implement solutions.','2026-02-06 10:36:16','2026-02-06 10:36:16',2,65000,'IT support,networking','Full-Time',0,'Associate\'s degree in IT or related field, experience in technical support','Health insurance, retirement plan, opportunities for career advancement','567 Tech Blvd','Dallas','TX','75201','info@tecsolutions.com','214-555-9876','Tec Solutions','Tec Solutions provides comprehensive IT support and solutions, ensuring optimal performance of technology infrastructure.','logos/logo-tec-solutions.png','https://tecsolutions.com','approved',NULL,NULL,1),(19,'Senior Laravel Developer','Lead backend development using Laravel, design REST APIs, and mentor junior developers.','2026-02-06 10:36:16','2026-02-06 10:36:16',1,1800000,'laravel,php,backend,api','Full-Time',0,'3+ years Laravel experience, MySQL, REST APIs','Annual bonus, medical allowance','Hlaing Township','Yangon','Yangon','11052','careers@codewave.mm','09-451223344','CodeWave Myanmar','Enterprise software development company.','logos/codewave.png','https://codewave.mm','approved',NULL,NULL,1),(22,'Sales Executive','Develop client relationships, meet sales targets, and promote company services.','2026-02-06 10:36:16','2026-02-06 10:36:16',8,700000,'sales,b2b,marketing','Full-Time',0,'Communication skills, sales experience','Commission, travel allowance','Ahlone','Yangon','Yangon','11121','sales@myanmarbiz.mm','09-497889966','Myanmar Biz Group','Business consulting and services company.','logos/myanmarbiz.png','https://myanmarbiz.mm','approved',NULL,NULL,1),(23,'Customer Support Officer','Handle customer inquiries, resolve issues, and maintain service quality.','2026-02-06 10:36:16','2026-02-06 10:36:16',10,650000,'customer support,service','Full-Time',0,'Good communication, customer handling','Shift allowance, bonuses','North Dagon','Yangon','Yangon','11441','support@helpmm.com','09-432112233','Help MM Services','Customer support outsourcing company.','logos/helpmm.png','https://helpmm.com','approved',NULL,NULL,1),(24,'Junior Accountant','Assist in bookkeeping, invoices, and monthly financial reports.','2026-02-06 10:36:16','2026-02-06 10:36:16',7,600000,'accounting,finance,junior','Full-Time',0,'Accounting diploma, Excel','Training, career growth','Pyigyitagon','Mandalay','Mandalay','05041','accounts@mandalaycorp.mm','09-455667700','Mandalay Corp','Local trading and logistics company.','logos/mandalaycorp.png','https://mandalaycorp.mm','approved',NULL,NULL,1),(25,'Warehouse Supervisor','Oversee warehouse operations, inventory, and logistics staff.','2026-02-06 10:36:16','2026-02-06 10:36:16',5,850000,'warehouse,logistics,operations','Full-Time',0,'Warehouse management experience','Meal allowance, OT pay','Industrial Zone','Naypyidaw','Naypyidaw','15011','hr@naylogistics.mm','09-498776655','Nay Logistics','Logistics and supply chain company.','logos/naylogistics.png','https://naylogistics.mm','approved',NULL,NULL,1),(26,'Network Engineer','Maintain network infrastructure, troubleshoot connectivity issues.','2026-02-06 10:36:16','2026-02-06 10:36:16',10,1300000,'network,ccna,it','Full-Time',0,'CCNA or equivalent experience','Certification support, insurance','Downtown','Yangon','Yangon','11101','it@netcore.mm','09-466889900','NetCore Myanmar','Network and infrastructure services provider.','logos/netcore.png','https://netcore.mm','approved',NULL,NULL,1),(27,'Video Editor','Edit promotional videos and social media content.','2026-02-06 10:36:16','2026-02-06 10:36:16',7,900000,'video,editing,premiere','Contract',1,'Adobe Premiere Pro, After Effects','Remote, project-based pay','Remote','Taunggyi','Shan','06011','media@visualmm.com','09-499112233','Visual MM','Video production and media house.','logos/visualmm.png','https://visualmm.com','approved',NULL,NULL,1),(28,'Office Administrator','Manage office operations, documentation, and coordination.','2026-02-06 10:36:16','2026-02-06 10:36:16',10,650000,'admin,office,management','Full-Time',0,'Office administration experience','Stable hours, paid leave','City Center','Taunggyi','Shan','06021','admin@shanstars.mm','09-433556677','Shan Stars Co., Ltd','Regional services company.','logos/shanstars.png','https://shanstars.mm','approved',NULL,NULL,1),(29,'E-commerce Executive','Manage online store listings, orders, and customer communication.','2026-02-06 10:36:16','2026-02-06 10:36:16',10,800000,'ecommerce,online sales','Full-Time',0,'E-commerce platform experience','Sales incentives','Thingangyun','Yangon','Yangon','11071','jobs@shopmm.com','09-421998877','Shop MM','Online retail company.','logos/shopmm.png','https://shopmm.com','approved',NULL,NULL,1),(30,'Junior QA Tester','Test web applications, report bugs, and assist QA team.','2026-02-06 10:36:16','2026-02-06 10:36:16',5,700000,'qa,testing,software','Full-Time',0,'Basic software testing knowledge','Training, career path','Hlaing','Yangon','Yangon','11052','qa@softmm.com','09-477665544','Soft MM','Software quality and development firm.','logos/softmm.png','https://softmm.com','approved',NULL,NULL,1),(31,'Procurement Officer','Manage purchasing processes and vendor relationships.','2026-02-06 10:36:16','2026-02-06 10:36:16',10,850000,'procurement,supply chain','Full-Time',0,'Procurement experience','Allowances, bonus','South Okkalapa','Yangon','Yangon','11091','procurement@buildmm.com','09-499887766','Build MM','Construction and materials supplier.','logos/buildmm.png','https://buildmm.com','approved',NULL,NULL,1),(32,'Security Supervisor','Supervise security staff and ensure site safety.','2026-02-06 10:36:16','2026-02-06 10:36:16',8,750000,'security,supervisor','Full-Time',0,'Security supervision experience','Uniform, allowances','Industrial Park','Bago','Bago','08011','hr@securemm.com','09-422334499','Secure MM','Professional security services provider.','logos/securemm.png','https://securemm.com','approved',NULL,NULL,1),(33,'Mechanical Technician','Maintain and repair machinery and equipment.','2026-02-06 10:36:16','2026-02-06 10:36:16',3,900000,'mechanical,technician','Full-Time',0,'Mechanical diploma or experience','OT pay, insurance','Factory Zone','Bago','Bago','08021','tech@factorymm.com','09-455112233','Factory MM','Manufacturing and production company.','logos/factorymm.png','https://factorymm.com','approved',NULL,NULL,1),(34,'Training Coordinator','Coordinate employee training programs and schedules.','2026-02-06 10:36:16','2026-02-06 10:36:16',6,850000,'training,hr,coordination','Full-Time',0,'Training or HR background','Professional development','City Center','Naypyidaw','Naypyidaw','15021','training@futuremm.com','09-433221199','Future MM','Corporate training and development firm.','logos/futuremm.png','https://futuremm.com','approved',NULL,NULL,1),(35,'Junior Business Analyst','Analyze business processes and support reporting.','2026-02-06 10:36:16','2026-02-06 10:36:16',4,900000,'business analyst,data','Full-Time',0,'Analytical skills, Excel','Career growth','Downtown','Yangon','Yangon','11101','ba@insightmm.com','09-411223344','Insight MM','Business intelligence and consulting company.','logos/insightmm.png','https://insightmm.com','approved',NULL,NULL,1),(36,'Frontend Developer','Develop responsive UI using HTML, Tailwind CSS, and JavaScript. Collaborate with backend developers.','2026-02-06 11:13:53','2026-02-20 04:10:58',11,900000,'frontend,html,css,tailwind','Full-Time',0,'HTML, CSS, JavaScript, basic UI/UX knowledge,Tailwind','Flexible hours, training support','Sanchaung','Yangon','Yangon','11111','jobs@pixelmm.com','09-455667788','Pixel MM','Creative digital agency in Myanmar.','logos/4Hd7QxrUbueN5hIgLDezON5fk9hUqyG3xyzvLmsZ.jpg','https://pixelmm.com','approved','not validlid',NULL,1),(37,'Vel elit Nam volupt','Aperiam est non omnis ullamco praesentium aut commodi sapiente omnis consequatur Qui ducimus error omnis','2026-02-19 11:00:30','2026-02-19 11:20:15',11,94,'Error quia omnis par','Contract',0,'Veniam ullam accusantium dolore nihil doloremque odio qui quasi vel voluptate est enim aliqua','Neque aliquip fugit cillum magna','Quia laudantium in','Quas enim est sunt a','Minus culpa voluptas','57260','qalo@mailinator.com','+1 (573) 658-1912','Clements and Fernandez Traders','Natus laborum aspernatur cillum quibusdam reprehenderit delectus lorem aliquam veritatis libero aut do nostrud sunt consectetur',NULL,NULL,'approved',NULL,'2026-05-19 11:00:30',1),(38,'SEKE','Corrupti ex laborum illum sint voluptatum occaecat adipisicing enim numquam labore molestias ipsa dolorem vel reprehenderit enim maxime dolores alias','2026-02-19 11:25:00','2026-02-20 04:10:33',11,97,'Qui consequuntur sus','Full-Time',0,'Et anim quam quasi aspernatur est eveniet','Sed veniam excepteur obcaecati voluptatum mollit','Mollit repellendus','Magnam nostrud conse','Accusamus sed ex rep','86400','pore@mailinator.com',NULL,'Dillard and Romero Associates','Voluptatum cum sunt maxime fuga Natus laborum laborum occaecat est ea sed voluptas elit laboris fugiat',NULL,NULL,'approved','geared','2026-05-19 11:25:00',1),(39,'Network','Doloribus aspernatur proident vitae voluptas eaque lorem consequat Cumque dolorem ea ad aliquip sunt dolorum fuga Duis ea','2026-02-20 02:17:57','2026-02-20 04:10:11',11,33,'Voluptatum cumque re','Contract',1,'Quisquam blanditiis mollit incidunt mollit necessitatibus blanditiis pariatur Vero natus earum ut','Et vero quis ut officia dolor culpa magnam libero a enim eos sit maiores voluptatum aspernatur id','Nulla placeat eu ad','Sapiente provident','Omnis harum sunt ap',NULL,'nutyfonel@mailinator.com',NULL,'Walsh and Alford Traders','Reprehenderit esse perspiciatis quo quo dolor esse et nesciunt cillum sapiente esse voluptatem a sunt',NULL,NULL,'approved',NULL,'2026-05-20 02:17:57',1);
/*!40000 ALTER TABLE `job_listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_user_bookmarks`
--

DROP TABLE IF EXISTS `job_user_bookmarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_user_bookmarks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `job_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_user_bookmarks_user_id_foreign` (`user_id`),
  KEY `job_user_bookmarks_job_id_foreign` (`job_id`),
  CONSTRAINT `job_user_bookmarks_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `job_user_bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_user_bookmarks`
--

LOCK TABLES `job_user_bookmarks` WRITE;
/*!40000 ALTER TABLE `job_user_bookmarks` DISABLE KEYS */;
INSERT INTO `job_user_bookmarks` VALUES (1,1,9,'2026-02-06 10:36:16','2026-02-06 10:36:16'),(3,1,1,'2026-02-06 10:36:16','2026-02-06 10:36:16'),(8,12,4,'2026-02-09 23:54:40','2026-02-09 23:54:40'),(9,11,2,'2026-02-10 10:20:35','2026-02-10 10:20:35'),(10,12,36,'2026-02-10 10:48:44','2026-02-10 10:48:44'),(11,12,1,'2026-02-11 02:13:26','2026-02-11 02:13:26');
/*!40000 ALTER TABLE `job_user_bookmarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  `deadline` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_01_31_180606_create_job_listings_table',1),(5,'2026_02_01_034818_add_fields_to_job_listings_table',1),(6,'2026_02_02_090914_add_avatar_to_users_table',1),(7,'2026_02_02_150437_create_job_user_bookmarks_table',1),(8,'2026_02_02_164919_create_applicants_table',2),(9,'2026_02_07_140308_add_role_to_users_table',3),(10,'2026_02_10_084556_add_status_to_applicants_table',4),(11,'2026_02_10_111046_add_deadline_to_jobs_table',5),(12,'2026_02_10_112416_create_experiences_table',6),(13,'2026_02_10_112423_create_skills_table',6),(14,'2026_02_10_161427_change_experience_dates_to_string',7),(15,'2026_02_11_060445_create_notifications_table',8),(16,'2026_02_19_162802_add_status_and_rejection_to_jobs_table',9),(17,'2026_02_19_170935_remove_status_from_jobs_table',10),(18,'2026_02_19_171023_add_status_to_job_listings_table',11),(19,'2026_02_19_172928_add_deadline_to_job_listings_table',12),(20,'2026_02_20_093114_add_openings_to_jobs_table',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('0970ca9b-4663-4d94-88b7-6ceb253c19bb','App\\Notifications\\JobUpdatedNotification','App\\Models\\User',13,'{\"job_id\":38,\"title\":\"SE\",\"employer_name\":\"Htet Naung Oo\",\"message\":\"Htet Naung Oo resubmitted \'SE\' for review.\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/38\"}',NULL,'2026-02-20 01:25:40','2026-02-20 01:25:40'),('25aa23ba-0427-4aaa-b61d-00087adb7e85','App\\Notifications\\JobUpdatedNotification','App\\Models\\User',17,'{\"job_id\":38,\"title\":\"SE\",\"employer_name\":\"Htet Naung Oo\",\"message\":\"Htet Naung Oo resubmitted \'SE\' for review.\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/38\"}','2026-02-20 01:25:51','2026-02-20 01:25:40','2026-02-20 01:25:51'),('290782e2-ba9b-4c34-baf5-96615a8a0c6c','App\\Notifications\\NewApplicationNotification','App\\Models\\User',11,'{\"job_title\":\"Frontend Developer\",\"applicant_name\":\"Erich Nicholson\",\"message\":\"Erich Nicholson applied for Frontend Developer.\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/36\"}','2026-02-11 00:10:18','2026-02-11 00:10:04','2026-02-11 00:10:18'),('7dd6a3ac-b372-49f0-9dd8-1e75c0bf6f68','App\\Notifications\\JobUpdatedNotification','App\\Models\\User',13,'{\"job_id\":36,\"title\":\"Frontend Developer\",\"message\":\"Job updated and needs admin review.\"}',NULL,'2026-02-20 01:17:37','2026-02-20 01:17:37'),('805d98ed-2728-4fd8-b3d5-e53832e5a2d3','App\\Notifications\\JobStatusUpdatedNotification','App\\Models\\User',11,'{\"job_id\":39,\"title\":\"Nesciunt quia saepe\",\"employer_name\":\"Htet Naung Oo\",\"message\":\"Your job \'Nesciunt quia saepe\' has been rejected. Reason: \",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/39\"}','2026-02-20 02:24:16','2026-02-20 02:24:06','2026-02-20 02:24:16'),('88aef40b-d79b-4096-8392-aa1dcc2ddda2','App\\Notifications\\JobUpdatedNotification','App\\Models\\User',17,'{\"job_id\":36,\"title\":\"Frontend Developer\",\"message\":\"Job updated and needs admin review.\"}','2026-02-20 01:17:46','2026-02-20 01:17:37','2026-02-20 01:17:46'),('9dabf6b3-4057-461c-8820-73993b1c5133','App\\Notifications\\JobUpdatedNotification','App\\Models\\User',13,'{\"job_id\":39,\"title\":\"Network\",\"employer_name\":\"Htet Naung Oo\",\"message\":\"Htet Naung Oo resubmitted \'Network\' for review.\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/39\"}',NULL,'2026-02-20 02:24:29','2026-02-20 02:24:29'),('c2272a7a-3c56-486d-8dc4-a3d43188445f','App\\Notifications\\JobUpdatedNotification','App\\Models\\User',17,'{\"job_id\":39,\"title\":\"Network\",\"employer_name\":\"Htet Naung Oo\",\"message\":\"Htet Naung Oo resubmitted \'Network\' for review.\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/39\"}','2026-02-20 02:24:56','2026-02-20 02:24:29','2026-02-20 02:24:56'),('d254e343-e24a-4f14-a076-99b42dd71285','App\\Notifications\\JobRejectedNotification','App\\Models\\User',11,'{\"job_id\":36,\"title\":\"Frontend Developer\",\"message\":\"Your job post has been rejected.\",\"reason\":\"not validlid\"}','2026-02-19 10:52:28','2026-02-19 10:52:12','2026-02-19 10:52:28'),('d3edaeaa-8e84-4478-b187-511f419de81a','App\\Notifications\\JobRejectedNotification','App\\Models\\User',2,'{\"job_id\":9,\"title\":\"Software Engineer\",\"message\":\"Your job post has been rejected.\",\"reason\":\"not valid\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/9\"}',NULL,'2026-02-20 02:12:28','2026-02-20 02:12:28'),('dc7549ea-e210-4c4f-9ff7-5c1e5bae36f5','App\\Notifications\\ApplicationStatusNotification','App\\Models\\User',16,'{\"job_title\":\"Frontend Developer\",\"status\":\"accepted\",\"message\":\"Your application for Frontend Developer was accepted.\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/36\"}',NULL,'2026-02-11 00:10:33','2026-02-11 00:10:33'),('f8a36ce7-c6cd-4e24-888d-c8bf5934d56a','App\\Notifications\\ApplicationStatusNotification','App\\Models\\User',12,'{\"job_title\":\"Frontend Developer\",\"status\":\"accepted\",\"message\":\"Your application for Frontend Developer was accepted.\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/36\"}','2026-02-11 12:35:27','2026-02-11 12:35:09','2026-02-11 12:35:27'),('f978b5b3-6ca3-41f7-a473-7a8be5d035b7','App\\Notifications\\ApplicationStatusNotification','App\\Models\\User',12,'{\"job_title\":\"Frontend Developer\",\"status\":\"rejected\",\"message\":\"Your application for Frontend Developer was rejected.\",\"url\":\"http:\\/\\/localhost:8000\\/dashboard\"}','2026-02-10 23:58:38','2026-02-10 23:37:22','2026-02-10 23:58:38'),('fd79d607-8a2f-4904-a56b-ae12bdff8733','App\\Notifications\\JobRejectedNotification','App\\Models\\User',11,'{\"job_id\":38,\"title\":\"Voluptates aut iure\",\"message\":\"Your job post has been rejected.\",\"reason\":\"geared\",\"url\":\"http:\\/\\/localhost:8000\\/jobs\\/38\"}','2026-02-20 01:25:30','2026-02-20 01:25:18','2026-02-20 01:25:30');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('E5Zz3melvbw9AXoEP4ge3DF2XLFzmBjSW8WoSYk1',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1FLTmJob0RCN25JQVpaQk9iUVFpMWV4RTNOTEZEeFFJZFF0NFdlZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1771582623),('elXI1eMfJZaLGPlLJOVOVZHJLEiRMxq844QCaumv',17,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Safari/605.1.15','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWE5YczBNUFQzdFppYTVyWnBHWkxzeGdTa05GMjNIRGdOVG1OTDloSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Nzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ub3RpZmljYXRpb25zL2MyMjcyYTdhLTNjNTYtNDg2ZC04ZGM0LWEzZDQzMTg4NDQ1Zi9yZWFkIjtzOjU6InJvdXRlIjtzOjE4OiJub3RpZmljYXRpb25zLnJlYWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNzt9',1771584004),('re3AqaDIBVW0sD0kQiOHvCVyTGum7aXq7yb4I5SJ',NULL,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibDBMcEl6SGpSaUpEMkhMYUNySFR2SDVPZDd4Z3FRa291S2JGUVBNbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1771582623),('u7CPfk5FbUMxzse7VOvUuGnVaqIXedhshAduv6Am',17,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Safari/605.1.15','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSThnV1hyMlBnRW52ckpGdjN3M3oxSGVndmMxZXRIQmxWb1VQUU9BdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTc7fQ==',1771584167),('YiWtZ4y8igACZTqd1TXn6h4h79Q1htwTmxca4mi7',11,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzdLSWw1c0RHM2FKdkllQ1lHVXZNeXNraFRJRG1KSGplenYwbDRJbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7fQ==',1771584319);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skills_user_id_foreign` (`user_id`),
  CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (67,11,'TailWind',NULL,'2026-02-13 00:19:10','2026-02-13 00:19:10'),(68,11,'Laravel',NULL,'2026-02-13 00:19:10','2026-02-13 00:19:10'),(69,11,'PHP',NULL,'2026-02-13 00:19:10','2026-02-13 00:19:10'),(70,11,'C++',NULL,'2026-02-13 00:19:10','2026-02-13 00:19:10'),(71,11,'Java',NULL,'2026-02-13 00:19:10','2026-02-13 00:19:10'),(72,11,'Love',NULL,'2026-02-13 00:19:10','2026-02-13 00:19:10'),(75,12,'PHP',NULL,'2026-02-18 21:11:05','2026-02-18 21:11:05'),(76,12,'AA',NULL,'2026-02-18 21:11:05','2026-02-18 21:11:05');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Kane Nikolaus','herman.chad@example.com',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','rLPeSHqhZJ','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(2,'Ariel Stroman DDS','celia03@example.org',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','P6K5Cms8BQ','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(3,'Mellie O\'Connell DDS','bessie48@example.org',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','3iowyQxyK6','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(4,'Claire Ullrich','denesik.danielle@example.org',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','jZEMD8TQca','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(5,'Ladarius Crooks','jamal47@example.org',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','RKKyoR2AI3','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(6,'Mr. Trent Jakubowski DVM','swaniawski.penelope@example.net',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','ls5XlR6PPB','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(7,'Marty Auer','lawrence03@example.net',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','M1wdWRAHdz','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(8,'Madalyn Schiller','stevie37@example.org',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','EpCvSVppf4','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(10,'Hailee Zboncak','ddicki@example.org',NULL,'2026-02-06 10:36:16','$2y$12$Q6tw842/z/dk6MYhsH49/Od.0m1DisjBV1GJuTivSHDcsWhtjqWLa','u0XKlsJ5a3','2026-02-06 10:36:16','2026-02-06 10:36:16','user'),(11,'Htet Naung Oo','htetnaungoo163@gmail.com','avatars/sjEIBUGRRV6YQykRD7UsMaqPohdz1tDIbmoo751b.jpg',NULL,'$2y$12$BAVBjeo.h6.LLivg.GSgOe.SGmzRFFBcfe6nLbS62mJKzk6Eygoea',NULL,'2026-02-06 11:08:47','2026-02-11 03:21:34','employer'),(12,'Andy','htetnaung.oo@icloud.com','avatars/8IdnGMVVZFNRtrvWW518ybgWVz35ZTWEgY6Ycs3v.jpg',NULL,'$2y$12$yja0j3UjBONcNSln2HbaTuZPlOIW0ieOt6A7wZ.E2mpJNlWvdE.vG',NULL,'2026-02-06 11:18:19','2026-02-18 21:11:05','user'),(13,'Htet Naung','hoo61509@gmail.com',NULL,NULL,'$2y$12$RHqnqMZ01d3WNK5h9un3Venur4MjzL18OAvSA3jwB.xd.9Q7CNpYC',NULL,'2026-02-07 07:34:04','2026-02-20 01:15:29','admin'),(14,'Sandy','pezitake@mailinator.com',NULL,NULL,'$2y$12$kiBoW1xMeJ78RQZ29RefZOy/71.WHbeVXfybvhHjp4cpIvn.o3YgW',NULL,'2026-02-07 08:07:23','2026-02-07 08:07:23','employer'),(15,'Ingrid Anthony','cozysid@mailinator.com',NULL,NULL,'$2y$12$LQ2tbMM5OqrYd34V0nwtlesHkugo/VQW/n7A5BfWK3vEdye20e06e',NULL,'2026-02-11 00:05:04','2026-02-11 00:05:04','employer'),(16,'Chava Schmidt','wokexali@mailinator.com',NULL,NULL,'$2y$12$gDKvP94bQ2onOdfJWPUMPuR4.KxmFEwsYpiKnMOv6rkHXx0B3xn3K',NULL,'2026-02-11 00:09:44','2026-02-19 10:25:01','employer'),(17,'Admin','admin@ucsy.com',NULL,NULL,'$2y$12$BEY8r1DpZZZJa8sqYq75Iunv6uoX.v9TGeEVNM9Xl7cQBiNsn3x4u',NULL,'2026-02-19 09:12:55','2026-02-19 09:12:55','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-20 17:18:07
