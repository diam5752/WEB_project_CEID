<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $username = $_POST["username"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  

mysqli_set_charset($connect,'utf8');

if ($column_name == "KAT_TIL")
{
	$sql2 = "SELECT TILEFONO FROM katasthmata WHERE TILEFONO = '".$text."'  ";

  $result2 = mysqli_query($connect,$sql2);
 while($row = mysqli_fetch_array($result2)){
		   
	   $t = $row["TILEFONO"] ; }


if( isset($t) == 0 ){
	echo " Δεν υπάρχει το κατάστημα που τροποποιήθηκε ";
	alert();
	exit();
}

}
 $sql = "UPDATE ypal_kat SET ".$column_name."='".$text."' WHERE KAT_USERNAME='".$username."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η αλλαγή έγινε';  
 }  
 ?>