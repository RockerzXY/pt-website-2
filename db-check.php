<?php
$link = mysqli_connect('127.0.0.1', 'root', 'debian', 'first');
if (!$link) {
    die("Ошибка соединения: " . mysqli_connect_error());
}
echo 'Good!';
mysqli_close($link);
?>

