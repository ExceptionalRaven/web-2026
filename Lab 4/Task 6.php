<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обратная польская запись</title>
</head>
<body>
    <?php
    if (isset($_POST['expression'])) {
        $expr = $_POST['expression'];
        
        $stack = [];
        $stackSize = 0;
        $currentLexeme = '';
        $len = 0;
        
        while (isset($expr[$len])) {
            ++$len;
        }

        for ($i = 0; $i <= $len; ++$i) {
            if ($i === $len || $expr[$i] === ' ') {
                if ($currentLexeme !== '') {
                    if ($currentLexeme === '+' || $currentLexeme === '-' || $currentLexeme === '*') {
                        $b = $stack[$stackSize - 1];
                        $a = $stack[$stackSize - 2];
                        $stackSize = $stackSize - 2;

                        $res = 0;
                        if ($currentLexeme === '+') {
                            $res = $a + $b;
                        } 
                        if ($currentLexeme === '-') {
                            $res = $a - $b;
                        } 
                        if ($currentLexeme === '*') {
                            $res = $a * $b;
                        }

                        $stack[$stackSize] = $res;
                        ++$stackSize;
                    } 
                    else {
                        $stack[$stackSize] = (int)$currentLexeme;
                        ++$stackSize;
                    }
                    $currentLexeme = '';
                }
            } 
            else {
                $currentLexeme .= $expr[$i];
            }
        }

        if ($stackSize === 1) {
            echo '<p><b>Результат вычисления:</b> ' . $stack[0] . '</p>';
        } 
        else {
            echo '<p style="color: red;">Ошибка в выражении</p>';
        }
    }
    ?>

    <form method="post">
        <label>Выражение ОПЗ: <input type="text" name="expression" placeholder="например, 8 9 + 1 7 - *" required></label>
        <button type="submit">Вычислить</button>
    </form>
</body>
</html>