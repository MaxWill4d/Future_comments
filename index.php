<?php
   require_once 'db.php';

   if (!empty($_POST['comment_submit']))//создать коммент
       {
           mysqli_query($link, "INSERT INTO `comments`(`name`,`datetime`,`text`) VALUES ('".$_POST['comment_name']."','".date('Y-m-d H:i:s')."','".$_POST['comment_text']."')");
           header("Location: ".$_SERVER["REQUEST_URI"]);
       }

   ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Future|Коментарии</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="mid">
        <div class="info">
          <p><b>Телефон: (499) 340-94-71</b></p>
          <p><b>Email: <a href="mailto:info@future-group.ru" target="_blank">info@future-group.ru</a></b></p>
        </div>

        <div class="header_logo">
          <img src="img/logo.png" alt="Future internet agency">
        </div>

        <h1>Комментарии</h1>
        <div class="clear"></div>
      </div>
      <div class="outline"></div>
    </header>

    <content>
      <div class="mid">
        <?php
          $result = mysqli_query($link, "SELECT * FROM comments ORDER BY id DESC");
          while($row=mysqli_fetch_array($result)) {
         ?>
        <div class="comment">
          <div class="comment_head">
            <div class="comment_autor"><p><?php echo  $row['name']?></p></div>
            <div class="comment_time"><p><?php echo  date("h:i",strtotime($row['datetime']))?></p></div>
            <div class="comment_date"><p><?php echo  date("d.m.y",strtotime($row['datetime']))?></p></div>
            <div class="clear"></div>
          </div>
          <div class="comment_text"><p><?php echo  $row['text']?></p></div>
        </div>
        <?php
          }
         ?>
        <div class="line"></div>
        <h2>Оставить комментарий</h2>
        <form id="new_comment" method="post">
          <p>Ваше имя</p>
          <input type="text" name="comment_name" value="">
          <p>Ваш коментарий</p>
          <textarea name="comment_text" rows="8" cols="80"></textarea>
          <input type="submit" name="comment_submit" value="Отправить">
        </form>

        <div class="clear"></div>
      </div>
    </content>

    <footer>
      <div class="mid">
        <div class="logo_mini">
          <img src="img/logo.png" alt="Future internet agency">
        </div>
        <div class="info">
          <p><b>Телефон: (499) 340-94-71</b></p>
          <p><b>Email: <a href="mailto:info@future-group.ru" target="_blank">info@future-group.ru</a></b></p>
          <p><b>Адрес: <a href="https://goo.gl/maps/hYasVvddMWV1mhMAA" target="_blank">115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1</a></b></p>
          <p>© 2010 - 2014 Future. Все права защищены</p>
        </div>
        <div class="clear"></div>
      </div>
    </footer>


    <script src="scripts.js"></script>
  </body>
</html>
