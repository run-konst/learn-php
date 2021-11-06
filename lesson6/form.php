<form action="form_process.php" method="post">
    <span>Login</span><br>
    <input type="text" name="login"><?=get_error('login_error')?><br>
    <span>Message</span><br>
    <textarea name="message" cols="50" rows="10"></textarea><?=get_error('message_error')?><br>
    <input type="submit">
</form>