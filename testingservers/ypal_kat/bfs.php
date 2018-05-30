
<?php
//include('ypal_kat_session.php');
 //$XRONOS;
//t
$_distArr = array();
$_distArr[0][1] = 1;
$_distArr[0][4] = 1;
$_distArr[1][2] = 1;
$_distArr[1][0] = 1;
$_distArr[1][3] = 1;
$_distArr[1][5] = 1;
$_distArr[2][1] = 1;
$_distArr[2][5] = 1;
$_distArr[2][8] = 1;
$_distArr[3][1] = 1;
$_distArr[3][5] = 1;
$_distArr[4][0] = 1;
$_distArr[4][5] = 1;
$_distArr[4][7] = 1;
$_distArr[5][4] = 1;
$_distArr[5][3] = 1;
$_distArr[5][2] = 1;
$_distArr[5][1] = 1;
$_distArr[5][6] = 1;
$_distArr[5][7] = 1;
$_distArr[5][8] = 1;
$_distArr[6][5] = 1;
$_distArr[7][4] = 1;
$_distArr[7][5] = 1;
$_distArr[7][8] = 2;
$_distArr[8][2] = 1;
$_distArr[8][7] = 2;
$_distArr[8][5] = 1;

//c	
$_distArr2 = array();			
$_distArr2[0][1] = 1;
$_distArr2[0][4] = 3;
$_distArr2[1][2] = 3;
$_distArr2[1][0] = 1;
$_distArr2[1][3] = 1;
$_distArr2[1][5] = 5;
$_distArr2[2][1] = 3;
$_distArr2[2][5] = 10;
$_distArr2[2][8] = 15;
$_distArr2[3][1] = 1;
$_distArr2[3][5] = 2;
$_distArr2[4][0] = 3;
$_distArr2[4][5] = 2;
$_distArr2[4][7] = 2;
$_distArr2[5][4] = 2;
$_distArr2[5][3] = 2;
$_distArr2[5][2] = 10;
$_distArr2[5][1] = 5;
$_distArr2[5][6] = 8;
$_distArr2[5][7] = 3;
$_distArr2[5][8] = 10;
$_distArr2[6][5] = 8;
$_distArr2[7][4] = 2;
$_distArr2[7][5] = 3;
$_distArr2[7][8] = 4;
$_distArr2[8][2] = 15;
$_distArr2[8][7] = 4;
$_distArr2[8][5] = 10;

