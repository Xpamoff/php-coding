<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', '', 'users');
    if(isset($_SESSION['password'])){
        $res_temp = mysqli_query($link, "SELECT `photo` FROM `user_data` WHERE `login`='".$_SESSION['login']."' AND `password`='".$_SESSION['password']."'");
        if($res_temp){
            $res = mysqli_fetch_array($res_temp);
            echo '<img src="'.$res['photo'].'" alt="Аватар">';
        }
    }
?>

</body>
</html>
