-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 28 2020 г., 10:38
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
-- Структура таблицы `Gruppa`
--

CREATE TABLE IF NOT EXISTS `Gruppa` (
  `KodGruppi` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `Kommentariy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Gruppa`
--

INSERT INTO `Gruppa` (`KodGruppi`, `IDUser`, `Kommentariy`) VALUES
(1, 1, 'SCRUM мастерий'),
(1, 10, 'Технический писатель'),
(1, 12, 'Технический писатель'),
(1, 13, 'Проектировщик'),
(1, 16, 'Аналитик'),
(1, 18, 'Аналитик'),
(1, 20, 'Программист');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Gruppa`
--
ALTER TABLE `Gruppa`
  ADD PRIMARY KEY (`KodGruppi`,`IDUser`) USING BTREE,
  ADD UNIQUE KEY `IDUser` (`IDUser`) USING BTREE;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Gruppa`
--
ALTER TABLE `Gruppa`
  ADD CONSTRAINT `Gruppa_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `Users` (`IDUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
