<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="icon" href="assets/image/logotype.png" type="image/x-icon">
	<title>Restaurant</title>
</head>
<body>
	<!-- Шапка -->
<?php require_once 'header.php'; ?>

	<!-- Новинки -->
	<div class="new">
		<div class="cards wow zoomIn">
			<img class="cards-img wow fadeInLeftBig" src="assets/image/cards-1.png" alt="">
			<img class="cards-img wow fadeInRightBig" src="assets/image/cards-2.png" alt="">
		</div>
		<h1 class="novinki-h1">Новинки</h1>
		<div class="novinki">
			<div class="novinki-cards">
				<div class="novinki-cards-img"><img src="assets/image/food/food-1.png" alt=""></div>
				<div class="card-txt">
					<h1>Карбонара</h1>
					<h2>от 180 ₽</h2>
				</div>
			</div>
			<div class="novinki-cards">
				<div class="novinki-cards-img"><img src="assets/image/food/food-2.png" alt=""></div>
				<div class="card-txt">
					<h1>Стейк</h1>
					<h2>от 280 ₽</h2>
				</div>
			</div>
			<div class="novinki-cards">
				<div class="novinki-cards-img"><img src="assets/image/food/food-3.png" alt=""></div>
				<div class="card-txt">
					<h1>Салат</h1>
					<h2>от 150 ₽</h2>
				</div>
			</div>
			<div class="novinki-cards">
				<div class="novinki-cards-img"><img src="assets/image/food/food-4.png" alt=""></div>
				<div class="card-txt">
					<h1>Паста</h1>
					<h2>от 220 ₽</h2>
				</div>
			</div>
		</div>
	</div>
	<img class="man-with-pizza wow fadeInUp" src="assets/image/man.png" alt="">

	<!-- Основная информация -->
	<div class="main-inform">
		<div class="assortiment wow fadeInUpBig">
			<div class="assortiment-txt">
				<h1>Широкий ассортимент</h1>
				<h2>Самая дешевая еда в нашем ресторане стоит 150 рублей: при максимальном качестве 
					изготовления блюд и высшей свежести продуктов цены в нашем заведении остаются демократичными.</h2>
					<br>
					<h1>Новинки</h1>
					<h2>Каждый заказ готовится индивидуально, никаких заготовок мы не делаем, поэтому мы считаем 
						что у нас лучшая еда в городе.
						<br>
						<br>
						Наш ресторан предоставляет услугу «доставка бесплатно» - курьер доставит заказ за считанные 
						минуты – блюдо прибудет горячим и ароматным. Все что нужно для этого сделать — сделать любой заказ.</h2>
			</div>
			<div class="assortiment-img">
				<img src="assets/image/photo-1.png" alt="">
			</div>
		</div>
		<div class="choice wow fadeInUp">
			<div class="choice-img">
				<img src="assets/image/photo-2.png" alt="">
			</div>
			<div class="choice-txt">
				<h1>Огромный выбор</h1>
				<h2>Для каждого блюда на сайте есть фото и описание. Мы предлагаем Вам удалить или добавить 
					ингредиенты. Также Вы можете заказать с доставку и включить в заказ напитки или десерт. 
					Кроме того, на сайте есть удобная опция отслеживания приготовления и доставки заказа, с 
					которой Вы будете точно знать, в какой момент поставить фильм на паузу или сделать перерыв в работе.</h2>
			</div>
		</div>
	</div>
	<img class="women-with-pizza wow fadeInUp" src="assets/image/women.png" alt="">
<!-- Акции -->
	<h1 class="action-h1 ">Наши <b> акции</b></h1>
	<div class="action wow fadeInUp">
		<div class="action-1">
			<img class="action-img" src="assets/image/action-1.png" alt="">
			<img class="action-img" src="assets/image/action-2.jpeg" alt="">

		</div>
		<div class="action-2">
			<img class="action-img" src="assets/image/action-3.jpeg" alt="">
			<img class="action-img" src="assets/image/action-4.jpeg" alt="">
		</div>
	</div>
	<a href="#"><button class="btn-action">Все акции</button></a>
<!-- Оплата и доставка -->
	<div class="oplata-delivery-main">
		<h1>Оплата и доставка</h1>
		<div class="oplata-delivery wow zoomIn">
			<div class="component">
				<img src="assets/image/component-1.png" alt="">			
				<img src="assets/image/component-2.png" alt="">
				<img src="assets/image/component-3.png" alt="">
				<img src="assets/image/component-4.png" alt="">
			</div>
			<div class="maps">
				<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A28ee983843297ca2f4f22fe181065608ed9bc0f7e2a15f2e4d2d4cbd3760e179&amp;source=constructor" width="1100" height="450" class="map-container" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>

	<!-- Подвал -->
	<?php require_once 'footer.php'; ?>

	<!-- Скрипты -->
	<script src="assets/js/cart.js"></script>
	<script src="assets/js/modals.js"></script>
	<script src="assets/js/init.js"></script>
	<script src="assets/js/wow.min.js"></script>
</body>
</html>