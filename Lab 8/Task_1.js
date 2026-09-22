function isPrimeNumber(input) {
    // Вспомогательная функция для проверки одного числа
    function checkSingle(n) {
        if (typeof n !== 'number' || !Number.isInteger(n)) {
            throw new Error(`Ошибка: ${n} не является целым числом.`);
        }
        if (n < 2) return false;
        
        for (let i = 2; i <= Math.sqrt(n); i++) {
            if (n % i === 0) return false;
        }
        return true;
    }

    try {
        if (Array.isArray(input)) {
            const primes = [];
            const notPrimes = [];

            input.forEach(num => {
                if (checkSingle(num)) {
                    primes.push(num);
                } else {
                    notPrimes.push(num);
                }
            });

            let message = "";
            if (primes.length > 0) message += `${primes.join(', ')} простые числа`;
            if (notPrimes.length > 0) {
                if (primes.length > 0) message += ", ";
                message += `${notPrimes.join(', ')} не простые числа`;
            }
            console.log(message);

        } else if (typeof input === 'number') {
            const result = checkSingle(input);
            console.log(`${input} ${result ? "простое число" : "не простое число"}`);
        } else {
            throw new Error("Ошибка: Аргумент должен быть числом или массивом чисел.");
        }
    } catch (e) {
        console.error(e.message);
    }
}

// Примеры использования:
isPrimeNumber(3);        // 3 простое число
isPrimeNumber(4);        // 4 не простое число
isPrimeNumber([3, 4, 5]); // 3, 5 простые числа, 4 не простое число
isPrimeNumber('3,4');