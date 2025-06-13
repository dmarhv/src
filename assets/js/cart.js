// Объект для работы с корзиной
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
    
    // Добавить товар в корзину
    addItem(itemId, name, price, quantity = 1) {
        const cart = this.getCart();
        if (cart[itemId]) {
            cart[itemId].quantity += quantity;
        } else {
            cart[itemId] = {
                id: itemId,
                name: name,
                price: price,
                quantity: quantity
            };
        }
        this.saveCart(cart);
        this.updateCartDisplay();
    },
    
    // Удалить товар из корзины
    removeItem(itemId) {
        const cart = this.getCart();
        delete cart[itemId];
        this.saveCart(cart);
        this.updateCartDisplay();
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
            }
        }
        this.updateCartDisplay();
    },
    
    // Получить общее количество товаров в корзине
    getTotalItems() {
        const cart = this.getCart();
        return Object.values(cart).reduce((total, item) => total + item.quantity, 0);
    },
    
    // Очистить корзину
    clearCart() {
        localStorage.removeItem('restaurantCart');
        this.updateCartDisplay();
    },
    
    // Отобразить корзину на странице
    displayCart() {
        const cart = this.getCart();
        const cartContainer = document.getElementById('cart-items');
        const totalPriceElement = document.getElementById('total-price');
        const clearCartButton = document.querySelector('button[onclick="Cart.clearCart()"]');
        
        if (!cartContainer) return; // Если мы не на странице корзины
        
        if (Object.keys(cart).length === 0) {
            cartContainer.innerHTML = '<p class="cart-empty-message">Корзина пуста</p>';
            if (totalPriceElement) totalPriceElement.textContent = '0 ₽';
            if (clearCartButton) clearCartButton.style.display = 'none';
            this.updateCartIndicator();
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
                <div class="sostav-position cart-item" data-item-id="${item.id}">
                    <div class="cart-item-content">
                        <p class="cart-item-name">${item.name}</p>
                        <div class="cart-quantity-controls">
                            <button onclick="Cart.updateQuantity('${item.id}', ${item.quantity - 1})" class="cart-quantity-btn">-</button>
                            <span class="cart-quantity-value">${item.quantity}</span>
                            <button onclick="Cart.updateQuantity('${item.id}', ${item.quantity + 1})" class="cart-quantity-btn">+</button>
                        </div>
                    </div>
                    <div class="cart-item-content">
                        <p class="cart-item-price">${itemTotal} ₽</p>
                        <img src="assets/image/close.svg" alt="" onclick="Cart.removeItem('${item.id}')" class="cart-remove-btn">
                    </div>
                </div>
            `;
        });

        if (totalItems > 5) {
            const hiddenItems = cartItems.slice(5);
            const hiddenItemsTotal = hiddenItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            cartHTML += `
                <div class="sostav-position cart-empty-state">
                    <p>... и еще ${totalItems - 5} позиций на сумму ${hiddenItemsTotal} ₽</p>
                </div>
            `;
            totalPrice += hiddenItemsTotal;
        }
        
        cartContainer.innerHTML = cartHTML;
        if (totalPriceElement) totalPriceElement.textContent = `${totalPrice} ₽`;
        if (clearCartButton) clearCartButton.style.display = 'inline-block';
        
        this.updateCartIndicator();
    },
    
    // Обновить отображение корзины
    updateCartDisplay() {
        this.updateCartIndicator();
        this.displayCart();
    },
    
    // Обновить индикатор корзины
    updateCartIndicator() {
        const cartIndicator = document.getElementById('cart-indicator');
        if (cartIndicator) {
            const totalItems = this.getTotalItems();
            if (totalItems > 0) {
                cartIndicator.textContent = totalItems;
                cartIndicator.style.display = 'inline';
            } else {
                cartIndicator.style.display = 'none';
            }
        }
    }
};

// Инициализация корзины при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    Cart.updateCartDisplay();
    
    // Инициализация кнопок "Заказать" в меню
    document.querySelectorAll('.menu-price-btn').forEach(button => {
        let clickCount = 0;
        
        const counterHTML = `
            <div class="menu-quantity-controls">
                <span class="menu-quantity-btn">-</span>
                <span class="menu-quantity-value">1</span>
                <span class="menu-quantity-btn">+</span>
            </div>
        `;
        
        button.addEventListener('click', function(e) {
            if (clickCount === 0) {
                this.innerHTML = counterHTML;
                this.style.backgroundColor = '#4e4f52';
                this.style.transition = 'background-color 0.3s ease';
                this.style.padding = '5px 10px';
                this.style.minWidth = '120px';
                
                const minusBtn = this.querySelector('.menu-quantity-btn:first-child');
                const numberSpan = this.querySelector('.menu-quantity-value');
                const plusBtn = this.querySelector('.menu-quantity-btn:last-child');
                
                // Получаем данные о блюде
                const itemId = this.getAttribute('data-item-id');
                const itemName = this.closest('.menu-card').querySelector('.menu-card-text h1').textContent;
                const itemPrice = this.closest('.menu-card').querySelector('.price h1').textContent.replace('от ', '').replace(' ₽', '');
                
                // Добавляем в корзину
                Cart.addItem(itemId, itemName, itemPrice, 1);
                clickCount = 1;
                
                minusBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (clickCount > 0) {
                        clickCount--;
                        numberSpan.textContent = clickCount;
                        Cart.updateQuantity(itemId, clickCount);
                        
                        if (clickCount === 0) {
                            this.innerHTML = 'Заказать';
                            this.style.backgroundColor = '';
                            this.style.minWidth = '';
                            this.style.padding = '';
                            clickCount = 0;
                        }
                    }
                });
                
                plusBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    clickCount++;
                    numberSpan.textContent = clickCount;
                    Cart.updateQuantity(itemId, clickCount);
                });
            }
        });
    });
    
    // Восстанавливаем состояние кнопок при загрузке страницы
    const cart = Cart.getCart();
    document.querySelectorAll('.menu-price-btn').forEach(button => {
        const itemId = button.getAttribute('data-item-id');
        if (cart[itemId] && cart[itemId].quantity > 0) {
            // Восстанавливаем состояние кнопки
            const counterHTML = `
                <div class="menu-quantity-controls">
                    <span class="menu-quantity-btn">-</span>
                    <span class="menu-quantity-value">${cart[itemId].quantity}</span>
                    <span class="menu-quantity-btn">+</span>
                </div>
            `;
            button.innerHTML = counterHTML;
            button.style.backgroundColor = '#4e4f52';
            button.style.transition = 'background-color 0.3s ease';
            button.style.padding = '5px 10px';
            button.style.minWidth = '120px';
            
            // Добавляем обработчики событий
            const minusBtn = button.querySelector('.menu-quantity-btn:first-child');
            const numberSpan = button.querySelector('.menu-quantity-value');
            const plusBtn = button.querySelector('.menu-quantity-btn:last-child');
            
            let clickCount = cart[itemId].quantity;
            
            minusBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (clickCount > 0) {
                    clickCount--;
                    numberSpan.textContent = clickCount;
                    Cart.updateQuantity(itemId, clickCount);
                    
                    if (clickCount === 0) {
                        button.innerHTML = 'Заказать';
                        button.style.backgroundColor = '';
                        button.style.minWidth = '';
                        button.style.padding = '';
                        clickCount = 0;
                    }
                }
            });
            
            plusBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                clickCount++;
                numberSpan.textContent = clickCount;
                Cart.updateQuantity(itemId, clickCount);
            });
        }
    });
});

// Обновление при изменении localStorage
window.addEventListener('storage', function(e) {
    if (e.key === 'restaurantCart') {
        Cart.updateCartDisplay();
    }
}); 