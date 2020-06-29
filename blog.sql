-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 29 2020 г., 08:14
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
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `title` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `title`) VALUES
(1, 'Интересное'),
(3, 'Животные'),
(6, 'Насекомые'),
(7, 'Обо всем');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `news_id`, `user_created`, `comment`, `created`) VALUES
(26, 14, 7, 'second comment\r\n', '0000-00-00 00:00:00'),
(82, 12, 8, 'Эти глаза на против...', '0000-00-00 00:00:00'),
(88, 12, 9, 'мне ничего не видно', '0000-00-00 00:00:00'),
(95, 12, 11, 'All be back', '0000-00-00 00:00:00'),
(110, 14, 7, 'sdsf', '0000-00-00 00:00:00'),
(111, 17, 7, 'first comment\r\n', '0000-00-00 00:00:00'),
(112, 18, 7, 'iPhone the best!', '0000-00-00 00:00:00');

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
  `created` timestamp NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `title`, `desc_small`, `desc_large`, `user_created`, `created`, `catid`) VALUES
(12, 'Трилоби́ты', 'Класс вымерших морских членистоногих, имевший большое значение для фауны палеозойских образований земного шара. Известно свыше 10 тыс. ископаемых видов и 5 тыс. родов, объединяемых в 150 семейств и 9—10 отрядов. ', 'Морфология тела трилобитов полностью соответствует организации типа членистоногих (ближайшие современные аналоги — мокрицы и мечехвосты[2]). Строение тела трилобитов несёт свидетельства приспособленности к придонному образу жизни: мощный панцирь (экзоскелет), уплощённость, сложные глаза на верхней стороне тела, расположение рта и ног на брюшной стороне тела.\r\n\r\nДлина тела трилобитов доходила до 72 см (Isotelus), и даже до 90 см. Тело состояло из защищённой панцирем головы с двумя глазами, сегментированного туловища (торакс) и хвоста (пигидий). ', 0, '0000-00-00 00:00:00', 6),
(14, 'Самые глупые поступки людей', 'Чего только люди не делают, чтобы выделиться. Каких только поступков они не совершают, чтобы казаться лучше чем остальные. Иногда это просто выходит за пределы разумного. Но что об этом говорить? Давайте взглянем на самые глупые поступки людей, по крайней мере на некоторые из них.', '<p>1. Испанка Анхелес Дюран объявила себя хозяйкой солнца, ссылаясь на то, что по закону Солнце не может принадлежать ни одному Государству, но там ничего не сказано про обычных людей. Более того она пошла в нотариальную контору и даже оформила там документ. В этом документе говорится, что «Анхелес Дюран является владелицей Солнца, звезды, расположенной на расстоянии 149600000 от Земли». Но самое интересное, что она собирается брать налог на пользование Солнцем со всех людей и даже объявила, куда пойдут доходы — 50% Государству, 20% в Пенсионный фонд, 10% будет отдавать голодающим, 10% на научные исследования, и конечно же 10% будет оставлять себе. Ну что же? Удачи ей в этом деле).\r\n<p>\r\n2. Один клерк из Нью-Йорка очень хотел навестить своих родителей в Далласе, но он посчитал, что покупать билет на самолет слишком дорого. Тогда он решил отправить им себя авиапочтой! Сидя в большой коробке он успешно долетел из Нью-Йорка в Даллас в грузовом отсеке самолета. Груз успешно приняли и подвезли к дому родителей, после чего водитель увидел в щели глаза и подумал, что в ящике труп. Когда Маккинли вылез из ящика, то мать чуть ли не упала в обморок, а водитель незамедлительно вызвал полицию.\r\n<p>\r\n3. В 1989 году Советский экстрасенс Э. Френкель решил всем доказать, что силой мысли сможет остановить движущийся на него поезд, при этом не получив никаких повреждений. Он подождал, пока ближе подъедет грузовой поезд, затем встал на рельсы, напрягся, отбросил портфель и... в общем глупая и нелепая смерть.\r\n<p>\r\n4. Иракский террорист Кай Рахайет отправил бомбу посылкой, но глупость заключается в том, что он не наклеел нужные марки и посылка вернулась ему же. Когда посылка пришла к нему обратно, он без задней мысли распаковал ее и подорвался на своей же бомбе.\r\n\r\n<p>\r\n5. В США в больницу с обширной травмой головы прибыл подросток. Оказалось, что по голове его «ударил» движущийся поезд. Подросток просто решил проверить насколько близко к движущемуся поезду может быть его голова, прежде чем он ее уберет. Ну немного не успел, зато хоть жив остался.', 0, '2020-06-17 19:00:00', 1),
(17, 'Интересные факты', 'Дельфины  специально едят токсичную рыбу фугу, чтобы \"словить кайф\". Дельфины иногда похожи на людей больше, чем мы можем себе представить. Создатели документального фильма заметили странное: дельфины-тинейджеры аккуратно жевали рыбу фугу и передавали друг другу. ', '<p>Дельфины иногда похожи на людей больше, чем мы можем себе представить. Создатели документального фильма заметили странное: дельфины-тинейджеры аккуратно жевали рыбу фугу и передавали друг другу. Фугу известна тем, что в ее теле содержится смертельная доза нейротоксина, однако в малых дозах это вещество вызывает наркотический эффект, и, похоже, дельфинам это прекрасно известно.\r\n<p>\r\n<h3>Скорость интернета в NASA - 91 Гб в секунду</h3>\r\n\r\n<p>А это означает, что с такой скоростью вы могли бы скачать все сезоны всех любимых сериальчиков за 1 секунду. В самом высоком разрешении. Но, как и у всех интересных фактов, тут есть нюансы: такую скорость развивает внутренняя сеть, которая обслуживает научные институты США. Так как в NASA перемещаются огромные объемы данных, там и была зафиксирована такая рекордная скорость.\r\n<h3>В 1999 году Япония поменяла флаг</h3>\r\n<p>Япония - необычная страна во всех смыслах. Взять хотя бы такое понятие как \"национальная символика\" - оно было малопонятно японскому населению. Хиномару (яп. \"солнечный круг\") появился как знак отличия морских судов Японии, использовать его также приходилось для общения с другими государствами. Только в 1999 году решили поставить точку в этом вопросе, выпустили закон и немного изменили дизайн самого флага.', 0, '2020-06-26 19:00:00', 7),
(18, 'iPhone', 'Cерия смартфонов, разработанных корпорацией Apple. Работают под управлением операционной системы iOS, представляющей собой упрощённую и оптимизированную для функционирования на мобильном устройстве версию macOS. ', '<p>\r\nВпервые iPhone был анонсирован Стивом Джобсом на конференции Macworld Expo 9 января 2007 года. Название iPhone образовано от англ. phone (телефон) добавлением буквы i; на презентации Джобс заявил, что это сокращение слова Internet (Интернет), а также сказал, что «эта буква означает для нас и другие вещи» и показал слайд со словами individual, instruct, inform, inspire («личный; обучать; сообщать; вдохновлять»)[8].\r\n<p>\r\nВ продажу аппарат поступил 29 июня 2007 года вместе с iPhone OS и быстро завоевал существенную часть рынка смартфонов в США. Популярность iPhone OS поддержал вышедший в продажу в сентябре того же года iPod touch, обладавший, однако, заметно урезанной функциональностью по сравнению с iPhone.\r\n<p>\r\n10 июня 2008 года на конференции WWDC 2008 была представлена новая модель — iPhone 3G, более совершенная и лишённая многих аппаратных и программных недостатков предшественника, с новой версией iPhone OS 2.0, по более низкой цене с контрактом оператора в США. Также iPhone 3G стал первым iPhone, получившим русскую локализацию[9], и первым, официально продававшимся в России[10][11].\r\n<p>\r\nВ 2008 году iPhone занял второе место в рейтинге наиболее полезных современных технологий по версии издания PC World[12]. ', 0, '2020-06-27 19:00:00', 7),
(19, 'Странные животные', 'ЩЕЛЕЗУБ - млекопитающее из отряда насекомоядных, разделяющийся на два основных вида: кубинский щелезуб и гаитянский. Сравнительно крупный, относительно других типов насекомоядных, зверь: его длина составляет 32 сантиметра, а хвоста, в среднем, 25 см, масса животного – около 1 килограмма, телосложение плотное.\r\n\r\n', '<p>ГРИВИСТЫЙ ВОЛК. Обитает в Южной Америке. Длинные ноги волка – результат эволюции в вопросах приспособления к месту обитания, они помогают животному преодолевать препятствия в виде высокой травы, растущей на равнинах.\r\n<p>\r\n АФРИКАНСКАЯ ЦИВЕТА - единственный представитель одноименного рода. Обитают эти звери в Африке на открытых пространствах с высоким травостоем от Сенегала до Сомали, юга Намибии и в восточных районах Южной Африки. Размеры зверя визуально достаточно сильно могут увеличиваться, когда при возбуждении цивета поднимает шерсть. А мех у нее густой и длинный, особенно на спине ближе к хвосту. Лапы, морда и окончание хвоста абсолютно черные, большая часть тела пятнистополосатая.\r\n<p>\r\n ПРОЕХИДНА. Это чудо природы обычно весит до 10 кг, хотя отмечались и более крупногабаритные особи. Кстати, в длину тело проехидны достигает 77 см, и это не считая их милого пяти-семи сантиметрового хвостика. Любое описание этого животного строится на сравнении с ехидной: лапки проехидны выше, когти мощнее. Еще одна особенность внешнего вида проехидны – это шпоры на задних лапах самцов и пятипалость задних конечностей и трехпалость передних.\r\n<p>\r\nКАПИБАРА. Полуводное млекопитающее, самый крупный из современных грызунов. Является единственным представителем семейства водосвинковых (Hydrochoeridae). Имеется карликовая разновидность Hydrochoerus isthmius, иногда она рассматривается в качестве отдельно вида (малая водосвинка).\r\n\r\n', 0, '2020-06-27 19:00:00', 3);

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
(7, 'anton', 'mutkin', 'fff@', '1', '569906', 1, '0000-00-00 00:00:00'),
(8, 'Валентин', 'Писунов', 'login@ru', '12', '999756', 0, '0000-00-00 00:00:00'),
(9, 'Зинаида', 'Мокроусова', '2222@mail.ru', '123', '+79236541718', 0, '0000-00-00 00:00:00'),
(10, 'Ирина', 'Хвостикова', 'petr@ru', '123', '89028882213', 0, '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