$current_path;    // teliko mikrotero path
$current_kostos = 999999;   // to mikrotero kostos (c) , efoson exoun idio t 
$min_kostos = -1;   // i mikroteros dinatos xronos
$moder = 0;   // ws mirkoteros xronos , orizetai o xronos pouprokiptei apo tin prwti epilogi tou dijsktra , afou ws pros xrono einai o min sigoura

	 	function shortestPath($start,$end,$tracking,$express , & $_distArr , & $_distArr2 , & $current_path , & $current_kostos , & $min_kostos , & $moder){
	
$a = $start;
$b = $end;
		
if ($express=="True")
{
	
$S = array();
$Q = array();
foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
$Q[$a] = 0;

while(!empty($Q)){
    $min = array_search(min($Q), $Q);
    if($min == $b) break;
    foreach($_distArr[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
        $Q[$key] = $Q[$min] + $val;
        $S[$key] = array($min, $Q[$key]);
    }
    unset($Q[$min]);
}
	if( isset($S[$b][1]) == 0 ){    // stis for parakatw, an vgazontas ta monopatia, den iparxei allo monopati kai diladi den mporoume na pame 
		                             // stin perioxi pou theloume , tote kanoume return 0 (vlepe xarti)
		
		//insertion($current_path , $tracking);
			//return array($xronos, $kostos);
		return -1;
	}
$xronos = $S[$b][1];

$path = array();
$pos = $b;
while($pos != $a){
    $path[] = $pos;
    $pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);
	
			
			$kostos = 0;
			for($x = 0; $x < (sizeof($path)-1); $x++)
			{
				$kostos += $_distArr[$path[$x]][$path[$x+1]];
			}
	
	if($min_kostos <= $kostos ){
		
		if($moder==0){                 // pairnoume ton mikrotero dinato xrono . Mas noiazei na einai o min , as einai to ksotos megalitero
		$moder=1;                       // to allazoume,  kai stin patakatw for , tha einai 1 , ara dn tha ksanampei se auti tin if
		$min_kostos = $kostos ;}         // to min kostos einai auto , kai to vazoume monima stin global 
		
		 if( $kostos != $min_kostos){                                         // an to kostos ( opou kostos = kostos xronou -na allakosume onoma- ) den einai idio
			                                                               // tote sigoura einai megalitero, ara den koitame ti ginetai kai apla epistrefoume
			return -1;
		}
		
			$kostos_geniko = 0;                              // kostos geniko = c 
	        for($x = 0; $x < (sizeof($path)-1); $x++)
			{
				$kostos_geniko += $_distArr2[$path[$x]][$path[$x+1]];           
			}
	                    // vriskoume to kostos (c ) gia auti ti diadromi
		
		if($kostos_geniko <= $current_kostos ){                       // an einai mikrotero apo auto pou exoume tra ws mikrotero , tote allazoume to min kai to 
			                                                       // vazoume idio me auto pou vrikame , pou einai to mikrotero
			$current_kostos = $kostos_geniko;                // neo min kostos c  
			$current_path = $path;                          // ara kai neo path
		}
		
	}
	else{
		return -1;
		}

	
	unset($_distArr[$path[0]][$path[1]]);   //diagrafoume tis akmes pou vrikame kai apo tous 2 pinakes 
	unset($_distArr2[$path[0]][$path[1]]);
	
}
		
			
else
{
	
$S = array();
$Q = array();
foreach(array_keys($_distArr2) as $val) $Q[$val] = 99999;
$Q[$a] = 0;

while(!empty($Q)){
    $min = array_search(min($Q), $Q);
    if($min == $b) break;
    foreach($_distArr2[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
        $Q[$key] = $Q[$min] + $val;
        $S[$key] = array($min, $Q[$key]);
    }
    unset($Q[$min]);
}
	if( isset($S[$b][1]) == 0 ){    // stis for parakatw, an vgazontas ta monopatia, den iparxei allo monopati kai diladi den mporoume na pame 
		                             // stin perioxi pou theloume , tote kanoume return 0 (vlepe xarti)
		
		//insertion($current_path , $tracking);
			//return array($xronos, $kostos);
		return -1;
	}
$xronos = $S[$b][1];

$path = array();
$pos = $b;
while($pos != $a){
    $path[] = $pos;
    $pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);
	
			
			$kostos = 0;
			for($x = 0; $x < (sizeof($path)-1); $x++)
			{
				$kostos += $_distArr2[$path[$x]][$path[$x+1]];
			}
	
	if($min_kostos <= $kostos ){
		
		if($moder==0){                 // pairnoume ton mikrotero dinato xrono . Mas noiazei na einai o min , as einai to ksotos megalitero
		$moder=1;                       // to allazoume,  kai stin patakatw for , tha einai 1 , ara dn tha ksanampei se auti tin if
		$min_kostos = $kostos ;}         // to min kostos einai auto , kai to vazoume monima stin global 
		
		 if( $kostos != $min_kostos){                                         // an to kostos ( opou kostos = kostos xronou -na allakosume onoma- ) den einai idio
			                                                               // tote sigoura einai megalitero, ara den koitame ti ginetai kai apla epistrefoume
			return -1;
		}
		
			$kostos_geniko = 0;                              // kostos geniko = c 
	        for($x = 0; $x < (sizeof($path)-1); $x++)
			{
				$kostos_geniko += $_distArr[$path[$x]][$path[$x+1]];           
			}
	                    // vriskoume to kostos (c ) gia auti ti diadromi
		
		if($kostos_geniko <= $current_kostos ){                       // an einai mikrotero apo auto pou exoume tra ws mikrotero , tote allazoume to min kai to 
			                                                       // vazoume idio me auto pou vrikame , pou einai to mikrotero
			$current_kostos = $kostos_geniko;                // neo min kostos c  
			$current_path = $path;                          // ara kai neo path
		}
		
	}
	else{
		return -1;
		}
	
	unset($_distArr2[$path[0]][$path[1]]);   //diagrafoume tis akmes pou vrikame kai apo tous 2 pinakes 
	unset($_distArr[$path[0]][$path[1]]);
	
	$temp = $min_kostos;                     //antithetes times apo to express
	$min_kostos = $current_kostos;
	$current_kostos = $temp;
	
}
				
		// insertion($current_path , $tracking);
			return array($xronos, $kostos);   // den xreiiazetai , na to svisoume 
	}

function insertion($current_path , $tracking ){
			foreach($current_path as $value){
	  $connect = mysqli_connect("localhost", "root", "", "project"); 
 		
	   mysqli_set_charset($connect,'utf8');
	   $result = mysqli_query($connect,"SELECT ONOMA_TRANS FROM transit_hub WHERE TRANS_ID = '$value' ");
				
				//$til = mysqli_query($connect,"SELECT TILEFONO FROM transit_hub WHERE TRANS_ID = '$value' ");
				
				while($row = mysqli_fetch_array($result)){
		   
	   $t = $row['ONOMA_TRANS'] ; 
				}
				
				  $connect = mysqli_connect("localhost", "root", "", "project"); 
		    //	$sql = "INSERT INTO parakolouthisi (TOPOTHESIES, TRACKING_ID , TRACKING) VALUES '$t' , '$value' ,'' ";		
		
				$sql = "INSERT INTO parakolouthisi(TOPOTHESIES, TRACKING) VALUES('".$t."', '".$tracking."') ";
				
				if(mysqli_query($connect, $sql)){
        //echo "Η καταχώρηση έγινε!";
         }
				else{
    echo " <br> ERROR: Could not able to execute $sql. </br>" . mysqli_error($connect);
}
				
				
}
}

	function first_magazi($hello){
      
	   $tempp = $hello;	   
		
	   $connect = mysqli_connect("localhost", "root", "", "project"); 
 		mysqli_set_charset($connect,'utf8');
	   $result = mysqli_query($connect,"SELECT TRANS_ID FROM katasthmata WHERE TILEFONO = $tempp ");
	   while($row = mysqli_fetch_array($result)){

	   $t = $row['TRANS_ID'];  }
		if(isset($t)==0 ){
			echo " Λάθος τηλέφωνο αρχικού ";
			exit();
		} 
	   $name = (double)$t;

	   
	   return $name;
   
}

function second_magazi($hello){
   
	   $tempp = $hello;
	 
	   $connect = mysqli_connect("localhost", "root", "", "project"); 
 		mysqli_set_charset($connect,'utf8');
	   $result = mysqli_query($connect,"SELECT TRANS_ID FROM katasthmata WHERE TILEFONO = $tempp ");
	   while($row = mysqli_fetch_array($result)){
		   
	   $t = $row['TRANS_ID'] ;}
	   if(isset($t)==0 ){
			echo " Λάθος τηλέφωνο τελικού ";
			exit();
		}
	   $name = (double)$t;
	   
	   return $name;
  
}


	$var1 =  first_magazi($_POST["tilefono_edw"]);
    $var2 = second_magazi($_POST["tilefono_ekei"]);
     $fir = (double)$var1;
     $sec = (double)$var2;

	for($i=0 ; $i<5 ; $i++){
	 $xronoskostos = shortestPath($fir,$sec,$tracking,$_POST["express"] , $_distArr , $_distArr2 , $current_path , $current_kostos , $min_kostos , $moder);
	if($xronoskostos == -1 ) {break;}
	}


	//$xronoskostos[0] = $min_kostos;
	//$xronoskostos[1] = $current_kostos;
    insertion($current_path , $tracking);    // exoume tis telikes times, kai kanoume ta inserts 
	$xronos_f = $min_kostos;                  // gia ta instert sto   insert_ypal_kat
	$kostos_f = $current_kostos + 2;          //kostos apo arxiko katastima kai pros teliko
	 ?>