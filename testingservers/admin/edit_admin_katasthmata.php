<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
  

//if($text == "TILEFONO" || $text == "COORX" || $text == "COORY" || $text == "TK" ){
//	if(is_numeric($text) == 0 ){
//		echo " poutseeees ";
//		exit();
//	}
//}
$temp = $text;

if($column_name == "TILEFONO" || $column_name == "COORX" || $column_name == "COORY" || $column_name == "TK" ){
	
	if(is_numeric($text) == 0 ){
		echo "Λάθος Δεδομένα";
	exit();
	}
}

//echo " eksw apo tin if ";
$sql = "UPDATE katasthmata SET ".$column_name."='".$text."' WHERE TILEFONO ='".$id."'"; 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η αλλαγή έγινε';  
 }  

 ?>