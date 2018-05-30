<?php

   include("Config.php");
   session_start();
   $onoma;
	$odos;
	$arithmos;
	$til;
	$tk ;

	
	$myusername = $_POST["a"];
         mysqli_set_charset($db,'utf8');
      $sql = "SELECT * FROM katasthmata WHERE POLI = '".$myusername."' " ;

      $result = mysqli_query($db,$sql);

	   if (!$result) {
    exit();
}

      while ($row = mysqli_fetch_array($result) )
	  {

			  $onoma = $row['ONOMA'];
			  $odos = $row['ODOS'];
			  $arithmos = $row['ARITHMOS'];
			  $til = $row['TILEFONO'];
			  $tk = $row['TK'];
		  	  $poli = $row['POLI'];	
	  }

		if(isset($onoma)==0){
			exit();
		}
		
		echo "Όνομα : ",$onoma ;
		echo "<br/>";
		echo "Οδός, Αριθμός : ",$odos;
        echo ",";
		echo $arithmos;
		echo "<br/>";
		echo "Πόλη : ",$poli;
		echo "<br/>";
		echo "Τηλέφωνο : ",$til;
		echo "<br/>";	
		echo "Ταχυδρομικός Κώδικας : ",$tk;
		
   
?>