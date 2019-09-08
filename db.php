<?php
  $link = mysqli_connect('localhost','root','','future_comments');
  mysqli_set_charset($link,"utf8");
  if(mysqli_connect_errno())
  {
    echo'error bd connect ('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
  }
 ?>
