document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailContainer = document.getElementById('emailContainer');
    const passwordContainer = document.getElementById('passwordContainer');
    const emailHint = document.getElementById('emailHint');
    const formAlert = document.getElementById('formAlert');
    const formAlertEmoji = document.getElementById('formAlertEmoji');
    const formAlertText = document.getElementById('formAlertText');
    const VALID_EMAIL = 'user@example.com';
    const VALID_PASSWORD = 'password123';
    const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const EMAIL_HINT_DEFAULT = 'Введите электропочту в формате *****@***.**';
    const eyeButton = document.querySelector('.login-form__eye-icon');

    eyeButton.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';
    
        // Переключаем тип поля ввода
        passwordInput.type = isPassword ? 'text' : 'password';
    
        // Меняем иконку (опционально, если у вас есть вторая иконка)
        eyeButton.style.backgroundImage = isPassword ? "url('./images/eye-off.png')" : "url('./images/eye.png')";
    });

    function hideAlert() {
        formAlert.classList.remove('is-visible', 'form-alert--centered');
        formAlert.setAttribute('hidden', '');
        formAlertEmoji.textContent = '';
        formAlertText.textContent = '';
    }

    function showAlert(emoji, message, options = {}) {
        formAlertEmoji.textContent = emoji;
        formAlertText.textContent = message;
        formAlert.classList.toggle('form-alert--centered', Boolean(options.centered));
        formAlert.removeAttribute('hidden');
        formAlert.classList.add('is-visible');
    }

    function clearErrors() {
        emailContainer.classList.remove('input-error');
        passwordContainer.classList.remove('input-error');
        emailHint.classList.remove('is-error');
        emailHint.textContent = EMAIL_HINT_DEFAULT;
        hideAlert();
    }

    function setRequiredFieldsError() {
        emailContainer.classList.add('input-error');
        passwordContainer.classList.add('input-error');
        showAlert('🤓', 'Поля обязательные');
    }

    function setEmailFormatError() {
        emailContainer.classList.add('input-error');
        emailHint.classList.add('is-error');
        emailHint.textContent = EMAIL_HINT_DEFAULT;
        showAlert('🤥', 'Неверный формат электропочты');
    }

    function setAuthError() {
        emailContainer.classList.add('input-error');
        passwordContainer.classList.add('input-error');
        showAlert('🤥', 'Не те логин или пароль...');
    }

    function isValidEmail(value) {
        return EMAIL_REGEX.test(value);
    }

    emailInput.addEventListener('input', clearErrors);
    passwordInput.addEventListener('input', clearErrors);
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        clearErrors();
        const email = emailInput.value.trim();
        const password = passwordInput.value;
        if (!email && !password) {
            setRequiredFieldsError();
            return;
        }

        if (!email || !isValidEmail(email)) {
            setEmailFormatError();
            return;
        }

        if (!password) {
            passwordContainer.classList.add('input-error');
            showAlert('🤓', 'Поля обязательные');
            return;
        }

        if (email !== VALID_EMAIL || password !== VALID_PASSWORD) {
            setAuthError();
            return;
        }

        window.location.href = '../home/home.php';
    });
});