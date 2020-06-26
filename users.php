<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
$mysqli = new mysqli('localhost', 'root', '', 'blog');
// $count = $mysqli->query("SELECT  COUNT (*) FROM `users` ");
 $result = $mysqli->query("SELECT  * FROM `users` ORDER BY `name`");
// $row = $result->fetch_assoc(); 




for($i=0;$i<=$count; $i++){
    // echo $i;
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
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
        <h3>Пользователи сайта</h3>
        <table align="center" border="2" width="90%" >
        <tr><td>Фамилия</td><td>Имя</td><td>email</td><td>Логин</td><td>тел 1</td></tr>
       <?php foreach($result as $res){ ?> 
               <tr><td> <?php echo $res['surname']; ?></td><td><?php echo $res['name']; ?></td><td><?php echo $res['email']; ?></td><td><?php echo $res['email']; ?></td><td><?php echo $res['mobile']; ?></td></tr>
        
            <?php } ?>
        </table>
    </div>
    <!-- wrap end... -->
    <footer class="footer">
        <span class="param">2019 Все права защищены</span>
        <span class="param-left"></span>

    </footer>
    <script src="js/script.js"></script>
</body>

</html>