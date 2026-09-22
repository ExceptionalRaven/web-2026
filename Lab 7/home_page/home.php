<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Главная</title>
</head>
<script src="script.js"></script>
<?php
    require_once 'db.php'; // Подключаем наше соединение

    // Запрос к базе данных
    $stmt = $pdo->query("SELECT * FROM posts");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC); // Получаем данные в массив
?>

<div class="home-page">
    <nav class="sidebar">
        <ul class="sidebar__list">
            <li class="sidebar__item">
                <img src="./images/home.png" alt="Иконка" class="sidebar__icon">
            </li>
            <li class="sidebar__item">
                <img src="./images/person.png" alt="Иконка" class="sidebar__icon">
            </li>
            <li class="sidebar__item">
                <img src="./images/plus.png" alt="Иконка" class="sidebar__icon">
            </li>
        </ul>
    </nav>

    <main class="feed">
        <?php foreach ($posts as $post): ?>
            <?php include 'post_preview.php'; ?>
        <?php endforeach; ?>
    </main>

</div>
</html>