<?php
$link = mysqli_connect('db', 'root', 'admin', 'site');
if (!$link) {
    die("Ошибка соединения: " . mysqli_connect_error());
}
echo 'Good!';
mysqli_close($link);
?>

