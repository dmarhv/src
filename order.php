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
	<img class="women-with-pizza-order wow fadeIn" src="assets/image/women-2.png" alt="">
	<img class="man-with-pizza-order wow fadeIn" src="assets/image/man.png" alt="">

	<!-- Основная информация -->
		<h1 class="delivery-order-h1 wow zoomIn">Оформление доставки</h1>
		<div class="delivery-order wow zoomIn">
			<div class="order-info">
				<div class="label-order">
					<p>Имя</p>
					<input type="text" name="" placeholder="Введите имя" id="input-name-order" class="order-input">
				</div>
				<div class="label-order">
					<p>E-mail</p>
					<input type="email" name="" placeholder="Введите почту" id="input-email-order" class="order-input" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
				</div>
				<div id="email-error"><i>Email не подходит</i></div>
				<div class="label-order label-order-address">
					<p>Адрес доставки</p>
					<input type="text" name="" placeholder="Введите адрес" id="input-address-order" class="order-input-address">
				</div>
				<div class="label-order">
					<p>Время доставки</p>
					<input type="text" name="" placeholder="Побыстрее" readonly id="input-name-order" class="order-input">
					<button class="btn-order-change" id="open-time">Изменить</button>
				</div>
				<!-- Окно время доставки -->
				<div class="time-modal" id="time-form">
					<div class="modal-box-time">
						<button class="modal-close" id="close-modal-btn-3"><img src="assets/image/close.svg" alt=""></button>
						<h2>Время доставки</h2>
						<div class="delivery-time-main">
							<div class="delivery-time-wrap">
								<div class="delivery-time"><p>Побыстрее</p></div>
								<div class="delivery-time"><p>12:00 - 13:00</p></div>
								<div class="delivery-time"><p>14:00 - 15:00</p></div>
								<div class="delivery-time"><p>16:00 - 17:00</p></div>
								<div class="delivery-time"><p>18:00 - 19:00</p></div>
								<div class="delivery-time"><p>20:00 - 21:00</p></div>
							</div>
							<div class="delivery-time-wrap">
								<div class="delivery-time"><p>11:00 - 12:00</p></div>
								<div class="delivery-time"><p>13:00 - 14:00</p></div>
								<div class="delivery-time"><p>15:00 - 16:00</p></div>
								<div class="delivery-time"><p>17:00 - 18:00</p></div>
								<div class="delivery-time"><p>19:00 - 20:00</p></div>
								<div class="delivery-time"><p>21:00 - 22:00</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="sostav wow zoomIn">
				<div class="sostav-content cart-container">
					<div id="cart-items" class="cart-items">
					</div>
					<div class="sostav-footer cart-footer">
						<div class="cart-actions">
							<button onclick="Cart.clearCart()" class="cart-clear-btn">Очистить корзину</button>
						</div>
					</div>
				</div>
				<div class="zakaz-price">
					<h2>Сумма заказа</h2>
					<p id="total-price">0 ₽</p>
				</div>
				<h3 class="zakaz-price-h3">Бесплатная доставка</h3>
			</div>
		</div>
		<div class="payment-wethod-wrap wow fadeIn">
			<div class="payment-wethod">
				<h1>Способы оплаты</h1>
				<div class="checkboxes__item">
					<label class="checkbox style-c">
						<input type="radio" name="payment_method" value="card" checked="checked"/>
						<div class="checkbox__checkmark"></div>
						<div class="checkbox__body"><p>Картой на сайте</p></div>
					</label>
				</div>
				<div class="checkboxes__item">
					<label class="checkbox style-c">
						<input type="radio" name="payment_method" value="cash"/>
						<div class="checkbox__checkmark"></div>
						<div class="checkbox__body"><p>Наличными курьеру</p></div>
					</label>
				</div>
				<div class="sdacha">
					<h2>С какой суммы подготовить сдачу?</h2>	
					<input type="text" name="" id="" class="sdacha-text">
					<div class="checkboxes__item-2">
						<label class="checkbox style-d">
							<input type="checkbox"/>
							<div class="checkbox__checkmark"></div>
							<div class="checkbox__body"><p>Без сдачи</p></div>
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="oformlenie-wrap wow fadeIn">
				<div class="oformlenie-next">
					<a href="#"><button class="btn-next-oformlenie">Оформить заказ</button></a>
				</div>
		</div>
	<!-- Подвал -->
	<?php require_once 'footer.php'; ?>

	<!-- Подключение скриптов -->
	<script src="assets/js/cart.js"></script>
	<script src="assets/js/order.js"></script>
	<script src="assets/js/modals.js"></script>
	<script src="assets/js/init.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/suggestions-jquery@latest/dist/css/suggestions.min.css">
	<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@latest/dist/js/jquery.suggestions.min.js"></script>
<script>
	
// Проверка email
const emailInput = document.getElementById('input-email-order');
const emailError = document.getElementById('email-error');

emailInput.addEventListener('input', function() {
	if (emailInput.value === '') {
		emailError.style.display = 'none';
	} else if (emailInput.validity.valid) {
		emailError.style.display = 'none';
	} else {
		emailError.style.display = 'block';
	}
});

$(function() {
  $("#input-address-order").suggestions({
    token: "14ff6ff9ae29e1845b2c483378351b8284693992",
    type: "ADDRESS",
    onSelect: function(suggestion) {
      // suggestion.value — выбранный адрес
    }
  });

  // Фиксация позиции и ширины подсказок DaData
  function fixDadataPosition() {
    var $input = $("#input-address-order");
    var $wrapper = $(".suggestions-wrapper");
    if ($input.length && $wrapper.length) {
      var offset = $input.offset();
      var width = $input.outerWidth();
      $wrapper.css({
        "position": "absolute",
        "left": offset.left + "px",
        "top": (offset.top + $input.outerHeight()) + "px",
        "width": width + "px",
        "z-index": 9999,
		  "margin-left": "180px"
      });
    }
  }
  $("#input-address-order").on("focus input", function() {
    setTimeout(fixDadataPosition, 100);
  });
  $(window).on("resize scroll", function() {
    fixDadataPosition();
  });
});
</script>
</body>
</html>