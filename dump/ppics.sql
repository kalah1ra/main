-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2022 г., 19:24
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ppics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Машины'),
(3, 'Абстракция'),
(4, 'Пейзаж'),
(5, 'Игры'),
(8, 'Животные');

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `fav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `description`, `section_id`, `status`, `user_login`, `cat_id`, `created_at`) VALUES
(12, '../img/pics/12.jpg', '', 3, '1', '', 4, '2022-06-10 00:00:00'),
(14, '../img/pics/14.jpg', '', 3, '1', '', 4, '2022-06-10 00:00:00'),
(15, '../img/pics/15.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00'),
(16, '../img/pics/16.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00'),
(17, '../img/pics/17.jpg', '', 3, '1', '', 1, '2022-06-10 00:00:00'),
(18, '../img/pics/18.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00'),
(19, '../img/pics/19.jpg', '', 3, '1', '', 1, '2022-06-10 00:00:00'),
(20, '../img/pics/20.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00'),
(21, '../img/pics/21.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00'),
(22, '../img/pics/22.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00'),
(24, '../img/pics/24.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00'),
(25, '../img/pics/25.jpg', '', 3, '1', '', 1, '2022-06-10 00:00:00'),
(26, '../img/pics/26.jpg', '', 2, '1', '', 1, '2022-06-10 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `name`) VALUES
(1, 'Компьютер'),
(2, 'Телефон'),
(3, 'Красивые');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES
(1, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@admin.com'),
(3, 'meowmeow', '4a4be40c96ac6314e91d93f38043a634', 'meow@gmail.com'),
(4, 'uiouiouio', '25f9e794323b453885f5181f1b624d0b', 'zxc@gmail.com'),
(5, 'krasnikovakristina', '25f9e794323b453885f5181f1b624d0b', 'chris@gmail.com'),
(6, '321312', '25f9e794323b453885f5181f1b624d0b', 'asdfgh@yz.ru'),
(7, 'sadsad', '25f9e794323b453885f5181f1b624d0b', 'sadddddd@sad.sad'),
(8, 'QQQQQQQQ', '25f9e794323b453885f5181f1b624d0b', 'qqqq@qqq.reo'),
(9, 'qwertyui', '25f9e794323b453885f5181f1b624d0b', 'qwertyuio@fgh.rtyu'),
(10, 'poipoipoi', 'f071a126f033b3465897dd1666550c25', 'poipoipoi@poipoipoi.ri'),
(11, 'asdasdasd', 'a3dcb4d229de6fde0db5686dee47145d', 'asdasdasd@asd.ru'),
(12, 'macwel', 'c4236d312f6636fde75a9af72f5c9f9f', 'wifi-215@yandex.ru'),
(15, 'wifi-215@yandex.ru', 'c4236d312f6636fde75a9af72f5c9f9f', 'wifi-215@yandex.ru'),
(20, 'meowmeow321321', '25f9e794323b453885f5181f1b624d0b', 'meow132131@gmail.com'),
(21, 'chrissbi', '41479efa86013f69d73b958c79be75b4', 'chrissbi@gmail.com'),
(22, 'meowmeow321312', '77d5a3ce97ccff226dcdaaf07d5721f5', 'meoddddddddw@gmail.com'),
(23, 'meowmeow321312x', 'e10adc3949ba59abbe56e057f20f883e', 'meowxx@gmail.com'),
(24, 'meowmeowa', 'e10adc3949ba59abbe56e057f20f883e', 'dmeow@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `user_id` (`user_id`,`pic_id`),
  ADD KEY `pic` (`pic_id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pic_cat_id` (`cat_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `pic` FOREIGN KEY (`pic_id`) REFERENCES `pictures` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pic_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
