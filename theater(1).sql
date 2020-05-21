-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 21 2020 г., 14:46
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `theater`
--

-- --------------------------------------------------------

--
-- Структура таблицы `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `directors`
--

INSERT INTO `directors` (`id`, `name`) VALUES
(1, 'Steven Spielberg'),
(2, 'Martin Scorsese'),
(3, 'Alfred Hitchcock'),
(4, 'Stanley Kubrick');

-- --------------------------------------------------------

--
-- Структура таблицы `plays`
--

CREATE TABLE `plays` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `selled` int(11) NOT NULL,
  `leftTickets` int(11) NOT NULL,
  `date` date NOT NULL,
  `gain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `plays`
--

INSERT INTO `plays` (`id`, `name`, `genre`, `director`, `price`, `selled`, `leftTickets`, `date`, `gain`) VALUES
(0, '	Jaws', '	I dunno', 0, 120, 50, 123, '2020-05-29', 6000),
(1, '	Whos That Knocking at My Door', '	No clue', 2, 450, 76, 0, '2020-05-19', 34200);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `plays`
--
ALTER TABLE `plays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `plays`
--
ALTER TABLE `plays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
