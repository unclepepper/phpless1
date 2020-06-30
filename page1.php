<?php
    
     $mysqli = new mysqli('localhost', 'root', '', 'blog'); //Создаем подключение к базе данных
    //  $mysqli->set_charset("utf8");
     if ($mysqli->connect_errno) {
         echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
     }
     $delete = $_GET['delete'];
     $comment_id = $_GET['comment_id'];
     $catid = $_GET['catid'];
     if(isset($_GET['exit'])){
        if ($_GET['exit']=='ok'){
            unset($_COOKIE['auth']);
        SetCookie("auth", "", time()-3600); 
        unset($_COOKIE['username']);
        SetCookie("username", "", time()-3600); 
        unset($_COOKIE['useremail']);
        SetCookie("useremail", "", time()-3600); 
        unset($_COOKIE['userid']);
        SetCookie("userid", "", time()-3600); 
        unset($_COOKIE['usersurname']);
        SetCookie("usersurname", "", time()-3600); 
        }
     }
     $comment = $_GET['comment'];
     $news_id = $_GET['id'];
     if(isset($catid)){
        $result = $mysqli->query("SELECT * FROM `news` WHERE `catid` = '".$catid."'");
       
     }else{
        $news_id = (int)$news_id;
        $result = $mysqli->query("SELECT * FROM `news` WHERE `news_id` = '".$news_id."'");
        
     }
     

    //  $row = $result->fetch_assoc(); //Извлекаем массив с данными 
     

     $success_com = '';
   
     if(isset($_COOKIE['auth']) == 'true') { //Получаем куки и проверяем авторизован ли пользователь
         $userid = $_COOKIE['userid'];
        $useremail = $_COOKIE['useremail'];
        $username = $_COOKIE['username'];
        $usersurname = $_COOKIE['usersurname'];
            if($comment != NULL ){
                $insert = $mysqli->query("INSERT INTO `comments` (`comment_id`, `news_id`, `user_created`, `comment`,`created`) VALUES (NULL, '".$news_id."', '".$userid."', '".$comment."', '".$created."')");
               // $resul = $mysqli->query("SELECT * FROM `comments` WHERE `comment` = '".$comment."'");
               
                    $success_com = 'Комментарий добавлен!';
                    header('Location: /page1.php?id='. $news_id . '#comment');
            }else if(isset($comment)){
                $success_com = 'Напишите комментарий!';
            }     
     }
   if($delete='ok'){
        $mysqli->query("DELETE  FROM `comments` WHERE `comment_id` = '".$comment_id."'");
        
      }   
      
      if(isset($_GET['search'])){
        $search = $_GET['search'];
        header('Location: /search.php?search='.$search);  
    }              
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статьи</title>
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
        <form method="GET" class="form-search">
            <input type="text" size="40" placeholder="Введите текст..." name="search">
            <input type="submit" class="button" value="Искать" style="color:#fff;">
        </form>
        </div>
        <div class="link-search param-left">
        <?php
                                if(isset($_COOKIE['auth']) == 'true') { //Получаем куки и проверяем авторизован ли пользователь
                                $userid = $_COOKIE['userid'];
                                $useremail = $_COOKIE['useremail'];
                                $username = $_COOKIE['username'];
                                $usersurname = $_COOKIE['usersurname'];
                                ?>
                                <div class='user'>
                                <h5><?php echo $username . ' ' .  $usersurname ?></h5>
                                <form method="$_GET">
                                    <input type="hidden" name='exit' value='ok'>
                                    <input type='submit' value='Выйти' class='exit'>
                                </form>
                              
                                </div>
                               
                               <?php  }else {?>
            <a href="authorization.php">Авторизация</a>
            <a href="authorization.php">Регистрация</a>
            <?php  } ?>
        </div>
    </div>
    <div class="wrap">
        <div class="main param">
            <div class="content-top-left">
            
                <div class="head">
                <?php 
                foreach($result as $row){
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
                            $usres = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = '".$res['user_created']."'");
                            foreach($usres as $rus){ 
                                if( $rus['user_id']== $res['user_created']){
                                    $name = $rus['name'];
                                    $surname = $rus['surname'];

                                }else {echo 'no name';
                                }
                            }
                        
                            ?>
                    <section class="blok1">
                    <?php
                        $admin = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = '".$userid."'");
                        $is_admin = $admin->fetch_assoc();
              
                        if($is_admin['is_admin']==1) { ?>
                       
                    <a href="/page1.php?delete=ok&id=<?php echo $res['news_id'] ?>&comment_id=<?php echo $res['comment_id'] ?>" class="close-comment"><img src="image/close1.png" alt="close" width="20" title="delete"></a>
                            
                            
                       <?php  } ?>
                        <div class="head-comment">
                       
                            <div class="avatar-block">
                         
                                <div class="avatar"></div>
                               
                               
                            </div>

                            <div class="comment-content" id='comment'>
                         
                                <h4><?php echo $name . ' ' . $surname?></h4>
                                <p><?php echo $res['comment']?></p>
                            </div>
                        </div>
                    </section>
                           <?php } ?>
                 
                    <div class="textarea">
                      
                       <?php
                        if($_COOKIE['auth'] == true){ ?>
                          <h4><?php echo  $username . " " .$usersurname .'!   Добавьте пожалуйста свой комментарий!';
                          ?></h4>
                          <h5><?php if(success_com != NULL){
                              echo  $success_com;
                             
                            }
                          ?></h5>
                          <form method="$_GET">
                            <input type="hidden" name ="id" value="<?php echo  $news_id; ?>">
                            <input type="hidden" name ="user" value="<?php echo $userid ; ?>">

                            <textarea name="comment" cols="30" rows="10"></textarea>
                        
                            <input type="submit" name="" class="button inp-but" value="Добавить" >
                          
                        </form>
                          <?php }else { ?>
                            <h4><?php echo 'Авторизируйтесь пожалуйста!';
                          ?></h4>
                          <?php } ?>
                          
                    
                    </div>
                    <?php } ?>
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
                <?php
                         $category = $mysqli->query("SELECT * FROM `category`");
                         foreach($category as $cat){  ?>
                            <li><a href="page1.php?catid=<?php echo $cat['id_category']; ?>"><?php echo  $cat['title']; ?></a></li>
                            <?php    } ?>
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