<?php
   include('Config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
	mysqli_set_charset($db,'utf8');
   $ses_sql = mysqli_query($db,"select username from diaxeiristis where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: admin_login.php");
   }
?>