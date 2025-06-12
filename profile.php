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
	<!-- Основная информация -->
		<div class="profile-bonus ">	
			<div class="bonus wow fadeIn">
				<h1>Мои бонусы</h1>
				<div class="bonus-wrap">
					<div class="bonus-card">
						<div class="bonus-card-img"><img src="assets/image/sale.png" alt=""></div>
						<p>Бонусы появятся здесь после заказа</p>
					</div>
					<div class="bonus-card">
						<div class="bonus-card-img"><img src="assets/image/sale.png" alt=""></div>
						<p>Бонусы появятся здесь после заказа</p>
					</div>
					<div class="bonus-card">
						<div class="bonus-card-img"><img src="assets/image/sale.png" alt=""></div>
						<p>Бонусы появятся здесь после заказа</p>
					</div>
					<div class="bonus-card">
						<div class="bonus-card-img"><img src="assets/image/sale.png" alt=""></div>
						<p>Бонусы появятся здесь после заказа</p>
					</div>
				</div>
				<a href="promotion.php"><h2>Все наши акции</h2></a>
			</div>
		</div>
		<div class="profile wow fadeIn">
			<h1>Личные данные</h1>
			<div class="personal-data">
				<div class="label-profile">
					<p>Имя</p>
					<input type="text" name="" placeholder="Дмитрий" readonly id="input-name-profile" class="personal-data-input">
					<button onclick="button1Click()" class="btn-profile-change">Изменить</button>
				</div>
				<div class="label-profile">
					<p>Номер телефона</p>
					<input type="tel" name="" placeholder="+7 999 999-99-99" readonly id="input-name-profile" class="personal-data-input">
					<button onclick="button1Click()" class="btn-profile-change">Изменить</button>
				</div>
				<div class="label-profile">
					<p>Дата рождения</p>
					<input type="text" name="" placeholder="12 августа" readonly id="input-name-profile" class="personal-data-input">
					<button onclick="button1Click()" class="btn-profile-change">Изменить</button>
				</div>
				<div class="label-profile">
					<p>Пароль</p>
					<input type="password" name="" placeholder="******" readonly id="input-name-profile" class="personal-data-input">
					<button onclick="button1Click()" class="btn-profile-change">Изменить</button>
				</div>
				<div class="podpiska">
					<h1>Подписки</h1>
					<div class="checkboxes__item">
						<label class="checkbox style-c">
						  <input type="checkbox" checked="checked"/>
						  <div class="checkbox__checkmark"></div>
						  <div class="checkbox__body"><p> Сообщать о бонусах, акциях и новых продуктах</p></div>
						</label>
					 </div>
					 <button class="profile-exit-btn">Выйти</button>
				</div>
			</div>
		</div>
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