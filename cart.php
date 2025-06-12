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
<?php require_once 'header.php'; ?>
	<img class="women-with-pizza-order wow fadeIn" src="assets/image/women-2.png" alt="">
	<img class="man-with-pizza-order wow fadeIn" src="assets/image/man.png" alt="">
	<!-- Основная информация -->
	<div class="cart-main ">
		<div class="korzina wow fadeIn">
			<h1>Корзина</h1>
			<div class="korzina-order">
				<div class="korzina-position">
					<div class="korzina-position-img"><img src="assets/image/food/food-1.png" alt=""></div>
					<div class="korzina-position-text">
						<h2>Паста Карбонара</h2>
						<h3>Паста с беконом, сырами чеддер и пармезан, томатами, моцареллой, фирменным соусом альфредо и чесноком</h3>
					</div>
					<div class="korzina-position-count">
						<div class="counter" data-counter>
							<div class="counter__button counter__button_minus">-</div>
							<div class="counter__input"><input type="text" disabled placeholder="1"></div>
							<div class="counter__button counter__button_plus">+</div>
						</div>
					</div>
					<div class="korzina-position-close">
						<img src="assets/image/close.svg" alt="">
					</div>
				</div>
				<div class="korzina-position">
					<div class="korzina-position-img"><img src="assets/image/food/food-3.png" alt=""></div>
					<div class="korzina-position-text">
						<h2>Салат</h2>
						<h3>Цыпленок, свежие листья салата айсберг, томаты черри, сыры чеддер и пармезан, соус цезарь, пшеничные гренки, итальянские травы</h3>
					</div>
					<div class="korzina-position-count">
						<div class="counter" data-counter>
							<div class="counter__button counter__button_minus">-</div>
							<div class="counter__input"><input type="text" disabled placeholder="1"></div>
							<div class="counter__button counter__button_plus">+</div>
						</div>
					</div>
					<div class="korzina-position-close">
						<img src="assets/image/close.svg" alt="">
					</div>
				</div>
				<div class="korzina-position">
					<div class="korzina-position-img"><img src="assets/image/food/food-4.png" alt=""></div>
					<div class="korzina-position-text">
						<h2>Паста Мясная</h2>
						<h3>Паста с митболами, соусом бургер, моцареллой, фирменным томатным соусом и чесноком</h3>
					</div>
					<div class="korzina-position-count">
						<div class="counter" data-counter>
							<div class="counter__button counter__button_minus">-</div>
							<div class="counter__input"><input type="text" disabled placeholder="1"></div>
							<div class="counter__button counter__button_plus">+</div>
						</div>
					</div>
					<div class="korzina-position-close">
						<img src="assets/image/close.svg" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="promo-cart wow fadeIn">
			<div class="promocode-cart">
				<h1>Промокод</h1>
				<div class="promo-cart-price">
					<div class="label-order">
						<input type="text" name="" placeholder="Введите Промокод"  id="input-name-order" class="promocode-input">
						<button onclick="button1Click()" class="btn-order-submit">Применить</button>
					</div>
					<div class="prize-zakaza">
						<h1>Сумма заказа: 1048 ₽</h1>
					</div>
				</div>
			</div>
			
		</div>
		<div class="oformlenie-wrap wow fadeIn">
			<div class="oformlenie-cart">
				<div class="oformlenie-back">
					<img src="assets/image/back.png" alt=""><p>Назад в корзину</p>
				</div>
				<div class="oformlenie-next">
					<a href="#"><button class="btn-next-oformlenie">Оформить заказ</button></a>
				</div>
			</div>
		</div>
		
	</div>
	
	<!-- Подвал -->
	<?php require_once 'footer.php'; ?>
	<script src="assets/js/counter.js"></script>
	<script src="assets/js/profile.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script>
		new WOW().init();
		</script>
</body>
</html>