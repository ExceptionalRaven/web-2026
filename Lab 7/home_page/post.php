<?php
require_once 'db.php'; // Подключаем подключение к БД

$postId = $_GET['postId'] ?? null;

// Запрос к БД
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $postId]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die("Пост не найден");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <title>Пост: <?= htmlspecialchars($post['author']) ?></title>
</head>
<body>
    <div class="home-page">
        <main class="feed">
            <article class="post">
                <h1>ID поста: <?= (int)$post['id'] ?></h1>
                <h2>Автор: <?= htmlspecialchars($post['author']) ?></h2>
                
                <img src="<?= htmlspecialchars($post['image']) ?>" alt="Пост" class="post__image">
                
                <div class="post__content">
                    <p><?= htmlspecialchars($post['comment']) ?></p>
                </div>
            </article>
        </main>
    </div>
</body>
</html>