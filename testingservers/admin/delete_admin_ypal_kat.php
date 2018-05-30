<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $sql = "DELETE FROM ypal_kat WHERE KAT_USERNAME = '".$_POST["username"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η διαγραφή έγινε';  
 }  
 ?>