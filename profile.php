<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <title>Profile</title>
</head>
<body>
    <div class="container my-5">
        <div class="row my-4">
            <div class="col-md-6 text-center">
                <h1>Алешин А.Е. <i class="bi bi-umbrella"></i></h1>
                <img src="media/homyak.png" alt="Моя фотография, честно-честно" class="img-fluid rounded-circle photo">
                <p class="lead">Я Андрей и потихоньку продвигаюсь в ИБ.</p>
                <h4>Навыки:</h4>
                <ul class="text-left">
                    <li>Анализ рисков</li>
                    <li>Управление инцидентами - создаю их сам</li>
                    <li>Шифрование данных (желательно без бэкапов)</li>
                    <li>Настройка брандмауэров - запретить все входящие?</li>
                </ul>
                <button class="toggle-btn" id="toggleButton">Показать картинку</button>
                <img src="media/homyak-2.jpg" alt="Картинка" class="image-to-toggle" id="toggleImage" style="display:none;">
                <div class="text-center my-3">
                    <h4>Они уже следят за мной</h4>
                    <a href="#" class="btn btn-outline-primary m-1"><i class="bi bi-github"></i> Github</a>
                    <a href="#" class="btn btn-outline-info m-1"><i class="bi bi-telegram"></i> Telegram</a>
                    <a href="#" class="btn btn-outline-danger m-1"><i class="bi bi-umbrella"></i> Клуб масонов</a>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
                <h2>Написать пост</h2>
                <form class="form-align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form-control mb-2" name="title" placeholder="Заголовок поста" required>
                    <textarea name="text" class="form-control mb-2" cols="30" rows="10" placeholder="Введите текст поста..." required></textarea>
                    <input type="file" class="form-control mb-2" name="file" accept="image/*">
                    <button type="submit" class="btn btn-danger" name="submit">Сохранить пост</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const button = document.getElementById('toggleButton');
        const image = document.getElementById('toggleImage');
        
        button.addEventListener('click', function () {
            if (image.style.display === 'none' || image.style.display === '') {
                image.style.display = 'block';
                button.textContent = 'Скрыть картинку';
            } else {
                image.style.display = 'none';
                button.textContent = 'Показать картинку';
            }
        });
    </script>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'debian', 'first');
if (!$link) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die("Заполните все поля");

    $image_path = '';
    
    if (!empty($_FILES["file"])) {
        if ((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png")
            && (@$_FILES["file"]["size"] < 1024000)) 
        {   
            $file_name = time() . "_" . basename($_FILES["file"]["name"]);
            $target_file = "media/upload/" . $file_name;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
                echo "Загружено в: " . $target_file;
            } else {
                echo "Загрузка не удалась";
            }
        } else {
            echo "Неверный формат файла или превышен размер";
        }
    }

    $sql = "INSERT INTO posts (title, main_text, image_path) VALUES ('$title', '$main_text', '$image_path')";
    if (!mysqli_query($link, $sql)) {
        die("Не удалось добавить пост");
    }
}

mysqli_close($link);
?>