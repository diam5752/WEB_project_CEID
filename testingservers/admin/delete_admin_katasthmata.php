<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $sql = "DELETE FROM katasthmata WHERE TILEFONO = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η διαγραφή έγινε';  
 }  
 ?>