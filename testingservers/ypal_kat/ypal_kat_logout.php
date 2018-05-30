<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ypal_kat_login.php");
   }
?>