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

	<!-- Основная информация -->
	<div class="contacts-main wow fadeIn">
		<div class="maps">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A28ee983843297ca2f4f22fe181065608ed9bc0f7e2a15f2e4d2d4cbd3760e179&amp;source=constructor" width="1300" height="400" class="map-container" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<h1>8 499 391-84-49</h1>
		<h2>пр. Металлистов д. 3</h2>
		<h3>Доставка и самовывоз 10:00 — 22:00</h3>
	</div>
	<img class="man-with-pizza-contacts wow fadeIn" src="assets/image/man.png" alt="">

	<!-- Подвал -->
	<?php require_once 'footer.php'; ?>
	
	<!-- Подключение скриптов -->
	<script src="assets/js/cart.js"></script>
	<script src="assets/js/modals.js"></script>
	<script src="assets/js/init.js"></script>
	<script src="assets/js/wow.min.js"></script>
</body>
</html>