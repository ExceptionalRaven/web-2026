<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Цифра словом</title>
</head>
<body>
    <?php
    function getDigitName(int $digit): string {
        if ($digit === 0) {
            return 'Ноль';
        }
        if ($digit === 1) {
            return 'Один';
        }
        if ($digit === 2) {
            return 'Два';
        }
        if ($digit === 3) {
            return 'Три';
        }
        if ($digit === 4) {
            return 'Четыре';
        }
        if ($digit === 5) {
            return 'Пять';
        }
        if ($digit === 6) {
            return 'Шесть';
        }
        if ($digit === 7) {
            return 'Семь';
        }
        if ($digit === 8) {
            return 'Восемь';
        }
        if ($digit === 9) {
            return 'Девять';
        }
        return '';
    }

    if (isset($_POST['digit'])) {
        $digit = (int)$_POST['digit'];
        echo '<p><b>Результат:</b> ' . getDigitName($digit) . '</p>';
    }
    ?>

    <form method="post">
        <label>Введите цифру: <input type="number" name="digit" min="0" max="9" required></label>
        <button type="submit">Преобразовать</button>
    </form>
</body>
</html>