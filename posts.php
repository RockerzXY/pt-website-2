<?php
$link = mysqli_connect('127.0.0.1', 'root', 'debian', 'first');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
$image_path = $rows['image_path'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $title; ?></h1>
                <hr>
                <p class="post-text" style="text-align: left;"><?php echo $main_text; ?></p>
                <?php if ($image_path): ?>
                    <img src="<?php echo $image_path; ?>" alt="Изображение в посте" class="img-fluid">
                <?php endif; ?>
                <hr>
                <a href="/" class="btn btn-outline-primary">На главную</a>
            </div>
        </div>
    </div>
</body>
</html>
