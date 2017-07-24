-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 19 2017 г., 13:51
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `description` text,
  `hide` tinyint(1) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_key` varchar(255) DEFAULT NULL,
  `img_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`id`, `name`, `surname`, `description`, `hide`, `meta_title`, `meta_desc`, `meta_key`, `img_link`) VALUES
(1, 'Мария', 'Псарева', 'Псарёва  Мария  Викторовна  родилась 11 августа 1987 года в городе Москве.\r\n1997 - 2003г - училась в Московском Академическом Художественном лицее Российской Академии Художеств.\r\n2003 по 2009 год училась в Московском Государственном Академическом Художественном институте им.Сурикова,где  закончила с отличием и похвалой совета живописную мастерскую действительного члена Российской академии художеств, профессора Т.Г.Назаренко.\r\nВ июле 2009 года принята в Московский Союз Художников. Награждена медалью\r\nМосковского Союза Художников «За заслуги в развитии изобразительного искусства». \r\nС 2011 года работает преподавателем спец предметов в Московском Академическом Художественном лицеи Российской Академии Художеств .\r\nПостоянный участник Российских и молодёжных выставок от Союза художников РФ, комитета по культуре города Москвы, Творческого Союза работников культуры города Москвы.\r\nУчастник международных выставок : Нью-Йорк, Англия,Кипр ,Китай, Бельгия, Австрия, Дания, Италия. Работы находятся в частных коллекциях России и  зарубежом.', 0, NULL, NULL, NULL, 'Untitled.jpg'),
(2, 'Матвей', 'Переверзев', 'Родился в 1990 году в Москве, в семье художников. Закончил с отличием московскую художественную школу №8. Закончил Богословский факультет ПСТГУ и искусствоведческую аспирантуру. С красками и холстами Матвей не расстается в любое свободное время. в 2014 г. участвовал в выставке Третьяковской галереи "Магистр теологии и доктор географических наук". Работает, в основном, в жанре пейзажной живописи маслом и акварелью.', 0, NULL, NULL, NULL, 'P1120601.JPG');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('contentManager', '2', 1497712425),
('mainAdmin', '1', 1497712409);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1497709087, 1497709087),
('/rbac/*', 2, NULL, NULL, NULL, 1497709415, 1497709415),
('adminAccess', 2, 'Доступ к админке', NULL, NULL, 1497709329, 1497709770),
('contentManager', 1, NULL, NULL, NULL, 1497709875, 1497709875),
('mainAdmin', 1, NULL, NULL, NULL, 1497709928, 1497709928),
('rbacAccess', 2, 'Доступ к RBAC', NULL, NULL, 1497709219, 1497709734);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('adminAccess', '/admin/*'),
('contentManager', 'adminAccess'),
('mainAdmin', 'contentManager'),
('mainAdmin', 'rbacAccess'),
('rbacAccess', '/rbac/*');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `hide` tinyint(1) DEFAULT NULL,
  `parent_category_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `hide`, `parent_category_id`) VALUES
(8, 'Портреты', NULL, NULL, NULL, NULL, 0, NULL),
(9, 'Натюрморты', NULL, NULL, NULL, NULL, 0, NULL),
(10, 'Пейзажи', NULL, NULL, NULL, NULL, 0, NULL),
(11, 'Животные', NULL, NULL, NULL, NULL, 0, NULL),
(12, 'Цветы', NULL, NULL, NULL, NULL, 0, NULL),
(13, 'Натюрморты', NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1497704569),
('m140602_111327_create_menu_table', 1497704571),
('m160312_050000_create_user', 1497704572);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text,
  `description` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `hide` tinyint(1) DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `artist_id` int(11) UNSIGNED DEFAULT NULL,
  `img_link` varchar(1000) DEFAULT NULL,
  `img_link_2` varchar(1000) DEFAULT NULL,
  `img_link_3` varchar(1000) DEFAULT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `short_desc`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `hide`, `category_id`, `artist_id`, `img_link`, `img_link_2`, `img_link_3`, `price`, `create_date`, `user_id`) VALUES
(9, '"Озерцо в октябре"', 'Холст на картоне, масло, 2014. 70х45 см.', 'О картине от автора: "Стоял октябрьский холодный день. Уши, нос и руки замерзли, но краска уверенно ложилась на холст. Как бы в награду за мои труды серое небо внезапно стало проясняться, открылись голубые окна и несколько птиц закружились над подернутым рябью озерцом. Я был счастлив."', '', '', '', 0, 12, 2, 'P1130660.jpg', '', '', 8000, '2017-06-18 18:01:08', 1),
(10, 'Копия "Зеленые любовники", Марк Шагал', 'Холст, масло. Размер 50х55', 'Копия "Зеленые любовники", Марк Шагал. Автор Мария Псарева. Холст, масло. Размер 50х55', NULL, NULL, NULL, 0, 8, 1, 'IMG_5985.jpg', NULL, NULL, 38000, '2017-06-17 08:56:01', 1),
(11, 'Копия "Розовые любовники", Марк Шагал', 'Холст, масло. Размер 70х48', 'Копия "Розовые любовники", Марк Шагал. Автор Мария Псарева. Холст, масло. Размер 70х48', NULL, NULL, NULL, 0, 8, 1, 'IMG_5991.jpg', NULL, NULL, 50600, '2017-06-17 08:56:01', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'nat', 'a4Rwr7Nmiuqu8kTPHNTT1MeUVZuVO4sM', '$2y$13$8xocYOZ3oTz7Uws6Q6h5U.xZWrD.QPiE6Jzb4fZn3DM1jDyJ5sBEW', NULL, 'natalibriks87@gmail.com', 10, 1497705296, 1497705296),
(2, 'manager', 'bCpBe5W81SA9XjZWb1RmJXrRHeiELnlb', '$2y$13$mfqpgJ1cegpyWxZPSip3pubcGmc5XVNpSHt/sjtTcXGaydFiIHXsK', NULL, 'man@mail.ru', 10, 1497705331, 1497705331),
(3, 'user', 'VrzWzS4WcXaR3KjGcxGeEXF3jaVbdC2n', '$2y$13$/TS0WT8YHS76rIRZIBl6ieE6KhO0VHT6FqScB8hN2T2tFh8RejVFO', NULL, 'user@mail.ru', 10, 1497705354, 1497705354),
(4, 'nat123', 'FgQLdyTUlGVW7Ku5AwU16TWLg8zKInnB', '$2y$13$RvUkcMrto.x6pmWSPRXsouW5OXuzNTdMFoofAt.sZFm3lCcTGcgEm', NULL, 'nat@mail.ru', 10, 1497717900, 1497717900),
(5, 'nat22', 'o42tDLDVIhj6VI8DXr311FehQCEgFtzn', '$2y$13$wEm7Eh6fSaoi8DUFK5eUzu6RDA/.CYubI2yTwYvBdoFomnG8W4nxC', NULL, '123@mail.ru', 10, 1497799450, 1497799450),
(6, 'nat55', 'fDjqTtc8-Bwfr7U6fn8ZkRDsL13WvzNK', '$2y$13$j0btnXd/B.pj0sTiZzv.CeSGplgmxou7lWbEPPCeejcvaIlqlSo/6', NULL, 'natalibriks87@gmail.co', 10, 1497799572, 1497799572),
(7, '12345', 'Y14BPcWkmg5XKViinHbe7m0_-SXBaLwv', '$2y$13$0HUejYM6EwFi2yMNbgRUu.whHEADL0/3UYyTCvYDrtdvF8OLBjz3y', NULL, '123444@mail.ru', 10, 1497799631, 1497799631),
(8, '1235425', 'jrKNgZLiksJXHlhJJ_vqy3Egpvjl9R2c', '$2y$13$sxZ81I3q6g00VqwjMfuanOha.fyS2hnwbdvCo/vqQ7qHM5iSVE3.K', NULL, '123444@mail.r', 10, 1497799663, 1497799663);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
