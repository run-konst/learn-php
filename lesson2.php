<?php
    // 1. Выяснить является ли введенный год високосным. В диапазоне от 0 до 2021.
    // - год, номер которого кратен 400, — високосный;
    // - остальные годы, номер которых кратен 100, — невисокосные (например, годы 1700, 1800, 1900, 2100, 2200, 2300);
    // - остальные годы, номер которых кратен 4, — високосные.
    // - все остальные годы — не високосные.

    $year = readline('Введите год от 0 до 2021: ');
    if ($year === '0') {  //тут проверяем на введенный 0
        echo 'Год високосный';
    } elseif ($year <= 0 || $year > 2021) { //а тут получается что сравнение преобразовывает строку в числовой 0, если введено не число
        echo 'Год введен неверно!';
    } elseif ($year % 400 === 0) {
        echo 'Год високосный';
    } elseif ($year % 100 === 0) {
        echo 'Год не високосный (/100)';
    } elseif ($year % 4 === 0) {
        echo 'Год високосный';
    } else {        
        echo 'Год не високосный';
    }    

    // 2. Получить от пользователя 3 значения: сторона A, сторона B и угол альфа.

    // a) проверить введенный угол, он должен быть в диапазоне от 1 до 90 градусов включительно. A и B целые числа больше нуля - стороны четырехугольника. если ввели неверные значения, вывести сообщение об этом
    // b) проверить является ли четырехугольник с введенными значениями квадратом или прямоугольником
    // c) проверить является ли четырехугольник с введенными значениями ромбом или параллелограммом.
    // Посчитать площадь полученной фигуры, вывести название фигуры и ее площадь на экран.
    
    $a = (int) readline('Сторона a: ');    
    $b = (int) readline('Сторона b: ');
    $A = (int) readline('Угол A: ');

    $error = $a <= 0 || $b <= 0 || $A < 1 || $A > 90;
    $is_square = $a === $b && $A === 90;
    $is_quad = $a !== $b && $A === 90;
    $is_rhomb = $a === $b && $A !== 90;
    //$is_parall = $a !== $b && $A !== 90;

    if ($error) {
        echo 'Ошибка ввода';
    } elseif ($is_square) {
        $s = $a ** 2;
        echo "Это квадрат, площадь {$s}";
    } elseif ($is_quad) {
        $s = $a * $b;
        echo "Это прямоугольник, площадь {$s}";
    } elseif ($is_rhomb) {
        $s = $a ** 2 * sin(deg2rad($A));
        echo "Это ромб, площадь {$s}";
    } else {
        $s = $a * $b * sin(deg2rad($A));
        echo "Это параллелограмм, площадь {$s}";
    }

    // 3.
    // a) добавить к обоим тегам <a> атрибут target="_blank"
    // b) добавить класс btn-success к 1й ссылке, а ко 2й - btn-primary
    // c) заменить обе ссылки (href) на http://example.com/(файл) (имя файла оставить без изменений)

    $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel tempus <a href="http://localhost/1.jpg" class="btn">erat</a>. In sollicitudin <span class="dotted">nisl nisi</span>, in cursus erat pulvinar et. In <a href="https://wikipedia.org/2.png" class="btn">congue</a> eleifend accumsan.';

    $text = str_replace('<a ', '<a target="_blank" ', $text);
    $new_text = substr($text, 0, strpos($text, 'http'));
    $new_text .= 'http://example.com/';
    $new_text .= substr($text, strpos($text, '1.jpg'), strpos($text, '"btn"') - strpos($text, '1.jpg') + 4);
    $new_text .= ' btn-success';
    $new_text .= substr($text, strpos($text, '">erat'), strpos($text, 'https') - strpos($text, '">erat'));
    $new_text .= 'http://example.com/';
    $new_text .= substr($text, strpos($text, '2.png'), strpos($text, '"btn"', strpos($text, '2.png')) - strpos($text, '2.png') + 4);
    $new_text .= ' btn-primary';
    $new_text .= substr($text, strpos($text, '">congue'));
    echo $new_text;