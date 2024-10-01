<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алешин А.Е.</title>
    <link rel="icon" href="media/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoTi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Регистрация</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="registration.php">
                    <div class="row form__reg"><input class="form" type="email" name="email" placeholder="Email"></div>
                    <div class="row form__reg"><input class="form" type="text" name="login" placeholder="Login"></div>
                    <div class="row form__reg"><input class="form" type="password" name="password" placeholder="Password"></div>
                    <button type="submit" class="btn_red btn__reg" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', 'admin', 'site');
if (!$link) {
    die("Ошибка соединения: " . mysqli_connect_error());
}


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $pass = $_POST['password'];

    if (!$email || !$username || !$pass) die("Пожалуйста, введите все значения");

    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$pass')";

    if (!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
        exit;
    }
    header("Location: login.php");
    mysqli_close($link);
    exit;
}
?>

