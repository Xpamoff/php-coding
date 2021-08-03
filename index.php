<?php
    session_start();

    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $login = $_POST['login'];
        $file = $_FILES['file'];
        $file_name = $file['name'];
        $file_type_temp = explode('/', $file['type']);
        $file_type = end($file_type_temp);
        if($file_type == "png"){
            $path = "img/".$file_name;
            copy($file['tmp_name'], $path);
            $link = mysqli_connect('localhost', 'root', '', 'users');
            $res = mysqli_query($link, "INSERT INTO `user_data`(`login`, `password`, `photo`) VALUES ('".$login."','".$password."','".$path."')");
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            if($res){
                echo "Success";
            }
        }
        else{
            echo "Не png файл";
        }
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    Регистрация
    <form action="" method="post" enctype="multipart/form-data">
        <input placeholder="Логин" type="text" name="login" required>
        <input placeholder="Пароль" type="password" name="password" required>
        <input type="file" name="file" required>
        <input type="submit" name="submit">
    </form>

    <script src="main.js"></script>
</body>
</html>