<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/normalize.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <div class="top ">
        <div class="logo param"><a href="index.php"> Блог Пользователя</a></div>
        <div class="device-menu param-left">
            <div class="hidden-menu-wrap">
                <div class="hidden-menu">
                    <div class="close"><img src="image/close.png" alt="close">
                    </div>
                    <ul>
                        <li><a href="new_user.php">Пользователи</a></li>
                        <li><a href="news.php">Новости</a></li>
                        <li><a href="#">Настройка сайта</a></li>
                        <li><a href="index.php">Главная</a></li>
                    </ul>
                </div>
            </div>
            <!-- hidden-menu-wrap end... -->
        </div>
        <div class="nav param-left">
            <a href="new_user.php">Пользователи</a>
            <a href="news.php">Новости</a>
            <a href="#">Настройка сайта</a>
            <!-- <a href="#">Обо мне</a> -->
        </div>
    </div>

    <div class="wrap-news">
        <h3>Новая новость</h3>
        <div class="input-news param-news">
            <input type="text" placeholder="Название" class="input-news-all">
            <input type="text" placeholder="Название на английском" class="input-news-all">
        </div>
        <div class="textarea-news-little param-news">
            <textarea name="textarea-news-little" id="" cols="30" rows="10" placeholder="Краткая новость" class=" input-news-all "></textarea>
        </div>
        <div class="textarea-news-big param-news">
            <textarea name="textarea-news-big" id="" cols="30" rows="10" placeholder="Полная новость" class="input-news-all"></textarea>
        </div>
        <div class="input-news param-news input-news-bottom">
            <input type="text" placeholder="Дата публикации" class="input-news-all">
            <input type="text" placeholder="Автор" class="input-news-all">
        </div>
    </div>

    <!-- wrap end... -->
    <footer class="footer">
        <span class="param">2019 Все права защищены</span>
        <span class="param-left"></span>

    </footer>
    <script src="js/script.js"></script>
</body>

</html>