function generatePassword(length) {
    if (typeof length !== 'number' || length < 4) {
        throw new Error("Ошибка: Длина пароля должна быть числом не менее 4.");
    }

    const lower = "abcdefghijklmnopqrstuvwxyz";
    const upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const digits = "0123456789";
    const specials = "!@#$%^&*()_+~`|}{[]:;?><,./-=";
    const allChars = lower + upper + digits + specials;

    // Функция для получения случайного символа из строки
    const getRandom = (str) => str[Math.floor(Math.random() * str.length)];

    // 1. Гарантируем наличие хотя бы одного символа каждого типа
    let password = [
        getRandom(lower),
        getRandom(upper),
        getRandom(digits),
        getRandom(specials)
    ];

    // 2. Дополняем пароль случайными символами до нужной длины
    for (let i = 4; i < length; i++) {
        password.push(getRandom(allChars));
    }

    // 3. Перемешиваем массив (алгоритм Фишера-Йетса)
    for (let i = password.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [password[i], password[j]] = [password[j], password[i]];
    }

    return password.join('');
}

// Примеры использования:
console.log(generatePassword(10)); // Например: "aB1!d4kL9z"
console.log(generatePassword(16)); // Например: "p9K@zX5&m2vQ1#W8"