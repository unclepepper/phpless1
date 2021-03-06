<?php

    if(isset($_COOKIE['auth']) == 'true') { //Получаем куки и проверяем авторизован ли пользователь
      header('Location: http://as-ps.ru/index.php');  //Если авторизован, то перенаправляем на главную страницу
    }
 
  
	function formastr($str) {
		$str = trim($str);
		$str = stripslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}
	
    $mysqli = new mysqli('localhost', 'root', '', 'blog'); //Создаем подключение к базе данных
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $error_auth = ''; //Текст ошибки для авторизации
    $error_reg = ''; //Текст ошибки для регистрации
    $success_auth = ''; 
    $success_reg = ''; 
 
 
    $type = $_GET['type']; //Получаем тип запроса

                
    if($type == 'auth') { //Если тип запроса 'auth' тогда проверяем почту и пароль для авторизации пользователя
       
        $email = formastr($_GET['email']); //Получаем почту пользователя
        $password = formastr($_GET['password']); //Получаем пароль пользователя
        if($email != NULL or $password != NULL){
            $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '".$email."'"); //Выполняем запрос на получение информации о пользователе по почте
            $row = $result->fetch_assoc(); //Извлекаем массив с данными пользователя
            //Проверяем сходится ли пароль из базы данных с паролем который ввел пользователь
                if( $row['email']==$email){
                    if ($row['password'] == $password) {
                    SetCookie("auth", "true",time()+3600,'/'); //Устанавливаем куки что пользователь авторизован
                    SetCookie("userid", $row['user_id'],time()+3600,'/');
                    SetCookie("useremail", $row['email'],time()+3600,'/');
                    SetCookie("username", $row['name'],time()+3600,'/');
                    SetCookie("usersurname", $row['surname'],time()+3600,'/');
                    // SetCookie("login", $row['login']);
                    header('Location: http://as-ps.ru/index.php');  //Перенаправляем на главную страницу
                     $success_auth = ' Пользователь ' .$email . ' авторизован!';
                } else {
                    $error_auth = 'Не правильная почта или пароль!'; //Если пароли не сошлись тогда выводим ошибку
                }
                }else {
                    $error_auth = 'Не правильная почта или пароль!'; //Если пароли не сошлись тогда выводим ошибку
                }
               
        }else{
            $error_auth = 'Введите хоть что-нибудь!';
        }
	
		
    }
    if($type == 'reg') {
       
            $email = $_GET['email']; //Получаем почту
            $login = $_GET['login']; //Получаем логин
            $password = $_GET['password']; //Получаем пароль
            $password_re = $_GET['password_re']; //Получаем пароль 2
            $tel = $_GET['tel']; //Получаем телефон
            $tel2 = $_GET['tel2']; //Получаем телефон 2
            $name = $_GET['name']; //Получаем имя
            $surname = $_GET['surname']; //Получаем фамилию
        if($email != '' and $password != '' ){
            if($password == $password_re) {
                $insert = $mysqli->query("INSERT INTO `users` (`user_id`, `email`, `password`, `name`,`surname`) VALUES (NULL, '".$email."', '".$password."', '".$name."', '".$surname."')");
                $success_reg = 'Пользователь '. $email . ' зарегистрирован!' ;
            } else {
                $error_reg = 'Пароли не сходятся';
            }
        
        }else {
            $error_reg = 'Введите хоть что-нибудь!';
        }
        
    } else{
        $error_reg = '';
        $success_reg = ''; 
    }
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        header('Location: /search.php?search='.$search);  
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Авторизация и регистрация</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>


    <body>
        <div class="top ">
            <div class="logo param"><span> Блог Пользователя</span></div>
            <div class="device-menu param-left">
                <div class="hidden-menu-wrap">
                    <div class="hidden-menu">
                        <div class="close"><img src="image/close.png" alt="close">
                        </div>
                        <ul>
                            <li><a href="page1.php">Статьи</a></li>
                            <li><a href="news.php">Новости</a></li>
                            <li><a href="">Обо мне</a></li>
                            <li><a href="authorization.php">Авторизация</a></li>
                            <li><a href="authorization.php">Регистрация</a></li>
                        </ul>
                    </div>
                </div>
                <!-- hidden-menu-wrap end... -->
            </div>
            <div class="nav param-left">
                <a href="index.php">Главная</a>
                <a href="page1.php">Статьи</a>
                <a href="news.php">Новости</a>
                <a href="#">Обо мне</a>
            </div>
        </div>
        <div class="search">
            <div class="window-search param">
            <form method="GET" class="form-search">
        <input type="text" size="40" placeholder="Введите текст..." name="search">
            <input type="submit" class="button" value="Искать" style="color:#fff;">
        </form>
        </div>
            </div>
            <div class="link-search-authorization param-left">
                <a href="#">Авторизация и Регистрация</a>

            </div>
        </div>
        <div class="wpap ">
            <div class="blok-login param param-form-left">

                <div class="authorization input-all ">
                    <h4>Авторизация</h4><br>
                    <form method="GET" class="param-form">
                    <?php
                    if($error_auth != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_auth.'</p>'; //Выводим ошибку
                    }
                    if($success_auth != null) { //Проверяем есть ли у нас автотизация
                        echo '<p>'.$success_auth.'</p>'; //Выводим сообщение
                    }
                   
                ?>
                        <input type="hidden"  name="type" value="auth">
                        <input type="text" placeholder="Логин" name="email">
                        <input type="password" placeholder="Пароль" name="password">
                        <input type="submit" class=" button " value='Отправить'>
                       

                    </form>
                </div>

                <div class="registration-all param-left">
                    <div class="test">
                        <div class="registration input-all">

                            <h4>Регистрация</h4><br>
                        <form method="GET" class="">    
                        <?php
                    if($error_reg != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_reg.'</p>'; //Выводим ошибку
                    }
                    if($success_reg != null) { //
                        echo '<p>'.$success_reg .'</p>'; //
                    }
                     ?>
                             <input type="hidden"  name="type" value="reg">
                            <input type="login" placeholder="Логин" name="login">
                            <input type="text" placeholder="Почта" name="email">
                            <input type="password" placeholder="Пароль" name="password">
                            <input type="text" placeholder="Номер телефона" name="tel">
                        </div>

                        <div class="registration input-all">
                            <input type="text" placeholder="Имя" name="name">
                            <input type="text" placeholder="Фамилия" name="surname">
                            <input type="password" placeholder="Подтвердите пароль" name="password_re">
                            <input type="text" placeholder="Второй номер (необязательно)" name="tel2">
                        </div>
                    </div>
                            <input type="submit" class=" button  button-registration" value="Отправить">
                    </form>
                </div>
                <!-- registration-all end... -->

            </div>


            <footer class="footer">
                <span class="param">2019 Все права защищены</span>
                <span class="param-left"></span>

            </footer>
            <script src="js/script.js"></script>
    </body>

    </html>