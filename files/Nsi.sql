-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 28 2020 г., 14:07
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
-- Структура таблицы `Nsi`
--

CREATE TABLE IF NOT EXISTS `Nsi` (
  `IDNsi` int(11) NOT NULL,
  `NazvanieNsi` varchar(255) NOT NULL,
  `Uchastnik` varchar(100) NOT NULL,
  `KommentariyNsi` varchar(1000) NOT NULL,
  `FileNsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Nsi`
--

INSERT INTO `Nsi` (`IDNsi`, `NazvanieNsi`, `Uchastnik`, `KommentariyNsi`, `FileNsi`) VALUES
(4, 'Устав проекта', 'kirill-ateev@mail.ru', 'Шаблон', 'docs/Ustav projecta.docx'),
(5, 'Реестр требований', 'kirill-ateev@mail.ru', 'Шаблон таблица', 'docs/Reestr trebovaniy.docx'),
(6, 'Содержание проекта', 'kirill-ateev@mail.ru', 'Шаблон', 'docs/Soderzhanie projecta.docx'),
(7, 'Программа и методика испытаний', 'kirill-ateev@mail.ru', 'Шаблон', 'docs/Programma i metodika ispitaniy.docx'),
(8, 'Техническое задание', 'kirill-ateev@mail.ru', 'Шаблон ГОСТ 19 ЕСПД', 'docs/Tehnicheskoe Zadanie (GOST 19 ESPD).docx');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Nsi`
--
ALTER TABLE `Nsi`
  ADD PRIMARY KEY (`IDNsi`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Nsi`
--
ALTER TABLE `Nsi`
  MODIFY `IDNsi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
