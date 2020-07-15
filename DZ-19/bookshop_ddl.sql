-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 29 2020 р., 20:48
-- Версія сервера: 10.4.11-MariaDB
-- Версія PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `bookshop_2`
--

-- --------------------------------------------------------

--
-- Структура таблиці `activities`
--

CREATE TABLE `activities` (
  `customer_id` int(11) UNSIGNED DEFAULT NULL COMMENT 'fk',
  `browser` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `leave time` time NOT NULL,
  `visit time` time NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='activity';

-- --------------------------------------------------------

--
-- Структура таблиці `authors`
--

CREATE TABLE `authors` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `www` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` smallint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='authors';

-- --------------------------------------------------------

--
-- Структура таблиці `book`
--

CREATE TABLE `book` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_id` int(11) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` int(11) UNSIGNED NOT NULL,
  `categories_id` int(11) UNSIGNED NOT NULL,
  `books_authors_id` int(11) UNSIGNED NOT NULL,
  `publisher_id` int(11) UNSIGNED NOT NULL,
  `reviews_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='book';

-- --------------------------------------------------------

--
-- Структура таблиці `books_authors`
--

CREATE TABLE `books_authors` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `written_at` date NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='books_authors';

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `data_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='categories';

-- --------------------------------------------------------

--
-- Структура таблиці `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `full name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='customers';

-- --------------------------------------------------------

--
-- Структура таблиці `customers_profile`
--

CREATE TABLE `customers_profile` (
  `profile_id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `customer_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='customers_profile';

-- --------------------------------------------------------

--
-- Структура таблиці `gift`
--

CREATE TABLE `gift` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Name` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `gift_books`
--

CREATE TABLE `gift_books` (
  `ID` int(11) UNSIGNED NOT NULL,
  `gift_id` int(11) UNSIGNED NOT NULL,
  `book_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `interests`
--

CREATE TABLE `interests` (
  `interest_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `genres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(6,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='interests';

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `payedvia` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `customer_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `state` enum('new','processed','canceled','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `on_time` time NOT NULL,
  `on_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='orders';

-- --------------------------------------------------------

--
-- Структура таблиці `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `order_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `book_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `qty` tinyint(3) UNSIGNED NOT NULL,
  `price` float(6,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='order_products';

-- --------------------------------------------------------

--
-- Структура таблиці `payed_via`
--

CREATE TABLE `payed_via` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `www` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='payed_via';

-- --------------------------------------------------------

--
-- Структура таблиці `price`
--

CREATE TABLE `price` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `data` date NOT NULL,
  `price` float(7,3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='price';

-- --------------------------------------------------------

--
-- Структура таблиці `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `www` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='publisher';

-- --------------------------------------------------------

--
-- Структура таблиці `quotes`
--

CREATE TABLE `quotes` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Quote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Position` int(11) UNSIGNED NOT NULL,
  `Creation_date` datetime NOT NULL,
  `book_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `reccomend`
--

CREATE TABLE `reccomend` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `data` date NOT NULL,
  `book_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='reccomend';

-- --------------------------------------------------------

--
-- Структура таблиці `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` enum('Published','Unpublished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpublished',
  `Mark` int(11) UNSIGNED NOT NULL,
  `Costumer_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `shipping_info`
--

CREATE TABLE `shipping_info` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'PK',
  `order_id` int(11) UNSIGNED NOT NULL COMMENT 'FK for orders',
  `customer_id` int(11) UNSIGNED NOT NULL COMMENT 'FK for customer',
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Shipping_info';

-- --------------------------------------------------------

--
-- Структура таблиці `tags`
--

CREATE TABLE `tags` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Tag` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Position` int(11) UNSIGNED NOT NULL,
  `Creation_date` datetime NOT NULL,
  `book_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` int(11) UNSIGNED NOT NULL,
  `profile_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `book_id` int(11) UNSIGNED NOT NULL COMMENT 'fk'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='wish_list';

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `activities`
--
ALTER TABLE `activities`
  ADD KEY `customer_id` (`customer_id`);

--
-- Індекси таблиці `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_id` (`price_id`),
  ADD KEY `categories_id` (`categories_id`),
  ADD KEY `books_authors_id` (`books_authors_id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `reviews_id` (`reviews_id`);

--
-- Індекси таблиці `books_authors`
--
ALTER TABLE `books_authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Індекси таблиці `customers_profile`
--
ALTER TABLE `customers_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Індекси таблиці `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `gift_books`
--
ALTER TABLE `gift_books`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gift_id` (`gift_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Індекси таблиці `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interest_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payedvia` (`payedvia`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Індекси таблиці `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Індекси таблиці `payed_via`
--
ALTER TABLE `payed_via`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `book_id` (`book_id`);

--
-- Індекси таблиці `reccomend`
--
ALTER TABLE `reccomend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Індекси таблиці `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Costumer_id` (`Costumer_id`);

--
-- Індекси таблиці `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Індекси таблиці `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `book_id` (`book_id`);

--
-- Індекси таблиці `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `books_authors`
--
ALTER TABLE `books_authors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `customers_profile`
--
ALTER TABLE `customers_profile`
  MODIFY `profile_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `gift`
--
ALTER TABLE `gift`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `gift_books`
--
ALTER TABLE `gift_books`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `interests`
--
ALTER TABLE `interests`
  MODIFY `interest_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `payed_via`
--
ALTER TABLE `payed_via`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `quotes`
--
ALTER TABLE `quotes`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `reccomend`
--
ALTER TABLE `reccomend`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

--
-- AUTO_INCREMENT для таблиці `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK';

--
-- AUTO_INCREMENT для таблиці `tags`
--
ALTER TABLE `tags`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`price_id`) REFERENCES `price` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`books_authors_id`) REFERENCES `books_authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_5` FOREIGN KEY (`reviews_id`) REFERENCES `reviews` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `books_authors`
--
ALTER TABLE `books_authors`
  ADD CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `customers_profile`
--
ALTER TABLE `customers_profile`
  ADD CONSTRAINT `customers_profile_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `gift_books`
--
ALTER TABLE `gift_books`
  ADD CONSTRAINT `gift_books_ibfk_1` FOREIGN KEY (`gift_id`) REFERENCES `gift` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gift_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payedvia`) REFERENCES `payed_via` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `reccomend`
--
ALTER TABLE `reccomend`
  ADD CONSTRAINT `reccomend_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`Costumer_id`) REFERENCES `customers_profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD CONSTRAINT `Shipping_info_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Shipping_info_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_lists_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `customers_profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
