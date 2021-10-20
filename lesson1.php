<?php

    // 1 задание

    $a = 3;
    $b = 7;
    $h = 4;

    $s = ($a + $b) / 2 * $h;
    echo $s . '<br>';

    // 2 задание

    $num = 541967;
    $str = (string) $num;

    $x1 = substr($str, 0, 2);
    $x2 = substr($str, 2, 2);
    $x3 = substr($str, 4, 2);
    
    $sum = $x1 + $x2 + $x3;
    echo $sum . '<br>';

    $y1 = substr($str, 0, 3);
    $y2 = substr($str, 3, 3);

    $mult = $y1 * $y2;
    echo $mult . '<br>';

    // 3 задание

    $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel tempus erat. In sollicitudin nisl nisi, in cursus erat pulvinar et. In congue eleifend accumsan. Nam dictum nibh a justo iaculis, at hendrerit dui condimentum. Nulla et malesuada elit. Etiam eu dolor et nulla lobortis lacinia malesuada quis lacus. Aliquam nec nibh porta, vehicula justo id, sodales eros. Nulla facilisi. Nulla quis dui volutpat, mattis dolor massa ut, interdum nisl.';

    $text = "<ol><li>{$text}</ol></li>";
    $text = str_replace('. ', '.</li><li>', $text);
    $text = str_replace('.', ';', $text);
    $text = str_replace('dolor', '<i>dolor</i>', $text);
    echo $text;