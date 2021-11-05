<?php
    if (file_exists($_GET['url'] . '.php')) {
        header('Location: ' . $_GET['url'] . '.php');
        die;
    } elseif (empty($_GET['url'])) {
        // header('Location: home.php');
        // die;
    } else {
        header('Location: 404.php');
        die;
    }
    function get_error(string $error) {
        if (isset($_COOKIE[$error]) && !empty($_COOKIE[$error])) {
            return "<span style=\"color: red;\"> {$_COOKIE[$error]}</span>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="index.php?url=home">Home</a></li>
        <li><a href="index.php?url=about">About</a></li>
        <li><a href="index.php?url=blog">Blog</a></li>
        <li><a href="index.php?url=contacts">Contact us</a></li>
    </ul>
    <form action="form_process.php" method="post">
        <span>Login</span><br>
        <input type="text" name="login"><?=get_error('login_error')?><br>
        <span>Message</span><br>
        <textarea name="message" cols="50" rows="10"></textarea><?=get_error('message_error')?><br>
        <input type="submit">
    </form>
</body>
</html>