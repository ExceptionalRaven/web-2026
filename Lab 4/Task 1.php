<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"> 
    <title>Високосный год</title>
</head>
<body>
    <?php
    if (isset($_POST['year'])) //Ждем значение от метода post  
    {
        $year = (int)$_POST['year']; //Переводим тип year на int

        if (($year % 400 == 0) || ($year % 4 == 0 && $year % 100 != 0)) 
        {
            echo '<p><b>Результат:</b> Год високосный</p>'; //Возвращаем результат
        } 
        else
        {
            echo '<p><b>Результат:</b> Год не високосный</p>'; //Возвращаем результат
        }
    }
    ?>

    <form method="post"> 
        <label>Введите год: <input type="number" name="year" required></label>
        <button type="submit">Проверить</button>
    </form>
</body>
</html>