<?php
    // 1. С помощью цикла (без использования % и implode) вывести на экран только десятки (10, 20, 30 ...) из диапазона от 10 до 200 включительно.
    //    Числа разделить запятыми, после последнего числа должна быть точка.
    $nums = '';
    for ($i = 1; $i <= 200; $i++) { 
        if ( strpos($i, '0', strlen($i) - 1 ) === strlen($i) - 1 ) { // $i % 10 === 0
            $nums .= "$i, ";
        }
    }
    $nums = rtrim($nums, ', ') . '.';
    echo $nums . "\n";

    // 2. Сформировать массив из 15 случайных целых чисел из интервала от -100 до 100 включительно. Вывести его на экран.
    // a) посчитать и вывести сумму всех нечетных элементов массива
    // b) найти минимальный элемент в массиве и вывести его на экран

    $arr = [];
    $sum = 0;
    $min = 100;

    for ($i = 0; $i < 15; $i++) { 
        $arr[] = rand(-100, 100);
    }

    foreach ($arr as $item) {
        if ($item % 2 !== 0) {
            $sum += $item;
        }
        if ($item < $min) {
            $min = $item;
        }
    }

    echo implode(', ', $arr) . "\n";
    echo 'Сумма нечетных: ' . $sum . "\n";
    echo $min . "\n";
    
    // 3. Вывести с помощью циклов "треугольник"
    // a) от 1 до 9 в виде
    // b) в обратном порядке (9-1)

    for ($i = 1; $i <= 9 ; $i++) { 
        for ($j = 0; $j < $i; $j++) { 
            echo $i;
        }
        echo "\n";
    }

    for ($i = 9; $i >= 1 ; $i--) { 
        for ($j = 0; $j < $i; $j++) { 
            echo $i;
        }
        echo "\n";
    }

    // 4. Есть массив с днями недели на нескольких языках. Запрашивать повторный ввод (в пунктах a и b), если пользователь ввел неправильные данные (элемент не существует или неверный индекс).
    // a) по заданному языку вывести все дни недели в обратном порядке
    // b) с помощью цикла по заданному номеру вывести день недели на каждом языке
    // с) вывести на экран все элементы массива, языки в виде ненумерованного списка (<ul>), а дни недели в виде нумерованных подсписков (<ol>)

    $days = [
        'ru' => ['понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье'],
        'en' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],
        'de' => ['montag', 'dienstag', 'mittwoch', 'donnerstag', 'freitag', 'samstag', 'sonntag'],
        'fr' => ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'],
        'it' => ['lunedì', 'martedì', 'mercoledì', 'giovedì', 'venerdì', 'sabato', 'domenica'],
        'es' => ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo'],
    ];

    do {
        $lang = readline('Язык: ');
    } while (!isset($days[$lang]));

    for ( $i = count($days[$lang]) - 1; $i >= 0; $i--) { 
        echo $days[$lang][$i] . "\n";
    }

    do {
        $day_num = readline('День недели: ');
    } while ($day_num < 1 || $day_num > 7);
    
    foreach ($days as $item) {
        echo $item[$day_num - 1] . "\n";
    }

    $html = '<ul>';
        foreach ($days as $lang => $days_arr) {
            $html .= "<li>$lang<ol>";
            foreach ($days_arr as $item) {
                $html .= "<li>$item</li>";
            }
            $html .= '</li></ol>';
        }    
    $html .= '</ul>';

    echo $html;