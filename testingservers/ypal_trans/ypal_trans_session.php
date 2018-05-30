<?php
   include('Config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
mysqli_set_charset($db,'utf8');
   $ses_sql = mysqli_query($db,"select trans_username from ypal_trans where trans_username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['trans_username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: ypal_trans_login.php");
   }
?>