<?php  
 $connect = mysqli_connect("localhost", "root", "", "project"); 

  mysqli_set_charset($connect,'utf8');
 $sql = "SELECT * FROM transit_hub ORDER BY TRANS_ID DESC";  
 $result = mysqli_query($connect, $sql);  

 $trans_id;
   $min  =999999 ;
 while($row = mysqli_fetch_array($result))  
      { 
    $x1 = $_POST["COORX"];
    $y1 = $_POST["COORY"];
    
    $x2 = $row["TRANS_COORX"] ;
    $y2 = $row["TRANS_COORY"] ;
  
   $diafx = $x2 - $x1 ; 
   $diafy = $y2 - $y1 ;
    $diafx2 = $diafx ** 2;
    $diafy2 = $diafy ** 2;
    $res = $diafx2 + $diafy2;
    
    //echo $res;
   
    if($min >= $res ){
     $min = $res;
     $trans_id = $row["TRANS_ID"];
    }
   }


	if(  is_numeric( $_POST["COORX"] ) == 0 ) {
		echo " Το πεδίο Συντεταγμ. X έχει αλφαριθμητική τιμή. Πρέπει να έχει integer.";
		exit();
	}
   if( is_numeric($_POST["COORY"]) == 0 ) {
		echo " Το πεδίο Συντεταγμ. Y έχει αλφαριθμητική τιμή. Πρέπει να έχει integer.";
		exit();
   }
   if( is_numeric($_POST["TILEFONO"]) == 0  ) {
		echo " Το πεδίο Τηλέφωνο έχει αλφαριθμητική τιμή. Πρέπει να έχει integer.";
	   exit();
	}
	if( is_numeric($_POST["TK"]) == 0  ) {
		echo " Το πεδίο ΤΚ έχει αλφαριθμητική τιμή. Πρέπει να έχει integer.";
		exit();
	}

 mysqli_set_charset($connect,'utf8');
 $sql = "INSERT INTO katasthmata(ONOMA,TILEFONO,ODOS,ARITHMOS,POLI,TK,COORX,COORY,TRANS_ID) VALUES('".$_POST["ONOMA"]."', '".$_POST["TILEFONO"]."' ,'".$_POST["ODOS"]."' , '".$_POST["ARITHMOS"]."','".$_POST["POLI"]."' , '".$_POST["TK"]."' ,'".$_POST["COORX"]."','".$_POST["COORY"]."' ,'$trans_id' )"; 
 
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η καταχώρηση έγινε!';  
 }  
else{
	 echo "Error: " . $sql . "<br>" . $connect->error;
	echo " Εισαχθήκαν γράμματα αντί για αριθμούς ";
}
 ?>