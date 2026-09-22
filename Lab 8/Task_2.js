function countVowels(str) {
    if (typeof str !== 'string') {
        console.error("Ошибка: Аргумент должен быть строкой.");
        return;
    }

    const vowels = "аеёиоуыэюяАЕЁИОУЫЭЮЯ";
    let count = 0;

    for (let char of str) {
        if (vowels.includes(char)) {
            count++;
        }
    }

    return count;
}

// Примеры:
console.log(countVowels("Привет, мир!")); // 3
console.log(countVowels("АБВГДЕ"));       // 2 (А, Е)