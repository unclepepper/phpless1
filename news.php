<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
$mysqli = new mysqli('localhost', 'root', '', 'blog'); // Создаем подключение к базе данных
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $message = '';
  

    $type = isset($_POST['type']); //Получаем тип запроса
    if($type == 'news'){
        $title = $_POST['title'];
        $title_english = $_POST['title_english'];
        $desc_small = $_POST['desc_small'];
        $desc_large = $_POST['desc_large'];
        $date = $_POST['date'];
        $author = $_POST['author'];
    }
    if($type == 'news'){
         if($title != NULL and $desc_large !=NULL and $author !=NULL){
            $insert = $mysqli->query("INSERT INTO `news` (`news_id`, `title`, `desc_small`, `desc_large`,`created`,`user_created`) VALUES (NULL, '".$title."', '".$desc_small."', '".$desc_large."', '".$date."', '".$author."')");   
            $message = 'Новость '.' "'. $title .'" '. ' успешно опубликована!' ;
         }  else{
            $message = ' Заполните все поля';
          
         }     
    }
   
   
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="ru">

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
      <?php if($message != NULL){ echo '<h3>'.$message.'</h3>';} ?>
        <form method="POST" class="form-news">
        <input type="hidden"  name="type" value="news">
        <div class="input-news param-news">
            <input type="text" name="title" placeholder="Название" class="input-news-all">
            <input type="text" name="title_english" placeholder="Название на английском" class="input-news-all">
        </div>
        <div class="textarea-news-little param-news">
            <textarea name="desc_small" id="" cols="30" rows="10" placeholder="Краткая новость" class=" input-news-all "></textarea>
        </div>
        <div class="textarea-news-big param-news">
            <textarea name="desc_large" id="" cols="30" rows="10" placeholder="Полная новость" class="input-news-all"></textarea>
        </div>
        <div class="input-news param-news input-news-bottom">
            <input type="datetime-local" name="date" placeholder="Дата публикации" class="input-news-all">
            <input type="text" name="author" placeholder="Автор" class="input-news-all">
           
        </div>
        <input type="submit" value=" Создать новость" class="button param button-news">
        </form>
       
    </div>
    <!-- wrap end... -->
    <footer class="footer">
        <span class="param">2019 Все права защищены</span>
        <span class="param-left"></span>

    </footer>
    <script src="js/script.js"></script>
</body>

</html>