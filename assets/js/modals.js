// Инициализация модальных окон при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    // Инициализация окна времени доставки
    initDeliveryTimeModal();
    
    // Инициализация окна заказа звонка
    initCallOrderModal();
});

// Инициализация окна времени доставки
function initDeliveryTimeModal() {
    const timeModal = document.getElementById('time-form');
    const openTimeBtn = document.getElementById('open-time');
    const closeTimeBtn = document.getElementById('close-modal-btn-3');
    const timeInput = document.querySelector('input[placeholder="Побыстрее"]');
    const timeOptions = document.querySelectorAll('.delivery-time');
    
    if (!timeModal || !openTimeBtn || !closeTimeBtn) return;
    
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
    if (timeOptions && timeInput) {
        timeOptions.forEach(option => {
            option.addEventListener('click', function() {
                const selectedTime = this.querySelector('p').textContent;
                timeInput.value = selectedTime;
                timeModal.classList.remove('open');
            });
        });
    }
}

// Инициализация окна заказа звонка
function initCallOrderModal() {
    const callModal = document.getElementById('zvonok-form');
    const openCallBtn = document.getElementById('open-zvonok');
    const closeCallBtn = document.getElementById('close-modal-btn');
    
    if (!callModal || !openCallBtn || !closeCallBtn) return;
    
    // Открытие модального окна
    openCallBtn.addEventListener('click', function() {
        callModal.classList.add('open');
    });
    
    // Закрытие модального окна
    closeCallBtn.addEventListener('click', function() {
        callModal.classList.remove('open');
    });
    
    // Закрытие по клику вне модального окна
    callModal.addEventListener('click', function(e) {
        if (e.target === callModal) {
            callModal.classList.remove('open');
        }
    });
}

// Общий обработчик для закрытия модальных окон по Escape
window.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Закрываем все модальные окна
        document.querySelectorAll('.modal-box, .modal-box-time').forEach(modal => {
            modal.closest('.zvonok-modal, .time-modal').classList.remove('open');
        });
    }
}); 