<?php

  include('config.php');
  session_start();

  $user_check = $_SESSION['login_user'];
  $sql = "select username from user where username = '$user_check'";
   $ses_sql = mysql_query($sql, $conn);
   $row = mysql_fetch_array($ses_sql);
   $login_session = $row['username'];
   if(!isset($login_session)){
   	mysql_close($conn);
      header("location: index.php");
   }
?>