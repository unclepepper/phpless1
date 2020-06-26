<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
function formastr($str) {
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlspecialchars($str);
    return $str;
}
   
    $error_reg = ''; //Текст ошибки для регистрации
    $success_reg = ''; 

    $mysqli = new mysqli('localhost', 'root', '', 'blog');
    if(isset($_GET['type'])){
        if($_GET['type'] == 'reg') {
       
            $email = $_GET['email']; //Получаем почту
            $login = $_GET['login']; //Получаем логин
            $password = $_GET['password']; //Получаем пароль
            $name = $_GET['name']; //Получаем имя
            $surname = $_GET['surname']; //Получаем фамилию
        if($email != '' and $password != '' ){
           
                $insert = $mysqli->query("INSERT INTO `users` (`user_id`, `email`, `password`, `name`,`surname`) VALUES (NULL, '".$email."', '".$password."', '".$name."', '".$surname."')");
                $success_reg = 'Пользователь '. $email . ' зарегистрирован!' ;
             
        
        }else {
            $error_reg = 'Введите хоть что-нибудь!';
        
        }
    }
    }


  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый пользователь</title>

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
                        <li><a href="users.php">Пользователи</a></li>
                        <li><a href="news.php ">Новости</a></li>
                        <li><a href="#">Настройка сайта</a></li>
                        <li><a href="index.php">Главная</a></li>
                    </ul>
                </div>
            </div>
            <!-- hidden-menu-wrap end... -->
        </div>
        <div class="nav param-left">
            <a href="users.php">Пользователи</a>
            <a href="news.php">Новости</a>
            <a href="#">Настройка сайта</a>
            <!-- <a href="#">Обо мне</a> -->
        </div>
    </div>

    <div class="wrap-news">
    <?php if($success_reg != null){
               echo ' <h3>'.$success_reg.'</h3>';
           }else if($error_reg != null){
            echo ' <h3>'.$error_reg.'</h3>';
           }else{?>
        <h3>Новый пользователь</h3>
           <?php } ?>
        <div class="wrap-news-user">
            <div class="input-news-user param-news">
          
            <form method="GET">
               <input type="hidden"  name="type" value="reg">
                <input type="text" placeholder="Имя" name="name" class="input-news-all">
                <input type="login" placeholder="Логин" name="login" class="input-news-all">
                <input type="password" placeholder="Пароль" name="password" class="input-news-all">
            </div>
            <div class="input-news-user param-news">
                <input type="text" placeholder="Фамилия" name="surname" class="input-news-all">
                <input type="email" placeholder="Почта" name="email" class="input-news-all">
                <input type="submit" class="button button-news" value="Добавить">
                </form>
            </div>
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