// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    // Скрываем кнопку "Очистить корзину" изначально, если корзина пуста
    const cart = Cart.getCart();
    const clearCartButton = document.querySelector('button[onclick="Cart.clearCart()"]');
    if (Object.keys(cart).length === 0 && clearCartButton) {
        clearCartButton.style.display = 'none';
    }
    
    // Отображаем корзину
    Cart.displayCart();
    
    // Обработчик для кнопки "Оформить заказ"
    const orderButton = document.querySelector('.btn-next-oformlenie');
    if (orderButton) {
        orderButton.addEventListener('click', handleOrderSubmit);
    }
    
    // Проверяем начальное состояние способа оплаты
    const initialPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
    if (initialPaymentMethod) {
        handlePaymentMethod(initialPaymentMethod);
    }
    
    // Добавляем обработчики для способов оплаты
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            handlePaymentMethod(this);
        });
    });
});

// Обработка отправки заказа
function handleOrderSubmit(e) {
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
    
    // Проверяем данные перед отправкой
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
            payment_method: paymentMethod,
            cart: cart
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            
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
        console.error('Ошибка:', error);
        alert('Произошла ошибка при отправке заказа. Пожалуйста, попробуйте позже.');
    });
}

// Обработка выбора способа оплаты
function handlePaymentMethod(radio) {
    const sdachaBlock = document.querySelector('.payment-wethod .sdacha');
    if (sdachaBlock) {
        sdachaBlock.style.display = 'flex'; // Используем flex как в CSS
    }
} 