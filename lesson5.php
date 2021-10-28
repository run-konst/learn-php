<?php
    /* 1. Написать функцию подсчета суммы с учетом скидки. На вход принимает одноименный массив с ценами (можно генерировать перед вызовом функции) и скидку в % (целое число от 0 до 100). Проверять в фун-ии на правильный диапазон и если скидка равно 0 (значение по-умолчанию), то не применять ее. Должна возвращать итоговую сумму в виде числа. */

    $prices = [];
    $discount = rand(0, 100);
    for ($i = 0; $i < rand(3, 15); $i++) {
        $prices[] = rand(50, 500);
    }

    function get_price(array $arr, int $percent = 0) {
        if ($percent < 0 || $percent > 100) {
            return false;
        }
        $sum = 0;
        foreach ($arr as $value) {
            $sum += $value;
        }
        return $sum *= (100 - $percent) / 100;
    }

    echo implode(', ', $prices) . "\n";
    echo $discount . "\n";
    echo get_price($prices, $discount) . "\n";

    // 2. Написать 2 функции:
    // a) возвращает правильную форму множественного числа, на вход принимает целое число (кол-во) и массив с 3мя элементами (формы мн. числа существительного). например:
    // имя_функции(5, ['лайк', 'лайка', 'лайков']) вернет "5 лайков" или имя_функции(4, ['комментарий', 'комментария', 'комментариев']) вернет "4 комментария"
    // b) возвращает сумму прописью (без копеек), на вход принимает целое число от 1 до 999 999

    function get_word_form(int $num, array $words = ['лайк', 'лайка', 'лайков']) {
        if ( count($words) !== 3 ) return '';
        $last_num = substr($num, -2);
        if ($last_num > 10 && $last_num < 20) {
            return "$num $words[2]";
        }
        $last_num = substr($last_num, -1);
        if ($last_num == 1) {
            return "$num $words[0]";
        } elseif ($last_num >= 1 && $last_num <= 4) {
            return "$num $words[1]";
        } else {
            return "$num $words[2]";
        }
        return "$num $word";
    }

    echo get_word_form(rand(0, 500));

    // 3. Написать функцию сортировки массива из строк по длине строк. За основу можно взять текст из домашнего задания к прошлому уроку или другой рыбу-текст (на латинице) и разбить его на слова. На вход должна принимать массив строк, возвращать его же, но отсортированный по возрастанию длины строки.

    $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel tempus erat. In sollicitudin nisl nisi, in cursus erat pulvinar et. In congue eleifend accumsan. Nam dictum, nibh a justo iaculis, at hendrerit dui condimentum. Nulla et malesuada elit. Etiam eu dolor et nulla lobortis lacinia malesuada quis lacus. Aliquam nec nibh porta, vehicula justo id, sodales eros. Nulla facilisi. Nulla quis dui volutpat, mattis massa ut, interdum nisl.';

    $text_arr = explode(' ', str_replace(',', '', str_replace('.', '', $text)));

    // сделал вот так, а потом usort нашел))
    function sort_words(array $arr) {
        $new_arr = [];
        $i = 1;
        while (count($arr) !== count($new_arr)) {
            $new_arr = array_merge($new_arr, array_filter($arr, fn($word) => strlen($word) === $i));
            $i++;
        }
        return $new_arr;
    }

    usort($text_arr, fn($word1, $word2) => strlen($word1) < strlen($word2) ? -1 : 1);
    var_dump($text_arr);
