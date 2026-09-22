<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Главная</title>
</head>
<script src="script.js"></script>
<?php
$posts = [
    [
        'id' => 1,
        'author' => 'Ваня Денисов',
        'pfp' => './images/profile.png',
        'image' => './images/post_image_1.png',
        'comment' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном снегом по ручку двери...» ',
        'date' => 1720952200, // Пример timestamp
        'can_edit' => true
    ],
    [
        'id' => 2,
        'author' => 'Лиза Дёмина',
        'pfp' => './images/avatar.png',
        'image' => './images/post_image_2.png',
        'comment' => '',
        'date' => 1720948600 // Пример timestamp
    ]
];
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