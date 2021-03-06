-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 24 2020 г., 09:05
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cig_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`) VALUES
(1, 'Электронные сигареты', 'layout/img/category-1.jpg'),
(2, 'Трубки', 'layout/img/category-2.jpg'),
(3, 'Жидкости для заправки', 'layout/img/category-3.jpg'),
(4, 'Картриджи', NULL),
(5, 'Аккумуляторы и атомайзеры', 'layout/img/category-4.jpg'),
(6, 'Аксессуары', 'layout/img/category-7.jpg'),
(7, 'Зарядные устройства', 'layout/img/category-6.jpg'),
(8, 'Подарочные наборы', 'layout/img/category-8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `announcement` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `announcement`, `description`) VALUES
(1, '2020-06-26 00:00:00', 'ЗАДЕРЖКИ С ПОСТАВКАМИ', 'Уважаемые покупатели, информируем вас , что в связи с отсутствием комплектующих у производителя ближайшие поставки устройств Электронная сигарета \"Такая-то\" ожидаются не раньше сентября.', 'Уважаемые покупатели, информируем вас , что в связи с отсутствием комплектующих у производителя ближайшие поставки устройств Электронная сигарета \"Такая-то\" ожидаются не раньше сентября.\r\nВ качестве замены можем предложить   в наличии  Трубка \"Другая-то\"'),
(2, '2020-07-24 13:53:45', 'Акция ', 'Акция на товар Сигарета \"такая-то\"', 'При покупке Сигарета \"такая-то\", Беломорканал rebranded в подарок ');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`) VALUES
(1, 'Электронная сигарета «Такая-то»', '<h2>Высокое качество японских ножей</h2>\r\n						<p>\r\n							Сегодня японские ножи соединили в себе древнейшие традиции изготовления самурайских мечей и инновационные\r\n							технологии и, именно поэтому японские ножи обладают уникальными свойствами. Сделаны японские ножи только из\r\n							высококачественных материалов. Клинок японского ножа делают из высокоуглеродистой стали, что обеспечивает его\r\n							высокую прочность и надежность. Следует отметить, что японские ножи эргономичны по своему дизайну, что\r\n							обеспечивает удобство и комфорт в работе. Японские ножи суперострые и после заточки очень долго не тупятся,\r\n							благодаря этому уникальному качеству они получили широкую известность. Японские ножи - это прекрасный выбор,\r\n							который говорит о требовательности покупателя к высокому качеству ножа и о его превосходном вкусе. Кстати, нужно\r\n							отметить, что японские ножи предназначены не только для японской, но и для европейской, а также любой другой\r\n							кухни. В известных ресторанах крупнейших городов во всем мире используют именно японские ножи. Японские ножи\r\n							-это профессиональные инструменты для японской кухни (купить японские ножи Вы можете у нас).\r\n						</p>\r\n						<p>\r\n							Интернет магазин \"Chef\" предлагает купить японские ножи (ножи касуми, масахиро), нож для суши. У нас есть\r\n							японские ножи из дамасской стали (ножи masahiro, касуми). Дамасская сталь - это не просто причудливый узор на\r\n							лезвии ножа, это технология, сочетающая твердую сталь сердцевины клинка для сохранения остроты ножа и множество\r\n							слоев мягкой стали, которая и создает рисунок при заточке, для придания гибкости и прочности острой, но хрупкой\r\n							сердцевине. По этой технологии делались древние острейшие самурайские мечи катаны. Ножи из дамасской стали\r\n							прочны, надежны и долговечны, что подтверждено многолетним опытом. Не зря ножи из дамасской стали бестселлерами\r\n							продаж. Есть также товары, которые являются результатом современных научных технологий: титановые, керамические\r\n							ножи из Японии.\r\n						</p>\r\n						<p>\r\n							Кухонные японские ножи (ножи masahiro, касуми, хаттори) известных торговых марок уже завоевали популярность\r\n							благодаря своей прочности и уникальным качествам - остроте и долговечности заточки. Японские ножи (ножи касуми,\r\n							масахиро, хаттори, кухонные ножи из дамасской стали) - это профессиональные поварские инструменты, секреты\r\n							производства которых передаются и шлифуются мастерами из поколения в поколение. Эти японские ножи обладают\r\n							особым значением - они своего рода статус шеф-повара, в Японии обладание таким ножом считалось показателем\r\n							высокого мастерства в поварском деле.\r\n						</p>', 820, 'layout/img/product-image-1.jpg'),
(2, 'Трубка «Другая-то»', '<h2>ВСЕ О КУРИТЕЛЬНЫХ ТРУБКАХ</h2>\r\n						<p>\r\n							Производство трубок для курения из тыквы – процесс, растягивающийся на года. Форма будущего приспособления создается еще в период роста растения. Далее 							тыква сушится и корректируется инструментами вручную. Калабаш получается большим и габаритным, но за счет природной основы делает курение табака чистым и 							  прохладным.\r\n						</p>\r\n						<p>\r\n							Кукурузные курительные трубки куда более просты. Трубка делается из высушенного початка, где выдалбливается сердцевина. Мундштук выполняется из деревянной 							   палочки отдельно. Сделать кукурузный девайс может каждый, но курить такую трубку не так просто и во многом неприятно.\r\n						</p>\r\n						<p>\r\n							Курение трубки для начинающих – всегда вопрос безопасности. На деле вред (в отличие от сигарет) не доказан официально. По классическому принципу курильщик 							   не затягивается. Однако это не защищает организм от главного – канцерогенов. Сигары или трубки, другая продукция вредна по-разному.\r\n						</p>', 1150, 'layout/img/product-image-2.jpg'),
(3, 'Беломорканал rebranded', '<h2>Переиздание легендарного в России и СНГ бренда </h2>\r\n\r\n<p>\r\n\r\nИзвестная ранее марка сигарет, переделанная под формат электронной сигареты\r\n\r\n\r\n</p>', 1100, 'layout/img/product-image-3');

-- --------------------------------------------------------

--
-- Структура таблицы `productcategories`
--

CREATE TABLE `productcategories` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `productcategories`
--

INSERT INTO `productcategories` (`product_id`, `cat_id`) VALUES
(1, 1),
(2, 2),
(3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`product_id`,`cat_id`),
  ADD KEY `productcategories_ibfk_2` (`cat_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `productcategories`
--
ALTER TABLE `productcategories`
  ADD CONSTRAINT `productcategories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productcategories_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
