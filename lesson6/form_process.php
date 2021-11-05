<?php
    $login = $_POST['login'];
    $message = $_POST['message'];
    
    function validate_login($login) {
        if (empty(trim($login))) {
            return 'Логин не может быть пустым';
        } elseif (strlen($login) < 3) {
            return 'Логин должен быть не менее 3 символов';
        } elseif (strlen($login) > 20) {
            return 'Логин должен быть не более 20 символов';
        } elseif (preg_match('/[^a-zA-Z]/', $login)) {
            return 'Логин может состоять только из латинских букв';
        }
        return '';
    }
    
    function validate_message($message) {
        if (empty(trim($message))) {
            return 'Сообщение не может быть пустым';
        } elseif (strlen($message) > 250) {
            return 'Сообщение не должно превышать 250 символов';
        } elseif (count(explode(' ', $message)) > 50) {
            return 'Сообщение не должно превышать 50 слов';
        } 
        return '';
    }

    $login_error = validate_login($login);
    $message_error = validate_message($message);

    if (!empty($login_error)) {
        setcookie('login_error', $login_error);
    } else {
        setcookie('login_error', $login_error, time() - 3600);
    }

    if (!empty($message_error)) {
        setcookie('message_error', $message_error);
    } else {
        setcookie('message_error', $message_error, time() - 3600);
    }

    if (empty($login_error) && empty($message_error)) {
        $data = "{$login}\n{$message}\n";
        file_put_contents('form_login.txt', $data, FILE_APPEND);
    }

    header('Location: index.php');
    die;