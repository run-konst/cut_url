-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2021 г., 17:05
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cut_url`
--

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `long_link` varchar(250) DEFAULT NULL,
  `short_link` varchar(20) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`id`, `user_id`, `long_link`, `short_link`, `views`) VALUES
(1, 1, 'https://yandex.ru', 'asdasd', 2),
(2, 1, 'https://yandex.ru', 'asd', 42),
(3, 2, 'https://google.com', 'qwee', 23);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(5, 'admin', '$2y$10$muxrW1r1ghDKORqvw09UIuxHE9.khpFbj4UFb8qDmJnYJsZS5UMAu'),
(6, 'qwe', '$2y$10$MGF509AcI8aQNnqDSsETGeM8EpF.P8Qrn2O/zKXtCj/ClLt6W7AQi'),
(7, 'zxc', '$2y$10$MJGwtLIkFY1Oc3Z87RRO0.kZ5dF/iKUKmSFkp5WGvZWxPmyq3nLki'),
(8, 'vbn', '$2y$10$B3nPZdlBVhgsNpMQVwiqRudBhqFXCiytGxW5tbfEucqwiVng4PXES'),
(9, '123', '$2y$10$ImDdlFxTOXNopWZXBLmx1ujj5idUTn/ND729qO5XJtreWG1kG3BJe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_link` (`short_link`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
