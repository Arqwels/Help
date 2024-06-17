-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 17 2024 г., 20:44
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `help`
--

-- --------------------------------------------------------

--
-- Структура таблицы `statement`
--

CREATE TABLE `statement` (
  `id` int(11) NOT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `statement`
--

INSERT INTO `statement` (`id`, `full_name`, `department`, `category`, `description`, `status`) VALUES
(1, 'Кузьмин Данил Алексеевич', 'Бухгалтерия', 'computer', 'У меня троян в пк, придите пооомогите!', 'В процессе'),
(2, 'Пупкин Константин Валерьевич', 'IT отдел', 'software', 'У меня отсутствует VSCode на моём компьютере, установите!', 'В процессе'),
(3, 'Пупкин Константин Валерьевич', 'IT отдел', 'network', 'Небольшие неполадки с сеть, почему то не работает!', 'Выполнено'),
(4, 'Пупкин Константин Валерьевич', 'IT отдел', 'computer', 'У меня украли видеокарту в компьютере, не могу запустить программу из-за этого. Так же не могу поиграть в мою любимую игру Dota 2', 'Отменено'),
(5, 'Кузьмин Данил Алексеевич', 'Бухгалтерия', 'network', 'Молния убила её!', 'В процессе');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `full_name`, `phone`, `email`, `department`) VALUES
(1, 'Arqwels', '0daaa7dbfd4a063265bf009c3d050b48', 'Кузьмин Данил Алексеевич', '+79372718320', 'danil@gmail.com', 'Бухгалтерия'),
(2, 'Faster', '0daaa7dbfd4a063265bf009c3d050b48', 'Пупкин Константин Валерьевич', '+79182454310', 'danil@gmail.com', 'IT отдел'),
(3, 'help', 'helpme', 'Нирин Виталий Малевич', '+79876312342', 'wert@gmail.com', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `statement`
--
ALTER TABLE `statement`
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
-- AUTO_INCREMENT для таблицы `statement`
--
ALTER TABLE `statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
