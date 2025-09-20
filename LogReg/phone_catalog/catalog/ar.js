// Функция открытия формы аренды
function openRentForm(productName) {
    const rentForm = document.getElementById('rentForm');
    const productInput = document.getElementById('phoneModel');
    
    // Устанавливаем название товара
    productInput.value = productName;
    
    // Показываем форму
    rentForm.style.display = 'block';
    
    // Сбрасываем остальные поля
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('days').value = '';
}

// Функция отправки формы
function submitRentForm(event) {
    event.preventDefault();
    
    const product = document.getElementById('phoneModel').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const days = document.getElementById('days').value;
    
    // Валидация
    if (!name || !email || !days) {
        alert('Пожалуйста, заполните все поля');
        return;
    }
    
    // Здесь будет отправка данных на сервер
    console.log('Данные аренды:', {
        product: product,
        name: name,
        email: email,
        days: days
    });
    
    // Показываем диалог подтверждения
    document.getElementById('myDialog').showModal();
    
    // Скрываем форму
    document.getElementById('rentForm').style.display = 'none';
}