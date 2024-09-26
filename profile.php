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
    <div class="container my-5">
        <h1 class="text-center">Алешин А.Е. <i class="bi bi-umbrella"></i></h1>
        <div class="row my-4">
            <div class="col-4 text-center">
                <img src="media/homyak.png" alt="Моя фотография, честно-честно" class="img-fluid rounded-circle photo">
            </div>
            <div class="col-8">
                <p class="lead">Я Андрей и потихоньку продвигаюсь в ИБ.</p>
                <h4>Навыки:</h4>
                <ul>
                    <li>Анализ рисков</li>
                    <li>Управление инцидентами - создаю их сам</li>
                    <li>Шифрование данных (желательно без бэкапов)</li>
                    <li>Настройка брандмауэров - запретить все входящие?</li>
                </ul>
                <button class="toggle-btn" id="toggleButton">Показать картинку</button>
                <img src="media/homyak-2.jpg" alt="Картинка" class="image-to-toggle" id="toggleImage">
            </div>
        </div>
        <div class="text-center">
            <h4>Они уже следят за мной</h4>
            <a href="#" class="btn btn-outline-primary m-1"><i class="bi bi-github"></i> Github</a>
            <a href="#" class="btn btn-outline-info m-1"><i class="bi bi-telegram"></i> Telegram</a>
            <a href="#" class="btn btn-outline-danger m-1"><i class="bi bi-umbrella"></i> Клуб масонов</a>
        </div>
    </div>

    <script>
        const button = document.getElementById('toggleButton');
        const image = document.getElementById('toggleImage');
        
        button.addEventListener('click', function () {
            if (image.style.display === 'none') {
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