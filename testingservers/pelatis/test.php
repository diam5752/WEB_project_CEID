 <?php
   include("Config.php");
   session_start();
    $onoma;
	$odos;
	$arithmos;
	$til;
	$tk ;

$myusername = $_POST["a"];
/////////////////////////////////////////////////////////////////////////////////////////////////////////
	// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
	
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyCdAMigUh0S-uXVHxq1Rbrd2IqiK6g1JKU";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
         
        // verify if data is complete
        if($lati && $longi){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}

if($_POST["a"]){
 	
	$temp = ",greece";
	$address = $_POST["a"].$temp;
	//echo $address;
    // get latitude, longitude and formatted address
    $data_arr = geocode($address);
}
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];		//echo "<br>";
		 // echo $latitude; // y
	//echo "<br>";
	//echo $longitude;  // x
	//echo "<br>";
	//echo $formatted_address;
	}

	 mysqli_set_charset($db,'utf8');
     $sql = "SELECT * FROM katasthmata " ;

      //$sql = "SELECT * FROM katasthmata";
      $result = mysqli_query($db,$sql);

	if (!$result) {
    //printf("eeeeeeeeeeeeee  Error: %s\n", mysqli_error($db));
    exit();
   }

	   $min = 99999999;

      while ($row = mysqli_fetch_array($result) )
	  {
		  $coor_x = $row['COORX']; //x magazou
		  $coor_y = $row['COORY'];  // y magaziou
		 // echo $t;
		  $tempx = abs($longitude -$coor_y ); 
		  $tempy = abs($latitude - $coor_x);
		  $tempAll = $tempx + $tempy;
		  //  echo " ////////////// ";
		 // echo $temp;
		//  echo " **************** ";
		  if($min >= $tempAll ){
			  $min = $tempAll;
			  $onoma = $row['ONOMA'];
			  $odos = $row['ODOS'];
			  $arithmos = $row['ARITHMOS'];
			  $til = $row['TILEFONO'];
			  $tk = $row['TK'];
			  $poli = $row['POLI'];
		  }
		//  echo " -------- ";
		//  echo $onoma ;
		//   echo " -------- ";
	  }
	    //echo " !!!!!!!!!!!!!!!!!!!!! ";
		if(isset($onoma)==0){
			//echo " o taxidromikos kwdikos pou valate den iparxei ... milame ... DEN IPARXEI! ";
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
		//   echo " !!!!!!!!!!!!!!!!!!!!!!! ";
   ?>
