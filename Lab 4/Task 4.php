<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Счастливые билеты</title>
</head>
<body>
    <form method="post">
        <label>Старт: <input type="number" name="start" min="100000" max="999999" required></label>
        <label>Конец: <input type="number" name="end" min="100000" max="999999" required></label>
        <button type="submit">Найти билеты</button>
    </form>

    <?php
    if (isset($_POST['start']) && isset($_POST['end'])) {
        $start = (int)$_POST['start'];
        $end = (int)$_POST['end'];

        echo '<h3>Найденные счастливые билеты:</h3>';
        for ($i = $start; $i <= $end; ++$i) {
            $firstPart = (int)($i / 1000);
            $secondPart = $i % 1000;

            $sum1 = (int)($firstPart / 100) + (int)(($firstPart % 100) / 10) + ($firstPart % 10);
            $sum2 = (int)($secondPart / 100) + (int)(($secondPart % 100) / 10) + ($secondPart % 10);

            if ($sum1 === $sum2) {
                echo $i . '<br>';
            }
        }
    }
    ?>
</body>
</html>