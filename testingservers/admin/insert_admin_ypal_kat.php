<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 
mysqli_set_charset($connect,'utf8');

 $sql2 = "SELECT TILEFONO FROM katasthmata WHERE TILEFONO = '".$_POST["kat"]."'  ";

  $result2 = mysqli_query($connect,$sql2);

 while($row = mysqli_fetch_array($result2)){
		   
	   $t = $row["TILEFONO"] ; }


if( isset($t) == 0 ){
	echo " Δεν υπάρχει το κατάστημα που εισάχθηκε ";
	exit();
}


 $sql = "INSERT INTO ypal_kat(KAT_USERNAME, KAT_PASSWORD, KAT_TIL) VALUES('".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["kat"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η καταχώρηση έγινε';  
 }  
 ?>