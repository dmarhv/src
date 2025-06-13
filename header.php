<!-- Шапка сайта (header) -->
<header>
	<div class="header">
		<div class="head">
			<div class="logotype">
				<img src="assets/image/logotype.png" alt="">
			</div>
			<div class="restoran">
				<H2>Ресторан<b class="rzn-menu-txt">dmarhv</b></H2>
				<img src="assets/image/yandex-eda.png" alt=""><b class="restoran-txt"> Яндекс Еда</b> <img src="assets/image/Ellipse.png" alt="">
				<b class="restoran-txt">4.7</b> <img src="assets/image/star.png" alt=""><b class="restoran-txt">    Время доставки</b> <img src="assets/image/Ellipse.png" alt=""><b class="restoran-txt"> от 30 мин</b>
			</div>
			<div class="zvonok">
				<a href="#" ><button class="zakaz-zvonok" id="open-zvonok">Заказать звонок</button></a> <b class="phone-menu">8 499 391-84-49</b>
			</div>
		</div>
		<div class="menu">
			<div class="main-nav">	
				<a href="index.php" class="menu-link">Главная</a>
				<a href="menu.php" class="menu-link">Меню</a>
				<a href="contacts.php" class="menu-link">Контакты</a>
				<a href="delivery.php" class="menu-link">Доставка</a>
				<a href="promotion.php" class="sale-link">Акции</a>
			</div>
			<div class="profile-menu">
				<a href="order.php" class="profile-link">
					<i>Заказ</i>
					<span id="cart-indicator" style="background: #ff4444; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; margin-left: 5px; display: none;">0</span>
				</a>
				
			</div>
		</div>
	</div>
</header>
<!-- Заказ звонка (модальное окно) -->
<div class="zvonok-modal" id="zvonok-form">
	<div class="modal-box">
		<button class="modal-close" id="close-modal-btn"><img src="assets/image/close.svg" alt=""></button>
		<h2> Заказ звонка</h2>
		<div class="zvonok-modal-form">
			<div class="user-box">
				<input type="" name="" id="" class="zvonok-input-txt">
				<label class="label-form">Телефон</label>
			</div>
			<p> Оставьте свой Телефон и с вами обязательно свяжутся.</p>
		</div>
		<button class="btn-to-profile"> Заказать</button>
	</div>
</div>
<!-- Окно регистрации (модальное окно) -->
<div class="reg-modal" id="reg-form">
	<div class="modal-box">
		<button class="modal-close" id="close-modal-btn-2"><img src="assets/image/close.svg" alt=""></button>
		<h2> Регистрация</h2>
		<form action="" class="form-reg">
			<div class="user-box">
				<input type="" name="" id="" class="input-txt">
				<label class="label-form"> Логин</label>
			</div>
			<div class="user-box">
				<input type="" name="" id="" class="input-txt">
				<label class="label-form"> Телефон</label>
			</div>
			<div class="user-box">
				<input type="" name="" id="" class="input-txt">
				<label class="label-form"> Почта</label>
			</div>
			<div class="user-box">
				<input type="" name="" id="" class="input-txt">
				<label class="label-form"> Пароль</label>
			</div>
			<div class="user-box">
				<input type="" name="" id="" class="input-txt">
				<label class="label-form"> Повтор пароля</label>
			</div>
			<button class="btn-to-profile"> Регистрация</button>
		</form>
	</div>
</div>
<!-- Окно авторизации (модальное окно) -->
<div class="auth-modal" id="auth-form">
	<div class="modal-box">
		<button class="modal-close" id="close-modal-btn-1"><img src="assets/image/close.svg" alt=""></button>
		<h2> Авторизация</h2>
		<form action="" class="form-auth">
			<div class="user-box">
				<input type="" name="" id="" class="input-txt">
				<label class="label-form"> Логин</label>
			</div>
			<div class="user-box">
				<input type="" name="" id="" class="input-txt">
				<label class="label-form"> Пароль</label>
			</div>
			<button class="btn-to-profile"> Вход</button>
		</form>
	</div>
</div>
<!-- Подключение скриптов (profile.js и wow.min.js) и инициализация WOW -->
<script src="assets/js/profile.js"></script>
<script src="assets/js/wow.min.js"></script>
<script>
	new WOW().init();
	
	// Функция для обновления индикатора корзины
	function updateCartIndicator() {
		const cartIndicator = document.getElementById('cart-indicator');
		if (cartIndicator) {
			const cart = localStorage.getItem('restaurantCart');
			const cartData = cart ? JSON.parse(cart) : {};
			const totalItems = Object.values(cartData).reduce((total, item) => total + item.quantity, 0);
			
			if (totalItems > 0) {
				cartIndicator.textContent = totalItems;
				cartIndicator.style.display = 'inline';
			} else {
				cartIndicator.style.display = 'none';
			}
		}
	}
	
	// Обновляем индикатор при загрузке страницы
	document.addEventListener('DOMContentLoaded', function() {
		updateCartIndicator();
	});
	
	// Обновляем индикатор при изменении localStorage
	window.addEventListener('storage', function(e) {
		if (e.key === 'restaurantCart') {
			updateCartIndicator();
		}
	});
	
	// Обновляем индикатор каждые 2 секунды (для синхронизации между вкладками)
	setInterval(updateCartIndicator, 2000);
</script> 