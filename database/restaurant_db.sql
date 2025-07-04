-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 03 2025 г., 23:20
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `restaurant`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `client_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `delivery_time` text COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` text COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `client_name`, `email`, `adress`, `delivery_time`, `payment_method`, `order_date`) VALUES
(14, 'Виктор', 'vita@mail.ru', 'г. Санкт-Петербург, ул Машиниостороителей, д.14, кв12', 'Побыстрее', 'card', '2025-06-26 22:26:15'),
(15, 'Генадий', 'genadii@mail.ru', 'г. Санкт-Петербург, ул. Коллонтай, д14, кв12', '16:00 - 17:00', 'cash', '2025-06-26 22:39:52'),
(18, 'Костя', 'Kostya@gmail.com', 'г. Санкт-Петербург, ул Ростовская, д.1, кв1', '13:00 - 14:00', 'cash', '2025-06-26 22:55:57'),
(19, 'Леонид', 'leonid@mail.ru', 'г. Санкт-Петербург, ул Заборная, д.7, кв2', '11:00 - 12:00', 'card', '2025-06-27 00:18:44'),
(20, 'Кирилл', 'qjsde@mail.ru', 'г. Санкт-Петербург, ул Дворовая, д.22, кв15', 'Побыстрее', 'card', '2025-06-27 00:47:44'),
(21, 'Дмитрий', 'dmarhv@gmail.com', 'Ленинградская обл, Всеволожский р-н, г Кудрово, Европейский пр-кт, д 14 к 6 ', 'Побыстрее', 'card', '2025-06-27 00:54:06'),
(22, 'Дмитрий', 'dmarhv@gmail.com', 'г Санкт-Петербург, пр-кт Металлистов, д 3 ', '18:00 - 19:00', 'card', '2025-06-27 01:24:45'),
(23, 'Дмитрий', 'dmarhv@gmail.com', 'Ленинградская обл, Всеволожский р-н, г Кудрово, Европейский пр-кт, д 14 к 6, кв 1', '13:00 - 14:00', 'cash', '2025-07-03 17:50:50');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `dishes_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_code` varchar(6) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `dishes_id`, `quantity`, `order_code`) VALUES
(1, 13, 1, 1, 'CZKHn7'),
(2, 13, 2, 1, '12G39c'),
(3, 13, 3, 1, 'Sq7KX9'),
(4, 14, 2, 1, '3wsDhn'),
(5, 14, 6, 1, '3wsDhn'),
(6, 14, 7, 1, '3wsDhn'),
(7, 15, 14, 3, 'URDLo7'),
(8, 15, 15, 1, 'URDLo7'),
(9, 16, 1, 1, 'RDO0mJ'),
(10, 16, 2, 1, 'RDO0mJ'),
(11, 17, 1, 1, 'cj5UhD'),
(12, 17, 2, 1, 'cj5UhD'),
(13, 17, 3, 1, 'cj5UhD'),
(14, 18, 2, 4, 'PvsxdC'),
(15, 19, 1, 1, '3pwDFa'),
(16, 19, 2, 2, '3pwDFa'),
(17, 20, 3, 2, 'HurNSc'),
(18, 20, 5, 1, 'HurNSc'),
(19, 21, 1, 3, 'FxRsVW'),
(20, 22, 1, 1, 'uVojtg'),
(21, 22, 2, 1, 'uVojtg'),
(22, 22, 3, 1, 'uVojtg'),
(23, 23, 1, 1, '0Cncqy'),
(24, 23, 3, 3, '0Cncqy'),
(25, 23, 5, 1, '0Cncqy');

-- --------------------------------------------------------

--
-- Структура таблицы `restaurant_menu`
--

CREATE TABLE `restaurant_menu` (
  `id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `restaurant_menu`
--

INSERT INTO `restaurant_menu` (`id`, `image`, `name`, `category`, `description`, `price`) VALUES
(1, 'assets/image/food/pizza-1.png', 'Сырная', 'Пицца', 'Моцарелла, сыры чеддер и пармезан, фирменный соус альфредо, 350г.', '259'),
(2, 'assets/image/food/pizza-2.png', 'Микс', 'Пицца', 'Бекон, цыпленок, ветчина, сыры чеддер и пармезан, соус песто, итальянские травы, 350г.', '329'),
(3, 'assets/image/food/pizza-3.png', 'Буженина', 'Пицца', 'Запеченная буженина из свинины, моцарелла, картофель из печи, маринованные огурчики, красный лук, 350г.', '349'),
(5, 'assets/image/food/pizza-4.png', 'Цыпленок', 'Пицца', 'Цыпленок, моцарелла, фирменный соус альфредо, 350г.', '329'),
(6, 'assets/image/food/pizza-5.png', 'Ветчина и грибы', 'Пицца', 'Ветчина, шампиньоны, увеличенная порция моцареллы, фирменный томатный соус, 350г.', '389'),
(7, 'assets/image/food/pizza-6.png', 'Чикен BBQ', 'Пицца', 'Грибы, Курица, Лук, Соус BBQ, Сыр Моцарелла, Томатный соус, 350г.', '429'),
(8, 'assets/image/food/pizza-7.png', 'Карамель-Ананас', 'Пицца', 'Ананас, Соус Карамельный, Соус Сырный, Сыр Моцарелла, 350г.', '429'),
(9, 'assets/image/food/pizza-8.png', '4 сезона', 'Пицца', 'Бекон, Ветчина, Грибы, Курица, Лук, Маслины, Огурцы маринованные, Охотничьи колбаски, Пепперони, Свежие томаты, Соус BBQ, 350г.', '339'),
(10, 'assets/image/food/food-1.png', 'Карбонара', 'Паста', 'Мдомашняя паста, сливочный соус с беконом и белым вином, сыр пармезан, 350г.', '299'),
(11, 'assets/image/food/food-2.png', 'Стейк Лосось', 'Рыба и морепродукты', 'лосось, лимон, томаты черри, соус «гранатовый», руккола, сыр «Пармезан», соус, 350г.', '469'),
(12, 'assets/image/food/food-3.png', 'Стейк Говяжий', 'Мясные блюда', 'Говядина вырезка , специи, соус сливочно-кунжутный, капуста брокколи, руккола, специи, 350г.', '549'),
(13, 'assets/image/food/food-4.png', 'Фетучини', 'Паста', 'домашняя паста, сливочный соус с лососем и белым вином, сыр пармезан, 350г.', '329'),
(14, 'assets/image/food/salad-1.png', 'Летний', 'Салат', 'Капуста белокочанная свежая, морковь свежая, масло подсолнечное, сахар , петрушка свежая, перец сладкий свежий, 350г.', '229'),
(15, 'assets/image/food/salad-2.png', 'С креветками', 'Салат', 'Креветки, лук репчатый свежий, майонез, грибы шампиньоны свежие, огурцы консервированные, 350г.', '239'),
(16, 'assets/image/food/salad-3.png', 'Греческий', 'Салат', 'Маслины черные, Масло подсолнечное, Огурцы свежие, Болгарский перец, Помидоры свежие, Салат Айсберг, 249г.', '219'),
(18, 'assets/image/food/salad-4.png', 'Цезарь', 'Салат', 'Курица, Помидоры свежие, Салат Айсберг, Соус Цезарь, 350г.', '259');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
