document
	.getElementById('registrationForm')
	.addEventListener('submit', function (event) {
		event.preventDefault() // Предотвращаем стандартную отправку формы

		// Получаем значения полей
		const username = document.getElementById('username').value
		const email = document.getElementById('email').value
		const password = document.getElementById('password').value
		const confirmPassword = document.getElementById('confirmPassword').value

		// Простая валидация
		if (password !== confirmPassword) {
			alert('Passwords do not match!')
			return
		}

		// Выводим данные (в реальном проекте здесь будет отправка на сервер)
		console.log('Username:', username)
		console.log('Email:', email)
		console.log('Password:', password)

		alert('Registration successful!')
	})
