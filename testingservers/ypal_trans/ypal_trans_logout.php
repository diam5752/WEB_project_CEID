<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ypal_trans_login.php");
   }
?>