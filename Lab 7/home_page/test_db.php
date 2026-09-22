<?php
$conn = mysqli_connect('127.0.0.1', 'root', '', 'network');
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
} else {
    echo "Успешное подключение!";
}
?>