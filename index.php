<?php
     $mysqli = new mysqli('localhost', 'root', '', 'blog'); //Создаем подключение к базе данных
     $mysqli->set_charset("utf8");
     if ($mysqli->connect_errno) {
         echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
     }
    //  $result = $mysqli->query("SELECT * FROM `news` ORDER BY news_id DESC LIMIT 3"); 
 
    //  $row = $result->fetch_assoc(); //Извлекаем массив с данными 
     
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
                        <li><a href="authorization.php">Авторизация</a></li>
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
            <a href="authorization.php">Авторизация</a>
            <a href="authorization.php">Регистрация</a>
        </div>
    </div>
    <div class="wrap ">
        <div class="param  main">
       
            <div class="content-top-left">
            <?php
          $result = $mysqli->query("SELECT  * FROM `news` ORDER BY `news_id` DESC  LIMIT 2"); 
                    foreach($result as $res){ 
                        
                    ?>
                <div class="head">
                    
                    <h3><?php echo $res['title']; ?></h3>
                    <?php 
                    setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
                                //$time = strtotime($res['created']);
                                $newstime = strftime("%d %B %y",$res['created']);
                                $time = iconv('windows-1251', 'utf-8', $newstime);
                                ?>
                   <span><?php echo $time; ?></span>
               
                </div>
                <p>
                    
                <?php 
                
                    echo $res['desc_large'];
                
                ?>
                </p>
                <div class="content-foot">
                    <div class="content-foot-left">
                        <span>Просмотры: 300</span>
                        <span>Лайки: 100</span>
                    </div>
                   

                    <a href="/page1.php?id=<? echo $res['news_id'] ?>" class="button inp-but" >Читать </a>
                   
                   
                </div>
                <?php } ?>
            </div>
            
           
            <!-- content top -->
            <div class="image"></div>
            <div class="content-bottom">
            <?php
          $result = $mysqli->query("SELECT * FROM news  ORDER BY news_id DESC LIMIT 1 "); 
                                    
                    foreach($result as $res){ 
                        
                    ?>
                <div class="head">
                <h3><?php echo $res['title']; ?></h3>
                    <?php 
                    setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
                                //$time = strtotime($res['created']);
                                $newstime = strftime("%d %B %y",$res['created']);
                                $time = iconv('windows-1251', 'utf-8', $newstime);
                                ?>
                   <span><?php echo $time; ?></span>
                </div>

                <p>
                <?php 
                $type = isset($_GET['type']);
                if($type == 'read'){
                    echo $res['desc_large'];
                }else{
                    echo $res['desc_small']; 
                }
                ?>
                </p>
                <div class="content-foot">
                    <div class="content-foot-left">
                        <span>Просмотры: 300</span>
                        <span>Лайки: 100</span>
                    </div>
                    <a href="/page1.php?id=<? echo $res['news_id'] ?>" class="button inp-but" >Читать </a>
                </div>
                       
            </div> 
            
        </div>
        <!-- main end -->
        <?php } ?>
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