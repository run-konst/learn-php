<?php
    include 'header.php';
    if (file_exists($_GET['url'] . '.php')) {
        include $_GET['url'] . '.php';
    } elseif (empty($_GET['url'])) {
        include 'home.php';
    } else {
        include '404.php';
    }
    function get_error(string $error) {
        if (isset($_COOKIE[$error]) && !empty($_COOKIE[$error])) {
            return "<span style=\"color: red;\"> {$_COOKIE[$error]}</span>";
        }
    }
    include 'form.php';
    include 'footer.php';    