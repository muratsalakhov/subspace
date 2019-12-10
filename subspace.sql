-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 01 2019 г., 16:14
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `subspace`
--

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(11) NOT NULL,
  `notes_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes_text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Заметки';

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`notes_id`, `notes_user`, `notes_title`, `notes_text`) VALUES
(15, 'Murat', 'Вторая задача', 'Всем привет, я новая заметка!)'),
(16, 'Murat', 'Третья задача', 'Это моя задача'),
(17, 'Administrator', 'Первая заметка', 'Это моя самая первая заметка');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL,
  `timetable_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timetable_day` int(2) NOT NULL,
  `timetable_first` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timetable_second` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timetable_third` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timetable_fourth` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timetable_fifth` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timetable_sixth` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timetable_seventh` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`timetable_id`, `timetable_user`, `timetable_day`, `timetable_first`, `timetable_second`, `timetable_third`, `timetable_fourth`, `timetable_fifth`, `timetable_sixth`, `timetable_seventh`) VALUES
(1, 'Murat', 1, 'День', 'самостоятельных', 'занятий', '', '', '', ''),
(2, 'Murat', 2, '', '', '', 'Архитектура ВМИС, лк', 'ИСиТ, лк', '', ''),
(3, 'Murat', 3, '', 'СиП инженерия, пр', 'Операционные системы, пр', 'Проект. и разраб. БД, пр', 'СиП инженерия, лк', '', ''),
(4, 'Murat', 4, '', 'СиП инженерия, лаб', 'Разработка КСП, лк', 'Разработка КСП, пр', 'Разработка КСП, лаб', '', ''),
(5, 'Murat', 5, 'Основы Ст, лк', 'Физра', 'ФиЛ, лк', 'Архитектура ВМИС, лк', '', '', ''),
(6, 'Murat', 6, '', '', 'Проект. и разраб. БД', '', '', '', ''),
(7, 'Murat', 0, '', '', 'Выходной', '', '', '', ''),
(8, 'Administrator', 1, 'Математика', 'История', 'Физ-ра', '', '', '', ''),
(9, 'Administrator', 2, '', '', '', '', '', '', ''),
(10, 'Administrator', 3, '', '', '', '', '', '', ''),
(11, 'Administrator', 4, '', '', '', '', '', '', ''),
(12, 'Administrator', 5, '', '', '', '', '', '', ''),
(13, 'Administrator', 6, '', '', '', '', '', '', ''),
(14, 'Administrator', 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `todo_list`
--

CREATE TABLE `todo_list` (
  `todo_id` int(11) NOT NULL,
  `todo_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `todo_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `todo_checked` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `todo_list`
--

INSERT INTO `todo_list` (`todo_id`, `todo_user`, `todo_name`, `todo_checked`) VALUES
(1, 'Murat', 'Задача', 1),
(3, 'Murat', 'Сделать дз', 1),
(5, 'Murat', 'Покушать', 0),
(23, 'Murat', 'Поспать', 0),
(36, 'Murat2', 'Вторая задача', 0),
(47, 'Administrator', 'Первая задача', 0),
(48, 'Administrator', 'Вторая задача', 1),
(49, 'Administrator', 'Третья задача', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tracker`
--

CREATE TABLE `tracker` (
  `tracker_id` int(11) NOT NULL,
  `tracker_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracker_title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracker_1` int(1) NOT NULL DEFAULT 0,
  `tracker_2` int(1) NOT NULL DEFAULT 0,
  `tracker_3` int(1) NOT NULL DEFAULT 0,
  `tracker_4` int(1) NOT NULL DEFAULT 0,
  `tracker_5` int(1) NOT NULL DEFAULT 0,
  `tracker_6` int(1) NOT NULL DEFAULT 0,
  `tracker_7` int(1) NOT NULL DEFAULT 0,
  `tracker_8` int(1) NOT NULL DEFAULT 0,
  `tracker_9` int(1) NOT NULL DEFAULT 0,
  `tracker_10` int(1) NOT NULL DEFAULT 0,
  `tracker_11` int(1) NOT NULL DEFAULT 0,
  `tracker_12` int(1) NOT NULL DEFAULT 0,
  `tracker_13` int(1) NOT NULL DEFAULT 0,
  `tracker_14` int(1) NOT NULL DEFAULT 0,
  `tracker_15` int(1) NOT NULL DEFAULT 0,
  `tracker_16` int(1) NOT NULL DEFAULT 0,
  `tracker_17` int(1) NOT NULL DEFAULT 0,
  `tracker_18` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tracker`
--

INSERT INTO `tracker` (`tracker_id`, `tracker_user`, `tracker_title`, `tracker_1`, `tracker_2`, `tracker_3`, `tracker_4`, `tracker_5`, `tracker_6`, `tracker_7`, `tracker_8`, `tracker_9`, `tracker_10`, `tracker_11`, `tracker_12`, `tracker_13`, `tracker_14`, `tracker_15`, `tracker_16`, `tracker_17`, `tracker_18`) VALUES
(1, 'Murat', 'Привычка 1', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Murat', 'Привычка 2', 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Murat', 'Привычка 3', 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Murat', 'Привычка 4', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Murat', 'Привычка 5', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Administrator', 'Привычка 1', 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Administrator', 'Привычка 2', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Administrator', 'Привычка 3', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Administrator', 'Привычка 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Administrator', 'Привычка 5', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(2, 'Murat', 'muratsalakhov@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 'User', '12@da.ru', 'b6d767d2f8ed5d21a44b0e5886680cb9'),
(9, 'Murat2', 'muratsalakhov2@gmail.com', '202cb962ac59075b964b07152d234b70'),
(10, 'Administrator', 'a@mail.ru', '202cb962ac59075b964b07152d234b70');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`);

--
-- Индексы таблицы `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`todo_id`);

--
-- Индексы таблицы `tracker`
--
ALTER TABLE `tracker`
  ADD PRIMARY KEY (`tracker_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `tracker`
--
ALTER TABLE `tracker`
  MODIFY `tracker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
