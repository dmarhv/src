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
	<!-- Акции -->
	<div class="promotion-main">
		<h1 class="promotion-main-h1">Акции</h1>
		<div class="promo-group wow fadeIn">
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-1.png" alt=""></div>
				<div class="promo-text">
					<h1>Самовывоз</h1>
					<h2>При заказе на самовывоз получите скидку 15% на весь заказ.</h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-2.png" alt=""></div>
				<div class="promo-text">
					<h1>Бонусы</h1>
					<h2>Оформите заказ в ресторане на сумму более 450 ₽ и получите бонусный продукт за 1 ₽ к следующему заказу.</h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-3.png" alt=""></div>
				<div class="promo-text">
					<h1>Скидки</h1>
					<h2>С понедельника по четверг с 13.00 до 16.00 скидка 30%</h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
		</div>
		<div class="promo-group wow fadeIn">
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-4.png" alt=""></div>
				<div class="promo-text">
					<h1>Кэшбек</h1>
					<h2>Вместо бумажных чеков теперь электронные. Посмотреть их можно на сайте в истории заказов. А если хотите получать чеки на электронную почту, укажите адрес в профиле</h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-5.png" alt=""></div>
				<div class="promo-text">
					<h1>Благотворительность</h1>
					<h2>Покупая горячий напиток, вы становитесь участником благотворительной акции</h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-6.png" alt=""></div>
				<div class="promo-text">
					<h1>Скидки</h1>
					<h2>Делайте онлайн заказы и получайте 5 % кэшбека обратно на карту. </h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
		</div>
		<div class="promo-group wow fadeIn">
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-7.png" alt=""></div>
				<div class="promo-text">
					<h1>Кэшбек</h1>
					<h2>Делайте онлайн заказы и получайте 5 % кэшбека обратно на карту. </h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-3.png" alt=""></div>
				<div class="promo-text">
					<h1>Заказывай чаще</h1>
					<h2>Множество скидок постоянным клиентам.</h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
			<div class="promo-card">
				<div class="promo-card-img"><img src="assets/image/promo-8.png" alt=""></div>
				<div class="promo-text">
					<h1>Праздник</h1>
					<h2>В честь дня рождения скидка - 20%.</h2>
				</div>
				<button class="promo-btn">Посмтореть</button>
			</div>
		</div>
	</div>
	<img class="man-with-pizza wow fadeIn" src="assets/image/man.png" alt="">
	<img class="women-with-pizza-promo wow fadeIn" src="assets/image/women-2.png" alt="">
	<!-- Подвал -->
	<?php require_once 'footer.php'; ?>
	<script src="assets/js/profile.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script>
		new WOW().init();
		</script>
</body>
</html>