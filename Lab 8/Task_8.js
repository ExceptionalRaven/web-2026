const numbers = [2, 5, 8, 10, 3];

const result = numbers
  .map(num => num * 3)       // Умножаем каждый элемент на 3
  .filter(num => num > 10);  // Оставляем только те, которые больше 10

console.log(result); // [15, 24, 30]