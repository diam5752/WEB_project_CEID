<?php  
 $connect = mysqli_connect("localhost", "root", "", "project"); 

mysqli_set_charset($connect,'utf8');
 $name = "SELECT POLI FROM katasthmata WHERE TILEFONO = '".$_POST["tilefono_edw"]."'";
 $name_edw = mysqli_query($connect, $name);
 $row=mysqli_fetch_array($name_edw,MYSQLI_ASSOC);
 $name_edw = $row["POLI"];

 mysqli_set_charset($connect,'utf8');
 $name = "SELECT POLI FROM katasthmata WHERE TILEFONO = '".$_POST["tilefono_ekei"]."'";
 $name_ekei = mysqli_query($connect, $name);
 $row=mysqli_fetch_array($name_ekei,MYSQLI_ASSOC);
 $name_ekei = $row["POLI"];
 
 $name_edw = mb_substr($name_edw, 0, 2);
 $name_ekei = mb_substr($name_ekei, 0, 2);

 $date = date_timestamp_get(date_create());
 $tracking = "".$name_edw.$date.$name_ekei."";

 include('qr_script.php');
 include('bfs.php');
 //$sql = "INSERT INTO apostoles(XRONOS, KOSTOS, TILEFONO, KAT_TILEFONO, EXPRESS, TRACKING, QR)
 //VALUES('".$xronoskostos[0]."', '".$xronoskostos[1]."', '".$_POST["tilefono_edw"]."', '".$_POST["tilefono_ekei"]."', '".$_POST["express"]."', '".$tracking."', //'".$img."')"; 

  $sql = "INSERT INTO apostoles(XRONOS, KOSTOS, TILEFONO, KAT_TILEFONO, EXPRESS, TRACKING, QR)
 VALUES('".$xronos_f."', '".$kostos_f."', '".$_POST["tilefono_edw"]."', '".$_POST["tilefono_ekei"]."', '".$_POST["express"]."', '".$tracking."', '".$img."')";

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Η καταχώρηση έγινε';  
 }  
 ?>