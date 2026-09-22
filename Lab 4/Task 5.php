<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вычисление факториала</title>
</head>
<body>
    <?php
    function getFactorial(int $n): int {
        if ($n <= 1) {
            return 1;
        }
        return $n * getFactorial($n - 1);
    }

    if (isset($_POST['number'])) {
        $number = (int)$_POST['number'];
        echo '<p><b>Результат:</b> ' . getFactorial($number) . '</p>';
    }
    ?>

    <form method="post">
        <label>Число: <input type="number" name="number" min="0" required></label>
        <button type="submit">Вычислить</button>
    </form>
</body>
</html>