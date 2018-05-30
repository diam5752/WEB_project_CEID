<?php
   include('ypal_kat_session.php');
?>
<html>
<head>
  <?php include('ypal_kat_menu.php'); ?>
<title>Δημιουργία νέας αποστολής</title>
<script> 
	document.getElementById("home").removeAttribute("class");
	document.getElementById("ypal_kat_paradosi").removeAttribute("class");
	document.getElementById("ypal_kat_new").removeAttribute("class");
	document.getElementById("ypal_kat_parak").setAttribute("class","active"); 
</script>

</head>
<body style="background-color:#30373B;">
 <div class="container" >
  <h2></h2>
  <form class="form-horizontal" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="username" style="color:aliceblue"> <font size="4"> <b>Tracking Number: </b> </font> </label>
      <div class="col-sm-10">
    	<input type="text" class="form-control" id="tracking" name="tracking" placeholder="Εισάγετε Tracking Number">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" name="submit" class="btn btn-default">Προβολή Λίστας</button>
      </div>
    </div>
  </form>
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
	    $sql = "SELECT * FROM parakolouthisi WHERE TRACKING = '$testing' ORDER BY(FAKE_ID)";
	   
   $result =  mysqli_query($con,$sql);
	  	  
	   if(mysqli_query($con, $sql)){
         }
				else{
    echo " <br> ERROR: Could not able to execute $sql. </br>" . mysqli_error($con);
}
	 //  $conn = mysqli("localhost", "root", "" , "project");
	  // $result = mysqli_query($conn,"SELECT TOPOTHESIES FROM parakolouthisi WHERE TRACKING = ".$_POST['tracking']." ORDER BY(FAKE_ID)");
	    while($row = mysqli_fetch_array($result)){
			if($row["ARRIVED"]){
				$eftase = "Ναι";
			}
			else{
				$eftase = "Όχι";
			}
			$output .= '  
                <tr id="Mytr">  
                     <td class="topothesies" >'.$row["TOPOTHESIES"].'</td>  
                     <td class="exei_ftasei" >'.$eftase.'</td>
					 
                </tr>  
           ';  
		}
	   if(mysqli_num_rows($result)== 0){
		   $output = '  
                <p class="bg-primary">Εισάχθηκε λάθος Tracking Number.</p>
           ';  
	   }
	   $output .= '
	   </table>
	   </div>';
	   
   }
  echo $output
?>
 </div>
	 </body>
</html>