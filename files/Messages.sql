-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 28 2020 г., 14:03
-- Версия сервера: 5.7.23-24
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0865082_default`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `id` int(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(2555) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Messages`
--

INSERT INTO `Messages` (`id`, `Email`, `Message`, `Date`) VALUES
(250, 'kirill-ateev@mail.ru', 'Всем привет!', '2019-12-08 12:57:47'),
(251, 'kirill-ateev@mail.ru', 'Выполните задачу 10', '2019-12-08 12:57:59'),
(252, 'kirill-ateev@mail.ru', 'Срочно', '2019-12-08 12:58:03'),
(256, 'kirill-ateev@mail.ru', 'Карантин на неделю!', '2020-03-30 14:15:55'),
(257, 'kirill-ateev@mail.ru', 'Карантин до конца апреля!', '2020-04-03 07:36:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`,`Email`),
  ADD KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=258;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `Users` (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
