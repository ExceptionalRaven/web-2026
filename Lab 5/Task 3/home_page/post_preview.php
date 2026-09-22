<article class="post">
    <div class="post__header">
        <img src="<?= $post['pfp'] ?>" alt="Фото" class="post__pfp">
        <span class="post__author-name"><?= $post['author'] ?></span>
        
        <?php if (!empty($post['can_edit'])): ?>
        <button class="post__action-button">
            <img src="./images/edit.png" alt="Изменить" class="post__edit-icon">
        </button>
        <?php endif; ?>
    </div>

    <img src="<?= $post['image'] ?>" alt="Пост" class="post__image">

    <div class="post__actions">
        <button class="post__action-button">
            <img src="./images/like.png" alt="Лайк" class="like__icon">
        </button>
    </div>

    <?php if (!empty($post['comment'])): ?>
    <div class="post__comment">
        <span class="post__comment-content" data-full-text="<?= htmlspecialchars($post['comment']) ?>">
            <?= htmlspecialchars($post['comment']) ?>
        </span>
        <button class="post__text-button" type="button" style="display: none;">еще</button>
    </div>
    <?php endif; ?>

    <div class="post__comment">
        <a href="/post?id=<?= $post['id'] ?>" class="post__text-button">
            <?= date('H:i', $post['date']) ?> назад
        </a>
    </div>
</article>