
<html>
<head>
  <?php include('pelatis_menu.php'); ?>
<title>Δημιουργία νέας αποστολής</title>
<style>
       #map {
        height: 400px;
        width: 100%;
       }
	
.center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: auto;
  height: 100px;
}
   
    </style>
<script> 
	document.getElementById("home").removeAttribute("class");
	document.getElementById("diktio").removeAttribute("class");
	//document.getElementById("").removeAttribute("class");
	document.getElementById("parak").setAttribute("class","active"); 
</script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color:#30373B;"> 
 <div class="container">
  <form class="form-horizontal" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="username" style="color:aliceblue"> <font size=4 > Tracking Number: </font></label>
      <div class="col-sm-8">
    	<input type="text" class="form-control" id="tracking" name="tracking" placeholder="Εισάγετε Tracking Number">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" name="submit" class="btn btn-default">Προβολή λίστας τοποθεσιών <br> και χάρτη με τελευταία τοποθεσία </button>
      </div>
    </div>
  </form>
</div>
<?php
 $output = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   
	   $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>   
                     <th>Τοποθεσίες</th>  
                     <th>Έχει φτάσει</th>
                </tr>';
	   
	 //  $db = new mysqli('localhost','root','','project');
     //  $sql = "SELECT TOPOTHESIES FROM parakolouthisi WHERE TRACKING = ".$_POST['tracking']." ORDER BY(FAKE_ID)";
     //  $result = $db->query($sql);
	   $con=mysqli_connect("localhost","root","","project");
   // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

// Perform queries 
	   $testing = $_POST['tracking'];
	   
	    mysqli_set_charset($con,'utf8');
	    $sql = "SELECT TOPOTHESIES,ARRIVED FROM parakolouthisi WHERE TRACKING = '$testing' ORDER BY(FAKE_ID)";
	   
   $result =  mysqli_query($con,$sql);
	  	  
	   if(mysqli_query($con, $sql)){
         }
				else{
    echo " <br> ERROR: Could not able to execute $sql. </br>" . mysqli_error($con);
}
	 //  $conn = mysqli("localhost", "root", "" , "project");
	  // $result = mysqli_query($conn,"SELECT TOPOTHESIES FROM parakolouthisi WHERE TRACKING = ".$_POST['tracking']." ORDER BY(FAKE_ID)");
	   $loc = array();
	   $i = 0;
	    while($row = mysqli_fetch_array($result)){
			$loc[$i][0] = $row["TOPOTHESIES"];
			$loc[$i][1] = $row["ARRIVED"];
			$i++;
			$arr = NULL;
			if($row["ARRIVED"] == 0){
				$arr = "Όχι";
			}
			elseif($row["ARRIVED"] == 1){
				$arr = "Ναι";
			}
			$output .= '  
                <tr>  
                     <td class="topothesies" >'.$row["TOPOTHESIES"].'</td>  
                     <td class="exei_ftasei" >'.$arr.'</td>
					 
                </tr>  
           ';  
		}
	   if(mysqli_num_rows($result)== 0){
		   $output = '  
                <p class="bg-primary">Εισάχθηκε λάθος Tracking Number.</p>
           ';  
	   }
	   else{
	   $output .= "</table></div><br><div id='map'></div>
	   <script>
	   function initMap() {";
	   $i=1;
	   $top = NULL;
	   while($i<sizeof($loc)){
		   if($loc[$i][1] == 0){
			   $top = $loc[$i-1][0];
			   break;
		   }
		   $i++;
	   }
	   
	   if ($top == NULL){
		   $top = $loc[sizeof($loc) - 1][0];
	   }
	   
	   $sql = "SELECT TRANS_COORX,TRANS_COORY FROM transit_hub WHERE ONOMA_TRANS = '$top' ";
	   
   $result =  mysqli_query($con,$sql);
	   if(mysqli_query($con, $sql)){
         }
				else{
    echo " <br> ERROR: Could not able to execute $sql. </br>" . mysqli_error($con);
}
	   while($row = mysqli_fetch_array($result)){
		   $output .= "var uluru = {lat: ".$row["TRANS_COORX"].", lng: ".$row["TRANS_COORY"]."};";
	   }
	   
	   }
	   
	   $output .= "var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCukYUPcEX9wyTkc560zpKm4BzVUPeroek&callback=initMap'>
    </script>;";
   }
  echo $output
?>
	 </body>
</html>