function countOccurrences(arr) {
    if (!Array.isArray(arr)) {
        throw new Error("Ошибка: Аргумент должен быть массивом.");
    }

    return arr.reduce((acc, item) => {
        // Приводим элемент к строке
        const key = String(item);
        
        // Если ключ уже есть, увеличиваем счетчик, если нет — создаем с единицей
        acc[key] = (acc[key] || 0) + 1;
        
        return acc;
    }, {});
}

// Примеры:
const result = countOccurrences(['привет', 'hello', 1, '1', 67]);
console.log(result); 
// Вывод: { 'привет': 1, 'hello': 1, '1': 2 }