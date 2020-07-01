-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 15 2020 г., 09:06
-- Версия сервера: 5.7.23-24
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Структура таблицы `Changes`
--

CREATE TABLE `Changes` (
  `IDChanges` int(255) NOT NULL,
  `KodZadachi` bigint(20) NOT NULL,
  `ChStatusZadachi` varchar(30) NOT NULL,
  `ChZatrachenoVremeni` int(11) NOT NULL,
  `ChIspolnitel` int(11) DEFAULT NULL,
  `ChOpisanieZadachi` varchar(1000) DEFAULT NULL,
  `ChProcentGotovnosti` int(11) NOT NULL,
  `ChKommentariyZadachi` varchar(1000) DEFAULT NULL,
  `Chfile` text NOT NULL,
  `DateChanges` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Changes`
--

INSERT INTO `Changes` (`IDChanges`, `KodZadachi`, `ChStatusZadachi`, `ChZatrachenoVremeni`, `ChIspolnitel`, `ChOpisanieZadachi`, `ChProcentGotovnosti`, `ChKommentariyZadachi`, `Chfile`, `DateChanges`) VALUES
(8, 37, 'Бэклог', 0, NULL, 'Триггер', 0, NULL, '', '2020-03-02 07:30:31'),
(9, 37, 'Бэклог', 0, 0, 'Триггер', 0, '', 'files/Gruppa.sql', '2020-03-02 07:31:21'),
(10, 37, 'Разработка', 5, 1, 'Триггер', 20, 'Разработан первый вариант триггера', 'files/Trigger 1.sql', '2020-04-10 15:30:52'),
(11, 37, 'Разработка', 5, 1, 'Триггер', 20, 'Разработан второй вариант триггера', 'files/Trigger 2.sql', '2020-04-15 09:11:02'),
(12, 37, 'Тестирование', 10, 1, 'Триггер', 30, '20.04.2020 Тестируем триггер, результаты заносим в документ (задача 30)', 'files/Trigger 2.sql', '2020-04-20 12:41:39'),
(13, 37, 'Тестирование', 15, 1, 'Триггер', 80, 'Интеграционное тестирование на клиенте + новый вариант.', 'files/Trigger 3.sql', '2020-04-25 09:42:36'),
(14, 37, 'Готово', 15, 1, 'Триггер', 100, 'Триггер протестирован и включен в систему', 'files/Trigger 3.sql', '2020-05-02 07:02:54'),
(19, 32, 'Бэклог', 0, 20, 'Разработка клиентского приложения', 0, '', '', '2020-03-31 12:11:12'),
(20, 32, 'Разработка', 5, 20, 'Разработка клиентского приложения', 30, 'Проведен анализ требований, сформирован прототип', 'files/project_1.rar', '2020-04-05 07:20:42'),
(21, 32, 'Разработка', 10, 20, 'Разработка клиентского приложения', 50, 'Обновление прототипа', 'files/project_2.rar', '2020-04-10 09:28:46'),
(22, 32, 'Тестирование', 20, 20, 'Разработка клиентского приложения', 80, 'Рабочий прототип протестирован. Нужно изменить меню авторизации в соответствии с ТЗ ', 'files/project_3.rar', '2020-04-15 15:31:52'),
(23, 32, 'Разработка', 25, 20, 'Разработка клиентского приложения', 90, 'Исправлено', 'files/project_4.rar', '2020-04-20 13:19:57'),
(24, 32, 'Готово', 30, 20, 'Разработка клиентского приложения', 100, 'Готовая и протестированная версия 05.03.2020', 'files/project.rar', '2020-04-28 12:29:00'),
(25, 34, 'Готово', 50, 0, 'Составить сводный отчет по приложению. Прикрепить прототип.', 0, '', '', '2020-05-04 08:40:23'),
(26, 34, 'Бэклог', 0, 0, 'Составить сводный отчет по приложению. Прикрепить прототип.', 0, '', '', '2020-05-04 08:41:18'),
(27, 34, 'Бэклог', 10, 10, 'Составить сводный отчет по приложению. Прикрепить прототип.', 80, 'Почти готово, нужно добавить пару глав', 'files/Ves_proekt.docx', '2020-05-05 17:07:01'),
(28, 34, 'Готово', 10, 10, 'Составить сводный отчет по приложению. Прикрепить прототип.', 80, 'Почти готово, нужно добавить пару глав', 'files/Ves_proekt.docx', '2020-05-05 17:07:51'),
(29, 14, 'Бэклог', 5, 1, 'Описание инициативы', 100, '18.02.2020 Составлена', 'files/XP Описание инициативы (проекта).docx', '2020-06-10 17:09:54'),
(30, 15, 'Разработка', 5, 1, 'Устав проекта', 100, '29.02.2020 Обновлён, требует окончательной проверки. (Составлен по шаблону)', 'files/Ustav projecta.docx', '2020-06-10 17:10:21'),
(31, 16, 'Тестирование', 5, 11, 'Спецификация требований', 100, 'Сформирована структура документа, отсутствуют описания:\r\n1) Логическая модель данных;\r\n2) Словарь данных;\r\n3) Отчёты;\r\n4) Получение, целостность, хранение и утилизация данных;\r\n5) Требования к внешним интерфейсам (раздел);\r\n6)  Приложение А: словарь терминов;\r\n7) Приложение Б:  модели анализа;\r\n2020-04-14 - Окончено.', 'files/ требований к проекту .docx', '2020-06-10 17:10:33'),
(32, 16, 'Готово', 5, 11, 'Спецификация требований', 100, 'Сформирована структура документа, отсутствуют описания:\r\n1) Логическая модель данных;\r\n2) Словарь данных;\r\n3) Отчёты;\r\n4) Получение, целостность, хранение и утилизация данных;\r\n5) Требования к внешним интерфейсам (раздел);\r\n6)  Приложение А: словарь терминов;\r\n7) Приложение Б:  модели анализа;\r\n2020-04-14 - Окончено.', 'files/ требований к проекту .docx', '2020-06-12 12:32:41'),
(33, 15, 'Готово', 5, 1, 'Устав проекта', 100, '29.02.2020 Обновлён, требует окончательной проверки. (Составлен по шаблону)', 'files/Ustav projecta.docx', '2020-06-12 12:32:49'),
(34, 14, 'Готово', 5, 1, 'Описание инициативы', 100, '18.02.2020 Составлена', 'files/XP Описание инициативы (проекта).docx', '2020-06-12 12:32:54'),
(35, 42, 'Бэклог', 0, NULL, 'ТЗ', 0, NULL, '', '2020-06-12 12:58:25'),
(36, 42, 'Разработка', 0, 0, 'ТЗ', 50, 'Разрабатываем', 'files/Tehnicheskoe Zadanie (GOST 19 ESPD).docx', '2020-06-12 12:59:00');

-- --------------------------------------------------------

--
-- Структура таблицы `Gruppa`
--

CREATE TABLE `Gruppa` (
  `KodGruppi` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `Kommentariy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Gruppa`
--

INSERT INTO `Gruppa` (`KodGruppi`, `IDUser`, `Kommentariy`) VALUES
(1, 1, 'SCRUM мастер'),
(1, 10, 'Технический писатель'),
(1, 11, 'Тестировщик'),
(1, 12, 'Технический писатель'),
(1, 13, 'Проектировщик'),
(1, 16, 'Аналитик'),
(1, 18, 'Аналитик'),
(1, 20, 'Программист');

-- --------------------------------------------------------

--
-- Структура таблицы `Kompaniya`
--

CREATE TABLE `Kompaniya` (
  `KodKompanii` int(11) NOT NULL,
  `NazvanieKompanii` varchar(30) DEFAULT NULL,
  `FIODirectora` varchar(60) DEFAULT NULL,
  `Adres` varchar(50) DEFAULT NULL,
  `Telefon` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Kompaniya`
--

INSERT INTO `Kompaniya` (`KodKompanii`, `NazvanieKompanii`, `FIODirectora`, `Adres`, `Telefon`) VALUES
(1, 'PSPU Team', 'Егоров Константин Борисович', 'ул. Пушкина, 42', '89125869348');

-- --------------------------------------------------------

--
-- Структура таблицы `Messages`
--

CREATE TABLE `Messages` (
  `id` int(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(2555) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Messages`
--

INSERT INTO `Messages` (`id`, `Email`, `Message`, `Date`) VALUES
(244, 'nsimakina@yandex.ru', 'Здравствуйте', '2019-12-08 12:40:57'),
(250, 'kirill-ateev@mail.ru', 'Здравствуйте', '2019-12-08 12:57:47'),
(251, 'kirill-ateev@mail.ru', 'Выполните задачу 10', '2019-12-08 12:57:59'),
(252, 'kirill-ateev@mail.ru', 'Срочно', '2019-12-08 12:58:03'),
(253, 'nsimakina@yandex.ru', 'Добавлены новые требования, проанализируйте их', '2020-03-20 06:17:35'),
(256, 'kirill-ateev@mail.ru', 'Тестирование (внутреннее компонентное и внутреннее интеграционное). Постарайтесь построить упорядоченный граф до 14.04', '2020-03-30 14:15:55'),
(257, 'kirill-ateev@mail.ru', 'Тестирование внешнее (интеграционное). Постарайтесь построить упорядоченный граф до 28.04', '2020-04-03 07:36:46'),
(258, 'ddkost@mail.ru', 'Тестирование выполнено, отчёт закреплён', '2020-04-12 12:40:59'),
(259, 'kirill-ateev@mail.ru', 'Выполнен финальный рефакторинг клиентского приложения', '2020-05-04 07:25:00'),
(264, 'nsimakina@yandex.ru', 'Молодцы, система одобрена', '2020-05-15 12:41:00');

-- --------------------------------------------------------

--
-- Структура таблицы `Nsi`
--

CREATE TABLE `Nsi` (
  `IDNsi` int(11) NOT NULL,
  `NazvanieNsi` varchar(255) NOT NULL,
  `Uchastnik` varchar(100) NOT NULL,
  `KommentariyNsi` varchar(1000) NOT NULL,
  `FileNsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Nsi`
--

INSERT INTO `Nsi` (`IDNsi`, `NazvanieNsi`, `Uchastnik`, `KommentariyNsi`, `FileNsi`) VALUES
(4, 'Устав проекта', 'kirill-ateev@mail.ru', 'Шаблон', 'docs/Ustav projecta.docx'),
(5, 'Реестр требований', 'kirill-ateev@mail.ru', 'Шаблон таблица', 'docs/Reestr trebovaniy.docx'),
(6, 'Содержание проекта', 'kirill-ateev@mail.ru', 'Шаблон', 'docs/Soderzhanie projecta.docx'),
(7, 'Программа и методика испытаний', 'kirill-ateev@mail.ru', 'Шаблон', 'docs/Programma i metodika ispitaniy.docx'),
(8, 'Техническое задание', 'kirill-ateev@mail.ru', 'Шаблон ГОСТ 19 ЕСПД', 'docs/Tehnicheskoe Zadanie (GOST 19 ESPD).docx');

-- --------------------------------------------------------

--
-- Структура таблицы `Plan`
--

CREATE TABLE `Plan` (
  `KodPlana` int(11) NOT NULL,
  `KodProjecta` int(11) NOT NULL,
  `OpisaniePlana` varchar(255) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Plan`
--

INSERT INTO `Plan` (`KodPlana`, `KodProjecta`, `OpisaniePlana`, `Data`) VALUES
(19, 1, 'Спринт 2', '2020-01-01'),
(83, 2, 'Выявить требования к дате', '2020-12-12'),
(84, 2, 'Составить устав проекта, содержание, и методику испытаний', '2020-12-12'),
(85, 2, 'Выявить требования к дате!', '2020-12-12'),
(86, 1, 'Спринт 3', '2020-01-01'),
(87, 1, 'Показать прототип Заказчику', '2020-12-12'),
(88, 4, 'Закончить этап выявления требований и концепции ИС', '2020-03-17'),
(89, 4, 'Закончить этап корректировки плана, разработки ТЗ, проектирования', '2020-03-24'),
(90, 4, 'Проектирование (Концептуальное, логическое, пользовательский интерфейс)', '2020-03-31'),
(91, 4, 'Тестирование (внутреннее) и разработка серверной части. Закончить', '2020-04-07'),
(92, 4, 'Тестирование (интеграционное) и разработка клиентской части. Закончить', '2020-04-14'),
(96, 4, 'Составить сводный отчет, прикрепить прототип', '2020-05-15'),
(97, 4, 'Представление продукта заказчику', '2020-05-21'),
(102, 1, 'Спринт 1', '2019-12-01'),
(103, 4, 'Сопровождение системы до ', '2020-11-25'),
(104, 4, 'Сделать план', '2020-12-31');

-- --------------------------------------------------------

--
-- Структура таблицы `Project`
--

CREATE TABLE `Project` (
  `KodProjecta` int(11) NOT NULL,
  `NazvanieProjecta` varchar(255) NOT NULL,
  `KodGruppi` int(11) NOT NULL,
  `DataSozdaniya` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Project`
--

INSERT INTO `Project` (`KodProjecta`, `NazvanieProjecta`, `KodGruppi`, `DataSozdaniya`) VALUES
(1, 'Тренажёр отработки этапов проектного Менеджмента', 1, '2020-01-20'),
(2, 'Информационная система поддержки пользователей', 1, '2020-01-21'),
(4, 'Информационная система \"Коммуникационная платформа доступности городской среды для малоподвижных граждан\"', 1, '2020-02-15');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `IDUser` int(11) NOT NULL,
  `KodKompanii` int(11) NOT NULL DEFAULT '1',
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Rol` varchar(50) DEFAULT NULL,
  `Naviki` varchar(255) DEFAULT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`IDUser`, `KodKompanii`, `Email`, `Password`, `Rol`, `Naviki`, `RegisterDate`) VALUES();

-- --------------------------------------------------------

--
-- Структура таблицы `Zadachi`
--

CREATE TABLE `Zadachi` (
  `KodProjecta` int(11) NOT NULL,
  `KodZadachi` bigint(20) NOT NULL,
  `TipZadachi` varchar(50) NOT NULL,
  `Prioritet` varchar(30) NOT NULL,
  `Trudoemkost` int(11) DEFAULT NULL,
  `ZatrachenoVremeni` int(11) DEFAULT '0',
  `StatusZadachi` varchar(30) NOT NULL,
  `Ispolnitel` int(11) DEFAULT NULL,
  `OpisanieZadachi` varchar(1000) DEFAULT NULL,
  `ProcentGotovnosti` int(3) NOT NULL DEFAULT '0',
  `KommentariyZadachi` varchar(1000) DEFAULT NULL,
  `file` text NOT NULL,
  `DataZadachi` date NOT NULL,
  `DataKonca` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Zadachi`
--

INSERT INTO `Zadachi` (`KodProjecta`, `KodZadachi`, `TipZadachi`, `Prioritet`, `Trudoemkost`, `ZatrachenoVremeni`, `StatusZadachi`, `Ispolnitel`, `OpisanieZadachi`, `ProcentGotovnosti`, `KommentariyZadachi`, `file`, `DataZadachi`, `DataKonca`) VALUES
(1, 1, 'Требования', 'Средний', 10, 0, 'Тестирование', 1, 'Разработка требований', 0, '11.11.2011 Выявлены требования и занесены в файл \r\n13.11.2011 Требования одобрены', 'files/SQL запросы для диаграмм.txt', '2019-11-30', '2019-12-30'),
(1, 2, 'Требования', 'Средний', 10, 0, 'Готово', 1, 'Составить устав проекта 1!', 0, '20.12. Отправлено на сервер', 'files/Ustav projecta.docx', '2019-11-30', '2019-12-30'),
(1, 3, 'Проектирование', 'Средний', 30, 10, 'Бэклог', 1, 'Бизнес процессы IDF0', 0, '11.11.19. Передать на проверку ', 'files/ IDF0.rsf', '2019-11-30', '2019-12-30'),
(1, 5, 'Разработка', 'Средний', 10, 0, 'Разработка', 1, 'Модуль \"Задачи\"', 0, '', 'files/group.php', '2019-11-30', '2019-12-30'),
(1, 6, 'Документирование', 'Средний', 10, 0, 'Готово', 1, 'Модуль \"Связь\"', 0, '', 'files/ под вкр.docx', '2019-11-30', '2019-12-30'),
(1, 7, 'Требования', 'Средний', 10, 0, 'Тестирование', 1, '123456879', 0, '', 'files/Bodyshop.mdj', '2019-11-30', '2019-12-30'),
(1, 10, 'Требования', 'Средний', 10, 0, 'Бэклог', 1, 'Модуль \"Проекты\"', 0, '', 'files/Last check 11.01.zip', '2019-11-30', '2019-12-30'),
(1, 11, 'Требования', 'Средний', 10, 20, 'Разработка', 1, 'Модуль ', 0, '', 'files/aida64.mem', '2019-11-30', '2019-12-30'),
(1, 12, 'Тестирование', 'Средний', 30, 0, 'Готово', 1, 'Прототип 1', 0, '', 'files/21.01 Last check (stats).zip', '2019-12-04', '2020-05-20'),
(1, 13, 'Разработка', 'Средний', 10, 0, 'Готово', 1, 'Прототип 2', 0, '', 'files/Last check 21.01 (Stats).zip', '2019-01-21', '2019-05-20'),
(2, 8, 'Требования', 'Средний', 10, 0, 'Готово', 1, 'Составить описание проекта', 0, 'Готово, можно отправлять заказчику! ', 'files/afaapi.dll', '2019-11-30', '2020-05-20'),
(2, 9, 'Требования', 'Средний', 10, 0, 'Тестирование', 1, 'Тест карты', 0, '', 'files/index.php', '2019-11-30', '2020-05-20'),
(2, 30, 'Проектирование', 'Высокий', 30, 15, 'Бэклог', 1, 'Логическое проектирование', 0, '', '', '2020-04-01', '2020-04-22'),
(2, 35, 'Требования', 'Средний', 10, 0, 'Бэклог', 0, 'Тестирование триггера', 0, '', 'files/Messages.sql', '2020-04-01', '2020-04-07'),
(2, 36, 'Требования', 'Средний', 10, 0, 'Бэклог', NULL, 'Тестирование триггера 2', 0, NULL, '', '2020-04-02', '2020-04-22'),
(2, 37, 'Тестирование', 'Средний', 10, 15, 'Готово', 1, 'Триггер', 100, 'Разрабатываем\r\n02.05.2020 Тестируем, результаты заносим в задачу 10\r\n02.05.2020 Триггеры протестированы, прикреплено решение\r\n02.05.2020 Готово', 'files/Trigger 3.txt', '2020-04-02', '2020-04-07'),
(2, 42, 'Документация', 'Средний', 100, 0, 'Разработка', 0, 'ТЗ', 50, 'Разрабатываем', 'files/Tehnicheskoe Zadanie (GOST 19 ESPD).docx', '2020-04-01', '2020-05-20'),
(4, 14, 'Документация', 'Средний', 10, 5, 'Готово', 1, 'Описание инициативы', 100, '18.02.2020 Составлена', 'files/XP Описание инициативы (проекта).docx', '2020-02-11', '2020-02-25'),
(4, 15, 'Документация', 'Средний', 10, 5, 'Готово', 1, 'Устав проекта', 100, '29.02.2020 Обновлён, требует окончательной проверки. (Составлен по шаблону)', 'files/Ustav projecta.docx', '2020-02-18', '2020-03-03'),
(4, 16, 'Требования', 'Средний', 15, 5, 'Готово', 11, 'Спецификация требований', 100, 'Сформирована структура документа, отсутствуют описания:\r\n1) Логическая модель данных;\r\n2) Словарь данных;\r\n3) Отчёты;\r\n4) Получение, целостность, хранение и утилизация данных;\r\n5) Требования к внешним интерфейсам (раздел);\r\n6)  Приложение А: словарь терминов;\r\n7) Приложение Б:  модели анализа;\r\n2020-04-14 - Окончено.', 'files/ требований к проекту .docx', '2020-02-25', '2020-03-24'),
(4, 17, 'Документация', 'Средний', 40, 5, 'Готово', 12, 'Техническое задание', 100, 'Готово полностью (на проверку)', 'files/TZ.docx', '2020-02-25', '2020-03-24'),
(4, 18, 'Документация', 'Средний', 10, 5, 'Готово', 1, 'План проекта', 100, '03.03.2020 Закончено (не протестировано)\r\n17.03.2020 Новый вариант ', 'files/XP План для OpenProj.docx', '2020-02-11', '2020-02-25'),
(4, 20, 'Документация', 'Средний', 10, 10, 'Готово', 1, 'Содержание проекта', 100, '29.02.2020 Нужно добавить Ограничения проекта, Допущения проекта и Риски проекта\r\n24.03.2020', 'files/Soderzhanie projecta.docx', '2020-02-25', '2020-03-03'),
(4, 21, 'Документация', 'Средний', 10, 5, 'Готово', 18, 'Структуры декомпозиции работ', 100, '29.02.2020 Готово полностью (На проверку)', 'files/SDR (WBS).docx', '2020-02-15', '2020-02-25'),
(4, 23, 'Требования', 'Средний', 30, 10, 'Готово', 1, 'Реестр требований', 100, '05.03.2020 - Выполнена валидация требований', 'files/XP Реестр требований.docx', '2020-02-18', '2020-03-24'),
(4, 24, 'Проектирование', 'Средний', 20, 40, 'Готово', 13, 'Концептуальное проектирование (Объектное проектирование, Диаграммы IDEF0, Диаграммы DFD)', 100, '23.03.2020 Выполнено 80%, отправлено на доработку аналитикам\r\n24.03.2020 Аналитики доработали до 100%', 'files/XPproject (Лаб 6.1).rar', '2020-03-17', '2020-03-24'),
(4, 25, 'Проектирование', 'Средний', 30, 15, 'Готово', 13, 'Логическое проектирование (Диаграммы взаимодействия, Диаграммы классов (на основании диаграмм DFD (классы управления и сущностей) и диаграмм последовательности (граничные классы))', 100, 'Готово логическое проектирование', 'files/6.2.rar', '2020-03-17', '2020-03-31'),
(4, 26, 'Проектирование', 'Средний', 30, 25, 'Готово', 13, 'Проектирование пользовательского интерфейса (Диаграммы прецедентов, Диаграммы деятельности, Диаграммы состояний) + Выводы и целостность', 100, 'Пользовательское вывод целостность', 'files/6.3.rar', '2020-03-17', '2020-03-31'),
(4, 29, 'Разработка', 'Средний', 50, 18, 'Готово', 20, 'Разработка серверной части приложения', 100, 'Разработана база данных, формы, триггеры и процедуры для серверной части с использованием Django Framework. Выполнен отчёт для лабораторной работы.\r\n2020-04-14 - Оценено и завершено', 'files/accessibility_project.zip', '2020-03-20', '2020-04-14'),
(4, 31, 'Тестирование', 'Средний', 30, 70, 'Готово', 11, 'Тестирование (внутреннее компонентное и внутреннее интеграционное)', 100, '2020-04-22 - Закончено и проверено.', 'files/XP лабораторная 9 тестирование серверной части.rar', '2020-03-19', '2020-04-22'),
(4, 32, 'Разработка', 'Средний', 50, 30, 'Готово', 20, 'Разработка клиентского приложения', 100, 'Проведено интеграционное тестирование и завершен рефакторинг.', 'files/project.rar', '2020-03-31', '2020-04-28'),
(4, 33, 'Тестирование', 'Средний', 30, 5, 'Готово', 11, 'Тестирование внешнее (интеграционное)', 100, 'Совместно с Железновым Егором и Ивановым Максимом в качестве Аналитиков', 'files/ работа №10. Интеграционное тестирование клиентской части.docx', '2020-03-30', '2020-04-28'),
(4, 34, 'Документация', 'Средний', 50, 10, 'Готово', 10, 'Сводный отчет по приложению.', 90, 'Почти готово, нужно добавить пару глав', 'files/Ves_proekt.docx', '2020-03-17', '2020-05-15');

--
-- Триггеры `Zadachi`
--
DELIMITER $$
CREATE TRIGGER `SaveChanges` BEFORE UPDATE ON `Zadachi` FOR EACH ROW Begin
IF Old.`StatusZadachi` <> New.`StatusZadachi` OR Old.`file` <> New.`file` THEN
        INSERT INTO `Changes`(`KodZadachi`,`ChStatusZadachi`,`ChZatrachenoVremeni`, `ChIspolnitel`,`ChOpisanieZadachi`,`ChProcentGotovnosti`, `ChKommentariyZadachi`,`Chfile`)
        VALUES(New.`KodZadachi`, New.`StatusZadachi`,New.`ZatrachenoVremeni`,New.`Ispolnitel`,New.`OpisanieZadachi`,New.`ProcentGotovnosti`,New.`KommentariyZadachi`,New.`file`);
   
    END IF;
End
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `SaveChangesInsert` AFTER INSERT ON `Zadachi` FOR EACH ROW Begin
        INSERT INTO `Changes`(`KodZadachi`,`ChStatusZadachi`,`ChZatrachenoVremeni`, `ChIspolnitel`,`ChOpisanieZadachi`,`ChProcentGotovnosti`, `ChKommentariyZadachi`,`Chfile`)
        VALUES(New.`KodZadachi`, New.`StatusZadachi`,New.`ZatrachenoVremeni`,New.`Ispolnitel`,New.`OpisanieZadachi`,New.`ProcentGotovnosti`,New.`KommentariyZadachi`,New.`file`);

End
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Changes`
--
ALTER TABLE `Changes`
  ADD PRIMARY KEY (`IDChanges`,`KodZadachi`),
  ADD KEY `KodZadachi` (`KodZadachi`);

--
-- Индексы таблицы `Gruppa`
--
ALTER TABLE `Gruppa`
  ADD PRIMARY KEY (`KodGruppi`,`IDUser`) USING BTREE,
  ADD UNIQUE KEY `IDUser` (`IDUser`) USING BTREE;

--
-- Индексы таблицы `Kompaniya`
--
ALTER TABLE `Kompaniya`
  ADD PRIMARY KEY (`KodKompanii`),
  ADD UNIQUE KEY `KodKompanii` (`KodKompanii`);

--
-- Индексы таблицы `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`,`Email`),
  ADD KEY `Email` (`Email`);

--
-- Индексы таблицы `Nsi`
--
ALTER TABLE `Nsi`
  ADD PRIMARY KEY (`IDNsi`);

--
-- Индексы таблицы `Plan`
--
ALTER TABLE `Plan`
  ADD PRIMARY KEY (`KodPlana`,`KodProjecta`) USING BTREE,
  ADD UNIQUE KEY `KodPlana` (`KodPlana`),
  ADD KEY `KodProjecta` (`KodProjecta`);

--
-- Индексы таблицы `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`KodProjecta`,`KodGruppi`),
  ADD UNIQUE KEY `KodProjecta` (`KodProjecta`),
  ADD KEY `Project_ibfk_1` (`KodGruppi`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`IDUser`,`KodKompanii`,`Email`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `IDUser` (`IDUser`),
  ADD KEY `KodKompanii` (`KodKompanii`);

--
-- Индексы таблицы `Zadachi`
--
ALTER TABLE `Zadachi`
  ADD PRIMARY KEY (`KodProjecta`,`KodZadachi`),
  ADD UNIQUE KEY `KodZadachi` (`KodZadachi`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Changes`
--
ALTER TABLE `Changes`
  MODIFY `IDChanges` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `Kompaniya`
--
ALTER TABLE `Kompaniya`
  MODIFY `KodKompanii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT для таблицы `Nsi`
--
ALTER TABLE `Nsi`
  MODIFY `IDNsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `Plan`
--
ALTER TABLE `Plan`
  MODIFY `KodPlana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `Project`
--
ALTER TABLE `Project`
  MODIFY `KodProjecta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `Zadachi`
--
ALTER TABLE `Zadachi`
  MODIFY `KodZadachi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Changes`
--
ALTER TABLE `Changes`
  ADD CONSTRAINT `Changes_ibfk_1` FOREIGN KEY (`KodZadachi`) REFERENCES `Zadachi` (`KodZadachi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Gruppa`
--
ALTER TABLE `Gruppa`
  ADD CONSTRAINT `Gruppa_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `Users` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Gruppa_ibfk_2` FOREIGN KEY (`KodGruppi`) REFERENCES `Project` (`KodGruppi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `Users` (`Email`);

--
-- Ограничения внешнего ключа таблицы `Plan`
--
ALTER TABLE `Plan`
  ADD CONSTRAINT `Plan_ibfk_1` FOREIGN KEY (`KodProjecta`) REFERENCES `Project` (`KodProjecta`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`KodKompanii`) REFERENCES `Kompaniya` (`KodKompanii`);

--
-- Ограничения внешнего ключа таблицы `Zadachi`
--
ALTER TABLE `Zadachi`
  ADD CONSTRAINT `Zadachi_ibfk_1` FOREIGN KEY (`KodProjecta`) REFERENCES `Project` (`KodProjecta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
