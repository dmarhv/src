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
		<h1 class="delivery-order-h1 wow zoomIn">Оформление доставки</h1>
		<div class="delivery-order wow zoomIn">
			<div class="order-info">
				<div class="label-order">
					<p>Имя</p>
					<input type="text" name="" placeholder="Введите имя" id="input-name-order" class="order-input">
				</div>
				<div class="label-order">
					<p>E-mail</p>
					<input type="tel" name="" placeholder="Введите почту" id="input-email-order" class="order-input">
				</div>
				<div class="label-order">
					<p>Адрес доставки</p>
					<input type="text" name="" placeholder="Введите адрес" id="input-name-order" class="order-input">
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
				<div class="sostav-content" style="flex: 1; display: flex; flex-direction: column;">
					<h1>Состав заказа</h1>
					<div id="cart-items" style="flex: 1;">
					</div>
				</div>
				<div class="sostav-footer" style="margin-top: auto; padding-bottom: 10px;">
					<div style="display: flex; justify-content: center; gap: 10px;">
						<button onclick="Cart.clearCart()" style="background: #ff4444; color: white; border: none; padding: 8px 16px; margin-top: 20px; border-radius: 4px; cursor: pointer; font-size: 14px;">Очистить корзину</button>
					</div>
					<div class="zakaz-price">
						<h2>Сумма заказа</h2>
						<p id="total-price">0 ₽</p>
					</div>
					<h3>Бесплатная доставка</h3>
				</div>
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
	<script src="assets/js/profile.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script>
		new WOW().init();
		
		// Добавляем стили для flexbox layout
		document.addEventListener('DOMContentLoaded', function() {
			const sostavBlock = document.querySelector('.sostav');
			if (sostavBlock) {
				sostavBlock.style.display = 'flex';
				sostavBlock.style.flexDirection = 'column';
				sostavBlock.style.minHeight = '400px'; // Минимальная высота для блока
				sostavBlock.style.justifyContent = 'space-between'; // Распределяем пространство между элементами
			}
		});
		
		// Функция для работы с корзиной
		const Cart = {
			// Получить корзину из localStorage
			getCart() {
				const cart = localStorage.getItem('restaurantCart');
				return cart ? JSON.parse(cart) : {};
			},
			
			// Сохранить корзину в localStorage
			saveCart(cart) {
				localStorage.setItem('restaurantCart', JSON.stringify(cart));
			},
			
			// Удалить товар из корзины
			removeItem(itemId) {
				const cart = this.getCart();
				delete cart[itemId];
				this.saveCart(cart);
				this.displayCart();
			},
			
			// Обновить количество товара
			updateQuantity(itemId, quantity) {
				const cart = this.getCart();
				if (cart[itemId]) {
					if (quantity <= 0) {
						this.removeItem(itemId);
					} else {
						cart[itemId].quantity = quantity;
						this.saveCart(cart);
						this.displayCart();
					}
				}
			},
			
			// Отобразить корзину на странице
			displayCart() {
				const cart = this.getCart();
				const cartContainer = document.getElementById('cart-items');
				const totalPriceElement = document.getElementById('total-price');
				const clearCartButton = document.querySelector('button[onclick="Cart.clearCart()"]');
				
				if (Object.keys(cart).length === 0) {
					cartContainer.innerHTML = '<p style="text-align: center; color: #666; padding: 20px;">Корзина пуста</p>';
					totalPriceElement.textContent = '0 ₽';
					// Скрываем кнопку "Очистить корзину"
					if (clearCartButton) {
						clearCartButton.style.display = 'none';
					}
					// Обновляем индикатор корзины в header
					const cartIndicator = document.getElementById('cart-indicator');
					if (cartIndicator) {
						cartIndicator.style.display = 'none';
					}
					return;
				}
				
				let cartHTML = '';
				let totalPrice = 0;
				const cartItems = Object.values(cart);
				const totalItems = cartItems.length;
				
				const displayItems = totalItems > 5 ? cartItems.slice(0, 5) : cartItems;
				
				displayItems.forEach(item => {
					const itemTotal = item.price * item.quantity;
					totalPrice += itemTotal;
					
					cartHTML += `
						<div class="sostav-position" data-item-id="${item.id}" style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
							<div style="display: flex; align-items: center; gap: 10px; flex: 1;">
								<p style="margin: 0; width: 130px;">${item.name}</p>
								<div style="display: flex; align-items: center; gap: 5px;">
									<button onclick="Cart.updateQuantity('${item.id}', ${item.quantity - 1})" style="background: none; border: none; cursor: pointer; font-size: 18px; color: #666;">-</button>
									<span style="min-width: 20px; text-align: center;">${item.quantity}</span>
									<button onclick="Cart.updateQuantity('${item.id}', ${item.quantity + 1})" style="background: none; border: none; cursor: pointer; font-size: 18px; color: #666;">+</button>
								</div>
							</div>
							<div style="display: flex; align-items: center; gap: 20px;">
								<p style="margin: 0; min-width: 80px; text-align: right;">${itemTotal} ₽</p>
								<img src="assets/image/close.svg" alt="" onclick="Cart.removeItem('${item.id}')" style="cursor: pointer; width: 16px; height: 16px;">
							</div>
						</div>
					`;
				});

				// Добавляем многоточие, если есть скрытые позиции
				if (totalItems > 5) {
					const hiddenItems = cartItems.slice(5);
					const hiddenItemsTotal = hiddenItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
					cartHTML += `
						<div class="sostav-position" style="justify-content: center; color: #666; font-style: italic;">
							<p>... и еще ${totalItems - 5} позиций на сумму ${hiddenItemsTotal} ₽</p>
						</div>
					`;
					totalPrice += hiddenItemsTotal;
				}
				
				cartContainer.innerHTML = cartHTML;
				totalPriceElement.textContent = `${totalPrice} ₽`;
				
				// Показываем кнопку "Очистить корзину"
				if (clearCartButton) {
					clearCartButton.style.display = 'inline-block';
				}
				
				// Обновляем индикатор корзины в header
				const cartIndicator = document.getElementById('cart-indicator');
				if (cartIndicator) {
					const totalItems = Object.values(cart).reduce((total, item) => total + item.quantity, 0);
					cartIndicator.textContent = totalItems;
					cartIndicator.style.display = 'inline';
				}
			},
			
			// Очистить корзину
			clearCart() {
				localStorage.removeItem('restaurantCart');
				this.displayCart();
			}
		};
		
		// Отобразить корзину при загрузке страницы
		document.addEventListener('DOMContentLoaded', function() {
			// Скрываем кнопку "Очистить корзину" изначально, если корзина пуста
			const cart = Cart.getCart();
			const clearCartButton = document.querySelector('button[onclick="Cart.clearCart()"]');
			if (Object.keys(cart).length === 0 && clearCartButton) {
				clearCartButton.style.display = 'none';
			}
			
			Cart.displayCart();
			
			// Обработчик для кнопки "Оформить заказ"
			const orderButton = document.querySelector('.btn-next-oformlenie');
			if (orderButton) {
				orderButton.addEventListener('click', function(e) {
					e.preventDefault();
					
					// Проверяем, есть ли товары в корзине
					const cart = Cart.getCart();
					if (Object.keys(cart).length === 0) {
						alert('Корзина пуста! Добавьте товары в корзину.');
						return;
					}
					
					// Получаем данные формы
					const name = document.getElementById('input-name-order').value;
					const email = document.getElementById('input-email-order').value;
					const address = document.querySelector('input[placeholder="Введите адрес"]').value;
					const deliveryTime = document.querySelector('input[placeholder="Побыстрее"]').value;
					const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
					
					if (!name || !email || !address || !deliveryTime) {
						alert('Пожалуйста, заполните все обязательные поля!');
						return;
					}
					
					// Отправляем данные на сервер
					fetch('process_order.php', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json',
						},
						body: JSON.stringify({
							name: name,
							email: email,
							address: address,
							delivery_time: deliveryTime,
							payment_method: paymentMethod
						})
					})
					.then(response => response.json())
					.then(data => {
						if (data.success) {
							alert('Заказ успешно оформлен! Спасибо за заказ. Пожалуйста, подтвердите заказ на почте.');
							
							// Очищаем корзину
							Cart.clearCart();
							
							// Очищаем форму
							document.getElementById('input-name-order').value = '';
							document.getElementById('input-email-order').value = '';
							document.querySelector('input[placeholder="Введите адрес"]').value = '';
							document.querySelector('input[placeholder="Побыстрее"]').value = 'Побыстрее';
						} else {
							alert('Ошибка при сохранении заказа: ' + data.message);
						}
					})
					.catch(error => {
						console.error('Error:', error);
						alert('Произошла ошибка при отправке заказа. Пожалуйста, попробуйте позже.');
					});
				});
			}
			
			// Проверяем начальное состояние способа оплаты
			const initialPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
			if (initialPaymentMethod) {
				handlePaymentMethod(initialPaymentMethod);
			}
		});

		// Функция для обработки выбора способа оплаты
		function handlePaymentMethod(radio) {
			const sdachaBlock = document.getElementById('sdacha-block');
			if (radio.value === 'cash') {
				sdachaBlock.style.display = 'block';
			} else {
				sdachaBlock.style.display = 'none';
			}
		}

		// Код для модального окна времени доставки
		document.addEventListener('DOMContentLoaded', function() {
			const timeModal = document.getElementById('time-form');
			const openTimeBtn = document.getElementById('open-time');
			const closeTimeBtn = document.getElementById('close-modal-btn-3');
			const timeInput = document.querySelector('input[placeholder="Побыстрее"]');
			const timeOptions = document.querySelectorAll('.delivery-time');

			// Открытие модального окна
			openTimeBtn.addEventListener('click', function() {
				timeModal.classList.add('open');
			});

			// Закрытие модального окна
			closeTimeBtn.addEventListener('click', function() {
				timeModal.classList.remove('open');
			});

			// Закрытие по клику вне модального окна
			timeModal.addEventListener('click', function(e) {
				if (e.target === timeModal) {
					timeModal.classList.remove('open');
				}
			});

			// Выбор времени доставки
			timeOptions.forEach(option => {
				option.addEventListener('click', function() {
					const selectedTime = this.querySelector('p').textContent;
					timeInput.value = selectedTime;
					timeModal.classList.remove('open');
				});
			});
		});
		</script>
</body>
</html>