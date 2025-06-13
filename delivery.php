<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/delivery-style.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="icon" href="assets/image/logotype.png" type="image/x-icon">
	<title>Restaurant</title>
</head>
<body>
	<!-- Шапка -->
<?php require_once 'header.php'; ?>

	<!-- Основная информация -->
	<div class='progress wow fadeIn'>
		<div class='progress_inner'>
		 <div class='progress_inner__step'>
		  <label for='step-1'>Оформление</label>
		 </div>
		 <div class='progress_inner__step'>
		  <label for='step-2'>Оплата</label>
		 </div>
		 <div class='progress_inner__step'>
		  <label for='step-3'>Приготовление</label>
		 </div>
		 <div class='progress_inner__step'>
		  <label for='step-4'>Сборка заказа</label>
		 </div>
		 <div class='progress_inner__step'>
		  <label for='step-5'>Доставка</label>
		 </div>
		 <input checked='checked' id='step-1' name='step' type='radio'>
		 <input id='step-2' name='step' type='radio'>
		 <input id='step-3' name='step' type='radio'>
		 <input id='step-4' name='step' type='radio'>
		 <input id='step-5' name='step' type='radio'>
		 <div class='progress_inner__bar'></div>
		 <div class='progress_inner__bar--set'></div>
		 <div class='progress_inner__tabs'>
		  <div class='tab tab-0'>
			<h1>Оформление</h1>
			<p>Выбирайте в онлайн режиме понравившиеся вам блюда и делайте заказ, а мы доставим его как можно быстрее.</p>
		  </div>
		  <div class='tab tab-1'>
			<h1>Оплата</h1>
			<p>Ваш заказ уже поступил нашим менеджерам, вам осталось только оплатить его.</p>
		  </div>
		  <div class='tab tab-2'>
			<h1>Приготовление</h1>
			<p>Наши повара готовят ваш заказ, чтобы доставить его как можно быстрее.</p>
		  </div>
		  <div class='tab tab-3'>
			<h1>Сборка заказа</h1>
			<p>Ваш заказ уже готов и в данный момент собирается, осталось совсем чуть-чуть до отправки.</p>
		  </div>
		  <div class='tab tab-4'>
			<h1>Доставка</h1>
			<p>Курьер доставит заказ за считанные минуты – блюдо прибудет горячим и ароматным.</p>
		  </div>
		 </div>
		 <div class='progress_inner__status'>
		  <div class='box_base'></div>
		  <div class='box_lid'></div>
		  <div class='box_ribbon'></div>
		  <div class='box_bow'>
			<div class='box_bow__left'></div>
			<div class='box_bow__right'></div>
		  </div>
		  <div class='box_item'></div>
		  <div class='box_tag'></div>
		  <div class='box_string'></div>
		 </div>
		</div>
		<img class="women-with-pizza-delivery wow fadeIn" src="assets/image/women-2.png" alt="">
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