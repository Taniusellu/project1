-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 28 2019 г., 16:49
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aquamea`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bacterio`
--

CREATE TABLE `bacterio` (
  `id_bacterio` int(11) NOT NULL,
  `nr_total_bact` varchar(64) NOT NULL,
  `nr_total_bact3` varchar(64) NOT NULL,
  `nr_total_bact2` varchar(64) NOT NULL,
  `nr_total_bact4` varchar(64) NOT NULL,
  `felul_apei` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bacterio`
--

INSERT INTO `bacterio` (`id_bacterio`, `nr_total_bact`, `nr_total_bact3`, `nr_total_bact2`, `nr_total_bact4`, `felul_apei`) VALUES
(1, 'sub 300 ', 'sub 100', 'sub 2', 'sub 2', 'Apă furnizată din sursele locale'),
(2, '241', '121', '312', '3333', 'Apa');

-- --------------------------------------------------------

--
-- Структура таблицы `chimic`
--

CREATE TABLE `chimic` (
  `id_chimic` int(11) NOT NULL,
  `indicatori` varchar(64) NOT NULL,
  `valori_admise` varchar(64) NOT NULL,
  `valori_admise_ex` varchar(64) NOT NULL,
  `metoda_de_analiza` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chimic`
--

INSERT INTO `chimic` (`id_chimic`, `indicatori`, `valori_admise`, `valori_admise_ex`, `metoda_de_analiza`) VALUES
(1, 'Aluminiu(mg/l)', '0,05', '0,2', 'STAS 6326 - 90'),
(2, 'Amoniac(mg/l)', '0', '0,5', 'SR ISO 5564 2001');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nume` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `mesaj` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `nume`, `email`, `mesaj`, `active`, `data`) VALUES
(9, 'wad', 'awdwa', 'dawd', 0, '2019-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `fintina`
--

CREATE TABLE `fintina` (
  `id_fintina` int(11) NOT NULL,
  `id_raion` int(11) NOT NULL,
  `id_tip` int(11) NOT NULL,
  `numar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fintina`
--

INSERT INTO `fintina` (`id_fintina`, `id_raion`, `id_tip`, `numar`) VALUES
(1, 1, 1, 32),
(2, 2, 1, 121),
(3, 1, 2, 100),
(4, 2, 2, 89),
(5, 11, 2, 234),
(6, 11, 1, 12),
(7, 12, 2, 323),
(8, 12, 1, 43),
(9, 14, 2, 323),
(10, 14, 1, 43),
(11, 13, 2, 89),
(12, 13, 1, 43);

-- --------------------------------------------------------

--
-- Структура таблицы `indicator_raion`
--

CREATE TABLE `indicator_raion` (
  `id` bigint(11) NOT NULL,
  `id_raion` bigint(11) NOT NULL,
  `id_bacterio` int(11) NOT NULL,
  `id_chimic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `indicator_raion`
--

INSERT INTO `indicator_raion` (`id`, `id_raion`, `id_bacterio`, `id_chimic`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 11, 2, 2),
(4, 12, 1, 1),
(5, 13, 2, 1),
(6, 14, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `raion`
--

CREATE TABLE `raion` (
  `id_raion` int(11) NOT NULL,
  `raion` varchar(64) NOT NULL,
  `lat` varchar(256) NOT NULL,
  `lng` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `raion`
--

INSERT INTO `raion` (`id_raion`, `raion`, `lat`, `lng`) VALUES
(1, 'Chisinau', '47.023790', '28.829846'),
(2, 'Floresti', '46.997574', '29.179967'),
(11, 'Soroca', '48.159211 ', '28.281000'),
(12, 'Drochia', '48.114640', '27.808972'),
(13, 'Singerei', '47.4000 ', '28.1000'),
(14, 'Ribnita', '47.758682', ' 29.019171');

-- --------------------------------------------------------

--
-- Структура таблицы `tip_fintina`
--

CREATE TABLE `tip_fintina` (
  `id` int(11) NOT NULL,
  `tip` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tip_fintina`
--

INSERT INTO `tip_fintina` (`id`, `tip`) VALUES
(1, 'Privat'),
(2, 'Public');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `user_name`, `pass`) VALUES
(1, 'admin', 'admin'),
(2, 'ada', 'fasfa');

-- --------------------------------------------------------

--
-- Структура таблицы `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(11) NOT NULL,
  `nume` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `parola` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `nume`, `email`, `parola`) VALUES
(1, 'Brittanie Macy', 'ciubotaru.viorel@yandex.com', 'parola'),
(9, 'Issac Whisler', 'issac.whister@gmail.com', 'parola'),
(10, 'test', 'test@gmail.com', 'test');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bacterio`
--
ALTER TABLE `bacterio`
  ADD PRIMARY KEY (`id_bacterio`);

--
-- Индексы таблицы `chimic`
--
ALTER TABLE `chimic`
  ADD PRIMARY KEY (`id_chimic`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fintina`
--
ALTER TABLE `fintina`
  ADD PRIMARY KEY (`id_fintina`),
  ADD KEY `fintina_fk0` (`id_raion`),
  ADD KEY `fintina_fk1` (`id_tip`);

--
-- Индексы таблицы `indicator_raion`
--
ALTER TABLE `indicator_raion`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `raion`
--
ALTER TABLE `raion`
  ADD PRIMARY KEY (`id_raion`);

--
-- Индексы таблицы `tip_fintina`
--
ALTER TABLE `tip_fintina`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bacterio`
--
ALTER TABLE `bacterio`
  MODIFY `id_bacterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `chimic`
--
ALTER TABLE `chimic`
  MODIFY `id_chimic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `fintina`
--
ALTER TABLE `fintina`
  MODIFY `id_fintina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `indicator_raion`
--
ALTER TABLE `indicator_raion`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `raion`
--
ALTER TABLE `raion`
  MODIFY `id_raion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `tip_fintina`
--
ALTER TABLE `tip_fintina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `fintina`
--
ALTER TABLE `fintina`
  ADD CONSTRAINT `fintina_fk0` FOREIGN KEY (`id_raion`) REFERENCES `raion` (`id_raion`),
  ADD CONSTRAINT `fintina_fk1` FOREIGN KEY (`id_tip`) REFERENCES `tip_fintina` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
