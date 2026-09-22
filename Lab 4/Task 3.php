<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Знак зодиака</title>
</head>
<body>
    <?php
    function getZodiacSign(int $day, int $month): string {
        if (($month === 3 && $day >= 21) || ($month === 4 && $day <= 19)) {
            return 'Овен';
        }
        if (($month === 4 && $day >= 20) || ($month === 5 && $day <= 20)) {
            return 'Телец';
        }
        if (($month === 5 && $day >= 21) || ($month === 6 && $day <= 20)) {
            return 'Близнецы';
        }
        if (($month === 6 && $day >= 21) || ($month === 7 && $day <= 22)) {
            return 'Рак';
        }
        if (($month === 7 && $day >= 23) || ($month === 8 && $day <= 22)) {
            return 'Лев';
        }
        if (($month === 8 && $day >= 23) || ($month === 9 && $day <= 22)) {
            return 'Дева';
        }
        if (($month === 9 && $day >= 23) || ($month === 10 && $day <= 22)) {
            return 'Весы';
        }
        if (($month === 10 && $day >= 23) || ($month === 11 && $day <= 21)) {
            return 'Скорпион';
        }
        if (($month === 11 && $day >= 22) || ($month === 12 && $day <= 21)) {
            return 'Стрелец';
        }
        if (($month === 12 && $day >= 22) || ($month === 1 && $day <= 19)) {
            return 'Козерог';
        }
        if (($month === 1 && $day >= 20) || ($month === 2 && $day <= 18)) {
            return 'Водолей';
        }
        return 'Рыбы';
    }

    if (isset($_POST['date_str'])) {
        $str = $_POST['date_str'];
        $numbers = [];
        $current = '';
        
        for ($i = 0; isset($str[$i]); ++$i) {
            if ($str[$i] >= '0' && $str[$i] <= '9') {
                $current .= $str[$i];
            } 
            else {
                if ($current !== '') {
                    $numbers[] = (int)$current;
                    $current = '';
                }
            }
        }
        if ($current !== '') {
            $numbers[] = (int)$current;
        }

        if (isset($numbers[0]) && isset($numbers[1])) {
            $day = $numbers[0];
            $month = $numbers[1];
            echo '<p><b>Знак зодиака:</b> ' . getZodiacSign($day, $month) . '</p>';
        } 
        else {
            echo '<p style="color: red;">Неверный формат даты</p>';
        }
    }
    ?>

    <form method="post">
        <label>Введите дату: <input type="text" name="date_str" placeholder="например, 01.02.1993" required></label>
        <button type="submit">Определить</button>
    </form>
</body>
</html>