<?php 
    include 'months.php';
    include 'translator.php';

    var_dump(get_months_arr($months));
    var_dump(get_month($months, 'ru', 3));