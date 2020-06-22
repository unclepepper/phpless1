<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
     $mysqli = new mysqli('localhost', 'root', '', 'blog'); //Создаем подключение к базе данных
     $mysqli->set_charset("utf8");
     if ($mysqli->connect_errno) {
         echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
     }
     if(isset($_GET['exit'])){
        $exit = $_GET['exit'];
     }
    
  
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог Пользователя</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <li><a href="authorization.php">вторизация</a></li>
                        <li><a href="authorization.php">Регистрация</a></li>
                              
                       
                    </ul>
                </div>
            </div>
            <!-- hidden-menu-wrap end... -->
        </div>
        <div class="nav param-left">
            <a href="#">Главная</a>
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
        <div class="link-search param-left">
                          <?php
                                if(isset($_COOKIE['auth']) == 'true') {//Получаем куки и проверяем авторизован ли пользователь
                                    $auth =  $_COOKIE['auth'];
                                $userid = $_COOKIE['userid'];
                                $useremail = $_COOKIE['useremail'];
                                $username = $_COOKIE['username'];
                                $usersurname = $_COOKIE['usersurname'];?>
                                <div class='user'>
                                <h5><?php echo $username . ' ' .  $usersurname ?></h5>
                                <form method="$_GET">
                                    <input type="hidden" name='exit' value='ok'>
                                <input type='submit' value='Выйти' class='exit'>
                                </form>
                                <?php  if($exit == 'ok' ){
                                   
                                   include './logout.php';
                                         } ?>
                                </div>
                               
                               <?php  }else {?>
            <a href="authorization.php">Авторизация</a>
            <a href="authorization.php">Регистрация</a>
            <?php  } ?>
        </div>
    </div>
    <div class="wrap ">
        <div class="param  main">
       
            <div class="content-top-left">
            <?php
          $result = $mysqli->query("SELECT  * FROM `news` ORDER BY `news_id` DESC  LIMIT 0,2"); 
                    foreach($result as $res){ 
                        
                    ?>
                <div class="head">
                    
                    <h3><?php echo $res['title']; ?></h3>
                    <?php 
                    setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
                                $time = strtotime($res['created']);
                                $newstime = strftime("%d %B %y",$res['created']);
                                $time = iconv('windows-1251', 'utf-8', $newstime);
                                ?>
                   <span><?php echo $time; ?></span>
               
                </div>
                <p>
                    
                <?php 
                
                    echo $res['desc_small'];
                
                ?>
                </p>
                <div class="content-foot">
                    <div class="content-foot-left">
                        <span>Просмотры: 300</span>
                        <span>Лайки: 100</span>
                    </div>
                   
                        <div class=but>
                        
                        <?php
                        $admin = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = '".$userid."'");
                        $is_admin = $admin->fetch_assoc();
                       
                        if($is_admin['is_admin']==1) {
                            ?><a href="/page1.php?id=<?php echo $res['news_id'] ?>" class="button inp-but">Удалить </a>
                       <?php }else{ ?>
                           <div style="width:50px;"></div>
                       <?php } ?>
                       <a href="/page1.php?id=<?php echo $res['news_id'] ?>" class="button inp-but inp-but-read" >Читать </a>

                        </div>
                       

                   
                   
                </div>
                <?php } ?>
            </div>
            
           
            <!-- content top -->
            <div class="image"></div>
            <div class="content-bottom">
           
            <?php
          $result = $mysqli->query("SELECT * FROM news  ORDER BY news_id DESC LIMIT 2,2 "); 
                          
                    foreach($result as $res){ 
                        
                    ?>
                <div class="head">  
                <h3><?php echo $res['title']; ?></h3>
                    <?php 
                    setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
                                $time = strtotime($res['created']);
                                $newstime = strftime("%d %B %y",$res['created']);
                                $time = iconv('windows-1251', 'utf-8', $newstime);
                                ?>
                   <span><?php echo $time; ?></span>
                </div>

                <p>
                <?php 
              
                    echo $res['desc_small']; 
               ?>
                </p>
                <div class="content-foot">
                    <div class="content-foot-left">
                        <span>Просмотры: 300</span>
                        <span>Лайки: 100</span>
                    </div>
                    <div class=but>
                       
                    <?php
                        $admin = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = '".$userid."'");
                        $is_admin = $admin->fetch_assoc();
                       
                        if($is_admin['is_admin']==1) {
                            ?><a href="/page1.php?id=<?php echo $res['news_id'] ?>" class="button inp-but">Удалить </a>
                       <?php }else{ ?>
                           <div style="width:50px;"></div>
                       <?php } ?>
                       <a href="/page1.php?id=<?php echo $res['news_id'] ?>" class="button inp-but inp-but-read" >Читать </a>
                        </div>
                      
                    
                       
                </div>
                <?php } ?> 
            </div> 
           
        </div>
        <!-- main end -->
      
        <div class="site-bar param param-left">
            <div class="content-top-right">
                <h3 class="content-top-right-alig">Разделы</h3>
                <span class="content-top-right-alig">Статьи</span>
                <ul>
                    <li><a href="page1.php">Статья 1</a></li>
                    <li><a href="page1.php">Статья 2</a></li>
                    <li><a href="page1.php">Статья 3</a></li>
                    <li><a href="page1.php">Статья 4</a></li>
                    <li><a href="page1.php">Статья 5</a></li>
                    <li><a href="page1.php">Статья 5.1</a></li>
                </ul>
                <span class="content-top-right-alig">Новости</span>
                <ul>
                    <li><a href="news.php">Новость 1</a></li>
                    <li><a href="news.php">Новость 2</a></li>
                    <li><a href="news.php">Новость 3</a></li>
                    <li><a href="news.php">Новость 3.1</a></li>


                </ul>
            </div>
            <!-- content-top-right end... -->
        </div>



    </div>
    <footer class="footer">
        <span class="param">2019 Все права защищены</span>
        <span class="param-left">Разаработик</span>

    </footer>
    <script src="js/script.js"></script>
</body>

</html>