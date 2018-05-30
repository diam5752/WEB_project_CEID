<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
mysqli_set_charset($connect,'utf8');

 $sql2 = "SELECT ONOMA_TRANS FROM transit_hub WHERE ONOMA_TRANS = '".$_POST["trans"]."'  ";

  $result2 = mysqli_query($connect,$sql2);
 while($row = mysqli_fetch_array($result2)){
		   
	   $t = $row["ONOMA_TRANS"] ; }


if( isset($t) == 0 ){
	echo " Δεν υπάρχει το transit hub που εισάχθηκε ";
	exit();
}

 $sql = "INSERT INTO ypal_trans(TRANS_USERNAME, TRANS_PASSWORD, TRANS_NAME) VALUES('".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["trans"]."')";  


 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η καταχώρηση έγινε';  
 }  
 ?>