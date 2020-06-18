<?php
 
     $mysqli = new mysqli('localhost', 'root', '', 'blog'); //Создаем подключение к базе данных
    //  $mysqli->set_charset("utf8");
     if ($mysqli->connect_errno) {
         echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
     }
     $comment = $_GET['comment'];
     $news_id = $_GET['id'];
     $news_id = (int)$news_id;
     $result = $mysqli->query("SELECT * FROM `news` WHERE `news_id` = '".$news_id."'"); 
     $row = $result->fetch_assoc(); //Извлекаем массив с данными 
     

     $success_com = '';
     if($_COOKIE['auth'] == 'true') { //Получаем куки и проверяем авторизован ли пользователь
         $userid = $_COOKIE['userid'];
        $useremail = $_COOKIE['useremail'];
        $username = $_COOKIE['username'];
        $usersurname = $_COOKIE['usersurname'];
            if($comment != NULL ){
                $insert = $mysqli->query("INSERT INTO `comments` (`comment_id`, `news_id`, `user_created`, `comment`,`created`) VALUES (NULL, '".$news_id."', '".$userid."', '".$comment."', '".$created."')");
                $resul = $mysqli->query("SELECT * FROM `comments` WHERE `comment` = '".$comment."'");
               
                    $success_com = 'Комментарий успешно добавлен!';
               
            }else if(isset($comment)){
                $success_com = 'Напишите свой комментарий!';
            }
      
      
     }
    
   
     
    
   
    
       
     

                    
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
            <a href="#">Статьи</a>
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
    <div class="wrap">
        <div class="main param">
            <div class="content-top-left">
            
                <div class="head">
                <?php 
                    setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
                    //$time = strtotime($res['created']);
                    $newstime = strftime("%d %B %y",$row['created']);
                    $time = iconv('windows-1251', 'utf-8', $newstime);
                    ?>
                
                    <h3><?php echo $row['title'];?></h3>
                      
              
                    <span><?php echo $time;?></span>
                </div>
                <p>
                <?php 
              
                    echo $row['desc_large'];
               
                ?>
                </p>
                

                <div class="content-foot">
                    <div class="content-foot-left">
                        <span>Просмотры: 300</span>
                    </div>
                    <span>Лайки: 100</span>
                </div>
                <div class="comment">
                    <h3>Комментарии</h3>
                    <?php  $com = $mysqli->query("SELECT  * FROM `comments` WHERE `news_id` = '".$news_id."'"); 
                           foreach($com as $res){ 
                        
                            ?>
                    <section class="blok1">
                        <div class="head-comment">
                            <div>
                                <div class="avatar"></div>
                            </div>
                            <div class="comment-content">
                         
                                <h4><?php echo $res['user_created']?></h4>
                                <p><?php echo $res['comment']?></p>
                            </div>
                        </div>
                    </section>
                           <?php } ?>
                    <!-- section class blok1 end -->
                    <!-- <section class="blok1">
                        <div class="head-comment">
                            <div>
                                <div class="avatar"></div>
                            </div>
                            <div class="comment-content">
                                <h4>Иванов Иван</h4>
                                <p>Не следует, однако забывать, что новая модель организационной деятельности влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности
                                    же сложившаяся струкрура организации в значительной степени обуславливает создание соответствующих условий активации Товарищи! укрепление и развитие структуры играет важную роль в формировании форм развития.</p>
                            </div>
                        </div>
                    </section>
                    <section class="blok1">
                        <div class="head-comment">
                            <div>
                                <div class="avatar"></div>
                            </div>
                            <div class="comment-content">
                                <h4>Иванов Иван</h4>
                                <p>Не следует, однако забывать, что новая модель организационной деятельности влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности
                                    же сложившаяся струкрура организации в значительной степени обуславливает создание соответствующих условий активации Товарищи! укрепление и развитие структуры играет важную роль в формировании форм развития.</p>
                            </div>
                        </div>
                    </section>
                    <section class="blok1">
                        <div class="head-comment">
                            <div>
                                <div class="avatar"></div>
                            </div>
                            <div class="comment-content">
                                <h4>Иванов Иван</h4>
                                <p>Не следует, однако забывать, что новая модель организационной деятельности влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности
                                    же сложившаяся струкрура организации в значительной степени обуславливает создание соответствующих условий активации Товарищи! укрепление и развитие структуры играет важную роль в формировании форм развития.</p>
                            </div>
                        </div>
                    </section> -->
                    <div class="textarea">
                      
                       <?php
                        if($_COOKIE['auth'] == true){ ?>
                          <h4><?php echo  $username . " " .$usersurname .'!   Добавьте пожалуйста свой комментарий!';
                          ?></h4>
                          <h5><?php if(success_com != NULL)echo  $success_com;
                          ?></h5>
                          <form method="$_GET">
                            <input type="hidden" name ="id" value="<?php echo  $news_id; ?>">
                            <input type="hidden" name ="user" value="<?php echo $userid ; ?>">

                            <textarea name="comment"  cols="30" rows="10"></textarea>
                            <input type="submit" name="" class="button inp-but" value="Добавить" >
                        </form>
                          <?php }else { ?>
                            <h4><?php echo ' Комментарии могут оставлять только зарегистрированные пользователи!';
                          ?></h4>
                          <?php } ?>
                        
                    
                    </div>
                </div>
            </div>
            <!-- content-top end... -->

        </div>
        <!-- main end... -->
        <div class="site-bar param param-left">
            <div class="content-top-right page ">
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
        </div>

    </div>
    <footer class="footer">
        <span class="param">2019 Все права защищены</span>
        <span class="param-left"></span>

    </footer>
    <script src="js/script.js"></script>
</body>

</html>