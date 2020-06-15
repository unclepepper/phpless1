-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2020 г., 04:50
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `desc_small` text NOT NULL,
  `desc_large` longtext NOT NULL,
  `user_created` int(191) NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `title`, `desc_small`, `desc_large`, `user_created`, `created`) VALUES
(7, 'Новость дня', 'Не следует, однако забывать, что новая модель организационной деятельности влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же сложившаяся струкрура организации в значительной степени обуславливает создание соответствующих условий активации Товарищи! укрепление и развитие структуры играет важную роль в формировании форм развития. ', 'Не следует, однако забывать, что новая модель организационной деятельности влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же сложившаяся струкрура организации в значительной степени обуславливает создание соответствующих условий активации Товарищи! укрепление и развитие структуры играет важную роль в формировании форм развития. Не следует, однако забывать, ', 0, '0000-00-00 00:00:00'),
(9, 'Трилобиты', 'Класс вымерших морских членистоногих, имевший большое значение для фауны палеозойских образований земного шара. Известно свыше 10 тыс. ископаемых видов и 5 тыс. родов, объединяемых в 150 семейств и 9—10 отрядов.\r\nПо одной из версий, предком трилобитов являлась сприггина — организм позднего протерозоя длиной около 3 см. \r\nКласс трилобитов (Trilobita) был выделен Вальхом в 1771 году. Trilobita в переводе с латинского означают «трёхдольный» («трёхлопастный»), потому что тело трилобитов состоит из трёх долей. Однако впервые трилобиты были описаны Эдвардом Ллуйдом в 1698 году под названием Trinuclei. Затем их описал Линней в 1745 году как род Entomolithes. ', 'Голова\r\n\r\nГоловной щит (цефалон) имеет форму полукруга. Средняя часть головного щита называется глабелью, боковые — щеками (либригены); задние углы щёк нередко вытянуты в более или менее длинные щёчные остроконечия. Головной щит редко состоит из одной неразрывной части, обыкновенно же разделяется с помощью особых линий или так называемых швов на несколько отдельных частей, по которым после смерти и при процессах окаменения нередко происходило распадение головного щита. К этим отдельным частям принадлежит и особая пластинка на завороченной части щита, так называемая гипостома (или верхняя губа), служившая, вероятно, прикрытием живота. По предположениям учёных, в голове трилобитов располагался желудок, сердце и мозг.\r\nТуловище и хвост\r\n\r\n', 0, '2014-06-20 15:00:00'),
(10, 'Странные обычаи', 'В так называемых «христианских» странах существует немало странных обычаев и привычек, порождённых ложной религией и присущей ей энергией невежества. Эти обычаи и привычки, с точки зрения здравого смысла, просто глупы, и «христианам» следовало бы задуматься: стоит ли продолжать всем этим заниматься.', 'Что мы имеем в виду под странными обычаями? Например, каждый год на «Рождество» и «Новый Год» в «христианских» странах вырубаются сотни миллионов елей. Эти ёлки украшают дома «христиан», а после окончания рождественских праздников все они выбрасываются. И это происходит каждый год! Это делается «христианами» для празднования «дня рождения» Иисуса Христа! Зачем каждый год для празднования «дня рождения» Спасителя губятся миллионы жизней? Лично мне это непонятно. А вам это понятно? ', 0, '0000-00-00 00:00:00'),
(11, 'Чупакабра', 'Неизвестное науке существо, персонаж городской легенды. Согласно легенде, чупакабра убивает животных (преимущественно коз) и высасывает у них кровь. Чупакабра часто становится героем художественных фильмов, сериалов, книг[1] и мультфильмов. ', 'Неизвестное науке существо, персонаж городской легенды. Согласно легенде, чупакабра убивает животных (преимущественно коз) и высасывает у них кровь. Чупакабра часто становится героем художественных фильмов, сериалов, книг[1] и мультфильмов. Достоверных сведений о существовании чупакабры нет. Тем не менее, СМИ периодически распространяют свидетельства очевидцев, якобы видевших чупакабру, поступающие из различных регионов. Зачастую за «чупакабру» принимают животных (собак, койотов, лисиц, шакалов), видоизменённых в результате болезней или мутаций', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `surname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `email`, `password`, `mobile`, `is_admin`, `created`) VALUES
(30, '', 'okorok', 'an@rus', '34', '', 0, '0000-00-00 00:00:00'),
(31, '', '', '', '', '', 0, '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
