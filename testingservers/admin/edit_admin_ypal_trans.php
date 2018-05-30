<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $username = $_POST["username"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  

mysqli_set_charset($connect,'utf8');

if($column_name == "TRANS_NAME"){
 $sql2 = "SELECT ONOMA_TRANS FROM transit_hub WHERE ONOMA_TRANS = '".$text."'  ";

  $result2 = mysqli_query($connect,$sql2);
 while($row = mysqli_fetch_array($result2)){
		   
	   $t = $row["ONOMA_TRANS"] ; }


if( isset($t) == 0 ){
	echo " Δεν υπάρχει το transit hub που τροποποιήθηκε ";
	exit();
}
}
 $sql = "UPDATE ypal_trans SET ".$column_name."='".$text."' WHERE TRANS_USERNAME='".$username."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η αλλαγή έγινε';  
 }  
 ?>