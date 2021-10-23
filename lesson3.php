<?php
    // 1. Дан массив [33, 42, -7, -81, 11, -2, 21, 0, 5, 67]. По заданному пользователем индексу (должно быть числом) проверить существует ли данный элемент.
    // a) если нет, добавить элемент с введенным индексом и присвоить ему значение 0
    // b) если существует, то проверить, если его значение отрицательное, перезаписать его как положительное. проверить, если оно положительное, вывести следующий за ним элемент
    // c) если значение равно нулю, то переместить данный элемент в конец массива
    // Вывести введенный индекс и итоговый массив на экран.

    $arr = [33, 42, -7, -81, 11, -2, 21, 0, 5, 67];

    $i = readline('Index: ');

    if (!isset($arr[$i])) {
        $arr[$i] = 0;
    } else {
        if ($arr[$i] < 0) {
            $arr[$i] *= -1;
        } elseif ($arr[$i] > 0) {
            echo $arr[$i + 1];
        } else {
            $item = array_splice($arr, $i, 1)[0];
            array_push($arr, $item);
        }
    }

    var_dump($arr);

    // 2. Дан массив:    
    // a) сформировать 2 новых индексированных массива с днями на англ. и рус. языках
    // b) вывести оба массива в виде строк с разделителем ,

    $days = [
        'monday' => 'понедельник',
        'tuesday' => 'вторник',
        'wednesday' => 'среда',
        'thursday' => 'четверг',
        'friday' => 'пятница',
        'saturday' => 'суббота',
        'sunday' => 'воскресенье',
    ];

    $days_eng = array_keys($days);
    $days_ru = array_values($days);

    echo implode(', ', $days_eng) . "\n";
    echo implode(', ', $days_ru);

    // 3. Дан текст:
    // a) выяснить кол-во слов в тексте, если оно больше 50, вывести предупреждение о превышении данного лимита
    // b) выяснить кол-во предложений в данном тексте и вывести на экран
    // c) получить 5е предложение (Nam dictum ...), оно должно начинаться с маленькой буквы. удалить из него все точки, запятые и пробел в начале. пробелы между словами заменить на дефисы - и сформировать из этого предложения ссылку вида http://site.ru/news/(предложение). вывесит ссылку на экран.

    $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel tempus erat. In sollicitudin nisl nisi, in cursus erat pulvinar et. In congue eleifend accumsan. Nam dictum, nibh a justo iaculis, at hendrerit dui condimentum. Nulla et malesuada elit. Etiam eu dolor et nulla lobortis lacinia malesuada quis lacus. Aliquam nec nibh porta, vehicula justo id, sodales eros. Nulla facilisi. Nulla quis dui volutpat, mattis massa ut, interdum nisl.';

    $words = explode(' ', $text);
    $sentences = explode('. ', $text);

    if (count($words) > 50) {
        echo 'Многа букф' . "\n";
    }
    echo count($sentences) . "\n";

    $sentence = strtolower($sentences[4]);
    $sentence = str_replace(',', '', $sentence);
    $sentence = str_replace(' ', '-', $sentence);
    $link = 'http://site.ru/news/' . $sentence;

    echo $link;