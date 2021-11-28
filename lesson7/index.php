<?php 
    var_dump($_FILES);
    $dir = __DIR__;
    $img_dir = $dir . '\avatars';
    $error = '';
    $format_arr = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
    ];
    if (isset($_FILES['file']) && !empty($_FILES['file']) && isset($_POST['login']) && !empty($_POST['login'])) {
        $format = $_FILES['file']['type'];
        if ($format === 'image/jpeg' || $format === 'image/png' || $format === 'image/gif') {
            $size = $_FILES['file']['size'];
            if ($size <= 2000000) {
                if (!is_dir($img_dir)) {
                    mkdir($img_dir);
                    chmod($img_dir, 0777);
                }
                foreach (scandir($img_dir) as $file) {
                    if (substr($file, 0, strpos($file, '.') - strlen($file)) === $_POST['login']) {
                        unlink("$img_dir/$file");
                        break;
                    };
                }
                $new_file = "$img_dir\\{$_POST['login']}." . $format_arr[$format];
                move_uploaded_file($_FILES['file']['tmp_name'], $new_file);
            } else {
                $error = 'Слишком большой файл';
            }
        } else {
            $error = 'Неверный формат файла';
        }
    } else {
        $error = 'Ошибка!';
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
    <form enctype="multipart/form-data" action="" method="post">
        <span>Login:</span><br>
        <input type="text" name="login"><br><br>
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="2000000"> -->
        <input type="file" name="file"><br>
        <span style="color: red;"><?php echo $error; ?></span><br><br>
        <input type="submit"><br>
    </form>
    <img src="<?php echo 'avatars\\' . basename($new_file); ?>" alt="avatar">
</body>
</html>