<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
$mysqli = new mysqli('localhost', 'root', '', 'blog');

if(isset($_COOKIE['auth']) == 'true') {//Получаем куки и проверяем авторизован ли пользователь
    $auth =  $_COOKIE['auth'];
    $userid = $_COOKIE['userid'];
    $useremail = $_COOKIE['useremail'];
    $username = $_COOKIE['username'];
    $usersurname = $_COOKIE['usersurname'];
}
$admin = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = '".$userid."'");
$is_admin = $admin->fetch_assoc();

$result = $mysqli->query("SELECT  * FROM `users`");
$success_reg = ''; 
// $result = $mysqli->query("SELECT * FROM news  ORDER BY news_id DESC LIMIT 2,2 "); 
if($is_admin['is_admin']==1) { 
if(isset($_GET['delete'])){
    if($_GET['delete']=='yes'){
        $user_id=$_GET['user'];
        $mysqli->query("DELETE  FROM `users` WHERE `user_id` = '".$user_id."'");
        $success_del = 'Пользователь удален!'; 
        header('location:users.php');
    }
}

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
       <?php if( $success_del != null ){
            echo '<h3>'.$success_del.'</h3>'; 
        }else{?>
        <h3>Пользователи сайта</h3>
        <?php } ?>
        <table align="center" border="2" width="90%" >
        <tr><td>Фамилия</td><td>Имя</td><td>email</td><td>Логин</td><td>Статус</td></tr>
       <?php foreach($result as $res){ ?> 
               <tr><td>
               <?php if($is_admin['is_admin']==1) {?>
               <a href='users.php?delete=yes&user=<?php echo $res['user_id']; ?>' class='delete' title="удалить пользователя  <?php echo $res['email']; ?> ?"><img src='image/close1.png' width='20'></a>
               <?php }?>
                <?php echo $res['surname']; ?></td><td><?php echo $res['name']; ?></td><td><?php echo $res['email']; ?></td><td><?php echo $res['email']; ?></td><td>
                <?php if($res['is_admin']==1){echo 'admin';}else{echo 'пользователь';} ?></td></tr>
        
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