document.addEventListener('DOMContentLoaded', function () {
    const COMMENT_LIMIT = 123; // Лимит символов

    const comments = document.querySelectorAll('.post__comment-content');

    comments.forEach(comment => {
        const fullText = comment.getAttribute('data-full-text');
        const moreButton = comment.nextElementSibling; // Кнопка "еще"

        if (fullText.length > COMMENT_LIMIT) {
            comment.textContent = fullText.slice(0, COMMENT_LIMIT) + '...';
            moreButton.style.display = 'inline'; // Показываем кнопку
        } else {
            moreButton.style.display = 'none'; // Скрываем кнопку, если текст короткий
        }

        moreButton.addEventListener('click', function () {
            comment.textContent = fullText;
            moreButton.style.display = 'none'; // Скрываем "еще" после нажатия
        });
    });
});