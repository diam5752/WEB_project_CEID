<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $sql = "DELETE FROM ypal_trans WHERE TRANS_USERNAME = '".$_POST["username"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η διαγραφή έγινε';  
 }  
 ?>