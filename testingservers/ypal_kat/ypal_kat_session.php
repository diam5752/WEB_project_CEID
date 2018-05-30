<?php
   include('Config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   mysqli_set_charset($db,'utf8');
   $ses_sql = mysqli_query($db,"select KAT_USERNAME from ypal_kat where KAT_USERNAME = '$user_check' ");
   $ses_sql2 = mysqli_query($db,"select KAT_TIL from ypal_kat where KAT_USERNAME = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $row2 = mysqli_fetch_array($ses_sql2,MYSQLI_ASSOC);
   $login_session = $row['KAT_USERNAME'];
   $tilefwno_here = $row2['KAT_TIL'];

   
   if(!isset($_SESSION['login_user'])){
      header("location: ypal_kat_login.php");
   }
?>