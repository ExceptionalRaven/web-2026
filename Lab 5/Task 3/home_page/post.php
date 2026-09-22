<?php
// Получаем ID из GET-параметра
$postId = $_GET['postId'] ?? null;

// Имитируем получение данных (массив для одного поста)
$post = [
    'id' => 1,
    'title' => 'The Road Ahead',
    'author' => 'Ваня Денисов',
    'image' => './images/post_image_1.png',
    'content' => 'Это детальная информация о посте.'
];

// Проверка найден ли пост
if (!$post) {
    die("Пост не найден");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Пост: <?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <div class="home-page">
        <main class="feed">
            <article class="post">
                <h1>ID поста: <?= (int)$postId ?></h1>
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p>Автор: <?= htmlspecialchars($post['author']) ?></p>
                
                <img src="<?= htmlspecialchars($post['image']) ?>" alt="Пост" class="post__image">
                
                <div class="post__content">
                    <p><?= htmlspecialchars($post['content']) ?></p>
                </div>
            </article>
        </main>
    </div>
</body>
</html>