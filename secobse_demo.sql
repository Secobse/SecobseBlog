-- MySQL dump 10.15  Distrib 10.0.27-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: secobse_demo
-- ------------------------------------------------------
-- Server version	10.0.27-MariaDB

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
-- Table structure for table `articles`
--

DROP DATABASE IF EXISTS `secobse_demo`;
CREATE DATABASE `secobse_demo`;
use `secobse_demo`;

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `love` int(10) unsigned NOT NULL DEFAULT '0',
  `unLove` int(10) unsigned NOT NULL DEFAULT '0',
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `readtimes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `articles_username_foreign` (`username`),
  CONSTRAINT `articles_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'admin','Laravel Installation','# Server Requirements\r\nThe Laravel framework has a few system requirements. Of course, all of these requirements are satisfied by the Laravel Homestead virtual machine, so it\'s highly recommended that you use Homestead as your local Laravel development environment.\r\n\r\nHowever, if you are not using Homestead, you will need to make sure your server meets the following requirements:\r\n\r\n* PHP >= 5.6.4\r\n* OpenSSL PHP Extension\r\n* PDO PHP Extension\r\n* Mbstring PHP Extension\r\n* Tokenizer PHP Extension\r\n* XML PHP Extension\r\n\r\n# Installing Laravel\r\n\r\nLaravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.\r\n\r\n### Via Laravel Installer\r\n\r\nFirst, download the Laravel installer using Composer:\r\n\r\n> composer global require \"laravel/installer\"',0,0,'2016-10-22 11:35:13','2016-10-22 11:26:39','2016-10-22 11:35:13',2),(2,'admin','Blade Templates','# Introduction\r\n\r\nBlade is the simple, yet powerful templating engine provided with Laravel. Unlike other popular PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your application. Blade view files use the .blade.php file extension and are typically stored in the resources/views directory.\r\n\r\n\r\n# Template Inheritance\r\n\r\n\r\n### Defining A Layout\r\n\r\nTwo of the primary benefits of using Blade are template inheritance and sections. To get started, let\'s take a look at a simple example. First, we will examine a \"master\" page layout. Since most web applications maintain the same general layout across various pages, it\'s convenient to define this layout as a single Blade view:\r\n\r\n<!-- Stored in resources/views/layouts/app.blade.php -->\r\n\r\n```php\r\n<html>\r\n    <head>\r\n        <title>App Name - @yield(\'title\')</title>\r\n    </head>\r\n    <body>\r\n        @section(\'sidebar\')\r\n            This is the master sidebar.\r\n        @show\r\n\r\n        <div class=\"container\">\r\n            @yield(\'content\')\r\n        </div>\r\n    </body>\r\n</html>\r\n```\r\n\r\nAs you can see, this file contains typical HTML mark-up. However, take note of the @section and @yield directives. The @section directive, as the name implies, defines a section of content, while the @yield directive is used to display the contents of a given section.\r\n\r\nNow that we have defined a layout for our application, let\'s define a child page that inherits the layout.\r\n\r\n\r\n',1,0,'2016-10-22 11:35:05','2016-10-22 11:28:39','2016-10-22 11:35:05',1),(3,'wangfuliang','Routing','# Basic Routing\r\n\r\nThe most basic Laravel routes simply accept a URI and a Closure, providing a very simple and expressive method of defining routes:\r\n\r\n```php\r\nRoute::get(\'foo\', function () {\r\n    return \'Hello World\';\r\n});\r\n```php\r\n\r\n### The Default Route Files\r\n\r\nAll Laravel routes are defined in your route files, which are located in the routes directory. These files are automatically loaded by the framework. The routes/web.php file defines routes that are for your web interface. These routes are assigned the web middleware group, which provides features like session state and CSRF protection. The routes in routes/api.php are stateless and are assigned the api middleware group.\r\n\r\nFor most applications, you will begin by defining routes in your routes/web.php file.\r\n\r\n### Available Router Methods\r\n\r\nThe router allows you to register routes that respond to any HTTP verb:\r\n\r\nRoute::get($uri, $callback);\r\nRoute::post($uri, $callback);\r\nRoute::put($uri, $callback);\r\nRoute::patch($uri, $callback);\r\nRoute::delete($uri, $callback);\r\nRoute::options($uri, $callback);\r\nSometimes you may need to register a route that responds to multiple HTTP verbs. You may do so using the match method. Or, you may even register a route that responds to all HTTP verbs using the any method:\r\n\r\n```php\r\nRoute::match([\'get\', \'post\'], \'/\', function () {\r\n    //\r\n});\r\n\r\nRoute::any(\'foo\', function () {\r\n    //\r\n});\r\n```',1,0,'2016-10-22 11:35:16','2016-10-22 11:34:54','2016-10-22 11:35:16',1),(4,'wangfuliang','Validation','# Introduction\r\n\r\nLaravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a convenient method to validate incoming HTTP request with a variety of powerful validation rules.\r\n\r\n\r\n### Validation Quickstart\r\n\r\nTo learn about Laravel\'s powerful validation features, let\'s look at a complete example of validating a form and displaying the error messages back to the user.\r\n\r\n\r\nDefining The Routes\r\n\r\nFirst, let\'s assume we have the following routes defined in our routes/web.php file:\r\n\r\n```php\r\nRoute::get(\'post/create\', \'PostController@create\');\r\n\r\nRoute::post(\'post\', \'PostController@store\');\r\n```\r\n\r\nOf course, the GET route will display a form for the user to create a new blog post, while the POST route will store the new blog post in the database.\r\n\r\n\r\n### Creating The Controller\r\n\r\nNext, let\'s take a look at a simple controller that handles these routes. We\'ll leave the store method empty for now:\r\n\r\n```php\r\n<?php\r\n\r\nnamespace App\\Http\\Controllers;\r\n\r\nuse Illuminate\\Http\\Request;\r\nuse App\\Http\\Controllers\\Controller;\r\n\r\nclass PostController extends Controller\r\n{\r\n    /**\r\n     * Show the form to create a new blog post.\r\n     *\r\n     * @return Response\r\n     */\r\n    public function create()\r\n    {\r\n        return view(\'post.create\');\r\n    }\r\n\r\n    /**\r\n     * Store a new blog post.\r\n     *\r\n     * @param  Request  $request\r\n     * @return Response\r\n     */\r\n    public function store(Request $request)\r\n    {\r\n        // Validate and store the blog post...\r\n    }\r\n}\r\n```\r\n\r\n',1,0,'2016-10-22 11:37:44','2016-10-22 11:37:37','2016-10-22 11:37:44',1),(5,'wangfuliang','Middleware','Middleware provide a convenient mechanism for filtering HTTP requests entering your application. For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to the login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.\r\n\r\nOf course, additional middleware can be written to perform a variety of tasks besides authentication. A CORS middleware might be responsible for adding the proper headers to all responses leaving your application. A logging middleware might log all incoming requests to your application.\r\n\r\nThere are several middleware included in the Laravel framework, including middleware for authentication and CSRF protection. All of these middleware are located in the app/Http/Middleware directory.\r\n\r\n\r\n### Defining Middleware\r\n\r\nTo create a new middleware, use the make:middleware Artisan command:\r\n\r\nphp artisan make:middleware CheckAge\r\nThis command will place a new CheckAge class within your app/Http/Middleware directory. In this middleware, we will only allow access to the route if the supplied age is greater than 200. Otherwise, we will redirect the users back to the home URI.\r\n\r\n',0,0,'2016-10-22 11:38:17','2016-10-22 11:38:17','2016-10-22 11:38:17',0);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_08_29_073657_create_articles_table',1),('2016_08_30_050021_add_avatar_to_users_table',1),('2016_09_03_110509_create_votes_table',1),('2016_09_03_145031_add_isUnLove_to_votes_table',1),('2016_09_03_152348_add_readtimes_to_articles_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','1149069735@qq.com','$2y$10$b9Ai/Nis37MbUugErXaf4u9vFTZ8tUexFLn49z./92vXjzNa8fvGS',1,0,'PBzVtINivqj0NzYixk5T6Oe5qQoKE928b8sP23K2WyMrj1iZ5orlABi1K4Ss','2016-10-22 11:24:04','2016-10-22 11:32:50','admin.jpg'),(2,'wangfuliang','y1149069735@163.com','$2y$10$zLpIEHbR2RBDwltE.2d5BeZdWqYlvFpe3L8DBCgd0sWqKh15q2baq',1,1,NULL,'2016-10-22 11:33:06','2016-10-22 11:33:06','default.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `articleId` int(10) unsigned NOT NULL,
  `isLove` tinyint(1) NOT NULL DEFAULT '0',
  `isUnLove` tinyint(1) NOT NULL DEFAULT '0',
  KEY `votes_user_foreign` (`user`),
  KEY `votes_articleid_foreign` (`articleId`),
  CONSTRAINT `votes_articleid_foreign` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `votes_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES ('wangfuliang',2,1,0),('wangfuliang',3,1,0),('wangfuliang',4,1,0);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-22 19:48:45
