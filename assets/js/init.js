// Инициализация WOW.js
document.addEventListener('DOMContentLoaded', function() {
    new WOW().init();
    
    // Добавляем стили для flexbox layout в корзине
    const sostavBlock = document.querySelector('.sostav');
    if (sostavBlock) {
        sostavBlock.style.display = 'flex';
        sostavBlock.style.flexDirection = 'column';
        sostavBlock.style.minHeight = '400px';
        sostavBlock.style.justifyContent = 'space-between';
    }
}); 