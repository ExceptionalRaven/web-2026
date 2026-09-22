const users = [
  { id: 1, name: "Alice" },
  { id: 2, name: "Bob" },
  { id: 3, name: "Charlie" },
  { id: 4, name: 'Bob'}
];

// Используем map для получения массива имен
const names = users.map(user => user.name);

console.log(names); // ["Alice", "Bob", "Charlie"]