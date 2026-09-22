function mergeObjects(obj1, obj2) {
    // Проверка, что аргументы являются объектами
    if (typeof obj1 !== 'object' || obj1 === null || typeof obj2 !== 'object' || obj2 === null) {
        throw new Error("Ошибка: Аргументы должны быть объектами.");
    }

    // Оператор ... создает новый объект, копируя свойства из obj1, 
    // а затем из obj2. Свойства из obj2 перезаписывают совпавшие ключи из obj1.
    return { ...obj1, ...obj2 };
}

// Пример использования:
const result = mergeObjects({ a: 1, b: 2 }, { b: 3, c: 4 });
console.log(result); // { a: 1, b: 3, c: 4 }