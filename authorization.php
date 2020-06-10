<?php
    if($_COOKIE['auth'] == 'true') { //Получаем куки и проверяем авторизован ли пользователь
        header('Location: http://php-lesson.loc/index.php');  //Если авторизован, то перенаправляем на главную страницу
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

    $type = isset($_GET['type']); //Получаем тип запроса
                
    if($type == 'auth') { //Если тип запроса 'auth' тогда проверяем почту и пароль для авторизации пользователя
        $email = formastr($_GET['email']); //Получаем почту пользователя
        $password = formastr($_GET['password']); //Получаем пароль пользователя
        
		$result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '".$email."'"); //Выполняем запрос на получение информации о пользователе по почте

        $row = $result->fetch_assoc(); //Извлекаем массив с данными пользователя
   
	
		
		if ($row['password'] == $password) { //Проверяем сходится ли пароль из базы данных с паролем который ввел пользователь
			SetCookie("auth", "true"); //Устанавливаем куки что пользователь авторизован
			SetCookie("userid", $row['id']);
			SetCookie("useremail", $row['email']);
			SetCookie("username", $row['name']);
			header('Location: http://php-lesson.loc/index.php');  //Перенаправляем на главную страницу
		} else {
			$error_auth = 'Не правильная почта или пароль!'; //Если пароли не сошлись тогда выводим ошибку
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

        if($password == $password_re) {
            $insert = $mysqli->query("INSERT INTO `users` (`user_id`, `email`, `password`, `name`,`surname`) VALUES (NULL, '".$email."', '".$password."', '".$name."', '".$surname."')");
        } else {
            $error_reg = 'Пароли не сходятся';
        }
    } 
?>

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
                <input type="text" size="40" placeholder="Введите текст...">
                <button type="submit" class="button">Искать</button>
            </div>
            <div class="link-search-authorization param-left">
                <a href="#">Авторизация и Регистрация</a>

            </div>
        </div>
        <div class="wpap">
            <div class="blok-login param">

                <div class="authorization input-all">
                    <h4>Авторизация</h4><br>
                    <form method="GET">
                    <?php
                    if($error_auth != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_auth.'</p>'; //Выводим ошибку
                    }
                ?>
                        <input type="hidden"  name="type" value="auth">
                        <input type="text" placeholder="Логин" name="email">
                        <input type="password" placeholder="Пароль" name="password">
                        <input type="submit" class=" button button-authorization" value='Отправить'>
                    </form>
                </div>

                <div class="registration-all">
                    <div class="test">
                        <div class="registration input-all">

                            <h4>Регистрация</h4><br>
                        <form method="GET">    
                        <?php
                    if($error_reg != null) { //Проверяем есть ли у нас ошибка
                        echo '<p>'.$error_reg.'</p>'; //Выводим ошибку
                    }
                     ?>
                             <input type="hidden"  name="type" value="reg">
                            <input type="text" placeholder="Логин" name="login">
                            <input type="text" placeholder="Почта" name="email">
                            <input type="text" placeholder="Пароль" name="password">
                            <input type="text" placeholder="Номер телефона" name="tel">
                        </div>

                        <div class="registration param-left input-all">
                            <input type="text" placeholder="Имя" name="name">
                            <input type="text" placeholder="Фамилия" name="surname">
                            <input type="text" placeholder="Подтвердите пароль" name="password_re">
                            <input type="text" placeholder="Второй номер (необязательно)" name="tel2">
                        </div>
                    </div>
                            <input type="submit" class=" button param-left button-registration" value="Отправить">
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