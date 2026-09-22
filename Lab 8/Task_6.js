function mapObject(obj, callback) {
    if (typeof obj !== 'object' || obj === null) {
        throw new Error("Ошибка: Первый аргумент должен быть объектом.");
    }

    return Object.entries(obj).reduce((newObj, [key, value]) => {
        // Применяем callback к значению и записываем в новый объект под тем же ключом
        newObj[key] = callback(value);
        return newObj;
    }, {});
}

// Пример использования:
const nums = { a: 2, b: 6, c: 17 };
const result = mapObject(nums, x => x * 2);

console.log(result); // { a: 2, b: 4, c: 6 }